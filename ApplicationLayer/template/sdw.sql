-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2020 at 12:05 PM
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
-- Database: `sdw`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `ic` varchar(15) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(15) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(10) CHARACTER SET latin1 NOT NULL,
  `class` varchar(15) CHARACTER SET latin1 NOT NULL,
  `image` varchar(252) CHARACTER SET latin1 NOT NULL,
  `fName` varchar(100) CHARACTER SET latin1 NOT NULL,
  `fIC` varchar(15) CHARACTER SET latin1 NOT NULL,
  `mName` varchar(100) CHARACTER SET latin1 NOT NULL,
  `mIC` varchar(15) CHARACTER SET latin1 NOT NULL,
  `eName` varchar(100) CHARACTER SET latin1 NOT NULL,
  `eRel` varchar(20) CHARACTER SET latin1 NOT NULL,
  `ePhone` varchar(15) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studname`, `ic`, `phone`, `gender`, `class`, `image`, `fName`, `fIC`, `mName`, `mIC`, `eName`, `eRel`, `ePhone`) VALUES
('Muhammad', '923113-10-2020', '012-4567890', 'Male', '3 ILTIZAM', '1591278271nigma-all1_desktop.jpg', 'Muhammad', '923113-10-2020', 'Muhammad', '923113-10-2020', 'Muhammad', 'Father', '019-7986131'),
('Hi', '923113-11-2020', '012-4567890', 'Male', '3 IHSAN', '15912821741591280455Deep Blue.jpg', 'Muhammad', '923113-10-2020', 'Muhammad', '923113-10-2020', 'Muhammad', 'Father', '019-7986131'),
('Muhammad', '923113-18-2020', '012-4567890', 'Female', '3 ILTIZAM', '159128105515912805381591280455Deep Blue.jpg', 'Muhammad', '923113-10-2020', 'Muhammad', '923113-10-2020', 'Muhammad', 'Father', '019-7986111'),
('SDW', '923113-19-2020', '012-4567890', 'Female', '3 ILTIZAM', '15912805381591280455Deep Blue.jpg', 'Muhammad', '923113-10-2020', 'Muhammad', '923113-10-2020', 'Muhammad', 'Father', '019-7986131'),
('Handsome', '923113-20-2020', '012-4567890', 'Female', '1 ILTIZAM', '1591279508nigma-all1_desktop.jpg', 'Muhammad', '923113-10-2020', 'Muhammad', '923113-10-2020', 'Muhammad', 'Father', '019-7986131'),
('Falah', '958009-14-7393', '019-7986131', ' Male', '1 IHSAN', '', 'Falah', '958009-14-7393', 'Falah', '958009-14-7393', 'Falah', 'Father', '019-7986131');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ic`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
