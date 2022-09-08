 <title>ABSENSI GURU SDN 2 GALAHERANG</title>
 <title>Absensi Guru</title>
 <div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Absensi Guru</h3>
  </div>
    <div class="box-header">
    <a href="index.php?route=tambah-absen-guru" class="btn btn-primary"><i class="fa fa-plus"></i> Ambil Absen</a>
  </div>
  <?php if ($_SESSION['role']==1): ?>
  
  <div class="box-header">
    <form action="" method="POST">
      <div class="form-group">
        <label>Cari Nama Guru</label>
        <input type="" class="form-control" name="cari" placeholder="Ketikan nama guru">
      </div>
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-danger">Cari Data</button>
      </div>
    </form>
  </div>
  <?php endif ?>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example2" style="width:100%;" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Guru</th>
          <th>Hari/Tanggal</th>
          <th>Jam</th>
          <th>Ket</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1; 
        if ($_SESSION['role']==3) {
          $sql = mysqli_query($koneksi,"SELECT * FROM absen_guru JOIN guru ON absen_guru.id_guru=guru.id_guru WHERE guru.id_user='$_SESSION[id_user]' ORDER BY tgl DESC");
        }else{



        if (isset($_POST['submit'])) {
          $sql = mysqli_query($koneksi,"SELECT * FROM absen_guru JOIN guru ON absen_guru.id_guru=guru.id_guru WHERE guru.nama_guru like '%".$_POST['cari']."%' ");
        }else{
          $sql = mysqli_query($koneksi,"SELECT * FROM absen_guru JOIN guru ON absen_guru.id_guru=guru.id_guru ORDER BY tgl DESC");
        }
      }
        foreach ($sql as $data) {

        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['nama_guru'] ?></td>
          <td><?= date('l,  d-m-Y',strtotime($data['tgl'])) ?></td>
          <td><?= $data['jam'] ?></td>
          <td><?= $data['ket'] ?></td>
          <td>
            <?php if ($_SESSION['role']==1): ?>
              
            <a href="index.php?route=hapus-absen-guru&id_absen=<?= $data['id_absen_guru'] ?>" onclick="return confirm('Yakin untuk mengahapus?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            <?php endif ?>
            
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
