-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2016 at 12:22 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assetmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE IF NOT EXISTS `asset` (
  `Asset_ID` int(11) NOT NULL,
  `Barcode_No` int(11) DEFAULT NULL,
  `Asset_Name` varchar(60) NOT NULL,
  `Asset_type` varchar(60) NOT NULL,
  `Asset_Category` varchar(60) NOT NULL,
  `Model_No` varchar(60) NOT NULL,
  `Brand` varchar(60) NOT NULL,
  `Serial_No` varchar(60) NOT NULL,
  `Purchase_Date` date NOT NULL,
  `Warranty_End` date NOT NULL,
  `Price` float NOT NULL,
  `Depreciation` float DEFAULT NULL,
  `Last_Value_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Original_Value` float NOT NULL,
  `Current_Value` float DEFAULT NULL,
  `Vendor` varchar(60) NOT NULL,
  `Vendor_Address` text NOT NULL,
  `Current_Division` varchar(60) DEFAULT NULL,
  `Current_Room` varchar(60) DEFAULT NULL,
  `Asset_Code` varchar(60) DEFAULT NULL,
  `Asset_available` tinyint(11) NOT NULL DEFAULT '1',
  `Asset_approved` tinyint(4) NOT NULL DEFAULT '0',
  `Description` text,
  `Entry_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`Asset_ID`, `Barcode_No`, `Asset_Name`, `Asset_type`, `Asset_Category`, `Model_No`, `Brand`, `Serial_No`, `Purchase_Date`, `Warranty_End`, `Price`, `Depreciation`, `Last_Value_date`, `Original_Value`, `Current_Value`, `Vendor`, `Vendor_Address`, `Current_Division`, `Current_Room`, `Asset_Code`, `Asset_available`, `Asset_approved`, `Description`, `Entry_date`) VALUES
(1, 123456, 'MSI Laptop', '1', '1', 'GP60 2QF', 'MSI', '3215648792130321465498751431', '2015-10-15', '2018-10-15', 140000, 0.2, '2016-08-30 22:06:45', 120000, 120000, 'RedLine Technologies', 'Bambalapitiya', 'NOC', 'W002', 'UCSC/NOC/W002/1', 1, 1, NULL, '2016-08-03 16:47:56'),
(3, 14568, 'HP Computer', '1', '1', 'Hp-31879', 'HP', '13256-12345-15489', '0000-00-00', '0000-00-00', 123000, 0.2, '2016-06-23 22:17:43', 123000, 123000, 'DMS', 'DMS-Borella', 'NOC', 'W002', 'UCSC/NOC/W002/3', 0, 1, NULL, '2016-08-03 16:47:56'),
(4, 112346, 'HP Laptop', '1', '1', '732678649876', 'HP', '123456-123456-456789', '0000-00-00', '0000-00-00', 200000, 0.4, '2016-06-27 14:11:57', 200000, 200000, 'DMS', 'DMS-Borella', 'NOC', 'W002', 'UCSC/NOC/W002/4', 0, 1, NULL, '2016-08-03 16:47:56'),
(5, 54623, 'Asus Laptop', '1', '1', '1234-2134', 'Asus', '13212315-12313213-13213213', '2016-06-08', '2018-06-08', 70000, 0.1, '2016-06-30 01:42:11', 70000, 70000, 'DMS', 'DMS-Borella', 'FD', 'W002', 'UCSC/FD/W002/5', 1, 1, NULL, '2016-08-03 16:47:56'),
(11, 123456458, 'HP Laptop', '1', '1', '123456', 'HP', '123456789', '0000-00-00', '0000-00-00', 123000, 0.3, '2016-08-08 11:06:33', 123000, 123000, 'DMS', 'DMS-Borella', 'DIR', 'W001', 'UCSC/DIR/W001/11', 1, 1, NULL, '2016-08-08 11:06:33'),
(12, 12131, 'HP Laptop', '1', '1', '1213515646847', 'HP', '1234564647-212131-1213', '0000-00-00', '0000-00-00', 112235000, 0.2, '2016-08-30 02:11:53', 112250, 112250, 'DMS', 'DMS-Borella', 'NOC', 'W300', 'UCSC/NOC/W300/12', 1, 1, NULL, '2016-08-30 02:11:53'),
(15, 456456, 'HP Desktop', '1', '1', '123456', 'HP', '123456489-132456478', '2016-08-23', '2019-08-23', 120000, 0.2, '2016-08-30 11:26:11', 120000, 120000, 'DMS', 'DMS-Borella', 'NOC', 'W002', 'UCSC/NOC/W002/15', 1, 1, NULL, '2016-08-30 11:26:11'),
(16, 123456789, 'HP Laptop', '1', '1', 'GP60 2QF Leopard Pro', 'MSI', '1234567498-12345679', '2016-08-30', '2016-09-16', 140000, 0.5, '2016-08-30 13:07:00', 140000, 140000, 'RedLine Technologies', 'Bambalapitiya', 'NOC', 'W002', 'UCSC/NOC/W002/16', 1, 1, NULL, '2016-08-30 13:07:00'),
(20, 145236987, 'HP Laptop', '1', '1', 'GP60 2QF Leopard Pro', 'MSI', '1234567498-12345679', '2016-08-30', '2016-09-16', 140000, 0.5, '2016-08-30 13:09:19', 140000, 140000, 'RedLine Technologies', 'Bambalapitiya', 'NOC', 'W001', 'UCSC/NOC/W001/20', 1, 1, NULL, '2016-08-30 13:09:19'),
(24, 2147483647, 'HP Laptop', '1', '1', 'GP60 2QF Leopard Pro', 'MSI', '1234567498-12345679', '2016-08-30', '2016-09-16', 140000, 0.5, '2016-08-30 13:10:56', 140000, 140000, 'RedLine Technologies', 'Bambalapitiya', 'NOC', 'W002', 'UCSC/NOC/W002/24', 1, 1, NULL, '2016-08-30 13:10:56'),
(26, 12301452, 'SINGER Laptop', '1', '1', '12345678', 'SINGER', '1420212', '2016-08-16', '2016-09-24', 13203, 0.2, '2016-08-30 16:29:15', 13203, 13203, 'Abans', 'Abans-Borella', 'NOC', 'W002', 'UCSC/NOC/W002/26', 1, 1, NULL, '2016-08-30 16:29:15'),
(27, 1234, 'ASUS Laptop', '1', '1', '4500 series', 'ASUS', '1234567-98732165', '2016-08-31', '2017-10-10', 80000, 0.2, '2016-08-30 19:57:06', 80000, 80000, 'Barclays', 'Bambaalapitiya', 'NOC', 'W002', 'UCSC/NOC/W002/27', 1, 1, NULL, '2016-08-30 19:57:06'),
(28, 56984, 'AlienWare Laptop', '1', '1', '3526-Alien', 'Dell', '322165546-2131313121', '2016-08-02', '2017-09-29', 500000, 0.2, '2016-08-30 23:06:14', 500000, 500000, 'Abans', 'Abans-Borella', 'NOC', 'W001', 'UCSC/NOC/W001/28', 1, 1, NULL, '2016-08-30 23:06:14'),
(29, 1256, 'WheelChair', '3', '1', '125F', 'Damro', '', '2016-08-09', '2017-09-29', 5000, 0.3, '2016-08-30 23:18:14', 5000, 5000, 'Damro', 'Damro-Borella', 'NOC', 'W002', 'UCSC/NOC/W002/29', 1, 1, NULL, '2016-08-30 23:18:14'),
(30, 1526, 'HP Desktop', '1', '1', '3562', 'HP', '123506-1213154', '2016-08-23', '2019-01-04', 200000, 0.2, '2016-08-31 01:21:57', 200000, 200000, 'DMS', 'DMS-Borella', 'NOC', 'W002', 'UCSC/NOC/W002/30', 1, 1, NULL, '2016-08-31 01:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `asset_category`
--

CREATE TABLE IF NOT EXISTS `asset_category` (
  `asset_category_id` int(11) NOT NULL,
  `asset_category` varchar(60) NOT NULL,
  `category_description` text NOT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_category`
--

INSERT INTO `asset_category` (`asset_category_id`, `asset_category`, `category_description`, `type_id`) VALUES
(1, 'Office Equipment', 'fghfhfgh', 1),
(2, 'Maintenance Equipment', 'sdsdfsdfsdfsdf', NULL),
(4, 'Measuring', 'sdfsfsf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `asset_movement`
--

CREATE TABLE IF NOT EXISTS `asset_movement` (
  `asset_id` int(11) NOT NULL,
  `old_division` varchar(4) DEFAULT NULL,
  `old_room` varchar(4) DEFAULT NULL,
  `new_division` varchar(4) NOT NULL,
  `new_room` varchar(4) NOT NULL,
  `verified` tinyint(4) DEFAULT NULL,
  `move_date` datetime DEFAULT NULL,
  `verify_date` datetime DEFAULT NULL,
  `moved_by` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_movement`
--

INSERT INTO `asset_movement` (`asset_id`, `old_division`, `old_room`, `new_division`, `new_room`, `verified`, `move_date`, `verify_date`, `moved_by`, `approved_by`) VALUES
(1, '+', '+', 'FD', 'W001', 1, '2016-06-22 12:12:54', '2016-06-28 08:45:15', 4, 3),
(3, '+', '+', 'NOC', 'W002', 1, '2016-06-23 10:54:21', '2016-06-23 10:57:48', 4, NULL),
(4, '+', '+', 'NOC', 'W002', 1, '2016-06-27 10:54:21', '2016-06-28 10:57:48', 4, NULL),
(5, '+', '+', 'FD', 'W123', 1, '2016-06-29 00:00:00', '2016-06-29 22:37:31', 4, 6),
(5, 'FD', 'W123', 'FD', 'W002', 1, '2016-06-29 22:45:57', '2016-06-29 22:46:08', 6, 6),
(5, 'FD', 'W002', 'NOC', 'W123', NULL, '2016-06-29 23:00:17', NULL, 6, NULL),
(1, 'FD', 'W001', 'FD', 'W002', 1, '2016-08-05 13:06:38', '2016-08-05 13:09:23', 8, 8),
(1, 'FD', 'W002', 'FD', 'W123', 1, '2016-08-08 14:44:28', '2016-08-08 14:45:43', 6, 6),
(11, '+', '+', 'DIR', 'W001', NULL, '2016-08-08 15:07:58', NULL, 4, NULL),
(1, 'NOC', 'W123', 'NOC', 'W001', 1, '2016-08-08 20:43:09', '2016-08-08 20:45:30', 6, 4),
(1, 'NOC', 'W001', 'FD', 'W123', 1, '2016-08-29 12:43:32', '2016-08-29 12:46:09', 4, 8),
(1, 'FD', 'W123', 'LIB', 'W123', 1, '2016-08-29 21:44:52', '2016-08-29 23:06:35', 8, 13),
(5, 'FD', 'W002', 'LIB', 'W123', NULL, '2016-08-29 21:44:52', NULL, 8, NULL),
(1, 'FD', 'W123', 'APB', 'W001', 1, '2016-08-29 23:05:11', '2016-08-29 23:06:35', 8, 13),
(1, 'FD', 'W123', 'APB', 'W300', 1, '2016-08-29 23:05:28', '2016-08-29 23:06:35', 8, 13),
(1, 'APB', 'W300', 'NOC', 'W001', 1, '2016-08-29 23:32:54', '2016-08-30 09:47:36', 13, 4),
(12, '+', '+', 'NOC', 'W300', 1, '2016-08-30 09:44:32', '2016-08-30 13:24:16', 4, 4),
(15, '+', '+', 'NOC', 'W001', 1, '2016-08-30 09:44:33', '2016-08-30 13:24:17', 4, 4),
(16, '+', '+', 'NOC', 'W001', 1, '2016-08-30 09:44:34', '2016-08-30 13:24:18', 4, 4),
(20, '+', '+', 'NOC', 'W001', 1, '2016-08-30 09:44:35', '2016-08-30 13:24:19', 4, 4),
(24, '+', '+', 'NOC', 'W002', 1, '2016-08-30 09:44:36', '2016-08-30 13:24:20', 4, 4),
(26, '+', '+', 'NOC', 'W002', 1, '2016-08-30 13:07:47', '2016-08-30 13:24:22', 4, 4),
(16, 'NOC', 'W001', 'NOC', 'W002', 1, '2016-08-30 13:36:10', '2016-08-30 13:36:14', 4, 4),
(20, 'NOC', 'W001', 'NOC', 'W002', 1, '2016-08-30 13:36:10', '2016-08-30 13:36:15', 4, 4),
(27, '+', '+', 'NOC', 'W002', 1, '2016-08-30 18:38:59', '2016-08-30 19:44:32', 10, 4),
(1, 'NOC', 'W001', 'NOC', 'W002', 1, '2016-08-30 19:04:22', '2016-08-30 19:30:30', 4, 4),
(26, 'NOC', 'W002', 'NOC', 'W002', 1, '2016-08-30 19:30:49', '2016-08-30 19:30:54', 4, 4),
(15, 'NOC', 'W001', 'NOC', 'W002', 1, '2016-08-30 19:33:06', '2016-08-30 19:33:09', 4, 4),
(16, 'NOC', 'W002', 'NOC', 'W002', 1, '2016-08-30 19:33:06', '2016-08-30 19:33:10', 4, 4),
(28, '+', '+', 'NOC', 'W001', 1, '2016-08-30 19:37:01', '2016-08-30 19:48:47', 0, 4),
(28, '+', '+', 'NOC', 'W001', 1, '2016-08-30 19:38:42', '2016-08-30 19:48:47', 0, 4),
(28, '+', '+', 'NOC', 'W001', 1, '2016-08-30 19:39:46', '2016-08-30 19:48:47', 0, 4),
(28, '+', '+', 'NOC', 'W001', 1, '2016-08-30 19:43:57', '2016-08-30 19:48:47', 0, 4),
(28, '+', '+', 'NOC', 'W001', 1, '2016-08-30 19:46:18', '2016-08-30 19:48:47', 11, 4),
(29, '+', '+', 'NOC', 'W002', 1, '2016-08-30 19:48:31', '2016-08-30 19:48:52', 11, 4),
(12, 'NOC', 'W300', 'APB', '', NULL, '2016-08-30 21:11:34', NULL, 4, NULL),
(30, '+', '+', 'NOC', 'W002', 1, '2016-08-30 21:52:16', '2016-08-30 21:52:27', 11, 4),
(1, 'NOC', 'W002', 'NOC', 'W002', 1, '2016-08-30 22:13:51', '2016-08-30 22:13:57', 4, 4),
(20, 'NOC', 'W002', 'NOC', 'W001', 1, '2016-08-31 12:06:44', '2016-08-31 12:06:52', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `asset_photo`
--

CREATE TABLE IF NOT EXISTS `asset_photo` (
  `asset_id` int(11) NOT NULL,
  `asset_photo_id` varchar(60) NOT NULL,
  `photo_path` text NOT NULL,
  `verified` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_photo`
--

INSERT INTO `asset_photo` (`asset_id`, `asset_photo_id`, `photo_path`, `verified`) VALUES
(1, 'Warframe0011.jpg', 'asset_images/1/Warframe0011.jpg', 1),
(1, 'Warframe0012.jpg', 'asset_images/1/Warframe0012.jpg', 1),
(1, 'Warframe0042.jpg', 'asset_images/1/Warframe0042.jpg', 1),
(1, 'Warframe0043.jpg', 'asset_images/1/Warframe0043.jpg', 1),
(1, 'Warframe0044.jpg', 'asset_images/1/Warframe0044.jpg', 1),
(4, 'Warframe0215.jpg', 'asset_images/4/Warframe0215.jpg', 1),
(4, 'Warframe0215.jpg', 'asset_images/4/Warframe0215.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `asset_type`
--

CREATE TABLE IF NOT EXISTS `asset_type` (
  `asset_type_id` int(11) NOT NULL,
  `asset_type` varchar(60) NOT NULL,
  `type_description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_type`
--

INSERT INTO `asset_type` (`asset_type_id`, `asset_type`, `type_description`) VALUES
(1, 'Computer Equipment', 'Computer Equipment'),
(3, 'sdfsdfsdf', 'sdfsdfsdfddfgdfgdfgdfg'),
(4, 'Furniture', '');

-- --------------------------------------------------------

--
-- Table structure for table `bos`
--

CREATE TABLE IF NOT EXISTS `bos` (
  `record_id` int(11) NOT NULL,
  `new_barcode` int(11) NOT NULL,
  `current_division` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `current_room` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `broken` int(11) NOT NULL,
  `checked` int(11) NOT NULL,
  `location_change` int(11) NOT NULL,
  `re_valueable` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bos`
--

INSERT INTO `bos` (`record_id`, `new_barcode`, `current_division`, `current_room`, `year`, `broken`, `checked`, `location_change`, `re_valueable`) VALUES
(1, 123456, 'NOC', 'w001', 2016, 0, 1, 0, 1),
(2, 1526, 'NOC', 'W002', 2016, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `depreciation`
--

CREATE TABLE IF NOT EXISTS `depreciation` (
  `Date` datetime NOT NULL,
  `Barcode` int(11) NOT NULL,
  `Previous_Value` float NOT NULL,
  `New_Value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depreciation`
--

INSERT INTO `depreciation` (`Date`, `Barcode`, `Previous_Value`, `New_Value`) VALUES
('2016-08-04 20:20:54', 123456, 113400, 102060);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `Division_Code` varchar(4) NOT NULL,
  `Division_Name` varchar(60) NOT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`Division_Code`, `Division_Name`, `Description`) VALUES
('APB', 'Academic and Publications Branch', ''),
('DIR', 'Director Office', 'Hello'),
('FD', 'Finance Department', 'Money goes here'),
('LIB', 'Library', 'Books are here'),
('MTC', 'ADMTC', ''),
('NOC', 'Network Operating Center', ''),
('PDC', 'PDC', ''),
('SDU', 'Software Development Unit', 'Software Development Unit');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `Message_id` int(11) NOT NULL,
  `From_Division` varchar(4) NOT NULL,
  `To_Division` varchar(4) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  `Date_Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Message_read` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Message_id`, `From_Division`, `To_Division`, `Title`, `Message`, `Date_Time`, `Message_read`) VALUES
(1, 'DIR', 'NOC', 'Requesting 2 computers', 'We are in need of 2 computers for networking purposes. please supply asap.', '2016-08-29 21:04:47', 1),
(2, 'DIR', 'NOC', 'Processed Request', 'We have happily processed your request. ', '2016-08-29 21:40:38', 1),
(3, 'DIR', 'NOC', 'Return Items', 'We have returned the items happily back. Thank you for your cooperation', '2016-08-29 21:45:54', 1),
(4, 'DIR', 'NOC', 'Need 2 Routers', 'We are in need of 2 routers for our work', '2016-08-29 23:55:25', 1),
(5, 'DIR', 'NOC', 'Need 2 routers', 'We are in need of 2 routers\r\n', '2016-08-30 02:26:34', 1),
(6, 'DIR', 'NOC', 'Need 2 router', 'mksdnl;ksadj;s', '2016-08-30 02:28:55', 1),
(7, 'APB', 'APB', 'Need 2 routers', 'Need 2 routers', '2016-08-30 02:30:00', 0),
(8, 'NOC', 'LIB', 'nksdlhokdsgh', 'nlkasfnlkfadsjlkajfd', '2016-08-30 21:05:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `Room_code` varchar(4) NOT NULL,
  `Room_name` varchar(60) NOT NULL,
  `Division` varchar(4) NOT NULL,
  `Wing` varchar(10) NOT NULL,
  `Floor` varchar(11) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Room_code`, `Room_name`, `Division`, `Wing`, `Floor`, `Description`) VALUES
('112', 'New Rooms', 'LIB', 'East', 'Ground', ''),
('335', 'New Rooms', 'LIB', 'East', 'Ground', ''),
('E002', 'PDC Room', 'PDC', 'East', 'Ground', ''),
('E301', 'ADMTC Room 01', 'MTC', 'East', 'Third', ''),
('E302', 'ADMTC Room', 'MTC', 'East', 'Third', ''),
('N002', 'Room 1', 'SDU', 'West', 'Fourth', ''),
('N003', 'Room 2', 'SDU', 'North', 'Fourth', ''),
('W001', 'W001 Hall', 'NOC', 'West', 'Ground', ''),
('W002', 'W002 hall', 'NOC', 'West', 'Ground', ''),
('W110', 'Lab B', 'NOC', 'West', 'First', ''),
('W123', 'Accounts Room', 'FD', 'West', 'First', ''),
('W126', 'Library', 'LIB', 'West', 'Second', ''),
('W127', 'Library', 'LIB', 'West', 'Second', ''),
('W300', 'Academic Room', 'APB', 'West', 'Third', '');

-- --------------------------------------------------------

--
-- Table structure for table `temp_asset`
--

CREATE TABLE IF NOT EXISTS `temp_asset` (
  `Temp_asset_id` int(11) NOT NULL,
  `Asset_Name` varchar(60) NOT NULL,
  `Asset_Description` text NOT NULL,
  `Asset_type` int(11) NOT NULL,
  `Asset_Category` int(11) NOT NULL,
  `Division` varchar(60) NOT NULL,
  `Room` varchar(60) NOT NULL,
  `Asset_Resolved` tinyint(1) NOT NULL DEFAULT '0',
  `Related_asset` int(11) DEFAULT NULL,
  `Barcode` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_asset`
--

INSERT INTO `temp_asset` (`Temp_asset_id`, `Asset_Name`, `Asset_Description`, `Asset_type`, `Asset_Category`, `Division`, `Room`, `Asset_Resolved`, `Related_asset`, `Barcode`) VALUES
(1, 'HP Desktop', '', 1, 2, 'NOC', 'W002', 0, NULL, 156234),
(2, 'HP Laptop', 'Used HP Probook Laptop', 1, 1, 'FD', 'W001', 1, 4, 4856971);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_ID` int(11) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `user_level` varchar(60) NOT NULL,
  `division` varchar(4) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `Contact_Number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `user_email`, `user_password`, `first_name`, `last_name`, `user_level`, `division`, `gender`, `Contact_Number`) VALUES
(4, 'thilinaviraj950@gmail.com', '$2y$10$ydz4Z0y7aF0mhRvf8e7vHOj7HnmvthLzEx1cYi2MnToQY3ALYKclq', 'Thilina', 'Viraj', 'div_asset_clerk', 'NOC', 'm', '0719783950'),
(5, 'hasithdthenuwara@gmail.com', '$2y$10$0lJwAG.PZPub5JPSq.HcxOR2ZSLkTr.LHvzXZ/6p0hEbB44D0a8mi', 'Hasith', 'Thenuwara', 'system_admin', 'DIR', 'm', '0718822516'),
(8, 'kavinda.rasnayake@gmail.com', '$2y$10$9F8j5oOp9h5mQt/T9q0JG.2i5DhxdFcanrw1GufR2gZyA3wzZHkDO', 'Kavinda', 'Rasnayake', 'div_asset_clerk', 'FD', 'm', '0771234567'),
(10, 'shyamah@gmail.com', '$2y$10$tflQgDQbXvFwoNjedboFN.LxtcrG48MY5a0w1QpaRI0xlG16xlffu', 'Shyama', 'Hemachaya', 'asset_clerk', 'FD', 'm', '0714856132'),
(11, 'shyamahemachaya@gmail.com', '$2y$10$hpGAR5KJbmVMIL8tMymxXuVmkrYV6IgsrOHNw3uBXlpXf8cfciCVO', 'Shyama', 'Hemachaya', 'bursar', 'FD', 'm', '0714813659'),
(12, 'hasiththeyaka@gmail.com', '$2y$10$cxSyOfmoAr/cbXM20qoJsOnSYN/ID9wixqhIUQGCiuqbR5y3Dv0RO', 'Hasith', 'Yaka', 'temp_user', 'APB', 'm', '0716532185'),
(13, 'lasithniroshan@gmail.com', '$2y$10$JAyJiwBzP60FELO1e4bKNeEshjTFZzkWVf1PqFg9rGkrShis5i/C2', 'Lasith', 'Niroshan', 'div_asset_clerk', 'APB', 'm', '0711234567'),
(14, 'surangi@gmail.com', '$2y$10$KtkHMAN1b.aeO5kw3q7AyOgbYVSBis8F1DiuC/vNYvNl489k25DKi', 'suran', 'Edirisinghe', 'div_asset_clerk', 'APB', 'f', '0778053963'),
(16, 'rasnayake.kavinda@gmail.com', '$2y$10$pQLa.cyvNfPhOCEteFXImO5rxg34FNsjs09HKPUpBMs.twjFTWhh6', 'Keshan', 'Rasnayake', 'system_admin', 'FD', 'm', '0716231506');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`Asset_ID`),
  ADD UNIQUE KEY `Barcode No` (`Barcode_No`),
  ADD KEY `Current_Division` (`Current_Division`),
  ADD KEY `Current_Room` (`Current_Room`),
  ADD KEY `Asset_ID` (`Asset_ID`),
  ADD KEY `Asset_Name` (`Asset_Name`);

--
-- Indexes for table `asset_category`
--
ALTER TABLE `asset_category`
  ADD PRIMARY KEY (`asset_category_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `asset_type`
--
ALTER TABLE `asset_type`
  ADD PRIMARY KEY (`asset_type_id`);

--
-- Indexes for table `bos`
--
ALTER TABLE `bos`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`Division_Code`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Message_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_code`),
  ADD KEY `Division` (`Division`);

--
-- Indexes for table `temp_asset`
--
ALTER TABLE `temp_asset`
  ADD PRIMARY KEY (`Temp_asset_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `division` (`division`),
  ADD KEY `user_email_2` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `Asset_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `asset_category`
--
ALTER TABLE `asset_category`
  MODIFY `asset_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `asset_type`
--
ALTER TABLE `asset_type`
  MODIFY `asset_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bos`
--
ALTER TABLE `bos`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `Message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `temp_asset`
--
ALTER TABLE `temp_asset`
  MODIFY `Temp_asset_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `asset`
--
ALTER TABLE `asset`
  ADD CONSTRAINT `asset_ibfk_1` FOREIGN KEY (`Current_Division`) REFERENCES `division` (`Division_Code`),
  ADD CONSTRAINT `asset_ibfk_2` FOREIGN KEY (`Current_Room`) REFERENCES `room` (`Room_code`);

--
-- Constraints for table `asset_category`
--
ALTER TABLE `asset_category`
  ADD CONSTRAINT `asset_category_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `asset_type` (`asset_type_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`Division`) REFERENCES `division` (`Division_Code`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`division`) REFERENCES `division` (`Division_Code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
