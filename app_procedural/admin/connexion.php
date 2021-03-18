<?php
    require_once("../connect.php");

    $error = "";

    if(isset($_POST['valid'])){
        if(!empty($_POST['login']) && !empty($_POST['pass'])){
            $login = trim(htmlentities(addslashes($_POST['login'])));
            $pass = md5(trim(htmlentities(addslashes($_POST['pass'])))); // md5 car on a crypté les mots de passe avec md5 dans la bdd

            $requete = "SELECT *
                        FROM utilisateurs
                        WHERE login = '$login' AND pass = '$pass'";
            $result = mysqli_query($connexion, $requete);

            if(mysqli_num_rows($result) > 0){
                $data = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION["auth"] = $data;

                header("location:liste.php");
            }else{
                $error = '<div class="alert alert-danger text-center">Votre login et/ou votre mot de passe ne sont pas valides</div>';
            }
        }else{   
            $error = '<div class="alert alert-danger text-center">Le login et/ou le mot de passe sont requis</div>';
        }
    }

?>
<?php require_once("../partials_fichiersInclusion_headerFooter/header.inc")?>
<div class="container">
    <!-- <h2 class="text-center mb-5 mt-5">Formulaire de connexion Admin</h2> -->
    

    <div class="card offset-4 col-4 mt-5">
    <?= $error;?>
    <div class="card-header text-center">Formulaire de Connexion Admin</div>
    <div class="card-body">
    
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            
            <div class="mb-2">
                <label for="login" class="form-label">login*</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="veuillez entrer votre login">
            </div>
            <div class="mb-2">
                <label for="pass" class="form-label">Mot de passe*</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="veuillez entrer votre mot de passe">
            </div>
            <button type="submit" class="btn btn-success col-12" name="valid" >Valider</button>
        </form>
    </div>
</div>
</div>
</div>
<?php require_once("../partials_fichiersInclusion_headerFooter/footer.inc")?>




