<?php
require_once('..\Model\ReservationModel.php');

$IdR = $_GET['IdR'];

	  $R=new Reservation("","","",false);
		$RM=new ReservationModel();

$RM->SupprimeReservation($IdR);
		
	
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
