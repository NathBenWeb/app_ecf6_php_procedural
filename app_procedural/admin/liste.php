<?php  
    require_once("security.inc");
    require_once("../connect.php");

    if(isset($_POST["submitSearch"]) && !empty($_POST["search"])){
        $mcle = trim(addslashes(htmlentities($_POST["search"])));
        $requete = "SELECT * FROM personne p
        INNER JOIN langues l
        ON p.id_langue = l.id
        WHERE nom LIKE '$mcle%' OR libelle LIKE '$mcle%'";
    }else{
        $requete = "SELECT * FROM personne p
        INNER JOIN langues l
        ON p.id_langue = l.id";
    }
    $result = mysqli_query($connexion, $requete);

?>
<!-- Appel header -->
<?php require_once("../partials_fichiersInclusion_headerFooter/header.inc")?>

<div class="container">
    <h1 class="text-center mt-3">Liste des traducteurs</h1>
    <p><a href="ajout.php" class="btn btn-dark"><i class="fas fa-user-plus"></i></a></p>

   <?php require_once('search.php'); ?>
    
    <table class="table table-striped mb-5">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Age</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Langue</th>
                <th>Date de création</th>
                <!-- Ligne qui dit que si c'est le statut 1 à savoir admin dans la bdd a accès à ce qui suit sinon n'a pas accès -->
                <?php if(isset($_SESSION["auth"]) && $_SESSION["auth"]["statut"] == 1){ ?>
                <th colspan="2" class="text-center">Actions</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php while($rows = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?=$rows['id_personne']?></td>
                    <td><?=$rows['nom']?></td>
                    <td><?=$rows['age']?></td>
                    <td><?=$rows['telephone']?></td>
                    <td><?=$rows['email']?></td>
                    <td><img src="../assets_fichiersStatiques/images/<?=$rows['image']?>" width="50px"></td>
                    <td><?=$rows['libelle']?></td>
                    <td><?=$rows['created']?></td>
                    <!-- Ligne qui dit que si c'est le statut 1 à savoir admin dans la bdd a accès à ce qui suit sinon n'a pas accès -->
                    <?php if(isset($_SESSION["auth"]) && $_SESSION["auth"]["statut"] == 1){ ?>
                    <td><a href="modif.php?idmodif=<?=$rows["id_personne"]?>" class="btn btn-success">
                        <i class="fas fa-edit"></i></a>
                    </td>
                    <td><a href="supprimer.php?idsup=<?=$rows['id_personne'];?>" class="btn btn-danger" onclick="return confirm('Etes vous sûr de vouloir supprimer?')"><i class="fas fa-trash"></i></a></td>
                    <?php } ?> 
                </tr>
                

            <?php } ?>
        </tbody>
    </table>
</div>
<!-- appel footer -->
<?php require_once("../partials_fichiersInclusion_headerFooter/footer.inc")?>
