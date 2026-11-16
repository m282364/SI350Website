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

<h1 class="center-text"> Who We Are </h1>

<img src="logo.jpeg" alt="The Sisters" width="300" class="center-photo">
<!--- I used AI to make this blurb --->
<p class="center-text"> Bound by a lifelong friendship and a shared obsession with Nonna’s Sunday gravy, three women traded their everyday routines for flour-dusted aprons to open their dream Italian restaurant. Armed with heirloom recipes, a fiercely loyal palate, and plenty of espresso, they turned a cozy neighborhood storefront into a vibrant gathering place where handmade pasta, wood-fired classics, and warm hospitality take center stage. Every dish on the menu is a love letter to the kitchens they grew up in—proof that the best meals are made from scratch, served family-style, and shared with the people you love.</p>

<h3> Contact Us </h3>

(999)-999-9999 <br>

sorelle@italiano.com <br>

404 Carb-Loading Lane, Al Dente, NJ 07001 <br>
