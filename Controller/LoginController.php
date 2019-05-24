<?php
namespace P3\Controller;

// Chargement des classes
use P3\Model\LoginManager;




class LoginController extends Controller
{
   /** @var LoginManager **/
    private $loginManager;

    public function  __construct() {
        $this->loginManager = new LoginManager();
    }


    public function checkLogin() 
    {
            $user = $this->loginManager->getLogin();

            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                if ($_POST['login'] == $user['login'] && password_verify($_POST['password'], $user['password'])) {
                    $_SESSION['user'] = $user['login'];
                    header('Location: index.php?action=admin');
                } else {
                    echo "connexion nok";
                }
            } else {
                echo "veuillez entrer vos identifiants";
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

        $posts = $this->loginManager->getLogin();

        require('view/frontend/admin.php');
    }

    public function signout()
    {

        require('view/frontend/signout.php');
    }

    public function changePassword() 
    {
        $oldpassword = $this->loginManager->getLogin();

         if (!empty($_POST['password']) && !empty($_POST['newpassword1']) && !empty($_POST['newpassword2'])) {

            if (password_verify($_POST['password'] , $oldpassword['password']) && $_POST['newpassword1'] == $_POST['newpassword2']) {
                $this->loginManager->changePassword($_POST['newpassword1']);
                header('Location: index.php?action=admin');
            } else {
                    echo "erreur de mot de passe";
                }
        }  else {
                echo "remplir tous les champs";
            }
        require('view/frontend/password.php');           
    }
}






