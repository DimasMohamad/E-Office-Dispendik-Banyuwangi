<?php
$title_page = $_GET['chapter_name'];
$confirm_page = 0;
include "include/header.php";
$chapter_id = $_GET['id'];
?>

  <div class="container">
    <div class="section">

        <?php 
        //AMBIL TOTAL QUIZ
        $get_total_quiz = mysqli_query($conn, "SELECT count(id) AS total_quiz FROM quiz WHERE chapter_id = '$chapter_id'");
        $total_quiz = mysqli_fetch_array($get_total_quiz);

        //TAMPILKAN DATA MATERI
        $no = 0;
        $query = mysqli_query($conn, "SELECT * FROM chapter WHERE chapter_id = '$chapter_id'");
        while($row = mysqli_fetch_array($query)){
          $no++;
        ?>
       
        <ul class="collection">
          <li class="collection-item avatar">
            <img src="image/chapter/<?= $no ?>.png" alt="" class="circle">
            <span class="title"><?= $row['sub_chapter'] ?></span>
            <p><a href="content.php?sub_chapter=<?= $row['sub_chapter'] ?>">Baca Selengkapnya</a></p>      
          </li>
        </ul>

        <?php } if($total_quiz['total_quiz'] > 0){ //MENU AKAN TAMPIL JIKA TERDAPAT KUIS ?>

        <ul class="collection">
          <li class="collection-item avatar">
            <img src="image/chapter/<?= $no+1 ?>.png" alt="" class="circle">
            <span class="title">Kuis</span>
            <p><a href="quiz.php?chapter_id=<?= $_GET['id'] ?>">Kerjakan Sekarang</a></p>      
          </li>
        </ul>

        <?php } ?>

    </div>
    <br><br>
  </div>

<?php
include "include/footer.php";
?>