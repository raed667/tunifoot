<?PHP session_start();
require_once("../Model/AdministrateurModel.php");
include('header.php'); ?>



<?php 
$admin = new AdministrateurModel();
$a = $admin->afficherAdmin($_SESSION['IdA']);
?>
<h1>Informations Personnelles</h1>
<br>
</br>
<?php 


echo 'Nom:  ' .$a['nom'].'<br /> <br/>';
echo 'Prenom: ' .$a['prenom'].'<br /><br />';
echo 'Login:  ' .$a['login'].'<br /><br />';
 
echo('<br />
<br />
<br />

<a href="Modifier_Admin.php?Id='.$_SESSION['IdA'].'"> Modifier login et mot de passe </a>'); 
?>

<?PHP include('footer.php'); ?>