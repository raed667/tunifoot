<?php
session_start();

 include('header.php'); ?>

<?php 
	
if(isset($_SESSION['IdA']))
{
}
else echo('<script type="text/javascript">
setTimeout(function(){window.location = "login.php?err=1";}, 0 ); 
</script>');

require_once("..\Model\AnnoncesModel.php");

$An = new AnnonceModel();
$liste = $An->Afficher(); 
 ?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Annonces</a>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-pencil"></i>Annonces</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
                    <form action="../control/Ajouter_Annonce.php" method="post" class="form-inline">
                    <textarea name="annonce_texte" style="width:98%; min-height:70px;" class="text" placeholder="Tapez Votre annonce ici"> </textarea>
                  
                                     <button class="btn btn-success btn-large" style="margin-top:10px; float:right"> Envoyer </button>

                  
                  <span style="margin-top:10px; float:right" ><input type="checkbox" name="shrTwitter" class="checkbox" value="Twitter"/><label>Twitter </label> </span>
                  
                    <div class="clearfix"></div>
					</form>	
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
            <br><br>
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2></i>Liste des Annonces</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
                    
                    
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Num</th>
								  <th>Annonce</th>
                                  <th>Action</th>
								 
							  </tr>
						  </thead>   
						  <tbody>
                          <?php foreach ($liste as $Voi): ?>
							<tr>
								<td class="center"><?php echo($Voi->GetId()); ?></td>
								<td><?php echo($Voi->GetTexte()); ?></td>
								
                                 <td>
                                    <a class="btn btn-danger" href="../control/SupprimerAnnonce.php?Id=<?php echo($Voi->GetId());   ?>">
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
