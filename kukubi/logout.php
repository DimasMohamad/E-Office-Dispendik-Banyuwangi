<?php
session_start();
include "include/function.php";

//HAPUS DATA LOGIN
unset($_SESSION['user']);
unset($_SESSION['role']);
unset($_SESSION['level']);
unset($_SESSION['email']);

go('login.php');
?>