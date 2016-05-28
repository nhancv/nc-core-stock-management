-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2016 at 02:31 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock_girldayshop`
--
CREATE DATABASE IF NOT EXISTS `stock_girldayshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `stock_girldayshop`;

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'private id',
  `pid` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'public id',
  `name` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `fb_account` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hcm` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1: in HCM, 0: otherwise',
  `type` int(11) NOT NULL COMMENT '0: normal, 1: special customer',
  `rank` int(11) NOT NULL DEFAULT '0',
  `point` int(11) NOT NULL DEFAULT '0',
  `black_list` int(11) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'private id',
  `pid` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'public id',
  `name` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `material` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `product_type` int(11) DEFAULT NULL COMMENT 'Nhan, Day chuyen, Lac tay, Lac chan, ...',
  `price` int(11) NOT NULL,
  `special_price` int(11) DEFAULT NULL,
  `promotional_price` int(11) DEFAULT NULL,
  `promotional_price_from_date` datetime DEFAULT NULL,
  `promotional_price_to_date` datetime DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Ship`
--

CREATE TABLE `Ship` (
  `uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '0: in hcm, 1: EMS',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Stock`
--

CREATE TABLE `Stock` (
  `uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usr_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prod_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `in_stock` int(11) NOT NULL,
  `available_date` datetime NOT NULL,
  `flexible_date` datetime NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

CREATE TABLE `Transaction` (
  `uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cus_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prod_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usr_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL COMMENT '0: normal, 1: special cus',
  `amount` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `ship_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price_total` int(11) NOT NULL,
  `subscription_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `receiving_date` datetime NOT NULL,
  `sender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'private id',
  `pid` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'public id',
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT '0: owner, 1: assistant, 2: partner, 3: shipper',
  `block` int(11) NOT NULL DEFAULT '0' COMMENT '0: normal, 1: block, 2: wait accept',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='User table';

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`uid`, `pid`, `password`, `name`, `phone`, `address`, `type`, `block`, `create_date`, `update_date`, `author`) VALUES
('59BFB2B0-B593-3020-D09F-527F3FA29125', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Nhan Cao', '', '', 0, 0, '2016-05-28 12:57:34', '2016-05-28 13:14:41', 'Nhan Cao');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `pid` (`pid`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `pid` (`pid`);

--
-- Indexes for table `Ship`
--
ALTER TABLE `Ship`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `pid` (`pid`);

--
-- Indexes for table `Stock`
--
ALTER TABLE `Stock`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `pid` (`pid`),
  ADD KEY `usr_id` (`usr_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `pid` (`pid`),
  ADD KEY `ship_id` (`ship_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `usr_id` (`usr_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `pid` (`pid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Stock`
--
ALTER TABLE `Stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `User` (`uid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `Product` (`uid`) ON UPDATE CASCADE;

--
-- Constraints for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`ship_id`) REFERENCES `Ship` (`uid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`cus_id`) REFERENCES `Customer` (`uid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`prod_id`) REFERENCES `Product` (`uid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`usr_id`) REFERENCES `User` (`uid`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
