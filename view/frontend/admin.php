<?php $title = "Page d'administration"; ?>

        <?php ob_start(); ?>


<div class="form-signin">
    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Espace administrateur</h1>
        <img class="mb-4"src="https://image.flaticon.com/icons/svg/1802/1802882.svg" alt="" width="72" height="72">
        <p>L'espace admnistrateur vous permet d'accéder à des fonctionalitées privées via le menu présent
        a gauche de cette page.</p>
    </div>

</div>


            <?php $content = ob_get_clean(); ?>

            <?php require('templateAdmin.php'); ?>
