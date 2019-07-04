-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 04. Jul 2019 um 15:56
-- Server-Version: 5.6.33
-- PHP-Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `jp`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lasise`
--

CREATE TABLE `lasise` (
  `id` bigint(11) NOT NULL,
  `vehicle_id` bigint(11) NOT NULL,
  `zeit` varchar(10) NOT NULL,
  `bemerkung` varchar(250) DEFAULT NULL,
  `quelle` varchar(250) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `lasise`
--

INSERT INTO `lasise` (`id`, `vehicle_id`, `zeit`, `bemerkung`, `quelle`, `date`) VALUES
(1, 1, '0:54.5', 'Alte Reifen (2012)', 'https://www.youtube.com/watch?v=bTYsIlyRjOg&t', '2019-05-14'),
(2, 2, '1:07.4', 'Viel zu Tief,<br />Rad-Reifen-Kombination unpassend', 'https://www.youtube.com/watch?v=D31XjOFoPAw', '2019-05-06'),
(3, 3, '0:59.1', 'Serienmäßig', 'https://www.youtube.com/watch?v=wMPaqrBI9vA', '2019-05-06'),
(4, 4, '2:42.4', NULL, 'https://www.youtube.com/watch?v=XLcgBeuQNe4', '2019-04-26'),
(5, 5, '1:00.2', 'neues Fahrwerk', 'https://www.youtube.com/watch?v=wqkcLN1o8oA', '2019-05-14'),
(6, 5, '1:02:0', 'Serienmäßig', 'https://www.youtube.com/watch?v=vZ5e_dfOKKw', '2019-05-06');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vehicle`
--

CREATE TABLE `vehicle` (
  `id` bigint(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `best_lasise` varchar(255) DEFAULT NULL,
  `best_pruefstand` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `vehicle`
--

INSERT INTO `vehicle` (`id`, `name`, `best_lasise`, `best_pruefstand`) VALUES
(1, 'Nissan GT-R R35 (alt)', '0:54.5', NULL),
(2, 'BMW E36 V8', '1:07.4', NULL),
(3, 'Chevrolet Camaro', '0:59.1', NULL),
(4, 'Ford T-Modell', '2:42.4', NULL),
(5, 'BMW E46 M3', '1:00.2', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `lasise`
--
ALTER TABLE `lasise`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `lasise`
--
ALTER TABLE `lasise`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;