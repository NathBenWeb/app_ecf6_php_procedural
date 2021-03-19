<?php
session_start();
if(isset($_SESSION['auth']) && $_SESSION['auth']['statut'] !=1 ){
    header('location:index.php');
}

require_once("../connect.php");
$error = "";
    
    if(isset($_POST['valid'])){
        if(!empty($_POST['login']) && !empty($_POST['pass'])){
            $login = trim(htmlentities(addslashes($_POST['login'])));
            $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
            if(isset($_POST["statut"])){
                $statut = trim(htmlentities(addslashes($_POST["statut"])));
            }else{
                $statut = 2;
            }
            $requete = "INSERT INTO users(login, pass, statut)
                        VALUES ('$login', '$pass', '$statut')";
            $result = mysqli_query($connexion, $requete);
            if($result){
                header("location:index.php");
            }
        }
    }
?>

<?php require_once("../partials/header.inc")?>

<div class="container">
    <div id="inscr" class="card offset-3 col-6 mt-3 mt-5">
    <?= $error;?>
    <div class="h4 card-header text-center">Formulaire ajout utilisateurs</div>
    <div class="card-body">
    
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            
            <div class="mb-2">
                <label for="login" class="form-label">Login*</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="veuillez entrer votre login">
            </div>
            <div class="mb-2">
                <label for="pass" class="form-label">Mot de passe*</label>
                <input type="password" class="form-control mb-4" id="pass" name="pass" placeholder="veuillez entrer votre mot de passe">
            </div>
            <div class="mb-5 form-check">
                <input type="checkbox" class="form-check-input" id="statut" value = "1" name="statut">
                <label class="form-check-label" for="statut">*Création profil dministrateur</label>
            </div>
            <button type="submit" class="btn btn-info col-12" name="valid" >Créer</button>
        </form>
    </div>
</div>
</div>
</div>
<?php require_once("../partials/footer.inc")?>