<div class="row">
	<div class="col-lg-6">
		<div class="box">
			<div class="box-header">
				Tambah Data Pengguna
			</div>
			<div class="box-body">
				<form action="" method="post">
					<div class="form-group">
						<label>Nama Pengguna</label>
						<input type="" required placeholder="Nama Pengguna" class="form-control" name="nm_user">
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="" required placeholder="Username" class="form-control" name="username">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="" required placeholder="Password" class="form-control" name="password">
					</div>
					<div class="form-group">
						<label>Role Pengguna</label>
						<select name="role" class="form-control">
							<option value="0">-Pilih Hak Akses-</option>
							<option value="1">Admin</option>
							<option value="2">Kepala Sekolah</option>
							<option value="3">Guru</option>
							<option value="4">Siswa</option>
						</select>
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
	$nm_user = $_POST['nm_user'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];
	$sql = mysqli_query($koneksi,"INSERT INTO user VALUES (NULL,'$nm_user','$username','$password','$role')");

	if ($sql==true) {
		echo "<script>alert('Berhasil menyimpan data');window.location='index.php?route=data-pengguna'</script>";
	}
}

 ?>