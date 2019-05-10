<?php
require('controller/frontend.php');
require('controller/loginController.php');

$frontendController = new FrontendController();
$loginController = new LoginController();

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            $frontendController->listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontendController->post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
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
            $frontendController->signout();           
        }
    }
    else {
        $frontendController->listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
