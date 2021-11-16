-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 10:10 AM
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
(1, 'maemunah', 5, 1, 5, 2, 2),
(2, 'siti', 2, 1, 5, 4, 5),
(3, 'funi', 5, 1, 3, 2, 4),
(4, 'iis', 2, 3, 3, 2, 3),
(5, 'lisa', 2, 3, 5, 4, 2),
(6, 'maria', 2, 3, 5, 5, 3),
(7, 'elsa', 2, 1, 3, 3, 3),
(8, 'gisel', 5, 3, 3, 5, 5),
(9, 'ratu', 5, 3, 5, 2, 1),
(10, 'inem', 2, 1, 5, 4, 4),
(11, 'Sujinem', 5, 3, 3, 4, 2),
(12, 'Juju', 2, 3, 3, 2, 5),
(13, 'Mega', 2, 3, 5, 4, 2);

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
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
