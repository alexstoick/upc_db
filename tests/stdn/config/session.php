<?php
	require_once ( "config/config.php" ) ;
	session_start();
	
	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
	
	function logged_in() {
		//echo 'user_id ='.$_SESSION['user_id'];
		
		$db_host = "localhost" ;
		$db_user = "root" ;
		$db_password = "wireless123" ;
		$db_name = "stdn";
		$db_move = "moves" ;
	
		$connection = mysql_connect ( $db_host , $db_user , $db_password ) or die ("Error connecting to DB");
		mysql_select_db ( $db_name , $connection ) or die ( mysql_error() ) ;
			
		$query = "SELECT id FROM student WHERE username='".$_SESSION['username']."' LIMIT 1";
		$result = mysql_query ( $query , $connection ) ;
		
		return isset($_SESSION['user_id'])&& ( mysql_num_rows ( $result ) );
	}
	
	function confirm_logged_in() {
		if (!logged_in()) 
		{
			redirect_to("login.php");
		}
	}
?>