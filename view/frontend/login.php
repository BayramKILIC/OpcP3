<?php 
$title = "Se connecter"; ?>

<?php ob_start(); ?>



<form class="form-signin" action="index.php?action=login" method="post">
    <h3 class="text-center">Espace personnel</h3>
    <div>
        <label class="sr-only" for="inlineFormInput">Identifiant</label>
        <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Identifiant" name="login" required>
    </div>
    <div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required name="password">

    </div>
    <div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
    </div>
</form>






<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
