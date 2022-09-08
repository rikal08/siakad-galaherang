-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Sep 2022 pada 17.18
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad_sd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_guru`
--

CREATE TABLE `absen_guru` (
  `id_absen_guru` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `ket` varchar(10) NOT NULL,
  `alasan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absen_guru`
--

INSERT INTO `absen_guru` (`id_absen_guru`, `id_guru`, `tgl`, `jam`, `ket`, `alasan`) VALUES
(3, 3, '2022-08-31', '16:30:00', 'Hadir', '0'),
(4, 3, '2022-09-07', '17:13:00', 'Hadir', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_siswa`
--

CREATE TABLE `absen_siswa` (
  `id_absen_siswa` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `ket` varchar(10) NOT NULL,
  `alasan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absen_siswa`
--

INSERT INTO `absen_siswa` (`id_absen_siswa`, `id_siswa`, `id_mapel`, `id_guru`, `tgl`, `jam`, `ket`, `alasan`) VALUES
(1, 2, 1, 3, '2022-08-31', '17:16:00', 'Hadir', NULL),
(2, 2, 2, 3, '2022-08-31', '17:27:00', 'Hadir', NULL),
(3, 2, 1, 3, '2022-09-07', '17:16:00', 'Hadir', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip_guru` varchar(20) DEFAULT NULL,
  `nama_guru` varchar(50) DEFAULT NULL,
  `tempat_lahir_guru` varchar(200) DEFAULT NULL,
  `tgl_lahir_guru` date DEFAULT NULL,
  `agama_guru` varchar(10) DEFAULT NULL,
  `jenis_kelamin_guru` varchar(10) DEFAULT NULL,
  `telepon_guru` varchar(20) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `alamat_guru` text DEFAULT NULL,
  `gol` varchar(20) DEFAULT NULL,
  `pangkat` varchar(20) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip_guru`, `nama_guru`, `tempat_lahir_guru`, `tgl_lahir_guru`, `agama_guru`, `jenis_kelamin_guru`, `telepon_guru`, `email`, `alamat_guru`, `gol`, `pangkat`, `id_user`) VALUES
(3, '0987654', 'Suci Ramahwadi, S.Pd', 'Bandung', '1995-07-30', 'Islam', 'Laki-Laki', '08765476', 'suci@gmail.com', 'Bandung', 'V', 'Guru', 6493);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id_jadwal`, `id_kelas`, `id_guru`, `id_mapel`, `hari`, `jam_masuk`, `jam_pulang`) VALUES
(1, 1, 3, 1, 'Rabu', '10:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_ujian`
--

CREATE TABLE `jadwal_ujian` (
  `id_jadwal_ujian` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `pengawas` varchar(50) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_ujian`
--

INSERT INTO `jadwal_ujian` (`id_jadwal_ujian`, `id_kelas`, `id_mapel`, `id_guru`, `pengawas`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(3, 1, 1, 3, 'Suci Ramahwadi, S.Pd', 'Senin', '08:00:00', '10:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `jumlah_siswa` int(11) DEFAULT NULL,
  `no_bangunan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `jumlah_siswa`, `no_bangunan`) VALUES
('1', 23, '101'),
('2', 43, '102');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `kkm` int(11) NOT NULL,
  `id_kelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `kkm`, `id_kelas`) VALUES
(1, 'B. Indonesia', 73, '1'),
(2, 'MATEMATIKA', 72, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `kkm` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `predikat` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `id_mapel`, `kkm`, `nilai`, `predikat`) VALUES
(1, 2, 1, 73, 79, 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis_siswa` varchar(10) NOT NULL,
  `nama_siswa` varchar(35) DEFAULT NULL,
  `tempat_lahir_siswa` varchar(200) DEFAULT NULL,
  `tgl_lahir_siswa` date DEFAULT NULL,
  `agama_siswa` varchar(20) DEFAULT NULL,
  `jenis_kelamin_siswa` varchar(10) DEFAULT NULL,
  `alamat_siswa` text DEFAULT NULL,
  `telepon_siswa` varchar(20) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama_ortu` varchar(35) DEFAULT NULL,
  `wa_ortu` varchar(20) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tgl_lahir_siswa`, `agama_siswa`, `jenis_kelamin_siswa`, `alamat_siswa`, `telepon_siswa`, `id_kelas`, `nama_ortu`, `wa_ortu`, `id_user`) VALUES
(2, '9876', 'Selfi', 'Jawa Timur', '2021-07-30', 'Islam', 'Laki-Laki', 'padang', '087654357', 1, 'Hendrik', '628978654', 7148);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `username`, `password`, `role`) VALUES
(1, 'Shofia', 'admin', '123', 1),
(6493, 'Suci Ramahwadi, S.Pd', 'suci', '123', 3),
(7148, 'Selfi', 'selfi', '123', 4),
(8394, 'Sunandar, S.Pd, M. Pd', 'sunandar', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen_guru`
--
ALTER TABLE `absen_guru`
  ADD PRIMARY KEY (`id_absen_guru`);

--
-- Indeks untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD PRIMARY KEY (`id_absen_siswa`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  ADD PRIMARY KEY (`id_jadwal_ujian`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen_guru`
--
ALTER TABLE `absen_guru`
  MODIFY `id_absen_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  MODIFY `id_absen_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `id_jadwal_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8395;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
