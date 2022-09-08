 <title>JADWAL PELAJARAN SDN 2 GALAHERANG</title>
 <div class="box">
  <div class="box-header">
    <h3 class="box-title">Jadwal Pelajaran</h3>
  </div>
  <?php if ($_SESSION['role']==1): ?>
    <div class="box-header">
    <a href="index.php?route=tambah-jadwal-pelajaran" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
  </div>
  <?php endif ?>
  
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
      <button type="submit" name="submit" class="btn btn-danger">Cari</button>
    </div>
   </form>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" style="width:100%;" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Kelas</th>
          <th>Hari</th>
          <th>Mata Pelajaran</th>
          <th>Jam</th>
          <th>Guru</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1; 
        if (isset($_POST['submit'])) {
          $id_kelas = $_POST['id_kelas'];

           $sql = mysqli_query($koneksi,"SELECT jadwal_pelajaran.id_jadwal,jadwal_pelajaran.id_kelas,jadwal_pelajaran.hari,jadwal_pelajaran.jam_masuk,jadwal_pelajaran.jam_pulang,guru.nama_guru,mapel.nama_mapel  FROM jadwal_pelajaran JOIN guru JOIN mapel ON jadwal_pelajaran.id_guru=guru.id_guru AND jadwal_pelajaran.id_mapel=mapel.id_mapel WHERE jadwal_pelajaran.id_kelas='$id_kelas' order by id_kelas");
        }else{
           $sql = mysqli_query($koneksi,"SELECT jadwal_pelajaran.id_jadwal,jadwal_pelajaran.id_kelas,jadwal_pelajaran.hari,jadwal_pelajaran.jam_masuk,jadwal_pelajaran.jam_pulang,guru.nama_guru,mapel.nama_mapel  FROM jadwal_pelajaran JOIN guru JOIN mapel ON jadwal_pelajaran.id_guru=guru.id_guru AND jadwal_pelajaran.id_mapel=mapel.id_mapel order by id_kelas");
        }
        foreach ($sql as $data) {

        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['id_kelas'] ?></td>
          <td><?= $data['hari'] ?></td>
          <td><?= $data['nama_mapel'] ?></td>
          <td><?= $data['jam_masuk'] ?> - <?= $data['jam_pulang'] ?></td>
          <td><?= $data['nama_guru'] ?></td>
          <td>
            <?php if ($_SESSION['role']==1): ?>
              
            <a href="index.php?route=hapus-jadwal-pelajaran&id_jadwal=<?= $data['id_jadwal'] ?>" onclick="return confirm('Yakin untuk mengahapus?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            <a href="index.php?route=edit-jadwal-pelajaran&id=<?= $data['id_jadwal'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            <?php endif ?>
            
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
