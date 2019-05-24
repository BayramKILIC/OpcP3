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
}