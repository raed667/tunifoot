<?php
require_once("../Model/UtilisateursModel.php");
require_once('../Entite/Proprietaire.php');
require_once('../Configuration.php');


class ProprietaireModel
{
	public $Table="proprietaire";
	
	function __construct()
	{
		$Conf=new Configuration();
		$Conf->connexion();
	}
	
	function AjoutProprietaire($P)
	{
		$Requete="insert into ".$this->Table."		(Nom_prop,Prenom_prop,Nom_complexe,Email_prop,Motdepasse_prop,Residence_prop,Region_prop,Telephone_prop,Info_prop,Nbr_terrains,Photodeprofil_prop,Date_inscrit_prop)
		
		values
		
		('".$P->getNom()."','".$P->getPrenom()."','".$P->getNom_du_Complexe()."','".$P->getEmail()."','".$P->getMot_de_passe()."','".$P->getResidence()."','".$P->getRegion()."','".$P->getTelephone()."','".$P->getInformation()."','".$P->getNombre_de_terrains()."','".$P->getLien_photo_profil()."','".$P->getDate_inscription()."')";
		
		mysql_query($Requete);
	}
	
	
	
	function ExisteProprietaire($Id)
{
	$Requete="select * from ".$this->Table." where Id_prop_PK='$Id';";
$Resultat =mysql_query($Requete) or die ("Ereur ".mysql_error());
$data=mysql_fetch_array($Resultat);
if($data)
return true;
else 
return false;
}

	function ChercherId($P)
	{
		$Requete = " select * from ".$this->Table." where (Nom_prop = '".$P->getNom()."' and Prenom_prop = '".$P->getPrenom()."')and Email_prop = '".$P->getEmail()."' ";
		$Resultat =mysql_query($Requete) or die ("Ereur ".mysql_error());
		$Data=mysql_fetch_array($Resultat);
		$Id=$Data['Id_prop_PK'];
		return $Id;
	}
	
	
function EmailUtilise($email)
{
	$Requete="select * from ".$this->Table." where Email_prop = '$email';";
$Resultat =mysql_query($Requete) or die ("Ereur ".mysql_error());
$data=mysql_fetch_array($Resultat);
if($data)
return true;
else 
return false;
}

	
	function RetournerProp($Id)
	{
		$Requete = " select * from ".$this->Table." where Id_prop_PK = $Id ;";
		$Resultat =mysql_query($Requete) or die ("Ereur ".mysql_error());
		$data=mysql_fetch_array($Resultat);
		$P=new Proprietaire("","","","","","",0,"",0,"","","");		
					$P->setNom($data['Nom_prop']);
					$P->setPrenom($data['Prenom_prop']);
					$P->setNom_du_Complexe($data['Nom_complexe']);
					$P->setEmail($data['Email_prop']);
					$P->setMot_de_passe($data['Motdepasse_prop']);
					$P->setResidence($data['Residence_prop']);
					$P->setRegion($data['Region_prop']);
					$P->setTelephone($data['Telephone_prop']);
					$P->setInformation($data['Info_prop']);
					$P->setNombre_de_terrains($data['Nbr_terrains']);
					$P->setLien_photo_profil($data['Photodeprofil_prop']);
					$P->setDate_inscription($data['Date_inscrit_prop']);
	return $P;
	}
	
	function SupprimeProprietaire($Id)
	{
		$requete="delete from ".$this->Table." where Id_prop_PK	= '$Id'";
		mysql_query($requete);
	}
	
	function ModifierProprietaire ($Id,$P)
		{			
			$Requete = "update ".$this->Table." set Nom_prop = '".$P->getNom()."',Prenom_prop = '".$P->getPrenom()."',Nom_complexe = '".$P->getNom_du_Complexe()."',Email_prop = '".$P->getEmail()."',Motdepasse_prop = '".$P->getMot_de_passe()."',Residence_prop = '".$P->getResidence()."',Region_prop = '".$P->getRegion()."',Telephone_prop = '".$P->getTelephone()."',Info_prop = '".$P->getInformation()."',Photodeprofil_prop = '".$P->getLien_photo_profil()."',Date_inscrit_prop = '".$P->getDate_inscription()."' where Id_prop_PK	= '$Id' ";
			mysql_query ($Requete) or die ("Erreur".mysql_error());
		}
		
	function AjouterNbr_Terrain($Id,$P)
		{			
			$Requete = "update ".$this->Table." set Nbr_terrains = '".($P->getNombre_de_terrains()+1)."' where Id_prop_PK	= '$Id' ";
			mysql_query ($Requete) or die ("Erreur".mysql_error());
		}
		
	function DiminuerNbr_Terrain($Id,$P)
		{			
			$Requete = "update ".$this->Table." set Nbr_terrains = '".($P->getNombre_de_terrains()-1)."' where Id_prop_PK	= '$Id' ";
			mysql_query ($Requete) or die ("Erreur".mysql_error());
		}
	
	function AfficherProprietaire()
	{
		$Tableau= array();
		$requete=" select * from ".$this->Table." ";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat)) 
		{  
					$P=new Proprietaire("","","","","","","",0,"","","","");
					$P->setId($data['Id_prop_PK']);
					$P->setNom($data['Nom_prop']);
					$P->setPrenom($data['Prenom_prop']);
					$P->setNom_du_Complexe($data['Nom_complexe']);
					$P->setEmail($data['Email_prop']);
					$P->setMot_de_passe($data['Motdepasse_prop']);
					$P->setResidence($data['Residence_prop']);
					$P->setRegion($data['Region_prop']);
					$P->setTelephone($data['Telephone_prop']);
					$P->setInformation($data['Info_prop']);
					$P->setNombre_de_terrains($data['Nbr_terrains']);
					$P->setLien_photo_profil($data['Photodeprofil_prop']);
					$P->setDate_inscription($data['Date_inscrit_prop']);
					$Tableau[$i]=$P;
					$i++;
		}
		return $Tableau;
	}
	
		function RetournerNombreProprietaire()
	
	{
		$y=0;
		$requete=" select * from ".$this->Table." ";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		
		while ($data= mysql_fetch_array($resultat)) 
		
		while($a=mysql_fetch_row($resultat))
	
		{
		$y++;
			
			
			
			
			
					 
		}
		
		return $y;
	}
	
}
