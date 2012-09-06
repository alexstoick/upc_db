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
 <h1><center>Inspect moves on item:<?php echo $_GET[ "item" ] ; ?><center> </h1>
<?php
	
	$name = $_GET [ "item" ] ;
	$link='moves.php?'.$_SERVER['QUERY_STRING'];;
	
	if ( ! empty ( $_POST ) )
	{
		$from_day = $_POST [ "from_day" ] ;
		$from_month = $_POST [ "from_month" ] ;
		$from_year = $_POST [ "from_year" ] ;
		$to_day = $_POST [ "to_day" ] ;
		$to_month = $_POST [ "to_month" ] ;
		$to_year = $_POST [ "to_year" ] ;
		$type = $_POST [ "movement_type" ] ;
		
/*		echo $from_day.' '.$from_month.' '.$from_year. '<br>';
		echo $to_day.' '.$to_month.' '.$to_year . '<br>';*/
		
		switch ( $from_month )
		{
			case 'January': $from_month = 1 ; break ;
			case 'February': $from_month = 2 ; break ;
			case 'March': $from_month = 3 ; break ;
			case 'April': $from_month = 4 ; break ;
			case 'May': $from_month = 5 ; break ;
			case 'June': $from_month = 6 ; break ;
			case 'July': $from_month = 7 ; break ;
			case 'August': $from_month = 8 ; break ;
			case 'September': $from_month = 9 ; break ;
			case 'Octomber': $from_month = 10 ; break ;
			case 'November': $from_month = 11 ; break ;
			case 'December': $from_month = 12 ; break ;
		}
		
		switch ( $to_month )
		{
			case 'January': $to_month = 1 ; break ;
			case 'February': $to_month = 2 ; break ;
			case 'March': $to_month = 3 ; break ;
			case 'April': $to_month = 4 ; break ;
			case 'May': $to_month = 5 ; break ;
			case 'June': $to_month = 6 ; break ;
			case 'July': $to_month = 7 ; break ;
			case 'August': $to_month = 8 ; break ;
			case 'September': $to_month = 9 ; break ;
			case 'Octomber': $to_month = 10 ; break ;
			case 'November': $to_month = 11 ; break ;
			case 'December': $to_month = 12 ; break ;
		}
		
/*		echo $from_day.' '.$from_month.' '.$from_year. '<br>';
		echo $to_day.' '.$to_month.' '.$to_year . '<br>';*/
		
		$from_raw  = mktime( 1, 0, 0, $from_month, $from_day , $from_year );
		$to_raw  = mktime( 1, 0, 0, $to_month , $to_day , $to_year );
		$from_date = date ("Y-m-d" , $from_raw ) ;
		$to_date = date ("Y-m-d" , $to_raw ) ;
		//echo $from_date. ' '. $to_date.'<br>' ;
		$query = "SELECT * FROM items WHERE item_code='".$name."'" ;
		$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) );
		$item_id = mysql_result ( $result , 0 , 'id' ) ;

		if ( mysql_num_rows ( $result ) == 0 )
		{
			echo "Object does not exist!" ;
		}
		else
		{
			echo "From --".$from_date ;
			echo "<br>To -- ".$to_date ; 
			
			switch ( $type )
			{
				case "In" : $query = "SELECT * FROM moves WHERE item_id='".$item_id."' AND type_move='1'";break;
				case "Out" : $query = "SELECT * FROM moves WHERE item_id='".$item_id."' AND type_move='2'";break;
				case "Both" : $query = "SELECT * FROM moves WHERE item_id='".$item_id."'" ; break ;
			}
	
			if ( mysql_num_rows ( $result ) == 0 )
			{
				echo "No moves on this object!" ;
			}
			else
			{
				echo '<table width="50%">
					<tr>
						<td width="20%" bgcolor="#999999" style="align:center;text-align:center;"><b>Name</b></td>
						<td width="30%" bgcolor="#999999" style="align:center;text-align:center;" colspan="2"><b>Description</b></td>
					</tr>
					<tr>' ;
	
		
				$description = mysql_result ( $result , 0 , "item_description" ) ;
				$STOC = mysql_result ( $result , 0 , "quantity" ) ;
				echo '<td style="align:center;text-align:center;">'.$name.'</td><td style="align:center;text-align:center;" colspan="2" >'.$description.'</td>' ;
		 		echo '</tr>
						<tr>
							<td width="20%" bgcolor="#999999" style="align:center;text-align:center;"><b> Where </b></td>
							<td width="15%" bgcolor="#999999" style="align:center;text-align:center;"><b> Time </b></td>
							<td width="15%" bgcolor="#999999" style="align:center;text-align:center;"><b> Quantity </b></td>
						</tr>';
				$added = 0 ;
				$taken = 0 ;
				$result = mysql_query ( $query , $connection ) or die ( mysql_error () ) ;
				for ( $i = 0 ; $i < mysql_num_rows ( $result ) ; ++ $i )
				{

					$date_DB = mysql_result ( $result , $i , "date" ) ;
					if ( $from_date <= $date_DB && $date_DB <= $to_date )
					{
						$movement_type = mysql_result ( $result , $i , "type_move" ) ;
						$quantity = mysql_result ( $result , $i , "quantity" ) ;
						$where = mysql_result ( $result , $i , "where" ) ;
						if ( $movement_type == 1 ) //intrare
						{
							echo "<tr><td style='align:center;text-align:center;'><img src='img/up.jpg' >" ;//height='22px' width='22px'
							$added += $quantity;
						}
						else //iesire
						{
							echo "<tr><td style='align:center;text-align:center;'><img src='img/down.jpg'>" ;
							$taken += $quantity;
						}
				
						echo $where.'</td><td style="align:center;text-align:center;"> '. $date_DB.'</td><td style="align:center;text-align:center;">'. $quantity ;
						echo '</tr>' ;
					}
				}
		 		echo '</table>';
				$total = $added + $taken ;
				echo "Total movements:".$total."(<img src='img/up.jpg'>".$added."&nbsp;,&nbsp;<img src='img/down.jpg'>".$taken.")";
				echo "<br>" ;
				echo "In stock now:". $STOC."<br \>";
				
			}
		}
	}
 else
{
	echo '<br>Select date :<p height="20px"></p>';
?>

<form method="POST" action="<?php echo $link;?>">
<?php
echo 'From:
<SELECT name= "from_day" style="background-color: #FFFFFF; color: #000000; font-family: Arial; font-size: 11px; width: 100px; ">
	<OPTION>1</OPTION>
	<OPTION>2</OPTION>
	<OPTION>3</OPTION>
	<OPTION>4</OPTION>
	<OPTION>5</OPTION>
	<OPTION>6</OPTION>
	<OPTION>7</OPTION>
	<OPTION>8</OPTION>
	<OPTION>9</OPTION>
	<OPTION>10</OPTION>
	<OPTION>11</OPTION>
	<OPTION>12</OPTION>
	<OPTION>13</OPTION>
	<OPTION>14</OPTION>
	<OPTION>15</OPTION>
	<OPTION>16</OPTION>
	<OPTION>17</OPTION>
	<OPTION>18</OPTION>
	<OPTION>19</OPTION>
	<OPTION>20</OPTION>
	<OPTION>21</OPTION>
	<OPTION>22</OPTION>
	<OPTION>23</OPTION>
	<OPTION>24</OPTION>
	<OPTION>25</OPTION>
	<OPTION>26</OPTION>
	<OPTION>27</OPTION>
	<OPTION>28</OPTION>
	<OPTION>29</OPTION>
	<OPTION>30</OPTION>
	<OPTION>31</OPTION>
</SELECT>
<SELECT name="from_month" style="background-color: #FFFFFF; color: #000000; font-family: Arial; font-size: 11px; width: 100px; ">
	<OPTION>January</OPTION>
	<OPTION>February</OPTION>
	<OPTION>March</OPTION>
	<OPTION>April</OPTION>
	<OPTION>May</OPTION>
	<OPTION>June</OPTION>
	<OPTION>July</OPTION>
	<OPTION>August</OPTION>
	<OPTION>September</OPTION>
	<OPTION>October</OPTION>
	<OPTION>November</OPTION>
	<OPTION>December</OPTION>
</SELECT>
<SELECT name="from_year" style="background-color: #FFFFFF; color: #000000; font-family: Arial; font-size: 11px; width: 100px; ">
	<OPTION>2010</OPTION>
	<OPTION>2011</OPTION>
	<OPTION>2012</OPTION>
	<OPTION>2013</OPTION>		
</SELECT>
<p style="height:15px">
To: <SELECT name="to_day" style="background-color: #FFFFFF; color: #000000; font-family: Arial; font-size: 11px; width: 100px; ">
	<OPTION>1</OPTION>
	<OPTION>2</OPTION>
	<OPTION>3</OPTION>
	<OPTION>4</OPTION>
	<OPTION>5</OPTION>
	<OPTION>6</OPTION>
	<OPTION>7</OPTION>
	<OPTION>8</OPTION>
	<OPTION>9</OPTION>
	<OPTION>10</OPTION>
	<OPTION>11</OPTION>
	<OPTION>12</OPTION>
	<OPTION>13</OPTION>
	<OPTION>14</OPTION>
	<OPTION>15</OPTION>
	<OPTION>16</OPTION>
	<OPTION>17</OPTION>
	<OPTION>18</OPTION>
	<OPTION>19</OPTION>
	<OPTION>20</OPTION>
	<OPTION>21</OPTION>
	<OPTION>22</OPTION>
	<OPTION>23</OPTION>
	<OPTION>24</OPTION>
	<OPTION>25</OPTION>
	<OPTION>26</OPTION>
	<OPTION>27</OPTION>
	<OPTION>28</OPTION>
	<OPTION>29</OPTION>
	<OPTION>30</OPTION>
	<OPTION>31</OPTION>
</SELECT>
<SELECT name="to_month" style="background-color: #FFFFFF; color: #000000; font-family: Arial; font-size: 11px; width: 100px; ">
	<OPTION>January</OPTION>
	<OPTION>February</OPTION>
	<OPTION>March</OPTION>
	<OPTION>April</OPTION>
	<OPTION>May</OPTION>
	<OPTION>June</OPTION>
	<OPTION>July</OPTION>
	<OPTION>August</OPTION>
	<OPTION>September</OPTION>
	<OPTION>October</OPTION>
	<OPTION>November</OPTION>
	<OPTION>December</OPTION>
</SELECT>
<SELECT name="to_year" style="background-color: #FFFFFF; color: #000000; font-family: Arial; font-size: 11px; width: 100px; ">
	<OPTION>2010</OPTION>
	<OPTION>2011</OPTION>
	<OPTION>2012</OPTION>
	<OPTION>2013</OPTION>	
</SELECT>
</p>
<p style="height:25px">
Movement type: 
<SELECT name="movement_type" style="background-color: #FFFFFF; color: #000000; font-family: Arial; font-size: 11px; width: 100px; ">
	<OPTION>Both</OPTION>
	<OPTION>In</OPTION>
	<OPTION>Out</OPTION>	
</SELECT>
<input name="submit_btn" type="submit" value="Submit">
</form>';
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
