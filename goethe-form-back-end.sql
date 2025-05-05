-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2025 at 05:03 PM
-- Server version: 5.7.39
-- PHP Version: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goethe-form-back-end`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `full_name`, `phone_number`, `email`, `city`, `birth_date`, `test_id`, `created_at`, `updated_at`) VALUES
(1, 'Muhammadamin Mirboqijonov', '+998998091644', 'admin@admin.com', 'Ташкент / Toshkent', '2025-05-06', 1, '2025-05-05 12:27:43', '2025-05-05 12:27:43'),
(2, 'Muhammadamin Mirboqijonov', '+998998091649', 'admin@admin.com', 'Ташкент / Toshkent', '2025-05-11', 1, '2025-05-05 12:37:42', '2025-05-05 12:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `contact_a2s`
--

CREATE TABLE `contact_a2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_a2s`
--

INSERT INTO `contact_a2s` (`id`, `full_name`, `phone_number`, `email`, `city`, `birth_date`, `test_id`, `created_at`, `updated_at`) VALUES
(1, 'Muhammadamin Mirboqijonov', '+998998091644', 'admin@admin.com', 'Ташкент / Toshkent', '2025-05-06', 1, '2025-05-05 12:45:06', '2025-05-05 12:45:06'),
(2, 'Muhammadamin Mirboqijonov', '+998998091645', 'admin@admin.com', 'Ташкент / Toshkent', '2025-05-08', 1, '2025-05-05 12:46:52', '2025-05-05 12:46:52'),
(3, 'Muhammadamin Mirboqijonov', '+998998091646', 'admin@admin.com', 'Ташкент / Toshkent', '2025-05-06', 2, '2025-05-05 12:48:43', '2025-05-05 12:48:43'),
(5, 'Muhammadamin Mirboqijonov', '+998998091648', 'admin@admin.com', 'Ташкент / Toshkent', '2025-05-06', 2, '2025-05-05 12:54:27', '2025-05-05 12:54:27'),
(6, 'Sekwang company admin', '+998917987888', 'sekwangadmin@gmail.com', 'Ташкент / Toshkent', '2025-05-06', 2, '2025-05-05 12:54:41', '2025-05-05 12:54:41'),
(8, 'Muhammadamin Mirboqijonov', '+998998091621', 'admin@admin.com', 'Ташкент / Toshkent', '2025-05-06', 2, '2025-05-05 13:12:43', '2025-05-05 13:12:43'),
(9, 'Muhammadamin Mirboqijonov', '+998998091641', 'admin@admin.com', 'Ташкент / Toshkent', '2025-05-08', 1, '2025-05-05 14:52:30', '2025-05-05 14:52:30'),
(10, 'Muhammadamin Mirboqijonov', '+998998091640', 'admin@admin.com', 'Ташкент / Toshkent', '2025-05-15', 1, '2025-05-05 14:53:19', '2025-05-05 14:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `contact_b1s`
--

CREATE TABLE `contact_b1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` json NOT NULL,
  `birth_date` date NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_b1s`
--

INSERT INTO `contact_b1s` (`id`, `full_name`, `phone_number`, `email`, `city`, `module`, `birth_date`, `test_id`, `created_at`, `updated_at`) VALUES
(1, 'Muhammadamin Mirboqijonov', '+998998091644', 'admin@admin.com', 'Ташкент / Toshkent', '\"[1,2]\"', '2025-05-24', 1, '2025-05-02 15:48:43', '2025-05-02 15:48:43'),
(2, 'Muhammadamin Mirboqijonov', '+998998091645', 'admin@admin.com', 'Ташкент / Toshkent', '\"[1]\"', '2025-05-29', 1, '2025-05-02 15:53:17', '2025-05-02 15:53:17'),
(3, 'Muhammadamin Mirboqijonov', '+998998091642', 'admin@admin.com', 'Ташкент / Toshkent', '\"[1,4]\"', '2025-05-30', 2, '2025-05-02 15:53:44', '2025-05-02 15:53:44'),
(4, 'Muhammadamin Mirboqijonov', '+998998091646', 'admin@admin.com', 'Ташкент / Toshkent', '\"[2]\"', '2025-05-21', 1, '2025-05-02 15:54:15', '2025-05-02 15:54:15'),
(5, 'Muhammadamin Mirboqijonov', '+998998091641', 'admin@admin.com', 'Ташкент / Toshkent', '\"[1]\"', '2025-05-06', 1, '2025-05-05 13:34:24', '2025-05-05 13:34:24'),
(6, 'Muhammadamin Mirboqijonov', '+998998091640', 'admin@admin.com', 'Ташкент / Toshkent', '\"[1,2]\"', '2025-05-07', 1, '2025-05-05 15:50:16', '2025-05-05 15:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `contact_b2s`
--

CREATE TABLE `contact_b2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `module` json NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `limits`
--

CREATE TABLE `limits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `max_submissions` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `limits`
--

INSERT INTO `limits` (`id`, `name`, `start_date`, `end_date`, `max_submissions`, `created_at`, `updated_at`) VALUES
(1, 'Muhammadamin Mirboqijonov', '2025-05-01 12:31:00', '2025-05-05 17:31:00', 3, '2025-05-02 09:31:22', '2025-05-05 14:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `limit_a2s`
--

CREATE TABLE `limit_a2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `max_submissions` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `limit_a2s`
--

INSERT INTO `limit_a2s` (`id`, `name`, `start_date`, `end_date`, `max_submissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2025-05-05 05:01:00', '2025-05-05 23:02:00', 110, '2025-05-03 10:01:55', '2025-05-05 15:25:36'),
(2, 'test', '2025-05-05 15:47:00', '2025-05-05 16:47:00', 4, '2025-05-05 12:48:05', '2025-05-05 13:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `limit_b1s`
--

CREATE TABLE `limit_b1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `max_submissions` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `limit_b1s`
--

INSERT INTO `limit_b1s` (`id`, `name`, `start_date`, `end_date`, `max_submissions`, `created_at`, `updated_at`) VALUES
(1, 'test', '2025-05-02 12:33:00', '2025-05-05 19:33:00', 30, '2025-05-02 09:33:20', '2025-05-05 15:28:01'),
(2, 'Muhammadamin Mirboqijonov', '2025-05-01 19:52:00', '2025-05-04 18:54:00', 3, '2025-05-02 15:52:36', '2025-05-02 15:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `limit_b2s`
--

CREATE TABLE `limit_b2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `max_submissions` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_02_07_053700_create_limit_a2s_table', 1),
(7, '2025_02_07_053700_create_limit_b1s_table', 1),
(8, '2025_02_07_053701_create_contact_a2s_table', 1),
(9, '2025_02_07_053701_create_contact_b1s_table', 1),
(10, '2025_02_07_053721_create_limits_table', 1),
(11, '2025_02_07_053731_create_contacts_table', 1),
(12, '2025_05_01_000002_create_limit_b2s_table', 1),
(13, '2025_05_01_000003_create_contact_b2s_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$12$fnuwbSG7fHiypoZ3S/BKmO6PvTwveq2TfYNYBx6lQ93Bvl5///EqG', NULL, '2025-05-02 09:31:01', '2025-05-02 09:31:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_test_id_foreign` (`test_id`);

--
-- Indexes for table `contact_a2s`
--
ALTER TABLE `contact_a2s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_a2s_test_id_foreign` (`test_id`);

--
-- Indexes for table `contact_b1s`
--
ALTER TABLE `contact_b1s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_b1s_test_id_foreign` (`test_id`);

--
-- Indexes for table `contact_b2s`
--
ALTER TABLE `contact_b2s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_b2s_test_id_foreign` (`test_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limit_a2s`
--
ALTER TABLE `limit_a2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limit_b1s`
--
ALTER TABLE `limit_b1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limit_b2s`
--
ALTER TABLE `limit_b2s`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_a2s`
--
ALTER TABLE `contact_a2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_b1s`
--
ALTER TABLE `contact_b1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_b2s`
--
ALTER TABLE `contact_b2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `limits`
--
ALTER TABLE `limits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `limit_a2s`
--
ALTER TABLE `limit_a2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `limit_b1s`
--
ALTER TABLE `limit_b1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `limit_b2s`
--
ALTER TABLE `limit_b2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `limits` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_a2s`
--
ALTER TABLE `contact_a2s`
  ADD CONSTRAINT `contact_a2s_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `limit_a2s` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_b1s`
--
ALTER TABLE `contact_b1s`
  ADD CONSTRAINT `contact_b1s_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `limit_b1s` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_b2s`
--
ALTER TABLE `contact_b2s`
  ADD CONSTRAINT `contact_b2s_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `limit_b2s` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
