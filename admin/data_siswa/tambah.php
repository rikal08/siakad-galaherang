<div class="row">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header">
				Registrasi Siswa
			</div>
			<div class="box-body">
				<form action="" method="post">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nama Siswa</label>
								<input type="" required placeholder="Nama Siswa" class="form-control" name="nama_siswa">
							</div>
							<div class="form-group">
								<label>NIS Siswa</label>
								<input type="" required placeholder="NIS Siswa" value="0" class="form-control" name="nis_siswa">
							</div>
							<div class="form-group">
								<label>Tempat Lahir</label>
								<input type="" required placeholder="Tempat Lahir"  class="form-control" name="tempat_lahir">
							</div>
							<div class="form-group">
								<label>Tanggal Lahir</label>
								<input type="date" required placeholder="Tanggal Lahir" class="form-control" name="tgl_lahir">
							</div>
							<div class="form-group">
								<label>Agama</label>
								<select class="form-control" name="agama">
									<option value="0">Pilih</option>
									<option value="Islam">Islam</option>
									<option value="Kristen">Kristen</option>
									<option value="Hindu">Hindu</option>
									<option value="Budha">Budha</option>
								</select>
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select class="form-control" name="jk">
									<option value="0">Pilih</option>
									<option value="Laki-Laki">Laki-laki</option>
									<option value="Wanita">Wanita</option>
								</select>
							</div>

							<div class="form-group">
								<label>Kelas</label>
								<select class="form-control" name="id_kelas">
									<?php 
									$sql = mysqli_query($koneksi,"SELECT * FROM kelas");
									foreach ($sql as $data_k) {
										
									
									?>
									<option value="<?= $data_k['id_kelas'] ?>"><?= $data_k['id_kelas'] ?></option>
									<?php } ?>
								</select>
							</div>
							

							
						</div>
						<div class="col-lg-6">
							
							<div class="form-group">
								<label>Telepon</label>
								<input type="" required placeholder="Telepon" class="form-control" name="telepon">
							</div>
							<div class="form-group">
								<label>Nama Orangtua</label>
								<input type="" required placeholder="Nama Orangtua" class="form-control" name="nama_ortu">
							</div>
							<div class="form-group">
								<label>Whatsapp Orangtua (Contoh: 628xxxxxx)</label>
								<input type="" required placeholder="Whatsapp" class="form-control" value="62" name="wa_ortu">
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<input type="" required placeholder="Alamat" class="form-control" name="alamat">
							</div>
							
							<div class="form-group">
								<label>Username</label>
								<input type="" required placeholder="Username" class="form-control" name="username">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="" required placeholder="Password" class="form-control" name="password">
							</div>

						</div>

					</div>
					<hr>
					<div class="form-group text-right">
						<a href="index.php?route=data-guru" class="btn btn-danger">Kembali</a>
						<button class="btn btn-primary" name="submit" type="submit">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 

if (isset($_POST['submit'])) {
	// user
	$id_user = rand(1000,9000);
	$nm_user = $_POST['nama_siswa'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	// guru
	$a = $_POST['nis_siswa'];
	$b = $_POST['tempat_lahir'];
	$c = $_POST['tgl_lahir'];
	$d = $_POST['agama'];
	$e = $_POST['jk'];
	$f = $_POST['alamat'];
	$g = $_POST['telepon'];
	$h = $_POST['id_kelas'];
	$i = $_POST['nama_ortu'];
	$j = $_POST['wa_ortu'];

	

	$sql2 = mysqli_query($koneksi,"INSERT INTO siswa VALUES (NULL,'$a','$nm_user','$b','$c','$d','$e','$f','$g','$h','$i','$j','$id_user')");

	if ($sql2==true) {
		echo "<script>alert('Berhasil menyimpan data');window.location='index.php?route=data-siswa'</script>";
		$sql = mysqli_query($koneksi,"INSERT INTO user VALUES ('$id_user','$nm_user','$username','$password',4)");
	}else{
		echo "<script>alert('Gagal menyimpan data');window.location='index.php?route=data-siswa'</script>";
	}
}

?>