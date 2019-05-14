<?php $title = "Nouveau chapitre"; ?>

<?php ob_start(); ?>
<h1>Ecrire un nouveau chapitre!</h1>
<p><a href="index.php">Retour à la page d'accueuil</a></p>



<form action="index.php?action=newpost" method="post">

    <div>
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" />
    </div>
    <div>
        <label for="content">Votre texte</label><br />
        <textarea id="mytextarea" name="content"></textarea>
    </div>
    <div>
        <input type="radio" name="privacy" value="public" id="public" /> <label for="public">Public</label><br />
        <input type="radio" name="privacy" value="private" id="private" checked/> <label for="private">Privé</label>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
