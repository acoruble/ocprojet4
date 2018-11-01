<?php

/**
 *
 */
class BackEnd
{

  public function connection()
  {
    require ('view/backend/connection.php');
  }

  public function board()
  {
    $posts = new Posts();
    $listPost = $posts->getListPosts();
    require ('view/backend/board.php');
  }

  public function displayAdmin($pseudo, $password)
  {
    $user = new User();
    $user->connection($pseudo, $password);
    require ('view/backend/createpost.php');
  }
  public function create($title, $content)
  {
    $posts = new Posts();
    $posts->createPost($title, $content);
    require ('view/backend/createpost.php');
  }

  public function delete($chapter)
  {
    $posts = new Posts();
    $listPosts = $posts->getListPosts();
    $posts->delete($chapter);
    require ('view/backend/deletepost.php');
  }

  public function update()
  {
    $posts = new Posts();
    $post = $posts-> getPosts($_GET['id']);
    require ('view/backend/updatepost.php');
  }

  public function control()
  {
    $comments = new Comments();
    $listComments = $comments->getListComments();
    require ('view/backend/controlcomments.php');
  }
}
// require ('model/Posts.php');
// require ('model/Comments.php');

// <!-- //***********ENVOI A LA BDD************************************************************************************************************************************************************************************************ -->
// $errorTitre = $errorContenu = "";
//
// if (!empty($_POST)){
//   $validation = true;
//   if (empty($_POST['titre'])) {
//     $errorTitre = "Titre vide !";
//     $validation = false;
//   }
//   if (empty($_POST['contenu'])) {
//     $errorContenu = "Contenu vide !";
//     $validation = false;
//   }
//   if ($validation) {
//     $createPost = $posts->createPost("titre","contenu");
//     echo 'Le billet a bien été ajouté !';
//     $req->closeCursor();
//   }
// }
//
//   require ('view/backend/CreatePost.php');
//
//


// On démarre la session AVANT d'écrire du code HTML

// session_start();
// if (empty($_SESSION['ID']) OR empty($_SESSION['Nom'])) {
//   header('Location: http://localhost/tests/Exercices/projet/index2.php');
// exit();
// }
