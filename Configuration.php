<?php

class Configuration
{
	public $Serveur="localhost";
	public $Utilisateur="root";
	public $MDP="";
	public $BD="tunifoot";
	
	function connexion ()
	 {
		 $Con=mysql_connect($this->Serveur,$this->Utilisateur,$this->MDP);
		 mysql_select_db($this->BD,$Con);
	 }
}
?>

