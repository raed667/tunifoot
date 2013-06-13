
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
require_once("..\Model\ProprietaireModel.php");
$PM=new ProprietaireModel();
$ListeP = $PM->AfficherProprietaire();
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
               					 <th>Complexe</th>
								  <th>Nom</th>
								  <th>Date d'inscription</th>
								  <th>Téléphone</th>
                               <th></th>
                              <th></th>
                              </tr>
						  </thead>   
						  <tbody>
                          <?php foreach ($ListeP as $Voi):
						
						  
						   ?>
							<tr>
                            <td><?php echo($Voi->getNom_du_Complexe()); ?></td>
								<td><?php echo($Voi->getNom().' '.$Voi->getPrenom()); ?></td>
								<td class="center"><?php echo($Voi->getDate_Inscription()); ?></td>
								<td class="center"><?php echo($Voi->getTelephone()); ?></td>
								<td class="center">
									<a target="_blank" class="btn btn-success" href="../vue/Proprietaire.php?Id=<?php echo($Voi->getId()); ?>">
										<i class="icon-zoom-in icon-white"></i>  
										View                                            
									</a>
                                    </td>
                                    <td>
									<a target="_blank" class="btn btn-info" href="modifier_P.php?Id=<?php echo($Voi->getId());?>">
										<i class="icon-edit icon-white"></i>  
										Edit                                            
									</a>
                                    </td>
                                    <td>
                                    <a target="_blank" class="btn btn-danger" href="../control/SupprimerComplexes.php?Id=<?php echo($Voi->GetId());  ?>">
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