-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 30, 2024 at 09:05 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_fk` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `police_station` varchar(50) DEFAULT NULL,
  `city_town` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `pin` int(7) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `map_url` varchar(1000) DEFAULT NULL,
  `map_image` varchar(100) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_on` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id_fk`, `address`, `police_station`, `city_town`, `district`, `pin`, `state`, `country`, `map_url`, `map_image`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(13, 11, 'Vill:-Fatepur, P.O:-Damodarpur', 'Contai', 'Contai', 'Purba Medinipur', 721401, 'West Bengal', 'India', 'https://www.google.com/maps/place/Contai,+West+Bengal+721401/@21.7771586,87.7498626,14z/data=!3m1!4b1!4m6!3m5!1s0x3a0326e5394d8237:0x7bb6b4d525857f71!8m2!3d21.778109!4d87.7517427!16zL20vMGRsbXFw?authuser=0&entry=ttu', 'map_11.png', '2024-05-12 18:00:07', 11, '2024-07-20 11:39:13', 11);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
