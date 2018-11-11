<?php

require_once("Manager.php");

class CommentsManager extends Manager
{
  public function existComment($id)
  {
    $db = $this->dbConnect();
    $exist = $db->prepare('SELECT ID FROM comments WHERE ID=?');
    $exist->execute(array($id));
    $correct = $exist->fetch();
    return $correct;
  }

  public function getComments($titleChapter)
  {
    $comments=[];
    $db = $this->dbConnect();
    $commentsByChapter = $db->prepare('SELECT * FROM comments WHERE titleChapter = ? ORDER BY nbReport DESC');
    $commentsByChapter->execute(array($titleChapter));
    while($data = $commentsByChapter->fetch())
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
  }

  public function displayreportcomment($id)
  {
    $db = $this->dbConnect();
    if (isset($id)) {
      $displayReportComments = $db->prepare('SELECT nbReport FROM comments WHERE ID = ?');
      $displayReportComments-> execute(array($id));
      $displayReport = $displayReportComments->fetch();
      return $displayReport;
    }
  }

  public function updatereportcomment($displayReport, $id)
  {
    $db = $this->dbConnect();
    $newNbreport = $displayReport['nbReport']+1;
    $updatereportcomment = $db->prepare('UPDATE comments SET nbReport = :nbreport WHERE  ID = :IDcomment');
    $updatereportcomment->execute(array(
          'nbreport' => $newNbreport,
          'IDcomment' => $id,
        ));
  }

  public function delete($id)
  {
    $db = $this->dbConnect();
    $delete= $db->prepare('DELETE FROM comments WHERE ID=?');
    $delete->execute(array($id));
  }
}
