-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2019 at 12:22 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 2, 1, 'ghjhj', '2019-12-18 13:55:58', 1),
(2, 2, 1, 'hkhkhkjk', '2019-12-18 13:56:02', 1),
(3, 2, 1, 'fdgdf', '2019-12-18 13:56:05', 1),
(4, 1, 2, 'jhg', '2019-12-18 13:57:06', 1),
(5, 3, 2, 'sddfs', '2019-12-18 13:57:16', 1),
(6, 3, 2, 'fdsf', '2019-12-18 13:57:18', 1),
(7, 3, 2, 'adsf', '2019-12-18 13:57:19', 1),
(8, 1, 2, 'dgdgf', '2019-12-19 07:29:11', 1),
(9, 2, 1, 'deepak', '2019-12-19 07:45:38', 1),
(10, 2, 1, '', '2019-12-19 07:45:53', 1),
(11, 3, 1, 'fdbgjkdfg\n', '2019-12-19 07:47:50', 1),
(12, 3, 1, 'gfbkgf', '2019-12-19 07:47:54', 1),
(13, 1, 2, '', '2019-12-19 07:53:56', 1),
(14, 1, 2, 'gdf', '2019-12-19 07:56:29', 1),
(15, 1, 2, 'dfggf', '2019-12-19 07:57:07', 1),
(16, 1, 2, '', '2019-12-19 07:57:22', 1),
(17, 1, 2, '', '2019-12-19 07:57:23', 1),
(18, 1, 2, 'fghghfghfghfghfghhgfhfg', '2019-12-19 07:58:42', 1),
(19, 1, 2, 'mhghjjhjghjghjghjgjhj', '2019-12-19 08:16:06', 1),
(20, 1, 1, 'dsfddsfdfsfdfdfsfdsdfffsdf', '2019-12-19 11:30:20', 1),
(21, 1, 1, 'bv', '2019-12-19 11:30:29', 1),
(22, 3, 1, 'adfdsff', '2019-12-20 06:32:23', 1),
(23, 3, 1, 'dfsaf', '2019-12-20 06:32:24', 1),
(24, 3, 1, 'asdfaf', '2019-12-20 06:32:26', 1),
(25, 3, 1, 'afdsfds', '2019-12-20 06:32:28', 1),
(26, 1, 3, 'dsfasdf', '2019-12-20 06:33:59', 1),
(27, 1, 3, 'ssda', '2019-12-20 06:34:00', 1),
(28, 1, 3, 'asdf', '2019-12-20 06:34:03', 1),
(29, 1, 3, 'sdfads', '2019-12-20 06:34:04', 1),
(30, 2, 1, 'fgd', '2019-12-20 07:22:42', 1),
(31, 2, 1, 'sdfsdfsd', '2019-12-20 08:13:42', 1),
(32, 2, 1, 'sdfsdf', '2019-12-20 08:17:29', 1),
(33, 2, 1, 'sdsasads', '2019-12-20 08:20:45', 1),
(34, 2, 1, 'kjlkjlk', '2019-12-20 08:22:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`) VALUES
(1, 'jyoti', 'jyoti@123'),
(2, 'shikha', 'shikha@123'),
(3, 'deepak', 'deepak@123');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 1, '2019-12-18 09:45:21', 'no'),
(2, 1, '2019-12-18 09:47:50', 'no'),
(3, 1, '2019-12-18 09:53:05', 'no'),
(4, 1, '2019-12-18 09:53:21', 'no'),
(5, 1, '2019-12-18 09:57:09', 'no'),
(6, 1, '2019-12-18 09:57:12', 'no'),
(7, 2, '2019-12-18 11:34:49', 'no'),
(8, 2, '2019-12-18 11:34:56', 'no'),
(9, 1, '2019-12-18 11:35:35', 'no'),
(10, 1, '2019-12-18 11:35:43', 'no'),
(11, 1, '2019-12-18 11:36:34', 'no'),
(12, 1, '2019-12-18 11:36:37', 'no'),
(13, 2, '2019-12-18 11:36:48', 'no'),
(14, 2, '2019-12-18 11:43:06', 'no'),
(15, 2, '2019-12-18 11:44:13', 'no'),
(16, 1, '2019-12-18 11:44:37', 'no'),
(17, 1, '2019-12-18 11:45:28', 'no'),
(18, 1, '2019-12-18 11:45:42', 'no'),
(19, 1, '2019-12-18 11:45:55', 'no'),
(20, 2, '2019-12-18 11:46:03', 'no'),
(21, 2, '2019-12-18 11:47:23', 'no'),
(22, 2, '2019-12-18 11:47:30', 'no'),
(23, 2, '2019-12-18 12:30:01', 'no'),
(24, 2, '2019-12-18 13:32:02', 'no'),
(25, 1, '2019-12-18 13:45:40', 'no'),
(26, 1, '2019-12-18 13:46:40', 'no'),
(27, 1, '2019-12-18 13:56:28', 'no'),
(28, 2, '2019-12-18 13:57:28', 'no'),
(29, 2, '2019-12-19 07:44:49', 'no'),
(30, 1, '2019-12-19 07:45:54', 'no'),
(31, 3, '2019-12-19 07:46:50', 'no'),
(32, 1, '2019-12-19 07:47:59', 'no'),
(33, 2, '2019-12-19 08:16:44', 'no'),
(34, 1, '2019-12-19 10:45:47', 'no'),
(35, 1, '2019-12-19 10:49:17', 'no'),
(36, 1, '2019-12-19 11:31:45', 'no'),
(37, 3, '2019-12-19 11:31:57', 'no'),
(38, 1, '2019-12-20 06:32:12', 'no'),
(39, 3, '2019-12-20 06:33:54', 'no'),
(40, 1, '2019-12-20 09:16:23', 'no'),
(41, 1, '2019-12-20 09:18:38', 'no'),
(42, 2, '2019-12-20 09:43:55', 'yes'),
(43, 1, '2019-12-20 10:00:28', 'yes'),
(44, 2, '2019-12-20 10:06:05', 'yes'),
(45, 1, '2019-12-20 11:07:32', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
