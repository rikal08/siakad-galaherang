<?php 

$id = $_GET['id'];
$sql = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$id'");
$data = mysqli_fetch_array($sql);

 ?>
<div class="row">
	<div class="col-lg-6">
		<div class="box">
			<div class="box-header">
				Edit Data Pengguna
			</div>
			<div class="box-body">
				<form action="" method="post">
					<div class="form-group">
						<label>Nama Pengguna</label>
						<input type="" required value="<?= $data['nm_user'] ?>" placeholder="Nama Pengguna" class="form-control" name="nm_user">
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="" required value="<?= $data['username'] ?>" placeholder="Username" class="form-control" name="username">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="" required value="<?= $data['password'] ?>" placeholder="Password" class="form-control" name="password">
					</div>
					<hr>
					<div class="form-group">
						<a href="index.php?route=data-pengguna" class="btn btn-danger">Kembali</a>
						<button class="btn btn-primary" name="submit" type="submit">Update</button>
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
	$sql = mysqli_query($koneksi,"UPDATE user SET nm_user='$nm_user',username='$username',password='$password' WHERE id_user='$id'");

	if ($sql==true) {
		echo "<script>alert('Berhasil menyimpan data');window.location='index.php?route=data-pengguna'</script>";
	}
}

 ?>