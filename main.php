<?php require_once ( "config/session.php" ) ; confirm_logged_in ( ) ; check_all_vars();?>
<?php require_once ( "config/config.php" ) ; ?>

<?php
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
	if ( empty ( $_POST ["goNext"] ) && empty ( $_POST["goBack"] ) && empty ( $_SESSION["startRow"] ) )
	{
		$i = 0 ;
		$total = $nr_linii ;
	}
	else
	{
		if ( isset ( $_POST["goNext"] ) )
			$i = $_POST["goNext"] ;
		else
			if ( isset ( $_POST["goBack"] ) )
				$i = $_POST["goBack"] ;
			else
				$i = $_SESSION["startRow"];
		$_SESSION["startRow"] = $i ;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Warehousing database</title>
<link href="styles/thrColLiqHdr.css" rel="stylesheet" type="text/css" />
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
		var i = 0 , total = 50 ;
		document.getElementById("tablePlace").innerHTML="<img src='img/loading.gif'></img>";

		if ( from_where == "init" )
		{
			//initial request do nth about it
			last_i = i = 0 ;
			last_total = total = 0+nr_linii ;
			document.getElementById("txt1").innerHTML="INIT";
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
			//document.getElementById("back2").innerHTML="buton";
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
		mesaj = "<p><SELECT style=\"background-color: #FFFFFF; color: #000000; font-family: Arial; font-size: 11px; width: 100px;\" onchange=\"change_lines(this.value)\">";
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

<!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* this 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
ul.nav a { zoom: 1; }  /* the zoom property gives IE the hasLayout trigger it needs to correct extra whiltespace between the links */
</style>
<![endif]-->
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



<div class="container">
  <div class="header"><img src="img/sigla_upc.jpg" alt="UPC" name="Insert_logo" width="10%" height="150" id="UPC" style="background: #8090AB;" />
    <!-- end .header --></div>
  <div class="sidebar1">
    <ul class="nav">
      <?php	afis_meniu(); ?>
    </ul>
    <p> Lines per page:     
     	<div id="option2">13</div>        
     	<div id="option3"></div>
     	<div id="option4"></div>
    <p></p>
    <!-- end .sidebar1 --></div>
  <div class="content">
    <center><h1>Items in stock</h1></center>
    
    <!--TABLE-->

    <div id="txt"></div>
    <div id="txt1"></div>
    <div id="txt2"></div>
    <br>

<form>
<input type="button" value="Next" height="50px" width="150px" onMouseDown="showTable('next');"> 
</form>
<div id="back1"></div>

<div id="tablePlace"></div>

<br>

<form>
<input type="button" value="Next" height="50px" width="150px" onMouseDown="showTable('next');"> 
</form>
<div id="back2"></div>

    <!-- end .content --></div>
  <div class="footer">
    <p>Copyright.</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
