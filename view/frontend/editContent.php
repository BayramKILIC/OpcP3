<?php $title = 'Modifier un article'; ?>

<?php ob_start(); ?>
<p><a href="index.php?action=admin">Retour à la page d'administration</a></p>

<?php
while ($data = $posts->fetch())
{

    $preview_content = substr(strip_tags($data['content']), 0, 400);
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
    <hr>

    <?php
}
$posts->closeCursor();
?>



<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>
