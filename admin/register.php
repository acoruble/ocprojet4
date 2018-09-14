<?php
    require_once('../include/config.php');

    $password = password_hash("password", PASSWORD_DEFAULT);
    $username = "username";
    $email = "test@test.com";

    $sql = "INSERT INTO adminuser(username, password, email) VALUES (:username, :password, :email)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    echo $username . "admin user had been created";
?>
