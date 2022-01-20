-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 08:30 AM
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
  `menyusui` int(11) DEFAULT NULL,
  `hamil` int(11) DEFAULT NULL,
  `ku` int(11) DEFAULT NULL,
  `radang` int(11) DEFAULT NULL,
  `keputihan` int(11) DEFAULT NULL,
  `kuning` int(11) DEFAULT NULL,
  `tumor` int(11) DEFAULT NULL,
  `bb` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama`, `menyusui`, `hamil`, `ku`, `radang`, `keputihan`, `kuning`, `tumor`, `bb`) VALUES
(1, 'dewi', 1, 3, 3, 3, 3, 3, 3, 2),
(2, 'diana', 3, 3, 3, 3, 3, 3, 3, 3),
(3, 'sanima', 3, 3, 3, 3, 3, 3, 3, 2),
(4, 'waliah', 3, 3, 3, 3, 3, 3, 3, 2),
(5, 'yuliani', 3, 3, 2, 3, 3, 3, 3, 1),
(6, 'anah', 3, 3, 3, 3, 3, 3, 3, 1),
(7, 'neneng', 3, 3, 3, 3, 3, 3, 3, 3),
(8, 'novi', 1, 3, 3, 3, 3, 3, 3, 2),
(9, 'nina', 3, 3, 2, 3, 3, 3, 3, 3),
(10, 'eti', 3, 3, 2, 3, 3, 3, 3, 3);

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
(3, '2022-01-20 14:13:03'),
(4, '2022-01-20 14:14:10'),
(5, '2022-01-20 14:16:00'),
(6, '2022-01-20 14:16:22'),
(7, '2022-01-20 14:19:15'),
(8, '2022-01-20 14:19:21'),
(9, '2022-01-20 14:20:53'),
(10, '2022-01-20 14:28:49'),
(11, '2022-01-20 14:29:50'),
(12, '2022-01-20 14:29:51'),
(13, '2022-01-20 14:29:57'),
(14, '2022-01-20 14:29:59');

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
(1, 'dewi', '-0.8', 3),
(2, 'diana', '1.7', 3),
(3, 'sanima', '1.2', 3),
(4, 'waliah', '1.2', 3),
(5, 'yuliani', '-1.3', 3),
(6, 'anah', '-0.3', 3),
(7, 'neneng', '1.7', 3),
(8, 'novi', '-0.8', 3),
(9, 'nina', '0.7', 3),
(10, 'eti', '0.7', 3),
(11, 'dewi', '-0.8', 4),
(12, 'diana', '1.7', 4),
(13, 'sanima', '1.2', 4),
(14, 'waliah', '1.2', 4),
(15, 'yuliani', '-1.3', 4),
(16, 'anah', '-0.3', 4),
(17, 'neneng', '1.7', 4),
(18, 'novi', '-0.8', 4),
(19, 'nina', '0.7', 4),
(20, 'eti', '0.7', 4),
(21, 'dewi', '-0.8', 5),
(22, 'diana', '1.7', 5),
(23, 'sanima', '1.2', 5),
(24, 'waliah', '1.2', 5),
(25, 'yuliani', '-1.3', 5),
(26, 'anah', '-0.3', 5),
(27, 'neneng', '1.7', 5),
(28, 'novi', '-0.8', 5),
(29, 'nina', '0.7', 5),
(30, 'dewi', '-1.3', 6),
(31, 'diana', '1.2', 6),
(32, 'sanima', '0.7', 6),
(33, 'waliah', '0.7', 6),
(34, 'anah', '-0.8', 6),
(35, 'neneng', '1.2', 6),
(36, 'nina', '0.2', 6),
(37, 'dewi', '-1.3', 7),
(38, 'diana', '1.2', 7),
(39, 'sanima', '0.7', 7),
(40, 'waliah', '0.7', 7),
(41, 'anah', '-0.8', 7),
(42, 'neneng', '1.2', 7),
(43, 'nina', '0.2', 7),
(44, 'dewi', '-1.3', 8),
(45, 'diana', '1.2', 8),
(46, 'sanima', '0.7', 8),
(47, 'waliah', '0.7', 8),
(48, 'anah', '-0.8', 8),
(49, 'neneng', '1.2', 8),
(50, 'nina', '0.2', 8),
(51, 'dewi', '-0.8', 9),
(52, 'diana', '1.7', 9),
(53, 'sanima', '1.2', 9),
(54, 'waliah', '1.2', 9),
(55, 'yuliani', '-1.3', 9),
(56, 'anah', '-0.3', 9),
(57, 'neneng', '1.7', 9),
(58, 'novi', '-0.8', 9),
(59, 'nina', '0.7', 9),
(60, 'eti', '0.7', 9),
(61, 'dewi', '-0.8', 10),
(62, 'diana', '1.7', 10),
(63, 'sanima', '1.2', 10),
(64, 'waliah', '1.2', 10),
(65, 'yuliani', '-1.3', 10),
(66, 'anah', '-0.3', 10),
(67, 'neneng', '1.7', 10),
(68, 'novi', '-0.8', 10),
(69, 'nina', '0.7', 10),
(70, 'eti', '0.7', 10),
(71, 'dewi', '-0.8', 11),
(72, 'diana', '1.7', 11),
(73, 'sanima', '1.2', 11),
(74, 'waliah', '1.2', 11),
(75, 'yuliani', '-1.3', 11),
(76, 'anah', '-0.3', 11),
(77, 'neneng', '1.7', 11),
(78, 'novi', '-0.8', 11),
(79, 'nina', '0.7', 11),
(80, 'eti', '0.7', 11),
(81, 'dewi', '-0.8', 12),
(82, 'diana', '1.7', 12),
(83, 'sanima', '1.2', 12),
(84, 'waliah', '1.2', 12),
(85, 'yuliani', '-1.3', 12),
(86, 'anah', '-0.3', 12),
(87, 'neneng', '1.7', 12),
(88, 'novi', '-0.8', 12),
(89, 'nina', '0.7', 12),
(90, 'eti', '0.7', 12),
(91, 'dewi', '-0.8', 13),
(92, 'diana', '1.7', 13),
(93, 'sanima', '1.2', 13),
(94, 'waliah', '1.2', 13),
(95, 'yuliani', '-1.3', 13),
(96, 'anah', '-0.3', 13),
(97, 'neneng', '1.7', 13),
(98, 'novi', '-0.8', 13),
(99, 'nina', '0.7', 13),
(100, 'eti', '0.7', 13),
(101, 'dewi', '-0.8', 14),
(102, 'diana', '1.7', 14),
(103, 'sanima', '1.2', 14),
(104, 'waliah', '1.2', 14),
(105, 'yuliani', '-1.3', 14),
(106, 'anah', '-0.3', 14),
(107, 'neneng', '1.7', 14),
(108, 'novi', '-0.8', 14),
(109, 'nina', '0.7', 14),
(110, 'eti', '0.7', 14);

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
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `log_hitung`
--
ALTER TABLE `log_hitung`
  MODIFY `id_loghitung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `save_hitung`
--
ALTER TABLE `save_hitung`
  MODIFY `id_hitung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

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
