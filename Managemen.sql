-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2024 pada 08.39
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `managemen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2023_11_28_024540_create_tbl_kategoris_table', 1),
(4, '2023_11_28_024809_create_tbl_menuses_table', 1),
(5, '2023_12_05_134749_create_tbl_customers', 1),
(6, '2023_12_05_134750_create_tbl_orders', 1),
(7, '2023_12_11_152956_create_tbl_carts', 1),
(8, '2023_12_13_011946_create_tbl_order_details', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_carts`
--

CREATE TABLE `tbl_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_carts`
--

INSERT INTO `tbl_carts` (`id`, `customer_id`, `menu_id`, `qty`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 20, 1, '20000', NULL, '2023-12-26 17:36:33', '2023-12-26 17:36:33'),
(3, 6, 19, 4, '25000', 'tidak pedas', '2023-12-26 17:57:13', '2023-12-26 17:57:53'),
(11, 11, 19, 3, '75000', NULL, '2023-12-27 00:46:42', '2023-12-27 00:46:42'),
(12, 11, 24, 2, '30000', NULL, '2023-12-27 00:46:52', '2023-12-27 00:46:52'),
(13, 12, 19, 2, '50000', NULL, '2023-12-27 01:05:53', '2023-12-27 01:05:53'),
(14, 12, 20, 2, '40000', NULL, '2023-12-27 01:05:57', '2023-12-27 01:05:57'),
(15, 12, 24, 1, '15000', NULL, '2023-12-27 01:06:01', '2023-12-27 01:06:01'),
(25, 19, 18, 2, '50000', NULL, '2023-12-27 01:22:33', '2023-12-27 01:22:33'),
(26, 19, 21, 2, '80000', NULL, '2023-12-27 01:22:36', '2023-12-27 01:22:36'),
(27, 19, 26, 2, '20000', NULL, '2023-12-27 01:22:41', '2023-12-27 01:22:41'),
(28, 19, 31, 2, '74000', NULL, '2023-12-27 01:22:46', '2023-12-27 01:22:46'),
(32, 21, 20, 3, '60000', NULL, '2023-12-27 01:45:01', '2023-12-27 01:45:01'),
(33, 21, 21, 4, '160000', NULL, '2023-12-27 01:45:05', '2023-12-27 01:45:05'),
(34, 21, 23, 1, '15000', NULL, '2023-12-27 01:45:07', '2023-12-27 01:45:07'),
(35, 21, 26, 1, '10000', NULL, '2023-12-27 01:45:16', '2023-12-27 01:45:16'),
(36, 22, 19, 1, '25000', NULL, '2023-12-27 02:04:10', '2023-12-27 02:04:10'),
(37, 23, 19, 1, '25000', NULL, '2023-12-27 02:17:30', '2023-12-27 02:17:30'),
(38, 23, 20, 3, '60000', NULL, '2023-12-27 02:17:39', '2023-12-27 02:17:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_customers`
--

INSERT INTO `tbl_customers` (`id`, `name`, `no_table`, `created_at`, `updated_at`) VALUES
(1, 'asep sudrajat', '3', '2023-12-26 17:36:27', '2023-12-26 17:36:27'),
(2, 'asep sudrajat', '1', '2023-12-26 17:49:32', '2023-12-26 17:49:32'),
(3, 'asep sudrajat', '1', '2023-12-26 17:49:52', '2023-12-26 17:49:52'),
(4, 'Bambang', '1', '2023-12-26 17:52:53', '2023-12-26 17:52:53'),
(6, 'Bambang', '9', '2023-12-26 17:57:05', '2023-12-26 17:57:05'),
(7, 'asep sudrajat', '10', '2023-12-26 18:19:50', '2023-12-26 18:19:50'),
(8, 'asep sudrajat', '1', '2023-12-26 18:39:05', '2023-12-26 18:39:05'),
(11, 'asep sudrajat', '1', '2023-12-27 00:46:38', '2023-12-27 00:46:38'),
(12, 'Bambang', '1', '2023-12-27 01:05:48', '2023-12-27 01:05:48'),
(19, 'asep', '10', '2023-12-27 01:22:29', '2023-12-27 01:22:29'),
(21, 'Surya', '13', '2023-12-27 01:44:57', '2023-12-27 01:44:57'),
(22, 'asep sudrajat', '1', '2023-12-27 02:04:08', '2023-12-27 02:04:08'),
(23, 'Surya', '10', '2023-12-27 02:17:05', '2023-12-27 02:17:05'),
(24, 'asep sudrajat', '1', '2023-12-27 02:32:02', '2023-12-27 02:32:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategoris`
--

CREATE TABLE `tbl_kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_kategoris`
--

INSERT INTO `tbl_kategoris` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 'Minuman', 'test', NULL, '2023-12-25 08:39:53'),
(5, 'Makanan', 'test', '2023-12-26 17:19:10', '2023-12-26 17:19:10'),
(6, 'desert', 'tes', '2023-12-26 18:10:14', '2023-12-26 18:10:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menuses`
--

CREATE TABLE `tbl_menuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_menuses`
--

INSERT INTO `tbl_menuses` (`id`, `id_kategori`, `nama`, `harga`, `image`, `deskripsi`, `created_at`, `updated_at`) VALUES
(6, 2, 'Chocobis Oreo', 20000, 's938476883610207838_p157_i2_w500.png', 'Minuman coklat', '2023-12-21 01:53:52', '2023-12-26 23:39:09'),
(18, 5, 'Bubur Ayam', 25000, 'Bubur-Ayam-2.png', 'Bubur', '2023-12-26 17:31:01', '2023-12-26 17:31:01'),
(19, 5, 'Rendang', 25000, 'beef-rendang-with-ai-generated-free-png.png', 'rendang', '2023-12-26 17:31:22', '2023-12-26 17:31:22'),
(20, 5, 'Ayam bakar', 20000, 'ayam-goreng.png', 'Ayam', '2023-12-26 17:31:39', '2023-12-26 17:31:39'),
(21, 5, 'Sop Buntut', 40000, 'SOP-BUNTUT-600x600.png', 'Sop buntut', '2023-12-26 17:32:03', '2023-12-26 17:32:03'),
(22, 5, 'Mie Goreng', 20000, 'mie-goreng-with-ai-generated-free-png-min.png', 'Mie', '2023-12-26 17:32:27', '2023-12-26 17:32:27'),
(23, 5, 'Soto ayam', 15000, 'pngtree-soto-ayam-png-image_8622856 (1).png', 'Soto', '2023-12-26 17:32:46', '2023-12-26 23:39:31'),
(24, 5, 'Nasi goreng', 15000, 'kuliner_168654009895837.png', 'Nasi goreng', '2023-12-26 23:38:38', '2023-12-26 23:38:38'),
(25, 5, 'Lontong Sayur', 18000, 'lontong-sayur-or-vegetable-rice-cake-free-png-min.png', 'Lontong', '2023-12-26 23:40:26', '2023-12-26 23:40:26'),
(26, 2, 'Aqua', 10000, 'aqua-mini.png', 'minuman', '2023-12-27 00:06:15', '2023-12-27 00:06:15'),
(27, 2, 'Kopi hitam', 12000, 'BlackCoffee_LongShadow_0_1_0 (1).png', 'kopi', '2023-12-27 00:06:45', '2023-12-27 00:06:45'),
(28, 2, 'Hot Tea', 5000, 'tea.png', 'teh', '2023-12-27 00:07:24', '2023-12-27 00:23:30'),
(29, 5, 'Bebek goreng', 30000, 'serba_bebek_foto.png', 'bebek', '2023-12-27 00:08:41', '2023-12-27 00:08:41'),
(30, 6, 'Lava Cake', 45000, 'chocolate-lava-cake-with-ai-generated-free-png (1).png', 'Desert', '2023-12-27 00:11:43', '2023-12-27 00:11:43'),
(31, 6, 'Waffle', 37000, 'waffle-with-ai-generated-free-png (1).png', 'desert', '2023-12-27 00:14:31', '2023-12-27 00:14:31'),
(32, 2, 'Iced Tea', 8000, 'RISHI-ORGANIC-CLASSIC-BLACK-ICED-TEA_1000x.png', 'teh', '2023-12-27 00:23:12', '2023-12-27 00:23:12'),
(33, 5, 'Soto ayam', 20000, 'Bubur-Ayam-2.png', 'Soto ayam', '2023-12-27 02:14:10', '2023-12-27 02:14:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total` int(11) NOT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `customer_id`, `user_id`, `total`, `status_pembayaran`, `metode_pembayaran`, `order_code`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 20000, 'Sudah Dibayar', 'Tunai', 'PSN-616472', '2023-12-26 17:36:35', '2023-12-26 17:37:03'),
(3, 6, 3, 100000, 'Sudah Dibayar', 'Qris', 'PSN-704327', '2023-12-26 17:57:57', '2023-12-26 17:59:05'),
(6, 11, 3, 105000, 'Sudah Dibayar', 'Tunai', 'PSN-484658', '2023-12-27 00:46:56', '2023-12-27 01:04:29'),
(7, 12, 5, 105000, 'Sudah Dibayar', 'Tunai', 'PSN-441915', '2023-12-27 01:06:17', '2023-12-27 01:08:00'),
(15, 19, 5, 224000, 'Sudah Dibayar', 'Qris', 'PSN-199714', '2023-12-27 01:22:51', '2023-12-27 01:23:33'),
(17, 21, 3, 245000, 'Sudah Dibayar', 'Tunai', 'PSN-614469', '2023-12-27 01:46:01', '2023-12-27 01:46:24'),
(18, 22, 1, 0, 'Belum - Dibayar', 'kosong', 'PSN-969200', '2023-12-27 02:05:07', '2023-12-27 02:05:07'),
(19, 23, 4, 85000, 'Sudah Dibayar', 'Tunai', 'PSN-735614', '2023-12-27 02:17:57', '2023-12-27 02:22:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`id`, `order_id`, `menu_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 20, 1, 20000, '2023-12-26 17:36:35', '2023-12-26 17:36:35'),
(3, 3, 19, 4, 100000, '2023-12-26 17:57:57', '2023-12-26 17:57:57'),
(9, 6, 19, 3, 75000, '2023-12-27 00:46:56', '2023-12-27 00:46:56'),
(10, 6, 24, 2, 30000, '2023-12-27 00:46:56', '2023-12-27 00:46:56'),
(11, 7, 19, 2, 50000, '2023-12-27 01:06:17', '2023-12-27 01:06:17'),
(12, 7, 20, 2, 40000, '2023-12-27 01:06:17', '2023-12-27 01:06:17'),
(13, 7, 24, 1, 15000, '2023-12-27 01:06:17', '2023-12-27 01:06:17'),
(23, 15, 18, 2, 50000, '2023-12-27 01:22:51', '2023-12-27 01:22:51'),
(24, 15, 21, 2, 80000, '2023-12-27 01:22:51', '2023-12-27 01:22:51'),
(25, 15, 26, 2, 20000, '2023-12-27 01:22:51', '2023-12-27 01:22:51'),
(26, 15, 31, 2, 74000, '2023-12-27 01:22:51', '2023-12-27 01:22:51'),
(30, 17, 20, 3, 60000, '2023-12-27 01:46:01', '2023-12-27 01:46:01'),
(31, 17, 21, 4, 160000, '2023-12-27 01:46:01', '2023-12-27 01:46:01'),
(32, 17, 23, 1, 15000, '2023-12-27 01:46:01', '2023-12-27 01:46:01'),
(33, 17, 26, 1, 10000, '2023-12-27 01:46:01', '2023-12-27 01:46:01'),
(34, 18, 19, 1, 25000, '2023-12-27 02:05:07', '2023-12-27 02:05:07'),
(35, 19, 19, 1, 25000, '2023-12-27 02:17:57', '2023-12-27 02:17:57'),
(36, 19, 20, 3, 60000, '2023-12-27 02:17:57', '2023-12-27 02:17:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `alamat`, `kota`, `gender`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mulyadi saputra', 'manager@gmail.com', NULL, '$2y$10$BhvlJrp7kouYpqzEbg3f5OtYnHNOJnNXycQGC8KVPJjN8daBikB5.', 'manager', 'Jl Soekarno', 'Ngawi', 'Laki - Laki', NULL, NULL, '2023-12-26 18:06:22'),
(2, 'Putri amelia', 'kasir@gmail.com', NULL, '$2y$10$Z8.JE6gMyoNP2UGQzjab7uPL5Q0pMPnCTGrM.lQb8prEBkL3vfhNS', 'kasir', 'Jl Ujung berung', 'Manado', 'Perempuan', NULL, NULL, '2023-12-26 18:05:41'),
(3, 'Ari', 'chef@gmail.com', NULL, '$2y$10$7Ps5tEgef46NJ4HXDUZPnu4r.5/YquhmrWCuLOUJrUT4ioMh.OUie', 'manager', 'Jl Surabaya', 'Surabaya', 'Laki - Laki', NULL, NULL, '2023-12-27 02:16:25'),
(4, 'Mariadi puntodewo', 'juna@gmail.com', NULL, '$2y$10$.kabqgHd419c3qppNVW89.mv3rIxqdqe8dpL/.OODkeWw/O4YEuku', 'chef', 'Jl Thamrin', 'Jakarta', 'Laki - Laki', NULL, NULL, '2023-12-26 18:07:09'),
(5, 'Ade Kusnadi', 'saha@gmail.com', NULL, '$2y$10$Ggy.IWyg79rNwROEkXkM8uONuKuVv3stzocGScsH6h.U5fNhKPyV2', 'chef', 'Jl Kenangan', 'Malang', 'Laki - Laki', NULL, NULL, '2023-12-26 18:04:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tbl_carts`
--
ALTER TABLE `tbl_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_carts_customer_id_foreign` (`customer_id`),
  ADD KEY `tbl_carts_menu_id_foreign` (`menu_id`);

--
-- Indeks untuk tabel `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kategoris`
--
ALTER TABLE `tbl_kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_menuses`
--
ALTER TABLE `tbl_menuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_menuses_id_kategori_foreign` (`id_kategori`);

--
-- Indeks untuk tabel `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_orders_customer_id_foreign` (`customer_id`),
  ADD KEY `tbl_orders_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_order_details_menu_id_foreign` (`menu_id`),
  ADD KEY `tbl_order_details_order_id_foreign` (`order_id`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_carts`
--
ALTER TABLE `tbl_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategoris`
--
ALTER TABLE `tbl_kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_menuses`
--
ALTER TABLE `tbl_menuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_carts`
--
ALTER TABLE `tbl_carts`
  ADD CONSTRAINT `tbl_carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_carts_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menuses` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_menuses`
--
ALTER TABLE `tbl_menuses`
  ADD CONSTRAINT `tbl_menuses_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategoris` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `tbl_order_details_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `tbl_orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
