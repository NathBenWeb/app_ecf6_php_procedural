<?php
$connexion = mysqli_connect("localhost", "root", "");
mysqli_select_db($connexion, "ecf_6");

if(!$connexion){
    echo "Echec de connexion, veuillez rééssayez </br>";
    echo "Code erreur : ".mysqli_connect_errno()." Message Erreur : ".mysqli_connect_error();

    // mysqli_close($connexion); // Pour fermer la connexion
}

?>