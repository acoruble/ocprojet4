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
    <!-- *********SUPPRIMER UN BILLET EXISTANT************************************************************************************************************* -->

    <div id="content-wrap">
      <h2>Supprimer un billet existant :</h2>

      <!-- *****SELECTIONNER LE CHAPITRE A SUPPRIMER****************************************************************************************************************************************** -->
      <div>
        <form action="moderercommentaires.php" method="post">
          <select multiple class=form-control name = commentaireasupprimer>
            <?php
            $reponse = $bdd->query ('SELECT ID, titreChapitre, pseudo, date, message FROM commentaires ORDER BY nbSignalement DESC');
            while ($donnees = $reponse->fetch())
            {
              ?>
              <option value = "<?php echo $donnees['ID']; ?>"><?php echo $donnees['pseudo']; ?> a écrit : "<?php echo $donnees['message']; ?>" le "<?php echo $donnees['date']; ?>" par rapport au chapitre "<?php echo $donnees['titreChapitre']; ?>"</option>
              <?php
            }
            $reponse->closeCursor();
            ?>
          </select>
          <input type="submit" value="Valider">
        </form>
      </div>
      <div>

        <!-- //***********ENVOI A LA BDD************************************************************************************************************************************************************************************************ -->
        <?php
        if (isset($_POST["commentaireasupprimer"])){
          $req = $bdd->prepare('DELETE FROM commentaires WHERE ID = :ID');
          $req->execute(array(
            'ID' => $_POST["commentaireasupprimer"],
          ));
          echo " Ce commentaire a bien été supprimé !";
          $req->closeCursor();
        }
        ?>

        <footer></footer>
      </div>
    </body>
    </html>
