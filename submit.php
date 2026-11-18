<?php
require_once 'user_storage.php';

$name = trim($_POST['Username'] ?? '');
$email = trim($_POST['Email'] ?? '');
$pwd = $_POST['Password'] ?? '';

$mistakes = [];

if (empty($name)) {
    $mistakes[] = "Username";
}
if (empty($pwd) || trim($pwd) == '') {
    $mistakes[] = "pwd";
}
if (empty($email)) {
    $mistakes[] = "Email";
}
if (!preg_match('/[a-z]/', $pwd)) {
    $mistakes[] = "You need a lowercase in your password.";
}
if (!preg_match('/[A-Z]/', $pwd)) {
    $mistakes[] = "You need an uppercase in your password.";
}
if (!preg_match('/\d/', $pwd)) {
    $mistakes[] = "You need a number in your password.";
}

if (empty($mistakes)) {
    $found = false;

    updateUsersSafe(function (&$users) use ($name, $email, $pwd, &$found) {
        if (isset($users[$name])) {
            $found = true;
            return false; // Username taken, do not overwrite
        }

        $users[$name] = [
            'email' => $email,
            'password' => password_hash($pwd, PASSWORD_DEFAULT),
            'points' => 0
        ];
        return true; // Save new user
    });

    if ($found) {
        echo "Username already taken. Choose a different one. <br>";
    } else {
        echo "Your registration for Sorelle Ristorante Italiano was successfully received! We got these details: <br>";
        echo "Username: " . htmlspecialchars($name) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Password: *** <br>";
        echo "Starting Loyalty Points: 0 <br>";
    }
} else {
    echo "You are missing the following data in your application: <br>";
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
  <br>
  <a href="/~m282364/SI350/SI350Website/login.html">Log In</a> | 
  <a href="/~m282364/SI350/SI350Website/registration.html">Refill out the form</a> | 
  <a href="/~m282364/SI350/SI350Website/index.php">Go back to homepage</a>
</body>
</html>
