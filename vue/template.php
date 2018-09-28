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
            while($donnees = $ListeBillets->fetch())
            {
              ?>
              <form action="index.php" method="get">
                <input type="hidden" name="chapitreClique" style="size:0" value="<?php echo $donnees['ID'];?>">
                <input type="submit" name="titreChapitre" class="btn text-center shadow-lg text-info btn-primary btn-lg btn-block text-capitalize" value="<?php echo $donnees['titre'];?>"><br>
              </form>
              <?php
            }
            $ListeBillets->closeCursor();
            ?>
          </ul>
        </div>

        <!-- ***********************CHAPITRE EN LECTURE**************************************************** -->

        <div class="col-md-9 border rounded bg-primary shadow-lg" style="">
          <h1 class="text-center text-light shadow-lg">Chapitre en lecture</h1>
          <?= $content ?>
        </div>
      </div>
    </div>
  </div>

  <!-- ****************PIED DE PAGE : CHANGER DE CHAPITRES******************************************************************* -->

  <!-- <div class="py-5">
    <div class="container">
      <div class="row" style="">
        <div class="col-md-6 text-right" style="">
          <form action="index2.php" method="post">
            <input type="hidden" name="chapitreNavigation" value=""><br><br>
            <input type="submit" class="btn btn-info text-uppercase rounded shadow-lg" name="boutonPrecedent" value="Chapitre précédent"><br>
          </form>
        </div>

        <div class="col-md-6 text-left">
          <form action="index2.php" method="post">
            <input type="hidden" name="chapitreNavigation" value=""><br><br>
            <input type="submit" class="btn btn-info text-uppercase rounded shadow-lg" name="boutonSuivant" value="Chapitre suivant"><br>
          </form>
        </div>
      </div>
    </div>
  </div> -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
