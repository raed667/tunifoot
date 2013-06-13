<?php


class Reservation
{ 

private $Id;
private $Date_reserv ;
private $Heur_reserv ;
private $Date_syst;
private $Confirmer_reserv;
private $Id_util_resv_FK;
private $Id_ter_resv_Fk;

function __construct($Datereserv ,$Heurreserv ,$Datesys,$Confirmerreserv)
{
$this->Date_reserv=$Datereserv ;
$this->Heur_reserv=$Heurreserv ;
$this->Date_sys=$Datesys;
$this->Confirmer_reserv=$Confirmerreserv ;

}

//debut GET
 function GetId_util_resv_FK()
 { return $this->Id_util_resv_FK;
 }
 
  function GetId_ter_resv_Fk()
 { return $this->Id_ter_resv_Fk;
 }
 
 function GetId()
 { return $this->Id;
 }

 function GetDate_reserv()
 { return $this->Date_reserv;
 }
  function GetHeur_reserv()
 { return $this->Heur_reserv;
 } 

  function GetConfirmer_reserv()
 { return $this->Confirmer_reserv;
 } 
  function GetDate_syst()
 { return $this->Date_syst;
 }
//fin GET
 
 
//debut SET 

 function setId_util_resv_FK($Id_util_resv_FK)
 { $this->Id_util_resv_FK=$Id_util_resv_FK ;}
 
  function setId_ter_resv_Fk($Id_ter_resv_Fk)
 { $this->Id_ter_resv_Fk=$Id_ter_resv_Fk;}


 function setId($Id)
 { $this->Id=$Id ;}
 
 function setDate_reserv($Datereserv)
 { $this->Date_reserv=$Datereserv ;}
 
 function setHeur_reserv($Heurreserv)
 { $this->Heur_reserv=$Heurreserv;}
 
 function setDate_syst($Datesyst)
 { $this->Date_syst=$Datesyst;}
 
 function setConfirmer_reserv($confirmerreserv)
{ $this->Confirmer_reserv=$confirmerreserv;}
//fin SET

}//fin class Reservation

?>