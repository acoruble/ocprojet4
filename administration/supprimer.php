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
        <form action="supprimer.php" method="post">
          <select name="chapitreasupprimer" >
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

        <!-- //***********ENVOI A LA BDD************************************************************************************************************************************************************************************************ -->
        <?php
        if (isset($_POST["chapitreasupprimer"])){
          $req = $bdd->prepare('DELETE FROM billets WHERE titre = :titre');
          $req->execute(array(
            'titre' => $_POST["chapitreasupprimer"],
          ));
          echo 'Le billet a bien été supprimé !';
          $req->closeCursor();
        }
        ?>

        <footer></footer>
      </div>
    </body>
    </html>
