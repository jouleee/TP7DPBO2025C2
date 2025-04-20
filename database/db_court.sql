-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2025 at 02:32 PM
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
-- Database: `db_court`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_booking`
--

CREATE TABLE `t_booking` (
  `id_booking` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_booking`
--

INSERT INTO `t_booking` (`id_booking`, `id_pengguna`, `id_lapangan`, `tanggal`, `jam_mulai`, `jam_selesai`) VALUES
(0, 0, 0, '2025-03-20', '19:00:00', '20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_lapangan`
--

CREATE TABLE `t_lapangan` (
  `id_lapangan` int(11) NOT NULL,
  `nama_lapangan` varchar(255) NOT NULL,
  `jenis_lapangan` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_lapangan`
--

INSERT INTO `t_lapangan` (`id_lapangan`, `nama_lapangan`, `jenis_lapangan`, `lokasi`) VALUES
(0, 'Lapangan A Basket', 'Lapangan Basket', 'Jalan Puncung');

-- --------------------------------------------------------

--
-- Table structure for table `t_pengguna`
--

CREATE TABLE `t_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor_hp` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_pengguna`
--

INSERT INTO `t_pengguna` (`id_pengguna`, `nama`, `nomor_hp`, `email`) VALUES
(0, 'Julian Dwi Satrio', '081322503073', 'juliandwi.231@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_booking`
--
ALTER TABLE `t_booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `fk_lapangan` (`id_lapangan`),
  ADD KEY `fk_pengguna` (`id_pengguna`);

--
-- Indexes for table `t_lapangan`
--
ALTER TABLE `t_lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `t_pengguna`
--
ALTER TABLE `t_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_booking`
--
ALTER TABLE `t_booking`
  ADD CONSTRAINT `fk_lapangan` FOREIGN KEY (`id_lapangan`) REFERENCES `t_lapangan` (`id_lapangan`),
  ADD CONSTRAINT `fk_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `t_pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
