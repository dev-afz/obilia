-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2022 at 09:20 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obilia_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
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
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2022-09-26 12:06:16', '$2y$10$fZEPSOCC/ZOpzgcBrh9FEuFGOxYvoknccpEswjTzrnSbH.wdiCLey', 'f2RfD5GrMoUWDqib3HmfhYsBGhTkAWITZJ3qF8rU1o9JK9R7BxbJaf8Z19c9', '2022-09-26 12:06:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `industry_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`, `industry_id`) VALUES
(31, 'Logo & Brand Identity', 'logo-brand-identity', 'https://obilia.fra1.digitaloceanspaces.com/public/images/category/img-644e1b2c5361d871b4337ccdaebfadd2f2af68bc30e.Logo%20_%20Brand%20Identity_B_2x.webp', 'active', '2022-12-15 23:47:55', '2022-12-15 23:47:55', 1),
(32, 'Web & App Design', 'web-app-design', 'https://obilia.fra1.digitaloceanspaces.com/public/images/category/img-304ce9221f4131f69178d9285a946de877f332dee75.Web%20_%20App_2x.webp', 'active', '2022-12-15 23:48:44', '2022-12-15 23:48:44', 1),
(33, 'Art & Illustration', 'art-illustration', 'https://obilia.fra1.digitaloceanspaces.com/public/images/category/img-708f0f91cdd644158bd3fb349fd77d7a11cc8f669f8.Art%20_Illustration_2x.webp', 'active', '2022-12-15 23:49:53', '2022-12-15 23:49:53', 1),
(34, 'Search', 'search', 'https://obilia.fra1.digitaloceanspaces.com/public/images/category/img-253ef797b1e91e488445f1a13f707b3a58b69512a2b.Search.webp', 'active', '2022-12-15 23:50:48', '2022-12-15 23:50:48', 2),
(35, 'Social', 'social', 'https://obilia.fra1.digitaloceanspaces.com/public/images/category/img-5607e774b129bf41b751dd71c600bea079a92ede0db.Social.webp', 'active', '2022-12-15 23:51:16', '2022-12-15 23:51:16', 2),
(36, 'Advertising', 'advertising', 'https://obilia.fra1.digitaloceanspaces.com/public/images/category/img-346baf3064632efe3296d66a9eebc8a854991a9a761.bucket123.webp', 'active', '2022-12-15 23:52:09', '2022-12-15 23:52:09', 2);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings` json DEFAULT NULL,
  `job_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `name`, `uuid`, `settings`, `job_id`, `created_at`, `updated_at`) VALUES
(1, 'Test Chat', '95e93777-0458-407e-9bbd-719b3f913069', NULL, NULL, '2022-12-02 10:34:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat_participants`
--

CREATE TABLE `chat_participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('owner','admin','member') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experience_levels`
--

CREATE TABLE `experience_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experience_levels`
--

INSERT INTO `experience_levels` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Entry', 'entry', 'active', '2022-10-30 23:21:58', '2022-10-30 23:21:58'),
(2, 'Intermediate', 'intermediate', 'active', '2022-10-30 23:22:16', '2022-10-30 23:22:16'),
(3, 'Expert', 'expert', 'active', '2022-10-30 23:22:20', '2022-10-30 23:22:20');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Graphics & design', 'graphics-design', 'https://obilia.fra1.digitaloceanspaces.com/public/images/industries/industry-9360c3f82ac885fc4d5c535e0b733e75da7e3f01c9e.graphics-design.d32a2f8.svg', 'active', '2022-12-15 23:26:33', '2022-12-15 23:26:33'),
(2, 'Digital Marketing', 'digital-marketing', 'https://obilia.fra1.digitaloceanspaces.com/public/images/industries/industry-9382a8597ac99451e77f0b348b0e9c559f14b4af607.online-marketing.74e221b.svg', 'active', '2022-12-15 23:27:25', '2022-12-15 23:27:25'),
(3, 'Writing & Translation', 'writing-translation', 'https://obilia.fra1.digitaloceanspaces.com/public/images/industries/industry-962203a79216ebc6c394a0045de6404efec62889dac.writing-translation.32ebe2e.svg', 'active', '2022-12-15 23:28:08', '2022-12-15 23:28:08'),
(4, 'Video & Animation', 'video-animation', 'https://obilia.fra1.digitaloceanspaces.com/public/images/industries/industry-249d5f5468bf446c702a243405ed2753d77417c0da9.video-animation.f0d9d71.svg', 'active', '2022-12-15 23:28:44', '2022-12-15 23:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` enum('fixed','hourly') COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_hours` double(8,2) DEFAULT NULL,
  `size` enum('small','medium','large') COLLATE utf8mb4_unicode_ci NOT NULL,
  `visibility` enum('public','private','hidden') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_from` double(8,2) NOT NULL,
  `rate_to` double(8,2) NOT NULL,
  `experience_level_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `metadata` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_length_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','active','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `slug`, `description`, `banner`, `payment_type`, `work_hours`, `size`, `visibility`, `country`, `rate_from`, `rate_to`, `experience_level_id`, `sub_category_id`, `metadata`, `work_length_id`, `created_at`, `updated_at`, `user_id`, `status`) VALUES
(23, 'Logo Designer', 'logo-designer', 'Credibly reinvent focused processes vis-a-vis ethical human capital. Dramatically recaptiualize optimal convergence whereas standardized niches. Enthusiastically revolutionize wireless networks with.', 'https://obilia.fra1.digitaloceanspaces.com/public/images/jobs/banner-9189d37772891775c95142e1d08b7002e068523119d.batman.jpg', 'fixed', 20.00, 'small', 'public', 'india', 2000.00, 5000.00, 1, 12, NULL, 1, '2022-12-16 08:43:27', '2022-12-16 08:43:27', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bid_price` double(10,2) NOT NULL,
  `document` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_letter` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_invitations`
--

CREATE TABLE `job_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_responsibilities`
--

CREATE TABLE `job_responsibilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `responsibility` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_responsibilities`
--

INSERT INTO `job_responsibilities` (`id`, `job_id`, `responsibility`, `created_at`, `updated_at`) VALUES
(7, 23, 'Assertively iterate distributed data with granular metrics.', '2022-12-16 08:43:27', NULL),
(8, 23, 'Conveniently simplify bleeding-edge experiences through enterprise-wide niches.', '2022-12-16 08:43:27', NULL),
(9, 23, 'Proactively whiteboard excellent outsourcing rather than flexible.', '2022-12-16 08:43:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_skills`
--

CREATE TABLE `job_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED DEFAULT NULL,
  `other_skill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_skills`
--

INSERT INTO `job_skills` (`id`, `job_id`, `skill_id`, `other_skill`, `created_at`, `updated_at`) VALUES
(48, 23, 15, NULL, '2022-12-16 08:43:27', NULL),
(49, 23, 21, NULL, '2022-12-16 08:43:27', NULL),
(50, 23, 16, NULL, '2022-12-16 08:43:27', NULL),
(51, 23, NULL, 'Designer', '2022-12-16 08:43:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laravel_jobs`
--

CREATE TABLE `laravel_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `likeable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likeable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `likeable_type`, `likeable_id`, `created_at`, `updated_at`, `user_id`) VALUES
(11, 'App\\Models\\Job', 12, '2022-11-30 09:21:59', '2022-11-30 09:21:59', 1),
(12, 'App\\Models\\Job', 11, '2022-12-02 06:13:41', '2022-12-02 06:13:41', 4),
(13, 'App\\Models\\Job', 12, '2022-12-02 06:13:42', '2022-12-02 06:13:42', 4),
(14, 'App\\Models\\Job', 20, '2022-12-02 06:13:45', '2022-12-02 06:13:45', 4),
(15, 'App\\Models\\Job', 13, '2022-12-05 10:39:00', '2022-12-05 10:39:00', 1),
(17, 'App\\Models\\Job', 14, '2022-12-15 08:51:43', '2022-12-15 08:51:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `read_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_media`
--

CREATE TABLE `message_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_26_120050_create_admins_table', 2),
(6, '2022_09_27_055445_create_categories_table', 3),
(8, '2022_10_12_055434_create_sub_categories_table', 4),
(9, '2022_10_12_075458_create_packages_table', 5),
(10, '2022_10_12_092413_create_package_perks_table', 5),
(11, '2022_10_29_114051_create_experience_levels_table', 6),
(12, '2022_10_29_115737_create_skills_table', 6),
(13, '2022_10_29_120454_create_jobs_table', 6),
(14, '2022_10_31_062710_create_job_skills_table', 7),
(15, '2022_10_31_063031_add_project_scope_in_jobs_table', 7),
(16, '2022_10_31_063554_create_work_lengths_table', 7),
(17, '2022_10_31_065216_add_project_lenght_id_in_jobs_table', 8),
(18, '2022_11_04_062427_add_user_id_into_jobs_table', 9),
(19, '2022_11_04_071253_add_status_into_jobs_table', 10),
(20, '2022_11_07_054051_add_status_to_users_table', 11),
(21, '2022_11_07_101544_create_likes_table', 12),
(22, '2022_11_09_054620_add_user_id_to_likes_table', 13),
(23, '2022_11_15_061922_create_user_skills_table', 14),
(24, '2022_11_17_050508_create_job_applications_table', 15),
(25, '2022_11_17_050716_create_job_invitaions_table', 15),
(26, '2022_11_17_075559_add_bid_price_document_work_letter_to_job_applications_table', 16),
(35, '2022_11_19_054754_create_workspaces_table', 17),
(36, '2022_11_20_063530_create_chat_groups_table', 17),
(37, '2022_11_21_055257_create_chats_table', 17),
(38, '2022_11_21_055804_create_chat_media_table', 17),
(39, '2022_11_21_055930_create_chat_contracts_table', 17),
(40, '2022_11_21_065527_create_chat_group_participants_table', 17),
(41, '2022_11_28_125355_create_job_responsibilities_table', 18),
(42, '2022_11_29_105346_create_laravel_jobs_table', 19),
(43, '2022_12_02_095758_create_chats_table', 20),
(44, '2022_12_02_100023_create_messages_table', 21),
(45, '2022_12_02_100419_create_message_media_table', 21),
(46, '2022_12_02_101337_create_chat_participants_table', 22),
(47, '2022_12_05_063810_add_uuid_in_users_table', 23),
(48, '0000_00_00_000000_create_websockets_statistics_entries_table', 24),
(49, '2022_12_16_042914_create_industries_table', 25),
(50, '2022_12_16_043526_add_industry_id_to_categories_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `discount` float(3,2) DEFAULT '0.00',
  `is_popular` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `is_subscription` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `for` enum('individual','agency') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'individual',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `title`, `description`, `duration`, `price`, `discount`, `is_popular`, `is_subscription`, `for`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Basic', 'Test', NULL, 30, 1000.00, 0.00, 'no', 'no', 'individual', 'active', '2022-10-12 07:27:32', '2022-10-12 07:27:32'),
(8, 'Standard', 'Standard', NULL, 60, 1000.00, 0.00, 'no', 'no', 'individual', 'active', '2022-12-08 23:53:48', '2022-12-08 23:53:48'),
(9, 'Extended', 'Extended', NULL, 90, 899.00, 0.00, 'no', 'no', 'individual', 'active', '2022-12-08 23:54:56', '2022-12-08 23:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `package_perks`
--

CREATE TABLE `package_perks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_perks`
--

INSERT INTO `package_perks` (`id`, `package_id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 7, 'commition', '20', '2022-10-12 07:27:32', '2022-10-12 07:27:32'),
(2, 7, 'credits', '10', '2022-10-12 07:27:32', '2022-10-12 07:27:32'),
(3, 7, 'connections', '20', '2022-10-12 07:27:32', '2022-10-12 07:27:32'),
(4, 7, 'job_applications', '100', '2022-10-12 07:27:32', '2022-10-12 07:27:32'),
(5, 7, 'watermark', 'yes', '2022-10-12 07:27:32', '2022-10-12 07:27:32'),
(6, 8, 'commition', '20', '2022-12-08 23:53:48', '2022-12-08 23:53:48'),
(7, 8, 'credits', '12', '2022-12-08 23:53:48', '2022-12-08 23:53:48'),
(8, 8, 'connections', '100', '2022-12-08 23:53:48', '2022-12-08 23:53:48'),
(9, 8, 'job_applications', '300', '2022-12-08 23:53:48', '2022-12-08 23:53:48'),
(10, 9, 'commition', '20', '2022-12-08 23:54:56', '2022-12-08 23:54:56'),
(11, 9, 'credits', '300', '2022-12-08 23:54:56', '2022-12-08 23:54:56'),
(12, 9, 'connections', '500', '2022-12-08 23:54:56', '2022-12-08 23:54:56'),
(13, 9, 'job_applications', '200', '2022-12-08 23:54:56', '2022-12-08 23:54:56');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(9, 'SEO', 'seo', 'active', '2022-12-16 00:10:59', '2022-12-16 00:10:59'),
(10, 'Link Building', 'link-building', 'active', '2022-12-16 00:11:16', '2022-12-16 00:11:16'),
(11, 'Website', 'website', 'active', '2022-12-16 00:13:28', '2022-12-16 00:13:28'),
(12, 'Lead Generation', 'lead-generation', 'active', '2022-12-16 00:14:04', '2022-12-16 00:14:04'),
(13, 'Marketing Strategy', 'marketing-strategy', 'active', '2022-12-16 00:14:13', '2022-12-16 00:14:13'),
(14, 'UI/UX Prototyping', 'uiux-prototyping', 'active', '2022-12-16 00:14:30', '2022-12-16 00:14:30'),
(15, 'Sketch', 'sketch', 'active', '2022-12-16 00:14:39', '2022-12-16 00:14:39'),
(16, 'Adobe Illustrator', 'adobe-illustrator', 'active', '2022-12-16 00:14:52', '2022-12-16 00:14:52'),
(17, 'Print Design', 'print-design', 'active', '2022-12-16 00:15:04', '2022-12-16 00:15:04'),
(18, 'Product Design', 'product-design', 'active', '2022-12-16 00:15:15', '2022-12-16 00:15:15'),
(19, '2D Design', '2d-design', 'active', '2022-12-16 00:15:28', '2022-12-16 00:15:28'),
(20, 'Adobe Photoshop', 'adobe-photoshop', 'active', '2022-12-16 00:15:36', '2022-12-16 00:15:36'),
(21, 'Logo', 'logo', 'active', '2022-12-16 00:15:46', '2022-12-16 00:15:46'),
(22, 'Web Design', 'web-design', 'active', '2022-12-16 00:16:00', '2022-12-16 00:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `image`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(12, 'Logo Design', 'logo-design', NULL, 31, 'active', '2022-12-15 23:55:21', '2022-12-15 23:55:21'),
(13, 'Brand Style Guides', 'brand-style-guides', NULL, 31, 'active', '2022-12-15 23:55:41', '2022-12-15 23:55:41'),
(14, 'Fonts & Typography', 'fonts-typography', NULL, 31, 'active', '2022-12-15 23:56:04', '2022-12-15 23:56:04'),
(15, 'Business Cards & Stationery', 'business-cards-stationery', NULL, 31, 'active', '2022-12-15 23:56:10', '2022-12-15 23:56:10'),
(16, 'Website Design', 'website-design', NULL, 32, 'active', '2022-12-15 23:56:30', '2022-12-15 23:56:30'),
(17, 'App Design', 'app-design', NULL, 32, 'active', '2022-12-15 23:56:35', '2022-12-15 23:56:35'),
(18, 'UX Design', 'ux-design', NULL, 32, 'active', '2022-12-15 23:56:40', '2022-12-15 23:56:40'),
(19, 'Landing Page Design', 'landing-page-design', NULL, 32, 'active', '2022-12-15 23:56:44', '2022-12-15 23:56:44'),
(20, 'Icon Design', 'icon-design', NULL, 32, 'active', '2022-12-15 23:56:49', '2022-12-15 23:56:49'),
(21, 'Illustration', 'illustration', NULL, 33, 'active', '2022-12-15 23:57:05', '2022-12-15 23:57:05'),
(22, 'NFT Art', 'nft-art', NULL, 33, 'active', '2022-12-15 23:57:11', '2022-12-15 23:57:11'),
(23, 'Pattern Design', 'pattern-design', NULL, 33, 'active', '2022-12-15 23:57:16', '2022-12-15 23:57:16'),
(24, 'Portraits & Caricatures', 'portraits-caricatures', NULL, 33, 'active', '2022-12-15 23:57:21', '2022-12-15 23:57:21'),
(25, 'Cartoons & Comics', 'cartoons-comics', NULL, 33, 'active', '2022-12-15 23:57:25', '2022-12-15 23:57:25'),
(26, 'Tattoo Design', 'tattoo-design', NULL, 33, 'active', '2022-12-15 23:57:30', '2022-12-15 23:57:30'),
(27, 'Storyboards', 'storyboards', NULL, 33, 'active', '2022-12-15 23:57:36', '2022-12-15 23:57:36'),
(28, 'Search Engine Optimization (SEO)', 'search-engine-optimization-seo', NULL, 34, 'active', '2022-12-15 23:59:04', '2022-12-15 23:59:04'),
(29, 'Local SEO', 'local-seo', NULL, 34, 'active', '2022-12-15 23:59:10', '2022-12-15 23:59:10'),
(30, 'Social Media Marketing', 'social-media-marketing', NULL, 35, 'active', '2022-12-16 00:00:40', '2022-12-16 00:00:40'),
(31, 'Influencer Marketing', 'influencer-marketing', NULL, 35, 'active', '2022-12-16 00:08:35', '2022-12-16 00:08:35'),
(32, 'Community Management', 'community-management', NULL, 35, 'active', '2022-12-16 00:08:41', '2022-12-16 00:08:41'),
(33, 'Social Media Advertising', 'social-media-advertising', NULL, 36, 'active', '2022-12-16 00:08:58', '2022-12-16 00:08:58'),
(34, 'Search Engine Marketing (SEM)', 'search-engine-marketing-sem', NULL, 36, 'active', '2022-12-16 00:09:03', '2022-12-16 00:09:03'),
(35, 'Display Advertising', 'display-advertising', NULL, 36, 'active', '2022-12-16 00:09:08', '2022-12-16 00:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('service_provider','client') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'service_provider',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','active','blocked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `email`, `images`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`, `status`) VALUES
(1, '0437be66-5395-45fd-bac2-914d4d09496f', 'Shiv', 'shivtiwari627@gmail.com', NULL, NULL, '$2y$10$6OBK74JoKFlZxxydwwE1e.iubWkqqcm5ZXNcLFBzaKtiMiGli2K0O', 'HtnI6R96vrxPrUEljexMPYMNNPKT4f2H7rMYesQBhVBRD9gDNoN6P4bO1KA3', 'client', '2022-09-26 10:57:06', '2022-12-05 06:39:41', 'active'),
(2, '59b1cab8-fbbc-475e-bfb8-acf862f0b785', 'Shivesh', 'shivesh.appdid@gmail.com', 'https://obilia.fra1.digitaloceanspaces.com/public/images/users/batman.jpg', NULL, '$2y$10$ewXPSIQ4nZ5DpqUc4Kq87OobRwAKf8FHhit/rhsdLcjSkXOiQf/vW', 't3oPyVNIuZ1blXrnMQZ4fkG4Wkl9RJmJ10NqKcXqjUkCsb0FRD5raLnn4zUu', 'service_provider', '2022-11-07 04:44:08', '2022-12-05 06:39:41', 'active'),
(3, 'd5fd204e-c368-4702-8760-07ba96bdd13c', 'Rahul', 'rahul.appdid@gmail.com', NULL, NULL, '$2y$10$ewXPSIQ4nZ5DpqUc4Kq87OobRwAKf8FHhit/rhsdLcjSkXOiQf/vW', NULL, 'client', '2022-11-07 05:34:53', '2022-12-05 06:39:41', 'active'),
(4, '9bada014-fb0c-49d3-a7b5-5865f333aac0', 'Ketan Kadam', 'ketan.appdid@gmail.com', NULL, NULL, '$2y$10$ggGI0IzY3vWFhR6BPBwkcOC82GpQsXcMPLpbF8tuxlUVU5XsheNtu', NULL, 'service_provider', '2022-11-07 05:45:45', '2022-12-05 06:39:41', 'active'),
(5, NULL, 'Rahul Y', 'rahul@gmail.com', NULL, NULL, '$2y$10$p5AxqKgomIrkbo5GkXAuiu2kvsEzjcHLtjWYVMc.ASIiW60VgARwO', NULL, 'client', '2022-12-05 10:47:33', '2022-12-05 10:47:33', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websockets_statistics_entries`
--

INSERT INTO `websockets_statistics_entries` (`id`, `app_id`, `peak_connection_count`, `websocket_message_count`, `api_message_count`, `created_at`, `updated_at`) VALUES
(1, 'testID', 2, 3, 0, '2022-12-05 12:43:45', '2022-12-05 12:43:45'),
(2, 'testID', 1, 5, 0, '2022-12-05 12:46:45', '2022-12-05 12:46:45'),
(3, 'testID', 2, 3, 0, '2022-12-05 12:49:45', '2022-12-05 12:49:45'),
(4, 'testID', 2, 11, 0, '2022-12-05 12:52:45', '2022-12-05 12:52:45'),
(5, 'testID', 2, 20, 0, '2022-12-05 13:03:28', '2022-12-05 13:03:28'),
(6, 'testID', 2, 4, 0, '2022-12-05 13:04:28', '2022-12-05 13:04:28'),
(7, 'testID', 1, 2, 0, '2022-12-06 04:23:19', '2022-12-06 04:23:19'),
(8, 'testID', 1, 3, 0, '2022-12-06 04:24:19', '2022-12-06 04:24:19'),
(9, 'testID', 1, 2, 0, '2022-12-06 04:25:19', '2022-12-06 04:25:19'),
(10, 'testID', 1, 2, 0, '2022-12-06 04:26:19', '2022-12-06 04:26:19'),
(11, 'testID', 1, 1, 0, '2022-12-06 04:27:19', '2022-12-06 04:27:19'),
(12, 'testID', 0, 0, 0, '2022-12-06 04:28:20', '2022-12-06 04:28:20'),
(13, 'testID', 0, 0, 0, '2022-12-06 04:29:19', '2022-12-06 04:29:19'),
(14, 'testID', 0, 0, 0, '2022-12-06 04:30:19', '2022-12-06 04:30:19'),
(15, 'testID', 0, 0, 0, '2022-12-06 04:31:19', '2022-12-06 04:31:19'),
(16, 'testID', 1, 2, 0, '2022-12-06 04:32:19', '2022-12-06 04:32:19'),
(17, 'testID', 1, 1, 0, '2022-12-06 04:33:19', '2022-12-06 04:33:19'),
(18, 'testID', 1, 2, 0, '2022-12-06 04:34:19', '2022-12-06 04:34:19'),
(19, 'testID', 1, 2, 0, '2022-12-06 04:35:20', '2022-12-06 04:35:20'),
(20, 'testID', 1, 3, 0, '2022-12-06 04:36:20', '2022-12-06 04:36:20'),
(21, 'testID', 2, 11, 0, '2022-12-06 04:37:19', '2022-12-06 04:37:19'),
(22, 'testID', 2, 4, 0, '2022-12-06 04:38:19', '2022-12-06 04:38:19'),
(23, 'testID', 2, 4, 0, '2022-12-06 04:39:19', '2022-12-06 04:39:19'),
(24, 'testID', 2, 4, 0, '2022-12-06 04:40:19', '2022-12-06 04:40:19'),
(25, 'testID', 2, 4, 0, '2022-12-06 04:41:19', '2022-12-06 04:41:19'),
(26, 'testID', 2, 12, 0, '2022-12-06 04:42:27', '2022-12-06 04:42:27'),
(27, 'testID', 2, 4, 0, '2022-12-06 04:43:27', '2022-12-06 04:43:27'),
(28, 'testID', 2, 10, 0, '2022-12-06 04:45:39', '2022-12-06 04:45:39'),
(29, 'testID', 2, 3, 0, '2022-12-06 04:46:39', '2022-12-06 04:46:39'),
(30, 'testID', 2, 12, 0, '2022-12-06 04:47:39', '2022-12-06 04:47:39'),
(31, 'testID', 2, 4, 0, '2022-12-06 04:48:39', '2022-12-06 04:48:39'),
(32, 'testID', 2, 5, 0, '2022-12-06 04:49:39', '2022-12-06 04:49:39'),
(33, 'testID', 2, 4, 0, '2022-12-06 04:50:39', '2022-12-06 04:50:39'),
(34, 'testID', 2, 2, 0, '2022-12-06 04:51:39', '2022-12-06 04:51:39'),
(35, 'testID', 2, 5, 0, '2022-12-06 04:52:39', '2022-12-06 04:52:39'),
(36, 'testID', 2, 4, 0, '2022-12-06 04:53:39', '2022-12-06 04:53:39'),
(37, 'testID', 2, 5, 0, '2022-12-06 04:54:39', '2022-12-06 04:54:39'),
(38, 'testID', 2, 3, 0, '2022-12-06 04:55:39', '2022-12-06 04:55:39'),
(39, 'testID', 2, 1, 0, '2022-12-06 04:56:39', '2022-12-06 04:56:39'),
(40, 'testID', 2, 5, 0, '2022-12-06 04:57:39', '2022-12-06 04:57:39'),
(41, 'testID', 2, 4, 0, '2022-12-06 04:58:39', '2022-12-06 04:58:39'),
(42, 'testID', 2, 3, 0, '2022-12-06 04:59:39', '2022-12-06 04:59:39'),
(43, 'testID', 2, 4, 0, '2022-12-06 05:00:39', '2022-12-06 05:00:39'),
(44, 'testID', 2, 4, 0, '2022-12-06 05:01:39', '2022-12-06 05:01:39'),
(45, 'testID', 2, 2, 0, '2022-12-06 05:02:39', '2022-12-06 05:02:39'),
(46, 'testID', 1, 4, 0, '2022-12-06 05:03:39', '2022-12-06 05:03:39'),
(47, 'testID', 1, 4, 0, '2022-12-06 05:04:39', '2022-12-06 05:04:39'),
(48, 'testID', 1, 4, 0, '2022-12-06 05:05:39', '2022-12-06 05:05:39'),
(49, 'testID', 1, 4, 0, '2022-12-06 05:06:39', '2022-12-06 05:06:39'),
(50, 'testID', 1, 2, 0, '2022-12-06 05:07:39', '2022-12-06 05:07:39'),
(51, 'testID', 1, 2, 0, '2022-12-06 05:08:39', '2022-12-06 05:08:39'),
(52, 'testID', 1, 4, 0, '2022-12-06 05:09:39', '2022-12-06 05:09:39'),
(53, 'testID', 1, 4, 0, '2022-12-06 05:10:39', '2022-12-06 05:10:39'),
(54, 'testID', 1, 4, 0, '2022-12-06 05:11:39', '2022-12-06 05:11:39'),
(55, 'testID', 2, 4, 0, '2022-12-06 05:12:39', '2022-12-06 05:12:39'),
(56, 'testID', 1, 3, 0, '2022-12-06 05:13:39', '2022-12-06 05:13:39'),
(57, 'testID', 1, 4, 0, '2022-12-06 05:14:39', '2022-12-06 05:14:39'),
(58, 'testID', 1, 6, 0, '2022-12-06 05:15:39', '2022-12-06 05:15:39'),
(59, 'testID', 1, 6, 0, '2022-12-06 05:16:39', '2022-12-06 05:16:39'),
(60, 'testID', 1, 3, 0, '2022-12-06 05:17:39', '2022-12-06 05:17:39'),
(61, 'testID', 1, 6, 0, '2022-12-06 05:18:39', '2022-12-06 05:18:39'),
(62, 'testID', 1, 6, 0, '2022-12-06 05:19:39', '2022-12-06 05:19:39'),
(63, 'testID', 3, 11, 0, '2022-12-06 05:21:56', '2022-12-06 05:21:56'),
(64, 'testID', 1, 6, 0, '2022-12-06 05:22:56', '2022-12-06 05:22:56'),
(65, 'testID', 1, 6, 0, '2022-12-06 05:23:56', '2022-12-06 05:23:56'),
(66, 'testID', 1, 6, 0, '2022-12-06 05:24:56', '2022-12-06 05:24:56'),
(67, 'testID', 1, 6, 0, '2022-12-06 05:25:56', '2022-12-06 05:25:56'),
(68, 'testID', 1, 6, 0, '2022-12-06 05:26:56', '2022-12-06 05:26:56'),
(69, 'testID', 1, 6, 0, '2022-12-06 05:27:56', '2022-12-06 05:27:56'),
(70, 'testID', 1, 4, 0, '2022-12-06 05:28:56', '2022-12-06 05:28:56'),
(71, 'testID', 1, 6, 0, '2022-12-06 05:29:56', '2022-12-06 05:29:56'),
(72, 'testID', 1, 6, 0, '2022-12-06 05:30:56', '2022-12-06 05:30:56'),
(73, 'testID', 1, 6, 0, '2022-12-06 05:31:56', '2022-12-06 05:31:56'),
(74, 'testID', 1, 6, 0, '2022-12-06 05:32:56', '2022-12-06 05:32:56'),
(75, 'testID', 1, 3, 0, '2022-12-06 05:33:56', '2022-12-06 05:33:56'),
(76, 'testID', 1, 6, 0, '2022-12-06 05:34:56', '2022-12-06 05:34:56'),
(77, 'testID', 1, 4, 0, '2022-12-06 05:35:56', '2022-12-06 05:35:56'),
(78, 'testID', 1, 4, 0, '2022-12-06 05:36:56', '2022-12-06 05:36:56'),
(79, 'testID', 1, 6, 0, '2022-12-06 05:37:56', '2022-12-06 05:37:56'),
(80, 'testID', 3, 3, 0, '2022-12-06 05:38:56', '2022-12-06 05:38:56'),
(81, 'testID', 1, 1, 0, '2022-12-06 05:39:56', '2022-12-06 05:39:56'),
(82, 'testID', 2, 4, 0, '2022-12-06 05:40:56', '2022-12-06 05:40:56'),
(83, 'testID', 2, 6, 0, '2022-12-06 05:41:56', '2022-12-06 05:41:56'),
(84, 'testID', 2, 6, 0, '2022-12-06 05:42:56', '2022-12-06 05:42:56'),
(85, 'testID', 2, 6, 0, '2022-12-06 05:43:56', '2022-12-06 05:43:56'),
(86, 'testID', 2, 4, 0, '2022-12-06 05:44:56', '2022-12-06 05:44:56'),
(87, 'testID', 2, 7, 0, '2022-12-06 05:45:56', '2022-12-06 05:45:56'),
(88, 'testID', 3, 6, 0, '2022-12-06 05:46:56', '2022-12-06 05:46:56'),
(89, 'testID', 3, 6, 0, '2022-12-06 05:47:56', '2022-12-06 05:47:56'),
(90, 'testID', 3, 6, 0, '2022-12-06 05:48:57', '2022-12-06 05:48:57'),
(91, 'testID', 3, 5, 0, '2022-12-06 05:49:56', '2022-12-06 05:49:56'),
(92, 'testID', 3, 5, 0, '2022-12-06 05:50:56', '2022-12-06 05:50:56'),
(93, 'testID', 3, 6, 0, '2022-12-06 05:51:56', '2022-12-06 05:51:56'),
(94, 'testID', 3, 6, 0, '2022-12-06 05:52:56', '2022-12-06 05:52:56'),
(95, 'testID', 1, 3, 0, '2022-12-08 05:47:13', '2022-12-08 05:47:13'),
(96, 'testID', 1, 2, 1, '2022-12-08 05:48:12', '2022-12-08 05:48:12'),
(97, 'testID', 1, 2, 1, '2022-12-08 05:49:12', '2022-12-08 05:49:12'),
(98, 'testID', 1, 2, 1, '2022-12-08 05:50:12', '2022-12-08 05:50:12'),
(99, 'testID', 1, 2, 1, '2022-12-08 05:51:12', '2022-12-08 05:51:12'),
(100, 'testID', 1, 3, 1, '2022-12-08 05:52:13', '2022-12-08 05:52:13'),
(101, 'testID', 1, 2, 1, '2022-12-08 05:53:12', '2022-12-08 05:53:12'),
(102, 'testID', 0, 2, 1, '2022-12-08 05:54:12', '2022-12-08 05:54:12'),
(103, 'testID', 1, 2, 1, '2022-12-08 05:55:12', '2022-12-08 05:55:12'),
(104, 'testID', 1, 2, 1, '2022-12-08 05:56:12', '2022-12-08 05:56:12'),
(105, 'testID', 1, 2, 1, '2022-12-08 05:57:12', '2022-12-08 05:57:12'),
(106, 'testID', 1, 2, 1, '2022-12-08 05:58:12', '2022-12-08 05:58:12'),
(107, 'testID', 1, 2, 1, '2022-12-08 05:59:12', '2022-12-08 05:59:12'),
(108, 'testID', 1, 2, 1, '2022-12-08 06:00:12', '2022-12-08 06:00:12'),
(109, 'testID', 1, 1, 1, '2022-12-08 06:01:12', '2022-12-08 06:01:12'),
(110, 'testID', 1, 2, 1, '2022-12-08 06:02:13', '2022-12-08 06:02:13'),
(111, 'testID', 1, 3, 1, '2022-12-08 06:03:12', '2022-12-08 06:03:12'),
(112, 'testID', 2, 3, 1, '2022-12-08 06:04:12', '2022-12-08 06:04:12'),
(113, 'testID', 2, 4, 1, '2022-12-08 06:05:12', '2022-12-08 06:05:12'),
(114, 'testID', 2, 4, 1, '2022-12-08 06:06:13', '2022-12-08 06:06:13'),
(115, 'testID', 2, 4, 1, '2022-12-08 06:07:12', '2022-12-08 06:07:12'),
(116, 'testID', 2, 4, 1, '2022-12-08 06:08:12', '2022-12-08 06:08:12'),
(117, 'testID', 2, 4, 1, '2022-12-08 06:09:12', '2022-12-08 06:09:12'),
(118, 'testID', 2, 4, 1, '2022-12-08 06:10:12', '2022-12-08 06:10:12'),
(119, 'testID', 2, 4, 1, '2022-12-08 06:11:12', '2022-12-08 06:11:12'),
(120, 'testID', 2, 3, 1, '2022-12-08 06:12:12', '2022-12-08 06:12:12'),
(121, 'testID', 2, 4, 1, '2022-12-08 06:13:12', '2022-12-08 06:13:12'),
(122, 'testID', 2, 4, 1, '2022-12-08 06:14:12', '2022-12-08 06:14:12'),
(123, 'testID', 2, 4, 1, '2022-12-08 06:15:12', '2022-12-08 06:15:12'),
(124, 'testID', 2, 3, 1, '2022-12-08 06:16:13', '2022-12-08 06:16:13'),
(125, 'testID', 2, 4, 1, '2022-12-08 06:17:12', '2022-12-08 06:17:12'),
(126, 'testID', 2, 4, 1, '2022-12-08 06:18:12', '2022-12-08 06:18:12'),
(127, 'testID', 2, 4, 1, '2022-12-08 06:19:13', '2022-12-08 06:19:13'),
(128, 'testID', 2, 4, 1, '2022-12-08 06:20:13', '2022-12-08 06:20:13'),
(129, 'testID', 2, 4, 1, '2022-12-08 06:21:13', '2022-12-08 06:21:13'),
(130, 'testID', 2, 4, 1, '2022-12-08 06:22:13', '2022-12-08 06:22:13'),
(131, 'testID', 2, 4, 1, '2022-12-08 06:23:13', '2022-12-08 06:23:13'),
(132, 'testID', 2, 4, 1, '2022-12-08 06:24:13', '2022-12-08 06:24:13'),
(133, 'testID', 2, 4, 1, '2022-12-08 06:25:13', '2022-12-08 06:25:13'),
(134, 'testID', 2, 4, 1, '2022-12-08 06:26:13', '2022-12-08 06:26:13'),
(135, 'testID', 2, 4, 1, '2022-12-08 06:27:13', '2022-12-08 06:27:13'),
(136, 'testID', 2, 4, 1, '2022-12-08 06:28:13', '2022-12-08 06:28:13'),
(137, 'testID', 2, 4, 1, '2022-12-08 06:29:13', '2022-12-08 06:29:13'),
(138, 'testID', 2, 2, 1, '2022-12-08 06:30:13', '2022-12-08 06:30:13'),
(139, 'testID', 2, 6, 1, '2022-12-08 06:31:13', '2022-12-08 06:31:13'),
(140, 'testID', 2, 4, 1, '2022-12-08 06:32:13', '2022-12-08 06:32:13'),
(141, 'testID', 2, 4, 1, '2022-12-08 06:33:13', '2022-12-08 06:33:13'),
(142, 'testID', 2, 5, 1, '2022-12-08 06:34:13', '2022-12-08 06:34:13'),
(143, 'testID', 2, 5, 1, '2022-12-08 06:35:13', '2022-12-08 06:35:13'),
(144, 'testID', 2, 4, 1, '2022-12-08 06:36:16', '2022-12-08 06:36:16'),
(145, 'testID', 1, 4, 1, '2022-12-08 06:37:13', '2022-12-08 06:37:13'),
(146, 'testID', 2, 4, 1, '2022-12-08 06:38:13', '2022-12-08 06:38:13'),
(147, 'testID', 2, 4, 3, '2022-12-08 06:39:13', '2022-12-08 06:39:13'),
(148, 'testID', 2, 4, 1, '2022-12-08 06:40:13', '2022-12-08 06:40:13'),
(149, 'testID', 2, 4, 1, '2022-12-08 06:41:13', '2022-12-08 06:41:13'),
(150, 'testID', 2, 4, 1, '2022-12-08 06:42:13', '2022-12-08 06:42:13'),
(151, 'testID', 2, 3, 2, '2022-12-08 06:43:13', '2022-12-08 06:43:13'),
(152, 'testID', 2, 4, 1, '2022-12-08 06:44:13', '2022-12-08 06:44:13'),
(153, 'testID', 2, 4, 1, '2022-12-08 06:45:13', '2022-12-08 06:45:13'),
(154, 'testID', 2, 4, 1, '2022-12-08 06:46:13', '2022-12-08 06:46:13'),
(155, 'testID', 2, 4, 1, '2022-12-08 06:47:13', '2022-12-08 06:47:13'),
(156, 'testID', 2, 4, 1, '2022-12-08 06:48:13', '2022-12-08 06:48:13'),
(157, 'testID', 2, 4, 1, '2022-12-08 06:49:13', '2022-12-08 06:49:13'),
(158, 'testID', 2, 3, 1, '2022-12-08 06:50:13', '2022-12-08 06:50:13'),
(159, 'testID', 2, 4, 1, '2022-12-08 06:51:13', '2022-12-08 06:51:13'),
(160, 'testID', 2, 4, 1, '2022-12-08 06:52:13', '2022-12-08 06:52:13'),
(161, 'testID', 2, 3, 1, '2022-12-08 06:53:13', '2022-12-08 06:53:13'),
(162, 'testID', 2, 4, 1, '2022-12-08 06:54:13', '2022-12-08 06:54:13'),
(163, 'testID', 2, 4, 2, '2022-12-08 06:55:13', '2022-12-08 06:55:13'),
(164, 'testID', 2, 3, 2, '2022-12-08 06:56:13', '2022-12-08 06:56:13'),
(165, 'testID', 2, 4, 1, '2022-12-08 06:57:13', '2022-12-08 06:57:13'),
(166, 'testID', 2, 6, 1, '2022-12-08 06:58:13', '2022-12-08 06:58:13'),
(167, 'testID', 2, 4, 1, '2022-12-08 06:59:13', '2022-12-08 06:59:13'),
(168, 'testID', 2, 4, 1, '2022-12-08 07:00:13', '2022-12-08 07:00:13'),
(169, 'testID', 2, 3, 3, '2022-12-08 07:01:13', '2022-12-08 07:01:13'),
(170, 'testID', 2, 4, 1, '2022-12-08 07:02:13', '2022-12-08 07:02:13'),
(171, 'testID', 2, 4, 1, '2022-12-08 07:03:13', '2022-12-08 07:03:13'),
(172, 'testID', 2, 4, 3, '2022-12-08 07:04:13', '2022-12-08 07:04:13'),
(173, 'testID', 2, 4, 2, '2022-12-08 07:05:13', '2022-12-08 07:05:13'),
(174, 'testID', 2, 5, 2, '2022-12-08 07:06:13', '2022-12-08 07:06:13'),
(175, 'testID', 2, 4, 1, '2022-12-08 07:07:13', '2022-12-08 07:07:13'),
(176, 'testID', 2, 4, 1, '2022-12-08 07:08:15', '2022-12-08 07:08:15'),
(177, 'testID', 0, 4, 1, '2022-12-08 07:09:13', '2022-12-08 07:09:13'),
(178, 'testID', 2, 4, 1, '2022-12-08 07:10:13', '2022-12-08 07:10:13'),
(179, 'testID', 2, 4, 1, '2022-12-08 07:11:13', '2022-12-08 07:11:13'),
(180, 'testID', 2, 4, 1, '2022-12-08 07:12:13', '2022-12-08 07:12:13'),
(181, 'testID', 2, 4, 1, '2022-12-08 07:13:13', '2022-12-08 07:13:13'),
(182, 'testID', 2, 4, 1, '2022-12-08 07:14:13', '2022-12-08 07:14:13'),
(183, 'testID', 2, 4, 1, '2022-12-08 07:15:13', '2022-12-08 07:15:13'),
(184, 'testID', 2, 4, 1, '2022-12-08 07:16:13', '2022-12-08 07:16:13'),
(185, 'testID', 2, 5, 2, '2022-12-08 07:17:13', '2022-12-08 07:17:13'),
(186, 'testID', 2, 3, 2, '2022-12-08 07:18:13', '2022-12-08 07:18:13'),
(187, 'testID', 2, 4, 2, '2022-12-08 07:19:13', '2022-12-08 07:19:13'),
(188, 'testID', 2, 4, 1, '2022-12-08 07:20:13', '2022-12-08 07:20:13'),
(189, 'testID', 2, 5, 1, '2022-12-08 07:21:13', '2022-12-08 07:21:13'),
(190, 'testID', 2, 4, 1, '2022-12-08 07:22:13', '2022-12-08 07:22:13'),
(191, 'testID', 2, 4, 1, '2022-12-08 07:23:13', '2022-12-08 07:23:13'),
(192, 'testID', 2, 3, 2, '2022-12-08 07:24:13', '2022-12-08 07:24:13'),
(193, 'testID', 2, 5, 4, '2022-12-08 07:25:13', '2022-12-08 07:25:13'),
(194, 'testID', 2, 3, 1, '2022-12-08 07:26:13', '2022-12-08 07:26:13'),
(195, 'testID', 2, 4, 1, '2022-12-08 07:27:13', '2022-12-08 07:27:13'),
(196, 'testID', 2, 5, 4, '2022-12-08 07:28:13', '2022-12-08 07:28:13'),
(197, 'testID', 2, 4, 1, '2022-12-08 07:29:13', '2022-12-08 07:29:13'),
(198, 'testID', 2, 4, 1, '2022-12-08 07:30:13', '2022-12-08 07:30:13'),
(199, 'testID', 2, 4, 1, '2022-12-08 07:31:13', '2022-12-08 07:31:13'),
(200, 'testID', 2, 3, 1, '2022-12-08 07:32:13', '2022-12-08 07:32:13'),
(201, 'testID', 2, 4, 1, '2022-12-08 07:33:13', '2022-12-08 07:33:13'),
(202, 'testID', 2, 4, 1, '2022-12-08 07:34:13', '2022-12-08 07:34:13'),
(203, 'testID', 2, 4, 1, '2022-12-08 07:35:13', '2022-12-08 07:35:13'),
(204, 'testID', 2, 4, 1, '2022-12-08 07:36:13', '2022-12-08 07:36:13'),
(205, 'testID', 2, 3, 1, '2022-12-08 07:37:13', '2022-12-08 07:37:13'),
(206, 'testID', 2, 4, 1, '2022-12-08 07:38:13', '2022-12-08 07:38:13'),
(207, 'testID', 2, 4, 1, '2022-12-08 07:39:13', '2022-12-08 07:39:13'),
(208, 'testID', 2, 4, 1, '2022-12-08 07:40:13', '2022-12-08 07:40:13'),
(209, 'testID', 2, 4, 1, '2022-12-08 07:41:13', '2022-12-08 07:41:13'),
(210, 'testID', 2, 4, 1, '2022-12-08 07:42:13', '2022-12-08 07:42:13'),
(211, 'testID', 2, 4, 1, '2022-12-08 07:43:13', '2022-12-08 07:43:13'),
(212, 'testID', 2, 3, 1, '2022-12-08 07:44:13', '2022-12-08 07:44:13'),
(213, 'testID', 2, 4, 1, '2022-12-08 07:45:13', '2022-12-08 07:45:13'),
(214, 'testID', 2, 4, 1, '2022-12-08 07:46:13', '2022-12-08 07:46:13'),
(215, 'testID', 2, 3, 1, '2022-12-08 07:47:13', '2022-12-08 07:47:13'),
(216, 'testID', 2, 4, 1, '2022-12-08 07:48:13', '2022-12-08 07:48:13'),
(217, 'testID', 2, 4, 1, '2022-12-08 07:49:13', '2022-12-08 07:49:13'),
(218, 'testID', 2, 4, 1, '2022-12-08 07:50:13', '2022-12-08 07:50:13'),
(219, 'testID', 2, 4, 1, '2022-12-08 07:51:13', '2022-12-08 07:51:13'),
(220, 'testID', 2, 4, 1, '2022-12-08 07:52:13', '2022-12-08 07:52:13'),
(221, 'testID', 2, 4, 1, '2022-12-08 07:53:13', '2022-12-08 07:53:13'),
(222, 'testID', 2, 4, 1, '2022-12-08 07:54:13', '2022-12-08 07:54:13'),
(223, 'testID', 2, 4, 1, '2022-12-08 07:55:13', '2022-12-08 07:55:13'),
(224, 'testID', 2, 6, 1, '2022-12-08 07:56:13', '2022-12-08 07:56:13'),
(225, 'testID', 2, 4, 1, '2022-12-08 07:57:14', '2022-12-08 07:57:14'),
(226, 'testID', 2, 4, 1, '2022-12-08 07:58:13', '2022-12-08 07:58:13'),
(227, 'testID', 2, 4, 1, '2022-12-08 07:59:13', '2022-12-08 07:59:13'),
(228, 'testID', 2, 4, 1, '2022-12-08 08:00:13', '2022-12-08 08:00:13'),
(229, 'testID', 2, 4, 1, '2022-12-08 08:01:13', '2022-12-08 08:01:13'),
(230, 'testID', 2, 2, 1, '2022-12-08 08:02:13', '2022-12-08 08:02:13'),
(231, 'testID', 2, 4, 1, '2022-12-08 08:03:13', '2022-12-08 08:03:13'),
(232, 'testID', 2, 4, 1, '2022-12-08 08:04:13', '2022-12-08 08:04:13'),
(233, 'testID', 2, 4, 1, '2022-12-08 08:05:13', '2022-12-08 08:05:13'),
(234, 'testID', 2, 4, 1, '2022-12-08 08:06:13', '2022-12-08 08:06:13'),
(235, 'testID', 2, 4, 1, '2022-12-08 08:07:13', '2022-12-08 08:07:13'),
(236, 'testID', 2, 4, 1, '2022-12-08 08:08:13', '2022-12-08 08:08:13'),
(237, 'testID', 2, 4, 1, '2022-12-08 08:09:13', '2022-12-08 08:09:13'),
(238, 'testID', 2, 4, 1, '2022-12-08 08:10:13', '2022-12-08 08:10:13'),
(239, 'testID', 2, 4, 1, '2022-12-08 08:11:13', '2022-12-08 08:11:13'),
(240, 'testID', 2, 4, 1, '2022-12-08 08:12:13', '2022-12-08 08:12:13'),
(241, 'testID', 2, 4, 1, '2022-12-08 08:13:13', '2022-12-08 08:13:13'),
(242, 'testID', 2, 3, 1, '2022-12-08 08:14:13', '2022-12-08 08:14:13'),
(243, 'testID', 2, 4, 1, '2022-12-08 08:15:13', '2022-12-08 08:15:13'),
(244, 'testID', 2, 3, 1, '2022-12-08 08:16:13', '2022-12-08 08:16:13'),
(245, 'testID', 2, 4, 1, '2022-12-08 08:17:13', '2022-12-08 08:17:13'),
(246, 'testID', 2, 4, 1, '2022-12-08 08:18:13', '2022-12-08 08:18:13'),
(247, 'testID', 2, 4, 1, '2022-12-08 08:19:14', '2022-12-08 08:19:14'),
(248, 'testID', 2, 4, 1, '2022-12-08 08:20:13', '2022-12-08 08:20:13'),
(249, 'testID', 2, 4, 1, '2022-12-08 08:21:14', '2022-12-08 08:21:14'),
(250, 'testID', 2, 4, 1, '2022-12-08 08:22:14', '2022-12-08 08:22:14'),
(251, 'testID', 2, 4, 1, '2022-12-08 08:23:13', '2022-12-08 08:23:13'),
(252, 'testID', 2, 4, 1, '2022-12-08 08:24:14', '2022-12-08 08:24:14'),
(253, 'testID', 2, 4, 1, '2022-12-08 08:25:14', '2022-12-08 08:25:14'),
(254, 'testID', 2, 4, 1, '2022-12-08 08:26:14', '2022-12-08 08:26:14'),
(255, 'testID', 2, 3, 1, '2022-12-08 08:27:14', '2022-12-08 08:27:14'),
(256, 'testID', 2, 4, 1, '2022-12-08 08:28:14', '2022-12-08 08:28:14'),
(257, 'testID', 2, 4, 1, '2022-12-08 08:29:14', '2022-12-08 08:29:14'),
(258, 'testID', 2, 3, 1, '2022-12-08 08:30:14', '2022-12-08 08:30:14'),
(259, 'testID', 2, 4, 1, '2022-12-08 08:31:14', '2022-12-08 08:31:14'),
(260, 'testID', 2, 4, 1, '2022-12-08 08:32:14', '2022-12-08 08:32:14'),
(261, 'testID', 2, 4, 1, '2022-12-08 08:33:14', '2022-12-08 08:33:14'),
(262, 'testID', 2, 4, 1, '2022-12-08 08:34:14', '2022-12-08 08:34:14'),
(263, 'testID', 2, 4, 1, '2022-12-08 08:35:14', '2022-12-08 08:35:14'),
(264, 'testID', 2, 4, 1, '2022-12-08 08:36:14', '2022-12-08 08:36:14'),
(265, 'testID', 2, 4, 1, '2022-12-08 08:37:14', '2022-12-08 08:37:14'),
(266, 'testID', 2, 4, 1, '2022-12-08 08:38:14', '2022-12-08 08:38:14'),
(267, 'testID', 2, 4, 1, '2022-12-08 08:39:14', '2022-12-08 08:39:14'),
(268, 'testID', 2, 3, 1, '2022-12-08 08:40:14', '2022-12-08 08:40:14'),
(269, 'testID', 2, 4, 1, '2022-12-08 08:41:14', '2022-12-08 08:41:14'),
(270, 'testID', 2, 4, 1, '2022-12-08 08:42:14', '2022-12-08 08:42:14'),
(271, 'testID', 2, 4, 1, '2022-12-08 08:43:14', '2022-12-08 08:43:14'),
(272, 'testID', 2, 3, 1, '2022-12-08 08:44:14', '2022-12-08 08:44:14'),
(273, 'testID', 2, 4, 1, '2022-12-08 08:45:14', '2022-12-08 08:45:14'),
(274, 'testID', 2, 4, 1, '2022-12-08 08:46:14', '2022-12-08 08:46:14'),
(275, 'testID', 2, 4, 1, '2022-12-08 08:47:14', '2022-12-08 08:47:14'),
(276, 'testID', 2, 4, 1, '2022-12-08 08:48:14', '2022-12-08 08:48:14'),
(277, 'testID', 2, 4, 1, '2022-12-08 08:49:14', '2022-12-08 08:49:14'),
(278, 'testID', 2, 3, 1, '2022-12-08 08:50:14', '2022-12-08 08:50:14'),
(279, 'testID', 2, 4, 1, '2022-12-08 08:51:14', '2022-12-08 08:51:14'),
(280, 'testID', 2, 4, 1, '2022-12-08 08:52:14', '2022-12-08 08:52:14'),
(281, 'testID', 2, 4, 1, '2022-12-08 08:53:14', '2022-12-08 08:53:14'),
(282, 'testID', 2, 4, 1, '2022-12-08 08:54:14', '2022-12-08 08:54:14'),
(283, 'testID', 2, 4, 1, '2022-12-08 08:55:14', '2022-12-08 08:55:14'),
(284, 'testID', 2, 4, 1, '2022-12-08 08:56:14', '2022-12-08 08:56:14'),
(285, 'testID', 2, 3, 1, '2022-12-08 08:57:14', '2022-12-08 08:57:14'),
(286, 'testID', 2, 4, 1, '2022-12-08 08:58:14', '2022-12-08 08:58:14'),
(287, 'testID', 2, 3, 1, '2022-12-08 08:59:14', '2022-12-08 08:59:14'),
(288, 'testID', 2, 4, 1, '2022-12-08 09:00:14', '2022-12-08 09:00:14'),
(289, 'testID', 2, 4, 1, '2022-12-08 09:01:14', '2022-12-08 09:01:14'),
(290, 'testID', 2, 4, 1, '2022-12-08 09:02:14', '2022-12-08 09:02:14'),
(291, 'testID', 2, 4, 1, '2022-12-08 09:03:14', '2022-12-08 09:03:14'),
(292, 'testID', 2, 4, 1, '2022-12-08 09:04:14', '2022-12-08 09:04:14'),
(293, 'testID', 2, 4, 1, '2022-12-08 09:05:14', '2022-12-08 09:05:14'),
(294, 'testID', 2, 4, 1, '2022-12-08 09:06:14', '2022-12-08 09:06:14'),
(295, 'testID', 2, 4, 1, '2022-12-08 09:07:14', '2022-12-08 09:07:14'),
(296, 'testID', 2, 4, 1, '2022-12-08 09:08:14', '2022-12-08 09:08:14'),
(297, 'testID', 2, 2, 1, '2022-12-08 09:09:14', '2022-12-08 09:09:14'),
(298, 'testID', 2, 4, 1, '2022-12-08 09:10:14', '2022-12-08 09:10:14'),
(299, 'testID', 2, 4, 1, '2022-12-08 09:11:14', '2022-12-08 09:11:14'),
(300, 'testID', 2, 4, 1, '2022-12-08 09:12:14', '2022-12-08 09:12:14'),
(301, 'testID', 2, 4, 1, '2022-12-08 09:13:14', '2022-12-08 09:13:14'),
(302, 'testID', 2, 4, 1, '2022-12-08 09:14:14', '2022-12-08 09:14:14'),
(303, 'testID', 2, 4, 1, '2022-12-08 09:15:14', '2022-12-08 09:15:14'),
(304, 'testID', 2, 6, 1, '2022-12-08 09:16:14', '2022-12-08 09:16:14'),
(305, 'testID', 2, 4, 1, '2022-12-08 09:17:14', '2022-12-08 09:17:14'),
(306, 'testID', 2, 2, 1, '2022-12-08 09:18:14', '2022-12-08 09:18:14'),
(307, 'testID', 2, 5, 3, '2022-12-08 09:19:14', '2022-12-08 09:19:14'),
(308, 'testID', 2, 7, 1, '2022-12-08 09:20:14', '2022-12-08 09:20:14'),
(309, 'testID', 2, 3, 2, '2022-12-08 09:21:14', '2022-12-08 09:21:14'),
(310, 'testID', 2, 4, 1, '2022-12-08 09:22:14', '2022-12-08 09:22:14'),
(311, 'testID', 2, 4, 1, '2022-12-08 09:23:14', '2022-12-08 09:23:14'),
(312, 'testID', 2, 5, 2, '2022-12-08 09:24:14', '2022-12-08 09:24:14'),
(313, 'testID', 2, 3, 1, '2022-12-08 09:25:15', '2022-12-08 09:25:15'),
(314, 'testID', 2, 4, 3, '2022-12-08 09:26:14', '2022-12-08 09:26:14'),
(315, 'testID', 2, 4, 1, '2022-12-08 09:27:14', '2022-12-08 09:27:14'),
(316, 'testID', 2, 4, 1, '2022-12-08 09:28:14', '2022-12-08 09:28:14'),
(317, 'testID', 2, 4, 1, '2022-12-08 09:29:14', '2022-12-08 09:29:14'),
(318, 'testID', 2, 4, 1, '2022-12-08 09:30:14', '2022-12-08 09:30:14'),
(319, 'testID', 2, 4, 1, '2022-12-08 09:31:14', '2022-12-08 09:31:14'),
(320, 'testID', 2, 4, 1, '2022-12-08 09:32:14', '2022-12-08 09:32:14'),
(321, 'testID', 2, 4, 1, '2022-12-08 09:33:14', '2022-12-08 09:33:14'),
(322, 'testID', 2, 3, 1, '2022-12-08 09:34:14', '2022-12-08 09:34:14'),
(323, 'testID', 2, 4, 1, '2022-12-08 09:35:14', '2022-12-08 09:35:14'),
(324, 'testID', 2, 4, 1, '2022-12-08 09:36:14', '2022-12-08 09:36:14'),
(325, 'testID', 2, 4, 1, '2022-12-08 09:37:14', '2022-12-08 09:37:14'),
(326, 'testID', 2, 4, 1, '2022-12-08 09:38:14', '2022-12-08 09:38:14'),
(327, 'testID', 2, 4, 1, '2022-12-08 09:39:14', '2022-12-08 09:39:14'),
(328, 'testID', 2, 4, 1, '2022-12-08 09:40:14', '2022-12-08 09:40:14'),
(329, 'testID', 2, 4, 1, '2022-12-08 09:41:14', '2022-12-08 09:41:14'),
(330, 'testID', 2, 4, 1, '2022-12-08 09:42:14', '2022-12-08 09:42:14'),
(331, 'testID', 2, 4, 1, '2022-12-08 09:43:14', '2022-12-08 09:43:14'),
(332, 'testID', 2, 4, 1, '2022-12-08 09:44:14', '2022-12-08 09:44:14'),
(333, 'testID', 2, 4, 1, '2022-12-08 09:45:14', '2022-12-08 09:45:14'),
(334, 'testID', 2, 3, 1, '2022-12-08 09:46:14', '2022-12-08 09:46:14'),
(335, 'testID', 2, 3, 1, '2022-12-08 09:47:14', '2022-12-08 09:47:14'),
(336, 'testID', 2, 4, 1, '2022-12-08 09:48:14', '2022-12-08 09:48:14'),
(337, 'testID', 2, 4, 1, '2022-12-08 09:49:14', '2022-12-08 09:49:14'),
(338, 'testID', 2, 4, 1, '2022-12-08 09:50:14', '2022-12-08 09:50:14'),
(339, 'testID', 2, 4, 1, '2022-12-08 09:51:14', '2022-12-08 09:51:14'),
(340, 'testID', 2, 4, 1, '2022-12-08 09:52:14', '2022-12-08 09:52:14'),
(341, 'testID', 2, 4, 1, '2022-12-08 09:53:14', '2022-12-08 09:53:14'),
(342, 'testID', 2, 4, 1, '2022-12-08 09:54:15', '2022-12-08 09:54:15'),
(343, 'testID', 2, 4, 1, '2022-12-08 09:55:14', '2022-12-08 09:55:14'),
(344, 'testID', 2, 3, 1, '2022-12-08 09:56:14', '2022-12-08 09:56:14'),
(345, 'testID', 2, 4, 1, '2022-12-08 09:57:14', '2022-12-08 09:57:14'),
(346, 'testID', 2, 4, 1, '2022-12-08 09:58:14', '2022-12-08 09:58:14'),
(347, 'testID', 2, 4, 1, '2022-12-08 09:59:14', '2022-12-08 09:59:14'),
(348, 'testID', 2, 3, 1, '2022-12-08 10:00:14', '2022-12-08 10:00:14'),
(349, 'testID', 2, 6, 1, '2022-12-08 10:01:14', '2022-12-08 10:01:14'),
(350, 'testID', 2, 4, 3, '2022-12-08 10:02:14', '2022-12-08 10:02:14'),
(351, 'testID', 2, 4, 1, '2022-12-08 10:03:14', '2022-12-08 10:03:14'),
(352, 'testID', 2, 4, 1, '2022-12-08 10:04:14', '2022-12-08 10:04:14'),
(353, 'testID', 2, 4, 1, '2022-12-08 10:05:14', '2022-12-08 10:05:14'),
(354, 'testID', 2, 4, 1, '2022-12-08 10:06:14', '2022-12-08 10:06:14'),
(355, 'testID', 2, 4, 3, '2022-12-08 10:07:14', '2022-12-08 10:07:14'),
(356, 'testID', 2, 4, 3, '2022-12-08 10:08:14', '2022-12-08 10:08:14'),
(357, 'testID', 2, 4, 1, '2022-12-08 10:09:14', '2022-12-08 10:09:14'),
(358, 'testID', 2, 4, 1, '2022-12-08 10:10:14', '2022-12-08 10:10:14'),
(359, 'testID', 2, 4, 1, '2022-12-08 10:11:14', '2022-12-08 10:11:14'),
(360, 'testID', 2, 3, 1, '2022-12-08 10:12:15', '2022-12-08 10:12:15'),
(361, 'testID', 2, 4, 1, '2022-12-08 10:13:14', '2022-12-08 10:13:14'),
(362, 'testID', 2, 4, 1, '2022-12-08 10:14:14', '2022-12-08 10:14:14'),
(363, 'testID', 2, 4, 1, '2022-12-08 10:15:14', '2022-12-08 10:15:14'),
(364, 'testID', 2, 4, 1, '2022-12-08 10:16:14', '2022-12-08 10:16:14'),
(365, 'testID', 2, 4, 1, '2022-12-08 10:17:14', '2022-12-08 10:17:14'),
(366, 'testID', 2, 3, 1, '2022-12-08 10:18:15', '2022-12-08 10:18:15'),
(367, 'testID', 2, 4, 1, '2022-12-08 10:19:14', '2022-12-08 10:19:14'),
(368, 'testID', 2, 4, 1, '2022-12-08 10:20:14', '2022-12-08 10:20:14'),
(369, 'testID', 2, 4, 1, '2022-12-08 10:21:15', '2022-12-08 10:21:15'),
(370, 'testID', 2, 4, 1, '2022-12-08 10:22:15', '2022-12-08 10:22:15'),
(371, 'testID', 2, 4, 1, '2022-12-08 10:23:15', '2022-12-08 10:23:15'),
(372, 'testID', 2, 4, 1, '2022-12-08 10:24:15', '2022-12-08 10:24:15'),
(373, 'testID', 2, 3, 1, '2022-12-08 10:25:15', '2022-12-08 10:25:15'),
(374, 'testID', 2, 4, 1, '2022-12-08 10:26:15', '2022-12-08 10:26:15'),
(375, 'testID', 2, 4, 1, '2022-12-08 10:27:15', '2022-12-08 10:27:15'),
(376, 'testID', 2, 4, 1, '2022-12-08 10:28:15', '2022-12-08 10:28:15'),
(377, 'testID', 2, 4, 1, '2022-12-08 10:29:15', '2022-12-08 10:29:15'),
(378, 'testID', 2, 3, 1, '2022-12-08 10:30:15', '2022-12-08 10:30:15'),
(379, 'testID', 2, 4, 1, '2022-12-08 10:31:15', '2022-12-08 10:31:15'),
(380, 'testID', 2, 4, 1, '2022-12-08 10:32:15', '2022-12-08 10:32:15'),
(381, 'testID', 2, 4, 1, '2022-12-08 10:33:15', '2022-12-08 10:33:15'),
(382, 'testID', 2, 4, 1, '2022-12-08 10:34:15', '2022-12-08 10:34:15'),
(383, 'testID', 2, 4, 1, '2022-12-08 10:35:15', '2022-12-08 10:35:15'),
(384, 'testID', 2, 4, 1, '2022-12-08 10:36:15', '2022-12-08 10:36:15'),
(385, 'testID', 2, 3, 1, '2022-12-08 10:37:15', '2022-12-08 10:37:15'),
(386, 'testID', 2, 4, 1, '2022-12-08 10:38:15', '2022-12-08 10:38:15'),
(387, 'testID', 2, 4, 1, '2022-12-08 10:39:15', '2022-12-08 10:39:15'),
(388, 'testID', 2, 4, 1, '2022-12-08 10:40:15', '2022-12-08 10:40:15'),
(389, 'testID', 2, 4, 1, '2022-12-08 10:41:15', '2022-12-08 10:41:15'),
(390, 'testID', 2, 4, 1, '2022-12-08 10:42:15', '2022-12-08 10:42:15'),
(391, 'testID', 2, 3, 1, '2022-12-08 10:43:15', '2022-12-08 10:43:15'),
(392, 'testID', 2, 4, 1, '2022-12-08 10:44:15', '2022-12-08 10:44:15'),
(393, 'testID', 2, 4, 1, '2022-12-08 10:45:15', '2022-12-08 10:45:15'),
(394, 'testID', 2, 4, 1, '2022-12-08 10:46:15', '2022-12-08 10:46:15'),
(395, 'testID', 2, 4, 1, '2022-12-08 10:47:15', '2022-12-08 10:47:15'),
(396, 'testID', 2, 4, 1, '2022-12-08 10:48:15', '2022-12-08 10:48:15'),
(397, 'testID', 2, 4, 1, '2022-12-08 10:49:15', '2022-12-08 10:49:15'),
(398, 'testID', 2, 4, 1, '2022-12-08 10:50:15', '2022-12-08 10:50:15'),
(399, 'testID', 2, 3, 1, '2022-12-08 10:51:15', '2022-12-08 10:51:15'),
(400, 'testID', 2, 4, 1, '2022-12-08 10:52:15', '2022-12-08 10:52:15'),
(401, 'testID', 2, 4, 1, '2022-12-08 10:53:15', '2022-12-08 10:53:15'),
(402, 'testID', 2, 4, 1, '2022-12-08 10:54:15', '2022-12-08 10:54:15'),
(403, 'testID', 2, 3, 1, '2022-12-08 10:55:15', '2022-12-08 10:55:15'),
(404, 'testID', 2, 4, 1, '2022-12-08 10:56:15', '2022-12-08 10:56:15'),
(405, 'testID', 2, 4, 1, '2022-12-08 10:57:15', '2022-12-08 10:57:15'),
(406, 'testID', 2, 4, 1, '2022-12-08 10:58:15', '2022-12-08 10:58:15'),
(407, 'testID', 2, 4, 1, '2022-12-08 10:59:15', '2022-12-08 10:59:15'),
(408, 'testID', 2, 4, 1, '2022-12-08 11:00:15', '2022-12-08 11:00:15'),
(409, 'testID', 2, 4, 1, '2022-12-08 11:01:15', '2022-12-08 11:01:15'),
(410, 'testID', 2, 4, 1, '2022-12-08 11:02:15', '2022-12-08 11:02:15'),
(411, 'testID', 2, 4, 1, '2022-12-08 11:03:15', '2022-12-08 11:03:15'),
(412, 'testID', 2, 3, 1, '2022-12-08 11:04:15', '2022-12-08 11:04:15'),
(413, 'testID', 2, 4, 1, '2022-12-08 11:05:15', '2022-12-08 11:05:15'),
(414, 'testID', 2, 4, 1, '2022-12-08 11:06:15', '2022-12-08 11:06:15'),
(415, 'testID', 2, 3, 1, '2022-12-08 11:07:15', '2022-12-08 11:07:15'),
(416, 'testID', 2, 4, 1, '2022-12-08 11:08:15', '2022-12-08 11:08:15'),
(417, 'testID', 2, 4, 1, '2022-12-08 11:09:15', '2022-12-08 11:09:15'),
(418, 'testID', 2, 4, 1, '2022-12-08 11:10:15', '2022-12-08 11:10:15'),
(419, 'testID', 2, 4, 1, '2022-12-08 11:11:15', '2022-12-08 11:11:15'),
(420, 'testID', 2, 4, 1, '2022-12-08 11:12:15', '2022-12-08 11:12:15'),
(421, 'testID', 2, 4, 1, '2022-12-08 11:13:15', '2022-12-08 11:13:15'),
(422, 'testID', 2, 4, 1, '2022-12-08 11:14:15', '2022-12-08 11:14:15'),
(423, 'testID', 2, 4, 1, '2022-12-08 11:15:15', '2022-12-08 11:15:15'),
(424, 'testID', 2, 4, 1, '2022-12-08 11:16:15', '2022-12-08 11:16:15'),
(425, 'testID', 2, 3, 1, '2022-12-08 11:17:15', '2022-12-08 11:17:15'),
(426, 'testID', 2, 4, 1, '2022-12-08 11:18:15', '2022-12-08 11:18:15'),
(427, 'testID', 2, 4, 1, '2022-12-08 11:19:15', '2022-12-08 11:19:15'),
(428, 'testID', 2, 4, 1, '2022-12-08 11:20:15', '2022-12-08 11:20:15'),
(429, 'testID', 2, 3, 1, '2022-12-08 11:21:15', '2022-12-08 11:21:15'),
(430, 'testID', 2, 4, 1, '2022-12-08 11:22:15', '2022-12-08 11:22:15'),
(431, 'testID', 2, 4, 1, '2022-12-08 11:23:15', '2022-12-08 11:23:15'),
(432, 'testID', 2, 4, 1, '2022-12-08 11:24:15', '2022-12-08 11:24:15'),
(433, 'testID', 2, 4, 1, '2022-12-08 11:25:15', '2022-12-08 11:25:15'),
(434, 'testID', 2, 4, 1, '2022-12-08 11:26:15', '2022-12-08 11:26:15'),
(435, 'testID', 2, 4, 1, '2022-12-08 11:27:15', '2022-12-08 11:27:15'),
(436, 'testID', 2, 4, 1, '2022-12-08 11:28:15', '2022-12-08 11:28:15'),
(437, 'testID', 2, 4, 1, '2022-12-08 11:29:15', '2022-12-08 11:29:15'),
(438, 'testID', 2, 4, 1, '2022-12-08 11:30:15', '2022-12-08 11:30:15'),
(439, 'testID', 2, 3, 1, '2022-12-08 11:31:15', '2022-12-08 11:31:15'),
(440, 'testID', 2, 4, 1, '2022-12-08 11:32:15', '2022-12-08 11:32:15'),
(441, 'testID', 2, 4, 1, '2022-12-08 11:33:15', '2022-12-08 11:33:15'),
(442, 'testID', 2, 3, 1, '2022-12-08 11:34:15', '2022-12-08 11:34:15'),
(443, 'testID', 2, 4, 1, '2022-12-08 11:35:15', '2022-12-08 11:35:15'),
(444, 'testID', 2, 4, 1, '2022-12-08 11:36:15', '2022-12-08 11:36:15'),
(445, 'testID', 2, 4, 1, '2022-12-08 11:37:15', '2022-12-08 11:37:15'),
(446, 'testID', 2, 4, 1, '2022-12-08 11:38:15', '2022-12-08 11:38:15'),
(447, 'testID', 2, 4, 1, '2022-12-08 11:39:15', '2022-12-08 11:39:15'),
(448, 'testID', 2, 4, 1, '2022-12-08 11:40:15', '2022-12-08 11:40:15'),
(449, 'testID', 2, 4, 1, '2022-12-08 11:41:15', '2022-12-08 11:41:15'),
(450, 'testID', 2, 4, 1, '2022-12-08 11:42:15', '2022-12-08 11:42:15'),
(451, 'testID', 2, 4, 1, '2022-12-08 11:43:15', '2022-12-08 11:43:15'),
(452, 'testID', 2, 3, 1, '2022-12-08 11:44:15', '2022-12-08 11:44:15'),
(453, 'testID', 2, 4, 1, '2022-12-08 11:45:15', '2022-12-08 11:45:15'),
(454, 'testID', 2, 4, 1, '2022-12-08 11:46:15', '2022-12-08 11:46:15'),
(455, 'testID', 2, 3, 1, '2022-12-08 11:47:15', '2022-12-08 11:47:15'),
(456, 'testID', 2, 4, 1, '2022-12-08 11:48:15', '2022-12-08 11:48:15'),
(457, 'testID', 2, 4, 1, '2022-12-08 11:49:15', '2022-12-08 11:49:15'),
(458, 'testID', 2, 4, 1, '2022-12-08 11:50:15', '2022-12-08 11:50:15'),
(459, 'testID', 2, 4, 1, '2022-12-08 11:51:15', '2022-12-08 11:51:15'),
(460, 'testID', 2, 4, 1, '2022-12-08 11:52:15', '2022-12-08 11:52:15'),
(461, 'testID', 2, 4, 1, '2022-12-08 11:53:15', '2022-12-08 11:53:15'),
(462, 'testID', 2, 4, 1, '2022-12-08 11:54:15', '2022-12-08 11:54:15'),
(463, 'testID', 2, 4, 1, '2022-12-08 11:55:15', '2022-12-08 11:55:15'),
(464, 'testID', 2, 4, 1, '2022-12-08 11:56:15', '2022-12-08 11:56:15'),
(465, 'testID', 2, 3, 1, '2022-12-08 11:57:15', '2022-12-08 11:57:15'),
(466, 'testID', 2, 4, 1, '2022-12-08 11:58:15', '2022-12-08 11:58:15'),
(467, 'testID', 2, 3, 1, '2022-12-08 11:59:15', '2022-12-08 11:59:15'),
(468, 'testID', 2, 4, 1, '2022-12-08 12:00:15', '2022-12-08 12:00:15'),
(469, 'testID', 2, 4, 1, '2022-12-08 12:01:15', '2022-12-08 12:01:15'),
(470, 'testID', 2, 4, 1, '2022-12-08 12:02:15', '2022-12-08 12:02:15'),
(471, 'testID', 2, 4, 1, '2022-12-08 12:03:15', '2022-12-08 12:03:15'),
(472, 'testID', 2, 4, 1, '2022-12-08 12:04:15', '2022-12-08 12:04:15'),
(473, 'testID', 2, 4, 1, '2022-12-08 12:05:15', '2022-12-08 12:05:15'),
(474, 'testID', 2, 4, 1, '2022-12-08 12:06:15', '2022-12-08 12:06:15'),
(475, 'testID', 2, 4, 1, '2022-12-08 12:07:16', '2022-12-08 12:07:16'),
(476, 'testID', 2, 4, 1, '2022-12-08 12:08:15', '2022-12-08 12:08:15'),
(477, 'testID', 2, 3, 1, '2022-12-08 12:09:15', '2022-12-08 12:09:15'),
(478, 'testID', 2, 3, 1, '2022-12-08 12:10:16', '2022-12-08 12:10:16'),
(479, 'testID', 2, 4, 1, '2022-12-08 12:11:15', '2022-12-08 12:11:15'),
(480, 'testID', 2, 4, 1, '2022-12-08 12:12:15', '2022-12-08 12:12:15'),
(481, 'testID', 2, 4, 1, '2022-12-08 12:13:15', '2022-12-08 12:13:15'),
(482, 'testID', 2, 4, 1, '2022-12-08 12:14:15', '2022-12-08 12:14:15'),
(483, 'testID', 2, 4, 1, '2022-12-08 12:15:15', '2022-12-08 12:15:15'),
(484, 'testID', 2, 4, 1, '2022-12-08 12:16:16', '2022-12-08 12:16:16'),
(485, 'testID', 2, 4, 1, '2022-12-08 12:17:15', '2022-12-08 12:17:15'),
(486, 'testID', 2, 4, 1, '2022-12-08 12:18:16', '2022-12-08 12:18:16'),
(487, 'testID', 2, 4, 1, '2022-12-08 12:19:15', '2022-12-08 12:19:15'),
(488, 'testID', 2, 4, 1, '2022-12-08 12:20:16', '2022-12-08 12:20:16'),
(489, 'testID', 2, 3, 1, '2022-12-08 12:21:16', '2022-12-08 12:21:16'),
(490, 'testID', 2, 4, 1, '2022-12-08 12:22:16', '2022-12-08 12:22:16'),
(491, 'testID', 2, 3, 1, '2022-12-08 12:23:16', '2022-12-08 12:23:16'),
(492, 'testID', 2, 4, 1, '2022-12-08 12:24:16', '2022-12-08 12:24:16'),
(493, 'testID', 2, 4, 1, '2022-12-08 12:25:16', '2022-12-08 12:25:16'),
(494, 'testID', 2, 4, 1, '2022-12-08 12:26:16', '2022-12-08 12:26:16'),
(495, 'testID', 2, 4, 1, '2022-12-08 12:27:16', '2022-12-08 12:27:16'),
(496, 'testID', 2, 4, 1, '2022-12-08 12:28:16', '2022-12-08 12:28:16'),
(497, 'testID', 2, 4, 1, '2022-12-08 12:29:16', '2022-12-08 12:29:16'),
(498, 'testID', 2, 4, 1, '2022-12-08 12:30:16', '2022-12-08 12:30:16'),
(499, 'testID', 2, 4, 1, '2022-12-08 12:31:16', '2022-12-08 12:31:16'),
(500, 'testID', 2, 4, 1, '2022-12-08 12:32:16', '2022-12-08 12:32:16'),
(501, 'testID', 2, 3, 1, '2022-12-08 12:33:16', '2022-12-08 12:33:16'),
(502, 'testID', 2, 4, 1, '2022-12-08 12:34:16', '2022-12-08 12:34:16'),
(503, 'testID', 2, 3, 1, '2022-12-08 12:35:16', '2022-12-08 12:35:16'),
(504, 'testID', 2, 4, 1, '2022-12-08 12:36:16', '2022-12-08 12:36:16'),
(505, 'testID', 2, 4, 1, '2022-12-08 12:37:16', '2022-12-08 12:37:16'),
(506, 'testID', 2, 4, 1, '2022-12-08 12:38:16', '2022-12-08 12:38:16'),
(507, 'testID', 2, 4, 1, '2022-12-08 12:39:16', '2022-12-08 12:39:16'),
(508, 'testID', 2, 4, 1, '2022-12-08 12:40:16', '2022-12-08 12:40:16'),
(509, 'testID', 2, 4, 1, '2022-12-08 12:41:16', '2022-12-08 12:41:16'),
(510, 'testID', 2, 4, 1, '2022-12-08 12:42:16', '2022-12-08 12:42:16'),
(511, 'testID', 2, 4, 1, '2022-12-08 12:43:16', '2022-12-08 12:43:16'),
(512, 'testID', 2, 4, 1, '2022-12-08 12:44:16', '2022-12-08 12:44:16'),
(513, 'testID', 2, 4, 1, '2022-12-08 12:45:16', '2022-12-08 12:45:16'),
(514, 'testID', 2, 3, 1, '2022-12-08 12:46:16', '2022-12-08 12:46:16'),
(515, 'testID', 2, 4, 1, '2022-12-08 12:47:16', '2022-12-08 12:47:16'),
(516, 'testID', 2, 3, 1, '2022-12-08 12:48:16', '2022-12-08 12:48:16'),
(517, 'testID', 2, 4, 1, '2022-12-08 12:49:16', '2022-12-08 12:49:16'),
(518, 'testID', 2, 4, 1, '2022-12-08 12:50:16', '2022-12-08 12:50:16'),
(519, 'testID', 2, 4, 1, '2022-12-08 12:51:16', '2022-12-08 12:51:16'),
(520, 'testID', 2, 4, 1, '2022-12-08 12:52:16', '2022-12-08 12:52:16'),
(521, 'testID', 2, 4, 1, '2022-12-08 12:53:16', '2022-12-08 12:53:16'),
(522, 'testID', 2, 4, 1, '2022-12-08 12:54:16', '2022-12-08 12:54:16'),
(523, 'testID', 2, 4, 1, '2022-12-08 12:55:16', '2022-12-08 12:55:16'),
(524, 'testID', 2, 4, 1, '2022-12-08 12:56:16', '2022-12-08 12:56:16'),
(525, 'testID', 2, 4, 1, '2022-12-08 12:57:16', '2022-12-08 12:57:16'),
(526, 'testID', 2, 4, 1, '2022-12-08 12:58:16', '2022-12-08 12:58:16'),
(527, 'testID', 2, 3, 1, '2022-12-08 12:59:16', '2022-12-08 12:59:16'),
(528, 'testID', 2, 3, 1, '2022-12-08 13:00:16', '2022-12-08 13:00:16'),
(529, 'testID', 2, 4, 1, '2022-12-08 13:01:16', '2022-12-08 13:01:16'),
(530, 'testID', 2, 4, 1, '2022-12-08 13:02:16', '2022-12-08 13:02:16'),
(531, 'testID', 2, 4, 1, '2022-12-08 13:03:16', '2022-12-08 13:03:16'),
(532, 'testID', 2, 4, 1, '2022-12-08 13:04:16', '2022-12-08 13:04:16'),
(533, 'testID', 1, 1, 0, '2022-12-09 06:33:21', '2022-12-09 06:33:21'),
(534, 'testID', 1, 2, 1, '2022-12-09 06:34:21', '2022-12-09 06:34:21'),
(535, 'testID', 0, 0, 1, '2022-12-09 06:35:21', '2022-12-09 06:35:21'),
(536, 'testID', 0, 0, 1, '2022-12-09 06:36:21', '2022-12-09 06:36:21'),
(537, 'testID', 0, 0, 1, '2022-12-09 06:37:21', '2022-12-09 06:37:21'),
(538, 'testID', 0, 0, 1, '2022-12-09 06:38:22', '2022-12-09 06:38:22'),
(539, 'testID', 0, 0, 1, '2022-12-09 06:39:21', '2022-12-09 06:39:21'),
(540, 'testID', 0, 0, 1, '2022-12-09 06:40:21', '2022-12-09 06:40:21'),
(541, 'testID', 0, 0, 1, '2022-12-09 06:41:21', '2022-12-09 06:41:21'),
(542, 'testID', 0, 0, 1, '2022-12-09 06:42:21', '2022-12-09 06:42:21'),
(543, 'testID', 0, 0, 1, '2022-12-09 06:43:21', '2022-12-09 06:43:21'),
(544, 'testID', 0, 0, 1, '2022-12-09 06:44:21', '2022-12-09 06:44:21'),
(545, 'testID', 0, 0, 1, '2022-12-09 06:45:21', '2022-12-09 06:45:21'),
(546, 'testID', 0, 0, 1, '2022-12-09 06:46:21', '2022-12-09 06:46:21'),
(547, 'testID', 0, 0, 1, '2022-12-09 06:47:21', '2022-12-09 06:47:21'),
(548, 'testID', 0, 0, 1, '2022-12-09 06:48:21', '2022-12-09 06:48:21'),
(549, 'testID', 0, 0, 1, '2022-12-09 06:49:21', '2022-12-09 06:49:21'),
(550, 'testID', 0, 0, 1, '2022-12-09 06:50:21', '2022-12-09 06:50:21'),
(551, 'testID', 0, 0, 1, '2022-12-09 06:51:21', '2022-12-09 06:51:21'),
(552, 'testID', 0, 0, 1, '2022-12-09 06:52:21', '2022-12-09 06:52:21'),
(553, 'testID', 0, 0, 1, '2022-12-09 06:53:21', '2022-12-09 06:53:21'),
(554, 'testID', 0, 0, 1, '2022-12-09 06:54:21', '2022-12-09 06:54:21'),
(555, 'testID', 0, 0, 1, '2022-12-09 06:55:21', '2022-12-09 06:55:21'),
(556, 'testID', 0, 0, 1, '2022-12-09 06:56:21', '2022-12-09 06:56:21'),
(557, 'testID', 0, 0, 1, '2022-12-09 06:57:21', '2022-12-09 06:57:21'),
(558, 'testID', 0, 0, 1, '2022-12-09 06:58:21', '2022-12-09 06:58:21'),
(559, 'testID', 0, 0, 1, '2022-12-09 06:59:21', '2022-12-09 06:59:21'),
(560, 'testID', 0, 0, 1, '2022-12-09 07:00:21', '2022-12-09 07:00:21'),
(561, 'testID', 0, 0, 1, '2022-12-09 07:01:21', '2022-12-09 07:01:21'),
(562, 'testID', 0, 0, 1, '2022-12-09 07:02:21', '2022-12-09 07:02:21'),
(563, 'testID', 0, 0, 1, '2022-12-09 07:03:21', '2022-12-09 07:03:21'),
(564, 'testID', 0, 0, 1, '2022-12-09 07:04:21', '2022-12-09 07:04:21'),
(565, 'testID', 0, 0, 1, '2022-12-09 07:05:21', '2022-12-09 07:05:21'),
(566, 'testID', 0, 0, 1, '2022-12-09 07:06:21', '2022-12-09 07:06:21'),
(567, 'testID', 0, 0, 1, '2022-12-09 07:07:21', '2022-12-09 07:07:21'),
(568, 'testID', 0, 0, 1, '2022-12-09 07:08:21', '2022-12-09 07:08:21'),
(569, 'testID', 0, 0, 1, '2022-12-09 07:09:21', '2022-12-09 07:09:21'),
(570, 'testID', 0, 0, 1, '2022-12-09 07:10:21', '2022-12-09 07:10:21'),
(571, 'testID', 0, 0, 1, '2022-12-09 07:11:21', '2022-12-09 07:11:21'),
(572, 'testID', 0, 0, 1, '2022-12-09 07:12:21', '2022-12-09 07:12:21'),
(573, 'testID', 0, 0, 1, '2022-12-09 07:13:21', '2022-12-09 07:13:21'),
(574, 'testID', 0, 0, 1, '2022-12-09 07:14:21', '2022-12-09 07:14:21'),
(575, 'testID', 0, 0, 1, '2022-12-09 07:15:21', '2022-12-09 07:15:21'),
(576, 'testID', 0, 0, 1, '2022-12-09 07:16:21', '2022-12-09 07:16:21'),
(577, 'testID', 0, 0, 1, '2022-12-09 07:17:21', '2022-12-09 07:17:21'),
(578, 'testID', 0, 0, 1, '2022-12-09 07:18:21', '2022-12-09 07:18:21'),
(579, 'testID', 0, 0, 1, '2022-12-09 07:19:21', '2022-12-09 07:19:21'),
(580, 'testID', 0, 0, 1, '2022-12-09 07:20:21', '2022-12-09 07:20:21'),
(581, 'testID', 0, 0, 1, '2022-12-09 07:21:21', '2022-12-09 07:21:21'),
(582, 'testID', 0, 0, 1, '2022-12-09 07:22:21', '2022-12-09 07:22:21'),
(583, 'testID', 0, 0, 1, '2022-12-09 07:23:21', '2022-12-09 07:23:21'),
(584, 'testID', 0, 0, 1, '2022-12-09 07:24:21', '2022-12-09 07:24:21'),
(585, 'testID', 0, 0, 1, '2022-12-09 07:25:21', '2022-12-09 07:25:21'),
(586, 'testID', 0, 0, 1, '2022-12-09 07:26:21', '2022-12-09 07:26:21'),
(587, 'testID', 0, 0, 1, '2022-12-09 07:27:21', '2022-12-09 07:27:21'),
(588, 'testID', 0, 0, 1, '2022-12-09 07:28:21', '2022-12-09 07:28:21'),
(589, 'testID', 0, 0, 1, '2022-12-09 07:29:21', '2022-12-09 07:29:21'),
(590, 'testID', 0, 0, 1, '2022-12-09 07:30:21', '2022-12-09 07:30:21'),
(591, 'testID', 0, 0, 1, '2022-12-09 07:31:21', '2022-12-09 07:31:21'),
(592, 'testID', 0, 0, 1, '2022-12-09 07:32:22', '2022-12-09 07:32:22'),
(593, 'testID', 0, 0, 1, '2022-12-09 07:33:21', '2022-12-09 07:33:21'),
(594, 'testID', 0, 0, 1, '2022-12-09 07:34:22', '2022-12-09 07:34:22'),
(595, 'testID', 0, 0, 1, '2022-12-09 07:35:21', '2022-12-09 07:35:21'),
(596, 'testID', 0, 0, 1, '2022-12-09 07:36:21', '2022-12-09 07:36:21'),
(597, 'testID', 0, 0, 1, '2022-12-09 07:37:21', '2022-12-09 07:37:21'),
(598, 'testID', 0, 0, 1, '2022-12-09 07:38:21', '2022-12-09 07:38:21'),
(599, 'testID', 0, 0, 1, '2022-12-09 07:39:21', '2022-12-09 07:39:21'),
(600, 'testID', 0, 0, 1, '2022-12-09 07:40:22', '2022-12-09 07:40:22'),
(601, 'testID', 0, 0, 1, '2022-12-09 07:41:21', '2022-12-09 07:41:21'),
(602, 'testID', 0, 0, 1, '2022-12-09 07:42:22', '2022-12-09 07:42:22'),
(603, 'testID', 0, 0, 1, '2022-12-09 07:43:22', '2022-12-09 07:43:22'),
(604, 'testID', 0, 0, 1, '2022-12-09 07:44:21', '2022-12-09 07:44:21'),
(605, 'testID', 0, 0, 1, '2022-12-09 07:45:22', '2022-12-09 07:45:22'),
(606, 'testID', 0, 0, 1, '2022-12-09 07:46:22', '2022-12-09 07:46:22'),
(607, 'testID', 0, 0, 1, '2022-12-09 07:47:22', '2022-12-09 07:47:22'),
(608, 'testID', 0, 0, 1, '2022-12-09 07:48:22', '2022-12-09 07:48:22'),
(609, 'testID', 0, 0, 1, '2022-12-09 07:49:22', '2022-12-09 07:49:22'),
(610, 'testID', 0, 0, 1, '2022-12-09 07:50:22', '2022-12-09 07:50:22'),
(611, 'testID', 0, 0, 1, '2022-12-09 07:51:22', '2022-12-09 07:51:22'),
(612, 'testID', 0, 0, 1, '2022-12-09 07:52:22', '2022-12-09 07:52:22'),
(613, 'testID', 0, 0, 1, '2022-12-09 07:53:22', '2022-12-09 07:53:22'),
(614, 'testID', 0, 0, 1, '2022-12-09 07:54:22', '2022-12-09 07:54:22'),
(615, 'testID', 0, 0, 1, '2022-12-09 07:55:22', '2022-12-09 07:55:22'),
(616, 'testID', 0, 0, 1, '2022-12-09 07:56:22', '2022-12-09 07:56:22'),
(617, 'testID', 0, 0, 1, '2022-12-09 07:57:22', '2022-12-09 07:57:22'),
(618, 'testID', 0, 0, 1, '2022-12-09 07:58:22', '2022-12-09 07:58:22'),
(619, 'testID', 0, 0, 1, '2022-12-09 07:59:22', '2022-12-09 07:59:22'),
(620, 'testID', 0, 0, 1, '2022-12-09 08:00:22', '2022-12-09 08:00:22'),
(621, 'testID', 0, 0, 1, '2022-12-09 08:01:22', '2022-12-09 08:01:22'),
(622, 'testID', 0, 0, 1, '2022-12-09 08:02:22', '2022-12-09 08:02:22'),
(623, 'testID', 0, 0, 1, '2022-12-09 08:03:22', '2022-12-09 08:03:22'),
(624, 'testID', 0, 0, 1, '2022-12-09 08:04:22', '2022-12-09 08:04:22'),
(625, 'testID', 0, 0, 1, '2022-12-09 08:05:22', '2022-12-09 08:05:22'),
(626, 'testID', 0, 0, 1, '2022-12-09 08:06:22', '2022-12-09 08:06:22'),
(627, 'testID', 0, 0, 1, '2022-12-09 08:07:22', '2022-12-09 08:07:22'),
(628, 'testID', 0, 0, 1, '2022-12-09 08:08:22', '2022-12-09 08:08:22'),
(629, 'testID', 0, 0, 1, '2022-12-09 08:09:22', '2022-12-09 08:09:22'),
(630, 'testID', 0, 0, 1, '2022-12-09 08:10:22', '2022-12-09 08:10:22'),
(631, 'testID', 0, 0, 1, '2022-12-09 08:11:22', '2022-12-09 08:11:22'),
(632, 'testID', 0, 0, 1, '2022-12-09 08:12:22', '2022-12-09 08:12:22'),
(633, 'testID', 0, 0, 1, '2022-12-09 08:13:22', '2022-12-09 08:13:22'),
(634, 'testID', 0, 0, 1, '2022-12-09 08:14:22', '2022-12-09 08:14:22'),
(635, 'testID', 0, 0, 1, '2022-12-09 08:15:22', '2022-12-09 08:15:22'),
(636, 'testID', 0, 0, 1, '2022-12-09 08:16:22', '2022-12-09 08:16:22'),
(637, 'testID', 0, 0, 1, '2022-12-09 08:17:22', '2022-12-09 08:17:22'),
(638, 'testID', 0, 0, 1, '2022-12-09 08:18:22', '2022-12-09 08:18:22'),
(639, 'testID', 0, 0, 1, '2022-12-09 08:19:22', '2022-12-09 08:19:22'),
(640, 'testID', 0, 0, 1, '2022-12-09 08:20:22', '2022-12-09 08:20:22'),
(641, 'testID', 0, 0, 1, '2022-12-09 08:21:29', '2022-12-09 08:21:29'),
(642, 'testID', 0, 0, 1, '2022-12-09 08:22:22', '2022-12-09 08:22:22'),
(643, 'testID', 0, 0, 1, '2022-12-09 08:23:22', '2022-12-09 08:23:22'),
(644, 'testID', 0, 0, 1, '2022-12-09 08:24:22', '2022-12-09 08:24:22'),
(645, 'testID', 0, 0, 1, '2022-12-09 08:25:22', '2022-12-09 08:25:22'),
(646, 'testID', 0, 0, 1, '2022-12-09 08:26:22', '2022-12-09 08:26:22'),
(647, 'testID', 0, 0, 1, '2022-12-09 08:27:22', '2022-12-09 08:27:22'),
(648, 'testID', 0, 0, 1, '2022-12-09 08:28:22', '2022-12-09 08:28:22'),
(649, 'testID', 0, 0, 1, '2022-12-09 08:29:22', '2022-12-09 08:29:22'),
(650, 'testID', 0, 0, 1, '2022-12-09 08:30:22', '2022-12-09 08:30:22'),
(651, 'testID', 0, 0, 1, '2022-12-09 08:31:22', '2022-12-09 08:31:22'),
(652, 'testID', 0, 0, 1, '2022-12-09 08:32:22', '2022-12-09 08:32:22'),
(653, 'testID', 0, 0, 1, '2022-12-09 08:33:22', '2022-12-09 08:33:22'),
(654, 'testID', 0, 0, 1, '2022-12-09 08:34:22', '2022-12-09 08:34:22'),
(655, 'testID', 0, 0, 1, '2022-12-09 08:35:22', '2022-12-09 08:35:22'),
(656, 'testID', 0, 0, 1, '2022-12-09 08:36:22', '2022-12-09 08:36:22'),
(657, 'testID', 0, 0, 1, '2022-12-09 08:37:22', '2022-12-09 08:37:22'),
(658, 'testID', 0, 0, 1, '2022-12-09 08:38:22', '2022-12-09 08:38:22'),
(659, 'testID', 0, 0, 1, '2022-12-09 08:39:22', '2022-12-09 08:39:22'),
(660, 'testID', 0, 0, 1, '2022-12-09 08:40:22', '2022-12-09 08:40:22'),
(661, 'testID', 0, 0, 1, '2022-12-09 08:41:22', '2022-12-09 08:41:22'),
(662, 'testID', 0, 0, 1, '2022-12-09 08:42:22', '2022-12-09 08:42:22'),
(663, 'testID', 0, 0, 1, '2022-12-09 08:43:22', '2022-12-09 08:43:22'),
(664, 'testID', 0, 0, 1, '2022-12-09 08:44:22', '2022-12-09 08:44:22'),
(665, 'testID', 0, 0, 1, '2022-12-09 08:45:22', '2022-12-09 08:45:22'),
(666, 'testID', 0, 0, 1, '2022-12-09 08:46:22', '2022-12-09 08:46:22'),
(667, 'testID', 0, 0, 1, '2022-12-09 08:47:22', '2022-12-09 08:47:22'),
(668, 'testID', 0, 0, 1, '2022-12-09 08:48:22', '2022-12-09 08:48:22'),
(669, 'testID', 0, 0, 1, '2022-12-09 08:49:22', '2022-12-09 08:49:22'),
(670, 'testID', 0, 0, 1, '2022-12-09 08:50:22', '2022-12-09 08:50:22'),
(671, 'testID', 0, 0, 1, '2022-12-09 08:51:22', '2022-12-09 08:51:22'),
(672, 'testID', 0, 0, 1, '2022-12-09 08:52:22', '2022-12-09 08:52:22'),
(673, 'testID', 0, 0, 1, '2022-12-09 08:53:22', '2022-12-09 08:53:22'),
(674, 'testID', 0, 0, 1, '2022-12-09 08:54:22', '2022-12-09 08:54:22'),
(675, 'testID', 0, 0, 1, '2022-12-09 08:55:22', '2022-12-09 08:55:22'),
(676, 'testID', 0, 0, 1, '2022-12-09 08:56:22', '2022-12-09 08:56:22'),
(677, 'testID', 0, 0, 1, '2022-12-09 08:57:22', '2022-12-09 08:57:22'),
(678, 'testID', 0, 0, 1, '2022-12-09 08:58:22', '2022-12-09 08:58:22'),
(679, 'testID', 0, 0, 1, '2022-12-09 08:59:22', '2022-12-09 08:59:22'),
(680, 'testID', 0, 0, 1, '2022-12-09 09:00:22', '2022-12-09 09:00:22'),
(681, 'testID', 0, 0, 1, '2022-12-09 09:01:22', '2022-12-09 09:01:22'),
(682, 'testID', 0, 0, 1, '2022-12-09 09:02:22', '2022-12-09 09:02:22'),
(683, 'testID', 0, 0, 1, '2022-12-09 09:03:22', '2022-12-09 09:03:22'),
(684, 'testID', 0, 0, 1, '2022-12-09 09:04:22', '2022-12-09 09:04:22'),
(685, 'testID', 0, 0, 1, '2022-12-09 09:05:22', '2022-12-09 09:05:22'),
(686, 'testID', 0, 0, 1, '2022-12-09 09:06:22', '2022-12-09 09:06:22'),
(687, 'testID', 0, 0, 1, '2022-12-09 09:07:22', '2022-12-09 09:07:22'),
(688, 'testID', 0, 0, 1, '2022-12-09 09:08:22', '2022-12-09 09:08:22'),
(689, 'testID', 0, 0, 1, '2022-12-09 09:09:22', '2022-12-09 09:09:22'),
(690, 'testID', 0, 0, 1, '2022-12-09 09:10:22', '2022-12-09 09:10:22'),
(691, 'testID', 0, 0, 1, '2022-12-09 09:11:22', '2022-12-09 09:11:22'),
(692, 'testID', 0, 0, 1, '2022-12-09 09:12:22', '2022-12-09 09:12:22'),
(693, 'testID', 0, 0, 1, '2022-12-09 09:13:22', '2022-12-09 09:13:22'),
(694, 'testID', 0, 0, 1, '2022-12-09 09:14:22', '2022-12-09 09:14:22'),
(695, 'testID', 0, 0, 1, '2022-12-09 09:15:22', '2022-12-09 09:15:22'),
(696, 'testID', 0, 0, 1, '2022-12-09 09:16:22', '2022-12-09 09:16:22'),
(697, 'testID', 0, 0, 1, '2022-12-09 09:17:22', '2022-12-09 09:17:22'),
(698, 'testID', 0, 0, 1, '2022-12-09 09:18:22', '2022-12-09 09:18:22'),
(699, 'testID', 0, 0, 1, '2022-12-09 09:19:22', '2022-12-09 09:19:22'),
(700, 'testID', 0, 0, 1, '2022-12-09 09:20:22', '2022-12-09 09:20:22'),
(701, 'testID', 0, 0, 1, '2022-12-09 09:21:22', '2022-12-09 09:21:22'),
(702, 'testID', 0, 0, 1, '2022-12-09 09:22:22', '2022-12-09 09:22:22'),
(703, 'testID', 0, 0, 1, '2022-12-09 09:23:22', '2022-12-09 09:23:22'),
(704, 'testID', 0, 0, 1, '2022-12-09 09:24:22', '2022-12-09 09:24:22'),
(705, 'testID', 0, 0, 1, '2022-12-09 09:25:22', '2022-12-09 09:25:22'),
(706, 'testID', 0, 0, 1, '2022-12-09 09:26:22', '2022-12-09 09:26:22'),
(707, 'testID', 0, 0, 1, '2022-12-09 09:27:22', '2022-12-09 09:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `workspaces`
--

CREATE TABLE `workspaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_lengths`
--

CREATE TABLE `work_lengths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_lengths`
--

INSERT INTO `work_lengths` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Less than a month', 'less-than-a-month', 'active', '2022-10-31 06:48:54', NULL),
(2, '1 to 3 months', '1-to-3-months', 'active', '2022-10-31 06:49:19', NULL),
(3, '3 to 6 months', '3-to-6-months', 'active', '2022-10-31 06:49:19', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `categories_industry_id_foreign` (`industry_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chats_uuid_unique` (`uuid`),
  ADD KEY `chats_job_id_foreign` (`job_id`);

--
-- Indexes for table `chat_participants`
--
ALTER TABLE `chat_participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_participants_chat_id_foreign` (`chat_id`),
  ADD KEY `chat_participants_user_id_foreign` (`user_id`);

--
-- Indexes for table `experience_levels`
--
ALTER TABLE `experience_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_experience_level_id_foreign` (`experience_level_id`),
  ADD KEY `jobs_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `jobs_metadata_index` (`metadata`),
  ADD KEY `jobs_work_length_id_foreign` (`work_length_id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_job_id_foreign` (`job_id`),
  ADD KEY `job_applications_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_invitations`
--
ALTER TABLE `job_invitations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_invitations_job_id_foreign` (`job_id`),
  ADD KEY `job_invitations_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_responsibilities`
--
ALTER TABLE `job_responsibilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_responsibilities_job_id_foreign` (`job_id`);

--
-- Indexes for table `job_skills`
--
ALTER TABLE `job_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_skills_job_id_foreign` (`job_id`),
  ADD KEY `job_skills_skill_id_foreign` (`skill_id`);

--
-- Indexes for table `laravel_jobs`
--
ALTER TABLE `laravel_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laravel_jobs_queue_index` (`queue`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_likeable_type_likeable_id_index` (`likeable_type`,`likeable_id`),
  ADD KEY `likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_chat_id_foreign` (`chat_id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`);

--
-- Indexes for table `message_media`
--
ALTER TABLE `message_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_media_message_id_foreign` (`message_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_perks`
--
ALTER TABLE `package_perks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_perks_package_id_foreign` (`package_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_skills_user_id_foreign` (`user_id`),
  ADD KEY `user_skills_skill_id_foreign` (`skill_id`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workspaces`
--
ALTER TABLE `workspaces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workspaces_job_id_foreign` (`job_id`),
  ADD KEY `workspaces_user_id_foreign` (`user_id`),
  ADD KEY `workspaces_client_id_foreign` (`client_id`);

--
-- Indexes for table `work_lengths`
--
ALTER TABLE `work_lengths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_lengths_slug_index` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chat_participants`
--
ALTER TABLE `chat_participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `experience_levels`
--
ALTER TABLE `experience_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_invitations`
--
ALTER TABLE `job_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_responsibilities`
--
ALTER TABLE `job_responsibilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_skills`
--
ALTER TABLE `job_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `laravel_jobs`
--
ALTER TABLE `laravel_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `message_media`
--
ALTER TABLE `message_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `package_perks`
--
ALTER TABLE `package_perks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=708;

--
-- AUTO_INCREMENT for table `workspaces`
--
ALTER TABLE `workspaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_lengths`
--
ALTER TABLE `work_lengths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_participants`
--
ALTER TABLE `chat_participants`
  ADD CONSTRAINT `chat_participants_chat_id_foreign` FOREIGN KEY (`chat_id`) REFERENCES `chats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_participants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_experience_level_id_foreign` FOREIGN KEY (`experience_level_id`) REFERENCES `experience_levels` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `jobs_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_work_length_id_foreign` FOREIGN KEY (`work_length_id`) REFERENCES `work_lengths` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_invitations`
--
ALTER TABLE `job_invitations`
  ADD CONSTRAINT `job_invitations_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_invitations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_responsibilities`
--
ALTER TABLE `job_responsibilities`
  ADD CONSTRAINT `job_responsibilities_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_skills`
--
ALTER TABLE `job_skills`
  ADD CONSTRAINT `job_skills_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_skills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_chat_id_foreign` FOREIGN KEY (`chat_id`) REFERENCES `chats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `message_media`
--
ALTER TABLE `message_media`
  ADD CONSTRAINT `message_media_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_perks`
--
ALTER TABLE `package_perks`
  ADD CONSTRAINT `package_perks_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `workspaces`
--
ALTER TABLE `workspaces`
  ADD CONSTRAINT `workspaces_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `workspaces_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `workspaces_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
