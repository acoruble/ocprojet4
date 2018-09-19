<!DOCTYPE html>
<html>
<head>
  <title>
    <?= isset($title) ? $title : 'Mon super site' ?>
  </title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="/css/Envision.css" type="text/css" />
  <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'
  });
</script>
</head>

<body>
  <div id="wrap">
    <header>
      <h1>Bienvenue !</h1>
    </header>
    <nav>
      <ul>
        <li><a href="backend.php">Créer un billet</a></li>
        <li><a href="modifier.php">Modifier un billet</a></li>
        <li><a href="supprimer.php">Supprimer un billet</a></li>
        <li><a href="moderercommentaires.php">Modérer les commentaires</a></li>
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
