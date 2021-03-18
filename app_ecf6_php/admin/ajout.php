<?php
    require_once("security.inc");
    require_once("../connect.php");

    $error="";
    
    $requete = "SELECT id_cat, nom_cat FROM categories";
                
    $result = mysqli_query($connexion, $requete);

    if(isset($_POST["soumis"])){
        if(isset($_POST['titre']) && isset($_POST['auteur']) && strlen($_POST['auteur']) <=50 && isset($_POST['created_art'])){
            $titre = trim(htmlspecialchars(addslashes($_POST["titre"])));
            $auteur = trim(htmlspecialchars(addslashes($_POST["auteur"])));
            $description = trim(htmlspecialchars(addslashes($_POST["description"])));
            $categorie = trim(htmlspecialchars(addslashes($_POST["nom_cat"])));
            $created_art = trim(htmlspecialchars(addslashes($_POST["created_art"])));
            $image = $_FILES["image"]["name"];
            $destination = "../assets/images/";
            move_uploaded_file($_FILES["image"]["tmp_name"], $destination.$image);

            $requete2 = "INSERT INTO articles(titre, auteur, description, id_categorie, created_art, image)
                        VALUES('$titre', '$auteur', '$description', '$categorie', '$created_art', '$image')"; 

            $result = mysqli_query($connexion, $requete2);
        
            if(mysqli_insert_id($connexion) > 0){
                header("location:liste.php");
            }else{
                echo $error = '<div class="alert alert-danger">L\'ajout a échoué</div>';
            }
            var_dump($_POST);
        }
    }

?>

<?php require_once("../partials/header.inc")?>

    <div class="offset-2 col-8">
        <h1 class="text-center mt-3">Articles</h1>   
        <h3 class="text-center bg-dark text-white mt-4">Formulaire d'ajout</h3>
        <?= $error; ?>

        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
            <div class="row mt-3">
                <div class="col-12 mb-3 ">
                    <label for="titre" class="">Titre*</label>  
                    <input type="text" class="form-control" id="titre" name="titre" placeholder="Veuillez entrer le titre de l'article" required>
                </div>
                <div class="col-6 mb-3 ">
                    <label for="auteur" class="">Auteur*</label>
                    <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Veuillez entrer l'auteur de l'article" required>
                </div>
                <div class="col-6 mb-3 ">
                    <label for="created_art" class="">Date de création*</label>
                    <input type="date" class="form-control" id="created_art" name="created_art" placeholder="Veuillez entrer la date de création de l'article" required>
                </div>
            </div>
            
            <div class="row mb-5">
                <div class="col">
                    <label for="image" class="">Image</label>  
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="col">
                    <label for="nom_cat" class="">Catégorie*</label>
                    <select class="form-select" id="nom_cat" name="nom_cat" rows="5" placeholder="Veuillez choisir la catégorie de l'article" required>
                    <option value="">Choisir</option>
                        <?php while($rows = mysqli_fetch_assoc($result)){ ?>
                        <option value="<?=$rows["id_cat"]; ?>"><?=ucfirst($rows["nom_cat"]); ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3 ">
                    <label for="description" class="">Contenu*</label>
                    <textarea  class="form-control" id="descript" name="description" rows="5" placeholder="Veuillez saisir le contenu l'article"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-info col-12 mb-5" name="soumis">Ajouter</button>
        </form>
    </div>
<?php require_once("../partials/footer.inc")?>