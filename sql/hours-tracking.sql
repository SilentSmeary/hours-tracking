-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2025 at 08:54 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hours-tracking`
--
CREATE DATABASE IF NOT EXISTS `hours-tracking` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `hours-tracking`;

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `audit_id` int NOT NULL,
  `user_type` text NOT NULL,
  `id` int NOT NULL,
  `action` text NOT NULL,
  `date_time` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`audit_id`, `user_type`, `id`, `action`, `date_time`) VALUES
(1, 'student', 0, 'Logged in successfully', 1736038737),
(2, 'student', 2, 'Logged in successfully', 1736039185),
(3, 'student', 2, 'Logged in successfully', 1736040045),
(4, 'student', 2, 'Logged in successfully', 1736040225),
(5, 'student', 2, 'Logged in successfully', 1736041322),
(6, 'student', 2, 'Logged in successfully', 1736041545),
(7, 'student', 2, 'Logged in successfully', 1736041586),
(8, 'student', 2, 'Logged in successfully', 1736041590),
(9, 'student', 2, 'Logged in successfully', 1736042542),
(10, 'student', 2, 'Logged in successfully', 1736042968),
(11, 'student', 2, 'Logged in successfully', 1736045370),
(12, 'student', 2, 'Logged in successfully', 1736075242),
(13, 'student', 2, 'Logged in successfully', 1736076662),
(14, 'student', 2, 'Logged in successfully', 1736077746),
(15, 'student', 2, 'Logged in successfully', 1736077754),
(16, 'student', 2, 'Logged in successfully', 1736077770),
(17, 'student', 2, 'Logged in successfully', 1736077896),
(18, 'student', 2, 'Logged in successfully', 1736077916),
(19, 'student', 2, 'Logged in successfully', 1736078013),
(20, 'student', 2, 'Logged in successfully', 1736078211),
(21, 'student', 2, 'Logged in successfully', 1736078239),
(22, 'student', 2, 'Logged in successfully', 1736078289),
(23, 'student', 2, 'Logged in successfully', 1736078626),
(24, 'student', 2, 'Logged in successfully', 1736085529),
(25, 'student', 2, 'Logged in successfully', 1736085616),
(26, 'student', 2, 'Logged in successfully', 1736087303),
(27, 'student', 2, 'Logged in successfully', 1736087394),
(28, 'student', 2, 'Logged in successfully', 1736087445),
(29, 'student', 2, 'Logged in successfully', 1736087454),
(30, 'student', 2, 'Logged in successfully', 1736087537),
(31, 'student', 2, 'Logged in successfully', 1736088858),
(32, 'student', 2, 'Logged in successfully', 1736090423),
(33, 'student', 2, 'Logged in successfully', 1736091515),
(34, 'student', 2, 'Logged in successfully', 1736091711),
(35, 'student', 3, 'Logged in successfully', 1736092416),
(36, 'student', 2, 'Logged in successfully', 1736092451),
(37, 'student', 2, 'Logged in successfully', 1736101572);

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `business_id` int NOT NULL,
  `business_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int NOT NULL,
  `course_name` text NOT NULL,
  `hours` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `hours`) VALUES
(1, 'T-Level Digital Production, Design and Development', 315),
(2, 'Accounting', 315),
(3, 'Craft and Design', 315);

-- --------------------------------------------------------

--
-- Table structure for table `hours`
--

CREATE TABLE `hours` (
  `hours_id` int NOT NULL,
  `student_id` int NOT NULL,
  `date` date NOT NULL,
  `log` text NOT NULL,
  `hours_completed` int NOT NULL,
  `verified` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hours`
--

INSERT INTO `hours` (`hours_id`, `student_id`, `date`, `log`, `hours_completed`, `verified`) VALUES
(7, 2, '2025-01-05', 'Added some stuff', 10, 'false'),
(8, 2, '2024-08-20', 'asdasd', 123, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `school_name` text NOT NULL,
  `course_id` int NOT NULL,
  `sign_up_date` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `email`, `password`, `school_name`, `course_id`, `sign_up_date`) VALUES
(2, 'James', 'Barowik', 'barowikajames@gmail.com', '$2y$10$9AFXn/18HMbimieoHjP9DeSHWHf2ZfAwKcc9pTxJ8ctznl3Q.oQbu', 'UTC Leeds', 1, 1736041270),
(3, 'James', 'Barowik', 'test@test.com', '$2y$10$PCl/SEw9okt8gMt7ny2VeOI4R3PekPHwq1tqlq8YuZM.3Mhef9PB6', 'UTC', 3, 1736092401);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`audit_id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`business_id`),
  ADD KEY `business_name` (`business_name`),
  ADD KEY `business_name_2` (`business_name`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `hours`
--
ALTER TABLE `hours`
  ADD PRIMARY KEY (`hours_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `audit_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `business_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hours`
--
ALTER TABLE `hours`
  MODIFY `hours_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
