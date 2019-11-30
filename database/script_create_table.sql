-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost

-- Generation Time: Nov 29, 2019 at 09:50 AM
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
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `CV_ID` int(11) NOT NULL,
  `avatar` varchar(2047) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `professional` varchar(255) DEFAULT NULL,
  `about_me` text DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `address` varchar(2047) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(2047) DEFAULT NULL,
  `template_ID` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cv_template`
--

CREATE TABLE `cv_template` (
  `template_ID` int(11) NOT NULL,
  `template_html` text DEFAULT NULL,
  `template_img` varchar(2047) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `ID` int(11) NOT NULL,
  `CV_ID` int(11) DEFAULT NULL,
  `info_flag` char(1) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `user_mail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `user_mail`, `password`, `role`) VALUES
(1, 'a@a.a', 'aaa', 'user'),
(3, 'b@b.b', 'bbb', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`CV_ID`),
  ADD KEY `template_ID` (`template_ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cv_template`
--
ALTER TABLE `cv_template`
  ADD PRIMARY KEY (`template_ID`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CV_ID` (`CV_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `CV_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cv_template`
--
ALTER TABLE `cv_template`
  MODIFY `template_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT;


--
-- Constraints for dumped tables
--

--
-- Constraints for table `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `template_ID` FOREIGN KEY (`template_ID`) REFERENCES `cv_template` (`template_ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_ID`) ON DELETE SET NULL;

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `CV_ID` FOREIGN KEY (`CV_ID`) REFERENCES `cv` (`CV_ID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;