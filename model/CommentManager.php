<?php
require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name, comment, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE id_chapter=? ORDER BY id DESC');
        $req->execute(array($postId));
        return $req;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(id_chapter, name, comment, creation_date) VALUES(?, ?, ?, NOW())');
        $comments->execute(array($postId, $author, $comment));

        return $comments;
    }

   /* public function editComment($commentId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET(author=?, comment=?, comment_date=NOW()) WHERE id=?');
        $affectedLines = $comments->execute(array($author, $comment, $commentId));

        return $affectedLines;
    } */
    
}