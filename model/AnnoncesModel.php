<?php
require('..\Entite\Annonces.php');
require_once('..\Configuration.php');

class AnnonceModel
{
	public $ID;
	public $Table="anonces";
	private $Texte;
	

	function __construct()
	{
		$Conf=new Configuration();
		$Conf->connexion();
	}
	

function Ajouter($Texte)
{	
	
	$Requete="insert into ".$this->Table."	(Text)
		
		values
		
		('".$Texte."')";
		
		mysql_query($Requete);
}



function Supprimer($Id)
{
	$requete="DELETE from ".$this->Table." WHERE Id  = ".$Id." ;";
		mysql_query($requete) or die("Ereur ".mysql_error());
}


function Afficher()
{
		$Tableau= array();
		$requete=" select * from ".$this->Table." ";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		
		while ($data= mysql_fetch_array($resultat)) 
		{
		$An = new Annonce(0,"");
		$An->setId($data['Id']); 
		$An->setTexte($data['Text']);
		$Tableau[$i]=$An;
		$i++;
		}
	
	return $Tableau;
}



}
?>