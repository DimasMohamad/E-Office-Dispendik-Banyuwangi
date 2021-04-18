<?php
if(isset($_POST['submit'])){
  $nisn = $_POST['nisn'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $gender = $_POST['gender'];
  $born_city = $_POST['born_city'];
  $birthday_date = $_POST['birthday_date'];
  $institution = $_POST['institution'];
  $level = $_POST['level'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $verify_code = randomChar(20, 1, "numbers");

  $gc_nisn = mysqli_query($conn, "SELECT count(nisn) AS total FROM biodata_user WHERE nisn = '$nisn'");
  $c_nisn = mysqli_fetch_array($gc_nisn);

  $gc_user = mysqli_query($conn, "SELECT count(username) AS total FROM user WHERE username = '$username'");
  $c_user = mysqli_fetch_array($gc_user);

  $gc_email = mysqli_query($conn, "SELECT count(email) AS total FROM user WHERE email = '$email'");
  $c_email = mysqli_fetch_array($gc_email);

  if($c_user['total'] > 0 || $c_email['total'] > 0 || $c_nisn['total'] > 0){
    if($c_email['total'] > 0)
      $error_email = 1;
    if($c_user['total'] > 0)
      $error_user = 1;
    if($c_nisn['total'] > 0)
      $error_nisn = 1;
  }
  else {
    $insert_bio = mysqli_query($conn, "INSERT INTO biodata_user VALUES('','$nisn','$first_name','$last_name','$gender','$born_city','$birthday_date','$institution','$level','$username')");
    $insert_user = mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','1','$email','$verify_code[0]','2','0')");
    if($insert_bio && $insert_user)
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
            <label class="control-label col-sm-2">NISN</label>
            <div class="col-sm-10">
              <input type="text" name="nisn" placeholder="Nomor Induk Siswa Nasional" class="form-control" <?php if(isset($_POST['nisn'])) { echo "value='$_POST[nisn]'"; } ?>>

              <?php if(isset($error_nisn) && $error_nisn == 1){ ?>
              <span class="h6 text-alizarin">NISN telah dipakai</span>
              <?php } ?>

            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Nama Lengkap</label>
            <div class="col-sm-5">
              <input type="text" name="first_name" placeholder="Nama Depan" class="form-control" <?php if(isset($_POST['first_name'])) { echo "value='$_POST[first_name]'"; } ?>>
            </div>
            <div class="col-sm-5">
              <input type="text" name="last_name" placeholder="Nama Belakang" class="form-control" <?php if(isset($_POST['last_name'])) { echo "value='$_POST[last_name]'"; } ?>>
            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Jenis Kelamin</label>
            <div class="col-sm-10">
              <input type="radio" name="gender" value="1" <?php if(isset($_POST['gender']) && $_POST['gender'] == 1) { echo "checked"; } ?>> Laki - Laki
              <input type="radio" name="gender" value="0" <?php if(isset($_POST['gender']) && $_POST['gender'] == 0) { echo "checked"; } ?>> Perempuan
            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Tempat Tanggal Lahir</label>
            <div class="col-sm-5">
              <input type="text" name="born_city" placeholder="Kota Lahir" class="form-control" <?php if(isset($_POST['born_city'])) { echo "value='$_POST[born_city]'"; } ?>>
            </div>
            <div class="col-sm-5">
              <input type="date" name="birthday_date" class="form-control" <?php if(isset($_POST['birthday_date'])) { echo "value='$_POST[birthday_date]'"; } ?>>
            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Institusi / Sekolah Asal</label>
            <div class="col-sm-10">
              <input type="text" name="institution" placeholder="Nama Sekolah" class="form-control" <?php if(isset($_POST['institution'])) { echo "value='$_POST[institution]'"; } ?>>
            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Tingkat</label>
            <div class="col-sm-10">
              <select name="level" class="form-control">
                <option>- Pilih Tingkatan Sekolah -</option>
                <option value="1" <?php if(isset($_POST['level']) && $_POST['level'] == 1){ echo "selected"; } ?>>SD/MI Sederajat</option>
                <option value="2" <?php if(isset($_POST['level']) && $_POST['level'] == 2){ echo "selected"; } ?>>SMP/MTs Sederajat</option>
                <option value="3" <?php if(isset($_POST['level']) && $_POST['level'] == 3){ echo "selected"; } ?>>SMA/SMK/MA Sederajat</option>
              </select>
            </div>
          </div>

          <hr class="b-s-dashed">
          
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

