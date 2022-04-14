-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 07:03 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brta_online_licensing`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_type`
--

CREATE TABLE `application_type` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `need_training` int(11) NOT NULL,
  `training_type` varchar(50) NOT NULL,
  `new_license` int(11) NOT NULL,
  `license_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `passed` int(11) NOT NULL,
  `license_generated` int(11) NOT NULL,
  `failed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE `exam_schedule` (
  `id` int(11) NOT NULL,
  `applied_batch` int(11) NOT NULL,
  `exam_date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`id`, `applied_batch`, `exam_date`, `shift`, `name`) VALUES
(1, 1, '2022-01-13', '10:00am', 'মোটর সাইকেল '),
(2, 2, '2022-02-17', '1:00pm', 'হালকা গাড়ী '),
(3, 3, '2022-07-20', '9:00am', 'ভারী গাড়ী ');

-- --------------------------------------------------------

--
-- Table structure for table `license_info`
--

CREATE TABLE `license_info` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `license_issue_date` varchar(50) DEFAULT NULL,
  `license_validity` varchar(100) NOT NULL,
  `license_identity_number` varchar(100) NOT NULL,
  `license_type` int(11) NOT NULL,
  `license_token` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `master_license`
--

CREATE TABLE `master_license` (
  `id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  `license_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_license`
--

INSERT INTO `master_license` (`id`, `license_id`, `license_name`) VALUES
(1, 1, 'লার্নার ড্রাইভিং লাইসেন্স (এক) ক্যাটাগরি'),
(2, 2, 'লার্নার ড্রাইভিং লাইসেন্স (দুই) ক্যাটাগরি'),
(3, 3, 'স্মার্ট কার্ড ড্রাইভিং লাইসেন্স - পেশাদার'),
(4, 4, 'স্মার্ট কার্ড ড্রাইভিং লাইসেন্স - অপেশাদার'),
(5, 5, 'ড্রাইভিং লাইসেন্স নবায়ন ফী: পেশাদার'),
(6, 6, 'ড্রাইভিং লাইসেন্স নবায়ন ফী: অপেশাদার');

-- --------------------------------------------------------

--
-- Table structure for table `master_training`
--

CREATE TABLE `master_training` (
  `id` int(11) NOT NULL,
  `training_id` int(11) NOT NULL,
  `training_name` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_training`
--

INSERT INTO `master_training` (`id`, `training_id`, `training_name`) VALUES
(1, 1, 'বেসিক ড্রাইভিং (হালকা গাড়ী)'),
(2, 2, 'বেসিক ড্রাইভিং (ভারী গাড়ী)'),
(3, 3, 'আপগ্রেডিং (হালকা)'),
(4, 4, 'আপগ্রেডিং (ভারী)'),
(5, 5, 'মোটর সাইকেল'),
(6, 6, 'ওরিয়েন্টেশন (দক্ষতা আইনে প্রশিক্ষণ প্রাপ্ত চালকদের জন্য প্রযোজ্য)');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `transaction_number` varchar(100) NOT NULL,
  `training_or_license` int(11) NOT NULL,
  `payment_for` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `is_paid` int(11) NOT NULL,
  `is_assigned` int(11) NOT NULL,
  `license_given` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `training_info`
--

CREATE TABLE `training_info` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `batch_no` int(11) NOT NULL,
  `training_done` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `training_schedule`
--

CREATE TABLE `training_schedule` (
  `id` int(11) NOT NULL,
  `training_shift` varchar(20) NOT NULL,
  `training_days` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `batch_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `training_schedule`
--

INSERT INTO `training_schedule` (`id`, `training_shift`, `training_days`, `is_active`, `batch_no`) VALUES
(1, '5:00am, 5:00am', 'Sun, Tue', 1, 1),
(2, '5:00am, 5:00am', 'Sun, Tue', 1, 2),
(3, '5:00am, 5:00am', 'Sun, Tue', 1, 3),
(4, '5:00am, 5:00am', 'Sun, Tue', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `date_of_birth` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nid` varchar(25) NOT NULL,
  `date_of_registration` date NOT NULL DEFAULT current_timestamp(),
  `phone_number` varchar(20) NOT NULL,
  `present_address` varchar(250) NOT NULL,
  `premanent_address` varchar(250) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `month` int(11) NOT NULL,
  `year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `user_exam_schedule`
--

CREATE TABLE `user_exam_schedule` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `exam_date` varchar(50) NOT NULL,
  `exam_shift` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_type`
--
ALTER TABLE `application_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `license_info`
--
ALTER TABLE `license_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_license`
--
ALTER TABLE `master_license`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_training`
--
ALTER TABLE `master_training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_info`
--
ALTER TABLE `training_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_schedule`
--
ALTER TABLE `training_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_exam_schedule`
--
ALTER TABLE `user_exam_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_type`
--
ALTER TABLE `application_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_result`
--
ALTER TABLE `exam_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `license_info`
--
ALTER TABLE `license_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_license`
--
ALTER TABLE `master_license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `master_training`
--
ALTER TABLE `master_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_info`
--
ALTER TABLE `training_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_schedule`
--
ALTER TABLE `training_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_exam_schedule`
--
ALTER TABLE `user_exam_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
