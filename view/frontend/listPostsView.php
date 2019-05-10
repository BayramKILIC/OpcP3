<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

     <div class="row">
        <div class="col-md-6" style="background-color: yellow">
            <p>ici un espace 'à propos'</p>
        </div>
        <div class="col-md-6">
                <!-- ici liste des chapitres -->
                <p>Derniers billets du blogg :</p>



                <?php
                while ($data = $posts->fetch())
                {
                ?>
                    
                        <h3>
                            <?= htmlspecialchars($data['title']) ?>
                            <em>le <?= $data['creation_date_fr'] ?></em>
                        </h3>
                        
                        <p>
                            <?= $data['content'] ?>
                            <br />
                            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre</a></em>
                        </p>
                    
                <?php
                }
                $posts->closeCursor();
                ?>
            </div>
        </div>
       
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>