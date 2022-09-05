<?php
session_start();
include "pdo.php";
if (isset($_POST['login']) && !empty($_POST["username"]) && !empty($_POST["pass"])) {

  $email = $_POST["username"];
  $pw = $_POST["pass"];

  $stmt = $pdo->prepare('SELECT username from account WHERE username=:em AND password=:pw');
  $stmt->execute(array(':em' => $_POST['username'], ':pw' => $_POST['pass']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($row !== false) {
    $_SESSION['name'] = $_POST['username'];
    $hashed_password = password_hash($pw, PASSWORD_DEFAULT);
    var_dump($hashed_password);

    if (password_verify($pw, $hashed_password)) {
      if (strpos($email, "admin")) {
        header("Location: admin-manage-dishes.php");
      } else {
        header("Location: FoodOnTrain.php");
      }
    }
  } else {
    $_SESSION['error'] = "Invalid username or password";
    header("Location: login.php");
    return;
  }
}

if (isset($_POST["login"]) && empty($_POST["username"]) && empty($_POST["pass"])) {
  $_SESSION["error"] = "Username and password are required";
  header("Location: login.php");
  return;
}
if (isset($_POST["login"]) && !empty($_POST["username"]) && empty($_POST["pass"])) {
  $_SESSION["error"] = "Password is required";
  header("Location: login.php");
  return;
}
if (isset($_POST["login"]) && empty($_POST["username"]) && !empty($_POST["pass"])) {
  $_SESSION["error"] = "Username is required";
  header("Location: login.php");
  return;
}
?>


<html lang="en">

<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
  <title>Food On Train - TrainTicket</title>
  <link rel="stylesheet" href="includes/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="includes/file.js"></script>
</head>

<body style="background-color:#111;">

  <div class="loginform">
    <h2 class="log">Train<span>Ticket</span></h2>
  </div>
  <div class="lform">

    <form method="post">
      <label for="email">Username:</label><br>
      <input type="text" id="username" name="username" value="">
      <br>
      <label for="password">Password:</label><br>
      <input type="password" id="pass" name="pass" value="">
      <p id="pwmsg" style="color: red;"></p>

      <?php
      if (isset($_SESSION["error"])) {

        echo ('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
        unset($_SESSION['error']);
      }
      ?>
      <button class="but" name="login" type="submit" value="" onclick="valid()">Login
      </button>

    </form>
    <p>By continuing, you agree to TrainTicket's Conditions of Use.</p>
    <div id="new">
      <p>New to TrainTicket? <a href="sign_up_page.html">Sign Up</a></p>
    </div>
  </div>
</body>

</html>