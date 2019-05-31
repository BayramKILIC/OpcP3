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
            $action = $_GET['action'] ?? 'default';
            switch ($action) {
                case 'listPosts':
                    $this->frontendController->listPostsPublic();
                    break;
                case 'post':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $this->frontendController->post();
                    } else {
                        throw new \Exception('Aucun identifiant de billet envoyé');
                    }
                    break;
                case 'editpost':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $this->frontendController->editpost();
                    } else {
                        throw new \Exception('Aucun identifiant de billet envoyé');
                    }
                    break;

                case 'listPostsPrivate':
                    $this->frontendController->listPostsPrivate();
                    break;

                case 'addComment':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $this->frontendController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    } else {
                        throw new \Exception('Aucun identifiant de billet envoyé');
                    }
                    break;

                case 'listPostsPublic':
                    $this->frontendController->listPostsPublic();
                    break;
                case 'newpost':
                    $this->frontendController->newContent();
                    break;
                case  'deletepost':
                    $this->frontendController->deletePost();
                    break;
                case 'login':
                    $this->loginController->checkLogin();
                    break;
                case 'admin':
                    $this->loginController->admin();
                    break;
                case  'changepassword':
                    $this->loginController->changePassword();
                    break;
                case 'signout':
                    $this->loginController->signout();
                    break;
                case 'showComment':
                    $this->frontendController->showComment();
                    break;
                case 'deleteComment':
                    $this->frontendController->deleteComment();
                    break;
                case  'validateComment':
                    $this->frontendController->validateComment();
                    break;
                case  'reportComment':
                    $this->frontendController->reportComment();
                    break;
                case'aboutme' :
                    $this->frontendController->about();
                    break;
                default:
                    $this->frontendController->index();
            }
        } catch (\Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}