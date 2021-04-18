<?php
$title_page = 'Kukubi';
$confirm_page = 0;
include "include/header.php";
?>

  <div class="section no-pad-bot light-blue index-logo" id="index-banner">
    <div class="container center">
      <img src="image/logo.png" width="70%">
    </div>
  </div>

  <div class="container container-margin-updown">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">

        <?php
        $query = mysqli_query($conn, "SELECT * FROM chapter c, data_surat ct WHERE ct.id = c.chapter_id AND c.level = '$_SESSION[level]' GROUP BY chapter_name");
        while($row = mysqli_fetch_array($query)){ 
        ?>

        <div class="col s6 m4 thumb">
           <a href="chapter.php?id=<?= $row['id'] ?>&chapter_name=<?= $row['chapter_name'] ?>">
            <div class="icon-block">
              <h1 class="center light-blue-text icon-thumb"><i class="material-icons">library_books</i></h1>
              <p class="center"><?= $row['chapter_name'] ?></p>
            </div>
          </a>
        </div>

        <?php } ?>

        <div class="col s6 m4 thumb">
          <a href="glossarium.php">
            <div class="icon-block">
              <h1 class="center light-blue-text icon-thumb"><i class="material-icons">local_library</i></h1>
              <p class="center">Glosarium</p>
            </div>
          </a>
        </div>

        <div class="col s6 m4 thumb">
          <a href="about.php">
            <div class="icon-block">
              <h1 class="center light-blue-text icon-thumb"><i class="material-icons">developer_mode</i></h1>
              <p class="center">Tentang Pengembang</p>
            </div>
          </a>
        </div>
      </div>

    </div>
  </div>

<?php
include "include/footer.php";
?>