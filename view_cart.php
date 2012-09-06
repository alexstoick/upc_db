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
  
  
  
  
  
  
<h1><center>View cart</center> </h1>
<table border="0" width="100%" cellspacing="2" cellpadding="2" style="font:11px Verdana">
<tr >

<td width="30%" style="align:center;text-align:center;" class="header"><b>Item Name</b></td>
<td width="15%" style="align:center;text-align:center;" class="header"><b>User that reserved</b></td>
<td width="20%" style="align:center;text-align:center;" class="header"><b>Date reservation made</b></td>
<td width="15%" bgcolor="#999999" style="align:center;text-align:center;" class="header"><b>Quantity reserved</b></td>
<td width="30%" style="align:center;text-align:center;" class="header"><b>Stock quantity atm</b></td>
</tr>
<?php

	$user_id = $_SESSION [ 'user_id' ] ;
	
	$query = "SELECT * FROM reserved WHERE user_id='".$user_id."' AND order_no = '0'" ;
	$RESULT = mysql_query ( $query , $connection ) or die ( mysql_error ( ) )  ;
	for ( $i = 0 ; $i < mysql_num_rows ( $RESULT ) ; ++ $i )
	{
		
		if ( $i % 2 == 0 )
			echo '<tr>' ;
		else
			echo '<tr bgcolor="#EFF1F5">' ;
		$id = mysql_result ( $RESULT , $i , "id" ) ;
		$item_id = mysql_result ( $RESULT , $i , "item_id" ) ;
		$user_id = mysql_result ( $RESULT , $i , "user_id" ) ;
		$quantity_reserved = mysql_result ( $RESULT , $i , "quantity" ) ;
		$date = mysql_result ( $RESULT , $i , "date" ) ;
		
		$query = "SELECT item_code, quantity FROM items WHERE id='".$item_id."'";
		$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) ) ;
		$item_name = mysql_result ( $result , 0 , "item_code" ) ;
		$quantity_stock = mysql_result ( $result , 0 , "quantity" ) ;
		
		$query = "SELECT username FROM users WHERE id='".$user_id."'";
		$result = mysql_query ( $query , $connection ) ;
		$username = mysql_result ( $result , 0 , "username" ) ;
			
		echo '<td width="30%" class="gridcol" style="align:center;text-align:center;">'. $item_name ;
		echo '<td witdh="45%" class="gridcol" style="padding-right:5px; padding-left:8px; align:center;text-align:center; ">'. $username;
		echo '<td witdh="45%" class="gridcol" style="padding-right:5px; padding-left:8px; align:center;text-align:center; ">'. $date;
		echo '<td witdh="30%" class="gridcol" style="align:center;text-align:center;">'. $quantity_reserved;
		echo '<td witdh="30%" class="gridcol" style="align:center;text-align:center;">'. $quantity_stock;
		//echo '<td witdh="20%" bgcolor="#AAAAAA"><b>Date:'.$today.'</tr>';	
		echo '</tr>' ;
	}	

?>
</table><br>
<a href="main.php"><img src="back.jpg" /></a>
<br>
<form action="export.php" method="post">
<SELECT name="id">
<?php
	$query = "SELECT id,persoana FROM z ORDER BY persoana ASC" ;
	$result = mysql_query ( $query , $connection ) ;
	
	for ( $i = 0 ; $i < mysql_num_rows ( $result ) ; ++ $i )
	{
		$id = mysql_result ( $result , $i , "id" ) ;
		$persoana = mysql_result ( $result , $i , "persoana" ) ;
		echo "<OPTION value=".$id.">".$persoana."</OPTION>";
	}
	
?>
</SELECT>
<input type="submit" name="submit" value="Export to Excel">
</form>


<form action="add_order.php">
	<input value="Add order!" type="submit" />
</form>


    <!-- end .content --></div>
  <div class="footer">
    <p>Copyright.</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
