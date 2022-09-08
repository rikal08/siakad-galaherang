 <title>DATA GURU SDN 2 GALAHERANG</title>
 <div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Guru</h3>
  </div>
  <div class="box-header">
    <a href="index.php?route=tambah-guru" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" style="width:100%;" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Guru</th>
          <th>NIP Guru</th>
          <th>Jenis Kelamin</th>
          <th>Pangkat</th>
          <th>Golongan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1; 
        $sql = mysqli_query($koneksi,"SELECT * FROM guru");
        foreach ($sql as $data) {

        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['nama_guru'] ?></td>
          <td><?= $data['nip_guru'] ?></td>
          <td><?= $data['jenis_kelamin_guru'] ?></td>
          <td><?= $data['pangkat'] ?></td>
          <td><?= $data['gol'] ?></td>
          <td>
            <a href="index.php?route=hapus-guru&id_guru=<?= $data['id_guru'] ?>&id_user=<?= $data['id_user'] ?>" onclick="return confirm('Yakin untuk mengahapus?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            <a href="index.php?route=edit-guru&id=<?= $data['id_guru'] ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
