<?PHP

class administrateur


{ private $Id;
	private $Nom;
	private $Prenom;
	private $Login;
	private $PWD;
	
	
	



//Constructeur
	function __construct($N,$P,$L,$Pw)
	{
		$this->Nom=$N;
		$this->Prenom=$P;
		$this->Login=$L;
		$this->PWD=$Pw;
	
	}


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
    
	function getLogin()
	{
		return $this->Login;
	}
	
	function getPWD()
	{
		return $this->PWD;
	}


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
	
	
		function setLogin($L)
	{
		$this->Login=$L;
	}


	function setPWD($Pw)
	{
		$this->PWD=$Pw;
	}
}
?>