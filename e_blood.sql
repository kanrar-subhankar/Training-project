-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 19, 2018 at 05:50 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `e_blood`
--

CREATE TABLE `e_blood` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `bhtno` varchar(40) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `hospital_name` varchar(40) NOT NULL,
  `ward_no` int(10) NOT NULL,
  `consultants_name` varchar(40) NOT NULL,
  `patient_age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `weight` int(10) NOT NULL,
  `image-name` varchar(100) NOT NULL,
  `imagepath` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_blood`
--

INSERT INTO `e_blood` (`id`, `full_name`, `e_mail`, `password`, `comment`, `photo`, `bhtno`, `patient_name`, `hospital_name`, `ward_no`, `consultants_name`, `patient_age`, `sex`, `weight`, `image-name`, `imagepath`) VALUES
(8, 'subhankar', 'subhankar@gmail.com', '75d43a8f7d0e21eae7db9524bda9e3bf', 'ghgggh', '', '', '', '', 0, '', 0, '', 0, 'upload/noimage.png', ''),
(9, 'sarthak', 'sarthak@gmail.com', '5b9b2c4eb6d27e0d8e26f828f64528c2', '', '', '', '', '', 0, '', 0, '', 0, 'upload/noimage.png', ''),
(10, 'subhadip', 'subhadip@gmail.com', 'd55fd073cc4c149a1a3fac397d9f5b28', '', '', '', '', '', 0, '', 0, '', 0, 'upload/noimage.png', ''),
(11, 'supriyo', 'supriyo@gmail.com', '2cd37572da630cb4fbc3e0a70e18e6aa', 'fhfghfhghfhgfh', '', '', '', '', 0, '', 0, '', 0, 'upload/noimage.png', ''),
(12, 'subhajit', 'subhajit@gmail.com', '8420b40edd9c78b804670f67788255ba', '', '', '', '', '', 0, '', 0, '', 0, 'upload/noimage.png', ''),
(28, 'abc', 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '', '', '', '', '', 0, '', 0, '', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `e_blood`
--
ALTER TABLE `e_blood`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `e_blood`
--
ALTER TABLE `e_blood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
