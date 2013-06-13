<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<?php include('head_no_title.php'); ?>
<title>Authentification</title>

</head>
<body data-accent="blue">
<?php include('nav_bar.php'); 

if(!isset($_SESSION['IdP']))

 ?>

<!--  s9ala té3 il site : lkol fi lkol 12  offset 1 + body 8 + span1-->

<div class="row-fluid">
   <div class="span12">
      <div class="row-fluid">
         <div class="span2 visible-desktop"></div>
           <div class="span8">
           
<!--     DEBUT DU BODY     --> 
<br><br>
<?php
if(isset($_SESSION['newLogin']))
{
if(($_SESSION['IdP']==-1 and $_SESSION['IdU']==-1) and $_SESSION['newLogin']!=0) 
 	{
		
echo('
    <div class="alert alert-error">
     <button type="button" class="close" data-dismiss="alert"></button>
     <strong>Erreur!</strong> E-mail / Mot de passe incorrect.
   </div>
   ');
		$_SESSION['newLogin']=0;
	}	
}

	

?>
<br><br>

<!--ICI VA LE CONTENU  --> 

<?php
if( isset($_SESSION['newLogin']) and ( isset($_SESSION['IdP']) and isset($_SESSION['IdU']) ))
		{
if($_SESSION['IdP']!=$_SESSION['IdU'])
{
	
$_SESSION['404Message']="Vous étes déjà connecté.";
				echo('
				<script type="text/javascript">
setTimeout(function(){window.location = "../Vue/404.php";}, 0 ); 
</script>');	
}
		}
		
if((isset($_SESSION['Type'])==false) or ($_SESSION['IdP']==(-1) && ($_SESSION['IdU'])==(-1)))
{
	?>
		<div style="position:relative; margin-left:37%; margin-right:auto; max-width:210px;" >
		<h1 style="margin-left:-20px;">FootAcademy</h1><br>


<form name="loginform" id="loginform" action="../Control/Login_approuval.php" method="POST" >
	<p>
		<label for="user_login">E-Mail<br>
		<input required type="text" name="user_login" id="user_login" class="input" value="" size="25"></label>
	</p>
	<p>
		<label for="user_pass">Mot de passe<br>
		<input required type="password" name="user_pass" id="user_pass" class="input" value="" size="25"></label>
	</p>
	
    <!--label for="rememberme" class="checkbox">
    <input desabled class="desabled" name="rememberme" type="checkbox" id="rememberme" value="sometime"> 
    <span class="metro-checkbox"> Remember Me </span> </label-->
    <br>


		<input type="submit" name="submit" id="submit" class="button button-primary button-large btn-block" value="Log In">
  <a  href="inscription.php" class="btn btn-large btn-success btn-block" >Inscription</a>   
	
</form>

<p id="nav">
<a href="#" title="Password Lost and Found">Mot De Passe oublié?</a>
</p>
<p id="backtoblog"><a href="#" title="Are you lost?">← Retour à l'aceuil</a></p>
</div>

<?php
}
?>
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
<?php include('en_page_scripts.php'); ?> 
</body>
</html>