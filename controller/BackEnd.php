<?php

/**
*
*/
class backend
{

  public function board()
  {
    $posts = new Posts();
    $listPost = $posts->getListPosts();
    require ('view/backend/board.php');
  }

  public function session()
  {
    if (!is_string($_POST['pseudo']) || empty($_POST['pseudo']) || (!is_string($_POST['password']) || empty($_POST['password'])) )
    {
      echo "<div class='alert alert-danger' role='alert'>Pseudo ou mot de passe invalide.</div>";
      require ('view/frontend/connection.php');
    }
    else {
      $user = new User();
      $correct = $user->check($_POST['pseudo'], $_POST['password']);
      if ($correct) {
        $user = $user->connection($_POST['pseudo'], $_POST['password']);
        $_SESSION['id'] = $user['id'];
        $_SESSION['nom'] = $user['name'];
        header('Location: index.php?admin=board');
      }
      else {
        echo "<div class='alert alert-danger' role='alert'>Pseudo ou mot de passe invalide.</div>";
        require ('view/frontend/connection.php');
      }
    }

  }

  public function create()
  {
    if (!is_string($_POST['title']) || empty($_POST['title']) || !is_string($_POST['content']) || empty($_POST['content']))
    {
      echo "<div class='alert alert-danger' role='alert'>Merci de vérifier votre titre et votre texte.</div>";
      require ('view/backend/createpost.php');
    }
    else {
      $posts = new Posts();
      $posts->createPost(htmlspecialchars($_POST['title']),$_POST['content']);
      header('Location: index.php?admin=board');
    }
  }

  public function delete()
  {
    $posts = new Posts();
    $correct = $posts-> existPost($_GET['idChapterDelete']);
    if (!$correct)
    {
      header('Location: index.php?admin=board');
      echo "<div class='alert alert-danger' role='alert'>Nous avons un problème, merci de recommencer votre suppression.</div>";
    }
    else
    {
      $posts->delete($_GET['idChapterDelete']);
    }
  }

  public function update()
  {
    $posts = new Posts();
    $correct = $posts-> existPost($_GET['id']);
    if (!$correct)
    {
      header('Location: index.php?admin=board');
      echo "<div class='alert alert-danger' role='alert'>Merci de sélectionner un chapitre.</div>";
    }
    else
    {
      $post = $posts-> getPosts($_GET['id']);
      require ('view/backend/updatepost.php');
    }
  }

  public function postupdate()
  {
    $posts = new Posts();
    $correct = $posts-> existPost($_POST['id']);
    if (!$correct)
    {
      echo "<div class='alert alert-danger' role='alert'>Merci de sélectionner un chapitre.</div>";
    }
    else
    {
    $posts-> update($_POST['id'], $_POST['title'], $_POST['content']);
    }
  }

  public function control()
  {
      $posts = new Posts();
      $correct = $posts-> existPost($_GET['id']);
      if (!$correct)
      {
        echo "<div class='alert alert-danger' role='alert'>Merci de sélectionner un chapitre.</div>";
      }
      else
      {
        $comments = new Comments();
        $listComments = $comments->getComments($_GET['titleChapter']);
        require ('view/backend/controlcomments.php');
      }
  }

  public function deletecomment()
  {
    $comments = new Comments();
    $correct = $comments-> existComment($_GET['id']);
    if (!$correct)
    {
      echo "<div class='alert alert-danger' role='alert'>Nous avons un problème, merci de recommencer votre signalement.</div>";
    }
    else
    {
      $comment = new Comments();
      $comment->delete($_GET['id']);
    }
  }

  public function logout()
  {
    $user = new User();
    $user->logout();
  }
}
