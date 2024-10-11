-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Maj 2022, 01:22
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `playhunt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bettings`
--

CREATE TABLE `bettings` (
  `id` tinyint(4) NOT NULL,
  `betting_creator` tinyint(4) NOT NULL,
  `group_first_id` tinyint(4) NOT NULL,
  `group_second_id` tinyint(4) NOT NULL,
  `when_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `groups`
--

CREATE TABLE `groups` (
  `id` tinyint(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

CREATE TABLE `roles` (
  `idRole` tinyint(4) NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `activate` varchar(1) COLLATE utf8mb4_polish_ci DEFAULT 'T',
  `roleDate` date DEFAULT NULL,
  `finishDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `roles`
--

INSERT INTO `roles` (`idRole`, `name`, `activate`, `roleDate`, `finishDate`) VALUES
(1, 'admin', 'T', '2022-01-01', NULL),
(2, 'user', 'T', '2022-01-01', NULL),
(3, 'operator', 'T', '2022-01-01', NULL),
(4, 'moderator', 'T', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `idUser` tinyint(4) NOT NULL,
  `login` varchar(15) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `password` varchar(15) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `wins` tinyint(4) DEFAULT 0,
  `loses` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`idUser`, `login`, `password`, `email`, `wins`, `loses`) VALUES
(1, 'Ania', 'hasłoani', 'Ania@mail.com', NULL, NULL),
(2, 'Ula', 'hasłouli', 'Ula@mail.com', 4, 2),
(3, 'Olek', 'hasłoolka', 'Olek@gmail.com', NULL, NULL),
(4, 'Łukasz', 'hasłołukasza', 'Łukasz@mail.com', 7, 0),
(5, 'Marcin', 'hasłoMarcina', 'Marcin@gmail.com', NULL, NULL),
(9, 'Julia', 'hasłojulii', 'Julia@gmail.com', 0, 0),
(10, 'Mariusz', 'hasłomariusza', 'Mariusz@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_roles`
--

CREATE TABLE `user_roles` (
  `id` tinyint(4) NOT NULL,
  `whoEdit` varchar(15) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `lastEdit` date DEFAULT NULL,
  `idUser` tinyint(4) NOT NULL,
  `idRole` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `user_roles`
--

INSERT INTO `user_roles` (`id`, `whoEdit`, `lastEdit`, `idUser`, `idRole`) VALUES
(1, NULL, NULL, 1, 1),
(2, NULL, NULL, 3, 3),
(3, 'Ania', '2022-05-10', 4, 2),
(4, 'Ania', '2022-05-13', 2, 2),
(5, 'Ania', '2022-05-20', 5, 4),
(6, NULL, NULL, 10, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `votes`
--

CREATE TABLE `votes` (
  `id` tinyint(4) NOT NULL,
  `id_user` tinyint(4) NOT NULL,
  `id_group` tinyint(4) NOT NULL,
  `id_betting` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `bettings`
--
ALTER TABLE `bettings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `betting_creator` (`betting_creator`);

--
-- Indeksy dla tabeli `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- Indeksy dla tabeli `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idRole` (`idRole`);

--
-- Indeksy dla tabeli `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_group`,`id_betting`),
  ADD KEY `id_betting` (`id_betting`),
  ADD KEY `id_group` (`id_group`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `bettings`
--
ALTER TABLE `bettings`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `groups`
--
ALTER TABLE `groups`
  MODIFY `id` tinyint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `idUser` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `votes`
--
ALTER TABLE `votes`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `bettings`
--
ALTER TABLE `bettings`
  ADD CONSTRAINT `bettings_ibfk_1` FOREIGN KEY (`betting_creator`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `user_roles` (`idRole`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`id_betting`) REFERENCES `bettings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `votes_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
