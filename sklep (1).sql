-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 18, 2024 at 03:34 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL COMMENT 'id kategorii',
  `name` varchar(50) DEFAULT NULL COMMENT 'nazwa kategorii',
  `description` varchar(255) DEFAULT NULL COMMENT 'opis kategorii',
  `icon` varchar(100) DEFAULT NULL COMMENT 'nazwa ikony',
  `who_add` int(11) DEFAULT NULL COMMENT 'id użytkownika tworzącego kategorie',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'data utworzenia kategorii'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `name`, `description`, `icon`, `who_add`, `created_at`) VALUES
(1, 'Elektronika', 'Szeroki wybór nowoczesnych urządzeń, w tym smartfony, laptopy, sprzęt audio, kamery oraz akcesoria. Obejmuje również urządzenia domowe, takie jak telewizory i sprzęt AGD, które zwiększają komfort życia i ułatwiając codzienne zadania.', 'bi bi-laptop', NULL, '2024-09-12 15:20:46'),
(2, 'Dom i ogród', 'Kategoria obejmująca produkty do aranżacji i wyposażenia wnętrz oraz ogrodów. Znajdziesz tu meble, dekoracje, narzędzia ogrodnicze, rośliny oraz akcesoria do pielęgnacji przestrzeni domowej i ogrodowej.', 'bi bi-house-door', NULL, '2024-09-12 15:20:46'),
(3, 'Moda i akcesoria', 'Bogaty wybór ubrań, obuwia i dodatków, takich jak biżuteria, torebki i okulary. Kategoria obejmuje najnowsze trendy i klasyki mody, oferując eleganckie i codzienne stylizacje dla każdego. Idealna dla osób poszukujących nowych stylizacji.', 'bi bi-sunglasses', NULL, '2024-09-12 15:20:46'),
(4, 'Zdrowie i uroda', 'Produkty do pielęgnacji ciała, kosmetyki, suplementy diety oraz akcesoria zdrowotne. Obejmuje kosmetyki do pielęgnacji skóry, włosów i paznokci, a także produkty wspierające zdrowy styl życia. Idealne dla osób dbających o urodę i zdrowie.', 'fa fa-leaf', NULL, '2024-09-12 15:20:46'),
(5, 'Dzieci', 'Szeroki wybór produktów dla najmłodszych, w tym zabawki, odzież, akcesoria oraz artykuły edukacyjne. Obejmuje wszystko, co potrzebne do rozwoju, zabawy i codziennej opieki nad dziećmi, od niemowląt po starsze maluchy.', 'fa fa-rocket', NULL, '2024-09-12 15:20:46'),
(6, 'Sport', 'Sprzęt i akcesoria do różnych dyscyplin sportowych, w tym odzież sportowa, obuwie, akcesoria do ćwiczeń i fitnessu. Idealne dla entuzjastów sportu, którzy chcą poprawić swoją wydolność, wygodę i styl podczas aktywności fizycznej.', 'fa fa-futbol-o', NULL, '2024-09-12 15:20:46'),
(7, 'Relaks', 'Produkty sprzyjające odprężeniu i relaksowi, takie jak akcesoria do aromaterapii, poduszki, koce, oraz urządzenia do masażu. Idealne do stworzenia strefy komfortu i relaksu w domu.', 'bi bi-book', NULL, '2024-09-12 15:20:46'),
(8, 'Motoryzacja', 'Akcesoria i części samochodowe, narzędzia, oraz produkty do pielęgnacji i tuningu pojazdów. Znajdziesz tu wszystko, co potrzebne do utrzymania i ulepszania samochodów oraz motocykli.', 'bi bi-car-front', NULL, '2024-09-12 15:20:46'),
(9, 'Artyukuły biurowe i szkolne', 'Kategoria obejmuje szeroki asortyment artykułów niezbędnych zarówno w biurze, jak i w szkole. Znajdziesz tutaj długopisy, zeszyty, segregatory, notatniki oraz inne akcesoria, które ułatwią organizację pracy oraz nauki.', 'bi bi-mortarboard', NULL, '2024-10-15 16:40:51'),
(10, 'Hobby i kolekcje', 'W tej kategorii znajdziesz przedmioty, które wspierają różne pasje i zainteresowania. Od modeli do sklejania, przez kolekcjonerskie figurki, aż po zestawy do szycia, rysowania i innych kreatywnych hobby.', 'fa fa-magic', NULL, '2024-10-15 16:40:51'),
(11, 'Zwierzęta', 'Kategoria dedykowana miłośnikom zwierząt. Oferujemy produkty dla zwierząt domowych, takich jak karma, akcesoria, zabawki oraz preparaty pielęgnacyjne dla psów, kotów, gryzoni i innych pupili.', 'fa fa-paw', NULL, '2024-10-15 16:40:51');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories_products`
--

CREATE TABLE `categories_products` (
  `id` int(11) NOT NULL COMMENT 'id listy kategorii',
  `id_category` int(11) NOT NULL COMMENT 'id kategorii',
  `id_product` int(11) NOT NULL COMMENT 'id produktu',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'data kiedy kategoria została dodana do produktu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories_products`
--

INSERT INTO `categories_products` (`id`, `id_category`, `id_product`, `created_at`) VALUES
(1, 1, 10, '2024-10-17 00:38:01');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `history_orders`
--

CREATE TABLE `history_orders` (
  `id` int(11) NOT NULL COMMENT 'id historii produktu',
  `id_user` int(11) NOT NULL COMMENT 'id użytkownika',
  `id_product` int(11) NOT NULL COMMENT 'id produktu',
  `date` int(11) NOT NULL COMMENT 'data kupna/aktualizacji statusu',
  `status` int(11) NOT NULL COMMENT 'status zamówienia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL COMMENT 'id produktu',
  `name` varchar(50) DEFAULT NULL COMMENT 'nazwa produktu',
  `description` varchar(255) DEFAULT NULL COMMENT 'opis produktu',
  `image` varchar(255) DEFAULT NULL COMMENT 'link do zdjęcia',
  `amount` int(11) NOT NULL DEFAULT 0 COMMENT 'ilość w magazynie',
  `price` float NOT NULL DEFAULT 0 COMMENT 'cena za produkt',
  `who_created` int(11) DEFAULT NULL COMMENT 'id użytkownika tworzącego produkt',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'data utworzenia produktu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name`, `description`, `image`, `amount`, `price`, `who_created`, `created_at`) VALUES
(1, 'Sukienka Sara Mini Orange', 'Opis sukienki', 'sara', 5, 99.99, NULL, '2024-10-15 23:37:42'),
(2, 'Spodnie męskie joggery', 'Opis spodni', 'joggery', 3, 129.99, NULL, '2024-10-15 23:37:42'),
(3, 'Koszula Męska OTIS Beżowa', 'Opis koszuli', 'otis', 2, 149, NULL, '2024-10-15 23:44:16'),
(4, 'Stół rozkładany EVERTON', 'opis stołu', 'everton', 1, 179.99, NULL, '2024-10-15 23:44:16'),
(5, 'Plecak Himawari', 'opis plecaka', 'himawari', 10, 50, NULL, '2024-10-15 23:44:16'),
(6, 'Retoo Szczotka do włosów', 'Opis szczotki', 'retoo', 29, 49.99, NULL, '2024-10-15 23:44:16'),
(7, 'Buty męskie Nike Dunk Low Retro White', 'Opis butów', 'nike', 24, 299.95, NULL, '2024-10-15 23:44:16'),
(8, 'GUIDO fotel wypoczynkowy', 'opis fotela', 'guido', 50, 550.99, NULL, '2024-10-15 23:44:16'),
(9, 'Damskie ocieplane buty sportowe', 'opis butów', 'buty', 79, 24.99, NULL, '2024-10-15 23:44:16'),
(10, 'Mikrofon Niceboy VOICE', 'Opis Mikrofonu', 'voice', 5, 99.99, NULL, '2024-10-15 23:44:16'),
(11, 'Słuchawki Bezprzewodowe Sony', 'opis słuchawek', 'sony', 100, 200, NULL, '2024-10-15 23:44:16'),
(12, 'Konsola drewniana czarna', 'opis konsoli', 'konsola', 20, 3500.5, NULL, '2024-10-15 23:44:16');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id_rating` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `review` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rangs`
--

CREATE TABLE `rangs` (
  `id_rang` int(11) NOT NULL COMMENT 'id rangi',
  `name` varchar(50) DEFAULT NULL COMMENT 'nazwa rangi',
  `level` int(2) DEFAULT 99 COMMENT 'poziom dostępności do rzeczy w sklepie',
  `who_created` int(11) DEFAULT NULL COMMENT 'id użytkownika, który stworzył rangę',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'data powstania rangi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rangs`
--

INSERT INTO `rangs` (`id_rang`, `name`, `level`, `who_created`, `created_at`) VALUES
(1, 'owner', 1, 1, '2024-08-27 18:21:09'),
(2, 'operator', 1, 1, '2024-08-27 18:21:09'),
(3, 'administrator', 2, 1, '2024-08-27 18:21:09'),
(4, 'moderator', 3, 1, '2024-08-27 18:21:09'),
(5, 'helper', 4, 1, '2024-08-27 18:21:09'),
(6, 'user', 10, 1, '2024-08-27 18:22:46');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tokens`
--

CREATE TABLE `tokens` (
  `id_token` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `token_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL COMMENT 'id użytkownika',
  `login` varchar(50) DEFAULT NULL COMMENT 'login użytkownika',
  `password` varchar(255) DEFAULT NULL COMMENT 'zakodowane hasło użytkownika',
  `mail` varchar(100) DEFAULT NULL COMMENT 'e-mail użytkownika',
  `name` varchar(50) DEFAULT NULL COMMENT 'imię użytkownika',
  `surname` varchar(100) DEFAULT NULL COMMENT 'nazwisko użytkownika',
  `register_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'data, w której użytkownik został zarejestrowany',
  `last_login` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'data, kiedy ostatnio użytkownik był zalogowany',
  `status` varchar(50) NOT NULL DEFAULT 'inactive' COMMENT 'czy użytkownik istnieje/jest aktywny (30 dni do odzyskania konta)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Dane użytkowników sklepu';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `mail`, `name`, `surname`, `register_date`, `last_login`, `status`) VALUES
(1, 'admin', 'admin', 'yloru@onet.pl', 'admin', 'admin', '2024-08-27 18:18:08', '2024-10-10 03:53:17', 'active'),
(2, 'user', 'user', 'user@mail.com', 'user', 'user', '2024-08-27 18:18:45', '2024-10-10 03:53:17', 'active');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_rangs`
--

CREATE TABLE `users_rangs` (
  `id` int(11) NOT NULL COMMENT 'id przypisania rangi',
  `id_user` int(11) NOT NULL COMMENT 'id użytkownika, do którego przypisana jest dana ranga',
  `id_rang` int(11) NOT NULL COMMENT 'id rangi nadanej użytkownikowi',
  `who_give` int(11) DEFAULT NULL COMMENT 'id użytkownika nadającego ragę',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'data kiedy ranga została nadana'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `fk_categories_user` (`who_add`);

--
-- Indeksy dla tabeli `categories_products`
--
ALTER TABLE `categories_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categories_products_category` (`id_category`),
  ADD KEY `fk_categories_products_product` (`id_product`);

--
-- Indeksy dla tabeli `history_orders`
--
ALTER TABLE `history_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_history_orders_user` (`id_user`),
  ADD KEY `fk_history_orders_product` (`id_product`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_products_user` (`who_created`);

--
-- Indeksy dla tabeli `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeksy dla tabeli `rangs`
--
ALTER TABLE `rangs`
  ADD PRIMARY KEY (`id_rang`),
  ADD KEY `fk_rangs_user` (`who_created`);

--
-- Indeksy dla tabeli `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id_token`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeksy dla tabeli `users_rangs`
--
ALTER TABLE `users_rangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_rangs_user` (`who_give`),
  ADD KEY `fk_users_rangs_user_id` (`id_user`),
  ADD KEY `fk_users_rangs_rang_id` (`id_rang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id kategorii', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories_products`
--
ALTER TABLE `categories_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id listy kategorii', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history_orders`
--
ALTER TABLE `history_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id historii produktu';

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id produktu', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rangs`
--
ALTER TABLE `rangs`
  MODIFY `id_rang` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id rangi', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id użytkownika', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users_rangs`
--
ALTER TABLE `users_rangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id przypisania rangi', AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_categories_user` FOREIGN KEY (`who_add`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `categories_products`
--
ALTER TABLE `categories_products`
  ADD CONSTRAINT `fk_categories_products_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_categories_products_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history_orders`
--
ALTER TABLE `history_orders`
  ADD CONSTRAINT `fk_history_orders_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_history_orders_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_user` FOREIGN KEY (`who_created`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD CONSTRAINT `product_ratings_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `product_ratings_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `rangs`
--
ALTER TABLE `rangs`
  ADD CONSTRAINT `fk_rangs_user` FOREIGN KEY (`who_created`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `users_rangs`
--
ALTER TABLE `users_rangs`
  ADD CONSTRAINT `fk_users_rangs_rang_id` FOREIGN KEY (`id_rang`) REFERENCES `rangs` (`id_rang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_rangs_user` FOREIGN KEY (`who_give`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_rangs_user_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
