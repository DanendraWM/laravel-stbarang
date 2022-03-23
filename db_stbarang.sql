-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2022 at 03:27 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stbarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pihak_id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemilik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `pihak_id`, `nama_barang`, `merek`, `sn`, `kondisi`, `pemilik`, `created_at`, `updated_at`) VALUES
(1, 1, 'decoder ccna', 'harmonic', 'sn23', 'decoder-ccna.jpg', 'telkom', '2022-01-30 10:12:24', '2022-01-30 10:12:24'),
(2, 2, 'IRD', 'harmonic', 'gd23s', 'ird.jpg', 'telkom', '2022-01-30 14:31:57', '2022-01-30 14:31:57'),
(3, 3, 'encoder', 'ateme', '34pws', 'encoder.jpg', 'telkom', '2022-01-31 02:39:12', '2022-01-31 02:39:12'),
(4, 3, 'smart card', 'irdeto', 'smrt34', 'smart-card.jpg', 'telkom', '2022-01-31 02:40:47', '2022-01-31 02:40:47'),
(5, 4, 'encoder', 'ericsson', 'end234', 'encoder.png', 'telkom', '2022-01-31 03:14:48', '2022-01-31 03:14:48'),
(6, 4, 'IRD', 'cisco', 'sn23', 'ird.jpg', 'telkom', '2022-01-31 03:15:11', '2022-01-31 03:15:11'),
(7, 4, 'smart card', 'conax', 'sps2s', 'smart-card.jpg', 'telkom', '2022-01-31 03:16:29', '2022-01-31 03:16:29'),
(8, 4, 'encoder', 'harmonic', 'sn23', 'encoder8.jpg', 'telkom', '2022-01-31 07:48:25', '2022-01-31 07:48:25'),
(9, 5, 'decoder', 'ateme', 'sn23', 'decoder9.jpg', 'telkom', '2022-01-31 09:53:11', '2022-01-31 09:53:11');

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
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` bigint(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` bigint(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttd1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttd2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `nama1`, `nama2`, `jabatan1`, `jabatan2`, `alamat1`, `alamat2`, `phone1`, `phone2`, `ttd1`, `ttd2`, `instansi1`, `instansi2`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'udin', 'asep', 'Staff', 'headend', 'jl. merdeka selatan', 'jl. Sudirman 2', '0808080808', '08123123123', 'udin1.png', 'asep1.png', 'telkom', 'emtek', 'dipinjamkan kepada emtek', '2022-01-30 10:11:19', '2022-01-30 10:11:19'),
(2, 'ajis', 'waluyo', 'Staff', 'OPS', 'jl. merdeka selatan', 'jl. Sudirman 2', '0808080808', '08123123123', 'ajis2.png', 'waluyo2.png', 'telkom', 'emtek', 'dipinjamkan kepada emtek', '2022-01-30 14:22:40', '2022-01-30 14:22:40'),
(3, 'ijal', 'umam', 'Staff', 'staff', 'jl. merdeka selatan', 'jl. Sudirman 2', '0808080808', '08123123123', 'ijal3.png', 'umam3.png', 'telkom gambir', 'telkom cibinong', 'barang di migrasi ke telkom cibinong', '2022-01-31 02:38:31', '2022-01-31 02:38:31'),
(4, 'umam', 'feri', 'Staff', 'staff', 'jl. merdeka selatan', 'jl. raya narogong', '0808080808', '08123123123', 'umam4.png', 'feri4.png', 'telkom gambir', 'telkom cibinong', 'barang di migrasi ke telkom cibinong', '2022-01-31 03:14:20', '2022-01-31 03:14:20'),
(5, 'Salamun', 'yanto', 'Staff', 'staff', 'jl. merdeka selatan', 'jl. raya narogong', '0808080808', '08123123123', 'Salamun5.png', 'yanto5.png', 'telkom', 'telkom cibinong', 'barang di migrasi ke telkom cibinong', '2022-01-31 09:52:48', '2022-01-31 09:52:48');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_13_022059_create_barangs_table', 1),
(6, '2022_01_14_094852_create_forms_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
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
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
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
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
