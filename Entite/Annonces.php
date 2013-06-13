<?PHP

class Annonce
{
private $Id;
private $Texte;


function __construct($Id,$Texte)
{
$this->Id=$Id;
$this->Texte=$Texte;
}

//debut get
function GetId()
 { return $this->Id;
 }

 function GetTexte()
 { return $this->Texte;
 }

 //fin GEt
 
 
 //debut SET
 
 function setId($Id)
 { $this->Id=$Id ;}
 
 function setTexte($Texte)
 { $this->Texte=$Texte;}
 
 //fin SEt
 
}

?>