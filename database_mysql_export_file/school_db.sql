-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 12:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `ClassTitle` varchar(50) NOT NULL,
  `ClassDetail` varchar(255) NOT NULL,
  `ClassBeginDefault` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassID`, `ClassTitle`, `ClassDetail`, `ClassBeginDefault`) VALUES
(001, 'จันทร์-เช้า', '', '08:00:00'),
(002, 'จันทร์-บ่าย', '', '13:00:00'),
(003, 'อังคาร-เช้า', 'บชบ.62', '08:00:00'),
(004, 'อังคาร-บ่าย', 'สว.250', '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `UserID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Status` enum('ADMIN','USER','TEACHER','STUDENT','OFFICER') NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`UserID`, `Username`, `Password`, `Name`, `Status`) VALUES
(001, 'win', 'win123', 'Weerachai Nukitram', 'USER'),
(002, 'chai', 'chai123', 'Surachai Sirisart', 'ADMIN'),
(003, 'chok', 'chok123', 'pachait maethong', 'TEACHER'),
(004, 'tik', 'tik123', 'tikki', 'STUDENT');

-- --------------------------------------------------------

--
-- Table structure for table `memberinclass`
--

CREATE TABLE `memberinclass` (
  `UserID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `ClassID` int(3) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memberinclass`
--

INSERT INTO `memberinclass` (`UserID`, `ClassID`) VALUES
(001, 002),
(001, 003),
(001, 004),
(002, 003),
(004, 001),
(004, 002);

-- --------------------------------------------------------

--
-- Table structure for table `membertakeroll`
--

CREATE TABLE `membertakeroll` (
  `TID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `UserID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `Status` enum('PRESENT','ABSENT','LATE') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membertakeroll`
--

INSERT INTO `membertakeroll` (`TID`, `UserID`, `Status`, `timestamp`) VALUES
(0000000001, 001, 'PRESENT', '2022-01-19 12:35:50'),
(0000000001, 004, 'PRESENT', '2022-01-19 12:35:50'),
(0000000002, 001, 'PRESENT', '2022-01-19 12:35:50'),
(0000000002, 004, 'PRESENT', '2022-01-19 12:35:50'),
(0000000003, 001, 'PRESENT', '2022-01-19 12:35:50'),
(0000000003, 004, 'PRESENT', '2022-01-19 12:35:50'),
(0000000004, 001, 'PRESENT', '2022-01-19 12:35:50'),
(0000000004, 004, 'ABSENT', '2022-01-19 12:35:50'),
(0000000005, 001, 'PRESENT', '2022-01-19 12:35:50'),
(0000000005, 004, 'PRESENT', '2022-01-19 12:35:50'),
(0000000006, 001, 'PRESENT', '2022-01-19 12:35:50'),
(0000000006, 004, 'PRESENT', '2022-01-19 12:35:50'),
(0000000007, 001, 'PRESENT', '2022-01-19 12:35:50'),
(0000000007, 004, 'LATE', '2022-01-19 12:35:50'),
(0000000008, 001, 'PRESENT', '2022-01-19 12:35:50'),
(0000000008, 004, 'PRESENT', '2022-01-19 12:35:50'),
(0000000009, 001, 'PRESENT', '2022-01-19 12:35:50'),
(0000000009, 004, 'PRESENT', '2022-01-19 12:35:50'),
(0000000010, 001, 'PRESENT', '2022-01-19 12:35:50'),
(0000000010, 004, 'PRESENT', '2022-01-19 12:35:50'),
(0000000011, 001, 'PRESENT', '2022-01-19 12:35:50'),
(0000000011, 004, 'PRESENT', '2022-01-19 12:35:50'),
(0000000012, 001, 'PRESENT', '2022-01-19 12:35:50'),
(0000000012, 004, 'LATE', '2022-01-19 12:35:50'),
(0000000013, 001, 'PRESENT', '2022-01-19 12:35:50'),
(0000000013, 004, 'PRESENT', '2022-01-19 12:35:50'),
(0000000014, 001, 'PRESENT', '2022-01-19 12:35:50'),
(0000000014, 004, 'PRESENT', '2022-01-19 12:35:50'),
(0000000015, 001, 'ABSENT', '2022-01-19 12:35:50'),
(0000000015, 004, 'PRESENT', '2022-01-19 12:35:50'),
(0000000016, 001, 'PRESENT', '2022-01-19 12:35:50'),
(0000000016, 004, 'PRESENT', '2022-01-19 12:35:50'),
(0000000017, 001, 'PRESENT', '2022-01-19 12:35:50'),
(0000000017, 004, 'PRESENT', '2022-01-19 12:35:50'),
(0000000018, 001, 'LATE', '2022-01-19 12:35:50'),
(0000000018, 004, 'PRESENT', '2022-01-19 12:35:50'),
(0000000024, 004, 'PRESENT', '2022-01-19 16:00:52'),
(0000000026, 004, 'PRESENT', '2022-01-19 16:03:12'),
(0000000027, 004, 'PRESENT', '2022-01-19 16:09:02'),
(0000000028, 004, 'PRESENT', '2022-01-19 16:09:09'),
(0000000029, 001, 'ABSENT', '2022-01-23 11:36:33'),
(0000000029, 002, 'ABSENT', '2022-01-23 11:35:12'),
(0000000030, 001, 'ABSENT', '2022-01-23 11:36:33'),
(0000000030, 002, 'ABSENT', '2022-01-23 11:35:12'),
(0000000031, 001, 'ABSENT', '2022-01-23 11:36:33'),
(0000000031, 002, 'ABSENT', '2022-01-23 11:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `takeroll`
--

CREATE TABLE `takeroll` (
  `TID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `ClassID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `Week` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18') NOT NULL,
  `Date` date NOT NULL,
  `ClassBegin` time NOT NULL,
  `ClassEnd` time NOT NULL,
  `LateAt` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `takeroll`
--

INSERT INTO `takeroll` (`TID`, `ClassID`, `Week`, `Date`, `ClassBegin`, `ClassEnd`, `LateAt`) VALUES
(0000000001, 002, '1', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000002, 002, '2', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000003, 002, '3', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000004, 002, '4', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000005, 002, '5', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000006, 002, '6', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000007, 002, '7', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000008, 002, '8', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000009, 002, '9', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000010, 002, '10', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000011, 002, '11', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000012, 002, '12', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000013, 002, '13', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000014, 002, '14', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000015, 002, '15', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000016, 002, '16', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000017, 002, '17', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000018, 002, '18', '2022-01-19', '18:00:00', '21:00:00', '18:30:00'),
(0000000024, 001, '1', '2022-01-19', '08:00:00', '11:00:00', '08:30:00'),
(0000000026, 001, '2', '2022-01-19', '08:00:00', '11:00:00', '08:30:00'),
(0000000027, 001, '3', '2022-01-19', '08:00:00', '11:00:00', '08:30:00'),
(0000000028, 001, '4', '2022-01-19', '08:00:00', '11:00:00', '08:30:00'),
(0000000029, 003, '1', '2022-01-23', '08:00:00', '08:30:00', '11:00:00'),
(0000000030, 003, '2', '2022-01-23', '08:00:00', '08:30:00', '11:00:00'),
(0000000031, 003, '3', '2022-01-23', '08:00:00', '08:30:00', '11:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `memberinclass`
--
ALTER TABLE `memberinclass`
  ADD PRIMARY KEY (`UserID`,`ClassID`);

--
-- Indexes for table `membertakeroll`
--
ALTER TABLE `membertakeroll`
  ADD PRIMARY KEY (`TID`,`UserID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `takeroll`
--
ALTER TABLE `takeroll`
  ADD PRIMARY KEY (`TID`),
  ADD UNIQUE KEY `ClassID` (`ClassID`,`Week`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ClassID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `UserID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `takeroll`
--
ALTER TABLE `takeroll`
  MODIFY `TID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `memberinclass`
--
ALTER TABLE `memberinclass`
  ADD CONSTRAINT `memberinclass_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `member` (`UserID`),
  ADD CONSTRAINT `memberinclass_ibfk_2` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ClassID`);

--
-- Constraints for table `membertakeroll`
--
ALTER TABLE `membertakeroll`
  ADD CONSTRAINT `membertakeroll_ibfk_1` FOREIGN KEY (`TID`) REFERENCES `takeroll` (`TID`),
  ADD CONSTRAINT `membertakeroll_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `member` (`UserID`);

--
-- Constraints for table `takeroll`
--
ALTER TABLE `takeroll`
  ADD CONSTRAINT `takeroll_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ClassID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
