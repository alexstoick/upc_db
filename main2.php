<?php require_once ( "config/session.php" ) ; confirm_logged_in ( ) ; check_all_vars();?>
<?php require_once ( "config/config.php" ) ; ?>

<?php
	if ( isset ( $_SESSION [ 'nr_linii' ] ) )
		$nr_linii = $_SESSION [ 'nr_linii' ] ;
	else
		$nr_linii = 20 ;

	//LINII
	if ( empty ( $_SESSION["startRow"] ) )
	{
		$i = 0 ;
		$total = $nr_linii ;
		$_SESSION ["startRow"] = $i;
	}
	else
	{
		$_SESSION["startRow"] = $i ;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Warehousing database</title>
<link rel="stylesheet" href="css/text.css" />
<link rel="stylesheet" href="css/960.css" />
<link rel="stylesheet" href="css/demo.css" />

<script type="text/javascript" src="styles/jquery.js"></script>
<script type="text/javascript">
	var last = -1 ;
	var last_i = 0 , last_total = 0 ;
	var nr_linii = <?php echo $nr_linii; ?>;
	
	function change_lines ( lines )
	{
		nr_linii = parseInt(lines);
		showTable("init");
	}
	
	function showTable(from_where)
	{
		var i , total ;
		document.getElementById("tablePlace").innerHTML="<img src='img/loading.gif'></img>";

		if ( from_where == "init" )
		{
			//initial request 
			//set variables
			last_i = i = 0 ;
			last_total = total = 0+nr_linii ;
		}
		else
			if ( from_where == "next" )
			{
				i = last_total ;
				total = last_total+nr_linii;
			}
			else
				if ( from_where == "back" )
				{
					i = last_i - nr_linii;
					total = last_total - nr_linii;
				}
		document.getElementById("txt1").innerHTML="Showing items from "+(i+1)+" to "+(total+1);
		if ( i >= nr_linii )
		{
			//afisam buton de back
			document.getElementById("back2").innerHTML="<form><input type=\"button\" value=\"Back\" height=\"50px\" width=\"150px\" onmousedown=\"showTable(\'back\');\"></form>";
			document.getElementById("back1").innerHTML="<form><input type=\"button\" value=\"Back\" height=\"50px\" width=\"150px\" onmousedown=\"showTable(\'back\');\"></form>";		
		}
		else
		{
			document.getElementById("back2").innerHTML="";
			document.getElementById("back1").innerHTML="";
		}
		var url = "table.php?i="+i+"&total="+total;
		$('#tablePlace').load(url);
		last_i = i ;
		last_total = total ;
	}
	
    $(function() {
		showTable("init");
		var linii = [20,50,100,200] ;
		//generare select
		var mesaj = new String ;
		mesaj = "<SELECT style=\"background-color: #FFFFFF; color: #000000; font-family: Arial; font-size: 11px; width: 100px;\" onchange=\"change_lines(this.value)\">";
		mesaj = mesaj + ('<OPTION>'+nr_linii.toString()+'</OPTION>');
		for ( i = 0 ; i < 4 ; ++ i )
		{
			if ( linii[i] != nr_linii )
				mesaj = mesaj + ('<OPTION>'+linii[i].toString()+'</OPTION>');
		}
		mesaj+='</SELECT>';
		document.getElementById("option2").innerHTML = mesaj;

    });
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

</head>

<body>
	<div class="container_12" style="margin-top:20px;">
		<div class="clear"></div>
		<div class="grid_12"><p></p></div>
		<div class="grid_12">
			<h1>
				Items in stock
			</h1>
		</div>

		<div class="clear"></div>

		<div class="grid_2">
				<ul class="nav">
					<?php afis_meniu(); ?>
				</ul>
				<h5>Lines per page:<div id="option2">13</div></h5>
		</div>
		<div class="grid_10">
			
			<div id="txt"></div>
		    <h5><div id="txt1"></div></h5>
			<form>
				<input type="button" value="Next" height="50px" width="150px" onMouseDown="showTable('next');"> 
			</form>
			<div id="back1"></div>

			<div id="tablePlace"></div>

			<form>
				<input type="button" value="Next" height="50px" width="150px" onMouseDown="showTable('next');"> 
			</form>
			<div id="back2"></div>

		</div>
		
		<div class="clear"></div>
	</div>

</body>
</html>
