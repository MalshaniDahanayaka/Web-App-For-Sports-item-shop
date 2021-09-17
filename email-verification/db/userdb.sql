-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 17, 2021 at 05:36 AM
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
-- Database: `userdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email_address` text NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `password`, `email_address`, `verification_code`, `is_active`) VALUES
(1, 'Malshani Mekala Dahanayaka', '1234', 'mekaladahanayaka80@gmail.com', 'da5d6fade8c3992b5c8ae0ca195c93aa5eeb51db', 0),
(2, 'Malshani Mekala Dahanayaka', '1234', 'mekaladahanayaka80@gmail.com', '91bfc530a1364513e22daf46a1de822ceadf44b0', 0),
(3, 'Malshani Mekala Dahanayaka', '1234', 'mekaladahanayaka80@gmail.com', 'ac868959f0720d658258e6e5ed861c0b30c39442', 0),
(4, 'Malshani Mekala Dahanayaka', '1234', 'mekaladahanayaka80@gmail.com', 'fda285c0caa03f61f2ef282250d5d393c58c94ed', 0),
(5, 'Malshani Mekala Dahanayaka', '1234', 'mekaladahanayaka80@gmail.com', '6c95f30fcbb42da562f9279bd1f6cb3e77f07ad5', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
