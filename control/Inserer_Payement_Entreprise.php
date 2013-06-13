<?php
//session_start();
include("../model/ReservationModel.php");
$R=new Reservation("","","",true);
$RM=new ReservationModel();
//echo($_SESSION['IdR']);
echo($_GET['IdR']);
$date_debut = $_GET['DateReserv1'];
$date_fin = $_GET['DateReserv2'];
$freq = $_GET['freq'];
 

$RM->ValiderPayement($_GET['IdR']);

if ($_GET['Type']=='Joueur')
{
	header('location: ../Vue/Joueur.php?Id='.$_GET['IdU'].'&P=1#historique');

}

if ($_GET['Type']=='Entreprise')
{
	header('location: ../Vue/Entreprise.php?Id='.$_GET['IdU'].'#historique');
}

?>
