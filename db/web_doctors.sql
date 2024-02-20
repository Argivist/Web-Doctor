-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 11:38 AM
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
-- Database: `web_doctors`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customID` int(11) NOT NULL,
  `customName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_inventory`
--

CREATE TABLE `medicine_inventory` (
  `medicineID` int(11) NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `pharmID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` bigint(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `pharmID` int(11) NOT NULL,
  `pharmName` varchar(50) NOT NULL,
  `pharmInventory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescriptionID` int(11) NOT NULL,
  `customID` int(11) DEFAULT NULL,
  `medicineID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customID`);

--
-- Indexes for table `medicine_inventory`
--
ALTER TABLE `medicine_inventory`
  ADD PRIMARY KEY (`medicineID`),
  ADD KEY `pharmID` (`pharmID`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`pharmID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescriptionID`),
  ADD KEY `customID` (`customID`),
  ADD KEY `medicineID` (`medicineID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine_inventory`
--
ALTER TABLE `medicine_inventory`
  MODIFY `medicineID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `pharmID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescriptionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medicine_inventory`
--
ALTER TABLE `medicine_inventory`
  ADD CONSTRAINT `medicine_inventory_ibfk_1` FOREIGN KEY (`pharmID`) REFERENCES `pharmacy` (`pharmID`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`customID`) REFERENCES `customer` (`customID`),
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`medicineID`) REFERENCES `medicine_inventory` (`medicineID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
