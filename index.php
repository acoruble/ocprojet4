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
          echo $donnees["ID"];

          $chapitre_choisi;
          if (isset($_POST["chapitreClique"])) {
            $chapitre_choisi=$_POST["chapitreClique"];
          }
          else {
            if (($_POST["chapitreNavigation"]>=1)&&($_POST["chapitreNavigation"]<=($donnees["ID"]))) {
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

              <!-- **********AJOUTER UN NOUVEAU COMMENTAIRE************************************************************************************ -->

              <form action="commentaires_post.php" method="post">
                <p>
                  <input type="text" name="titreChapitre" value="<?php echo $grand_titre; ?>" />
                  <input type="text" name="pseudo" />
                  <input type="text" name="message" />
                  <input type="submit" value="Valider" />
                </p>
              </form>

              <!-- **********AFFICHER LES COMMENTAIRES ASSOCIES********************************************************************************* -->

              <?php

              $req = $bdd->prepare('SELECT pseudo, date, message FROM commentaires WHERE titreChapitre = ?');
              $req-> execute(array($grand_titre));
              while ($donnees = $req->fetch())
              {
                ?>
                <p>
                  <?php echo $donnees['pseudo'];?> -
                  <?php echo $donnees['date']; ?><br /><br />
                  <?php echo $donnees['message']; ?>
                </p>
                <?php
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


        <!-- <a href="#" class="bouton"><span class="glyphicon glyphicon-arrow-left"></span> Chapitre précédent</a>Recharge la page avec le chapitre précédent et ses commentaires associés</br> -->
        <!-- <a href="#" class="bouton">Chapitre suivant <span class="glyphicon glyphicon-arrow-right"></span></a>Recharge la page avec le chapitre suivant et ses commentaires associés -->
      </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- <script src="js/selectionChapitre.js"></script> -->
  </body>

  </html>
