<!DOCTYPE html>
<html lang="en">

<head>
  <title>Alaska : Le Blog</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
  <div class="container">
    <header class="row">
      <div class="col-lg-12 bienvenue">
        <h1>Billet simple pour l'Alaska</h1>
      </div>
    </header>
    <!-- ********************************************LISTE DES CHAPITRES******************************************** -->
    <div class="row">
      <nav class="col-lg-3 liste_des_chapitres">
        <p class="titre">Liste des chapitres</p>
        <p>
          <?php
          try
          {
            $bdd = new PDO('mysql:host=localhost;dbname=ocprojet4;charset=utf8', 'root', '');
          }
          catch (Exception $e)
          {
            die('Erreur : ' . $e->getMessage());
          }

          $reponse = $bdd->query('SELECT ID, titre FROM billets ORDER BY ID');
          while($donnees = $reponse->fetch())
          {
            ?>
            <p>

              <form action="index.php" method="post">
                <input type="hidden" name="chapitreClique" value="<?php echo $donnees['ID'];?>"><br><br>
                <input type="submit" name="titreChapitre" value="<?php echo $donnees['titre'];?>"><br>
              </form>
            </p>
            <?php
          }
          $reponse->closeCursor();
          ?>
        </nav>

        <!-- ***********************CHAPITRE EN LECTURE**************************************************** -->


        <section class="col-lg-9 chapitre">
          <p class="titre">Chapitre en lecture</p>
          <?php
          $req = $bdd->query("SELECT COUNT(*) AS ID FROM billets");
          $donnees = $req->fetch();
          $req->closeCursor();

          $chapitre_choisi;
          $chapitre_navigation;
          if (isset($_POST["chapitreNavigation"])){
            $chapitre_navigation=$_POST["chapitreNavigation"];
          }
          else {
            $chapitre_navigation=0;
          }
          if (isset($_POST["chapitreClique"])) {
            $chapitre_choisi=$_POST["chapitreClique"];
          }
          else {
            if (($chapitre_navigation>=1)&&($_POST["chapitreNavigation"]<=($donnees["ID"]))) {
              // && ($_POST["chapitreNavigation"]<= {
              $chapitre_choisi=$_POST["chapitreNavigation"];
            }
            else {
              $chapitre_choisi=1;
            }
          }

          $req = $bdd->prepare('SELECT titre, contenu FROM billets WHERE ID=? ORDER BY ID LIMIT 0,1 ');
          $req->execute(array($chapitre_choisi));
          while($donnees = $req->fetch())
          {
            ?>
            <p>
              <?php echo $donnees['titre']; ?><br /><br />
              <?php echo $donnees['contenu']; ?>
              <?php $grand_titre=$donnees['titre']; ?>
            </p>
            <?php
          }
          $req->closeCursor();
          ?>

          <!-- *********************COMMENTAIRES CORRESPONDANTS AUX CHAPITRES********************************************************* -->


          <div class="row">
            <nav class="col-lg-12 commentaires">
              <p class="titre">Commentaires </p></br>

              <!-- **********AJOUTER UN NOUVEAU COMMENTAIRE ?????????????????????????? /!\ DEFAILLANT /!\************************************************************************************ -->

              <form action="index.php" method="post">
                <input type="hidden" name="titreChapitre" value="<?php echo $grand_titre; ?>" />

                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" />

                <label for="message">Commentaire :</label>
                <input type="text" name="message" />

                <input type="submit" value="Valider" />
              </form>

              <?php
              if (isset($_POST["titreChapitre"])) {
                $req = $bdd->prepare('INSERT INTO commentaires(titreChapitre, pseudo, date, message, nbSignalement) VALUES (?,?,?,?,0)');
                $date_time = date("Y-m-d H:i:s");
                $req->execute(array($_POST['titreChapitre'],$_POST['pseudo'],$date_time,$_POST['message']));
              }
              ?>

              <!-- **********AFFICHER LES COMMENTAIRES ASSOCIES********************************************************************************* -->

              <?php
              $req = $bdd->prepare('SELECT ID, pseudo, date, message FROM commentaires WHERE titreChapitre = ?');
              $req-> execute(array($grand_titre));
              while ($donnees = $req->fetch())
              {
                ?>
                <p>
                  <?php echo $donnees['pseudo'];?> -
                  <?php echo $donnees['date']; ?><br /><br />
                  <?php echo $donnees['message']; ?>
                </p><br />
                <form action="index.php" method="post">
                  <input type="hidden" name="IDCommentaire" value=<?php echo $donnees['ID']; ?>>
                  <input type="hidden" name="nbSignalementCommentaire" value="1">
                  <input type="submit" name="signalerCommentaire" value="Signaler ce commentaire !"><br>
                </form><br /><br />
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
            </nav>
          </div>
        </section>
      </div>

      <!-- ****************PIED DE PAGE : CHANGER DE CHAPITRES******************************************************************* -->


      <footer>
        <form action="index.php" method="post">
          <input type="hidden" name="chapitreNavigation" value="<?php echo $chapitre_choisi-1;?>"><br><br>
          <input type="submit" name="boutonPrecedent" value="Chapitre précédent"><br>
        </form>

        <form action="index.php" method="post">
          <input type="hidden" name="chapitreNavigation" value="<?php echo $chapitre_choisi+1;?>"><br><br>
          <input type="submit" name="boutonSuivant" value="Chapitre suivant"><br>
        </form>

      </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- <script src="js/selectionChapitre.js"></script> -->
  </body>

  </html>
