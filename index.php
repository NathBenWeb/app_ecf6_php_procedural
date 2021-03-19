<?php
require_once("connect.php");

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


function trDate($date){
    $dateArray = (explode("-", substr(($date), 0, 10)));
    $dateIns = $dateArray[2]."/".$dateArray[1]."/".$dateArray[0];
    return $dateIns;
}

?>

<?php require_once("partials/header2.inc");?>






<!-- <div id="divTitre" class="jumbotron p-0 m-0">
    <video id="bgvid" class="min-vh-100 min-vw-100" type="video/mp4" src="assets/images/clouds.mp4" autoPlay="1" muted="1" loop="1" width="100%" height="20%"></video>
</div> -->
<figure>
    <img width="100%" src="">
</figure>
<article>
    <?php require_once('admin/search.php'); ?>
    <h1 id="" class="h1Brand">Happy Family</h1>
    <h4 class=""><i>Le blog des familles épanouies</i></h5>
</article>
<!-- <div class="card-img-overlay d-flex h-50 flex-column my-auto align-items-center justify-content-center text-center text-dark">
    <h1 id="h1Brand" class="">Happy Family</h1>
    <h4 class="lead">Le blog des familles épanouies</h5>
    <a class="btn btn-warning btn-lg" href="#" role="button">Learn more</a>
</div> -->

    
<div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4">
    <?php while($rows = mysqli_fetch_assoc($result)){ ?>

        <div class="col">
            <div id="card" class="card mb-3">
                <img src="assets/images/<?=$rows["image"];?>" class="card-img-top" alt="..." height="300">
                <div class="card-body" >
                    <h3 class="card-title"><?=$rows["titre"];?></h3>
                    <ul class="list-group list-group-flush" >
                        <li class="list-group-item h5">Auteur : <?=$rows["auteur"];?></li>
                        <li class="list-group-item">Paru le : <?=trDate($rows["created_art"]);?></li>
                        <li class="list-group-item"><?=$rows["titre"];?></li>
                    </ul>
                    <hr>
                    <p id="description" class="card-text"><?=$rows['description']?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php require_once("partials/footer2.inc");?>