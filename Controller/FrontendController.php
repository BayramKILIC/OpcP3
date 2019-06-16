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

    public function listPosts()
    {

        $posts = $this->postManager->getPosts(); // Appel d'une fonction de cet objet

        require('view/frontend/listPostsView.php');
    }

    public function listPostsPrivate()
    {
        $this->checkAuthentication();
        $posts = $this->postManager->getPosts();

        require('view/frontend/editContent.php');
    }

    public function newContent()
    {
        $this->checkAuthentication();
        if (empty($_POST['title']) || empty($_POST['content'])) {
            $this->setFlashMessage('info', 'Veuillez remplir tous les champs');
        } else {
            $this->postManager->postContent($_POST['title'], $_POST['content']);
            $this->setFlashMessage('success', 'Votre chapitre a bien été publié');
            return $this->redirect('listPostsPrivate');
        }
        require('view/frontend/newContent.php');
    }


    public function reportComment()
    {
        $affectedLines = $this->commentManager->reportComment($_GET['idcomment']);

        if ($affectedLines === false) {
            throw new \Exception('Impossible de signaler le commentaire !');
        } else {
            $this->setFlashMessage('success', 'Le commentaire a été signalé');

            return $this->redirect('post', ['id' => $_GET['id']]);
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

    public function deletePost()
    {
        $this->checkAuthentication();
        $affectedLines = $this->postManager->deletePost($_GET['id']);

        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'effacer le chapitre !');
        } else {
            $this->setFlashMessage('success', 'Le chapitre a été supprimé');
            return $this->redirect('listPostsPrivate');
        }
    }

    public function editPost()
    {
        $this->checkAuthentication();
        $post = $this->postManager->getPost($_GET['id']);

        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $this->postManager->editContent($_GET['id'], $_POST['title'], $_POST['content']);
            return $this->redirect('listPostsPrivate');
        } else {
            $this->setFlashMessage('danger', 'Veuillez remplir tous les champs');
        }

        require('view/frontend/editpost.php');
    }


    public function addPost($title, $content)
    {
        $this->checkAuthentication();
        $affectedLines = $this->postManager->postContent($title, $content);

        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            return $this->redirect('newpost');
        }
    }


    public function addComment($postId)
    {
        $author = $_POST['author'];
        $comment = $_POST['comment'];

        if (!empty($author) and !empty($comment)) {
            if (strlen(trim($author)) < 3 or strlen(trim($comment)) < 3) {
                $this->setFlashMessage('danger', 'Nombre de caractère insuffisant');
            } elseif ((strlen(trim($author)) > 100 or strlen(trim($comment)) > 3000)) {
                $this->setFlashMessage('danger', 'Nombre de caractère limite atteint');
            } else {
                $affectedLines = $this->commentManager->postComment($_GET['id'], $_POST['author'], $_POST['comment']);
                if ($affectedLines === false) {
                    throw new \Exception('Impossible d\'ajouter le commentaire !');
                } else {
                    $this->setFlashMessage('success', 'Votre commentaire a bien été enregistré');
                }
            }
        } else {
            $this->setFlashMessage('danger', 'Veuillez remplir tous les champs');
        }
        return $this->redirect('post', ['id' => $postId]);
    }
}

