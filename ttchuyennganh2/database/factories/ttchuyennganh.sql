-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2021 at 05:15 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttchuyennganh`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_detail`
--

CREATE TABLE `car_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `rental_company` varchar(500) NOT NULL,
  `car_type` varchar(500) NOT NULL,
  `car_name` varchar(500) NOT NULL,
  `passengers` int(11) NOT NULL,
  `baggage` int(11) NOT NULL,
  `car_features` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `hot` int(11) NOT NULL,
  `pick_up_location_details` varchar(500) NOT NULL,
  `drop_off_location_details` varchar(500) NOT NULL,
  `pick_up_time` date NOT NULL,
  `drop_off_time` date NOT NULL,
  `pick_up_location` varchar(500) NOT NULL,
  `drop_out_location` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_detail`
--

INSERT INTO `car_detail` (`id`, `name`, `price`, `discount`, `rental_company`, `car_type`, `car_name`, `passengers`, `baggage`, `car_features`, `description`, `hot`, `pick_up_location_details`, `drop_off_location_details`, `pick_up_time`, `drop_off_time`, `pick_up_location`, `drop_out_location`) VALUES
(1, '1', 1, 4, '1', '1', '1', 1, 11, '1', '1', 1, '1', '1', '0004-11-01', '0001-01-01', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `car_images`
--

CREATE TABLE `car_images` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_images`
--

INSERT INTO `car_images` (`id`, `name`, `car_id`) VALUES
(1, '1616991866_06.jpg', 1),
(2, '1616991866_09.jpg', 1),
(3, '1616991866_11.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cruise_detail`
--

CREATE TABLE `cruise_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `hot` int(11) NOT NULL,
  `date_launched` date NOT NULL,
  `age_of_ship` date NOT NULL,
  `refurbished_date` date NOT NULL,
  `tonnage` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `beam` int(11) NOT NULL,
  `draft` int(11) NOT NULL,
  `speed` float NOT NULL,
  `guest_capacity` int(11) NOT NULL,
  `total_staff` int(11) NOT NULL,
  `officers` varchar(500) NOT NULL,
  `dining_crew` varchar(500) NOT NULL,
  `other_crew` varchar(500) NOT NULL,
  `registry` varchar(500) NOT NULL,
  `ship_type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cruise_detail`
--

INSERT INTO `cruise_detail` (`id`, `name`, `price`, `discount`, `description`, `hot`, `date_launched`, `age_of_ship`, `refurbished_date`, `tonnage`, `length`, `beam`, `draft`, `speed`, `guest_capacity`, `total_staff`, `officers`, `dining_crew`, `other_crew`, `registry`, `ship_type`) VALUES
(7, '1', 1, 1, '1', 0, '0001-11-01', '0001-01-01', '0001-01-01', 11, 1, 1, 1, 1, 1, 11, '1', '1', '1', '1', '1'),
(8, '2', 2, 2, '2', 1, '0002-02-02', '0002-02-02', '0002-02-02', 2, 2, 2, 2, 2, 2, 2, '2', '2', '22', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `cruise_images`
--

CREATE TABLE `cruise_images` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `cruise_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cruise_images`
--

INSERT INTO `cruise_images` (`id`, `name`, `cruise_id`) VALUES
(1, '1617115502_02.jpg', 1),
(2, '1617115502_06.jpg', 1),
(3, '1617115502_09.jpg', 1),
(4, '1617115502_11.jpg', 1),
(5, '1617115502_20.jpg', 1),
(6, '1617115543_04.jpg', 7),
(7, '1617115543_05.jpg', 7),
(8, '1617115543_06.jpg', 7),
(9, '1617115544_09.jpg', 7),
(10, '1617115544_11.jpg', 7),
(11, '1617115911_02 - Copy.jpg', 8),
(12, '1617115911_05 - Copy.jpg', 8),
(13, '1617115911_06 - Copy.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `flight_detail`
--

CREATE TABLE `flight_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `airline` varchar(500) NOT NULL,
  `flight_type` varchar(500) NOT NULL,
  `fare_type` varchar(500) NOT NULL,
  `cancellation` int(11) NOT NULL,
  `flight_change` int(11) NOT NULL,
  `seats_baggage` varchar(500) NOT NULL,
  `inflight_feature` varchar(500) NOT NULL,
  `base_fare` int(11) NOT NULL,
  `taxes_fees` int(11) NOT NULL,
  `hot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight_detail`
--

INSERT INTO `flight_detail` (`id`, `name`, `price`, `discount`, `description`, `airline`, `flight_type`, `fare_type`, `cancellation`, `flight_change`, `seats_baggage`, `inflight_feature`, `base_fare`, `taxes_fees`, `hot`) VALUES
(1, '1', 11, 1, '1', '1', '1', '11', 1, 1, '1', '1', 1, 11, 0),
(2, '2', 2, 2, '2', '2', '2', '2', 2, 22, '2', '2', 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `flight_images`
--

CREATE TABLE `flight_images` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `flight_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight_images`
--

INSERT INTO `flight_images` (`id`, `name`, `flight_id`) VALUES
(1, '1617116711_02.jpg', 1),
(2, '1617116711_04.jpg', 1),
(3, '1617116711_05 - Copy.jpg', 1),
(4, '1617116920_02.jpg', 2),
(5, '1617116920_04.jpg', 2),
(6, '1617116920_05 - Copy.jpg', 2),
(7, '1617116920_05.jpg', 2),
(8, '1617116920_06.jpg', 2),
(9, '1617116920_09.jpg', 2),
(10, '1617116920_11.jpg', 2),
(11, '1617116920_13.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_detail`
--

CREATE TABLE `hotel_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `hot` int(11) NOT NULL,
  `available_from` date NOT NULL,
  `available_to` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `hotel_type` varchar(500) NOT NULL,
  `extra_people` int(11) NOT NULL,
  `minium_stay` int(11) NOT NULL,
  `city` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_detail`
--

INSERT INTO `hotel_detail` (`id`, `name`, `price`, `discount`, `hot`, `available_from`, `available_to`, `description`, `hotel_type`, `extra_people`, `minium_stay`, `city`, `country`) VALUES
(31, '1', 1, 1, 0, '0001-11-01', '0001-01-01', '1', '1', 11, 1, '1', '1'),
(32, '65', 465, 465, 1, '0456-06-04', '0006-04-05', '455', '465', 4, 654, '654', '654'),
(33, 'qwe', 123, 123, 0, '0001-01-01', '0001-01-01', '1', '1', 1, 1, '123123', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_images`
--

CREATE TABLE `hotel_images` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_images`
--

INSERT INTO `hotel_images` (`id`, `name`, `hotel_id`) VALUES
(78, '1616861779_airline-img.png', 31),
(79, '1616861779_app-store.png', 31),
(80, '1616861825_destination-img2.jpg', 32),
(81, '1616861825_destination-img3 - Copy.jpg', 32),
(82, '1616861825_destination-img5.jpg', 32),
(83, '1616861825_hero-bg.jpg', 32),
(84, '1616861871_car-img2 - Copy.png', 33),
(85, '1616861871_car-img2.png', 33),
(86, '1616861871_car-img3 - Copy (2).png', 33),
(87, '1616861871_car-img3 - Copy.png', 33);

-- --------------------------------------------------------

--
-- Table structure for table `tour_detail`
--

CREATE TABLE `tour_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `group_size` int(11) NOT NULL,
  `tour_type` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `min_age` int(11) NOT NULL,
  `pickup_from` varchar(500) NOT NULL,
  `hot` int(11) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour_detail`
--

INSERT INTO `tour_detail` (`id`, `name`, `price`, `discount`, `duration`, `group_size`, `tour_type`, `date`, `min_age`, `pickup_from`, `hot`, `description`) VALUES
(1, '1', 1, 1, 1, 1, '11', '0001-01-01', 1, '1', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tour_images`
--

CREATE TABLE `tour_images` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `tour_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour_images`
--

INSERT INTO `tour_images` (`id`, `name`, `tour_id`) VALUES
(1, '1616989314_02.jpg', 1),
(2, '1616989314_04.jpg', 1),
(3, '1616989314_11.jpg', 1),
(4, '1616989314_13.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(3, 'hiep', 'nvb@gmail.com', '$2y$10$GxwzPYzjafc2LIm.x1pIkuGUuLTVHmfWk4bZc5XAC71wR/Ty7pX4i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_detail`
--
ALTER TABLE `car_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_images`
--
ALTER TABLE `car_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cruise_detail`
--
ALTER TABLE `cruise_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cruise_images`
--
ALTER TABLE `cruise_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight_detail`
--
ALTER TABLE `flight_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight_images`
--
ALTER TABLE `flight_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_detail`
--
ALTER TABLE `hotel_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_images`
--
ALTER TABLE `hotel_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_detail`
--
ALTER TABLE `tour_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_images`
--
ALTER TABLE `tour_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_detail`
--
ALTER TABLE `car_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `car_images`
--
ALTER TABLE `car_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cruise_detail`
--
ALTER TABLE `cruise_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cruise_images`
--
ALTER TABLE `cruise_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `flight_detail`
--
ALTER TABLE `flight_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flight_images`
--
ALTER TABLE `flight_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hotel_detail`
--
ALTER TABLE `hotel_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `hotel_images`
--
ALTER TABLE `hotel_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tour_detail`
--
ALTER TABLE `tour_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tour_images`
--
ALTER TABLE `tour_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
