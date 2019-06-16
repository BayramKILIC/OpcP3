<?php
$title = "Se connecter"; ?>

<?php ob_start(); ?>


<form class="form-signin text-center" action="index.php?action=changepassword" method="post">
    <img class="mb-4"src="https://image.flaticon.com/icons/svg/1197/1197500.svg" alt="" width="72" height="72">
    <h3 class="text-center">Changer le mot de passe</h3>
    <div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Votre ancien mot de passe" required name="password">

    </div>
    <div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Votre nouveau mot de passe" required name="newpassword1">

    </div>
    <div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Confirmation du nouveau mot de passe" required name="newpassword2">

    </div>
    <div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Changer le mot de passe</button>
    </div>


<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>
