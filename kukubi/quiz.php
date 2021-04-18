<?php
error_reporting(0);
//TENTUKAN JUDUL HALAMAN
if(!isset($_GET['quiz_no']))
  $title_page = 'Evaluasi';
else
  $title_page = 'Soal ke '.$_GET['quiz_no'];

//MENENTUKAN KONDISI TERKUNCI DALAM SOAL
$confirm_page = 1;
include "include/header.php";
?>

  <!-- HALAMAN SEBELUM MASUK SOAL -->

  <?php if(!isset($_GET['quiz_no']) && !isset($_GET['status'])){ ?>
    
  <div class="container container-margin-updown">
    <div class="section center">
        
        <h1 class="material-icons light-blue-text big-icon">verified_user</h1>
        <h5>Evaluasi Hasil Belajar</h5>

        <p class="light">
          Kuis terdiri dari 20 soal. Pastikan Anda telah paham betul dengan materi yang telah Anda pelajari sebelumnya. Waktu mengerjakan selama 30 menit. Anda tidak diperkenankan keluar dari halaman kuis selama kuis berlangsung.
        </p>

        <a href="quiz.php?verify=1&chapter_id=<?= $_GET[chapter_id] ?>" class="btn light-blue container-margin-updown">Mulai Mengerjakan</a>

        <?php
        //SET STATUS VERIFIKASI MENGERJAKAN SOAL (UNTUK MENGUNCI HALAMAN PADA APLIKASI)
        if(isset($_GET['verify'])){
            $update_verify_quiz = mysqli_query($conn, "INSERT INTO quiz_verify VALUES('','$_SESSION[user]','$_GET[chapter_id]','1')");
            if($update_verify_quiz)
              go("quiz.php?quiz_no=1&chapter_id=$_GET[chapter_id]");
        }
        ?>

    </div>
  </div>

  <!-- HALAMAN PENGERJAAN SOAL -->

  <?php } else { ?>

  <div class="container">
    <div class="section">

      <?php
      $prev_page = $_GET['quiz_no'] - 1;
      $next_page = $_GET['quiz_no'] + 1;

      //CEK PENGERJAAN SOAL
      $query_do_quiz = mysqli_query($conn, "SELECT COUNT(*) AS total, current_answer, answer FROM result_quiz WHERE username = '$_SESSION[user]' AND no_quiz = $_GET[quiz_no] AND chapter_id = '$_GET[chapter_id]'");
      $row_do_quiz = mysqli_fetch_array($query_do_quiz);

      //CEK MAX ID
      $query_max_quiz = mysqli_query($conn, "SELECT MAX(no_quiz) AS quiz_no FROM quiz WHERE chapter_id = $_GET[chapter_id] AND level = $_SESSION[level]");
      $row_max_quiz = mysqli_fetch_array($query_max_quiz);

      //MENAMPILKAN SOAL 1 HALAMAN 1 SOAL
      $urutan = $_GET['quiz_no'] - 1;
      $query = mysqli_query($conn, "SELECT * FROM quiz WHERE level = $_SESSION[level] AND chapter_id = $_GET[chapter_id] LIMIT $urutan,1");
      while($row = mysqli_fetch_array($query)){
      ?>

      <form method="POST" action="">
        <div class="card">

          <?php if($row['image'] != '0'){ ?>

          <div class="card-image">
            <img src="<?= $row['image'] ?>">
          </div>

          <?php } ?>

          <!-- PERTANYAAN -->

          <div class="card-content">
            <b><?= $row['question'] ?></b>
            <br><br>

            <?php if($row_do_quiz['total'] == 0){ ?>

            <p>
              <label>
                <input type="radio" name="answer" value="<?= $row['a'] ?>">
                <span><?= $row['a'] ?></span>
              </label>
            </p>
            <p>
              <label>
                <input type="radio" name="answer" value="<?= $row['b'] ?>">
                <span><?= $row['b'] ?></span>
              </label>
            </p>
            <p>
              <label>
                <input type="radio" name="answer" value="<?= $row['c'] ?>">
                <span><?= $row['c'] ?></span>
              </label>
            </p>
            <p>
              <label>
                <input type="radio" name="answer" value="<?= $row['d'] ?>">
                <span><?= $row['d'] ?></span>
              </label>
            </p>

            <?php } else { ?>

            <p>
              <label>
                <input type="radio" name="answer" value="<?= $row['a'] ?>" <?= $row_do_quiz['answer'] == $row['a']? 'checked':'' ?>>
                <span><?= $row['a'] ?></span>
              </label>
            </p>
            <p>
              <label>
                <input type="radio" name="answer" value="<?= $row['b'] ?>" <?= $row_do_quiz['answer'] == $row['b']? 'checked':'' ?>>
                <span><?= $row['b'] ?></span>
              </label>
            </p>
            <p>
              <label>
                <input type="radio" name="answer" value="<?= $row['c'] ?>" <?= $row_do_quiz['answer'] == $row['c']? 'checked':'' ?>>
                <span><?= $row['c'] ?></span>
              </label>
            </p>
            <p>
              <label>
                <input type="radio" name="answer" value="<?= $row['d'] ?>" <?= $row_do_quiz['answer'] == $row['d']? 'checked':'' ?>>
                <span><?= $row['d'] ?></span>
              </label>
            </p>              

            <?php } ?>

          </div>

          <!-- AKHIR DARI PERTANYAAN -->

          <!-- PAGINATION PREV, NEXT, SELESAI -->

          <div class="card-action center">

            <?php if($_GET['quiz_no'] != 1){ ?>
            
            <a href="quiz.php?quiz_no=<?= $prev_page ?>&chapter_id=<?= $_GET['chapter_id'] ?>" class="btn light-blue">
              <i class="material-icons">keyboard_arrow_left</i>
            </a>

            <?php } if($row_max_quiz['quiz_no'] != $_GET['quiz_no']){ if($row_do_quiz['total'] == 0){ ?>

            <button type="submit" name="submit" class="btn light-blue">
              <i class="material-icons">keyboard_arrow_right</i>
            </button>

            <?php } else {  ?>

            <button type="submit" name="update" class="btn light-blue">
              <i class="material-icons">keyboard_arrow_right</i>
            </button>

            <?php } } else {  ?>

            <button type="submit" name="done" class="btn green">
              <i class="material-icons left">done</i>Selesai
            </button>

            <?php } ?>

          </div>

          <!-- AKHIR DARI PAGINATION PREV, NEXT, SELESAI -->

        </div>
      </form>

      <?php 
      //KETIKA MENJAWAB SOAL
      if(isset($_POST['submit'])){
        $quiz_no = $_GET['quiz_no'];
        $chapter_id = $_GET['chapter_id'];
        $username = $_SESSION['user'];
        $answer = $_POST['answer'];
        $current_answer = $row['current_answer'];

        if($answer == $current_answer)
          $status = 1;
        else
          $status = 0;

        $insert = mysqli_query($conn, "INSERT INTO result_quiz VALUES('','$quiz_no','$chapter_id','$username','$answer','$current_answer','$status')");

        if($insert){
          go("quiz.php?quiz_no=$next_page&chapter_id=$_GET[chapter_id]");
        }
      
      //UPDATE JAWABAN
      } else if(isset($_POST['update'])){
        $quiz_no = $_GET['quiz_no'];
        $chapter_id = $_GET['chapter_id'];
        $username = $_SESSION['user'];
        $answer = $_POST['answer'];
        $current_answer = $row['current_answer'];

        if($answer == $current_answer)
          $status = 1;
        else
          $status = 0;

        $update_answer = mysqli_query($conn, "UPDATE result_quiz SET answer = '$answer', status = '$status' WHERE no_quiz = '$quiz_no' AND username = '$username' AND chapter_id = '$chapter_id'");

        if($update_answer){
          go("quiz.php?quiz_no=$next_page&chapter_id=$_GET[chapter_id]");
        }

      //SELESAI
      } else if(isset($_POST['done'])){
        $quiz_no = $_GET['quiz_no'];
        $chapter_id = $_GET['chapter_id'];
        $username = $_SESSION['user'];
        $answer = $_POST['answer'];
        $current_answer = $row['current_answer'];

        if($answer == $current_answer)
          $status = 1;
        else
          $status = 0;

        $insert = mysqli_query($conn, "INSERT INTO result_quiz VALUES('','$quiz_no','$chapter_id','$username','$answer','$current_answer','$status')");
        $update = mysqli_query($conn, "UPDATE quiz_verify SET status = 2 WHERE username = '$username' AND chapter_id = $_GET[chapter_id]");

        if($insert)
          go("quiz.php?status=2&chapter_id=$_GET[chapter_id]");
      }
      ?>

      <?php } ?> 

    </div>
  </div>
        
  <!-- HALAMAN SETELAH MENGERJAKAN SOAL -->

  <?php } if(isset($_GET['status'])){ if($_GET['status'] == 2){ ?>

  <div class="container container-margin-updown">
    <div class="section center">
        
        <h1 class="material-icons light-blue-text big-icon">done</h1>
        <h5>Selesai</h5>
        
        <p class="light">
          Anda telah mengerjakan kuis dengan baik. Silahkan tekan tombol dibawah ini untuk melihat hasil pekerjaan Anda.
        </p>

        <?php if(isset($_GET['done'])){ ?>

        <a href="result.php?status=2&chapter_id=<?= $_GET[chapter_id] ?>&done=1" class="btn light-blue container-margin-updown">Lihat Hasil</a>

        <?php } else { ?>

        <a href="result.php?status=2&chapter_id=<?= $_GET[chapter_id] ?>" class="btn light-blue container-margin-updown">Lihat Hasil</a>

        <?php } ?>

    </div>
  </div>

  <?php } } ?>

<?php
include "include/footer.php";
?>