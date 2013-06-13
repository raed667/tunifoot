<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<?php include('head_no_title.php'); ?>
<title>Recherche Joueurs</title>
<script src="scripts/Operante.js"></script>
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
	 
var xmlhttp;
if (window.XMLHttpRequest) xmlhttp=new XMLHttpRequest();
else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

xmlhttp.onreadystatechange=function()
  {	  
  	if(tailleRecherche==0)
			document.getElementById("resultat").innerHTML=xmlhttp.responseText;
		else
		 if(xmlhttp.readyState==4 && xmlhttp.status==200)
    	document.getElementById("resultat").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("GET",'../control/sousmettre_recherche_joueur.php?Type='+type+'&recherche='+recherche,true);
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
<br><br><br><br>

<!--ICI VA LE CONTENU  --> 
<fieldset class="t1">
<legend class="t3" ><h1>Recherche</h1></legend>

<form id="form1" name="form1" method="post" onsubmit="return false;" >
	<table width="40%" border="0">
	  
    <tr>
		<td>Recherche</td>
		
        <td>
  		<input type="text" name="recherche" id="recherche" value="<?php if(isset($_GET['recherche'])) echo $_GET['recherche']; ?>" onKeyUp="affiche()"/>	
		</td>
	  
    </tr>
   
    </table>
      
		
         <span style="white-space:nowrap;">
          <label class="radio">
		    <input type="radio" name="Type" value="nomP" id="nomP" checked="checked" />  <span class="metro-radio">Nom et Prenom</span>
          </label>
		  <br />
		  <label class="radio">
		    <input type="radio" name="Type" value="nom" id="nom" /> <span class="metro-radio">Nom Entreprise</span>
          </label>
		  <br />
            
		  <label class="radio">
		    <input type="radio" name="Type" value="region" id="region" /><span class="metro-radio"> Region</span>
          </label>
            
             
    
    </span>
     
	
	
    
    
    </form>
    <div id="resultat"></div>
</fieldset>
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