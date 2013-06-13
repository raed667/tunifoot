<?php

require_once("../Model/UtilisateursModel.php");
//error_reporting(E_ALL ^ E_NOTICE);
$Id = htmlspecialchars($_GET["Id"]);
$E=new Entreprise(Null,Null,"","","","","",Null,Null,"",0,0,"","");
$EM=new EntrepriseModel();
$E=$EM->RetournerUtilisateur($Id);

					$E->setNom(mysql_real_escape_string($_GET['Nom_util']));
					$E->setPrenom(mysql_real_escape_string($_GET['Prenom_util']));
					$E->setNom_Entreprise(mysql_real_escape_string($_GET['Nom_entreprise']));
					$E->setEmail(mysql_real_escape_string($_GET['Email_util']));
					$E->setPWD(mysql_real_escape_string($_GET['Motdepasse_util']));
					$E->setDate_De_Naissance(mysql_real_escape_string($_GET['Date_naissance']));
					$E->setResidence(mysql_real_escape_string($_GET['Residence_util']));
					$E->setRegion(mysql_real_escape_string($_GET['Region']));
					$E->setTelephone(mysql_real_escape_string($_GET['Telephone_util']));
					$E->setInfo(mysql_real_escape_string($_GET['Info']));
				
$EM->ModifierEntreprise($Id,$E);
echo($Id);
if($EM->ExisteEntreprise($Id))
header("location:../Vue/Entreprise.php?Id=".$Id);
if($EM->ExisteJoueur($Id))
header("location:../Vue/Joueur.php?Id=".$Id);

?>