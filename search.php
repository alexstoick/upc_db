<?php require_once ( "config/session.php" ) ; confirm_logged_in ( ) ;?>
<?php require_once ( "config/config.php" ) ; ?>
<?php 
	$rez = "[" ;
	//luam numele
	$query = "SELECT item_code FROM items" ;
	$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) ) ;
	$number = mysql_num_rows ( $result ) ;
	for ( $i = 0 ; $i < $number-1 ; ++ $i )
	{
		$valoare = mysql_result ( $result , $i , 'item_code' );
		$rez .= '"'.$valoare.'", ' ;
	}
	$valoare = mysql_result ( $result , $i , 'item_code' ) ;
	$rez .= '"'.$valoare.'"' ;
	$rez .= "]" ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Search warehouse</title>
    <link href="styles/thrColLiqHdr.css" rel="stylesheet" type="text/css" />
   	<link rel="stylesheet" href="styles/jquery.ui.all.css">
	<script src="js/jquery-1.6.2.js"></script>
	<script src="js/jquery.ui.core.js"></script>
	<script src="js/jquery.ui.widget.js"></script>
	<script src="js/jquery.ui.position.js"></script>
	<script src="js/jquery.ui.autocomplete.js"></script>
	<link rel="stylesheet" href="styles/demos.css">
    <script>
		var info;
		
		function change ( )
		{
			<!--
				location.replace( ("search_result.php?id="+info) ) ;
			-->
		}
				
	    $(document).ready(function() {
			var availTags = <?php echo $rez; ?>;
			$( "#tags" ).autocomplete({
				source: availTags,
				select: function( event, ui ) {
					info = ui.item.value ;
				}	
			});
	  	});
	</script>
</head>
<body>

<div class="container">
  <div class="header"><img src="img/sigla_upc.jpg" alt="UPC" name="Insert_logo" width="10%" height="150" id="UPC" style="background: #8090AB;" />
</div>
  <div class="sidebar1">
    <ul class="nav">
      <?php	afis_meniu(); ?>
    </ul>
    <p></p>
</div>
  <div class="content">
	<center><h1>Search</h1></center>
	<h4>
		<div class="ui-widget" font-size="62.5%">
			<form>
				Item code:<input type="text" id="tags" size="50"/>
			<input type="button" value="Submit!" onClick="change()">
			</form>
		</div>

	</h4>
</div>
  <div class="footer">
    <p>Copyright.</p>
    </div>
  </div>




</body>
</html>
