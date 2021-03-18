<?php
    require_once("security.inc");
    require_once("../connect.php");
    // Ici on dit si tu trouves l'id tu le récupères jusqu'à 1000 id par requette
    if(isset($_GET["idsup"]) && $_GET["idsup"]< 1000){
        $id = (int)htmlspecialchars(addslashes($_GET["idsup"])); // Cette ligne sert à sécuriser la récupération de l'id

        $req = "SELECT image FROM personne WHERE id_personne =".$id;
        $res = mysqli_query($connexion, $req);
        $data = mysqli_fetch_assoc($res);

        $requete = "DELETE FROM personne WHERE id_personne =".$id;
        $result = mysqli_query($connexion, $requete);

        if(mysqli_affected_rows($connexion) > 0){
            copy("../assets_fichiersStatiques/images/".$data["image"], "../assets_fichiersStatiques/archives/".$data["image"]);
            unlink("../assets_fichiersStatiques/images/".$data["image"]);
            header("location:liste.php");
        }else{
            echo '<div class="">Erreur lors de la suppression</div>';

        }
    }

?>