<?php
//Déclaration de la classe
class Proprietaire
{
	private $Id;
	private $Nom;
	private $Prenom;
	private $Nom_du_Complexe;
	private $Email;
	private $Mot_de_passe;
	private $Lien_photo_profil;
	private $Date_inscription;
	private $Residence;
	private $Region;
	private $Telephone;
	private $Information;
	private $Nombre_de_terrains;
	private $Confirmer_Proprietaire;
	
	//Constructeur
	function __construct($N,$P,$Nc,$E,$M,$Res,$Reg,$Tel,$Info,$Nmbr,$Ph,$Dat)
	{
		$this->Nom=$N;
		$this->Prenom=$P;
		$this->Nom_du_Complexe=$Nc;
		$this->Email=$E;
		$this->Mot_de_passe=$M;
		$this->Residence=$Res;
		$this->Region=$Reg;
		$this->Telephone=$Tel;
		$this->Information=$Info;
		$this->Nombre_de_terrains=$Nmbr;
		$this->Lien_photo_profil=$Ph;
		$this->Date_inscription=$Dat;
		
	}//Fin Constructeur
		
	//Fonctions Get
	function getId()
	{
		return $this->Id;
	}
	function getNom()
	{
		return $this->Nom;
	}
	function getPrenom()
	{
		return $this->Prenom;
	}
	function getNom_du_Complexe()
	{
		return $this->Nom_du_Complexe;
	}
	function getEmail()
	{
		return $this->Email;
	}
	function getMot_de_passe()
	{
		return $this->Mot_de_passe;
	}
	function getLien_photo_profil()
	{
		return $this->Lien_photo_profil;
	}
	function getDate_inscription()
	{
		return $this->Date_inscription;
	}
	function getResidence()
	{
		return $this->Residence;
	}
	function getRegion()
	{
		return $this->Region;
	}
	function getTelephone()
	{
		return $this->Telephone;
	}
	function getInformation()
	{
		return $this->Information;
	}
	function getNombre_de_terrains()
	{
		return $this->Nombre_de_terrains;
	}
	 //Fin Get	
	
	
	//Fonctions Set
	function setId($Id)
	{
		$this->Id=$Id;
	}
	function setNom($N)
	{
		$this->Nom=$N;
	}
	function setPrenom($P)
	{
		$this->Prenom=$P;
	}
	function setNom_du_Complexe($Nc)
	{
		$this->Nom_du_Complexe=$Nc;
	}
	function setEmail($E)
	{
		$this->Email=$E;
	}
	function setMot_de_passe($M)
	{
		$this->Mot_de_passe=$M;
	}
	function setLien_photo_profil($Ph)
	{
		$this->Lien_photo_profil=$Ph;
	}
	function setDate_inscription($Dat)
	{
		$this->Date_inscription=$Dat;
	}
	function setResidence($Res)
	{
		$this->Residence=$Res;
	}
	function setRegion($Reg)
	{
		$this->Region=$Reg;
	}
	function setTelephone($Tel)
	{
		$this->Telephone=$Tel;
	}
	function setInformation($Info)
	{
		$this->Information=$Info;
	}
	function setNombre_de_terrains($Nmbr)
	{
		$this->Nombre_de_terrains=$Nmbr;
	}// Fin Set	
}
?>