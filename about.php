<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HappyFamily</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  <script src="assets/js/script.js"></script>
</head>
  
<body id="body">
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container-fluid">
        <a id="brandH2" class="navbar-brand mr-5" href="index.php"><img src="assets/images/logo.png" width="70px" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse h3" id="navbarNavDropdown">
          <ul id="header2" class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active text-white mr-4" aria-current="page" href="index.php"><i>Accueil</i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white mr-4" href="about.php"><i>A propos</i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="contact.php"><i>Contact</i></a>
            </li>
          </ul>
        </div>
    </nav>
  </header>


    <div id="apropos" class="container">
        <h1 id="h1apropos" class="text-center mb-4">A propos de ce blog</h1>
        <p>Quelle plus grande communauté dans le monde, que celle des parents ! Etant une femme active avec des enfants dont un en bas âge et l'autre en période de pré-adolescence, si vous êtes ici c'est que vous savez tout comme moi, que le quotidien n'est pas de tout repos. Mais malgré ce rythme soutenu, il nous faut savoir faire preuve de patience et apporter à nos chères petites têtes blondes, ce dont ils ont besoin , pour s'épanouir et devenir des adultes accomplis. Comme tout repose sur nos épaules, à nous parents, je me suis dis qu'il serait bien que nous aussi ayons un endroit, notre endroit, où se confier, échanger, avec quleques petits conseils d'experts à la clé dénichés par mes soins. Et c'est comme cela, qu'<span id="blog">Happy Familly</span> est né. Vous êtes de plus en plus nombreux à nous rejoindre dans ce blog des familles épanouies !</p>
    </div>



<?php require_once("partials/footer2.inc");?>