<!-- begin .app-container -->
<div class="app-container">
  <!-- begin .app-side -->
  <aside class="app-side">
    <!-- begin .side-content -->
    <div class="side-content">
      <!-- begin user-panel -->
      <div class="user-panel">
        <div class="user-image">
          <a href="#">
            <img class="img-circle" src="../assets/img/user.png">
          </a>
        </div>
        <div class="user-info">
          <h5><?= ucwords($_SESSION['username']) ?></h5>
          <ul class="nav">
            <li class="dropdown">
              <a href="#" class="text-turquoise small dropdown-toggle bg-transparent" data-toggle="dropdown">
                <i class="fa fa-fw fa-circle">
                </i> Online
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- END: user-panel -->
      <!-- begin .side-nav -->
      <nav class="side-nav">
        <!-- BEGIN: nav-content -->
        <ul class="metismenu nav nav-inverse nav-bordered nav-stacked" data-plugin="metismenu">

          <li>
            <a href="../dashboard/" class="<?= $index_menu == 1? 'active' : '' ?>">
              <span class="nav-icon">
                <i class="fa fa-fw fa-home"></i>
              </span>
              <span class="nav-title">Dashboard</span>
            </a>
          </li>

          <li>
            <a href="../chapter/" class="<?= $index_menu == 2? 'active' : '' ?>">
              <span class="nav-icon">
                <i class="fa fa-fw fa-book"></i>
              </span>
              <span class="nav-title">Surat Masuk</span>
            </a>
          </li>

          <li>
            <a href="../glossarium/" class="<?= $index_menu == 3? 'active' : '' ?>">
              <span class="nav-icon">
                <i class="fa fa-fw fa-bookmark"></i>
              </span>
              <span class="nav-title">Asal Surat</span>
            </a>
          </li>

          <!-- BEGIN: Management User -->

          <li class="<?= $index_menu == 4 || $index_menu == 5? 'active' : '' ?>">
            <a href="javascript:;" aria-expanded="<?= $index_menu == 4 || $index_menu == 5? 'true' : 'false' ?>">
              <span class="nav-icon">
                <i class="fa fa-fw fa-user"></i>
              </span>
              <span class="nav-title">Management User</span>
              <span class="nav-tools">
                <i class="fa fa-fw arrow"></i>
              </span>
            </a>
            <ul class="nav nav-sub nav-stacked">
              <li><a href="../student/" class="<?= $index_menu == 4? 'active' : '' ?>">Siswa</a></li>
              <li><a href="../admin/" class="<?= $index_menu == 5? 'active' : '' ?>">Administrator</a></li>
            </ul>
          </li>

          <!-- END: Management User -->

        </ul>
      </nav>
    </div>
  </aside>

  <!-- begin side-collapse-visible bar -->
  <div class="side-visible-line hidden-xs" data-side="collapse">
    <i class="fa fa-caret-left"></i>
  </div>
  <!-- begin side-collapse-visible bar -->

  <!-- begin .app-main -->
  <div class="app-main">