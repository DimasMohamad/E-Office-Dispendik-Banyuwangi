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
                <th>Pertanyaan</th>
                <th>Tindakan</th> 
              </tr>
            </thead>
            <tbody>
              
              <?php
              $get_quiz = mysqli_query($conn, "SELECT * FROM quiz WHERE chapter_id = '$_GET[id]'");
              while($quiz = mysqli_fetch_array($get_quiz)){ 
              ?>

              <tr>
                <td><?= $quiz['no_quiz'] ?></td>
                <td><?= $quiz['question'] ?></td>
                <td>
                  <button data-toggle="modal" data-target="#exampleModal<?= $quiz['no_quiz'] ?>"  class="btn btn-sm btn-rect btn-info"><i class="fa fa-eye"></i> Detail Kuis</button>
                  <a href="?id=<?= $_GET['id'] ?>&id_quiz=<?= $quiz['id'] ?>&action=edit" class="btn btn-sm btn-rect btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                  <a href="?id=<?= $_GET['id'] ?>&id_quiz=<?= $quiz['id'] ?>&action=delete" class="btn btn-sm btn-rect btn-danger" onclick="return confirm('Yakin akan menghapus data?')"><i class="fa fa-trash"></i> Hapus</a>
                </td>
              </tr>

              <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal<?= $quiz['no_quiz'] ?>">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3>Pertanyaan nomor <?= $quiz['no_quiz'] ?></h3>
                    </div>
                    <div class="modal-body">

                      <b><?= $quiz['question'] ?></b><br><br>

                      <?= $quiz['image'] != '0'? "<img src='../../kukubi/$quiz[image]' class='img-responsive'><br><br>" : "" ?>

                      A. <?= $quiz['a'] ?><br>
                      B. <?= $quiz['b'] ?><br>
                      C. <?= $quiz['c'] ?><br>
                      D. <?= $quiz['d'] ?><br><br>

                      <?php
                      if($quiz['current_answer'] == $quiz['a'])
                        $select = 'A';
                      else if($quiz['current_answer'] == $quiz['b'])
                        $select = 'B';
                      else if($quiz['current_answer'] == $quiz['c'])
                        $select = 'C';
                      else if($quiz['current_answer'] == $quiz['d'])
                        $select = 'D';
                      ?>

                      <b>Kunci Jawaban:</b> <?= $select.'. '.$quiz['current_answer'] ?>

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