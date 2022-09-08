<?php include 'header.php' ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>KD</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="font-size:14px;"><b>SIAKAD SDN 2 GALAHERANG</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION['nm_user'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/avatar.png" class="img-circle" alt="User Image">

                <p>
                  <?= $_SESSION['nm_user'] ?>
                  <small>
                    (
                    <?php 
                      if ($_SESSION['role']==1) {
                        echo 'Administator';
                      }elseif($_SESSION['role']==2){
                        echo "Kepala Sekolah";
                      }elseif($_SESSION['role']==3){
                        echo "Guru";
                      }elseif($_SESSION['role']==4){
                        echo "Siswa";
                      }
                     ?>
                     )
                  </small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
               
                <div class="pull-right">
                  <a href="../auth/keluar.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->
  <?php include 'menu.php' ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>it all starts here</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

    <?php include '../config/page_admin.php'; ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->
<?php include 'footer.php' ?>

