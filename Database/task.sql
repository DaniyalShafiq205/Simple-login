-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 02:40 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(3) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Acode` varchar(255) NOT NULL,
  `Pno` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postal` int(255) NOT NULL,
  `sample` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `fname`, `lname`, `email`, `Acode`, `Pno`, `address1`, `address2`, `city`, `state`, `postal`, `sample`, `notes`) VALUES
(1, 'Mehmood', 'SHafiq', 'sidrashafiq699@gmail.com', '777', '7771231234', 'Area:4-A 63/6 landhi#5 karachi', 'jhghj', 'karachi', 'fgh', 1234, 'Wheatgrass Tray', 'dfgvf'),
(2, 'Rehan', 'Shafiq', 'sidrashafiq699ss@gmail.com', '444', '1231234', 'Area:4-A 63/6 landhi#5 karachi', 'jhghj', 'karachi', 'fgh', 1234, 'Sunflower Bag,Peashoot Bag', 'jhj'),
(3, 'Daniyal', 'fad', 'sidrashafiq699@gmail.com', '789', '7771231234', 'Area:4-A 63/6 landhi#5 karachi', 'jhghj', 'faisalabad', 'fgh', 1234, 'Wheatgrass Tray,Wheatgrass Bag', 'fgdh'),
(4, 'Wajahat', 'hussain', 'sidrashafiq699@gmail.com', '789', '1231234', 'Area:4-A 63/6 landhi#5 karachi', 'jhghj', 'karachi', 'fgh', 1234777, 'Sunflower Bag,Peashoot Bag', 'dfggh'),
(5, 'shafiq ud', 'afv', 'sidrashafiq699@gmail.com', '567', '7771231234', 'Area:4-A 63/6 landhi#5 karachi', 'jhghj', 'lahore', 'fgh', 1234, 'Wheatgrass Tray,Wheatgrass Bag', 'sfdgfh'),
(6, 'Kapil', 'kumar', 'sidrashafiq699@gmail.com', '777', '7771231234', 'Area:4-A 63/6 landhi#5 karachi', 'jhghj', 'karachi', 'fgh', 1234, 'Wheatgrass Bag,Sunflower Bag', 'afdfgfh'),
(7, 'Kumar', 'Shafiq', 'sidrashafiq699ss@gmail.com', '789', '4441231234', 'Area:4-A 63/6 landhi#5 karachi', 'jhghj', 'karachi', 'fgh', 1234, 'Wheatgrass Tray,Peashoot Bag', 'fsdgfh'),
(8, 'Rehan', 'Khan', 'sidrashafiq699ss@gmail.com', '789', '4441231234', 'Area:4-A 63/6 landhi#5 karachi', 'jhghj', 'Peshawar', 'fgh', 1234, 'Sunflower Bag,Peashoot Bag,Buckwheat Bag', 'dffgfh'),
(9, 'Wajahat', 'hussain', 'sidrashafiq699@gmail.com', '789', '7891231234', 'Area:4-A 63/6 landhi#5 karachi', 'jhghj', 'karachi', 'fgh', 1234777, 'Wheatgrass Bag,Buckwheat Bag', 'fbgfhdh'),
(10, 'Rohan', 'Maheswary', 'sidrashafiq699ss@gmail.com', '124', '4441231234', 'Area:4-A 63/6 landhi#5 karachi', 'jhghj', 'Quetta', 'fgh', 1234, 'Wheatgrass Tray', 'dgfh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
