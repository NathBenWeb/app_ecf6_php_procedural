<?php
session_start();
if(isset($_SESSION['auth']) && $_SESSION['auth']['statut'] !=1 ){
    header('location:connexion.php');
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
            $requete = "INSERT INTO utilisateurs(login, pass, statut)
                        VALUES ('$login', '$pass', '$statut')";
            $result = mysqli_query($connexion, $requete);
            var_dump($result);
            if($result){
                header("location:connexion.php");
            }
        }
    }

?>

<?php require_once("../partials_fichiersInclusion_headerFooter/header.inc")?>

<div class="container">
    <div class="card offset-4 col-4 mt-5">
    <?= $error;?>
    <div class="card-header text-center">Formulaire de Connexion Utilisateurs</div>
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
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="statut" value = "1" name="statut">
                <label class="form-check-label" for="statut">Administrateur</label>
            </div>
            <button type="submit" class="btn btn-success col-12" name="valid" >Valider</button>
        </form>
    </div>
</div>
</div>
</div>
<?php require_once("../partials_fichiersInclusion_headerFooter/footer.inc")?>