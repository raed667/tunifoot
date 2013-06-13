

<?php 
	session_start();
if($_SESSION['IdA']==1) 
{
	
}
else
{
	echo('
				<script type="text/javascript">
setTimeout(function(){window.location = "login.php";}, 0 ); 
</script>');
}


?>
<?php include('header.php'); 
require_once("..\Model\ReservationModel.php");
require_once("..\Model\TerrainModel.php");
require_once("..\Model\UtilisateursModel.php");
$RM = new ReservationModel();
$listeR = $RM->AfficherReservation();
$TM=new TerrainModel();
$UM= new EntrepriseModel();


//$listeT=$TM->AfficherTerrain();

?>


		<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Joueurs</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Members</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                                   <th>Nom du reservateur</th>
                               <th>Nom du terrain reservé</th>
								
								  <th>Date de résérvation </th>
   								  <th>Heure de résérvation  </th>
							  <th></th>
                              <th></th>
                              <th></th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php foreach ($listeR as $Voi):
                        $t=$TM->RetournerTerrain($Voi->GetId_ter_resv_Fk());
						$u=$UM->RetournerUtilisateur($Voi->GetId_util_resv_FK());
						 ?>
							<tr>
                        <td class="center"><?php echo($u->getNom()); ?></td>
                          <td class="center"><?php echo($t->GetNom_ter()); ?></td>
							
								<td class="center">	<?php echo($Voi->GetDate_reserv()); ?></td>
                             <td class="center"><?php echo($Voi->GetHeur_reserv()); ?></td>
								<td class="center">
			<a target="_blank" class="btn btn-success" href="../vue/Info_Reservation.php?IdU=<?php echo($Voi->getId().'&IdP='.$Voi->getId().'&IdT='.$Voi->getId().'&IdR='.$Voi->getId());  ?>">
										<i class="icon-zoom-in icon-white"></i>  
										View                                            
									</a>
                                    </td>
                                    <td>
									<a target="_blank" class="btn btn-info" href="Modifier_R.php?Id=<?php echo($Voi->getId());?>">
										<i class="icon-edit icon-white"></i>  
										Edit                                            
									</a>
                                    </td>
                                    <td>
                                    <a target="_blank" class="btn btn-danger" href="../control/Supprime_Reservation.php?IdR=<?php echo($Voi->getId()); ?>">
                             	<i class="icon-trash icon-white"></i> Delete</a>
								</td>
							</tr>
							<?php endforeach; ?>
							</tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
       
<?php include('footer.php'); ?>
