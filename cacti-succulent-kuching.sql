-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2022 at 08:36 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cacti-succulent-kuching`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `images` varchar(1000) DEFAULT NULL,
  `product_description` varchar(500) DEFAULT NULL,
  `product_price` varchar(100) DEFAULT NULL,
  `product_offer` int(2) DEFAULT NULL,
  `product_date_start` date DEFAULT NULL,
  `product_date_end` date DEFAULT NULL,
  `create_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`product_id`, `product_name`, `images`, `product_description`, `product_price`, `product_offer`, `product_date_start`, `product_date_end`, `create_on`) VALUES
(1001, 'Bunny Ears, Angel Wings', 'image1.png', 'This paddle cactus is a favorite among indoor and outdoor succulent growers. The green pads of this cacti form shrubs. The pads are not covered in spines, but white or yellow aureoles that look like tufts of cotton. Although they may look soft, use caution when handling them!', '399', 50, '2022-10-26', '2022-10-11', '2022-10-24 15:26:29'),
(1002, 'Copium', 'front_img.png', 'dasda', '100', 20, '2022-10-10', '2022-10-22', '2022-10-24 15:26:29'),
(1008, 'adsd', 'three_cactus.jpg', 'asdasd', '100', 998, '0000-00-00', '0000-00-00', '2022-10-24 15:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookedslot`
--

CREATE TABLE `tblbookedslot` (
  `bookedSlotId` varchar(15) NOT NULL,
  `bookingSlotId` varchar(15) DEFAULT NULL,
  `bookedBy` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbookedslot`
--

INSERT INTO `tblbookedslot` (`bookedSlotId`, `bookingSlotId`, `bookedBy`) VALUES
('AID-0001', 'BID-0001', '24');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookingslot`
--

CREATE TABLE `tblbookingslot` (
  `bookingSlotId` varchar(15) NOT NULL,
  `bookingSlotDate` date DEFAULT NULL,
  `bookingSlotTime` time DEFAULT NULL,
  `bookingSlotStatus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbookingslot`
--

INSERT INTO `tblbookingslot` (`bookingSlotId`, `bookingSlotDate`, `bookingSlotTime`, `bookingSlotStatus`) VALUES
('BID-0001', '2022-10-31', '10:00:00', 'OPEN'),
('BID-0002', '2022-10-31', '13:00:00', 'OPEN');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `contact_number` int(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `birthday`, `contact_number`, `email`, `user_type`, `password`) VALUES
(1, 'Dowson Kerk', 'Dowson', '2022-10-12', 123123, 'dowson@kerk.gmail', 'user', '900150983cd24fb0d6963f7d28e17f72'),
(2, 'kelvin', 'qweqwe', '0000-00-00', 1231231, 'dowsonkerk@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b'),
(20, 'admin', NULL, NULL, NULL, 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(22, 'kelvinc616', 'Kelvin Chen Wei Lung', '2022-10-09', 2147483647, 'kelvinc616@gmail.com', 'user', 'b0eea31431079145436d4c76f4b9c8ef'),
(23, 'UwU', 'Dowson', '2022-09-25', 167735586, 'dowsonkerk@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b'),
(24, 'abc', 'abc', '2022-10-01', 111111111, '123@gmail.com', 'user', '0192023a7bbd73250516f069df18b500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tblbookedslot`
--
ALTER TABLE `tblbookedslot`
  ADD PRIMARY KEY (`bookedSlotId`);

--
-- Indexes for table `tblbookingslot`
--
ALTER TABLE `tblbookingslot`
  ADD PRIMARY KEY (`bookingSlotId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
