<?php

require_once("../Model/ReservationModel.php");
require_once("../Model/UtilisateursModel.php");
//error_reporting(E_ALL ^ E_NOTICE);
$Id = htmlspecialchars($_GET["Id"]);
$R=new ReservationModel("","","",true);
$RM=new ReservationModel();
$R=$RM->SupprimereservationSelonJoueur($Id);


$E=new Entreprise(Null,Null,"","","","","",Null,Null,"",0,0,"","");
$Em=new EntrepriseModel();
$Em->SupprimeEntreprise($Id);

//$E=$EM->SupprimeEntreprise($Id);

header('location:'.$_SERVER['HTTP_REFERER']);
?>







