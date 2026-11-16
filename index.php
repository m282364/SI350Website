<?php 
session_start();

$id = session_id();
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
<a class="navbar-brand" href="http://midn.cs.usna.edu/~m282364/SI350/SI350Website/index.php">Sorelle Ristorante Italiano  </a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="/~m282364/SI350/SI350Website/index.php">Home</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/~m282364/SI350/SI350Website/menu.php">Menu</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/~m282364/SI350/SI350Website/logout.php">Log Out</a>
</li>

</ul>
</div>
</div>
</nav>

<?php else: ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

<div class="container-fluid">
<img src="images/LOGO.png", width = 200px, height = 200px, padding=20px>
<a class="navbar-brand" href="http://midn.cs.usna.edu/~m282364/SI350/SI350Website/index.php">Sorelle Ristorante Italiano  </a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="/~m282364/SI350/SI350Website/index.php">Home</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/~m282364/SI350/SI350Website/menu.php">Menu</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/~m282364/SI350/SI350Website/login.html">Log In</a>
</li>
</ul>
</div>
</div>
</nav>
<?php endif; ?>

<header>
<h1>Welcome to Sorelle Ristorante Italiano</h1>
<p>Authentic Italian dining brought to you by sisters and founders Melania Gonzalez, Gabrielle Fortner, and Amanda Ballard.</p>
<a href="reservations.html">Reserve a Table</a>
<a href="menu.php">Browse Menu</a>
</header>


<h2>Our Story</h2>
<p>
At Sorelle Ristorante Italiano, we blend traditional family recipes with modern convenience. Whether you are visiting us for an evening meal or planning ahead from home, our online platform makes dining with us effortless.
</p>


<h3>Online Reservations</h3>
<p>Skip the phone call. View real-time table availability as a visitor, or log in as a member to book and manage your reservation directly.</p>
<a href="reservations.html">View Available Times</a>

<h3>Searchable Menu</h3>
<p>Explore our authentic Italian dishes with photos and easily search for your favorite pasta, antipasti, or desserts before you arrive.</p>
<a href="menu.php">Explore the Menu</a>

<h3>Sorelle Loyalty Rewards</h3>
<p>Log in to your member account to track your spending, check your loyalty points remotely, and unlock milestones toward a free meal.</p>
<a href="loyalty.html">Check Your Points</a>
<br>



<footer>
  <p><a href="/~m282364/SI350/SI350Website/aboutus.php">Contact Us</a></p>
</footer>
