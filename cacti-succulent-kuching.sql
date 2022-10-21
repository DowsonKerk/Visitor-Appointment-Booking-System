-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 10:09 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
  `product_date_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`product_id`, `product_name`, `images`, `product_description`, `product_price`, `product_offer`, `product_date_start`, `product_date_end`) VALUES
(1001, 'Bunny Ears, Angel Wings', 'image1.png', 'This paddle cactus is a favorite among indoor and outdoor succulent growers. The green pads of this cacti form shrubs. The pads are not covered in spines, but white or yellow aureoles that look like tufts of cotton. Although they may look soft, use caution when handling them!', '399', 50, '2022-10-26', '2022-10-11'),
(1002, 'Copium', 'front_img.png', 'dasda', '100', 20, '2022-10-10', '2022-10-22'),
(1008, 'adsd', 'three_cactus.jpg', 'asdasd', '100', 998, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(1, 'Dowson Kerk', 'dowson@kerk.gmail', 'user', '900150983cd24fb0d6963f7d28e17f72'),
(2, 'UwU', 'dowsonkerk@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b'),
(20, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(21, 'zekai', 'zekai@sohai', 'user', 'c4ca4238a0b923820dcc509a6f75849b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`product_id`);

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
