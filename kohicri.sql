-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2025 at 03:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kohicri`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama_penuh` varchar(255) DEFAULT NULL,
  `alamat_tetap` text DEFAULT NULL,
  `ic_baru` varchar(20) DEFAULT NULL,
  `ic_lama` varchar(20) DEFAULT NULL,
  `no_telefon_rumah` varchar(20) DEFAULT NULL,
  `no_telefon_mobile_1` varchar(20) DEFAULT NULL,
  `no_telefon_mobile_2` varchar(20) DEFAULT NULL,
  `warganegara` varchar(100) DEFAULT NULL,
  `tarikh_lahir` date DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `jantina` varchar(10) DEFAULT NULL,
  `kaum` varchar(50) DEFAULT NULL,
  `status_perkahwinan` varchar(50) DEFAULT NULL,
  `jumlah_tanggungan` int(11) DEFAULT NULL,
  `no_akaun` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `jawatan` varchar(100) DEFAULT NULL,
  `gambar_url` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `akuan_1` int(11) DEFAULT NULL,
  `akuan_2` int(11) DEFAULT NULL,
  `akuan_3` int(11) DEFAULT NULL,
  `penama_nama` varchar(255) NOT NULL,
  `penama_no_telefon` varchar(255) NOT NULL,
  `penama_alamat` varchar(255) NOT NULL,
  `penama_ic_baru` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama_penuh`, `alamat_tetap`, `ic_baru`, `ic_lama`, `no_telefon_rumah`, `no_telefon_mobile_1`, `no_telefon_mobile_2`, `warganegara`, `tarikh_lahir`, `agama`, `jantina`, `kaum`, `status_perkahwinan`, `jumlah_tanggungan`, `no_akaun`, `pekerjaan`, `jawatan`, `gambar_url`, `email`, `akuan_1`, `akuan_2`, `akuan_3`, `penama_nama`, `penama_no_telefon`, `penama_alamat`, `penama_ic_baru`) VALUES
(1, 'Wan', '-', '-', '-', '-', '-', '-', '-', '2025-11-12', 'Islam', 'Lelaki', 'Melayu', 'Bujang', 0, '23456789', 'Engineer', NULL, 'test.jpg', 'superadmin@gmail.com', 1, 1, 1, '', '', '', NULL),
(2, 'Wan', '-', '-', '-', '-', '-', '-', '-', '2025-11-12', 'Islam', 'Lelaki', 'Melayu', 'Bujang', 0, '23456789', 'Engineer', NULL, 'profile_tksb_logo.png', 'superadmin@gmail.com', 1, 1, 1, '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_ic` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `no_ic`, `phone_no`) VALUES
(1, 'Wan', 'wan@gmail.com', '12345678', '12345678', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
