<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>

  <form method="post" action="connexion.php">
      <fieldset>
      <legend>Connexion</legend>
      <p>
      <label for="pseudo">Pseudo :</label><input name="pseudo" type="text" id="pseudo" /><br />
      <label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
      </p>
      </fieldset>
      <p><input type="submit" value="Connexion" /></p></form>


  <?php

  //*********CONNEXION A LA BDD************************************************************************************************************* -->
  try
  {
    // $bdd = new PDO('mysql:host=db754453329.db.1and1.com;dbname=db754453329;charset=utf8', 'dbo754453329', 'Lisaume14*');
    $bdd = new PDO('mysql:host=localhost;dbname=ocprojet4;charset=utf8', 'root', '');
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }
  // $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
  //  Récupération de l'utilisateur et de son pass hashé
  $req = $bdd->prepare('SELECT ID, password, Nom FROM admin WHERE pseudo = :pseudo');
  $req->execute(array(
    'pseudo' => $_POST['pseudo']));
    $resultat = $req->fetch();
    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
    if(!$isPasswordCorrect)
    // if ($resultat['password']!=$_POST['password'])
    {

      echo 'Mauvais identifiant ou mot de passe !';
    }
    else
    {
        session_start();
        $_SESSION['ID'] = $resultat['ID'];
        $_SESSION['Nom'] = $resultat['Nom'];
        header('Location: http://localhost/tests/Exercices/projet/administration/backend2.php');
      }
    ?>
    </body>
    </html>
