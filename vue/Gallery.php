<?php
require_once("..\Model\TerrainModel.php");
$IdT = htmlspecialchars($_GET["IdT"]);
$IdP = htmlspecialchars($_GET["IdP"]);
$TM=new TerrainModel();
$T=$TM->RetournerTerrain($IdT);
?>

<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="fr"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="fr"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->

<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Fredoka+One|Open+Sans:400,700' rel='stylesheet' type='text/css'>
<head>
<?php include('head_no_title.php'); ?>
<title></title>

</head>
<body data-accent="blue">
<?php include('nav_bar.php'); ?>

<!--  s9ala té3 il site : lkol fi lkol 12  offset 1 + body 8 + span1-->

<div class="row-fluid">
   <div class="span12">
      <div class="row-fluid">
         <div class="span2 visible-desktop"></div>
           <div class="span8">
<!--     DEBUT DU BODY     --> 
<br><br><br><br>

<!--ICI VA LE CONTENU  --> 
<legend><h1>Gallerie de photos de <?php echo $T->GetNom_ter();?></h1></legend>
<div class="section" id="example">
  <div class="imageRow">
  	<div class="set">
  	  <div class="single first">
<?php 
if (file_exists('../control/uploads/Terrains/imgTerrain'.$IdT.'_1'.".jpg"))
{
			if(isset($_SESSION['IdP']))
			{
			if($_SESSION['IdP'] == $IdP && ($_SESSION['IdU'] == -1))
			echo('<a href="../control/Supprimer_imgTerrain.php?IdT='.$IdT.'&Num=1"><i class="icon-remove"></i></a>');
			}
echo ('<a href="../control/uploads/Terrains/imgTerrain'.$IdT.'_1'.'.jpg  " rel="lightbox['.$IdT.']"><img src="../control/uploads/Terrains/imgTerrain'.$IdT.'_1'.'.jpg" style="width:150px; height:150px;"></a> ');
}?>
	  </div>
      <div class="single">
<?php 
if (file_exists('../control/uploads/Terrains/imgTerrain'.$IdT.'_2'.".jpg")) 
{
			if(isset($_SESSION['IdP']))
			{
			if($_SESSION['IdP'] == $IdP && ($_SESSION['IdU'] == -1))
			echo('<a href="../control/Supprimer_imgTerrain.php?IdT='.$IdT.'&Num=1"><i class="icon-remove"></i></a>');
			}
echo ('<a href="../control/uploads/Terrains/imgTerrain'.$IdT.'_2'.'.jpg  " rel="lightbox['.$IdT.']"><img src="../control/uploads/Terrains/imgTerrain'.$IdT.'_2'.'.jpg" style="width:150px; height:150px;"></a> ');
}?>
	  </div>
      <div class="single">
<?php 
if (file_exists('../control/uploads/Terrains/imgTerrain'.$IdT.'_3'.".jpg"))
{
			if(isset($_SESSION['IdP']))
			{
			if($_SESSION['IdP'] == $IdP && ($_SESSION['IdU'] == -1))
			echo('<a href="../control/Supprimer_imgTerrain.php?IdT='.$IdT.'&Num=1"><i class="icon-remove"></i></a>');
			}
echo ('<a href="../control/uploads/Terrains/imgTerrain'.$IdT.'_3'.'.jpg  " rel="lightbox['.$IdT.']"><img src="../control/uploads/Terrains/imgTerrain'.$IdT.'_3'.'.jpg" style="width:150px; height:150px;"></a> ');
}?>
	  </div>
      <div class="single">
<?php 
if (file_exists('../control/uploads/Terrains/imgTerrain'.$IdT.'_4'.".jpg"))
{
			if(isset($_SESSION['IdP']))
			{
			if($_SESSION['IdP'] == $IdP && ($_SESSION['IdU'] == -1))
			echo('<a href="../control/Supprimer_imgTerrain.php?IdT='.$IdT.'&Num=1"><i class="icon-remove"></i></a>');
			}
echo ('<a href="../control/uploads/Terrains/imgTerrain'.$IdT.'_4'.'.jpg  " rel="lightbox['.$IdT.']"><img src="../control/uploads/Terrains/imgTerrain'.$IdT.'_4'.'.jpg" style="width:150px; height:150px;"></a> ');
}?>
	  </div>
      <div class="single last">
<?php 
if (file_exists('../control/uploads/Terrains/imgTerrain'.$IdT.'_5'.".jpg"))
{
			if(isset($_SESSION['IdP']))
			{
			if($_SESSION['IdP'] == $IdP && ($_SESSION['IdU'] == -1))
			echo('<a href="../control/Supprimer_imgTerrain.php?IdT='.$IdT.'&Num=1"><i class="icon-remove"></i></a>');
			}
echo ('<a href="../control/uploads/Terrains/imgTerrain'.$IdT.'_5'.'.jpg  " rel="lightbox['.$IdT.']"><img src="../control/uploads/Terrains/imgTerrain'.$IdT.'_5'.'.jpg" style="width:150px; height:150px;"></a>');
}?>
	  </div>
    </div>
  </div>
  
<?php 
if ((file_exists('../control/uploads/Terrains/imgTerrain'.$IdT.'_1'.".jpg")==0 && file_exists('../control/uploads/Terrains/imgTerrain'.$IdT.'_2'.".jpg")==0)&& (file_exists('../control/uploads/Terrains/imgTerrain'.$IdT.'_3'.".jpg")==0 && file_exists('../control/uploads/Terrains/imgTerrain'.$IdT.'_4'.".jpg")==0)&& file_exists('../control/uploads/Terrains/imgTerrain'.$IdT.'_5'.".jpg")==0) 
{
echo('<p class="lead text-info">Ce terrain ne possède pas encore de photos</p><br><br><br>');
}
else
if(isset($_SESSION['IdP']))
	if(($_SESSION['IdP'])==-1)
	{
?>
<center> 
 <button id="up<?php echo $IdT; ?>" class="jaime" style="width:-10px; margin-bottom:-10px; margin-top:-10px; padding:0,0,0,0; background-color:#F5F5F5; color:#999; "><i class="icon-thumbs-up"></i> J'aime</button> 

<button id="dw<?php echo $IdT; ?>" class="jaimepas" style="width:-10px; margin-bottom:-10px; margin-top:-10px; padding:0,0,0,0; background-color:#F5F5F5; color:#999; "><i class="icon-thumbs-down"></i> Je n'aime pas</button> 
 </center>
 
 <center>
 <div id="pb<?php echo $IdT; ?>" hidden="true" ></div>
 </center>
<?php } ?>
<br>
<a href="javascript:history.back()"><i class="icon-arrow-left"></i>Retour</a>
</div>

<!--ICI VA LE CONTENU  --> 

<?php 
	if (isset($_GET['S']) and $_GET['S']==1) {
	?>    
<input type="checkbox" id="afficher_dialog" checked hidden="true"  />
<?php
	} 
	else {	}
 ?>

<br><br>
<br>
<br>
<br>
<br>
	</div>  <!-- FIN SPAN 8--> 
            <div class="span2 visible-desktop"></div>
	     </div> <!-- FIN FLUID ROW--> 
    </div>  <!-- FIN SPAN 12--> 
</div><!-- FIN FLUID ROW--> 

<div id="dialog" title="Photo supprimée">
<br>
			<h4><p>Photo supprimée !</p></h4>
		</div>

<!-- FIN DU BODY--> 

<?php include('footer.php'); ?>
<?php include('en_page_scripts.php'); ?>
<script src="js/lightbox.js"></script>

<script type="text/javascript" language="javascript">

function progbar(type,id)
{
	
	if(window.XMLHttpRequest)
	{
		xhr = new XMLHttpRequest();
	}
	
	xhr.onreadystatechange = function()
	{
		if((xhr.readyState == 4) && (xhr.status  == 200))
		
		{	
		document.getElementById('pb'+id).innerHTML =xhr.responseText;
		
		
		}};
xhr.open('GET','../control/setlikes_dislikes_Gallery.php?type='+type+'&IdT='+id,true);
xhr.send(null);
}

 $('.jaime').click(function () {
	 var idup = $(this).attr('id');
	 var id ="";
	// alert (idup.length);
	 for (var i = 2; i<idup.length; i++)
	  {
		  id+=idup[i];
	  }
	 var progressid = 'pb'+id;
	  $(this).hide();
	  $('#dw'+id).hide();
	  progbar('jaime',id);
	$('#'+progressid).show();
	
		        });
				
		
 $('.jaimepas').click(function () {
	 var idup = $(this).attr('id');
	 var id ="";
	 for (var i = 2; i<idup.length; i++)
	  {
		  id+=idup[i];
	  }
	 var progressid = 'pb'+id;
	  $(this).hide();
	  $('#up'+id).hide();
	  progbar('jaimepas',id);
	$('#'+progressid).show();
	
		        });
</script>
<!--////////////////////////////////////////////////////////CSS Dialog///////////////////////////////////////////////////////////////////////////-->
<link type="text/css" href="css/jquery-ui.css" rel="stylesheet" />	
		<style type="text/css">
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
			#verticalSliders{height:140px;padding-top:20px;}
            #verticalSliders > div{float:left;margin:20px;}
		</style>

		
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js" type="text/javascript"></script>

        <script type="text/javascript">
/*  fonction qui active les tabs dans les liens */
			$(document).ready(function(){
				$('a[href="' + window.location.hash + '"]').click()
			});	
				
					///////////////////////////////////////////Script Dialog/////////////////////////
						
		$(function () {

		        // Dialog			
		        

		        // Dialog			
		        $('#dialog').dialog({
		            autoOpen: false,
		            width: 600,modal:true,
		           					
		        });

	if($('#afficher_dialog').length>0)
{
	 $('#dialog').dialog('open');
}
});
		</script>
</body>
</html>
