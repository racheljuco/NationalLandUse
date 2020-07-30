-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 08:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nluis`
--

-- --------------------------------------------------------

--
-- Table structure for table `crops`
--

CREATE TABLE `crops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_crop_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crops`
--

INSERT INTO `crops` (`id`, `type_crop_id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sugar Cane', 'Sugar Cane', NULL, '2020-07-10 07:04:03', '2020-07-10 07:04:03'),
(2, 1, 'Vegetables', 'Vegetables', NULL, '2020-07-10 07:04:12', '2020-07-10 07:04:12'),
(3, 2, 'Maize', 'Maize', NULL, '2020-07-10 07:04:21', '2020-07-10 07:04:21'),
(4, 2, 'Millet', 'Millet', NULL, '2020-07-10 07:04:30', '2020-07-10 07:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `district_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `region_id`, `district_name`, `code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ifakara Mji', '0001', NULL, '2020-07-08 18:36:00', '2020-07-08 18:36:00'),
(2, 1, 'Gairo', '1234', NULL, '2020-07-08 18:36:07', '2020-07-08 18:36:07');

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
-- Table structure for table `farming_markets`
--

CREATE TABLE `farming_markets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farming_methods`
--

CREATE TABLE `farming_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farming_methods`
--

INSERT INTO `farming_methods` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Hand Hoe', NULL, NULL, NULL),
(2, 'Tractors', NULL, NULL, NULL),
(3, 'Oxens(Plough driven)', NULL, NULL, NULL),
(4, 'Power Tillers', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `farming_practices`
--

CREATE TABLE `farming_practices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farming_practices`
--

INSERT INTO `farming_practices` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Rain Fed Agriculture', 'Rain Fed Agriculture', NULL, NULL),
(2, 'Irrigation Agriculture', 'Irrigation Agriculture', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `farming_systems`
--

CREATE TABLE `farming_systems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farming_techniques`
--

CREATE TABLE `farming_techniques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `description` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farming_techniques`
--

INSERT INTO `farming_techniques` (`id`, `name`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Terrace Agriculture System', 1, 'Terrace Agriculture System', NULL, NULL),
(2, 'Small Scale Holder', 0, 'Small Scale Holder', NULL, NULL),
(3, 'Shifting', 0, 'Shifting', NULL, NULL),
(4, 'Extensive', 0, 'Extensive', NULL, NULL),
(5, 'Intensive Farming Techniques', 0, 'Intensive Farming Techniques', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gazette`
--

CREATE TABLE `gazette` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `land_use_plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gn_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_date` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hamlets`
--

CREATE TABLE `hamlets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Hamlet_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `harvesting_methods`
--

CREATE TABLE `harvesting_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `land_use_distributions`
--

CREATE TABLE `land_use_distributions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `land_use_plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `village_area` double(8,2) NOT NULL DEFAULT 0.00,
  `projected_households` double(8,2) NOT NULL DEFAULT 0.00,
  `year_preparation` year(4) NOT NULL,
  `settlement` double(8,2) NOT NULL DEFAULT 0.00,
  `social_service` double(8,2) NOT NULL DEFAULT 0.00,
  `agriculture` double(8,2) NOT NULL DEFAULT 0.00,
  `agriculture_settlement` double(8,2) NOT NULL DEFAULT 0.00,
  `grazing` double(8,2) NOT NULL DEFAULT 0.00,
  `utilization_forest` double(8,2) NOT NULL DEFAULT 0.00,
  `reserved_forest` double(8,2) NOT NULL DEFAULT 0.00,
  `other_reserved_land` double(8,2) NOT NULL DEFAULT 0.00,
  `water_sources` double(8,2) NOT NULL DEFAULT 0.00,
  `wma` double(8,2) NOT NULL DEFAULT 0.00,
  `land_bank` double(8,2) NOT NULL DEFAULT 0.00,
  `land_investment` double(8,2) NOT NULL DEFAULT 0.00,
  `quarrying` double(8,2) NOT NULL DEFAULT 0.00,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_use_distributions`
--

INSERT INTO `land_use_distributions` (`id`, `land_use_plan_id`, `village_area`, `projected_households`, `year_preparation`, `settlement`, `social_service`, `agriculture`, `agriculture_settlement`, `grazing`, `utilization_forest`, `reserved_forest`, `other_reserved_land`, `water_sources`, `wma`, `land_bank`, `land_investment`, `quarrying`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 12231.73, 922.00, 2010, 685.17, 81.16, 4629.82, 0.00, 1585.19, 0.10, 0.00, 0.00, 792.16, 4458.13, 0.00, 0.00, 0.00, NULL, NULL, NULL),
(2, 2, 1813.00, 633.00, 2012, 213.00, 21.00, 634.00, 807.00, 132.00, 0.00, 0.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL),
(3, 3, 18912.07, 681.00, 2008, 600.42, 26.37, 4588.68, 2273.64, 11157.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 265.96, 0.00, NULL, NULL, NULL),
(4, 4, 4011.00, 1082.00, 2012, 139.95, 0.00, 3162.80, 0.00, 96.07, 0.00, 231.19, 0.00, 0.00, 180.47, 0.00, 198.75, 1.77, NULL, NULL, NULL),
(5, 5, 3861.68, 718.00, 2012, 281.83, 68.80, 3325.77, 0.00, 0.00, 12.08, 0.00, 0.00, 0.00, 0.00, 0.00, 173.20, 0.00, NULL, NULL, NULL),
(6, 6, 2071.99, 1118.00, 2013, 47.67, 1160.86, 0.00, 350.37, 0.00, 48.67, 77.31, 0.37, 0.00, 0.00, 1.46, 0.00, 0.00, NULL, NULL, NULL),
(7, 7, 1276.50, 697.00, 2013, 32.66, 549.10, 0.00, 315.22, 0.00, 0.00, 83.10, 0.50, 0.00, 0.00, 9.69, 0.00, 0.00, NULL, NULL, NULL),
(8, 8, 2229.58, 454.00, 2013, 25.40, 1388.50, 0.00, 547.98, 0.00, 45.50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `land_use_plans`
--

CREATE TABLE `land_use_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `village_id` bigint(20) UNSIGNED DEFAULT NULL,
  `land_use_plan_status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_use_plans`
--

INSERT INTO `land_use_plans` (`id`, `village_id`, `land_use_plan_status_id`, `name`, `description`, `created_date`, `status`, `file`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Kikwakila', 'Kikwakila', '2020-07-16', 1, 'landuseplans/landuseplan2020_07_09_12_56_47.zip', NULL, '2020-07-08 18:38:21', '2020-07-09 09:56:47'),
(2, 2, 1, 'Kilama', 'Kilama', '2020-07-21', 1, NULL, NULL, '2020-07-08 18:38:38', '2020-07-08 18:38:38'),
(3, 3, 1, 'Lugongole', 'Lugongole', '2020-07-25', 1, NULL, NULL, '2020-07-08 18:39:08', '2020-07-08 18:39:08'),
(4, 4, 1, 'Machipi', 'Machipi', '2020-07-31', 1, NULL, NULL, '2020-07-08 18:39:29', '2020-07-08 18:39:29'),
(5, 5, 1, 'Mahutanga', 'Mahutanga', '2020-07-27', 1, NULL, NULL, '2020-07-08 18:39:48', '2020-07-08 18:39:48'),
(6, 6, 1, 'Iyongwe', 'Iyongwe', '2020-08-07', 1, NULL, NULL, '2020-07-08 18:40:15', '2020-07-08 18:40:15'),
(7, 7, 1, 'Makuyu', 'Makuyu', '2020-07-22', 1, NULL, NULL, '2020-07-08 18:44:11', '2020-07-08 18:44:11'),
(8, 8, 1, 'Ijava', 'Ijava', '2020-07-24', 1, NULL, NULL, '2020-07-08 18:44:31', '2020-07-08 18:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `land_use_plan_crops`
--

CREATE TABLE `land_use_plan_crops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `land_use_plan_id` bigint(20) UNSIGNED NOT NULL,
  `crop_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_use_plan_crops`
--

INSERT INTO `land_use_plan_crops` (`id`, `land_use_plan_id`, `crop_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `land_use_plan_farming_methods`
--

CREATE TABLE `land_use_plan_farming_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `land_use_plan_id` bigint(20) UNSIGNED NOT NULL,
  `farming_method_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_use_plan_farming_methods`
--

INSERT INTO `land_use_plan_farming_methods` (`id`, `land_use_plan_id`, `farming_method_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `land_use_plan_farming_practice`
--

CREATE TABLE `land_use_plan_farming_practice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `land_use_plan_id` bigint(20) UNSIGNED NOT NULL,
  `farming_practice_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_use_plan_farming_practice`
--

INSERT INTO `land_use_plan_farming_practice` (`id`, `land_use_plan_id`, `farming_practice_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `land_use_plan_farming_technique`
--

CREATE TABLE `land_use_plan_farming_technique` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `land_use_plan_id` bigint(20) UNSIGNED NOT NULL,
  `farming_technique_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_use_plan_farming_technique`
--

INSERT INTO `land_use_plan_farming_technique` (`id`, `land_use_plan_id`, `farming_technique_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `land_use_plan_statuses`
--

CREATE TABLE `land_use_plan_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_use_plan_statuses`
--

INSERT INTO `land_use_plan_statuses` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Complete Stage 6', NULL, NULL, NULL),
(2, 'Complete Stage 5', NULL, NULL, NULL),
(3, 'Completed Stage 4', NULL, NULL, NULL);

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
(1, '2014_06_11_054735_create_organisation_types_table', 1),
(2, '2014_06_11_054736_create_organisations_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_20_054951_create_permission_tables', 1),
(7, '2020_05_04_183053_create_land_use_plan_statuses_table', 1),
(8, '2020_05_22_190714_create_regions_table', 1),
(9, '2020_05_22_190715_create_districts_table', 1),
(10, '2020_06_11_054240_create_settings_table', 1),
(11, '2020_06_11_054241_create_wards_table', 1),
(12, '2020_06_11_054242_create_villages_table', 1),
(13, '2020_06_11_054243_create_hamlets_table', 1),
(14, '2020_06_11_054594_create_land_use_plans_table', 1),
(15, '2020_06_11_054595_create_gazette_table', 1),
(16, '2020_06_11_054632_create_land_use_distributions_table', 1),
(17, '2020_06_20_085213_create_shapefiles_table', 1),
(18, '2020_07_08_200259_create_farming_methods_table', 1),
(19, '2020_07_08_200339_create_farming_systems_table', 1),
(20, '2020_07_08_200359_create_harvesting_methods_table', 1),
(21, '2020_07_08_200443_create_type_crops_table', 1),
(22, '2020_07_08_200528_create_farming_markets_table', 1),
(25, '2020_07_10_090826_create_crops_table', 2),
(26, '2020_07_10_091258_create_land_use_plan_crops_table', 2),
(27, '2020_07_10_113004_create_land_use_plan_farming_methods_table', 3),
(28, '2020_07_11_172612_create_farming_techniques_table', 4),
(29, '2020_07_11_172622_create_farming_practices_table', 4),
(30, '2020_07_11_172643_create_land_use_plan_farming_technique_table', 4),
(31, '2020_07_11_172657_create_land_use_plan_farming_practice_table', 4);

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
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `organisations`
--

CREATE TABLE `organisations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organisation_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organisation_types`
--

CREATE TABLE `organisation_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_crop_type', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(2, 'add_crop_type', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(3, 'edit_crop_type', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(4, 'delete_crop_type', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(5, 'view_district', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(6, 'add_district', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(7, 'edit_district', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(8, 'delete_district', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(9, 'view_farming_market', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(10, 'add_farming_market', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(11, 'edit_farming_market', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(12, 'delete_farming_market', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(13, 'view_farming_method', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(14, 'add_farming_method', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(15, 'edit_farming_method', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(16, 'delete_farming_method', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(17, 'view_farming_system', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(18, 'add_farming_system', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(19, 'edit_farming_system', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(20, 'delete_farming_system', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(21, 'view_gazette', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(22, 'add_gazette', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(23, 'edit_gazette', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(24, 'delete_gazette', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(25, 'view_hamlet', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(26, 'add_hamlet', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(27, 'edit_hamlet', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(28, 'delete_hamlet', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(29, 'view_harvesting_method', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(30, 'add_harvesting_method', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(31, 'edit_harvesting_method', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(32, 'delete_harvesting_method', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(33, 'view_land_use_distribution', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(34, 'add_land_use_distribution', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(35, 'edit_land_use_distribution', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(36, 'delete_land_use_distribution', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(37, 'view_land_use_plan', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(38, 'add_land_use_plan', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(39, 'edit_land_use_plan', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(40, 'delete_land_use_plan', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(41, 'view_land_use_plan_status', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(42, 'add_land_use_plan_status', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(43, 'edit_land_use_plan_status', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(44, 'delete_land_use_plan_status', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(45, 'view_permission', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(46, 'add_permission', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(47, 'edit_permission', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(48, 'delete_permission', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(49, 'view_region', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(50, 'add_region', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(51, 'edit_region', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(52, 'delete_region', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(53, 'view_role', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(54, 'add_role', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(55, 'edit_role', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(56, 'delete_role', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(57, 'view_shape_file', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(58, 'add_shape_file', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(59, 'edit_shape_file', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(60, 'delete_shape_file', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(61, 'view_user', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(62, 'add_user', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(63, 'edit_user', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(64, 'delete_user', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(65, 'view_village', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(66, 'add_village', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(67, 'edit_village', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(68, 'delete_village', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(69, 'view_ward', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(70, 'add_ward', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(71, 'edit_ward', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59'),
(72, 'delete_ward', 'web', '2020-07-08 18:29:59', '2020-07-08 18:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `region_name`, `code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Morogoro', '1234', NULL, '2020-07-08 18:35:48', '2020-07-08 18:35:48');

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
(1, 'Admin', 'web', NULL, NULL);

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
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shapefiles`
--

CREATE TABLE `shapefiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `land_use_plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filepath` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shapefiles`
--

INSERT INTO `shapefiles` (`id`, `land_use_plan_id`, `name`, `filepath`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, 'Kikwakila Village Shapefiles', 'shapefiles/2020_07_09_11_44_52.zip', NULL, '2020-07-09 08:44:52', '2020-07-09 08:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `type_crops`
--

CREATE TABLE `type_crops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_crops`
--

INSERT INTO `type_crops` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Cash Crops', NULL, NULL, NULL),
(2, 'Food Crops', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organisation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proffession` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `organisation_id`, `name`, `email`, `email_verified_at`, `password`, `phone_number`, `designation`, `proffession`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'admin@gmail.com', NULL, '$2y$10$CqeWy5XXBUXRzdnSpb/yHOt7JjyN4PSvBhtkgns9pXQ5cLe38rY0e', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `village_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`id`, `district_id`, `village_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kikwawila', NULL, '2020-07-08 18:36:22', '2020-07-08 18:36:22'),
(2, 1, 'Kilama', NULL, '2020-07-08 18:36:29', '2020-07-08 18:36:29'),
(3, 1, 'Lugongole', NULL, '2020-07-08 18:36:36', '2020-07-08 18:36:36'),
(4, 1, 'Machipi', NULL, '2020-07-08 18:36:43', '2020-07-08 18:36:43'),
(5, 1, 'Mahutanga', NULL, '2020-07-08 18:36:50', '2020-07-08 18:43:03'),
(6, 2, 'Iyongwe', NULL, '2020-07-08 18:36:57', '2020-07-08 18:36:57'),
(7, 2, 'Makuyu', NULL, '2020-07-08 18:43:27', '2020-07-08 18:43:27'),
(8, 2, 'Ijava', NULL, '2020-07-08 18:43:37', '2020-07-08 18:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crops`
--
ALTER TABLE `crops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crops_type_crop_id_foreign` (`type_crop_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_region_id_foreign` (`region_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farming_markets`
--
ALTER TABLE `farming_markets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farming_methods`
--
ALTER TABLE `farming_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farming_practices`
--
ALTER TABLE `farming_practices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farming_systems`
--
ALTER TABLE `farming_systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farming_techniques`
--
ALTER TABLE `farming_techniques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gazette`
--
ALTER TABLE `gazette`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gazette_land_use_plan_id_foreign` (`land_use_plan_id`);

--
-- Indexes for table `hamlets`
--
ALTER TABLE `hamlets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hamlets_village_id_foreign` (`village_id`);

--
-- Indexes for table `harvesting_methods`
--
ALTER TABLE `harvesting_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land_use_distributions`
--
ALTER TABLE `land_use_distributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `land_use_distributions_land_use_plan_id_foreign` (`land_use_plan_id`);

--
-- Indexes for table `land_use_plans`
--
ALTER TABLE `land_use_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `land_use_plans_village_id_foreign` (`village_id`),
  ADD KEY `land_use_plans_land_use_plan_status_id_foreign` (`land_use_plan_status_id`);

--
-- Indexes for table `land_use_plan_crops`
--
ALTER TABLE `land_use_plan_crops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `land_use_plan_crops_land_use_plan_id_foreign` (`land_use_plan_id`),
  ADD KEY `land_use_plan_crops_crop_id_foreign` (`crop_id`);

--
-- Indexes for table `land_use_plan_farming_methods`
--
ALTER TABLE `land_use_plan_farming_methods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `land_use_plan_farming_methods_land_use_plan_id_foreign` (`land_use_plan_id`),
  ADD KEY `land_use_plan_farming_methods_farming_method_id_foreign` (`farming_method_id`);

--
-- Indexes for table `land_use_plan_farming_practice`
--
ALTER TABLE `land_use_plan_farming_practice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `land_use_plan_farming_practice_land_use_plan_id_foreign` (`land_use_plan_id`),
  ADD KEY `land_use_plan_farming_practice_farming_practice_id_foreign` (`farming_practice_id`);

--
-- Indexes for table `land_use_plan_farming_technique`
--
ALTER TABLE `land_use_plan_farming_technique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `land_use_plan_farming_technique_land_use_plan_id_foreign` (`land_use_plan_id`),
  ADD KEY `land_use_plan_farming_technique_farming_technique_id_foreign` (`farming_technique_id`);

--
-- Indexes for table `land_use_plan_statuses`
--
ALTER TABLE `land_use_plan_statuses`
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
-- Indexes for table `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organisations_organisation_type_id_foreign` (`organisation_type_id`);

--
-- Indexes for table `organisation_types`
--
ALTER TABLE `organisation_types`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shapefiles`
--
ALTER TABLE `shapefiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shapefiles_land_use_plan_id_foreign` (`land_use_plan_id`);

--
-- Indexes for table `type_crops`
--
ALTER TABLE `type_crops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_organisation_id_foreign` (`organisation_id`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `villages_district_id_foreign` (`district_id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wards_district_id_foreign` (`district_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crops`
--
ALTER TABLE `crops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farming_markets`
--
ALTER TABLE `farming_markets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farming_methods`
--
ALTER TABLE `farming_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `farming_practices`
--
ALTER TABLE `farming_practices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farming_systems`
--
ALTER TABLE `farming_systems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farming_techniques`
--
ALTER TABLE `farming_techniques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gazette`
--
ALTER TABLE `gazette`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hamlets`
--
ALTER TABLE `hamlets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `harvesting_methods`
--
ALTER TABLE `harvesting_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `land_use_distributions`
--
ALTER TABLE `land_use_distributions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `land_use_plans`
--
ALTER TABLE `land_use_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `land_use_plan_crops`
--
ALTER TABLE `land_use_plan_crops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `land_use_plan_farming_methods`
--
ALTER TABLE `land_use_plan_farming_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `land_use_plan_farming_practice`
--
ALTER TABLE `land_use_plan_farming_practice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `land_use_plan_farming_technique`
--
ALTER TABLE `land_use_plan_farming_technique`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `land_use_plan_statuses`
--
ALTER TABLE `land_use_plan_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organisation_types`
--
ALTER TABLE `organisation_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shapefiles`
--
ALTER TABLE `shapefiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_crops`
--
ALTER TABLE `type_crops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `villages`
--
ALTER TABLE `villages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crops`
--
ALTER TABLE `crops`
  ADD CONSTRAINT `crops_type_crop_id_foreign` FOREIGN KEY (`type_crop_id`) REFERENCES `type_crops` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `gazette`
--
ALTER TABLE `gazette`
  ADD CONSTRAINT `gazette_land_use_plan_id_foreign` FOREIGN KEY (`land_use_plan_id`) REFERENCES `land_use_plans` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `hamlets`
--
ALTER TABLE `hamlets`
  ADD CONSTRAINT `hamlets_village_id_foreign` FOREIGN KEY (`village_id`) REFERENCES `villages` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `land_use_distributions`
--
ALTER TABLE `land_use_distributions`
  ADD CONSTRAINT `land_use_distributions_land_use_plan_id_foreign` FOREIGN KEY (`land_use_plan_id`) REFERENCES `land_use_plans` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `land_use_plans`
--
ALTER TABLE `land_use_plans`
  ADD CONSTRAINT `land_use_plans_land_use_plan_status_id_foreign` FOREIGN KEY (`land_use_plan_status_id`) REFERENCES `land_use_plan_statuses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `land_use_plans_village_id_foreign` FOREIGN KEY (`village_id`) REFERENCES `villages` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `land_use_plan_crops`
--
ALTER TABLE `land_use_plan_crops`
  ADD CONSTRAINT `land_use_plan_crops_crop_id_foreign` FOREIGN KEY (`crop_id`) REFERENCES `crops` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `land_use_plan_crops_land_use_plan_id_foreign` FOREIGN KEY (`land_use_plan_id`) REFERENCES `land_use_plans` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `land_use_plan_farming_methods`
--
ALTER TABLE `land_use_plan_farming_methods`
  ADD CONSTRAINT `land_use_plan_farming_methods_farming_method_id_foreign` FOREIGN KEY (`farming_method_id`) REFERENCES `farming_methods` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `land_use_plan_farming_methods_land_use_plan_id_foreign` FOREIGN KEY (`land_use_plan_id`) REFERENCES `land_use_plans` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `land_use_plan_farming_practice`
--
ALTER TABLE `land_use_plan_farming_practice`
  ADD CONSTRAINT `land_use_plan_farming_practice_farming_practice_id_foreign` FOREIGN KEY (`farming_practice_id`) REFERENCES `farming_practices` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `land_use_plan_farming_practice_land_use_plan_id_foreign` FOREIGN KEY (`land_use_plan_id`) REFERENCES `land_use_plans` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `land_use_plan_farming_technique`
--
ALTER TABLE `land_use_plan_farming_technique`
  ADD CONSTRAINT `land_use_plan_farming_technique_farming_technique_id_foreign` FOREIGN KEY (`farming_technique_id`) REFERENCES `farming_techniques` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `land_use_plan_farming_technique_land_use_plan_id_foreign` FOREIGN KEY (`land_use_plan_id`) REFERENCES `land_use_plans` (`id`) ON UPDATE CASCADE;

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
-- Constraints for table `organisations`
--
ALTER TABLE `organisations`
  ADD CONSTRAINT `organisations_organisation_type_id_foreign` FOREIGN KEY (`organisation_type_id`) REFERENCES `organisation_types` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shapefiles`
--
ALTER TABLE `shapefiles`
  ADD CONSTRAINT `shapefiles_land_use_plan_id_foreign` FOREIGN KEY (`land_use_plan_id`) REFERENCES `land_use_plans` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_organisation_id_foreign` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `villages`
--
ALTER TABLE `villages`
  ADD CONSTRAINT `villages_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
