<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<?php include('head_no_title.php'); ?>
<title>TuniFoot</title>

</head>
<body data-accent="blue">
<?php include('nav_bar.php'); ?>

<!--  s9ala té3 il site : lkol fi lkol 12  offset 1 + body 8 + span1-->

   <div class="row-fluid">
     <div class="span12">
       <div class="row-fluid">
         <div class="span8 offset2">
         

<!--     DEBUT DU BODY     --> 
<br><br>
  <?php include('carrousel.php'); ?>

        <br>        
<!--Debut call to action desktop -->        
<?php 
if(isset($_SESSION['IdU']))
{
		if ($_SESSION['IdU']!=(-1) or $_SESSION['IdP']!=(-1))
  { 
  ?>
  <style>
  #alert_messages
  {
	  
	  box-shadow:inset 0 0 8px #000000;
  }
  .inner_alert_messages
  {
	  margin-left:4px !important;
	  margin-right:14px !important;
	  margin-top:10px !important;
	  margin-bottom:10px !important;
	  background-color: rgba(255, 255, 255, 0);

	/*  background-color:#eeeeee !important;*/
  }
   .inner_alert_messages .message_corp
   {
	   z-index:-50;
	   border:1px solid #999;
	  padding-top:10px;
	  padding-bottom:10px;
	  padding-left:5px;
	  padding-right:5px;
	   width:97%;
margin:10px;
background-color: rgba(255, 255, 255, 0);
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
border-radius: 6px;
   }
   
   .inner_alert_messages .message_texte
   { 
	   margin-left:5px;
   }
   
  .inner_alert_messages .message_corp .icon
  {
	  margin-top:-25px;
	  width:25px;
	  height:25px;
	  break-after:auto;
  }
  .inner_alert_messages.message_texte a:link , a:visited , a:hover ,a:active
   {

text-decoration:none;
color:#CCC;

   }

  
  </style>
  <br>
<br>

  <div class="row-fluid">
     <div class="span12">
    <h1 style="margin-left:25px; font-size:50px;">Annonces</h1>

  <div id="alert_messages" class="hero-unit" style="max-height:250px; padding:0px !important;">
    <div class="inner_alert_messages">
    <div class="row-fluid">
     <div class="span12">
  <?php require_once("..\Model\AnnoncesModel.php");
$An = new AnnonceModel();
$liste = $An->Afficher(); 
 ?>


     <?php foreach ($liste as $Voi): ?>

    <div class="message_corp">
    <img class="icon" src="images/Ribbon.png"> 
 		
           <span class="message_texte">
   	<?php echo($Voi->GetTexte()); ?>
   		</span> 
    
    </div>
    
    <?php endforeach; ?>
    
    
    </div></div>
    
    </div>
   </div>
   
  </div></div>
  
  
  	 </div> </div>

  <?php
  
  }}
  else
  {
	  echo("</div> </div>");
	  include('call_to_action.php');
  }
  ?>
  <br><br>
</div> </div> 
<!--         FIN DU BODY--> 


<style>
html,
body {
	margin:0;
	padding:0;
	height:100%;
}
.ft
{
position:relative ;
bottom :0;
}

.clearfix:after {
	content: ".";
	display: block;
	clear: both;
	visibility: hidden;
	line-height: 0;
	height: 0;
}
 
.clearfix {
	display: inline-block;
}
 
html[xmlns] .clearfix {
	display: block;
}
 
* html .clearfix {
	height: 1%;
}

</style>

<footer  style="width:100%;
	height:auto;
    
	">
   <div class="modal-footer bg-color-darken" >	
 <br>

 <div class="row-fluid  align-center" >
     <div class="span12" style="margin-top:-3%;">
<span class="visible-desktop" >
     <a target="_blank" href="https://www.facebook.com/pages/Tuni-Foot/455213741230227?ref=hl">
 <img id="imgb1" src="images/big_icon_set/Facebook.png" class="align-center" style="width:120px; padding-left:-100px;" /></a>&#160;
 
<a target="_blank" href="https://twitter.com/TuniFooot"> <img id="imgb2" src="images/big_icon_set/Twitter.png" class="align-center" style="width:120px;" /></a>&#160;


<a target="_blank" href="https://www.youtube.com/channel/UCutNT4xEwrcoVkIllwqGRzw"><img id="imgb3" src="images/big_icon_set/YouTube.png" class="align-center" style="width:120px;" /></a>
&#160;
<a target="_blank" href="https://plus.google.com/113806275612441723537/posts?hl=fr&partnerid=gplp0"> <img id="imgb4" src="images/big_icon_set/Google+.png" class="img-circle" style="width:120px;" /></a>

</span>


<span class="hidden-desktop" >
  <a target="_blank" href="https://www.facebook.com/pages/Tuni-Foot/455213741230227?ref=hl">
 <img src="images/big_icon_set/Facebook.png" class="img-circle" style="width:70px;" /></a> &#160; 
<a target="_blank" href="https://twitter.com/TuniFooot"> <img src="images/big_icon_set/Twitter.png" class="img-circle" style="width:70px;" /></a>
&#160;
<a target="_blank" href="https://www.youtube.com/channel/UCutNT4xEwrcoVkIllwqGRzw"> <img src="images/big_icon_set/YouTube.png" class="img-circle" style="width:70px;" /></a>

</span>

</div>
 </div>
<p style="color:#969a9d;  margin-bottom:0px;" class="align-center">
Copyright © 2013 TuniFoot.tn|<wbr/> Powered by ESPRIT(2a4)
</p>

     </div> 
     
   </footer> 
   

   <?php include('en_page_scripts.php'); ?> 
     <script src="js/jquery.nicescroll.js"> </script>

<script>
$(document).ready(
function() {
$("#alert_messages").niceScroll();
}
);
</script>

</body>