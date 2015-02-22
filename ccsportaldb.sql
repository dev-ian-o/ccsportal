-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2015 at 11:50 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a3105736_ccsport`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `admin_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` VALUES(1, 'Olinares', 'Ian', 'adminsample', '433cdfecfbc5711be2ee148baa19038de415879b', 'active1');

-- --------------------------------------------------------

--
-- Table structure for table `tblgrades`
--

CREATE TABLE `tblgrades` (
  `id_grades` int(10) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `school_year` varchar(20) NOT NULL,
  `midterm_grade` varchar(5) NOT NULL,
  `finalterm_grade` varchar(5) NOT NULL,
  `sem_grade` varchar(5) NOT NULL,
  `id_student` varchar(10) NOT NULL,
  `id_teacher` varchar(10) NOT NULL,
  `midterm_grading` double NOT NULL DEFAULT '40',
  `finalgrading` double NOT NULL DEFAULT '60',
  PRIMARY KEY (`id_grades`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tblgrades`
--

INSERT INTO `tblgrades` VALUES(1, '', '2013-2014', '1', '3', '2', '4', '2', 40, 60);
INSERT INTO `tblgrades` VALUES(3, '13', '2013-2014', '1', '5', '3', '34', '2', 30, 70);
INSERT INTO `tblgrades` VALUES(4, '', '2013-2014', '1', '5', '3', '4', '2', 40, 60);
INSERT INTO `tblgrades` VALUES(5, '14', '2013-2014', '2.0', '1.9', '1.93', '4', '2', 50, 50);
INSERT INTO `tblgrades` VALUES(6, '14', '2013-2014', '1', '1', '1', '34', '2', 50, 50);
INSERT INTO `tblgrades` VALUES(7, '13', '2013-2014', '2', '1', '1.5', '4', '2', 30, 70);
INSERT INTO `tblgrades` VALUES(8, '15', '2013-2014', '1.0', '2.0', '1.6', '4', '2', 40, 60);

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

CREATE TABLE `tblpost` (
  `id_post` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(50) NOT NULL,
  `level_user` varchar(10) NOT NULL,
  `date_post` datetime NOT NULL,
  `comments` int(11) NOT NULL,
  `post` mediumtext NOT NULL,
  `post_for` varchar(100) NOT NULL,
  `subject_for` varchar(100) NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `tblpost`
--

INSERT INTO `tblpost` VALUES(1, '4', 'student', '2014-02-15 14:14:17', 0, 'iansdsaf', '3-BITSM', 'Web Development');
INSERT INTO `tblpost` VALUES(24, '4', 'student', '2014-02-17 10:19:01', 0, 'Gwapo si ian pramis!', '3-BITSM', 'Web Development');
INSERT INTO `tblpost` VALUES(25, '2', 'teacher', '2014-02-17 23:45:13', 0, 'New design suupeer coools', 'all', '');
INSERT INTO `tblpost` VALUES(26, '4', 'student', '2014-02-19 13:38:59', 0, 'asdfgh', '3-BITSM', '');
INSERT INTO `tblpost` VALUES(27, '2', 'teacher', '2014-02-19 14:03:44', 0, 'qweqwe', 'all', '');
INSERT INTO `tblpost` VALUES(50, '4', 'student', '2014-03-04 23:07:49', 0, 'good here ;]', '3-BITSM', 'Web Development');
INSERT INTO `tblpost` VALUES(51, '4', 'student', '2014-03-05 03:54:16', 0, 'Gogogo', '3-BITSM', 'Web Development');
INSERT INTO `tblpost` VALUES(52, '4', 'student', '2014-03-07 01:36:41', 0, 'good!', '3-BITSM', 'Elective 1');
INSERT INTO `tblpost` VALUES(53, '2', 'teacher', '2014-04-01 02:46:03', 0, '', 'all', '');
INSERT INTO `tblpost` VALUES(54, '4', 'student', '2014-05-29 19:19:06', 0, 'fsdf', 'all', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblschedule`
--

CREATE TABLE `tblschedule` (
  `id_schedule` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `date_sched` datetime NOT NULL,
  `description` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_editted` datetime NOT NULL,
  `image` varchar(50) NOT NULL,
  `place` varchar(100) NOT NULL,
  `id_user` int(10) NOT NULL,
  `level_user` varchar(45) NOT NULL,
  PRIMARY KEY (`id_schedule`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tblschedule`
--

INSERT INTO `tblschedule` VALUES(35, 'asdasaaal', 'Nazianceno Aaron', '2014-03-03 19:00:00', ' asdasdas l', '2014-02-28 16:19:28', '2014-03-03 19:42:03', '', 'sdasdasdasdl', 2, 'teacher');
INSERT INTO `tblschedule` VALUES(36, 'Okay na to its', 'Nazianceno Aaron', '2014-02-28 22:00:00', ':]]]]', '2014-02-28 16:21:20', '0000-00-00 00:00:00', '', 'dasda', 2, 'teacher');
INSERT INTO `tblschedule` VALUES(37, 'New try', 'Nazianceno Aaron', '2014-02-28 22:00:00', ' asdasdasd', '2014-02-28 16:30:55', '0000-00-00 00:00:00', '', 'asdalksjd', 2, 'teacher');
INSERT INTO `tblschedule` VALUES(38, 'asdas', 'Nazianceno Aaron', '2014-03-03 10:00:00', ' alskdljs', '2014-03-03 20:10:14', '0000-00-00 00:00:00', '', 'skflk', 2, 'teacher');
INSERT INTO `tblschedule` VALUES(39, 'lsjdlajsldjlasj', 'Nazianceno Aaron', '2014-03-10 22:00:00', '2014-03-10', '2014-03-03 20:11:46', '2014-03-09 21:09:07', '', 'slma;lkd;laksldk', 2, 'teacher');
INSERT INTO `tblschedule` VALUES(40, 'asdalsd', 'Nazianceno Aaron', '2014-03-03 10:00:00', ' laksjdla', '2014-03-03 20:15:26', '0000-00-00 00:00:00', '', 'asnda,sm', 2, 'teacher');
INSERT INTO `tblschedule` VALUES(41, 'okay', 'Nazianceno Aaron', '2013-02-04 21:05:00', ' :)', '2014-03-05 04:06:45', '0000-00-00 00:00:00', '', 'everywhere', 2, 'teacher');
INSERT INTO `tblschedule` VALUES(42, '', 'Nazianceno Aaron', '2014-01-05 00:00:00', ' ', '2014-03-05 04:07:36', '0000-00-00 00:00:00', '', '', 2, 'teacher');
INSERT INTO `tblschedule` VALUES(43, '', 'Nazianceno Aaron', '2014-02-05 00:00:00', ' ', '2014-03-05 05:01:46', '0000-00-00 00:00:00', '', '', 2, 'teacher');
INSERT INTO `tblschedule` VALUES(44, '', 'Nazianceno Aaron', '0000-00-00 00:00:00', ' ', '2014-03-07 14:17:52', '0000-00-00 00:00:00', '', '', 2, 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `tblsched_for`
--

CREATE TABLE `tblsched_for` (
  `id_sched_for` int(10) NOT NULL AUTO_INCREMENT,
  `id_schedule` int(10) NOT NULL,
  `sched_for` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sched_for`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tblsched_for`
--

INSERT INTO `tblsched_for` VALUES(20, 36, '3-BITSM');
INSERT INTO `tblsched_for` VALUES(22, 37, '3-BITSM');
INSERT INTO `tblsched_for` VALUES(23, 37, '3-BITSM');
INSERT INTO `tblsched_for` VALUES(28, 35, '3-AITSM');
INSERT INTO `tblsched_for` VALUES(29, 38, '3-BITSM');
INSERT INTO `tblsched_for` VALUES(30, 38, '3-BITSM');
INSERT INTO `tblsched_for` VALUES(38, 39, '3-BITSM');
INSERT INTO `tblsched_for` VALUES(37, 39, '3-AITSM');
INSERT INTO `tblsched_for` VALUES(33, 40, '3-AITSM');
INSERT INTO `tblsched_for` VALUES(34, 41, '3-AITSM');
INSERT INTO `tblsched_for` VALUES(35, 41, '3-BITSM');
INSERT INTO `tblsched_for` VALUES(36, 43, '3-BITSM');
INSERT INTO `tblsched_for` VALUES(39, 39, '3-BITSM');

-- --------------------------------------------------------

--
-- Table structure for table `tblschool_year`
--

CREATE TABLE `tblschool_year` (
  `id_school_year` int(10) NOT NULL AUTO_INCREMENT,
  `school_year` varchar(50) NOT NULL,
  PRIMARY KEY (`id_school_year`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tblschool_year`
--

INSERT INTO `tblschool_year` VALUES(1, '2013-2014');
INSERT INTO `tblschool_year` VALUES(20, '2012-2013');

-- --------------------------------------------------------

--
-- Table structure for table `tblsem_sched`
--

CREATE TABLE `tblsem_sched` (
  `id_sem_sched` int(10) NOT NULL AUTO_INCREMENT,
  `school_year` varchar(50) NOT NULL,
  `semester` varchar(7) NOT NULL,
  `course_year` varchar(50) NOT NULL,
  `section` varchar(10) NOT NULL,
  `course` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `room` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `days` varchar(100) NOT NULL,
  `comp_section` varchar(45) NOT NULL,
  PRIMARY KEY (`id_sem_sched`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tblsem_sched`
--

INSERT INTO `tblsem_sched` VALUES(1, '2013-2014', 'first', '3', 'B', 'BS Information Technology major in Service Management', '12', 'Rm. 204 Bldg 5', '12:00:00', '13:00:00', '4', 'MWF', '3-BITSM');
INSERT INTO `tblsem_sched` VALUES(2, '2013-2014', 'first', '3', 'A', 'BS Information Technology major in Service Management', '13', 'Rm. 205 Bldg 3', '10:00:00', '13:00:00', '2', 'Tt', '3-AITSM');
INSERT INTO `tblsem_sched` VALUES(5, '2013-2014', 'first', '3', 'B', 'BS Information Technology major in Service Management', '14', 'Rm. 206 Bldg 3', '10:00:00', '12:00:00', '2', 'MWF', '3-BITSM');
INSERT INTO `tblsem_sched` VALUES(6, '2013-2014', 'first', '3', 'B', 'BS Information Technology major in Service Management', '15', 'Rm. 207 Bldg 3', '14:00:00', '16:00:00', '2', 'MTt', '3-BITSM');
INSERT INTO `tblsem_sched` VALUES(7, '2013-2014', 'first', '1', 'A', 'BS Information Technology major in Service Management', '1', 'Lab1', '12:00:00', '13:00:00', '6', 'MTW', '1-AITSM');
INSERT INTO `tblsem_sched` VALUES(8, '2012-2013', 'second', '3', 'A', 'BS Information Technology major in Service Management', '16', 'lab2', '13:00:00', '14:00:00', '6', 'MTW', '3-AITSM');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `id_student` int(10) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `add_no` int(5) NOT NULL,
  `add_street` varchar(20) NOT NULL,
  `add_brgy` varchar(20) NOT NULL,
  `add_city` varchar(20) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `student_no` varchar(8) NOT NULL,
  `yr` varchar(10) NOT NULL DEFAULT 'first',
  `section` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `course` varchar(80) DEFAULT NULL,
  `image` varchar(40) NOT NULL,
  `emailadd` varchar(45) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'new',
  `aboutme` mediumtext NOT NULL,
  `skills` mediumtext,
  PRIMARY KEY (`id_student`),
  UNIQUE KEY `contact_no_UNIQUE` (`contact_no`),
  UNIQUE KEY `student_no_UNIQUE` (`student_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` VALUES(4, 'Olinares', 'Christian Jay', 'Ramos', '1994-05-27', 1911, 'M Reyes St.', 'Bangakal', 'Makati City', '09151484349', 'Male', 'A1111476', 'third', 'B', 'AuiZYuEtJPnQsr9vaa/0jpTs6UUyokuRZQxAi7o6CBg=', 'BS Information Technology major in Service Management', 'vk5vdc6ity.jpg', NULL, 'old', 'Its always a good time:)', NULL);
INSERT INTO `tblstudent` VALUES(35, 'Olinares', 'Ian', 'Ramos', '1994-05-27', 12, '', 'asdfg', '', '09123456789', 'Male', 'A1111490', 'first', 'A', 'UQbn6XxYYf2o7C2KmLtofSzplcnRNdXVD7at5lXeVEM=', 'BS Information Technology major in Service Management', 'y9h6o7xd1a.png', NULL, 'old', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `id_subject` int(10) NOT NULL AUTO_INCREMENT,
  `subject_desc` varchar(100) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `subject_unit` varchar(4) NOT NULL,
  `semester` varchar(45) NOT NULL DEFAULT 'first',
  `course` varchar(100) NOT NULL,
  `course_year` varchar(45) NOT NULL,
  PRIMARY KEY (`id_subject`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` VALUES(1, 'IT Fundamentals', 'ITSM101', '3', 'first', 'BS Information Technology major in Service Management', '1');
INSERT INTO `tblsubject` VALUES(2, 'Programming 1 - C++', 'ITSM102', '4', 'first', 'BS Information Technology major in Service Management', '1');
INSERT INTO `tblsubject` VALUES(3, 'Programming 2 - Java', 'ITSM103', '4', 'second', 'BS Information Technology major in Service Management', '1');
INSERT INTO `tblsubject` VALUES(4, 'Database Management System 1', 'ITSM108', '4', 'second', 'BS Information Technology major in Service Management', '1');
INSERT INTO `tblsubject` VALUES(5, 'Discrete Structures', 'ITSM104', '3', 'first', 'BS Information Technology major in Service Management', '2');
INSERT INTO `tblsubject` VALUES(6, 'Object Oriented Programming', 'ITSM207', '4', 'first', 'BS Information Technology major in Service Management', '2');
INSERT INTO `tblsubject` VALUES(7, 'Accounting Principles', 'ITSM107', '6', 'first', 'BS Information Technology major in Service Management', '2');
INSERT INTO `tblsubject` VALUES(8, 'Database Management System 2', 'ITSM209', '4', 'second', 'BS Information Technology major in Service Management', '2');
INSERT INTO `tblsubject` VALUES(9, 'Operating System Applications', 'ITSM202', '4', 'second', 'BS Information Technology major in Service Management', '2');
INSERT INTO `tblsubject` VALUES(10, 'Network Management ', 'ITSM203', '4', 'second', 'BS Information Technology major in Service Management', '2');
INSERT INTO `tblsubject` VALUES(11, 'IT Service Level Management', 'ITSM212', '3', 'second', 'BS Information Technology major in Service Management', '2');
INSERT INTO `tblsubject` VALUES(12, 'Web Development', 'ITSM210', '4', 'first', 'BS Information Technology major in Service Management', '3');
INSERT INTO `tblsubject` VALUES(13, 'System Analysis and Design', 'ITSM204', '3', 'first', 'BS Information Technology major in Service Management', '3');
INSERT INTO `tblsubject` VALUES(14, 'Elective 1', 'ITSM301', '3', 'first', 'BS Information Technology major in Service Management', '3');
INSERT INTO `tblsubject` VALUES(15, 'Multimedia Systems', 'ITSM215', '4', 'first', 'BS Information Technology major in Service Management', '3');
INSERT INTO `tblsubject` VALUES(16, 'IT Services Project Management', 'ITSM213', '3', 'second', 'BS Information Technology major in Service Management', '3');
INSERT INTO `tblsubject` VALUES(17, 'Software Engineering ', 'ITSM205', '3', 'second', 'BS Information Technology major in Service Management', '3');
INSERT INTO `tblsubject` VALUES(18, 'Professional Ethics', 'ITSM106', '3', 'second', 'BS Information Technology major in Service Management', '3');
INSERT INTO `tblsubject` VALUES(19, 'IT Elective 2 : e-Business', 'ITSM302', '3', 'second', 'BS Information Technology major in Service Management', '3');
INSERT INTO `tblsubject` VALUES(20, 'Free Elective 1', 'ITSM401', '3', 'second', 'BS Information Technology major in Service Management', '3');
INSERT INTO `tblsubject` VALUES(21, 'Strategic Management Information System', 'ITSM214', '3', 'second', 'BS Information Technology major in Service Management', '3');
INSERT INTO `tblsubject` VALUES(22, 'Internship/Practicum/OJT', 'ITSM-OJT', '9', 'first', 'BS Information Technology major in Service Management', '4');
INSERT INTO `tblsubject` VALUES(23, 'Technopreneurship', 'ITSM206', '3', 'second', 'BS Information Technology major in Service Management', '4');
INSERT INTO `tblsubject` VALUES(24, 'IT Elective 3', 'ITSM303', '3', 'second', 'BS Information Technology major in Service Management', '4');
INSERT INTO `tblsubject` VALUES(27, ' Information Technology Productivity Suite', 'ITPS', '3', 'first', 'BS Computer Science', '1');
INSERT INTO `tblsubject` VALUES(28, 'Program Logic Formulation', 'CS101', '4', 'first', 'BS Computer Science', '1');
INSERT INTO `tblsubject` VALUES(29, 'Business Organization and Management', 'CNMgt1', '3', 'second', 'BS Computer Science', '1');
INSERT INTO `tblsubject` VALUES(30, 'Java Fundamentals', 'CS140', '4', 'second', 'BS Computer Science', '1');
INSERT INTO `tblsubject` VALUES(31, 'Web Development Fundamentals', 'CS120', '4', 'second', 'BS Computer Science', '1');
INSERT INTO `tblsubject` VALUES(32, 'Database Theory and Operations', 'CS130', '4', 'second', 'BS Computer Science', '1');
INSERT INTO `tblsubject` VALUES(33, ' Java with Database', 'CS141', '4', 'first', 'BS Computer Science', '2');
INSERT INTO `tblsubject` VALUES(34, ' Desktop Application', 'CS150', '4', 'first', 'BS Computer Science', '2');
INSERT INTO `tblsubject` VALUES(35, ' Web Page Devalopement Tools', 'CS121', '4', 'first', 'BS Computer Science', '2');
INSERT INTO `tblsubject` VALUES(36, ' Digital Electronics', 'CNA1', '4', 'first', 'BS Computer Science', '2');
INSERT INTO `tblsubject` VALUES(37, ' Data Structure', 'CS102', '3', 'first', 'BS Computer Science', '2');
INSERT INTO `tblsubject` VALUES(38, 'Web Development with Network Database', ' CS122', '4', 'second', 'BS Computer Science', '2');
INSERT INTO `tblsubject` VALUES(39, 'File Organization', ' CS103', '3', 'second', 'BS Computer Science', '2');
INSERT INTO `tblsubject` VALUES(40, ' System Analysis and Design', ' CS104', '3', 'second', 'BS Computer Science', '2');
INSERT INTO `tblsubject` VALUES(41, 'PC Arhitecture with Basic Troubleshooting', 'CNA2', '5', 'second', 'BS Computer Science', '2');
INSERT INTO `tblsubject` VALUES(42, 'Software Project', 'SPRO1', '4', 'second', 'BS Computer Science', '2');
INSERT INTO `tblsubject` VALUES(43, 'Operating System', 'CS105', '3', 'first', 'BS Computer Science', '3');
INSERT INTO `tblsubject` VALUES(44, 'Distributed Application', 'CS151', '5', 'first', 'BS Computer Science', '3');
INSERT INTO `tblsubject` VALUES(45, ' Network Technology', 'CNA3', '4', 'first', 'BS Computer Science', '3');
INSERT INTO `tblsubject` VALUES(46, 'CS106', 'Methods of', '3', 'first', 'BS Computer Science', '3');
INSERT INTO `tblsubject` VALUES(47, 'Elective 1', 'SLElec1', '4', 'second', 'BS Computer Science', '3');
INSERT INTO `tblsubject` VALUES(48, ' Software Engineering w/ System Project Management', 'SPRO2', '3', 'second', 'BS Computer Science', '3');
INSERT INTO `tblsubject` VALUES(49, ' Structure of Programming Language', ' CS106', '3', 'second', 'BS Computer Science', '3');
INSERT INTO `tblsubject` VALUES(50, 'Management Information System', ' CS107', '3', 'second', 'BS Computer Science', '3');
INSERT INTO `tblsubject` VALUES(51, 'Elective2', 'SLElec2', '5', 'first', 'BS Computer Science', '4');
INSERT INTO `tblsubject` VALUES(52, ' Database Applications', 'CS131', '4', 'first', 'BS Computer Science', '4');
INSERT INTO `tblsubject` VALUES(53, ' Dynamic Web Application', ' CS152', '5', 'first', 'BS Computer Science', '4');
INSERT INTO `tblsubject` VALUES(54, ' Systems Development', 'SPR03', '5', 'first', 'BS Computer Science', '4');
INSERT INTO `tblsubject` VALUES(55, 'Code of Ethics for the IT Professional', 'CS108', '3', 'second', 'BS Computer Science', '4');
INSERT INTO `tblsubject` VALUES(56, ' On-the-Training ', 'OJT', '9', 'second', 'BS Computer Science', '4');
INSERT INTO `tblsubject` VALUES(57, 'Electricity-Electronics Fundamentals', 'ComNet1', '3', 'first', 'BS Computer Network Administration', '1');
INSERT INTO `tblsubject` VALUES(58, 'Technical Sketching', 'DRW1', '2', 'first', 'BS Computer Network Administration', '1');
INSERT INTO `tblsubject` VALUES(59, 'nformation Technology Productivity Suite', 'ITPS', '3', 'first', 'BS Computer Network Administration', '1');
INSERT INTO `tblsubject` VALUES(60, 'Business Organization and Management', 'CNMgt1', '3', 'second', 'BS Computer Network Administration', '1');
INSERT INTO `tblsubject` VALUES(61, 'Digital Electronics', 'ComNet2', '3', 'second', 'BS Computer Network Administration', '1');
INSERT INTO `tblsubject` VALUES(62, 'AutoCAD', 'DRW2', '2', 'second', 'BS Computer Network Administration', '1');
INSERT INTO `tblsubject` VALUES(63, 'Program Logic Formulation', 'ApDev2', '3', 'second', 'BS Computer Network Administration', '1');
INSERT INTO `tblsubject` VALUES(64, 'Computer Architecture and PC Troubleshooting', 'ComNet3', '3', 'first', 'BS Computer Network Administration', '2');
INSERT INTO `tblsubject` VALUES(65, 'Computer Programming1', 'ApDev4', '3', 'first', 'BS Computer Network Administration', '2');
INSERT INTO `tblsubject` VALUES(66, 'E-Commerce w/ Web Design Architecture', 'ComNet4', '3', 'second', 'BS Computer Network Administration', '2');
INSERT INTO `tblsubject` VALUES(67, 'Human Resource Management', 'CNMgt2', '3', 'second', 'BS Computer Network Administration', '2');
INSERT INTO `tblsubject` VALUES(68, 'Elective', 'Elective1', '3', 'first', 'BS Computer Network Administration', '3');
INSERT INTO `tblsubject` VALUES(69, 'Organizational Behavior', 'CNMgt3', '3', 'first', 'BS Computer Network Administration', '3');
INSERT INTO `tblsubject` VALUES(70, 'Operating System', 'ComNet6', '3', 'first', 'BS Computer Network Administration', '3');
INSERT INTO `tblsubject` VALUES(71, 'Server Installation and Administration', 'ComNet7', '3', 'second', 'BS Computer Network Administration', '3');
INSERT INTO `tblsubject` VALUES(72, 'Business Finance', 'CNMgt5', '3', 'second', 'BS Computer Network Administration', '3');
INSERT INTO `tblsubject` VALUES(73, 'Network Analysis, Design and Implementation', 'ComNet8', '3', 'second', 'BS Computer Network Administration', '3');
INSERT INTO `tblsubject` VALUES(74, 'Switching and Routing', 'ComNet9', '3', 'first', 'BS Computer Network Administration', '4');
INSERT INTO `tblsubject` VALUES(75, 'Network Security', 'Comnet10', '3', 'first', 'BS Computer Network Administration', '4');
INSERT INTO `tblsubject` VALUES(76, 'Network Project Management', 'ComNet11', '3', 'first', 'BS Computer Network Administration', '4');
INSERT INTO `tblsubject` VALUES(77, 'Quantitative Techniques in Business', 'CNMgt6', '3', 'first', 'BS Computer Network Administration', '4');
INSERT INTO `tblsubject` VALUES(78, 'Web Administration and Management', 'ComNet12', '3', 'second', 'BS Computer Network Administration', '4');
INSERT INTO `tblsubject` VALUES(79, 'WAN Technologies', 'ComNet13', '3', 'second', 'BS Computer Network Administration', '4');
INSERT INTO `tblsubject` VALUES(80, 'On-the-Job Training ', 'OJT', '7', 'second', 'BS Computer Network Administration', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tblteacher`
--

CREATE TABLE `tblteacher` (
  `id_teacher` int(10) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `add_no` varchar(5) NOT NULL,
  `add_street` varchar(50) NOT NULL,
  `add_brgy` varchar(50) NOT NULL,
  `add_city` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `employee_no` varchar(10) NOT NULL,
  `emailadd` varchar(100) NOT NULL,
  `image` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tblteachercol` varchar(10) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'new',
  `aboutme` mediumtext NOT NULL,
  PRIMARY KEY (`id_teacher`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblteacher`
--

INSERT INTO `tblteacher` VALUES(1, 'Arcalas', 'Lilibeth', 'Ramos', '1970-02-01', '09', 'sakldalksd', 'asdas', 'Paranaque City', '0977654321', 'Male', 'E1123455', 'ianolinares@ymail.com', '1draqlv93p.png', '', NULL, 'new', '');
INSERT INTO `tblteacher` VALUES(2, 'Aaron', 'Nazianceno', 'Default', '1985-02-01', '09', 'Street', 'Brgy sample', 'Quezon City', '09123456791', 'Male', 'E1234567', 'ianolinares@ymail.com', '2atdo4a5sb.png', 'hyKd5kcLv15l3icLTy7uTH37KFTjz8OjqlEG96dhq3A=', NULL, 'old', 'Samer');
INSERT INTO `tblteacher` VALUES(3, 'Percival', 'Adao', 'Default', '0000-00-00', '', '', '', '', '', '', '', '', '', '', NULL, 'new', '');
INSERT INTO `tblteacher` VALUES(4, 'Asejo', 'Nelson', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', NULL, 'new', '');
INSERT INTO `tblteacher` VALUES(6, 'Gonzales', 'Majoy', 'Baco', '1994-10-31', '9', 'sdas', 'sgdjh', 'Makati City', '0912345677', 'Female', 'E1000000', 'ianolinares@ymail.com', '3if0cug3qb.png', 'Qp5t1TNPzc1kYxuYFAu0dxYBhurJVgrwVx7pHZUTNIE=', NULL, 'old', '');
