<?php require_once ( "config/session.php" ) ; confirm_logged_in ( ) ; check_all_vars();?>
<?php require_once ( "config/config.php" ) ; ?>
<html>
<head>
	<meta name="viewport" content = "width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no" />
	<link rel="stylesheet" href="css/demo.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
	<script src="js/footable-0.1.js" type="text/javascript"></script>
	<link href="css/footable-0.1.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
		$(function() {
		  $('table').footable();
		});
	</script>

	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-27142889-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
</head>
<body>
<?php

	$i = $_GET ['i' ];
	$total = $_GET ['total'];
	$query = "SELECT * FROM items WHERE `quantity`!= 0 AND ".$i."<=`id` AND `id`<=".$total  ;
	$result = mysql_query ( $query , $connection ) or die ( mysql_error () ) ;
	$total_rows =mysql_num_rows ( $result ) ;
	$_SESSION [ 'nr_linii' ] = $total_rows ;
	if ( $total > $total_rows )
		$total = $total_rows ;
?>

<table class="footable">
	<thead>
		<tr>
			<th data-hide="phone,tablet"> Cart</th>
			<th data-hide="phone,tablet"> Moves</th>
			<th data-hide="phone,tablet"> Add move</th>
			<th data-class="expand"> Name</th>
			<th > Description</th>
			<th data-hide="phone" > Quantity</th>
			<th data-hide="phone,tablet"> Reserved</th>
		</tr>
	</thead>
<tbody>

<?php


	for ( $i = 0 ; $i < $total_rows ; ++ $i )
	{
		if ( $i != 350 ){
		$name = mysql_result ( $result , $i , "item_code" );
		$quantity = mysql_result ( $result , $i , "quantity" );
		$reserved = mysql_result ( $result , $i , "reserved" );
		$description = mysql_result ( $result , $i , "item_description" );
		$id = mysql_result ( $result , $i , "id" );
		$image = mysql_result ( $result , $i , "img_link" );
		
		if ( $i % 2 == 0 )
			echo '<tr id="coloana'.$i.'">' ;
		else
			echo '<tr bgcolor="#EFF1F5" id="coloana'.$i.'">' ;
//		echo '<font face="arial" size="2">';

		echo '<td style="margin:11px"><a href="add_cart.php?id='.$id.'" class="button">Add to cart</a></td>' ;
		echo '<td ><a href="moves.php?item='.$name.'" class="button">Moves</a></td>';
		echo '<td ><a href="add_move.php?item='.$name.'" class="button">Add move</a></td>';

		echo '<td class="expand" >'. $name.'</td>' ;
		echo '<td>'. $description.'</td>';
		echo '<td>'. $quantity. '</td>';
		echo '<td>'. $reserved. '</td>';

		echo '</tr>' ;
		
		}
	}
?> 

</tbody>
</table>
</body>
</html>