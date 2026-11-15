<?php
$name = $_POST['Username'];
$email = $_POST['Email'];
$pwd = $_POST['Password'];

$mistakes = [];

if(empty($name) || trim($name) == ''){
  $mistakes[] = "Username";
}
if(empty($pwd)|| trim($pwd) == ''){
  $mistakes[] = "pwd";
}
if(empty($email) || trim($email) == ''){
  $mistakes[] = "Email";
}
if(!(preg_match(('/[a-z]/'), $pwd))){
  $mistakes[] = "You need a lowercase in your password.";
}
if(!(preg_match(('/[A-Z]/'), $pwd))){
  $mistakes[] = "You need an uppercase in your password.";
}
if(!(preg_match(('/\d/'), $pwd))){
  $mistakes[] = "You need a number in your password.";
}

if(empty($mistakes)){
  if(file_exists("LOG.txt")){
    $fileCheck = fopen("LOG.txt", "r");
    fgets($fileCheck);
    $found = false;
    while (($line = fgets($fileCheck)) !== false){
      $givenUsername = strtok($line, "\t ");
      if($givenUsername == $name){
        $found = true;
        break;

      }
    }
    fclose($fileCheck);
  }

  if($found){
    echo "Username already taken. Choose a different one. <br>";
  }
  else {
    echo "Your registration for 21st company was sucessfully received! We got these details: <br>";
    foreach ($_POST as $key => $value) {
      if($key == "Password")
        echo "Password: *** <br>";
      else 
        echo $key . ": " . $value . "<br>";
    }
    if(!(file_exists("LOG.txt"))){

      $file = fopen("LOG.txt", "a");
      $text = "Username\t Email\t Password \r\n";
      fwrite($file, $text);
    } 
    else 
      $file = fopen("LOG.txt", "a");
    if ($file) {
      foreach($_POST as $key => $val){
        if($key == "Password"){
        $hash = password_hash($val, PASSWORD_DEFAULT);
        $text = $hash . "\t";
        fwrite($file, $text);
        }
        else {
        $text = $val . "\t";
        fwrite($file, $text);
        }
      }


      $skip = "\n";
      fwrite($file, $skip);
      fclose($file); // Close the file
    }
  }
}
else{
  echo "You are missing the following data in your application: <br>";
  foreach ($mistakes as $key) {
    if($key == "pwd")
      echo "Password<br>";
    else
      echo $key . "<br>";
  }

}
?>
<html lang="en">
<body>
<a href="/~m282364/SI350/SI350Website/registration.html"> Refill out the form.</a>
</body>
<?php
exit;
?>


