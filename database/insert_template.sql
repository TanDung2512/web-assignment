-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2019 at 11:07 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ass`
--

-- --------------------------------------------------------

--
-- Table structure for table `cv_template`
--

CREATE TABLE `cv_template` (
  `template_ID` int(11) NOT NULL,
  `template_html` text DEFAULT NULL,
  `template_img` varchar(2047) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv_template`
--

INSERT INTO `cv_template` (`template_ID`, `template_html`, `template_img`) VALUES
(1, NULL, 'https://raw.githubusercontent.com/TanDung2512/web-assignment/feature/link/app/assets/images/template_2.png'),
(2, NULL, 'https://raw.githubusercontent.com/TanDung2512/web-assignment/feature/link/app/assets/images/template_1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cv_template`
--
ALTER TABLE `cv_template`
  ADD PRIMARY KEY (`template_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cv_template`
--
ALTER TABLE `cv_template`
  MODIFY `template_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
