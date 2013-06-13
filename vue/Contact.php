<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<?php include('head_no_title.php'); ?>
<title>Contact</title>

</head>
<body data-accent="blue">
<?php include('nav_bar.php'); ?>
<div style="margin-top:1%;"> </div>
<!--  s9ala té3 il site : lkol fi lkol 12  offset 1 + body 8 + span1-->

<div class="row-fluid">
   <div class="span12">
      <div class="row-fluid">
         <div class="span2 visible-desktop"></div>
           <div class="span8">
<!--     DEBUT DU BODY     --> 
<br><br><br>
<br>


<!--ICI VA LE CONTENU  --> 

 <ul class="nav nav-tabs">
     <li class="active"><a href="#form" data-toggle="tab"><i class="icon-email"></i> Message</a></li>
     <li><a href="#adresse" data-toggle="tab"><i class="icon-address"></i> Adresse</a></li>
   </ul>
   
   <div class="tab-content">
   
     <div class="tab-pane active" id="form">
     <!-- Debut du tab MESSAGES-->     
     <div class="row-fluid visible-desktop">
    <div class="span12">
    
    <div class="row-fluid">
    <form name="contact_form" method="post" action="../control/envoyez_mail_contact.php">
    <fieldset>
    <div class="span3">
    
     
       <legend>CONTACTEZ NOUS</legend>
      <label>Nom</label>
       <input type="text" required name="name"  placeholder="Votre Nom…">
       <label>E-mail</label>
       <input type="email" required name="email" id="inputEmail" placeholder="Votre E-mail…"><br>

    </div>
    
    <div class="span8 offset1">
    <legend style="visibility:collapse;">CONTACTEZ NOUS</legend>

    <label>Votre Message</label>
    <textarea name="message" cols='10000' rows='4' style="resize: none; width:100%;" required  placeholder="Tapez Votre Message…"></textarea>
    <br>
              <button style="float:right;" type="submit" class="btn">Envoyer <i class="icon-check-alt"></i></button>
<div style="clear:both;"> </div>
    </div>
    </fieldset>
    </form>
    </div>
    
    </div>
    </div>
    
    
         <div class="row-fluid hidden-desktop">
    <div class="span12 align-center">
    
    <div class="row-fluid">
    <form name="contact_form" method="post" action="../control/envoyez_mail_contact.php">
    <fieldset>
    <div class="span3">
    
     
       <legend>CONTACTEZ NOUS</legend>
      <label>Nom</label>
       <input type="text" required name="name"  placeholder="Votre Nom…">
       <label>E-mail</label>
       <input type="email" required name="email" id="inputEmail" placeholder="Votre E-mail…"><br>

    </div>
    
    <div class="span8 offset1">
    <legend style="visibility:collapse;">CONTACTEZ NOUS</legend>

    <label>Votre Message</label>
    <textarea name="message" cols='1000' rows='4' style="resize: none; width:97%;" required  placeholder="Tapez Votre Message…"></textarea>
    <br>
              <button type="submit" class="btn btn-large">Envoyer <i class="icon-check-alt"></i></button>
<div style="clear:both;"> </div>
    </div>
    </fieldset>
    </form>
    </div>
    
    </div>
    </div>
    
    
     <!-- Fin du tab MESSAGES-->
     
     </div>
     
     
     <div class="tab-pane" id="adresse">
     
           <!-- Debut du tab adresse-->     
<div class="row-fluid">
    <div class="span12">
     
<iframe width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.tn/maps?f=q&amp;source=s_q&amp;hl=fr&amp;q=Esprit&amp;aq=&amp;sll=36.899254,10.189197&amp;sspn=0.009318,0.021136&amp;t=h&amp;ie=UTF8&amp;filter=0&amp;st=113974331175464399924&amp;rq=1&amp;ev=zi&amp;split=1&amp;radius=0.7&amp;hq=Esprit&amp;hnear=&amp;cid=7510661354082849623&amp;ll=36.90344,10.187502&amp;spn=0.032945,0.054932&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.tn/maps?f=q&amp;source=embed&amp;hl=fr&amp;q=Esprit&amp;aq=&amp;sll=36.899254,10.189197&amp;sspn=0.009318,0.021136&amp;t=h&amp;ie=UTF8&amp;filter=0&amp;st=113974331175464399924&amp;rq=1&amp;ev=zi&amp;split=1&amp;radius=0.7&amp;hq=Esprit&amp;hnear=&amp;cid=7510661354082849623&amp;ll=36.90344,10.187502&amp;spn=0.032945,0.054932&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left"></a></small>

     
     </div>
     </div>
		 <!-- Debut du tab adresse-->  
     
     
     </div>
 </div>
  
 
			</div>  <!-- FIN SPAN 8--> 
            
	     </div> <!-- FIN FLUID ROW--> 
         <div class="span2 visible-desktop"></div>
    </div>  <!-- FIN SPAN 12--> 
</div><!-- FIN FLUID ROW--> 

<!-- FIN DU BODY--> 
<br>
<br>
<br>


<?php include('footer.php'); ?>
<?php include('en_page_scripts.php'); ?> 
</body>