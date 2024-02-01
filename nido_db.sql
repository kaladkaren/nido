-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 03:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nido_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `role` int(15) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `fname`, `mname`, `lname`, `role`, `active`, `created_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$7vEKxnGJysPnR2KB/tPlzO5E4f6pQ2fu1GZe717xPvpRldDN.kSR2', 'Karen Joy', '', 'Morales', 1, 1, '2024-01-21 21:13:16'),
(2, 'ambassador1@gmail.com', '$2y$10$S5RCbD9E05z4QNayhJMBf./9wwTtlkWf2gSRFe68G2HDA1Q5/a2p2', 'Ambassador', '', 'One', 2, 1, '2024-01-24 22:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_children_ages`
--

CREATE TABLE `tbl_children_ages` (
  `id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `children_age` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_children_ages`
--

INSERT INTO `tbl_children_ages` (`id`, `registration_id`, `children_age`, `created_at`) VALUES
(1, 10, '5', '2024-02-01 20:27:59'),
(2, 11, '3', '2024-02-01 20:27:59'),
(3, 11, '4', '2024-02-01 20:28:00'),
(4, 11, '5', '2024-02-01 20:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `contact_num` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `birthday` date NOT NULL,
  `relationship` int(11) NOT NULL COMMENT '1 - parent, 2 - guardian',
  `number_of_children` int(11) NOT NULL,
  `current_brand_milk` varchar(200) NOT NULL,
  `signature` text NOT NULL COMMENT 'filepath',
  `ambassador_id` int(11) NOT NULL,
  `registration_etimestamp` datetime NOT NULL,
  `upload_etimestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`id`, `fname`, `lname`, `contact_num`, `email`, `birthday`, `relationship`, `number_of_children`, `current_brand_milk`, `signature`, `ambassador_id`, `registration_etimestamp`, `upload_etimestamp`) VALUES
(1, 'miguel', 'valencia', '090654852154', 'miguel@gmail.com', '1998-12-14', 1, 2, 'bonakid', '1706456518_arrow_blue.PNG', 0, '2024-01-20 20:43:02', '2024-01-28 23:41:58'),
(2, 'adrian', 'carlos', '09052145874', 'adrian@gmail.com', '1990-10-20', 2, 5, 'nido', '1706456518_Capture.PNG', 0, '2024-01-21 20:43:02', '2024-01-28 23:41:58'),
(3, 'miguel', 'valencia', '090654852154', 'miguel@gmail.com', '1998-12-14', 1, 2, 'bonakid', '1706789532_arrow_blue.PNG', 0, '2024-01-20 20:43:02', '2024-02-01 20:12:12'),
(4, 'adrian', 'carlos', '09052145874', 'adrian@gmail.com', '1990-10-20', 2, 5, 'nido', '1706789532_Capture.PNG', 0, '2024-01-21 20:43:02', '2024-02-01 20:12:13'),
(5, 'miguel', 'valencia', '090654852154', 'miguel@gmail.com', '1998-12-14', 1, 2, 'bonakid', '1706789561_arrow_blue.PNG', 0, '2024-01-20 20:43:02', '2024-02-01 20:12:41'),
(6, 'adrian', 'carlos', '09052145874', 'adrian@gmail.com', '1990-10-20', 2, 5, 'nido', '1706789561_Capture.PNG', 0, '2024-01-21 20:43:02', '2024-02-01 20:12:41'),
(7, 'miguel', 'valencia', '090654852154', 'miguel@gmail.com', '1998-12-14', 1, 2, 'bonakid', '1706789937_arrow_blue.PNG', 0, '2024-01-20 20:43:02', '2024-02-01 20:18:57'),
(8, 'adrian', 'carlos', '09052145874', 'adrian@gmail.com', '1990-10-20', 2, 5, 'nido', '1706789937_Capture.PNG', 0, '2024-01-21 20:43:02', '2024-02-01 20:18:57'),
(9, 'miguel', 'valencia', '090654852154', 'miguel@gmail.com', '1998-12-14', 1, 2, 'bonakid', '1706790436_arrow_blue.PNG', 2, '2024-01-20 20:43:02', '2024-02-01 20:27:16'),
(10, 'miguel', 'valencia', '090654852154', 'miguel@gmail.com', '1998-12-14', 1, 2, 'bonakid', '1706790479_arrow_blue.PNG', 2, '2024-01-20 20:43:02', '2024-02-01 20:27:59'),
(11, 'adrian', 'carlos', '09052145874', 'adrian@gmail.com', '1990-10-20', 2, 5, 'nido', '1706790479_Capture.PNG', 2, '2024-01-21 20:43:02', '2024-02-01 20:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role`, `created_at`) VALUES
(1, 'Administrator', '2024-01-24 21:43:06'),
(2, 'Ambassador', '2024-01-24 21:43:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Indexes for table `tbl_children_ages`
--
ALTER TABLE `tbl_children_ages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_children_ages`
--
ALTER TABLE `tbl_children_ages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
