-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 07:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unitybank`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donationID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `amount` bigint(20) NOT NULL,
  `donationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donationID`, `userID`, `email`, `amount`, `donationDate`) VALUES
(1, 2, 'dranoelflores@gmail.com', 5000, '2022-06-14 19:17:44'),
(2, 2, 'dranoel01802@gmail.com', 5000, '2022-06-14 19:17:54'),
(3, 2, 'dranoel.flores@gmail.com', 10000, '2022-06-14 19:22:15'),
(4, 3, 'bbm@unitybank.ph', 5000, '2022-06-15 01:52:20'),
(5, 3, 'bbm@unitybank.ph', 5000, '2022-06-15 02:38:59'),
(6, 3, 'bbm@unitybank.ph', 5000, '2022-06-15 11:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `paybills`
--

CREATE TABLE `paybills` (
  `referralID` int(11) NOT NULL,
  `transactionID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `paymentDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paybills`
--

INSERT INTO `paybills` (`referralID`, `transactionID`, `userID`, `company`, `amount`, `paymentDate`) VALUES
(1, 23, 3, 'Maynilad', 15000, '2022-06-14 16:00:00'),
(2, 23, 3, 'Robinson Grocery', 15000, '2022-06-14 16:00:00'),
(3, 47, 3, 'Robinson Grocery', 20000, '2022-06-14 16:00:00'),
(4, 52, 3, 'Maynilad', 5000, '2022-06-14 16:00:00'),
(5, 53, 3, 'Insurance', 50000, '2022-06-14 16:00:00'),
(6, 52, 3, 'Meralco', 5000, '2022-06-15 02:38:12'),
(7, 70, 3, 'Robinson Grocery', 1500, '2022-06-15 11:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `transactionDescription` varchar(255) DEFAULT NULL,
  `amount` bigint(20) DEFAULT 0,
  `transactionDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactionID`, `userID`, `transactionDescription`, `amount`, `transactionDate`) VALUES
(1, 1, 'Deposit Money', 5000, '2022-06-15 00:00:00'),
(2, 1, 'Transfer Money', 100000, '2022-06-15 00:00:00'),
(3, 2, 'Transfer Money', 50000, '2022-06-15 00:00:00'),
(4, 2, 'Donation', 5000, '2022-06-15 00:00:00'),
(5, 2, 'Donation', 5000, '2022-06-15 00:00:00'),
(6, 2, 'Deposit Money', 5000, '2022-06-15 00:00:00'),
(7, 2, 'Donation', 10000, '2022-06-15 00:00:00'),
(8, 3, 'Deposit Money', 5000, '2022-06-15 00:00:00'),
(14, 3, 'Transfer Money', 5000, '2022-06-15 00:00:00'),
(15, 3, 'Transfer Money', 5000, '2022-06-15 00:00:00'),
(16, 3, 'Deposit Money', 5000, '2022-06-15 00:00:00'),
(17, 3, 'Deposit Money', 4000, '2022-06-15 00:00:00'),
(18, 3, 'Deposit Money', 4000, '2022-06-15 00:00:00'),
(19, 3, 'Deposit Money', 4000, '2022-06-15 00:00:00'),
(20, 3, 'Deposit Money', 5000, '2022-06-15 00:00:00'),
(21, 3, 'Transfer Money', 9000, '2022-06-15 00:00:00'),
(22, 3, 'Deposit Money', 10000, '2022-06-15 00:00:00'),
(23, 3, 'Pay Bill', 15000, '2022-06-15 00:00:00'),
(47, 3, 'Pay Bill', 20000, '2022-06-15 00:00:00'),
(49, 3, 'Deposit Money', 200000, '2022-06-15 00:00:00'),
(50, 3, 'Transfer Money', 5000, '2022-06-15 00:00:00'),
(51, 3, 'Donation', 5000, '2022-06-15 00:00:00'),
(52, 3, 'Pay Bill', 5000, '2022-06-15 09:59:22'),
(53, 3, 'Pay Bill', 50000, '2022-06-15 10:00:48'),
(54, 3, 'Transfer Money', 5000, '2022-06-15 10:03:08'),
(55, 3, 'Update Profile', 0, '2022-06-15 10:05:07'),
(56, 3, 'Update Profile', 0, '2022-06-15 10:05:21'),
(57, 2, 'Update Profile', 0, '2022-06-15 10:05:54'),
(58, 2, 'Update Profile', 0, '2022-06-15 10:06:07'),
(59, 3, 'Update Profile', 0, '2022-06-15 10:37:10'),
(60, 3, 'Update Profile', 0, '2022-06-15 10:37:17'),
(61, 3, 'Transfer Money', 5000, '2022-06-15 10:37:29'),
(62, 3, 'Deposit Money', 5000, '2022-06-15 10:37:36'),
(63, 3, 'Pay Bill', 5000, '2022-06-15 10:38:12'),
(64, 3, 'Donation', 5000, '2022-06-15 16:38:59'),
(65, 3, 'Update Profile', 0, '2022-06-15 10:39:50'),
(66, 3, 'Update Profile', 0, '2022-06-15 10:41:03'),
(67, 3, 'Update Profile', 0, '2022-06-15 19:06:05'),
(68, 3, 'Transfer Money', 5000, '2022-06-15 19:13:03'),
(69, 3, 'Deposit Money', 5000, '2022-06-15 19:13:13'),
(70, 3, 'Pay Bill', 1500, '2022-06-15 19:13:25'),
(71, 3, 'Donation', 5000, '2022-06-16 01:13:34'),
(72, 3, 'Update Profile', 0, '2022-06-15 19:13:53'),
(73, 3, 'Update Profile', 0, '2022-06-15 19:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `fName` varchar(255) DEFAULT NULL,
  `lName` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `recoveryQuestion` varchar(255) NOT NULL,
  `recoveryAnswer` varchar(255) NOT NULL,
  `atmNumber` int(11) DEFAULT NULL,
  `balance` bigint(20) NOT NULL DEFAULT 203000000000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `fName`, `lName`, `address`, `email`, `password`, `recoveryQuestion`, `recoveryAnswer`, `atmNumber`, `balance`) VALUES
(2, 'Dranoel', 'Flores', 'PLM', 'drflores2020@plm.edu.ph', 'dran', 'What is your platform?', 'Unity', 202011324, 203000005000),
(3, 'Bongbong', 'Marcos Jr.', 'Malacañang Palace', 'bbm@unitybank.ph', 'bbm', 'What is your platform?', 'Unity', 203, 202999993500),
(4, 'Jaja', 'Caluya', 'Hawaii', 'jajacaluya@unitybank.ph', 'jaja', 'What is your platform?', 'Unity', 202010636, 203000000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donationID`);

--
-- Indexes for table `paybills`
--
ALTER TABLE `paybills`
  ADD PRIMARY KEY (`referralID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `paybills`
--
ALTER TABLE `paybills`
  MODIFY `referralID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
