<?php
require('model/Manager.php');
require('model/PostsManager.php');
require('model/CommentsManager.php');
require('model/Comments.php');
require('model/Posts.php');
require('controller/FrontEnd.php');
// require('controller/BackEnd.php');
$frontend = new FrontEnd();

if (empty($_SERVER["QUERY_STRING"])) {
    $frontend->home();
}

elseif (isset($_GET['action'])) {
    if ($_GET['action'] == 'selectChapter') {
      $frontend->selectChapter($_GET['titleChapter']);
    }
  }
//     // elseif ($_GET['action'] == 'post') {
//     //     if (isset($_GET['id']) && $_GET['id'] > 0) {
//     //       $frontend = new FrontEnd();
//     //       $frontend->post();
//     //     }
//     //     else {
//     //         echo 'Erreur : aucun identifiant de billet envoyé';
//     //     }
//     // }
// }
// else {
//   $frontend = new FrontEnd();
//   $frontend->getListPosts();
// }
