-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 21, 2014 at 06:22 PM
-- Server version: 5.5.38
-- PHP Version: 5.3.10-1ubuntu3.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fblikes`
--

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `sl_no` int(11) NOT NULL AUTO_INCREMENT,
  `referer_id` varchar(45) NOT NULL,
  `invitees_id` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `profile_pic` varchar(45) DEFAULT NULL,
  `liked` int(11) DEFAULT NULL,
  PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`sl_no`, `referer_id`, `invitees_id`, `name`, `profile_pic`, `liked`) VALUES
(3, '692471630830415', '692471630830415', 'Rizwan Hakkim', './images/692471630830415.jpg', 1),
(4, '692471630830415', '692471630830415', 'Rizwan Hakkim', './images/692471630830415.jpg', 1),
(5, '692471630830417', '692471630830415', 'Rizwan Hakkim', './images/692471630830415.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reg_users`
--

CREATE TABLE IF NOT EXISTS `reg_users` (
  `fbid` varchar(45) NOT NULL,
  `display_name` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  `profile_pic` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`fbid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_users`
--

INSERT INTO `reg_users` (`fbid`, `display_name`, `first_name`, `last_name`, `email`, `counter`, `profile_pic`) VALUES
('692471630830258', 'Rizwan Hakkim', 'Rizwan', 'Hakkim', 'rizwan.hkm@gmail.com', 0, './images/692471630830415.jpg'),
('692471630830326', 'Rizwan Hakkim', 'Rizwan', 'Hakkim', 'rizwan.hkm@gmail.com', 0, './images/692471630830415.jpg'),
('692471630830411', 'Rizwan Hakkim', 'Rizwan', 'Hakkim', 'rizwan.hkm@gmail.com', 0, './images/692471630830415.jpg'),
('692471630830413', 'Rizwan Hakkim', 'Rizwan', 'Hakkim', 'rizwan.hkm@gmail.com', 0, './images/692471630830415.jpg'),
('692471630830414', 'Rizwan Hakkim', 'Rizwan', 'Hakkim', 'rizwan.hkm@gmail.com', 0, './images/692471630830415.jpg'),
('692471630830415', 'Rizwan Hakkim', 'Rizwan', 'Hakkim', 'rizwan.hkm@gmail.com', 2, './images/692471630830415.jpg'),
('692471630830417', 'Rizwan Hakkim', 'Rizwan', 'Hakkim', 'rizwan.hkm@gmail.com', 1, './images/692471630830415.jpg'),
('692471630830432', 'Rizwan Hakkim', 'Rizwan', 'Hakkim', 'rizwan.hkm@gmail.com', 0, './images/692471630830415.jpg'),
('692471630830456', 'Rizwan Hakkim', 'Rizwan', 'Hakkim', 'rizwan.hkm@gmail.com', 1, './images/692471630830415.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
