-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jan 2025 pada 14.51
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sig_uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2025_01_11_015248_create_provinces_table', 2),
(10, '2025_01_11_015248_create_thematic_data_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `alt_name` varchar(255) NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `alt_name`, `latitude`, `longitude`, `image`, `created_at`, `updated_at`) VALUES
(1, 'SULAWESI UTARA', 'SULAWESI UTARA', -1.6555700, 124.0901500, 'sulut.png', '2025-01-11 02:35:22', '2025-01-11 02:35:22'),
(2, 'SULAWESI TENGAH', 'SULAWESI TENGAH', -1.6937800, 120.8088600, 'sulteng.png', '2025-01-11 02:35:22', '2025-01-11 02:35:22'),
(3, 'SULAWESI SELATAN', 'SULAWESI SELATAN', -3.6446700, 119.9471900, 'sulsel.png', '2025-01-11 02:35:22', '2025-01-11 02:35:22'),
(4, 'SULAWESI TENGGARA', 'SULAWESI TENGGARA', -3.5491200, 121.7279600, 'sultra.png', '2025-01-11 02:35:22', '2025-01-11 02:35:22'),
(5, 'GORONTALO', 'GORONTALO', -1.7186200, 122.4555900, 'gorontalo.png', '2025-01-11 02:35:22', '2025-01-11 02:35:22'),
(6, 'SULAWESI BARAT', 'SULAWESI BARAT', 0.7186200, 122.4555900, 'sulbar.png', '2025-01-11 02:41:08', '2025-01-10 19:44:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `thematic_data`
--

CREATE TABLE `thematic_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `area` decimal(10,2) NOT NULL,
  `population` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `population_density` int(11) NOT NULL,
  `unemployment_rate` decimal(5,2) NOT NULL,
  `human_development_index` decimal(5,2) NOT NULL,
  `per_capita_income` decimal(10,2) NOT NULL,
  `poor_population` int(11) NOT NULL,
  `schools` int(11) NOT NULL,
  `hospitals` int(11) NOT NULL,
  `health_centers` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `thematic_data`
--

INSERT INTO `thematic_data` (`id`, `province_id`, `area`, `population`, `year`, `population_density`, `unemployment_rate`, `human_development_index`, `per_capita_income`, `poor_population`, `schools`, `hospitals`, `health_centers`, `created_at`, `updated_at`) VALUES
(13, 1, 12215.44, 1227794, 2024, 100, 3.13, 71.23, 42.35, 178, 3463, 38, 93, '2025-01-11 02:45:54', '2025-01-11 02:45:54'),
(14, 2, 15377.00, 2659543, 2024, 172, 5.98, 75.03, 64.13, 187, 6836, 112, 198, '2025-01-11 02:45:54', '2025-01-11 02:45:54'),
(15, 3, 46717.00, 9460344, 2024, 151, 4.19, 74.05, 69.70, 736, 11592, 123, 469, '2025-01-11 02:45:54', '2025-01-11 02:45:54'),
(16, 4, 38067.70, 2785517, 2024, 73, 3.09, 73.48, 64.09, 320, 3545, 44, 293, '2025-01-11 02:45:54', '2025-01-11 02:45:54'),
(17, 5, 61841.29, 3154499, 2024, 51, 2.94, 71.56, 112.46, 380, 7836, 42, 215, '2025-01-11 02:45:54', '2025-01-11 02:45:54'),
(18, 6, 16594.75, 1460753, 2024, 88, 2.68, 68.20, 39.53, 162, 3610, 15, 98, '2025-01-11 02:45:54', '2025-01-11 02:45:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'adminsig@gmail.com', NULL, '$2y$12$DdkTg11kPLXztzOWDLkulO8EpcBrgWVJZN5yN9Bw0WM12ZQMGk/ny', 'x1orKBjghrbkmLhtyPxAIKbXdQ9p7btHPICa9AJgDIp7RZOUAdVWRp6BHHi6', '2025-01-10 17:49:32', '2025-01-10 17:49:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `thematic_data`
--
ALTER TABLE `thematic_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thematic_data_province_id_foreign` (`province_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `thematic_data`
--
ALTER TABLE `thematic_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `thematic_data`
--
ALTER TABLE `thematic_data`
  ADD CONSTRAINT `thematic_data_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
