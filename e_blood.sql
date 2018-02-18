-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2017 at 02:28 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_blood`
--

INSERT INTO `e_blood` (`id`, `full_name`, `e_mail`, `password`, `comment`) VALUES
(8, 'subhankar', 'subhankar@gmail.com', '75d43a8f7d0e21eae7db9524bda9e3bf', ''),
(9, 'sarthak', 'sarthak@gmail.com', '5b9b2c4eb6d27e0d8e26f828f64528c2', ''),
(10, 'subhadip', 'subhadip@gmail.com', 'd55fd073cc4c149a1a3fac397d9f5b28', ''),
(11, 'supriyo', 'supriyo@gmail.com', '2cd37572da630cb4fbc3e0a70e18e6aa', 'fdmdjg'),
(12, 'subhajit', 'subhajit@gmail.com', '8420b40edd9c78b804670f67788255ba', ''),
(13, 'sdhshd', 'sdhgfshd@jdfj.dsjhf', 'cd2d4cf83e5ac599ee310b14296e7174', ''),
(14, 'sdnbs', 'sajkdhasj@shsd.dskf', 'e411d81b482ffcde5e62d29f0feb7f63', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
