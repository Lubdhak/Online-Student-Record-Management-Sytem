-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2017 at 01:26 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(1) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_pwd` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `users_email`, `users_pwd`) VALUES
(1, 'aditi@gmail.com', 'e6ebc25fd4e7bba9bf3b5e4bbdc0ffc3');

-- --------------------------------------------------------

--
-- Table structure for table `fend`
--

CREATE TABLE `fend` (
  `logo_path` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fend`
--

INSERT INTO `fend` (`logo_path`, `footer`) VALUES
('image/newlogo.png', '2017 - Online Student Record');

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `ID` int(5) NOT NULL,
  `pay` int(1) NOT NULL,
  `signup` int(1) NOT NULL,
  `cse` int(1) NOT NULL,
  `pre` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`ID`, `pay`, `signup`, `cse`, `pre`) VALUES
(0, 0, 0, 1, 0),
(0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `ID` int(5) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `cno` varchar(255) NOT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`ID`, `bname`, `cno`, `cdate`) VALUES
(20, 'CASH', 'CASH', '2017-07-27'),
(21, 'CASH', 'CASH', '2017-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `temp_users`
--

CREATE TABLE `temp_users` (
  `ID` int(5) NOT NULL,
  `users_name` varchar(255) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_pwd` varchar(32) NOT NULL,
  `users_gender` varchar(255) NOT NULL,
  `users_dob` date NOT NULL,
  `users_key` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(5) NOT NULL,
  `users_name` varchar(255) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_pwd` varchar(32) NOT NULL,
  `users_gender` varchar(255) NOT NULL,
  `users_dob` date NOT NULL,
  `users_tmarks` int(3) NOT NULL,
  `phy` int(1) NOT NULL,
  `chem` int(1) NOT NULL,
  `math` int(1) NOT NULL,
  `bio` int(1) NOT NULL,
  `com` int(1) NOT NULL,
  `pay_st` int(1) NOT NULL,
  `phy_s` int(1) NOT NULL,
  `chem_s` int(1) NOT NULL,
  `math_s` int(1) NOT NULL,
  `bio_s` int(1) NOT NULL,
  `com_s` int(1) NOT NULL,
  `up` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `users_name`, `users_email`, `users_pwd`, `users_gender`, `users_dob`, `users_tmarks`, `phy`, `chem`, `math`, `bio`, `com`, `pay_st`, `phy_s`, `chem_s`, `math_s`, `bio_s`, `com_s`, `up`) VALUES
(23, 'Lubdhak Mahapatra', 'lubdhak12@gmail.com', '01cfcd4f6b8770febfb40cb906715822', 'male', '1993-04-03', 493, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `temp_users`
--
ALTER TABLE `temp_users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `users_email` (`users_email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `users_email` (`users_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `temp_users`
--
ALTER TABLE `temp_users`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
