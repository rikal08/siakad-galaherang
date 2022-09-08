<?php 

$id=$_GET['id'];

$sql = mysqli_query($koneksi,"DELETE FROM user WHERE id_user='$id'");

if ($sql==true) {
	echo "<script>alert('Berhasil menghapus data');window.location='index.php?route=data-pengguna'</script>";
}

?>