<?php

require_once("Manager.php");

class PostsManager extends Manager
{

  public function createPost($titre, $contenu)
  {
    $db = $this->dbConnect();
    $createPost = $db->prepare('INSERT INTO billets(titre, contenu) VALUES(:titre, :contenu)');
    $createPost->execute(array(
      'titre' => $titre,
      'contenu' => $contenu,
    ));
    // return $createPost;
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////////////


  public function getFirstPost()
  {
    $db = $this->dbConnect();
    $firstPost = $db->query('SELECT ID, title, content FROM posts ORDER BY ID');
    $data = $firstPost->fetch();
    return new Posts($data);
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////////////

  public function getPosts($ID)
  {
    $db = $this->dbConnect();
    $PostsById = $db->prepare('SELECT title, content FROM posts WHERE ID=? LIMIT 0,1 ');
    $PostsById->execute(array($ID));
    $data = $PostsById->fetch();
    return new Posts($data);
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////////////


  public function getListPosts() {
    $posts=[];
    $db = $this->dbConnect();
    $ListPosts = $db->query('SELECT * FROM posts ORDER BY ID');
    while($data = $ListPosts->fetch())
    {
      $posts[] = new Posts($data);
    }
    return $posts;
  }

}
