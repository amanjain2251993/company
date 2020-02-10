-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 03:37 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` bigint(20) NOT NULL,
  `user_id` binary(16) NOT NULL,
  `title` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_date` int(11) NOT NULL,
  `created_by` binary(16) NOT NULL,
  `modified_date` int(11) NOT NULL,
  `modified_by` binary(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `user_id`, `title`, `email`, `website`, `address`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(3, 0x37383735303862653462666231316561, 'aman', 'amanjain@gmail.com', 'saglus.com', 'kota', 1581343214, 0x37383735303862653462666231316561, 1581344951, 0x37383735303862653462666231316561),
(4, 0x37383735303862653462666231316561, 'abcd', 'amanjain@gmail.fe', 'saglus.com', 'fdfd', 1581343361, 0x37383735303862653462666231316561, 1581343361, 0x37383735303862653462666231316561);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `user_id` binary(16) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `jobtype` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verify_link` int(11) NOT NULL,
  `forget_pass_code` varchar(255) DEFAULT NULL,
  `forget_pass_exptime` varchar(255) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `user_id`, `name`, `address`, `mobile_no`, `jobtype`, `password`, `email`, `verify_link`, `forget_pass_code`, `forget_pass_exptime`, `verification_code`, `status`, `created`, `modified`) VALUES
(1, 0x37383735303862653462666231316561, 'aman', '', 2147483647, 'designer', 'e10adc3949ba59abbe56e057f20f883e', 'ab@gmail.com', 2147483647, NULL, '', '', 1, 1581335401, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
