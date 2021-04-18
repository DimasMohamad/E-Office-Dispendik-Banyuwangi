<?php
$ge_quiz = mysqli_query($conn, "SELECT * FROM quiz WHERE id = '$_GET[id_quiz]'");
$r_quiz = mysqli_fetch_array($ge_quiz);
?>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <header class="bg-emerland text-white">
        <h4><i class="fa fa-fw fa-edit"></i> Edit <?= $title_page.' ID '. $r_quiz['id'] ?></h4>
      </header>

      <div class="box-body">
        <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data">

            <div class="form-group">
              <label class="control-label col-sm-2">Pertanyaan</label>
              <div class="col-sm-10">
                <textarea name="question" class="form-control"><?= $r_quiz['question'] ?></textarea>
              </div>
            </div>

            <hr class="b-s-dashed">

            <div class="form-group">
              <label class="control-label col-sm-2">Jawaban</label>
              
              <div class="col-sm-5">
                <input type="text" name="a" class="form-control" value="<?= $r_quiz['a'] ?>">
              </div>

              <div class="col-sm-5">
                <input type="text" name="b" class="form-control" value="<?= $r_quiz['b'] ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2"></label>
              <div class="col-sm-5">
                <input type="text" name="c" class="form-control" value="<?= $r_quiz['c'] ?>">
              </div>

              <div class="col-sm-5">
                <input type="text" name="d" class="form-control" value="<?= $r_quiz['d'] ?>">
              </div>
            </div>
            
            <hr class="b-s-dashed">

            <div class="form-group">
              <label class="control-label col-sm-2">Jawaban Benar</label>
              <div class="col-sm-10">
                <select name="current_answer" class="form-control">
                  <option value="A" <?= $r_quiz['current_answer'] == $r_quiz['a']? 'selected' : '' ?> >A</option>
                  <option value="B" <?= $r_quiz['current_answer'] == $r_quiz['b']? 'selected' : '' ?> >B</option>
                  <option value="C" <?= $r_quiz['current_answer'] == $r_quiz['c']? 'selected' : '' ?> >C</option>
                  <option value="D" <?= $r_quiz['current_answer'] == $r_quiz['d']? 'selected' : '' ?> >D</option>
                </select>
              </div>
            </div>

            <hr class="b-s-dashed">

            <div class="form-group">
              <label class="control-label col-sm-2">Gambar</label>
              
              <?php if($r_quiz['image'] != '0'){ ?>
              
              <div class="col-sm-4">
                <img src="<?= $r_quiz['image'] ?>" class="img-responsive thumbnail">  
              </div>
              <div class="col-sm-4">
                <input type="file" name="image" class="form-control">                
              </div>
              
              <?php } else { ?>

              <div class="col-sm-10">
                <input type="file" name="image" class="form-control">                
              </div>

              <?php } ?>
            </div>
            
            <hr class="b-s-dashed">
            
            <div class="form-group">
              <label class="control-label col-sm-2"></label>
              <div class="col-sm-10">
                <button type="submit" name="submit" class="btn btn-rect btn-success"><i class="fa fa-fw fa-save"></i> Simpan Perubahan</button>                
                <a href="?id=<?= $_GET['id'] ?>" class="btn btn-rect btn-danger">Batal</a>
              </div>
            </div>
        </form>

      </div>
    </div>
  </div>
</div>

<?php
if(isset($_POST['submit'])){

  $question = $_POST['question'];
  $a = $_POST['a'];
  $b = $_POST['b'];
  $c = $_POST['c'];
  $d = $_POST['d'];
  $current_answer_temp = $_POST['current_answer'];

  if($current_answer_temp == 'A')
    $current_answer = $a;
  else if($current_answer_temp == 'B')
    $current_answer = $b;
  else if($current_answer_temp == 'C')
    $current_answer = $c;
  else if($current_answer_temp == 'D')
    $current_answer = $d;

  $name = $_FILES['image']['name'];
  $type = $_FILES['image']['type'];
  $size = $_FILES['image']['size'];
  $temp  = $_FILES['image']['tmp_name'];

  if(!$name){
    $update = mysqli_query($conn, "UPDATE quiz SET question = '$question', a = '$a', b = '$b', c = '$c', d ='$d', current_answer = '$current_answer' WHERE id = '$_GET[id_quiz]'");

    if($update)
      go('?id='.$_GET['id'].'&log=update');
  }
  else{
    if($type == 'image/jpeg' && $size < 2000000){

      if($r_quiz['image'] != '0')
        unlink($r_quiz['image']);

      $timestamp = strtotime("now");
      $file_name = "img".$timestamp."-".$name;
      $location = "../../kukubi/image/quiz/$file_name";
      move_uploaded_file($temp, $location);

      $update = mysqli_query($conn, "UPDATE quiz SET question = '$question', image = '$location', a = '$a', b = '$b', c = '$c', d ='$d', current_answer = '$current_answer' WHERE id = '$_GET[id_quiz]'");

      if($update)
        go('?id='.$_GET['id'].'&log=update');
    }
    else{
      alert('danger','Format file tidak diizinkan atau file terlalu besar!');
    }
  }
}

?>