<form  method="POST">
    <div>
        <h2>Login</h2>
    </div>
  <div>
    <input id="username" type="text" name="username" placeholder="Username">
  </div>
  <div>
    <input id="password" type="password" name="password" placeholder="Password">
  </div>
  <div>
    <input type="submit" value="Submit">
  </div>
</form>
<?php
    require_once('../include/config.php');
    session_start();

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT password, id FROM adminuser WHERE username = :username";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch();
        $isValid = password_verify($password, $result[0]);

        if ($isValid) {
            $_SESSION['isAdmin'] = true;
            $_SESSION['authUser'] = $username;
            $_SESSION['id'] = $result[1];
            header('Location: /tests/Exercices/OCprojet4/admin/admin.php');
        }
    }
    require_once('../include/config.php');
    if ($_SESSION['isAdmin']) {
        echo "Welcome " . $_SESSION['authUser'];
    }else {
        echo "Get out you're not authorized";
    }
?>
