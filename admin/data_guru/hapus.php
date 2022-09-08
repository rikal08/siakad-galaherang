<?php 

$id_guru=$_GET['id_guru'];
$id_user = $_GET['id_user'];

$sql = mysqli_query($koneksi,"DELETE FROM guru WHERE id_guru='$id_guru'");


$sql = mysqli_query($koneksi,"DELETE FROM user WHERE id_user='$id_user'");

if ($sql==true) {
	echo "<script>alert('Berhasil menghapus data');window.location='index.php?route=data-guru'</script>";
}



?>