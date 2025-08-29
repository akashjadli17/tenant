-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2025 at 07:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tenant`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('lenant@gmail.com|127.0.0.1', 'i:1;', 1755148119),
('lenant@gmail.com|127.0.0.1:timer', 'i:1755148119;', 1755148119),
('test@gmail.com|106.219.160.186', 'i:2;', 1754548393),
('test@gmail.com|106.219.160.186:timer', 'i:1754548393;', 1754548393);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"0ab018b5-f495-4183-8464-b61b1fb7bbbf\",\"displayName\":\"App\\\\Notifications\\\\PackageExpiringSoon\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:2;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:37:\\\"App\\\\Notifications\\\\PackageExpiringSoon\\\":3:{s:9:\\\"expiresAt\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2025-09-05 06:58:37.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:8:\\\"daysLeft\\\";i:9;s:2:\\\"id\\\";s:36:\\\"00cd40c4-7074-49b7-9551-684e601aa998\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1756191579, 1756191579),
(2, 'default', '{\"uuid\":\"9830e4c2-ce97-4f7b-a5e8-bac2cc9e33fa\",\"displayName\":\"App\\\\Notifications\\\\PackageExpiringSoon\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:2;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:37:\\\"App\\\\Notifications\\\\PackageExpiringSoon\\\":3:{s:9:\\\"expiresAt\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2025-09-05 06:58:37.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:8:\\\"daysLeft\\\";i:9;s:2:\\\"id\\\";s:36:\\\"089beded-9dc1-45d9-843a-e6bb78eb4002\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1756191598, 1756191598),
(3, 'default', '{\"uuid\":\"7de11ff1-8fd4-44a8-92c9-565ab4059e7c\",\"displayName\":\"App\\\\Notifications\\\\PackageExpiringSoon\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:2;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:37:\\\"App\\\\Notifications\\\\PackageExpiringSoon\\\":3:{s:9:\\\"expiresAt\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2025-09-05 06:58:37.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:8:\\\"daysLeft\\\";i:9;s:2:\\\"id\\\";s:36:\\\"ec8db261-b23a-4ab9-aa50-46c940e20ae4\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1756191605, 1756191605),
(4, 'default', '{\"uuid\":\"dd9f8286-a19b-435d-b2fb-5c17f151f1a4\",\"displayName\":\"App\\\\Notifications\\\\PackageExpiringSoon\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:2;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:37:\\\"App\\\\Notifications\\\\PackageExpiringSoon\\\":3:{s:9:\\\"expiresAt\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2025-09-05 06:58:37.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:8:\\\"daysLeft\\\";i:9;s:2:\\\"id\\\";s:36:\\\"174034e9-518b-4760-a5aa-cad92d81752f\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1756191609, 1756191609),
(5, 'default', '{\"uuid\":\"b2f566e0-0377-411d-92c7-bbc5b15a4751\",\"displayName\":\"App\\\\Notifications\\\\PackageExpiringSoon\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:2;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:37:\\\"App\\\\Notifications\\\\PackageExpiringSoon\\\":3:{s:9:\\\"expiresAt\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2025-09-05 06:58:37.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:8:\\\"daysLeft\\\";i:9;s:2:\\\"id\\\";s:36:\\\"ba449c7d-4497-4c59-a96f-edf4b38c9bb8\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1756191688, 1756191688);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mid_categories`
--

CREATE TABLE `mid_categories` (
  `id` int(11) NOT NULL,
  `top_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, '2025_07_24_051644_create_packages_table', 1),
(2, '2025_07_24_051807_add_package_to_users', 2),
(3, '2025_08_02_061710_create_properties_table', 3),
(4, '2025_08_02_061733_create_property_images_table', 4),
(5, '2025_08_02_061912_create_units_table', 5),
(6, '2025_08_05_050951_create_tenants_table', 6),
(7, '2025_08_05_062203_create_tenant_documents_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `package_type` varchar(50) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `interval` varchar(255) NOT NULL DEFAULT 'month',
  `interval_count` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `auto_renews` tinyint(1) NOT NULL DEFAULT 1,
  `trial_days` int(10) UNSIGNED DEFAULT NULL,
  `total_cycles` int(10) UNSIGNED DEFAULT NULL,
  `billing_cycle` enum('Monthly','Quarterly','Yearly','Unlimited') NOT NULL,
  `currency` char(3) DEFAULT 'USD',
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_type`, `price`, `interval`, `interval_count`, `auto_renews`, `trial_days`, `total_cycles`, `billing_cycle`, `currency`, `features`, `status`, `created_at`, `updated_at`) VALUES
(14, 'basic', 399.00, 'month', 1, 1, NULL, NULL, 'Yearly', 'INR', '\"[{\\\"name\\\":\\\"Manage up to 10 Tenants\\\",\\\"checked\\\":\\\"1\\\"},{\\\"name\\\":\\\"Basic Document Storage\\\",\\\"checked\\\":\\\"1\\\"},{\\\"name\\\":\\\"Secure Cloud Hosting\\\",\\\"checked\\\":\\\"1\\\"},{\\\"name\\\":\\\"Limited Email Support\\\",\\\"checked\\\":\\\"1\\\"},{\\\"name\\\":\\\"Multi-Property Management\\\",\\\"checked\\\":\\\"1\\\"},{\\\"name\\\":\\\"Custom Notifications\\\",\\\"checked\\\":\\\"1\\\"}]\"', 'active', '2025-08-16 02:05:42', '2025-08-26 01:31:14'),
(15, 'standard', 799.00, 'month', 1, 1, NULL, NULL, 'Monthly', 'INR', '\"[{\\\"name\\\":\\\"Manage up to 50 Tenants\\\",\\\"checked\\\":\\\"1\\\"},{\\\"name\\\":\\\"Advanced Document Storage\\\",\\\"checked\\\":\\\"1\\\"},{\\\"name\\\":\\\"Multi-Property Management\\\",\\\"checked\\\":\\\"1\\\"},{\\\"name\\\":\\\"SMS & Email Notifications\\\",\\\"checked\\\":\\\"1\\\"},{\\\"name\\\":\\\"Email + Chat Support\\\",\\\"checked\\\":\\\"1\\\"},{\\\"name\\\":\\\"Custom Branding\\\",\\\"checked\\\":\\\"0\\\"}]\"', 'active', '2025-08-16 02:07:10', '2025-08-25 05:26:27'),
(17, 'premium', 1499.00, 'month', 1, 1, NULL, NULL, 'Monthly', 'INR', '\"[{\\\"name\\\":\\\"Unlimited Tenants\\\",\\\"checked\\\":\\\"1\\\"},{\\\"name\\\":\\\"Unlimited Property Management\\\",\\\"checked\\\":\\\"1\\\"},{\\\"name\\\":\\\"Custom Notifications & Reminders\\\",\\\"checked\\\":\\\"1\\\"},{\\\"name\\\":\\\"Custom Branding & Logo\\\",\\\"checked\\\":\\\"1\\\"},{\\\"name\\\":\\\"Priority 24\\\\\\/7 Support\\\",\\\"checked\\\":\\\"1\\\"},{\\\"name\\\":\\\"Automated PDF Reports\\\",\\\"checked\\\":\\\"1\\\"}]\"', 'active', '2025-08-16 02:11:00', '2025-08-16 02:11:00');

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
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `owner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `type`, `name`, `description`, `thumbnail`, `country`, `state`, `city`, `zip_code`, `address`, `owner_id`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'lease', 'jaineet Taneja', 'as', 'thumbnails/6nkadQA1pG2uW79Ah4Hcl2ROtJjE7PmVi0IlOzyn.jpg', 'India', 'Uttar Pradesh', 'noida', '201301', 'sector 99 Noida Falt number 66 c sunshine Appartment', 3, 3, '2025-08-02 01:10:50', '2025-08-02 01:10:50'),
(2, 'lease', 'sec', 'zx', 'thumbnails/6SRjgxkEs2O6OEXqBK81e6EUErL3Xgp6yVltML33.webp', 'India', 'Uttar Pradesh', 'noida', '201301', 'sector23Noida Falt number 66 c sunshine Appartment', NULL, NULL, '2025-08-02 01:24:44', '2025-08-02 01:24:44'),
(3, 'lease', 'sec', 'zx', 'thumbnails/vtbGR4MXxwf2N5sEqdWS1VkWQccT2xH7vWQeegTd.webp', 'India', 'Uttar Pradesh', 'noida', '201301', 'sector23Noida Falt number 66 c sunshine Appartment', NULL, NULL, '2025-08-02 01:24:51', '2025-08-02 01:24:51'),
(4, 'lease', 'sec', 'zx', 'thumbnails/NgJgD4ZpVhl8SdcbtoA68SmIGCjSVcMu8ypLR7jh.webp', 'India', 'Uttar Pradesh', 'noida', '201301', 'sector23Noida Falt number 66 c sunshine Appartment', NULL, NULL, '2025-08-02 01:25:01', '2025-08-02 01:25:01'),
(5, 'lease', 'sec', 'zx', 'thumbnails/bE01D4Xw3VDKrvGDDcpYqvhikjvJcc360KioZvT3.webp', 'India', 'Uttar Pradesh', 'noida', '201301', 'sector23Noida Falt number 66 c sunshine Appartment', NULL, NULL, '2025-08-02 01:25:09', '2025-08-02 01:25:09'),
(6, 'own', 'asd', NULL, NULL, 'India', 'Uttar Pradesh', 'noida', '201301', 'sector 99 Noida Falt number 66 c sunshine Appartment', NULL, NULL, '2025-08-02 01:25:30', '2025-08-02 01:25:30'),
(7, 'own', 'jaineet Tanejs', NULL, NULL, 'India', 'Uttar Pradesh', 'noida', '201301', 'sector 99 Noida Falt number 66 c sunshine Appartment', NULL, NULL, '2025-08-02 01:25:46', '2025-08-02 01:25:46'),
(8, 'lease', 'jaineet Tad', NULL, NULL, 'India', 'Uttar Pradesh', 'noida', '201301', 'sector 99 Noida Falt number 66 c sunshine Appartment', NULL, NULL, '2025-08-02 01:26:00', '2025-08-02 01:26:00'),
(9, 'own', 'abc jai x', 'sd', NULL, 'India', 'Uttar Pradesh', 'noida', '201301', 'sector 99 Ncartment', NULL, NULL, '2025-08-02 01:37:30', '2025-08-02 01:37:30'),
(10, 'own', 'noifsq', 'this is noida proprty', 'thumbnails/xPaumuoucRrJsabP8WSbjJyUozKV0agTdKqgVksc.jpg', 'india', 'Uttar Pradesh', 'noida', '201301', 'sector 2Noida', NULL, NULL, '2025-08-04 00:02:48', '2025-08-04 00:02:48'),
(11, 'lease', 'jais', NULL, 'thumbnails/8rZ0gyXLIPEVrjfZwkDaS4hv6ETRvXM55n0KizTh.png', 'India', 'Uttar Pradesh', 'noida', '201301', 'sector 99 Noida Falt number 66 c sunshine Appartment', 3, 3, '2025-08-27 02:30:25', '2025-08-27 02:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE `property_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_images`
--

INSERT INTO `property_images` (`id`, `property_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 9, 'property_images/Vnrdqdr49LKSkmVuP3W7hup7sa9CHmOV9d62ItiS.png', '2025-08-02 01:37:30', '2025-08-02 01:37:30'),
(2, 9, 'property_images/a8wFj6Wpg2j4MGvnioKvS9CbFI1sfYK3v7bFDJAp.webp', '2025-08-02 01:37:30', '2025-08-02 01:37:30'),
(3, 9, 'property_images/A98xqx3tSfVlN7fbFUPq95uYKLzWvVl3VtKggujs.webp', '2025-08-02 01:37:30', '2025-08-02 01:37:30'),
(4, 9, 'property_images/xfcoQZNNqPFIzjMrE067pZODQ0Qqiu8UzWPS9N4x.webp', '2025-08-02 01:37:30', '2025-08-02 01:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `mid_category_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `highlight_points` text DEFAULT NULL,
  `overview` text DEFAULT NULL,
  `how_it_works` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `faqs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `action` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `total_family_member` int(11) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `lease_start_date` date NOT NULL,
  `lease_end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `total_family_member`, `profile`, `country`, `state`, `city`, `zip_code`, `address`, `property_id`, `unit_id`, `lease_start_date`, `lease_end_date`, `created_at`, `updated_at`) VALUES
(1, 'akash', 'dev', 'akash@gmail.com', '$2y$12$Z/6BIEYwaCrkgsHJt7k1Z.qe3BJOwqfVVXzcAjkWSwYS5mY4qkwNO', '894834898', 5, 'tenant_profiles/ZjnB88mP97lpQZVWsffnD9kBVUoiCYU3rII5VmIk.webp', 'india', 'Uttar Pradesh', 'noida', '201301', 'sector 99 Noida Falt number 66 c sunshine Appartment', 10, 3, '2025-08-05', '2025-08-05', '2025-08-04 23:54:04', '2025-08-05 01:23:57'),
(2, 'dhanoj', 'pandey', 'dhanojpandey08@gmail.com', '$2y$12$ofYP3aoB8fAn998lEV8Hhu3/b0svzFQRisjWzaD6F8Msr2CqkzDWO', '9309329032', 5, 'tenant_profiles/c0fLz9hrgD4ZdK4JQytTuIugL7rKc5fS95mTRw0b.webp', 'India', 'Uttar Pradesh', 'noida', '201301', 'sector 99 Noida Falt number 66 c sunshine Appartment', 8, 2, '2025-08-08', '2025-08-31', '2025-08-05 00:54:39', '2025-08-05 00:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_documents`
--

CREATE TABLE `tenant_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenant_documents`
--

INSERT INTO `tenant_documents` (`id`, `tenant_id`, `filename`, `path`, `created_at`, `updated_at`) VALUES
(1, 2, 'WhatsApp Image 2025-07-28 at 12.14.03.jpeg', 'tenant_documents/DQV4GjxmYihYrG1uW0eM40J0x9MTbThIVlVjxYqZ.jpg', '2025-08-05 00:54:39', '2025-08-05 00:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `top_categories`
--

CREATE TABLE `top_categories` (
  `id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bedroom` int(11) NOT NULL DEFAULT 0,
  `kitchen` int(11) NOT NULL DEFAULT 0,
  `bath` int(11) NOT NULL DEFAULT 0,
  `rent` decimal(10,2) NOT NULL DEFAULT 0.00,
  `rent_type` varchar(255) NOT NULL,
  `rent_duration` int(11) DEFAULT NULL,
  `deposit_type` varchar(255) NOT NULL DEFAULT 'fixed',
  `deposit_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `late_fee_type` varchar(255) NOT NULL DEFAULT 'fixed',
  `late_fee_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `incident_receipt_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `property_id`, `name`, `bedroom`, `kitchen`, `bath`, `rent`, `rent_type`, `rent_duration`, `deposit_type`, `deposit_amount`, `late_fee_type`, `late_fee_amount`, `incident_receipt_amount`, `notes`, `created_at`, `updated_at`) VALUES
(1, 9, 'acs', 1, 1, 1, 1.00, 'weekly', 1111, 'fixed', 21.00, 'fixed', 21.00, 12.00, 'e', '2025-08-02 01:37:30', '2025-08-02 01:37:30'),
(2, 9, 'Myrsdf', 34, 34, 34, 1.00, 'monthly', NULL, 'fixed', 43.00, 'fixed', 34.00, 43.00, '4', '2025-08-04 02:12:06', '2025-08-04 02:12:06'),
(3, 10, 'Myra Luxe Aesthetics', 5, 5, 5, 5.00, 'monthly', 1, 'percentage', 30000.00, 'fixed', 500.00, 30000.00, 'j', '2025-08-04 02:18:33', '2025-08-04 02:18:33'),
(4, 8, 'erter', 54, 54, 54, 54.00, 'monthly', 30, 'fixed', 54.00, 'fixed', 54.00, 54.00, '54', '2025-08-04 23:25:59', '2025-08-04 23:25:59'),
(5, 11, 'Myra Luxe Aesthetics', 3, 3, 3, 39000.00, 'monthly', 12, 'fixed', 1000.00, 'fixed', 2000.00, 20.00, 'sz', '2025-08-27 02:31:24', '2025-08-27 02:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` enum('admin','owner','tenant') DEFAULT 'owner',
  `phone` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_started_at` timestamp NULL DEFAULT NULL,
  `package_renews_at` timestamp NULL DEFAULT NULL,
  `package_expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`, `phone`, `gender`, `profile_image`, `package_id`, `package_started_at`, `package_renews_at`, `package_expires_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$Qt9RL7FahBIJiXVCAD1k5uaYegpEcZMlViH6g2nBM5bRzyMSecI9W', 'P3a0pB2ljjSVeZDtkE170BdJ7Gm3GxvjShNaBuyirNHlTL1BlzjAc0wWReKF', '2025-07-01 00:47:37', '2025-08-13 01:02:40', 'admin', '9999111186', 'male', '1755062769.jpg', 1, NULL, NULL, '2025-09-13 01:02:40'),
(2, 'Akash', 'akash@gmail.com', NULL, '$2y$12$Qt9RL7FahBIJiXVCAD1k5uaYegpEcZMlViH6g2nBM5bRzyMSecI9W', NULL, '2025-07-10 01:34:05', '2025-08-26 01:32:19', 'admin', '9318432272', 'male', '1753424647.png', 14, '2025-08-26 01:32:19', '2025-09-26 01:32:19', '2025-09-26 01:32:19'),
(3, 'Rahul Kumar', 'rahul@gmail.com', NULL, '$2y$12$6.BNhC3blzVsKqkHTYNgiesVIey1GCvSl5isQTNv/Lh80II4Glt8e', NULL, '2025-08-19 01:49:52', '2025-08-19 01:49:52', 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mid_categories`
--
ALTER TABLE `mid_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `top_category_id` (`top_category_id`,`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_owner_id_index` (`owner_id`),
  ADD KEY `properties_added_by_index` (`added_by`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_images_property_id_foreign` (`property_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mid_category_id` (`mid_category_id`,`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenants_email_unique` (`email`),
  ADD KEY `tenants_property_id_foreign` (`property_id`),
  ADD KEY `tenants_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `tenant_documents`
--
ALTER TABLE `tenant_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_documents_tenant_id_foreign` (`tenant_id`);

--
-- Indexes for table `top_categories`
--
ALTER TABLE `top_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gender_id` (`gender_id`,`name`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `units_property_id_foreign` (`property_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_package_id_foreign` (`package_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mid_categories`
--
ALTER TABLE `mid_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenant_documents`
--
ALTER TABLE `tenant_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `top_categories`
--
ALTER TABLE `top_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mid_categories`
--
ALTER TABLE `mid_categories`
  ADD CONSTRAINT `mid_categories_ibfk_1` FOREIGN KEY (`top_category_id`) REFERENCES `top_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `properties_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `property_images`
--
ALTER TABLE `property_images`
  ADD CONSTRAINT `property_images_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`mid_category_id`) REFERENCES `mid_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tenants`
--
ALTER TABLE `tenants`
  ADD CONSTRAINT `tenants_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tenants_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tenant_documents`
--
ALTER TABLE `tenant_documents`
  ADD CONSTRAINT `tenant_documents_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
