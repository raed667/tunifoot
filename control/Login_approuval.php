<?php
require_once("../Configuration.php");
require_once("../Model/LoginModel.php");

$Conf=new Configuration();
$Conf->connexion();

$Log = array_key_exists('user_login', $_POST) ? $_POST['user_login'] : null;
$Pwd = array_key_exists('user_pass', $_POST) ? $_POST['user_pass'] : null;
if(isset($Log) && isset($Pwd))

$_SESSION['login']=mysql_real_escape_string($Log);
//echo($_SESSION['login']);
$L = new Login(mysql_real_escape_string($Log),mysql_real_escape_string($Pwd));
$LM = new LoginModel();
$LM->log($L);

?>