<?php

require_once("..\Model\ProprietaireModel.php");
//error_reporting(E_ALL ^ E_NOTICE);
$Id = htmlspecialchars($_GET["Id"]);
$P=new Proprietaire("","","","","","","",0,"","","","");
$PM=new ProprietaireModel();
$P=$PM->RetournerProp($Id);

				$P->setNom(mysql_real_escape_string($_GET['Nom_prop']));
		       	$P->setPrenom (mysql_real_escape_string($_GET['Prenom_prop']));
				$P->setNom_du_Complexe(mysql_real_escape_string($_GET['Nom_complexe_prop']));
				$P->setEmail(mysql_real_escape_string($_GET['Email_prop']));
				$P->setMot_de_passe(mysql_real_escape_string($_GET['Motdepasse_prop']));
				$P->setResidence(mysql_real_escape_string($_GET['Residence_prop']));
				$P->setRegion(mysql_real_escape_string($_GET['Region_prop']));
				$P->setTelephone(mysql_real_escape_string($_GET['Telephone_prop']));
				$P->setInformation(mysql_real_escape_string($_GET['Info_prop']));
				$P->setNombre_de_terrains( mysql_real_escape_string($_GET['Nbr_terrains_prop']));
				
$PM->ModifierProprietaire($Id,$P);
header("location:../admin/Complexes.php?Id=".$Id);

?>