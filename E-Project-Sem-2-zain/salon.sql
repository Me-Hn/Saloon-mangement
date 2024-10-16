-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2024 at 09:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointement`
--

CREATE TABLE `appointement` (
  `ID` int(255) NOT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Slote` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Phone_No` varchar(13) NOT NULL,
  `Hair_Style` varchar(255) NOT NULL,
  `Beard_Style` varchar(255) NOT NULL,
  `Face_Treatment` varchar(255) NOT NULL,
  `Hair_Treatment` varchar(255) NOT NULL,
  `Deal_No` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beard_style`
--

CREATE TABLE `beard_style` (
  `ID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beard_style`
--

INSERT INTO `beard_style` (`ID`, `Name`) VALUES
(1, 'No'),
(2, 'Clean Shaven'),
(3, 'Stubble'),
(4, 'Full Beard'),
(5, 'French Work'),
(6, 'Ducktail'),
(7, 'Circle Beard'),
(8, 'Van Dyke'),
(9, 'Anchor'),
(10, 'Dutch'),
(11, 'Bandhoiz'),
(12, 'On Your Demand');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `ID` int(255) NOT NULL,
  `Deal_no` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `image` mediumtext NOT NULL,
  `Price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`ID`, `Deal_no`, `Name`, `Description`, `image`, `Price`) VALUES
(1, '1', 'Hair Cut', 'Hair Cut With Khaat', 'download.jpg', ' 600'),
(2, '2', '  Facial + Face Cleansing   ', 'Face Cleansing + black heads + with body massage ', 'download (1).jpg', ' 1800');

-- --------------------------------------------------------

--
-- Table structure for table `face_product`
--

CREATE TABLE `face_product` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `QTY` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `face_product`
--

INSERT INTO `face_product` (`id`, `name`, `QTY`) VALUES
(1, 'HydraFacial', 4),
(2, 'Oxygen facial', 6),
(3, 'Anti ageing treatment', 1),
(4, 'Exfoliation', 7),
(5, 'Acne facial', 10),
(6, 'Chemical peels', 10),
(7, 'Cleansing', 10),
(8, 'Dermal fillers', 10),
(9, 'Microneedling', 10),
(10, 'Laser hair removal', 10),
(11, 'Facials', 10),
(12, 'Basic facial', 10),
(13, 'CoolSculpting', 5),
(14, 'Gentleman facial', 9);

-- --------------------------------------------------------

--
-- Table structure for table `face_treatment`
--

CREATE TABLE `face_treatment` (
  `ID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `QTY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `face_treatment`
--

INSERT INTO `face_treatment` (`ID`, `Name`, `QTY`) VALUES
(1, 'No', 0),
(2, 'Anti ageing treatment', 0),
(3, 'Exfoliation', 0),
(4, 'Acne facial', 0),
(5, 'Chemical peels', 0),
(6, 'Cleansing', 0),
(7, 'Dermal fillers', 0),
(8, 'Microneedling', 0),
(9, 'Laser hair removal', 0),
(10, 'Facials', 0),
(11, 'Oxygen facial', 0),
(12, 'HydraFacial', -1),
(13, 'Basic facial', 0),
(14, 'CoolSculpting', 0),
(15, 'Gentleman facial', 0),
(0, 'On Your Demand', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hair_product`
--

CREATE TABLE `hair_product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `QTY` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hair_product`
--

INSERT INTO `hair_product` (`id`, `name`, `QTY`) VALUES
(9, 'Scalp Treatment', 8),
(10, 'Detox treatment', 9),
(11, 'Hair mesotherapy', 8),
(12, 'Hot oil treatment', 10),
(13, 'Moisture Treatment', 10),
(14, 'Toning Treatment', 10),
(15, 'Hair Glossing Treatment', 10),
(16, 'On Your Demand', 5);

-- --------------------------------------------------------

--
-- Table structure for table `hair_style`
--

CREATE TABLE `hair_style` (
  `ID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hair_style`
--

INSERT INTO `hair_style` (`ID`, `Name`) VALUES
(1, 'No'),
(2, 'Crew cut'),
(3, 'Faux hawk'),
(4, 'One Side Cut'),
(5, 'Low fade'),
(6, 'Foji Cut'),
(7, 'Burger Cut'),
(8, 'Buzz cut'),
(9, 'On Your Demand');

-- --------------------------------------------------------

--
-- Table structure for table `hair_teatment`
--

CREATE TABLE `hair_teatment` (
  `ID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hair_teatment`
--

INSERT INTO `hair_teatment` (`ID`, `Name`) VALUES
(1, 'No'),
(2, 'Keratin treatment'),
(3, 'Scalp Treatment'),
(4, 'Detox treatment'),
(5, 'Hair mesotherapy'),
(6, 'Hot oil treatment'),
(7, 'Moisture Treatment'),
(8, 'Toning Treatment'),
(9, 'Hair Glossing Treatment.'),
(10, 'On Your Demand');

-- --------------------------------------------------------

--
-- Table structure for table `history_appointment`
--

CREATE TABLE `history_appointment` (
  `ID` int(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Slote` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Phone_No` varchar(255) NOT NULL,
  `Hair_Style` varchar(255) NOT NULL,
  `Beard_Style` varchar(255) NOT NULL,
  `Face_Treat` varchar(255) NOT NULL,
  `Hair_Treat` varchar(255) NOT NULL,
  `Deal_no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history_appointment`
--

INSERT INTO `history_appointment` (`ID`, `client_id`, `Name`, `Email`, `Slote`, `Date`, `Phone_No`, `Hair_Style`, `Beard_Style`, `Face_Treat`, `Hair_Treat`, `Deal_no`) VALUES
(10, ' 1', ' ayaat', 'ayaat@gmail.com', '19:00:00', ' 2024-10-17', '123123123', 'Faux hawk', 'Stubble', 'Exfoliation', 'Scalp Treatment', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `produ`
--

CREATE TABLE `produ` (
  `id` int(11) NOT NULL,
  `image` mediumtext NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_discription` varchar(300) NOT NULL,
  `p_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produ`
--

INSERT INTO `produ` (`id`, `image`, `p_name`, `p_discription`, `p_cost`) VALUES
(10, 'jj.jpg', 'Socs', 'poka', 123);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `ID` int(255) NOT NULL,
  `Full_Name` varchar(255) DEFAULT NULL,
  `Email` varchar(2455) DEFAULT NULL,
  `_Password` varchar(255) NOT NULL,
  `_Confrim_Password` varchar(255) NOT NULL,
  `Role` enum('Admin','Staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `Full_Name`, `Email`, `_Password`, `_Confrim_Password`, `Role`) VALUES
(1, 'Shah Muhammad', 'shah@gmail.com', 'Ibaced@123', ' Ibaced@123', 'Admin'),
(4, 'Zain Khan', 'Zain@gmail.com', 'Abcd@123', 'Abcd@123', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` int(11) NOT NULL,
  `appointment_time` time NOT NULL,
  `is_booked` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `appointment_time`, `is_booked`) VALUES
(1, '07:00:00', 0),
(2, '08:00:00', 0),
(3, '09:00:00', 0),
(4, '10:00:00', 0),
(5, '11:00:00', 0),
(6, '12:00:00', 0),
(7, '13:00:00', 0),
(8, '14:00:00', 0),
(9, '15:00:00', 0),
(10, '16:00:00', 0),
(11, '17:00:00', 0),
(12, '18:00:00', 0),
(13, '19:00:00', 0),
(14, '20:00:00', 1),
(15, '21:00:00', 1),
(16, '22:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `Phone No` varchar(13) NOT NULL,
  `Cnic No` varchar(13) NOT NULL,
  `Age` varchar(2) NOT NULL,
  `Start date` date NOT NULL,
  `Salary` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userregister`
--

CREATE TABLE `userregister` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `pass` int(11) NOT NULL,
  `confirm_pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userregister`
--

INSERT INTO `userregister` (`id`, `name`, `email`, `phone`, `pass`, `confirm_pass`) VALUES
(1, ' ayaat', 'ayaat@gmail.com', 31793897, 123, 123),
(3, 'salman', 'salman@gmail.com', 2147483647, 786, 786),
(5, 'shah', 'shah@gmail.com', 2147483647, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointement`
--
ALTER TABLE `appointement`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `beard_style`
--
ALTER TABLE `beard_style`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `face_product`
--
ALTER TABLE `face_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hair_product`
--
ALTER TABLE `hair_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hair_style`
--
ALTER TABLE `hair_style`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hair_teatment`
--
ALTER TABLE `hair_teatment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `history_appointment`
--
ALTER TABLE `history_appointment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `produ`
--
ALTER TABLE `produ`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userregister`
--
ALTER TABLE `userregister`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointement`
--
ALTER TABLE `appointement`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `beard_style`
--
ALTER TABLE `beard_style`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `face_product`
--
ALTER TABLE `face_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hair_product`
--
ALTER TABLE `hair_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hair_style`
--
ALTER TABLE `hair_style`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hair_teatment`
--
ALTER TABLE `hair_teatment`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `history_appointment`
--
ALTER TABLE `history_appointment`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produ`
--
ALTER TABLE `produ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userregister`
--
ALTER TABLE `userregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
