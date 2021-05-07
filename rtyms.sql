-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 05:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtyms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminUsername` varchar(11) NOT NULL,
  `adminPassword` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminUsername`, `adminPassword`) VALUES
(1, 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `customerName` varchar(100) NOT NULL,
  `customerAddress` varchar(100) NOT NULL,
  `customerEmail` varchar(100) NOT NULL,
  `customerPhone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerName`, `customerAddress`, `customerEmail`, `customerPhone`) VALUES
(1, 'Ahmidah', 'UMP, Pekan', 'falah@rta', '012-1234567'),
(2, 'Syahier', 'UMP, Gambang', 'a@a', '011-1234567'),
(3, 'Mahesh', 'Taman Tas, Kuantan', 'a@a', '013-1234567'),
(4, 'Saimah', 'Ump, Gambang', 'ikea@inov', '0121234567');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(11) NOT NULL,
  `servProvID` int(11) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `itemPrice` float NOT NULL,
  `itemType` varchar(20) NOT NULL,
  `itemDesc` varchar(300) NOT NULL,
  `itemQty` int(100) NOT NULL,
  `image` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `servProvID`, `itemName`, `itemPrice`, `itemType`, `itemDesc`, `itemQty`, `image`) VALUES
(1, 1, 'Dermatix', 89.99, 'Medical', ' Ubat Sakit Tekak', 2000, '1595210400Deep Blue.jpg'),
(2, 1, 'Penadol', 12.1, 'Medical', 'Ubat Buah Pinggang', 10, '1595210253Wallpaper_1920x1080_-_Cinematic_1.jpg'),
(3, 1, 'Ubat Batuk Cap Ibu Dan Anak', 100, 'Medical', 'Ibu Beri', 13, '1595210279Screenshot_Full_-_Cinematic_5.jpg'),
(4, 2, 'Power Bang', 12, 'Good', 'Charge your phone', 12, '1595211969Wallpaper_1920x1080_-_Cinematic_1.jpg'),
(5, 2, 'Laptop', 123, 'Good', ' Hack Device', 111, '1595211989Screenshot_Full_-_Cinematic_5.jpg'),
(6, 3, 'Green Tea', 199, 'Food', 'Rendam air panas', 12, '1595212049Screenshot_Full_-_Cinematic_5.jpg'),
(7, 3, 'Snack', 123, 'Food', 'Snac and attac', 11, '1595212064Wallpaper_1920x1080_-_Cinematic_1.jpg'),
(8, 4, 'Doggo Chocolate', 12, 'Pet', ' Woof at night', 111, '1595212102Wallpaper_1920x1080_-_Cinematic_1.jpg'),
(9, 4, 'Power Cat', 123, 'Pet', 'Transform your cat to power rangers', 12, '1595212135Wallpaper_1920x1080_-_Cinematic_1.jpg'),
(10, 5, 'Monitor', 12, 'Good', 'New Monitor Grey', 12, '1595215046Wallpaper_1920x1080_-_Cinematic_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `orderItemQty` int(11) NOT NULL,
  `orderTime` datetime NOT NULL DEFAULT current_timestamp(),
  `orderStatus` varchar(50) NOT NULL,
  `orderTotalPrice` float NOT NULL,
  `servProvID` int(11) DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  `itemType` varchar(11) NOT NULL,
  `itemID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `orderItemQty`, `orderTime`, `orderStatus`, `orderTotalPrice`, `servProvID`, `customerID`, `itemType`, `itemID`) VALUES
(1, 21, '2020-07-14 12:29:47', 'Delivered', 119.12, 1, 1, 'Medical', 1),
(2, 122, '2020-07-14 13:13:49', 'Pending', 123.11, 1, 2, 'Medical', 2),
(3, 10, '2020-07-14 17:40:37', 'Delivered', 123.11, 1, 3, 'Medical', 3),
(4, 10, '2020-07-18 22:23:47', 'Pending', 10.1, 2, 3, 'Good', 4),
(5, 10, '2020-07-18 22:38:45', 'Pending', 123.11, 2, 2, 'Good', 5),
(6, 1, '2020-07-20 08:21:37', 'Pending', 100, 3, 3, 'Food', 6),
(7, 10, '2020-07-20 08:25:45', 'Pending', 100, 3, 2, 'Food', 7),
(8, 10, '2020-07-20 08:26:48', 'Pending', 123.11, 4, 1, 'Pet', 8),
(9, 10, '2020-07-20 08:27:28', 'Pending', 119.12, 4, 3, 'Pet', 9);

-- --------------------------------------------------------

--
-- Table structure for table `runner`
--

CREATE TABLE `runner` (
  `runnerID` int(11) NOT NULL,
  `runnerName` varchar(100) NOT NULL,
  `runnerUsername` varchar(50) NOT NULL,
  `runnerPassword` varchar(20) NOT NULL,
  `runnerPhone` varchar(11) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT 0,
  `vehicleType` varchar(50) NOT NULL,
  `vehiclePlate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `runner`
--

INSERT INTO `runner` (`runnerID`, `runnerName`, `runnerUsername`, `runnerPassword`, `runnerPhone`, `approved`, `vehicleType`, `vehiclePlate`) VALUES
(1, 'Ahmad', 'Runner', '1', '0123456789', 1, 'Car', 'SUV 1234'),
(2, 'Saimah', 'Saimah', '1', '012-1111111', 1, 'Vehicle Type', 'ABC 1234');

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

CREATE TABLE `serviceprovider` (
  `servProvID` int(11) NOT NULL,
  `spName` varchar(100) NOT NULL,
  `spUsername` varchar(50) NOT NULL,
  `spPassword` varchar(50) NOT NULL,
  `spType` varchar(20) NOT NULL,
  `approved` int(11) DEFAULT 0,
  `spEmail` varchar(50) NOT NULL,
  `spAddress` varchar(100) NOT NULL,
  `spPhone` varchar(20) NOT NULL,
  `ssm` varchar(50) NOT NULL,
  `spImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serviceprovider`
--

INSERT INTO `serviceprovider` (`servProvID`, `spName`, `spUsername`, `spPassword`, `spType`, `approved`, `spEmail`, `spAddress`, `spPhone`, `ssm`, `spImage`) VALUES
(1, 'Bike Bear Farmacy', 'Medical', '1', 'Medical', 1, 'falah@try', '  Taman Tas, Kuantan', '012-1234567', '123456-K', '1595210381Wallpaper_1920x1080_-_Cinematic_1.jpg'),
(2, 'Hypermarket', 'Good', '1', 'Good', 1, 'miracle@gh', 'Kuantan Parade, Kuatan', '012-1111111', '123456-G', '1595211796Deep Blue.jpg'),
(3, '7Eleven', 'Food', '1', 'Food', 1, 'fa@hmail', 'SCM, UMP', '012-1111111', '123456-F', '1595211837Wallpaper_1920x1080_-_Cinematic_1.jpg'),
(4, 'Pet Paradigm Mall', 'Pet', '1', 'Pet', 1, 'r@a', 'Berjaya Megamall, Pekan', '012-1111111', '123456-P', '1595211889Screenshot_Full_-_Cinematic_5.jpg'),
(5, 'Service Provider', 'Falah', '1', 'Good', 1, 'fa@hmail', 'Kuantan, Pahang', '012-1111111', '123456-H', '1595214531Wallpaper_1920x1080_-_Cinematic_1.jpg'),
(6, 'Madam Azma', 'Azma', '123', 'Good', 1, 'r@a', 'Ump, Gambang', '012-1111111', '123456-G', '1595216174Wallpaper_1920x1080_-_Cinematic_1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `runner`
--
ALTER TABLE `runner`
  ADD PRIMARY KEY (`runnerID`);

--
-- Indexes for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  ADD PRIMARY KEY (`servProvID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `runner`
--
ALTER TABLE `runner`
  MODIFY `runnerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  MODIFY `servProvID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
