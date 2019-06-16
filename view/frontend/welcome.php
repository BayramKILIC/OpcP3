
<?php ob_start(); ?>

    <div class="form-signin">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Bienvenu sur mon blog</h1>
            <p>Je suis Jean Forteroche. <br/> Ecrivain de longue date, j'ai décidé de publié mon roman
                "Billet simple pour l'Alaska" en ligne. Ce blog sera régulièrement mis à jour
                est de nouveau chapitre verront le jour avec le temps.  N'hésitez pas à consulter la rubrique à propos pour avoir plus d'information et
            me contacter si vous le souhaitez. Je vous souhaite à tous une bonne lecture.</p>
        </div>






        <a class="btn btn-lg btn-outline-secondary btn-block" href="index.php?action=listPostsPublic">Commencer la lecture</a>

    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>