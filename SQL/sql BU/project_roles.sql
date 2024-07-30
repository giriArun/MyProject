-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 30, 2024 at 09:04 AM
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
-- Table structure for table `project_roles`
--

DROP TABLE IF EXISTS `project_roles`;
CREATE TABLE IF NOT EXISTS `project_roles` (
  `project_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_role_type` varchar(50) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_on` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`project_role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_roles`
--

INSERT INTO `project_roles` (`project_role_id`, `project_role_type`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(5, 'Communication', '2024-07-21 17:57:24', 11, NULL, NULL),
(3, 'Co-ordination', '2024-07-21 17:46:27', 11, '2024-07-21 17:51:50', 11),
(23, 'Project Manager', '2024-07-21 18:04:56', 11, NULL, NULL),
(11, 'Business Analysis', '2024-07-21 17:59:46', 11, NULL, NULL),
(12, 'Project management', '2024-07-21 17:59:54', 11, NULL, NULL),
(17, 'Front-end developers', '2024-07-21 18:00:43', 11, NULL, NULL),
(18, 'Back-end developers', '2024-07-21 18:00:51', 11, NULL, NULL),
(19, 'UI/UX Designer', '2024-07-21 18:01:44', 11, NULL, NULL),
(20, 'QA and Testing Engineer', '2024-07-21 18:02:23', 11, NULL, NULL),
(21, 'Content Writer', '2024-07-21 18:02:36', 11, NULL, NULL),
(22, 'Digital Marketing Executive', '2024-07-21 18:02:48', 11, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
