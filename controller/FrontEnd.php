<?php

/**
 *
 */
class FrontEnd
{

  public function home()
  {
    $Posts = new Posts();
    $Comments = new Comments();
    $listPosts = $Posts->getListPosts();
    $Post = $Posts->getFirstPost();
    $comments = $Comments->getComments($Post->title());
    require ('view/frontend/chapterdisplay.php');
  }

  public function selectChapter($selectChapter)
  {
    $Posts = new Posts();
    $Post = $Posts->getPosts($selectChapter);
    var_dump($comments);
    require ('view/frontend/home.php');
  }

  public function displayComments($title)
  {
    $Comments = new Comments();
    var_dump($title);
    $comments = $Comments->getComments($title);
    var_dump($comments);
    return $comments;
  }

}

// else {
//   $titleChapter = 'Prologue';
//   $commentsByChapter = $Comments->getComments($titleChapter);
// }

// if (isset($_GET["PostClick"]))
// {
//   $Post = $Posts->getPosts($_GET["PostClick"]);
//   $comments = $Comments->getComments($Post->title());
//   require ('view/frontend/home.php');
// }
//
// else
// {
//   $Post = $Posts->getFirstPost();
//   $comments = $Comments->getComments($Post->title());
//   require ('view/frontend/home.php');
// }

// if (isset($_POST['pseudo']))
// {
//   $Comments->addcomments($_POST['titleChapter'],$_POST['pseudo'],$_POST['message']);
// }
//
// if (isset($_POST["IDComment"]))
// {
//   $displayreport = $Comments->displayreportcomment($_POST['IDComment']);
//   var_dump($displayreport);
//   $Comments->updatereportcomment($displayreport, $_POST['IDComment']);
//
// }
