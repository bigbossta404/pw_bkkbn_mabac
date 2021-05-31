-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2021 at 04:10 PM
-- Server version: 10.3.29-MariaDB-log-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desitisc_autism`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `profile` varchar(120) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`id_user`, `nama`, `email`, `username`, `password`, `profile`, `active`, `role`) VALUES
(1, 'Fanny Vega Variant', 'fannyvegant@gmail.com', 'fannyvt', 'fanny123', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dataset`
--

CREATE TABLE `dataset` (
  `id_dataset` int(11) NOT NULL,
  `A1_Score` int(8) DEFAULT NULL,
  `A2_Score` int(8) DEFAULT NULL,
  `A3_Score` int(8) DEFAULT NULL,
  `A4_Score` int(8) DEFAULT NULL,
  `A5_Score` int(8) DEFAULT NULL,
  `A6_Score` int(8) DEFAULT NULL,
  `A7_Score` int(8) DEFAULT NULL,
  `A8_Score` int(8) DEFAULT NULL,
  `A9_Score` int(8) DEFAULT NULL,
  `A10_Score` int(9) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `ethnicity` varchar(15) DEFAULT NULL,
  `jundice` varchar(7) DEFAULT NULL,
  `autism` varchar(6) DEFAULT NULL,
  `contry_of_res` varchar(21) DEFAULT NULL,
  `used_app_before` varchar(15) DEFAULT NULL,
  `result` int(6) DEFAULT NULL,
  `age_desc` varchar(10) DEFAULT NULL,
  `relation` varchar(24) DEFAULT NULL,
  `Class` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dataset`
--

INSERT INTO `dataset` (`id_dataset`, `A1_Score`, `A2_Score`, `A3_Score`, `A4_Score`, `A5_Score`, `A6_Score`, `A7_Score`, `A8_Score`, `A9_Score`, `A10_Score`, `age`, `gender`, `ethnicity`, `jundice`, `autism`, `contry_of_res`, `used_app_before`, `result`, `age_desc`, `relation`, `Class`) VALUES
(1, 1, 1, 0, 0, 1, 1, 0, 1, 0, 0, 6, 'm', 'Others', 'no', 'no', 'Jordan', 'no', 5, '4-11 years', 'Parent', 'NO'),
(2, 1, 1, 0, 0, 1, 1, 0, 1, 0, 0, 6, 'm', 'Middle Eastern ', 'no', 'no', 'Jordan', 'no', 5, '4-11 years', 'Parent', 'NO'),
(3, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 6, 'm', '?', 'no', 'no', 'Jordan', 'yes', 5, '4-11 years', '?', 'NO'),
(4, 0, 1, 0, 0, 1, 1, 0, 0, 0, 1, 5, 'f', '?', 'yes', 'no', 'Jordan', 'no', 4, '4-11 years', '?', 'NO'),
(5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 5, 'm', 'Others', 'yes', 'no', 'United States', 'no', 10, '4-11 years', 'Parent', 'YES'),
(6, 0, 0, 1, 0, 1, 1, 0, 1, 0, 1, 4, 'm', '?', 'no', 'yes', 'Egypt', 'no', 5, '4-11 years', '?', 'NO'),
(7, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 5, 'm', 'White-European', 'no', 'no', 'United Kingdom', 'no', 7, '4-11 years', 'Parent', 'YES'),
(8, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 5, 'f', 'Middle Eastern ', 'no', 'no', 'Bahrain', 'no', 8, '4-11 years', 'Parent', 'YES'),
(9, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 11, 'f', 'Middle Eastern ', 'no', 'no', 'Bahrain', 'no', 7, '4-11 years', 'Parent', 'YES'),
(10, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 11, 'f', '?', 'no', 'yes', 'Austria', 'no', 5, '4-11 years', '?', 'NO'),
(11, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 10, 'm', 'White-European', 'yes', 'no', 'United Kingdom', 'no', 7, '4-11 years', 'Self', 'YES'),
(12, 0, 1, 0, 0, 1, 0, 0, 0, 0, 1, 5, 'f', '?', 'no', 'no', 'Kuwait', 'no', 3, '4-11 years', '?', 'NO'),
(13, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'm', 'White-European', 'yes', 'no', 'United States', 'no', 9, '4-11 years', 'Parent', 'YES'),
(14, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 4, 'f', 'Black', 'no', 'no', 'United Arab Emirates', 'no', 2, '4-11 years', 'Parent', 'NO'),
(15, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 6, 'm', 'White-European', 'no', 'no', 'Europe', 'no', 10, '4-11 years', 'Parent', 'YES'),
(16, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 8, 'm', 'White-European', 'no', 'no', 'Malta', 'no', 10, '4-11 years', 'Parent', 'YES'),
(17, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 4, 'm', 'South Asian', 'no', 'no', 'Bulgaria', 'no', 9, '4-11 years', 'Parent', 'YES'),
(18, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 7, 'm', 'Others', 'no', 'no', 'United States', 'no', 1, '4-11 years', 'Parent', 'NO'),
(19, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 11, 'm', 'White-European', 'no', 'yes', 'United States', 'no', 8, '4-11 years', 'Parent', 'YES'),
(20, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 5, 'm', '?', 'no', 'no', 'Egypt', 'no', 8, '4-11 years', '?', 'YES'),
(21, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 5, 'm', 'White-European', 'yes', 'no', 'South Africa', 'no', 8, '4-11 years', 'Parent', 'YES'),
(22, 0, 0, 1, 1, 0, 1, 0, 1, 1, 0, 9, 'f', '?', 'no', 'no', 'Egypt', 'no', 5, '4-11 years', '?', 'NO'),
(23, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 4, 'm', 'Asian', 'no', 'no', 'India', 'no', 3, '4-11 years', 'Parent', 'NO'),
(24, 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 6, 'f', 'South Asian', 'no', 'no', 'India', 'no', 5, '4-11 years', 'Parent', 'NO'),
(25, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 11, 'm', '?', 'no', 'no', 'Egypt', 'no', 8, '4-11 years', '?', 'YES'),
(26, 0, 0, 1, 1, 1, 0, 1, 1, 1, 0, 6, 'm', 'White-European', 'no', 'yes', 'United Kingdom', 'no', 6, '4-11 years', 'Relative', 'NO'),
(27, 1, 0, 1, 0, 1, 1, 0, 0, 1, 1, 6, 'f', 'Middle Eastern ', 'no', 'no', 'Afghanistan', 'no', 6, '4-11 years', 'Self', 'NO'),
(28, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 5, 'm', 'White-European', 'yes', 'no', 'United States', 'yes', 10, '4-11 years', 'Parent', 'YES'),
(29, 0, 1, 1, 0, 0, 0, 1, 1, 0, 1, 6, 'm', '?', 'no', 'yes', 'United Arab Emirates', 'no', 5, '4-11 years', '?', 'NO'),
(30, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 4, 'f', 'Others', 'yes', 'yes', 'Georgia', 'no', 3, '4-11 years', 'Parent', 'NO'),
(31, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 11, 'm', 'White-European', 'no', 'no', 'United Kingdom', 'no', 10, '4-11 years', 'Parent', 'YES'),
(32, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 6, 'm', 'Pasifika', 'yes', 'no', 'New Zealand', 'no', 4, '4-11 years', 'Parent', 'NO'),
(33, 1, 0, 0, 1, 0, 1, 1, 1, 1, 1, 6, 'm', '?', 'no', 'no', 'Egypt', 'no', 7, '4-11 years', '?', 'YES'),
(34, 1, 0, 0, 0, 1, 1, 0, 1, 0, 1, 5, 'm', 'South Asian', 'yes', 'no', 'India', 'no', 5, '4-11 years', 'Health care professional', 'NO'),
(35, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1, 6, 'm', 'South Asian', 'yes', 'no', 'India', 'no', 5, '4-11 years', 'Parent', 'NO'),
(36, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 7, 'f', 'Middle Eastern ', 'yes', 'no', 'Syria', 'no', 1, '4-11 years', 'Parent', 'NO'),
(37, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 4, 'f', '?', 'no', 'no', 'Syria', 'no', 3, '4-11 years', '?', 'NO'),
(38, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 7, 'm', 'Asian', 'no', 'no', 'New Zealand', 'no', 2, '4-11 years', 'Parent', 'NO'),
(39, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'm', 'White-European', 'yes', 'no', 'United Kingdom', 'no', 10, '4-11 years', 'Parent', 'YES'),
(40, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 4, 'm', 'Asian', 'no', 'no', 'India', 'no', 8, '4-11 years', 'Parent', 'YES'),
(41, 0, 0, 1, 1, 1, 1, 0, 1, 0, 1, 5, 'm', '?', 'yes', 'no', 'Jordan', 'no', 6, '4-11 years', '?', 'NO'),
(42, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 4, 'm', 'Middle Eastern ', 'no', 'no', 'Afghanistan', 'no', 1, '4-11 years', 'Parent', 'NO'),
(43, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 6, 'f', 'Middle Eastern ', 'no', 'no', 'Jordan', 'no', 4, '4-11 years', 'Parent', 'NO'),
(44, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 4, 'f', '?', 'no', 'no', 'Jordan', 'no', 8, '4-11 years', '?', 'YES'),
(45, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 10, 'm', 'Middle Eastern ', 'no', 'no', 'Jordan', 'no', 2, '4-11 years', 'Parent', 'NO'),
(46, 0, 1, 1, 0, 1, 1, 0, 0, 0, 1, 4, 'f', 'Middle Eastern ', 'yes', 'no', 'Iraq', 'no', 5, '4-11 years', 'Relative', 'NO'),
(47, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0, 4, 'f', 'Middle Eastern ', 'yes', 'no', 'Iraq', 'no', 4, '4-11 years', 'Relative', 'NO'),
(48, 1, 1, 1, 0, 1, 0, 1, 1, 0, 1, 6, 'm', '?', 'no', 'no', 'Jordan', 'no', 7, '4-11 years', '?', 'YES'),
(49, 1, 0, 1, 1, 1, 1, 0, 0, 1, 1, 6, 'f', 'White-European', 'yes', 'no', 'New Zealand', 'no', 7, '4-11 years', 'Parent', 'YES'),
(50, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 7, 'm', 'Middle Eastern ', 'no', 'yes', 'Jordan', 'no', 2, '4-11 years', 'Parent', 'NO'),
(51, 0, 1, 0, 0, 1, 0, 1, 0, 0, 1, 7, 'm', '?', 'yes', 'no', 'Jordan', 'no', 4, '4-11 years', '?', 'NO'),
(52, 0, 0, 1, 0, 1, 1, 1, 0, 1, 1, 4, 'm', 'Asian', 'no', 'no', 'India', 'no', 6, '4-11 years', 'Parent', 'NO'),
(53, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 6, 'm', '?', 'no', 'no', 'Jordan', 'no', 6, '4-11 years', '?', 'NO'),
(54, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 7, 'm', 'White-European', 'yes', 'no', 'United States', 'no', 9, '4-11 years', 'Parent', 'YES'),
(55, 1, 0, 1, 1, 0, 1, 0, 0, 0, 1, 5, 'm', '?', 'no', 'no', 'United Arab Emirates', 'no', 5, '4-11 years', '?', 'NO'),
(56, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 5, 'm', 'White-European', 'no', 'no', 'Australia', 'no', 2, '4-11 years', 'Parent', 'NO'),
(57, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 6, 'm', '?', 'no', 'no', 'Saudi Arabia', 'no', 2, '4-11 years', '?', 'NO'),
(58, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'f', 'White-European', 'no', 'no', 'Georgia', 'no', 9, '4-11 years', 'Parent', 'YES'),
(59, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 9, 'f', 'Middle Eastern ', 'no', 'no', 'Armenia', 'no', 8, '4-11 years', 'Health care professional', 'YES'),
(60, 1, 0, 1, 1, 1, 1, 0, 0, 1, 1, 4, 'm', 'Hispanic', 'no', 'yes', 'United States', 'no', 7, '4-11 years', 'Parent', 'YES'),
(61, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 4, 'm', 'Turkish', 'no', 'no', 'Turkey', 'no', 3, '4-11 years', 'Relative', 'NO'),
(62, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 9, 'm', 'White-European', 'no', 'no', 'United States', 'no', 9, '4-11 years', 'Parent', 'YES'),
(63, 1, 1, 1, 0, 1, 1, 0, 0, 0, 1, 4, 'f', 'White-European', 'yes', 'no', 'Australia', 'no', 6, '4-11 years', 'Parent', 'NO'),
(64, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 9, 'm', 'Asian', 'yes', 'no', 'Pakistan', 'no', 9, '4-11 years', 'Parent', 'YES'),
(65, 1, 0, 1, 1, 0, 0, 0, 1, 0, 1, 8, 'm', 'Middle Eastern ', 'no', 'no', 'United States', 'no', 5, '4-11 years', 'Parent', 'NO'),
(66, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 6, 'm', 'Middle Eastern ', 'no', 'no', 'Jordan', 'no', 1, '4-11 years', 'Parent', 'NO'),
(67, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 4, 'm', 'White-European', 'no', 'no', 'United Kingdom', 'no', 3, '4-11 years', 'Parent', 'NO'),
(68, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 4, 'm', 'White-European', 'no', 'no', 'United Kingdom', 'no', 4, '4-11 years', 'Parent', 'NO'),
(69, 0, 0, 1, 0, 1, 1, 1, 0, 1, 0, 4, 'f', '?', 'no', 'yes', 'Pakistan', 'no', 5, '4-11 years', '?', 'NO'),
(70, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'm', 'White-European', 'no', 'yes', 'Canada', 'no', 9, '4-11 years', 'Parent', 'YES'),
(71, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 7, 'm', 'Asian', 'no', 'no', 'Oman', 'no', 5, '4-11 years', 'Parent', 'NO'),
(72, 0, 1, 0, 0, 1, 0, 1, 0, 0, 1, 7, 'f', 'White-European', 'yes', 'no', 'United Kingdom', 'no', 4, '4-11 years', 'Parent', 'NO'),
(73, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 6, 'm', 'South Asian', 'no', 'no', 'India', 'no', 7, '4-11 years', 'Parent', 'YES'),
(74, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 5, 'f', 'Middle Eastern ', 'no', 'no', 'Canada', 'no', 8, '4-11 years', 'Parent', 'YES'),
(75, 1, 0, 1, 1, 1, 1, 0, 0, 1, 1, 8, 'f', 'Middle Eastern ', 'no', 'yes', 'Canada', 'no', 7, '4-11 years', 'Parent', 'YES'),
(76, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 5, 'm', 'White-European', 'no', 'no', 'United Kingdom', 'no', 6, '4-11 years', 'Parent', 'NO'),
(77, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 11, 'f', 'Others', 'no', 'no', 'Canada', 'no', 9, '4-11 years', 'Parent', 'YES'),
(78, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 8, 'm', 'White-European', 'yes', 'no', 'New Zealand', 'no', 4, '4-11 years', 'Parent', 'NO'),
(79, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 4, 'm', 'Latino', 'no', 'yes', 'Brazil', 'no', 9, '4-11 years', 'Parent', 'YES'),
(80, 0, 1, 1, 1, 0, 1, 0, 1, 1, 0, 7, 'm', 'White-European', 'yes', 'no', 'New Zealand', 'no', 6, '4-11 years', 'Parent', 'NO'),
(81, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 4, 'm', 'White-European', 'no', 'no', 'New Zealand', 'no', 3, '4-11 years', 'Parent', 'NO'),
(82, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 7, 'm', 'White-European', 'yes', 'yes', 'New Zealand', 'no', 9, '4-11 years', 'Parent', 'YES'),
(83, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 8, 'm', 'White-European', 'no', 'no', 'United States', 'no', 8, '4-11 years', 'Parent', 'YES'),
(84, 0, 1, 1, 0, 1, 1, 0, 0, 0, 1, 5, 'm', 'Asian', 'no', 'no', 'South Korea', 'no', 5, '4-11 years', 'Parent', 'NO'),
(85, 0, 0, 1, 0, 1, 1, 1, 0, 1, 1, 4, 'm', 'Asian', 'no', 'no', 'India', 'no', 6, '4-11 years', 'Parent', 'NO'),
(86, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 11, 'f', 'White-European', 'no', 'no', 'United Kingdom', 'no', 9, '4-11 years', 'Parent', 'YES'),
(87, 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, 11, 'f', 'White-European', 'no', 'no', 'United Kingdom', 'no', 7, '4-11 years', 'Parent', 'YES'),
(88, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'm', 'White-European', 'no', 'no', 'South Africa', 'no', 10, '4-11 years', 'Parent', 'YES'),
(89, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 5, 'm', 'Latino', 'no', 'yes', 'Costa Rica', 'no', 5, '4-11 years', 'Parent', 'NO'),
(90, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 6, 'm', 'Hispanic', 'no', 'no', 'United States', 'no', 9, '4-11 years', 'Parent', 'YES'),
(91, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 4, 'f', 'White-European', 'no', 'no', 'Australia', 'no', 8, '4-11 years', 'Parent', 'YES'),
(92, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 11, 'f', 'White-European', 'yes', 'yes', 'United Kingdom', 'no', 5, '4-11 years', 'Relative', 'NO'),
(93, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 5, 'm', 'Asian', 'no', 'no', 'India', 'no', 8, '4-11 years', 'Parent', 'YES'),
(94, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 5, 'm', 'Asian', 'no', 'no', 'India', 'no', 8, '4-11 years', 'Parent', 'YES'),
(95, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 6, 'm', 'Latino', 'no', 'no', 'United States', 'no', 10, '4-11 years', 'Parent', 'YES'),
(96, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 7, 'm', 'Hispanic', 'no', 'no', 'United States', 'no', 7, '4-11 years', 'Parent', 'YES'),
(97, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 11, 'm', 'White-European', 'no', 'no', 'Sweden', 'no', 8, '4-11 years', 'Parent', 'YES'),
(98, 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 4, 'm', 'White-European', 'no', 'no', 'Australia', 'no', 8, '4-11 years', 'Parent', 'YES'),
(99, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 4, 'm', 'White-European', 'no', 'yes', 'United States', 'no', 8, '4-11 years', 'Parent', 'YES'),
(100, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 7, 'm', 'White-European', 'no', 'yes', 'United States', 'no', 2, '4-11 years', 'Parent', 'NO'),
(101, 1, 1, 0, 1, 0, 1, 1, 0, 1, 0, 11, 'f', 'White-European', 'yes', 'yes', 'United Kingdom', 'no', 6, '4-11 years', 'Relative', 'NO'),
(102, 1, 1, 1, 1, 0, 1, 1, 0, 0, 1, 6, 'f', 'Asian', 'no', 'no', 'Philippines', 'no', 7, '4-11 years', 'Parent', 'YES'),
(103, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 9, 'f', 'White-European', 'no', 'no', 'United Kingdom', 'no', 2, '4-11 years', 'Parent', 'NO'),
(104, 0, 1, 0, 1, 0, 1, 0, 0, 1, 1, 10, 'm', 'Others', 'no', 'no', 'United States', 'no', 5, '4-11 years', 'Relative', 'NO'),
(105, 0, 0, 0, 0, 1, 1, 1, 0, 0, 1, 4, 'm', 'Asian', 'no', 'yes', 'Malaysia', 'no', 4, '4-11 years', 'Parent', 'NO'),
(106, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 4, 'm', 'Asian', 'yes', 'no', 'Philippines', 'no', 8, '4-11 years', 'Parent', 'YES'),
(107, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 10, 'm', 'White-European', 'yes', 'no', 'United Kingdom', 'no', 8, '4-11 years', 'Parent', 'YES'),
(108, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 4, 'f', 'White-European', 'yes', 'yes', 'United Kingdom', 'no', 3, '4-11 years', 'Parent', 'NO'),
(109, 0, 1, 0, 0, 0, 1, 1, 1, 0, 0, 11, 'm', 'Asian', 'no', 'no', 'Argentina', 'no', 4, '4-11 years', 'Parent', 'NO'),
(110, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 7, 'm', 'Asian', 'no', 'no', 'Japan', 'no', 3, '4-11 years', 'Parent', 'NO'),
(111, 0, 1, 1, 1, 1, 0, 1, 1, 0, 1, 5, 'm', '?', 'no', 'no', 'Syria', 'no', 7, '4-11 years', '?', 'YES'),
(112, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 4, 'f', 'White-European', 'no', 'no', 'United States', 'no', 3, '4-11 years', 'Parent', 'NO'),
(113, 0, 0, 1, 1, 1, 1, 0, 1, 1, 1, 8, 'm', 'White-European', 'no', 'no', 'United States', 'no', 7, '4-11 years', 'Parent', 'YES'),
(114, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 4, 'm', 'White-European', 'no', 'no', 'Australia', 'no', 9, '4-11 years', 'Parent', 'YES'),
(115, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 4, 'm', 'South Asian', 'no', 'no', 'India', 'no', 6, '4-11 years', 'Parent', 'NO'),
(116, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 11, 'm', 'Asian', 'yes', 'no', 'India', 'no', 10, '4-11 years', 'Relative', 'YES'),
(117, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 10, 'f', 'Asian', 'no', 'no', 'United States', 'no', 9, '4-11 years', 'Parent', 'YES'),
(118, 1, 1, 0, 1, 0, 1, 0, 0, 1, 1, 6, 'f', 'White-European', 'no', 'no', 'United States', 'no', 6, '4-11 years', 'Parent', 'NO'),
(119, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 4, 'm', 'Asian', 'no', 'no', 'Bangladesh', 'no', 6, '4-11 years', 'Relative', 'NO'),
(120, 0, 1, 1, 0, 1, 0, 0, 0, 0, 1, 4, 'm', 'Asian', 'no', 'yes', 'Bangladesh', 'no', 4, '4-11 years', 'Parent', 'NO'),
(121, 0, 1, 1, 1, 0, 1, 0, 1, 1, 1, 4, 'm', 'Asian', 'no', 'no', 'Bangladesh', 'no', 7, '4-11 years', 'Relative', 'YES'),
(122, 0, 0, 1, 1, 0, 0, 1, 1, 1, 0, 10, 'm', 'White-European', 'no', 'no', 'United States', 'no', 5, '4-11 years', 'Parent', 'NO'),
(123, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 7, 'm', 'White-European', 'no', 'no', 'United Kingdom', 'no', 10, '4-11 years', 'Relative', 'YES'),
(124, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0, 4, 'm', '?', 'yes', 'no', 'Qatar', 'no', 5, '4-11 years', '?', 'NO'),
(125, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 6, 'f', 'White-European', 'yes', 'no', 'Ireland', 'no', 8, '4-11 years', 'Parent', 'YES'),
(126, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 5, 'm', 'Asian', 'no', 'no', 'India', 'no', 8, '4-11 years', 'Parent', 'YES'),
(127, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1, 6, 'm', '?', 'yes', 'no', 'Jordan', 'no', 7, '4-11 years', '?', 'YES'),
(128, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 4, 'f', 'Asian', 'yes', 'no', 'United Kingdom', 'no', 7, '4-11 years', 'Parent', 'YES'),
(129, 1, 0, 1, 0, 1, 1, 1, 1, 0, 0, 9, 'm', 'Asian', 'no', 'no', 'India', 'yes', 6, '4-11 years', 'Parent', 'NO'),
(130, 1, 0, 1, 1, 0, 1, 1, 1, 0, 1, 4, 'f', 'White-European', 'yes', 'no', 'United States', 'no', 7, '4-11 years', 'Parent', 'YES'),
(131, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 10, 'm', 'White-European', 'no', 'no', 'New Zealand', 'yes', 9, '4-11 years', 'Parent', 'YES'),
(132, 1, 1, 0, 0, 0, 0, 1, 0, 0, 1, 9, 'm', 'White-European', 'no', 'no', 'New Zealand', 'no', 4, '4-11 years', 'Parent', 'NO'),
(133, 0, 1, 1, 1, 1, 1, 0, 0, 0, 1, 5, 'm', 'White-European', 'yes', 'yes', 'United Kingdom', 'no', 6, '4-11 years', 'Parent', 'NO'),
(134, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 4, 'f', 'Black', 'no', 'no', 'Canada', 'no', 5, '4-11 years', 'Parent', 'NO'),
(135, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 4, 'm', 'White-European', 'no', 'yes', 'United Kingdom', 'no', 9, '4-11 years', 'Parent', 'YES'),
(136, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 6, 'm', 'White-European', 'no', 'no', 'Romania', 'no', 5, '4-11 years', 'Parent', 'NO'),
(137, 1, 1, 1, 0, 1, 0, 1, 0, 1, 1, 4, 'f', 'White-European', 'yes', 'no', 'United Kingdom', 'no', 7, '4-11 years', 'Parent', 'YES'),
(138, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 'f', 'Hispanic', 'no', 'no', 'United States', 'no', 0, '4-11 years', 'Parent', 'NO'),
(139, 0, 1, 1, 0, 1, 1, 1, 1, 0, 0, 6, 'm', '?', 'yes', 'no', 'Qatar', 'yes', 6, '4-11 years', '?', 'NO'),
(140, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 9, 'm', 'White-European', 'yes', 'yes', 'United Kingdom', 'no', 10, '4-11 years', 'Parent', 'YES'),
(141, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 7, 'f', 'White-European', 'no', 'no', 'Australia', 'no', 8, '4-11 years', 'Parent', 'YES'),
(142, 0, 1, 1, 0, 0, 1, 1, 1, 0, 1, 10, 'f', 'White-European', 'no', 'no', 'Netherlands', 'no', 6, '4-11 years', 'Parent', 'NO'),
(143, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 4, 'm', 'South Asian', 'no', 'no', 'India', 'no', 7, '4-11 years', 'Parent', 'YES'),
(144, 1, 0, 1, 1, 0, 1, 1, 1, 0, 1, 4, 'm', 'Asian', 'no', 'no', 'India', 'no', 7, '4-11 years', 'Relative', 'YES'),
(145, 1, 1, 0, 1, 1, 1, 1, 0, 0, 0, 7, 'f', 'White-European', 'no', 'no', 'United Kingdom', 'no', 6, '4-11 years', 'Parent', 'NO'),
(146, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 4, 'm', 'Black', 'yes', 'no', 'United States', 'no', 9, '4-11 years', 'Parent', 'YES'),
(147, 0, 1, 1, 0, 1, 0, 1, 0, 0, 1, 4, 'm', '?', 'yes', 'no', 'Lebanon', 'no', 5, '4-11 years', '?', 'NO'),
(148, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 10, 'm', 'White-European', 'no', 'no', 'Germany', 'no', 9, '4-11 years', 'Health care professional', 'YES'),
(149, 0, 0, 1, 0, 1, 1, 0, 1, 1, 1, 4, 'm', 'Asian', 'no', 'no', 'India', 'no', 6, '4-11 years', 'Parent', 'NO'),
(150, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 4, 'm', '?', 'no', 'no', 'Latvia', 'yes', 3, '4-11 years', '?', 'NO'),
(151, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 4, 'm', 'South Asian', 'no', 'yes', 'Saudi Arabia', 'no', 7, '4-11 years', 'Parent', 'YES'),
(152, 1, 0, 1, 0, 1, 1, 0, 1, 1, 1, 4, 'm', 'Black', 'no', 'yes', 'United States', 'no', 7, '4-11 years', 'Parent', 'YES'),
(153, 0, 1, 1, 0, 0, 0, 1, 1, 1, 1, 7, 'm', 'White-European', 'yes', 'no', 'United States', 'no', 6, '4-11 years', 'Parent', 'NO'),
(154, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 4, 'm', 'White-European', 'no', 'no', 'United States', 'no', 9, '4-11 years', 'Parent', 'YES'),
(155, 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 5, 'f', 'White-European', 'no', 'no', 'New Zealand', 'no', 8, '4-11 years', 'Parent', 'YES'),
(156, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 6, 'm', 'Others', 'yes', 'no', 'United Kingdom', 'no', 9, '4-11 years', 'Parent', 'YES'),
(157, 0, 1, 0, 0, 0, 1, 1, 1, 1, 1, 6, 'f', 'Asian', 'no', 'no', 'United Kingdom', 'no', 6, '4-11 years', 'Parent', 'NO'),
(158, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 6, 'f', 'White-European', 'no', 'yes', 'United Kingdom', 'no', 8, '4-11 years', 'Parent', 'YES'),
(159, 0, 1, 0, 1, 1, 1, 1, 0, 1, 1, 9, 'm', 'White-European', 'no', 'yes', 'United Kingdom', 'no', 7, '4-11 years', 'Parent', 'YES'),
(160, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 8, 'm', 'White-European', 'no', 'no', 'United Kingdom', 'no', 10, '4-11 years', 'Parent', 'YES'),
(161, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 11, 'm', '?', 'no', 'no', 'Jordan', 'no', 7, '4-11 years', '?', 'YES'),
(162, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 9, 'm', 'White-European', 'no', 'no', 'Australia', 'no', 7, '4-11 years', 'Parent', 'YES'),
(163, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 9, 'f', 'White-European', 'no', 'yes', 'United Kingdom', 'no', 3, '4-11 years', 'Parent', 'NO'),
(164, 1, 0, 0, 1, 1, 1, 1, 0, 1, 1, 7, 'm', 'Black', 'no', 'no', 'United States', 'no', 7, '4-11 years', 'Parent', 'YES'),
(165, 0, 0, 1, 0, 0, 1, 1, 0, 0, 1, 4, 'm', 'Asian', 'no', 'no', 'India', 'no', 4, '4-11 years', 'Relative', 'NO'),
(166, 1, 0, 0, 0, 1, 1, 1, 0, 0, 1, 10, 'f', 'Others', 'no', 'no', 'Australia', 'no', 5, '4-11 years', 'Self', 'NO'),
(167, 0, 0, 0, 0, 1, 0, 1, 1, 0, 1, 8, 'm', 'Middle Eastern ', 'no', 'no', 'United Arab Emirates', 'no', 4, '4-11 years', 'Parent', 'NO'),
(168, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 6, 'm', 'Others', 'no', 'no', 'Australia', 'no', 8, '4-11 years', 'Parent', 'YES'),
(169, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 8, 'm', '?', 'yes', 'no', 'Russia', 'no', 8, '4-11 years', '?', 'YES'),
(170, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 11, 'f', 'White-European', 'no', 'no', 'Austria', 'no', 9, '4-11 years', 'Parent', 'YES'),
(171, 1, 1, 1, 0, 1, 0, 1, 0, 0, 0, 5, 'f', 'White-European', 'no', 'no', 'Italy', 'no', 5, '4-11 years', 'Parent', 'NO'),
(172, 0, 0, 1, 0, 1, 0, 1, 0, 0, 1, 4, 'f', 'White-European', 'no', 'yes', 'Australia', 'no', 4, '4-11 years', 'Relative', 'NO'),
(173, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 11, 'm', 'White-European', 'no', 'no', 'Australia', 'no', 10, '4-11 years', 'Parent', 'YES'),
(174, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1, 11, 'f', 'Others', 'yes', 'no', 'United Kingdom', 'no', 5, '4-11 years', 'Self', 'NO'),
(175, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0, 4, 'm', '?', 'yes', 'no', 'Qatar', 'yes', 5, '4-11 years', '?', 'NO'),
(176, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 8, 'm', 'White-European', 'no', 'no', 'United Kingdom', 'no', 4, '4-11 years', 'Parent', 'NO'),
(177, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 8, 'm', 'White-European', 'no', 'no', 'United Kingdom', 'yes', 4, '4-11 years', 'Parent', 'NO'),
(178, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 9, 'm', 'White-European', 'no', 'no', 'United Kingdom', 'no', 10, '4-11 years', 'Parent', 'YES'),
(179, 0, 0, 0, 1, 0, 1, 0, 0, 1, 1, 4, 'm', 'Asian', 'no', 'no', 'Bangladesh', 'no', 4, '4-11 years', 'Parent', 'NO'),
(180, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 4, 'm', 'Asian', 'no', 'no', 'Bangladesh', 'no', 7, '4-11 years', 'Parent', 'YES'),
(181, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 4, 'f', '?', 'yes', 'no', 'China', 'no', 8, '4-11 years', '?', 'YES'),
(182, 0, 1, 1, 0, 1, 0, 1, 0, 0, 0, 4, 'f', '?', 'no', 'no', 'Pakistan', 'no', 4, '4-11 years', '?', 'NO'),
(183, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 11, 'm', 'Hispanic', 'no', 'no', 'United States', 'yes', 8, '4-11 years', 'self', 'YES'),
(184, 0, 1, 1, 1, 0, 1, 0, 0, 0, 1, 10, 'f', 'Asian', 'no', 'no', 'Australia', 'no', 5, '4-11 years', 'Parent', 'NO'),
(185, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 11, 'm', 'Asian', 'no', 'no', 'India', 'no', 7, '4-11 years', 'Parent', 'YES'),
(186, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 4, 'm', 'Black', 'yes', 'no', 'United Kingdom', 'no', 6, '4-11 years', 'Parent', 'NO'),
(187, 1, 1, 1, 0, 1, 0, 1, 1, 1, 1, 4, 'm', 'White-European', 'yes', 'no', 'United States', 'no', 8, '4-11 years', 'Parent', 'YES'),
(188, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 6, 'f', 'Black', 'no', 'no', 'Nigeria', 'no', 10, '4-11 years', 'Parent', 'YES'),
(189, 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 8, 'm', 'White-European', 'no', 'no', 'United Kingdom', 'no', 6, '4-11 years', 'Parent', 'NO'),
(190, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 4, 'f', 'White-European', 'no', 'yes', 'Australia', 'no', 9, '4-11 years', 'Parent', 'YES'),
(191, 1, 1, 1, 0, 1, 1, 0, 1, 0, 1, 4, 'm', '?', 'no', 'no', 'Lebanon', 'no', 7, '4-11 years', '?', 'YES'),
(192, 1, 1, 0, 1, 1, 1, 1, 0, 0, 1, 8, 'm', 'White-European', 'no', 'no', 'Armenia', 'no', 7, '4-11 years', 'Parent', 'YES'),
(193, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 11, 'm', 'Hispanic', 'no', 'no', 'United States', 'no', 7, '4-11 years', 'Relative', 'YES'),
(194, 1, 0, 1, 0, 1, 1, 1, 0, 1, 0, 4, 'f', 'White-European', 'yes', 'yes', 'United Kingdom', 'no', 6, '4-11 years', 'Parent', 'NO'),
(195, 1, 1, 0, 0, 1, 1, 1, 0, 0, 0, 5, 'm', '?', 'no', 'no', 'Iraq', 'no', 5, '4-11 years', '?', 'NO'),
(196, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 4, 'm', 'White-European', 'no', 'no', 'U.S. Outlying Islands', 'no', 3, '4-11 years', 'Parent', 'NO'),
(197, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 8, 'm', 'Black', 'no', 'no', 'Australia', 'no', 8, '4-11 years', 'Parent', 'YES'),
(198, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 4, 'm', 'Pasifika', 'no', 'no', 'New Zealand', 'no', 7, '4-11 years', 'Health care professional', 'YES'),
(199, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'm', 'South Asian', 'no', 'no', 'India', 'no', 9, '4-11 years', 'Parent', 'YES'),
(200, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 9, 'm', 'White-European', 'no', 'yes', 'Australia', 'no', 4, '4-11 years', 'Parent', 'NO'),
(201, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 9, 'm', 'White-European', 'yes', 'yes', 'Australia', 'no', 4, '4-11 years', 'Parent', 'NO'),
(202, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 4, 'f', 'White-European', 'no', 'yes', 'United Kingdom', 'no', 8, '4-11 years', 'Parent', 'YES'),
(203, 0, 0, 1, 0, 1, 0, 1, 0, 0, 1, 5, 'm', 'South Asian', 'no', 'no', 'India', 'no', 4, '4-11 years', 'Relative', 'NO'),
(204, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 7, 'f', 'Asian', 'yes', 'no', 'India', 'no', 7, '4-11 years', 'Parent', 'YES'),
(205, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 4, 'f', 'White-European', 'yes', 'no', 'United Kingdom', 'no', 8, '4-11 years', 'Parent', 'YES'),
(206, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 5, 'f', 'White-European', 'no', 'no', 'United Kingdom', 'no', 5, '4-11 years', 'Parent', 'NO'),
(207, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 6, 'm', 'Asian', 'no', 'no', 'Nepal', 'no', 8, '4-11 years', 'Health care professional', 'YES'),
(208, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 8, 'm', 'White-European', 'no', 'no', 'United Kingdom', 'no', 9, '4-11 years', 'Parent', 'YES'),
(209, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 4, 'm', 'Asian', 'no', 'no', 'Bangladesh', 'no', 3, '4-11 years', 'Parent', 'NO'),
(210, 1, 0, 1, 1, 1, 1, 0, 1, 0, 0, 5, 'm', 'Latino', 'no', 'yes', 'Mexico', 'no', 6, '4-11 years', 'Parent', 'NO'),
(211, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 5, 'm', 'Latino', 'no', 'yes', 'Mexico', 'no', 7, '4-11 years', 'Parent', 'YES'),
(212, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 6, 'm', 'White-European', 'yes', 'no', 'United States', 'no', 6, '4-11 years', 'Parent', 'NO'),
(213, 0, 1, 1, 0, 1, 1, 0, 0, 0, 1, 4, 'm', '?', 'yes', 'no', 'Malaysia', 'no', 5, '4-11 years', '?', 'NO'),
(214, 0, 0, 1, 0, 1, 1, 1, 0, 1, 1, 8, 'm', 'White-European', 'no', 'no', 'United Kingdom', 'no', 6, '4-11 years', 'Parent', 'NO'),
(215, 1, 0, 1, 1, 0, 1, 0, 1, 1, 0, 5, 'm', 'South Asian', 'no', 'no', 'India', 'no', 6, '4-11 years', 'Parent', 'NO'),
(216, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'f', 'Asian', 'no', 'yes', 'United States', 'no', 10, '4-11 years', 'Parent', 'YES'),
(217, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 6, 'm', 'White-European', 'no', 'no', 'Australia', 'no', 8, '4-11 years', 'Parent', 'YES'),
(218, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 11, 'm', 'Turkish', 'no', 'yes', 'Turkey', 'no', 1, '4-11 years', 'Parent', 'NO'),
(219, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 6, 'm', 'Others', 'no', 'no', 'United Kingdom', 'no', 3, '4-11 years', 'Parent', 'NO'),
(220, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'f', 'Hispanic', 'no', 'no', 'United States', 'no', 9, '4-11 years', 'Parent', 'YES'),
(221, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 8, 'm', 'White-European', 'no', 'no', 'United States', 'no', 10, '4-11 years', 'Parent', 'YES'),
(222, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 4, 'm', 'White-European', 'no', 'yes', 'United States', 'no', 8, '4-11 years', 'Parent', 'YES'),
(223, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 4, 'm', 'White-European', 'no', 'no', 'United States', 'no', 7, '4-11 years', 'Parent', 'YES'),
(224, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 6, 'm', 'White-European', 'no', 'no', 'United States', 'no', 8, '4-11 years', 'Parent', 'YES'),
(225, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 8, 'm', 'White-European', 'yes', 'no', 'Canada', 'no', 4, '4-11 years', 'Health care professional', 'NO'),
(226, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 9, 'm', 'Black', 'yes', 'no', 'United Kingdom', 'no', 10, '4-11 years', 'Parent', 'YES'),
(227, 0, 0, 0, 0, 1, 1, 0, 1, 0, 1, 8, 'f', 'South Asian', 'no', 'no', 'India', 'no', 4, '4-11 years', 'Parent', 'NO'),
(228, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 5, 'm', 'South Asian', 'no', 'no', 'India', 'no', 7, '4-11 years', 'Parent', 'YES'),
(229, 1, 0, 0, 0, 1, 0, 1, 1, 0, 0, 5, 'm', 'Middle Eastern ', 'no', 'no', 'Jordan', 'no', 4, '4-11 years', 'Health care professional', 'NO'),
(230, 1, 1, 1, 1, 0, 1, 0, 1, 1, 1, 4, 'm', 'Asian', 'yes', 'no', 'Isle of Man', 'no', 8, '4-11 years', 'Health care professional', 'YES'),
(231, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 10, 'm', 'White-European', 'no', 'no', 'United States', 'no', 8, '4-11 years', 'Parent', 'YES'),
(232, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 4, 'm', '?', 'yes', 'no', 'Libya', 'no', 5, '4-11 years', '?', 'NO'),
(233, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 4, 'm', '?', 'yes', 'no', 'Libya', 'yes', 7, '4-11 years', '?', 'YES'),
(234, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 5, 'm', '?', 'no', 'no', 'Russia', 'no', 8, '4-11 years', '?', 'YES'),
(235, 0, 1, 1, 0, 1, 1, 1, 0, 0, 0, 4, 'm', 'Others', 'yes', 'no', 'Libya', 'no', 5, '4-11 years', 'Parent', 'NO'),
(236, 0, 0, 1, 1, 1, 1, 0, 1, 0, 1, 5, 'm', '?', 'no', 'no', 'Russia', 'no', 6, '4-11 years', '?', 'NO'),
(237, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 7, 'f', 'Asian', 'no', 'no', 'Philippines', 'no', 9, '4-11 years', 'Parent', 'YES'),
(238, 0, 1, 1, 0, 0, 1, 0, 0, 1, 1, 11, 'f', 'Latino', 'yes', 'no', 'Philippines', 'no', 5, '4-11 years', 'Health care professional', 'NO'),
(239, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 11, 'm', 'Asian', 'no', 'no', 'India', 'no', 5, '4-11 years', 'Parent', 'NO'),
(240, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, 11, 'f', 'White-European', 'no', 'yes', 'Australia', 'no', 5, '4-11 years', 'Parent', 'NO'),
(241, 1, 1, 1, 1, 0, 0, 1, 0, 1, 0, 9, 'm', 'South Asian', 'no', 'no', 'New Zealand', 'no', 6, '4-11 years', 'Parent', 'NO'),
(242, 1, 0, 1, 0, 1, 1, 1, 0, 0, 1, 6, 'm', 'South Asian', 'yes', 'no', 'India', 'no', 6, '4-11 years', 'Parent', 'NO'),
(243, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 6, 'm', '?', 'yes', 'no', 'Saudi Arabia', 'no', 3, '4-11 years', '?', 'NO'),
(244, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 9, 'f', '?', 'yes', 'no', 'Saudi Arabia', 'no', 3, '4-11 years', '?', 'NO'),
(245, 0, 1, 1, 0, 1, 1, 0, 1, 0, 1, 7, 'm', '?', 'yes', 'no', 'Jordan', 'no', 6, '4-11 years', '?', 'NO'),
(246, 1, 1, 1, 0, 0, 1, 0, 1, 0, 1, 5, 'm', 'Middle Eastern ', 'no', 'no', 'Jordan', 'no', 6, '4-11 years', 'Parent', 'NO'),
(247, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 5, 'm', 'Middle Eastern ', 'yes', 'no', 'United Arab Emirates', 'no', 4, '4-11 years', 'Parent', 'NO'),
(248, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 10, 'm', 'Middle Eastern ', 'no', 'yes', 'United Arab Emirates', 'no', 1, '4-11 years', 'Parent', 'NO'),
(249, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 7, 'm', 'Middle Eastern ', 'no', 'no', 'Jordan', 'no', 3, '4-11 years', 'Parent', 'NO'),
(250, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1, 9, 'm', '?', 'yes', 'no', 'Egypt', 'no', 6, '4-11 years', '?', 'NO'),
(251, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1, 7, 'm', 'Middle Eastern ', 'yes', 'no', 'Egypt', 'no', 7, '4-11 years', 'Parent', 'YES'),
(252, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 7, 'm', '?', 'yes', 'no', 'Egypt', 'no', 8, '4-11 years', '?', 'YES'),
(253, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 7, 'm', 'Middle Eastern ', 'yes', 'no', 'Jordan', 'no', 7, '4-11 years', 'Parent', 'YES'),
(254, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 9, 'f', 'Middle Eastern ', 'no', 'no', 'Egypt', 'no', 8, '4-11 years', 'Parent', 'YES'),
(255, 1, 1, 1, 0, 0, 1, 0, 0, 0, 1, 5, 'm', 'Middle Eastern ', 'yes', 'no', 'United Arab Emirates', 'no', 5, '4-11 years', 'Parent', 'NO'),
(256, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 4, 'm', 'South Asian', 'no', 'no', 'India', 'no', 5, '4-11 years', 'Parent', 'NO'),
(257, 0, 0, 0, 1, 1, 1, 0, 0, 0, 1, 5, 'm', 'Asian', 'no', 'yes', 'India', 'no', 4, '4-11 years', 'Parent', 'NO'),
(258, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'f', 'South Asian', 'no', 'no', 'Armenia', 'no', 10, '4-11 years', 'Health care professional', 'YES'),
(259, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 5, 'm', 'South Asian', 'no', 'no', 'India', 'no', 4, '4-11 years', 'Parent', 'NO'),
(260, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 5, 'm', 'Black', 'no', 'no', 'United States', 'no', 8, '4-11 years', 'Parent', 'YES'),
(261, 1, 1, 1, 1, 0, 1, 0, 0, 0, 1, 4, 'm', 'White-European', 'no', 'no', 'Italy', 'no', 6, '4-11 years', 'Parent', 'NO'),
(262, 1, 1, 0, 0, 1, 0, 1, 1, 0, 0, 6, 'm', 'Asian', 'no', 'no', 'India', 'no', 5, '4-11 years', 'Parent', 'NO'),
(263, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 6, 'f', 'Black', 'no', 'no', 'Canada', 'no', 10, '4-11 years', 'Parent', 'YES'),
(264, 0, 1, 1, 0, 0, 1, 1, 0, 1, 1, 5, 'm', 'Asian', 'no', 'no', 'India', 'yes', 6, '4-11 years', 'Relative', 'NO'),
(265, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 11, 'm', 'White-European', 'no', 'no', 'United Kingdom', 'no', 8, '4-11 years', 'Parent', 'YES'),
(266, 1, 1, 1, 1, 0, 1, 0, 1, 1, 1, 10, 'm', 'Black', 'yes', 'no', 'India', 'no', 8, '4-11 years', 'Parent', 'YES'),
(267, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 4, 'm', 'South Asian', 'no', 'no', 'India', 'no', 5, '4-11 years', 'Parent', 'NO'),
(268, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 5, 'm', 'Others', 'no', 'no', 'United Kingdom', 'no', 9, '4-11 years', 'Parent', 'YES'),
(269, 1, 0, 1, 0, 1, 1, 1, 0, 1, 1, 10, 'm', '?', 'yes', 'no', 'Pakistan', 'no', 7, '4-11 years', '?', 'YES'),
(270, 1, 0, 1, 0, 0, 0, 1, 1, 0, 0, 9, 'm', 'Middle Eastern ', 'yes', 'no', 'New Zealand', 'no', 4, '4-11 years', 'Parent', 'NO'),
(271, 0, 1, 1, 1, 1, 1, 0, 1, 0, 1, 4, 'm', 'Asian', 'no', 'no', 'India', 'no', 7, '4-11 years', 'Parent', 'YES'),
(272, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 4, 'f', 'White-European', 'no', 'yes', 'United Kingdom', 'no', 3, '4-11 years', 'Parent', 'NO'),
(273, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 5, 'm', 'Black', 'no', 'no', 'Ghana', 'no', 3, '4-11 years', 'Parent', 'NO'),
(274, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 8, 'm', 'White-European', 'no', 'yes', 'Australia', 'no', 9, '4-11 years', 'Parent', 'YES'),
(275, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 8, 'm', 'White-European', 'yes', 'no', 'United States', 'no', 9, '4-11 years', 'Parent', 'YES'),
(276, 1, 0, 1, 1, 0, 0, 0, 0, 1, 0, 6, 'm', 'Asian', 'no', 'no', 'India', 'no', 4, '4-11 years', 'Health care professional', 'NO'),
(277, 0, 0, 1, 0, 1, 1, 1, 1, 0, 1, 11, 'm', 'Asian', 'no', 'no', 'India', 'no', 6, '4-11 years', 'Parent', 'NO'),
(278, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 10, 'f', 'Asian', 'no', 'no', 'India', 'no', 7, '4-11 years', 'Parent', 'YES'),
(279, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 6, 'f', 'White-European', 'no', 'no', 'United Kingdom', 'no', 4, '4-11 years', 'Parent', 'NO'),
(280, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 6, 'm', 'Asian', 'no', 'yes', 'India', 'no', 9, '4-11 years', 'Parent', 'YES'),
(281, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 4, 'm', 'Black', 'no', 'yes', 'India', 'no', 2, '4-11 years', 'Parent', 'NO'),
(282, 0, 1, 1, 1, 1, 1, 0, 0, 0, 1, 4, 'm', 'White-European', 'no', 'no', 'Australia', 'no', 6, '4-11 years', 'Parent', 'NO'),
(283, 0, 1, 1, 0, 0, 1, 0, 1, 1, 1, 4, 'f', 'White-European', 'yes', 'no', 'United Kingdom', 'no', 6, '4-11 years', 'Parent', 'NO'),
(284, 0, 0, 0, 0, 1, 1, 1, 0, 1, 0, 5, 'm', 'Others', 'no', 'no', 'United States', 'no', 4, '4-11 years', 'Parent', 'NO'),
(285, 1, 0, 1, 0, 1, 1, 1, 0, 0, 1, 10, 'f', 'White-European', 'no', 'no', 'Australia', 'no', 6, '4-11 years', 'Health care professional', 'NO'),
(286, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 10, 'f', 'White-European', 'no', 'no', 'Australia', 'no', 8, '4-11 years', 'Health care professional', 'YES'),
(287, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 5, 'f', 'Latino', 'yes', 'no', 'Bhutan', 'no', 9, '4-11 years', 'Parent', 'YES'),
(288, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 7, 'f', 'White-European', 'yes', 'yes', 'United Kingdom', 'no', 10, '4-11 years', 'Parent', 'YES'),
(289, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 7, 'f', 'White-European', 'yes', 'yes', 'Australia', 'no', 4, '4-11 years', 'Parent', 'NO'),
(290, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 4, 'm', 'Latino', 'no', 'no', 'Brazil', 'no', 7, '4-11 years', 'Parent', 'YES'),
(291, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 4, 'm', 'South Asian', 'no', 'no', 'India', 'no', 9, '4-11 years', 'Parent', 'YES'),
(292, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 4, 'f', 'South Asian', 'no', 'no', 'India', 'no', 3, '4-11 years', 'Parent', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `data_latih`
--

CREATE TABLE `data_latih` (
  `id_latih` int(11) NOT NULL,
  `A1_Score` int(8) DEFAULT NULL,
  `A2_Score` int(8) DEFAULT NULL,
  `A3_Score` int(8) DEFAULT NULL,
  `A4_Score` int(8) DEFAULT NULL,
  `A5_Score` int(8) DEFAULT NULL,
  `A6_Score` int(8) DEFAULT NULL,
  `A7_Score` int(8) DEFAULT NULL,
  `A8_Score` int(8) DEFAULT NULL,
  `A9_Score` int(8) DEFAULT NULL,
  `A10_Score` int(9) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `jundice` varchar(7) DEFAULT NULL,
  `autism` varchar(6) DEFAULT NULL,
  `Class` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_latih`
--

INSERT INTO `data_latih` (`id_latih`, `A1_Score`, `A2_Score`, `A3_Score`, `A4_Score`, `A5_Score`, `A6_Score`, `A7_Score`, `A8_Score`, `A9_Score`, `A10_Score`, `age`, `gender`, `jundice`, `autism`, `Class`) VALUES
(1, 1, 1, 0, 0, 1, 1, 0, 1, 0, 0, 6, 'm', 'no', 'no', 'NO'),
(2, 1, 1, 0, 0, 1, 1, 0, 1, 0, 0, 6, 'm', 'no', 'no', 'NO'),
(4, 0, 1, 0, 0, 1, 1, 0, 0, 0, 1, 5, 'f', 'yes', 'no', 'NO'),
(7, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 5, 'm', 'no', 'no', 'YES'),
(9, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 11, 'f', 'no', 'no', 'YES'),
(12, 0, 1, 0, 0, 1, 0, 0, 0, 0, 1, 5, 'f', 'no', 'no', 'NO'),
(13, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'm', 'yes', 'no', 'YES'),
(14, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 4, 'f', 'no', 'no', 'NO'),
(15, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 6, 'm', 'no', 'no', 'YES'),
(16, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 8, 'm', 'no', 'no', 'YES'),
(17, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 4, 'm', 'no', 'no', 'YES'),
(18, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 7, 'm', 'no', 'no', 'NO'),
(19, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 11, 'm', 'no', 'yes', 'YES'),
(20, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 5, 'm', 'no', 'no', 'YES'),
(21, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 5, 'm', 'yes', 'no', 'YES'),
(22, 0, 0, 1, 1, 0, 1, 0, 1, 1, 0, 9, 'f', 'no', 'no', 'NO'),
(24, 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 6, 'f', 'no', 'no', 'NO'),
(25, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 11, 'm', 'no', 'no', 'YES'),
(26, 0, 0, 1, 1, 1, 0, 1, 1, 1, 0, 6, 'm', 'no', 'yes', 'NO'),
(27, 1, 0, 1, 0, 1, 1, 0, 0, 1, 1, 6, 'f', 'no', 'no', 'NO'),
(28, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 5, 'm', 'yes', 'no', 'YES'),
(29, 0, 1, 1, 0, 0, 0, 1, 1, 0, 1, 6, 'm', 'no', 'yes', 'NO'),
(32, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 6, 'm', 'yes', 'no', 'NO'),
(33, 1, 0, 0, 1, 0, 1, 1, 1, 1, 1, 6, 'm', 'no', 'no', 'YES'),
(35, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1, 6, 'm', 'yes', 'no', 'NO'),
(36, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 7, 'f', 'yes', 'no', 'NO'),
(38, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 7, 'm', 'no', 'no', 'NO'),
(40, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 4, 'm', 'no', 'no', 'YES'),
(41, 0, 0, 1, 1, 1, 1, 0, 1, 0, 1, 5, 'm', 'yes', 'no', 'NO'),
(42, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 4, 'm', 'no', 'no', 'NO'),
(43, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 6, 'f', 'no', 'no', 'NO'),
(44, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 4, 'f', 'no', 'no', 'YES'),
(48, 1, 1, 1, 0, 1, 0, 1, 1, 0, 1, 6, 'm', 'no', 'no', 'YES'),
(53, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 6, 'm', 'no', 'no', 'NO'),
(54, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 7, 'm', 'yes', 'no', 'YES'),
(55, 1, 0, 1, 1, 0, 1, 0, 0, 0, 1, 5, 'm', 'no', 'no', 'NO'),
(56, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 5, 'm', 'no', 'no', 'NO'),
(57, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 6, 'm', 'no', 'no', 'NO'),
(58, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'f', 'no', 'no', 'YES'),
(59, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 9, 'f', 'no', 'no', 'YES'),
(60, 1, 0, 1, 1, 1, 1, 0, 0, 1, 1, 4, 'm', 'no', 'yes', 'YES'),
(61, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 4, 'm', 'no', 'no', 'NO'),
(63, 1, 1, 1, 0, 1, 1, 0, 0, 0, 1, 4, 'f', 'yes', 'no', 'NO'),
(65, 1, 0, 1, 1, 0, 0, 0, 1, 0, 1, 8, 'm', 'no', 'no', 'NO'),
(67, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 4, 'm', 'no', 'no', 'NO'),
(68, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 4, 'm', 'no', 'no', 'NO'),
(69, 0, 0, 1, 0, 1, 1, 1, 0, 1, 0, 4, 'f', 'no', 'yes', 'NO'),
(71, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 7, 'm', 'no', 'no', 'NO'),
(72, 0, 1, 0, 0, 1, 0, 1, 0, 0, 1, 7, 'f', 'yes', 'no', 'NO'),
(73, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 6, 'm', 'no', 'no', 'YES'),
(74, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 5, 'f', 'no', 'no', 'YES'),
(76, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 5, 'm', 'no', 'no', 'NO'),
(77, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 11, 'f', 'no', 'no', 'YES'),
(78, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 8, 'm', 'yes', 'no', 'NO'),
(80, 0, 1, 1, 1, 0, 1, 0, 1, 1, 0, 7, 'm', 'yes', 'no', 'NO'),
(82, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 7, 'm', 'yes', 'yes', 'YES'),
(84, 0, 1, 1, 0, 1, 1, 0, 0, 0, 1, 5, 'm', 'no', 'no', 'NO'),
(85, 0, 0, 1, 0, 1, 1, 1, 0, 1, 1, 4, 'm', 'no', 'no', 'NO'),
(87, 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, 11, 'f', 'no', 'no', 'YES'),
(89, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 5, 'm', 'no', 'yes', 'NO'),
(91, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 4, 'f', 'no', 'no', 'YES'),
(92, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 11, 'f', 'yes', 'yes', 'NO'),
(93, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 5, 'm', 'no', 'no', 'YES'),
(95, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 6, 'm', 'no', 'no', 'YES'),
(96, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 7, 'm', 'no', 'no', 'YES'),
(97, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 11, 'm', 'no', 'no', 'YES'),
(99, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 4, 'm', 'no', 'yes', 'YES'),
(100, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 7, 'm', 'no', 'yes', 'NO'),
(101, 1, 1, 0, 1, 0, 1, 1, 0, 1, 0, 11, 'f', 'yes', 'yes', 'NO'),
(102, 1, 1, 1, 1, 0, 1, 1, 0, 0, 1, 6, 'f', 'no', 'no', 'YES'),
(104, 0, 1, 0, 1, 0, 1, 0, 0, 1, 1, 10, 'm', 'no', 'no', 'NO'),
(107, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 10, 'm', 'yes', 'no', 'YES'),
(108, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 4, 'f', 'yes', 'yes', 'NO'),
(109, 0, 1, 0, 0, 0, 1, 1, 1, 0, 0, 11, 'm', 'no', 'no', 'NO'),
(110, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 7, 'm', 'no', 'no', 'NO'),
(111, 0, 1, 1, 1, 1, 0, 1, 1, 0, 1, 5, 'm', 'no', 'no', 'YES'),
(112, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 4, 'f', 'no', 'no', 'NO'),
(114, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 4, 'm', 'no', 'no', 'YES'),
(115, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 4, 'm', 'no', 'no', 'NO'),
(116, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 11, 'm', 'yes', 'no', 'YES'),
(117, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 10, 'f', 'no', 'no', 'YES'),
(118, 1, 1, 0, 1, 0, 1, 0, 0, 1, 1, 6, 'f', 'no', 'no', 'NO'),
(120, 0, 1, 1, 0, 1, 0, 0, 0, 0, 1, 4, 'm', 'no', 'yes', 'NO'),
(121, 0, 1, 1, 1, 0, 1, 0, 1, 1, 1, 4, 'm', 'no', 'no', 'YES'),
(122, 0, 0, 1, 1, 0, 0, 1, 1, 1, 0, 10, 'm', 'no', 'no', 'NO'),
(123, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 7, 'm', 'no', 'no', 'YES'),
(124, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0, 4, 'm', 'yes', 'no', 'NO'),
(128, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 4, 'f', 'yes', 'no', 'YES'),
(129, 1, 0, 1, 0, 1, 1, 1, 1, 0, 0, 9, 'm', 'no', 'no', 'NO'),
(130, 1, 0, 1, 1, 0, 1, 1, 1, 0, 1, 4, 'f', 'yes', 'no', 'YES'),
(131, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 10, 'm', 'no', 'no', 'YES'),
(132, 1, 1, 0, 0, 0, 0, 1, 0, 0, 1, 9, 'm', 'no', 'no', 'NO'),
(133, 0, 1, 1, 1, 1, 1, 0, 0, 0, 1, 5, 'm', 'yes', 'yes', 'NO'),
(134, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 4, 'f', 'no', 'no', 'NO'),
(135, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 4, 'm', 'no', 'yes', 'YES'),
(136, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 6, 'm', 'no', 'no', 'NO'),
(137, 1, 1, 1, 0, 1, 0, 1, 0, 1, 1, 4, 'f', 'yes', 'no', 'YES'),
(138, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 'f', 'no', 'no', 'NO'),
(140, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 9, 'm', 'yes', 'yes', 'YES'),
(141, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 7, 'f', 'no', 'no', 'YES'),
(142, 0, 1, 1, 0, 0, 1, 1, 1, 0, 1, 10, 'f', 'no', 'no', 'NO'),
(143, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 4, 'm', 'no', 'no', 'YES'),
(144, 1, 0, 1, 1, 0, 1, 1, 1, 0, 1, 4, 'm', 'no', 'no', 'YES'),
(145, 1, 1, 0, 1, 1, 1, 1, 0, 0, 0, 7, 'f', 'no', 'no', 'NO'),
(147, 0, 1, 1, 0, 1, 0, 1, 0, 0, 1, 4, 'm', 'yes', 'no', 'NO'),
(148, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 10, 'm', 'no', 'no', 'YES'),
(149, 0, 0, 1, 0, 1, 1, 0, 1, 1, 1, 4, 'm', 'no', 'no', 'NO'),
(150, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 4, 'm', 'no', 'no', 'NO'),
(151, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 4, 'm', 'no', 'yes', 'YES'),
(152, 1, 0, 1, 0, 1, 1, 0, 1, 1, 1, 4, 'm', 'no', 'yes', 'YES'),
(153, 0, 1, 1, 0, 0, 0, 1, 1, 1, 1, 7, 'm', 'yes', 'no', 'NO'),
(154, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 4, 'm', 'no', 'no', 'YES'),
(157, 0, 1, 0, 0, 0, 1, 1, 1, 1, 1, 6, 'f', 'no', 'no', 'NO'),
(158, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 6, 'f', 'no', 'yes', 'YES'),
(159, 0, 1, 0, 1, 1, 1, 1, 0, 1, 1, 9, 'm', 'no', 'yes', 'YES'),
(160, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 8, 'm', 'no', 'no', 'YES'),
(161, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 11, 'm', 'no', 'no', 'YES'),
(162, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 9, 'm', 'no', 'no', 'YES'),
(165, 0, 0, 1, 0, 0, 1, 1, 0, 0, 1, 4, 'm', 'no', 'no', 'NO'),
(167, 0, 0, 0, 0, 1, 0, 1, 1, 0, 1, 8, 'm', 'no', 'no', 'NO'),
(168, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 6, 'm', 'no', 'no', 'YES'),
(169, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 8, 'm', 'yes', 'no', 'YES'),
(170, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 11, 'f', 'no', 'no', 'YES'),
(171, 1, 1, 1, 0, 1, 0, 1, 0, 0, 0, 5, 'f', 'no', 'no', 'NO'),
(172, 0, 0, 1, 0, 1, 0, 1, 0, 0, 1, 4, 'f', 'no', 'yes', 'NO'),
(176, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 8, 'm', 'no', 'no', 'NO'),
(177, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 8, 'm', 'no', 'no', 'NO'),
(178, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 9, 'm', 'no', 'no', 'YES'),
(181, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 4, 'f', 'yes', 'no', 'YES'),
(183, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 11, 'm', 'no', 'no', 'YES'),
(184, 0, 1, 1, 1, 0, 1, 0, 0, 0, 1, 10, 'f', 'no', 'no', 'NO'),
(186, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 4, 'm', 'yes', 'no', 'NO'),
(187, 1, 1, 1, 0, 1, 0, 1, 1, 1, 1, 4, 'm', 'yes', 'no', 'YES'),
(188, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 6, 'f', 'no', 'no', 'YES'),
(190, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 4, 'f', 'no', 'yes', 'YES'),
(193, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 11, 'm', 'no', 'no', 'YES'),
(194, 1, 0, 1, 0, 1, 1, 1, 0, 1, 0, 4, 'f', 'yes', 'yes', 'NO'),
(196, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 4, 'm', 'no', 'no', 'NO'),
(197, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 8, 'm', 'no', 'no', 'YES'),
(198, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 4, 'm', 'no', 'no', 'YES'),
(199, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'm', 'no', 'no', 'YES'),
(200, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 9, 'm', 'no', 'yes', 'NO'),
(201, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 9, 'm', 'yes', 'yes', 'NO'),
(202, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 4, 'f', 'no', 'yes', 'YES'),
(204, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 7, 'f', 'yes', 'no', 'YES'),
(205, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 4, 'f', 'yes', 'no', 'YES'),
(206, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 5, 'f', 'no', 'no', 'NO'),
(207, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 6, 'm', 'no', 'no', 'YES'),
(209, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 4, 'm', 'no', 'no', 'NO'),
(210, 1, 0, 1, 1, 1, 1, 0, 1, 0, 0, 5, 'm', 'no', 'yes', 'NO'),
(211, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 5, 'm', 'no', 'yes', 'YES'),
(212, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 6, 'm', 'yes', 'no', 'NO'),
(213, 0, 1, 1, 0, 1, 1, 0, 0, 0, 1, 4, 'm', 'yes', 'no', 'NO'),
(215, 1, 0, 1, 1, 0, 1, 0, 1, 1, 0, 5, 'm', 'no', 'no', 'NO'),
(216, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'f', 'no', 'yes', 'YES'),
(217, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 6, 'm', 'no', 'no', 'YES'),
(218, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 11, 'm', 'no', 'yes', 'NO'),
(220, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'f', 'no', 'no', 'YES'),
(221, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 8, 'm', 'no', 'no', 'YES'),
(222, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 4, 'm', 'no', 'yes', 'YES'),
(225, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 8, 'm', 'yes', 'no', 'NO'),
(226, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 9, 'm', 'yes', 'no', 'YES'),
(227, 0, 0, 0, 0, 1, 1, 0, 1, 0, 1, 8, 'f', 'no', 'no', 'NO'),
(228, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 5, 'm', 'no', 'no', 'YES'),
(229, 1, 0, 0, 0, 1, 0, 1, 1, 0, 0, 5, 'm', 'no', 'no', 'NO'),
(231, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 10, 'm', 'no', 'no', 'YES'),
(237, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 7, 'f', 'no', 'no', 'YES'),
(238, 0, 1, 1, 0, 0, 1, 0, 0, 1, 1, 11, 'f', 'yes', 'no', 'NO'),
(239, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 11, 'm', 'no', 'no', 'NO'),
(241, 1, 1, 1, 1, 0, 0, 1, 0, 1, 0, 9, 'm', 'no', 'no', 'NO'),
(242, 1, 0, 1, 0, 1, 1, 1, 0, 0, 1, 6, 'm', 'yes', 'no', 'NO'),
(243, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 6, 'm', 'yes', 'no', 'NO'),
(244, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 9, 'f', 'yes', 'no', 'NO'),
(245, 0, 1, 1, 0, 1, 1, 0, 1, 0, 1, 7, 'm', 'yes', 'no', 'NO'),
(246, 1, 1, 1, 0, 0, 1, 0, 1, 0, 1, 5, 'm', 'no', 'no', 'NO'),
(248, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 10, 'm', 'no', 'yes', 'NO'),
(251, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1, 7, 'm', 'yes', 'no', 'YES'),
(252, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 7, 'm', 'yes', 'no', 'YES'),
(254, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 9, 'f', 'no', 'no', 'YES'),
(255, 1, 1, 1, 0, 0, 1, 0, 0, 0, 1, 5, 'm', 'yes', 'no', 'NO'),
(257, 0, 0, 0, 1, 1, 1, 0, 0, 0, 1, 5, 'm', 'no', 'yes', 'NO'),
(258, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'f', 'no', 'no', 'YES'),
(259, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 5, 'm', 'no', 'no', 'NO'),
(260, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 5, 'm', 'no', 'no', 'YES'),
(264, 0, 1, 1, 0, 0, 1, 1, 0, 1, 1, 5, 'm', 'no', 'no', 'NO'),
(265, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 11, 'm', 'no', 'no', 'YES'),
(266, 1, 1, 1, 1, 0, 1, 0, 1, 1, 1, 10, 'm', 'yes', 'no', 'YES'),
(267, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 4, 'm', 'no', 'no', 'NO'),
(268, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 5, 'm', 'no', 'no', 'YES'),
(270, 1, 0, 1, 0, 0, 0, 1, 1, 0, 0, 9, 'm', 'yes', 'no', 'NO'),
(271, 0, 1, 1, 1, 1, 1, 0, 1, 0, 1, 4, 'm', 'no', 'no', 'YES'),
(272, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 4, 'f', 'no', 'yes', 'NO'),
(275, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 8, 'm', 'yes', 'no', 'YES'),
(276, 1, 0, 1, 1, 0, 0, 0, 0, 1, 0, 6, 'm', 'no', 'no', 'NO'),
(277, 0, 0, 1, 0, 1, 1, 1, 1, 0, 1, 11, 'm', 'no', 'no', 'NO'),
(278, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 10, 'f', 'no', 'no', 'YES'),
(280, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 6, 'm', 'no', 'yes', 'YES'),
(281, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 4, 'm', 'no', 'yes', 'NO'),
(283, 0, 1, 1, 0, 0, 1, 0, 1, 1, 1, 4, 'f', 'yes', 'no', 'NO'),
(286, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 10, 'f', 'no', 'no', 'YES'),
(288, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 7, 'f', 'yes', 'yes', 'YES'),
(289, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 7, 'f', 'yes', 'yes', 'NO'),
(290, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 4, 'm', 'no', 'no', 'YES'),
(291, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 4, 'm', 'no', 'no', 'YES'),
(292, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 4, 'f', 'no', 'no', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `data_uji`
--

CREATE TABLE `data_uji` (
  `id_uji` int(11) NOT NULL,
  `A1_Score` int(8) DEFAULT NULL,
  `A2_Score` int(8) DEFAULT NULL,
  `A3_Score` int(8) DEFAULT NULL,
  `A4_Score` int(8) DEFAULT NULL,
  `A5_Score` int(8) DEFAULT NULL,
  `A6_Score` int(8) DEFAULT NULL,
  `A7_Score` int(8) DEFAULT NULL,
  `A8_Score` int(8) DEFAULT NULL,
  `A9_Score` int(8) DEFAULT NULL,
  `A10_Score` int(9) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `jundice` varchar(7) DEFAULT NULL,
  `autism` varchar(6) DEFAULT NULL,
  `Class` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_uji`
--

INSERT INTO `data_uji` (`id_uji`, `A1_Score`, `A2_Score`, `A3_Score`, `A4_Score`, `A5_Score`, `A6_Score`, `A7_Score`, `A8_Score`, `A9_Score`, `A10_Score`, `age`, `gender`, `jundice`, `autism`, `Class`) VALUES
(3, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 6, 'm', 'no', 'no', 'NO'),
(5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 5, 'm', 'yes', 'no', 'YES'),
(6, 0, 0, 1, 0, 1, 1, 0, 1, 0, 1, 4, 'm', 'no', 'yes', 'NO'),
(8, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 5, 'f', 'no', 'no', 'YES'),
(10, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 11, 'f', 'no', 'yes', 'NO'),
(11, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 10, 'm', 'yes', 'no', 'YES'),
(23, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 4, 'm', 'no', 'no', 'NO'),
(30, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 4, 'f', 'yes', 'yes', 'NO'),
(31, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 11, 'm', 'no', 'no', 'YES'),
(34, 1, 0, 0, 0, 1, 1, 0, 1, 0, 1, 5, 'm', 'yes', 'no', 'NO'),
(37, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 4, 'f', 'no', 'no', 'NO'),
(39, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'm', 'yes', 'no', 'YES'),
(45, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 10, 'm', 'no', 'no', 'NO'),
(46, 0, 1, 1, 0, 1, 1, 0, 0, 0, 1, 4, 'f', 'yes', 'no', 'NO'),
(47, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0, 4, 'f', 'yes', 'no', 'NO'),
(49, 1, 0, 1, 1, 1, 1, 0, 0, 1, 1, 6, 'f', 'yes', 'no', 'YES'),
(50, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 7, 'm', 'no', 'yes', 'NO'),
(51, 0, 1, 0, 0, 1, 0, 1, 0, 0, 1, 7, 'm', 'yes', 'no', 'NO'),
(52, 0, 0, 1, 0, 1, 1, 1, 0, 1, 1, 4, 'm', 'no', 'no', 'NO'),
(62, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 9, 'm', 'no', 'no', 'YES'),
(64, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 9, 'm', 'yes', 'no', 'YES'),
(66, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 6, 'm', 'no', 'no', 'NO'),
(70, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'm', 'no', 'yes', 'YES'),
(75, 1, 0, 1, 1, 1, 1, 0, 0, 1, 1, 8, 'f', 'no', 'yes', 'YES'),
(79, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 4, 'm', 'no', 'yes', 'YES'),
(81, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 4, 'm', 'no', 'no', 'NO'),
(83, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 8, 'm', 'no', 'no', 'YES'),
(86, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 11, 'f', 'no', 'no', 'YES'),
(88, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 'm', 'no', 'no', 'YES'),
(90, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 6, 'm', 'no', 'no', 'YES'),
(94, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 5, 'm', 'no', 'no', 'YES'),
(98, 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 4, 'm', 'no', 'no', 'YES'),
(103, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 9, 'f', 'no', 'no', 'NO'),
(105, 0, 0, 0, 0, 1, 1, 1, 0, 0, 1, 4, 'm', 'no', 'yes', 'NO'),
(106, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 4, 'm', 'yes', 'no', 'YES'),
(113, 0, 0, 1, 1, 1, 1, 0, 1, 1, 1, 8, 'm', 'no', 'no', 'YES'),
(119, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 4, 'm', 'no', 'no', 'NO'),
(125, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 6, 'f', 'yes', 'no', 'YES'),
(126, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 5, 'm', 'no', 'no', 'YES'),
(127, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1, 6, 'm', 'yes', 'no', 'YES'),
(139, 0, 1, 1, 0, 1, 1, 1, 1, 0, 0, 6, 'm', 'yes', 'no', 'NO'),
(146, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 4, 'm', 'yes', 'no', 'YES'),
(155, 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 5, 'f', 'no', 'no', 'YES'),
(156, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 6, 'm', 'yes', 'no', 'YES'),
(163, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 9, 'f', 'no', 'yes', 'NO'),
(164, 1, 0, 0, 1, 1, 1, 1, 0, 1, 1, 7, 'm', 'no', 'no', 'YES'),
(166, 1, 0, 0, 0, 1, 1, 1, 0, 0, 1, 10, 'f', 'no', 'no', 'NO'),
(173, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 11, 'm', 'no', 'no', 'YES'),
(174, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1, 11, 'f', 'yes', 'no', 'NO'),
(175, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0, 4, 'm', 'yes', 'no', 'NO'),
(179, 0, 0, 0, 1, 0, 1, 0, 0, 1, 1, 4, 'm', 'no', 'no', 'NO'),
(180, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 4, 'm', 'no', 'no', 'YES'),
(182, 0, 1, 1, 0, 1, 0, 1, 0, 0, 0, 4, 'f', 'no', 'no', 'NO'),
(185, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 11, 'm', 'no', 'no', 'YES'),
(189, 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 8, 'm', 'no', 'no', 'NO'),
(191, 1, 1, 1, 0, 1, 1, 0, 1, 0, 1, 4, 'm', 'no', 'no', 'YES'),
(192, 1, 1, 0, 1, 1, 1, 1, 0, 0, 1, 8, 'm', 'no', 'no', 'YES'),
(195, 1, 1, 0, 0, 1, 1, 1, 0, 0, 0, 5, 'm', 'no', 'no', 'NO'),
(203, 0, 0, 1, 0, 1, 0, 1, 0, 0, 1, 5, 'm', 'no', 'no', 'NO'),
(208, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 8, 'm', 'no', 'no', 'YES'),
(214, 0, 0, 1, 0, 1, 1, 1, 0, 1, 1, 8, 'm', 'no', 'no', 'NO'),
(219, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 6, 'm', 'no', 'no', 'NO'),
(223, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 4, 'm', 'no', 'no', 'YES'),
(224, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 6, 'm', 'no', 'no', 'YES'),
(230, 1, 1, 1, 1, 0, 1, 0, 1, 1, 1, 4, 'm', 'yes', 'no', 'YES'),
(232, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 4, 'm', 'yes', 'no', 'NO'),
(233, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 4, 'm', 'yes', 'no', 'YES'),
(234, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 5, 'm', 'no', 'no', 'YES'),
(235, 0, 1, 1, 0, 1, 1, 1, 0, 0, 0, 4, 'm', 'yes', 'no', 'NO'),
(236, 0, 0, 1, 1, 1, 1, 0, 1, 0, 1, 5, 'm', 'no', 'no', 'NO'),
(240, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, 11, 'f', 'no', 'yes', 'NO'),
(247, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 5, 'm', 'yes', 'no', 'NO'),
(249, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 7, 'm', 'no', 'no', 'NO'),
(250, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1, 9, 'm', 'yes', 'no', 'NO'),
(253, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 7, 'm', 'yes', 'no', 'YES'),
(256, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 4, 'm', 'no', 'no', 'NO'),
(261, 1, 1, 1, 1, 0, 1, 0, 0, 0, 1, 4, 'm', 'no', 'no', 'NO'),
(262, 1, 1, 0, 0, 1, 0, 1, 1, 0, 0, 6, 'm', 'no', 'no', 'NO'),
(263, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 6, 'f', 'no', 'no', 'YES'),
(269, 1, 0, 1, 0, 1, 1, 1, 0, 1, 1, 10, 'm', 'yes', 'no', 'YES'),
(273, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 5, 'm', 'no', 'no', 'NO'),
(274, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 8, 'm', 'no', 'yes', 'YES'),
(279, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 6, 'f', 'no', 'no', 'NO'),
(282, 0, 1, 1, 1, 1, 1, 0, 0, 0, 1, 4, 'm', 'no', 'no', 'NO'),
(284, 0, 0, 0, 0, 1, 1, 1, 0, 1, 0, 5, 'm', 'no', 'no', 'NO'),
(285, 1, 0, 1, 0, 1, 1, 1, 0, 0, 1, 10, 'f', 'no', 'no', 'NO'),
(287, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 5, 'f', 'yes', 'no', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `data_uji_user`
--

CREATE TABLE `data_uji_user` (
  `id_uji_user` int(11) NOT NULL,
  `A1_Score` int(8) DEFAULT NULL,
  `A2_Score` int(8) DEFAULT NULL,
  `A3_Score` int(8) DEFAULT NULL,
  `A4_Score` int(8) DEFAULT NULL,
  `A5_Score` int(8) DEFAULT NULL,
  `A6_Score` int(8) DEFAULT NULL,
  `A7_Score` int(8) DEFAULT NULL,
  `A8_Score` int(8) DEFAULT NULL,
  `A9_Score` int(8) DEFAULT NULL,
  `A10_Score` int(9) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `jundice` varchar(7) DEFAULT NULL,
  `autism` varchar(6) DEFAULT NULL,
  `Class` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_uji_user`
--

INSERT INTO `data_uji_user` (`id_uji_user`, `A1_Score`, `A2_Score`, `A3_Score`, `A4_Score`, `A5_Score`, `A6_Score`, `A7_Score`, `A8_Score`, `A9_Score`, `A10_Score`, `age`, `gender`, `jundice`, `autism`, `Class`) VALUES
(1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 4, 'm', 'yes', 'yes', 'YES'),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 'm', 'yes', 'yes', 'NO'),
(3, 1, 1, 0, 1, 0, 0, 1, 0, 0, 0, 4, 'f', 'no', 'yes', 'NO'),
(4, 0, 0, 0, 1, 1, 1, 0, 1, 1, 0, 6, 'm', 'no', 'no', 'NO'),
(5, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 4, 'm', 'no', 'no', 'YES'),
(6, 0, 1, 0, 0, 1, 0, 0, 1, 1, 1, 7, 'm', 'no', 'yes', 'NO'),
(7, 1, 1, 0, 1, 0, 0, 0, 1, 1, 1, 9, 'f', 'no', 'yes', 'NO'),
(8, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 7, 'm', 'yes', 'yes', 'YES'),
(9, 1, 1, 0, 0, 1, 0, 1, 1, 0, 1, 5, 'f', 'no', 'yes', 'NO'),
(10, 0, 0, 1, 1, 1, 1, 0, 1, 0, 1, 5, 'm', 'no', 'no', 'YES'),
(11, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 4, 'm', 'no', 'no', 'YES'),
(12, 0, 0, 1, 1, 1, 1, 0, 1, 0, 1, 5, 'm', 'no', 'no', 'YES'),
(13, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 4, 'm', 'no', 'no', 'YES'),
(14, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 4, 'm', 'no', 'no', 'YES'),
(15, 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 8, 'm', 'no', 'no', 'YES'),
(16, 0, 0, 1, 1, 1, 1, 0, 1, 0, 1, 5, 'm', 'no', 'no', 'YES'),
(17, 0, 0, 1, 1, 1, 0, 1, 1, 0, 1, 11, 'f', 'no', 'yes', 'YES'),
(18, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 11, 'f', 'no', 'yes', 'NO'),
(19, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 29, 'f', 'no', 'yes', 'NO'),
(20, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 29, 'f', 'no', 'yes', 'NO'),
(21, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 29, 'f', 'no', 'yes', 'NO'),
(22, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 29, 'f', 'no', 'yes', 'NO'),
(23, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 29, 'f', 'no', 'yes', 'NO'),
(24, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 29, 'f', 'no', 'yes', 'NO'),
(25, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 29, 'f', 'no', 'yes', 'NO'),
(26, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 29, 'f', 'no', 'yes', 'YES'),
(27, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 4, 'm', 'yes', 'yes', 'YES'),
(28, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 8, 'f', 'no', 'yes', 'NO'),
(29, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 11, 'f', 'no', 'yes', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_uji`
--

CREATE TABLE `hasil_uji` (
  `id_hasil` int(11) NOT NULL,
  `id_uji_user` int(11) DEFAULT NULL,
  `status_normal` double DEFAULT NULL,
  `status_autis` double DEFAULT NULL,
  `hasil_status` varchar(10) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hasil_uji`
--

INSERT INTO `hasil_uji` (`id_hasil`, `id_uji_user`, `status_normal`, `status_autis`, `hasil_status`, `time`) VALUES
(1, 1, 0.029962523868021, 0.97003747613198, 'ASD', '2021-04-27 15:39:35'),
(2, 2, 0.99999776218402, 0.0000022378159836571, 'Normal', '2021-04-27 15:39:54'),
(3, 3, 0.99782429000192, 0.0021757099980759, 'Normal', '2021-04-27 20:42:50'),
(4, 4, 0.85297240222648, 0.14702759777352, 'Normal', '2021-05-10 22:56:56'),
(5, 5, 0.48134960142339, 0.51865039857661, 'ASD', '2021-05-10 23:08:16'),
(6, 6, 0.97644909310119, 0.023550906898806, 'Normal', '2021-05-11 02:05:31'),
(7, 7, 0.83811457576338, 0.16188542423662, 'Normal', '2021-05-11 02:06:12'),
(8, 8, 0.37437795418372, 0.62562204581628, 'ASD', '2021-05-11 02:07:04'),
(9, 9, 0.96370499944131, 0.036295000558689, 'Normal', '2021-05-11 03:43:12'),
(10, 10, 0.33634973086515, 0.66365026913485, 'ASD', '2021-05-15 00:28:47'),
(11, 11, 0.49208596506734, 0.50791403493266, 'ASD', '2021-05-17 02:07:08'),
(12, 12, 0.33634973086515, 0.66365026913485, 'ASD', '2021-05-17 02:09:22'),
(13, 13, 0.49208596506734, 0.50791403493266, 'ASD', '2021-05-17 02:10:56'),
(14, 14, 0.49208596506734, 0.50791403493266, 'ASD', '2021-05-17 02:20:04'),
(15, 15, 0.49808492618997, 0.50191507381003, 'ASD', '2021-05-17 02:39:32'),
(16, 16, 0.33634973086515, 0.66365026913485, 'ASD', '2021-05-17 02:41:05'),
(17, 17, 0.4094723990906, 0.5905276009094, 'ASD', '2021-05-17 05:24:55'),
(18, 18, 0.85809633197921, 0.14190366802079, 'Normal', '2021-05-17 05:25:55'),
(19, 19, 0.92553441199102, 0.074465588008983, 'Normal', '2021-05-19 10:40:39'),
(20, 20, 0.92553441199102, 0.074465588008983, 'Normal', '2021-05-19 10:45:29'),
(21, 21, 0.92553441199102, 0.074465588008983, 'Normal', '2021-05-19 15:09:45'),
(22, 22, 0.92553441199102, 0.074465588008983, 'Normal', '2021-05-19 15:18:57'),
(23, 26, 0.0000017570128177644, 0.99999824298718, 'ASD', '2021-05-19 22:16:22'),
(24, 27, 0.089207121737948, 0.91079287826205, 'ASD', '2021-05-19 22:19:52'),
(25, 28, 0.99984783317745, 0.00015216682255138, 'Normal', '2021-05-19 22:20:19'),
(26, 29, 0.85809633197921, 0.14190366802079, 'Normal', '2021-05-19 22:23:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`id_dataset`);

--
-- Indexes for table `data_latih`
--
ALTER TABLE `data_latih`
  ADD PRIMARY KEY (`id_latih`);

--
-- Indexes for table `data_uji`
--
ALTER TABLE `data_uji`
  ADD PRIMARY KEY (`id_uji`);

--
-- Indexes for table `data_uji_user`
--
ALTER TABLE `data_uji_user`
  ADD PRIMARY KEY (`id_uji_user`);

--
-- Indexes for table `hasil_uji`
--
ALTER TABLE `hasil_uji`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_uji_user` (`id_uji_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dataset`
--
ALTER TABLE `dataset`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `data_latih`
--
ALTER TABLE `data_latih`
  MODIFY `id_latih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `data_uji`
--
ALTER TABLE `data_uji`
  MODIFY `id_uji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT for table `data_uji_user`
--
ALTER TABLE `data_uji_user`
  MODIFY `id_uji_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `hasil_uji`
--
ALTER TABLE `hasil_uji`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_uji`
--
ALTER TABLE `hasil_uji`
  ADD CONSTRAINT `hasil_uji_ibfk_1` FOREIGN KEY (`id_uji_user`) REFERENCES `data_uji_user` (`id_uji_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
