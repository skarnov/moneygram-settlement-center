-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2015 at 08:38 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evis_moneygram_settlement_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `level` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `name`, `image`, `email`, `password`, `date_time`, `level`, `status`) VALUES
(1, 'Admin', '', 'admin@evis.com', '111111', '2015-09-13 17:06:22', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(4) NOT NULL,
  `category_name` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expenditure`
--

CREATE TABLE IF NOT EXISTS `tbl_expenditure` (
  `expenditure_id` int(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `day` varchar(2) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `description` varchar(30) CHARACTER SET utf8 NOT NULL,
  `amount` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE IF NOT EXISTS `tbl_message` (
  `message_id` int(10) NOT NULL,
  `shop_id` int(2) DEFAULT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `show_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE IF NOT EXISTS `tbl_notification` (
  `notification_id` int(10) NOT NULL,
  `notification_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `notification_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reference_id` varchar(50) NOT NULL,
  `show_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settlement`
--

CREATE TABLE IF NOT EXISTS `tbl_settlement` (
  `settlement_id` int(10) NOT NULL,
  `invoice_id` varchar(20) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `did_transfer` float(10,2) NOT NULL,
  `remarks` varchar(10) NOT NULL,
  `due_date` date NOT NULL,
  `on_date` date NOT NULL,
  `paid` float(10,2) NOT NULL,
  `pending` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE IF NOT EXISTS `tbl_shop` (
  `shop_id` int(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `shop_image` varchar(200) NOT NULL,
  `address` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `balance` float(10,2) NOT NULL,
  `due` float(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `name`, `shop_image`, `address`, `location`, `mobile_number`, `email`, `password`, `balance`, `due`, `status`) VALUES
(14, 'Shanto Shop', '', 'asdfasdfsadf', '23.8136741, 90.4237867', '34534555', 'shop@evis.com', '111111', 0.00, 0.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transection`
--

CREATE TABLE IF NOT EXISTS `tbl_transection` (
  `transection_id` int(6) NOT NULL,
  `shop_id` int(2) NOT NULL,
  `balance` float(10,2) NOT NULL,
  `due` float(10,2) NOT NULL,
  `send` float(10,2) NOT NULL,
  `received` float(10,2) NOT NULL,
  `deposit` float(10,2) NOT NULL,
  `transfer` float(10,2) NOT NULL,
  `cancelled` float(10,2) NOT NULL,
  `MG_gave_in_cash` float(10,2) NOT NULL,
  `paid_in_cash` float(10,2) NOT NULL,
  `multibank` float(10,2) NOT NULL,
  `upload_receipt` varchar(200) NOT NULL,
  `note` text NOT NULL,
  `time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_expenditure`
--
ALTER TABLE `tbl_expenditure`
  ADD PRIMARY KEY (`expenditure_id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `tbl_settlement`
--
ALTER TABLE `tbl_settlement`
  ADD PRIMARY KEY (`settlement_id`);

--
-- Indexes for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_transection`
--
ALTER TABLE `tbl_transection`
  ADD PRIMARY KEY (`transection_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_expenditure`
--
ALTER TABLE `tbl_expenditure`
  MODIFY `expenditure_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `message_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_settlement`
--
ALTER TABLE `tbl_settlement`
  MODIFY `settlement_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `shop_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_transection`
--
ALTER TABLE `tbl_transection`
  MODIFY `transection_id` int(6) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
