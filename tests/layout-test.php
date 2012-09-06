<?php require_once ( "../config/session.php" ) ; confirm_logged_in ( ) ;?>
<?php require_once ( "../config/config.php" ) ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../styles/thrColLiqHdr.css" rel="stylesheet" type="text/css" />
<style>
td.header {
    background-color:#eff1f5;
    vertical-align:top;
    padding-top:3px;
    padding-bottom:3px;
    padding-left:2px;
    padding-tight:2px;
    text-align:left;
    font-size:12px;
    color:#1f386e;
    font-weight: bold;
    font-style: normal;
    border-bottom:1px solid #d2d8e3;
}
#content td.gridcol  {
    vertical-align:top;
    text-align:left;
    font-size:11px;
    padding-right:2px;
    font-family: Tahoma,Verdana,Arial,Helvetica;
}

#content td.gridcol span.big {
    font-size:12px;
}

#content td.gridcol span.big-navigation a {
    font-size:10pt;
}

#content span.big {
    font-size:12px;
}

#content span.big a {
    font-size:12px;
}

#content td.gridcol a  {
    font-size:11px;
}

#content td.gridcol input {
    vertical-align:middle;
    font-size:11px;
}

#content td.gridcol span {
    vertical-align:middle;
}

#content td.gridcol textarea {
    vertical-align:middle;
    padding-left:4px;
}

#content td.gridcol select {
    vertical-align:middle;
}

#content td.gridcol x {
    vertical-align:top;
}
#content img.mediumbutton {
    border:0px;
    margin-top:2px;
    vertical-align:middle;
    width:51px;
    height:16px;
}
</style>
<!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* this 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
ul.nav a { zoom: 1; }  /* the zoom property gives IE the hasLayout trigger it needs to correct extra whiltespace between the links */
</style>
<![endif]-->
</head>

<body>

<div class="container">
  <div class="header"><img src="../img/sigla_upc.jpg" alt="UPC" name="Insert_logo" width="10%" height="150" id="UPC" style="background: #8090AB;" />
    <!-- end .header --></div>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="../view_cart.php">View Cart</a></li>
      <li><a href="../view_orders.php">View reserved items</a></li>
      <li><a href="#">?!Search</a></li>
      <li><a href="#">?!Logout</a></li>
    </ul>
    <p> Lines per page:     
    <form action="layout-test.php" method="POST">
     <p><SELECT name="number_lines" style="background-color: #FFFFFF; color: #000000; font-family: Arial; font-size: 11px; width: 100px; ">
        <OPTION>20</OPTION>
        <OPTION>50</OPTION>
        <OPTION>100</OPTION>
        <OPTION>200</OPTION>
      </SELECT></p>
      <p><input type="submit" name="submit" value="Submit!">
      </form>
    <p></p>
    <!-- end .sidebar1 --></div>
  <div class="content">
    <center><h1>Items in stock</h1></center>
<table border="0" width="100%" cellspacing="2" cellpadding="2" style="font:11px Verdana">
<tr >
<td width="5%" class="header"> </td>
<td width="5%" class="header"> </td>
<td width="5%" class="header"> </td>
<td width="30%" style="align:center;text-align:center;" class="header"><b>Name</b></td>
<td width="30%" style="align:center;text-align:center;" class="header"><b>Description</b></td>
<td width="30%" bgcolor="#999999" style="align:center;text-align:center;" class="header"><b>Quantity</b></td>
<td width="30%" style="align:center;text-align:center;" class="header"><b>Reserved</b></td>
</tr>
<?php

	$query = "SELECT * FROM items" ;
	$result = mysql_query ( $query , $connection ) or die ( mysql_error () ) ;
	//IMPORTANT
	if ( isset ( $_POST [ "number_lines" ] ) )
	{
		$nr_linii = $_POST [ "number_lines" ] ;	
		$_SESSION [ 'nr_linii' ] = $nr_linii ;
	}
	else
		if ( isset ( $_SESSION [ 'nr_linii' ] ) )
			$nr_linii = $_SESSION [ 'nr_linii' ] ;
		else
			$nr_linii = 20 ;
	//LINII
	
	
	$total_rows =mysql_num_rows ( $result ) ;
	if ( empty ( $_POST ["goNext"] ) && empty ( $_POST["goBack"] ) && empty ( $_SESSION["startRow"] ) )
	{
		$i = 0 ;
		$total = $nr_linii ;
	}
	else
	{
		if ( isset ( $_SESSION["startRow"] ) )
			$i = $_SESSION["startRow"];
		else
		{
			if ( isset ( $_POST["goNext"] ) )
				$i = $_POST["goNext"] ;
			if ( isset ( $_POST["goBack"] ) )
				$i = $_POST["goBack"] ;
			$_SESSION["startRow"] = $i ;
		}
	}
	$total = $i + $nr_linii ;
	for ( ; $i <= $total ; ++ $i )
	{
		
		$date  = mktime( date("m")  , date("d"), date("Y"));
		$today = date ( "m.d.Y" , $date ) ;
		$name = mysql_result ( $result , $i , "item_code" ) ;
		$quantity = mysql_result ( $result , $i , "quantity" ) ;
		$reserved = mysql_result ( $result , $i , "reserved" ) ;
		$description = mysql_result ( $result , $i , "item_description" ) ;
		$id = mysql_result ( $result , $i , "id" ) ;
		
		if ( $i % 2 == 0 )
			echo '<tr>' ;
		else
			echo '<tr bgcolor="#EFF1F5">' ;
		echo '<font face="arial" size="2">';
		echo '<td class="gridcol" width="1%" style="align:center;text-align:center;"><a href="add_cart.php?id='.$id.'"><img src="addtocart.png"></a>' ;
		echo '<td class="gridcol" width="1%"><a href="moves.php?item='.$name.'"><img class="mediumbutton" src="moves.png" alt="Moves"></a></td>';
		echo '<td width="1%" class="gridcol" ><a href="add_move.php?item='.$name.'"><img src="addmoves.png"></a></td>';
		echo '<td width="30%" class="gridcol" style="align:center;text-align:center;">'. $name ;
		echo '<td witdh="45%" class="gridcol" style="padding-right:5px; padding-left:8px; align:center;text-align:left; ">'. $description;
		echo '<td witdh="30%" class="gridcol" style="align:center;text-align:center;">'. $quantity;
		echo '<td witdh="30%" class="gridcol" style="align:center;text-align:center;">'. $reserved;
		//echo '<td witdh="20%" bgcolor="#AAAAAA"><b>Date:'.$today.'</tr>';	
		echo '</tr>' ;
	}

?> 

</table>
<br>
<form action="../main.php" method="post">
<input type="hidden" value="<?php echo $i; ?>" name="goNext">
<input type="submit" value="Next" height="50px" width="150px"> 
</form>

<?php
	if ( ($i-2*$nr_linii-2) >= 0 )
	{
	echo '
			<form action="main.php" method="post">
			<input type="hidden" value="'.($i-(2*$nr_linii)-2).'" name="goBack">
			<?php echo $i-$nr_linii; ?>
			<input type="submit" value="Back">
			</form>';
	}
?>
    <!-- end .content --></div>
  <div class="footer">
    <p>Copyright.</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
