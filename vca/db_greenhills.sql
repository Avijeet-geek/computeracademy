-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 20, 2018 at 04:36 PM
-- Server version: 5.0.89-community-nt
-- PHP Version: 5.5.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_greenhills`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_sessions`
--

CREATE TABLE IF NOT EXISTS `admin_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(45) NOT NULL default '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text NOT NULL,
  PRIMARY KEY  (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_sessions`
--

INSERT INTO `admin_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('e6fa1a20c606db687fa8fbf367d4e4a9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36', 1456734838, '');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `album_id` int(11) NOT NULL auto_increment,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `title`, `description`, `timestamp`) VALUES
(4, 'NEW', '<p>Demo</p>', '2017-04-03 07:59:10'),
(5, 'Test Album', '<p>sdfsdf</p>', '2018-04-04 11:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` int(11) NOT NULL auto_increment,
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `day` varchar(50) NOT NULL,
  `arrival_time` varchar(50) NOT NULL,
  `departure_time` varchar(50) NOT NULL,
  `chamber_address` text NOT NULL,
  `doctor_email` varchar(500) NOT NULL,
  `appointment_date` varchar(50) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `patient_email` varchar(500) NOT NULL,
  `patient_phone` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`appointment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `doctor_id`, `doctor_name`, `day`, `arrival_time`, `departure_time`, `chamber_address`, `doctor_email`, `appointment_date`, `patient_name`, `patient_email`, `patient_phone`, `timestamp`) VALUES
(1, 34, 'Dr. Tapas Moitra', 'Mon', '2.00pm', '3.00pm', '<p>Mitra''s Clinic</p>', 'cosmilisation@gmail.com', '05/23/2016', 'Anand Kumar', 'cosmilisation@gmail.com', '9641549121', '2016-05-06 09:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `c_id` int(11) NOT NULL auto_increment,
  `name_contact` varchar(50) NOT NULL,
  `lastname_contact` varchar(50) NOT NULL,
  `email_contact` varchar(50) NOT NULL,
  `phone_contact` varchar(25) NOT NULL,
  `message_contact` text NOT NULL,
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`c_id`, `name_contact`, `lastname_contact`, `email_contact`, `phone_contact`, `message_contact`, `time`) VALUES
(1, 'umang', 'kumar', 'umang1533@gmail.com', '9934427434', 'adfghj', '2018-07-18 05:23:23'),
(2, 'umang', 'kumar', 'umang1533@gmail.com', '9934427434', 'adfghj', '2018-07-18 05:24:14'),
(3, 'retfh', 'rtdx', 'fg@dsfg.dtgf', '34567', 'fdghjk', '2018-07-18 05:24:41'),
(4, 'retfh', 'rtdx', 'fg@dsfg.dtgf', '34567', 'fdghjk', '2018-07-18 05:27:11'),
(5, 'umang', 'kumar', 'umang1533@dfgsdf.dfgdf', '46346', 'dsafadsf', '2018-07-18 05:46:07'),
(6, 'umang', 'kumar', 'fgj@cxfhgfcx.fgjgf', '46346', 'afghj', '2018-07-18 05:46:51'),
(7, 'rADFSGDSF.,M', 'FDGSDFG', 'FDGSDFGDF@WSRFZSD.DFGDF', '3', 'afghj', '2018-07-18 05:54:28'),
(8, 'rADFSGDSF.,M', 'FDGSDFG', 'FDGSDFGDF@WSRFZSD.DFGDF', '3544354533', 'afghj', '2018-07-18 05:54:29'),
(9, 'rADFSGDSF.,M', 'FDGSDFG', 'FDGSDFGDF@WSRFZSD.DFGDF', '3544354533', 'FDGXZDFGZXFCV', '2018-07-18 05:54:33'),
(10, 'TT', 'YY', 'FG@DSFD.GH', '67', 'DGDS', '2018-07-18 05:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `day` varchar(20) NOT NULL,
  `night` varchar(20) NOT NULL,
  `price` varchar(50) default NULL,
  `description` longtext NOT NULL,
  `image` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`, `day`, `night`, `price`, `description`, `image`, `timestamp`) VALUES
(2, 'Sikkim', '3', '4', '4000', '<p>Demo Description</p>', 'sik.jpg', '2018-07-17 05:36:05'),
(3, 'Andaman and Nicobar Islands', '6', '7', '15000', '<p>Demo Description2</p>', 'thailand.jpg', '2018-07-17 05:36:31'),
(4, 'Siliguri', '2', '3', '6500', '<p>Demo Description3</p>', 'darj.jpg', '2018-07-17 05:22:07'),
(5, 'Test Package', '4', '4', '1200', '<p>sdfsdfsdfdsf</p>', 'Test_Package_791532076539.jpg', '2018-07-20 08:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` int(11) NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `department` varchar(500) NOT NULL,
  `department_id` varchar(200) NOT NULL,
  `image` varchar(500) default NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `facebook` text NOT NULL,
  `google` text NOT NULL,
  `twitter` text NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `name`, `department`, `department_id`, `image`, `phone1`, `phone2`, `email`, `facebook`, `google`, `twitter`, `address`, `description`, `timestamp`) VALUES
(1, 'Dr. (Mrs) U. Mitra', 'Anaesthetiology', '4', 'Dr._(Mrs)_U._Mitra_801462873083', '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>DA, MD, FICS</p>', '2016-05-10 09:38:04'),
(2, 'Prof. Dr. S. Bose', 'Anaesthetiology', '4', 'Prof._Dr._S._Bose_341462873072', '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>DA, MD</p>', '2016-05-10 09:37:53'),
(3, 'Dr. Goyal', 'Anaesthetiology', '4', 'Dr._Goyal_511462873061', '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', 'MD', '2016-05-10 09:37:41'),
(4, 'Dr. Arpita Mitra', 'Anaesthetiology', '4', 'Dr._Arpita_Mitra_111462873044', '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD</p><p><br></p>', '2016-05-10 09:37:25'),
(5, 'Dr. K.N. Ghosh Hazra', 'Cardiology', '5', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD, DM</p><p><br></p>', '2016-03-11 10:12:04'),
(6, 'Dr. S. Chatterjee', 'Cardiology', '5', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', 'MD, DM', '2016-03-11 10:12:47'),
(7, 'Dr. S. Bandyopadhyay', 'ENT', '6', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD, DLO</p>', '2016-03-11 10:17:15'),
(8, 'Dr. K.C. Mitra', 'Gynaecology and Obstetrics', '2', 'Dr._K.C._Mitra_191457694109', '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>FRCOG, FICS, FICOG</p>', '2016-03-11 11:01:49'),
(9, 'Dr. A. Mitra', 'Gynaecology and Obstetrics', '2', 'Dr._A._Mitra_241462873104', '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MS, MRCOG (LONDON)</p>', '2016-05-10 09:38:25'),
(10, 'Dr. Satabdi Dey', 'Gynaecology and Obstetrics', '2', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD, DNB</p>', '2016-03-11 10:19:58'),
(11, 'Dr. A. Biswas', 'Laparoscopic and Paediatric Surgery', '7', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MS, Mch</p>', '2016-03-11 10:20:48'),
(12, 'Dr. Sudip Nath', 'Medicine', '8', 'Dr._Sudip_Nath_121457694158', '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD, DNB, FCCP</p>', '2016-03-11 11:02:39'),
(13, 'Dr. Abhijit Roy', 'Medicine', '8', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD</p>', '2016-03-11 11:04:42'),
(14, 'Dr. S. Banik', 'Medicine', '8', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD&nbsp;&nbsp;&nbsp;&nbsp;</p>', '2016-03-11 11:05:16'),
(15, 'Dr. Nirlipta Sanyal', 'Medicine', '8', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', 'MD, DA', '2016-03-11 11:06:00'),
(16, 'Dr. Pratim Roy', 'Nephrology', '9', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD&nbsp;&nbsp;&nbsp;&nbsp;</p>', '2016-03-11 11:06:40'),
(17, 'Dr. N.R. Haldar', 'Neuro Physician', '10', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD, DM</p>', '2016-03-11 11:07:32'),
(18, 'Dr. A. Rakib', 'Neuro Psychiatry', '11', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD (NIMHANS), MRC Psych (UK), LLM (LONDON), CCST (UK)</p>', '2016-03-11 11:09:06'),
(19, 'Dr. B. Sarkar', 'Oncology', '12', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD</p>', '2016-03-11 11:09:40'),
(20, 'Dr. P. Kumar', 'Orthopaedics', '13', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MS (ORTHO)</p>', '2016-03-11 11:10:18'),
(21, 'Dr. Tapas Ghosh', 'Orthopaedics', '13', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MS</p>', '2016-03-11 11:10:44'),
(22, 'Dr. Ritesh Agarwal', 'Orthopaedics', '13', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MS</p>', '2016-03-11 11:11:20'),
(23, 'Dr. N. Kumar', 'Pediatrics', '3', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD, DCH</p>', '2016-03-11 11:12:29'),
(24, 'Dr. Rajiv Agarwal', 'Pediatrics', '3', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD (Ped)</p>', '2016-03-11 11:13:10'),
(25, 'Dr. (Mrs) Shyamasri Mitra', 'Pathology Microbiology', '14', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD, FRC, Path (UK), CCST (UK)</p>', '2016-03-11 11:14:27'),
(26, 'Dr. A. Sarkar', 'Pathology Microbiology', '14', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD</p>', '2016-03-11 11:14:58'),
(27, 'Dr. Rajesh Agarwal', 'Pulmonology', '15', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD</p>', '2016-03-11 11:15:37'),
(28, 'Dr. Sourav Biswas', 'Pulmonology', '15', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD</p>', '2016-03-11 11:16:14'),
(29, 'Dr. M. Saha', 'Radiology', '16', NULL, '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD</p>', '2016-03-11 11:16:39'),
(30, 'Dr. Amit Agarwal', 'Skin', '17', 'Dr._Amit_Agarwal_551462873032', '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MD</p>', '2016-05-10 09:37:12'),
(31, 'Prof. Dr. A.K. Dev', 'Surgery', '18', 'Prof._Dr._A.K._Dev_351462873013', '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MS, FRCS</p>', '2016-05-10 09:36:59'),
(32, 'Dr. A. Biswas', 'Surgery', '18', 'Dr._A._Biswas_681462872999', '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MS, Mch</p>', '2016-05-10 09:36:39'),
(33, 'Dr. A.N. Sarkar', 'Surgery', '18', 'Dr._A.N._Sarkar_41462872986', '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MS</p>', '2016-05-10 09:36:27'),
(34, 'Dr. Tapas Moitra', 'Urology', '19', 'Dr._Tapas_Moitra_631462245432', '9641758183', '9563131606', 'cosmilisation@gmail.com', '', '', '', 'Siliguri', '<p>MS, Mch</p>', '2016-05-03 03:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `auto_id` int(11) NOT NULL auto_increment,
  `album_id` varchar(200) default '0',
  `album_name` varchar(5000) default '0',
  `title` varchar(200) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`auto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`auto_id`, `album_id`, `album_name`, `title`, `image`, `timestamp`) VALUES
(15, '0', '0', 'test image 2', 'test_image_2_261532084505.jpg', '2018-07-20 11:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE IF NOT EXISTS `guestbook` (
  `guest_id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(1000) NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`guest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`guest_id`, `name`, `description`, `image`, `timestamp`) VALUES
(19, 'Umang', 'I just wanted to tell you I had the most fabulous trip to Bhutan. Everything was perfect! I could not have planned a better itinerary and trip!!!\nThank you so much for your help with this!!!\nHope you had a good Thanksgiving\n', 'b1.jpg', '2018-07-17 08:35:38'),
(20, 'kumar', 'sdjfgsdagkjdgxzhcgdx,cgjk\r\ndsnmfdjkfbgd,bn', 'test.jpg', '2018-07-17 10:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `auto_id` int(11) NOT NULL auto_increment,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`auto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`auto_id`, `username`, `password`, `timestamp`) VALUES
(1, 'gr_admin', '0b5970f080d9cc7cce3eccd0bcd3980c', '2016-02-02 03:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `auto_id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `user` varchar(50) default NULL,
  `image` varchar(2000) default NULL,
  `thumb` varchar(2000) default NULL,
  `date` varchar(50) default NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`auto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`auto_id`, `title`, `content`, `user`, `image`, `thumb`, `date`, `timestamp`) VALUES
(10, 'Umang', '<p>sdfsdfasdfwoiefsdsldfs tehst content</p>', NULL, 'Test_News_651490605666.jpg', NULL, '27-03-2017', '2018-07-17 08:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `auto_id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(2000) default NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`auto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`auto_id`, `title`, `content`, `image`, `timestamp`) VALUES
(25, 'Travel Agency', '<p>Travel Agency<br></p>', 'Travel_Agency_111467828192.jpg', '2016-07-06 18:03:12'),
(26, 'Travel Agency in Siliguri', '<p>Travel Agency in Siliguri<br></p>', 'Travel_Agency_in_Siliguri_191467828350.jpg', '2016-07-06 18:05:50'),
(27, 'Best Travel Agency in West Bengal', '<p>sdfsdfsdf</p>', 'dsfsdfsadf_571467828450.jpg', '2016-07-09 08:39:41'),
(28, 'Tours and Travel Agency in North Bengal', '<p>sddfsdfsdffsdfsdfsdfsdfsdfsdfsfd&nbsp;</p><p><br></p>\n<a href="http://127.0.0.1/PassengersHaven/index.php/contact">CONTACT US</a>', 'dfasdfasdf_221467828461.jpg', '2018-04-04 08:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE IF NOT EXISTS `timetable` (
  `timetable_id` int(11) NOT NULL auto_increment,
  `doctor_id` int(11) NOT NULL,
  `department` varchar(500) NOT NULL,
  `doctor_name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `day` varchar(50) NOT NULL,
  `arrival_time` varchar(100) NOT NULL,
  `departure_time` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`timetable_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`timetable_id`, `doctor_id`, `department`, `doctor_name`, `description`, `day`, `arrival_time`, `departure_time`, `timestamp`) VALUES
(20, 34, 'Urology', 'Dr. Tapas Moitra', '<p>Mitra''s Clinic</p>', 'Mon', '2.00pm', '3.00pm', '2016-05-06 09:15:02'),
(21, 34, 'Urology', 'Dr. Tapas Moitra', '<p>Mitra''s Clinic</p>', 'Tue', '2.00pm', '3.00pm', '2016-05-06 09:15:08'),
(22, 34, 'Urology', 'Dr. Tapas Moitra', '<p>Mitra''s Clinic</p>', 'Wed', '2.00pm', '3.00pm', '2016-05-06 09:15:12'),
(23, 34, 'Urology', 'Dr. Tapas Moitra', '<p>Mitra''s Clinic</p>', 'Thu', '2.00pm', '3.00pm', '2016-05-06 09:15:17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
