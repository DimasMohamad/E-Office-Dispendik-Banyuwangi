<?php
$ge_chapter = mysqli_query($conn, "SELECT * FROM chapter WHERE id = '$_GET[id_course]'");
$r_chapter = mysqli_fetch_array($ge_chapter);
?> 

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <header class="bg-emerland text-white">
        <h4><i class="fa fa-fw fa-edit"></i> Edit <?= $title_page.' ID '.$r_chapter['id'] ?></h4>
      </header>

      <div class="box-body">
        <form method="POST" action="" class="form-horizontal">

            <div class="form-group">
              <label class="control-label col-sm-2">Sub BAB</label>
              <div class="col-sm-10">
                <input type="text" name="sub_chapter" class="form-control" value="<?= $r_chapter['sub_chapter'] ?>">
              </div>
            </div>

            <hr class="b-s-dashed">
            
            <div class="form-group">
              <label class="control-label col-sm-2">Konten</label>
              <div class="col-sm-10">
                <textarea name="content" data-plugin="summernote"><?= $r_chapter['content'] ?></textarea>
              </div>
            </div>
            
            <hr class="b-s-dashed">
            
            <div class="form-group">
              <label class="control-label col-sm-2"></label>
              <div class="col-sm-10">
                <button type="submit" name="submit" class="btn btn-rect btn-success"><i class="fa fa-fw fa-save"></i> Simpan Perubahan</button>
                <a href="?id=<?= $_GET['id'] ?>" class="btn btn-rect btn-danger">Batal</a>
              </div>
            </div>
        </form>

      </div>
    </div>
  </div>
</div>

<?php
if(isset($_POST['submit'])){

  $sub_chapter = $_POST['sub_chapter'];
  $content = $_POST['content'];

  $update = mysqli_query($conn, "UPDATE chapter SET sub_chapter = '$sub_chapter', content = '$content' WHERE id = '$_GET[id_course]'");

  if($update)
    go('?id='.$_GET['id'].'&log=update');

}
?>