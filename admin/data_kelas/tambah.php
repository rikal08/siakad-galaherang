<div class="row">
	<div class="col-lg-6">
		<div class="box">
			<div class="box-header">
				Tambah Data Kelas
			</div>
			<div class="box-body">
				<form action="" method="post">
					<div class="form-group">
						<label>Kelas</label>
						<input type="" required placeholder="ID Kelas" class="form-control" name="id_kelas">
					</div>
					<div class="form-group">
						<label>Jumlah Siswa</label>
						<input type="" required placeholder="Jumlah Siswa" class="form-control" name="jumlah_siswa">
					</div>
					<div class="form-group">
						<label>No Bangunan</label>
						<input type="" required placeholder="No Bangunan" class="form-control" name="no_bangunan">
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
	$a = $_POST['id_kelas'];
	$b = $_POST['jumlah_siswa'];
	$c = $_POST['no_bangunan'];
	$sql = mysqli_query($koneksi,"INSERT INTO kelas VALUES ('$a','$b','$c')");

	if ($sql==true) {
		echo "<script>alert('Berhasil menyimpan data');window.location='index.php?route=data-kelas'</script>";
	}else{
		echo "<script>alert('Kelas Sudah Ada');window.location='index.php?route=data-kelas'</script>";
	}
}

 ?>