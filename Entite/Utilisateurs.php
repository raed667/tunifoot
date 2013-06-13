<?php

/*  Classe Utilisateur */

class Utilisateur
{
protected $Id;
protected $Nom; //commun
protected $Prenom; //commun
protected $Email; //commun
protected $PWD; //commun
protected $Lien_Photo; //commun
protected $Date_Inscription; //commun
protected $Date_De_Naissance; //commun
protected $Residence; //commun
protected $Region;  //commun
protected $Nombre_De_Parties; //commun
protected $Telephone;  //commun
protected $Info;  //commun
protected $Type;  //commun

/*  Methodes GET     */
 function getId()
 { return $this->Id; }

function getNom()
{return $this->Nom;}

function getPrenom()
{return $this->Prenom;}

function getDate_De_Naissance()
{return $this->Date_De_Naissance;}

function getEmail()
{return $this->Email;}

function getPWD()
{return $this->PWD;}

function getLien_Photo()
{return $this->Lien_Photo;}

function getDate_Inscription()
{return $this->Date_Inscription;}

function getResidence()
{return $this->Residence;}

function getNombre_De_Parties()
{return $this->Nombre_De_Parties;}

function getTelephone()
{return $this->Telephone;}

function getInfo()
{return $this->Info;}

function getType()
{return $this->Type;}

function getRegion()
{return $this->Region;}

/* Fin des Methodes GET     */



/*  Methodes SET     */
 function setId($Id)
 { $this->Id=$Id ;}

function setNom($x)
{$this->Nom=$x;}

function setPrenom($x)
{$this->Prenom=$x;}

function setDate_De_Naissance($x)
{$this->Date_De_Naissance=$x;}

function setEmail($x)
{$this->Email=$x;}

function setPWD($x)
{$this->PWD=$x;}

function setLien_Photo($x)
{$this->Lien_Photo=$x;}

function setDate_Inscription($x)
{$this->Date_Inscription=$x;}

function setResidence($x)
{$this->Residence=$x;}

function setNombre_De_Parties($x)
{$this->Nombre_De_Parties=$x;}

function setTelephone($x)
{$this->Telephone=$x;}

function setInfo($x)
{$this->Info=$x;}

function setType($x)
{$this->Type=$x;}

function setRegion($x)
{$this->Region=$x;}
/* Fin des Methodes SET     */


/* Constructeur */
function __construct($Nom,$Prenom,$Email,$PWD,$Lien_Photo,$Date_Inscription,$Date_De_Naissance,$Residence,$Region,$Nombre_De_Parties,
$Telephone,$Info,$Type)
	{
$this->Nom = $Nom;
$this->Prenom = $Prenom;
$this->Date_De_Naissance = $Date_De_Naissance;
$this->Email = $Email;
$this->PWD = $PWD;
$this->Lien_Photo = $Lien_Photo;
$this->Date_Inscription = $Date_Inscription;
$this->Residence = $Residence;
$this->Nombre_De_Parties = $Nombre_De_Parties;
$this->Telephone = $Telephone;
$this->Info = $Info;
$this->Type = $Type;
$this->Region = $Region;
}
/* Fin Constructeur */
}
/* Fin Class Utilisateur  */ 



/* Class Entreprise */
class Entreprise extends Utilisateur
{
	protected $Nom_Entreprise; // entreprise

/* Constructeur */
function __construct($Nom,$Prenom,$Nom_Entreprise,$Email,$PWD,$Lien_Photo,$Date_Inscription,$Date_De_Naissance,$Residence,$Region,$Nombre_De_Parties,
$Telephone,$Info,$Type)
	{
$this->Nom = $Nom;
$this->Prenom = $Prenom;
$this->Date_De_Naissance = $Date_De_Naissance;
$this->Email = $Email;
$this->PWD = $PWD;
$this->Lien_Photo = $Lien_Photo;
$this->Date_Inscription = $Date_Inscription;
$this->Residence = $Residence;
$this->Nombre_De_Parties = $Nombre_De_Parties;
$this->Telephone = $Telephone;
$this->Info = $Info;
$this->Type = $Type;
$this->Region = $Region;

$this->Nom_Entreprise = $Nom_Entreprise;
	}
/* Fin Constructeur */
	
/*  Methodes GET     */
function getNom_Entreprise()
{return $this->Nom_Entreprise;}
/* Fin des Methodes GET     */

/*  Methodes SET     */
function setNom_Entreprise($x)
{$this->Nom_Entreprise=$x;}
/* Fin des Methodes SET     */
}
/* Fin Class Entreprise  */ 




/*  Class Player */
class Joueur extends Utilisateur
{
	protected  $Entreprise_affilie;
	protected $Nom_Entreprise; // entreprise
/* Constructeur */
function __construct($Nom,$Prenom,$Email,$PWD,$Lien_Photo,$Date_Inscription,$Date_De_Naissance,$Residence,$Region,$Nombre_De_Parties,
$Telephone,$Info,$Type,$Entreprise_affilie)
	{
$this->Nom = $Nom;
$this->Prenom = $Prenom;
$this->Date_De_Naissance = $Date_De_Naissance;
$this->Email = $Email;
$this->PWD = $PWD;
$this->Lien_Photo = $Lien_Photo;
$this->Date_Inscription = $Date_Inscription;
$this->Residence = $Residence;
$this->Nombre_De_Parties = $Nombre_De_Parties;
$this->Telephone = $Telephone;
$this->Info = $Info;
$this->Type = $Type;
$this->Region = $Region;
$this->Entreprise_affilie = $Entreprise_affilie;
	}	
	
	
/* Fin Constructeur */


/*  Methodes GET     */
function getEntreprise_affilie()
{return $this->Entreprise_affilie;}
/* Fin des Methodes GET     */

/*  Methodes SET     */
function setEntreprise_affilie($x)
{$this->Entreprise_affilie=$x;}
/* Fin des Methodes SET     */

  /* Methodes GET     */
function getNom_Entreprise()
{return $this->Nom_Entreprise;}
/* Fin des Methodes GET     */

/*  Methodes SET     */
function setNom_Entreprise($x)
{$this->Nom_Entreprise=$x;}
/* Fin des Methodes SET     */


}
/* Fin Class Player */ 

?>