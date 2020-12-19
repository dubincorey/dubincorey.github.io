<!DOCTYPE html>
<html>

<head>
  <title>Corey Dubin</title>

  <style>
    body {
      text-align: center;
      font-size: x-large;
    }

    form {
      display: inline-block;
      margin-top: 25%;
    }
  </style>
</head>
<?php
if ($_COOKIE['loggedin'] == true) {
  header('Location: home.php');
  exit();
}
if ($_GET['loginerror'] == 'yes') {
  print '<strong>' . "Incorrect username or password (username: admin1, password: password)" . '</strong>';
  print "<br>";
}
?>

<body>
  <form action="login.php" method="POST">
    Username: <input type="text" name="username" />
    <br />
    Password: <input type="text" name="password" />
    <br>
    <input type="submit" />
  </form>
</body>

</html>