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
        // Redirect back to login page if username or password is wrong
        header("Location: login.html");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Error - Sorelle Ristorante Italiano</title>
</head>
<body>
  <p>You are missing the following data in your login:</p>
  <ul>
    <?php foreach ($mistakes as $key): ?>
      <li><?php echo ($key === "pwd") ? "Password" : htmlspecialchars($key); ?></li>
    <?php endforeach; ?>
  </ul>
  <a href="/~m282364/SI350/SI350Website/login.html">Try logging in again</a> | 
  <a href="/~m282364/SI350/SI350Website/index.php">Go back to homepage</a>
</body>
</html>
