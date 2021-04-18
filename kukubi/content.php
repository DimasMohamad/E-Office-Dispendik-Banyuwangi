<?php
$title_page = ucwords($_GET['sub_chapter']);
$confirm_page = 0;
include "include/header.php";
?>

  <div class="container">
    <div class="section">

        <?php 
        $query = mysqli_query($conn, "SELECT * FROM chapter WHERE sub_chapter = '$_GET[sub_chapter]'");
        $row = mysqli_fetch_array($query);
        ?>
        
        <div class="card">
          <div class="card-content">
            <?= $row['content'] ?>
          </div>
        </div>

    </div>
    <br><br>
  </div>

<?php
include "include/footer.php";
?>