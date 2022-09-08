<?php 

$id=$_GET['id_jadwal'];

$sql = mysqli_query($koneksi,"DELETE FROM jadwal_pelajaran WHERE id_jadwal='$id'");

if ($sql==true) {
	echo "<script>alert('Berhasil menghapus data');window.location='index.php?route=data-jadwal-pelajaran'</script>";
}

?>