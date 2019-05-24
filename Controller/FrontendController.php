<?php

namespace P3\Controller;


use P3\Model\CommentManager;
use P3\Model\PostManager;

class FrontendController extends Controller
{
    /** @var PostManager * */
    private $postManager;

    /**
     * @var CommentManager
     **/
    private $commentManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }


    public function listPostsPublic()
    {

        $posts = $this->postManager->getPosts('public'); // Appel d'une fonction de cet objet

        require('view/frontend/listPostsView.php');
    }

    public function listPostsPrivate()
    {
        $this->checkAuthentication();
        $posts = $this->postManager->getPosts('public');

        require('view/frontend/editContent.php');
    }

    public function newContent()
    {
        $this->checkAuthentication();
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $this->addPost($_POST['title'], $_POST['content']);
        }
        require('view/frontend/newContent.php');
    }

    public function saveEditContent()
    {
        $this->checkAuthentication();
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $this->postManager->editContent($_GET['id'], $_POST['title'], $_POST['content']);
        }
        require('view/frontend/admin.php');
    }

    public function reportComment()
    {
        $affectedLines = $this->commentManager->reportComment($_GET['idcomment']);

        if ($affectedLines === false) {
            throw new \Exception('Impossible de signaler le commentaire !');
        } else {
            $this->setFlashMessage('success', 'Le commentaire a été signalé');

            header('Location: index.php?action=post&id=' . $_GET['id']);
        }
    }

    public function showComment()
    {
        $this->checkAuthentication();
        $comments = $this->commentManager->getAllComments();

        require('view/frontend/allComment.php');
    }

    public function deleteComment()
    {
        $this->checkAuthentication();
        $comments = $this->commentManager->getAllComments();
        $affectedLines = $this->commentManager->deleteComment($_GET['id']);

        if ($affectedLines === false) {
            throw new \Exception('Impossible de supprimer le commentaire !');
        } else {
            require('view/frontend/allComment.php');
        }
    }

    public function validateComment()
    {
        $this->checkAuthentication();
        $affectedLines = $this->commentManager->validateComment($_GET['id']);


        if ($affectedLines === false) {
            throw new \Exception('Impossible de valider le commentaire !');
        } else {
            $comments = $this->commentManager->getAllComments();
            require('view/frontend/allComment.php');
        }
    }

    public function post()
    {

        $post = $this->postManager->getPost($_GET['id']);
        $comment = $this->commentManager->getComments($_GET['id']);

        require('view/frontend/postView.php');
    }

    public function deletepost()
    {
        $this->checkAuthentication();
        $affectedLines = $this->postManager->deletePost($_GET['id']);

        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'effacer le chapitre !');
        } else {
            header('Location: index.php?action=listPostsPrivate');
        }
    }

    public function editpost()
    {
        $this->checkAuthentication();
        $post = $this->postManager->getPost($_GET['id']);

        require('view/frontend/editpost.php');
    }


    public function addPost($title, $content)
    {
        $this->checkAuthentication();
        $affectedLines = $this->postManager->postContent($title, $content);

        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            $this->redirect('newpost');
        }
    }


    public function addComment($postId, $author, $comment)
    {

// TODO controler les entrées du formulaire avant d'inserer en base
        $affectedLines = $this->commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            $this->redirect('post',['id' => $postId]);
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
