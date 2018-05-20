-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 apr 2018 om 16:57
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lidl_people`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contactpersoon`
--

CREATE TABLE `contactpersoon` (
  `Contactpersoon_ID` int(11) NOT NULL,
  `Contactpersoon_Voornaam` varchar(50) NOT NULL,
  `Contactpersoon_Tussenvoegsel` varchar(25) DEFAULT NULL,
  `Contactpersoon_Achternaam` varchar(50) NOT NULL,
  `Contactpersoon_Email` varchar(100) NOT NULL,
  `Contactpersoon_Telefoonnummer_privé` varchar(20) NOT NULL,
  `Contactpersoon_Telefoonnummer_Zakelijk` varchar(20) NOT NULL,
  `Contactpersoon_Bedrijfsnaam` varchar(50) NOT NULL,
  `Contactpersoon_Standplaats` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `Gebruikers_ID` int(11) NOT NULL,
  `Gebruikers_Voornaam` varchar(50) NOT NULL,
  `Gebruikers_Tussenvoegsel` varchar(25) NOT NULL,
  `Gebruikers_Achternaam` varchar(50) NOT NULL,
  `Gebruikers_Email` varchar(100) NOT NULL,
  `Gebruikers_Telefoonnummer` varchar(20) NOT NULL,
  `Gebruikers_Gebruikersnaam` varchar(50) NOT NULL,
  `Gebruikers_Wachtwoord` varchar(50) NOT NULL,
  `Gebruikers_Rol` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `contactpersoon`
--
ALTER TABLE `contactpersoon`
  ADD PRIMARY KEY (`Contactpersoon_ID`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`Gebruikers_ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `contactpersoon`
--
ALTER TABLE `contactpersoon`
  MODIFY `Contactpersoon_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `Gebruikers_ID` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
