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
                <th>Titre de l'article commenté</th>
                <th>Date</th>
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
                    <td><?= htmlspecialchars($data['title']) ?></td>
                    <td><?= htmlspecialchars($data['comment_date_fr']) ?></td>
                    <td> <?= htmlspecialchars($data['report_counter']) ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary btn-success btn-sm ml-3" href="index.php?action=validateComment&amp;id=<?= $data['id'] ?>" role="button"> Valider</a>
                            <a class="btn btn-secondary btn-danger btn-sm" href="index.php?action=deleteComment&amp;id=<?= $data['id'] ?>" role="button">Supprimer</a>
                        </div>
                    </td>
                </tr>

    <?php
}
$comments->closeCursor();

?>


            </tbody>
        </table>
    </section>
</div>


    <?php $content = ob_get_clean(); ?>

    <?php require('templateAdmin.php'); ?>
