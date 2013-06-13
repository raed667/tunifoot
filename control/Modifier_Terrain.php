<?php

//error_reporting(E_ALL ^ E_NOTICE);
require_once("..\model\TerrainModel.php");
require_once("..\model\ReservationModel.php");
$Id =$_GET["Id"];
$t=new Terrain("",0,0,1,0,0,0,0,0);
$tM=new TerrainModel();
$t=$tM->RetournerTerrain($Id);
$R=new Reservation("","","",true);
$RM=new ReservationModel();
$R=$RM->RetournerReserv($Id);


					$R->setDate_reserv(mysql_real_escape_string($_GET['Date_reserv']));
					$R->setHeur_reserv(mysql_real_escape_string($_GET['Heur_reserv']));
					
	$RM->ModifierReservation($Id,$R);			
//$tM->ModifierTerrain($Id,$t);
header ("location:../admin/Reservations.php?Id=".$Id);

?>