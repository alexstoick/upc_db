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
  
  
  
  
  
  
<h1><center>Inspect reserved items</center></h1>
<table border="0" cellspacing="2" cellpadding="2" style="font:11px Verdana padding-left:25px">
<tr >

<td width="30%" style="align:center;text-align:center;" class="header"><b>Order number</b></td>
<td width="15%" style="align:center;text-align:center;" class="header"><b>User that ordered</b></td>
</tr>
<?php
	
		$query = "SELECT DISTINCT user_id,order_no FROM reserved WHERE order_no >0";
		$RESULT = mysql_query ( $query , $connection ) or die ( mysql_error () ) ;
		$total = mysql_num_rows ( $RESULT ) ;
		
		for ( $i = 0 ; $i < $total ; ++ $i )
		{
			if ( $i % 2 == 0 )
				echo '<tr>' ;
			else
				echo '<tr bgcolor="#EFF1F5">' ;
			
			$user_id = mysql_result ( $RESULT , $i , 'user_id' ) ;
			
			$query = "SELECT username FROM users WHERE id='".$user_id."'";
			$result = mysql_query ( $query , $connection ) ;
			 
			$username = mysql_result ( $result , 0 , 'username' ) ;
			$order_no = mysql_result ( $RESULT, $i , 'order_no' ) ;
			echo '<td><center><a href="inspect_order.php?order_no='.$order_no.'">'.$order_no.'</a></center></td>';			
			echo '<td><center>'.$username.'</center></td>';
			echo '</tr>';
			
		}
				
			
?>
</table>
<a href="main.php"><img src="back.jpg" /></a>




    <!-- end .content --></div>
  <div class="footer">
    <p>Copyright.</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
