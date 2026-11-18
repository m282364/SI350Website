<?php
session_start();
$loggedin = isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] === true && !empty($_SESSION['Username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservations - Sorelle Ristorante Italiano</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link type="text/css" rel="stylesheet" href="styles.css">
</head>
<body>

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

<body>

 
  <header>
    <h1>Reserve a Table</h1>
    <p>Fill out the form below to reserve a table.</p>
  </header>
<?php if ($loggedin): ?>
    <form onsubmit="sendReservation(event)">
      Name: <input type="text" id="guestName" value="<?php echo htmlspecialchars($_SESSION['Username']); ?>" required> <br><br>
      Date: <input type="date" id="resDate" required> <br><br>
      Time:
      <select id="resTime">
        <option value="5:00 PM">5:00 PM</option>
        <option value="6:00 PM">6:00 PM</option>
        <option value="7:00 PM">7:00 PM</option>
        <option value="8:00 PM">8:00 PM</option>
      </select> <br><br>
      Party Size:
      <select id="partySize">
        <option value="2">2 Guests</option>
        <option value="4">4 Guests</option>
        <option value="6">6 Guests</option>
      </select> <br><br>

      <input type="submit" value="Submit Reservation">
      <input type="reset" value="Reset Form">
    </form>
    <p id="responseMsg" class="p-co"></p>
  <?php else: ?>
    <p>You must be logged in to reserve a table. <a href="login.html">Log In</a> or <a href="registration.html">Register</a>.</p>
  <?php endif; ?>

  <hr>

  <!-- Everyone sees Dining Hours and Footer -->
  <h2>Dining Hours</h2>
  <table>
    <tr>
      <th>Day</th>
      <th>Hours</th>
    </tr>
    <tr>
      <td>Monday - Thursday</td>
      <td>4:30 PM - 9:30 PM</td>
    </tr>
    <tr>
      <td>Friday - Saturday</td>
      <td>4:00 PM - 11:00 PM</td>
    </tr>
    <tr>
      <td>Sunday</td>
      <td>3:00 PM - 9:00 PM</td>
    </tr>
  </table>

  <footer>
    <p><a href="aboutus.php">Contact Us</a></p>
  </footer>

  <?php if ($loggedin): ?>
  <script>
    function sendReservation(event) {
      event.preventDefault();

      const name = document.getElementById("guestName").value;
      const date = document.getElementById("resDate").value;
      const time = document.getElementById("resTime").value;
      const party = document.getElementById("partySize").value;

      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("responseMsg").innerHTML = xhttp.responseText;
      };

      const url = "reservations.php?name=" + encodeURIComponent(name)
                + "&date=" + encodeURIComponent(date)
                + "&time=" + encodeURIComponent(time)
                + "&party=" + encodeURIComponent(party);

      xhttp.open("GET", url, true);
      xhttp.send();
    }
  </script>
  <?php endif; ?>

</body>
</html>
