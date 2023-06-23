-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2023 at 03:42 PM
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
-- Database: `class_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `english_table`
--

CREATE TABLE `english_table` (
  `id` int NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `english_table`
--

INSERT INTO `english_table` (`id`, `user_id`, `fullname`) VALUES
(1, '2', 'emma ezeh'),
(2, '3', 'Afam'),
(3, '4', 'hannah'),
(4, '5', 'Afam'),
(5, '6', 'hannah'),
(6, '7', 'hannah'),
(7, '8', 'hannah');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `course`) VALUES
(1, 'akachukwu', 'Data Structure'),
(2, 'Ozoude Amarachi Edit', 'maths');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `reg_no` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `reg_no`) VALUES
(1, 'mama', 'c10/021/9090'),
(2, 'emma ezeh', 'co7/021/2247'),
(3, 'Afam', 'ben10'),
(4, 'hannah', 'cit20'),
(5, 'Afam', 'ben10'),
(6, 'hannah', 'cit20'),
(7, 'hannah', 'ben10'),
(8, 'hannah', 'ben10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `english_table`
--
ALTER TABLE `english_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `english_table`
--
ALTER TABLE `english_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
