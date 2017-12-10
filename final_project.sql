-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 06:29 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `admin_name` varchar(35) NOT NULL,
  `admin_email` varchar(35) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `admin_name`, `admin_email`) VALUES
(3, 'EmilyDaniel', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Emily', 'emilydaniel@students.stir.ac.uk'),
(4, 'admin', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'admin', 'admin@students.stir.ac.uk'),
(6, 'AnnaRasburn', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Anna', 'annarasburn@students.stir.ac.uk'),
(7, 'CallumBaptie', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Callum', 'callumbaptie@students.stir.ac.uk'),
(8, 'VictoriaOrr', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Victoria', 'victoriaorr@students.stir.ac.uk'),
(9, 'MoArchbold', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Mo', 'moarchbold@students.stir.ac.uk'),
(10, 'FatmaHegazy', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Fatma', 'fatmahegazy@students.stir.ac.uk'),
(11, 'JackPickles', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Jack', 'jackpickles@students.stir.ac.uk'),
(12, 'TammyPaulsen', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Tammy', 'tammypaulsen@students.stir.ac.uk'),
(13, 'RachelHodgson', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Rachel', 'rachelhodgson@students.stir.ac.uk'),
(14, 'IainMorrison', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Iain', 'iainmorrison@students.stir.ac.uk'),
(15, 'LewisMcBlane', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Lewis', 'lewismcblane@students.stir.ac.uk'),
(16, 'RowenRennie', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Rowen', 'rowenrennie@students.stir.ac.uk'),
(17, 'EmilyBurnett', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Emily', 'emilyburnett@students.stir.ac.uk'),
(18, 'GeorgiaPrecious', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Georgia', 'georgiaprecious@students.stir.ac.uk'),
(19, 'ReubenBurgess', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Reuben', 'reubenburgess@students.stir.ac.uk'),
(20, 'FraserLundie', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Fraser', 'fraserlundie@students.stir.ac.uk'),
(21, 'GrahamBlair', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Graham', 'grahamblair@students.stir.ac.uk'),
(22, 'KateJardine', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Kate', 'katejardine@students.stir.ac.uk'),
(23, 'AngusGillespie', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'Angus', 'angusgillespie@students.stir.ac.uk'),
(24, 'admin', '25ab86bed149ca6ca9c1c0d5db7c9a91388', 'admin', 'admin@students.stir.ac.uk'),
(25, 'admin2', 's3cr3t', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block',
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `created`, `modified`, `status`, `location`, `picture`, `time`) VALUES
(1, 'Jam Night', '2017-12-12', '2015-11-09 06:15:17', '2015-11-09 06:15:17', 1, 'The Cottage', 'jam.jpg', '8pm'),
(2, 'Social: Pub Crawl', '2017-12-26', '2015-11-09 06:15:17', '2015-11-09 06:15:17', 1, 'Pubs in Stirling', 'pubcrawl.jpg', '9pm'),
(3, 'Folk Night', '2017-12-13', '2015-11-09 06:15:17', '2015-11-09 06:15:17', 1, 'Settle Inn', 'folkNight.jpg', '8pm'),
(4, 'Gig', '2017-12-17', '2015-11-09 06:15:17', '2015-11-09 06:15:17', 1, 'Toolbooth', 'gig.jpg', '7pm'),
(5, 'Guitar class', '2017-12-18', '2015-11-09 06:15:17', '2015-11-09 06:15:17', 1, 'The Cottage', 'guitar.jpg', '5pm'),
(6, 'Practice', '2017-12-14', '2017-12-14 00:00:00', '2017-12-14 00:00:00', 1, 'The Cottage', 'practice.jpg', '7pm'),
(7, 'Concert - 4 strings', '2017-12-04', '2017-11-14 00:00:00', '2017-11-14 00:00:00', 1, 'The Albert Halls', 'concert.jpg', '7pm'),
(8, 'Open Mic', '2017-12-30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'The union', 'openmic.jpg', '7pm');

-- --------------------------------------------------------

--
-- Table structure for table `room_booking`
--

CREATE TABLE IF NOT EXISTS `room_booking` (
  `room_booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `date_booked_for` date NOT NULL,
  `time_booked_for` time NOT NULL,
  `length_of_stay` int(5) NOT NULL,
  PRIMARY KEY (`room_booking_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `room_booking`
--

INSERT INTO `room_booking` (`room_booking_id`, `admin_id`, `admin_email`, `admin_name`, `date_booked_for`, `time_booked_for`, `length_of_stay`) VALUES
(1, 3, 'emilydaniel@students.stir.ac.uk', 'Emily', '2017-12-03', '16:00:00', 2),
(2, 3, 'emilydaniel@students.stir.ac.uk', 'Emily', '2017-12-03', '16:00:00', 2),
(5, 3, '', '', '2017-12-06', '16:00:00', 2),
(6, 3, '', '', '2017-12-06', '16:00:00', 2),
(13, 7, '', '', '2017-12-10', '16:00:00', 2),
(14, 7, '', '', '2017-12-10', '16:00:00', 2),
(31, 4, '', '', '2017-12-20', '11:00:00', 1),
(32, 4, '', '', '2017-12-20', '12:00:00', 2),
(33, 4, '', '', '2017-12-03', '10:00:00', 2),
(34, 4, '', '', '2017-12-10', '10:00:00', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room_booking`
--
ALTER TABLE `room_booking`
  ADD CONSTRAINT `room_booking_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
