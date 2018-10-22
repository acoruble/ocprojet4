<?php

require_once("Manager.php");

class CommentsManager extends Manager
{
  public function getComments($titleChapter)
  {
    $comments=[];
    $db = $this->dbConnect();
    $CommentsByChapter = $db->prepare('SELECT ID, pseudo, date, message FROM comments WHERE titleChapter = ?');
    $CommentsByChapter->execute(array($titleChapter));
    while($data = $CommentsByChapter->fetch())
    {
      $comments[] = new Comments($data);
    }
    return $comments;
  }

  public function addcomments($titleChapter, $pseudo, $message)
  {
    $db = $this->dbConnect();
    $Newcomment = $db->prepare('INSERT INTO comments(titleChapter, pseudo, date, message, nbReport) VALUES (:titleChapter, :pseudo, :date, :message, 0)');
    $Newcomment -> execute(array(
      'date' => date("Y-m-d H:i:s"),
      'titleChapter' => $titleChapter,
      'pseudo' => $pseudo,
      'message' => $message
    ));
    // return $Newcomment;
  }

  public function displayreportcomment($Id)
  {
    $db = $this->dbConnect();
    if (isset($Id)) {
      $displayreportcomments = $db->prepare('SELECT nbReport FROM comments WHERE ID = ?');
      $displayreportcomments-> execute(array($Id));
      $displayreport = $displayreportcomments->fetch();
      return $displayreport;
    }
  }

  public function updatereportcomment($displayreport, $Id)
  {
    $db = $this->dbConnect();
    $newNbreport = $displayreport['nbReport']+1;
    var_dump($newNbreport);
    $updatereportcomment = $db->prepare('UPDATE comments SET nbReport = :nbreport WHERE  ID = :IDcomment');
    $updatereportcomment->execute(array(
          'nbreport' => $newNbreport,
          'IDcomment' => $Id,
        ));
  }

}
