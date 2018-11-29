-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2017 at 09:14 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `money_t`
--

-- --------------------------------------------------------

--
-- Table structure for table `money`
--

CREATE TABLE `money` (
  `sname` varchar(50) NOT NULL,
  `sphone` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `rname` varchar(50) NOT NULL,
  `rphone` varchar(50) NOT NULL,
  `pin` varchar(50) NOT NULL,
  `trxid` varchar(50) NOT NULL,
  `sentby` varchar(50) NOT NULL,
  `receivedby` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `money`
--

INSERT INTO `money` (`sname`, `sphone`, `amount`, `rname`, `rphone`, `pin`, `trxid`, `sentby`, `receivedby`, `type`) VALUES
('Shimul', '+8801760258979', 1500, 'Zunaid', '+8801751187591', '5923', 'TRX14466663', 'zunaid', '', 'sent'),
('Zunaid', '+8801671352227', 1000, 'Shimul', '+8801751187591', '7005', 'TRX53244244', 'zunaid', '', 'sent'),
('Mahdi', '+8801760258979', 10000, 'Nur ', '+8801715987336', '8982', 'TRX58902243', 'zunaid', '', 'sent'),
('Zunaid ', '+8801671352227', 500, 'Mahdi', '+8801760258979', '1004', 'TRX61053435', 'zunaid', '', 'sent'),
('Zunaid', '+8801671352227', 5000, 'Nur Islam', '+8801715987336', '8481', 'TRX77554426', 'zunaid', 'zunaid', 'received');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `name`, `email`, `password`, `gender`, `type`, `img`) VALUES
('jojo', 'Jojo Mahadi', 'jonaid.mahadi@gmail.com', '123456', 'male', 'employee', 'P60804-180834.jpg'),
('zunaid', 'Zunaid Mahdi', 'jonaid64@gmail.com', '123456', 'Male', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `money`
--
ALTER TABLE `money`
  ADD UNIQUE KEY `trxid` (`trxid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
