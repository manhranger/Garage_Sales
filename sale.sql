-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2019 at 09:56 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sale`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ProductID` int(11) NOT NULL,
  `Saleman` varchar(45) NOT NULL,
  `Time_deal` varchar(20) NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `ProductID` int(11) NOT NULL,
  `Image_path` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Productname` varchar(20) NOT NULL,
  `Typename` varchar(20) NOT NULL,
  `Price` int(12) NOT NULL,
  `Manufacturer` varchar(12) DEFAULT NULL,
  `Status` varchar(40) DEFAULT NULL,
  `Moreinfor` varchar(45) DEFAULT NULL,
  `Timestart` varchar(20) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `location` varchar(45) NOT NULL,
  `sole` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Username`, `Productname`, `Typename`, `Price`, `Manufacturer`, `Status`, `Moreinfor`, `Timestart`, `picture`, `location`, `sole`) VALUES
(1, 'Toan@gmail.com', 'iphone 6', 'phone', 5600000, 'china', 'new', 'old ', '22/10/2017', '', 'Hcm', 0),
(2, 'Toan@gmail.com', 'iphone 6', 'phone', 4400000, 'korean', 'new', NULL, '28/10/2017', '', 'Cantho', 0),
(3, 'Tung@gmail.com', 'oppo', 'phone', 2300000, 'canada', 'new', 'not new', '30/10/2019', '', 'Binhduong', 0),
(5, 'google@.com', 'samsung zt', 'tv', 23000000, 'japanese', 'new 50%', 'not', '30/10/2019', 'happy.png', 'Bencat', 0),
(6, 'Toan@gmail.com', 'iphone', 'phone', 2010000, 'china', 'new', '', '17/11/2019', '', 'Cantho', 0),
(7, 'Toan@gmail.com', 'decal', 'camera', 12000, 'canada', 'new', '', '17/11/2019', '../Images/image_prod', 'Hcm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(20) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `name`, `role`) VALUES
('google@.com', '123456', 'HuyenTN', 1),
('Toan@gmail.com', '123456', 'ToanNV', 0),
('Tung@gmail.com', '123456', 'Tung-son', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userinfor`
--

CREATE TABLE `userinfor` (
  `username` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

--
-- Dumping data for table `userinfor`
--

INSERT INTO `userinfor` (`username`, `address`, `phone`, `email`) VALUES
('Tung@gmail.com', 'ben cat province', '0123654747', 'tung@gmail.com'),
('Tung@gmail.com', 'binh duong province', '0123654747', 'cogiao@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `userinfor`
--
ALTER TABLE `userinfor`
  ADD KEY `username` (`username`),
  ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `userinfor`
--
ALTER TABLE `userinfor`
  ADD CONSTRAINT `userinfor_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
