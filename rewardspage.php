<?php 
session_start();
$loggedin = isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] === true;
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link type="text/css" rel="stylesheet" href="styles.css">

<?php if($loggedin): ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<img src="images/LOGO.png", width = 200px, height = 200px, padding=20px>
<a class="navbar-brand" href="index.php">Sorelle Ristorante Italiano  </a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="index.php">Home</a>
</li>
<li class="nav-item">
<a class="nav-link" href="menu.php">Menu</a>
</li>
<li class="nav-item">
<a class="nav-link" href="reserve.php">Make a Reservation</a>
</li>


<li class="nav-item">
<a class="nav-link" href="logout.php">Log Out</a>
</li>

</ul>
</div>
</div>
</nav>

<?php else: ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

<div class="container-fluid">
<img src="images/LOGO.png", width = 200px, height = 200px, padding=20px>
<a class="navbar-brand" href="index.php">Sorelle Ristorante Italiano  </a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="index.php">Home</a>
</li>
<li class="nav-item">
<a class="nav-link" href="menu.php">Menu</a>
</li>

<li class="nav-item">
<a class="nav-link" href="loginpage.php">Log In</a>
</li>

<li class="nav-item">
<a class="nav-link" href="rewards.php">Rewards</a>
</li>

</ul>
</div>
</div>
</nav>
<?php endif; ?>



<h1 >Welcome to our Rewards Program!</h1>

<h3>How it Works:</h3>
<p>Earn points for every dollar you spend at Sorelle Ristorante Italiano. Redeem your points for exclusive rewards and special offers. The more you dine with us, the more you earn!

<h3>Your Rewards:</h3>
<p>Point Balance: <span id="pointBalance">0</span></p>


<h3>Redeemable Reward List:</h3>
<ul>
  <li>100 Points: Free appetizer of your choice</li>
  <li>200 Points: Free glass of wine</li>
  <li>500 Points: Free entree of your choice</li>
</ul>


<footer>
  <p><a href="aboutus.php">Contact Us</a></p>
</footer>
