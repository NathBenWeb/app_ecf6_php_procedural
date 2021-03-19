<?php  
    require_once("security.inc");
    require_once("../connect.php");

    if(isset($_POST["submitSearch"]) && !empty($_POST["search"])){
        $mcle = trim(addslashes(htmlentities($_POST["search"])));

        $requete = "SELECT * FROM articles a
        INNER JOIN categories c
        ON a.id_categorie = c.id_cat
        WHERE auteur LIKE '$mcle%' OR titre LIKE '$mcle%'";
    }else{
        $requete = "SELECT * FROM articles a
        INNER JOIN categories c
        ON a.id_categorie = c.id_cat";
    }
    $result = mysqli_query($connexion, $requete);

?>
<!-- Appel header -->
<?php require_once("../partials/header.inc")?>

<div class="container">
    <h1 class="text-center mt-3">Articles</h1>
    <?php require_once('search.php'); ?>
    <p><a href="ajout.php" class="btn btn-dark"><i class="fas fa-user-plus"></i></a></p>

    
    
    <table id="table" class="table table-striped mb-5">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Contenu</th>
                <th>Image</th>
                <th>Catégorie</th>
                <th>Date de création</th>
                <!-- Ligne qui dit que si c'est le statut 1 à savoir admin dans la bdd a accès à ce qui suit sinon n'a pas accès -->
                <?php if(isset($_SESSION["auth"]) && $_SESSION["auth"]["statut"] == 1){ ?>
                <th class="text-center">Modifier</th>
                <th class="text-center">Supprimer</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php while($rows = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?=$rows['id_art']?></td>
                    <td><?=$rows['titre']?></td>
                    <td><?=$rows['auteur']?></td>
                    <td><?=substr($rows['description'],0,100)?> ...</td>
                    <td><img src="../assets/images/<?=$rows['image']?>" width="50px"></td>
                    <td><?=$rows['nom_cat']?></td>
                    <td><?=$rows['created_art']?></td>
                    <!-- Ligne qui dit que si c'est le statut 1 à savoir admin dans la bdd a accès à ce qui suit sinon n'a pas accès -->
                    <?php if(isset($_SESSION["auth"]) && $_SESSION["auth"]["statut"] == 1){ ?>
                    <td><a href="modif.php?idmodif=<?=$rows["id_art"]?>" class="btn" id="buttonModif"><i class="fas fa-edit"></i></a></td>
                    <td><a href="supprimer.php?idsup=<?=$rows['id_art'];?>" class="btn" id="buttonSup" onclick="return confirm('Etes vous sûr de vouloir supprimer?')"><i class="fas fa-trash"></i></a></td>
                    <?php } ?> 
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="h-100">.</div>
<!-- appel footer -->
<?php require_once("../partials/footer.inc")?>
