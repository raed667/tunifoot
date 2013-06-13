<?php
session_start();
require_once("..\Model\ReservationModel.php");
require_once('../Model/TerrainModel.php');

if(isset($_GET['datep']))
{
	$exite=0;
	$Cdate=$_GET['datep'];
	$IdT= $_GET['IdT'];
$_SESSION['DateReserv']=$Cdate;

$RM = new ReservationModel();
$listeReserv = $RM->ReservationsDuJour($Cdate,$IdT);
$TM = new TerrainModel();
$T = $TM->RetournerTerrain($IdT);
}
$ia= $T->GetHeure_ouverture();

$ja= $T->GetHeure_fermeture();

$i = $ia[0].$ia[1];
$j =$ja[0].$ja[1];


?>



<br>

<div class="align-center">



<?php if($_SESSION['Type']=='Joueur')
{
 ?>
<!--ICI VA LES HEURES  --> 
<div class="row-fluid">
<form action="../control/Soumettre_Reservation.php"  method="get"> 
<input name="IdU" id="IdU"  value="<?php echo $_SESSION['IdU']; ?>" hidden="true" />
<input name="DateReserv" id="DateReserv" value="<?php echo $_SESSION['DateReserv'];?>" hidden="true" />
<input name="IdT"  id="IdT" value="<?php echo $_SESSION['IdT'];?>" hidden="true" />

<?php
if(isset($_GET['datep']) and ($_GET['datep'] < date('Y-m-d')))
{
?>

<div class="alert">
     <strong>Date dépassée </strong>  Veilliez choisir une date valide.
   </div>
   
	

<?php 
}

if(isset($_GET['datep']) and ($_GET['datep']>=date('Y-m-d')))
{
	
while($i<$j)
{
$h0= sprintf ("%02u", $i);
$h1 =  sprintf ("%02u", ($i+1));
$reserve = false;
$confirme= false;

		foreach ($listeReserv as $Voi):
 			if($Voi->GetHeur_reserv()==$h0.':00:00')
 				{
					$reserve = true;
					if($Voi->GetConfirmer_reserv()==1)
					{
						$confirme= true;
					 }
	 		
 				}

endforeach;	

if($reserve == true && $confirme== true)
{ ?>
	<button class="btn btn-danger" disabled  value=<?php echo('"'.$i.'"'); ?>  style="margin:1.5%; color:#FFF !important;"><span class="hint--top" data-hint="L'heure est résérvée"><?php echo($h0.'h <i class="icon-arrow-right"></i>'.$h1.'h'); ?></span></button>
 <?php 
 }
if($reserve == true && $confirme== false) 
			{
				?>
	 <button class="btn btn-warning" disabled  value=<?php echo('"'.$i.'"'); ?>  style="margin:1.5%; color:#FFF !important;"><span class="hint--top" data-hint="L'heure est résérvée sans confirmation"><?php echo($h0.'h <i class="icon-arrow-right"></i>'.$h1.'h'); ?></span></button>
	 <?php 
			
			}
			
if($reserve == false && $confirme== false)
{
?>


	 <button class="btn btn-success"  id='Valide' name="Valide"  value=<?php echo('"'.$i.'"'); ?>  style="margin:1.5%; color:#FFF !important;"><?php echo($h0.'h <i class="icon-arrow-right"></i>'.$h1.'h'); ?></button>


	 <?php 


}		
 
 
 
 
$i++;
}

}
?>
</form>
</div>

<?php } //FIN IF ISSET TYPE == JOUEUR
else
{
	
}
  ?> 


<!--FIN LES HEURES  --> 


</div>