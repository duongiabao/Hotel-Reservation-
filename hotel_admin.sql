-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 02:52 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'thanhs', '123'),
(2, 'thanh1', '123');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `phone` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `address` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `email`, `address`) VALUES
(8, 'Nguyen Cong Thanh', '0903053132', 'ncthanh0411@gmail.com', '109 Hai thuong Lan Ong'),
(9, 'Le Tuan Minh', '0903055371', 'letuanminh@gmail.com', '19 Le Van Luong Quan 1'),
(10, 'Nguyen Cong Thanh', '09sadsad', 'bao@gmail.com', 'qwdqwdw');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `room_id` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `status` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `customer_id`, `admin_id`, `room_id`, `checkin`, `checkout`, `status`) VALUES
(6, 8, 1, 3, '2019-11-30', '2019-12-01', 'APPROVED'),
(7, 9, 1, 3, '2019-12-02', '2019-12-03', 'APPROVED'),
(8, 10, NULL, 2, '2019-12-02', '2019-12-03', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `capacity` int(11) NOT NULL,
  `remark` text COLLATE utf8_bin NOT NULL,
  `price` float NOT NULL,
  `image` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `capacity`, `remark`, `price`, `image`) VALUES
(1, 'Single Room', 1, 'Single room is a room intended for one person to stay in. Choose from twin or single rooms, all of which are comfortable. Each guest has (his)or her own single room, or shares a double room. Single rooms are available at $50. \r\n', 50, 'img/victorian-suite.jpg'),
(2, 'Double Room', 2, 'Double room will generally be 1 bed for two people, the bed will either be a Double, Queen or King size bed, if you are traveling with friends and want to share a room you need to book a twin room which will have to single beds in. ... Usually if its listed Just Double Room, means 1 Bed of Full Size in a Room.', 100, 'img/deluxe-room.jpg\r\n'),
(3, 'Family Room', 6, 'Family Room: A very spacious room designed for adults and their children. For older children, each room has a sofa-bed. (4 Persons maximum). Standard facilities: Shower, TV, Radio, Toilet, Bathroom, Tea/Coffee Maker, Wake Up Service/Alarm', 300, 'img/family-suite.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer` (`customer_id`),
  ADD KEY `fk_admin` (`admin_id`),
  ADD KEY `fk_room` (`room_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `fk_room` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
