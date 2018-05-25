-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 25. 05 2018 kl. 09:08:15
-- Serverversion: 10.1.30-MariaDB
-- PHP-version: 7.2.2

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
(1, 'Dashboard', 'dashboard', 'ti-home'),
(2, 'Beskeder', 'beskeder', 'ti-email'),
(3, 'Notifikationer', 'notifikationer', 'ti-bell'),
(4, 'Brugere', 'brugere', 'ti-user');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `admin_theme`
--

CREATE TABLE `admin_theme` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `admin_theme`
--

INSERT INTO `admin_theme` (`id`, `name`) VALUES
(1, 'Standart Bootstrap Tema'),
(2, 'Lyst Bootstrap Tema');

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
(1, 'Test', '2018-05-23 04:50:25', '1527051025_home-concept-item-2.png', '<p style=\"box-sizing: border-box; margin: 0px 0px 30px; line-height: 1.8; color: #555555; font-family: Lato, sans-serif; background-color: #f5f5f5;\">Employment respond committed meaningful fight against oppression social challenges rural legal aid governance. Meaningful work, implementation, process cooperation, campaign inspire.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 30px; line-height: 1.8; color: #555555; font-family: Lato, sans-serif; background-color: #f5f5f5;\">Advancement, promising development John Lennon, our ambitions involvement underprivileged billionaire philanthropy save the world transform. Carbon rights maintain healthcare emergent, implementation inspire social change solve clean water livelihoods.</p>', 1, 1, 1);

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
(1, 'Nyheder');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `cname` varchar(25) NOT NULL,
  `cimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `colors`
--

INSERT INTO `colors` (`id`, `cname`, `cimage`) VALUES
(3, 'Rød', '1520409884_cykelfarve_1.jpg'),
(4, 'Gul', '1520409908_cykelfarve_2.jpg'),
(5, 'Mørkegrøn', '1520409917_cykelfarve_3.jpg'),
(6, 'Lysegrøn', '1520409923_cykelfarve_4.jpg'),
(7, 'Blå', '1520409929_cykelfarve_5.jpg'),
(8, 'Lilla', '1520409943_cykelfarve_6.jpg'),
(9, 'Pink', '1520409954_cykelfarve_7.jpg'),
(10, 'Hvid', '1520409962_cykelfarve_8.jpg'),
(11, 'Sølv', '1520409969_cykelfarve_9.jpg'),
(12, 'Sort', '1520409975_cykelfarve_10.jpg'),
(13, 'Ingen Farver', '1520410053_1484122984014.png');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fk_user` int(11) DEFAULT NULL,
  `fk_blog` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `comments`
--

INSERT INTO `comments` (`id`, `name`, `text`, `timestamp`, `fk_user`, `fk_blog`) VALUES
(1, NULL, 'Test', '2018-05-23 04:50:46', 1, 1);

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
(3, 'Blog', 'nyheder');

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
(1, 'Marc Carpens', 'Mcarpens@hotmail.com', 'Test', '2018-05-23 04:51:08');

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
(1, 'En Bruger er Slettet', 'ti-check', 'Der er blevet slettet en bruger fra siden.', 'success', '2018-05-18 05:32:56'),
(2, 'Produkt Slettet', 'ti-check', 'Der er blevet slettet et produkt.', 'success', '2018-05-18 05:33:11'),
(3, 'Nyhed Oprettet', 'ti-check', 'En nyhed er blevet oprettet', 'success', '2018-05-23 04:50:25'),
(4, 'Ny Kommentar', 'ti-comment', 'Der er blevet skrevet en ny kommentar', 'success', '2018-05-23 04:50:46'),
(5, 'Ny Besked', 'ti-email', 'Der er modtaget en ny besked. Se den under punktet beskeder.', 'success', '2018-05-23 04:51:08'),
(6, 'Indstillinger er Redigeret', 'ti-check', 'Sidens indstillinger er blevet redigeret', 'success', '2018-05-23 04:51:38'),
(7, 'Indstillinger er Redigeret', 'ti-check', 'Sidens indstillinger er blevet redigeret', 'success', '2018-05-23 04:51:53'),
(8, 'Nyt Produkt Oprettet', 'ti-check', 'Der er blevet oprettet et nyt produkt. Se det under punktet produkter.', 'success', '2018-05-23 04:53:44'),
(9, 'Produkt Redigeret', 'ti-check', 'Der er blevet redigeret på et produkt.', 'success', '2018-05-23 04:54:05'),
(10, 'Produkt Redigeret', 'ti-check', 'Der er blevet redigeret på et produkt.', 'success', '2018-05-23 04:54:16');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `pm`
--

CREATE TABLE `pm` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `fk_user_first` int(11) NOT NULL,
  `fk_user_second` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `pm_fav`
--

CREATE TABLE `pm_fav` (
  `id` int(11) NOT NULL,
  `fk_user_main` int(11) NOT NULL,
  `fk_user_fav` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `product_number` varchar(6) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `height` varchar(10) DEFAULT NULL,
  `length` varchar(10) DEFAULT NULL,
  `on_sale` int(11) NOT NULL,
  `sale_price` varchar(50) NOT NULL,
  `sale_text` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `product_number`, `short_description`, `description`, `image`, `height`, `length`, `on_sale`, `sale_price`, `sale_text`, `stock`) VALUES
(37, 'Test', '1234.00', 'puaQRx', '<p style=\"box-sizing: border-box; margin: 0px 0px 30px; line-height: 1.8; color: #555555; font-family: Lato, sans-serif; background-color: #f5f5f5;\">Employment respond committed meaningful fight against oppression social challenges rural legal aid governance. Meaningful work, implementation, process cooperation, campaign inspire.</p>', '<p style=\"box-sizing: border-box; margin: 0px 0px 30px; line-height: 1.8; color: #555555; font-family: Lato, sans-serif; background-color: #f5f5f5;\">Employment respond committed meaningful fight against oppression social challenges rural legal aid governance. Meaningful work, implementation, process cooperation, campaign inspire.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 30px; line-height: 1.8; color: #555555; font-family: Lato, sans-serif; background-color: #f5f5f5;\">Advancement, promising development John Lennon, our ambitions involvement underprivileged billionaire philanthropy save the world transform. Carbon rights maintain healthcare emergent, implementation inspire social change solve clean water livelihoods.</p>', '1527051256_slide-light-2.png', '0', '0', 1, '1000', 'SPAR 10%', '123');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `product_colors`
--

CREATE TABLE `product_colors` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`) VALUES
(28, 37, 13);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`) VALUES
(1, 37, 17);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `country` varchar(25) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `footer_description` text,
  `footer_logo` varchar(200) DEFAULT NULL,
  `fk_theme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `address`, `city`, `country`, `phone`, `email`, `footer_description`, `footer_logo`, `fk_theme`) VALUES
(1, 'CSYS ::: CMS', 'Farum Hovedgade 10F 2tv', 'Farum', 'Danmark', '30484934', 'Mcarpens@hotmail.com', 'En CMS system der er blevet bygget helt fra grunden af.', '1520435597_logo_new.png', 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `shop_settings`
--

CREATE TABLE `shop_settings` (
  `id` int(11) NOT NULL,
  `shop_nav_title` varchar(50) NOT NULL,
  `shop_nav_subtitle` varchar(100) NOT NULL,
  `shop_brand_logo` varchar(255) NOT NULL,
  `shop_brand_logo_link` varchar(255) NOT NULL,
  `shop_textarea` text NOT NULL,
  `shop_online` int(11) NOT NULL,
  `paypal_url` varchar(255) NOT NULL,
  `paypal_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `shop_settings`
--

INSERT INTO `shop_settings` (`id`, `shop_nav_title`, `shop_nav_subtitle`, `shop_brand_logo`, `shop_brand_logo_link`, `shop_textarea`, `shop_online`, `paypal_url`, `paypal_id`) VALUES
(1, 'Webshoppen', 'Alt er til salg!', '1520415195_logo_new.png', 'https://carpens-systems.dk', '<p>Lorem ipsum dolor!</p>', 1, 'https://www.paypal.com/cgi-bin/webscr', 'Mcarpens-buyer@hotmail.com');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `shop_settings_more_info`
--

CREATE TABLE `shop_settings_more_info` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `shop_settings_more_info`
--

INSERT INTO `shop_settings_more_info` (`id`, `icon`, `title`, `description`) VALUES
(1, 'icon-clock', 'Åbningstider', 'Hverdage: 10-16,<br>\r\nWeekender: Lukket'),
(2, 'icon-credit-cards', 'Betaling', 'Vi acceptere Visa, MasterCard og PayPal.'),
(3, 'icon-truck2', 'Forsendelse', 'Vi yder gratis forsendelse ved køb af 200 DKK eller mere.'),
(4, 'icon-undo', 'Fortrydelsesret', '14-Dages fortrydelsesret ydes på alle produkter.');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `sizes`
--

INSERT INTO `sizes` (`id`, `name`) VALUES
(1, 'Ekstra Small'),
(2, 'Small'),
(13, 'Medium'),
(14, 'Large'),
(15, 'Ekstra Large'),
(16, 'XXL'),
(17, 'Igen angivet størrelse');

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
  `fk_userrole` int(11) DEFAULT NULL,
  `is_loggedin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `password`, `email`, `address`, `phone`, `avatar`, `fk_userrole`, `is_loggedin`) VALUES
(1, 'Mcarpens', 'Marc', 'Carpens', '$2y$12$Ot3vNZXnj0XlUz.cQTPtRuiM8gnDfLLCIAZG9b2Vl9no2eSKWOYHG', 'Mcarpens@hotmail.com', 'Farum Hovedgade 10F 2tv', '30484934', '1520585316_Portrætbillede af mig.jpg', 1, 0);

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `admin_theme`
--
ALTER TABLE `admin_theme`
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
-- Indeks for tabel `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_users_id_fk` (`fk_user`),
  ADD KEY `comments_blogs_id_fk` (`fk_blog`);

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
-- Indeks for tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indeks for tabel `pm`
--
ALTER TABLE `pm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pm_users_id_fk` (`fk_user_first`),
  ADD KEY `pm_users_id_fk2` (`fk_user_second`);

--
-- Indeks for tabel `pm_fav`
--
ALTER TABLE `pm_fav`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pm_fav_users_id_fk` (`fk_user_main`),
  ADD KEY `pm_fav_users_id_fk2` (`fk_user_fav`);

--
-- Indeks for tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_colors_id_fk` (`color_id`),
  ADD KEY `product_colors_products_id_fk` (`product_id`);

--
-- Indeks for tabel `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_colors_id_fk` (`size_id`),
  ADD KEY `product_colors_products_id_fk` (`product_id`);

--
-- Indeks for tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_admin_theme_id_fk` (`fk_theme`);

--
-- Indeks for tabel `shop_settings`
--
ALTER TABLE `shop_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `shop_settings_more_info`
--
ALTER TABLE `shop_settings_more_info`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `sizes`
--
ALTER TABLE `sizes`
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
-- Tilføj AUTO_INCREMENT i tabel `admin_theme`
--
ALTER TABLE `admin_theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tilføj AUTO_INCREMENT i tabel `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Tilføj AUTO_INCREMENT i tabel `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tilføj AUTO_INCREMENT i tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tilføj AUTO_INCREMENT i tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tilføj AUTO_INCREMENT i tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tilføj AUTO_INCREMENT i tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tilføj AUTO_INCREMENT i tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tilføj AUTO_INCREMENT i tabel `pm`
--
ALTER TABLE `pm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tilføj AUTO_INCREMENT i tabel `pm_fav`
--
ALTER TABLE `pm_fav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tilføj AUTO_INCREMENT i tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Tilføj AUTO_INCREMENT i tabel `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tilføj AUTO_INCREMENT i tabel `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tilføj AUTO_INCREMENT i tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tilføj AUTO_INCREMENT i tabel `shop_settings`
--
ALTER TABLE `shop_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tilføj AUTO_INCREMENT i tabel `shop_settings_more_info`
--
ALTER TABLE `shop_settings_more_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tilføj AUTO_INCREMENT i tabel `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tilføj AUTO_INCREMENT i tabel `userrole`
--
ALTER TABLE `userrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Begrænsninger for tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blogs_id_fk` FOREIGN KEY (`fk_blog`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `comments_users_id_fk` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id`);

--
-- Begrænsninger for tabel `pm`
--
ALTER TABLE `pm`
  ADD CONSTRAINT `pm_users_id_fk` FOREIGN KEY (`fk_user_first`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pm_users_id_fk2` FOREIGN KEY (`fk_user_second`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Begrænsninger for tabel `pm_fav`
--
ALTER TABLE `pm_fav`
  ADD CONSTRAINT `pm_fav_users_id_fk` FOREIGN KEY (`fk_user_main`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pm_fav_users_id_fk2` FOREIGN KEY (`fk_user_fav`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Begrænsninger for tabel `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_colors_id_fk` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_colors_products_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Begrænsninger for tabel `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_products_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_sizes_sizes_id_fk` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;

--
-- Begrænsninger for tabel `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_admin_theme_id_fk` FOREIGN KEY (`fk_theme`) REFERENCES `admin_theme` (`id`) ON DELETE CASCADE;

--
-- Begrænsninger for tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`fk_userrole`) REFERENCES `userrole` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
