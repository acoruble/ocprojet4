<?php

/**
*
*/
class frontend
{

  public function home()
  {
    $posts = new Posts();
    $comments = new Comments();
    $listPosts = $posts->getListPosts();
    $post = $posts->getFirstPost();
    $comments = $comments->getComments($post->title());
    require ('view/frontend/chapterdisplay.php');
  }

  public function selectChapter()
  {
    $posts = new Posts();
    $comments = new Comments();
    $correct = $posts-> existPost($_POST['PostClick']);
    if (!$correct)
    {
      echo "<div class='alert alert-danger' role='alert'>Merci de sélectionner un chapitre.</div>";
      require ('view/frontend/chapterdisplay.php');
    }
    else {
      $post = $posts->getPosts($_POST['PostClick']);
      $listPosts = $posts->getListPosts();
      $comments = $comments->getComments($post->title());
      require ('view/frontend/chapterdisplay.php');
    }
  }

  public function newcomment()
  {
    $posts = new Posts();
    $comments = new Comments();
    $correct = $posts-> existPost($_POST['PostClick']);
    if (!$correct)
    {
      echo "<div class='alert alert-danger' role='alert'>Merci de vérifier votre pseudo ou votre message.</div>";
      require ('view/frontend/chapterdisplay.php');
    }
    else {
      $comments->addcomments(htmlspecialchars($_POST['titleChapter']),htmlspecialchars($_POST['pseudo']),htmlspecialchars($_POST['message']));
    }
  }

  public function notifyComments()
  {
    $comments = new Comments();
    $correct = $comments-> existComment($_POST['IDComment']);
    if (!$correct)
    {
      echo "<div class='alert alert-danger' role='alert'>Nous avons un problème, merci de recommencer votre signalement.</div>";
      require ('view/frontend/chapterdisplay.php');
    }
    else
    {
      $displayReport = $comments->displayreportcomment($_POST['IDComment']);
      $comments->updatereportcomment($displayReport, $_POST['IDComment']);
    }
  }

  public function connection()
  {
    require ('view/frontend/connection.php');
  }
}
