<?php
    require_once("../connect.php");
    $error = "";
    
    $requete = "SELECT id, libelle FROM langues";
                    
    $result = mysqli_query($connexion, $requete);

    if(isset($_GET["idmodif"]) && $_GET["idmodif"] <= 1000 && filter_var($_GET["idmodif"], FILTER_VALIDATE_INT)){
        $id = htmlspecialchars(addslashes($_GET["idmodif"]));
        $requete2 = "SELECT * FROM personne p
        INNER JOIN langues l
                ON p.id_langue = l.id
                WHERE p.id_personne = '$id'";

        $result2 = mysqli_query($connexion, $requete2);

        if(mysqli_num_rows($result2) > 0){
        $data = mysqli_fetch_assoc($result2);
       
        }
    }

    if(isset($_POST["soumis"])){

        // Pour sécuriser la partie backend des hackers / strlen = nombre de caractères limités
        if(isset($_POST["nom"]) && strlen($_POST["nom"]) <= 20 && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){

            $id_personne = trim(htmlspecialchars(addslashes($_POST["id_personne"])));
            $nom = trim(htmlspecialchars(addslashes($_POST["nom"])));
            $prenom = trim(htmlspecialchars(addslashes($_POST["prenom"])));
            $age = trim(htmlspecialchars(addslashes($_POST["age"])));
            $email = trim(htmlspecialchars(addslashes($_POST["email"])));
            $telephone = trim(htmlspecialchars(addslashes($_POST["phone"])));
            $id_langue = trim(htmlspecialchars(addslashes($_POST["langue"])));
            $description = trim(htmlspecialchars(addslashes($_POST["desc"])));
            $image = $_FILES["image"]["name"];
            // var_dump($_POST);die();
            $destination = "../assets/images/";
            move_uploaded_file($_FILES["image"]["tmp_name"], $destination.$image);

            if(empty($image)){
                $requete3 = "UPDATE personne SET nom = '$nom', prenom = '$prenom', age = '$age', email = '$email', telephone = '$telephone', id_langue = '$id_langue', description = '$description'
                        WHERE id_personne = '$id_personne'";
            }else{
                if(file_exists("../assets/images/".$data))
                unlink("../assets/images/".$data["image"]);
                $requete3 = "UPDATE personne SET nom = '$nom', prenom = '$prenom', age = '$age', email = '$email', telephone = '$telephone', id_langue = '$id_langue', image = '$image', description = '$description'
                        WHERE id_personne = '$id_personne'";
            }

            
            
            $result3 = mysqli_query($connexion, $requete3);
        //   
            if(mysqli_affected_rows($connexion) > 0){
                header("location:liste.php");
            }else{
                echo $error = '<div class="alert alert-danger">L\'ajout a échoué</div>'; // Appeler cette variable contenant le message d'erreur là où on le souhaite dans le html (ici en dessous du titre "formulaire d'ajout")
            }
        }
    }
?>


<!-- Appel header -->
<?php require_once("../partials/header.inc")?>

    <div class="offset-2 col-8">
        <h1 class="text-center mt-3">Liste des traducteurs</h1>   
        <h3 class="text-center mt-4">Formulaire de modification</h3>
        <?= $error; ?>
        <!-- enctype="multipart/form-data" = pour intégrer des médias dans un formulaire (photos, vidéos...) -->
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id_personne" value="<?=$data["id_personne"]; ?>">
            <div class="row mt-3">
                <div class="col-5">
                    <label for="nom" class="">Nom*</label>  
                    <input type="text" class="form-control" id="nom" name="nom" value ="<?=$data["nom"]; ?>" placeholder="Veuillez entrer votre nom" required>
                </div>
                <div class="col-5">
                    <label for="prenom" class="">Prénom*</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value ="<?=$data["prenom"]; ?>" placeholder="Veuillez entrer votre prénom" required>
                </div>
                <div class="col-2">
                    <label for="age" class="">Age*</label>
                    <input type="number" class="form-control" id="age" name="age" value ="<?=$data["age"]; ?>" placeholder="Veuillez entrer votre âge" min="18" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="email" class="">Email Adresse*</label>  
                    <input type="email" class="form-control" id="email" name="email" value ="<?=$data["email"]; ?>" placeholder="Veuillez entrer votre email" required>
                </div>
                <div class="col">
                    <label for="phone" class="">Téléphone*</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value ="<?=$data["telephone"]; ?>" placeholder="Veuillez entrer votre téléphone" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="image" class="">Photo</label>  
                    <input type="file" class="form-control" id="image" name="image">
                    <img src="../assets/images/<?=$data['image'];?>" width="50" alt="">
                </div>
                <div class="col">
                    <label for="langue" class="">Langue*</label>
                    <select class="form-select" id="langue" name="langue" placeholder="Veuillez choisir la langue de votre choix" required>
                    <option value ="<?=$data["id_langue"]; ?>"><?=$data["libelle"]; ?></option>
                        
                        <?php while($rows = mysqli_fetch_assoc($result)){ if($data["id_langue"] != $rows["id"]) {?>
                        <option value="<?=$rows["id"]; ?>"><?=ucfirst($rows["libelle"]); ?></option>
                        <?php }} ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3">
                    <label for="desc" class="">Description</label>  
                    <textarea  class="form-control" id="desc" name="desc" rows="5" placeholder="Veuillez entrer vos descriptions ici"><?=$data["description"]; ?>"</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-info col-12" name="soumis">Modifier</button>
        </form>
    </div>

<!-- appel footer -->
<?php require_once("../partials/footer.inc")?>