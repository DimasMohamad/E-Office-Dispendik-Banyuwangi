<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <header class="bg-peter-river text-white">
        <h4><i class="fa fa-fw fa-table"></i> Daftar <?= $title_page ?></h4>
      </header>

      <div class="box-body">

        <div class="table-responsive">
          <table data-plugin="datatables" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>No Agenda</th>
                <th>Tanggal Terima</th>
                <th>Asal Surat</th>
                <th>Tanggal Surat</th>
                <th>Nomor Surat</th>
                <th>Perihal</th>
                <th>Sekretaris</th>
                <th>KABID PAUD</th>
                <th>KABID SD</th>
                <th>KABID SMP</th>
                <th>KABID DIKMAS</th>
                <th>KASUBBAG KEPEGAWAIAN</th>
                <th>KASUBBAG KEUANGAN</th>
                <th>KASUBBAG SUNGRAM</th>
                <th>KASI PTK PAUD</th>
                <th>KASI PRASPAUD</th>
                <th>KASI PTK SD</th>
                <th>KASI PRASSD</th>
                <th>KASI PTK SMP</th>
                <th>KASI PRASSMP</th>
                <th>KASI KESETARAAN</th>
                <th>KASI PELATIHAN</th>
                <th>DISPOSISI KADIS</th>
                <th>DISPOSISI SEKDIS</th>
                <th>HARI</th>
                <th>WAKTU</th>
                <th>TEMPAT</th>
                <th>ACARA</th>
                <th>FILE</th>
                <th>Tindakan</th>

              </thead>
              <tbody>

                <?php
                $no = 0;
                $get_data_surat = mysqli_query($conn, "SELECT * FROM data_surat");
                while($data_surat = mysqli_fetch_array($get_data_surat)){ 
                  $no++;
                  ?>


                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $data_surat['tanggal_diterima']?></td>
                    <td><?= $data_surat['asal_surat'] ?></td>
                    <td><?= $data_surat['tanggal_surat']?></td>
                    <td><?= $data_surat["nomor_surat"]?></td>
                    <td><?= $data_surat['perihal']?></td>
                    <td><?= $data_surat['sekretaris']?></td>
                    <td><?= $data_surat['kabid_paud']?></td>
                    <td><?= $data_surat['kabid_sd']?></td>
                    <td><?= $data_surat['kabid_smp']?></td>
                    <td><?= $data_surat['kabid_dikmas']?></td>
                    <td><?= $data_surat['kasubbag_kepegawaian']?></td>
                    <td><?= $data_surat['kasubbag_keuangan']?></td>
                    <td><?= $data_surat['kasubbag_sungram']?></td>
                    <td><?= $data_surat['kasi_ptkpaud']?></td>
                    <td><?= $data_surat['kasi_praspaud']?></td>
                    <td><?= $data_surat['kasi_ptksd']?></td>
                    <td><?= $data_surat['kasi_prassd']?></td>
                    <td><?= $data_surat['kasi_ptksmp']?></td>
                    <td><?= $data_surat['kasi_prassmp']?></td>
                    <td><?= $data_surat['kasi_kesetaraan']?></td>
                    <td><?= $data_surat['kasi_pelatihan']?></td>
                    <td><?= $data_surat['disposisi_kadis']?></td>
                    <td><?= $data_surat['disposisi_sekdis']?></td>
                    <td><?= $data_surat['hari']?></td>
                    <td><?= $data_surat['waktu']?></td>
                    <td><?= $data_surat['tempat']?></td>
                    <td><?= $data_surat['acara']?></td>
                    <td><?= $data_surat['file_pdf']?></td>
                    <td>
                      <a href="?id=<?= $data_surat['id'] ?>&action=edit" class="btn btn-sm btn-rect btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                      <a href="?id=<?= $data_surat['id'] ?>&action=delete" class="btn btn-sm btn-rect btn-danger" onclick="return confirm('Yakin akan menghapus data?')"><i class="fa fa-trash"></i> Hapus</a>
                      <a download="Files/<?= $data_surat['file_pdf']?>" href="Files/<?= $data_surat['file_pdf']?>" class="btn btn-sm btn-rect btn-primary"><i class="fa fa-download"></i> File</a>
                    </td>

                  </tr>

                <?php } ?>

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>