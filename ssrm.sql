-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Nov 02, 2019 at 12:58 PM
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
  `p_igd_id` char(15) NOT NULL,
  `p_nicu_id` char(15) NOT NULL,
  `p_poli_id` char(15) NOT NULL,
  `p_ri_id` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `users_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 'Agung Saputra', 'agung@ssrm.com', NULL, '$2y$10$2AennWrtV5MLIr0pekY0Je753b5NiNAv9sMuKKi1GHoQhl8nlQh4q', 'bbnVuIJVigUNbgQwWjySI0TTHdzwqtxbcYrKhPfClYDDKy6HzecPny9d1hF5', '2019-10-29 06:01:10', '2019-10-30 14:54:45', 'agungsptr', 'SUPERVISOR'),
(7, 'Gilang Restu Alam', 'gilang@gmail.com', NULL, '$2y$10$L.H.rBVXPJlMW9kPBuBJ9ONGY6XGYJfuKkdD6kf7/cudCykWga6rK', '78PlP1CHDbmHYqu6BzivdKACGG2A6hG4FwkfltVU8ssLSBpHSNl6S7AWPqT9', '2019-10-30 15:40:00', '2019-10-30 15:42:52', 'gilang', 'DOKTER'),
(8, 'Farasut Widodo Malik', 'dodo@gmail.com', NULL, '$2y$10$3KBt.ZnlnUeJ5r03/6gHpu3MF08leEtMKQkU8n5pE2lc2cDhCHZGu', NULL, '2019-10-30 15:40:30', '2019-10-30 15:43:11', 'dodo', 'DOKTER'),
(9, 'L Yuda Rahmani Karnaen', 'yuda@ssrm.com', NULL, '$2y$10$BTVOjh9yaiwMAxIctoXhwO643s8ettMQVN/2FXamHiuqBA9.9iqDa', 'e36geDWfjTWfIZXwsZN26Wyyv0mrHyobowhbIgomME9hNxpfBprQVBptySWt', '2019-10-30 15:40:52', '2019-10-30 15:43:28', 'yuda', 'SUPERVISOR'),
(10, 'user*', 'usr@ssrm.com', NULL, '$2y$10$cueUZph44IXj4snZo9US0ecuhfdRhmevoKhNmfvaZ9PKSdWa9zY.y', NULL, '2019-10-30 16:56:55', '2019-10-30 16:56:55', 'usr*', 'DOKTER'),
(12, 'user0', 'usr0@ssrm.com', NULL, '$2y$10$/MSBbb3XS5pwdJRRCJm43eKknqMcjrZ6sf1Dz4g0LzLQ.8fcwnX4i', NULL, '2019-10-30 17:00:46', '2019-10-30 17:00:46', 'usr0', 'DOKTER'),
(13, 'user1', 'usr1@ssrm.com', NULL, '$2y$10$nQnI3VLXd.L5JemZHaJz4e2OwCT3qAYIUuP1v4o335zX2ViASOEDe', NULL, '2019-10-30 17:00:46', '2019-10-30 17:00:46', 'usr1', 'DOKTER'),
(14, 'user2', 'usr2@ssrm.com', NULL, '$2y$10$/TRSy4VwPD0maxmXtQMYbeNLI.bPcyLr9RFJpk7LKvERxcCxLDCvi', NULL, '2019-10-30 17:00:46', '2019-10-30 17:00:46', 'usr2', 'DOKTER'),
(15, 'user3', 'usr3@ssrm.com', NULL, '$2y$10$n/nPxKjDzjOXKbJQoH3fXOV4nvmf.IN2xnACX4J9Kj2wlYNDK3j8u', NULL, '2019-10-30 17:00:47', '2019-10-30 17:00:47', 'usr3', 'DOKTER'),
(16, 'user4', 'usr4@ssrm.com', NULL, '$2y$10$jh2/B/1sDq5N5ZMeL91oN.nIh0wRS/3zobsbEGN53a69.iCwIiZr6', NULL, '2019-10-30 17:00:47', '2019-10-30 17:00:47', 'usr4', 'DOKTER'),
(17, 'user5', 'usr5@ssrm.com', NULL, '$2y$10$hloQEII9aMvmyzqfkBB1dOFvsFSFpicCFq3kXvX9a2F757oGoqq46', NULL, '2019-10-30 17:00:47', '2019-10-30 17:00:47', 'usr5', 'DOKTER'),
(18, 'user6', 'usr6@ssrm.com', NULL, '$2y$10$Sabu0Bg5fv2E3eJNbNzNdO1Fh/Ql3yrdyRcWIrtwNBmp1zYI4fx9W', NULL, '2019-10-30 17:00:47', '2019-10-30 17:00:47', 'usr6', 'DOKTER'),
(19, 'user7', 'usr7@ssrm.com', NULL, '$2y$10$5zlLKvIEBxVx7va/CJUy6OYWlCjxlC78ZjJcGtH9f6v46ZuwIkZEC', NULL, '2019-10-30 17:00:47', '2019-10-30 17:00:47', 'usr7', 'DOKTER'),
(20, 'user8', 'usr8@ssrm.com', NULL, '$2y$10$RPPAd5sttV4WqdsYq7EOOekqUyy5bawzKcwi8D.aEy5zVBd7gwHNS', NULL, '2019-10-30 17:00:47', '2019-10-30 17:00:47', 'usr8', 'DOKTER'),
(21, 'user9', 'usr9@ssrm.com', NULL, '$2y$10$whUIj/ZteunmmnoKiotEROtKeU7jFacn34LpuTdoskf17kaWCCeuu', NULL, '2019-10-30 17:00:48', '2019-10-30 17:00:48', 'usr9', 'DOKTER'),
(22, 'user10', 'usr10@ssrm.com', NULL, '$2y$10$.Q2VUT7aQsh0uEqie/esKeQSFCaFs1NkMid03bfCMRfeudwaeN4U.', NULL, '2019-10-30 17:00:48', '2019-10-30 17:00:48', 'usr10', 'DOKTER'),
(23, 'user11', 'usr11@ssrm.com', NULL, '$2y$10$QHDxeRCfrU5JdH66P0RdAun9jGPrvLazuhtCkjZ7iXxz1plaRmyTe', NULL, '2019-10-30 17:00:48', '2019-10-30 17:00:48', 'usr11', 'DOKTER'),
(24, 'user12', 'usr12@ssrm.com', NULL, '$2y$10$txknuXZBitoaP7Ogwyy.NebQpR3OK/e.xERQVSsD7Khi5hOWeHi72', NULL, '2019-10-30 17:00:48', '2019-10-30 17:00:48', 'usr12', 'DOKTER'),
(25, 'user13', 'usr13@ssrm.com', NULL, '$2y$10$9YjmaaxCoIASM7W570PiEuhou124.9MOaYdia9KNF54p4b1Xz8tPy', NULL, '2019-10-30 17:00:48', '2019-10-30 17:00:48', 'usr13', 'DOKTER'),
(26, 'user14', 'usr14@ssrm.com', NULL, '$2y$10$eFcSvdK9aO8FrclhoqTSG.YYp8CH./OmKBizaAfW17PGzfu5MMyuC', NULL, '2019-10-30 17:00:48', '2019-10-30 17:00:48', 'usr14', 'DOKTER'),
(27, 'user15', 'usr15@ssrm.com', NULL, '$2y$10$TmuCscd7hq6LyyM53gAmduwcKTBV1e6gjbn9LXCqdAfKTE/kU.RYa', NULL, '2019-10-30 17:00:49', '2019-10-30 17:00:49', 'usr15', 'DOKTER'),
(28, 'user16', 'usr16@ssrm.com', NULL, '$2y$10$02nPRyZaojz1SxnnKPQlDON/RKJWQmRJ.vg2auwUDrNjmNasW.f9S', NULL, '2019-10-30 17:00:49', '2019-10-30 17:00:49', 'usr16', 'DOKTER'),
(29, 'user17', 'usr17@ssrm.com', NULL, '$2y$10$ntApGORQanETpWbNx4Rx4u5ShSS2aDhZDimgExxnL0h30sozBev6m', NULL, '2019-10-30 17:00:49', '2019-10-30 17:00:49', 'usr17', 'DOKTER'),
(30, 'user18', 'usr18@ssrm.com', NULL, '$2y$10$cqPlKft1pydqWnIszRJY8.dyNrl4dYNPEcdnsucC4bBuKyvaK3o7S', NULL, '2019-10-30 17:00:49', '2019-10-30 17:00:49', 'usr18', 'DOKTER'),
(31, 'user19', 'usr19@ssrm.com', NULL, '$2y$10$yWY3DfaaY5JF4xeMZfVSne.BXgJ.R5DNlQwTYIebaK32I/61ZbiSW', NULL, '2019-10-30 17:00:49', '2019-10-30 17:00:49', 'usr19', 'DOKTER'),
(32, 'user20', 'usr20@ssrm.com', NULL, '$2y$10$X0GaQ4AYp5OSgTx9vxxE4uNjDLTPczOsqhLzQP82fMJq4AD7zmBlW', NULL, '2019-10-30 17:00:49', '2019-10-30 17:00:49', 'usr20', 'DOKTER'),
(33, 'user21', 'usr21@ssrm.com', NULL, '$2y$10$Dp5hI/GCzm0LHk0SbPdHuuRF8sPWJAvmKv8wSv.aR6KbcfPlStSXy', NULL, '2019-10-30 17:00:49', '2019-10-30 17:00:49', 'usr21', 'DOKTER'),
(34, 'user22', 'usr22@ssrm.com', NULL, '$2y$10$wY0WWhFDmj4uZqV52QiCHeVd5F8x4d6Wu6ODxAjKY/IOdu5TnIwim', NULL, '2019-10-30 17:00:50', '2019-10-30 17:00:50', 'usr22', 'DOKTER'),
(35, 'user23', 'usr23@ssrm.com', NULL, '$2y$10$xyvMnziCsYuaAprQIKIOXOV2VjeENG0cMVEJ8oGq1mUpNX/vqPN1m', NULL, '2019-10-30 17:00:50', '2019-10-30 17:00:50', 'usr23', 'DOKTER'),
(36, 'user24', 'usr24@ssrm.com', NULL, '$2y$10$PvDC.tekVI5ynbxA7VA97OslRSgCwt6siwCIGc31/7iP.nF2tGNvC', NULL, '2019-10-30 17:00:50', '2019-10-30 17:00:50', 'usr24', 'DOKTER'),
(37, 'user25', 'usr25@ssrm.com', NULL, '$2y$10$Ekbo9ina8L.rNfKkQlkoWuq7Q7QE461oT61.wpUta4UEYOfT/nCX.', NULL, '2019-10-30 17:00:50', '2019-10-30 17:00:50', 'usr25', 'DOKTER'),
(38, 'user26', 'usr26@ssrm.com', NULL, '$2y$10$X7QBOnWI8hKedg/o2xBxKO/BuvFAMeKgxrF1sMOEv8giNWh5ncY42', NULL, '2019-10-30 17:00:50', '2019-10-30 17:00:50', 'usr26', 'DOKTER'),
(39, 'user27', 'usr27@ssrm.com', NULL, '$2y$10$3jFyFC/tJAO4V3aK4bdLrOFd4KT3YwDF1FBg9.ZRn6G92LmtH5k.e', NULL, '2019-10-30 17:00:50', '2019-10-30 17:00:50', 'usr27', 'DOKTER'),
(40, 'user28', 'usr28@ssrm.com', NULL, '$2y$10$C9OLMyuGVAUHm8CU6nR3ve.GmJRqGk1v9n.EJwyG5HO0jkYy.a9FS', NULL, '2019-10-30 17:00:50', '2019-10-30 17:00:50', 'usr28', 'DOKTER'),
(41, 'user29', 'usr29@ssrm.com', NULL, '$2y$10$KiZyauCCi.9n8QEpA./0Xu28d0V9QUemkwf5iDNRrlJ1qg1zOa1aa', NULL, '2019-10-30 17:00:50', '2019-10-30 17:00:50', 'usr29', 'DOKTER'),
(42, 'user30', 'usr30@ssrm.com', NULL, '$2y$10$/F74ChcWibe5vNivxowgCu7.tBx2TRca97cU37mUXeU6zgV7SY1dm', NULL, '2019-10-30 17:00:50', '2019-10-30 17:00:50', 'usr30', 'DOKTER'),
(43, 'user31', 'usr31@ssrm.com', NULL, '$2y$10$gkE6WVarNuOeIirfxh/XvOIkwXubJDIM4Ts0SDP3FchI8vxA2WE3O', NULL, '2019-10-30 17:00:51', '2019-10-30 17:00:51', 'usr31', 'DOKTER'),
(44, 'user32', 'usr32@ssrm.com', NULL, '$2y$10$FwOvhwLOiKcstg9dg4pWhu7MkWsVsxjDvCslV.Cim0MPLw4eset5q', NULL, '2019-10-30 17:00:51', '2019-10-30 17:00:51', 'usr32', 'DOKTER'),
(45, 'user33', 'usr33@ssrm.com', NULL, '$2y$10$CsV4bD1SK4KbxxesWE0o9u0XwAtQ6cXXeIDR0aPBEI3WCxVPB7.LK', NULL, '2019-10-30 17:00:51', '2019-10-30 17:00:51', 'usr33', 'DOKTER'),
(46, 'user34', 'usr34@ssrm.com', NULL, '$2y$10$E7yLbwr2/jZrWyD8.x4nIOtlX0iwbypJpqp9ZaIirIf9/K7HD6lQ.', NULL, '2019-10-30 17:00:51', '2019-10-30 17:00:51', 'usr34', 'DOKTER'),
(47, 'user35', 'usr35@ssrm.com', NULL, '$2y$10$E.5aigAjHhx0fQC1NUsZyuXTLr1TK8ncZbrJ1XrzSX4/FS4h3HKPG', NULL, '2019-10-30 17:00:51', '2019-10-30 17:00:51', 'usr35', 'DOKTER'),
(48, 'user36', 'usr36@ssrm.com', NULL, '$2y$10$L8sN.MK3dltI9yAtCivY/e4x5MS2GU5T7US4BFcobP3TO84nDbD9G', NULL, '2019-10-30 17:00:51', '2019-10-30 17:00:51', 'usr36', 'DOKTER'),
(49, 'user37', 'usr37@ssrm.com', NULL, '$2y$10$ZcnRJBjC/n9St7OUlQZUmO3FcDd06CcVzZleSDpUgHb4EsMPQ4qEK', NULL, '2019-10-30 17:00:51', '2019-10-30 17:00:51', 'usr37', 'DOKTER'),
(50, 'user38', 'usr38@ssrm.com', NULL, '$2y$10$qMqD51MA.0GWtnR8GJK0EuspBahVub8BX4PgsTo5YY7BEMDVzxZ6W', NULL, '2019-10-30 17:00:51', '2019-10-30 17:00:51', 'usr38', 'DOKTER'),
(51, 'user39', 'usr39@ssrm.com', NULL, '$2y$10$mi1AIbpaK4jvWy7eBFeEfe0HBHGHpSkVhAXDWtAFXQR3EdgUDKVf.', NULL, '2019-10-30 17:00:52', '2019-10-30 17:00:52', 'usr39', 'DOKTER'),
(52, 'user40', 'usr40@ssrm.com', NULL, '$2y$10$3lzIbKHeBnFR/UBwUf4qzO0MQPiI7tRK1cDrDZQY77ILvokvHrRO2', NULL, '2019-10-30 17:00:52', '2019-10-30 17:00:52', 'usr40', 'DOKTER'),
(53, 'user41', 'usr41@ssrm.com', NULL, '$2y$10$FJtoFi/fQSYvaP3cUWhlPeCWf13toTo.VNh8P9ixquheilBCMfWVq', NULL, '2019-10-30 17:00:52', '2019-10-30 17:00:52', 'usr41', 'DOKTER'),
(54, 'user42', 'usr42@ssrm.com', NULL, '$2y$10$9.hxJ7ETrAnPX0QM4sotc.2QALj4qmgmb2YwAEUuXo.hyUjqhTWcu', NULL, '2019-10-30 17:00:52', '2019-10-30 17:00:52', 'usr42', 'DOKTER'),
(55, 'user43', 'usr43@ssrm.com', NULL, '$2y$10$FboQXtTkgeOyJwD0LbityuOYJFa4.eWJitsDRlHrWScQkf3duHRbW', NULL, '2019-10-30 17:00:52', '2019-10-30 17:00:52', 'usr43', 'DOKTER'),
(56, 'user44', 'usr44@ssrm.com', NULL, '$2y$10$g.35VRSDN/dUmvaFn2.5De038645/MIaVdHszSqWdiWlPXYK6L4BS', NULL, '2019-10-30 17:00:52', '2019-10-30 17:00:52', 'usr44', 'DOKTER'),
(57, 'user45', 'usr45@ssrm.com', NULL, '$2y$10$1ke7MUBf1.GDAwfXTG3Zn.WhnVBOTYOJc0xN5pNxLIBVYLXB9Y1tC', NULL, '2019-10-30 17:00:52', '2019-10-30 17:00:52', 'usr45', 'DOKTER'),
(58, 'user46', 'usr46@ssrm.com', NULL, '$2y$10$TAPKNn82yPCLAThNrcLUuuE9fwe4AePc/heMs.VGIclGlyV56sTR6', NULL, '2019-10-30 17:00:52', '2019-10-30 17:00:52', 'usr46', 'DOKTER'),
(59, 'user47', 'usr47@ssrm.com', NULL, '$2y$10$M1oU2mBOPb8gDEcyMBR3..TFSnRmOn9FCQjqGJPLtq5VV30M1Yk9u', NULL, '2019-10-30 17:00:53', '2019-10-30 17:00:53', 'usr47', 'DOKTER'),
(60, 'user48', 'usr48@ssrm.com', NULL, '$2y$10$SyYS1O9uunyM7I5sicmA.esq32FbiTg8a72nlcmU82JoTcYyO40Xa', NULL, '2019-10-30 17:00:53', '2019-10-30 17:00:53', 'usr48', 'DOKTER'),
(61, 'user49', 'usr49@ssrm.com', NULL, '$2y$10$0wKKeeG9dnoKXsDn74IbFuv4V9Ikie7vtCSWLPNiCmBU2X3OJU5z2', NULL, '2019-10-30 17:00:53', '2019-10-30 17:00:53', 'usr49', 'DOKTER'),
(62, 'user49', 'usradm49@ssrm.com', NULL, '$2y$10$FqJ9N1x5z3cC.GlG2Dqc6uBsBWdhysEtL/id4Kci5ZAOR4nz/v09C', NULL, '2019-10-31 07:55:21', '2019-10-31 07:55:21', 'usradm49', 'ADMIN'),
(63, 'user50', 'usradm50@ssrm.com', NULL, '$2y$10$AZYSPARwPlBt5g/u9ipmlenkeozeEhNJqC07oZTvjX6DL.DeDbDIe', NULL, '2019-10-31 07:55:21', '2019-10-31 07:55:21', 'usradm50', 'ADMIN'),
(64, 'user51', 'usradm51@ssrm.com', NULL, '$2y$10$RgtwyFh5noK8niqV0b5sRubmxE04TvA/W7emgYMfQmEx4giICDExm', NULL, '2019-10-31 07:55:21', '2019-10-31 07:55:21', 'usradm51', 'ADMIN'),
(65, 'user52', 'usradm52@ssrm.com', NULL, '$2y$10$9IFoHp6THHF8Sd5S8bU3POq.VnqCHuOz89cSZisOs/EXA9g5EzapW', NULL, '2019-10-31 07:55:21', '2019-10-31 07:55:21', 'usradm52', 'ADMIN'),
(66, 'user53', 'usradm53@ssrm.com', NULL, '$2y$10$n8dU28FOOhIt0Ud.zXWFCefZEQ0XMkQxs6t6iK3SvYEWKv1HDW5mi', NULL, '2019-10-31 07:55:21', '2019-10-31 07:55:21', 'usradm53', 'ADMIN'),
(67, 'user54', 'usradm54@ssrm.com', NULL, '$2y$10$mOvh.HNPWKvLfOF/mHVx7eJSU6tGJs.WTKwGKwWDY7xzi7Jy0RUIa', NULL, '2019-10-31 07:55:21', '2019-10-31 07:55:21', 'usradm54', 'ADMIN'),
(68, 'user55', 'usradm55@ssrm.com', NULL, '$2y$10$DXyyvqnAYHkLrbBBwf2quuWrUdAWLFIDSnOAaESa3tZSVt19.slFi', NULL, '2019-10-31 07:55:22', '2019-10-31 07:55:22', 'usradm55', 'ADMIN'),
(69, 'user56', 'usradm56@ssrm.com', NULL, '$2y$10$rMvgrsRuZTx262oHp5AmleJWk8IeT1MkmH4h012RdTbFM8LUYZn4S', NULL, '2019-10-31 07:55:22', '2019-10-31 07:55:22', 'usradm56', 'ADMIN'),
(70, 'user57', 'usradm57@ssrm.com', NULL, '$2y$10$aG5kJteqBUIGClz01WcMEub1qd9H1kgUzPBg6zFuIyI7/pW0GK7da', NULL, '2019-10-31 07:55:22', '2019-10-31 07:55:22', 'usradm57', 'ADMIN'),
(71, 'user58', 'usradm58@ssrm.com', NULL, '$2y$10$0pW7Cnk/XQf8LmTAn0SaTuV.Fl0pEpHdbGqX3p9llUPUTj.Hswhmm', NULL, '2019-10-31 07:55:22', '2019-10-31 07:55:22', 'usradm58', 'ADMIN'),
(72, 'user59', 'usradm59@ssrm.com', NULL, '$2y$10$8x.bUQFPUp0.XWrTw.hZp.7hopLRq36cCqp4CyzYcq0D06z8oo1SC', NULL, '2019-10-31 07:55:22', '2019-10-31 07:55:22', 'usradm59', 'ADMIN'),
(73, 'user60', 'usradm60@ssrm.com', NULL, '$2y$10$EoiDJET22l7Uu14kngIBvOVRZsoiSsER03ci0V18NV3odLNxcgFzK', NULL, '2019-10-31 07:55:22', '2019-10-31 07:55:22', 'usradm60', 'ADMIN'),
(74, 'user61', 'usradm61@ssrm.com', NULL, '$2y$10$j1KIkmUZ3/kLqsIpPFrmH.TjnsPnK4gZ8Ob83InofuQ7KZMZ4.ZAS', NULL, '2019-10-31 07:55:22', '2019-10-31 07:55:22', 'usradm61', 'ADMIN'),
(75, 'user62', 'usradm62@ssrm.com', NULL, '$2y$10$r/0Dp5PelB6yKktlREoo4ustUfdO1HHM26/SZunVc2KUqI0V5qY66', NULL, '2019-10-31 07:55:22', '2019-10-31 07:55:22', 'usradm62', 'ADMIN'),
(76, 'user63', 'usradm63@ssrm.com', NULL, '$2y$10$GgXNUeTHwCNdzOSSTRhyoOm33KqFJ6zGxqMC9mYl8Ko/pnNZV2sVq', NULL, '2019-10-31 07:55:22', '2019-10-31 07:55:22', 'usradm63', 'ADMIN'),
(77, 'user64', 'usradm64@ssrm.com', NULL, '$2y$10$1X5qQpzGtVtS1J70rF/EeeyjuUAJD7/l2KDPxWspVmemYT57uouda', NULL, '2019-10-31 07:55:22', '2019-10-31 07:55:22', 'usradm64', 'ADMIN'),
(78, 'user65', 'usradm65@ssrm.com', NULL, '$2y$10$7I6fNMEEF/fTjUCi0M2TVe8tBaVAR1INBr/L/hGeqWXenyAKQnVVq', NULL, '2019-10-31 07:55:22', '2019-10-31 07:55:22', 'usradm65', 'ADMIN'),
(79, 'user66', 'usradm66@ssrm.com', NULL, '$2y$10$ORs74yMkYdzV25BtuzfE.uwmhdj42ksRX.3BcG7zMhEpWSp3CeKSG', NULL, '2019-10-31 07:55:22', '2019-10-31 07:55:22', 'usradm66', 'ADMIN'),
(80, 'user67', 'usradm67@ssrm.com', NULL, '$2y$10$mGVA8sa8bjPtUhwzlUm8Qe3STswy2NlE2AzRxBCLKbAveoqagj1DW', NULL, '2019-10-31 07:55:23', '2019-10-31 07:55:23', 'usradm67', 'ADMIN'),
(81, 'user68', 'usradm68@ssrm.com', NULL, '$2y$10$LQGLhDiIhznh43QM.BINiOPA3VBmKkPn4QIIA0b9h6Jp/x4qqrjoS', NULL, '2019-10-31 07:55:23', '2019-10-31 07:55:23', 'usradm68', 'ADMIN'),
(82, 'user69', 'usradm69@ssrm.com', NULL, '$2y$10$0wqwY9aNb6pNFhE7BDVY4O9Q2kpv94sLXbWy3/xh7WvyloK13G0ny', NULL, '2019-10-31 07:55:23', '2019-10-31 07:55:23', 'usradm69', 'ADMIN'),
(83, 'user70', 'usradm70@ssrm.com', NULL, '$2y$10$bcgNgQTCh9SdhiX/OZ8Kd.3WGXTq8NLlfigweSkdpoWq5BGRff1tG', NULL, '2019-10-31 07:55:23', '2019-10-31 07:55:23', 'usradm70', 'ADMIN'),
(84, 'user71', 'usradm71@ssrm.com', NULL, '$2y$10$w69NPloeZHQSQCg6Qy2K3O0bWe2QNQU5/SNDJyDdhbetPegt/O6O2', NULL, '2019-10-31 07:55:23', '2019-10-31 07:55:23', 'usradm71', 'ADMIN'),
(85, 'user72', 'usradm72@ssrm.com', NULL, '$2y$10$7AilkmTUgP4dnz4eyk6Zdu8fACC7wNlce4Cif8xhPdSUFji.xcSvC', NULL, '2019-10-31 07:55:23', '2019-10-31 07:55:23', 'usradm72', 'ADMIN'),
(86, 'user73', 'usradm73@ssrm.com', NULL, '$2y$10$wHfdi2Fz6WOb0E2JkYuL6u6GIy1umZ2flPWfQqOPAT5/UlWdQrK/i', NULL, '2019-10-31 07:55:23', '2019-10-31 07:55:23', 'usradm73', 'ADMIN'),
(87, 'user74', 'usradm74@ssrm.com', NULL, '$2y$10$BPcocFpNK2HzA4J44Ao0ieioD8XbZZqO9CnvxmLeL98lY9O1H96be', NULL, '2019-10-31 07:55:23', '2019-10-31 07:55:23', 'usradm74', 'ADMIN'),
(88, 'user75', 'usradm75@ssrm.com', NULL, '$2y$10$JgrDjTWoG4spxkzBXM5iZe6uvsxu8OxcL74usg0vrsuBW8WRtjnMu', NULL, '2019-10-31 07:55:23', '2019-10-31 07:55:23', 'usradm75', 'ADMIN'),
(89, 'user76', 'usradm76@ssrm.com', NULL, '$2y$10$GBVFZBCKUSDSzP41exPxgOqO9jcqg0ul.bP8uOjhipzSPk2zqeYg.', NULL, '2019-10-31 07:55:23', '2019-10-31 07:55:23', 'usradm76', 'ADMIN'),
(90, 'user77', 'usradm77@ssrm.com', NULL, '$2y$10$UG0MO6CKGICPQqKNHub.feLZue.Xr0g98vzaynRx2il0JPCfvSL.6', NULL, '2019-10-31 07:55:23', '2019-10-31 07:55:23', 'usradm77', 'ADMIN'),
(91, 'user78', 'usradm78@ssrm.com', NULL, '$2y$10$j7hwaeNeqOXtNZo6uJcFJOTSd.hBSWCkPNWV20GC3nSTpEIVSDrtG', NULL, '2019-10-31 07:55:23', '2019-10-31 07:55:23', 'usradm78', 'ADMIN'),
(92, 'user79', 'usradm79@ssrm.com', NULL, '$2y$10$jvqsVkpsKDUXsRT9EDrXKO1xtLxuU5VscDVP6J92K1AMbLi8O7K5q', NULL, '2019-10-31 07:55:23', '2019-10-31 07:55:23', 'usradm79', 'ADMIN'),
(93, 'user80', 'usradm80@ssrm.com', NULL, '$2y$10$VcwDfVr/0DgSGSHDDMlazOcpZyO1nggReEnVvleFmfWq56nLG8aSO', NULL, '2019-10-31 07:55:24', '2019-10-31 07:55:24', 'usradm80', 'ADMIN'),
(94, 'user81', 'usradm81@ssrm.com', NULL, '$2y$10$1fW8UnKjxaHRllt6LL0y2O67pS7.SN/JslfrOZXYnjOSMpNeseoBy', NULL, '2019-10-31 07:55:24', '2019-10-31 07:55:24', 'usradm81', 'ADMIN'),
(95, 'user82', 'usradm82@ssrm.com', NULL, '$2y$10$6YCGW4J8H0J5sHca01ChAOVyz08NknwLAiUpwetRh8IDeedsTKcOG', NULL, '2019-10-31 07:55:24', '2019-10-31 07:55:24', 'usradm82', 'ADMIN'),
(96, 'user83', 'usradm83@ssrm.com', NULL, '$2y$10$YpD3EJpCf/MRKvJhnR3cHOmv2d4ts/IIyrtQj.sau7PjnAdiJYWEO', NULL, '2019-10-31 07:55:24', '2019-10-31 07:55:24', 'usradm83', 'ADMIN'),
(97, 'user84', 'usradm84@ssrm.com', NULL, '$2y$10$zBKpuqDOpjAxJrC0mL/6VO0wnlq/LumAnR4JYdyledeQ1ArgElNzi', NULL, '2019-10-31 07:55:24', '2019-10-31 07:55:24', 'usradm84', 'ADMIN'),
(98, 'user85', 'usradm85@ssrm.com', NULL, '$2y$10$X.CCGEyn20V96AXtGKif0.549HtYaHiqQfOa52zQ97UUJDNF0xmBW', NULL, '2019-10-31 07:55:24', '2019-10-31 07:55:24', 'usradm85', 'ADMIN'),
(99, 'user86', 'usradm86@ssrm.com', NULL, '$2y$10$drkaeqEFzAZ6ch6ZpiMRZeZzPi3XhLe5fbaRViWs2eAGUp1337vsu', NULL, '2019-10-31 07:55:24', '2019-10-31 07:55:24', 'usradm86', 'ADMIN'),
(100, 'user87', 'usradm87@ssrm.com', NULL, '$2y$10$97KyPSsv4trwsIYLN5y59Ocq8pImr9YQIrf2kovoQOlqHG3zm0liS', NULL, '2019-10-31 07:55:24', '2019-10-31 07:55:24', 'usradm87', 'ADMIN'),
(101, 'user88', 'usradm88@ssrm.com', NULL, '$2y$10$V2mZPUfO/taSyFr2UoAq2OfBaF7wrMuWOE04a2ijcy/SERbRKZHTK', NULL, '2019-10-31 07:55:24', '2019-10-31 07:55:24', 'usradm88', 'ADMIN'),
(102, 'user89', 'usradm89@ssrm.com', NULL, '$2y$10$HomwUxFCWrHxSmHAGCtwV.qY3SNRNPmGrycw8hTkGBLJzH13bVXIy', NULL, '2019-10-31 07:55:24', '2019-10-31 07:55:24', 'usradm89', 'ADMIN'),
(103, 'user90', 'usradm90@ssrm.com', NULL, '$2y$10$ragShJ1tMb5qDRj14xlH9eWAQnFQZZjnRmwEd/TVOgNHJLu5pwDhC', NULL, '2019-10-31 07:55:24', '2019-10-31 07:55:24', 'usradm90', 'ADMIN'),
(104, 'user91', 'usradm91@ssrm.com', NULL, '$2y$10$4011GjiJOk3bMKGFT1KKaeVyOaov/xbzznmh2EVZ37EKpxvg2gmYK', NULL, '2019-10-31 07:55:24', '2019-10-31 07:55:24', 'usradm91', 'ADMIN'),
(105, 'user92', 'usradm92@ssrm.com', NULL, '$2y$10$Q7q9qNE53DZ8MDYPRFIICOfR6r5juEo0OkXsuW7drQHK2lozVAaBe', NULL, '2019-10-31 07:55:25', '2019-10-31 07:55:25', 'usradm92', 'ADMIN'),
(106, 'user93', 'usradm93@ssrm.com', NULL, '$2y$10$2jAMf4PRbQ7af6UqSK3Jzux/LWYsH68SSlNZ0GLNRphHq36njn/AG', NULL, '2019-10-31 07:55:25', '2019-10-31 07:55:25', 'usradm93', 'ADMIN'),
(107, 'user94', 'usradm94@ssrm.com', NULL, '$2y$10$NMB20E8wlENC2Yf55LzSH.0ktisHcMk5k7usmNaWimIKjWfoSD2cW', NULL, '2019-10-31 07:55:25', '2019-10-31 07:55:25', 'usradm94', 'ADMIN'),
(108, 'user95', 'usradm95@ssrm.com', NULL, '$2y$10$oQW10qyZHkcfv2xUi73K9OPq4b5zos2ixKtuvd9AhgvQ/lPJEpxTO', NULL, '2019-10-31 07:55:25', '2019-10-31 07:55:25', 'usradm95', 'ADMIN'),
(109, 'user96', 'usradm96@ssrm.com', NULL, '$2y$10$OJEC7dd/fehdvWN0lU.nV.0ZDaWbFbM./MTweZp/BJXkXELogLqYS', NULL, '2019-10-31 07:55:25', '2019-10-31 07:55:25', 'usradm96', 'ADMIN'),
(110, 'user97', 'usradm97@ssrm.com', NULL, '$2y$10$hPJF.IfekeCcfBSY91hbVec0SVCnIzPmwbJ.h3cKSdvGzLTSnztFi', NULL, '2019-10-31 07:55:25', '2019-10-31 07:55:25', 'usradm97', 'ADMIN'),
(111, 'user98', 'usradm98@ssrm.com', NULL, '$2y$10$EudLEd..GUOnTiB0iF9cROMrdv2GpC50AgMUpYi94c5yfj7i1Rwxa', NULL, '2019-10-31 07:55:25', '2019-10-31 07:55:25', 'usradm98', 'ADMIN'),
(112, 'user99', 'usradm99@ssrm.com', NULL, '$2y$10$GJWKnuyehORlGnbo9ZI87OwQNV3jZ..6xBKA0TsUokzCgKN0Bfi4S', NULL, '2019-10-31 07:55:25', '2019-10-31 07:55:25', 'usradm99', 'ADMIN'),
(113, 'user100', 'usradm100@ssrm.com', NULL, '$2y$10$lAoy5FZNZestJMwNZURLtu64/BDQN53HnmKFmD2Nz.qxEmm/udmDu', NULL, '2019-10-31 07:55:25', '2019-10-31 07:55:25', 'usradm100', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `igd`
--
ALTER TABLE `igd`
  ADD PRIMARY KEY (`igd_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `rek_id` (`rek_id`);

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
  ADD PRIMARY KEY (`penunjang_id`),
  ADD KEY `p_igd_id` (`p_igd_id`),
  ADD KEY `p_nicu_id` (`p_nicu_id`),
  ADD KEY `p_poli_id` (`p_poli_id`),
  ADD KEY `p_ri_id` (`p_ri_id`);

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
  ADD KEY `users_id` (`users_id`);

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
  MODIFY `penunjang_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

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
-- Constraints for table `penunjang`
--
ALTER TABLE `penunjang`
  ADD CONSTRAINT `penunjang_ibfk_1` FOREIGN KEY (`p_igd_id`) REFERENCES `igd` (`igd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penunjang_ibfk_2` FOREIGN KEY (`p_nicu_id`) REFERENCES `nicu` (`nicu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penunjang_ibfk_3` FOREIGN KEY (`p_poli_id`) REFERENCES `poli` (`po_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penunjang_ibfk_4` FOREIGN KEY (`p_ri_id`) REFERENCES `rawat_inap` (`raw_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `rekmed_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
