

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



<?php 

 include('header.php'); 
require_once("..\Model\UtilisateursModel.php");
$EM=new EntrepriseModel();
$listeE=$EM->AfficherEntreprise();

require_once("..\Model\ReservationModel.php");
$RM=new ReservationModel();
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
               					 <th>Entreprise</th>
								  <th>Nom</th>
								  <th>Date d'inscription</th>
								  <th>Téléphone</th>
								  <th>Date de néssance </th>
                               <th></th>
                              <th></th>
                              </tr>
						  </thead>   
						  <tbody>
                          <?php foreach ($listeE as $Voi):
						  if($Voi->getType() == "Entreprise")
{
						  
						   ?>
							<tr>
                            <td><?php echo($Voi->getNom_Entreprise()); ?></td>
								<td><?php echo($Voi->getNom().' '.$Voi->getPrenom()); ?></td>
								<td class="center"><?php echo($Voi->getDate_Inscription()); ?></td>
								<td class="center"><?php echo($Voi->getTelephone()); ?></td>
								<td class="center">	<?php echo($Voi->getDate_De_Naissance()); ?>							</td>
								<td class="center">
									<a target="_blank" class="btn btn-success" href="../vue/Entreprise.php?Id=<?php echo($EM->retournerId($Voi->getEmail()));  ?>">
										<i class="icon-zoom-in icon-white"></i>  
										View                                            
									</a>
                                    </td>
                                    <td>
									<a target="_blank" class="btn btn-info" href="modifier_E.php?Id=<?php echo($EM->retournerId($Voi->getEmail()));   ?>&">
										<i class="icon-edit icon-white"></i>  
										Edit                                            
									</a>
                                    </td>
                                    <td>
                        <a target="_blank" class="btn btn-danger" href="../control/SupprimerUtilisateur.php?Id=<?php echo($Voi->getId()); ?>">
                             	<i class="icon-trash icon-white"></i> Delete</a>
								</td>
							</tr>
							<?php } endforeach; ?>
							</tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
        
       
<?php include('footer.php'); ?>
