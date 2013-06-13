<?php
require_once('..\Entite\Utilisateurs.php');
require_once('..\Configuration.php');


/* class entreprise */

class EntrepriseModel
{
	public $Table="utilisateur";
	
	function __construct()
	{
		$Conf=new Configuration();
		$Conf->connexion();
	}
	
	
	
	
	function retournerId($mail)
	{
		$Requete="select * from ".$this->Table." where Email_util='$mail';";
		$Resultat =mysql_query($Requete) or die ("Ereur ".mysql_error());
		$data=mysql_fetch_array($Resultat);
		$retour= ($data['Id_util_PK']);	
		return $retour;
	}

	
	
	
function  AjoutEntreprise($E)
	{		
	
		$requete="insert into ".$this->Table."  (`Nom_util`, `Prenom_util`,`Nom_entreprise`,`Email_util`, `Motdepasse_util`, `Photoprofil_util`, `Date_inscrit`, `Date_naissance`, `Residence_util`, `Region`, `Nombre_parties`, `Telephone_util`,Info,Type_objet,Id_entreprise_FK)

		values 

		('".$E->getNom()."','".$E->getPrenom()."','".$E->getNom_Entreprise()."','".$E->getEmail()."','".$E->getPWD()."','".$E->getLien_Photo()."','".$E->getDate_Inscription()."','".$E->getDate_de_Naissance()."','".$E->getResidence()."','".$E->getRegion()."','".$E->getNombre_de_Parties()."','".$E->getTelephone()."','".$E->getInfo()."','".$E->getType()."',2); ";
		mysql_query ($requete) or die ("Erreur".mysql_error());	
	}
	


	function RetournerUtilisateur($Id)
	{
		$Requete = " select * from ".$this->Table." where Id_util_PK = $Id ;";
		$Resultat =mysql_query($Requete) or die ("Ereur ".mysql_error());
		$data=mysql_fetch_array($Resultat);
		$E=new Entreprise(Null,Null,"","","","","",Null,Null,"",0,0,"","");
					$E->setNom($data['Nom_util']);
					$E->setPrenom($data['Prenom_util']);
					$E->setNom_Entreprise($data['Nom_entreprise']);
					$E->setEmail($data['Email_util']);
					$E->setPWD($data['Motdepasse_util']);
					$E->setLien_Photo($data['Photoprofil_util']);
					$E->setDate_inscription($data['Date_inscrit']);
					$E->setDate_De_Naissance($data['Date_naissance']);
					$E->setResidence($data['Residence_util']);
					$E->setRegion($data['Region']);
					$E->setNombre_de_parties($data['Nombre_parties']);
					$E->setTelephone($data['Telephone_util']);
					$E->setInfo($data['Info']);
					$E->setType($data['Type_objet']);	
	return $E;
	}
	
	
	function RetournerNombreEntreprise()
	
	{
		$i=0;
		$requete=" select * from ".$this->Table." where Type_objet='Entreprise'";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		
		while ($data= mysql_fetch_array($resultat)) 
		
		while($a=mysql_fetch_row($resultat))
	
		{
		$i++;
			
			
			
			
			
					 
		}
		
		return $i;
	}
	
	
	
		function RetournerNombreJoueur()
	
	{
		$x=0;
		$requete=" select * from ".$this->Table." where Type_objet='Joueur'";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		
		while ($data= mysql_fetch_array($resultat)) 
		
		while($a=mysql_fetch_row($resultat))
	
		{
		$x++;
			
			
			
			
			
					 
		}
		
		return $x;
	}
	
	
	
	
		function ModifierEntreprise($Id,$E)
{
	$requete="UPDATE ".$this->Table." SET  Nom_util='".$E->getNom()."',Prenom_util='".$E->getPrenom()."',Nom_entreprise='".$E->getNom_Entreprise()."',Email_util='".$E->getEmail()."',Motdepasse_util='".$E->getPWD()."',Photoprofil_util='".$E->getLien_Photo()."',Date_inscrit='".$E->getDate_Inscription()."',Date_naissance='".$E->getDate_de_Naissance()."',Residence_util='".$E->getResidence()."',Region='".$E->getRegion()."',Nombre_parties='".$E->getNombre_de_Parties()."',Telephone_util='".$E->getTelephone()."',Info='".$E->getInfo()."',Type_objet='".$E->getType()."' WHERE `Id_util_PK`='$Id';";

		mysql_query($requete);
}
	
	function SupprimeEntreprise($Id)
{
	$requete="delete from ".$this->Table." where Id_util_PK='$Id'";
	mysql_query($requete) or die ("Ereur ".mysql_error());
	 
}



function ExisteJoueur($Id)
{
	$Requete="select * from ".$this->Table." where (Id_util_PK='$Id' AND Type_objet = 'Joueur');";
$Resultat =mysql_query($Requete) or die ("Ereur ".mysql_error());
$data=mysql_fetch_array($Resultat);
if($data)
return true;
else 
return false;
}


function EmailUtilise($email)
{
	$Requete="select * from ".$this->Table." where Email_util = '$email';";
$Resultat =mysql_query($Requete) or die ("Ereur ".mysql_error());
$data=mysql_fetch_array($Resultat);
if($data)
return true;
else 
return false;
}

	
	function ExisteEntreprise($Id)
{
	$Requete="select * from ".$this->Table." where (Id_util_PK='$Id' AND Type_objet = 'Entreprise');";
$Resultat =mysql_query($Requete) or die ("Ereur ".mysql_error());
$data=mysql_fetch_array($Resultat);
if($data)
return true;
else 
return false;
}
	
	function AfficherEntreprise()
	{
		$Tableau= array();
		$requete=" select * from ".$this->Table." ";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat)) 
		{  
					$E=new Entreprise(Null,Null,"","","","","",Null,Null,"",0,0,"","");
					$E->setNom($data['Nom_util']);
					$E->setPrenom($data['Prenom_util']);
					$E->setNom_Entreprise($data['Nom_entreprise']);
					$E->setEmail($data['Email_util']);
					$E->setPWD($data['Motdepasse_util']);
					$E->setLien_Photo($data['Photoprofil_util']);
					$E->setDate_inscription($data['Date_inscrit']);
					$E->setDate_De_Naissance($data['Date_naissance']);
					$E->setResidence($data['Residence_util']);
					$E->setRegion($data['Region']);
					$E->setNombre_de_parties($data['Nombre_parties']);
					$E->setTelephone($data['Telephone_util']);
					$E->setInfo($data['Info']);
					$E->setType($data['Type_objet']);
					
					$Tableau[$i]=$E;
					$i++;
		}
		return $Tableau;
	}
	
	
	
	function AfficherTouteListeJoueurs()
	{
		$Tableau= array();
		$requete=" select * from ".$this->Table." where Type_objet='Joueur'";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat)) 
		{  
					$E=new Entreprise(Null,Null,"","","","","",Null,Null,"",0,0,"","");
					$E->setId($data['Id_util_PK']);
					$E->setNom($data['Nom_util']);
					$E->setPrenom($data['Prenom_util']);
					$E->setNom_Entreprise($data['Nom_entreprise']);
					$E->setEmail($data['Email_util']);
					$E->setPWD($data['Motdepasse_util']);
					$E->setLien_Photo($data['Photoprofil_util']);
					$E->setDate_inscription($data['Date_inscrit']);
					$E->setDate_De_Naissance($data['Date_naissance']);
					$E->setResidence($data['Residence_util']);
					$E->setRegion($data['Region']);
					$E->setNombre_de_parties($data['Nombre_parties']);
					$E->setTelephone($data['Telephone_util']);
					$E->setInfo($data['Info']);
					$E->setType($data['Type_objet']);
					
					$Tableau[$i]=$E;
					$i++;
		}
		return $Tableau;
	}
	
	
	
	
	function AfficherTouteListeEntreprises()
	{
		$Tableau= array();
		$requete=" select * from ".$this->Table." where Type_objet='Entreprise'";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat)) 
		{  
			$E=new Entreprise(Null,Null,"","","","","",Null,Null,"",0,0,"","");
			$E->setNom($data['Nom_util']);
			$E->setPrenom($data['Prenom_util']);
			$E->setNom_Entreprise($data['Nom_entreprise']);
			$E->setEmail($data['Email_util']);
			$E->setPWD($data['Motdepasse_util']);
			$E->setLien_Photo($data['Photoprofil_util']);
			$E->setDate_inscription($data['Date_inscrit']);
			$E->setDate_De_Naissance($data['Date_naissance']);
			$E->setResidence($data['Residence_util']);
			$E->setRegion($data['Region']);
			$E->setNombre_de_parties($data['Nombre_parties']);
			$E->setTelephone($data['Telephone_util']);
			$E->setInfo($data['Info']);
			$E->setType($data['Type_objet']);
			
			$Tableau[$i]=$E;
			$i++;
		}
		return $Tableau;
	}
	
	
	
	function RechercheJoueurSelonNomPrenom($nomp)
{
$Tableau= array();
$requete=" select * from ".$this->Table." where Nom_util= '$nomp' || Prenom_util='$nomp'";
$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
$i=0;
while ($data= mysql_fetch_array($resultat)) 
                   // $E=new Entreprise(Null,Null,"","","","","",Null,Null,"",0,0,"");
{            
					$E=new Entreprise(Null,Null,"","","","","",Null,Null,"",0,0,"","");
					$E->setNom($data['Nom_util']);
					$E->setPrenom($data['Prenom_util']);
					$E->setNom_Entreprise($data['Nom_entreprise']);
					$E->setEmail($data['Email_util']);
					$E->setPWD($data['Motdepasse_util']);
					$E->setLien_Photo($data['Photoprofil_util']);
					$E->setDate_inscription($data['Date_inscrit']);
					$E->setDate_De_Naissance($data['Date_naissance']);
					$E->setResidence($data['Residence_util']);
					$E->setRegion($data['Region']);
					$E->setNombre_de_parties($data['Nombre_parties']);
					$E->setTelephone($data['Telephone_util']);
					$E->setInfo($data['Info']);
					$E->setType($data['Type_objet']);
					
					$Tableau[$i]=$E;
					$i++;
}
return $Tableau;
}
	
	function RechercheJoueurSelonNom($nom)
{
$Tableau= array();
$requete=" select * from ".$this->Table." where Nom_entreprise = '$nom'";
$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
$i=0;
while ($data= mysql_fetch_array($resultat)) 
                   // $E=new Entreprise(Null,Null,"","","","","",Null,Null,"",0,0,"");
{                  
					$E=new Entreprise(Null,Null,"","","","","",Null,Null,"",0,0,"","");
					$E->setNom($data['Nom_util']);
					$E->setPrenom($data['Prenom_util']);
					$E->setNom_Entreprise($data['Nom_entreprise']);
					$E->setEmail($data['Email_util']);
					$E->setPWD($data['Motdepasse_util']);
					$E->setLien_Photo($data['Photoprofil_util']);
					$E->setDate_inscription($data['Date_inscrit']);
					$E->setDate_De_Naissance($data['Date_naissance']);
					$E->setResidence($data['Residence_util']);
					$E->setRegion($data['Region']);
					$E->setNombre_de_parties($data['Nombre_parties']);
					$E->setTelephone($data['Telephone_util']);
					$E->setInfo($data['Info']);
					$E->setType($data['Type_objet']);
					
					
					$Tableau[$i]=$E;
					$i++;
}
return $Tableau;
}




function RechercheJoueurSelonregion($region)
{
$Tableau= array();
$requete=" select * from ".$this->Table." where Region = '$region'";
$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
$i=0;
while ($data= mysql_fetch_array($resultat)) 
                   // $E=new Entreprise(Null,Null,"","","","","",Null,Null,"",0,0,"");
{                  
					$E=new Entreprise(Null,Null,"","","","","",Null,Null,"",0,0,"","");
					$E->setNom($data['Nom_util']);
					$E->setPrenom($data['Prenom_util']);
					$E->setNom_Entreprise($data['Nom_entreprise']);
					$E->setEmail($data['Email_util']);
					$E->setPWD($data['Motdepasse_util']);
					$E->setLien_Photo($data['Photoprofil_util']);
					$E->setDate_inscription($data['Date_inscrit']);
					$E->setDate_De_Naissance($data['Date_naissance']);
					$E->setResidence($data['Residence_util']);
					$E->setRegion($data['Region']);
					$E->setNombre_de_parties($data['Nombre_parties']);
					$E->setTelephone($data['Telephone_util']);
					$E->setInfo($data['Info']);
					$E->setType($data['Type_objet']);
					
					$Tableau[$i]=$E;
					$i++;
}
return $Tableau;
}



}
/* Fin class  */



class JoueurModel
{
	public $Table="utilisateur";
	
	function __construct()
	{
		$Conf=new Configuration();
		$Conf->connexion();
	}
	
	function  AjoutJoueur($J)
	{		
		$requete="insert into ".$this->Table."
		(`Nom_util`, `Prenom_util`,`Nom_entreprise`,`Email_util`, `Motdepasse_util`, `Photoprofil_util`, `Date_inscrit`, `Date_naissance`, `Residence_util`, `Region`, `Nombre_parties`, `Telephone_util`,Info,Type_objet,Id_entreprise_FK) 
	
		values 
		
	('".$J->getNom()."','".$J->getPrenom()."','".$J->getNom_Entreprise()."','".$J->getEmail()."','".$J->getPWD()."','".$J->getLien_Photo()."','".$J->getDate_Inscription()."','".$J->getDate_de_Naissance()."','".$J->getResidence()."','".$J->getRegion()."','".$J->getNombre_de_Parties()."','".$J->getTelephone()."','".$J->getInfo()."','".$J->getType()."',2); ";	
		mysql_query ($requete) or die ("Erreur".mysql_error());
	}
	
		function ModifierJoueur($Id,$J)
{
	$requete="UPDATE ".$this->Table." SET  Nom_util='".$J->getNom()."',Prenom_util='".$J->getPrenom()."',Nom_entreprise='".$J->getNom_Entreprise()."',Email_util='".$J->getEmail()."',Motdepasse_util='".$J->getPWD()."',Photoprofil_util='".$J->getLien_Photo()."',Date_inscrit='".$J->getDate_Inscription()."',Date_naissance='".$J->getDate_de_Naissance()."',Residence_util='".$J->getResidence()."',Region='".$J->getRegion()."',Nombre_parties='".$J->getNombre_de_Parties()."',Telephone_util='".$J->getTelephone()."',Info='".$J->getInfo()."',Type_objet='".$J->getType()."' WHERE `Id_util_PK`='$Id';";
		
		mysql_query($requete);
}
	
	function SupprimeJoueur($Id)
{
	$requete="delete from ".$this->Table." where Id_util_PK = '$Id';";
	mysql_query($requete);
}
 
	function AfficherJoueur()
	{
		$Tableau= array();
		$requete=" select * from ".$this->Table." ";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat)) 
		{  
					$E=new Entreprise(Null,Null,"","","","","",Null,Null,"",0,0,"","");
					$J=new Joueur("","","","","","","","","","",0,0,"","",$E);
					$J->setNom($data['Nom_util']);
					$J->setPrenom($data['Prenom_util']);
					$J->setNom_Entreprise($data['Nom_entreprise']);
					$J->setEmail($data['Email_util']);
					$J->setPWD($data['Motdepasse_util']);
					$J->setLien_Photo($data['Photoprofil_util']);
					$J->setDate_inscription($data['Date_inscrit']);
					$J->setDate_De_Naissance($data['Date_naissance']);
					$J->setResidence($data['Residence_util']);
					$J->setRegion($data['Region']);
					$J->setNombre_de_parties($data['Nombre_parties']);
					$J->setTelephone($data['Telephone_util']);
					$J->setInfo($data['Info']);
					$J->setType($data['Type_objet']);					
					/* */
					$J->setEntreprise_affilie($data['Id_entreprise_FK']);
					$Tableau[$i]=$J;
					$i++;
		}
		return $Tableau;
	}




}

//Main
/*$liste=$EM->AfficherEntreprise();
$liste=$JM->AfficherJoueur();
*/?>


  <?php

  /*foreach ($liste as $Voi):
  echo "<tr>";
  echo "<td><center>".$Voi->getNom()."</center></td>";
  echo "<td><center>".$Voi->getPrenom()."</center></td>";
  echo "<td><center>".$Voi->getNom_Entreprise()."</center></td>";
  echo "<td><center>".$Voi->getEmail()."</center></td>";
  echo "<td><center>".$Voi->getPWD()."</center></td>";
  echo "<td><center>".$Voi->getLien_photo()."</center></td>";
  echo "<td><center>".$Voi->getDate_Inscription()."</center></td>";
  echo "<td><center>".$Voi->getDate_De_Naissance()."</center></td>";
  echo "<td><center>".$Voi->getResidence()."</center></td>";
  echo "<td><center>".$Voi->getRegion()."</center></td>";
  echo "<td><center>".$Voi->getNombre_De_Parties()."</center></td>";
  echo "<td><center>".$Voi->getTelephone()."</center></td>";
  echo "<td><center>".$Voi->getInfo()."</center></td>";
  echo "<td><center>".$Voi->getType()."</center></td>";
  echo "</tr>";
  endforeach;*/				
  ?>
<!--</table>-->