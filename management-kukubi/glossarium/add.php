<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <header class="bg-emerland text-white">
        <h4><i class="fa fa-fw fa-plus"></i> Tambah <?= $title_page ?></h4>
      </header>

      <div class="box-body">

        <form method="POST" action="" class="form-horizontal">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Kata Kunci</label>
            <div class="col-sm-10">
              <input type="text" name="keyword" class="form-control">
            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2">Deskripsi</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="description"></textarea>
            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-2"></label>
            <div class="col-sm-10">
              <button type="submit" name="submit" class="btn btn-rect btn-success"><i class="fa fa-plus"></i> Tambahkan Data</button>
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

  $insert = mysqli_query($conn, "INSERT INTO glossarium VALUES('','$keyword','$description')");

  if($insert)
    go('?log=insert');
}
?>