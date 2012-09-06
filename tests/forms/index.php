<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css" />
	<script type="text/javascript" src="styles/jquery.js"></script>
	<script type="text/javascript" src="styles/header.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Beggary : Form</title>

<script type="text/javascript">
	function showField ( id )
	{
		//alert ( id ) ;
		var str ;
		str= "<textarea name='"+id+"' cols='100' rows='10'></textarea>";
		if ( document.getElementById(id).innerHTML != "" )
			document.getElementById(id).innerHTML = "" ;
		else
			document.getElementById(id).innerHTML = str ;
	}
	function hideField ( id )
	{
		document.getElementById(id).innerHTML = "" ;
	}
	var VAR ;
	function get_radio_value( radioB )
	{
		for (var i=0; i < radioB.length; i++)
		{
			if ( radioB[i].checked)
			{
				var val = radioB[i].value;
			}
		}
		return val;
	}
	
	function validateForm ( form )
	{
		ok = true ;
		rezolvare = form.rezolvare.value ;
		
		motive = get_radio_value (document.forms["formName"].motive) ;
		afacere = get_radio_value (document.forms["formName"].afacere);
		ajutati = get_radio_value (document.forms["formName"].ajutati);
		tipAjutor = form.tipAjutor.value;
		tineri = form.tineri.value;
		atStat = form.atStat.value ;
		
		//alert ( "rezolvare:"+rezolvare + "\n" + "motive:" +motive + "\n" + "afacere:" + afacere +"\n" +  "ajutati:"+ ajutati +"\n" + "tipAjutor:" + tipAjutor +"\n" +  "tineri:"+tineri +"\n" +  "atStat:" + atStat ) ;
		if ( rezolvare == ""  )
			ok = false ;
		if ( tipAjutor == "" )
			ok = false ;
		if ( tineri == "" )
			ok = false ;
		if ( atStat == "" )
			ok = false ;
			
		
		if ( afacere == undefined )
			ok = false ;
		if ( motive == undefined )
			ok = false ;
		if ( ajutati == undefined )
			ok = false ;
		if ( ok == false )
		{
			if ( rezolvare == ""  )
			{
				var o = document.getElementById("rezolvare");
				o.style.backgroundColor = "#F00" ;
			}
			else
			{
				var o = document.getElementById("rezolvare");
				o.style.backgroundColor = "#FFF" ;
			}
			
			
			if ( tipAjutor == ""  )
			{
				var o = document.getElementById("tipAjutor");
				o.style.backgroundColor = "#F00" ;
			}
			else
			{
				var o = document.getElementById("tipAjutor");
				o.style.backgroundColor = "#FFF" ;
			}
			
			if ( atStat == ""  )
			{
				var o = document.getElementById("atStat");
				o.style.backgroundColor = "#F00" ;
			}	
			else
			{
				var o = document.getElementById("atStat");
				o.style.backgroundColor = "#FFF" ;
			}
			
			if ( tineri == "" )	
			{
				var o = document.getElementById("tineri");
				o.style.backgroundColor = "#F00" ;
			}	
			else
			{
				var o = document.getElementById("tineri");
				o.style.backgroundColor = "#FFF" ;
			}	
										
			if ( motive == undefined )
			{
				var o = document.getElementById("motive");
				o.style.color = "#F00" ;
				o.style.fontWeight = "bold" ;
			}
			else			
			{
				var o = document.getElementById("motive");
				o.style.color = "#FFF" ;
				o.style.fontWeight = "normal" ;
			}
			
			if ( ajutati == undefined )
			{
				var o = document.getElementById("ajutati");
				o.style.color = "#F00" ;
				o.style.fontWeight = "bold" ;				
			}
			else
			{
				var o = document.getElementById("ajutati");
				o.style.color = "#FFF" ;
				o.style.fontWeight = "normal" ;				
			}
			
			if ( afacere == undefined )
			{
				var o = document.getElementById("afacere");
				o.style.color = "#F00" ;	
				o.style.fontWeight = "bold" ;			
			}		
			else
			{
				var o = document.getElementById("afacere");
				o.style.color = "#FFF" ;	
				o.style.fontWeight = "normal" ;			
			}	
			
		}
		return ok;
	}
</script>
</head>
<body>
<div id="title123" class="title"></div>
<div id="mainWrapper">
<div id="form">
<!--		var str ;
		str= "<textarea name='"+id+"' cols='25' rows='10'></textarea>";
		action="process.php" method="POST">
-->
<form name="formName" action="process.php" method="post" onsubmit="return validateForm(formName)">
  
Cum credeti ca cersetoria ar putea fi rezolvata?<br />
<textarea id="rezolvare" name="rezolvare" cols="100" rows="10"></textarea>
<br />

<br />
<div id="motive">Care sunt motivele care ii fac pe oameni sa cerseasca?</div><br />
	<input type="checkbox" name="motive" value="Saracia" />Saracia<br />
    <input type="checkbox" name="motive" value="Neputinta" />Neputinta<br />
  <input type="checkbox" name="motive"   onChange="showField('altele')" value="Altele" />Alt motiv<br />
	<div id="altele"></div><br />
	
<div id="afacere">
Credeti ca cersetoria a devenit o afacere ?</div>
<p>
    <input type="radio" name="afacere" id="2" value="Da" />Da<br />
    <input type="radio" name="afacere" id="2" value="Nu" />Nu<br />
</p>

<div id="ajutati">
Ajutati ? Cat de des ?<br /></div>
<p>

    <input type="radio" name="ajutati" id="3" value="1luna" />1 data pe luna<br />
    <input type="radio" name="ajutati" id="3" value="2-3ori" />2-3 ori pe luna<br />
    <input type="radio" name="ajutati" id="3" value="Niciodata" />Niciodata<br />    
</p>


Cum ii ajutati pe cersetori?<br />
<textarea id="tipAjutor"name="tipAjutor" cols="100" rows="10"></textarea><br /><br />



Ce parere aveti de tinerii care cersesc ?<br>
<textarea id="tineri" name="tineri" cols="100" rows="10"></textarea><br /><br />



Ce parere aveti despre atitudinea statului fata de aveasta problema ?<br />
<textarea id="atStat" name="atStat" cols="100" rows="10"></textarea>
<br />
<input type="submit" value="Submit!"/>

</form>
<!--<a href="show_logs.php"> View entries</a>-->
</div>
</div>
</body>
</html>