-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 03:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internhub_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_permission` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application_table`
--

CREATE TABLE `application_table` (
  `application_id` int(11) NOT NULL,
  `internship_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `application_date_applied` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `application_status` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `application_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_table`
--

CREATE TABLE `company_table` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_location` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_website` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_business_registration_certificate` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_description` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_image` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `internship_table`
--

CREATE TABLE `internship_table` (
  `company_id` int(11) NOT NULL,
  `internship_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `internship_category` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `internship_description` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `internship_location` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `internship_allowance` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `internshiop_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_programme` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_year` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_application_status` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `event_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`log_id`, `user_id`, `event_type`, `event_timestamp`) VALUES
(0, 0, 'Sign In', '2024-05-02 09:33:53'),
(0, 0, 'Sign In', '2024-05-02 09:34:00'),
(0, 0, 'Sign In', '2024-05-02 09:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_type` int(11) NOT NULL,
  `current_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_password`, `user_email`, `user_type`, `current_timestamp`) VALUES
(0, '', '123', 'thurkarthini@gmail.com', 0, '2024-05-02 12:36:16'),
(0, '', '123', 'thurkarthini@gmail.com', 0, '2024-05-02 12:37:25'),
(0, '', '123', 'thurkarthini@gmail.com', 0, '2024-05-02 14:26:23'),
(0, '', '123', 'thurkarthini@gmail.com', 0, '2024-05-02 14:30:33'),
(0, '', '123', 'thurkarthini@gmail.com', 0, '2024-05-02 14:41:49'),
(0, '', '111', 'thurkarthini@gmail.com', 0, '2024-05-02 14:45:53'),
(0, '', '111', 'thurkarthini@gmail.com', 0, '2024-05-02 14:46:08'),
(0, '', '444', 'thurkarthini@gmail.com', 0, '2024-05-02 15:01:00'),
(0, '', '555', 'thurkarthini@gmail.com', 0, '2024-05-02 15:01:14'),
(0, '', '888', 'thurkarthini@gmail.com', 0, '2024-05-02 15:08:13'),
(0, '', '222', 'thurkarthini@gmail.com', 0, '2024-05-02 15:10:44'),
(0, '', '888', 'thurkarthini@gmail.com', 0, '2024-05-02 15:37:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `application_table`
--
ALTER TABLE `application_table`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `company_table`
--
ALTER TABLE `company_table`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `internship_table`
--
ALTER TABLE `internship_table`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
