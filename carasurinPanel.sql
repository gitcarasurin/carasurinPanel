-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2021 at 01:11 PM
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
-- Table structure for table `govs`
--

CREATE TABLE `govs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `company_type` enum('gov','public') COLLATE utf8_persian_ci DEFAULT NULL,
  `national_number` bigint(20) DEFAULT NULL,
  `economic_code` bigint(20) DEFAULT NULL,
  `tel` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='دولتی ـ سازمان';

-- --------------------------------------------------------

--
-- Table structure for table `legals_commercials`
--

CREATE TABLE `legals_commercials` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `company_type` enum('private_equity','public_stock','limited_responsibility','solidarity','mixed_stock','Non_joint_stock_mixed','relative','cooperative') COLLATE utf8_persian_ci DEFAULT NULL,
  `registration_number` int(11) DEFAULT NULL,
  `economic_code` int(11) DEFAULT NULL,
  `national_number` int(11) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='حقوقی تجاری';

--
-- Dumping data for table `legals_commercials`
--

INSERT INTO `legals_commercials` (`id`, `user_id`, `name`, `company_type`, `registration_number`, `economic_code`, `national_number`, `tel`, `created_at`, `updated_at`) VALUES
(13, 60, 'azimiddd', 'limited_responsibility', NULL, NULL, NULL, NULL, '2021-12-02 08:32:24', '2021-12-02 08:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `legals_non_coms`
--

CREATE TABLE `legals_non_coms` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `company_type` enum('institute','publishers','canon','union','chamber_commerce','NGO') COLLATE utf8_persian_ci DEFAULT NULL,
  `registration_number` int(11) DEFAULT NULL,
  `economic_code` int(11) DEFAULT NULL,
  `national_number` int(11) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='حقوقی غیرتجاری';

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_persian_ci NOT NULL COMMENT 'fa',
  `icon` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `link` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='منو ها';

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_id`, `name`, `title`, `icon`, `link`, `created_at`, `updated_at`) VALUES
(2, NULL, 'dashboard', 'داشبورد', 'fas fa-tachometer-alt', '/', '2021-12-01 05:11:50', '0000-00-00 00:00:00'),
(3, NULL, 'profile', 'اطلاعات کاربری', 'fas fa-user-circle', '/profile', '2021-12-01 12:26:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `real_foreigns`
--

CREATE TABLE `real_foreigns` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `passport_number` bigint(50) DEFAULT NULL,
  `birthday` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `address` varchar(1000) COLLATE utf8_persian_ci DEFAULT NULL,
  `postal_code` bigint(20) DEFAULT NULL,
  `education` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='غیر ایرانی';

--
-- Dumping data for table `real_foreigns`
--

INSERT INTO `real_foreigns` (`id`, `user_id`, `name`, `passport_number`, `birthday`, `address`, `postal_code`, `education`, `created_at`, `updated_at`) VALUES
(19, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-02 08:32:24', '2021-12-02 08:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `real_irs`
--

CREATE TABLE `real_irs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `national_code` bigint(20) DEFAULT NULL,
  `identity_id` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `birthday` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `address` varchar(1000) COLLATE utf8_persian_ci DEFAULT NULL,
  `postal_code` bigint(20) DEFAULT NULL,
  `education` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='شخصیت ایرانی';

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
  `character_type` enum('commercial_law','legals_non_com','governmental','real') COLLATE utf8_persian_ci DEFAULT NULL,
  `nationality` enum('real_ir','real_foreign') COLLATE utf8_persian_ci NOT NULL,
  `status` enum('active','inactive','blocked','waiting') COLLATE utf8_persian_ci DEFAULT 'waiting',
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `phone_status` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `email_status` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `pass` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT 'avatar.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `character_type`, `nationality`, `status`, `username`, `phone`, `phone_status`, `email`, `email_status`, `pass`, `img`, `created_at`, `updated_at`) VALUES
(60, 'commercial_law', 'real_foreign', 'waiting', 'azimi', '09150567820', '52423', 'joorjinhost@gmail.com', NULL, '$2y$10$m5LoWfui28fkaX3.5Lh0dexrcmsAAECaXwVRfeGiasYXJgi87REI2', 'avatar.jpg', '2021-12-02 08:32:24', '2021-12-02 08:32:24');

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
-- Indexes for table `govs`
--
ALTER TABLE `govs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legals_commercials`
--
ALTER TABLE `legals_commercials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legals_non_coms`
--
ALTER TABLE `legals_non_coms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `real_foreigns`
--
ALTER TABLE `real_foreigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `real_irs`
--
ALTER TABLE `real_irs`
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
-- AUTO_INCREMENT for table `govs`
--
ALTER TABLE `govs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `legals_commercials`
--
ALTER TABLE `legals_commercials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `legals_non_coms`
--
ALTER TABLE `legals_non_coms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `real_foreigns`
--
ALTER TABLE `real_foreigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `real_irs`
--
ALTER TABLE `real_irs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
