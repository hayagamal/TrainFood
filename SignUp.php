<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/Users/User/vendor/autoload.php';

session_start();
include "pdo.php";
if (isset($_POST["signup"])) {
  $name = $_POST["username"];
  $email = $_POST["email"];
  $pw = $_POST["pass"];
  //Making sure that email and password do not already exist
  $stmt = $pdo->prepare('SELECT username AND email from account WHERE username=:us AND email=:em');
  $result=$stmt->execute(array(':us' => $_POST['username'],':em' => $_POST['email'] ));
  $row = $stmt->fetch();
  if(!$row){
  $encrypted_password = crypt($pw, PASSWORD_DEFAULT);
  $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
  $stmt = $pdo->prepare('INSERT INTO account(username,email,password,verification_code) VALUES ( :us,:em,:pw,:vc)');
  $stmt->execute(array(':us' => $_POST['username'], ':pw' => $encrypted_password, ':em' => $_POST['email'], ':vc' => $verification_code));
  if ($stmt) {
    
    try {
      //Email verification (not fully done yet due to some yet unfigured issues)
      $mail = new PHPMailer(true);
      $mail->SMTPDebug = 0;
      print_r("ok");
      $mail->isSMTP();
      $mail->Host = "smtp.mail.yahoo.com"; // SMTP servers
      $mail->Port = 465; // SMTP servers
      $mail->SMTPAuth = true;
      $mail->Username = 'Your_Email@yahoo.com';
      $mail->Password = '';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;
      $mail->setFrom('Your_Email@yahoo.com', 'Name of sender');
      $mail->addAddress($email);
      $mail->isHTML(true);
      $mail->SMTPOptions = array(
        'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
        )
      );
      $mail->Subject = 'Email verification';
      $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

      $mail->send();
     //Mail has been sent.
      header("Location: email-verification.php?email=" . $email);
      exit();
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    header("Location: login.php");
  }
}
else {
  $_SESSION['error']= 'Username/Email already exists, please insert another ones';
  header("Location: Signup.php");
  return;
}
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
    <h2 class="log">Train<span>Food</span></h2>
  </div>
  <div class="lform">

    <form method="post">
      <label for="email">Username:</label><br>
      <input type="text" id="username" name="username" value="">
      <br>
      <label for="password">Password:</label><br>
      <input type="password" id="pass" name="pass" value="">
      <br>
      <label for="email">Email:</label><br>
      <input type="text" id="username" name="email" value="">

      <?php
      if (isset($_SESSION["error"])) {

        echo ('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
        unset($_SESSION['error']);
      }
      ?>
      <input class="but" name="signup" type="submit" value="Register">

    </form>
    <p>By continuing, you agree to TrainTicket's Conditions of Use.</p>
    <div id="new">
      <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
  </div>
</body>

</html>