<?php
$title_page = 'Hasil Evaluasi';
$confirm_page = 0;
include "include/header.php";
?>

  <div class="container">
    <div class="section">

    	<br>

        <?php include "data-result.php"; ?>

        <br>

        <!-- JIKA SETELAH MENGERJAKAN SOAL, TAMPIL BUTTON KEMBALI --> 

        <?php if(isset($_GET['status'])){ ?>

        	<div class="center">
        		<a href="index.php" class="btn light-blue" style="margin: 20px 0">Kembali ke Menu Utama</a>
			</div>
        
        <?php } ?>

    </div>
  </div>

<?php
include "include/footer.php";
?>