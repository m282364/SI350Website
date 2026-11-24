<?php
session_start();
require_once 'user_storage.php';

$name = trim($_POST['Username'] ?? '');
$pwd = $_POST['Password'] ?? '';

$mistakes = [];

if (empty($name)) {
    $mistakes[] = "Username";
}
if (empty($pwd)) {
    $mistakes[] = "pwd";
}

if (empty($mistakes)) {
    $users = getUsersSafe();

    if (isset($users[$name]) && password_verify($pwd, $users[$name]['password'])) {
        $_SESSION['Username'] = $name;
        $_SESSION['LoggedIn'] = true;
        header("Location: index.php");
        exit;
    } else {
        header("Location: loginpage.php");
        exit;
    }
} else {
    echo "You are missing the following data in your login: <br>";
    foreach ($mistakes as $key) {
        if ($key == "pwd") {
            echo "Password<br>";
        } else {
            echo $key . "<br>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<body>
  <a href="index.php">Go back to homepage</a>
</body>
</html>
