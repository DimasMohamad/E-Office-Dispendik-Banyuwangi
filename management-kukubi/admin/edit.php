<?php
$ge_user = mysqli_query($conn, "SELECT * FROM user WHERE id = '$_GET[id]'");
$r_user = mysqli_fetch_array($ge_user);

if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $verify = $_POST['verify'];

  $gc_user = mysqli_query($conn, "SELECT count(username) AS total FROM user WHERE username = '$username' AND username != '$r_user[username]'");
  $c_user = mysqli_fetch_array($gc_user);

  $gc_email = mysqli_query($conn, "SELECT count(email) AS total FROM user WHERE email = '$email' AND email != '$r_user[email]'");
  $c_email = mysqli_fetch_array($gc_email);

  if($c_user['total'] > 0 || $c_email['total'] > 0){
    if($c_email['total'] > 0)
      $error_email = 1;
    if($c_user['total'] > 0)
      $error_user = 1;
  }
  else {
    if(!isset($password))
      $update = mysqli_query($conn, "UPDATE user SET username = '$username', email = '$email' verify = '$verify' WHERE id = '$_GET[id]'");
    else
      $update = mysqli_query($conn, "UPDATE user SET username = '$username', email = '$email', verify = '$verify', password = '$password' WHERE id = '$_GET[id]'");  

    if($update)
      go('?log=update');

    }
}

?>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <header class="bg-emerland text-white">
        <h4><i class="fa fa-fw fa-edit"></i> Edit <?= $title_page .' ID '. $r_user['id'] ?></h4>
      </header>

      <div class="box-body">

        <form method="POST" action="" class="form-horizontal">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Username</label>
            <div class="col-sm-10">
              <input type="text" name="username" class="form-control" <?php if(isset($_POST['username'])) { echo "value='$_POST[username]'"; } else { echo "value='$r_user[username]'"; }?>>         

              <?php if(isset($error_user) && $error_user == 1){ ?>
              <span class="h6 text-alizarin">Username telah dipakai</span>
              <?php } ?>
            
            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Email</label>
            <div class="col-sm-10">              
              <input type="email" name="email" class="form-control" <?php if(isset($_POST['email'])) { echo "value='$_POST[email]'"; } else { echo "value='$r_user[email]'"; } ?>>

              <?php if(isset($error_email) && $error_email == 1){ ?>
              <span class="h6 text-alizarin">Email telah dipakai</span>
              <?php } ?>

            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Verify</label>
            <div class="col-sm-10">              
              <select class="form-control" name="verify">
                <option value="0" <?= $r_user['verify'] == 0? 'selected' : '' ?>>Tidak</option>
                <option value="1" <?= $r_user['verify'] == 1? 'selected' : '' ?>>Ya</option>
              </select>
            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Password</label>
            <div class="col-sm-10">              
              <input type="password" name="password" class="form-control">
              <span class="h6 text-alizarin">Kosongi jika tidak ingin merubah password</span>
            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2"></label>
            <div class="col-sm-10">
              <button type="submit" name="submit" class="btn btn-rect btn-success"><i class="fa fa-save"></i> Simpan Perubahan</button>
              <a href="index.php" class="btn btn-rect btn-danger">Batal</a>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>
