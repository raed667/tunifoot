<?php 
session_start();
$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = 'uploads/Terrains';   //2

$IdT=$_GET["IdT"];

$Num=$_GET["Num"];

 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3              
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
	
     
    $targetFile =  $targetPath.'imgTerrain' .$IdT._.$Num.'.jpg';  //5
 
    move_uploaded_file($tempFile,$targetFile); //6   
}
?>      