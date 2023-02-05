-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 01:01 PM
-- Server version: 10.4.19-MariaDB-log
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abysand`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients_info`
--

CREATE TABLE `clients_info` (
  `id` int(11) NOT NULL,
  `client_first_name` varchar(256) NOT NULL,
  `client_last_name` varchar(256) NOT NULL,
  `client_email_address` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client_history`
--

CREATE TABLE `client_history` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `transaction_date` varchar(64) NOT NULL,
  `payment_total` varchar(64) NOT NULL,
  `payment_method` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1673342677),
('m130524_201442_init', 1673342679),
('m190124_110200_add_verification_token_column_to_user_table', 1673342679);

-- --------------------------------------------------------

--
-- Table structure for table `shop_categories`
--

CREATE TABLE `shop_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(256) NOT NULL,
  `img` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shop_products`
--

CREATE TABLE `shop_products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_desc` varchar(1024) NOT NULL,
  `price` varchar(16) NOT NULL,
  `category_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shop_products_galleries`
--

CREATE TABLE `shop_products_galleries` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 't6pxfFK7FW4hSjOn8lkKw7EZFZ62FrZS', '$2y$13$0AIszOgP6ZNE7tMQWr4hteRm629zuKrsWEzXysmUHIbYIPyBY6j4K', NULL, 'admin@admin.com', 9, 1673343249, 1673343249, 'w7696nw7dlW9oF-sllrXHLBE-8q4vr8K_1673343249');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients_info`
--
ALTER TABLE `clients_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_history`
--
ALTER TABLE `client_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_products`
--
ALTER TABLE `shop_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_products_galleries`
--
ALTER TABLE `shop_products_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients_info`
--
ALTER TABLE `clients_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_history`
--
ALTER TABLE `client_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_categories`
--
ALTER TABLE `shop_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_products`
--
ALTER TABLE `shop_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_products_galleries`
--
ALTER TABLE `shop_products_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
