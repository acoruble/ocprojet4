<?php
/**
*
*/
class BilletsManager
{
  private $_db; //Instance de BDD

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Billets $chapitre)
  {
    $req = $this->_db->prepare('INSERT INTO billets(titre, contenu) VALUES(:titre, :contenu)');

    $req->bindValue(':titre', $chapitre->titre(), PDO::PARAM_INT);
    $req->bindValue(':contenu', $chapitre->contenu(), PDO::PARAM_INT);

    $req->execute();
  }

  public function delete(Billets $chapitre)
  {
    $this->_db->exec('DELETE FROM billets WHERE ID = '.$chapitre->id());
  }

  public function get($ID)
  {
    $id = (int) $id;
    $req = $this->_db->query('SELECT ID, titre, contenu FROM billets WHERE ID = '.$id);
    $donnees = $req->fetch(PDO::FETCH_ASSOC);
    return new Billets($donnees);
  }

  public function getList()
  {
    $chapitres = [];
    $req = $this->_db->query('SELECT ID, titre, contenu FROM billets ORDER BY ID');
    while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
    {
      $chapitres[] = new Billets($donnees);
    }
    return $chapitres;
  }

  public function update(Billets $chapitre)
  {
    $req = $this->_db->prepare('UPDATE billets SET titre = :titre, contenu = :contenu WHERE ID = :id');
    $req->bindValue(':titre', $chapitre->titre(), PDO::PARAM_INT);
    $req->bindValue(':contenu', $chapitre->contenu(), PDO::PARAM_INT);
    $req->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}

?>
