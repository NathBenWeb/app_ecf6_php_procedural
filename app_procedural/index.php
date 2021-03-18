<?php
require_once("connect.php");

$requete = "SELECT * FROM personne p
            INNER JOIN langues l 
            ON p.id_langue = l.id";

$result = mysqli_query($connexion, $requete);

function trDate($date){
    $dateArray = (explode("-", substr(($date), 0, 10)));
    $dateIns = $dateArray[2]."/".$dateArray[1]."/".$dateArray[0];
    return $dateIns;
}

?>

<?php require_once("partials_fichiersInclusion_headerFooter/header.inc");?>

<div id="divTitre" class="bg-info text-center pt-3 pb-3">
    <h1>Traducteurs assermentés</h1>
    <h5>Nos traducteurs sont à votre service</h5>
</div>
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
    <?php while($rows = mysqli_fetch_assoc($result)){ ?>

        <div class="col">
            <div class="card">
                <img src="assets_fichiersStatiques/images/<?=$rows["image"];?>" class="card-img-top" alt="..." height="300">
                <div class="card-body">
                    <h5 class="card-title">Traducteur N° : TS00<?=$rows["id_personne"];?></h5>
                    <p class="text-right">
                        <img src="assets_fichiersStatiques/images/<?=$rows["drapeau"];?>" alt="">
                    </p>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Prénom et nom : <?=$rows["prenom"];?> <?=$rows["nom"];?></li>
                        <li class="list-group-item">Langue : <?=$rows["libelle"];?></li>
                        <li class="list-group-item">Age : <?=$rows["age"];?></li>
                        <li class="list-group-item">Email : <?=$rows["email"];?></li>
                        <li class="list-group-item">Téléphone : <?=$rows["telephone"];?></li>
                        <li class="list-group-item">Inscrit le : <?=trDate($rows["created"]);?></li>
                    </ul>
                    <hr>
                    <p class="card-text"><?=$rows["description"];?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php require_once("partials_fichiersInclusion_headerFooter/footer.inc");?>

