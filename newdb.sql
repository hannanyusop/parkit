-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 16, 2020 at 03:01 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smkal`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'default', 'created', 1, 'App\\Domains\\Announcement\\Models\\Announcement', NULL, NULL, '{\"attributes\": {\"area\": null, \"type\": \"info\", \"enabled\": true, \"ends_at\": null, \"message\": \"This is a <strong>Global</strong> announcement that will show on both the frontend and backend. <em>See <strong>AnnouncementSeeder</strong> for more usage examples.</em>\", \"starts_at\": null}}', '2020-08-03 15:40:00', '2020-08-03 15:40:00'),
(2, 'user', 'TS. HANNAN YUSOP updated user AFIDA with roles: None and permissions: President Koperasi', 4, 'App\\Domains\\Auth\\Models\\User', 1, 'App\\Domains\\Auth\\Models\\User', '{\"user\": {\"name\": \"AFIDA\", \"type\": \"user\", \"email\": \"nan_s96@yahoo.com\"}, \"roles\": \"None\", \"permissions\": \"President Koperasi\"}', '2020-08-08 08:00:32', '2020-08-08 08:00:32'),
(3, 'user', 'TS. HANNAN YUSOP updated user JAMBIN with roles: None and permissions: Covid-19 Checkin Guard', 5, 'App\\Domains\\Auth\\Models\\User', 1, 'App\\Domains\\Auth\\Models\\User', '{\"user\": {\"name\": \"JAMBIN\", \"type\": \"user\", \"email\": \"guar@guard.com\"}, \"roles\": \"None\", \"permissions\": \"Covid-19 Checkin Guard\"}', '2020-08-08 08:01:32', '2020-08-08 08:01:32'),
(4, 'user', 'TS. HANNAN YUSOP updated user AFIDA with roles: None and permissions: President Koperasi, Poll Participant', 4, 'App\\Domains\\Auth\\Models\\User', 1, 'App\\Domains\\Auth\\Models\\User', '{\"user\": {\"name\": \"AFIDA\", \"type\": \"user\", \"email\": \"nan_s96@yahoo.com\"}, \"roles\": \"None\", \"permissions\": \"President Koperasi, Poll Participant\"}', '2020-08-08 08:11:19', '2020-08-08 08:11:19'),
(5, 'user', 'TS. HANNAN YUSOP updated user AFIDA with roles: None and permissions: President Koperasi, Poll Module, Covid-19 Checkin Module', 4, 'App\\Domains\\Auth\\Models\\User', 1, 'App\\Domains\\Auth\\Models\\User', '{\"user\": {\"name\": \"AFIDA\", \"type\": \"user\", \"email\": \"nan_s96@yahoo.com\"}, \"roles\": \"None\", \"permissions\": \"President Koperasi, Poll Module, Covid-19 Checkin Module\"}', '2020-08-08 08:14:11', '2020-08-08 08:14:11'),
(6, 'user', 'TS. HANNAN YUSOP updated user JAMBIN with roles: None and permissions: Covid-19 Checkin Guard, Covid-19 Checkin Module', 5, 'App\\Domains\\Auth\\Models\\User', 1, 'App\\Domains\\Auth\\Models\\User', '{\"user\": {\"name\": \"JAMBIN\", \"type\": \"user\", \"email\": \"guar@guard.com\"}, \"roles\": \"None\", \"permissions\": \"Covid-19 Checkin Guard, Covid-19 Checkin Module\"}', '2020-08-08 08:14:52', '2020-08-08 08:14:52'),
(7, 'user', 'TS. HANNAN YUSOP updated user LUQMAN YUSOP with roles: None and permissions: Poll Module, Covid-19 Checkin Module', 3, 'App\\Domains\\Auth\\Models\\User', 1, 'App\\Domains\\Auth\\Models\\User', '{\"user\": {\"name\": \"LUQMAN YUSOP\", \"type\": \"user\", \"email\": \"hannan135589@gmail.com\"}, \"roles\": \"None\", \"permissions\": \"Poll Module, Covid-19 Checkin Module\"}', '2020-08-08 08:15:24', '2020-08-08 08:15:24'),
(8, 'user', 'TS. HANNAN YUSOP updated user SAFWAN YUSOP with roles: None and permissions: Poll Module, Covid-19 Checkin Module', 2, 'App\\Domains\\Auth\\Models\\User', 1, 'App\\Domains\\Auth\\Models\\User', '{\"user\": {\"name\": \"SAFWAN YUSOP\", \"type\": \"user\", \"email\": \"user@user.com\"}, \"roles\": \"None\", \"permissions\": \"Poll Module, Covid-19 Checkin Module\"}', '2020-08-08 08:15:48', '2020-08-08 08:15:48'),
(9, 'user', 'TS. HANNAN YUSOP updated user SAFWAN YUSOP with roles: None and permissions: President Koperasi, Covid-19 Checkin Guard, Poll Module, Covid-19 Checkin Module', 2, 'App\\Domains\\Auth\\Models\\User', 1, 'App\\Domains\\Auth\\Models\\User', '{\"user\": {\"name\": \"SAFWAN YUSOP\", \"type\": \"user\", \"email\": \"user@user.com\"}, \"roles\": \"None\", \"permissions\": \"President Koperasi, Covid-19 Checkin Guard, Poll Module, Covid-19 Checkin Module\"}', '2020-08-08 15:09:31', '2020-08-08 15:09:31');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area` enum('frontend','backend') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('info','danger','warning','success') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'info',
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `starts_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `area`, `type`, `message`, `enabled`, `starts_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'info', 'This is a <strong>Global</strong> announcement that will show on both the frontend and backend. <em>See <strong>AnnouncementSeeder</strong> for more usage examples.</em>', 1, NULL, NULL, '2020-08-03 15:40:00', '2020-08-03 15:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(15) NOT NULL,
  `target_participation` int(11) NOT NULL DEFAULT 1,
  `default_attempt` int(11) NOT NULL DEFAULT 1,
  `open_vote` smallint(6) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `term` longtext DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `user_id`, `name`, `code`, `target_participation`, `default_attempt`, `open_vote`, `status`, `term`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 2, 'UNDIAN PARKIR AUG- DEC', 'GGHKJHJ', 43, 1, 0, 1, NULL, '2020-08-01 00:00:00', '2020-08-31 10:00:00', '2020-08-04 12:34:55', '2020-08-15 18:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_card`
--

CREATE TABLE `campaign_card` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `uc_number` varchar(50) NOT NULL,
  `is_won` smallint(6) NOT NULL DEFAULT 0,
  `prize` varchar(50) NOT NULL DEFAULT '0',
  `draw_on` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign_card`
--

INSERT INTO `campaign_card` (`id`, `campaign_id`, `user_id`, `uc_number`, `is_won`, `prize`, `draw_on`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'YGK01U1N', 0, 'CUBA LAGI', '2020-08-15 18:18:37', '2020-08-04 16:57:31', '2020-08-15 18:18:37'),
(2, 1, NULL, 'WKSHZY9V', 0, 'CUBA LAGI', NULL, '2020-08-04 16:57:31', '2020-08-05 13:16:31'),
(3, 1, 2, 'BUGTN6DD', 0, 'CUBA LAGI', '2020-08-15 18:18:28', '2020-08-04 16:57:31', '2020-08-15 18:18:28'),
(4, 1, NULL, '4Z6QPVK5', 0, 'CUBA LAGI', NULL, '2020-08-04 16:57:31', '2020-08-12 11:32:47'),
(5, 1, NULL, 'X7VSK0WU', 0, 'CUBA LAGI', NULL, '2020-08-04 16:57:31', '2020-08-05 13:16:31'),
(6, 1, NULL, 'WQMEM40J', 0, 'CUBA LAGI', NULL, '2020-08-04 16:57:31', '2020-08-06 19:06:21'),
(7, 1, NULL, 'FTP5PWX1', 0, 'CUBA LAGI', NULL, '2020-08-04 16:57:31', '2020-08-12 11:32:47'),
(8, 1, NULL, 'MQX4RS4Y', 0, 'CUBA LAGI', NULL, '2020-08-04 16:57:31', '2020-08-15 18:17:47'),
(10, 1, NULL, '2FC3XPEX', 1, 'LOT 1', NULL, '2020-08-04 17:02:46', '2020-08-05 13:16:22'),
(11, 1, 2, '7QNVYM1C', 1, 'LOT 2', '2020-08-15 18:18:18', '2020-08-04 17:03:01', '2020-08-15 18:18:18'),
(12, 1, NULL, 'ASRNOVMQ', 1, 'LOT 3', NULL, '2020-08-04 19:37:33', '2020-08-15 18:17:47'),
(13, 1, NULL, 'ZJ71WZTR', 1, 'LOT 4', NULL, '2020-08-05 12:16:06', '2020-08-05 12:16:06'),
(14, 1, 2, 'QKOHTN2C', 1, 'LOT 19', '2020-08-15 18:18:50', '2020-08-05 12:17:58', '2020-08-15 18:18:50'),
(15, 1, NULL, 'GUGA8KTA', 0, 'NO PARKING LEFT', NULL, '2020-08-05 12:19:22', '2020-08-05 12:19:22'),
(16, 1, NULL, 'WTYJSL03', 0, 'NO PARKING LEFT', NULL, '2020-08-05 12:19:22', '2020-08-15 18:17:47'),
(17, 1, 2, 'OTHVKND7', 0, 'NO PARKING LEFT', '2020-08-15 18:18:08', '2020-08-05 12:19:22', '2020-08-15 18:18:08'),
(18, 1, NULL, '5L4LROWW', 0, 'NO PARKING LEFT', NULL, '2020-08-05 12:19:22', '2020-08-12 11:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `form` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `generate_name` varchar(50) DEFAULT NULL,
  `is_active` smallint(6) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `created_by`, `form`, `name`, `user_id`, `generate_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 'al biruni', NULL, '4 AL BIRUNI', 1, '2020-08-13 14:18:01', '2020-08-13 14:18:01'),
(2, 2, 1, 'al kahawarizmi', NULL, '1 AL KAHAWARIZMI', 1, '2020-08-13 14:24:46', '2020-08-13 14:24:46'),
(3, 2, 1, 'al biruni', NULL, '1 AL BIRUNI', 1, '2020-08-13 14:25:03', '2020-08-13 14:25:03'),
(4, 2, 1, 'al arabi', NULL, '1 AL ARABI', 1, '2020-08-13 14:35:21', '2020-08-13 14:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `cv_events`
--

CREATE TABLE `cv_events` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `static_token` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `manual_token` varchar(100) DEFAULT NULL,
  `status` smallint(6) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv_events`
--

INSERT INTO `cv_events` (`id`, `name`, `static_token`, `token`, `manual_token`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'KEDATANGAN PAGI', 'ddfsdfsd', 'a7bdn7yb', '984554', 2, '2020-08-07 15:28:22', '2020-08-16 14:10:31', NULL),
(2, 'KEDATANGAN PAGI', 'z6bvpy', 'b24ertxd', '143516', 2, '2020-08-08 16:46:45', '2020-08-16 14:10:36', NULL),
(5, 'KEDATANGAN 16-08-2020', 'o5s2na', 'b8ft841k', '217246', 1, '2020-08-16 14:15:44', '2020-08-16 14:15:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cv_logs`
--

CREATE TABLE `cv_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `temperature` double(10,2) NOT NULL DEFAULT 0.00,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv_logs`
--

INSERT INTO `cv_logs` (`id`, `user_id`, `event_id`, `temperature`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 35.60, '2020-08-07 18:38:50', '2020-08-08 16:44:14'),
(2, 2, 2, 35.34, '2020-08-08 17:21:09', '2020-08-08 17:21:09');

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
-- Table structure for table `joins`
--

CREATE TABLE `joins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `attempt` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `agree` smallint(6) NOT NULL DEFAULT 0,
  `invited` smallint(6) NOT NULL DEFAULT 0,
  `approve` smallint(6) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joins`
--

INSERT INTO `joins` (`id`, `user_id`, `campaign_id`, `attempt`, `status`, `agree`, `invited`, `approve`, `created_at`, `updated_at`) VALUES
(8, 3, 1, 1, 1, 0, 1, 0, '2020-08-05 09:32:12', '2020-08-05 09:32:12'),
(9, 4, 1, 5, 1, 0, 1, 0, '2020-08-05 09:32:25', '2020-08-05 13:16:31'),
(10, 2, 1, 5, 1, 1, 0, 1, '2020-08-05 12:09:14', '2020-08-15 18:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `lib_authors`
--

CREATE TABLE `lib_authors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_authors`
--

INSERT INTO `lib_authors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AHMAD IDGHAM', '2020-08-11 19:42:52', '2020-08-11 19:42:53'),
(2, 'MUSTAPA KAMAL', '2020-08-11 21:45:00', '2020-08-11 21:45:01'),
(3, 'HANNAN', '2020-08-12 00:16:32', '2020-08-12 00:16:32'),
(4, '11', '2020-08-12 00:40:00', '2020-08-12 00:40:00'),
(5, 'HANNANSDFS', '2020-08-12 00:42:07', '2020-08-12 00:42:07'),
(6, 'VITAMIN C', '2020-08-13 00:57:47', '2020-08-13 00:57:47'),
(7, 'LEMON FLAVOR', '2020-08-13 01:00:43', '2020-08-13 01:00:43'),
(8, 'AHMAD IDGHAM 2', '2020-08-14 01:56:27', '2020-08-14 01:56:27'),
(9, 'AHMAD IDGHAM 4', '2020-08-14 02:00:03', '2020-08-14 02:00:03'),
(10, 'LUQMAN', '2020-08-14 14:02:25', '2020-08-14 14:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `lib_books`
--

CREATE TABLE `lib_books` (
  `id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `parent_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `payment_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `borrow_id` int(11) NOT NULL DEFAULT 0,
  `remark` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_books`
--

INSERT INTO `lib_books` (`id`, `parent_id`, `user_id`, `payment_id`, `status`, `borrow_id`, `remark`, `created_at`, `updated_at`) VALUES
(00000001, 1, 1, 1, 2, 8, 'testing', '2020-08-11 21:33:09', '2020-08-15 11:53:54'),
(00000002, 2, 1, 1, 1, 0, NULL, '2020-08-11 21:53:56', '2020-08-11 21:53:56'),
(00000003, 1, 1, 1, 1, 0, '', '2020-08-12 00:14:34', '2020-08-15 12:29:01'),
(00000004, 3, 1, 2, 1, 0, '', '2020-08-12 00:23:02', '2020-08-15 12:25:51'),
(00000005, 3, 1, 2, 1, 0, '', '2020-08-12 00:23:45', '2020-08-16 17:31:38'),
(00000006, 1, 2, 1, 1, 0, '', '2020-08-12 21:10:52', '2020-08-12 21:10:52'),
(00000007, 1, 2, 1, 1, 0, '', '2020-08-12 21:14:55', '2020-08-15 12:26:47'),
(00000008, 9, 2, 6, 1, 0, '', '2020-08-13 00:57:56', '2020-08-14 14:00:06'),
(00000009, 9, 2, 6, 1, 0, '', '2020-08-13 00:59:52', '2020-08-14 14:00:27'),
(00000010, 10, 2, 1, 1, 0, '', '2020-08-13 01:00:43', '2020-08-13 01:00:43'),
(00000011, 9, 2, 6, 1, 0, '', '2020-08-13 01:01:00', '2020-08-13 01:01:00'),
(00000012, 9, 2, 6, 1, 0, '', '2020-08-13 01:01:13', '2020-08-13 01:01:13'),
(00000013, 9, 2, 6, 1, 0, '', '2020-08-13 01:01:20', '2020-08-13 01:01:20'),
(00000014, 9, 2, 6, 1, 0, '', '2020-08-13 01:01:28', '2020-08-13 01:01:28'),
(00000015, 11, 2, 1, 1, 0, '', '2020-08-14 14:02:25', '2020-08-14 14:02:25'),
(00000016, 11, 2, 1, 1, 0, '', '2020-08-14 14:02:58', '2020-08-14 14:02:58'),
(00000028, 12, 2, 1, 1, 0, '', '2020-08-14 14:04:36', '2020-08-14 14:04:36'),
(00000100, 5, 1, 2, 1, 0, '', '2020-08-12 00:43:51', '2020-08-12 00:43:51'),
(00960516, 4, 1, 2, 1, 0, '', '2020-08-12 00:24:46', '2020-08-12 00:24:46'),
(00960517, 5, 1, 2, 1, 0, '', '2020-08-12 00:38:18', '2020-08-12 00:38:18'),
(00960518, 7, 1, 4, 1, 0, '', '2020-08-12 00:42:07', '2020-08-12 00:42:07'),
(00960519, 5, 1, 2, 1, 0, '', '2020-08-12 00:45:13', '2020-08-12 00:45:13'),
(00960520, 1, 1, 1, 1, 0, '', '2020-08-12 20:35:19', '2020-08-12 20:35:19'),
(00960521, 8, 1, 5, 1, 0, '', '2020-08-12 20:45:22', '2020-08-12 20:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `lib_borrows`
--

CREATE TABLE `lib_borrows` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `is_staff` int(11) NOT NULL DEFAULT 0,
  `staff_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `out_id` int(11) NOT NULL,
  `in_id` int(11) DEFAULT NULL,
  `fine_id` int(11) DEFAULT NULL,
  `borrow_date` datetime DEFAULT NULL,
  `actual_return_date` date NOT NULL,
  `return_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_borrows`
--

INSERT INTO `lib_borrows` (`id`, `book_id`, `is_staff`, `staff_id`, `student_id`, `out_id`, `in_id`, `fine_id`, `borrow_date`, `actual_return_date`, `return_date`, `created_at`, `updated_at`) VALUES
(1, 1, 0, NULL, 2, 2, 2, NULL, '2020-08-14 04:43:41', '2020-08-22', '2020-08-14 05:22:26', '2020-08-14 04:43:41', '2020-08-14 05:22:26'),
(2, 3, 0, NULL, 2, 2, 2, NULL, '2020-08-14 04:43:42', '2020-08-22', '2020-08-14 14:37:41', '2020-08-14 04:43:42', '2020-08-14 14:37:41'),
(3, 8, 0, NULL, 4, 2, 2, NULL, '2020-08-14 13:58:46', '2020-08-22', '2020-08-14 14:00:06', '2020-08-14 13:58:46', '2020-08-14 14:00:06'),
(4, 1, 0, NULL, 4, 2, 2, NULL, '2020-08-14 13:58:46', '2020-08-22', '2020-08-14 14:36:37', '2020-08-14 13:58:46', '2020-08-14 14:36:37'),
(5, 9, 0, NULL, 4, 2, 2, NULL, '2020-08-14 13:59:37', '2020-08-22', '2020-08-14 14:00:27', '2020-08-14 13:59:37', '2020-08-14 14:00:27'),
(6, 1, 0, NULL, 2, 2, 2, NULL, '2020-08-14 16:10:14', '2020-08-07', '2020-08-14 17:29:28', '2020-08-14 16:10:14', '2020-08-14 17:29:28'),
(7, 3, 0, NULL, 2, 2, 2, 1, '2020-08-14 16:10:14', '2020-08-12', '2020-08-15 12:29:01', '2020-08-14 16:10:14', '2020-08-15 12:29:01'),
(8, 1, 0, NULL, 2, 2, NULL, NULL, '2020-08-15 11:53:54', '2020-08-14', NULL, '2020-08-15 11:53:54', '2020-08-15 11:53:54'),
(9, 4, 0, NULL, 2, 2, 2, NULL, '2020-08-15 11:53:54', '2020-07-23', '2020-08-15 12:25:51', '2020-08-15 11:53:54', '2020-08-15 12:25:51'),
(10, 7, 0, NULL, 2, 2, 2, NULL, '2020-08-15 11:54:30', '2020-08-23', '2020-08-15 12:26:47', '2020-08-15 11:54:30', '2020-08-15 12:26:47'),
(11, 5, 0, NULL, 2, 2, 2, NULL, '2020-08-16 17:31:21', '2020-08-24', '2020-08-16 17:31:38', '2020-08-16 17:31:21', '2020-08-16 17:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `lib_fines`
--

CREATE TABLE `lib_fines` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `borrow_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `total_day` int(11) NOT NULL DEFAULT 0,
  `actual_rm` float(10,2) NOT NULL DEFAULT 0.00,
  `nego_rm` float(10,2) NOT NULL DEFAULT 0.00,
  `paid` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_fines`
--

INSERT INTO `lib_fines` (`id`, `staff_id`, `student_id`, `borrow_id`, `type`, `total_day`, `actual_rm`, `nego_rm`, `paid`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 7, 1, 3, 1.20, 0.00, 0, '2020-08-14 17:33:06', '2020-08-15 12:29:01'),
(2, 0, 2, 7, 1, 2, 0.40, 0.00, 0, '2020-08-14 17:33:51', '2020-08-14 17:33:51'),
(4, 2, 2, 9, 1, 23, 9.20, 0.00, 0, '2020-08-15 12:22:44', '2020-08-15 12:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `lib_g_parents`
--

CREATE TABLE `lib_g_parents` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_g_parents`
--

INSERT INTO `lib_g_parents` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, '0000', 'KARYA AM', '2020-08-11 22:40:49', '2020-08-11 22:40:50'),
(2, '100', 'FALSAFAH', '2020-08-11 22:41:32', '2020-08-11 22:41:33'),
(3, '200', 'AGAMA', '2020-08-11 22:41:45', '2020-08-11 22:41:45'),
(4, '300', 'SAINS KEMASAYARAKATAN', '2020-08-11 22:42:28', '2020-08-11 22:42:28'),
(5, '500', 'SAINS TULIN', '2020-08-11 22:42:51', '2020-08-11 22:42:51'),
(6, '600', 'TEKNOLOGI', '2020-08-11 22:43:07', '2020-08-11 22:43:07'),
(7, '700', 'KESENIAN', '2020-08-11 22:43:20', '2020-08-11 22:43:21'),
(8, '800', 'KESUSTERAAN', '2020-08-11 22:43:33', '2020-08-11 22:43:33'),
(9, '900', 'GEGRAFI, PEGEMBARAAN  BIOGRAFI DAN SEJARAH', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lib_g_subs`
--

CREATE TABLE `lib_g_subs` (
  `id` int(11) NOT NULL,
  `g_parent_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(191) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_g_subs`
--

INSERT INTO `lib_g_subs` (`id`, `g_parent_id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, '010', 'Bibligafi', NULL, NULL),
(2, 1, '020', 'SAINS PERPUSTAKAAN', '2020-08-11 22:46:25', '2020-08-11 22:46:26'),
(3, 1, '030', 'ENSIKLOPEDIA AM', '2020-08-11 22:46:53', '2020-08-11 22:46:53'),
(4, 1, '040', 'BELUM DITENTUKAN', '2020-08-11 22:48:17', '2020-08-11 22:48:17'),
(5, 2, '110', 'WUJUDIAH', '2020-08-11 22:48:50', '2020-08-11 22:48:51'),
(6, 2, '120', 'ILMU SEBAB TUJUAN', '2020-08-11 22:49:22', '2020-08-11 22:49:22'),
(7, 2, '130', 'PSIKOLOGI BIASA DAN GHAIB', '2020-08-11 22:50:03', '2020-08-11 22:50:04'),
(8, 3, '210', 'AGAM KETUHANAN', '2020-08-11 22:50:35', '2020-08-11 22:50:35'),
(9, 3, '220', 'KITAB INJIL (AGAMA KRISTIAN)', '2020-08-11 22:51:05', '2020-08-11 22:51:06'),
(10, 3, '230', 'ASAS AJARAN KRISTIAN', '2020-08-11 22:51:30', '2020-08-11 22:51:30'),
(11, 3, '240', 'MORAL DAN IBADAT KRISTIAN TEOLOGI MISYEN DAN DAN CATATAN ', '2020-08-11 22:51:48', '2020-08-11 22:52:17'),
(12, 4, '310', 'PERANGKAIAN, STATISTIK', '2020-08-11 22:53:06', '2020-08-11 22:53:24'),
(13, 4, '320', 'SAIN POLITIK', '2020-08-11 22:53:57', '2020-08-11 22:53:57'),
(14, 4, '330', 'EKONOMI', '2020-08-11 22:54:26', '2020-08-11 22:54:26'),
(15, 5, '410', 'LINGUISTIK', '2020-08-11 22:58:10', '2020-08-11 22:58:11'),
(16, 5, '420', 'BAHASA INGGERIS', '2020-08-11 22:58:29', '2020-08-11 22:58:30'),
(17, 5, '430', 'BAHASA JERMAN', '2020-08-11 22:58:49', '2020-08-11 22:58:50'),
(18, 5, '440', 'BAHASA PRANCIS', '2020-08-11 22:59:07', '2020-08-11 22:59:07'),
(19, 5, '450', 'BAHASA ITALI', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lib_logs`
--

CREATE TABLE `lib_logs` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `checkin` datetime NOT NULL,
  `checkout` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_logs`
--

INSERT INTO `lib_logs` (`id`, `student_id`, `checkin`, `checkout`, `created_at`, `updated_at`) VALUES
(7, 2, '2020-08-15 14:54:53', '2020-08-15 10:55:00', '2020-08-15 14:54:53', '2020-08-15 14:55:00'),
(8, 2, '2020-08-15 14:55:29', '2020-08-15 15:08:49', '2020-08-15 14:55:29', '2020-08-15 15:08:49'),
(9, 2, '2020-08-15 18:21:35', '2020-08-15 18:21:40', '2020-08-15 18:21:35', '2020-08-15 18:21:40'),
(10, 2, '2020-08-15 18:21:47', '2020-08-15 18:21:51', '2020-08-15 18:21:47', '2020-08-15 18:21:51'),
(11, 2, '2020-08-15 18:21:55', '2020-08-15 18:22:56', '2020-08-15 18:21:55', '2020-08-15 18:22:56'),
(12, 2, '2020-08-16 13:15:12', NULL, '2020-08-16 13:15:12', '2020-08-16 13:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `lib_options`
--

CREATE TABLE `lib_options` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `value` varchar(191) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_options`
--

INSERT INTO `lib_options` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'borrow_duration', '8', '2020-08-14 02:17:11', '2020-08-14 02:22:31'),
(2, 'fine', '0.40', '2020-08-14 02:17:11', '2020-08-15 11:56:30'),
(3, 'max_student_borrow', '3', '2020-08-14 02:17:11', '2020-08-14 02:22:24'),
(4, 'can_borrow', '1', '2020-08-14 02:25:56', '2020-08-16 13:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `lib_parents`
--

CREATE TABLE `lib_parents` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `g_sub_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL DEFAULT '',
  `is_fiction` smallint(6) NOT NULL DEFAULT 1,
  `is_borrow` smallint(6) NOT NULL DEFAULT 1,
  `price` float(10,2) NOT NULL DEFAULT 0.00,
  `pages` int(11) NOT NULL DEFAULT 0,
  `remark` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_parents`
--

INSERT INTO `lib_parents` (`id`, `author_id`, `publisher_id`, `g_sub_id`, `title`, `is_fiction`, `is_borrow`, `price`, `pages`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 10, 1, 'CINTA 7 PETALA LANGIT', 1, 1, 23.20, 45, NULL, '2020-08-11 19:43:46', '2020-08-14 02:00:03', NULL),
(2, 1, 2, 6, '7 HARI MENCINTAIKU', 0, 0, 54.50, 342, NULL, '2020-08-11 21:43:40', '2020-08-11 21:43:41', NULL),
(3, 3, 3, 3, 'SUARA TAKDIR', 1, 1, 11.30, 232, '', '2020-08-12 00:23:01', '2020-08-12 00:23:01', NULL),
(4, 3, 3, 3, 'AIMAN PENGEMBALA', 1, 1, 21.11, 213, '', '2020-08-12 00:24:46', '2020-08-12 00:24:46', NULL),
(5, 1, 1, 1, 'HOW TO BE PROGRAMMER IN ONE MONTH', 1, 1, 231.00, 231, '', '2020-08-12 00:38:18', '2020-08-12 00:38:18', NULL),
(6, 4, 4, 1, 'KAMUS DEWAN EDISI 1', 1, 1, 11.00, 11, '', '2020-08-12 00:40:00', '2020-08-12 00:40:00', NULL),
(7, 5, 5, 1, 'DUNIA ANGKASA', 1, 1, 21.00, 231, '', '2020-08-12 00:42:07', '2020-08-12 00:42:07', NULL),
(8, 3, 3, 8, 'CINTA SAMPAI SYURGA', 0, 0, 103.20, 344, '', '2020-08-12 20:44:00', '2020-08-12 20:44:00', NULL),
(9, 6, 6, 1, 'HOW IT WORK', 0, 1, 1.20, 232, '', '2020-08-13 00:57:47', '2020-08-13 00:57:47', NULL),
(10, 7, 7, 3, 'PHP & HTML', 0, 0, 11.20, 231, '', '2020-08-13 01:00:43', '2020-08-13 01:00:43', NULL),
(11, 10, 1, 2, 'SOFTWARE', 1, 1, 21.50, 29, '', '2020-08-14 14:02:25', '2020-08-14 14:02:25', NULL),
(12, 1, 6, 1, 'DATA STRUC', 0, 1, 23.00, 45, '', '2020-08-14 14:04:36', '2020-08-14 14:04:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lib_payments`
--

CREATE TABLE `lib_payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `receipt_ref` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_payments`
--

INSERT INTO `lib_payments` (`id`, `user_id`, `name`, `receipt_ref`, `created_at`, `updated_at`) VALUES
(1, 1, 'PCG', NULL, '2020-08-11 21:38:10', '2020-08-11 21:38:11'),
(2, 2, 'HANNAN', NULL, '2020-08-12 00:16:32', '2020-08-12 00:16:32'),
(3, 2, '11', NULL, '2020-08-12 00:40:00', '2020-08-12 00:40:00'),
(4, 2, 'SDFDS', NULL, '2020-08-12 00:41:35', '2020-08-12 00:41:35'),
(5, 2, 'PIBG', NULL, '2020-08-12 20:44:00', '2020-08-12 20:44:00'),
(6, 2, 'WATSON', '', '2020-08-13 00:57:47', '2020-08-13 00:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `lib_publishers`
--

CREATE TABLE `lib_publishers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_publishers`
--

INSERT INTO `lib_publishers` (`id`, `name`, `address`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'Pelangi', NULL, NULL, '2020-08-11 19:41:42', '2020-08-11 19:41:43'),
(2, 'TV3', NULL, NULL, '2020-08-11 21:44:26', '2020-08-11 21:44:28'),
(3, 'HANNAN', '', '', '2020-08-12 00:16:32', '2020-08-12 00:16:32'),
(4, '11', '', '', '2020-08-12 00:40:00', '2020-08-12 00:40:00'),
(5, 'JLKJL', '', '', '2020-08-12 00:42:07', '2020-08-12 00:42:07'),
(6, 'GULA-GULA', '', '', '2020-08-13 00:57:47', '2020-08-13 00:57:47'),
(7, 'GUARDIAN', '', '', '2020-08-13 01:00:43', '2020-08-13 01:00:43'),
(8, 'PELANGI 2', '', '', '2020-08-14 01:56:41', '2020-08-14 01:56:41'),
(9, 'PELANGI 3', '', '', '2020-08-14 01:57:59', '2020-08-14 01:57:59'),
(10, 'PELANGI 4', '', '', '2020-08-14 01:59:57', '2020-08-14 01:59:57');

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
(4, '2020_02_25_034148_create_permission_tables', 1),
(5, '2020_04_02_000000_create_two_factor_authentications_table', 1),
(6, '2020_05_25_021239_create_announcements_table', 1),
(7, '2020_05_29_020244_create_password_histories_table', 1),
(8, '2020_07_06_215139_create_activity_log_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(8, 'App\\Domains\\Auth\\Models\\User', 2),
(8, 'App\\Domains\\Auth\\Models\\User', 4),
(9, 'App\\Domains\\Auth\\Models\\User', 2),
(9, 'App\\Domains\\Auth\\Models\\User', 5),
(10, 'App\\Domains\\Auth\\Models\\User', 2),
(10, 'App\\Domains\\Auth\\Models\\User', 3),
(10, 'App\\Domains\\Auth\\Models\\User', 4),
(11, 'App\\Domains\\Auth\\Models\\User', 2),
(11, 'App\\Domains\\Auth\\Models\\User', 3),
(11, 'App\\Domains\\Auth\\Models\\User', 4),
(11, 'App\\Domains\\Auth\\Models\\User', 5),
(11, 'App\\Domains\\Auth\\Models\\User', 7);

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
(1, 'App\\Domains\\Auth\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_histories`
--

CREATE TABLE `password_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_histories`
--

INSERT INTO `password_histories` (`id`, `model_type`, `model_id`, `password`, `created_at`, `updated_at`) VALUES
(1, 'App\\Domains\\Auth\\Models\\User', 1, '$2y$10$641/haE9ale1pRynBLpbZepqcVgsTnzsrRvRBZgVYQnC2CAI3x3Y.', '2020-08-03 15:40:00', '2020-08-03 15:40:00'),
(2, 'App\\Domains\\Auth\\Models\\User', 2, '$2y$10$w3SzJaUdeCfdJfUb63rMKux9uI6J5uA1uBcCuR6kg9kFWBh80N0Ru', '2020-08-03 15:40:00', '2020-08-03 15:40:00');

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
  `type` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sort` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `type`, `guard_name`, `name`, `description`, `parent_id`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', 'admin.access.user', 'All User Permissions', NULL, 1, '2020-08-03 15:40:00', '2020-08-03 15:40:00'),
(2, 'admin', 'web', 'admin.access.user.list', 'View Users', 1, 1, '2020-08-03 15:40:00', '2020-08-03 15:40:00'),
(3, 'admin', 'web', 'admin.access.user.deactivate', 'Deactivate Users', 1, 2, '2020-08-03 15:40:00', '2020-08-03 15:40:00'),
(4, 'admin', 'web', 'admin.access.user.reactivate', 'Reactivate Users', 1, 3, '2020-08-03 15:40:00', '2020-08-03 15:40:00'),
(5, 'admin', 'web', 'admin.access.user.clear-session', 'Clear User Sessions', 1, 4, '2020-08-03 15:40:00', '2020-08-03 15:40:00'),
(6, 'admin', 'web', 'admin.access.user.impersonate', 'Impersonate Users', 1, 5, '2020-08-03 15:40:00', '2020-08-03 15:40:00'),
(7, 'admin', 'web', 'admin.access.user.change-password', 'Change User Passwords', 1, 6, '2020-08-03 15:40:00', '2020-08-03 15:40:00'),
(8, 'user', 'web', 'poll_admin', 'President Koperasi', 10, 2, '2020-08-03 15:40:00', '2020-08-03 15:40:00'),
(9, 'user', 'web', 'cv_guard', 'Covid-19 Checkin Guard', 11, 2, '2020-08-08 15:58:04', '2020-08-08 15:58:06'),
(10, 'user', 'web', 'poll_can', 'Poll Module', NULL, 1, '2020-08-08 16:08:39', '2020-08-08 16:08:41'),
(11, 'user', 'web', 'cv_can', 'Covid-19 Checkin Module', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `type`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'web', '2020-08-03 15:40:00', '2020-08-03 15:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `no_ic` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `class_id` bigint(20) DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `type` smallint(6) NOT NULL DEFAULT 1,
  `status` smallint(1) NOT NULL DEFAULT 1,
  `gender` char(1) NOT NULL DEFAULT 'M',
  `address` varchar(100) DEFAULT NULL,
  `image_url` varchar(100) DEFAULT 'img/student/default.png',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `no_ic`, `dob`, `class_id`, `name`, `type`, `status`, `gender`, `address`, `image_url`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2020-08-13', 1, 'FARINA BIN ABDULLAH SANI', 1, 1, '1', '1111111', '1', '2120-08-13 04:04:02', '2010-08-13 04:04:02'),
(2, '2', '960516135589', '1996-05-16', 1, 'ABDUL HANNAN BIN HJ YUSOP', 2, 1, 'M', NULL, 'img/student/default.png', '2020-08-13 12:15:29', '2020-08-13 14:52:58'),
(3, '2', '960516135588', '1996-05-16', NULL, 'AMINAH ROSLI', 1, 1, 'F', '', 'img/student/default.png', '2020-08-13 12:40:50', '2020-08-13 12:40:50'),
(4, '2', '000831131619', '2000-08-31', 1, 'ABDILLAH SAFWAN BIN YUSOP', 2, 1, 'M', '', 'img/student/default.png', '2020-08-14 13:55:41', '2020-08-14 13:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(11) NOT NULL,
  `uga_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `temperature` float(10,2) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `uga_id`, `student_id`, `status`, `temperature`, `remark`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, NULL, NULL, '2020-08-16 18:56:37', '2020-08-16 18:56:37'),
(2, 2, 2, 2, 36.30, NULL, '2020-08-16 18:56:37', '2020-08-16 20:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `student_has_class`
--

CREATE TABLE `student_has_class` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_has_class`
--

INSERT INTO `student_has_class` (`id`, `student_id`, `class_id`, `year`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2020, '2020-08-13 14:52:25', '2020-08-13 14:53:47'),
(2, 4, 1, 2020, '2020-08-14 13:55:41', '2020-08-14 13:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `two_factor_authentications`
--

CREATE TABLE `two_factor_authentications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `authenticatable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authenticatable_id` bigint(20) UNSIGNED NOT NULL,
  `shared_secret` blob NOT NULL,
  `enabled_at` timestamp NULL DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `digits` tinyint(3) UNSIGNED NOT NULL DEFAULT 6,
  `seconds` tinyint(3) UNSIGNED NOT NULL DEFAULT 30,
  `window` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `algorithm` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sha1',
  `recovery_codes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ;

--
-- Dumping data for table `two_factor_authentications`
--

INSERT INTO `two_factor_authentications` (`id`, `authenticatable_type`, `authenticatable_id`, `shared_secret`, `enabled_at`, `label`, `digits`, `seconds`, `window`, `algorithm`, `recovery_codes`, `recovery_codes_generated_at`, `safe_devices`, `created_at`, `updated_at`) VALUES
(1, 'App\\Domains\\Auth\\Models\\User', 1, 0x7b6feb9c1838ff2abe402b7598021c20e73d973c, NULL, 'admin@admin.com', 6, 30, 1, 'sha1', NULL, NULL, NULL, '2020-08-03 15:52:16', '2020-08-03 15:54:23'),
(2, 'App\\Domains\\Auth\\Models\\User', 2, 0xad107f30754919b6b45ca7d4d762666731af66b8, NULL, 'user@user.com', 6, 30, 1, 'sha1', NULL, NULL, NULL, '2020-08-04 10:33:44', '2020-08-07 14:14:40'),
(3, 'App\\Domains\\Auth\\Models\\User', 4, 0x0d94959428f5c1b37ec5c95de003165f68e16c2a, NULL, 'nan_s96@yahoo.com', 6, 30, 1, 'sha1', NULL, NULL, NULL, '2020-08-05 09:49:46', '2020-08-05 09:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_changed_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_be_logged_out` tinyint(1) NOT NULL DEFAULT 0,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `unique_id`, `email`, `email_verified_at`, `password`, `password_changed_at`, `active`, `timezone`, `last_login_at`, `last_login_ip`, `to_be_logged_out`, `provider`, `provider_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'TS. HANNAN YUSOP', '111111111', 'admin@admin.com', '2020-08-03 15:40:00', '$2y$10$641/haE9ale1pRynBLpbZepqcVgsTnzsrRvRBZgVYQnC2CAI3x3Y.', NULL, 1, 'America/New_York', '2020-08-08 18:09:32', '127.0.0.1', 0, NULL, NULL, 'xrPkbRCKpiS3iYRrKG2HkRJdeicm9wVTgQFMOfGqFlvFQZmn8xfc1edSmFOh', '2020-08-03 15:40:00', '2020-08-08 18:09:32', NULL),
(2, 'user', 'SAFWAN YUSOP', '222222222', 'user@user.com', '2020-08-03 15:40:00', '$2y$10$w3SzJaUdeCfdJfUb63rMKux9uI6J5uA1uBcCuR6kg9kFWBh80N0Ru', NULL, 1, 'America/New_York', '2020-08-15 10:40:56', '192.168.64.1', 0, NULL, NULL, 'p0adZxcXSFXBXPWDJZEgUK5mqYwUvCMggmBMqDrXNa5FtksZyekJgr0X8BMB', '2020-08-03 15:40:00', '2020-08-15 10:40:56', NULL),
(3, 'user', 'LUQMAN YUSOP', '123421432', 'staff@staff.com', NULL, '$2y$10$dEcaV2L9n79piQP0eGvFKeJEPCu4ir4NJhNVwBzPJFz9Wuve/d/BO', NULL, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2020-08-05 08:07:12', '2020-08-05 08:07:12', NULL),
(4, 'user', 'AFIDA', '960516135589', 'cop@cop.com', '2020-08-05 16:41:46', '$2y$10$k8wE14v2WhWGE1QFqVwo7uLcxyL5YcZJzwtnpODFR14oBmgaSrcWK', NULL, 1, 'America/New_York', '2020-08-08 18:11:44', '127.0.0.1', 0, NULL, NULL, 'zjgWcTeqgfq4zIykLUzlMFjJ0wkpIi8IPneOW5DYkWa4LwQxqf1NViOhHRlr', '2020-08-05 08:16:56', '2020-08-08 18:12:01', NULL),
(5, 'user', 'JAMBIN', '2384092jh', 'guar@guard.com', '2020-08-06 19:56:49', '$2y$10$641/haE9ale1pRynBLpbZepqcVgsTnzsrRvRBZgVYQnC2CAI3x3Y.', NULL, 1, 'America/New_York', '2020-08-08 09:56:16', '127.0.0.1', 0, NULL, NULL, NULL, '2020-08-06 19:56:50', '2020-08-08 09:56:16', NULL),
(6, 'user', 'tes paaa', '123456781212', 'hannan135589@gmail.com', '2020-08-08 18:05:28', '$2y$10$Y5wzXgL7PDEb36B3RyMjz.m8t/P./ISh5SepCAfDn30QqF4P8QZJC', '2020-08-09 06:45:42', 1, 'America/New_York', '2020-08-09 06:53:16', '127.0.0.1', 0, NULL, NULL, 'VL2o5bEWPQJjmypy77OCUdwD4096FkgAjO9pbEo8VdkspYUyx15XNXBD5D5L', '2020-08-08 18:05:28', '2020-08-09 06:53:16', NULL),
(7, 'user', 'LOMAN', '492372793676', 'nan_s96@yahoo.coma', '2020-08-09 06:55:03', '$2y$10$ZdMrXEdElcB7xRj3y.YEwurP5kNu6qGUfsM7Mqmeh/fjmExa.tUJW', NULL, 1, 'America/New_York', NULL, NULL, 0, NULL, NULL, NULL, '2020-08-09 06:55:03', '2020-08-09 06:55:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_generate_attendance`
--

CREATE TABLE `user_generate_attendance` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_generate_attendance`
--

INSERT INTO `user_generate_attendance` (`id`, `class_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, '2020-08-16 18:56:37', '2020-08-16 18:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_class`
--

CREATE TABLE `user_has_class` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_class`
--

INSERT INTO `user_has_class` (`id`, `user_id`, `class_id`, `year`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2020, '2020-08-24 00:00:00', '2020-08-18 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `campaign_card`
--
ALTER TABLE `campaign_card`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_number` (`uc_number`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genrate_name` (`generate_name`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `cv_events`
--
ALTER TABLE `cv_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv_logs`
--
ALTER TABLE `cv_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joins`
--
ALTER TABLE `joins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_authors`
--
ALTER TABLE `lib_authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_books`
--
ALTER TABLE `lib_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_borrows`
--
ALTER TABLE `lib_borrows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_fines`
--
ALTER TABLE `lib_fines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_g_parents`
--
ALTER TABLE `lib_g_parents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `lib_g_subs`
--
ALTER TABLE `lib_g_subs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `lib_logs`
--
ALTER TABLE `lib_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_options`
--
ALTER TABLE `lib_options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `lib_parents`
--
ALTER TABLE `lib_parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_payments`
--
ALTER TABLE `lib_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_publishers`
--
ALTER TABLE `lib_publishers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_histories`
--
ALTER TABLE `password_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_parent_id_foreign` (`parent_id`);

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_ic` (`no_ic`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_has_class`
--
ALTER TABLE `student_has_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_generate_attendance`
--
ALTER TABLE `user_generate_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_has_class`
--
ALTER TABLE `user_has_class`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campaign_card`
--
ALTER TABLE `campaign_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cv_events`
--
ALTER TABLE `cv_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cv_logs`
--
ALTER TABLE `cv_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `joins`
--
ALTER TABLE `joins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lib_authors`
--
ALTER TABLE `lib_authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lib_books`
--
ALTER TABLE `lib_books`
  MODIFY `id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=960522;

--
-- AUTO_INCREMENT for table `lib_borrows`
--
ALTER TABLE `lib_borrows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lib_fines`
--
ALTER TABLE `lib_fines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lib_g_parents`
--
ALTER TABLE `lib_g_parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lib_g_subs`
--
ALTER TABLE `lib_g_subs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lib_logs`
--
ALTER TABLE `lib_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lib_options`
--
ALTER TABLE `lib_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lib_parents`
--
ALTER TABLE `lib_parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lib_payments`
--
ALTER TABLE `lib_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lib_publishers`
--
ALTER TABLE `lib_publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `password_histories`
--
ALTER TABLE `password_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_has_class`
--
ALTER TABLE `student_has_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `two_factor_authentications`
--
ALTER TABLE `two_factor_authentications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_generate_attendance`
--
ALTER TABLE `user_generate_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_has_class`
--
ALTER TABLE `user_has_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
