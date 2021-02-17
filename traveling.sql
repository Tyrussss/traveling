-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2021 at 10:40 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traveling`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `idtour` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Images_fk0` (`idtour`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tourbooking`
--

DROP TABLE IF EXISTS `tourbooking`;
CREATE TABLE IF NOT EXISTS `tourbooking` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idtour` int(255) NOT NULL,
  `namecustomer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `Tourbooking_fk0` (`idtour`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tourdetail`
--

DROP TABLE IF EXISTS `tourdetail`;
CREATE TABLE IF NOT EXISTS `tourdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtour` int(11) NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Tourdetail_fk0` (`idtour`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
CREATE TABLE IF NOT EXISTS `tours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `place` text COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `traveltype` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Tours_fk0` (`author`),
  KEY `Tours_fk1` (`zone`),
  KEY `Tours_fk2` (`traveltype`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `name`, `price`, `time`, `place`, `note`, `author`, `zone`, `status`, `traveltype`) VALUES
(1, 'Đà nẵng - Huế', '4.800.000', 5, 'VINWONDERS - THÁP BÀ - CHÙA LONG SƠN - DU NGOẠN ĐẢO - DINH BẢO ĐẠI - THÁC DANTALA - VƯỜN HOA THÀNH PHỐ - NHÀ THỜ', NULL, 'admin', 'Đà nẵng - Huế', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `traveltype`
--

DROP TABLE IF EXISTS `traveltype`;
CREATE TABLE IF NOT EXISTS `traveltype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traveltype`
--

INSERT INTO `traveltype` (`id`, `name`) VALUES
(1, 'Tour trong nước'),
(2, 'Tour ngoài nước'),
(3, 'Tour hằng ngày'),
(4, 'Tour dài ngày');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `permission` int(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fullname`, `email`, `phonenumber`, `avatar`, `permission`) VALUES
('admin', 'd9b1d7db4cd6e70935368a1efb10e377', 'Nguyễn Nho Chí Thiện', 'thiendt1608@gmail.com', '0986719762', 'avatar.jpg', 1),
('thien', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Nho Chí Thiện', 'thiendt16082005@gmail.com', '0123456789', 'wall1.jpg', 2),
('thanh', '202cb962ac59075b964b07152d234b70', 'Nguyễn Nho Chí Thanh', 'thanhdt1701@gmail.com', '0999999999', 'wall2.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

DROP TABLE IF EXISTS `zone`;
CREATE TABLE IF NOT EXISTS `zone` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`id`, `name`) VALUES
('tphcm', 'Thành Phố Hồ Chí Minh'),
('hanoi', 'Hà Nội'),
('danang', 'Đà Nẵng'),
('vungtau', 'Vũng Tàu'),
('hue', 'Huế');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
