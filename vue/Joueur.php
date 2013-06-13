<?php

require_once("..\Entite\Utilisateurs.php");
require_once("..\Model\UtilisateursModel.php");
require_once("..\Model\TerrainModel.php");
require_once("..\Model\ReservationModel.php");


//error_reporting(E_ALL ^ E_NOTICE);
$Id = htmlspecialchars($_GET["Id"]);
$E=new Entreprise(Null,Null,"","","","","",Null,Null,"",0,0,"","");
$EM=new EntrepriseModel();
$E=$EM->RetournerUtilisateur($Id);

?>

<!doctype html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="fr"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="fr"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->

<head>
<?php include('head_no_title.php'); ?>
<title><?php echo($E->getPrenom().' '.$E->getNom());?></title>

<script src="scripts/dropzone.js"></script>

<script src="scripts/moment.js"></script>

<script language="javascript"> 
setInterval(function() 
{ var a = document.getElementById('PPimg').src;
document.getElementById('PPimg').src = a;},3000);
</script>

</head>
<body data-accent="blue">
<?php include('nav_bar.php'); ?>

<!--  s9ala té3 il site : lkol fi lkol 12  offset 1 + body 8 + span1-->

<div class="row-fluid">
   <div class="span12">
      <div class="row-fluid">
         <div class="span2"></div>
          <?php if($EM->ExisteJoueur($Id)==true)
		 { ?>
           <div class="span8">
<!--     DEBUT DU BODY     --> 
<br>

<?php
if(isset($_SESSION['newLogin']))
{
if($_SESSION['newLogin']==(1) &&  $_SESSION['IdU'] == $Id)
{
	echo('<br>
<br>
<br>

<div class="alert alert-success">
     <button type="button" class="close" data-dismiss="alert"></button>
     <strong>Bienvenu</strong>  dans votre profil.
   </div>');
   $_SESSION['newLogin']=0;
}
}
?>
<br>
<div style="margin-bottom:0;" class="span3">
<?php if (file_exists('../control/uploads/imgJoueur'.$Id.".jpg")) {
?>
<img id="PPimg" src="<?php echo('../control/uploads/imgJoueur'.$Id.".jpg"); ?>" class="img-polaroid" style="height:128px; width:128px;">
<?php }
else {
?>
<img id="PPimg" src="images/reason1.png" class="img-polaroid" style="height:128px; width:128px;">
<?php } ?>
 
</div>

<h1><?php echo $E->getPrenom();echo(" "); echo $E->getNom(); ?></h1>
<br><br><br>
<!--ICI VA LE CONTENU  --> 
<ul style="margin-bottom:0px;" class="nav nav-tabs">
     <li class="active"><a href="#profil" data-toggle="tab"><i class="icon-user"></i> Profil</a></li>
     <?php  if(isset($_SESSION['IdU']))
			{if($_SESSION['IdU'] == $Id && ($_SESSION['IdP'] == -1) )
echo('  <li><a href="#inviter" data-toggle="tab"> <i class="icon-mail"></i> Inviter un joueur</a></li>
     <li><a href="#modifier" data-toggle="tab"><i class="icon-pencil"></i> Modifier le profil</a></li> '); } ?>
     <li><a href="#historique" data-toggle="tab"> <i class="icon-cog"></i> Historique des parties</a></li>
   </ul>
   
   <div class="tab-content">
   <br><br>
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
 
 <!-- Debut du tab MESSAGES-->  
   <div class="tab-pane" id="inviter">  
<div class="row-fluid">
    <div class="span12">
    <div class="row-fluid">
    <form name="contact_form" method="post" action="../control/Inviter_Joueur.php">
    <fieldset>
    <div class="span8 offset1">
    <legend><h2>Invitation des joueurs</h2></legend>
	<br>
    </div>
    <div class="span10">
    <input class="form-inline" type="email" required name="email" id="inputEmail" placeholder="E-mail du joueur…"><br>
    <textarea class="form-inline" name="message" cols='10000' rows='4' style="resize: none; width:95%;" required>Tu es invité pour jouer un match amical dans mon équipe,envoie un Email de confirmation...</textarea>
    <br>
     <button style="float:right;" type="submit">Envoyer <i class="icon-email"></i></button>
	<div style="clear:both;"> </div>
    </div>
    </fieldset>
    </form>
    </div>
    </div>
    </div>
     </div>
<!-- Fin du tab MESSAGES-->

<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->     
     <!-- Debut du tab Profil-->   
     <div class="tab-pane active" id="profil">
     <div class="row-fluid">
    <div class="span12">
    <div class="row-fluid">
    <fieldset>
    <div class="span8 offset1">	
    <legend><h2>Informations Personnelles</h2></legend>
	<br>
           <table>
             <tr>
				<td><div><h4><i class=""></i>Travaille chez <a src="https://google.com"/><?php echo(" "); echo $E->getNom_Entreprise(); ?></h4></div></td>
			  </tr>
			 
             <tr>
				<td><div><h4><i class="icon-calendar-alt-fill"></i> Né le <?php echo(" "); echo $E->getDate_De_Naissance(); ?></h4></div></td>
			  </tr>
             
              <tr>
				<td><div><h4><i class="icon-map"></i> Habite à <a src="https://google.com"/><?php echo $E->getResidence();echo(","); echo $E->getRegion(); ?></h4></div></td>
			  </tr>
			  
			  <tr>
				<td><div><h4><i class="icon-phone-2"></i> Telephone <?php echo(" "); echo $E->getTelephone(); ?></h4></div></td>
			  </tr>
			    
			  <tr>
				<td><div><h4><i class="icon-info"></i> À propos <?php echo $E->getInfo(); ?></h4></div></td>
			  </tr>

              </table>
              <br> <br>     
              </div>
    </fieldset>
    </div>
    </div>
    </div>
     </div>
     <!-- Fin du tab Profil-->
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->    
             
<div class="cleaner"></div>


 <!-- Debut du tab Modifier--> 

<div class="tab-pane"  id="modifier">
<div class="row-fluid">    
    <div class="span5 offset1">
	    
     <fieldset>
     <legend><h2>Modifier le profil</h2></legend>
     <form method="get" action="../Control/Modifier_Utilisateur.php" >

<table id="table_inscri" style="margin-left:auto; margin-right: auto; width:auto;"  border="0">
			  
			  
              <tr>
				<td><label>Nom</label></td>
                <input hidden="hidden" name="Id" id="Id" value="<?php echo $Id?>"/>
				  <td><input type="text" name="Nom_util" id="Nom_util" value="<?php echo $E->getNom(); ?>" /></td>
			  </tr>
			  
			  <tr>
				<td><label>Prenom</label></td>
				<td><input type="text" name="Prenom_util" id="Prenom_util" value="<?php echo $E->getPrenom(); ?>" /></td>
			  </tr>
			  
			  <tr>
				<td><label>Nom d'entreprise</label></td>
				<td><input type="text" name="Nom_entreprise" id="Nom_entreprise" value="<?php echo $E->getNom_Entreprise();; ?>" /></td>
			  </tr>
              
              <tr>
				<td><label>E-Mail</label></td>
				<td><input type="email" name="Email_util" id="Email_util"  value="<?php echo $E->getEmail(); ?>"/></td>
			  </tr>
			  
			  <tr>
				<td><label>Nouv. Mot de Passe</label></td>
				<td><input type="password" name="Motdepasse_util" id="Motdepasse_util" value="<?php echo $E->getPWD();?>"/></td>
			  </tr>
			
            <tr>
				<td><label>Date de naissance</label></td>
				<td><input style="height:100%; padding:5%;" type="date" name="Date_naissance" id="Date_naissance"  value="<?php echo $E->getDate_De_Naissance(); ?>"/> </td>
			  </tr>
            
			  <tr>
				<td><label>Résidence</label></td>
				<td>
                <input name="Residence_util" id="Residence_util" type="text"  value="<?php echo $E->getResidence(); ?>" />
                </td>
			  </tr>
              
              <tr>
				<td><label>Regions</label></td>
				<td>
                <select name="Region" id="Region">
				  <optgroup label="Grand Tunis">
				   <option <?php  if ($E->getRegion()=="Tunis") echo 'selected="selected"';?>value="Tunis">Tunis</option>
				   <option <?php  if ($E->getRegion()=="Ariana") echo 'selected="selected"'; ?>value="Ariana">Ariana</option>
				   <option <?php  if ($E->getRegion()=="Manouba") echo 'selected="selected"' ?> value="Manouba">Manouba</option>
				   <option <?php  if ($E->getRegion()=="Ben Arous") echo 'selected="selected"' ?> value="Ben Arous">Ben Arous</option>
				  </optgroup>
                  <optgroup label="Autres Gouvernorats">
                  <option <?php  if ($E->getRegion()=="Bizerte") echo 'selected="selected"';?>value="Bizerte">Bizerte</option>
				   <option <?php  if ($E->getRegion()=="Zaghouan") echo 'selected="selected"'; ?>value="Zaghouan">Zaghouan</option>
				   <option <?php  if ($E->getRegion()=="Beja") echo 'selected="selected"' ?> value="Beja">Beja</option>
				   <option <?php  if ($E->getRegion()=="Jandouba") echo 'selected="selected"' ?> value="Jandouba">Jandouba</option>
                   
                   <option <?php  if ($E->getRegion()=="Kef") echo 'selected="selected"';?>value="Kef">Kef</option>
				   <option <?php  if ($E->getRegion()=="Siliana") echo 'selected="selected"'; ?>value="Siliana">Siliana</option>
				   <option <?php  if ($E->getRegion()=="Nabeul") echo 'selected="selected"' ?> value="Nabeul">Nabeul</option>
				   <option <?php  if ($E->getRegion()=="Sousse") echo 'selected="selected"' ?> value="Sousse">Sousse</option>
                   
                   <option <?php  if ($E->getRegion()=="Kairouan") echo 'selected="selected"';?>value="Kairouan">Kairouan</option>
				   <option <?php  if ($E->getRegion()=="Monastir") echo 'selected="selected"'; ?>value="Monastir">Monastir</option>
				   <option <?php  if ($E->getRegion()=="Sfax") echo 'selected="selected"' ?> value="Sfax">Sfax</option>
				   <option <?php  if ($E->getRegion()=="Mahdia") echo 'selected="selected"' ?> value="Mahdia">Mahdia</option>
                   
                   <option <?php  if ($E->getRegion()=="Kasrine") echo 'selected="selected"';?>value="Kasrine">Kasrine</option>
				   <option <?php  if ($E->getRegion()=="Sidi Bouzid") echo 'selected="selected"'; ?>value="Sidi Bouzid">Sidi Bouzid</option>
				   <option <?php  if ($E->getRegion()=="Gafsa") echo 'selected="selected"' ?> value="Gafsa">Gafsa</option>
				   <option <?php  if ($E->getRegion()=="Tozeur") echo 'selected="selected"' ?> value="Tozeur">Tozeur</option>
                   
                   <option <?php  if ($E->getRegion()=="Kebili") echo 'selected="selected"';?>value="Kebili">Kebili</option>
				   <option <?php  if ($E->getRegion()=="Gabes") echo 'selected="selected"'; ?>value="Gabes">Gabes</option>
				   <option <?php  if ($E->getRegion()=="Medinine") echo 'selected="selected"' ?> value="Medinine">Medinine</option>
				   <option <?php  if ($E->getRegion()=="Tataouine") echo 'selected="selected"' ?> value="Tataouine">Tataouine</option>
				</optgroup>
                </select>
                </td>
			  </tr>
			  
			  <tr>
				<td><label>Telephone</label></td>
				<td><input name="Telephone_util" id="Telephone_util" style="height:100%;" type="tel"  value="<?php echo $E->getTelephone(); ?> "/></td>
			  </tr>
			    
			  <tr>
				<td><label>Information</label></td>
                <td>
                <textarea size="50" name="Info" id="Info"><?php echo $E->getInfo(); ?></textarea>	
                </td>
			  </tr>
	  
			  </table>
            <br><br> 		  
			  <input  class="submit_form" name="submit" value="Valider" type="submit" style="float:left;" />
			  <input  class="submit_form" name="reset" value="Annuler" type="reset" style="float:right;" />
            
		</form>
</fieldset>
     
     </div>
     <wbr>
     
     <div class="span3"><center>
<h2>Photo de Profil</h2>
     <br>
<span>
    	 <span class="visible-desktop"> 
         <embed style="width:100%; padding-bottom:0px; margin-bottom:0px;" src="images/cloud.svg" type="image/svg+xml"  />
         </span>
              <span class="hidden-desktop"> 
              <img src="images/cloud.png" width="70px" />
	  		  </span>
</span>

     <form action="../control/upload_img.php?IdJ=<?php echo $_SESSION['IdU'] ?>" onMouseUp="update()" class="dropzone"> 
</form>
</span>
</center>
     </div>
     </div>   
     </div>
<!-- FIN du tab Modifier-->               
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--> 

           
 <!-- Debut du tab Historique des parties-->  
 <div class="tab-pane" id="historique">                      
		<div class="row-fluid">
      
      <div class="span8 offset1">     
     <legend><h2>Historique des parties</h2></legend>

     </div>
     <?php
	  $R=new Reservation("","","",false);
		$RM=new ReservationModel();
		$listeH= $RM->HistoriqueJoueur($Id);
	 ?>
     <div class="row-fluid">
     <div class="span12">
       <?php 
	   $longeur = count($listeH);
if($longeur !=0)
{ ?>
       <table id="paginated-table" class="table table-hover" width="95%" border="0" cellspacing="5"  style="margin-left:auto; margin-right:auto;">
		<thead>
		<tr>
		<th scope="col"><center><i class="icon-calendar"></i>  Date</center></th>
		<th scope="col"><center><i class="icon-clock"></i> Heure</center></th>
		<th scope="col"><center> Confirmation</center></th>
		<th scope="col"><center>Terrain</center></th>
		<?php if (isset($_SESSION['IdU']))
		{
		if ($_SESSION['IdU'] == $Id)
		{ ?>
		<th scope="col"><center>Supprimer</center></th>
		<?php } }?>
		</tr>
		</thead>

		<tbody>
      <?php  $i = 0;
$j = count($listeH);

		foreach ($listeH as $Voi):
		$i++;?> 
		     		<input id="rownbr" value="<?php echo $j;?>" hidden="true" class="hidden" />

		<tr>
		<input id="datesrc<?php echo($i);?>" value="<?php echo $Voi->GetDate_reserv();?>"  hidden="true" style="height:0px;" />
        
		<td scope="col"><center> <span class="hint--top" style="z-index:100;" data-hint="<?php echo $Voi->GetDate_reserv();?>"><span id="date<?php echo $i;?>"> </span></span> </center></td>
        
		<td scope="col"><center> <?php  echo (sprintf ("%02u",$Voi->GetHeur_reserv()).':00');?> </center></td>
		
        <?php 
		$t = new Terrain("",0,0,0,0,0,0,0,0);
		$tM=new TerrainModel();
		$t = $tM->RetournerTerrain($Voi->GetId_ter_resv_Fk());
		?>
        
        <td scope="col"><center> <?php if($Voi->GetConfirmer_reserv()==1)
		{
echo('<a href="Info_Reservation.php?IdU='.$Id.'&IdP='.$tM->RetournerIdProprio($Voi->GetId_ter_resv_Fk()).'&IdR='.$RM->ChercherId($Voi).'&IdT='.$tM->ChercherId($t).'"><span class="hint--top" data-hint="Cliquer pour plus de détails"> <i style="font-size:18px; color:green;" class="icon-check-alt"></i></span></a>');	}
		else
		 {
echo('<a href="Payement.php?IdR='.$RM->ChercherId($Voi).'&IdT='.$tM->ChercherId($t).'"> <span class="hint--top" data-hint="Cliquer pour payer"> <i style="font-size:18px; color:orange;" class="icon-time"></i></span></a>');
		 }?>  </center>
 
		</td>
 
		
		<td scope="col"><center><?php echo('<a class="clearfix quick-links " href="Proprietaire.php?Id='.$tM->RetournerIdProprio($Voi->GetId_ter_resv_Fk()).'" >'); ?> <?php
 echo ($t->GetNom_ter().'</a>'); ?>  </center> </td>
		<?php 
		if (isset($_SESSION['IdU']))
		{
		if($_SESSION['IdU'] == $Id)
		{ 
		
		?>
		<td scope="col" ><center><?php  echo("
 
		<a href="."../Control/Supprime_Reservation.php?IdR=".$Voi->GetId()." ". "><i class="."icon-remove"."></i></a>"); ?>  </center></td>
  
		<?php } }?>
		</tr>
  
		<?php
		endforeach;			
		?> 
		</tbody>
		</table><span class="span4"></span>
 <span   class="prev span2">Précedent</span> &nbsp; <span class="next span2">Suivant</span> 
 <?php }  
 else
 {
	 echo('<p class="lead text-info">L\'utilisateur n\'a pas encore réservé de parties.</p>');
 }
 
 ?>
		<script>
		moment.lang
		('fr', {
		months : "janvier_février_mars_avril_mai_juin_juillet_août_septembre_octobre_novembre_décembre".split("_"),
		monthsShort : "janv._févr._mars_avr._mai_juin_juil._août_sept._oct._nov._déc.".split("_"),
		weekdays : "dimanche_lundi_mardi_mercredi_jeudi_vendredi_samedi".split("_"),
		weekdaysShort : "dim._lun._mar._mer._jeu._ven._sam.".split("_"),
		weekdaysMin : "Di_Lu_Ma_Me_Je_Ve_Sa".split("_"),
		longDateFormat : 
		{
        LT : "HH:mm",
        L : "DD/MM/YYYY",
        LL : "D MMMM YYYY",
        LLL : "D MMMM YYYY LT",
        LLLL : "dddd D MMMM YYYY LT"
		},
		calendar : 
		{
        sameDay: "[Aujourd'hui à] LT",
        nextDay: '[Demain à] LT',
        nextWeek: 'dddd [à] LT',
        lastDay: '[Hier à] LT',
        lastWeek: 'dddd [dernier à] LT',
        sameElse: 'L'
		},
		relativeTime : 
		{
        future : "Dans %s",
        past : "Il y a %s",
        s : "quelques secondes",
        m : "une minute",
        mm : "%d minutes",
        h : "une heure",
        hh : "%d heures",
        d : "un jour",
        dd : "%d jours",
        M : "un mois",
        MM : "%d mois",
        y : "une année",
        yy : "%d années"
		},
		ordinal : function (number) 
		{
        return number + (number === 1 ? 'er' : 'ème');
		},
		week : 
		{
        dow : 1, // Monday is the first day of the week.
        doy : 4  // The week that contains Jan 4th is the first week of the year.
		}
		});


		var i = document.getElementById("rownbr").value;
		var j=0;
		while(j<=i)
		{
		j++;
		var datestring = document.getElementById("datesrc"+j).value;
		document.getElementById("date"+j).innerHTML = moment(datestring, "YYYY-MM-DD").fromNow();
		}
		</script>
		</div>
		</div>
		</div>
		</div>
		 <!-- Fin du tab Historique des parties-->           

    
 
<!--ICI VA LE CONTENU  -->
<?php 


if (isset($_GET['P']) and $_GET['P']==1) {
	?>    
<input type="checkbox" id="afficher_dialog" checked hidden="true"  />
<?php
	
										} 
	else {

	}
 ?>
<br><br>
<br><br>
<br><br>
<br><br>
			</div>  <!-- FIN SPAN 8--> 
            </div> <!-- FIN FLUID ROW-->
            
            
             <?php }
			 else
			 {
				 $_SESSION['404Message']="Le profil du joueur cherché n'existe pas.";
				echo('
				<script type="text/javascript">
setTimeout(function(){window.location = "../Vue/404.php";}, 0 ); 
</script>');
				
			 }
			 ?>
            <div class="span2 visible-desktop"></div>
	     </div> <!-- FIN FLUID ROW--> 
    </div>  <!-- FIN SPAN 12--> 
</div><!-- FIN FLUID ROW--> 

<div id="dialog" title="Payement validé">
<br>
			<h4><p>Votre payement a était proprement validé, Vous pouvez consulter l'ensemble de vos réservations dans votre profil.</p></h4>
		</div>


<!-- FIN DU BODY--> 
<div style="position:relative; bottom:0; margin-bottom:-50%;">
<?php include('footer.php'); ?>
</div>
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

		
		
				<style type="text/css">
.prev, .next 
{
color: #666;
	font-size:14px;
	line-height:24px;
	font-weight: normal;
	text-align: center;
	border: 1px solid #BBB;
	min-width: 14px;
	padding:8px 25px;
	margin: 0 5px 0 0;
	border-radius: 3px;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	background: #efefef; /* Old browsers */
	background: -moz-linear-gradient(top, #ffffff 0%, #efefef 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#efefef)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #ffffff 0%,#efefef 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #ffffff 0%,#efefef 100%); /* Opera11.10+ */
	background: -ms-linear-gradient(top, #ffffff 0%,#efefef 100%); /* IE10+ */
	background: linear-gradient(top, #ffffff 0%,#efefef 100%); /* W3C */
}

.prev, .next {
    cursor: pointer;
}

.prev.disabled, .next.disabled 
{
	color: #CCC;
	font-size:14px;
	line-height:24px;
	font-weight: normal;
	text-align: center;
	border: 1px solid #222;
	min-width: 14px;
	padding:8px 25px;
	margin: 0 5px 0 0;
	border-radius: 3px;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	background: #555; /* Old browsers */
	background: -moz-linear-gradient(top, #555 0%, #333 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#555), color-stop(100%,#333)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #555 0%,#333 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #555 0%,#333 100%); /* Opera11.10+ */
	background: -ms-linear-gradient(top, #555 0%,#333 100%); /* IE10+ */
	background: linear-gradient(top, #555 0%,#333 100%); /* W3C */
}

		</style>

		
		
		
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js" type="text/javascript"></script>

        <script type="text/javascript">
/*  fonction qui active les tabs dans les liens */
			$(document).ready(function(){
				$('a[href="' + window.location.hash + '"]').click()
			});	
				
					///////////////////////////////////////////
						
		$(function () {

		        // Dialog			
		        

		        // Dialog			
		        $('#dialog').dialog({
		            autoOpen: false,
		            width: 600,modal:true,
		           					
		        });

if($('#afficher_dialog').length>0)
{
	 $('#dialog').dialog('open');
}
});
		</script>
		
		
		<script  type="text/javascript" >
		
		var maxRows = 10;
$('#paginated-table').each(function() {
    var cTable = $(this);
    var cRows = cTable.find('tr:gt(0)');
    var cRowCount = cRows.size();

    if (cRowCount < maxRows) {
        return;
    }

    /* add numbers to the rows for visuals on the demo */
   

    /* hide all rows above the max initially */
    cRows.filter(':gt(' + (maxRows - 1) + ')').hide();

    var cPrev = cTable.siblings('.prev');
    var cNext = cTable.siblings('.next');

    /* start with previous disabled */
    cPrev.addClass('disabled');

    cPrev.click(function() {
        var cFirstVisible = cRows.index(cRows.filter(':visible'));

        if (cPrev.hasClass('disabled')) {
            return false;
        }

        cRows.hide();
        if (cFirstVisible - maxRows - 1 > 0) {
            cRows.filter(':lt(' + cFirstVisible + '):gt(' + (cFirstVisible - maxRows - 1) + ')').show();
        } else {
            cRows.filter(':lt(' + cFirstVisible + ')').show();
        }

        if (cFirstVisible - maxRows <= 0) {
            cPrev.addClass('disabled');
        }

        cNext.removeClass('disabled');

        return false;
    });

    cNext.click(function() {
        var cFirstVisible = cRows.index(cRows.filter(':visible'));

        if (cNext.hasClass('disabled')) {
            return false;
        }

        cRows.hide();
        cRows.filter(':lt(' + (cFirstVisible +2 * maxRows) + '):gt(' + (cFirstVisible + maxRows - 1) + ')').show();

        if (cFirstVisible + 2 * maxRows >= cRows.size()) {
            cNext.addClass('disabled');
        }

        cPrev.removeClass('disabled');

        return false;
    });

});
		</script>
       
</body>
</html>
