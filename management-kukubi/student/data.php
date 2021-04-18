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
                <th>NISN</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Sekolah Asal</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              
              <?php
              $no = 0;
              $get_user = mysqli_query($conn, "SELECT u.id AS id_user, u.username, bu.nisn, bu.first_name, bu.last_name, bu.gender, bu.institution FROM user u, biodata_user bu WHERE bu.username = u.username AND role = 2");
              while($user = mysqli_fetch_array($get_user)){ 
                $no++;
              ?>

              <tr>
                <td><?= $no ?></td>
                <td><?= $user['nisn'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['first_name'].' '.$user['last_name'] ?></td>
                <td><?= $user['gender'] == 1? 'Laki - Laki' : 'Perempuan' ?></td>
                <td><?= $user['institution'] ?></td>
                <td>

                  <a href="?id=<?= $user['id_user'] ?>&action=edit" class="btn btn-sm btn-rect btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                  <a href="?id=<?= $user['id_user'] ?>&action=delete" class="btn btn-sm btn-rect btn-danger" onclick="return confirm('Yakin akan menghapus data?')"><i class="fa fa-trash"></i> Hapus</a>

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