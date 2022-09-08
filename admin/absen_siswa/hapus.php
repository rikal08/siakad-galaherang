<?php 

$id=$_GET['id_absen'];

$sql = mysqli_query($koneksi,"DELETE FROM absen_siswa WHERE id_absen_siswa='$id'");

if ($sql==true) {
	echo "<script>alert('Berhasil menghapus data');window.location='index.php?route=absen-siswa'</script>";
}

?>