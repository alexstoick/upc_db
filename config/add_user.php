<?php require_once ( "config/config.php" ) ; ?>
<?php

	if ( !empty ( $_POST ) )
	{
		$username = $_POST [ 'username' ] ;
		$password = $_POST [ 'password' ] ;
		$hashed_password = sha1 ( $password ) ;
		echo "U:".$username."<br>Pw:".$hashed_password ;
		$query = "INSERT INTO users ( id, username , hashed_password ) VALUES ( NULL , '".$username."', '".$hashed_password."')";
		$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) ) ;
	}
	else
	{
?> 
<form action="add_user.php" method="post">
Username:<input type="text" name="username" value=""><br>
Password:<input type="password" name="password" value=""><br>
<input type="submit" name="submit" value="Add user!">
</form>
<?php
	}
?>