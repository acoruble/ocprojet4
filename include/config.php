<?php
$dbh;
try {
    $dbh = new PDO('mysql:host=localhost;dbname=ocprojet4', "root", null);
    foreach($dbh->query('SELECT * FROM post') as $row) {
        print_r($row);
    }
    //$dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>
