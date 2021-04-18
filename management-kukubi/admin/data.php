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
                <th>Username</th>
                <th>Email</th>
                <th>Verify</th>
                <th>Kode Verify</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              
              <?php
              $no = 0;
              $get_user = mysqli_query($conn, "SELECT * FROM user WHERE role < 2");
              while($user = mysqli_fetch_array($get_user)){ 
                $no++;
              ?>

              <tr>
                <td><?= $no ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['verify'] == 1? 'Ya' : 'Tidak' ?></td>
                <td><?= $user['verify_code'] ?></td>
                <td>

                  <?php if($user['role'] == 1){ ?>
                  <a href="?id=<?= $user['id'] ?>&action=edit" class="btn btn-sm btn-rect btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                  <a href="?id=<?= $user['id'] ?>&action=delete" class="btn btn-sm btn-rect btn-danger" onclick="return confirm('Yakin akan menghapus data?')"><i class="fa fa-trash"></i> Hapus</a>
                  <?php } else { ?>

                  <a href="#" class="btn btn-sm btn-secondary">Tidak ada Aksi</a>

                  <?php } ?>

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