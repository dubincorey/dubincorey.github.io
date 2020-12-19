<?php
$to = "crd412@nyu.edu";
$subject = "Hi";
//$subject = "Corey's Website Message From " . $_POST['name'];

$message = "Hi there!";
//$message = $_POST['comment'];

$headers = 'From: <' . $_POST['email'] . "> . \r\n";

mail($to, $subject, $message, $headers);
header('Location: home.php');
exit();
