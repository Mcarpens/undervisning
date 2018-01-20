-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 18. 01 2018 kl. 19:36:58
-- Serverversion: 10.1.28-MariaDB
-- PHP-version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `undervisning`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(65) NOT NULL,
  `link` varchar(65) NOT NULL,
  `icon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `name`, `link`, `icon`) VALUES
(1, 'Dashboard', 'dashboard', 'fa fa-dashboard'),
(2, 'Beskeder', 'beskeder', 'fa fa-envelope'),
(4, 'Brugere', 'brugere', 'fa fa-users');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`) VALUES
(1, 'Forside', 'forside'),
(2, 'Omkring', 'omkring'),
(3, 'Kontakt', 'kontakt'),
(4, 'Produkter', 'produkter');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(65) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `timestamp`) VALUES
(15, 'Marc Carpens', 'Mcarpens@hotmail.com', 'Hej alle. Dette er en besked test.\r\nDu er bare så lækker! ;)', '2018-01-18 17:43:14');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `name` varchar(65) NOT NULL,
  `link` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `link`, `description`, `status`, `timestamp`) VALUES
(1, 'Opdatering Succes', 'fa fa-check-circle', 'CMS er opdateret med success. Alle filer er udpakket korrekt.', 'success', '2018-01-18 15:35:37'),
(3, 'Opdatering Succes', 'fa fa-check-circle', 'CMS er opdateret med success. Alle filer er udpakket korrekt.', 'success', '2018-01-18 17:35:35'),
(4, 'Opdatering Succes', 'fa fa-check-circle', 'CMS er opdateret med success. Alle filer er udpakket korrekt.', 'success', '2018-01-18 17:36:56'),
(5, 'Opdatering Succes', 'fa fa-check-circle', 'CMS er opdateret med success. Alle filer er udpakket korrekt.', 'success', '2018-01-18 17:37:19');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `product_number` varchar(6) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `product_number`, `description`) VALUES
(15, 'Test', '1.00', 'S8F6fG', 'Test');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `settings`
--

INSERT INTO `settings` (`id`, `site_name`) VALUES
(1, 'OOP & PDO');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `userrole`
--

CREATE TABLE `userrole` (
  `id` int(11) NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `niveau` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `userrole`
--

INSERT INTO `userrole` (`id`, `name`, `niveau`) VALUES
(1, 'Super Admin', 99),
(2, 'Admin', 90),
(3, 'Bruger', 50);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(65) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `fk_userrole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `password`, `email`, `address`, `phone`, `avatar`, `fk_userrole`) VALUES
(1, 'Mcarpens', 'Marc', 'Carpens', '$2y$12$Ot3vNZXnj0XlUz.cQTPtRuiM8gnDfLLCIAZG9b2Vl9no2eSKWOYHG', 'Mcarpens@hotmail.com', 'Farum Hovedgade 10F 2tv', '30484934', 'https://media-exp2.licdn.com/mpr/mpr/shrinknp_200_200/AAMABADGAAwAAQAAAAAAAA8LAAAAJGZjMWMxNTZmLTY1YTEtNDA2ZS05MDBhLTIzMmY5YTYwNmE3Ng.jpg', 1),
(2, 'Test', 'Test', 'Bruger', '$2y$12$fc.2U6RnhME.bp4WVs1wtuAlwcurW7.hGloWQZGx2siXL.jFkBkwK', 'test@test.dk', 'Pulsen 8, 4000 Roskilde', '12345678', 'https://freeiconshop.com/wp-content/uploads/edd/person-flat.png', 2);

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userrole` (`fk_userrole`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tilføj AUTO_INCREMENT i tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tilføj AUTO_INCREMENT i tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tilføj AUTO_INCREMENT i tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tilføj AUTO_INCREMENT i tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tilføj AUTO_INCREMENT i tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tilføj AUTO_INCREMENT i tabel `userrole`
--
ALTER TABLE `userrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`fk_userrole`) REFERENCES `userrole` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
