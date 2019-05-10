<?php 
session_start();
$title = "Se connecter"; ?>

<?php ob_start(); ?>
<h1>Mon super blogg !</h1>



<form action="index.php?action=login" method="post">
    <div>
        <label for="login">Login</label><br />
        <input type="text" id="login" name="login" />
    </div>
    <div>
        <label for="password">Commentaire</label><br />
        <input type="password" id="login" name="password" />
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

formulaire ici





<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
