<!-- connexion + requete + resultat requete -->
<?php
    require_once("security.inc");
    require_once("../connect.php");
    $error="";
    
    $requete = "SELECT id, libelle FROM langues";
                
    $result = mysqli_query($connexion, $requete);

    if(isset($_POST["soumis"])){
        // Pour sécuriser la partie backend des hackers / strlen = nombre de caractères limités
        if(isset($_POST["nom"]) && strlen($_POST["nom"]) <= 220 && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $nom = trim(htmlspecialchars(addslashes(ucfirst($_POST["nom"]))));
            $prenom = trim(htmlspecialchars(addslashes(ucfirst($_POST["prenom"]))));
            $age = trim(htmlspecialchars(addslashes($_POST["age"])));
            $email = trim(htmlspecialchars(addslashes($_POST["email"])));
            $telephone = trim(htmlspecialchars(addslashes($_POST["phone"])));
            $id_langue = trim(htmlspecialchars(addslashes($_POST["langue"])));
            $description = trim(htmlspecialchars(addslashes(ucfirst($_POST["desc"]))));
            $image = $_FILES["image"]["name"];
            // var_dump($_POST);die();
            $destination = "../assets_fichiersStatiques/images/";
            move_uploaded_file($_FILES["image"]["tmp_name"], $destination.$image);

            $requete2 = "INSERT INTO personne(nom, prenom, age, email, telephone, id_langue, image, description)
                        VALUES('$nom', '$prenom', '$age', '$email', '$telephone', '$id_langue', '$image', '$description')"; 
            $result = mysqli_query($connexion, $requete2);
        //    var_dump($result);die();
        // if($resultat){
            if(mysqli_insert_id($connexion) > 0){
                header("location:liste.php");
            }else{
                echo $error = '<div class="alert alert-danger">L\'ajout a échoué</div>'; // Appeler cette variable contenant le message d'erreur là où on le souhaite dans le html (ici en dessous du titre "formulaire d'ajout")
            }
        }
    }

?>

<!-- Appel header -->
<?php require_once("../partials_fichiersInclusion_headerFooter/header.inc")?>

    <div class="offset-2 col-8">
        <h1 class="text-center mt-3">Liste des traducteurs</h1>   
        <h3 class="text-center mt-4">Formulaire d'ajout</h3>
        <?= $error; ?>
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
            <div class="row mt-3">
                <div class="col-5">
                    <label for="nom" class="">Nom*</label>  
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Veuillez entrer votre nom" required>
                </div>
                <div class="col-5">
                    <label for="prenom" class="">Prénom*</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Veuillez entrer votre prénom" required>
                </div>
                <div class="col-2">
                    <label for="age" class="">Age*</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="Veuillez entrer votre âge" min="18" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="email" class="">Email Adresse*</label>  
                    <input type="email" class="form-control" id="email" name="email" placeholder="Veuillez entrer votre email" required>
                </div>
                <div class="col">
                    <label for="phone" class="">Téléphone*</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Veuillez entrer votre téléphone" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="image" class="">Photo</label>  
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="col">
                    <label for="langue" class="">Langue*</label>
                    <select class="form-select" id="langue" name="langue" placeholder="Veuillez choisir la langue de votre choix" required>
                    <option value="">Choisir</option>
                        <?php while($rows = mysqli_fetch_assoc($result)){ ?>
                        <option value="<?=$rows["id"]; ?>"><?=ucfirst($rows["libelle"]); ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3">
                    <label for="desc" class="">Description</label>  
                    <textarea  class="form-control" id="desc" name="desc" rows="5" placeholder="Veuillez entrer vos descriptions ici"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-info col-12" name="soumis">Soumettre</button>
        </form>
    </div>

<!-- appel footer -->
<?php require_once("../partials_fichiersInclusion_headerFooter/footer.inc")?>