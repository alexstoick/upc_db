<?php require_once ( "config/session.php" ) ; confirm_logged_in ( ) ; check_all_vars();?>
<?php require_once ( "config/config.php" ) ; ?>
<html>
<head>
<link href="styles/thrColLiqHdr.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="styles/jquery.js"></script>
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
<script type="text/javascript">
	var last = -1 ;
    $(function() {
        $("tr").hover(
            function() {
                $(this).toggleClass("highlight");
            },
            function() {
                $(this).toggleClass("highlight");
            }
        );
    });
</script>
</head>
<body>
<?php

	$i = $_GET ['i' ];
	$total = $_GET ['total'];
	$query = "SELECT * FROM items WHERE `quantity`!= 0 AND ".$i."<=`id` AND `id`<=".$total  ;
	$result = mysql_query ( $query , $connection ) or die ( mysql_error () ) ;
	$total_rows =mysql_num_rows ( $result ) ;
	if ( $total > $total_rows )
		$total = $total_rows ;
	//echo 'query:'.$query.'<br>';
//	echo $total_rows;
?>

<table border="0" width="100%" cellspacing="2" cellpadding="2" style="font:11px Verdana" id="theList">
<tr >
<td width="5%" class="header"> </td>
<td width="5%" class="header"> </td>
<td width="5%" class="header"> </td>
<td width="5%" class="header"> </td>
<td width="30%" style="align:center;text-align:center;" class="header"><b>Name</b></td>
<td width="30%" style="align:center;text-align:center;" class="header"><b>Description</b></td>
<td width="30%" bgcolor="#999999" style="align:center;text-align:center;" class="header"><b>Quantity</b></td>
<td width="30%" style="align:center;text-align:center;" class="header"><b>Reserved</b></td>
</tr>
<?php


	for ( $i = 0 ; $i < $total_rows ; ++ $i )
	{
		if ( $i != 350 ){
		$date  = mktime( date("m")  , date("d"), date("Y"));
		$today = date ( "m.d.Y" , $date ) ;
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
		echo '<font face="arial" size="2">';
		echo '<td class="gridcol" width="1%" style="align:center;text-align:center;">
					<div id="viewlarger'.$i.'">[+]</div>
					<div id="tooltip'.$i.'" style="opacity:0.0; display:none"><img src="images/1 ('.$i.').jpg" width="100" height="100"/></div>
			  </td>' ;
		echo '<td class="gridcol" width="1%" style="align:center;text-align:center;"><a href="add_cart.php?id='.$id.'"><img src="img/addtocart.png"></a></td>' ;
		echo '<td class="gridcol" width="1%"><a href="moves.php?item='.$name.'"><img class="mediumbutton" src="img/moves.png" alt="Moves"></a></td>';
		echo '<td width="1%" class="gridcol" ><a href="add_move.php?item='.$name.'"><img src="img/addmoves.png"></a></td>';
		echo '<td width="30%" class="gridcol" style="align:center;text-align:center;" >'. $name.'
			  </td>' ;
		echo '<td witdh="45%" class="gridcol" style="padding-right:5px; padding-left:8px; align:center;text-align:left; ">'. $description.'</td>';
		echo '<td witdh="30%" class="gridcol" style="align:center;text-align:center;">'. $quantity. '</td>';
		echo '<td witdh="30%" class="gridcol" style="align:center;text-align:center;">'. $reserved. '</td>';
		//echo '<td witdh="20%" bgcolor="#AAAAAA"><b>Date:'.$today.'</tr>';	
		echo '</tr>' ;
		
		
		echo '<script>
				$("#viewlarger'.$i.'").click(
		  	function() {
                var offset = $("#coloana'.$i.'").offset();
				var opacity = $("#tooltip'.$i.'").css("opacity" ) ;
				if ( opacity == 1 )
				{
					//hide
                	$("#tooltip'.$i.'").css("top", offset.top).css("left", offset.left).css("display", "none");
	                $("#tooltip'.$i.'").animate({ opacity: 0 }, 50);
				}
				else
				{
					//show
					if ( last != -1 )
					{
						//inchidem
						 $("#tooltip"+last).css("top", offset.top).css("left", offset.left).css("display", "none");
		                 $("#tooltip"+last).animate({ opacity: 0 }, 50);
					}
                	$("#tooltip'.$i.'").css("top", offset.top).css("left", offset.left).css("display", "block");
	                $("#tooltip'.$i.'").animate({ opacity: 1.0 }, 50);		
					last = '.$i.' ;			
				}
            	});
			</script>';
		
		
		}
	}
?> 

</table>
</body>
</html>