-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2020 at 05:23 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdata`
--
CREATE DATABASE IF NOT EXISTS `userdata` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `userdata`;

-- --------------------------------------------------------

--
-- Table structure for table `tabledata`
--

DROP TABLE IF EXISTS `tabledata`;
CREATE TABLE IF NOT EXISTS `tabledata` (
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `eMail` varchar(50) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `PhoneNo` bigint(25) NOT NULL,
  `Address` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabledata`
--

INSERT INTO `tabledata` (`Fname`, `Lname`, `eMail`, `Password`, `PhoneNo`, `Address`) VALUES
('wfeug', 'wefbui', 'wfh@csd.com', 'wefe323', 7852525278, 'wefnwfeiwnhfihnfiw42432'),
('dfef', 'wsfw', 'wfevfv@dvf.com', 'fwefwf', 4564564560, 'wdwdiqh3242'),
('qvrewd', 'etrgrgn', 'abc@dc.com', 'wwwwwwww', 123456789, 'wfwvfuwvfufv'),
('lol', 'lolfd', 'lala@dwsdiu.com', 'fkdsw34', 4556545685, 'dbibsdi387389984euwsbjasakdkdnands,vdiakbcoai'),
('tyui', 'iuyt', 'tyty@dc.com', 'efeffefe', 7894561230, 'geggege3423'),
('ccc', 'ddd', 'ddsd@fv.com', 'sddddddsdsd', 202020202, 'sdsdwibeiuw2332');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
