-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2021 at 10:49 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satovi`
--

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `proizvodID` int(11) NOT NULL,
  `nazivProizvoda` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`proizvodID`, `nazivProizvoda`) VALUES
(1, 'Casio'),
(2, 'Fossil'),
(3, 'Michael Kors'),
(4, 'Swatch'),
(5, 'Armani'),
(6, 'DNKY '),
(7, 'Seiko');

-- --------------------------------------------------------

--
-- Table structure for table `satovi`
--

CREATE TABLE `satovi` (
  `satID` int(11) NOT NULL,
  `naziv` varchar(250) NOT NULL,
  `procenatSrebra` double NOT NULL,
  `proizvodID` int(11) NOT NULL,
  `tip` varchar(250) NOT NULL,
  `cena` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `satovi`
--

INSERT INTO `satovi` (`satID`, `naziv`, `procenatSrebra`, `proizvodID`, `tip`, `cena`) VALUES
(5, 'Armani 526547', 70, 5, 'Vodootporan', 9000),
(6, 'Armani 7852', 70, 5, 'Smart sat', 7800),
(7, 'Casio 95823', 90, 2, 'Prikazuje datum', 8900);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`proizvodID`);

--
-- Indexes for table `satovi`
--
ALTER TABLE `satovi`
  ADD PRIMARY KEY (`satID`),
  ADD KEY `proizvodID` (`proizvodID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `proizvodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `satovi`
--
ALTER TABLE `satovi`
  MODIFY `satID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `satovi`
--
ALTER TABLE `satovi`
  ADD CONSTRAINT `satovi_ibfk_1` FOREIGN KEY (`proizvodID`) REFERENCES `proizvod` (`proizvodID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
