  <title>ABSENSI SISWA SDN 2 GALAHERANG</title>
 <div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Absensi Siswa</h3>
  </div>
  <div class="box-header">
    <a href="index.php?route=tambah-absen-siswa" class="btn btn-primary"><i class="fa fa-plus"></i> Ambil Absen</a>
  </div>
  
  <?php if ($_SESSION['role']==1): ?>
    
  <div class="box-header">
   <form action="" method="POST">
      <div class="form-group">
      <label>Pilih Kelas</label>
      <select class="form-control" name="id_kelas">
        <?php 
        $sql = mysqli_query($koneksi,"SELECT * FROM kelas");
        foreach ($sql as $data_k) {


          ?>
          <option value="<?= $data_k['id_kelas'] ?>"><?= $data_k['id_kelas'] ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label>Tanggal</label>
      <input type="date" name="tgl" class="form-control">
    </div>
    <div class="form-group">
      <button type="submit" name="submit" class="btn btn-danger">Cari</button>
    </div>
   </form>
  </div>
  <!-- /.box-header -->
  <?php endif ?>
  <div class="box-body">
    <table id="example2" style="width:100%;" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Kelas</th>
          <th>Nama Siswa</th>
          <th>Mata Pelajaran</th>
          <th>Nama Guru</th>
          <th>Tanggal</th>
          <th>Jam</th>
          <th>Ket</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1; 
        if ($_SESSION['role']==4) {
           $sql = mysqli_query($koneksi,"SELECT * FROM absen_siswa JOIN siswa JOIN mapel JOIN guru ON absen_siswa.id_siswa=siswa.id_siswa AND absen_siswa.id_mapel=mapel.id_mapel AND absen_siswa.id_guru=guru.id_guru WHERE siswa.id_user='$_SESSION[id_user]' ORDER BY tgl DESC");
        }else{
          if (isset($_POST['submit'])) {
          $sql = mysqli_query($koneksi,"SELECT * FROM absen_siswa JOIN siswa JOIN mapel JOIN guru ON absen_siswa.id_siswa=siswa.id_siswa AND absen_siswa.id_mapel=mapel.id_mapel AND absen_siswa.id_guru=guru.id_guru WHERE siswa.id_kelas='$_POST[id_kelas]' AND absen_siswa.tgl='$_POST[tgl]'  ORDER BY tgl DESC");
        }else{
           $sql = mysqli_query($koneksi,"SELECT * FROM absen_siswa JOIN siswa JOIN mapel JOIN guru ON absen_siswa.id_siswa=siswa.id_siswa AND absen_siswa.id_mapel=mapel.id_mapel AND absen_siswa.id_guru=guru.id_guru ORDER BY tgl DESC");
        }
        }

        
        foreach ($sql as $data) {

        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['id_kelas'] ?></td>
          <td><?= $data['nama_siswa'] ?></td>
          <td><?= $data['nama_mapel'] ?></td>
          <td><?= $data['nama_guru'] ?></td>
          <td><?= date('l,  d-m-Y',strtotime($data['tgl'])) ?></td>
          <td><?= $data['jam'] ?></td>
          <td><?= $data['ket'] ?></td>
          <td>
            <?php if ($_SESSION['role']==1): ?>
              
            <a href="index.php?route=hapus-absen-siswa&id_absen=<?= $data['id_absen_siswa'] ?>" onclick="return confirm('Yakin untuk mengahapus?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            <?php endif ?>
            
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
