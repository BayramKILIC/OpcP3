<?php

namespace P3\Model;


class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name, comment, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS comment_date_fr FROM comment WHERE id_chapter=? ORDER BY id DESC');
        $req->execute(array($postId));
        return $req;
    }

    public function getAllComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, name, comment, report_counter, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS comment_date_fr FROM comment ORDER BY report_counter DESC, creation_date DESC');
        return $req;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(id_chapter, name, comment, creation_date) VALUES(?, ?, ?, NOW())');
        $comments->execute(array($postId, $author, $comment));

        return $comments;
    }

    public function reportComment($commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE comment SET report_counter=report_counter+1 WHERE id=?');
        $comment->execute(array($commentId));

        return $comment;
    }

    public function deleteComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comment WHERE id=?');
        $affectedLines = $req->execute(array($commentId));

        return $affectedLines;
    }

    public function validateComment($commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE comment SET report_counter=0 WHERE id=?');
        $comment->execute(array($commentId));

        return $comment;
    }
}
