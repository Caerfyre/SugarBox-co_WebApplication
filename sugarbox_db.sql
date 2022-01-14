-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 11:57 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sugarbox_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Account_ID` int(11) NOT NULL,
  `Acc_Username` varchar(40) NOT NULL,
  `Acc_Password` varchar(255) NOT NULL,
  `Date_Created` date NOT NULL DEFAULT current_timestamp(),
  `Acc_Status` enum('0','1','2','') NOT NULL COMMENT '0-Banned,1-Inactive (>60 days), 2-Active',
  `User_Type` enum('0','1','','') NOT NULL COMMENT '0-Admin, 1-Customer '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Account_ID`, `Acc_Username`, `Acc_Password`, `Date_Created`, `Acc_Status`, `User_Type`) VALUES
(1, 'admin1', 'admin1', '2022-01-12', '2', '0'),
(2, 'Mary45', 'mary45', '2022-01-12', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cake`
--

CREATE TABLE `cake` (
  `Cake_ID` int(11) NOT NULL,
  `Flavor_Name` varchar(40) NOT NULL,
  `Design_Name` varchar(40) NOT NULL,
  `Design_Description` varchar(100) NOT NULL,
  `CakeSize_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cake`
--

INSERT INTO `cake` (`Cake_ID`, `Flavor_Name`, `Design_Name`, `Design_Description`, `CakeSize_ID`) VALUES
(10, 'Vanilla', 'sea theme', 'with candles and etc', 6);

-- --------------------------------------------------------

--
-- Table structure for table `cake_flavor`
--

CREATE TABLE `cake_flavor` (
  `Flavor_Name` varchar(40) NOT NULL,
  `Flavor_Type` enum('Classic','Fusion','','') NOT NULL COMMENT '''Classic'', ''Fusion'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cake_flavor`
--

INSERT INTO `cake_flavor` (`Flavor_Name`, `Flavor_Type`) VALUES
('Banana', 'Classic'),
('Choco Caramel', 'Fusion'),
('Choco Oreo', 'Fusion'),
('Choco Peanut Butter', 'Fusion'),
('Chocolate', 'Classic'),
('Lemon Vanilla', 'Classic'),
('Mocha', 'Classic'),
('Rainbow Layered', 'Fusion'),
('Red Velvet', 'Classic'),
('Strawberry', 'Classic'),
('Ube', 'Classic'),
('Vanilla', 'Classic'),
('Vanilla Funfetti', 'Fusion');

-- --------------------------------------------------------

--
-- Table structure for table `cake_size`
--

CREATE TABLE `cake_size` (
  `Size_ID` int(11) NOT NULL,
  `Layer_Count` int(1) NOT NULL,
  `Layer_Size` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cake_size`
--

INSERT INTO `cake_size` (`Size_ID`, `Layer_Count`, `Layer_Size`) VALUES
(1, 1, '5 inches'),
(2, 1, '6 inches'),
(3, 1, '7 inches'),
(4, 1, '8 inches'),
(5, 2, '5 in top & 7 in bottom'),
(6, 2, '6 in top & 8 in bottom');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cust_ID` int(11) NOT NULL,
  `Cust_FName` varchar(40) NOT NULL,
  `Cust_LName` varchar(40) NOT NULL,
  `Cust_ContactNo` varchar(11) NOT NULL,
  `Cust_Address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `Ingr_ID` int(11) NOT NULL,
  `Ingr_Name` varchar(24) NOT NULL,
  `Unit_Per_Purchase` varchar(8) NOT NULL,
  `Unit_Price` float(15,2) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Qty_Remaining` float(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(11) NOT NULL,
  `Cust_ID` int(11) NOT NULL,
  `Order_Placement_Date` date NOT NULL,
  `Order_Fullfilment_Date` date NOT NULL,
  `Order_Type` enum('Pick-up','Delivery','','') NOT NULL COMMENT '''Pick-up'', ''Delivery''',
  `Order_Status` enum('Baking soon','In progress','Ready for pick-up','Delivering','Delivery failed','Claimed','Cancelled') NOT NULL COMMENT '''Baking soon'',''In progress'',''Ready for pick-up'',''Delivering'',''Delivery failed'',''Claimed'',''Cancelled''',
  `Total_Price` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `Order_ID` int(11) NOT NULL,
  `Prod_ID` int(11) NOT NULL,
  `Order_Quantity` int(11) NOT NULL,
  `Line_Price` float(15,2) NOT NULL COMMENT 'Price x QTY',
  `Product_Type` enum('C','S','','') NOT NULL COMMENT '''C''-cake, ''S''-side product'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `Payment_Type` enum('Cash','BDO','BPI','Paypal','GCash') NOT NULL,
  `Payment_Status` enum('0','1','2','') NOT NULL COMMENT '0-Not Paid, 1-Partial (50%), 2-Paid '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sideproduct_sizes`
--

CREATE TABLE `sideproduct_sizes` (
  `Size_ID` int(11) NOT NULL,
  `Prod_ID` int(11) NOT NULL,
  `Size_Description` varchar(40) NOT NULL,
  `Size_Price` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sideproduct_sizes`
--

INSERT INTO `sideproduct_sizes` (`Size_ID`, `Prod_ID`, `Size_Description`, `Size_Price`) VALUES
(11, 10, 'Box of 10', 125.00),
(12, 10, 'Box of 8', 100.00),
(13, 10, 'Box of 6', 75.00);

-- --------------------------------------------------------

--
-- Table structure for table `side_products`
--

CREATE TABLE `side_products` (
  `SideProd_ID` int(11) NOT NULL,
  `SideProd_Name` varchar(40) NOT NULL,
  `SideProd_Desc` varchar(100) NOT NULL,
  `SideProd_Image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `side_products`
--

INSERT INTO `side_products` (`SideProd_ID`, `SideProd_Name`, `SideProd_Desc`, `SideProd_Image`) VALUES
(10, 'ubee', 'eeee', '');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `Supplier_ID` int(11) NOT NULL,
  `Supplier_Name` varchar(40) NOT NULL,
  `Supplier_Contact` varchar(10) NOT NULL,
  `Supplier_Address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Account_ID`);

--
-- Indexes for table `cake`
--
ALTER TABLE `cake`
  ADD PRIMARY KEY (`Cake_ID`),
  ADD KEY `cake_ibfk_2` (`Design_Name`),
  ADD KEY `cake_ibfk_3` (`Flavor_Name`),
  ADD KEY `cake_ibfk_4` (`CakeSize_ID`);

--
-- Indexes for table `cake_flavor`
--
ALTER TABLE `cake_flavor`
  ADD PRIMARY KEY (`Flavor_Name`),
  ADD UNIQUE KEY `Flavor_Name` (`Flavor_Name`);

--
-- Indexes for table `cake_size`
--
ALTER TABLE `cake_size`
  ADD PRIMARY KEY (`Size_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cust_ID`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`Ingr_ID`),
  ADD KEY `Supplier_ID` (`Supplier_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Cust_ID` (`Cust_ID`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Prod_ID` (`Prod_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `Order_ID` (`Order_ID`);

--
-- Indexes for table `sideproduct_sizes`
--
ALTER TABLE `sideproduct_sizes`
  ADD PRIMARY KEY (`Size_ID`),
  ADD KEY `Prod_ID` (`Prod_ID`);

--
-- Indexes for table `side_products`
--
ALTER TABLE `side_products`
  ADD PRIMARY KEY (`SideProd_ID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`Supplier_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `Account_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cake`
--
ALTER TABLE `cake`
  MODIFY `Cake_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cake_size`
--
ALTER TABLE `cake_size`
  MODIFY `Size_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cust_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `Ingr_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sideproduct_sizes`
--
ALTER TABLE `sideproduct_sizes`
  MODIFY `Size_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `side_products`
--
ALTER TABLE `side_products`
  MODIFY `SideProd_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `Supplier_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cake`
--
ALTER TABLE `cake`
  ADD CONSTRAINT `cake_ibfk_3` FOREIGN KEY (`Flavor_Name`) REFERENCES `cake_flavor` (`Flavor_Name`) ON DELETE CASCADE,
  ADD CONSTRAINT `cake_ibfk_4` FOREIGN KEY (`CakeSize_ID`) REFERENCES `cake_size` (`Size_ID`) ON DELETE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Cust_ID`) REFERENCES `accounts` (`Account_ID`) ON DELETE CASCADE;

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`Supplier_ID`) REFERENCES `suppliers` (`Supplier_ID`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Cust_ID`) REFERENCES `customer` (`Cust_ID`) ON DELETE CASCADE;

--
-- Constraints for table `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `order_line_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_line_ibfk_2` FOREIGN KEY (`Prod_ID`) REFERENCES `side_products` (`SideProd_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_line_ibfk_3` FOREIGN KEY (`Prod_ID`) REFERENCES `cake` (`Cake_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`) ON DELETE CASCADE;

--
-- Constraints for table `sideproduct_sizes`
--
ALTER TABLE `sideproduct_sizes`
  ADD CONSTRAINT `sideproduct_sizes_ibfk_1` FOREIGN KEY (`Prod_ID`) REFERENCES `side_products` (`SideProd_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
