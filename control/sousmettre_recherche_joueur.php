<?php

require_once("..\Model\UtilisateursModel.php");
  
  $string = $_GET['recherche'];
  $typeR = $_GET['Type']; 
  
 
  $EM=new EntrepriseModel();
	 
//$id=$_GET['Id_entreprise_FK'];
//$requete=" select * from  utilisateur where Id_entreprise_FK =='".$id."'";

 //if(isset($_GET['recherche'])) $operante = $_GET['recherche'];
  //if(isset($_GET['Type'])) $operante = $_GET['Type'];
 /*// if(empty($liste))
  {
echo("Votre Recherche ...");// a changer 
  }
  else
{ */
if($string=='' or $string==' ')
{$liste=$EM->AfficherTouteListeJoueurs();
} 
else{
if($typeR == 'nomP')
{ 
$liste=$EM->RechercheJoueurSelonNomPrenom($string);
}


if($typeR == 'nom')
{ 
$liste=$EM->RechercheJoueurSelonNom($string);
}


if($typeR == 'region')
{ 
$liste=$EM->RechercheJoueurSelonregion($string);
}
}
?>


<h1>Liste des joueurs :</h1>
<table class="table table-hover">	
				<tr align="center">
					<th width="32"><strong>Nom</strong></th>
					<th width="51"><strong>Prenom</strong></th>
					<th width="38"><strong>Nom_entreprise</strong></th>
					<th width="33"><strong>Date d'inscription</strong></th>
                    <th width="33"><strong>Region</strong></th>
                     <th width="33"><strong>Nombre de parties</strong></th>
                     <th width="33"><strong>Telephone</strong></th>
                        
                   
  				</tr>                 
                   
  				
  <?php 
  
  
  foreach ($liste as $Voi):
  echo "<tr>";
  echo "<td><center>".$Voi->getNom()."</center></td>";
  echo "<td><center>".$Voi->getPrenom()."</center></td>";
  echo "<td><center>".$Voi->getNom_Entreprise()."</center></td>";
  echo "<td><center>".$Voi->getDate_Inscription()."</center></td>";

  echo "<td><center>".$Voi->getRegion()."</center></td>";
  echo "<td><center>".$Voi->getNombre_De_Parties()."</center></td>";
  echo "<td><center>".$Voi->getTelephone()."</center></td>";

  echo "</tr>";
  endforeach;
  
  
  
  
  
  
  
 ?>
