-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 07:02 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `applyleave`
--

CREATE TABLE `applyleave` (
  `applyId` int(11) NOT NULL,
  `apply_userId` int(11) NOT NULL,
  `apply_leaveRequestId` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `total_days` int(11) NOT NULL,
  `apply_status` varchar(50) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applyleave`
--

INSERT INTO `applyleave` (`applyId`, `apply_userId`, `apply_leaveRequestId`, `date_from`, `date_to`, `total_days`, `apply_status`, `createdOn`) VALUES
(1, 1, 3, '2021-01-20', '2021-01-23', 4, 'Accepted', '2021-01-20 17:31:58'),
(3, 2, 2, '2021-01-30', '2021-01-23', 6, 'Accepted', '2021-01-20 17:32:02'),
(4, 2, 1, '2021-01-30', '2021-01-31', 1, 'In Progress', '2021-01-20 15:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `leavereason`
--

CREATE TABLE `leavereason` (
  `leaveId` int(11) NOT NULL,
  `leaveName` varchar(50) NOT NULL,
  `leaveCreatedOn` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leavereason`
--

INSERT INTO `leavereason` (`leaveId`, `leaveName`, `leaveCreatedOn`) VALUES
(1, 'Annual Leave', '2021-01-20 13:03:11'),
(2, 'Sick Leave', '2021-01-20 13:03:11'),
(3, 'Unpaid Leave', '2021-01-20 13:03:29'),
(4, 'Parental Leave', '2021-01-20 13:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `reminderId` int(11) NOT NULL,
  `staffId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `total_hours` int(11) NOT NULL,
  `reminder_createdOn` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`reminderId`, `staffId`, `title`, `description`, `time_from`, `time_to`, `total_hours`, `reminder_createdOn`, `status`) VALUES
(1, 1, 'Task on PC Cleaning', 'Please clear the pc', '00:10:00', '01:10:00', 0, '2021-01-20 16:43:53', 'deactive'),
(2, 1, 'Task on PC Cleaning222', 'Please clear the pc 2', '03:14:00', '04:14:00', 1, '2021-01-20 17:07:58', 'active'),
(3, 1, 'Task on PC Cleaning', 'Please clear the pc', '01:14:00', '02:14:00', 1, '2021-01-20 16:30:52', 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phoneNo` varchar(12) NOT NULL,
  `role` varchar(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `email`, `fullname`, `gender`, `phoneNo`, `role`, `createdOn`) VALUES
(1, 'rohaizad1996', 'd30b000593995ca2ce99f88822978869cb2f9b33', 'rohaizad@gmail.com', 'Rohaizad bin Maznan', 'Male', '0197070023', 'staff', '2021-01-20 15:22:07'),
(2, 'admin', 'd4e8e6deaa7b1f8381e09e3e6b83e36f0b681c5c', 'admin@gmail.com', 'Rohaizad bin Maznan', 'Male', '0197070023', 'admin', '2021-01-20 17:37:17'),
(3, 'staff', '5d43e3169f06cf2a04a0ee870b5ac2aff3c558ff', 'staff@gmail.com', 'Staff Full Name', 'Male', '0123456789', 'staff', '2021-01-20 17:35:56'),
(4, 'admin2', 'd4e8e6deaa7b1f8381e09e3e6b83e36f0b681c5c', 'admin2@gmail.com', 'Admin Number 2', 'Male', '012345679', 'staff', '2021-01-20 17:45:09'),
(5, 'admin3', 'd4e8e6deaa7b1f8381e09e3e6b83e36f0b681c5c', 'rohaizadmaznan96@gmail.com', 'Rohaizad Maznan', 'Female', '0272842921', 'staff', '2021-01-20 17:46:28'),
(6, 'admin5', 'd4e8e6deaa7b1f8381e09e3e6b83e36f0b681c5c', 'admin5@gmail.com', 'admin5', 'Male', '01234586593', 'admin', '2021-01-20 17:47:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applyleave`
--
ALTER TABLE `applyleave`
  ADD PRIMARY KEY (`applyId`),
  ADD KEY `apply_leaveRequestId` (`apply_leaveRequestId`),
  ADD KEY `apply_userId` (`apply_userId`);

--
-- Indexes for table `leavereason`
--
ALTER TABLE `leavereason`
  ADD PRIMARY KEY (`leaveId`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`reminderId`),
  ADD KEY `staffId` (`staffId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applyleave`
--
ALTER TABLE `applyleave`
  MODIFY `applyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leavereason`
--
ALTER TABLE `leavereason`
  MODIFY `leaveId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `reminderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applyleave`
--
ALTER TABLE `applyleave`
  ADD CONSTRAINT `applyleave_ibfk_1` FOREIGN KEY (`apply_leaveRequestId`) REFERENCES `leavereason` (`leaveId`),
  ADD CONSTRAINT `applyleave_ibfk_2` FOREIGN KEY (`apply_userId`) REFERENCES `user` (`userId`);

--
-- Constraints for table `reminder`
--
ALTER TABLE `reminder`
  ADD CONSTRAINT `reminder_ibfk_1` FOREIGN KEY (`staffId`) REFERENCES `user` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
