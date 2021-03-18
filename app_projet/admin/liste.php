<!-- connexion + requete + resultat requete -->
<?php

    require_once("../connect.php");
    $requete = "SELECT * FROM personne p
                INNER JOIN langues l
                ON p.id_langue = l.id";
    $result = mysqli_query($connexion, $requete);

?>
<!-- Appel header -->
<?php require_once("../partials/header.inc")?>

<div class="container">
    <h1 class="text-center mt-3">Liste des traducteurs</h1>
    <p><a href="ajout.php" class="btn btn-dark"><i class="fas fa-user-plus"></i></a></p>

    <form action="<?=$_SERVER["PHP_SELF"]; ?>" method="post">
        <div class="input-group justify-content-end">
            <input type="search" class="form-control offset-9 col-3 " name="search" id="search" placeholder="Rechercher">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
    
    <table class="table table-striped ">
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
                <th colspan="2" class="text-center">Actions</th>
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
                    <td><a href="modif.php?idmodif=<?=$rows["id_personne"]?>" class="btn btn-success">
                        <i class="fas fa-edit"></i></a>
                    </td>
                    <td><a href="supprimer.php?idsup=<?=$rows['id_personne'];?>" class="btn btn-danger" onclick="return confirm('Etes vous sûr de vouloir supprimer?')">
                        <i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                

            <?php } ?>
        </tbody>
    </table>
</div>
<!-- appel footer -->
<?php require_once("../partials/footer.inc")?>
