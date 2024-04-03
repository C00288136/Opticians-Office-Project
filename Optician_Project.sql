-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 03, 2024 at 01:32 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `optician_project`
--
CREATE DATABASE IF NOT EXISTS `optician_project` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `optician_project`;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `Emp_ID` int(5) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `deleted_flag` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE `inventory` (
  `StockNumber` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `CostPrice` decimal(5,2) NOT NULL,
  `RetailPrice` decimal(5,2) NOT NULL,
  `ReorderQty` int(11) NOT NULL,
  `SupplierStockCode` int(11) DEFAULT NULL,
  `SupplierID` int(10) DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`StockNumber`, `Quantity`, `Description`, `CostPrice`, `RetailPrice`, `ReorderQty`, `SupplierStockCode`, `SupplierID`, `deleted_flag`) VALUES
(15, 20, 'Prescription Frames', '30.00', '100.00', 5, 4123, 1, 0),
(16, 50, 'Contact Lenses 30 days', '20.00', '50.00', 5, 345213, 2, 0),
(17, 100, 'Conctact Lens 60 days ', '25.00', '70.00', 10, 41234, 2, 0),
(18, 70, 'Contact Lens 90 days', '35.00', '80.00', 15, 4129312, 2, 0),
(19, 40, 'Reading Glasses', '15.00', '40.00', 5, 1235, 1, 0),
(20, 90, 'Saftey Glasses', '40.00', '100.00', 10, 5234, 1, 0),
(21, 15, 'Blue light Blocking lenses', '15.00', '40.00', 3, 7456, 3, 0),
(22, 30, 'Anti Reflective lens coating', '5.00', '15.00', 5, 648379, 3, 0),
(23, 10, 'Prescription Goggles', '40.00', '120.00', 5, 6734589, 1, 0),
(24, 40, 'Computer Glasses', '5.00', '25.00', 10, 6345, 3, 0),
(25, 200, 'Eyeglass Chains/Strings', '0.50', '4.00', 40, 38456, 3, 0),
(26, 10, 'Low Vision Aid Glasses', '60.00', '200.00', 2, 6537894, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order/item`
--

DROP TABLE IF EXISTS `order/item`;
CREATE TABLE `order/item` (
  `Order_ID` int(10) NOT NULL,
  `Stock_ID` int(10) NOT NULL,
  `Item` varchar(50) NOT NULL,
  `Quantity` int(3) NOT NULL,
  `Item_Quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `Order_ID` int(10) NOT NULL,
  `Item` varchar(30) NOT NULL,
  `Quantity` int(4) NOT NULL,
  `TotalCost` decimal(4,2) NOT NULL,
  `Order Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE `patient` (
  `PatientID` int(6) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Eircode` varchar(11) NOT NULL,
  `DOB` date NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Balance` decimal(5,2) NOT NULL DEFAULT '0.00',
  `deleted_flag` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PatientID`, `Name`, `Address`, `Eircode`, `DOB`, `Phone`, `Balance`, `deleted_flag`) VALUES
(1, 'John Doe', '123 Main St', 'A123456', '1990-01-01', '555-1234', '100.00', 0),
(2, 'Jane Smith', '456 Elm St', 'B789012', '1985-05-15', '555-5678', '150.00', 0),
(3, 'Alice Johnson', '789 Oak St', 'C345678', '1978-10-30', '555-9101', '200.00', 1),
(4, 'Bob Brown', '101 Pine St', 'D901234', '1982-03-20', '555-1212', '250.00', 0),
(5, 'Emily Davis', '202 Cedar St', 'E567890', '1995-12-05', '555-3434', '300.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale/item`
--

DROP TABLE IF EXISTS `sale/item`;
CREATE TABLE `sale/item` (
  `Stock_num` int(10) NOT NULL,
  `Sale_ID` int(10) NOT NULL,
  `RetailPrice` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `Sale_ID` int(10) NOT NULL,
  `SaleDate` date NOT NULL,
  `SalePrice` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `SupplierID` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Website` varchar(50) NOT NULL,
  `Phone_No` int(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `deleted_flag` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierID`, `Name`, `Address`, `Website`, `Phone_No`, `Email`, `deleted_flag`) VALUES
(1, 'Glass manufacturer', 'Address 1', 'www.supplier1website.com', 1234567890, 'supplier1@email.com', 0),
(2, 'Contact Lens inc', 'Address 2', 'www.supplier2website.com', 2147483647, 'supplier2@email.com', 0),
(3, 'Accessories Corp', 'Address 3', 'www.supplier3website.com', 2147483647, 'supplier3@email.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `TestID` int(6) NOT NULL,
  `PatientID` int(6) NOT NULL,
  `RightEye` float NOT NULL,
  `LeftEye` float NOT NULL,
  `TestDate` date NOT NULL,
  `deleted_flag` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`TestID`, `PatientID`, `RightEye`, `LeftEye`, `TestDate`, `deleted_flag`) VALUES
(1, 1, 1, 1, '2024-01-08', 0),
(2, 2, 1, 1, '2024-01-01', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Emp_ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`StockNumber`),
  ADD KEY `SupplierID` (`SupplierID`);

--
-- Indexes for table `order/item`
--
ALTER TABLE `order/item`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`PatientID`);

--
-- Indexes for table `sale/item`
--
ALTER TABLE `sale/item`
  ADD PRIMARY KEY (`Stock_num`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`Sale_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`TestID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `Emp_ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order/item`
--
ALTER TABLE `order/item`
  MODIFY `Order_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale/item`
--
ALTER TABLE `sale/item`
  MODIFY `Stock_num` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `Sale_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SupplierID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `TestID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `Inventory_ibfk_1` FOREIGN KEY (`SupplierID`) REFERENCES `supplier` (`SupplierID`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
