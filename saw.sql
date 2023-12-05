-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 05, 2023 alle 11:49
-- Versione del server: 10.4.25-MariaDB
-- Versione PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saw`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `nome_evento` varchar(50) NOT NULL,
  `luogo` varchar(255) NOT NULL,
  `n_par_max` int(11) NOT NULL,
  `n_par_corr` int(11) NOT NULL,
  `id_sport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `evento`
--

INSERT INTO `evento` (`id`, `nome_evento`, `luogo`, `n_par_max`, `n_par_corr`, `id_sport`) VALUES
(1, '', 'Stadio San Siro, Milano', 20000, 15000, 1),
(2, '', 'Court Central, Roma', 5000, 3000, 2),
(3, '', 'PalaLottomatica, Roma', 11000, 8000, 3),
(4, '', 'Piscina Olimpica, Roma', 4000, 2000, 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `id` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`id`, `id_utente`, `id_evento`, `data`) VALUES
(1, 1, 1, '2023-11-24 11:13:17'),
(2, 2, 2, '2023-11-24 11:13:17'),
(3, 3, 3, '2023-11-24 11:13:17');

-- --------------------------------------------------------

--
-- Struttura della tabella `sport`
--

CREATE TABLE `sport` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `squadra` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='l''attributo squadra è un bool se 1 è di squadra se 0 è indiv';

--
-- Dump dei dati per la tabella `sport`
--

INSERT INTO `sport` (`id`, `nome`, `squadra`) VALUES
(1, 'Calcio', 1),
(2, 'Tennis', 0),
(3, 'Basketball', 1),
(4, 'Nuoto', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `Name` varchar(30) NOT NULL,
  `Surname` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Pass` varchar(255) NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`Name`, `Surname`, `Email`, `Pass`, `User_id`) VALUES
('a', 'a', 'a@a.a', '$2y$10$ZCh1g9zH9aichonYoKOmDeXcMCr5jDEDYPm5rgmA37RG678z8pCd6', 1),
('dojfnono', 'bb', 'b@b.com', '$2y$10$IfxebLu5S20JnKX4fE0rWuzL8jm4Rs.cYuE6UkvU9WnkGCwqJQFN6', 2),
('c', 'cc', 'c@c.c', '$2y$10$b.DzAu3VRMhtSiIPhThNi.TszUSPEQAfRAN/2mrMF4eoVkDqeMr/K', 3),
('d', 'ddd', 'ddd@d.com', '$2y$10$qIlohmjLCNQW34QlLGVonu/6hWdnkp.Pr7LTYMidJNNTOwMGWx/vS', 4),
('e', 'ee', 'e@e.com', '$2y$10$V02PBB6ugnbYdELFLU8nLegoD5veI.qKEt756XLz6td8ueZjYw/ti', 5),
('ff', 'fff', 'ffff@f.com', '$2y$10$HDLPHmVxP48dyaNMD/KvC.hNiKA1bql20M1RsgfxaUOqQ72eRLRoK', 6),
('g', 'gg', 'g@g.com', '$2y$10$ROOXQOfZeqsgmEH3EeZCbOO/fdu3hQ/k5imAknSE9NbehRJV0Vl0q', 7);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sport` (`id_sport`);

--
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_evento` (`id_evento`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`id_sport`) REFERENCES `sport` (`id`);

--
-- Limiti per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD CONSTRAINT `prenotazione_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`),
  ADD CONSTRAINT `prenotazione_ibfk_2` FOREIGN KEY (`id_utente`) REFERENCES `user` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
