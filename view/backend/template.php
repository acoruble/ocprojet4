<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="public/style.css">
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

<body class="bg-light">
  <div class="p-2" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills nav-tabs nav-fill justify-content-center">
            <li class="nav-item">
              <a href="index.php?admin=board" class="nav-link text-info text-uppercase">Gérer les billets</a>
            </li>
            <li class="nav-item">
              <a href="index.php?admin=createpost" class="nav-link text-info text-uppercase">Créer un billet</a>
            </li>
            <li class="nav-item">
              <a href="index.php?admin=logout" class="nav-link text-info text-uppercase">Se déconnecter</a>
            </li>
          </div>
        </div>
      </div>
      <div class="">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center text-info font-weight-bold">Bienvenue <?php if (isset($_SESSION['id']) AND isset($_SESSION['nom']))
              {
                echo $_SESSION['nom'];
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
