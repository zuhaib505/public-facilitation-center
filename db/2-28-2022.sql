-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 02:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `public`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_professionals`
--

CREATE TABLE `tbl_professionals` (
  `prof_id` int(11) NOT NULL,
  `prof_slug` varchar(100) DEFAULT NULL,
  `prof_name` varchar(100) DEFAULT NULL,
  `prof_email` varchar(255) DEFAULT NULL,
  `prof_contact` varchar(20) DEFAULT NULL,
  `prof_password` varchar(255) DEFAULT NULL,
  `prof_image` varchar(255) DEFAULT NULL,
  `prof_status` int(1) NOT NULL,
  `prof_order` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_professionals`
--

INSERT INTO `tbl_professionals` (`prof_id`, `prof_slug`, `prof_name`, `prof_email`, `prof_contact`, `prof_password`, `prof_image`, `prof_status`, `prof_order`, `service_id`) VALUES
(1, 'jhon-doe', 'Jhon Doe', 'jhon@gmail.com', '+9230012345678', '12345678', NULL, 1, 1, 1),
(2, 'jhonsan-doe', 'Jhonsan Doe', 'jhonsan@gmail.com', '+9230012345678', '12345678', NULL, 1, 2, 2),
(3, 'james-williamson', 'James Williamson', 'jameswilliam@gmail.com', '+9230012345678', '12345678', NULL, 1, 3, 3),
(4, 'james-william', 'James William', 'james@gmail.com', '+9230012345678', '12345678', NULL, 1, 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_professionals`
--
ALTER TABLE `tbl_professionals`
  ADD PRIMARY KEY (`prof_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_professionals`
--
ALTER TABLE `tbl_professionals`
  MODIFY `prof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
