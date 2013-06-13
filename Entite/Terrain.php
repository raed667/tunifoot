<?php

class Terrain
{
private $Id;
private $Nom_ter ;
private $Tarif_ter ;
private $Dispo_ter;
private $Nbr_maxjoueur_ter;
private $Lien_ter;
private $Like_ter;
private $Dislike_ter;
private $Heure_ouverture;
private $Heure_fermeture; 

function __construct($Nom,$Tarif,$Dispo,$Nbr,$Lien,$Like,$Dislike,$Heure_ouverture,$Heure_fermeture)
{
$this->Nom_ter=$Nom;
$this->Tarif_ter=$Tarif;
$this->Dispo_ter=$Dispo;
$this->Nbr_maxjoueur_ter=$Nbr;
$this->Lien_ter=$Lien;
$this->Like_ter=$Like;
$this->Dislike_ter=$Dislike;
$this->Heure_ouverture=$Heure_ouverture;
$this->Heure_fermeture=$Heure_fermeture;
}

//debut get
function GetId()
 { return $this->Id;
 }

 function GetNom_ter()
 { return $this->Nom_ter;
 }
  function GetTarif_ter()
 { return $this->Tarif_ter;
 } 
 function GetDispo_ter()
 { return $this->Dispo_ter;
 }
  function GetNbr_maxjoueur_ter()
 { return $this->Nbr_maxjoueur_ter;
 }
  function GetLien_ter()
 { return $this->Lien_ter;
 } 
 function GetLike_ter()
 { return $this->Like_ter;
 } 
 function GetDislike_ter()
 { return $this->Dislike_ter;
 }
 function GetHeure_ouverture()
 { return $this->Heure_ouverture;
 } 
 function GetHeure_fermeture()
 { return $this->Heure_fermeture;
 }

 //fin GEt
 
 
 //debut SET
 
 function setId($Id)
 { $this->Id=$Id ;}
 
 function setNom_ter($Nom)
 { $this->Nom_ter=$Nom;}
 
 function setTarif_ter($Tarif)
 { $this->Tarif_ter=$Tarif;}
 
 function setDispo_ter($Dispo)
 { $this->Dispo_ter=$Dispo;}
 
 function setNbr_maxjoueur_ter($Nbr)
 { $this->Nbr_maxjoueur_ter=$Nbr;}
 
 function setLien_ter($Lien)
 { $this->Lien_ter=$Lien;}
 
 function setLike_ter($Like)
 { $this->Like_ter=$Like;}
 
 function setDislike_ter($Dislike)
 { $this->Dislike_ter=$Dislike;}
 
 function setHeure_ouverture($Heure_ouverture)
 { $this->Heure_ouverture=$Heure_ouverture;}
 
 function setHeure_fermeture($Heure_fermeture)
 { $this->Heure_fermeture=$Heure_fermeture;}
 //fin SEt
}

?>