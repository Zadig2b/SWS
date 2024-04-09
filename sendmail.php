<?php
$to      = 'romain.dugeay@gmail.com';
$subject = 'le sujet';
$message = 'Bonjour ! ça fonctionne !';
$headers = 'From: email@envoi.fr' . "\r\n" .
'Reply-To: email@envoi.fr' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

$test = mail($to, $subject, $message, $headers);

if ($test) {
  echo "le mail a bien été envoyé.";
} else{
  var_dump($test); // reverra la valeur de la fonction mail, probablement false. Aller voir dans ce cas le fichier error.log dans C://wamp/sendmail/
}
?>