-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2024 at 12:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelaporankerusakanjalan_rohul`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `ID` int(11) NOT NULL,
  `Adm_Name` varchar(255) NOT NULL,
  `Adm_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`ID`, `Adm_Name`, `Adm_Password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin1', 'admin1'),
(3, 'admin2', 'admin3'),
(4, 'adminapkj', 'adminapkj'),
(5, 'agus', '$2y$10$tkiiVE4VKNu59C1NMNrg4.NqzWro0RAQ3PSn6u2yEhA7cMfgzIMRa');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kerusakan_jalan`
--

CREATE TABLE `laporan_kerusakan_jalan` (
  `id_laporan` int(11) NOT NULL,
  `gambar_laporan` varchar(255) NOT NULL,
  `nama_pelapor` varchar(100) NOT NULL,
  `tingkat_kerusakan` varchar(20) NOT NULL,
  `catatan_laporan` text DEFAULT NULL,
  `lokasi_laporan` varchar(255) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `tgl_laporan` datetime NOT NULL,
  `status_laporan` enum('Belum diperbaiki','Masih dalam proses pengerjaan','Sudah diperbaiki') NOT NULL DEFAULT 'Belum diperbaiki'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `laporan_kerusakan_jalan`
--

INSERT INTO `laporan_kerusakan_jalan` (`id_laporan`, `gambar_laporan`, `nama_pelapor`, `tingkat_kerusakan`, `catatan_laporan`, `lokasi_laporan`, `longitude`, `latitude`, `tgl_laporan`, `status_laporan`) VALUES
(9, 'uploads/1718089532.jpg', 'Agus Triono', 'Ringan', 'Contoh', 'no 22 UPT I, Jl. Cipta Karya Jl. Jasa Industri, Tuah Karya, Tampan, Pekanbaru City, Riau 28293, Indonesia', 101.3912615, 0.4374873, '2024-06-11 14:05:02', 'Belum diperbaiki'),
(10, 'uploads/1718095570.jpg', 'user', 'Ringan', 'Contoh', 'no 22 UPT I, Jl. Cipta Karya Jl. Jasa Industri, Tuah Karya, Tampan, Pekanbaru City, Riau 28293, Indonesia', 101.3912667, 0.437491, '2024-06-11 10:39:46', 'Belum diperbaiki'),
(11, 'uploads/1718095579.jpg', 'user', 'Ringan', 'Contoh', 'no 22 UPT I, Jl. Cipta Karya Jl. Jasa Industri, Tuah Karya, Tampan, Pekanbaru City, Riau 28293, Indonesia', 101.3912667, 0.437491, '2024-06-11 10:39:46', 'Belum diperbaiki'),
(12, 'uploads/1718605251.jpg', 'Nama Anda', 'Ringan', 'gu', 'Unnamed Road, Mountain View, CA 94043, USA', -122.083922, 37.4220936, '1970-01-01 07:00:00', 'Belum diperbaiki'),
(13, 'uploads/1718607622.jpg', 'a', 'Ringan', 'rusak parah', 'Unnamed Road, Mountain View, CA 94043, USA', -122.083922, 37.4220936, '1970-01-01 07:00:00', 'Belum diperbaiki');

-- --------------------------------------------------------

--
-- Table structure for table `user_masyarakat`
--

CREATE TABLE `user_masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `username_masyarakat` varchar(50) NOT NULL,
  `password_masyarakat` varchar(255) NOT NULL,
  `nik_masyarakat` varchar(16) NOT NULL,
  `nama_masyarakat` varchar(100) NOT NULL,
  `alamat_masyarakat` text NOT NULL,
  `notlpn_masyarakat` varchar(15) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_masyarakat`
--

INSERT INTO `user_masyarakat` (`id_masyarakat`, `username_masyarakat`, `password_masyarakat`, `nik_masyarakat`, `nama_masyarakat`, `alamat_masyarakat`, `notlpn_masyarakat`, `tgl_daftar`) VALUES
(1, 'aku', 'aku', '12', 'f', 'fd', '1', '2024-05-30 04:16:34'),
(2, 'user', '$2y$10$ZDSioZyG.RU9WBIz2XXBl.dvDUoxjHlJnelu54MXWbY/u6EJsSkHO', '1', 'user', 'q', '1', '2024-05-30 05:15:01'),
(4, 'user1', 'user1', '', '', '', '', '2024-06-01 10:32:23'),
(5, 'agus', '$2y$10$drylZK.gfQU7tCdRn/svSO1sDJXYgFFfhvFfWdvtNigjqZEr9cnQC', '1406012708010001', 'Agus Triono', 'Harapan', '081270684038', '2024-06-01 10:35:33'),
(6, 'abc', '$2y$10$v0FuYTqNGxgo6TWMCdwl5OmdBfJWsTeGganRlPpN9R2sOvyiW0Mvi', '1234567891011121', 'a', 'a', '0818488694', '2024-06-13 15:36:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `laporan_kerusakan_jalan`
--
ALTER TABLE `laporan_kerusakan_jalan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `user_masyarakat`
--
ALTER TABLE `user_masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`),
  ADD UNIQUE KEY `nik_masyarakat` (`nik_masyarakat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laporan_kerusakan_jalan`
--
ALTER TABLE `laporan_kerusakan_jalan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_masyarakat`
--
ALTER TABLE `user_masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
