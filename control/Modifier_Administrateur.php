<?php

require_once("..\Model\AdministrateurModel.php");
//error_reporting(E_ALL ^ E_NOTICE);
$Id = $_GET["Id"];
$A=new administrateur("","","","");
$AM= new AdministrateurModel();

$A=$AM->RetournerAdministrateur($Id);

				
						
					
					$A->setLogin(mysql_real_escape_string($_GET['Login_Admin']));
					$A->setPWD(mysql_real_escape_string($_GET['Pwd_Admin']));
				
$AM->ModifierAdministrateur($Id,$A);
//echo($Id);

header("location:../admin/profil.php?Id=".$Id);

?>