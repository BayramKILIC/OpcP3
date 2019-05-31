<?php
namespace P3\Model;

class PostManager extends Manager
{

    public function getPosts($status)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM chapter WHERE status=? ORDER BY creation_date');
        $req->execute(array($status));
        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM chapter WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    /**
     * @param $title
     * @param $content
     * @return bool
     * @throws \Exception
     */
    public function postContent($title, $content)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('INSERT INTO chapter(title, content, creation_date) VALUES (?, ?, NOW())');
        try{
             $ret = $contents->execute(array($title, $content));
        }catch(\Exception $exception) {
            throw new \Exception("Impossible d'ajouter ce chapitre ".$exception->getMessage());
        }

        return $ret;
    }

    public function deletePost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE chapter SET status="delete" WHERE id=?');
        $affectedLines = $req->execute(array($postId));

        return $affectedLines;
    }

    public function editContent($contentId, $title, $content)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE chapter SET title=? , content=? , creation_date=NOW() WHERE id=?');
        $affectedLines = $comments->execute(array($title, $content, $contentId));

        return $affectedLines;
    }

}