-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2017 at 06:23 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_devices`
--

CREATE TABLE `assigned_devices` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `assigned_date` datetime DEFAULT NULL,
  `device_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assigned_devices`
--

INSERT INTO `assigned_devices` (`id`, `emp_id`, `assigned_date`, `device_id`) VALUES
(1, 15, '2017-07-11 00:00:00', 16),
(2, 15, '2017-07-07 00:00:00', 18),
(3, 19, '2017-07-07 00:00:00', 16),
(4, 19, '2017-07-07 00:00:00', 17),
(5, 16, '2017-07-05 00:00:00', 15),
(6, 16, '2017-07-06 00:00:00', 17);

-- --------------------------------------------------------

--
-- Table structure for table `company_assets`
--

CREATE TABLE `company_assets` (
  `id` int(11) NOT NULL,
  `device_name` text COLLATE utf8_unicode_ci,
  `brand` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `device_type` text COLLATE utf8_unicode_ci,
  `device_assign` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company_assets`
--

INSERT INTO `company_assets` (`id`, `device_name`, `brand`, `quantity`, `device_type`, `device_assign`) VALUES
(15, 'Mouse', 'Dell', 40, 'Computer', '2017-06-01'),
(16, 'keyboard', 'Microsmart', 200, 'Computer', '2017-06-02'),
(17, 'Monitor', 'Samsung', 130, 'Computer', '2017-06-06'),
(18, 'Chair', 'brand', 150, 'Miscallaneous', '2017-06-10'),
(19, 'UPS', 'chinese', 100, 'electronics', '2017-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `fullname` text COLLATE utf8_unicode_ci,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` text COLLATE utf8_unicode_ci,
  `department` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `fullname`, `email`, `designation`, `department`, `status`) VALUES
(15, 'Rohan', 'abc@gmail.com', 'Designer', 'IS', 1),
(16, 'hari bdr thapa', 'hari@gmail.com', 'Designer', 'IS', 1),
(17, 'Dilip Kumar Shah', 'dilip@gmail.com', 'Developer', 'SDS', 1),
(19, 'HD malla', 'hd@gmail.com', 'PHP programmer', 'WEB', 1),
(20, 'Hari Kumar', 'hari@gmail.com', 'developer', 'software', 1),
(21, 'Ganesh Raj Sharma', 'sharma@gmail.com', 'Programmer', 'SDS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_devices`
--
ALTER TABLE `assigned_devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `company_assets`
--
ALTER TABLE `company_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_devices`
--
ALTER TABLE `assigned_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `company_assets`
--
ALTER TABLE `company_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_devices`
--
ALTER TABLE `assigned_devices`
  ADD CONSTRAINT `assigned_devices_ibfk_2` FOREIGN KEY (`device_id`) REFERENCES `company_assets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assigned_devices_ibfk_3` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
