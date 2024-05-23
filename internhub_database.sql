-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 02:22 PM
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
  `company_website` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_business_registration_certificate` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_overview` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_image` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_table`
--

INSERT INTO `company_table` (`company_id`, `company_name`, `company_location`, `company_website`, `company_business_registration_certificate`, `company_overview`, `company_image`) VALUES
(1, 'Boomedia Sdn Bhd', 'Kuala Lumpur, Malaysia', '', '5849671-2', '', ''),
(2, 'Sutera Harbour Resort', '1 Sutera Harbour Boulevard, Sutera harbour, 88100 Kota Kinabalu\r\n', 'https://www.suteraharbour.com/', '4857925-5', 'Overlooking the tranquil South China Sea, with views of tropical islands and the majestic Mount Kinabalu, is the 384-acre grand expansive Sutera Harbour Resort. Let us indulge you with our spectacular array of Resort facilities, from choice of luxurious 5-star hotels, award-winning 27-hole Graham Ma', ''),
(3, 'Karisma Kreatif Worldwide', 'Jalan Sultan Ahmad Shah, Georgetown, 10050 George Town, Penang, Malaysia', 'http://www.karismakreatif.com/', '142975625-SA', 'Building Brands that Change the World As a global powerhouse, we\'ll stop at nothing to transform your brands perception to ANYTHING but short of exceptional. As well as being a passionate visionary backed by 20 years of marketing experience, we aim to please. Our team caters to multiple industries, ', ''),
(4, 'K Production', 'No.20, Jalan PJS 5/28,PJCC, Pusat Dagangan Petaling, 46150 Petaling Jaya, Selangor', 'https://www.kproduction.com.my/', '7589425615-9', 'Kimi Lau founded K Production in Kuala Lumpur in 2017. Members of the K Production team comprise the top local video producers and marketers. Thus, we know what it takes to produce exquisite videos that increase the effectiveness of communication, brand awareness, and business productivity. We also ', ''),
(5, 'Pirana Graphics', 'Leisure Commerce Square Jalan PJS 8/9 Bandar Sunway Petaling Jaya Selangor Malaysia', 'https://piranagraphics.com/v2/', '4785496322-9', 'Established since 1996, Pirana Graphics Sdn Bhd is a 360 creative advertising agency based in Kuala Lumpur servicing clients across a broad spectrum of industries including F&B, FMCG, Property & Development, Direct Marketing, Health & Fitness, Automotive & Tech, Beauty, Manufacturing and more.\r\n\r\nWe', '');

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
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_location` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_birthday` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_education` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`student_id`, `user_id`, `student_name`, `student_location`, `student_email`, `student_birthday`, `student_education`, `student_timestamp`) VALUES
(0, 0, 'Nivin Pauly', 'Kuala Lumpur, Malaysia', 'nivin1016@gmail.com', '16 October 2001', '', '2024-05-21 07:49:07'),
(1, 1, 'Muhammad Ali Kemal', 'Bachelor of Arts in Music Production', 'muhdalikemal@gmail.com', 'final year', '', '2024-05-20 15:38:04'),
(2, 2, 'Nur Fatihah Suhana', 'Kuala Lumpur, Malaysia', 'nursuhana7859@gmail.com\r\n\r\n', '31 August 2000', 'Bachelor of Arts in Advertising and Marketing Communications,', '2024-05-23 12:22:07'),
(3, 3, 'Tan Jie Hong', 'Penang, Malaysia', 'tj22hong@gmail.com', '11 February 2001', 'Bachelors in Film Studies, Sunway University College', '2024-05-23 12:19:35'),
(5, 5, 'Abby Methews', 'Kuala Lumpur, Malaysia', 'abbymethews@gmail.com', '18 May', 'Bachelors in Media Technology', '2024-05-23 12:20:50');

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
  `user_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
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
(0, '', '555', 'nivinn_1016@gmail.com', 'student', '2024-05-23 06:52:27');

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
