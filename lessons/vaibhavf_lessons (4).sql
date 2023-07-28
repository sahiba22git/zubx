-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2022 at 09:10 PM
-- Server version: 5.7.37-cll-lve
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaibhavf_lessons`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `ct_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `serial_no` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1->active, 0-> deactivated(not a part of distrib.)',
  `created_at` datetime NOT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ct_id`, `usr_id`, `serial_no`, `status`, `created_at`, `updatedDtm`) VALUES
(1, 1, 1, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(2, 2, 2, 0, '2020-04-01 00:00:00', '2021-04-19 10:30:08'),
(3, 3, 3, 0, '2020-04-01 00:00:00', '2020-08-11 09:54:00'),
(4, 4, 4, 0, '2020-04-01 00:00:00', '2021-04-28 13:51:52'),
(5, 5, 5, 0, '2020-04-01 00:00:00', '2020-09-16 17:55:10'),
(6, 6, 6, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(7, 7, 7, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(8, 8, 8, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(9, 9, 9, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(10, 10, 10, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(11, 11, 11, 0, '2020-04-01 00:00:00', '2020-09-16 17:55:23'),
(12, 12, 12, 0, '2020-04-01 00:00:00', '2021-10-05 17:03:15'),
(13, 13, 13, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(14, 14, 14, 1, '2020-04-01 00:00:00', '2021-04-19 13:55:39'),
(15, 15, 15, 0, '2020-04-01 00:00:00', '2021-04-19 10:31:32'),
(16, 16, 16, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(17, 17, 17, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(18, 18, 18, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(19, 19, 19, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(20, 20, 20, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(21, 21, 21, 1, '2020-04-01 00:00:00', '2021-06-04 11:02:01'),
(22, 22, 22, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(23, 23, 23, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(24, 24, 24, 0, '2020-04-01 00:00:00', '2020-09-16 17:55:35'),
(25, 25, 25, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(26, 26, 26, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(27, 27, 27, 1, '2020-04-01 00:00:00', '2020-06-24 00:00:00'),
(28, 28, 28, 0, '2020-04-01 00:00:00', '2021-04-19 10:30:49'),
(29, 29, 29, 0, '2020-04-01 00:00:00', '2020-09-16 17:56:12'),
(30, 30, 30, 0, '2020-04-01 00:00:00', '2020-09-16 17:56:26'),
(31, 31, 31, 0, '2020-04-01 00:00:00', '2020-08-11 09:53:22'),
(32, 33, 32, 0, '2020-09-18 10:36:52', '2021-04-28 12:28:54'),
(33, 34, 33, 0, '2020-09-18 10:37:17', '2021-04-28 12:29:07'),
(34, 35, 34, 1, '2020-09-18 10:37:35', NULL),
(35, 36, 35, 1, '2020-09-18 10:37:51', NULL),
(36, 37, 36, 0, '2020-09-18 10:38:10', '2021-05-15 11:33:07'),
(37, 38, 37, 0, '2020-10-14 13:09:45', '2021-10-29 16:37:29'),
(38, 39, 38, 1, '2020-10-20 11:28:02', NULL),
(39, 40, 39, 1, '2020-11-25 13:32:32', NULL),
(40, 41, 40, 0, '2020-11-25 14:22:09', '2021-04-28 13:52:08'),
(41, 42, 41, 1, '2020-11-28 11:43:11', NULL),
(42, 43, 42, 1, '2020-11-30 14:45:10', NULL),
(43, 44, 43, 1, '2021-01-01 11:27:17', NULL),
(44, 45, 44, 0, '2021-01-26 09:11:35', '2021-11-06 13:06:52'),
(45, 46, 45, 1, '2021-01-26 09:11:54', NULL),
(46, 47, 46, 1, '2021-03-31 16:13:08', '2021-10-06 13:40:33'),
(47, 48, 47, 1, '2021-04-16 13:38:54', '2021-04-19 13:55:29'),
(48, 49, 48, 1, '2021-04-19 17:39:51', NULL),
(49, 50, 49, 1, '2021-05-27 13:14:35', NULL),
(50, 51, 50, 1, '2021-05-27 13:31:40', NULL),
(51, 52, 51, 1, '2021-05-29 14:17:14', NULL),
(52, 53, 52, 1, '2021-05-31 10:53:37', NULL),
(53, 54, 53, 1, '2021-06-07 10:10:31', NULL),
(54, 55, 54, 1, '2021-06-07 10:10:58', NULL),
(55, 56, 55, 1, '2021-06-07 10:11:16', NULL),
(56, 57, 56, 1, '2021-06-18 13:10:29', NULL),
(57, 58, 57, 1, '2021-06-18 13:11:00', NULL),
(58, 59, 58, 1, '2021-06-18 16:28:25', NULL),
(59, 60, 59, 1, '2021-06-21 12:24:56', NULL),
(60, 61, 60, 1, '2021-10-05 18:18:06', NULL),
(61, 62, 61, 1, '2021-10-07 13:45:49', NULL),
(62, 63, 62, 1, '2021-10-07 13:46:15', NULL),
(63, 64, 63, 1, '2021-10-07 16:06:50', NULL),
(64, 65, 64, 1, '2021-10-08 11:23:24', NULL),
(65, 66, 65, 0, '2021-10-16 10:57:19', '2021-11-29 12:35:10'),
(66, 67, 66, 1, '2021-10-25 14:21:44', NULL),
(67, 68, 67, 1, '2021-10-29 16:35:33', NULL),
(68, 69, 68, 1, '2021-11-06 13:10:04', NULL),
(69, 70, 69, 1, '2021-11-06 13:37:10', NULL),
(70, 71, 70, 1, '2021-12-11 10:43:39', NULL),
(71, 72, 71, 0, '2022-03-23 01:26:13', '2022-03-26 00:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `course_master`
--

CREATE TABLE `course_master` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `course_status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_master`
--

INSERT INTO `course_master` (`course_id`, `course_name`, `language_id`, `course_status`, `created_at`, `description`, `image`) VALUES
(1, 'English Lessons', 1, 'active', '2022-03-26 00:01:37', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '19-04-2022/19-04-2022SHCTB.png'),
(2, 'English Lesson 2', 1, 'active', '2022-03-26 00:07:11', NULL, NULL),
(5, 'English Lessons 3', 1, 'active', '2022-03-26 00:15:34', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '19-04-2022/19-04-2022BREDC.png'),
(6, 'English Lessons 11', 1, 'active', '2022-04-15 18:55:21', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '19-04-2022/19-04-2022EPT7W.png'),
(7, 'dsfsfsdf', 1, 'active', '2022-04-15 19:36:40', 'test', NULL),
(8, 'dfsdfsdf', 1, 'active', '2022-04-15 19:40:09', 'test', NULL),
(9, 'dfdsf dfsf sdf ads', 1, 'active', '2022-04-15 19:41:32', 'test', '15-04-2022/15-04-2022VEDN7.png'),
(10, 'Development', 1, 'active', '2022-04-15 19:42:46', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '19-04-2022/19-04-2022GU0KH.png'),
(12, 'French Lessons', 1, 'active', '2022-04-19 19:29:46', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '19-04-2022/19-04-2022C809Z.png'),
(13, 'Hindi Lessons', 1, 'active', '2022-04-19 19:29:50', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '19-04-2022/19-04-2022N3Q7C.png'),
(14, 'New French Lessons', 1, 'active', '2022-04-19 19:55:05', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '19-04-2022/19-04-2022HTIBN.png');

-- --------------------------------------------------------

--
-- Table structure for table `keyword_master`
--

CREATE TABLE `keyword_master` (
  `keyword_id` int(11) NOT NULL,
  `keyword_name` varchar(150) NOT NULL,
  `keyword_status` enum('active','deactive') NOT NULL,
  `part_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keyword_master`
--

INSERT INTO `keyword_master` (`keyword_id`, `keyword_name`, `keyword_status`, `part_id`, `created_at`) VALUES
(1, 'keyword 1', 'active', 3, '2022-04-04 23:17:59'),
(2, 'keyword 1', 'active', 4, '2022-04-19 20:09:55'),
(3, 'keyword 2', 'active', 5, '2022-04-19 20:10:09'),
(4, 'keyword 12', 'active', 5, '2022-04-19 20:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `language_master`
--

CREATE TABLE `language_master` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(50) NOT NULL,
  `language_status` enum('active','deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language_master`
--

INSERT INTO `language_master` (`language_id`, `language_name`, `language_status`) VALUES
(1, 'english', 'active'),
(2, 'hindi', 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `part_master`
--

CREATE TABLE `part_master` (
  `part_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `part_name` varchar(200) NOT NULL,
  `title` varchar(555) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `part_status` enum('active','deactive') DEFAULT 'active',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part_master`
--

INSERT INTO `part_master` (`part_id`, `course_id`, `part_name`, `title`, `description`, `image`, `part_status`, `created_at`) VALUES
(3, 0, '', '', '', '16-04-2022/', 'active', '2022-04-16 16:17:35'),
(4, 1, 'Day 1', 'Day 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '19-04-2022/19-04-2022XN0PW.png', 'active', '2022-04-16 16:22:26'),
(5, 1, 'Day 2', 'Day 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '19-04-2022/19-04-2022QGNZS.png', 'active', '2022-04-18 10:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `part_view_tbl`
--

CREATE TABLE `part_view_tbl` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `partid` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part_view_tbl`
--

INSERT INTO `part_view_tbl` (`id`, `userid`, `partid`, `courseId`, `date`) VALUES
(10, 85, 4, 1, '2022-04-19 12:27:49'),
(11, 76, 4, 1, '2022-04-19 20:10:38'),
(12, 76, 5, 1, '2022-04-19 20:11:02'),
(13, 75, 4, 1, '2022-04-19 20:12:20'),
(14, 75, 5, 1, '2022-04-19 20:12:39'),
(15, 85, 5, 1, '2022-04-20 15:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `sentence_master`
--

CREATE TABLE `sentence_master` (
  `sentence_id` int(11) NOT NULL,
  `sentence_name` varchar(150) NOT NULL,
  `sentence_status` enum('active','deactive') NOT NULL,
  `parent_sentence_id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sentence_master`
--

INSERT INTO `sentence_master` (`sentence_id`, `sentence_name`, `sentence_status`, `parent_sentence_id`, `part_id`, `created_at`) VALUES
(1, 'New Sentence', 'active', 0, 5, '2022-03-26 01:39:56'),
(2, 'New Sentence', 'active', 0, 4, '2022-04-19 20:09:14'),
(3, 'New Sentence 2', 'active', 0, 5, '2022-04-19 20:09:29'),
(4, 'New Sentence 1', 'active', 0, 4, '2022-04-19 20:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_last_login`
--

CREATE TABLE `tbl_last_login` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_last_login`
--

INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(1, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 81.0.4044.129', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'Windows 10', '2020-05-04 16:42:03'),
(2, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 81.0.4044.129', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'Windows 10', '2020-05-05 15:52:00'),
(3, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-06 16:31:03'),
(4, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '::1', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-06 23:14:58'),
(5, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '::1', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-07 14:27:34'),
(6, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '::1', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-08 13:43:38'),
(7, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '::1', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-09 20:27:40'),
(8, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '::1', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-10 09:37:24'),
(9, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '::1', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-10 12:13:21'),
(10, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '::1', 'Chrome 81.0.4044.122', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', 'Windows 7', '2020-05-10 21:37:38'),
(11, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '::1', 'Chrome 81.0.4044.122', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', 'Windows 7', '2020-05-10 23:10:06'),
(12, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '::1', 'Chrome 81.0.4044.122', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', 'Windows 7', '2020-05-10 23:11:06'),
(13, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '::1', 'Chrome 81.0.4044.122', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', 'Windows 7', '2020-05-10 23:12:12'),
(14, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '106.78.45.200', 'Firefox 76.0', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0', 'Windows 7', '2020-05-11 03:00:01'),
(15, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.240.218', 'Chrome 81.0.4044.129', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'Windows 10', '2020-05-11 04:16:50'),
(16, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '106.78.45.200', 'Firefox 75.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:75.0) Gecko/20100101 Firefox/75.0', 'Linux', '2020-05-11 05:13:58'),
(17, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '106.78.45.200', 'Firefox 76.0', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0', 'Windows 7', '2020-05-11 05:37:16'),
(18, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '106.78.72.64', 'Firefox 76.0', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0', 'Windows 7', '2020-05-11 09:18:26'),
(19, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '223.185.37.29', 'Firefox 75.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:75.0) Gecko/20100101 Firefox/75.0', 'Linux', '2020-05-13 05:11:27'),
(20, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.243.238', 'Chrome 81.0.4044.129', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'Windows 10', '2020-05-13 05:23:17'),
(21, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '110.225.197.109', 'Chrome 75.0.3770.143', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-A705GM) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/11.2 Chrome/75.0.3770.143 Mobile Safari/537.36', 'Android', '2020-05-13 06:26:43'),
(22, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '110.225.197.109', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-13 07:08:05'),
(23, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.243.238', 'Chrome 81.0.4044.129', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'Windows 10', '2020-05-13 10:34:30'),
(24, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.247.48', 'Chrome 81.0.4044.129', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'Windows 10', '2020-05-14 07:37:39'),
(25, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.210.58', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-15 03:18:14'),
(26, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '122.168.204.253', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-15 03:55:35'),
(27, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '122.168.204.253', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-15 07:32:08'),
(28, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '49.14.98.106', 'Firefox 76.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:76.0) Gecko/20100101 Firefox/76.0', 'Linux', '2020-05-17 13:41:52'),
(29, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.240.20', 'Chrome 81.0.4044.129', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'Windows 10', '2020-05-17 22:29:31'),
(30, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '49.14.96.120', 'Firefox 76.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:76.0) Gecko/20100101 Firefox/76.0', 'Linux', '2020-05-18 10:53:44'),
(31, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.249.94', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-18 21:00:26'),
(32, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.193.99', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-19 02:34:26'),
(33, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.244.17', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-19 06:09:39'),
(34, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.244.17', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-19 10:25:54'),
(35, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.23.7', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-19 20:22:09'),
(36, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.244.17', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-19 21:31:44'),
(37, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.202.121', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-20 22:37:15'),
(38, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.202.121', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-21 00:55:56'),
(39, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.249.242', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-21 10:06:14'),
(40, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '49.14.97.66', 'Firefox 76.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:76.0) Gecko/20100101 Firefox/76.0', 'Linux', '2020-05-21 12:00:04'),
(41, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.216.195', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-21 20:55:15'),
(42, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.216.195', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-21 23:35:23'),
(43, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.249.242', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-22 00:33:53'),
(44, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.243.71', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-22 04:11:33'),
(45, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.224.48', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-22 22:38:20'),
(46, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.244.223', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-23 00:40:53'),
(47, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '106.211.91.163', 'Firefox 76.0', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0', 'Windows 7', '2020-05-23 00:42:04'),
(48, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '203.134.196.118', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-23 00:57:04'),
(49, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.244.223', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-23 04:26:25'),
(50, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '203.134.196.118', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-23 04:45:52'),
(51, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.180.235', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-24 04:19:53'),
(52, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '110.225.199.92', 'Chrome 75.0.3770.143', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-A705GM) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/11.2 Chrome/75.0.3770.143 Mobile Safari/537.36', 'Android', '2020-05-24 04:52:14'),
(53, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '110.225.199.92', 'Chrome 75.0.3770.143', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-A705GM) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/11.2 Chrome/75.0.3770.143 Mobile Safari/537.36', 'Android', '2020-05-24 04:53:29'),
(54, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.180.235', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-24 21:56:37'),
(55, 53, '{\"role\":\"3\",\"roleText\":\"Client\",\"name\":\"Maneet Dewan\"}', '106.211.83.190', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Linux; Android 10; SM-A705GM) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36', 'Android', '2020-05-24 22:52:53'),
(56, 53, '{\"role\":\"3\",\"roleText\":\"Client\",\"name\":\"Maneet Dewan\"}', '124.253.225.233', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-24 23:10:00'),
(57, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.225.233', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-25 00:26:17'),
(58, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.225.233', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-25 00:26:18'),
(59, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.248.219', 'Firefox 76.0', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0', 'Windows 7', '2020-05-25 07:11:59'),
(60, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.225.233', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-25 19:51:06'),
(61, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.252.73', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-25 23:13:33'),
(62, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.130.52', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-26 01:28:00'),
(63, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.214.65', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Windows 10', '2020-05-27 04:10:29'),
(64, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.240.186', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-27 04:58:27'),
(65, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.247.39', 'Firefox 76.0', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0', 'Windows 7', '2020-05-27 06:10:06'),
(66, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.240.186', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-27 07:22:11'),
(67, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '110.225.199.92', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Linux; Android 10; SM-A705GM) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36', 'Android', '2020-05-27 17:29:56'),
(68, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '110.225.199.92', 'Chrome 81.0.4044.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Windows 10', '2020-05-27 20:59:28'),
(69, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.23.20', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Windows 10', '2020-05-28 20:32:27'),
(70, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.212.116', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Windows 10', '2020-05-31 21:04:34'),
(71, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.242.100', 'Firefox 76.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:76.0) Gecko/20100101 Firefox/76.0', 'Linux', '2020-06-05 01:25:22'),
(72, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '122.173.42.96', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Windows 10', '2020-06-06 07:06:04'),
(73, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '117.222.245.178', 'Firefox 77.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:77.0) Gecko/20100101 Firefox/77.0', 'Linux', '2020-06-07 03:17:15'),
(74, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.130.228', 'Chrome 83.0.4103.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Windows 10', '2020-06-23 23:35:24'),
(75, 1, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Administrator\"}', '124.253.130.228', 'Chrome 83.0.4103.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Windows 10', '2020-06-24 03:36:58'),
(76, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Admn.\"}', '117.222.246.255', 'Firefox 77.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:77.0) Gecko/20100101 Firefox/77.0', 'Linux', '2020-06-24 06:48:27'),
(77, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Admn.\"}', '124.253.152.213', 'Chrome 83.0.4103.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Windows 10', '2020-06-24 07:10:13'),
(78, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Admn.\"}', '103.41.27.175', 'Chrome 83.0.4103.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Windows 10', '2020-06-24 08:54:32'),
(79, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.152.213', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '2020-06-24 21:10:15'),
(80, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.246.255', 'Firefox 77.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:77.0) Gecko/20100101 Firefox/77.0', 'Linux', '2020-06-24 21:20:19'),
(81, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.250.248', 'Firefox 77.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:77.0) Gecko/20100101 Firefox/77.0', 'Linux', '2020-06-25 05:07:51'),
(82, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.152.179', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '2020-06-25 05:26:08'),
(83, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.251.23', 'Firefox 77.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:77.0) Gecko/20100101 Firefox/77.0', 'Linux', '2020-06-27 04:05:30'),
(84, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.207.247', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '2020-06-27 05:04:17'),
(85, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.27.7', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '2020-06-27 09:15:25'),
(86, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.27.7', 'Chrome 83.0.4103.106', 'Mozilla/5.0 (Linux; Android 10; SM-A705GM) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Mobile Safari/537.36', 'Android', '2020-06-27 19:50:29'),
(87, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.27.7', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '2020-06-27 19:59:22'),
(88, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.27.7', 'Chrome 83.0.4103.106', 'Mozilla/5.0 (Linux; Android 10; SM-A705GM) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Mobile Safari/537.36', 'Android', '2020-06-27 22:31:08'),
(89, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.164.239', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '2020-06-29 21:50:22'),
(90, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.27.127', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '2020-06-29 22:00:38'),
(91, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '106.204.65.201', 'Chrome 83.0.4103.106', 'Mozilla/5.0 (Linux; Android 10; SM-A705GM) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Mobile Safari/537.36', 'Android', '2020-07-02 09:23:41'),
(92, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.27.127', 'Chrome 83.0.4103.106', 'Mozilla/5.0 (Linux; Android 10; SM-A705GM) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Mobile Safari/537.36', 'Android', '2020-07-02 09:23:55'),
(93, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.27.127', 'Chrome 83.0.4103.106', 'Mozilla/5.0 (Linux; Android 10; SM-A705GM) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Mobile Safari/537.36', 'Android', '2020-07-02 20:02:43'),
(94, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.255.176.88', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '2020-07-02 21:51:32'),
(95, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.255.176.88', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '2020-07-02 23:57:28'),
(96, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.65.76', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '2020-07-06 20:34:22'),
(97, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.182.148', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '2020-07-09 21:08:40'),
(98, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.168.206.235', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '2020-07-13 22:41:32'),
(99, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.112.21', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '2020-07-14 21:20:40'),
(100, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.112.21', 'Chrome 62.0.3202.9', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.9 Safari/537.36', 'Windows 8', '2020-07-14 22:03:02'),
(101, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.112.21', 'Chrome 62.0.3202.9', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.9 Safari/537.36', 'Windows 8', '2020-07-14 22:05:31'),
(102, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.112.21', 'Chrome 62.0.3202.9', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.9 Safari/537.36', 'Windows 8', '2020-07-14 22:08:35'),
(103, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.112.21', 'Chrome 62.0.3202.9', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.9 Safari/537.36', 'Windows 8', '2020-07-14 22:15:58'),
(104, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.112.21', 'Chrome 62.0.3202.9', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.9 Safari/537.36', 'Windows 8', '2020-07-14 22:16:05'),
(105, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.112.21', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '2020-07-15 00:49:24'),
(106, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.112.21', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '2020-07-15 05:03:24'),
(107, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.112.21', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Windows 10', '2020-07-15 05:03:24'),
(108, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.252.28', 'Firefox 78.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:78.0) Gecko/20100101 Firefox/78.0', 'Linux', '2020-07-16 08:55:58'),
(109, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.225.201.9', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 'Windows 10', '2020-07-16 21:18:58'),
(110, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.249.41', 'Firefox 78.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:78.0) Gecko/20100101 Firefox/78.0', 'Linux', '2020-07-18 03:48:15'),
(111, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.96.239.159', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 'Windows 10', '2020-07-18 05:26:23'),
(112, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.96.239.159', 'Firefox 78.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:78.0) Gecko/20100101 Firefox/78.0', 'Windows 10', '2020-07-18 05:32:00'),
(113, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.96.239.159', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Mobile Safari/537.36', 'Android', '2020-07-18 05:35:02'),
(114, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.249.41', 'Chrome 83.0.4103.106', 'Mozilla/5.0 (Linux; Android 10; SM-A515F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Mobile Safari/537.36', 'Android', '2020-07-18 05:35:21'),
(115, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.255.185.129', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 'Windows 10', '2020-07-18 06:49:15'),
(116, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.249.41', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (Linux; Android 10; SM-A515F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Mobile Safari/537.36', 'Android', '2020-07-18 10:39:24'),
(117, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.11.127', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 'Windows 10', '2020-07-19 21:21:52'),
(118, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.245.32', 'Firefox 78.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:78.0) Gecko/20100101 Firefox/78.0', 'Linux', '2020-07-22 08:43:04'),
(119, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.245.32', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (Linux; Android 10; SM-A515F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Mobile Safari/537.36', 'Android', '2020-07-22 08:44:12'),
(120, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.187.166', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 'Windows 10', '2020-07-22 09:15:01'),
(121, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.245.32', 'Firefox 78.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:78.0) Gecko/20100101 Firefox/78.0', 'Linux', '2020-07-22 11:12:24'),
(122, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.187.166', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 'Linux', '2020-07-22 18:30:28'),
(123, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.139.143', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 'Windows 10', '2020-07-22 21:18:25'),
(124, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.139.143', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 'Windows 10', '2020-07-22 22:30:50'),
(125, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.253.37', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (Linux; Android 10; SM-A515F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Mobile Safari/537.36', 'Android', '2020-07-23 00:33:09'),
(126, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.253.37', 'Firefox 78.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:78.0) Gecko/20100101 Firefox/78.0', 'Linux', '2020-07-23 02:47:10'),
(127, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.253.37', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (Linux; Android 10; SM-A515F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Mobile Safari/537.36', 'Android', '2020-07-23 02:57:50'),
(128, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.246.46', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (Linux; Android 10; SM-A515F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Mobile Safari/537.36', 'Android', '2020-07-25 04:04:36'),
(129, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.246.46', 'Firefox 78.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:78.0) Gecko/20100101 Firefox/78.0', 'Linux', '2020-07-25 05:31:16'),
(130, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.188.32', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 'Windows 10', '2020-07-25 05:59:29'),
(131, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.246.46', 'Firefox 78.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:78.0) Gecko/20100101 Firefox/78.0', 'Linux', '2020-07-25 10:14:45'),
(132, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.188.32', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 'Windows 10', '2020-07-26 04:03:52'),
(133, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.177.65', 'Chrome 84.0.4147.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 'Windows 10', '2020-07-27 21:26:26'),
(134, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.1.83', 'Chrome 84.0.4147.105', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'Windows 10', '2020-07-31 21:10:43'),
(135, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.209.27', 'Chrome 84.0.4147.105', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'Windows 10', '2020-08-05 21:23:21'),
(136, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.191.2', 'Chrome 84.0.4147.105', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'Windows 10', '2020-08-10 21:20:59'),
(137, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.181.234', 'Chrome 84.0.4147.125', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36', 'Windows 10', '2020-08-14 20:36:40'),
(138, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.64.209', 'Chrome 84.0.4147.135', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'Windows 10', '2020-08-20 22:02:52'),
(139, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.241.191', 'Firefox 79.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:79.0) Gecko/20100101 Firefox/79.0', 'Linux', '2020-08-20 22:09:53'),
(140, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.20.114', 'Chrome 84.0.4147.135', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'Windows 10', '2020-08-22 01:13:04'),
(141, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.168.200.12', 'Chrome 84.0.4147.135', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36', 'Windows 10', '2020-08-26 00:35:48'),
(142, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.210.165', 'Chrome 85.0.4183.83', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 'Windows 10', '2020-08-30 22:27:33'),
(143, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.109.99', 'Chrome 85.0.4183.83', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 'Windows 10', '2020-09-04 21:42:57'),
(144, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.58.181', 'Chrome 85.0.4183.83', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 'Windows 10', '2020-09-08 21:31:29'),
(145, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.58.181', 'Chrome 85.0.4183.102', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'Windows 10', '2020-09-11 23:22:33'),
(146, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.96.236.55', 'Chrome 85.0.4183.102', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'Windows 10', '2020-09-14 04:05:40'),
(147, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.201.224', 'Chrome 85.0.4183.102', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'Windows 10', '2020-09-16 05:24:13'),
(148, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.45.104', 'Chrome 85.0.4183.102', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'Windows 10', '2020-09-17 21:54:35'),
(149, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.45.104', 'Chrome 85.0.4183.102', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'Windows 10', '2020-09-20 22:40:10'),
(150, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '49.14.109.94', 'Chrome 85.0.4183.121', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'Windows 10', '2020-10-02 22:11:48'),
(151, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.242.242', 'Firefox 81.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:81.0) Gecko/20100101 Firefox/81.0', 'Linux', '2020-10-02 22:31:37'),
(152, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.56.151.29', 'Chrome 86.0.4240.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36', 'Windows 10', '2020-10-09 22:28:21'),
(153, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.56.151.29', 'Chrome 86.0.4240.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36', 'Windows 10', '2020-10-14 00:01:08'),
(154, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.241.169', 'Firefox 81.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:81.0) Gecko/20100101 Firefox/81.0', 'Linux', '2020-10-14 00:59:42'),
(155, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.222.241.169', 'Firefox 81.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:81.0) Gecko/20100101 Firefox/81.0', 'Linux', '2020-10-15 03:58:27'),
(156, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.231.47', 'Chrome 86.0.4240.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36', 'Windows 10', '2020-10-19 22:57:31'),
(157, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.64.16', 'Chrome 86.0.4240.111', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'Windows 10', '2020-10-27 01:54:13'),
(158, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.64.16', 'Chrome 86.0.4240.111', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'Windows 10', '2020-10-27 22:29:49'),
(159, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.64.16', 'Chrome 86.0.4240.111', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'Windows 10', '2020-10-30 00:38:32'),
(160, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.185.141.156', 'Chrome 86.0.4240.111', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'Windows 10', '2020-11-01 22:40:03'),
(161, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.20.39', 'Chrome 86.0.4240.111', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'Windows 10', '2020-11-02 03:00:06'),
(162, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.230.223', 'Chrome 86.0.4240.183', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', 'Windows 10', '2020-11-04 02:08:25'),
(163, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '49.14.101.89', 'Chrome 86.0.4240.185', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.185 Mobile Safari/537.36', 'Android', '2020-11-04 19:56:43'),
(164, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.230.223', 'Chrome 86.0.4240.183', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', 'Windows 10', '2020-11-06 22:48:42'),
(165, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.226.248.36', 'Chrome 86.0.4240.183', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', 'Windows 10', '2020-11-11 00:06:12'),
(166, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.56.152.20', 'Chrome 86.0.4240.198', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'Windows 10', '2020-11-16 00:34:27'),
(167, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.225.232.80', 'Chrome 86.0.4240.198', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'Windows 10', '2020-11-17 22:22:13'),
(168, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '106.76.77.174', 'Chrome 87.0.4280.66', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Mobile Safari/537.36', 'Android', '2020-11-22 01:15:04'),
(169, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.199.227', 'Chrome 87.0.4280.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'Windows 10', '2020-11-25 00:38:31'),
(170, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.119.233', 'Chrome 87.0.4280.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'Windows 10', '2020-11-27 23:10:09'),
(171, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.74.57', 'Chrome 87.0.4280.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'Windows 10', '2020-11-30 02:14:42'),
(172, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.62.252', 'Chrome 87.0.4280.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'Windows 10', '2020-12-02 02:21:10'),
(173, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.207.126', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2020-12-05 00:42:03'),
(174, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '106.78.72.32', 'Chrome 87.0.4280.66', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Mobile Safari/537.36', 'Android', '2020-12-05 01:28:22'),
(175, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.255.57', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2020-12-07 01:10:05'),
(176, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.77.40', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2020-12-09 00:16:05'),
(177, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.225.246.31', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2020-12-11 01:35:01'),
(178, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.206.85', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2020-12-12 00:24:12'),
(179, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.191.231', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2020-12-12 03:25:01'),
(180, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.96.239.91', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2020-12-15 02:22:24'),
(181, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.226.254.207', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2020-12-18 02:28:12'),
(182, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.139.25', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2020-12-22 01:09:23'),
(183, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.139.25', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2020-12-24 00:31:53'),
(184, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.136', 'Firefox 84.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 'Linux', '2020-12-28 21:58:11'),
(185, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.102.21', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2020-12-28 21:59:23');
INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(186, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.56.150.75', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2020-12-30 00:56:27'),
(187, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.56.150.75', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2020-12-31 22:44:26'),
(188, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '106.78.46.135', 'Chrome 87.0.4280.101', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.101 Safari/537.36', 'Linux', '2021-01-01 02:55:22'),
(189, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.56.150.75', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2021-01-01 03:50:50'),
(190, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.113.247', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2021-01-04 21:37:28'),
(191, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.225.249.88', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2021-01-10 23:39:56'),
(192, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.225.249.88', 'Chrome 87.0.4280.88', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'Windows 10', '2021-01-15 02:57:17'),
(193, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.251.221', 'Chrome 87.0.4280.141', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'Windows 10', '2021-01-20 00:07:40'),
(194, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.251.221', 'Chrome 87.0.4280.141', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'Windows 10', '2021-01-23 03:10:20'),
(195, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.67.241', 'Chrome 87.0.4280.141', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'Windows 10', '2021-01-25 05:21:47'),
(196, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.255.186.66', 'Chrome 87.0.4280.141', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'Windows 10', '2021-01-25 19:55:37'),
(197, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.225.242.165', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-01-31 23:18:44'),
(198, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.225.242.165', 'Chrome 88.0.4324.104', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', 'Windows 10', '2021-02-02 00:15:59'),
(199, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.185.4', 'Chrome 88.0.4324.146', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 'Windows 10', '2021-02-06 00:28:16'),
(200, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.249.5', 'Chrome 88.0.4324.150', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'Windows 10', '2021-02-08 23:15:35'),
(201, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '49.156.111.136', 'Chrome 88.0.4324.150', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'Windows 10', '2021-02-12 01:22:35'),
(202, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.96.240.0', 'Chrome 88.0.4324.150', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'Windows 10', '2021-02-15 01:08:47'),
(203, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.96.240.0', 'Chrome 88.0.4324.150', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'Windows 10', '2021-02-17 02:33:59'),
(204, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '49.156.102.150', 'Chrome 88.0.4324.182', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'Windows 10', '2021-02-20 19:11:51'),
(205, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.226.60.254', 'Chrome 88.0.4324.182', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'Windows 10', '2021-02-23 01:36:08'),
(206, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.96.240.0', 'Chrome 88.0.4324.190', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 'Windows 10', '2021-02-26 01:33:18'),
(207, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.96.240.0', 'Chrome 88.0.4324.190', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 'Windows 10', '2021-03-01 00:31:46'),
(208, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.216.13', 'Chrome 88.0.4324.190', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 'Windows 10', '2021-03-03 00:56:34'),
(209, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '106.78.61.168', 'Chrome 88.0.4324.181', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.181 Safari/537.36', 'Linux', '2021-03-06 05:14:53'),
(210, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.23.107', 'Chrome 89.0.4389.82', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 'Windows 10', '2021-03-09 03:17:51'),
(211, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.81.196', 'Chrome 89.0.4389.82', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 'Windows 10', '2021-03-09 21:40:23'),
(212, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.237.208', 'Chrome 89.0.4389.82', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 'Windows 10', '2021-03-10 22:38:36'),
(213, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.225.207.27', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-15 00:28:11'),
(214, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.62', 'Chrome 81.0.4044.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36', 'Linux', '2021-03-15 00:28:58'),
(215, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.62', 'Chrome 81.0.4044.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36', 'Linux', '2021-03-15 00:30:53'),
(216, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.62', 'Chrome 81.0.4044.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36', 'Linux', '2021-03-15 00:31:07'),
(217, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.62', 'Chrome 81.0.4044.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36', 'Linux', '2021-03-15 00:31:29'),
(218, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.62', 'Chrome 81.0.4044.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36', 'Linux', '2021-03-15 00:35:00'),
(219, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.62', 'Chrome 81.0.4044.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36', 'Linux', '2021-03-15 00:42:00'),
(220, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.62', 'Chrome 81.0.4044.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36', 'Linux', '2021-03-15 00:44:02'),
(221, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.62', 'Chrome 81.0.4044.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36', 'Linux', '2021-03-15 00:49:18'),
(222, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.62', 'Firefox 86.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:86.0) Gecko/20100101 Firefox/86.0', 'Linux', '2021-03-15 01:11:52'),
(223, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.62', 'Chrome 81.0.4044.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36', 'Linux', '2021-03-15 01:26:35'),
(224, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.62', 'Firefox 86.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:86.0) Gecko/20100101 Firefox/86.0', 'Linux', '2021-03-15 01:33:34'),
(225, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.62', 'Firefox 86.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:86.0) Gecko/20100101 Firefox/86.0', 'Linux', '2021-03-15 01:39:49'),
(226, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.62', 'Firefox 86.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:86.0) Gecko/20100101 Firefox/86.0', 'Linux', '2021-03-15 01:40:54'),
(227, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.225.207.27', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-15 01:42:50'),
(228, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.225.207.27', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-15 02:45:09'),
(229, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.62', 'Firefox 86.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:86.0) Gecko/20100101 Firefox/86.0', 'Linux', '2021-03-15 02:47:28'),
(230, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.225.207.27', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-15 07:03:27'),
(231, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.66.49', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-16 06:50:14'),
(232, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.181.29', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-22 04:26:21'),
(233, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.225.200.115', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-23 03:33:24'),
(234, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.226.255.144', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-25 04:52:05'),
(235, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.71.20', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-27 05:39:51'),
(236, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.148.18', 'Chrome 89.0.4389.90', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', '2021-03-31 05:40:40'),
(237, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.34.117', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-03 04:45:40'),
(238, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.236.221', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-07 03:00:37'),
(239, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.53.46', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-09 00:48:07'),
(240, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.53.46', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-10 06:09:56'),
(241, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.53.46', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-14 02:07:56'),
(242, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.53.46', 'Chrome 89.0.4389.114', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'Windows 10', '2021-04-16 03:06:37'),
(243, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.252.138', 'Chrome 89.0.4389.128', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Windows 10', '2021-04-18 23:58:53'),
(244, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.252.138', 'Chrome 89.0.4389.128', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Windows 10', '2021-04-19 02:24:09'),
(245, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.252.138', 'Chrome 89.0.4389.128', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Windows 10', '2021-04-19 05:57:13'),
(246, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.252.138', 'Chrome 89.0.4389.128', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Windows 10', '2021-04-20 23:27:23'),
(247, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.68.46', 'Chrome 89.0.4389.128', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36', 'Windows 10', '2021-04-22 04:48:37'),
(248, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.68.46', 'Chrome 90.0.4430.85', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36', 'Windows 10', '2021-04-24 04:40:57'),
(249, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.225.197.110', 'Chrome 90.0.4430.85', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36', 'Windows 10', '2021-04-26 05:11:39'),
(250, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.179.3', 'Chrome 90.0.4430.85', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36', 'Windows 10', '2021-04-28 01:58:42'),
(251, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.179.3', 'Chrome 90.0.4430.85', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36', 'Windows 10', '2021-04-29 00:33:19'),
(252, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.179.3', 'Chrome 90.0.4430.85', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36', 'Windows 10', '2021-04-30 03:34:50'),
(253, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.255.181.53', 'Chrome 90.0.4430.85', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36', 'Windows 10', '2021-05-01 02:50:53'),
(254, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.253.1', 'Chrome 90.0.4430.93', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36', 'Windows 10', '2021-05-04 05:28:01'),
(255, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.225.224.117', 'Chrome 90.0.4430.93', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36', 'Windows 10', '2021-05-06 01:56:18'),
(256, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.54.248', 'Chrome 90.0.4430.93', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36', 'Windows 10', '2021-05-08 02:26:28'),
(257, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '49.156.90.125', 'Chrome 90.0.4430.93', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36', 'Windows 10', '2021-05-11 02:24:28'),
(258, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.255.189.62', 'Chrome 90.0.4430.93', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36', 'Windows 10', '2021-05-13 01:52:01'),
(259, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.98.133', 'Chrome 90.0.4430.212', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'Windows 10', '2021-05-15 00:52:20'),
(260, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.255.185.143', 'Chrome 90.0.4430.212', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'Windows 10', '2021-05-17 02:22:09'),
(261, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.197.86', 'Chrome 90.0.4430.212', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'Windows 10', '2021-05-19 00:53:27'),
(262, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.251.231', 'Chrome 90.0.4430.212', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'Windows 10', '2021-05-19 04:55:40'),
(263, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.185.59', 'Chrome 90.0.4430.212', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'Windows 10', '2021-05-20 02:06:22'),
(264, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.91.60', 'Chrome 90.0.4430.212', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'Windows 10', '2021-05-22 02:58:29'),
(265, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.91.60', 'Firefox 72.0', 'Mozilla/5.0 (Windows NT 10.0; rv:72.0) Gecko/20100101 Firefox/72.0', 'Windows 10', '2021-05-22 03:34:47'),
(266, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.107.182', 'Firefox 88.0', 'Mozilla/5.0 (Windows NT 10.0; rv:88.0) Gecko/20100101 Firefox/88.0', 'Windows 10', '2021-05-24 04:43:46'),
(267, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.96.238.100', 'Firefox 88.0', 'Mozilla/5.0 (Windows NT 10.0; rv:88.0) Gecko/20100101 Firefox/88.0', 'Windows 10', '2021-05-27 02:34:43'),
(268, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.85.73', 'Firefox 88.0', 'Mozilla/5.0 (Windows NT 10.0; rv:88.0) Gecko/20100101 Firefox/88.0', 'Windows 10', '2021-05-29 03:43:18'),
(269, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.56.149.135', 'Firefox 88.0', 'Mozilla/5.0 (Windows NT 10.0; rv:88.0) Gecko/20100101 Firefox/88.0', 'Windows 10', '2021-05-31 00:23:07'),
(270, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.253.239', 'Firefox 88.0', 'Mozilla/5.0 (Windows NT 10.0; rv:88.0) Gecko/20100101 Firefox/88.0', 'Windows 10', '2021-06-04 00:31:31'),
(271, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.253.239', 'Firefox 88.0', 'Mozilla/5.0 (Windows NT 10.0; rv:88.0) Gecko/20100101 Firefox/88.0', 'Windows 10', '2021-06-04 03:07:28'),
(272, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '106.202.140.134', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-06-06 23:39:54'),
(273, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.55', 'Firefox 88.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:88.0) Gecko/20100101 Firefox/88.0', 'Linux', '2021-06-07 00:35:39'),
(274, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.41.25.55', 'Chrome 81.0.4044.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36', 'Linux', '2021-06-07 00:36:03'),
(275, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '106.202.140.134', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-06-07 02:35:28'),
(276, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.180.69', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-06-11 02:00:24'),
(277, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '171.61.194.42', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-06-12 06:53:53'),
(278, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.46.154', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-06-14 03:34:11'),
(279, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.239.240', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-06-15 01:05:44'),
(280, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.225.193.124', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-06-16 01:20:41'),
(281, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.37.158', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-06-18 02:34:04'),
(282, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.37.158', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-06-18 05:55:59'),
(283, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.41.174', 'Chrome 91.0.4472.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'Windows 10', '2021-06-21 01:23:30'),
(284, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.41.174', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-06-21 01:42:16'),
(285, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.212.122', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-06-23 01:25:32'),
(286, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '106.213.2.160', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-06-25 02:06:18'),
(287, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.235.171.41', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-06-28 01:53:12'),
(288, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.255.181.220', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-06-30 02:16:59'),
(289, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.90.73', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-07-02 00:41:06'),
(290, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.236.151.215', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-07-05 01:27:04'),
(291, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.170.166', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-07-07 01:26:34'),
(292, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.236.154.42', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-07-08 02:08:38'),
(293, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.27.35', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-07-10 02:05:12'),
(294, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.236.129.20', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-07-12 02:25:49'),
(295, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '106.213.7.61', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-07-14 23:08:31'),
(296, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.31.242', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-07-17 01:24:23'),
(297, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.181.104.54', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-07-21 02:25:18'),
(298, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.28.88', 'Firefox 89.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'Windows 10', '2021-07-24 00:03:52'),
(299, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '110.226.49.245', 'Firefox 90.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', 'Windows 10', '2021-07-28 23:17:23'),
(300, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.29.224', 'Firefox 90.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', 'Windows 10', '2021-08-02 01:02:11'),
(301, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.236.132.86', 'Firefox 90.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', 'Windows 10', '2021-08-07 01:39:31'),
(302, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.31.159', 'Firefox 90.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', 'Windows 10', '2021-08-11 01:02:39'),
(303, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.24.245', 'Firefox 91.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', 'Windows 10', '2021-08-13 00:27:59'),
(304, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '106.214.212.238', 'Firefox 91.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', 'Windows 10', '2021-08-17 01:01:33'),
(305, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.28.83', 'Firefox 91.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', 'Windows 10', '2021-08-20 02:14:00'),
(306, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.31.66', 'Firefox 91.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', 'Windows 10', '2021-08-24 00:26:05'),
(307, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.26.58', 'Firefox 91.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', 'Windows 10', '2021-08-27 01:28:06'),
(308, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.28.67', 'Firefox 91.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', 'Windows 10', '2021-08-31 01:53:06'),
(309, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.205.50', 'Firefox 91.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', 'Windows 10', '2021-09-05 02:27:12'),
(310, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.24.162', 'Firefox 91.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', 'Windows 10', '2021-09-09 02:58:41'),
(311, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.30.127', 'Firefox 91.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', 'Windows 10', '2021-09-14 03:19:57'),
(312, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.29.214', 'Firefox 92.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', 'Windows 10', '2021-09-18 03:19:19'),
(313, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.29.38', 'Firefox 92.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', 'Windows 10', '2021-09-22 03:14:26'),
(314, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.31.207', 'Firefox 92.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', 'Windows 10', '2021-09-28 01:55:40'),
(315, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.31.207', 'Firefox 92.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', 'Windows 10', '2021-09-28 06:07:05'),
(316, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.168.207.105', 'Firefox 91.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', 'Windows 10', '2021-09-28 06:09:26'),
(317, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '106.78.93.44', 'Chrome 94.0.4606.61', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Mobile Safari/537.36', 'Android', '2021-10-02 08:03:39'),
(318, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '106.78.93.128', 'Chrome 94.0.4606.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36', 'Linux', '2021-10-02 23:38:45'),
(319, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.30.219', 'Firefox 92.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', 'Windows 10', '2021-10-05 06:31:20'),
(320, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.31.189', 'Firefox 92.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', 'Windows 10', '2021-10-06 03:07:25'),
(321, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.28.173', 'Firefox 93.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:93.0) Gecko/20100101 Firefox/93.0', 'Windows 10', '2021-10-07 03:14:46'),
(322, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.26.209', 'Firefox 93.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:93.0) Gecko/20100101 Firefox/93.0', 'Windows 10', '2021-10-07 05:35:01'),
(323, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.27.178', 'Firefox 93.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:93.0) Gecko/20100101 Firefox/93.0', 'Windows 10', '2021-10-08 00:52:17'),
(324, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.31.99', 'Firefox 93.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:93.0) Gecko/20100101 Firefox/93.0', 'Windows 10', '2021-10-09 02:27:02'),
(325, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.26.167', 'Firefox 93.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:93.0) Gecko/20100101 Firefox/93.0', 'Windows 10', '2021-10-16 00:26:00'),
(326, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.26.167', 'Firefox 93.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:93.0) Gecko/20100101 Firefox/93.0', 'Windows 10', '2021-10-16 04:34:23'),
(327, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.168.206.197', 'Firefox 93.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:93.0) Gecko/20100101 Firefox/93.0', 'Windows 10', '2021-10-18 00:31:07'),
(328, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.168.206.197', 'Firefox 93.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:93.0) Gecko/20100101 Firefox/93.0', 'Windows 10', '2021-10-20 01:19:32'),
(329, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.27.115', 'Firefox 93.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:93.0) Gecko/20100101 Firefox/93.0', 'Windows 10', '2021-10-21 05:21:14'),
(330, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.25.120', 'Firefox 93.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:93.0) Gecko/20100101 Firefox/93.0', 'Windows 10', '2021-10-25 03:15:21'),
(331, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '106.76.77.71', 'Chrome 95.0.4638.50', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', '2021-10-25 03:43:57'),
(332, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.29.11', 'Firefox 93.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:93.0) Gecko/20100101 Firefox/93.0', 'Windows 10', '2021-10-29 06:04:49'),
(333, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '124.253.112.56', 'Firefox 93.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:93.0) Gecko/20100101 Firefox/93.0', 'Windows 10', '2021-10-30 02:15:29'),
(334, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '106.78.93.193', 'Chrome 95.0.4638.74', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.74 Safari/537.36', 'Linux', '2021-11-06 02:36:15'),
(335, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.31.185', 'Firefox 94.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:94.0) Gecko/20100101 Firefox/94.0', 'Windows 10', '2021-11-07 23:36:32'),
(336, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.28.72', 'Firefox 94.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:94.0) Gecko/20100101 Firefox/94.0', 'Windows 10', '2021-11-13 00:17:37'),
(337, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.30.102', 'Firefox 94.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:94.0) Gecko/20100101 Firefox/94.0', 'Windows 10', '2021-11-18 00:39:49'),
(338, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.24.248', 'Firefox 94.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:94.0) Gecko/20100101 Firefox/94.0', 'Windows 10', '2021-11-22 02:00:58'),
(339, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.29.229', 'Firefox 94.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:94.0) Gecko/20100101 Firefox/94.0', 'Windows 10', '2021-11-24 22:46:16'),
(340, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.25.239', 'Firefox 94.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:94.0) Gecko/20100101 Firefox/94.0', 'Windows 10', '2021-11-29 00:49:05'),
(341, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.27.65', 'Firefox 94.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:94.0) Gecko/20100101 Firefox/94.0', 'Windows 10', '2021-12-03 01:07:20'),
(342, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.28.90', 'Firefox 94.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:94.0) Gecko/20100101 Firefox/94.0', 'Windows 10', '2021-12-06 22:55:30'),
(343, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.29.154', 'Firefox 95.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0) Gecko/20100101 Firefox/95.0', 'Windows 10', '2021-12-10 23:12:42'),
(344, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.29.154', 'Firefox 95.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0) Gecko/20100101 Firefox/95.0', 'Windows 10', '2021-12-11 01:57:35'),
(345, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.29.74', 'Firefox 95.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0) Gecko/20100101 Firefox/95.0', 'Windows 10', '2021-12-16 01:25:12'),
(346, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.26.101', 'Firefox 95.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0) Gecko/20100101 Firefox/95.0', 'Windows 10', '2021-12-22 01:36:02'),
(347, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.29.242', 'Firefox 95.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0) Gecko/20100101 Firefox/95.0', 'Windows 10', '2021-12-28 04:55:33'),
(348, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.30.29', 'Firefox 95.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0) Gecko/20100101 Firefox/95.0', 'Windows 10', '2021-12-28 23:22:27'),
(349, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.24.109', 'Firefox 95.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0) Gecko/20100101 Firefox/95.0', 'Windows 10', '2022-01-03 01:14:54'),
(350, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.26.74', 'Firefox 95.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0) Gecko/20100101 Firefox/95.0', 'Windows 10', '2022-01-10 01:34:51'),
(351, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.26.74', 'Firefox 95.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0) Gecko/20100101 Firefox/95.0', 'Windows 10', '2022-01-14 03:19:42'),
(352, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.26.74', 'Firefox 96.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0) Gecko/20100101 Firefox/96.0', 'Windows 10', '2022-01-15 00:27:58'),
(353, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.29.0', 'Firefox 96.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0) Gecko/20100101 Firefox/96.0', 'Windows 10', '2022-01-22 00:53:34'),
(354, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '49.14.110.163', 'Chrome 97.0.4692.98', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.98 Safari/537.36', 'Linux', '2022-01-26 21:39:55'),
(355, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '182.69.38.40', 'Firefox 96.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0) Gecko/20100101 Firefox/96.0', 'Windows 10', '2022-01-31 23:23:40'),
(356, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.31.60', 'Firefox 96.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0) Gecko/20100101 Firefox/96.0', 'Windows 10', '2022-02-07 00:57:44'),
(357, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.173.29.47', 'Chrome 98.0.4758.82', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'Windows 10', '2022-02-11 22:56:36'),
(358, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '103.40.197.119', 'Firefox 96.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:96.0) Gecko/20100101 Firefox/96.0', 'Linux', '2022-02-11 23:41:37'),
(359, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '182.69.41.85', 'Chrome 98.0.4758.87', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.87 Mobile Safari/537.36', 'Android', '2022-02-11 23:43:44'),
(360, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '182.69.41.85', 'Firefox 97.0', 'Mozilla/5.0 (Windows NT 10.0; rv:97.0) Gecko/20100101 Firefox/97.0', 'Windows 10', '2022-02-11 23:45:47'),
(361, 32, '{\"name\":\" \",\"first_name\":null,\"last_name\":null}', '127.0.0.1', 'Firefox 98.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:98.0) Gecko/20100101 Firefox/98.0', 'Linux', '2022-03-20 23:14:12'),
(362, 32, '{\"name\":\" \",\"first_name\":null,\"last_name\":null}', '127.0.0.1', 'Firefox 98.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:98.0) Gecko/20100101 Firefox/98.0', 'Linux', '2022-03-20 23:21:45'),
(363, 32, '{\"name\":\" \",\"first_name\":null,\"last_name\":null}', '127.0.0.1', 'Firefox 98.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:98.0) Gecko/20100101 Firefox/98.0', 'Linux', '2022-03-20 23:24:52'),
(364, 32, '{\"name\":\" \",\"first_name\":null,\"last_name\":null}', '127.0.0.1', 'Firefox 98.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:98.0) Gecko/20100101 Firefox/98.0', 'Linux', '2022-03-21 12:25:09'),
(365, 32, '{\"name\":\" \",\"first_name\":null,\"last_name\":null}', '127.0.0.1', 'Firefox 98.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:98.0) Gecko/20100101 Firefox/98.0', 'Linux', '2022-03-23 00:29:18'),
(366, 32, '{\"name\":\" \",\"first_name\":null,\"last_name\":null}', '127.0.0.1', 'Firefox 98.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:98.0) Gecko/20100101 Firefox/98.0', 'Linux', '2022-03-23 01:29:24'),
(367, 32, '{\"userId\":\"32\",\"name\":\" \",\"first_name\":null,\"last_name\":null,\"lastLogin\":\"2022-03-23 01:29:24\",\"isLoggedIn\":true}', '127.0.0.1', 'Firefox 98.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:98.0) Gecko/20100101 Firefox/98.0', 'Linux', '2022-03-23 01:32:14'),
(368, 32, '{\"userId\":\"32\",\"name\":\" \",\"first_name\":null,\"last_name\":null,\"lastLogin\":\"2022-03-23 01:32:14\",\"isLoggedIn\":true}', '127.0.0.1', 'Firefox 98.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:98.0) Gecko/20100101 Firefox/98.0', 'Linux', '2022-03-23 01:32:24'),
(369, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '127.0.0.1', 'Firefox 98.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:98.0) Gecko/20100101 Firefox/98.0', 'Linux', '2022-03-23 01:34:26'),
(370, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '127.0.0.1', 'Firefox 98.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:98.0) Gecko/20100101 Firefox/98.0', 'Linux', '2022-03-23 01:34:52'),
(371, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '127.0.0.1', 'Firefox 98.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:98.0) Gecko/20100101 Firefox/98.0', 'Linux', '2022-03-25 23:55:21'),
(372, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '127.0.0.1', 'Firefox 98.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:98.0) Gecko/20100101 Firefox/98.0', 'Linux', '2022-03-25 23:57:56'),
(373, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '127.0.0.1', 'Firefox 98.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:98.0) Gecko/20100101 Firefox/98.0', 'Linux', '2022-03-26 00:32:28'),
(374, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '127.0.0.1', 'Firefox 98.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:98.0) Gecko/20100101 Firefox/98.0', 'Linux', '2022-04-04 23:12:56'),
(375, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '::1', 'Chrome 100.0.4896.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.75 Safari/537.36', 'Windows 10', '2022-04-13 14:56:38'),
(376, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '::1', 'Chrome 100.0.4896.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.75 Safari/537.36', 'Windows 10', '2022-04-13 14:59:48'),
(377, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '::1', 'Chrome 100.0.4896.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.75 Safari/537.36', 'Windows 10', '2022-04-13 15:02:51'),
(378, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.190.2.171', 'Chrome 100.0.4896.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', 'Windows 10', '2022-04-15 18:29:57'),
(379, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '157.38.28.137', 'Chrome 99.0.4844.84', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', 'Windows 10', '2022-04-15 18:32:30'),
(380, 75, '{\"role\":\"3\",\"roleText\":\"Learner\",\"name\":\"Yogesh\"}', '223.190.0.199', 'Chrome 100.0.4896.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', 'Windows 10', '2022-04-16 10:05:32'),
(381, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '223.190.0.199', 'Chrome 100.0.4896.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', 'Windows 10', '2022-04-16 15:45:15'),
(382, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '117.212.11.229', 'Chrome 100.0.4896.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.75 Safari/537.36', 'Windows 10', '2022-04-16 15:46:55'),
(383, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.57.102.224', 'Chrome 100.0.4896.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', 'Windows 10', '2022-04-18 10:34:16'),
(384, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.57.102.224', 'Chrome 100.0.4896.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', 'Windows 10', '2022-04-18 10:42:50'),
(385, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '61.0.140.7', 'Chrome 100.0.4896.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', 'Windows 10', '2022-04-18 10:59:11'),
(386, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '27.57.102.224', 'Chrome 100.0.4896.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', 'Windows 10', '2022-04-18 11:09:43'),
(387, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '182.64.73.170', 'Chrome 100.0.4896.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', 'Windows 10', '2022-04-18 17:08:12'),
(388, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '49.36.233.136', 'Chrome 100.0.4896.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', 'Windows 10', '2022-04-18 20:15:57');
INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(389, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '59.94.146.161', 'Chrome 100.0.4896.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', 'Windows 10', '2022-04-19 11:24:53'),
(390, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '122.161.59.93', 'Chrome 100.0.4896.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', 'Windows 10', '2022-04-19 14:55:47'),
(391, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"system admin\"}', '59.94.146.161', 'Chrome 100.0.4896.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', 'Windows 10', '2022-04-19 14:57:19'),
(392, 75, '{\"role\":\"3\",\"roleText\":\"Learner\",\"name\":\"Yogesh\"}', '122.161.59.93', 'Chrome 100.0.4896.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', 'Windows 10', '2022-04-19 15:28:43'),
(393, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Admin\"}', '103.40.197.215', 'Firefox 99.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:99.0) Gecko/20100101 Firefox/99.0', 'Linux', '2022-04-19 19:23:59'),
(394, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Admin\"}', '103.40.197.215', 'Firefox 99.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:99.0) Gecko/20100101 Firefox/99.0', 'Linux', '2022-04-19 19:27:20'),
(395, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Admin\"}', '223.190.3.230', 'Chrome 100.0.4896.127', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'Windows 10', '2022-04-20 10:51:35'),
(396, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Admin\"}', '59.94.146.161', 'Chrome 100.0.4896.127', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'Windows 10', '2022-04-20 11:08:26'),
(397, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Admin\"}', '223.190.3.230', 'Chrome 100.0.4896.127', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'Windows 10', '2022-04-20 16:20:14'),
(398, 32, '{\"role\":\"1\",\"roleText\":\"Admin\",\"name\":\"System Admin\"}', '103.40.197.215', 'Firefox 99.0', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:99.0) Gecko/20100101 Firefox/99.0', 'Linux', '2022-04-20 18:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE `tbl_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reset_password`
--

INSERT INTO `tbl_reset_password` (`id`, `email`, `activation_id`, `agent`, `client_ip`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'mdewan8@gmail.com', 'VPq1kTaR3sypwix', 'Chrome 75.0.3770.143', '110.225.199.92', 0, 1, '2020-05-24 17:23:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'Admin'),
(2, 'sub-Admin'),
(3, 'Learner');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `token` text NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `oauth_provider` varchar(255) DEFAULT NULL,
  `oauth_uid` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `gp_id` int(11) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `token`, `email`, `password`, `name`, `oauth_provider`, `oauth_uid`, `picture`, `mobile`, `roleId`, `gp_id`, `isDeleted`, `is_active`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, '', 'magan.sood@gmail.com', 'Password123', 'Sunil Sood', NULL, NULL, NULL, '9417025238', 3, 1, 0, '1', 1, '2020-04-01 00:00:00', 1, '2020-09-16 17:55:35'),
(2, '', 'jatinderalka@gmail.com', 'Password123', 'Jatinder Jain ', NULL, NULL, NULL, '9779110300', 3, 1, 1, '1', 1, '2020-04-01 00:00:00', 32, '2020-09-16 17:55:35'),
(3, '', 'gourinandanbansal6@gmail.com', 'Password123', 'G.N.Bansal', NULL, NULL, NULL, '98140 00471', 3, 1, 1, '1', 1, '2020-04-01 00:00:00', 32, '2020-09-16 17:55:35'),
(4, '', 'rimpy_thapar@yahoo.com', 'Password123', 'Rimpy Thapar', NULL, NULL, NULL, '9876400052', 3, 1, 1, '1', 1, '2020-04-01 00:00:00', 32, '2020-09-16 17:55:35'),
(5, '', 'uditjindal99@gmail.com', 'Password123', 'Udit Jindal', NULL, NULL, NULL, '9888077765', 3, 1, 1, '1', 1, '2020-04-01 00:00:00', 32, '2020-09-16 17:55:35'),
(6, '', 'varindergoel@hotmail.com', 'Password123', 'Varinder Goel ', NULL, NULL, NULL, '9872987862', 3, 1, 0, '1', 1, '2020-04-01 00:00:00', 1, '2020-09-16 17:55:35'),
(7, '', 'admin@timcosteel.com', 'Password123', 'Amit Gupta', NULL, NULL, NULL, '9814009462', 3, 2, 0, '1', 1, '2020-04-01 00:00:00', 1, '2020-09-16 17:55:35'),
(8, '', 'info@staticcontrolsystems.com', 'Password123', 'Vipan Chhabra ', NULL, NULL, NULL, '9216923186', 3, 2, 0, '1', 1, '2020-04-01 00:00:00', 1, '2020-09-16 17:55:35'),
(9, '', 'brrmldh@gmail.com', 'Password123', 'Rohit Gupta', NULL, NULL, NULL, '9814700163', 3, 2, 0, '1', 1, '2020-04-01 00:00:00', 1, '2020-09-16 17:55:35'),
(10, '', '23teenagupta@gmail.com', 'Password123', 'Teena Gupta', NULL, NULL, NULL, '9878092912', 3, 2, 0, '1', 1, '2020-04-01 00:00:00', 1, '2020-09-16 17:55:35'),
(11, '', 'singlayogesh76@gmail.com', 'Password123', 'Yogesh Singla', NULL, NULL, NULL, '9876147777', 3, 3, 1, '1', 1, '2020-04-01 00:00:00', 32, '2020-09-16 17:55:35'),
(12, '', 'goyalmv@gmail.com', 'Password123', 'Vivek Goyal ', NULL, NULL, NULL, '9815931491', 3, 3, 1, '1', 1, '2020-04-01 00:00:00', 32, '2020-09-16 17:55:35'),
(13, '', 'mdewan8@gmail.com', 'Password123', 'Maneet Dewan', NULL, NULL, NULL, '9815166979', 3, 3, 0, '1', 1, '2020-04-01 00:00:00', 1, '2020-09-16 17:55:35'),
(14, '', 'amritamangat@icloud.com', 'Password123', 'Amrita Mangat', NULL, NULL, NULL, '9815368689', 3, 3, 0, '1', 1, '2020-04-01 00:00:00', 32, '2020-09-16 17:55:35'),
(15, '', 'sumit17kumar@yahoo.com', 'Password123', 'Renu Kumar', NULL, NULL, NULL, '8054044444', 3, 3, 1, '1', 1, '2020-04-01 00:00:00', 32, '2020-09-16 17:55:35'),
(16, '', 'apsmann1@yahoo.com', 'Password123', 'Dr.A.P.S.Mann', NULL, NULL, NULL, '9646642747', 3, 3, 0, '1', 1, '2020-04-01 00:00:00', 1, '2020-09-16 17:55:35'),
(17, '', 'bakshikitty@yahoo.com', 'Password123', 'Kitty Bakshi', NULL, NULL, NULL, '9855137087', 3, 3, 0, '1', 1, '2020-04-01 00:00:00', 1, '2020-09-16 17:55:35'),
(18, '', 'savinderdgn62@gmail.com', 'Password123', 'Savinder Kaur ', NULL, NULL, NULL, '9872651455', 3, 3, 0, '1', 1, '2020-04-01 00:00:00', 1, '2020-09-16 17:55:35'),
(19, '', 'sspreetivh@gmail.com', 'Password123', 'Dr Preeti Kaur', NULL, NULL, NULL, '9814617660', 3, 4, 0, '1', 1, '2020-04-01 00:00:00', 1, '2020-09-16 17:55:35'),
(20, '', 'kamaldhawantext@gmail.com', 'Password123', 'Kamal Dhawan', NULL, NULL, NULL, '8427244442', 3, 4, 0, '1', 1, '2020-04-01 00:00:00', 1, '2020-09-16 17:55:35'),
(21, '', 'drneelamsodhi@yahoo.com', 'Password123', 'Neelam Sodhi', NULL, NULL, NULL, '9814922361', 3, 4, 0, '1', 1, '2020-04-01 00:00:00', 32, '2020-09-16 17:55:35'),
(22, '', 'renuberi28@gmail.com', 'Password123', 'Dr Renu Beri ', NULL, NULL, NULL, '9465855520', 3, 4, 0, '1', 1, '2020-04-01 00:00:00', 1, '2020-09-16 17:55:35'),
(23, '', 'dr.naveenpereira@rediffmail.com', 'Password123', 'Dr Naveen Pierrera', NULL, NULL, NULL, '9815100244', 3, 4, 0, '1', 1, '2020-04-01 00:00:00', 1, '2020-09-16 17:55:35'),
(24, '', 'dramandua@akclinics.com', 'Password123', 'Dr Aman Dua', NULL, NULL, NULL, '9872808301', 3, 5, 1, '1', 1, '2020-04-01 00:00:00', 32, '2020-09-16 17:55:35'),
(25, '', 'dpssekhon@gmail.com', 'Password123', 'D.s.sekhon', NULL, NULL, NULL, '9814408330', 3, 6, 0, '1', 1, '2020-04-01 00:00:00', 32, '2020-09-16 17:55:35'),
(26, '', 'ckjnmj@gmail.com', 'Password123', 'Chander Kant Jain ', NULL, NULL, NULL, '9815194555', 3, 5, 0, '1', 1, '2020-04-01 00:00:00', 1, '2020-09-16 17:55:35'),
(27, '', 'vaibhav.jain666@gmail.com', 'Password123', 'Vaibhav Jain', NULL, NULL, NULL, '9842000003', 3, 5, 0, '1', 1, '2020-04-01 00:00:00', 1, '2020-09-16 17:55:35'),
(28, '', 'Lokesh.rupali@gmail.com', 'Password123', 'Lokesh Jain ', NULL, NULL, NULL, '9781259000', 3, 5, 1, '1', 1, '2020-04-01 00:00:00', 32, '2020-09-16 17:55:35'),
(29, '', 'pankajkalra5@ yahoo.com', 'Password123', 'Pankaj Kalra', NULL, NULL, NULL, '9815700547', 3, 5, 1, '1', 1, '2020-04-01 00:00:00', 32, '2020-09-16 17:55:35'),
(30, '', 'kalrakomal11@yahoo.com', 'Password123', 'Komal Kalra', NULL, NULL, NULL, '9815164711', 3, 5, 1, '1', 1, '2020-04-01 00:00:00', 32, '2020-09-16 17:55:35'),
(31, '', 'vedgupta1509@gmail.com', 'Password123', 'Ved Prakash', NULL, NULL, NULL, '9872249492', 3, 5, 1, '1', 1, '2020-04-01 00:00:00', 32, '2020-09-16 17:55:35'),
(32, '', 'admin@admin.com', '$2y$10$6NOKhXKiR2SAgpFF2WpCkuRgYKlSqFJaqM0NgIM3PT1gKHEM5/SM6', 'System Admin', NULL, NULL, NULL, '9988738908', 1, 0, 0, '1', 0, '2020-04-01 00:00:00', 32, '2022-04-19 16:21:54'),
(33, '', 'ambicakaushal@yahoo.in', '$2y$10$WnpGf6f5hgjSQhzRauO7H.0wdzkq.XbE8xk.PBPMYupRviR3OLBbW', 'Sanjeev Kaushal', NULL, NULL, NULL, '9815020014', 3, 2, 1, '1', 32, '2020-09-18 10:36:52', 32, '2020-09-16 17:55:35'),
(34, '', 'binduguptagpt@gmail.com', '$2y$10$m7rifQIJ6/FUYXSXC7Zc.Op2/W8MCifEUMYI2uwBOFeVlSqPMVf36', 'Jagdeep Singal', NULL, NULL, NULL, '9872666666', 3, 3, 1, '1', 32, '2020-09-18 10:37:17', 32, '2020-09-16 17:55:35'),
(35, '', 'ajrawat.sweety14@gmail.com', '$2y$10$o8qkIQOvKC2YRLcxt6WB5.3S4i1kfOqOBUksL3HxseA406NL1xuHO', 'Sweeti Ajrawat', NULL, NULL, NULL, '9876864284', 3, 4, 0, '1', 32, '2020-09-18 10:37:35', NULL, '2020-09-16 17:55:35'),
(36, '', 'anumitswani@gmail.com', '$2y$10$iX/NagD/XZVZbXQq1zXBwO7hKKA9ghG1fbjKXrpaLv/5DaMY9.kCa', 'Anumit Swani', NULL, NULL, NULL, '9872030774', 3, 5, 0, '1', 32, '2020-09-18 10:37:51', NULL, '2020-09-16 17:55:35'),
(37, '', 'jasmeetk62@yahoo.in', '$2y$10$qVd3stSVarOBVDR6AdlzsO9f2K88pHmRhUBLh9cwqzr4bYdxQquyu', 'Jasmeet Kaur', NULL, NULL, NULL, '9814081117', 3, 5, 1, '1', 32, '2020-09-18 10:38:10', 32, '2020-09-16 17:55:35'),
(38, '', 'anjutrikha63@gmail.com', '$2y$10$lkfA6iXjyQq7RH8h28uFTOobX.NNqarf0p11IZRKHuguTItlvh.Ja', 'Anju Trikha', NULL, NULL, NULL, '9815956982', 3, 3, 1, '1', 32, '2020-10-14 13:09:45', 32, '2020-09-16 17:55:35'),
(39, '', 'omaniltrikha@gmail.com', '$2y$10$2KEiE.t4ILw.m528.DYQQ.37nR25D5qUb.cMtzcSKFCH54SAa5jXC', 'Kunj Garg', NULL, NULL, NULL, '9876244442', 3, 6, 0, '1', 32, '2020-10-20 11:28:02', 32, '2020-09-16 17:55:35'),
(40, '', 'drjskohli@gmail.com', '$2y$10$gWTedrktE9.Diw5CsqT1.O4R.s61LQ/PEWSZPTDnb1HI3ma4DcdPm', 'Dr. J S Kohli', NULL, NULL, NULL, '9872687200', 3, 5, 0, '1', 32, '2020-11-25 13:32:32', 32, '2020-09-16 17:55:35'),
(41, '', 'kkaur83@gmail.com', '$2y$10$jUgL9uQkLnhJ9Ul0DKHqt.jNxSJwzlW0XXN.fvRIhquG5Arxbu6Am', 'Dr Kanwaljit Kaur', NULL, NULL, NULL, '9855592706', 3, 4, 1, '1', 32, '2020-11-25 14:22:09', 32, '2020-09-16 17:55:35'),
(42, '', 'drpardeepkapoor@gmail.com', '$2y$10$P7uPDP9SIbz2Lk1MarEeY.gV7DcSBZhyUPtaY2WkT4QGeXlbvFSTy', 'Dr Pardeep Kapoor', NULL, NULL, NULL, '9876797077', 3, 6, 0, '1', 32, '2020-11-28 11:43:11', 32, '2020-09-16 17:55:35'),
(43, '', 'shilpathapar@hotmail.com', '$2y$10$F78qesqWpLqIIgOvREBJxuKgIw8udqWy71XLl6RV7izoj5gy8nsKG', 'Shilpa Kejriwal', NULL, NULL, NULL, '9872000177', 3, 5, 0, '1', 32, '2020-11-30 14:45:10', NULL, '2020-09-16 17:55:35'),
(44, '', 'kumbkarni@gmail.com', '$2y$10$aZYRQAzjQOhde1bN2u8uoenWJLKf5YIvuywoYNWFAjXkPq4A9S1kG', 'Dr S. Kumbkarni', NULL, NULL, NULL, '9779637608', 3, 6, 0, '1', 32, '2021-01-01 11:27:17', NULL, '2020-09-16 17:55:35'),
(45, '', 'homelife05@gmail.com', '$2y$10$YqqoH.b9rJOdg2OEZddASue5RD72Zx6CR37NasI0txjkJYlrxtEeS', 'Jagjit Singh', NULL, NULL, NULL, '9814404015', 3, 2, 1, '1', 32, '2021-01-26 09:11:35', 32, '2020-09-16 17:55:35'),
(46, '', 'manugupta0044@gmail.com', '$2y$10$jzHw8h5o0WlgYn0D9tOtSO4szzGv50H0S6KKnJYQDWd9YBM1VVieq', 'Manu Gupta', NULL, NULL, NULL, '9876018100', 3, 2, 0, '1', 32, '2021-01-26 09:11:54', 32, '2020-09-16 17:55:35'),
(47, '', 'shrimpschawla@yahoo.com', '$2y$10$k2iQazA4IxRIBSmqcPD08.uQ95ZrTxyIc1pC3XaG9jPfmnz412PkO', 'Rimpy Chawla', NULL, NULL, NULL, '9878844449', 3, 2, 0, '1', 32, '2021-03-31 16:13:08', 32, '2020-09-16 17:55:35'),
(48, '', 'monikagupta3313@gmail.com', '$2y$10$joyA4uJrcJXz5M.zHgB7mOTn2A6..3itQK9yPv06qF.T4JtVUEEY.', 'Monika Gupta', NULL, NULL, NULL, '1234567890', 3, 5, 0, '1', 32, '2021-04-16 13:38:54', 32, '2020-09-16 17:55:35'),
(49, '', 'test@gmail.com', '$2y$10$FSid1LoK6Suf45QPyrXCKuZIUdVqofpegnW2MoJPTgg..Y4CYT6Qi', 'Jatinder Kharbanda', NULL, NULL, NULL, '9915000030', 3, 5, 0, '1', 32, '2021-04-19 17:39:51', NULL, '2020-09-16 17:55:35'),
(54, '', 'test2@gmail.com', '$2y$10$/UhZNk/cwLBv6ir5wkytwu54UgXIGcWSnNhEyggV92aNrPL4Ge3WS', 'Aanchal Garg', NULL, NULL, NULL, '8288844442', 3, 6, 0, '1', 32, '2021-06-07 10:10:31', NULL, '2020-09-16 17:55:35'),
(50, '', 'dr.rchowdhary@gmail.com', '$2y$10$Hbc/OuOW9199rd3W1meBG.OUoeUZ5tVT653I7lH4HArjIyN6cD4g.', 'Ritu Chaoudhry', NULL, NULL, NULL, '9417335373', 3, 1, 0, '1', 32, '2021-05-27 13:14:35', NULL, '2020-09-16 17:55:35'),
(51, '', 'ceramic280763@yahoo.com', '$2y$10$lNFVmfA.y/x/NcyS2RIsD.T98wk3y3Lwc2mvMIlgAKBVFo3K6mSMG', 'Harish Chhabra', NULL, NULL, NULL, '9316919256', 3, 3, 0, '1', 32, '2021-05-27 13:31:40', NULL, '2020-09-16 17:55:35'),
(52, '', 'rajangoyal@hotmail.com', '$2y$10$dua8XB5fMB5CWAyfSjKLCOImM0p2aikqX6tZNZQPwYXSBI3VekYgW', 'Rajan Goyal', NULL, NULL, NULL, '9815734000', 3, 5, 0, '1', 32, '2021-05-29 14:17:14', NULL, '2020-09-16 17:55:35'),
(53, '', 'jainbipan@yahoo.in', '$2y$10$Qd7OkCmFmq6TtIbcxjU50ORs90efBAjpfTegl9PXDKNvmqXwrJKKe', 'Bipan Jain', NULL, NULL, NULL, '9878612345', 3, 1, 0, '1', 32, '2021-05-31 10:53:37', NULL, '2020-09-16 17:55:35'),
(55, '', 'singl.dolly70@gmail.com', '$2y$10$.u2swrUeFhBrFLmUnh4fK.4mnFssxjDBe5dJMeo1lrzTqKsHehi8m', 'Dolly Singal', NULL, NULL, NULL, '9914821000', 3, 3, 0, '1', 32, '2021-06-07 10:10:58', NULL, '2020-09-16 17:55:35'),
(56, '', 'bawamittal@rediffmail.com', '$2y$10$jRKyZiWKN2XnOpbQUX7fKesQz45t5tAj0MT3ZOUNjv4ZbQUu3V5/W', 'Bawa Mittal', NULL, NULL, NULL, '9814000151', 3, 2, 0, '1', 32, '2021-06-07 10:11:16', NULL, '2020-09-16 17:55:35'),
(57, '', 'highinterity@gmail.com', '$2y$10$3E.g6wtdubxZykiacLCHxuZz0AsH0ly8HxyNfAnI/QJVmKYqHXLXC', 'Vijay Arora', NULL, NULL, NULL, '8054507000', 3, 5, 0, '1', 32, '2021-06-18 13:10:29', NULL, '2020-09-16 17:55:35'),
(58, '', 'thind11@yahoo.com', '$2y$10$kitPA5veVzTldn7Uu8W2beMLFDELWgmgxV.TMv4yxEGg5OAsML.By', 'Dr. Rajan Thind', NULL, NULL, NULL, '9872221544', 3, 4, 0, '1', 32, '2021-06-18 13:11:00', NULL, '2020-09-16 17:55:35'),
(59, '', 'rahulverma1106@gmail.com', '$2y$10$FLOo2TBqd.QU1Mwo0ovI7OJ/XJky3aGcjBZ1wzNpXiir8iqpkf9Qe', 'Rahul Verma', NULL, NULL, NULL, '9814000099', 3, 5, 0, '1', 32, '2021-06-18 16:28:25', NULL, '2020-09-16 17:55:35'),
(60, '', 'gulneetchahal@gmail.com', '$2y$10$uAGZYszzJvC59f2qYPbW6ehfcZrPKgmBfa7Hzv6OFoJVKsG3m6bO6', 'Gurleet Chahal', NULL, NULL, NULL, '9815945300', 3, 6, 0, '1', 32, '2021-06-21 12:24:56', NULL, '2020-09-16 17:55:35'),
(61, '', 'vasu00k@gmail.com', '$2y$10$Ihw.toIeh/q7exiUM7g7vub/csaLSxRBHHUR9rN1qLq3jh86ySniS', 'Vinayak Vasudeva', NULL, NULL, NULL, '9316256777', 3, 2, 0, '1', 32, '2021-10-05 18:18:06', NULL, '2020-09-16 17:55:35'),
(62, '', 'harshgarg20472@gmail.com', '$2y$10$uZpXLPaqYAk53IrHUZSkBORjGhZYz.GEzGjohW4c/3qzytrDuUr6G', 'Harsh Garg', NULL, NULL, NULL, '9316911716', 3, 2, 0, '1', 32, '2021-10-07 13:45:49', NULL, '2020-09-16 17:55:35'),
(63, '', 'drrenuwatts@gmail.com', '$2y$10$hpAOs/FOGC/YHzMQ.elS3u4QEEULEVQPdzV1X6tKojBUUqHUHrSDq', 'Anupam Watts', NULL, NULL, NULL, '9872212660', 3, 5, 0, '1', 32, '2021-10-07 13:46:15', NULL, '2020-09-16 17:55:35'),
(64, '', 'drbagga@gmail.com', '$2y$10$gNUm0egsxptKFM4UE6zi4eZ7D1KO7V5/7N8d34RlrGLQ3wbn1xrEu', 'I S Bagga', NULL, NULL, NULL, '9814026322', 3, 4, 0, '1', 32, '2021-10-07 16:06:50', NULL, '2020-09-16 17:55:35'),
(65, '', 'dr_amritakaur@yahoo.co.in', '$2y$10$Yquz4SZZfvkpNHFQZfOFbOdaBUcxBiL8zg.cp65WafK9qHM2k5sMS', 'Dr Amanpreet Arora', NULL, NULL, NULL, '9646000209', 3, 5, 0, '1', 32, '2021-10-08 11:23:24', NULL, '2020-09-16 17:55:35'),
(66, '', 'naveenaggarwalk@gmail.com', '$2y$10$LKTvrjNEjeZbZs3Yj96xJ.Od9L69UKXPOH6y18N2BEDvz2u1PwhyK', 'Naveen Aggarwal', NULL, NULL, NULL, '9814021392', 3, 2, 1, '1', 32, '2021-10-16 10:57:19', 32, '2020-09-16 17:55:35'),
(67, '', 'sheekha68@gmail.com', '$2y$10$bItXtAtL.fbWs0AtSC/lEOw8KIab0PewnqlvQnTfVt9oUeK1iI13e', 'Parul Gupta', NULL, NULL, NULL, '9814107312', 3, 6, 0, '1', 32, '2021-10-25 14:21:44', NULL, '2020-09-16 17:55:35'),
(68, '', 'rrateel.rishi@gmail.com', '$2y$10$VD65k5xLOtUiOMNI88UAXe2uXzprxHiYrh31dzJ2IzcEJydsONRyi', 'Rishi Kumar', NULL, NULL, NULL, '9814005539', 3, 4, 0, '1', 32, '2021-10-29 16:35:33', NULL, '2020-09-16 17:55:35'),
(69, '', 'singla_pankaj@yahoo.co.in', '$2y$10$cp/aiV8kgKQTAG5rMQooheoPl6iv.ck0XCNaLUXs.Z9YvEYqgzaBS', 'Pankaj Singla', NULL, NULL, NULL, '9876644555', 3, 6, 0, '1', 32, '2021-11-06 13:10:04', NULL, '2020-09-16 17:55:35'),
(70, '', 'chhayasharma869@gmail.com', '$2y$10$zTzVaXYRop.TagMIELtTK.eW/jl9lzNVWCw5WTJkSMjNkQcmua6am', 'Suraj Jyoti', NULL, NULL, NULL, '9814033622', 3, 3, 0, '1', 32, '2021-11-06 13:37:10', NULL, '2020-09-16 17:55:35'),
(71, '', 'romimancoo@gmail.com', '$2y$10$gR/KTCuteOEY/.oTq5AM2O832g/7a6mu5ljZR52Y6oKHqsrpsZUHK', 'Amarjit Singh', NULL, NULL, NULL, '9988297904', 3, 2, 0, '1', 32, '2021-12-11 10:43:39', NULL, '2020-09-16 17:55:35'),
(72, '', 'eli@gmail.com', '$2y$10$pU21fiLQ5eh8T3Awnkz2Y.JlZOsDihcooflw8JEz2qMVzZ8gnDtiO', 'Eli', NULL, NULL, NULL, '9988738908', 3, 0, 0, '1', 32, '2022-03-23 01:26:13', 32, '2022-03-26 00:02:44'),
(78, 'TN97YGE1MBHIWSRUC2LP50XZAQDJFV86KO4', 'test@test', '$2y$10$Juvt./ve5XTCK8fGXjx0ee43HgZcZ1Wxd3dd1IM6wfh.ze0zBYQuu', 'test', NULL, NULL, NULL, '1234567890', 3, 0, 0, '1', 0, '2022-04-16 11:30:47', NULL, NULL),
(75, 'GX6E05KAMUW3SNV7PC8QJLR9YDTOZ1I4HFB', 'yogesh.s.maheshwari@gmail.com', '$2y$10$dOCSmNAffpI7iCHs2TRI.ONHx3nKaYD3gO9Ka4IIvk4ZwkWa1DSCW', 'Yogesh', NULL, NULL, NULL, '9602433887', 3, 0, 0, '1', 0, '2022-04-13 17:19:15', NULL, NULL),
(76, 'Y19CROB4G0KAX7FLZWUJTH52PMQI6V8ND3E', 'tanveerz.singh@gmail.com', '$2y$10$nJEjzn7KY0wrR6BedigyseeoxoEOfA1UQYE5dFj8HcZKgSsyVhvc.', 'Tanveer Singh ', NULL, NULL, NULL, '9988738908', 3, 0, 0, '1', 0, '2022-04-13 23:37:24', NULL, NULL),
(77, 'DE06TIK1GL453Q9HAZ7M2PNFYJBXWRCO8VU', 'yogesh.s.maheshwari@gmail', '$2y$10$ZBKnbELgLwC2iX78mGDrEuPO7TIQz9qG4wcizTg4KYSqQHLeaREau', 'test', NULL, NULL, NULL, '567890', 3, 0, 0, '1', 0, '2022-04-16 11:10:20', NULL, NULL),
(85, '84ZVG795F3NWOULCRI2Y6DPMSBEKAQTXJ1H', 'tepesas248@3dinews.com', '$2y$10$C5.viv69ltZxpdUjJEg7gueNeBzEZIMuQb.TeqbF04AMYViTqdeJa', 'test', NULL, NULL, NULL, '0123456789', 3, 0, 0, '1', 0, '2022-04-16 13:09:41', NULL, NULL),
(86, '9SB8RD7CPAIHEJ31O46WN0GYTVQFL5UXZK2', 'vajidsankhla0786@gmail.com', '', 'Vajid', 'facebook', '1780846945594179', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=1780846945594179&height=50&width=50&ext=1652954513&hash=AeS3bTrX_PpJ1ZYMUis', NULL, 3, 0, 0, '1', 0, '2022-04-16 14:37:34', NULL, '2022-04-19 15:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE `user_courses` (
  `user_course_id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_selected_date` datetime NOT NULL,
  `user_course_status` enum('active','deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_detail_tbl`
--

CREATE TABLE `user_detail_tbl` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `trasaction_id` varchar(555) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail_tbl`
--

INSERT INTO `user_detail_tbl` (`id`, `userid`, `courseid`, `status`, `trasaction_id`, `date`) VALUES
(9, 85, 1, '1', 'dsfsdfds', '0000-00-00 00:00:00'),
(10, 75, 14, '1', '654654', '2022-04-20 16:20:01'),
(11, 75, 1, '1', '76543', '2022-04-20 16:21:44'),
(12, 76, 1, '1', 'fgfffff', '2022-04-20 18:14:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `course_master`
--
ALTER TABLE `course_master`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `keyword_master`
--
ALTER TABLE `keyword_master`
  ADD PRIMARY KEY (`keyword_id`);

--
-- Indexes for table `language_master`
--
ALTER TABLE `language_master`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `part_master`
--
ALTER TABLE `part_master`
  ADD PRIMARY KEY (`part_id`);

--
-- Indexes for table `part_view_tbl`
--
ALTER TABLE `part_view_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sentence_master`
--
ALTER TABLE `sentence_master`
  ADD PRIMARY KEY (`sentence_id`);

--
-- Indexes for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`user_course_id`);

--
-- Indexes for table `user_detail_tbl`
--
ALTER TABLE `user_detail_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `course_master`
--
ALTER TABLE `course_master`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `keyword_master`
--
ALTER TABLE `keyword_master`
  MODIFY `keyword_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `language_master`
--
ALTER TABLE `language_master`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `part_master`
--
ALTER TABLE `part_master`
  MODIFY `part_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `part_view_tbl`
--
ALTER TABLE `part_view_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sentence_master`
--
ALTER TABLE `sentence_master`
  MODIFY `sentence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=399;

--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `user_courses`
--
ALTER TABLE `user_courses`
  MODIFY `user_course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_detail_tbl`
--
ALTER TABLE `user_detail_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
