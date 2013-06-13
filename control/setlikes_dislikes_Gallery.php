<?php
$type= $_GET['type'];
$IdT = $_GET['IdT'];
//error_reporting(E_ALL ^ E_NOTICE);
require_once("..\Model\TerrainModel.php");

$tM=new TerrainModel();

if($type=='jaime')
$tM->jaime($IdT);
if($type=='jaimepas')
$tM->jaimepas($IdT);

$t=$tM->RetournerTerrain($IdT);
$total = $t->GetLike_ter() + $t->GetDislike_ter();  

echo('
<br />
<div class="progress"  style="width:50%; margin:0px;">
	<div class="bar bar-success" style="width:'.(100*$t->GetLike_ter()/$total).'%;"></div>
	<div class="bar bar-danger" style="width:'.(100*$t->GetDislike_ter()/$total).'%;"></div>
</div><br />
<span class="visible-desktop"><i class="icon-thumbs-up"></i> '.$t->GetLike_ter().' <span class="span5"></span> &nbsp; &nbsp; <i class="icon-thumbs-down"></i> '.$t->GetDislike_ter().'</span>

<span class="hidden-desktop"><i class="icon-thumbs-up"></i> '.$t->GetLike_ter().' &nbsp; &nbsp; <i class="icon-thumbs-down"></i> '.$t->GetDislike_ter().'</span>
<div class="clearfix"></div>
');


?>