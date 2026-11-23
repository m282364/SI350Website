<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    echo "Free food on the horizon. Create an account with us to join our rewards program today!"; 
    echo '<p><a href="/~m271974/SI350/SI350Website/login.php">Click here to register</a></p>';
    exit;
}

?>





<h1>Welcome to our Rewards Program!</h1>

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
