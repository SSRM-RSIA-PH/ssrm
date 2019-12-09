-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2019 at 11:50 PM
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `u_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rek_id` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `u_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rek_id` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `u_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rek_id` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 'Agung Saputra', 'agung@ssrm.com', NULL, '$2y$10$2AennWrtV5MLIr0pekY0Je753b5NiNAv9sMuKKi1GHoQhl8nlQh4q', 'MWd5tCF2IJBB8Ntrm7AvfJrMZWqMv7rm5aJEiIqWbfwhUDWdDfSeQhWUxcZq', '2019-10-29 06:01:10', '2019-10-30 14:54:45', 'agungsptr', 'SUPERVISOR'),
(7, 'Gilang Restu Alam', 'gilang@gmail.com', NULL, '$2y$10$L.H.rBVXPJlMW9kPBuBJ9ONGY6XGYJfuKkdD6kf7/cudCykWga6rK', '9wkjaes5NPgd9EtPMmh5jFexCpyzryTNB0V6EnVaMLGJXhOJRz8LQ7kS9sQP', '2019-10-30 15:40:00', '2019-10-30 15:42:52', 'gilang', 'DOKTER'),
(8, 'Farasut Widodo Malik', 'dodo@gmail.com', NULL, '$2y$10$3KBt.ZnlnUeJ5r03/6gHpu3MF08leEtMKQkU8n5pE2lc2cDhCHZGu', NULL, '2019-10-30 15:40:30', '2019-10-30 15:43:11', 'dodo', 'DOKTER'),
(9, 'L Yuda Rahmani Karnaen', 'yuda@ssrm.com', NULL, '$2y$10$BTVOjh9yaiwMAxIctoXhwO643s8ettMQVN/2FXamHiuqBA9.9iqDa', 'e36geDWfjTWfIZXwsZN26Wyyv0mrHyobowhbIgomME9hNxpfBprQVBptySWt', '2019-10-30 15:40:52', '2019-10-30 15:43:28', 'yuda', 'SUPERVISOR'),
(113, 'user100', 'usradm100@ssrm.com', NULL, '$2y$10$lAoy5FZNZestJMwNZURLtu64/BDQN53HnmKFmD2Nz.qxEmm/udmDu', 'qkCDB7oUQeWfc3zSIEcIzqgHfFQuDqhuoMO0W47ob1pgytiNyODyCCb7H5cG', '2019-10-31 07:55:25', '2019-10-31 07:55:25', 'usradm100', 'ADMIN'),
(114, 'user0', 'usradm0@ssrm.com', NULL, '$2y$10$OqQgjYXqstE/jSOjBd5Aq./BJEYt5vUYg1Y27qQy6ssw6K9trYvi6', NULL, '2019-11-03 10:06:57', '2019-11-03 10:06:57', 'seed0', 'ADMIN'),
(115, 'user1', 'usradm1@ssrm.com', NULL, '$2y$10$x/eGr4WpC4K0OpBFpfOS5.Ejd9hw96aZv.NAARwLUGCTt9HQCmZG6', NULL, '2019-11-03 10:06:58', '2019-11-03 10:06:58', 'seed1', 'ADMIN'),
(116, 'user2', 'usradm2@ssrm.com', NULL, '$2y$10$HQFqgmnGOet1Xj8h2NJVeuNS2CFkXKGFWlET/DK1wFFkpUIp5TGuy', NULL, '2019-11-03 10:06:58', '2019-11-03 10:06:58', 'seed2', 'ADMIN'),
(119, 'user5', 'usradm5@ssrm.com', NULL, '$2y$10$nhgrrLYqWMSoneDMK35Die8fujEDJRnwu/ZP685axjQIAxeUEt7ty', NULL, '2019-11-03 10:06:58', '2019-11-03 10:06:58', 'seed5', 'ADMIN'),
(120, 'user6', 'usradm6@ssrm.com', NULL, '$2y$10$H.d91mu3Ol4ghL0vS7aS8e2RAuFpF.3gAFKCjE.rKFvacrAWhiBLK', NULL, '2019-11-03 10:06:58', '2019-11-03 10:06:58', 'seed6', 'ADMIN'),
(121, 'user7', 'usradm7@ssrm.com', NULL, '$2y$10$tJUtQnCxEJwklTJredrdKO5rBmmHIppBWM4pqQSMrbuJ/eD82dcnm', NULL, '2019-11-03 10:06:58', '2019-11-03 10:06:58', 'seed7', 'ADMIN'),
(122, 'user8', 'usradm8@ssrm.com', NULL, '$2y$10$Ezvz4MjV5OPhmry497eXHOixtfpr21O7V3Khz3Sa6Qo8vWejidz36', NULL, '2019-11-03 10:06:58', '2019-11-03 10:06:58', 'seed8', 'ADMIN'),
(123, 'user9', 'usradm9@ssrm.com', NULL, '$2y$10$bIRXL36Iy8NT9tDVmWibsOWcrJwkosgOWZUdnRp0TNQ4N30c1UvzG', NULL, '2019-11-03 10:06:58', '2019-11-03 10:06:58', 'seed9', 'ADMIN'),
(124, 'user10', 'usradm10@ssrm.com', NULL, '$2y$10$OU4wjXmiQ0wLkPAVvkfUXeOWy1nKL3OAQ5N8QUWeEpl1Qinot4jCa', NULL, '2019-11-03 10:06:59', '2019-11-03 10:06:59', 'seed10', 'ADMIN'),
(125, 'user11', 'usradm11@ssrm.com', NULL, '$2y$10$ivNId58jhYlEtRGushXYp.HtnCwyRoFD.yQPetfdMxjU499g15W/S', NULL, '2019-11-03 10:06:59', '2019-11-03 10:06:59', 'seed11', 'ADMIN'),
(126, 'user12', 'usradm12@ssrm.com', NULL, '$2y$10$hqHoaUDvbGOPuKYox7ucxul/Tw.TcQbGu0Pk6h9pd6PQhk2Gd1Wdi', NULL, '2019-11-03 10:06:59', '2019-11-03 10:06:59', 'seed12', 'ADMIN'),
(127, 'user13', 'usradm13@ssrm.com', NULL, '$2y$10$DkV664d/Un57MUtKsLtuhuEs9RTmrTMfV2SbPh1tALjU7WAxa2O26', NULL, '2019-11-03 10:06:59', '2019-11-03 10:06:59', 'seed13', 'ADMIN'),
(128, 'user14', 'usradm14@ssrm.com', NULL, '$2y$10$L8hVP9W/Es/ozPuL5xr7uOQHNtaO3WtQf3fwlzt35HbaFn2G1RgIu', NULL, '2019-11-03 10:06:59', '2019-11-03 10:06:59', 'seed14', 'ADMIN'),
(129, 'user15', 'usradm15@ssrm.com', NULL, '$2y$10$zCqlMO7nyMzMvSh99WYvreTOp43qz07qAKJz4FWtL/bim2szizfKC', NULL, '2019-11-03 10:06:59', '2019-11-03 10:06:59', 'seed15', 'ADMIN'),
(130, 'user16', 'usradm16@ssrm.com', NULL, '$2y$10$qpyRtUujK90qjZL7iT31m.1b4vl49/wDGeUVx8ee1EDlwMnAMl0.q', NULL, '2019-11-03 10:06:59', '2019-11-03 10:06:59', 'seed16', 'ADMIN'),
(131, 'user17', 'usradm17@ssrm.com', NULL, '$2y$10$b748GQ7aOGeknABLPae3GuR1y1J48ktjIOfDUSsYqcdL2ztcnB6vC', NULL, '2019-11-03 10:06:59', '2019-11-03 10:06:59', 'seed17', 'ADMIN'),
(132, 'user18', 'usradm18@ssrm.com', NULL, '$2y$10$/AdHtowOzPpeO7Vwzb1dS.TpbCYjXw/e2zLyjOfHuktErXEjzEdu6', NULL, '2019-11-03 10:06:59', '2019-11-03 10:06:59', 'seed18', 'ADMIN'),
(133, 'user19', 'usradm19@ssrm.com', NULL, '$2y$10$N7AwXXRMHR38/gnwjf.5Z.bAmQIZTIGVNKbwOIfl8q6swFaE62lgS', NULL, '2019-11-03 10:06:59', '2019-11-03 10:06:59', 'seed19', 'ADMIN'),
(135, 'admin', 'admin@m.com', NULL, '$2y$10$/qiay8FasxshFpE09FF9YOH.cnGILwGDHSysclWGPAj.P/cKW6iqy', NULL, '2019-12-06 14:16:30', '2019-12-06 14:16:30', 'admin', 'ADMIN');

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
  MODIFY `arsip_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `igd`
--
ALTER TABLE `igd`
  MODIFY `igd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `igd_penunjang`
--
ALTER TABLE `igd_penunjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nicu`
--
ALTER TABLE `nicu`
  MODIFY `nicu_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nicu_penunjang`
--
ALTER TABLE `nicu_penunjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `poli_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `poli_penunjang`
--
ALTER TABLE `poli_penunjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekmed_anak`
--
ALTER TABLE `rekmed_anak`
  MODIFY `ra_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ri`
--
ALTER TABLE `ri`
  MODIFY `ri_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ri_penunjang`
--
ALTER TABLE `ri_penunjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

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
