-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 07:56 AM
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
(1, 1, '2022-12-05', '11:00am', 'মোটর সাইকেল '),
(2, 2, '2022-12-05', '10:00am', 'হালকা গাড়ী '),
(3, 3, '2022-02-03', '1:00pm', 'ভারী গাড়ী ');

-- --------------------------------------------------------

--
-- Table structure for table `license_info`
--

CREATE TABLE `license_info` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `license_issue_date` varchar(50) DEFAULT NULL,
  `license_validity` varchar(100) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  `license_identity_number` varchar(100) NOT NULL,
  `license_type` int(11) NOT NULL,
  `license_token` varchar(20) NOT NULL,
  `delivered` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `license_info`
--

INSERT INTO `license_info` (`id`, `user_id`, `license_issue_date`, `license_validity`, `updated_at`, `license_identity_number`, `license_type`, `license_token`, `delivered`) VALUES
(1, '220115000004', '2022-01-17', '2021-01-9\r\n', '', '1220115000004', 1, '1220115000004', 0),
(2, '220116000006', '2022-01-17', '2022-05-09', '', '1220116000006', 1, '1220116000006', 0),
(3, '220115000003', '2022-01-17', '2022-05-09', '', '1220115000003', 1, '1220115000003', 0),
(4, '220121000007', '2022-01-21', '2022-01-21', '', '2220121000007', 2, '2220121000007', 0),
(5, '220121000008', '2022-01-23', '2027-01-22', '', '3220121000008', 3, '3220121000008', 1),
(6, '220123000009', '2022-01-23', '2032-01-21', '', '4220123000009', 4, '4220123000009', 1),
(7, '220115000004', '2022-01-27', '2027-01-29', '2022-01-30', '3220115000004', 3, '3220115000004', 1),
(8, '220207000001', '2022-02-07', '2027-02-06', '2022-02-07', '3220207000001', 3, '3220207000001', 1),
(9, '220208000002', '2022-02-07', '2022-05-31', '', '1220208000002', 1, '1220208000002', 0),
(10, '220208000002', '2022-02-08', '2027-02-07', '', '3220208000002', 3, '3220208000002', 0);

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

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`id`, `user_id`, `transaction_number`, `training_or_license`, `payment_for`, `amount`, `is_paid`, `is_assigned`, `license_given`, `date`, `month`, `year`) VALUES
(1, '220115000002', 'dddd', 1, '1', 6000, 0, 0, 0, '2022-01-15', '01', '2022'),
(2, '220115000003', '9898', 1, '1', 6000, 1, 1, 0, '2022-01-15', '01', '2022'),
(3, '220115000003', '9898', 2, '1', 345, 1, 1, 1, '2022-01-15', '01', '2022'),
(4, '220116000005', '0090', 1, '1', 6000, 1, 1, 0, '2022-01-16', '01', '2022'),
(5, '220116000005', '9999', 2, '4', 2542, 1, 1, 0, '2022-01-16', '01', '2022'),
(6, '220115000004', 'mnbn', 1, '2', 9000, 1, 1, 0, '2022-01-16', '01', '2022'),
(7, '220116000006', '8989', 1, '2', 9000, 1, 1, 0, '2022-01-16', '01', '2022'),
(8, '220115000004', '8989', 2, '1', 345, 1, 1, 1, '2022-01-17', '01', '2022'),
(9, '220116000006', '0090', 2, '1', 345, 1, 1, 1, '2022-01-17', '01', '2022'),
(10, '220116000006', '9898', 1, '3', 3500, 1, 1, 0, '2022-01-17', '01', '2022'),
(11, '220121000007', '0090', 1, '2', 9000, 1, 1, 0, '2022-01-21', '01', '2022'),
(12, '220121000007', '0090', 2, '2', 518, 1, 1, 1, '2022-01-21', '01', '2022'),
(13, '220115000004', '0090', 2, '3', 1680, 1, 1, 1, '2022-01-21', '01', '2022'),
(14, '220121000008', '9898', 1, '2', 9000, 1, 1, 0, '2022-01-21', '01', '2022'),
(15, '220121000008', '9898', 2, '1', 345, 1, 0, 0, '2022-01-21', '01', '2022'),
(16, '220121000008', '0090', 2, '4', 2542, 1, 1, 0, '2022-01-22', '01', '2022'),
(17, '220121000007', '9999', 2, '5', 1565, 1, 1, 1, '2022-01-23', '01', '2022'),
(18, '220121000008', '9999', 2, '3', 1680, 1, 1, 1, '2022-01-23', '01', '2022'),
(19, '220121000008', '9999', 2, '1', 345, 1, 1, 0, '2022-01-23', '01', '2022'),
(20, '220123000009', '9999', 1, '3', 3500, 1, 1, 0, '2022-01-23', '01', '2022'),
(21, '220123000009', '9999', 2, '4', 2542, 1, 1, 1, '2022-01-23', '01', '2022'),
(22, '220115000004', 'mnbn', 2, '3', 1680, 1, 1, 1, '2022-01-27', '01', '2022'),
(23, '220115000004', 'mnbn', 2, '5', 1565, 1, 1, 1, '2022-01-27', '01', '2022'),
(24, '220115000004', '8989', 2, '5', 1565, 1, 1, 1, '2022-01-30', '01', '2022'),
(25, '220115000004', '9999', 2, '5', 1565, 1, 1, 0, '2022-01-30', '01', '2022'),
(26, '220115000004', '9999', 2, '5', 1565, 1, 1, 0, '2022-01-30', '01', '2022'),
(27, '220207000001', 'abcd123', 1, '1', 6000, 1, 1, 0, '2022-02-07', '02', '2022'),
(28, '220207000001', '21324', 2, '3', 1680, 1, 1, 1, '2022-02-07', '02', '2022'),
(29, '220207000001', 'dfaf45', 2, '5', 1565, 1, 0, 1, '2022-02-07', '02', '2022'),
(30, '220208000002', '0090', 2, '1', 345, 1, 1, 1, '2022-02-08', '02', '2022'),
(31, '220208000002', '8989', 2, '3', 1680, 1, 1, 1, '2022-02-08', '02', '2022'),
(32, '220208000002', '9898', 2, '3', 1680, 1, 0, 1, '2022-02-08', '02', '2022');

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

--
-- Dumping data for table `training_info`
--

INSERT INTO `training_info` (`id`, `user_id`, `batch_no`, `training_done`) VALUES
(1, '220115000003', 1, 0),
(2, '220116000005', 1, 0),
(3, '220115000004', 2, 1),
(4, '220116000006', 2, 1),
(5, '220116000006', 3, 1),
(6, '220121000007', 2, 1),
(7, '220121000008', 2, 1),
(8, '220123000009', 3, 1),
(9, '220207000001', 1, 1);

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
(1, '6:00am, 8:00am', 'Mon, Wed', 1, 1),
(2, '7:00am, 8:00am', 'Mon, Wed', 1, 2),
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

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `father_name`, `mother_name`, `date_of_birth`, `email`, `nid`, `date_of_registration`, `phone_number`, `present_address`, `premanent_address`, `sex`, `user_type`, `user_id`, `month`, `year`) VALUES
(1, 'ADMINISTRATOR', 'FATHER OF ADMIN', 'MOTHER OF ADMIN', '2022-01-14', 'administrator@bodla.com', '0000011111100', '2022-01-14', '01714789654', 'SERVER', 'SERVER', 'others', 'User', '220114000001', 1, '2022'),
(2, 'IBLISH', 'AZRAIL', 'DAINI', '0444-03-31', 'jgjgjjj@gmail.com', 'JMBMBM', '2022-01-15', 'HJJJJJJJJ', 'CTG', 'NOAKHALI', 'male', 'User', '220115000002', 1, '2022'),
(3, 'SAIMON ISLAM', 'NURUL HUDA', 'SABERA BEGOM', '2022-01-15', 'saimonislam0123@gmail.com', '1919', '2022-01-15', '07623531119', 'PATENGA', 'SAME', 'female', 'User', '220115000003', 1, '2022'),
(4, 'SAYEDA RAHNUMA   AKTHAR', 'SAYED RAFIQUE AHMED ', 'KAZI FEROZAAKTHAR', '2022-01-15', 'tasmu997@gmail.com', '7979', '2022-09-05', '01681078714', 'ANDERKILLA', 'SAME', 'female', 'User', '220115000004', 1, '2022'),
(5, 'ISTIAQUE', 'SAYED RAFIQUE AHMED ', 'KAZI FEROZA AKTHAR', '1996-04-05', 'istiakopu.chy@gmail.com', '2727', '2022-01-16', '07623531119', 'PATENGA', 'SAME', 'male', 'User', '220116000005', 1, '2022'),
(6, 'SAMIA SULTANA', 'S M MOSTAFA KAMAL', 'SHAMIM AKTER', '1998-01-06', 'samiasultana147@gmail.com', '89765', '2022-01-16', '01829382437', 'BAHADDARHAT', 'HATHAZARI', 'female', 'User', '220116000006', 1, '2022'),
(7, 'MOIN  KHAN', 'NURUL AMIN', 'UMME HANI', '1997-10-12', 'moinkhan2580@gmail.com', '8797979', '2022-01-21', '07623531119', 'ANDERKILLA', 'SAME', 'male', 'User', '220121000007', 1, '2022'),
(8, 'TASMU ', 'SAYED RAFIQUE AHMED ', 'KAZI FEROZA AKTHAR', '2022-01-21', 'tasmu998@gmail.com', 'LKLK;', '2027-01-22', '01681078714', 'ANDERKILLA', 'SAME', 'female', 'User', '220121000008', 1, '2022'),
(9, 'XZS', 'ZXCZ', 'ZCZ', '1998-12-03', 'aa@gmail.com', '7978HGg', '2032-01-21', '01681078714', 'XZCXCc', 'ZXCZAA', 'female', 'User', '220123000009', 1, '2022'),
(10, 'SAMIA SULTANA', 'S. M. MOSTAFA KAMAL', 'SHAMIM AKTER', '1998-01-06', 'sam17202132@gmail.com', '2132', '2022-02-07', '01829382437', 'BAHADDARHAT, CHITTAGONG', 'HATHAZARI, CHITTAGONG', 'female', 'User', '220207000001', 2, '2022'),
(11, 'N,N,', ',N,NL', 'NNNNN', '1997-12-07', 'aaaa@gmail.com', '6767', '2022-02-08', '01681078714', 'ANDERKILLA', 'HATHAZARI', 'female', 'User', '220208000002', 2, '2022');

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

--
-- Dumping data for table `user_exam_schedule`
--

INSERT INTO `user_exam_schedule` (`id`, `user_id`, `exam_name`, `exam_date`, `exam_shift`) VALUES
(1, '220116000005', 'মোটর সাইকেল ', '2022-01-13', '10:00am'),
(2, '220116000005', 'হালকা গাড়ী ', '2022-02-17', '1:00pm'),
(6, '220121000008', 'মোটর সাইকেল ', '2022-12-25', '10:00am'),
(7, '220121000008', 'হালকা গাড়ী ', '2022-12-02', '10:00am'),
(8, '220121000008', 'মোটর সাইকেল ', '2022-12-25', '10:00am'),
(9, '220121000008', 'হালকা গাড়ী ', '2022-12-02', '10:00am'),
(10, '220121000008', 'ভারী গাড়ী ', '2022-06-12', '11:00am'),
(11, '220123000009', 'মোটর সাইকেল ', '2022-12-25', '10:00am'),
(12, '220123000009', 'হালকা গাড়ী ', '2022-12-02', '10:00am'),
(19, '220115000004', 'মোটর সাইকেল ', '2022-12-25', '10:00am'),
(20, '220115000004', 'হালকা গাড়ী ', '2022-12-02', '10:00am'),
(21, '220115000004', 'ভারী গাড়ী ', '2022-02-03', '1:00pm'),
(22, '220207000001', 'মোটর সাইকেল ', '2022-12-25', '10:00am'),
(23, '220207000001', 'হালকা গাড়ী ', '2022-12-02', '10:00am'),
(24, '220207000001', 'ভারী গাড়ী ', '2022-02-03', '1:00pm'),
(25, '220208000002', 'মোটর সাইকেল ', '2022-12-05', '11:00am'),
(26, '220208000002', 'হালকা গাড়ী ', '2022-12-05', '10:00am'),
(27, '220208000002', 'ভারী গাড়ী ', '2022-02-03', '1:00pm');

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
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `email`, `password`, `user_type`) VALUES
(1, 'administrator@bodla.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin'),
(2, 'jgjgjjj@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'User'),
(3, 'saimonislam0123@gmail.com', '6a3176aa70a1f76efd23644d772f331c', 'User'),
(4, 'tasmu997@gmail.com', '6a3176aa70a1f76efd23644d772f331c', 'User'),
(5, 'istiakopu.chy@gmail.com', '6a3176aa70a1f76efd23644d772f331c', 'User'),
(6, 'samiasultana147@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(7, 'moinkhan2580@gmail.com', '6a3176aa70a1f76efd23644d772f331c', 'User'),
(8, 'tasmu998@gmail.com', '6a3176aa70a1f76efd23644d772f331c', 'User'),
(9, 'aa@gmail.com', '6a3176aa70a1f76efd23644d772f331c', 'User'),
(10, 'sam17202132@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'User'),
(11, 'aaaa@gmail.com', '6a3176aa70a1f76efd23644d772f331c', 'User');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `training_info`
--
ALTER TABLE `training_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `training_schedule`
--
ALTER TABLE `training_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_exam_schedule`
--
ALTER TABLE `user_exam_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
