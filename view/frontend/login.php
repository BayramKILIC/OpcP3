<?php ob_start(); ?>


<form class="form-signin text-center" action="index.php?action=login" method="post">
    <img class="mb-4" src="https://image.flaticon.com/icons/svg/1651/1651104.svg" alt="" width="72" height="72">
    <h3 class="text-center">Espace personnel</h3>
    <div>
        <label class="sr-only" for="inlineFormInput">Identifiant</label>
        <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Identifiant" name="login"
               required>
    </div>
    <div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Mot de passe" required
               name="password">

    </div>
    <div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
    </div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
