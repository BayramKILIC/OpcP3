<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>

    <link href="public/css/style.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <script src='https://cloud.tinymce.com/5/tinymce.min.js?apiKey=your_API_key'></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</head>

<body>

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
                        <li class="active"> <a href="index.php">Accueil</a> </li>
                        <li> <a href="index.php">Liste des chapitres</a> </li>
                        <li> <a href="#">A propos</a> </li>
                        <li> <a href="index.php?action=login">Connexion</a> </li>
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
        <div class="col-md-2" style="background-color: yellow">
            <p></p><em><a href="index.php">Retour à la page d'accueuil</a></em></p>
            <p><em><a href="index.php?action=newpost">Ecrire un nouveau chapitre</a></em></p>
            <p><em><a href="index.php?action=changepassword">Changer mot de passe</a></em></p>
            <p><em><a href="index.php?action=listPostsPrivate">Modifier un article</a></em></p>
            <p><em><a href="index.php?action=showComment">Modérer les commentaires</a></em></p>
        </div>
        <div class="col-md-10">

            <?php if($message = $this->getFlashMessage()): ?>
                <div class="alert alert-<?= $message[0]?>" role="alert">
                    <?= $message[1] ?>
                </div>
            <?php endif; ?>

    <?= $content ?>
        </div>

    <div class="row">
        <div class="col-md-12" style="background-color: grey">
            <p>ici le pied de page</p>
            <p><em><a href="index.php?action=login">Se connecter</a></em> </p>
            <p><em><a href="index.php?action=signout">Se déconnecter</a></em> </p>

        </div>
    </div>
</div>
</body>
</html>