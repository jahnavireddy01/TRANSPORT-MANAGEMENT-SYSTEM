-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 12:17 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branchid` int(8) NOT NULL,
  `branchName` varchar(100) NOT NULL,
  `branchCode` varchar(100) NOT NULL,
  `branchPassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branchid`, `branchName`, `branchCode`, `branchPassword`) VALUES
(1, 'Davanagere', 'DVG', '123'),
(2, 'Harihara', 'HRR', '123'),
(3, 'Chitradurga', 'CTA', '123'),
(4, 'Haveri', 'HVR', '123'),
(5, 'Hubli', 'HUB', '1234'),
(6, 'Bidar', 'BID', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `consdetails`
--

CREATE TABLE `consdetails` (
  `consID` int(8) NOT NULL,
  `senderName` varchar(50) NOT NULL,
  `recieverName` varchar(150) NOT NULL,
  `senderAddress` varchar(150) NOT NULL,
  `recieverAddress` varchar(150) NOT NULL,
  `details` varchar(100) NOT NULL,
  `distance` varchar(100) NOT NULL,  `Verified` varchar(50) NOT NULL DEFAULT 'Not Verified'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consdetails`
--

INSERT INTO `consdetails` (`consID`, `senderName`, `recieverName`, `senderAddress`, `recieverAddress`, `details`, `Verified`) VALUES
(1, 'Darshan', 'Kumar', 'Kelgote Chitradurga', 'Jayanagar Banglore', '112233', 'Not Verified'),
(2, 'Usha', 'Siri', 'Chitradurga', 'Bidar', '12345', 'Not Verified'),
(3, 'Demo user 1', 'Demo user 2', 'Chitradurga', 'Hubli', '112233', 'Not Verified');

-- --------------------------------------------------------

--
-- Table structure for table `consstatus`
--

CREATE TABLE `consstatus` (
  `CSid` int(8) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Need to be Updated',
  `presentBranch` varchar(50) NOT NULL DEFAULT 'Need to be Updated',
  `destinationBranch` varchar(50) NOT NULL DEFAULT 'Need to be Updated',
  `dt` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consstatus`
--

INSERT INTO `consstatus` (`CSid`, `status`, `presentBranch`, `destinationBranch`, `dt`) VALUES
(1, 'In Transit', 'Davanagere', 'Harihara', '2021-12-14 09:25:54.934129'),
(1, 'In Transit', 'Harihara', 'Harihara', '2021-12-14 09:25:54.934129'),
(1, 'Delivered', 'Harihara', 'Harihara', '2021-12-14 09:27:07.449856'),
(1, 'Cancelled', 'Davanagere', 'Davanagere', '2021-12-14 09:29:10.527565'),
(2, 'In Transit', 'Chitradurga', 'Davanagere', '2021-12-14 13:47:44.504390'),
(2, 'In Transit', 'Davanagere', 'Hubli', '2021-12-14 13:48:06.184366'),
(3, 'In Transit', 'Chitradurga', 'Davanagere', '2021-12-14 13:50:46.241280'),
(3, 'In Transit', 'Davanagere', 'Hubli', '2021-12-14 13:51:01.253244'),
(3, 'Delivered', 'Hubli', 'Hubli', '2021-12-14 13:51:18.492438'),
(3, 'Cancelled', 'Davanagere', 'Davanagere', '2021-12-14 13:52:06.971817'),
(3, 'In Transit', 'Davanagere', 'Haveri', '2021-12-19 05:56:11.808886'),
(3, 'In Transit', 'Haveri', 'Hubli', '2021-12-19 05:57:00.616162');

-- --------------------------------------------------------

--
-- Table structure for table `tms_admin`
--

CREATE TABLE `tms_admin` (
  `id` int(8) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_admin`
--

INSERT INTO `tms_admin` (`id`, `Username`, `Email`, `Password`) VALUES
(1, 'TMS Admin', 'tmsadmin@tms.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branchid`);

--
-- Indexes for table `consdetails`
--
ALTER TABLE `consdetails`
  ADD PRIMARY KEY (`consID`);

--
-- Indexes for table `tms_admin`
--
ALTER TABLE `tms_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branchid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `consdetails`
--
ALTER TABLE `consdetails`
  MODIFY `consID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tms_admin`
--
ALTER TABLE `tms_admin`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

