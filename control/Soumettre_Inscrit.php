<?php
session_start();

require_once("../Model/UtilisateursModel.php");
require_once("../Model/ProprietaireModel.php");

$Nom = $_POST['nom_user']; // array_key_exists('nom_user', $_POST) ? $_POST['nom_user'] : null;

$Prenom =  $_POST['prenom_user'] ;// array_key_exists('prenom_user', $_POST) ? $_POST['prenom_user'] : null;

$Mail = array_key_exists('mail', $_POST) ? $_POST['mail'] : null;
$Pwd = array_key_exists('pwd', $_POST) ? $_POST['pwd'] : null;
$Local = array_key_exists('local', $_POST) ? $_POST['local'] : null;
$Type = array_key_exists('user_groupe', $_POST) ? $_POST['user_groupe'] : null;

$Nom_En = array_key_exists('entreprise', $_POST) ? $_POST['entreprise'] : null;

$Nom_Et = array_key_exists('etablissement', $_POST) ? $_POST['etablissement'] : null;


if($Type=="Joueur")
{
//$U = new Joueur($Nom,$Prenom,NULL,$Mail,$Pwd,"",NULL,date('Y-m-d'), NULL,$Local,0,NULL, NULL,"Joueur",NULL);

$U = new Joueur(mysql_real_escape_string($Nom),mysql_real_escape_string($Prenom),mysql_real_escape_string($Mail),mysql_real_escape_string($Pwd),"Lien",date('Y-m-d'),7,"Adresse",mysql_real_escape_string($Local),0,NULL,NULL,"Joueur",15,16);

$JM = new JoueurModel();
$EM=new EntrepriseModel();

if($EM->EmailUtilise($Mail)==false)
{
$JM->AjoutJoueur($U);
header("location:../vue/Login.php");
}
else
{
		$_SESSION['errorMSG']="Un compte est déjà associé à cette adresse Mail";
	header("location:../vue/inscription.php");
}

}


if($Type=="Entreprise")
{
	
$U = new Entreprise($Nom,$Prenom,"Entrep_placeHolder",$Mail,$Pwd,"lien",date('Y-M-d'),7,"",$Local,0,NULL,NULL,"Entreprise",15,16);
$EM=new EntrepriseModel();
if($EM->EmailUtilise($Mail)==false)
{
	$EM->AjoutEntreprise($U);
}
else
{
	$_SESSION['errorMSG']="Un compte est déjà associé à cette adresse Mail.";
	header("location:../vue/inscription.php");
}

}
if($Type=="Proprietere")
{


$U = new  Proprietaire($Nom,$Prenom,"Etablissement_placeHolder	
",$Mail,$Pwd,"",$Local,"tel","Info",0,"Lien",date('Y-M-d'));

$PM=new ProprietaireModel();
if($PM->EmailUtilise($Mail)==false)
{$PM->AjoutProprietaire($U);
}
else
{
	$_SESSION['errorMSG']="Un compte est déjà associé à cette adresse Mail.";
	header("location:../vue/inscription.php");
}



}
		header("location:../vue/login.php");


?>