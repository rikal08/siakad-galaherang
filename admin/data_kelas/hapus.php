<?php 

$id=$_GET['id_kelas'];

$sql = mysqli_query($koneksi,"DELETE FROM kelas WHERE id_kelas='$id'");

if ($sql==true) {
	echo "<script>alert('Berhasil menghapus data');window.location='index.php?route=data-kelas'</script>";
}

?>