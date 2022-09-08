 <div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Pengguna</h3>
  </div>
  <div class="box-header">
    <a href="index.php?route=tambah-pengguna" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" style="width:100%;" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Pengguna</th>
          <th>Username</th>
          <th>Password</th>
          <th>Role</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1; 
        $sql = mysqli_query($koneksi,"SELECT * FROM user");
        foreach ($sql as $data) {

        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['nm_user'] ?></td>
          <td><?= $data['username'] ?></td>
          <td><?= $data['password'] ?></td>
          <td>
              <?php 
                if ($data['role']==1) {
                  echo '<span class="label label-success">Admin</span>';
                }elseif($data['role']==2){
                  echo '<span class="label label-info">Kepala Sekolah</span>';
                }elseif($data['role']==3){
                  echo '<span class="label label-danger">Guru</span>';
                }else{
                  echo '<span class="label label-warning">Siswa</span>';
                }
               ?>
          </td>
          <td>
            <a href="index.php?route=hapus-pengguna&id=<?= $data['id_user'] ?>" onclick="return confirm('Yakin untuk mengahapus?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            <a href="index.php?route=edit-pengguna&id=<?= $data['id_user'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
