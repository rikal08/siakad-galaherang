<div class="row">
	<div class="col-lg-6">
		<div class="box">
			<div class="box-header">
				Tambah Mata Pelajaran
			</div>
			<div class="box-body">
				<form action="" method="post">
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
						<label>Mata Pelajaran</label>
						<input type="" required placeholder="Mata Pelajaran" class="form-control" name="nama_mapel">
					</div>
					<div class="form-group">
						<label>KKM</label>
						<input type="" required placeholder="KKM" class="form-control" name="kkm">
					</div>
					
					<hr>
					<div class="form-group">
						<a href="index.php?route=data-pengguna" class="btn btn-danger">Kembali</a>
						<button class="btn btn-primary" name="submit" type="submit">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 

if (isset($_POST['submit'])) {
	$a = $_POST['nama_mapel'];
	$b = $_POST['kkm'];
	$c = $_POST['id_kelas'];
	$sql = mysqli_query($koneksi,"INSERT INTO mapel VALUES (NULL,'$a','$b','$c')");

	if ($sql==true) {
		echo "<script>alert('Berhasil menyimpan data');window.location='index.php?route=data-mapel'</script>";
	}else{
		echo "<script>alert('Kelas Sudah Ada');window.location='index.php?route=data-mapel'</script>";
	}
}

?>