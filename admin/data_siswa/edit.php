<?php 
if ($_SESSION['role']==4) {
	$sql = mysqli_query($koneksi,"SELECT * FROM siswa JOIN user ON siswa.id_user=user.id_user WHERE siswa.id_user='$_SESSION[id_user]'");
}else{


$id = $_GET['id'];
$sql = mysqli_query($koneksi,"SELECT * FROM siswa JOIN user ON siswa.id_user=user.id_user WHERE id_siswa='$id'");
}
$data = mysqli_fetch_array($sql);

 ?>
<div class="row">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header">
				Edit Data Siswa
			</div>
			<div class="box-body">
				<form action="" method="post">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nama Siswa</label>
								<input type="" value="<?= $data['nama_siswa'] ?>" required placeholder="Nama Siswa" class="form-control" name="nama_siswa">
							</div>
							<div class="form-group">
								<label>NIS Siswa</label>
								<input type="" required value="<?= $data['nis_siswa'] ?>" placeholder="NIS Siswa"  class="form-control" name="nis_siswa">
							</div>
							<div class="form-group">
								<label>Tempat Lahir</label>
								<input type="" required value="<?= $data['tempat_lahir_siswa'] ?>" placeholder="Tempat Lahir"  class="form-control" name="tempat_lahir">
							</div>
							<div class="form-group">
								<label>Tanggal Lahir</label>
								<input type="date" value="<?= $data['tgl_lahir_siswa'] ?>" required placeholder="Tanggal Lahir" class="form-control" name="tgl_lahir">
							</div>
							<div class="form-group">
								<label>Agama</label>
								<select class="form-control" name="agama">
									<option value="<?= $data['agama_siswa'] ?>"><?= $data['agama_siswa'] ?></option>
									<option value="Islam">Islam</option>
									<option value="Kristen">Kristen</option>
									<option value="Hindu">Hindu</option>
									<option value="Budha">Budha</option>
								</select>
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select class="form-control" name="jk">
									<option value="<?= $data['jenis_kelamin_siswa'] ?>"><?= $data['jenis_kelamin_siswa'] ?></option>
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
								<input type="" value="<?= $data['telepon_siswa'] ?>" required placeholder="Telepon" class="form-control" name="telepon">
							</div>
							<div class="form-group">
								<label>Nama Orangtua</label>
								<input type="" value="<?= $data['nama_ortu'] ?>" required placeholder="Nama Orangtua" class="form-control" name="nama_ortu">
							</div>
							<div class="form-group">
								<label>Whatsapp Orangtua (Contoh: +628xxxxxx)</label>
								<input type="" value="<?= $data['wa_ortu'] ?>" required placeholder="Whatsapp" class="form-control" value="+62" name="wa_ortu">
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<input type="" value="<?= $data['alamat_siswa'] ?>" required placeholder="Alamat" class="form-control" name="alamat">
							</div>
							
							<div class="form-group">
								<label>Username</label>
								<input type="" value="<?= $data['username'] ?>" required placeholder="Username" class="form-control" name="username">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="" value="<?= $data['password'] ?>" required placeholder="Password" class="form-control" name="password">
							</div>

						</div>

					</div>
					<hr>
					<?php if ($_SESSION['role']==1): ?>
						
					<div class="form-group text-right">
						<a href="index.php?route=data-siswa" class="btn btn-danger">Kembali</a>
						<button class="btn btn-primary" name="submit" type="submit">Update</button>
					</div>
					<?php endif ?>
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

	

	$sql2 = mysqli_query($koneksi,"UPDATE siswa SET 
		nis_siswa='$a',
		nama_siswa='$nm_user',
		tempat_lahir_siswa='$b',
		tgl_lahir_siswa='$c',
		agama_siswa='$d',
		jenis_kelamin_siswa='$e',
		alamat_siswa='$f',
		telepon_siswa='$g',
		id_kelas='$id_kelas',
		id_kelas='$h',
		nama_ortu='$i',
		wa_ortu='$j'
		WHERE id_siswa='$_GET[id]'
		");

	if ($sql2==true) {
		echo "<script>alert('Berhasil menyimpan data');window.location='index.php?route=data-siswa'</script>";
		$sql = mysqli_query($koneksi,"UPDATE user SET nm_user='$nm_user',username='$username',password='$password' WHERE id_user='$data[id_user]'");

	}else{
		echo "<script>alert('Gagal menyimpan data');window.location='index.php?route=data-siswa'</script>";
	}
}

?>