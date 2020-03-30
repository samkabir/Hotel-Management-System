-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 01:41 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `RRoom_ID` int(3) NOT NULL,
  `C_ID` varchar(30) NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date DEFAULT NULL,
  `RBill` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`RRoom_ID`, `C_ID`, `Start_date`, `End_date`, `RBill`) VALUES
(103, '987654321', '2018-12-04', NULL, 0),
(201, '123456789', '2018-12-04', NULL, 0),
(401, '159753258', '2018-12-04', '2018-12-09', 9000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Name` varchar(30) NOT NULL,
  `Phone` int(13) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `ID_Type` varchar(30) NOT NULL,
  `ID_Number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Name`, `Phone`, `Address`, `ID_Type`, `ID_Number`) VALUES
('Sk Aakash', 1688288111, 'North Kafrul, Dhaka', 'NID', '123456789'),
('Mushtari Suma', 167531654, 'Badda, Dhaka', 'NID', '159753258'),
('Sowmik Bhadra', 1718188829, '577/A North Kafrul', 'NID', '987654321');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `F_ID` varchar(6) NOT NULL,
  `Item` varchar(100) NOT NULL,
  `Price` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`F_ID`, `Item`, `Price`) VALUES
('D001', 'Tea', 25),
('D002', 'Soft drink ', 40),
('D003', 'Paratha and daal', 60),
('D004', 'Kacchi', 170),
('D005', 'Chicken Biriyani ', 160),
('D006', 'Tehari', 170),
('D007', 'Grilled Naan and Nehari', 135),
('D008', 'Halim', 120),
('D009', 'Chicken soup', 135),
('D010', 'Pasta', 135),
('D011', 'Fried Rice', 130),
('D012', 'Fried Chikhen ', 120),
('D013', 'Beef Burger', 150),
('D014', 'Chiken Burger', 150),
('D015', 'Dim sum', 200),
('D016', 'Chicken Roast', 120),
('D017', 'Fried Fish and Chips', 150),
('D018', 'Kabab and Naan', 160),
('D019', 'Roast Chicken Sandwich', 140),
('D020', 'Coffee', 120);

-- --------------------------------------------------------

--
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `FRRoom_id` int(3) NOT NULL,
  `Food_id` varchar(6) NOT NULL,
  `Quantity` int(2) NOT NULL,
  `FDate` date NOT NULL,
  `Bill` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`FRRoom_id`, `Food_id`, `Quantity`, `FDate`, `Bill`) VALUES
(103, 'D015', 2, '2018-12-07', 400),
(201, 'D014', 1, '2018-12-06', 150),
(201, 'D018', 4, '2018-12-05', 640),
(401, 'D011', 2, '2018-12-08', 260);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_No` int(3) NOT NULL,
  `Type` varchar(6) NOT NULL,
  `Capacity` int(1) NOT NULL,
  `Rent` int(4) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Room_No`, `Type`, `Capacity`, `Rent`, `Status`) VALUES
(101, 'NON AC', 2, 700, 'Vacant'),
(102, 'NON AC', 3, 900, 'Vacant'),
(103, 'NON AC', 1, 500, 'Booked'),
(201, 'AC', 2, 1000, 'Booked'),
(202, 'AC', 4, 1400, 'Vacant'),
(203, 'AC', 6, 2000, 'vacant'),
(301, 'NON AC', 1, 500, 'Vacant'),
(302, 'AC', 1, 700, 'vacant'),
(303, 'AC', 1, 900, 'vacant'),
(304, 'NON AC', 2, 700, 'vacant'),
(401, 'AC', 6, 1800, 'Vacant'),
(402, 'AC', 2, 900, 'vacant'),
(501, 'NON AC', 2, 700, 'Vacant'),
(502, 'AC', 3, 1200, 'vacant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`RRoom_ID`,`C_ID`,`Start_date`),
  ADD KEY `R.Room  ID` (`RRoom_ID`),
  ADD KEY `C_ID` (`C_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_Number`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`F_ID`);

--
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`FRRoom_id`,`Food_id`,`FDate`),
  ADD KEY `R.room_id` (`FRRoom_id`),
  ADD KEY `Food_id` (`Food_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_No`),
  ADD UNIQUE KEY `Room No` (`Room_No`),
  ADD UNIQUE KEY `Room No_2` (`Room_No`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD CONSTRAINT `booking_info_ibfk_1` FOREIGN KEY (`RRoom_ID`) REFERENCES `room` (`Room_No`),
  ADD CONSTRAINT `booking_info_ibfk_2` FOREIGN KEY (`C_ID`) REFERENCES `customer` (`ID_Number`);

--
-- Constraints for table `food_order`
--
ALTER TABLE `food_order`
  ADD CONSTRAINT `food_order_ibfk_1` FOREIGN KEY (`FRRoom_id`) REFERENCES `booking_info` (`RRoom_ID`),
  ADD CONSTRAINT `food_order_ibfk_3` FOREIGN KEY (`Food_id`) REFERENCES `food` (`F_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
