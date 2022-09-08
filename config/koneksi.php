<?php 

$koneksi = mysqli_connect("localhost","root","","siakad_sd");

if ($koneksi==false) {
	echo "koneksi Gagal".mysqli_error();
}

 ?>