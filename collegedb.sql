-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2018 at 10:36 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `collegedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `facreg`
--

CREATE TABLE IF NOT EXISTS `facreg` (
  `name` varchar(20) NOT NULL,
  `Designation` varchar(10) NOT NULL,
  `userfac` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`userfac`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facreg`
--


-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE IF NOT EXISTS `feed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `uptime` time NOT NULL,
  `upldate` date NOT NULL,
  `ptext` varchar(100) DEFAULT NULL,
  `image` longblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`id`, `username`, `uptime`, `upldate`, `ptext`, `image`) VALUES
(1, 'a_shokn', '11:42:38', '2018-01-25', '  DFD', 0x646664312e706e67),
(2, 'Pranali', '02:56:27', '2018-01-25', '  hjgsha', 0x7468756d626e61696c2e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `studreg`
--

CREATE TABLE IF NOT EXISTS `studreg` (
  `name` varchar(20) NOT NULL,
  `class` varchar(10) NOT NULL,
  `userstud` varchar(10) NOT NULL,
  `passtud` varchar(10) NOT NULL,
  PRIMARY KEY (`userstud`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studreg`
--

INSERT INTO `studreg` (`name`, `class`, `userstud`, `passtud`) VALUES
('Ashok', '15', 'a_shokn', 'workhard'),
('Pranali', '6', 'Pranali', 'ashok');
