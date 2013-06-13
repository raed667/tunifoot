<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<?php 
include('head_no_title.php'); 
require_once('../Model/TerrainModel.php');
if(isset($_GET['IdT'])==false or ($_GET['IdT']=='') )
		{
			$_SESSION['404Message']= 'Cette Page est inacessible sans avoir fait le choix d\'un terrain.';
				 echo('
<script type="text/javascript">
setTimeout(function(){window.location = "../Vue/404.php";}, 0 ); 
</script>'  );
		}
		
if($_SESSION['Type']!='Entreprise')
		{
			$_SESSION['404Message']= 'Cette Page n\'est pas acessible pour votre type de Profil.';
				 echo('
<script type="text/javascript">
setTimeout(function(){window.location = "../Vue/404.php";}, 0 ); 
</script>'  );
		}		
		
$connected = true;


	if($_SESSION['IdU']==(-1))
	{
		$connected = false;

	}

else
{
$connected = true;
}

if($connected == false)
{
	$_SESSION['404Message']= 'Vous devez vous connecter pour reserver un terrain.';
				 echo('
<script type="text/javascript">
setTimeout(function(){window.location = "../Vue/404.php";}, 0 ); 
</script>'  );
}

 ?>
 
<?php 
$IdT = $_GET['IdT'];
$TMa = new TerrainModel();
$existeT = $TMa->ExisteTerrain($IdT);
$_SESSION['IdT']=$IdT;
require_once("..\Model\ReservationModel.php");
if(isset($_GET['datep']))
$Cdate = $_GET['datep'];


?>

<script language="javascript">
function verifier()
{
	
var	selected1 = document.getElementById('datepicker1').value;
var	selected2 = document.getElementById('datepicker2').value;

var freq;
if(document.getElementById('freq_M').checked)
{
freq='Mois';
}
if(document.getElementById('freq_S2').checked)
{
freq='2Semaines';
}
if(document.getElementById('freq_S1').checked)
{
freq='Semaine';
}
if(document.getElementById('freq_J').checked)
{
document.getElementById('datepicker2').style.display = 'none';
freq='Jour';
}
else
{
	document.getElementById('datepicker2').style.display = 'inline';
}


var IdT = document.getElementById('IdT').value;
	if(window.XMLHttpRequest)
	{

		xhr = new XMLHttpRequest();
	}
	
	xhr.onreadystatechange = function()
	{

		if((xhr.readyState == 4) /*&& (xhr.status  == 200)*/)
		
		{	
		document.getElementById('zone_heures').innerHTML =xhr.responseText;
		
		
		}};

xhr.open('GET','Heures_Reservations_Entreprise.php?datep1='+selected1+'&IdT='+IdT+'&datep2='+selected2+'&freq='+freq,true);
xhr.send(null);
}
</script>





<title>Reservation</title>

</head>


<body data-accent="blue" onLoad="setDateRes()">
<?php include('nav_bar.php'); ?>
<br>

		<div id="datepickerss"></div>

 <script type="text/javascript">
 function getdate()  // a voir ce que cela fait ... aucune idée
 {

            var myDate = document.myForm.datep.value;
			//alert(myDate);
			var linkme = "heure_reserv.php?datep="+String(myDate);
			document.getElementById['heure'].src = linkme;

 }
 </script>

<script language="javascript">
function setDateRes()
{
var a = document.getElementById('datepick').value;
 document.getElementById('datepicker1').value=a;
}
onload(setDateRes());
</script>
 

<!--  s9ala té3 il site : lkol fi lkol 12  offset 1 + body 8 + span1-->
<div class="row-fluid">
   <div class="span12">
      <div class="row-fluid">
         <div class="span2 visible-desktop"></div>
           <div class="span8">
           
          


<!--     DEBUT DU BODY     --> 
<!--ICI VA LE CONTENU  --> 
<?php
if(isset($_SESSION['ReservationError']) and $_SESSION['ReservationError']!='')
{echo('
<div class="alert alert-error">
     <button type="button" class="close" data-dismiss="alert"></button>
     <strong>Erreur!</strong>'.$_SESSION['ReservationError'].'
   </div>');
$_SESSION['ReservationError']='';
}


?>


<?php if($existeT)
{ ?>


<div class="hero-unit align-center"  >
 <!-- ALERT -->
           <div class="alert alert-info" style="margin-top:-5%;">
     <h4>Veilliez choisir une date.</h4>
   </div>
           <!-- ALERT -->

<form name="myForm" action="">
		<div class="well">
            <input id="datepicker1" name="datep" type="date" onChange="verifier()" style="height:auto;" /> 
            <input id="datepicker2" name="datep2" type="date" onChange="verifier()" style="height:auto; display:none;"/><br>


 	<label class="radio inline">
     <input type="radio" name="freq" id="freq_J" value="jour" onChange="verifier()" checked>
     <span class="metro-radio">Une fois</span>
   </label>

 	<label class="radio inline">
     <input type="radio" name="freq" id="freq_S1" value="1semaine" onChange="verifier()" >
     <span class="metro-radio">Chaque semaine</span>
   </label>

	<label class="radio inline">
     <input type="radio" name="freq" id="freq_S2" value="2semaine" onChange="verifier()" >
     <span class="metro-radio">Chaque deux semaines</span>
   </label>

	<label class="radio inline">
     <input type="radio" name="freq" id="freq_M" value="mois" onChange="verifier()" >
     <span class="metro-radio">Chaque mois</span>
   </label>


            <input class="hidden" id="IdT" name="IdT" value="<?php echo($IdT); ?>" hidden="true" />
        </div>
</form>
</div>
<input id="datepick" hidden="true" value="<?php echo $Cdate; ?>" style="height:0;" />

<div id="zone_heures">
</div>

<?php }
else
{$_SESSION['404Message']= 'Votre selection de terrain est invalide.';
				 echo('
<script type="text/javascript">
setTimeout(function(){window.location = "../Vue/404.php";}, 0 ); 
</script>'  ); }
 ?>
<!--ICI VA LE CONTENU  --> 
<br><br>
<br><br><br>

		</div>  <!-- FIN SPAN 8--> 
     </div> <!-- FIN FLUID ROW--> 
  </div>  <!-- FIN SPAN 12--> 
</div><!-- FIN FLUID ROW--> 

<!-- FIN DU BODY--> 
<br>
<br>
<br>


<?php include('footer.php'); ?>
<?php include('en_page_scripts.php'); ?> 


</body>
</html>