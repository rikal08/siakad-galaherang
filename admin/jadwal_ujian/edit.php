<?php 
$id = $_GET['id'];
$sql = mysqli_query($koneksi,"SELECT * FROM jadwal_ujian WHERE id_jadwal_ujian='$id'");
$data = mysqli_fetch_array($sql);
 ?>
<div class="row">
	<div class="col-lg-6">
		<div class="box">
			<div class="box-header">
				Tambah Jadwal Ujian
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
						<label>Pilih Pengawas</label>
						<select class="form-control" name="pengawas">
							<?php 
							$sql = mysqli_query($koneksi,"SELECT * FROM guru");
							foreach ($sql as $data_k) {


								?>
								<option value="<?= $data_k['nama_guru'] ?>"><?= $data_k['nama_guru'] ?></option>
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
						<label>Jam Mulai</label>
						<input type="time" value="<?= $data['jam_mulai'] ?>" required placeholder="" class="form-control" name="jam_mulai">
					</div>
					<div class="form-group">
						<label>Jam Selesai</label>
						<input type="time" value="<?= $data['jam_selesai'] ?>" required placeholder="" class="form-control" name="jam_selesai">
					</div>
					
					<hr>
					<div class="form-group">
						<a href="index.php?route=data-jadwal-ujian" class="btn btn-danger">Kembali</a>
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
	$b = $_POST['id_mapel'];
	$c = $_POST['id_guru'];
	$d = $_POST['pengawas'];
	$e = $_POST['hari'];
	$f = $_POST['jam_mulai'];
	$g = $_POST['jam_selesai'];
	$sql = mysqli_query($koneksi,"UPDATE jadwal_ujian SET 
		pengawas='$d',
		hari='$e',
		jam_mulai='$f',
		jam_selesai='$g'
		WHERE id_jadwal_ujian='$_GET[id]'
		");

	if ($sql==true) {
		echo "<script>alert('Berhasil menyimpan data');window.location='index.php?route=data-jadwal-ujian'</script>";
	}else{
		echo "<script>alert('Kelas Sudah Ada');window.location='index.php?route=data-jadwal-ujian'</script>";
	}
}

?>