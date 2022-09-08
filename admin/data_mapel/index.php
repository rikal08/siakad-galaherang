 <div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Mata Pelajaran</h3>
  </div>
  <?php if ($_SESSION['role']==1): ?>
    
  <div class="box-header">
    <a href="index.php?route=tambah-mapel" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
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
          <th>Mata Pelajaran</th>
          <th>KKM</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1; 
        if (isset($_POST['submit'])) {
          $id_kelas = $_POST['id_kelas'];
          $sql = mysqli_query($koneksi,"SELECT * FROM mapel WHERE id_kelas='$id_kelas'");
        }else{
          $sql = mysqli_query($koneksi,"SELECT * FROM mapel WHERE id_kelas=0");
        }
        
        foreach ($sql as $data) {

          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['nama_mapel'] ?></td>
            <td><?= $data['kkm'] ?></td>
            <td>
              <?php if ($_SESSION['role']==1): ?>
                
              <a href="index.php?route=hapus-mapel&id_mapel=<?= $data['id_mapel'] ?>" onclick="return confirm('Yakin untuk mengahapus?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
              <a href="index.php?route=edit-mapel&id=<?= $data['id_mapel'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
              <?php endif ?>

            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
