-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 01:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

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
-- Table structure for table `absen_form_tbl`
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
-- Dumping data for table `absen_form_tbl`
--

INSERT INTO `absen_form_tbl` (`form_id`, `nip`, `nama_matkul`, `kelas`, `program_studi`, `pertemuan`, `tanggal`, `qrcode`) VALUES
(4, 'admindsn', 'tes', 'b', 'Teknik Informatika', 12, '2020-11-04', 'tes b Teknik Informatika 12 2020-11-04'),
(8, 'admindosen', 'Bindo', 'a', 'Teknik Informatika', 2, '2020-11-05', '3779b8ff5d3d0c267f573ad2ba2342bb'),
(9, 'admindsn', 'Sistem Informasi', 'a', 'Teknik Informatika', 16, '2020-11-05', '757ad2aae32dda373c7664e9529731bd'),
(10, 'admindsn', 'Sistem Informasi', 'b', 'Teknik Informatika', 1, '2020-11-05', '54425b0b034ebfa1f8ce09ca58a3cfc6');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_tbl`
--

CREATE TABLE `dosen_tbl` (
  `nip` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen_tbl`
--

INSERT INTO `dosen_tbl` (`nip`, `nama_lengkap`, `password`, `token`) VALUES
('admindosen', 'admindosen', '21232f297a57a5a743894a0e4a801fc3', '24391f1aebf826ce6e86764b0c43eee4'),
('admindsn', 'admindsn', '21232f297a57a5a743894a0e4a801fc3', 'e1decb2e9a4f7fef6be046c134190916');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran_tbl`
--

CREATE TABLE `kehadiran_tbl` (
  `kehadiran_id` bigint(20) NOT NULL,
  `form_id` bigint(20) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `tanggal_absen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kehadiran_tbl`
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
-- Table structure for table `mahasiswa_tbl`
--

CREATE TABLE `mahasiswa_tbl` (
  `nim` varchar(12) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa_tbl`
--

INSERT INTO `mahasiswa_tbl` (`nim`, `nama_lengkap`, `password`, `token`) VALUES
('adminmhs', 'adminmhs', '21232f297a57a5a743894a0e4a801fc3', 'c74c5cbf2988c82453c04857fd1d21e1'),
('D121181001', 'alfian aldy hamdani', '21232f297a57a5a743894a0e4a801fc3', 'd0a3bc36eebb08d6934080a6cf60e1c2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_form_tbl`
--
ALTER TABLE `absen_form_tbl`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `FK_DOSEN_TBL_NIP` (`nip`);

--
-- Indexes for table `dosen_tbl`
--
ALTER TABLE `dosen_tbl`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `kehadiran_tbl`
--
ALTER TABLE `kehadiran_tbl`
  ADD PRIMARY KEY (`kehadiran_id`),
  ADD KEY `FK_MAHASISWA_TBL_NIM` (`nim`),
  ADD KEY `FK_ABSEN_FORM_TBL_FORM_ID` (`form_id`);

--
-- Indexes for table `mahasiswa_tbl`
--
ALTER TABLE `mahasiswa_tbl`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_form_tbl`
--
ALTER TABLE `absen_form_tbl`
  MODIFY `form_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kehadiran_tbl`
--
ALTER TABLE `kehadiran_tbl`
  MODIFY `kehadiran_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen_form_tbl`
--
ALTER TABLE `absen_form_tbl`
  ADD CONSTRAINT `FK_DOSEN_TBL_NIP` FOREIGN KEY (`nip`) REFERENCES `dosen_tbl` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kehadiran_tbl`
--
ALTER TABLE `kehadiran_tbl`
  ADD CONSTRAINT `FK_ABSEN_FORM_TBL_FORM_ID` FOREIGN KEY (`form_id`) REFERENCES `absen_form_tbl` (`form_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MAHASISWA_TBL_NIM` FOREIGN KEY (`nim`) REFERENCES `mahasiswa_tbl` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
