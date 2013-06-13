<?php

//error_reporting(E_ALL ^ E_NOTICE);
require_once("..\Model\TerrainModel.php");
$Id = htmlspecialchars($_GET["Id"]);
$IdP = htmlspecialchars($_GET["IdP"]);
$t=new Terrain("",0,0,1,0,0,0,0,0);
$tM=new TerrainModel();
$t=$tM->RetournerTerrain($Id);

?>

<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<?php include('head_no_title.php'); ?>
<title>Modifier terrain</title>

</head>
<body data-accent="blue">
<?php include('nav_bar.php');?>

<script src="scripts/dropzone.js"></script>

<!--  s9ala té3 il site : lkol fi lkol 12  offset 1 + body 8 + span1-->

<div class="row-fluid">
   <div class="span12">
      <div class="row-fluid">
         <div class="span2 visible-desktop"></div>
           <div class="span8">
<!--     DEBUT DU BODY     --> 
<br><br><br><br>

</div>

<!--ICI VA LE CONTENU  --> 
<fieldset class="t1" style="width:80%; margin-right:auto; margin-left:auto;">
<legend class="t3" ><h1>Modifier Terrain</h1></legend>

<form  method="get" action="../Control/Modifier_Terrain.php">
<br />

<table id="table_inscri" style="margin-left:auto; margin-right: auto;" width="500" border="0">
  
  <tr>
  	<td><label>Nom du terrain</label></td>
     <input hidden="hidden" name="Id" id="Id" value="<?php echo $Id?>"/>
  	<td><input type="text" name="Nom_ter" id="Nom_ter" value="<?php echo $t->GetNom_ter(); ?>"/></td>
  </tr>
  
  <tr>
  	<td><label>Tarif du terrain</label></td>
  	<td><input type="text" name="Tarif_ter" id="Tarif_ter" value="<?php echo $t->GetTarif_ter(); ?>"/></td> 
  </tr>
  
  <tr>
	<td><label>Nombre max de joueur</label></td>
    <td><input name="Nbr_maxjoueur_ter" id="Nbr_maxjoueur_ter" type="text" value="<?php echo $t->GetNbr_maxjoueur_ter(); ?>"/></td>
  </tr>
  
  
  <tr>
	<td><label>Heure d'ouverture</label></td>
    <td><input name="Heure_ouverture" id="Heure_ouverture" type="time" value="<?php echo $t->GetHeure_ouverture(); ?>" /></td>
  </tr>
  
  <tr>
	<td><label>Heure de fermeture</label></td>
    <td><input name="Heure_fermeture" id="Heure_fermeture" type="time" value="<?php echo $t->GetHeure_fermeture(); ?>" /></td>
  </tr>
  </table>
   <br><br> 		
   
   <span class="row-fluid hidden-desktop">  
    <span class="span12">
 	 <span class="row-fluid">  
		<input  class="submit_form span1" name="submit" value="Valider" type="submit" />
        <span class="span8 visible-desktop">&nbsp;&nbsp; </span>
	    <input  class="submit_form span1" name="reset" value="Annuler" type="reset" /> 
     </span>
	</span>	
   </span>
        
        
        <span class="row-fluid visible-desktop">  
			  <input  class="submit_form span1" name="submit" value="Valider" type="submit" style="margin-left:22%;" /> 
			  <input  class="submit_form span1" name="reset" value="Annuler" type="reset" style="margin-left:30%;"/> 
        </span>
        
		</form>
        </fieldset>
        <br>
    	
<?php     
        if ((file_exists('../control/uploads/Terrains/imgTerrain'.$Id.'_1'.".jpg")==1 && file_exists('../control/uploads/Terrains/imgTerrain'.$Id.'_2'.".jpg")==1)&& (file_exists('../control/uploads/Terrains/imgTerrain'.$Id.'_3'.".jpg")==1 && file_exists('../control/uploads/Terrains/imgTerrain'.$Id.'_4'.".jpg")==1)&& file_exists('../control/uploads/Terrains/imgTerrain'.$Id.'_5'.".jpg")==1) 
{
echo('<br><span class="visible-desktop">
<div style="margin-left:20%; margin-bottom:0;" class="span12">
<p class="lead text-info">Vous avez atteint le nombre limite de photos, veuillez <a href="Gallery.php?IdT='.$Id.'&IdP='.$IdP.'"><i class=icon-remove style="margin-top:0.5%;"></i> supprimer</a> une 
</p>
</div>
		  </span>
		  <span class="hidden-desktop">
<div style="margin-left:10%; margin-bottom:0;" class="span12">
<p class="lead text-info">Vous avez atteint le nombre limite de photos,<wbr> veuillez <a href="Gallery.php?IdT='.$Id.'&IdP='.$IdP.'"><i class=icon-remove style="margin-top:1.7%;"></i> supprimer</a> une 
</p>
</div>
');
}
else
{
	echo('<div style="margin-bottom:0; margin-left:40%; margin-top:-5%;" class="span2">');
 if (file_exists('../control/uploads/imgTerrain'.$Id.'_1'.".jpg")) 
		{ 
		if (file_exists('../control/uploads/imgTerrain'.$Id.'_2'.".jpg")) 		
			{
			if (file_exists('../control/uploads/imgTerrain'.$Id.'_3'.".jpg")) 
				{
				if (file_exists('../control/uploads/imgTerrain'.$Id.'_4'.".jpg")) 
					{?>
                    
             		 <span class="visible-desktop"> 
         <embed style="width:100%; padding-bottom:0px; margin-bottom:0px;" src="images/cloud.svg" type="image/svg+xml"  />
              		</span>
              <span class="hidden-desktop"> 
              <img src="images/cloud.png" width="70px" />
	  		  </span>
     <form action="../control/upload_imgTerrain.php?IdT=<?php echo ($Id.'&Num=5'); ?>" onMouseUp="update()" class="dropzone align-center"> 
	</form>                        
              <?php } 
			        else
					{ ?>
                    
                    <span class="visible-desktop"> 
         <embed style="width:100%; padding-bottom:0px; margin-bottom:0px;" src="images/cloud.svg" type="image/svg+xml"  />
              		</span>
              <span class="hidden-desktop"> 
              <img src="images/cloud.png" width="70px" />
	  		  </span>
     <form action="../control/upload_imgTerrain.php?IdT=<?php echo ($Id.'&Num=4'); ?>" onMouseUp="update()" class="dropzone align-center"> 
     
	</form>          
              <?php } } 
			  		else
					{ ?>
                    
                    <span class="visible-desktop"> 
         <embed style="width:100%; padding-bottom:0px; margin-bottom:0px;" src="images/cloud.svg" type="image/svg+xml"  />
              		</span>
              <span class="hidden-desktop"> 
              <img src="images/cloud.png" width="70px" />
	  		  </span>
     <form action="../control/upload_imgTerrain.php?IdT=<?php echo ($Id.'&Num=3'); ?>" onMouseUp="update()" class="dropzone align-center"> 
	</form>          
              <?php } } 
			  		else
					{ ?>
                    
                    <span class="visible-desktop"> 
         <embed style="width:100%; padding-bottom:0px; margin-bottom:0px;" src="images/cloud.svg" type="image/svg+xml"  />
              		</span>
              <span class="hidden-desktop"> 
              <img src="images/cloud.png" width="70px" />
	  		  </span>
     <form action="../control/upload_imgTerrain.php?IdT=<?php echo ($Id.'&Num=2'); ?>" onMouseUp="update()" class="dropzone align-center"> 
	</form>          
              <?php } } 
			  		else
					{ ?>
                    
                    <span class="visible-desktop"> 
         <embed style="width:100%; padding-bottom:0px; margin-bottom:0px;" src="images/cloud.svg" type="image/svg+xml"  />
              		</span>
              <span class="hidden-desktop"> 
              <img src="images/cloud.png" width="70px" />
	  		  </span>
     <form action="../control/upload_imgTerrain.php?IdT=<?php echo ($Id.'&Num=1'); ?>" onMouseUp="update()" class="dropzone align-center"> 
	</form>          
              <?php } } ?>
           
<!--ICI VA LE CONTENU  --> 

			</div>  <!-- FIN SPAN 8--> 
            <div class="span2 visible-desktop"></div>
            
	     </div> <!-- FIN FLUID ROW--> 
    </div>  <!-- FIN SPAN 12-->
     
              <div class="row-fluid">
         		<div class="span3 visible-desktop"></div>
              		<a href="javascript:history.back()"><i class="icon-arrow-left"></i>Retour</a>
                </div>
			  </div>
              <br><br>
</div><!-- FIN FLUID ROW--> 

<!-- FIN DU BODY--> 


<div style="position:relative; bottom:0; margin-bottom:-50%;">
<?php include('footer.php'); ?>
</div>
<?php include('en_page_scripts.php'); ?> 
</body>
</html>