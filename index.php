<?php
require('controller/FrontendController.php');
require('controller/LoginController.php');
session_start();

$frontendController = new FrontendController();
$loginController = new LoginController();

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            $frontendController->listPostsPublic();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontendController->post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'editpost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontendController->editpost();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'listPostsPrivate') {
                $frontendController->listPostsPrivate();
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {            
                $frontendController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'newpost') {
            $frontendController->newContent();
        }
        elseif ($_GET['action'] == 'saveeditcontent') {
            $frontendController->saveEditContent();
        }
        elseif ($_GET['action'] == 'deletepost') {
            $frontendController->deletePost();
        }
        elseif ($_GET['action'] == 'login') {
            $loginController->checkLogin();           
        }
        elseif ($_GET['action'] == 'admin') {
            $loginController->admin();           
        }
        elseif ($_GET['action'] == 'changepassword') {
            $loginController->changePassword();           
        }
        elseif ($_GET['action'] == 'signout') {
            $loginController->signout();
        }
    }
    else {
        $frontendController->listPostsPublic();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
