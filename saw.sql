-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 13, 2024 alle 16:43
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
  `id_sport` int(11) NOT NULL,
  `approvato` tinyint(4) NOT NULL DEFAULT 0,
  `descrizione` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `evento`
--

INSERT INTO `evento` (`id`, `nome_evento`, `luogo`, `n_par_max`, `n_par_corr`, `id_sport`, `approvato`, `descrizione`) VALUES
(3, '', 'PalaLottomatica, Roma', 11000, 8000, 3, 1, ''),
(4, '', 'Piscina Olimpica, Roma', 4000, 2000, 4, 1, ''),
(5, 'triangolare scoppiati', 'Palacum', 28, 0, 1, 1, ''),
(6, 'torneo panaroni', 'Palachiumss', 5, 0, 4, 1, ''),
(7, 'Coppa Tafanacci', 'Casa Pickwick', 1, 0, 3, 1, ''),
(8, 'Bukkake', 'Casa Lazza', 30, 0, 1, 1, ''),
(9, 'Doria ale', 'Casa Mire', 1, 0, 1, 1, 'doria aleeeeee!!! 1234');

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
  `User_id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `newsletter` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`Name`, `Surname`, `Email`, `Pass`, `User_id`, `admin`, `newsletter`) VALUES
('dojfnono', 'bb', 'b@b.com', '$2y$10$IfxebLu5S20JnKX4fE0rWuzL8jm4Rs.cYuE6UkvU9WnkGCwqJQFN6', 2, 0, 0),
('c', 'cc', 'c@c.c', '$2y$10$b.DzAu3VRMhtSiIPhThNi.TszUSPEQAfRAN/2mrMF4eoVkDqeMr/K', 3, 0, 0),
('d', 'ddd', 'ddd@d.com', '$2y$10$qIlohmjLCNQW34QlLGVonu/6hWdnkp.Pr7LTYMidJNNTOwMGWx/vS', 4, 0, 0),
('e', 'ee', 'e@e.com', '$2y$10$V02PBB6ugnbYdELFLU8nLegoD5veI.qKEt756XLz6td8ueZjYw/ti', 5, 0, 0),
('g', 'gg', 'g@g.com', '$2y$10$ROOXQOfZeqsgmEH3EeZCbOO/fdu3hQ/k5imAknSE9NbehRJV0Vl0q', 7, 0, 0),
('mire', 'flex', 'andrea.miresse@gmail.com', '$2y$10$w7QigUU91MIaKvZQCLO2xuude5Y9bG4y4knUrIBtYxiJ6s90q2Wnq', 8, 0, 1),
('Cdeosbgly', 'Kthuqsnip', 'rboip@tygzlqpvjo.etr', '$2y$10$fzuN2PiUrstwr5YisvOfae5rDDleohOThunNMCtwH9ErE7LPrmdGO', 9, 0, 0),
('Tthwgaiyx', 'Shkybgjmf', 'oazkp@minetcpdvy.ert', '$2y$10$AfxvQfX36h.MJrUMgZqKlOOICjzfUjEHSxdxZ0ZffED5HA/M7GgN.', 10, 0, 0),
('Szdgjpytv', 'Ruzqhbgjv', 'hxceo@izrpmjfxtc.ujf', '$2y$10$cKwXpxu6iEkcDy2TVmKUqumJv7ewhRNKzIBHz4xYbnaMDXUgTF0gi', 11, 0, 0),
('Ddexhbolv', 'Hgkdrmqsw', 'qcjwv@aczrnobxjm.byc', '$2y$10$FmiERrhjwHzijYhwaS2sc.TVw7qHB4YT6dgQmEo7yxN4eYBemchEq', 12, 0, 0),
('Alessio', 'Palapompino', 'paladino.alessio388@gmail.com', '$2y$10$4fKnEAtRjmy0P33bNlIO8uyipTrd2JFXf1BqTujUoidyCbZ3LjkzC', 13, 0, 1),
('Vbqjvtxkf', 'Srvuogpsh', 'opwmc@hlzibpuarq.gck', '$2y$10$QwioIS4tmuheQubRxh9FGeEMzgMBu75j3ar4HtO68UKxLoK83EWr2', 15, 0, 0),
('Ydouwjpse', 'Sxotqhfup', 'mjdxe@zlcmkjqshw.bqt', '$2y$10$4Yw4wU4MZhFlWGhN./76Ve/V6GnAtyywyd5Opyi9sgLC2NKSnYILO', 16, 0, 0),
('Iejulitdq', 'Umurtiwld', 'ywohs@rkmcldozft.lkh', '$2y$10$Bz6gDuOnah5mqv1UXh19fuD.VsOQydGE8HzLdbCtB3RQ1/wVjvcOC', 17, 0, 0),
('Fxzfstmrw', 'Psvuafdwr', 'vwnhu@chqxzwyfbv.ouz', '$2y$10$.JWgccwojSW3W2/wrU3ic.fkfBX9OzZSOTTZR4o7CqXOYL5D6PfT2', 18, 0, 0),
('Yassine', 'Abilz', 'yassineabil@yahoo.it', '$2y$10$ytJmW8ZUSbOF6nX8.MDLY.yezcpzjyNo4cCafPvKnzysCikC.k1km', 19, 1, 1),
('Ugmxkhyar', 'Mmnatpkir', 'njotq@ykwgjpvbna.rme', '$2y$10$AcpQRYdzKOXhvgFJf0fDuuDxW3xGCWlqifUvm6zQQiOFPd7sncY/2', 20, 0, 0),
('Dukwjblat', 'Guwknqdvx', 'mfuzd@uobnsdcmhk.yhn', '$2y$10$RnnyJ2Vvilwfrp0IRltQdeWwMBiqjpMN5/gPvADiX653GL4ohRxXW', 21, 0, 0),
('papu', 'papus', 'mickey.smasher.1984@gmail.com', '$2y$10$JTD2NJn4Ekr95rxIDpDYJO2vMJTfDBlH0tdhK3iGTkFKeK7D1C/fG', 26, 0, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  ADD CONSTRAINT `prenotazione_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenotazione_ibfk_2` FOREIGN KEY (`id_utente`) REFERENCES `user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
