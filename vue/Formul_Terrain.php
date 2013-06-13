<?php
//error_reporting(E_ALL ^ E_NOTICE);
$Id =htmlspecialchars($_GET["Id"]);
?>

<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<?php include('head_no_title.php'); ?>
<title>Ajouter un terrain</title>

</head>
<body data-accent="blue">
<?php include('nav_bar.php'); ?>

<!--  s9ala té3 il site : lkol fi lkol 12  offset 1 + body 8 + span1-->

<div class="row-fluid">
   <div class="span12">
      <div class="row-fluid">
         <div class="span2 visible-desktop"></div>
           <div class="span8">
<!--     DEBUT DU BODY     --> 
<br><br><br><br>

<!--ICI VA LE CONTENU  --> 
<fieldset class="t1">
<legend class="t3" ><h1>Ajouter Terrain</h1></legend>

<form  method="get" action="../Control/Ajouter_Terrain.php">
<br />

<table id="table_inscri" style="margin-left:auto; margin-right: auto;" width="500" border="0">
  
  <tr>
  <input hidden="hidden" name="Id" id="Id" value="<?php echo $Id?>"/>
  	<td><label>Nom du terrain<span class="form-required">*</span></label></td>
  	<td><input type="text" name="Nom_ter" id="Nom_ter" placeholder="Nom du Terrain" /></td>
  </tr>
  
  <tr>
  	<td><label>Tarif du terrain<span class="form-required">*</span></label></td>
  	<td><input type="text" name="Tarif_ter" id="Tarif_ter" placeholder="Tarif du Terrain"  /></td> 
  </tr>
  
  <tr>
	<td><label>Nombre max de joueur<span class="form-required">*</span></label></td>
    <td><input name="Nbr_maxjoueur_ter" id="Nbr_maxjoueur_ter" type="text" placeholder="Nombre max de joueur" /></td>
  </tr>
  
  <tr>
	<td><label>Heure d'ouverture<span class="form-required">*</span></label></td>
    <td><input name="Heure_ouverture" id="Heure_ouverture" type="time" placeholder="Heure d'ouverture" /></td>
  </tr>
  
  <tr>
	<td><label>Heure de fermeture<span class="form-required">*</span></label></td>
    <td><input name="Heure_fermeture" id="Heure_fermeture" type="time" placeholder="Heure de fermeture" /></td>
  </tr>
  
 <tr>
  <td><input  class="submit_form" name="submit" value="Valider" type="submit" style="float:right;" /></td>
  <td> <p style="font-size:12px"> En cliquant sur Valider, vous acceptez nos Conditions et reconnaissez avoir lu et comprendre notre Politique d’utilisation des données, y compris Utilisation des cookies</p></td>
 </tr>

 <br />
  
 <tr>
  <td></td>
  <td> <p style="font-size:16px"> <span style="color:#F00">*</span>  Tous les champs sont OBLIGATOIRES. </p> </td>
 </tr>
 
</table>
	
</form>
</fieldset>

<br>
<a href="javascript:history.back()"><i class="icon-arrow-left"></i>Retour</a>
<!--ICI VA LE CONTENU  --> 
<br><br>
<br>
<br>
<br>
<br>
			</div>  <!-- FIN SPAN 8--> 
            <div class="span2 visible-desktop"></div>
	     </div> <!-- FIN FLUID ROW--> 
    </div>  <!-- FIN SPAN 12--> 
</div><!-- FIN FLUID ROW--> 

<!-- FIN DU BODY--> 


<?php include('footer.php'); ?>
<?php include('en_page_scripts.php'); ?> 
</body>
</html>