<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>

        <link href="public/css/style.css" rel="stylesheet" /> 
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
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
        <?= $content ?>

         <div class="row">
            <div class="col-md-12" style="background-color: grey">
            <p>ici le pied de page</p>
            </div>
        </div>
</div>
    </body>
</html>