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
    selector: 'textarea'
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
    ?>

    <!-- *********MODIFIER UN BILLET EXISTANT************************************************************************************************************* -->

    <div id="content-wrap">
      <h2>Modifier un billet existant :</h2>

      <!-- *****SELECTIONNER LE CHAPITRE A MODIFIER****************************************************************************************************************************************** -->
      <div>
        <form action="modifier.php" method="post">
          <select name="chapitreamodifier" >
            <?php
            $reponse = $bdd->query ('SELECT titre FROM billets');
            while ($donnees = $reponse->fetch())
            {
              ?>
              <option><?php echo $donnees['titre']; ?></option>
              <?php
            }
            $reponse->closeCursor();
            ?>
          </select>
          <input type="submit" value="Valider">
        </form>
      </div>
      <div>
        <?php
        if (isset($_POST["chapitreamodifier"]))
        {
          ?><p>Vous modifier le chapitre : "<?php echo $_POST["chapitreamodifier"] ?>"</p>
          <?php
        }
        else {
          ?><p>Merci de sélectionner un chapitre à modifier dans la liste déroulante.</p>
          <?php
        }
        ?>

        <!-- *********************AFFICHER LE TEXTE A MODIFIER***************************************************************************************************************** -->
        <form action="modifier.php" method="post">
          <textarea name="contenu">
            <?php
            if (isset($_POST["chapitreamodifier"])){
              $req = $bdd->prepare('SELECT contenu FROM billets WHERE titre=?');
              $req->execute(array($_POST["chapitreamodifier"]));
              while ($donnees = $req->fetch())
              {
                echo $donnees["contenu"];
              }
              $req->closeCursor();
            }
            else {
              echo "Merci de sélectionner un chapitre à modifier dans la liste déroulante.";
            }
            ?>
          </textarea>
          <input type="hidden" name="titreChapitre" value="
          <?php
          if (isset($_POST["chapitreamodifier"]))
          {
            echo $_POST["chapitreamodifier"];
          }
          else
          {
            echo "";
          }
          ?>
          "><br><br>

          <input type="submit" value="Publier">
        </form>
      </div>
    </div>

    <!-- //***********ENVOI A LA BDD DES MODIFICATIONS !!!!!! /!\DEFAILLANT /!\  ************************************************************************************************************************************************************************************************ -->
    <?php
    if (isset($_POST["titreChapitre"])){
      $req = $bdd->prepare('UPDATE billets SET contenu = :contenu WHERE titre = :titre');
      $req->execute(array(
        'titre' => $_POST["titreChapitre"],
        'contenu' => $_POST["contenu"],
      ));
      echo $_POST["titreChapitre"];
      echo $_POST["contenu"];
      echo 'Le billet a bien été modifié !';
      $req->closeCursor();
    }
    ?>

    <footer></footer>
  </div>
</body>
</html>
