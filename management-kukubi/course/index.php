<?php
if(isset($_GET['id'])){
  $title_page = 'Materi';
} else {
  $title_page = 'Page Not Found';
}
$index_menu = 2;
include "../include/header.php";
?>

<header class="main-heading shadow-2dp">
  <div class="dashhead bg-white">
    <div class="dashhead-titles">
      <h1 class="dashhead-title"><?= $title_page ?></h1>
    </div>

    <div class="dashhead-toolbar">
      <div class="dashhead-toolbar-item">

        <?php if(isset($_GET['id'])){ ?>
      
        <a href="../dashboard/">Kukubi</a>
        / <a href="../chapter/">Chapter</a>
        / <?= $title_page ?>
      
        <?php } ?>
      
      </div>
    </div>
  </div>
</header>

<div class="main-content bg-clouds">
  <div class="container-fluid p-t-15">

    <?php 
    if(isset($_GET['id'])){
      if(isset($_GET['log'])){
        if($_GET['log'] == 'delete')
          alert('success','Data berhasil dihapus!');
        else if($_GET['log'] == 'insert')
          alert('success','Data berhasil ditambahkan!');
        else if($_GET['log'] == 'update')
          alert('success','Perubahan data disimpan!');
      }
      if(isset($_GET['action']) && $_GET['action'] == 'edit')
        include "edit.php";
      else
        include "add.php"; 

      include "delete.php";
      include "data.php"; 
    } else {
      include "../include/404.php";
    }
    ?>

  </div>
</div>

<?php
include "../include/footer.php";
?>