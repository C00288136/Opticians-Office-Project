-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 03:25 PM
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
-- Database: `optician_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `Emp_ID` int(5) NOT NULL AUTO_INCREMENT,
  `Password` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  PRIMARY KEY (`Emp_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `StockNumber` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `CostPrice` decimal(5,2) NOT NULL,
  `RetailPrice` decimal(5,2) NOT NULL,
  `ReorderQty` int(11) NOT NULL,
  `SupplierStockCode` int(11) DEFAULT NULL,
  `SupplierID` int(10) DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  PRIMARY KEY (`StockNumber`),
  KEY `SupplierID` (`SupplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`StockNumber`, `Quantity`, `Description`, `CostPrice`, `RetailPrice`, `ReorderQty`, `SupplierStockCode`, `SupplierID`, `deleted_flag`) VALUES
(15, 20, 'Prescription Frames', 30.00, 100.00, 5, 4123, 1, 0),
(16, 50, 'Contact Lenses 30 days', 20.00, 50.00, 5, 345213, 2, 0),
(17, 100, 'Conctact Lens 60 days ', 25.00, 70.00, 10, 41234, 2, 0),
(18, 70, 'Contact Lens 90 days', 35.00, 80.00, 15, 4129312, 2, 0),
(19, 40, 'Reading Glasses', 15.00, 40.00, 5, 1235, 1, 0),
(20, 90, 'Saftey Glasses', 40.00, 100.00, 10, 5234, 1, 0),
(21, 15, 'Blue light Blocking lenses', 15.00, 40.00, 3, 7456, 3, 0),
(22, 30, 'Anti Reflective lens coating', 5.00, 15.00, 5, 648379, 3, 0),
(23, 10, 'Prescription Goggles', 40.00, 120.00, 5, 6734589, 1, 0),
(24, 40, 'Computer Glasses', 5.00, 25.00, 10, 6345, 3, 0),
(25, 200, 'Eyeglass Chains/Strings', 0.50, 4.00, 40, 38456, 3, 0),
(26, 10, 'Low Vision Aid Glasses', 60.00, 200.00, 2, 6537894, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order/item`
--

DROP TABLE IF EXISTS `order/item`;
CREATE TABLE IF NOT EXISTS `order/item` (
  `Order_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Stock_ID` int(10) NOT NULL,
  `Item` varchar(50) NOT NULL,
  `Quantity` int(3) NOT NULL,
  `Item_Quantity` int(3) NOT NULL,
  PRIMARY KEY (`Order_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Order_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Item` varchar(30) NOT NULL,
  `Quantity` int(4) NOT NULL,
  `TotalCost` decimal(4,2) NOT NULL,
  `Order Date` date NOT NULL,
  PRIMARY KEY (`Order_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `PatientID` int(6) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Eircode` varchar(11) NOT NULL,
  `DOB` date NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Balance` decimal(5,2) NOT NULL DEFAULT 0.00,
  `deleted_flag` int(1) DEFAULT 0,
  PRIMARY KEY (`PatientID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PatientID`, `Name`, `Address`, `Eircode`, `DOB`, `Phone`, `Balance`, `deleted_flag`) VALUES
(1, 'John Doe', '123 Main St', 'A123456', '1990-01-01', '555-1234', 100.00, 0),
(2, 'Jane Smith', '456 Elm St', 'B789012', '1985-05-15', '555-5678', 150.00, 0),
(3, 'Alice Johnson', '789 Oak St', 'C345678', '1978-10-30', '555-9101', 200.00, 0),
(4, 'Bob Brown', '101 Pine St', 'D901234', '1982-03-20', '555-1212', 250.00, 0),
(5, 'Emily Davis', '202 Cedar St', 'E567890', '1995-12-05', '555-3434', 300.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale/item`
--

DROP TABLE IF EXISTS `sale/item`;
CREATE TABLE IF NOT EXISTS `sale/item` (
  `Stock_num` int(10) NOT NULL AUTO_INCREMENT,
  `Sale_ID` int(10) NOT NULL,
  `RetailPrice` decimal(4,2) NOT NULL,
  PRIMARY KEY (`Stock_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `Sale_ID` int(10) NOT NULL AUTO_INCREMENT,
  `SaleDate` date NOT NULL,
  `SalePrice` decimal(4,2) NOT NULL,
  PRIMARY KEY (`Sale_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `SupplierID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Website` varchar(50) NOT NULL,
  `Phone_No` int(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  PRIMARY KEY (`SupplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierID`, `Name`, `Address`, `Website`, `Phone_No`, `Email`, `deleted_flag`) VALUES
(1, 'Supplier 1', 'Address 1', 'www.supplier1website.com', 1234567890, 'supplier1@email.com', 0),
(2, 'Supplier 2', 'Address 2', 'www.supplier2website.com', 2147483647, 'supplier2@email.com', 0),
(3, 'Supplier 3', 'Address 3', 'www.supplier3website.com', 2147483647, 'supplier3@email.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `TestID` int(6) NOT NULL AUTO_INCREMENT,
  `PatientID` int(6) NOT NULL,
  `RightEye` float NOT NULL,
  `LeftEye` float NOT NULL,
  `TestDate` date NOT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  PRIMARY KEY (`TestID`),
  KEY `PatientID` (`PatientID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`TestID`, `PatientID`, `RightEye`, `LeftEye`, `TestDate`, `deleted_flag`) VALUES
(1, 1, 1, 1, '2024-01-08', 0),
(2, 2, 1, 1, '2024-01-01', 0);

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
