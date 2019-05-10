<?php $title = "Page d'administration"; ?>

<?php ob_start(); ?>

<p><a href="index.php">Retour à la page d'accueuil</a></p>

                <em><a href="index.php?action=newpost">Ecrire un nouveau chapitre</a></em>
                <p><em><a href="index.php?action=changepassword">Changer mot de passe</a></em> </p>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
