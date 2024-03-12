-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 11, 2024 at 12:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Optician_Project`
--
CREATE DATABASE IF NOT EXISTS `Optician_Project` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Optician_Project`;

-- --------------------------------------------------------

--
-- Table structure for table `Employees`
--

DROP TABLE IF EXISTS `Employees`;
CREATE TABLE `Employees` (
  `Emp_ID` int(5) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `deleted_flag` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Inventory`
--

DROP TABLE IF EXISTS `Inventory`;
CREATE TABLE `Inventory` (
  `StockNumber` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `CostPrice` decimal(5,2) NOT NULL,
  `RetailPrice` decimal(5,2) NOT NULL,
  `ReorderQty` int(11) NOT NULL,
  `SupplierStockCode` int(11) DEFAULT NULL,
  `SupplierID` int(10) DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Inventory`
--

INSERT INTO `Inventory` (`StockNumber`, `Quantity`, `Description`, `CostPrice`, `RetailPrice`, `ReorderQty`, `SupplierStockCode`, `SupplierID`, `deleted_flag`) VALUES
(1, 0, 'lens', 0.05, 1.10, 250, 12, NULL, 0),
(2, 0, 'frame', 0.20, 1.00, 100, 3, NULL, 0),
(3, 0, 'frame', 0.20, 1.00, 100, 3, NULL, 0),
(4, 0, 'test', 9.99, 9.99, 1000, 43, NULL, 0),
(7, 0, 'L', 1.00, 2.00, 34, 56, 1, 0),
(8, 0, 'a', 9.99, 9.99, 12, 12, 2, 0),
(9, 0, 's', 9.99, 9.99, 23, 23, 2, 0),
(10, 0, 's', 9.99, 9.99, 23, 23, 2, 0),
(11, 0, 'Contacts', 9.99, 9.99, 120, 34, 3, 0),
(12, 0, 'Contacts', 12.00, 15.00, 120, 34, 3, 0),
(14, 0, 'ITEM', 12.43, 15.87, 1000, 47, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Order/Item`
--

DROP TABLE IF EXISTS `Order/Item`;
CREATE TABLE `Order/Item` (
  `Order_ID` int(10) NOT NULL,
  `Stock_ID` int(10) NOT NULL,
  `Item` varchar(50) NOT NULL,
  `Quantity` int(3) NOT NULL,
  `Item_Quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

DROP TABLE IF EXISTS `Orders`;
CREATE TABLE `Orders` (
  `Order_ID` int(10) NOT NULL,
  `Item` varchar(30) NOT NULL,
  `Quantity` int(4) NOT NULL,
  `TotalCost` decimal(4,2) NOT NULL,
  `Order Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

DROP TABLE IF EXISTS `Patient`;
CREATE TABLE `Patient` (
  `PatientID` int(6) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Eircode` varchar(11) NOT NULL,
  `DOB` date NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Balance` decimal(5,2) NOT NULL DEFAULT 0.00,
  `deleted_flag` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`PatientID`, `Name`, `Address`, `Eircode`, `DOB`, `Phone`, `Balance`, `deleted_flag`) VALUES
(1, 'Adam', '123 Main St', 'D12AB34', '1990-05-15', '1234567890', 0.00, 0),
(2, 'Jane', '456 Elm St', 'E34CD56', '1985-08-20', '2147483647', 0.00, 0),
(3, 'Alice Johnson', '200 Oak St', 'F56EF78', '1978-03-10', '2147483647', 0.00, 0),
(4, 'Bob Williams', '101 Pine St', 'G89GH01', '1995-11-25', '2147483647', 0.00, 0),
(5, 'Emily Brown', '222 Cedar St', 'H02IJ03', '2000-07-05', '123123123', 0.00, 0),
(6, 'John doe', '127389 fsbadhf', 'r32903871', '2002-12-31', '56782934', 0.00, 0),
(7, 'John doe', 'naiuosda', 'mksodf', '2024-02-27', '798423', 0.00, 0),
(8, 'cat', '2 high streetr', '', '0000-00-00', '0', 0.00, 0),
(9, 'mary', 'dublin', 'abc', '2024-03-04', '85232', 0.00, 0),
(10, '123', '123', 'r32903871', '2021-05-04', '123', 0.00, 0),
(11, 'John doe', '127389 fsbadhf', 'r32903871', '2020-02-06', '1234', 0.00, 0),
(12, 'John doe', '127389 fsbadhf', 'R32N7wW', '2022-02-04', '123', 0.00, 0),
(13, 'John doe', '127389 fsbadhf', 'R32N7wW', '2016-02-02', '123', 0.00, 0),
(14, '123', '123', '123', '2023-01-30', '123', 0.00, 0),
(15, '123', '123', '123', '2023-01-30', '123', 0.00, 0),
(16, 'bob', '123', '123', '2021-12-28', '123', 0.00, 0),
(17, 'John doe', '127389 fsbadhf', '123', '2022-02-02', '12', 0.00, 0),
(18, 'John doe', '123', 'r32903871', '2021-02-03', '123', 0.00, 0),
(19, 'mary', '123123', '312313', '1999-12-12', '4213413423', 0.00, 0),
(20, 'asdas', '127389 fsbadhf', 'r32903871', '1999-12-12', '21312', 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Sale/Item`
--

DROP TABLE IF EXISTS `Sale/Item`;
CREATE TABLE `Sale/Item` (
  `Stock_num` int(10) NOT NULL,
  `Sale_ID` int(10) NOT NULL,
  `RetailPrice` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Sales`
--

DROP TABLE IF EXISTS `Sales`;
CREATE TABLE `Sales` (
  `Sale_ID` int(10) NOT NULL,
  `SaleDate` date NOT NULL,
  `SalePrice` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Supplier`
--

DROP TABLE IF EXISTS `Supplier`;
CREATE TABLE `Supplier` (
  `SupplierID` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Website` varchar(50) NOT NULL,
  `Phone_No` int(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `deleted_flag` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Supplier`
--

INSERT INTO `Supplier` (`SupplierID`, `Name`, `Address`, `Website`, `Phone_No`, `Email`, `deleted_flag`) VALUES
(1, 'Supplier 1', 'Address 1', 'www.supplier1website.com', 1234567890, 'supplier1@email.com', 0),
(2, 'Supplier 2', 'Address 2', 'www.supplier2website.com', 2147483647, 'supplier2@email.com', 0),
(3, 'Supplier 3', 'Address 3', 'www.supplier3website.com', 2147483647, 'supplier3@email.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Test`
--

DROP TABLE IF EXISTS `Test`;
CREATE TABLE `Test` (
  `TestID` int(6) NOT NULL,
  `RightEye` float NOT NULL,
  `LeftEye` float NOT NULL,
  `TestDate` date NOT NULL,
  `deleted_flag` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Employees`
--
ALTER TABLE `Employees`
  ADD PRIMARY KEY (`Emp_ID`);

--
-- Indexes for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD PRIMARY KEY (`StockNumber`),
  ADD KEY `SupplierID` (`SupplierID`);

--
-- Indexes for table `Order/Item`
--
ALTER TABLE `Order/Item`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`PatientID`);

--
-- Indexes for table `Sale/Item`
--
ALTER TABLE `Sale/Item`
  ADD PRIMARY KEY (`Stock_num`);

--
-- Indexes for table `Sales`
--
ALTER TABLE `Sales`
  ADD PRIMARY KEY (`Sale_ID`);

--
-- Indexes for table `Supplier`
--
ALTER TABLE `Supplier`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Indexes for table `Test`
--
ALTER TABLE `Test`
  ADD PRIMARY KEY (`TestID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Employees`
--
ALTER TABLE `Employees`
  MODIFY `Emp_ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Inventory`
--
ALTER TABLE `Inventory`
  MODIFY `StockNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Order/Item`
--
ALTER TABLE `Order/Item`
  MODIFY `Order_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `Order_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Sale/Item`
--
ALTER TABLE `Sale/Item`
  MODIFY `Stock_num` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Sales`
--
ALTER TABLE `Sales`
  MODIFY `Sale_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Supplier`
--
ALTER TABLE `Supplier`
  MODIFY `SupplierID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Test`
--
ALTER TABLE `Test`
  MODIFY `TestID` int(6) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD CONSTRAINT `Inventory_ibfk_1` FOREIGN KEY (`SupplierID`) REFERENCES `Supplier` (`SupplierID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
