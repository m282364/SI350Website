<?php
session_start();
$name = $_POST['Username'];
$pwd = $_POST['Password'];

$mistakes = [];

if(empty($name)){
  $mistakes[] = "Username";
}
if(empty($pwd)){
  $mistakes[] = "pwd";
}


if(empty($mistakes)){
  echo $name;
  if(file_exists("LOG.txt")){
    $fileCheck = fopen("LOG.txt", "r"); 
    $test = fgets($fileCheck); //skip first line with username, etc. labels

    $foundUser = false;
    $passMatch = false;
    while (($line = fgets($fileCheck)) !== false){ //while there are still lines 

      $givenUser = strtok($line, "\t\n\r");
      $email = strtok("\t\n\r");
      $password = strtok("\t\n\r"); 

      var_dump($givenUser);


      //looked up refresher on strtok
      var_dump(trim($givenUser));
      var_dump(trim($name));

      var_dump(trim($pwd));
      var_dump(trim($password));

      if (!$givenUser || !$password) {
        continue;
      }


      if (trim($givenUser) === trim($name)) {
        $foundUser = true;


        if(password_verify($pwd, $password)){
          $passMatch = true;
          echo "here";
          $_SESSION['Username'] =  trim($user);
          $_SESSION['LoggedIn'] = true;
          fclose($fileCheck);
          header("Location: index.php");
          //put something to make session and redirect
          echo "successful login <br>";

          exit;
        }


      }


    }
    header("Location: login.html");

    fclose($fileCheck);

  }
}
else{
  echo "You are missing the following data in your login: <br>";
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
<a href="/~m282364/SI350/SI350Website/index.php"> Go back to homepage</a>
</body>
<?php
exit;
?>

                                                                                                                                                                                                                                                                               
