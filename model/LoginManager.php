<?php
require_once("model/Manager.php");

class LoginManager extends Manager
{
    public function getLogin()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT login, password FROM user WHERE id=1');
        $req = $req->fetch();
        return $req;
    }

   public function changePassword($password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE user SET password=?');
        $req->execute(array($password));
        $req = $req->fetch();

        return $password;
    } 


}