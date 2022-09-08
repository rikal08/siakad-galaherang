<?php 


if ($_SESSION['role']==3) {
	$sql = mysqli_query($koneksi,"SELECT * FROM guru JOIN user ON guru.id_user=user.id_user WHERE guru.id_user='$_SESSION[id_user]'");
}else{
	$id = $_GET['id'];
	$sql = mysqli_query($koneksi,"SELECT * FROM guru JOIN user ON guru.id_user=user.id_user WHERE id_guru='$id'");
}

$data = mysqli_fetch_array($sql);

 ?>
<div class="row">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header">
				Edit Guru
			</div>
			<div class="box-body">
				<form action="" method="post">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nama Guru</label>
								<input type="" value="<?= $data['nama_guru'] ?>" required placeholder="Nama Guru" class="form-control" name="nama_guru">
							</div>
							<div class="form-group">
								<label>NIP Guru</label>
								<input type="" required placeholder="NIP Guru" value="<?= $data['nip_guru'] ?>" class="form-control" name="nip_guru">
							</div>
							<div class="form-group">
								<label>Tempat Lahir</label>
								<input type="" required placeholder="Tempat Lahir" value="<?= $data['tempat_lahir_guru'] ?>" class="form-control" name="tempat_lahir">
							</div>
							<div class="form-group">
								<label>Tanggal Lahir</label>
								<input type="date" value="<?= $data['tgl_lahir_guru'] ?>" required placeholder="Tanggal Lahir" class="form-control" name="tgl_lahir">
							</div>
							<div class="form-group">
								<label>Agama</label>
								<select class="form-control" name="agama">
									<option value="<?= $data['agama_guru'] ?>"><?= $data['agama_guru'] ?></option>
									<option value="Islam">Islam</option>
									<option value="Kristen">Kristen</option>
									<option value="Hindu">Hindu</option>
									<option value="Budha">Budha</option>
								</select>
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select class="form-control" name="jk">
									<option value="<?= $data['jenis_kelamin_guru'] ?>"><?= $data['jenis_kelamin_guru'] ?></option>
									<option value="Laki-Laki">Laki-laki</option>
									<option value="Wanita">Wanita</option>
								</select>
							</div>

							
						</div>
						<div class="col-lg-6">
							
							<div class="form-group">
								<label>Telepon</label>
								<input type="" value="<?= $data['telepon_guru'] ?>" required placeholder="Telepon" class="form-control" name="telepon">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="" required placeholder="Email" value="<?= $data['email'] ?>" class="form-control" name="email">
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<input type="" value="<?= $data['alamat_guru'] ?>" required placeholder="Alamat" class="form-control" name="alamat">
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Pangkat</label>
										<input type="" value="<?= $data['pangkat'] ?>" required placeholder="Pangkat" class="form-control" name="pangkat">
									</div>
									
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Golongan</label>
										<input type="" value="<?= $data['gol'] ?>" required placeholder="Golongan" class="form-control" name="gol">
									</div>
								</div>
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
						<a href="index.php?route=data-guru" class="btn btn-danger">Kembali</a>
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
	$nm_user = $_POST['nama_guru'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	// guru
	$a = $_POST['nip_guru'];
	$b = $_POST['tempat_lahir'];
	$c = $_POST['tgl_lahir'];
	$d = $_POST['agama'];
	$e = $_POST['jk'];
	$f = $_POST['telepon'];
	$g = $_POST['email'];
	$h = $_POST['alamat'];
	$i = $_POST['gol'];
	$j = $_POST['pangkat'];

	

	$sql2 = mysqli_query($koneksi,"UPDATE guru SET 
		nip_guru='$a',
		nama_guru='$nm_user',
		tempat_lahir_guru='$b',
		tgl_lahir_guru='$c',
		agama_guru='$d',
		jenis_kelamin_guru='$e',
		telepon_guru='$f',
		email='$g',
		alamat_guru='$h',
		gol='$i',
		pangkat='$j'
		WHERE id_guru='$_GET[id]'");

	if ($sql2==true) {
		echo "<script>alert('Berhasil menyimpan data');window.location='index.php?route=data-guru'</script>";
		$sql = mysqli_query($koneksi,"UPDATE user SET nm_user='$nm_user',username='$username',password='$password' WHERE id_user='$data[id_user]'");
	}else{
		echo "<script>alert('Gagal menyimpan data');window.location='index.php?route=data-guru'</script>";
	}
}

?>