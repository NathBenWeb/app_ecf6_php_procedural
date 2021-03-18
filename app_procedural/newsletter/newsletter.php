<?php
require_once("../connect.php");
$error = "";

$requete = "SELECT email FROM personne";
$result = mysqli_query($connexion, $req);
$compteur = 1;

while($r = mysqli_fetch_assoc($result)){
    $e_mail = $r["email"];
}

$from = "From: hello <newsletter@monsite.ext>\n Mime-Version:";
$to = "nathaliebendavidweb@gmail.com";
$subject = "Test envoi newsletter";
$message = header("location:newsletter_contenu.php?email=$e_mail");
$headers = "From: nathaliebendavidweb@gmail.com"."\n".
"Reply-To: nathaliebendavidweb@gmail.com"."\r\n".
"MIME-Version: 1.0"."\n";

if(mail($to, $subject, $message, $headers)){
    echo $message;
}else{
    echo "Echec d'envoi";
}

?>