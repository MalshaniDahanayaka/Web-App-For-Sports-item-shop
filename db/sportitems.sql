-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 24, 2021 at 06:42 PM
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
-- Table structure for table `discounteditems`
--

DROP TABLE IF EXISTS `discounteditems`;
CREATE TABLE IF NOT EXISTS `discounteditems` (
  `id` varchar(60) NOT NULL,
  `discount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discounteditems`
--

INSERT INTO `discounteditems` (`id`, `discount`) VALUES
('CriBatnik4', 0.05),
('VbaBalnik3', 0.05),
('BasBalMik1', 0.1),
('BatBatnik4', 0.1),
('BatBatnikmed', 0.05),
('VbaShoadiext', 0.25);

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
  `size` varchar(12) NOT NULL,
  `prize` float NOT NULL,
  `countOfItems` int(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `imagePath` varchar(150) NOT NULL,
  `solds` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `sportName`, `productType`, `brand`, `size`, `prize`, `countOfItems`, `category`, `imagePath`, `solds`) VALUES
('CriBatnik4', 'Cricket', 'Bat', 'nike', 'large', 25000, 6, 'Team Sports', 'img/9.jpg', 2),
('VbaBalnik3', 'Vball', 'Ball', 'nike', 'small', 45600, 5, 'Team Sports', 'img/8.jpg', 1),
('BasBalMik1', 'Basket Ball', 'Ball', 'Mikasa', 'small', 3400, 8, 'Running and Fitness', 'img/3.jpg', 4),
('BatBatnik4', 'Batminton', 'Bat', 'nike', 'small', 44300, 5, 'Home Play', 'img/1.jpg', 4),
('BatBatnikmed', 'Batminton', 'Bat', 'nike', 'medium', 56500, 5, 'Home Play', 'img/6.jpg', 2),
('CriBatadimed', 'Cricket', 'Bat', 'adidas', 'medium', 35200, 7, 'Team Sports', 'img/9.jpg', 4),
('VbaBatMikmed', 'Vball', 'Bat', 'Mikasa', 'medium', 3535, 8, 'Team Sports', 'img/2.jpg', 2),
('VbaShoadiext', 'Vball', 'Shoes', 'adidas', 'extra large', 34750, 5, 'Team Sports', 'img/11.jpg', 1),
('BasShoPumlar', 'Basket Ball', 'Shoes', 'Puma', 'large', 43434300, 56645, 'Running and Fitness', 'img/7.jpg', 3),
('VbaShoMikext', 'Vball', 'Shoes', 'Mikasa', 'extra large', 534523, 105252, 'Team Sports', 'img/4.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` varchar(30) NOT NULL,
  `count` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `soldDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `count`, `price`, `email`, `soldDate`) VALUES
('CriBatadimed', 3, 564644, 'km@gmail.com', '2021-09-17 18:30:00'),
('VbaBatMikmed', 4, 3535, 'sm@gmail.com', '2021-09-17 18:30:00'),
('VbaShoadiext', 2, 324242, 'hg@gmail.com', '2021-09-17 18:30:00'),
('BasShoPumlar', 5, 43342, 'dm@gmail.com', '2021-09-17 18:30:00'),
('VbaShoMikex', 5, 43424, 'kt@gmail.com', '2021-09-17 18:30:00'),
('CriBatnik4', 2, 343434, 'kh@gmail.com', '2021-09-17 18:30:00'),
('VbaBalnik3', 6, 324242, 'hd@gmail.com', '2021-09-17 18:30:00'),
('BasBalMik1', 4, 24242, 'na@gmail.com', '2021-09-17 18:30:00'),
('BatBatnik4', 4, 342233, 'uh@gmail.com', '2021-09-17 18:30:00'),
('CriBatadimed', 3, 564644, 'km@gmail.com', NULL),
('CriBatadimed', 3, 564644, 'km@gmail.com', '2021-09-18 18:30:00'),
('CriBatadimed', 3, 564644, 'tf@gmail.com', '2021-09-19 09:46:04'),
('CriBatadimed', 3, 564644, 'km@gmail.com', '2021-09-19 09:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(30) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `verifiedEmail` int(2) NOT NULL,
  `registerDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `username`, `password`, `verifiedEmail`, `registerDate`) VALUES
('km@gmail.com', 'mithunooo', 'madhumal', 1, '2021-09-18 11:46:31'),
('hg@gmail.com', 'haritha', 'haritha', 0, '2021-09-18 11:46:31'),
('tf@gmail.com', 'tiruni', 'tiruni', 1, '2021-09-18 13:00:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
