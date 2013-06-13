<?php
require_once('..\Entite\Login.php');
require_once('..\Configuration.php');

class LoginModel
{
	public $ID;
	public $Table="Login";
	private $Log;
	private $Pwd;
		
	function __construct()
	{
		$Conf=new Configuration();
		$Conf->connexion();
	}
	
	function log($L)
	{	
	
	session_start();
$_SESSION['newLogin']=0; // 0 = null .. 1 vrais .. - 1 faux
$_SESSION['IdP']=-1;
$_SESSION['IdU']=-1;
$ID = -1;

		$Log = $L->GetLog();
		$Pwd = $L->GetPwd();
		
		$requete1="SELECT * FROM `utilisateur` WHERE `Type_objet` = 'Joueur' AND ( `Email_util` = '".$Log."' AND `Motdepasse_util` = '".$Pwd."' );";
$requete2="SELECT * FROM `utilisateur` WHERE `Type_objet` = 'Entreprise' AND ( `Email_util` = '".$Log."' AND `Motdepasse_util` = '".$Pwd."');";
$requete3="SELECT * FROM `proprietaire` WHERE `Email_prop` = '".$Log."' AND `Motdepasse_prop` = '".$Pwd."' ;";

$resultat1 =mysql_query($requete1);

$resultat2 =mysql_query($requete2);

$resultat3 =mysql_query($requete3);

$data01 = mysql_fetch_array($resultat1);
$data02 = mysql_fetch_array($resultat2);
$data03 = mysql_fetch_array($resultat3);
if($data01)
{
echo("[Joueur] Login Approuved : ".$Log." <br> ".$Pwd );
$ID = $data01["Id_util_PK"];

$_SESSION['IdU']=$ID;
$_SESSION['Type']='Joueur';
$_SESSION['newLogin']=1;
    header('Location:../Vue/Joueur.php?Id='.$ID); // nom + localité à changer
} 

if($data02)
{echo("[Societe] Login Approuved : ".$Log." <br> ".$Pwd );
$ID = $data02["Id_util_PK"];

$_SESSION['IdU']=$ID;
$_SESSION['Type']='Entreprise';
$_SESSION['newLogin']=1;

    header('Location:../Vue/Entreprise.php?Id='.$ID); // nom + localité à changer
}

if($data03)
{echo("[Proprio] Login Approuved : ".$Log." <br> ".$Pwd );
$ID = $data03["Id_prop_PK"];

$_SESSION['IdP']=$ID;
$_SESSION['Type']='Proprietaire';
$_SESSION['newLogin']=1;

    header('Location:../Vue/Proprietaire.php?Id='.$ID); // nom + localité à changer
}


if( $ID == -1)
{
	
echo(" Login Failed ");

$_SESSION['IdP']=$ID;
$_SESSION['IdU']=$ID;

$_SESSION['Type']='NULL';
$_SESSION['newLogin']=(-1);

header('Location:../Vue/Login.php'); // nom + localité à changer

}


}}
?>