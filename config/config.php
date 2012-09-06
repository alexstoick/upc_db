<?php
	$db_host = "localhost" ;
	$db_user = "root" ;
	$db_password = "wireless123" ;
	$db_name = "lucru";
	$db_move = "moves" ;
	
	$connection = mysql_connect ( $db_host , $db_user , $db_password ) or die ("Error connecting to DB");
	mysql_select_db ( $db_name , $connection ) or die ( mysql_error() ) ;
	
?>