<?php 
include('header.php'); 
require_once("..\Model\UtilisateursModel.php");
$Id = $_GET['Id'];
$E=new Entreprise(Null,Null,"","","","","",Null,Null,"",0,0,"","");
$EM=new EntrepriseModel();
$E=$EM->RetournerUtilisateur($Id);
?>


	<div class="row-fluid">    
    <div class="span5 offset1">
	    
     <fieldset>
     <legend><h2>Modifier le profil</h2></legend>
     <form method="get" action="../control/Modifier_Utilisateur.php" >

<table id="table_inscri" style="margin-left:auto; margin-right: auto; width:auto;"  border="0">
			  
			  
              <tr>
				<td><label>Nom</label></td>
                <input hidden="hidden" name="Id" id="Id" value="<?php echo $Id?>"/>
				  <td><input type="text" name="Nom_util" id="Nom_util" value="<?php echo $E->getNom(); ?>" /></td>
			  </tr>
			  
			  <tr>
				<td><label>Prenom</label></td>
				<td><input type="text" name="Prenom_util" id="Prenom_util" value="<?php echo $E->getPrenom(); ?>" /></td>
			  </tr>
			  
			  <tr>
				<td><label>Nom d'entreprise</label></td>
				<td><input type="text" name="Nom_entreprise" id="Nom_entreprise" value="<?php echo $E->getNom_Entreprise();; ?>" /></td>
			  </tr>
              
              <tr>
				<td><label>E-Mail</label></td>
				<td><input type="email" name="Email_util" id="Email_util"  value="<?php echo $E->getEmail(); ?>"/></td>
			  </tr>
			  
			  <tr>
				<td><label>Nouv. Mot de Passe</label></td>
				<td><input type="password" name="Motdepasse_util" value="<?php echo $E->getPWD(); ?>" id="Motdepasse_util"/></td>
			  </tr>
			
            <tr>
				<td><label>Date de naissance</label></td>
				<td><input style="height:100%; padding:5%;" type="date" name="Date_naissance" id="Date_naissance"  value="<?php echo $E->getDate_De_Naissance(); ?>"/> </td>
			  </tr>
            
			  <tr>
				<td><label>Résidence</label></td>
				<td>
                <input name="Residence_util" id="Residence_util" type="text"  value="<?php echo $E->getResidence(); ?>" />
                </td>
			  </tr>
              
              <tr>
				<td><label>Regions</label></td>
				<td>
                <select name="Region" id="Region">
				  <optgroup label="Grand Tunis">
				   <option <?php  if ($E->getRegion()=="Tunis") echo 'selected="selected"';?>value="Tunis">Tunis</option>
				   <option <?php  if ($E->getRegion()=="Ariana") echo 'selected="selected"'; ?>value="Ariana">Ariana</option>
				   <option <?php  if ($E->getRegion()=="Manouba") echo 'selected="selected"' ?> value="Manouba">Manouba</option>
				   <option <?php  if ($E->getRegion()=="Ben Arous") echo 'selected="selected"' ?> value="Ben Arous">Ben Arous</option>
				  </optgroup>
                  <optgroup label="Autres Gouvernorats">
                  <option <?php  if ($E->getRegion()=="Bizerte") echo 'selected="selected"';?>value="Bizerte">Bizerte</option>
				   <option <?php  if ($E->getRegion()=="Zaghouan") echo 'selected="selected"'; ?>value="Zaghouan">Zaghouan</option>
				   <option <?php  if ($E->getRegion()=="Beja") echo 'selected="selected"' ?> value="Beja">Beja</option>
				   <option <?php  if ($E->getRegion()=="Jandouba") echo 'selected="selected"' ?> value="Jandouba">Jandouba</option>
                   
                   <option <?php  if ($E->getRegion()=="Kef") echo 'selected="selected"';?>value="Kef">Kef</option>
				   <option <?php  if ($E->getRegion()=="Siliana") echo 'selected="selected"'; ?>value="Siliana">Siliana</option>
				   <option <?php  if ($E->getRegion()=="Nabeul") echo 'selected="selected"' ?> value="Nabeul">Nabeul</option>
				   <option <?php  if ($E->getRegion()=="Sousse") echo 'selected="selected"' ?> value="Sousse">Sousse</option>
                   
                   <option <?php  if ($E->getRegion()=="Kairouan") echo 'selected="selected"';?>value="Kairouan">Kairouan</option>
				   <option <?php  if ($E->getRegion()=="Monastir") echo 'selected="selected"'; ?>value="Monastir">Monastir</option>
				   <option <?php  if ($E->getRegion()=="Sfax") echo 'selected="selected"' ?> value="Sfax">Sfax</option>
				   <option <?php  if ($E->getRegion()=="Mahdia") echo 'selected="selected"' ?> value="Mahdia">Mahdia</option>
                   
                   <option <?php  if ($E->getRegion()=="Kasrine") echo 'selected="selected"';?>value="Kasrine">Kasrine</option>
				   <option <?php  if ($E->getRegion()=="Sidi Bouzid") echo 'selected="selected"'; ?>value="Sidi Bouzid">Sidi Bouzid</option>
				   <option <?php  if ($E->getRegion()=="Gafsa") echo 'selected="selected"' ?> value="Gafsa">Gafsa</option>
				   <option <?php  if ($E->getRegion()=="Tozeur") echo 'selected="selected"' ?> value="Tozeur">Tozeur</option>
                   
                   <option <?php  if ($E->getRegion()=="Kebili") echo 'selected="selected"';?>value="Kebili">Kebili</option>
				   <option <?php  if ($E->getRegion()=="Gabes") echo 'selected="selected"'; ?>value="Gabes">Gabes</option>
				   <option <?php  if ($E->getRegion()=="Medinine") echo 'selected="selected"' ?> value="Medinine">Medinine</option>
				   <option <?php  if ($E->getRegion()=="Tataouine") echo 'selected="selected"' ?> value="Tataouine">Tataouine</option>
				</optgroup>
                </select>
                </td>
			  </tr>
			  
			  <tr>
				<td><label>Telephone</label></td>
				<td><input name="Telephone_util" id="Telephone_util" style="height:100%;" type="tel"  value="<?php echo $E->getTelephone(); ?> "/></td>
			  </tr>
			    
			  <tr>
				<td><label>Information</label></td>
                <td>
                <textarea size="50" name="Info" id="Info"><?php echo $E->getInfo(); ?></textarea>	
                </td>
			  </tr>
	  
			  </table>
            <br><br> 		  
			  <input  class="btn btn-success" name="submit" value="Valider" type="submit" style="float:left;" />
			  <input  class="btn btn-info" name="reset" value="Annuler" type="reset" style="float:right;" />
            
		</form>
</fieldset>
     
     </div>
</div>

       
<?php include('footer.php'); ?>
