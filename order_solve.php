<?php require_once ( "config/session.php" ) ; confirm_logged_in ( ) ;?>
<?php require_once ( "config/config.php" ) ; ?>
<?php

	if ( empty ( $_GET['order_no'] ) || empty ( $_GET['user_id'] ) || empty ( $_GET['item_id'] ) || empty ( $_GET['location'] ) || empty ( $_GET['quantity'] )  )
		redirect ( "main.php" ) ;
		
	$order_no = $_GET['order_no'];
	$user_id = $_GET['user_id'];
	$item_id = $_GET['item_id'];
	$location = $_GET['location'];
	$quantity = $_GET['quantity'];
	
	//updatam statusu in reserved
	$query = "UPDATE reserved SET solved='1' WHERE order_no='".$order_no."' AND user_id='".$user_id."' AND item_id='".$item_id."'";
	$result = mysql_query ( $query , $connection ) or die ( mysql_error () ) ;
	//adaugam miscare
	$query = "INSERT INTO `moves` (`id` ,`item_id` ,`type_move` ,`where` ,`date` ,`quantity`)
				VALUES (NULL , '".$item_id."', '2', '".$location."',CURRENT_TIMESTAMP , '".$quantity."');" ;
	$result = mysql_query ( $query , $connection ) or die ( mysql_error () ) ;
?>
