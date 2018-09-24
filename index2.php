<!-- //*********CONNEXION A LA BDD************************************************************************************************************* --> -->
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
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="theme.css">
  <title>Billet simple pour l'Alaska</title>
  <meta name="description" content="Le nouveau roman de Jean Forteroche">
  <meta name="keywords" content="Roman, Jean Forteroche, Alaska">
  <link rel="icon" href="D:/Pictures/images_web/index.png">
</head>

<body>
  <div class="py-5" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-1 text-info text-center shadow-lg">Billet simple pour l'Alaska</h1>
        </div>
      </div>
    </div>
  </div>

  <!-- ********************************************LISTE DES CHAPITRES******************************************** -->

  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-3 col-md-3 bg-primary rounded border-0 shadow-lg">
          <h1 class="text-center text-light">Liste des chapitres</h1>
          <ul class="nav nav-pills flex-column">
            <?php
            $reponse = $bdd->query('SELECT ID, titre FROM billets ORDER BY ID');
            while($donnees = $reponse->fetch())
            {
              ?>
              <form action="index2.php" method="post">
                <input type="hidden" name="chapitreClique" style="size:0" value="<?php echo $donnees['ID'];?>">
                <input type="submit" name="titreChapitre" class="btn text-center shadow-lg text-info btn-primary btn-lg btn-block text-capitalize" value="<?php echo $donnees['titre'];?>"><br>
              </form>
              <?php
            }
            $reponse->closeCursor();
            ?>
          </ul>
        </div>

        <!-- ***********************CHAPITRE EN LECTURE**************************************************** -->

        <div class="col-md-9 border rounded bg-primary shadow-lg" style="">
          <h1 class="text-center text-light shadow-lg">Chapitre en lecture</h1>

          <?php

          $reponse = $bdd->query('SELECT ID FROM billets ORDER BY ID LIMIT 0,1');
          $premierID = $reponse->fetch();
          $reponse->closeCursor();

          $reponse = $bdd->query("SELECT ID FROM billets ORDER BY ID DESC LIMIT 0,1");
          $dernierID = $reponse->fetch();
          $reponse->closeCursor();

          $chapitreEnLecture;
          $chapitre_navigation;

          if (isset($_POST["chapitreNavigation"])){
            $chapitre_navigation=$_POST["chapitreNavigation"];
          }
          else {
            $chapitre_navigation=0;
          }


          if (isset($_POST["chapitreClique"])) {
            $chapitreEnLecture=$_POST["chapitreClique"];
          }
          else {
            if (($chapitre_navigation>=($premierID['ID']))&&($chapitre_navigation<=($dernierID["ID"]))) {
              $chapitreEnLecture=$chapitre_navigation;
            }
            else {
              $chapitreEnLecture=$premierID['ID'];
            }
          }

          $req = $bdd->prepare('SELECT titre, contenu FROM billets WHERE ID=? LIMIT 0,1 ');
          $req->execute(array($chapitreEnLecture));
          while($donnees = $req->fetch())
          {
            ?>
            <p class="text-light text-left">
              <?php echo $donnees['titre']; ?><br /><br />
              <?php echo $donnees['contenu']; ?>
              <?php $grand_titre=$donnees['titre']; ?>
            </p>
            <?php
          }
          $req->closeCursor();
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- *********************COMMENTAIRES CORRESPONDANTS AUX CHAPITRES********************************************************* -->


  <div class="py-5">
    <div class="container">
      <div class="row bg-primary text-light text-center border-0 shadow-lg rounded-top" style="">
        <div class="col-md-12 my-5 shadow-lg rounded-top" style="">
          <h1 class="shadow-lg" style="">Commentaires<br></h1>
          <div class="col-md-12" style="">

            <!-- **********AJOUTER UN NOUVEAU COMMENTAIRE ************************************************************************************ -->

            <p class="">N'hésitez pas à donner votre avis !</p>
            <form class="text-right" action="index2.php" method="post">
              <input type="hidden" name="titreChapitre" value="<?php echo $grand_titre; ?>" />
              <div class="form-group"> <input type="text" class="form-control" name= "pseudo" placeholder="Pseudo"> </div>
              <div class="form-group"> <input type="text" class="form-control h-25" name="message" placeholder="Commentaire"> </div>
              <button type="submit" class="btn text-center btn-info shadow-lg rounded">Valider</button>
            </form>

            <?php
            if (isset($_POST["pseudo"])) {
              $req = $bdd->prepare('INSERT INTO commentaires(titreChapitre, pseudo, date, message, nbSignalement) VALUES (?,?,?,?,0)');
              $date_time = date("Y-m-d H:i:s");
              $req->execute(array($_POST['titreChapitre'],$_POST['pseudo'],$date_time,$_POST['message']));
            }
            ?>

          </div>
        </div>
      </div>

      <!-- **********AFFICHER LES COMMENTAIRES ASSOCIES********************************************************************************* -->

      <div class="row">
        <div class="col-md-12 bg-primary rounded-bottom py-2 shadow-lg text-center" style="">

          <?php
          $req = $bdd->prepare('SELECT ID, pseudo, date, message FROM commentaires WHERE titreChapitre = ?');
          $req-> execute(array($grand_titre));
          while ($donnees = $req->fetch())
          {
            ?>
            <p class="text-light">
              <?php echo $donnees['pseudo'];?> -
              <?php echo $donnees['date']; ?><br />
              <?php echo $donnees['message']; ?>
            </p>
            <p>
              <form action="index2.php" method="post">
                <input type="hidden" name="IDCommentaire" value=<?php echo $donnees['ID']; ?>>
                <input type="hidden" name="nbSignalementCommentaire" value="1">
                <input type="submit" class="btn text-light btn-info text-center shadow-lg rounded" name="signalerCommentaire" value="Signaler ce commentaire !"><br>
              </form>
            </p>
            <?php
          }
          $req->closeCursor();

          // <!-- **********SIGNALER UN COMMENTAIRE********************************************************************************* -->

          if (isset($_POST["nbSignalementCommentaire"])) {
            $req = $bdd->prepare('SELECT nbSignalement FROM commentaires WHERE ID = ?');
            $req-> execute(array($_POST["IDCommentaire"]));
            while ($donnees = $req->fetch())
            {
              $nouveauNbSignalement=$donnees["nbSignalement"]+1;
              $req = $bdd->prepare('UPDATE commentaires SET nbSignalement = :nbSignalement WHERE  ID = :IDCommentaire');
              $req->execute(array(
                'nbSignalement' => $nouveauNbSignalement,
                'IDCommentaire' => $_POST["IDCommentaire"],
              ));
            }
          }
          $req->closeCursor();
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- ****************PIED DE PAGE : CHANGER DE CHAPITRES******************************************************************* -->

  <div class="py-5">
    <div class="container">
      <div class="row" style="">
        <div class="col-md-6 text-right" style="">
          <form action="index2.php" method="post">
            <input type="hidden" name="chapitreNavigation" value="<?php echo $chapitreEnLecture-1;?>"><br><br>
            <input type="submit" class="btn btn-info text-uppercase rounded shadow-lg" name="boutonPrecedent" value="Chapitre précédent"><br>
          </form>
        </div>

        <div class="col-md-6 text-left">
          <form action="index2.php" method="post">
            <input type="hidden" name="chapitreNavigation" value="<?php echo $chapitreEnLecture+1;?>"><br><br>
            <input type="submit" class="btn btn-info text-uppercase rounded shadow-lg" name="boutonSuivant" value="Chapitre suivant"><br>
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
