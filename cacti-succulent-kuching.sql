-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 07:59 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
  `bookedBy` varchar(32) DEFAULT NULL,
  `create_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbookedslot`
--

INSERT INTO `tblbookedslot` (`bookedSlotId`, `bookingSlotId`, `bookedBy`, `create_on`) VALUES
('AID-0001', 'BID-0001', '24', '2022-10-25 13:43:53'),
('AID-0002', 'BID-0001', '26', '2022-11-16 14:27:43'),
('AID-0003', 'BID-0002', '26', '2022-11-16 14:27:50'),
('AID-0004', 'BID-0001', '25', '2022-11-16 15:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookingslot`
--

CREATE TABLE `tblbookingslot` (
  `bookingSlotId` varchar(15) NOT NULL,
  `bookingSlotDate` date DEFAULT NULL,
  `bookingSlotTime` time DEFAULT NULL,
  `bookingSlotTimeNotif` time DEFAULT NULL,
  `bookingSlotStatus` varchar(10) DEFAULT NULL,
  `create_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbookingslot`
--

INSERT INTO `tblbookingslot` (`bookingSlotId`, `bookingSlotDate`, `bookingSlotTime`, `bookingSlotTimeNotif`, `bookingSlotStatus`, `create_on`) VALUES
('BID-0001', '2022-10-31', '10:00:00', '09:30:00', 'OPEN', '2022-10-25 16:36:20'),
('BID-0002', '2022-10-31', '13:00:00', '12:30:00', 'OPEN', '2022-10-25 16:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbldeleted`
--

CREATE TABLE `tbldeleted` (
  `bookedSlotId` varchar(15) NOT NULL,
  `bookingSlotId` varchar(15) NOT NULL,
  `bookedBy` varchar(32) NOT NULL,
  `create_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldeleted`
--

INSERT INTO `tbldeleted` (`bookedSlotId`, `bookingSlotId`, `bookedBy`, `create_on`) VALUES
('AID-0002', 'BID-0001', '23', '2022-10-26 16:59:48'),
('AID-0002', 'BID-0001', '25', '2022-11-10 13:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `tblproductcatalogue`
--

CREATE TABLE `tblproductcatalogue` (
  `stockId` varchar(15) NOT NULL,
  `stockName` varchar(50) DEFAULT NULL,
  `stockDetail` varchar(500) DEFAULT NULL,
  `stockType` varchar(50) DEFAULT NULL,
  `stockPicture` varchar(100) DEFAULT NULL,
  `stockPrice` varchar(10) DEFAULT NULL,
  `stockQuantity` varchar(10) DEFAULT NULL,
  `stockStatus` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproductcatalogue`
--

INSERT INTO `tblproductcatalogue` (`stockId`, `stockName`, `stockDetail`, `stockType`, `stockPicture`, `stockPrice`, `stockQuantity`, `stockStatus`) VALUES
('1', 'Old Lady Cactus (Mammillaria hahniana)', 'The old lady cactus, a type of powder puff cactus, is covered with spines and white down, hence its name. This easy-to-grow, sun-loving plant is a great choice for a beginner.', 'cactus', 'cactus.jpeg', '49', '20', 'Y'),
('2', 'Golden Barrel Cactus (Echinocactus grusonii)', 'This plant, nicknamed the \"mother-in-law cushion\" (ouch!), needs plenty of sun and not much water. A barrel cactus can thrive with watering as infrequently as once every two to three months.', 'cactus', 'cactus1.jpeg', '59', '10', 'Y'),
('3', 'Fairy Castle Cactus (Acanthocereus tetragonus)', 'Who knew a cactus could be whimsical? The varied stems resemble the turrets of a castle, making it the perfect addition to any whimsical garden. This slow-growing cactus can reach up to 6 feet in height. Take note that the fairy castle cactus rarely produces flowers—they\'re often sold with artificial blooms attached. Place it where it will get lots of sun.', 'cactus', 'cactus2.jpeg', '99', '34', 'Y'),
('4', 'Bluebell', 'These beautiful bell-shaped flowers make an impact when planted in large swaths. Bunnies and deer usually leave them alone. Prefers part shade and tend to like moist soils.', 'flower', 'flower.jpg', '99', '30', 'Y'),
('5', 'Tulip', 'There are so many different sizes, shapes and colors of tulips that it\'s impossible to pick just one for your garden! They bloom from early to late spring, and some types are considered annuals because they don\'t put on as good a show in subsequent seasons. Protect tulip bulbs from rodents! Prefers full sun to part shade, depending on the type.', 'flower', 'flower1.jpg', '69', '4', 'Y'),
('6', 'Lavender Bundle Garden Gloves', 'Most gardeners can attest that they go through gloves quite often. Whether they get too dirty, have a hole in them, or a new pair catches their eye, a gardener will always welcome a new pair of gloves.', 'accessory', 'accessory.png', '19', '78', 'Y'),
('7', '9-Piece Succulent Mini Tool Set', 'Tiny succulents, bonsai trees, and other houseplants need tiny tools, and this nine-piece set is ideal for transplanting or digging around in small indoor potted plants. Plus, it\'s super cute!', 'accessory', 'accessory1.jpg', '49', '50', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tblreview`
--

CREATE TABLE `tblreview` (
  `review_id` int(15) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_rating` int(15) NOT NULL,
  `user_review` varchar(255) NOT NULL,
  `user_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblreview`
--

INSERT INTO `tblreview` (`review_id`, `user_name`, `user_rating`, `user_review`, `user_id`) VALUES
(2, 'Ah', 1, 'sick product', 0),
(7, 'xoxo', 4, 'asdadasdada', 26),
(8, 'xoxo', 1, '1231231231', 26),
(9, 'ahbert', 2, 'hello my fren', 25),
(10, 'ahbert', 5, '5 star product', 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `birthday`, `contact_number`, `email`, `user_type`, `password`) VALUES
(1, 'Dowson Kerk', 'Dowson', '2022-10-12', '123123', 'dowson@kerk.gmail', 'user', '900150983cd24fb0d6963f7d28e17f72'),
(20, 'admin', NULL, NULL, NULL, 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(22, 'kelvinc616', 'Kelvin Chen Wei Lung', '2022-10-09', '2147483647', 'kelvinc616@gmail.com', 'user', 'b0eea31431079145436d4c76f4b9c8ef'),
(23, 'UwU', 'Dowson', '2022-09-25', '0167735586', 'dowsonkerk@gmail.com', 'user', 'c4ca4238a0b923820dcc509a6f75849b'),
(25, 'ahbert', 'Wong Chung Hing', '2000-04-02', '0109771761', 'bertbert0402@gmail.com', 'user', '8a5e98f6f0324362aa9d9ec9ced1a3fd'),
(26, 'xoxo', 'Wong', '2000-11-11', '01111111111', '123aa@gmail.com', 'user', '8cd0fee89585a5d46ed73fc3b25dbc11');

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
-- Indexes for table `tblproductcatalogue`
--
ALTER TABLE `tblproductcatalogue`
  ADD PRIMARY KEY (`stockId`);

--
-- Indexes for table `tblreview`
--
ALTER TABLE `tblreview`
  ADD PRIMARY KEY (`review_id`);

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
-- AUTO_INCREMENT for table `tblreview`
--
ALTER TABLE `tblreview`
  MODIFY `review_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `notif_30` ON SCHEDULE EVERY 1 MINUTE STARTS '2022-10-24 21:06:04' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE tblbookingslot
SET bookingSlotTimeNotif = bookingSlotTime - INTERVAL 30 MINUTE$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
