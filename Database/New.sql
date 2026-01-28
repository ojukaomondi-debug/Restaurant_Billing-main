-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 03:24 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`SN`, `P_Name`, `Category`, `Price`, `P_Image`, `Date_In`) VALUES
(2, 'Pasta', 'Foods', 500, 'https://i.postimg.cc/MKWTbCS5/pexels-alexy-almond-3758132.jpg', '2024-10-24 12:31:28'),
(3, 'Chapati', 'Food', 250, 'https://i.postimg.cc/C5M2tY5P/pexels-saveurssecretes-7625056.jpg', '2024-11-11 19:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SN` int NOT NULL,
  `Reg_No` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `P_Name` varchar(200) NOT NULL,
  `Category` varchar(2000) NOT NULL,
  `Price` int NOT NULL,
  `P_Status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Sales_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SN`, `Reg_No`, `P_Name`, `Category`, `Price`, `P_Status`, `Sales_Date`) VALUES
(8, 'Dse-02-667/2023', 'Pasta', 'food', 566, 'paid', '2024-10-31 16:19:24'),
(9, 'Dse-02-666/2023', 'Burger', 'food', 300, 'paid', '2024-10-31 16:19:24'),
(10, 'Dse-02-666/2023', 'Pasta', 'food', 300, 'paid', '2024-10-31 16:19:24'),
(11, 'Dse-02-667/2023', 'Beef Chicken', 'Food', 700, 'paid', '2024-12-01 16:56:39'),
(12, 'Dse-02-667/2023', 'Milk', 'Food', 120, 'paid', '2024-12-01 16:59:31');

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
  `Pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Reg_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`SN`, `First_Name`, `Last_Name`, `Reg_No`, `Course`, `Email`, `Phone`, `Pass`, `Reg_Date`) VALUES
(1, 'Ismael', 'Bett', 'Dse-02-666/2023', 'Software engeering', 'xyz.termux@gmail.com', '0727405667', '1234', '2024-10-14 00:30:20'),
(7, 'Stephenie', 'Makori', 'Dse-02-667/2023', 'Software engeering', 'design.hopedevelopers@gmail.com', '0727405666', '12345', '2024-10-14 01:12:18'),
(16, 'Emmanual', 'Sang', 'Dse-02-644444/2023', 'Software engeering', 'termux@gmail.com', '0727456789', '123456', '2024-11-06 19:18:02'),
(17, 'Mash', 'Imani', 'DCS-01=0037/2022', 'Computer science', 'mash@gmail.com', '0703164546', 'mash1234', '2024-12-01 16:44:16'),
(19, 'Dan', 'Goldstein', 'CICTZ-04-0076/2023', 'Information Technology', 'dan@gmail.com', '726298899', 'dan1234', '2024-12-01 16:52:20');

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
  MODIFY `SN` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SN` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `SN` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
