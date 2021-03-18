<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HappyFamily</title>
  <link rel="stylesheet" href="../assets/css/style.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  <script src="../assets/js/script.js"></script>
</head>
  
<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-dark ">
      <div class="container-fluid">
        <a id="brandH" class="navbar-brand mr-5" href="index.php"><img src="../assets/images/logo.png" width="70px" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse h3" id="navbarNavDropdown">
          <ul id="header2" class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active text-white mr-4" aria-current="page" href="../index.php"><i>Accueil</i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white mr-4" href="../about.php"><i>A propos</i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="../contact.php"><i>Contact</i></a>
            </li>
          </ul>
        </div>

        <div class="nav-item dropdown pr-5">
          <?php if(isset($_SESSION["auth"])){ ?>
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION["auth"]["login"];?> <!-- echo permet ici d'afficher le login de l'utilisateur à côté du menu déroulant -->
          </a>
          <?php } ?>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <!-- Ligne qui dit que si c'est le statut 1 à savoir admin dans la bdd a accès à ce qui suit sinon n'a pas accès -->
          <?php if(isset($_SESSION["auth"]) && $_SESSION["auth"]["statut"] == 1){ ?>
            <li><a class="dropdown-item" href="inscription.php">Inscription</a></li>
            <?php } ?>
            <!-- <li><a class="dropdown-item" href="index.php">Connexion</a></li> -->
            <li><a class="dropdown-item" href="logout.php">Déconnexion</a></li>
          </ul>
          
        </div>
      </div>
    </nav>
  </header>