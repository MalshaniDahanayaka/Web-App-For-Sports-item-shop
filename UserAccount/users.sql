-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 29, 2021 at 03:33 PM
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
-- Database: `login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` text NOT NULL,
  `validation_code` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `validation_code`, `active`) VALUES
(10, 'ddd', 'ddd', 'ddd', 'mithun@ghami.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2f7892d750b10e94f2c50427055297d9', 0),
(12, 'gggggg', 'ggggggg', 'gggggggg', 'gggggg@gggg.fffff', '71f396e4134a1160d90bb1439876df31', '1aefe9399568ea0f258be5242097a600', 0),
(14, 'aaaa', 'aaaa', 'aaaa', 'aaaa@a.a', '74b87337454200d4d33f80c4663dc5e5', '9300011b8c4675d5cc299cc1d0a6db4c', 0),
(18, 'kasun', 'kasun', 'kasun', 'kasun@gmail.com', 'a7ec7f64c1a11102a16ed9ba938d20a8', 'a71cc13e82170b246115f861e958a038', 0),
(19, 'malshani', 'malshani', 'malshani', 'malshani@gmail.com', 'a5e368dd93b704041191315ca39d5a1d', 'a599a953a4e6365fd5e20a29ce648c90', 0),
(20, 'pubudu', 'pubudu', 'pubudu', 'pubudu@gmail.com', '1b1f881749f75e4c45ccdb37af1f1cc6', '45b5e9d2dd6b53e40c3d0d3a4e0e4f7f', 0),
(21, 'vvv', 'vvv', 'vvv', 'vvv@v.v', '4786f3282f04de5b5c7317c490c6d922', '0e55d016e3b7562606d89049cec1c224', 0),
(32, 'register_email', 'register_email', 'register_email', 'register_email', 'be8c63e9c93523fc8393fde1e51488e1', '84e108adf0729a8aa616cbb518c4e675', 0),
(34, 'sfb', 'sfb', 'sfb', 'sfb', '4baa53eaabdc41d95d3bcd0e7bbc9e00', 'b63a8380b2ebc0a1a5f5a326ad0dcf4e', 0),
(55, 'mithunyehansa', 'mithunyehansa', 'mithunyehansa', 'mithunyehansa@gmail.com', '1decea4168a5f2a5da6345afc83eb7ac', '0', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
