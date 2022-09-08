<?php 
$id = $_GET['id'];
$sql = mysqli_query($koneksi,"SELECT * FROM jadwal_pelajaran WHERE id_jadwal='$id'");
$data = mysqli_fetch_array($sql);
 ?>
<div class="row">
	<div class="col-lg-6">
		<div class="box">
			<div class="box-header">
				Edit Jadwal Pelajaran
			</div>
			<div class="box-body">
				<form action="" method="post">
					<div class="form-group">
						<label>Pilih Kelas</label>
						<select class="form-control" name="id_kelas">
							<?php 
							$sql = mysqli_query($koneksi,"SELECT * FROM kelas WHERE id_kelas='$data[id_kelas]'");
							foreach ($sql as $data_k) {


								?>
								<option value="<?= $data_k['id_kelas'] ?>"><?= $data_k['id_kelas'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Pilih Pelajaran</label>
						<select class="form-control" name="id_mapel">
							<?php 
							$sql = mysqli_query($koneksi,"SELECT * FROM mapel WHERE id_mapel='$data[id_mapel]'");
							foreach ($sql as $data_k) {


								?>
								<option value="<?= $data_k['id_mapel'] ?>"><?= $data_k['nama_mapel'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Pilih Guru</label>
						<select class="form-control" name="id_guru">
							<?php 
							$sql = mysqli_query($koneksi,"SELECT * FROM guru WHERE id_guru='$data[id_guru]'");
							foreach ($sql as $data_k) {


								?>
								<option value="<?= $data_k['id_guru'] ?>"><?= $data_k['nama_guru'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Pilih Hari</label>
						<select class="form-control" name="hari">
							<option><?= $data['hari'] ?></option>
							<option>Senin</option>
							<option>Selasa</option>
							<option>Rabu</option>
							<option>Kamis</option>
							<option>Jumat</option>
							<option>Sabtu</option>
						</select>
					</div>
					<div class="form-group">
						<label>Jam Masuk</label>
						<input type="time" value="<?= $data['jam_masuk'] ?>" required placeholder="" class="form-control" name="jam_masuk">
					</div>
					<div class="form-group">
						<label>Jam Pulang</label>
						<input type="time" value="<?= $data['jam_pulang'] ?>" required placeholder="" class="form-control" name="jam_pulang">
					</div>
					
					<hr>
					<div class="form-group">
						<a href="index.php?route=data-jadwal-pelajaran" class="btn btn-danger">Kembali</a>
						<button class="btn btn-primary" name="submit" type="submit">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 

if (isset($_POST['submit'])) {
	$a = $_POST['id_kelas'];
	$b = $_POST['id_guru'];
	$c = $_POST['id_mapel'];
	$d = $_POST['hari'];
	$e = $_POST['jam_masuk'];
	$f = $_POST['jam_pulang'];
	$sql = mysqli_query($koneksi,"UPDATE jadwal_pelajaran SET 
		hari='$d',
		jam_masuk='$e',
		jam_pulang='$f'

		WHERE id_jadwal='$_GET[id]'
		");

	if ($sql==true) {
		echo "<script>alert('Berhasil menyimpan data');window.location='index.php?route=data-jadwal-pelajaran'</script>";
	}else{
		echo "<script>alert('Kelas Sudah Ada');window.location='index.php?route=data-jadwal-pelajaran'</script>";
	}
}

?>