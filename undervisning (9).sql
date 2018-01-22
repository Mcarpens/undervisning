-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 22. 01 2018 kl. 08:49:03
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
-- Struktur-dump for tabellen `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `images` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `fk_author` int(11) DEFAULT NULL,
  `fk_category` int(11) DEFAULT NULL,
  `fk_tags` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `timestamp`, `images`, `text`, `fk_author`, `fk_category`, `fk_tags`) VALUES
(1, 'Test Blog', '2018-01-21 12:08:36', '8e44c8d018ff39e92aede6ebc9b23e25be1562b3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 1),
(11, 'Central Version Source Controller', '2018-01-21 16:49:07', '8e44c8d018ff39e92aede6ebc9b23e25be1562b3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 1),
(12, 'Martin', '2018-01-22 07:37:03', '462fd1272c66ec5c91ccb0a07da748cdff5505e6', 'Lorem ipsen dollar', 2, 1, 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`) VALUES
(1, 'Nyheder');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `name`) VALUES
(1, 'TEST');

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
(3, 'Blog', 'nyheder'),
(4, 'Produkter', 'produkter'),
(5, 'Kontakt', 'kontakt');

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
(175, 'En Bruger er logget ind', 'fa fa-check-circle', 'En bruger er logget ind på administrations panelet', 'success', '2018-01-22 07:29:52'),
(176, 'En Bruger er Redigeret', 'fa fa-check-circle', 'Der er blevet redigeret i en bruger.', 'success', '2018-01-22 07:32:54'),
(177, 'En Bruger er Redigeret', 'fa fa-check-circle', 'Der er blevet redigeret i en bruger.', 'success', '2018-01-22 07:33:04'),
(178, 'Nyhed Oprettet', 'fa fa-check-circle', 'En nyhed er blevet oprettet', 'success', '2018-01-22 07:37:03');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `product_number` varchar(6) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `product_number`, `description`, `image`) VALUES
(16, 'Flyttemand Martin', '1.00', '6eNXRQ', 'Flytter verden, og !stærk som en hest!', 'http://www.supercoloring.com/sites/default/files/styles/coloring_medium/public/cif/2015/12/mover-with-boxes-coloring-page.jpg'),
(17, 'Test', '199.00', 'y1ScUb', 'Lorem ipsun dolor', 'https://bottegadelsarto.com/shop/wp-content/uploads/2016/12/sign.png'),
(18, 'Bla bla', '129.00', 'RoMyEs', 'laksjdfasf ', 'https://cdn-images-1.medium.com/max/1200/1*HM_HNezoGrz0R0iBiz1mUQ.jpeg'),
(19, 'Schous Kager', '999999.99', 'eMwp26', 'Verdens bedste kage guide og side!', 'http://b.bimg.dk/node-images/667/4/800x600-u/4667300-laglaceblixenhel.jpg'),
(20, 'Flubber', '1999.95', 'AcFhpC', 'Flubber en slimklat der kan det hele. ', 'https://i.pinimg.com/736x/41/65/26/4165266e6103ccdbc604280f129f6b2a--diy-crafts-for-kids-fun-crafts.jpg');

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
(1, 'Mcarpens', 'Marc', 'Carpens', '$2y$12$Ot3vNZXnj0XlUz.cQTPtRuiM8gnDfLLCIAZG9b2Vl9no2eSKWOYHG', 'Mcarpens@hotmail.com', 'Farum Hovedgade 10F 2tv', '30484934', 'bad66f57fef9d3c8ecb7ef61965f5a2424721173', 1),
(2, 'Test', 'Test', 'Bruger', '$2y$12$fc.2U6RnhME.bp4WVs1wtuAlwcurW7.hGloWQZGx2siXL.jFkBkwK', 'test@test.dk', 'Pulsen 8, 4000 Roskilde', '12345678', '0487a3c256d7318de93d26e183667ac9b56be46f', 2),
(3, 'NyBruger', 'Ny', 'Bruger', '$2y$12$sK/xTlE2cqF8zDM7/QtMpOxqfOZDLvn896YrMAq2vcjKh3RBMT9xy', 'test@test.dk', 'Pulsen 8, 4000 Roskilde', '12345678', 'd440faa574e00dd2be4b3f74715c2ace034d45a3', 3);

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_author` (`fk_author`),
  ADD KEY `fk_category` (`fk_category`),
  ADD KEY `fk_tags` (`fk_tags`);

--
-- Indeks for tabel `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `blog_tags`
--
ALTER TABLE `blog_tags`
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
-- Tilføj AUTO_INCREMENT i tabel `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tilføj AUTO_INCREMENT i tabel `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tilføj AUTO_INCREMENT i tabel `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tilføj AUTO_INCREMENT i tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tilføj AUTO_INCREMENT i tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tilføj AUTO_INCREMENT i tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- Tilføj AUTO_INCREMENT i tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_blog_categories_id_fk` FOREIGN KEY (`fk_category`) REFERENCES `blog_categories` (`id`),
  ADD CONSTRAINT `blogs_blog_tags_id_fk` FOREIGN KEY (`fk_tags`) REFERENCES `blog_tags` (`id`),
  ADD CONSTRAINT `blogs_users_id_fk` FOREIGN KEY (`fk_author`) REFERENCES `users` (`id`);

--
-- Begrænsninger for tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`fk_userrole`) REFERENCES `userrole` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
