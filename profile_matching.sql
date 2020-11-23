-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2020 at 09:53 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profile_matching`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id_administrator` int(3) NOT NULL,
  `nama_administrator` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL,
  `aktif` char(1) NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id_administrator`, `nama_administrator`, `username`, `password`, `aktif`) VALUES
(1, 'Administrator', 'admin', '$2y$10$NY2kKQBgx29bPmoP1YXe/eijF24VMm7VU8FE2u0YBkfQ5HgMNOCpy', 'Y'),
(2, 'Asda', 'aaaaa', '$2y$10$mnLmz0jd7dgAtKAzaSf3Q.b3zg8DC8itrBGOK6SS3cfrI9fnslN9K', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `aspek`
--

CREATE TABLE `aspek` (
  `kode_aspek` varchar(4) NOT NULL,
  `nama_aspek` varchar(50) NOT NULL,
  `bobot` float NOT NULL,
  `bobot_cf` float NOT NULL,
  `bobot_sf` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspek`
--

INSERT INTO `aspek` (`kode_aspek`, `nama_aspek`, `bobot`, `bobot_cf`, `bobot_sf`) VALUES
('A001', 'Kehadiran Siswa', 35, 65, 35),
('A002', 'Prestasi Siswa', 35, 55, 45),
('A003', 'Tanggungan Orang Tua', 30, 65, 35);

-- --------------------------------------------------------

--
-- Table structure for table `detail_kandidat`
--

CREATE TABLE `detail_kandidat` (
  `id_detail` int(5) NOT NULL,
  `id_kandidat` int(5) NOT NULL,
  `kode_faktor` varchar(3) NOT NULL,
  `nilai_faktor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kandidat`
--

INSERT INTO `detail_kandidat` (`id_detail`, `id_kandidat`, `kode_faktor`, `nilai_faktor`) VALUES
(1, 1, 'F01', 4),
(2, 1, 'F02', 5),
(3, 1, 'F03', 4),
(4, 1, 'F04', 4),
(5, 1, 'F05', 4),
(6, 1, 'F06', 3),
(7, 1, 'F07', 5),
(8, 1, 'F08', 4),
(9, 1, 'F09', 3),
(10, 1, 'F10', 3),
(11, 1, 'F11', 2),
(12, 1, 'F12', 4),
(36, 3, 'F12', 3),
(35, 3, 'F11', 3),
(34, 3, 'F10', 2),
(33, 3, 'F09', 4),
(32, 3, 'F08', 4),
(31, 3, 'F07', 3),
(30, 3, 'F06', 4),
(29, 3, 'F05', 3),
(28, 3, 'F04', 3),
(27, 3, 'F03', 3),
(26, 3, 'F02', 4),
(25, 3, 'F01', 3),
(37, 4, 'F01', 5),
(38, 4, 'F02', 4),
(39, 4, 'F03', 5),
(40, 4, 'F04', 5),
(41, 4, 'F05', 4),
(42, 4, 'F06', 5),
(43, 4, 'F07', 5),
(44, 4, 'F08', 4),
(45, 4, 'F09', 4),
(46, 4, 'F10', 3),
(47, 4, 'F11', 3),
(48, 4, 'F12', 4),
(49, 5, 'F01', 1),
(50, 5, 'F02', 2),
(51, 5, 'F03', 3),
(52, 5, 'F04', 4),
(53, 5, 'F05', 5),
(54, 5, 'F06', 5),
(55, 5, 'F07', 4),
(56, 5, 'F08', 3),
(57, 5, 'F09', 2),
(58, 5, 'F10', 1),
(59, 5, 'F11', 1),
(60, 5, 'F12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `faktor`
--

CREATE TABLE `faktor` (
  `kode_faktor` varchar(3) NOT NULL,
  `kode_aspek` varchar(4) NOT NULL,
  `nama_faktor` varchar(50) DEFAULT NULL,
  `jenis_faktor` enum('CF','SF') DEFAULT NULL,
  `nilai_target` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faktor`
--

INSERT INTO `faktor` (`kode_faktor`, `kode_aspek`, `nama_faktor`, `jenis_faktor`, `nilai_target`) VALUES
('F01', 'A001', 'KBM', 'CF', 5),
('F02', 'A001', 'Ekstra Kurikuler', 'SF', 3),
('F03', 'A001', 'Kegiatan Insidental', 'SF', 2),
('F04', 'A002', 'Nilai Matematika', 'CF', 5),
('F05', 'A002', 'Nilai Bahasa Indonesia', 'CF', 4),
('F06', 'A002', 'Nilai Bahasa Inggris', 'CF', 4),
('F07', 'A002', 'Nilai PKn', 'SF', 3),
('F08', 'A002', 'Nilai Pendidikan Agama', 'CF', 4),
('F09', 'A002', 'Prestasi Non Akademik', 'SF', 3),
('F10', 'A003', 'Penghasilan', 'CF', 5),
('F11', 'A003', 'Jumlah Anak dalam Tanggungan', 'SF', 3),
('F12', 'A003', 'Jarak dari Rumah ke Sekolah', 'SF', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `id_kandidat` int(5) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nilai_akhir` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id_kandidat`, `nik`, `nilai_akhir`) VALUES
(1, '100', 3.90563),
(3, '101', 3.715),
(4, '102', 4.21844),
(5, '300', 2.74563);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nik` int(20) NOT NULL,
  `nama_pegawai` varchar(40) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pendidikan` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nik`, `nama_pegawai`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `pendidikan`) VALUES
(100, 'Anton', 'Wonosobo', '2007-05-01', 'P', 'abc', '1-A'),
(101, 'Bejo', 'Wonosobo', '2010-01-01', 'L', 'adf', '1-A'),
(102, 'Devi', 'Wonosobo', '2008-01-01', 'P', 'aa', '1-A'),
(300, 'Cino', 'Wonosobo', '2020-11-23', 'L', 'Selomerto', 'S1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_administrator`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `aspek`
--
ALTER TABLE `aspek`
  ADD PRIMARY KEY (`kode_aspek`);

--
-- Indexes for table `detail_kandidat`
--
ALTER TABLE `detail_kandidat`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `faktor`
--
ALTER TABLE `faktor`
  ADD PRIMARY KEY (`kode_faktor`);

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_administrator` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_kandidat`
--
ALTER TABLE `detail_kandidat`
  MODIFY `id_detail` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id_kandidat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
