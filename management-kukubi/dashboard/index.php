<?php
$title_page = 'dashboard';
$index_menu = 1;
include "../include/header.php";
include "query.php";
?>

<header class="main-heading shadow-2dp">
  <div class="dashhead bg-white">
    <div class="dashhead-titles">
      <h1 class="dashhead-title"><?= $title_page ?></h1>
    </div>

    <div class="dashhead-toolbar">
      <div class="dashhead-toolbar-item">
        <a href="#">Dinas Pendidikan</a>
      </div>
    </div>
  </div>
</header>

<div class="main-content bg-clouds">
  <div class="container-fluid p-t-15">
    
    <div class="row">
      <div class="col-xs-6 col-sm-3">
        <div class="box p-a-0 bg-peter-river b-r-3">
          <div class="p-a-15">
            <i class="fa fa-fw fa-graduation-cap"></i>
            <span class="text-white">SURAT</span>
            <div class="f-5 text-white">
              <span>
                <?= $row_chapter['total'] ?>
              </span>
              <span class="h4">Data</span>
            </div>
          </div>
        </div>
      </div>

      <!--<div class="col-xs-6 col-sm-3">
        <div class="box p-a-0 bg-nephritis b-r-3">
          <div class="p-a-15">
            <i class="fa fa-fw fa-puzzle-piece"></i>
            <span class="text-white">KUIS</span>
            <div class="f-5 text-white">
              <span>
                <?= $row_quiz['total'] ?>  
              </span>
              <span class="h4">Data</span>
            </div>
          </div>
        </div>
      </div>-->

      <div class="col-xs-6 col-sm-3">
        <div class="box p-a-0 bg-wisteria b-r-3">
          <div class="p-a-15">
            <i class="fa fa-fw fa-user"></i>
            <span class="text-white">USER</span>
            <div class="f-5 text-white">
              <span>
                <?= $row_user['total'] ?> 
              </span>
              <span class="h4">Data</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xs-6 col-sm-3">
        <div class="box p-a-0 bg-sun-flower b-r-3">
          <div class="p-a-15">
            <i class="fa fa-fw fa-bookmark text-white"></i>
            <span class="text-white">GLOSSARIUM</span>
            <div class="f-5 text-white">
              <span>
                <?= $row_glossarium['total'] ?>
              </span>
              <span class="h4">Data</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- BEGIN: .row -->
    <div class="row">
      <div class="col-sm-7">
        <div class="box">
          <header class="bg-turquoise text-white">
            <h4><i class="fa fa-user"></i> User Online</h4>
          </header>
          <div class="box-body p-a-0 max-h-lg ps" style="margin:10px">
            <table class="table table-striped table-hover ps" data-plugin="datatables">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>E-mail</th>
                  <th>Verify</th>
                  <th>User Role</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $no = 0;
                $u_online = mysqli_query($conn, "SELECT * FROM user WHERE status = 1");
                while($ru_online = mysqli_fetch_array($u_online)){ 
                  $no++; 
                ?>

                <tr>
                  <td><?= $no ?></td>
                  <td><?= $ru_online['username'] ?></td>
                  <td><?= $ru_online['email'] ?></td>
                  <td><?= $ru_online['verify'] == 1? 'Ya' : 'Tidak' ?></td>
                  <td>

                    <?php 
                    if($ru_online['role'] == 0)
                      echo "Super Admin";
                    else if($ru_online['role'] == 1)
                      echo "Admin";
                    else if($ru_online['role'] == 2)
                      echo "Student";
                    else if($ru_online['role'] == 3)
                      echo "Teacher";
                    ?>
                      
                  </td>
                </tr>

                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-sm-5">
        <div class="box shadow-2dp b-r-2">
          <header class="b-b bg-alizarin text-white">
            <h4><i class="fa fa-retweet"></i> Recent Activity</h4>
          </header>
          <div class="box-body">
            
          </div>
        </div>
      </div>

    </div>
    <!-- END: .row -->

  </div>
</div>

<?php
include "../include/footer.php";
?>