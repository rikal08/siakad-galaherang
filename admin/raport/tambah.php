<div class="row">
	<div class="col-lg-6">
		<div class="box">
			<div class="box-header">
				Tambah Absensi Siswa
			</div>
			<div class="box-body">
				<form action="" method="post">
					<div class="form-group">
						<label>Pilih Siswa</label>
						<select class="form-control" name="id_siswa">
							<?php 
							$sql = mysqli_query($koneksi,"SELECT * FROM siswa");
							foreach ($sql as $data_k) {


								?>
								<option value="<?= $data_k['id_siswa'] ?>"><?= $data_k['nama_siswa'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Pilih Pelajaran</label>
						<select class="form-control" name="id_mapel">
							<?php 
							$sql = mysqli_query($koneksi,"SELECT * FROM mapel");
							foreach ($sql as $data_k) {


								?>
								<option value="<?= $data_k['id_mapel'] ?>"><?= $data_k['nama_mapel'] ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label>Masukan Nilai</label>
						<input type="" name="nilai" class="form-control" placeholder="Nilai">
					</div>

					<div class="form-group">
						<a href="index.php?route=raport" class="btn btn-danger">Kembali</a>
						<button class="btn btn-primary" name="submit" type="submit">Simpan</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<?php 

if (isset($_POST['submit'])) {
	$a = $_POST['id_siswa'];
	$b = $_POST['id_mapel'];
	$c = $_POST['nilai'];
	

	if ($c >= 90 AND $c <= 100) {
		$d ='A';
	}elseif($c >= 79 AND $c <= 89){
		$d = 'B';
	}elseif($c >= 69 AND $c <= 78){
		$d = 'C';
	}elseif($c >= 50 AND $c <= 68){
		$d = 'D';
	}elseif($c < 50){
		$d = 'E';
	}
	$sql2= mysqli_query($koneksi,"SELECT * FROM mapel WHERE id_mapel='$b'");
	$data2 = mysqli_fetch_array($sql2);

	$sql = mysqli_query($koneksi,"INSERT INTO nilai VALUES (NULL,'$a','$b','$data2[kkm]','$c','$d')");

	if ($sql==true) {
		echo '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Berhasil</h4>
		Data siswa berhasil diinputkan
		</div>';
	}else{
		echo "<script>alert('gagal');window.location='index.php?route=raport'</script>";
	}
}

?>
