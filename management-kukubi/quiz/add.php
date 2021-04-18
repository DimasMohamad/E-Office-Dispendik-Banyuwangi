<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <header class="bg-emerland text-white">
        <h4><i class="fa fa-fw fa-plus"></i> Tambah <?= $title_page ?></h4>
      </header>

      <div class="box-body">
        <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data">

            <div class="form-group">
              <label class="control-label col-sm-2">Pertanyaan</label>
              <div class="col-sm-10">
                <textarea name="question" class="form-control" placeholder="Tulis pertanyaan disini ...."></textarea>
              </div>
            </div>

            <hr class="b-s-dashed">

            <div class="form-group">
              <label class="control-label col-sm-2">Jawaban</label>
              
              <div class="col-sm-5">
                <input type="text" name="a" class="form-control" placeholder="Jawaban A">
              </div>

              <div class="col-sm-5">
                <input type="text" name="b" class="form-control" placeholder="Jawaban B">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2"></label>
              <div class="col-sm-5">
                <input type="text" name="c" class="form-control" placeholder="Jawaban C">
              </div>

              <div class="col-sm-5">
                <input type="text" name="d" class="form-control" placeholder="Jawaban D">
              </div>
            </div>
            
            <hr class="b-s-dashed">

            <div class="form-group">
              <label class="control-label col-sm-2">Jawaban Benar</label>
              <div class="col-sm-5">
                <select name="current_answer" class="form-control">
                  <option>- Pilih Jawaban Benar -</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>

              <label class="control-label col-sm-1">Gambar</label>
              <div class="col-sm-4">
                <input type="file" name="image" class="form-control">

                <?php if(!isset($_POST['submit'])) { ?>
                <span class="h6 text-alizarin">Tambahkan gambar jika ada</span>
                <?php } ?>
                
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
  $question = $_POST['question'];
  $a = $_POST['a'];
  $b = $_POST['b'];
  $c = $_POST['c'];
  $d = $_POST['d'];
  $current_answer_temp = $_POST['current_answer'];
  $level = $rd_chapter['level'];

  if($current_answer_temp == 'A')
    $current_answer = $a;
  else if($current_answer_temp == 'B')
    $current_answer = $b;
  else if($current_answer_temp == 'C')
    $current_answer = $c;
  else if($current_answer_temp == 'D')
    $current_answer = $d;

  $gd_max_id = mysqli_query($conn, "SELECT max(no_quiz) AS max FROM quiz WHERE chapter_id = '$_GET[id]'");
  $max_id = mysqli_fetch_array($gd_max_id);

  if(empty($max_id['max']))
    $auto_number = 1;
  else
    $auto_number = $max_id['max'] + 1;

  $name = $_FILES['image']['name'];
  $type = $_FILES['image']['type'];
  $size = $_FILES['image']['size'];
  $temp  = $_FILES['image']['tmp_name'];

  if(!$name){
    $insert = mysqli_query($conn, "INSERT INTO quiz VALUES('','$auto_number','$question','0','$a','$b','$c','$d','$current_answer','$level','$chapter_id')");

    if($insert)
      go('?id='.$_GET['id'].'&log=insert');
  }
  else{
    if($type == 'image/jpeg' && $size < 2000000){
      $timestamp = strtotime("now");
      $file_name = "img".$timestamp."-".$name;
      $location = "../../kukubi/image/quiz/$file_name";
      move_uploaded_file($temp, $location);

      $insert = mysqli_query($conn, "INSERT INTO quiz VALUES('','$auto_number','$question','$location','$a','$b','$c','$d','$current_answer','$level','$chapter_id')");

      if($insert)
        go('?id='.$_GET['id'].'&log=insert');
    }
    else{
      alert('danger','Format file tidak diizinkan atau file terlalu besar!');
    }
  }
}

?>