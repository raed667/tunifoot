<?PHP  
require_once("../model/TerrainModel.php");
require_once("../model/ProprietaireModel.php");

$Id = $_GET['Id'];

$t=new Terrain("",0,0,1,0,0,0,0,0);

$tM= new TerrainModel();
$tM->supprimerterrainSelonPRopr($Id);
$P=new Proprietaire("","","","","","",0,"",0,"","","");	
$Pm= new ProprietaireModel();
$Pm->SupprimeProprietaire($Id);

header('Location: ' . $_SERVER['HTTP_REFERER']);











?>