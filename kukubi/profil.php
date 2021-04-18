<?php
//ATUR JUDUL HALAMAN
if(isset($_GET['edit'])){
    if($_GET['edit'] == 1)
        $title_page = 'Sunting Profil';
    else if($_GET['edit'] == 2)
        $title_page = 'Kata Sandi';
} else {
    $title_page = 'Profil';
}

$confirm_page = 0;
include "include/header.php";

//MENAMPILKAN DATA PROFIL
$query = mysqli_query($conn, "SELECT * FROM biodata_user bu, user u WHERE u.username = bu.username AND u.username = '$_SESSION[user]'");
$row = mysqli_fetch_array($query);

//QUERY SUNTING PROFIL
if(isset($_POST['submit'])){
    $nisn = $_POST['nisn'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $institusi = $_POST['institusi'];
    $tingkat = $_POST['tingkat'];

    $get_nisn = mysqli_query($conn, "SELECT count(nisn) AS total FROM biodata_user WHERE nisn = '$nisn' AND nisn != '$row[nisn]'");
    $row_nisn = mysqli_fetch_array($get_nisn);

    if($row_nisn['total'] > 0) {
        $error_nisn = 1;
    } else {
        $update = mysqli_query($conn, "UPDATE biodata_user SET nisn = '$nisn', first_name = '$nama_depan', last_name = '$nama_belakang', gender = '$jenis_kelamin', born_city = '$tempat_lahir', birthday_date = '$tgl_lahir', institution = '$institusi', level = '$tingkat' WHERE username = '$_SESSION[user]'");
        if($update)
            go('profil.php?update=1');
    }
}

//QUERY GANTI PASSWORD 
if(isset($_POST['submit_password'])){
    $password = md5($_POST['password']);
    $ulang_password = md5($_POST['ulang_password']);

    if($password != $ulang_password){
        alert('red', 'white-text', 'Kombinasi password tidak sama!');
    } else {
        $update = mysqli_query($conn, "UPDATE user SET password = '$password' WHERE username = '$_SESSION[user]'");
        if($update)
            go('profil.php?update=2');
    }
}

if(isset($_GET['edit'])){ 
?>

<!-- HALAMAN EDIT PROFIL -->

<div class="container">
    <div class="section">
        <br>        
        <form method="post" action="">

            <?php if(isset($error_nisn) && $error_nisn == 1){ ?>
            <label class="red-text">NISN telah digunakan!</label>
            <?php } ?>

            <div class="input-field">
              <input id="nisn" type="text" name="nisn" value="<?= isset($error_nisn)? $_POST['nisn'] : $row['nisn'] ?>" class="validate">
              <label for="nisn">Nomor Induk Siswa Nasional</label>
            </div>

            <div class="input-field">
              <input id="nama_depan" type="text" name="nama_depan" value="<?= $row['first_name'] ?>" class="validate">
              <label for="nama_depan">Nama Depan</label>
            </div>

            <div class="input-field">
              <input id="nama_belakang" type="text" name="nama_belakang" value="<?= $row['last_name'] ?>" class="validate">
              <label for="nama_belakang">Nama Belakang</label>
            </div> 

            <div class="input-field combobox-field">
              <select id="jenis_kelamin" name="jenis_kelamin">
                <option value="1" <?= $row['gender'] == 1? 'selected' : '' ?>>Laki - Laki</option>
                <option value="0" <?= $row['gender'] == 0? 'selected' : '' ?>>Perempuan</option>
              </select>
              <label for="jenis_kelamin">Jenis Kelamin</label>
            </div>

            <div class="input-field">
              <input id="tempat_lahir" type="text" name="tempat_lahir" value="<?= $row['born_city'] ?>" class="validate">
              <label for="tempat_lahir">Tempat Lahir</label>
            </div>

            <div class="input-field">
              <input id="tgl_lahir" type="date" name="tgl_lahir" value="<?= $row['birthday_date'] ?>" class="validate">
              <label for="tgl_lahir">Tanggal Lahir</label>
            </div>

            <div class="input-field">
              <input id="institusi" type="text" name="institusi" value="<?= $row['institution'] ?>" class="validate">
              <label for="institusi">Institusi / Nama Sekolah</label>
            </div>

            <div class="input-field combobox-field">
              <select id="tingkat" name="tingkat">
                <option value="1" <?= $row['level'] == 1? 'selected' : '' ?>>SD Sederajat</option>
                <option value="2" <?= $row['level'] == 2? 'selected' : '' ?>>SMP Sederajat</option>
                <option value="3" <?= $row['level'] == 3? 'selected' : '' ?>>SMA/SMK Sederajat</option>
              </select>
              <label for="tingkat">Tingkat</label>
            </div>

            <br>

            <button type="submit" name="submit" class="waves-effect waves-light btn light-blue btn-block">Simpan Perubahan</button>
        </form>

        <br>
        <br>
    </div>
</div>

<?php 
} else { 
    //NOTIFIKASI UPDATE DATA DAN PASSWORD
    if(isset($_GET['update']) && $_GET['update'] == 1){
        alert('teal center', 'white-text', 'Perubahan data telah disimpan!');
    } else if(isset($_GET['update']) && $_GET['update'] == 2){
        alert('teal center', 'white-text', 'Kata sandi baru telah disimpan!');
    } 
?>

<div class="container">
    <div class="section">

        <!-- MENU TABS -->

        <ul id="tabs-swipe-demo" class="tabs">
            <li class="tab col s3"><a href="#profil">Profil</a></li>
            <li class="tab col s3"><a href="#progress">Progress</a></li>
            <li class="tab col s3"><a href="#ganti-password">Ganti Password</a></li>
        </ul>

        <br>

        <!-- TAB PROFIL -->
        
        <div id="profil">
            <table class="responsive-table">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>L/P</th>
                        <th>TTL</th>
                        <th>Sekolah</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $row['nisn'] ?></td>
                        <td><?= $row['first_name']." ".$row['last_name'] ?></td>
                        <td><?= $row['gender'] == 1?'Laki - Laki' : 'Perempuan' ?></td>
                        <td><?php echo $row['born_city'].", "; echo tanggal($row['birthday_date']) ?></td>
                        <td><?= $row['institution'] ?></td>
                        <td><?= $row['email'] ?></td>
                    </tr>
                </tbody>
            </table>

            <br>

            <div class="input-field">
                <a href="profil.php?edit=1" class="btn light-blue">
                    <i class="material-icons left">edit</i> Sunting Profil
                </a>
            </div>
        </div>


        <!-- TAB PROGRESS -->

        <div id="progress">

            <?php 
            //CEK PROGRESS PENGERJAAN KUIS
            $get_count_verify = mysqli_query($conn, "SELECT count(*) AS total FROM quiz_verify qv, chapter_title c WHERE c.id = qv.chapter_id AND qv.username = '$_SESSION[user]'");
            $count_verify = mysqli_fetch_array($get_count_verify);

            //JIKA BELUM MENGERJAKAN KUIS
            if($count_verify['total'] == 0){ 
                alert('teal center', 'white-text', 'Anda belum mengerjakan kuis');
            //JIKA TELAH MENGERJAKAN KUIS
            } else {
                echo "<h6>Kuis yang telah dikerjakan :</h6>";
                echo "<ul class='collapsible'>";
                //MENAMPILKAN DATA VERIFY KUIS
                $get_verify_quiz = mysqli_query($conn, "SELECT * FROM quiz_verify qv, chapter_title c WHERE c.id = qv.chapter_id AND qv.username = '$_SESSION[user]'");
                while($verify_quiz = mysqli_fetch_array($get_verify_quiz)){

                    //PROGRESS QUIZ
                    if(empty($verify_quiz['status'])){
                        $quiz_verify = 'Belum Mengerjakan Kuis '.$verify_quiz['chapter_name'];
                    } else if($verify_quiz['status'] == 1){
                        $quiz_verify = 'Sedang Mengerjakan Kuis '.$verify_quiz['chapter_name'];
                    } else if($verify_quiz['status'] == 2){
                        $quiz_verify = 'Telah Mengerjakan Kuis '.$verify_quiz['chapter_name'];
                    }
            ?>

                <li>
                    <div class="collapsible-header">
                        <div class="col s-11 left-align btn-block">
                            <b><?= $verify_quiz['chapter_name'] ?></b>
                        </div>
                        <div class="col s-1 right-align btn-block">
                            <i class="material-icons">expand_more</i>
                        </div>
                    </div>
                    <div class="collapsible-body"><?php include "data-result.php"; ?></div>
                </li>

            <?php } //TUTUP WHILE ?>
            </ul>
            <?php } //TUTUP IF-ELSE ?>

        </div>

        <!-- TAB GANTI PASSWORD -->

        <div id="ganti-password">
            
            <form method="POST" action="">
                
                <div class="input-field">
                  <input id="password" type="password" name="password" class="validate">
                  <label for="password">Password Baru</label>
                </div>
                
                <div class="input-field">
                  <input id="ulang_password" type="password" name="ulang_password" class="validate">
                  <label for="ulang_password">Ulangi Password</label>
                </div>

                <br>

                <button type="submit" name="submit_password" class="waves-effect waves-light btn light-blue btn-block">Simpan Perubahan</button>

            </form> 
        </div>

    </div>
</div>

        <?php } ?>


<?php
include "include/footer.php";
?>