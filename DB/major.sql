-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2019 at 02:31 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: 'major'
--

-- --------------------------------------------------------

--
-- Table structure for table 'company_master'
--

DROP TABLE IF EXISTS company_master;
CREATE TABLE IF NOT EXISTS company_master (
  com_id int(3) NOT NULL AUTO_INCREMENT,
  com_name varchar(30) NOT NULL,
  criteria varchar(25) NOT NULL,
  date_of_visit varchar(25) NOT NULL,
  remark varchar(30) NOT NULL,
  PRIMARY KEY (com_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'company_master'
--


-- --------------------------------------------------------

--
-- Table structure for table 'eligible_student'
--

DROP TABLE IF EXISTS eligible_student;
CREATE TABLE IF NOT EXISTS eligible_student (
  eli_id int(3) NOT NULL AUTO_INCREMENT,
  std_id int(3) NOT NULL,
  com_id int(3) NOT NULL,
  attendance int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (eli_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'eligible_student'
--


-- --------------------------------------------------------

--
-- Table structure for table 'std_qual'
--

DROP TABLE IF EXISTS std_qual;
CREATE TABLE IF NOT EXISTS std_qual (
  qual_id int(3) NOT NULL AUTO_INCREMENT,
  std_id int(3) NOT NULL,
  degree text NOT NULL,
  board_univ text NOT NULL,
  per_grade varchar(10) NOT NULL,
  remark varchar(40) NOT NULL,
  yop varchar(15) NOT NULL,
  PRIMARY KEY (qual_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'std_qual'
--


-- --------------------------------------------------------

--
-- Table structure for table 'student_master'
--

DROP TABLE IF EXISTS student_master;
CREATE TABLE IF NOT EXISTS student_master (
  std_id int(3) NOT NULL AUTO_INCREMENT,
  std_name varchar(30) NOT NULL,
  stream varchar(20) NOT NULL,
  dob varchar(25) NOT NULL,
  email varchar(30) NOT NULL,
  mob int(11) NOT NULL,
  PRIMARY KEY (std_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'student_master'
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
