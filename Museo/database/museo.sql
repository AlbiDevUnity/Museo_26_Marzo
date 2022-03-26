-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 26, 2022 alle 23:01
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `museo`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `codici`
--

CREATE TABLE `codici` (
  `codice` varchar(5) NOT NULL,
  `idPrenotazione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `codici`
--

INSERT INTO `codici` (`codice`, `idPrenotazione`) VALUES
('mB413', 69),
('JV632', 72),
('HD709', 73),
('kx868', 74),
('AK803', 75),
('Ww757', 76),
('zA159', 77);

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `contatto` text NOT NULL,
  `nPersone` int(11) NOT NULL CHECK (`nPersone` >= 1 and `nPersone` <= 5),
  `orario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prenotazioni`
--

INSERT INTO `prenotazioni` (`id`, `nome`, `contatto`, `nPersone`, `orario`) VALUES
(69, 'Francesco', 'Diodato', 5, '2022-03-24 00:00:00'),
(72, 'Angelo', 'Chiapparo', 1, '2022-03-24 00:05:00'),
(73, 'Alberto', 'Ravasio', 4, '2022-03-26 00:00:00'),
(74, 'Giuseppe', 'Ravasio', 1, '2022-03-28 00:00:00'),
(75, 'Giuseppe', 'Gioia', 3, '2022-03-29 00:00:00'),
(76, 'Chiapparo', 'Angelo', 2, '2022-03-30 00:00:00'),
(77, 'Giuseppe', 'Ravasio', 1, '2022-03-31 05:00:00');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `codici`
--
ALTER TABLE `codici`
  ADD PRIMARY KEY (`codice`),
  ADD KEY `codici_FK1` (`idPrenotazione`);

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orario` (`orario`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `codici`
--
ALTER TABLE `codici`
  ADD CONSTRAINT `codici_FK1` FOREIGN KEY (`idPrenotazione`) REFERENCES `prenotazioni` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
