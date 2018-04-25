-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 11:47 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lr`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabpool`
--

CREATE TABLE IF NOT EXISTS `cabpool` (
`post_id` int(11) NOT NULL,
  `cabfrom` varchar(100) NOT NULL,
  `cabto` varchar(100) NOT NULL,
  `cabwhen` varchar(100) NOT NULL,
  `cabname` varchar(1023) NOT NULL,
  `contact` int(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabpool`
--

INSERT INTO `cabpool` (`post_id`, `cabfrom`, `cabto`, `cabwhen`, `cabname`, `contact`) VALUES
(1, '11', '11', '1111-11-11T11:01', 'dhananjay', 0),
(2, '2', '2', '0022-02-22T02:02', 'dhananjay', 0),
(3, '3', '3', '0333-03-31T03:33', 'dhananjay', 0),
(4, '4', '4', '0444-04-04T04:04', 'dhananjay', 44),
(5, 'sdsd', 'dsds', '223223-03-23T03:33', 'Deepankar', 323232);

-- --------------------------------------------------------

--
-- Table structure for table `imprints`
--

CREATE TABLE IF NOT EXISTS `imprints` (
`post_id` int(11) NOT NULL,
  `eventTitle` varchar(200) NOT NULL,
  `eventDesc` varchar(1023) NOT NULL,
  `eventTime` varchar(100) NOT NULL,
  `eventLoc` varchar(200) NOT NULL,
  `imgFile` varchar(1023) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imprints`
--

INSERT INTO `imprints` (`post_id`, `eventTitle`, `eventDesc`, `eventTime`, `eventLoc`, `imgFile`) VALUES
(11, 'Title', 'leprom de la apple est la description', '2123-03-12T23:23', 'B315', 'club_uploads/imprints/24-04-2018-1524554840the-blind-guitar-player.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lnf`
--

CREATE TABLE IF NOT EXISTS `lnf` (
`post_id` int(11) NOT NULL,
  `lost-found` varchar(5) NOT NULL,
  `lfwhat` varchar(1023) NOT NULL,
  `lfwhere` varchar(1023) NOT NULL,
  `lfwhen` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `lfname` varchar(1023) NOT NULL,
  `contact` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lnf`
--

INSERT INTO `lnf` (`post_id`, `lost-found`, `lfwhat`, `lfwhere`, `lfwhen`, `image`, `lfname`, `contact`) VALUES
(19, 'LOST', '2e2', '2e2e', '2018-03-31T01:02', 'assets/images26-03-2018-15220818321dark-drawings-pencil-98628962-768x920.jpg', 'Deepankar', 332222),
(20, 'LOST', '22r', 'rwrwr', '0113-02-03T13:01', 'assets/images/26-03-2018-152208187311.jpg', 'Deepankar', 232),
(21, 'FOUND', '111', '1111', '0111-11-11T11:01', 'uploads/04-04-2018-152283387410448410_1057260187641372_8246765847493926908_o.jpg', 'Deepankar', 11111),
(22, 'LOST', 'weq', 'qqwq', '12121-12-12T12:12', 'assets/images/14-04-2018-1523714481sponsor.jpg', 'Deepankar', 1444),
(23, 'LOST', '12312', '23123', '0123-03-12T21:23', 'assets/images/23-04-2018-15245173531dark-drawings-pencil-98628962-768x920.jpg', 'Deepankar', 123123),
(24, 'FOUND', '1', '1', '111111-11-11T11:11', 'uploads/24-04-2018-152454054511.jpg', 'Deepankar', 111),
(25, 'FOUND', '2', '2', '222222-02-22T22:02', 'lost-found-uploads/24-04-2018-15245407451dark-drawings-pencil-98628962-768x920.jpg', 'Deepankar', 2),
(26, 'FOUND', 'qweqwe', 'qweqwe', '232312-03-12T03:31', 'lost-found-uploads/24-04-2018-1524544152the-blind-guitar-player.jpg', 'Deepankar', 1231),
(27, 'FOUND', 'j', 'canopy', '0001-02-04T04:20', 'lost-found-uploads/24-04-2018-1524556166water_dragon__pencil__by_paul_stowe.jpg', 'Deepankar', 420);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `email_code` varchar(32) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `email_code`, `active`) VALUES
(27, 'deepankar', '0192023a7bbd73250516f069df18b500', 'Deepankar', 'Adhikari', 'da931@snu.edu.in', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(28, 'dhananjay', '5f4dcc3b5aa765d61d8327deb882cf99', 'dhananjay', 'singh', 'ds167@snu.edu.in', '5878f050f841fdd6d96fa42db3065e09', 1),
(29, 'asd', '0192023a7bbd73250516f069df18b500', 'asdasd', 'asasd', 'hp598@snu.edu.in', 'ff9db4aaf2afa9d7f62a49f33c7abfe8', 0),
(30, 'karth', '0192023a7bbd73250516f069df18b500', 'asdad', 'asad', 'KT@snu.edu.in', '4978eebebc2e5497bd7ee154cf09dca9', 0),
(31, 'newwe', '0192023a7bbd73250516f069df18b500', '', '', 'ad@snu.edu.in', 'ebfa3f8a45468d73abfcfae0fea96f4e', 0),
(32, 'czxzxc', '0192023a7bbd73250516f069df18b500', '', '', 'da@snu.edu.in', 'c4e1ba22bd059fa74db73ee6e77b183a', 0),
(33, 'xcvxv', '0192023a7bbd73250516f069df18b500', '', '', 'kd111@snu.edu.in', '62d08e67248abe5ccb06b2cd88d53d61', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabpool`
--
ALTER TABLE `cabpool`
 ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `imprints`
--
ALTER TABLE `imprints`
 ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `lnf`
--
ALTER TABLE `lnf`
 ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD FULLTEXT KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabpool`
--
ALTER TABLE `cabpool`
MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `imprints`
--
ALTER TABLE `imprints`
MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `lnf`
--
ALTER TABLE `lnf`
MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
