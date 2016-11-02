-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 02, 2016 at 06:54 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `jldzk_trangell_sms`
--

CREATE TABLE `jldzk_trangell_sms` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `mobile` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jldzk_trangell_sms`
--

INSERT INTO `jldzk_trangell_sms` (`id`, `name`, `mobile`) VALUES
(10, 'شهریار توکلی', '09368094936');

-- --------------------------------------------------------

--
-- Table structure for table `jldzk_trangell_sms_logs`
--

CREATE TABLE `jldzk_trangell_sms_logs` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jldzk_trangell_sms_logs`
--

INSERT INTO `jldzk_trangell_sms_logs` (`id`, `time`, `count`) VALUES
(1, '2016-11-02 17:02:09', 2),
(2, '2016-11-02 17:02:09', 3),
(3, '2016-11-02 17:12:36', 1),
(4, '2016-11-02 17:15:13', 1),
(5, '2016-11-02 17:18:19', 1),
(6, '2016-11-02 17:19:00', 1),
(7, '2016-11-02 17:24:06', 1),
(8, '2016-11-02 17:24:30', 1),
(9, '2016-11-02 17:26:29', 1),
(10, '2016-11-02 17:27:00', 1),
(11, '2016-11-02 17:27:17', 1),
(12, '2016-11-02 17:28:33', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jldzk_trangell_sms`
--
ALTER TABLE `jldzk_trangell_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jldzk_trangell_sms_logs`
--
ALTER TABLE `jldzk_trangell_sms_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jldzk_trangell_sms`
--
ALTER TABLE `jldzk_trangell_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `jldzk_trangell_sms_logs`
--
ALTER TABLE `jldzk_trangell_sms_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
