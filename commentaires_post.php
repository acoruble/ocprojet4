<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=ocprojet4;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('INSERT INTO commentaires(titreChapitre, pseudo, date, message) VALUES (?,?,?,?)');
$date_time = date("Y-m-d H:i:s");
$req->execute(array($_POST['titreChapitre'],$_POST['pseudo'],$date_time,$_POST['message']));

// Puis rediriger vers index.php comme ceci :
header('Location: index.php');
?>
