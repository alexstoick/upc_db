<?php require_once ( "config/config.php" ) ; ?>
<?php require_once ( "config/session.php" ) ; confirm_logged_in ( ) ;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<?php
	//verify is we have info sent 
	if ( isset ( $_POST [ 'info' ] ) )
	{
		//update info
		$query = "UPDATE student SET info='".$_POST['info']."' WHERE username='".$_SESSION['username']."'";
		$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) ) ;
		$message="Updated your basic information!";
	}
	if ( isset ( $_POST [ 'extra_info' ] ) )
	{
		$query = "UPDATE student SET extra_info='".$_POST['extra_info']."' WHERE username='".$_SESSION['username']."'";
		$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) ) ;		
		$message="Updated your extra information!" ;
	}
	//geting info and extra info about user
	$query = "SELECT info,extra_info FROM student WHERE username='".$_SESSION['username']."'";
	$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) ) ;
	$info = mysql_result ( $result , 0 , 'info' ) ;
	$extra_info = mysql_result ( $result , 0 , 'extra_info' ) ;

?>

<h1>Hello <?php echo $_SESSION['username']; ?></h1>
<?php 
	if ( isset ( $message ) )
		echo $message.'<br'; 
		
?>
Your basic information is:<BR />
<form action="main.php" method="post">
<textarea name="info" cols="50" rows="10"><?php echo $info;?></textarea>
<input type="submit" name="infoBtn" value="Update!" />
</form>
<br /><br />
Your extra information is:<BR />
<form action="main.php" method="post">
<textarea name="extra_info" cols="50" rows="10"><?php echo $extra_info;?></textarea>
<input type="submit" name="extra_infoBtn" value="Update!" />
</form>
</body>
</html>