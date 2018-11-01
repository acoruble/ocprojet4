<?php

require_once("Manager.php");

class PostsManager extends Manager
{

  public function createPost($title, $content)
  {
    $db = $this->dbConnect();
    $createPost = $db->prepare('INSERT INTO posts(title, content) VALUES(:title, :content)');
    $createPost -> execute(array(
      'title' => $title,
      'content' => $content,
    ));
  }


  public function getFirstPost()
  {
    $db = $this->dbConnect();
    $firstPost = $db->query('SELECT ID, title, content FROM posts ORDER BY ID');
    $data = $firstPost->fetch();
    return new Posts($data);
  }

  public function getPosts($ID)
  {
    $db = $this->dbConnect();
    $postsById = $db->prepare('SELECT title, content FROM posts WHERE ID=? LIMIT 0,1 ');
    $postsById->execute(array($ID));
    $data = $postsById->fetch();
    return new Posts($data);
  }


  public function getListPosts() {
    $posts=[];
    $db = $this->dbConnect();
    $listPosts = $db->query('SELECT * FROM posts ORDER BY ID');
    while($data = $listPosts->fetch())
    {
      $posts[] = new Posts($data);
    }
    return $posts;
  }

  public function delete($chapter) {
    $db = $this->dbConnect();
    $delete= $db->prepare('DELETE FROM posts WHERE ID=?');
    $delete->execute(array($chapter));
}

}
