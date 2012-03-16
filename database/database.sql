-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2012 at 10:50 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `impression12`
--

-- --------------------------------------------------------

--
-- Table structure for table `impressions_event`
--

CREATE TABLE IF NOT EXISTS `impressions_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(50) NOT NULL,
  `event_details` text NOT NULL,
  `event_rules` text,
  `event_requirements` text,
  `event_contacts` text,
  `event_venue` varchar(5) NOT NULL,
  `event_time` varchar(20) NOT NULL,
  `event_category` varchar(50) NOT NULL COMMENT 'technical, cultural, literary etc.',
  `event_type` varchar(20) NOT NULL DEFAULT 'individual' COMMENT 'individual or group',
  `event_editor_id` int(11) NOT NULL,
  `moderated` int(11) NOT NULL DEFAULT '0' COMMENT '0 - no, 1- yes',
  PRIMARY KEY (`event_id`),
  KEY `event_editor_id` (`event_editor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `impressions_event`
--

INSERT INTO `impressions_event` (`event_id`, `event_name`, `event_details`, `event_rules`, `event_requirements`, `event_contacts`, `event_venue`, `event_time`, `event_category`, `event_type`, `event_editor_id`, `moderated`) VALUES
(1, 'faflak', 'nlsdnl', 'nlsdnlg', 'lnlsnfl', 'nlsfngl', 'ngls', 'lnglsn', 'Technical', 'Single', 4, 0),
(2, 'fnal', 'nlanl', 'nldn', 'nlsdn', 'lnsdl', 'faf', 'nflsdn', 'Technical', 'Single', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `impressions_groups`
--

CREATE TABLE IF NOT EXISTS `impressions_groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(20) NOT NULL,
  `group_user_id` int(11) NOT NULL,
  `group_members` varchar(100) NOT NULL,
  PRIMARY KEY (`group_id`),
  KEY `group_user_id` (`group_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `impressions_groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `impressions_personal_detail`
--

CREATE TABLE IF NOT EXISTS `impressions_personal_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `impressions_id` bigint(16) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `institution_name` varchar(150) NOT NULL,
  `lastlogintime` timestamp NULL DEFAULT NULL,
  `lastlogouttime` timestamp NULL DEFAULT NULL,
  `privilege` int(11) NOT NULL DEFAULT '2' COMMENT '1 - user, 2 - editor, 3- admin',
  PRIMARY KEY (`id`),
  UNIQUE KEY `impressions_id` (`impressions_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `impressions_personal_detail`
--

INSERT INTO `impressions_personal_detail` (`id`, `impressions_id`, `email_id`, `full_name`, `contact_number`, `institution_name`, `lastlogintime`, `lastlogouttime`, `privilege`) VALUES
(2, 1308214376, 'udit_g91@yahoo.com', 'Udit Gupta', '123456', 'fafrefrerf', '2012-03-15 01:52:15', NULL, 2),
(3, 1032491006, 'arpit_891991@yahoo.com', 'Arpit Agarwal', '9582888450', 'Jiit', '2012-02-26 23:01:54', NULL, 2),
(4, 100000229309020, 'nkscorpion.khandelwal18@gmail.com', 'Neeraj Khandelwal', '9582555293', 'jiit', '2012-03-15 01:53:05', NULL, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `impressions_event`
--
ALTER TABLE `impressions_event`
  ADD CONSTRAINT `impressions_event_ibfk_1` FOREIGN KEY (`event_editor_id`) REFERENCES `impressions_personal_detail` (`id`);

--
-- Constraints for table `impressions_groups`
--
ALTER TABLE `impressions_groups`
  ADD CONSTRAINT `impressions_groups_ibfk_1` FOREIGN KEY (`group_user_id`) REFERENCES `impressions_personal_detail` (`id`);
