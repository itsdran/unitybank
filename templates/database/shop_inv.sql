-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 01:19 PM
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
-- Database: `shop_inv`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `fullName`, `email`, `mobile`, `address`, `status`, `createdOn`) VALUES
(43, 'Dranoel Rubio Flores', 'drf2020@plm.edu.ph', 202011324, 'PLM', 'Active', '2022-06-18 11:01:06'),
(44, 's', 's@plm.edu.ph', 0, 's', 'Active', '2022-06-18 11:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `productID` int(11) NOT NULL,
  `itemNumber` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `discount` float NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 0,
  `unitPrice` float NOT NULL DEFAULT 0,
  `imageURL` varchar(255) NOT NULL DEFAULT 'imageNotAvailable.jpg',
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`productID`, `itemNumber`, `itemName`, `discount`, `stock`, `unitPrice`, `imageURL`, `status`, `description`) VALUES
(35, '2', 'School Bag', 0, 5, 500, '1525681111_661539.png', 'Active', ''),
(36, '3', 'Office Bag', 0, 5, 1300, '1525709924_office bag.jpg', '', 'HI PLEASE LANG'),
(37, '4', 'Leather Bag', 2, 6, 3409, '1525710010_leather bag.jpg', 'Active', ''),
(38, '5', 'Travel Bag', 2, 17, 1200, '1525706032_travel bag.jpg', 'Active', ''),
(43, '10', 'Sports Bag', 1, 92, 1000, '1525756289_sports bag.jpg', 'Active', ''),
(57, '16', 'DAIWUd', 0, 1, 444, 'imageNotAvailable.jpg', 'Active', 'adawd'),
(58, '123141', 'adwdaw', 0, 2, 444, '1654450687_luf.jpg', 'Active', 'awdawdawdq2'),
(59, '1584844848', 'SSSSSSSSSSS', 100, 100, 100, 'imageNotAvailable.jpg', 'Active', 'dawdawdaw'),
(60, '123', 'Sample Lang Please Lang', 12, 123, 123, 'imageNotAvailable.jpg', 'Active', '123'),
(62, '87777777777', 'Sampe', 10, 100, 150, 'imageNotAvailable.jpg', 'Active', 'sa'),
(63, '1238987498798', 'Samdowaugd', 10, 100, 1000, 'imageNotAvailable.jpg', 'Active', 'awduagwdyaw'),
(64, '78', 'S', 10, 100, 150, 'imageNotAvailable.jpg', 'Active', 'a'),
(65, '999', 'sa', 10, 100, 150, 'imageNotAvailable.jpg', 'Active', 'sadad'),
(66, '983', 'ooo', 10, 100, 150, 'imageNotAvailable.jpg', 'Active', 'hu'),
(67, '987787', 'K', 10, 150, 1500, 'imageNotAvailable.jpg', 'Active', 'k'),
(68, '696969', 'sadwadawd', 10, 100, 150, 'imageNotAvailable.jpg', 'Active', 'awdawdawdawd'),
(69, '123454894984', 'Drnaoelawd', 10, 200, 500, 'imageNotAvailable.jpg', 'Active', 'awdawdawdawdawd');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseID` int(11) NOT NULL,
  `itemNumber` varchar(255) NOT NULL,
  `purchaseDate` date NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `unitPrice` float NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `vendorName` varchar(255) NOT NULL DEFAULT 'Test Vendor',
  `vendorID` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseID`, `itemNumber`, `purchaseDate`, `itemName`, `unitPrice`, `quantity`, `vendorName`, `vendorID`) VALUES
(39, '1', '2018-05-24', 'First Bag', 0, 15, '', 3),
(40, '2', '2018-05-18', 'First Bag', 2341, 2, 'Louise Vitton Bag', 4),
(41, '4', '2018-05-07', 'Leather Bag', 1234, 3, 'Johnson and Johnsons Co.', 3),
(42, '1', '2018-05-24', 'First Bag', 345, 12, 'Louise Vitton Bag', 4),
(44, '5', '2018-05-16', 'Travel Bag', 3000, 2, 'ABC Company', 1),
(45, '5', '2022-06-18', 'Travel Bag', 1500, 10, 'Dran the Vendor', 2),
(48, '1', '2022-06-18', 'Handbag Prom', 98989, 2, 'Dran the Vendor', 1),
(52, '1', '2018-05-21', 'First Bag', 1235, 2, 'Sample Vendor 222', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `saleID` int(11) NOT NULL,
  `itemNumber` varchar(255) NOT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `saleDate` date NOT NULL,
  `discount` float NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `unitPrice` float(10,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`saleID`, `itemNumber`, `customerID`, `customerName`, `itemName`, `saleDate`, `discount`, `quantity`, `unitPrice`) VALUES
(1, '3', 4, 'Drannn', 'Item Dran', '2020-03-14', 2.75, 170, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `stockprovider`
--

CREATE TABLE `stockprovider` (
  `sProviderID` int(11) NOT NULL,
  `vendorName` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `phone2` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `companyName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockprovider`
--

INSERT INTO `stockprovider` (`sProviderID`, `vendorName`, `email`, `mobile`, `phone2`, `address`, `status`, `createdOn`, `companyName`) VALUES
(1, 'ABC Company', '', 2343567, NULL, '80, Ground Floor, ABC Shopping Complex', 'Active', '2018-05-05 05:48:44', 'ABC Company'),
(2, 'Sample Vendor 222', 'sample@volvo.com', 99828282, NULL, '123, A Road, B avenue', 'Disabled', '2018-05-05 06:12:02', 'Johnson and Johnsons Co.'),
(4, 'Louise Vitton Bag', 'vitton@vitton.usa.com', 323234938, NULL, '45, Palmer Valley, 5th Crossing', 'Active', '2018-05-05 06:29:41', 'Test Vendor'),
(6, 'Test Vendor mo', 'test@vendor.com', 8888888, NULL, 'Test address a', 'Active', '2018-05-05 06:53:14', 'New Bags Exporters HI'),
(7, 'dawdawd', 'drflores2020@plm.edu.ph', 2147483647, NULL, 'PLM', 'Active', '2018-05-15 10:36:54', 'DRAN'),
(8, 'New Bags Exporters', '', 191938930, NULL, '123, A Road, B avenue, ', 'Active', '2018-05-16 12:36:53', ''),
(9, 'A', 'a@gmail.com', 999995, NULL, 'manila', 'Active', '2020-07-30 11:40:25', ''),
(10, 'awdawdawd', 'dranoel@plm.edu.ph', 0, NULL, 'Sample', 'Active', '2022-06-13 14:47:23', 'dawiduaw'),
(11, 'dawdawdawdaw', 'dranoel@gmail.com', 0, NULL, 'awdawdawd', 'Active', '2022-06-13 14:48:41', 'dawdawdawdaw');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fullName`, `username`, `password`, `status`) VALUES
(5, 'Guest', 'guest', '81dc9bdb52d04dc20036dbd8313ed055', 'Active'),
(6, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'Active'),
(7, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`saleID`);

--
-- Indexes for table `stockprovider`
--
ALTER TABLE `stockprovider`
  ADD PRIMARY KEY (`sProviderID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `saleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stockprovider`
--
ALTER TABLE `stockprovider`
  MODIFY `sProviderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
