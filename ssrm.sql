-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Nov 05, 2019 at 12:10 PM
-- Server version: 5.7.28
-- PHP Version: 7.2.23

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
-- Table structure for table `igd`
--

CREATE TABLE `igd` (
  `igd_id` char(15) NOT NULL,
  `igd_ctt_perkembangan` varchar(255) NOT NULL,
  `igd_resume` varchar(255) NOT NULL,
  `igd_datetime` datetime NOT NULL,
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `rek_id` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `log_create_at` datetime NOT NULL,
  `log_kategori_id` char(15) NOT NULL
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
(6, '2019_10_27_130246_configure-users-tbl', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nicu`
--

CREATE TABLE `nicu` (
  `nicu_id` char(15) NOT NULL,
  `nicu_ctt_integ` varchar(255) NOT NULL,
  `nicu_resume` varchar(255) NOT NULL,
  `nicu_pengkajian` varchar(255) NOT NULL,
  `nicu_grafik` varchar(255) NOT NULL,
  `nicu_datetime` datetime NOT NULL,
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `rek_id` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `penunjang`
--

CREATE TABLE `penunjang` (
  `penunjang_id` bigint(20) NOT NULL,
  `penunjang_name` varchar(255) NOT NULL,
  `penunjang_file` varchar(255) NOT NULL,
  `penunjang_ctg` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penunjang`
--

INSERT INTO `penunjang` (`penunjang_id`, `penunjang_name`, `penunjang_file`, `penunjang_ctg`) VALUES
(5, 'penunjang 1', 'penunjang file 1', 'IGD'),
(6, 'penunjang 2`', 'penunjang file 2', 'IGD');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `po_id` char(15) NOT NULL,
  `po_ctt_integ` varchar(255) NOT NULL,
  `po_resume` varchar(255) NOT NULL,
  `po_datetime` datetime NOT NULL,
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `rek_id` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rawat_inap`
--

CREATE TABLE `rawat_inap` (
  `raw_id` char(15) NOT NULL,
  `raw_ctt_integ` varchar(255) NOT NULL,
  `raw_ctt_oper` varchar(255) NOT NULL,
  `raw_resume` varchar(255) NOT NULL,
  `raw_bayi` varchar(255) NOT NULL,
  `raw_datetime` datetime NOT NULL,
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `rek_id` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekmed`
--

CREATE TABLE `rekmed` (
  `rek_id` char(6) NOT NULL,
  `rek_name` varchar(255) NOT NULL,
  `u_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekmed`
--

INSERT INTO `rekmed` (`rek_id`, `rek_name`, `u_id`) VALUES
('AETEW1', 'asus', 113),
('MET001', 'tyuio', 113),
('MIT001', 'qwe', 113),
('MIT004', 'qweer', 113),
('MIT007', 'qweer', 113),
('REKID1', 'Iling Abi Wira Guna', 113),
('REKID2', 'Agung Eka Saputra', 113),
('REKIO3', 'yucu', 113),
('REKIQ1', 'sedap', 113),
('REKWQ1', 'yuzu', 113),
('TER001', 'tea', 113),
('TIM001', 'qwe', 113);

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
(3, 'Agung Saputra', 'agung@ssrm.com', NULL, '$2y$10$2AennWrtV5MLIr0pekY0Je753b5NiNAv9sMuKKi1GHoQhl8nlQh4q', '9LQhpAMA9PqYejXQDkO6mvFQFZCnwocbyVF0CtZ5P7yb1Ta2otWGfKI4WFOv', '2019-10-29 06:01:10', '2019-10-30 14:54:45', 'agungsptr', 'SUPERVISOR'),
(7, 'Gilang Restu Alam', 'gilang@gmail.com', NULL, '$2y$10$L.H.rBVXPJlMW9kPBuBJ9ONGY6XGYJfuKkdD6kf7/cudCykWga6rK', 'Frr8ODUEiC4UVB4vliIeIXrchEiRm2g6grwB2MA3eW4WETkZvbIBnrH25u6l', '2019-10-30 15:40:00', '2019-10-30 15:42:52', 'gilang', 'DOKTER'),
(8, 'Farasut Widodo Malik', 'dodo@gmail.com', NULL, '$2y$10$3KBt.ZnlnUeJ5r03/6gHpu3MF08leEtMKQkU8n5pE2lc2cDhCHZGu', NULL, '2019-10-30 15:40:30', '2019-10-30 15:43:11', 'dodo', 'DOKTER'),
(9, 'L Yuda Rahmani Karnaen', 'yuda@ssrm.com', NULL, '$2y$10$BTVOjh9yaiwMAxIctoXhwO643s8ettMQVN/2FXamHiuqBA9.9iqDa', 'e36geDWfjTWfIZXwsZN26Wyyv0mrHyobowhbIgomME9hNxpfBprQVBptySWt', '2019-10-30 15:40:52', '2019-10-30 15:43:28', 'yuda', 'SUPERVISOR'),
(112, 'user99', 'usradm99@ssrm.com', NULL, '$2y$10$GJWKnuyehORlGnbo9ZI87OwQNV3jZ..6xBKA0TsUokzCgKN0Bfi4S', NULL, '2019-10-31 07:55:25', '2019-10-31 07:55:25', 'usradm99', 'ADMIN'),
(113, 'user100', 'usradm100@ssrm.com', NULL, '$2y$10$lAoy5FZNZestJMwNZURLtu64/BDQN53HnmKFmD2Nz.qxEmm/udmDu', '49brLGLIMGxwbSkHq9t7FnCp2bwUxL4NGZJCCinrCBt8ADg5K2PA7cGAWBXz', '2019-10-31 07:55:25', '2019-10-31 07:55:25', 'usradm100', 'ADMIN'),
(114, 'user0', 'usradm0@ssrm.com', NULL, '$2y$10$OqQgjYXqstE/jSOjBd5Aq./BJEYt5vUYg1Y27qQy6ssw6K9trYvi6', NULL, '2019-11-03 10:06:57', '2019-11-03 10:06:57', 'seed0', 'ADMIN'),
(115, 'user1', 'usradm1@ssrm.com', NULL, '$2y$10$x/eGr4WpC4K0OpBFpfOS5.Ejd9hw96aZv.NAARwLUGCTt9HQCmZG6', NULL, '2019-11-03 10:06:58', '2019-11-03 10:06:58', 'seed1', 'ADMIN'),
(116, 'user2', 'usradm2@ssrm.com', NULL, '$2y$10$HQFqgmnGOet1Xj8h2NJVeuNS2CFkXKGFWlET/DK1wFFkpUIp5TGuy', NULL, '2019-11-03 10:06:58', '2019-11-03 10:06:58', 'seed2', 'ADMIN'),
(117, 'user3', 'usradm3@ssrm.com', NULL, '$2y$10$xgakaqYdZ6GpA2HlZ9VLsO5NiA/.O0s1dm/BdBzh358HfRUkmdN2i', NULL, '2019-11-03 10:06:58', '2019-11-03 10:06:58', 'seed3', 'ADMIN'),
(118, 'user4', 'usradm4@ssrm.com', NULL, '$2y$10$8RzrYBfIw8xzSoTgeyX99ulkjsWl6Ebsnq.XWvBG9S1oNcTukLrnu', NULL, '2019-11-03 10:06:58', '2019-11-03 10:06:58', 'seed4', 'ADMIN'),
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
(133, 'user19', 'usradm19@ssrm.com', NULL, '$2y$10$N7AwXXRMHR38/gnwjf.5Z.bAmQIZTIGVNKbwOIfl8q6swFaE62lgS', NULL, '2019-11-03 10:06:59', '2019-11-03 10:06:59', 'seed19', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `igd`
--
ALTER TABLE `igd`
  ADD PRIMARY KEY (`igd_id`),
  ADD KEY `rek_id` (`rek_id`),
  ADD KEY `u_id` (`u_id`) USING BTREE;

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penunjang`
--
ALTER TABLE `penunjang`
  ADD PRIMARY KEY (`penunjang_id`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`po_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `rek_id` (`rek_id`);

--
-- Indexes for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD PRIMARY KEY (`raw_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `rek_id` (`rek_id`);

--
-- Indexes for table `rekmed`
--
ALTER TABLE `rekmed`
  ADD PRIMARY KEY (`rek_id`),
  ADD KEY `users_id` (`u_id`);

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
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penunjang`
--
ALTER TABLE `penunjang`
  MODIFY `penunjang_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `igd`
--
ALTER TABLE `igd`
  ADD CONSTRAINT `igd_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `igd_ibfk_2` FOREIGN KEY (`rek_id`) REFERENCES `rekmed` (`rek_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nicu`
--
ALTER TABLE `nicu`
  ADD CONSTRAINT `nicu_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nicu_ibfk_2` FOREIGN KEY (`rek_id`) REFERENCES `rekmed` (`rek_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poli`
--
ALTER TABLE `poli`
  ADD CONSTRAINT `poli_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `poli_ibfk_2` FOREIGN KEY (`rek_id`) REFERENCES `rekmed` (`rek_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD CONSTRAINT `rawat_inap_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawat_inap_ibfk_2` FOREIGN KEY (`rek_id`) REFERENCES `rekmed` (`rek_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekmed`
--
ALTER TABLE `rekmed`
  ADD CONSTRAINT `rekmed_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;