<?php 

if (isset($_GET['route'])) {
	$route = $_GET['route'];

	switch ($route) {
		case 'home':
			include '../admin/home.php';
			break;
		// data pengguna
		case 'data-pengguna':
			include '../admin/data_pengguna/index.php';
			break;
		case 'tambah-pengguna':
			include '../admin/data_pengguna/tambah.php';
			break;
		case 'hapus-pengguna':
			include '../admin/data_pengguna/hapus.php';
			break;
		case 'edit-pengguna':
			include '../admin/data_pengguna/edit.php';
			break;

		// data guru
		case 'data-guru':
			include '../admin/data_guru/index.php';
			break;
		case 'tambah-guru':
			include '../admin/data_guru/tambah.php';
			break;
		case 'hapus-guru':
			include '../admin/data_guru/hapus.php';
			break;
		case 'edit-guru':
			include '../admin/data_guru/edit.php';
			break;
		case 'biodata-guru':
			include '../admin/data_guru/edit.php';
			break;

		// data siswa
	
		case 'data-siswa':
			include '../admin/data_siswa/index.php';
			break;
		case 'tambah-siswa':
			include '../admin/data_siswa/tambah.php';
			break;
		case 'hapus-siswa':
			include '../admin/data_siswa/hapus.php';
			break;
		case 'edit-siswa':
			include '../admin/data_siswa/edit.php';
			break; 
		case 'biodata-siswa':
			include '../admin/data_siswa/edit.php';
			break; 
		// data kelas
	
		case 'data-kelas':
			include '../admin/data_kelas/index.php';
			break;
		case 'tambah-kelas':
			include '../admin/data_kelas/tambah.php';
			break;
		case 'hapus-kelas':
			include '../admin/data_kelas/hapus.php';
			break;
		case 'edit-kelas':
			include '../admin/data_kelas/edit.php';
			break;

		// data mapel
	
		case 'data-mapel':
			include '../admin/data_mapel/index.php';
			break;
		case 'tambah-mapel':
			include '../admin/data_mapel/tambah.php';
			break;
		case 'hapus-mapel':
			include '../admin/data_mapel/hapus.php';
			break;
		case 'edit-mapel':
			include '../admin/data_mapel/edit.php';
			break;
		
		// data jadwal
	
		case 'data-jadwal-pelajaran':
			include '../admin/data_jadwal/index.php';
			break;
		case 'tambah-jadwal-pelajaran':
			include '../admin/data_jadwal/tambah.php';
			break;
		case 'hapus-jadwal-pelajaran':
			include '../admin/data_jadwal/hapus.php';
			break;
		case 'edit-jadwal-pelajaran':
			include '../admin/data_jadwal/edit.php';
			break;

		// data jadwal ujian
	
		case 'data-jadwal-ujian':
			include '../admin/jadwal_ujian/index.php';
			break;
		case 'tambah-jadwal-ujian':
			include '../admin/jadwal_ujian/tambah.php';
			break;
		case 'hapus-jadwal-ujian':
			include '../admin/jadwal_ujian/hapus.php';
			break;
		case 'edit-jadwal-ujian':
			include '../admin/jadwal_ujian/edit.php';
			break;

		// absen guru
	
		case 'absen-guru':
			include '../admin/absen_guru/index.php';
			break;
		case 'tambah-absen-guru':
			include '../admin/absen_guru/tambah.php';
			break;
		case 'hapus-absen-guru':
			include '../admin/absen_guru/hapus.php';
			break;

		// absen siswa
	
		case 'absen-siswa':
			include '../admin/absen_siswa/index.php';
			break;
		case 'tambah-absen-siswa':
			include '../admin/absen_siswa/tambah.php';
			break;
		case 'hapus-absen-siswa':
			include '../admin/absen_siswa/hapus.php';
			break;

		// wa
		
		case 'wa':
			include '../admin/wa/index.php';
			break;

		// laport

		case 'raport':
			include '../admin/raport/index.php';
			break;
		case 'tambah-nilai':
			include '../admin/raport/tambah.php';
			break;
		case 'hapus-nilai':
			include '../admin/raport/hapus.php';
			break;

		

		
		default:
			// code...
			break;
	}
}


?>