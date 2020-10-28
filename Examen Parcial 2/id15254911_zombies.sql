-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 28, 2020 at 11:03 PM
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
-- Database: `id15254911_zombies`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`id15254911_a01204695`@`%` PROCEDURE `ConsultarZombie` (IN `estadoSeleccionado` INT(11))  BEGIN
      SELECT EZ.Fecha, Z.NombreZombie, E.NombreEstado
         FROM EstadoDelZombie EZ, Zombies Z, Estado E
        WHERE Z.IdZombie = EZ.IdZombie AND EZ.Estado = E.Estado AND EZ.Estado=estadoSeleccionado;
       
END$$

CREATE DEFINER=`id15254911_a01204695`@`%` PROCEDURE `GetEstado` ()  NO SQL
SELECT * FROM Estado$$

CREATE DEFINER=`id15254911_a01204695`@`%` PROCEDURE `GetZombie` ()  BEGIN
      SELECT EZ.Fecha, Z.NombreZombie, E.NombreEstado 
         FROM EstadoDelZombie EZ, Estado E, Zombies Z
        WHERE EZ.IdZombie = Z.IdZombie AND E.Estado = EZ.Estado
        ORDER BY fecha DESC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Estado`
--

CREATE TABLE `Estado` (
  `Estado` int(11) NOT NULL,
  `NombreEstado` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Estado`
--

INSERT INTO `Estado` (`Estado`, `NombreEstado`) VALUES
(1, 'Infeccion'),
(2, 'desorientacion'),
(3, 'violencia'),
(4, 'desmayo'),
(5, 'tranformacion');

-- --------------------------------------------------------

--
-- Table structure for table `EstadoDelZombie`
--

CREATE TABLE `EstadoDelZombie` (
  `Id` int(11) NOT NULL,
  `IdZombie` int(11) NOT NULL,
  `Estado` int(11) NOT NULL,
  `Fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `EstadoDelZombie`
--

INSERT INTO `EstadoDelZombie` (`Id`, `IdZombie`, `Estado`, `Fecha`) VALUES
(1, 1, 1, '2020-10-28'),
(2, 2, 3, '2020-10-28'),
(5, 12, 5, '2020-10-28'),
(6, 13, 1, '2020-10-28'),
(7, 14, 4, '2020-10-28'),
(8, 15, 4, '2020-10-28'),
(9, 16, 2, '2020-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `Zombies`
--

CREATE TABLE `Zombies` (
  `IdZombie` int(6) NOT NULL,
  `NombreZombie` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Zombies`
--

INSERT INTO `Zombies` (`IdZombie`, `NombreZombie`) VALUES
(1, 'Pedro'),
(2, 'John'),
(12, 'Francisco'),
(13, 'Jamie'),
(14, 'Clara'),
(15, 'Claudio'),
(16, 'Braulio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Estado`
--
ALTER TABLE `Estado`
  ADD PRIMARY KEY (`Estado`);

--
-- Indexes for table `EstadoDelZombie`
--
ALTER TABLE `EstadoDelZombie`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdZombie` (`IdZombie`),
  ADD KEY `Estado` (`Estado`);

--
-- Indexes for table `Zombies`
--
ALTER TABLE `Zombies`
  ADD PRIMARY KEY (`IdZombie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Estado`
--
ALTER TABLE `Estado`
  MODIFY `Estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `EstadoDelZombie`
--
ALTER TABLE `EstadoDelZombie`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Zombies`
--
ALTER TABLE `Zombies`
  MODIFY `IdZombie` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `EstadoDelZombie`
--
ALTER TABLE `EstadoDelZombie`
  ADD CONSTRAINT `EstadoDelZombie_ibfk_1` FOREIGN KEY (`IdZombie`) REFERENCES `Zombies` (`IdZombie`),
  ADD CONSTRAINT `EstadoDelZombie_ibfk_2` FOREIGN KEY (`Estado`) REFERENCES `Estado` (`Estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
