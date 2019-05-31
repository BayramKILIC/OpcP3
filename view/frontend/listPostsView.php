<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>



                <?php
                while ($data = $posts->fetch())
                {
                    $preview_content = substr($data['content'], 0, 600);
                ?>


                        <h3>
                            <?= htmlspecialchars($data['title']) ?>
                            <em>publié le <?= $data['creation_date_fr'] ?></em>
                        </h3>
                        
                        <p>
                            <?= $preview_content ?> [...]

                            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre</a></em>
                        </p>
    <hr>
                    
                <?php
                    // todo regler grille menu et contenu
                }
                $posts->closeCursor();
                ?>

       
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>