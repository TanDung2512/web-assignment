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
  `raw_info` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
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

INSERT INTO `cv_template` (`template_ID`, `template_html`, `template_img`) VALUES
(1, '<div>\r\n    <page size=\"A4\" id=\"template-cv\">\r\n        <div class=\"cv-container\">\r\n            <section class=\"cv-section ali-center\" id=\"section-header\">\r\n                <div class=\"img-wrapper\">\r\n                    <img class=\"personal\" data-cv-type=\"avatar\" src=\"app/images/avatar_toan.jpg\" alt=\"avatar_toan\" />\r\n                </div>\r\n                <div class=\"cv-header-right\">\r\n                    <h2 class=\"personal\" data-cv-type=\"fullname\">Jim Tran</h2>\r\n                    <h4 class=\"personal\" data-cv-type=\"professional\">Software Engineer</h4>\r\n                </div>\r\n            </section>\r\n            <section class=\"cv-section\" id=\"section-contact\">\r\n                <div class=\"cv-section-left\">\r\n                    <h3>Contact</h3>\r\n                    <div class=\"cv-section-line\"></div>\r\n                </div>\r\n                <div class=\"cv-section-right\">\r\n                    <div class=\"cv-contact-list d-flex\">\r\n                        <div class=\"cv-contact-list-left\">\r\n                            <div class=\"cv-contact-item\">\r\n                                <b>Email: </b>\r\n                                <p class=\"personal\" data-cv-type=\"email\">\r\n                                    tio200@gmail.com\r\n                                </p>\r\n                            </div>\r\n                            <div class=\"cv-contact-item\">\r\n                                <b>Phone: </b>\r\n                                <p class=\"personal\" data-cv-type=\"phone\">\r\n                                    0332996969\r\n                                </p>\r\n                            </div>\r\n                        </div>\r\n                        <div class=\"cv-contact-list-right cv-contact-item\">\r\n                            <b>Address: </b>\r\n                            <p class=\"personal\" data-cv-type=\"address\">\r\n                                497 Hoa Hao street, Ward 7, District 10, HCMC\r\n                            </p>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </section>\r\n            <section class=\"cv-section\" id=\"section-profile\">\r\n                <div class=\"cv-section-left\">\r\n                    <h3>Profile</h3>\r\n                    <div class=\"cv-section-line\"></div>\r\n                </div>\r\n                <div class=\"cv-section-right\">\r\n                    <p class=\"cv-profile personal\" data-cv-type=\"about_me\">\r\n                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium, magni maxime veniam ullam velit quas voluptates aliquid atque voluptatibus eius, sapiente inventore porro, voluptatem labore nam amet ipsam rerum facere.\r\n                    </p>\r\n                </div>\r\n            </section>\r\n            <section class=\"cv-section\" id=\"section-working-experience\">\r\n                <div class=\"cv-section-left\">\r\n                    <h3>Working experience</h3>\r\n                    <div class=\"cv-section-line\"></div>\r\n                </div>\r\n                <div class=\"cv-section-right\">\r\n                    <ul class=\"cv-experience-list\">\r\n                    </ul>\r\n                </div>\r\n            </section>\r\n            <section class=\"cv-section\" id=\"section-education\">\r\n                <div class=\"cv-section-left\">\r\n                    <h3>Education</h3>\r\n                    <div class=\"cv-section-line\"></div>\r\n                </div>\r\n                <div class=\"cv-section-right\">\r\n                    <ul class=\"cv-education-list\">\r\n                    </ul>\r\n                </div>\r\n            </section>\r\n        </div>\r\n    </page>\r\n</div>', 'https://raw.githubusercontent.com/TanDung2512/web-assignment/develop/app/assets/images/template_1.png'),
(2, '<div id=\"template-cv\">\r\n    <page size=\"A4\">\r\n        <div class=\"cv-container\" id=\"template-2\">\r\n            <section class=\"cv-section ali-center\" id=\"section-header\">\r\n                <div class=\"img-wrapper\">\r\n                    <img class=\"personal\" data-cv-type=\"avatar\" src=\"app/images/avatar_toan.jpg\" alt=\"avatar_toan\" />\r\n                </div>\r\n                <div class=\"cv-header-right\">\r\n                    <h2 class=\"personal\" data-cv-type=\"fullname\" id=\"cv-header-name\"></h2>\r\n                    <h4 class=\"personal\" data-cv-type=\"professional\" id=\"cv-header-major\"></h4>\r\n                </div>\r\n            </section>\r\n            <section class=\"cv-section\" id=\"section-contact\">\r\n                <div class=\"cv-section-left\">\r\n                    <h3>Contact</h3>\r\n                    <div class=\"cv-section-line\"></div>\r\n                </div>\r\n                <div class=\"cv-section-right\">\r\n                    <div class=\"cv-contact-list d-flex\">\r\n                        <div class=\"cv-contact-list-left\">\r\n                            <div class=\"cv-contact-item\">\r\n                                <b>Email: </b>\r\n                                <p class=\"personal\" data-cv-type=\"email\" id=\"cv-email\">\r\n                                    \r\n                                </p>\r\n                            </div>\r\n                            <div class=\"cv-contact-item\">\r\n                                <b>Phone: </b>\r\n                                <p class=\"personal\" data-cv-type=\"phone\" id=\"cv-phone\">\r\n                                </p>\r\n                            </div>\r\n                        </div>\r\n                        <div class=\"cv-contact-list-right cv-contact-item\">\r\n                            <b>Address: </b>\r\n                            <p class=\"personal\" data-cv-type=\"address\" id=\"cv-address\">\r\n                            </p>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </section>\r\n            <section class=\"cv-section\" id=\"section-profile\">\r\n                <div class=\"cv-section-left\">\r\n                    <h3>Profile</h3>\r\n                    <div class=\"cv-section-line\"></div>\r\n                </div>\r\n                <div class=\"cv-section-right\">\r\n                    <p class=\"cv-profile personal\" data-cv-type=\"about_me\">\r\n\r\n                    </p>\r\n                </div>\r\n            </section>\r\n            <section class=\"cv-section\" id=\"section-working-experience\">\r\n                <div class=\"cv-section-left\">\r\n                    <h3>Working experience</h3>\r\n                    <div class=\"cv-section-line\"></div>\r\n                </div>\r\n                <div class=\"cv-section-right\">\r\n                    <ul class=\"cv-experience-list\">\r\n                        <!-- <li class=\"cv-experience-item\">\r\n                            <h3 class=\"cv-experience-item__title\">\r\n                                Your job title\r\n                            </h3>\r\n                            <h4 class=\"cv-experience-item__subtitle\">\r\n                                Company Name, May 2016 - Current\r\n                            </h4>\r\n                            <div class=\"cv-experience-item__content\">\r\n                                Lorem ipsum dolor sit amet consectetur,\r\n                                adipisicing elit. Natus, animi doloribus\r\n                                accusamus perspiciatis numquam beatae\r\n                                consequuntur mollitia nostrum quas quidem\r\n                                dolorum tempore, ipsam nihil dignissimos\r\n                                reprehenderit error optio unde assumenda.\r\n                            </div>\r\n                        </li>\r\n                        <li class=\"cv-experience-item\">\r\n                            <h3 class=\"cv-experience-item__title\">\r\n                                Your job title\r\n                            </h3>\r\n                            <h4 class=\"cv-experience-item__subtitle\">\r\n                                Company Name, May 2016 - Current\r\n                            </h4>\r\n                            <div class=\"cv-experience-item__content\">\r\n                                Lorem ipsum dolor sit amet consectetur,\r\n                                adipisicing elit. Natus, animi doloribus\r\n                                accusamus perspiciatis numquam beatae\r\n                                consequuntur mollitia nostrum quas quidem\r\n                                dolorum tempore, ipsam nihil dignissimos\r\n                                reprehenderit error optio unde assumenda.\r\n                            </div>\r\n                        </li> -->\r\n                    </ul>\r\n                </div>\r\n            </section>\r\n            <section class=\"cv-section\" id=\"section-education\">\r\n                <div class=\"cv-section-left\">\r\n                    <h3>Education</h3>\r\n                    <div class=\"cv-section-line\"></div>\r\n                </div>\r\n                <div class=\"cv-section-right\">\r\n                    <ul class=\"cv-education-list\">\r\n                        <!-- <li class=\"cv-education-item\">\r\n                            <h3 id=\"cv-school\">\r\n                                Ho Chi Minh City University of Technology\r\n                            </h3>\r\n                            <h4 id=\"cv-major\">Computer Science</h4>\r\n                            <p id=\"cv-edu-content\">GPA: 8.0</p>\r\n                        </li> -->\r\n                    </ul>\r\n                </div>\r\n            </section>\r\n        </div>\r\n    </page>\r\n</div>', 'https://raw.githubusercontent.com/TanDung2512/web-assignment/develop/app/assets/images/template_2.png');