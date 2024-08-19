-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2024 at 04:15 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stunting`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikels`
--

INSERT INTO `artikels` (`id`, `judul`, `isi`, `user_id`, `kategori_id`, `image`, `created_at`, `updated_at`) VALUES
(8, 'Definisi Stunting', '<p>Stunting didefinisikan sebagai kondisi ketika pertumbuhan fisik anak terhambat sehingga tinggi badan anak lebih rendah dari yang seharusnya mengikuti usianya. Kondisi ini biasanya diukur dengan menggunakan standar pertumbuhan WHO.</p>', 5, 16, 'artikel_images/5mBHIZj7RFmivEhwM6FSpsdI4VFPSP3kITal6NhN.jpg', '2024-07-19 09:13:33', '2024-07-19 09:13:33'),
(9, 'Penyebab Stunting', '<p>Stunting pada anak disebabkan oleh berbagai faktor kompleks seperti gizi buruk, infeksi berulang, sanitasi yang tidak memadai, dan akses terbatas terhadap pelayanan kesehatan. Gizi buruk selama masa kritis pertumbuhan anak, terutama selama 1.000 hari pertama kehidupan (dari kehamilan hingga usia 2 tahun), menjadi penyebab utama terjadinya stunting.</p>', 5, 7, 'artikel_images/94JmzemaLK126HZrfOgnQiwG5Lz3zihwxp2Wj4bW.jpg', '2024-07-19 09:14:06', '2024-07-19 09:14:06'),
(10, 'Dampak Stunting', '<p>Stunting memiliki dampak jangka panjang yang serius terhadap perkembangan fisik dan kognitif anak. Anak yang mengalami stunting memiliki risiko lebih tinggi terhadap penyakit kronis dewasa seperti diabetes dan penyakit jantung. Selain itu, stunting juga dapat mempengaruhi produktivitas ekonomi suatu negara karena potensi kecerdasan dan kapasitas kerja yang terhambat.</p>', 5, 8, 'artikel_images/KW81fBRxFs7pGotfM0JoOVJZRFq8phRuo5u1cy62.jpg', '2024-07-19 09:14:29', '2024-07-19 09:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosas`
--

CREATE TABLE `diagnosas` (
  `id` bigint UNSIGNED NOT NULL,
  `petugas_id` bigint UNSIGNED NOT NULL,
  `masyarakat_id` bigint UNSIGNED NOT NULL,
  `konsultasi_id` bigint UNSIGNED NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnosas`
--

INSERT INTO `diagnosas` (`id`, `petugas_id`, `masyarakat_id`, `konsultasi_id`, `jawaban`, `created_at`, `updated_at`) VALUES
(5, 5, 3, 6, '<p>Untuk memastikan pertumbuhan optimal anak, penting untuk memberikan makanan bergizi seimbang, termasuk protein, vitamin, dan mineral yang cukup. Pastikan juga anak mendapatkan asupan ASI eksklusif pada 6 bulan pertama dan makanan pendamping ASI yang sesuai usia setelahnya.</p>', '2024-07-19 09:08:52', '2024-07-19 09:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(7, 'Penyebab Stunting', '2024-07-08 09:36:32', '2024-07-18 11:10:42'),
(8, 'Dampak Stunting', '2024-07-08 09:36:38', '2024-07-08 09:36:38'),
(9, 'Prevalensi Stunting', '2024-07-08 09:36:46', '2024-07-08 09:36:46'),
(10, 'Prevalensi Stunting', '2024-07-08 09:36:54', '2024-07-08 09:36:54'),
(11, 'Peran Nutrisi dalam Pencegahan Stunting', '2024-07-08 09:37:02', '2024-07-08 09:37:02'),
(12, 'Peran Pemerintah dan Organisasi Non-Pemerintah', '2024-07-08 09:37:08', '2024-07-08 09:37:08'),
(13, 'Perbedaan Stunting dengan Masalah Gizi Lainnya', '2024-07-08 09:37:17', '2024-07-08 09:37:17'),
(14, 'Pengaruh Sosial dan Ekonomi terhadap Stunting', '2024-07-08 09:37:28', '2024-07-08 09:37:28'),
(15, 'Stunting dalam Konteks Global', '2024-07-08 09:37:36', '2024-07-08 09:37:36'),
(16, 'Definisi Stunting', '2024-07-08 09:48:58', '2024-07-08 09:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `komentars`
--

CREATE TABLE `komentars` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artikel_id` bigint UNSIGNED NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `konsultasis`
--

CREATE TABLE `konsultasis` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `pertanyaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konsultasis`
--

INSERT INTO `konsultasis` (`id`, `user_id`, `pertanyaan`, `created_at`, `updated_at`) VALUES
(6, 3, 'Saya memiliki anak yang tampak kurang tumbuh dengan baik. Apa yang sebaiknya saya lakukan untuk memastikan pertumbuhannya optimal dan mengatasi masalah stunting?', '2024-07-19 09:08:21', '2024-07-19 09:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_24_160512_create_kategoris_table', 1),
(5, '2024_06_24_144606_create_artikels_table', 1),
(7, '2024_06_28_101034_modify_telepon_column_in_users_table', 1),
(8, '2024_07_02_190825_add_image_to_artikels_table', 1),
(9, '2024_07_07_160842_create_komentars_table', 1),
(12, '2024_06_27_073014_create_konsultasis_table', 2),
(15, '2024_07_10_091401_create_diagnosas_table', 3);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rUpycQndJQuaAzMmGqrOSffxryQ3kJFuQdFzhx78', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWHdUbHpSbnZIVjZ0MFcxUWdJbVA1TEgxa2lkekJlajM1TDNIcUtKdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9tZWRpYWluZm9ybWFzaXN0dW50aW5nLnRlc3QvbG9naW4iO31zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjQ1OiJodHRwOi8vbWVkaWFpbmZvcm1hc2lzdHVudGluZy50ZXN0L2tvbnN1bHRhc2kiO319', 1721405703),
('WYdQMnYFzdQz9bsA50J496CKzipeVhsxy6PpVyxM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.9.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieTZJNnRnOE9CR09MVjNORXZoRHppT1JOc3V4RW1acFphZUpuYUkxciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9tZWRpYWluZm9ybWFzaXN0dW50aW5nLnRlc3QvP2hlcmQ9cHJldmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1721402039);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peran` enum('masyarakat','petugas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'masyarakat',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `alamat`, `telepon`, `peran`, `created_at`, `updated_at`) VALUES
(3, 'ummul', 'ummul756@gmail.com', '$2y$12$2pjCrvj.PQbcSjQHAqKV0eoz53wkiR0PaYOfZ7k/ZzVgYogHcb7uS', 'Pantai Barat', '082262627950', 'masyarakat', '2024-07-11 09:20:01', '2024-07-19 08:57:53'),
(5, 'puskesmasbangkir', 'puskesmasbangkir@gmail.com', '$2y$12$fsPUV2W6W66VmX5x7LukQOBmW1T5MA10pbFKtySMMqb2q.61qbTeq', 'Desa Bangkir', '082290043739', 'petugas', '2024-07-19 09:02:36', '2024-07-19 09:03:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikels_user_id_foreign` (`user_id`),
  ADD KEY `artikels_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `diagnosas`
--
ALTER TABLE `diagnosas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnosas_petugas_id_foreign` (`petugas_id`),
  ADD KEY `diagnosas_masyarakat_id_foreign` (`masyarakat_id`),
  ADD KEY `diagnosas_konsultasi_id_foreign` (`konsultasi_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentars`
--
ALTER TABLE `komentars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentars_artikel_id_foreign` (`artikel_id`),
  ADD KEY `komentars_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `konsultasis`
--
ALTER TABLE `konsultasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `konsultasis_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `diagnosas`
--
ALTER TABLE `diagnosas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `komentars`
--
ALTER TABLE `komentars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konsultasis`
--
ALTER TABLE `konsultasis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikels`
--
ALTER TABLE `artikels`
  ADD CONSTRAINT `artikels_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artikels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `diagnosas`
--
ALTER TABLE `diagnosas`
  ADD CONSTRAINT `diagnosas_konsultasi_id_foreign` FOREIGN KEY (`konsultasi_id`) REFERENCES `konsultasis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `diagnosas_masyarakat_id_foreign` FOREIGN KEY (`masyarakat_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `diagnosas_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `komentars`
--
ALTER TABLE `komentars`
  ADD CONSTRAINT `komentars_artikel_id_foreign` FOREIGN KEY (`artikel_id`) REFERENCES `artikels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentars_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `konsultasis`
--
ALTER TABLE `konsultasis`
  ADD CONSTRAINT `konsultasis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
