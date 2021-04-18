<?php
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $verify_code = randomChar(20, 1, "numbers");

  $gc_user = mysqli_query($conn, "SELECT count(username) AS total FROM user WHERE username = '$username'");
  $c_user = mysqli_fetch_array($gc_user);

  $gc_email = mysqli_query($conn, "SELECT count(email) AS total FROM user WHERE email = '$email'");
  $c_email = mysqli_fetch_array($gc_email);

  if($c_user['total'] > 0 || $c_email['total'] > 0){
    if($c_email['total'] > 0)
      $error_email = 1;
    if($c_user['total'] > 0)
      $error_user = 1;
  }
  else {
    $insert = mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','1','$email','$verify_code[0]','1','0')");
    if($insert)
      go('?log=insert');
  }

}
?>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <header class="bg-emerland text-white">
        <h4><i class="fa fa-fw fa-plus"></i> Tambah <?= $title_page ?></h4>
      </header>

      <div class="box-body">

        <form method="POST" action="" class="form-horizontal">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Username</label>
            <div class="col-sm-10">
              <input type="text" name="username" class="form-control" <?php if(isset($_POST['username'])) { echo "value='$_POST[username]'"; } ?>>

              <?php if(isset($error_user) && $error_user == 1){ ?>
              <span class="h6 text-alizarin">Username telah dipakai</span>
              <?php } ?>

            </div>
          </div>

          <hr class="b-s-dashed">

          <div class="form-group">
            <label class="control-label col-sm-2">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" <?php if(isset($_POST['email'])) { echo "value='$_POST[email]'"; } ?>>

              <?php if(isset($error_email) && $error_email == 1){ ?>
              <span class="h6 text-alizarin">Email telah dipakai</span>
              <?php } ?>

            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" class="form-control" required="">
            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2"></label>
            <div class="col-sm-10">
              <button type="submit" name="submit" class="btn btn-rect btn-success"><i class="fa fa-plus"></i> Tambahkan Data</button>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>

