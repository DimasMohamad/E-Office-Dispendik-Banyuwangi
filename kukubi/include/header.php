<?php
session_start();

include "include/connect.php";
include "include/function.php";
include "include/redirect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title><?= $title_page ?></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
<body>

  <nav class="light-blue" role="navigation">
    <div class="nav-wrapper container">

      <a id="logo-container" href="#" class="brand-logo"><?= $title_page ?></a>

      <ul id="nav-mobile" class="sidenav">

        <?php 
        if(isset($_SESSION['user'])){ 
          $get_name = mysqli_query($conn, "SELECT * FROM biodata_user WHERE username = '$_SESSION[user]'");
          $name = mysqli_fetch_array($get_name);
        ?>

        <!-- MENU SAAT LOGIN -->

        <li>
          <div class="user-view">
            <div class="background">
              <img src="image/background-user-view.jpg">
            </div>
            <a href="#"><img class="circle" src="image/user.png"></a>
            <a href="#"><span class="white-text name"><?= $name['first_name'].' '.$name['last_name'] ?></span></a>
            <a href="#"><span class="white-text email"><?= $_SESSION['email'] ?></span></a>
          </div>
        </li>

        <li><a href="index.php"><i class="icons-nav material-icons left">home</i>Beranda</a></li>
        <li><a href="profil.php"><i class="icons-nav material-icons left">account_circle</i>Profil</a></li>
        <li><a href="logout.php"><i class="icons-nav material-icons left">power_settings_new</i>Keluar</a></li>

        <?php } else { ?>

        <!-- MENU SEBELUM LOGIN -->

        <li>
          <div class="user-view">
            <div class="background">
              <img src="image/background-user-view.jpg">
            </div>
            <a href="#"><img class="circle" src="image/user.png"></a>
            <a href="#"><span class="white-text name">Guest</span></a>
            <a href="#"><span class="white-text email">Login untuk dapat mengakses fitur</span></a>
          </div>
        </li>

        <li><a href="login.php"><i class="icons-nav material-icons left">input</i>Login</a></li>
        <li><a href="register.php"><i class="icons-nav material-icons left">person_add</i>Registrasi</a></li>

        <?php } ?>

      </ul>

      <!-- TOMBOL MENU BAR -->

      <?php if($title_page == 'Kukubi' || $title_page == 'Login' || $title_page == 'Registrasi' || $title_page == 'Profil'){ ?>
      
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      
      <!-- TOMBOL BACK -->
      
      <?php } else { if(!isset($_GET['quiz_no']) && !isset($_GET['level']) && !isset($_GET['status'])){ ?>
      
      <a onclick="window.history.back()" class="sidenav-trigger"><i class="material-icons">arrow_back</i></a>

      <?php } if(!isset($_GET['quiz_no']) && !isset($_GET['level']) && isset($_GET['done'])){ ?>
      
      <a onclick="window.history.back()" class="sidenav-trigger"><i class="material-icons">arrow_back</i></a>
      
      <?php } } ?>
    
    </div>
  </nav>