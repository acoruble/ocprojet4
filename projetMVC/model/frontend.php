<?php
function dbConnect() {
  try
  {
      // $bdd = new PDO('mysql:host=db754453329.db.1and1.com;dbname=db754453329;charset=utf8', 'dbo754453329', 'Lisaume14*');
      $db = new PDO('mysql:host=localhost;dbname=ocprojet4;charset=utf8', 'root', '');
      return $db;
  }
  catch (Exception $e)
  {
      die('Erreur : ' . $e->getMessage());
  }
}

function getAllBillets()
{
  $db = dbConnect();
  var_dump($db);
  $req = $db->query('SELECT ID, titre, contenu FROM billets');

  return $req;
}

function getBillets($billetsID)
{
  $db = dbConnect();
  $req = $db->prepare('SELECT titre, contenu FROM billets WHERE ID=? LIMIT 0,1 ');
  $req->execute(array($billetsID));
  $billet = $req->fetch();

  return $billet;

}

function getCommentaires($grand_titre)
{
  $db = dbConnect();
  $commentaires = $db->prepare('SELECT ID, pseudo, date, message FROM commentaires WHERE titreChapitre = ?');
  $commentaires->execute(array($grand_titre));

  return $commentaires;

}

?>
