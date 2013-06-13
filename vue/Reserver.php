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

$Cdate = $_GET['datep'];


?>

<script language="javascript">
function verifier()
{
	
var	selected = document.getElementById('datepicker1').value;
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

xhr.open('GET','Heures_Reservations.php?datep='+selected+'&IdT='+IdT,true);
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
            <input id="datepicker1" name="datep" type="date" onMouseOut="verifier()" style="height:auto;" /> 
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


<link type="text/css" href="css/jquery-ui.css" rel="stylesheet" />	
		<style type="text/css">
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
			#verticalSliders{height:140px;padding-top:20px;}
            #verticalSliders > div{float:left;margin:20px;}
		</style>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js" type="text/javascript"></script>

<script type="text/javascript">
		    $(function () {

		      	      
		        // Datepicker
			
$.datepicker.regional['fr'] = {clearText: 'Effacer', clearStatus: '',
    closeText: 'Fermer', closeStatus: 'Fermer sans modifier',
    prevText: '<Préc', prevStatus: 'Voir le mois précédent',
    nextText: 'Suiv>', nextStatus: 'Voir le mois suivant',
    currentText: 'Courant', currentStatus: 'Voir le mois courant',
    monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin',
    'Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
    monthNamesShort: ['Jan','Fév','Mar','Avr','Mai','Jun',
    'Jul','Aoû','Sep','Oct','Nov','Déc'],
    monthStatus: 'Voir un autre mois', yearStatus: 'Voir un autre année',
    weekHeader: 'Sm', weekStatus: '',
    dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
    dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
    dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
    dayStatus: 'Utiliser DD comme premier jour de la semaine', dateStatus: 'Choisir le DD, MM d',
    dateFormat: 'dd/mm/yy', firstDay: 0, 
    initStatus: 'Choisir la date', isRTL: false};
 $.datepicker.setDefaults($.datepicker.regional['fr']);
	

$(function () {
    $('#datepicker').datepicker({ minDate: 0 });
	$( "#datepicker" ).datepicker( "option", "dateFormat","yy-mm-dd" );
	
	$( "#datepicker" ).setDefaults( $( "#datepicker" ).regional[ "fr" ] );
	
		onchange:{alert($("#datepicker").val());};


});
			

		    });
		</script>


</body>