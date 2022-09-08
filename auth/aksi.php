<?php
// mulai session
session_start();
// koneksi database
include '../config/koneksi.php';
// variabel data
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
// cek tabel user
$cek = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password' AND role='$role'");
$hasil = mysqli_num_rows($cek);
if ($hasil > 0) {
	$data=mysqli_fetch_array($cek);
	$_SESSION['username']= $data['username'];
	$_SESSION['nm_user']= $data['nm_user'];
	$_SESSION['role']= $data['role'];
	$_SESSION['id_user']= $data['id_user'];
			
		echo "<script>window.location='../admin/index.php?route=home'</script>";
	
}else{
	echo "<script>alert('Maaf, tidak ada data yang sesuai');window.location='index.php'</script>";
}

?>