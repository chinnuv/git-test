-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 01:00 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chinnu_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `total` float(10,2) NOT NULL,
  `subtotal_with_tax` float(10,2) NOT NULL,
  `subtotal_without_tax` float(10,2) NOT NULL,
  `discount_percentage` int(11) NOT NULL,
  `discount_amount` float(10,2) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_no`, `total`, `subtotal_with_tax`, `subtotal_without_tax`, `discount_percentage`, `discount_amount`, `created_date`) VALUES
(3, 'INV/19-20/001', 0.00, 0.00, 0.00, 0, 0.00, '2021-06-27 12:54:06'),
(5, 'INV/19-20/002', 0.00, 0.00, 0.00, 0, 0.00, '2021-06-27 12:56:58'),
(6, 'INV/19-20/003', 0.00, 0.00, 0.00, 0, 0.00, '2021-06-27 14:01:28'),
(7, 'INV/19-20/004', 0.00, 0.00, 0.00, 0, 0.00, '2021-06-27 14:04:53'),
(8, 'INV/19-20/005', 399.36, 399.36, 399.36, 399, 399.36, '2021-06-27 14:13:49'),
(9, 'INV/19-20/006', 0.00, 0.00, 0.00, 0, 0.00, '2021-06-27 14:16:24'),
(10, 'INV/19-20/007', 0.00, 0.00, 0.00, 0, 0.00, '2021-06-27 16:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `line_items`
--

CREATE TABLE `line_items` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `tax` int(11) DEFAULT NULL,
  `item_total` float(15,2) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `line_items`
--

INSERT INTO `line_items` (`id`, `invoice_id`, `name`, `quantity`, `unit_price`, `tax`, `item_total`, `date_time`) VALUES
(3, 3, 'bew', 10, '12.00', 3, 120.00, '2021-06-27 09:24:06'),
(5, 5, 'bew', 10, '12.00', 2, 120.00, '2021-06-27 09:26:58'),
(6, 6, 'bew', 10, '12.00', 1, 120.00, '2021-06-27 10:31:28'),
(7, 7, 'test1', 10, '12.00', 1, 120.00, '2021-06-27 10:34:53'),
(8, 7, 'test2', 20, '14.00', 2, 280.00, '2021-06-27 10:34:53'),
(9, 8, 'tes12', 10, '12.00', 1, 120.00, '2021-06-27 10:43:49'),
(10, 8, 'xczxczx', 20, '18.00', 5, 360.00, '2021-06-27 10:43:49'),
(11, 9, 'bew', 10, '12.00', 0, 120.00, '2021-06-27 10:46:24'),
(12, 10, 'bew', 10, '12.00', 1, 120.00, '2021-06-27 12:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 = inactive,1=active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `date_time`, `status`) VALUES
(1, 'Vishnu P', 'chinnuprakash1993@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2021-06-26 20:24:57', 1),
(2, 'chinnu', 'chinnu@gmail.com', '5f31aed87557f62a6be50c014239b81ea1187284', '2021-06-26 20:29:30', 1),
(3, 'asda', 'tt@gmail.com', '2891baceeef1652ee698294da0e71ba78a2a4064', '2021-06-26 21:48:47', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line_items`
--
ALTER TABLE `line_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tax` (`tax`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `line_items`
--
ALTER TABLE `line_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `line_items`
--
ALTER TABLE `line_items`
  ADD CONSTRAINT `line_items_ibfk_2` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
