<?php $title = "Page d'administration"; ?>

    <?php ob_start(); ?>


    <div class="row">
        <div class="col-md-2" style="background-color: yellow">
            <p></p><em><a href="index.php">Retour à la page d'accueuil</a></em></p>
            <p><em><a href="index.php?action=newpost">Ecrire un nouveau chapitre</a></em></p>
            <p><em><a href="index.php?action=changepassword">Changer mot de passe</a></em></p>
            <p><em><a href="index.php?action=listPostsPrivate">Modifier un article</a></em></p>
            <p><em><a href="index.php?action=showComment">Modérer les commentaires</a></em></p>
        </div>
        <div class="col-md-10">
        </div>




        <?php $content = ob_get_clean(); ?>

        <?php require('template.php'); ?>
