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
        <form action="reset.php" method = "POST">
        <div class="input-box">
            <input type="email" name="email" placeholder="E-Mail" required>
        </div>
        <div class="input-box button">
        <input type="submit" name="reset" value="Reset Password">
    </div>
    </form>
  </div>
</body>
</html>
<?php
    include 'connection.php';
    if(isset($_POST['reset'])){
        $email   = $_POST['email'];
        $query   = mysqli_query("SELECT email FROM users WHERE email = '$email'");
        $sql     = "SELECT * FROM users WHERE email = '$email'";
        $result  = mysqli_query($conn, $sql);
        $num     = mysqli_num_rows($result);
        if($num == 1){
           while($row = mysqli_fetch_assoc($result))
           {
            echo '<script>swal("You can Reset","User Found","success")</script>' 
           }
        }else{
            echo '<script>swal("Failed","User not found","error")</script>'
        }
    }
?>