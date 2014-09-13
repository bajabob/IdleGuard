-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2014 at 10:54 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iguard_zend`
--

-- --------------------------------------------------------

--
-- Table structure for table `actionables`
--

CREATE TABLE IF NOT EXISTS `actionables` (
  `id` int(10) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_first` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name_last` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `account_type` int(2) NOT NULL,
  `relationship` int(10) NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name_first`, `name_last`, `title`, `account_type`, `relationship`, `email`, `pass`) VALUES
(1, 'Claire', 'Tyler', 'RN', 99, 0, 'admin@idleguard.com', '6a59f3535e6a79bf373f5c4b3bc71d4b11c18fb0eda7514cf5603f3aff39191f'),
(2, 'Jim', 'Harpough', 'Mr.', 10, 0, 'jim@aol.com', 'f2742defe324144ab790dfeab4eb9a57884c510294e430ec3d8d8141ca9d9724'),
(3, 'Bob', 'Harpough', 'Mr.', 59, 2, 'bob@gmail.com', '412d0b302d02d623087c8486615e1118f0e77df472d2d40ef119a107f4ece708');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
