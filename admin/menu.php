<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="index.php?route=home"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <?php if ($_SESSION['role']==1 OR $_SESSION['role']==2): ?>
          <li><a href="index.php?route=data-guru"><i class="fa fa-user"></i> <span>Data Guru</span></a></li>
        <li><a href="index.php?route=data-siswa"><i class="fa fa-user"></i> <span>Data Siswa</span></a></li>
        <li><a href="index.php?route=data-kelas"><i class="fa fa-table"></i> <span>Data Kelas</span></a></li>
        <li><a href="index.php?route=data-mapel"><i class="fa fa-book"></i> <span>Mata Pelajaran</span></a></li>
        <li><a href="index.php?route=data-jadwal-pelajaran"><i class="fa fa-table"></i> <span>Jadwal Pelajaran</span></a></li>
        <li><a href="index.php?route=data-jadwal-ujian"><i class="fa fa-table"></i> <span>Jadwal Ujian</span></a></li>
        <li><a href="index.php?route=absen-guru"><i class="fa fa-check"></i> <span>Absen Guru</span></a></li>
        <li><a href="index.php?route=absen-siswa"><i class="fa fa-check"></i> <span>Absen Siswa</span></a></li>
        <li><a href="index.php?route=wa"><i class="fa fa-whatsapp"></i> <span>Whatsapp</span></a></li>
        <li><a href="index.php?route=raport"><i class="fa fa-book"></i> <span>Nilai</span></a></li>
        <li><a href="index.php?route=data-pengguna"><i class="fa fa-user"></i> <span>Data Pengguna</span></a></li>
        <?php endif ?>
         <?php if ($_SESSION['role']==3): ?>
        <li><a href="index.php?route=biodata-guru"><i class="fa fa-user"></i> <span>Biodata Guru</span></a></li>
        <li><a href="index.php?route=data-kelas"><i class="fa fa-book"></i> <span>Data Kelas</span></a></li>
        <li><a href="index.php?route=data-mapel"><i class="fa fa-book"></i> <span>Mata Pelajaran</span></a></li>
        <li><a href="index.php?route=data-jadwal-pelajaran"><i class="fa fa-table"></i> <span>Jadwal Pelajaran</span></a></li>
        <li><a href="index.php?route=data-jadwal-ujian"><i class="fa fa-table"></i> <span>Jadwal Ujian</span></a></li>
        <li><a href="index.php?route=absen-guru"><i class="fa fa-check"></i> <span>Absen Guru</span></a></li>
        <li><a href="index.php?route=raport"><i class="fa fa-book"></i> <span>Nilai</span></a></li>
        
        <?php endif ?>

        <?php if ($_SESSION['role']==4): ?>
        <li><a href="index.php?route=biodata-siswa"><i class="fa fa-user"></i> <span>Biodata Siswa</span></a></li>
        <li><a href="index.php?route=data-mapel"><i class="fa fa-book"></i> <span>Mata Pelajaran</span></a></li>
        <li><a href="index.php?route=data-jadwal-pelajaran"><i class="fa fa-table"></i> <span>Jadwal Pelajaran</span></a></li>
        <li><a href="index.php?route=data-jadwal-ujian"><i class="fa fa-table"></i> <span>Jadwal Ujian</span></a></li>
        <li><a href="index.php?route=absen-siswa"><i class="fa fa-check"></i> <span>Absen Siswa</span></a></li>
        <li><a href="index.php?route=raport"><i class="fa fa-book"></i> <span>Nilai</span></a></li>
        <?php endif ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>