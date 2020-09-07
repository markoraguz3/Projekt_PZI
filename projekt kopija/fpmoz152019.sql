-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: April 07, 2020 at 11:38 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flight`
--

-- --------------------------------------------------------

--
-- Table structure for table `flight_search`
--

CREATE TABLE `flight_search` (
  `id` int(11) NOT NULL,
  `fno` varchar(10) NOT NULL,
  `from_city` varchar(20) NOT NULL,
  `to_city` varchar(20) NOT NULL,
  `departure_date` date NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_time` time NOT NULL,
  `e_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_search`
--

INSERT INTO `flight_search` (`id`, `fno`, `from_city`, `to_city`, `departure_date`, `arrival_date`, `departure_time`, `arrival_time`, `e_price`) VALUES
(4, 'TRN2601', 'Mostar', 'Dubrovnik', '2016-12-25', '2020-12-25', '12:00:00', '14:00:00', 150),
(5, 'TRN2602', 'Mostar', 'Dubrovnik', '2016-12-26', '2020-12-26', '18:00:00', '20:00:00', 150),
(6, 'TRN2603', 'Dubrovnik', 'Mostar', '2016-12-25', '2020-12-25', '12:00:00', '14:00:00', 150),
(7, 'TRN2604', 'Dubrovnik', 'Mostar', '2016-12-26', '2020-12-26', '18:00:00', '20:00:00', 150);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE "users" (
  "u_id" int(11) NOT NULL,
  "name" varchar(20) NOT NULL,
  "surname" varchar(20) NOT NULL,
  "id_number" varchar(20) NOT NULL,
  "phone_number" int(10) NOT NULL,
  "address" varchar(50) NOT NULL,
  "email" varchar(50) NOT NULL,
  "card_number" int(20) NOT NULL,
  "cvv" int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO "users" ("u_id", "name", "surname", "id_number", "phone_number", "address", "email", "card_number", "cvv") VALUES
(5, 'marko', 'raguz', '50123456E50', 123456789, '8677 whitecliff', '124412@mail.com', 123456789, 123),
(11, 'matej', 'raguz', '50123456E50', 123456789, '8677 whitecliff', '1432@mail.com', 123456789, 123),
(13, 'marko', 'marko', '50123456E50', 123456789, '8677 whitecliff', '432@mail.com', 123456789, 123),
(70, 'ivan', 'filipovic', '50123456G50', 123456789, '8677 whitecliff', '1432@mail.com', 123456789, 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flight_search`
--
ALTER TABLE `flight_search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flight_search`
--
ALTER TABLE "flight_search"
  MODIFY "id" int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE "users"
  MODIFY "u_id" int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
