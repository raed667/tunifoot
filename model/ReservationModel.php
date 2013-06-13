<?php
require_once('..\Entite\Reservation.php');
require_once('..\Configuration.php');


class ReservationModel
{
	public $Table="reservation";
	public $Table_util="utilisateur";
	
	function __construct()
	{
		$Conf=new Configuration();
		$Conf->connexion();
	}
	
	function AjoutReservation($R)
	{
		$requete="insert into ".$this->Table."(Date_reserv,Heur_reserv,Date_syst,Confirmer_reserv,Id_ter_resv_Fk,Id_util_resv_FK)  
		
		values
		
	('".$R->GetDate_reserv()."','".$R->GetHeur_reserv()."','".$R->GetDate_syst()."','".$R->GetConfirmer_reserv()."',".$R->GetId_ter_resv_Fk(). ",".$R->GetId_util_resv_FK().");";
		
		
		mysql_query ($requete) or die ("Erreur".mysql_error());	
	}

	function SupprimeReservation($Id)
	{
		$requete="delete from ".$this->Table." where Id_reserv_PK= '$Id'";
		mysql_query ($requete) or die ("Erreur".mysql_error());	
	}
	
	function NombreReservationSelonJoueurs()
	{
		$requete="select * from ".$this->Table." where Id_util_resv_FK IN(select Id_Util_Pk from ".$this->Table_util." where Type_objet='Joueur')";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat))   
		$i++;
		return $i;
	}
	
	function NombreReservationSelonEntreprises()
	{
		$requete="select * from ".$this->Table." where Id_util_resv_FK IN(select Id_Util_Pk from ".$this->Table_util." where Type_objet='Entreprise')";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat))   
		$i++;
		return $i;
	}
	
function SupprimereservationSelonJoueur($Id)
{   
$requete="delete from ".$this->Table." where Id_util_resv_FK ='$Id'";
	mysql_query($requete) or die ("Ereur ".mysql_error());


}	
	function ModifierReservation ($Id,$R)
		{			
			$Requete = "update ".$this->Table." set Date_reserv = '".$R->GetDate_reserv()."',Heur_reserv = '".$R->GetHeur_reserv()."',Confirmer_reserv = '".$R->GetConfirmer_reserv()."',Date_syst = '".$R->GetDate_syst()."' where Id_reserv_PK = '$Id'";
			mysql_query ($Requete) or die ("Erreur".mysql_error());
		}
		
		
		function ValiderPayement ($Id)
		{			
			$Requete = "update ".$this->Table." set Confirmer_reserv = 1 where Id_reserv_PK = ".$Id."";
			
			mysql_query ($Requete) or die("error");			
		}
		
	function ChercherId($R)
	{
		$Requete = " select * from ".$this->Table." where (Date_reserv = '".$R->GetDate_reserv()."' and Heur_reserv = '".$R->GetHeur_reserv()."' )and Date_syst = '".$R->GetDate_syst()."' ";
		$Resultat =mysql_query($Requete) or die ("Ereur ".mysql_error());
		$Data=mysql_fetch_array($Resultat);
		$Id=$Data['Id_reserv_PK'];
		return $Id;
	}
	
	function RetournerReserv($Id)
	{
		$Requete = " select * from ".$this->Table." where Id_reserv_PK = $Id ;";
		$Resultat =mysql_query($Requete) or die ("Ereur ".mysql_error());
		$data=mysql_fetch_array($Resultat);
		$R=new reservation("","","",true);
					$R->setId($data['Id_reserv_PK']);
					$R->setDate_reserv($data['Date_reserv']);
					$R->setHeur_reserv($data['Heur_reserv']);
					$R->setDate_syst($data['Date_syst']);
					$R->setConfirmer_reserv($data['Confirmer_reserv']);
					$R->setId_ter_resv_Fk($data['Id_ter_resv_Fk']);
					$R->setId_util_resv_FK($data['Id_util_resv_FK']);
	return $R;
	}
	
	function AfficherReservation()
	{
		$Tableau= array();
		$requete=" select * from ".$this->Table." ";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat)) 
		{  
			
				    $R=new reservation("","","",true);
					$R->setId($data['Id_reserv_PK']);
					$R->setDate_reserv($data['Date_reserv']);
					$R->setHeur_reserv($data['Heur_reserv']);
					$R->setDate_syst($data['Date_syst']);
					$R->setConfirmer_reserv($data['Confirmer_reserv']);
					$R->setId_ter_resv_Fk($data['Id_ter_resv_Fk']);
					$R->setId_util_resv_FK($data['Id_util_resv_FK']);
					$Tableau[$i]=$R;
					$i++;
		}
		return $Tableau;
	}
	
	function HistoriqueJoueur($IdU)
	{
		$Tableau= array();
		$requete=" select * from ".$this->Table." where Id_util_resv_FK = ".$IdU." ;";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		
		while ($data= mysql_fetch_array($resultat)) 
		{  
					$R=new reservation("","","",true);
					$R->setId($data['Id_reserv_PK']);
					$R->setDate_reserv($data['Date_reserv']);
					$R->setHeur_reserv($data['Heur_reserv']);
					$R->setDate_syst($data['Date_syst']);
					$R->setConfirmer_reserv($data['Confirmer_reserv']);
					$R->setId_ter_resv_Fk($data['Id_ter_resv_Fk']);
					$R->setId_util_resv_FK($data['Id_util_resv_FK']);
					$Tableau[$i]=$R;
					$i++;
		}
		return $Tableau;
	}
		
	function ReservationsDuJour($date,$IdT)
	{
		$Tableau= array();
		$requete=" select * from ".$this->Table." where `Date_reserv` = '".$date."' and `Id_ter_resv_Fk` = ".$IdT." ;";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		
		while ($data= mysql_fetch_array($resultat)) 
		{  
					$R=new reservation("","","",true);
					$R->setId($data['Id_reserv_PK']);
					$R->setDate_reserv($data['Date_reserv']);
					$R->setHeur_reserv($data['Heur_reserv']);
					$R->setDate_syst($data['Date_syst']);
					$R->setConfirmer_reserv($data['Confirmer_reserv']);
					$R->setId_ter_resv_Fk($data['Id_ter_resv_Fk']);
					$R->setId_util_resv_FK($data['Id_util_resv_FK']);
					$Tableau[$i]=$R;
					$i++;
		}
	return $Tableau;
	}
	
//////////////////////////////////////////////////////////////Mois//////////////////////////////////////////////////////////////////////////////////////////	
	function NombreReservationSelonMoisJan()
	{
		$requete="select * from ".$this->Table." where Date_reserv between '2013-01-01' and '2013-01-31';";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat))   
		$i++;
		return $i;
	}
	
	function NombreReservationSelonMoisFev()
	{
		$requete="select * from ".$this->Table." where Date_reserv between '2013-02-01' and '2013-02-28';";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat))   
		$i++;
		return $i;
	}
	
	function NombreReservationSelonMoisMar()
	{
		$requete="select * from ".$this->Table." where Date_reserv between '2013-03-01' and '2013-03-31';";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat))   
		$i++;
		return $i;
	}
	
	function NombreReservationSelonMoisAvr()
	{
		$requete="select * from ".$this->Table." where Date_reserv between '2013-04-01' and '2013-04-30';";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat))   
		$i++;
		return $i;
	}
	
	function NombreReservationSelonMoisMai()
	{
		$requete="select * from ".$this->Table." where Date_reserv between '2013-05-01' and '2013-05-31';";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat))   
		$i++;
		return $i;
	}	
	
	function NombreReservationSelonMoisJun()
	{
		$requete="select * from ".$this->Table." where Date_reserv between '2013-06-01' and '2013-06-30';";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat))   
		$i++;
		return $i;
	}
	
	function NombreReservationSelonMoisJui()
	{
		$requete="select * from ".$this->Table." where Date_reserv between '2013-07-01' and '2013-05-31';";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat))   
		$i++;
		return $i;
	}
	
	function NombreReservationSelonMoisAou()
	{
		$requete="select * from ".$this->Table." where Date_reserv between '2013-08-01' and '2013-08-31';";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat))   
		$i++;
		return $i;
	}
	
	function NombreReservationSelonMoisSept()
	{
		$requete="select * from ".$this->Table." where Date_reserv between '2013-09-01' and '2013-09-30';";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat))   
		$i++;
		return $i;
	}
	
	function NombreReservationSelonMoisOct()
	{
		$requete="select * from ".$this->Table." where Date_reserv between '2013-10-01' and '2013-10-31';";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat))   
		$i++;
		return $i;
	}
	
	function NombreReservationSelonMoisNov()
	{
		$requete="select * from ".$this->Table." where Date_reserv between '2013-11-01' and '2013-11-30';";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat))   
		$i++;
		return $i;
	}
	
	function NombreReservationSelonMoisDec()
	{
		$requete="select * from ".$this->Table." where Date_reserv between '2013-12-01' and '2013-12-31';";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		$i=0;
		while ($data= mysql_fetch_array($resultat))   
		$i++;
		return $i;
	}
	
			function RetournerNombreReservation()
	
	{
		$r=0;
		$requete=" select * from ".$this->Table." ";
		$resultat =mysql_query($requete) or die ("Ereur ".mysql_error());
		
		while ($data= mysql_fetch_array($resultat)) 
		
		while($a=mysql_fetch_row($resultat))
	
		{
		$r++;
		}
		
		return $r;
	}
	
	
	
}