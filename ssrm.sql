-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2019 at 09:34 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_tahunan`
--

CREATE TABLE `arsip_tahunan` (
  `arsip_id` bigint(20) UNSIGNED NOT NULL,
  `arsip_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arsip_datetime` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `u_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rek_id` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `igd`
--

CREATE TABLE `igd` (
  `igd_id` bigint(20) UNSIGNED NOT NULL,
  `igd_ctt_perkembangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `igd_resume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `igd_datetime` timestamp NULL DEFAULT NULL,
  `igd_file_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `u_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rek_id` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `igd`
--

INSERT INTO `igd` (`igd_id`, `igd_ctt_perkembangan`, `igd_resume`, `igd_datetime`, `igd_file_lengkap`, `created_at`, `updated_at`, `u_id`, `rek_id`) VALUES
(31, 'Rekmed/PH0A03/IGD/31/Catatan_Perkembangan/31_igd_cp.pdf', NULL, '2019-12-13 12:02:00', NULL, '2019-12-13 20:22:34', '2019-12-13 20:22:35', 113, 'PH0A03');

--
-- Triggers `igd`
--
DELIMITER $$
CREATE TRIGGER `insert_igd` AFTER INSERT ON `igd` FOR EACH ROW BEGIN
    INSERT INTO log
    set log_user = new.u_id,
    log_do = 'Upload IGD',
    rek_id = new.rek_id,
    ctg = 'igd',
    id_ctg = new.igd_id,
    created_at = NOW(),
    updated_at = NOW(); 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `igd_penunjang`
--

CREATE TABLE `igd_penunjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_file` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `igd_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` bigint(20) UNSIGNED NOT NULL,
  `log_user` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_do` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rek_id` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ctg` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_ctg` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_user`, `log_do`, `rek_id`, `ctg`, `id_ctg`, `created_at`, `updated_at`) VALUES
(24, '113', 'Upload IGD', 'PH0A03', 'igd', 31, '2019-12-13 20:22:34', '2019-12-13 20:22:34'),
(25, '113', 'Upload POLI', 'PH0A03', 'poli', 6, '2019-12-13 20:23:10', '2019-12-13 20:23:10'),
(26, '113', 'Upload NICU', 'PH0A03', 'nicu', 3, '2019-12-13 20:23:29', '2019-12-13 20:23:29');

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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_10_27_130246_configure-users-tbl', 2),
(7, '2019_11_05_133712_add_timestamp', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nicu`
--

CREATE TABLE `nicu` (
  `nicu_id` bigint(20) UNSIGNED NOT NULL,
  `nicu_ctt_integ` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nicu_resume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nicu_pengkajian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nicu_grafik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nicu_datetime` timestamp NULL DEFAULT NULL,
  `nicu_file_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `u_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rek_id` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nicu`
--

INSERT INTO `nicu` (`nicu_id`, `nicu_ctt_integ`, `nicu_resume`, `nicu_pengkajian`, `nicu_grafik`, `nicu_datetime`, `nicu_file_lengkap`, `created_at`, `updated_at`, `u_id`, `rek_id`) VALUES
(3, 'Rekmed/PH0A03/NICU/3/Catatan_Perkembangan_Terintegrasi/3_nicu_cpt.pdf', NULL, NULL, NULL, '2019-12-13 12:02:00', NULL, '2019-12-13 20:23:29', '2019-12-13 20:23:29', 113, 'PH0A03');

--
-- Triggers `nicu`
--
DELIMITER $$
CREATE TRIGGER `insert_nicu` AFTER INSERT ON `nicu` FOR EACH ROW BEGIN
    INSERT INTO log
    set log_user = new.u_id,
    log_do = 'Upload NICU',
    rek_id = new.rek_id,
    ctg = 'nicu',
    id_ctg = new.nicu_id,
    created_at = NOW(),
    updated_at = NOW(); 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `nicu_penunjang`
--

CREATE TABLE `nicu_penunjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nicu_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `poli_id` bigint(20) UNSIGNED NOT NULL,
  `poli_ctt_integ` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poli_resume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poli_datetime` timestamp NULL DEFAULT NULL,
  `poli_file_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `u_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rek_id` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`poli_id`, `poli_ctt_integ`, `poli_resume`, `poli_datetime`, `poli_file_lengkap`, `created_at`, `updated_at`, `u_id`, `rek_id`) VALUES
(6, 'Rekmed/PH0A03/POLI/6/Catatan_Terintegrasi/6_poli_ct.pdf', NULL, '2019-12-13 11:01:00', NULL, '2019-12-13 20:23:10', '2019-12-13 20:23:11', 113, 'PH0A03');

--
-- Triggers `poli`
--
DELIMITER $$
CREATE TRIGGER `insert_poli` AFTER INSERT ON `poli` FOR EACH ROW BEGIN
    INSERT INTO log
    set log_user = new.u_id,
    log_do = 'Upload POLI',
    rek_id = new.rek_id,
    ctg = 'poli',
    id_ctg = new.poli_id,
    created_at = NOW(),
    updated_at = NOW(); 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `poli_penunjang`
--

CREATE TABLE `poli_penunjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `poli_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rekmed`
--

CREATE TABLE `rekmed` (
  `rek_id` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rek_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rek_nik` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rek_tempat_lahir` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rek_tanggal_lahir` date DEFAULT NULL,
  `rek_darah` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rek_agama` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rek_job` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rek_hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rek_alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rek_status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_job` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_darah` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_ibu_hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_bpk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_bpk_hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `u_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekmed`
--

INSERT INTO `rekmed` (`rek_id`, `rek_name`, `rek_nik`, `rek_tempat_lahir`, `rek_tanggal_lahir`, `rek_darah`, `rek_agama`, `rek_job`, `rek_hp`, `rek_alamat`, `rek_status`, `s_name`, `s_job`, `s_darah`, `s_hp`, `s_alamat`, `p_ibu`, `p_ibu_hp`, `p_bpk`, `p_bpk_hp`, `created_at`, `updated_at`, `u_id`) VALUES
('PH0A01', 'Kartarina', '1234567890', 'Mataram', '2019-12-13', 'O', 'Islam', 'Dosen', '1234567890', 'Mataram', 'ibu', 'Kartaroni', 'Dosen', 'O', '1234567890', 'Mataram', NULL, NULL, NULL, NULL, '2019-12-13 19:22:30', '2019-12-13 19:23:22', 3),
('PH0A02', 'Anissa', '1111111111111111', 'matar', '2019-12-13', 'A', 'Islam', 'dosen', '1234567890', 'mtr', 'ibu', 'jon', '1234567890', 'O', '1234567890', 'mtr', NULL, NULL, NULL, NULL, '2019-12-13 20:15:23', '2019-12-13 20:15:23', 113),
('PH0A03', 'qwe', NULL, 'qwe', '2019-12-13', 'Pilih', 'qw', NULL, NULL, 'qw', 'anak', NULL, NULL, NULL, NULL, NULL, 'qw', 'qw', 'qw', 'qw', '2019-12-13 20:18:51', '2019-12-13 20:18:51', 113);

-- --------------------------------------------------------

--
-- Table structure for table `rekmed_anak`
--

CREATE TABLE `rekmed_anak` (
  `ra_id` bigint(20) UNSIGNED NOT NULL,
  `ra_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ra_tempat_lahir` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ra_tanggal_lahir` date DEFAULT NULL,
  `ra_darah` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ra_anak_ke` int(2) NOT NULL,
  `rek_id` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekmed_anak`
--

INSERT INTO `rekmed_anak` (`ra_id`, `ra_name`, `ra_tempat_lahir`, `ra_tanggal_lahir`, `ra_darah`, `ra_anak_ke`, `rek_id`, `created_at`, `updated_at`) VALUES
(33, 'qwert', 'qw', NULL, NULL, 1, 'PH0A01', '2019-12-13 19:45:54', '2019-12-13 19:45:54'),
(34, 'yu', 'aj', '2019-12-13', NULL, 5, 'PH0A02', '2019-12-13 20:15:41', '2019-12-13 20:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `ri`
--

CREATE TABLE `ri` (
  `ri_id` bigint(20) UNSIGNED NOT NULL,
  `ri_ctt_integ` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ri_ctt_oper` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ri_resume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ri_bayi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ri_datetime` timestamp NULL DEFAULT NULL,
  `ri_file_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `u_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rek_id` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `ri`
--
DELIMITER $$
CREATE TRIGGER `insert_ri` AFTER INSERT ON `ri` FOR EACH ROW BEGIN
    INSERT INTO log
    set log_user = new.u_id,
    log_do = 'Upload Rawat Inap',
    rek_id = new.rek_id,
    ctg = 'ri',
    id_ctg = new.ri_id,
    created_at = NOW(),
    updated_at = NOW(); 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ri_penunjang`
--

CREATE TABLE `ri_penunjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ri_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `role`) VALUES
(3, 'Agung Saputra', 'agung@ssrm.com', NULL, '$2y$10$2AennWrtV5MLIr0pekY0Je753b5NiNAv9sMuKKi1GHoQhl8nlQh4q', 'iFq71RHxlrq8wwenMeAQmFAtghqEcuCCs9qctO7AIyymkyr6yEOXTLfCyqlk', '2019-10-29 06:01:10', '2019-10-30 14:54:45', 'agungsptr', 'SUPERVISOR'),
(7, 'Gilang Restu Alam', 'gilang@gmail.com', NULL, '$2y$10$L.H.rBVXPJlMW9kPBuBJ9ONGY6XGYJfuKkdD6kf7/cudCykWga6rK', '7lg1DsThep4kysVunqOTh68LGIzKv2KPzqqHfsHUkKapyT9YdcYRTzjBB2AI', '2019-10-30 15:40:00', '2019-10-30 15:42:52', 'gilang', 'DOKTER'),
(8, 'Farasut Widodo Malik', 'dodo@gmail.com', NULL, '$2y$10$3KBt.ZnlnUeJ5r03/6gHpu3MF08leEtMKQkU8n5pE2lc2cDhCHZGu', NULL, '2019-10-30 15:40:30', '2019-10-30 15:43:11', 'dodo', 'DOKTER'),
(9, 'L Yuda Rahmani Karnaen', 'yuda@ssrm.com', NULL, '$2y$10$Q53oo6JJgqxFMCIOIDtlretGrfgG9RBxWACYmW5Tcy1mxF6prZUAG', 'e36geDWfjTWfIZXwsZN26Wyyv0mrHyobowhbIgomME9hNxpfBprQVBptySWt', '2019-10-30 15:40:52', '2019-12-13 16:17:25', 'yudak', 'SUPERVISOR'),
(113, 'admin', 'admin@ssrm.com', NULL, '$2y$10$tgK8lco3UvKx5EekFwotuuvJO5jM6PGJ9529jc9ecYWSV3o/yu/Fi', 'sbPpUSReaV3xN50v3LcfjMXpbbbdYub9h9BCbMNuOfHFwgOM5miEnWzJZ0dJ', '2019-10-31 07:55:25', '2019-12-13 16:19:47', 'admin', 'ADMIN'),
(136, 'Arifu', 'arip@m.com', NULL, '$2y$10$scjSm5zs24kteZF6p.p5DOzN0yUoKau6OKfF2rRTakMfmJbqBaxKq', NULL, '2019-12-13 20:12:59', '2019-12-13 20:12:59', 'aripu', 'SUPERVISOR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip_tahunan`
--
ALTER TABLE `arsip_tahunan`
  ADD PRIMARY KEY (`arsip_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `rek_id` (`rek_id`);

--
-- Indexes for table `igd`
--
ALTER TABLE `igd`
  ADD PRIMARY KEY (`igd_id`),
  ADD KEY `rek_id` (`rek_id`),
  ADD KEY `u_id` (`u_id`) USING BTREE;

--
-- Indexes for table `igd_penunjang`
--
ALTER TABLE `igd_penunjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `igd_id` (`igd_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nicu`
--
ALTER TABLE `nicu`
  ADD PRIMARY KEY (`nicu_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `rek_id` (`rek_id`);

--
-- Indexes for table `nicu_penunjang`
--
ALTER TABLE `nicu_penunjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nicu_id` (`nicu_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`poli_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `rek_id` (`rek_id`);

--
-- Indexes for table `poli_penunjang`
--
ALTER TABLE `poli_penunjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poli_id` (`poli_id`);

--
-- Indexes for table `rekmed`
--
ALTER TABLE `rekmed`
  ADD PRIMARY KEY (`rek_id`),
  ADD UNIQUE KEY `rek_nik` (`rek_nik`),
  ADD KEY `users_id` (`u_id`);

--
-- Indexes for table `rekmed_anak`
--
ALTER TABLE `rekmed_anak`
  ADD PRIMARY KEY (`ra_id`),
  ADD KEY `rek_id` (`rek_id`) USING BTREE;

--
-- Indexes for table `ri`
--
ALTER TABLE `ri`
  ADD PRIMARY KEY (`ri_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `rek_id` (`rek_id`);

--
-- Indexes for table `ri_penunjang`
--
ALTER TABLE `ri_penunjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ri_id` (`ri_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip_tahunan`
--
ALTER TABLE `arsip_tahunan`
  MODIFY `arsip_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `igd`
--
ALTER TABLE `igd`
  MODIFY `igd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `igd_penunjang`
--
ALTER TABLE `igd_penunjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nicu`
--
ALTER TABLE `nicu`
  MODIFY `nicu_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nicu_penunjang`
--
ALTER TABLE `nicu_penunjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `poli_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `poli_penunjang`
--
ALTER TABLE `poli_penunjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekmed_anak`
--
ALTER TABLE `rekmed_anak`
  MODIFY `ra_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ri`
--
ALTER TABLE `ri`
  MODIFY `ri_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ri_penunjang`
--
ALTER TABLE `ri_penunjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arsip_tahunan`
--
ALTER TABLE `arsip_tahunan`
  ADD CONSTRAINT `arsip_tahunan_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `arsip_tahunan_ibfk_2` FOREIGN KEY (`rek_id`) REFERENCES `rekmed` (`rek_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `igd`
--
ALTER TABLE `igd`
  ADD CONSTRAINT `igd_ibfk_2` FOREIGN KEY (`rek_id`) REFERENCES `rekmed` (`rek_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `igd_ibfk_3` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `igd_penunjang`
--
ALTER TABLE `igd_penunjang`
  ADD CONSTRAINT `igd_penunjang_ibfk_1` FOREIGN KEY (`igd_id`) REFERENCES `igd` (`igd_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nicu`
--
ALTER TABLE `nicu`
  ADD CONSTRAINT `nicu_ibfk_2` FOREIGN KEY (`rek_id`) REFERENCES `rekmed` (`rek_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nicu_ibfk_3` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `nicu_penunjang`
--
ALTER TABLE `nicu_penunjang`
  ADD CONSTRAINT `nicu_penunjang_ibfk_1` FOREIGN KEY (`nicu_id`) REFERENCES `nicu` (`nicu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poli`
--
ALTER TABLE `poli`
  ADD CONSTRAINT `poli_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `poli_ibfk_2` FOREIGN KEY (`rek_id`) REFERENCES `rekmed` (`rek_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poli_penunjang`
--
ALTER TABLE `poli_penunjang`
  ADD CONSTRAINT `poli_penunjang_ibfk_1` FOREIGN KEY (`poli_id`) REFERENCES `poli` (`poli_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekmed`
--
ALTER TABLE `rekmed`
  ADD CONSTRAINT `rekmed_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `rekmed_anak`
--
ALTER TABLE `rekmed_anak`
  ADD CONSTRAINT `rekmed_anak_ibfk_1` FOREIGN KEY (`rek_id`) REFERENCES `rekmed` (`rek_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ri`
--
ALTER TABLE `ri`
  ADD CONSTRAINT `ri_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `ri_ibfk_2` FOREIGN KEY (`rek_id`) REFERENCES `rekmed` (`rek_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ri_penunjang`
--
ALTER TABLE `ri_penunjang`
  ADD CONSTRAINT `ri_penunjang_ibfk_1` FOREIGN KEY (`ri_id`) REFERENCES `ri` (`ri_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
