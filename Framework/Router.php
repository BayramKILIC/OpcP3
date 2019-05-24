<?php
namespace P3\Framework;

use P3\Controller\FrontendController;
use P3\Controller\LoginController;

class Router
{

    /**
     * @var FrontendController
     */
    private $frontendController;
    /**
     * @var LoginController
     */
    private $loginController;

    public function __construct()
    {
        $this->frontendController = new FrontendController();
        
        $this->loginController = new LoginController();
    }

    public function run()
    {

        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'listPosts') {
                    $this->frontendController->listPostsPublic();
                }
                elseif ($_GET['action'] == 'post') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $this->frontendController->post();
                    }
                    else {
                        throw new \Exception('Aucun identifiant de billet envoyé');
                    }
                }
                elseif ($_GET['action'] == 'editpost') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $this->frontendController->editpost();
                    }
                    else {
                        throw new \Exception('Aucun identifiant de billet envoyé');
                    }
                }
                elseif ($_GET['action'] == 'listPostsPrivate') {
                    $this->frontendController->listPostsPrivate();
                }
                elseif ($_GET['action'] == 'addComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $this->frontendController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    }
                    else {
                        throw new \Exception('Aucun identifiant de billet envoyé');
                    }
                }
                elseif ($_GET['action'] == 'newpost') {
                    $this->frontendController->newContent();
                }
                elseif ($_GET['action'] == 'saveeditcontent') {
                    $this->frontendController->saveEditContent();
                }
                elseif ($_GET['action'] == 'deletepost') {
                    $this->frontendController->deletePost();
                }
                elseif ($_GET['action'] == 'login') {
                    $this->loginController->checkLogin();
                }
                elseif ($_GET['action'] == 'admin') {
                    $this->loginController->admin();
                }
                elseif ($_GET['action'] == 'changepassword') {
                    $this->loginController->changePassword();
                }
                elseif ($_GET['action'] == 'signout') {
                    $this->loginController->signout();
                }
                elseif ($_GET['action'] == 'showComment') {
                    $this->frontendController->showComment();
                }
                elseif ($_GET['action'] == 'deleteComment') {
                    $this->frontendController->deleteComment();
                }
                elseif ($_GET['action'] == 'validateComment') {
                    $this->frontendController->validateComment();
                }
                elseif ($_GET['action'] == 'reportComment') {
                    $this->frontendController->reportComment();
                }
            }
            else {
                $this->frontendController->listPostsPublic();
            }
        }
        catch(\Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}