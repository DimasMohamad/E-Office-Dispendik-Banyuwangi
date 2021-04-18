<?php
$title_page = 'Registrasi';
$confirm_page = 0;
include "include/header.php";
?>

  <div class="container">
    <div class="section">

      <?php

      if(isset($_POST['submit'])){
        $nisn = $_POST['nisn'];
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $institusi = $_POST['institusi'];
        $tingkat = $_POST['tingkat'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $ulangi_password = md5($_POST['ulangi_password']);
        $verify_code = randomChar(20, 1, "numbers");

        //CEK KESAMAAN USERNAME
        $get_user = mysqli_query($conn, "SELECT count(username) AS total FROM user WHERE username = '$username'");
        $row_user = mysqli_fetch_array($get_user);

        //CEK KESAMAAN EMAIL
        $get_email = mysqli_query($conn, "SELECT count(email) AS total FROM user WHERE email = '$email'");
        $row_email = mysqli_fetch_array($get_email);

        //CEK KESAMAAN NISN
        $get_nisn = mysqli_query($conn, "SELECT count(nisn) AS total FROM biodata_user WHERE nisn = '$nisn'");
        $row_nisn = mysqli_fetch_array($get_nisn);

        //CEK KONDISI
        if($row_user['total'] > 0 || $row_email['total'] > 0 || $row_nisn['total'] > 0 || $password != $ulangi_password) {
          if($row_user['total'] > 0) 
            $error_username = 1;
          if($row_email['total'] > 0) 
            $error_email = 1;
          if($row_nisn['total'] > 0) 
            $error_nisn = 1;
          if($password != $ulangi_password) 
            $error_password = 1;
        } else {
          //INSERT DATA KE DATABASE
          $biodata = mysqli_query($conn, "INSERT INTO biodata_user VALUES('','$nisn','$nama_depan','$nama_belakang','$jenis_kelamin','$tempat_lahir','$tgl_lahir','$institusi','$tingkat','$username')");
          $user = mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','2','$email','$verify_code[0]','1','0')");

          if($biodata && $user)
            go('register.php?reg=success');
        }
      }

      if(isset($_GET['reg']) && $_GET['reg'] == 'success'){
        msgBox('Selamat! Anda telah berhasil melakukan registrasi. Sekarang Anda dapat melakukan login','login.php');
      }

      ?>

      <form method="post" action="">

        <?php if(isset($error_nisn) && $error_nisn == 1){ ?>
        <label class="red-text">NISN telah digunakan!</label>
        <?php } ?>

        <div class="input-field">
          <input id="nisn" type="text" required="" name="nisn" class="validate" <?php if(isset($_POST['nisn'])){ echo "value='$_POST[nisn]'"; } ?>>
          <label for="nisn">Nomor Induk Siswa Nasional</label>
        </div>

        <div class="input-field">
          <input id="nama_depan" type="text" required="" name="nama_depan" class="validate" <?php if(isset($_POST['nama_depan'])){ echo "value='$_POST[nama_depan]'"; } ?>>
          <label for="nama_depan">Nama Depan</label>
        </div>

        <div class="input-field">
          <input id="nama_belakang" type="text" required="" name="nama_belakang" class="validate" <?php if(isset($_POST['nama_belakang'])){ echo "value='$_POST[nama_belakang]'"; } ?>>
          <label for="nama_belakang">Nama Belakang</label>
        </div> 

        <div class="input-field combobox-field">
          <select id="jenis_kelamin" required="" name="jenis_kelamin">
            <option value="1" <?php if(isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == '1'){ echo "selected"; } ?>>Laki - Laki</option>
            <option value="0" <?php if(isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == '0'){ echo "selected"; } ?>>Perempuan</option>
          </select>
          <label for="jenis_kelamin">Jenis Kelamin</label>
        </div>
        
        <div class="input-field">
          <input id="tempat_lahir" type="text" required="" name="tempat_lahir" class="validate" <?php if(isset($_POST['tempat_lahir'])){ echo "value='$_POST[tempat_lahir]'"; } ?>>
          <label for="tempat_lahir">Tempat Lahir</label>
        </div>

        <div class="input-field">
          <input id="tgl_lahir" type="date" required="" name="tgl_lahir" class="validate" <?php if(isset($_POST['tgl_lahir'])){ echo "value='$_POST[tgl_lahir]'"; } ?>>
          <label for="tgl_lahir">Tanggal Lahir</label>
        </div>

        <div class="input-field">
          <input id="institusi" type="text" required="" name="institusi" class="validate" <?php if(isset($_POST['institusi'])){ echo "value='$_POST[institusi]'"; } ?>>
          <label for="institusi">Institusi / Nama Sekolah</label>
        </div>

        <div class="input-field combobox-field">
          <select id="tingkat" required="" name="tingkat">
            <option value="1" <?php if(isset($_POST['tingkat']) && $_POST['tingkat'] == '1'){ echo "selected"; } ?>>SD Sederajat</option>
            <option value="2" <?php if(isset($_POST['tingkat']) && $_POST['tingkat'] == '2'){ echo "selected"; } ?>>SMP Sederajat</option>
            <option value="3" <?php if(isset($_POST['tingkat']) && $_POST['tingkat'] == '3'){ echo "selected"; } ?>>SMA/SMK Sederajat</option>
          </select>
          <label for="tingkat">Tingkat</label>
        </div>

        <?php if(isset($error_username) && $error_username == 1){ ?>
        <label class="red-text">Username telah digunakan!</label>
        <?php } ?>

        <div class="input-field">
          <input id="username" type="text" required="" name="username" class="validate" <?php if(isset($_POST['username'])){ echo "value='$_POST[username]'"; } ?>>
          <label for="username">Username</label>
        </div>

        <?php if(isset($error_email) && $error_email == 1){ ?>
        <label class="red-text">Email telah digunakan!</label>
        <?php } ?>

        <div class="input-field">
          <input id="email" type="email" required="" name="email" class="validate" <?php if(isset($_POST['email'])){ echo "value='$_POST[email]'"; } ?>>
          <label for="email">Email</label>
        </div>

        <?php if(isset($error_password) && $error_password == 1){ ?>
        <label class="red-text">Kombinasi password tidak sama!</label>
        <?php } ?>

        <div class="input-field">
          <input id="password" type="password" required="" name="password" class="validate">
          <label for="password">Password</label>
        </div>

        <div class="input-field">
          <input id="ulangi_password" type="password" required="" name="ulangi_password" class="validate">
          <label for="ulangi_password">Ulangi Password</label>
        </div>

        <br>

        <button type="submit" name="submit" class="waves-effect waves-light btn light-blue btn-block">Registrasi</button>
        
      </form>

      <br>
      <br>

    </div>
  </div>

<?php
include "include/footer.php";
?>