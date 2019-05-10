<?php
require_once("model/Manager.php");

class Login extends Manager
{
    public function identify($login, $password)
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT login, password FROM user WHERE id=1');
        $req = $req->fetch();
    }

    public function changePassword($login, $password)
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id FROM user WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    } 


}