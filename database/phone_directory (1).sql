-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2018 at 06:24 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phone_directory`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `c_id` int(20) NOT NULL,
  `u_id` int(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `c_email` varchar(40) DEFAULT NULL,
  `mobile` bigint(40) NOT NULL,
  `other_cell` bigint(30) DEFAULT NULL,
  `landline` bigint(30) DEFAULT NULL,
  `shared` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`c_id`, `u_id`, `fname`, `lname`, `c_email`, `mobile`, `other_cell`, `landline`, `shared`) VALUES
(1, 1, 'shoaib', 'ghaffar', NULL, 0, 0, 0, NULL),
(2, 5, 'nsf', 'dnfhh', NULL, 0, NULL, NULL, NULL),
(3, 5, 'sjfj', 'shgf', NULL, 0, 588, 48, NULL),
(4, 7, 'ZNXJHIVUFA', 'JNHDYGV', 'naud@gmail.com', 56896, 4578, 4587, NULL),
(5, 7, 'vgty', 'njhgy', '4587@gmail.com', 2568, 158, 58, NULL),
(6, 7, 'abc', 'shg', 'IQRA@gmail.com', 258, 158, 1548, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shared`
--

CREATE TABLE `shared` (
  `id` int(20) NOT NULL,
  `user` int(20) NOT NULL,
  `contact` int(20) NOT NULL,
  `share` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shared`
--

INSERT INTO `shared` (`id`, `user`, `contact`, `share`) VALUES
(4, 7, 4, 1),
(5, 7, 4, 3),
(6, 7, 4, 4),
(7, 7, 1, 1),
(8, 7, 3, 1),
(9, 7, 3, 3),
(10, 7, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `mobile` bigint(30) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `email`, `fname`, `lname`, `dob`, `mobile`, `password`) VALUES
(1, 'maryam25@gmail.com', 'matyam', ' ghaffar', '10/05/2018', 3404, '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'iqra@gmail.com', 'iqra', ' ghaffar', '10/05/2018', 248525685525, '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'maryamghaffar25@gmail.com', 'maryam', ' ghaffar', '10/06/2018', 3465758, '11222a0756cc9ff760155f9f28b61e0a'),
(4, 'maryamg25@gmail.com', 'maryam', ' ghaffar', '10/06/2018', 341458845, '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'palwasha25@gmail.com', 'maryam', ' ghaffar', '10/06/2018', 258477875, '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'wahab@gmail.com', 'wahab', ' ghaffar', '09/05/2018', 3005458542, '827ccb0eea8a706c4c34a16891f84e7b'),
(7, 'shiza@gmail.com', 'shiza', ' jsjfn', '06/09/2018', 1584516874854, '827ccb0eea8a706c4c34a16891f84e7b'),
(8, 'faiqa@gmail.com', 'faiqa', ' shafqat', '18/10/2018', 58484787854, '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `fname` (`fname`),
  ADD KEY `u_id` (`u_id`) USING BTREE;

--
-- Indexes for table `shared`
--
ALTER TABLE `shared`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `contact` (`contact`),
  ADD KEY `share` (`share`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `c_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `shared`
--
ALTER TABLE `shared`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `sign_up` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `shared`
--
ALTER TABLE `shared`
  ADD CONSTRAINT `shared_ibfk_1` FOREIGN KEY (`user`) REFERENCES `sign_up` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `shared_ibfk_2` FOREIGN KEY (`contact`) REFERENCES `contacts` (`c_id`),
  ADD CONSTRAINT `shared_ibfk_3` FOREIGN KEY (`share`) REFERENCES `contacts` (`c_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
