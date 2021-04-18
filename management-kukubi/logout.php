<?php
session_start();
include "include/function.php";
include "include/connect.php";
$set_status = mysqli_query($conn, "UPDATE user SET status = 0 WHERE username = '$_SESSION[username]'");
unset($_SESSION['username']);
go('index.php');
?>