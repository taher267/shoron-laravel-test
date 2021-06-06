-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 04:28 PM
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
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_id`, `category`, `created_at`, `updated_at`) VALUES
(1, 1, 'fitness classes', '2021-05-29 13:24:39', '2021-05-29 13:24:39'),
(2, 2, 'body building', '2021-05-29 13:24:39', '2021-05-29 13:24:39'),
(3, 3, 'trainer', '2021-05-29 13:24:39', '2021-05-29 13:24:39'),
(4, 4, 'running', '2021-05-29 13:24:39', '2021-05-29 13:24:39'),
(5, 5, 'yoga', '2021-05-29 13:24:39', '2021-05-29 13:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone_no`, `messages`, `contact_id`, `created_at`, `updated_at`) VALUES
(1, 'Abu Taher', 'abutaher@gmail.com', '01962054584', '', 5105689, '0000-00-00 00:00:00', '2021-05-29 10:52:28'),
(2, 'Mobile', '', '01962054584', 'fdfdfdfdfd', 4004986, '2021-05-29 10:57:57', '2021-05-29 10:57:57'),
(3, 'Mobile', '', '01962054584', 'dsfsdf', 7281731, '2021-05-29 12:32:08', '2021-05-29 12:32:08'),
(4, 'Mobile', '', '+01962054584', 'dfdfd', 4025177, '2021-05-29 13:21:32', '2021-05-29 13:21:32'),
(5, 'Mobile', '', '+21215151656', 'gfdgfdgfd', 3045523, '2021-05-29 13:25:20', '2021-05-29 13:25:20'),
(6, 'Abu Taher', '', '+8801962054584', 'Test Message', 6433850, '2021-05-29 13:27:25', '2021-05-29 13:27:25'),
(7, 'Mobile', '', '01962054584', 'gfg', 3432469, '2021-05-29 13:28:58', '2021-05-29 13:28:58'),
(8, 'Abu Taher', '', '01962054584', 'fdfd', 2815853, '2021-05-29 13:30:16', '2021-05-29 13:30:16'),
(9, 'Mobile', '', '+01962054584', 'fdfd', 6138239, '2021-05-29 13:32:52', '2021-05-29 13:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `course_classes`
--

CREATE TABLE `course_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `build_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_classes`
--

INSERT INTO `course_classes` (`id`, `title`, `description`, `image`, `type`, `date`, `time`, `cat_id`, `build_id`, `created_at`, `updated_at`) VALUES
(1, 'Weight Lifting', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maxi', 'assets/images/feature-thumb1.png', '1', '2021-05-28', '07:20:00', 1, 2, '2021-05-28 16:30:32', '2021-05-28 16:30:49'),
(2, 'Daily Yoga\r\n', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maxi', 'assets/images/feature-thumb2.png', '2', '2021-05-28', '09:00:00', 2, 3, '2021-05-28 16:31:03', '2021-05-28 16:31:16'),
(3, 'Running Way', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maxi', 'assets/images/feature-thumb3.png', '3', '2021-05-28', '12:00:00', 3, 3, '2021-05-28 16:31:29', '2021-05-28 16:31:35'),
(4, 'Karate', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maxi', 'assets/images/feature-thumb4.png', '1', '2021-05-29', '33:24:26', 4, 2, '2021-05-28 18:33:37', '2021-05-28 18:33:48'),
(5, 'Bag Training Class', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus', 'assets/images/feature-thumb5.png', '1', '2021-05-29', '33:24:26', 1, 2, NULL, NULL),
(6, 'Boxing Class', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus', 'assets/images/feature-thumb6.png', '1', '2021-05-29', '33:24:26', 2, 2, NULL, NULL),
(7, 'Pilates Class', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus', 'assets/images/feature-thumb7.png', '1', '2021-05-29', '33:24:26', 4, 3, NULL, NULL),
(8, 'Leg Workout', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus', 'assets/images/feature-thumb8.png', '1', '2021-05-29', '33:24:26', 3, 2, NULL, NULL),
(9, 'Pull Up', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus', 'assets/images/feature-thumb9.png', '1', '2021-05-29', '33:24:26', 3, 3, NULL, NULL);

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
(7, '2021_05_27_184519_create_news_table', 1),
(8, '2021_05_28_040848_create_buildings_table', 1),
(9, '2021_05_28_042655_create_single_classes_table', 1),
(11, '2021_05_28_044308_create_categories_table', 2),
(13, '2021_05_29_144223_create_contact_us_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `cat_id`, `date`, `created_at`, `updated_at`) VALUES
(1, '	\r\nLorem ipsum dolor sit amet', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus.', 'assets/images/news-img1.png', 1, '2021-05-29', '2021-05-29 07:40:37', '2021-05-29 07:40:37'),
(2, 'Lorem ipsum dolor sit amet', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus.', 'assets/images/news-img2.png', 2, '2021-05-29', '2021-05-29 07:40:37', '2021-05-29 07:40:37'),
(3, 'Lorem ipsum dolor sit amet', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus.', 'assets/images/news-img3.png', 4, '2021-05-29', '2021-05-29 07:40:37', '2021-05-29 07:40:37'),
(4, 'Lorem ipsum dolor sit amet', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus.', 'assets/images/news-img4.png', 1, '2021-05-29', '2021-05-29 07:40:37', '2021-05-29 07:40:37'),
(5, 'Lorem ipsum dolor sit amet', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus.', 'assets/images/news-img5.png', 3, '2021-05-29', '2021-05-29 07:40:37', '2021-05-29 07:40:37'),
(6, 'Lorem ipsum dolor sit amet', 'Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus.', 'assets/images/news-img6.png', 2, '2021-05-29', '2021-05-29 07:40:37', '2021-05-29 07:40:37');

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
  `trainer_image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `trainer_image`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Justin Hessen', 'assets/images/trainer1.png', '1', '2021-05-28 15:56:55', '2021-05-28 15:57:10'),
(2, 'Romia Rose', 'assets/images/trainer2.png', '1', '2021-05-28 15:57:28', '2021-05-28 15:59:06'),
(3, 'Simron Wigs', 'assets/images/trainer3.png', '3', '2021-05-28 15:57:37', '2021-05-28 15:59:10'),
(4, 'John Smile', 'assets/images/trainer4.png', '2', '2021-05-28 15:57:41', '2021-05-28 15:59:13'),
(5, 'Mike Doe', 'assets/images/trainer5.png', '1', '2021-05-28 15:57:46', '2021-05-28 15:59:18'),
(6, 'Jason Doenly', 'assets/images/trainer6.png', '4', '2021-05-28 15:57:50', '2021-05-28 15:59:22'),
(7, 'Jane Doe', 'assets/images/trainer7.png', '3', '2021-05-28 15:58:00', '2021-05-28 15:59:26'),
(8, 'Laura Marsh', 'assets/images/trainer8.png', '2', '2021-05-28 15:58:05', '2021-05-28 15:58:56'),
(9, 'Sandra Borrego', 'assets/images/trainer9.png', '2', '2021-05-28 15:58:10', '2021-05-28 15:58:51'),
(10, 'Stuart Marsh', 'assets/images/trainer10.png', '1', '2021-05-28 15:58:16', '2021-05-28 15:58:47'),
(11, 'Michael Yardy', 'assets/images/trainer11.png', '3', '2021-05-28 15:58:21', '2021-05-28 15:58:43'),
(12, 'Marta Ruiz', 'assets/images/trainer12.png', '1', '2021-05-28 15:58:28', '2021-05-28 15:58:38');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_classes`
--
ALTER TABLE `course_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `single_classes`
--
ALTER TABLE `single_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
