 <div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Kelas</h3>
  </div>
  <?php if ($_SESSION['role']==1): ?>
  <div class="box-header">
    <a href="index.php?route=tambah-kelas" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
  </div>
  <?php endif ?>
  
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" style="width:100%;" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Kelas</th>
          <th>Jumlah Siswa</th>
          <th>No Bangunan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1; 
        $sql = mysqli_query($koneksi,"SELECT * FROM kelas");
        foreach ($sql as $data) {

        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['id_kelas'] ?></td>
          <td><?= $data['jumlah_siswa'] ?></td>
          <td><?= $data['no_bangunan'] ?></td>
          <td>
            <?php if ($_SESSION['role']==1): ?>
              
            <a href="index.php?route=hapus-kelas&id_kelas=<?= $data['id_kelas'] ?>" onclick="return confirm('Yakin untuk mengahapus?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            <a href="index.php?route=edit-kelas&id=<?= $data['id_kelas'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            <?php endif ?>
            
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
