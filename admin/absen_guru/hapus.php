<?php 

$id=$_GET['id_absen'];

$sql = mysqli_query($koneksi,"DELETE FROM absen_guru WHERE id_absen_guru='$id'");

if ($sql==true) {
	echo "<script>alert('Berhasil menghapus data');window.location='index.php?route=absen-guru'</script>";
}

?>