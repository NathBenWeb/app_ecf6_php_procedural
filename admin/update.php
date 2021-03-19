<?php
require_once 'security.php';

require_once('../connect.php');
//var_dump($_GET);


$sql1 = "SELECT id,nom 
         FROM categorie";

$res = mysqli_query($conn, $sql1);

if(isset($_GET['pencil']) && $_GET['pencil'] <= 1000 && filter_var($_GET['pencil'], FILTER_VALIDATE_INT)){

    $id = htmlspecialchars(addslashes($_GET['pencil']));

    $sql = "SELECT * 
            FROM article a 
            INNER JOIN  categorie c 
            ON a.id_categorie = c.id
            WHERE a.id_art = '$id'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
        //var_dump($data);
    }
    
    // $line = mysqli_fetch_assoc($result);
    
}

if(isset($_POST['soumis'])){

    if(isset($_POST['titre']) && isset($_POST['auteur']) && strlen($_POST['auteur'])<=50 && isset($_POST['date']) ){
    
        $id = trim(htmlspecialchars(addslashes($_POST['id_art'])));
        $titre = trim(htmlspecialchars(addslashes($_POST['titre'])));
        $auteur = trim(htmlspecialchars(addslashes($_POST['auteur'])));
        $description = trim(htmlspecialchars(addslashes($_POST['description'])));
        $date_created = trim(htmlspecialchars(addslashes($_POST['date'])));
        $id_categorie = trim(htmlspecialchars(addslashes($_POST['categorie'])));
        $image= $_FILES['image']['name'];
        
        $destination= "../assets/images/";
       
        move_uploaded_file($_FILES['image']['tmp_name'],$destination.$image);
        
        // if(file_exists('../assets/images/'.$line['image'])){

        //     unlink('../assets/images/'.$line['image']);
        // }

        if(empty($image)){

            $sql2 = "UPDATE article 
                     SET titre = '$titre',auteur ='$auteur',description = '$description',id_categorie = '$id_categorie',date_created = '$date_created'
                     WHERE id_art=".$id;
            }else{
                    if(file_exists('../assets/images/'.$data['image'])){
    
                            unlink('../assets/images/'.$data['image']);
    
                    } 
                    $sql2 = "UPDATE article 
                    SET titre = '$titre',auteur ='$auteur',description = '$description',id_categorie = '$id_categorie',date_created = '$date_created',image ='$image'
                    WHERE id_art=".$id;
    
            }

        

            $resultat = mysqli_query($conn,$sql2);

            if($resultat){

                header('location:list.php');
            }

    }else{

        $error = '<div class="alert alert-danger text-center">Erreur de modification</div>';

    }


}

$error="";
require_once('../partials/header.inc'); 

?>



<div>
<div class="offset-2 col-8 p-5">
<h1 class="bg-secondary text-center text-warning">Administration</h1>
<h2 class="text-center text-warning display-5 mt-4 mb-3">Formulaire de modification</h2>
    <?=$error; ?>
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="id_art" id="id_art" value="<?= $data['id_art']; ?>">
        
        <div class="row">
        <div class="col-6">
            <label for="titre">Titre*</label>
            <input type="text" class="form-control "  id="titre" name="titre" value="<?= $data['titre'];  ?>" placeholder="Entrez votre titre svp" >
        </div>
        <div class="col-6">
            <label for="auteur">Auteur*</label>
            <input type="text" class="form-control" id="auteur" name="auteur" value="<?=$data['auteur'];  ?>" placeholder="Entrez votre auteur svp" >
        </div>
    </div>

    <div class="row">
    <div class="col">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date"  name="date" value="<?= $data['date_created']; ?>">
    </div>
    <div class="col">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image">
        <img src="../assets/images/<?=$data['image'];?>" width="170px" height="120px" alt="">
    </div>
    <div class="col">
        <label for="categorie">Categorie</label>
        <select class="form-select" id="categorie" name="categorie" >
                <option value="<?=$data['id_categorie'];?>" ><?=ucfirst($data['nom']);?></option>
            <?php while($rows = mysqli_fetch_assoc($res)){ if($data['id_categorie'] !== $rows['id']){ ?>
                <option value="<?=$rows['id']; ?>"><?= ucfirst($rows['nom']); ?></option>
            
        <?php }} ?>
        </select>
    </div>
    </div>
    <div class="row">
    <div class="col mb-2">
        <label for="article">Article</label>
        <textarea  class="form-control" id="description" name="description"  rows="5" placeholder="Entrez l'article' svp"><?= $data['description'];  ?></textarea>
    </div>

    </div>
    <button type="submit" class="btn btn-warning col-4 offset-4 mt-3" name="soumis" >MODIFIER</button>
    </form>
</div>
</div>

<?php require_once('../partials/footer.inc');?>
