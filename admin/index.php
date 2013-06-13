 <?php
require_once("../Model/AdministrateurModel.php");
require_once("../Model/UtilisateursModel.php");
require_once("../Model/TerrainModel.php");
require_once("../Model/ProprietaireModel.php");
require_once("../Model/ReservationModel.php");

$EM=new EntrepriseModel();
$TM= new TerrainModel();

$RM= new ReservationModel();
$PM=new ProprietaireModel();

$i=$EM->RetournerNombreEntreprise();
$x=$EM->RetournerNombreJoueur();

$j=$TM->RetournerNombreTerrain();
$y=$PM->RetournerNombreProprietaire();
$r=$RM->RetournerNombreReservation();
?>

<?php

	session_start();

if(isset($_POST['username']) && isset($_POST['password']))  
{
	$user = $_POST['username'];
	$pass = $_POST['password'];

$admin = new AdministrateurModel();
	if($admin->LoginAdmin($user,$pass) != -1) 
	{
		$_SESSION['IdA']=$admin->LoginAdmin($user,$pass);
	}
}

if(isset($_SESSION['IdA']))
{
}
else echo('<script type="text/javascript">
setTimeout(function(){window.location = "login.php?err=1";}, 0 ); 
</script>');



include('header.php'); 

?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
			</div>
			<div class="sortable row-fluid">
				<a  class="well span3 top-block" href="Joueurs.php">
					<span class="icon32 icon-red icon-user"></span>
					<div>Joueurs</div>
					<div> <?PHP  echo ($x+1) ?></div>
				</a>

				<a  class="well span3 top-block" href="Entreprises.php">
					<span class="icon32 icon-color icon-user"></span><span class="icon32 icon-color icon-user"></span><span class="icon32 icon-color icon-user"></span>
					<div>Entreprises</div>
					<div><?PHP  echo ($i+1)?></div>
				</a>

				<a class="well span3 top-block" href="#">
					<span class="icon32 icon-color  icon-briefcase"></span>
					<div>Complexes</div>
					<div><?PHP  echo ($y+1) ?></div>
					<span class="notification red"><?PHP  echo ($j) ?></span>
				</a>



				<a  class="well span3 top-block" href="Reservations.php">
					<span class="icon32 icon-color icon-cart"></span>
					<div>Reservations</div>
					<div><?PHP  echo ($r) ?></div>
					
				</a>
				
				
			</div>
			<script src="js_charts/Chart.js"></script>

			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
             <h2><i class="icon-info-sign"></i> Statistiques </h2>
					</div>
                <div class="box-content">
             
                		<div class="row-fluid">
						<div class="span12">
          <div class="row-fluid">
           		
                <div class="span6">
            		<canvas class="center" id="canvas" height="400" width="500"></canvas>
                </div>
                <div class="span6">
                	<canvas id="canvas2" height="350" width="350"></canvas>
                </div>
                
                <br /><br /><br />
                
				<div class="span6">
            		<canvas  id="box" width="15" height="15" style="background-color:#4DFFDB;"></canvas><p style="position:relative; float:right; margin-right:40%;">Réservations effectuées par les joueurs <?php
					$x= ($RM->NombreReservationSelonJoueurs()*100)/($RM->NombreReservationSelonJoueurs()+$RM->NombreReservationSelonEntreprises());
					echo(sprintf ("%1\$.2f",$x)).'%';?></p>
                </div>
                   <div style="clear:none"></div>
                <div class="span6">
            		<canvas  id="box1" width="15" height="15" style="background-color:#FF4D70;"></canvas><p style="position:relative; float:right; margin-right:35%;">Réservations effectuées par les entreprises <?php
					$x= ($RM->NombreReservationSelonEntreprises()*100)/($RM->NombreReservationSelonEntreprises()+$RM->NombreReservationSelonJoueurs());
					 echo(sprintf ("%1\$.2f",$x)).'%';?>
                    </p>
                </div> 
            			</div>
                        </div>                
             
                </div>
                </div>
                	</div> 
			</div><!--/row-->
<input id="VJan" type="text" value="<?php echo($RM->NombreReservationSelonMoisJan()); ?>" class="hidden" />
<input id="VFev" type="text" value="<?php echo($RM->NombreReservationSelonMoisFev()); ?>" class="hidden" />
<input id="VMar" type="text" value="<?php echo($RM->NombreReservationSelonMoisMar()); ?>" class="hidden" />
<input id="VAvr" type="text" value="<?php echo($RM->NombreReservationSelonMoisAvr()); ?>" class="hidden" />
<input id="VMai" type="text" value="<?php echo($RM->NombreReservationSelonMoisMai()); ?>" class="hidden" />
<input id="VJun" type="text" value="<?php echo($RM->NombreReservationSelonMoisJun()); ?>" class="hidden" />
<input id="VJui" type="text" value="<?php echo($RM->NombreReservationSelonMoisJui()); ?>" class="hidden" />
<input id="VAou" type="text" value="<?php echo($RM->NombreReservationSelonMoisAou()); ?>" class="hidden" />
<input id="VSept" type="text" value="<?php echo($RM->NombreReservationSelonMoisSept()); ?>" class="hidden" />
<input id="VOct" type="text" value="<?php echo($RM->NombreReservationSelonMoisOct()); ?>" class="hidden" />
<input id="VNov" type="text" value="<?php echo($RM->NombreReservationSelonMoisNov()); ?>" class="hidden" />
<input id="VDec" type="text" value="<?php echo($RM->NombreReservationSelonMoisDec()); ?>" class="hidden" />
			  
<input id="VJ" type="text" value="<?php echo($RM->NombreReservationSelonJoueurs()); ?>" class="hidden" />
<input id="VE" type="text" value="<?php echo($RM->NombreReservationSelonEntreprises()); ?>" class="hidden" />

<script language="javascript">
var VJan = document.getElementById('VJan').value;
var VFev = document.getElementById('VFev').value;
var VMar = document.getElementById('VMar').value;
var VAvr = document.getElementById('VAvr').value;
var VMai = document.getElementById('VMai').value;
var VJun = document.getElementById('VJun').value;
var VJui = document.getElementById('VJui').value;
var VAou = document.getElementById('VAou').value;
var VSept = document.getElementById('VSept').value;
var VOct= document.getElementById('VOct').value;
var VNov = document.getElementById('VNov').value;
var VDec = document.getElementById('VDec').value;
var lineChartData = {
													
			labels : ["janvier","février","mars","avril","mai","juin","juillet","septembre","octobre","novembre","décembre"],
			datasets : [
				{
					fillColor : "rgba(255,21,102,0.5)",
					strokeColor : "rgba(255,21,102,1)",
					pointColor : "rgba(255,21,102,1)",
					pointStrokeColor : "#fff",
					data : [VJan,VFev,VMar,VAvr,VMai,VJun,VJui,VAou,VSept,VOct,VNov,VDec]
				}
			]
		}	
		
	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

var VJ = document.getElementById('VJ').value;
var VE = document.getElementById('VE').value;
var total = VJ+VE;
var prJ = (VJ*100)/total; 
var prE = (VE*100)/total;

var pieData = [
				{
					value: prJ,
					color:"#4DFFDB"
				},
				{
					value : prE,
					color : "#FF4D70"
				}
			
			];

	var myPie = new Chart(document.getElementById("canvas2").getContext("2d")).Pie(pieData);


</script>

       
<?php include('footer.php'); ?>
