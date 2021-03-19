<?php
    require_once("security.inc");
    require_once("../connect.php");

    $error="";
    
    $requete = "SELECT id_cat, nom_cat
                FROM categories";
                
    $result = mysqli_query($connexion, $requete);
    
    if(isset($_GET["idmodif"]) && $_GET["idmodif"] <= 1000 && filter_var($_GET["idmodif"], FILTER_VALIDATE_INT)){

        $id = htmlspecialchars(addslashes($_GET["idmodif"]));
        
        $requete2 = "SELECT *
                    FROM articles a
                    INNER JOIN categories c
                    ON a.id_categorie = c.id_cat
                    WHERE a.id_art = '$id'";

        $result2 = mysqli_query($connexion, $requete2);
        if(mysqli_num_rows($result2) > 0){
            $data = mysqli_fetch_assoc($result2);
        }
    }

    if(isset($_POST["soumis"])){
        if(isset($_POST['titre']) && isset($_POST['auteur']) && strlen($_POST['auteur']) <=50 && isset($_POST['created_art'])){
            $id_article = trim(htmlspecialchars(addslashes($_POST["id_art"])));
            $titre = trim(htmlspecialchars(addslashes($_POST["titre"])));
            $auteur = trim(htmlspecialchars(addslashes($_POST["auteur"])));
            $description = trim(htmlspecialchars(addslashes($_POST["description"])));
            $categorie = trim(htmlspecialchars(addslashes($_POST["nom_cat"])));
            $created_art = trim(htmlspecialchars(addslashes($_POST["created_art"])));
            $image = $_FILES["image"]["name"];

            $destination = "../assets/images/";

            move_uploaded_file($_FILES["image"]["tmp_name"], $destination.$image);

            if(empty($image)){
                $requete3 = "UPDATE articles
                            SET titre = '$titre', auteur = '$auteur', description = '$description', id_categorie = '$categorie', created_art = '$created_art'
                            WHERE id_art =".$id_article;
            }else{
                if(file_exists("../assets/images/".$data["image"])){
                    unlink("../assets/images/".$data["image"]);
                }

                $requete3 = "UPDATE articles
                            SET titre = '$titre', auteur = '$auteur', description = '$description', id_categorie = '$categorie', created_art = '$created_art', image = '$image'
                            WHERE id_art =".$id_article;
            }
            $result3 = mysqli_query($connexion, $requete3);
        
            if($result3){
                header("location:liste.php");
            }
        }else{
            echo $error = '<div class="alert alert-danger">La modification a échoué</div>';
        }
    }
?>

<?php require_once("../partials/header.inc")?>

    <div class="offset-2 col-8">
        <h1 class="text-center mt-3">Articles</h1>   
        <h3 class="text-center bg-dark text-white mt-4">Formulaire de modification</h3>
        <?= $error; ?>

        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_art" value="<?=$data["id_art"]; ?>">
            <div class="row mt-3">
                <div class="col-12 mb-3 ">
                    <label for="titre" class="">Titre*</label>  
                    <input type="text" class="form-control" id="titre" name="titre" value ="<?=$data["titre"]; ?>" placeholder="Veuillez entrer le titre de l'article" >
                </div>
                <div class="col-12 mb-3 ">
                    <label for="auteur" class="">Auteur*</label>
                    <input type="text" class="form-control" id="auteur" name="auteur" value ="<?=$data["auteur"]; ?>" placeholder="Veuillez entrer l'auteur de l'article" >
                </div>
                <div class="col-6 mb-3 ">
                    <label for="created_art" class="">Date de création*</label>
                    <input type="date" class="form-control" id="created_art" name="created_art" value="<?= $data['created_art']; ?>">
                </div>
            </div>
            
            <div class="row mb-5">
                <div class="col">
                    <label for="image" class="">Image</label>  
                    <input type="file" class="form-control" id="image" name="image"><img src="../assets/images/<?=$data['image'];?>" width="100" alt="">
                </div>
                <div class="col">
                    <label for="nom_cat" class="">Catégorie*</label>
                    <select class="form-select" id="nom_cat" name="nom_cat" value ="<?=$data["nom_cat"]; ?>"  placeholder="Veuillez choisir la catégorie de l'article" >
                    <option value="<?=$data["id_categorie"]; ?>"><?=ucfirst($data["nom_cat"]); ?></option>
                        <?php while($rows = mysqli_fetch_assoc($result)){ if($data["id_categorie"] !== $rows["id_cat"]) {?>
                        <option value="<?=$rows["id_cat"]; ?>"><?=ucfirst($rows["nom_cat"]); ?></option>
                        <?php }} ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3 ">
                    <label for="description" class="">Contenu*</label>
                    <textarea  class="form-control" id="descript" name="description" rows="5" placeholder="Veuillez entrer le contenu de l'article"><?=$data["description"]; ?></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-info col-12 mb-5" name="soumis">Modifier</button>
        </form>
    </div>
<?php require_once("../partials/footer.inc")?>