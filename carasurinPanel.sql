-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2021 at 07:56 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carasurinPanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gov`
--

CREATE TABLE `gov` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `company_type` enum('gov','public') COLLATE utf8_persian_ci NOT NULL,
  `nationality` enum('real_ir','real_foreign') COLLATE utf8_persian_ci NOT NULL,
  `national_number` bigint(20) NOT NULL,
  `economic_code` bigint(20) DEFAULT NULL,
  `tel` bigint(20) NOT NULL,
  `img` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `legals_commercial`
--

CREATE TABLE `legals_commercial` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `company_type` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `nationality` enum('real_ir','real_foreign') COLLATE utf8_persian_ci NOT NULL,
  `registration_number` int(11) DEFAULT NULL,
  `economic_code` int(11) DEFAULT NULL,
  `national_number` int(11) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `legals_non_com`
--

CREATE TABLE `legals_non_com` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `nationality` enum('real_ir','real_foreign') COLLATE utf8_persian_ci NOT NULL,
  `company_type` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `registration_number` int(11) NOT NULL,
  `economic_code` int(11) NOT NULL,
  `national_number` int(11) NOT NULL,
  `tel` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `link` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `real_foreign`
--

CREATE TABLE `real_foreign` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `passport_number` bigint(50) NOT NULL,
  `birthday` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `postal_code` bigint(20) NOT NULL,
  `education` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `img` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `real_ir`
--

CREATE TABLE `real_ir` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `national_code` bigint(20) NOT NULL,
  `birthday` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `postal_code` bigint(20) NOT NULL,
  `education` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `img` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `destroy` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `character_type` enum('real_ir','real_foreign','commercial_law','legal','governmental') COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('active','inactive','blocked','waiting') COLLATE utf8_persian_ci DEFAULT 'inactive',
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `phone_status` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `email_status` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `pass` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `character_type`, `status`, `username`, `phone`, `phone_status`, `email`, `email_status`, `pass`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'azimi', 9150567825, '6399', 'joorjin2@gmail.com', '6399', '$2y$10$pIapXCukLvQ9rzXhHGcss.W5eamHL2eUBqiSMsoQWEwapUeDZ4cB2', '2021-11-28 10:38:24', '2021-11-28 06:55:08'),
(2, NULL, 'inactive', 'azimi1', 9150567825, NULL, 'joorjin2@gmail.com', '3513', '$2y$10$95UtGQhT5VABr0POpJAT9uE3cIE3UeisGQ4CI1ZkwX4.V5qev896W', '2021-11-28 08:37:01', '2021-11-28 08:37:01'),
(3, NULL, 'inactive', 'azimis', 9150567825, NULL, 'joorjin2@gmail.com', '4478', '$2y$10$A3CtzDyYEr2O7UFsyu7YqOrVjNXK1XU9dBG2xzVXBkKUvdi3tokAu', '2021-11-28 08:37:48', '2021-11-28 08:37:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `legals_commercial`
--
ALTER TABLE `legals_commercial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legals_non_com`
--
ALTER TABLE `legals_non_com`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `real_foreign`
--
ALTER TABLE `real_foreign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `real_ir`
--
ALTER TABLE `real_ir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `legals_commercial`
--
ALTER TABLE `legals_commercial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `legals_non_com`
--
ALTER TABLE `legals_non_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `real_foreign`
--
ALTER TABLE `real_foreign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `real_ir`
--
ALTER TABLE `real_ir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
