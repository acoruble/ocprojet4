<?php

require_once("Manager.php");

class BilletsManager extends Manager
{

  public function getFirstBillet()
  {
    $db = $this->dbConnect();
    $firstBillet = $db->query('SELECT ID, titre, contenu FROM billets ORDER BY ID');
    return $firstBillet;
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////////////

  public function getBillets($ID)
  {
    $db = $this->dbConnect();
    $BilletsById = $db->prepare('SELECT titre, contenu FROM billets WHERE ID=? LIMIT 0,1 ');
    $BilletsById->execute(array($ID));
    return $BilletsById;
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////////////


  public function getListeBillets() {
    $db = $this->dbConnect();
    $ListeBillets = $db->query('SELECT ID, titre FROM billets ORDER BY ID');
    return $ListeBillets;
  }

}
?>
