<?php
$mail = $_GET['mail'];	
include("../Configuration.php");

$Connexion=new Configuration();
$Connexion->connexion();
	
	$Requete="select * from utilisateur,proprietaire where Email_util = '$mail' or Email_prop= '$mail';";
	$data = mysql_query($Requete)or die ("Ereur ".mysql_error());
	echo mysql_num_rows($data);

?>