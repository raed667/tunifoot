<?php 
include('header.php'); 
require_once("..\Model\ProprietaireModel.php");
$Id = htmlspecialchars($_GET["Id"]);
$P=new Proprietaire("","","","","","",0,"",0,"","","");
$PM=new ProprietaireModel();
$P=$PM->RetournerProp($Id);
?>




<div class="row-fluid">    
    <div class="span8 offset1">
	    
    <fieldset>
     <legend><h2>Modifier le profil</h2></legend>
     
     <form method="get" action="../Control/Modifier_Proprietaire.php" >
     
     <table id="table_inscri" style="margin-left:auto; margin-right: auto;" width="500" border="0">
			  
              <div style="clear:both;"></div>
			  
              <tr>
              <input hidden="hidden" name="Id" id="Id" value="<?php echo $Id?>"/>
				<td><label>Nom</label></td>
				<td><input type="text" name="Nom_prop" id="Nom_prop" value="<?php echo $P->getNom(); ?>" /></td>
			  </tr>
			  
			  <tr>
				<td><label>Prenom</label></td>
				<td><input type="text" name="Prenom_prop" id="Prenom_prop" value="<?php echo $P->getPrenom(); ?>" /></td>
			  </tr>
			  
			  <tr>
				<td><label>E-Mail</label></td>
				<td><input type="email" name="Email_prop" id="Email_prop"  value="<?php echo $P->getEmail(); ?>"/></td>
			  </tr>
			  
			  <tr>
				<td><label>Nouv. Mot de Passe</label></td>
				<td><input type="password" name="Motdepasse_prop" value="<?php echo $P->getMot_de_passe(); ?>" id="Motdepasse_prop"/></td> 
			  </tr>
              
              <tr>
				<td><label>Résidence</label></td>
				<td><input type="text" name="Residence_prop" id="Residence_prop" value="<?php echo $P->getResidence(); ?>"/></td>
			  </tr>
			
			  <tr>
				<td><label>Region</label></td>
				<td>
                <select name="Region_prop" id="Region_prop">
				  <optgroup label="Grand Tunis">
				   <option <?php  if ($P->getRegion()=="Tunis") echo 'selected="selected"';?>value="Tunis">Tunis</option>
				   <option <?php  if ($P->getRegion()=="Ariana") echo 'selected="selected"'; ?>value="Ariana">Ariana</option>
				   <option <?php  if ($P->getRegion()=="Manouba") echo 'selected="selected"' ?> value="Manouba">Manouba</option>
				   <option <?php  if ($P->getRegion()=="Ben Arous") echo 'selected="selected"' ?> value="Ben Arous">Ben Arous</option>
				  </optgroup>
                  
                  <optgroup label="Autres Gouvernorats">
                  <option <?php  if ($P->getRegion()=="Bizerte") echo 'selected="selected"';?>value="Bizerte">Bizerte</option>
				   <option <?php  if ($P->getRegion()=="Zaghouan") echo 'selected="selected"'; ?>value="Zaghouan">Zaghouan</option>
				   <option <?php  if ($P->getRegion()=="Beja") echo 'selected="selected"' ?> value="Beja">Beja</option>
				   <option <?php  if ($P->getRegion()=="Jandouba") echo 'selected="selected"' ?> value="Jandouba">Jandouba</option>
                   
                   <option <?php  if ($P->getRegion()=="Kef") echo 'selected="selected"';?>value="Kef">Kef</option>
				   <option <?php  if ($P->getRegion()=="Siliana") echo 'selected="selected"'; ?>value="Siliana">Siliana</option>
				   <option <?php  if ($P->getRegion()=="Nabeul") echo 'selected="selected"' ?> value="Nabeul">Nabeul</option>
				   <option <?php  if ($P->getRegion()=="Sousse") echo 'selected="selected"' ?> value="Sousse">Sousse</option>
                   
                   <option <?php  if ($P->getRegion()=="Kairouan") echo 'selected="selected"';?>value="Kairouan">Kairouan</option>
				   <option <?php  if ($P->getRegion()=="Monastir") echo 'selected="selected"'; ?>value="Monastir">Monastir</option>
				   <option <?php  if ($P->getRegion()=="Sfax") echo 'selected="selected"' ?> value="Sfax">Sfax</option>
				   <option <?php  if ($P->getRegion()=="Mahdia") echo 'selected="selected"' ?> value="Mahdia">Mahdia</option>
                   
                   <option <?php  if ($P->getRegion()=="Kasrine") echo 'selected="selected"';?>value="Kasrine">Kasrine</option>
				   <option <?php  if ($P->getRegion()=="Sidi Bouzid") echo 'selected="selected"'; ?>value="Sidi Bouzid">Sidi Bouzid</option>
				   <option <?php  if ($P->getRegion()=="Gafsa") echo 'selected="selected"' ?> value="Gafsa">Gafsa</option>
				   <option <?php  if ($P->getRegion()=="Tozeur") echo 'selected="selected"' ?> value="Tozeur">Tozeur</option>
                   
                   <option <?php  if ($P->getRegion()=="Kebili") echo 'selected="selected"';?>value="Kebili">Kebili</option>
				   <option <?php  if ($P->getRegion()=="Gabes") echo 'selected="selected"'; ?>value="Gabes">Gabes</option>
				   <option <?php  if ($P->getRegion()=="Medinine") echo 'selected="selected"' ?> value="Medinine">Medinine</option>
				   <option <?php  if ($P->getRegion()=="Tataouine") echo 'selected="selected"' ?> value="Tataouine">Tataouine</option>
				</optgroup>
                </select>
                </td>
			
			  </tr>
			  
			  <tr>
				<td><label>Telephone</label></td>
				<td><input name="Telephone_prop" id="Telephone_prop" type="tel"  value="<?php echo $P->getTelephone(); ?> "/></td>
			  </tr>
			    
			  <tr>
				<td><label>Information</label></td>
                <td>
                <textarea size="50" name="Info_prop" id="Info_prop"><?php echo $P->getInformation(); ?></textarea>	
                </td>
			  </tr>

			  <tr>
				<td><label>Nom du complexe</label></td>
				<td><input name="Nom_complexe_prop" id="Nom_complexe_prop" type="text" value="<?php echo $P->getNom_du_Complexe(); ?> "/></td>
			  </tr>
              
            </table> 		  
			  <br><br>
				<input class="btn" name="submit" value="Valider" type="submit" style="float:left;" />
				<input  class="btn" name="reset" value="Annuler" type="reset" style="float:right;" />
			
		</form>
	</fieldset>
     </div>
     
     </div>

       
<?php include('footer.php'); ?>
