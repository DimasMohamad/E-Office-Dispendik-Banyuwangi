<?php

//CEK USER LOGIN
if(!isset($_SESSION['user'])){
  if($title_page == 'Login' || $title_page == 'Registrasi')
    echo "";
  else 
    go('login.php');
} else {
  if($title_page == 'Login' || $title_page == 'Registrasi'){
    back();
  }

  //CEK VERIFIKASI KUIS
  if($confirm_page == 1 || $title_page == 'Hasil Evaluasi'){
    $a = mysqli_query($conn, "SELECT count(id) AS total, status, username, chapter_id FROM quiz_verify WHERE username = '$_SESSION[user]' AND chapter_id = '$_GET[chapter_id]'");
    $b = mysqli_fetch_array($a);

    //REDIRECT KE HALAMAN KUIS
    if($b['total'] != 0){
      if($b['status'] == 1){
        if($confirm_page == 0 || $title_page == 'Evaluasi'){
          back();
        }
      } else if($b['status'] == 2 && $confirm_page == '1'){
        if(isset($_GET['status']))
          echo "";
        else  
          go("quiz.php?status=2&chapter_id=$_GET[chapter_id]&done=1");
      }
    } else if($b['total'] == 0 && $title_page == 'Hasil Evaluasi') {
      go("index.php");
    }
  }
}