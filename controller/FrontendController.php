<?php


// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once ('controller/Controller.php');


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

        $posts = $this->postManager->getPosts(1); // Appel d'une fonction de cet objet

        require('view/frontend/listPostsView.php');
    }

    public function listPostsPrivate()
    {

        $posts = $this->postManager->getPosts(2);

        require('view/frontend/editContent.php');
    }

    public function newContent()
    {
        $this->checkAuthentication();
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $this->addPost($_POST['title'], $_POST['content'], $_POST['privacy']);
        }
        require('view/frontend/newContent.php');
    }

    public function saveEditContent()
    {
        $this->checkAuthentication();
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $this->editContent($_GET['id'], $_POST['title'], $_POST['content']);
        }
        require('view/frontend/admin.php');
    }

    public function post()
{

    $post = $this->postManager->getPost($_GET['id']);
    $comment = $this->commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

    public function deletepost()
    {

        $affectedLines = $this->postManager->deletePost($_GET['id']);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'effacer le chapitre !');
        } else {
            header('Location: index.php?action=listPostsPrivate');
        }
    }

    public function editpost()
    {

        $post = $this->postManager->getPost($_GET['id']);

        require('view/frontend/editPost.php');
    }



    public function addPost($title, $content, $privacy)
    {

        $affectedLines = $this->postManager->postContent($title, $content, $privacy);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=newpost');
        }
    }


    public function addComment($postId, $author, $comment)
    {


        $affectedLines = $this->commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
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
