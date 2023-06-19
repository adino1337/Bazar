-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Št 10.Nov 2022, 22:40
-- Verzia serveru: 10.4.21-MariaDB
-- Verzia PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `zenit`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `inzerat`
--

CREATE TABLE `inzerat` (
  `id` int(11) NOT NULL,
  `titulok` varchar(255) DEFAULT NULL,
  `popis` text DEFAULT NULL,
  `psc` varchar(5) DEFAULT NULL,
  `mesto` varchar(50) DEFAULT NULL,
  `datum_vytvorenia` datetime DEFAULT NULL,
  `cena` float DEFAULT NULL,
  `typ` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `inzerat`
--

INSERT INTO `inzerat` (`id`, `titulok`, `popis`, `psc`, `mesto`, `datum_vytvorenia`, `cena`, `typ`, `user_id`) VALUES
(2, 'Samsung Galaxy A3', 'Predám smartphone Samsung Galaxy A3 (2017) A320F LCD displej + dotyková plocha čierna - originál. Zabalený, nový, nepoužitý. Tel. č. +421 918 526 879.', '03104', 'Liptovský Mikuláš', '2022-11-06 20:03:02', 50, 'Predám', 18),
(3, 'Ford Kuga', 'Predám Ford Kuga Individual 120 kw/163 PS, 4x4, r.v.11/2014, model 2015, automat, 86000 km, natáčacie xenónové svetlomety, vyhrievané sedačky predné aj zadné, bezkľúčové štartovanie, led denné svietenie, parkovacie senzory predné + zadné, cúvacia kamera, automatické parkovanie, vyhievané čelné + zadné sklo, automatická klimatizácia, multifunkčný volant, TK/EK do 1/2023, TOP stav. +421 910 222 325', '97901', 'Rimavská Sobota', '2022-11-07 22:03:02', 14500, 'Predám', 18),
(4, 'Jazdené pneumatiky', 'Darujem jazdené pneumatiky rôznych značiek a rozmerov. Pneumatiky určené pre osobné automobily aj poľnohospodárske stroje, traktory, nakladače, vlečky a pod. Pneumatiky je nutné vyzdvihnúť si osobne. Volajte cez týždeň v čase od 8:00 do 18:00 na telefónne číslo +421 915 966 998.', '97590', 'Banská Bysrtica', '2022-10-02 21:42:02', 0, 'Darujem', 18);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `hlavny_obrazok` tinyint(4) DEFAULT NULL,
  `inzerat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `photos`
--

INSERT INTO `photos` (`id`, `path`, `hlavny_obrazok`, `inzerat_id`) VALUES
(1, 'obrazky/foto_inzeraty/samsung/samsung1.jpg', 1, 2),
(2, 'obrazky/foto_inzeraty/samsung/samsung2.jpg', 0, 2),
(3, 'obrazky/foto_inzeraty/samsung/samsung3.jpg', 0, 2),
(4, 'obrazky/foto_inzeraty/ford_kuga/kuga1.jpg', 1, 3),
(5, 'obrazky/foto_inzeraty/ford_kuga/kuga2.jpg', 0, 3),
(6, 'obrazky/foto_inzeraty/ford_kuga/kuga3.jpg', 0, 3),
(7, 'obrazky/foto_inzeraty/ford_kuga/kuga4.jpg', 0, 3),
(8, 'obrazky/foto_inzeraty/pneumatiky/pneumatiky1.jpg', 1, 4),
(9, 'obrazky/foto_inzeraty/pneumatiky/pneumatiky2.jpg', 0, 4),
(10, 'obrazky/foto_inzeraty/pneumatiky/pneumatiky3.jpg', 0, 4);
-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `user`
--


--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `inzerat`
--
ALTER TABLE `inzerat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexy pre tabuľku `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inzerat_id` (`inzerat_id`);

--
-- Indexy pre tabuľku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `inzerat`
--
ALTER TABLE `inzerat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pre tabuľku `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pre tabuľku `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `inzerat`
--
ALTER TABLE `inzerat`
  ADD CONSTRAINT `inzerat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Obmedzenie pre tabuľku `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`inzerat_id`) REFERENCES `inzerat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
