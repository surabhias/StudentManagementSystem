-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 06:27 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(2) NOT NULL,
  `username` varchar(14) NOT NULL,
  `password` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(2) NOT NULL,
  `branch_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`) VALUES
(1, 'CSE'),
(2, 'EEE');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(2) NOT NULL,
  `grade_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `grade_name`) VALUES
(1, 'GRADE 1'),
(2, 'GRADE 2'),
(3, 'GRADE 3');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(6) NOT NULL,
  `student_fname` varchar(14) NOT NULL,
  `student_lname` varchar(14) NOT NULL,
  `student_email` varchar(30) NOT NULL,
  `student_grade` int(2) NOT NULL,
  `student_branch` int(2) NOT NULL,
  `student_join_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_fname`, `student_lname`, `student_email`, `student_grade`, `student_branch`, `student_join_date`) VALUES
(3, 'Swathy', 'Krishn', 'swathy@gmail.com', 1, 2, '2020-09-19'),
(4, 'Suryan', 'S S', 'suryan@gmal.com', 2, 1, '2020-09-04'),
(5, 'Ram', 'Gopi', 'rgopi@gmail.com', 3, 2, '2020-09-11'),
(6, 'Test', 'Example', 'teste@gmail.com', 3, 1, '2020-09-16'),
(7, 'Suji', 'as', 'sds@gmail.com', 2, 2, '2020-09-10'),
(8, 'Sukesh', 'Sam', 'sams@gmail.com', 2, 1, '2020-09-17'),
(9, 'Suji', 'Anu', 'anu@gmal.com', 3, 2, '2020-09-24'),
(10, 'Surya', 'Lal', 'slal@gmail.com', 3, 2, '2020-09-02'),
(11, 'Asasd', 'Dssds', 'as@gmail.com', 1, 2, '2020-09-16'),
(12, 'Shgfhfg', 'Wfghfgh', 'dsd@gmail.com', 3, 1, '2020-09-04'),
(13, 'Ehytnjt', 'Chgjhg', 'dfd@gmail.com', 3, 2, '2020-09-30'),
(14, 'cdvdcd', 'vdvdvdvd', 'dfdfdsfdsfdfdsf@gmail.com', 1, 1, '2020-09-15'),
(15, 'scssdas', 'sdsad', 'asad@gmail.com', 0, 0, '2020-09-08'),
(16, 'dsdsad', 'fsafas', 'sdasd@gmail.com', 1, 1, '2020-09-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
