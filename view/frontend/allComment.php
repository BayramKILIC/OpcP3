<?php $title = "Modérer les commentaires"; ?>

<?php ob_start(); ?>

<div class="row">
    <section class="col-sm-12 table-responsive">
        <table class="table table-bordered table-striped table-condensed">
            <caption>
                <h4>Liste des commentaires</h4>
            </caption>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Commentaire</th>
                <th>Nombre de signalement</th>
                <th>Supprimer / Valider</th>
            </tr>
            </thead>
            <tbody>

<?php

while ($data = $comments->fetch())
{
    ?>
                <tr>
                    <td><?= htmlspecialchars($data['name']) ?></td>
                    <td><?= htmlspecialchars($data['comment']) ?></td>
                    <td> <?= htmlspecialchars($data['report_counter']) ?></td>
                    <td>
                        <em><a href="index.php?action=validateComment&amp;id=<?= $data['id'] ?>">Valider</a></em> /
                        <em><a href="index.php?action=deleteComment&amp;id=<?= $data['id'] ?>">Supprimer</a></em>
                    </td>
                </tr>

    <?php
}
$comments->closeCursor();
// TODO Inserer colonne date et numero de chapitre
?>


            </tbody>
        </table>
    </section>
</div>


    <?php $content = ob_get_clean(); ?>

    <?php require('templateAdmin.php'); ?>
