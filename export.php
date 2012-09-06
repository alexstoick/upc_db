
<?php require_once ( "config/session.php" ) ; confirm_logged_in ( ) ;?>
<?php require_once ( "config/config.php" ) ; ?>
<html>
<head>
<style type="text/css">
	/*body {
		font-family:Verdana, Arial, Helvetica, sans-serif;
		font-size:12px;
		margin:0px;
		padding:0px;
	}
	#atd td{
		padding:3px;
		font-weight:bold;
	}
	#avg_col{
		background-color:#CCFFCC;
	}
	#ctbl, #ctbl td{
		padding:5px;
		border: 1px solid black;
		border-collapse:collapse;
	}*/
/*style table*/
	td.header {
    background-color:#eff1f5;
    vertical-align:top;
    padding-top:3px;
    padding-bottom:3px;
    padding-left:2px;
    padding-tight:2px;
    text-align:left;
    font-size:12px;
    color:#1f386e;
    font-weight: bold;
    font-style: normal;
    border-bottom:1px solid #d2d8e3;
}
#content td.gridcol  {
    vertical-align:top;
    text-align:left;
    font-size:11px;
    padding-right:2px;
    font-family: Tahoma,Verdana,Arial,Helvetica;
}

#content td.gridcol span.big {
    font-size:12px;
}

#content td.gridcol span.big-navigation a {
    font-size:10pt;
}

#content span.big {
    font-size:12px;
}

#content span.big a {
    font-size:12px;
}

#content td.gridcol a  {
    font-size:11px;
}

#content td.gridcol input {
    vertical-align:middle;
    font-size:11px;
}

#content td.gridcol span {
    vertical-align:middle;
}

#content td.gridcol textarea {
    vertical-align:middle;
    padding-left:4px;
}

#content td.gridcol select {
    vertical-align:middle;
}

#content td.gridcol x {
    vertical-align:top;
}
#content img.mediumbutton {
    border:0px;
    margin-top:2px;
    vertical-align:middle;
    width:51px;
    height:16px;
}
<!--
.excel1 {
padding:0px;
color:black;
font-size:11.0pt;
font-weight:400;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:general;
vertical-align:bottom;
border:none;
white-space:nowrap;
}
.excel2 {
padding:0px;
color:black;
font-size:11.0pt;
font-weight:400;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:general;
vertical-align:bottom;
border:none;
white-space:nowrap;
background:#99CCFF;
}
.excel21 {
padding:0px;
color:black;
font-size:11.0pt;
font-weight:700;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:left;
vertical-align:bottom;
border:none;
white-space:nowrap;
background:#99CCFF;
}
.excel22 {
padding:0px;
color:black;
font-size:14.0pt;
font-weight:700;
font-style:normal;
text-decoration:underline;
font-family:Calibri, sans-serif;
text-align:left;
vertical-align:bottom;
border:none;
white-space:nowrap;
text-underline-style:single;
background:#99CCFF;
}
.excel3 {
padding:0px;
color:black;
font-size:11.0pt;
font-weight:400;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:left;
vertical-align:bottom;
border:none;
white-space:nowrap;
background:#99CCFF;
}
.excel12 {
padding:0px;
color:black;
font-size:11.0pt;
font-weight:400;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:left;
vertical-align:bottom;
border:none;
white-space:nowrap;
border-top:none;
border-right:none;
border-bottom:.5pt solid windowtext;
border-left:none;
background:#99CCFF;
}
.excel4 {
padding:0px;
color:black;
font-size:11.0pt;
font-weight:400;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:general;
vertical-align:bottom;
border:none;
white-space:nowrap;
border-top:none;
border-right:none;
border-bottom:.5pt solid windowtext;
border-left:none;
background:#99CCFF;
}
.excel8 {
padding:0px;
color:black;
font-size:11.0pt;
font-weight:400;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:general;
vertical-align:bottom;
border:none;
white-space:normal;
background:#99CCFF;
}
.excel5 {
padding:0px;
color:black;
font-size:11.0pt;
font-weight:700;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:general;
vertical-align:bottom;
border:.5pt solid windowtext;
white-space:normal;
background:#99CCFF;
}
.excel6 {
padding:0px;
color:black;
font-size:11.0pt;
font-weight:700;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:center;
vertical-align:bottom;
border:.5pt solid windowtext;
white-space:normal;
background:#99CCFF;
}
.excel7 {
padding:0px;
color:black;
font-size:11.0pt;
font-weight:700;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:center;
vertical-align:bottom;
border:.5pt solid windowtext;
white-space:normal;
background:#99CCFF;
}
.excel9 {
padding:0px;
color:black;
font-size:11.0pt;
font-weight:700;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:center;
vertical-align:bottom;
border:none;
white-space:normal;
background:#99CCFF;
}
.excel10 {
padding:0px;
color:black;
font-size:11.0pt;
font-weight:400;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:general;
vertical-align:bottom;
border:.5pt solid windowtext;
white-space:nowrap;
background:#99CCFF;
}
.excel13 {
padding:0px;
color:black;
font-size:10.0pt;
font-weight:400;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:general;
vertical-align:bottom;
border:.5pt solid windowtext;
white-space:nowrap;
background:#99CCFF;
}
.excel17 {
padding:0px;
color:black;
font-size:11.0pt;
font-weight:400;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:general;
vertical-align:bottom;
border:.5pt solid windowtext;
white-space:nowrap;
}
.excel16 {
padding:0px;
color:black;
font-size:11.0pt;
font-weight:400;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:general;
vertical-align:bottom;
border:.5pt solid windowtext;
white-space:nowrap;
}
.excel11 {
padding:0px;
color:black;
font-size:11.0pt;
font-weight:400;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:general;
vertical-align:bottom;
border:none;
white-space:nowrap;
background:#99CCFF;
}
.excel14 {
padding:0px;
color:windowtext;
font-size:10.0pt;
font-weight:400;
font-style:normal;
text-decoration:none;
font-family:Arial, sans-serif;
text-align:general;
vertical-align:bottom;
border:.5pt solid windowtext;
white-space:nowrap;
}
.excel18 {
padding:0px;
color:black;
font-size:10.0pt;
font-weight:400;
font-style:normal;
text-decoration:none;
font-family:Tahoma, sans-serif;
text-align:left;
vertical-align:middle;
border:.5pt solid windowtext;
white-space:normal;
}
.excel19 {
padding:0px;
color:black;
font-size:11.0pt;
font-weight:400;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:general;
vertical-align:bottom;
border:.5pt solid windowtext;
white-space:nowrap;
background:yellow;
}
.excel20 {
padding:0px;
color:black;
font-size:10.0pt;
font-weight:400;
font-style:normal;
text-decoration:none;
font-family:Tahoma, sans-serif;
text-align:general;
vertical-align:bottom;
border:.5pt solid windowtext;
white-space:normal;
}
.excel15 {
padding:0px;
color:black;
font-size:10.0pt;
font-weight:400;
font-style:normal;
text-decoration:none;
font-family:Calibri, sans-serif;
text-align:general;
vertical-align:bottom;
border:none;
white-space:nowrap;
background:#99CCFF;
}
-->
</style>
</head>
<body>
<?php
	if ( isset ( $_POST [ 'id' ] ) )
	{
		//aflam info despre Z_USER
		$query = "SELECT persoana,pers_adr , telefon , cod_loc FROM Z WHERE id='".$_POST['id']."'";
		$result = mysql_query ( $query , $connection ) ;
		$cod_loc = mysql_result ( $result , 0 , "cod_loc" ) ;
		$telefon = mysql_result ( $result , 0 , "telefon" ) ;
		$pers_adr = mysql_result ( $result , 0 , "pers_adr" ) ;
		$Z_user = mysql_result ( $result , 0 , "persoana" ) ;
		$tabel = "" ;
		$tabel .= '<table cellspacing="0" cellpadding="0" class="excel1">
				  <col width="41" style="width:31pt;">
  <col width="76" style="width:57pt;">
  <col width="102" style="width:77pt;">
  <col width="224" style="width:168pt;">
  <col width="185" style="width:139pt;">
  <col width="66" style="width:50pt;">
  <col width="104" style="width:78pt;">
  <col width="164" style="width:123pt;">
  <col width="329" style="width:247pt;">
  <col width="127" style="width:95pt;">
  <col width="89" style="width:67pt;">
  <col width="102" style="width:77pt;">
  <col width="167" style="width:125pt;">
  <col width="82" style="width:62pt;">
				  <tr style="height:15.0pt;">
    <td class="excel2" width="41" style="height:15.0pt;width:31pt;">&nbsp;</td>
    <td class="excel2" width="76" style="width:57pt;">&nbsp;</td>
    <td class="excel2" width="102" style="width:100pt;">&nbsp;</td>
    <td class="excel2" width="224" style="width:168pt;">&nbsp;</td>
    <td class="excel2" width="185" style="width:139pt;">&nbsp;</td>
    <td class="excel2" width="66" style="width:50pt;">&nbsp;</td>
    <td class="excel2" width="104" style="width:78pt;">&nbsp;</td>
    <td class="excel2" width="164" style="width:123pt;">&nbsp;</td>
    <td class="excel2" width="329" style="width:247pt;">&nbsp;</td>
    <td class="excel2" width="127" style="width:95pt;">&nbsp;</td>
    <td class="excel2" width="89" style="width:67pt;">&nbsp;</td>
    <td class="excel2" width="102" style="width:77pt;">&nbsp;</td>
    <td class="excel2" width="167" style="width:125pt;">&nbsp;</td>
    <td class="excel2" width="82" style="width:62pt;">&nbsp;</td>
  </tr>
				  <tr style="height:15.0pt;">
    <td class="excel2" style="height:15.0pt;">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
  </tr>
				  <tr style="height:18.75pt;">
    <td colspan="2" class="excel21" style="height:18.75pt;">UPC Romania</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td colspan="10" class="excel22">Formular comanda NO - proiecte</td>
  </tr>
				  <tr style="height:15.0pt;">
			    	<td class="excel3" style="height:15.0pt;">&nbsp;</td>
				    <td class="excel3">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
				    <td class="excel2" colspan="2">Se incarca pe Z-ul lui '.$Z_user.'
				    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
				  </tr>
				  <tr style="height:15.0pt;">
					  <td colspan="2" class="excel12" style="height:15.0pt;">Emitent: </td>
					  <td class="excel4">%%%%%%</td>
					  <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
				  </tr>
				  <tr style="height:15.0pt;">
    <td class="excel3" style="height:15.0pt;">&nbsp;</td>
    <td class="excel3">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
  </tr>
				  <tr style="height:15.0pt;">
			   		<td colspan="2" class="excel12" style="height:15.0pt;">Departament:</td>
					<td class="excel4">%%%%%%</td>
				    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
				  </tr>				  
				  <tr style="height:15.0pt;">
    <td class="excel3" style="height:15.0pt;">&nbsp;</td>
    <td class="excel3">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
  </tr>
				  <tr style="height:15.0pt;">
	 			    <td class="excel12" style="height:15.0pt;">Data</td>
				    <td class="excel12">&nbsp;</td>
					<td class="excel4">'.date ( "d.m.Y" , time() ).'</td>
				    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
				  </tr>
				  <tr style="height:15.0pt;">
    <td class="excel2" style="height:15.0pt;">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
  </tr>
  <tr style="height:15.0pt;">
    <td class="excel2" style="height:15.0pt;">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
  </tr>
				  <tr style="height:45.0pt;">
    <td class="excel8" width="41" style="height:45.0pt;width:31pt;">&nbsp;</td>
    <td class="excel5" width="76" style="width:57pt;">Nr crt</td>
    <td class="excel6" width="102" style="border-left:none;width:77pt;">cod Locatie    [locatia de livare]</td>
    <td class="excel6" width="224" style="border-left:none;width:168pt;">cod Oracle</td>
    <td class="excel6" width="185" style="border-left:none;width:139pt;">descriere    Oracle</td>
    <td class="excel6" width="66" style="border-left:none;width:50pt;">cantitate</td>
    <td class="excel6" width="104" style="border-left:none;width:78pt;">UM</td>
    <td class="excel6" width="164" style="border-left:none;width:123pt;">&nbsp;</td>
    <td class="excel7" width="329" style="border-left:none;width:247pt;">Persoana de    contact locatie livrare</td>
    <td class="excel7" width="127" style="border-left:none;width:95pt;">Telefon</td>
    <td class="excel8" width="89" style="width:67pt;">&nbsp;</td>
    <td class="excel9" width="102" style="width:77pt;">&nbsp;</td>
    <td class="excel8" width="167" style="width:125pt;">&nbsp;</td>
    <td class="excel8" width="82" style="width:62pt;">&nbsp;</td>
  </tr>';
		
		$user_id = $_SESSION [ 'user_id' ] ;
	
		$query = "SELECT * FROM reserved WHERE user_id='".$user_id."' AND solved='0'" ;
		$RESULT = mysql_query ( $query , $connection ) or die ( mysql_error ( ) )  ;
		for ( $i = 0 ; $i < mysql_num_rows ( $RESULT ) ; ++ $i )
		{
			
			if ( $i % 2 == 0 )
				echo '<tr>' ;
			else
				echo '<tr bgcolor="#EFF1F5">' ;
			$id = mysql_result ( $RESULT , $i , "id" ) ;
			$item_id = mysql_result ( $RESULT , $i , "item_id" ) ;
			$user_id = mysql_result ( $RESULT , $i , "user_id" ) ;
			$quantity_reserved = mysql_result ( $RESULT , $i , "quantity" ) ;
			$date = mysql_result ( $RESULT , $i , "date" ) ;
			
			$query = "SELECT item_code, quantity FROM items WHERE id='".$item_id."'";
			$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) ) ;
			$item_name = mysql_result ( $result , 0 , "item_code" ) ;
			$item_name = mysql_result ( $result , 0 , "item_description" ) ;
			$quantity_stock = mysql_result ( $result , 0 , "quantity" ) ;
		
			$query = "SELECT username FROM users WHERE id='".$user_id."'";
			$result = mysql_query ( $query , $connection ) ;
			$username = mysql_result ( $result , 0 , "username" ) ;
			
			/*$table .= '<td width="30%" class="gridcol" style="align:center;text-align:center;">'. $item_name ;
			$table .= '<td witdh="45%" class="gridcol" style="padding-right:5px; padding-left:8px; align:center;text-align:center; ">'. $username;
			$table .= '<td witdh="45%" class="gridcol" style="padding-right:5px; padding-left:8px; align:center;text-align:center; ">'. $date;
			$table .= '<td witdh="30%" class="gridcol" style="align:center;text-align:center;">'. $quantity_reserved;
			$table .= '<td witdh="30%" class="gridcol" style="align:center;text-align:center;">'. $quantity_stock;
		//echo '<td witdh="20%" bgcolor="#AAAAAA"><b>Date:'.$today.'</tr>';	
			$table .= '</tr>' ;*/
			
			$rand = $i + 1 ;
			$tabel .= '<tr>
    					<td class="excel2" style="height:15.0pt;">&nbsp;</td>';
			$tabel .= '<td class="excel10" style="border-top:none;">'.$rand.'</td>';
			$tabel .= '<td class="excel13" style="border-top:none;border-left:none;">'.$cod_loc.'</td>' ;
			$tabel .= '<td class="excel16" style="border-top:none;border-left:none;" >'.$item_name.'</td>';
			$tabel .= '<td class="excel16" style="border-top:none;border-left:none;">'.$item_description.'</td>';
			$tabel .= '<td class="excel16" style="border-top:none;border-left:none;">'.$quantity_reserved.'</td>' ;
			$tabel .= '<td class="excel16" style="border-top:none;border-left:none;">buc</td>' ;
			$tabel .= '<td class="excel16" style="border-top:none;border-left:none;">&nbsp;</td>' ;
			$tabel .= '<td class="excel13" style="border-top:none;border-left:none;">'.$pers_adr.'</td>' ;
			$tabel .= '<td class="excel13" style="border-top:none;border-left:none;">'.$telefon.'</td>' ;
			$tabel .= '<td class="excel11">&nbsp;</td>
				       <td class="excel11">&nbsp;</td>
					   <td class="excel2">&nbsp;</td>
				       <td class="excel2">&nbsp;</td></tr>';
			
			 /*
  				 <tr>
    				<td class="excel2" style="height:15.0pt;">&nbsp;</td>
					<td class="excel10" style="border-top:none;">1</td>
					<td class="excel13" style="border-top:none;border-left:none;">SVS21</td>
					<td class="excel16" style="border-top:none;border-left:none;" >TPS540QR</td>
					<td class="excel16" style="border-top:none;border-left:none;"> RO.CTO_PPC_TPS540QR.NA</td>
				    <td class="excel16" style="border-top:none;border-left:none;">5</td>
				    <td class="excel16" style="border-top:none;border-left:none;">buc</td>
				    <td class="excel16" style="border-top:none;border-left:none;">&nbsp;</td>
				    <td class="excel13" style="border-top:none;border-left:none;">Teddy Greu -    Petrosani str. Avram Iancu nr. 12 parter</td>
				    <td class="excel13" style="border-top:none;border-left:none;">0743 137 850</td>
				    <td class="excel11">&nbsp;</td>
				    <td class="excel11">&nbsp;</td>
				    <td class="excel2">&nbsp;</td>
				    <td class="excel2">&nbsp;</td>
				 </tr>
			*/
			
			
/*			$query = "UPDATE reserved SET solved = '1' WHERE id = '".$id."'";
			$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) ) ;
			$query = "DELETE FROM reserved WHERE solved='1'";
			$result = mysql_query ( $query , $connection ) or die ( mysql_error ( ) ) ;*/
		}	
		
		$tabel .= '
			  <tr style="height:15.0pt;">
    <td class="excel2" style="height:15.0pt;">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel15">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel15">&nbsp;</td>
    <td class="excel15">&nbsp;</td>
    <td class="excel11">&nbsp;</td>
    <td class="excel11">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
  </tr>
			  <tr style="height:15.0pt;">
    <td class="excel2" style="height:15.0pt;">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel15">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel15">&nbsp;</td>
    <td class="excel15">&nbsp;</td>
    <td class="excel11">&nbsp;</td>
    <td class="excel11">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
  </tr>
			  <tr style="height:15.0pt;">
    <td class="excel2" style="height:15.0pt;">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
  </tr>
			  <tr style="height:15.0pt;">
    <td class="excel2" style="height:15.0pt;">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
  </tr>
			  <tr style="height:15.0pt;">
    <td class="excel2" style="height:15.0pt;">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
  </tr>
			  <tr style="height:15.0pt;">
				    <td class="excel4" colspan="3" style="height:15.0pt;">Aprobare    Manager/Coordonator local:</td>
			    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
			  </tr>
			  <tr style="height:15.0pt;">
    <td class="excel2" style="height:15.0pt;">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
  </tr>
			  <tr style="height:15.0pt;">
				    <td colspan="3" class="excel3" style="height:15.0pt;">Nume si prenume:</td>
			    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
			  </tr>
			  <tr style="height:15.0pt;">
    <td class="excel2" style="height:15.0pt;">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
  </tr>
			  <tr style="height:15.0pt;">
    <td class="excel2" style="height:15.0pt;">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
  </tr>
			  <tr style="height:15.0pt;">
	   				<td class="excel2" colspan="2" style="height:15.0pt;">Semnatura:</td>
				    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
    <td class="excel2">&nbsp;</td>
			  </tr></table>';
		header("Content-type: application///x-msdownload"); 
		header("Content-type: application///ms-excel"); 
		# replace excelfile.xls with whatever you want the filename to default to
		header("Content-Disposition: attachment; filename=cart.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $tabel;
	}//IF isset ( $_POST [ 'id' ] ) 
?>
</body>
</html>

