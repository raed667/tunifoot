<?php



require_once('..\Entite\Reservation.php');

require_once("..\Model\ReservationModel.php");
//session_start();
$h = $_GET['Valide'];
if(isset($_GET['IdU']) && $_GET['IdU']!=-1)
{

	if(isset($_GET['DateReserv1']) and $_GET['DateReserv1']!='')
	{

$h = $_GET['Valide'];
$IdT= $_GET['IdT'];


$date_debut = $_GET['DateReserv1'];
$date_fin = $_GET['DateReserv2'];
$freq = $_GET['freq'];
if($h<10)
$heure= '0'.$h.':00:00';
else
$heure= $h.':00:00';

//echo(date('Y-m-d'));


$dateDebut = strtotime($date_debut);
$dateFin = strtotime($date_fin);


$nbr = 0;


while($dateDebut <= $dateFin)
{

		$currentDate = date('Y-m-d',$dateDebut); 

$R=new Reservation($currentDate,$heure,date('Y-m-d'),0);
$R->setDate_syst(date('Y-m-d'));
$R->setId_ter_resv_Fk($IdT);
$R->setId_util_resv_FK($_GET['IdU']);
$RM=new ReservationModel();
$RM->AjoutReservation($R);
$IdR = $RM->ChercherId($R);
$nbr++;	
	if($freq =='Jour')
		{
	$dateDebut = strtotime("+1 day", $dateDebut);
		}

		if($freq =='Semaine')
		{ 
	$dateDebut = strtotime("+1 week", $dateDebut);
	
		}
		if($freq =='2Semaines')
		{
	$dateDebut = strtotime("+2 weeks", $dateDebut);
				
		}
		if($freq =='Mois')
		{
	$dateDebut = strtotime("+1 month", $dateDebut);
		}	

}

//$IdR = $RM->ChercherId($R);

//

echo('<script type="text/javascript">
setTimeout(function(){window.location = "../vue/Entreprise.php?Id='.$_GET['IdU'].'&PE=1 ";}, 0 ); 
</script>');
	//header('Location :  ../vue/Entreprise.php?Id='+$_GET['IdU']);


	}
	else
	{
		echo('test6 <br>');

	//	$_SESSION['ReservationError']="Veilliez choisir une date valide.";
	//header('location : ../Vue/Reserver.php');

	}
}
else
{
	echo('test7 <br>');

	//$_SESSION['404Message']= 'Veilliez vous connecter en tant que joueur.';
//	header('location : ../Vue/404.php');

}




?>