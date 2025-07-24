-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2025 at 08:25 AM
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
-- Database: `myra_skincare`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `image`, `content`, `status`, `created_at`, `updated_at`) VALUES
(2, 'HOW TO EXFOLIATE SKIN FOR A SMOOTH AND RADIANT GLOW', 'how-to-exfoliate-skin-for-a-smooth-and-radiant-glow', 'TJWaL5PUygYWXxKqtpTUKOFZFtyBSOHtmeRn9qDS.jpg', '<h3>Introduction</h3>\r\n\r\n<p>Don&#39;t you love that feeling when you run fingers along clean skin that feels fresh and smooth. But when it starts to feel bumpy or dull, or it seems as though your favourite products might not be absorbing the same way anymore, it may be time to consider adding some exfoliation.</p>\r\n\r\n<p>Exfoliation is not just something to check off your skin-care checklist; it is a way to give your skin a bit of a reset. When you are removing dead skin and the buildup on your skin, it can breathe, refresh and absorb all the wonderful things you have been putting on it.</p>\r\n\r\n<p>In this guide, we will explain how to exfoliate skin gently and effectively at home, what methods are better for different skin types, and when you might want to think about seeking help from the pros and getting an additional layer of glow with a professional treatment.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Why Is Exfoliation Important?</h3>\r\n\r\n<p>Our skin is an active surface, tirelessly working away, carrying out its processes of growing, shedding, and protecting us. As we get older, manage everyday stressors and pollution, or even just a change in seasons, our natural cell turnover rate slows down. The result? Dullness, dry patches, rough texture, and skincare that suddenly feels...meh.</p>\r\n\r\n<p>If you&rsquo;ve asked yourself, &ldquo;Why does my skin look tired even though I&rsquo;m doing all the right things?&rdquo;, the answer could be as simple as this: your skin might be craving exfoliation.</p>\r\n\r\n<p>Some common signs include:</p>\r\n\r\n<ul>\r\n	<li>Skin that looks a little flat or greyish</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Roughness when you run your hand across your cheeks</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Uneven patches or dry flakes</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Breakouts that keep coming back, especially around clogged areas</li>\r\n</ul>\r\n\r\n<p>Regular exfoliation (done right) helps get rid of that buildup, revealing the fresher, healthier skin hiding underneath. It also allows moisturisers, serums, and active ingredients to actually do their job, which means better results from the products you&rsquo;re already using.</p>', 'active', '2025-07-09 19:31:36', '2025-07-09 20:41:47'),
(4, 'HOW TO REDUCE DOUBLE CHIN WITH SIMPLE AND SAFE METHODS', 'how-to-reduce-double-chin-with-simple-and-safe-methods', 'MdD16MOgJrwgiI3uYbAcQefjoK1AmSdzkwkyoG1q.png', '<h3>Introduction</h3>\r\n\r\n<p>Let&rsquo;s just come out and say it: it is not enjoyable to see a double chin in photographs. That little flap of skin beneath your jaw has the power to change the look of your whole face. While weight gain is often cited as the reason behind a double chin, there are lots of other factors to consider. Genetics, posture, skin aging, and even how we hold our phones can all play a role.</p>\r\n\r\n<p>If you have ever typed the words &ldquo;how can I get rid of double chin naturally&rdquo; into your search engine, you are not alone. This blog is going to provide you with some simple, straightforward home solutions and habits that do not involve any fancy gadgets or circumvention. Let&rsquo;s go!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>What Causes a Double Chin?</h3>\r\n\r\n<p>Double chins are surprisingly common, and they can show up even if you&rsquo;re not overweight. Here&#39;s why:</p>\r\n\r\n<ul>\r\n	<li><strong>Extra Fat:&nbsp;</strong>Just like belly fat or love handles, the area under your chin stores fat, too.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Weak Muscles:</strong>&nbsp;If your jaw and neck muscles aren&rsquo;t getting much action, the skin can start to sag.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Aging:&nbsp;</strong>As we age, our skin loses elasticity and collagen, leading to looser skin.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Genetics:&nbsp;</strong>If your parents had it, chances are you might too.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Poor Posture:</strong>&nbsp;Tech neck is real; constantly looking down can weaken the muscles that support your chin.</li>\r\n</ul>\r\n\r\n<p>So when you ask yourself, &ldquo;How to reduce double chin?&rdquo;, know that it&rsquo;s a mix of small changes done consistently over time.</p>\r\n\r\n<h3>Home Remedies to Reduce Double Chin</h3>\r\n\r\n<p>You don&rsquo;t need an expensive serum to start improving your chin area. Here are a few gentle, natural fixes that can help:</p>\r\n\r\n<p>1. Glycerin + Epsom Salt Mask</p>\r\n\r\n<p>Combine a spoonful of glycerin with half a spoon of Epsom salt and a few drops of peppermint oil. Dab this on under your chin, wait 20-30 minutes, and rinse.</p>\r\n\r\n<p>Why it helps:&nbsp;This could help with the bloating and puffiness while making your skin feel firmer.</p>\r\n\r\n<p>2. Green Tea</p>\r\n\r\n<p>Get into the habit of drinking green tea in the morning.</p>\r\n\r\n<p>Why it helps:&nbsp;Green tea boosts metabolism, helps with fat loss, and areas like the chin are included.</p>\r\n\r\n<p>3. Egg White Mask</p>\r\n\r\n<p>Whisk together two egg whites with a spoonful of milk, a bit of honey, and a few drops of lemon juice. Apply it and wait for it to tighten and rinse.</p>\r\n\r\n<p>Why it helps:&nbsp;Egg whites can tighten the skin temporarily, and you will see improvement in texture with continuous use.</p>\r\n\r\n<p>4. Oil Massage</p>\r\n\r\n<p>Daily, massage wheat germ oil or cocoa butter (or both) on your jawline. Use upward strokes for a few minutes each day.</p>\r\n\r\n<p>Why it helps:&nbsp;Massaging will help with circulation, and over time, it will help firm up the skin slowly.</p>\r\n\r\n<p>These home remedies for double chin won&rsquo;t give you overnight results, but with regular use, they can absolutely make a difference.</p>\r\n\r\n<h3>Exercises &amp; Daily Habits to Support Results</h3>\r\n\r\n<p>Want to take it a step further? Add in these simple movements and daily tweaks:</p>\r\n\r\n<p>Facial Exercises</p>\r\n\r\n<ul>\r\n	<li><strong>Chin Lifts:</strong>&nbsp;Look up, pucker your lips like you&#39;re kissing the ceiling. Hold, then release.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Neck Rolls:</strong>&nbsp;Slow, circular neck rolls loosen up tension and engage the muscles.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Tongue Stretch:&nbsp;</strong>Try touching your nose with your tongue (even if you can&#39;t, it&#39;s a fun workout!).</li>\r\n</ul>\r\n\r\n<p>Everyday Habits That Help</p>\r\n\r\n<ul>\r\n	<li><strong>Fix Your Posture:&nbsp;</strong>Sit tall, shoulders back, chin up. It sounds basic, but it works wonders.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Stay Hydrated:</strong>&nbsp;Drinking enough water keeps skin firm and supports fat metabolism.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Mind Your Diet:&nbsp;</strong>Limit sugary and processed foods that can lead to fat buildup.</li>\r\n</ul>\r\n\r\n<p>If you&#39;re serious about how to eliminate double chin naturally, these small steps, repeated daily, can make a big difference.</p>', 'active', '2025-07-09 20:56:16', '2025-07-09 20:56:16');

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
('akash@gmail.com|127.0.0.1', 'i:1;', 1752130333),
('akash@gmail.com|127.0.0.1:timer', 'i:1752130333;', 1752130333);

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
-- Table structure for table `career_doctor`
--

CREATE TABLE `career_doctor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_profile` varchar(255) NOT NULL,
  `speciality` varchar(255) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `job_description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career_doctor`
--

INSERT INTO `career_doctor` (`id`, `job_profile`, `speciality`, `experience`, `location`, `job_description`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Aesthetic Consultant', 'Client Counseling & Non-surgical Aesthetics', '2-4 Years', 'Bangalore', 'Looking for an Aesthetic Consultant who can guide clients on skincare and non-invasive procedures such as chemical peels, PRP, and HydraFacial. Your role is to educate clients, design custom plans, and ensure high satisfaction. Salary: ₹6-8 LPA. Our clinic culture emphasizes personalized care, team bonding, and constant upskilling through workshops and certified training. A great opportunity to grow with the latest in beauty science.', 'active', '2025-07-11 09:04:25', '2025-07-11 09:04:25'),
(6, 'Senior Dermatologist', 'Aesthetic & Cosmetic Dermatology', '5+ Years', 'Delhi', 'We are looking for a Senior Dermatologist with deep expertise in aesthetic and cosmetic treatments like Botox, fillers, and laser procedures. Responsibilities include patient consultations, treatment planning, and overseeing junior staff. Expected salary is ₹15-20 LPA. The clinic promotes a collaborative work culture focused on excellence in patient care, innovation, and ongoing training. You’ll work with state-of-the-art equipment in a highly supportive team environment.', 'active', '2025-07-11 09:04:45', '2025-07-11 09:04:45'),
(7, 'Cosmetic Surgeon', 'Facial & Body Surgery', '3-5 Years', 'Mumbai', 'Join our advanced aesthetic center as a Cosmetic Surgeon. The role includes performing procedures like rhinoplasty, liposuction, and facelifts. You’ll consult with clients, ensure surgical safety, and maintain post-op care. Salary ranges from ₹12-18 LPA. Our workplace encourages precision, patient satisfaction, and ethical practices. You’ll be part of a dedicated team committed to transforming lives with artistic surgical finesse and compassionate service.', 'active', '2025-07-11 09:04:59', '2025-07-11 09:04:59'),
(8, 'Junior Skin Therapist', 'Laser & Acne Treatment', '1-2 Years', 'Noida', 'We are hiring a Junior Skin Therapist to assist in laser treatments, acne management, and skin rejuvenation therapies. Responsibilities include preparing clients, handling devices, and maintaining hygiene protocols. Starting salary is ₹3-5 LPA with performance incentives. Our team fosters a friendly, learning-driven environment where junior staff are mentored by senior dermatologists. We value professionalism, empathy, and continuous learning.', 'active', '2025-07-11 09:05:12', '2025-07-11 09:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_details`
--

CREATE TABLE `doctor_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `dr_name` varchar(255) DEFAULT NULL,
  `dr_introduction` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `speciality` varchar(255) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_details`
--

INSERT INTO `doctor_details` (`id`, `image`, `dr_name`, `dr_introduction`, `phone`, `email`, `speciality`, `experience`, `degree`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sHjtBQNlE5ELzOZo0MqsjZ3EigzirCA1VtbIwMtB.jpg', 'Dr. Malissa Fierro', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.</p>\r\n\r\n<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '1122334455', 'Malissa@gmail.com', 'Cardiology Specialist', '15 Years', 'MD. of Cardiology', 'inactive', '2025-07-10 00:01:39', '2025-07-14 03:58:20'),
(2, 'ZVHUYnKg5YQwkRQNpN12cAfeRABAsJ3p1PnishlN.jpg', 'Dr. Aisha Mehra', 'Dr. Aisha Mehra is a dedicated dermatologist with over 10 years of experience in treating various skin conditions and promoting skin health. She combines modern dermatology techniques with compassionate care.', '9876543210', 'aisha.mehra@example.com', 'Dermatologist', '10 Years', 'MD. in Dermatology', 'active', '2025-07-14 09:12:01', '2025-07-17 00:05:32'),
(3, '5JIt7VRP1Qlox6s72MTUUBhDktFPqNC84lJX77p6.jpg', 'Dr. Rohan Kapoor', 'With a strong foundation in cardiology, Dr. Kapoor has successfully handled over 200 cardiac surgeries. He is known for his detailed diagnosis and calm demeanor.', '9876501234', 'rohan.kapoor@example.com', 'Cardiology Specialist', '12 Years', 'MD. of Cardiology', 'active', '2025-07-14 09:12:01', '2025-07-14 03:56:16'),
(4, 'e7nRmEvukuyL36zstP5eINHT8RLGHpjApJrG4zSM.jpg', 'Dr. Sneha Iyer', 'Dr. Sneha is a renowned cosmetic dermatologist who focuses on advanced skincare solutions. Her mission is to help patients regain confidence through clear and healthy skin.', '9123456780', 'sneha.iyer@example.com', 'Cosmetic Dermatologist', '8 Years', 'MD. in Cosmetology', 'active', '2025-07-14 09:12:01', '2025-07-14 03:56:23'),
(5, 'ZXCD07UFkyAkc8qYoPHaXEIF9ZTcvg7oHVc7DtXl.jpg', 'Dr. Rajeev Nair', 'Dr. Nair is a seasoned orthopedic specialist known for non-invasive and surgical treatments of bone and joint disorders. His practice emphasizes long-term wellness.', '9234567810', 'rajeev.nair@example.com', 'Orthopedic Specialist', '15 Years', 'MS. in Orthopedics', 'active', '2025-07-14 09:12:01', '2025-07-14 03:56:43'),
(6, '0fVN9O97UTBdewZNM90To1UnOCp2ZEOzoBokj6Ax.jpg', 'Dr. Fatima Sheikh', 'Specializing in pediatric dermatology, Dr. Sheikh treats children with skin, hair, and nail conditions. Her friendly nature ensures young patients feel at ease.', '9988776655', 'fatima.sheikh@example.com', 'Pediatric Dermatologist', '9 Years', 'MD. Pediatrics (Skin)', 'active', '2025-07-14 09:12:01', '2025-07-14 03:56:51'),
(7, '0PEpmoVV8Dh8WW0ypepbOrBJXBikYd25wAzhZxUr.jpg', 'Dr. Vikram Desai', 'With a dual degree in internal medicine and endocrinology, Dr. Desai manages complex hormonal and metabolic disorders with great success.', '9090909090', 'vikram.desai@example.com', 'Endocrinologist', '11 Years', 'MD. Internal Medicine, DM Endocrinology', 'active', '2025-07-14 09:12:01', '2025-07-14 03:56:58'),
(8, '97FCe8PITNNyjuRQQJLQ4yze6u5U03vMgnyRzqW3.jpg', 'Dr. Meenakshi Rao', 'Dr. Rao’s gentle approach and clinical precision make her one of the top gynecologists in the region. She is dedicated to promoting women’s health at all stages of life.', '9012345678', 'meenakshi.rao@example.com', 'Gynecologist', '13 Years', 'MS. Obstetrics & Gynecology', 'active', '2025-07-14 09:12:01', '2025-07-14 03:57:05'),
(9, 'IBpVORF4BM7NYWHpk4H9i40CzhwfWubx4HvigCaf.jpg', 'Dr. Arjun Verma', 'A consultant neurologist, Dr. Verma has vast experience dealing with brain and nervous system disorders. His patient-centric practice is built on clarity and compassion.', '9087654321', 'arjun.verma@example.com', 'Neurologist', '14 Years', 'DM. Neurology', 'active', '2025-07-14 09:12:01', '2025-07-14 03:57:12');

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
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Men', '2025-07-05 10:31:54', '2025-07-05 10:31:54'),
(2, 'Women', '2025-07-05 10:31:54', '2025-07-05 10:31:54');

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

--
-- Dumping data for table `mid_categories`
--

INSERT INTO `mid_categories` (`id`, `top_category_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Unwanted Hair', '1752558339_6875eb0399135.png', '2025-07-08 07:13:17', '2025-07-15 00:15:39'),
(2, 1, 'Hair Fall', '1752562436_6875fb0405962.png', '2025-07-08 07:13:17', '2025-07-15 01:23:56'),
(3, 1, 'Stubborn Fat', '1752562532_6875fb64e6e81.png', '2025-07-08 07:13:17', '2025-07-15 01:25:32'),
(4, 1, 'Dull Skin', '1752562664_6875fbe8d38bb.png', '2025-07-08 07:13:17', '2025-07-15 01:27:44'),
(5, 1, 'Acne', '1751960446_686ccb7ef144e.png', '2025-07-08 07:13:17', '2025-07-08 02:10:46'),
(14, 2, 'Hair Reduction', '1751961209_686cce795dab6.jpg', '2025-07-08 07:13:17', '2025-07-16 11:18:55'),
(15, 2, 'Body Slimming', '1751961218_686cce822b9b7.jpg', '2025-07-08 07:13:17', '2025-07-08 02:23:38'),
(16, 2, 'Laser Facials', '1751961234_686cce9268efb.jpg', '2025-07-08 07:13:17', '2025-07-08 02:23:54'),
(17, 3, 'Unwanted Hair', '1751959920_686cc970eded2.png', '2025-07-08 07:15:23', '2025-07-08 02:02:00'),
(19, 3, 'Stubborn Fat', '1751960120_686cca38bd3c3.png', '2025-07-08 07:15:23', '2025-07-08 02:05:20'),
(20, 3, 'Dull Skin', '1752563360_6875fea067a04.png', '2025-07-08 07:15:23', '2025-07-15 01:39:20'),
(21, 3, 'Acne', '1752563396_6875fec4cf0be.png', '2025-07-08 07:15:23', '2025-07-15 01:39:56'),
(23, 3, 'Tanning', '1751960104_686cca28d1ec2.png', '2025-07-08 07:15:23', '2025-07-08 02:05:04'),
(26, 3, 'Pigmentation', '1752563255_6875fe378f9f3.png', '2025-07-08 07:15:23', '2025-07-15 01:37:35'),
(30, 4, 'Hair Reduction', '1751960016_686cc9d091ec0.webp', '2025-07-08 07:15:23', '2025-07-08 02:03:36'),
(31, 4, 'Body Slimming', '1751959005_686cc5dda954f.webp', '2025-07-08 07:15:23', '2025-07-08 01:46:45'),
(32, 4, 'Laser Facials', '1751959998_686cc9beddbff.webp', '2025-07-08 07:15:23', '2025-07-08 02:03:18');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `package_type` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `package_image` varchar(255) DEFAULT NULL,
  `original_price` decimal(10,2) DEFAULT NULL,
  `discounted_price` decimal(10,2) DEFAULT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_type`, `title`, `package_image`, `original_price`, `discounted_price`, `features`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Fixed Package', 'Hair Free Care Free Skin', 'packages/d3fTX4ymVVgfOhAtwGqgn1jXFdvEKyVn0z0CERAU.png', 70800.00, 51000.00, '[\"Full Body Laser Hair Reduction - Female (6 sessions)\", \"Full Body Laser Hair Reduction - Male (6 sessions)\"]', 'active', '2025-07-14 07:48:18', '2025-07-14 03:13:55'),
(6, 'Fixed Package', 'Say Hello to Stronger Hair - Male', 'packages/00c3uBUUudNAQt3c79knomUAAPnSzBJngR9BaxUV.png', 30600.00, 24000.00, '[\"VitHair Trichology - Male (3 sessions)\", \"Hair PRP - Male (3 sessions)\"]', 'active', '2025-07-14 07:48:18', '2025-07-14 03:14:30'),
(7, 'Fixed Package', 'Say Hello to Stronger Hair - Female', 'packages/cDUNjKceOHwWy4oZ8KavPdFCpKg2fR45QIPvRvuQ.png', 30600.00, 24000.00, '[\"VitHair Trichology - Female (3 sessions)\", \"Hair PRP - Female (3 sessions)\"]', 'active', '2025-07-14 07:48:18', '2025-07-14 03:14:47'),
(8, 'Fixed Package', 'Ultimate body slimming package - Male', 'packages/OpU5xZPPE8E2LLykzDuoq8gFJoeRPv3Gw2xoXMMa.png', 102560.00, 70000.00, '[\"Upper Body Slimming (Arms, Love Handles, Abdomen) - Male (6 sessions)\", \"Lower Body Slimming (Hips and Thighs) - Male (6 sessions)\", \"Fat Burn Injections - Male (4 sessions)\"]', 'active', '2025-07-14 07:48:18', '2025-07-14 03:14:37'),
(9, 'Fixed Package', 'Ultimate body slimming package - Female', 'packages/iP9rg6IUXcuusDWHVCBC0l6arWLPLH8nX0F8fQwH.png', 102560.00, 70000.00, '[\"Upper Body Slimming (Arms, Love Handles, Abdomen) - Female (6 sessions)\", \"Lower Body Slimming (Hips and Thighs) - Female (6 sessions)\", \"Fat Burn Injections - Female (4 sessions)\"]', 'active', '2025-07-14 07:48:18', '2025-07-14 03:14:53'),
(10, 'Fixed Package', 'Smooth skin & Hair rejuvenation - Male', 'packages/F6NnDvzmb1yzuzwJ5pKwa2wCoJ6QWQWNtzmj3uJ0.png', 88525.00, 58000.00, '[\"Full Body Laser Hair Reduction - Male (6 sessions)\", \"Hair PRP - Male (3 sessions)\", \"Face GFC Treatment - Male (4 sessions)\"]', 'active', '2025-07-14 07:48:18', '2025-07-14 03:14:42');

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
  `how_it_works` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`how_it_works`)),
  `faqs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `action` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `mid_category_id`, `name`, `image`, `video`, `rating`, `price`, `duration`, `highlight_points`, `overview`, `how_it_works`, `faqs`, `action`, `created_at`, `updated_at`) VALUES
(1, 1, 'Full Body Laser Hair Reduction', 'UYsburs75P3QWcz5pDRkkVPg5cWm95QFuwSuU1Uf.png', NULL, 4.1, 7080.00, '180', '<p>80-90% reduction in hair growth over 6+ sessions</p>\r\n\r\n<p>US FDA-approved, painless, and safe technology</p>', '<p>Unwanted hair is bothersome and tedious to remove</p>\r\n\r\n<p>Frequent shaving or waxing can lead to ingrown hair, pigmentation, and other skin issues</p>\r\n\r\n<p>Fortunately, we provide permanent solutions to address all your hair removal concerns</p>\r\n\r\n<p>This treatment covers the entire body except for sensitive parts like ears, eyebrows, and inner butt-line hair for safety reasons.</p>\r\n\r\n<p>Aftercare Tips</p>\r\n\r\n<p>Redness &amp; Bumps are normal, these may last up to 2 hours or longer. If sensitivity persists use a cold compress</p>\r\n\r\n<p>Avoid soap and face wash. The treated area must be washed gently with cold or lukewarm water, pat skin dry instead of rubbing for the first 48 hours</p>\r\n\r\n<p>Avoid makeup &amp; lotion, moisturizer, or deodorant&nbsp;for the initial 24 hours</p>\r\n\r\n<p>Dead hair will start shedding 2-30 days after your treatment. Within this timeframe, you may notice stubble as dead hair is shed from the follicles</p>\r\n\r\n<p>Use sunscreen with SPF 25 or higher throughout the treatment period &amp; for 1-2 months afterward to protect skin from harsh UV rays</p>\r\n\r\n<p>Avoid sweating activities such as sauna baths, workouts, swimming for up to 48 hours post treatment</p>', '[{\"title\":\"s dcnksdnlvn sld\",\"image\":null},{\"title\":\"zxck nkjsdncjoj\",\"image\":null},{\"title\":\"kjxnc vlknlskdp\",\"image\":null}]', '[{\"question\":\"What is Laser Hair Reduction\",\"answer\":\"Lasers can only reduce hair growth, they cannot eliminate hair entirely. You can expect an 80- 90% reduction in growth over 6 or more sessions depending on your body, medical history, and hormones. You might need subsequent maintenance sessions\"},{\"question\":\"dasd\",\"answer\":\"sadasd\"},{\"question\":\"What is Laser Hair Reduction\",\"answer\":\"Lasers can only reduce hair growth,\"}]', 'active', '2025-07-05 06:08:02', '2025-07-15 06:19:53'),
(2, 1, 'Full Arms Laser Hair Reduction', '1pByPBRzZwVluUbiEkbtIWwKiD0nDg5u9W4nYs75.png', NULL, 4.7, 3975.00, '60', '<p>80-90% reduction in hair growth&nbsp;over 6+ sessions</p>\r\n\r\n<p>US FDA-approved, painless, and safe technology</p>', '<p>Unwanted hair is bothersome and tedious to remove</p>\r\n\r\n<p>Frequent shaving or waxing can lead to ingrown hair, pigmentation, and other skin issues</p>\r\n\r\n<p>Fortunately, we provide permanent solutions to address all your hair removal concerns</p>\r\n\r\n<p>Aftercare Tips</p>\r\n\r\n<p>Redness &amp; Bumps are normal, these may last up to 2 hours or longer. If sensitivity persists use a cold compress</p>\r\n\r\n<p>Avoid soap and face wash. The treated area must be washed gently with cold or lukewarm water, pat skin dry instead of rubbing for the first 48 hours</p>\r\n\r\n<p>Avoid makeup &amp; lotion, moisturizer, or deodorant&nbsp;for the initial 24 hours</p>\r\n\r\n<p>Dead hair will start shedding 2-30 days after your treatment. Within this timeframe, you may notice stubble as dead hair is shed from the follicles</p>\r\n\r\n<p>Use sunscreen with SPF 25 or higher throughout the treatment period &amp; for 1-2 months afterward to protect skin from harsh UV rays</p>\r\n\r\n<p>Avoid sweating activities such as sauna baths, workouts, swimming for up to 48 hours post treatment</p>', '[{\"title\":\"Area is marked, cleansed and shaved\",\"image\":null},{\"title\":\"ECG gel is applied to protect the skin\",\"image\":null},{\"title\":\"Laser shots target the hair follicles\",\"image\":null}]', '[{\"question\":\"What is Laser Hair Reduction\",\"answer\":\"Lasers can only reduce hair growth, they cannot eliminate hair entirely. You can expect an 80- 90% reduction in growth over 6 or more sessions depending on your body, medical history, and hormones. You might need subsequent maintenance sessions\"},{\"question\":\"What is the key factor for achieving results\",\"answer\":\"For optimal results, lasers target the melanin in pigmented hair follicles to arrest growth, the treatment is ineffective on white or gray hair. Individuals of all skin types can undergo treatment although best outcomes are achieved when there is a notable contrast between hair and skin color\"},{\"question\":\"Under what circumstances should the treatment be avoided\",\"answer\":\"Avoid the treatment in case you have body implants\"}]', 'active', '2025-07-15 06:19:04', '2025-07-16 05:44:55'),
(3, 26, 'Derma Revive Facial', 'pVp0DCzEqh4uddHbfHC1ClwgwwRy0krn3QAMtWkw.png', NULL, 4.7, 5500.00, '90', '<p>10-step treatment using <strong>Q-switched laser</strong> and <strong>ultrasound therapy</strong></p>\r\n\r\n<p>Targets <strong>uneven skin tone, pigmentation, and melasma</strong></p>', '<p>Say goodbye to melasma and pigmentation with this facial.</p>\r\n\r\n<p>It combines the power of a Q-switched laser, ultrasound, and LED technologies.</p>\r\n\r\n<p>Key benefits include oil control, reduces pigmentation, promotes intensive skin revival, removes dead skin, evens skin tone, reduces tanning, and stimulates collagen</p>\r\n\r\n<p>Aftercare Tips</p>\r\n\r\n<p>Do not use any generic Tretinoin or Retin-A till at least 48 hours</p>\r\n\r\n<p>Do not use any exfoliating treatments for at least 48 hours before and after</p>\r\n\r\n<p>Do not wax for at least 48 hours before and after</p>\r\n\r\n<p>Avoid excessive sun exposure before and after and wear sunscreen and moisturizer for at least 48 hours after the treatment</p>\r\n\r\n<p>Do not shave your face on the day of your facial</p>\r\n\r\n<p>Wait one day after the treatment to apply makeup</p>\r\n\r\n<p>Avoid exposure to heat or sweat-promoting activities (gym, sauna, etc.) for 24 hours</p>\r\n\r\n<p>Keep your skin hydrated by drinking plenty of water throughout the day</p>', '[{\"title\":\"The skin is prepped by cleansing followed by pressure point massage\",\"image\":\"cbYVBaRPKBACZKWqhCL3JzLR6j9BB2goUENWziVZ.jpg\"},{\"title\":\"Application of a carbon peel followed by laser shot removal effectively targets dead skin and open pores\",\"image\":\"SXww2xJKUeOEhFFl6qLNBEXON47081bbCNEHuLJY.jpg\"},{\"title\":\"Laser toning to effectively treat pigmentation and tanning\",\"image\":\"t5idagChMKyUsf8oAbBQ3PlDJBPGnqOOMRN6qD1K.jpg\"},{\"title\":\"Boost blood circulation and collagen production with ultrasonic therapy\",\"image\":\"piWlKQdtPpa9tJNdp6yw83RMkDsDMHkI6jnSZagB.jpg\"},{\"title\":\"Concluded with sunscreen for protection.If skin is oily papaya mask is added to control oil production\",\"image\":\"fQM0Johqs6lyymFVd71MLp3v3suCMVk74a2sJWrv.jpg\"}]', '[{\"question\":\"Should I use any cosmetics or make-up before my session?\",\"answer\":\"Avoid Using any cosmetics, creams, or make-up before your session\"},{\"question\":\"How long should I avoid chemical peels or aesthetic treatments before the treatment?\",\"answer\":\"Avoid chemical peels or aesthetic treatments for at least 15 days before your treatment\"},{\"question\":\"Are there any conditions or situations where the treatment should be avoided\",\"answer\":\"Avoid treatment if you are pregnant or lactating, individuals with body implants, severe medical conditions, or if you\\u2019ve undergone recent surgery. Consult our experts if you have any medical conditions or medical history.\"},{\"question\":\"Is the facial treatment painless?\",\"answer\":\"The facial treatment is generally painless, but you may experience pricking sensations at times.\"},{\"question\":\"- Can I combine the treatment with chemical peels for better results?\",\"answer\":\"For best results with issues like acne marks, pigmentation, etc., combining the treatment with suitable chemical peels is recommended\"}]', 'active', '2025-07-16 01:59:47', '2025-07-16 02:02:34'),
(4, 21, 'Acne Arrestor Facial with Salicylic Peel', 'PuwPzHlL5hqqraVrffNwcYxuK9PTT8LZCOj32w93.png', NULL, 4.8, 5500.00, '60', '<p>Targets <strong>acne and acne scars</strong></p>\r\n\r\n<p>Controls excess <strong>oil production</strong></p>', '<p>This facial offers an effective solution for acne-prone skin.</p>\r\n\r\n<p>With laser technology, inflammation is reduced, acne-causing bacteria are eliminated, and collagen production is stimulated, leading to improved skin appearance.</p>\r\n\r\n<p>Key benefits include treating acne, acne marks, reduces inflammation, improves overall skin texture and blood circulation</p>\r\n\r\n<p>Aftercare Tips</p>\r\n\r\n<p>Do not use any generic Tretinoin or Retin-A till at least 48 hours</p>\r\n\r\n<p>Do not use any exfoliating treatments for at least 48 hours before and after</p>\r\n\r\n<p>Do not wax for at least 48 hours before and after</p>\r\n\r\n<p>Avoid excessive sun exposure before and after and wear sunscreen and moisturizer for at least 48 hours after the treatment</p>\r\n\r\n<p>Do not shave your face on the day of your facial</p>\r\n\r\n<p>Wait one day after the treatment to apply makeup</p>\r\n\r\n<p>Avoid exposure to heat or sweat-promoting activities (gym, sauna, etc.) for 24 hours</p>\r\n\r\n<p>Keep your skin hydrated by drinking plenty of water throughout the day</p>', '[{\"title\":\"Cleansing removes dirt, and oil on the skin\",\"image\":\"dydtFDOl4mxD5q7XCJALShHHr2w3uBPIiihXuVco.jpg\"},{\"title\":\"Pressure point massage for relaxation\",\"image\":\"iNOk6kLn2GsgkOy3zzKFd3efoM5RBa7i0tdmrEat.jpg\"},{\"title\":\"Vaseline application to protect sensitive areas\",\"image\":\"3MJ3EJCPlJoQoIR37NcilLnRRAMHVsZC7wI1f6oX.jpg\"},{\"title\":\"Salcylic Peel reduces acne , makes skin smooth and glowing\",\"image\":\"KpQPobyeARPWB5WpHhe2NDMIjQoOKVAiziEBim59.jpg\"}]', '[{\"question\":\"Should I use any cosmetics or make-up before my session?\",\"answer\":\"Avoid Using any cosmetics, creams, or make-up before your session\"},{\"question\":\"How long should I avoid chemical peels or aesthetic treatments before the treatment?\",\"answer\":\"Avoid chemical peels or aesthetic treatments for at least 15 days before your treatment\"},{\"question\":\"Are there any conditions or situations where the treatment should be avoided?\",\"answer\":\"Avoid treatment if you are individuals with body implants, severe medical conditions, or if you\\u2019ve undergone recent surgery. Consult our experts if you have any medical conditions or medical history.\"},{\"question\":\"How soon will I notice instant radiance after the treatment?\",\"answer\":\"The instant radiance you see after the treatment may vary depending on your skin type. You can expect a noticeable improvement in your skin 24-48 hours after the treatment\"}]', 'active', '2025-07-16 02:11:03', '2025-07-16 02:11:03'),
(5, 19, 'Slimming Facial', 'T7SEXRsk09eT3bweuR8YF44FhMdx2L0UNOs1ZC3m.png', NULL, 4.8, 4500.00, '60', '<p>Reduce double chin and facial flab</p>\r\n\r\n<p>Lifts and shapes up the face</p>', '<p>Get a tight, sleek and well-defined face through our slimming facial</p>\r\n\r\n<p>Our treatment helps in reducing double chin and defining the jawline</p>\r\n\r\n<p>Aftercare Tips</p>\r\n\r\n<p>Please avoid consuming heavy calories to maintain the outcomes of the session</p>\r\n\r\n<p>It is recommended to drink plenty of water on the day of treatment both before &amp; after</p>\r\n\r\n<p>Incorporating additional workouts can further accelerate your BMR and aid weight reduction</p>\r\n\r\n<p>Feeling bloated after the treatment is normal, and this condition typically subsides within a couple of days</p>\r\n\r\n<p>Sign up for the package to benefit from dietician support.</p>', '[{\"title\":\"A session involves a combination of multiple non-invasive technologies.First, an equipment massage is performed followed by slimming oil massage\",\"image\":\"6lr3ZO6mmM4IBvI2cDBsezNBmX1ScwaAle42vd05.jpg\"},{\"title\":\"Then, radio frequency is performed to tighten skin\",\"image\":\"KZGAfUMMEKfhVVLjxHPPrc1S3LgQZchOjuQ0JTp5.jpg\"},{\"title\":\"Finally, heat therapy and electric muscle stimulation are used to accelerated basal metabolic rate\",\"image\":\"aXPnVCS89jVqsrX9CDpNcTvfTJ41LC0GIy7cZe2n.jpg\"}]', '[{\"question\":\"What factors will influence the outcomes of the results\",\"answer\":\"Outcomes are influenced by factors such as the body\\u2019s water retention, lifestyle, diet, and medical conditions, which differs from person to person.\"},{\"question\":\"Do I need to diet while undergoing the treatment\",\"answer\":\"Calorie management is essential post treatment; it is your responsibility to maintain the results. It is important to avoid high calorie intake.\"},{\"question\":\"Is the procedure safe\",\"answer\":\"Our non-invasive procedure is 100% safe, using US-FDA approved equipment, without cutting, injecting or any downtime\"},{\"question\":\"How many sessions will be required to achieve results\",\"answer\":\"To achieve a stable and significant weight, we recommend signing up for the full package of 6+ sessions\"},{\"question\":\"What additional support is offered to those who sign up for the package\",\"answer\":\"If you sign up for the package, you will receive dietician support to help you achieve faster outcomes\"}]', 'active', '2025-07-16 02:20:04', '2025-07-16 02:20:04'),
(6, 30, 'Lower Face Laser Hair Reduction', 'q6Bsf07xVe64CiFhnPYUEu59KpOnHisdfNKRoyHj.png', NULL, 4.8, 3150.00, '60', '<p>No more oohs &amp; aahs during facial threading or waxing</p>\r\n\r\n<p>Includes cheeks, sidelocks, upper lips, chin, lower chin, jawline and upper neck.</p>', '<p>Unwanted hair is bothersome and tedious to remove</p>\r\n\r\n<p>Frequent shaving or waxing can lead to ingrown hair, pigmentation, and other skin issues</p>\r\n\r\n<p>Fortunately, we provide permanent solutions to address all your hair removal concerns</p>\r\n\r\n<p>Aftercare Tips</p>\r\n\r\n<p>Redness &amp; Bumps are normal, these may last up to 2 hours or longer. If sensitivity persists use a cold compress</p>\r\n\r\n<p>Avoid soap and face wash. The treated area must be washed gently with cold or lukewarm water, pat skin dry instead of rubbing for the first 48 hours</p>\r\n\r\n<p>Avoid makeup &amp; lotion, moisturizer, or deodorant&nbsp;for the initial 24 hours</p>\r\n\r\n<p>Dead hair will start shedding 2-30 days after your treatment. Within this timeframe, you may notice stubble as dead hair is shed from the follicles</p>\r\n\r\n<p>Use sunscreen with SPF 25 or higher throughout the treatment period &amp; for 1-2 months afterward to protect skin from harsh UV rays</p>\r\n\r\n<p>Avoid sweating activities such as sauna baths, workouts, swimming for up to 48 hours post treatment</p>', '[{\"title\":\"Area is marked, cleansed and shaved\",\"image\":null},{\"title\":\"ECG gel is applied to protect the skin\",\"image\":null},{\"title\":\"Laser shots target the hair follicles\",\"image\":null},{\"title\":\"Sunscreen is applied post treatment for protection\",\"image\":null}]', '[{\"question\":\"What is Laser Hair Reduction\",\"answer\":\"Lasers can only reduce hair growth, they cannot eliminate hair entirely. You can expect an 80- 90% reduction in growth over 6 or more sessions depending on your body, medical history, and hormones. You might need subsequent maintenance sessions\"},{\"question\":\"What is the key factor for achieving results\",\"answer\":\"For optimal results, lasers target the melanin in pigmented hair follicles to arrest growth, the treatment is ineffective on white or gray hair. Individuals of all skin types can undergo treatment although best outcomes are achieved when there is a notable contrast between hair and skin color\"},{\"question\":\"Under what circumstances should the treatment be avoided\",\"answer\":\"Avoid the treatment in case you are pregnant, have body implants, or menstruating\"},{\"question\":\"Is the treatment painful\",\"answer\":\"We offer treatment with painless diode technology. However, you might feel pricks on a few occasions during the treatment which will be more amplified in pigmented areas\"}]', 'active', '2025-07-16 02:25:46', '2025-07-16 04:02:01'),
(7, 15, 'Love Handles Inch Loss', '7DdG6XcTZJmF0Fn3uNWsFfOFcSOkHsEkB9ZMBflc.png', NULL, 4.8, 4050.00, '120', '<p>Up to 0.5 - 1 inch loss in a single session</p>\r\n\r\n<p>Targets weight, inch as well as bulging sides</p>\r\n\r\n<p>100%&nbsp;safe US-FDA approved</p>', '<p>Struggling with the extra pockets of flab in the lower sides of your torso that are not so easy to handle?</p>\r\n\r\n<p>Our multi-technology regime helps you defeat this common foe in the most effective, safe and quick manner</p>\r\n\r\n<p>Aftercare Tips</p>\r\n\r\n<p>Avoid consuming heavy calories to maintain the outcomes of the session</p>\r\n\r\n<p>It is recommended to drink plenty of water on the day of treatment both before &amp; after</p>\r\n\r\n<p>Incorporating additional workouts can further accelerate your BMR and aid weight reduction</p>\r\n\r\n<p>Feeling bloated after the treatment is normal, and this condition typically subsides within a couple of days</p>\r\n\r\n<p>Sign up for the package to benefit from dietician support.</p>', '[{\"title\":\"A session involves a combination of multiple non-invasive technologies\",\"image\":\"17P4tMdenXdMTvVkydR3PooNfzyya2V0CQMtQqDA.jpg\"},{\"title\":\"First, an equipment massage is performed followed by slimming oil massage\",\"image\":\"GefrJE4T4SAO85d2WtbnbAilbvWtQXbt2YFUrNty.jpg\"},{\"title\":\"This is followed by ultrasonic cavitation to break down fat\",\"image\":\"Fwz67CVwciu70zBWykBJrVDzupEPQtQnu5AqJ58u.jpg\"},{\"title\":\"Then, radio frequency is performed to tighten skin\",\"image\":\"Ccj25f9fZblHnJ0AQ20b9JhtMKd6ADi6InvxpYUe.jpg\"},{\"title\":\"Finally, heat therapy and electric muscle stimulation are used to accelerated basal metabolic rate\",\"image\":\"f9nG8PLGaljY2IVAAkOladu9MeNGIRupzOFn45qb.jpg\"}]', '[{\"question\":\"What factors will influence the outcomes of the results\",\"answer\":\"Outcomes are influenced by factors such as the body\\u2019s water retention, lifestyle, diet, and medical conditions, which differs from person to person.\"},{\"question\":\"Do I need to diet while undergoing the treatment\",\"answer\":\"Calorie management is essential post treatment; it is your responsibility to maintain the results. It is important to avoid high calorie intake.\"},{\"question\":\"Is the procedure safe\",\"answer\":\"Our non-invasive procedure is 100% safe, using US-FDA approved equipment, without cutting, injecting or any downtime\"},{\"question\":\"- How many sessions will be required to achieve results\",\"answer\":\"To achieve a stable and significant weight, we recommend signing up for the full package of 6+ sessions\"},{\"question\":\"What additional support is offered to those who sign up for the package\",\"answer\":\"If you sign up for the package, you will receive dietician support to help you achieve faster outcomes\"},{\"question\":\"- How to prepare for the treatment\",\"answer\":\"Avoid having any liquids 1 hour before and solids 2 hours before the treatment. Avoid salt for up to 1 hour, opt of alternative foods like fruits, sugar-free tea, salads, etc\"}]', 'active', '2025-07-16 04:08:39', '2025-07-16 04:08:39'),
(8, 16, 'Hydration Boost Facial', 'UBmeIXcdGzUANeONrS3jZPAutxvDuK8zU9VACDUq.png', NULL, 4.7, 4050.00, '90', '<p>End-to-end skin cleansing, hydration, and rejuvenation</p>\r\n\r\n<p>Enhances blood circulation and replenishes skin nutrients</p>', '<p>This facial is for ultimate skin nourishment and is 10 times more effective than regular or physical facials</p>\r\n\r\n<p>Vitamin C and E penetration boost skin nutrition while providing deep hydration</p>\r\n\r\n<p>Key benefits include dead skin and white heads removal, improved blood circulation, tight skin, enhanced elastic production</p>\r\n\r\n<p>Aftercare Tips</p>\r\n\r\n<p>Do not use any generic Tretinoin or Retin-A till at least 48 hours</p>\r\n\r\n<p>Do not use any exfoliating treatments for at least 48 hours before and after</p>\r\n\r\n<p>Do not wax for at least 48 hours before and after</p>\r\n\r\n<p>Avoid excessive sun exposure before and after and wear sunscreen and moisturizer for at least 48 hours after the treatment</p>\r\n\r\n<p>Do not shave your face on the day of your facial</p>\r\n\r\n<p>Wait one day after the treatment to apply makeup</p>\r\n\r\n<p>Avoid exposure to heat or sweat-promoting activities (gym, sauna, etc.) for 24 hours</p>\r\n\r\n<p>Keep your skin hydrated by drinking plenty of water throughout the day</p>', '[{\"title\":\"Deep cleansing with water abrasion\",\"image\":\"n2OxzbPBN7pFAgIaDZfzDQYGqJFkzNuREZ8EpLw4.jpg\"},{\"title\":\"Enhance skin nutrition with vitamin C abrasion\",\"image\":\"D8CR0KhsZDRU7e39fDuiYJSdzD2AArcrnYZ2OgL6.jpg\"},{\"title\":\"Boost collagen production, lift, and tighten with radio frequency waves\",\"image\":\"bcxvWkAaThh63wO5JflSnR5HabF6RnaSpRwF17A2.jpg\"},{\"title\":\"Improve moisture penetration with vitamin E abrasion\",\"image\":\"8wQSFPd9JXiZNyHnAgLtQ4XfEVybXYQ1FqWhQPDp.jpg\"},{\"title\":\"Hydrating mask and LED therapy and for multiple skin benefits\",\"image\":\"ofAZyrr1sqCDWVt0GieeE9I1DiMQxpFxt6i31bL1.jpg\"}]', '[{\"question\":\"Should I use any cosmetics or make-up before my session?\",\"answer\":\"Avoid Using any cosmetics, creams, or make-up before your session\"},{\"question\":\"How long should I avoid chemical peels or aesthetic treatments before the treatment?\",\"answer\":\"Avoid chemical peels or aesthetic treatments for at least 15 days before your treatment\"},{\"question\":\"Are there any conditions or situations where the treatment should be avoided?\",\"answer\":\"Avoid treatment if you are individuals with body implants, severe medical conditions, or if you have undergone recent surgery. Consult our experts if you have any medical conditions or medical history.\"},{\"question\":\"Is the facial treatment painless?\",\"answer\":\"The facial treatment is generally painless, but you may experience pricking sensations at times.\"},{\"question\":\"How long will the treatment last\",\"answer\":\"Get a 45- day instant glow by following the after care tips. Notice improves signs on aging\"}]', 'active', '2025-07-16 04:16:37', '2025-07-16 04:16:37'),
(9, 32, 'Hydration Boost Facial', '4Rl1UrCjgjAJU8uSvqgAkigKdX9b5ldxv3cPjhbJ.jpg', NULL, 4.6, 4050.00, '90', '<p>End-to-end skin cleansing, hydration, and rejuvenation</p>\r\n\r\n<p>Enhances blood circulation and replenishes skin nutrients</p>\r\n\r\n<p>&nbsp;</p>', '<p>This facial is for ultimate skin nourishment and is 10 times more effective than regular or physical facials.</p>\r\n\r\n<p>Vitamin C and E penetration boost skin nutrition while providing deep hydration.</p>\r\n\r\n<p>Key benefits include dead skin and white heads removal, improved blood circulation, tight skin, enhanced elastic production</p>\r\n\r\n<p>Aftercare Tips</p>\r\n\r\n<p>Do not use any generic Tretinoin or Retin-A till at least 48 hours</p>\r\n\r\n<p>Do not use any exfoliating treatments for at least 48 hours before and after</p>\r\n\r\n<p>Do not wax for at least 48 hours before and after</p>\r\n\r\n<p>Avoid excessive sun exposure before and after and wear sunscreen and moisturizer for at least 48 hours after the treatment</p>\r\n\r\n<p>Do not shave your face on the day of your facial</p>\r\n\r\n<p>Wait one day after the treatment to apply makeup</p>\r\n\r\n<p>Avoid exposure to heat or sweat-promoting activities (gym, sauna, etc.) for 24 hours</p>\r\n\r\n<p>Keep your skin hydrated by drinking plenty of water throughout the day</p>', '[{\"title\":\"Deep cleansing with water abrasion\",\"image\":\"bwsqQrz06K0uEExnPYYJnbH7eyfTdP3c0nxpG5xx.webp\"},{\"title\":\"Enhance skin nutrition with vitamin C abrasion\",\"image\":\"F4oHOJCfuNPFwsqjeCuwcJTZExAlBb1Mcfwo1XHe.webp\"},{\"title\":\"Boost collagen production, lift, and tighten with radio frequency waves\",\"image\":\"c1BI9MlPGUkEOR5hIwTdoBAltAjWDIT6gow5hTwE.webp\"},{\"title\":\"Boost collagen production, lift, and tighten with radio frequency waves\",\"image\":\"FUykmUb1sQfPm6Gfex1r69WoWKTDP9g1KZ8iSl8G.webp\"},{\"title\":\"Improve moisture penetration with vitamin E abrasion\",\"image\":\"nTUctTlkDz2fp2EBZBN5ZjA83hjSMIFVu1H2r51G.webp\"},{\"title\":\"Relax the dermis again with a cool stamp\",\"image\":\"0h2EFnIsKWiGUEqqM59yJlknzEtYl5crYaheUzj2.webp\"},{\"title\":\"Hydration Mask and LED therapy for multiple skin benefits\",\"image\":\"H1gSkFUzvcjOjJu3aAQr8NsIlNHI84tB6YMM0rLt.webp\"},{\"title\":\"Concluded with sunscreen for protection\",\"image\":\"jReAdOTJvr4TWrFx6kySMIwTuDJw9jSGVQq722av.webp\"}]', '[{\"question\":\"Should I use any cosmetics or make-up before my session?\",\"answer\":\"Avoid Using any cosmetics, creams, or make-up before your session\"},{\"question\":\"How long should I avoid chemical peels or aesthetic treatments before the treatment?\",\"answer\":\"Avoid chemical peels or aesthetic treatments for at least 15 days before your treatment\"},{\"question\":\"Are there any conditions or situations where the treatment should be avoided?\",\"answer\":\"Avoid treatment if you are individuals with body implants, severe medical conditions, or if you\\u2019ve undergone recent surgery. Consult our experts if you have any medical conditions or medical history.\"},{\"question\":\"Is the facial treatment painless?\",\"answer\":\"The facial treatment is generally painless, but you may experience pricking sensations at times.\"},{\"question\":\"How soon will I notice instant radiance after the treatment?\",\"answer\":\"The instant radiance you see after the treatment may vary depending on your skin type. You can expect a noticeable improvement in your skin 24-48 hours after the treatment\"},{\"question\":\"How long will the treatment last\",\"answer\":\"Get a 45- day instant glow by following the after care tips. Notice improves signs on aging\"},{\"question\":\"Can I combine the treatment with chemical peels for better results?\",\"answer\":\"For best results combining the treatment with suitable chemical peels is recommended\"}]', 'active', '2025-07-16 04:38:03', '2025-07-16 04:38:03'),
(10, 5, 'Acne Arrestor Facial with Salicylic Peel', 'ksn2OlcGc7BKxpbbzfOVVRnMCflrpYfgmbvrBoxi.png', NULL, 4.9, 5500.00, '60', '<p>Reduces acne and acne scars</p>\r\n\r\n<p>Maintains oil balance and kills acne-producing bacteria</p>', '<p>This facial offers an effective solution for acne-prone skin.</p>\r\n\r\n<p>With laser technology, inflammation is reduced, acne-causing bacteria are eliminated, and collagen production is stimulated, leading to improved skin appearance.</p>\r\n\r\n<p>Key benefits include treating acne, acne marks, reduces inflammation, improves overall skin texture and blood circulation</p>\r\n\r\n<p>Aftercare Tips</p>\r\n\r\n<p>Do not use any generic Tretinoin or Retin-A till at least 48 hours</p>\r\n\r\n<p>Do not use any exfoliating treatments for at least 48 hours before and after</p>\r\n\r\n<p>Do not wax for at least 48 hours before and after</p>\r\n\r\n<p>Avoid excessive sun exposure before and after and wear sunscreen and moisturizer for at least 48 hours after the treatment</p>\r\n\r\n<p>Do not shave your face on the day of your facial</p>\r\n\r\n<p>Wait one day after the treatment to apply makeup</p>\r\n\r\n<p>Avoid exposure to heat or sweat-promoting activities (gym, sauna, etc.) for 24 hours</p>\r\n\r\n<p>Keep your skin hydrated by drinking plenty of water throughout the day</p>', '[{\"title\":\"Cleansing removes dirt, and oil on the skin\",\"image\":\"5pw3uwvvUJOaVFmwEoD1tOdtuyNFal3u6f5EvKkl.png\"},{\"title\":\"Pressure point massage for relaxation\",\"image\":\"CKYwBtwElKLON2lSNkh5wYx8XjSGdM48Pm1vfI8T.jpg\"},{\"title\":\"Vaseline application to protect sensitive areas\",\"image\":\"B9PxeEAcIfWPlOiWpVUvQ2WIQR3Nn0yhjMCwPaAV.jpg\"},{\"title\":\"Salcylic Peel reduces acne , makes skin smooth and glowing\",\"image\":\"rMLyeF3TJ1nqWUwhulrIaeMRvhmquDhE8tFN83tx.jpg\"},{\"title\":\"Comedones Extraction removes blackheads and whiteheads\",\"image\":\"BxCXQ8WHTK7GblcpQTAv8IMm6Wkzq6XoAEESFhho.jpg\"}]', '[{\"question\":\"Should I use any cosmetics or make-up before my session?\",\"answer\":\"Avoid Using any cosmetics, creams, or make-up before your session\"},{\"question\":\"How long should I avoid chemical peels or aesthetic treatments before the treatment?\",\"answer\":\"Avoid chemical peels or aesthetic treatments for at least 15 days before your treatment\"},{\"question\":\"Are there any conditions or situations where the treatment should be avoided?\",\"answer\":\"Avoid treatment if you are individuals with body implants, severe medical conditions, or if you\\u2019ve undergone recent surgery. Consult our experts if you have any medical conditions or medical history.\"},{\"question\":\"Is the facial treatment painless?\",\"answer\":\"The facial treatment is generally painless, but you may experience pricking sensations at times.\"},{\"question\":\"Can I combine the treatment with chemical peels for better results?\",\"answer\":\"For best results combining the treatment with suitable chemical peels is recommended\"}]', 'active', '2025-07-16 06:01:18', '2025-07-16 06:01:18'),
(11, 4, 'Hydration Boost Facial', 'rQqM20mAY3oYwRjBYqMEjoYbVIkeHcD3KBxNj0eG.png', NULL, 4.7, 4500.00, '90', '<p>End-to-end skin cleansing, hydration, and rejuvenation</p>\r\n\r\n<p>Enhances blood circulation and replenishes skin nutrients</p>', '<p>This facial is for ultimate skin nourishment and is 10 times more effective than regular or physical facials</p>\r\n\r\n<p>Vitamin C and E penetration boost skin nutrition while providing deep hydration</p>\r\n\r\n<p>Key benefits include dead skin and white heads removal, improved blood circulation, tight skin, enhanced elastic production</p>\r\n\r\n<p>Aftercare Tips</p>\r\n\r\n<p>Do not use any generic Tretinoin or Retin-A till at least 48 hours</p>\r\n\r\n<p>Do not use any exfoliating treatments for at least 48 hours before and after</p>\r\n\r\n<p>Do not wax for at least 48 hours before and after</p>\r\n\r\n<p>Avoid excessive sun exposure before and after and wear sunscreen and moisturizer for at least 48 hours after the treatment</p>\r\n\r\n<p>Do not shave your face on the day of your facial</p>\r\n\r\n<p>Wait one day after the treatment to apply makeup</p>\r\n\r\n<p>Avoid exposure to heat or sweat-promoting activities (gym, sauna, etc.) for 24 hours</p>\r\n\r\n<p>Keep your skin hydrated by drinking plenty of water throughout the day</p>', '[{\"title\":\"Deep cleansing with water abrasion\",\"image\":\"KzbiCVuqzXcrD82nG7gxjExwrNgRNLchFyYZodGT.jpg\"},{\"title\":\"Enhance skin nutrition with vitamin C abrasion\",\"image\":\"bKec18UOlokvtCBQBzalJ9TJ6InUdIe0cd9myH8n.jpg\"},{\"title\":\"Boost collagen production, lift, and tighten with radio frequency waves\",\"image\":\"yiAxwM6fOr4M0yFdf71NAzM4UEphjklVCmsxaFgq.jpg\"},{\"title\":\"Improve moisture penetration with vitamin E abrasion\",\"image\":\"EdRcDEEEfUcIyJMzEBcLon8ZZbSDKfbJ2qWKS1AU.jpg\"},{\"title\":\"Relax the dermis with a cool stamp\",\"image\":\"qW7vSb85ZdaODHhm4RGZ7Qr43gQJTMDvcmepEGYw.jpg\"},{\"title\":\"Hydrating mask and LED therapy and for multiple skin benefits\",\"image\":\"qIXqaOW7cDuqB0YxfqCot8987ArpbexXpbYZJbbh.jpg\"}]', '[{\"question\":\"Should I use any cosmetics or make-up before my session?\",\"answer\":\"Avoid Using any cosmetics, creams, or make-up before your session\"},{\"question\":\"How long should I avoid chemical peels or aesthetic treatments before the treatment?\",\"answer\":\"Avoid chemical peels or aesthetic treatments for at least 15 days before your treatment\"},{\"question\":\"Are there any conditions or situations where the treatment should be avoided?\",\"answer\":\"Avoid treatment if you are individuals with body implants, severe medical conditions, or if you have undergone recent surgery. Consult our experts if you have any medical conditions or medical history.\"},{\"question\":\"Is the facial treatment painless?\",\"answer\":\"The facial treatment is generally painless, but you may experience pricking sensations at times.\"},{\"question\":\"How soon will I notice instant radiance after the treatment?\",\"answer\":\"The instant radiance you see after the treatment may vary depending on your skin type. You can expect a noticeable improvement in your skin 24-48 hours after the treatment\"},{\"question\":\"Can I combine the treatment with chemical peels for better results?\",\"answer\":\"For best results combining the treatment with suitable chemical peels is recommended\"}]', 'active', '2025-07-16 06:08:27', '2025-07-16 06:08:27'),
(12, 20, 'Insta Collagen Boost Facial', 'JALaSYiKZPOej4PBsSrsLmE5oCZs6ajDo6ZNmkjC.webp', NULL, 4.8, 6000.00, '90', '<p>A comprehensive regime that provides instant, lasting glow</p>\r\n\r\n<p>Smooths skin texture diminishes fine lines, tightens and lifts the skin</p>', '<p>This is a signature facial that works wonders on all skin types.</p>\r\n\r\n<p>Get instant glow, improved circulation, collagen, and reduced signs of aging. Perfect for any occasion or monthly maintenance</p>\r\n\r\n<p>Key benefits include complete skin nourishment, reduces under-eye puffiness, oxygenates the dermis, reduces fine lines and wrinkles</p>\r\n\r\n<p>Aftercare Tips</p>\r\n\r\n<p>Do not use any generic Tretinoin or Retin-A till at least 48 hours</p>\r\n\r\n<p>Do not use any exfoliating treatments for at least 48 hours before and after</p>\r\n\r\n<p>Do not wax for at least 48 hours before and after</p>\r\n\r\n<p>Avoid excessive sun exposure before and after and wear sunscreen and moisturizer for at least 48 hours after the treatment</p>\r\n\r\n<p>Do not shave your face on the day of your facial</p>\r\n\r\n<p>Wait one day after the treatment to apply makeup</p>\r\n\r\n<p>Avoid exposure to heat or sweat-promoting activities (gym, sauna, etc.) for 24 hours</p>\r\n\r\n<p>Keep your skin hydrated by drinking plenty of water throughout the day</p>', '[{\"title\":\"The skin is cleansed\",\"image\":\"YTxLhWb0CyD6MCryyAWqUjuY409Y9wI3yOTNp5hs.webp\"},{\"title\":\"Diamond derma abrasion is performed for removing dead skin\",\"image\":\"HDgnaJLnQbZ8hCu5PhkvJp5HtIogjMYci1Uy6aQW.jpg\"},{\"title\":\"Radio frequency waves penetrates for tightening\",\"image\":\"waf2DaiVQDcly4rTjISUWmx5b7RHcnKhxeVBHfxU.jpg\"},{\"title\":\"Electric muscle stimulation is administered for contouring the face\",\"image\":\"6QzeFMrCug1PHBWhjasDgaM3fUKZ5RdV8iLM1ppk.jpg\"},{\"title\":\"Under-eye puffiness is reduced via Bio\",\"image\":\"RxBAUR2ScIL6Z5EYKHXg5d4YGqDfDXm5Synns3YD.jpg\"},{\"title\":\"Lactic peel is applied to illuminate and smoothens skin\",\"image\":\"yYfJdldLhQlaX56bol5C9LHvbZ1deB8oROo2QBPQ.jpg\"},{\"title\":\"Fruit Gel Massage\",\"image\":\"GGq9i1i07fhxQrUgPyS76ZO0gqilNnc5YSaaPJA8.jpg\"},{\"title\":\"Concluded with hydration mask and LED therapy for the final sheen\",\"image\":\"p7NITDPMzNlSYmcqqtNhReCP0hqpA48yTqCcFNrM.jpg\"}]', '[{\"question\":\"Should I use any cosmetics or make-up before my session?\",\"answer\":\"Avoid Using any cosmetics, creams, or make-up before your session\"},{\"question\":\"How long should I avoid chemical peels or aesthetic treatments before the treatment?\",\"answer\":\"Avoid chemical peels or aesthetic treatments for at least 15 days before your treatment\"},{\"question\":\"Are there any conditions or situations where the treatment should be avoided?\",\"answer\":\"Avoid treatment if you are individual with body implants, severe medical conditions, or if you\\u2019ve undergone recent surgery. Consult our experts if you have any medical conditions or medical history.\"},{\"question\":\"Is the facial treatment painless?\",\"answer\":\"The facial treatment is generally painless, but you may experience pricking sensations at times.\"},{\"question\":\"How soon will I notice instant radiance after the treatment?\",\"answer\":\"The instant radiance you see after the treatment may vary depending on your skin type. You can expect a noticeable improvement in your skin 24-48 hours after the treatment\"},{\"question\":\"Can I combine the treatment with chemical peels for better results?\",\"answer\":\"For best results combining the treatment with suitable chemical peels is recommended\"}]', 'active', '2025-07-17 00:54:15', '2025-07-17 00:54:15');

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
-- Table structure for table `top_categories`
--

CREATE TABLE `top_categories` (
  `id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `top_categories`
--

INSERT INTO `top_categories` (`id`, `gender_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'SKIN CONCERN', '2025-07-05 10:32:56', '2025-07-05 10:32:56'),
(2, 1, 'TREATMENTS', '2025-07-05 10:32:56', '2025-07-05 10:32:56'),
(3, 2, 'SKIN CONCERN', '2025-07-05 10:32:56', '2025-07-08 06:50:05'),
(4, 2, 'TREATMENTS', '2025-07-05 10:32:56', '2025-07-08 06:50:08');

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
  `user_type` enum('admin','customer') DEFAULT 'customer',
  `phone` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`, `phone`, `gender`, `profile_image`) VALUES
(1, 'test', 'test@gmail.com', NULL, '$2y$12$W1twci91jx2l9IPWaJ92POPWuCEXMvMaPoYavEgmMxKrrHnuA2x86', NULL, '2025-07-01 00:47:37', '2025-07-01 00:47:37', 'admin', NULL, NULL, NULL),
(2, 'Akash', 'akash@gmail.com', NULL, '$2y$12$Qt9RL7FahBIJiXVCAD1k5uaYegpEcZMlViH6g2nBM5bRzyMSecI9W', NULL, '2025-07-10 01:34:05', '2025-07-10 01:34:05', 'customer', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `career_doctor`
--
ALTER TABLE `career_doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_details`
--
ALTER TABLE `doctor_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- Indexes for table `top_categories`
--
ALTER TABLE `top_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gender_id` (`gender_id`,`name`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `career_doctor`
--
ALTER TABLE `career_doctor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctor_details`
--
ALTER TABLE `doctor_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mid_categories`
--
ALTER TABLE `mid_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `top_categories`
--
ALTER TABLE `top_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mid_categories`
--
ALTER TABLE `mid_categories`
  ADD CONSTRAINT `mid_categories_ibfk_1` FOREIGN KEY (`top_category_id`) REFERENCES `top_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`mid_category_id`) REFERENCES `mid_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `top_categories`
--
ALTER TABLE `top_categories`
  ADD CONSTRAINT `top_categories_ibfk_1` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
