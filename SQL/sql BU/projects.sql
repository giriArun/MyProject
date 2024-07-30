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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
