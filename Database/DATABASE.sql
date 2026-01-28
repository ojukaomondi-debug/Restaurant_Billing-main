-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 04:20 PM
-- Server version: 8.0.39
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `SN` int NOT NULL,
  `First_Name` varchar(100) DEFAULT NULL,
  `Last_Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(100) DEFAULT NULL,
  `Pass` varchar(255) DEFAULT NULL,
  `Reg_Date` datetime DEFAULT CURRENT_TIMESTAMP
);
--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`SN`, `First_Name`, `Last_Name`, `Email`, `Phone`, `Pass`, `Reg_Date`) VALUES
(1, 'Ismael', 'Bett', 'kipkoech@gmail.com', '0727405667', '1234', '2024-10-18 09:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `SN` int NOT NULL,
  `P_Name` varchar(100) NOT NULL,
  `Category` varchar(2000) NOT NULL,
  `Price` int NOT NULL,
  `P_Image` varchar(2000) NOT NULL,
  `Date_In` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);
-- Dumping data for table `products`
--

INSERT INTO `products` (`SN`, `P_Name`, `Category`, `Price`, `P_Image`, `Date_In`) VALUES
(1, 'Pasta', 'Foods', 2000, 'https://i.postimg.cc/7ZqD3wMY/pexels-enginakyurt-1460872.jpg', '2024-10-24 12:26:01'),
(2, 'Cheese', 'Foods', 399, 'https://i.postimg.cc/MKWTbCS5/pexels-alexy-almond-3758132.jpg', '2024-10-24 12:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SN` int NOT NULL,
  `Username` varchar(100) NOT NULL,
  `P_Name` varchar(200) NOT NULL,
  `Price` int NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Sales_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `SN` int NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Reg_No` varchar(50) NOT NULL,
  `Course` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Pass` varchar(255) CHARACTER SET NOT NULL,
  `Reg_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`SN`, `First_Name`, `Last_Name`, `Reg_No`, `Course`, `Email`, `Phone`, `Pass`, `Reg_Date`) VALUES
(1, 'Ismael', 'Bett', 'Dse-02-666/2023', 'Software engeering', 'xyz.termux@gmail.com', '0727405667', '1234', '2024-10-14 00:30:20'),
(7, 'Ismael', 'Bett', 'Dse-02-667/2023', 'Software engeering', 'bett@gmail.com', '0727405666', '12345', '2024-10-14 01:12:18'),
(15, 'Ismael', 'Bett', 'DSE-01-8285/2023', 'Software engeering', 'ismaelbett@gmail.com', '0727404667', '1234567', '2024-10-22 18:51:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Phone` (`Phone`),
  ADD UNIQUE KEY `Pass` (`Pass`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `Reg_No` (`Reg_No`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Phone` (`Phone`),
  ADD UNIQUE KEY `PasS` (`Pass`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `SN` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `SN` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SN` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `SN` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
