
<?php require_once ( "config/session.php" ) ; confirm_logged_in ( ) ;?>
<?php require_once ( "config/config.php" ) ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Warehouse database</title>
<link href="styles/thrColLiqHdr.css" rel="stylesheet" type="text/css" />
<script>
<!--
	function confirmation (item_id,item_name,quantity,user_id,order_no,place_to_update) 
	{
		var message = "Are you sure you want to confirm sending of:"+item_name+" in quantity of:"+quantity +"?\nSending to:" ;
		var answer = prompt ( message ) ;
		if ( answer )
		{
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
			    	{
					    document.getElementById(place_to_update).innerHTML="Sent!";
				    }
			}
			xmlhttp.open("GET","order_solve.php?item_id="+item_id+"&user_id="+user_id+"&order_no="+order_no+"&location="+answer+"&quantity="+quantity,true);
			xmlhttp.send();
		}//if answer
	}
//-->
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
  <div id="txt"></div>
  <?php
		if ( empty ( $_GET['order_no'] ) )
		{
			redirect ( "main.php" ) ;
		}
		$order_no = $_GET ['order_no'];
  ?>
  <table width="100%" cellspacing="2" cellpadding="2" style="font:11px Verdana; padding:20px" id="theList">
	<tr >
		<td width="30%" style="align:center;text-align:center;" class="header"><b>Name</b></td>
		<td width="30%" style="align:center;text-align:center;" class="header"><b>Description</b></td>        
		<td width="10%" bgcolor="#999999" style="align:center;text-align:center;" class="header"><b>Quantity reserved</b></td>
		<td width="10%" style="align:center;text-align:center;" class="header"><b>Quantity in stock</b></td>
   		<td width="30%" style="align:center;text-align:center;" class="header"><b>Confirm sending</b></td>
	</tr>
    <?php
		
			$user_id = $_SESSION [ 'user_id' ] ;
			
			$query = "SELECT * FROM reserved WHERE user_id='".$user_id."' AND order_no = '".$order_no."'" ;
			$RESULT = mysql_query ( $query , $connection ) or die ( mysql_error ( ) )  ;
			for ( $i = 0 ; $i < mysql_num_rows ( $RESULT ) ; ++ $i )
			{
				
				if ( $i % 2 == 0 )
					echo '<tr>' ;
				else
					echo '<tr bgcolor="#EFF1F5">' ;
				$solved = mysql_result ( $RESULT , $i , 'solved' ) ;
				$id = mysql_result ( $RESULT , $i , "id" ) ;
				$item_id = mysql_result ( $RESULT , $i , "item_id" ) ;
				$user_id = mysql_result ( $RESULT , $i , "user_id" ) ;
				$quantity_reserved = mysql_result ( $RESULT , $i , "quantity" ) ;
				$date = mysql_result ( $RESULT , $i , "date" ) ;
				
				$query = "SELECT item_code, item_description, quantity FROM items WHERE id='".$item_id."'";
				$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) ) ;
				$item_name = mysql_result ( $result , 0 , "item_code" ) ;
				$quantity_stock = mysql_result ( $result , 0 , "quantity" ) ;
				$description = mysql_result ( $result , 0 , "item_description" ) ;
				
				$query = "SELECT username FROM users WHERE id='".$user_id."'";
				$result = mysql_query ( $query , $connection ) ;
				$username = mysql_result ( $result , 0 , "username" ) ;
					
				echo '<td width="30%" class="gridcol" style="align:center;text-align:center;">'. $item_name ;
				echo '<td witdh="45%" class="gridcol" style="padding-right:5px; padding-left:8px; align:center;text-align:center; ">'. $description;
				echo '<td witdh="30%" class="gridcol" style="align:center;text-align:center;">'. $quantity_reserved;
				echo '<td witdh="30%" class="gridcol" style="align:center;text-align:center;">'. $quantity_stock;
				if ( $solved == 0 )
					echo '<td witdh="30%" class="gridcol" style="align:center;text-align:center;" id="confirmation'.$i.'"><input type="button" 
							onClick="confirmation(\''.$item_id.'\',\''.$item_name.'\',\''.$quantity_reserved.'\',\''.$user_id.'\',\''.$order_no.'\',\'confirmation'.$i.'\')" value="Confirm!">';				
				else
					echo '<td witdh="30%" class="gridcol" style="align:center;text-align:center;">Sent!';
				//echo '<td witdh="20%" bgcolor="#AAAAAA"><b>Date:'.$today.'</tr>';	
				echo '</tr>' ;
			}	

	?>
	</table>

    <!-- end .content --></div>
  <div class="footer">
    <p>Copyright.</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
