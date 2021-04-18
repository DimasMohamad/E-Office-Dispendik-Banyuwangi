<?php
$ge_glossarium = mysqli_query($conn, "SELECT * FROM glossarium WHERE id = '$_GET[id]'");
$r_glossarium = mysqli_fetch_array($ge_glossarium);
?> 

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <header class="bg-emerland text-white">
        <h4><i class="fa fa-fw fa-edit"></i> Edit <?= $title_page .' ID '. $r_glossarium['id'] ?></h4>
      </header>

      <div class="box-body">

        <form method="POST" action="" class="form-horizontal">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Kata Kunci</label>
            <div class="col-sm-10">
              <input type="text" name="keyword" class="form-control" value="<?= $r_glossarium['keyword']  ?>">
            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Deskripsi</label>
            <div class="col-sm-10">              
              <textarea class="form-control" name="description"><?= $r_glossarium['description']  ?></textarea>
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

<?php
if(isset($_POST['submit'])){
  $keyword = $_POST['keyword'];
  $description = $_POST['description'];

  $update = mysqli_query($conn, "UPDATE glossarium SET keyword = '$keyword', description = '$description' WHERE id = '$_GET[id]'");

  if($update)
    go('?log=update');
}

?>