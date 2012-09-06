<?php require_once ( "config/session.php" ) ; confirm_logged_in ( ) ;?>
<?php require_once ( "config/config.php" ) ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Warehouse database</title>
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
		$query = "SELECT * FROM items WHERE `item_code`='".$_GET['id']."'";
		$result = mysql_query ( $query , $connection ) or die ( mysql_error () ) ;
		if ( (mysql_num_rows($result)==0) )
		{
			echo '<h2>Cannot find item. Redirecting back to search.</h2>';
			redirect ( "search.php" ) ;
		}
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


		$i = 0 ;
		$name = mysql_result ( $result , $i , "item_code" );
		$quantity = mysql_result ( $result , $i , "quantity" );
		$reserved = mysql_result ( $result , $i , "reserved" );
		$description = mysql_result ( $result , $i , "item_description" );
		$id = mysql_result ( $result , $i , "id" );
		$image = mysql_result ( $result , $i , "img_link" );
		
		echo '<tr bgcolor="#EFF1F5" id="coloana'.$i.'">' ;
		echo '<font face="arial" size="2">';
		if ( $image == "" )
		{
			echo '<td class="gridcol" width="1%" style="align:center;text-align:center;">
						<div id="viewlarger'.$i.'">[+]</div>
						<div id="tooltip'.$i.'" style="opacity:0.0; display:none"><img src="images/1 ('.$i.').jpg" width="100" height="100"/></div>
				  </td>' ;
		}
		else
		{
			echo '<td class="gridcol" width="1%" style="align:center;text-align:center;">
						<div id="viewlarger'.$i.'">[+]</div>
						<div id="tooltip'.$i.'" style="opacity:0.0; display:none"><img src="images/'.$image.'.jpg" width="100" height="100"/></div>
				  </td>' ;			
		}
		echo '<td class="gridcol" width="1%" style="align:center;text-align:center;"><a href="add_cart.php?id='.$id.'"><img src="img/addtocart.png"></a></td>' ;
		echo '<td class="gridcol" width="1%"><a href="moves.php?item='.$name.'"><img class="mediumbutton" src="img/moves.png" alt="Moves"></a></td>';
		echo '<td width="1%" class="gridcol" ><a href="add_move.php?item='.$name.'"><img src="img/addmoves.png"></a></td>';
		echo '<td width="30%" class="gridcol" style="align:center;text-align:center;" >'. $name.'
			  </td>' ;
		echo '<td witdh="45%" class="gridcol" style="padding-right:5px; padding-left:8px; align:center;text-align:left; ">'. $description.'</td>';
		echo '<td witdh="30%" class="gridcol" style="align:center;text-align:center;">'. $quantity. '</td>';
		echo '<td witdh="30%" class="gridcol" style="align:center;text-align:center;">'. $reserved. '</td>';
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
?> 
  
	</table>



    <!-- end .content --></div>
  <!-- end .container --></div>
    <div class="footer">
    <p>Copyright.</p>
    <!-- end .footer --></div>

</body>
</html>
