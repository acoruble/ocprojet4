<!DOCTYPE html>
<html>
<head>
  <title>
    <?= isset($title) ? $title : 'Mon super site' ?>
  </title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: 'textarea'
  });
</script>
</head>

<body>
  <div id="wrap">
    <header>
      <h1>Bienvenue !</h1>
    </header>
    <nav class = "navbar navbar-expand-lg navbar-light bg-light">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="backend.php">Créer un billet</a></li>
        <li class="nav-item"><a class="nav-link" href="modifier.php">Modifier un billet</a></li>
        <li class="nav-item"><a class="nav-link" href="supprimer.php">Supprimer un billet</a></li>
        <li class="nav-item"><a class="nav-link" href="moderercommentaires.php">Modérer les commentaires</a></li>
      </ul>
    </nav>

    <!-- *********CREATION NOUVEAU BILLET************************************************************************************************************* -->

    <div id="content-wrap">
      <h2>Créer un nouveau billet :</h2>
      <div>
        <form action="backend.php" method="post">
          <textarea name="titre">Titre du chapitre</textarea>
          <textarea id="mytextarea" name="contenu">Blablabla...</textarea>
          <input type="submit" name="titreChapitre" value="Publier">
        </form>
      </div>
    </div>

    <!-- //*********CONNEXION A LA BDD************************************************************************************************************* -->

    <?php
    try
    {
      // $bdd = new PDO('mysql:host=db754453329.db.1and1.com;dbname=db754453329;charset=utf8', 'dbo754453329', 'Lisaume14*');
      $bdd = new PDO('mysql:host=localhost;dbname=ocprojet4;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }
    //***********ENVOI A LA BDD************************************************************************************************************************************************************************************************
    if (isset($_POST["contenu"])){
      $req = $bdd->prepare('INSERT INTO billets(titre, contenu) VALUES(:titre, :contenu)');
      $req->execute(array(
        'titre' => $_POST["titre"],
        'contenu' => $_POST["contenu"],
      ));
      echo 'Le billet a bien été ajouté !';
      $req->closeCursor();
    }
    ?>

    <footer></footer>
  </div>
</body>
</html>
