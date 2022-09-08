<?php 

$id_siswa=$_GET['id_siswa'];
$id_user = $_GET['id_user'];

$sql = mysqli_query($koneksi,"DELETE FROM siswa WHERE id_siswa='$id_siswa'");


$sql = mysqli_query($koneksi,"DELETE FROM user WHERE id_user='$id_user'");

if ($sql==true) {
	echo "<script>alert('Berhasil menghapus data');window.location='index.php?route=data-siswa'</script>";
}



?>