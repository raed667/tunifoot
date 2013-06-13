<?php 
session_start();
//$ds  = DIRECTORY_SEPARATOR;  
 
//$storeFolder = 'uploads/Terrains';   

$IdT=$_GET["IdT"];
$IdP=$_SESSION['IdP'];
$Num=$_GET["Num"];

 	$myFile = 'uploads/Terrains/imgTerrain'.$IdT._.$Num.'.jpg';
 	$fh = fopen($myFile, 'w') or die("can't open file");
	fclose($fh);
    unlink($myFile);
	
header('location: ../Vue/Gallery.php?IdT='.$IdT.'&IdP='.$IdP.'&S=1');
//header('Location: ' . $_SERVER['HTTP_REFERER']);

?>      