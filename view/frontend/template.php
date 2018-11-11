<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Billet simple pour l'Alaska</title>
  <meta name="description" content="Le nouveau roman de Jean Forteroche">
  <meta name="keywords" content="Roman, Jean Forteroche, Alaska">
  <link rel="icon" href="D:/Pictures/images_web/index.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="public/style.css">
</head>

<body>
  <div class="row">
    <div class="col-md-12">
      <a href="index.php?action=connection" class="btn btn-info btn-xs">Se connecter</a>
    </div>
  </div>

  <div class="py-5" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-info text-center">Billet simple pour l'Alaska</h1>
        </div>
      </div>
    </div>
  </div>

  <div>
    <div class="container shadow-lg">
      <div class="row">

        <!-- ********************************************List DES CHAPITRES******************************************** -->

              <div class="col-md-3 bg-info rounded shadow-lg">
                <h1 class="text-center text-light">Liste des chapitres</h1>
                <ul class="nav nav-pills flex-column">

                  <?php foreach ($listPosts as $onePost): ?>
                    <form action="index.php?action=selectChapter" method="post" style="width:100%">
                      <input type="hidden" name="PostClick" style="size:0" value="<?= $onePost->id() ?>">
                      <input type="submit" name="titleChapter" class="form-control-plaintext btn text-center shadow-lg text-info btn-light btn-lg btn-block text-capitalize" value="<?= $onePost->title() ?>"><br>
                    </form>
                  <?php endforeach; ?>
                </ul>
              </div>

        <!-- ***********************CHAPITRE EN LECTURE**************************************************** -->

        <div class="col-md-9 rounded bg-info shadow-lg" style="">
          <h1 class="text-center text-info rounded bg-light shadow-lg">Chapitre en lecture</h1>
          <?= $chapterDisplay ?>
        </div>
      </div>
    </div>
  </div>

  <!-- *********************COMMENTAIRES CORRESPONDANTS AUX CHAPITRES********************************************************* -->


  <div class="py-5">
    <div class="container">
      <div class="row bg-info text-light text-center shadow-lg rounded-top" style="">
        <div class="col-md-12 my-5 rounded-top">
          <h1 class="shadow-lg text-info bg-light rounded" style="">Commentaires<br></h1>
          <div class="col-md-12">

            <!-- **********AJOUTER UN NOUVEAU COMMENTAIRE ************************************************************************************ -->
            <p class="">N'hésitez pas à donner votre avis !</p>
            <form class="text-right" action="index.php?action=newcomment" method="post">
              <input type="hidden" name="PostClick" value="<?= $post->id() ?>" />
              <input type="hidden" name="titleChapter" value="<?= $post->title() ?>" />
              <div class="form-group"> <input type="text" class="form-control" name= "pseudo" placeholder="Pseudo"> </div>
              <div class="form-group"> <input type="text" class="form-control h-25" name="message" placeholder="Commentaire"> </div>
              <button type="submit" class="btn text-info text-center btn-light shadow-lg rounded">Valider</button>
            </form>
          </div>
        </div>
      </div>

      <!-- **********AFFICHER LES COMMENTAIRES ASSOCIES********************************************************************************* -->

      <div class="row">
        <div class="col-md-12 bg-light rounded-bottom py-2 shadow-lg text-center" style="">

          <?php foreach ($comments as $comment): ?>
            <p class="text-info">
              Le
              <?= $comment->date() ?>, </br>
              <?= $comment->pseudo() ?> a écrit :
              "<?= $comment->message() ?>".
            </p>
            <p>
              <form action="index.php?action=notifycomment" method="post">
                <input type="hidden" name="IDComment" value=<?= $comment->id() ?>>
                <input type="submit" class="btn text-light btn-info text-center shadow-lg rounded" name="reportComment" value="Signaler ce commentaire !"><br>
              </form>
            </p>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
