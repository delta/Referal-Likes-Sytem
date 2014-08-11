-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2014 at 04:32 PM
-- Server version: 5.5.34-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `LikeDelta`
--

-- --------------------------------------------------------

--
-- Table structure for table `Records`
--

CREATE TABLE IF NOT EXISTS `Records` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FbId` bigint(50) NOT NULL,
  `Likes` int(11) NOT NULL,
  `fbUsername` varchar(50) NOT NULL,
  `fbPicUrl` varchar(100) NOT NULL,
  `Friends` varchar(2000) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `Records`
--

INSERT INTO `Records` (`Id`, `FbId`, `Likes`, `fbUsername`, `fbPicUrl`, `Friends`) VALUES
(48, 0, 0, '', '', ''),
(49, 667806043306244, 0, 'Abhishek Kaushik', 'https://graph.facebook.com/667806043306244/picture', ''),
(50, 0, 0, '', '', 'AQAZ6PT0PuEbkk_mChR9PC3IfwV4NGmTt7P_fROA2zbSXzkNFUwvn8A4KEHwpqFWj_9I2knuvOkFIrZ4BSbhup-FT9GnscYKj6RlmETCpn5Jm3Fqkj-rE_gxIGWzSLq_DTtL20VVjCuNNRJM9rqUnZt8NYXoMWWXjq3Pja_X3nkxH-ZUtOxUqbArRhpCrgNQHg6NU58fq0gRLTzXWSaRg3tkCE3_VCUjhPB0jI7IWvxNBbyb_IRSTWF92BcZazrG0F6sb83O-PII3H5I0-R7i_lkWpARVOiINDibogYacz3EhkW6fu1QIndwO8L4mwISOw0'),
(51, 0, 0, '', '', ''),
(52, 0, 0, '', '', ''),
(53, 0, 0, '', '', 'AQAZ6PT0PuEbkk_mChR9PC3IfwV4NGmTt7P_fROA2zbSXzkNFUwvn8A4KEHwpqFWj_9I2knuvOkFIrZ4BSbhup-FT9GnscYKj6RlmETCpn5Jm3Fqkj-rE_gxIGWzSLq_DTtL20VVjCuNNRJM9rqUnZt8NYXoMWWXjq3Pja_X3nkxH-ZUtOxUqbArRhpCrgNQHg6NU58fq0gRLTzXWSaRg3tkCE3_VCUjhPB0jI7IWvxNBbyb_IRSTWF92BcZazrG0F6sb83O-PII3H5I0-R7i_lkWpARVOiINDibogYacz3EhkW6fu1QIndwO8L4mwISOw0'),
(54, 0, 0, '', '', ''),
(55, 0, 0, '', '', '667806043306244');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
