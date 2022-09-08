<div class="row">
	<div class="col-lg-6">
		<div class="box">
			<div class="box-header">
				Tambah Absensi guru
			</div>
			<div class="box-body">
				<form action="" method="post">
					<div class="form-group">
						<label>Pilih Guru</label>
						<select class="form-control" name="id_guru">
							<?php 
							$sql = mysqli_query($koneksi,"SELECT * FROM guru");
							foreach ($sql as $data_k) {


								?>
								<option value="<?= $data_k['id_guru'] ?>"><?= $data_k['nama_guru'] ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label>Tanggal</label>
						<input type="date" name="tgl" class="form-control" value="<?= date('Y-m-d') ?>">
					</div>
					<div class="form-group">
						<label>Jam</label>
						<input type="time" name="jam" class="form-control" value="<?= date('H:i') ?>">
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<select class="form-control" name="ket">
							<option>Hadir</option>
							<option>Izin</option>
							<option>Sakit</option>
							<option>Alfa</option>
						</select>
					</div>

					<div class="form-group">
						<label>Alasan (Isi jika alfa dan sakit)</label>
						<input type="text" name="alasan" class="form-control" value="-">
					</div>
					
					<hr>
					<div class="form-group">
						<a href="index.php?route=absen-guru" class="btn btn-danger">Kembali</a>
						<button class="btn btn-primary" name="submit" type="submit">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 

if (isset($_POST['submit'])) {
	$a = $_POST['id_guru'];
	$b = $_POST['tgl'];
	$c = $_POST['jam'];
	$d = $_POST['ket'];
	$e = $_POST['alasan'];
	$sql = mysqli_query($koneksi,"INSERT INTO absen_guru VALUES (NULL,'$a','$b','$c','$d','$e')");

	if ($sql==true) {
		echo '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Berhasil</h4>
		Data absensi sudah disimpan, silahkan lakukan absensi pada hari berikutnya
		</div>';
	}else{
		echo "<script>alert('Guru sudah absensi hari ini');window.location='index.php?route=data-kelas'</script>";
	}
}

?>