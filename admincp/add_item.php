<?php require_once ( "../config/session.php" ) ; confirm_logged_in ( ) ; confirm_admin() ;?>
<?php require_once ( "../config/config.php" ) ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Warehouse database</title>
<link href="../styles/thrColLiqHdr.css" rel="stylesheet" type="text/css" />
<!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* this 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
ul.nav a { zoom: 1; }  /* the zoom property gives IE the hasLayout trigger it needs to correct extra whiltespace between the links */
</style>
<![endif]-->
</head>

<body>

<div class="container">
  <div class="header"><img src="../img/sigla_upc.jpg" alt="UPC" name="Insert_logo" width="10%" height="150" id="UPC" style="background: #8090AB;" />
    <!-- end .header --></div>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="../main.php">Database</a></li>
      <li><a href="../view_cart.php">View Cart</a></li>
      <li><a href="../view_orders.php">View reserved items</a></li>
      <li><a href="../search.php">Search</a></li>
      <li><a href="../logout.php">Logout</a></li>
    </ul>
    <p></p>
    <!-- end .sidebar1 --></div>
  <div class="content" style="padding-left:15px">
  
  <h1><center>Add item to database</center></h1>
  <?php
  	if ( empty ( $_POST ) )
	{
		//afisam form
		echo '
			<form action="add_item.php" method="POST" enctype="multipart/form-data">
			<table style="padding:10px 0">
				
				<tr><td>Item Code:<input type="text" name="item_code" size="45"></td></tr>
				<tr><td>Item Description<input type="text" name="item_description" size="45"></td></tr>
				<tr><td>Quantity:<input type="text" name="quantity" size="5">(Number)</td></tr>
				<tr><td>Image:<input type="file" name="image">(if available)</td></tr>
				<tr><td>Row in warehouse<input type="text" name="row" size="5"></td></tr>
				<tr><td>Position in row:<input type="text" name="position" size="5"></td></tr>
				<tr><td><input type="submit" value="Submit!"></td></tr>
			</table>
			</form>';	
	}
	else
	{
		//procesam
		$item_code = $_POST ['item_code' ]; 
		$item_description = $_POST ['item_description'];
		$quantity = $_POST ['quantity'];
		$row = $_POST [ 'row' ] ;
		$position = $_POST [ 'position' ] ;
		
		//handle image
		
		$success = 0 ;
		$image=$_FILES['image']['name'];
 		//if it is not empty
	 	if ($image) 
 		{
 			//get the original name of the file from the clients machine
 			$filename = stripslashes($_FILES['image']['name']);
		 	//get the extension of the file in a lower case format
  			$extension = getExtension($filename);
 			$extension = strtolower($extension);
		 	//if it is not a known extension, we will suppose it is an error and will not  upload the file,  
			//otherwise we will do more tests
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 			{
				//print error message
	 			echo '<h2>Unknown extension!</h2>';
	 			$errors=1;
		 	}
 			else
 			{
				//get the size of the image in bytes
				//$_FILES['image']['tmp_name'] is the temporary filename of the file
				//in which the uploaded file was stored on the server
			    $size=filesize($_FILES['image']['tmp_name']);			
				//compare the size with the maxim size we defined and print error if bigger
				if ($size > MAX_SIZE*1024)
				{
						echo '<h1>You have exceeded the size limit!</h1>';
						$errors=1;
				}
				else
				{
					//we will give an unique name, for example the time in unix time format
					$image_name=time().'.'.$extension;
					//the new name will be containing the full path where will be stored (images folder)
					$newname="../images/".$image_name;
					//we verify if the image has been uploaded, and print error instead
					$copied = copy($_FILES['image']['tmp_name'], $newname);
					if (!$copied) 
					{
						$success = 1 ;
					}
				}
			}
		}
		
		
		//finish handle image
		
		echo 'Adding "'.$item_code.'" with description:"'.$item_description.'"; quantity available:'.$quantity ;
		if ( $success )
		{
			//adaugam si imaginea in query
			if ( !$row && !$position )
			{
					//basic query + imagine
					$query = "INSERT INTO items (`A` , `item_code` , `item_description` , `quantity` , `reserved` , `img_link` ) 
								VALUES ( 'R01' , '".$item_code."' , '".$item_description."' , '".$quantity."' , '0' , '".$image_name."' )" ;
			}
			else
			{
				//adaugam toate
				$query = "INSERT INTO items (`A` , `item_code` , `item_description` , `quantity` , `reserved` , `img_link` , `row` , `position` ) 
								VALUES ( 'R01' , '".$item_code."' , '".$item_description."' , '".$quantity."' , '0' , '".$image_name."' , '".$row."' , '".$position."' )" ;
			}
		}
		else
		{
			//nu avem imagine
			if ( !$row && !$position )
			{ 
					//basic query
					$query = "INSERT INTO items (`A` , `item_code` , `item_description` , `quantity` , `reserved` ) 
									VALUES ( 'R01' , '".$item_code."' , '".$item_description."' , '".$quantity."' , '0' )" ;
			}
			else
			{	//toate fara imagine
				$query = "INSERT INTO items (`A` , `item_code` , `item_description` , `quantity` , `reserved` , `row` , `position` ) 
								VALUES ( 'R01' , '".$item_code."' , '".$item_description."' , '".$quantity."' , '0' , '".$row."' , '".$position."' )" ;
			}
		}
								
		$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) ) ;
		$message = "Added your item successfully!" ;
		echo $message ;
	}
  ?>		 
  




    <!-- end .content --></div>
  <div class="footer">
    <p>Copyright.</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
