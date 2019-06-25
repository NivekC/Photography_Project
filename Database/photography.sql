-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2019 at 07:17 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

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
(17, '2019-06-24', 'Eldoret', 'Wedding shoot', 2, 1, 0, 0),
(18, '2019-07-30', 'Runda', 'Solo Shoot', 1, 1, 1, 1);

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
(1, '../assets/upload/4k-wallpaper-adorable-blur-1148998.jpg', 'Birthday shoots', 1, 0),
(2, '../assets/upload/adorable-baby-child-356192.jpg', 'Birthday shoots', 1, 0),
(3, '../assets/upload/adult-art-artistic-917594.jpg', 'Birthday shoots', 1, 0),
(4, '../assets/upload/afro-beautiful-child-1068205.jpg', 'Baby shoots', 1, 0),
(5, '../assets/upload/art-artistic-blue-eyes-1209843.jpg', 'Baby shoots', 1, 0),
(6, '../assets/upload/art-artsy-backlit-595747.jpg', 'Baby shoots', 1, 0),
(7, '../assets/upload/art-celebration-closed-eyes-1937301.jpg', 'Baby shoots', 1, 0),
(8, '../assets/upload/art-dark-ethnic-1038041.jpg', 'Baby shoots', 1, 0),
(9, '../assets/upload/attachment-baby-boy-1027931.jpg', 'Event', 1, 0),
(10, '../assets/upload/clown.jpg', 'Birthday shoots', 2, 0),
(11, '../assets/upload/blurred-background-boy-child-1416736.jpg', 'Nature', 2, 0),
(12, '../assets/upload/child-girl-little-36483.jpg', 'Nature', 2, 0),
(13, '../assets/upload/ancient-arch-arch-bridge-507410.jpg', 'Nature', 2, 0),
(14, '../assets/upload/animal-photography-daylight-elephant-247431.jpg', 'Nature', 2, 0),
(15, '../assets/upload/adults-africa-colorful-667200.jpg', 'Art', 2, 0);

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
(2, 3, 'I am an editorial and commercial photographer, specializing in people and corporate photography with a style consisting of colorful and energetic imagery. Running a client-friendly, service-oriented business he believes that great creativity often is the result of team effort and values working closely with his clients. Based in Jacksonville Beach, Florida Ryan and his team are ready to create outstanding visuals for you.');

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
(1, 5, 'It was an awesome experience working with him.', 2),
(2, 5, 'He is a very good photographer', 1);

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
(5, 'Offensive', 'I dont wish to see it', '2019-06-25 10:42:07', 1, 7, 0),
(6, 'Not appropriate', 'I did not like what the picture depicted', '2019-06-25 20:00:01', 1, 10, 0);

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
(6, 'admin', 'admin', 'admin', '$2y$10$uzMVKM/glQaLUJEoySQyz.g.iTaIFQEcMnXzdiNqXT8a9rNskppIe', 'newton.amani@strathmore.edu', '0714253674', '../assets/upload/AviciiIcon.jpg', 1, 1),
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
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `photographID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `photographers`
--
ALTER TABLE `photographers`
  MODIFY `photographersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
