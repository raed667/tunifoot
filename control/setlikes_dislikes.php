<?php
$type= $_GET['type'];
$Id = $_GET['Id'];
//error_reporting(E_ALL ^ E_NOTICE);
require_once("..\Model\TerrainModel.php");
$t=new Terrain("",0,0,1,0,0,0,'','');
$tM=new TerrainModel();

if($type=='jaime')
$tM->jaime($Id);
if($type=='jaimepas')
$tM->jaimepas($Id);

$t=$tM->RetournerTerrain($Id);
$total = $t->GetLike_ter() + $t->GetDislike_ter();  
echo('
<div class="bar bar-success" style="width:'.(100*$t->GetLike_ter()/$total).'%;"></div>
<div class="bar bar-danger" style="width:'.(100*$t->GetDislike_ter()/$total).'%;"></div>
');

?>