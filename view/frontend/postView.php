<?php $title = "Mon bLOG"; ?>

<?php ob_start(); ?>


    <h3>
        <?= $post['title'] ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= $post['content'] ?>
    </p>



<form class="form-signin text-center" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <h3 class="text-center">Laisser un commentaire</h3>
    <div>
        <label class="sr-only" for="inlineFormInput">Votre nom</label>
        <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Votre pseudo" name="author" required>
    </div>
    <div>
        <textarea class="form-control mb-2" id="exampleFormControlTextarea1" rows="3" placeholder="Votre commentaire" name="comment"></textarea>
    </div>
    <div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
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

    <em><a href="index.php?action=reportComment&amp;idcomment=<?= $data['id']?>&amp;id=<?=$post['id'] ?>">Signaler le commentaire</a></em>
    </p>
                <?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
