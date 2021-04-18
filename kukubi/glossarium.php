<?php
$title_page = 'Glosarium';
$confirm_page = 0;
include "include/header.php";
?>

  <div class="container">
    <div class="section">

      <div class="input-field ">
        <input type="text" id="search" onkeyup="searchKeyUp()" placeholder="Cari kata kunci...">
      </div>

      <ul class="collapsible" id="list">

        <?php 
        $query = mysqli_query($conn, "SELECT * FROM glossarium");
        while($row = mysqli_fetch_array($query)){
        ?>

        <li>
            <div class="collapsible-header">
              <div class="col s-11 left-align btn-block">
                <b><?= $row['keyword'] ?></b>
              </div>
              <div class="col s-1 right-align btn-block">
                  <i class="material-icons">expand_more</i>
              </div>
            </div>
            <div class="collapsible-body"><?= $row['description'] ?></div>
        </li>

        <?php } ?>

      </ul>
    </div>
  </div>

<?php
include "include/footer.php";
?>