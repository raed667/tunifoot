<?php

require_once("..\Model\ProprietaireModel.php");
require_once("..\Model\TerrainModel.php");


//error_reporting(E_ALL ^ E_NOTICE);
$Id = htmlspecialchars($_GET["Id"]);
$PM=new ProprietaireModel();
$P=$PM->RetournerProp($Id);

?>
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="fr"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="fr"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
<?php include('head_no_title.php'); ?>
<title><?php echo $P->getNom_du_Complexe(); ?></title>
<script src="scripts/dropzone.min.js"></script>

<script src="scripts/moment.js"></script>

<script language="javascript">

</script>



</head>
<body data-accent="blue">
<?php include('nav_bar.php'); ?>
<br>
<br>
<!--  s9ala té3 il site : lkol fi lkol 12  offset 1 + body 8 + span1-->

<div class="row-fluid">
   <div class="span12">
      <div class="row-fluid">
         <div class="span2 visible-desktop"></div>
          <?php if($PM->ExisteProprietaire($Id) ==true)
		 { ?>
           <div class="span8">
<!--     DEBUT DU BODY     --> 
<?php
if(isset($_SESSION['newLogin']))
{
if($_SESSION['newLogin']==(1) &&  $_SESSION['IdP'] == $Id)
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
<div class="span3">
<?php if (file_exists('../control/uploads/imgProprietaire'.$Id.".jpg")) {
?>
    <img src="<?php echo('../control/uploads/imgProprietaire'.$Id.".jpg"); ?>" class="img-polaroid" style="height:128px; width:128px;">
   <?php }
else {
?>
<img id="PPimg" src="images/reason3.png" class="img-polaroid" style="height:128px; width:128px;">
<?php } ?>
    <br><br>
    </div>
<h1><?php echo("Complexe "); echo $P->getNom_du_Complexe(); ?></h1>
<br><br><br><br>


<!--ICI VA LE CONTENU  --> 
                      
<ul class="nav nav-tabs">
     <li class="active"><a href="#profil" data-toggle="tab"><i class="icon-user"></i> Profil</a></li>
      <?php  if(isset($_SESSION['IdP']))
			{if($_SESSION['IdP'] == $Id && ($_SESSION['IdU'] == -1) )
echo('
     <li><a href="#modifier" data-toggle="tab"><i class="icon-pencil"></i> Modifier le profil</a></li>');} ?>
     <li><a href="#terrains" data-toggle="tab"> <i class="icon-cog"></i> Options des terrains</a></li>
   </ul>
   
   <div class="tab-content">
     <div class="tab-pane active" id="profil">
     <!-- Debut du tab Profil-->     
     <div class="row-fluid">
    <div class="span12">
    
    <div class="row-fluid">
    <fieldset>
    
    <div class="span8 offset1">
	
    <legend><h2>Informations Personnelles</h2></legend>
	

        <table>
			  <tr>
				<td><div><h4>Complexe comporte <?php echo $P->getNombre_de_terrains() ?> terrains</h4></div></td>
			  </tr>
	
      	      <tr>
				<td><div><h4>Géré par <?php echo $P->getPrenom();echo(" "); echo $P->getNom(); ?></h4></div></td>
			  </tr>
            
              <tr>
				<td><div><h4><i class="icon-phone-2"></i>Telephone <?php echo(" "); echo $P->getTelephone(); ?></h4></div> </td>
			  </tr>
            
  	          <tr>
				<td><div><h4><i class="icon-map"></i> Habite à <a target="_blank" href="https://maps.google.tn/maps?hl=fr&q=<?php echo $P->getResidence();echo $P->getRegion(); ?>+Tunisie&bav=on.2,or.r_qf.&biw=1366&bih=667&um=1&ie=UTF-8&sa=N&tab=wl&authuser=0"><?php echo $P->getResidence(); echo(",") ;echo $P->getRegion(); ?></a></h4></div></td>
			  </tr>  
			
			  <tr>
				<td><div><h4><i class="icon-info"></i> À propos<?php echo(" ");echo $P->getInformation(); ?></h4></div></td>
			  </tr>
              
              </table><br>
    
    </div>
    </fieldset>
    </div>
    
    </div>
    </div>
     <!-- Fin du tab Profil-->
     </div>                
			<div class="cleaner"></div>
            
            <div class="tab-pane" id="modifier">
          <!-- Debut du tab Modifier-->     
<div class="row-fluid">    
    <div class="span8 offset1">
	    
    <fieldset>
     <legend><h2>Modifier le profil</h2></legend>
     
     <form method="get" action="../Control/Modifier_Proprietaire.php" >
     
     <table id="table_inscri" style="margin-left:auto; margin-right: auto;" width="500" border="0">
			  
              <div style="clear:both;"></div>
			  
              <tr>
              <input hidden="hidden" name="Id" id="Id" value="<?php echo $Id?>"/>
				<td><label>Nom</label></td>
				<td><input type="text" name="Nom_prop" id="Nom_prop" value="<?php echo $P->getNom(); ?>" /></td>
			  </tr>
			  
			  <tr>
				<td><label>Prenom</label></td>
				<td><input type="text" name="Prenom_prop" id="Prenom_prop" value="<?php echo $P->getPrenom(); ?>" /></td>
			  </tr>
			  
			  <tr>
				<td><label>E-Mail</label></td>
				<td><input type="email" name="Email_prop" id="Email_prop"  value="<?php echo $P->getEmail(); ?>"/></td>
			  </tr>
			  
			  <tr>
				<td><label>Nouv. Mot de Passe</label></td>
				<td><input type="password" name="Motdepasse_prop" id="Motdepasse_prop"/></td>
			  </tr>
              
              <tr>
				<td><label>Résidence</label></td>
				<td><input type="text" name="Residence_prop" id="Residence_prop" value="<?php echo $P->getResidence(); ?>"/></td>
			  </tr>
			
			  <tr>
				<td><label>Region</label></td>
				<td>
                <select name="Region_prop" id="Region_prop">
				  <optgroup label="Grand Tunis">
				   <option <?php  if ($P->getRegion()=="Tunis") echo 'selected="selected"';?>value="Tunis">Tunis</option>
				   <option <?php  if ($P->getRegion()=="Ariana") echo 'selected="selected"'; ?>value="Ariana">Ariana</option>
				   <option <?php  if ($P->getRegion()=="Manouba") echo 'selected="selected"' ?> value="Manouba">Manouba</option>
				   <option <?php  if ($P->getRegion()=="Ben Arous") echo 'selected="selected"' ?> value="Ben Arous">Ben Arous</option>
				  </optgroup>
                  
                  <optgroup label="Autres Gouvernorats">
                  <option <?php  if ($P->getRegion()=="Bizerte") echo 'selected="selected"';?>value="Bizerte">Bizerte</option>
				   <option <?php  if ($P->getRegion()=="Zaghouan") echo 'selected="selected"'; ?>value="Zaghouan">Zaghouan</option>
				   <option <?php  if ($P->getRegion()=="Beja") echo 'selected="selected"' ?> value="Beja">Beja</option>
				   <option <?php  if ($P->getRegion()=="Jandouba") echo 'selected="selected"' ?> value="Jandouba">Jandouba</option>
                   
                   <option <?php  if ($P->getRegion()=="Kef") echo 'selected="selected"';?>value="Kef">Kef</option>
				   <option <?php  if ($P->getRegion()=="Siliana") echo 'selected="selected"'; ?>value="Siliana">Siliana</option>
				   <option <?php  if ($P->getRegion()=="Nabeul") echo 'selected="selected"' ?> value="Nabeul">Nabeul</option>
				   <option <?php  if ($P->getRegion()=="Sousse") echo 'selected="selected"' ?> value="Sousse">Sousse</option>
                   
                   <option <?php  if ($P->getRegion()=="Kairouan") echo 'selected="selected"';?>value="Kairouan">Kairouan</option>
				   <option <?php  if ($P->getRegion()=="Monastir") echo 'selected="selected"'; ?>value="Monastir">Monastir</option>
				   <option <?php  if ($P->getRegion()=="Sfax") echo 'selected="selected"' ?> value="Sfax">Sfax</option>
				   <option <?php  if ($P->getRegion()=="Mahdia") echo 'selected="selected"' ?> value="Mahdia">Mahdia</option>
                   
                   <option <?php  if ($P->getRegion()=="Kasrine") echo 'selected="selected"';?>value="Kasrine">Kasrine</option>
				   <option <?php  if ($P->getRegion()=="Sidi Bouzid") echo 'selected="selected"'; ?>value="Sidi Bouzid">Sidi Bouzid</option>
				   <option <?php  if ($P->getRegion()=="Gafsa") echo 'selected="selected"' ?> value="Gafsa">Gafsa</option>
				   <option <?php  if ($P->getRegion()=="Tozeur") echo 'selected="selected"' ?> value="Tozeur">Tozeur</option>
                   
                   <option <?php  if ($P->getRegion()=="Kebili") echo 'selected="selected"';?>value="Kebili">Kebili</option>
				   <option <?php  if ($P->getRegion()=="Gabes") echo 'selected="selected"'; ?>value="Gabes">Gabes</option>
				   <option <?php  if ($P->getRegion()=="Medinine") echo 'selected="selected"' ?> value="Medinine">Medinine</option>
				   <option <?php  if ($P->getRegion()=="Tataouine") echo 'selected="selected"' ?> value="Tataouine">Tataouine</option>
				</optgroup>
                </select>
                </td>
			
			  </tr>
			  
			  <tr>
				<td><label>Telephone</label></td>
				<td><input name="Telephone_prop" id="Telephone_prop" type="tel"  value="<?php echo $P->getTelephone(); ?> "/></td>
			  </tr>
			    
			  <tr>
				<td><label>Information</label></td>
                <td>
                <textarea size="50" name="Info_prop" id="Info_prop"><?php echo $P->getInformation(); ?></textarea>	
                </td>
			  </tr>

			  <tr>
				<td><label>Nom du complexe</label></td>
				<td><input name="Nom_complexe_prop" id="Nom_complexe_prop" type="text" value="<?php echo $P->getNom_du_Complexe(); ?> "/></td>
			  </tr>
              
            </table> 		  
			  <br><br>
				<input name="submit" value="Valider" type="submit" style="float:left;" />
				<input  class="btn" name="reset" value="Annuler" type="reset" style="float:right;" />
			
		</form>
	</fieldset>
     </div>
     
     <wbr>
     <div class="span3" >
     <center>
<h2>Photo de Profil</h2>
     <br>
<span>
     <span class="visible-desktop"> 
         <embed style="width:100%; padding-bottom:0px; margin-bottom:0px;" src="images/cloud.svg" type="image/svg+xml"  /></span>
              <span class="hidden-desktop"> 
              <img src="images/cloud.png" width="70px" />
         </span></span>

     <form action="../control/upload_img.php?IdP=<?php echo $_SESSION['IdP'] ?>" class="dropzone"> </form>
</span>
</center>
     </div>
     
     </div>
		 <!-- Fin du tab Modifier--> 
         <br>
<a href="javascript:history.back()"><i class="icon-arrow-left"></i>Retour</a>    
     </div>             
             
<div class="cleaner"></div>

<div class="tab-pane" id="terrains">
                <!-- Debut du tab Options des Terrains-->     
<div class="row-fluid">    
    <div class="span8 offset1">
	
     <legend><h2>Options des terrains</h2></legend>
     </div>
     <div class="row-fluid">
     <div class="span12">
     
     <?php  if( isset($_SESSION['IdP']) and $_SESSION['IdP'] == $Id)
	   { ?>
       <br>
<a class="btn btn-success" href="Formul_Terrain.php?Id=<?php echo $Id?>">Ajouter un terrain <i class="icon-add"></i></a>
<div class="cleaner"></div>
<br><br>
<?php } ?>
<!--end of btn-->
<?php 

$tM=new TerrainModel();
  $liste=$tM->AfficherTerrainSelonProprietaire($Id); 
  $longeur = count($liste);
if($longeur !=0)
{
?>
			
            <table id="paginated-table" class="table table-hover" width="95%" border="0" cellspacing="5"  style="margin-left:auto; margin-right:auto;">
 <thead>
  <tr>
    <th height="35" scope="col"><center>Nom Terrains</center></th>
    <th><center> Joueurs max </center></th>
    <th><center> Tarif </center></th>
    <?php if( isset($_SESSION['IdP']) and $_SESSION['IdP'] == $Id) { ?>
    <th><center> J'aime <i class="icon-thumbs-up"></i></center></th>
    <th><center> J'aime pas <i class="icon-thumbs-down"></i></center></th>
    <th><center> Modifier </center></th>
    <th><center> Supprimer </center></th>
         <?php } 
		 else if( isset($_SESSION['IdU']) and $_SESSION['IdU']!=-1)
		 {?>
 <th><center> Vote </center></th>

         
		 <?php }
		  ?>

    <th><center> Visualiser </center></th>
    
  </tr>
  </thead>
  
  <?php
  
  foreach ($liste as $Voi):
  echo "<tbody>";
  echo "<tr>";
  echo "<td><center>".$Voi->GetNom_ter()."</center></td>";
  echo "<td><center>".$Voi->GetTarif_ter()."</center></td>";
  echo "<td><center>".$Voi->GetNbr_maxjoueur_ter()."</center></td>";
       
	   if( isset($_SESSION['IdP']) and $_SESSION['IdP'] == $Id)
	   { 

  echo "<td><center>".$Voi->GetLike_ter()."</center></td>";
  echo "<td><center>".$Voi->GetDislike_ter()."</center></td>";
  echo ("<td><a href="."Modifier_Formul_Terrain.php?Id=".$Voi->GetId()."&IdP=".$_SESSION['IdP']." ". "><i style="."margin-left:23px;"." class="."icon-pencil"."></i></a></td>");
   echo ("<td><a href="."../Control/Supprimer_terrain.php?IdT=".$Voi->GetId()." ". "><i style="."margin-left:25px;"." class="."icon-remove"."></i></a></td>");
  
  
	   }
	   
	   else if( isset($_SESSION['IdU']) and $_SESSION['IdU']!=-1)
		 {?>
 <td><center> 
 <button id="up<?php echo($Voi->GetId()); ?>" class="jaime" style="width:-10px; margin-bottom:-10px; margin-top:-10px; padding:0,0,0,0; background-color:#F5F5F5; color:#999; "><i class="icon-thumbs-up"></i> J'aime</button> 

 <a id="dw<?php echo($Voi->GetId()); ?>" href="#" class="jaimepas" style="background-image:url(content/img/png/glyphicons_344_thumbs_down.png); background-size:cover; margin-bottom:-10px; margin-top:-10px;"> &#160; &#160; &#160; &#160; </a>
  </center>
<center>
 <div id="pb<?php echo($Voi->GetId()); ?>" class="progress" hidden="true" style="margin:0px;">
   </div>
 </center>
 
 
 </td>

         
		 <?php }	   
  echo ('<td><a href="Gallery.php?IdT='.$Voi->GetId().'&IdP='.$Id.'"><center><i  class="icon-picture"></i></center></a></td>');
  echo "</tr>";
  echo "</tbody>";
  endforeach;	
  		
  ?>
</table>

 <span  style="margin-left:35%;" class="prev">Précedent</span> &nbsp; <span class="next">Suivant</span> 
<br>
 

<?php }
 else
 {
	 echo('<br><p class="lead text-info">L\'utilisateur n\'a pas encore ajouté de terrains.</p> <br>');
 }
 
 ?>
     </div>
     </div>
		 <!-- Fin du tab Options des Terrains-->       
     </div>
 </div>
<!--ICI VA LE CONTENU  -->
<br><br>
<br>
<br>
<br>
<br>
	</div>  <!-- FIN SPAN 8-->
            </div> <!-- FIN FLUID ROW--> 
            
              <?php }
			 else
			 {
				 $_SESSION['404Message']="Le profil du complex sportif cherché n'existe pas.";
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

<!-- FIN DU BODY--> 

<?php include('footer.php'); ?>
<?php include('en_page_scripts.php'); ?> 


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


		
		<script  type="text/javascript" >
		
		var maxRows = 5;
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

		
		

<script type="text/javascript" language="javascript">
function progbar(type,id)
{
	
	if(window.XMLHttpRequest)
	{
		xhr = new XMLHttpRequest();
	}
	
	xhr.onreadystatechange = function()
	{
		if((xhr.readyState == 4) && (xhr.status  == 200))
		
		{	
		document.getElementById('pb'+id).innerHTML =xhr.responseText;
		
		
		}};
xhr.open('GET','../control/setlikes_dislikes.php?type='+type+'&Id='+id,true);
xhr.send(null);
}

 $('.jaime').click(function () {
	 var idup = $(this).attr('id');
	 var id ="";
	// alert (idup.length);
	 for (var i = 2; i<idup.length; i++)
	  {
		  id+=idup[i];
	  }
	 var progressid = 'pb'+id;
	  $(this).hide();
	  $('#dw'+id).hide();
	  progbar('jaime',id);
	$('#'+progressid).show();
	
		        });
				
				
 $('.jaimepas').click(function () {
	 var idup = $(this).attr('id');
	 var id ="";
	 for (var i = 2; i<idup.length; i++)
	  {
		  id+=idup[i];
	  }
	 var progressid = 'pb'+id;
	  $(this).hide();
	  $('#up'+id).hide();
	  progbar('jaimepas',id);
	$('#'+progressid).show();
	
		        });
</script>
        
</body>
</html>