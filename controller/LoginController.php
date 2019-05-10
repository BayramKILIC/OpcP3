<?php


// Chargement des classes
require_once('model/LoginManager.php');



class LoginController
{
   /** @var LoginManager **/
    private $loginManager;

    public function  __construct() {
        $this->loginManager = new LoginManager();
    }


    public function checkLogin() 
    {
        $posts = $this->loginManager->getLogin();

         if (!empty($_POST['login']) && !empty($_POST['password'])) {
            if ($_POST['login'] == $posts['login'] && $_POST['password'] == $posts['password']) {
                header('Location: index.php?action=admin');       
            }
            else {
                echo "connexion nok";
            }
        }
           else {
            echo "veuillez entrer vos identifiants";
           }
        require('view/frontend/login.php');
    }


    public function admin() 
    {
        $posts = $this->loginManager->getLogin();

        require('view/frontend/admin.php');
    }



    public function changePassword() 
    {
        $oldpassword = $this->loginManager->getLogin();

         if (!empty($_POST['password']) && !empty($_POST['newpassword1']) && !empty($_POST['newpassword2'])) {
            if ($_POST['password'] == $oldpassword['password'] && $_POST['newpassword1'] == $_POST['newpassword2']) {
                //$this->loginManager->changePassword($_POST['newpassword1']);
            } else {
                    echo "erreur de mot de passe";
                }
        }  else {
                echo "remplir tous les champs";
            }
        require('view/frontend/password.php');           
    }
}






