-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 01:45 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `ID` int(11) NOT NULL,
  `titel` varchar(220) NOT NULL,
  `artiest` varchar(150) NOT NULL,
  `genre` varchar(15) NOT NULL,
  `prijs` decimal(5,2) NOT NULL,
  `voorraad` int(11) NOT NULL,
  `cover` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`ID`, `titel`, `artiest`, `genre`, `prijs`, `voorraad`, `cover`) VALUES
(4, 'As she pleases', 'Madison Beer', 'pop', '11.00', 100, 'Madison_Beer_-_As_She_Pleases_(EP_cover).jpg'),
(6, 'Discovery', 'Daft punk', 'pop', '17.00', 100, 'Daft_Punk_-_Discovery.jpg'),
(7, 'The best of 68 comeback special', 'Elvis Presely', 'rock', '9.00', 100, 'elvis-presleys-the-best-of-the-68-comeback-special.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ID` int(11) NOT NULL,
  `klant_ID` int(11) NOT NULL,
  `album_ID` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `prijs_eenheid` decimal(5,2) NOT NULL,
  `weborder_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ID`, `klant_ID`, `album_ID`, `aantal`, `prijs_eenheid`, `weborder_ID`) VALUES
(8, 14, 6, 1, '17.00', 82),
(9, 14, 7, 1, '9.00', 83),
(10, 14, 6, 1, '17.00', 84),
(11, 14, 7, 1, '9.00', 84),
(12, 14, 4, 5, '11.00', 85),
(13, 14, 7, 13, '9.00', 86);

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

CREATE TABLE `klant` (
  `ID` int(11) NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `achternaam` varchar(20) NOT NULL,
  `straat` varchar(20) NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `woonplaats` varchar(20) NOT NULL,
  `email` varchar(120) NOT NULL,
  `wachtwoord` varchar(64) NOT NULL,
  `token` varchar(64) NOT NULL,
  `rol` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klant`
--

INSERT INTO `klant` (`ID`, `voornaam`, `achternaam`, `straat`, `postcode`, `woonplaats`, `email`, `wachtwoord`, `token`, `rol`) VALUES
(14, 'Rowan', 'Schotanus', 'Dr bongastrjite 1A', '8551 RH', 'Woudsend', 'rowanschotanus10@gmail.com', '$2y$10$CeJBq9k/lWYzv1xbOfAONeDTHBnz2irx/RkGeAQug/y4QYQ9L7GfK', '', 1),
(15, 'Rowan', 'Schotanus', 'Dr bongastrjite 1A', '8551 RH', 'Woudsend', 'rowanweichungchangschotanus@gmail.com', '$2y$10$1qBgzgvzgKZQ/idhaT8Z1ukjQDV6sb3q02WQBakKEiaVaLaGb1AEm', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `weborder`
--

CREATE TABLE `weborder` (
  `ID` int(11) NOT NULL,
  `Klant_ID` int(11) NOT NULL,
  `Datum` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weborder`
--

INSERT INTO `weborder` (`ID`, `Klant_ID`, `Datum`) VALUES
(75, 14, '2021-09-22'),
(76, 14, '2021-09-22'),
(77, 14, '2021-09-22'),
(78, 14, '2021-09-22'),
(79, 14, '2021-09-22'),
(80, 14, '2021-09-22'),
(81, 14, '2021-09-22'),
(82, 14, '2021-09-22'),
(83, 14, '2021-09-23'),
(84, 14, '2021-09-28'),
(85, 14, '2021-09-28'),
(86, 14, '2021-09-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `weborder`
--
ALTER TABLE `weborder`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `weborder`
--
ALTER TABLE `weborder`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
