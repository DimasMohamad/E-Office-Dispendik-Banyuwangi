<?php

$get_chapter = mysqli_query($conn, "SELECT count(*) AS total FROM data_surat");
$row_chapter = mysqli_fetch_array($get_chapter);

$get_quiz = mysqli_query($conn, "SELECT count(*) AS total FROM quiz");
$row_quiz = mysqli_fetch_array($get_quiz);

$get_user = mysqli_query($conn, "SELECT count(*) AS total FROM user");
$row_user = mysqli_fetch_array($get_user);

$get_glossarium = mysqli_query($conn, "SELECT count(*) AS total FROM glossarium");
$row_glossarium = mysqli_fetch_array($get_glossarium);

?>