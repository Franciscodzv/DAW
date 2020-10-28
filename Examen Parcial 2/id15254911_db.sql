-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2020 at 07:05 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15254911_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`id15254911_a01204695`@`%` PROCEDURE `AddEstadoZombie` (IN `IdZombie` VARCHAR(50) CHARSET utf8, IN `NombreZombie` VARCHAR(50) CHARSET utf8, IN `EstadoActual` VARCHAR(50) CHARSET utf8)  NO SQL
INSERT INTO EstadoDelZombie (IdZombie,NombreZombie) VALUES (@IdZombie, @EstadoActual)$$

CREATE DEFINER=`id15254911_a01204695`@`%` PROCEDURE `AddZombie` (IN `IdZombie` VARCHAR(50) CHARSET utf8, IN `NombreZombie` VARCHAR(50) CHARSET utf8)  NO SQL
INSERT INTO Zombies (IdZombie,NombreZombie) VALUES (@IdZombie, @NombreZombie)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Estado`
--

CREATE TABLE `Estado` (
  `EstadoActual` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `EstadoDelZombie`
--

CREATE TABLE `EstadoDelZombie` (
  `IdZombie` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EstadoDelZombie` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FechaHora` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Zombies`
--

CREATE TABLE `Zombies` (
  `IdZombie` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NombreZombie` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Estado`
--
ALTER TABLE `Estado`
  ADD PRIMARY KEY (`EstadoActual`);

--
-- Indexes for table `EstadoDelZombie`
--
ALTER TABLE `EstadoDelZombie`
  ADD KEY `IdZombie` (`IdZombie`),
  ADD KEY `EstadoDelZombie` (`EstadoDelZombie`);

--
-- Indexes for table `Zombies`
--
ALTER TABLE `Zombies`
  ADD PRIMARY KEY (`IdZombie`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `EstadoDelZombie`
--
ALTER TABLE `EstadoDelZombie`
  ADD CONSTRAINT `EstadoDelZombie_ibfk_1` FOREIGN KEY (`IdZombie`) REFERENCES `Zombies` (`IdZombie`),
  ADD CONSTRAINT `EstadoDelZombie_ibfk_2` FOREIGN KEY (`EstadoDelZombie`) REFERENCES `Estado` (`EstadoActual`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
