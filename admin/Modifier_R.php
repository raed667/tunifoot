<?php include('header.php');

require_once("..\Model\ReservationModel.php");
require_once("..\Model\TerrainModel.php");
$Id = $_GET['Id'];
$R=new Reservation("","","",true);
$RM=new ReservationModel();
$R=$RM->RetournerReserv($Id);


$T=new Terrain("",0,0,1,0,0,0,0,0);
$TM=new TerrainModel();
$t=$TM->RetournerTerrain($Id);
?>


	<div class="row-fluid">    
    <div class="span5 offset1">
	    
     <fieldset>
     <legend><h2>Modifier Reservation</h2></legend>
     <form method="get" action="..\control\Modifier_Terrain.php" >

<table id="table_inscri" style="margin-left:auto; margin-right: auto; width:auto;"  border="0">
			  
			  
             
			  
			  
			  
			
              <tr>
				<td><label>Date de la résérvation </label></td>
                <input hidden="hidden" name="Id" id="Id" value="<?php echo $Id?>"/>
				<td><input type="date" name="Date_reserv" id="Date_reserv"  value="<?php echo $R->GetDate_reserv(); ?>"/></td>
			  </tr>
              
			  
			 <tr>
				<td><label>Heure de la résérvation </label></td>
				<td><input name="Heur_reserv" id="Heur_reserv" type="datetime"  value="<?php echo $R-> GetHeur_reserv(); ?> "/></td>
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
			 