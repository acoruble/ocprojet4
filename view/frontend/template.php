<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="public/theme.css">
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

  <!-- ********************************************List DES CHAPITRES******************************************** -->
  <div class="">
    <div class="container">
      <div class="row">

        <?php require('listChapter.php'); ?>

        <!-- ***********************CHAPITRE EN LECTURE**************************************************** -->

        <div class="col-md-9 border rounded bg-primary shadow-lg" style="">
          <h1 class="text-center text-light shadow-lg">Chapitre en lecture</h1>
          <?= $chapterDisplay ?>
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
            <form class="text-right" action="index.php" method="post">
              <input type="hidden" name="titleChapter" value="<?= $Post->title() ?>" />
              <div class="form-group"> <input type="text" class="form-control" name= "pseudo" placeholder="Pseudo"> </div>
              <div class="form-group"> <input type="text" class="form-control h-25" name="message" placeholder="Commentaire"> </div>
              <button type="submit" class="btn text-center btn-info shadow-lg rounded">Valider</button>
            </form>

          </div>
        </div>
      </div>

      <?php require('comments.php'); ?>

    </div>
  </div>

  <!-- ****************PIED DE PAGE : CHANGER DE CHAPITRES******************************************************************* -->

  <div class="py-5">
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

  <div class="py-5">
    <div class="row" style="">
      <div class="col-md-12 text-center">
        <form action="index.php" method="get">
          <!-- <input type="hidden" name="chapitreNavigation" value=""><br><br> -->
          <input type="submit" class="btn btn-info text-uppercase rounded shadow-lg" name="Administration" value="Administration"><br>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
