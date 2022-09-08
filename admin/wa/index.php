<title>DATA SISWA SDN 2 GALAHERANG</title>
 <div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Siswa</h3>
  </div>
  <div class="box-header">
    <a href="index.php?route=tambah-siswa" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
  </div>
  <div class="box-header">
    <form action="" method="POST">
      <div class="form-group">
        <label>Cari Nama Siswa</label>
        <input type="" class="form-control" name="cari" placeholder="Ketikan nama siswa">
      </div>
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-danger">Cari Data</button>
      </div>
    </form>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table style="width:100%;" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Siswa</th>
          <th>Nama Orangtua</th>
          <th>Nomor WA</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1; 
        if (isset($_POST['submit'])) {
          $sql = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nama_siswa like '%".$_POST['cari']."%'");
        }else{
          $sql = mysqli_query($koneksi,"SELECT * FROM siswa");
        }
        foreach ($sql as $data) {

        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['nama_siswa'] ?></td>
          <td><?= $data['nama_ortu'] ?></td>
          <td><?= $data['wa_ortu'] ?></td>
          <td>
            <a href="https://api.whatsapp.com/send?phone=<?= $data['wa_ortu'] ?>" class="btn btn-success"><i class="fa fa-whatsapp"></i> Kirim Pesan</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
