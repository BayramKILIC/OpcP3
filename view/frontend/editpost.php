<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <form action="" method="post">
        <div>
            <label class="sr-only" for="inlineFormInput">Titre du chapitre</label>
            <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Titre du chapitre" name="title"
                   required value="<?=$post['title']?>">
        </div>

        <div>
            <textarea id="mytextarea" name="content"><?=$post['content']?></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>
