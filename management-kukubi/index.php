<?php
session_start();
include "include/connect.php";
include "include/function.php";

if(isset($_SESSION['username'])){
  back();
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Kukubi</title>

  <!-- Core stylesheet files. REQUIRED -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">

  <!-- Font Awesome -->
  <!-- WARNING: Font Awesome doesn't work if you view the page via file:// -->
  <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css">

  <!-- animate.css -->
  <link rel="stylesheet" href="assets/vendor/animate.css/animate.css">
  <!-- END: core stylesheet files -->
  <!-- Theme main stlesheet files. REQUIRED -->
  <link rel="stylesheet" href="assets/css/chl.css">
  <link rel="stylesheet" href="assets/css/theme-peter-river.css">
  <!-- END: theme main stylesheet files -->

  <style media="screen">
    .app {
      background-image: url("../assets/img/bg.svg");
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>

<body class="bg-clouds">
  <div class="app">
    <div class="app-login">
      <div class="text-center box shadow-5 animated fadeInLeft b-r-4 p-a-20">
        <h1 class="f-4 m-a-0"><b>DISPENDIK</b></h1>
        <h4>Management Disposisi Dinas Pendidikan</h4>

        <?php
        if(isset($_POST['submit'])){

          $username = $_POST['username'];
          $password = md5($_POST['password']);

          $get_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
          $row_user = mysqli_fetch_array($get_user);

          if($username == $row_user['username'] && $password == $row_user['password'] && $row_user['role'] <= 1){
            $set_status = mysqli_query($conn, "UPDATE user SET status = 1 WHERE username = '$username'");
            $_SESSION['username'] = $username;
            go('dashboard/');
          } else if($row_user['role'] == 2) {
            alert('danger','Anda tidak mempunyai akses!');
          } else {
            alert('danger',"Username dan password tidak sesuai!");
          }
        }
        ?>

        <form class="text-left" role="form" method="POST" action="">
          <div class="form-group has-feedback">
            <input class="form-control" name="username" placeholder="Username" type="text">
            <span class="form-control-feedback">
              <i class="fa fa-fw fa-user"></i>
            </span>
          </div>
          <div class="form-group has-feedback">
            <input class="form-control" name="password" placeholder="Password" type="password">
            <span class="form-control-feedback">
              <i class="fa fa-fw fa-lock"></i>
            </span>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-rect btn-block m-b-15">Login</button>

          <!--
          <a href="app-forgot.html">
            <small>Forgot password?</small>
          </a>
          <p class="text-muted text-right">
            Do not have an account?
            <a href="app-register.html">Create an account</a>
          </p>
          -->

        </form>

      </div>
    </div>

  </div>

  <script src="assets/vendor/jquery/jquery.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
</body>
</html>
