<?php
        $error = "";

    if(isset($_POST['valid'])){
        // Si l'utilisateur a rempli tous les champs
        if(isset($_POST) && !empty($_POST['email']) && !empty($_POST['pass'])){
            // filter_var = à préciser si l'input de l'email est en type text pour le convertir en email
            // FILTER_VALIDATE_EMAIL = Ca doit valider le format email
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                // Va permettre de filter une donnée
                 $error = '<div class="alert alert-danger text-center">Votre email n\'est pas valide</div>';
            }else if(!preg_match("/[A-Za-z]{8,}/", $_POST['pass'])){
                $error = '<div class="alert alert-danger text-center">Votre mot de passe n\'est pas valide</div>';
            }else{
                $email = htmlspecialchars(addslashes(trim($_POST['email'])));
                $pass = htmlspecialchars(addslashes(trim($_POST['pass'])));

                // header + attribut "location" + page de redirection = Pour rediriger l'utilisateur vers une autre page, ici après la connexion
                // Cette fonction est utilisable pour toutes redirection même hors formulaire de connexion
                // ?email = $email demande à afficher dans l'url l'adresse email de l'utilisateur
                // !!! Ne jamais mettre de echo avant le header("location") ou ne jamais le mettre après un html dans les versions antérieures à la version 8 de PHP car ne fonctionne pas
                header("location:liste.php?email=$email");

                echo "Email: $email, Mot de passe: $pass";
            }
            
        }else{
            $error = '<div class="alert alert-danger text-center">Les champs email et mot de passe sont requis</div>';
        }
    }

?>
<?php require_once("../partials/header.php")?>
<div class="container">
    <h2 class="text-center mb-5 mt-5">Connectez-vous à votre compte</h2>
    <?= $error;?>
    <div class="offset-3 col-6 ">
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email addresse*</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Mot de passe*</label>
                <input type="password" class="form-control" id="pass" name="pass">
            </div>
            <button type="submit" class="btn btn-dark text-white col-12" name="valid" >Valider</button>
        </form>
    </div>
</div>
<?php require_once("../partials/footer.php")?>