<?php

require_once("Manager.php");

class UserManager extends Manager
{

  public function check($pseudo, $password)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT password FROM admin WHERE pseudo = :pseudo');
    $req->execute(array('pseudo' => $pseudo));
    $resultat = $req->fetch();
    $isPasswordCorrect = password_verify($password, $resultat['password']);
    return $isPasswordCorrect;
  }

  public function connection($pseudo, $password)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, name FROM admin WHERE pseudo = :pseudo');
    $req->execute(array('pseudo' => $pseudo));
    $resultat = $req->fetch();
    return $resultat;
  }

  public function logout()
  {
    session_destroy();
  }
}

  //
  //
  // public function getFirstPost()
  // {
  //   $db = $this->dbConnect();
  //   $firstPost = $db->query('SELECT id, title, content FROM posts ORDER BY id');
  //   $data = $firstPost->fetch();
  //   return new Posts($data);
  // }
  //
  // public function getPosts($id)
  // {
  //   $db = $this->dbConnect();
  //   $postsById = $db->prepare('SELECT title, content FROM posts WHERE id=? LIMIT 0,1 ');
  //   $postsById->execute(array($id));
  //   $data = $postsById->fetch();
  //   return new Posts($data);
  // }
  //
  //
  // public function getListPosts() {
  //   $posts=[];
  //   $db = $this->dbConnect();
  //   $listPosts = $db->query('SELECT * FROM posts ORDER BY id');
  //   while($data = $listPosts->fetch())
  //   {
  //     $posts[] = new Posts($data);
  //   }
  //   return $posts;
  // }
