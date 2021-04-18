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
                <th>Sub Materi</th>
                <th>Konten</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              
              <?php
              $no = 0;
              $get_chapter = mysqli_query($conn, "SELECT * FROM chapter WHERE chapter_id = '$_GET[id]'");
              while($chapter = mysqli_fetch_array($get_chapter)){ 
                $no++;

              ?>

              <tr>
                <td><?= $no ?></td>
                <td><?= $chapter['sub_chapter'] ?></td>
                <td><?= mb_substr($chapter['content'], 0, 70)."...."; ?></td>
                <td> 
                  <button data-toggle="modal" data-target="#exampleModal<?= $chapter['id'] ?>"  class="btn btn-sm btn-rect btn-info"><i class="fa fa-eye"></i> Detail Materi</button>
                  <a href="?id=<?= $_GET['id'] ?>&id_course=<?= $chapter['id'] ?>&action=edit" class="btn btn-sm btn-rect btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                  <a href="?id=<?= $_GET['id'] ?>&id_course=<?= $chapter['id'] ?>&action=delete" class="btn btn-sm btn-rect btn-danger" onclick="return confirm('Yakin akan menghapus data?')"><i class="fa fa-trash"></i> Hapus</a>
                </td>
              </tr>

              <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal<?= $chapter['id'] ?>">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3><?= $chapter['sub_chapter'] ?></h3>
                    </div>
                    <div class="modal-body">
                      <?= $chapter['content'] ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

              <?php } ?>
            
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>