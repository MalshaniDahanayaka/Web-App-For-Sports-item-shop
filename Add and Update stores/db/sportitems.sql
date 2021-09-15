-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 15, 2021 at 12:07 PM
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
-- Database: `sportitems`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` varchar(60) NOT NULL,
  `sportName` varchar(40) NOT NULL,
  `productType` varchar(40) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `size` int(12) NOT NULL,
  `prize` int(40) NOT NULL,
  `countOfItems` int(20) NOT NULL,
  `imagePath` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `sportName`, `productType`, `brand`, `size`, `prize`, `countOfItems`, `imagePath`) VALUES
('CriBatnik4', 'Cricket', 'Bat', 'nike', 4, 34523, 6, 'img/9.jpg'),
('VbaBalnik3', 'Vball', 'Ball', 'nike', 3, 456666, 5, 'img/8.jpg'),
('BasBalMik1', 'Basket Ball', 'Ball', 'Mikasa', 1, 3456, 8, 'img/3.jpg'),
('BatBatnik4', 'Batminton', 'Bat', 'nike', 4, 443353, 5, 'img/1.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
