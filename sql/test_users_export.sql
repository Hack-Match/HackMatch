-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2020 at 12:43 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara1`
--

-- --------------------------------------------------------

--
-- Table structure for table `test_users`
--

CREATE TABLE `test_users` (
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `user_type` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `q_id` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `time_added` text DEFAULT NULL,
  `looking_for` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_users`
--

INSERT INTO `test_users` (`first_name`, `last_name`, `user_type`, `gender`, `skills`, `q_id`, `id`, `about`, `time_added`, `looking_for`) VALUES
('hii', NULL, 'real user', NULL, 'C, PHP, HTML, Math, Data Science, etc', NULL, 265, NULL, '5/26/2020 2:30', NULL),
('hii', NULL, 'real user', NULL, 'C, PHP', 0, 274, 'todo', '5/26/2020 7:08', 'mentee true, openSource true, other ,'),
('hii', NULL, 'real user', NULL, 'apache, excel, math, visual basic, data, python', 0, 275, 'todo', '5/26/2020 7:09', 'mentee true, openSource true, other ,'),
('hii world', NULL, 'real user', NULL, 'C, PHP', 0, 276, 'todo', '5/26/2020 18:40', 'openSource true, other ,'),
('hii', NULL, 'real user', NULL, 'C, PHP', 0, 285, 'todo', '5/27/2020 21:13', 'coding true, mentee true, other ,'),
('hii world', NULL, 'real user', NULL, 'C, PHP', 0, 286, 'todo', '5/27/2020 21:14', 'coding true, mentee true, other ,'),
('julius yooo', NULL, 'real user', NULL, 'C, PHP', 0, 287, 'todo', '5/27/2020 21:16', 'coding true, mentee true, other ,'),
('hii world j', NULL, 'real user', NULL, 'C, PHP', 0, 288, 'todo', '5/27/2020 21:20', 'coding true, mentee true, other ,'),
('julius', NULL, 'real user', NULL, 'php, html, sql', NULL, 311, NULL, '6/1/2020 19:06', 'account true, coding true, mentee true, other ,'),
('julius', NULL, 'real user', NULL, 'math, css, javascript, python', NULL, 316, 'todo', '6/1/2020 19:49', 'coding true, openSource true, other ,'),
('julius', NULL, 'real user', NULL, 'C, PHP, HTML, Math', NULL, 317, 'todo', '6/1/2020 19:52', 'mentee true, openSource true, contributors true, other ,'),
('augustus', NULL, 'real user', NULL, 'python', NULL, 319, 'todo', '6/1/2020 20:37', 'mentee true, openSource true, other ,'),
('julius', NULL, 'real user', NULL, 'php, math, sql, logic', NULL, 320, 'todo', '6/2/2020 21:01', 'account true, coding true, mentee true, openSource true, contributors true, other ,'),
('julius', NULL, 'real user', NULL, 'c, php, logic, math, html', NULL, 321, 'todo', '6/3/2020 18:17', 'account true, coding true, mentor true, mentee true, openSource true, contributors true, other ,'),
('julius one', NULL, 'real user', NULL, 'logic', NULL, 324, 'todo', '6/3/2020 20:03', 'account true, contributors true, other ,'),
('augustus', NULL, 'real user', NULL, 'python, php', NULL, 328, 'todo', '6/9/2020 6:13', 'mentor true, openSource true, contributors true, other ,'),
('hii world', NULL, 'real user', NULL, 'apache, excel, math, visual basic, data, python', NULL, 331, 'todo', '7/2/2020 21:07', 'account true, mentee true, openSource true,'),
('julius', NULL, 'real user', NULL, 'python, html', NULL, 334, 'todo', '7/6/2020 7:54', 'account true, coding true, mentee true, other ,'),
('Cris', NULL, 'real user', NULL, 'python, data science', NULL, 339, 'todo', '7/14/2020 17:40', 'mentor true, other ,');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
