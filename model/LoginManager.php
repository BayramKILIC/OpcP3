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

    /**
     * @param $password
     * @return mixed
     * @throws Exception
     */
    public function changePassword($password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE user SET password=? WHERE id=1');
        $affectedLines =  $req->execute(array($password));
        if($affectedLines){
            return $password;
        }else{
            throw new Exception("Impossible de changer le mot de passe");
        }
    }




}