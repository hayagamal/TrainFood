-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 05:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trainticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `verification_code` varchar(50) NOT NULL,
  `email_verified_at` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `email`, `verification_code`, `email_verified_at`) VALUES
('hayagamal_', '2yqlWKRW02Xf.', 'hayagamal07@gmail.com', '999228', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `DishName` varchar(30) NOT NULL,
  `dishPrice` int(10) NOT NULL,
  `dishDescription` varchar(100) NOT NULL,
  `dishimage` longblob NOT NULL,
  `dishCategory` varchar(30) NOT NULL,
  `dishID` varchar(10) NOT NULL,
  `Vegan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`DishName`, `dishPrice`, `dishDescription`, `dishimage`, `dishCategory`, `dishID`, `Vegan`) VALUES
('Chicken Sweet & Sour', 100, 'Chicken with thai sauce served with rice', 0x636869636b656e73776565742e6a7067, 'Main Meals', 'D1', 'no'),
('Stuffed Eggplant Salad', 80, 'served with bread', 0x656767706c616e742e6a7067, 'Main Meals', 'D2', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `ordertotal` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `OrderTrackingID` int(11) NOT NULL,
  `OrderStatus` varchar(20) NOT NULL,
  `OrderDesc` varchar(100) NOT NULL,
  `Promocode` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`ordertotal`, `username`, `OrderTrackingID`, `OrderStatus`, `OrderDesc`, `Promocode`) VALUES
(300, 'hayagamal_', 921068, 'Pending', '3 Chicken Sweet & Sour', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewcomment` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewcomment`, `username`) VALUES
('Loved the vegan dishes option! thank you', 'hayagamal_');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
