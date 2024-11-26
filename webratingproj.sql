-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2024 at 10:21 AM
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
-- Database: `webratingproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `tab_rating`
--

CREATE TABLE `tab_rating` (
  `FilmName` varchar(30) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Comment` varchar(1024) NOT NULL,
  `ImgSrc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_rating`
--

INSERT INTO `tab_rating` (`FilmName`, `Rating`, `Comment`, `ImgSrc`) VALUES
('Terminator', 5, 'asdasdasdsfsdfsdfsdfsdfdsfsdfdsfdsfdsfsdfsdfsdfsdfdsfdsfdsfdsfdsfdsfd', ''),
('terminator2', 5, 'very gooooood', '');

-- --------------------------------------------------------

--
-- Table structure for table `tab_user`
--

CREATE TABLE `tab_user` (
  `UserName` varchar(20) NOT NULL,
  `Passwd` varchar(255) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `LName` varchar(30) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Addr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_user`
--

INSERT INTO `tab_user` (`UserName`, `Passwd`, `FName`, `LName`, `Email`, `Addr`) VALUES
('sameen', '$2y$10$DhxLFA0MPVinTWoziVVpmuaOQ.KBOEtPmA2H0uJ0RnYin3LCeSEAa', 'Sameen', 'Chowdhury', 'asdsad', '45 calder'),
('sayaan', '$2y$10$3ef5RlxfGJl//bSzCKATg.VgKDAnNp9ORBXj29gwMAf5X3TrF4nTG', 'sdf', 'sdfdsf', 'dsfds', 'sdfsf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_rating`
--
ALTER TABLE `tab_rating`
  ADD PRIMARY KEY (`FilmName`);

--
-- Indexes for table `tab_user`
--
ALTER TABLE `tab_user`
  ADD PRIMARY KEY (`UserName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
