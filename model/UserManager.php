<?php

require_once("Manager.php");

class UserManager extends Manager
{

  public function connection($pseudo, $password)
  {
    $db = $this->dbConnect();
    // $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //  Récupération de l'utilisateur et de son pass hashé
    $req = $db->prepare('SELECT ID, password, Name FROM admin WHERE pseudo = :pseudo');
    $req->execute(array('pseudo' => $pseudo));

    $resultat = $req->fetch();
    $isPasswordCorrect = password_verify($password, $resultat['password']);
    if(!$isPasswordCorrect)
    {
      echo 'Mauvais identifiant ou mot de passe !';
    }
    else
    {
      session_start();
      $_SESSION['ID'] = $resultat['ID'];
      $_SESSION['Nom'] = $resultat['Name'];
    };
    // return $createPost;
  }
  //
  //
  // public function getFirstPost()
  // {
  //   $db = $this->dbConnect();
  //   $firstPost = $db->query('SELECT ID, title, content FROM posts ORDER BY ID');
  //   $data = $firstPost->fetch();
  //   return new Posts($data);
  // }
  //
  // public function getPosts($ID)
  // {
  //   $db = $this->dbConnect();
  //   $postsById = $db->prepare('SELECT title, content FROM posts WHERE ID=? LIMIT 0,1 ');
  //   $postsById->execute(array($ID));
  //   $data = $postsById->fetch();
  //   return new Posts($data);
  // }
  //
  //
  // public function getListPosts() {
  //   $posts=[];
  //   $db = $this->dbConnect();
  //   $listPosts = $db->query('SELECT * FROM posts ORDER BY ID');
  //   while($data = $listPosts->fetch())
  //   {
  //     $posts[] = new Posts($data);
  //   }
  //   return $posts;
  // }

}
