<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<?php  include('head_no_title.php'); ?>
<title>404 Not Found</title>


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
<br>

<!--ICI VA LE CONTENU  --> 
<div class="align-center">

<?php 
if(isset($_SESSION['404Message']) and  $_SESSION['404Message']!='')
{
	
echo('
<div class="alert alert-error">
     <button type="button" class="close" data-dismiss="alert"></button>
     <strong>Erreur!</strong> Cette page est inacessible.
   </div>');
}
?>
<h1 class="text-error">404 Not Found</h1>


<?php
$rd= rand(1,4);
$image = '"images/404/'.$rd.'.jpg"';


$rd= rand(1,4);
?>
<img class="img-polaroid image-wrapper" src=<?php echo($image); ?> style="max-height:300px;"/>
<br>

<p class="lead">Ouups ! <wbr>Il semble avoir eu une erreur.. </p>
<?php
if(isset($_SESSION['404Message']))
{ ?>
<div class="page-header"><h1><p class="text-error"> <?php echo($_SESSION['404Message']); $_SESSION['404Message']='';?> </p></h1></div>
<?php } ?>
<br> <p class="lead error">Vous pouvez retourner à  <a class="masthead-links" href="Index.php">l'acceuil</a>, ou bien effectuer une <a class="masthead-links" href="Recherche.php">recherche</a>. </p>
</div>
<!--ICI VA LE CONTENU  --> 
<br><br>
<br>

 

 
			</div>  <!-- FIN SPAN 8--> 
            <div class="span2 visible-desktop"></div>
	     </div> <!-- FIN FLUID ROW--> 
    </div>  <!-- FIN SPAN 12--> 
</div><!-- FIN FLUID ROW--> 

<!-- FIN DU BODY--> 


<?php include('footer.php'); ?>
<?php include('en_page_scripts.php'); ?> 
</body></html>