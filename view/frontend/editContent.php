<?php $title = 'Modifier un article'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<?php
while ($data = $posts->fetch())
{

    $preview_content = substr($data['content'], 0, 400);
    ?>


    <h3>
        <?= htmlspecialchars($data['title']) ?>
        <em>le <?= $data['creation_date_fr'] ?></em>
    </h3>

    <p>
        <?= $preview_content ?> [...]
        <br />
        <em><a href="index.php?action=editpost&amp;id=<?= $data['id'] ?>">Modifier le chapitre</a></em> /
        <em><a href="index.php?action=deletepost&amp;id=<?= $data['id'] ?>">Supprimer le chapitre</a></em>
    </p>

    <?php
}
$posts->closeCursor();
?>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
