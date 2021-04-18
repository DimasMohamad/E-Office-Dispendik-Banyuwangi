<?php
$ge_user = mysqli_query($conn, "SELECT u.id AS id_user, bu.id AS id_bio, u.username, u.email, u.verify, bu.nisn, bu.first_name, bu.last_name, bu.gender, bu.born_city, bu.birthday_date, bu.institution, bu.level FROM user u, biodata_user bu WHERE bu.username = u.username AND u.id = '$_GET[id]'");
$r_user = mysqli_fetch_array($ge_user); 

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
  $verify = $_POST['verify'];

  $gc_nisn = mysqli_query($conn, "SELECT count(nisn) AS total FROM biodata_user WHERE nisn = '$nisn' AND nisn != '$r_user[nisn]'");
  $c_nisn = mysqli_fetch_array($gc_nisn);

  $gc_user = mysqli_query($conn, "SELECT count(username) AS total FROM user WHERE username = '$username' AND username != '$r_user[username]'");
  $c_user = mysqli_fetch_array($gc_user);

  $gc_email = mysqli_query($conn, "SELECT count(email) AS total FROM user WHERE email = '$email' AND email != '$r_user[email]'");
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
    if(!isset($password)){
      $update_user = mysqli_query($conn, "UPDATE user SET username = '$username', email = '$email' verify = '$verify' WHERE id = '$_GET[id]'");
    }
    else{
      $update_user = mysqli_query($conn, "UPDATE user SET username = '$username', email = '$email', verify = '$verify', password = '$password' WHERE id = '$_GET[id]'");  
    }

    $update_bio = mysqli_query($conn, "UPDATE biodata_user SET nisn = '$nisn', first_name = '$first_name', last_name = '$last_name', gender = '$gender', born_city = '$born_city', birthday_date = '$birthday_date', institution = '$institution', level = '$level', username = '$username' WHERE id = '$r_user[id_bio]'");

    if($update_user && $update_bio)
      go('?log=update');

    }
}

?>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <header class="bg-emerland text-white">
        <h4><i class="fa fa-fw fa-edit"></i> Edit <?= $title_page .' ID '. $r_user['id_user'] ?></h4>
      </header>

      <div class="box-body">

        <form method="POST" action="" class="form-horizontal">

          <div class="form-group">
            <label class="control-label col-sm-2">NISN</label>
            <div class="col-sm-10">
              <input type="text" name="nisn" placeholder="Nomor Induk Siswa Nasional" class="form-control" <?php if(isset($_POST['nisn'])) { echo "value='$_POST[nisn]'"; } else { echo "value='$r_user[nisn]'"; } ?>>

              <?php if(isset($error_nisn) && $error_nisn == 1){ ?>
              <span class="h6 text-alizarin">NISN telah dipakai</span>
              <?php } ?>

            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Nama Lengkap</label>
            <div class="col-sm-5">
              <input type="text" name="first_name" placeholder="Nama Depan" class="form-control" <?php if(isset($_POST['first_name'])) { echo "value='$_POST[first_name]'"; } else { echo "value='$r_user[first_name]'"; } ?>>
            </div>
            <div class="col-sm-5">
              <input type="text" name="last_name" placeholder="Nama Belakang" class="form-control" <?php if(isset($_POST['last_name'])) { echo "value='$_POST[last_name]'"; } else { echo "value='$r_user[last_name]'"; } ?>>
            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Jenis Kelamin</label>
            <div class="col-sm-10">
              <input type="radio" name="gender" value="1" <?php if(isset($_POST['gender']) && $_POST['gender'] == 1) { echo "checked"; } else { if($r_user['gender'] == 1) echo "checked"; } ?>> Laki - Laki
              <input type="radio" name="gender" value="0" <?php if(isset($_POST['gender']) && $_POST['gender'] == 0) { echo "checked"; }  else { if($r_user['gender'] == 0) echo "checked"; } ?>> Perempuan
            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Tempat Tanggal Lahir</label>
            <div class="col-sm-5">
              <input type="text" name="born_city" placeholder="Kota Lahir" class="form-control" <?php if(isset($_POST['born_city'])) { echo "value='$_POST[born_city]'"; } else { echo "value='$r_user[born_city]'"; } ?>>
            </div>
            <div class="col-sm-5">
              <input type="date" name="birthday_date" class="form-control" <?php if(isset($_POST['birthday_date'])) { echo "value='$_POST[birthday_date]'"; } else { echo "value='$r_user[birthday_date]'"; } ?>>
            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Institusi / Sekolah Asal</label>
            <div class="col-sm-10">
              <input type="text" name="institution" placeholder="Nama Sekolah" class="form-control" <?php if(isset($_POST['institution'])) { echo "value='$_POST[institution]'"; } else { echo "value='$r_user[institution]'"; } ?>>
            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Tingkat</label>
            <div class="col-sm-10">
              <select name="level" class="form-control">
                <option>- Pilih Tingkatan Sekolah -</option>
                <option value="1" <?php if(isset($_POST['level']) && $_POST['level'] == 1){ echo "selected"; } else { if($r_user['level'] == 1) echo "selected"; } ?>>SD/MI Sederajat</option>
                <option value="2" <?php if(isset($_POST['level']) && $_POST['level'] == 2){ echo "selected"; } else { if($r_user['level'] == 2) echo "selected"; } ?>>SMP/MTs Sederajat</option>
                <option value="3" <?php if(isset($_POST['level']) && $_POST['level'] == 3){ echo "selected"; } else { if($r_user['level'] == 3) echo "selected"; } ?>>SMA/SMK/MA Sederajat</option>
              </select>
            </div>
          </div>

          <hr class="b-s-dashed">
          
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
