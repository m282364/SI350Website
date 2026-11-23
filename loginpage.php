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
<a class="nav-link" href="/~m282364/SI350/SI350Website/reserve.php">Make a Reservation</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/~m271974/SI350/SI350Website/rewards.php">Rewards</a>
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
<a class="nav-link" href="/~m282364/SI350/SI350Website/reserve.php">Reservation Times</a>
</li>


<li class="nav-item">
<a class="nav-link" href="/~m282364/SI350/SI350Website/login.html">Log In</a>
</li>



</ul>
</div>
</div>
</nav>
<?php endif; ?>

    <form method="POST" action="login.php">
      Username <input type="text" name="Username" placeholder="" required> <br>
      <!--Looked up how to make something required.-->
      Password <input type="password" name="Password" placeholder=""required>
      
      <br> <input type="submit" value="Submit Form">
      <input type="reset" value="Reset Form">
    </form> 
    <hr>
    <a href="/~m282364/SI350/SI350Website/index.php"> Go back to the homepage!</a>
  </body> 

