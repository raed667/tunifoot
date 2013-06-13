<?php
$IdP = htmlspecialchars($_GET["Id"]);
require_once("..\Model\TerrainModel.php");
require_once("..\Model\ProprietaireModel.php");

$PM=new ProprietaireModel();
$P=$PM->RetournerProp($IdP);
					
$t=new Terrain("",0,0,1,0,0,0);
$tM=new TerrainModel();
					$t->setId(mysql_real_escape_string($_GET['Id_terrain_Pk']));
					$t->setNom_ter(mysql_real_escape_string($_GET['Nom_ter']));
					$t->setTarif_ter(mysql_real_escape_string($_GET['Tarif_ter']));
					$t->setNbr_maxjoueur_ter(mysql_real_escape_string($_GET['Nbr_maxjoueur_ter']));
					//$t->setLien_ter($_GET['Lien_ter']);
//Main
$tM->AjoutTerrain($t,$IdP);
$PM->AjouterNbr_Terrain($IdP,$P);
header ("location:../Vue/Proprietaire.php?Id=".$IdP);

?>
