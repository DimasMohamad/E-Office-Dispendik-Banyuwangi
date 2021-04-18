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
                <th>No</th>
                <th>Instansi Surat</th>
                <th>Deskripsi</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              
              <?php
              $no = 0;
              $get_glossarium = mysqli_query($conn, "SELECT * FROM glossarium");
              while($glossarium = mysqli_fetch_array($get_glossarium)){ 
                $no++;
              ?>

              <tr>
                <td><?= $no ?></td>
                <td><?= $glossarium['keyword'] ?></td>
                <td><?= $glossarium['description'] ?></td>
                <td>
                  <a href="?id=<?= $glossarium['id'] ?>&action=edit" class="btn btn-sm btn-rect btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                  <a href="?id=<?= $glossarium['id'] ?>&action=delete" class="btn btn-sm btn-rect btn-danger" onclick="return confirm('Yakin akan menghapus data?')"><i class="fa fa-trash"></i> Hapus</a>
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