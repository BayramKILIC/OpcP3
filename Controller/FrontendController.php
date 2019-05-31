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

    public function index()
    {

        $posts = $this->postManager->getPosts('public'); // Appel d'une fonction de cet objet

        require('view/frontend/welcome.php');
    }

    public function about()
    {
        require('view/frontend/aboutme.php');
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
            $this->setFlashMessage('success', 'Votre chapitre a bien été publié');
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

            $this->redirect('post', ['id' => $_GET['id']]);
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

        $affectedLines = $this->commentManager->deleteComment($_GET['id']);

        if ($affectedLines === false) {
            throw new \Exception('Impossible de supprimer le commentaire !');
        } else {
            $comments = $this->commentManager->getAllComments();
            $this->setFlashMessage('success', 'Le commentaire a été supprimé');
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
            $this->setFlashMessage('success', 'Le commentaire a été validé');
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
            $this->setFlashMessage('success', 'Le chapitre a été supprimé');
            $this->redirect('listPostsPrivate');
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
        if(!empty($author) and !empty($comment)) {
            if (strlen($author) > 2 and strlen($comment) > 2) {
                $affectedLines = $this->commentManager->postComment($postId, $author, $comment);
                if ($affectedLines === false) {
                    throw new \Exception('Impossible d\'ajouter le commentaire !');
                } else {
                    $this->setFlashMessage('success', 'Votre commentaire a bien été enregistré');
                }
            } else {
                $this->setFlashMessage('danger', 'Nombre de caractère insuffisant');
            }
        } else {
            $this->setFlashMessage('danger', 'Veuillez remplir tout les champs');
        }
        $this->redirect('post', ['id' => $postId]);
    }
}
