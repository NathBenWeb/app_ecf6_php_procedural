<?php require_once("../partials/header.php");?>

<div class="container">
        <h2 class="text-center mt-4">Formulaire d'inscription</h2>
        <form class="mt-5 mb-5" method="post" action="inscription_traitement.php" enctype="multipart/form-data">
            <!-- Choix type radio -->
            <h4>Civilité</h4>
            <div>
                <input type="radio" class="form-check-input" id="masculin" name="genre" value="masculin" >
                <label class="form-check-label" for="masculin">Masculin</label>
            </div>
            <div>
                <input type="radio" class="form-check-input" id="feminin" name="genre" value="feminin" checked="checked">
                <label class="form-check-label" for="feminin">Féminin</label>
            </div>

            <input type="hidden" name="token" value="LoremIpsum65456465">

            <div class="mb-2">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Votre login" >
            </div>
            <div class="mb-2">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Votre mot de passe">
            </div>
            <!-- Pour choisir un seul jour -->
            <div class="mb-2">
                <label for="jour" class="form-label">Jours de la semaine</label>
                <select class="form-select" id="jour" name="jour">
                    <option value="">Choisir</option>
                    <option value="lundi">Lundi</option>
                    <option value="mardi">Mardi</option>
                    <option value="mercredi">Mercredi</option>
                    <option value="jeudi">Jeudi</option>
                    <option value="vendredi">Vendredi</option>
                </select>
            </div>
            <!-- Pour choisir plusieurs jours -->
            <div class="mb-2">
                <label for="jours" class="form-label" >Jours de la semaine</label>
                <select class="form-select" id="jours" name="jours[]" multiple>
                    <option value="">Choisir</option>
                    <option value="lundi">Lundi</option>
                    <option value="mardi">Mardi</option>
                    <option value="mercredi">Mercredi</option>
                    <option value="jeudi">Jeudi</option>
                    <option value="vendredi">Vendredi</option>
                </select>
            </div>
            <!-- Cases à cocher -->
            <h4>Mes modules préférés</h4>
            <div class="mb-2 form-check">
                <input type="checkbox" class="form-check-input" id="php" name="module[]" value="php">
                <label class="form-check-label" for="php">Php</label>
            </div>
            <div>
                <input type="checkbox" class="form-check-input" id="html" name="module[]" value="html">
                <label class="form-check-label" for="html">Html</label>
            </div>
            <div>
                <input type="checkbox" class="form-check-input" id="sql" name="module[]" value="sql">
                <label class="form-check-label" for="sql">Sql</label>
            </div>
            <div class="mb-2">
                <label for="photo" class="form-label">Télécharger</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <div class="mb-2">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" placeholder="Votre message"></textarea>
            </div>

            <button class="mb-5" type="submit" name="soumis" class="btn btn-primary">Soumettre</button>
        </form>
    </div>

    <?php require_once("../partials/footer.php");?>
