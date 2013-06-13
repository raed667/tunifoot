<?php

require_once("../Model/ReservationModel.php");
$R=new Reservation("","","",false);
$RM=new ReservationModel();

$R->setDate_reserv(mysql_real_escape_string($_POST['Date_reserv']));
$R->setHeur_reserv(mysql_real_escape_string($_POST['Heur_reserv']));
$R->setDate_syst(date('Y-m-d'));
$R->setConfirmer_reserv(0);
$Id_util_resv_FK = $_POST['IdU'];
$Id_ter_resv_FK = $_POST['IdT'];

//Main
$RM->AjoutReservation($R,$Id_util_resv_FK,$Id_ter_resv_FK);
$Id=$RM->ChercherId($R);
header ("location:Payement.php?Id=".$Id);

?>
