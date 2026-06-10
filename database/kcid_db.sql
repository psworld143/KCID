-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2025 at 12:11 AM
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
-- Database: `kcid_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `district_id` varchar(10) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `number_of_schools` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district_id`, `district_name`, `address`, `number_of_schools`) VALUES
('D001', 'District 1', 'Koronadal City', 15),
('D002', 'District 2', 'Koronadal City', 12),
('D003', 'District 3', 'Koronadal City', 8),
('D004', 'District 4', 'Koronadal City', 10),
('D005', 'District 5', 'Koronadal City', 7),
('D006', 'District 6', 'Koronadal City', 9),
('D007', 'District 7', 'Koronadal City', 11),
('D008', 'District 8', 'Koronadal City', 6),
('D009', 'District 9-JHS', 'Koronadal City', 5),
('D010', 'District 10-JHS', 'Koronadal City', 4),
('D011', 'District 9-SHS', 'Koronadal City', 3),
('D012', 'District 10-SHS', 'Koronadal City', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`district_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
