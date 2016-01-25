-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2016 at 07:38 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kahar`
--
CREATE DATABASE IF NOT EXISTS `kahar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kahar`;

-- --------------------------------------------------------

--
-- Table structure for table `bps`
--

CREATE TABLE IF NOT EXISTS `bps` (
  `id` int(8) NOT NULL,
  `nomorbps` int(8) NOT NULL,
  `npwp` char(15) NOT NULL,
  `tanggalterima` date NOT NULL,
  `jenisspt` int(1) NOT NULL,
  `tahunpajak` int(4) NOT NULL,
  `statusbayar` int(1) NOT NULL,
  `nominal` int(30) NOT NULL,
  `nominalcurr` int(1) NOT NULL,
  `tanggalbayar` date NOT NULL,
  `reskom` int(1) NOT NULL,
  `pembetulan` int(1) NOT NULL,
  `angsuranps25` int(30) NOT NULL,
  `espt` tinyint(1) NOT NULL,
  `perekam` char(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bps`
--

INSERT INTO `bps` (`id`, `nomorbps`, `npwp`, `tanggalterima`, `jenisspt`, `tahunpajak`, `statusbayar`, `nominal`, `nominalcurr`, `tanggalbayar`, `reskom`, `pembetulan`, `angsuranps25`, `espt`, `perekam`) VALUES
(1, 1, '073017337432000', '2016-01-25', 3, 2015, 1, 0, 0, '0000-00-00', 0, 0, 0, 0, '060109162'),
(2, 2, '073017337432000', '2016-01-25', 3, 2015, 1, 0, 0, '0000-00-00', 0, 0, 0, 0, '060109162'),
(3, 3, '073017337432000', '2016-01-25', 3, 2015, 1, 0, 0, '0000-00-00', 0, 0, 0, 0, '060109162'),
(4, 4, '241986967521000', '2016-01-25', 4, 2015, 1, 0, 0, '0000-00-00', 0, 0, 0, 0, '060109162'),
(5, 5, '073017337432000', '2016-01-25', 3, 2015, 1, 0, 0, '0000-00-00', 0, 0, 0, 1, '060109162'),
(6, 6, '072861313002000', '2016-01-25', 1, 2015, 2, 500000, 0, '2016-01-25', 0, 0, 0, 0, '060109162'),
(7, 7, '242062123004000', '2016-01-25', 1, 2012, 3, 1000000, 0, '0000-00-00', 1, 0, 5000, 0, '060109162'),
(8, 8, '072861313002000', '2016-01-25', 3, 2014, 1, 0, 0, '0000-00-00', 0, 0, 0, 1, '060109162'),
(9, 9, '241986967521000', '2016-01-25', 2, 2015, 1, 0, 0, '0000-00-00', 0, 0, 0, 0, '060109162'),
(10, 10, '072861313002000', '2016-01-25', 3, 2015, 1, 0, 0, '0000-00-00', 0, 0, 0, 0, '060109162'),
(11, 11, '241986967521000', '2016-01-25', 3, 2015, 1, 0, 0, '0000-00-00', 0, 0, 0, 0, '060109162'),
(12, 12, '073017337432000', '2016-01-25', 3, 2015, 1, 0, 0, '0000-00-00', 0, 0, 0, 0, '060109162'),
(13, 13, '242062123004000', '2016-01-25', 3, 2015, 1, 0, 0, '0000-00-00', 0, 0, 0, 1, '060109162');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` tinyint(2) NOT NULL,
  `parent` tinyint(3) NOT NULL,
  `link` varchar(255) NOT NULL,
  `definisi` varchar(255) NOT NULL,
  `seksi` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent`, `link`, `definisi`, `seksi`, `role`) VALUES
(1, 0, '#', 'Admin', 1, 2),
(2, 0, '#', 'BA', 1, 1),
(3, 0, '#', 'BPS', 1, 1),
(8, 2, 'listba', 'Cetak', 1, 1),
(6, 3, 'forminput', 'Rekam', 1, 1),
(9, 3, 'listbps', 'Cetak Ulang', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nip` varchar(9) CHARACTER SET utf8 NOT NULL,
  `nippanjang` varchar(18) NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` int(6) NOT NULL,
  `seksi` int(1) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `nippanjang`, `nama`, `password`, `seksi`, `role`) VALUES
('060109162', '198603092004121003', 'Esha Indra S', 123456, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bps`
--
ALTER TABLE `bps`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD UNIQUE KEY `id` (`id`), ADD KEY `class` (`parent`,`link`,`definisi`,`seksi`,`role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `nip` (`nip`), ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bps`
--
ALTER TABLE `bps`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
