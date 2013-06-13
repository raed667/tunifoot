<?php
$Id = $_GET["Id"];

require_once("..\Model\AnnoncesModel.php");

$An = new AnnonceModel(); 
$An->Supprimer($Id);
$url = $_SERVER['HTTP_REFERER'];
header('location:'.$url);
?>
