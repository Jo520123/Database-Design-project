-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2018 at 07:27 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiv`
--

-- --------------------------------------------------------

--
-- Table structure for table `log in tracking`
--

CREATE TABLE `log in tracking` (
  `id` int(11) NOT NULL,
  `Store_id` int(11) NOT NULL,
  `St_id` int(11) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `Time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product categories`
--

CREATE TABLE `product categories` (
  `Product_ISN` varchar(50) NOT NULL,
  `P_id` int(11) NOT NULL,
  `Brand_classification` varchar(50) NOT NULL,
  `Place_of_production` varchar(50) NOT NULL,
  `Price_Per_NT` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_tab`
--

CREATE TABLE `product_tab` (
  `Product_id` int(11) NOT NULL,
  `Total_stock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `S_id` int(11) NOT NULL,
  `Store_name` varchar(50) NOT NULL,
  `Phone_number` varchar(20) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Zip_code` int(10) NOT NULL,
  `Region` varchar(10) NOT NULL,
  ` Business_hours` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stores_products`
--

CREATE TABLE `stores_products` (
  `id` int(11) NOT NULL,
  `Store_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `QTY_stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `Store_id` int(11) NOT NULL,
  `P_id` int(11) NOT NULL,
  `QTY_change` int(11) NOT NULL,
  `Date_Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user account`
--

CREATE TABLE `user account` (
  `Staff_id` int(25) NOT NULL,
  `Store_id` int(25) NOT NULL,
  `Account_number` varchar(50) NOT NULL,
  `Password` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log in tracking`
--
ALTER TABLE `log in tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product categories`
--
ALTER TABLE `product categories`
  ADD PRIMARY KEY (`Product_ISN`);

--
-- Indexes for table `product_tab`
--
ALTER TABLE `product_tab`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`S_id`);

--
-- Indexes for table `stores_products`
--
ALTER TABLE `stores_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `QTY_stock` (`QTY_stock`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `QTY_change` (`QTY_change`);

--
-- Indexes for table `user account`
--
ALTER TABLE `user account`
  ADD PRIMARY KEY (`Staff_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
