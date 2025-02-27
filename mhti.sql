-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 10:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhti`
--

-- --------------------------------------------------------

--
-- Table structure for table `absents`
--

CREATE TABLE `absents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` text DEFAULT NULL,
  `classroom_id` text DEFAULT NULL,
  `student_id` text DEFAULT NULL,
  `remark` longtext DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `absent_classrooms`
--

CREATE TABLE `absent_classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `absent_id` text DEFAULT NULL,
  `classroom_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absent_classrooms`
--

INSERT INTO `absent_classrooms` (`id`, `absent_id`, `classroom_id`, `created_at`, `updated_at`) VALUES
(1, '5', '3', '2023-09-11 10:35:22', '2023-09-11 10:35:22'),
(2, '5', '5', '2023-09-11 10:35:22', '2023-09-11 10:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `times` text DEFAULT NULL,
  `degree_id` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `name`, `times`, `degree_id`, `remarks`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(7, '01/24', NULL, NULL, NULL, '1', '2023-12-06 04:38:47', '2023-12-06 04:38:47'),
(8, '02/24', NULL, NULL, NULL, '1', '2023-12-24 14:57:45', '2023-12-24 14:57:45'),
(9, '03/24', NULL, NULL, 'Lorem', '1', '2024-01-11 05:29:15', '2024-01-11 05:29:26');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `student_id` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `limit_user` varchar(255) DEFAULT '10',
  `created_by` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `student_id`, `status`, `limit_user`, `created_by`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$G8MQVjnM0YAIPE4Cx2FebeSi2tOT6ieht4kRkTyrCcroSMVjg1BFi', NULL, '1', '10', NULL, NULL, NULL, NULL, '2023-08-20 22:19:00', '2023-09-04 23:20:19'),
(16, 'MMcities', 'mmcities@gmail.com', NULL, '$2y$10$/NGHsV37p2UAP5rUS.kIRuHwbb885pMw8Uq5Lu/MFyQtEuhRfGNv2', NULL, '1', '10', '1', NULL, NULL, NULL, '2023-09-04 02:18:45', '2023-09-04 02:48:55'),
(21, 'Teacher', 'teacher@gmail.com', NULL, '$2y$10$VD5F/.TeaU/x0K2yX7I4BunM4IRkIVpPPKNVLY0J5O8pagzNCrtny', NULL, '1', '10', NULL, NULL, NULL, NULL, '2024-01-11 05:17:24', '2024-01-11 05:20:23'),
(22, 'FrontStaff', 'frontstaff@gmail.com', NULL, '$2y$10$DbCfYXMsnJhJD8HpzW8WReWhMyvBbom4tnXP4EQpIiU4G0PcZfmoO', NULL, '1', '10', '1', NULL, NULL, NULL, '2024-02-26 08:54:05', '2024-02-26 08:54:05'),
(23, 'Office Manager', 'officemanager@gmail.com', NULL, '$2y$10$77bJi1DW6w5NPE9xxNSZtukkzLFadYAfxLx.lvB0CLRr/rkuaAyxm', NULL, '1', '10', '1', NULL, NULL, NULL, '2024-02-26 09:23:17', '2024-02-26 09:23:17'),
(24, 'Director', 'director@gmail.com', NULL, '$2y$10$sX2a.BHzNtSIJvEYeV4MHOpyY/RO4mEicdEMT3i//hDpjiO9NNEnK', NULL, '1', '10', '1', NULL, NULL, NULL, '2024-02-26 09:24:10', '2024-02-26 09:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `photo`, `description`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(1, 'Trip to Korea', '1693233746_beach.jpg', 'Remember to check for any travel advisories or restrictions, especially considering the global situation or any specific regulations related to the ongoing COVID-19 pandemic. Airlines, airports, and countries may have specific guidelines and requirements that you need to follow during your journey.\r\n\r\nIt\'s important to refer to official sources like airline websites, government travel advisories, and relevant embassy/consulate websites for the most accurate and up-to-date information related to your trip to Korea.', '1', '2023-08-29 03:44:52', '2023-08-28 08:12:26'),
(3, 'Mandalay', '1693233124_mandalay.jpg', 'Myanmar, also known as Burma, is a country located in Southeast Asia. It is bordered by Bangladesh to the northwest, China to the northeast, Laos to the east, Thailand to the south, and the Andaman Sea and the Bay of Bengal to the west. Its capital city is Naypyidaw, and its largest city is Yangon (also known as Rangoon). Please note that political and geographical information can change over time, so it\'s always a good idea to refer to up-to-date sources for the most current information.', '1', '2023-08-29 04:02:04', '2023-08-28 08:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_comments`
--

CREATE TABLE `announcement_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` text DEFAULT NULL,
  `announcement_id` text DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_lists`
--

CREATE TABLE `attendance_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` text DEFAULT NULL,
  `classroom_id` text DEFAULT NULL,
  `student_id` text DEFAULT NULL,
  `academic_year_id` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `remark` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academic_year_id` text DEFAULT NULL,
  `academic_year_name` text DEFAULT NULL,
  `batch` text DEFAULT NULL,
  `student_qty` text DEFAULT NULL,
  `enrolled_student` text DEFAULT NULL,
  `room_id` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `duration` text DEFAULT NULL,
  `start_date` text DEFAULT NULL,
  `end_date` text DEFAULT NULL,
  `degree_id` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `academic_year_id`, `academic_year_name`, `batch`, `student_qty`, `enrolled_student`, `room_id`, `time`, `duration`, `start_date`, `end_date`, `degree_id`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(2, '01/24', NULL, 'HM 01/24', '50', '0', NULL, NULL, NULL, NULL, NULL, 'HM', '1', '2023-12-06 05:21:17', '2023-12-06 05:22:36'),
(3, '01/24', NULL, 'FBM 01/24', NULL, '0', NULL, NULL, NULL, NULL, NULL, 'FBM', '1', '2023-12-06 05:22:58', '2023-12-06 05:22:58'),
(4, '01/24', NULL, 'Adv Cul 01/24', '50', '0', NULL, NULL, NULL, NULL, NULL, 'Adv Cul', '1', '2023-12-06 05:23:24', '2023-12-06 05:23:24'),
(5, '01/24', NULL, 'FO 01/24', '50', '0', NULL, NULL, NULL, NULL, NULL, 'FO', '1', '2023-12-06 05:23:31', '2023-12-06 05:23:31'),
(6, '01/24', NULL, 'FB 01/24', '50', '0', NULL, NULL, NULL, NULL, NULL, 'FB', '1', '2023-12-06 05:23:39', '2023-12-06 05:23:39'),
(7, '01/24', NULL, 'FBS 01/24', '50', '0', NULL, NULL, NULL, NULL, NULL, 'FBS', '1', '2023-12-06 05:23:50', '2023-12-06 05:23:50'),
(8, '01/24', NULL, 'HK 01/24', '50', '0', NULL, NULL, NULL, NULL, NULL, 'HK', '1', '2023-12-06 05:24:02', '2023-12-06 05:24:02'),
(9, '01/24', NULL, 'Cul 01/24', '50', '0', NULL, NULL, NULL, NULL, NULL, 'Cul', '1', '2023-12-06 05:24:10', '2023-12-06 05:24:10'),
(10, '01/24', NULL, 'Bak 01/24', '50', '0', NULL, NULL, NULL, NULL, NULL, 'Bak', '1', '2023-12-06 05:24:19', '2023-12-06 05:24:19'),
(11, '01/24', NULL, 'CF 01/24', '50', '0', NULL, NULL, NULL, NULL, NULL, 'CF', '1', '2023-12-06 05:24:31', '2023-12-06 05:24:31'),
(12, '01/24', NULL, 'Bar 01/24', '50', '3', NULL, NULL, NULL, NULL, NULL, 'Bar', '1', '2023-12-06 05:24:39', '2024-02-05 09:06:02'),
(22, '02/24', NULL, 'HM 02/24', '50', '5', '6', '14:19', '2 months', '2024-01-11', '2024-03-11', 'HM', '1', '2024-01-11 07:49:38', '2024-02-03 08:36:40'),
(23, '02/24', NULL, 'FBM 02/24', '50', '1', '7', '10:00', '2 months', '2024-02-01', '2024-03-31', 'FBM', '1', '2024-02-05 09:14:59', '2024-02-05 09:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Building One', '2024-01-02 16:14:51', '2024-01-02 16:14:51'),
(2, 'Building Two', '2024-01-02 16:15:03', '2024-01-02 16:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch` text DEFAULT NULL,
  `student_id` text DEFAULT NULL,
  `academic_year_id` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `batch`, `student_id`, `academic_year_id`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(7, 'Section-1', NULL, NULL, '1', '2023-12-06 04:34:17', '2023-12-06 04:34:17'),
(8, 'Section-2', NULL, NULL, '1', '2023-12-06 04:34:29', '2023-12-06 04:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `abbreviation` text DEFAULT NULL,
  `audio_file` text DEFAULT NULL,
  `academic_year_id` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `abbreviation`, `audio_file`, `academic_year_id`, `remarks`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(1, 'AA', NULL, '1692805541_제 40 과 2.m4a', '2', 're', NULL, '2023-08-23 09:15:41', '2023-08-23 09:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `course_fees`
--

CREATE TABLE `course_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` text DEFAULT NULL,
  `batch_id` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `discount` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_fees`
--

INSERT INTO `course_fees` (`id`, `course_id`, `batch_id`, `amount`, `discount`, `status`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(1, '15', NULL, '300000', '10', NULL, '1', '2024-01-30 06:01:13', '2024-01-30 06:03:10'),
(2, '16', NULL, '200000', '20', NULL, '1', '2024-01-30 06:12:12', '2024-01-30 06:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `abbreviation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `name`, `abbreviation`, `created_at`, `updated_at`) VALUES
(15, 'Adv dip in Hospitality and Tourism Management', 'HM', '2023-11-22 08:07:47', '2023-12-04 16:21:04'),
(16, 'Dip in Food & Beverage Management', 'FBM', '2023-11-22 08:08:03', '2023-12-04 16:20:37'),
(17, 'Adv / Dip in Culinary Arts', 'Adv Cul', '2023-11-22 08:08:11', '2023-12-04 16:27:23'),
(18, 'Front Office Operation Course', 'FO', '2023-12-04 16:21:38', '2023-12-04 16:21:38'),
(19, 'Food and Beverage Service Course Level I', 'FB', '2023-12-04 16:23:01', '2023-12-04 16:23:22'),
(20, 'Food and Beverage Service Course Level 1', 'FBS', '2023-12-04 16:23:53', '2023-12-04 16:23:53'),
(21, 'Hotel and Cruise Ship Housekeeping Course', 'HK', '2023-12-04 16:24:37', '2023-12-04 16:24:37'),
(22, 'International Culinary Course', 'Cul', '2023-12-04 16:26:54', '2023-12-04 16:26:54'),
(23, 'International Bakery and Pastry Course', 'Bak', '2023-12-04 16:28:32', '2023-12-04 16:28:32'),
(24, 'Barista Course', 'CF', '2023-12-04 16:28:50', '2023-12-04 16:28:50'),
(25, 'Bartending Course', 'Bar', '2023-12-04 16:29:20', '2023-12-04 16:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `expends`
--

CREATE TABLE `expends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `teacher_id` text DEFAULT NULL,
  `staff_id` text DEFAULT NULL,
  `course_id` text DEFAULT NULL,
  `batch_id` text DEFAULT NULL,
  `payment_type_id` text DEFAULT NULL,
  `particular` text DEFAULT NULL,
  `voucher_no` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `qty` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `thing` longtext DEFAULT NULL,
  `sign` text DEFAULT NULL,
  `bonus` text DEFAULT NULL,
  `fine` text DEFAULT NULL,
  `remark` longtext DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expends`
--

INSERT INTO `expends` (`id`, `date`, `title`, `description`, `teacher_id`, `staff_id`, `course_id`, `batch_id`, `payment_type_id`, `particular`, `voucher_no`, `name`, `amount`, `qty`, `price`, `thing`, `sign`, `bonus`, `fine`, `remark`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(25, '2024-01-11', NULL, NULL, '11', NULL, NULL, NULL, '4', NULL, NULL, NULL, '5000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-11 07:54:12', '2024-01-11 07:54:12'),
(27, '2024-01-11', NULL, NULL, '13', NULL, NULL, NULL, '4', NULL, NULL, NULL, '5000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-11 08:00:41', '2024-01-11 08:00:41'),
(28, '2024-01-11', NULL, NULL, NULL, '8', NULL, NULL, '4', NULL, NULL, NULL, '5000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-11 08:28:56', '2024-01-11 08:28:56'),
(29, '2024-01-30', NULL, NULL, '14', NULL, NULL, NULL, '2', NULL, NULL, NULL, '500000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-30 05:03:12', '2024-01-30 05:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `building_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `name`, `building_id`, `created_at`, `updated_at`) VALUES
(1, 'Level 2', NULL, '2024-01-02 16:23:15', '2024-01-09 08:06:08'),
(2, 'Level 1', NULL, '2024-01-02 16:23:23', '2024-01-09 08:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `title`, `photo`, `description`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(1, 'Lorem', '1693372327_hotel4.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '1', '2023-08-29 22:42:07', '2023-08-29 22:42:07'),
(2, 'Ipsum', '1693372389_italy.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English', '1', '2023-08-29 22:43:09', '2023-08-29 22:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `forum_comments`
--

CREATE TABLE `forum_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` text DEFAULT NULL,
  `forum_id` text DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_comments`
--

INSERT INTO `forum_comments` (`id`, `student_id`, `forum_id`, `comment`, `created_at`, `updated_at`) VALUES
(5, '9', '2', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English', '2023-08-30 03:35:32', '2023-08-30 03:35:32'),
(6, '9', '2', 'hi', '2023-08-30 03:35:37', '2023-08-30 03:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `future_interests`
--

CREATE TABLE `future_interests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `future_interests`
--

INSERT INTO `future_interests` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'To Work in Hotel/ Restaurant/ Travel & Tour', '2024-01-31 07:22:17', '2024-01-31 07:22:17'),
(6, 'To Start Own Business', '2024-01-31 07:22:28', '2024-01-31 07:22:28'),
(8, 'To Manage Own Business', '2024-01-31 07:37:27', '2024-01-31 07:37:27'),
(9, 'To Move to management Level', '2024-01-31 07:37:37', '2024-01-31 07:37:37'),
(10, 'To go for further study', '2024-01-31 07:37:48', '2024-01-31 07:37:48'),
(11, 'To Work oversea', '2024-01-31 07:37:58', '2024-01-31 07:37:58'),
(12, 'Other', '2024-01-31 07:38:08', '2024-01-31 07:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `generate_student_codes`
--

CREATE TABLE `generate_student_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` text DEFAULT NULL,
  `student_no` text DEFAULT NULL,
  `course_no` text DEFAULT NULL,
  `course_abbre` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generate_student_codes`
--

INSERT INTO `generate_student_codes` (`id`, `course_id`, `student_no`, `course_no`, `course_abbre`, `status`, `created_at`, `updated_at`) VALUES
(40, '17', 'Adv Cul00402', '402', 'Adv Cul', NULL, '2024-01-31 04:03:38', '2024-01-31 04:03:38'),
(41, '16', 'FBM00412', '412', 'FBM', NULL, '2024-01-31 04:10:33', '2024-01-31 04:10:33'),
(42, '15', 'HM00401', '401', 'HM', NULL, '2024-01-31 08:34:22', '2024-01-31 08:34:22'),
(46, '15', 'HM00402', '402', 'HM', NULL, '2024-01-31 08:50:51', '2024-01-31 08:50:51'),
(48, '16', 'FBM00414', '414', 'FBM', NULL, '2024-01-31 08:51:57', '2024-01-31 08:51:57'),
(50, '15', 'HM00403', '403', 'HM', NULL, '2024-01-31 08:54:28', '2024-01-31 08:54:28'),
(52, '16', 'FBM00415', '415', 'FBM', NULL, '2024-01-31 08:55:01', '2024-01-31 08:55:01'),
(53, '15', 'HM00404', '404', 'HM', NULL, '2024-01-31 08:56:46', '2024-01-31 08:56:46'),
(56, '16', 'FBM00416', '416', 'FBM', NULL, '2024-01-31 09:02:55', '2024-01-31 09:02:55'),
(64, '15', 'HM00405', '405', 'HM', NULL, '2024-02-01 04:59:13', '2024-02-01 04:59:13'),
(65, '16', 'FBM00417', '417', 'FBM', NULL, '2024-02-01 04:59:13', '2024-02-01 04:59:13'),
(66, NULL, '00000', NULL, NULL, NULL, '2024-02-01 08:17:22', '2024-02-01 08:17:22'),
(67, '15', 'HM00406', '406', 'HM', NULL, '2024-02-02 04:29:22', '2024-02-02 04:29:22'),
(68, '15', 'HM00407', '407', 'HM', NULL, '2024-02-03 08:36:40', '2024-02-03 08:36:40'),
(69, NULL, '00000', NULL, NULL, NULL, '2024-02-03 08:36:40', '2024-02-03 08:36:40'),
(70, NULL, '00000', NULL, NULL, NULL, '2024-02-03 08:47:32', '2024-02-03 08:47:32'),
(71, '16', 'FBM00418', '418', 'FBM', NULL, '2024-02-05 09:05:02', '2024-02-05 09:05:02'),
(72, NULL, '00000', NULL, NULL, NULL, '2024-02-05 09:05:02', '2024-02-05 09:05:02'),
(73, '16', 'FBM00418', '418', 'FBM', NULL, '2024-02-05 09:05:17', '2024-02-05 09:05:17'),
(74, NULL, '00000', NULL, NULL, NULL, '2024-02-05 09:05:17', '2024-02-05 09:05:17'),
(75, '16', 'FBM00418', '418', 'FBM', NULL, '2024-02-05 09:06:02', '2024-02-05 09:06:02'),
(76, NULL, '00000', NULL, NULL, NULL, '2024-02-05 09:06:02', '2024-02-05 09:06:02'),
(77, NULL, '00000', NULL, NULL, NULL, '2024-02-05 09:17:28', '2024-02-05 09:17:28'),
(78, '16', 'FBM00419', '419', 'FBM', NULL, '2024-02-05 09:28:41', '2024-02-05 09:28:41'),
(79, NULL, '00000', NULL, NULL, NULL, '2024-02-05 09:28:41', '2024-02-05 09:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `code` text DEFAULT NULL,
  `payment_type` text DEFAULT NULL,
  `payment_installment` text DEFAULT NULL,
  `payment_complete` text DEFAULT NULL,
  `student_id` text DEFAULT NULL,
  `course_id` text DEFAULT NULL,
  `batch_id` text DEFAULT NULL,
  `income_source_id` text DEFAULT NULL,
  `particular` text DEFAULT NULL,
  `voucher_no` text DEFAULT NULL,
  `student_no` text DEFAULT NULL,
  `course_abbre` text DEFAULT NULL,
  `course_no` int(11) DEFAULT NULL,
  `group` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `left_money` text DEFAULT NULL,
  `remark` longtext DEFAULT NULL,
  `paid_by` text DEFAULT NULL,
  `received_by` text DEFAULT NULL,
  `checked_by` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income_details`
--

CREATE TABLE `income_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `income_id` text DEFAULT NULL,
  `student_id` text NOT NULL,
  `code` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income_sources`
--

CREATE TABLE `income_sources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_sources`
--

INSERT INTO `income_sources` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Student Fee', '2023-10-31 16:26:41', '2023-10-31 16:26:41'),
(4, 'Medical Fee', '2023-10-31 16:26:55', '2023-10-31 16:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `remarks`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'ere', NULL, '2023-08-22 03:48:53', '2023-08-22 03:48:53'),
(4, 'Testing', 'Testing', NULL, '2023-10-09 04:28:00', '2023-10-09 04:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `module_id` text DEFAULT NULL,
  `course_id` text DEFAULT NULL,
  `academic_year_id` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `attachment` longtext DEFAULT NULL,
  `image` text DEFAULT NULL,
  `video_url` text DEFAULT NULL,
  `is_active` text DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_statuses`
--

CREATE TABLE `medical_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `times` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_statuses`
--

INSERT INTO `medical_statuses` (`id`, `name`, `times`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(6, 'Covid 19', '3', '1', '2023-08-26 08:45:54', '2023-08-26 08:45:54'),
(7, 'B virus', '3', '1', '2023-08-26 08:49:56', '2023-08-26 08:49:56'),
(10, 'HBs Ag', '1', '1', '2023-09-17 08:45:48', '2023-09-17 08:45:48'),
(11, 'HCV Ab', '1', '1', '2023-09-17 08:46:17', '2023-09-17 08:46:17'),
(12, 'VDRL', '1', '1', '2023-09-17 08:46:32', '2023-09-17 08:46:32'),
(13, 'HIV Ab', '1', '1', '2023-09-17 08:46:48', '2023-09-17 08:46:48'),
(14, 'TB (ICT)', '1', '1', '2023-09-17 08:47:07', '2023-09-17 08:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_20_094953_create_sessions_table', 1),
(7, '2023_08_20_100038_create_admin_users_table', 1),
(8, '2023_08_21_081847_create_students_table', 2),
(9, '2023_08_21_091507_create_academic_years_table', 3),
(10, '2023_08_21_092404_create_degrees_table', 4),
(11, '2023_08_21_151847_create_teachers_table', 5),
(12, '2023_08_21_152636_create_courses_table', 5),
(13, '2023_08_21_152642_create_jobs_table', 5),
(14, '2023_08_22_051835_create_lessons_table', 6),
(15, '2023_08_22_052414_create_modules_table', 6),
(16, '2023_08_22_053141_create_question_categories_table', 7),
(17, '2023_08_22_053519_create_questions_table', 7),
(18, '2023_08_22_053535_create_question_answers_table', 7),
(19, '2023_08_26_145828_create_medical_statuses_table', 8),
(20, '2023_08_27_142439_create_townships_table', 9),
(21, '2023_08_27_142446_create_states_table', 9),
(22, '2023_08_27_161231_create_student_medical_statuses_table', 10),
(23, '2023_08_28_055134_create_nrc_infos_table', 10),
(24, '2023_08_28_135124_create_announcements_table', 11),
(25, '2023_08_29_084555_create_announcement_comments_table', 12),
(26, '2023_08_29_141938_create_student_answers_table', 13),
(27, '2023_08_30_045744_create_forums_table', 14),
(28, '2023_08_30_054548_create_forum_comments_table', 15),
(29, '2023_08_31_030959_create_permission_tables', 16),
(30, '2023_08_31_031924_create_student_permissions_table', 17),
(31, '2023_08_31_054227_create_student_limits_table', 17),
(32, '2023_09_03_160521_create_incomes_table', 18),
(33, '2023_09_03_160532_create_expends_table', 18),
(34, '2023_09_06_074844_create_question_listenings_table', 19),
(35, '2023_09_06_152421_create_attendance_lists_table', 20),
(36, '2023_09_11_070341_create_classrooms_table', 21),
(37, '2023_09_11_084024_create_absents_table', 22),
(38, '2023_09_11_170006_create_absent_classrooms_table', 23),
(39, '2023_09_19_043509_create_student_answer_listenings_table', 24),
(40, '2023_10_31_221818_create_income_sources_table', 25),
(41, '2023_11_21_210418_create_teacher_limits_table', 26),
(42, '2023_11_21_220314_create_batches_table', 27),
(43, '2023_11_29_111407_create_payment_types_table', 28),
(44, '2023_11_29_114353_create_staff_table', 29),
(45, '2023_11_29_141503_create_staff_leaves_table', 30),
(46, '2023_12_25_110653_create_generate_student_codes_table', 31),
(47, '2024_01_02_145743_create_teacher_attendances_table', 32),
(48, '2024_01_02_215556_create_rooms_table', 33),
(49, '2024_01_02_215603_create_floors_table', 33),
(50, '2024_01_02_215611_create_buildings_table', 33),
(51, '2024_01_05_120227_create_branches_table', 34),
(52, '2024_01_30_114508_create_course_fees_table', 35),
(53, '2024_01_31_131114_create_future_interests_table', 36),
(54, '2024_01_31_131229_create_source_surveys_table', 36),
(55, '2024_02_02_143846_create_income_details_table', 37);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\AdminUser', 1),
(6, 'App\\Models\\AdminUser', 13),
(6, 'App\\Models\\AdminUser', 14),
(6, 'App\\Models\\AdminUser', 15),
(6, 'App\\Models\\AdminUser', 16),
(7, 'App\\Models\\AdminUser', 18),
(7, 'App\\Models\\AdminUser', 19),
(7, 'App\\Models\\AdminUser', 21),
(8, 'App\\Models\\AdminUser', 22),
(9, 'App\\Models\\AdminUser', 23),
(10, 'App\\Models\\AdminUser', 24);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `course_id` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nrc_infos`
--

CREATE TABLE `nrc_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no` text DEFAULT NULL,
  `township_abbreviation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nrc_infos`
--

INSERT INTO `nrc_infos` (`id`, `no`, `township_abbreviation`, `created_at`, `updated_at`) VALUES
(2, '12', 'DaGaMa', '2023-08-28 00:58:52', '2023-09-21 07:14:44'),
(3, '12', 'DaGaNa', '2023-08-28 00:59:03', '2023-09-21 07:14:35'),
(4, '12', 'DaGaTa', '2023-08-28 00:59:28', '2023-09-21 07:14:27'),
(5, '12', 'DaGaSa', '2023-08-28 00:59:39', '2023-09-21 07:14:18'),
(6, '9', 'KaPaTa', '2023-08-28 01:32:23', '2023-09-21 07:14:10'),
(7, '9', 'MaTaYa', '2023-08-28 01:33:33', '2023-09-21 07:13:56'),
(8, '12', 'AhLaNa', '2023-09-21 07:12:55', '2023-09-21 07:12:55'),
(9, '12', 'BaHaNa', '2023-09-21 07:19:34', '2023-09-21 07:19:34'),
(10, '12', 'BaTaHta', '2023-09-21 07:19:48', '2023-09-21 07:19:48'),
(11, '12', 'KaKaKa', '2023-09-21 07:20:03', '2023-09-21 07:20:03'),
(12, '12', 'DaGaYa', '2023-09-21 07:20:43', '2023-09-21 07:20:43'),
(13, '12', 'DaLaNa', '2023-09-21 07:21:01', '2023-09-21 07:21:01'),
(14, '12', 'DaPaNa', '2023-09-21 07:21:13', '2023-09-21 07:21:13'),
(15, '12', 'LaTaYa', '2023-09-21 07:21:44', '2023-09-21 07:21:44'),
(16, '12', 'LaMaNa', '2023-09-21 07:22:01', '2023-09-21 07:22:01'),
(17, '12', 'LaKaNa', '2023-09-21 07:22:15', '2023-09-21 07:22:15'),
(18, '12', 'MaBaNa', '2023-09-21 07:22:32', '2023-09-21 07:22:32'),
(19, '12', 'HtaTaPa', '2023-09-21 07:22:49', '2023-09-21 07:22:49'),
(20, '12', 'AhSaNa', '2023-09-21 07:23:01', '2023-09-21 07:23:01'),
(21, '12', 'KaMaYa', '2023-09-21 07:23:14', '2023-09-21 07:23:14'),
(22, '12', 'KaMaNa', '2023-09-21 07:23:45', '2023-09-21 07:23:45'),
(23, '12', 'KhaYaNa', '2023-09-21 07:24:01', '2023-09-21 07:24:01'),
(24, '12', 'KaKhaKa', '2023-09-21 07:24:14', '2023-09-21 07:24:14'),
(25, '12', 'KaTaTa', '2023-09-21 07:24:25', '2023-09-21 07:24:25'),
(26, '12', 'KaTaNa', '2023-09-21 07:24:37', '2023-09-21 07:24:37'),
(27, '12', 'KaMaTa', '2023-09-21 07:24:50', '2023-09-21 07:24:50'),
(28, '12', 'LaMaTa', '2023-09-21 07:25:05', '2023-09-21 07:25:05'),
(29, '12', 'LaThaNa', '2023-09-21 07:25:33', '2023-09-21 07:25:33'),
(30, '12', 'MaYaKa', '2023-09-21 07:25:45', '2023-09-21 07:25:45'),
(31, '12', 'MaGaTa', '2023-09-21 07:25:59', '2023-09-21 07:25:59'),
(32, '12', 'MaGaDa', '2023-09-21 07:26:10', '2023-09-21 07:26:10'),
(33, '12', 'OuKaMa', '2023-09-21 07:28:27', '2023-09-21 07:28:27'),
(34, '12', 'PaBaTa', '2023-09-21 07:28:43', '2023-09-21 07:28:43'),
(35, '12', 'PaZaTa', '2023-09-21 07:28:56', '2023-09-21 07:28:56'),
(36, '12', 'SaKhaNa', '2023-09-21 07:29:12', '2023-09-21 07:29:12'),
(37, '12', 'SaKaKha', '2023-09-21 07:29:57', '2023-09-21 07:29:57'),
(38, '12', 'HsaKaNa', '2023-09-21 07:30:15', '2023-09-21 07:30:15'),
(39, '12', 'YaPaTa', '2023-09-21 07:30:26', '2023-09-21 07:30:26'),
(40, '12', 'OuKaTa', '2023-09-21 07:30:39', '2023-09-21 07:30:39'),
(41, '12', 'TaKaNa', '2023-09-21 07:30:54', '2023-09-21 07:30:54'),
(42, '12', 'TaMaNa', '2023-09-21 07:31:05', '2023-09-21 07:31:05'),
(43, '12', 'ThaKaTa', '2023-09-21 07:31:19', '2023-09-21 07:31:19'),
(44, '12', 'TaLaNa', '2023-09-21 07:31:34', '2023-09-21 07:31:34'),
(45, '12', 'TaGaKa', '2023-09-21 07:31:48', '2023-09-21 07:31:48'),
(46, '12', 'TaKhaNa', '2023-09-21 07:32:06', '2023-09-21 07:32:06'),
(47, '12', 'TaTaNa', '2023-09-21 07:32:17', '2023-09-21 07:32:17'),
(48, '12', 'YaKaNa', '2023-09-21 07:32:29', '2023-09-21 07:32:29'),
(49, '12', 'TaTaTa', '2023-09-21 07:32:40', '2023-09-21 07:32:40'),
(50, '9', 'AhMaYa', '2023-09-21 07:33:44', '2023-09-21 07:33:44'),
(51, '9', 'AhMaZa', '2023-09-21 07:33:58', '2023-09-21 07:33:58'),
(52, '9', 'KhaAhZa', '2023-09-21 07:34:16', '2023-09-21 07:34:16'),
(53, '9', 'KhaMaSa', '2023-09-21 07:34:32', '2023-09-21 07:34:32'),
(54, '9', 'KaSaNa', '2023-09-21 07:34:45', '2023-09-21 07:34:45'),
(55, '9', 'MaHaMa', '2023-09-21 07:35:01', '2023-09-21 07:35:01'),
(56, '9', 'MaLaNa', '2023-09-21 07:35:17', '2023-09-21 07:35:17'),
(57, '9', 'MaYaMa', '2023-09-21 07:35:28', '2023-09-21 07:35:28'),
(58, '9', 'MaYaTa', '2023-09-21 07:35:40', '2023-09-21 07:35:40'),
(59, '9', 'MaNaMa', '2023-09-21 07:35:54', '2023-09-21 07:35:54'),
(60, '9', 'MaNaTa', '2023-09-21 07:36:10', '2023-09-21 07:36:10'),
(61, '9', 'MaHtaLa', '2023-09-21 07:36:23', '2023-09-21 07:36:23'),
(62, '9', 'MaKaNa', '2023-09-21 07:36:33', '2023-09-21 07:36:33'),
(63, '9', 'MaKhaNa', '2023-09-21 07:36:46', '2023-09-21 07:36:46'),
(64, '9', 'MaTaNa', '2023-09-21 07:36:55', '2023-09-21 07:36:55'),
(65, '9', 'NaHtaKa', '2023-09-21 07:37:09', '2023-09-21 07:37:09'),
(66, '9', 'NgaZaNa', '2023-09-21 07:37:23', '2023-09-21 07:37:23'),
(67, '9', 'NyaOuNa', '2023-09-21 07:37:39', '2023-09-21 07:37:39'),
(68, '9', 'PaTaKa', '2023-09-21 07:38:00', '2023-09-21 07:38:00'),
(69, '9', 'PaBaNa', '2023-09-21 07:38:12', '2023-09-21 07:38:12'),
(70, '9', 'PaKaKha', '2023-09-21 07:38:51', '2023-09-21 07:38:51'),
(71, '9', 'PaOuLa', '2023-09-21 07:39:02', '2023-09-21 07:39:02'),
(72, '9', 'SaKaNa', '2023-09-21 07:39:15', '2023-09-21 07:39:15'),
(73, '9', 'SaKaTa', '2023-09-21 07:39:30', '2023-09-21 07:39:30'),
(74, '9', 'TaPaKa', '2023-09-21 07:39:45', '2023-09-21 07:39:45'),
(75, '9', 'TaTaOu', '2023-09-21 07:39:56', '2023-09-21 07:39:56'),
(76, '9', 'ThaTaNa', '2023-09-21 07:40:25', '2023-09-21 07:40:25'),
(77, '9', 'TaSaNa', '2023-09-21 07:40:37', '2023-09-21 07:40:37'),
(78, '9', 'WaTaNa', '2023-09-21 07:40:47', '2023-09-21 07:40:47'),
(79, '9', 'YaMaTa', '2023-09-21 07:41:00', '2023-09-21 07:41:00'),
(80, '9', 'NgaTaYa', '2023-09-21 07:41:17', '2023-09-21 07:41:17'),
(81, '9', 'TaKaTa', '2023-09-21 07:41:38', '2023-09-21 07:41:38'),
(82, '9', 'MaMaNa', '2023-09-21 07:41:46', '2023-09-21 07:41:46'),
(83, '9', 'DaKhaTa', '2023-09-21 07:41:58', '2023-09-21 07:41:58'),
(84, '9', 'LaWaNa', '2023-09-21 07:42:09', '2023-09-21 07:42:09'),
(85, '9', 'OuTaTha', '2023-09-21 07:42:23', '2023-09-21 07:42:23'),
(86, '9', 'PaBaTa', '2023-09-21 07:45:34', '2023-09-21 07:45:34'),
(87, '9', 'PaMaNa', '2023-09-21 07:45:48', '2023-09-21 07:45:48'),
(88, '9', 'TaKaNa', '2023-09-21 07:45:58', '2023-09-21 07:45:58'),
(89, '9', 'ZaBaTa', '2023-09-21 07:46:11', '2023-09-21 07:46:11'),
(90, '9', 'ZaYaTa', '2023-09-21 07:46:30', '2023-09-21 07:46:30'),
(91, '1', 'BaMaNa', '2023-09-21 07:46:52', '2023-09-21 07:46:52'),
(92, '1', 'KhaPhaNa', '2023-09-21 07:47:03', '2023-09-21 07:47:03'),
(93, '1', 'DaPhaYa', '2023-09-21 07:47:14', '2023-09-21 07:47:14'),
(94, '1', 'HaPaNa', '2023-09-21 07:47:25', '2023-09-21 07:47:25'),
(95, '1', 'PhaKaNa', '2023-09-21 07:47:36', '2023-09-21 07:47:36'),
(96, '1', 'AhGaYa', '2023-09-21 07:47:45', '2023-09-21 07:47:45'),
(97, '1', 'KaMaNa', '2023-09-21 07:47:55', '2023-09-21 07:47:55'),
(98, '1', 'KaMaTa', '2023-09-21 07:48:03', '2023-09-21 07:48:03'),
(99, '1', 'KaPaTa', '2023-09-21 07:48:14', '2023-09-21 07:48:14'),
(100, '1', 'KhaLaPha', '2023-09-21 07:48:26', '2023-09-21 07:48:26'),
(101, '1', 'LaGaNa', '2023-09-21 07:48:38', '2023-09-21 07:48:38'),
(102, '1', 'MaKhaBa', '2023-09-21 07:48:49', '2023-09-21 07:48:49'),
(103, '1', 'MaSaNa', '2023-09-21 07:48:57', '2023-09-21 07:48:57'),
(104, '1', 'MaKaTa', '2023-09-21 07:49:07', '2023-09-21 07:49:07'),
(105, '1', 'MaNyaNa', '2023-09-21 07:49:21', '2023-09-21 07:49:21'),
(106, '1', 'MaMaNa', '2023-09-21 07:49:31', '2023-09-21 07:49:31'),
(107, '1', 'MaKaNa', '2023-09-21 07:49:40', '2023-09-21 07:49:40'),
(108, '1', 'MaLaNa', '2023-09-21 07:49:50', '2023-09-21 07:49:50'),
(109, '1', 'NaMaNa', '2023-09-21 07:50:00', '2023-09-21 07:50:00'),
(110, '1', 'PaWaNa', '2023-09-21 07:50:10', '2023-09-21 07:50:10'),
(111, '1', 'PaNaDa', '2023-09-21 07:50:20', '2023-09-21 07:50:20'),
(112, '1', 'PaTaAh', '2023-09-21 07:50:31', '2023-09-21 07:50:31'),
(113, '1', 'HsaDaNa', '2023-09-21 07:50:49', '2023-09-21 07:50:49'),
(114, '1', 'YaBaYa', '2023-09-21 07:51:00', '2023-09-21 07:51:00'),
(115, '1', 'YaKaNa', '2023-09-21 07:51:09', '2023-09-21 07:51:09'),
(116, '1', 'HsaPaBa', '2023-09-21 07:51:23', '2023-09-21 07:51:23'),
(117, '1', 'TaNaNa', '2023-09-21 07:51:34', '2023-09-21 07:51:34'),
(118, '1', 'HsaLaNa', '2023-09-21 07:51:43', '2023-09-21 07:51:43'),
(119, '1', 'WaMaNa', '2023-09-21 07:51:53', '2023-09-21 07:51:53'),
(120, '1', 'KhaBaDa', '2023-09-21 07:52:07', '2023-09-21 07:52:07'),
(121, '1', 'HsaBaTa', '2023-09-21 07:52:22', '2023-09-21 07:52:22'),
(122, '2', 'BaLaKha', '2023-09-21 07:52:59', '2023-09-21 07:52:59'),
(123, '2', 'DaMaHsa', '2023-09-21 07:53:10', '2023-09-21 07:53:10'),
(124, '2', 'PhaHsaNa', '2023-09-21 07:53:23', '2023-09-21 07:53:23'),
(125, '2', 'PhaYaHsa', '2023-09-21 07:53:35', '2023-09-21 07:53:35'),
(126, '2', 'LaKaNa', '2023-09-21 07:53:42', '2023-09-21 07:53:42'),
(127, '2', 'MaSaNa', '2023-09-21 07:53:54', '2023-09-21 07:53:54'),
(128, '2', 'YaTaNa', '2023-09-21 07:54:03', '2023-09-21 07:54:03'),
(129, '2', 'YaThaNa', '2023-09-21 07:54:15', '2023-09-21 07:54:15'),
(130, '3', 'BaGaLa', '2023-09-21 09:17:12', '2023-09-21 09:17:12'),
(131, '3', 'LaBaNa', '2023-09-21 09:17:26', '2023-09-21 09:17:26'),
(132, '3', 'BaAhNa', '2023-09-21 09:17:38', '2023-09-21 09:17:38'),
(133, '3', 'PhaPaNa', '2023-09-21 09:17:47', '2023-09-21 09:17:47'),
(134, '3', 'BaTaHsa', '2023-09-21 09:17:57', '2023-09-21 09:17:57'),
(135, '3', 'KaMaMa', '2023-09-21 09:18:08', '2023-09-21 09:18:08'),
(136, '3', 'KaKaYa', '2023-09-21 09:18:19', '2023-09-21 09:18:19'),
(137, '3', 'KaDaNa', '2023-09-21 09:18:40', '2023-09-21 09:18:40'),
(138, '3', 'KaHsaKa', '2023-09-21 09:18:53', '2023-09-21 09:18:53'),
(139, '3', 'LaTaNa', '2023-09-21 09:19:02', '2023-09-21 09:19:02'),
(140, '3', 'MaWaTa', '2023-09-21 09:19:13', '2023-09-21 09:19:13'),
(141, '3', 'PaKaNa', '2023-09-21 09:19:22', '2023-09-21 09:19:22'),
(142, '3', 'YaYaTa', '2023-09-21 09:19:33', '2023-09-21 09:19:33'),
(143, '3', 'SaKaLa', '2023-09-21 09:19:41', '2023-09-21 09:19:41'),
(144, '3', 'ThaTaNa', '2023-09-21 09:19:53', '2023-09-21 09:19:53'),
(145, '3', 'ThaTaKa', '2023-09-21 09:20:03', '2023-09-21 09:20:03'),
(146, '3', 'WaLaMa', '2023-09-21 09:20:17', '2023-09-21 09:20:17'),
(147, '4', 'KaKhaNa', '2023-09-21 09:20:56', '2023-09-21 09:20:56'),
(148, '4', 'PhaLaNa', '2023-09-21 09:21:06', '2023-09-21 09:21:06'),
(149, '4', 'HaKhaNa', '2023-09-21 09:21:17', '2023-09-21 09:21:17'),
(150, '4', 'KaPaLa', '2023-09-21 09:21:28', '2023-09-21 09:21:28'),
(151, '4', 'MaTaPa', '2023-09-21 09:21:41', '2023-09-21 09:21:41'),
(152, '4', 'MaTaNa', '2023-09-21 09:21:51', '2023-09-21 09:21:51'),
(153, '4', 'PaLaWa', '2023-09-21 09:22:02', '2023-09-21 09:22:02'),
(154, '4', 'YaZaNa', '2023-09-21 09:22:11', '2023-09-21 09:22:11'),
(155, '4', 'YaKhaDa', '2023-09-21 09:22:25', '2023-09-21 09:22:25'),
(156, '4', 'HsaMaNa', '2023-09-21 09:22:49', '2023-09-21 09:22:49'),
(157, '4', 'TaTaNa', '2023-09-21 09:22:58', '2023-09-21 09:22:58'),
(158, '4', 'HtaTaLa', '2023-09-21 09:23:08', '2023-09-21 09:23:08'),
(159, '4', 'TaZaNa', '2023-09-21 09:23:19', '2023-09-21 09:23:19'),
(160, '5', 'AhYaTa', '2023-09-21 09:23:48', '2023-09-21 09:23:48'),
(161, '5', 'BaMaNa', '2023-09-21 09:23:57', '2023-09-21 09:23:57'),
(162, '5', 'BaTaLa', '2023-09-21 09:24:06', '2023-09-21 09:24:06'),
(163, '5', 'KhaOuTa', '2023-09-21 09:24:18', '2023-09-21 09:24:18'),
(164, '5', 'KhaTaNa', '2023-09-21 09:24:28', '2023-09-21 09:24:28'),
(165, '5', 'HaMaLa', '2023-09-21 09:24:49', '2023-09-21 09:24:49'),
(166, '5', 'AhTaNa', '2023-09-21 09:25:01', '2023-09-21 09:25:01'),
(167, '5', 'KaLaHta', '2023-09-21 09:25:15', '2023-09-21 09:25:15'),
(168, '5', 'KaLaNa', '2023-09-21 09:25:37', '2023-09-21 09:25:37'),
(169, '5', 'KaBaLa', '2023-09-21 09:25:46', '2023-09-21 09:25:46'),
(170, '5', 'KaNaNa', '2023-09-21 09:25:55', '2023-09-21 09:25:55'),
(171, '5', 'KaTaNa', '2023-09-21 09:26:05', '2023-09-21 09:26:05'),
(172, '5', 'KhaOuNa', '2023-09-21 09:27:03', '2023-09-21 09:27:03'),
(173, '5', 'LaHaNa', '2023-09-21 09:27:12', '2023-09-21 09:27:12'),
(174, '5', 'LaYaNa', '2023-09-21 09:27:22', '2023-09-21 09:27:22'),
(175, '5', 'MaLaNa', '2023-09-21 09:27:31', '2023-09-21 09:27:31'),
(176, '5', 'MaKaNa', '2023-09-21 09:27:45', '2023-09-21 09:27:45'),
(177, '5', 'MaYaNa', '2023-09-21 09:27:57', '2023-09-21 09:27:57'),
(178, '5', 'MaMaNa', '2023-09-21 09:28:07', '2023-09-21 09:28:07'),
(179, '5', 'MaMaTa', '2023-09-21 09:28:16', '2023-09-21 09:28:16'),
(180, '5', 'NaYaNa', '2023-09-21 09:28:28', '2023-09-21 09:28:28'),
(181, '5', 'NgaZaNa', '2023-09-21 09:28:38', '2023-09-21 09:28:38'),
(182, '5', 'PaLaNa', '2023-09-21 09:28:48', '2023-09-21 09:28:48'),
(183, '5', 'PhaPaNa', '2023-09-21 09:28:59', '2023-09-21 09:28:59'),
(184, '5', 'PaLaBa', '2023-09-21 09:29:14', '2023-09-21 09:29:14'),
(185, '5', 'SaKaNa', '2023-09-21 09:29:23', '2023-09-21 09:29:23'),
(186, '5', 'HsaLaKa', '2023-09-21 09:29:33', '2023-09-21 09:29:33'),
(187, '5', 'YaBaNa', '2023-09-21 09:29:43', '2023-09-21 09:29:43'),
(188, '5', 'DaPaYa', '2023-09-21 09:29:54', '2023-09-21 09:29:54'),
(189, '5', 'TaMaNa', '2023-09-21 09:30:06', '2023-09-21 09:30:06'),
(190, '5', 'TaHsaNa', '2023-09-21 09:30:17', '2023-09-21 09:30:17'),
(191, '5', 'HtaKhaNa', '2023-09-21 09:30:28', '2023-09-21 09:30:28'),
(192, '5', 'WaLaNa', '2023-09-21 09:30:38', '2023-09-21 09:30:38'),
(193, '5', 'WaTaNa', '2023-09-21 09:30:54', '2023-09-21 09:30:54'),
(194, '5', 'YaOuNa', '2023-09-21 09:31:04', '2023-09-21 09:31:04'),
(195, '5', 'YaMaPa', '2023-09-21 09:31:13', '2023-09-21 09:31:13'),
(196, '5', 'KaMaNa', '2023-09-21 09:31:28', '2023-09-21 09:31:28'),
(197, '5', 'KhaPaNa', '2023-09-21 09:31:39', '2023-09-21 09:31:39'),
(198, '5', 'PaHsaNa', '2023-09-21 09:31:50', '2023-09-21 09:31:50'),
(199, '5', 'DaHaNa', '2023-09-21 09:32:00', '2023-09-21 09:32:00'),
(200, '5', 'MaPaLa', '2023-09-21 09:32:12', '2023-09-21 09:32:12'),
(201, '5', 'HtaPaKha', '2023-09-21 09:32:22', '2023-09-21 09:32:32'),
(202, '5', 'HsaMaYa', '2023-09-21 09:32:47', '2023-09-21 09:32:47'),
(203, '5', 'MaTaNa', '2023-09-21 09:32:58', '2023-09-21 09:32:58'),
(204, '5', 'KaLaTa', '2023-09-21 09:33:08', '2023-09-21 09:33:08'),
(205, '5', 'KaLaWa', '2023-09-21 09:33:18', '2023-09-21 09:33:18'),
(206, '6', 'BaPaNa', '2023-09-21 09:33:45', '2023-09-21 09:33:45'),
(207, '6', 'HtaWaNa', '2023-09-21 09:34:00', '2023-09-21 09:34:00'),
(208, '6', 'KaLaAh', '2023-09-21 09:34:10', '2023-09-21 09:34:10'),
(209, '6', 'KaTaNa', '2023-09-21 09:34:20', '2023-09-21 09:34:20'),
(210, '6', 'KaSaNa', '2023-09-21 09:34:29', '2023-09-21 09:34:29'),
(211, '6', 'LaLaNa', '2023-09-21 09:34:37', '2023-09-21 09:34:37'),
(212, '6', 'MaMaNa', '2023-09-21 09:34:46', '2023-09-21 09:34:46'),
(213, '6', 'PaLaNa', '2023-09-21 09:34:57', '2023-09-21 09:34:57'),
(214, '6', 'TaThaYa', '2023-09-21 09:35:12', '2023-09-21 09:35:12'),
(215, '6', 'TaYaKha', '2023-09-21 09:35:23', '2023-09-21 09:35:23'),
(216, '6', 'YaPhaNa', '2023-09-21 09:35:35', '2023-09-21 09:35:35'),
(217, '6', 'KhaMaKa', '2023-09-21 09:35:45', '2023-09-21 09:35:45'),
(218, '6', 'MaTaNa', '2023-09-21 09:35:55', '2023-09-21 09:35:55'),
(219, '6', 'PaLaTa', '2023-09-21 09:36:06', '2023-09-21 09:36:06'),
(220, '6', 'MaAhYa', '2023-09-21 09:36:20', '2023-09-21 09:36:20'),
(221, '6', 'KaYaYa', '2023-09-21 09:36:33', '2023-09-21 09:36:33'),
(222, '6', 'MaAhNa', '2023-09-21 09:36:45', '2023-09-21 09:36:45'),
(223, '6', 'PaKaMa', '2023-09-21 09:36:56', '2023-09-21 09:36:56'),
(224, '7', 'DaOuNa', '2023-09-21 09:37:18', '2023-09-21 09:37:18'),
(225, '7', 'KaPaKa', '2023-09-21 09:37:28', '2023-09-21 09:37:28'),
(226, '7', 'KaWaNa', '2023-09-21 09:37:38', '2023-09-21 09:37:38'),
(227, '7', 'KaKaNa', '2023-09-21 09:37:48', '2023-09-21 09:37:48'),
(228, '7', 'KaTaKha', '2023-09-21 09:38:00', '2023-09-21 09:38:00'),
(229, '7', 'LaPaTa', '2023-09-21 09:38:10', '2023-09-21 09:38:10'),
(230, '7', 'MaLaNa', '2023-09-21 09:38:22', '2023-09-21 09:38:22'),
(231, '7', 'MaNyaNa', '2023-09-21 09:38:32', '2023-09-21 09:38:32'),
(232, '7', 'NaTaLa', '2023-09-21 09:38:46', '2023-09-21 09:38:46'),
(233, '7', 'NyaLaPa', '2023-09-21 09:38:58', '2023-09-21 09:38:58'),
(234, '7', 'AhPhaNa', '2023-09-21 09:39:11', '2023-09-21 09:39:11'),
(235, '7', 'AhTaNa', '2023-09-21 09:39:22', '2023-09-21 09:39:22'),
(236, '7', 'PaTaNa', '2023-09-21 09:39:31', '2023-09-21 09:39:31'),
(237, '7', 'PaKhaTa', '2023-09-21 09:39:41', '2023-09-21 09:39:41'),
(238, '7', 'PaKhaNa', '2023-09-21 09:39:50', '2023-09-21 09:39:50'),
(239, '7', 'PaTaTa', '2023-09-21 09:39:59', '2023-09-21 09:39:59'),
(240, '7', 'PhaMaNa', '2023-09-21 09:40:12', '2023-09-21 09:40:12'),
(241, '7', 'PaMaNa', '2023-09-21 09:40:21', '2023-09-21 09:40:21'),
(242, '7', 'YaTaNa', '2023-09-21 09:40:31', '2023-09-21 09:40:31'),
(243, '7', 'YaKaNa', '2023-09-21 09:40:39', '2023-09-21 09:40:39'),
(244, '7', 'HtaTaPa', '2023-09-21 09:40:52', '2023-09-21 09:40:52'),
(245, '7', 'TaNgaNa', '2023-09-21 09:41:02', '2023-09-21 09:41:02'),
(246, '7', 'TaNaPa', '2023-09-21 09:41:11', '2023-09-21 09:41:11'),
(247, '7', 'ThaWaTa', '2023-09-21 09:41:22', '2023-09-21 09:41:22'),
(248, '7', 'TaKaNa', '2023-09-21 09:41:33', '2023-09-21 09:41:33'),
(249, '7', 'WaMaNa', '2023-09-21 09:41:56', '2023-09-21 09:41:56'),
(250, '7', 'YaTaYa', '2023-09-21 09:42:05', '2023-09-21 09:42:13'),
(251, '7', 'ZaKaNa', '2023-09-21 09:42:28', '2023-09-21 09:42:28'),
(252, '8', 'AhLaNa', '2023-09-21 09:43:57', '2023-09-21 09:43:57'),
(253, '8', 'KhaMaNa', '2023-09-21 09:44:07', '2023-09-21 09:44:07'),
(254, '8', 'GaGaNa', '2023-09-21 09:44:17', '2023-09-21 09:44:17'),
(255, '8', 'KaMaNa', '2023-09-21 09:44:26', '2023-09-21 09:44:26'),
(256, '8', 'MaKaNa', '2023-09-21 09:44:35', '2023-09-21 09:44:35'),
(257, '8', 'MaBaNa', '2023-09-21 09:44:45', '2023-09-21 09:44:45'),
(258, '8', 'MaTaNa', '2023-09-21 09:44:54', '2023-09-21 09:44:54'),
(259, '8', 'MaLaNa', '2023-09-21 09:45:03', '2023-09-21 09:45:03'),
(260, '8', 'MaMaNa', '2023-09-21 09:45:17', '2023-09-21 09:45:17'),
(261, '8', 'MaHtaNa', '2023-09-21 09:45:27', '2023-09-21 09:45:27'),
(262, '8', 'MaTaNa', '2023-09-21 09:45:35', '2023-09-21 09:45:35'),
(263, '8', 'NaMaNa', '2023-09-21 09:45:47', '2023-09-21 09:45:47'),
(264, '8', 'NgaPhaNa', '2023-09-21 09:45:58', '2023-09-21 09:45:58'),
(265, '8', 'PaKhaKa', '2023-09-21 09:46:10', '2023-09-21 09:46:10'),
(266, '8', 'PaMaNa', '2023-09-21 09:46:20', '2023-09-21 09:46:20'),
(267, '8', 'PaPhaNa', '2023-09-21 09:46:32', '2023-09-21 09:46:32'),
(268, '8', 'SaLaNa', '2023-09-21 09:46:50', '2023-09-21 09:46:50'),
(269, '8', 'SaMaNa', '2023-09-21 09:46:59', '2023-09-21 09:46:59'),
(270, '8', 'HsaPhaNa', '2023-09-21 09:47:12', '2023-09-21 09:47:12'),
(271, '8', 'SaTaYa', '2023-09-21 09:47:23', '2023-09-21 09:47:23'),
(272, '8', 'HsaPaWa', '2023-09-21 09:47:35', '2023-09-21 09:47:35'),
(273, '8', 'TaTaKa', '2023-09-21 09:47:55', '2023-09-21 09:47:55'),
(274, '8', 'TaYaNa', '2023-09-21 09:48:08', '2023-09-21 09:48:08'),
(275, '8', 'HtaLaNa', '2023-09-21 09:48:19', '2023-09-21 09:48:19'),
(276, '8', 'YaNaKha', '2023-09-21 09:48:30', '2023-09-21 09:48:30'),
(277, '8', 'YaSaKa', '2023-09-21 09:48:44', '2023-09-21 09:48:44'),
(278, '8', 'KaHtaNa', '2023-09-21 09:48:56', '2023-09-21 09:48:56'),
(279, '10', 'BaLaNa', '2023-09-21 09:49:28', '2023-09-21 09:49:28'),
(280, '10', 'KhaKhaNa', '2023-09-21 09:49:39', '2023-09-21 09:49:39'),
(281, '10', 'KhaZaNa', '2023-09-21 09:49:50', '2023-09-21 09:49:50'),
(282, '10', 'KaMaYa', '2023-09-21 09:50:02', '2023-09-21 09:50:02'),
(283, '10', 'KaHtaNa', '2023-09-21 09:50:11', '2023-09-21 09:50:11'),
(284, '10', 'LaMaNa', '2023-09-21 09:50:22', '2023-09-21 09:50:22'),
(285, '10', 'MaLaMa', '2023-09-21 09:50:32', '2023-09-21 09:50:32'),
(286, '10', 'MaDaNa', '2023-09-21 09:50:42', '2023-09-21 09:50:42'),
(287, '10', 'PaMaNa', '2023-09-21 09:50:53', '2023-09-21 09:50:53'),
(288, '10', 'TaPhaYa', '2023-09-21 09:51:05', '2023-09-21 09:51:05'),
(289, '10', 'TaHtaNa', '2023-09-21 09:51:20', '2023-09-21 09:51:20'),
(290, '10', 'YaMaNa', '2023-09-21 09:51:36', '2023-09-21 09:51:36'),
(291, '11', 'AhMaNa', '2023-09-21 09:52:05', '2023-09-21 09:52:05'),
(292, '11', 'BaThaTa', '2023-09-21 09:52:18', '2023-09-21 09:52:18'),
(293, '11', 'GaMaNa', '2023-09-21 09:52:28', '2023-09-21 09:52:28'),
(294, '11', 'KaPhaNa', '2023-09-21 09:52:38', '2023-09-21 09:52:38'),
(295, '11', 'KaTaNa', '2023-09-21 09:53:12', '2023-09-21 09:53:12'),
(296, '11', 'MaAhTa', '2023-09-21 09:53:25', '2023-09-21 09:53:25'),
(297, '11', 'MaTaNa', '2023-09-21 09:53:39', '2023-09-21 09:53:39'),
(298, '11', 'MaAhNa', '2023-09-21 09:53:52', '2023-09-21 09:53:52'),
(299, '11', 'MaOuNa', '2023-09-21 09:54:16', '2023-09-21 09:54:16'),
(300, '11', 'MaPaTa', '2023-09-21 09:54:26', '2023-09-21 09:54:26'),
(301, '11', 'PaTaNa', '2023-09-21 09:54:35', '2023-09-21 09:54:35'),
(303, '11', 'PaNaTa', '2023-09-21 09:55:05', '2023-09-21 09:55:05'),
(304, '11', 'PaNhaKa', '2023-09-21 09:55:24', '2023-09-21 09:55:24'),
(305, '11', 'YaThaTa', '2023-09-21 09:55:36', '2023-09-21 09:55:36'),
(306, '11', 'SaTaNa', '2023-09-21 09:55:45', '2023-09-21 09:55:45'),
(307, '11', 'ThaTaNa', '2023-09-21 09:55:56', '2023-09-21 09:55:56'),
(308, '11', 'TaKaNa', '2023-09-21 09:56:31', '2023-09-21 09:56:31'),
(309, '11', 'KaTaLa', '2023-09-21 09:56:42', '2023-09-21 09:56:42'),
(310, '11', 'TaPaWa', '2023-09-21 09:56:54', '2023-09-21 09:56:54'),
(311, '11', 'YaBaNa', '2023-09-21 09:57:06', '2023-09-21 09:57:06'),
(312, '11', 'MaPaNa', '2023-09-21 09:57:19', '2023-09-21 09:57:19'),
(313, '13', 'KhaYaHa', '2023-09-21 09:58:02', '2023-09-21 09:58:02'),
(314, '13', 'HaPaNa', '2023-09-21 09:58:11', '2023-09-21 09:58:11'),
(315, '13', 'HaPaTa', '2023-09-21 09:58:21', '2023-09-21 09:58:21'),
(316, '13', 'TaNaNa', '2023-09-21 09:58:29', '2023-09-21 09:58:29'),
(317, '13', 'HsaHsaNa', '2023-09-21 09:58:40', '2023-09-21 09:58:40'),
(318, '13', 'TaPaNa', '2023-09-21 09:58:49', '2023-09-21 09:58:49'),
(319, '13', 'KaLaNa', '2023-09-21 09:58:58', '2023-09-21 09:58:58'),
(320, '13', 'KaLaDa', '2023-09-21 09:59:08', '2023-09-21 09:59:08'),
(321, '13', 'KaTaNa', '2023-09-21 09:59:22', '2023-09-21 09:59:22'),
(322, '13', 'KaTaTa', '2023-09-21 09:59:34', '2023-09-21 09:59:34'),
(323, '13', 'KaHaNa', '2023-09-21 09:59:43', '2023-09-21 09:59:43'),
(324, '13', 'KaLaTa', '2023-09-21 09:59:54', '2023-09-21 09:59:54'),
(325, '13', 'KaKhaNa', '2023-09-21 10:00:03', '2023-09-21 10:00:03'),
(326, '13', 'KaMaNa', '2023-09-21 10:00:11', '2023-09-21 10:00:11'),
(327, '13', 'KaTaLa', '2023-09-21 10:00:19', '2023-09-21 10:00:19'),
(328, '13', 'KaTaNa', '2023-09-21 10:00:29', '2023-09-21 10:00:29'),
(342, '13', 'LaKhaNa', '2023-09-21 10:00:51', '2023-09-21 10:00:51'),
(344, '13', 'LaKhaTa', '2023-09-21 10:01:46', '2023-09-21 10:01:46'),
(345, '13', 'LaYaNa', '2023-09-21 10:01:56', '2023-09-21 10:01:56'),
(346, '13', 'LaKaNa', '2023-09-21 10:02:04', '2023-09-21 10:02:04'),
(347, '13', 'LaLaNa', '2023-09-21 10:02:13', '2023-09-21 10:02:13'),
(348, '13', 'MaBaNa', '2023-09-21 10:02:22', '2023-09-21 10:02:22'),
(349, '13', 'MaTaTa', '2023-09-21 10:02:31', '2023-09-21 10:02:31'),
(350, '13', 'MaKaNa', '2023-09-21 10:02:42', '2023-09-21 10:02:42'),
(351, '13', 'MaPaNa', '2023-09-21 10:02:54', '2023-09-21 10:02:54'),
(352, '13', 'MaPhaNa', '2023-09-21 10:03:11', '2023-09-21 10:03:11'),
(353, '13', 'MaSaNa', '2023-09-21 10:03:19', '2023-09-21 10:03:19'),
(354, '13', 'MaYaNa', '2023-09-21 10:03:28', '2023-09-21 10:03:28'),
(355, '13', 'MaKhaNa', '2023-09-21 10:03:40', '2023-09-21 10:03:40'),
(356, '13', 'MaLaNa', '2023-09-21 10:03:53', '2023-09-21 10:03:53'),
(357, '13', 'MaMaNa', '2023-09-21 10:04:05', '2023-09-21 10:04:05'),
(358, '13', 'MaMaTa', '2023-09-21 10:04:16', '2023-09-21 10:04:16'),
(359, '13', 'MaNaNa', '2023-09-21 10:04:28', '2023-09-21 10:04:28'),
(360, '13', 'MaTaNa', '2023-09-21 10:04:37', '2023-09-21 10:04:37'),
(361, '13', 'MaYaTa', '2023-09-21 10:04:56', '2023-09-21 10:04:56'),
(362, '13', 'MaYaNa', '2023-09-21 10:05:05', '2023-09-21 10:05:05'),
(363, '13', 'MaHsaTa', '2023-09-21 10:05:17', '2023-09-21 10:05:17'),
(364, '13', 'NaTaNa', '2023-09-21 10:05:26', '2023-09-21 10:05:26'),
(365, '13', 'NaKhaNa', '2023-09-21 10:05:38', '2023-09-21 10:05:38'),
(366, '13', 'NaMaTa', '2023-09-21 10:05:48', '2023-09-21 10:05:48'),
(367, '13', 'NaPhaNa', '2023-09-21 10:05:58', '2023-09-21 10:05:58'),
(368, '13', 'NaHsaNa', '2023-09-21 10:06:10', '2023-09-21 10:06:10'),
(369, '13', 'NaSaNa', '2023-09-21 10:06:25', '2023-09-21 10:06:25'),
(370, '13', 'NaKhaTa', '2023-09-21 10:06:34', '2023-09-21 10:06:34'),
(371, '13', 'NyaYaNa', '2023-09-21 10:06:47', '2023-09-21 10:06:47'),
(372, '13', 'PaYaNa', '2023-09-21 10:06:55', '2023-09-21 10:06:55'),
(373, '13', 'PaHsaNa', '2023-09-21 10:07:06', '2023-09-21 10:07:06'),
(374, '13', 'PaWaNa', '2023-09-21 10:07:14', '2023-09-21 10:07:14'),
(375, '13', 'PhaKhaNa', '2023-09-21 10:07:25', '2023-09-21 10:07:25'),
(376, '13', 'PaTaYa', '2023-09-21 10:07:34', '2023-09-21 10:07:34'),
(377, '13', 'PaLaNa', '2023-09-21 10:07:42', '2023-09-21 10:07:42'),
(378, '13', 'TaKhaLa', '2023-09-21 10:07:59', '2023-09-21 10:07:59'),
(379, '13', 'TaYaNa', '2023-09-21 10:08:09', '2023-09-21 10:08:09'),
(380, '13', 'TaKaNa', '2023-09-21 10:08:20', '2023-09-21 10:08:20'),
(381, '13', 'YaSaNa', '2023-09-21 10:08:30', '2023-09-21 10:08:30'),
(382, '13', 'YaNgaNa', '2023-09-21 10:08:41', '2023-09-21 10:08:41'),
(383, '13', 'NaTaYa', '2023-09-21 10:08:52', '2023-09-21 10:08:52'),
(384, '13', 'PaLaTa', '2023-09-21 10:08:59', '2023-09-21 10:08:59'),
(385, '13', 'KhaLaNa', '2023-09-21 10:09:20', '2023-09-21 10:09:20'),
(386, '13', 'MaHaYa', '2023-09-21 10:09:36', '2023-09-21 10:09:36'),
(387, '13', 'PaPaKa', '2023-09-21 10:09:46', '2023-09-21 10:09:46'),
(388, '13', 'TaMaNya', '2023-09-21 10:09:56', '2023-09-21 10:09:56'),
(389, '13', 'MaNgaNa', '2023-09-21 10:10:06', '2023-09-21 10:10:06'),
(390, '13', 'AhTaNa', '2023-09-21 10:10:14', '2023-09-21 10:10:14'),
(391, '13', 'TaLaNa', '2023-09-21 10:10:34', '2023-09-21 10:10:34'),
(392, '13', 'KaLaHta', '2023-09-21 10:10:45', '2023-09-21 10:10:45'),
(393, '13', 'HaMaNa', '2023-09-21 10:10:54', '2023-09-21 10:10:54'),
(394, '13', 'MaNaTa', '2023-09-21 10:11:08', '2023-09-21 10:11:08'),
(395, '13', 'MaPhaTa', '2023-09-21 10:11:18', '2023-09-21 10:11:18'),
(396, '13', 'MaKaHta', '2023-09-21 10:11:26', '2023-09-21 10:11:26'),
(397, '13', 'MaYaTa', '2023-09-21 10:11:35', '2023-09-21 10:11:35'),
(398, '13', 'MaPaTa', '2023-09-21 10:11:47', '2023-09-21 10:11:47'),
(399, '13', 'PaHsaTa', '2023-09-21 10:11:58', '2023-09-21 10:11:58'),
(400, '13', 'MaYaHta', '2023-09-21 10:12:24', '2023-09-21 10:12:24'),
(401, '13', 'PaLaHta', '2023-09-21 10:12:33', '2023-09-21 10:12:33'),
(402, '13', 'MaHtaNa', '2023-09-21 10:12:48', '2023-09-21 10:12:48'),
(403, '13', 'MaPaHta', '2023-09-21 10:12:58', '2023-09-21 10:12:58'),
(404, '13', 'MaHsaNa', '2023-09-21 10:13:07', '2023-09-21 10:13:07'),
(405, '13', 'MaKhaTa', '2023-09-21 10:13:15', '2023-09-21 10:13:15'),
(406, '13', 'MaKaTa', '2023-09-21 10:13:26', '2023-09-21 10:13:26'),
(407, '13', 'MaMaHta', '2023-09-21 10:13:36', '2023-09-21 10:13:36'),
(408, '13', 'TaTaNa', '2023-09-21 10:13:47', '2023-09-21 10:13:47'),
(409, '13', 'KaKaNa', '2023-09-21 10:13:54', '2023-09-21 10:13:54'),
(410, '13', 'MaHtaTa', '2023-09-21 10:14:06', '2023-09-21 10:14:06'),
(411, '13', 'MaLaTa', '2023-09-21 10:14:16', '2023-09-21 10:14:16'),
(412, '14', 'AhMaTa', '2023-09-21 10:15:01', '2023-09-21 10:15:01'),
(413, '14', 'BaKaLa', '2023-09-21 10:15:11', '2023-09-21 10:15:11'),
(414, '14', 'DaNaPha', '2023-09-21 10:15:20', '2023-09-21 10:15:20'),
(415, '14', 'DaDaYa', '2023-09-21 10:15:31', '2023-09-21 10:15:31'),
(416, '14', 'AhMaNa', '2023-09-21 10:15:40', '2023-09-21 10:15:40'),
(417, '14', 'HaKaKa', '2023-09-21 10:15:50', '2023-09-21 10:15:50'),
(418, '14', 'HaThaTa', '2023-09-21 10:16:02', '2023-09-21 10:16:02'),
(419, '14', 'AhGaPa', '2023-09-21 10:16:12', '2023-09-21 10:16:12'),
(420, '14', 'KaKaHta', '2023-09-21 10:16:27', '2023-09-21 10:16:27'),
(421, '14', 'KaLaNa', '2023-09-21 10:16:35', '2023-09-21 10:16:35'),
(422, '14', 'KaKhaNa', '2023-09-21 10:16:44', '2023-09-21 10:16:44'),
(423, '14', 'KaKaNa', '2023-09-21 10:16:53', '2023-09-21 10:16:53'),
(424, '14', 'KaPaNa', '2023-09-21 10:17:01', '2023-09-21 10:17:01'),
(425, '14', 'LaPaTa', '2023-09-21 10:17:12', '2023-09-21 10:17:12'),
(426, '14', 'LaMaNa', '2023-09-21 10:17:23', '2023-09-21 10:17:23'),
(427, '14', 'MaAhPa', '2023-09-21 10:17:34', '2023-09-21 10:17:34'),
(428, '14', 'MaMaKa', '2023-09-21 10:17:47', '2023-09-21 10:17:47'),
(429, '14', 'MaAhNa', '2023-09-21 10:17:57', '2023-09-21 10:17:57'),
(430, '14', 'MaMaNa', '2023-09-21 10:18:05', '2023-09-21 10:18:05'),
(431, '14', 'NgaPaTa', '2023-09-21 10:18:15', '2023-09-21 10:18:15'),
(432, '14', 'NgaTaKha', '2023-09-21 10:18:24', '2023-09-21 10:18:24'),
(433, '14', 'NgaYaKa', '2023-09-21 10:18:36', '2023-09-21 10:18:36'),
(434, '14', 'NgaHsaNa', '2023-09-21 10:18:48', '2023-09-21 10:18:48'),
(435, '14', 'NgaTaNa', '2023-09-21 10:18:59', '2023-09-21 10:18:59'),
(436, '14', 'PaTaNa', '2023-09-21 10:19:11', '2023-09-21 10:19:11'),
(437, '14', 'PaThaNa', '2023-09-21 10:19:21', '2023-09-21 10:19:31'),
(438, '14', 'PhaPaNa', '2023-09-21 10:19:46', '2023-09-21 10:19:46'),
(439, '14', 'PaSaLa', '2023-09-21 10:19:56', '2023-09-21 10:19:56'),
(440, '14', 'YaTaYa', '2023-09-21 10:20:07', '2023-09-21 10:20:07'),
(441, '14', 'TaPaNa', '2023-09-21 10:20:21', '2023-09-21 10:20:21'),
(442, '14', 'WaKhaMa', '2023-09-21 10:20:29', '2023-09-21 10:20:29'),
(443, '14', 'YaKaNa', '2023-09-21 10:20:39', '2023-09-21 10:20:39'),
(444, '14', 'ZaLaNa', '2023-09-21 10:20:53', '2023-09-21 10:20:53'),
(445, '14', 'PaTaYa', '2023-09-21 10:21:02', '2023-09-21 10:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'K pay', '2023-11-29 05:08:41', '2023-11-29 05:08:41'),
(2, 'Wave Money', '2023-11-29 05:08:56', '2023-11-29 05:08:56'),
(3, 'Aya Pay', '2023-11-29 05:09:47', '2023-11-29 05:09:47'),
(4, 'Cash', '2023-11-29 05:09:54', '2023-11-29 05:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'announcement_list', 'student', '2023-08-30 21:20:58', '2023-08-30 21:20:58'),
(4, 'announcement_detail', 'student', '2023-08-30 21:21:13', '2023-08-30 21:21:13'),
(5, 'Test', 'student', '2023-09-04 01:19:08', '2023-09-04 01:19:08'),
(7, 'permission-create', 'admin_user', '2023-09-04 01:23:06', '2023-09-04 01:23:06'),
(8, 'permission-edit', 'admin_user', '2023-09-04 01:23:20', '2023-09-04 01:23:20'),
(9, 'permission-delete', 'admin_user', '2023-09-04 01:23:30', '2023-09-04 01:23:30'),
(10, 'permission-list', 'admin_user', '2023-09-04 01:23:37', '2023-09-04 01:23:37'),
(11, 'role-create', 'admin_user', '2023-09-04 03:38:01', '2023-09-04 03:38:01'),
(12, 'role-edit', 'admin_user', '2023-09-04 03:38:10', '2023-09-04 03:38:10'),
(13, 'role-delete', 'admin_user', '2023-09-04 03:38:18', '2023-09-04 03:38:18'),
(14, 'role-list', 'admin_user', '2023-09-04 03:38:25', '2023-09-04 03:38:25'),
(15, 'user-list', 'admin_user', '2023-09-28 09:28:42', '2023-09-28 09:28:42'),
(16, 'user-delete', 'admin_user', '2023-09-28 09:28:50', '2023-09-28 09:28:50'),
(17, 'user-edit', 'admin_user', '2023-09-28 09:28:59', '2023-09-28 09:28:59'),
(18, 'user-create', 'admin_user', '2023-09-28 09:29:15', '2023-09-28 09:29:15'),
(19, 'academic-year-list', 'admin_user', '2023-09-28 10:03:24', '2023-09-28 10:03:24'),
(20, 'academic-year-create', 'admin_user', '2023-09-28 10:03:32', '2023-09-28 10:03:32'),
(21, 'academic-year-edit', 'admin_user', '2023-09-28 10:03:37', '2023-09-28 10:03:37'),
(22, 'academic-year-delete', 'admin_user', '2023-09-28 10:03:42', '2023-09-28 10:03:42'),
(23, 'announcement-list', 'admin_user', '2023-09-28 10:04:27', '2023-09-28 10:04:27'),
(24, 'announcement-create', 'admin_user', '2023-09-28 10:04:35', '2023-09-28 10:04:35'),
(25, 'announcement-edit', 'admin_user', '2023-09-28 10:04:40', '2023-09-28 10:04:40'),
(26, 'announcement-delete', 'admin_user', '2023-09-28 10:04:48', '2023-09-28 10:04:48'),
(27, 'class-list', 'admin_user', '2023-09-28 10:05:56', '2023-09-28 10:05:56'),
(28, 'class-create', 'admin_user', '2023-09-28 10:06:03', '2023-09-28 10:06:03'),
(29, 'class-edit', 'admin_user', '2023-09-28 10:06:08', '2023-09-28 10:06:08'),
(30, 'class-delete', 'admin_user', '2023-09-28 10:06:15', '2023-09-28 10:06:15'),
(31, 'course-list', 'admin_user', '2023-09-28 10:06:48', '2023-09-28 10:06:48'),
(32, 'course-create', 'admin_user', '2023-09-28 10:06:53', '2023-09-28 10:06:53'),
(33, 'course-edit', 'admin_user', '2023-09-28 10:06:58', '2023-09-28 10:06:58'),
(34, 'course-delete', 'admin_user', '2023-09-28 10:07:04', '2023-09-28 10:07:04'),
(39, 'expend-list', 'admin_user', '2023-09-28 10:08:17', '2023-09-28 10:08:17'),
(40, 'expend-create', 'admin_user', '2023-09-28 10:08:23', '2023-09-28 10:08:23'),
(41, 'expend-edit', 'admin_user', '2023-09-28 10:08:28', '2023-09-28 10:08:28'),
(42, 'expend-delete', 'admin_user', '2023-09-28 10:08:34', '2023-09-28 10:08:34'),
(43, 'forum-list', 'admin_user', '2023-09-28 10:08:56', '2023-09-28 10:08:56'),
(44, 'forum-create', 'admin_user', '2023-09-28 10:09:02', '2023-09-28 10:09:02'),
(45, 'forum-edit', 'admin_user', '2023-09-28 10:09:08', '2023-09-28 10:09:08'),
(46, 'forum-delete', 'admin_user', '2023-09-28 10:09:17', '2023-09-28 10:09:17'),
(47, 'income-list', 'admin_user', '2023-09-28 10:09:41', '2023-09-28 10:09:41'),
(48, 'income-create', 'admin_user', '2023-09-28 10:09:46', '2023-09-28 10:09:46'),
(49, 'income-edit', 'admin_user', '2023-09-28 10:09:51', '2023-09-28 10:09:51'),
(50, 'income-delete', 'admin_user', '2023-09-28 10:09:56', '2023-09-28 10:09:56'),
(51, 'job-list', 'admin_user', '2023-09-28 10:10:24', '2023-09-28 10:10:24'),
(52, 'job-create', 'admin_user', '2023-09-28 10:10:29', '2023-09-28 10:10:29'),
(53, 'job-edit', 'admin_user', '2023-09-28 10:10:33', '2023-09-28 10:10:33'),
(54, 'job-delete', 'admin_user', '2023-09-28 10:10:39', '2023-09-28 10:10:39'),
(55, 'medical-status-list', 'admin_user', '2023-09-28 10:11:12', '2023-09-28 10:11:12'),
(56, 'medical-status-create', 'admin_user', '2023-09-28 10:11:17', '2023-09-28 10:11:17'),
(57, 'medical-status-edit', 'admin_user', '2023-09-28 10:11:22', '2023-09-28 10:11:22'),
(58, 'medical-status-delete', 'admin_user', '2023-09-28 10:11:26', '2023-09-28 10:11:26'),
(59, 'nrc-info-list', 'admin_user', '2023-09-28 10:11:58', '2023-09-28 10:11:58'),
(60, 'nrc-info-create', 'admin_user', '2023-09-28 10:12:03', '2023-09-28 10:12:03'),
(61, 'nrc-info-edit', 'admin_user', '2023-09-28 10:12:08', '2023-09-28 10:12:08'),
(62, 'nrc-info-delete', 'admin_user', '2023-09-28 10:12:16', '2023-09-28 10:12:16'),
(71, 'state-list', 'admin_user', '2023-09-28 10:14:55', '2023-09-28 10:14:55'),
(72, 'state-create', 'admin_user', '2023-09-28 10:15:00', '2023-09-28 10:15:00'),
(73, 'state-edit', 'admin_user', '2023-09-28 10:15:04', '2023-09-28 10:15:04'),
(74, 'state-delete', 'admin_user', '2023-09-28 10:15:09', '2023-09-28 10:15:09'),
(75, 'student-list', 'admin_user', '2023-09-28 10:15:42', '2023-09-28 10:15:42'),
(76, 'student-create', 'admin_user', '2023-09-28 10:15:47', '2023-09-28 10:15:47'),
(77, 'student-edit', 'admin_user', '2023-09-28 10:15:52', '2023-09-28 10:15:52'),
(78, 'student-delete', 'admin_user', '2023-09-28 10:15:57', '2023-09-28 10:15:57'),
(79, 'teacher-list', 'admin_user', '2023-09-28 10:16:29', '2023-09-28 10:16:29'),
(80, 'teacher-create', 'admin_user', '2023-09-28 10:16:36', '2023-09-28 10:16:36'),
(81, 'teacher-edit', 'admin_user', '2023-09-28 10:16:40', '2023-09-28 10:16:40'),
(82, 'teacher-delete', 'admin_user', '2023-09-28 10:16:45', '2023-09-28 10:16:51'),
(83, 'township-list', 'admin_user', '2023-09-28 10:17:17', '2023-09-28 10:17:17'),
(84, 'township-create', 'admin_user', '2023-09-28 10:17:24', '2023-09-28 10:17:24'),
(85, 'township-edit', 'admin_user', '2023-09-28 10:17:28', '2023-09-28 10:17:28'),
(86, 'township-delete', 'admin_user', '2023-09-28 10:17:34', '2023-09-28 10:17:34'),
(87, 'batch-list', 'admin_user', '2023-11-21 15:56:41', '2023-11-21 15:56:41'),
(88, 'batch-create', 'admin_user', '2023-11-21 15:56:48', '2023-11-21 15:56:48'),
(89, 'batch-edit', 'admin_user', '2023-11-21 15:56:55', '2023-11-21 15:56:55'),
(90, 'batch-delete', 'admin_user', '2023-11-21 15:57:03', '2023-11-21 15:57:03'),
(91, 'teacher-attendance-list', 'admin_user', '2024-01-03 05:58:01', '2024-01-03 05:58:01'),
(92, 'teacher-attendance-create', 'admin_user', '2024-01-03 05:58:09', '2024-01-03 05:58:09'),
(93, 'teacher-attendance-edit', 'admin_user', '2024-01-03 05:58:18', '2024-01-03 05:58:18'),
(94, 'teacher-attendance-delete', 'admin_user', '2024-01-03 05:58:26', '2024-01-03 05:58:26'),
(95, 'enrollment-list', 'admin_user', '2024-01-11 08:35:15', '2024-01-11 08:35:15'),
(96, 'voucher-list', 'admin_user', '2024-01-11 08:37:23', '2024-01-11 08:37:23'),
(97, 'voucher', 'admin_user', '2024-01-11 08:37:32', '2024-01-11 08:37:32'),
(98, 'room-list', 'admin_user', '2024-01-11 08:38:54', '2024-01-11 08:38:54'),
(99, 'room-create', 'admin_user', '2024-01-11 08:39:03', '2024-01-11 08:39:03'),
(100, 'room-edit', 'admin_user', '2024-01-11 08:39:12', '2024-01-11 08:39:12'),
(101, 'room-delete', 'admin_user', '2024-01-11 08:39:22', '2024-01-11 08:39:22'),
(102, 'student-absent-list', 'admin_user', '2024-01-11 08:45:12', '2024-01-11 08:45:12'),
(103, 'income-source-list', 'admin_user', '2024-01-11 08:46:50', '2024-01-11 08:46:50'),
(104, 'income-source-create', 'admin_user', '2024-01-11 08:46:58', '2024-01-11 08:46:58'),
(105, 'income-source-edit', 'admin_user', '2024-01-11 08:47:09', '2024-01-11 08:47:09'),
(106, 'income-source-delete', 'admin_user', '2024-01-11 08:47:19', '2024-01-11 08:47:19'),
(107, 'dashboard-page', 'admin_user', '2024-01-11 08:49:19', '2024-01-11 08:49:19'),
(108, 'staff-list', 'admin_user', '2024-01-11 10:21:50', '2024-01-11 10:21:50'),
(109, 'staff-create', 'admin_user', '2024-01-11 10:22:12', '2024-01-11 10:22:12'),
(110, 'staff-edit', 'admin_user', '2024-01-11 10:22:22', '2024-01-11 10:22:22'),
(111, 'staff-delete', 'admin_user', '2024-01-11 10:22:33', '2024-01-11 10:22:33'),
(112, 'teacher-leave-list', 'admin_user', '2024-01-11 10:23:53', '2024-01-11 10:23:53'),
(113, 'teacher-leave-create', 'admin_user', '2024-01-11 10:24:01', '2024-01-11 10:24:01'),
(114, 'teacher-leave-edit', 'admin_user', '2024-01-11 10:24:12', '2024-01-11 10:24:12'),
(115, 'teacher-leave-delete', 'admin_user', '2024-01-11 10:24:22', '2024-01-11 10:24:22'),
(116, 'staff-leave-list', 'admin_user', '2024-01-11 10:25:48', '2024-01-11 10:25:48'),
(117, 'staff-leave-create', 'admin_user', '2024-01-11 10:26:02', '2024-01-11 10:26:02'),
(118, 'staff-leave-edit', 'admin_user', '2024-01-11 10:26:16', '2024-01-11 10:26:16'),
(119, 'staff-leave-delete', 'admin_user', '2024-01-11 10:26:30', '2024-01-11 10:26:30'),
(120, 'payment-type-list', 'admin_user', '2024-02-05 09:31:42', '2024-02-05 09:31:42'),
(121, 'payment-type-create', 'admin_user', '2024-02-05 09:31:51', '2024-02-05 09:31:51'),
(122, 'payment-type-edit', 'admin_user', '2024-02-05 09:32:00', '2024-02-05 09:32:00'),
(123, 'payment-type-delete', 'admin_user', '2024-02-05 09:32:09', '2024-02-05 09:32:09'),
(124, 'course-fee-list', 'admin_user', '2024-02-26 08:56:45', '2024-02-26 08:56:45'),
(125, 'course-fee-create', 'admin_user', '2024-02-26 08:56:54', '2024-02-26 08:56:54'),
(126, 'course-fee-edit', 'admin_user', '2024-02-26 08:57:03', '2024-02-26 08:57:03'),
(127, 'course-fee-delete', 'admin_user', '2024-02-26 08:57:12', '2024-02-26 08:57:12'),
(128, 'future-interest-list', 'admin_user', '2024-02-26 08:57:57', '2024-02-26 08:57:57'),
(129, 'future-interest-create', 'admin_user', '2024-02-26 08:58:06', '2024-02-26 08:58:06'),
(130, 'future-interest-edit', 'admin_user', '2024-02-26 08:58:14', '2024-02-26 08:58:14'),
(131, 'future-interest-delete', 'admin_user', '2024-02-26 08:58:24', '2024-02-26 08:58:24'),
(132, 'source-survey-list', 'admin_user', '2024-02-26 08:59:06', '2024-02-26 08:59:06'),
(133, 'source-survey-create', 'admin_user', '2024-02-26 08:59:16', '2024-02-26 08:59:16'),
(134, 'source-survey-edit', 'admin_user', '2024-02-26 08:59:25', '2024-02-26 08:59:25'),
(135, 'source-survey-delete', 'admin_user', '2024-02-26 08:59:34', '2024-02-26 08:59:34'),
(136, 'student-detail', 'admin_user', '2024-02-26 09:03:51', '2024-02-26 09:03:51'),
(137, 'student-enrollment-detail', 'admin_user', '2024-02-26 09:05:45', '2024-02-26 09:05:45'),
(138, 'teacher-detail', 'admin_user', '2024-02-26 09:06:54', '2024-02-26 09:06:54'),
(139, 'teacher-enrollment-detail', 'admin_user', '2024-02-26 09:07:48', '2024-02-26 09:07:48'),
(140, 'staff-detail', 'admin_user', '2024-02-26 09:11:09', '2024-02-26 09:11:09'),
(141, 'course-detail', 'admin_user', '2024-02-26 09:12:40', '2024-02-26 09:12:40'),
(142, 'course-grid-view', 'admin_user', '2024-02-26 09:14:36', '2024-02-26 09:14:36'),
(143, 'log-history', 'admin_user', '2024-02-26 09:16:23', '2024-02-26 09:16:23'),
(144, 'income-export', 'admin_user', '2024-02-26 09:17:04', '2024-02-26 09:17:04'),
(145, 'expend-export', 'admin_user', '2024-02-26 09:18:19', '2024-02-26 09:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_name` text DEFAULT NULL,
  `title` longtext DEFAULT NULL,
  `reading_type` text DEFAULT NULL,
  `qcategory_id` text DEFAULT NULL,
  `qtype` text DEFAULT NULL,
  `answer_reason` longtext DEFAULT NULL,
  `true_answer` text DEFAULT NULL,
  `mark` text DEFAULT NULL,
  `audio_file` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `student_category` text DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `remarks` longtext DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_name`, `title`, `reading_type`, `qcategory_id`, `qtype`, `answer_reason`, `true_answer`, `mark`, `audio_file`, `photo`, `student_category`, `created_by`, `status`, `remarks`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(11, '다음 그림을 보고 맞는 단어나 문장을 고르십시오.', '다음 그림을 보고 맞는 단어나 문장을 고르십시오.', '1', NULL, '1', NULL, '가방', '5', NULL, '1694343384_bag.png', 'Job', '1', NULL, 're', '1', '2023-09-10 04:26:25', '2023-09-10 04:26:25'),
(12, '다음 그림을 보고 맞는 단어나 문장을 고르십시오.', '다음 그림을 보고 맞는 단어나 문장을 고르십시오.', '1', NULL, '1', NULL, '칼', '5', NULL, '1694358180_scissors.png', 'Job', '1', NULL, 'remarks', '1', '2023-09-10 08:33:00', '2023-09-10 08:33:00'),
(13, '다음 그림을 보고 맞는 단어나 문장을 고르십시오.', '다음 그림을 보고 맞는 단어나 문장을 고르십시오.', '1', NULL, '1', NULL, '공책', '5', NULL, '1694358230_calculator.png', 'Job', '1', NULL, '3', '1', '2023-09-10 08:33:50', '2023-09-10 08:33:50'),
(14, '가：괜찮아요? 많이 아파 보여요. 나：_______에 걸렸어요. 열도 나고 목도 아파요.', '빈칸에 들어갈 가장 알맞은 것을 고르십시오.', '2', NULL, NULL, NULL, '약', '5', NULL, NULL, 'Job', '1', NULL, 'req', '1', '2023-09-10 08:35:01', '2023-09-10 08:35:01'),
(15, '저는 구청에서 한국말을 배웠어요. 1월부터 6월까지 6 _____ 동안 배웠어요.', '빈칸에 들어갈 가장 알맞은 것을 고르십시오.', '2', NULL, NULL, NULL, '월', '5', NULL, NULL, 'Job', '1', NULL, 're', '1', '2023-09-10 08:36:04', '2023-09-10 08:36:04'),
(16, '저는 어제 시장에 갔어요. _________에서 과일을 샀어요.', '빈칸에 들어갈 가장 알맞은 것을 고르십시오', '2', NULL, '1', NULL, '여기', '5', NULL, NULL, 'Job', '1', NULL, 'fg', '1', '2023-09-10 08:36:52', '2023-09-10 08:36:52'),
(17, '다음과 같은 표지판은 어떤 곳에서 볼 수 있습니까?', '다음 질문에 답하십시오.', '3', NULL, '1', NULL, '모자를 파는 곳', '5', NULL, '1694358472_picture.png', 'Job', '1', NULL, 'rere', '1', '2023-09-10 08:37:52', '2023-09-10 08:37:52'),
(18, '다음 표지를 맞게 설명한 것을 고르십시오.', ') 다음 질문에 답하십시오.', '3', NULL, '1', NULL, '공사장으로 가려면 우회전하십시오.', '5', NULL, '1694358537_dashboard.png', 'Job', '1', NULL, 'trtw', '1', '2023-09-10 08:38:57', '2023-09-10 08:38:57'),
(19, '다음 표지를 맞게 설명한 것을 고르십시오', '다음 질문에 답하십시오', '3', NULL, '1', NULL, '공사 중이니까 이 길로만 다닐 수 있습니다.', '5', NULL, '1694358605_menu.png', 'Job', '1', NULL, 'rer', '1', '2023-09-10 08:40:05', '2023-09-10 08:40:05'),
(20, '이 사람은 어떤 남자를 좋아합니까? 저는 키가큰 남자가좋아요. 그리고 얼굴이잘생긴 남자보다는마음이 착한 남자를 좋아해요. 열심히 일하는 사람이면 더 좋겠지요.', '이 사람은 어떤 남자를 좋아합니까?', '4', NULL, '1', NULL, '키가 크고 마음이 착한 남자', '5', NULL, NULL, 'Job', '1', NULL, 'req', '1', '2023-09-10 08:41:18', '2023-09-10 08:41:18'),
(21, '이 사람은 오늘 저녁에 무엇을 하겠습니까? 저는 오늘 아침에 집안을 깨끗이 청소했습니다. 그리고 시장에 가서 고기와 야채를 샀습니다. 점심때 불고기와 잡채를만들려고 합니다. 오늘 저녁에 고향 친구들을 집 으로 초대했기 때문입니다. 친구들과 오랜만에 재미있게 놀겠습니다.', '이 사람은 오늘 저녁에 무엇을 하겠습니까?', '4', NULL, '1', NULL, '시장에 갑니다', '5', NULL, NULL, 'Job', '1', NULL, 'reqw', '1', '2023-09-10 08:42:13', '2023-09-10 08:42:13'),
(22, '이 사람은 언제 한국에 왔습니까? 저는 중국 사람입니다. 1년 전에 한국에 일하러 왔습니다. 앞으로 2년 더 한국에서 살면서 일할 겁니다. 돈을 많이 모은 후에 고향에 돌아가서 집을 사려고 합니다.', '이 사람은 언제 한국에 왔습니까?', '4', NULL, '1', NULL, '올해', '4', NULL, NULL, 'Job', '1', NULL, '5', '1', '2023-09-10 08:43:12', '2023-09-10 08:43:12'),
(23, '가 : 토요일에 뭐 할 거예요?  나 : 집 근처에 있는 ______에서 산책도 하고 운동도 하려고 해요.', '빈칸에 들어갈 가장 알맞은 것을 고르십시오.', '2', NULL, '1', NULL, '① 공원', '5', NULL, NULL, 'Job', '1', NULL, NULL, '1', '2023-09-14 22:11:39', '2023-09-14 22:11:39'),
(24, '제가 제일 좋아하는 ________은/는 가을입니다.', NULL, '2', NULL, '1', NULL, '① 음식', '5', NULL, NULL, 'Job', '1', NULL, NULL, '1', '2023-09-14 22:30:38', '2023-09-14 22:30:38'),
(25, '서울에서 버스나 지하철을 탈 때 교통카드를 사용하면 아주 편리합니다. 현금이 없\r\n을 때도 교통카드를 이용해서 차를 탈 수 있습니다. 그리고 교통카드를 사용하면\r\n버스나 지하철, 마을버스 요금을 할인 받을 수 있습니다. 교통카드는 지하철역이나\r\n버스 정류장, 편의점 등에서 살 수 있습니다. 전에는 교통카드로 택시를 탈 수 없었\r\n지만 요즘은 택시에서도 교통카드로 요금을 낼 수 있어서 얼마나 편한지 모릅니다.', '교통카드로 탈 수 없는 것을 고르십시오.', '5', NULL, '1', NULL, '① 버스', '5', NULL, NULL, 'Job', '1', NULL, NULL, '1', '2023-09-14 22:51:20', '2023-09-14 22:51:20'),
(26, '서울에서 버스나 지하철을 탈 때 교통카드를 사용하면 아주 편리합니다. 현금이 없\r\n을 때도 교통카드를 이용해서 차를 탈 수 있습니다. 그리고 교통카드를 사용하면\r\n버스나 지하철, 마을버스 요금을 할인 받을 수 있습니다. 교통카드는 지하철역이나\r\n버스 정류장, 편의점 등에서 살 수 있습니다. 전에는 교통카드로 택시를 탈 수 없었\r\n지만 요즘은 택시에서도 교통카드로 요금을 낼 수 있어서 얼마나 편한지 모릅니다.', '이 글의 내용과 다른 것을 고르십시오', '5', NULL, '1', NULL, '① 교통카드로 택시도 이용할 수 있습니다', '5', NULL, NULL, 'Job', '1', NULL, NULL, '1', '2023-09-14 22:52:27', '2023-09-14 22:52:27'),
(27, '한국 생활에서 꼭 알아 두어야 하는 전화번호가 몇 개 있습니다. 예를 들어, 어떤\r\n장소의 전화번호를 알고 싶을 때는 114번에 전화를 하면 알려 줍니다. 그리고 날\r\n씨를알고싶으면131번, 현재의 정확한시간을알고싶으면 116번, 갑자기아픈사\r\n람이 생기거나 불이 났을 때는 119번에 전화하면 됩니다. 이 번호들을 알고 있으면\r\n한국에서 생활할 때 아주 ㉠ .', '출입국관리사무소의 전화번호를 알고 싶습니다. 몇 번에 전화하면 됩니까?', '5', NULL, '1', NULL, '① 114번', '5', NULL, NULL, 'Job', '1', NULL, NULL, '1', '2023-09-14 22:53:36', '2023-09-14 22:53:36'),
(28, '한국 생활에서 꼭 알아 두어야 하는 전화번호가 몇 개 있습니다. 예를 들어, 어떤\r\n장소의 전화번호를 알고 싶을 때는 114번에 전화를 하면 알려 줍니다. 그리고 날\r\n씨를알고싶으면131번, 현재의 정확한시간을알고싶으면 116번, 갑자기아픈사\r\n람이 생기거나 불이 났을 때는 119번에 전화하면 됩니다. 이 번호들을 알고 있으면\r\n한국에서 생활할 때 아주 ㉠ .', '빈칸 ㉠_____에 들어갈 알맞은 것을 고르십시오', '5', NULL, '1', NULL, '① 빠릅니다', '5', NULL, NULL, 'Job', '1', NULL, NULL, '1', '2023-09-14 22:54:35', '2023-09-14 22:54:35'),
(29, '옛날 한국 사람들은 쌀로 만든 밥을 주로 먹었습니다. 그렇지만 생일이나 결혼식\r\n등 잔치가 있을 때 특별한 음식으로 국수를 먹었습니다. 지금은 보통 때에도 여러\r\n가지 국수를 즐겨먹습니다. 따뜻한 국물과함께 먹는 온면, 칼국수, 국물 없이비벼\r\n먹는 비빔국수, 차갑게 먹는 냉면, 콩을 갈아서 만든 콩국수 등 여러 종류의 국수가\r\n많이 있습니다.', '옛날에는 주로 언제 국수를 먹었습니까?', '5', NULL, '1', NULL, '① 잔칫날', '5', NULL, NULL, 'Job', '1', NULL, NULL, '1', '2023-09-14 22:55:36', '2023-09-14 22:55:36'),
(30, '옛날 한국 사람들은 쌀로 만든 밥을 주로 먹었습니다. 그렇지만 생일이나 결혼식\r\n등 잔치가 있을 때 특별한 음식으로 국수를 먹었습니다. 지금은 보통 때에도 여러\r\n가지 국수를 즐겨먹습니다. 따뜻한 국물과함께 먹는 온면, 칼국수, 국물 없이비벼\r\n먹는 비빔국수, 차갑게 먹는 냉면, 콩을 갈아서 만든 콩국수 등 여러 종류의 국수가\r\n많이 있습니다.', '잘못 설명한 것을 고르십시오.', '5', NULL, '1', NULL, '① 콩국수는 쌀을 갈아서 만듭니다.', '5', NULL, NULL, 'Job', '1', NULL, NULL, '1', '2023-09-14 22:56:35', '2023-09-14 22:56:35'),
(33, 'Lorem Question', 'Lorem Title', '6', NULL, '1', NULL, 'Lorem True', '10', NULL, '1698993019_air-conditioner.png', 'Job', '1', NULL, 'Lorem Ipsum', '1', '2023-11-03 06:30:19', '2023-11-03 06:30:19'),
(34, 'Reading Question 7', 'Title 7', '7', NULL, '1', NULL, '1', '5', NULL, '1699161571_garlic.png', 'Job', '1', NULL, 're', '1', '2023-11-05 05:19:31', '2023-11-05 05:19:31'),
(35, 'Reading Question 8', 'Reading Title 8', '8', NULL, '1', NULL, '1', '7', NULL, '1699161621_cheese.png', 'Job', '1', NULL, 're', '1', '2023-11-05 05:20:21', '2023-11-05 05:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `question_answers`
--

CREATE TABLE `question_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` text DEFAULT NULL,
  `answer` longtext DEFAULT NULL,
  `status` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_answers`
--

INSERT INTO `question_answers` (`id`, `question_id`, `answer`, `status`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(42, '11', '가방', NULL, NULL, '2023-09-10 04:26:25', '2023-09-10 04:26:25'),
(43, '11', '공책', NULL, NULL, '2023-09-10 04:26:25', '2023-09-10 04:26:25'),
(44, '11', '수첩', NULL, NULL, '2023-09-10 04:26:25', '2023-09-10 04:26:25'),
(45, '11', '안경', NULL, NULL, '2023-09-10 04:26:25', '2023-09-10 04:26:25'),
(46, '12', '칼', NULL, NULL, '2023-09-10 08:33:00', '2023-09-10 08:33:00'),
(47, '12', '가위', NULL, NULL, '2023-09-10 08:33:00', '2023-09-10 08:33:00'),
(48, '12', '젓가락', NULL, NULL, '2023-09-10 08:33:00', '2023-09-10 08:33:00'),
(49, '12', '숟가락', NULL, NULL, '2023-09-10 08:33:00', '2023-09-10 08:33:00'),
(50, '13', '공책', NULL, NULL, '2023-09-10 08:33:50', '2023-09-10 08:33:50'),
(51, '13', '수첩', NULL, NULL, '2023-09-10 08:33:50', '2023-09-10 08:33:50'),
(52, '13', '컴퓨터', NULL, NULL, '2023-09-10 08:33:50', '2023-09-10 08:33:50'),
(53, '13', '계산기', NULL, NULL, '2023-09-10 08:33:50', '2023-09-10 08:33:50'),
(54, '14', '약', NULL, NULL, '2023-09-10 08:35:01', '2023-09-10 08:35:01'),
(55, '14', '병원', NULL, NULL, '2023-09-10 08:35:01', '2023-09-10 08:35:01'),
(56, '14', '기침', NULL, NULL, '2023-09-10 08:35:01', '2023-09-10 08:35:01'),
(57, '14', '감기', NULL, NULL, '2023-09-10 08:35:01', '2023-09-10 08:35:01'),
(58, '15', '월', NULL, NULL, '2023-09-10 08:36:04', '2023-09-10 08:36:04'),
(59, '15', '년', NULL, NULL, '2023-09-10 08:36:04', '2023-09-10 08:36:04'),
(60, '15', '개월', NULL, NULL, '2023-09-10 08:36:04', '2023-09-10 08:36:04'),
(61, '15', '시간', NULL, NULL, '2023-09-10 08:36:04', '2023-09-10 08:36:04'),
(62, '16', '여기', NULL, NULL, '2023-09-10 08:36:52', '2023-09-10 08:36:52'),
(63, '16', '거기', NULL, NULL, '2023-09-10 08:36:52', '2023-09-10 08:36:52'),
(64, '16', '어디', NULL, NULL, '2023-09-10 08:36:52', '2023-09-10 08:36:52'),
(65, '16', '저기', NULL, NULL, '2023-09-10 08:36:52', '2023-09-10 08:36:52'),
(66, '17', '모자를 파는 곳', NULL, NULL, '2023-09-10 08:37:52', '2023-09-10 08:37:52'),
(67, '17', '공사를 하는 곳', NULL, NULL, '2023-09-10 08:37:52', '2023-09-10 08:37:52'),
(68, '17', '차를 세우는 곳', NULL, NULL, '2023-09-10 08:37:52', '2023-09-10 08:37:52'),
(69, '17', '물건을 만드는 곳', NULL, NULL, '2023-09-10 08:37:52', '2023-09-10 08:37:52'),
(70, '18', '공사장으로 가려면 우회전하십시오.', NULL, NULL, '2023-09-10 08:38:57', '2023-09-10 08:38:57'),
(71, '18', '공사 중에는 주차를 하지 마십시오.', NULL, NULL, '2023-09-10 08:38:57', '2023-09-10 08:38:57'),
(72, '18', '공사를 하고 있으니까 돌아가십시오', NULL, NULL, '2023-09-10 08:38:57', '2023-09-10 08:38:57'),
(73, '18', '공사장에서는 안전모를 착용하십시오', NULL, NULL, '2023-09-10 08:38:57', '2023-09-10 08:38:57'),
(74, '19', '공사 중이니까 이 길로만 다닐 수 있습니다.', NULL, NULL, '2023-09-10 08:40:05', '2023-09-10 08:40:05'),
(75, '19', '보호구를 착용하지 않으면 들어갈 수 없습니다', NULL, NULL, '2023-09-10 08:40:05', '2023-09-10 08:40:05'),
(76, '19', '공사를 하고 있으니까 빨리 운전하면 안 됩니다', NULL, NULL, '2023-09-10 08:40:05', '2023-09-10 08:40:05'),
(77, '19', '여기에서일하는사람이아니면들어갈수없습니다.', NULL, NULL, '2023-09-10 08:40:05', '2023-09-10 08:40:05'),
(78, '20', '키가 크고 마음이 착한 남자', NULL, NULL, '2023-09-10 08:41:18', '2023-09-10 08:41:18'),
(79, '20', '키는 작지만 얼굴이 잘생긴 남자', NULL, NULL, '2023-09-10 08:41:18', '2023-09-10 08:41:18'),
(80, '20', '얼굴이 잘생기고 마음이 착한 남자', NULL, NULL, '2023-09-10 08:41:18', '2023-09-10 08:41:18'),
(81, '20', '얼굴이 잘생기고 열심히 일하는 남자', NULL, NULL, '2023-09-10 08:41:18', '2023-09-10 08:41:18'),
(82, '21', '시장에 갑니다', NULL, NULL, '2023-09-10 08:42:13', '2023-09-10 08:42:13'),
(83, '21', '친구들과 놉니다.', NULL, NULL, '2023-09-10 08:42:13', '2023-09-10 08:42:13'),
(84, '21', '집안을 청소합니다.', NULL, NULL, '2023-09-10 08:42:13', '2023-09-10 08:42:13'),
(85, '21', '불고기와 잡채를 만듭니다.', NULL, NULL, '2023-09-10 08:42:13', '2023-09-10 08:42:13'),
(86, '22', '올해', NULL, NULL, '2023-09-10 08:43:12', '2023-09-10 08:43:12'),
(87, '22', '1년 전', NULL, NULL, '2023-09-10 08:43:12', '2023-09-10 08:43:12'),
(88, '22', '2년 전', NULL, NULL, '2023-09-10 08:43:12', '2023-09-10 08:43:12'),
(89, '22', '3년 전', NULL, NULL, '2023-09-10 08:43:12', '2023-09-10 08:43:12'),
(90, '23', '① 공원', NULL, NULL, '2023-09-14 22:11:39', '2023-09-14 22:11:39'),
(91, '23', '② 은행', NULL, NULL, '2023-09-14 22:11:39', '2023-09-14 22:11:39'),
(92, '23', '③ 영화관', NULL, NULL, '2023-09-14 22:11:39', '2023-09-14 22:11:39'),
(93, '23', '④ 관광 안내 센터', NULL, NULL, '2023-09-14 22:11:39', '2023-09-14 22:11:39'),
(94, '24', '① 음식', NULL, NULL, '2023-09-14 22:30:38', '2023-09-14 22:30:38'),
(95, '24', '② 운동', NULL, NULL, '2023-09-14 22:30:38', '2023-09-14 22:30:38'),
(96, '24', '③ 과일', NULL, NULL, '2023-09-14 22:30:38', '2023-09-14 22:30:38'),
(97, '24', '④ 계절', NULL, NULL, '2023-09-14 22:30:38', '2023-09-14 22:30:38'),
(98, '25', '① 버스', NULL, NULL, '2023-09-14 22:51:20', '2023-09-14 22:51:20'),
(99, '25', '② 기차', NULL, NULL, '2023-09-14 22:51:20', '2023-09-14 22:51:20'),
(100, '25', '③ 지하철', NULL, NULL, '2023-09-14 22:51:20', '2023-09-14 22:51:20'),
(101, '25', '④ 마을버스', NULL, NULL, '2023-09-14 22:51:20', '2023-09-14 22:51:20'),
(102, '26', '① 교통카드로 택시도 이용할 수 있습니다', NULL, NULL, '2023-09-14 22:52:27', '2023-09-14 22:52:27'),
(103, '26', '② 교통카드로 은행에서 현금을 찾을 수 있습니다', NULL, NULL, '2023-09-14 22:52:27', '2023-09-14 22:52:27'),
(104, '26', '③ 현금이 없어도 교통카드만 있으면 차를 탈 수 있습니다', NULL, NULL, '2023-09-14 22:52:27', '2023-09-14 22:52:27'),
(105, '26', '④ 교통카드를 쓰면 현금을 사용할 때보다 요금이 더 쌉니다', NULL, NULL, '2023-09-14 22:52:27', '2023-09-14 22:52:27'),
(106, '27', '① 114번', NULL, NULL, '2023-09-14 22:53:36', '2023-09-14 22:53:36'),
(107, '27', '② 131번', NULL, NULL, '2023-09-14 22:53:36', '2023-09-14 22:53:36'),
(108, '27', '③ 116번', NULL, NULL, '2023-09-14 22:53:36', '2023-09-14 22:53:36'),
(109, '27', '④ 119번', NULL, NULL, '2023-09-14 22:53:36', '2023-09-14 22:53:36'),
(110, '28', '① 빠릅니다', NULL, NULL, '2023-09-14 22:54:35', '2023-09-14 22:54:35'),
(111, '28', '② 불편합니다', NULL, NULL, '2023-09-14 22:54:35', '2023-09-14 22:54:35'),
(112, '28', '③ 편리합니다', NULL, NULL, '2023-09-14 22:54:35', '2023-09-14 22:54:35'),
(113, '28', '④ 복잡합니다', NULL, NULL, '2023-09-14 22:54:35', '2023-09-14 22:54:35'),
(114, '29', '① 잔칫날', NULL, NULL, '2023-09-14 22:55:36', '2023-09-14 22:55:36'),
(115, '29', '② 시험 보는 날', NULL, NULL, '2023-09-14 22:55:36', '2023-09-14 22:55:36'),
(116, '29', '③ 날씨가 더운 날', NULL, NULL, '2023-09-14 22:55:36', '2023-09-14 22:55:36'),
(117, '29', '④ 날씨가 추운 날', NULL, NULL, '2023-09-14 22:55:36', '2023-09-14 22:55:36'),
(118, '30', '① 콩국수는 쌀을 갈아서 만듭니다.', NULL, NULL, '2023-09-14 22:56:35', '2023-09-14 22:56:35'),
(119, '30', '② 냉면은 찬 국물과 함께 나옵니다', NULL, NULL, '2023-09-14 22:56:35', '2023-09-14 22:56:35'),
(120, '30', '③ 온면은 따뜻한 국물과 함께 나옵니다', NULL, NULL, '2023-09-14 22:56:35', '2023-09-14 22:56:35'),
(121, '30', '④ 비빔국수는 국물 없이 비벼 먹습니다.', NULL, NULL, '2023-09-14 22:56:35', '2023-09-14 22:56:35'),
(130, '33', 'Lorem True', NULL, NULL, '2023-11-03 06:30:19', '2023-11-03 06:30:19'),
(131, '33', 'Lorem True1', NULL, NULL, '2023-11-03 06:30:19', '2023-11-03 06:30:19'),
(132, '33', 'Lorem True2', NULL, NULL, '2023-11-03 06:30:19', '2023-11-03 06:30:19'),
(133, '33', 'Lorem True3', NULL, NULL, '2023-11-03 06:30:19', '2023-11-03 06:30:19'),
(134, '34', '1', NULL, NULL, '2023-11-05 05:19:31', '2023-11-05 05:19:31'),
(135, '34', '2', NULL, NULL, '2023-11-05 05:19:31', '2023-11-05 05:19:31'),
(136, '34', '3', NULL, NULL, '2023-11-05 05:19:31', '2023-11-05 05:19:31'),
(137, '34', '4', NULL, NULL, '2023-11-05 05:19:31', '2023-11-05 05:19:31'),
(138, '35', '1', NULL, NULL, '2023-11-05 05:20:21', '2023-11-05 05:20:21'),
(139, '35', '2', NULL, NULL, '2023-11-05 05:20:21', '2023-11-05 05:20:21'),
(140, '35', '3', NULL, NULL, '2023-11-05 05:20:21', '2023-11-05 05:20:21'),
(141, '35', '4', NULL, NULL, '2023-11-05 05:20:21', '2023-11-05 05:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `question_categories`
--

CREATE TABLE `question_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `academic_year_id` text DEFAULT NULL,
  `course_id` text DEFAULT NULL,
  `module_id` text DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_listenings`
--

CREATE TABLE `question_listenings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_name` text DEFAULT NULL,
  `title` longtext DEFAULT NULL,
  `listening_type` text DEFAULT NULL,
  `qcategory_id` text DEFAULT NULL,
  `qtype` text DEFAULT NULL,
  `answer_reason` longtext DEFAULT NULL,
  `true_answer` text DEFAULT NULL,
  `mark` text DEFAULT NULL,
  `audio_file` text DEFAULT NULL,
  `q_photo` text DEFAULT NULL,
  `student_category` text DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `remarks` longtext DEFAULT NULL,
  `answer1` text DEFAULT NULL,
  `answer2` text DEFAULT NULL,
  `answer3` text DEFAULT NULL,
  `answer4` text DEFAULT NULL,
  `answer_photo1` text DEFAULT NULL,
  `answer_photo2` text DEFAULT NULL,
  `answer_photo3` text DEFAULT NULL,
  `answer_photo4` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_listenings`
--

INSERT INTO `question_listenings` (`id`, `question_name`, `title`, `listening_type`, `qcategory_id`, `qtype`, `answer_reason`, `true_answer`, `mark`, `audio_file`, `q_photo`, `student_category`, `created_by`, `status`, `remarks`, `answer1`, `answer2`, `answer3`, `answer4`, `answer_photo1`, `answer_photo2`, `answer_photo3`, `answer_photo4`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(7, NULL, '들은 것을 고르십시오', '1', NULL, '1', NULL, '① 우유', '5', NULL, NULL, 'Job', '1', NULL, NULL, '① 우유', '② 오이', '③ 아이', '④ 이유', NULL, NULL, NULL, NULL, '1', '2023-09-13 08:43:42', '2023-09-13 08:43:42'),
(9, '사람들이 무엇을 하고 있습니까?', '다음 그림을 보고 알맞은 대답을 고르십시오', '2', NULL, '1', NULL, '1', '5', NULL, '1694618209_dashboard.png', 'Job', '1', NULL, NULL, '1', '2', '3', '4', NULL, NULL, NULL, NULL, '1', '2023-09-13 08:46:49', '2023-09-13 08:46:49'),
(10, NULL, '잘 듣고 들은 내용과 관계있는 그림을 고르십시오.', '3', NULL, '1', NULL, '1', '5', NULL, NULL, 'Job', '1', NULL, NULL, '1', '2', '3', '4', '1694618302_salt.png', '1694618302_sugar.png', '1694618303_chili.png', '1694618303_carrots.png', '1', '2023-09-13 08:48:23', '2023-09-13 08:48:23'),
(11, NULL, '질문을 듣고 알맞은 대답을 고르십시오.', '4', NULL, '1', NULL, '① 제가 얀또입니다.', '5', '1694618396_제 40 과 2.m4a', NULL, 'Job', '1', NULL, NULL, '① 제가 얀또입니다.', '② 얀또 씨 책이에요.', '③ 어제 구두를 샀어요.', '④ 인도네시아에서 왔어요', NULL, NULL, NULL, NULL, '1', '2023-09-13 08:49:56', '2023-09-13 08:49:56'),
(12, '두 사람이 보고 있는 사진은 누구 사진입니까?', '이야기를 듣고 질문에 알맞은 대답을 고르십시오.', '5', NULL, '1', NULL, '① 남자의 딸', '5', '1694618457_제 40 과 2.m4a', NULL, 'Job', '1', NULL, NULL, '① 남자의 딸', '② 여자의 딸', '③ 남자의 아들', '④ 여자의 아들', NULL, NULL, NULL, NULL, '1', '2023-09-13 08:50:57', '2023-09-13 08:50:57'),
(13, NULL, '들은 것을 고르십시오.', '1', NULL, '1', NULL, '① 아이', '5', NULL, NULL, 'Job', '1', NULL, NULL, '① 아이', '② 오이', '③ 우유', '④ 아우', NULL, NULL, NULL, NULL, '1', '2023-09-18 09:25:06', '2023-09-18 09:25:06'),
(14, NULL, '질문을 듣고 알맞은 대답을 고르십시오.', '4', NULL, '1', NULL, '① 간호사예요', '5', NULL, NULL, 'Job', '1', NULL, NULL, '① 간호사예요', '② 집이 멀어요', '③ 직업이 있어요.', '④ 공장에 없어요', NULL, NULL, NULL, NULL, '1', '2023-09-18 22:17:24', '2023-09-18 22:17:24'),
(15, '남자가 힘들어하는 문제는 무엇입니까?', '이야기를 듣고 질문에 알맞은 대답을 고르십시오.', '5', NULL, '1', NULL, '① 친구가 없는 것', '5', NULL, NULL, 'Job', '1', NULL, NULL, '① 친구가 없는 것', '② 일자리가 없는 것', '③ 회사 일이 어려운 것', '④ 한국말을 잘 못하는 것', NULL, NULL, NULL, NULL, '1', '2023-09-18 22:18:03', '2023-09-18 22:18:03'),
(17, 'L Question', 'L Title', '6', NULL, '1', NULL, '1', '5', NULL, NULL, 'Job', '1', NULL, NULL, '1', '2', '3', '4', '1699004028_can.png', '1699004028_pizza (1).png', '1699004028_instant-noodles.png', '1699004028_shrimp.png', '1', '2023-11-03 09:33:48', '2023-11-03 09:33:48'),
(18, 'Question Listening Type 7', 'Listening Type 7', '7', NULL, '1', NULL, '1', '5', '1699160084_제 40 과 2.m4a', '1699160084_doctor_pi.png', 'Job', '1', NULL, 'remarks', '1', '2', '3', '4', '1699160084_beef.png', '1699160084_cheese.png', '1699160084_carrots.png', '1699160084_chili.png', '1', '2023-11-05 04:54:44', '2023-11-05 04:54:44'),
(19, 'Question Listening 8', 'Listening 8', '8', NULL, '1', NULL, '1', '5', '1699347067_제 40 과 2.m4a', '1699160719_ham.png', 'Job', '1', NULL, 're', '1', '2', '3', '4', '1699160719_peanut.png', NULL, '1699160719_oil.png', '1699160719_material.png', '1', '2023-11-05 05:05:19', '2023-11-07 08:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'Student Only', 'student', '2023-08-30 21:53:39', '2023-08-30 22:06:15'),
(4, 'Admin', 'admin_user', '2023-09-04 01:33:36', '2023-09-04 01:33:36'),
(6, 'Superadmin', 'admin_user', '2023-09-04 01:56:36', '2023-09-04 01:57:50'),
(7, 'Teacher', 'admin_user', '2024-01-03 05:59:16', '2024-01-03 05:59:16'),
(8, 'Front Staff', 'admin_user', '2024-02-26 08:41:48', '2024-02-26 08:41:48'),
(9, 'Office Manager', 'admin_user', '2024-02-26 08:46:14', '2024-02-26 08:46:14'),
(10, 'Director', 'admin_user', '2024-02-26 08:52:17', '2024-02-26 08:52:17');

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
(4, 3),
(7, 4),
(7, 6),
(7, 8),
(7, 9),
(8, 4),
(8, 6),
(8, 9),
(9, 4),
(9, 6),
(10, 4),
(10, 6),
(10, 8),
(10, 9),
(10, 10),
(11, 4),
(11, 6),
(11, 8),
(11, 9),
(12, 4),
(12, 6),
(12, 9),
(13, 4),
(13, 6),
(14, 4),
(14, 6),
(14, 8),
(14, 9),
(14, 10),
(15, 4),
(15, 6),
(15, 8),
(15, 9),
(15, 10),
(16, 4),
(16, 6),
(17, 4),
(17, 6),
(17, 9),
(18, 4),
(18, 6),
(18, 8),
(18, 9),
(19, 4),
(19, 6),
(19, 8),
(19, 9),
(19, 10),
(20, 4),
(20, 6),
(20, 8),
(20, 9),
(21, 4),
(21, 6),
(21, 9),
(22, 4),
(22, 6),
(23, 4),
(23, 6),
(23, 8),
(23, 9),
(23, 10),
(24, 4),
(24, 6),
(24, 8),
(24, 9),
(25, 4),
(25, 6),
(25, 9),
(26, 4),
(26, 6),
(27, 4),
(27, 6),
(27, 8),
(27, 9),
(27, 10),
(28, 4),
(28, 6),
(28, 8),
(28, 9),
(29, 4),
(29, 6),
(29, 9),
(30, 4),
(30, 6),
(31, 4),
(31, 6),
(31, 8),
(31, 9),
(31, 10),
(32, 4),
(32, 6),
(32, 8),
(32, 9),
(33, 4),
(33, 6),
(33, 9),
(34, 4),
(34, 6),
(39, 4),
(39, 6),
(39, 8),
(39, 9),
(39, 10),
(40, 4),
(40, 6),
(40, 8),
(40, 9),
(41, 4),
(41, 6),
(41, 9),
(42, 4),
(42, 6),
(43, 4),
(43, 6),
(43, 8),
(43, 9),
(43, 10),
(44, 4),
(44, 6),
(44, 8),
(44, 9),
(45, 4),
(45, 6),
(45, 9),
(46, 4),
(46, 6),
(47, 4),
(47, 6),
(47, 8),
(47, 9),
(47, 10),
(48, 4),
(48, 6),
(48, 8),
(48, 9),
(49, 4),
(49, 6),
(49, 9),
(50, 4),
(50, 6),
(51, 4),
(51, 6),
(51, 8),
(51, 9),
(51, 10),
(52, 4),
(52, 6),
(52, 8),
(52, 9),
(53, 4),
(53, 6),
(53, 9),
(54, 4),
(54, 6),
(55, 4),
(55, 6),
(55, 8),
(55, 9),
(55, 10),
(56, 4),
(56, 6),
(56, 8),
(56, 9),
(57, 4),
(57, 6),
(57, 9),
(58, 4),
(58, 6),
(59, 4),
(59, 6),
(59, 8),
(59, 9),
(59, 10),
(60, 4),
(60, 6),
(60, 8),
(60, 9),
(61, 4),
(61, 6),
(61, 9),
(62, 4),
(62, 6),
(71, 4),
(71, 6),
(71, 8),
(71, 9),
(71, 10),
(72, 4),
(72, 6),
(72, 8),
(72, 9),
(73, 4),
(73, 6),
(73, 9),
(74, 4),
(74, 6),
(75, 4),
(75, 6),
(75, 8),
(75, 9),
(75, 10),
(76, 4),
(76, 6),
(76, 9),
(77, 4),
(77, 6),
(77, 9),
(78, 4),
(78, 6),
(79, 4),
(79, 6),
(79, 8),
(79, 9),
(79, 10),
(80, 4),
(80, 6),
(80, 8),
(80, 9),
(81, 4),
(81, 6),
(81, 9),
(82, 4),
(82, 6),
(83, 4),
(83, 6),
(83, 8),
(83, 9),
(83, 10),
(84, 4),
(84, 6),
(84, 8),
(84, 9),
(85, 4),
(85, 6),
(85, 9),
(86, 4),
(86, 6),
(87, 4),
(87, 6),
(87, 8),
(87, 9),
(87, 10),
(88, 4),
(88, 6),
(88, 8),
(88, 9),
(89, 4),
(89, 6),
(89, 9),
(90, 4),
(90, 6),
(91, 4),
(91, 6),
(91, 7),
(91, 8),
(91, 9),
(91, 10),
(92, 4),
(92, 6),
(92, 7),
(92, 8),
(92, 9),
(93, 4),
(93, 6),
(93, 9),
(94, 4),
(94, 6),
(95, 4),
(95, 6),
(95, 8),
(95, 9),
(95, 10),
(96, 4),
(96, 6),
(96, 8),
(96, 9),
(96, 10),
(97, 4),
(97, 6),
(97, 8),
(97, 9),
(97, 10),
(98, 4),
(98, 6),
(98, 8),
(98, 9),
(98, 10),
(99, 4),
(99, 6),
(99, 8),
(99, 9),
(100, 4),
(100, 6),
(100, 9),
(101, 4),
(101, 6),
(102, 4),
(102, 6),
(102, 8),
(102, 9),
(102, 10),
(103, 4),
(103, 6),
(103, 8),
(103, 9),
(103, 10),
(104, 4),
(104, 6),
(104, 8),
(104, 9),
(105, 4),
(105, 6),
(105, 9),
(106, 4),
(106, 6),
(107, 4),
(107, 6),
(107, 8),
(107, 9),
(107, 10),
(108, 4),
(108, 6),
(108, 8),
(108, 9),
(108, 10),
(109, 4),
(109, 6),
(109, 8),
(109, 9),
(110, 4),
(110, 6),
(110, 9),
(111, 4),
(111, 6),
(112, 4),
(112, 6),
(112, 8),
(112, 9),
(113, 4),
(113, 6),
(113, 8),
(113, 9),
(114, 4),
(114, 6),
(114, 9),
(115, 4),
(115, 6),
(116, 4),
(116, 6),
(116, 9),
(117, 4),
(117, 6),
(117, 8),
(117, 9),
(118, 4),
(118, 6),
(118, 9),
(119, 4),
(119, 6),
(120, 4),
(120, 8),
(120, 9),
(120, 10),
(121, 4),
(121, 8),
(121, 9),
(122, 4),
(122, 9),
(123, 4),
(124, 4),
(124, 8),
(124, 9),
(125, 4),
(125, 8),
(125, 9),
(126, 4),
(126, 9),
(127, 4),
(128, 4),
(128, 8),
(129, 4),
(129, 8),
(129, 9),
(130, 4),
(130, 9),
(131, 4),
(132, 4),
(132, 8),
(132, 9),
(133, 4),
(133, 8),
(133, 9),
(134, 4),
(134, 9),
(135, 4),
(136, 4),
(136, 9),
(137, 4),
(137, 9),
(138, 4),
(138, 9),
(139, 4),
(139, 9),
(140, 4),
(140, 9),
(141, 4),
(141, 9),
(142, 4),
(142, 9),
(143, 4),
(143, 9),
(144, 4),
(144, 9),
(145, 4),
(145, 9);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `floor_id` text DEFAULT NULL,
  `building_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `floor_id`, `building_id`, `created_at`, `updated_at`) VALUES
(6, 'Room 101', '2', NULL, '2024-01-09 08:06:45', '2024-01-09 08:06:45'),
(7, 'Room 102', '2', NULL, '2024-01-09 08:07:02', '2024-01-09 08:07:02'),
(8, 'Room 103', '2', NULL, '2024-01-09 08:07:17', '2024-01-09 08:07:17'),
(9, 'Room 201', '1', NULL, '2024-01-09 08:07:30', '2024-01-09 08:07:30'),
(10, 'Room 202', '1', NULL, '2024-01-09 08:07:46', '2024-01-09 08:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MIeI1gxhtavUG7dRoBMA8v1O8moXgZys4i4I0IUv', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUjAzTUh4SXA0RUE4YTRBSnZZZ0JJdURKSEZnMkh3R01PNXBCMTlDeiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1NzoibG9naW5fYWRtaW5fdXNlcl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi91c2VycyI7fX0=', 1708939454),
('wB6ZvwwEMaQWAOkizmLInNKCxHYVIQgR1rUDC7Cd', 24, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ2trSVg5dmc5aTlKWHBYOG85UUZuR3pXbFBsSEZPTlVWYU05RmZPbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9zdHVkZW50cy9jcmVhdGUiO31zOjU3OiJsb2dpbl9hZG1pbl91c2VyXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjQ7fQ==', 1708941172);

-- --------------------------------------------------------

--
-- Table structure for table `source_surveys`
--

CREATE TABLE `source_surveys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `source_surveys`
--

INSERT INTO `source_surveys` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Online Media', '2024-01-31 07:45:31', '2024-01-31 07:45:31'),
(4, 'Broadcast', '2024-01-31 07:45:43', '2024-01-31 07:45:43'),
(5, 'Friend', '2024-01-31 07:45:52', '2024-01-31 07:45:52'),
(6, 'Family', '2024-01-31 07:46:14', '2024-01-31 07:46:14'),
(7, 'Newspaper', '2024-01-31 07:46:23', '2024-01-31 07:46:23'),
(8, 'Others', '2024-01-31 07:46:30', '2024-01-31 07:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `nrc` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `salary_date` text DEFAULT NULL,
  `salary` text DEFAULT NULL,
  `payment_type_id` text DEFAULT NULL,
  `start_date` text DEFAULT NULL,
  `end_date` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `standard_salary` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `position`, `nrc`, `phone`, `address`, `salary_date`, `salary`, `payment_type_id`, `start_date`, `end_date`, `status`, `standard_salary`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(8, 'Mya', 'Lorem', 'Lorem', '000', 'Lorem', NULL, NULL, NULL, NULL, NULL, NULL, '5000000', '1', '2024-01-11 08:28:56', '2024-01-11 08:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `staff_leaves`
--

CREATE TABLE `staff_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` text DEFAULT NULL,
  `staff_id` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `fine` text DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_leaves`
--

INSERT INTO `staff_leaves` (`id`, `teacher_id`, `staff_id`, `date`, `fine`, `note`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(14, '11', NULL, '2024-01-11', NULL, 'note', '1', '2024-01-11 08:27:44', '2024-01-11 08:27:51'),
(16, '13', NULL, '2024-01-11', NULL, 'tt', '1', '2024-01-11 08:32:35', '2024-01-11 08:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Yangon', '2023-08-27 08:24:50', '2023-08-27 08:24:50'),
(2, 'Mandalay', '2023-08-27 08:25:01', '2023-08-27 08:25:01'),
(6, 'Bago', '2023-08-27 08:27:56', '2023-08-27 08:27:56'),
(7, 'Mon', '2023-08-27 08:28:01', '2023-08-27 08:28:01'),
(8, 'Thaninthayi', '2023-09-21 14:22:21', '2023-09-21 14:22:21'),
(9, 'Ayeyarwaddy', '2023-09-21 14:22:36', '2023-09-21 14:22:36'),
(10, 'Kayin', '2023-09-21 14:22:56', '2023-09-21 14:22:56'),
(11, 'Rakhine', '2023-09-21 14:23:09', '2023-09-21 14:23:09'),
(12, 'Magwe', '2023-09-21 14:23:20', '2023-09-21 14:23:20'),
(13, 'Kayah', '2023-09-21 14:23:32', '2023-09-21 14:23:32'),
(14, 'Shan', '2023-09-21 14:23:41', '2023-09-21 14:23:41'),
(15, 'Sagaing', '2023-09-21 14:23:50', '2023-09-21 14:23:50'),
(16, 'Chin', '2023-09-21 14:23:58', '2023-09-21 14:23:58'),
(17, 'Kachin', '2023-09-21 14:24:06', '2023-09-21 14:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` text DEFAULT NULL,
  `start_date` text DEFAULT NULL,
  `end_date` text DEFAULT NULL,
  `student_id` text DEFAULT NULL,
  `course_registered` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `vr_no` text DEFAULT NULL,
  `student_no` text DEFAULT NULL,
  `additional_course_id` text DEFAULT NULL,
  `additional_student_no` text DEFAULT NULL,
  `course_no` text DEFAULT NULL,
  `course_abbre` text DEFAULT NULL,
  `national_id` text DEFAULT NULL,
  `student_category` text DEFAULT NULL,
  `degree_id` text DEFAULT NULL,
  `classroom_id` text DEFAULT NULL,
  `batch_id` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `exam_id` text DEFAULT NULL,
  `exam_photo` text DEFAULT NULL,
  `passport_photo` text DEFAULT NULL,
  `nrc_front` text DEFAULT NULL,
  `nrc_back` text DEFAULT NULL,
  `nrc` text DEFAULT NULL,
  `nrc_info_id` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `age` text DEFAULT NULL,
  `nationality` text DEFAULT NULL,
  `religion` text DEFAULT NULL,
  `marital_status` text DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `course_id` text DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `township_id` text DEFAULT NULL,
  `state_id` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `academic_year_id` text DEFAULT NULL,
  `father_name` text DEFAULT NULL,
  `mother_name` text DEFAULT NULL,
  `approve_by` text DEFAULT NULL,
  `approve_status` text NOT NULL DEFAULT '0' COMMENT '1 = Approve and 0 = Not approved',
  `status` text DEFAULT NULL,
  `exp` text DEFAULT NULL,
  `topik_level` text DEFAULT NULL,
  `remarks` longtext DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `qualification` text DEFAULT NULL,
  `english_language` text DEFAULT NULL,
  `other_language` text DEFAULT NULL,
  `student_status` text DEFAULT NULL,
  `business_type` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `duties` text DEFAULT NULL,
  `pay` text DEFAULT NULL,
  `payment_complete` text DEFAULT NULL,
  `leaving` text DEFAULT NULL,
  `future_interest` text DEFAULT NULL,
  `source_survey` text DEFAULT NULL,
  `oversea` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `applicant` text DEFAULT NULL,
  `applicant_sign` text DEFAULT NULL,
  `registered` text DEFAULT NULL,
  `registered_sign` text DEFAULT NULL,
  `open_day` text DEFAULT NULL,
  `close_day` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `date`, `start_date`, `end_date`, `student_id`, `course_registered`, `name`, `vr_no`, `student_no`, `additional_course_id`, `additional_student_no`, `course_no`, `course_abbre`, `national_id`, `student_category`, `degree_id`, `classroom_id`, `batch_id`, `email`, `phone`, `mobile`, `exam_id`, `exam_photo`, `passport_photo`, `nrc_front`, `nrc_back`, `nrc`, `nrc_info_id`, `gender`, `age`, `nationality`, `religion`, `marital_status`, `dob`, `course_id`, `address`, `township_id`, `state_id`, `photo`, `academic_year_id`, `father_name`, `mother_name`, `approve_by`, `approve_status`, `status`, `exp`, `topik_level`, `remarks`, `admin_user_id`, `education`, `qualification`, `english_language`, `other_language`, `student_status`, `business_type`, `position`, `duties`, `pay`, `payment_complete`, `leaving`, `future_interest`, `source_survey`, `oversea`, `remark`, `applicant`, `applicant_sign`, `registered`, `registered_sign`, `open_day`, `close_day`, `location`, `created_at`, `updated_at`) VALUES
(70, '2024-02-05', '2024-02-05', '2024-04-05', '20240270', NULL, 'Ma Khin Khin Khaing Khaing', NULL, 'FBM00419', NULL, NULL, NULL, NULL, '12/KKK(N)123456', NULL, '16', NULL, '23', 'khin@gmail.com', '09799123123', '09799123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Female', '50', 'Lorem', 'Lorem', 'Single', '2024-02-05', NULL, 'Lorem', NULL, NULL, '1707125320_girl.png', NULL, 'U Khin', NULL, '1', '1', NULL, NULL, NULL, NULL, '1', 'Lorem', 'Lorem', 'Good', 'Good', 'Employee', 'Lorem', NULL, NULL, NULL, NULL, NULL, 'To Manage Own Business,To Move to management Level', 'Online Media', 'Oversea', 'Lorem', NULL, NULL, '1', NULL, NULL, NULL, NULL, '2024-02-05 09:28:41', '2024-02-05 09:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `student_answers`
--

CREATE TABLE `student_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` text DEFAULT NULL,
  `student_id` text DEFAULT NULL,
  `answer` longtext DEFAULT NULL,
  `user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_answers`
--

INSERT INTO `student_answers` (`id`, `question_id`, `student_id`, `answer`, `user_id`, `created_at`, `updated_at`) VALUES
(3, '13', '9', '공책', '3', '2023-09-18 21:21:43', '2023-09-18 21:21:43'),
(4, '23', '9', '① 공원', '3', '2023-09-18 21:26:52', '2023-09-18 21:26:52'),
(5, '17', '9', '공사를 하는 곳', '3', '2023-09-18 21:31:24', '2023-09-18 21:31:24'),
(8, '13', '14', '공책', '7', '2023-09-20 14:53:32', '2023-09-20 14:53:32'),
(9, '23', '14', '② 은행', '7', '2023-09-20 14:53:39', '2023-09-20 14:53:39'),
(10, '17', '14', '모자를 파는 곳', '7', '2023-09-20 14:53:48', '2023-09-20 14:53:48'),
(11, '22', '14', '3년 전', '7', '2023-09-20 14:54:04', '2023-09-20 14:54:04'),
(12, '11', '22', '가방', '15', '2023-10-02 13:31:40', '2023-10-02 13:31:40'),
(13, '12', '22', '가위', '15', '2023-10-02 13:31:55', '2023-10-02 13:31:55'),
(14, '12', '22', '가위', '15', '2023-10-02 13:32:59', '2023-10-02 13:32:59'),
(15, '13', '22', '계산기', '15', '2023-10-02 13:33:28', '2023-10-02 13:33:28'),
(16, '11', '22', '가방', '15', '2023-10-02 13:33:33', '2023-10-02 13:33:33'),
(17, '24', '22', '④ 계절', '15', '2023-10-02 13:33:59', '2023-10-02 13:33:59'),
(18, '24', '22', '① 음식', '15', '2023-10-02 13:34:08', '2023-10-02 13:34:08'),
(19, '35', '9', '1', '3', '2023-11-05 06:00:10', '2023-11-05 06:00:10'),
(20, '11', '9', '가방', '3', '2023-11-16 07:13:15', '2023-11-16 07:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `student_answer_listenings`
--

CREATE TABLE `student_answer_listenings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` text DEFAULT NULL,
  `student_id` text DEFAULT NULL,
  `answer` longtext DEFAULT NULL,
  `user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_answer_listenings`
--

INSERT INTO `student_answer_listenings` (`id`, `question_id`, `student_id`, `answer`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '7', '9', '① 우유', NULL, '2023-09-18 22:09:16', '2023-09-18 22:09:16'),
(2, '7', '9', '④ 이유', NULL, '2023-09-18 22:13:43', '2023-09-18 22:13:43'),
(3, '9', '9', '1', NULL, '2023-09-19 23:07:30', '2023-09-19 23:07:30'),
(4, '10', '9', '2', NULL, '2023-09-19 23:07:38', '2023-09-19 23:07:38'),
(8, '18', '9', '1', NULL, '2023-11-05 05:59:01', '2023-11-05 05:59:01'),
(9, '13', '9', '① 아이', '3', '2023-11-16 07:37:29', '2023-11-16 07:37:29'),
(10, '17', '9', '1', '3', '2023-11-16 07:39:32', '2023-11-16 07:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `student_limits`
--

CREATE TABLE `student_limits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `limit_student` text NOT NULL DEFAULT '500',
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_limits`
--

INSERT INTO `student_limits` (`id`, `limit_student`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(1, '6000', '16', '2023-08-31 07:40:32', '2023-11-21 14:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_medical_statuses`
--

CREATE TABLE `student_medical_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` text DEFAULT NULL,
  `medical_status` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_medical_statuses`
--

INSERT INTO `student_medical_statuses` (`id`, `student_id`, `medical_status`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(1, '4', 'Covid 19_2', '1', '2023-08-29 00:23:49', '2023-08-29 00:23:49'),
(2, '4', 'B virus_3', '1', '2023-08-29 00:23:49', '2023-08-29 00:23:49'),
(3, '5', 'Covid 19_1', '1', '2023-08-29 00:27:46', '2023-08-29 00:27:46'),
(4, '5', 'B virus_3', '1', '2023-08-29 00:27:46', '2023-08-29 00:27:46'),
(5, '6', 'Covid 19_1', '1', '2023-08-29 00:28:06', '2023-08-29 00:28:06'),
(6, '6', 'B virus_2', '1', '2023-08-29 00:28:06', '2023-09-28 08:18:02'),
(7, '8', 'Covid 19_1', NULL, '2023-08-29 01:48:56', '2023-08-29 01:48:56'),
(8, '8', 'B virus_3', NULL, '2023-08-29 01:48:56', '2023-08-29 01:48:56'),
(9, '9', 'Covid 19_3', '1', '2023-08-29 03:06:21', '2023-08-29 03:06:21'),
(10, '9', 'B virus_1', '1', '2023-08-29 03:06:21', '2023-08-29 03:06:21'),
(11, '10', 'Covid 19_2', '1', '2023-08-30 22:52:02', '2023-08-30 22:52:02'),
(12, '10', 'B virus_3', '1', '2023-08-30 22:52:02', '2023-08-30 22:52:02'),
(13, '11', 'Covid 19_1', '1', '2023-08-30 23:01:20', '2023-08-30 23:01:20'),
(14, '11', 'B virus_3', '1', '2023-08-30 23:01:20', '2023-08-30 23:01:20'),
(15, '12', 'Covid 19_1', '1', '2023-08-30 23:04:45', '2023-08-30 23:04:45'),
(16, '12', 'B virus_3', '1', '2023-08-30 23:04:45', '2023-08-30 23:04:45'),
(17, '13', 'Covid 19_1', '1', '2023-08-30 23:05:06', '2023-08-30 23:05:06'),
(18, '13', 'B virus_3', '1', '2023-08-30 23:05:06', '2023-08-30 23:05:06'),
(23, '14', 'Covid 19_3', '1', '2023-09-28 08:23:56', '2023-09-28 08:23:56'),
(24, '14', 'HBs Ag_1', '1', '2023-09-28 08:23:57', '2023-09-28 08:23:57'),
(25, '15', 'Covid 19_1', NULL, '2023-09-28 09:33:47', '2023-09-28 09:33:47'),
(26, '15', 'B virus_1', NULL, '2023-09-28 09:33:47', '2023-09-28 09:33:47'),
(27, '16', 'Covid 19_1', NULL, '2023-09-28 09:41:16', '2023-09-28 09:41:16'),
(28, '16', 'HCV Ab_1', NULL, '2023-09-28 09:41:16', '2023-09-28 09:41:16'),
(29, '17', 'Covid 19_1', NULL, '2023-09-28 09:41:40', '2023-09-28 09:41:40'),
(30, '17', 'HCV Ab_1', NULL, '2023-09-28 09:41:40', '2023-09-28 09:41:40'),
(31, '18', 'Covid 19_1', NULL, '2023-09-28 09:41:53', '2023-09-28 09:41:53'),
(32, '18', 'HCV Ab_1', NULL, '2023-09-28 09:41:53', '2023-09-28 09:41:53'),
(33, '19', 'HBs Ag_1', NULL, '2023-09-28 09:42:27', '2023-09-28 09:42:27'),
(34, '19', 'HCV Ab_1', NULL, '2023-09-28 09:42:27', '2023-09-28 09:42:27'),
(35, '22', 'Covid 19_3', '1', '2023-10-02 13:24:10', '2023-10-02 13:24:10'),
(36, '22', 'B virus_1', '1', '2023-10-02 13:24:10', '2023-10-02 13:24:10'),
(37, '22', 'HBs Ag_1', '1', '2023-10-02 13:24:10', '2023-10-02 13:24:10'),
(38, '22', 'HCV Ab_1', '1', '2023-10-02 13:24:10', '2023-10-02 13:24:10'),
(39, '22', 'HIV Ab_1', '1', '2023-10-02 13:24:10', '2023-10-02 13:24:10'),
(40, '22', 'TB (ICT)_1', '1', '2023-10-02 13:24:10', '2023-10-02 13:24:10'),
(41, '28', 'Covid 19_1', NULL, '2023-11-08 08:02:54', '2023-11-08 08:02:54'),
(42, '28', 'B virus_1', NULL, '2023-11-08 08:02:54', '2023-11-08 08:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_no` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `nrc` text DEFAULT NULL,
  `nrc_info_id` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `degree_id` text DEFAULT NULL,
  `job_id` text DEFAULT NULL,
  `course_id` text DEFAULT NULL,
  `batch_id` text DEFAULT NULL,
  `degree` text DEFAULT NULL,
  `academic_year_id` text DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `township_id` text DEFAULT NULL,
  `state_id` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `approve_by` text DEFAULT NULL,
  `approve_status` text NOT NULL DEFAULT '0' COMMENT '1 = Approve and 0 = Not approved',
  `status` text DEFAULT NULL,
  `duty_assign` text DEFAULT NULL,
  `remarks` longtext DEFAULT NULL,
  `topik_level` text DEFAULT NULL,
  `standard_salary` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `ref_no`, `name`, `email`, `phone`, `position`, `nrc`, `nrc_info_id`, `gender`, `dob`, `degree_id`, `job_id`, `course_id`, `batch_id`, `degree`, `academic_year_id`, `address`, `township_id`, `state_id`, `photo`, `approve_by`, `approve_status`, `status`, `duty_assign`, `remarks`, `topik_level`, `standard_salary`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(11, NULL, 'Teacher', NULL, '09799123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18', '5', NULL, NULL, 'Yangon', NULL, NULL, '1704950244_doctor_pi.png', '1', '1', NULL, NULL, NULL, NULL, '5000000', '1', '2024-01-11 05:17:24', '2024-01-11 07:54:12'),
(13, NULL, 'Daw Thu Thu', NULL, '09799123123', 'Lorem', NULL, NULL, NULL, NULL, NULL, NULL, '15', '22', NULL, NULL, 'Lorem', NULL, NULL, '1704960040_girl.png', '1', '1', NULL, NULL, NULL, NULL, '5000000', '1', '2024-01-11 08:00:41', '2024-01-11 08:00:41'),
(14, NULL, 'Daw Hla', NULL, '09799123123', 'pos', NULL, NULL, NULL, NULL, NULL, NULL, '15', '2', NULL, NULL, 'Ygn', NULL, NULL, '1706590992_girl.png', '1', '1', NULL, 'Full Time', NULL, NULL, '500000', '1', '2024-01-30 05:03:12', '2024-01-30 05:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendances`
--

CREATE TABLE `teacher_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` text DEFAULT NULL,
  `teacher_id` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_attendances`
--

INSERT INTO `teacher_attendances` (`id`, `date`, `teacher_id`, `note`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(4, '2024-01-12', '13', 'note', NULL, '2024-01-11 08:31:15', '2024-01-11 08:31:15'),
(5, '2024-01-30', '14', 'note', NULL, '2024-01-30 05:04:21', '2024-01-30 05:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_limits`
--

CREATE TABLE `teacher_limits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `limit_teacher` text NOT NULL DEFAULT '600',
  `admin_user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_limits`
--

INSERT INTO `teacher_limits` (`id`, `limit_teacher`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(1, '60', '16', '2023-11-21 14:43:18', '2023-11-21 14:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `townships`
--

CREATE TABLE `townships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `state_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `townships`
--

INSERT INTO `townships` (`id`, `name`, `state_id`, `created_at`, `updated_at`) VALUES
(2, 'Botataung (ဗိုလ်တထောင်)', '1', '2023-02-17 04:35:29', '2023-02-17 04:35:29'),
(3, 'Dagon Seikkan (ဒဂုံဆိပ်ကမ်း)', '1', '2023-02-17 04:36:06', '2023-02-17 04:36:06'),
(4, 'East Dagon (အရှေ့ဒဂုံ)', '1', '2023-02-17 04:50:11', '2023-02-17 04:50:11'),
(5, 'North Dagon (မြောက်ဒဂုံ)', '1', '2023-02-17 04:50:33', '2023-02-17 04:50:33'),
(6, 'North Okkalapa (မြောက်ဥက္ကလာပ)', '1', '2023-02-17 04:51:01', '2023-02-17 04:51:01'),
(7, 'Pazundaung (ပုစွန်တောင်)', '1', '2023-02-17 04:51:28', '2023-02-17 04:51:28'),
(8, 'South Dagon (တောင်ဒဂုံ)', '1', '2023-02-17 04:51:51', '2023-02-17 04:51:51'),
(9, 'South Okkalapa (တောင်ဥက္ကလာပ)', '1', '2023-02-17 04:52:09', '2023-02-17 04:52:09'),
(10, 'Thingangyun (သင်္ဃန်းကျွန်း)', '1', '2023-02-17 04:53:31', '2023-02-17 04:53:31'),
(11, 'Dawbon (ဒေါပုံ)', '1', '2023-02-17 04:53:53', '2023-02-17 04:53:53'),
(12, 'Mingala Taungnyunt (မင်္ဂလာတောင်ညွန့်)', '1', '2023-02-17 04:54:13', '2023-02-17 04:54:13'),
(13, 'Tamwe (တာမွေ)', '1', '2023-02-17 04:54:32', '2023-02-17 04:54:32'),
(14, 'Thaketa (သာကေတ)', '1', '2023-02-17 04:54:48', '2023-02-17 04:54:48'),
(15, 'Yankin (ရန်ကင်း)', '1', '2023-02-17 04:55:03', '2023-02-17 04:55:03'),
(16, 'Hlaingthaya (လှိုင်သာယာ)', '1', '2023-02-17 04:55:39', '2023-02-17 04:55:39'),
(17, 'Insein (အင်းစိန်)', '1', '2023-02-17 04:55:56', '2023-02-17 04:55:56'),
(18, 'Mingaladon (မင်္ဂလာဒုံ)', '1', '2023-02-17 04:56:15', '2023-02-17 04:56:15'),
(19, 'Shwepyitha (ရွှေပြည်သာ)', '1', '2023-02-17 04:56:32', '2023-02-17 04:56:32'),
(20, 'Hlegu (လှည်းကူး)', '1', '2023-02-17 04:56:48', '2023-02-17 04:56:48'),
(21, 'Hmawbi (မှော်ဘီ)', '1', '2023-02-17 04:57:03', '2023-02-17 04:57:03'),
(22, 'Htantabin (ထန်းတပင်)', '1', '2023-02-17 04:57:20', '2023-02-17 04:57:20'),
(23, 'Taikkyi (တိုက်ကြီး)', '1', '2023-02-17 04:57:38', '2023-02-17 04:57:38'),
(24, 'Dala (ဒလ)', '1', '2023-02-17 06:26:26', '2023-02-17 06:26:26'),
(25, 'Seikkyi Kanaungto (ဆိပ်ကြီးခနောင်တို)', '1', '2023-02-17 06:26:47', '2023-02-17 06:26:47'),
(26, 'Cocokyun (ကိုကိုးကျွန်း)', '1', '2023-02-17 06:27:14', '2023-02-17 06:27:14'),
(27, 'Kawhmu (ကော့မှူး)', '1', '2023-02-17 06:27:30', '2023-02-17 06:27:30'),
(28, 'Kayan (ခရမ်း)', '1', '2023-02-17 06:28:14', '2023-02-17 06:28:14'),
(29, 'Kungyangon (ကွမ်းခြံကုန်း)', '1', '2023-02-17 06:29:24', '2023-02-17 06:29:24'),
(30, 'Kyauktan (ကျောက်တန်း)', '1', '2023-02-17 06:29:45', '2023-02-17 06:29:45'),
(31, 'Thanlyin (သန်လျင်)', '1', '2023-02-17 06:30:03', '2023-02-17 06:30:03'),
(32, 'Thongwa (သုံးခွ)', '1', '2023-02-17 06:30:19', '2023-02-17 06:30:19'),
(33, 'Twante (တွံတေး)', '1', '2023-02-17 06:30:37', '2023-08-27 08:44:51'),
(34, 'Ahlon (အလုံ)', '1', '2023-02-17 06:30:56', '2023-08-27 08:44:40'),
(35, 'Bahan (ဗဟန်း)', '1', '2023-02-17 06:36:47', '2023-08-27 08:44:32'),
(36, 'Dagon (ဒဂုံ)', '1', '2023-02-17 06:37:04', '2023-08-27 08:44:24'),
(37, 'Kyauktada (ကျောက်တံတား)', '1', '2023-02-17 06:37:21', '2023-08-27 08:43:34'),
(38, 'Kyimyindaing (ကြည့်မြင်တိုင်)', '1', '2023-02-17 06:37:38', '2023-08-27 08:43:05'),
(39, 'Lanmadaw (လမ်းမတော်)', '1', '2023-02-17 06:37:53', '2023-08-27 08:42:59'),
(40, 'Latha (လသာ)', '1', '2023-02-17 06:38:06', '2023-08-27 08:42:47'),
(41, 'Pabedan (ပန်းဘဲတန်း)', '1', '2023-02-17 06:38:24', '2023-08-27 08:42:41'),
(42, 'Sanchaung (စမ်းချောင်း)', '1', '2023-02-17 06:38:39', '2023-08-27 08:42:35'),
(43, 'Seikkan (ဆိပ်ကမ်း)', '1', '2023-02-17 06:38:59', '2023-08-27 08:42:29'),
(44, 'Hlaing (လှိုင်)', '1', '2023-02-17 06:39:13', '2023-08-27 08:42:23'),
(45, 'Kamayut (ကမာရွတ်)', '1', '2023-02-17 06:39:30', '2023-08-27 08:42:16'),
(46, 'Mayangon (မရမ်းကုန်း)', '1', '2023-02-17 06:41:06', '2023-08-27 08:42:10'),
(48, 'Bokepyin', '8', '2023-09-21 14:25:56', '2023-09-21 14:25:56'),
(49, 'Dawei', '8', '2023-09-21 14:26:17', '2023-09-21 14:26:17'),
(50, 'Kawthaung', '8', '2023-09-21 14:28:11', '2023-09-21 14:28:11'),
(51, 'Kyunsu', '8', '2023-09-21 14:28:27', '2023-09-21 14:28:27'),
(52, 'Launglon', '8', '2023-09-21 14:28:47', '2023-09-21 14:28:47'),
(53, 'Myeik', '8', '2023-09-21 14:29:04', '2023-09-21 14:29:04'),
(54, 'Palaw', '8', '2023-09-21 14:29:24', '2023-09-21 14:29:24'),
(55, 'Tanintharyi', '8', '2023-09-21 14:29:43', '2023-09-21 14:29:43'),
(56, 'Thayetchaung', '8', '2023-09-21 14:30:05', '2023-09-21 14:30:05'),
(57, 'Yebyu', '8', '2023-09-21 14:30:21', '2023-09-21 14:30:21'),
(58, 'Bilin', '7', '2023-09-21 14:31:26', '2023-09-21 14:31:26'),
(59, 'Chaungzon', '7', '2023-09-21 14:31:43', '2023-09-21 14:31:43'),
(60, 'Kyaikmaraw', '7', '2023-09-21 14:32:01', '2023-09-21 14:32:01'),
(61, 'Kyaikto', '7', '2023-09-21 14:32:19', '2023-09-21 14:32:19'),
(62, 'Mawlamyine', '7', '2023-09-21 14:32:37', '2023-09-21 14:32:37'),
(63, 'Mudon', '7', '2023-09-21 14:32:54', '2023-09-21 14:32:54'),
(64, 'Paung', '7', '2023-09-21 14:33:12', '2023-09-21 14:33:12'),
(65, 'Thanbyuzayat', '7', '2023-09-21 14:33:31', '2023-09-21 14:33:31'),
(66, 'Thaton', '7', '2023-09-21 14:33:47', '2023-09-21 14:33:47'),
(67, 'Ye', '7', '2023-09-21 14:34:02', '2023-09-21 14:34:02'),
(68, 'Bogale', '9', '2023-09-21 14:34:43', '2023-09-21 14:34:43'),
(69, 'Danubyu', '9', '2023-09-21 14:35:02', '2023-09-21 14:35:02'),
(70, 'Dedaye', '9', '2023-09-21 14:35:19', '2023-09-21 14:35:19'),
(71, 'Einme', '9', '2023-09-21 14:35:38', '2023-09-21 14:35:38'),
(72, 'Hinthada', '9', '2023-09-21 14:35:54', '2023-09-21 14:35:54'),
(73, 'Ingapu', '9', '2023-09-21 14:36:43', '2023-09-21 14:36:43'),
(74, 'Kangyidaunt', '9', '2023-09-21 14:37:01', '2023-09-21 14:37:01'),
(75, 'Kyaiklat', '9', '2023-09-21 14:37:22', '2023-09-21 14:37:22'),
(76, 'Kyangin', '9', '2023-09-21 14:37:41', '2023-09-21 14:37:41'),
(77, 'Kyaunggon', '9', '2023-09-21 14:37:56', '2023-09-21 14:37:56'),
(78, 'Kyonpyaw', '9', '2023-09-21 14:38:23', '2023-09-21 14:38:23'),
(79, 'Labutta', '9', '2023-09-21 14:38:40', '2023-09-21 14:38:40'),
(80, 'Lemyethna', '9', '2023-09-21 14:38:58', '2023-09-21 14:38:58'),
(81, 'Ma-ubin', '9', '2023-09-21 14:39:22', '2023-09-21 14:39:22'),
(82, 'Mawlamyinegyun', '9', '2023-09-21 14:39:45', '2023-09-21 14:39:45'),
(83, 'Myanaung', '9', '2023-09-21 14:40:01', '2023-09-21 14:40:01'),
(84, 'Myaungmya', '9', '2023-09-21 14:40:16', '2023-09-21 14:40:16'),
(85, 'Ngapudaw', '9', '2023-09-21 14:40:38', '2023-09-21 14:40:38'),
(86, 'Nyaungdon', '9', '2023-09-21 14:40:56', '2023-09-21 14:40:56'),
(87, 'Pantanaw', '9', '2023-09-21 14:41:11', '2023-09-21 14:41:11'),
(88, 'Pathein', '9', '2023-09-21 14:41:26', '2023-09-21 14:41:26'),
(89, 'Pyapon', '9', '2023-09-21 14:41:44', '2023-09-21 14:41:44'),
(90, 'Thabaung', '9', '2023-09-21 14:42:00', '2023-09-21 14:42:00'),
(91, 'Wakema', '9', '2023-09-21 14:42:40', '2023-09-21 14:42:40'),
(92, 'Yegyi', '9', '2023-09-21 14:42:57', '2023-09-21 14:42:57'),
(93, 'Zalun', '9', '2023-09-21 14:43:13', '2023-09-21 14:43:13'),
(94, 'Hlaingbwe', '10', '2023-09-21 14:44:03', '2023-09-21 14:44:03'),
(95, 'Hpa-an', '10', '2023-09-21 14:44:20', '2023-09-21 14:44:20'),
(96, 'Hpapun', '10', '2023-09-21 14:44:36', '2023-09-21 14:44:36'),
(97, 'Kawkareik', '10', '2023-09-21 14:44:50', '2023-09-21 14:44:50'),
(98, 'Kyain Seikgyi', '10', '2023-09-21 14:45:11', '2023-09-21 14:45:11'),
(99, 'Myawaddy', '10', '2023-09-21 14:45:29', '2023-09-21 14:45:29'),
(100, 'Thandaunggyi', '10', '2023-09-21 14:45:54', '2023-09-21 14:45:54'),
(101, 'Bago', '6', '2023-09-21 14:46:36', '2023-09-21 14:46:36'),
(102, 'Daik-U', '6', '2023-09-21 14:46:48', '2023-09-21 14:46:48'),
(103, 'Gyobingauk', '6', '2023-09-21 14:46:59', '2023-09-21 14:46:59'),
(104, 'Kawa', '6', '2023-09-21 14:47:10', '2023-09-21 14:47:10'),
(105, 'Kyaukkyi', '6', '2023-09-21 14:47:25', '2023-09-21 14:47:25'),
(106, 'Kyauktaga', '6', '2023-09-21 14:47:36', '2023-09-21 14:47:36'),
(107, 'Letpadan', '6', '2023-09-21 14:47:49', '2023-09-21 14:47:49'),
(108, 'Minhla', '6', '2023-09-21 14:48:04', '2023-09-21 14:48:04'),
(109, 'Monyo', '6', '2023-09-21 14:48:19', '2023-09-21 14:48:19'),
(110, 'Nattalin', '6', '2023-09-21 14:48:33', '2023-09-21 14:48:33'),
(111, 'Nyaunglebin', '6', '2023-09-21 14:48:47', '2023-09-21 14:48:47'),
(112, 'Okpho', '6', '2023-09-21 14:49:00', '2023-09-21 14:49:00'),
(113, 'Oktwin', '6', '2023-09-21 14:49:11', '2023-09-21 14:49:11'),
(114, 'Pandaung', '6', '2023-09-21 14:49:25', '2023-09-21 14:49:25'),
(115, 'Paukkaung', '6', '2023-09-21 14:52:35', '2023-09-21 14:52:35'),
(116, 'Paungde', '6', '2023-09-21 14:52:46', '2023-09-21 14:52:46'),
(117, 'Pyay', '6', '2023-09-21 14:52:56', '2023-09-21 14:52:56'),
(118, 'Pyu', '6', '2023-09-21 14:53:09', '2023-09-21 14:53:09'),
(119, 'Shwedaung', '6', '2023-09-21 14:53:22', '2023-09-21 14:53:22'),
(120, 'Shwegyin', '6', '2023-09-21 14:54:40', '2023-09-21 14:54:40'),
(121, 'Tantabin', '6', '2023-09-21 14:54:51', '2023-09-21 14:54:51'),
(122, 'Taungoo', '6', '2023-09-21 14:55:03', '2023-09-21 14:55:03'),
(123, 'Thanatpin', '6', '2023-09-21 14:55:26', '2023-09-21 14:55:26'),
(124, 'Tharrawaddy', '6', '2023-09-21 14:55:37', '2023-09-21 14:55:37'),
(125, 'Thegon', '6', '2023-09-21 14:55:48', '2023-09-21 14:55:48'),
(126, 'Waw', '6', '2023-09-21 14:56:00', '2023-09-21 14:56:00'),
(127, 'Yedashe', '6', '2023-09-21 14:56:13', '2023-09-21 14:56:13'),
(128, 'Zigon', '6', '2023-09-21 14:56:26', '2023-09-21 14:56:26'),
(129, 'Ann', '11', '2023-09-21 14:57:00', '2023-09-21 14:57:00'),
(130, 'Buthidaung', '11', '2023-09-21 14:57:25', '2023-09-21 14:57:25'),
(131, 'Gwa', '11', '2023-09-21 14:57:42', '2023-09-21 14:57:42'),
(132, 'Kyaukpyu', '11', '2023-09-21 14:57:57', '2023-09-21 14:57:57'),
(133, 'Kyauktaw', '11', '2023-09-21 14:58:10', '2023-09-21 14:58:10'),
(134, 'Manaung', '11', '2023-09-21 14:58:23', '2023-09-21 14:58:23'),
(135, 'Maungdaw', '11', '2023-09-21 14:58:34', '2023-09-21 14:58:34'),
(136, 'Minbya', '11', '2023-09-21 14:58:45', '2023-09-21 14:58:45'),
(137, 'Mrauk-U', '11', '2023-09-21 14:58:58', '2023-09-21 14:58:58'),
(138, 'Myebon', '11', '2023-09-21 14:59:16', '2023-09-21 14:59:16'),
(139, 'Pauktaw', '11', '2023-09-21 14:59:29', '2023-09-21 14:59:29'),
(140, 'Ponnagyun', '11', '2023-09-21 14:59:47', '2023-09-21 14:59:47'),
(141, 'Ramree', '11', '2023-09-21 15:05:52', '2023-09-21 15:05:52'),
(142, 'Rathedaung', '11', '2023-09-21 15:06:13', '2023-09-21 15:06:13'),
(143, 'Sittwe', '11', '2023-09-21 15:06:30', '2023-09-21 15:06:30'),
(144, 'Taungup', '11', '2023-09-21 15:06:44', '2023-09-21 15:06:44'),
(145, 'Thandwe', '11', '2023-09-21 15:07:01', '2023-09-21 15:07:01'),
(146, 'Aunglan', '12', '2023-09-21 15:07:36', '2023-09-21 15:07:36'),
(147, 'Chauk', '12', '2023-09-21 15:08:19', '2023-09-21 15:08:19'),
(148, 'Gangaw', '12', '2023-09-21 15:08:30', '2023-09-21 15:08:30'),
(149, 'Htilin', '12', '2023-09-21 15:08:44', '2023-09-21 15:08:44'),
(150, 'Kamma', '12', '2023-09-21 15:08:58', '2023-09-21 15:08:58'),
(151, 'Magway', '12', '2023-09-21 15:09:14', '2023-09-21 15:09:14'),
(152, 'Minbu', '12', '2023-09-21 15:09:26', '2023-09-21 15:09:26'),
(153, 'Mindon', '12', '2023-09-21 15:09:47', '2023-09-21 15:09:47'),
(154, 'Minhla', '12', '2023-09-21 15:10:01', '2023-09-21 15:10:01'),
(155, 'Myaing', '12', '2023-09-21 15:10:16', '2023-09-21 15:10:16'),
(156, 'Myothit', '12', '2023-09-21 15:10:31', '2023-09-21 15:10:31'),
(157, 'Natmauk', '12', '2023-09-21 15:10:46', '2023-09-21 15:10:46'),
(158, 'Ngape', '12', '2023-09-21 15:10:57', '2023-09-21 15:10:57'),
(159, 'Pakokku', '12', '2023-09-21 15:11:09', '2023-09-21 15:11:09'),
(160, 'Pauk', '12', '2023-09-21 15:11:24', '2023-09-21 15:11:24'),
(161, 'Pwintbyu', '12', '2023-09-21 15:12:05', '2023-09-21 15:12:05'),
(162, 'Salin', '12', '2023-09-21 15:12:17', '2023-09-21 15:12:17'),
(163, 'Saw', '12', '2023-09-21 15:12:28', '2023-09-21 15:12:28'),
(164, 'Seikphyu', '12', '2023-09-21 15:12:44', '2023-09-21 15:12:44'),
(165, 'Sidoktaya', '12', '2023-09-21 15:12:57', '2023-09-21 15:12:57'),
(166, 'Sinbaungwe', '12', '2023-09-21 15:13:09', '2023-09-21 15:13:09'),
(167, 'Taungdwingyi', '12', '2023-09-21 15:13:31', '2023-09-21 15:13:31'),
(168, 'Thayet', '12', '2023-09-21 15:13:41', '2023-09-21 15:13:41'),
(169, 'Yenangyaung', '12', '2023-09-21 15:13:58', '2023-09-21 15:13:58'),
(170, 'Yesagyo', '12', '2023-09-21 15:14:11', '2023-09-21 15:14:11'),
(171, 'Aungmyaythazan', '2', '2023-09-21 15:15:21', '2023-09-21 15:15:21'),
(172, 'Chanayethazan', '2', '2023-09-21 15:15:43', '2023-09-21 15:15:43'),
(173, 'Chanmyathazi', '2', '2023-09-21 15:16:56', '2023-09-21 15:16:56'),
(174, 'Mahaaungmyay', '2', '2023-09-21 15:17:11', '2023-09-21 15:17:11'),
(175, 'Pyigyidagun', '2', '2023-09-21 15:17:26', '2023-09-21 15:17:26'),
(176, 'Amarapura', '2', '2023-09-21 15:17:41', '2023-09-21 15:17:41'),
(177, 'Myitnge', '2', '2023-09-21 15:18:02', '2023-09-21 15:18:02'),
(179, 'Patheingyi', '2', '2023-09-21 15:18:29', '2023-09-21 15:18:29'),
(180, 'Bawlakhe', '13', '2023-09-21 15:20:01', '2023-09-21 15:20:01'),
(181, 'Demoso', '13', '2023-09-21 15:20:16', '2023-09-21 15:20:16'),
(182, 'Hpasawng', '13', '2023-09-21 15:20:29', '2023-09-21 15:20:29'),
(183, 'Hpruso', '13', '2023-09-21 15:20:46', '2023-09-21 15:20:46'),
(184, 'Loikaw', '13', '2023-09-21 15:21:01', '2023-09-21 15:21:01'),
(185, 'Mese', '13', '2023-09-21 15:21:14', '2023-09-21 15:21:14'),
(186, 'Shadaw', '13', '2023-09-21 15:21:28', '2023-09-21 15:21:28'),
(187, 'Hopang', '14', '2023-09-21 15:23:11', '2023-09-21 15:23:11'),
(188, 'Hsenwi', '14', '2023-09-21 15:23:27', '2023-09-21 15:23:27'),
(189, 'Hsi Hseng', '14', '2023-09-21 15:23:41', '2023-09-21 15:23:41'),
(190, 'Hsipaw', '14', '2023-09-21 15:23:53', '2023-09-21 15:23:53'),
(191, 'Kalaw', '14', '2023-09-21 15:24:07', '2023-09-21 15:24:07'),
(192, 'Kengtung', '14', '2023-09-21 15:24:20', '2023-09-21 15:24:20'),
(193, 'Konkyan', '14', '2023-09-21 15:24:32', '2023-09-21 15:24:32'),
(194, 'Kunhing', '14', '2023-09-21 15:24:47', '2023-09-21 15:24:47'),
(195, 'Kunlong', '14', '2023-09-21 15:24:59', '2023-09-21 15:24:59'),
(196, 'Kutkai', '14', '2023-09-21 15:25:12', '2023-09-21 15:25:12'),
(197, 'Kyaukme', '14', '2023-09-21 15:25:23', '2023-09-21 15:25:23'),
(198, 'Kyethi', '14', '2023-09-21 15:25:36', '2023-09-21 15:25:36'),
(199, 'Kyethi', '14', '2023-09-21 15:25:48', '2023-09-21 15:25:48'),
(200, 'Lai-Hka', '14', '2023-09-21 15:26:10', '2023-09-21 15:26:10'),
(201, 'Langhko', '14', '2023-09-21 15:26:22', '2023-09-21 15:26:22'),
(202, 'Lashio', '14', '2023-09-21 15:26:38', '2023-09-21 15:26:38'),
(203, 'Laukkaing', '14', '2023-09-21 15:27:21', '2023-09-21 15:27:21'),
(204, 'Lawksawk', '14', '2023-09-21 15:27:36', '2023-09-21 15:27:36'),
(205, 'Loilem', '14', '2023-09-21 15:27:46', '2023-09-21 15:27:46'),
(206, 'Mabein', '14', '2023-09-21 15:28:00', '2023-09-21 15:28:00'),
(207, 'Mantong', '14', '2023-09-21 15:28:13', '2023-09-21 15:28:13'),
(208, 'Mawkmai', '14', '2023-09-21 15:28:27', '2023-09-21 15:28:27'),
(209, 'Mong Hpayak', '14', '2023-09-21 15:28:41', '2023-09-21 15:28:41'),
(210, 'Mong Hsat', '14', '2023-09-21 15:29:21', '2023-09-21 15:29:21'),
(211, 'Mong Hsu', '14', '2023-09-21 15:29:34', '2023-09-21 15:29:34'),
(212, 'Mong Khet', '14', '2023-09-21 15:29:44', '2023-09-21 15:29:44'),
(213, 'Mong Kung', '14', '2023-09-21 15:29:56', '2023-09-21 15:29:56'),
(214, 'Mong Nai', '14', '2023-09-21 15:30:10', '2023-09-21 15:30:10'),
(215, 'Mong Pan', '14', '2023-09-21 15:30:20', '2023-09-21 15:30:20'),
(216, 'Mong Ping', '14', '2023-09-21 15:30:34', '2023-09-21 15:30:34'),
(217, 'Mong Yang', '14', '2023-09-21 15:32:40', '2023-09-21 15:32:40'),
(218, 'Mong Yawng', '14', '2023-09-21 15:32:51', '2023-09-21 15:32:51'),
(219, 'Mongmao', '14', '2023-09-21 15:33:02', '2023-09-21 15:33:02'),
(220, 'Mongmit', '14', '2023-09-21 15:33:31', '2023-09-21 15:33:31'),
(221, 'Mongyai', '14', '2023-09-21 15:33:44', '2023-09-21 15:33:44'),
(222, 'Mu Se', '14', '2023-09-21 15:33:59', '2023-09-21 15:33:59'),
(223, 'Namhkam', '14', '2023-09-21 15:34:09', '2023-09-21 15:34:09'),
(224, 'Namhsan', '14', '2023-09-21 15:34:19', '2023-09-21 15:34:19'),
(225, 'Namtu', '14', '2023-09-21 15:34:30', '2023-09-21 15:34:30'),
(226, 'Nansang', '14', '2023-09-21 15:34:40', '2023-09-21 15:34:40'),
(227, 'Nawnghkio', '14', '2023-09-21 15:35:16', '2023-09-21 15:35:16'),
(228, 'Nyaungshwe', '14', '2023-09-21 15:35:27', '2023-09-21 15:35:27'),
(229, 'Panglong', '14', '2023-09-21 15:36:14', '2023-09-21 15:36:14'),
(230, 'Pekon', '14', '2023-09-21 15:36:25', '2023-09-21 15:36:25'),
(231, 'Pindaya', '14', '2023-09-21 15:36:38', '2023-09-21 15:36:38'),
(232, 'Pinlaung', '14', '2023-09-21 15:36:52', '2023-09-21 15:36:52'),
(233, 'Tachileik', '14', '2023-09-21 15:37:02', '2023-09-21 15:37:02'),
(234, 'Tangyan', '14', '2023-09-21 15:37:13', '2023-09-21 15:37:13'),
(235, 'Taunggyi', '14', '2023-09-21 15:37:23', '2023-09-21 15:37:23'),
(236, 'Ywangan', '14', '2023-09-21 15:37:35', '2023-09-21 15:37:35'),
(237, 'Hkamti', '15', '2023-09-21 15:40:44', '2023-09-21 15:40:44'),
(238, 'Homalin', '15', '2023-09-21 15:41:31', '2023-09-21 15:41:31'),
(239, 'Kale', '15', '2023-09-21 15:41:44', '2023-09-21 15:41:44'),
(240, 'Kalewa', '15', '2023-09-21 15:42:00', '2023-09-21 15:42:00'),
(241, 'Mingin', '15', '2023-09-21 15:42:16', '2023-09-21 15:42:16'),
(242, 'Kanbalu', '15', '2023-09-21 15:42:29', '2023-09-21 15:42:29'),
(243, 'Kyunhla', '15', '2023-09-21 15:42:42', '2023-09-21 15:42:42'),
(244, 'Banmauk', '15', '2023-09-21 15:43:06', '2023-09-21 15:43:06'),
(245, 'Htigyaing', '15', '2023-09-21 15:43:21', '2023-09-21 15:43:21'),
(246, 'Indaw', '15', '2023-09-21 15:43:35', '2023-09-21 15:43:35'),
(247, 'Katha', '15', '2023-09-21 15:43:56', '2023-09-21 15:43:56'),
(248, 'Kawlin', '15', '2023-09-21 15:44:10', '2023-09-21 15:44:10'),
(249, 'Pinlebu', '15', '2023-09-21 15:44:21', '2023-09-21 15:44:21'),
(250, 'Wuntho', '15', '2023-09-21 15:44:35', '2023-09-21 15:44:35'),
(251, 'Mawlaik', '15', '2023-09-21 15:44:48', '2023-09-21 15:44:48'),
(252, 'Paungbyin', '15', '2023-09-21 15:45:09', '2023-09-21 15:45:09'),
(253, 'Ayadaw', '15', '2023-09-21 15:45:25', '2023-09-21 15:45:25'),
(254, 'Budalin', '15', '2023-09-21 15:46:11', '2023-09-21 15:46:11'),
(255, 'Chaung-U', '15', '2023-09-21 15:46:24', '2023-09-21 15:46:24'),
(256, 'Monywa', '15', '2023-09-21 15:46:41', '2023-09-21 15:46:41'),
(257, 'Lahe', '15', '2023-09-21 15:46:57', '2023-09-21 15:46:57'),
(258, 'Leshi', '15', '2023-09-21 15:47:09', '2023-09-21 15:47:09'),
(259, 'Nanyun', '15', '2023-09-21 15:47:26', '2023-09-21 15:47:26'),
(260, 'Myaung', '15', '2023-09-21 15:47:38', '2023-09-21 15:47:38'),
(261, 'Myinmu', '15', '2023-09-21 15:47:50', '2023-09-21 15:47:50'),
(262, 'Sagaing', '15', '2023-09-21 15:48:02', '2023-09-21 15:48:02'),
(263, 'Khin-U', '15', '2023-09-21 15:48:16', '2023-09-21 15:48:16'),
(264, 'Shwebo', '15', '2023-09-21 15:48:29', '2023-09-21 15:48:29'),
(265, 'Wetlet', '15', '2023-09-21 15:48:45', '2023-09-21 15:48:45'),
(266, 'Tamu', '15', '2023-09-21 15:49:01', '2023-09-21 15:49:01'),
(267, 'Tabayin', '15', '2023-09-21 15:49:12', '2023-09-21 15:49:12'),
(268, 'Taze', '15', '2023-09-21 15:49:22', '2023-09-21 15:49:22'),
(269, 'Ye-U', '15', '2023-09-21 15:49:33', '2023-09-21 15:49:33'),
(270, 'Kani', '15', '2023-09-21 15:49:47', '2023-09-21 15:49:47'),
(271, 'Pale', '15', '2023-09-21 15:49:58', '2023-09-21 15:49:58'),
(272, 'Salingyi', '15', '2023-09-21 15:50:15', '2023-09-21 15:50:15'),
(273, 'Yinmabin', '15', '2023-09-21 15:50:29', '2023-09-21 15:50:29'),
(274, 'Falam', '16', '2023-09-21 15:51:21', '2023-09-21 15:51:21'),
(275, 'Hakha', '16', '2023-09-21 15:51:39', '2023-09-21 15:51:39'),
(276, 'Kanpetlet', '16', '2023-09-21 15:51:50', '2023-09-21 15:51:50'),
(277, 'Matupi', '16', '2023-09-21 15:52:03', '2023-09-21 15:52:03'),
(278, 'Mindat', '16', '2023-09-21 15:52:13', '2023-09-21 15:52:13'),
(279, 'Paletwa', '16', '2023-09-21 15:52:29', '2023-09-21 15:52:29'),
(280, 'Tedim', '16', '2023-09-21 15:52:40', '2023-09-21 15:52:40'),
(281, 'Thantlang', '16', '2023-09-21 15:52:51', '2023-09-21 15:52:51'),
(282, 'Tonzang', '16', '2023-09-21 15:53:05', '2023-09-21 15:53:05'),
(283, 'Bhamo', '17', '2023-09-21 15:53:36', '2023-09-21 15:53:36'),
(284, 'Chipwi', '17', '2023-09-21 15:53:50', '2023-09-21 15:53:50'),
(285, 'Hpakant', '17', '2023-09-21 15:54:06', '2023-09-21 15:54:06'),
(286, 'Hsawlaw', '17', '2023-09-21 15:54:20', '2023-09-21 15:54:20'),
(287, 'Injangyang', '17', '2023-09-21 15:54:33', '2023-09-21 15:54:33'),
(288, 'Kawnglanghpu', '17', '2023-09-21 15:54:51', '2023-09-21 15:54:51'),
(289, 'Machanbaw', '17', '2023-09-21 15:55:06', '2023-09-21 15:55:06'),
(290, 'Mansi', '17', '2023-09-21 15:55:17', '2023-09-21 15:55:17'),
(291, 'Mogaung', '17', '2023-09-21 15:55:31', '2023-09-21 15:55:31'),
(292, 'Mohnyin', '17', '2023-09-21 15:55:43', '2023-09-21 15:55:43'),
(293, 'Momauk', '17', '2023-09-21 15:56:01', '2023-09-21 15:56:01'),
(294, 'Myitkyina', '17', '2023-09-21 15:56:12', '2023-09-21 15:56:12'),
(295, 'Nogmung', '17', '2023-09-21 15:56:29', '2023-09-21 15:56:29'),
(296, 'Putao', '17', '2023-09-21 15:57:49', '2023-09-21 15:57:49'),
(297, 'Sadon', '17', '2023-09-21 15:58:00', '2023-09-21 15:58:00'),
(298, 'Shwegu', '17', '2023-09-21 15:58:12', '2023-09-21 15:58:12'),
(299, 'Sumprabum', '17', '2023-09-21 15:58:25', '2023-09-21 15:58:25'),
(300, 'Tanai', '17', '2023-09-21 15:59:01', '2023-09-21 15:59:01'),
(301, 'Waingmaw', '17', '2023-09-21 15:59:14', '2023-09-21 15:59:14'),
(302, 'Mahlaing', '2', '2023-09-27 07:43:13', '2023-09-27 07:43:13'),
(303, 'Meiktila', '2', '2023-09-27 07:43:42', '2023-09-27 07:43:42'),
(304, 'Mogok', '2', '2023-09-27 07:43:52', '2023-09-27 07:43:52'),
(305, 'Myingyan', '2', '2023-09-27 07:44:08', '2023-09-27 07:44:08'),
(306, 'Myittha', '2', '2023-09-27 07:44:21', '2023-09-27 07:44:21'),
(307, 'Pyawbwe', '2', '2023-09-27 07:44:36', '2023-09-27 07:44:36'),
(308, 'Pyinoolwin', '2', '2023-09-27 07:44:49', '2023-09-27 07:44:49'),
(309, 'Kyaukpadaung', '2', '2023-09-27 07:46:19', '2023-09-27 07:46:19'),
(310, 'Kyaukse', '2', '2023-09-27 07:46:31', '2023-09-27 07:46:31'),
(311, 'Natogyi', '2', '2023-09-27 07:46:53', '2023-09-27 07:46:53'),
(312, 'Ngazun', '2', '2023-09-27 07:47:25', '2023-09-27 07:47:25'),
(313, 'Nyaung-U', '2', '2023-09-27 07:47:48', '2023-09-27 07:47:48'),
(314, 'Singu', '2', '2023-09-27 07:48:15', '2023-09-27 07:48:15'),
(315, 'Sintgaing', '2', '2023-09-27 07:48:28', '2023-09-27 07:48:28'),
(316, 'Tada-U', '2', '2023-09-27 07:48:53', '2023-09-27 07:48:53'),
(317, 'Taungtha', '2', '2023-09-27 07:49:08', '2023-09-27 07:49:08'),
(318, 'Thabeikkyin', '2', '2023-09-27 07:49:22', '2023-09-27 07:49:22'),
(319, 'Thazi', '2', '2023-09-27 07:49:50', '2023-09-27 07:49:50'),
(320, 'Wundwin', '2', '2023-09-27 07:50:14', '2023-09-27 07:50:14'),
(321, 'Yamethin', '2', '2023-09-27 07:50:37', '2023-09-27 07:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `student_id` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `limit_user` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absents`
--
ALTER TABLE `absents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `absent_classrooms`
--
ALTER TABLE `absent_classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement_comments`
--
ALTER TABLE `announcement_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_lists`
--
ALTER TABLE `attendance_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_fees`
--
ALTER TABLE `course_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expends`
--
ALTER TABLE `expends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_comments`
--
ALTER TABLE `forum_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `future_interests`
--
ALTER TABLE `future_interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generate_student_codes`
--
ALTER TABLE `generate_student_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_details`
--
ALTER TABLE `income_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_sources`
--
ALTER TABLE `income_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_statuses`
--
ALTER TABLE `medical_statuses`
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
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nrc_infos`
--
ALTER TABLE `nrc_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_answers`
--
ALTER TABLE `question_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_categories`
--
ALTER TABLE `question_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_listenings`
--
ALTER TABLE `question_listenings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `source_surveys`
--
ALTER TABLE `source_surveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_leaves`
--
ALTER TABLE `staff_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_answers`
--
ALTER TABLE `student_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_answer_listenings`
--
ALTER TABLE `student_answer_listenings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_limits`
--
ALTER TABLE `student_limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_medical_statuses`
--
ALTER TABLE `student_medical_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_attendances`
--
ALTER TABLE `teacher_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_limits`
--
ALTER TABLE `teacher_limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `townships`
--
ALTER TABLE `townships`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `absents`
--
ALTER TABLE `absents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `absent_classrooms`
--
ALTER TABLE `absent_classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `announcement_comments`
--
ALTER TABLE `announcement_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance_lists`
--
ALTER TABLE `attendance_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_fees`
--
ALTER TABLE `course_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `expends`
--
ALTER TABLE `expends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forum_comments`
--
ALTER TABLE `forum_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `future_interests`
--
ALTER TABLE `future_interests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `generate_student_codes`
--
ALTER TABLE `generate_student_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `income_details`
--
ALTER TABLE `income_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `income_sources`
--
ALTER TABLE `income_sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_statuses`
--
ALTER TABLE `medical_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nrc_infos`
--
ALTER TABLE `nrc_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=446;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `question_answers`
--
ALTER TABLE `question_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `question_categories`
--
ALTER TABLE `question_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_listenings`
--
ALTER TABLE `question_listenings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `source_surveys`
--
ALTER TABLE `source_surveys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff_leaves`
--
ALTER TABLE `staff_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `student_answers`
--
ALTER TABLE `student_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student_answer_listenings`
--
ALTER TABLE `student_answer_listenings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_limits`
--
ALTER TABLE `student_limits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_medical_statuses`
--
ALTER TABLE `student_medical_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teacher_attendances`
--
ALTER TABLE `teacher_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher_limits`
--
ALTER TABLE `teacher_limits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `townships`
--
ALTER TABLE `townships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
