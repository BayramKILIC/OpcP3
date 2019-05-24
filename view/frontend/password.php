<?php
$title = "Se connecter"; ?>

<?php ob_start(); ?>
<h1>Changement de mot de passe</h1>



<form action="index.php?action=changepassword" method="post">
    <div>
        <label for="password">Votre ancien mot de passe</label><br />
        <input type="password" id="password" name="password" />
    </div>
    <div>
        <label for="newpassword1">Votre nouveau mot de passe</label><br />
        <input type="password" id="newpassword1" name="newpassword1" />
    </div>
    <div>
        <label for="newpassword2">Confirmer votre nouveau mot de passe</label><br />
        <input type="password" id="newpassword2" name="newpassword2" />
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

formulaire ici





<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>
