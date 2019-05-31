<?php $title = "Nouveau chapitre"; ?>

<?php ob_start(); ?>
<h1>Ecrire un nouveau chapitre!</h1>
<p><a href="index.php">Retour à la page d'accueuil</a></p>



<form action="" method="post">

    <div>
        <label class="sr-only" for="inlineFormInput">Titre du chapitre</label>
        <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Titre du chapitre" name="title" required>
    </div>
    <div>
        <label for="content">Votre texte</label><br />
        <textarea id="mytextarea" name="content"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>
