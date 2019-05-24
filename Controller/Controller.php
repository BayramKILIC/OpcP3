<?php

namespace P3\Controller;


abstract class Controller
{
    /**
     * @return bool
     * @throws Exception
     */
    public function checkAuthentication()
    {
        if (!isset($_SESSION['user'])) {
            throw new \Exception('Connexion requise');
        }

        return true;
    }


    public function setFlashMessage($typeMessage, $message)
    {
        $_SESSION['flash'] = [$typeMessage, $message];
    }

    public function getFlashMessage()
    {
        if (isset($_SESSION['flash'])) {
            $message = $_SESSION['flash'];
            unset($_SESSION['flash']);
        } else {
            $message = false;
        }

        return $message;
    }

    public function redirect(string $action, array $params = [])
    {


        $url = "Location: index.php?action=" . $action;

        foreach ($params as $key => $value) {
            $url .= "&$key=$value";
        }
        header($url);
    }
}