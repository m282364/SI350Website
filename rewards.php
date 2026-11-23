<?php 
session_start();
require_once 'user_storage.php';

$loggedin = isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] === true && !empty($_SESSION['Username']);
$points = 0;

if ($loggedin) {
    $users = getUsersSafe();
    $points = $users[$_SESSION['Username']]['points'] ?? 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rewards - Sorelle Ristorante Italiano</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link type="text/css" rel="stylesheet" href="styles.css">
</head>
<body>

<?php if ($loggedin): ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <img src="images/LOGO.png" alt="Logo" width="200" height="200" style="padding: 20px;">
      <a class="navbar-brand" href="/~m282364/SI350/SI350Website/index.php">Sorelle Ristorante Italiano</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/~m282364/SI350/SI350Website/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/~m282364/SI350/SI350Website/menu.php">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/~m282364/SI350/SI350Website/reserve.php">Make a Reservation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/~m282364/SI350/SI350Website/rewards.php">Rewards</a>
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
      <img src="images/LOGO.png" alt="Logo" width="200" height="200" style="padding: 20px;">
      <a class="navbar-brand" href="/~m282364/SI350/SI350Website/index.php">Sorelle Ristorante Italiano</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/~m282364/SI350/SI350Website/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/~m282364/SI350/SI350Website/menu.php">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/~m282364/SI350/SI350Website/reserve.php">Reservation Times</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/~m282364/SI350/SI350Website/rewards.php">Rewards</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/~m282364/SI350/SI350Website/loginpage.php">Log In</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<?php endif; ?>

  <div class="container mt-4">
    <?php if (!$loggedin): ?>
      <h2>Sorelle Loyalty Rewards</h2>
      <p>Free food on the horizon. Create an account with us to join our rewards program today!</p>
      <p><a href="/~m282364/SI350/SI350Website/registration.html">Click here to register</a> or <a href="/~m282364/SI350/SI350Website/loginpage.php">Log In</a></p>
    <?php else: ?>
      <h1>Welcome to our Rewards Program, <?php echo htmlspecialchars($_SESSION['Username']); ?>!</h1>

      <h3>How it Works:</h3>
      <p>Earn points for every reservation and dollar you spend at Sorelle Ristorante Italiano. Redeem your points for exclusive rewards and special offers. The more you dine with us, the more you earn!</p>

      <h3>Your Rewards:</h3>
      <p>Point Balance: <span id="pointBalance"><strong><?php echo $points; ?></strong></span></p>

      <h3>Redeemable Reward List:</h3>
      <ul>
        <li>100 Points: Free appetizer of your choice</li>
        <li>200 Points: Free glass of wine</li>
        <li>500 Points: Free entree of your choice</li>
      </ul>
    <?php endif; ?>
  </div>

</body>
</html>
