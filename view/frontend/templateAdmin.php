<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../bootstrap-4.0.0/favicon.ico">
    <title>Roman en ligne</title>
    <link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src='https://cloud.tinymce.com/5/tinymce.min.js?apiKey=your_API_key'></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</head>

<body>

<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark mb-5">
                <a class="navbar-brand" href="index.php">Billet simple pour l'Alaska</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto ml-5">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=listPostsPublic">Liste des chapitres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=aboutme">A propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-3" href="index.php?action=login">Connexion</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-5"> </div>
    </div>

    <div class="row">
        <div class="col-md-2 mt-5">
            <a href="index.php" class="btn btn-secondary btn-sm active mb-2" role="button" aria-pressed="true">Retour à la page d'accueuil</a>
            <a href="index.php?action=newpost" class="btn btn-secondary btn-sm active mb-2" role="button" aria-pressed="true">Ecrire un nouveau chapitre</a>
            <a href="index.php?action=changepassword" class="btn btn-secondary btn-sm active mb-2" role="button" aria-pressed="true">Changer mot de passe</a>
            <a href="index.php?action=listPostsPrivate" class="btn btn-secondary btn-sm active mb-2" role="button" aria-pressed="true">Modifier/Supprimer un article</a>
            <a href="index.php?action=showComment" class="btn btn-secondary btn-sm active mb-2" role="button" aria-pressed="true">Modérer les commentaires</a>
        </div>
        <div class="col-md-10 mt-5 mb-5">

            <?php if($message = $this->getFlashMessage()): ?>
                <div class="alert alert-<?= $message[0]?>" role="alert">
                    <?= $message[1] ?>
                </div>
            <?php endif; ?>

    <?= $content ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-5">
            <footer class="footer mt-auto py-3 fixed-bottom bg-dark">
                <div class="row">
                    <div class="col-md-4">
                        <p class="text-muted text-center">Site conçu avec bootstrap.</p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted text-center"> Devellopement et Design : Bayram KILIC</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <a href="index.php?action=login" style="text-decoration:none; color:#000;">Se connecter</a>
                        <a href="index.php?action=signout" style="text-decoration:none; color:#000;">Se déconnecter</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
</html>