<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="public/theme.css">
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

<body style="	box-shadow: 0px 0px 4px  black;" >
  <div class="p-2" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="nav">
              <li class="nav-item">
                <a href="index.php?admin=createpost" class="btn text-center shadow-lg text-info btn-primary btn-lg btn-block text-capitalize">Créer un billet</a>
                <a href="index.php?admin=updatepost" class="btn text-center shadow-lg text-info btn-primary btn-lg btn-block text-capitalize">Modifier un billet</a>
                <a href="index.php?admin=deletepost" class="btn text-center shadow-lg text-info btn-primary btn-lg btn-block text-capitalize">Supprimer un billet</a>
                <a href="index.php?admin=controlcomments" class="btn text-center shadow-lg text-info btn-primary btn-lg btn-block text-capitalize">Modérer les commentaires</a>
                <a href="index.php?admin=logout" class="btn text-center shadow-lg text-info btn-primary btn-lg btn-block text-capitalize">Se déconnecter</a>
              </li>
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
  <div class="p-2" style="">
    <?= $content ?>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
