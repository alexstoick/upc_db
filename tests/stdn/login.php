<?php require_once ( "config/config.php" ) ; ?>
<?php require_once ( "config/session.php" ) ; 
	if ( logged_in () )
		redirect_to ( "main.php" ) ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student module</title>
</head>
<body>

<h2>Log in form</h2>
<?php 
	if ( empty ( $_POST ) )
	{
		echo '		
				<form action="login.php" method="post">
				Username:<input type="text" name="username" size="25" /><br />
				Password:<input type="password" name="password" size="25"  /><br />
				<input type="submit" value="Log in!" />
				</form>
			';
	}
	else
	{
		//find out if correct log in.
		$username = $_POST [ 'username' ] ;
		$password = $_POST [ 'password' ] ;
		$query = "SELECT id FROM student WHERE username='".$_POST['username']."' AND password='".$_POST['password']."' LIMIT 1";
		$result = mysql_query ( $query , $connection ) or die ( mysql_error () )  ;
		
		if ( mysql_num_rows ( $result ) > 0 )
		{
				echo 'You are now logged in.'.$_POST['username'];
				echo '<br>Redirecting you to the <a href="main.php">main page</a>';
				$_SESSION['user_id']=mysql_result ( $result , 0 , 'id' ) ;
				$_SESSION['username']= $_POST [ 'username' ] ;
				echo '<script>
						<!--
							location.replace("main.php");
						-->
					  </script>';
		}
		else
		{
			echo '		
					<form action="login.php" method="post">
					Username:<input type="text" name="username" size="25" /><br />
					Password:<input type="password" name="password" size="25"  /><br />
					<input type="submit" value="Log in!" />
					</form>
				';
		}
	}
?>
Or <a href="register.php">register</a>

</body>
</html>