<?php
  session_start();
  if(isset($_SESSION['email']))
  {
      header("location: dashboard.php");
      exit;
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
    <h2>Login</h2>
    <form action="" method = "POST">
      <div class="input-box">
        <input type="email" name="email" placeholder="E-Mail" required>
      </div>
      <div class="input-box">
        <input type="password" name="pwd" placeholder=" Password" required>
      </div>
      <div class="input-box button">
        <input type="submit" name="login" value="Login">
      </div>
      <div class="text">
        <h3>Forgot Password? <a href="forgot-password.php">Reset Now</a></h3>
      </div>
      <div class="text">
        <h3>Don't have an account? <a href="register.php">Register now</a></h3>
      </div>
      <div class="text">
        <h3>Go Back to Home <a href="index.php">Underdogidols</a></h3>
      </div>
    </form>
  </div>
</body>
</html>
<?php
  require_once "connection.php";
  $email = $pwd = $name = "";
  $err = "";
  if ($_SERVER['REQUEST_METHOD'] == "POST"){
      if(empty(trim($_POST['email'])) || empty(trim($_POST['pwd'])))
      {
          echo '<script>swal("Warning","Either Email or Password is wrong", "warning")</script>';
      }
      else{
          $email = trim($_POST['email']);
          $pwd = trim($_POST['pwd']);
      }
  if(empty($err))
  {
    $sql = "SELECT id,name, email, password FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $email;
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
        {
            mysqli_stmt_bind_result($stmt,$name, $id, $email, $hashed_password);
            if(mysqli_stmt_fetch($stmt))
            {
                if(password_verify($pwd, $hashed_password))
                { 
                    session_start();
                    $_SESSION["email"] = $email;
                    $_SESSION["id"] = $id;
                    $_SESSION["name"] = $name;
                    $_SESSION["loggedin"] = true;
                    header("location: dashboard.php");
                }
            }
        }else{
          echo '<script>swal("Warning","Either Email or Password is wrong", "warning")</script>';
        }
    }
  }    
}
?>