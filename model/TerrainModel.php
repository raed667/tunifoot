<?php
require_once("..\Entite\Terrain.php");
require_once("..\Configuration.php");

class TerrainModel
{
	public $Table="Terrain";
	
	function __construct()
	{
		$Conf=new Configuration();
		$Conf->connexion();
	}
	
	function ChercherId($t)
	{
		$Requete = " select * from ".$this->Table." where (Nom_ter = '".$t->GetNom_ter()."' and Tarif_ter = '".$t->GetTarif_ter()."')and Nbr_maxjoueur_ter = '".$t->GetNbr_maxjoueur_ter()."' ";
		$Resultat =mysql_query($Requete) or die ("Ereur ".mysql_error());
		$Data=mysql_fetch_array($Resultat);
		$Id=$Data['Id_terrain_Pk'];
		return $Id;
	}
		function supprimerterrainSelonPRopr($Id)
	{
		$requete="DELETE from ".$this->Table." WHERE Id_prop_ter_FK = ".$Id." ;";
		mysql_query($requete) or die("Ereur ".mysql_error());
		
	}
	function AjoutTerrain($t,$Id_prop_ter_FK)
	{
		$Requete="insert into ".$this->Table."	
		(Nom_ter,Tarif_ter,Dispo_ter,Nbr_maxjoueur_ter,Lien_ter,Like_ter,Dislike_ter,Heure_ouverture,Heure_fermeture,Id_prop_ter_FK)
		
		values
		
		('".$t->GetNom_ter()."','".$t->GetTarif_ter()."','".$t->GetDispo_ter()."','".$t->GetNbr_maxjoueur_ter()."','".$t->GetLien_ter()."','".$t->GetLike_ter()."','".$t->GetDislike_ter()."','".$t->GetHeure_ouverture()."','".$t->GetHeure_fermeture()."',".$Id_prop_ter_FK.")";
		
		mysql_query($Requete);
	}

	function RetournerTerrain($Id)
	{
		$Requete = " select * from ".$this->Table." where Id_terrain_PK = $Id ;";
		$Resultat =mysql_query($Requete) or die ("Ereur ".mysql_error());
		$data=mysql_fetch_array($Resultat);
		$t=new Terrain("",0,0,1,0,0,0,0,0);	
					$t->setNom_ter($data['Nom_ter']);
					$t->setTarif_ter($data['Tarif_ter']);
					$t->setDispo_ter($data['Dispo_ter']);
					$t->setNbr_maxjoueur_ter($data['Nbr_maxjoueur_ter']);
					$t->setLien_ter($data['Lien_ter']);
					$t->setLike_ter($data['Like_ter']);
					$t->setDislike_ter($data['Dislike_ter']);
					$t->setHeure_ouverture($data['Heure_ouverture']);
					$t->setHeure_fermeture($data['Heure_fermeture']);		
	return $t;
	}
	
	function ExisteTerrain($Id)
	{
		$Requete = " select * from ".$this->Table." where Id_terrain_PK = $Id ;";
		$Resultat =mysql_query($Requete) or die ("Ereur ".mysql_error());

return  mysql_num_rows($Resultat);	
	}

	function SupprimeTerrain($Id)
	{
		$requete0="DELETE FROM `reservation` WHERE `Id_ter_resv_Fk` = ".$Id." ;";
		mysql_query($requete0) or die("Ereur ".mysql_error());
		
		$requete="DELETE from ".$this->Table." WHERE Id_terrain_Pk = ".$Id." ;";
		mysql_query($requete) or die("Ereur ".mysql_error());
	}
	
	function ModifierTerrain ($Id,$t)
		{			
			$Requete = "update ".$this->Table." set Nom_ter= '".$t->GetNom_ter()."',Tarif_ter = '".$t->GetTarif_ter()."',Dispo_ter = '".$t->GetDispo_ter()."',Nbr_maxjoueur_ter= '".$t->GetNbr_maxjoueur_ter()."',Lien_ter = '".$t->GetLien_ter()."',Like_ter = '".$t->GetLike_ter()."',Dislike_ter = '".$t->GetDislike_ter()."',Heure_ouverture = '".$t->GetHeure_ouverture()."',Heure_fermeture = '".$t->GetHeure_fermeture()."' where Id_terrain_Pk = '$Id'";
			mysql_query ($Requete) or die ("Erreur".mysql_error());
		}
	
	function AfficherTerrain()
	{
		$Tableau= array();
		$requete=" select * from ".$this->Table." ";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat)) 
		{  
					$t=new Terrain("",0,0,1,0,0,0,0,0);
					$t->setId($data['Id_terrain_Pk']);
					$t->setNom_ter($data['Nom_ter']);
					$t->setTarif_ter($data['Tarif_ter']);
					$t->setDispo_ter($data['Dispo_ter']);
					$t->setNbr_maxjoueur_ter($data['Nbr_maxjoueur_ter']);
					$t->setLien_ter($data['Lien_ter']);
					$t->setLike_ter($data['Like_ter']);
					$t->setDislike_ter($data['Dislike_ter']);
					$t->setHeure_ouverture($data['Heure_ouverture']);
					$t->setHeure_fermeture($data['Heure_fermeture']);
										
					$Tableau[$i]=$t;
					$i++;
		}
		return $Tableau;
	}

function AfficherTerrainSelonProprietaire($ID)
	{
		$Tableau= array();
		$requete=" select * from ".$this->Table." WHERE Id_prop_ter_FK = ".$ID;
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat)) 
		{  
					$t=new Terrain("",0,0,1,0,0,0,0,0);
					$t->setId($data['Id_terrain_Pk']);
					$t->setNom_ter($data['Nom_ter']);
					$t->setTarif_ter($data['Tarif_ter']);
					$t->setDispo_ter($data['Dispo_ter']);
					$t->setNbr_maxjoueur_ter($data['Nbr_maxjoueur_ter']);
					$t->setLien_ter($data['Lien_ter']);
					$t->setLike_ter($data['Like_ter']);
					$t->setDislike_ter($data['Dislike_ter']);
					$t->setHeure_ouverture($data['Heure_ouverture']);
					$t->setHeure_fermeture($data['Heure_fermeture']);
										
					$Tableau[$i]=$t;
					$i++;
		}
		return $Tableau;
	}

//fonction recherche selon le nom
function RechercheTerrainSelonNom($nom)
{
$Tableau= array();
$requete=" select * from ".$this->Table." where Nom_ter like '%".$nom."%'";
$resultat =mysql_query($requete) or die ("Ereur".mysql_error());
$i=0;
while ($data= mysql_fetch_array($resultat)) 
{ 
$t=new Terrain("",0,0,1,0,0,0,0,0);
$t->setNom_ter($data['Nom_ter']);
$t->setTarif_ter($data['Tarif_ter']);
$t->setDispo_ter($data['Dispo_ter']);
$t->setNbr_maxjoueur_ter($data['Nbr_maxjoueur_ter']);
$t->setLien_ter($data['Lien_ter']);
$t->setLike_ter($data['Like_ter']);
$t->setDislike_ter($data['Dislike_ter']);
$t->setHeure_ouverture($data['Heure_ouverture']);
$t->setHeure_fermeture($data['Heure_fermeture']);
$Tableau[$i]=$t;
$i++;
}
return $Tableau;
}

//fonction recherche terrain selon nombre maximum des joueurs	
function RechercheTerrainSelonNbrmax($Nbrmax,$operanteR)
{
$Tableau= array();
$requete=" select * from ".$this->Table." where Nbr_maxjoueur_ter ". $operanteR." $Nbrmax ; ";
$resultat =mysql_query($requete) or die ("Ereur".mysql_error());
$i=0;
while ($data= mysql_fetch_array($resultat)) 
{ 
$t=new Terrain("",0,0,1,0,0,0,0,0);
$t->setNom_ter($data['Nom_ter']);
$t->setTarif_ter($data['Tarif_ter']);
$t->setDispo_ter($data['Dispo_ter']);
$t->setNbr_maxjoueur_ter($data['Nbr_maxjoueur_ter']);
$t->setLien_ter($data['Lien_ter']);
$t->setLike_ter($data['Like_ter']);
$t->setDislike_ter($data['Dislike_ter']);
$t->setHeure_ouverture($data['Heure_ouverture']);
$t->setHeure_fermeture($data['Heure_fermeture']);
$Tableau[$i]=$t;
$i++;
}
return $Tableau;
}

//recherche terrain selon le tarif	
function RechercheTerrainSelontarif($Tarif,$operanteR)
{
$Tableau= array();
$requete=" select * from ".$this->Table." where Tarif_ter ".$operanteR." $Tarif ;";
$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
$i=0;
while ($data= mysql_fetch_array($resultat)) 
{ 
$t=new Terrain("",0,0,1,0,0,0,0,0);
$t->setNom_ter($data['Nom_ter']);
$t->setTarif_ter($data['Tarif_ter']);
$t->setDispo_ter($data['Dispo_ter']);
$t->setNbr_maxjoueur_ter($data['Nbr_maxjoueur_ter']);
$t->setLien_ter($data['Lien_ter']);
$t->setLike_ter($data['Like_ter']);
$t->setDislike_ter($data['Dislike_ter']);
$t->setHeure_ouverture($data['Heure_ouverture']);
$t->setHeure_fermeture($data['Heure_fermeture']);

$Tableau[$i]=$t;
$i++;
}
return $Tableau;
}

	function RetournerNombreTerrain()
	
	{
		$j=0;
		$requete=" select * from ".$this->Table." ";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		
		while ($data= mysql_fetch_array($resultat)) 
		
		while($a=mysql_fetch_row($resultat))
	
		{
		$j++;
			
			
			
			
			
					 
		}
		
		return $j;
	}

	function jaime ($Id)
		{			
			$Requete = "update ".$this->Table." set Like_ter = (Like_ter+1) where Id_terrain_Pk = '$Id'";
			mysql_query ($Requete) or die ("Erreur".mysql_error());
		}

	function jaimepas ($Id)
		{			
			$Requete = "update ".$this->Table." set Dislike_ter = (Dislike_ter+1) where Id_terrain_Pk = '$Id'";
			mysql_query ($Requete) or die ("Erreur".mysql_error());
		}

function RetournerIdProprio($IdT)
	{

		$requete=" select `Id_prop_ter_FK` from ".$this->Table." WHERE `Id_terrain_Pk` = ".$IdT." ;";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		

		while($data = mysql_fetch_row($resultat))
		{
		return($data[0]);
		}
	}
}

?>

