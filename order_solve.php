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

	//scadam cantitatea rezervata si scadem din cantitatea disponibila.

	$quantity_to_reserve = $_POST [ "quantity" ] ;
	$query = "SELECT reserved FROM items WHERE id='".$item_id."' LIMIT 1" ;
	$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) )  ;
	
	$reserved_STOC = mysql_result ( $result , 0 , "reserved" ) ;
	$reserved_STOC -= $quantity ;
	
	$query = "UPDATE items SET reserved = '".$reserved_STOC."' WHERE id = '".$item_id."'";
	$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) ) ;

?>
