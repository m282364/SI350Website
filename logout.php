<?php
session_start();

$id = session_id();


if (isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] === true): 
unset($_SESSION['LoggedIn']);
session_unset();
echo "Logged out.";
else: 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
</head>
<body>
    <p>Please log in <a href="login.html">here</a>.</p>
</body>
</html>
<?php 
endif; 
?>


