<!DOCTYPE html>
<html>

<head>
  <title>Corey Dubin</title>
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR:100,300,regular,500,700,900" rel="stylesheet" />

  <style>
    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: Noto Sans KR, "Courier New", Courier, monospace;
      margin: 0;
      padding: 0;
    }

    a {
      text-decoration: none;
    }

    a:visited {
      color: #102b39;
      text-decoration: none;
    }

    #background {
      background-image: url("images/city.jpg");
      background-size: cover;
    }

    #title {
      text-align: center;
      color: #102b39;
      font-weight: bold;
      font-size: 3.5em;
      padding-top: 15%;
    }

    #hr {
      width: 10%;
      color: #e5c48e;
    }

    .navbar {
      list-style-type: none;
      list-style: none;
      text-align: center;
      font-size: 2em;
      color: #102b39;
      margin-top: 5%;
    }

    #bar {
      margin-top: 50%;
      height: 50px;
      width: 100%;
      background-color: #e5c48e;
    }

    .head {
      text-align: center;
      font-size: 3.5em;
      padding-top: 5%;
      font-weight: lighter;
    }

    #me {
      width: 35%;
      margin-left: 5%;
      margin-top: 5%;
      border-radius: 15px;
      position: absolute;
    }

    #about {
      position: absolute;
      margin-left: 55%;
      margin-top: 5%;
      max-width: 25%;
      font-size: 2em;
    }

    #grey {
      margin-top: 35%;
      padding-bottom: 7%;
      background-color: #eeeeee;
    }

    .content {
      margin-top: 2%;
      width: 50%;
      height: 50%;
      border-radius: 15px;
      margin-left: 25%;
      margin-right: 25%;
    }

    #full_form {
      padding-top: 3%;
      padding-bottom: 7%;
      text-align: center;
    }

    #contact {
      display: inline-block;
    }
  </style>
</head>


<body>
  <div id="background">
    <div id="title">Corey Dubin</div>
    <hr id="hr" />
    <div id="bar">
      <nav class="navbar">
        <a href="#about_me">About Me</a>
        <a>|</a>
        <a href="#grey">Projects</a>
        <a>|</a>
        <a href="#full_form">Contact Me</a>
      </nav>
    </div>
  </div>

  <div>
    <div id="about_me" class="head">About Me</div>
    <hr id="hr" />
    <img id="me" src="images/me.webp" alt="picture of me" />
    <p id="about">
      I'm a student at NYU Gallatin's School of Individualized Study. My
      concentration focuses on Computer Science and Acting.
      <br />
      I enjoy reading, weightlifting, and biking.
    </p>
  </div>

  <div id="grey">
    <div class="head">Projects</div>
    <hr id="hr" />
    <div class="navbar">
      Vera.Zone
    </div>
    <a href="https://vera.zone/" target="_blank"><img class="content" src="images/vera.png"></a>

    <div class="navbar">
      AliveAndKickn
    </div>
    <a href="https://ascopubs.org/doi/abs/10.1200/JCO.2020.38.15_suppl.e19317" target="_blank"><img class="content" src="images/abstract.png"></a>
  </div>

  <div>
    <div class="head">Contact Me!</div>
    <hr id="hr" />
  </div>

  <?php
  // define variables and set to empty values
  $nameErr = $emailErr =  "";
  $name = $email = $comment = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["comment"])) {
      $comment = "";
    } else {
      $comment = test_input($_POST["comment"]);
    }
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
  <div id="full_form">
    <form id="contact" method="post" action="sendmail.php">
      Name: <input type="text" name="name">
      <span class="error">* <?php print $nameErr; ?></span>
      <br><br>
      E-mail: <input type="text" name="email">
      <span class="error">* <?php print $emailErr; ?></span>
      <br><br>
      Comment: <textarea name="comment" rows="5" cols="40"></textarea>
      <br><br>
      <input type="submit" name="submit" value="Submit">
    </form>
  </div>
</body>

</html>
