-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 12:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g00411296`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `BannerID` int(11) NOT NULL,
  `MediaUrl` text NOT NULL,
  `Title` text NOT NULL,
  `TargetUrl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`BannerID`, `MediaUrl`, `Title`, `TargetUrl`) VALUES
(1, 'images/image001.jpeg', 'Image 1', 'https://google.com/'),
(2, 'images/image001.jpeg', 'Image 1', 'https://google.com/'),
(3, 'images/image002.jpg', 'Image 2', 'https://amazon.com/'),
(4, 'images/image003.webp', 'Image 3', 'https://yahoo.com/'),
(5, 'images/image004.jpg', 'Image 4', 'https://microsoft.com/'),
(6, 'images/image005.jpg', 'Image 5', 'https://apple.com/');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Name`, `Description`, `Price`) VALUES
(1, 'Coca-Cola 1L', 'Coca-cola is a refreshing drink', '2.40'),
(3, 'Brady Ham 500g', 'Thin cut Brady ham 500g', '2.30'),
(4, 'Mozarella 300g', 'Italian mozarella easy pack 300g', '1.50'),
(5, 'Avocado 4pc', 'Brazilian avocado pack of 4', '4.00'),
(6, 'Coffee 1kg', 'Italian coffee beans 1kg', '11.49'),
(7, 'Sauvignon Blanc 75Cl', 'Santa Rita Sauvignon Blanc 75Cl \r\nWine of Valle Central, Chile\r\nCertified Sustainable', '8.00'),
(8, 'Doritos Chilli Heatwave 150g', 'Chilli Heatwave Flavour Corn Chips\r\nWin UEFA Women’s Euro tickets or cash instantly!', '2.79'),
(9, 'Heinz Top Down Squeezy Tomato Ketchup Sauce 460g', 'Heinz Top Down Squeezy Tomato Ketchup Sauce 460G\r\nCheck out our tomato ketchup recipes at Heinz.co.uk', '3.19');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `PurchaseID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseproduct`
--

CREATE TABLE `purchaseproduct` (
  `PurchaseID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`BannerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`PurchaseID`);

--
-- Indexes for table `purchaseproduct`
--
ALTER TABLE `purchaseproduct`
  ADD PRIMARY KEY (`PurchaseID`,`ProductID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `BannerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
