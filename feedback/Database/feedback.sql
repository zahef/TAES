-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2016 at 06:03 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch_master`
--

CREATE TABLE IF NOT EXISTS `batch_master` (
  `batch_id` int(20) NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(255) NOT NULL,
  `feedback_no` int(2) NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `branch_master`
--

CREATE TABLE IF NOT EXISTS `branch_master` (
  `b_id` int(20) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(255) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `branch_master`
--

INSERT INTO `branch_master` (`b_id`, `b_name`) VALUES
(1, 'ICT'),
(2, 'BAM'),
(3, 'VP'),
(4, 'ITM'),
(5, 'BM');

-- --------------------------------------------------------

--
-- Table structure for table `division_master`
--

CREATE TABLE IF NOT EXISTS `division_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `division` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `division_master`
--

INSERT INTO `division_master` (`id`, `division`) VALUES
(1, 'AD'),
(2, 'NE'),
(4, 'TE');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_master`
--

CREATE TABLE IF NOT EXISTS `faculty_master` (
  `f_id` int(20) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 NOT NULL,
  `img` varchar(1000) NOT NULL,
  `b_id` int(20) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `faculty_master`
--

INSERT INTO `faculty_master` (`f_id`, `f_name`, `l_name`, `password`, `img`, `b_id`) VALUES
(4, 'art', 'd', '77', '', 1),
(13, 'ss', 'ss', 'ss', '4', 3),
(46, 'Tryfon', 'Theodorou', '123', 'Tryfon.jpg', 1),
(47, 'George', 'violantes', 'gg', 'George.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ques_id` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ques_id` (`ques_id`),
  KEY `ques_id_2` (`ques_id`),
  KEY `answer` (`answer`),
  KEY `page_id` (`page_id`),
  KEY `msg_id` (`msg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `ques_id`, `answer`, `page_id`, `msg_id`) VALUES
(17, 1, 4, 14, 5),
(18, 2, 3, 14, 5),
(19, 3, 3, 14, 5),
(20, 4, 5, 14, 5),
(21, 5, 5, 14, 5),
(22, 6, 5, 14, 5),
(23, 7, 5, 14, 5),
(24, 8, 5, 14, 5),
(25, 1, 5, 14, 6),
(26, 2, 5, 14, 6),
(27, 3, 5, 14, 6),
(28, 4, 4, 14, 6),
(29, 5, 4, 14, 6),
(30, 6, 4, 14, 6),
(31, 7, 2, 14, 6),
(32, 8, 2, 14, 6),
(33, 1, 2, 14, 7),
(34, 2, 3, 14, 7),
(35, 3, 2, 14, 7),
(36, 4, 4, 14, 7),
(37, 5, 1, 14, 7),
(38, 6, 1, 14, 7),
(39, 7, 5, 14, 7),
(40, 8, 5, 14, 7),
(41, 1, 2, 14, 8),
(42, 2, 2, 10, 8),
(43, 3, 2, 10, 8),
(44, 4, 3, 10, 8),
(45, 5, 3, 10, 8),
(46, 6, 3, 10, 8),
(47, 7, 2, 10, 8),
(48, 8, 2, 14, 8),
(49, 1, 3, 16, 9),
(50, 2, 3, 16, 9),
(51, 3, 3, 16, 9),
(52, 4, 4, 16, 9),
(53, 5, 5, 16, 9),
(54, 6, 2, 16, 9),
(55, 7, 2, 16, 9),
(56, 8, 1, 16, 9),
(57, 1, 1, 16, 10),
(58, 2, 1, 16, 10),
(59, 3, 2, 16, 10),
(60, 4, 2, 16, 10),
(61, 5, 3, 16, 10),
(62, 6, 3, 16, 10),
(63, 7, 4, 16, 10),
(64, 8, 4, 16, 10),
(65, 1, 5, 16, 11),
(66, 2, 5, 16, 11),
(67, 3, 5, 16, 11),
(68, 4, 5, 16, 11),
(69, 5, 1, 16, 11),
(70, 6, 1, 16, 11),
(71, 7, 2, 16, 11),
(72, 8, 2, 16, 11),
(73, 1, 4, 16, 12),
(74, 2, 4, 16, 12),
(75, 3, 4, 16, 12),
(76, 4, 5, 16, 12),
(77, 5, 5, 16, 12),
(78, 6, 5, 16, 12),
(79, 7, 4, 16, 12),
(80, 8, 4, 16, 12),
(81, 1, 2, 26, 13),
(82, 2, 3, 26, 13),
(83, 3, 4, 26, 13),
(84, 4, 5, 26, 13),
(85, 5, 4, 26, 13),
(86, 6, 5, 26, 13),
(87, 7, 4, 26, 13),
(88, 8, 2, 26, 13),
(89, 1, 2, 26, 14),
(90, 2, 4, 26, 14),
(91, 3, 4, 26, 14),
(92, 4, 1, 26, 14),
(93, 5, 1, 26, 14),
(94, 6, 5, 26, 14),
(95, 7, 5, 26, 14),
(96, 8, 4, 26, 14),
(97, 9, 3, 26, 14),
(98, 1, 3, 25, 15),
(99, 2, 2, 25, 15),
(100, 3, 1, 25, 15),
(101, 4, 4, 25, 15),
(102, 5, 5, 25, 15),
(103, 6, 4, 25, 15),
(104, 7, 3, 25, 15),
(105, 8, 3, 25, 15),
(106, 9, 2, 25, 15),
(107, 1, 5, 25, 16),
(108, 2, 5, 25, 16),
(109, 3, 1, 25, 16),
(110, 4, 1, 25, 16),
(111, 5, 2, 25, 16),
(112, 6, 2, 25, 16),
(113, 7, 3, 25, 16),
(114, 8, 3, 25, 16),
(115, 9, 4, 25, 16);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_para`
--

CREATE TABLE IF NOT EXISTS `feedback_para` (
  `para_id` int(1) NOT NULL,
  `batch_id` int(10) NOT NULL,
  `b_id` int(10) NOT NULL,
  `sem_id` int(10) NOT NULL,
  `division_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_para`
--

INSERT INTO `feedback_para` (`para_id`, `batch_id`, `b_id`, `sem_id`, `division_id`) VALUES
(1, 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_ques_master`
--

CREATE TABLE IF NOT EXISTS `feedback_ques_master` (
  `q_id` int(20) NOT NULL AUTO_INCREMENT,
  `ques` varchar(255) NOT NULL,
  `one_word` varchar(255) NOT NULL,
  PRIMARY KEY (`q_id`),
  KEY `ques` (`ques`),
  KEY `one_word` (`one_word`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `feedback_ques_master`
--

INSERT INTO `feedback_ques_master` (`q_id`, `ques`, `one_word`) VALUES
(1, 'Teacher was punctual in class.', 'Punctual '),
(2, 'Teacher was well prepared for the classes.', 'Well_prepared'),
(3, 'Teacher communication skill were good.', 'Communication'),
(4, 'Teaching methodology was good.', 'Methodology '),
(5, 'Teacher had clearly defined objectives for each class.', 'Defined_objectives'),
(6, 'Teacher adequately cleared all my doubts and was helpful in solving queries.', 'Solving_queries'),
(7, 'Teacher treated me with respect and aided in my learning.', 'Respected'),
(8, 'Teacher was instrumental in the value addition process.', 'Instrumental_use'),
(9, 'In my opinion the same Teacher should be continued for such subjects.', 'Be_continued'),
(10, '\r\nRate the level of your involvement in the activities of this course.', 'activities ');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`username`, `password`) VALUES
('admin', '*00A51F3F48415C7D4E8908980D443C29C69B60C9');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txt` varchar(1000) NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `txt`, `page_id`) VALUES
(1, 'Ali', 0),
(2, 'Ali', 37),
(3, 'Ali', 37),
(4, 'Ali', 37),
(5, 'Alawy', 14),
(6, 'khaled', 10),
(7, 'rashed', 10),
(8, 'oooo', 10),
(9, 'Ali', 16),
(10, 'alawy', 16),
(11, 'alawy', 16),
(12, 'Alawy', 16),
(13, '', 26),
(14, '', 26),
(15, '', 25),
(16, '', 25);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `branch_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `date` int(4) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `branch_id` (`branch_id`),
  KEY `branch_id_2` (`branch_id`),
  KEY `division_id` (`division_id`),
  KEY `faculty_id` (`faculty_id`),
  KEY `semester_id` (`semester_id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `password`, `branch_id`, `division_id`, `faculty_id`, `semester_id`, `subject_id`, `date`, `year`) VALUES
(14, 'sWFw5K)t', 1, 2, 44, 2, 7, 2016, 1),
(16, ':3r4VZlM', 1, 1, 46, 4, 8, 2015, 2),
(25, '876gI9Fq', 1, 1, 46, 3, 8, 2016, 1),
(26, 'T856fvBd', 1, 1, 13, 1, 2, 2017, 1),
(27, 'sYGLEwRH', 1, 1, 46, 4, 4, 2016, 2),
(28, 'msqWcfGO', 1, 1, 47, 4, 5, 2016, 1),
(29, 'eOEJUO(j', 1, 1, 47, 2, 5, 2016, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester_master`
--

CREATE TABLE IF NOT EXISTS `semester_master` (
  `sem_id` int(20) NOT NULL AUTO_INCREMENT,
  `sem_name` varchar(255) NOT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `semester_master`
--

INSERT INTO `semester_master` (`sem_id`, `sem_name`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_ques` varchar(10000) NOT NULL,
  `s_one_word` varchar(100) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`s_id`, `s_ques`, `s_one_word`) VALUES
(1, 'Teacher was punctual in class.', 'Punctual'),
(2, 'Teacher was well prepared for the classes.', 'Well_prepared'),
(3, 'eacher communication skill were good.', 'Communication'),
(4, 'Teaching methodology was good.', 'Methodology '),
(5, 'Teacher had clearly defined objectives for each class.', 'Defined_objectives'),
(6, 'Teacher adequately cleared all my doubts and was helpful in solving queries.', 'Solving_queries'),
(7, 'Teacher treated me with respect and aided in my learning.', 'Respected'),
(8, 'Teacher was instrumental in the value addition process.', 'Instrumental_use'),
(9, 'In my opinion the same Teacher should be continued for such subjects.', 'Be_continued');

-- --------------------------------------------------------

--
-- Table structure for table `subject_master`
--

CREATE TABLE IF NOT EXISTS `subject_master` (
  `sub_id` int(20) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(255) NOT NULL,
  `sem_id` int(20) NOT NULL,
  `f_id` int(20) NOT NULL,
  `batch_id` int(20) NOT NULL,
  `division_id` int(10) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`sub_id`, `sub_name`, `sem_id`, `f_id`, `batch_id`, `division_id`) VALUES
(2, 'Html', 2, 1, 2, 1),
(3, 'Linux Archi.', 2, 1, 2, 1),
(4, 'JavaFX', 1, 2, 2, 1),
(5, 'PHP', 2, 2, 2, 2),
(6, 'Wireless Comm.', 1, 4, 2, 1),
(7, 'Wireless LAN', 2, 4, 2, 2),
(8, 'Java', 1, 5, 2, 1),
(9, 'Windows Server', 2, 5, 2, 2),
(10, 'Database', 1, 7, 2, 1),
(11, 'css', 0, 0, 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`msg_id`) REFERENCES `msg` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`ques_id`) REFERENCES `feedback_ques_master` (`q_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
