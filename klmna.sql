-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 10:38 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klmna`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone_number`, `email_verified_at`, `password`, `role_name`, `Status`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'مدير الادارة', 'abdoushawer93@gmail.com', '0100203020', '2021-08-23 01:40:49', '$2y$10$qWh2zwddzuJ.7I5haGZMweGFxXhBZ.zq9HXwHHmCAmHig9xAMzAAm', '[\"\\u0645\\u062f\\u064a\\u0631 \\u0627\\u0644\\u0646\\u0638\\u0627\\u0645\"]', 'active', 'OEsLBibMma9NE9iXdB4lrBl3jhlOVT5Ixbodr0WXr8wynJvyKq0oACaYT3WZdmU0DFkgeXgGfRQscj0M', '13beg2GEZsYv95u1YDC3scJvXVU8pg7i0EldPBVD7sElZs5tmTCiTEYVtY1m', '2021-08-23 01:40:49', '2021-08-23 21:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_password_resets`
--

INSERT INTO `admin_password_resets` (`email`, `token`, `created_at`) VALUES
('abdoushawer93@gmail.com', '$2y$10$0.nOlBNxM6IVhjgkKlXLXuNQ8gGASJGhXPzKI58Hw4vPGo9HwPk0W', '2021-08-25 20:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `admin_profiles`
--

CREATE TABLE `admin_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_profiles`
--

INSERT INTO `admin_profiles` (`id`, `city_name`, `age`, `gender`, `profile_pic`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'القاهرة', '33', 'male', 'uploads/profiles/admins/1/Abdou.jpg', 1, '2021-08-23 01:40:49', '2021-08-23 21:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `customer_id`, `unit_id`, `count`, `start_date`, `end_date`, `unit_price`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2021-08-23', '2021-08-24', '2000', '2000', 1, '2021-08-23 02:11:21', '2021-08-23 02:11:21'),
(2, 3, 3, 1, '2021-08-23', '2021-08-24', '4000', '4000', 1, '2021-08-23 14:02:07', '2021-08-23 14:02:07'),
(3, 4, 2, 1, '2021-08-23', '2021-08-24', '1000', '1000', 1, '2021-08-23 14:02:37', '2021-08-23 14:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone_number`, `email_verified_at`, `password`, `role_name`, `Status`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'منى مصطفى درويش', 'mona_mostafa@gmail.com', '01027094563', '2021-08-23 01:40:50', '$2y$10$Y.rFZr8lwIqW/oaVCaxYz.XQPF2FcPSx3.zh8qrHnRiNqowVGnb3y', '[\"\\u0639\\u0645\\u064a\\u0644\"]', 'active', NULL, '5GHgBkbtkFaamRrIaag6pwe4f0iD33k0c5HEY01v071LJVOCAKIDbzjzL8st', '2021-08-23 01:40:51', '2021-08-23 12:49:30'),
(2, 'عصام رفعت الدرشابى', 'essam_refaat@gmail.com', NULL, '2021-08-23 01:40:50', '$2y$10$8RFm.ExqaplN47XmsgQAX.z2DPCdDdsG/h9OUIBnmnNswZCJ1Nqmu', '[\"\\u0639\\u0645\\u064a\\u0644\"]', 'active', NULL, NULL, '2021-08-23 01:40:51', '2021-08-23 01:40:51'),
(3, 'الهام ممدوح فرج', 'elham_mamdouh@gmail.com', '0100564764', '2021-08-23 01:40:50', '$2y$10$MYl84XWnTPi5yGU03QQzqeDOhmnHV315GRamsy4J/2./kisMdAOA6', '[\"\\u0639\\u0645\\u064a\\u0644\"]', 'active', NULL, NULL, '2021-08-23 01:40:51', '2021-08-23 01:40:51'),
(4, 'ابتهال السيد حمزة', 'ibtehal_hamza@gmail.com', NULL, '2021-08-23 01:40:50', '$2y$10$aDdFM9rinb8pj.Vk6ikr3uybtbV7ca8K1cDx.rh1Zs7hO0bV4Y7mS', '[\"\\u0639\\u0645\\u064a\\u0644\"]', 'active', NULL, NULL, '2021-08-23 01:40:51', '2021-08-23 01:40:51'),
(5, 'كوثر عبدالوهاب محمود', 'kawthar_mahmoud@gmail.com', NULL, '2021-08-23 01:40:50', '$2y$10$XnasMVNPLIcYAlVEvE2TaOb3XKsThtmwNYmvsMcljwkZc2BCWUsfu', '[\"\\u0639\\u0645\\u064a\\u0644\"]', 'active', NULL, NULL, '2021-08-23 01:40:51', '2021-08-23 01:40:51'),
(6, 'محمد احمد طه السيد', 'mohamed_taha@gmail.com', NULL, '2021-08-23 01:40:50', '$2y$10$JVR0w7dQOMvJxfTXhiD8ce42Dv/I9NRrhgFlmNxWj6AAiDW3K2BFy', '[\"\\u0639\\u0645\\u064a\\u0644\"]', 'active', NULL, NULL, '2021-08-23 01:40:51', '2021-08-23 01:40:51'),
(7, 'احمد مجدى صالح سلامه', 'ahmed_magdy@gmail.com', NULL, '2021-08-23 01:40:50', '$2y$10$a6uWj3iaUbeoOJSxxKO0X.Uq6RT0lbrasCJBKkRAW.Asuj42.q2Hm', '[\"\\u0639\\u0645\\u064a\\u0644\"]', 'active', NULL, NULL, '2021-08-23 01:40:51', '2021-08-23 01:40:51'),
(8, 'رضا سعد مرعى', 'reda_saad_marey@gmail.com', NULL, '2021-08-23 01:40:51', '$2y$10$JJuWlZh9iy0R5Umtv96Ij.TvNgsZTvGG7.022y1fJqyWnwt8hzMpK', '[\"\\u0639\\u0645\\u064a\\u0644\"]', 'active', NULL, NULL, '2021-08-23 01:40:51', '2021-08-23 01:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `client_profiles`
--

CREATE TABLE `client_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_profiles`
--

INSERT INTO `client_profiles` (`id`, `city_name`, `age`, `gender`, `profile_pic`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 'القاهرة', '33', 'male', 'uploads/profiles/Clients/1/Reham.jpg', 1, '2021-08-23 01:40:51', '2021-08-23 12:49:30'),
(2, NULL, NULL, NULL, 'assets/img/guest.png', 2, '2021-08-23 01:40:51', '2021-08-23 01:40:51'),
(3, NULL, NULL, NULL, 'assets/img/guest.png', 3, '2021-08-23 01:40:51', '2021-08-23 01:40:51'),
(4, NULL, NULL, NULL, 'assets/img/guest.png', 4, '2021-08-23 01:40:51', '2021-08-23 01:40:51'),
(5, NULL, NULL, NULL, 'assets/img/guest.png', 5, '2021-08-23 01:40:51', '2021-08-23 01:40:51'),
(6, NULL, NULL, NULL, 'assets/img/guest.png', 6, '2021-08-23 01:40:51', '2021-08-23 01:40:51'),
(7, NULL, NULL, NULL, 'assets/img/guest.png', 7, '2021-08-23 01:40:51', '2021-08-23 01:40:51'),
(8, NULL, NULL, NULL, 'assets/img/guest.png', 8, '2021-08-23 01:40:51', '2021-08-23 01:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(4, 'عماد لطفى', '01020200203', 'شكوى', 'شكوى يا ناس', 0, '2021-08-23 15:38:55', '2021-08-23 15:38:55'),
(5, 'عماد لطفى', '01000003030', 'شكوى', 'الغعتبالغعتا', 0, '2021-08-23 15:41:19', '2021-08-23 15:41:19'),
(6, 'عادل فرج', '010002633545', 'ترحيب', 'السلام عليكم ارحب بكم جميعا .. شكرا لكم', 0, '2021-08-23 21:20:44', '2021-08-23 21:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `provider_id`, `avatar`, `email_verified_at`, `phone_number`, `password`, `role_name`, `Status`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'عبده سعيد فهيم شاور', NULL, NULL, NULL, NULL, '01092716796', '$2y$10$Ycq6s1JXSe/VDWcLtFUvFec6TBt8lVvjvxN/REKHGTJYUDpKaUtti', '[\"\\u0632\\u0628\\u0648\\u0646\"]', 'active', NULL, 'zMYZ60uCOm6XPNNH9McLq3sE31HajWtHahh7M20OdmoQ1tK0uk3Irj7jy56r', '2021-08-23 01:40:50', '2021-08-23 01:40:50'),
(2, 'احمد جادالله', NULL, NULL, NULL, NULL, '01023574821', '$2y$10$PKXFFbU5oz041S8qmAwji.xoA6FY74e1llH41PSvQhG/0Y6BrrlfG', '[\"\\u0632\\u0628\\u0648\\u0646\"]', 'active', NULL, NULL, '2021-08-23 01:40:50', '2021-08-23 01:40:50'),
(3, 'على محمد جلال', NULL, NULL, NULL, NULL, '01173654392', '$2y$10$fW9HB0S1YbEfrmgbFOkdse2Vv/nE.6d8fuNyQMC7CqtuIdm0KW4Ca', '[\"\\u0632\\u0628\\u0648\\u0646\"]', 'active', NULL, NULL, '2021-08-23 01:40:50', '2021-08-23 01:40:50'),
(4, 'اسامة ربيع', NULL, NULL, NULL, NULL, '01265437890', '$2y$10$1pgGe4g62MqrI5i1y77r2e9jJE7kwGeXCVr1vLsc4j1BNFr.zypwy', '[\"\\u0632\\u0628\\u0648\\u0646\"]', 'active', NULL, NULL, '2021-08-23 01:40:50', '2021-08-23 01:40:50'),
(5, 'نورهان فتحى عمر', NULL, NULL, NULL, NULL, '01027094563', '$2y$10$ye4.DtMcu1c.FSNQudcnX.PaKHW3kkGapgKHo6BQIqn88Rgu.NGd6', '[\"\\u0632\\u0628\\u0648\\u0646\"]', 'active', NULL, NULL, '2021-08-23 01:40:50', '2021-08-23 01:40:50'),
(6, 'ريهام شاور', NULL, NULL, NULL, NULL, '01076542828', '$2y$10$jGONnn.nCJklibue5oKmXeVWkNFVWPtLk.wdHujcY8C.d0t16BQxi', '[\"\\u0632\\u0628\\u0648\\u0646\"]', 'active', NULL, NULL, '2021-08-23 01:40:50', '2021-08-23 01:40:50'),
(7, 'روان عبده شاور', NULL, NULL, NULL, NULL, '01028363452', '$2y$10$4E1zbGZEWOdLSZOi/ISqMejDsvsX2.oi0NXc/GvEOILlnjtpbvy5m', '[\"\\u0632\\u0628\\u0648\\u0646\"]', 'active', NULL, NULL, '2021-08-23 01:40:50', '2021-08-23 01:40:50'),
(8, 'Abdou Shawer', 'abdoushawer93@gmail.com', '39867676', 'https://avatars.githubusercontent.com/u/39867676?v=4', '2021-08-25 13:35:49', '01092344444', '$2y$10$LiT0OZVJDdNvAbNpg8XMbO4EZNNt/lhDdaaoIiFBd5HqktOkhH/ye', '[\"\\u0632\\u0628\\u0648\\u0646\"]', 'active', NULL, '8qRFvZNUu0GIw9GKypDnk9b8CtLwqwYIn7HHMS7VhBRYdIkdHkempHRmoNLB', '2021-08-25 13:35:49', '2021-08-25 20:21:00'),
(10, 'شاهنده نافع شاور', NULL, NULL, NULL, NULL, '01015699010', '$2y$10$UHbacJA1nqfLTKgT2pnOmurUSOXBKHJQPIqMlfShfepItdfJcp1AO', '\"\\u0632\\u0628\\u0648\\u0646\"', 'active', NULL, NULL, '2021-08-25 20:35:25', '2021-08-25 20:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `customer_profiles`
--

CREATE TABLE `customer_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_profiles`
--

INSERT INTO `customer_profiles` (`id`, `city_name`, `age`, `gender`, `profile_pic`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'assets/img/guest.png', 1, '2021-08-23 01:40:50', '2021-08-23 01:40:50'),
(2, NULL, NULL, NULL, 'assets/img/guest.png', 2, '2021-08-23 01:40:50', '2021-08-23 01:40:50'),
(3, NULL, NULL, NULL, 'assets/img/guest.png', 3, '2021-08-23 01:40:50', '2021-08-23 01:40:50'),
(4, NULL, NULL, NULL, 'assets/img/guest.png', 4, '2021-08-23 01:40:50', '2021-08-23 01:40:50'),
(5, NULL, NULL, NULL, 'assets/img/guest.png', 5, '2021-08-23 01:40:50', '2021-08-23 01:40:50'),
(6, NULL, NULL, NULL, 'assets/img/guest.png', 6, '2021-08-23 01:40:50', '2021-08-23 01:40:50'),
(7, NULL, NULL, NULL, 'assets/img/guest.png', 7, '2021-08-23 01:40:50', '2021-08-23 01:40:50'),
(8, 'قرية الحماد', '33', 'male', 'uploads/profiles/customers/8/b0780767bf3b0abc0e5ea5c4acee42a0.jpg', 8, '2021-08-25 13:35:50', '2021-08-25 13:56:32'),
(9, '', '', '', 'assets/img/guest.png', 10, '2021-08-25 20:35:25', '2021-08-25 20:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `depts`
--

CREATE TABLE `depts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profit_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profit_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_pic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `depts`
--

INSERT INTO `depts` (`id`, `dept_name`, `profit_type`, `profit_value`, `dept_pic`, `created_at`, `updated_at`) VALUES
(1, 'سيارات زفاف', 'percent', '20', 'uploads/depts/1/4.png', '2021-08-23 01:40:49', '2021-08-23 17:00:24'),
(2, 'دى جى', 'percent', '20', 'uploads/depts/2/2.png', '2021-08-23 01:40:49', '2021-08-23 17:00:54'),
(3, 'كوافير', 'percent', '20', 'uploads/depts/3/3.png', '2021-08-23 01:40:49', '2021-08-23 17:01:07'),
(4, 'قاعات افراح', 'percent', '20', 'uploads/depts/4/1.png', '2021-08-23 01:40:49', '2021-08-23 17:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `customer_id`, `unit_id`, `created_at`, `updated_at`) VALUES
(2, 4, 1, '2021-08-23 02:06:12', '2021-08-23 02:06:12'),
(3, 8, 5, '2021-08-25 14:20:40', '2021-08-25 14:20:40'),
(4, 8, 1, '2021-08-25 19:01:51', '2021-08-25 19:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `governorates`
--

CREATE TABLE `governorates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `governorate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`id`, `governorate`, `created_at`, `updated_at`) VALUES
(1, 'القاهرة', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(2, 'المنصورة', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(3, 'بورسعيد', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(4, 'الاسكندرية', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(5, 'الاسماعيلية', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(6, 'السويس', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(7, 'الجونة', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(8, 'الساحل الشمالى', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(9, 'العلمين', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(10, 'مرسى مطروح', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(11, 'رشيد', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(12, 'دمياط', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(13, 'الجيزة', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(14, 'جمصة', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(15, 'راس البر', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(16, 'راس سدر', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(17, 'الغردقة', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(18, 'شرم الشيخ', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(19, 'الاقصر', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(20, 'اسوان', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(21, 'العريش', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(22, 'العين السخنة', '2021-08-23 01:40:49', '2021-08-23 01:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `intervals`
--

CREATE TABLE `intervals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `interval_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intervals`
--

INSERT INTO `intervals` (`id`, `interval_name`, `created_at`, `updated_at`) VALUES
(1, 'الساعة', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(2, 'الليلة الواحده', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(3, 'اليوم كامل', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(4, 'الاسبوع', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(5, 'الشهر', '2021-08-23 01:40:49', '2021-08-23 01:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, '2014_10_12_100000_create_admin_password_resets_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_03_26_122233_create_admins_table', 1),
(6, '2020_04_27_181826_create_depts_table', 1),
(7, '2021_01_22_220021_create_permission_tables', 1),
(8, '2021_01_23_201532_create_admin_profiles_table', 1),
(9, '2021_02_04_175709_create_clients_table', 1),
(10, '2021_02_05_201532_create_client_profiles_table', 1),
(11, '2021_02_06_163222_create_customers_table', 1),
(12, '2021_02_07_201532_create_customer_profiles_table', 1),
(13, '2021_04_27_231742_create_intervals_table', 1),
(14, '2021_04_28_010349_create_governorates_table', 1),
(15, '2021_04_28_224932_create_units_table', 1),
(16, '2021_04_29_024834_create_reviews_table', 1),
(17, '2021_05_03_092452_create_contacts_table', 1),
(18, '2021_05_04_232808_create_bookings_table', 1),
(19, '2021_05_06_140036_create_favorites_table', 1),
(20, '2021_05_07_233251_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(2, 'App\\Models\\Admin', 2),
(3, 'App\\Models\\Client', 3),
(4, 'App\\Models\\Customer', 4),
(4, 'App\\Models\\Customer', 8),
(4, 'App\\Models\\Customer', 10);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `key`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admins list', 'admin', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(2, 'show admin', 'admin', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(3, 'add admin', 'admin', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(4, 'edit admin', 'admin', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(5, 'delete admin', 'admin', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(6, 'clients list', 'client', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(7, 'show client', 'client', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(8, 'add client', 'client', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(9, 'edit client', 'client', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(10, 'delete client', 'client', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(11, 'customers list', 'customer', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(12, 'show customer', 'customer', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(13, 'add customer', 'customer', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(14, 'edit customer', 'customer', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(15, 'delete customer', 'customer', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(16, 'depts list', 'dept', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(17, 'show dept', 'dept', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(18, 'add dept', 'dept', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(19, 'edit dept', 'dept', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(20, 'delete dept', 'dept', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(21, 'intervals list', 'interval', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(22, 'show interval', 'interval', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(23, 'add interval', 'interval', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(24, 'edit interval', 'interval', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(25, 'delete interval', 'interval', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(26, 'currencies list', 'currency', 'admin-web', '2021-08-23 01:40:48', '2021-08-23 01:40:48'),
(27, 'show currency', 'currency', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(28, 'add currency', 'currency', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(29, 'edit currency', 'currency', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(30, 'delete currency', 'currency', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(31, 'posts list', 'post', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(32, 'show post', 'post', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(33, 'add post', 'post', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(34, 'edit post', 'post', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(35, 'delete post', 'post', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(36, 'governorates list', 'governorate', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(37, 'show governorate', 'governorate', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(38, 'add governorate', 'governorate', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(39, 'edit governorate', 'governorate', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(40, 'delete governorate', 'governorate', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(41, 'services list', 'service', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(42, 'show service', 'service', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(43, 'add service', 'service', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(44, 'edit service', 'service', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(45, 'delete service', 'service', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(46, 'units list', 'unit', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(47, 'show unit', 'unit', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(48, 'add unit', 'unit', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(49, 'edit unit', 'unit', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(50, 'delete unit', 'unit', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(51, 'bookings list', 'booking', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(52, 'show booking', 'booking', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(53, 'add booking', 'booking', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(54, 'edit booking', 'booking', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(55, 'delete booking', 'booking', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(56, 'payments list', 'payment', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(57, 'show payment', 'payment', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(58, 'add payment', 'payment', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(59, 'edit payment', 'payment', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(60, 'delete payment', 'payment', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `report_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `customer_id`, `unit_id`, `report_text`, `created_at`, `updated_at`) VALUES
(2, 8, 6, 'مكان سئ وتعامل سئ وخدمة زبالة', '2021-08-25 20:07:42', '2021-08-25 20:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `review_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_stars` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `customer_id`, `unit_id`, `review_text`, `review_stars`, `created_at`, `updated_at`) VALUES
(2, 2, 4, 'قاعة جميلة', 5, '2021-08-23 13:32:18', '2021-08-23 13:32:18'),
(3, 1, 3, 'قاعة حلوة', 4, '2021-08-23 13:32:31', '2021-08-23 13:32:31'),
(4, 3, 3, 'قاعة واسعة', 5, '2021-08-23 13:32:43', '2021-08-23 13:32:43'),
(5, 8, 5, 'زى الفل', 5, '2021-08-25 14:41:16', '2021-08-25 14:41:16'),
(6, 8, 1, 'قاعة ممتازة واسعار جميلة', 3, '2021-08-25 19:02:06', '2021-08-25 19:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'مدير النظام', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(2, 'موظف', 'admin-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(3, 'عميل', 'client-web', '2021-08-23 01:40:49', '2021-08-23 01:40:49'),
(4, 'زبون', 'web', '2021-08-23 01:40:49', '2021-08-23 01:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(8, 3),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(11, 2),
(11, 4),
(12, 1),
(12, 2),
(12, 4),
(13, 1),
(13, 2),
(13, 4),
(14, 1),
(14, 2),
(14, 4),
(15, 1),
(15, 2),
(15, 4),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `governorate_id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `services` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interval_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_number` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `dept_id`, `governorate_id`, `address`, `services`, `price`, `interval_id`, `client_id`, `count`, `available_number`, `description`, `created_at`, `updated_at`) VALUES
(1, 'قاعة الماسة', 4, 2, 'المنصورة المشاية خلف بنزينة توتال', 'خدمات متنوعة\r\nفطار\r\nغدا\r\nعشا', '2000', 3, 3, '100', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dolorem dolorum                                         eligendi esse exercitationem maxime modi quibusdam repudiandae sequi?                                         Consectetur consequatur consequuntur culpa ducimus earum error mollitia neque                                         rerum sit.                                     Debitis delectus enim illum magnam maxime modi quia quod similique? Adipisci                                         culpa distinctio eligendi, expedita fugiat ipsum iure, officia pariatur quis,                                         repudiandae ullam voluptates voluptatum. Aliquam commodi iusto minima omnis!                                     Alias, debitis deserunt dignissimos et hic illo ipsam libero, magni mollitia                                         natus nisi, quae voluptatem! Accusamus adipisci architecto corporis dolore enim                                         explicabo reiciendis temporibus vero! Expedita neque quaerat quidem temporibus?                                     ', '2021-08-21 01:42:02', '2021-08-23 21:48:24'),
(2, 'قاعة اللؤلؤة', 4, 4, 'سيدى بشر على البحر', 'خدمات متنوعة\r\nفطار\r\nغدا\r\nعشا', '1000', 3, 1, '40', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dolorem dolorum                                         eligendi esse exercitationem maxime modi quibusdam repudiandae sequi?                                         Consectetur consequatur consequuntur culpa ducimus earum error mollitia neque                                         rerum sit.                                     Debitis delectus enim illum magnam maxime modi quia quod similique? Adipisci                                         culpa distinctio eligendi, expedita fugiat ipsum iure, officia pariatur quis,                                         repudiandae ullam voluptates voluptatum. Aliquam commodi iusto minima omnis!                                     Alias, debitis deserunt dignissimos et hic illo ipsam libero, magni mollitia                                         natus nisi, quae voluptatem! Accusamus adipisci architecto corporis dolore enim                                         explicabo reiciendis temporibus vero! Expedita neque quaerat quidem temporibus?                                     ', '2021-08-22 04:15:50', '2021-08-23 13:22:43'),
(3, 'قاعة مارينا 4', 4, 2, 'المنصورة المشاية خلف بنزينة توتال', 'خدمات متنوعة\r\nفطار\r\nغدا\r\nعشا', '4000', 3, 1, '100', 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dolorem dolorum                                         eligendi esse exercitationem maxime modi quibusdam repudiandae sequi?                                         Consectetur consequatur consequuntur culpa ducimus earum error mollitia neque                                         rerum sit.                                     Debitis delectus enim illum magnam maxime modi quia quod similique? Adipisci                                         culpa distinctio eligendi, expedita fugiat ipsum iure, officia pariatur quis,                                         repudiandae ullam voluptates voluptatum. Aliquam commodi iusto minima omnis!                                     Alias, debitis deserunt dignissimos et hic illo ipsam libero, magni mollitia                                         natus nisi, quae voluptatem! Accusamus adipisci architecto corporis dolore enim                                         explicabo reiciendis temporibus vero! Expedita neque quaerat quidem temporibus?                                     ', '2021-08-23 04:16:45', '2021-08-23 13:22:45'),
(4, 'قاعة المجد', 4, 1, 'القاهرة شارع المعز', 'خدمات كثيرة', '1000', 2, 2, '30', 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dolorem dolorum                                         eligendi esse exercitationem maxime modi quibusdam repudiandae sequi?                                         Consectetur consequatur consequuntur culpa ducimus earum error mollitia neque                                         rerum sit.                                     Debitis delectus enim illum magnam maxime modi quia quod similique? Adipisci                                         culpa distinctio eligendi, expedita fugiat ipsum iure, officia pariatur quis,                                         repudiandae ullam voluptates voluptatum. Aliquam commodi iusto minima omnis!                                     Alias, debitis deserunt dignissimos et hic illo ipsam libero, magni mollitia                                         natus nisi, quae voluptatem! Accusamus adipisci architecto corporis dolore enim                                         explicabo reiciendis temporibus vero! Expedita neque quaerat quidem temporibus?                                     ', '2021-08-24 13:27:38', '2021-08-23 13:27:38'),
(5, 'سيارة دايو لانوس 2009', 1, 2, 'القاهرة شارع المعز', 'فابريكة', '1000', 3, 5, '4', 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dolorem dolorum                                         eligendi esse exercitationem maxime modi quibusdam repudiandae sequi?                                         Consectetur consequatur consequuntur culpa ducimus earum error mollitia neque                                         rerum sit.                                     Debitis delectus enim illum magnam maxime modi quia quod similique? Adipisci                                         culpa distinctio eligendi, expedita fugiat ipsum iure, officia pariatur quis,                                         repudiandae ullam voluptates voluptatum. Aliquam commodi iusto minima omnis!                                     Alias, debitis deserunt dignissimos et hic illo ipsam libero, magni mollitia                                         natus nisi, quae voluptatem! Accusamus adipisci architecto corporis dolore enim                                         explicabo reiciendis temporibus vero! Expedita neque quaerat quidem temporibus?                                     ', '2021-08-18 18:32:58', '2021-08-23 18:32:58'),
(6, 'كوافير حريمى ورده', 3, 1, 'القاهرة شارع المعز', 'سيشوار - مكياج كامل - ميكب ارتيست', '500', 1, 1, '1', 10, 'كوافير حريمى ورده\r\nيوفر لكم احدث صيحات الموضه \r\nكوافير ورده للمحجبات\r\nمواعيد العمل من السبت الي الجمعه 12 ص ل10 م\r\nيوجد عمل البروتين بجميع انواعه والبوتكس للشعر المجهد او المجعد\r\nيوجد جميع انواع فرد الشعر\r\nيوجد احدث انواع الصبغه وعلي الموضه\r\nوالميش والهاي لايت\r\nيوجد متخصصه لعمل احدث موضات للحنه بجميع انواعها والتاتوه يوجد متخصصه لسويت', '2021-08-25 03:14:03', '2021-08-25 03:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `unit_images`
--

CREATE TABLE `unit_images` (
  `id` int(11) NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `unit_image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_images`
--

INSERT INTO `unit_images` (`id`, `unit_id`, `unit_image`, `created_at`, `updated_at`) VALUES
(8, 1, 'uploads/units/1/1.jpg', '2021-08-23 21:48:24', '2021-08-23 21:48:24'),
(9, 1, 'uploads/units/1/2.jpg', '2021-08-23 21:48:24', '2021-08-23 21:48:24'),
(10, 1, 'uploads/units/1/3.jpg', '2021-08-23 21:48:24', '2021-08-23 21:48:24'),
(11, 2, 'uploads/units/2/4.jpg', '2021-08-23 21:49:28', '2021-08-23 21:49:28'),
(12, 2, 'uploads/units/2/5.jpg', '2021-08-23 21:49:28', '2021-08-23 21:49:28'),
(13, 2, 'uploads/units/2/6.jpg', '2021-08-23 21:49:28', '2021-08-23 21:49:28'),
(14, 3, 'uploads/units/3/7.jpg', '2021-08-23 21:49:52', '2021-08-23 21:49:52'),
(15, 3, 'uploads/units/3/8.jpg', '2021-08-23 21:49:52', '2021-08-23 21:49:52'),
(16, 3, 'uploads/units/3/9.jpg', '2021-08-23 21:49:52', '2021-08-23 21:49:52'),
(17, 4, 'uploads/units/4/10.jpg', '2021-08-23 21:50:00', '2021-08-23 21:50:00'),
(18, 4, 'uploads/units/4/11.jpg', '2021-08-23 21:50:00', '2021-08-23 21:50:00'),
(19, 4, 'uploads/units/4/12.jpg', '2021-08-23 21:50:00', '2021-08-23 21:50:00'),
(20, 5, 'uploads/units/5/a.jpg', '2021-08-23 21:50:21', '2021-08-23 21:50:21'),
(21, 5, 'uploads/units/5/b.jpg', '2021-08-23 21:50:21', '2021-08-23 21:50:21'),
(22, 5, 'uploads/units/5/c.jpg', '2021-08-23 21:50:21', '2021-08-23 21:50:21'),
(23, 6, 'uploads/units/6/199930_jjjjjjjjjjjjjjjjjjjjjjjjjjjj.png', '2021-08-25 03:14:03', '2021-08-25 03:14:03'),
(24, 6, 'uploads/units/6/article_original_1859_2011284_424914155-425x323.jpg', '2021-08-25 03:14:03', '2021-08-25 03:14:03'),
(25, 6, 'uploads/units/6/hqdefault.jpg', '2021-08-25 03:14:03', '2021-08-25 03:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_api_token_unique` (`api_token`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`);

--
-- Indexes for table `admin_profiles`
--
ALTER TABLE `admin_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_profiles_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_customer_id_foreign` (`customer_id`),
  ADD KEY `bookings_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`),
  ADD UNIQUE KEY `clients_api_token_unique` (`api_token`);

--
-- Indexes for table `client_profiles`
--
ALTER TABLE `client_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_profiles_client_id_foreign` (`client_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_api_token_unique` (`api_token`);

--
-- Indexes for table `customer_profiles`
--
ALTER TABLE `customer_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_profiles_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `depts`
--
ALTER TABLE `depts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_customer_id_foreign` (`customer_id`),
  ADD KEY `favorites_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `governorates`
--
ALTER TABLE `governorates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intervals`
--
ALTER TABLE `intervals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id_9` (`client_id`),
  ADD KEY `customer_id_9` (`customer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id_8` (`unit_id`),
  ADD KEY `customer_id_8` (`customer_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_customer_id_foreign` (`customer_id`),
  ADD KEY `reviews_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `units_dept_id_foreign` (`dept_id`),
  ADD KEY `units_governorate_id_foreign` (`governorate_id`),
  ADD KEY `units_interval_id_foreign` (`interval_id`),
  ADD KEY `units_client_id_foreign` (`client_id`);

--
-- Indexes for table `unit_images`
--
ALTER TABLE `unit_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id_6` (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_profiles`
--
ALTER TABLE `admin_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `client_profiles`
--
ALTER TABLE `client_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_profiles`
--
ALTER TABLE `customer_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `depts`
--
ALTER TABLE `depts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `governorates`
--
ALTER TABLE `governorates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `intervals`
--
ALTER TABLE `intervals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unit_images`
--
ALTER TABLE `unit_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_profiles`
--
ALTER TABLE `admin_profiles`
  ADD CONSTRAINT `admin_profiles_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_profiles`
--
ALTER TABLE `client_profiles`
  ADD CONSTRAINT `client_profiles_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_profiles`
--
ALTER TABLE `customer_profiles`
  ADD CONSTRAINT `customer_profiles_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `client_id_9` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_id_9` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `customer_id_8` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `unit_id_8` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `units_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `depts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `units_governorate_id_foreign` FOREIGN KEY (`governorate_id`) REFERENCES `governorates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `units_interval_id_foreign` FOREIGN KEY (`interval_id`) REFERENCES `intervals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit_images`
--
ALTER TABLE `unit_images`
  ADD CONSTRAINT `unit_id_6` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
