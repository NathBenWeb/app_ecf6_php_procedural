<?php
    require_once("security.inc");
    require_once("../connect.php");

    if(isset($_GET["idsup"]) && $_GET["idsup"]< 1000){
        $id = (int)htmlspecialchars(addslashes($_GET["idsup"]));

        $req = "SELECT image FROM articles WHERE id_art =".$id;
        $res = mysqli_query($connexion, $req);
        $data = mysqli_fetch_assoc($res);

        $requete = "DELETE FROM articles WHERE id_art =".$id;
        $result = mysqli_query($connexion, $requete);

        if(mysqli_affected_rows($connexion) > 0){
            copy("../assets/images/".$data["image"], "../assets/archives/".$data["image"]);
            unlink("../assets/images/".$data["image"]);
            header("location:liste.php");
        }else{
            echo '<div class="">Erreur lors de la suppression</div>';

        }
    }

?>