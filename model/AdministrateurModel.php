<?php
require_once('..\Entite\Administrateur.php');
require_once('..\Configuration.php');


class AdministrateurModel
{
	public $Table="administrateur";
	
	function __construct()
	{
		$Conf=new Configuration();
		$Conf->connexion();
	}
	
   
   
   function AjoutAdministrateur($A)
	{
		$Requete="insert into ".$this->Table."(Nom_Admin,Prenom_Admin,	Login_Admin,Pwd_Admin)
		
		values
		
		('".$A->getNom()."','".$A->getPrenom()."','".$A->getLogin()."','".$A->getPWD()."')";
		
		mysql_query($Requete);
	}

function ModifierAdministrateur ($Id,$A)
		{			
	$Requete = "update ".$this->Table." set Nom_Admin= '".$A->getNom()."',Prenom_Admin = '".$A->getPrenom()."',Login_Admin= '".$A->getLogin()."',Pwd_Admin= '".$A->getPWD()."' where Id_Admin_PK = '$Id'";

			mysql_query ($Requete) or die ("Erreur".mysql_error());
		}



function SupprimeAdministrateur($Id)
	{
		$requete="delete from ".$this->Table." where Id_Admin_PK= '$Id'";
		mysql_query($requete);
	}


function LoginAdmin($log,$pwd)
{ 
 
$Requete = " select * from ".$this->Table." WHERE Login_Admin = '$log' AND Pwd_Admin ='$pwd';";
$Resultat =mysql_query($Requete) or die ("Ereur ".mysql_error());

$A=new administrateur("","","","");

$data= mysql_fetch_array($Resultat);
if($data)
{
return ($data['Id_Admin_PK']);
} 
else
return (-1);
}



	
function afficherAdmin($Id)
{
$A=array();
$Tableau= array();
$requete=" select * from ".$this->Table." WHERE Id_Admin_Pk='$Id'";
$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
$i=0;
while ($data= mysql_fetch_array($resultat)) 
{
$A['nom'] = $data['Nom_Admin'];
$A['prenom'] = $data['Prenom_Admin'];
$A['login'] = $data['Login_Admin'];

$Tableau[$i]=$A;
}
return $A;

}	
	

	
	

function RetournerAdministrateur($Id)
	{
		$Requete = " select * from ".$this->Table." where Id_Admin_PK= $Id ;";
		$Resultat =mysql_query($Requete) or die ("Ereur ".mysql_error());
		$data=mysql_fetch_array($Resultat);
		$A=new administrateur("","","","");
	
		
		            $A->setId($data['Id_Admin_PK']);
					$A->setLogin($data['Login_Admin']);
					$A->setNom($data['Nom_Admin']);
				    $A->setPrenom($data['Prenom_Admin']);
					$A->setPWD($data['PWD_Admin']);
					
	return $A;
	}




}
?>



