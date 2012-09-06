<?php require_once ( "config/session.php" ) ; confirm_logged_in ( ) ;?>
<?php require_once ( "config/config.php" ) ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
   <?php
	if ( isset ( $_GET [ 'id' ] ) )
	{
		$id = $_GET [ 'id' ] ;
		$query = "SELECT * FROM items WHERE id='".$id."' LIMIT 1";
		$result = mysql_query ( $query , $connection ) ;
		$name = mysql_result ( $result , 0 , "item_code" ) ;
		$description = mysql_result ( $result , 0 , "item_description" ) ;
?>

<form action="add_cart.php" method="post">
Name of item: <input  style="width:250px;" type="text" value="<?php echo $name ; ?>"  ><br>
Quantity: <input type="text" name="quantity"><br>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="submit" value="Submit!" name="submit">
</form>
<?php
	}
	else
	if ( !empty ( $_POST ) )
	{
		//prelucram
		$id = $_POST [ "id" ] ;
		//echo "ID:".$id."<br>";
		
		$quantity_to_reserve = $_POST [ "quantity" ] ;
		$query = "SELECT item_code,quantity,reserved FROM items WHERE id='".$id."' LIMIT 1" ;
		$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) )  ;
		
		$quantity_STOC = mysql_result ( $result , 0 , "quantity" ) ;
		$quantity_STOC -= $quantity_to_reserve ;
		
		$reserved_STOC = mysql_result ( $result , 0 , "reserved" ) ;
		$reserved_STOC += $quantity_to_reserve ;
		$item = mysql_result ( $result , 0 , "item_code" ) ;
		echo 'Added to cart: '.$item.' x '.$quantity_to_reserve.' time(s) !<br>';
		//echo "quantity_STOC:".$quantity_STOC."<br>reserved_STOC:".$reserved_STOC;
		
		$query = "UPDATE items SET quantity = '".$quantity_STOC."', reserved = '".$reserved_STOC."' WHERE id = '".$id."'";
		$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) ) ;
		
		$user_id = $_SESSION [ "user_id" ] ; 
		$query = "INSERT INTO reserved 
					( id , item_id , user_id , quantity , solved , date ) VALUES
					( NULL , '". $id."' , '". $user_id."' , '". $quantity_to_reserve."' , 0 , NULL ) ";

		$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) ) ;
		
	}

?>
<a href="main.php"><img src="back.jpg" /></a>
    <!-- end .content --></div>
  <div class="footer">
    <p>Copyright.</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
