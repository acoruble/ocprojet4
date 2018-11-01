<?php
require('model/Manager.php');
require('model/PostsManager.php');
require('model/CommentsManager.php');
require('model/UserManager.php');
require('model/Comments.php');
require('model/Posts.php');
require('model/User.php');
require('controller/FrontEnd.php');
require('controller/BackEnd.php');

$frontend = new FrontEnd();
$backend = new BackEnd();

if (empty($_SERVER["QUERY_STRING"])) {
  $frontend->home();
}

elseif (isset($_GET['action'])) {
  if ($_GET['action'] === 'selectChapter') {
    $frontend->selectChapter($_POST['PostClick']);
  }

  if ($_GET['action'] === 'newComment') {
    $frontend->newComment($_POST['titleChapter'],$_POST['pseudo'],$_POST['message']);
    $frontend->home();
  }

  if ($_GET['action'] === 'notifycomment') {
    $frontend->notifyComments($_POST['IDComment']);
    $frontend->home();
  }
}

  elseif (isset($_GET['admin'])) {
    if ($_GET['admin'] === 'connection') {
      if (empty($_SESSION['ID']) OR empty($_SESSION['Nom']))
      {
        $backend->connection();
      }
      else {
        $backend->displayAdmin($_POST['pseudo'], $_POST['password']);
      }
    }

    if ($_GET['admin'] === 'log') {
        $backend->displayAdmin($_POST['pseudo'], $_POST['password']);
    }

    if ($_GET['admin'] === 'board') {
      $backend->board();
    }

    if ($_GET['admin'] === 'createpost') {
      $backend->create($_POST['title'],$_POST['content']);
    }

    if ($_GET['admin'] === 'updatepost') {
      $backend->update();
    }

    if ($_GET['admin'] === 'deletepost') {
      $backend->delete($_POST['idChapterDelete']);
    }

    if ($_GET['admin'] === 'controlcomments') {
      $backend->control();
    }
    if ($_GET['admin'] === 'logout') {
      // $backend->create($_POST['title'],$_POST['content']);
    }

  }
