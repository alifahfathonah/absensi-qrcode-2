-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Nov 2020 pada 17.44
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_qrcode`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_form_tbl`
--

CREATE TABLE `absen_form_tbl` (
  `form_id` bigint(20) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `kelas` varchar(1) NOT NULL,
  `program_studi` varchar(50) NOT NULL,
  `pertemuan` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `qrcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absen_form_tbl`
--

INSERT INTO `absen_form_tbl` (`form_id`, `nip`, `nama_matkul`, `kelas`, `program_studi`, `pertemuan`, `tanggal`, `qrcode`) VALUES
(4, 'admindsn', 'tes', 'b', 'Teknik Informatika', 12, '2020-11-04', 'tes b Teknik Informatika 12 2020-11-04'),
(8, 'admindosen', 'Bindo', 'a', 'Teknik Informatika', 2, '2020-11-05', '3779b8ff5d3d0c267f573ad2ba2342bb'),
(9, 'admindsn', 'Sistem Informasi', 'a', 'Teknik Informatika', 16, '2020-11-05', '757ad2aae32dda373c7664e9529731bd'),
(10, 'admindsn', 'Sistem Informasi', 'b', 'Teknik Informatika', 1, '2020-11-05', '54425b0b034ebfa1f8ce09ca58a3cfc6'),
(11, 'D121181509', 'Dasar Multimedia', 'a', 'Teknik Informatika', 15, '2020-01-12', 'dc00bdeb675bc15fec7b0274faafa64b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_tbl`
--

CREATE TABLE `dosen_tbl` (
  `nip` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen_tbl`
--

INSERT INTO `dosen_tbl` (`nip`, `nama_lengkap`, `password`, `token`) VALUES
('admindosen', 'admindosen', '21232f297a57a5a743894a0e4a801fc3', '24391f1aebf826ce6e86764b0c43eee4'),
('admindsn', 'admindsn', '21232f297a57a5a743894a0e4a801fc3', 'e1decb2e9a4f7fef6be046c134190916'),
('D121181509', 'Ichsan Noer', '81dc9bdb52d04dc20036dbd8313ed055', '18fc9a7da01814c9e31c1a163bffc5ed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran_tbl`
--

CREATE TABLE `kehadiran_tbl` (
  `kehadiran_id` bigint(20) NOT NULL,
  `form_id` bigint(20) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `tanggal_absen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kehadiran_tbl`
--

INSERT INTO `kehadiran_tbl` (`kehadiran_id`, `form_id`, `nim`, `tanggal_absen`) VALUES
(1, 4, 'adminmhs', '2020-11-04 17:27:39'),
(4, 4, 'D121181001', '2020-11-04 17:42:08'),
(6, 9, 'adminmhs', '2020-11-04 16:36:31'),
(12, 9, 'D121181001', '2020-11-04 17:27:57'),
(13, 10, 'D121181001', '2020-11-04 20:40:16'),
(14, 8, 'adminmhs', '2020-11-04 20:53:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_tbl`
--

CREATE TABLE `mahasiswa_tbl` (
  `nim` varchar(12) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa_tbl`
--

INSERT INTO `mahasiswa_tbl` (`nim`, `nama_lengkap`, `password`, `token`) VALUES
('adminmhs', 'adminmhs', '21232f297a57a5a743894a0e4a801fc3', 'c74c5cbf2988c82453c04857fd1d21e1'),
('D121181001', 'alfian aldy hamdani', '21232f297a57a5a743894a0e4a801fc3', 'd0a3bc36eebb08d6934080a6cf60e1c2'),
('D121181315', 'Fadilah Ramadhani', '81dc9bdb52d04dc20036dbd8313ed055', '0f9654c4227330ee5814585f665b5e13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen_form_tbl`
--
ALTER TABLE `absen_form_tbl`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `FK_DOSEN_TBL_NIP` (`nip`);

--
-- Indeks untuk tabel `dosen_tbl`
--
ALTER TABLE `dosen_tbl`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `kehadiran_tbl`
--
ALTER TABLE `kehadiran_tbl`
  ADD PRIMARY KEY (`kehadiran_id`),
  ADD KEY `FK_MAHASISWA_TBL_NIM` (`nim`),
  ADD KEY `FK_ABSEN_FORM_TBL_FORM_ID` (`form_id`);

--
-- Indeks untuk tabel `mahasiswa_tbl`
--
ALTER TABLE `mahasiswa_tbl`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen_form_tbl`
--
ALTER TABLE `absen_form_tbl`
  MODIFY `form_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kehadiran_tbl`
--
ALTER TABLE `kehadiran_tbl`
  MODIFY `kehadiran_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen_form_tbl`
--
ALTER TABLE `absen_form_tbl`
  ADD CONSTRAINT `FK_DOSEN_TBL_NIP` FOREIGN KEY (`nip`) REFERENCES `dosen_tbl` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kehadiran_tbl`
--
ALTER TABLE `kehadiran_tbl`
  ADD CONSTRAINT `FK_ABSEN_FORM_TBL_FORM_ID` FOREIGN KEY (`form_id`) REFERENCES `absen_form_tbl` (`form_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MAHASISWA_TBL_NIM` FOREIGN KEY (`nim`) REFERENCES `mahasiswa_tbl` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
