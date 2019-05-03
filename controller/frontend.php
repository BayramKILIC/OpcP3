<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


class FrontendController
{
   /** @var PostManager **/
    private $postManager;

    /**
    * @var CommentManager
    **/
    private $commentManager;

public function  __construct(){
    $this->postManager = new PostManager();
    $this->commentManager = new CommentManager();
}

   public function listPosts()
{

    $posts = $this->postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

    public function newContent()
{
     if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    addPost($_POST['title'], $_POST['content']);
        }
    require('view/frontend/newContent.php');
}

    public function post()
{
    

    $post = $this->postManager->getPost($_GET['id']);
    $comments = $this->commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

    public function addPost($title, $content)
{


    $affectedLines = $this->postManager->postContent($title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=newpost');
    }
}

    public function addComment($postId, $author, $content)
{


    $affectedLines = $this->commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

/* function editComment($commentId, $author, $comment)
 {
     $commentManager = new CommentManager();

    $affectedLines = $commentManager->editComment($commentId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: index.php');
    }  
}  */ 
 

}
