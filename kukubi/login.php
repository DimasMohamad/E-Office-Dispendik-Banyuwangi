<?php
$title_page = 'Login';
$confirm_page = 0;
include "include/header.php";
?>

  <div class="section no-pad-bot login-logo" id="index-banner">
    <div class="container center">
      <img src="image/logo.png" class="logo" width="90%">
    </div>
  </div>

  <div class="container">
    <div class="section">

      <?php
      //KETIKA TOMBOL LOGIN DITEKAN
      if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //GET DATA USER
        $query_check = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
        $check = mysqli_fetch_array($query_check);

        if($check['username'] == $username && $check['password'] == $password && $check['role'] == 2){
          
          //GET TINGKATAN USER
          $query_get_level = mysqli_query($conn, "SELECT * FROM biodata_user WHERE username = '$username'");
          $get_level = mysqli_fetch_array($query_get_level);

          //SIMPAN DATA SESSION
          $_SESSION['user'] = $check['username'];
          $_SESSION['role'] =  $check['role'];
          $_SESSION['level'] = $get_level['level'];
          $_SESSION['email'] = $check['email'];

          go('index.php');
        } else if($check['role'] != 2){
          popUp('Anda tidak mempunyai akses kehalaman ini');
        } else {
          popUp('Username dan password Anda tidak sesuai');
        }
      }
      ?>

      <form method="POST" action="">
        <div class="input-field">
          <input id="username" type="text" name="username" autocomplete="off" required="" class="validate">
          <label for="username">Username</label>
        </div>
        <div class="input-field">
          <input id="password" type="password" name="password" required="" class="validate">
          <label for="password">Password</label>
        </div>

        <button type="submit" name="submit" class="waves-effect waves-light btn light-blue btn-block">Login</button>
      </form>

      <br>

      <p class="light center">
        Belum punya akun?<br>Daftar <a href="register.php">disini!</a>
      </p>

    </div>
  </div>

<?php
include "include/footer.php";
?>