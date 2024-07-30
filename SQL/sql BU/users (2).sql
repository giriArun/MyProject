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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_first_name` varchar(20) DEFAULT NULL,
  `user_last_name` varchar(20) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_phone` varchar(10) DEFAULT NULL,
  `user_terms` bit(2) NOT NULL DEFAULT b'0',
  `user_photo` varchar(100) DEFAULT NULL,
  `isAdmin` bigint(2) NOT NULL DEFAULT '0',
  `isActive` bit(1) NOT NULL DEFAULT b'1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_on` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_phone`, `user_terms`, `user_photo`, `isAdmin`, `isActive`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(1, 'aaaa', 'bbbb', 'aaa@bbb.ccc', '1122334455', b'01', NULL, 0, b'1', '2024-04-07 18:28:01', 0, '2024-07-17 07:24:08', NULL),
(2, 'aaaa', 'bbbb', 'aaa@bbb.ccc', '1122334455', b'01', NULL, 0, b'1', '2024-04-07 18:31:07', 0, NULL, NULL),
(3, 'aaaa', 'bbbb', 'aaa@bbb.ccc', '1122334455', b'01', NULL, 0, b'1', '2024-04-08 17:27:02', 0, NULL, NULL),
(4, 'aaaaa', 'bbbbb', 'aaa@bbbb.ccc', '1471471475', b'00', NULL, 0, b'1', '2024-04-09 15:48:41', 0, NULL, NULL),
(5, 'aaaaa', 'bbbbb', 'aaa@bbbb.ccc', '1471471475', b'00', NULL, 0, b'1', '2024-04-09 15:49:13', 0, NULL, NULL),
(6, 'aaaa', 'aaaa', 'arun@giri.com', '1212121212', b'00', NULL, 0, b'1', '2024-04-09 15:50:40', 0, NULL, NULL),
(7, 'aaa', 'bbb', 'arun1@giri.com', '1212121213', b'00', NULL, 0, b'1', '2024-04-09 15:54:13', 0, NULL, NULL),
(8, 'aaa', 'aaa', 'aa@aa.com', '1111222212', b'00', NULL, 0, b'1', '2024-04-10 15:40:06', 0, NULL, NULL),
(9, 'Arun', 'Giri', 'giri.arun592@gmail.com', '9547676205', b'00', NULL, 0, b'1', '2024-04-10 15:52:14', 0, NULL, NULL),
(10, 'Arun', 'Giri', 'giri.arun593@gmail.com', '9547676206', b'00', NULL, 0, b'1', '2024-04-10 16:39:20', 0, NULL, NULL),
(11, 'ArunK', 'Giri', 'arungiri@gmail.com', '1234567890', b'00', 'profile_11.png', 1, b'1', '2024-04-13 16:34:44', 0, '2024-07-20 11:39:13', 11);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
