<?php
  session_start();
  if(isset($_SESSION['email']))
  {
      header("location: dashboard.php");
      exit;
  }
  require_once "connection.php";
  if(isset($_POST['submit'])){
    if(!isset($_POST['email'])){
      echo 'Please Enter Email';
    }
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      echo 'Enter Valid Email';
    }else{
      
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Login | Underdogidols</title>
    <link rel="stylesheet" href="style.css">
   </head>
<body>
    <img src="assets/img/udi.png" alt="">
  <div class="wrapper">
    <h2>Reset Password</h2>
    <form action="" method = "POST">
      <div class="input-box">
        <input type="email" name="email" placeholder="E-Mail" required>
      </div>
      <div class="input-box button">
        <input type="submit" name="submit" value="Reset Password">
      </div>
      <div class="text">
        <h3>Go Back to Home <a href="index.php">Underdogidols</a></h3>
      </div>
    </form>
  </div>
</body>
</html>