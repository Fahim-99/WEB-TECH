-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 05:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `userid` varchar(20) NOT NULL,
  `license_no` varchar(30) NOT NULL,
  `commission` int(11) NOT NULL,
  `account` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`userid`, `license_no`, `commission`, `account`) VALUES
('mahin', 'DHK68465131', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `userid` varchar(20) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 10,
  `salary` int(11) NOT NULL DEFAULT 5000,
  `account` int(11) NOT NULL DEFAULT 0,
  `join_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `history_id` int(11) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `history_type` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `details` varchar(200) NOT NULL DEFAULT 'none.txt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`history_id`, `userid`, `history_type`, `date`, `time`, `details`) VALUES
(1, 'adnan', 'registration', '2022-11-05', '20:52:02', 'userid: adnan, password: adnan123, usertype: passenger, status: active, name: Adnan Fahad, email: adnan@gmail.com, contact: 01951631034, adress: Mothijheel'),
(2, 'rad', 'registration', '2022-11-05', '20:52:02', 'userid: rad, password: rad12345, usertype: passenger, status: active, name: Ras Shahmat Akash, email: rad@gmail.com, contact: 01242042424, adress: Kishoregonj'),
(3, 'sakib', 'registration', '2022-11-05', '20:52:02', 'userid: sakib, password: sakib123, usertype: passenger, status: active, name: Mahin, email: mahin@mail.com, contact: 01651654561, adress: Kuratoli');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `trip_id` int(11) NOT NULL,
  `departure` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `distance` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`trip_id`, `departure`, `destination`, `distance`, `price`) VALUES
(10001, 'Dhaka', 'Chittagong', 500, 20000),
(10002, 'Dhaka', 'Barishal', 250, 12000),
(10003, 'Dhaka', 'Sylhel', 400, 15000),
(10004, 'Chittagon', 'Dhaka', 500, 20000),
(10005, 'Sylhet', 'Chittagong', 900, 30000),
(10006, 'Barishal', 'Chittagong', 300, 10000),
(10007, 'Barishal', 'Sylhel', 750, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `trips_histories`
--

CREATE TABLE `trips_histories` (
  `th_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `passenger_id` varchar(20) NOT NULL,
  `trip_date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `price` int(11) NOT NULL DEFAULT 0,
  `discount` int(11) NOT NULL DEFAULT 0,
  `driver_id` varchar(20) NOT NULL DEFAULT 'Not Allocated',
  `used_voucher` varchar(20) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trips_histories`
--

INSERT INTO `trips_histories` (`th_id`, `trip_id`, `passenger_id`, `trip_date`, `status`, `price`, `discount`, `driver_id`, `used_voucher`) VALUES
(100000, 0, 'monkir', '2022-11-05', 'pending', 0, 0, 'Not Allocated', 'none'),
(100001, 0, 'rad', '2022-11-05', 'pending', 0, 0, 'Not Allocated', 'none'),
(100002, 0, 'muzahid', '2022-11-05', 'pending', 0, 0, 'Not Allocated', 'none'),
(100003, 0, 'mahin', '2022-11-05', 'pending', 0, 0, 'Not Allocated', 'none'),
(100004, 10005, 'monkir', '2022-11-14', 'pending', 30000, 0, 'Not Allocated', 'none'),
(100005, 10005, 'monkir', '2022-11-20', 'pending', 30000, 0, 'Not Allocated', 'none'),
(100006, 10005, 'monkir', '2022-11-14', 'pending', 30000, 0, 'Not Allocated', 'none'),
(100007, 10007, 'monkir', '2022-11-30', 'pending', 12000, 0, 'Not Allocated', 'none'),
(100008, 10004, 'monkir', '2022-11-14', 'pending', 20000, 0, 'Not Allocated', 'none'),
(100009, 10004, 'monkir', '2022-11-14', 'pending', 20000, 0, 'Not Allocated', 'none'),
(100010, 10005, 'monkir', '2022-11-14', 'pending', 30000, 0, 'Not Allocated', 'none'),
(100011, 10005, 'monkir', '2022-11-14', 'pending', 30000, 0, 'Not Allocated', 'none'),
(100012, 10005, 'monkir', '2022-11-14', 'pending', 30000, 0, 'Not Allocated', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `adress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `password`, `usertype`, `status`, `name`, `email`, `contact`, `adress`) VALUES
('monkir', 'monkir123', 'passenger', 'active', 'Monkir Chowdhury', 'monkirchowdhury@gmail.com', '01921431034', 'Mothijheel'),
('mahin', 'mahin123', 'driver', 'inactive', 'Mahin', 'mahin@mail.com', '012516546541', 'Pabna'),
('adnan', 'adnan123', 'passenger', 'active', 'Adnan Fahad', 'adnan@gmail.com', '01951631034', 'Mothijheel'),
('rad', 'rad12345', 'passenger', 'active', 'Ras Shahmat Akash', 'rad@gmail.com', '01242042424', 'Kishoregonj'),
('sakib', 'sakib123', 'passenger', 'active', 'Mahin', 'mahin@mail.com', '01651654561', 'Kuratoli'),
('admin', 'admin123', 'admin', 'active', 'Admin', 'admin@vrms.com', '0125196465', 'AIUB');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `type`, `brand`, `model`) VALUES
(10000, 'Car', 'Toyota', 'Premio'),
(10001, 'Motorcycle', 'Honda', 'Livo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`trip_id`);

--
-- Indexes for table `trips_histories`
--
ALTER TABLE `trips_histories`
  ADD PRIMARY KEY (`th_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10008;

--
-- AUTO_INCREMENT for table `trips_histories`
--
ALTER TABLE `trips_histories`
  MODIFY `th_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100013;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
