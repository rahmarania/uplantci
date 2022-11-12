-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 01:37 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uplant`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-11-04-160917', 'App\\Database\\Migrations\\Tanaman', 'default', 'App', 1667579174, 1);

-- --------------------------------------------------------

--
-- Table structure for table `uplant`
--

CREATE TABLE `uplant` (
  `id_tanaman` int(5) UNSIGNED NOT NULL,
  `nama_tanaman` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nama_ilmiah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uplant`
--

INSERT INTO `uplant` (`id_tanaman`, `nama_tanaman`, `jenis`, `nama_ilmiah`) VALUES
(22, 'Selada', 'Tanaman Hidroponik', 'Lactuca sativa L'),
(23, 'Pakcoy', 'Tanaman Hidroponik', 'Brassica rapa subsp. Chinensis'),
(24, 'Ceri', 'Tanaman Buah', 'Prunus subg. Cerasus'),
(25, 'Rambutan', 'Tanaman Buah', 'Nephelium jappaceum'),
(26, 'Cabe Rawit', 'Tanaman Sayur', 'Capsicum frutescens '),
(27, 'Tomat', 'Tanaman Sayur', 'Solanum lycopersicum'),
(28, 'Keladi Wayang', 'Tanaman Hias', 'Caladium alocasia'),
(29, 'Samber Lilin', 'Tanaman Hias', 'Strobilanthes dyerianus'),
(30, 'Tanaman Kaktus Belimbing Own Root', 'Tanaman Hias', 'Noto cactus'),
(31, 'Tanaman Keladi Wayang', 'Tanaman Hias', 'Caladium alocasia'),
(32, 'Tanaman Kaktus Belimbing Own Root', 'Tanaman Hias', 'Noto cactus'),
(33, 'Tanaman Keladi Wayang', 'Tanaman Hias', 'Caladium alocasia'),
(34, 'Daun Mint', 'Tanaman Obat', 'Spearmint(Mentha spicata)'),
(35, 'Selada', 'Tanaman Hidroponik', 'Lactuca sativa L'),
(36, 'Pakcoy', 'Tanaman Hidroponik', 'Brassica rapa subsp. Chinensis'),
(37, 'Ceri', 'Tanaman Buah', 'Prunus subg. Cerasus'),
(38, 'Rambutan', 'Tanaman Buah', 'Nephelium jappaceum'),
(39, 'Cabe Rawit', 'Tanaman Sayur', 'Capsicum frutescens '),
(40, 'Tomat', 'Tanaman Sayur', 'Solanum lycopersicum'),
(41, 'Keladi Wayang', 'Tanaman Hias', 'Caladium alocasia'),
(42, 'Samber Lilin', 'Tanaman Hias', 'Strobilanthes dyerianus'),
(43, 'Daun Mint', 'Tanaman Obat', 'Spearmint(Mentha spicata)'),
(44, 'Selada', 'Tanaman Hidroponik', 'Lactuca sativa L'),
(45, 'Pakcoy', 'Tanaman Hidroponik', 'Brassica rapa subsp. Chinensis'),
(46, 'Ceri', 'Tanaman Buah', 'Prunus subg. Cerasus'),
(47, 'Rambutan', 'Tanaman Buah', 'Nephelium jappaceum'),
(48, 'Cabe Rawit', 'Tanaman Sayur', 'Capsicum frutescens '),
(49, 'Tomat', 'Tanaman Sayur', 'Solanum lycopersicum'),
(50, 'Keladi Wayang', 'Tanaman Hias', 'Caladium alocasia'),
(51, 'Samber Lilin', 'Tanaman Hias', 'Strobilanthes dyerianus'),
(52, 'Daun Mint', 'Tanaman Obat', 'Spearmint(Mentha spicata)'),
(53, 'Selada', 'Tanaman Hidroponik', 'Lactuca sativa L'),
(54, 'Pakcoy', 'Tanaman Hidroponik', 'Brassica rapa subsp. Chinensis'),
(55, 'Ceri', 'Tanaman Buah', 'Prunus subg. Cerasus'),
(56, 'Rambutan', 'Tanaman Buah', 'Nephelium jappaceum'),
(57, 'Cabe Rawit', 'Tanaman Sayur', 'Capsicum frutescens '),
(58, 'Tomat', 'Tanaman Sayur', 'Solanum lycopersicum'),
(59, 'Keladi Wayang', 'Tanaman Hias', 'Caladium alocasia'),
(60, 'Samber Lilin', 'Tanaman Hias', 'Strobilanthes dyerianus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uplant`
--
ALTER TABLE `uplant`
  ADD PRIMARY KEY (`id_tanaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uplant`
--
ALTER TABLE `uplant`
  MODIFY `id_tanaman` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
