<?php 
session_start();
$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = 'uploads';   //2

 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3              
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
	
	if ($_SESSION['Type']=='Joueur')
     
    $targetFile =  $targetPath.'imgJoueur' .$_SESSION['IdU']  .'.jpg';  //5
	
	if ($_SESSION['Type']=='Entreprise')
     
    $targetFile =  $targetPath.'imgEntreprise' .$_SESSION['IdU']  .'.jpg';  //5
	
	if ($_SESSION['Type']=='Proprietaire')
     
    $targetFile =  $targetPath.'imgProprietaire' .$_SESSION['IdP']  .'.jpg';  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
     
}
?>      