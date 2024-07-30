-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 30, 2024 at 09:06 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

DROP TABLE IF EXISTS `password`;
CREATE TABLE IF NOT EXISTS `password` (
  `password_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_fk` int(11) NOT NULL,
  `password_hash` varchar(1000) DEFAULT NULL,
  `isOneTime` tinyint(2) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_on` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`password_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`password_id`, `user_id_fk`, `password_hash`, `isOneTime`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(1, 7, 'bee1c3c1f9df3df656185eb3db4887afef414f3eb292b252ec858c69986b6022', 0, '2024-04-09 15:54:13', 7, NULL, NULL),
(2, 8, 'f2aca93b80cae681221f0445fa4e2cae8a1f9f8fa1e1741d9639caad222f537d', 0, '2024-04-10 15:40:06', 8, NULL, NULL),
(3, 9, '1f3ce40415a2081fa3eee75fc39fff8e56c22270d1a978a7249b592dcebd20b4', 0, '2024-04-10 15:52:14', 9, NULL, NULL),
(4, 10, 'f2aca93b80cae681221f0445fa4e2cae8a1f9f8fa1e1741d9639caad222f537d', 0, '2024-04-10 16:39:20', 10, NULL, NULL),
(5, 11, '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 0, '2024-04-13 16:34:44', 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_fk` int(11) DEFAULT NULL,
  `project_name` varchar(100) DEFAULT NULL,
  `project_site_url` varchar(250) DEFAULT NULL,
  `project_role_id_fk` int(11) DEFAULT NULL,
  `strat_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `isContinue` bit(2) NOT NULL DEFAULT b'1',
  `project_technologies` varchar(250) DEFAULT NULL,
  `project_tools` varchar(250) DEFAULT NULL,
  `project_description` text,
  `project_image` varchar(20) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_on` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `user_id_fk`, `project_name`, `project_site_url`, `project_role_id_fk`, `strat_date`, `end_date`, `isContinue`, `project_technologies`, `project_tools`, `project_description`, `project_image`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(1, 11, 'Monitor Sheet App', 'https://www.php.net/manual/en/function.isset.php', 18, '2018-06-24', '2020-06-29', b'00', 'Spring Boot, JPA, REST-Services, MySQL, Apache POI, Thymeleaf, HTML, CSS, flying saucer for pdf creation.', 'Eclipse, Maven, TortoiseGit, JIRA.', '&lt;p&gt;&lt;span lang=&quot;EN-US&quot; style=&quot;font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 107%; font-family: &#039;Times New Roman&#039;,serif; mso-fareast-font-family: &#039;Times New Roman&#039;; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;&quot;&gt;Monitor App is &lt;span style=&quot;background-color: #e03e2d;&quot;&gt;specifically designed for media domain to be used for quality check (QC)&lt;/span&gt; the assets to ensure that a media clip adheres to a defined set of quality criteria or meets the requirements of the client or customer. It uses role based authorization. A manager can configure the design of a monitor sheet by various parameters like location, pod, category, sub-category etc. A manager can and also change the design of the sheet anytime, create users etc. An operator is responsible to create a sh&lt;span style=&quot;color: #2dc26b;&quot;&gt;eet in every 30min fill and submit&lt;/span&gt; it. It can be approved by both Manager and a Supervisor. A Manager can generate a report in excel, pdf or HTML for internal use (Main purpose).&lt;/span&gt;&lt;/p&gt;', 'project_1.png', '2024-07-28 10:05:58', 11, '2024-07-29 04:24:04', 11),
(2, 11, 'QualityHealth', 'https://www.php.net/manual/en/function.utf8-encode.php', 17, '2024-01-25', '2024-07-31', b'01', 'JSP, Struts 2, Spring Boot, React, MySQL, AWS S3, Mongo DB.', 'Eclipse, Gradle, RabbitVCS, JIRA, WebStrom, PyCharm, Git Cli, Tomcat, Jenkins, VM Virtual Box.', '&lt;p&gt;&lt;span lang=&quot;EN-US&quot; style=&quot;font-size: 12.0pt; mso-bidi-font-size: 11.0pt; line-height: 107%; font-family: &#039;Times New Roman&#039;,serif; mso-fareast-font-family: &#039;Times New Roman&#039;; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;&quot;&gt;QualityHealth is a platform for identifying patients at large scale, and activating them to take relevant health-specific actions. As one of the industry&amp;rsquo;s largest permission-based databases, QualityHealth has more than 50 million registered members and touches 100 million health consumers each month across 175 different health, wellness and therapeutic categories. My responsibility is to work as a Full-stack developer to maintain it&#039;s admin and web portal as well as to implement the new functionalities as per need.&lt;/span&gt;&lt;/p&gt;', 'project_2.png', '2024-07-28 10:10:47', 11, '2024-07-29 04:25:53', 11);

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
