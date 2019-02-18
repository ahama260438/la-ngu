-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 18, 2019 at 04:13 AM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `la-ngu`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_registers`
--

CREATE TABLE `data_registers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 NOT NULL,
  `school` varchar(191) CHARACTER SET utf8 NOT NULL,
  `department` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_registers`
--

INSERT INTO `data_registers` (`id`, `title`, `name`, `lastname`, `type`, `school`, `department`, `created_at`, `updated_at`) VALUES
(7, 'นาย', 'อาหะมะ', 'เจ๊ะนุ', 'ปวส', 'นราสิกขาลัย', 'ช่างยนต์', '2019-02-15 13:23:00', '2019-02-15 13:22:00'),
(8, 'นาย', 'ทดสอบ', 'เจ๊ะนุ', 'ปวส', 'นราสิกขาลัย', 'ช่างยนต์', '2019-02-15 13:23:00', '2019-02-15 13:22:00'),
(9, 'นาง', 'test', 'ทดสอบ', 'ปวช', 'นราสิกขาลัย', 'ช่างยนต์', '2019-02-18 02:43:40', '2019-02-18 02:43:40'),
(10, 'นาย', 'ahama', 'ทดสอบ', 'ปวช', 'นราสิกขาลัย', 'ชีวะวิทยา', '2019-02-18 02:47:10', '2019-02-18 02:47:10'),
(11, 'นาย', 'ทดสอบ', 'ทดสอบ', 'ปวช', 'นราสิกขาลัย', 'คอมพิวเตอร์55', '2019-02-18 02:50:11', '2019-02-18 02:50:11'),
(12, 'นาย', 'ahama', 'ทดสอบ', 'ปวช', 'นราสิกขาลัย', 'คอมพิวเตอร์', '2019-02-18 03:01:49', '2019-02-18 03:01:49'),
(13, 'นาง', 'test', 'ทดสอบ', 'ปวช', 'นราสิกขาลัย', 'ช่างยนต์', '2019-02-18 03:08:56', '2019-02-18 03:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_15_192117_create_data_registers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `username` varchar(191) CHARACTER SET utf8 NOT NULL,
  `email` varchar(191) CHARACTER SET utf8 NOT NULL,
  `password` varchar(191) CHARACTER SET utf8 NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@test.com', '$2y$10$S8eSzyfWHfzemKReiMBzbucgYDJZ3ET.8y1jmT.ckkRDKYe1GQkUK', 'fyWVzRQFuU42atCjl1CUw6Y2hHFzJRc66AAOCPoJC0ZgjVIgfabzFJZnqxrW', '2019-02-18 03:34:26', '2019-02-18 03:34:26'),
(2, 'test', 'admin1', 'admin1@test.com', '$2y$10$24NZweXTxZTidjp5KEzDVOjCBTFLTvBRqXcLxYNAk8XjtV0CSXp0W', 'T2yg1mgjKVljd2FY4yFOLgcz1WoEb0ogIVXPSZ0wBm7yu3NoBTAxNlfUTCtd', '2019-02-18 03:43:39', '2019-02-18 03:43:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_registers`
--
ALTER TABLE `data_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_registers`
--
ALTER TABLE `data_registers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
