<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="background-color: grey">
            <p>ici le bandeau reseau sociaux</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2" style="background-color: red">
            <p>ici le logo</p>
        </div>
        <div class="col-md-10">
            <nav class="navbar navbar-inverse navbar-static-top">
                <div class="container-fluid">
                  <ul class="nav navbar-nav">
                    <li class="active"> <a href="#">Accueil</a> </li>
                    <li> <a href="#">Liste des chapitres</a> </li>
                    <li> <a href="#">A propos</a> </li>
                    <li> <a href="#">Connexion</a> </li>
                  </ul>
                  <form class="navbar-form navbar-right inline-form">
                    <div class="form-group">
                      <input type="search" class="input-sm form-control" placeholder="Recherche">
                      <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>
                    </div>
                  </form>
                </div>
              </nav>
        </div>
    </div>
     <div class="row">
        <div class="col-md-6" style="background-color: yellow">
            <p>ici un espace 'à propos'</p>
        </div>
        <div class="col-md-6">
                <!-- ici liste des chapitres -->
                <p>Derniers billets du blogg :</p>
                <em><a href="index.php?action=newpost">Ecrire un nouveau chapitre</a></em>


                <?php
                while ($data = $posts->fetch())
                {
                ?>
                    
                        <h3>
                            <?= htmlspecialchars($data['title']) ?>
                            <em>le <?= $data['creation_date_fr'] ?></em>
                        </h3>
                        
                        <p>
                            <?= nl2br(htmlspecialchars($data['content'])) ?>
                            <br />
                            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre</a></em>
                        </p>
                    
                <?php
                }
                $posts->closeCursor();
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="background-color: grey">
            <p>ici le pied de page</p>
            </div>
        </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>