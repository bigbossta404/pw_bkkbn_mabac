-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 12:42 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkkbn_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Rizky Purwo Wicaksono', 'rizkypw', 'pw123');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jangka_waktu` int(11) DEFAULT NULL,
  `melahirkan` int(11) DEFAULT NULL,
  `menstruasi` int(11) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `penyakit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama`, `jangka_waktu`, `melahirkan`, `menstruasi`, `usia`, `penyakit`) VALUES
(16, 'Nisa', 2, 3, 5, 4, 1),
(17, 'Sujinem', 5, 1, 5, 4, 4),
(19, 'Elma', 5, 3, 3, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `log_hitung`
--

CREATE TABLE `log_hitung` (
  `id_loghitung` int(11) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_hitung`
--

INSERT INTO `log_hitung` (`id_loghitung`, `date`) VALUES
(1, '2021-11-26 17:29:42'),
(2, '2021-11-26 17:50:38'),
(3, '2021-11-26 17:52:24'),
(4, '2021-11-26 17:54:17'),
(5, '2021-11-26 17:54:35'),
(6, '2021-11-26 17:55:00'),
(7, '2021-11-26 17:55:29'),
(8, '2021-11-26 17:57:43'),
(9, '2021-11-26 17:57:49'),
(10, '2021-11-26 17:57:53'),
(11, '2021-11-26 17:57:56'),
(12, '2021-11-26 18:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `save_hitung`
--

CREATE TABLE `save_hitung` (
  `id_hitung` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nilai` decimal(20,1) DEFAULT NULL,
  `id_loghitung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `save_hitung`
--

INSERT INTO `save_hitung` (`id_hitung`, `nama`, `nilai`, `id_loghitung`) VALUES
(1, 'Nisa', '9.6', 1),
(2, 'Sujinem', '18.6', 1),
(3, 'Elma', '11.9', 1),
(4, 'Nisa', '9.6', 1),
(5, 'Sujinem', '18.6', 1),
(6, 'Elma', '11.9', 1),
(7, 'Nisa', '9.7', 3),
(8, 'Sujinem', '18.7', 3),
(9, 'Elma', '4.5', 3),
(10, 'Nisa', '9.7', 4),
(11, 'Sujinem', '18.7', 4),
(12, 'Elma', '4.5', 4),
(13, 'Nisa', '3.6', 5),
(14, 'Sujinem', '13.6', 5),
(15, 'Elma', '6.9', 5),
(16, 'Marlina', '-1.1', 5),
(17, 'Nisa', '3.6', 6),
(18, 'Sujinem', '13.6', 6),
(19, 'Elma', '6.9', 6),
(20, 'Marlina', '-1.1', 6),
(21, 'Nisa', '3.6', 7),
(22, 'Sujinem', '13.6', 7),
(23, 'Elma', '6.9', 7),
(24, 'Marlina', '-1.1', 7),
(25, 'Nisa', '3.6', 8),
(26, 'Sujinem', '13.6', 8),
(27, 'Elma', '6.9', 8),
(28, 'Marlina', '-1.1', 8),
(29, 'Nisa', '3.6', 9),
(30, 'Sujinem', '13.6', 9),
(31, 'Elma', '6.9', 9),
(32, 'Marlina', '-1.1', 9),
(33, 'Nisa', '3.6', 10),
(34, 'Sujinem', '13.6', 10),
(35, 'Elma', '6.9', 10),
(36, 'Marlina', '-1.1', 10),
(37, 'Nisa', '3.6', 11),
(38, 'Sujinem', '13.6', 11),
(39, 'Elma', '6.9', 11),
(40, 'Marlina', '-1.1', 11),
(41, 'Nisa', '2.2', 12),
(42, 'Sujinem', '12.2', 12),
(43, 'Elma', '4.2', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `log_hitung`
--
ALTER TABLE `log_hitung`
  ADD PRIMARY KEY (`id_loghitung`);

--
-- Indexes for table `save_hitung`
--
ALTER TABLE `save_hitung`
  ADD PRIMARY KEY (`id_hitung`),
  ADD KEY `id_loghitung` (`id_loghitung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `log_hitung`
--
ALTER TABLE `log_hitung`
  MODIFY `id_loghitung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `save_hitung`
--
ALTER TABLE `save_hitung`
  MODIFY `id_hitung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `save_hitung`
--
ALTER TABLE `save_hitung`
  ADD CONSTRAINT `save_hitung_ibfk_1` FOREIGN KEY (`id_loghitung`) REFERENCES `log_hitung` (`id_loghitung`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
