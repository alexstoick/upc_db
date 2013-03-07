<?php
	session_start();
	
	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
	
	function logged_in() {
		return isset($_SESSION['user_id']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) 
		{
			redirect_to("login.php");
		}
	}
	function check_all_vars() {
		if ( $_SESSION['startRow']<0)
			$_SESSION['startRow']=0;
		if ( $_SESSION['startRow']>4000)
			$_SESSION['startRow']=0;
	}
	function confirm_admin() {
		if ( $_SESSION['username'] == "admin" ) 
			return true ;
		return false;
	}
	
	define ("MAX_SIZE","25000");
	
	function getExtension($str) {
        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
 	}
	
	function redirect ( $location )
	{
		echo '<script>
				<!--
					location.replace("'.$location.'");
				-->
			  </script>';
	}
	
	function afis_meniu()
	{
		//in functie de user_id
		
		 echo '<li><a href="main.php">Database</a></li>' ; //main link
		 echo '<li><a href="view_cart.php">View Cart</a></li>'; //cart
		 echo '<li><a href="view_orders.php">View orders</a></li>'; //orders
	     echo '<li><a href="search.php">Search</a></li>';//search
		 
		 //add the admin control panel link - add_item so far
		 echo '<li><a href="admincp/add_item.php">Add item</a></li>';
		 //fin admin panel
		 
		 echo '<li><a href="logout.php">Logout</a></li>';//logout
	}
?>
<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-27142889-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>