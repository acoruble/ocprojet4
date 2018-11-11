<?php
session_start();
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
    $frontend->selectChapter();
  }
  elseif ($_GET['action'] === 'newcomment') {
    $frontend->newcomment();
    $frontend->home();
  }
  elseif ($_GET['action'] === 'notifycomment') {
    $frontend->notifyComments();
    $frontend->home();
  }
  elseif ($_GET['action'] === 'connection') {
    if (empty($_SESSION['id']) OR empty($_SESSION['nom']))
    {
      $frontend->connection();
    }
    else {
      $backend->board();
    }
  }
  elseif ($_GET['action'] === 'login') {
    $backend->session();
  }
}

elseif (isset($_GET['admin'])) {

  if(isset($_SESSION['nom']) && isset($_SESSION['id']))
  {
    if ($_GET['admin'] === 'board') {
      $backend->board();
    }
    elseif ($_GET['admin'] === 'createpost') {
      $backend->create();
    }

    elseif ($_GET['admin'] === 'updatepost') {
      $backend->update();
    }
    elseif ($_GET['admin'] === 'postupdate') {
      $backend->postupdate();
      $backend->board();
    }

    elseif ($_GET['admin'] === 'deletepost') {
      $backend->delete();
      $backend->board();
    }

    elseif ($_GET['admin'] === 'controlcomments') {
      $backend->control();
    }

    elseif ($_GET['admin'] === 'deletecomment') {
      $backend->deletecomment();
      $backend->board();
    }

    elseif ($_GET['admin'] === 'logout') {
      $backend->logout();
      $frontend->home();
    }
  }
  else {
    $frontend->home();
  }
}
