<?php

/**
 *
 */
class FrontEnd
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

  public function selectChapter($selectChapter)
  {
    $posts = new Posts();
    $comments = new Comments();
    $post = $posts->getPosts($selectChapter);
    $listPosts = $posts->getListPosts();
    $comments = $comments->getComments($post->title());
    require ('view/frontend/chapterdisplay.php');
  }

  public function newComment($titleChapter, $pseudo, $message)
  {
    $comments = new Comments();
    $comments->addcomments($titleChapter, $pseudo, $message);
  }

  public function notifyComments($id)
  {
    $comments = new Comments();
    $displayReport = $comments->displayreportcomment($id);
    $comments->updatereportcomment($displayReport, $id);
  }

  // public function displayComments($title)
  // {
  //   $comments = new Comments();
  //   var_dump($title);
  //   $comments = $comments->getComments($title);
  //   var_dump($comments);
  //   return $comments;
  // }

}

// else {
//   $titleChapter = 'Prologue';
//   $commentsByChapter = $comments->getComments($titleChapter);
// }

// if (isset($_GET["PostClick"]))
// {
//   $post = $posts->getPosts($_GET["PostClick"]);
//   $comments = $comments->getComments($post->title());
//   require ('view/frontend/home.php');
// }
//
// else
// {
//   $post = $posts->getFirstPost();
//   $comments = $comments->getComments($post->title());
//   require ('view/frontend/home.php');
// }

// if (isset($_POST['pseudo']))
// {
//   $comments->addcomments($_POST['titleChapter'],$_POST['pseudo'],$_POST['message']);
// }
//
// if (isset($_POST["IDComment"]))
// {
//   $displayReport = $comments->displayreportcomment($_POST['IDComment']);
//   var_dump($displayReport);
//   $comments->updatereportcomment($displayReport, $_POST['IDComment']);
//
// }
