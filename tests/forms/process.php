<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<?php
	//validam datele
	if ( !empty ( $_POST ) )
	{
		$rezolvare = $_POST [ 'rezolvare' ] ;
		$motive = $_POST ['motive'];
		$afacere = $_POST [ 'afacere' ] ;
		$ajutati = $_POST ['ajutati' ];
		$tipAjutor = $_POST ['tipAjutor'];
		if ( !empty ( $_POST [ 'altele' ] ) )
			$altele = $_POST ['altele'];
		$tineri = $_POST [ 'tineri' ] ;
		$atStat = $_POST [ 'atStat' ] ;
		
//		echo "rezolvare:".$rezolvare."\nmotive:".$motive."\naltele:".$altele."\nafacere:".$afacere."\najutati:".$ajutati.
//			 "\ntipAjutor:".$tipAjutor."\ntineri:".$tineri."\natStat:".$atStat ;
		
		//cream fisierul text nou
		$logfile = "logs.txt" ;
		if ( $handle = fopen ( $logfile , 'a' ) ) 
		{
			if ( !empty( $_POST ['altele'] ) ) 
				$content = "\n******\n".
				"rezolvare:".$rezolvare."\nmotive:".$motive."\naltele:".$altele."\nafacere:".$afacere."\najutati:".$ajutati.
				 "\ntipAjutor:".$tipAjutor."\ntineri:".$tineri."\natStat:".$atStat
				 		  ."\n******";
			else
				$content = "\n******\n".
				"rezolvare:".$rezolvare."\nmotive:".$motive."\nafacere:".$afacere."\najutati:".$ajutati.
				 "\ntipAjutor:".$tipAjutor."\ntineri:".$tineri."\natStat:".$atStat
				 		  ."\n******";
			
			fwrite ( $handle , $content ) ;
			fclose ( $handle ) ;
		}
	}
?>

<!-- AFISEZI CEVA DE COMPLETARE BLABLA -->



</body>
</html>