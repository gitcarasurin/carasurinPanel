-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2021 at 02:11 PM
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
-- Table structure for table `legals`
--

CREATE TABLE `legals` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `registration_number` int(11) DEFAULT NULL,
  `economic_code` int(11) DEFAULT NULL,
  `national_number` int(11) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `link` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `title`, `icon`, `link`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'داشبورد', 'fas fa-tachometer-alt', '/', '2021-11-25 12:30:46', '0000-00-00 00:00:00'),
(3, 'profile', 'پروفایل', 'fas fa-user-circle', '/profile', '2021-11-25 13:09:40', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `user_id`, `token`, `destroy`, `created_at`, `updated_at`) VALUES
(5, 37, '-$v#QC9GI&H%/4xorjqhz0F*i=3kp7R!udmlcSLJ^fBY*A6twOeN85-E21bTyDsgn+PaVMUKWZ@', '2021-11-28 06:42:07', '2021-11-25 06:42:07', '2021-11-25 09:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `character_type` enum('real','legal') COLLATE utf8_persian_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `email_status` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `phone_status` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `document_authentication` tinyint(1) NOT NULL DEFAULT 0,
  `national_number` int(10) DEFAULT NULL,
  `national_id` int(10) DEFAULT NULL,
  `birthday` timestamp NULL DEFAULT NULL,
  `place_birth` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `addres` varchar(1000) COLLATE utf8_persian_ci DEFAULT NULL,
  `postal_code` int(10) DEFAULT NULL,
  `job` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `education` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `character_type`, `username`, `password`, `name`, `email`, `email_status`, `phone`, `phone_status`, `document_authentication`, `national_number`, `national_id`, `birthday`, `place_birth`, `addres`, `postal_code`, `job`, `education`, `created_at`, `updated_at`) VALUES
(37, 'real', 'azimi', '$2y$10$ggXLX2mUpr9rmPSWP4vhIeDbA07W.uyjdy7jJtbkOUxrm0cI.p7R2', 'محمد جواد عظیمی', 'joorjin2@gmail.com', 'confirmed', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-25 04:43:46', '2021-11-25 04:49:47'),
(38, 'real', 'khorramdel', '$2y$10$KNpM27brRiG7/rQqZUO.Quyx7HMrt43njXQMXFzMGms109aaiYacC', 'مهلا خرم دل', 'm.khorramdel90@gmail.com', 'confirmed', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-25 05:50:54', '2021-11-25 05:53:17'),
(39, 'real', 'user', '$2y$10$A0buCXncQxeJc6rlLcUET.KwdnpI/CS7oR/N86ENL1I9ROP07kSee', 'تست تست آبادی', 'mohammadjavjad2903@gmail.com', '4253', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-25 05:52:22', '2021-11-25 05:52:22');

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
-- Indexes for table `legals`
--
ALTER TABLE `legals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
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
-- AUTO_INCREMENT for table `legals`
--
ALTER TABLE `legals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
