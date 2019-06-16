<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>



                <?php
                while ($data = $posts->fetch())
                {
                    $preview_content = substr(strip_tags($data['content']), 0, 900);
                ?>


                    <h3><?= htmlspecialchars($data['title']) ?><br/></h3>
                    <h5>Publié le <?= $data['creation_date_fr'] ?></h5>

                        
                        <p>
                            <?= $preview_content ?> [...]

                            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-sm btn-outline-dark" role="button" aria-pressed="true">Lire le chapitre</a>
                        </p>
    <hr>
                    
                <?php
                }
                $posts->closeCursor();
                ?>

       
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>