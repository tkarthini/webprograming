-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 11:32 AM
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

--
-- Dumping data for table `application_table`
--

INSERT INTO `application_table` (`application_id`, `internship_id`, `user_id`, `application_date_applied`, `application_status`, `application_timestamp`) VALUES
(1, '1', '1', '10 Apr 2024', 'Rejected', '2024-05-20 15:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `company_table`
--

CREATE TABLE `company_table` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_location` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `companyOverview` text NOT NULL,
  `whoWeAre` text NOT NULL,
  `profilePicture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_table`
--

INSERT INTO `company_table` (`company_id`, `company_name`, `company_location`, `companyOverview`, `whoWeAre`, `profilePicture`) VALUES
(1, 'TEST', 'TEST TEST TEST', 'TEST TEST TEST TEST', 'TEST TEST TEST TEST', 'uploads/test.jpg'),
(2, 'Boomedia Sdn Bhd', 'Kuala Lumpur, Malaysia', 'n', 'n', 'uploads/boomedia.png');

-- --------------------------------------------------------

--
-- Table structure for table `contactus_table`
--

CREATE TABLE `contactus_table` (
  `contactus_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `contactus_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `contactus_subject` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `contactus_message` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus_table`
--

INSERT INTO `contactus_table` (`contactus_name`, `contactus_email`, `contactus_subject`, `contactus_message`) VALUES
('1', 'thurkarthini@gmail.com', '1', '1'),
('1', 'thurkarthini@gmail.com', '22', '22');

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

--
-- Dumping data for table `internship_table`
--

INSERT INTO `internship_table` (`company_id`, `internship_title`, `internship_category`, `internship_description`, `internship_location`, `internship_allowance`, `internshiop_timestamp`) VALUES
(1, 'Creative Illustrator', 'Graphic Design', 'As a Creative Illustrator intern in our company, you will immerse yourself in the world of graphics design, contributing your artistic flair to various projects. Your primary responsibility will be to conceptualize and create captivating visual content that resonates with our brand identity and effectively communicates our messages.', 'Bandar Sunway, Selangor', 'MYR 450 - 800', '2024-05-20 15:39:43'),
(2, 'Graphic Designer', 'Design and Architecture', 'Our resorts provide lodging facilities for travelers, often including a variety of room types from standard rooms to luxury suites.Resorts typically have multiple dining options, bars, and entertainment venues to enhance the guest experience.', 'Johor Baharu', 'RM MYR 800 - 1000', '2024-05-20 15:41:30'),
(3, 'Social Media Manager', 'Social Media Content Creator and Manager', 'As a Social Media Manager intern, you will dive into the dynamic world of digital marketing and social media management. You\'ll be responsible for assisting in the creation and execution of social media strategies across various platforms.', 'Puchong, Selangor', 'MYR 500 - 800', '2024-05-23 12:15:23'),
(4, 'UI / UX Designer', 'Web Development and Production', 'As a UI/UX Designer Intern, you will immerse yourself in the dynamic world of user interface and experience design within our innovative company.', 'Balik Pulau, Penang', 'MYR 1000', '2024-05-23 12:16:33'),
(5, 'Multimedia Creative Designer', 'Graphics Design', 'As a Multimedia Creative Designer intern, you\'ll dive into the dynamic world of graphics design within our company.', 'Petaling Jaya, Selangor', 'MYR 300 - RM 500', '2024-05-23 12:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_table`
--

CREATE TABLE `jobs_table` (
  `id` int(11) NOT NULL,
  `job_title` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `company` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `location` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `allowance` varchar(100) NOT NULL,
  `posted_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs_table`
--

INSERT INTO `jobs_table` (`id`, `job_title`, `company`, `location`, `description`, `allowance`, `posted_date`, `image`) VALUES
(9, 'Graphics Design', 'Boomedia Sdn Bhd', 'Kuala Lumpur, Malaysia', 'www', '', '2024-05-26 02:31:58', 'test.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `application_id` int(11) NOT NULL,
  `candidate_name` varchar(100) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `company_id` int(11) NOT NULL,
  `application_date` date NOT NULL,
  `status` enum('New','Approved','Rejected','Pending') NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`application_id`, `candidate_name`, `job_title`, `company_id`, `application_date`, `status`) VALUES
(2, 'Muhammad Ali Kemal', 'Graphics Design', 2, '2024-05-01', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `user_id` int(11) NOT NULL,
  `student_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_age` varchar(100) NOT NULL,
  `student_email` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_location` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_profilepicture` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_programme` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_institution` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_aboutme` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`user_id`, `student_name`, `student_age`, `student_email`, `student_location`, `student_profilepicture`, `student_programme`, `student_institution`, `student_aboutme`, `student_timestamp`) VALUES
(1, 'TEST', '0', 'test@gmail.com', 'TEST', 'test.jpg', 'TEST', 'TEST', 'wwwwwwwwwwwwwwwwwwwwwww', '2024-05-25 15:40:53'),
(5, 'Muhammad Ali Kemal', '22', 'muhdakemal@gmail.com', 'Kuala Lumpur, Malaysia', 'MuhammadAliKemal.png', 'Bachelors in Film Production', 'Tunku Abdul Rahman University of Management and Technology', 'a', '2024-05-26 07:09:07'),
(6, 'Nivin Pauly', '23', 'nivinn_1016@gmail.com', 'Kubang Pasu, Kelantan', 'nivinpauly.jpg', 'Bachelors in Media Technology', 'Tunku Abdul Rahman University of Management and Technology', 'n', '2024-05-26 07:11:12');

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
(0, 0, 'Sign In', '2024-05-02 09:34:13'),
(0, 0, 'Sign In', '2024-05-05 04:31:10'),
(0, 0, 'Sign In', '2024-05-20 09:07:43'),
(0, 0, 'Sign In', '2024-05-20 09:07:49'),
(0, 0, 'Sign In', '2024-05-20 09:08:41'),
(0, 0, 'Sign In', '2024-05-20 09:09:20'),
(0, 0, 'Sign In', '2024-05-20 09:14:27'),
(0, 0, 'Sign In', '2024-05-20 09:15:09'),
(0, 0, 'Sign In', '2024-05-20 09:15:34'),
(0, 0, 'Sign In', '2024-05-20 09:15:54'),
(0, 0, 'Sign In', '2024-05-20 09:16:42'),
(0, 0, 'Sign In', '2024-05-20 09:20:19'),
(0, 0, 'Sign In', '2024-05-20 09:20:31'),
(0, 0, 'Sign In', '2024-05-20 09:23:25'),
(0, 0, 'Sign In', '2024-05-22 05:31:02'),
(0, 0, 'Sign In', '2024-05-22 05:44:53'),
(0, 0, 'Sign In', '2024-05-22 05:45:05'),
(0, 0, 'Sign In', '2024-05-22 05:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_type` char(10) NOT NULL,
  `current_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_password`, `user_email`, `user_type`, `current_timestamp`) VALUES
(0, '', '123', 'thurkarthini@gmail.com', '0', '2024-05-02 12:36:16'),
(0, '', '123', 'thurkarthini@gmail.com', '0', '2024-05-02 12:37:25'),
(0, '', '123', 'thurkarthini@gmail.com', '0', '2024-05-02 14:26:23'),
(0, '', '123', 'thurkarthini@gmail.com', '0', '2024-05-02 14:30:33'),
(0, '', '123', 'thurkarthini@gmail.com', '0', '2024-05-02 14:41:49'),
(0, '', '111', 'thurkarthini@gmail.com', '0', '2024-05-02 14:45:53'),
(0, '', '111', 'thurkarthini@gmail.com', '0', '2024-05-02 14:46:08'),
(0, '', '444', 'thurkarthini@gmail.com', '0', '2024-05-02 15:01:00'),
(0, '', '555', 'thurkarthini@gmail.com', '0', '2024-05-02 15:01:14'),
(0, '', '888', 'thurkarthini@gmail.com', '0', '2024-05-02 15:08:13'),
(0, '', '222', 'thurkarthini@gmail.com', '0', '2024-05-02 15:10:44'),
(0, '', '888', 'thurkarthini@gmail.com', '0', '2024-05-02 15:37:15'),
(0, '', '111', 'thurkarthini@gmail.com', '0', '2024-05-05 10:35:13'),
(0, '', 'aaa', 'thurkarthini@gmail.com', '0', '2024-05-09 01:13:16'),
(0, '', 'sss', 'thurkarthini@gmail.com', '0', '2024-05-09 01:22:02'),
(0, '', 'aaa', 'thurkarthini@gmail.com', '0', '2024-05-09 01:22:33'),
(0, '', '777', 'thurkarthini@gmail.com', 'student', '2024-05-09 01:26:11'),
(0, '', 'ppp', 'thurkarthini@gmail.com', 'student', '2024-05-09 01:30:40'),
(0, '', 'rrr', 'thurkarthini@gmail.com', 'student', '2024-05-09 01:36:31'),
(0, '', 'iii', 'thurkarthini@gmail.com', 'company', '2024-05-09 01:43:38'),
(0, '', 'rrr', 'thurkarthini@gmail.com', 'student', '2024-05-20 14:36:17'),
(0, '', 'aaa', 'thurkarthini@gmail.com', 'student', '2024-05-20 14:38:20'),
(0, '', 'ttt', 'thurkarthini@gmail.com', 'student', '2024-05-20 14:57:13'),
(1, '', 'n123', 'nivinn_1016@gmail.com', 'student', '2024-05-23 06:45:24'),
(0, '', '555', 'nivinn_1016@gmail.com', 'student', '2024-05-23 06:52:27'),
(0, '', '111', 'thurkarthini@gmail.com', 'company', '2024-05-25 13:02:52'),
(0, '', '222', 'thurkarthini@gmail.com', 'company', '2024-05-25 13:03:49'),
(0, '', 'www', 'thurkarthini@gmail.com', 'student', '2024-05-25 15:19:43'),
(0, '', 'www', 'nivinn_1016@gmail.com', 'student', '2024-05-26 02:13:01'),
(0, '', 'qqq', 'nivinn_1016@gmail.com', 'student', '2024-05-26 02:15:54'),
(0, '', 'qqq', 'nivinn_1016@gmail.com', 'company', '2024-05-26 02:27:14'),
(0, '', 'aaa', 'nivinn_1016@gmail.com', 'company', '2024-05-26 02:31:01'),
(0, '', 'qqq', 'nivinn_1016@gmail.com', 'company', '2024-05-26 02:35:01');

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
-- Indexes for table `jobs_table`
--
ALTER TABLE `jobs_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_table`
--
ALTER TABLE `company_table`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs_table`
--
ALTER TABLE `jobs_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_table` (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
