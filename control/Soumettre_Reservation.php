<?php
require_once('..\Entite\Reservation.php');

require_once("..\Model\ReservationModel.php");
//session_start();
$h = $_GET['Valide'];

if(isset($_GET['IdU']) && $_GET['IdU']!=-1)
{
	if(isset($_GET['DateReserv']) and $_GET['DateReserv']!='')
	{
$h = $_GET['Valide'];
$IdT= $_GET['IdT'];


$date = $_GET['DateReserv'];

if($h<10)
$heure= '0'.$h.':00:00';
else
$heure= $h.':00:00';

//echo(date('Y-m-d'));
$R=new Reservation($date,$heure,date('Y-m-d'),0);
$R->setDate_syst(date('Y-m-d'));
$R->setId_ter_resv_Fk($IdT);
$R->setId_util_resv_FK($_GET['IdU']);
$RM=new ReservationModel();
$RM->AjoutReservation($R);
$IdR = $RM->ChercherId($R);

//
header('location:  ../Vue/Payement.php?IdR='.$IdR.'&IdT='.$IdT);
//header('Location  : ../Vue/404.php');


	}
	else
	{
		$_SESSION['ReservationError']="Veuilliez choisir une date valide.";
	header('location : ../Vue/Reserver.php');

	}
}
else
{
	$_SESSION['404Message']= 'Veuilliez vous connecter en tant que joueur.';
	header('location : ../Vue/404.php');

}




?>