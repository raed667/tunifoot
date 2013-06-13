<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="fr"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="fr"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
<?php include('head_no_title.php');

require_once('..\Entite\Reservation.php');
require_once("..\Model\ReservationModel.php");
require_once("..\Model\TerrainModel.php");
 ?>

<title>Payement</title>
<link rel="stylesheet" href="css/demo.css">
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
<?php 
$IdR = $_GET['IdR'];
if(isset($_GET['IdT']))
$IdT = ($_GET['IdT']);
else 
$IdT = $_SESSION['IdT'];

if(!isset($_GET['IdT']))
{
$_SESSION['404Message']= 'Veilliez respecter la porcedure du payement.';

echo('<script type="text/javascript">
setTimeout(function(){window.location = "../Vue/404.php";}, 0 ); </script>'  ); }

//echo($IdR);

$RM =new ReservationModel();

$TM = new TerrainModel();
$T = $TM->RetournerTerrain($IdT);
$argent = $T->GetTarif_ter();

?>

<!--ICI VA LE CONTENU  --> 

 <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-12777986-11']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>


<div class="row-fluid">
   <div class="span12">
   
		<div class="demo row-fluid">
            <div class="numbers span5">
                <p>Essayez quelques-unes de ces numéros:</p>

                <ul class="list">
                    <li>4000000000000002</li>
                    <li>4026000000000002</li>
                    <li>501800000009</li>
                    <li>5100000000000008</li>
                    <li>6011000000000004</li>
                </ul>
            </div>

<style>
#mastercard
{-webkit-box-shadow:0 1px 3px #bbb;-moz-box-shadow:0 1px 3px #bbb;box-shadow:0 1px 3px #bbb;background:-webkit-gradient(linear,left top,left bottom,from(#fff),to(#f5f5f5));background:-webkit-linear-gradient(#fff,#f5f5f5);background:-moz-linear-gradient(#fff,#f5f5f5);background:-ms-linear-gradient(#fff,#f5f5f5);background:-o-linear-gradient(#fff,#f5f5f5);background:linear-gradient(#fff,#f5f5f5);background-color:#f8f8f8;border:5px solid #fff;margin:0 auto 32px;padding:12px 24px 24px;width:287px}
#mastercard label{color:#555;display:block;font-size:14px}
#mastercard label small{color:#aaa;font-size:11px;line-height:11px;text-transform:uppercase}
</style>

			<span style="float:left;" class="span5">
            <form id="mastercard">
                <h2>Détails de paiement</h2>
<br>
                <ul>
                    <li>
                        <ul class="cards">
                            <li class="visa">Visa</li>
                            <li class="visa_electron">Visa Electron</li>
                            <li class="mastercard">MasterCard</li>
                            <li class="maestro">Maestro</li>
                            <li class="discover">Discover</li>
                        </ul>
                    </li>

                    <li>
                        <label for="card_number" >Card number</label>
                        <input type="text" onKeyDown="test()" required name="card_number" id="card_number" class >
                    </li>

                    <li class="vertical">
                        <ul>
                            <li>
                                <label for="expiry_date">Expiry date <small>mm/yy</small></label>
                                <input type="text" name="expiry_date" id="expiry_date" maxlength="5">
                            </li>

                            <li>
                                <label for="cvv">CVV</label>
                                <input type="text" name="cvv" id="cvv" maxlength="3">
                            </li>
                        </ul>
                    </li>

                    <li class="vertical maestro">
                        <ul>
                            <li>
                                <label for="issue_date">Issue date <small>mm/yy</small></label>
                                <input type="text" name="issue_date" id="issue_date" maxlength="5">
                            </li>

                            <li>
                                <span class="or">or</span>
                                <label for="issue_number">Issue number</label>
                                <input type="text" name="issue_number" id="issue_number" maxlength="2">
                            </li>
                        </ul>
                    </li>

                    <li>
                        <label for="name_on_card">Name on card</label>
                        <input type="text" name="name_on_card" id="name_on_card">
                    </li>
                </ul>
            </form>
            </span>
        </div>
<div class="clearfix"></div>
<div class="hero-unit align-center" style="margin-top:1%"  >
<h2>Vous avez <?php echo $argent; ?> dt à payer.</h2>
<br>
<form name="myForm" method="post" action="../control/Inserer_Payement.php?IdR=<?php echo ($IdR.'&IdU='.$_SESSION['IdU'].'&Type='.$_SESSION['Type']);?>">
       <a><button disabled="disabled"  type="submit" class="btn" id="btnReserv" style="width:100%; height:100%; background-color:#5ab75c; padding-bottom:1%; "><h2 style="color:#FFF; font-size:50px; padding:1%;" >Payer</h2></button></a>
</form>
<br>
 <a href="Joueur.php?Id=<?php echo($_SESSION['IdU']); ?>" ><button class="btn" id="btnReserv2"  style="width:70%; height:70%; padding-bottom:1%; "><h2>Plus tard</h2></button></a>

		</div>
		
		
		</div>
	</div>
</div>

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

<script language="javascript">
function test()
{
  if($('#card_number').hasClass("valid")==false)
  {
	  $('#btnReserv').attr("disabled", "disabled");
  }
  else
  {
	  	  $('#btnReserv').removeAttr("disabled"); 

  }
  
/*$(document).ready(function(){
		  alert('test1');
});*/
}
</script>

<script src="js/jquery.creditCardValidator.js" type="text/javascript"></script>
<script src="js/demo.js" type="text/javascript"></script>

</body>
</html>