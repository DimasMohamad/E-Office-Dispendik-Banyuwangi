<?php
session_start();
include "../include/connect.php";
include "../include/function.php";

if(!isset($_SESSION['username'])){
  go('../index.php');
}

?>
 
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?= $title_page ?></title>

  <!-- Vendor stylesheet files. REQUIRED -->
  <!-- BEGIN: Vendor  -->
  <link rel="stylesheet" href="../assets/css/vendor.css">
  <!-- END: core stylesheet files -->

  <!-- Plugin stylesheet files. OPTIONAL -->
  <link rel="stylesheet" href="../assets/vendor/summernote/summernote.css">
  <link rel="stylesheet" href="../assets/vendor/datatables/css/dataTables.bootstrap.css">

  <!-- END: plugin stylesheet files -->

  <!-- Theme main stlesheet files. REQUIRED -->
  <link rel="stylesheet" href="../assets/css/chl.css">
  <link id="theme-list" rel="stylesheet" href="../assets/css/theme-peter-river.css">
  <!-- END: theme main stylesheet files -->

  <!-- begin pace.js  -->
  <link rel="stylesheet" href="../assets/vendor/pace/themes/blue/pace-theme-minimal.css">
  <script src="../assets/vendor/pace/pace.js"></script>
  <!-- END: pace.js  -->

</head>

<body>

  <!-- begin .app -->
  <div class="app">
    <!-- begin .app-wrap -->
    <div class="app-wrap">

<?php
include "../include/navbar.php";
include "../include/sidebar.php";
?>