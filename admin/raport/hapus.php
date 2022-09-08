<?php 

$id=$_GET['id_nilai'];

$sql = mysqli_query($koneksi,"DELETE FROM nilai WHERE id_nilai='$id'");

if ($sql==true) {
	echo "<script>alert('Berhasil menghapus data');window.location='index.php?route=raport'</script>";
}

?>