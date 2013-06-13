<div class="align-center">
<?php
session_start();
require_once("..\Model\ReservationModel.php");
require_once('../Model/TerrainModel.php');

//if(isset($_GET['datep']) && isset($_GET['datep2']) )
//{
	$exite=0;
	if(isset($_GET['datep1']))
	{$date_debut=$_GET['datep1'];
	}
	if(isset($_GET['datep2']))
	{$date_fin=$_GET['datep2'];
	}
	$IdT= $_GET['IdT'];
	$freq= $_GET['freq'];
	
	if($freq =='Jour')
	{
		$date_fin = $date_debut;
	}
//echo($date_debut. '   '.$date_fin.' '.$IdT.' '.$freq);
//$_SESSION['DateReserv']=$Cdate;
$Cdate=$date_debut;


$TM = new TerrainModel();
$T = $TM->RetournerTerrain($IdT);
$ia= $T->GetHeure_ouverture();
$ja= $T->GetHeure_fermeture();
$i = $ia[0].$ia[1];
$j =$ja[0].$ja[1];
		
$HeuresLibres= array();
while($i<$j)
{
	$HeuresLibres[$i]='libre';
$i++;
}


if( isset($date_debut)  and $date_debut < date('Y-m-d')) // si la date est dépassé
{
?>

<div class="alert">
     <strong>Date dépassée </strong>  Veilliez choisir une date valide.
   </div>

<?php
}
if  ( ( isset($date_debut) and isset($_GET['datep2'])) and ($date_debut > $date_fin)) // si les dates sont > à l'autre 
{
?>

<div class="alert">
     <strong>Choix incorrecte </strong> La première date est supèrieur à la deuxiemme. <br/>Veilliez choisir une date valide.
   </div>
   
 
<?php }
$i = $ia[0].$ia[1];
if( $date_debut>=date('Y-m-d') and ($date_debut<=$date_fin) ) // si tout va bien
{
	
$dateDebut = strtotime($date_debut);
$dateFin = strtotime($date_fin);


$RM = new ReservationModel();

while($dateDebut <= $dateFin)
{	//parcours tout les jours 
		$currentDate = date('Y-m-d',$dateDebut); 
	$listeReserv = $RM->ReservationsDuJour($currentDate,$IdT); // retourne la liste des reservations du jour 


while($i<$j)
{
$h0= sprintf ("%02u", $i);
$h1 =  sprintf ("%02u", ($i+1));


		foreach ($listeReserv as $Voi):
 			if($Voi->GetHeur_reserv()==$h0.':00:00')
 				{
					$HeuresLibres[$i] ='reserve';
			
					if($Voi->GetConfirmer_reserv()==1)
					{
					$HeuresLibres[$i] ='confirme';	 
					}
 				}

		endforeach;	
$i++;
}
$i = $ia[0].$ia[1];

		if($freq =='Jour')
		{
	$dateDebut = strtotime("+1 day", $dateDebut);
		}

		if($freq =='Semaine')
		{ 
	$dateDebut = strtotime("+1 week", $dateDebut);
	
		}
		if($freq =='2Semaines')
		{
	$dateDebut = strtotime("+2 weeks", $dateDebut);
				
		}
		if($freq =='Mois')
		{
	$dateDebut = strtotime("+1 month", $dateDebut);
		}	
}

?>

<br>
<div class="row-fluid">
<form action="../control/Soumettre_Reservation_entreprise.php"  method="get"> 
<input name="IdU" id="IdU"  value="<?php echo $_SESSION['IdU']; ?>" hidden="true" />
<input name="DateReserv1" id="DateReserv1" value="<?php echo $date_debut;?>" hidden="true" />
<input name="DateReserv2" id="DateReserv2" value="<?php echo $date_fin;?>" hidden="true" />
<input name="freq" id="freq" value="<?php echo $freq;?>" hidden="true" />

<input name="IdT"  id="IdT" value="<?php echo $_SESSION['IdT'];?>" hidden="true" />

<?php
$i = $ia[0].$ia[1];
while($i<$j)
{
	$h0= sprintf ("%02u", $i);
$h1 =  sprintf ("%02u", ($i+1));

if($HeuresLibres[$i]=='libre')
{?>
<button class="btn btn-success"  id='Valide' name="Valide"  value=<?php echo('"'.$i.'"'); ?>  style="margin:1.5%; color:#FFF !important;"><?php echo($h0.'h <i class="icon-arrow-right"></i>'.$h1.'h'); ?></button>
<?php }
if($HeuresLibres[$i]=='reserve')
{?>
<button class="btn btn-warning" disabled  value=<?php echo('"'.$i.'"'); ?>  style="margin:1.5%; color:#FFF !important;"><span class="hint--top" data-hint="L'heure est résérvée sans confirmation"><?php echo($h0.'h <i class="icon-arrow-right"></i>'.$h1.'h'); ?></span></button>
<?php }
if($HeuresLibres[$i]=='confirme')
{?>
<button class="btn btn-danger" disabled  value=<?php echo('"'.$i.'"'); ?>  style="margin:1.5%; color:#FFF !important;"><span class="hint--top" data-hint="L'heure est résérvée"><?php echo($h0.'h <i class="icon-arrow-right"></i>'.$h1.'h'); ?></span></button>
<?php }
$i++;
}
?>	

	
	
</form>
</div>
	
	
	
	<!--FIN LES HEURES  --> 
	

<?php	
}
?>











</div>