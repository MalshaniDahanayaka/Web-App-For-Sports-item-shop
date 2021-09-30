-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 30, 2021 at 06:57 PM
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
-- Database: `team 08`
--
CREATE DATABASE IF NOT EXISTS `team 08` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `team 08`;

-- --------------------------------------------------------

--
-- Table structure for table `adimin`
--

DROP TABLE IF EXISTS `adimin`;
CREATE TABLE IF NOT EXISTS `adimin` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adimin`
--

INSERT INTO `adimin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `email` varchar(40) NOT NULL,
  `id` varchar(40) NOT NULL,
  `count` int(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
('CriBatvillar', 0.05),
('SwiJerMaslar', 0.05),
('CheCheOth-', 0.1),
('GolBatkoo-', 0.1),
('arcBowMas-', 0.05),
('BasBalvil-', 0.25),
('FooShiniklar', 0.5),
('YogYogPumlar', 0.05);

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
  `prize` int(40) NOT NULL,
  `countOfItems` int(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `imagePath` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `sportName`, `productType`, `brand`, `size`, `prize`, `countOfItems`, `category`, `imagePath`, `description`) VALUES
('FooBalMol-', 'FootBall', 'Ball', 'Molten', '-', 5200, 6, 'Team Sports', 'img/FooBalMol-.jpg', 'Entry Level Training Footballs made with Imported PVC, Machine Stitched, Soft Touch and available in Vibrant Colors and Designs.'),
('FooBalkap-', 'FootBall', 'Ball', 'kappa', '-', 4800, 7, 'Team Sports', 'img/FooBalkap-.jpg', 'Entry-Level Training Footballs made with Imported PVC, Machine Stitched, Soft Touch and available in Vibrant Colors and Designs.'),
('FooShoPum6', 'FootBall', 'Shoes', 'Puma', '6', 12900, 8, 'Team Sports', 'img/FooShoPum6.jpg', 'Buy high quality football shoes online for best prices. Visit our online store and check the prices of high quality Cosco football shoes for affordable prices. We deliver items to your doorstep'),
('FooShoadi8', 'FootBall', 'Shoes', 'adidas', '8', 14700, 4, 'Team Sports', 'img/FooShoadi8.jpg', 'Buy high quality football shoes online for best prices. Visit our online store and check the prices of high quality Cosco football shoes for affordable prices. We deliver items to your doorstep'),
('FooShoPum5', 'FootBall', 'Shoes', 'Puma', '5', 12500, 3, 'Team Sports', 'img/FooShoPum5.jpg', 'Buy high quality football shoes online for best prices. Visit our online store and check the prices of high quality Cosco football shoes for affordable prices. We deliver items to your doorstep'),
('FooShoadi10', 'FootBall', 'Shoes', 'adidas', '10', 15000, 0, 'Team Sports', 'img/FooShoadi10.jpg', 'Buy high quality football shoes online for best prices. Visit our online store and check the prices of high quality Cosco football shoes for affordable prices. We deliver items to your doorstep'),
('FooGlonikmed', 'FootBall', 'Gloves', 'nike', 'medium', 3100, 23, 'Team Sports', 'img/FooGlonikmed.jpg', 'Buy high quality football gloves online for best prices. Visit our online store and check the prices of high quality Cosco football gloves for affordable prices. We deliver items to your doorstep'),
('FooShinikmed', 'FootBall', 'Shin Guards', 'nike', 'medium', 2300, 1, 'Team Sports', 'img/FooShinikmed.jpg', 'Buy high quality shin guards online for best prices. Visit our online store and check the prices of high quality Cosco shin guards for affordable prices. We deliver items to your doorstep.'),
('FooShiniklar', 'FootBall', 'Shin Guards', 'nike', 'large', 2900, 18, 'Team Sports', 'img/FooShiniklar.jpg', 'Buy high quality shin guards online for best prices. Visit our online store and check the prices of high quality Cosco shin guards for affordable prices. We deliver items to your doorstep.'),
('FooShiniksma', 'FootBall', 'Shin Guards', 'nike', 'small', 2700, 21, 'Team Sports', 'img/FooShiniksma.jpg', 'Buy high quality shin guards online for best prices. Visit our online store and check the prices of high quality Cosco shin guards for affordable prices. We deliver items to your doorstep.'),
('FooJerOthmed', 'FootBall', 'Jersey', 'Other', 'medium', 670, 2, 'Team Sports', 'img/FooJerOthmed.jpg', 'Buy high quality football jersey online for best prices. Visit our online store and check the prices of high quality Cosco foot ball jersey for affordable prices. We deliver items to your doorstep.'),
('FooJerOthlar', 'FootBall', 'Jersey', 'Other', 'large', 900, 11, 'Team Sports', 'img/FooJerOthlar.jpg', 'Buy high quality football jersey online for best prices. Visit our online store and check the prices of high quality Cosco foot ball jersey for affordable prices. We deliver items to your doorstep.'),
('FooShoOthlar', 'FootBall', 'Shorts', 'Other', 'large', 590, 1, 'Team Sports', 'img/FooShoOthlar.jpg', 'Buy high quality football shorts online for best prices. Visit our online store and check the prices of high quality Cosco foot ball shorts for affordable prices. We deliver items to your doorstep.'),
('CriHelMasmed', 'Cricket', 'Helmet', 'Masuri', 'medium', 4700, 21, 'Team Sports', 'img/CriHelMasmed.jpg', 'Buy high quality cricket helmet online for best prices. Visit our online store and check the prices of high quality Cosco cricket helmet for affordable prices. We deliver items to your doorstep.'),
('CriHelMaslar', 'Cricket', 'Helmet', 'Masuri', 'large', 5300, 9, 'Team Sports', 'img/CriHelMaslar.jpg', 'Buy high quality cricket helmet online for best prices. Visit our online store and check the prices of high quality Cosco cricket helmet for affordable prices. We deliver items to your doorstep.'),
('CriHelOthmed', 'Cricket', 'Helmet', 'Other', 'medium', 3900, 1, 'Team Sports', 'img/CriHelOthmed.jpg', 'Buy high quality cricket helmet online for best prices. Visit our online store and check the prices of high quality Cosco cricket helmet for affordable prices. We deliver items to your doorstep.'),
('CriBatvillar', 'Cricket', 'Batting Gloves', 'vilson', 'large', 4600, 6, 'Team Sports', 'img/CriBatvillar.jpg', 'Gima Batting Inner Cotton Plain is Highest Quality Fingerless Gloves'),
('CriBatvilsma', 'Cricket', 'Batting Gloves', 'vilson', 'small', 4200, 21, 'Team Sports', 'img/CriBatvilsma.jpg', 'Gima Batting Inner Cotton Plain is Highest Quality Fingerless Gloves'),
('CriBatOthmed', 'Cricket', 'Batting Gloves', 'Other', 'medium', 3600, 11, 'Team Sports', 'img/CriBatOthmed.jpg', 'Gima Batting Inner Cotton Plain is Highest Quality Fingerless Gloves'),
('CriThiadilar', 'Cricket', 'Thigh Pads', 'adidas', 'large', 1600, 1, 'Team Sports', 'img/CriThiadilar.jpg', 'Gima Molded Thigh pad Both Side Highest Quality Cricket Thigh Pads'),
('CriThiPumlar', 'Cricket', 'Thigh Pads', 'Puma', 'large', 1800, 5, 'Team Sports', 'img/CriThiPumlar.jpg', 'Gima Molded Thigh pad Both Side Highest Quality Cricket Thigh Pads'),
('CriGriMik-', 'Cricket', 'Grips', 'Mikasa', '-', 550, 44, 'Team Sports', 'img/CriGriMik-.jpg', 'Best Cricket Bat Grips\r\n\r\n– Gripper Design\r\n– Chevron Design\r\n– Scale Design\r\n– Octopus Design with Plain Mix Colors.'),
('CriGrinik-', 'Cricket', 'Grips', 'nike', '-', 600, 75, 'Team Sports', 'img/CriGrinik-.jpg', 'Best Cricket Bat Grips\r\n\r\n– Gripper Design\r\n– Chevron Design\r\n– Scale Design\r\n– Octopus Design with Plain Mix Colors.'),
('CriChekoomed', 'Cricket', 'Chest Guard', 'kookaburra', 'medium', 1360, 5, 'Team Sports', 'img/CriChekoomed.jpg', 'Gima Molded Chest Guard Made from Lightweight Low Density Both Side'),
('CriCheMollar', 'Cricket', 'Chest Guard', 'Molten', 'large', 1500, 5, 'Team Sports', 'img/CriCheMollar.jpg', 'Gima Molded Chest Guard Made from Lightweight Low Density Both Side'),
('CriKeeadilar', 'Cricket', 'Keeping Gloves', 'adidas', 'large', 2300, 7, 'Team Sports', 'img/CriKeeadilar.jpg', 'Dipak Wicket Keeping Inner Cotton Plain is Highest Quality Gloves'),
('CriKeeniklar', 'Cricket', 'Keeping Gloves', 'nike', 'large', 2700, 2, 'Team Sports', 'img/CriKeeniklar.jpg', 'Dipak Wicket Keeping Inner Cotton Plain is Highest Quality Gloves'),
('CriBalkoo-', 'Cricket', 'Ball', 'kookaburra', '-', 3700, 2, 'Team Sports', 'img/CriBalkoo-.jpg', 'Gima Power (RED) Cricket Leather Ball is Highest Quality Ball'),
('BasBalvil-', 'Basket Ball', 'Ball', 'vilson', '-', 6800, 6, 'Team Sports', 'img/BasBalvil-.jpg', 'The mikasa Durable and Long Lasting Orange Basketball for all Recreational Play.\r\n\r\nMulti Sizes are Available.'),
('BasBalOth-', 'Basket Ball', 'Ball', 'Other', '-', 4800, 3, 'Team Sports', 'img/BasBalOth-.jpg', 'The mikasa Durable and Long Lasting Orange Basketball for all Recreational Play.\r\n\r\nMulti Sizes are Available.'),
('BasNetPum-', 'Basket Ball', 'Net', 'Puma', '-', 900, 3, 'Team Sports', 'img/BasNetPum-.jpg', 'Basketball Net. Thick Colour, P.P. Silky Finish Net.'),
('BasShonik8', 'Basket Ball', 'Shoes', 'nike', '8', 15000, 3, 'Team Sports', 'img/BasShonik8.jpg', 'Winmark Basketball Shoes – Highest Quality Lightweight Professional Shoes.'),
('BasJerPumlar', 'Basket Ball', 'Jersey', 'Puma', 'large', 780, 3, 'Team Sports', 'img/BasJerPumlar.jpg', 'Buy high quality Basketball jersey online for best prices. Visit our online store and check the prices of high quality Cosco Basketball jersey for affordable prices. We deliver items to your doorstep.'),
('BasJerMikmed', 'Basket Ball', 'Jersey', 'Mikasa', 'medium', 670, 2, 'Team Sports', 'img/BasJerMikmed.jpg', 'Buy high quality Basketball jersey online for best prices. Visit our online store and check the prices of high quality Cosco Basketball jersey for affordable prices. We deliver items to your doorstep.'),
('BatRacadi-', 'Batminton', 'Racket', 'adidas', '-', 6000, 0, 'Team Sports', 'img/BatRacadi-.jpg', 'Included: Turbo – 2 rackets, 6 Shuttles, and badminton net. Home Use Only, Not Branded'),
('BatRacnik-', 'Batminton', 'Racket', 'nike', '-', 3500, 4, 'Team Sports', 'img/BatRacnik-.jpg', 'Included: Turbo – 2 rackets, 6 Shuttles, and badminton net. Home Use Only, Not Branded'),
('BatShuMik-', 'Batminton', 'Shuttlecock', 'Mikasa', '-', 400, 3, 'Team Sports', 'img/BatShuMik-.jpg', 'Buy High Quality Badminton Shuttlecock and Badminton Accessories Online. Visit our online store and order high quality badminton shuttlecock and other Badminton Accessories online. We deliver items to your doorstep.'),
('NetBaladi-', 'NetBall', 'Ball', 'adidas', '-', 5700, 4, 'Team Sports', 'img/NetBaladi-.jpg', 'Entry Level Training Netballs made with Imported PVC, Machine Stitched, Soft Touch and available in Vibrant Colors and Designs.'),
('RugBalMik-', 'Rugby', 'Ball', 'Mikasa', '-', 5800, 4, 'Team Sports', 'img/RugBalMik-.jpg', 'Entry Level Training Rugby made with Imported PVC, Machine Stitched, Soft Touch and available in Vibrant Colors and Designs.'),
('RugJerkapmed', 'Rugby', 'Jersey', 'kappa', 'medium', 2300, 3, 'Team Sports', 'img/RugJerkapmed.jpg', 'Buy high quality Rugby jersey online for best prices. Visit our online store and check the prices of high quality Cosco Rugby jersey for affordable prices. We deliver items to your doorstep.'),
('WatBalMik-', 'Water Polo', 'Ball', 'Mikasa', '-', 3400, 2, 'Team Sports', 'img/WatBalMik-.jpg', 'Entry Level Training waterpolo made with Imported PVC, Machine Stitched, Soft Touch and available in Vibrant Colors and Designs.'),
('HanBalPum-', 'HandBall', 'Ball', 'Puma', '-', 3400, 1, 'Team Sports', 'img/HanBalPum-.jpg', 'Entry Level Training handballball made with Imported PVC, Machine Stitched, Soft Touch and available in Vibrant Colors and Designs.'),
('VbaBalMik-', 'Vball', 'Ball', 'Mikasa', '-', 4500, 4, 'Team Sports', 'img/VbaBalMik-.jpg', 'The eight panel design allows the fingers more surface contact for better sets and passing. Official size and weight.'),
('VbaNetPum-', 'Vball', 'Net', 'Puma', '-', 2300, 4, 'Team Sports', 'img/VbaNetPum-.jpg', '– Simple and portable\r\n– Standard sports volleyball net, size 9.5 m x 1 m.\r\n– Color: White\r\n– Material: PE, four-sided thickened canvas, beautiful and durable.\r\n– The wire rope runs directly through the net and can be used directly on the grid.\r\n– It is resistant to weathering and is sun proof and rainproof for competition and training.\r\n– Suitable for outdoor games with family or friends anytime, anywhere.'),
('VbaKnenik-', 'Vball', 'Knee Gaurd', 'nike', '-', 1600, 4, 'Team Sports', 'img/VbaKnenik-.jpg', 'To therapy and velication you knee. Provide under prop and protect your muscle. Easy to wear, suitable for any sports.'),
('VbaShonikmed', 'Vball', 'Shorts', 'nike', 'medium', 750, 3, 'Team Sports', 'img/VbaShonikmed.jpg', 'Buy high quality volleyball shorts online for best prices. Visit our online store and check the prices of high quality Cosco volleyball shorts for affordable prices. We deliver items to your doorstep.'),
('SwiJerMaslar', 'Swiming', 'Jersey', 'Masuri', 'large', 5300, 8, 'Running and Fitness', 'img/SwiJerMaslar.jpg', 'Buy high quality swiming jersey online for best prices. Visit our online store and check the prices of high quality Cosco swimming jersey for affordable prices. We deliver items to your doorstep.'),
('AthShonikext', 'Athlatic', 'Shorts', 'nike', 'extra large', 560, 5, 'Running and Fitness', 'img/AthShonikext.jpg', 'Buy high quality Athlatic shorts online for best prices. Visit our online store and check the prices of high quality Cosco Athlatic shorts for affordable prices. We deliver items to your doorstep.'),
('AthJerFrasma', 'Athlatic', 'Jersey', 'Franklin', 'small', 950, 4, 'Running and Fitness', 'img/AthJerFrasma.jpg', 'Buy high quality Athlatic jersey online for best prices. Visit our online store and check the prices of high quality Cosco Athlatic jersey shorts for affordable prices. We deliver items to your doorstep.'),
('GymWeikap5kg', 'Gym items', 'Weight Plate', 'kappa', '5kg', 1500, 9, 'Running and Fitness', 'img/GymWeikap5kg.jpg', 'weight platter target specific muscle group exercises or a full body workout'),
('BoxGloPumlar', 'Boxing', 'Gloves', 'Puma', 'large', 4000, 4, 'Running and Fitness', 'img/BoxGloPumlar.jpg', 'Dipak Supremo Boxing Gloves is Highest Quality Gloves'),
('KarJerFralar', 'Karate', 'Jersey', 'Franklin', 'large', 4800, 3, 'Running and Fitness', 'img/KarJerFralar.jpg', 'Buy high-quality karate jerseys online for the best prices. Visit our online store and check the prices of high-quality Cosco karate jerseys for affordable prices. We deliver items to your doorstep.'),
('CheChevil-', 'Chess', 'Chess Board', 'vilson', '-', 800, 6, 'Home Play', 'img/CheChevil-.jpg', 'Child’s Intelligence High Class Chess Set.\r\nisland wide delivery.'),
('CheCheOth-', 'Chess', 'Chess Board', 'Other', '-', 3200, 6, 'Home Play', 'img/CheCheOth-.jpg', 'Child’s Intelligence High Class Chess Set.\r\nisland wide delivery.'),
('CarCarvil-', 'Carrom', 'Carrom Board', 'vilson', '-', 5400, 3, 'Home Play', 'img/CarCarvil-.jpg', 'Champion Carrom Board\r\n\r\n❤ English birch plywood\r\n✅ 16mm,20mm,22mm plywood thickness available\r\n✅ scratch resistan/ water proof /Extra smoothly plywood\r\n✅ All island dilivery available(price without courier charge)\r\n✅ High quality product\r\n✅ Made in sri lanka\r\n✅ Extra smoothly plywood\r\n✅ Playing surface = 29 *29 inch\r\n✅ International carrom federation standed sizes'),
('DarDarMol-', 'Dart Game', 'Dart Game Board', 'Molten', '-', 6700, 5, 'Home Play', 'img/DarDarMol-.jpg', 'Sports Dart Board – Manufactured from the highest quality (Wooden) Material'),
('YogYogPumlar', 'Yoga', 'Yoga Mat', 'Puma', 'large', 3400, 4, 'Home Play', 'img/YogYogPumlar.jpg', 'Yoga Mat or Gym Mat with Cover – Exercise Mattress 4MM & 6MM'),
('ScrScrkap-', 'Scrabble', 'Scrabble Board', 'kappa', '-', 2300, 5, 'Home Play', 'img/ScrScrkap-.jpg', 'Scrabble Game Original Mattel – Best Quality Scrabble Set.'),
('GolBatkoo-', 'Golf', 'Bat', 'kookaburra', '-', 16000, 9, 'Other', 'img/GolBatkoo-.jpg', 'higth qualtity Golf bat in our store. also you can buy it online and we delivery you buyed items.'),
('GolBalkoo-', 'Golf', 'Ball', 'kookaburra', '-', 3400, 9, 'Other', 'img/GolBalkoo-.jpg', 'Gima Power (RED) Cricket Leather Ball is Highest Quality Ball'),
('arcBowMas-', 'archery', 'Bow and Arrows', 'Masuri', '-', 11000, 4, 'Other', 'img/arcBowMas-.jpg', 'You can buy a online good quality archery items in our store and we delivery these items your home within two days. these items made in china ');

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
  `soldDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `count`, `price`, `email`, `soldDate`) VALUES
('FooShoadi8', 2, 14700, 'vimukthi@gmail.com', '2021-09-24 02:58:12'),
('FooShoPum6', 1, 12900, 'sm@gmail.com', '2021-09-24 02:58:12'),
('FooBalMol-', 1, 5200, 'mithun@gmail.com', '2021-09-24 02:58:12'),
('FooBalMol-', 1, 5200, 'sm@gmail.com', '2021-09-23 16:22:54'),
('FooGlonikmed', 2, 3100, 'noshan@gmail.com', '2021-09-24 02:58:12'),
('FooShiniklar', 2, 2900, 'hiruni@gmail.com', '2021-09-24 02:58:12'),
('FooJerOthlar', 1, 900, 'supuni@gmail.com', '2021-09-24 02:58:12'),
('CriHelMasmed', 1, 4700, 'sheshad@gmail.com', '2021-09-24 02:58:12'),
('CriHelOthmed', 1, 3900, 'tharindu@gmail.com', '2021-09-24 02:58:12'),
('CriThiPumlar', 1, 1800, 'manjula@gmail.com', '2021-09-24 02:58:12'),
('CriBatvillar', 2, 4600, 'sheshad@gmail.com', '2021-09-24 02:58:12'),
('CriThiadilar', 2, 1600, 'sadisna@gmail.com', '2021-09-24 02:58:12'),
('CriCheMollar', 2, 1600, 'rajitha@gmail.com', '2021-09-24 02:58:12'),
('BasNetPum-', 2, 900, 'yashodara@gmail.com', '2021-09-24 02:58:12'),
('BasBalvil-', 1, 6800, 'heshan@gmail.com', '2021-09-24 02:58:12'),
('RugBalMik-', 1, 5800, 'danushi@gmail.com', '2021-09-24 02:58:12'),
('NetBaladi-', 1, 5700, 'tharindu@gmail.com', '2021-09-24 02:58:12'),
('VbaBalMik', 2, 4500, 'sisitha@gmail.com', '2021-09-24 02:58:12'),
('RugJerkapmed', 1, 2300, 'pubudu@gmail.com', '2021-09-24 02:58:12'),
('HanBalPum-', 1, 3400, 'nimantha@gmail.com', '2021-09-24 02:58:12'),
('WatBalMik', 1, 3400, 'malshani@gmail.com', '2021-09-24 02:58:12'),
('SwiJerMaslar', 1, 5300, 'yasiru@gmail.com', '2021-09-24 03:11:28'),
('AthShonikext', 1, 560, 'skasunmk98@gmail.com', '2021-09-24 03:11:28'),
('AthJerFrasma', 2, 1900, 'heshan@gmail.com', '2021-09-24 03:11:28'),
('GymWeikap5kg', 1, 1500, 'danushi@gmail.com', '2021-09-24 03:11:28'),
('BoxGloPumlar', 1, 4000, 'tharindu@gmail.com', '2021-09-24 03:11:28'),
('KarJerFralar', 1, 4800, 'malshani@gmail.com', '2021-09-24 03:11:28'),
('CheChevil-', 1, 800, 'sisitha@gmail.com', '2021-09-24 03:11:28'),
('CheCheOth-', 1, 3200, 'nimantha@gmail.com', '2021-09-24 03:11:28'),
('CarCarvil-', 1, 5400, 'sadisna@gmail.com', '2021-09-24 03:11:28'),
('DarDarMol-', 1, 6700, 'yasiru@gmail.com', '2021-09-24 03:11:28'),
('YogYogPumlar', 1, 3400, 'hiruni@gmail.com', '2021-09-24 03:11:28'),
('ScrScrkap-', 1, 2300, 'rajitha@gmail.com', '2021-09-24 03:11:28'),
('GolBatkoo-', 1, 16000, 'supuni@gmail.com', '2021-09-24 03:11:28'),
('GolBalkoo-', 2, 6800, 'pubudu@gmail.com', '2021-09-24 03:11:28'),
('arcBowMas-', 1, 11000, 'mithun@gmail.com', '2021-09-24 03:11:28'),
('BasBalvil-', 2, 13600, 'skasunmk982@gmail.com', '2021-09-30 10:11:15'),
('GolBatkoo-', 1, 16000, 'skasunmk982@gmail.com', '2021-09-30 10:11:15'),
('CriKeeadilar', 1, 2300, 'skasunmk982@gmail.com', '2021-09-30 10:13:10'),
('FooShoadi10', 1, 15000, 'skasunmk982@gmail.com', '2021-09-30 10:13:10'),
('FooShiniklar', 4, 11600, 'skasunmk982@gmail.com', '2021-09-30 10:15:46'),
('FooShinikmed', 1, 2300, 'skasunmk982@gmail.com', '2021-09-30 10:15:46'),
('FooShinikmed', 1, 2300, 'skasunmk982@gmail.com', '2021-09-30 10:19:28'),
('FooShiniksma', 1, 2700, 'skasunmk982@gmail.com', '2021-09-30 10:19:28'),
('CriThiadilar', 1, 1600, 'skasunmk982@gmail.com', '2021-09-30 10:20:25'),
('FooShoadi10', 1, 15000, 'skasunmk982@gmail.com', '2021-09-30 10:20:25'),
('CriThiadilar', 2, 3200, 'mekaladahanayaka80@gmail.com', '2021-09-30 11:50:41'),
('BatRacadi-', 2, 12000, 'codeforce186@gmail.com', '2021-09-30 12:30:27'),
('CriThiadilar', 1, 1600, 'codeforce186@gmail.com', '2021-09-30 12:30:27'),
('BoxGloPumlar', 2, 8000, 'skasunmk982@gmail.com', '2021-09-30 18:37:14'),
('FooShoPum6', 1, 12900, 'skasunmk982@gmail.com', '2021-09-30 18:37:14'),
('HanBalPum-', 1, 3400, 'skasunmk982@gmail.com', '2021-09-30 18:37:14'),
('BatRacadi-', 1, 6000, 'skasunmk982@gmail.com', '2021-09-30 18:50:51'),
('CriThiadilar', 1, 1600, 'skasunmk982@gmail.com', '2021-09-30 18:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(80) NOT NULL,
  `validation_code` text NOT NULL,
  `active` int(2) NOT NULL,
  `registerDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `username`, `password`, `validation_code`, `active`, `registerDate`) VALUES
(1, 'skasunmk98@gmail.com', 'nadun', 'damsara', 'dasun', 'a7ec7f64c1a11102a16ed9ba938d20a8', '', 1, '2021-09-23 10:32:55'),
(2, 'dilka@gmail.com', 'dilka', 'malith', 'dilka', '6c4b0a776c68936ebdf0164cd81c51ee', '', 1, '2021-09-23 10:39:13'),
(4, 'chaluka@gmail.com', 'chaluka', 'heshan', 'chaluka', '28be88a8302bd2be7e1c4977138d7ae6', '', 1, '2021-09-23 10:41:20'),
(5, 'thamashi@gmail.com', 'thamashi', 'wickramathunga', 'thamashi wickramathunga', 'c2f13533810d9b6a56ffdc720c94cb4f', '', 1, '2021-09-23 10:42:05'),
(6, 'hiruni@gmail.com', 'hiruni', 'dhanayaka', 'hiruni dahanayaka', '10600d77625e6bb1c71f307929b47cf7', '', 1, '2021-09-23 10:42:38'),
(7, 'yashodara@gmail.com', 'yashodara', 'devindi', 'yashodara', 'f07e7b925bcf8a58e918e3fecd5c0524', '', 1, '2021-09-23 10:43:14'),
(8, 'mithun@gmail.com', 'mithun', 'thathsaran', 'mithun', 'db413d6fbb1d9d0ced3e178e8adbcd97', '', 1, '2021-09-23 10:43:45'),
(9, 'noshan@gmail.com', 'noshan', 'perera', 'noshan', '06a65b3512097dc72f180e5b8343c93c', '', 1, '2021-09-23 10:44:19'),
(10, 'rajitha@gmail.com', 'rajitha', 'supun', 'rajitha', '6c8458ab7768ca278ae6ba8e77899b10', '', 1, '2021-09-23 10:45:50'),
(11, 'sheshad@gmail.com', 'sheshad', 'mihiranga', 'sheshad', '6499f1a48909dcb83e053c97ed74bae5', '', 1, '2021-09-23 10:46:41'),
(12, 'vimukthi@gmail.com', 'dilshan', 'kodithuwakku', 'vimukthi', 'edbedfe672d328f053cb741660aace0b', '', 1, '2021-09-23 10:47:09'),
(13, 'manjula@gmail.com', 'methsara', 'rasidu', 'manjula', '8aa1aad76ec68bbafcb3625ffe7cc22a', '', 0, '2021-09-23 10:47:37'),
(14, 'sadisna@gmail.com', 'sadisna', 'heendeniya', 'sadisna', 'a7e4fc78c731852c7d5b9a228b5d64ef', '', 1, '2021-09-23 10:48:29'),
(15, 'danushi@gmail.com', 'danushi', 'damsaraa', 'danushi', 'bfeb88f7e9f62caa52b631925f10f0ed', '', 1, '2021-09-23 10:48:52'),
(16, 'supuni@gmail.com', 'supuni', 'madhushika', 'supuni', '05b87b1d6fa1f884470d3e62b7ff0490', '', 1, '2021-09-23 10:51:34'),
(17, 'heshan@gmail.com', 'kavishka', 'heshan', 'heshan', '0186bf338fc6a79be2c29fc1707aa225', '', 1, '2021-09-23 10:53:12'),
(18, 'tharindu@gmail.com', 'tharindu', 'madwa', 'tharindu', '6368ad93c9fa22ab35bf311477f74bd3', '', 1, '2021-09-23 10:55:07'),
(19, 'dimuthu@gmail.com', 'dimuth', 'malesha', 'dimuthu', 'b7282e6a99fe58feaeb781bff610f243', '', 1, '2021-09-23 10:56:11'),
(20, 'malshani@gmail.com', 'malshani', 'dahanayaka', 'malshani', 'a5e368dd93b704041191315ca39d5a1d', '', 0, '2021-09-23 10:57:23'),
(21, 'pubudu@gmail.com', 'pubudu', 'wickramathunga', 'pubudu', '1b1f881749f75e4c45ccdb37af1f1cc6', '', 1, '2021-09-23 10:58:18'),
(22, 'nimantha@gmail.com', 'nimantha', 'gayana', 'nimantha gayan', 'cefc10f1447898c039b1f8e00f41c61c', '', 1, '2021-09-23 10:58:46'),
(23, 'yasiru@gmail.com', 'yasiru', 'perera', 'yasiru', '4186c0b10cbc245a22949e121e0bb601', '', 1, '2021-09-23 13:02:16'),
(24, 'sisitha@gmail.com', 'sisitha', 'jayawardana', 'sisitha', '593c3139f02fda6de18732c76d5041a4', '', 1, '2021-09-23 13:05:56'),
(27, 'codeforce186@gmail.com', 'dilka', 'dushmantha', 'dilkass', '81dc9bdb52d04dc20036dbd8313ed055', '0', 1, '2021-09-30 12:28:36'),
(26, 'mekaladahanayaka80@gmail.com', 'malshani', 'dahanayaka', 'mekala', '81dc9bdb52d04dc20036dbd8313ed055', '0', 1, '2021-09-30 11:46:20'),
(29, 'skasunmk982@gmail.com', 'kasun', 'madhumal', 'kasun madhumal', '81dc9bdb52d04dc20036dbd8313ed055', '0', 1, '2021-09-30 18:49:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
