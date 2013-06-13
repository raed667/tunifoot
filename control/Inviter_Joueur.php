<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

mail("TuniFooot@gmail.com", "[TUNIFOOT] Contact Form".$name,
  $message, "From:" . $email);


header("Location: ../vue/Index.php");
?>