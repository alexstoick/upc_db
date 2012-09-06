<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<?php
	echo '<ul>';
	$logfile = "logs.txt";
	$handle = fopen($logfile, 'r') ;
	while(!feof($handle)) {
		$entry = fgets($handle);
		
		if ( $entry[1] == "*" )
		{
			//$new_row = 
		}
		
		/*if(trim($entry) != "") {
			//echo "<li>{$entry}</li>";
		}*/
	}
	echo '</ul>';
?>

</body>
</html>