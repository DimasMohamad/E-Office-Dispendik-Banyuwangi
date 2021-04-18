<?php
$ge_chapter = mysqli_query($conn, "SELECT * FROM data_surat WHERE id = '$_GET[id]'");
$r_chapter = mysqli_fetch_array($ge_chapter);
?> 

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <header class="bg-emerland text-white">
        <h4><i class="fa fa-fw fa-edit"></i> Edit <?= $title_page .' ID '. $r_chapter['id'] ?></h4>
      </header>

      <div class="box-body">

        <form method="POST" action="" class="form-horizontal">


          <div class="form-group">
            <label class="control-label col-sm-1">ISI SURAT</label>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Asal Surat</label>
            <div class="col-sm-2">
              <input type="text" name="asal_surat" class="form-control" value="<?= $r_chapter['asal_surat']  ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Tanggal Surat</label>
            <div class="col-sm-2">
              <input type="date" name="tanggal_surat" class="form-control" value="<?= $r_chapter['tanggal_surat']  ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Nomor Surat</label>
            <div class="col-sm-2">
              <input type="text" name="nomor_surat" class="form-control" value="<?= $r_chapter['nomor_surat']  ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Perihal</label>
            <div class="col-sm-2">
              <input type="text" name="perihal" class="form-control" value="<?= $r_chapter['perihal']  ?>">
            </div>
          </div>

          <hr class="b-s-dashed">

          <div class="form-group">
            <label class="control-label col-sm-1">Sekretaris</label>
            <div class="col-sm-1">
              <input type="text" name="sekretaris" class="form-control" value="<?= $r_chapter['sekretaris']  ?>">
            </div>
            <label class="control-label col-sm-1">Kabid Paud</label>
            <div class="col-sm-1">
              <input type="text" name="kabid_paud" class="form-control" value="<?= $r_chapter['kabid_paud']  ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Kabid SD</label>
            <div class="col-sm-1">
              <input type="text" name="kabid_sd" class="form-control" value="<?= $r_chapter['kabid_sd']  ?>">
            </div>
            <label class="control-label col-sm-1">Kabid SMP</label>
            <div class="col-sm-1">
              <input type="text" name="kabid_smp" class="form-control" value="<?= $r_chapter['kabid_smp']  ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Kabid Dikmas</label>
            <div class="col-sm-1">
              <input type="text" name="kabid_dikmas" class="form-control" value="<?= $r_chapter['kabid_dikmas']  ?>">
            </div>
            <label class="control-label col-sm-1">kasubbag Kepegawaian</label>
            <div class="col-sm-1">
              <input type="text" name="kasubbag_kepegawaian" class="form-control" value="<?= $r_chapter['kasubbag_kepegawaian']  ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Kasubbag Keuangan</label>
            <div class="col-sm-1">
              <input type="text" name="kasubbag_keuangan" class="form-control" value="<?= $r_chapter['kasubbag_keuangan']  ?>">
            </div>
            <label class="control-label col-sm-1">Kasubbag Sungram</label>
            <div class="col-sm-1">
              <input type="text" name="kasubbag_sungram" class="form-control" value="<?= $r_chapter['kasubbag_sungram']  ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Kasi PTK PAUD</label>
            <div class="col-sm-1">
              <input type="text" name="kasi_ptkpaud" class="form-control" value="<?= $r_chapter['kasi_ptkpaud']  ?>">
            </div>
            <label class="control-label col-sm-1">Kasi Praspaud</label>
            <div class="col-sm-1">
              <input type="text" name="kasi_praspaud" class="form-control" value="<?= $r_chapter['kasi_praspaud']  ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Kasi PTK SD</label>
            <div class="col-sm-1">
              <input type="text" name="kasi_ptksd" class="form-control" value="<?= $r_chapter['kasi_ptksd']  ?>">
            </div>
            <label class="control-label col-sm-1">Kasi Prassd</label>
            <div class="col-sm-1">
              <input type="text" name="kasi_prassd" class="form-control" value="<?= $r_chapter['kasi_prassd']  ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Kasi PTK SMP</label>
            <div class="col-sm-1">
              <input type="text" name="kasi_ptksmp" class="form-control" value="<?= $r_chapter['kasi_ptksmp']  ?>">
            </div>
            <label class="control-label col-sm-1">Kasi Prassmp</label>
            <div class="col-sm-1">
              <input type="text" name="kasi_prassmp" class="form-control" value="<?= $r_chapter['kasi_prassmp']  ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Kasi Kesetaraan</label>
            <div class="col-sm-1">
              <input type="text" name="kasi_kesetaraan" class="form-control" value="<?= $r_chapter['kasi_kesetaraan']  ?>">
            </div>
            <label class="control-label col-sm-1">Kasi Pelatihan</label>
            <div class="col-sm-1">
              <input type="text" name="kasi_pelatihan" class="form-control" value="<?= $r_chapter['kasi_pelatihan']  ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Disposisi Kadis</label>
            <div class="col-sm-1">
              <input type="text" name="disposisi_kadis" class="form-control" value="<?= $r_chapter['disposisi_kadis']  ?>">
            </div>
            <label class="control-label col-sm-1">Disposisi Sekdis</label>
            <div class="col-sm-1">
              <input type="text" name="disposisi_sekdis" class="form-control" value="<?= $r_chapter['disposisi_sekdis']  ?>">
            </div>
          </div>

          <hr class="b-s-dashed">

          <div class="form-group">
            <label class="control-label col-sm-1">UNDANGAN</label>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Hari</label>
            <div class="col-sm-1">
              <?php
              $tgl=date('l,d-m-y');
              echo$tgl;
              ?>
              <input type="text" name="perihal1" class="form-control">
            </div>
            <div class="col-sm-2">
              <input type="date" name="perihal2" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Waktu</label>
            <div class="col-sm-2">
              <input type="time" name="waktu" class="form-control" value="<?= $r_chapter['waktu']  ?>">

            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Tempat</label>
            <div class="col-sm-2">
              <input type="text" name="tempat" class="form-control" value="<?= $r_chapter['tempat']  ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-1">Acara</label>
            <div class="col-sm-2">
              <input type="text" name="acara" class="form-control" value="<?= $r_chapter['acara']  ?>">
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-sm-1"></label>
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
  $asal_surat = $_POST['asal_surat'];
  $tanggal_surat = $_POST['tanggal_surat'];
  $perihal = $_POST['perihal'];
  $nomor_surat = $_POST['nomor_surat'];

  $sekretaris = $_POST['sekretaris'];
  $kabid_paud = $_POST['kabid_paud'];
  $kabid_sd = $_POST['kabid_sd'];
  $kabid_smp = $_POST['kabid_smp'];
  $kabid_dikmas = $_POST['kabid_dikmas'];
  $kasubbag_kepegawaian = $_POST['kasubbag_kepegawaian'];
  $kasubbag_keuangan = $_POST['kasubbag_keuangan'];
  $kasubbag_sungram = $_POST['kasubbag_sungram'];
  $kasi_ptkpaud = $_POST['kasi_ptkpaud'];
  $kasi_praspaud = $_POST['kasi_praspaud'];
  $kasi_ptksd = $_POST['kasi_ptksd'];
  $kasi_prassd = $_POST['kasi_prassd'];
  $kasi_ptksmp = $_POST['kasi_ptksmp'];
  $kasi_prassmp = $_POST['kasi_prassmp'];
  $kasi_kesetaraan = $_POST['kasi_kesetaraan'];
  $kasi_pelatihan = $_POST['kasi_pelatihan'];
  $disposisi_kadis = $_POST['disposisi_kadis'];
  $disposisi_sekdis = $_POST['disposisi_sekdis'];
  
  $waktu = $_POST['waktu'];
  $tempat = $_POST['tempat'];
  $acara = $_POST['acara'];

  $update = mysqli_query($conn, "UPDATE data_surat SET  asal_surat = '$asal_surat', tanggal_surat = '$tanggal_surat', perihal = '$perihal', nomor_surat = '$nomor_surat', sekretaris = '$sekretaris', kabid_paud ='$kabid_paud', kabid_sd ='$kabid_sd', kabid_smp ='$kabid_smp', kabid_dikmas ='$kabid_dikmas', kasubbag_kepegawaian ='$kasubbag_kepegawaian', kasubbag_keuangan ='$kasubbag_keuangan', kasubbag_sungram ='$kasubbag_sungram', kasi_ptkpaud ='$kasi_ptkpaud', kasi_praspaud ='$kasi_praspaud', kasi_ptksd ='$kasi_ptksd', kasi_prassd ='$kasi_prassd', kasi_ptksmp ='$kasi_ptksmp', kasi_prassmp ='$kasi_prassmp', kasi_kesetaraan ='$kasi_kesetaraan', kasi_pelatihan ='$kasi_pelatihan', disposisi_kadis ='$disposisi_kadis', disposisi_sekdis ='$disposisi_sekdis', waktu ='$waktu', tempat ='$tempat', acara ='$acara'  WHERE id = '$_GET[id]'");

  if($update)
    go('?log=update');
}

?>