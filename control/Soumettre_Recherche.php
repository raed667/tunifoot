<?PHP
session_start();

require_once("../Model/TerrainModel.php");
require_once("../Model/ProprietaireModel.php");

$tM=new TerrainModel();
$string = $_GET['recherche'];
$typeR = $_GET['Type'];  

$operanteR = $_GET['operante'];
if ($string=='' or $string==' ')
{
	$liste=$tM->AfficherTerrain();
}
else 
{
if($typeR == 'nom')
{ 
$liste=$tM->RechercheTerrainSelonNom($string);
}

if ($typeR == 'Tarif')  
 {
	 $liste=$tM->RechercheTerrainSelontarif($string,$operanteR);
 }
 if ($typeR =='Nombre_max_de_joueurs')
{ 
$liste=$tM->RechercheTerrainSelonNbrmax($string,$operanteR);
}
}

if(count($liste)==0)
echo('<h2 class="lead text-info"> Aucun terrain ne corréspond au critère demandé </h2><br/>');	

else
{
?>

<h1>Terrain :</h1>
<table class="table table-hover">	
   <thead>
				<tr align="center">
					<th><center> Nom Terrain </center></th>
					<th><center> Max Joueurs </center></th>
					<th><center> Tarif </center></th>
					<th><center> Heure Ouverture </center></th>
					<th><center> Heure Fermeture </center></th>
                    <?php
					if (isset($_SESSION['Type']))
					if($_SESSION['Type']!='Proprietaire')
					{ 
					?>
                    <th><center> Reserver </center></th>
                    <?php
					}
                    ?>
  				</tr>      
   </thead>          
        <tbody>          				
  <?php 
  foreach ($liste as $Terrain):
  $TM = new TerrainModel();
  $IdT=$TM->ChercherId($Terrain);
  $PM = new ProprietaireModel();
  $P=$PM->RetournerProp($TM->RetournerIdProprio($IdT));
  echo "<tr>";
  echo "<td>";
  echo '<a href="Proprietaire.php?Id='.$TM->RetournerIdProprio($IdT).'"> ' . $P->getNom_du_Complexe() . ' - ' . $Terrain->GetNom_ter() . '</a></td>';
  echo "<td><center>" . $Terrain->GetNbr_maxjoueur_ter() . "</center></td>";
  echo "<td><center>" . $Terrain->GetTarif_ter() . " DT</center></td>";
  echo '<td><center>' . (sprintf ("%02u",$Terrain->GetHeure_ouverture()).':00') . ' H</center></td>';
  echo '<td><center>' . (sprintf ("%02u",$Terrain->GetHeure_fermeture()).':00') . ' H</center></td>';
  
if(isset($_SESSION['Type']))
{
if($_SESSION['Type']=='Entreprise')
                {
  echo '<td><center><a href="Reserver_Entreprise.php?IdT='.$IdT.'"><i class="icon-bookmark"></i></a></center></td>';
                }
if($_SESSION['Type']=='Joueur')
                {
 echo '<td><center><a href="Reserver.php?IdT='.$IdT.'"><i class="icon-bookmark"></i></a></center></td>';
                }                
}
  echo "</tr>";
  endforeach;		
}?>
</tbody>
</table>
