-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2019 at 04:37 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photography`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookID` int(11) NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `photographerID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `notification` int(11) NOT NULL DEFAULT '1',
  `approved` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookID`, `date`, `venue`, `category`, `photographerID`, `UserID`, `notification`, `approved`) VALUES
(14, '2013-08-03', 'Nairobi', 'Birthday shoots', 1, 1, 0, 0),
(16, '2019-06-26', 'Strathmore', 'Photoshoot', 1, 5, 1, 0),
(17, '2019-06-24', 'Eldoret', 'Wedding shoot', 2, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `venue` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `photographersID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `photographID` int(11) NOT NULL,
  `photographs` varchar(255) NOT NULL,
  `Category` varchar(40) NOT NULL,
  `photographersID` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`photographID`, `photographs`, `Category`, `photographersID`, `status`) VALUES
(1, '../assets/upload/1d466b1bebbe7e293fc005bb30e21b9f.jpg', 'Birthday shoots', 1, 0),
(2, '../assets/upload/1f0448be4453c1aec39c5b19df401945.jpg', 'Birthday shoots', 1, 0),
(3, '../assets/upload/07a7a9acea709bca67dace9bd82e6e1f.jpg', 'Birthday shoots', 1, 0),
(4, '../assets/upload/1f0448be4453c1aec39c5b19df401945.jpg', 'Baby shoots', 1, 0),
(5, '../assets/upload/07a7a9acea709bca67dace9bd82e6e1f.jpg', 'Baby shoots', 1, 0),
(6, '../assets/upload/09f5568b6b5ff1188aa66e3946f2033f.jpg', 'Baby shoots', 1, 0),
(7, '../assets/upload/21ce8936770ca22f5738632bb124c9e3.jpg', 'Baby shoots', 1, 1),
(8, '../assets/upload/45feb0499d7cd4d0465f64b35acf37f0.jpg', 'Baby shoots', 1, 0),
(9, '../assets/upload/970665a97253d520e7d8b466c6474070.jpg', 'Event', 1, 0),
(10, '../assets/upload/clown.jpg', 'Birthday shoots', 2, 0),
(11, '../assets/upload/moon_and_ocean-wallpaper-1366x768.jpg', 'Nature', 2, 0),
(12, '../assets/upload/planet_green_nature_space_leaves_tree_84720_1920x1080.jpg', 'Nature', 2, 0),
(13, '../assets/upload/red_sky_big_sun_set-wallpaper-1366x768.jpg', 'Nature', 2, 0),
(14, '../assets/upload/trees_field_two_fog_forest_evening_94478_1920x1080.jpg', 'Nature', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `photographers`
--

CREATE TABLE `photographers` (
  `photographersID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photographers`
--

INSERT INTO `photographers` (`photographersID`, `UserID`, `Description`) VALUES
(1, 2, '\r\nBorn in Bondo, grew up in Nairobi, kenya.  I tour the country to spread love through photography.\r\n\r\nMy goal is to show the beauty, grace, strength and enthusiasm of people. I focus on non-models and place regular people in exaggerated situations that highlight an aspect of who they are. I look for a sense of defiance and fortitude in my work.\r\n\r\nIâ€™m based in Nairobi but travel for projects around the country.'),
(2, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RatingID` int(11) NOT NULL,
  `ratingStars` int(11) NOT NULL,
  `comments` varchar(50) NOT NULL,
  `photographerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`RatingID`, `ratingStars`, `comments`, `photographerID`) VALUES
(1, 5, 'It was an awesome experience working with him.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `ReportID` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `photographerID` int(11) NOT NULL,
  `photographsID` int(11) NOT NULL,
  `view` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`ReportID`, `title`, `description`, `date`, `photographerID`, `photographsID`, `view`) VALUES
(2, 'Racism', 'Lonely together', '2019-06-04 23:35:45', 1, 8, 0),
(3, 'weird looks ', 'sad', '2019-06-25 06:45:50', 2, 10, 0),
(4, 'Racism', 'The photograph encourages racism.', '2019-06-25 10:13:38', 1, 5, 0),
(5, 'Offensive', 'I dont wish to see it', '2019-06-25 10:42:07', 1, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceID` int(11) NOT NULL,
  `category` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `minCash` int(11) NOT NULL,
  `maxCash` int(11) NOT NULL,
  `photographerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceID`, `category`, `description`, `minCash`, `maxCash`, `photographerID`) VALUES
(1, 'Event Photography', 'Event Photographers capture special moments at weddings, anniversaries, parties, and shows. Common duties listed on an Event Photographer resume sample are discussing requirements with clients, taking photographs during festivities, composing shots, editing photos after the event, and delivering the final product.', 700, 10000, 1),
(2, 'Wedding Photojournalism', 'wedding photojournalists use candid photography techniques to capture moments throughout the day which individually and collectively tell the story of the day. Pure wedding photojournalists do not direct or pose the wedding party or guests. Their aim is to tell the story through pictures and capture genuine moments and emotions as they occur throughout the day. Storytelling is key to this style of wedding photography. Successful wedding photojournalists have great powers of concentration understand the importance of composition and anticipation. Generally they would be perceptive of events and emotions going on around them. ', 5000, 15000, 1),
(3, 'Wedding shoot', 'I do wedding shoot', 7000, 24000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `prof_pic` varchar(255) NOT NULL,
  `access_level` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `fname`, `lname`, `username`, `password`, `email`, `contact`, `prof_pic`, `access_level`, `active`) VALUES
(1, 'Isaac', 'Kiplel', 'isaac', '$2y$10$43GKopjpn50G3o8sRy/2cOW6er.0xfRF8zJuLRafDHygHQB6b.Pgi', 'kiplelisaac@gmail.com', '0707088150', '../assets/upload/shm.jpg', 2, 1),
(2, 'Amani', 'Newton', 'amani', '$2y$10$S3qxFQMB/10fFhdzWiMGF.cWQ3tRHGfoNsv4yyTaDP62Fk8v18jd.', 'amani@gmail.com', '0774010328', '../assets/upload/amani.jpg', 3, 1),
(3, 'Jane', 'Doe', 'jane', '$2y$10$D6qYB5/989SgEiJ24ye01uSCfYas.irn.VDiTFSY/wj5JwozlOvLy', 'janedoe@gmail.com', '0702805215', '../assets/upload/Aoki.jpg', 3, 1),
(4, 'john', 'doe', 'john', '$2y$10$jrkkwfnpI7rEKaAevbdddeKNuIXg7au1IpuagoUDDihiwL5tqDn2C', 'johndoe@gmail.com', '0774010328', '../assets/upload/avicii.png', 2, 1),
(5, 'mistah', 'Mboya', 'mistah', '$2y$10$reRtvM71JAtdmC9O4d4mle76upUCJid1rPN3TmirvYg75cyIhQ3D.', 'michael.mboya@strathmore.edu', '0799529328', '../assets/upload/AW.jpg', 2, 1),
(6, 'admin', 'admin', 'admin', '$2y$10$uzMVKM/glQaLUJEoySQyz.g.iTaIFQEcMnXzdiNqXT8a9rNskppIe', 'admin123@gmail.com', '0714253674', '../assets/upload/AviciiIcon.jpg', 1, 1),
(8, 'Google', 'Play', 'google', '$2y$10$bJJiG2uyVB8YpAKuIZkode7IYHMY/hUhni9bZVcys/BTJSVrd4Y0e', 'googleplay@gmail.com', '0714253663', '../assets/upload/hardwell.jpg', 2, 1),
(11, 'Test', 'Admin', 'Test', '$2y$10$mdvp2npLr8FXbazqeMU6c.VGfFaU4mW4RZxxbPo23A0e9PtI6vk72', 'test@123.com', '0789654123', '../assets/upload/martinG.jpg', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `photographerID` (`photographerID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `photographersID` (`photographersID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`photographID`),
  ADD KEY `photographersID` (`photographersID`);

--
-- Indexes for table `photographers`
--
ALTER TABLE `photographers`
  ADD PRIMARY KEY (`photographersID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RatingID`),
  ADD KEY `photographID` (`photographerID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `photographerID` (`photographerID`),
  ADD KEY `photographsID` (`photographsID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `photographID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `photographers`
--
ALTER TABLE `photographers`
  MODIFY `photographersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`photographerID`) REFERENCES `photographers` (`photographersID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`photographersID`) REFERENCES `photographers` (`photographersID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`photographersID`) REFERENCES `photographers` (`photographersID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photographers`
--
ALTER TABLE `photographers`
  ADD CONSTRAINT `photographers_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`photographerID`) REFERENCES `gallery` (`photographID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`photographerID`) REFERENCES `photographers` (`photographersID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`photographsID`) REFERENCES `gallery` (`photographID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;