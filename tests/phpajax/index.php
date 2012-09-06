<html>
<head>
<script type="text/javascript">
function showCD(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getcd.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>

<form>
Select a CD:
<select name="cds" onChange="showCD(this.value)">
<option value="">Select a CD:</option>
<?php
	$xmlDoc = new DOMDocument();
	$xmlDoc->load("cd_catalog.xml");
	
	$x=$xmlDoc->getElementsByTagName('ARTIST');
	
	$new_atr = 'ARTIST' ;
	
	for ($i=0; $i<=$x->length-1; $i++)
	{
		//Process only element nodes
		if ($x->item($i)->nodeType==1)
		{
			$y = ($x->item($i)->parentNode);
			$cd=($y->childNodes);
			for ($j=0;$j<$cd->length;$j++)
			{
				//Process only element nodes
				if ($cd->item($j)->nodeType==1)
				{
					if ( strcmp ( $cd->item($j)->nodeName , $new_atr ) == 0 )
					{
						$new_artist = $cd -> item($j) -> childNodes -> item(0) -> nodeValue ;
						
						echo '<option value="'.$new_artist.'">'.$new_artist.'</option>';
					}
				}
			}
		}	
	}
?> 
<option value="Bob Dylan">Bob Dylan</option>
<option value="Bonnie Tyler">Bonnie Tyler</option>
<option value="Dolly Parton">Dolly Parton</option>
</select>
</form>
<div id="txtHint"><b>CD info will be listed here...</b></div>

</body>
</html>