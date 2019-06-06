<?php

namespace P3\Controller;

// Chargement des classes
use P3\Model\LoginManager;


class LoginController extends Controller
{
    /** @var LoginManager * */
    private $loginManager;

    public function __construct()
    {
        $this->loginManager = new LoginManager();
    }


    public function checkLogin()
    {
        try {
            $this->checkAuthentication();
            $this->redirect('admin');
        } catch (\Exception $exception) {
            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                $user = $this->loginManager->getLogin();
                if ($_POST['login'] == $user['login'] && password_verify($_POST['password'], $user['password'])) {
                    $_SESSION['user'] = $user['login'];
                    return $this->redirect('admin');
                } else {
                    $this->setFlashMessage('danger', "Identifiants invalides");
                }
            } else {
                $this->setFlashMessage('info', "Veuillez saisir vos identifiants");
            }
        }
        require('view/frontend/login.php');
    }


    /**
     * @throws \Exception
     */
    public function admin()
    {
        $this->checkAuthentication();

        // TODO Creer le dashboard

        require('view/frontend/admin.php');
    }

    public function signout()
    {

        require('view/frontend/signout.php');
    }

    public function changePassword()
    {
        $userInfo = $this->loginManager->getLogin();

        if (!empty($_POST['password']) && !empty($_POST['newpassword1']) && !empty($_POST['newpassword2'])) {

            if (password_verify($_POST['password'], $userInfo['password']) && $_POST['newpassword1'] == $_POST['newpassword2']) {
                $this->loginManager->changePassword($_POST['newpassword1']);
                $this->setFlashMessage('success', 'Le mot de passe a été modifié');
                return $this->redirect('admin');
            } else {
                $this->setFlashMessage('danger', 'Erreur mot de passe');
            }
        } else {
            $this->setFlashMessage('info', 'Veuillez remplir tout les champs');
        }
        require('view/frontend/password.php');
    }
}






