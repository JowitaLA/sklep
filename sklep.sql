-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 04:03 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.0.30

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
-- Struktura tabeli dla tabeli `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `address_type` enum('billing','delivery') NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `street` varchar(255) NOT NULL,
  `house_number` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `id_user`, `address_type`, `first_name`, `last_name`, `street`, `house_number`, `city`, `postal_code`, `phone_number`, `email`) VALUES
(4, 1, 'billing', 'Jowita', 'Kruk', 'Grzybowa', '5a', 'Dąbrowa Górnicza', '42-530', '+48 739 017 243', 'user@mail.com'),
(5, 1, 'delivery', 'Jowita', 'Kruk', 'Grzybowa', '5a', 'Dąbrowa Górnicza', '42-530', '+48 739 017 243', 'user@mail.com');

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
(1, 1, 10, '2024-10-17 00:38:01'),
(2, 3, 10, '2024-10-30 01:22:56'),
(16, 5, 93, '2024-10-31 17:51:59'),
(19, 6, 93, '2024-11-04 14:17:15'),
(20, 7, 93, '2024-11-04 14:17:21'),
(21, 8, 93, '2024-11-04 14:17:21'),
(22, 1, 6, '2024-11-29 01:53:08'),
(23, 2, 6, '2024-11-29 01:53:08'),
(24, 3, 6, '2024-11-29 01:53:08'),
(25, 4, 6, '2024-11-29 01:53:08'),
(26, 5, 6, '2024-11-29 01:53:08'),
(27, 6, 6, '2024-11-29 01:53:08'),
(28, 7, 6, '2024-11-29 01:53:08'),
(29, 8, 6, '2024-11-29 01:53:08'),
(30, 9, 6, '2024-11-29 01:53:08'),
(31, 10, 6, '2024-11-29 01:53:08'),
(32, 11, 6, '2024-11-29 01:53:08');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `delivery`
--

CREATE TABLE `delivery` (
  `id_delivery` int(11) NOT NULL COMMENT 'id dostawy',
  `name` varchar(50) DEFAULT NULL COMMENT 'nazwa metody dostawy',
  `cost` float NOT NULL DEFAULT 0 COMMENT 'koszt dostawy',
  `estimated_time` varchar(255) NOT NULL COMMENT 'szacowany czas dostawy (np. "1-3 dni robocze")',
  `who_created` int(11) DEFAULT NULL COMMENT 'id użytkownika tworzącego metodę dostawy	',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'data utworzenia dostawy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id_delivery`, `name`, `cost`, `estimated_time`, `who_created`, `created_at`) VALUES
(1, 'Testowa', 7.4, '1-3 dni roboczych', 1, '2024-11-22 02:20:57'),
(3, 'Testowy 2', 12.5, '7 dni roboczych', 1, '2024-11-22 02:26:49');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id_code` int(11) NOT NULL COMMENT 'id kodu rabatowego',
  `code_name` varchar(50) NOT NULL COMMENT 'nazwa kodu rabatowego',
  `discount_value` float NOT NULL COMMENT 'wartość rabatu (procent lub złote)',
  `discount_type` varchar(10) NOT NULL DEFAULT 'percent' COMMENT 'typ rabatu: procentowy lub stały',
  `who_created` int(11) DEFAULT NULL COMMENT 'id użytkownika który stworzył kod rabatowy',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Data i czas utworzenia kodu\r\n);'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount_codes`
--

INSERT INTO `discount_codes` (`id_code`, `code_name`, `discount_value`, `discount_type`, `who_created`, `created_at`) VALUES
(1, 'LATO', 50, 'percent', 1, '2024-11-22 22:47:03'),
(2, 'ZIMA', 10, 'fixed', 1, '2024-11-22 22:48:58');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `delivery_rating` tinyint(4) DEFAULT NULL,
  `payment_rating` tinyint(4) DEFAULT NULL,
  `order_rating` tinyint(4) DEFAULT NULL,
  `search_rating` tinyint(4) DEFAULT NULL,
  `site_rating` tinyint(4) DEFAULT NULL,
  `style_rating` tinyint(4) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `name`, `email`, `delivery_rating`, `payment_rating`, `order_rating`, `search_rating`, `site_rating`, `style_rating`, `message`, `created_at`) VALUES
(5, '', '', 5, 0, NULL, 0, 0, NULL, '', '2024-11-30 15:46:55');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `history_orders`
--

CREATE TABLE `history_orders` (
  `id_order` int(11) NOT NULL COMMENT 'id zamówienia',
  `id_user` int(11) DEFAULT NULL COMMENT 'id użytkownika',
  `status` varchar(50) NOT NULL COMMENT 'Status zamówienia (np. "w trakcie", "zrealizowane", "anulowane")',
  `total_amount` float NOT NULL COMMENT 'Całkowita kwota zamówienia',
  `delivery_address` text NOT NULL COMMENT 'Adres dostawy',
  `billing_address` text NOT NULL COMMENT 'Adres rozliczeniowy',
  `payment_method` varchar(50) NOT NULL COMMENT 'Metoda płatności (np. "karta", "przelew")',
  `payment_status` varchar(50) NOT NULL COMMENT 'Status płatności (np. "opłacono", "nieopłacono")',
  `delivery_method` varchar(100) NOT NULL COMMENT 'Metoda dostawy',
  `delivery_status` varchar(50) DEFAULT NULL COMMENT 'Status dostawy (np. "wysłane", "oczekuje na wysyłkę")',
  `code_name` varchar(100) DEFAULT NULL,
  `code_value` float DEFAULT NULL,
  `code_type` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Data złożenia zamówienia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history_orders`
--

INSERT INTO `history_orders` (`id_order`, `id_user`, `status`, `total_amount`, `delivery_address`, `billing_address`, `payment_method`, `payment_status`, `delivery_method`, `delivery_status`, `code_name`, `code_value`, `code_type`, `created_at`) VALUES
(1, 1, 'w trakcie', 54.75, '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"D\\u0105browa G\\u00f3rnicza\",\"additional_info\":null}', '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"D\\u0105browa G\\u00f3rnicza\"}', 'Płatność online', 'opłacono', '', 'oczekujące', NULL, NULL, NULL, '2024-11-27 01:26:51'),
(2, 1, 'w trakcie', 54.75, '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"D\\u0105browa G\\u00f3rnicza\",\"additional_info\":\"\"}', '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"D\\u0105browa G\\u00f3rnicza\"}', 'Płatność online', 'opłacono', '', NULL, NULL, NULL, NULL, '2024-11-27 01:28:26'),
(3, 1, 'w trakcie', 54.75, '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"D\\u0105browa G\\u00f3rnicza\",\"additional_info\":\"\"}', '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"D\\u0105browa G\\u00f3rnicza\"}', 'Płatność online', 'opłacono', '', NULL, NULL, NULL, NULL, '2024-11-27 01:30:45'),
(4, 1, 'w trakcie', 2834.35, '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"D\\u0105browa G\\u00f3rnicza\",\"additional_info\":\"\"}', '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"D\\u0105browa G\\u00f3rnicza\"}', 'Płatność online', 'opłacono', '', NULL, NULL, NULL, NULL, '2024-11-27 01:44:06'),
(6, 1, 'w trakcie', 269.85, '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\",\"additional_info\":\"\"}', '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\"}', 'Zapłać w lokalnym sklepie', 'opłacono', 'Testowa', 'nie wysłano', NULL, NULL, NULL, '2024-11-27 21:57:05'),
(34, 1, 'w trakcie', 37.49, '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"yloru@onet.pl\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\",\"additional_info\":\"\"}', '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"yloru@onet.pl\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\"}', 'Płatność online', 'opłacono', 'Testowy 2', 'nie wysłano', NULL, NULL, NULL, '2024-11-28 23:36:05'),
(46, 1, 'w trakcie', 57.4, '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\",\"additional_info\":null}', '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\"}', 'Płatność online', 'opłacono', 'Testowa', 'oczekujące', 'LATO', 50, 'percent', '2024-11-27 23:04:12'),
(446, 1, 'w trakcie', 13999.4, '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-511\",\"city\":\"+48 739 017 243\",\"additional_info\":\"\"}', '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-511\",\"city\":\"+48 739 017 243\"}', 'Płatność online', 'opłacono', 'Testowa', 'nie wysłano', 'ZIMA', 10, 'fixed', '2024-11-28 18:31:45'),
(7937659, 1, 'w trakcie', 57.4, '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\",\"additional_info\":\"\"}', '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\"}', 'Płatność online', 'opłacono', 'Testowa', 'nie wysłano', 'LATO', 50, 'percent', '2024-11-27 23:04:29'),
(7937660, 1, 'w trakcie', 57.4, '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\",\"additional_info\":\"\"}', '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\"}', 'Płatność online', 'opłacono', 'Testowa', 'nie wysłano', 'LATO', 50, 'percent', '2024-11-27 23:06:26'),
(7937661, 1, 'w trakcie', 19.4, '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\",\"additional_info\":\"\"}', '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\"}', 'Płatność online', 'opłacono', 'Testowa', 'nie wysłano', 'LATO', NULL, NULL, '2024-11-27 23:15:02'),
(7937662, 1, 'w trakcie', 2211.36, '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"Miasto\",\"additional_info\":\"\"}', '{\"first_name\":\"sss\",\"last_name\":\"AAAA\",\"email\":\"adasdasds@onet.pl\",\"phone_number\":\"+48 123 123 123\",\"street\":\"asdasdassdsadasdas\",\"house_number\":\"5a\",\"postal_code\":\"12-312\",\"city\":\"Miasto\"}', 'Płatność online', 'opłacono', 'Testowa', 'nie wysłano', NULL, NULL, NULL, '2024-11-27 23:18:44'),
(7937663, 1, 'w trakcie', 24.5, '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\",\"additional_info\":\"\"}', '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\"}', 'Płatność online', 'opłacono', 'Testowy 2', 'nie wysłano', NULL, NULL, NULL, '2024-11-29 01:21:27'),
(7937664, 1, 'w trakcie', 19.4, '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\",\"additional_info\":\"\"}', '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\"}', 'Płatność online', 'opłacono', 'Testowa', 'nie wysłano', NULL, NULL, NULL, '2024-11-29 01:26:00'),
(578586451, NULL, 'oczekujące', 212.5, '{\"first_name\":\"Jowita\",\"last_name\":\"Jowita\",\"email\":\"Jowita@a\",\"phone_number\":\"+48 739 017\",\"street\":\"GrzybowaJowita\",\"house_number\":\"Jowita\",\"postal_code\":\"42\",\"city\":\"Jowita\",\"additional_info\":\"\"}', '{\"first_name\":\"Kruk\",\"last_name\":\"Kruk\",\"email\":\"Kruk@a\",\"phone_number\":\"+48\",\"street\":\"Kruk\",\"house_number\":\"Kruk\",\"postal_code\":\"1\",\"city\":\"Kruk\"}', 'Płatność online', 'opłacono', 'Testowy 2', 'oczekujące', NULL, NULL, NULL, '2024-11-29 11:43:53'),
(1147162827, 23, 'w trakcie', 57.4, '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\",\"additional_info\":null}', '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\"}', 'Płatność online', 'opłacono', 'Testowa', 'oczekujące', NULL, NULL, NULL, '2024-11-29 01:50:10'),
(1739193328, NULL, 'anulowane', 24.5, '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\",\"additional_info\":null}', '{\"first_name\":\"Jowita\",\"last_name\":\"Kruk\",\"email\":\"user@mail.com\",\"phone_number\":\"+48 739 017 243\",\"street\":\"Grzybowa\",\"house_number\":\"5a\",\"postal_code\":\"42-530\",\"city\":\"+48 739 017 243\"}', 'Płatność online', 'opłacono', 'Testowy 2', 'oczekujące', NULL, NULL, NULL, '2024-11-29 11:43:26');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscribe_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_items`
--

CREATE TABLE `order_items` (
  `id_item` int(11) NOT NULL COMMENT 'id produktów z zamówienia',
  `id_order` int(11) NOT NULL COMMENT 'id zamówienia',
  `id_product` int(11) NOT NULL COMMENT 'id produktu',
  `product_cost` float NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'ilość produktów'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id_item`, `id_order`, `id_product`, `product_cost`, `quantity`) VALUES
(1, 1, 95, 0, 6),
(2, 1, 93, 0, 1),
(3, 2, 95, 0, 6),
(4, 2, 93, 0, 1),
(5, 3, 95, 0, 6),
(6, 3, 93, 0, 1),
(7, 4, 95, 0, 6),
(8, 4, 8, 0, 5),
(10, 6, 93, 0, 1),
(11, 6, 6, 0, 5),
(13, 7937660, 5, 50, 2),
(14, 7937661, 95, 12, 1),
(15, 7937662, 8, 550.99, 4),
(16, 446, 12, 3500.5, 4),
(17, 34, 9, 24.99, 1),
(18, 7937663, 95, 12, 1),
(19, 7937664, 95, 12, 1),
(20, 1147162827, 5, 50, 1),
(21, 1739193328, 95, 12, 1),
(22, 578586451, 11, 200, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL COMMENT 'id produktu',
  `name` varchar(50) DEFAULT NULL COMMENT 'nazwa produktu',
  `description` text DEFAULT NULL COMMENT 'opis produktu',
  `url` varchar(255) DEFAULT NULL COMMENT 'link',
  `amount` int(11) NOT NULL DEFAULT 0 COMMENT 'ilość w magazynie',
  `price` float NOT NULL DEFAULT 0 COMMENT 'cena za produkt',
  `who_created` int(11) DEFAULT NULL COMMENT 'id użytkownika tworzącego produkt',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'data utworzenia produktu',
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name`, `description`, `url`, `amount`, `price`, `who_created`, `created_at`, `status`) VALUES
(1, 'Sukienka Sara Mini Orange', 'Opis sukienki', 'sara', 5, 99.99, NULL, '2024-10-15 23:37:42', 'active'),
(2, 'Spodnie męskie joggery', 'Opis spodni', 'joggery', 3, 129.99, NULL, '2024-10-15 23:37:42', 'active'),
(3, 'Koszula Męska OTIS Beżowa', 'Opis koszuli', 'otis', 2, 149, NULL, '2024-10-15 23:44:16', 'active'),
(4, 'Stół rozkładany EVERTON', 'opis stołu', 'everton', 1, 179.99, NULL, '2024-10-15 23:44:16', 'active'),
(5, 'Plecak Himawari', 'opis plecaka', 'himawari', 5, 50, NULL, '2024-10-15 23:44:16', 'active'),
(6, 'Retoo Szczotka do włosów', 'Opis szczotki', 'retoo', 24, 49.99, NULL, '2024-10-15 23:44:16', 'active'),
(7, 'Buty męskie Nike Dunk Low Retro White', 'Opis butów', 'nike', 24, 299.95, NULL, '2024-10-15 23:44:16', 'active'),
(8, 'GUIDO fotel wypoczynkowy', 'opis fotela', 'guido', 36, 550.99, NULL, '2024-10-15 23:44:16', 'active'),
(9, 'Damskie ocieplane buty sportowe', 'Sandały na Słupku Guess GELECTRA – Beżowe z Cyrkoniami i Zawieszką Logo\n\nOpis Produktu: Odkryj elegancję i komfort dzięki sandałom na słupku marki Guess, model GELECTRA. Wykonane z najwyższej jakości skóry naturalnej w klasycznym beżowym kolorze, te sandały są idealnym wyborem na każdą specjalną okazję. Ozdobione błyszczącymi cyrkoniami, dodają blasku i luksusu każdej stylizacji. Dodatkowym atutem jest zawieszka z logo Guess na zamku, która podkreśla prestiż i elegancję obuwia.\n\nKluczowe Cechy:\n\nKolor: Beżowy\nModel: GELECTRA\nMarka: Guess\nMateriał: Skóra naturalna\nWysokość obcasa: 9,5 cm\nStyl: Elegancki, wieczorowy\nSzczegóły Produktu:\n\nMateriał: Wysokiej jakości skóra naturalna, zapewniająca trwałość i komfort noszenia\nOzdoby: Błyszczące cyrkonie, dodające sandałom wyjątkowego charakteru\nZapięcie: Zamek z elegancką zawieszką logo Guess\nObcas: Stabilny słupek o wysokości 9,5 cm, zapewniający wygodę przez cały dzień\nKolor: Uniwersalny beżowy, idealny do wielu stylizacji\nZalety Produktu:\n\nWysoka jakość wykonania: Skóra naturalna i solidne wykonanie gwarantują długą żywotność sandałów\nKomfort noszenia: Stabilny słupek i miękka wyściółka zapewniają wygodę przez cały dzień\nElegancki design: Cyrkonie i zawieszka z logo Guess dodają luksusowego wyglądu\nUniwersalność: Doskonałe na specjalne okazje, wieczorne wyjścia czy eleganckie spotkania\nDlaczego warto wybrać sandały Guess GELECTRA?\n\nStyl i elegancja: Idealne połączenie eleganckiego designu i wysokiej jakości materiałów\nKomfort: Wysoki obcas na słupku zapewnia wygodę i stabilność\nLuksusowy akcent: Ozdobione cyrkoniami i zawieszką logo Guess, sandały te wyróżniają się na tle innych\nWszechstronność: Pasują do wielu stylizacji, od wieczorowych sukienek po eleganckie spodnie\nRozmiary: Dostępne w różnych rozmiarach, aby idealnie dopasować się do każdej stopy.\n\nKup teraz w sklepie internetowym Iluxury.pl i ciesz się elegancją oraz komfortem sandałów Guess GELECTRA!\n\nKategoria: Obuwie damskie\nMarka: Guess\nModel: GELECTRA\nKolor: Beżowy\nMateriał: Skóra naturalna\nStyl: Elegancki, wieczorowy\n\nDodaj blasku swojej stylizacji z sandałami Guess GELECTRA – idealnymi na każdą okazję!', 'buty', 69, 24.99, NULL, '2024-10-15 23:44:16', 'active'),
(10, 'Mikrofon Niceboy VOICE', 'Opis Mikrofonu', 'voice', 0, 99.99, NULL, '2024-10-15 23:44:16', 'active'),
(11, 'Słuchawki Bezprzewodowe Sony', 'opis słuchawek', 'sony', 75, 200, NULL, '2024-10-15 23:44:16', 'active'),
(12, 'Konsola drewniana czarna', 'opis konsoli', 'konsola', 15, 3500.5, NULL, '2024-10-15 23:44:16', 'active'),
(93, 'Test', '<h4>Testowy nagłówek</h4><hr><div>Jest to opis produktu</div><div><ul><li>1 plus</li><li>2 plus</li><li>3 plus</li></ul><font color=\"#ff0000\"><div style=\"text-align: left;\"><b style=\"background-color: var(--bs-body-bg); font-size: 1rem; font-family: var(--bs-body-font-family); text-align: var(--bs-body-text-align);\">Ostatnie sztuki!</b></div></font></div>', 'f935e0bee359f7d90aaa5f8a708dd59ef5c857c032029d53345f79e617092f74', 0, 12.5, NULL, '2024-10-31 17:51:59', 'active'),
(95, 'ai', '\r\n            ', 'c2be548e02cba78ed7c1b38c82fd00c33b002196b39f29a722bb10041936425b', 6, 12, 1, '2024-11-21 13:49:03', 'active'),
(96, 'asdadsa', '\r\n            ', 'af985a51529db79db1fd6a818ef5803b1e03548e79966852fcdc2d2f5e066f7e', 24, 12, 1, '2024-11-21 13:49:24', 'active');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id_rating` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `rating` float DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_ratings`
--

INSERT INTO `product_ratings` (`id_rating`, `id_product`, `id_user`, `rating`, `review`, `created_at`) VALUES
(1, 5, 1, 2, 'aaa', '2024-11-28 17:14:23'),
(5, 5, 23, 5, 'uhuh', '2024-11-29 01:50:24');

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
(1, 'owner', 1, NULL, '2024-08-27 18:21:09'),
(2, 'operator', 1, NULL, '2024-08-27 18:21:09'),
(3, 'administrator', 2, NULL, '2024-08-27 18:21:09'),
(4, 'moderator', 3, NULL, '2024-08-27 18:21:09'),
(5, 'helper', 4, NULL, '2024-08-27 18:21:09');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `returns_and_guarantees`
--

CREATE TABLE `returns_and_guarantees` (
  `id_return` int(11) NOT NULL COMMENT 'Id Gwarancji',
  `id_order` int(11) NOT NULL COMMENT 'Id nr zamówienia',
  `id_product` int(11) NOT NULL COMMENT 'Id produktu',
  `reason` varchar(255) NOT NULL COMMENT 'Powód oddania produktu',
  `status` enum('rozpatrywany','przyjęty','odrzucony','') NOT NULL DEFAULT 'rozpatrywany' COMMENT 'status zwrotu',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'data złożenia wniosku'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `returns_and_guarantees`
--

INSERT INTO `returns_and_guarantees` (`id_return`, `id_order`, `id_product`, `reason`, `status`, `created_at`) VALUES
(84, 1, 95, 'aaa', 'przyjęty', '2024-11-28 23:34:46'),
(85, 34, 9, 'Aaa', 'odrzucony', '2024-11-28 23:37:33'),
(70673, 34, 9, 'asdasdasd', 'rozpatrywany', '2024-11-28 23:40:16'),
(156816190, 6, 6, 'aaa', 'rozpatrywany', '2024-11-28 23:51:37'),
(1597818953, 34, 9, '152', 'rozpatrywany', '2024-11-30 12:54:16'),
(2147483647, 34, 9, 'Aaa', 'rozpatrywany', '2024-11-28 23:38:37');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tokens`
--

CREATE TABLE `tokens` (
  `id_token` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `token_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id_token`, `id_user`, `token_value`) VALUES
(52, 22, 'fef2bc3e32b353b3ffafdfd8e4b56e8aa4379b9fcc55786883ed1fa0d0bedc60'),
(54, 2, '57d03440e740c6593cf4cdc33ffd0b1149c295e6f40a0a77c5c8356609cb3b2a'),
(62, 23, '1ccc4acab3ee32740f5bde8b97d3cd86c255b73a95cbc23ec0f61672dc771b21');

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
(1, 'admin', '$2y$10$8ta4VYg3SEITUKO/28vIXOec8E5zHMts9D.gPzkuoOY9pV0Q6kcvy', 'admin@mail.com', 'Administrator', 'Admin', '2024-11-21 01:27:04', '2024-11-21 01:27:04', 'active'),
(2, 'user', 'user', 'user@mail.com', 'user', 'user', '2024-08-27 18:18:45', '2024-10-10 03:53:17', 'active'),
(22, 'admin321', '$2y$10$0FBopkVPf8RBFV4R9orp8.ZxwvjbrakCiPqHpWHnpE6IYC8FCuj4K', 'yloru@onet.pl', NULL, NULL, '2024-11-21 02:29:59', '2024-11-21 02:29:59', 'active'),
(23, 'jowisz', '$2y$10$FcRKuun4vG56TqpXxEf8aO1dWiJYvFnMrHuxyyyA4IVHY9lsTBmAi', 'jowisz1@onet.pl', NULL, NULL, '2024-11-21 12:03:14', '2024-11-21 12:03:14', 'active');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_codes`
--

CREATE TABLE `users_codes` (
  `id_user` int(11) DEFAULT NULL,
  `id_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_codes`
--

INSERT INTO `users_codes` (`id_user`, `id_code`) VALUES
(1, 1),
(1, 1),
(1, 1),
(1, 1),
(1, NULL),
(1, 2),
(1, NULL),
(1, NULL),
(1, NULL),
(1, NULL),
(1, NULL),
(23, NULL),
(1, NULL),
(NULL, NULL);

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
-- Dumping data for table `users_rangs`
--

INSERT INTO `users_rangs` (`id`, `id_user`, `id_rang`, `who_give`, `created_at`) VALUES
(27, 1, 1, NULL, '2024-11-21 01:33:02');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL COMMENT 'id listy życzeń',
  `id_user` int(11) NOT NULL COMMENT 'id użytkownika którego jest lista życzeń',
  `id_product` int(11) NOT NULL COMMENT 'id produktu na liście życzeń'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_user`, `id_product`) VALUES
(19, 1, 93),
(21, 1, 9),
(22, 1, 5);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

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
-- Indeksy dla tabeli `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id_delivery`),
  ADD KEY `fk_who_created` (`who_created`);

--
-- Indeksy dla tabeli `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id_code`),
  ADD KEY `fk_codes_user` (`who_created`);

--
-- Indeksy dla tabeli `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indeksy dla tabeli `history_orders`
--
ALTER TABLE `history_orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeksy dla tabeli `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeksy dla tabeli `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

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
-- Indeksy dla tabeli `returns_and_guarantees`
--
ALTER TABLE `returns_and_guarantees`
  ADD PRIMARY KEY (`id_return`);

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
-- Indeksy dla tabeli `users_codes`
--
ALTER TABLE `users_codes`
  ADD KEY `fk_user_users_code` (`id_user`),
  ADD KEY `fk_code_users_code` (`id_code`);

--
-- Indeksy dla tabeli `users_rangs`
--
ALTER TABLE `users_rangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_rangs_user` (`who_give`),
  ADD KEY `fk_users_rangs_user_id` (`id_user`),
  ADD KEY `fk_users_rangs_rang_id` (`id_rang`);

--
-- Indeksy dla tabeli `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `fk_wishlist_user` (`id_user`),
  ADD KEY `fk_wishlist_product` (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id kategorii', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories_products`
--
ALTER TABLE `categories_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id listy kategorii', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id_delivery` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id dostawy', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id_code` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id kodu rabatowego', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history_orders`
--
ALTER TABLE `history_orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id zamówienia', AUTO_INCREMENT=1739193329;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id produktów z zamówienia', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id produktu', AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rangs`
--
ALTER TABLE `rangs`
  MODIFY `id_rang` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id rangi', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `returns_and_guarantees`
--
ALTER TABLE `returns_and_guarantees`
  MODIFY `id_return` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Gwarancji', AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id użytkownika', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users_rangs`
--
ALTER TABLE `users_rangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id przypisania rangi', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id listy życzeń', AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

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
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `fk_who_created` FOREIGN KEY (`who_created`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD CONSTRAINT `fk_codes_user` FOREIGN KEY (`who_created`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history_orders`
--
ALTER TABLE `history_orders`
  ADD CONSTRAINT `history_orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `history_orders` (`id_order`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);

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
-- Constraints for table `users_codes`
--
ALTER TABLE `users_codes`
  ADD CONSTRAINT `fk_code_users_code` FOREIGN KEY (`id_code`) REFERENCES `discount_codes` (`id_code`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_users_code` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users_rangs`
--
ALTER TABLE `users_rangs`
  ADD CONSTRAINT `fk_users_rangs_rang_id` FOREIGN KEY (`id_rang`) REFERENCES `rangs` (`id_rang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_rangs_user` FOREIGN KEY (`who_give`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_rangs_user_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `fk_wishlist_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_wishlist_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
