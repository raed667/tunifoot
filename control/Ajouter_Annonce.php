<?php
$Texte = $_POST["annonce_texte"];
$tw = $_POST["shrTwitter"];
require_once("..\Model\AnnoncesModel.php");
require_once ('..\admin\twitter\twitter.class.php');

$An = new AnnonceModel(); 
$An->Ajouter($Texte);
if($tw == "Twitter")
{$twitter = new Twitter('eVbQPOYrweFNPH9TDwaog' , 'oXIJnmKW7vjDJZArYVEXqnoDCcTlrwougrUBvMkdqdE', '1425587977-nsQnGzzVztLCIvHcGSYqKGls2aGxXoZoALmIIrg', 'fpKA1GNGRKFgTBlvlb0OQ77Kjujr3CE7W9GIusZqz7A');


	if (!$twitter->authenticate()) {
		die('Invalid name or password');
	} else
	{
	$status = $twitter->send($Texte);

echo $status ? 'OK' : 'ERROR';
	}
}

$url = $_SERVER['HTTP_REFERER'];
header('location:'.$url);
?>
