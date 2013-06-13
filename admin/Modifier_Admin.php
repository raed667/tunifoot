<?PHP
include('header.php');
require_once("..\model\AdministrateurModel.php");
$Id =$_GET["Id"];
$A=new administrateur("","","","");
$AM=new administrateurModel();

$A=$AM->RetournerAdministrateur($Id);


?>



<div class="row-fluid">    
    <div class="span8 offset1">
	    
    <fieldset>
     <legend><h2>Modifier Login et Mot de passe</h2></legend>
     
     <form method="get" action="..\control\Modifier_Administrateur.php" >
     
   <table id="table_inscri" style="margin-left:auto; margin-right: auto; width:auto;"  border="0">
			  
             
             
			  
			  <tr>
				<td><label>Login</label></td>
                <input hidden="hidden" name="Id" id="Id" value="<?php echo $Id?>"/>
				<td><input type="text" name="Login_Admin" id="Login_Admin" value="<?php echo $A->getLogin(); ?>" /></td>
			  </tr>
			  
			  <tr>
				<td><label>Mot de passe</label></td>
				<td><input type="password" name="PWD_Admin" id="PWD_Admin"  value="<?php echo $A->getPWD() ?>"/></td>
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
