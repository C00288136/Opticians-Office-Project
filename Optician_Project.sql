-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 03, 2024 at 11:56 AM
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
  `deleted_flag` int(11) DEFAULT '0',
  PRIMARY KEY (`StockNumber`),
  KEY `SupplierID` (`SupplierID`)
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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `Inventory_ibfk_1` FOREIGN KEY (`SupplierID`) REFERENCES `supplier` (`SupplierID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
