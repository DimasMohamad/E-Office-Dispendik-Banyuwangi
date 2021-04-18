<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <header class="bg-emerland text-white">
        <h4><i class="fa fa-fw fa-plus"></i> Tambah <?= $title_page ?></h4>
      </header>

      <div class="box-body">
        <form method="POST" action="" class="form-horizontal">

            <div class="form-group">
              <label class="control-label col-sm-2">Sub BAB</label>
              <div class="col-sm-10">
                <input type="text" name="sub_chapter" class="form-control" placeholder="Judul spesifik">
              </div>
            </div>

            <hr class="b-s-dashed">
            
            <div class="form-group">
              <label class="control-label col-sm-2">Konten</label>
              <div class="col-sm-10">
                <textarea name="content" data-plugin="summernote"></textarea>
              </div>
            </div>
            
            <hr class="b-s-dashed">
            
            <div class="form-group">
              <label class="control-label col-sm-2"></label>
              <div class="col-sm-10">
                <button type="submit" name="submit" class="btn btn-rect btn-success"><i class="fa fa-fw fa-plus"></i> Tambahkan Data</button>
              </div>
            </div>
        </form>

      </div>
    </div>
  </div>
</div>

<?php
if(isset($_POST['submit'])){
  $gd_chapter = mysqli_query($conn, "SELECT * FROM chapter_title WHERE id = '$_GET[id]'");
  $rd_chapter = mysqli_fetch_array($gd_chapter);

  $chapter_id = $_GET['id'];
  $sub_chapter = $_POST['sub_chapter'];
  $content = $_POST['content'];
  $level = $rd_chapter['level'];

  $insert = mysqli_query($conn, "INSERT INTO chapter VALUES('','$chapter_id','$sub_chapter','$content','$level')");

  if($insert)
    go('?id='.$_GET['id'].'&log=insert');

}
?>