<?php require_once ( "config/session.php" ) ; confirm_logged_in ( ) ;?>
<?php require_once ( "config/config.php" ) ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Move</title>
<link href="styles/thrColLiqHdr.css" rel="stylesheet" type="text/css" />
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
<!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* this 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
ul.nav a { zoom: 1; }  /* the zoom property gives IE the hasLayout trigger it needs to correct extra whiltespace between the links */
</style>
<![endif]-->
</head>

<body>

<div class="container">
  <div class="header"><img src="img/sigla_upc.jpg" alt="UPC" name="Insert_logo" width="10%" height="150" id="UPC" style="background: #8090AB;" />
    <!-- end .header --></div>
  <div class="sidebar1">
    <ul class="nav">
      <?php	afis_meniu(); ?>
    </ul>
    <p></p>
    <!-- end .sidebar1 --></div>
  <div class="content">
  
  
  
  <h1><center>Add a move to item: 
<?php 
	if ( !empty ( $_GET[ "item" ] )  )
	{
		echo $_GET[ "item" ] ; 
		$item_name = $_GET["item"];
	}
	else 
	{
		echo $_POST["item"];
		$item_name = $_POST["item"];
	}
?>
</center>
</h1>
<?php
	
	if ( !empty ( $_POST ) )
	{
		$name = $_POST [ "item" ] ;
		$type_move = $_POST [ "movement_type" ] ;
		$quantity = $_POST [ "quantity" ] ;
		$where = $_POST [ "where" ] ;
	
		$query = "INSERT INTO moves (`item`, `type_move`, `where`, `date`, `quantity`) VALUES ('".$name."', '".$type_move."', '".$where."', CURRENT_TIMESTAMP, '".$quantity."');";
		//$query = "INSERT INTO lucru.moves ( item , type_move, where, quantity ) VALUES 
		//							( '$name', '$type_move', '$where', '$quantity' ) " ;
		$result = mysql_query ( $query , $connection ) or die ( mysql_error() ) ;
		//".."
		$query = "SELECT * FROM `items` WHERE `item_code` LIKE '".$name."'";
		$result = mysql_query ( $query , $connection ) or die ( mysql_error() ) ;
		$STOC_quantity = mysql_result ( $result , 0 , "quantity" ) ;
		if ( $type_move == 1 )
			$STOC_quantity += $quantity ;
		else
			$STOC_quantity -= $quantity ;
		$query = "UPDATE `items` SET `quantity` = '".$STOC_quantity."' WHERE `items`.`item_code` = '".$name."'";
		$result = mysql_query ( $query , $connection ) or die ( mysql_error() ) ;

		echo "Move added succesfully!<br><br>" ;
		echo '<br>Redirecting you to the <a href="main.php">main page</a>';
		echo '<script>
			  <!--
					location.replace("main.php");
			  -->
		  	  </script>';
	}
	else
	echo '
		  <form action="add_move.php" method="POST">
		  Name of object:<input name="item" type="text" value="'.$item_name.'" size="45" readonly="readonly"><p ></p>
		  Movement type:<SELECT name="movement_type" style="background-color: #FFFFFF; color: #000000; font-family: Arial; font-size: 11px; width: 100px; ">
			  <OPTION value="1">In</OPTION>
			  <OPTION value="2">Out</OPTION>	
		  </SELECT><p ></p>
		  Quantity:<input name="quantity" type="text"><p ></p>
		  Where:<input name="where" type="text"><p ></p>
		  <input name="submit" type="submit" value="Submit!">
		  </form>
		  <a href="main.php"><img src="back.jpg" /></a>';
?>

  
  




    <!-- end .content --></div>
  <div class="footer">
    <p>Copyright.</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
