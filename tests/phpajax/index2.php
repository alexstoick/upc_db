<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("test.xml");


foreach ( $xmlDoc->childNodes AS $x )
{
	foreach ($x->childNodes AS $item)
	  {
		  foreach ( $item->childNodes as $qqvar )
			  print $qqvar->nodeName . " = " . $qqvar->nodeValue . "<br />";
	  }
}
?> 