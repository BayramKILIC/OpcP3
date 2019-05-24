<?php $title = "Mon bLOG"; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<h2>Commentaires</h2>


<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php

while ($data = $comment->fetch())
{

?>
              
    <h3>
        <?= htmlspecialchars($data['name']) ?>
        <em>le <?= $data['comment_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($data['comment'])) ?>
        <br />
    </p>
    <em><a href="index.php?action=reportComment&amp;idcomment=<?= $data['id']?>&amp;id=<?=$post['id'] ?>">Signaler le commentaire</a></em>
                    
                <?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
