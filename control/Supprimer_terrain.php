<?php
session_start();
require_once('..\Model\TerrainModel.php');
require_once('..\Model\ProprietaireModel.php');

$IdT = $_GET['IdT'];
$t=new Terrain("",0,0,0,"",0,0);
$tM=new  TerrainModel($t);
$tM->SupprimeTerrain($IdT);
if(isset($_SESSION['IdP']))
{
$PM=new ProprietaireModel();
$P=$PM->RetournerProp($_SESSION['IdP']);
$PM->DiminuerNbr_Terrain($_SESSION['IdP'],$P);
header ("location:../Vue/Proprietaire.php?Id=".$_SESSION['IdP']);
}
?>
