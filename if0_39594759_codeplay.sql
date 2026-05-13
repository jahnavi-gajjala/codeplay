-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql100.infinityfree.com
-- Generation Time: Sep 26, 2025 at 01:33 PM
-- Server version: 10.6.22-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_39594759_codeplay`
--

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_code` varchar(10) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `joined_by` varchar(50) DEFAULT NULL,
  `player1` varchar(50) DEFAULT NULL,
  `player2` varchar(50) DEFAULT NULL,
  `player3` varchar(50) DEFAULT NULL,
  `player4` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_code`, `created_by`, `joined_by`, `player1`, `player2`, `player3`, `player4`) VALUES
('15WWRR', 'Mayank raj', NULL, 'Mayank raj', NULL, NULL, NULL),
('22A17C', 'Sandy', NULL, 'Sandy', NULL, NULL, NULL),
('3F1P5S', 'kankshitha30', NULL, 'kankshitha30', NULL, NULL, NULL),
('42SJTH', 'Manoj Kumar', NULL, 'Manoj Kumar', NULL, NULL, NULL),
('4792PZ', 'Jaanu', NULL, 'Jaanu', 'Guna', NULL, NULL),
('60XYKE', 'Vhj', NULL, 'Vhj', NULL, NULL, NULL),
('CRX0FG', 'navya', NULL, 'navya', NULL, NULL, NULL),
('CTWPCZ', 'Jaanu', NULL, 'Jaanu', 'Nandu', NULL, NULL),
('J2UXZQ', 'Gangubhai', NULL, 'Gangubhai', NULL, NULL, NULL),
('JKJ26G', 'Nandu', NULL, 'Nandu', 'Jaanu', NULL, NULL),
('LQ2TIW', 'Sk muneer', NULL, 'Sk muneer', 'Nandu', NULL, NULL),
('OHZVXM', 'nandu', NULL, 'nandu', 'Sk muneer', NULL, NULL),
('SG81J3', 'imperfect', NULL, 'imperfect', NULL, NULL, NULL),
('X2OZF3', 'Sr', NULL, 'Sr', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'nandu', '2311'),
(7, 'neha', '2311'),
(12, 'Jaanu', '2204'),
(14, 'Sk muneer', 'shannunandu2004'),
(15, 'Guna', '1234'),
(16, 'Eatakota Ramalakshmi', '123456'),
(17, '_salam_', 'salam@123'),
(18, 'srividya7', '12345'),
(19, 'Yashu', 'Yashu@2006'),
(20, 'Kankshitha', '2006'),
(21, 'Sd khadar', '12345678'),
(22, 'A.Mangaveni', '2306'),
(23, 'Bhuvana Sri', 'bhuvana16'),
(24, 'JK', 'JK@1234'),
(25, 'Mayank raj', 'Jahnvi98'),
(26, 'Harshitha', 'UNIQUE@1003'),
(27, 'Raga sinduja', 'pilli'),
(28, 'Gayathri', '1234gayathri'),
(29, 'Priyadarshini', 'priya@2005!'),
(30, 'imperfect', 'imperfectone'),
(31, 'Bunny', '1234'),
(32, 'Prem Chandu', 'prem@123'),
(33, 'Mounish CHOWDARY', 'MOUNISH@123'),
(34, 'Ashritha', 'aashu30'),
(35, 'Sandy', '1234'),
(36, 'vaishali bhure', 'vishu'),
(37, 'Gangubhai', 'Ganga14529'),
(38, 'Manoj Kumar', 'Mama@123'),
(39, 'kankshitha30', 'hasitha'),
(40, 'Jahnav', '1234'),
(41, 'navya', '12345'),
(42, 'manoj', 'manoj'),
(43, 'Devi adabala', 'devi.5058@'),
(44, 'Mini dora', '123456789'),
(45, 'Xyz', 'xyz'),
(46, 'Vhj', 'vhj'),
(47, 'S', '123'),
(48, 'yeshu', 'bruno15'),
(49, 'Sr', '123'),
(50, 'ki', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
