<?php

require('model.php');

function listBillets()
{
  $req = getAllBillets();
  require('affichageAccueil.php');
}

function billets()
{
  if (isset($_GET['chapitreClique']) && $_GET['chapitreClique'] > 0) {
      $billet = getBillet($_GET['chapitreClique']);
      $commentaire = getCommentaires($_GET['titreChapitre']);
      require('billetsvue.php');
  }
  else {
      echo 'Erreur : aucun identifiant de billet envoyé';
  }
}

?>

<!-- // $reponse = $bdd->query('SELECT ID, titre FROM billets ORDER BY ID');
//
// $reponse = $bdd->query('SELECT ID FROM billets ORDER BY ID LIMIT 0,1');
// $premierID = $reponse->fetch();
// $reponse->closeCursor();
//
// $reponse = $bdd->query("SELECT ID FROM billets ORDER BY ID DESC LIMIT 0,1");
// $dernierID = $reponse->fetch();
// $reponse->closeCursor(); -->
