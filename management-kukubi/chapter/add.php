<?php
$tgl_diterima=date('d-m-y');
?>

<?php
$tgl=date('l, d-m-y');
//echo$tgl;
?>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <header class="bg-emerland text-white">
        <h4><i class="fa fa-fw fa-plus"></i> Tambah <?= $title_page ?></h4>
      </header>

      <div class="box-body">

        <form method="POST" class="form-horizontal" enctype="multipart/form-data">

          <div class="form-group">
            <label class="control-label col-sm-1">ISI SURAT</label>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Asal Surat</label>
            <div class="col-sm-2">
              <input type="text" name="asal_surat" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Tanggal Surat</label>
            <div class="col-sm-2">
              <input type="date" name="tanggal_surat" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Nomor Surat</label>
            <div class="col-sm-2">
              <input type="text" name="nomor_surat" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Perihal</label>
            <div class="col-sm-2">
              <input type="text" name="perihal" class="form-control">
            </div>
          </div>

          <hr class="b-s-dashed">

          <div class="form-group">
            <label class="control-label col-sm-1">UNDANGAN</label>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Hari</label>
            <div class="col-sm-1">
              <select name="hari">
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jum'at">Jum'at</option>
              </select>
            </div>
            <div class="col-sm-1">
              <input type="date" name="tanggal_undangan" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Waktu</label>
            <div class="col-sm-2">
              <input type="time" name="waktu" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Tempat</label>
            <div class="col-sm-2">
              <input type="text" name="tempat" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Acara</label>
            <div class="col-sm-2">
              <input type="text" name="acara" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1"></label>
            <div class="col-sm-2">
              <input type="file" name="pdf_file" id="pdf_file">
            </div>
          </div>

          <hr class="b-s-dashed">
          
          <div class="form-group">
            <label class="control-label col-sm-1"></label>
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
  $asal_surat = $_POST['asal_surat'];
  $tgl = date('l, d-m-y');
  $tanggal_surat = $_POST['tanggal_surat'];
  $perihal = $_POST['perihal'];
  $nomor_surat = $_POST['nomor_surat'];
  $hari = $_POST['hari'].', '.$_POST['tanggal_undangan'];
  $waktu = $_POST['waktu'];
  $tempat = $_POST['tempat'];
  $acara = $_POST['acara'];

  $allow = array('pdf');
  $temp = explode(".", $_FILES['pdf_file']['name']);
  $extension = end($temp);
  $upload_file = $_FILES['pdf_file']['name'];
  move_uploaded_file($_FILES['pdf_file']['tmp_name'], "Files/".$_FILES['pdf_file']['name']);


  $insert = mysqli_query($conn, "INSERT INTO data_surat VALUES('','$tgl_diterima','$asal_surat','$tanggal_surat','$perihal','$nomor_surat','','','','','','','','','','','','','','','','','','','$hari','$waktu','$tempat','$acara','$upload_file')");

  if($insert)
    go('?log=insert');
}
?>