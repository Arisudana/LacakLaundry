-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 12:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lacaklaundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(55) NOT NULL,
  `lastName` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun_admin`
--

INSERT INTO `akun_admin` (`id`, `username`, `password`, `firstName`, `lastName`, `email`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin321', '$2y$10$XzbjonipOyHrpXQsqmKOw.rFp/QN6uxjglY820Lcg0HHat3hcfoJK', 'Desitano', 'Alif', 'admin321@example.com', '1686989889_farhanrizqigiting.png', 1, NULL, '2023-06-18 03:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `akun_staff`
--

CREATE TABLE `akun_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(55) NOT NULL,
  `lastName` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun_staff`
--

INSERT INTO `akun_staff` (`id`, `username`, `password`, `firstName`, `lastName`, `email`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 'staff123', '$2y$10$QZn7jBrimVnFi.rpeXQLguCcv/vzi.UYAbFcy.2LKlOQSly8HQOee', 'Misael', 'Riciardo', 'staff@example.com', '1686935485_Screenshot-2023-05-24-at-21-27-17-collage-maker-24-may-2023-08-41-am-47avif-AVIF-Image-1140-570-pixels-2649790925.png', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_05_09_030220_create_orders_table', 1),
(3, '2023_05_23_161425_create_akun_staff_table', 1),
(4, '2023_05_23_161435_create_akun_admin_table', 1),
(5, '2023_06_13_171706_create_order_settings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `orderType` varchar(255) NOT NULL,
  `nominalOrder` int(11) NOT NULL,
  `orderWeight` int(11) NOT NULL,
  `orderDate` timestamp NULL DEFAULT NULL,
  `orderStatus` varchar(255) NOT NULL,
  `dateWashed` timestamp NULL DEFAULT NULL,
  `dateIroned` timestamp NULL DEFAULT NULL,
  `dateReady` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customerName`, `phoneNumber`, `orderType`, `nominalOrder`, `orderWeight`, `orderDate`, `orderStatus`, `dateWashed`, `dateIroned`, `dateReady`) VALUES
(1, 'misael', '0888', 'Cuci Kering Setrika', 25000, 5, '2023-06-18 10:33:57', 'Ongoing', NULL, NULL, NULL),
(2, 'Alif', '081234567', 'Cuci Basah', 12000, 3, '2023-06-12 10:34:53', 'Finished', '2023-06-18 10:38:30', NULL, '2023-06-18 10:38:34'),
(3, 'Eldon', '0877765432', 'Cuci Kering Setrika', 15000, 3, '2023-06-13 10:37:14', 'Overdue', NULL, NULL, NULL),
(5, 'Rhakan', '0812345', 'Cuci Kering Setrika', 40000, 8, '2023-05-16 10:40:43', 'Overdue', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_settings`
--

CREATE TABLE `order_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_settings`
--

INSERT INTO `order_settings` (`id`, `description`, `value`) VALUES
(1, 'Overdue Day', 3),
(2, 'Cuci Basah', 3000),
(3, 'Cuci Kering', 4000),
(4, 'Cuci Kering Setrika', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `akun_admin_username_unique` (`username`);

--
-- Indexes for table `akun_staff`
--
ALTER TABLE `akun_staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `akun_staff_username_unique` (`username`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_settings`
--
ALTER TABLE `order_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `akun_staff`
--
ALTER TABLE `akun_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_settings`
--
ALTER TABLE `order_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
