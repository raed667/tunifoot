<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="fr"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="fr"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
<?php include('head_no_title.php'); ?>
<title>Rechercher un terrain</title>
<script type="text/javascript">
function affiche()
{

  var i;
  tailleRecherche = (document.getElementById('recherche').value).length;
  
  for (i=0;i<3;i++)
    {
      if (document.form1.Type[i].checked)
	  var type = document.form1.Type[i].value;	
    }
	
	  var recherche = document.form1.recherche.value;
	  var operante = document.form1.operante.value;

var xmlhttp;
if (window.XMLHttpRequest) xmlhttp=new XMLHttpRequest();
else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

xmlhttp.onreadystatechange=function()
  {	  
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	document.getElementById("resultat").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("GET",'../control/Soumettre_Recherche.php?Type='+type+'&recherche='+recherche+'&operante='+operante,true);
xmlhttp.send();

return false;
}
</script>

</head>
<body data-accent="blue" onload="affiche();">
<?php include('nav_bar.php'); ?>

<!--  s9ala té3 il site : lkol fi lkol 12  offset 1 + body 8 + span1-->

<div class="row-fluid">
   <div class="span12">
      <div class="row-fluid">
         <div class="span2 visible-desktop"></div>
           <div class="span8">
<!--     DEBUT DU BODY     --> 
<br>

<!--ICI VA LE CONTENU  --> 

<fieldset class="t1">
<legend class="t3" ><h1>Recherche</h1></legend>

<form id="form1" name="form1" method="post" onsubmit="return false;">
	  
		<h3>Recherche </h3>
        
  		<input type="text" name="recherche" id="recherche" value="<?php if(isset($_GET['recherche'])) echo $_GET['recherche']; ?>" onKeyUp="affiche()"  />	
	
          <select  name='operante' size="1" id="operante" value="operante" style="width:50px" class="">
                     <optgroup >  </optgroup>
                     <option value="=" > = </option>
             	     <option value="<="> > </option>
                	 <option value=">="> < </option>
          </select>
         
	 <span style="white-space:nowrap;">
		  <label class="radio">
            <input type="radio" name="Type" value="nom" id="nom" checked /> <span class="metro-radio"> Nom </span></label>
		  <label class="radio">
		    <input type="radio" name="Type" value="Tarif" id="Tarif" /> <span class="metro-radio"> Tarif</span></label>
		  <label class="radio">
 <input type="radio" name="Type" value="Nombre_max_de_joueurs" id="Nombre_max_de_joueurs"/> <span class="metro-radio"> Nombre maximum de joueur</span></label> 
</span>	
<br /><br /><br />
<div id="resultat"></div>
</form>
</fieldset>


 
<!--ICI VA LE CONTENU  --> 

<br><br>
<br>
<br>
<br>
<br>
 

 <div id="tab" >
</div>


 			</div>  <!-- FIN SPAN 8--> 
            <div class="span2 visible-desktop"></div>
	     </div> <!-- FIN FLUID ROW--> 
    </div> 
  <!-- FIN SPAN 12--> 
 
</div> <!-- FIN FLUID ROW--> 

<!-- FIN DU BODY--> 



<?php include('footer.php'); ?>

<?php include('en_page_scripts.php'); ?> 
<script language="javascript"  type="text/javascript">
$(document).ready(function() {
    $('#operante').hide();
	$('#nom').click(function() {
		    $('#operante').hide();
		});
	
	$('#Tarif').click(function() {
		    $('#operante').show();
		});
		
	$('#Nombre_max_de_joueurs').click(function() {
		    $('#operante').show();
		});
		
});
</script>
</body>