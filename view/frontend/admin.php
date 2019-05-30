<?php $title = "Page d'administration"; ?>

        <?php ob_start(); ?>




<p>test</p>


            <?php $content = ob_get_clean(); ?>

            <?php require('templateAdmin.php'); ?>
