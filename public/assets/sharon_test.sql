-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 03:44 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharon_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `build_img` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_type` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `build_img`, `title`, `description`, `course_type`, `created_at`, `updated_at`) VALUES
(1, 'assets/images/build1.png', 'BODY BUILDING', 'Lorem ipsum dolor sit amet, ei veritus consetetur repudiandae eam, duo ne homero nostro moderatius.', 1, '2021-05-28 16:52:27', '2021-05-28 16:52:27'),
(2, 'assets/images/build2.png', 'FITNESS & BOXIN', 'Lorem ipsum dolor sit amet, ei veritus consetetur repudiandae eam, duo ne homero nostro moderatius.', 2, '2021-05-28 16:55:52', '2021-05-28 16:55:52'),
(3, 'assets/images/build3.png', 'YOGA', 'Lorem ipsum dolor sit amet, ei veritus consetetur repudiandae eam, duo ne homero nostro moderatius.', 3, '2021-05-28 16:55:52', '2021-05-28 16:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'uncategory', 'uncategory', 'default.png', '2021-05-29 13:24:39', '2021-05-29 13:24:39'),
(2, 'body building', 'body-building', 'default.png', '2021-05-29 13:24:39', '2021-05-29 13:24:39'),
(3, 'trainer', 'trainer', 'default.png', '2021-05-29 13:24:39', '2021-05-29 13:24:39'),
(4, 'running', 'running', 'default.png', '2021-05-29 13:24:39', '2021-05-29 13:24:39'),
(5, 'yoga', 'yoga', 'default.png', '2021-05-29 13:24:39', '2021-05-29 13:24:39'),
(6, 'fitness classes', 'fitness-classes', 'default.png', '2021-06-24 11:52:37', '2021-06-24 11:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locationsign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailsign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonesign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `messages` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `where` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'conact-page',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `locationsign`, `location`, `emailsign`, `email`, `phonesign`, `phone_no`, `messages`, `contact_id`, `where`, `created_at`, `updated_at`) VALUES
(2, NULL, 'location-60d7791fc67c4.png', '31 T Peck Street, Londonderry, New Hampshire, HN 2134.', 'abutaher267-at-gmailcom-60d7791fce4c6.png', 'abutaher267@gmail.com', 'phone-no-60d7791fcc19e.png', '(+1) 123 456 4785, (+1) 123 456 9857', NULL, NULL, 'contact-page', '2021-06-25 12:32:54', '2021-06-26 12:59:43'),
(15, NULL, 'location.png', '23 New Design Street, Melbourne', 'email.png', 'fitnessgym@gmail.com', 'phone.png', '+880-123-456-7890', NULL, NULL, 'footer', '2021-06-27 10:11:53', '2021-06-27 10:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `course_classes`
--

CREATE TABLE `course_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `class_time` bigint(20) UNSIGNED DEFAULT NULL,
  `trainer` bigint(10) UNSIGNED DEFAULT NULL,
  `build_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_classes`
--

INSERT INTO `course_classes` (`id`, `title`, `description`, `image`, `type`, `date`, `time`, `slug`, `status`, `class_time`, `trainer`, `build_id`, `created_at`, `updated_at`) VALUES
(1, 'Weight Lifting', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maxi', 'weight-lifting-2021-06-28-60da2c2a4986d.png', '1', 'Jun-29-2021', '02:08:10', 'weight-lifting-1', 1, 1, 8, 2, '2021-05-28 16:30:32', '2021-06-28 20:08:10'),
(2, 'Daily Yoga', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maxi', 'daily-yoga-2021-06-28-60da2c4967fda.png', '2', 'Jun-29-2021', '02:08:41', 'daily-yoga-2', 1, 2, 1, 3, '2021-05-28 16:31:03', '2021-06-28 20:08:41'),
(3, 'Running Way', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maxi', 'running-way-2021-06-28-60da2c6007a07.png', '3', 'Jun-29-2021', '02:09:04', 'running-way-3', 1, 3, 5, 3, '2021-05-28 16:31:29', '2021-06-28 20:09:04'),
(4, 'Karate', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maxi', 'karate-2021-06-28-60da2c7c15ef3.png', '1', 'Jun-29-2021', '02:09:32', 'karate-4', 1, 4, 8, 2, '2021-05-28 18:33:37', '2021-06-28 20:09:32'),
(5, 'Bag Training Class', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus', 'bag-training-class-2021-06-28-60da2b5c3d5f4.png', '2', 'Jun-29-2021', '02:04:44', 'bag-training-class-5', 1, 1, 2, 2, '2021-06-21 15:07:25', '2021-06-28 20:04:44'),
(6, 'Boxing Class', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus', 'boxing-class-2021-06-28-60da2c9d93a58.png', '1', '29 Jun 2021', '09:04:44', 'boxing-class-6', 1, 2, 7, 2, '2021-06-19 15:07:55', '2021-06-29 15:04:44'),
(7, 'Pilates Class', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus', 'pilates-class-2021-06-28-60da2cb7e2622.png', '3', 'Jun-29-2021', '12:10:32', 'pilates-class-7', 1, 4, 10, 3, '2021-06-02 15:08:23', '2021-06-28 20:10:32'),
(8, 'Leg Workout', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus', 'leg-workout-2021-06-28-60da2ccf2408a.png', '1', '29 Jun 2021', '09:05:46', 'leg-workout-8', 1, 3, 9, 2, '2021-06-16 15:08:05', '2021-06-29 15:05:46'),
(9, 'Pull Up', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus', 'pull-up-2021-06-28-60da2ced94c38.png', '4', 'Jun-29-2021', '02:11:25', 'pull-up-9', 1, 3, 2, 3, '2021-06-10 15:08:29', '2021-06-28 20:11:25');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `course`, `course_image`, `cat_id`, `created_at`, `updated_at`) VALUES
(1, 'yoga', 'assets/images/gallery1.png', NULL, '2021-05-28 20:26:43', '2021-05-28 20:26:43'),
(2, 'running', 'assets/images/gallery2.png', NULL, '2021-05-28 20:36:56', '2021-05-28 20:36:56'),
(3, 'gym', 'assets/images/gallery3.png', NULL, '2021-05-28 20:36:56', '2021-05-28 20:36:56'),
(4, 'fitness', 'assets/images/gallery4.png', NULL, '2021-05-28 20:36:56', '2021-05-28 20:36:56'),
(5, 'yoga', 'assets/images/gallery5.png', NULL, '2021-05-28 20:36:56', '2021-05-28 20:36:56'),
(6, 'gym', 'assets/images/gallery6.png', NULL, '2021-05-28 20:36:56', '2021-05-28 20:36:56'),
(7, 'running', 'assets/images/gallery7.png', NULL, '2021-05-28 20:36:56', '2021-05-28 20:36:56'),
(8, 'fitness', 'assets/images/gallery8.png', NULL, '2021-05-28 20:36:56', '2021-05-28 20:36:56'),
(9, 'gym', 'assets/images/gallery9.png', NULL, '2021-05-28 20:36:56', '2021-05-28 20:36:56'),
(10, 'running', 'assets/images/gallery10.png', NULL, '2021-05-28 20:36:56', '2021-05-28 20:36:56'),
(11, 'gym', 'assets/images/gallery11.png', NULL, '2021-05-28 20:36:56', '2021-05-28 20:36:56'),
(12, 'fitness', 'assets/images/gallery12.png', NULL, '2021-05-28 20:36:56', '2021-05-28 20:36:56');

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
(4, '2021_05_27_183730_create_course_classes_table', 1),
(5, '2021_05_27_184337_create_trainers_table', 1),
(6, '2021_05_27_184441_create_galleries_table', 1),
(8, '2021_05_28_040848_create_buildings_table', 1),
(9, '2021_05_28_042655_create_single_classes_table', 1),
(11, '2021_05_28_044308_create_categories_table', 2),
(15, '2021_06_07_172605_create_class_days_table', 5),
(20, '2021_06_08_091021_create_our_addresses_table', 7),
(27, '2021_06_08_144856_create_class_times_table', 10),
(37, '2021_05_29_144223_create_contact_us_table', 14),
(39, '2021_06_22_190352_create_guest_mails_table', 14),
(60, '2021_07_01_173851_create_admins_table', 15),
(61, '2021_07_02_133815_add_login', 15),
(76, '2016_07_02_095050_create_admin_roles_table', 16),
(77, '2016_07_02_095540_add_admin_role_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `cat_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `posted_by` bigint(20) UNSIGNED NOT NULL,
  `approved_by` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `description`, `image`, `cat_id`, `posted_by`, `approved_by`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet 1', 'lorem-ipsum-dolor-sit-amet-1', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus.', 'lorem-ipsum-dolor-sit-amet-1-2021-06-19-60cdf4e187d1b.png', 2, 0, 1, 'Jun-19-2021', 0, '2021-06-18 11:18:36', '2021-07-03 13:22:33'),
(2, 'Lorem ipsum dolor sit amet 2', 'lorem-ipsum-dolor-sit-amet-2', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus.', 'lorem-ipsum-dolor-sit-amet-2-2021-06-18-60ccde6349eb1.png', 6, 2, 0, 'Jun-18-2021', 0, '2021-06-18 11:56:51', '2021-07-03 12:54:50'),
(3, 'Lorem Ipsum Dolor Sit Amet 3', 'lorem-ipsum-dolor-sit-amet-3', 'Aliquam Eu Malesuada Risus. Vivamus Sagittis Enim Tempor Eros Consectetur, At Ullamcorper Neque Maximus.', 'lorem-ipsum-dolor-sit-amet-3-2021-06-19-60cdfd67c06a3.png', 2, 0, 0, 'Jun-19-2021', 1, '2021-06-19 08:21:28', '2021-06-19 08:21:28'),
(4, 'Lorem ipsum dolor sit amet 4', 'lorem-ipsum-dolor-sit-amet-4', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus.', 'lorem-ipsum-dolor-sit-amet-4-2021-06-19-60cdfd95ac4de.png', 4, 0, 0, 'Jun-19-2021', 0, '2021-06-19 08:22:14', '2021-06-19 08:22:14'),
(5, 'Lorem ipsum dolor sit amet 5', 'lorem-ipsum-dolor-sit-amet-5', 'Aliquam Eu Malesuada Risus. Vivamus Sagittis Enim Tempor Eros Consectetur, At Ullamcorper Neque Maximus.', 'lorem-ipsum-dolor-sit-amet-5-2021-06-19-60cdfdd29e04b.png', 6, 0, 0, 'Jun-19-2021', 0, '2021-06-19 08:23:15', '2021-06-19 08:23:15'),
(6, 'Lorem ipsum dolor sit amet 6', 'lorem-ipsum-dolor-sit-amet-6', 'Aliquam Eu Malesuada Risus. Vivamus Sagittis Enim Tempor Eros Consectetur, At Ullamcorper Neque Maximus.', 'lorem-ipsum-dolor-sit-amet-6-2021-06-19-60cdfdf18b29c.png', 5, 0, 0, 'Jun-19-2021', 0, '2021-06-19 08:23:46', '2021-06-19 08:23:46'),
(8, 'Lorem ipsum dolor sit amet 111', 'lorem-ipsum-dolor-sit-amet-111', NULL, 'default.png', 5, 0, 0, 'Jun-19-2021', 0, '2021-06-19 11:00:47', '2021-06-19 11:28:35'),
(9, 'This is demonstration title', 'this-is-demonstration-title', 'Aliquam Eu Malesuada Risus. Vivamus Sagittis Enim Tempor Eros Consectetur, At Ullamcorper Neque Maximus.', 'this-is-demonstration-title-2021-06-19-60ce46a3a5f5a.png', 3, 0, 0, 'Jun-19-2021', 0, '2021-06-19 13:33:56', '2021-06-19 13:35:47'),
(10, 'Demo', 'demo-10', 'Aliquam Eu Malesuada Risus. Vivamus Sagittis Enim Tempor Eros Consectetur, At Ullamcorper Neque Maximus.', 'demo-title-2021-06-20-60cf44eb8b374.png', 4, 10, 1, 'Jul-03-2021', 0, '2021-06-19 13:36:47', '2021-07-03 13:53:02'),
(11, 'demones', 'demones-11', NULL, 'fkdj-fdkfjdkfdkj-2021-06-19-60ce4796dba62.png', 0, 11, 1, 'Jul-03-2021', 1, '2021-06-19 13:37:59', '2021-07-03 13:29:44'),
(12, 'Lorem ipsum dolor sit amet 1', 'lorem-ipsum-dolor-sit-amet-1-332', NULL, 'default.png', 0, 0, 0, 'Jun-20-2021', 1, '2021-06-20 04:27:10', '2021-07-03 09:42:16');

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
-- Table structure for table `single_classes`
--

CREATE TABLE `single_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_img` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_speciality` int(11) DEFAULT NULL,
  `course_type` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_time_id` bigint(20) DEFAULT NULL,
  `trainer_image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `staus` tinyint(1) NOT NULL DEFAULT 1,
  `approved_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `class_time_id`, `trainer_image`, `type`, `staus`, `approved_by`, `created_at`, `updated_at`) VALUES
(1, 'Justin Hessen', 1, 'justin-hessen60d9d89230699.png', '1', 1, NULL, '2021-05-28 15:56:55', '2021-06-28 08:11:30'),
(2, 'Romia Rose', 2, 'romia-rose60d9d9951611e.png', '1', 1, NULL, '2021-05-28 15:57:28', '2021-06-28 08:15:49'),
(3, 'Simron Wigs', 3, 'simron-wigs60d9d9b9d8de3.png', '3', 1, NULL, '2021-05-28 15:57:37', '2021-06-28 08:16:26'),
(4, 'John Smile', 4, 'john-smile60d9d9e681a5d.png', '2', 1, NULL, '2021-05-28 15:57:41', '2021-06-28 08:17:10'),
(5, 'Mike Doe', 5, 'mike-doe60d9da0b624f9.png', '1', 1, NULL, '2021-05-28 15:57:46', '2021-06-28 08:17:47'),
(6, 'Jason Doenly', 6, 'jason-doenly60d9da2bbdc1a.png', '4', 1, NULL, '2021-05-28 15:57:50', '2021-06-28 08:18:20'),
(7, 'Jane Doe', 7, 'jane-doe60d9da55c5bf7.png', '3', 1, NULL, '2021-05-28 15:58:00', '2021-06-28 08:19:02'),
(8, 'Laura Marsh', 8, 'laura-marsh60d9da708a538.png', '2', 1, NULL, '2021-05-28 15:58:05', '2021-06-28 08:19:28'),
(9, 'Sandra Borrego', 9, 'sandra-borrego60d9da881737c.png', '2', 1, NULL, '2021-05-28 15:58:10', '2021-06-28 08:19:52'),
(10, 'Stuart Marsh', 10, 'stuart-marsh60d9daa48a93e.png', '1', 1, NULL, '2021-05-28 15:58:16', '2021-06-28 08:20:20'),
(11, 'Michael Yardy', 11, 'michael-yardy60d9dac7cddc3.png', '3', 1, NULL, '2021-05-28 15:58:21', '2021-06-28 08:20:56'),
(12, 'Marta Ruiz', 12, 'marta-ruiz60d9daec1f7ea.png', '1', 1, NULL, '2021-05-28 15:58:28', '2021-06-28 08:21:32');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abu Taher', 'abutaher267@gmail.com', '2021-06-08 11:38:51', '$2y$10$2ygjpjTFvMz53r3ApCTtKuyZoMsy6R.isasAEVCrAWgr0/DCjKpNC', NULL, '2021-05-28 05:04:51', '2021-05-28 05:05:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_classes`
--
ALTER TABLE `course_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `single_classes`
--
ALTER TABLE `single_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
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
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `course_classes`
--
ALTER TABLE `course_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `single_classes`
--
ALTER TABLE `single_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
