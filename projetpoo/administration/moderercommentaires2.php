<!-- //*********CONNEXION A LA BDD************************************************************************************************************* -->

    <?php
    // On démarre la session AVANT d'écrire du code HTML
session_start();
if (empty($_SESSION['ID']) OR empty($_SESSION['Nom'])) {
  header('Location: http://localhost/tests/Exercices/projet/index2.php');
exit();
}
require_once('../config.php');
    ?>
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

<body style="	box-shadow: 0px 0px 4px  black;">
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

      <!-- *********SUPPRIMER UN BILLET EXISTANT************************************************************************************************************* -->

  <div class="p-2" style="">
    <div class="container">
      <div class="row bg-primary text-light text-center border-0 shadow-lg rounded-top" style="">
        <div class="col-md-12 shadow-lg rounded-top" style="">
          <h1 class="shadow-lg" style="">Supprimer un commentaire existant :<br></h1>
        </div>
      </div>

      <!-- *****SELECTIONNER LE CHAPITRE A SUPPRIMER****************************************************************************************************************************************** -->

      <div class="row">
        <div class="bg-primary rounded-bottom text-center py-2 shadow-lg col-md-12" style="" >
                  <form action="moderercommentaires2.php" method="post">
          <select multiple="" class="form-control shadow-lg border border-primary rounded" name="commentaireasupprimer">
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
          </select><button type="submit" class="btn btn-info btn-lg">Valider<br></button>
          </form>

        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
