  <?php if ($_SESSION['role'] != 4): ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Nilai Siswa</h3>
  </div>
    
  <div class="box-header">
    <a href="index.php?route=tambah-nilai" class="btn btn-primary"><i class="fa fa-plus"></i> Input Nilai</a>
  </div>

  <div class="box-header">
    <form action="" method="POST">
      <div class="form-group">
        <label>Pilih Siswa</label>
        <select class="form-control" name="id_siswa">
          <?php 
          $sql = mysqli_query($koneksi,"SELECT * FROM siswa");
          foreach ($sql as $data_k) {


            ?>
            <option value="<?= $data_k['id_siswa'] ?>"><?= $data_k['nama_siswa'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-danger">Cari Nilai</button>
      </div>
    </form>
  </div>
</div>
  <?php endif ?>

<div class="box">
  <div class="box-header">
    <h2 class="text-center">DATA NILAI SISWA</h2>
    <?php 
      if (isset($_POST['submit'])) {
        $id = $_POST['id_siswa'];
        $sql = mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_siswa='$id'");
        $data = mysqli_fetch_array($sql);

        echo "<p>Nama Siswa: ".$data['nama_siswa']." </p>
              <p>NIS Siswa: ".$data['nis_siswa']."</p>
              <p>Kelas: ".$data['id_kelas']."</p>";
      }
     ?>
    
  </div>
  <div class="box-body">
    <table style="width:100%;" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Pelajaran</th>
          <th>KKM</th>
          <th>Nilai</th>
          <th>Predikat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1; 
        if ($_SESSION['role']==4) {
          $sql2 = mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_user='$_SESSION[id_user]'");
          $data2= mysqli_fetch_array($sql2);
           $sql = mysqli_query($koneksi,"SELECT * FROM nilai JOIN mapel ON nilai.id_mapel=mapel.id_mapel WHERE id_siswa='$data2[id_siswa]'");
        }else{


        if (isset($_POST['submit'])) {
           $sql = mysqli_query($koneksi,"SELECT * FROM nilai JOIN mapel ON nilai.id_mapel=mapel.id_mapel WHERE nilai.id_siswa='$_POST[id_siswa]'");
        }else{
             $sql = mysqli_query($koneksi,"SELECT * FROM nilai JOIN mapel ON nilai.id_mapel=mapel.id_mapel WHERE id_siswa=0");
        }
        }
        foreach ($sql as $data) {

        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['nama_mapel'] ?></td>
          <td><?= $data['kkm'] ?></td>
          <td><?= $data['nilai'] ?></td>
          <td><?= $data['predikat'] ?></td>
          <td>
            <?php if ($_SESSION['role']==1): ?>
              
            <a href="index.php?route=hapus-nilai&id_nilai=<?= $data['id_nilai'] ?>" onclick="return confirm('Yakin untuk mengahapus?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            <?php endif ?>
           
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
