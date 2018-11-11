<?php
try {
  $db = new PDO('mysql:host=localhost;dbname=ocprojet4;charset=utf8', 'root', '');
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}
// Hachage du mot de passe

$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
$pseudo = ($_POST['pseudo']);
$name = ($_POST['name']);

// Insertion

$req = $db->prepare('INSERT INTO admin(pseudo, password, name) VALUES(:pseudo, :password, :name)');
$req->execute(array(
    'pseudo' => $pseudo,
    'password' => $pass_hache,
    'name' => $name, ));
?>
