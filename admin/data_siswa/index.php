
 <div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Siswa</h3>
  </div>
  <div class="box-header">
    <a href="index.php?route=tambah-siswa" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" style="width:100%;" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Siswa</th>
          <th>NIS Siswa</th>
          <th>Kelas</th>
          <th>Telepon</th>
          <th>Tempat/Tanggal Lahir</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1; 
        $sql = mysqli_query($koneksi,"SELECT * FROM siswa");
        foreach ($sql as $data) {

        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['nama_siswa'] ?></td>
          <td><?= $data['nis_siswa'] ?></td>
          <td><?= $data['id_kelas'] ?></td>
          <td><?= $data['telepon_siswa'] ?></td>
          <td><?= $data['tempat_lahir_siswa'] ?>/ <?= $data['tgl_lahir_siswa'] ?></td>
          <td>
            <a href="index.php?route=hapus-siswa&id_siswa=<?= $data['id_siswa'] ?>&id_user=<?= $data['id_user'] ?>" onclick="return confirm('Yakin untuk mengahapus?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            <a href="index.php?route=edit-siswa&id=<?= $data['id_siswa'] ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
