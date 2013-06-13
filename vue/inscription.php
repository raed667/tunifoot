<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="fr"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="fr"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<script language="javascript" type="text/javascript" src="scripts/Verification.js">
</script>
<head>
<?php include('head_no_title.php'); ?>
<title>Inscription</title>

</head>
<body data-accent="blue">
<?php include('nav_bar.php'); ?>

<!--  s9ala té3 il site : lkol fi lkol 12  offset 1 + body 8 + span1-->
<?php if( isset($_SESSION['newLogin']) and ( isset($_SESSION['IdP']) and isset($_SESSION['IdU']) ))
		{
if($_SESSION['IdP']!=$_SESSION['IdU'])
{
	
$_SESSION['404Message']="Vous étes déjà connecté.";
				echo('
				<script type="text/javascript">
setTimeout(function(){window.location = "../Vue/404.php";}, 0 ); 
</script>');	
}
		} ?>
<div class="row-fluid">
   <div class="span12">
      <div class="row-fluid">
         <div class="span2 visible-desktop"></div>
           <div class="span8">
<!--     DEBUT DU BODY     --> 
<br><br>
<?php

if(isset($_SESSION['errorMSG']))
{
if($_SESSION['errorMSG']!='')
{

echo('
    <div class="alert">
     <button type="button" class="close" data-dismiss="alert"></button>
     <strong>Erreur!</strong>'.$_SESSION['errorMSG'].'
   </div>
   ');

$_SESSION['errorMSG']='';
}}



 ?>
<!--ICI VA LE CONTENU  --> 
<span>
<fieldset class="t1">
<legend class="t3" ><h1>Inscription</h1></legend>

<form action="../control/Soumettre_Inscrit.php" method="POST" name="inscri_player">
<br />	

<table id="table_inscri" style="margin-left:auto; margin-right: auto; width:75%;" border="0">
  <tr>
    <td nowrap="nowrap"><label class=""  for="input_8">Nom<wbr>
      <span style="color:#F00">*</span></label></td>
    <td> 
    <input type="text" size="20" name="nom_user" id="nom_user" placeholder="Nom" required /><br>
    <input type="text" size="20" name="prenom_user" id="prenom_user" placeholder="Prenom" required /><br />
    </td>
  </tr>
  
  <tr>
    <td nowrap="nowrap"><label class=""  for="input_8">E-Mail<span style="color:#F00">*</span></label></td>
    <td><input name="mail" id="mail" type="email" size="47" placeholder="exemple@mail.com" required onKeyDown="Verification()"/><img style="margin-left:5px; margin-top:-10px;" width="20px" height="20px" id="img"></td>
  </tr>
  
  <tr>
    <td nowrap="nowrap"><label class=""  for="input_8">Mot de Passe<span style="color:#F00">*</span></label></td>
    
    <td><input name="pwd" id="pwd" size="24" type="password" placeholder="Mot de passe" required /> 
 </td>
  </tr>
  
  <tr>
    <td nowrap="nowrap"><label class=""  for="input_8">Localité<span style="color:#F00">*</span></label></td>
    <td>
    	 <select id="local" name="local"> 
         	 <optgroup label="Grand Tunis">  
             	<option> Tunis </option> 	
                <option> Ariana </option> 
                <option> Manouba </option> 
                <option> Ben Arous </option> 
             </optgroup>
             
             <optgroup label="Autres Gouvernorats">  
             	<option> Bizerte </option> 	
                <option> Zaghouan </option> 
                <option> Beja </option> 
                <option> Jandouba</option>
                
                <option> Kef </option> 	
                <option> Siliana </option> 
                <option> Nabeul </option> 
                <option> Sousse </option>
                
                <option> Kairouan </option> 	
                <option> Monastir </option> 
                <option> Sfax </option> 
                <option> Mahdia </option>
                
                <option> Kasrine </option> 	
                <option> Sidi Bouzid </option> 
                <option> Gafsa </option> 
                <option> Tozeur </option> 
                
                <option> Kebili </option> 	
                <option> Gabes </option> 
                <option> Medinine </option> 
                <option> Tataouine </option> 
             </optgroup> 
         </select><br />
	</td>
  </tr>
  
  <tr>
  <td nowrap="nowrap"></td>
  </tr>
  
  <tr>
  <td nowrap="nowrap"><label class=""  for="input_8"> Vous êtes <span style="color:#F00">*</span></label>
  
  </td><td>
  
    <table width="354">
  
     <tr>
        <td><label class="radio">
<input type="radio" name="user_groupe" value="Joueur" id="Joueur" checked /> <span class="metro-radio"> Joueur </span></label></td>
     </tr>
      
      <tr>
        <td><label class="radio"><input type="radio" name="user_groupe" value="Proprietere" id="Proprietere" /><span class="metro-radio">Propriétaire de terrain </span> </label></td>
      </tr>
    
      <tr>
        <td><label class="radio"><input type="radio" name="user_groupe" value="Entreprise" id="Entreprise" /> <span class="metro-radio"> Socité </span></label></td>
      </tr>
    
    </table>
    </td>
  
  </tr>
  
  <tr>
  <td nowrap="nowrap"></td>
  </tr>
  
  <tr>
  <td nowrap="nowrap">  <input  class="submit_form" name="submit" value="Valider" type="submit" style="float:right;" />
</td>
  <td> <br>
</td>
 </tr>
  
  <tr>
  <td nowrap="nowrap"></td>
  <td> <p style="font-size:16px"> <span style="color:#F00">*</span>  Tous les champs sont OBLIGATOIRES. </p> </td>
  </tr>

</table>
	
</form>
</fieldset>

</span>
<!--ICI VA LE CONTENU  --> 
<br><br>
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