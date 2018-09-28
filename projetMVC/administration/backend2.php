<?php
// On démarre la session AVANT d'écrire du code HTML

session_start();
if (empty($_SESSION['ID']) OR empty($_SESSION['Nom'])) {
  header('Location: http://localhost/tests/Exercices/projet/index2.php');
exit();
}
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
    //*********CONNEXION A LA BDD************************************************************************************************************* -->
    require_once('../config.php');
    $req = $bdd->prepare('INSERT INTO billets(titre, contenu) VALUES(:titre, :contenu)');
    $req->execute(array(
      'titre' => $_POST["titre"],
      'contenu' => $_POST["contenu"],
    ));
    echo 'Le billet a bien été ajouté !';
    $req->closeCursor();
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../theme.css" type="text/css">
  <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: 'textarea'
  });
</script>
<title>Billet simple pour l'Alaska</title>
<meta name="description" content="Le nouveau roman de Jean Forteroche">
<meta name="keywords" content="Roman, Jean Forteroche, Alaska">
<link rel="icon" href="D:/Pictures/images_web/index.png">
</head>

<body style="	box-shadow: 0px 0px 4px  black;" >
  <?php
  echo $errorTitre;
  echo $errorContenu;
   ?>
  <div class="p-2" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-12 rounded border border-primary bg-primary">
          <ul class="nav nav-pills bg-primary text-light text-center shadow-lg justify-content-center">
            <li class="nav-item w-20" > <a href="backend2.php" class="nav-link"> Créer un billet</a> </li>
            <li class="nav-item w-20"> <a class="nav-link" href="modifier2.php">Modifier un billet</a> </li>
            <li class="nav-item w-20"> <a href="supprimer2.php" class="nav-link">Supprimer un billet</a> </li>
            <li class="nav-item w-20"> <a href="moderercommentaires2.php" class="nav-link">Modérer les commentaires</a> </li>
            <li class="nav-item w-20"> <a href="deconnexion.php" class="nav-link">Se déconnecter</a> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center display-4 p-1 text-info">Bienvenue <?php if (isset($_SESSION['ID']) AND isset($_SESSION['Nom']))
          {
              echo $_SESSION['Nom'];
          }?>!</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="p-2" style="">
    <div class="container">
      <div class="row bg-primary text-light text-center border-0 shadow-lg rounded-top" style="">
        <div class="col-md-12 shadow-lg rounded-top" style="">

          <!-- *********CREATION NOUVEAU BILLET************************************************************************************************************* -->

          <h1 class="shadow-lg" style="">Créer un nouveau billet :<br></h1>
          <div class="row">
            <div class="col-md-12">
              <form action="backend2.php" method="post">
                <div class="form-group"> <small class="form-text text-muted"></small> </div>
                <div class="form-group"> <input type="text" class="form-control text-info" placeholder="Titre du chapitre" name="titre"> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="bg-primary rounded-bottom text-center py-2 shadow-lg col-md-12" style="">
            <textarea id="mytextarea" class="form-control form-control-lg text-primary text-left" name="contenu">Blablabla...</textarea>
          </br>
          <button type="submit" class="btn btn-info btn-lg">Publier<br></button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
