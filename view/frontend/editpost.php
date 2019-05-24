<?php $title = "editer un article"; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <form action="index.php?action=saveeditcontent&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <label for="title">Titre</label><br />
            <input type="text" value="<?=$post['title']?>" id="title" name="title" />
        </div>
        <div>
            <textarea id="mytextarea" name="content"><?=$post['content']?></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
