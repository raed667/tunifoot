<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<?php include('head_no_title.php'); ?>
<title>Chat</title>
  <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="css/themes/default/jquery.phpfreechat.css" />
    <script src="js/jquery.phpfreechat.js" type="text/javascript"></script>


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

<div id="mychat"><a href="http://www.phpfreechat.net">Creating chat rooms everywhere - phpFreeChat</a></div>


<script type="text/javascript">
  $('#mychat').phpfreechat({ serverUrl: '../server' });
</script>
<script type="text/javascript">

$(document).ready(function(){
  
document.getElementsByName('login').item(0).value='test';
document.getElementsByName('login').item(1).value='test';

});


</script>



<!--ICI VA LE CONTENU  --> 
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

<!-- FIN DU BODY--> 


<?php include('footer.php'); ?>
<?php //include('en_page_scripts.php'); ?> 
</body>
</html>