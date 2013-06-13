<?php

require_once("..\Entite\Utilisateurs.php");
require_once("..\Model\UtilisateursModel.php");
require_once("..\Model\TerrainModel.php");
require_once("..\Model\ReservationModel.php");
require_once("..\Model\ProprietaireModel.php");


//error_reporting(E_ALL ^ E_NOTICE);

$Id = htmlspecialchars($_GET["IdU"]);
$IdP = htmlspecialchars($_GET["IdP"]);
$IdR = htmlspecialchars($_GET['IdR']);
$IdT = htmlspecialchars($_GET['IdT']);
$EM=new EntrepriseModel();
$E=$EM->RetournerUtilisateur($Id);
$PM=new ProprietaireModel();
$P=$PM->RetournerProp($IdP);
$RM=new ReservationModel();
$R=$RM->RetournerReserv($IdR);
$TM=new TerrainModel();
$T=$TM->RetournerTerrain($IdT);
?>

<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="fr"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="fr"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
<?php include('head_no_title.php'); ?>

<title><?php echo($E->getPrenom().' '.$E->getNom());?></title>


</head>
<body data-accent="blue">
<span class="noPrint">
<?php include('nav_bar.php'); ?>
</span>
<!--  s9ala té3 il site : lkol fi lkol 12  offset 1 + body 8 + span1-->

<div class="row-fluid">
   <div class="span12">
      <div class="row-fluid">
         <div class="span2 visible-desktop"></div>
           <div class="span8">
<!--     DEBUT DU BODY     --> 
<span class="noPrint">

<br><br><br>
</span>

<!--ICI VA LE CONTENU  -->

<style>
		a .calendar
		 {
		height:15px;
		margin-top:-20px; 
		 }
		 </style>
         
<span class="span4" style="margin-left:4px;">
<legend><h1 style="font-weight:normal !important;">Réservation: </h1></legend>
</span>

<span class="span12" style="margin-left:4px;">	    
    
    <style>
	.lien_menu
	{
		color:black;
		text-shadow: 1px 1px #333;
	}
	a.lien_menu:hover
	{ 
		color:black;
		text-shadow: 1px 1px #999999;
	}
	
	
	@media print {
    * { background: transparent !important; color: black !important; text-shadow: none !important; filter:none !important;
    -ms-filter: none !important; } /* Black prints faster: sanbeiji.com/archives/953 */
    p a, p a:visited { color: #444 !important; text-decoration: underline; }
    p a[href]:after { content: " (" attr(href) ")"; }
    abbr[title]:after { content: " (" attr(title) ")"; }
    .ir a:after, a[href^="javascript:"]:after, a[href^="#"]:after { content: ""; }  /* Don't show links for images, or javascript/internal links */
    pre, blockquote { border: 1px solid #999; page-break-inside: avoid; }
    thead { display: table-header-group; } /* css-discuss.incutio.com/wiki/Printing_Tables */
    tr, img { page-break-inside: avoid; }
    @page { margin: 0.5cm; }
    p, h2, h3 { orphans: 3; widows: 3; }
    h2, h3{ page-break-after: avoid; }
    .hide-on-print { display: none !important; }
    .print-only { display: block !important; }
	tr {page-break-inside: avoid;}
	 .noPrint { 
          display: none; 
          } 

}

	</style> 
    
    <h3><img class="calendar" src="content/img/png/glyphicons_045_calendar.png" /> <?php echo(" "); $Date_reserv=$R->GetDate_reserv(); echo($Date_reserv[8].$Date_reserv[9].$Date_reserv[4].$Date_reserv[5].$Date_reserv[6].$Date_reserv[4].$Date_reserv[0].$Date_reserv[1].$Date_reserv[2].	    $Date_reserv[3]); ?> à <wbr> <?php echo (sprintf ("%02u",$R->GetHeur_reserv()).':00'); ?> H <wbr>  au sein de <wbr><?php echo('<a class="lien_menu" href="../Vue/Proprietaire.php?Id='.$IdP.'">'.$P->getNom_du_Complexe().'  - '.$T->GetNom_ter().'</a>');?><br><br><img class="calendar" src="content/img/png/glyphicons_003_user.png"/> <?php if($EM->ExisteJoueur($Id)==1) echo('<a <a class="lien_menu" href="../Vue/Joueur.php?Id='.$Id.'"> '.$E->getPrenom().' '.$E->getNom().' </a>'); if($EM->ExisteEntreprise($Id)==1) echo('<a class="lien_menu" href="../Vue/Entreprise.php?Id='.$Id.'"> '.$E->getPrenom().' '.$E->getNom().' </a>'); ?></h3>

</span>
  
    <div class="row-fluid" style="margin-left:15%;">
    <span class="span8">
<legend><p style="clear:both; font-size:20px; margin-left:30px; margin-top:35px;">Informations sur la réservation: </p></legend>
	</span>
<!--//////////////////////////////////////////////////////////////Info Joueur//////////////////////////////////////////////////////////////////////////-->
<div class="span5">                 
    <fieldset>	
	<br>
    <h4><img id="PPimg" src="<?php if ($EM->ExisteJoueur($Id))
			{
			if (file_exists('../control/uploads/imgJoueur'.$Id.".jpg"))
			echo('../control/uploads/imgJoueur'.$Id.".jpg");
			else 
			echo('images/reason1.png');
			}
				 	if ($EM->ExisteEntreprise($Id)) 
					{
						if (file_exists('../control/uploads/imgEntreprise'.$Id.".jpg"))
				 			echo('../control/uploads/imgEntreprise'.$Id.".jpg"); 
						else 
							echo('images/reason2.png');
					}
				 ?>" class="img-polaroid" style="height:80px; width:80px;"></h4>         
<span class="span1 hidden-desktop"></span>
<br>

           <table>
             <tr>
				<td><div><h4>Réservation faite par <?php if($EM->ExisteJoueur($Id)==1) echo('<a href="../Vue/Joueur.php?Id='.$Id.'"> '.$E->getPrenom().' '.$E->getNom().' </a>'); if($EM->ExisteEntreprise($Id)==1) echo('<a href="../Vue/Entreprise.php?Id='.$Id.'"> '.$E->getPrenom().' '.$E->getNom().' </a>'); ?></h4></div></td>
             </tr>
             
              <tr>
				<td><div><h4><i class="icon-map"></i> Adresse <a href="https://maps.google.tn/maps?hl=fr&q=<?php echo $E->getResidence();echo $E->getRegion(); ?>+google+map&bav=on.2,or.r_qf.&biw=1366&bih=667&um=1&ie=UTF-8&sa=N&tab=wl&authuser=0"><?php echo $E->getResidence();echo(","); echo $E->getRegion(); ?></a></h4></div></td>
			  </tr>
			  
			  <tr>
				<td><div><h4><i class="icon-phone-2"></i> Telephone <?php echo(" "); echo $E->getTelephone(); ?></h4></div></td>
			  </tr>
                
                <tr>
                <td>
                </td>
                </tr>
                
              <tr>																									 
                <td><a class="btn btn-success noPrint" href="javascript:window.print()"><i class="icon-printer"></i> Imprimer la page</a></td>
              </tr>
               
              </table>   
         </fieldset>
	
	<?php
	$url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	?>
    		<br>
    
	<i class="icon-link noPrint" style="margin-top:-3px;"></i> <input name="type" class="noPrint" style="@media print { display:none;}" type="text" id="type" value="<?php $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; echo $url; ?>" /> 
        	
</div>

<!--//////////////////////////////////////////////////////////////Fin Info Joueur//////////////////////////////////////////////////////////////////////////-->
<span class="span2 hidden-desktop"></span>
<!--//////////////////////////////////////////////////////////////Info Proprietaire/////////////////////////////////////////////////////////////////////-->
<div style="margin-bottom:0;" class="span5">                 
    <fieldset>	
	<br>
    <h4><img id="PPimg" src="<?php if (file_exists('../control/uploads/imgJoueur'.$Id.".jpg"))
	 echo('../control/uploads/imgProprietaire'.$IdP.".jpg");
	 else echo('images/reason3.png');

	 ?>" class="img-polaroid" style="height:80px; width:80px;"></h4>
	<span class="span1 hidden-desktop"></span>
    <br>
           <table>
             <tr>
			<td><div><h4>Géré par <?php echo('<a href="../Vue/Proprietaire.php?Id='.$IdP.'"> '.$P->getPrenom().' '.$P->getNom().' </a>'); ?></h4></div></td>
             </tr>
             
              <tr>
				<td><div><h4><i class="icon-map"></i> Adresse <a href="https://google.com"/><?php echo $P->getResidence();echo(",");echo $P->getRegion(); ?></h4></div></td>
			  </tr>
			  
			  <tr>
				<td><div><h4><i class="icon-phone-2"></i> Telephone <?php echo(" "); echo $P->getTelephone(); ?></h4></div></td>
			  </tr>
				
                <?PHP   
	    $host = $_SERVER['HTTP_HOST'];
		$self = $_SERVER['PHP_SELF'];
		$query = $_SERVER['QUERY_STRING'];
		$url = "http://$host$self?$query" ;

//This is the URL you want to shorten
		$longUrl = $url;
		$apiKey = 'AIzaSyAtdrWJ8MOaxzqpY9zcdERn8E1gLor0ggM';
//Get API key from : http://code.google.com/apis/console/

		$postData = array('longUrl' => $longUrl, 'key' => $apiKey);
		$jsonData = json_encode($postData);

		$curlObj = curl_init();

		curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url');
		curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlObj, CURLOPT_HEADER, 0);
		curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
		curl_setopt($curlObj, CURLOPT_POST, 1);
		curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);

		$response = curl_exec($curlObj);

//change the response json string to object
		$json = json_decode($response);
		curl_close($curlObj);

    	$size          = "150x150";
    	$content       =  $json->id;
    	$correction    = strtoupper("H");
    	$encoding      = "UTF-8";
     
    //3
    $rootUrl = "https://chart.googleapis.com/chart?cht=qr&chs=$size&chl=$content&choe=$encoding&chld=$correction";
     
    //4
    	echo '<tr><td><img src="'.$rootUrl.'"></td></tr>';
				?>
              
              </table>   
         </fieldset>
</div>
<!--//////////////////////////////////////////////////////////////Fin Info Proprietaire/////////////////////////////////////////////////////////////////-->

    <!--ICI VA LE CONTENU  --> 

				</div><!-- FIN FLUID ROW--> 
			</div>  <!-- FIN SPAN 8--> 
            <div class="span2 visible-desktop"></div>
	     </div> <!-- FIN FLUID ROW--> 
    </div>  <!-- FIN SPAN 12--> 
</div><!-- FIN FLUID ROW--> 
<span class="noPrint">
<!-- FIN DU BODY--> 
<br><br><br><br>
<?php include('footer.php'); ?> </span>
<?php include('en_page_scripts.php'); ?> 
</body>
</html>