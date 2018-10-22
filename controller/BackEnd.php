<?php
// require ('model/Posts.php');
// require ('model/Comments.php');

$Posts = new Posts();
$Comments = new Comments();

// <!-- //***********ENVOI A LA BDD************************************************************************************************************************************************************************************************ -->
$errorTitre = $errorContenu = "";

if (!empty($_POST)){
  $validation = true;
  if (empty($_POST['titre'])) {
    $errorTitre = "Titre vide !";
    $validation = false;
  }
  if (empty($_POST['contenu'])) {
    $errorContenu = "Contenu vide !";
    $validation = false;
  }
  if ($validation) {
    $createPost = $Posts->createPost("titre","contenu");
    echo 'Le billet a bien été ajouté !';
    $req->closeCursor();
  }
}

  require ('view/backend/CreatePost.php');

?>


// On démarre la session AVANT d'écrire du code HTML

session_start();
if (empty($_SESSION['ID']) OR empty($_SESSION['Nom'])) {
  header('Location: http://localhost/tests/Exercices/projet/index2.php');
exit();
}

?>
