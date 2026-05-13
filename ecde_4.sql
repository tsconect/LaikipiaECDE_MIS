-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2026 at 12:37 PM
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
-- Database: `ecde_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminstrative_units`
--

CREATE TABLE `adminstrative_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `priority` int(11) NOT NULL DEFAULT 0,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `image`, `priority`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Iure et quia nihil u', 'Quisquam voluptatem', 'announcements/9w45WIyaswrzer1dbCkpJbeiGgU6g96Bx3zDLKJu.jpg', 1, '2008-03-10 16:18:00', '2020-10-07 17:51:00', 'published', '2026-03-27 07:14:26', '2026-03-27 07:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`id`, `user_id`, `first_name`, `last_name`, `middle_name`, `phone_number`, `id_number`, `email`, `relationship`, `gender`, `dob`, `created_at`, `updated_at`) VALUES
(1, 1, 'Colette', 'Barlow', 'Brendan Curtis', '+1 (894) 466-2133', '800', 'kupeke@mailinator.com', 'parents', 'female', '2007-12-20', '2026-03-23 04:26:51', '2026-03-23 04:26:51'),
(2, 7, 'Guinevere', 'Gilmore', 'Yetta Walter', '+1 (859) 495-4459', '146', 'cugujygobo@mailinator.com', 'cousins', 'female', '2005-04-15', '2026-03-23 09:30:24', '2026-03-23 09:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `bursary_applications`
--

CREATE TABLE `bursary_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `for_type` enum('posts','pages','faqs') NOT NULL DEFAULT 'posts',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_rooms`
--

CREATE TABLE `class_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `number_of_students` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_rooms`
--

INSERT INTO `class_rooms` (`id`, `name`, `status`, `number_of_students`, `description`, `school_id`, `created_at`, `updated_at`) VALUES
(1, 'PP1 CLASS', 'Semi_Permanent', '345', 'nnnnnnnnn', 6, '2026-03-29 06:37:30', '2026-03-29 06:37:30'),
(2, 'PP1 CLASS', 'Semi_Permanent', '345', 'nnnnnnnnn', 6, '2026-03-29 06:38:02', '2026-03-29 06:38:02'),
(3, 'baby class', 'Semi_Permanent', '20', NULL, 6, '2026-03-31 03:05:52', '2026-03-31 03:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `constituencies`
--

CREATE TABLE `constituencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `county_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `county_code` varchar(255) DEFAULT NULL,
  `constituency_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `constituencies`
--

INSERT INTO `constituencies` (`id`, `county_id`, `name`, `code`, `county_code`, `constituency_id`, `created_at`, `updated_at`) VALUES
(1, 'pZqQRRW7PHP', 'Ainabkoi Sub County', 'KE_SubCounty_3229', 'pZqQRRW7PHP', 'mYlMs4xTj82', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(2, 'ihZsJ8alvtb', 'Ainamoi Sub County', 'KE_SubCounty_3026', 'ihZsJ8alvtb', 'GshNTMZJ5r1', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(3, 't0J75eHKxz5', 'Aldai Sub County', 'KE_SubCounty_3171', 't0J75eHKxz5', 'Sq2fLWnOCGg', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(4, 'u4t9H8XyU9P', 'Alego Usonga Sub County', 'KE_SubCounty_3203', 'u4t9H8XyU9P', 'Cu46otDi1RO', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(5, 'yhCUgGcCcOo', 'Athi River Sub County', 'KE_SubCounty_3093', 'yhCUgGcCcOo', 'BxfsSc6Svrc', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(6, 'fVra3Pwta0Q', 'Awendo Sub County', 'KE_SubCounty_3125', 'fVra3Pwta0Q', 'ka9Uv3Ckcbd', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(7, 'uyOrcHZBpW0', 'Balambala Sub County', 'KE_SubCounty_2993', 'uyOrcHZBpW0', 'FGBNPr91pXH', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(8, 'R6f9znhg37c', 'Banissa Sub County', 'KE_SubCounty_3104', 'R6f9znhg37c', 'hCvlJNjyZna', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(9, 'vvOK1BxTbet', 'Baringo Central Sub County', 'KE_SubCounty_2956', 'vvOK1BxTbet', 'k7Rj54u6dMx', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(10, 'vvOK1BxTbet', 'Baringo North Sub County', 'KE_SubCounty_2957', 'vvOK1BxTbet', 'bqtTmWcikTN', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(11, 'ihZsJ8alvtb', 'Belgut Sub County', 'KE_SubCounty_3024', 'ihZsJ8alvtb', 'YnIAWg1T4AY', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(12, 'sPkRcDvhGWA', 'Bobasi Sub County', 'KE_SubCounty_3058', 'sPkRcDvhGWA', 'cooDDG3Lh3A', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(13, 'sPkRcDvhGWA', 'Bomachoge Borabu Sub County', 'KE_SubCounty_3059', 'sPkRcDvhGWA', 'ntRK47D5dYL', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(14, 'sPkRcDvhGWA', 'Bomachoge Chache Sub County', 'KE_SubCounty_3057', 'sPkRcDvhGWA', 'YqYSkwmOtiR', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(15, 'HMNARUV2CW4', 'Bomet Central Sub County', 'KE_SubCounty_2960', 'HMNARUV2CW4', 'm9gdonbVXjZ', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(16, 'HMNARUV2CW4', 'Bomet East Sub County', 'KE_SubCounty_2961', 'HMNARUV2CW4', 'OZNRpww2TUK', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(17, 'sPkRcDvhGWA', 'Bonchari Sub County', 'KE_SubCounty_3061', 'sPkRcDvhGWA', 'zCCIu1Vi3Wh', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(18, 'u4t9H8XyU9P', 'Bondo Sub County', 'KE_SubCounty_3201', 'u4t9H8XyU9P', 'JNvqpOnKfGR', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(19, 'uepLTG8wGWJ', 'Borabu Sub County', 'KE_SubCounty_3179', 'uepLTG8wGWJ', 'ABuzigW8Lzw', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(20, 'KGHhQ5GLd4k', 'Bumula Sub County', 'KE_SubCounty_2969', 'KGHhQ5GLd4k', 'jkQZEow83MX', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(21, 'Tvf1zgVZ0K4', 'Bunyala Sub County', 'KE_SubCounty_2973', 'Tvf1zgVZ0K4', 'zI6vnsXresW', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(22, 'JsH2bnvNt2d', 'Bura Sub County', 'KE_SubCounty_3249', 'JsH2bnvNt2d', 'yWPcTwGwQ2B', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(23, 'ihZsJ8alvtb', 'Bureti Sub County', 'KE_SubCounty_3025', 'ihZsJ8alvtb', 'wt8cPHWfkfu', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(24, 'BjC1xL40gHo', 'Butere Sub County', 'KE_SubCounty_3014', 'BjC1xL40gHo', 'K7mZpm8COh7', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(25, 'Tvf1zgVZ0K4', 'Butula Sub County', 'KE_SubCounty_2975', 'Tvf1zgVZ0K4', 'RIBiZFJxB1K', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(26, 'Y52XNJ50hYb', 'Buuri  East Sub County', 'KE_SubCounty_3111', 'Y52XNJ50hYb', 'xN5aPo4ZOIt', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(27, 'Y52XNJ50hYb', 'Buuri West Sub County', 'KE_SubCounty_3260', 'Y52XNJ50hYb', 'XlYC8FMUgxi', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(28, 'wsBsC6gjHvn', 'Changamwe Sub County', 'KE_SubCounty_3132', 'wsBsC6gjHvn', 'OvI6w06DhPJ', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(29, 'HMNARUV2CW4', 'Chepalungu Sub County', 'KE_SubCounty_2962', 'HMNARUV2CW4', 'PUhMyfDD2xp', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(30, 'KGHhQ5GLd4k', 'Cheptais Sub County', 'KE_SubCounty_1289', 'KGHhQ5GLd4k', 'NZphHeczehh', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(31, 'mThvosEflAU', 'Cherangany Sub County', 'KE_SubCounty_3215', 'mThvosEflAU', 'f18kGo9yXWo', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(32, 't0J75eHKxz5', 'Chesumei Sub County', 'KE_SubCounty_3169', 't0J75eHKxz5', 'xLWuQq3DjOR', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(33, 'T4urHM47nlm', 'Chuka Sub County', 'KE_SubCounty_3213', 'T4urHM47nlm', 'JmE1qRVQD4F', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(34, 'uyOrcHZBpW0', 'Dadaab Sub County', 'KE_SubCounty_2991', 'uyOrcHZBpW0', 'EW4Jw4dVWBt', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(35, 'jkG3zaihdSs', 'Dagoretti North Sub County', 'KE_SubCounty_3154', 'jkG3zaihdSs', 'CcTr4bcVGAG', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(36, 'jkG3zaihdSs', 'Dagoretti South Sub County', 'KE_SubCounty_3153', 'jkG3zaihdSs', 'sqNWYDHZZ6W', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(37, 'vvOK1BxTbet', 'East Pokot Sub County', 'KE_SubCounty_3253', 'vvOK1BxTbet', 'Mk4bMOSMRTB', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(38, 'CeLsrJOH0g9', 'Eldas Sub County', 'KE_SubCounty_3239', 'CeLsrJOH0g9', 'x6Z1sBeiyqQ', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(39, 'jkG3zaihdSs', 'Embakasi Central Sub County', 'KE_SubCounty_3145', 'jkG3zaihdSs', 'XvpLXU47BKs', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(40, 'jkG3zaihdSs', 'Embakasi East Sub County', 'KE_SubCounty_3144', 'jkG3zaihdSs', 'gD4xxgDGJ4Y', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(41, 'jkG3zaihdSs', 'Embakasi North Sub County', 'KE_SubCounty_3146', 'jkG3zaihdSs', 'SSz1iOv28Jk', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(42, 'jkG3zaihdSs', 'Embakasi South Sub County', 'KE_SubCounty_3147', 'jkG3zaihdSs', 'aDp1odOWYC1', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(43, 'jkG3zaihdSs', 'Embakasi West Sub County', 'KE_SubCounty_3143', 'jkG3zaihdSs', 'aCwUX5V42Zz', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(44, 't0J75eHKxz5', 'Emgwen Sub County', 'KE_SubCounty_3168', 't0J75eHKxz5', 'Njv37QXxNy2', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(45, 'sANMZ3lpqGs', 'Emuhaya Sub County', 'KE_SubCounty_3233', 'sANMZ3lpqGs', 'Lpy789vqRC6', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(46, 'mThvosEflAU', 'Endebess Sub County', 'KE_SubCounty_3218', 'mThvosEflAU', 'PsjxYLsJSIp', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(47, 'uyOrcHZBpW0', 'Fafi Sub County', 'KE_SubCounty_2990', 'uyOrcHZBpW0', 'RScEHA3V38d', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(48, 'JsH2bnvNt2d', 'Galole Sub County', 'KE_SubCounty_3248', 'JsH2bnvNt2d', 'A4SNYCxrrnv', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(49, 'nrI2khZx3d0', 'Ganze Sub County', 'KE_SubCounty_3043', 'nrI2khZx3d0', 'x7qUMtZZvo9', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(50, 'bzOfj0iwfDH', 'Garbatulla Sub County', 'KE_SubCounty_3003', 'bzOfj0iwfDH', 'ecl4YnDebUi', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(51, 'uyOrcHZBpW0', 'Garissa Sub County', 'KE_SubCounty_2994', 'uyOrcHZBpW0', 'lQkHbTC1iRg', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(52, 'JsH2bnvNt2d', 'Garsen Sub County', 'KE_SubCounty_3250', 'JsH2bnvNt2d', 'Lj0mu9j58Ss', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(53, 'ahwTMNAJvrL', 'Gatanga Sub County', 'KE_SubCounty_3133', 'ahwTMNAJvrL', 'Z7ALMtFNfeZ', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(54, 'qKzosKQPl6G', 'Gatundu North Sub County', 'KE_SubCounty_3039', 'qKzosKQPl6G', 'HEsM6W2ImQR', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(55, 'qKzosKQPl6G', 'Gatundu South Sub County', 'KE_SubCounty_3040', 'qKzosKQPl6G', 'EcRytSSIkUq', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(56, 'u4t9H8XyU9P', 'Gem Sub County', 'KE_SubCounty_3202', 'u4t9H8XyU9P', 'PKeFksHlJkB', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(57, 'ob6SxuRcqU4', 'Gilgil Sub County', 'KE_SubCounty_3163', 'ob6SxuRcqU4', 'hBU8B1KI12P', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(58, 'qKzosKQPl6G', 'Githunguri Sub County', 'KE_SubCounty_3035', 'qKzosKQPl6G', 'E7tkGikenbD', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(59, 'sANMZ3lpqGs', 'Hamisi Sub County', 'KE_SubCounty_3235', 'sANMZ3lpqGs', 'BXaq5PxSfz2', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(60, 'nK0A12Q7MvS', 'Homa Bay Town Sub County', 'KE_SubCounty_2998', 'nK0A12Q7MvS', 'Ur2xRBDtazT', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(61, 'uyOrcHZBpW0', 'Hulugho Sub County', 'KE_SubCounty_2989', 'uyOrcHZBpW0', 'uyeif4CPqHt', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(62, 'T4urHM47nlm', 'Igambangombe Sub County', 'KE_SubCounty_3256', 'T4urHM47nlm', 'yXwsnpFBIPW', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(63, 'Y52XNJ50hYb', 'Igembe Central Sub County', 'KE_SubCounty_3117', 'Y52XNJ50hYb', 'TPfcUHno8oP', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(64, 'Y52XNJ50hYb', 'Igembe North Sub County', 'KE_SubCounty_3116', 'Y52XNJ50hYb', 'G9DoZvSdGLx', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(65, 'Y52XNJ50hYb', 'Igembe South Sub County', 'KE_SubCounty_3118', 'Y52XNJ50hYb', 'wtuGWT7KjVm', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(66, 'uyOrcHZBpW0', 'Ijara Sub County', 'KE_SubCounty_2988', 'uyOrcHZBpW0', 'l5E6PiIUs1J', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(67, 'BjC1xL40gHo', 'Ikolomani Sub County', 'KE_SubCounty_3011', 'BjC1xL40gHo', 'BE6HMtlHyl1', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(68, 'Y52XNJ50hYb', 'Imenti Central Sub County', 'KE_SubCounty_3112', 'Y52XNJ50hYb', 'OnNcTsJgfvL', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(69, 'Y52XNJ50hYb', 'Imenti North Sub County', 'KE_SubCounty_3113', 'Y52XNJ50hYb', 'BDxUGx86itV', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(70, 'Y52XNJ50hYb', 'Imenti South Sub County', 'KE_SubCounty_3110', 'Y52XNJ50hYb', 'AFIlzKNxXST', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(71, 'bzOfj0iwfDH', 'Isiolo Sub County', 'KE_SubCounty_3004', 'bzOfj0iwfDH', 'I2LYLqKU6AW', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(72, 'wsBsC6gjHvn', 'Jomvu Sub County', 'KE_SubCounty_3131', 'wsBsC6gjHvn', 'vSISrsNNHwq', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(73, 'qKzosKQPl6G', 'Juja Sub County', 'KE_SubCounty_3038', 'qKzosKQPl6G', 'aiqi2bz0IMI', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(74, 'qKzosKQPl6G', 'Kabete Sub County', 'KE_SubCounty_3032', 'qKzosKQPl6G', 'lb5LzWiUX8Y', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(75, 'nK0A12Q7MvS', 'Kabondo Kasipul Sub County', 'KE_SubCounty_3001', 'nK0A12Q7MvS', 'BzFBYZhF5fx', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(76, 'KGHhQ5GLd4k', 'Kabuchai Sub County', 'KE_SubCounty_2970', 'KGHhQ5GLd4k', 'k1mze33jOs0', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(77, 'BoDytkJQ4Qi', 'Kaiti Sub County', 'KE_SubCounty_3251', 'BoDytkJQ4Qi', 'pKJ4NZGPzTA', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(78, 'Hsk1YV8kHkT', 'Kajiado Central Sub County', 'KE_SubCounty_3009', 'Hsk1YV8kHkT', 'SZapM1R0Kti', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(79, 'Hsk1YV8kHkT', 'Kajiado East Sub County', 'KE_SubCounty_3008', 'Hsk1YV8kHkT', 'g6gTzQ5nfYq', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(80, 'Hsk1YV8kHkT', 'Kajiado North Sub County', 'KE_SubCounty_3010', 'Hsk1YV8kHkT', 'BLz1HkvvMkA', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(81, 'Hsk1YV8kHkT', 'Kajiado West Sub County', 'KE_SubCounty_3007', 'Hsk1YV8kHkT', 'wYsCfCAUWNB', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(82, 'yhCUgGcCcOo', 'Kalama Sub County', 'KE_SubCounty_3254', 'yhCUgGcCcOo', 'pJDgmrxMQTn', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(83, 'nrI2khZx3d0', 'Kaloleni Sub County', 'KE_SubCounty_3045', 'nrI2khZx3d0', 'tSKDWoVKiPo', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(84, 'jkG3zaihdSs', 'Kamukunji Sub County', 'KE_SubCounty_3141', 'jkG3zaihdSs', 'qoLIT7y5f5c', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(85, 'ahwTMNAJvrL', 'Kandara Sub County', 'KE_SubCounty_3134', 'ahwTMNAJvrL', 'gwYTo0wITYX', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(86, 'KGHhQ5GLd4k', 'Kanduyi Sub County', 'KE_SubCounty_2968', 'KGHhQ5GLd4k', 'CUjthlounWV', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(87, 'ahwTMNAJvrL', 'Kangema Sub County', 'KE_SubCounty_3252', 'ahwTMNAJvrL', 'U9CLTNIwehR', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(88, 'yhCUgGcCcOo', 'Kangundo Sub County', 'KE_SubCounty_3096', 'yhCUgGcCcOo', 'vMPhBuymSKt', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(89, 'pZqQRRW7PHP', 'Kapseret Sub County', 'KE_SubCounty_3228', 'pZqQRRW7PHP', 'u9yagZzK49q', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(90, 'nK0A12Q7MvS', 'Karachuonyo Sub County', 'KE_SubCounty_3000', 'nK0A12Q7MvS', 'fmsyW02tPng', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(91, 'jkG3zaihdSs', 'Kasarani Sub County', 'KE_SubCounty_3149', 'jkG3zaihdSs', 'FoqzDgIByL6', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(92, 'yhCUgGcCcOo', 'Kathiani Sub County', 'KE_SubCounty_3094', 'yhCUgGcCcOo', 'iCey76HYgLP', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(93, 'MqnLxQBigG0', 'Keiyo North Sub County', 'KE_SubCounty_2981', 'MqnLxQBigG0', 'rlWH0Ac9vjc', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(94, 'MqnLxQBigG0', 'Keiyo South Sub County', 'KE_SubCounty_2980', 'MqnLxQBigG0', 'SOEG546PqbA', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(95, 'pZqQRRW7PHP', 'Kesses Sub County', 'KE_SubCounty_3227', 'pZqQRRW7PHP', 'dKHnvt7gleN', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(96, 'BjC1xL40gHo', 'Khwisero Sub County', 'KE_SubCounty_3013', 'BjC1xL40gHo', 'UhQS2Mv0PCK', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(97, 'qKzosKQPl6G', 'Kiambaa Sub County', 'KE_SubCounty_3033', 'qKzosKQPl6G', 'oMaQgNIs85x', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(98, 'qKzosKQPl6G', 'Kiambu Town Sub County', 'KE_SubCounty_3034', 'qKzosKQPl6G', 'SBz4c48i24Y', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(99, 'kphDeKClFch', 'Kibish Sub County', 'KE_SubCounty_3226', 'kphDeKClFch', 'AXNntZ7T30a', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(100, 'jkG3zaihdSs', 'Kibra Sub County', 'KE_SubCounty_3151', 'jkG3zaihdSs', 'LO5he3DtiFG', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(101, 'BoDytkJQ4Qi', 'Kibwezi East Sub County', 'KE_SubCounty_3099', 'BoDytkJQ4Qi', 'ZhhyithPNoI', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(102, 'BoDytkJQ4Qi', 'Kibwezi West Sub County', 'KE_SubCounty_3081', 'BoDytkJQ4Qi', 'toa2Hl7iVQI', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(103, 'ptWVfaCIdVx', 'Kieni East Sub County', 'KE_SubCounty_3194', 'ptWVfaCIdVx', 'YXt5ETQPRlB', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(104, 'ptWVfaCIdVx', 'Kieni West Sub County', 'KE_SubCounty_3195', 'ptWVfaCIdVx', 'odOtfcaMg4p', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(105, 'ahwTMNAJvrL', 'Kigumo Sub County', 'KE_SubCounty_3136', 'ahwTMNAJvrL', 'tyfDsdZ1h3R', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(106, 'ahwTMNAJvrL', 'Kiharu Sub County', 'KE_SubCounty_3137', 'ahwTMNAJvrL', 'VDlzh6w4LKv', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(107, 'qKzosKQPl6G', 'Kikuyu Sub County', 'KE_SubCounty_3031', 'qKzosKQPl6G', 'jOVcLeZQSsS', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(108, 'nrI2khZx3d0', 'Kilifi North Sub County', 'KE_SubCounty_3047', 'nrI2khZx3d0', 'MEkEH8ZmcOU', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(109, 'nrI2khZx3d0', 'Kilifi South Sub County', 'KE_SubCounty_3046', 'nrI2khZx3d0', 'xWAZBULwGxp', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(110, 'BoDytkJQ4Qi', 'Kilome Sub County', 'KE_SubCounty_3083', 'BoDytkJQ4Qi', 'XAy1bjurhLU', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(111, 'KGHhQ5GLd4k', 'Kimilili Sub County', 'KE_SubCounty_2965', 'KGHhQ5GLd4k', 'AphsS3lJwKU', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(112, 'mThvosEflAU', 'Kiminini Sub County', 'KE_SubCounty_3216', 'mThvosEflAU', 'pzZHpL2ueIn', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(113, 'mYZacFNIB3h', 'Kinangop Sub County', 'KE_SubCounty_3188', 'mYZacFNIB3h', 'RAnL5kBKMIt', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(114, 'N7YETT3A9r1', 'Kinango Sub County', 'KE_SubCounty_3077', 'N7YETT3A9r1', 'LOgbecTRkbp', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(115, 'mYZacFNIB3h', 'Kipipiri Sub County', 'KE_SubCounty_3187', 'mYZacFNIB3h', 'KlVgeHmvG6n', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(116, 'ihZsJ8alvtb', 'Kipkelion East Sub County', 'KE_SubCounty_3028', 'ihZsJ8alvtb', 'gU0Cz7Qlfss', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(117, 'ihZsJ8alvtb', 'Kipkelion West Sub County', 'KE_SubCounty_3027', 'ihZsJ8alvtb', 'Taw0Zg7nArd', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(118, 'Ulj33KBau7V', 'Kirinyaga Central Sub County', 'KE_SubCounty_3048', 'Ulj33KBau7V', 'JKNaaTjVapG', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(119, 'Ulj33KBau7V', 'Kirinyaga East Sub County', 'KE_SubCounty_3050', 'Ulj33KBau7V', 'yOaHQLOLd1H', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(120, 'Ulj33KBau7V', 'Kirinyaga North/Mwea West Sub County', 'KE_SubCounty_3052', 'Ulj33KBau7V', 'f6EOn3xI9YH', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(121, 'Ulj33KBau7V', 'Kirinyaga South Sub County', 'KE_SubCounty_3051', 'Ulj33KBau7V', 'jHmpQUlnkQk', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(122, 'Ulj33KBau7V', 'Kirinyaga West Sub County', 'KE_SubCounty_3049', 'Ulj33KBau7V', 'A34NiI4rgnf', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(123, 'wsBsC6gjHvn', 'Kisauni Sub County', 'KE_SubCounty_3130', 'wsBsC6gjHvn', 'C1hO6wNOgrH', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(124, 'tAbBVBbueqD', 'Kisumu Central Sub County', 'KE_SubCounty_3066', 'tAbBVBbueqD', 'OpLt8IgyHop', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(125, 'tAbBVBbueqD', 'Kisumu East Sub County', 'KE_SubCounty_3068', 'tAbBVBbueqD', 'PRpKwAloU5b', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(126, 'tAbBVBbueqD', 'Kisumu West Sub County', 'KE_SubCounty_3067', 'tAbBVBbueqD', 'YzEDO9Mq4TR', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(127, 'j8o6iO4Njsi', 'Kitui Central Sub County', 'KE_SubCounty_3071', 'j8o6iO4Njsi', 'MWqQbxWqACn', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(128, 'j8o6iO4Njsi', 'Kitui East Sub County', 'KE_SubCounty_3070', 'j8o6iO4Njsi', 'd0Gu8FrRM0Y', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(129, 'j8o6iO4Njsi', 'Kitui Rural Sub County', 'KE_SubCounty_3072', 'j8o6iO4Njsi', 'vbauk0RRq9N', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(130, 'j8o6iO4Njsi', 'Kitui South Sub County', 'KE_SubCounty_3069', 'j8o6iO4Njsi', 'd3hSQ3EtnPk', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(131, 'j8o6iO4Njsi', 'Kitui West Sub County', 'KE_SubCounty_3073', 'j8o6iO4Njsi', 'cmWAJB5kCDW', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(132, 'sPkRcDvhGWA', 'Kitutu Chache North Sub County', 'KE_SubCounty_3054', 'sPkRcDvhGWA', 'cQkF9l9wePP', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(133, 'sPkRcDvhGWA', 'Kitutu Chache South Sub County', 'KE_SubCounty_3053', 'sPkRcDvhGWA', 'gPR82w2xgJZ', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(134, 'vvOK1BxTbet', 'Koibatek Sub County', 'KE_SubCounty_2953', 'vvOK1BxTbet', 'Yl9UDBnDvvW', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(135, 'HMNARUV2CW4', 'Konoin Sub County', 'KE_SubCounty_2959', 'HMNARUV2CW4', 'PLFoYJO8MVS', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(136, 'ob6SxuRcqU4', 'Kuresoi North Sub County', 'KE_SubCounty_3161', 'ob6SxuRcqU4', 'QBwORnYdu0e', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(137, 'ob6SxuRcqU4', 'Kuresoi South Sub County', 'KE_SubCounty_3162', 'ob6SxuRcqU4', 'QwGkDS0DNls', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(138, 'fVra3Pwta0Q', 'Kuria East Sub County', 'KE_SubCounty_3119', 'fVra3Pwta0Q', 'THm2tCJa2ZQ', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(139, 'fVra3Pwta0Q', 'Kuria West Sub County', 'KE_SubCounty_3120', 'fVra3Pwta0Q', 'jtBjNpL9FXS', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(140, 'R6f9znhg37c', 'Kutulo Sub County', 'KE_SubCounty_3258', 'R6f9znhg37c', 'iGFdm333PJ2', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(141, 'mThvosEflAU', 'Kwanza Sub County', 'KE_SubCounty_3219', 'mThvosEflAU', 'ABy8CNqf2e7', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(142, 'R6f9znhg37c', 'Lafey Sub County', 'KE_SubCounty_3100', 'R6f9znhg37c', 'nsfbHBS9tMT', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(143, 'uyOrcHZBpW0', 'Lagdera Sub County', 'KE_SubCounty_2992', 'uyOrcHZBpW0', 'J69iWev2zwu', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
(144, 'xuFdFy6t9AH', 'Laikipia East Sub County', 'KE_SubCounty_3086', 'xuFdFy6t9AH', 'pF6qPMIlHte', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(145, 'xuFdFy6t9AH', 'Laikipia North Sub County', 'KE_SubCounty_3085', 'xuFdFy6t9AH', 'RJyUfi5BQUm', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(146, 'xuFdFy6t9AH', 'Laikipia West Sub County', 'KE_SubCounty_3087', 'xuFdFy6t9AH', 'pXbWrnFPpKb', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(147, 'Eey8fT4Im3y', 'Laisamis Sub County', 'KE_SubCounty_3106', 'Eey8fT4Im3y', 'eZpy65ooW0m', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(148, 'NjWSbQTwys4', 'Lamu East Sub County', 'KE_SubCounty_3090', 'NjWSbQTwys4', 'cwnqFyTJIgX', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(149, 'NjWSbQTwys4', 'Lamu West Sub County', 'KE_SubCounty_3089', 'NjWSbQTwys4', 'Lfxw0DfD4jN', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(150, 'jkG3zaihdSs', 'Langata Sub County', 'KE_SubCounty_3152', 'jkG3zaihdSs', 'aTGYlhEw2Xx', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(151, 'qKzosKQPl6G', 'Lari Sub County', 'KE_SubCounty_3029', 'qKzosKQPl6G', 'nCziQtZ49jj', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(152, 'wsBsC6gjHvn', 'Likoni Sub County', 'KE_SubCounty_3128', 'wsBsC6gjHvn', 'iy93Mmi73Or', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(153, 'BjC1xL40gHo', 'Likuyani Sub County', 'KE_SubCounty_3021', 'BjC1xL40gHo', 'wMv0s3U2nnG', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(154, 'qKzosKQPl6G', 'Limuru Sub County', 'KE_SubCounty_3030', 'qKzosKQPl6G', 'xhVi71INcFs', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(155, 'kphDeKClFch', 'Loima Sub County', 'KE_SubCounty_3222', 'kphDeKClFch', 'OZiGQn2R8kK', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(156, 'Hsk1YV8kHkT', 'Loitokitok Sub County', 'KE_SubCounty_3006', 'Hsk1YV8kHkT', 'eyADpAXM834', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(157, 'sANMZ3lpqGs', 'Luanda Sub County', 'KE_SubCounty_3234', 'sANMZ3lpqGs', 'lkYdgjRSOoE', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(158, 'BjC1xL40gHo', 'Lugari Sub County', 'KE_SubCounty_3022', 'BjC1xL40gHo', 'ZOdhgR19Akq', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(159, 'N7YETT3A9r1', 'Lunga Lunga Sub County', 'KE_SubCounty_3079', 'N7YETT3A9r1', 'TdcYaufNV4p', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(160, 'BjC1xL40gHo', 'Lurambi Sub County', 'KE_SubCounty_3019', 'BjC1xL40gHo', 'Y3NjAhiBaZT', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(161, 'yhCUgGcCcOo', 'Machakos Sub County', 'KE_SubCounty_3092', 'yhCUgGcCcOo', 'KXc4ez8OAFz', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(162, 'nrI2khZx3d0', 'Magarini Sub County', 'KE_SubCounty_3041', 'nrI2khZx3d0', 'KMWrMZrlO5u', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(163, 'jkG3zaihdSs', 'Makadara Sub County', 'KE_SubCounty_3142', 'jkG3zaihdSs', 'wwROy3Qkwin', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(164, 'BoDytkJQ4Qi', 'Makueni Sub County', 'KE_SubCounty_3082', 'BoDytkJQ4Qi', 'AIGIQpolMRn', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(165, 'BjC1xL40gHo', 'Malava Sub County', 'KE_SubCounty_3020', 'BjC1xL40gHo', 'ES1CWa4AJmJ', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(166, 'nrI2khZx3d0', 'Malindi Sub County', 'KE_SubCounty_3042', 'nrI2khZx3d0', 'lGg3wEy784X', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(167, 'R6f9znhg37c', 'Mandera East Sub County', 'KE_SubCounty_3101', 'R6f9znhg37c', 'fGr9rRvaovO', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(168, 'R6f9znhg37c', 'Mandera North Sub County', 'KE_SubCounty_3103', 'R6f9znhg37c', 'jrm0uyLXnC1', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(169, 'R6f9znhg37c', 'Mandera South Sub County', 'KE_SubCounty_3102', 'R6f9znhg37c', 'qyhVIMG2rUw', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(170, 'R6f9znhg37c', 'Mandera West Sub County', 'KE_SubCounty_3105', 'R6f9znhg37c', 'H5RvDZkoDJL', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(171, 'uepLTG8wGWJ', 'Manga Sub County', 'KE_SubCounty_3183', 'uepLTG8wGWJ', 'f3AcdRzgTwz', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(172, 'PFu8alU2KWG', 'Manyatta Sub County', 'KE_SubCounty_2987', 'PFu8alU2KWG', 'IPOMRXiYjxr', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(173, 'MqnLxQBigG0', 'Marakwet East Sub County', 'KE_SubCounty_2982', 'MqnLxQBigG0', 'EZraJgLdRLX', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(174, 'MqnLxQBigG0', 'Marakwet West Sub County', 'KE_SubCounty_2983', 'MqnLxQBigG0', 'fNCuk4Lpsnh', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(175, 'vvOK1BxTbet', 'Marigat Sub County', 'KE_SubCounty_2955', 'vvOK1BxTbet', 'dSLnPmNlm8Q', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(176, 'uepLTG8wGWJ', 'Masaba North Sub County', 'KE_SubCounty_3182', 'uepLTG8wGWJ', 'Qn5Fff2lIDz', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(177, 'yhCUgGcCcOo', 'Masinga Sub County', 'KE_SubCounty_3098', 'yhCUgGcCcOo', 'hpcb7MYi6nc', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(178, 'Tvf1zgVZ0K4', 'Matayos Sub County', 'KE_SubCounty_2976', 'Tvf1zgVZ0K4', 'tvkI2HSIRW9', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(179, 'jkG3zaihdSs', 'Mathare Sub County', 'KE_SubCounty_3139', 'jkG3zaihdSs', 'gh2kzpOFCeF', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(180, 'ahwTMNAJvrL', 'Mathioya Sub County', 'KE_SubCounty_3138', 'ahwTMNAJvrL', 'u7Gkh63FYe4', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(181, 'ptWVfaCIdVx', 'Mathira East Sub County', 'KE_SubCounty_3192', 'ptWVfaCIdVx', 'vznKK4IegIL', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(182, 'ptWVfaCIdVx', 'Mathira West Sub County', 'KE_SubCounty_3193', 'ptWVfaCIdVx', 'msIc1uFAY6B', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(183, 'N7YETT3A9r1', 'Matuga Sub County', 'KE_SubCounty_3078', 'N7YETT3A9r1', 'wUNEDOnx9uB', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(184, 'yhCUgGcCcOo', 'Matungulu Sub County', 'KE_SubCounty_3095', 'yhCUgGcCcOo', 'GnixPSqaV6D', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(185, 'BjC1xL40gHo', 'Matungu Sub County', 'KE_SubCounty_3015', 'BjC1xL40gHo', 'ssbO49f0iLN', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(186, 'PFu8alU2KWG', 'Mbeere North Sub County', 'KE_SubCounty_2984', 'PFu8alU2KWG', 'eYBXetGx8xF', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(187, 'PFu8alU2KWG', 'Mbeere South Sub County', 'KE_SubCounty_2985', 'PFu8alU2KWG', 'AvnM6jKoocs', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(188, 'nK0A12Q7MvS', 'Mbita Sub County', 'KE_SubCounty_2996', 'nK0A12Q7MvS', 'mCGytMcMf6y', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(189, 'BoDytkJQ4Qi', 'Mbooni Sub County', 'KE_SubCounty_3084', 'BoDytkJQ4Qi', 'jxjGWCdfsib', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(190, 'bzOfj0iwfDH', 'Merti Sub County', 'KE_SubCounty_3005', 'bzOfj0iwfDH', 'NrGORu301bx', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(191, 'vvOK1BxTbet', 'Mogotio Sub County', 'KE_SubCounty_2954', 'vvOK1BxTbet', 'k5sxmlXAtIg', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(192, 'pZqQRRW7PHP', 'Moiben Sub County', 'KE_SubCounty_3230', 'pZqQRRW7PHP', 'q8R0FA1hxnP', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(193, 'ob6SxuRcqU4', 'Molo Sub County', 'KE_SubCounty_3166', 'ob6SxuRcqU4', 'RJ4LGJiSHFg', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(194, 't0J75eHKxz5', 'Mosop Sub County', 'KE_SubCounty_3167', 't0J75eHKxz5', 'Xtb7tbJpk9p', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(195, 'Eey8fT4Im3y', 'Moyale Sub County', 'KE_SubCounty_3109', 'Eey8fT4Im3y', 'sZjPgbWI5ra', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(196, 'N7YETT3A9r1', 'Msambweni Sub County', 'KE_SubCounty_3080', 'N7YETT3A9r1', 'ADMywdLwoRX', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(197, 'KGHhQ5GLd4k', 'Mt Elgon Sub County', 'KE_SubCounty_2972', 'KGHhQ5GLd4k', 'ZCYATXdLsL1', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(198, 'tAbBVBbueqD', 'Muhoroni Sub County', 'KE_SubCounty_3063', 'tAbBVBbueqD', 'NmbwkQ5r5cB', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(199, 'ptWVfaCIdVx', 'Mukurweini Sub County', 'KE_SubCounty_3190', 'ptWVfaCIdVx', 'zT8Zj5vNYCy', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(200, 'BjC1xL40gHo', 'Mumias East Sub County', 'KE_SubCounty_3016', 'BjC1xL40gHo', 'FBteTV1eqB6', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(201, 'BjC1xL40gHo', 'Mumias West Sub County', 'KE_SubCounty_3017', 'BjC1xL40gHo', 'uRl5fBkhpcE', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(202, 'ahwTMNAJvrL', 'Muranga South Sub County', 'KE_SubCounty_3135', 'ahwTMNAJvrL', 'l46g2PZUjoh', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(203, 'T4urHM47nlm', 'Muthambi Sub County', 'KE_SubCounty_3259', 'T4urHM47nlm', 'gLD3Q9fHpvy', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(204, 'wsBsC6gjHvn', 'Mvita Sub County', 'KE_SubCounty_3127', 'wsBsC6gjHvn', 'C1xuoa1NAMm', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(205, 'yhCUgGcCcOo', 'Mwala Sub County', 'KE_SubCounty_3091', 'yhCUgGcCcOo', 'fYYivceocJ2', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(206, 'QyGNX2DpR4h', 'Mwatate Sub County', 'KE_SubCounty_3207', 'QyGNX2DpR4h', 'IBDoGsLdhvt', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(207, 'T4urHM47nlm', 'Mwimbi Sub County', 'KE_SubCounty_3214', 'T4urHM47nlm', 'wQ8XjZ7zVwL', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(208, 'j8o6iO4Njsi', 'Mwingi Central Sub County', 'KE_SubCounty_3074', 'j8o6iO4Njsi', 'uE7HKhqPOtf', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(209, 'j8o6iO4Njsi', 'Mwingi North Sub County', 'KE_SubCounty_3076', 'j8o6iO4Njsi', 'KXM9VnhuLfP', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(210, 'j8o6iO4Njsi', 'Mwingi West Sub County', 'KE_SubCounty_3075', 'j8o6iO4Njsi', 'svwbDnzhgik', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(211, 'ob6SxuRcqU4', 'Naivasha Sub County', 'KE_SubCounty_3164', 'ob6SxuRcqU4', 'yZJJPoSGhY6', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(212, 'ob6SxuRcqU4', 'Nakuru East Sub County', 'KE_SubCounty_3156', 'ob6SxuRcqU4', 'FBJ9Y11esHS', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(213, 'ob6SxuRcqU4', 'Nakuru North Sub County', 'KE_SubCounty_3158', 'ob6SxuRcqU4', 'nwh9bXKykiS', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(214, 'ob6SxuRcqU4', 'Nakuru West Sub County', 'KE_SubCounty_3157', 'ob6SxuRcqU4', 'KTayLusaU5I', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(215, 'Tvf1zgVZ0K4', 'Nambale Sub County', 'KE_SubCounty_2977', 'Tvf1zgVZ0K4', 'e1J7R103h8I', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(216, 't0J75eHKxz5', 'Nandi Hills Sub County', 'KE_SubCounty_3170', 't0J75eHKxz5', 'W6Err8cQf5J', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(217, 'kqJ83J2D72s', 'Narok East Sub County', 'KE_SubCounty_3175', 'kqJ83J2D72s', 'gZM3NbHaugk', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(218, 'kqJ83J2D72s', 'Narok North Sub County', 'KE_SubCounty_3176', 'kqJ83J2D72s', 'fNROL0qm8De', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(219, 'kqJ83J2D72s', 'Narok South Sub County', 'KE_SubCounty_3174', 'kqJ83J2D72s', 'bnYzgzYe2Z7', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(220, 'kqJ83J2D72s', 'Narok West Sub County', 'KE_SubCounty_3173', 'kqJ83J2D72s', 'ouA247cg58A', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(221, 'BjC1xL40gHo', 'Navakholo Sub County', 'KE_SubCounty_3018', 'BjC1xL40gHo', 'G6PJ5kFVAuO', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(222, 'mYZacFNIB3h', 'Ndaragwa Sub County', 'KE_SubCounty_3184', 'mYZacFNIB3h', 'EESGLsSLTqH', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(223, 'nK0A12Q7MvS', 'Ndhiwa Sub County', 'KE_SubCounty_2997', 'nK0A12Q7MvS', 'i2Y2fyNoFyZ', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(224, 'ob6SxuRcqU4', 'Njoro Sub County', 'KE_SubCounty_3165', 'ob6SxuRcqU4', 'gSJXzH1DM75', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(225, 'Eey8fT4Im3y', 'North Horr Sub County', 'KE_SubCounty_3108', 'Eey8fT4Im3y', 'j6fqt5TYqPZ', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(226, 'tAbBVBbueqD', 'Nyakach Sub County', 'KE_SubCounty_3062', 'tAbBVBbueqD', 'kBQIjtWUBqj', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(227, 'wsBsC6gjHvn', 'Nyali Sub County', 'KE_SubCounty_3129', 'wsBsC6gjHvn', 'sr8WEz03EnP', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(228, 'uepLTG8wGWJ', 'Nyamira North Sub County', 'KE_SubCounty_3180', 'uepLTG8wGWJ', 'v5qbFUgfIoF', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(229, 'uepLTG8wGWJ', 'Nyamira Sub County', 'KE_SubCounty_3181', 'uepLTG8wGWJ', 'cxjRPbvhjzr', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(230, 'tAbBVBbueqD', 'Nyando Sub County', 'KE_SubCounty_3064', 'tAbBVBbueqD', 'iRK9uABUTVZ', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(231, 'sPkRcDvhGWA', 'Nyaribari Chache Sub County', 'KE_SubCounty_3055', 'sPkRcDvhGWA', 'fFh3beH29fD', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(232, 'sPkRcDvhGWA', 'Nyaribari Masaba Sub County', 'KE_SubCounty_3056', 'sPkRcDvhGWA', 'A6Sj8RumZ0m', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(233, 'fVra3Pwta0Q', 'Nyatike Sub County', 'KE_SubCounty_3121', 'fVra3Pwta0Q', 'D2lsuEzZAJP', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(234, 'ptWVfaCIdVx', 'Nyeri Central Sub County', 'KE_SubCounty_3189', 'ptWVfaCIdVx', 'GXnD5lHeanK', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(235, 'ptWVfaCIdVx', 'Nyeri South Sub County', 'KE_SubCounty_3191', 'ptWVfaCIdVx', 'dd7jowvUO95', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(236, 'mYZacFNIB3h', 'Oljoroorok Sub County', 'KE_SubCounty_3185', 'mYZacFNIB3h', 'fVSw60UAC3W', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(237, 'mYZacFNIB3h', 'Olkalou Sub County', 'KE_SubCounty_3186', 'mYZacFNIB3h', 'Lm9RMwhIu3G', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(238, 'XWALbfAPa6n', 'Pokot Central Sub County', 'KE_SubCounty_3246', 'XWALbfAPa6n', 'SCbMzaOeTuR', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(239, 'XWALbfAPa6n', 'Pokot North Sub County', 'KE_SubCounty_3245', 'XWALbfAPa6n', 'YXpHG1Ez8V2', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(240, 'XWALbfAPa6n', 'Pokot South Sub County', 'KE_SubCounty_3244', 'XWALbfAPa6n', 'u2zJahNiSP5', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(241, 'nrI2khZx3d0', 'Rabai Sub County', 'KE_SubCounty_3044', 'nrI2khZx3d0', 'hJf4rt7cvI6', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(242, 'nK0A12Q7MvS', 'Rachuonyo South Sub County', 'KE_SubCounty_3002', 'nK0A12Q7MvS', 'NhsAMiaS0TD', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(243, 'nK0A12Q7MvS', 'Rangwe Sub County', 'KE_SubCounty_2999', 'nK0A12Q7MvS', 'iK2Jk2AxhlD', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(244, 'u4t9H8XyU9P', 'Rarieda Sub County', 'KE_SubCounty_3200', 'u4t9H8XyU9P', 'XcRpb1xsM64', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(245, 'ob6SxuRcqU4', 'Rongai Sub County', 'KE_SubCounty_3159', 'ob6SxuRcqU4', 'OK0hW8DFHq3', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(246, 'fVra3Pwta0Q', 'Rongo Sub County', 'KE_SubCounty_3126', 'fVra3Pwta0Q', 'fT37q3rXQ35', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(247, 'jkG3zaihdSs', 'Roysambu Sub County', 'KE_SubCounty_3150', 'jkG3zaihdSs', 'j7GpbairCOi', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(248, 'jkG3zaihdSs', 'Ruaraka Sub County', 'KE_SubCounty_3148', 'jkG3zaihdSs', 'Cc8uEFkzfVf', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(249, 'qKzosKQPl6G', 'Ruiru Sub County', 'KE_SubCounty_3036', 'qKzosKQPl6G', 'TPRNJqSm4lK', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(250, 'PFu8alU2KWG', 'Runyenjes Sub County', 'KE_SubCounty_2986', 'PFu8alU2KWG', 'kMSLkN4nsRl', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(251, 'sANMZ3lpqGs', 'Sabatia Sub County', 'KE_SubCounty_3236', 'sANMZ3lpqGs', 'urtJSF5jcBC', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(252, 'mThvosEflAU', 'Saboti Sub County', 'KE_SubCounty_3217', 'mThvosEflAU', 'y2M16lesMsF', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(253, 'Eey8fT4Im3y', 'Saku Sub County', 'KE_SubCounty_3107', 'Eey8fT4Im3y', 'WILszL634oZ', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(254, 'o36zCRjSd4G', 'Samburu Central Sub County', 'KE_SubCounty_3199', 'o36zCRjSd4G', 'EmQRGVtvWy3', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(255, 'o36zCRjSd4G', 'Samburu East Sub County', 'KE_SubCounty_3197', 'o36zCRjSd4G', 'ldZ10N9unC9', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(256, 'o36zCRjSd4G', 'Samburu North Sub County', 'KE_SubCounty_3198', 'o36zCRjSd4G', 'E2DGjZRlwbY', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(257, 'Tvf1zgVZ0K4', 'Samia Sub County', 'KE_SubCounty_2974', 'Tvf1zgVZ0K4', 'NHRktMsAkO1', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(258, 'tAbBVBbueqD', 'Seme Sub County', 'KE_SubCounty_3065', 'tAbBVBbueqD', 'LRNmnMw1fBs', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(259, 'BjC1xL40gHo', 'Shinyalu Sub County', 'KE_SubCounty_3012', 'BjC1xL40gHo', 'sjlSPeRgl7d', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(260, 'ihZsJ8alvtb', 'Sigowet/Soin Sub County', 'KE_SubCounty_3023', 'ihZsJ8alvtb', 'ScLzA7tQxrH', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(261, 'KGHhQ5GLd4k', 'Sirisia Sub County', 'KE_SubCounty_2971', 'KGHhQ5GLd4k', 'whWfFA9D7td', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(262, 'HMNARUV2CW4', 'Sotik Sub County', 'KE_SubCounty_2963', 'HMNARUV2CW4', 'KyuSYunELJI', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(263, 'sPkRcDvhGWA', 'South Mugirango Sub County', 'KE_SubCounty_3060', 'sPkRcDvhGWA', 'WHG67QCDRS9', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(264, 'pZqQRRW7PHP', 'Soy Sub County', 'KE_SubCounty_3232', 'pZqQRRW7PHP', 'lmr1q6dTaso', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(265, 'jkG3zaihdSs', 'Starehe Sub County', 'KE_SubCounty_3140', 'jkG3zaihdSs', 'nKHlZyN0lt9', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(266, 'nK0A12Q7MvS', 'Suba South Sub County', 'KE_SubCounty_2995', 'nK0A12Q7MvS', 'HoRW5aISmiD', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(267, 'ob6SxuRcqU4', 'Subukia Sub County', 'KE_SubCounty_3160', 'ob6SxuRcqU4', 'zQEuNRaPYgE', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(268, 'fVra3Pwta0Q', 'Suna East Sub County', 'KE_SubCounty_3124', 'fVra3Pwta0Q', 'nHEr5EciFh0', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(269, 'fVra3Pwta0Q', 'Suna West Sub County', 'KE_SubCounty_3123', 'fVra3Pwta0Q', 'VtuwXD7O1O9', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(270, 'CeLsrJOH0g9', 'Tarbaj Sub County', 'KE_SubCounty_3241', 'CeLsrJOH0g9', 'fmNokBURXjM', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(271, 'QyGNX2DpR4h', 'Taveta Sub County', 'KE_SubCounty_3209', 'QyGNX2DpR4h', 'jNzRdAwjaQ1', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(272, 'Tvf1zgVZ0K4', 'Teso North Sub County', 'KE_SubCounty_2979', 'Tvf1zgVZ0K4', 'GpEIlwz3FvT', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(273, 'Tvf1zgVZ0K4', 'Teso South Sub County', 'KE_SubCounty_2978', 'Tvf1zgVZ0K4', 'EhchjCHkhJ9', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(274, 'ptWVfaCIdVx', 'Tetu Sub County', 'KE_SubCounty_3196', 'ptWVfaCIdVx', 'YT3tecc4atw', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(275, 'T4urHM47nlm', 'Tharaka North Sub County', 'KE_SubCounty_3212', 'T4urHM47nlm', 'ZNXf7qiVh3t', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(276, 'T4urHM47nlm', 'Tharaka South Sub County', 'KE_SubCounty_3211', 'T4urHM47nlm', 'Yz1V5Cx8CO2', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(277, 'qKzosKQPl6G', 'Thika Town Sub County', 'KE_SubCounty_3037', 'qKzosKQPl6G', 'YZAZ1a9MIvX', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(278, 'vvOK1BxTbet', 'Tiaty East Sub County', 'KE_SubCounty_2958', 'vvOK1BxTbet', 'st4v8xfqgJf', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(279, 'Y52XNJ50hYb', 'Tigania Central Sub County', 'KE_SubCounty_3261', 'Y52XNJ50hYb', 'NIVPdmQjQKg', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(280, 'Y52XNJ50hYb', 'Tigania East Sub County', 'KE_SubCounty_3114', 'Y52XNJ50hYb', 'U3lGZ71W9Te', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(281, 'Y52XNJ50hYb', 'Tigania West Sub County', 'KE_SubCounty_3115', 'Y52XNJ50hYb', 'Q4xAPhWUnYC', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(282, 't0J75eHKxz5', 'Tinderet Sub County', 'KE_SubCounty_3172', 't0J75eHKxz5', 'NPYRMdqrK6L', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(283, 'KGHhQ5GLd4k', 'Tongaren Sub County', 'KE_SubCounty_2964', 'KGHhQ5GLd4k', 'orUwYD52An3', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(284, 'kqJ83J2D72s', 'Transmara East Sub County', 'KE_SubCounty_3177', 'kqJ83J2D72s', 'PGTkGnIAZuy', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(285, 'kqJ83J2D72s', 'Transmara West Sub County', 'KE_SubCounty_3178', 'kqJ83J2D72s', 'Nb6e34jNGAq', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(286, 'pZqQRRW7PHP', 'Turbo Sub County', 'KE_SubCounty_3231', 'pZqQRRW7PHP', 'KuprsuBe1l0', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(287, 'kphDeKClFch', 'Turkana Central Sub County', 'KE_SubCounty_3223', 'kphDeKClFch', 'zd8rhYqGowE', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(288, 'kphDeKClFch', 'Turkana East Sub County', 'KE_SubCounty_3220', 'kphDeKClFch', 'dr8gOvVAdiE', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(289, 'kphDeKClFch', 'Turkana North Sub County', 'KE_SubCounty_3225', 'kphDeKClFch', 'mWpq607yRXh', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(290, 'kphDeKClFch', 'Turkana South Sub County', 'KE_SubCounty_3221', 'kphDeKClFch', 'iTw0sFjlqZ2', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(291, 'kphDeKClFch', 'Turkana West Sub County', 'KE_SubCounty_3224', 'kphDeKClFch', 'HK5SUCMQmsw', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(292, 'u4t9H8XyU9P', 'Ugenya Sub County', 'KE_SubCounty_3205', 'u4t9H8XyU9P', 'InECuIlzJGx', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(293, 'u4t9H8XyU9P', 'Ugunja Sub County', 'KE_SubCounty_3204', 'u4t9H8XyU9P', 'm9nsQ1MXlVU', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(294, 'fVra3Pwta0Q', 'Uriri Sub County', 'KE_SubCounty_3122', 'fVra3Pwta0Q', 'fCInDXluNhx', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(295, 'sANMZ3lpqGs', 'Vihiga Sub County', 'KE_SubCounty_3237', 'sANMZ3lpqGs', 'OOF3UX4yOt7', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(296, 'QyGNX2DpR4h', 'Voi Sub County', 'KE_SubCounty_3206', 'QyGNX2DpR4h', 'yoGLpCTgjed', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(297, 'CeLsrJOH0g9', 'Wajir East Sub County', 'KE_SubCounty_3242', 'CeLsrJOH0g9', 'uov0yFMw9Qm', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(298, 'CeLsrJOH0g9', 'Wajir North Sub County', 'KE_SubCounty_3243', 'CeLsrJOH0g9', 'qsjAa8FE8OS', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(299, 'CeLsrJOH0g9', 'Wajir South Sub County', 'KE_SubCounty_3238', 'CeLsrJOH0g9', 'U7KFQn3Up3o', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(300, 'CeLsrJOH0g9', 'Wajir West Sub County', 'KE_SubCounty_3240', 'CeLsrJOH0g9', 'X98G0eIWdmP', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(301, 'KGHhQ5GLd4k', 'Webuye East Sub County', 'KE_SubCounty_2967', 'KGHhQ5GLd4k', 'f4AOiG8fYtn', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(302, 'KGHhQ5GLd4k', 'Webuye West Sub County', 'KE_SubCounty_2966', 'KGHhQ5GLd4k', 'aqYhbqKclsI', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(303, 'jkG3zaihdSs', 'Westlands Sub County', 'KE_SubCounty_3155', 'jkG3zaihdSs', 'f1T0Ltob8VQ', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(304, 'XWALbfAPa6n', 'West Pokot Sub County', 'KE_SubCounty_3247', 'XWALbfAPa6n', 'ylWg6VvADJE', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(305, 'QyGNX2DpR4h', 'Wundanyi Sub County', 'KE_SubCounty_3208', 'QyGNX2DpR4h', 'AM36DdkZ36Y', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
(306, 'yhCUgGcCcOo', 'Yatta Sub County', 'KE_SubCounty_3097', 'yhCUgGcCcOo', 'CeukNtGhW7J', '2026-03-16 11:14:38', '2026-03-16 11:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `status` enum('new','replied','closed') NOT NULL DEFAULT 'new',
  `reply` text DEFAULT NULL,
  `replied_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coordinators`
--

CREATE TABLE `coordinators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `kra_pin` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `ippd_number` varchar(255) DEFAULT NULL,
  `date_of_first_appointment` date DEFAULT NULL,
  `terms_of_engagement` varchar(255) DEFAULT NULL,
  `pwd_status` varchar(255) DEFAULT NULL,
  `disability_type` varchar(255) DEFAULT NULL,
  `impairment_details` varchar(255) DEFAULT NULL,
  `pwd_number` varchar(255) DEFAULT NULL,
  `ethnicity_id` varchar(255) DEFAULT NULL,
  `job_group_id` varchar(255) DEFAULT NULL,
  `county_id` varchar(255) DEFAULT NULL,
  `subcounty_id` varchar(255) DEFAULT NULL,
  `ward_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coordinators`
--

INSERT INTO `coordinators` (`id`, `user_id`, `id_number`, `kra_pin`, `gender`, `dob`, `image_path`, `school_id`, `ippd_number`, `date_of_first_appointment`, `terms_of_engagement`, `pwd_status`, `disability_type`, `impairment_details`, `pwd_number`, `ethnicity_id`, `job_group_id`, `county_id`, `subcounty_id`, `ward_id`, `created_at`, `updated_at`) VALUES
(2, 23, '33811804', 'A00101NDJK', 'male', '1978-09-26', NULL, '6', NULL, NULL, NULL, 'No', NULL, NULL, NULL, 'kikuyu', NULL, 'xuFdFy6t9AH', 'pF6qPMIlHte', '0', '2026-03-24 10:09:41', '2026-03-24 10:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` varchar(255) NOT NULL,
  `county_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`id`, `county_id`, `name`, `code`, `created_at`, `updated_at`) VALUES
('vvOK1BxTbet', 'vvOK1BxTbet', 'Baringo County', 'KE_County_30', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('HMNARUV2CW4', 'HMNARUV2CW4', 'Bomet County', 'KE_County_36', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('KGHhQ5GLd4k', 'KGHhQ5GLd4k', 'Bungoma County', 'KE_County_39', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('Tvf1zgVZ0K4', 'Tvf1zgVZ0K4', 'Busia County', 'KE_County_40', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('MqnLxQBigG0', 'MqnLxQBigG0', 'Elgeyo Marakwet County', 'KE_County_28', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('PFu8alU2KWG', 'PFu8alU2KWG', 'Embu County', 'KE_County_14', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('uyOrcHZBpW0', 'uyOrcHZBpW0', 'Garissa County', 'KE_County_7', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('nK0A12Q7MvS', 'nK0A12Q7MvS', 'Homa Bay County', 'KE_County_43', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('bzOfj0iwfDH', 'bzOfj0iwfDH', 'Isiolo County', 'KE_County_11', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('Hsk1YV8kHkT', 'Hsk1YV8kHkT', 'Kajiado County', 'KE_County_34', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('BjC1xL40gHo', 'BjC1xL40gHo', 'Kakamega County', 'KE_County_37', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('ihZsJ8alvtb', 'ihZsJ8alvtb', 'Kericho County', 'KE_County_35', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('qKzosKQPl6G', 'qKzosKQPl6G', 'Kiambu County', 'KE_County_22', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('nrI2khZx3d0', 'nrI2khZx3d0', 'Kilifi County', 'KE_County_3', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('Ulj33KBau7V', 'Ulj33KBau7V', 'Kirinyaga County', 'KE_County_20', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('sPkRcDvhGWA', 'sPkRcDvhGWA', 'Kisii County', 'KE_County_45', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('tAbBVBbueqD', 'tAbBVBbueqD', 'Kisumu County', 'KE_County_42', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('j8o6iO4Njsi', 'j8o6iO4Njsi', 'Kitui County', 'KE_County_15', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('N7YETT3A9r1', 'N7YETT3A9r1', 'Kwale County', 'KE_County_2', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('xuFdFy6t9AH', 'xuFdFy6t9AH', 'Laikipia County', 'KE_County_31', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('NjWSbQTwys4', 'NjWSbQTwys4', 'Lamu County', 'KE_County_5', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('yhCUgGcCcOo', 'yhCUgGcCcOo', 'Machakos County', 'KE_County_16', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('BoDytkJQ4Qi', 'BoDytkJQ4Qi', 'Makueni County', 'KE_County_17', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('R6f9znhg37c', 'R6f9znhg37c', 'Mandera County', 'KE_County_9', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('Eey8fT4Im3y', 'Eey8fT4Im3y', 'Marsabit County', 'KE_County_10', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('Y52XNJ50hYb', 'Y52XNJ50hYb', 'Meru County', 'KE_County_12', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('fVra3Pwta0Q', 'fVra3Pwta0Q', 'Migori County', 'KE_County_44', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('wsBsC6gjHvn', 'wsBsC6gjHvn', 'Mombasa County', 'KE_County_1', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('ahwTMNAJvrL', 'ahwTMNAJvrL', 'Muranga County', 'KE_County_21', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('jkG3zaihdSs', 'jkG3zaihdSs', 'Nairobi County', 'KE_County_47', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('ob6SxuRcqU4', 'ob6SxuRcqU4', 'Nakuru County', 'KE_County_32', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('t0J75eHKxz5', 't0J75eHKxz5', 'Nandi County', 'KE_County_29', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('kqJ83J2D72s', 'kqJ83J2D72s', 'Narok County', 'KE_County_33', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('uepLTG8wGWJ', 'uepLTG8wGWJ', 'Nyamira County', 'KE_County_46', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('mYZacFNIB3h', 'mYZacFNIB3h', 'Nyandarua County', 'KE_County_18', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('ptWVfaCIdVx', 'ptWVfaCIdVx', 'Nyeri County', 'KE_County_19', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('o36zCRjSd4G', 'o36zCRjSd4G', 'Samburu County', 'KE_County_25', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('u4t9H8XyU9P', 'u4t9H8XyU9P', 'Siaya County', 'KE_County_41', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('QyGNX2DpR4h', 'QyGNX2DpR4h', 'Taita Taveta County', 'KE_County_6', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('JsH2bnvNt2d', 'JsH2bnvNt2d', 'Tana River County', 'KE_County_4', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('T4urHM47nlm', 'T4urHM47nlm', 'Tharaka Nithi County', 'KE_County_13', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('mThvosEflAU', 'mThvosEflAU', 'Trans Nzoia County', 'KE_County_26', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('kphDeKClFch', 'kphDeKClFch', 'Turkana County', 'KE_County_23', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('pZqQRRW7PHP', 'pZqQRRW7PHP', 'Uasin Gishu County', 'KE_County_27', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('sANMZ3lpqGs', 'sANMZ3lpqGs', 'Vihiga County', 'KE_County_38', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('CeLsrJOH0g9', 'CeLsrJOH0g9', 'Wajir County', 'KE_County_8', '2026-03-16 11:14:37', '2026-03-16 11:14:37'),
('XWALbfAPa6n', 'XWALbfAPa6n', 'West Pokot County', 'KE_County_24', '2026-03-16 11:14:37', '2026-03-16 11:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `depart_ment_workers`
--

CREATE TABLE `depart_ment_workers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `kra_pin` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `religion` varchar(255) NOT NULL,
  `passport_photo_attachment` varchar(255) NOT NULL,
  `constituency_id` bigint(20) UNSIGNED NOT NULL,
  `ward_id` bigint(20) UNSIGNED NOT NULL,
  `sublocation_id` bigint(20) UNSIGNED NOT NULL,
  `village` varchar(255) NOT NULL,
  `next_of_kin_full_names` varchar(255) NOT NULL,
  `next_of_kin_id_number` varchar(255) NOT NULL,
  `next_of_kin_phone_number` varchar(255) NOT NULL,
  `next_of_kin_relationship` varchar(255) NOT NULL,
  `next_of_kin_gender` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `is_required`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Passport photo', 1, 1, '2026-03-23 04:04:15', '2026-03-23 04:04:15'),
(2, 'Appointment letter', 1, 1, '2026-03-23 04:04:36', '2026-03-23 04:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `ecde_schools`
--

CREATE TABLE `ecde_schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `number_of_classes` varchar(255) DEFAULT NULL,
  `class_rooms_status` varchar(255) DEFAULT NULL,
  `county_id` varchar(255) DEFAULT NULL,
  `subcounty_id` varchar(255) DEFAULT NULL,
  `feeder_id` varchar(255) DEFAULT NULL,
  `teacher_id` varchar(255) DEFAULT NULL,
  `number_of_students` int(11) DEFAULT NULL,
  `school_location` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `center_code` varchar(255) DEFAULT NULL,
  `sub_location_id` varchar(255) DEFAULT NULL,
  `ward_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ecde_schools`
--

INSERT INTO `ecde_schools` (`id`, `school_name`, `number_of_classes`, `class_rooms_status`, `county_id`, `subcounty_id`, `feeder_id`, `teacher_id`, `number_of_students`, `school_location`, `remarks`, `created_at`, `updated_at`, `center_code`, `sub_location_id`, `ward_id`) VALUES
(6, 'KARUGA ECDE', '2', 'permanent', 'xuFdFy6t9AH', 'pF6qPMIlHte', NULL, '7', NULL, '000', 'BUILT ON PUBLIC LAND', '2026-03-24 10:08:34', '2026-03-29 06:10:12', 'e12121', NULL, 'DpYpJ6E1vRc'),
(7, 'Kirk Stevenson', '542', 'temporary', 'HMNARUV2CW4', 'KyuSYunELJI', NULL, '7', NULL, 'Quasi aliquip qui vi', 'Tempor in nisi anim', '2026-03-26 08:33:07', '2026-03-26 08:33:07', 'Sint quis laboriosam', NULL, NULL),
(8, 'Victoria Luna', NULL, NULL, 'qKzosKQPl6G', 'SBz4c48i24Y', '4', '11', NULL, NULL, 'Consequat Labore al', '2026-03-27 08:32:52', '2026-03-27 08:32:52', 'Aut quos eiusmod et', NULL, 'B7Ek2TSSkr9'),
(9, 'Norman Alvarez', NULL, NULL, 'kphDeKClFch', 'zd8rhYqGowE', '4', '12', NULL, NULL, 'Distinctio Ea et ex', '2026-03-27 08:33:49', '2026-03-27 08:33:49', 'Assumenda minim aper', NULL, 'qQtpJ2wdCay');

-- --------------------------------------------------------

--
-- Table structure for table `education_histories`
--

CREATE TABLE `education_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `award` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `certificate_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education_histories`
--

INSERT INTO `education_histories` (`id`, `user_id`, `institution_name`, `award`, `course`, `grade`, `start_date`, `end_date`, `certificate_no`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sonya Montgomery', 'diploma', NULL, 'Excepteur aliqua In', '2001-07-24', '1976-03-28', '769', '2026-03-23 05:32:15', '2026-03-23 05:32:15'),
(2, 1, 'Aubrey Huffman', 'masters', NULL, 'Minim ut illo irure', '1997-04-07', '1979-08-21', '387', '2026-03-23 05:33:02', '2026-03-23 05:33:02'),
(3, 7, 'Montana Valentine', 'kcpe', NULL, 'Quae laboriosam exc', '2001-10-07', '1977-07-11', '399', '2026-03-23 09:31:33', '2026-03-23 09:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `ethnic_groups`
--

CREATE TABLE `ethnic_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ethnic_groups`
--

INSERT INTO `ethnic_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Basuba', NULL, NULL),
(2, 'Embu', NULL, NULL),
(3, 'Kamba', NULL, NULL),
(4, 'Kikuyu', NULL, NULL),
(5, 'Kisii', NULL, NULL),
(6, 'Kuria', NULL, NULL),
(7, 'Luo', NULL, NULL),
(8, 'Walwana', NULL, NULL),
(9, 'Masai', NULL, NULL),
(10, 'Mbeere', NULL, NULL),
(11, 'Meru', NULL, NULL),
(12, 'Nubi', NULL, NULL),
(13, 'Samburu', NULL, NULL),
(14, 'Taita', NULL, NULL),
(15, 'Taveta', NULL, NULL),
(16, 'Teso', NULL, NULL),
(17, 'Tharaka', NULL, NULL),
(18, 'Turkana', NULL, NULL),
(19, 'Luhya', NULL, NULL),
(20, 'Luhya ', NULL, NULL),
(21, 'Bakhayo', NULL, NULL),
(22, 'Banyala', NULL, NULL),
(23, 'Banyore', NULL, NULL),
(24, 'Batsotso', NULL, NULL),
(25, 'Bukusu', NULL, NULL),
(26, 'Idakho', NULL, NULL),
(27, 'Isukha', NULL, NULL),
(28, 'Kabras', NULL, NULL),
(29, 'Kisa', NULL, NULL),
(30, 'Marachi', NULL, NULL),
(31, 'Maragoli', NULL, NULL),
(32, 'Marama', NULL, NULL),
(33, 'Samia', NULL, NULL),
(34, 'Tachoni', NULL, NULL),
(35, 'Tiriki', NULL, NULL),
(36, 'Tura', NULL, NULL),
(37, 'Wanga', NULL, NULL),
(38, 'Mijikenda', NULL, NULL),
(39, 'Mijikenda ', NULL, NULL),
(40, 'Boni', NULL, NULL),
(41, 'Chonyi', NULL, NULL),
(42, 'Dahalo', NULL, NULL),
(43, 'Digo', NULL, NULL),
(44, 'Duruma', NULL, NULL),
(45, 'Giriama', NULL, NULL),
(46, 'Jibana', NULL, NULL),
(47, 'Kambe', NULL, NULL),
(48, 'Kauma', NULL, NULL),
(49, 'Pokomo', NULL, NULL),
(50, 'Rabai', NULL, NULL),
(51, 'Ribe', NULL, NULL),
(52, 'Waata', NULL, NULL),
(53, 'Swahili', NULL, NULL),
(54, 'Swahili ', NULL, NULL),
(55, 'Amu', NULL, NULL),
(56, 'Bajuni', NULL, NULL),
(57, 'Chitundi', NULL, NULL),
(58, 'Jomvu', NULL, NULL),
(59, 'Munyoyaya', NULL, NULL),
(60, 'Mvita', NULL, NULL),
(61, 'Ngare', NULL, NULL),
(62, 'Pate', NULL, NULL),
(63, 'Siu', NULL, NULL),
(64, 'Vumba', NULL, NULL),
(65, 'Wachangamwe', NULL, NULL),
(66, 'Wafaza', NULL, NULL),
(67, 'Wakatwa', NULL, NULL),
(68, 'Wakilifi', NULL, NULL),
(69, 'Wakilindini', NULL, NULL),
(70, 'Wamtwapa', NULL, NULL),
(71, 'Washaka', NULL, NULL),
(72, 'Watangana', NULL, NULL),
(73, 'Watikuu', NULL, NULL),
(74, 'Kalenjin', NULL, NULL),
(75, 'Arror', NULL, NULL),
(76, 'Bung’omek', NULL, NULL),
(77, 'Cherangany', NULL, NULL),
(78, 'Dorobo', NULL, NULL),
(79, 'El Molo', NULL, NULL),
(80, 'Endo', NULL, NULL),
(81, 'Keiyo', NULL, NULL),
(82, 'Kipsigis', NULL, NULL),
(83, 'Marakwet', NULL, NULL),
(84, 'Nandi', NULL, NULL),
(85, 'Ogiek', NULL, NULL),
(86, 'Saboat', NULL, NULL),
(87, 'Samor', NULL, NULL),
(88, 'Senger', NULL, NULL),
(89, 'Sengwer', NULL, NULL),
(90, 'Terik', NULL, NULL),
(91, 'Tugen', NULL, NULL),
(92, 'Pokot', NULL, NULL),
(93, 'Endorois', NULL, NULL),
(94, 'Kenyan Somali', NULL, NULL),
(95, 'Somali ', NULL, NULL),
(96, 'Ajuran', NULL, NULL),
(97, 'Degodia', NULL, NULL),
(98, 'Gurreh', NULL, NULL),
(99, 'Hawiyah', NULL, NULL),
(100, 'Murile', NULL, NULL),
(101, 'Ogaden', NULL, NULL),
(102, 'Ilchamus', NULL, NULL),
(103, 'Njemps', NULL, NULL),
(104, 'Borana', NULL, NULL),
(105, 'Burji', NULL, NULL),
(106, 'Dasenach', NULL, NULL),
(107, 'Gabra', NULL, NULL),
(108, 'Galla', NULL, NULL),
(109, 'Gosha', NULL, NULL),
(110, 'Konso', NULL, NULL),
(111, 'Orma', NULL, NULL),
(112, 'Rendile', NULL, NULL),
(113, 'Sakuye', NULL, NULL),
(114, 'Waat', NULL, NULL),
(115, 'Galjeel', NULL, NULL),
(116, 'Kenyan Arabs', NULL, NULL),
(117, 'Kenyan Asians', NULL, NULL),
(118, 'Kenyan Europeans', NULL, NULL),
(119, 'Kenyan Americans', NULL, NULL),
(120, 'Isaak', NULL, NULL),
(121, 'Leysan', NULL, NULL),
(122, 'East Africa', NULL, NULL),
(123, 'Uganda', NULL, NULL),
(124, 'Tanzania', NULL, NULL),
(125, 'Rwanda', NULL, NULL),
(126, 'Burundi', NULL, NULL),
(127, 'Other Africans', NULL, NULL),
(128, 'Asians', NULL, NULL),
(129, 'Europe', NULL, NULL),
(130, 'Americans', NULL, NULL),
(131, 'Caribbeans', NULL, NULL);

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` varchar(255) NOT NULL,
  `answer` longtext NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` enum('draft','published') NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feeder_schools`
--

CREATE TABLE `feeder_schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `number_of_classes` varchar(255) DEFAULT NULL,
  `class_rooms_status` varchar(255) DEFAULT NULL,
  `county_id` varchar(255) DEFAULT NULL,
  `subcounty_id` varchar(255) DEFAULT NULL,
  `ward_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` varchar(255) DEFAULT NULL,
  `number_of_students` int(11) DEFAULT NULL,
  `school_location` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feeder_schools`
--

INSERT INTO `feeder_schools` (`id`, `school_name`, `number_of_classes`, `class_rooms_status`, `county_id`, `subcounty_id`, `ward_id`, `teacher_id`, `number_of_students`, `school_location`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'Tanisha Hodge', '604', 'mud_walled', 'sPkRcDvhGWA', 'cQkF9l9wePP', 0, '3', NULL, 'Ducimus consequatur', 'In dignissimos ea fa', '2026-03-17 09:08:28', '2026-03-17 09:08:28'),
(2, 'Otto Estrada', '972', 'mud_walled', 'sANMZ3lpqGs', 'BXaq5PxSfz2', 0, '3', NULL, 'Nihil dolore enim ob', 'Irure et dolore in m', '2026-03-17 09:08:44', '2026-03-17 09:08:44'),
(3, 'Nomlanga Duffy', '660', 'one_semipermanent_others_permanent', 'Hsk1YV8kHkT', 'wYsCfCAUWNB', 0, '2', NULL, 'Ab provident modi q', 'Sint in et esse ad', '2026-03-17 09:09:45', '2026-03-17 09:09:45'),
(4, 'Thingithu ECDE', '2', 'Semi_Permanent', 'xuFdFy6t9AH', 'pF6qPMIlHte', 0, '7', NULL, '1388,93837', 'Built on public land.', '2026-03-24 12:32:32', '2026-03-24 12:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `slug`, `description`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'School Events 2026', 'school-events-2026', 'Photos from various school events throughout 2026', 1, 'published', '2026-03-27 03:25:19', '2026-03-27 03:25:19'),
(2, 'ECDE Programs', 'ecde-programs', 'Photos showcasing our ECDE programs and activities', 1, 'published', '2026-03-27 03:25:19', '2026-03-27 03:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `image_path`, `caption`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, '/images/placeholder-1.jpg', 'School Opening Ceremony', 1, '2026-03-27 03:25:19', '2026-03-27 03:25:19'),
(2, 1, '/images/placeholder-2.jpg', 'Sports Day', 2, '2026-03-27 03:25:19', '2026-03-27 03:25:19'),
(3, 1, '/images/placeholder-3.jpg', 'Academic Excellence Awards', 3, '2026-03-27 03:25:19', '2026-03-27 03:25:19'),
(4, 2, '/images/placeholder-4.jpg', 'Classroom Activities', 1, '2026-03-27 03:25:19', '2026-03-27 03:25:19'),
(5, 2, '/images/placeholder-5.jpg', 'Play Time', 2, '2026-03-27 03:25:19', '2026-03-27 03:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `job_groups`
--

CREATE TABLE `job_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_groups`
--

INSERT INTO `job_groups` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'JOB GROUP K', NULL, '2026-03-24 10:17:30', '2026-03-24 10:17:30'),
(4, 'JOB GROUP J', NULL, '2026-03-24 10:17:40', '2026-03-24 10:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `learners`
--

CREATE TABLE `learners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `pwd_status` varchar(255) DEFAULT NULL,
  `disability_type` varchar(255) DEFAULT NULL,
  `impairment_details` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nemis_number` varchar(255) DEFAULT NULL,
  `sub_location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `passport_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `mode_of_admission` varchar(255) DEFAULT NULL,
  `date_of_admission` date DEFAULT NULL,
  `birth_certificate_number` varchar(255) DEFAULT NULL,
  `nationality_id` varchar(255) DEFAULT NULL,
  `admission_number` varchar(255) DEFAULT NULL,
  `pwd_number` varchar(255) DEFAULT NULL,
  `ward_id` varchar(255) DEFAULT NULL,
  `family_setup` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learners`
--

INSERT INTO `learners` (`id`, `first_name`, `last_name`, `middle_name`, `pwd_status`, `disability_type`, `impairment_details`, `dob`, `nemis_number`, `sub_location_id`, `student_type_id`, `gender`, `village`, `school_id`, `passport_photo`, `created_at`, `updated_at`, `class`, `mode_of_admission`, `date_of_admission`, `birth_certificate_number`, `nationality_id`, `admission_number`, `pwd_number`, `ward_id`, `family_setup`) VALUES
(1, 'Sonya', 'Pate', 'Cain Rich', 'Yes', 'Speech & Language Impairment', 'new', '2005-07-24', '813', 6, NULL, 'female', 'Similique quia sunt', '6', NULL, '2026-03-26 06:46:53', '2026-03-26 06:46:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Sonya', 'Pate', 'Cain Rich', 'Yes', 'Speech & Language Impairment', 'new', '2005-07-24', '813', 6, NULL, 'female', 'Similique quia sunt', '6', NULL, '2026-03-26 06:47:23', '2026-03-26 06:47:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Brenden', 'Dyer', 'Chaim Peters', 'No', NULL, NULL, '2013-04-28', '903', 5, NULL, 'Select Gender', 'Hic enim doloremque', '6', NULL, '2026-03-26 10:14:33', '2026-03-26 10:14:33', 'PP2', 'new', '1974-09-04', '789', '1', '668', NULL, NULL, NULL),
(4, 'Flynn', 'Rogers', 'Bianca Miller', 'No', NULL, NULL, '1992-08-19', '44', 6, NULL, 'male', 'Cumque omnis molesti', 'Select School', NULL, '2026-03-26 10:17:58', '2026-03-26 10:17:58', 'PP1', 'transfer', '1973-02-21', '732', '1', '397', NULL, NULL, NULL),
(5, 'Cullen', 'Hughes', 'Lael Hooper', 'No', NULL, NULL, '1986-01-24', '393', 6, NULL, 'male', 'Aspernatur aliquam s', '6', NULL, '2026-03-26 10:18:36', '2026-03-26 10:18:36', 'PP2', 'transfer', '2000-09-23', '653', '1', '314', NULL, NULL, NULL),
(6, 'Lana', 'Scott', 'Idola Vargas', 'No', NULL, NULL, '1993-10-27', '199', 6, NULL, 'male', 'Dolore quibusdam rei', '6', 'learners/passport-photos/uCyP5c1f0b77Go4FflJojB8aeE3KZTeHSRbb4D2z.jpg', '2026-03-26 10:32:53', '2026-03-26 10:32:53', 'PP1', 'new', '2025-04-17', '922', '1', '884', NULL, NULL, NULL),
(7, 'Edan', 'Franco', 'Gray Hensley', 'Yes', 'Hearing Impairment (Deaf)', 'Velit et quibusdam q', '1986-02-02', '323', 6, NULL, 'male', 'Sequi molestiae id s', '7', 'learners/passport-photos/J09uzRiWa7mLAA7sW4QmGp3hXdg9zCY0VvtvMth0.jpg', '2026-03-27 03:31:31', '2026-03-27 03:31:31', 'PP2', 'transfer', '1971-08-21', '894', '89', '564', '193', NULL, NULL),
(8, 'Imani', 'Barrera', 'Hedda Harrison', 'Yes', 'Speech & Language Impairment', 'Vel commodi cum cons', '1983-04-06', '89', 6, NULL, 'female', 'Dolor tempor delectu', '6', 'learners/passport-photos/MRom0uVS7xc0My0FH4veZbQwS7F72nDpIxzgXu0C.jpg', '2026-03-27 03:42:36', '2026-03-27 11:07:33', 'Baby Class', 'new', '2007-01-14', '970', '175', '524', '283', 'd45kXzPbKzk', NULL),
(9, 'Anjolie', 'Taylor', 'Emery Gordon', 'Yes', 'Hearing Impairment (Deaf)', 'nntg', '2013-11-27', '155', 5, NULL, 'female', 'Id consequat Et acc', '6', 'learners/passport-photos/KDxbgpUnkNHB8tVKqwPkso79IWnD1upx2vsGzMml.jpg', '2026-03-29 06:48:46', '2026-03-29 06:48:46', 'Baby Class', 'transfer', '2011-08-27', '576', '39', '30', '666655440', 'AEMY7F8XyZT', NULL),
(10, 'Quinn', 'Lloyd', 'Shannon Rose', 'No', NULL, NULL, '1986-08-24', '515', 5, NULL, 'female', 'Culpa lorem commodi', '6', 'learners/passport-photos/x6Zsik5qgjlK4mFc9B6AzfNaTFS8g6SN0Q1dcHym.jpg', '2026-03-31 02:59:46', '2026-03-31 02:59:46', 'Baby Class', 'transfer', '1971-04-01', '473', '21', '582', NULL, 'NJeG4zy8zci', NULL),
(13, 'Cassady', 'Rush', 'Wendy Ford', 'No', 'Physical Impairment', 'Sequi pariatur Sunt', '2013-11-25', '624', 6, NULL, 'female', 'Sapiente nulla natus', '8', 'learners/passport-photos/RmAHiG8MhlAT8mbfjox9823Vm35qjKucVMqw5um6.jpg', '2026-04-01 02:32:47', '2026-04-01 02:32:47', 'Baby Class', 'new', '2015-10-24', '937', '181', '704', '4', 'Hh55s4mboMi', 'both'),
(14, 'Meghan', 'Washington', 'Willow Hickman', 'Yes', 'Visual Impairment', 'Sequi pariatur Sunt', '2004-04-08', '892', 6, NULL, 'female', 'Veniam esse impedi', '8', 'learners/passport-photos/PjBdrlJf97ufyv535ubCiumcyFR5FBG0auWu3IDq.jpg', '2026-04-01 02:33:06', '2026-04-01 02:33:06', 'PP2', 'transfer', '1994-07-08', '123', '75', '675', '4', 'Mn7xPHjxcxb', 'father_only'),
(15, 'Bianca', 'Gallagher', 'Matthew Boone', 'Yes', 'Physical Impairment', 'Voluptates ipsam dig', '1980-07-18', '902', 6, NULL, 'male', 'Ad et consequuntur p', '8', 'learners/passport-photos/NvCF3hFcFeGj7xvVO5b59QIigfGwvmEEnHIUdUqd.jpg', '2026-04-01 02:33:15', '2026-04-01 02:33:15', 'PP2', 'new', '2006-01-23', '60', '53', '821', '567', 'VWuMYjG4YX4', 'guardian');

-- --------------------------------------------------------

--
-- Table structure for table `learner_attendances`
--

CREATE TABLE `learner_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `learner_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `status` enum('present','absent') NOT NULL,
  `reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learner_attendances`
--

INSERT INTO `learner_attendances` (`id`, `user_id`, `learner_id`, `date`, `status`, `reason`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2026-03-26', 'absent', '8888', '2026-03-26 14:47:22', '2026-03-26 14:57:40'),
(2, 1, 5, '2026-03-26', 'present', NULL, '2026-03-26 14:47:22', '2026-03-26 14:54:55'),
(3, 1, 4, '2026-03-26', 'present', NULL, '2026-03-26 14:47:22', '2026-03-26 14:54:55'),
(4, 1, 3, '2026-03-26', 'present', NULL, '2026-03-26 14:47:22', '2026-03-26 14:54:55'),
(5, 1, 2, '2026-03-26', 'present', NULL, '2026-03-26 14:47:22', '2026-03-26 14:54:55'),
(6, 1, 1, '2026-03-26', 'absent', 'kyjkkkkkkkkkk', '2026-03-26 14:47:22', '2026-03-26 14:57:40'),
(7, 1, 6, '2026-03-25', 'absent', NULL, '2026-03-26 14:47:54', '2026-03-26 14:47:54'),
(8, 1, 5, '2026-03-25', 'absent', NULL, '2026-03-26 14:47:54', '2026-03-26 14:47:54'),
(9, 1, 4, '2026-03-25', 'absent', NULL, '2026-03-26 14:47:54', '2026-03-26 14:47:54'),
(10, 1, 3, '2026-03-25', 'absent', NULL, '2026-03-26 14:47:54', '2026-03-26 14:47:54'),
(11, 1, 2, '2026-03-25', 'absent', NULL, '2026-03-26 14:47:54', '2026-03-26 14:47:54'),
(12, 1, 1, '2026-03-25', 'absent', NULL, '2026-03-26 14:47:54', '2026-03-26 14:47:54'),
(13, 1, 6, '2026-03-24', 'present', NULL, '2026-03-26 14:55:20', '2026-03-26 14:55:20'),
(14, 1, 5, '2026-03-24', 'present', NULL, '2026-03-26 14:55:20', '2026-03-26 14:55:20'),
(15, 1, 4, '2026-03-24', 'present', NULL, '2026-03-26 14:55:20', '2026-03-26 14:55:20'),
(16, 1, 3, '2026-03-24', 'present', NULL, '2026-03-26 14:55:20', '2026-03-26 14:55:20'),
(17, 1, 2, '2026-03-24', 'present', NULL, '2026-03-26 14:55:20', '2026-03-26 14:55:20'),
(18, 1, 1, '2026-03-24', 'present', 'she was absent one day', '2026-03-26 14:55:20', '2026-03-26 14:55:20'),
(19, 1, 6, '2026-03-23', 'present', NULL, '2026-03-26 14:55:56', '2026-03-26 14:55:56'),
(20, 1, 5, '2026-03-23', 'present', NULL, '2026-03-26 14:55:56', '2026-03-26 14:55:56'),
(21, 1, 4, '2026-03-23', 'present', NULL, '2026-03-26 14:55:56', '2026-03-26 14:55:56'),
(22, 1, 3, '2026-03-23', 'present', NULL, '2026-03-26 14:55:56', '2026-03-26 14:55:56'),
(23, 1, 2, '2026-03-23', 'present', NULL, '2026-03-26 14:55:56', '2026-03-26 14:55:56'),
(24, 1, 1, '2026-03-23', 'present', NULL, '2026-03-26 14:55:56', '2026-03-26 14:55:56'),
(25, 1, 6, '2026-03-22', 'absent', NULL, '2026-03-26 14:56:41', '2026-03-26 14:56:41'),
(26, 1, 5, '2026-03-22', 'absent', NULL, '2026-03-26 14:56:41', '2026-03-26 14:56:41'),
(27, 1, 4, '2026-03-22', 'absent', NULL, '2026-03-26 14:56:41', '2026-03-26 14:56:41'),
(28, 1, 3, '2026-03-22', 'absent', NULL, '2026-03-26 14:56:41', '2026-03-26 14:56:41'),
(29, 1, 2, '2026-03-22', 'absent', NULL, '2026-03-26 14:56:41', '2026-03-26 14:56:41'),
(30, 1, 1, '2026-03-22', 'absent', NULL, '2026-03-26 14:56:41', '2026-03-26 14:56:41'),
(31, 1, 6, '2026-03-19', 'absent', 'not feeling well', '2026-03-26 14:59:08', '2026-03-26 14:59:08'),
(32, 1, 5, '2026-03-19', 'present', NULL, '2026-03-26 14:59:08', '2026-03-26 14:59:08'),
(33, 1, 4, '2026-03-19', 'present', NULL, '2026-03-26 14:59:08', '2026-03-26 14:59:08'),
(34, 1, 3, '2026-03-19', 'present', NULL, '2026-03-26 14:59:08', '2026-03-26 14:59:08'),
(35, 1, 2, '2026-03-19', 'present', NULL, '2026-03-26 14:59:08', '2026-03-26 14:59:08'),
(36, 1, 1, '2026-03-19', 'absent', 'the was very abse', '2026-03-26 14:59:08', '2026-03-26 14:59:08'),
(37, 7, 8, '2026-03-27', 'present', NULL, '2026-03-27 04:49:40', '2026-03-27 04:49:40'),
(38, 7, 6, '2026-03-27', 'present', NULL, '2026-03-27 04:49:40', '2026-03-27 04:49:40'),
(39, 7, 5, '2026-03-27', 'present', NULL, '2026-03-27 04:49:40', '2026-03-27 04:49:40'),
(40, 7, 3, '2026-03-27', 'present', NULL, '2026-03-27 04:49:40', '2026-03-27 04:49:40'),
(41, 7, 2, '2026-03-27', 'present', NULL, '2026-03-27 04:49:40', '2026-03-27 04:49:40'),
(42, 7, 1, '2026-03-27', 'absent', 'going for a family engagement', '2026-03-27 04:49:40', '2026-03-27 04:49:40'),
(43, 1, 8, '2026-03-16', 'present', NULL, '2026-03-27 06:46:02', '2026-03-27 06:46:02'),
(44, 1, 7, '2026-03-16', 'present', NULL, '2026-03-27 06:46:02', '2026-03-27 06:46:02'),
(45, 1, 6, '2026-03-16', 'present', NULL, '2026-03-27 06:46:02', '2026-03-27 06:46:02'),
(46, 1, 5, '2026-03-16', 'present', NULL, '2026-03-27 06:46:02', '2026-03-27 06:46:02'),
(47, 1, 4, '2026-03-16', 'present', NULL, '2026-03-27 06:46:02', '2026-03-27 06:46:02'),
(48, 1, 3, '2026-03-16', 'present', NULL, '2026-03-27 06:46:02', '2026-03-27 06:46:02'),
(49, 1, 2, '2026-03-16', 'present', NULL, '2026-03-27 06:46:02', '2026-03-27 06:46:02'),
(50, 1, 1, '2026-03-16', 'absent', 'going for a family engagement', '2026-03-27 06:46:02', '2026-03-27 06:46:02'),
(51, 1, 9, '2026-03-30', 'present', NULL, '2026-03-30 07:53:12', '2026-03-30 07:53:12'),
(52, 1, 8, '2026-03-30', 'present', NULL, '2026-03-30 07:53:12', '2026-03-30 07:53:12'),
(53, 1, 6, '2026-03-30', 'present', NULL, '2026-03-30 07:53:12', '2026-03-30 07:53:12'),
(54, 1, 5, '2026-03-30', 'present', NULL, '2026-03-30 07:53:12', '2026-03-30 07:53:12'),
(55, 1, 3, '2026-03-30', 'present', NULL, '2026-03-30 07:53:12', '2026-03-30 07:53:12'),
(56, 1, 2, '2026-03-30', 'present', NULL, '2026-03-30 07:53:12', '2026-03-30 07:53:12'),
(57, 1, 1, '2026-03-30', 'absent', 'not feeling well', '2026-03-30 07:53:12', '2026-03-30 07:54:20'),
(58, 1, 15, '2026-04-15', 'present', NULL, '2026-04-15 06:49:07', '2026-04-15 06:49:07'),
(59, 1, 14, '2026-04-15', 'present', NULL, '2026-04-15 06:49:07', '2026-04-15 06:49:07'),
(60, 1, 13, '2026-04-15', 'present', NULL, '2026-04-15 06:49:07', '2026-04-15 06:49:07'),
(61, 1, 10, '2026-04-15', 'present', NULL, '2026-04-15 06:49:07', '2026-04-15 06:49:07'),
(62, 1, 9, '2026-04-15', 'present', NULL, '2026-04-15 06:49:07', '2026-04-15 06:49:07'),
(63, 1, 8, '2026-04-15', 'present', NULL, '2026-04-15 06:49:07', '2026-04-15 06:49:07'),
(64, 1, 7, '2026-04-15', 'present', NULL, '2026-04-15 06:49:07', '2026-04-15 06:49:07'),
(65, 1, 6, '2026-04-15', 'present', NULL, '2026-04-15 06:49:07', '2026-04-15 06:49:07'),
(66, 1, 5, '2026-04-15', 'present', NULL, '2026-04-15 06:49:07', '2026-04-15 06:49:07'),
(67, 1, 4, '2026-04-15', 'present', NULL, '2026-04-15 06:49:07', '2026-04-15 06:49:07'),
(68, 1, 15, '2026-04-14', 'present', NULL, '2026-04-15 06:49:21', '2026-04-15 06:49:21'),
(69, 1, 14, '2026-04-14', 'present', NULL, '2026-04-15 06:49:21', '2026-04-15 06:49:21'),
(70, 1, 13, '2026-04-14', 'present', NULL, '2026-04-15 06:49:21', '2026-04-15 06:49:21'),
(71, 1, 10, '2026-04-14', 'present', NULL, '2026-04-15 06:49:21', '2026-04-15 06:49:21'),
(72, 1, 9, '2026-04-14', 'present', NULL, '2026-04-15 06:49:21', '2026-04-15 06:49:21'),
(73, 1, 8, '2026-04-14', 'present', NULL, '2026-04-15 06:49:21', '2026-04-15 06:49:21'),
(74, 1, 7, '2026-04-14', 'present', NULL, '2026-04-15 06:49:21', '2026-04-15 06:49:21'),
(75, 1, 6, '2026-04-14', 'present', NULL, '2026-04-15 06:49:21', '2026-04-15 06:49:21'),
(76, 1, 5, '2026-04-14', 'present', NULL, '2026-04-15 06:49:21', '2026-04-15 06:49:21'),
(77, 1, 4, '2026-04-14', 'present', NULL, '2026-04-15 06:49:21', '2026-04-15 06:49:21'),
(78, 1, 15, '2026-04-13', 'present', NULL, '2026-04-15 06:49:30', '2026-04-15 06:49:30'),
(79, 1, 14, '2026-04-13', 'present', NULL, '2026-04-15 06:49:30', '2026-04-15 06:49:30'),
(80, 1, 13, '2026-04-13', 'present', NULL, '2026-04-15 06:49:30', '2026-04-15 06:49:30'),
(81, 1, 10, '2026-04-13', 'present', NULL, '2026-04-15 06:49:30', '2026-04-15 06:49:30'),
(82, 1, 9, '2026-04-13', 'present', NULL, '2026-04-15 06:49:30', '2026-04-15 06:49:30'),
(83, 1, 8, '2026-04-13', 'present', NULL, '2026-04-15 06:49:30', '2026-04-15 06:49:30'),
(84, 1, 7, '2026-04-13', 'present', NULL, '2026-04-15 06:49:30', '2026-04-15 06:49:30'),
(85, 1, 6, '2026-04-13', 'present', NULL, '2026-04-15 06:49:30', '2026-04-15 06:49:30'),
(86, 1, 5, '2026-04-13', 'present', NULL, '2026-04-15 06:49:30', '2026-04-15 06:49:30'),
(87, 1, 4, '2026-04-13', 'present', NULL, '2026-04-15 06:49:30', '2026-04-15 06:49:30'),
(88, 1, 15, '2026-04-10', 'present', NULL, '2026-04-15 06:49:38', '2026-04-15 06:49:38'),
(89, 1, 14, '2026-04-10', 'present', NULL, '2026-04-15 06:49:38', '2026-04-15 06:49:38'),
(90, 1, 13, '2026-04-10', 'present', NULL, '2026-04-15 06:49:38', '2026-04-15 06:49:38'),
(91, 1, 10, '2026-04-10', 'present', NULL, '2026-04-15 06:49:38', '2026-04-15 06:49:38'),
(92, 1, 9, '2026-04-10', 'present', NULL, '2026-04-15 06:49:38', '2026-04-15 06:49:38'),
(93, 1, 8, '2026-04-10', 'present', NULL, '2026-04-15 06:49:38', '2026-04-15 06:49:38'),
(94, 1, 7, '2026-04-10', 'present', NULL, '2026-04-15 06:49:38', '2026-04-15 06:49:38'),
(95, 1, 6, '2026-04-10', 'present', NULL, '2026-04-15 06:49:38', '2026-04-15 06:49:38'),
(96, 1, 5, '2026-04-10', 'present', NULL, '2026-04-15 06:49:38', '2026-04-15 06:49:38'),
(97, 1, 4, '2026-04-10', 'present', NULL, '2026-04-15 06:49:38', '2026-04-15 06:49:38'),
(98, 1, 15, '2026-04-09', 'absent', 'absent', '2026-04-15 06:50:23', '2026-04-15 06:50:23'),
(99, 1, 14, '2026-04-09', 'present', NULL, '2026-04-15 06:50:23', '2026-04-15 06:50:23'),
(100, 1, 13, '2026-04-09', 'present', NULL, '2026-04-15 06:50:23', '2026-04-15 06:50:23'),
(101, 1, 10, '2026-04-09', 'present', NULL, '2026-04-15 06:50:23', '2026-04-15 06:50:23'),
(102, 1, 9, '2026-04-09', 'present', NULL, '2026-04-15 06:50:23', '2026-04-15 06:50:23'),
(103, 1, 8, '2026-04-09', 'present', NULL, '2026-04-15 06:50:23', '2026-04-15 06:50:23'),
(104, 1, 7, '2026-04-09', 'present', NULL, '2026-04-15 06:50:23', '2026-04-15 06:50:23'),
(105, 1, 6, '2026-04-09', 'present', NULL, '2026-04-15 06:50:23', '2026-04-15 06:50:23'),
(106, 1, 5, '2026-04-09', 'present', NULL, '2026-04-15 06:50:23', '2026-04-15 06:50:23'),
(107, 1, 4, '2026-04-09', 'present', NULL, '2026-04-15 06:50:23', '2026-04-15 06:50:23'),
(108, 1, 15, '2026-04-07', 'absent', 'absent', '2026-04-15 06:50:32', '2026-04-15 06:50:32'),
(109, 1, 14, '2026-04-07', 'present', NULL, '2026-04-15 06:50:32', '2026-04-15 06:50:32'),
(110, 1, 13, '2026-04-07', 'present', NULL, '2026-04-15 06:50:32', '2026-04-15 06:50:32'),
(111, 1, 10, '2026-04-07', 'present', NULL, '2026-04-15 06:50:32', '2026-04-15 06:50:32'),
(112, 1, 9, '2026-04-07', 'present', NULL, '2026-04-15 06:50:32', '2026-04-15 06:50:32'),
(113, 1, 8, '2026-04-07', 'present', NULL, '2026-04-15 06:50:32', '2026-04-15 06:50:32'),
(114, 1, 7, '2026-04-07', 'present', NULL, '2026-04-15 06:50:32', '2026-04-15 06:50:32'),
(115, 1, 6, '2026-04-07', 'present', NULL, '2026-04-15 06:50:32', '2026-04-15 06:50:32'),
(116, 1, 5, '2026-04-07', 'present', NULL, '2026-04-15 06:50:32', '2026-04-15 06:50:32'),
(117, 1, 4, '2026-04-07', 'present', NULL, '2026-04-15 06:50:32', '2026-04-15 06:50:32'),
(118, 1, 15, '2026-04-12', 'present', NULL, '2026-04-15 07:27:25', '2026-04-15 07:27:25'),
(119, 1, 14, '2026-04-12', 'present', NULL, '2026-04-15 07:27:25', '2026-04-15 07:27:25'),
(120, 1, 13, '2026-04-12', 'present', NULL, '2026-04-15 07:27:25', '2026-04-15 07:27:25'),
(121, 1, 10, '2026-04-12', 'present', NULL, '2026-04-15 07:27:25', '2026-04-15 07:27:25'),
(122, 1, 9, '2026-04-12', 'present', NULL, '2026-04-15 07:27:25', '2026-04-15 07:27:25'),
(123, 1, 8, '2026-04-12', 'present', NULL, '2026-04-15 07:27:25', '2026-04-15 07:27:25'),
(124, 1, 7, '2026-04-12', 'present', NULL, '2026-04-15 07:27:25', '2026-04-15 07:27:25'),
(125, 1, 6, '2026-04-12', 'present', NULL, '2026-04-15 07:27:25', '2026-04-15 07:27:25'),
(126, 1, 5, '2026-04-12', 'present', NULL, '2026-04-15 07:27:25', '2026-04-15 07:27:25'),
(127, 1, 4, '2026-04-12', 'present', NULL, '2026-04-15 07:27:25', '2026-04-15 07:27:25'),
(128, 1, 15, '2026-04-01', 'present', NULL, '2026-04-15 07:28:40', '2026-04-15 07:28:40'),
(129, 1, 14, '2026-04-01', 'present', NULL, '2026-04-15 07:28:40', '2026-04-15 07:28:40'),
(130, 1, 13, '2026-04-01', 'present', NULL, '2026-04-15 07:28:40', '2026-04-15 07:28:40'),
(131, 1, 10, '2026-04-01', 'present', NULL, '2026-04-15 07:28:40', '2026-04-15 07:28:40'),
(132, 1, 9, '2026-04-01', 'present', NULL, '2026-04-15 07:28:40', '2026-04-15 07:28:40'),
(133, 1, 8, '2026-04-01', 'present', NULL, '2026-04-15 07:28:40', '2026-04-15 07:28:40'),
(134, 1, 7, '2026-04-01', 'present', NULL, '2026-04-15 07:28:40', '2026-04-15 07:28:40'),
(135, 1, 6, '2026-04-01', 'present', NULL, '2026-04-15 07:28:40', '2026-04-15 07:28:40'),
(136, 1, 5, '2026-04-01', 'present', NULL, '2026-04-15 07:28:40', '2026-04-15 07:28:40'),
(137, 1, 4, '2026-04-01', 'present', NULL, '2026-04-15 07:28:40', '2026-04-15 07:28:40'),
(138, 1, 15, '2026-03-04', 'present', NULL, '2026-04-20 11:58:46', '2026-04-20 11:58:46'),
(139, 1, 14, '2026-03-04', 'present', NULL, '2026-04-20 11:58:46', '2026-04-20 11:58:46'),
(140, 1, 13, '2026-03-04', 'present', NULL, '2026-04-20 11:58:46', '2026-04-20 11:58:46'),
(141, 1, 10, '2026-03-04', 'present', NULL, '2026-04-20 11:58:46', '2026-04-20 11:58:46'),
(142, 1, 9, '2026-03-04', 'present', NULL, '2026-04-20 11:58:46', '2026-04-20 11:58:46'),
(143, 1, 8, '2026-03-04', 'present', NULL, '2026-04-20 11:58:46', '2026-04-20 11:58:46'),
(144, 1, 7, '2026-03-04', 'present', NULL, '2026-04-20 11:58:46', '2026-04-20 11:58:46'),
(145, 1, 6, '2026-03-04', 'present', NULL, '2026-04-20 11:58:46', '2026-04-20 11:58:46'),
(146, 1, 5, '2026-03-04', 'present', NULL, '2026-04-20 11:58:46', '2026-04-20 11:58:46'),
(147, 1, 4, '2026-03-04', 'present', NULL, '2026-04-20 11:58:46', '2026-04-20 11:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `learner_parents`
--

CREATE TABLE `learner_parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `learner_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `alernative_phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `sub_location_id` varchar(255) DEFAULT NULL,
  `ward_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `county_id` varchar(255) DEFAULT NULL,
  `sub_county_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learner_parents`
--

INSERT INTO `learner_parents` (`id`, `learner_id`, `first_name`, `middle_name`, `last_name`, `relationship`, `id_number`, `phone_number`, `alernative_phone_number`, `email`, `village`, `sub_location_id`, `ward_id`, `created_at`, `updated_at`, `county_id`, `sub_county_id`) VALUES
(1, 3, 'Cora', NULL, 'Holcomb', 'other', '483', '+1 (646) 502-3592', '+1 (136) 846-1635', 'ruhi@mailinator.com', 'In dolor aut omnis c', NULL, '0', '2026-03-26 10:14:33', '2026-03-26 10:14:33', NULL, NULL),
(2, 4, 'Jennifer', NULL, 'Bradshaw', 'guardian', '589', '+1 (324) 787-6717', '+1 (546) 923-8362', 'qycivul@mailinator.com', 'A possimus totam ut', NULL, '0', '2026-03-26 10:17:58', '2026-03-26 10:17:58', NULL, NULL),
(3, 5, 'Desiree', NULL, 'Kirk', 'father', '468', '+1 (826) 425-7481', '+1 (199) 298-1026', 'kewuviva@mailinator.com', 'Sunt et architecto d', NULL, '0', '2026-03-26 10:18:36', '2026-03-26 10:18:36', NULL, NULL),
(4, 6, 'Lee', NULL, 'Shannon', 'other', '923', '+1 (991) 208-1706', '+1 (228) 709-1329', 'nusesa@mailinator.com', 'Officia aute dolore', NULL, '0', '2026-03-26 10:32:53', '2026-03-26 10:32:53', NULL, NULL),
(5, 7, 'Aubrey', NULL, 'Moran', 'guardian', '851', '+1 (285) 269-4513', '+1 (861) 974-5826', 'rykexyb@mailinator.com', 'Esse dolore explica', NULL, '0', '2026-03-27 03:31:31', '2026-03-27 03:31:31', NULL, NULL),
(6, 8, 'Dexter', NULL, 'Roman', 'guardian', '619', '+1 (176) 583-1867', '+1 (597) 119-9683', 'jutagudy@mailinator.com', 'Facere harum quae no', NULL, 'tp0mFiSv7ar', '2026-03-27 03:42:36', '2026-03-27 11:07:33', NULL, NULL),
(7, 9, 'Addison', NULL, 'Saunders', 'mother', '802', '+1 (605) 821-3258', '+1 (963) 102-1016', 'napa@mailinator.com', 'Minus sunt eveniet', NULL, 'QetTI3w7Tfe', '2026-03-29 06:48:46', '2026-03-29 06:48:46', NULL, NULL),
(8, 10, 'Perry', NULL, 'Garza', 'guardian', '952', '+1 (568) 777-9184', '+1 (412) 483-9091', 'kodyfinom@mailinator.com', 'Sint enim voluptas', NULL, 'k828CVWMS7V', '2026-03-31 02:59:46', '2026-03-31 02:59:46', NULL, NULL),
(9, 13, 'Emmanuel', 'yes', 'Chesire', 'father', NULL, '0798985851', NULL, 'ekchesire@kabarak.ac.ke', 'manyaru', NULL, 'rb2nGblpg8l', '2026-04-01 02:32:47', '2026-04-01 02:50:41', 'ob6SxuRcqU4', 'gSJXzH1DM75'),
(10, 13, 'Donovan', 'Kristen Oneill', 'Wynn', 'mother', '886', '+1 (331) 598-7781', NULL, 'racosumi@mailinator.com', 'Nam similique irure', NULL, 'RJxeNbjGm71', '2026-04-01 02:32:47', '2026-04-01 02:50:15', 'j8o6iO4Njsi', 'KXM9VnhuLfP'),
(11, 14, 'Sloane', 'MacKenzie Bishop', 'Fulton', 'father', '881', '+1 (296) 976-7128', NULL, 'fisywy@mailinator.com', 'Sint officiis odio a', NULL, 'uhTYg7CLmOd', '2026-04-01 02:33:06', '2026-04-01 02:33:06', 'vvOK1BxTbet', 'k5sxmlXAtIg'),
(12, 15, 'Martina', 'Quentin Nicholson', 'Sampson', 'guardian', '109', '+1 (921) 179-1412', NULL, 'kazopuzaru@mailinator.com', 'Dicta non dicta sit', NULL, 'HTTUdsL0gAm', '2026-04-01 02:33:15', '2026-04-01 02:33:15', 'bzOfj0iwfDH', 'NrGORu301bx');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_24_212456_create_unions_table', 1),
(6, '2023_02_24_213545_create_ecde_schools_table', 1),
(7, '2023_02_24_220641_create_teachers_table', 1),
(8, '2023_02_24_221001_create_teacher_education_table', 1),
(9, '2023_02_24_221118_create_teacher_residentials_table', 1),
(10, '2023_02_24_221238_create_teacher_school_contacts_table', 1),
(11, '2023_02_25_054522_create_bursary_applications_table', 1),
(12, '2023_02_26_191520_create_students_table', 1),
(13, '2023_02_26_191726_create_student_applications_table', 1),
(14, '2023_02_26_191742_create_student_parents_table', 1),
(15, '2023_02_27_182721_add_bursary_ref_to_student_applications_table', 1),
(16, '2023_02_27_185140_add_status_to_student_applications_table', 1),
(17, '2023_03_01_124714_create_sub_locations_table', 1),
(18, '2023_03_08_025707_add_remarks_to_ecde_school', 1),
(19, '2023_04_10_111335_create_student_types_table', 1),
(20, '2023_04_10_123535_create_feeder_schools_table', 1),
(21, '2023_04_10_212943_create_coordinators_table', 1),
(22, '2023_04_10_213329_school_cordination', 1),
(23, '2023_04_12_043807_create_v_t_c_s_table', 1),
(24, '2023_04_12_045106_create_v_t_c_departments_table', 1),
(25, '2023_04_12_045730_create_v_t_c_courses_table', 1),
(26, '2023_04_12_202724_create_v_t_c_teachers_table', 1),
(27, '2023_04_14_000306_create_teachers_unions_table', 1),
(28, '2023_04_17_123619_vtc_students_pivot', 1),
(29, '2023_04_18_094907_v_t_c_student_photo_pivot', 1),
(30, '2023_04_18_123512_create_other_v_t_c_staff_table', 1),
(31, '2023_04_18_134149_create_depart_ment_workers_table', 1),
(32, '2023_05_03_155401_create_adminstrative_units_table', 1),
(33, '2023_05_03_155509_create_n_g_a_o_units_table', 1),
(34, '2023_05_10_092452_create_permission_tables', 1),
(35, '2026_03_16_140110_create_counties_table', 1),
(36, '2026_03_16_140726_create_constituencies_table', 1),
(37, '2026_03_16_140748_create_wards_table', 1),
(38, '2026_03_17_045436_create_s_m_s_table', 2),
(39, '2026_03_17_105301_add-column-users', 2),
(40, '2026_03_17_105424_add-column-users', 2),
(41, '2026_03_17_111148_add-column-users', 3),
(42, '2026_03_17_114724_add-column-users', 4),
(43, '2026_03_17_120538_add-column-users', 5),
(44, '2026_03_17_142433_add-column-users', 6),
(45, '2026_03_17_143148_add-column-users', 7),
(46, '2026_03_17_143303_add-column-users', 8),
(47, '2026_03_17_171238_create_pages_table', 9),
(48, '2026_03_17_171323_create_categories_table', 9),
(49, '2026_03_17_171402_create_galleries_table', 9),
(50, '2026_03_17_171556_create_gallery_images_table', 9),
(51, '2026_03_17_171614_create_announcements_table', 9),
(52, '2026_03_17_171631_create_testimonials_table', 9),
(53, '2026_03_17_171648_create_f_a_q_s_table', 9),
(54, '2026_03_17_171705_create_contact_messages_table', 9),
(55, '2026_03_17_171721_create_settings_table', 9),
(56, '2026_03_17_172820_create_posts_table_cms', 9),
(57, '2026_03_18_110000_add_faqs_to_categories_for_type_enum', 9),
(58, '2026_03_18_112000_publish_existing_faq_drafts', 9),
(59, '2026_03_18_120000_remove_category_dependency_from_posts_and_faqs', 9),
(60, '2026_03_19_120832_add-couln', 10),
(61, '2026_03_19_121302_add-column-users', 11),
(62, '2026_03_19_124139_create_system_activity_logs_table', 12),
(63, '2026_03_19_124912_add-column-users', 13),
(64, '2026_03_23_064348_create_ethnic_groups_table', 14),
(65, '2026_03_23_065526_create_documents_table', 15),
(66, '2026_03_23_070759_create_next_of_kin_table', 16),
(67, '2026_03_23_071143_create_beneficiaries_table', 16),
(68, '2026_03_23_073002_create_education_histories_table', 17),
(69, '2026_03_23_073059_create_user_unions_table', 17),
(70, '2026_03_23_073124_create_user_documents_table', 17),
(71, '2026_03_23_102317_create_job_groups_table', 18),
(72, '2026_03_23_103303_add-column-contract_expiry-contract_expiry', 19),
(73, '2026_03_26_065833_add-retirement-date-teachers', 20),
(74, '2026_03_26_092953_create_learners_table', 21),
(75, '2026_03_26_113129_add-column-center-code', 22),
(76, '2026_03_26_113452_add-columns-table-learners', 23),
(77, '2026_03_26_114109_add-columns-table-learners', 24),
(78, '2026_03_26_114623_create_learner_parents_table', 24),
(79, '2026_03_26_172552_create_learner_attendances_table', 25),
(80, '2026_03_26_173655_add-columns-table-learners', 26),
(81, '2026_03_26_174703_add-columns-table-learners', 27),
(82, '2026_03_27_061855_create_nationalities_table', 28),
(83, '2026_03_27_063012_add-columns-table-learners', 29),
(84, '2026_03_27_064149_add-columns-table-learners', 30),
(85, '2026_03_27_112948_add-columns-table-schools', 31),
(86, '2026_03_27_113114_add-columns-table-schools', 32),
(87, '2026_03_29_091112_create_class_rooms_table', 33),
(88, '2026_03_31_062729_create_teacher_deployment_histories_table', 34),
(89, '2026_04_01_052616_add-column-to-learners', 35),
(90, '2026_04_01_052927_add-column-to-learners', 35),
(91, '2026_04_15_110908_create_non_attendance_days_table', 36),
(92, '2026_04_15_111559_add-coluns-mo', 37),
(93, '2026_04_15_133736_add-coluns-mo', 38),
(94, '2026_04_15_133843_add-coluns-mo', 39);

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
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 28),
(2, 'App\\Models\\User', 29),
(2, 'App\\Models\\User', 30),
(2, 'App\\Models\\User', 38),
(2, 'App\\Models\\User', 39),
(2, 'App\\Models\\User', 40),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 19);

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Afghan', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(2, 'Åland Island', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(3, 'Albanian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(4, 'Algerian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(5, 'American Samoan', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(6, 'Andorran', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(7, 'Angolan', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(8, 'Anguillan', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(9, 'Antarctic', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(10, 'Antiguan or Barbudan', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(11, 'Argentine', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(12, 'Armenian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(13, 'Aruban', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(14, 'Australian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(15, 'Austrian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(16, 'Azerbaijani, Azeri', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(17, 'Bahamian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(18, 'Bahraini', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(19, 'Bangladeshi', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(20, 'Barbadian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(21, 'Belarusian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(22, 'Belgian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(23, 'Belizean', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(24, 'Beninese, Beninois', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(25, 'Bermudian, Bermudan', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(26, 'Bhutanese', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(27, 'Bolivian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(28, 'Bonaire', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(29, 'Bosnian or Herzegovinian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(30, 'Motswana, Botswanan', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(31, 'Bouvet Island', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(32, 'Brazilian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(33, 'BIOT', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(34, 'Bruneian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(35, 'Bulgarian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(36, 'Burkinabé', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(37, 'Burundian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(38, 'Cabo Verdean', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(39, 'Cambodian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(40, 'Cameroonian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(41, 'Canadian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(42, 'Caymanian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(43, 'Central African', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(44, 'Chadian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(45, 'Chilean', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(46, 'Chinese', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(47, 'Christmas Island', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(48, 'Cocos Island', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(49, 'Colombian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(50, 'Comoran, Comorian', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(51, 'Congolese', '2026-03-27 03:27:00', '2026-03-27 03:27:00'),
(52, 'Cook Island', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(53, 'Costa Rican', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(54, 'Ivorian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(55, 'Croatian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(56, 'Cuban', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(57, 'Curaçaoan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(58, 'Cypriot', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(59, 'Czech', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(60, 'Danish', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(61, 'Djiboutian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(62, 'Dominican', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(63, 'Ecuadorian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(64, 'Egyptian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(65, 'Salvadoran', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(66, 'Equatorial Guinean, Equatoguinean', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(67, 'Eritrean', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(68, 'Estonian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(69, 'Ethiopian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(70, 'Falkland Island', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(71, 'Faroese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(72, 'Fijian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(73, 'Finnish', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(74, 'French', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(75, 'French Guianese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(76, 'French Polynesian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(77, 'French Southern Territories', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(78, 'Gabonese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(79, 'Gambian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(80, 'Georgian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(81, 'German', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(82, 'Ghanaian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(83, 'Gibraltar', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(84, 'Greek, Hellenic', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(85, 'Greenlandic', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(86, 'Grenadian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(87, 'Guadeloupe', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(88, 'Guamanian, Guambat', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(89, 'Guatemalan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(90, 'Channel Island', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(91, 'Guinean', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(92, 'Bissau-Guinean', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(93, 'Guyanese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(94, 'Haitian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(95, 'Heard Island or McDonald Islands', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(96, 'Vatican', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(97, 'Honduran', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(98, 'Hong Kong, Hong Kongese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(99, 'Hungarian, Magyar', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(100, 'Icelandic', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(101, 'Indian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(102, 'Indonesian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(103, 'Iranian, Persian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(104, 'Iraqi', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(105, 'Irish', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(106, 'Manx', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(107, 'Israeli', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(108, 'Italian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(109, 'Jamaican', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(110, 'Japanese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(111, 'Jordanian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(112, 'Kazakhstani, Kazakh', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(113, 'Kenyan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(114, 'I-Kiribati', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(115, 'North Korean', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(116, 'South Korean', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(117, 'Kuwaiti', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(118, 'Kyrgyzstani, Kyrgyz, Kirgiz, Kirghiz', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(119, 'Lao, Laotian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(120, 'Latvian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(121, 'Lebanese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(122, 'Basotho', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(123, 'Liberian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(124, 'Libyan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(125, 'Liechtenstein', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(126, 'Lithuanian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(127, 'Luxembourg, Luxembourgish', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(128, 'Macanese, Chinese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(129, 'Macedonian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(130, 'Malagasy', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(131, 'Malawian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(132, 'Malaysian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(133, 'Maldivian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(134, 'Malian, Malinese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(135, 'Maltese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(136, 'Marshallese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(137, 'Martiniquais, Martinican', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(138, 'Mauritanian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(139, 'Mauritian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(140, 'Mahoran', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(141, 'Mexican', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(142, 'Micronesian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(143, 'Moldovan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(144, 'Monégasque, Monacan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(145, 'Mongolian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(146, 'Montenegrin', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(147, 'Montserratian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(148, 'Moroccan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(149, 'Mozambican', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(150, 'Burmese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(151, 'Namibian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(152, 'Nauruan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(153, 'Nepali, Nepalese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(154, 'Dutch, Netherlandic', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(155, 'New Caledonian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(156, 'New Zealand, NZ', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(157, 'Nicaraguan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(158, 'Nigerien', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(159, 'Nigerian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(160, 'Niuean', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(161, 'Norfolk Island', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(162, 'Northern Marianan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(163, 'Norwegian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(164, 'Omani', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(165, 'Pakistani', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(166, 'Palauan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(167, 'Palestinian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(168, 'Panamanian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(169, 'Papua New Guinean, Papuan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(170, 'Paraguayan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(171, 'Peruvian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(172, 'Philippine, Filipino', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(173, 'Pitcairn Island', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(174, 'Polish', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(175, 'Portuguese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(176, 'Puerto Rican', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(177, 'Qatari', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(178, 'Réunionese, Réunionnais', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(179, 'Romanian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(180, 'Russian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(181, 'Rwandan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(182, 'Barthélemois', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(183, 'Saint Helenian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(184, 'Kittitian or Nevisian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(185, 'Saint Lucian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(186, 'Saint-Martinoise', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(187, 'Saint-Pierrais or Miquelonnais', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(188, 'Saint Vincentian, Vincentian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(189, 'Samoan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(190, 'Sammarinese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(191, 'São Toméan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(192, 'Saudi, Saudi Arabian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(193, 'Senegalese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(194, 'Serbian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(195, 'Seychellois', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(196, 'Sierra Leonean', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(197, 'Singaporean', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(198, 'Sint Maarten', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(199, 'Slovak', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(200, 'Slovenian, Slovene', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(201, 'Solomon Island', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(202, 'Somali, Somalian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(203, 'South African', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(204, 'South Georgia or South Sandwich Islands', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(205, 'South Sudanese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(206, 'Spanish', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(207, 'Sri Lankan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(208, 'Sudanese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(209, 'Surinamese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(210, 'Svalbard', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(211, 'Swazi', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(212, 'Swedish', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(213, 'Swiss', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(214, 'Syrian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(215, 'Chinese, Taiwanese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(216, 'Tajikistani', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(217, 'Tanzanian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(218, 'Thai', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(219, 'Timorese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(220, 'Togolese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(221, 'Tokelauan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(222, 'Tongan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(223, 'Trinidadian or Tobagonian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(224, 'Tunisian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(225, 'Turkish', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(226, 'Turkmen', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(227, 'Turks and Caicos Island', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(228, 'Tuvaluan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(229, 'Ugandan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(230, 'Ukrainian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(231, 'Emirati, Emirian, Emiri', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(232, 'British, UK', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(233, 'American', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(234, 'Uruguayan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(235, 'Uzbekistani, Uzbek', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(236, 'Ni-Vanuatu, Vanuatuan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(237, 'Venezuelan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(238, 'Vietnamese', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(239, 'British Virgin Island', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(240, 'U.S. Virgin Island', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(241, 'Wallis and Futuna, Wallisian or Futunan', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(242, 'Sahrawi, Sahrawian, Sahraouian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(243, 'Yemeni', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(244, 'Zambian', '2026-03-27 03:27:01', '2026-03-27 03:27:01'),
(245, 'Zimbabwean', '2026-03-27 03:27:01', '2026-03-27 03:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `next_of_kin`
--

CREATE TABLE `next_of_kin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `next_of_kin`
--

INSERT INTO `next_of_kin` (`id`, `user_id`, `first_name`, `last_name`, `middle_name`, `phone_number`, `id_number`, `email`, `relationship`, `gender`, `dob`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lucas', 'Greene', 'Wanda Kline', '+1 (359) 737-7977', NULL, 'gepu@mailinator.com', 'siblings', 'male', '2007-10-12', '2026-03-23 04:22:55', '2026-03-23 04:22:55'),
(2, 1, 'Chandler', 'Mcgowan', 'Chadwick Cherry', '+1 (446) 364-9996', '338', 'suhudo@mailinator.com', 'niece', 'female', '1985-11-15', '2026-03-23 04:23:24', '2026-03-23 04:23:24'),
(3, 1, 'Odysseus', 'Mitchell', 'Suki Estes', '+1 (251) 919-7548', '509', 'japa@mailinator.com', 'aunts', 'male', '2003-05-11', '2026-03-23 04:26:28', '2026-03-23 04:26:28'),
(4, 7, 'Trevor', 'Douglas', 'Myra Blake', '+1 (524) 893-8034', '793', 'loquq@mailinator.com', 'cousins', 'male', '1975-01-16', '2026-03-23 09:30:13', '2026-03-23 09:30:13'),
(5, 1, 'Emmanuel', 'Farrell', 'Leo Torres', '+1 (709) 382-9121', '181', 'caxam@mailinator.com', 'children', 'female', '1985-09-09', '2026-03-26 04:20:07', '2026-03-26 04:20:07'),
(6, 1, 'Dora', 'Glenn', 'TaShya Brewer', '+1 (988) 727-7945', '227', 'zapacazoby@mailinator.com', 'parents', 'male', '2004-01-25', '2026-03-26 04:20:47', '2026-03-26 04:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `non_attendance_days`
--

CREATE TABLE `non_attendance_days` (
  `type` varchar(255) NOT NULL DEFAULT 'holiday',
  `date` date DEFAULT NULL,
  `weekday` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `is_recurring` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `family_setup` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `non_attendance_days`
--

INSERT INTO `non_attendance_days` (`type`, `date`, `weekday`, `title`, `is_recurring`, `created_at`, `updated_at`, `family_setup`, `id`) VALUES
('holiday', '2026-04-20', NULL, 'pasaka', 0, '2026-04-20 11:50:56', '2026-04-20 11:50:56', NULL, 1),
('closure', '2026-04-01', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 2),
('closure', '2026-04-02', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 3),
('closure', '2026-04-03', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 4),
('closure', '2026-04-04', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 5),
('closure', '2026-04-05', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 6),
('closure', '2026-04-06', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 7),
('closure', '2026-04-07', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 8),
('closure', '2026-04-08', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 9),
('closure', '2026-04-09', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 10),
('closure', '2026-04-10', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 11),
('closure', '2026-04-11', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 12),
('closure', '2026-04-12', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 13),
('closure', '2026-04-13', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 14),
('closure', '2026-04-14', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 15),
('closure', '2026-04-15', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 16),
('closure', '2026-04-16', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 17),
('closure', '2026-04-17', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 18),
('closure', '2026-04-18', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 19),
('closure', '2026-04-19', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 20),
('closure', '2026-04-20', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 21),
('closure', '2026-04-21', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 22),
('closure', '2026-04-22', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 23),
('closure', '2026-04-23', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 24),
('closure', '2026-04-24', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 25),
('closure', '2026-04-25', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 26),
('closure', '2026-04-26', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 27),
('closure', '2026-04-27', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 28),
('closure', '2026-04-28', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 29),
('closure', '2026-04-29', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 30),
('closure', '2026-04-30', NULL, 'aprial holidays', 0, '2026-04-20 11:54:45', '2026-04-20 11:54:45', NULL, 31);

-- --------------------------------------------------------

--
-- Table structure for table `n_g_a_o_units`
--

CREATE TABLE `n_g_a_o_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `org_id` varchar(255) NOT NULL,
  `parent_id` varchar(255) NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_v_t_c_staff`
--

CREATE TABLE `other_v_t_c_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `kra_pin` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `religion` varchar(255) NOT NULL,
  `passport_photo_attachment` varchar(255) NOT NULL,
  `constituency_id` bigint(20) UNSIGNED NOT NULL,
  `ward_id` bigint(20) UNSIGNED NOT NULL,
  `sublocation_id` bigint(20) UNSIGNED NOT NULL,
  `village` varchar(255) NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `next_of_kin_full_names` varchar(255) NOT NULL,
  `next_of_kin_id_number` varchar(255) NOT NULL,
  `next_of_kin_phone_number` varchar(255) NOT NULL,
  `next_of_kin_relationship` varchar(255) NOT NULL,
  `next_of_kin_gender` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `meta_description`, `featured_image`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about-us', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Learn more about Laikipia ECDE Management System', NULL, 1, 'published', '2026-03-27 03:25:19', '2026-03-27 03:25:19'),
(2, 'Terms & Conditions', 'terms-conditions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Read our terms and conditions', NULL, 1, 'published', '2026-03-27 03:25:19', '2026-03-27 03:25:19'),
(3, 'Privacy Policy', 'privacy-policy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Our privacy policy', NULL, 1, 'published', '2026-03-27 03:25:19', '2026-03-27 03:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'sanctum.csrf-cookie', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(2, 'generated::5DIpL5002izlLwCn', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(3, 'applicationStatus', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(4, 'viewApplication', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(5, 'student.store', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(6, 'register.custom', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(7, 'login', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(8, 'generated::1NfHVGVT7srrOjKc', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(9, 'logout', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(10, 'register', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(11, 'generated::qqwvVNiA4yDnSot3', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(12, 'password.request', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(13, 'password.email', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(14, 'password.reset', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(15, 'password.update', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(16, 'password.confirm', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(17, 'generated::ciCBrt3fWYfY85KO', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(18, 'home', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(19, 'generated::auEk2xyd811RNVDp', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(20, 'admin.unions.create', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(21, 'admin.unions.all', 'web', '2026-03-18 08:31:23', '2026-03-18 08:31:23'),
(22, 'admin.unions.store', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(23, 'admin.edit.union', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(24, 'admin.union.update', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(25, 'admin.ecde-schools.index', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(26, 'admin.ecde-schools.create', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(27, 'admin.ecde-schools.store', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(28, 'admin.ecde-schools.show', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(29, 'admin.ecde-schools.edit', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(30, 'admin.ecde-schools.update', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(31, 'admin.ecde-schools.destroy', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(32, 'admin.feeder-schools.index', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(33, 'admin.feeder-schools.create', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(34, 'admin.feeder-schools.store', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(35, 'admin.feeder-schools.show', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(36, 'admin.feeder-schools.edit', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(37, 'admin.feeder-schools.update', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(38, 'admin.feeder-schools.destroy', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(39, 'admin.teachers.index', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(40, 'admin.teachers.create', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(41, 'admin.teachers.store', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(42, 'admin.teachers.show', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(43, 'admin.teachers.edit', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(44, 'admin.teachers.update', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(45, 'admin.teachers.destroy', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(46, 'admin.download.cert', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(47, 'admin.coordinators.create', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(48, 'admin.coordinators.all', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(49, 'admin.coordinators.store', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(50, 'admin.coordinators.edit', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(51, 'admin.coordinators.delete', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(52, 'admin.bursary.application.create', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(53, 'admin.bursary.application.all', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(54, 'admin.bursary.application.store', 'web', '2026-03-18 08:31:24', '2026-03-18 08:31:24'),
(55, 'admin.bursary.application.edit', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(56, 'admin.teacher-edit-view', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(57, 'admin.teacher-view', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(58, 'admin.ecde-students.index', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(59, 'admin.ecde-students.create', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(60, 'admin.ecde-students.store', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(61, 'admin.ecde-students.show', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(62, 'admin.ecde-students.edit', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(63, 'admin.ecde-students.update', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(64, 'admin.ecde-students.destroy', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(65, 'admin.students.create', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(66, 'admin.students.store', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(67, 'admin.counties.index', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(68, 'admin.counties.create', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(69, 'admin.counties.store', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(70, 'admin.counties.show', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(71, 'admin.counties.edit', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(72, 'admin.counties.update', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(73, 'admin.counties.destroy', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(74, 'admin.wards.index', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(75, 'admin.wards.create', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(76, 'admin.wards.store', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(77, 'admin.wards.show', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(78, 'admin.wards.edit', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(79, 'admin.wards.update', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(80, 'admin.wards.destroy', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(81, 'admin.sub-counties.index', 'web', '2026-03-18 08:31:25', '2026-03-18 08:31:25'),
(82, 'admin.sub-counties.create', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(83, 'admin.sub-counties.store', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(84, 'admin.sub-counties.show', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(85, 'admin.sub-counties.edit', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(86, 'admin.sub-counties.update', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(87, 'admin.sub-counties.destroy', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(88, 'admin.sub-locations.index', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(89, 'admin.sub-locations.create', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(90, 'admin.sub-locations.store', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(91, 'admin.sub-locations.show', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(92, 'admin.sub-locations.edit', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(93, 'admin.sub-locations.update', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(94, 'admin.sub-locations.destroy', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(95, 'admin.sms-dashboard', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(96, 'admin.sms-logs.index', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(97, 'admin.sms.send', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(98, 'admin.generate_staff_returns', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(99, 'admin.generate_dpt_staff_returns', 'web', '2026-03-18 08:31:26', '2026-03-18 08:31:26'),
(100, 'generated::CtmVMMSg53u7rx7Q', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(101, 'cms.page', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(102, 'cms.posts', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(103, 'cms.post', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(104, 'cms.galleries', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(105, 'cms.gallery', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(106, 'cms.faqs', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(107, 'cms.testimonials', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(108, 'cms.announcements', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(109, 'cms.contact', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(110, 'cms.contact.submit', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(111, 'login.submit', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(112, 'generated::ctp4qbFYYq8VWKxT', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(113, 'dashboard', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(114, 'admin.coordinators.index', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(115, 'admin.coordinators.show', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(116, 'admin.coordinators.update', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(117, 'admin.coordinators.destroy', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(118, 'admin.users.index', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(119, 'admin.users.create', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(120, 'admin.users.store', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(121, 'admin.users.show', 'web', '2026-03-23 02:29:33', '2026-03-23 02:29:33'),
(122, 'admin.users.edit', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(123, 'admin.users.update', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(124, 'admin.users.destroy', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(125, 'admin.system.logs', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(126, 'admin.system_logs_details', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(127, 'admin.roles.index', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(128, 'admin.roles.create', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(129, 'admin.roles.store', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(130, 'admin.roles.show', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(131, 'admin.roles.edit', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(132, 'admin.roles.update', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(133, 'admin.roles.destroy', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(134, 'admin.permissions.index', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(135, 'admin.permissions.create', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(136, 'admin.permissions.store', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(137, 'admin.permissions.show', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(138, 'admin.permissions.edit', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(139, 'admin.permissions.update', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(140, 'admin.permissions.destroy', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(141, 'admin.cms.pages.index', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(142, 'admin.cms.pages.create', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(143, 'admin.cms.pages.store', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(144, 'admin.cms.pages.show', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(145, 'admin.cms.pages.edit', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(146, 'admin.cms.pages.update', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(147, 'admin.cms.pages.destroy', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(148, 'admin.cms.posts.index', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(149, 'admin.cms.posts.create', 'web', '2026-03-23 02:29:34', '2026-03-23 02:29:34'),
(150, 'admin.cms.posts.store', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(151, 'admin.cms.posts.show', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(152, 'admin.cms.posts.edit', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(153, 'admin.cms.posts.update', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(154, 'admin.cms.posts.destroy', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(155, 'admin.cms.galleries.index', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(156, 'admin.cms.galleries.create', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(157, 'admin.cms.galleries.store', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(158, 'admin.cms.galleries.show', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(159, 'admin.cms.galleries.edit', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(160, 'admin.cms.galleries.update', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(161, 'admin.cms.galleries.destroy', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(162, 'admin.cms.galleries.upload-images', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(163, 'admin.cms.gallery-images.delete', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(164, 'admin.cms.testimonials.index', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(165, 'admin.cms.testimonials.create', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(166, 'admin.cms.testimonials.store', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(167, 'admin.cms.testimonials.show', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(168, 'admin.cms.testimonials.edit', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(169, 'admin.cms.testimonials.update', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(170, 'admin.cms.testimonials.destroy', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(171, 'admin.cms.announcements.index', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(172, 'admin.cms.announcements.create', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(173, 'admin.cms.announcements.store', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(174, 'admin.cms.announcements.show', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(175, 'admin.cms.announcements.edit', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(176, 'admin.cms.announcements.update', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(177, 'admin.cms.announcements.destroy', 'web', '2026-03-23 02:29:35', '2026-03-23 02:29:35'),
(178, 'admin.cms.faqs.index', 'web', '2026-03-23 02:29:36', '2026-03-23 02:29:36'),
(179, 'admin.cms.faqs.create', 'web', '2026-03-23 02:29:36', '2026-03-23 02:29:36'),
(180, 'admin.cms.faqs.store', 'web', '2026-03-23 02:29:36', '2026-03-23 02:29:36'),
(181, 'admin.cms.faqs.show', 'web', '2026-03-23 02:29:36', '2026-03-23 02:29:36'),
(182, 'admin.cms.faqs.edit', 'web', '2026-03-23 02:29:36', '2026-03-23 02:29:36'),
(183, 'admin.cms.faqs.update', 'web', '2026-03-23 02:29:36', '2026-03-23 02:29:36'),
(184, 'admin.cms.faqs.destroy', 'web', '2026-03-23 02:29:36', '2026-03-23 02:29:36'),
(185, 'admin.cms.contact-messages.index', 'web', '2026-03-23 02:29:36', '2026-03-23 02:29:36'),
(186, 'admin.cms.contact-messages.show', 'web', '2026-03-23 02:29:36', '2026-03-23 02:29:36'),
(187, 'admin.cms.contact-messages.reply', 'web', '2026-03-23 02:29:36', '2026-03-23 02:29:36'),
(188, 'admin.cms.contact-messages.mark-as-read', 'web', '2026-03-23 02:29:36', '2026-03-23 02:29:36'),
(189, 'admin.cms.contact-messages.destroy', 'web', '2026-03-23 02:29:36', '2026-03-23 02:29:36'),
(190, 'admin.cms.settings.index', 'web', '2026-03-23 02:29:36', '2026-03-23 02:29:36'),
(191, 'admin.cms.settings.update', 'web', '2026-03-23 02:29:36', '2026-03-23 02:29:36'),
(192, 'cms.announcement.show', 'web', '2026-03-24 09:40:47', '2026-03-24 09:40:47'),
(193, 'admin.unions.index', 'web', '2026-03-24 09:40:47', '2026-03-24 09:40:47'),
(194, 'admin.unions.show', 'web', '2026-03-24 09:40:47', '2026-03-24 09:40:47'),
(195, 'admin.unions.edit', 'web', '2026-03-24 09:40:47', '2026-03-24 09:40:47'),
(196, 'admin.unions.update', 'web', '2026-03-24 09:40:47', '2026-03-24 09:40:47'),
(197, 'admin.unions.destroy', 'web', '2026-03-24 09:40:48', '2026-03-24 09:40:48'),
(198, 'admin.ethnic-groups.index', 'web', '2026-03-24 09:40:48', '2026-03-24 09:40:48'),
(199, 'admin.ethnic-groups.create', 'web', '2026-03-24 09:40:48', '2026-03-24 09:40:48'),
(200, 'admin.ethnic-groups.store', 'web', '2026-03-24 09:40:48', '2026-03-24 09:40:48'),
(201, 'admin.ethnic-groups.show', 'web', '2026-03-24 09:40:48', '2026-03-24 09:40:48'),
(202, 'admin.ethnic-groups.edit', 'web', '2026-03-24 09:40:48', '2026-03-24 09:40:48'),
(203, 'admin.ethnic-groups.update', 'web', '2026-03-24 09:40:48', '2026-03-24 09:40:48'),
(204, 'admin.ethnic-groups.destroy', 'web', '2026-03-24 09:40:48', '2026-03-24 09:40:48'),
(205, 'admin.documents.index', 'web', '2026-03-24 09:40:48', '2026-03-24 09:40:48'),
(206, 'admin.documents.create', 'web', '2026-03-24 09:40:48', '2026-03-24 09:40:48'),
(207, 'admin.documents.store', 'web', '2026-03-24 09:40:48', '2026-03-24 09:40:48'),
(208, 'admin.documents.show', 'web', '2026-03-24 09:40:49', '2026-03-24 09:40:49'),
(209, 'admin.documents.edit', 'web', '2026-03-24 09:40:49', '2026-03-24 09:40:49'),
(210, 'admin.documents.update', 'web', '2026-03-24 09:40:49', '2026-03-24 09:40:49'),
(211, 'admin.documents.destroy', 'web', '2026-03-24 09:40:49', '2026-03-24 09:40:49'),
(212, 'admin.next-of-kins.index', 'web', '2026-03-24 09:40:49', '2026-03-24 09:40:49'),
(213, 'admin.next-of-kins.create', 'web', '2026-03-24 09:40:49', '2026-03-24 09:40:49'),
(214, 'admin.next-of-kins.store', 'web', '2026-03-24 09:40:49', '2026-03-24 09:40:49'),
(215, 'admin.next-of-kins.show', 'web', '2026-03-24 09:40:49', '2026-03-24 09:40:49'),
(216, 'admin.next-of-kins.edit', 'web', '2026-03-24 09:40:49', '2026-03-24 09:40:49'),
(217, 'admin.next-of-kins.update', 'web', '2026-03-24 09:40:49', '2026-03-24 09:40:49'),
(218, 'admin.next-of-kins.destroy', 'web', '2026-03-24 09:40:49', '2026-03-24 09:40:49'),
(219, 'admin.beneficiaries.index', 'web', '2026-03-24 09:40:50', '2026-03-24 09:40:50'),
(220, 'admin.beneficiaries.create', 'web', '2026-03-24 09:40:50', '2026-03-24 09:40:50'),
(221, 'admin.beneficiaries.store', 'web', '2026-03-24 09:40:50', '2026-03-24 09:40:50'),
(222, 'admin.beneficiaries.show', 'web', '2026-03-24 09:40:50', '2026-03-24 09:40:50'),
(223, 'admin.beneficiaries.edit', 'web', '2026-03-24 09:40:50', '2026-03-24 09:40:50'),
(224, 'admin.beneficiaries.update', 'web', '2026-03-24 09:40:50', '2026-03-24 09:40:50'),
(225, 'admin.beneficiaries.destroy', 'web', '2026-03-24 09:40:50', '2026-03-24 09:40:50'),
(226, 'admin.education-histories.index', 'web', '2026-03-24 09:40:50', '2026-03-24 09:40:50'),
(227, 'admin.education-histories.create', 'web', '2026-03-24 09:40:50', '2026-03-24 09:40:50'),
(228, 'admin.education-histories.store', 'web', '2026-03-24 09:40:50', '2026-03-24 09:40:50'),
(229, 'admin.education-histories.show', 'web', '2026-03-24 09:40:51', '2026-03-24 09:40:51'),
(230, 'admin.education-histories.edit', 'web', '2026-03-24 09:40:51', '2026-03-24 09:40:51'),
(231, 'admin.education-histories.update', 'web', '2026-03-24 09:40:51', '2026-03-24 09:40:51'),
(232, 'admin.education-histories.destroy', 'web', '2026-03-24 09:40:51', '2026-03-24 09:40:51'),
(233, 'admin.user-unions.index', 'web', '2026-03-24 09:40:51', '2026-03-24 09:40:51'),
(234, 'admin.user-unions.create', 'web', '2026-03-24 09:40:51', '2026-03-24 09:40:51'),
(235, 'admin.user-unions.store', 'web', '2026-03-24 09:40:51', '2026-03-24 09:40:51'),
(236, 'admin.user-unions.show', 'web', '2026-03-24 09:40:51', '2026-03-24 09:40:51'),
(237, 'admin.user-unions.edit', 'web', '2026-03-24 09:40:51', '2026-03-24 09:40:51'),
(238, 'admin.user-unions.update', 'web', '2026-03-24 09:40:51', '2026-03-24 09:40:51'),
(239, 'admin.user-unions.destroy', 'web', '2026-03-24 09:40:52', '2026-03-24 09:40:52'),
(240, 'admin.user-documents.index', 'web', '2026-03-24 09:40:52', '2026-03-24 09:40:52'),
(241, 'admin.user-documents.create', 'web', '2026-03-24 09:40:52', '2026-03-24 09:40:52'),
(242, 'admin.user-documents.store', 'web', '2026-03-24 09:40:52', '2026-03-24 09:40:52'),
(243, 'admin.user-documents.show', 'web', '2026-03-24 09:40:52', '2026-03-24 09:40:52'),
(244, 'admin.user-documents.edit', 'web', '2026-03-24 09:40:52', '2026-03-24 09:40:52'),
(245, 'admin.user-documents.update', 'web', '2026-03-24 09:40:52', '2026-03-24 09:40:52'),
(246, 'admin.user-documents.destroy', 'web', '2026-03-24 09:40:52', '2026-03-24 09:40:52'),
(247, 'admin.job-groups.index', 'web', '2026-03-24 09:40:52', '2026-03-24 09:40:52'),
(248, 'admin.job-groups.create', 'web', '2026-03-24 09:40:53', '2026-03-24 09:40:53'),
(249, 'admin.job-groups.store', 'web', '2026-03-24 09:40:53', '2026-03-24 09:40:53'),
(250, 'admin.job-groups.show', 'web', '2026-03-24 09:40:53', '2026-03-24 09:40:53'),
(251, 'admin.job-groups.edit', 'web', '2026-03-24 09:40:53', '2026-03-24 09:40:53'),
(252, 'admin.job-groups.update', 'web', '2026-03-24 09:40:53', '2026-03-24 09:40:53'),
(253, 'admin.job-groups.destroy', 'web', '2026-03-24 09:40:53', '2026-03-24 09:40:53'),
(254, 'admin.my-account', 'web', '2026-03-24 09:40:53', '2026-03-24 09:40:53'),
(255, 'admin.users.update-password', 'web', '2026-03-24 09:40:53', '2026-03-24 09:40:53');

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `views_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `featured_image`, `category_id`, `author_id`, `published_at`, `status`, `views_count`, `created_at`, `updated_at`) VALUES
(1, 'Dignissimos tenetur minus nihil dolorem.', 'dignissimos-tenetur-minus-nihil-dolorem', '<p>Rem quisquam earum in vel nam. Atque et alias eligendi est earum. Hic esse corporis ratione similique autem. Rerum facere est amet dolorum voluptas excepturi.</p><p>Minus consequatur ut ut molestiae consequatur. Delectus tempora quia at quis veniam. Ut in natus aut deleniti quia soluta sunt. Sapiente officia repellat ipsam harum aliquam maiores esse.</p><p>Magni ratione aliquid eos blanditiis hic quia. Repellat et omnis omnis. Ipsum eius rerum expedita mollitia adipisci officiis aliquid.</p><p>Quis cum quisquam maiores id non dignissimos iure. Expedita numquam esse rem modi. Et ex quis ipsam reiciendis esse excepturi rem. Officia ut dolorem omnis consequatur neque voluptas. Nam ex enim odit nostrum blanditiis eius voluptatem.</p><p>Laboriosam rerum ullam ut rerum at sequi. Ut vero non error. Et dicta aut aperiam. Voluptatem et repellat quia non dolorem.</p><p>Voluptate natus sint corrupti voluptatum eos. Et quis autem consequuntur tempora dignissimos esse. Hic et sunt quo non. Voluptatem aut iure excepturi odit corporis provident.</p><p>Rerum voluptates voluptas ipsum facilis molestiae tenetur. Explicabo magnam eius quod explicabo aut. Similique blanditiis molestias dicta tempora tempora voluptate. Totam nihil nostrum natus est.</p><p>Reiciendis dicta in nihil enim dolor. Consequatur voluptatem qui nulla fugit aut blanditiis quisquam. Tempora voluptatem cupiditate odio enim voluptatem illum.</p>', NULL, NULL, 1, '2026-02-26 12:30:18', 'published', 409, '2026-03-27 03:25:19', '2026-03-27 03:25:19'),
(2, 'Dolores ipsum necessitatibus qui consequatur est.', 'dolores-ipsum-necessitatibus-qui-consequatur-est', '<p>Ea provident voluptas omnis culpa odio eum vel. Doloremque error placeat totam et debitis eveniet. Ipsa ullam rerum voluptatem et ut officiis sint.</p><p>Ipsum libero voluptatibus id ut. Recusandae pariatur voluptatem aut nihil facere. Quaerat quis eaque et nesciunt iusto.</p><p>Sed voluptas debitis deleniti qui ratione ipsam facilis. Dicta qui est et eum consequatur minus quo. Et delectus debitis earum labore et in magni. Et occaecati dignissimos nam voluptatem deleniti saepe eos. Ut et qui recusandae omnis.</p><p>Nobis officia est sed nulla ipsam quia. Quos aliquid nobis ut possimus dolores id tempore. Labore porro totam vel ut placeat sequi ut. Rerum qui repellat maxime nesciunt dolore.</p><p>Dolore aut dolores molestiae deserunt fuga. Quod aliquid delectus eum incidunt. Et molestiae rem nihil error tempore repudiandae.</p><p>Blanditiis minima odio beatae nostrum dolorum. Aut libero sed veniam eum necessitatibus provident porro.</p><p>Recusandae modi qui dolorum. Quod ea quia vel. Deleniti et rerum adipisci ea odit reprehenderit. Sunt aliquid pariatur modi. Eos velit voluptas earum.</p><p>Occaecati illo ut ad est unde culpa. Aut atque hic et modi quibusdam autem dolores. Sunt quam debitis nihil vel adipisci eligendi facilis. Error qui necessitatibus veritatis eius.</p>', NULL, NULL, 1, '2026-03-09 00:54:27', 'published', 40, '2026-03-27 03:25:19', '2026-03-27 03:25:19'),
(3, 'Quasi assumenda rerum suscipit et voluptatem et.', 'quasi-assumenda-rerum-suscipit-et-voluptatem-et', '<p>Voluptatem qui sequi quae laborum a amet deleniti tempore. Nam voluptates incidunt debitis quisquam perspiciatis et voluptas. Dolor soluta deleniti dolores laborum alias exercitationem.</p><p>Sed omnis et consequatur ipsum quidem id. Inventore voluptatem nobis numquam libero maxime voluptatem. Vel ea ea consequatur sit provident consequatur voluptatum.</p><p>Ut numquam delectus ea dolor veniam ipsum voluptas et. Fugit cumque praesentium quo qui. Numquam consequatur quaerat non voluptatem nulla.</p><p>Est dolore sit sed ab eius commodi. Sequi reprehenderit sunt minima eum saepe quod molestias. Aliquid sequi nisi totam sequi reprehenderit doloremque. Non non repellat praesentium doloremque doloremque. Ea rerum delectus optio aspernatur dolor.</p><p>Quam amet nobis deleniti expedita. Tempore et harum numquam laborum nulla est ut. Dolores fugit ut non hic quidem. Nesciunt est et cupiditate architecto.</p><p>Doloribus deserunt doloribus ab quibusdam nisi est laborum. Delectus rem quisquam a pariatur error et quam. Iure voluptatem non dolor libero.</p><p>Adipisci sint exercitationem sapiente ab et rerum magnam. Iure excepturi nemo iusto sed dolores est. Quo quam occaecati corporis et eum et non consequuntur.</p><p>Inventore ut aperiam ad asperiores et. Dolorem ad non neque delectus dicta aut voluptatem non.</p>', NULL, NULL, 1, '2026-03-11 09:44:04', 'published', 454, '2026-03-27 03:25:19', '2026-03-27 03:25:19'),
(4, 'Et deserunt necessitatibus laboriosam et.', 'et-deserunt-necessitatibus-laboriosam-et', '<p>Beatae quia quia aut omnis dolore asperiores. Molestias nihil similique voluptatum ducimus tempora soluta ipsum et. Quia nemo quia deleniti officiis corrupti eum.</p><p>Beatae et veritatis at ut assumenda id. Eaque consequatur numquam explicabo eum. Sint culpa quaerat omnis cumque.</p><p>Reprehenderit deserunt ut provident omnis omnis assumenda. Aut iure ullam quis eum praesentium. Incidunt et est omnis omnis sed. Unde quo porro corporis consectetur molestias velit nisi.</p><p>Eos non modi non inventore. Officia fugiat debitis esse voluptatem sunt. Vel quos repellat rerum aperiam. Qui occaecati unde et modi aspernatur earum.</p><p>Veniam earum rerum aut animi autem enim voluptate cumque. Fugit praesentium et reiciendis. Ratione debitis praesentium magnam.</p><p>Amet et esse est veritatis. Voluptatem repellendus adipisci commodi fugit officia nesciunt exercitationem in. Eum animi pariatur quis vel sequi omnis rem.</p><p>A qui rem ut. Ea et et culpa sunt expedita qui ullam. Ea aut quo consectetur accusantium voluptatem repellat mollitia. Rerum dolores placeat consequatur quo occaecati voluptatibus nostrum.</p><p>Aut in placeat optio qui. Nulla provident atque architecto et.</p>', NULL, NULL, 1, '2026-03-07 07:10:12', 'published', 138, '2026-03-27 03:25:19', '2026-03-27 03:25:19'),
(5, 'Qui eum enim dolor.', 'qui-eum-enim-dolor', '<p>Mollitia possimus numquam rerum perspiciatis ab possimus iure. Totam eaque voluptas ipsam est facilis ut non. Maxime ex voluptatem et blanditiis voluptate repudiandae. Sit ut est mollitia est nihil.</p><p>Dolorum consequuntur nam pariatur voluptas sunt distinctio. Ut in in deleniti. Dolores rem non harum voluptatibus sapiente fuga cum qui. Cum cumque sunt mollitia.</p><p>Necessitatibus ut reprehenderit et eum omnis in ut. Reiciendis et maiores voluptatem iusto. Explicabo laboriosam possimus tenetur omnis aut et veritatis.</p><p>Numquam quam sapiente modi sit dicta quia. Beatae aspernatur suscipit voluptas aut nulla ullam magnam. Similique nihil sit molestias veniam voluptas.</p><p>Excepturi dolores architecto dolor omnis quisquam porro voluptatem. Omnis voluptates sapiente voluptate et eos sapiente optio. Distinctio et iste libero et dolore modi. Et exercitationem est exercitationem voluptatibus doloribus qui quo magnam. Odit error dolor facere autem et.</p><p>Autem amet et dolorem nobis est est. Quam aliquid aliquid voluptatum id.</p><p>Consequatur temporibus et dolor impedit tempora aut reprehenderit a. Aut aut ea et voluptas molestiae sit veniam. Et enim repudiandae ducimus ut quas sunt.</p><p>Aut deserunt quam repudiandae recusandae aut. Dolores libero sequi ab molestiae rerum. Repellat vitae cumque perferendis ipsam et voluptas.</p>', NULL, NULL, 1, '2026-03-03 06:20:28', 'published', 186, '2026-03-27 03:25:19', '2026-03-27 03:25:19'),
(6, 'Ut sed molestiae et.', 'ut-sed-molestiae-et', '<p>Totam sunt voluptate reiciendis est accusantium aut laboriosam. Eveniet qui natus fugiat quisquam reprehenderit non excepturi. Dignissimos optio pariatur pariatur sit autem voluptatem veniam.</p><p>Laborum reiciendis voluptatem ea repellendus. Architecto sapiente minima ea dolorem.</p><p>Illum ea vitae quia ex sed quasi eum. Officiis fugit odio est error veritatis nostrum officia. Quisquam iure est maiores qui sit et. Nobis repellat animi dolores consequatur enim. Et ea nesciunt fuga ut repudiandae recusandae.</p><p>Eum odit sequi amet in. Maxime nesciunt ipsa vel voluptas enim facilis. Doloribus nemo assumenda et. Et voluptates non tempore omnis explicabo et quisquam. Saepe optio occaecati perferendis iusto.</p><p>Aut voluptatum consequatur tempore odio labore. Vitae similique quia id dolore. Qui eos porro ea qui odit.</p><p>Tempora sed doloribus fugiat ut est. Sed quo voluptatem nam aliquam. Sed accusantium nam magnam id eos consequatur qui. Magni iusto iure perspiciatis qui omnis sint.</p><p>Ad iste et id autem velit fuga aut molestiae. Nostrum aperiam doloribus dolorem optio ipsa. Mollitia quae facilis quia consequatur.</p><p>Voluptas vero nobis veniam tempora nemo laborum non. Alias minima est rerum voluptas est asperiores. Corrupti voluptate veniam dolorem distinctio aliquam minus. Perferendis perferendis qui laboriosam voluptates veniam est.</p>', NULL, NULL, 1, '2026-03-07 03:20:21', 'published', 101, '2026-03-27 03:25:19', '2026-03-27 03:25:19'),
(7, 'Excepturi fugiat eos deleniti.', 'excepturi-fugiat-eos-deleniti', '<p>Et aut rerum iure distinctio. Alias fugit quia veritatis corporis sed omnis. Quidem esse ut facere a. Dignissimos et expedita et sunt tenetur alias nesciunt.</p><p>Dicta quia in alias et exercitationem. Unde saepe veritatis quo et quisquam fugiat. Ea modi omnis iusto esse eos fugiat et. Quis qui quis in repellendus in et sit.</p><p>Nesciunt non minus tenetur dicta non. Ipsa vitae sunt aut aperiam non. Et dicta ratione dolorum aliquam ad sed deleniti non.</p><p>Rerum aspernatur debitis fuga sed id. Eos voluptatem tempore non. Est fugit dolores illo blanditiis ea quo ut.</p><p>Porro dolores dolores est quia ea temporibus sit. In aut tempora debitis nisi est architecto. Est culpa culpa expedita officiis. Quis voluptas iste quia consequatur.</p><p>Aut suscipit rerum iure deleniti quia omnis sunt. Est recusandae possimus exercitationem facilis. Minus possimus eos voluptatibus quaerat et rerum. Iure exercitationem perspiciatis blanditiis eius.</p><p>Quibusdam qui repellat adipisci. Maiores ratione iure magnam eum quidem quas illum. Rem tempore sint nihil inventore qui illo perferendis.</p><p>Porro minus quo odio accusantium. Minus aliquid alias voluptates nostrum atque excepturi magnam. Placeat asperiores repudiandae reiciendis occaecati.</p>', NULL, NULL, 1, '2026-03-25 18:18:19', 'published', 84, '2026-03-27 03:25:19', '2026-03-27 03:25:19'),
(8, 'Commodi omnis ratione ut earum.', 'commodi-omnis-ratione-ut-earum', '<p>Debitis debitis recusandae enim repellat tenetur. Eius omnis dolores sint aut nisi a et. Eius non eos aut ipsa ut. Sunt quasi minus natus labore.</p><p>Molestiae a dolores quos sit. Ut incidunt omnis inventore qui enim. Consequatur animi ea quaerat nihil officia harum.</p><p>Animi ad hic omnis iste nihil doloremque sit. Ad est ducimus repellendus. Nihil sed voluptatem aut delectus fuga distinctio natus nemo.</p><p>Commodi aspernatur voluptas odio voluptatem est. Sint quo nihil ipsam quis recusandae culpa. Dolor fuga quia vitae dolor. Doloremque aut et molestiae quibusdam tenetur et.</p><p>Recusandae aperiam nisi dolor rem quia. Iusto voluptas quod porro aliquid iure excepturi quod. Modi facere iure et corrupti ut facilis non adipisci. Et recusandae fugiat voluptatibus dolore repellat aut voluptatum dolor. Numquam dicta architecto delectus.</p><p>Ipsum enim non corporis voluptas ipsum. Aliquam consequatur est sed omnis ea voluptate consequatur. Sint nulla et quos tenetur.</p><p>Quod aut deserunt dolorem minima magni qui. Aut fuga velit aut quasi. Ut animi est iusto impedit.</p><p>Aut nam esse delectus enim quae et labore. Labore similique voluptas eos debitis nisi eum. Doloribus beatae est doloremque consequatur nesciunt voluptas. Quidem distinctio aut et sed et ad aliquid.</p>', NULL, NULL, 1, '2026-02-27 15:19:14', 'published', 186, '2026-03-27 03:25:19', '2026-03-27 03:25:19'),
(9, 'Voluptas et illo atque occaecati dolores.', 'voluptas-et-illo-atque-occaecati-dolores', '<p>At magnam aspernatur error. Ut deserunt culpa dolor suscipit minima nisi. Occaecati omnis dolorem odit sit. Quia rerum quia perferendis qui laboriosam molestias.</p><p>Sit in reiciendis commodi libero non. Fugiat odio laudantium dolorum expedita ratione quia quas. Commodi pariatur aut deleniti non temporibus corporis.</p><p>Qui at autem quia autem sint. Corporis et incidunt et qui. Vel numquam necessitatibus molestias dolores.</p><p>Doloremque qui consequuntur et. Incidunt incidunt ipsam dolorem sunt in. Quisquam ipsa expedita consectetur nulla est. Et neque incidunt omnis animi deleniti tempore accusantium. Quam et magnam est aut.</p><p>Impedit occaecati aut aliquid rem nostrum. Doloribus ut vitae molestiae harum. Sequi labore deleniti placeat inventore possimus eveniet.</p><p>Molestiae dignissimos molestiae non ipsam aut molestias quasi. Modi officia eum voluptatem. Magni asperiores eos nostrum illum omnis debitis.</p><p>Ut nobis qui vel incidunt voluptas qui illum consequuntur. Et aut accusantium consequatur ipsum.</p><p>Optio quo dolores non maxime aspernatur. Enim repudiandae recusandae nesciunt incidunt vel. Atque voluptas ad sunt ex dolores praesentium ea.</p>', NULL, NULL, 1, '2026-03-08 03:57:55', 'published', 415, '2026-03-27 03:25:19', '2026-03-27 03:25:19'),
(10, 'Magni eveniet numquam aut.', 'magni-eveniet-numquam-aut', '<p>Iure autem est neque quidem ducimus veritatis. Harum excepturi fugit minima ipsum. Maiores voluptatem qui voluptas non voluptas ipsa.</p><p>Qui aliquid totam quos nisi. Sed iure asperiores qui cumque molestiae. Asperiores dolor dolore voluptatem quia quia modi quibusdam.</p><p>Qui consequuntur eius modi. Delectus quo ut et distinctio. Tempore et voluptates numquam aliquid. Odit et ea deleniti doloremque unde cumque molestiae. Molestias distinctio voluptatem dolorem ut.</p><p>Assumenda ipsum laborum ab dolorem repudiandae velit accusantium dolor. Sed sunt quos totam dolorum. Aperiam quidem odio voluptatem reiciendis sit. Et qui unde debitis iure dolore.</p><p>Consequatur cupiditate iste accusamus. Ratione earum et perspiciatis quae incidunt ipsum et nemo. Aut dicta dolor non sed eum sit dignissimos. Aliquid molestiae totam delectus explicabo voluptas illo id sed.</p><p>Illo commodi in autem ipsum ratione. Fugit ea possimus et quia aliquid. In quo dolores incidunt blanditiis veritatis.</p><p>Suscipit maiores facere aliquam ducimus sint. At sit voluptas praesentium ipsam blanditiis odit. Eum vitae ipsa aut eum sunt omnis consectetur.</p><p>Dolorem sit ab aut eveniet quos. Voluptate et magnam eius nostrum animi in provident voluptatibus. Tenetur doloribus libero earum consequatur. Ut et ab eaque et.</p>', NULL, NULL, 1, '2026-03-20 19:54:05', 'published', 70, '2026-03-27 03:25:19', '2026-03-27 03:25:19');

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
(1, 'Admin', 'web', '2026-03-19 08:42:03', '2026-03-19 08:42:03'),
(2, 'Teacher', 'web', '2026-03-19 08:43:16', '2026-03-19 08:43:16'),
(3, 'Cordinator', 'web', '2026-03-19 09:29:45', '2026-03-19 09:29:45');

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
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
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
(11, 3),
(12, 1),
(12, 2),
(12, 3),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(20, 3),
(21, 1),
(21, 3),
(22, 1),
(22, 3),
(23, 1),
(23, 3),
(24, 1),
(24, 3),
(25, 1),
(25, 3),
(26, 1),
(26, 3),
(27, 1),
(27, 3),
(28, 1),
(28, 3),
(29, 1),
(29, 3),
(30, 1),
(30, 3),
(31, 1),
(31, 3),
(32, 1),
(32, 2),
(32, 3),
(33, 1),
(33, 2),
(33, 3),
(34, 1),
(34, 2),
(34, 3),
(35, 1),
(35, 2),
(35, 3),
(36, 1),
(36, 2),
(36, 3),
(37, 1),
(37, 2),
(37, 3),
(38, 1),
(38, 2),
(38, 3),
(39, 1),
(39, 2),
(39, 3),
(40, 1),
(40, 2),
(40, 3),
(41, 1),
(41, 2),
(41, 3),
(42, 1),
(42, 2),
(42, 3),
(43, 1),
(43, 2),
(43, 3),
(44, 1),
(44, 2),
(44, 3),
(45, 1),
(45, 2),
(45, 3),
(46, 1),
(46, 2),
(46, 3),
(47, 1),
(47, 2),
(47, 3),
(48, 1),
(48, 2),
(48, 3),
(49, 1),
(49, 2),
(49, 3),
(50, 1),
(50, 2),
(50, 3),
(51, 1),
(51, 2),
(51, 3),
(52, 1),
(52, 2),
(52, 3),
(53, 1),
(53, 2),
(53, 3),
(54, 1),
(54, 2),
(54, 3),
(55, 1),
(55, 2),
(55, 3),
(56, 1),
(56, 2),
(56, 3),
(57, 1),
(57, 2),
(57, 3),
(58, 1),
(58, 2),
(58, 3),
(59, 1),
(59, 2),
(59, 3),
(60, 1),
(60, 2),
(60, 3),
(61, 1),
(61, 2),
(61, 3),
(62, 1),
(62, 2),
(62, 3),
(63, 1),
(63, 2),
(63, 3),
(64, 1),
(64, 2),
(64, 3),
(65, 1),
(65, 2),
(65, 3),
(66, 1),
(66, 2),
(66, 3),
(67, 1),
(67, 3),
(68, 1),
(68, 3),
(69, 1),
(69, 3),
(70, 1),
(70, 3),
(71, 1),
(71, 3),
(72, 1),
(72, 3),
(73, 1),
(73, 3),
(74, 1),
(74, 3),
(75, 1),
(75, 3),
(76, 1),
(76, 3),
(77, 1),
(77, 3),
(78, 1),
(78, 3),
(79, 1),
(79, 3),
(80, 1),
(80, 3),
(81, 1),
(81, 3),
(82, 1),
(82, 3),
(83, 1),
(83, 3),
(84, 1),
(84, 3),
(85, 1),
(85, 3),
(86, 1),
(86, 3),
(87, 1),
(87, 3),
(88, 1),
(88, 3),
(89, 1),
(89, 3),
(90, 1),
(90, 3),
(91, 1),
(91, 3),
(92, 1),
(92, 3),
(93, 1),
(93, 3),
(94, 1),
(94, 3),
(95, 1),
(95, 3),
(96, 1),
(96, 3),
(97, 1),
(97, 2),
(97, 3),
(98, 1),
(98, 2),
(98, 3),
(99, 1),
(99, 2),
(99, 3),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(158, 1),
(159, 1),
(160, 1),
(161, 1),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(166, 1),
(167, 1),
(168, 1),
(169, 1),
(170, 1),
(171, 1),
(172, 1),
(173, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(178, 1),
(179, 1),
(180, 1),
(181, 1),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(186, 1),
(187, 1),
(188, 1),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(193, 1),
(194, 1),
(195, 1),
(196, 1),
(197, 1),
(198, 1),
(199, 1),
(200, 1),
(201, 1),
(202, 1),
(203, 1),
(204, 1),
(205, 1),
(206, 1),
(207, 1),
(208, 1),
(209, 1),
(210, 1),
(211, 1),
(212, 1),
(213, 1),
(214, 1),
(215, 1),
(216, 1),
(217, 1),
(218, 1),
(219, 1),
(220, 1),
(221, 1),
(222, 1),
(223, 1),
(224, 1),
(225, 1),
(226, 1),
(227, 1),
(228, 1),
(229, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `type` enum('string','text','json','boolean') NOT NULL DEFAULT 'string',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Laikipia ECDE MIS', 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(2, 'site_description', 'ecde management system', 'text', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(3, 'home_hero_headline', NULL, 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(4, 'home_hero_subtext', NULL, 'text', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(5, 'home_hero_primary_cta_text', NULL, 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(6, 'home_hero_primary_cta_link', NULL, 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(7, 'home_hero_secondary_cta_text', NULL, 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(8, 'home_hero_secondary_cta_link', NULL, 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(9, 'contact_email', 'teacher2@gmail.com', 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(10, 'contact_phone', '0798985851', 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(11, 'site_address', '165 ELDORET', 'text', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(12, 'contact_address', '165 ELDORET', 'text', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(13, 'facebook_url', NULL, 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(14, 'twitter_url', NULL, 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(15, 'instagram_url', NULL, 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(16, 'youtube_url', NULL, 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(17, 'social_facebook', NULL, 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(18, 'social_twitter', NULL, 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(19, 'social_instagram', NULL, 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(20, 'social_youtube', NULL, 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(21, 'items_per_page', '10', 'string', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(22, 'enable_comments', '0', 'boolean', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(23, 'show_home_hero', '1', 'boolean', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(24, 'show_home_posts', '1', 'boolean', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(25, 'show_home_announcements', '1', 'boolean', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(26, 'show_home_testimonials', '1', 'boolean', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(27, 'show_home_explore', '1', 'boolean', '2026-03-24 09:53:47', '2026-03-24 09:53:47'),
(28, 'home_hero_image', 'hero/FmLRJ6C9LP8joYg4zBHNzAodzESdYCtuc7jfVfgH.jpg', 'string', '2026-03-24 09:53:49', '2026-03-24 09:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `pwd_status` varchar(255) DEFAULT NULL,
  `disability_type` varchar(255) DEFAULT NULL,
  `impairment_details` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `reg_number` varchar(255) DEFAULT NULL,
  `sub_location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ward_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `passport_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `middle_name`, `pwd_status`, `disability_type`, `impairment_details`, `dob`, `reg_number`, `sub_location_id`, `ward_id`, `student_type_id`, `gender`, `village`, `school_id`, `passport_photo`, `created_at`, `updated_at`) VALUES
(6, 'SILAS', 'MWANGI', 'KAMAU', 'No', NULL, NULL, '2022-05-30', '211191', 1, 0, NULL, 'male', 'KARUGA', '6', NULL, '2026-03-24 10:11:25', '2026-03-24 10:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `student_applications`
--

CREATE TABLE `student_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `county_id` bigint(20) DEFAULT NULL,
  `ac_no` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `tel_no` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `admission_number` varchar(255) DEFAULT NULL,
  `year_of_study` varchar(255) DEFAULT NULL,
  `total_fees` bigint(20) NOT NULL DEFAULT 0,
  `paid` bigint(20) NOT NULL DEFAULT 0,
  `balance` bigint(20) NOT NULL DEFAULT 0,
  `program` varchar(255) DEFAULT NULL,
  `ward_id` bigint(20) NOT NULL DEFAULT 0,
  `sub_location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bursary_ref` bigint(20) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_parents`
--

CREATE TABLE `student_parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `disability_status` varchar(255) DEFAULT NULL,
  `plwd_number` varchar(255) DEFAULT NULL,
  `annex_doc` varchar(255) DEFAULT NULL,
  `other_docs` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_types`
--

CREATE TABLE `student_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_type_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_locations`
--

CREATE TABLE `sub_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `ward_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_locations`
--

INSERT INTO `sub_locations` (`id`, `name`, `ward_id`, `created_at`, `updated_at`) VALUES
(5, 'Shamanei', '0', '2026-03-24 10:11:58', '2026-03-24 10:11:58'),
(6, 'Nanyuki', '0', '2026-03-24 10:12:29', '2026-03-24 10:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `system_activity_logs`
--

CREATE TABLE `system_activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `causer_id` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `network` varchar(255) DEFAULT NULL,
  `subject_id` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `asset_url` text DEFAULT NULL,
  `current_object` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`current_object`)),
  `new_object` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`new_object`)),
  `type` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `model_table_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_activity_logs`
--

INSERT INTO `system_activity_logs` (`id`, `causer_id`, `ip_address`, `network`, `subject_id`, `action`, `event`, `description`, `asset_url`, `current_object`, `new_object`, `type`, `created_at`, `updated_at`, `model_table_name`) VALUES
(1, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-19 09:49:53', '2026-03-19 09:49:53', 'users'),
(2, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed the users create page', 'users', '{}', '{}', '', '2026-03-19 09:50:11', '2026-03-19 09:50:11', 'users'),
(3, '1', '127.0.0.1', 'Unknown', '19', 'store', NULL, 'User created a new user with email xixacit@mailinator.com', 'admin/users', '{}', '{\"first_name\":\"Ali\",\"middle_name\":\"Leah Fry\",\"last_name\":\"Mccarthy\",\"email\":\"xixacit@mailinator.com\",\"phone_number\":\"+1 (155) 486-8257\",\"role\":\"Cordinator\",\"updated_at\":\"2026-03-19T12:50:17.000000Z\",\"created_at\":\"2026-03-19T12:50:17.000000Z\",\"id\":19}', '', '2026-03-19 09:50:18', '2026-03-19 09:50:18', 'users'),
(4, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-19 09:50:19', '2026-03-19 09:50:19', 'users'),
(5, '1', '127.0.0.1', 'Unknown', '8', 'edit', NULL, 'User accessed edit user page for user id 8', 'admin/users/8/edit', '{}', '{\"id\":8,\"first_name\":\"Sasha\",\"last_name\":\"Hatfield\",\"middle_name\":\"Dustin Brown\",\"email\":\"lulen@mailinator.com\",\"email_verified_at\":null,\"role\":\"teacher\",\"created_at\":\"2026-03-17T11:16:02.000000Z\",\"updated_at\":\"2026-03-17T11:16:02.000000Z\",\"phone_number\":\"0\",\"id_number\":null}', '', '2026-03-19 09:50:36', '2026-03-19 09:50:36', 'users'),
(6, '1', '127.0.0.1', 'Unknown', '8', 'update', NULL, 'User updated user with id 8', 'admin/users/8', '{\"id\":8,\"first_name\":\"Indira\",\"last_name\":\"Koch\",\"middle_name\":\"Philip Navarro\",\"email\":\"kobo@mailinator.com\",\"email_verified_at\":null,\"role\":\"Cordinator\",\"created_at\":\"2026-03-17T11:16:02.000000Z\",\"updated_at\":\"2026-03-19T12:50:42.000000Z\",\"phone_number\":\"+1 (714) 884-7003\",\"id_number\":null}', '{\"id\":8,\"first_name\":\"Indira\",\"last_name\":\"Koch\",\"middle_name\":\"Philip Navarro\",\"email\":\"kobo@mailinator.com\",\"email_verified_at\":null,\"role\":\"Cordinator\",\"created_at\":\"2026-03-17T11:16:02.000000Z\",\"updated_at\":\"2026-03-19T12:50:42.000000Z\",\"phone_number\":\"+1 (714) 884-7003\",\"id_number\":null}', '', '2026-03-19 09:50:56', '2026-03-19 09:50:56', 'users'),
(7, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-19 09:50:57', '2026-03-19 09:50:57', 'users'),
(8, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-19 09:55:10', '2026-03-19 09:55:10', 'users'),
(9, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-19 09:55:20', '2026-03-19 09:55:20', 'users'),
(10, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-19 09:55:56', '2026-03-19 09:55:56', 'users'),
(11, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the system logs index page', 'users', '{}', '{}', '', '2026-03-19 09:56:00', '2026-03-19 09:56:00', 'system_activity_logs'),
(12, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the system logs index page', 'users', '{}', '{}', '', '2026-03-19 09:56:21', '2026-03-19 09:56:21', 'system_activity_logs'),
(13, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the system logs index page', 'users', '{}', '{}', '', '2026-03-19 09:56:42', '2026-03-19 09:56:42', 'system_activity_logs'),
(14, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the system logs index page', 'users', '{}', '{}', '', '2026-03-19 09:57:17', '2026-03-19 09:57:17', 'system_activity_logs'),
(15, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the system logs index page', 'users', '{}', '{}', '', '2026-03-19 09:57:47', '2026-03-19 09:57:47', 'system_activity_logs'),
(16, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the system logs index page', 'users', '{}', '{}', '', '2026-03-19 09:58:05', '2026-03-19 09:58:05', 'system_activity_logs'),
(17, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the system logs index page', 'users', '{}', '{}', '', '2026-03-19 09:59:31', '2026-03-19 09:59:31', 'system_activity_logs'),
(18, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the system logs index page', 'users', '{}', '{}', '', '2026-03-19 10:00:21', '2026-03-19 10:00:21', 'system_activity_logs'),
(19, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the system logs index page', 'users', '{}', '{}', '', '2026-03-19 10:00:40', '2026-03-19 10:00:40', 'system_activity_logs'),
(20, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the system logs index page', 'users', '{}', '{}', '', '2026-03-19 10:01:01', '2026-03-19 10:01:01', 'system_activity_logs'),
(21, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the system logs index page', 'users', '{}', '{}', '', '2026-03-19 10:01:14', '2026-03-19 10:01:14', 'system_activity_logs'),
(22, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-23 02:24:21', '2026-03-23 02:24:21', 'users'),
(23, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-23 02:27:54', '2026-03-23 02:27:54', 'users'),
(24, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-23 02:29:03', '2026-03-23 02:29:03', 'users'),
(25, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-23 02:29:55', '2026-03-23 02:29:55', 'users'),
(26, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-23 02:29:58', '2026-03-23 02:29:58', 'users'),
(27, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-23 02:32:20', '2026-03-23 02:32:20', 'users'),
(28, '1', '127.0.0.1', 'Unknown', '14', 'edit', NULL, 'User accessed edit user page for user id 14', 'admin/users/14/edit', '{}', '{\"id\":14,\"first_name\":\"Rebekah\",\"last_name\":\"Callahan\",\"middle_name\":\"Avye Fowler\",\"email\":\"roxyk@mailinator.com\",\"email_verified_at\":null,\"role\":\"Teacher\",\"created_at\":\"2026-03-19T11:49:42.000000Z\",\"updated_at\":\"2026-03-19T11:53:43.000000Z\",\"phone_number\":\"+1 (644) 716-8527\",\"id_number\":null}', '', '2026-03-23 02:32:25', '2026-03-23 02:32:25', 'users'),
(29, '1', '127.0.0.1', 'Unknown', '14', 'update', NULL, 'User updated user with id 14', 'admin/users/14', '{\"id\":14,\"first_name\":\"Rebekah\",\"last_name\":\"Callahan\",\"middle_name\":\"Avye Fowler\",\"email\":\"roxyk@mailinator.com\",\"email_verified_at\":null,\"role\":\"Teacher\",\"created_at\":\"2026-03-19T11:49:42.000000Z\",\"updated_at\":\"2026-03-19T11:53:43.000000Z\",\"phone_number\":\"+1 (644) 716-8527\",\"id_number\":null}', '{\"id\":14,\"first_name\":\"Test\",\"last_name\":\"Teacher\",\"middle_name\":\"Avye Fowler\",\"email\":\"teacher@gmail.com\",\"email_verified_at\":null,\"role\":\"Teacher\",\"created_at\":\"2026-03-19T11:49:42.000000Z\",\"updated_at\":\"2026-03-23T05:32:52.000000Z\",\"phone_number\":\"0798985851\",\"id_number\":null}', '', '2026-03-23 02:32:52', '2026-03-23 02:32:52', 'users'),
(30, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-23 02:32:53', '2026-03-23 02:32:53', 'users'),
(31, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-23 02:33:39', '2026-03-23 02:33:39', 'users'),
(32, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-23 02:42:37', '2026-03-23 02:42:37', 'users'),
(33, '1', '127.0.0.1', 'Unknown', '7', 'edit', NULL, 'User accessed edit user page for user id 7', 'admin/users/7/edit', '{}', '{\"id\":7,\"first_name\":\"Tanya\",\"last_name\":\"Merritt\",\"middle_name\":\"Marah Horne\",\"email\":\"tilysez@mailinator.com\",\"email_verified_at\":null,\"role\":\"teacher\",\"created_at\":\"2026-03-17T11:15:23.000000Z\",\"updated_at\":\"2026-03-23T05:42:27.000000Z\",\"phone_number\":\"0\",\"id_number\":null}', '', '2026-03-23 02:42:46', '2026-03-23 02:42:46', 'users'),
(34, '1', '127.0.0.1', 'Unknown', '7', 'update', NULL, 'User updated user with id 7', 'admin/users/7', '{\"id\":7,\"first_name\":\"Tanya\",\"last_name\":\"Merritt\",\"middle_name\":\"Marah Horne\",\"email\":\"tilysez@mailinator.com\",\"email_verified_at\":null,\"role\":\"teacher\",\"created_at\":\"2026-03-17T11:15:23.000000Z\",\"updated_at\":\"2026-03-23T05:42:27.000000Z\",\"phone_number\":\"0\",\"id_number\":null}', '{\"id\":7,\"first_name\":\"Tanya\",\"last_name\":\"Merritt\",\"middle_name\":\"Marah Horne\",\"email\":\"teacher2@gmail.com\",\"email_verified_at\":null,\"role\":\"Teacher\",\"created_at\":\"2026-03-17T11:15:23.000000Z\",\"updated_at\":\"2026-03-23T05:43:02.000000Z\",\"phone_number\":\"0\",\"id_number\":null}', '', '2026-03-23 02:43:02', '2026-03-23 02:43:02', 'users'),
(35, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-23 02:43:02', '2026-03-23 02:43:02', 'users'),
(36, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-23 02:45:42', '2026-03-23 02:45:42', 'users'),
(37, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-23 02:45:57', '2026-03-23 02:45:57', 'users'),
(38, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/user-documents', 'admin/user-documents', '{}', '{}', '', '2026-03-23 06:23:21', '2026-03-23 06:23:21', 'admin'),
(39, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-23 06:25:09', '2026-03-23 06:25:09', 'admin'),
(40, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/feeder-schools', 'admin/feeder-schools', '{}', '{}', '', '2026-03-23 06:25:12', '2026-03-23 06:25:12', 'admin'),
(41, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/feeder-schools/create', 'admin/feeder-schools/create', '{}', '{}', '', '2026-03-23 06:25:17', '2026-03-23 06:25:17', 'admin'),
(42, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/feeder-schools/create', 'admin/feeder-schools/create', '{}', '{}', '', '2026-03-23 06:56:16', '2026-03-23 06:56:16', 'admin'),
(43, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/feeder-schools/create', 'admin/feeder-schools/create', '{}', '{}', '', '2026-03-23 06:56:53', '2026-03-23 06:56:53', 'admin'),
(44, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/feeder-schools/create', 'admin/feeder-schools/create', '{}', '{}', '', '2026-03-23 06:57:02', '2026-03-23 06:57:02', 'admin'),
(45, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 06:57:09', '2026-03-23 06:57:09', 'home'),
(46, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 06:58:24', '2026-03-23 06:58:24', 'home'),
(47, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 06:58:30', '2026-03-23 06:58:30', 'home'),
(48, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 06:58:32', '2026-03-23 06:58:32', 'home'),
(49, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 06:58:55', '2026-03-23 06:58:55', 'home'),
(50, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 06:59:06', '2026-03-23 06:59:06', 'home'),
(51, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 06:59:18', '2026-03-23 06:59:18', 'home'),
(52, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:01:03', '2026-03-23 07:01:03', 'admin'),
(53, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:02:11', '2026-03-23 07:02:11', 'admin'),
(54, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:06:10', '2026-03-23 07:06:10', 'admin'),
(55, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:06:13', '2026-03-23 07:06:13', 'admin'),
(56, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:06:28', '2026-03-23 07:06:28', 'admin'),
(57, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:06:46', '2026-03-23 07:06:46', 'admin'),
(58, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:06:49', '2026-03-23 07:06:49', 'admin'),
(59, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:06:59', '2026-03-23 07:06:59', 'admin'),
(60, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:07:13', '2026-03-23 07:07:13', 'admin'),
(61, '1', '127.0.0.1', 'Unknown', '0', 'updatePassword', NULL, 'User accessed admin/update-password/{id}', 'admin/update-password/1', '{}', '{}', '', '2026-03-23 07:07:18', '2026-03-23 07:07:18', 'admin'),
(62, '1', '127.0.0.1', 'Unknown', '0', 'updatePassword', NULL, 'User accessed admin/update-password/{id}', 'admin/update-password/1', '{}', '{}', '', '2026-03-23 07:07:30', '2026-03-23 07:07:30', 'admin'),
(63, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:07:30', '2026-03-23 07:07:30', 'admin'),
(64, '1', '127.0.0.1', 'Unknown', '0', 'updatePassword', NULL, 'User accessed admin/update-password/{id}', 'admin/update-password/1', '{}', '{}', '', '2026-03-23 07:07:38', '2026-03-23 07:07:38', 'admin'),
(65, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:07:38', '2026-03-23 07:07:38', 'admin'),
(66, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:07:55', '2026-03-23 07:07:55', 'admin'),
(67, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:08:03', '2026-03-23 07:08:03', 'admin'),
(68, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:08:23', '2026-03-23 07:08:23', 'admin'),
(69, '1', '127.0.0.1', 'Unknown', '0', 'updatePassword', NULL, 'User accessed admin/update-password/{id}', 'admin/update-password/1', '{}', '{}', '', '2026-03-23 07:08:27', '2026-03-23 07:08:27', 'admin'),
(70, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:08:27', '2026-03-23 07:08:27', 'admin'),
(71, '1', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/users/{user}', 'admin/users/1', '{}', '{}', '', '2026-03-23 07:08:35', '2026-03-23 07:08:35', 'admin'),
(72, '1', '127.0.0.1', 'Unknown', '1', 'update', NULL, 'User updated user with id 1', 'admin/users/1', '{\"id\":1,\"first_name\":\"Emmanuel\",\"last_name\":\"l_name\",\"middle_name\":\"m_name\",\"email\":\"admin@mail.com\",\"email_verified_at\":null,\"role\":\"Admin\",\"created_at\":\"2026-03-16T14:14:47.000000Z\",\"updated_at\":\"2026-03-19T11:58:55.000000Z\",\"phone_number\":\"0798985851\",\"id_number\":null}', '{\"id\":1,\"first_name\":\"Emmanuel\",\"last_name\":\"l_name\",\"middle_name\":\"m_name\",\"email\":\"admin@mail.com\",\"email_verified_at\":null,\"role\":\"Admin\",\"created_at\":\"2026-03-16T14:14:47.000000Z\",\"updated_at\":\"2026-03-19T11:58:55.000000Z\",\"phone_number\":\"0798985851\",\"id_number\":null}', '', '2026-03-23 07:09:28', '2026-03-23 07:09:28', 'users'),
(73, '1', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/users/{user}', 'admin/users/1', '{}', '{}', '', '2026-03-23 07:09:28', '2026-03-23 07:09:28', 'admin'),
(74, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:09:29', '2026-03-23 07:09:29', 'admin'),
(75, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:16:05', '2026-03-23 07:16:05', 'admin'),
(76, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 07:16:10', '2026-03-23 07:16:10', 'home'),
(77, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:16:15', '2026-03-23 07:16:15', 'admin'),
(78, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 07:16:17', '2026-03-23 07:16:17', 'home'),
(79, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:16:19', '2026-03-23 07:16:19', 'admin'),
(80, '1', '127.0.0.1', 'Unknown', '1', 'update', NULL, 'User updated user with id 1', 'admin/users/1', '{\"id\":1,\"first_name\":\"Emmanuel\",\"last_name\":\"l_name\",\"middle_name\":\"m_name\",\"email\":\"admin@mail.com\",\"email_verified_at\":null,\"role\":\"Admin\",\"created_at\":\"2026-03-16T14:14:47.000000Z\",\"updated_at\":\"2026-03-19T11:58:55.000000Z\",\"phone_number\":\"0798985851\",\"id_number\":null}', '{\"id\":1,\"first_name\":\"Emmanuel\",\"last_name\":\"l_name\",\"middle_name\":\"m_name\",\"email\":\"admin@mail.com\",\"email_verified_at\":null,\"role\":\"Admin\",\"created_at\":\"2026-03-16T14:14:47.000000Z\",\"updated_at\":\"2026-03-19T11:58:55.000000Z\",\"phone_number\":\"0798985851\",\"id_number\":null}', '', '2026-03-23 07:16:45', '2026-03-23 07:16:45', 'users'),
(81, '1', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/users/{user}', 'admin/users/1', '{}', '{}', '', '2026-03-23 07:16:45', '2026-03-23 07:16:45', 'admin'),
(82, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 07:16:45', '2026-03-23 07:16:45', 'admin'),
(83, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 07:16:52', '2026-03-23 07:16:52', 'admin'),
(84, '1', '127.0.0.1', 'Unknown', '0', 'generateStaffReturns', NULL, 'User accessed admin/generate_staff_returns', 'admin/generate_staff_returns', '{}', '{}', '', '2026-03-23 07:16:57', '2026-03-23 07:16:57', 'admin'),
(85, '1', '127.0.0.1', 'Unknown', '0', 'generateStaffReturns', NULL, 'User accessed admin/generate_staff_returns', 'admin/generate_staff_returns', '{}', '{}', '', '2026-03-23 07:18:06', '2026-03-23 07:18:06', 'admin'),
(86, '1', '127.0.0.1', 'Unknown', '0', 'generateStaffReturns', NULL, 'User accessed admin/generate_staff_returns', 'admin/generate_staff_returns', '{}', '{}', '', '2026-03-23 07:19:55', '2026-03-23 07:19:55', 'admin'),
(87, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 07:22:55', '2026-03-23 07:22:55', 'admin'),
(88, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-23 07:22:58', '2026-03-23 07:22:58', 'admin'),
(89, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-23 07:26:06', '2026-03-23 07:26:06', 'admin'),
(90, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-23 07:26:24', '2026-03-23 07:26:24', 'admin'),
(91, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-23 07:26:33', '2026-03-23 07:26:33', 'admin'),
(92, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-23 07:27:09', '2026-03-23 07:27:09', 'admin'),
(93, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-23 07:27:25', '2026-03-23 07:27:25', 'admin'),
(94, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-23 07:27:35', '2026-03-23 07:27:35', 'admin'),
(95, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-23 07:28:18', '2026-03-23 07:28:18', 'admin'),
(96, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/job-groups/create', 'admin/job-groups/create', '{}', '{}', '', '2026-03-23 07:28:26', '2026-03-23 07:28:26', 'admin'),
(97, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/job-groups/create', 'admin/job-groups/create', '{}', '{}', '', '2026-03-23 07:28:54', '2026-03-23 07:28:54', 'admin'),
(98, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/job-groups/create', 'admin/job-groups/create', '{}', '{}', '', '2026-03-23 07:29:00', '2026-03-23 07:29:00', 'admin'),
(99, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/job-groups/create', 'admin/job-groups/create', '{}', '{}', '', '2026-03-23 07:29:13', '2026-03-23 07:29:13', 'admin'),
(100, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-23 07:29:25', '2026-03-23 07:29:25', 'admin'),
(101, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-23 07:30:09', '2026-03-23 07:30:09', 'admin'),
(102, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-23 07:30:09', '2026-03-23 07:30:09', 'admin'),
(103, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/job-groups/create', 'admin/job-groups/create', '{}', '{}', '', '2026-03-23 07:30:12', '2026-03-23 07:30:12', 'admin'),
(104, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-23 07:30:18', '2026-03-23 07:30:18', 'admin'),
(105, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-23 07:30:19', '2026-03-23 07:30:19', 'admin'),
(106, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 07:30:30', '2026-03-23 07:30:30', 'admin'),
(107, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-23 07:30:33', '2026-03-23 07:30:33', 'admin'),
(108, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 07:30:58', '2026-03-23 07:30:58', 'admin'),
(109, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-23 07:31:00', '2026-03-23 07:31:00', 'admin'),
(110, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-23 07:31:55', '2026-03-23 07:31:55', 'admin'),
(111, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-23 07:33:54', '2026-03-23 07:33:54', 'admin'),
(112, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-23 07:34:27', '2026-03-23 07:34:27', 'admin'),
(113, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-23 07:35:00', '2026-03-23 07:35:00', 'admin'),
(114, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-23 07:35:27', '2026-03-23 07:35:27', 'admin'),
(115, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-23 07:35:39', '2026-03-23 07:35:39', 'admin'),
(116, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 07:36:09', '2026-03-23 07:36:09', 'admin'),
(117, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 07:36:22', '2026-03-23 07:36:22', 'admin'),
(118, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 07:36:22', '2026-03-23 07:36:22', 'admin'),
(119, '1', '127.0.0.1', 'Unknown', '0', 'generateStaffReturns', NULL, 'User accessed admin/generate_staff_returns', 'admin/generate_staff_returns', '{}', '{}', '', '2026-03-23 07:36:26', '2026-03-23 07:36:26', 'admin'),
(120, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-23 07:36:53', '2026-03-23 07:36:53', 'admin'),
(121, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-23 07:37:24', '2026-03-23 07:37:24', 'admin'),
(122, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 07:38:08', '2026-03-23 07:38:08', 'admin'),
(123, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 07:38:08', '2026-03-23 07:38:08', 'admin'),
(124, '1', '127.0.0.1', 'Unknown', '0', 'generateStaffReturns', NULL, 'User accessed admin/generate_staff_returns', 'admin/generate_staff_returns', '{}', '{}', '', '2026-03-23 07:39:00', '2026-03-23 07:39:00', 'admin'),
(125, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 07:40:59', '2026-03-23 07:40:59', 'home'),
(126, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 07:41:48', '2026-03-23 07:41:48', 'home'),
(127, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 07:42:21', '2026-03-23 07:42:21', 'home'),
(128, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-23 07:58:16', '2026-03-23 07:58:16', 'dashboard'),
(129, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ethnic-groups', 'admin/ethnic-groups', '{}', '{}', '', '2026-03-23 07:58:26', '2026-03-23 07:58:26', 'admin'),
(130, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ethnic-groups', 'admin/ethnic-groups', '{}', '{}', '', '2026-03-23 07:58:45', '2026-03-23 07:58:45', 'admin'),
(131, '14', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-23 09:26:02', '2026-03-23 09:26:02', 'login'),
(132, '14', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 09:26:02', '2026-03-23 09:26:02', 'home'),
(133, '14', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-23 09:26:08', '2026-03-23 09:26:08', 'admin'),
(134, '14', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 09:26:10', '2026-03-23 09:26:10', 'admin'),
(135, '14', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 09:26:16', '2026-03-23 09:26:16', 'admin'),
(136, '14', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-23 09:26:21', '2026-03-23 09:26:21', 'admin'),
(137, '14', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 09:26:22', '2026-03-23 09:26:22', 'admin'),
(138, '14', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 09:26:39', '2026-03-23 09:26:39', 'home'),
(139, '14', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 09:26:48', '2026-03-23 09:26:48', 'admin'),
(140, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-23 09:27:05', '2026-03-23 09:27:05', 'users'),
(141, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/users', 'admin/users', '{}', '{}', '', '2026-03-23 09:27:06', '2026-03-23 09:27:06', 'admin'),
(142, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the system logs index page', 'users', '{}', '{}', '', '2026-03-23 09:27:09', '2026-03-23 09:27:09', 'system_activity_logs'),
(143, '1', '127.0.0.1', 'Unknown', '0', 'systemLogs', NULL, 'User accessed admin/system-logs', 'admin/system-logs', '{}', '{}', '', '2026-03-23 09:27:09', '2026-03-23 09:27:09', 'admin'),
(144, '1', '127.0.0.1', 'Unknown', '0', 'systemLogs', NULL, 'User accessed admin/system-logs', 'admin/system-logs', '{}', '{}', '', '2026-03-23 09:27:10', '2026-03-23 09:27:10', 'admin'),
(145, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/roles', 'admin/roles', '{}', '{}', '', '2026-03-23 09:27:24', '2026-03-23 09:27:24', 'admin'),
(146, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-23 09:27:31', '2026-03-23 09:27:31', 'users'),
(147, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/users', 'admin/users', '{}', '{}', '', '2026-03-23 09:27:31', '2026-03-23 09:27:31', 'admin'),
(148, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/roles', 'admin/roles', '{}', '{}', '', '2026-03-23 09:28:00', '2026-03-23 09:28:00', 'admin'),
(149, '7', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-23 09:28:17', '2026-03-23 09:28:17', 'login'),
(150, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-23 09:28:18', '2026-03-23 09:28:18', 'dashboard'),
(151, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-23 09:29:15', '2026-03-23 09:29:15', 'dashboard'),
(152, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-23 09:29:18', '2026-03-23 09:29:18', 'admin'),
(153, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/next-of-kins/create', 'admin/next-of-kins/create', '{}', '{}', '', '2026-03-23 09:29:22', '2026-03-23 09:29:22', 'admin'),
(154, '7', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-23 09:30:03', '2026-03-23 09:30:03', 'login'),
(155, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-23 09:30:04', '2026-03-23 09:30:04', 'dashboard'),
(156, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-23 09:30:07', '2026-03-23 09:30:07', 'admin'),
(157, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/next-of-kins/create', 'admin/next-of-kins/create', '{}', '{}', '', '2026-03-23 09:30:09', '2026-03-23 09:30:09', 'admin'),
(158, '7', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-23 09:30:13', '2026-03-23 09:30:13', 'admin'),
(159, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-23 09:30:14', '2026-03-23 09:30:14', 'admin'),
(160, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/beneficiaries', 'admin/beneficiaries', '{}', '{}', '', '2026-03-23 09:30:18', '2026-03-23 09:30:18', 'admin'),
(161, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/beneficiaries/create', 'admin/beneficiaries/create', '{}', '{}', '', '2026-03-23 09:30:21', '2026-03-23 09:30:21', 'admin'),
(162, '7', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/beneficiaries', 'admin/beneficiaries', '{}', '{}', '', '2026-03-23 09:30:24', '2026-03-23 09:30:24', 'admin'),
(163, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/beneficiaries', 'admin/beneficiaries', '{}', '{}', '', '2026-03-23 09:30:24', '2026-03-23 09:30:24', 'admin'),
(164, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/user-unions', 'admin/user-unions', '{}', '{}', '', '2026-03-23 09:30:28', '2026-03-23 09:30:28', 'admin'),
(165, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/user-unions/create', 'admin/user-unions/create', '{}', '{}', '', '2026-03-23 09:30:30', '2026-03-23 09:30:30', 'admin'),
(166, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/user-unions', 'admin/user-unions', '{}', '{}', '', '2026-03-23 09:30:41', '2026-03-23 09:30:41', 'admin'),
(167, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/user-unions', 'admin/user-unions', '{}', '{}', '', '2026-03-23 09:31:21', '2026-03-23 09:31:21', 'admin'),
(168, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/education-histories', 'admin/education-histories', '{}', '{}', '', '2026-03-23 09:31:27', '2026-03-23 09:31:27', 'admin'),
(169, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/education-histories/create', 'admin/education-histories/create', '{}', '{}', '', '2026-03-23 09:31:29', '2026-03-23 09:31:29', 'admin'),
(170, '7', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/education-histories', 'admin/education-histories', '{}', '{}', '', '2026-03-23 09:31:33', '2026-03-23 09:31:33', 'admin'),
(171, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/education-histories', 'admin/education-histories', '{}', '{}', '', '2026-03-23 09:31:34', '2026-03-23 09:31:34', 'admin'),
(172, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/user-unions', 'admin/user-unions', '{}', '{}', '', '2026-03-23 09:31:38', '2026-03-23 09:31:38', 'admin'),
(173, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/user-unions/create', 'admin/user-unions/create', '{}', '{}', '', '2026-03-23 09:31:40', '2026-03-23 09:31:40', 'admin'),
(174, '7', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/user-unions', 'admin/user-unions', '{}', '{}', '', '2026-03-23 09:31:46', '2026-03-23 09:31:46', 'admin'),
(175, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/user-unions', 'admin/user-unions', '{}', '{}', '', '2026-03-23 09:31:47', '2026-03-23 09:31:47', 'admin'),
(176, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/user-documents', 'admin/user-documents', '{}', '{}', '', '2026-03-23 09:31:51', '2026-03-23 09:31:51', 'admin'),
(177, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/user-documents/create', 'admin/user-documents/create', '{}', '{}', '', '2026-03-23 09:31:53', '2026-03-23 09:31:53', 'admin'),
(178, '7', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/user-documents', 'admin/user-documents', '{}', '{}', '', '2026-03-23 09:32:02', '2026-03-23 09:32:02', 'admin'),
(179, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/user-documents', 'admin/user-documents', '{}', '{}', '', '2026-03-23 09:32:03', '2026-03-23 09:32:03', 'admin'),
(180, '7', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 09:32:05', '2026-03-23 09:32:05', 'admin'),
(181, '7', '127.0.0.1', 'Unknown', '7', 'update', NULL, 'User updated user with id 7', 'admin/users/7', '{\"id\":7,\"first_name\":\"Tanya\",\"last_name\":\"Merritt\",\"middle_name\":\"Marah Horne\",\"email\":\"teacher2@gmail.com\",\"email_verified_at\":null,\"role\":\"Teacher\",\"created_at\":\"2026-03-17T11:15:23.000000Z\",\"updated_at\":\"2026-03-23T12:28:00.000000Z\",\"phone_number\":\"254798985851\",\"id_number\":null}', '{\"id\":7,\"first_name\":\"Tanya\",\"last_name\":\"Merritt\",\"middle_name\":\"Marah\",\"email\":\"teacher2@gmail.com\",\"email_verified_at\":null,\"role\":\"Teacher\",\"created_at\":\"2026-03-17T11:15:23.000000Z\",\"updated_at\":\"2026-03-23T12:32:12.000000Z\",\"phone_number\":\"254798985851\",\"id_number\":null}', '', '2026-03-23 09:32:12', '2026-03-23 09:32:12', 'users'),
(182, '7', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/users/{user}', 'admin/users/7', '{}', '{}', '', '2026-03-23 09:32:12', '2026-03-23 09:32:12', 'admin'),
(183, '7', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 09:32:13', '2026-03-23 09:32:13', 'admin'),
(184, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 09:32:17', '2026-03-23 09:32:17', 'home'),
(185, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-23 09:32:20', '2026-03-23 09:32:20', 'admin'),
(186, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/education-histories', 'admin/education-histories', '{}', '{}', '', '2026-03-23 09:32:27', '2026-03-23 09:32:27', 'admin'),
(187, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-23 09:32:30', '2026-03-23 09:32:30', 'admin'),
(188, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-students/create', 'admin/ecde-students/create', '{}', '{}', '', '2026-03-23 09:32:34', '2026-03-23 09:32:34', 'admin'),
(189, '7', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-23 09:32:56', '2026-03-23 09:32:56', 'admin'),
(190, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-23 09:32:57', '2026-03-23 09:32:57', 'admin'),
(191, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-23 09:33:33', '2026-03-23 09:33:33', 'admin'),
(192, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-students/create', 'admin/ecde-students/create', '{}', '{}', '', '2026-03-23 09:33:39', '2026-03-23 09:33:39', 'admin'),
(193, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-students/create', 'admin/ecde-students/create', '{}', '{}', '', '2026-03-23 09:34:21', '2026-03-23 09:34:21', 'admin'),
(194, '7', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 09:35:15', '2026-03-23 09:35:15', 'admin'),
(195, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 09:35:17', '2026-03-23 09:35:17', 'home'),
(196, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 09:36:27', '2026-03-23 09:36:27', 'home'),
(197, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 09:37:31', '2026-03-23 09:37:31', 'home'),
(198, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 09:38:13', '2026-03-23 09:38:13', 'home'),
(199, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 09:38:56', '2026-03-23 09:38:56', 'home'),
(200, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 09:39:22', '2026-03-23 09:39:22', 'home'),
(201, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-23 11:03:20', '2026-03-23 11:03:20', 'admin'),
(202, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-23 11:03:32', '2026-03-23 11:03:32', 'admin'),
(203, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/beneficiaries', 'admin/beneficiaries', '{}', '{}', '', '2026-03-23 11:03:35', '2026-03-23 11:03:35', 'admin'),
(204, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 11:03:37', '2026-03-23 11:03:37', 'home'),
(205, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/education-histories', 'admin/education-histories', '{}', '{}', '', '2026-03-23 11:03:40', '2026-03-23 11:03:40', 'admin'),
(206, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-23 11:05:52', '2026-03-23 11:05:52', 'home'),
(207, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-23 11:05:56', '2026-03-23 11:05:56', 'admin'),
(208, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-23 11:06:06', '2026-03-23 11:06:06', 'login'),
(209, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-23 11:06:06', '2026-03-23 11:06:06', 'dashboard'),
(210, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 11:06:17', '2026-03-23 11:06:17', 'admin'),
(211, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:06:29', '2026-03-23 11:06:29', 'admin'),
(212, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:07:09', '2026-03-23 11:07:09', 'admin'),
(213, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-23 11:14:02', '2026-03-23 11:14:02', 'admin'),
(214, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:14:10', '2026-03-23 11:14:10', 'admin'),
(215, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:15:14', '2026-03-23 11:15:14', 'admin'),
(216, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:18:19', '2026-03-23 11:18:19', 'admin'),
(217, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:19:58', '2026-03-23 11:19:58', 'admin'),
(218, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:20:14', '2026-03-23 11:20:14', 'admin'),
(219, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:20:50', '2026-03-23 11:20:50', 'admin'),
(220, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:22:10', '2026-03-23 11:22:10', 'admin'),
(221, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:22:31', '2026-03-23 11:22:31', 'admin'),
(222, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:22:38', '2026-03-23 11:22:38', 'admin'),
(223, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:22:54', '2026-03-23 11:22:54', 'admin'),
(224, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:23:58', '2026-03-23 11:23:58', 'admin'),
(225, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:24:46', '2026-03-23 11:24:46', 'admin'),
(226, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:24:54', '2026-03-23 11:24:54', 'admin'),
(227, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:25:09', '2026-03-23 11:25:09', 'admin'),
(228, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:25:39', '2026-03-23 11:25:39', 'admin'),
(229, '7', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 11:26:07', '2026-03-23 11:26:07', 'admin'),
(230, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:26:31', '2026-03-23 11:26:31', 'admin'),
(231, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:26:40', '2026-03-23 11:26:40', 'admin'),
(232, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:27:24', '2026-03-23 11:27:24', 'admin'),
(233, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:27:48', '2026-03-23 11:27:48', 'admin'),
(234, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:27:55', '2026-03-23 11:27:55', 'admin'),
(235, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:30:02', '2026-03-23 11:30:02', 'admin'),
(236, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:30:15', '2026-03-23 11:30:15', 'admin'),
(237, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:31:07', '2026-03-23 11:31:07', 'admin'),
(238, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 11:31:09', '2026-03-23 11:31:09', 'admin'),
(239, '7', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 11:31:17', '2026-03-23 11:31:17', 'admin'),
(240, '7', '127.0.0.1', 'Unknown', '7', 'update', NULL, 'User updated user with id 7', 'admin/users/7', '{\"id\":7,\"first_name\":\"Tanya\",\"last_name\":\"Merritt\",\"middle_name\":\"Marah\",\"email\":\"teacher2@gmail.com\",\"email_verified_at\":null,\"role\":\"Teacher\",\"created_at\":\"2026-03-17T11:15:23.000000Z\",\"updated_at\":\"2026-03-23T12:32:12.000000Z\",\"phone_number\":\"254798985851\",\"id_number\":null}', '{\"id\":7,\"first_name\":\"Tanya\",\"last_name\":\"Merritt\",\"middle_name\":\"Marah\",\"email\":\"teacher2@gmail.com\",\"email_verified_at\":null,\"role\":\"Teacher\",\"created_at\":\"2026-03-17T11:15:23.000000Z\",\"updated_at\":\"2026-03-23T12:32:12.000000Z\",\"phone_number\":\"254798985851\",\"id_number\":null}', '', '2026-03-23 11:31:21', '2026-03-23 11:31:21', 'users'),
(241, '7', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/users/{user}', 'admin/users/7', '{}', '{}', '', '2026-03-23 11:31:21', '2026-03-23 11:31:21', 'admin'),
(242, '7', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 11:31:22', '2026-03-23 11:31:22', 'admin'),
(243, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:32:21', '2026-03-23 11:32:21', 'admin');
INSERT INTO `system_activity_logs` (`id`, `causer_id`, `ip_address`, `network`, `subject_id`, `action`, `event`, `description`, `asset_url`, `current_object`, `new_object`, `type`, `created_at`, `updated_at`, `model_table_name`) VALUES
(244, '7', '127.0.0.1', 'Unknown', '7', 'update', NULL, 'User updated user with id 7', 'admin/users/7', '{\"id\":7,\"first_name\":\"Tanya\",\"last_name\":\"Merritt\",\"middle_name\":\"Marah\",\"email\":\"teacher2@gmail.com\",\"email_verified_at\":null,\"role\":\"Teacher\",\"created_at\":\"2026-03-17T11:15:23.000000Z\",\"updated_at\":\"2026-03-23T12:32:12.000000Z\",\"phone_number\":\"254798985851\",\"id_number\":null}', '{\"id\":7,\"first_name\":\"Tanya\",\"last_name\":\"Merritt\",\"middle_name\":\"Marah\",\"email\":\"teacher2@gmail.com\",\"email_verified_at\":null,\"role\":\"Teacher\",\"created_at\":\"2026-03-17T11:15:23.000000Z\",\"updated_at\":\"2026-03-23T14:32:35.000000Z\",\"phone_number\":\"254798985851\",\"id_number\":\"12508939\"}', '', '2026-03-23 11:32:35', '2026-03-23 11:32:35', 'users'),
(245, '7', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/users/{user}', 'admin/users/7', '{}', '{}', '', '2026-03-23 11:32:35', '2026-03-23 11:32:35', 'admin'),
(246, '7', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 11:32:35', '2026-03-23 11:32:35', 'admin'),
(247, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:32:38', '2026-03-23 11:32:38', 'admin'),
(248, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/5', '{}', '{}', '', '2026-03-23 11:32:52', '2026-03-23 11:32:52', 'admin'),
(249, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 11:32:56', '2026-03-23 11:32:56', 'admin'),
(250, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 11:33:07', '2026-03-23 11:33:07', 'admin'),
(251, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 11:33:12', '2026-03-23 11:33:12', 'admin'),
(252, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 11:33:22', '2026-03-23 11:33:22', 'admin'),
(253, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 11:33:36', '2026-03-23 11:33:36', 'admin'),
(254, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/6', '{}', '{}', '', '2026-03-23 11:33:41', '2026-03-23 11:33:41', 'admin'),
(255, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/4', '{}', '{}', '', '2026-03-23 11:33:53', '2026-03-23 11:33:53', 'admin'),
(256, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-23 11:33:57', '2026-03-23 11:33:57', 'admin'),
(257, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/4', '{}', '{}', '', '2026-03-23 11:34:05', '2026-03-23 11:34:05', 'admin'),
(258, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/3', '{}', '{}', '', '2026-03-23 11:34:09', '2026-03-23 11:34:09', 'admin'),
(259, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:34:15', '2026-03-23 11:34:15', 'admin'),
(260, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:35:47', '2026-03-23 11:35:47', 'admin'),
(261, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:36:00', '2026-03-23 11:36:00', 'admin'),
(262, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-23 11:43:47', '2026-03-23 11:43:47', 'admin'),
(263, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-23 11:47:23', '2026-03-23 11:47:23', 'admin'),
(264, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/6', '{}', '{}', '', '2026-03-23 11:47:25', '2026-03-23 11:47:25', 'admin'),
(265, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-23 11:47:48', '2026-03-23 11:47:48', 'admin'),
(266, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-24 05:51:44', '2026-03-24 05:51:44', 'login'),
(267, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-24 05:51:48', '2026-03-24 05:51:48', 'dashboard'),
(268, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 05:51:54', '2026-03-24 05:51:54', 'admin'),
(269, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-24 05:52:02', '2026-03-24 05:52:02', 'users'),
(270, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/users', 'admin/users', '{}', '{}', '', '2026-03-24 05:52:03', '2026-03-24 05:52:03', 'admin'),
(271, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-24 05:52:18', '2026-03-24 05:52:18', 'login'),
(272, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-24 05:52:19', '2026-03-24 05:52:19', 'dashboard'),
(273, '7', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-24 05:52:32', '2026-03-24 05:52:32', 'login'),
(274, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-24 05:52:33', '2026-03-24 05:52:33', 'dashboard'),
(275, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-24 05:52:36', '2026-03-24 05:52:36', 'admin'),
(276, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/beneficiaries', 'admin/beneficiaries', '{}', '{}', '', '2026-03-24 05:52:41', '2026-03-24 05:52:41', 'admin'),
(277, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/education-histories', 'admin/education-histories', '{}', '{}', '', '2026-03-24 05:52:45', '2026-03-24 05:52:45', 'admin'),
(278, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-24 09:35:43', '2026-03-24 09:35:43', 'login'),
(279, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-24 09:35:46', '2026-03-24 09:35:46', 'dashboard'),
(280, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/feeder-schools', 'admin/feeder-schools', '{}', '{}', '', '2026-03-24 09:36:14', '2026-03-24 09:36:14', 'admin'),
(281, '1', '127.0.0.1', 'Unknown', '0', 'myAccount', NULL, 'User accessed admin/my-account', 'admin/my-account', '{}', '{}', '', '2026-03-24 09:36:28', '2026-03-24 09:36:28', 'admin'),
(282, '1', '127.0.0.1', 'Unknown', '0', 'showLoginForm', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-24 09:36:51', '2026-03-24 09:36:51', 'login'),
(283, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-24 09:36:59', '2026-03-24 09:36:59', 'login'),
(284, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-24 09:37:00', '2026-03-24 09:37:00', 'dashboard'),
(285, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-24 09:37:18', '2026-03-24 09:37:18', 'generated::WaxK0W7HtlUBRmXH'),
(286, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/cms/pages', 'admin/cms/pages', '{}', '{}', '', '2026-03-24 09:39:28', '2026-03-24 09:39:28', 'admin'),
(287, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/cms/pages', 'admin/cms/pages', '{}', '{}', '', '2026-03-24 09:40:04', '2026-03-24 09:40:04', 'admin'),
(288, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/roles', 'admin/roles', '{}', '{}', '', '2026-03-24 09:40:59', '2026-03-24 09:40:59', 'admin'),
(289, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/roles/{role}/edit', 'admin/roles/1/edit', '{}', '{}', '', '2026-03-24 09:41:02', '2026-03-24 09:41:02', 'admin'),
(290, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/roles/{role}/edit', 'admin/roles/1/edit', '{}', '{}', '', '2026-03-24 09:42:16', '2026-03-24 09:42:16', 'admin'),
(291, '1', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/roles/{role}', 'admin/roles/1', '{}', '{}', '', '2026-03-24 09:43:43', '2026-03-24 09:43:43', 'admin'),
(292, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/roles', 'admin/roles', '{}', '{}', '', '2026-03-24 09:43:44', '2026-03-24 09:43:44', 'admin'),
(293, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/cms/pages', 'admin/cms/pages', '{}', '{}', '', '2026-03-24 09:43:57', '2026-03-24 09:43:57', 'admin'),
(294, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/cms/settings', 'admin/cms/settings', '{}', '{}', '', '2026-03-24 09:44:03', '2026-03-24 09:44:03', 'admin'),
(295, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-24 09:44:09', '2026-03-24 09:44:09', 'admin'),
(296, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-24 09:44:14', '2026-03-24 09:44:14', 'admin'),
(297, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/next-of-kins/create', 'admin/next-of-kins/create', '{}', '{}', '', '2026-03-24 09:44:17', '2026-03-24 09:44:17', 'admin'),
(298, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/next-of-kins/create', 'admin/next-of-kins/create', '{}', '{}', '', '2026-03-24 09:45:07', '2026-03-24 09:45:07', 'admin'),
(299, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/next-of-kins/create', 'admin/next-of-kins/create', '{}', '{}', '', '2026-03-24 09:46:34', '2026-03-24 09:46:34', 'admin'),
(300, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/next-of-kins/create', 'admin/next-of-kins/create', '{}', '{}', '', '2026-03-24 09:46:45', '2026-03-24 09:46:45', 'admin'),
(301, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/cms/settings', 'admin/cms/settings', '{}', '{}', '', '2026-03-24 09:46:48', '2026-03-24 09:46:48', 'admin'),
(302, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/cms/settings', 'admin/cms/settings', '{}', '{}', '', '2026-03-24 09:47:06', '2026-03-24 09:47:06', 'admin'),
(303, '1', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/cms/settings', 'admin/cms/settings', '{}', '{}', '', '2026-03-24 09:51:25', '2026-03-24 09:51:25', 'admin'),
(304, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/cms/settings', 'admin/cms/settings', '{}', '{}', '', '2026-03-24 09:51:26', '2026-03-24 09:51:26', 'admin'),
(305, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-24 09:51:33', '2026-03-24 09:51:33', 'generated::NuV7E6kxIsi05ujC'),
(306, '1', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/cms/settings', 'admin/cms/settings', '{}', '{}', '', '2026-03-24 09:53:49', '2026-03-24 09:53:49', 'admin'),
(307, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/cms/settings', 'admin/cms/settings', '{}', '{}', '', '2026-03-24 09:53:49', '2026-03-24 09:53:49', 'admin'),
(308, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-24 09:53:55', '2026-03-24 09:53:55', 'generated::NuV7E6kxIsi05ujC'),
(309, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-24 10:06:29', '2026-03-24 10:06:29', 'home'),
(310, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/coordinators', 'admin/coordinators', '{}', '{}', '', '2026-03-24 10:06:45', '2026-03-24 10:06:45', 'admin'),
(311, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/coordinators/create', 'admin/coordinators/create', '{}', '{}', '', '2026-03-24 10:06:50', '2026-03-24 10:06:50', 'admin'),
(312, '7', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-24 10:07:15', '2026-03-24 10:07:15', 'login'),
(313, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-24 10:07:16', '2026-03-24 10:07:16', 'dashboard'),
(314, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-24 10:07:24', '2026-03-24 10:07:24', 'admin'),
(315, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-24 10:07:41', '2026-03-24 10:07:41', 'admin'),
(316, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-24 10:07:47', '2026-03-24 10:07:47', 'admin'),
(317, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-24 10:08:34', '2026-03-24 10:08:34', 'admin'),
(318, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-24 10:08:35', '2026-03-24 10:08:35', 'admin'),
(319, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/ecde-schools/{ecde_school}/edit', 'admin/ecde-schools/5/edit', '{}', '{}', '', '2026-03-24 10:08:41', '2026-03-24 10:08:41', 'admin'),
(320, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/coordinators', 'admin/coordinators', '{}', '{}', '', '2026-03-24 10:08:49', '2026-03-24 10:08:49', 'admin'),
(321, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/coordinators/create', 'admin/coordinators/create', '{}', '{}', '', '2026-03-24 10:08:52', '2026-03-24 10:08:52', 'admin'),
(322, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/coordinators', 'admin/coordinators', '{}', '{}', '', '2026-03-24 10:09:46', '2026-03-24 10:09:46', 'admin'),
(323, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/coordinators', 'admin/coordinators', '{}', '{}', '', '2026-03-24 10:09:47', '2026-03-24 10:09:47', 'admin'),
(324, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-24 10:09:59', '2026-03-24 10:09:59', 'admin'),
(325, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/ecde-students/{ecde_student}/edit', 'admin/ecde-students/1/edit', '{}', '{}', '', '2026-03-24 10:10:10', '2026-03-24 10:10:10', 'admin'),
(326, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-students/create', 'admin/ecde-students/create', '{}', '{}', '', '2026-03-24 10:10:25', '2026-03-24 10:10:25', 'admin'),
(327, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-24 10:11:25', '2026-03-24 10:11:25', 'admin'),
(328, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-24 10:11:25', '2026-03-24 10:11:25', 'admin'),
(329, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/sub-counties', 'admin/sub-counties', '{}', '{}', '', '2026-03-24 10:11:30', '2026-03-24 10:11:30', 'admin'),
(330, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/sub-locations', 'admin/sub-locations', '{}', '{}', '', '2026-03-24 10:11:34', '2026-03-24 10:11:34', 'admin'),
(331, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/sub-locations/{sub_location}/edit', 'admin/sub-locations/1/edit', '{}', '{}', '', '2026-03-24 10:11:37', '2026-03-24 10:11:37', 'admin'),
(332, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/sub-locations/create', 'admin/sub-locations/create', '{}', '{}', '', '2026-03-24 10:11:45', '2026-03-24 10:11:45', 'admin'),
(333, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/sub-locations', 'admin/sub-locations', '{}', '{}', '', '2026-03-24 10:11:58', '2026-03-24 10:11:58', 'admin'),
(334, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/sub-locations', 'admin/sub-locations', '{}', '{}', '', '2026-03-24 10:11:59', '2026-03-24 10:11:59', 'admin'),
(335, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/sub-locations/create', 'admin/sub-locations/create', '{}', '{}', '', '2026-03-24 10:12:16', '2026-03-24 10:12:16', 'admin'),
(336, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/sub-locations', 'admin/sub-locations', '{}', '{}', '', '2026-03-24 10:12:29', '2026-03-24 10:12:29', 'admin'),
(337, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/sub-locations', 'admin/sub-locations', '{}', '{}', '', '2026-03-24 10:12:29', '2026-03-24 10:12:29', 'admin'),
(338, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/sub-locations/create', 'admin/sub-locations/create', '{}', '{}', '', '2026-03-24 10:12:35', '2026-03-24 10:12:35', 'admin'),
(339, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-24 10:12:40', '2026-03-24 10:12:40', 'admin'),
(340, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:12:55', '2026-03-24 10:12:55', 'admin'),
(341, '1', '127.0.0.1', 'Unknown', '0', 'generateStaffReturns', NULL, 'User accessed admin/generate_staff_returns', 'admin/generate_staff_returns', '{}', '{}', '', '2026-03-24 10:13:04', '2026-03-24 10:13:04', 'admin'),
(342, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/unions', 'admin/unions', '{}', '{}', '', '2026-03-24 10:13:56', '2026-03-24 10:13:56', 'admin'),
(343, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/documents', 'admin/documents', '{}', '{}', '', '2026-03-24 10:14:01', '2026-03-24 10:14:01', 'admin'),
(344, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-24 10:14:05', '2026-03-24 10:14:05', 'admin'),
(345, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/unions/{union}/edit', 'admin/unions/2/edit', '{}', '{}', '', '2026-03-24 10:14:09', '2026-03-24 10:14:09', 'admin'),
(346, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-24 10:15:33', '2026-03-24 10:15:33', 'admin'),
(347, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/sub-locations', 'admin/sub-locations', '{}', '{}', '', '2026-03-24 10:15:37', '2026-03-24 10:15:37', 'admin'),
(348, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/sub-locations', 'admin/sub-locations', '{}', '{}', '', '2026-03-24 10:16:09', '2026-03-24 10:16:09', 'admin'),
(349, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/sub-locations', 'admin/sub-locations', '{}', '{}', '', '2026-03-24 10:16:54', '2026-03-24 10:16:54', 'admin'),
(350, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-24 10:17:03', '2026-03-24 10:17:03', 'admin'),
(351, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/job-groups/create', 'admin/job-groups/create', '{}', '{}', '', '2026-03-24 10:17:13', '2026-03-24 10:17:13', 'admin'),
(352, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-24 10:17:30', '2026-03-24 10:17:30', 'admin'),
(353, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-24 10:17:30', '2026-03-24 10:17:30', 'admin'),
(354, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/job-groups/create', 'admin/job-groups/create', '{}', '{}', '', '2026-03-24 10:17:34', '2026-03-24 10:17:34', 'admin'),
(355, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-24 10:17:40', '2026-03-24 10:17:40', 'admin'),
(356, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-24 10:17:41', '2026-03-24 10:17:41', 'admin'),
(357, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ethnic-groups', 'admin/ethnic-groups', '{}', '{}', '', '2026-03-24 10:17:53', '2026-03-24 10:17:53', 'admin'),
(358, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/counties', 'admin/counties', '{}', '{}', '', '2026-03-24 10:17:58', '2026-03-24 10:17:58', 'admin'),
(359, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/sub-locations', 'admin/sub-locations', '{}', '{}', '', '2026-03-24 10:18:01', '2026-03-24 10:18:01', 'admin'),
(360, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-24 10:18:06', '2026-03-24 10:18:06', 'admin'),
(361, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-24 10:18:34', '2026-03-24 10:18:34', 'admin'),
(362, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-24 10:18:54', '2026-03-24 10:18:54', 'admin'),
(363, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:18:59', '2026-03-24 10:18:59', 'admin'),
(364, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:19:32', '2026-03-24 10:19:32', 'admin'),
(365, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:19:49', '2026-03-24 10:19:49', 'admin'),
(366, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:20:01', '2026-03-24 10:20:01', 'admin'),
(367, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:20:32', '2026-03-24 10:20:32', 'admin'),
(368, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:20:50', '2026-03-24 10:20:50', 'admin'),
(369, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:21:00', '2026-03-24 10:21:00', 'admin'),
(370, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-24 10:21:06', '2026-03-24 10:21:06', 'admin'),
(371, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/documents', 'admin/documents', '{}', '{}', '', '2026-03-24 10:21:19', '2026-03-24 10:21:19', 'admin'),
(372, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ethnic-groups', 'admin/ethnic-groups', '{}', '{}', '', '2026-03-24 10:21:25', '2026-03-24 10:21:25', 'admin'),
(373, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/job-groups', 'admin/job-groups', '{}', '{}', '', '2026-03-24 10:21:28', '2026-03-24 10:21:28', 'admin'),
(374, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-24 10:21:31', '2026-03-24 10:21:31', 'users'),
(375, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/users', 'admin/users', '{}', '{}', '', '2026-03-24 10:21:32', '2026-03-24 10:21:32', 'admin'),
(376, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-24 10:21:38', '2026-03-24 10:21:38', 'admin'),
(377, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-24 10:22:49', '2026-03-24 10:22:49', 'admin'),
(378, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-24 10:31:08', '2026-03-24 10:31:08', 'dashboard'),
(379, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/coordinators', 'admin/coordinators', '{}', '{}', '', '2026-03-24 10:31:12', '2026-03-24 10:31:12', 'admin'),
(380, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/coordinators', 'admin/coordinators', '{}', '{}', '', '2026-03-24 10:33:01', '2026-03-24 10:33:01', 'admin'),
(381, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:33:09', '2026-03-24 10:33:09', 'admin'),
(382, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-24 10:33:45', '2026-03-24 10:33:45', 'admin'),
(383, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:35:55', '2026-03-24 10:35:55', 'admin'),
(384, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-24 10:35:58', '2026-03-24 10:35:58', 'admin'),
(385, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:36:45', '2026-03-24 10:36:45', 'admin'),
(386, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-24 10:36:51', '2026-03-24 10:36:51', 'admin'),
(387, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:37:52', '2026-03-24 10:37:52', 'admin'),
(388, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:37:52', '2026-03-24 10:37:52', 'admin'),
(389, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/7', '{}', '{}', '', '2026-03-24 10:37:58', '2026-03-24 10:37:58', 'admin'),
(390, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/7', '{}', '{}', '', '2026-03-24 10:39:00', '2026-03-24 10:39:00', 'admin'),
(391, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/7', '{}', '{}', '', '2026-03-24 10:39:37', '2026-03-24 10:39:37', 'admin'),
(392, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/7', '{}', '{}', '', '2026-03-24 10:41:54', '2026-03-24 10:41:54', 'admin'),
(393, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/7', '{}', '{}', '', '2026-03-24 10:43:27', '2026-03-24 10:43:27', 'admin'),
(394, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/7', '{}', '{}', '', '2026-03-24 10:44:17', '2026-03-24 10:44:17', 'admin'),
(395, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/7', '{}', '{}', '', '2026-03-24 10:44:41', '2026-03-24 10:44:41', 'admin'),
(396, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/7', '{}', '{}', '', '2026-03-24 10:44:45', '2026-03-24 10:44:45', 'admin'),
(397, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-24 10:46:08', '2026-03-24 10:46:08', 'admin'),
(398, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-24 10:46:51', '2026-03-24 10:46:51', 'admin'),
(399, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:47:00', '2026-03-24 10:47:00', 'admin'),
(400, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:47:00', '2026-03-24 10:47:00', 'admin'),
(401, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/8', '{}', '{}', '', '2026-03-24 10:47:03', '2026-03-24 10:47:03', 'admin'),
(402, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/8', '{}', '{}', '', '2026-03-24 10:47:31', '2026-03-24 10:47:31', 'admin'),
(403, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/8', '{}', '{}', '', '2026-03-24 10:47:58', '2026-03-24 10:47:58', 'admin'),
(404, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/8', '{}', '{}', '', '2026-03-24 10:48:14', '2026-03-24 10:48:14', 'admin'),
(405, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-24 10:48:33', '2026-03-24 10:48:33', 'admin'),
(406, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:49:01', '2026-03-24 10:49:01', 'admin'),
(407, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:49:02', '2026-03-24 10:49:02', 'admin'),
(408, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:49:25', '2026-03-24 10:49:25', 'admin'),
(409, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:49:26', '2026-03-24 10:49:26', 'admin'),
(410, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/10', '{}', '{}', '', '2026-03-24 10:49:28', '2026-03-24 10:49:28', 'admin'),
(411, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/10', '{}', '{}', '', '2026-03-24 10:50:37', '2026-03-24 10:50:37', 'admin'),
(412, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/10', '{}', '{}', '', '2026-03-24 10:50:51', '2026-03-24 10:50:51', 'admin'),
(413, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-24 10:50:57', '2026-03-24 10:50:57', 'admin'),
(414, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-24 10:51:41', '2026-03-24 10:51:41', 'admin'),
(415, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:51:57', '2026-03-24 10:51:57', 'admin'),
(416, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:51:58', '2026-03-24 10:51:58', 'admin'),
(417, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/11', '{}', '{}', '', '2026-03-24 10:52:02', '2026-03-24 10:52:02', 'admin'),
(418, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-24 10:53:15', '2026-03-24 10:53:15', 'generated::NuV7E6kxIsi05ujC'),
(419, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-24 10:55:00', '2026-03-24 10:55:00', 'home'),
(420, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 10:55:12', '2026-03-24 10:55:12', 'admin'),
(421, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-24 10:55:23', '2026-03-24 10:55:23', 'admin'),
(422, '7', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-24 10:56:42', '2026-03-24 10:56:42', 'login'),
(423, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-24 10:56:42', '2026-03-24 10:56:42', 'dashboard'),
(424, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-24 10:57:17', '2026-03-24 10:57:17', 'admin'),
(425, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-students/create', 'admin/ecde-students/create', '{}', '{}', '', '2026-03-24 10:57:26', '2026-03-24 10:57:26', 'admin'),
(426, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-24 10:57:54', '2026-03-24 10:57:54', 'admin'),
(427, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/user-unions', 'admin/user-unions', '{}', '{}', '', '2026-03-24 10:58:01', '2026-03-24 10:58:01', 'admin'),
(428, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-24 10:58:38', '2026-03-24 10:58:38', 'admin'),
(429, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-24 10:58:40', '2026-03-24 10:58:40', 'admin'),
(430, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-24 11:57:03', '2026-03-24 11:57:03', 'generated::NuV7E6kxIsi05ujC'),
(431, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-24 12:21:55', '2026-03-24 12:21:55', 'generated::NuV7E6kxIsi05ujC'),
(432, '1', '127.0.0.1', 'Unknown', '0', 'faqs', NULL, 'User accessed faqs', 'faqs', '{}', '{}', '', '2026-03-24 12:25:52', '2026-03-24 12:25:52', 'cms'),
(433, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-24 12:26:24', '2026-03-24 12:26:24', 'home'),
(434, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/counties', 'admin/counties', '{}', '{}', '', '2026-03-24 12:27:33', '2026-03-24 12:27:33', 'admin'),
(435, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/sub-locations', 'admin/sub-locations', '{}', '{}', '', '2026-03-24 12:27:41', '2026-03-24 12:27:41', 'admin'),
(436, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/feeder-schools', 'admin/feeder-schools', '{}', '{}', '', '2026-03-24 12:29:00', '2026-03-24 12:29:00', 'admin'),
(437, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/feeder-schools/create', 'admin/feeder-schools/create', '{}', '{}', '', '2026-03-24 12:29:03', '2026-03-24 12:29:03', 'admin'),
(438, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/feeder-schools', 'admin/feeder-schools', '{}', '{}', '', '2026-03-24 12:32:33', '2026-03-24 12:32:33', 'admin'),
(439, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/feeder-schools', 'admin/feeder-schools', '{}', '{}', '', '2026-03-24 12:32:33', '2026-03-24 12:32:33', 'admin'),
(440, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-24 12:32:40', '2026-03-24 12:32:40', 'home'),
(441, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-24 12:32:55', '2026-03-24 12:32:55', 'admin'),
(442, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 12:32:59', '2026-03-24 12:32:59', 'admin'),
(443, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-24 12:33:35', '2026-03-24 12:33:35', 'admin'),
(444, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-24 12:34:05', '2026-03-24 12:34:05', 'admin'),
(445, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-24 12:35:32', '2026-03-24 12:35:32', 'admin'),
(446, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-students/create', 'admin/ecde-students/create', '{}', '{}', '', '2026-03-24 12:35:39', '2026-03-24 12:35:39', 'admin'),
(447, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 12:35:46', '2026-03-24 12:35:46', 'admin'),
(448, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 12:36:31', '2026-03-24 12:36:31', 'admin'),
(449, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-24 12:36:35', '2026-03-24 12:36:35', 'admin'),
(450, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-24 12:39:27', '2026-03-24 12:39:27', 'admin'),
(451, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-students/create', 'admin/ecde-students/create', '{}', '{}', '', '2026-03-24 12:39:29', '2026-03-24 12:39:29', 'admin'),
(452, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-24 12:40:58', '2026-03-24 12:40:58', 'admin'),
(453, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 12:41:03', '2026-03-24 12:41:03', 'admin'),
(454, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-24 12:43:13', '2026-03-24 12:43:13', 'admin'),
(455, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-students/create', 'admin/ecde-students/create', '{}', '{}', '', '2026-03-24 12:44:10', '2026-03-24 12:44:10', 'admin'),
(456, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/coordinators', 'admin/coordinators', '{}', '{}', '', '2026-03-24 12:48:33', '2026-03-24 12:48:33', 'admin'),
(457, '1', '127.0.0.1', 'Unknown', '0', 'sms_logs', NULL, 'User accessed admin/sms-logs', 'admin/sms-logs', '{}', '{}', '', '2026-03-24 12:49:04', '2026-03-24 12:49:04', 'admin'),
(458, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/user-unions', 'admin/user-unions', '{}', '{}', '', '2026-03-24 12:49:36', '2026-03-24 12:49:36', 'admin'),
(459, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-24 12:49:41', '2026-03-24 12:49:41', 'admin'),
(460, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-24 12:50:07', '2026-03-24 12:50:07', 'admin'),
(461, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/11', '{}', '{}', '', '2026-03-24 12:50:09', '2026-03-24 12:50:09', 'admin'),
(462, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-24 12:50:19', '2026-03-24 12:50:19', 'admin'),
(463, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-24 12:50:50', '2026-03-24 12:50:50', 'users'),
(464, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/users', 'admin/users', '{}', '{}', '', '2026-03-24 12:50:50', '2026-03-24 12:50:50', 'admin'),
(465, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/roles', 'admin/roles', '{}', '{}', '', '2026-03-24 12:50:53', '2026-03-24 12:50:53', 'admin'),
(466, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-26 04:03:30', '2026-03-26 04:03:30', 'login'),
(467, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 04:03:28', '2026-03-26 04:03:28', 'dashboard'),
(468, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 04:03:48', '2026-03-26 04:03:48', 'admin'),
(469, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 04:04:01', '2026-03-26 04:04:01', 'admin'),
(470, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 04:04:50', '2026-03-26 04:04:50', 'admin'),
(471, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 04:05:02', '2026-03-26 04:05:02', 'admin'),
(472, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 04:05:41', '2026-03-26 04:05:41', 'admin'),
(473, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 04:05:48', '2026-03-26 04:05:48', 'admin'),
(474, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-26 04:05:50', '2026-03-26 04:05:50', 'admin'),
(475, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-26 04:06:10', '2026-03-26 04:06:10', 'admin'),
(476, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 04:06:13', '2026-03-26 04:06:13', 'admin'),
(477, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 04:06:26', '2026-03-26 04:06:26', 'admin'),
(478, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/11/edit', '{}', '{}', '', '2026-03-26 04:06:31', '2026-03-26 04:06:31', 'admin'),
(479, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/11/edit', '{}', '{}', '', '2026-03-26 04:07:07', '2026-03-26 04:07:07', 'admin'),
(480, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/11/edit', '{}', '{}', '', '2026-03-26 04:07:41', '2026-03-26 04:07:41', 'admin'),
(481, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/11/edit', '{}', '{}', '', '2026-03-26 04:08:09', '2026-03-26 04:08:09', 'admin'),
(482, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/11/edit', '{}', '{}', '', '2026-03-26 04:08:17', '2026-03-26 04:08:17', 'admin'),
(483, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-26 04:08:47', '2026-03-26 04:08:47', 'admin'),
(484, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-26 04:09:02', '2026-03-26 04:09:02', 'admin'),
(485, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-26 04:09:32', '2026-03-26 04:09:32', 'admin'),
(486, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 04:10:06', '2026-03-26 04:10:06', 'admin'),
(487, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 04:10:06', '2026-03-26 04:10:06', 'admin'),
(488, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/11/edit', '{}', '{}', '', '2026-03-26 04:10:30', '2026-03-26 04:10:30', 'admin'),
(489, '1', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/11', '{}', '{}', '', '2026-03-26 04:10:36', '2026-03-26 04:10:36', 'admin'),
(490, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 04:10:36', '2026-03-26 04:10:36', 'admin'),
(491, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:16:09', '2026-03-26 04:16:09', 'home'),
(492, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:16:52', '2026-03-26 04:16:52', 'home'),
(493, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:17:06', '2026-03-26 04:17:06', 'home'),
(494, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:17:10', '2026-03-26 04:17:10', 'home'),
(495, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:17:28', '2026-03-26 04:17:28', 'home'),
(496, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:17:45', '2026-03-26 04:17:45', 'home'),
(497, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:17:51', '2026-03-26 04:17:51', 'home'),
(498, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:17:59', '2026-03-26 04:17:59', 'home'),
(499, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 04:19:41', '2026-03-26 04:19:41', 'admin'),
(500, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/12/edit', '{}', '{}', '', '2026-03-26 04:19:43', '2026-03-26 04:19:43', 'admin'),
(501, '1', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/12', '{}', '{}', '', '2026-03-26 04:19:47', '2026-03-26 04:19:47', 'admin'),
(502, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 04:19:47', '2026-03-26 04:19:47', 'admin'),
(503, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/12/edit', '{}', '{}', '', '2026-03-26 04:19:52', '2026-03-26 04:19:52', 'admin'),
(504, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:19:56', '2026-03-26 04:19:56', 'home'),
(505, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-26 04:20:02', '2026-03-26 04:20:02', 'admin'),
(506, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/next-of-kins/create', 'admin/next-of-kins/create', '{}', '{}', '', '2026-03-26 04:20:04', '2026-03-26 04:20:04', 'admin'),
(507, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-26 04:20:07', '2026-03-26 04:20:07', 'admin'),
(508, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-26 04:20:08', '2026-03-26 04:20:08', 'admin'),
(509, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/next-of-kins/create', 'admin/next-of-kins/create', '{}', '{}', '', '2026-03-26 04:20:44', '2026-03-26 04:20:44', 'admin'),
(510, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-26 04:20:47', '2026-03-26 04:20:47', 'admin'),
(511, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-26 04:20:47', '2026-03-26 04:20:47', 'admin'),
(512, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/next-of-kins/create', 'admin/next-of-kins/create', '{}', '{}', '', '2026-03-26 04:49:14', '2026-03-26 04:49:14', 'admin'),
(513, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-26 04:49:18', '2026-03-26 04:49:18', 'admin'),
(514, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/feeder-schools', 'admin/feeder-schools', '{}', '{}', '', '2026-03-26 04:49:19', '2026-03-26 04:49:19', 'admin');
INSERT INTO `system_activity_logs` (`id`, `causer_id`, `ip_address`, `network`, `subject_id`, `action`, `event`, `description`, `asset_url`, `current_object`, `new_object`, `type`, `created_at`, `updated_at`, `model_table_name`) VALUES
(515, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:53:14', '2026-03-26 04:53:14', 'home'),
(516, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:54:31', '2026-03-26 04:54:31', 'home'),
(517, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:54:52', '2026-03-26 04:54:52', 'home'),
(518, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:55:17', '2026-03-26 04:55:17', 'home'),
(519, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:55:24', '2026-03-26 04:55:24', 'home'),
(520, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:56:11', '2026-03-26 04:56:11', 'home'),
(521, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:57:19', '2026-03-26 04:57:19', 'home'),
(522, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:57:42', '2026-03-26 04:57:42', 'home'),
(523, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:58:26', '2026-03-26 04:58:26', 'home'),
(524, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:58:41', '2026-03-26 04:58:41', 'home'),
(525, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:58:55', '2026-03-26 04:58:55', 'home'),
(526, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:59:03', '2026-03-26 04:59:03', 'home'),
(527, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:59:38', '2026-03-26 04:59:38', 'home'),
(528, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 04:59:45', '2026-03-26 04:59:45', 'home'),
(529, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 05:00:17', '2026-03-26 05:00:17', 'home'),
(530, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 05:00:26', '2026-03-26 05:00:26', 'home'),
(531, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 05:00:47', '2026-03-26 05:00:47', 'home'),
(532, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 05:02:57', '2026-03-26 05:02:57', 'home'),
(533, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 05:04:20', '2026-03-26 05:04:20', 'home'),
(534, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 05:06:15', '2026-03-26 05:06:15', 'home'),
(535, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 05:06:40', '2026-03-26 05:06:40', 'home'),
(536, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 05:07:34', '2026-03-26 05:07:34', 'home'),
(537, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 05:07:49', '2026-03-26 05:07:49', 'home'),
(538, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 05:08:23', '2026-03-26 05:08:23', 'home'),
(539, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 05:08:30', '2026-03-26 05:08:30', 'home'),
(540, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 05:11:54', '2026-03-26 05:11:54', 'home'),
(541, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 05:13:50', '2026-03-26 05:13:50', 'home'),
(542, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 05:14:01', '2026-03-26 05:14:01', 'home'),
(543, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 06:23:41', '2026-03-26 06:23:41', 'home'),
(544, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 06:24:18', '2026-03-26 06:24:18', 'home'),
(545, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 06:26:14', '2026-03-26 06:26:14', 'dashboard'),
(546, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 06:26:30', '2026-03-26 06:26:30', 'dashboard'),
(547, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 06:26:58', '2026-03-26 06:26:58', 'dashboard'),
(548, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 06:27:03', '2026-03-26 06:27:03', 'dashboard'),
(549, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 06:27:07', '2026-03-26 06:27:07', 'dashboard'),
(550, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 06:27:16', '2026-03-26 06:27:16', 'dashboard'),
(551, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 06:28:03', '2026-03-26 06:28:03', 'dashboard'),
(552, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 06:28:15', '2026-03-26 06:28:15', 'dashboard'),
(553, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 06:29:04', '2026-03-26 06:29:04', 'dashboard'),
(554, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 06:29:19', '2026-03-26 06:29:19', 'dashboard'),
(555, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 06:43:48', '2026-03-26 06:43:48', 'dashboard'),
(556, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 06:43:54', '2026-03-26 06:43:54', 'admin'),
(557, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 06:44:07', '2026-03-26 06:44:07', 'admin'),
(558, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 06:44:17', '2026-03-26 06:44:17', 'admin'),
(559, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 06:44:22', '2026-03-26 06:44:22', 'admin'),
(560, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 06:45:04', '2026-03-26 06:45:04', 'admin'),
(561, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 06:45:42', '2026-03-26 06:45:42', 'admin'),
(562, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 06:46:22', '2026-03-26 06:46:22', 'admin'),
(563, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 06:46:23', '2026-03-26 06:46:23', 'admin'),
(564, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 06:46:53', '2026-03-26 06:46:53', 'admin'),
(565, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 06:47:23', '2026-03-26 06:47:23', 'admin'),
(566, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 06:47:23', '2026-03-26 06:47:23', 'admin'),
(567, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 06:47:57', '2026-03-26 06:47:57', 'admin'),
(568, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 06:48:01', '2026-03-26 06:48:01', 'admin'),
(569, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/2', '{}', '{}', '', '2026-03-26 06:48:03', '2026-03-26 06:48:03', 'admin'),
(570, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/2', '{}', '{}', '', '2026-03-26 06:48:14', '2026-03-26 06:48:14', 'admin'),
(571, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 08:02:54', '2026-03-26 08:02:54', 'home'),
(572, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed home', 'home', '{}', '{}', '', '2026-03-26 08:02:55', '2026-03-26 08:02:55', 'home'),
(573, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 08:03:24', '2026-03-26 08:03:24', 'admin'),
(574, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 08:03:25', '2026-03-26 08:03:25', 'dashboard'),
(575, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 08:04:33', '2026-03-26 08:04:33', 'dashboard'),
(576, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 08:05:23', '2026-03-26 08:05:23', 'dashboard'),
(577, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 08:05:32', '2026-03-26 08:05:32', 'dashboard'),
(578, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 08:06:46', '2026-03-26 08:06:46', 'admin'),
(579, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 08:07:32', '2026-03-26 08:07:32', 'admin'),
(580, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/10/edit', '{}', '{}', '', '2026-03-26 08:08:53', '2026-03-26 08:08:53', 'admin'),
(581, '1', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/10', '{}', '{}', '', '2026-03-26 08:08:58', '2026-03-26 08:08:58', 'admin'),
(582, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 08:08:59', '2026-03-26 08:08:59', 'admin'),
(583, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-students', 'admin/ecde-students', '{}', '{}', '', '2026-03-26 08:09:22', '2026-03-26 08:09:22', 'admin'),
(584, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 08:09:55', '2026-03-26 08:09:55', 'admin'),
(585, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 08:10:16', '2026-03-26 08:10:16', 'admin'),
(586, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 08:10:22', '2026-03-26 08:10:22', 'dashboard'),
(587, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 08:26:14', '2026-03-26 08:26:14', 'dashboard'),
(588, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 08:26:34', '2026-03-26 08:26:34', 'dashboard'),
(589, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 08:26:49', '2026-03-26 08:26:49', 'dashboard'),
(590, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 08:26:52', '2026-03-26 08:26:52', 'dashboard'),
(591, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 08:27:24', '2026-03-26 08:27:24', 'dashboard'),
(592, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 08:27:28', '2026-03-26 08:27:28', 'admin'),
(593, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-26 08:27:33', '2026-03-26 08:27:33', 'admin'),
(594, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 08:27:39', '2026-03-26 08:27:39', 'dashboard'),
(595, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 08:28:43', '2026-03-26 08:28:43', 'dashboard'),
(596, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 08:28:48', '2026-03-26 08:28:48', 'admin'),
(597, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 08:28:51', '2026-03-26 08:28:51', 'admin'),
(598, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-26 08:29:22', '2026-03-26 08:29:22', 'admin'),
(599, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-26 08:29:24', '2026-03-26 08:29:24', 'admin'),
(600, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-26 08:30:14', '2026-03-26 08:30:14', 'admin'),
(601, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-26 08:32:53', '2026-03-26 08:32:53', 'admin'),
(602, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-26 08:33:07', '2026-03-26 08:33:07', 'admin'),
(603, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-26 08:33:07', '2026-03-26 08:33:07', 'admin'),
(604, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-26 08:33:28', '2026-03-26 08:33:28', 'admin'),
(605, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/ecde-schools/{ecde_school}/edit', 'admin/ecde-schools/7/edit', '{}', '{}', '', '2026-03-26 08:33:32', '2026-03-26 08:33:32', 'admin'),
(606, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 08:33:47', '2026-03-26 08:33:47', 'admin'),
(607, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 08:33:51', '2026-03-26 08:33:51', 'admin'),
(608, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 08:49:37', '2026-03-26 08:49:37', 'admin'),
(609, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 08:49:51', '2026-03-26 08:49:51', 'admin'),
(610, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 08:50:10', '2026-03-26 08:50:10', 'admin'),
(611, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 08:50:33', '2026-03-26 08:50:33', 'admin'),
(612, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 08:50:49', '2026-03-26 08:50:49', 'admin'),
(613, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 08:52:05', '2026-03-26 08:52:05', 'admin'),
(614, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 08:52:30', '2026-03-26 08:52:30', 'admin'),
(615, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 08:57:54', '2026-03-26 08:57:54', 'admin'),
(616, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 08:58:24', '2026-03-26 08:58:24', 'admin'),
(617, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 08:58:39', '2026-03-26 08:58:39', 'admin'),
(618, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 09:49:51', '2026-03-26 09:49:51', 'admin'),
(619, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 09:50:10', '2026-03-26 09:50:10', 'admin'),
(620, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 09:54:46', '2026-03-26 09:54:46', 'admin'),
(621, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 09:55:58', '2026-03-26 09:55:58', 'admin'),
(622, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 09:56:26', '2026-03-26 09:56:26', 'admin'),
(623, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 09:58:13', '2026-03-26 09:58:13', 'admin'),
(624, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 10:09:17', '2026-03-26 10:09:17', 'admin'),
(625, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 10:09:32', '2026-03-26 10:09:32', 'admin'),
(626, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 10:09:56', '2026-03-26 10:09:56', 'admin'),
(627, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 10:11:25', '2026-03-26 10:11:25', 'admin'),
(628, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 10:13:02', '2026-03-26 10:13:02', 'admin'),
(629, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 10:13:17', '2026-03-26 10:13:17', 'admin'),
(630, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 10:14:33', '2026-03-26 10:14:33', 'admin'),
(631, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 10:14:33', '2026-03-26 10:14:33', 'admin'),
(632, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/3', '{}', '{}', '', '2026-03-26 10:14:38', '2026-03-26 10:14:38', 'admin'),
(633, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/3', '{}', '{}', '', '2026-03-26 10:15:29', '2026-03-26 10:15:29', 'admin'),
(634, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/3', '{}', '{}', '', '2026-03-26 10:15:31', '2026-03-26 10:15:31', 'admin'),
(635, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/3', '{}', '{}', '', '2026-03-26 10:17:33', '2026-03-26 10:17:33', 'admin'),
(636, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 10:17:45', '2026-03-26 10:17:45', 'admin'),
(637, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 10:17:58', '2026-03-26 10:17:58', 'admin'),
(638, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 10:17:58', '2026-03-26 10:17:58', 'admin'),
(639, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 10:18:02', '2026-03-26 10:18:02', 'admin'),
(640, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 10:18:36', '2026-03-26 10:18:36', 'admin'),
(641, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 10:18:37', '2026-03-26 10:18:37', 'admin'),
(642, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 10:19:46', '2026-03-26 10:19:46', 'admin'),
(643, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:21:50', '2026-03-26 10:21:50', 'admin'),
(644, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:22:02', '2026-03-26 10:22:02', 'admin'),
(645, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:22:20', '2026-03-26 10:22:20', 'admin'),
(646, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:22:51', '2026-03-26 10:22:51', 'admin'),
(647, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:23:44', '2026-03-26 10:23:44', 'admin'),
(648, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:24:05', '2026-03-26 10:24:05', 'admin'),
(649, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:24:21', '2026-03-26 10:24:21', 'admin'),
(650, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:25:34', '2026-03-26 10:25:34', 'admin'),
(651, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:25:54', '2026-03-26 10:25:54', 'admin'),
(652, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:26:57', '2026-03-26 10:26:57', 'admin'),
(653, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:27:50', '2026-03-26 10:27:50', 'admin'),
(654, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:28:39', '2026-03-26 10:28:39', 'admin'),
(655, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:28:54', '2026-03-26 10:28:54', 'admin'),
(656, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:29:17', '2026-03-26 10:29:17', 'admin'),
(657, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:30:35', '2026-03-26 10:30:35', 'admin'),
(658, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:31:14', '2026-03-26 10:31:14', 'admin'),
(659, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:31:55', '2026-03-26 10:31:55', 'admin'),
(660, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/5', '{}', '{}', '', '2026-03-26 10:32:17', '2026-03-26 10:32:17', 'admin'),
(661, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 10:32:37', '2026-03-26 10:32:37', 'admin'),
(662, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 10:32:41', '2026-03-26 10:32:41', 'admin'),
(663, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-26 10:32:42', '2026-03-26 10:32:42', 'admin'),
(664, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 10:32:53', '2026-03-26 10:32:53', 'admin'),
(665, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-26 10:32:53', '2026-03-26 10:32:53', 'admin'),
(666, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/6', '{}', '{}', '', '2026-03-26 10:32:56', '2026-03-26 10:32:56', 'admin'),
(667, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/6', '{}', '{}', '', '2026-03-26 10:33:24', '2026-03-26 10:33:24', 'admin'),
(668, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/6', '{}', '{}', '', '2026-03-26 10:33:34', '2026-03-26 10:33:34', 'admin'),
(669, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/6', '{}', '{}', '', '2026-03-26 10:37:02', '2026-03-26 10:37:02', 'admin'),
(670, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-26 13:56:18', '2026-03-26 13:56:18', 'login'),
(671, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 13:56:21', '2026-03-26 13:56:21', 'dashboard'),
(672, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 14:00:09', '2026-03-26 14:00:09', 'dashboard'),
(673, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 14:00:21', '2026-03-26 14:00:21', 'dashboard'),
(674, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 14:00:48', '2026-03-26 14:00:48', 'dashboard'),
(675, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 14:01:21', '2026-03-26 14:01:21', 'dashboard'),
(676, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 14:01:46', '2026-03-26 14:01:46', 'dashboard'),
(677, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 14:02:02', '2026-03-26 14:02:02', 'dashboard'),
(678, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 14:03:42', '2026-03-26 14:03:42', 'dashboard'),
(679, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 14:03:51', '2026-03-26 14:03:51', 'dashboard'),
(680, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 14:04:16', '2026-03-26 14:04:16', 'dashboard'),
(681, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 14:04:53', '2026-03-26 14:04:53', 'dashboard'),
(682, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 14:05:25', '2026-03-26 14:05:25', 'dashboard'),
(683, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 14:32:48', '2026-03-26 14:32:48', 'dashboard'),
(684, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 14:33:10', '2026-03-26 14:33:10', 'dashboard'),
(685, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 14:33:24', '2026-03-26 14:33:24', 'dashboard'),
(686, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-26 14:33:56', '2026-03-26 14:33:56', 'dashboard'),
(687, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:34:00', '2026-03-26 14:34:00', 'admin'),
(688, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:35:03', '2026-03-26 14:35:03', 'admin'),
(689, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:35:20', '2026-03-26 14:35:20', 'admin'),
(690, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:39:38', '2026-03-26 14:39:38', 'admin'),
(691, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:40:20', '2026-03-26 14:40:20', 'admin'),
(692, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:40:26', '2026-03-26 14:40:26', 'admin'),
(693, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:40:28', '2026-03-26 14:40:28', 'admin'),
(694, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:40:43', '2026-03-26 14:40:43', 'admin'),
(695, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:40:51', '2026-03-26 14:40:51', 'admin'),
(696, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:41:07', '2026-03-26 14:41:07', 'admin'),
(697, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:41:14', '2026-03-26 14:41:14', 'admin'),
(698, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:41:39', '2026-03-26 14:41:39', 'admin'),
(699, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:41:52', '2026-03-26 14:41:52', 'admin'),
(700, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:43:03', '2026-03-26 14:43:03', 'admin'),
(701, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:43:13', '2026-03-26 14:43:13', 'admin'),
(702, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:43:41', '2026-03-26 14:43:41', 'admin'),
(703, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:44:44', '2026-03-26 14:44:44', 'admin'),
(704, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:45:00', '2026-03-26 14:45:00', 'admin'),
(705, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:45:43', '2026-03-26 14:45:43', 'admin'),
(706, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:46:25', '2026-03-26 14:46:25', 'admin'),
(707, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:46:39', '2026-03-26 14:46:39', 'admin'),
(708, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:47:22', '2026-03-26 14:47:22', 'admin'),
(709, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:47:22', '2026-03-26 14:47:22', 'admin'),
(710, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:47:54', '2026-03-26 14:47:54', 'admin'),
(711, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:47:55', '2026-03-26 14:47:55', 'admin'),
(712, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:48:59', '2026-03-26 14:48:59', 'admin'),
(713, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:49:18', '2026-03-26 14:49:18', 'admin'),
(714, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:50:05', '2026-03-26 14:50:05', 'admin'),
(715, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:50:40', '2026-03-26 14:50:40', 'admin'),
(716, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:50:55', '2026-03-26 14:50:55', 'admin'),
(717, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:50:59', '2026-03-26 14:50:59', 'admin'),
(718, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:50:59', '2026-03-26 14:50:59', 'admin'),
(719, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:51:36', '2026-03-26 14:51:36', 'admin'),
(720, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:54:19', '2026-03-26 14:54:19', 'admin'),
(721, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:54:55', '2026-03-26 14:54:55', 'admin'),
(722, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:54:55', '2026-03-26 14:54:55', 'admin'),
(723, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:55:06', '2026-03-26 14:55:06', 'admin'),
(724, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:55:20', '2026-03-26 14:55:20', 'admin'),
(725, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:55:21', '2026-03-26 14:55:21', 'admin'),
(726, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:55:43', '2026-03-26 14:55:43', 'admin'),
(727, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:55:56', '2026-03-26 14:55:56', 'admin'),
(728, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:55:56', '2026-03-26 14:55:56', 'admin'),
(729, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:56:30', '2026-03-26 14:56:30', 'admin'),
(730, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:56:41', '2026-03-26 14:56:41', 'admin'),
(731, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:56:42', '2026-03-26 14:56:42', 'admin'),
(732, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:57:30', '2026-03-26 14:57:30', 'admin'),
(733, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:57:40', '2026-03-26 14:57:40', 'admin'),
(734, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:57:40', '2026-03-26 14:57:40', 'admin'),
(735, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:58:00', '2026-03-26 14:58:00', 'admin'),
(736, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:58:38', '2026-03-26 14:58:38', 'admin'),
(737, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-26 14:58:43', '2026-03-26 14:58:43', 'admin'),
(738, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:59:08', '2026-03-26 14:59:08', 'admin'),
(739, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-26 14:59:08', '2026-03-26 14:59:08', 'admin'),
(740, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-27 03:27:16', '2026-03-27 03:27:16', 'login'),
(741, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-27 03:27:18', '2026-03-27 03:27:18', 'admin'),
(742, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 03:27:30', '2026-03-27 03:27:30', 'admin'),
(743, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 03:27:41', '2026-03-27 03:27:41', 'admin'),
(744, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-27 03:27:49', '2026-03-27 03:27:49', 'admin'),
(745, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-27 03:29:13', '2026-03-27 03:29:13', 'admin'),
(746, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 03:31:31', '2026-03-27 03:31:31', 'admin'),
(747, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 03:31:31', '2026-03-27 03:31:31', 'admin'),
(748, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 03:31:57', '2026-03-27 03:31:57', 'admin'),
(749, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 03:32:10', '2026-03-27 03:32:10', 'admin'),
(750, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/7', '{}', '{}', '', '2026-03-27 03:32:15', '2026-03-27 03:32:15', 'admin'),
(751, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/7', '{}', '{}', '', '2026-03-27 03:33:22', '2026-03-27 03:33:22', 'admin'),
(752, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/7', '{}', '{}', '', '2026-03-27 03:34:21', '2026-03-27 03:34:21', 'admin'),
(753, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/7', '{}', '{}', '', '2026-03-27 03:35:22', '2026-03-27 03:35:22', 'admin'),
(754, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/7', '{}', '{}', '', '2026-03-27 03:35:49', '2026-03-27 03:35:49', 'admin'),
(755, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-27 03:36:03', '2026-03-27 03:36:03', 'admin'),
(756, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 03:36:32', '2026-03-27 03:36:32', 'admin'),
(757, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-27 03:36:33', '2026-03-27 03:36:33', 'admin'),
(758, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-27 03:38:30', '2026-03-27 03:38:30', 'admin'),
(759, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-27 03:39:12', '2026-03-27 03:39:12', 'admin'),
(760, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-27 03:39:36', '2026-03-27 03:39:36', 'admin'),
(761, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 03:40:08', '2026-03-27 03:40:08', 'admin'),
(762, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-27 03:40:09', '2026-03-27 03:40:09', 'admin'),
(763, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 03:40:35', '2026-03-27 03:40:35', 'admin'),
(764, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 03:42:36', '2026-03-27 03:42:36', 'admin'),
(765, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 03:42:37', '2026-03-27 03:42:37', 'admin'),
(766, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/8', '{}', '{}', '', '2026-03-27 03:42:42', '2026-03-27 03:42:42', 'admin'),
(767, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-27 03:43:21', '2026-03-27 03:43:21', 'admin'),
(768, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/12', '{}', '{}', '', '2026-03-27 03:43:24', '2026-03-27 03:43:24', 'admin'),
(769, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-27 03:44:35', '2026-03-27 03:44:35', 'dashboard'),
(770, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-27 03:46:31', '2026-03-27 03:46:31', 'admin'),
(771, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/12', '{}', '{}', '', '2026-03-27 03:46:34', '2026-03-27 03:46:34', 'admin'),
(772, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/12', '{}', '{}', '', '2026-03-27 03:47:34', '2026-03-27 03:47:34', 'admin'),
(773, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 03:47:45', '2026-03-27 03:47:45', 'admin'),
(774, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/8', '{}', '{}', '', '2026-03-27 03:47:48', '2026-03-27 03:47:48', 'admin'),
(775, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 04:07:14', '2026-03-27 04:07:14', 'admin'),
(776, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/ecde-schools/{ecde_school}/edit', 'admin/ecde-schools/7/edit', '{}', '{}', '', '2026-03-27 04:07:54', '2026-03-27 04:07:54', 'admin'),
(777, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 04:08:29', '2026-03-27 04:08:29', 'admin'),
(778, '7', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-27 04:42:13', '2026-03-27 04:42:13', 'login'),
(779, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-27 04:42:14', '2026-03-27 04:42:14', 'dashboard'),
(780, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-27 04:42:37', '2026-03-27 04:42:37', 'admin'),
(781, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-27 04:43:36', '2026-03-27 04:43:36', 'admin'),
(782, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-27 04:43:51', '2026-03-27 04:43:51', 'admin'),
(783, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-27 04:44:49', '2026-03-27 04:44:49', 'admin'),
(784, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-27 04:45:04', '2026-03-27 04:45:04', 'admin'),
(785, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-27 04:45:21', '2026-03-27 04:45:21', 'admin'),
(786, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-27 04:45:26', '2026-03-27 04:45:26', 'admin');
INSERT INTO `system_activity_logs` (`id`, `causer_id`, `ip_address`, `network`, `subject_id`, `action`, `event`, `description`, `asset_url`, `current_object`, `new_object`, `type`, `created_at`, `updated_at`, `model_table_name`) VALUES
(787, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-27 04:46:23', '2026-03-27 04:46:23', 'admin'),
(788, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-27 04:46:37', '2026-03-27 04:46:37', 'admin'),
(789, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-27 04:46:57', '2026-03-27 04:46:57', 'login'),
(790, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-27 04:46:58', '2026-03-27 04:46:58', 'dashboard'),
(791, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-27 04:47:11', '2026-03-27 04:47:11', 'admin'),
(792, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/1/edit', '{}', '{}', '', '2026-03-27 04:47:21', '2026-03-27 04:47:21', 'admin'),
(793, '1', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-27 04:47:40', '2026-03-27 04:47:40', 'admin'),
(794, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-27 04:47:40', '2026-03-27 04:47:40', 'admin'),
(795, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-27 04:47:51', '2026-03-27 04:47:51', 'dashboard'),
(796, '7', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-27 04:49:04', '2026-03-27 04:49:04', 'login'),
(797, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-27 04:49:05', '2026-03-27 04:49:05', 'dashboard'),
(798, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 04:49:12', '2026-03-27 04:49:12', 'admin'),
(799, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-27 04:49:17', '2026-03-27 04:49:17', 'admin'),
(800, '7', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-27 04:49:22', '2026-03-27 04:49:22', 'admin'),
(801, '7', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-27 04:49:40', '2026-03-27 04:49:40', 'admin'),
(802, '7', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-27 04:49:41', '2026-03-27 04:49:41', 'admin'),
(803, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-27 06:25:26', '2026-03-27 06:25:26', 'login'),
(804, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-27 06:25:27', '2026-03-27 06:25:27', 'dashboard'),
(805, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-27 06:30:43', '2026-03-27 06:30:43', 'admin'),
(806, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-27 06:31:35', '2026-03-27 06:31:35', 'dashboard'),
(807, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-27 06:31:53', '2026-03-27 06:31:53', 'dashboard'),
(808, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-27 06:32:00', '2026-03-27 06:32:00', 'admin'),
(809, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/12/edit', '{}', '{}', '', '2026-03-27 06:32:05', '2026-03-27 06:32:05', 'admin'),
(810, '1', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/12', '{}', '{}', '', '2026-03-27 06:33:35', '2026-03-27 06:33:35', 'admin'),
(811, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-27 06:33:35', '2026-03-27 06:33:35', 'admin'),
(812, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-27 06:33:42', '2026-03-27 06:33:42', 'dashboard'),
(813, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/12/edit', '{}', '{}', '', '2026-03-27 06:33:50', '2026-03-27 06:33:50', 'admin'),
(814, '1', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/12', '{}', '{}', '', '2026-03-27 06:34:16', '2026-03-27 06:34:16', 'admin'),
(815, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-27 06:34:16', '2026-03-27 06:34:16', 'admin'),
(816, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-27 06:34:22', '2026-03-27 06:34:22', 'dashboard'),
(817, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-27 06:39:20', '2026-03-27 06:39:20', 'dashboard'),
(818, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 06:41:16', '2026-03-27 06:41:16', 'admin'),
(819, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-27 06:41:21', '2026-03-27 06:41:21', 'admin'),
(820, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-27 06:42:00', '2026-03-27 06:42:00', 'admin'),
(821, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/8', '{}', '{}', '', '2026-03-27 06:43:08', '2026-03-27 06:43:08', 'admin'),
(822, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-27 06:44:04', '2026-03-27 06:44:04', 'admin'),
(823, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-27 06:44:10', '2026-03-27 06:44:10', 'admin'),
(824, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-27 06:44:14', '2026-03-27 06:44:14', 'admin'),
(825, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-27 06:46:02', '2026-03-27 06:46:02', 'admin'),
(826, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-27 06:46:03', '2026-03-27 06:46:03', 'admin'),
(827, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-27 06:47:05', '2026-03-27 06:47:05', 'admin'),
(828, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-27 06:47:59', '2026-03-27 06:47:59', 'admin'),
(829, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-27 06:48:08', '2026-03-27 06:48:08', 'admin'),
(830, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-27 06:49:30', '2026-03-27 06:49:30', 'admin'),
(831, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 06:50:48', '2026-03-27 06:50:48', 'admin'),
(832, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-27 06:50:55', '2026-03-27 06:50:55', 'admin'),
(833, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 06:52:16', '2026-03-27 06:52:16', 'admin'),
(834, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/8', '{}', '{}', '', '2026-03-27 06:52:23', '2026-03-27 06:52:23', 'admin'),
(835, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/counties', 'admin/counties', '{}', '{}', '', '2026-03-27 07:08:27', '2026-03-27 07:08:27', 'admin'),
(836, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/next-of-kins', 'admin/next-of-kins', '{}', '{}', '', '2026-03-27 07:08:30', '2026-03-27 07:08:30', 'admin'),
(837, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/coordinators', 'admin/coordinators', '{}', '{}', '', '2026-03-27 07:08:38', '2026-03-27 07:08:38', 'admin'),
(838, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/unions', 'admin/unions', '{}', '{}', '', '2026-03-27 07:08:41', '2026-03-27 07:08:41', 'admin'),
(839, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-27 07:08:45', '2026-03-27 07:08:45', 'users'),
(840, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/users', 'admin/users', '{}', '{}', '', '2026-03-27 07:08:45', '2026-03-27 07:08:45', 'admin'),
(841, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-27 07:10:59', '2026-03-27 07:10:59', 'generated::8GbzuXcXnfacRioB'),
(842, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-27 07:11:07', '2026-03-27 07:11:07', 'cms'),
(843, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-27 07:13:20', '2026-03-27 07:13:20', 'generated::8GbzuXcXnfacRioB'),
(844, '1', '127.0.0.1', 'Unknown', '0', 'announcements', NULL, 'User accessed announcements', 'announcements', '{}', '{}', '', '2026-03-27 07:13:50', '2026-03-27 07:13:50', 'cms'),
(845, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-27 07:14:05', '2026-03-27 07:14:05', 'dashboard'),
(846, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/cms/announcements', 'admin/cms/announcements', '{}', '{}', '', '2026-03-27 07:14:10', '2026-03-27 07:14:10', 'admin'),
(847, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/cms/announcements/create', 'admin/cms/announcements/create', '{}', '{}', '', '2026-03-27 07:14:12', '2026-03-27 07:14:12', 'admin'),
(848, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/cms/announcements', 'admin/cms/announcements', '{}', '{}', '', '2026-03-27 07:14:26', '2026-03-27 07:14:26', 'admin'),
(849, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/cms/announcements', 'admin/cms/announcements', '{}', '{}', '', '2026-03-27 07:14:27', '2026-03-27 07:14:27', 'admin'),
(850, '1', '127.0.0.1', 'Unknown', '0', 'announcements', NULL, 'User accessed announcements', 'announcements', '{}', '{}', '', '2026-03-27 07:14:31', '2026-03-27 07:14:31', 'cms'),
(851, '1', '127.0.0.1', 'Unknown', '0', 'announcements', NULL, 'User accessed announcements', 'announcements', '{}', '{}', '', '2026-03-27 07:14:34', '2026-03-27 07:14:34', 'cms'),
(852, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/cms/announcements/{announcement}/edit', 'admin/cms/announcements/1/edit', '{}', '{}', '', '2026-03-27 07:14:38', '2026-03-27 07:14:38', 'admin'),
(853, '1', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/cms/announcements/{announcement}', 'admin/cms/announcements/1', '{}', '{}', '', '2026-03-27 07:14:47', '2026-03-27 07:14:47', 'admin'),
(854, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/cms/announcements', 'admin/cms/announcements', '{}', '{}', '', '2026-03-27 07:14:48', '2026-03-27 07:14:48', 'admin'),
(855, '1', '127.0.0.1', 'Unknown', '0', 'announcements', NULL, 'User accessed announcements', 'announcements', '{}', '{}', '', '2026-03-27 07:14:51', '2026-03-27 07:14:51', 'cms'),
(856, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-27 07:14:53', '2026-03-27 07:14:53', 'generated::8GbzuXcXnfacRioB'),
(857, '1', '127.0.0.1', 'Unknown', '0', 'announcements', NULL, 'User accessed announcements', 'announcements', '{}', '{}', '', '2026-03-27 07:15:03', '2026-03-27 07:15:03', 'cms'),
(858, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/cms/announcements/create', 'admin/cms/announcements/create', '{}', '{}', '', '2026-03-27 07:15:07', '2026-03-27 07:15:07', 'admin'),
(859, '1', '127.0.0.1', 'Unknown', '0', 'galleries', NULL, 'User accessed galleries', 'galleries', '{}', '{}', '', '2026-03-27 07:15:23', '2026-03-27 07:15:23', 'cms'),
(860, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-27 07:15:33', '2026-03-27 07:15:33', 'generated::8GbzuXcXnfacRioB'),
(861, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 07:17:25', '2026-03-27 07:17:25', 'admin'),
(862, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-27 07:17:29', '2026-03-27 07:17:29', 'admin'),
(863, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 07:22:22', '2026-03-27 07:22:22', 'admin'),
(864, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/ecde-schools/{ecde_school}/edit', 'admin/ecde-schools/7/edit', '{}', '{}', '', '2026-03-27 07:22:25', '2026-03-27 07:22:25', 'admin'),
(865, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-27 07:22:34', '2026-03-27 07:22:34', 'admin'),
(866, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 07:23:03', '2026-03-27 07:23:03', 'admin'),
(867, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/learners/{learner}/edit', 'admin/learners/8/edit', '{}', '{}', '', '2026-03-27 07:23:06', '2026-03-27 07:23:06', 'admin'),
(868, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-27 07:23:11', '2026-03-27 07:23:11', 'admin'),
(869, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 07:23:31', '2026-03-27 07:23:31', 'admin'),
(870, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/7', '{}', '{}', '', '2026-03-27 07:23:34', '2026-03-27 07:23:34', 'admin'),
(871, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/education-histories', 'admin/education-histories', '{}', '{}', '', '2026-03-27 07:24:52', '2026-03-27 07:24:52', 'admin'),
(872, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/sub-counties', 'admin/sub-counties', '{}', '{}', '', '2026-03-27 07:24:58', '2026-03-27 07:24:58', 'admin'),
(873, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-27 07:25:11', '2026-03-27 07:25:11', 'dashboard'),
(874, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-27 08:26:20', '2026-03-27 08:26:20', 'dashboard'),
(875, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 08:27:52', '2026-03-27 08:27:52', 'admin'),
(876, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-27 08:27:56', '2026-03-27 08:27:56', 'admin'),
(877, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-27 08:28:12', '2026-03-27 08:28:12', 'admin'),
(878, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-27 08:28:46', '2026-03-27 08:28:46', 'admin'),
(879, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-27 08:29:20', '2026-03-27 08:29:20', 'admin'),
(880, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-27 08:29:28', '2026-03-27 08:29:28', 'admin'),
(881, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-27 08:30:59', '2026-03-27 08:30:59', 'admin'),
(882, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 08:31:05', '2026-03-27 08:31:05', 'admin'),
(883, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 08:32:52', '2026-03-27 08:32:52', 'admin'),
(884, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 08:32:53', '2026-03-27 08:32:53', 'admin'),
(885, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 08:33:28', '2026-03-27 08:33:28', 'admin'),
(886, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-27 08:33:32', '2026-03-27 08:33:32', 'admin'),
(887, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 08:34:00', '2026-03-27 08:34:00', 'admin'),
(888, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-27 08:34:08', '2026-03-27 08:34:08', 'admin'),
(889, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 08:34:35', '2026-03-27 08:34:35', 'admin'),
(890, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 08:34:46', '2026-03-27 08:34:46', 'admin'),
(891, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 08:34:57', '2026-03-27 08:34:57', 'admin'),
(892, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/9', '{}', '{}', '', '2026-03-27 08:35:11', '2026-03-27 08:35:11', 'admin'),
(893, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/9', '{}', '{}', '', '2026-03-27 08:38:59', '2026-03-27 08:38:59', 'admin'),
(894, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/9', '{}', '{}', '', '2026-03-27 08:39:27', '2026-03-27 08:39:27', 'admin'),
(895, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/9', '{}', '{}', '', '2026-03-27 08:39:52', '2026-03-27 08:39:52', 'admin'),
(896, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/9', '{}', '{}', '', '2026-03-27 08:41:19', '2026-03-27 08:41:19', 'admin'),
(897, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/9', '{}', '{}', '', '2026-03-27 08:41:37', '2026-03-27 08:41:37', 'admin'),
(898, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/9', '{}', '{}', '', '2026-03-27 08:43:09', '2026-03-27 08:43:09', 'admin'),
(899, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/9', '{}', '{}', '', '2026-03-27 08:43:26', '2026-03-27 08:43:26', 'admin'),
(900, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/9', '{}', '{}', '', '2026-03-27 08:44:01', '2026-03-27 08:44:01', 'admin'),
(901, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/9', '{}', '{}', '', '2026-03-27 08:45:17', '2026-03-27 08:45:17', 'admin'),
(902, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 08:45:49', '2026-03-27 08:45:49', 'admin'),
(903, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-27 08:45:51', '2026-03-27 08:45:51', 'admin'),
(904, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-27 08:46:44', '2026-03-27 08:46:44', 'admin'),
(905, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-27 08:46:58', '2026-03-27 08:46:58', 'admin'),
(906, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 08:47:16', '2026-03-27 08:47:16', 'admin'),
(907, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/8', '{}', '{}', '', '2026-03-27 08:47:19', '2026-03-27 08:47:19', 'admin'),
(908, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/8', '{}', '{}', '', '2026-03-27 08:48:25', '2026-03-27 08:48:25', 'admin'),
(909, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/8', '{}', '{}', '', '2026-03-27 08:48:38', '2026-03-27 08:48:38', 'admin'),
(910, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/8', '{}', '{}', '', '2026-03-27 08:49:10', '2026-03-27 08:49:10', 'admin'),
(911, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/8', '{}', '{}', '', '2026-03-27 08:50:00', '2026-03-27 08:50:00', 'admin'),
(912, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/8', '{}', '{}', '', '2026-03-27 08:50:11', '2026-03-27 08:50:11', 'admin'),
(913, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/8', '{}', '{}', '', '2026-03-27 08:52:33', '2026-03-27 08:52:33', 'admin'),
(914, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/8', '{}', '{}', '', '2026-03-27 08:54:51', '2026-03-27 08:54:51', 'admin'),
(915, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/8', '{}', '{}', '', '2026-03-27 09:00:45', '2026-03-27 09:00:45', 'admin'),
(916, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/8', '{}', '{}', '', '2026-03-27 09:02:50', '2026-03-27 09:02:50', 'admin'),
(917, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/8', '{}', '{}', '', '2026-03-27 09:03:12', '2026-03-27 09:03:12', 'admin'),
(918, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/8', '{}', '{}', '', '2026-03-27 09:04:29', '2026-03-27 09:04:29', 'admin'),
(919, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 09:04:40', '2026-03-27 09:04:40', 'admin'),
(920, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-27 09:04:53', '2026-03-27 09:04:53', 'admin'),
(921, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-27 09:05:29', '2026-03-27 09:05:29', 'admin'),
(922, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-27 09:05:44', '2026-03-27 09:05:44', 'admin'),
(923, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-27 09:06:27', '2026-03-27 09:06:27', 'admin'),
(924, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-27 10:57:51', '2026-03-27 10:57:51', 'admin'),
(925, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-27 11:04:06', '2026-03-27 11:04:06', 'admin'),
(926, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-27 11:06:42', '2026-03-27 11:06:42', 'admin'),
(927, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-27 11:06:47', '2026-03-27 11:06:47', 'admin'),
(928, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/ecde-schools/{ecde_school}/edit', 'admin/ecde-schools/9/edit', '{}', '{}', '', '2026-03-27 11:06:50', '2026-03-27 11:06:50', 'admin'),
(929, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/ecde-schools/{ecde_school}/edit', 'admin/ecde-schools/8/edit', '{}', '{}', '', '2026-03-27 11:07:02', '2026-03-27 11:07:02', 'admin'),
(930, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 11:07:08', '2026-03-27 11:07:08', 'admin'),
(931, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/learners/{learner}/edit', 'admin/learners/8/edit', '{}', '{}', '', '2026-03-27 11:07:12', '2026-03-27 11:07:12', 'admin'),
(932, '1', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/8', '{}', '{}', '', '2026-03-27 11:07:33', '2026-03-27 11:07:33', 'admin'),
(933, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-27 11:07:33', '2026-03-27 11:07:33', 'admin'),
(934, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'users', '{}', '{}', '', '2026-03-27 11:07:39', '2026-03-27 11:07:39', 'users'),
(935, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/users', 'admin/users', '{}', '{}', '', '2026-03-27 11:07:39', '2026-03-27 11:07:39', 'admin'),
(936, '1', '127.0.0.1', 'Unknown', '30', 'edit', NULL, 'User accessed edit user page for user id 30', 'admin/users/30/edit', '{}', '{\"id\":30,\"first_name\":\"Sage\",\"last_name\":\"Sparks\",\"middle_name\":\"Nayda Jacobson\",\"email\":\"lepiqe@mailinator.com\",\"email_verified_at\":null,\"role\":\"Teacher\",\"created_at\":\"2026-03-26T07:09:56.000000Z\",\"updated_at\":\"2026-03-27T09:34:16.000000Z\",\"phone_number\":\"0\",\"id_number\":null}', '', '2026-03-27 11:07:40', '2026-03-27 11:07:40', 'users'),
(937, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/users/{user}/edit', 'admin/users/30/edit', '{}', '{}', '', '2026-03-27 11:07:41', '2026-03-27 11:07:41', 'admin'),
(938, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-27 11:07:47', '2026-03-27 11:07:47', 'dashboard'),
(939, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-29 06:07:57', '2026-03-29 06:07:57', 'login'),
(940, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-29 06:07:59', '2026-03-29 06:07:59', 'dashboard'),
(941, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-29 06:08:05', '2026-03-29 06:08:05', 'admin'),
(942, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/ecde-schools/create', 'admin/ecde-schools/create', '{}', '{}', '', '2026-03-29 06:08:11', '2026-03-29 06:08:11', 'admin'),
(943, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/9', '{}', '{}', '', '2026-03-29 06:08:17', '2026-03-29 06:08:17', 'admin'),
(944, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/ecde-schools/{ecde_school}/edit', 'admin/ecde-schools/6/edit', '{}', '{}', '', '2026-03-29 06:08:21', '2026-03-29 06:08:21', 'admin'),
(945, '1', '127.0.0.1', 'Unknown', '0', 'edit', NULL, 'User accessed admin/ecde-schools/{ecde_school}/edit', 'admin/ecde-schools/6/edit', '{}', '{}', '', '2026-03-29 06:09:56', '2026-03-29 06:09:56', 'admin'),
(946, '1', '127.0.0.1', 'Unknown', '0', 'update', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:10:12', '2026-03-29 06:10:12', 'admin'),
(947, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-29 06:10:12', '2026-03-29 06:10:12', 'admin'),
(948, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:10:15', '2026-03-29 06:10:15', 'admin'),
(949, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:17:25', '2026-03-29 06:17:25', 'admin'),
(950, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:17:55', '2026-03-29 06:17:55', 'admin'),
(951, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:18:52', '2026-03-29 06:18:52', 'admin'),
(952, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:19:21', '2026-03-29 06:19:21', 'admin'),
(953, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:19:46', '2026-03-29 06:19:46', 'admin'),
(954, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:20:01', '2026-03-29 06:20:01', 'admin'),
(955, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:20:49', '2026-03-29 06:20:49', 'admin'),
(956, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/classrooms/create', 'admin/classrooms/create', '{}', '{}', '', '2026-03-29 06:20:56', '2026-03-29 06:20:56', 'admin'),
(957, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/classrooms/create', 'admin/classrooms/create', '{}', '{}', '', '2026-03-29 06:22:02', '2026-03-29 06:22:02', 'admin'),
(958, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/classrooms/create', 'admin/classrooms/create', '{}', '{}', '', '2026-03-29 06:26:21', '2026-03-29 06:26:21', 'admin'),
(959, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/classrooms/create', 'admin/classrooms/create', '{}', '{}', '', '2026-03-29 06:26:33', '2026-03-29 06:26:33', 'admin'),
(960, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/classrooms/create', 'admin/classrooms/create', '{}', '{}', '', '2026-03-29 06:28:28', '2026-03-29 06:28:28', 'admin'),
(961, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/classrooms/create', 'admin/classrooms/create', '{}', '{}', '', '2026-03-29 06:29:03', '2026-03-29 06:29:03', 'admin'),
(962, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/classrooms/create', 'admin/classrooms/create', '{}', '{}', '', '2026-03-29 06:29:44', '2026-03-29 06:29:44', 'admin'),
(963, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/classrooms/create', 'admin/classrooms/create', '{}', '{}', '', '2026-03-29 06:30:15', '2026-03-29 06:30:15', 'admin'),
(964, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/classrooms/create', 'admin/classrooms/create', '{}', '{}', '', '2026-03-29 06:30:32', '2026-03-29 06:30:32', 'admin'),
(965, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/classrooms/create', 'admin/classrooms/create', '{}', '{}', '', '2026-03-29 06:32:21', '2026-03-29 06:32:21', 'admin'),
(966, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/classrooms/create', 'admin/classrooms/create', '{}', '{}', '', '2026-03-29 06:32:43', '2026-03-29 06:32:43', 'admin'),
(967, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/classrooms', 'admin/classrooms', '{}', '{}', '', '2026-03-29 06:34:02', '2026-03-29 06:34:02', 'admin'),
(968, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/classrooms', 'admin/classrooms', '{}', '{}', '', '2026-03-29 06:37:05', '2026-03-29 06:37:05', 'admin'),
(969, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/classrooms/create', 'admin/classrooms/create', '{}', '{}', '', '2026-03-29 06:37:05', '2026-03-29 06:37:05', 'admin'),
(970, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/classrooms/create', 'admin/classrooms/create', '{}', '{}', '', '2026-03-29 06:37:23', '2026-03-29 06:37:23', 'admin'),
(971, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/classrooms', 'admin/classrooms', '{}', '{}', '', '2026-03-29 06:37:31', '2026-03-29 06:37:31', 'admin'),
(972, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/classrooms', 'admin/classrooms', '{}', '{}', '', '2026-03-29 06:38:02', '2026-03-29 06:38:02', 'admin'),
(973, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:38:04', '2026-03-29 06:38:04', 'admin'),
(974, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:39:20', '2026-03-29 06:39:20', 'admin'),
(975, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:40:00', '2026-03-29 06:40:00', 'admin'),
(976, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:40:22', '2026-03-29 06:40:22', 'admin'),
(977, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:40:34', '2026-03-29 06:40:34', 'admin'),
(978, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:40:56', '2026-03-29 06:40:56', 'admin'),
(979, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:41:08', '2026-03-29 06:41:08', 'admin'),
(980, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-29 06:41:13', '2026-03-29 06:41:13', 'admin'),
(981, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-29 06:42:03', '2026-03-29 06:42:03', 'admin'),
(982, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-29 06:42:13', '2026-03-29 06:42:13', 'admin'),
(983, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-29 06:43:00', '2026-03-29 06:43:00', 'admin'),
(984, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-29 06:43:22', '2026-03-29 06:43:22', 'admin'),
(985, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-29 06:44:33', '2026-03-29 06:44:33', 'admin'),
(986, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:44:34', '2026-03-29 06:44:34', 'admin'),
(987, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:45:34', '2026-03-29 06:45:34', 'admin'),
(988, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-29 06:45:40', '2026-03-29 06:45:40', 'admin'),
(989, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-29 06:46:30', '2026-03-29 06:46:30', 'admin'),
(990, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-29 06:46:40', '2026-03-29 06:46:40', 'admin'),
(991, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-29 06:47:09', '2026-03-29 06:47:09', 'admin'),
(992, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-29 06:48:46', '2026-03-29 06:48:46', 'admin'),
(993, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:48:46', '2026-03-29 06:48:46', 'admin'),
(994, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:49:37', '2026-03-29 06:49:37', 'admin'),
(995, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:50:21', '2026-03-29 06:50:21', 'admin'),
(996, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:50:57', '2026-03-29 06:50:57', 'admin'),
(997, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:51:13', '2026-03-29 06:51:13', 'admin'),
(998, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:51:43', '2026-03-29 06:51:43', 'admin'),
(999, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:51:57', '2026-03-29 06:51:57', 'admin'),
(1000, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-29 06:52:26', '2026-03-29 06:52:26', 'admin'),
(1001, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-29 06:52:29', '2026-03-29 06:52:29', 'admin'),
(1002, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-29 06:56:49', '2026-03-29 06:56:49', 'admin'),
(1003, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-29 06:56:57', '2026-03-29 06:56:57', 'admin'),
(1004, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-29 06:57:05', '2026-03-29 06:57:05', 'admin'),
(1005, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-29 06:57:11', '2026-03-29 06:57:11', 'admin'),
(1006, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-29 06:57:19', '2026-03-29 06:57:19', 'admin'),
(1007, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-29 06:57:33', '2026-03-29 06:57:33', 'admin'),
(1008, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-29 06:57:58', '2026-03-29 06:57:58', 'admin'),
(1009, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-29 06:59:22', '2026-03-29 06:59:22', 'admin'),
(1010, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-29 07:00:21', '2026-03-29 07:00:21', 'admin'),
(1011, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-29 07:01:14', '2026-03-29 07:01:14', 'generated::CSxf0VB1TH10yZ30'),
(1012, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:01:17', '2026-03-29 07:01:17', 'cms'),
(1013, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:06:09', '2026-03-29 07:06:09', 'cms'),
(1014, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:08:09', '2026-03-29 07:08:09', 'cms'),
(1015, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-29 07:08:14', '2026-03-29 07:08:14', 'generated::CSxf0VB1TH10yZ30'),
(1016, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-29 07:08:29', '2026-03-29 07:08:29', 'generated::CSxf0VB1TH10yZ30'),
(1017, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-29 07:08:47', '2026-03-29 07:08:47', 'generated::uv9Vu1H8c96EvZrE'),
(1018, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-29 07:08:56', '2026-03-29 07:08:56', 'generated::8mm2g8uD4aaEj2CP'),
(1019, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-29 07:09:16', '2026-03-29 07:09:16', 'generated::8mm2g8uD4aaEj2CP'),
(1020, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-29 07:09:34', '2026-03-29 07:09:34', 'home'),
(1021, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:09:40', '2026-03-29 07:09:40', 'cms'),
(1022, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:10:35', '2026-03-29 07:10:35', 'cms'),
(1023, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:11:02', '2026-03-29 07:11:02', 'cms'),
(1024, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:11:17', '2026-03-29 07:11:17', 'cms'),
(1025, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:11:25', '2026-03-29 07:11:25', 'cms'),
(1026, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:11:45', '2026-03-29 07:11:45', 'cms'),
(1027, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:12:09', '2026-03-29 07:12:09', 'cms'),
(1028, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:12:32', '2026-03-29 07:12:32', 'cms'),
(1029, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:12:41', '2026-03-29 07:12:41', 'cms'),
(1030, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:12:59', '2026-03-29 07:12:59', 'cms'),
(1031, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:13:54', '2026-03-29 07:13:54', 'cms'),
(1032, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:15:50', '2026-03-29 07:15:50', 'cms'),
(1033, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:16:36', '2026-03-29 07:16:36', 'cms'),
(1034, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:17:20', '2026-03-29 07:17:20', 'cms'),
(1035, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:17:30', '2026-03-29 07:17:30', 'cms'),
(1036, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:17:40', '2026-03-29 07:17:40', 'cms'),
(1037, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:17:53', '2026-03-29 07:17:53', 'cms'),
(1038, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:18:04', '2026-03-29 07:18:04', 'cms'),
(1039, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:18:13', '2026-03-29 07:18:13', 'cms'),
(1040, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:18:21', '2026-03-29 07:18:21', 'cms'),
(1041, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:18:28', '2026-03-29 07:18:28', 'cms'),
(1042, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:19:44', '2026-03-29 07:19:44', 'cms'),
(1043, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:20:00', '2026-03-29 07:20:00', 'cms'),
(1044, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-29 07:20:03', '2026-03-29 07:20:03', 'home'),
(1045, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-29 07:20:22', '2026-03-29 07:20:22', 'home'),
(1046, '1', '127.0.0.1', 'Unknown', '0', 'posts', NULL, 'User accessed blog', 'blog', '{}', '{}', '', '2026-03-29 07:20:28', '2026-03-29 07:20:28', 'cms'),
(1047, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:20:29', '2026-03-29 07:20:29', 'cms'),
(1048, '1', '127.0.0.1', 'Unknown', '0', 'announcements', NULL, 'User accessed announcements', 'announcements', '{}', '{}', '', '2026-03-29 07:20:31', '2026-03-29 07:20:31', 'cms'),
(1049, '1', '127.0.0.1', 'Unknown', '0', 'faqs', NULL, 'User accessed faqs', 'faqs', '{}', '{}', '', '2026-03-29 07:20:33', '2026-03-29 07:20:33', 'cms'),
(1050, '1', '127.0.0.1', 'Unknown', '0', 'galleries', NULL, 'User accessed galleries', 'galleries', '{}', '{}', '', '2026-03-29 07:20:37', '2026-03-29 07:20:37', 'cms'),
(1051, '1', '127.0.0.1', 'Unknown', '0', 'contactForm', NULL, 'User accessed contact', 'contact', '{}', '{}', '', '2026-03-29 07:20:39', '2026-03-29 07:20:39', 'cms');
INSERT INTO `system_activity_logs` (`id`, `causer_id`, `ip_address`, `network`, `subject_id`, `action`, `event`, `description`, `asset_url`, `current_object`, `new_object`, `type`, `created_at`, `updated_at`, `model_table_name`) VALUES
(1052, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-29 07:20:42', '2026-03-29 07:20:42', 'home'),
(1053, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-29 07:21:20', '2026-03-29 07:21:20', 'home'),
(1054, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-03-29 07:21:27', '2026-03-29 07:21:27', 'cms'),
(1055, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-29 07:21:29', '2026-03-29 07:21:29', 'home'),
(1056, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-30 07:38:01', '2026-03-30 07:38:01', 'login'),
(1057, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-30 07:38:04', '2026-03-30 07:38:04', 'dashboard'),
(1058, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-30 07:38:07', '2026-03-30 07:38:07', 'admin'),
(1059, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-30 07:38:10', '2026-03-30 07:38:10', 'admin'),
(1060, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-30 07:39:34', '2026-03-30 07:39:34', 'admin'),
(1061, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-30 07:39:41', '2026-03-30 07:39:41', 'admin'),
(1062, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-30 07:40:30', '2026-03-30 07:40:30', 'admin'),
(1063, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-30 07:41:48', '2026-03-30 07:41:48', 'admin'),
(1064, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-30 07:42:11', '2026-03-30 07:42:11', 'admin'),
(1065, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-30 07:42:57', '2026-03-30 07:42:57', 'admin'),
(1066, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:43:01', '2026-03-30 07:43:01', 'admin'),
(1067, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:43:43', '2026-03-30 07:43:43', 'admin'),
(1068, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:45:48', '2026-03-30 07:45:48', 'admin'),
(1069, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:45:54', '2026-03-30 07:45:54', 'admin'),
(1070, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:46:11', '2026-03-30 07:46:11', 'admin'),
(1071, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:46:23', '2026-03-30 07:46:23', 'admin'),
(1072, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:47:09', '2026-03-30 07:47:09', 'admin'),
(1073, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:47:17', '2026-03-30 07:47:17', 'admin'),
(1074, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:49:26', '2026-03-30 07:49:26', 'admin'),
(1075, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:49:41', '2026-03-30 07:49:41', 'admin'),
(1076, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:49:59', '2026-03-30 07:49:59', 'admin'),
(1077, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:50:11', '2026-03-30 07:50:11', 'admin'),
(1078, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:50:31', '2026-03-30 07:50:31', 'admin'),
(1079, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:51:30', '2026-03-30 07:51:30', 'admin'),
(1080, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:52:18', '2026-03-30 07:52:18', 'admin'),
(1081, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:53:08', '2026-03-30 07:53:08', 'admin'),
(1082, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-30 07:53:12', '2026-03-30 07:53:12', 'admin'),
(1083, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-30 07:53:13', '2026-03-30 07:53:13', 'admin'),
(1084, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-30 07:53:18', '2026-03-30 07:53:18', 'admin'),
(1085, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-30 07:53:22', '2026-03-30 07:53:22', 'admin'),
(1086, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-03-30 07:54:11', '2026-03-30 07:54:11', 'admin'),
(1087, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-30 07:54:20', '2026-03-30 07:54:20', 'admin'),
(1088, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-30 07:54:21', '2026-03-30 07:54:21', 'admin'),
(1089, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-30 07:55:22', '2026-03-30 07:55:22', 'admin'),
(1090, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-30 07:56:06', '2026-03-30 07:56:06', 'admin'),
(1091, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-30 07:56:30', '2026-03-30 07:56:30', 'admin'),
(1092, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-30 07:56:54', '2026-03-30 07:56:54', 'admin'),
(1093, '1', '127.0.0.1', 'Unknown', '0', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-30 07:57:08', '2026-03-30 07:57:08', 'admin'),
(1094, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-30 08:31:21', '2026-03-30 08:31:21', 'admin'),
(1095, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-30 08:31:58', '2026-03-30 08:31:58', 'admin'),
(1096, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-30 08:32:11', '2026-03-30 08:32:11', 'admin'),
(1097, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-30 09:00:29', '2026-03-30 09:00:29', 'admin'),
(1098, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-30 09:03:18', '2026-03-30 09:03:18', 'admin'),
(1099, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-30 09:03:31', '2026-03-30 09:03:31', 'admin'),
(1100, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-30 09:03:33', '2026-03-30 09:03:33', 'admin'),
(1101, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-03-30 09:04:09', '2026-03-30 09:04:09', 'home'),
(1102, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-30 12:01:01', '2026-03-30 12:01:01', 'login'),
(1103, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-30 12:01:03', '2026-03-30 12:01:03', 'dashboard'),
(1104, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-30 12:04:40', '2026-03-30 12:04:40', 'dashboard'),
(1105, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-30 12:06:44', '2026-03-30 12:06:44', 'dashboard'),
(1106, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-30 12:07:34', '2026-03-30 12:07:34', 'dashboard'),
(1107, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-30 12:09:24', '2026-03-30 12:09:24', 'dashboard'),
(1108, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-30 12:09:37', '2026-03-30 12:09:37', 'dashboard'),
(1109, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-30 12:10:13', '2026-03-30 12:10:13', 'dashboard'),
(1110, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-30 12:11:21', '2026-03-30 12:11:21', 'dashboard'),
(1111, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-30 12:11:40', '2026-03-30 12:11:40', 'dashboard'),
(1112, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-30 12:12:55', '2026-03-30 12:12:55', 'dashboard'),
(1113, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-30 12:13:31', '2026-03-30 12:13:31', 'dashboard'),
(1114, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-30 12:16:08', '2026-03-30 12:16:08', 'dashboard'),
(1115, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-30 12:16:56', '2026-03-30 12:16:56', 'dashboard'),
(1116, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-30 12:18:26', '2026-03-30 12:18:26', 'dashboard'),
(1117, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-31 02:48:51', '2026-03-31 02:48:51', 'login'),
(1118, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-31 02:48:54', '2026-03-31 02:48:54', 'dashboard'),
(1119, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-31 02:49:01', '2026-03-31 02:49:01', 'dashboard'),
(1120, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-31 02:49:06', '2026-03-31 02:49:06', 'dashboard'),
(1121, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-31 02:49:09', '2026-03-31 02:49:09', 'dashboard'),
(1122, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-31 02:49:26', '2026-03-31 02:49:26', 'dashboard'),
(1123, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/ecde-schools', 'admin/ecde-schools', '{}', '{}', '', '2026-03-31 02:53:09', '2026-03-31 02:53:09', 'admin'),
(1124, '1', '127.0.0.1', 'Unknown', '6', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-31 02:53:22', '2026-03-31 02:53:22', 'admin'),
(1125, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-31 02:54:01', '2026-03-31 02:54:01', 'admin'),
(1126, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-31 02:59:01', '2026-03-31 02:59:01', 'admin'),
(1127, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-31 02:59:18', '2026-03-31 02:59:18', 'admin'),
(1128, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-31 02:59:47', '2026-03-31 02:59:47', 'admin'),
(1129, '1', '127.0.0.1', 'Unknown', '6', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-31 02:59:47', '2026-03-31 02:59:47', 'admin'),
(1130, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-31 03:00:19', '2026-03-31 03:00:19', 'admin'),
(1131, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/classrooms/create', 'admin/classrooms/create', '{}', '{}', '', '2026-03-31 03:05:24', '2026-03-31 03:05:24', 'admin'),
(1132, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/classrooms', 'admin/classrooms', '{}', '{}', '', '2026-03-31 03:05:52', '2026-03-31 03:05:52', 'admin'),
(1133, '1', '127.0.0.1', 'Unknown', '6', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/6', '{}', '{}', '', '2026-03-31 03:05:53', '2026-03-31 03:05:53', 'admin'),
(1134, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-03-31 03:07:52', '2026-03-31 03:07:52', 'admin'),
(1135, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 03:08:20', '2026-03-31 03:08:20', 'admin'),
(1136, '1', '127.0.0.1', 'Unknown', '13', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/13', '{}', '{}', '', '2026-03-31 03:08:23', '2026-03-31 03:08:23', 'admin'),
(1137, '1', '127.0.0.1', 'Unknown', '1', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-31 03:08:34', '2026-03-31 03:08:34', 'admin'),
(1138, '1', '127.0.0.1', 'Unknown', '1', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-31 03:29:35', '2026-03-31 03:29:35', 'admin'),
(1139, '1', '127.0.0.1', 'Unknown', '1', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-31 03:32:35', '2026-03-31 03:32:35', 'admin'),
(1140, '1', '127.0.0.1', 'Unknown', '1', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-31 03:32:41', '2026-03-31 03:32:41', 'admin'),
(1141, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:32:47', '2026-03-31 03:32:47', 'admin'),
(1142, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:34:10', '2026-03-31 03:34:10', 'admin'),
(1143, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:35:44', '2026-03-31 03:35:44', 'admin'),
(1144, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:35:55', '2026-03-31 03:35:55', 'admin'),
(1145, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:36:03', '2026-03-31 03:36:03', 'admin'),
(1146, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:36:16', '2026-03-31 03:36:16', 'admin'),
(1147, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:36:53', '2026-03-31 03:36:53', 'admin'),
(1148, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:37:22', '2026-03-31 03:37:22', 'admin'),
(1149, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:37:35', '2026-03-31 03:37:35', 'admin'),
(1150, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:37:47', '2026-03-31 03:37:47', 'admin'),
(1151, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:38:23', '2026-03-31 03:38:23', 'admin'),
(1152, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:38:34', '2026-03-31 03:38:34', 'admin'),
(1153, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/user-documents/create', 'admin/user-documents/create', '{}', '{}', '', '2026-03-31 03:38:42', '2026-03-31 03:38:42', 'admin'),
(1154, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:39:08', '2026-03-31 03:39:08', 'admin'),
(1155, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/deployment-histories/create', 'admin/deployment-histories/create', '{}', '{}', '', '2026-03-31 03:39:11', '2026-03-31 03:39:11', 'admin'),
(1156, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/deployment-histories/create', 'admin/deployment-histories/create', '{}', '{}', '', '2026-03-31 03:39:22', '2026-03-31 03:39:22', 'admin'),
(1157, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/deployment-histories/create', 'admin/deployment-histories/create', '{}', '{}', '', '2026-03-31 03:42:07', '2026-03-31 03:42:07', 'admin'),
(1158, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/deployment-histories/create', 'admin/deployment-histories/create', '{}', '{}', '', '2026-03-31 03:42:27', '2026-03-31 03:42:27', 'admin'),
(1159, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/deployment-histories/create', 'admin/deployment-histories/create', '{}', '{}', '', '2026-03-31 03:42:44', '2026-03-31 03:42:44', 'admin'),
(1160, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/deployment-histories/create', 'admin/deployment-histories/create', '{}', '{}', '', '2026-03-31 03:43:04', '2026-03-31 03:43:04', 'admin'),
(1161, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/deployment-histories/create', 'admin/deployment-histories/create', '{}', '{}', '', '2026-03-31 03:43:35', '2026-03-31 03:43:35', 'admin'),
(1162, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:43:58', '2026-03-31 03:43:58', 'admin'),
(1163, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/deployment-histories/create', 'admin/deployment-histories/create', '{}', '{}', '', '2026-03-31 03:43:58', '2026-03-31 03:43:58', 'admin'),
(1164, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:44:28', '2026-03-31 03:44:28', 'admin'),
(1165, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/deployment-histories/create', 'admin/deployment-histories/create', '{}', '{}', '', '2026-03-31 03:44:28', '2026-03-31 03:44:28', 'admin'),
(1166, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:47:31', '2026-03-31 03:47:31', 'admin'),
(1167, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:48:08', '2026-03-31 03:48:08', 'admin'),
(1168, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:48:09', '2026-03-31 03:48:09', 'admin'),
(1169, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:49:58', '2026-03-31 03:49:58', 'admin'),
(1170, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:50:15', '2026-03-31 03:50:15', 'admin'),
(1171, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:50:25', '2026-03-31 03:50:25', 'admin'),
(1172, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:51:13', '2026-03-31 03:51:13', 'admin'),
(1173, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/deployment-histories/create', 'admin/deployment-histories/create', '{}', '{}', '', '2026-03-31 03:51:23', '2026-03-31 03:51:23', 'admin'),
(1174, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:51:31', '2026-03-31 03:51:31', 'admin'),
(1175, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/deployment-histories/create', 'admin/deployment-histories/create', '{}', '{}', '', '2026-03-31 03:51:31', '2026-03-31 03:51:31', 'admin'),
(1176, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:51:45', '2026-03-31 03:51:45', 'admin'),
(1177, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:51:45', '2026-03-31 03:51:45', 'admin'),
(1178, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-31 03:52:05', '2026-03-31 03:52:05', 'admin'),
(1179, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 03:52:10', '2026-03-31 03:52:10', 'admin'),
(1180, '1', '127.0.0.1', 'Unknown', '1', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-31 03:52:19', '2026-03-31 03:52:19', 'admin'),
(1181, '1', '127.0.0.1', 'Unknown', '1', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-31 03:52:54', '2026-03-31 03:52:54', 'admin'),
(1182, '1', '127.0.0.1', 'Unknown', '1', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-31 03:54:21', '2026-03-31 03:54:21', 'admin'),
(1183, '1', '127.0.0.1', 'Unknown', '1', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-31 03:54:40', '2026-03-31 03:54:40', 'admin'),
(1184, '1', '127.0.0.1', 'Unknown', '1', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-31 03:54:54', '2026-03-31 03:54:54', 'admin'),
(1185, '1', '127.0.0.1', 'Unknown', '1', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-31 03:55:22', '2026-03-31 03:55:22', 'admin'),
(1186, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-31 03:55:51', '2026-03-31 03:55:51', 'admin'),
(1187, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-31 03:56:52', '2026-03-31 03:56:52', 'admin'),
(1188, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-31 03:57:01', '2026-03-31 03:57:01', 'admin'),
(1189, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-31 03:57:04', '2026-03-31 03:57:04', 'admin'),
(1190, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-31 03:57:16', '2026-03-31 03:57:16', 'admin'),
(1191, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-31 03:58:07', '2026-03-31 03:58:07', 'admin'),
(1192, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-31 03:58:26', '2026-03-31 03:58:26', 'admin'),
(1193, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-31 03:58:33', '2026-03-31 03:58:33', 'admin'),
(1194, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/deployment-histories', 'admin/deployment-histories', '{}', '{}', '', '2026-03-31 03:58:43', '2026-03-31 03:58:43', 'admin'),
(1195, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/deployment-histories/create', 'admin/deployment-histories/create', '{}', '{}', '', '2026-03-31 03:58:47', '2026-03-31 03:58:47', 'admin'),
(1196, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 04:27:36', '2026-03-31 04:27:36', 'admin'),
(1197, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-31 04:27:39', '2026-03-31 04:27:39', 'admin'),
(1198, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 04:29:30', '2026-03-31 04:29:30', 'admin'),
(1199, '1', '127.0.0.1', 'Unknown', '7', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/7', '{}', '{}', '', '2026-03-31 04:29:32', '2026-03-31 04:29:32', 'admin'),
(1200, '1', '127.0.0.1', 'Unknown', '14', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/14', '{}', '{}', '', '2026-03-31 04:29:44', '2026-03-31 04:29:44', 'admin'),
(1201, '1', '127.0.0.1', 'Unknown', '14', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/14', '{}', '{}', '', '2026-03-31 04:30:18', '2026-03-31 04:30:18', 'admin'),
(1202, '1', '127.0.0.1', 'Unknown', '14', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/14', '{}', '{}', '', '2026-03-31 04:30:33', '2026-03-31 04:30:33', 'admin'),
(1203, '1', '127.0.0.1', 'Unknown', '14', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/14', '{}', '{}', '', '2026-03-31 04:31:44', '2026-03-31 04:31:44', 'admin'),
(1204, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 04:32:24', '2026-03-31 04:32:24', 'admin'),
(1205, '1', '127.0.0.1', 'Unknown', '8', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/8', '{}', '{}', '', '2026-03-31 04:32:25', '2026-03-31 04:32:25', 'admin'),
(1206, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 04:32:53', '2026-03-31 04:32:53', 'admin'),
(1207, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 04:33:02', '2026-03-31 04:33:02', 'admin'),
(1208, '1', '127.0.0.1', 'Unknown', '7', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/7', '{}', '{}', '', '2026-03-31 04:33:03', '2026-03-31 04:33:03', 'admin'),
(1209, '1', '127.0.0.1', 'Unknown', '14', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/14', '{}', '{}', '', '2026-03-31 04:33:11', '2026-03-31 04:33:11', 'admin'),
(1210, '1', '127.0.0.1', 'Unknown', '16', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/16', '{}', '{}', '', '2026-03-31 04:33:17', '2026-03-31 04:33:17', 'admin'),
(1211, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-31 04:33:56', '2026-03-31 04:33:56', 'admin'),
(1212, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 04:35:24', '2026-03-31 04:35:24', 'admin'),
(1213, '1', '127.0.0.1', 'Unknown', '9', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/9', '{}', '{}', '', '2026-03-31 04:35:25', '2026-03-31 04:35:25', 'admin'),
(1214, '1', '127.0.0.1', 'Unknown', '19', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/19', '{}', '{}', '', '2026-03-31 04:35:32', '2026-03-31 04:35:32', 'admin'),
(1215, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-31 04:35:48', '2026-03-31 04:35:48', 'admin'),
(1216, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 04:35:58', '2026-03-31 04:35:58', 'admin'),
(1217, '1', '127.0.0.1', 'Unknown', '9', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/9', '{}', '{}', '', '2026-03-31 04:35:58', '2026-03-31 04:35:58', 'admin'),
(1218, '1', '127.0.0.1', 'Unknown', '20', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/20', '{}', '{}', '', '2026-03-31 04:36:05', '2026-03-31 04:36:05', 'admin'),
(1219, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-03-31 04:36:27', '2026-03-31 04:36:27', 'admin'),
(1220, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 04:36:33', '2026-03-31 04:36:33', 'admin'),
(1221, '1', '127.0.0.1', 'Unknown', '9', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/9', '{}', '{}', '', '2026-03-31 04:36:34', '2026-03-31 04:36:34', 'admin'),
(1222, '1', '127.0.0.1', 'Unknown', '21', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/21', '{}', '{}', '', '2026-03-31 04:36:40', '2026-03-31 04:36:40', 'admin'),
(1223, '1', '127.0.0.1', 'Unknown', '21', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/21/edit', '{}', '{}', '', '2026-03-31 04:37:11', '2026-03-31 04:37:11', 'admin'),
(1224, '1', '127.0.0.1', 'Unknown', '21', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/21/edit', '{}', '{}', '', '2026-03-31 04:40:41', '2026-03-31 04:40:41', 'admin'),
(1225, '1', '127.0.0.1', 'Unknown', '21', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/21/edit', '{}', '{}', '', '2026-03-31 04:41:12', '2026-03-31 04:41:12', 'admin'),
(1226, '1', '127.0.0.1', 'Unknown', '21', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/21/edit', '{}', '{}', '', '2026-03-31 04:41:49', '2026-03-31 04:41:49', 'admin'),
(1227, '1', '127.0.0.1', 'Unknown', '21', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/21/edit', '{}', '{}', '', '2026-03-31 04:42:14', '2026-03-31 04:42:14', 'admin'),
(1228, '1', '127.0.0.1', 'Unknown', '21', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/21/edit', '{}', '{}', '', '2026-03-31 04:42:49', '2026-03-31 04:42:49', 'admin'),
(1229, '1', '127.0.0.1', 'Unknown', '21', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/21/edit', '{}', '{}', '', '2026-03-31 04:43:05', '2026-03-31 04:43:05', 'admin'),
(1230, '1', '127.0.0.1', 'Unknown', '21', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/21/edit', '{}', '{}', '', '2026-03-31 04:43:18', '2026-03-31 04:43:18', 'admin'),
(1231, '1', '127.0.0.1', 'Unknown', '21', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/21/edit', '{}', '{}', '', '2026-03-31 04:43:56', '2026-03-31 04:43:56', 'admin'),
(1232, '1', '127.0.0.1', 'Unknown', '21', 'update', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/21', '{}', '{}', '', '2026-03-31 04:46:07', '2026-03-31 04:46:07', 'admin'),
(1233, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 04:46:08', '2026-03-31 04:46:08', 'admin'),
(1234, '1', '127.0.0.1', 'Unknown', '21', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/21', '{}', '{}', '', '2026-03-31 04:46:23', '2026-03-31 04:46:23', 'admin'),
(1235, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 04:47:15', '2026-03-31 04:47:15', 'admin'),
(1236, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 04:47:23', '2026-03-31 04:47:23', 'admin'),
(1237, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 04:47:51', '2026-03-31 04:47:51', 'admin'),
(1238, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 04:48:02', '2026-03-31 04:48:02', 'admin'),
(1239, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-31 04:48:38', '2026-03-31 04:48:38', 'dashboard'),
(1240, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-03-31 04:49:21', '2026-03-31 04:49:21', 'admin'),
(1241, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-03-31 04:49:27', '2026-03-31 04:49:27', 'admin'),
(1242, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 04:58:54', '2026-03-31 04:58:54', 'admin'),
(1243, '1', '127.0.0.1', 'Unknown', '1', 'edit', NULL, 'User accessed admin/teachers/{teacher}/edit', 'admin/teachers/1/edit', '{}', '{}', '', '2026-03-31 04:59:01', '2026-03-31 04:59:01', 'admin'),
(1244, '1', '127.0.0.1', 'Unknown', '1', 'update', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-31 04:59:23', '2026-03-31 04:59:23', 'admin'),
(1245, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 04:59:24', '2026-03-31 04:59:24', 'admin'),
(1246, '1', '127.0.0.1', 'Unknown', '1', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-03-31 04:59:30', '2026-03-31 04:59:30', 'admin'),
(1247, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-03-31 10:13:19', '2026-03-31 10:13:19', 'login'),
(1248, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-03-31 10:13:25', '2026-03-31 10:13:25', 'dashboard'),
(1249, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-03-31 10:13:29', '2026-03-31 10:13:29', 'admin'),
(1250, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed the users index page', 'admin/users', '{}', '{}', '', '2026-03-31 10:13:38', '2026-03-31 10:13:38', 'users'),
(1251, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed the users create page', 'users', '{}', '{}', '', '2026-03-31 10:16:11', '2026-03-31 10:16:11', 'users'),
(1252, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-04-01 02:13:11', '2026-04-01 02:13:11', 'login'),
(1253, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-04-01 02:13:13', '2026-04-01 02:13:13', 'dashboard'),
(1254, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-01 02:13:22', '2026-04-01 02:13:22', 'admin'),
(1255, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-04-01 02:13:25', '2026-04-01 02:13:25', 'admin'),
(1256, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-04-01 02:14:24', '2026-04-01 02:14:24', 'admin'),
(1257, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-04-01 02:15:14', '2026-04-01 02:15:14', 'admin'),
(1258, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-04-01 02:18:50', '2026-04-01 02:18:50', 'admin'),
(1259, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-04-01 02:21:12', '2026-04-01 02:21:12', 'admin'),
(1260, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-04-01 02:23:05', '2026-04-01 02:23:05', 'admin'),
(1261, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-04-01 02:23:31', '2026-04-01 02:23:31', 'admin'),
(1262, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-04-01 02:23:37', '2026-04-01 02:23:37', 'admin'),
(1263, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-04-01 02:24:37', '2026-04-01 02:24:37', 'admin'),
(1264, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-04-01 02:24:58', '2026-04-01 02:24:58', 'admin'),
(1265, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-01 02:30:46', '2026-04-01 02:30:46', 'admin'),
(1266, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-04-01 02:30:46', '2026-04-01 02:30:46', 'admin'),
(1267, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-04-01 02:31:09', '2026-04-01 02:31:09', 'admin'),
(1268, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-01 02:32:07', '2026-04-01 02:32:07', 'admin'),
(1269, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-01 02:32:31', '2026-04-01 02:32:31', 'admin'),
(1270, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-01 02:32:47', '2026-04-01 02:32:47', 'admin'),
(1271, '1', '127.0.0.1', 'Unknown', '8', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/8', '{}', '{}', '', '2026-04-01 02:32:48', '2026-04-01 02:32:48', 'admin'),
(1272, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-01 02:33:06', '2026-04-01 02:33:06', 'admin'),
(1273, '1', '127.0.0.1', 'Unknown', '8', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/8', '{}', '{}', '', '2026-04-01 02:33:07', '2026-04-01 02:33:07', 'admin'),
(1274, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-01 02:33:15', '2026-04-01 02:33:15', 'admin'),
(1275, '1', '127.0.0.1', 'Unknown', '8', 'show', NULL, 'User accessed admin/ecde-schools/{ecde_school}', 'admin/ecde-schools/8', '{}', '{}', '', '2026-04-01 02:33:16', '2026-04-01 02:33:16', 'admin'),
(1276, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-01 02:33:22', '2026-04-01 02:33:22', 'admin'),
(1277, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-01 02:34:08', '2026-04-01 02:34:08', 'admin'),
(1278, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-01 02:34:16', '2026-04-01 02:34:16', 'admin'),
(1279, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-01 02:34:28', '2026-04-01 02:34:28', 'admin'),
(1280, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-01 02:34:48', '2026-04-01 02:34:48', 'admin'),
(1281, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-01 02:34:56', '2026-04-01 02:34:56', 'admin'),
(1282, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-01 02:38:01', '2026-04-01 02:38:01', 'admin'),
(1283, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-01 02:38:15', '2026-04-01 02:38:15', 'admin'),
(1284, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-01 02:38:23', '2026-04-01 02:38:23', 'admin'),
(1285, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-01 02:38:33', '2026-04-01 02:38:33', 'admin'),
(1286, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-01 02:39:10', '2026-04-01 02:39:10', 'admin'),
(1287, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-01 02:39:42', '2026-04-01 02:39:42', 'admin'),
(1288, '1', '127.0.0.1', 'Unknown', '14', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/14', '{}', '{}', '', '2026-04-01 02:39:51', '2026-04-01 02:39:51', 'admin'),
(1289, '1', '127.0.0.1', 'Unknown', '13', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/13', '{}', '{}', '', '2026-04-01 02:39:56', '2026-04-01 02:39:56', 'admin'),
(1290, '1', '127.0.0.1', 'Unknown', '13', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/13', '{}', '{}', '', '2026-04-01 02:41:14', '2026-04-01 02:41:14', 'admin'),
(1291, '1', '127.0.0.1', 'Unknown', '13', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/13', '{}', '{}', '', '2026-04-01 02:41:30', '2026-04-01 02:41:30', 'admin'),
(1292, '1', '127.0.0.1', 'Unknown', '13', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/13', '{}', '{}', '', '2026-04-01 02:41:45', '2026-04-01 02:41:45', 'admin'),
(1293, '1', '127.0.0.1', 'Unknown', '13', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/13', '{}', '{}', '', '2026-04-01 02:41:53', '2026-04-01 02:41:53', 'admin'),
(1294, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-parents/create', 'admin/learner-parents/create', '{}', '{}', '', '2026-04-01 02:41:56', '2026-04-01 02:41:56', 'admin'),
(1295, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-parents/create', 'admin/learner-parents/create', '{}', '{}', '', '2026-04-01 02:42:06', '2026-04-01 02:42:06', 'admin'),
(1296, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-parents/create', 'admin/learner-parents/create', '{}', '{}', '', '2026-04-01 02:43:19', '2026-04-01 02:43:19', 'admin'),
(1297, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-parents/create', 'admin/learner-parents/create', '{}', '{}', '', '2026-04-01 02:44:55', '2026-04-01 02:44:55', 'admin'),
(1298, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-parents/create', 'admin/learner-parents/create', '{}', '{}', '', '2026-04-01 02:45:27', '2026-04-01 02:45:27', 'admin'),
(1299, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-parents/create', 'admin/learner-parents/create', '{}', '{}', '', '2026-04-01 02:45:44', '2026-04-01 02:45:44', 'admin'),
(1300, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-parents/create', 'admin/learner-parents/create', '{}', '{}', '', '2026-04-01 02:46:28', '2026-04-01 02:46:28', 'admin'),
(1301, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-parents/create', 'admin/learner-parents/create', '{}', '{}', '', '2026-04-01 02:47:11', '2026-04-01 02:47:11', 'admin'),
(1302, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-parents', 'admin/learner-parents', '{}', '{}', '', '2026-04-01 02:49:20', '2026-04-01 02:49:20', 'admin'),
(1303, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-parents', 'admin/learner-parents', '{}', '{}', '', '2026-04-01 02:50:15', '2026-04-01 02:50:15', 'admin'),
(1304, '1', '127.0.0.1', 'Unknown', '13', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/13', '{}', '{}', '', '2026-04-01 02:50:15', '2026-04-01 02:50:15', 'admin'),
(1305, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-parents/create', 'admin/learner-parents/create', '{}', '{}', '', '2026-04-01 02:50:21', '2026-04-01 02:50:21', 'admin'),
(1306, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-parents', 'admin/learner-parents', '{}', '{}', '', '2026-04-01 02:50:41', '2026-04-01 02:50:41', 'admin'),
(1307, '1', '127.0.0.1', 'Unknown', '13', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/13', '{}', '{}', '', '2026-04-01 02:50:41', '2026-04-01 02:50:41', 'admin'),
(1308, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:51:12', '2026-04-01 02:51:12', 'admin'),
(1309, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:51:39', '2026-04-01 02:51:39', 'admin'),
(1310, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:51:50', '2026-04-01 02:51:50', 'admin'),
(1311, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:54:46', '2026-04-01 02:54:46', 'admin'),
(1312, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:55:03', '2026-04-01 02:55:03', 'admin');
INSERT INTO `system_activity_logs` (`id`, `causer_id`, `ip_address`, `network`, `subject_id`, `action`, `event`, `description`, `asset_url`, `current_object`, `new_object`, `type`, `created_at`, `updated_at`, `model_table_name`) VALUES
(1313, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:55:31', '2026-04-01 02:55:31', 'admin'),
(1314, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:55:44', '2026-04-01 02:55:44', 'admin'),
(1315, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:55:52', '2026-04-01 02:55:52', 'admin'),
(1316, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:56:03', '2026-04-01 02:56:03', 'admin'),
(1317, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:56:21', '2026-04-01 02:56:21', 'admin'),
(1318, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:57:10', '2026-04-01 02:57:10', 'admin'),
(1319, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:57:29', '2026-04-01 02:57:29', 'admin'),
(1320, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:58:20', '2026-04-01 02:58:20', 'admin'),
(1321, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:58:43', '2026-04-01 02:58:43', 'admin'),
(1322, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:58:58', '2026-04-01 02:58:58', 'admin'),
(1323, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:59:06', '2026-04-01 02:59:06', 'admin'),
(1324, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 02:59:22', '2026-04-01 02:59:22', 'admin'),
(1325, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-01 02:59:48', '2026-04-01 02:59:48', 'admin'),
(1326, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-01 02:59:51', '2026-04-01 02:59:51', 'admin'),
(1327, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-04-01 03:00:48', '2026-04-01 03:00:48', 'admin'),
(1328, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-04-01 03:02:49', '2026-04-01 03:02:49', 'home'),
(1329, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-04-01 03:02:51', '2026-04-01 03:02:51', 'cms'),
(1330, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-04-01 06:53:59', '2026-04-01 06:53:59', 'login'),
(1331, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-04-01 06:54:05', '2026-04-01 06:54:05', 'dashboard'),
(1332, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-04-01 06:54:40', '2026-04-01 06:54:40', 'dashboard'),
(1333, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-01 06:54:52', '2026-04-01 06:54:52', 'admin'),
(1334, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-04-01 06:54:57', '2026-04-01 06:54:57', 'admin'),
(1335, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learners/create', 'admin/learners/create', '{}', '{}', '', '2026-04-01 06:55:08', '2026-04-01 06:55:08', 'admin'),
(1336, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 06:56:53', '2026-04-01 06:56:53', 'admin'),
(1337, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-01 06:57:01', '2026-04-01 06:57:01', 'admin'),
(1338, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-01 06:57:54', '2026-04-01 06:57:54', 'admin'),
(1339, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-01 06:58:00', '2026-04-01 06:58:00', 'admin'),
(1340, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-04-01 07:00:35', '2026-04-01 07:00:35', 'admin'),
(1341, '1', '127.0.0.1', 'Unknown', '21', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/21', '{}', '{}', '', '2026-04-01 07:00:39', '2026-04-01 07:00:39', 'admin'),
(1342, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/teachers/create', 'admin/teachers/create', '{}', '{}', '', '2026-04-01 07:00:56', '2026-04-01 07:00:56', 'admin'),
(1343, '1', '127.0.0.1', 'Unknown', '20', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/20', '{}', '{}', '', '2026-04-01 07:01:15', '2026-04-01 07:01:15', 'admin'),
(1344, '1', '127.0.0.1', 'Unknown', '19', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/19', '{}', '{}', '', '2026-04-01 07:01:21', '2026-04-01 07:01:21', 'admin'),
(1345, '1', '127.0.0.1', 'Unknown', '1', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-04-01 07:01:35', '2026-04-01 07:01:35', 'admin'),
(1346, '1', '127.0.0.1', 'Unknown', '1', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-04-01 07:02:34', '2026-04-01 07:02:34', 'admin'),
(1347, '1', '127.0.0.1', 'Unknown', '1', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/1', '{}', '{}', '', '2026-04-01 07:02:53', '2026-04-01 07:02:53', 'admin'),
(1348, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/teachers', 'admin/teachers', '{}', '{}', '', '2026-04-01 07:03:38', '2026-04-01 07:03:38', 'admin'),
(1349, '1', '127.0.0.1', 'Unknown', '21', 'show', NULL, 'User accessed admin/teachers/{teacher}', 'admin/teachers/21', '{}', '{}', '', '2026-04-01 07:03:42', '2026-04-01 07:03:42', 'admin'),
(1350, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-04-15 06:44:03', '2026-04-15 06:44:03', 'login'),
(1351, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-04-15 06:44:05', '2026-04-15 06:44:05', 'dashboard'),
(1352, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-15 06:44:11', '2026-04-15 06:44:11', 'admin'),
(1353, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 06:44:14', '2026-04-15 06:44:14', 'admin'),
(1354, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 06:48:04', '2026-04-15 06:48:04', 'admin'),
(1355, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 06:49:00', '2026-04-15 06:49:00', 'admin'),
(1356, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 06:49:07', '2026-04-15 06:49:07', 'admin'),
(1357, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 06:49:07', '2026-04-15 06:49:07', 'admin'),
(1358, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 06:49:16', '2026-04-15 06:49:16', 'admin'),
(1359, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 06:49:21', '2026-04-15 06:49:21', 'admin'),
(1360, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 06:49:22', '2026-04-15 06:49:22', 'admin'),
(1361, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 06:49:30', '2026-04-15 06:49:30', 'admin'),
(1362, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 06:49:30', '2026-04-15 06:49:30', 'admin'),
(1363, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 06:49:38', '2026-04-15 06:49:38', 'admin'),
(1364, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 06:49:38', '2026-04-15 06:49:38', 'admin'),
(1365, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-15 06:49:43', '2026-04-15 06:49:43', 'admin'),
(1366, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 06:49:44', '2026-04-15 06:49:44', 'admin'),
(1367, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-15 06:49:54', '2026-04-15 06:49:54', 'admin'),
(1368, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 06:49:56', '2026-04-15 06:49:56', 'admin'),
(1369, '1', '127.0.0.1', 'Unknown', '15', 'edit', NULL, 'User accessed admin/learners/{learner}/edit', 'admin/learners/15/edit', '{}', '{}', '', '2026-04-15 06:50:02', '2026-04-15 06:50:02', 'admin'),
(1370, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 06:50:07', '2026-04-15 06:50:07', 'admin'),
(1371, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 06:50:23', '2026-04-15 06:50:23', 'admin'),
(1372, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 06:50:24', '2026-04-15 06:50:24', 'admin'),
(1373, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 06:50:32', '2026-04-15 06:50:32', 'admin'),
(1374, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 06:50:33', '2026-04-15 06:50:33', 'admin'),
(1375, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-15 06:50:35', '2026-04-15 06:50:35', 'admin'),
(1376, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 06:50:39', '2026-04-15 06:50:39', 'admin'),
(1377, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 06:50:56', '2026-04-15 06:50:56', 'admin'),
(1378, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 06:58:18', '2026-04-15 06:58:18', 'admin'),
(1379, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 06:58:33', '2026-04-15 06:58:33', 'admin'),
(1380, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:01:37', '2026-04-15 07:01:37', 'admin'),
(1381, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:03:49', '2026-04-15 07:03:49', 'admin'),
(1382, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:05:46', '2026-04-15 07:05:46', 'admin'),
(1383, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:06:03', '2026-04-15 07:06:03', 'admin'),
(1384, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:06:15', '2026-04-15 07:06:15', 'admin'),
(1385, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:07:01', '2026-04-15 07:07:01', 'admin'),
(1386, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:09:29', '2026-04-15 07:09:29', 'admin'),
(1387, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:09:49', '2026-04-15 07:09:49', 'admin'),
(1388, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:09:56', '2026-04-15 07:09:56', 'admin'),
(1389, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:10:01', '2026-04-15 07:10:01', 'admin'),
(1390, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:10:23', '2026-04-15 07:10:23', 'admin'),
(1391, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:10:28', '2026-04-15 07:10:28', 'admin'),
(1392, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:10:33', '2026-04-15 07:10:33', 'admin'),
(1393, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:10:36', '2026-04-15 07:10:36', 'admin'),
(1394, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-15 07:10:43', '2026-04-15 07:10:43', 'admin'),
(1395, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:10:46', '2026-04-15 07:10:46', 'admin'),
(1396, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:10:53', '2026-04-15 07:10:53', 'admin'),
(1397, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:10:57', '2026-04-15 07:10:57', 'admin'),
(1398, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:11:19', '2026-04-15 07:11:19', 'admin'),
(1399, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:11:23', '2026-04-15 07:11:23', 'admin'),
(1400, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:13:11', '2026-04-15 07:13:11', 'admin'),
(1401, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:13:16', '2026-04-15 07:13:16', 'admin'),
(1402, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:13:20', '2026-04-15 07:13:20', 'admin'),
(1403, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:19:02', '2026-04-15 07:19:02', 'admin'),
(1404, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:19:08', '2026-04-15 07:19:08', 'admin'),
(1405, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:19:11', '2026-04-15 07:19:11', 'admin'),
(1406, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:19:15', '2026-04-15 07:19:15', 'admin'),
(1407, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:19:17', '2026-04-15 07:19:17', 'admin'),
(1408, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:20:12', '2026-04-15 07:20:12', 'admin'),
(1409, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:20:16', '2026-04-15 07:20:16', 'admin'),
(1410, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:22:45', '2026-04-15 07:22:45', 'admin'),
(1411, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:22:56', '2026-04-15 07:22:56', 'admin'),
(1412, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:23:05', '2026-04-15 07:23:05', 'admin'),
(1413, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:23:07', '2026-04-15 07:23:07', 'admin'),
(1414, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:25:01', '2026-04-15 07:25:01', 'admin'),
(1415, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:25:02', '2026-04-15 07:25:02', 'admin'),
(1416, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:25:07', '2026-04-15 07:25:07', 'admin'),
(1417, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:25:11', '2026-04-15 07:25:11', 'admin'),
(1418, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:25:14', '2026-04-15 07:25:14', 'admin'),
(1419, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:26:23', '2026-04-15 07:26:23', 'admin'),
(1420, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:26:25', '2026-04-15 07:26:25', 'admin'),
(1421, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 07:26:59', '2026-04-15 07:26:59', 'admin'),
(1422, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 07:27:06', '2026-04-15 07:27:06', 'admin'),
(1423, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 07:27:25', '2026-04-15 07:27:25', 'admin'),
(1424, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 07:27:26', '2026-04-15 07:27:26', 'admin'),
(1425, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:27:33', '2026-04-15 07:27:33', 'admin'),
(1426, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:27:34', '2026-04-15 07:27:34', 'admin'),
(1427, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:27:48', '2026-04-15 07:27:48', 'admin'),
(1428, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:27:50', '2026-04-15 07:27:50', 'admin'),
(1429, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 07:28:03', '2026-04-15 07:28:03', 'admin'),
(1430, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 07:28:16', '2026-04-15 07:28:16', 'admin'),
(1431, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 07:28:16', '2026-04-15 07:28:16', 'admin'),
(1432, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:28:23', '2026-04-15 07:28:23', 'admin'),
(1433, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:28:24', '2026-04-15 07:28:24', 'admin'),
(1434, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 07:28:33', '2026-04-15 07:28:33', 'admin'),
(1435, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 07:28:40', '2026-04-15 07:28:40', 'admin'),
(1436, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 07:28:41', '2026-04-15 07:28:41', 'admin'),
(1437, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:28:45', '2026-04-15 07:28:45', 'admin'),
(1438, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:28:46', '2026-04-15 07:28:46', 'admin'),
(1439, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 07:30:42', '2026-04-15 07:30:42', 'admin'),
(1440, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 07:30:54', '2026-04-15 07:30:54', 'admin'),
(1441, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:34:01', '2026-04-15 07:34:01', 'admin'),
(1442, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 07:34:03', '2026-04-15 07:34:03', 'admin'),
(1443, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 08:12:10', '2026-04-15 08:12:10', 'admin'),
(1444, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 08:14:52', '2026-04-15 08:14:52', 'admin'),
(1445, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-15 08:14:55', '2026-04-15 08:14:55', 'admin'),
(1446, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:15:08', '2026-04-15 08:15:08', 'admin'),
(1447, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:15:19', '2026-04-15 08:15:19', 'admin'),
(1448, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:15:31', '2026-04-15 08:15:31', 'admin'),
(1449, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:16:49', '2026-04-15 08:16:49', 'admin'),
(1450, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:19:53', '2026-04-15 08:19:53', 'admin'),
(1451, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:20:22', '2026-04-15 08:20:22', 'admin'),
(1452, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:20:32', '2026-04-15 08:20:32', 'admin'),
(1453, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 08:20:38', '2026-04-15 08:20:38', 'admin'),
(1454, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 08:24:02', '2026-04-15 08:24:02', 'admin'),
(1455, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 08:24:33', '2026-04-15 08:24:33', 'admin'),
(1456, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 08:24:52', '2026-04-15 08:24:52', 'admin'),
(1457, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 08:25:33', '2026-04-15 08:25:33', 'admin'),
(1458, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 08:25:38', '2026-04-15 08:25:38', 'admin'),
(1459, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 08:26:15', '2026-04-15 08:26:15', 'admin'),
(1460, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 08:26:40', '2026-04-15 08:26:40', 'admin'),
(1461, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 08:28:42', '2026-04-15 08:28:42', 'admin'),
(1462, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 08:33:58', '2026-04-15 08:33:58', 'admin'),
(1463, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:34:15', '2026-04-15 08:34:15', 'admin'),
(1464, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:34:16', '2026-04-15 08:34:16', 'admin'),
(1465, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:34:46', '2026-04-15 08:34:46', 'admin'),
(1466, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:34:56', '2026-04-15 08:34:56', 'admin'),
(1467, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:35:05', '2026-04-15 08:35:05', 'admin'),
(1468, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:35:51', '2026-04-15 08:35:51', 'admin'),
(1469, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:36:24', '2026-04-15 08:36:24', 'admin'),
(1470, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 08:36:27', '2026-04-15 08:36:27', 'admin'),
(1471, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:36:43', '2026-04-15 08:36:43', 'admin'),
(1472, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:36:43', '2026-04-15 08:36:43', 'admin'),
(1473, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 08:36:47', '2026-04-15 08:36:47', 'admin'),
(1474, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:37:10', '2026-04-15 08:37:10', 'admin'),
(1475, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:37:11', '2026-04-15 08:37:11', 'admin'),
(1476, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:37:44', '2026-04-15 08:37:44', 'admin'),
(1477, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:41:57', '2026-04-15 08:41:57', 'admin'),
(1478, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:42:16', '2026-04-15 08:42:16', 'admin'),
(1479, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:42:37', '2026-04-15 08:42:37', 'admin'),
(1480, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:42:57', '2026-04-15 08:42:57', 'admin'),
(1481, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 08:43:01', '2026-04-15 08:43:01', 'admin'),
(1482, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:43:39', '2026-04-15 08:43:39', 'admin'),
(1483, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:43:40', '2026-04-15 08:43:40', 'admin'),
(1484, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-15 08:43:45', '2026-04-15 08:43:45', 'admin'),
(1485, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:43:48', '2026-04-15 08:43:48', 'admin'),
(1486, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 08:43:59', '2026-04-15 08:43:59', 'admin'),
(1487, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:44:27', '2026-04-15 08:44:27', 'admin'),
(1488, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 08:44:28', '2026-04-15 08:44:28', 'admin'),
(1489, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:44:33', '2026-04-15 08:44:33', 'admin'),
(1490, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:48:20', '2026-04-15 08:48:20', 'admin'),
(1491, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:48:28', '2026-04-15 08:48:28', 'admin'),
(1492, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-15 08:48:30', '2026-04-15 08:48:30', 'admin'),
(1493, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:48:48', '2026-04-15 08:48:48', 'admin'),
(1494, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-15 08:48:49', '2026-04-15 08:48:49', 'admin'),
(1495, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:49:48', '2026-04-15 08:49:48', 'admin'),
(1496, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-15 08:49:51', '2026-04-15 08:49:51', 'admin'),
(1497, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:50:18', '2026-04-15 08:50:18', 'admin'),
(1498, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-15 08:50:20', '2026-04-15 08:50:20', 'admin'),
(1499, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:50:57', '2026-04-15 08:50:57', 'admin'),
(1500, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-15 08:50:58', '2026-04-15 08:50:58', 'admin'),
(1501, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:51:49', '2026-04-15 08:51:49', 'admin'),
(1502, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-15 08:51:50', '2026-04-15 08:51:50', 'admin'),
(1503, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:53:09', '2026-04-15 08:53:09', 'admin'),
(1504, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-15 08:53:11', '2026-04-15 08:53:11', 'admin'),
(1505, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:53:16', '2026-04-15 08:53:16', 'admin'),
(1506, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-15 08:53:18', '2026-04-15 08:53:18', 'admin'),
(1507, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:53:39', '2026-04-15 08:53:39', 'admin'),
(1508, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-15 08:53:40', '2026-04-15 08:53:40', 'admin'),
(1509, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 08:54:07', '2026-04-15 08:54:07', 'admin'),
(1510, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-15 08:54:08', '2026-04-15 08:54:08', 'admin'),
(1511, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 10:34:00', '2026-04-15 10:34:00', 'admin'),
(1512, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 10:34:09', '2026-04-15 10:34:09', 'admin'),
(1513, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 10:34:13', '2026-04-15 10:34:13', 'admin'),
(1514, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 10:35:03', '2026-04-15 10:35:03', 'admin'),
(1515, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 10:35:34', '2026-04-15 10:35:34', 'admin'),
(1516, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 10:36:05', '2026-04-15 10:36:05', 'admin'),
(1517, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 10:36:17', '2026-04-15 10:36:17', 'admin'),
(1518, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 10:36:17', '2026-04-15 10:36:17', 'admin'),
(1519, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 10:36:49', '2026-04-15 10:36:49', 'admin'),
(1520, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 10:40:33', '2026-04-15 10:40:33', 'admin'),
(1521, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 10:40:35', '2026-04-15 10:40:35', 'admin'),
(1522, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 10:40:54', '2026-04-15 10:40:54', 'admin'),
(1523, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 10:40:54', '2026-04-15 10:40:54', 'admin'),
(1524, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 10:41:05', '2026-04-15 10:41:05', 'admin'),
(1525, '1', '127.0.0.1', 'Unknown', '1', 'destroy', NULL, 'User accessed admin/non-attendance-days/{non_attendance_day}', 'admin/non-attendance-days/1', '{}', '{}', '', '2026-04-15 10:41:19', '2026-04-15 10:41:19', 'admin'),
(1526, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 10:41:54', '2026-04-15 10:41:54', 'admin'),
(1527, '1', '127.0.0.1', 'Unknown', '2', 'destroy', NULL, 'User accessed admin/non-attendance-days/{non_attendance_day}', 'admin/non-attendance-days/2', '{}', '{}', '', '2026-04-15 10:41:57', '2026-04-15 10:41:57', 'admin'),
(1528, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 10:41:58', '2026-04-15 10:41:58', 'admin'),
(1529, '1', '127.0.0.1', 'Unknown', '3', 'edit', NULL, 'User accessed admin/non-attendance-days/{non_attendance_day}/edit', 'admin/non-attendance-days/3/edit', '{}', '{}', '', '2026-04-15 10:42:04', '2026-04-15 10:42:04', 'admin'),
(1530, '1', '127.0.0.1', 'Unknown', '3', 'edit', NULL, 'User accessed admin/non-attendance-days/{non_attendance_day}/edit', 'admin/non-attendance-days/3/edit', '{}', '{}', '', '2026-04-15 10:44:10', '2026-04-15 10:44:10', 'admin'),
(1531, '1', '127.0.0.1', 'Unknown', '3', 'edit', NULL, 'User accessed admin/non-attendance-days/{non_attendance_day}/edit', 'admin/non-attendance-days/3/edit', '{}', '{}', '', '2026-04-15 10:44:23', '2026-04-15 10:44:23', 'admin'),
(1532, '1', '127.0.0.1', 'Unknown', '12', 'edit', NULL, 'User accessed admin/non-attendance-days/{non_attendance_day}/edit', 'admin/non-attendance-days/12/edit', '{}', '{}', '', '2026-04-15 10:44:53', '2026-04-15 10:44:53', 'admin'),
(1533, '1', '127.0.0.1', 'Unknown', '12', 'edit', NULL, 'User accessed admin/non-attendance-days/{non_attendance_day}/edit', 'admin/non-attendance-days/12/edit', '{}', '{}', '', '2026-04-15 10:45:03', '2026-04-15 10:45:03', 'admin'),
(1534, '1', '127.0.0.1', 'Unknown', '12', 'edit', NULL, 'User accessed admin/non-attendance-days/{non_attendance_day}/edit', 'admin/non-attendance-days/12/edit', '{}', '{}', '', '2026-04-15 10:45:19', '2026-04-15 10:45:19', 'admin'),
(1535, '1', '127.0.0.1', 'Unknown', '12', 'update', NULL, 'User accessed admin/non-attendance-days/{non_attendance_day}', 'admin/non-attendance-days/12', '{}', '{}', '', '2026-04-15 10:46:06', '2026-04-15 10:46:06', 'admin'),
(1536, '1', '127.0.0.1', 'Unknown', '12', 'update', NULL, 'User accessed admin/non-attendance-days/{non_attendance_day}', 'admin/non-attendance-days/12', '{}', '{}', '', '2026-04-15 10:46:25', '2026-04-15 10:46:25', 'admin'),
(1537, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 10:46:26', '2026-04-15 10:46:26', 'admin'),
(1538, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 10:46:43', '2026-04-15 10:46:43', 'admin'),
(1539, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-15 10:47:10', '2026-04-15 10:47:10', 'admin'),
(1540, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-15 10:47:10', '2026-04-15 10:47:10', 'admin'),
(1541, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-15 10:47:52', '2026-04-15 10:47:52', 'admin'),
(1542, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 10:47:53', '2026-04-15 10:47:53', 'admin'),
(1543, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-15 10:48:05', '2026-04-15 10:48:05', 'admin'),
(1544, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-04-17 04:58:20', '2026-04-17 04:58:20', 'login'),
(1545, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-04-17 04:58:25', '2026-04-17 04:58:25', 'dashboard'),
(1546, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-04-17 04:58:48', '2026-04-17 04:58:48', 'dashboard'),
(1547, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-17 04:59:14', '2026-04-17 04:59:14', 'admin'),
(1548, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-17 04:59:16', '2026-04-17 04:59:16', 'admin'),
(1549, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-17 04:59:47', '2026-04-17 04:59:47', 'admin'),
(1550, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-17 04:59:49', '2026-04-17 04:59:49', 'admin'),
(1551, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-17 04:59:51', '2026-04-17 04:59:51', 'admin'),
(1552, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-17 04:59:53', '2026-04-17 04:59:53', 'admin'),
(1553, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-17 05:00:42', '2026-04-17 05:00:42', 'admin'),
(1554, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-17 05:00:44', '2026-04-17 05:00:44', 'admin'),
(1555, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-17 05:00:48', '2026-04-17 05:00:48', 'admin'),
(1556, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-17 05:00:50', '2026-04-17 05:00:50', 'admin'),
(1557, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-17 05:02:44', '2026-04-17 05:02:44', 'admin'),
(1558, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-17 05:02:46', '2026-04-17 05:02:46', 'admin'),
(1559, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-17 05:03:00', '2026-04-17 05:03:00', 'admin'),
(1560, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-17 05:03:02', '2026-04-17 05:03:02', 'admin'),
(1561, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-17 05:03:09', '2026-04-17 05:03:09', 'admin'),
(1562, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-17 05:03:11', '2026-04-17 05:03:11', 'admin');
INSERT INTO `system_activity_logs` (`id`, `causer_id`, `ip_address`, `network`, `subject_id`, `action`, `event`, `description`, `asset_url`, `current_object`, `new_object`, `type`, `created_at`, `updated_at`, `model_table_name`) VALUES
(1563, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-17 05:03:50', '2026-04-17 05:03:50', 'admin'),
(1564, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-17 05:03:51', '2026-04-17 05:03:51', 'admin'),
(1565, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-17 05:03:56', '2026-04-17 05:03:56', 'admin'),
(1566, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-17 05:03:57', '2026-04-17 05:03:57', 'admin'),
(1567, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-17 05:04:05', '2026-04-17 05:04:05', 'admin'),
(1568, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-17 05:04:07', '2026-04-17 05:04:07', 'admin'),
(1569, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-17 05:59:47', '2026-04-17 05:59:47', 'admin'),
(1570, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-17 05:59:49', '2026-04-17 05:59:49', 'admin'),
(1571, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-17 05:59:57', '2026-04-17 05:59:57', 'admin'),
(1572, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-17 05:59:58', '2026-04-17 05:59:58', 'admin'),
(1573, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed /', '', '{}', '{}', '', '2026-04-17 06:00:06', '2026-04-17 06:00:06', 'home'),
(1574, '1', '127.0.0.1', 'Unknown', '0', 'schools', NULL, 'User accessed ecde-schools', 'ecde-schools', '{}', '{}', '', '2026-04-17 06:00:09', '2026-04-17 06:00:09', 'cms'),
(1575, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-04-17 06:02:33', '2026-04-17 06:02:33', 'dashboard'),
(1576, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-04-20 11:41:12', '2026-04-20 11:41:12', 'login'),
(1577, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-04-20 11:41:16', '2026-04-20 11:41:16', 'dashboard'),
(1578, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-20 11:41:30', '2026-04-20 11:41:30', 'admin'),
(1579, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-20 11:41:32', '2026-04-20 11:41:32', 'admin'),
(1580, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-20 11:41:59', '2026-04-20 11:41:59', 'admin'),
(1581, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-20 11:42:02', '2026-04-20 11:42:02', 'admin'),
(1582, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-20 11:42:02', '2026-04-20 11:42:02', 'admin'),
(1583, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-20 11:42:16', '2026-04-20 11:42:16', 'admin'),
(1584, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-20 11:42:16', '2026-04-20 11:42:16', 'admin'),
(1585, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-20 11:42:20', '2026-04-20 11:42:20', 'admin'),
(1586, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-20 11:42:22', '2026-04-20 11:42:22', 'admin'),
(1587, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-20 11:48:02', '2026-04-20 11:48:02', 'admin'),
(1588, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-20 11:48:13', '2026-04-20 11:48:13', 'admin'),
(1589, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-20 11:48:45', '2026-04-20 11:48:45', 'admin'),
(1590, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-20 11:48:57', '2026-04-20 11:48:57', 'admin'),
(1591, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-20 11:49:14', '2026-04-20 11:49:14', 'admin'),
(1592, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-20 11:49:15', '2026-04-20 11:49:15', 'admin'),
(1593, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-20 11:49:21', '2026-04-20 11:49:21', 'admin'),
(1594, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-20 11:49:23', '2026-04-20 11:49:23', 'admin'),
(1595, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-20 11:50:32', '2026-04-20 11:50:32', 'admin'),
(1596, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-20 11:50:37', '2026-04-20 11:50:37', 'admin'),
(1597, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-20 11:50:38', '2026-04-20 11:50:38', 'admin'),
(1598, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-20 11:50:43', '2026-04-20 11:50:43', 'admin'),
(1599, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-20 11:50:44', '2026-04-20 11:50:44', 'admin'),
(1600, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-20 11:50:56', '2026-04-20 11:50:56', 'admin'),
(1601, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-20 11:50:57', '2026-04-20 11:50:57', 'admin'),
(1602, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-20 11:51:03', '2026-04-20 11:51:03', 'admin'),
(1603, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-20 11:51:05', '2026-04-20 11:51:05', 'admin'),
(1604, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-20 11:51:19', '2026-04-20 11:51:19', 'admin'),
(1605, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-20 11:51:20', '2026-04-20 11:51:20', 'admin'),
(1606, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-20 11:54:07', '2026-04-20 11:54:07', 'admin'),
(1607, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-20 11:54:09', '2026-04-20 11:54:09', 'admin'),
(1608, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-20 11:54:26', '2026-04-20 11:54:26', 'admin'),
(1609, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-20 11:54:26', '2026-04-20 11:54:26', 'admin'),
(1610, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-20 11:54:27', '2026-04-20 11:54:27', 'admin'),
(1611, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/non-attendance-days/create', 'admin/non-attendance-days/create', '{}', '{}', '', '2026-04-20 11:54:30', '2026-04-20 11:54:30', 'admin'),
(1612, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-20 11:54:45', '2026-04-20 11:54:45', 'admin'),
(1613, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-20 11:54:45', '2026-04-20 11:54:45', 'admin'),
(1614, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-20 11:54:58', '2026-04-20 11:54:58', 'admin'),
(1615, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-20 11:54:59', '2026-04-20 11:54:59', 'admin'),
(1616, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/non-attendance-days', 'admin/non-attendance-days', '{}', '{}', '', '2026-04-20 11:55:08', '2026-04-20 11:55:08', 'admin'),
(1617, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-20 11:55:14', '2026-04-20 11:55:14', 'admin'),
(1618, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-20 11:55:15', '2026-04-20 11:55:15', 'admin'),
(1619, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-20 11:56:06', '2026-04-20 11:56:06', 'admin'),
(1620, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-20 11:56:08', '2026-04-20 11:56:08', 'admin'),
(1621, '1', '127.0.0.1', 'Unknown', '0', 'create', NULL, 'User accessed admin/learner-attendances/create', 'admin/learner-attendances/create', '{}', '{}', '', '2026-04-20 11:57:39', '2026-04-20 11:57:39', 'admin'),
(1622, '1', '127.0.0.1', 'Unknown', '0', 'blockedDates', NULL, 'User accessed admin/non-attendance-days.json', 'admin/non-attendance-days.json', '{}', '{}', '', '2026-04-20 11:57:41', '2026-04-20 11:57:41', 'admin'),
(1623, '1', '127.0.0.1', 'Unknown', '0', 'store', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-20 11:58:46', '2026-04-20 11:58:46', 'admin'),
(1624, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learner-attendances', 'admin/learner-attendances', '{}', '{}', '', '2026-04-20 11:58:47', '2026-04-20 11:58:47', 'admin'),
(1625, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed admin/learners', 'admin/learners', '{}', '{}', '', '2026-04-20 11:58:58', '2026-04-20 11:58:58', 'admin'),
(1626, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-20 11:59:01', '2026-04-20 11:59:01', 'admin'),
(1627, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-20 11:59:03', '2026-04-20 11:59:03', 'admin'),
(1628, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-20 12:00:07', '2026-04-20 12:00:07', 'admin'),
(1629, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-20 12:00:08', '2026-04-20 12:00:08', 'admin'),
(1630, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-20 12:00:11', '2026-04-20 12:00:11', 'admin'),
(1631, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-20 12:00:13', '2026-04-20 12:00:13', 'admin'),
(1632, '1', '127.0.0.1', 'Unknown', '15', 'show', NULL, 'User accessed admin/learners/{learner}', 'admin/learners/15', '{}', '{}', '', '2026-04-20 12:00:25', '2026-04-20 12:00:25', 'admin'),
(1633, '1', '127.0.0.1', 'Unknown', '0', 'authenticate', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-04-22 03:16:46', '2026-04-22 03:16:46', 'login'),
(1634, '1', '127.0.0.1', 'Unknown', '0', 'index', NULL, 'User accessed dashboard', 'dashboard', '{}', '{}', '', '2026-04-22 03:16:51', '2026-04-22 03:16:51', 'dashboard'),
(1635, '1', '127.0.0.1', 'Unknown', '0', 'showLoginForm', NULL, 'User accessed login', 'login', '{}', '{}', '', '2026-04-22 03:34:09', '2026-04-22 03:34:09', 'login');

-- --------------------------------------------------------

--
-- Table structure for table `s_m_s`
--

CREATE TABLE `s_m_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_sent` varchar(255) DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `s_m_s`
--

INSERT INTO `s_m_s` (`id`, `phone_number`, `message`, `created_by`, `status`, `date_sent`, `cost`, `created_at`, `updated_at`) VALUES
(1, '254798985851', 'Dear Lois Atkins You have been successfully registered as a teacher at Ecde School Management System. Use your email and mVje7b to login and start using the system.', '1', 'success', '2026-03-17 11:23:26', '2', '2026-03-17 08:23:26', '2026-03-17 08:23:26'),
(2, '254791799466', 'Dear Chava Briggs You have been successfully registered as a teacher at Ecde School Management System. Use your email and kQ9gRY to login and start using the system.', '1', 'success', '2026-03-19 06:47:04', '2', '2026-03-19 03:47:04', '2026-03-19 03:47:04'),
(3, '0', 'Dear Darius, your Laikipia ECDE  account has been created. Username: vacifukix@mailinator.com. One-Time Password: knKf0Z. Login  and change your password immediately.', '1', 'failed', '2026-03-19 11:49:24', '2', '2026-03-19 08:49:24', '2026-03-19 08:49:24'),
(4, '0', 'Dear Zachary, your Laikipia ECDE  account has been created. Username: cowabaq@mailinator.com. One-Time Password: 0J6M87. Login  and change your password immediately.', '1', 'failed', '2026-03-19 11:49:44', '2', '2026-03-19 08:49:44', '2026-03-19 08:49:44'),
(5, '254798985851', 'Dear Richard Blair You have been successfully registered as a cordinator at Ecde School Management System. Use your email and BvzNjU to login and start using the system.', '1', 'success', '2026-03-19 12:14:52', '2', '2026-03-19 09:14:52', '2026-03-19 09:14:52'),
(6, '0', 'Dear Ali, your Laikipia ECDE  account has been created. Username: xixacit@mailinator.com. One-Time Password: sSokMX. Login  and change your password immediately.', '1', 'failed', '2026-03-19 12:50:18', '2', '2026-03-19 09:50:18', '2026-03-19 09:50:18'),
(7, '0', 'Dear Aiko Crawford You have been successfully registered as a teacher at Ecde School Management System. Use your email and Q62r9m to login and start using the system.', '1', 'failed', '2026-03-23 10:36:22', '2', '2026-03-23 07:36:22', '2026-03-23 07:36:22'),
(8, '0', 'Dear Joshua Hobbs You have been successfully registered as a teacher at Ecde School Management System. Use your email and fvvR5a to login and start using the system.', '1', 'failed', '2026-03-23 10:38:08', '2', '2026-03-23 07:38:08', '2026-03-23 07:38:08'),
(9, '254791799466', 'Dear JOHN KATUI You have been successfully registered as a cordinator at Ecde School Management System. Use your email and GYzwR5 to login and start using the system.', '1', 'success', '2026-03-24 13:09:46', '2', '2026-03-24 10:09:46', '2026-03-24 10:09:46'),
(10, '254798985851', 'Dear Emmanuel Chesire You have been successfully registered as a teacher at Ecde School Management System. Use your email and lxBsDe to login and start using the system.', '1', 'success', '2026-03-24 13:37:52', '2', '2026-03-24 10:37:52', '2026-03-24 10:37:52'),
(11, '0', 'Dear Cruz Thompson You have been successfully registered as a teacher at Ecde School Management System. Use your email and U5syiz to login and start using the system.', '1', 'failed', '2026-03-24 13:47:00', '2', '2026-03-24 10:47:00', '2026-03-24 10:47:00'),
(12, '0', 'Dear Hector Hall You have been successfully registered as a teacher at Ecde School Management System. Use your email and FskiJl to login and start using the system.', '1', 'failed', '2026-03-24 13:49:01', '2', '2026-03-24 10:49:01', '2026-03-24 10:49:01'),
(13, '0', 'Dear Cruz Duncan You have been successfully registered as a teacher at Ecde School Management System. Use your email and nHFDMs to login and start using the system.', '1', 'failed', '2026-03-24 13:49:25', '2', '2026-03-24 10:49:25', '2026-03-24 10:49:25'),
(14, '0', 'Dear Quynn Chang You have been successfully registered as a teacher at Ecde School Management System. Use your email and c40ToX to login and start using the system.', '1', 'failed', '2026-03-29 09:44:33', '2', '2026-03-29 06:44:33', '2026-03-29 06:44:33'),
(15, '0', 'Dear Evan Simmons You have been successfully registered as a teacher at Ecde School Management System. Use your email and 4nrHG9 to login and start using the system.', '1', 'failed', '2026-03-31 07:29:30', '2', '2026-03-31 04:29:30', '2026-03-31 04:29:30'),
(16, '0', 'Dear Luke Sharpe You have been successfully registered as a teacher at Ecde School Management System. Use your email and 6SLDPw to login and start using the system.', '1', 'failed', '2026-03-31 07:32:24', '2', '2026-03-31 04:32:24', '2026-03-31 04:32:24'),
(17, '0', 'Dear Halla Kane You have been successfully registered as a teacher at Ecde School Management System. Use your email and vgDNW8 to login and start using the system.', '1', 'failed', '2026-03-31 07:33:02', '2', '2026-03-31 04:33:02', '2026-03-31 04:33:02'),
(18, '0', 'Dear Dominique Middleton You have been successfully registered as a teacher at Ecde School Management System. Use your email and pEYv3T to login and start using the system.', '1', 'failed', '2026-03-31 07:35:24', '2', '2026-03-31 04:35:24', '2026-03-31 04:35:24'),
(19, '0', 'Dear Mikayla Phelps You have been successfully registered as a teacher at Ecde School Management System. Use your email and Xt9xGB to login and start using the system.', '1', 'failed', '2026-03-31 07:35:58', '2', '2026-03-31 04:35:58', '2026-03-31 04:35:58'),
(20, '0', 'Dear Willa Stevenson You have been successfully registered as a teacher at Ecde School Management System. Use your email and FidDk6 to login and start using the system.', '1', 'failed', '2026-03-31 07:36:33', '2', '2026-03-31 04:36:33', '2026-03-31 04:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `kra_pin` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `tsc_number` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `ippd_number` varchar(255) DEFAULT NULL,
  `date_of_first_appointment` date DEFAULT NULL,
  `terms_of_engagement` varchar(255) DEFAULT NULL,
  `pwd_status` varchar(255) DEFAULT NULL,
  `disability_type` varchar(255) DEFAULT NULL,
  `impairment_details` varchar(255) DEFAULT NULL,
  `pwd_number` varchar(255) DEFAULT NULL,
  `ethnicity_id` varchar(255) DEFAULT NULL,
  `job_group_id` varchar(255) DEFAULT NULL,
  `county_id` varchar(255) DEFAULT NULL,
  `subcounty_id` varchar(255) DEFAULT NULL,
  `ward_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contract_expiry` date DEFAULT NULL,
  `retirement_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `id_number`, `kra_pin`, `gender`, `dob`, `tsc_number`, `image_path`, `school_id`, `ippd_number`, `date_of_first_appointment`, `terms_of_engagement`, `pwd_status`, `disability_type`, `impairment_details`, `pwd_number`, `ethnicity_id`, `job_group_id`, `county_id`, `subcounty_id`, `ward_id`, `created_at`, `updated_at`, `contract_expiry`, `retirement_date`) VALUES
(1, 7, '87', 'Est harum alias iust', 'male', '1983-11-01', NULL, NULL, '6', NULL, '1984-02-09', NULL, 'No', NULL, NULL, NULL, NULL, '3', 'ob6SxuRcqU4', NULL, NULL, '2026-03-17 08:15:23', '2026-03-31 04:59:23', NULL, '2043-11-01'),
(7, 24, '12508939', 'A00101NDJK', 'male', '2026-03-01', NULL, NULL, '6', '12345', '2026-03-01', 'Contract', 'Yes', 'Multiple Disabilities', 'n/a', NULL, 'kikuyu', '3', 'ahwTMNAJvrL', 'tyfDsdZ1h3R', '0', '2026-03-24 10:37:50', '2026-03-24 10:37:50', '2026-04-10', NULL),
(8, 25, '980', 'Alias eum dolor aut', 'female', '2024-12-02', NULL, NULL, '6', '818', '2013-07-07', 'Permanent and pensionable', 'No', NULL, NULL, NULL, '124', '4', 'R6f9znhg37c', 'H5RvDZkoDJL', '0', '2026-03-24 10:46:58', '2026-03-24 10:46:58', NULL, NULL),
(9, 26, '57', 'In sint et laboriosa', 'male', '1971-05-21', NULL, NULL, '6', '210', '1974-03-12', 'Contract', 'Yes', 'Other', 'n.a', 'pwd-20302', '7', '3', 'kqJ83J2D72s', 'PGTkGnIAZuy', '0', '2026-03-24 10:48:59', '2026-03-24 10:48:59', NULL, NULL),
(10, 28, '203', 'Nihil tempore simil', 'female', '2011-05-22', NULL, NULL, '6', NULL, '1972-08-20', NULL, 'Yes', NULL, NULL, NULL, '33', NULL, 'ob6SxuRcqU4', NULL, NULL, '2026-03-24 10:49:24', '2026-03-26 08:08:58', '2026-04-03', '2071-05-22'),
(11, 29, '758', 'Illum ut ut ex non', 'male', '2011-11-18', '0111', NULL, '6', NULL, '2008-06-06', NULL, 'Yes', 'Speech & Language Impairment', 'Nam nisi ut aliquam', NULL, 'luhya', 'O', 'vvOK1BxTbet', 'Mk4bMOSMRTB', '0', '2026-03-24 10:51:55', '2026-03-26 04:10:35', NULL, '2071-11-18'),
(12, 30, '24', 'Molestiae laboriosam', 'female', '1966-11-30', NULL, NULL, '6', NULL, '1980-06-13', NULL, 'No', NULL, NULL, NULL, NULL, 'L', 'ahwTMNAJvrL', 'u7Gkh63FYe4', 'UgrVrVp78rA', '2026-03-26 04:09:56', '2026-03-27 06:34:16', NULL, '2026-11-30'),
(13, 31, '417', 'Aspernatur non molli', 'male', '1992-06-23', NULL, NULL, '6', '732', '2012-09-11', 'Permanent and pensionable', 'No', 'Speech & Language Impairment', NULL, NULL, '32', '4', 'XWALbfAPa6n', 'u2zJahNiSP5', 'WmCj9vCPVH2', '2026-03-29 06:44:31', '2026-03-29 06:44:31', NULL, '2052-06-23'),
(14, 32, '534', 'Maiores laudantium', 'male', '1976-03-26', NULL, NULL, '7', '28', '1983-07-16', 'Permanent and pensionable', 'Yes', 'Other', NULL, NULL, '19', '3', 'qKzosKQPl6G', 'aiqi2bz0IMI', 'fxLikKorklY', '2026-03-31 04:29:27', '2026-03-31 04:29:27', NULL, '2036-03-26'),
(15, 33, '212', 'Incididunt earum nat', 'male', '1983-05-13', NULL, NULL, '8', '547', '2020-04-09', 'Permanent and pensionable', 'Yes', 'Visual Impairment', NULL, NULL, '38', '3', 'vvOK1BxTbet', 'dSLnPmNlm8Q', 'RUfWwfXjF1B', '2026-03-31 04:32:22', '2026-03-31 04:32:22', NULL, '2043-05-13'),
(16, 35, '47', 'Illo inventore dolor', 'male', '1976-11-29', NULL, NULL, '7', '294', '1980-03-17', 'Contract', 'No', 'Visual Impairment', 'Adipisicing vero aut', '274', '74', '3', 'N7YETT3A9r1', 'ADMywdLwoRX', 'ByAmsolBen5', '2026-03-31 04:33:00', '2026-03-31 04:33:00', NULL, '2036-11-29'),
(19, 38, '818', 'Sed pariatur Pariat', 'male', '1995-12-31', 'ww', NULL, '9', '187', '1984-08-08', 'Permanent and pensionable', 'Yes', 'Other', NULL, NULL, '64', '4', 'T4urHM47nlm', 'gLD3Q9fHpvy', 'BkpZUfBGM9x', '2026-03-31 04:35:22', '2026-03-31 04:35:22', NULL, '2055-12-31'),
(20, 39, '710', 'Eu consequuntur comm', 'male', '2002-01-31', NULL, NULL, '9', '436', '2023-07-25', 'Contract', 'Yes', 'Intellectual Disability', NULL, NULL, '45', '3', 'CeLsrJOH0g9', 'X98G0eIWdmP', 'Y6KykEFTGUj', '2026-03-31 04:35:56', '2026-03-31 04:35:56', NULL, '2062-01-31'),
(21, 40, '675', 'Labore voluptatem si', 'female', '1982-06-25', NULL, NULL, '7', '463', '1995-02-13', NULL, 'Yes', 'Visual Impairment', 'Eligendi officiis ne', NULL, '120', '3', 'j8o6iO4Njsi', 'd0Gu8FrRM0Y', 'p0vnle5S7g2', '2026-03-31 04:36:31', '2026-03-31 04:46:07', NULL, '2042-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_deployment_histories`
--

CREATE TABLE `teacher_deployment_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deployment_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `file_attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_deployment_histories`
--

INSERT INTO `teacher_deployment_histories` (`id`, `user_id`, `school_id`, `deployment_date`, `start_date`, `end_date`, `reason`, `file_attachment`, `created_at`, `updated_at`) VALUES
(1, 1, 6, NULL, '2026-03-01', '2026-03-30', 'this is the current deployment', 'deployment_histories/1774939688_tmpgrt4v6st.pdf', '2026-03-31 03:48:08', '2026-03-31 03:48:08'),
(2, 1, 8, NULL, '1972-05-07', '2007-06-07', 'Ut est labore quod q', 'deployment_histories/1774939905_tmpgrt4v6st.pdf', '2026-03-31 03:51:45', '2026-03-31 03:51:45'),
(3, 1, 7, NULL, '1993-06-23', NULL, NULL, NULL, '2026-03-31 04:33:00', '2026-03-31 04:33:00'),
(6, 1, 9, NULL, '2000-07-30', NULL, NULL, NULL, '2026-03-31 04:35:22', '2026-03-31 04:35:22'),
(7, 1, 9, NULL, '1980-04-01', NULL, NULL, NULL, '2026-03-31 04:35:56', '2026-03-31 04:35:56'),
(8, 40, 7, NULL, '2014-11-04', NULL, NULL, NULL, '2026-03-31 04:36:31', '2026-03-31 04:46:07'),
(9, 7, 6, NULL, '2020-05-31', NULL, NULL, 'deployment_histories/1774943963_tmpgrt4v6st.pdf', '2026-03-31 04:59:23', '2026-03-31 04:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_education`
--

CREATE TABLE `teacher_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) DEFAULT NULL,
  `education_level` varchar(255) DEFAULT NULL,
  `doc_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_residentials`
--

CREATE TABLE `teacher_residentials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) DEFAULT NULL,
  `constituency_id` bigint(20) DEFAULT NULL,
  `ward_id` bigint(20) DEFAULT NULL,
  `Sub_location` varchar(255) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_school_contacts`
--

CREATE TABLE `teacher_school_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `disignation` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `tsc_number` varchar(255) DEFAULT NULL,
  `box` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_unions`
--

CREATE TABLE `teacher_unions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teachers_id` bigint(20) UNSIGNED NOT NULL,
  `union_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `organization` varchar(255) DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unions`
--

CREATE TABLE `unions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unions`
--

INSERT INTO `unions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'KNUT', NULL, '2026-03-23 03:50:54', '2026-03-23 03:50:54'),
(2, 'KUPPET', NULL, '2026-03-23 03:52:14', '2026-03-23 03:52:14'),
(3, 'kuppet2', NULL, '2026-03-23 03:52:36', '2026-03-23 03:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `middle_name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `phone_number`, `id_number`) VALUES
(1, 'Emmanuel', 'l_name', 'm_name', 'admin@mail.com', NULL, '$2y$10$Tdg6umO5aFDC6XDYNVglO.C0i8ng1oEWcBYZuWX0LxcOeos1z.3f.', 'Admin', NULL, '2026-03-16 11:14:47', '2026-03-19 08:58:55', '0798985851', NULL),
(7, 'Tanya', 'Merritt', 'Marah', 'teacher2@gmail.com', NULL, '$2y$10$HDVgWiVKGan2clzdm5QhoO.ieDapA1mwCBpgS9XMk2Go.irH4SGdu', 'Teacher', NULL, '2026-03-17 08:15:23', '2026-03-27 04:47:39', '254798985851', '12508939'),
(8, 'Indira', 'Koch', 'Philip Navarro', 'kobo@mailinator.com', NULL, '$2y$10$XoOcl52kPohwijUq0AeluuYlOWR6QB65Ys.cqs0uSrb5ymxEKx/jS', 'Cordinator', NULL, '2026-03-17 08:16:02', '2026-03-19 09:50:42', '+1 (714) 884-7003', NULL),
(9, 'Lois', 'Atkins', 'Chiquita Doyle', 'vyhag@mailinator.com', NULL, '$2y$10$UodsE6lExyr7OPUINLJ7GuV.TWxFwAwke6t/eaTrvvru9WPAm5SOi', 'teacher', NULL, '2026-03-17 08:23:23', '2026-03-17 08:23:23', '254798985851', NULL),
(10, 'Chava', 'Briggs', 'Perry Garza', 'gamywypora@mailinator.com', NULL, '$2y$10$UwdGY3AKA31v/ceGVTXwru0JD5apGVilp2BNHnNewFHzqbNv2C6ma', 'teacher', NULL, '2026-03-19 03:46:57', '2026-03-19 03:46:57', '254791799466', NULL),
(13, 'Darius', 'Jenkins', 'Keefe Donaldson', 'vacifukix@mailinator.com', NULL, '$2y$10$6KYwh12g.JXpk4Gu9ygyBemKbdLWEypw7QvCCI96vkRqmpUpgEpWC', 'Teacher', NULL, '2026-03-19 08:49:20', '2026-03-19 08:49:20', '+1 (156) 253-3834', NULL),
(14, 'Test', 'Teacher', 'Avye Fowler', 'teacher@gmail.com', NULL, '$2y$10$.ihQV8M24cZw2Z58w6adeuFXBhFboESrawBqJPvZY.aX2XtJ0kSsq', 'Teacher', NULL, '2026-03-19 08:49:42', '2026-03-23 02:33:42', '0798985851', NULL),
(17, 'Richard', 'Blair', 'Mia Wilson', 'fulynek@mailinator.com', NULL, '$2y$10$rhEq6ZKmUQN9cOIXUBFxk.z8hatE8WkZ43VWhckMZB6ylO//wrhHW', 'Cordinator', NULL, '2026-03-19 09:14:50', '2026-03-19 09:30:00', '254798985851', NULL),
(19, 'Ali', 'Mccarthy', 'Leah Fry', 'xixacit@mailinator.com', NULL, '$2y$10$T803QIq3/N1ag7ASpfu7fOVLyEKQpLRkJZrlcwumsTT74Rca1p.Zi', 'Cordinator', NULL, '2026-03-19 09:50:17', '2026-03-19 09:50:17', '+1 (155) 486-8257', NULL),
(21, 'Aiko', 'Crawford', 'Camilla Wright', 'quqobi@mailinator.com', NULL, '$2y$10$1GAFSEeqnUf45RG.GJJg6../wxoQCrmBxjTDktsNRwoM2klSF01.S', 'teacher', NULL, '2026-03-23 07:36:21', '2026-03-23 07:36:21', '0', NULL),
(22, 'Joshua', 'Hobbs', 'Nerea Jacobson', 'deciguryt@mailinator.com', NULL, '$2y$10$zmlSjWS19aqbT41WYfoQUejTvfn390aT0SiH2aVahjaoyri8InjDy', 'teacher', NULL, '2026-03-23 07:38:07', '2026-03-23 07:38:07', '0', NULL),
(23, 'JOHN', 'KATUI', 'MUMO', 'Johnmumo43@gmail.com', NULL, '$2y$10$RyIK.vksFLyMNseJ4n3zteyHWJmCZOqyFCFtPHe5eMDIOiuIiY6de', 'cordinator', NULL, '2026-03-24 10:09:41', '2026-03-24 10:09:41', '254791799466', NULL),
(24, 'Emmanuel', 'Chesire', 'yes', 'ekchesire@kabarak.ac.ke', NULL, '$2y$10$qZNEGbmW4Aj4gaY0cSQj4OOXGTTt79OY37n.Iafd8eKXY/Oxy5DXm', 'teacher', NULL, '2026-03-24 10:37:50', '2026-03-24 10:37:50', '254798985851', NULL),
(25, 'Cruz', 'Thompson', 'Indira Whitaker', 'kuvyrocad@mailinator.com', NULL, '$2y$10$eqfrsJHqqL.UxEj1PW94AOrhz/Z9u1GpTujOZX1LJ.vpRwwLW4JdO', 'teacher', NULL, '2026-03-24 10:46:58', '2026-03-24 10:46:58', '0', NULL),
(26, 'Hector', 'Hall', 'Sylvia Wong', 'zogu@mailinator.com', NULL, '$2y$10$GQLTKPplw6/CtFeJyevvAetcYfln0WyTFhgkd.CnaUrtUuv/BZfx6', 'teacher', NULL, '2026-03-24 10:48:59', '2026-03-24 10:48:59', '0', NULL),
(28, 'Cruz', 'Duncan', 'Nina Moses', 'limegefede@mailinator.com', NULL, '$2y$10$DQIvE5KB1cm4CCGrRAsloOWqzkRv4avLm5c83A0O2qytH/4ZvJ08y', 'Teacher', NULL, '2026-03-24 10:49:24', '2026-03-26 08:08:58', '0', NULL),
(29, 'Melodie', 'Barnes', 'Hillary Franks', 'xaloqyfuze@mailinator.com', NULL, '$2y$10$K5XowFu06Zxeu.ceY6FDXeSdnPV9mmb3cKrkOTBeKJDJJ34dc8BtO', 'Teacher', NULL, '2026-03-24 10:51:55', '2026-03-26 04:10:35', '0', NULL),
(30, 'Sage', 'Sparks', 'Nayda Jacobson', 'lepiqe@mailinator.com', NULL, '$2y$10$gG15s89TtTMnsvnpEvnaw.uLGew7jYRCXdqunKvpmdceZGHAIP1D6', 'Teacher', NULL, '2026-03-26 04:09:56', '2026-03-27 06:34:16', '0', NULL),
(31, 'Quynn', 'Chang', 'Caryn Cervantes', 'wetakavopa@mailinator.com', NULL, '$2y$10$ECCcBl4Oahe6EoI/g8zeDOnk7V0O5wUX4zvfzV1aa496HOB2FN2Bq', 'teacher', NULL, '2026-03-29 06:44:31', '2026-03-29 06:44:31', '0', NULL),
(32, 'Evan', 'Simmons', 'Rosalyn Conway', 'wugawesa@mailinator.com', NULL, '$2y$10$NnxdHLsFbOtGBn9IEmNJ5OPAAA3nc1XLvXjNdUibyNrtBZocQQc.q', 'teacher', NULL, '2026-03-31 04:29:27', '2026-03-31 04:29:27', '0', NULL),
(33, 'Luke', 'Sharpe', 'Sara Hicks', 'xonyh@mailinator.com', NULL, '$2y$10$jxoeGxEdFZUYEfZquyPysuPYsfdeavLIy1j8OjB4qH3Aop6H5./zW', 'teacher', NULL, '2026-03-31 04:32:22', '2026-03-31 04:32:22', '0', NULL),
(35, 'Halla', 'Kane', 'Quynn Hartman', 'heguhim@mailinator.com', NULL, '$2y$10$wKtYA.ci86ROxcXalHvIs.3ZGzuQQCLhyg0IyNUyr8poWq.hSFdZ.', 'teacher', NULL, '2026-03-31 04:33:00', '2026-03-31 04:33:00', '0', NULL),
(38, 'Dominique', 'Middleton', 'Kennan Davidson', 'murydat@mailinator.com', NULL, '$2y$10$embu/8iS3oAnr.QH1Q..pOap2kBgg3At1EjelQ40dqY0FrsVZ1bMu', 'Teacher', NULL, '2026-03-31 04:35:22', '2026-03-31 04:35:22', '0', NULL),
(39, 'Mikayla', 'Phelps', 'Quintessa Mcgowan', 'himyhym@mailinator.com', NULL, '$2y$10$AiwKDKwJrlGm/sTj1hyJJ.4vqPAhmnknrxHIyxYtCzPB3Y/0iA4..', 'Teacher', NULL, '2026-03-31 04:35:56', '2026-03-31 04:35:56', '0', NULL),
(40, 'Bree', 'Long', 'Xavier Brennan', 'nove@mailinator.com', NULL, '$2y$10$9c7EjAr8IKk.wscWpO9am.pX5AUFxV3d7mjBAYqLzjPEtUK9OS4ke', 'Teacher', NULL, '2026-03-31 04:36:31', '2026-03-31 04:46:07', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

CREATE TABLE `user_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_documents`
--

INSERT INTO `user_documents` (`id`, `user_id`, `document_id`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2026-03-23 06:12:30', '2026-03-23 06:12:30'),
(2, 1, 1, NULL, '2026-03-23 06:14:58', '2026-03-23 06:14:58'),
(3, 1, 2, 'file/documents/SsVyt8KAVuhW75lgqs3Vx53SRN2dyCzTmKZRr40f.pdf', '2026-03-23 06:17:35', '2026-03-23 06:17:35'),
(4, 1, 2, 'file/documents/IDASWHF9E6nCDyDUuNrNtwhEIl9ePkAPwZ9Qo9Ca.pdf', '2026-03-23 06:17:49', '2026-03-23 06:17:49'),
(5, 7, 1, 'file/documents/Ab0olKVAmysVPrPGle8jBmhNnodLDGLDfKfM47aF.pdf', '2026-03-23 09:32:02', '2026-03-23 09:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_unions`
--

CREATE TABLE `user_unions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `union_id` bigint(20) UNSIGNED DEFAULT NULL,
  `membership_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_unions`
--

INSERT INTO `user_unions` (`id`, `user_id`, `union_id`, `membership_number`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '662', '2026-03-23 05:50:44', '2026-03-23 05:50:44'),
(2, 1, 2, '521', '2026-03-23 05:51:50', '2026-03-23 05:51:50'),
(3, 7, 3, '371', '2026-03-23 09:31:46', '2026-03-23 09:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `vct_students_photo`
--

CREATE TABLE `vct_students_photo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vtc_students_pivot`
--

CREATE TABLE `vtc_students_pivot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `vtc_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v_t_c_courses`
--

CREATE TABLE `v_t_c_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vtc_id` bigint(20) UNSIGNED NOT NULL,
  `vtc_dpt_id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `registration_code` varchar(255) NOT NULL,
  `examination_body_or_creteria` varchar(255) NOT NULL,
  `addtional_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v_t_c_departments`
--

CREATE TABLE `v_t_c_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vtc_id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `additional_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v_t_c_s`
--

CREATE TABLE `v_t_c_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `area_in_hectares` varchar(255) NOT NULL,
  `legal_ownership` varchar(255) NOT NULL,
  `infrastracture` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `full_names` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `kra_pin` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `tsc_number` varchar(255) DEFAULT NULL,
  `p_o_box` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v_t_c_teachers`
--

CREATE TABLE `v_t_c_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `kra_pin` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `tsc_number` varchar(255) DEFAULT NULL,
  `religion` varchar(255) NOT NULL,
  `passport_photo_attachment` varchar(255) NOT NULL,
  `constituency_id` bigint(20) UNSIGNED NOT NULL,
  `ward_id` bigint(20) UNSIGNED NOT NULL,
  `sublocation_id` bigint(20) UNSIGNED NOT NULL,
  `village` varchar(255) NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `union_id` bigint(20) UNSIGNED NOT NULL,
  `education_level` varchar(255) NOT NULL,
  `certification_attachment` varchar(255) NOT NULL,
  `next_of_kin_full_names` varchar(255) NOT NULL,
  `next_of_kin_id_number` varchar(255) NOT NULL,
  `next_of_kin_phone_number` varchar(255) NOT NULL,
  `next_of_kin_relationship` varchar(255) NOT NULL,
  `next_of_kin_gender` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `constituency_id` varchar(255) DEFAULT NULL,
  `constituency_code` varchar(255) DEFAULT NULL,
  `ward_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `name`, `code`, `constituency_id`, `constituency_code`, `ward_code`, `created_at`, `updated_at`) VALUES
('Mn7xPHjxcxb', 'Abakaile Ward', 'KE_Ward_151', 'EW4Jw4dVWBt', 'EW4Jw4dVWBt', 'Mn7xPHjxcxb', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
('nDZvyhVwri1', 'Abogeta East Ward', 'KE_Ward_293', 'AFIlzKNxXST', 'AFIlzKNxXST', 'nDZvyhVwri1', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
('auJK9sKTX9b', 'Abogeta West Ward', 'KE_Ward_294', 'AFIlzKNxXST', 'AFIlzKNxXST', 'auJK9sKTX9b', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
('Ay0bToL5BTE', 'Abothuguchi Central Ward', 'KE_Ward_286', 'OnNcTsJgfvL', 'OnNcTsJgfvL', 'Ay0bToL5BTE', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
('ZVoIw8oAOWZ', 'Abothuguchi West Ward', 'KE_Ward_287', 'OnNcTsJgfvL', 'OnNcTsJgfvL', 'ZVoIw8oAOWZ', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
('BMKDCdHbiHL', 'Ademasajide Ward', 'KE_Ward_178', 'X98G0eIWdmP', 'X98G0eIWdmP', 'BMKDCdHbiHL', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
('EO3kbx8nZIp', 'Adu Ward', 'KE_Ward_83', 'KMWrMZrlO5u', 'KMWrMZrlO5u', 'EO3kbx8nZIp', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
('soQ5zdUZi2H', 'Ageng\'a Nanguba Ward', 'KE_Ward_1150', 'NHRktMsAkO1', 'NHRktMsAkO1', 'soQ5zdUZi2H', '2026-03-16 11:14:38', '2026-03-16 11:14:38'),
('JIQYJYd5CzO', 'Aguthi-gaaki Ward', 'KE_Ward_468', 'YT3tecc4atw', 'YT3tecc4atw', 'JIQYJYd5CzO', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('F1etBBfosCl', 'Ahero Ward', 'KE_Ward_1208', 'iRK9uABUTVZ', 'iRK9uABUTVZ', 'F1etBBfosCl', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('keTxMrb6Oag', 'Ainabkoi/Olare Ward', 'KE_Ward_721', 'mYlMs4xTj82', 'mYlMs4xTj82', 'keTxMrb6Oag', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('ZJyTpeyEcK5', 'Ainamoi Ward', 'KE_Ward_945', 'GshNTMZJ5r1', 'GshNTMZJ5r1', 'ZJyTpeyEcK5', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('t4Suo8Enc7T', 'Airbase Ward', 'KE_Ward_1437', 'qoLIT7y5f5c', 'qoLIT7y5f5c', 't4Suo8Enc7T', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('bmyrNLOPAAW', 'Airport Ward', 'KE_Ward_3', 'OvI6w06DhPJ', 'OvI6w06DhPJ', 'bmyrNLOPAAW', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('mSPC54QXXiP', 'Akachiu Ward', 'KE_Ward_254', 'wtuGWT7KjVm', 'wtuGWT7KjVm', 'mSPC54QXXiP', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('CsVYL5oWdjy', 'Akirang\'ondu Ward', 'KE_Ward_256', 'TPfcUHno8oP', 'TPfcUHno8oP', 'CsVYL5oWdjy', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('bYsajNCrCgY', 'Akithii Ward', 'KE_Ward_267', 'Q4xAPhWUnYC', 'Q4xAPhWUnYC', 'bYsajNCrCgY', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('Oe8JEzBVDa9', 'Alale Ward', 'KE_Ward_656', 'YXpHG1Ez8V2', 'YXpHG1Ez8V2', 'Oe8JEzBVDa9', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('zFbFESCJ8mq', 'Alungo Gof Ward', 'KE_Ward_220', 'nsfbHBS9tMT', 'nsfbHBS9tMT', 'zFbFESCJ8mq', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('okaRgHkp8W5', 'Amalo Ward', 'KE_Ward_849', 'QwGkDS0DNls', 'QwGkDS0DNls', 'okaRgHkp8W5', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('VAOZFeKsbAT', 'Amukura Central Ward', 'KE_Ward_1132', 'EhchjCHkhJ9', 'EhchjCHkhJ9', 'VAOZFeKsbAT', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('xPmSqaPoPFT', 'Amukura East Ward', 'KE_Ward_1131', 'EhchjCHkhJ9', 'EhchjCHkhJ9', 'xPmSqaPoPFT', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('GcsaAX4B8x8', 'Amukura West Ward', 'KE_Ward_1130', 'EhchjCHkhJ9', 'EhchjCHkhJ9', 'GcsaAX4B8x8', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('y1x13IydCG7', 'Amwathi Ward', 'KE_Ward_265', 'G9DoZvSdGLx', 'G9DoZvSdGLx', 'y1x13IydCG7', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('QYQsVGsbKWg', 'Angata Barikoi Ward', 'KE_Ward_883', 'Nb6e34jNGAq', 'Nb6e34jNGAq', 'QYQsVGsbKWg', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('O57e90leR9M', 'Angata Nayokie Ward', 'KE_Ward_670', 'EmQRGVtvWy3', 'EmQRGVtvWy3', 'O57e90leR9M', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('umi4GRQTwG0', 'Ang\'orom Ward', 'KE_Ward_1127', 'EhchjCHkhJ9', 'EhchjCHkhJ9', 'umi4GRQTwG0', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('pVLJ4TYVNAR', 'Ang\'urai East Ward', 'KE_Ward_1125', 'GpEIlwz3FvT', 'GpEIlwz3FvT', 'pVLJ4TYVNAR', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('oOa6cVAodY5', 'Ang\'urai North Ward', 'KE_Ward_1124', 'GpEIlwz3FvT', 'GpEIlwz3FvT', 'oOa6cVAodY5', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('OSO67hxKiUf', 'Ang\'urai South Ward', 'KE_Ward_1123', 'GpEIlwz3FvT', 'GpEIlwz3FvT', 'OSO67hxKiUf', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('q5aojmYq2C4', 'Antuambui Ward', 'KE_Ward_261', 'G9DoZvSdGLx', 'G9DoZvSdGLx', 'q5aojmYq2C4', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('iNmCeQG70K0', 'Antubetwe Kiongo Ward', 'KE_Ward_263', 'G9DoZvSdGLx', 'G9DoZvSdGLx', 'iNmCeQG70K0', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('o8RzRkx3x4Q', 'Arabia Ward', 'KE_Ward_211', 'fGr9rRvaovO', 'fGr9rRvaovO', 'o8RzRkx3x4Q', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('xvlSuZsdYVY', 'Arbajahan Ward', 'KE_Ward_176', 'X98G0eIWdmP', 'X98G0eIWdmP', 'xvlSuZsdYVY', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('nwXVUZOi5LN', 'Arror Ward', 'KE_Ward_740', 'fNCuk4Lpsnh', 'fNCuk4Lpsnh', 'nwXVUZOi5LN', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('YJhdNCfPDKH', 'Ashabito Ward', 'KE_Ward_201', 'jrm0uyLXnC1', 'jrm0uyLXnC1', 'YJhdNCfPDKH', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('CYAMnUYLITU', 'Athi River Ward', 'KE_Ward_394', 'BxfsSc6Svrc', 'BxfsSc6Svrc', 'CYAMnUYLITU', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('pK3bnoP5kpo', 'Athiru Gaiti Ward', 'KE_Ward_253', 'wtuGWT7KjVm', 'wtuGWT7KjVm', 'pK3bnoP5kpo', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('mOMLW8dXVuR', 'Athiru Ruujine Ward', 'KE_Ward_257', 'TPfcUHno8oP', 'TPfcUHno8oP', 'mOMLW8dXVuR', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('amA6INYYpDG', 'Athi Ward', 'KE_Ward_370', 'd3hSQ3EtnPk', 'd3hSQ3EtnPk', 'amA6INYYpDG', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('UE0iLMx0uAU', 'Athwana Ward', 'KE_Ward_266', 'Q4xAPhWUnYC', 'Q4xAPhWUnYC', 'UE0iLMx0uAU', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('Vi7hrFiryu0', 'Awasi/Onjiko Ward', 'KE_Ward_1207', 'iRK9uABUTVZ', 'iRK9uABUTVZ', 'Vi7hrFiryu0', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('W4gx1OjSjzp', 'Baawa Ward', 'KE_Ward_671', 'EmQRGVtvWy3', 'EmQRGVtvWy3', 'W4gx1OjSjzp', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('OObzseEJrMs', 'Babandogo Ward', 'KE_Ward_1401', 'Cc8uEFkzfVf', 'Cc8uEFkzfVf', 'OObzseEJrMs', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('m7FYoouCqec', 'Bahari Ward', 'KE_Ward_110', 'Lfxw0DfD4jN', 'Lfxw0DfD4jN', 'm7FYoouCqec', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('oK2KwbL5Dzx', 'Bahati Ward', 'KE_Ward_869', 'nwh9bXKykiS', 'nwh9bXKykiS', 'oK2KwbL5Dzx', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('UuAQ2amLjtB', 'Balambala Ward', 'KE_Ward_135', 'FGBNPr91pXH', 'FGBNPr91pXH', 'UuAQ2amLjtB', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('BE24fZlEXxt', 'Bamba Ward', 'KE_Ward_72', 'x7qUMtZZvo9', 'x7qUMtZZvo9', 'BE24fZlEXxt', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('J9QXQIm43fW', 'Bamburi Ward', 'KE_Ward_11', 'C1hO6wNOgrH', 'C1hO6wNOgrH', 'J9QXQIm43fW', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('SCxU4funihr', 'Bangale Ward', 'KE_Ward_98', 'yWPcTwGwQ2B', 'yWPcTwGwQ2B', 'SCxU4funihr', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('doitLG3v6PZ', 'Banissa Ward', 'KE_Ward_196', 'hCvlJNjyZna', 'hCvlJNjyZna', 'doitLG3v6PZ', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('r6KB3hMzaXh', 'Banja Ward', 'KE_Ward_1064', 'BXaq5PxSfz2', 'BXaq5PxSfz2', 'r6KB3hMzaXh', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('zY1T5H8vk9z', 'Baragwi Ward', 'KE_Ward_505', 'yOaHQLOLd1H', 'yOaHQLOLd1H', 'zY1T5H8vk9z', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('phpfjGEVjg8', 'Baraki Ward', 'KE_Ward_145', 'J69iWev2zwu', 'J69iWev2zwu', 'phpfjGEVjg8', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('Tdyu1iQYirq', 'Bartabwa Ward', 'KE_Ward_792', 'bqtTmWcikTN', 'bqtTmWcikTN', 'Tdyu1iQYirq', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('pfFWXloU0jC', 'Barut Ward', 'KE_Ward_870', 'KTayLusaU5I', 'KTayLusaU5I', 'pfFWXloU0jC', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('x1BOzSCIanu', 'Barwago Ward', 'KE_Ward_170', 'uov0yFMw9Qm', 'uov0yFMw9Qm', 'x1BOzSCIanu', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('OlKUTmnTY57', 'Barwessa Ward', 'KE_Ward_788', 'bqtTmWcikTN', 'bqtTmWcikTN', 'OlKUTmnTY57', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('UGCnusbnkFI', 'Basi Central Ward', 'KE_Ward_1317', 'cooDDG3Lh3A', 'cooDDG3Lh3A', 'UGCnusbnkFI', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('u15fCmBOYHT', 'Bassi Bogetaorio Ward', 'KE_Ward_1319', 'cooDDG3Lh3A', 'cooDDG3Lh3A', 'u15fCmBOYHT', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('YbfMLNQRxtf', 'Basuba Ward', 'KE_Ward_103', 'cwnqFyTJIgX', 'cwnqFyTJIgX', 'YbfMLNQRxtf', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('eQSeYqhadbw', 'Batalu Ward', 'KE_Ward_165', 'qsjAa8FE8OS', 'qsjAa8FE8OS', 'eQSeYqhadbw', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('Vfo6mLv2MkA', 'Batei Ward', 'KE_Ward_658', 'u2zJahNiSP5', 'u2zJahNiSP5', 'Vfo6mLv2MkA', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('TRdcXjEmmMS', 'Benane Ward', 'KE_Ward_141', 'U7KFQn3Up3o', 'U7KFQn3Up3o', 'TRdcXjEmmMS', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('BA2zKL0pmeI', 'Biashara Ward', 'KE_Ward_876', 'FBJ9Y11esHS', 'FBJ9Y11esHS', 'BA2zKL0pmeI', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('cSNzNEfbQfk', 'Bibirioni Ward', 'KE_Ward_601', 'xhVi71INcFs', 'xhVi71INcFs', 'cSNzNEfbQfk', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('NAWbghvoSOZ', 'Bidii Ward', 'KE_Ward_679', 'ABy8CNqf2e7', 'ABy8CNqf2e7', 'NAWbghvoSOZ', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('g8iPQGXNRmg', 'Birongo Ward', 'KE_Ward_1335', 'fFh3beH29fD', 'fFh3beH29fD', 'g8iPQGXNRmg', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('H5US8Zu9bIJ', 'Bobaracho Ward', 'KE_Ward_1331', 'fFh3beH29fD', 'fFh3beH29fD', 'H5US8Zu9bIJ', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('wXOHBThI5Kf', 'Bobasi/Boitangare Ward', 'KE_Ward_1322', 'cooDDG3Lh3A', 'cooDDG3Lh3A', 'wXOHBThI5Kf', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('Xwhn2CB2cZ3', 'Bobasi Chache Ward', 'KE_Ward_1320', 'cooDDG3Lh3A', 'cooDDG3Lh3A', 'Xwhn2CB2cZ3', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('dHlamDlw0NG', 'Bofu Ward', 'KE_Ward_23', 'iy93Mmi73Or', 'iy93Mmi73Or', 'dHlamDlw0NG', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('TwsN9rzFim6', 'Bogeka Ward', 'KE_Ward_1342', 'gPR82w2xgJZ', 'gPR82w2xgJZ', 'TwsN9rzFim6', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('NZLSKCRL1O0', 'Bogetenga Ward', 'KE_Ward_1307', 'WHG67QCDRS9', 'WHG67QCDRS9', 'NZLSKCRL1O0', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('JKJtpBP77A1', 'Bogiakumu Ward', 'KE_Ward_1302', 'zCCIu1Vi3Wh', 'zCCIu1Vi3Wh', 'JKJtpBP77A1', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('odXKgaPu8B0', 'Bogichora Ward', 'KE_Ward_1353', 'cxjRPbvhjzr', 'cxjRPbvhjzr', 'odXKgaPu8B0', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('rWETDR5My3k', 'Bogusero Ward', 'KE_Ward_1341', 'gPR82w2xgJZ', 'gPR82w2xgJZ', 'rWETDR5My3k', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('OrArvkA4MbA', 'Boikanga Ward', 'KE_Ward_1306', 'WHG67QCDRS9', 'WHG67QCDRS9', 'OrArvkA4MbA', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('w8SzXPBdjgq', 'Boito Ward', 'KE_Ward_989', 'PLFoYJO8MVS', 'PLFoYJO8MVS', 'w8SzXPBdjgq', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('nvxLbNo63Zw', 'Bokeira Ward', 'KE_Ward_1359', 'v5qbFUgfIoF', 'v5qbFUgfIoF', 'nvxLbNo63Zw', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('F0FgIasVA92', 'Bokimonge Ward', 'KE_Ward_1313', 'ntRK47D5dYL', 'ntRK47D5dYL', 'F0FgIasVA92', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('rAJO40KF2F6', 'Bokoli Ward', 'KE_Ward_1110', 'aqYhbqKclsI', 'aqYhbqKclsI', 'rAJO40KF2F6', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('umrac2I2Sg9', 'Bomani Ward', 'KE_Ward_113', 'jNzRdAwjaQ1', 'jNzRdAwjaQ1', 'umrac2I2Sg9', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('lRfveTknPgF', 'Bomariba Ward', 'KE_Ward_1301', 'zCCIu1Vi3Wh', 'zCCIu1Vi3Wh', 'lRfveTknPgF', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('q6eyMKDnFA0', 'Bombaba Borabu Ward', 'KE_Ward_1311', 'ntRK47D5dYL', 'ntRK47D5dYL', 'q6eyMKDnFA0', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('MyzWMCaSFlX', 'Bomorenda Ward', 'KE_Ward_1303', 'zCCIu1Vi3Wh', 'zCCIu1Vi3Wh', 'MyzWMCaSFlX', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('Z4MKjHrF1wJ', 'Bomwagamo Ward', 'KE_Ward_1358', 'v5qbFUgfIoF', 'v5qbFUgfIoF', 'Z4MKjHrF1wJ', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('d7n8GfG2cFO', 'Bonyamatuta Ward', 'KE_Ward_1355', 'cxjRPbvhjzr', 'cxjRPbvhjzr', 'd7n8GfG2cFO', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('iklOZN0Ok77', 'Boochi Borabu Ward', 'KE_Ward_1312', 'ntRK47D5dYL', 'ntRK47D5dYL', 'iklOZN0Ok77', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('R8gqeFZV0qT', 'Boochi/Tendere Ward', 'KE_Ward_1324', 'YqYSkwmOtiR', 'YqYSkwmOtiR', 'R8gqeFZV0qT', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('fBGAi2rHJgE', 'Borabu/Chitago Ward', 'KE_Ward_1308', 'WHG67QCDRS9', 'WHG67QCDRS9', 'fBGAi2rHJgE', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('b3aaM8BOTDz', 'Bosamaro Ward', 'KE_Ward_1354', 'cxjRPbvhjzr', 'cxjRPbvhjzr', 'b3aaM8BOTDz', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('BNC4x8wPAsw', 'Bosoti/Sengera Ward', 'KE_Ward_1325', 'YqYSkwmOtiR', 'YqYSkwmOtiR', 'BNC4x8wPAsw', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('gsSTglpX3Wd', 'Bukembe East Ward', 'KE_Ward_1097', 'CUjthlounWV', 'CUjthlounWV', 'gsSTglpX3Wd', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('r6SlF5OJDxM', 'Bukembe West Ward', 'KE_Ward_1096', 'CUjthlounWV', 'CUjthlounWV', 'r6SlF5OJDxM', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('i26gx3p4d5E', 'Bukhayo Central Ward', 'KE_Ward_1136', 'e1J7R103h8I', 'e1J7R103h8I', 'i26gx3p4d5E', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('ov8OgPXuR5N', 'Bukhayo East Ward', 'KE_Ward_1135', 'e1J7R103h8I', 'e1J7R103h8I', 'ov8OgPXuR5N', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('YXM5WOeQkyO', 'Bukhayo North/Walatsi Ward', 'KE_Ward_1134', 'e1J7R103h8I', 'e1J7R103h8I', 'YXM5WOeQkyO', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('xMPuIHmGdYe', 'Bukhayo West Ward', 'KE_Ward_1137', 'tvkI2HSIRW9', 'tvkI2HSIRW9', 'xMPuIHmGdYe', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('mLrXAhflEvn', 'Bukira Central/Ikerege Ward', 'KE_Ward_1290', 'jtBjNpL9FXS', 'jtBjNpL9FXS', 'mLrXAhflEvn', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('lOqK0cwQKaH', 'Bukira East Ward', 'KE_Ward_1289', 'jtBjNpL9FXS', 'jtBjNpL9FXS', 'lOqK0cwQKaH', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('g1daXHb0Lz0', 'Bulla Mpya Ward', 'KE_Ward_212', 'fGr9rRvaovO', 'fGr9rRvaovO', 'g1daXHb0Lz0', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('aVUy55683jB', 'Bulla Pesa Ward', 'KE_Ward_242', 'I2LYLqKU6AW', 'I2LYLqKU6AW', 'aVUy55683jB', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('dOJaTypeyA9', 'Bumula Ward', 'KE_Ward_1090', 'jkQZEow83MX', 'jkQZEow83MX', 'dOJaTypeyA9', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('L8VRh5JlUik', 'Bunyala Central Ward', 'KE_Ward_1152', 'zI6vnsXresW', 'zI6vnsXresW', 'L8VRh5JlUik', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('ddOJaw1OQwA', 'Bunyala East Ward', 'KE_Ward_1018', 'G6PJ5kFVAuO', 'G6PJ5kFVAuO', 'ddOJaw1OQwA', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('FrPqZ0quyrF', 'Bunyala North Ward', 'KE_Ward_1153', 'zI6vnsXresW', 'zI6vnsXresW', 'FrPqZ0quyrF', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('BBkS40b5WG7', 'Bunyala South Ward', 'KE_Ward_1155', 'zI6vnsXresW', 'zI6vnsXresW', 'BBkS40b5WG7', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('soqBddsWHf5', 'Bunyala West Ward', 'KE_Ward_1017', 'G6PJ5kFVAuO', 'G6PJ5kFVAuO', 'soqBddsWHf5', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('VDvkL0vcV5e', 'Bura(Mwatate) Ward', 'KE_Ward_122', 'IBDoGsLdhvt', 'IBDoGsLdhvt', 'VDvkL0vcV5e', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('PwpI3UVqNMb', 'Burat Ward', 'KE_Ward_246', 'I2LYLqKU6AW', 'I2LYLqKU6AW', 'PwpI3UVqNMb', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('kqTPEb1RsMy', 'Bura Ward', 'KE_Ward_152', 'RScEHA3V38d', 'RScEHA3V38d', 'kqTPEb1RsMy', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('dFbf5rdQdI9', 'Burder Ward', 'KE_Ward_185', 'U7KFQn3Up3o', 'U7KFQn3Up3o', 'dFbf5rdQdI9', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('Yk6G4ret1OC', 'Burumba Ward', 'KE_Ward_1141', 'tvkI2HSIRW9', 'tvkI2HSIRW9', 'Yk6G4ret1OC', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('cUBWuuQYISs', 'Busali Ward', 'KE_Ward_1060', 'urtJSF5jcBC', 'urtJSF5jcBC', 'cUBWuuQYISs', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('cgTC3oqgmKg', 'Busibwabo Ward', 'KE_Ward_1140', 'tvkI2HSIRW9', 'tvkI2HSIRW9', 'cgTC3oqgmKg', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('WlgJjiJVyHY', 'Butali/Chegulo Ward', 'KE_Ward_1005', 'ES1CWa4AJmJ', 'ES1CWa4AJmJ', 'WlgJjiJVyHY', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('hp28cyo1lbf', 'Bute Ward', 'KE_Ward_162', 'qsjAa8FE8OS', 'qsjAa8FE8OS', 'hp28cyo1lbf', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('g3PamYQCz5A', 'Butiye Ward', 'KE_Ward_221', 'sZjPgbWI5ra', 'sZjPgbWI5ra', 'g3PamYQCz5A', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('IgadIOg14CX', 'Butsotso Central Ward', 'KE_Ward_1011', 'Y3NjAhiBaZT', 'Y3NjAhiBaZT', 'IgadIOg14CX', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('dFH6aZXT2rd', 'Butsotso East Ward', 'KE_Ward_1009', 'Y3NjAhiBaZT', 'Y3NjAhiBaZT', 'dFH6aZXT2rd', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('t8eg6hgrHEp', 'Butsotso South Ward', 'KE_Ward_1010', 'Y3NjAhiBaZT', 'Y3NjAhiBaZT', 't8eg6hgrHEp', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('sKD6tJgPfbh', 'Bwake/Luuya Ward', 'KE_Ward_1087', 'k1mze33jOs0', 'k1mze33jOs0', 'sKD6tJgPfbh', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('fKK4JksHULe', 'Bwiri Ward', 'KE_Ward_1151', 'NHRktMsAkO1', 'NHRktMsAkO1', 'fKK4JksHULe', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('LR8RoEpERGM', 'California Ward', 'KE_Ward_1438', 'qoLIT7y5f5c', 'qoLIT7y5f5c', 'LR8RoEpERGM', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('fpnhZCEZEGQ', 'Central Alego Ward', 'KE_Ward_1165', 'Cu46otDi1RO', 'Cu46otDi1RO', 'fpnhZCEZEGQ', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('rF4SKTlT0XH', 'Central Bunyore Ward', 'KE_Ward_1074', 'Lpy789vqRC6', 'Lpy789vqRC6', 'rF4SKTlT0XH', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('LWXYw2EpuLy', 'Central Gem Ward', 'KE_Ward_1171', 'PKeFksHlJkB', 'PKeFksHlJkB', 'LWXYw2EpuLy', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('M8rGveWTIMm', 'Central Kamagambo Ward', 'KE_Ward_1262', 'fT37q3rXQ35', 'fT37q3rXQ35', 'M8rGveWTIMm', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('P9SReXKzjbO', 'Central Kanyamkago Ward', 'KE_Ward_1279', 'fCInDXluNhx', 'fCInDXluNhx', 'P9SReXKzjbO', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('UQYZGlkULva', 'Central Kasipul Ward', 'KE_Ward_1223', 'NhsAMiaS0TD', 'NhsAMiaS0TD', 'UQYZGlkULva', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('Xs7PwQOVMmb', 'Central Kisumu Ward', 'KE_Ward_1192', 'YzEDO9Mq4TR', 'YzEDO9Mq4TR', 'Xs7PwQOVMmb', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('W1gE3uts9Qh', 'Central Maragoli Ward', 'KE_Ward_1053', 'OOF3UX4yOt7', 'OOF3UX4yOt7', 'W1gE3uts9Qh', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('go41UxgIdh5', 'Central Nyakach Ward', 'KE_Ward_1218', 'kBQIjtWUBqj', 'kBQIjtWUBqj', 'go41UxgIdh5', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('jmeydKjWYw7', 'Central Sakwa Ward', 'KE_Ward_1176', 'ka9Uv3Ckcbd', 'ka9Uv3Ckcbd', 'jmeydKjWYw7', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('o6cVZ72goEk', 'Central Seme Ward', 'KE_Ward_1203', 'LRNmnMw1fBs', 'LRNmnMw1fBs', 'o6cVZ72goEk', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('e0xkgk6TZEG', 'Central Ward', 'KE_Ward_464', 'EESGLsSLTqH', 'EESGLsSLTqH', 'e0xkgk6TZEG', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('PeLH4hGTO17', 'Chaani Ward', 'KE_Ward_5', 'OvI6w06DhPJ', 'OvI6w06DhPJ', 'PeLH4hGTO17', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('YnEUPEUnejZ', 'Chaik Ward', 'KE_Ward_960', 'YnIAWg1T4AY', 'YnIAWg1T4AY', 'YnEUPEUnejZ', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('rthnyPewuyf', 'Chakol North Ward', 'KE_Ward_1129', 'EhchjCHkhJ9', 'EhchjCHkhJ9', 'rthnyPewuyf', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('Ksb8Prco66C', 'Chakol South Ward', 'KE_Ward_1128', 'EhchjCHkhJ9', 'EhchjCHkhJ9', 'Ksb8Prco66C', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('uxxdF69wmFs', 'Chala Ward', 'KE_Ward_111', 'jNzRdAwjaQ1', 'jNzRdAwjaQ1', 'uxxdF69wmFs', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('qyQg0b3mxEL', 'Changamwe Ward', 'KE_Ward_4', 'OvI6w06DhPJ', 'OvI6w06DhPJ', 'qyQg0b3mxEL', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('ReDzOcQ8mT1', 'Chania Ward', 'KE_Ward_557', 'HEsM6W2ImQR', 'HEsM6W2ImQR', 'ReDzOcQ8mT1', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('Yh0tdzyDjHY', 'Charagita Ward', 'KE_Ward_461', 'fVSw60UAC3W', 'fVSw60UAC3W', 'Yh0tdzyDjHY', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('HTTUdsL0gAm', 'Chari Ward', 'KE_Ward_243', 'NrGORu301bx', 'NrGORu301bx', 'HTTUdsL0gAm', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('yi6G0JRSjwo', 'Chasimba Ward', 'KE_Ward_61', 'xWAZBULwGxp', 'xWAZBULwGxp', 'yi6G0JRSjwo', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('NHcPsj2IMSr', 'Chavakali Ward', 'KE_Ward_1057', 'urtJSF5jcBC', 'urtJSF5jcBC', 'NHcPsj2IMSr', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('NkcRjTGJbuh', 'Chawia Ward', 'KE_Ward_123', 'IBDoGsLdhvt', 'IBDoGsLdhvt', 'NkcRjTGJbuh', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('hLTIOtzQE9w', 'Cheboin Ward', 'KE_Ward_952', 'wt8cPHWfkfu', 'wt8cPHWfkfu', 'hLTIOtzQE9w', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('m6Ko9GT996i', 'Chebunyo Ward', 'KE_Ward_974', 'PUhMyfDD2xp', 'PUhMyfDD2xp', 'm6Ko9GT996i', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('WU8NRoTwaDK', 'Chekalini Ward', 'KE_Ward_994', 'ZOdhgR19Akq', 'ZOdhgR19Akq', 'WU8NRoTwaDK', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('LK2nY0OUCDG', 'Chemagel Ward', 'KE_Ward_967', 'KyuSYunELJI', 'KyuSYunELJI', 'LK2nY0OUCDG', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('qj9Id3LgrGI', 'Chemaner Ward', 'KE_Ward_980', 'OZNRpww2TUK', 'OZNRpww2TUK', 'qj9Id3LgrGI', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('EHPasx2Mt1b', 'Chemelil/Chemase Ward', 'KE_Ward_753', 'NPYRMdqrK6L', 'NPYRMdqrK6L', 'EHPasx2Mt1b', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('WzjCQ2bnOk7', 'Chemelil Ward', 'KE_Ward_1214', 'NmbwkQ5r5cB', 'NmbwkQ5r5cB', 'WzjCQ2bnOk7', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('dbSH3rqE3n1', 'Chemosot Ward', 'KE_Ward_953', 'wt8cPHWfkfu', 'wt8cPHWfkfu', 'dbSH3rqE3n1', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('GCZB9Qc6zCO', 'Chemuche Ward', 'KE_Ward_1003', 'ES1CWa4AJmJ', 'ES1CWa4AJmJ', 'GCZB9Qc6zCO', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('G1AXnlrNy7a', 'Chemundu/Kapng\'etunyi Ward', 'KE_Ward_765', 'xLWuQq3DjOR', 'xLWuQq3DjOR', 'G1AXnlrNy7a', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('TwX1KTjb8Qp', 'Chengoni/Samburu Ward', 'KE_Ward_48', 'LOgbecTRkbp', 'LOgbecTRkbp', 'TwX1KTjb8Qp', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('cQvnOvaqDNE', 'Chepareria Ward', 'KE_Ward_657', 'u2zJahNiSP5', 'u2zJahNiSP5', 'cQvnOvaqDNE', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('uMqAPTG5rm0', 'Chepchabas Ward', 'KE_Ward_986', 'PLFoYJO8MVS', 'PLFoYJO8MVS', 'uMqAPTG5rm0', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('IAEQih35LOS', 'Chepchoina Ward', 'KE_Ward_680', 'PsjxYLsJSIp', 'PsjxYLsJSIp', 'IAEQih35LOS', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('ca3KHxzwLQy', 'Chepkorio Ward', 'KE_Ward_746', 'SOEG546PqbA', 'SOEG546PqbA', 'ca3KHxzwLQy', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('J5JM3Ud8ASG', 'Chepkumia Ward', 'KE_Ward_770', 'Njv37QXxNy2', 'Njv37QXxNy2', 'J5JM3Ud8ASG', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('O4tmt5AWnNr', 'Chepkunyuk Ward', 'KE_Ward_762', 'W6Err8cQf5J', 'W6Err8cQf5J', 'O4tmt5AWnNr', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('qqTlgrxWdkY', 'Cheplanget Ward', 'KE_Ward_955', 'wt8cPHWfkfu', 'wt8cPHWfkfu', 'qqTlgrxWdkY', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('k828CVWMS7V', 'Chepseon Ward', 'KE_Ward_938', 'gU0Cz7Qlfss', 'gU0Cz7Qlfss', 'k828CVWMS7V', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('wC4nO2SVsQH', 'Chepsiro/Kiptoror Ward', 'KE_Ward_699', 'f18kGo9yXWo', 'f18kGo9yXWo', 'wC4nO2SVsQH', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('iKvnghqTvSP', 'Cheptais Ward', 'KE_Ward_1076', 'NZphHeczehh', 'NZphHeczehh', 'iKvnghqTvSP', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('eB5qRSOhocc', 'Chepterwai Ward', 'KE_Ward_774', 'Xtb7tbJpk9p', 'Xtb7tbJpk9p', 'eB5qRSOhocc', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('ydWuSvAtVs1', 'Cheptiret/Kipchamo Ward', 'KE_Ward_728', 'dKHnvt7gleN', 'dKHnvt7gleN', 'ydWuSvAtVs1', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('d45kXzPbKzk', 'Cheptororiet/Seretut Ward', 'KE_Ward_959', 'YnIAWg1T4AY', 'YnIAWg1T4AY', 'd45kXzPbKzk', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('dnN8o6fbT5I', 'Chepyuk Ward', 'KE_Ward_1078', 'NZphHeczehh', 'NZphHeczehh', 'dnN8o6fbT5I', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('onY1jZ8tPTG', 'Cherab Ward', 'KE_Ward_244', 'NrGORu301bx', 'NrGORu301bx', 'onY1jZ8tPTG', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('z5brnaiDs4p', 'Cherang\'any/Chebororwa Ward', 'KE_Ward_737', 'fNCuk4Lpsnh', 'fNCuk4Lpsnh', 'z5brnaiDs4p', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('OrWMyDLtm7r', 'Cherangany/Suwerwa Ward', 'KE_Ward_698', 'f18kGo9yXWo', 'f18kGo9yXWo', 'OrWMyDLtm7r', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('laOitoZMUgC', 'Chesikaki Ward', 'KE_Ward_1077', 'NZphHeczehh', 'NZphHeczehh', 'laOitoZMUgC', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('Nu4cnZtQHk8', 'Chesoen Ward', 'KE_Ward_984', 'm9gdonbVXjZ', 'm9gdonbVXjZ', 'Nu4cnZtQHk8', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('T7ArssRHW3p', 'Chevaywa Ward', 'KE_Ward_995', 'ZOdhgR19Akq', 'ZOdhgR19Akq', 'T7ArssRHW3p', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('Fuc7wSQ4gkN', 'Chewani Ward', 'KE_Ward_94', 'A4SNYCxrrnv', 'A4SNYCxrrnv', 'Fuc7wSQ4gkN', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('SDz17fk0X0k', 'Chewele Ward', 'KE_Ward_96', 'yWPcTwGwQ2B', 'yWPcTwGwQ2B', 'SDz17fk0X0k', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('rZ0Io1sU38M', 'Chiakagira Ward', 'KE_Ward_309', 'Yz1V5Cx8CO2', 'Yz1V5Cx8CO2', 'rZ0Io1sU38M', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('aNuklGLRul5', 'Chilchila Ward', 'KE_Ward_943', 'Taw0Zg7nArd', 'Taw0Zg7nArd', 'aNuklGLRul5', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('rFsKRF8TYWO', 'Chinga Ward', 'KE_Ward_485', 'dd7jowvUO95', 'dd7jowvUO95', 'rFsKRF8TYWO', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('yQ9Js5EZ61q', 'Chogoria Ward', 'KE_Ward_300', 'wQ8XjZ7zVwL', 'wQ8XjZ7zVwL', 'yQ9Js5EZ61q', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('CHn58eAvVl9', 'Chuluni Ward', 'KE_Ward_361', 'd0Gu8FrRM0Y', 'd0Gu8FrRM0Y', 'CHn58eAvVl9', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('gF0VBsLJhxK', 'Churo/Amaya Ward', 'KE_Ward_787', 'st4v8xfqgJf', 'st4v8xfqgJf', 'gF0VBsLJhxK', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('woYqYmbk8hx', 'Cianda Ward', 'KE_Ward_586', 'oMaQgNIs85x', 'oMaQgNIs85x', 'woYqYmbk8hx', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('bF28Xs26tXA', 'Clay City Ward', 'KE_Ward_1396', 'FoqzDgIByL6', 'FoqzDgIByL6', 'bF28Xs26tXA', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('rgdgbj0yHfG', 'Dabaso Ward', 'KE_Ward_54', 'MEkEH8ZmcOU', 'MEkEH8ZmcOU', 'rgdgbj0yHfG', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('MG7qx3dHgee', 'Dadaab Ward', 'KE_Ward_147', 'EW4Jw4dVWBt', 'EW4Jw4dVWBt', 'MG7qx3dHgee', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('qLYEefMIqQ0', 'Dadaja Bulla Ward', 'KE_Ward_186', 'U7KFQn3Up3o', 'U7KFQn3Up3o', 'qLYEefMIqQ0', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('oqGH96tt2v4', 'Dalalekutuk Ward', 'KE_Ward_918', 'SZapM1R0Kti', 'SZapM1R0Kti', 'oqGH96tt2v4', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('Iz7ISZHUk3Q', 'Damajale Ward', 'KE_Ward_149', 'EW4Jw4dVWBt', 'EW4Jw4dVWBt', 'Iz7ISZHUk3Q', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('b1Z4WVS2owC', 'Danaba Ward', 'KE_Ward_166', 'qsjAa8FE8OS', 'qsjAa8FE8OS', 'b1Z4WVS2owC', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('UrLRfZeC3Oq', 'Dandora Area III Ward', 'KE_Ward_1414', 'SSz1iOv28Jk', 'SSz1iOv28Jk', 'UrLRfZeC3Oq', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('KhxCmDKgYMT', 'Dandora Area II Ward', 'KE_Ward_1413', 'SSz1iOv28Jk', 'SSz1iOv28Jk', 'KhxCmDKgYMT', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('rj9COmxBpVr', 'Dandora Area Iv Ward', 'KE_Ward_1415', 'SSz1iOv28Jk', 'SSz1iOv28Jk', 'rj9COmxBpVr', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('Qusks6YHAmd', 'Dandora Area I Ward', 'KE_Ward_1412', 'SSz1iOv28Jk', 'SSz1iOv28Jk', 'Qusks6YHAmd', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('vuSQ9fTFw30', 'Dandu Ward', 'KE_Ward_194', 'H5RvDZkoDJL', 'H5RvDZkoDJL', 'vuSQ9fTFw30', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('ap7BwqlvdFg', 'Danyere Ward', 'KE_Ward_136', 'FGBNPr91pXH', 'FGBNPr91pXH', 'ap7BwqlvdFg', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('LDPAHGr7qUm', 'Dedan Kimathi Ward', 'KE_Ward_466', 'YT3tecc4atw', 'YT3tecc4atw', 'LDPAHGr7qUm', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('RXFwsNh7egy', 'Dekaharia Ward', 'KE_Ward_153', 'RScEHA3V38d', 'RScEHA3V38d', 'RXFwsNh7egy', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('FpUMvmJqkG2', 'Della Ward', 'KE_Ward_181', 'x6Z1sBeiyqQ', 'x6Z1sBeiyqQ', 'FpUMvmJqkG2', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('C72ryGO9u3f', 'Derkhale Ward', 'KE_Ward_197', 'hCvlJNjyZna', 'hCvlJNjyZna', 'C72ryGO9u3f', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('s9YsYYqvjAs', 'Dertu Ward', 'KE_Ward_146', 'EW4Jw4dVWBt', 'EW4Jw4dVWBt', 's9YsYYqvjAs', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('jXyH8e9KzGe', 'Diif Ward', 'KE_Ward_190', 'U7KFQn3Up3o', 'U7KFQn3Up3o', 'jXyH8e9KzGe', '2026-03-16 11:14:39', '2026-03-16 11:14:39'),
('kSbjSiQEQ91', 'Dukana Ward', 'KE_Ward_228', 'j6fqt5TYqPZ', 'j6fqt5TYqPZ', 'kSbjSiQEQ91', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Ff1CJ0oXLRy', 'Dundori Ward', 'KE_Ward_865', 'nwh9bXKykiS', 'nwh9bXKykiS', 'Ff1CJ0oXLRy', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('lijbuerznbA', 'Dzombo Ward', 'KE_Ward_36', 'TdcYaufNV4p', 'TdcYaufNV4p', 'lijbuerznbA', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('cfUqqHJA6z4', 'East Asembo Ward', 'KE_Ward_1181', 'XcRpb1xsM64', 'XcRpb1xsM64', 'cfUqqHJA6z4', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('nUVin4tYKY2', 'East Gem Ward', 'KE_Ward_1173', 'iK2Jk2AxhlD', 'iK2Jk2AxhlD', 'nUVin4tYKY2', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('lZT0FbLOn0I', 'East Kabras Ward', 'KE_Ward_1004', 'ES1CWa4AJmJ', 'ES1CWa4AJmJ', 'lZT0FbLOn0I', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('RvsMMMCame7', 'East Kamagak Ward', 'KE_Ward_1224', 'NhsAMiaS0TD', 'NhsAMiaS0TD', 'RvsMMMCame7', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('l8btuTBphnw', 'East Kamagambo Ward', 'KE_Ward_1263', 'fT37q3rXQ35', 'fT37q3rXQ35', 'l8btuTBphnw', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('ONutw6s6W4y', 'East Kano/Wawidhi Ward', 'KE_Ward_1206', 'iRK9uABUTVZ', 'iRK9uABUTVZ', 'ONutw6s6W4y', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('IgyJtGgB69M', 'East Kanyamkago Ward', 'KE_Ward_1281', 'fCInDXluNhx', 'fCInDXluNhx', 'IgyJtGgB69M', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('i1zR9ESXM9L', 'Eastleigh North Ward', 'KE_Ward_1435', 'qoLIT7y5f5c', 'qoLIT7y5f5c', 'i1zR9ESXM9L', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('zP3xgQdPmJX', 'Eastleigh South Ward', 'KE_Ward_1436', 'qoLIT7y5f5c', 'qoLIT7y5f5c', 'zP3xgQdPmJX', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('jhQaAr01YU5', 'East Sang\'alo Ward', 'KE_Ward_1101', 'CUjthlounWV', 'CUjthlounWV', 'jhQaAr01YU5', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('BRDtIETwfeW', 'East Seme Ward', 'KE_Ward_1204', 'LRNmnMw1fBs', 'LRNmnMw1fBs', 'BRDtIETwfeW', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('XIgwnIXyBx0', 'East Ugenya Ward', 'KE_Ward_1159', 'InECuIlzJGx', 'InECuIlzJGx', 'XIgwnIXyBx0', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('ygKYcUMKsy2', 'East Wanga Ward', 'KE_Ward_1026', 'FBteTV1eqB6', 'FBteTV1eqB6', 'ygKYcUMKsy2', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Ado6AndJdpf', 'Ekalakala Ward', 'KE_Ward_373', 'hpcb7MYi6nc', 'hpcb7MYi6nc', 'Ado6AndJdpf', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('QcYbNJ5Z88l', 'Ekerenyo Ward', 'KE_Ward_1361', 'v5qbFUgfIoF', 'v5qbFUgfIoF', 'QcYbNJ5Z88l', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('x8gYdLEuy5Y', 'El-barta Ward', 'KE_Ward_666', 'E2DGjZRlwbY', 'E2DGjZRlwbY', 'x8gYdLEuy5Y', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('dAuiI1KjvPd', 'Elben Ward', 'KE_Ward_172', 'fmNokBURXjM', 'fmNokBURXjM', 'dAuiI1KjvPd', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('X5bxxQN8nP5', 'Elburgon Ward', 'KE_Ward_827', 'RJ4LGJiSHFg', 'RJ4LGJiSHFg', 'X5bxxQN8nP5', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('jJEKwJhftfv', 'Eldas Ward', 'KE_Ward_180', 'x6Z1sBeiyqQ', 'x6Z1sBeiyqQ', 'jJEKwJhftfv', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('RSps1nz09HH', 'Elementaita Ward', 'KE_Ward_845', 'hBU8B1KI12P', 'hBU8B1KI12P', 'RSps1nz09HH', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('zxfCOXaz1ha', 'Elgon Ward', 'KE_Ward_1081', 'ZCYATXdLsL1', 'ZCYATXdLsL1', 'zxfCOXaz1ha', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('CisxX3iXbp9', 'Elnur/Tula Tula Ward', 'KE_Ward_183', 'x6Z1sBeiyqQ', 'x6Z1sBeiyqQ', 'CisxX3iXbp9', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('rIwgAyjb2JZ', 'Elugulu Ward', 'KE_Ward_1147', 'RIBiZFJxB1K', 'RIBiZFJxB1K', 'rIwgAyjb2JZ', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('h0htcHoe6tJ', 'Elwak North Ward', 'KE_Ward_209', 'qyhVIMG2rUw', 'qyhVIMG2rUw', 'h0htcHoe6tJ', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('AEMY7F8XyZT', 'Elwak South Ward', 'KE_Ward_208', 'qyhVIMG2rUw', 'qyhVIMG2rUw', 'AEMY7F8XyZT', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('rVwUPDEkBSy', 'Emabungo Ward', 'KE_Ward_1072', 'lkYdgjRSOoE', 'lkYdgjRSOoE', 'rVwUPDEkBSy', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Q1FhAEC0Ode', 'Emali/Mulala Ward', 'KE_Ward_436', 'toa2Hl7iVQI', 'toa2Hl7iVQI', 'Q1FhAEC0Ode', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('raV5YKTRCG2', 'Embakasi Ward', 'KE_Ward_1423', 'gD4xxgDGJ4Y', 'gD4xxgDGJ4Y', 'raV5YKTRCG2', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('u6ONpoWIV0d', 'Embobut/Embulot Ward', 'KE_Ward_734', 'EZraJgLdRLX', 'EZraJgLdRLX', 'u6ONpoWIV0d', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('QMzAkzZkH34', 'Embomos Ward', 'KE_Ward_990', 'PLFoYJO8MVS', 'PLFoYJO8MVS', 'QMzAkzZkH34', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('uhTYg7CLmOd', 'Emining Ward', 'KE_Ward_803', 'k5sxmlXAtIg', 'k5sxmlXAtIg', 'uhTYg7CLmOd', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('i7TCmhUejq5', 'Emsoo Ward', 'KE_Ward_742', 'rlWH0Ac9vjc', 'rlWH0Ac9vjc', 'i7TCmhUejq5', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('p0vnle5S7g2', 'Endau/Malalani Ward', 'KE_Ward_363', 'd0Gu8FrRM0Y', 'd0Gu8FrRM0Y', 'p0vnle5S7g2', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('t4cjnduc4dV', 'Endebess Ward', 'KE_Ward_681', 'PsjxYLsJSIp', 'PsjxYLsJSIp', 't4cjnduc4dV', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('pwYHLOkW31r', 'Endo Ward', 'KE_Ward_733', 'EZraJgLdRLX', 'EZraJgLdRLX', 'pwYHLOkW31r', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('WteTgAtzuJP', 'Endugh Ward', 'KE_Ward_645', 'ylWg6VvADJE', 'ylWg6VvADJE', 'WteTgAtzuJP', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('lcpTYDEAUs9', 'Engineer Ward', 'KE_Ward_441', 'RAnL5kBKMIt', 'RAnL5kBKMIt', 'lcpTYDEAUs9', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('u3IXGUmWgZ2', 'Entonet/Lenkism Ward', 'KE_Ward_931', 'eyADpAXM834', 'eyADpAXM834', 'u3IXGUmWgZ2', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('yCs7obwONR9', 'Esise Ward', 'KE_Ward_1365', 'ABuzigW8Lzw', 'ABuzigW8Lzw', 'yCs7obwONR9', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('KcXeBdcYXss', 'Etenje Ward', 'KE_Ward_1022', 'uRl5fBkhpcE', 'uRl5fBkhpcE', 'KcXeBdcYXss', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('LlyKi6c8KbT', 'Evurore Ward', 'KE_Ward_330', 'eYBXetGx8xF', 'eYBXetGx8xF', 'LlyKi6c8KbT', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Uq1zAqIJXv3', 'Ewalel/Chapchap Ward', 'KE_Ward_796', 'k7Rj54u6dMx', 'k7Rj54u6dMx', 'Uq1zAqIJXv3', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('KHFGFujHwZA', 'Ewuaso Oo Nkidong\'i Ward', 'KE_Ward_929', 'wYsCfCAUWNB', 'wYsCfCAUWNB', 'KHFGFujHwZA', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('kSajt3nW2ip', 'Fafi Ward', 'KE_Ward_155', 'RScEHA3V38d', 'RScEHA3V38d', 'kSajt3nW2ip', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('xDKzFE2qfHL', 'Faza Ward', 'KE_Ward_101', 'cwnqFyTJIgX', 'cwnqFyTJIgX', 'xDKzFE2qfHL', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('BRWO7tcujQF', 'Fino Ward', 'KE_Ward_217', 'nsfbHBS9tMT', 'nsfbHBS9tMT', 'BRWO7tcujQF', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('QIMIjxzpGyb', 'Flamingo Ward', 'KE_Ward_878', 'FBJ9Y11esHS', 'FBJ9Y11esHS', 'QIMIjxzpGyb', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('EDosdjVkXb6', 'Frere Town Ward', 'KE_Ward_16', 'sr8WEz03EnP', 'sr8WEz03EnP', 'EDosdjVkXb6', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('PLayyGokkLa', 'Gachuba Ward', 'KE_Ward_1347', 'Qn5Fff2lIDz', 'Qn5Fff2lIDz', 'PLayyGokkLa', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('H3V7py1sKHI', 'Gaichanjiru Ward', 'KE_Ward_542', 'gwYTo0wITYX', 'gwYTo0wITYX', 'H3V7py1sKHI', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('FsRuO9llshq', 'Gakawa Ward', 'KE_Ward_476', 'YXt5ETQPRlB', 'YXt5ETQPRlB', 'FsRuO9llshq', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('K6stsAPW2Eu', 'Galbet Ward', 'KE_Ward_132', 'lQkHbTC1iRg', 'lQkHbTC1iRg', 'K6stsAPW2Eu', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('ByAmsolBen5', 'Gambato Bongwe Ward', 'KE_Ward_31', 'ADMywdLwoRX', 'ADMywdLwoRX', 'ByAmsolBen5', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('gWqTliiaRaB', 'Ganda Ward', 'KE_Ward_77', 'lGg3wEy784X', 'lGg3wEy784X', 'gWqTliiaRaB', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('AIL7D1wnOIl', 'Ganga Ward', 'KE_Ward_299', 'wQ8XjZ7zVwL', 'wQ8XjZ7zVwL', 'AIL7D1wnOIl', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Y6KykEFTGUj', 'Ganyure/Wagalla Ward', 'KE_Ward_179', 'X98G0eIWdmP', 'X98G0eIWdmP', 'Y6KykEFTGUj', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('f51CfBzKknF', 'Ganze Ward', 'KE_Ward_71', 'x7qUMtZZvo9', 'x7qUMtZZvo9', 'f51CfBzKknF', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('nResMsI1yRw', 'Garashi Ward', 'KE_Ward_84', 'KMWrMZrlO5u', 'KMWrMZrlO5u', 'nResMsI1yRw', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('PoEBay5v6Vh', 'Garba Tulla Ward', 'KE_Ward_248', 'ecl4YnDebUi', 'ecl4YnDebUi', 'PoEBay5v6Vh', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('y1cIpVUXwUj', 'Garsen Central Ward', 'KE_Ward_89', 'Lj0mu9j58Ss', 'Lj0mu9j58Ss', 'y1cIpVUXwUj', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('aLLewdAnspB', 'Garsen North Ward', 'KE_Ward_91', 'Lj0mu9j58Ss', 'Lj0mu9j58Ss', 'aLLewdAnspB', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('dckG5TO7hf8', 'Garsen South Ward', 'KE_Ward_87', 'Lj0mu9j58Ss', 'Lj0mu9j58Ss', 'dckG5TO7hf8', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('urcMYGpY3xy', 'Garsen West Ward', 'KE_Ward_90', 'Lj0mu9j58Ss', 'Lj0mu9j58Ss', 'urcMYGpY3xy', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('yg2YesgFsrG', 'Gatanga Ward', 'KE_Ward_549', 'Z7ALMtFNfeZ', 'Z7ALMtFNfeZ', 'yg2YesgFsrG', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('cWSGKfzRIhc', 'Gatarakwa Ward', 'KE_Ward_473', 'odOtfcaMg4p', 'odOtfcaMg4p', 'cWSGKfzRIhc', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('xNnLSFClkz7', 'Gathanji Ward', 'KE_Ward_458', 'fVSw60UAC3W', 'fVSw60UAC3W', 'xNnLSFClkz7', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('vH5k45ZRgZG', 'Gathara Ward', 'KE_Ward_442', 'RAnL5kBKMIt', 'RAnL5kBKMIt', 'vH5k45ZRgZG', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('tWc3XLOEMO1', 'Gathigiriri Ward', 'KE_Ward_502', 'jHmpQUlnkQk', 'jHmpQUlnkQk', 'tWc3XLOEMO1', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('hh7VWuhTI6A', 'Gatimu Ward', 'KE_Ward_459', 'fVSw60UAC3W', 'fVSw60UAC3W', 'hh7VWuhTI6A', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('ufzdiFbvPYg', 'Gatina Ward', 'KE_Ward_1373', 'CcTr4bcVGAG', 'CcTr4bcVGAG', 'ufzdiFbvPYg', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('fYc1aD2k4cK', 'Gatitu/Muruguru Ward', 'KE_Ward_493', 'GXnD5lHeanK', 'GXnD5lHeanK', 'fYc1aD2k4cK', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('B1GDVDYIGwK', 'Gatongora Ward', 'KE_Ward_571', 'TPRNJqSm4lK', 'TPRNJqSm4lK', 'B1GDVDYIGwK', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('t7COLdUthus', 'Gatuanyaga Ward', 'KE_Ward_567', 'YZAZ1a9MIvX', 'YZAZ1a9MIvX', 't7COLdUthus', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Z8xEFHWnQB4', 'Gatunga Ward', 'KE_Ward_306', 'ZNXf7qiVh3t', 'ZNXf7qiVh3t', 'Z8xEFHWnQB4', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('s3eywuLj65m', 'Gaturi North Ward', 'KE_Ward_317', 'IPOMRXiYjxr', 'IPOMRXiYjxr', 's3eywuLj65m', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('FUD1yUgctME', 'Gaturi South Ward', 'KE_Ward_316', 'IPOMRXiYjxr', 'IPOMRXiYjxr', 'FUD1yUgctME', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('K8rhUYNmJhw', 'Gaturi Ward', 'KE_Ward_527', 'VDlzh6w4LKv', 'VDlzh6w4LKv', 'K8rhUYNmJhw', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('acibphi1EGX', 'Gembe Ward', 'KE_Ward_1255', 'mCGytMcMf6y', 'mCGytMcMf6y', 'acibphi1EGX', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('sHxQtj2KMIR', 'Gesima Ward', 'KE_Ward_1351', 'Qn5Fff2lIDz', 'Qn5Fff2lIDz', 'sHxQtj2KMIR', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('GC3CIljaAjo', 'Gesusu Ward', 'KE_Ward_1329', 'A6Sj8RumZ0m', 'A6Sj8RumZ0m', 'GC3CIljaAjo', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('ExTmlWkEQL9', 'Geta Ward', 'KE_Ward_451', 'KlVgeHmvG6n', 'KlVgeHmvG6n', 'ExTmlWkEQL9', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('lY9h6WKKqjC', 'Getenga Ward', 'KE_Ward_1310', 'WHG67QCDRS9', 'WHG67QCDRS9', 'lY9h6WKKqjC', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('ohWtG7fskG2', 'Gikondi Ward', 'KE_Ward_487', 'zT8Zj5vNYCy', 'zT8Zj5vNYCy', 'ohWtG7fskG2', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('xK7G5Lg2CEW', 'Gilgil Ward', 'KE_Ward_844', 'hBU8B1KI12P', 'hBU8B1KI12P', 'xK7G5Lg2CEW', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('d7jBlFuDPt7', 'Gisambai Ward', 'KE_Ward_1062', 'BXaq5PxSfz2', 'BXaq5PxSfz2', 'd7jBlFuDPt7', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('P3TwXvbGu0Y', 'Gitaru Ward', 'KE_Ward_591', 'lb5LzWiUX8Y', 'lb5LzWiUX8Y', 'P3TwXvbGu0Y', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('il32x0l8U6u', 'Githabai Ward', 'KE_Ward_447', 'RAnL5kBKMIt', 'RAnL5kBKMIt', 'il32x0l8U6u', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('eaH1r5sQTr0', 'Gither Ward', 'KE_Ward_195', 'H5RvDZkoDJL', 'H5RvDZkoDJL', 'eaH1r5sQTr0', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('jALskID8BQS', 'Githiga Ward', 'KE_Ward_813', 'E7tkGikenbD', 'E7tkGikenbD', 'jALskID8BQS', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('xK8OudWDlHV', 'Githioro Ward', 'KE_Ward_452', 'KlVgeHmvG6n', 'KlVgeHmvG6n', 'xK8OudWDlHV', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Dg4t78ouq8h', 'Githobokoni Ward', 'KE_Ward_556', 'HEsM6W2ImQR', 'HEsM6W2ImQR', 'Dg4t78ouq8h', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('NFNF57gkxbf', 'Githunguri Ward', 'KE_Ward_577', 'E7tkGikenbD', 'E7tkGikenbD', 'NFNF57gkxbf', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('FNDsOKdbWTO', 'Githurai Ward', 'KE_Ward_1391', 'j7GpbairCOi', 'j7GpbairCOi', 'FNDsOKdbWTO', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Gf7UYKPruI2', 'Gitothua Ward', 'KE_Ward_569', 'TPRNJqSm4lK', 'TPRNJqSm4lK', 'Gf7UYKPruI2', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('vR89p0TyICU', 'Gituamba Ward', 'KE_Ward_555', 'HEsM6W2ImQR', 'HEsM6W2ImQR', 'vR89p0TyICU', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('UgrVrVp78rA', 'Gitugi Ward', 'KE_Ward_519', 'u7Gkh63FYe4', 'u7Gkh63FYe4', 'UgrVrVp78rA', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Fp2Wuqu3GAI', 'God Jope Ward', 'KE_Ward_1269', 'nHEr5EciFh0', 'nHEr5EciFh0', 'Fp2Wuqu3GAI', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('cGxvLpMCjj9', 'Godoma Ward', 'KE_Ward_167', 'qsjAa8FE8OS', 'qsjAa8FE8OS', 'cGxvLpMCjj9', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Y9n3cjtnU4R', 'Gokeharaka/Getambwega Ward', 'KE_Ward_1296', 'THm2tCJa2ZQ', 'THm2tCJa2ZQ', 'Y9n3cjtnU4R', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('jltiitEPkip', 'Golbo Ward', 'KE_Ward_224', 'sZjPgbWI5ra', 'sZjPgbWI5ra', 'jltiitEPkip', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('nsigtOm8lE7', 'Gongoni Ward', 'KE_Ward_82', 'KMWrMZrlO5u', 'KMWrMZrlO5u', 'nsigtOm8lE7', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('iOIfrzq22kC', 'Goreale Ward', 'KE_Ward_142', 'J69iWev2zwu', 'J69iWev2zwu', 'iOIfrzq22kC', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('wQeQqCSAjRy', 'Got Kachola Ward', 'KE_Ward_1287', 'D2lsuEzZAJP', 'D2lsuEzZAJP', 'wQeQqCSAjRy', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('lZqCQuWJGTO', 'Guba Ward', 'KE_Ward_198', 'hCvlJNjyZna', 'hCvlJNjyZna', 'lZqCQuWJGTO', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('w7fqbD2ws7l', 'Gurar Ward', 'KE_Ward_161', 'qsjAa8FE8OS', 'qsjAa8FE8OS', 'w7fqbD2ws7l', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('A4Ko5vFs83F', 'Guticha Ward', 'KE_Ward_202', 'jrm0uyLXnC1', 'jrm0uyLXnC1', 'A4Ko5vFs83F', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('gieorchg4LE', 'Gwassi North Ward', 'KE_Ward_1258', 'HoRW5aISmiD', 'HoRW5aISmiD', 'gieorchg4LE', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('AuOsnrKcOMF', 'Gwassi South Ward', 'KE_Ward_1257', 'HoRW5aISmiD', 'HoRW5aISmiD', 'AuOsnrKcOMF', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('HO38wbafDJg', 'Habasswein Ward', 'KE_Ward_187', 'U7KFQn3Up3o', 'U7KFQn3Up3o', 'HO38wbafDJg', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('avaUAA1j5ie', 'Hadado/Athibohol Ward', 'KE_Ward_177', 'X98G0eIWdmP', 'X98G0eIWdmP', 'avaUAA1j5ie', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('T7AinNTWtXe', 'Harambee Ward', 'KE_Ward_1432', 'wwROy3Qkwin', 'wwROy3Qkwin', 'T7AinNTWtXe', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('RYHYagSQfDF', 'Heillu/Manyatta Ward', 'KE_Ward_223', 'sZjPgbWI5ra', 'sZjPgbWI5ra', 'RYHYagSQfDF', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('ZphUbBMB5yv', 'Hellsgate Ward', 'KE_Ward_837', 'yZJJPoSGhY6', 'yZJJPoSGhY6', 'ZphUbBMB5yv', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('yCylsEe6jSZ', 'Hindi Ward', 'KE_Ward_106', 'Lfxw0DfD4jN', 'Lfxw0DfD4jN', 'yCylsEe6jSZ', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('OOiImc9uz5A', 'Homa Bay Arujo Ward', 'KE_Ward_1242', 'Ur2xRBDtazT', 'Ur2xRBDtazT', 'OOiImc9uz5A', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('zOOEW5td56i', 'Homa Bay Central Ward', 'KE_Ward_1241', 'Ur2xRBDtazT', 'Ur2xRBDtazT', 'zOOEW5td56i', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('C5EivIShRVo', 'Homa Bay East Ward', 'KE_Ward_1244', 'Ur2xRBDtazT', 'Ur2xRBDtazT', 'C5EivIShRVo', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('jjce8vXK50R', 'Homa Bay West Ward', 'KE_Ward_1243', 'Ur2xRBDtazT', 'Ur2xRBDtazT', 'jjce8vXK50R', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('att6OMwShzH', 'Hongwe Ward', 'KE_Ward_108', 'Lfxw0DfD4jN', 'Lfxw0DfD4jN', 'att6OMwShzH', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('O6JUPINK7vr', 'Hospital Ward', 'KE_Ward_691', 'pzZHpL2ueIn', 'pzZHpL2ueIn', 'O6JUPINK7vr', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('RqPb2VP0OCA', 'Hulugho Ward', 'KE_Ward_157', 'uyeif4CPqHt', 'uyeif4CPqHt', 'RqPb2VP0OCA', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('GCgCUcOL0Mz', 'Huruma Ward', 'KE_Ward_713', 'KuprsuBe1l0', 'KuprsuBe1l0', 'GCgCUcOL0Mz', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('v0dNWrWeT7B', 'Ibeno Ward', 'KE_Ward_1336', 'fFh3beH29fD', 'fFh3beH29fD', 'v0dNWrWeT7B', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('bhhINffrIu8', 'Ibrahim Ure Ward', 'KE_Ward_189', 'U7KFQn3Up3o', 'U7KFQn3Up3o', 'bhhINffrIu8', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('pjBltTaHYUz', 'Ichagaki Ward', 'KE_Ward_537', 'l46g2PZUjoh', 'l46g2PZUjoh', 'pjBltTaHYUz', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('TSCRn3jEAXw', 'Ichuni Ward', 'KE_Ward_1326', 'A6Sj8RumZ0m', 'A6Sj8RumZ0m', 'TSCRn3jEAXw', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Hh55s4mboMi', 'Idakho Central Ward', 'KE_Ward_1050', 'BE6HMtlHyl1', 'BE6HMtlHyl1', 'Hh55s4mboMi', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('WVPQgX90uxe', 'Idakho East Ward', 'KE_Ward_1048', 'BE6HMtlHyl1', 'BE6HMtlHyl1', 'WVPQgX90uxe', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('bW4Zp3tt8W7', 'Idakho North Ward', 'KE_Ward_1049', 'BE6HMtlHyl1', 'BE6HMtlHyl1', 'bW4Zp3tt8W7', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('gAnhNKgtbOq', 'Idakho South Ward', 'KE_Ward_1047', 'BE6HMtlHyl1', 'BE6HMtlHyl1', 'gAnhNKgtbOq', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('sxXb2Lcz396', 'Iftin Ward', 'KE_Ward_134', 'lQkHbTC1iRg', 'lQkHbTC1iRg', 'sxXb2Lcz396', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('SYuNHyY118o', 'Igambang\'ombe Ward', 'KE_Ward_305', 'yXwsnpFBIPW', 'yXwsnpFBIPW', 'SYuNHyY118o', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('QRgp6qqEmVn', 'Igembe East Ward', 'KE_Ward_258', 'TPfcUHno8oP', 'TPfcUHno8oP', 'QRgp6qqEmVn', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('AzpgHxbLVoh', 'Igoji East Ward', 'KE_Ward_291', 'AFIlzKNxXST', 'AFIlzKNxXST', 'AzpgHxbLVoh', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('ST78NM0nd2J', 'Igoji West Ward', 'KE_Ward_292', 'AFIlzKNxXST', 'AFIlzKNxXST', 'ST78NM0nd2J', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('q38k1nKzsRS', 'Igwamiti Ward', 'KE_Ward_815', 'pXbWrnFPpKb', 'pXbWrnFPpKb', 'q38k1nKzsRS', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('zI7CuvCQcos', 'Iichamus Ward', 'KE_Ward_799', 'dSLnPmNlm8Q', 'dSLnPmNlm8Q', 'zI7CuvCQcos', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('EgSwrsgfIho', 'Ijara Ward', 'KE_Ward_159', 'l5E6PiIUs1J', 'l5E6PiIUs1J', 'EgSwrsgfIho', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('BLSmZHA1d92', 'Ikanga/Kyatune Ward', 'KE_Ward_365', 'd3hSQ3EtnPk', 'd3hSQ3EtnPk', 'BLSmZHA1d92', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('zvhM3m7bIIh', 'Ikinu Ward', 'KE_Ward_579', 'E7tkGikenbD', 'E7tkGikenbD', 'zvhM3m7bIIh', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Q4EsypvUANP', 'Ikombe Ward', 'KE_Ward_379', 'CeukNtGhW7J', 'CeukNtGhW7J', 'Q4EsypvUANP', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('hwHZgY7hwgN', 'Ikutha Ward', 'KE_Ward_368', 'd3hSQ3EtnPk', 'd3hSQ3EtnPk', 'hwHZgY7hwgN', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('N27Hb5r1QR5', 'Ildamat Ward', 'KE_Ward_917', 'gZM3NbHaugk', 'gZM3NbHaugk', 'N27Hb5r1QR5', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('xB9PrSz7UNP', 'Ilima Ward', 'KE_Ward_423', 'pKJ4NZGPzTA', 'pKJ4NZGPzTA', 'xB9PrSz7UNP', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('lQwlJ2oi5zA', 'Ilkerin Ward', 'KE_Ward_887', 'PGTkGnIAZuy', 'PGTkGnIAZuy', 'lQwlJ2oi5zA', '2026-03-16 11:14:40', '2026-03-16 11:14:40');
INSERT INTO `wards` (`id`, `name`, `code`, `constituency_id`, `constituency_code`, `ward_code`, `created_at`, `updated_at`) VALUES
('nhKIZhNozIv', 'Illeret Ward', 'KE_Ward_232', 'j6fqt5TYqPZ', 'j6fqt5TYqPZ', 'nhKIZhNozIv', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('ckpYcQagZdJ', 'Ilmotiook Ward', 'KE_Ward_907', 'ouA247cg58A', 'ouA247cg58A', 'ckpYcQagZdJ', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('MMPnyemUFot', 'Iloodokilani Ward', 'KE_Ward_927', 'wYsCfCAUWNB', 'wYsCfCAUWNB', 'MMPnyemUFot', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Nt7PPe0Vdou', 'Imara Daima Ward', 'KE_Ward_1406', 'aDp1odOWYC1', 'aDp1odOWYC1', 'Nt7PPe0Vdou', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('ZvbwkucYq4T', 'Imaroro Ward', 'KE_Ward_925', 'g6gTzQ5nfYq', 'g6gTzQ5nfYq', 'ZvbwkucYq4T', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('fBbEs297NMY', 'Imbrikani/Eselelnkei Ward', 'KE_Ward_932', 'eyADpAXM834', 'eyADpAXM834', 'fBbEs297NMY', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('px3RqXi1FU6', 'Ingoste-matiha Ward', 'KE_Ward_1015', 'G6PJ5kFVAuO', 'G6PJ5kFVAuO', 'px3RqXi1FU6', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('upv9qERTCCI', 'Inoi Ward', 'KE_Ward_515', 'JKNaaTjVapG', 'JKNaaTjVapG', 'upv9qERTCCI', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('mKOh6Ubsn0x', 'Iria-ini Ward', 'KE_Ward_484', 'dd7jowvUO95', 'dd7jowvUO95', 'mKOh6Ubsn0x', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('kgPF6QHfrWT', 'Iriaini Ward', 'KE_Ward_479', 'vznKK4IegIL', 'vznKK4IegIL', 'kgPF6QHfrWT', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('ItjmRWn5IsE', 'Isibania Ward', 'KE_Ward_1291', 'jtBjNpL9FXS', 'jtBjNpL9FXS', 'ItjmRWn5IsE', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('msMd2VRjWK8', 'Isukha Central Ward', 'KE_Ward_1043', 'sjlSPeRgl7d', 'sjlSPeRgl7d', 'msMd2VRjWK8', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('LwmmrE9075H', 'Isukha East Ward', 'KE_Ward_1045', 'sjlSPeRgl7d', 'sjlSPeRgl7d', 'LwmmrE9075H', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('w6TKm6OEgE7', 'Isukha North Ward', 'KE_Ward_1041', 'sjlSPeRgl7d', 'sjlSPeRgl7d', 'w6TKm6OEgE7', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('xBOLvibwvDH', 'Isukha South Ward', 'KE_Ward_1044', 'sjlSPeRgl7d', 'sjlSPeRgl7d', 'xBOLvibwvDH', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('O32Jm6NiiBu', 'Isukha West Ward', 'KE_Ward_1046', 'sjlSPeRgl7d', 'sjlSPeRgl7d', 'O32Jm6NiiBu', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('qduwDtFCdfH', 'Ithanga Ward', 'KE_Ward_545', 'Z7ALMtFNfeZ', 'Z7ALMtFNfeZ', 'qduwDtFCdfH', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Wdh5QDM2Ov1', 'Ithiru Ward', 'KE_Ward_543', 'gwYTo0wITYX', 'gwYTo0wITYX', 'Wdh5QDM2Ov1', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('ojhmHJxovB6', 'Itibo Ward', 'KE_Ward_1357', 'v5qbFUgfIoF', 'v5qbFUgfIoF', 'ojhmHJxovB6', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('wFxBj0Hldme', 'Ivingoni/Nzambani Ward', 'KE_Ward_440', 'ZhhyithPNoI', 'ZhhyithPNoI', 'wFxBj0Hldme', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('OoG4wdaPLM8', 'Jarajara Ward', 'KE_Ward_137', 'FGBNPr91pXH', 'FGBNPr91pXH', 'OoG4wdaPLM8', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('P8C6Fcb3Q8n', 'Jarajila Ward', 'KE_Ward_154', 'RScEHA3V38d', 'RScEHA3V38d', 'P8C6Fcb3Q8n', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('JLTt8kf6vtA', 'Jaribuni Ward', 'KE_Ward_73', 'x7qUMtZZvo9', 'x7qUMtZZvo9', 'JLTt8kf6vtA', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('USg05TR1JwK', 'Jepkoyai Ward', 'KE_Ward_1067', 'BXaq5PxSfz2', 'BXaq5PxSfz2', 'USg05TR1JwK', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('nqJwUrOo66m', 'Jilore Ward', 'KE_Ward_75', 'lGg3wEy784X', 'lGg3wEy784X', 'nqJwUrOo66m', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('T0eflkFOYOF', 'Jomvu Kuu Ward', 'KE_Ward_6', 'vSISrsNNHwq', 'vSISrsNNHwq', 'T0eflkFOYOF', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('WsPnZQHN2CZ', 'Juja Ward', 'KE_Ward_561', 'aiqi2bz0IMI', 'aiqi2bz0IMI', 'WsPnZQHN2CZ', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('sHr1V63b6gP', 'Junda Ward', 'KE_Ward_10', 'C1hO6wNOgrH', 'C1hO6wNOgrH', 'sHr1V63b6gP', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('FyFIsGw4IJR', 'Junju Ward', 'KE_Ward_58', 'xWAZBULwGxp', 'xWAZBULwGxp', 'FyFIsGw4IJR', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('samkZKoOfyP', 'Kaaleng/Kaikor Ward', 'KE_Ward_614', 'mWpq607yRXh', 'mWpq607yRXh', 'samkZKoOfyP', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('E8dTFNJYgtl', 'Kabare Ward', 'KE_Ward_504', 'yOaHQLOLd1H', 'yOaHQLOLd1H', 'E8dTFNJYgtl', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Kn2aiEXbw5B', 'Kabarnet Ward', 'KE_Ward_793', 'k7Rj54u6dMx', 'k7Rj54u6dMx', 'Kn2aiEXbw5B', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('hOymt7wmmCI', 'Kabartonjo Ward', 'KE_Ward_789', 'bqtTmWcikTN', 'bqtTmWcikTN', 'hOymt7wmmCI', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('fB16JFnw8Ex', 'Kabaru Ward', 'KE_Ward_475', 'YXt5ETQPRlB', 'YXt5ETQPRlB', 'fB16JFnw8Ex', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('KYyRxF09EOm', 'Kabatini Ward', 'KE_Ward_866', 'nwh9bXKykiS', 'nwh9bXKykiS', 'KYyRxF09EOm', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('JwFjLbUSxbO', 'Kabazi Ward', 'KE_Ward_859', 'zQEuNRaPYgE', 'zQEuNRaPYgE', 'JwFjLbUSxbO', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('ERl76hzXrr7', 'Kabete Ward', 'KE_Ward_594', 'lb5LzWiUX8Y', 'lb5LzWiUX8Y', 'ERl76hzXrr7', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('yr6iJLD5JmG', 'Kabianga Ward', 'KE_Ward_958', 'YnIAWg1T4AY', 'YnIAWg1T4AY', 'yr6iJLD5JmG', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('ZUMLw8HBqqW', 'Kabiemit Ward', 'KE_Ward_749', 'SOEG546PqbA', 'SOEG546PqbA', 'ZUMLw8HBqqW', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Kzpb8gvmSkz', 'Kabiro Ward', 'KE_Ward_1375', 'CcTr4bcVGAG', 'CcTr4bcVGAG', 'Kzpb8gvmSkz', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('upEtsdaf6Ri', 'Kabisaga Ward', 'KE_Ward_779', 'Xtb7tbJpk9p', 'Xtb7tbJpk9p', 'upEtsdaf6Ri', '2026-03-16 11:14:40', '2026-03-16 11:14:40'),
('Qno2Rye1no5', 'Kabiyet Ward', 'KE_Ward_777', 'Xtb7tbJpk9p', 'Xtb7tbJpk9p', 'Qno2Rye1no5', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('nYfCFgklbTM', 'Kabondo East Ward', 'KE_Ward_1226', 'BzFBYZhF5fx', 'BzFBYZhF5fx', 'nYfCFgklbTM', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('zkOTNmaTloy', 'Kabondo West Ward', 'KE_Ward_1227', 'BzFBYZhF5fx', 'BzFBYZhF5fx', 'zkOTNmaTloy', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('LCXl4ftRJYy', 'Kabonyo/Kanyagwai Ward', 'KE_Ward_1209', 'iRK9uABUTVZ', 'iRK9uABUTVZ', 'LCXl4ftRJYy', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('MLB4Nr73Nsh', 'Kabouch North Ward', 'KE_Ward_1248', 'i2Y2fyNoFyZ', 'i2Y2fyNoFyZ', 'MLB4Nr73Nsh', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('g9tqOcjTCbA', 'Kabuchai/Chwele Ward', 'KE_Ward_1085', 'k1mze33jOs0', 'k1mze33jOs0', 'g9tqOcjTCbA', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('sIW2S02bdN0', 'Kabula Ward', 'KE_Ward_1092', 'jkQZEow83MX', 'jkQZEow83MX', 'sIW2S02bdN0', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('eScf0oeCcVI', 'Kabuoch South/Pala Ward', 'KE_Ward_1249', 'i2Y2fyNoFyZ', 'i2Y2fyNoFyZ', 'eScf0oeCcVI', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('Wh8ROphCMld', 'Kabwareng Ward', 'KE_Ward_755', 'Sq2fLWnOCGg', 'Sq2fLWnOCGg', 'Wh8ROphCMld', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('yowhezRzMGg', 'Kachien\'g Ward', 'KE_Ward_1282', 'D2lsuEzZAJP', 'D2lsuEzZAJP', 'yowhezRzMGg', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('FydnlJp81aR', 'Kadzandani Ward', 'KE_Ward_20', 'sr8WEz03EnP', 'sr8WEz03EnP', 'FydnlJp81aR', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('PfM59R0hE2L', 'Kaeris Ward', 'KE_Ward_611', 'mWpq607yRXh', 'mWpq607yRXh', 'PfM59R0hE2L', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('kiVPb44vhiR', 'Kagaari North Ward', 'KE_Ward_320', 'kMSLkN4nsRl', 'kMSLkN4nsRl', 'kiVPb44vhiR', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('QpKvk4GkYRI', 'Kagaari South Ward', 'KE_Ward_318', 'kMSLkN4nsRl', 'kMSLkN4nsRl', 'QpKvk4GkYRI', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('V6fgSDAq913', 'Kagan Ward', 'KE_Ward_1239', 'iK2Jk2AxhlD', 'iK2Jk2AxhlD', 'V6fgSDAq913', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('qNMJbWjRI45', 'Kagundu-ini Ward', 'KE_Ward_541', 'gwYTo0wITYX', 'gwYTo0wITYX', 'qNMJbWjRI45', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('Lc6GluslY9h', 'Kahawa/Sukari Ward', 'KE_Ward_572', 'TPRNJqSm4lK', 'TPRNJqSm4lK', 'Lc6GluslY9h', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('ihmR2IRWnpi', 'Kahawa Ward', 'KE_Ward_1395', 'j7GpbairCOi', 'j7GpbairCOi', 'ihmR2IRWnpi', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('w3MNsmpJJHX', 'Kahawa Wendani Ward', 'KE_Ward_573', 'TPRNJqSm4lK', 'TPRNJqSm4lK', 'w3MNsmpJJHX', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('gJel307q0y1', 'Kahawa West Ward', 'KE_Ward_1392', 'j7GpbairCOi', 'j7GpbairCOi', 'gJel307q0y1', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('X7arkK99dq7', 'Kahumbu Ward', 'KE_Ward_528', 'tyfDsdZ1h3R', 'tyfDsdZ1h3R', 'X7arkK99dq7', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('hYNt8KLy0zR', 'Kaimbaga Ward', 'KE_Ward_456', 'Lm9RMwhIu3G', 'Lm9RMwhIu3G', 'hYNt8KLy0zR', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('xyzeTkTa8o7', 'Kajulu Ward', 'KE_Ward_1186', 'PRpKwAloU5b', 'PRpKwAloU5b', 'xyzeTkTa8o7', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('SUvzbKCIzyN', 'Kakrao Ward', 'KE_Ward_1271', 'nHEr5EciFh0', 'nHEr5EciFh0', 'SUvzbKCIzyN', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('zwpctzVflwm', 'Kaksingiri West Ward', 'KE_Ward_1259', 'HoRW5aISmiD', 'HoRW5aISmiD', 'zwpctzVflwm', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('bg4tS3m8rZA', 'Kakuma Ward', 'KE_Ward_617', 'HK5SUCMQmsw', 'HK5SUCMQmsw', 'bg4tS3m8rZA', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('ckJv892Aokb', 'Kakuyuni Ward', 'KE_Ward_76', 'lGg3wEy784X', 'lGg3wEy784X', 'ckJv892Aokb', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('v5Uz1hZEGu3', 'Kakuzi/Mitubiri Ward', 'KE_Ward_546', 'Z7ALMtFNfeZ', 'Z7ALMtFNfeZ', 'v5Uz1hZEGu3', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('X0dFLUEZDlw', 'Kalama Ward', 'KE_Ward_398', 'pJDgmrxMQTn', 'pJDgmrxMQTn', 'X0dFLUEZDlw', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('H6EZtZr2dWo', 'Kalapata Ward', 'KE_Ward_636', 'iTw0sFjlqZ2', 'iTw0sFjlqZ2', 'H6EZtZr2dWo', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('EQCXKT8S5SE', 'Kalawa Ward', 'KE_Ward_416', 'jxjGWCdfsib', 'jxjGWCdfsib', 'EQCXKT8S5SE', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('edSLoK3sx6W', 'Kaler Ward', 'KE_Ward_1286', 'D2lsuEzZAJP', 'D2lsuEzZAJP', 'edSLoK3sx6W', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('Cqn7anNruE5', 'Kalimoni Ward', 'KE_Ward_563', 'aiqi2bz0IMI', 'aiqi2bz0IMI', 'Cqn7anNruE5', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('WwMThzLSS3I', 'Kalobeyei Ward', 'KE_Ward_621', 'HK5SUCMQmsw', 'HK5SUCMQmsw', 'WwMThzLSS3I', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('DaWvBbVWP0W', 'Kalokol Ward', 'KE_Ward_626', 'zd8rhYqGowE', 'zd8rhYqGowE', 'DaWvBbVWP0W', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('KOJIrVBHq0c', 'Kaloleni Ward', 'KE_Ward_65', 'tSKDWoVKiPo', 'tSKDWoVKiPo', 'KOJIrVBHq0c', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('NJeG4zy8zci', 'Kamacharia Ward', 'KE_Ward_521', 'u7Gkh63FYe4', 'u7Gkh63FYe4', 'NJeG4zy8zci', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('P1RSkho9WMu', 'Kamagut Ward', 'KE_Ward_710', 'KuprsuBe1l0', 'KuprsuBe1l0', 'P1RSkho9WMu', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('H7KVdIvj4Sp', 'Kamahuha Ward', 'KE_Ward_536', 'l46g2PZUjoh', 'l46g2PZUjoh', 'H7KVdIvj4Sp', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('iQw990SbVXY', 'Kamakwa/Mukaro Ward', 'KE_Ward_495', 'GXnD5lHeanK', 'GXnD5lHeanK', 'iQw990SbVXY', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('lkMaj1oAFk0', 'Kamara Ward', 'KE_Ward_856', 'QBwORnYdu0e', 'QBwORnYdu0e', 'lkMaj1oAFk0', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('upVp36SDGsU', 'Kamariny Ward', 'KE_Ward_741', 'rlWH0Ac9vjc', 'rlWH0Ac9vjc', 'upVp36SDGsU', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('O7GqFgG69Md', 'Kamasian Ward', 'KE_Ward_941', 'Taw0Zg7nArd', 'Taw0Zg7nArd', 'O7GqFgG69Md', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('rJRyj2PndJ3', 'Kambe/Ribe Ward', 'KE_Ward_69', 'hJf4rt7cvI6', 'hJf4rt7cvI6', 'rJRyj2PndJ3', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('ul9ur7nq171', 'Kambiti Ward', 'KE_Ward_535', 'l46g2PZUjoh', 'l46g2PZUjoh', 'ul9ur7nq171', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('rq7Y1sxGfgN', 'Kamburu Ward', 'KE_Ward_609', 'nCziQtZ49jj', 'nCziQtZ49jj', 'rq7Y1sxGfgN', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('A7a1GZJvTGD', 'Kamenu Ward', 'KE_Ward_565', 'YZAZ1a9MIvX', 'YZAZ1a9MIvX', 'A7a1GZJvTGD', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('ZJdVAPAukav', 'Kamera Ward', 'KE_Ward_1348', 'f3AcdRzgTwz', 'f3AcdRzgTwz', 'ZJdVAPAukav', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('krBcnnShWw6', 'Kamukuywa Ward', 'KE_Ward_1114', 'AphsS3lJwKU', 'AphsS3lJwKU', 'krBcnnShWw6', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('U0eLQb7xmyu', 'Kanamkemer Ward', 'KE_Ward_628', 'zd8rhYqGowE', 'zd8rhYqGowE', 'U0eLQb7xmyu', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('fghL5DnydV2', 'Kangai Ward', 'KE_Ward_497', 'f6EOn3xI9YH', 'f6EOn3xI9YH', 'fghL5DnydV2', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('PyVnQFcBqOT', 'Kangari Ward', 'KE_Ward_531', 'tyfDsdZ1h3R', 'tyfDsdZ1h3R', 'PyVnQFcBqOT', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('qQtpJ2wdCay', 'Kang\'atotha Ward', 'KE_Ward_625', 'zd8rhYqGowE', 'zd8rhYqGowE', 'qQtpJ2wdCay', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('HWHpeXSxVCb', 'Kangemi Ward', 'KE_Ward_1369', 'f1T0Ltob8VQ', 'f1T0Ltob8VQ', 'HWHpeXSxVCb', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('cN3gQ1BXbVr', 'Kangeta Ward', 'KE_Ward_260', 'TPfcUHno8oP', 'TPfcUHno8oP', 'cN3gQ1BXbVr', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('xcOIxh5GkD7', 'Kangundo Central Ward', 'KE_Ward_382', 'vMPhBuymSKt', 'vMPhBuymSKt', 'xcOIxh5GkD7', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('hBftnwiDBHL', 'Kangundo East Ward', 'KE_Ward_383', 'vMPhBuymSKt', 'vMPhBuymSKt', 'hBftnwiDBHL', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('GCpjuDfIVDu', 'Kangundo North Ward', 'KE_Ward_381', 'vMPhBuymSKt', 'vMPhBuymSKt', 'GCpjuDfIVDu', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('Q66EmTxlCi3', 'Kangundo West Ward', 'KE_Ward_384', 'vMPhBuymSKt', 'vMPhBuymSKt', 'Q66EmTxlCi3', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('QetTI3w7Tfe', 'Kanjuiri Range Ward', 'KE_Ward_454', 'Lm9RMwhIu3G', 'Lm9RMwhIu3G', 'QetTI3w7Tfe', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('A7U8KMUSpj1', 'Kanuni Ward', 'KE_Ward_255', 'wtuGWT7KjVm', 'wtuGWT7KjVm', 'A7U8KMUSpj1', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('MAZrrKvz7hU', 'Kanyadoto Ward', 'KE_Ward_1246', 'i2Y2fyNoFyZ', 'i2Y2fyNoFyZ', 'MAZrrKvz7hU', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('LX2KPfCBef4', 'Kanyaluo Ward', 'KE_Ward_1233', 'fmsyW02tPng', 'fmsyW02tPng', 'LX2KPfCBef4', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('QlqqWw642lA', 'Kanyamwa Kologi Ward', 'KE_Ward_1250', 'i2Y2fyNoFyZ', 'i2Y2fyNoFyZ', 'QlqqWw642lA', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('ccNnEThhT6C', 'Kanyamwa Kosewe Ward', 'KE_Ward_1251', 'i2Y2fyNoFyZ', 'i2Y2fyNoFyZ', 'ccNnEThhT6C', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('pesguszdkri', 'Kanyangi Ward', 'KE_Ward_353', 'vbauk0RRq9N', 'vbauk0RRq9N', 'pesguszdkri', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('ONNWmIVc48N', 'Kanyasa Ward', 'KE_Ward_1283', 'D2lsuEzZAJP', 'D2lsuEzZAJP', 'ONNWmIVc48N', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('WtvrxP6Ra8K', 'Kanyekini Ward', 'KE_Ward_513', 'JKNaaTjVapG', 'JKNaaTjVapG', 'WtvrxP6Ra8K', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('lJIdDl7HaCT', 'Kanyenya-ini Ward', 'KE_Ward_516', 'U9CLTNIwehR', 'U9CLTNIwehR', 'lJIdDl7HaCT', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('JY7Gu5x4aGH', 'Kanyikela Ward', 'KE_Ward_1247', 'i2Y2fyNoFyZ', 'i2Y2fyNoFyZ', 'JY7Gu5x4aGH', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('zNPxEQ4AIcH', 'Kanziku Ward', 'KE_Ward_369', 'd3hSQ3EtnPk', 'd3hSQ3EtnPk', 'zNPxEQ4AIcH', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('XMy3sTrrhew', 'Kapchemutwa Ward', 'KE_Ward_744', 'rlWH0Ac9vjc', 'rlWH0Ac9vjc', 'XMy3sTrrhew', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('AXu2vRnnxOt', 'Kapchok Ward', 'KE_Ward_654', 'YXpHG1Ez8V2', 'YXpHG1Ez8V2', 'AXu2vRnnxOt', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('kVHX5gVg5MQ', 'Kapchorua Ward', 'KE_Ward_764', 'W6Err8cQf5J', 'W6Err8cQf5J', 'kVHX5gVg5MQ', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('prqcH9XZcQe', 'Kapedo/Napeitom Ward', 'KE_Ward_638', 'dr8gOvVAdiE', 'dr8gOvVAdiE', 'prqcH9XZcQe', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('sXlDThMXKIG', 'Kapenguria Ward', 'KE_Ward_642', 'ylWg6VvADJE', 'ylWg6VvADJE', 'sXlDThMXKIG', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('deAxq0HNUFb', 'Kapkangani Ward', 'KE_Ward_771', 'Njv37QXxNy2', 'Njv37QXxNy2', 'deAxq0HNUFb', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('WIQaiUzKu6p', 'Kapkateny Ward', 'KE_Ward_1079', 'NZphHeczehh', 'NZphHeczehh', 'WIQaiUzKu6p', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('t6j6TDZfwrc', 'Kapkatet Ward', 'KE_Ward_956', 'wt8cPHWfkfu', 'wt8cPHWfkfu', 't6j6TDZfwrc', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('D2NqKgPvDTJ', 'Kapkugerwet Ward', 'KE_Ward_946', 'GshNTMZJ5r1', 'GshNTMZJ5r1', 'D2NqKgPvDTJ', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('cSNEKHwtiWH', 'Kapkures Ward', 'KE_Ward_702', 'lmr1q6dTaso', 'lmr1q6dTaso', 'cSNEKHwtiWH', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('wCRljUGZJCA', 'Kaplamai Ward', 'KE_Ward_696', 'f18kGo9yXWo', 'f18kGo9yXWo', 'wCRljUGZJCA', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('pPJvbpIWpvb', 'Kaplelartet Ward', 'KE_Ward_963', 'ScLzA7tQxrH', 'ScLzA7tQxrH', 'pPJvbpIWpvb', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('G6aklDidwGe', 'Kapletundo Ward', 'KE_Ward_969', 'KyuSYunELJI', 'KyuSYunELJI', 'G6aklDidwGe', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('zkVfk8cWPc2', 'Kapomboi Ward', 'KE_Ward_676', 'ABy8CNqf2e7', 'ABy8CNqf2e7', 'zkVfk8cWPc2', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('er24ckvh14d', 'Kapropita Ward', 'KE_Ward_797', 'k7Rj54u6dMx', 'k7Rj54u6dMx', 'er24ckvh14d', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('VjsUVNylWoY', 'Kapsabet Ward', 'KE_Ward_772', 'Njv37QXxNy2', 'Njv37QXxNy2', 'VjsUVNylWoY', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('Itj44Rse7au', 'Kapsaos Ward', 'KE_Ward_949', 'KuprsuBe1l0', 'KuprsuBe1l0', 'Itj44Rse7au', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('D9H082cdWsj', 'Kapsasian Ward', 'KE_Ward_890', 'PGTkGnIAZuy', 'PGTkGnIAZuy', 'D9H082cdWsj', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('omJY4Wxjhwr', 'Kapsimwotwo Ward', 'KE_Ward_754', 'NPYRMdqrK6L', 'NPYRMdqrK6L', 'omJY4Wxjhwr', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('oNPVt1oUD8L', 'Kapsoit Ward', 'KE_Ward_944', 'GshNTMZJ5r1', 'GshNTMZJ5r1', 'oNPVt1oUD8L', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('bxngHzifzKY', 'Kapsowar Ward', 'KE_Ward_739', 'fNCuk4Lpsnh', 'fNCuk4Lpsnh', 'bxngHzifzKY', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('H9e1tEercdW', 'Kapsoya Ward', 'KE_Ward_719', 'mYlMs4xTj82', 'mYlMs4xTj82', 'H9e1tEercdW', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('t50eEX07TcG', 'Kapsuser Ward', 'KE_Ward_961', 'YnIAWg1T4AY', 'YnIAWg1T4AY', 't50eEX07TcG', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('cYwuj1W0Wux', 'Kaptagat Ward', 'KE_Ward_720', 'mYlMs4xTj82', 'mYlMs4xTj82', 'cYwuj1W0Wux', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('X2TaEHQHj6z', 'Kaptama Ward', 'KE_Ward_1080', 'ZCYATXdLsL1', 'ZCYATXdLsL1', 'X2TaEHQHj6z', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('elLT94gpbch', 'Kaptarakwa Ward', 'KE_Ward_745', 'SOEG546PqbA', 'SOEG546PqbA', 'elLT94gpbch', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('i590M8uyKeM', 'Kaptel/Kamoiywo Ward', 'KE_Ward_768', 'xLWuQq3DjOR', 'xLWuQq3DjOR', 'i590M8uyKeM', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('q6DoWWo1dCR', 'Kaptembwo Ward', 'KE_Ward_872', 'KTayLusaU5I', 'KTayLusaU5I', 'q6DoWWo1dCR', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('qj48MUGxhs9', 'Kaptumo/Kaboi Ward', 'KE_Ward_759', 'Sq2fLWnOCGg', 'Sq2fLWnOCGg', 'qj48MUGxhs9', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('BQ7G5kGe1Cv', 'Kaputiei North Ward', 'KE_Ward_921', 'g6gTzQ5nfYq', 'g6gTzQ5nfYq', 'BQ7G5kGe1Cv', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('AR58QjsFekn', 'Kaputir Ward', 'KE_Ward_633', 'iTw0sFjlqZ2', 'iTw0sFjlqZ2', 'AR58QjsFekn', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('SNs5tEDSO0k', 'Kapyego Ward', 'KE_Ward_731', 'EZraJgLdRLX', 'EZraJgLdRLX', 'SNs5tEDSO0k', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('rdJwRuqqUHC', 'Karai Ward', 'KE_Ward_596', 'jOVcLeZQSsS', 'jOVcLeZQSsS', 'rdJwRuqqUHC', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('HuKVPCdKkZ0', 'Karama Ward', 'KE_Ward_275', 'U3lGZ71W9Te', 'U3lGZ71W9Te', 'HuKVPCdKkZ0', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('MhwOKHDNTsU', 'Karare Ward', 'KE_Ward_234', 'WILszL634oZ', 'WILszL634oZ', 'MhwOKHDNTsU', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('oCDeWaZZImt', 'Karatina Town Ward', 'KE_Ward_482', 'vznKK4IegIL', 'vznKK4IegIL', 'oCDeWaZZImt', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('b7xmixlTNYm', 'Karau Ward', 'KE_Ward_453', 'Lm9RMwhIu3G', 'Lm9RMwhIu3G', 'b7xmixlTNYm', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('clyAqa9XVNp', 'Karen Ward', 'KE_Ward_1381', 'aTGYlhEw2Xx', 'aTGYlhEw2Xx', 'clyAqa9XVNp', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('RaSqiM3lgfo', 'Kargi/South Horr Ward', 'KE_Ward_237', 'eZpy65ooW0m', 'eZpy65ooW0m', 'RaSqiM3lgfo', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('F0uYRw2XYg5', 'Kariara Ward', 'KE_Ward_550', 'Z7ALMtFNfeZ', 'Z7ALMtFNfeZ', 'F0uYRw2XYg5', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('jrWulcAQIzP', 'Karima Ward', 'KE_Ward_486', 'dd7jowvUO95', 'dd7jowvUO95', 'jrWulcAQIzP', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('UQd8QPTpVD0', 'Karingani Ward', 'KE_Ward_302', 'JmE1qRVQD4F', 'JmE1qRVQD4F', 'UQd8QPTpVD0', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('YMBLUc2euxC', 'Kariobangi North Ward', 'KE_Ward_1411', 'SSz1iOv28Jk', 'SSz1iOv28Jk', 'YMBLUc2euxC', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('WJ020FJI9yB', 'Kariobangi South Ward', 'KE_Ward_1429', 'aCwUX5V42Zz', 'aCwUX5V42Zz', 'WJ020FJI9yB', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('LAhI3yCEdB1', 'Kariti Ward', 'KE_Ward_511', 'A34NiI4rgnf', 'A34NiI4rgnf', 'LAhI3yCEdB1', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('jlthZ0Rz41H', 'Karumandi Ward', 'KE_Ward_508', 'yOaHQLOLd1H', 'yOaHQLOLd1H', 'jlthZ0Rz41H', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('AwwBKeGhmam', 'Karuna/Meibeki Ward', 'KE_Ward_716', 'q8R0FA1hxnP', 'q8R0FA1hxnP', 'AwwBKeGhmam', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('CNKaaMOOKGn', 'Karura Ward', 'KE_Ward_1368', 'f1T0Ltob8VQ', 'f1T0Ltob8VQ', 'CNKaaMOOKGn', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('eCWu3IedbJm', 'Karuri Ward', 'KE_Ward_587', 'oMaQgNIs85x', 'oMaQgNIs85x', 'eCWu3IedbJm', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('eVnnqyuwBfa', 'Kasarani Ward', 'KE_Ward_1398', 'FoqzDgIByL6', 'FoqzDgIByL6', 'eVnnqyuwBfa', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('WbEoZcJapjw', 'Kasei Ward', 'KE_Ward_653', 'YXpHG1Ez8V2', 'YXpHG1Ez8V2', 'WbEoZcJapjw', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('aom47Uzq1RZ', 'Kasemeni Ward', 'KE_Ward_50', 'LOgbecTRkbp', 'LOgbecTRkbp', 'aom47Uzq1RZ', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('eX9fqY9KVU8', 'Kasgunga Ward', 'KE_Ward_1254', 'mCGytMcMf6y', 'mCGytMcMf6y', 'eX9fqY9KVU8', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('kMQqsjpcUFH', 'Kasigau Ward', 'KE_Ward_129', 'yoGLpCTgjed', 'yoGLpCTgjed', 'kMQqsjpcUFH', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('GzIJxIa88Fg', 'Kasikeu Ward', 'KE_Ward_417', 'XAy1bjurhLU', 'XAy1bjurhLU', 'GzIJxIa88Fg', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('w0RAITw1HWe', 'Katangi Ward', 'KE_Ward_380', 'CeukNtGhW7J', 'CeukNtGhW7J', 'w0RAITw1HWe', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('vviGMt93opf', 'Kathiani Central Ward', 'KE_Ward_391', 'iCey76HYgLP', 'iCey76HYgLP', 'vviGMt93opf', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('uBWnkt16xIs', 'Kathonzweni Ward', 'KE_Ward_428', 'AIGIQpolMRn', 'AIGIQpolMRn', 'uBWnkt16xIs', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('NhFq5rXnO3r', 'Katilia Ward', 'KE_Ward_639', 'dr8gOvVAdiE', 'dr8gOvVAdiE', 'NhFq5rXnO3r', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('XtEn1yMSsKf', 'Katilu Ward', 'KE_Ward_634', 'iTw0sFjlqZ2', 'iTw0sFjlqZ2', 'XtEn1yMSsKf', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('T9ZjyItHbW9', 'Kauwi Ward', 'KE_Ward_347', 'cmWAJB5kCDW', 'cmWAJB5kCDW', 'T9ZjyItHbW9', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('arZgeTW65s5', 'Kawangware Ward', 'KE_Ward_1372', 'CcTr4bcVGAG', 'CcTr4bcVGAG', 'arZgeTW65s5', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('FzfEfKdj7p6', 'Kayafungo Ward', 'KE_Ward_64', 'tSKDWoVKiPo', 'tSKDWoVKiPo', 'FzfEfKdj7p6', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('BMzkWPbVOCH', 'Kayole Central Ward', 'KE_Ward_1417', 'XvpLXU47BKs', 'XvpLXU47BKs', 'BMzkWPbVOCH', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('ETN4UDiD5y5', 'Kayole North Ward', 'KE_Ward_1416', 'XvpLXU47BKs', 'XvpLXU47BKs', 'ETN4UDiD5y5', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('UJlaR99kRxm', 'Kayole South Ward', 'KE_Ward_1418', 'XvpLXU47BKs', 'XvpLXU47BKs', 'UJlaR99kRxm', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('tqCrm5nojsI', 'Kedowa/Kimugul Ward', 'KE_Ward_937', 'gU0Cz7Qlfss', 'gU0Cz7Qlfss', 'tqCrm5nojsI', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('YpEIAl1lcFe', 'Keekonyokie Ward', 'KE_Ward_899', 'gZM3NbHaugk', 'gZM3NbHaugk', 'YpEIAl1lcFe', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('hlz6Fo6Dr90', 'Kee Ward', 'KE_Ward_421', 'pKJ4NZGPzTA', 'pKJ4NZGPzTA', 'hlz6Fo6Dr90', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('O8hNbyssZJJ', 'Kegogi Ward', 'KE_Ward_1340', 'cQkF9l9wePP', 'cQkF9l9wePP', 'O8hNbyssZJJ', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('HSm3Cq7ZrWd', 'Keiyo Ward', 'KE_Ward_678', 'ABy8CNqf2e7', 'ABy8CNqf2e7', 'HSm3Cq7ZrWd', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('Va67VduPAgZ', 'Kembu Ward', 'KE_Ward_977', 'OZNRpww2TUK', 'OZNRpww2TUK', 'Va67VduPAgZ', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('H2b8KHTcJqM', 'Kemeloi-maraba Ward', 'KE_Ward_757', 'Sq2fLWnOCGg', 'Sq2fLWnOCGg', 'H2b8KHTcJqM', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('bBfvGmNakj6', 'Kendu Bay Town Ward', 'KE_Ward_1236', 'fmsyW02tPng', 'fmsyW02tPng', 'bBfvGmNakj6', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('KONREaUfSht', 'Kenyawa-poka Ward', 'KE_Ward_924', 'g6gTzQ5nfYq', 'g6gTzQ5nfYq', 'KONREaUfSht', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('ZSBD8btR2UC', 'Keringet Ward', 'KE_Ward_850', 'QwGkDS0DNls', 'QwGkDS0DNls', 'ZSBD8btR2UC', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('zwhTzysKfKc', 'Kerio Delta Ward', 'KE_Ward_624', 'zd8rhYqGowE', 'zd8rhYqGowE', 'zwhTzysKfKc', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('pToDCseGSVa', 'Kerugoya Ward', 'KE_Ward_514', 'JKNaaTjVapG', 'JKNaaTjVapG', 'pToDCseGSVa', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('fsE425Pq6Bo', 'Keumbu Ward', 'KE_Ward_1333', 'fFh3beH29fD', 'fFh3beH29fD', 'fsE425Pq6Bo', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('mq1FEx5vQZ4', 'Keyian Ward', 'KE_Ward_882', 'Nb6e34jNGAq', 'Nb6e34jNGAq', 'mq1FEx5vQZ4', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('AqsJZWunWRF', 'Khalaba Ward', 'KE_Ward_1099', 'CUjthlounWV', 'CUjthlounWV', 'AqsJZWunWRF', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('gVbkohpiw1f', 'Khalalio Ward', 'KE_Ward_213', 'fGr9rRvaovO', 'fGr9rRvaovO', 'gVbkohpiw1f', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('NuxGvo5cvb1', 'Khasoko Ward', 'KE_Ward_1091', 'jkQZEow83MX', 'jkQZEow83MX', 'NuxGvo5cvb1', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('U7mZiE3Hvys', 'Kholera Ward', 'KE_Ward_1028', 'ssbO49f0iLN', 'ssbO49f0iLN', 'U7mZiE3Hvys', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('PdtTwk95oki', 'Khorof/Harar Ward', 'KE_Ward_171', 'uov0yFMw9Qm', 'uov0yFMw9Qm', 'PdtTwk95oki', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('ZHnLneFdqXj', 'Kiabonyoru Ward', 'KE_Ward_1363', 'ABuzigW8Lzw', 'ABuzigW8Lzw', 'ZHnLneFdqXj', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('zP5ACOAN4ty', 'Kiagu Ward', 'KE_Ward_288', 'OnNcTsJgfvL', 'OnNcTsJgfvL', 'zP5ACOAN4ty', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('tgAB60BL0u9', 'Kiamaiko Ward', 'KE_Ward_1450', 'gh2kzpOFCeF', 'gh2kzpOFCeF', 'tgAB60BL0u9', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('wgKfulEq1ZH', 'Kiamaina Ward', 'KE_Ward_867', 'nwh9bXKykiS', 'nwh9bXKykiS', 'wgKfulEq1ZH', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('CMHN2XMxdY9', 'Kiambere Ward', 'KE_Ward_327', 'AvnM6jKoocs', 'AvnM6jKoocs', 'CMHN2XMxdY9', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('cpLjDOte8ze', 'Kiamokama Ward', 'KE_Ward_1330', 'A6Sj8RumZ0m', 'A6Sj8RumZ0m', 'cpLjDOte8ze', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('ORuLgjaAGBo', 'Kiamwangi Ward', 'KE_Ward_551', 'EcRytSSIkUq', 'EcRytSSIkUq', 'ORuLgjaAGBo', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('rjPvpKtHTus', 'Kianjai Ward', 'KE_Ward_268', 'Q4xAPhWUnYC', 'Q4xAPhWUnYC', 'rjPvpKtHTus', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('MrSf22UB5d3', 'Kibarani Ward', 'KE_Ward_53', 'MEkEH8ZmcOU', 'MEkEH8ZmcOU', 'MrSf22UB5d3', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('vzUXLmjcQsv', 'Kibauni Ward', 'KE_Ward_410', 'fYYivceocJ2', 'fYYivceocJ2', 'vzUXLmjcQsv', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('pxOm9J6SORx', 'Kibingei Ward', 'KE_Ward_1111', 'AphsS3lJwKU', 'AphsS3lJwKU', 'pxOm9J6SORx', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('IuCkCzLOGau', 'Kibirichia Ward', 'KE_Ward_289', 'xN5aPo4ZOIt', 'xN5aPo4ZOIt', 'IuCkCzLOGau', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('HUoTkec6KhI', 'Kibiri Ward', 'KE_Ward_1234', 'fmsyW02tPng', 'fmsyW02tPng', 'HUoTkec6KhI', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('dRuMh3lozxY', 'Kibish Ward', 'KE_Ward_615', 'AXNntZ7T30a', 'AXNntZ7T30a', 'dRuMh3lozxY', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('ozZP0r92ysp', 'Kiegoi/Antubochiu Ward', 'KE_Ward_252', 'wtuGWT7KjVm', 'wtuGWT7KjVm', 'ozZP0r92ysp', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('Jf0JOsPw0vn', 'Kiganjo/Mathari Ward', 'KE_Ward_491', 'GXnD5lHeanK', 'GXnD5lHeanK', 'Jf0JOsPw0vn', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('YEjn4x9gyXR', 'Kiganjo Ward', 'KE_Ward_552', 'EcRytSSIkUq', 'EcRytSSIkUq', 'YEjn4x9gyXR', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('H8uphttPusS', 'Kigumo Ward', 'KE_Ward_530', 'tyfDsdZ1h3R', 'tyfDsdZ1h3R', 'H8uphttPusS', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('L4eA6Nld41v', 'Kihara Ward', 'KE_Ward_590', 'oMaQgNIs85x', 'oMaQgNIs85x', 'L4eA6Nld41v', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('rb2nGblpg8l', 'Kihingo Ward', 'KE_Ward_832', 'gSJXzH1DM75', 'gSJXzH1DM75', 'rb2nGblpg8l', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('xaHRe14dY0G', 'Kihumbu-ini Ward', 'KE_Ward_548', 'Z7ALMtFNfeZ', 'Z7ALMtFNfeZ', 'xaHRe14dY0G', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('BSHD4ORT4xu', 'Kiine Ward', 'KE_Ward_510', 'A34NiI4rgnf', 'A34NiI4rgnf', 'BSHD4ORT4xu', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('SKXh3KXdbVU', 'Kiirua/Naari Ward', 'KE_Ward_283', 'xN5aPo4ZOIt', 'xN5aPo4ZOIt', 'SKXh3KXdbVU', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('oA6eNmEvCaj', 'Kijabe Ward', 'KE_Ward_607', 'nCziQtZ49jj', 'nCziQtZ49jj', 'oA6eNmEvCaj', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('EvQ0fdCX5Qi', 'Kikumbulyu North Ward', 'KE_Ward_433', 'toa2Hl7iVQI', 'toa2Hl7iVQI', 'EvQ0fdCX5Qi', '2026-03-16 11:14:41', '2026-03-16 11:14:41'),
('QuGPZs62NHX', 'Kikumbulyu South Ward', 'KE_Ward_434', 'toa2Hl7iVQI', 'toa2Hl7iVQI', 'QuGPZs62NHX', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('cbYznphRVBi', 'Kikuyu Ward', 'KE_Ward_599', 'jOVcLeZQSsS', 'jOVcLeZQSsS', 'cbYznphRVBi', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('DnVTXbCnup5', 'Kileleshwa Ward', 'KE_Ward_1374', 'CcTr4bcVGAG', 'CcTr4bcVGAG', 'DnVTXbCnup5', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('bFIJdjEp5Kl', 'Kilgoris Central Ward', 'KE_Ward_881', 'Nb6e34jNGAq', 'Nb6e34jNGAq', 'bFIJdjEp5Kl', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('kHfVrUAnNlI', 'Kilibwoni Ward', 'KE_Ward_773', 'Njv37QXxNy2', 'Njv37QXxNy2', 'kHfVrUAnNlI', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('yXbOIljEz90', 'Kilimani Ward', 'KE_Ward_1371', 'CcTr4bcVGAG', 'CcTr4bcVGAG', 'yXbOIljEz90', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('ObrcNOdPKpV', 'Kilungu Ward', 'KE_Ward_422', 'pKJ4NZGPzTA', 'pKJ4NZGPzTA', 'ObrcNOdPKpV', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('ZEJu2asfUfk', 'Kilwehiri Ward', 'KE_Ward_200', 'hCvlJNjyZna', 'hCvlJNjyZna', 'ZEJu2asfUfk', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('bMDzJFxR86n', 'Kimaeti Ward', 'KE_Ward_1093', 'jkQZEow83MX', 'jkQZEow83MX', 'bMDzJFxR86n', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('VnerQmEfHq1', 'Kima Kiu/Kalanzoni Ward', 'KE_Ward_419', 'XAy1bjurhLU', 'XAy1bjurhLU', 'VnerQmEfHq1', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('REkEoX4PR5g', 'Kimana Ward', 'KE_Ward_935', 'eyADpAXM834', 'eyADpAXM834', 'REkEoX4PR5g', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('E9RhI4J0cKC', 'Kimilili Ward', 'KE_Ward_1112', 'AphsS3lJwKU', 'AphsS3lJwKU', 'E9RhI4J0cKC', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('pco0T7Zsd6V', 'Kiminini Ward', 'KE_Ward_688', 'pzZHpL2ueIn', 'pzZHpL2ueIn', 'pco0T7Zsd6V', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('BCIB2lbwUN4', 'Kimintet Ward', 'KE_Ward_885', 'Nb6e34jNGAq', 'Nb6e34jNGAq', 'BCIB2lbwUN4', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('D8f8vrysA4J', 'Kimorori/Wempa Ward', 'KE_Ward_533', 'l46g2PZUjoh', 'l46g2PZUjoh', 'D8f8vrysA4J', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('OFb6pB88hNT', 'Kimulot Ward', 'KE_Ward_987', 'PLFoYJO8MVS', 'PLFoYJO8MVS', 'OFb6pB88hNT', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('VUb1Te4ZsaL', 'Kimumu Ward', 'KE_Ward_718', 'q8R0FA1hxnP', 'q8R0FA1hxnP', 'VUb1Te4ZsaL', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('JRAYgvhoUEp', 'Kinakomba Ward', 'KE_Ward_92', 'A4SNYCxrrnv', 'A4SNYCxrrnv', 'JRAYgvhoUEp', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('DnlusvsKIKj', 'Kinale Ward', 'KE_Ward_606', 'nCziQtZ49jj', 'nCziQtZ49jj', 'DnlusvsKIKj', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('PrGoCfZ06gm', 'Kinango Ward', 'KE_Ward_46', 'LOgbecTRkbp', 'LOgbecTRkbp', 'PrGoCfZ06gm', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('COrVDPRzUZp', 'Kinanie Ward', 'KE_Ward_395', 'BxfsSc6Svrc', 'BxfsSc6Svrc', 'COrVDPRzUZp', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('uHJ0GgTgj0p', 'Kingandole Ward', 'KE_Ward_1143', 'RIBiZFJxB1K', 'RIBiZFJxB1K', 'uHJ0GgTgj0p', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('EzxiXXOQex6', 'Kinguchwa Ward', 'KE_Ward_273', 'NIVPdmQjQKg', 'NIVPdmQjQKg', 'EzxiXXOQex6', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('um7zkcazal1', 'Kinna Ward', 'KE_Ward_249', 'ecl4YnDebUi', 'ecl4YnDebUi', 'um7zkcazal1', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('pOKIONEzUyF', 'Kinondo Ward', 'KE_Ward_33', 'ADMywdLwoRX', 'ADMywdLwoRX', 'pOKIONEzUyF', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('WoFjxj90Kle', 'Kinoo Ward', 'KE_Ward_600', 'jOVcLeZQSsS', 'jOVcLeZQSsS', 'WoFjxj90Kle', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('bpbzvOdMDqN', 'Kinyona Ward', 'KE_Ward_532', 'tyfDsdZ1h3R', 'tyfDsdZ1h3R', 'bpbzvOdMDqN', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('Qc2e6oVTp0G', 'Kinyoro Ward', 'KE_Ward_683', 'y2M16lesMsF', 'y2M16lesMsF', 'Qc2e6oVTp0G', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('o25UHSbQwGY', 'Kiogoro Ward', 'KE_Ward_1334', 'fFh3beH29fD', 'fFh3beH29fD', 'o25UHSbQwGY', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('vpiZlB5cdK7', 'Kiomo/Kyethani Ward', 'KE_Ward_339', 'svwbDnzhgik', 'svwbDnzhgik', 'vpiZlB5cdK7', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('H7KO7IjHYfk', 'Kipchebor Ward', 'KE_Ward_947', 'GshNTMZJ5r1', 'GshNTMZJ5r1', 'H7KO7IjHYfk', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('pI2ju7BZsfE', 'Kipchimchim Ward', 'KE_Ward_948', 'GshNTMZJ5r1', 'GshNTMZJ5r1', 'pI2ju7BZsfE', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('Eswb97MIEP8', 'Kipevu Ward', 'KE_Ward_2', 'OvI6w06DhPJ', 'OvI6w06DhPJ', 'Eswb97MIEP8', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('UD0FqqyuxBJ', 'Kipini East Ward', 'KE_Ward_86', 'Lj0mu9j58Ss', 'Lj0mu9j58Ss', 'UD0FqqyuxBJ', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('SmP2VkWU2f9', 'Kipini West Ward', 'KE_Ward_88', 'Lj0mu9j58Ss', 'Lj0mu9j58Ss', 'SmP2VkWU2f9', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('EAMXljqgEhV', 'Kipipiri Ward', 'KE_Ward_450', 'KlVgeHmvG6n', 'KlVgeHmvG6n', 'EAMXljqgEhV', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('Dfh61wYrllH', 'Kipkaren Ward', 'KE_Ward_775', 'Xtb7tbJpk9p', 'Xtb7tbJpk9p', 'Dfh61wYrllH', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('fLlw3oVxfPp', 'Kipkelion Ward', 'KE_Ward_942', 'Taw0Zg7nArd', 'Taw0Zg7nArd', 'fLlw3oVxfPp', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('JZrMfy0ZEjq', 'Kipkenyo Ward', 'KE_Ward_723', 'u9yagZzK49q', 'u9yagZzK49q', 'JZrMfy0ZEjq', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('U9vp5b6AuGm', 'Kiplombe Ward', 'KE_Ward_711', 'KuprsuBe1l0', 'KuprsuBe1l0', 'U9vp5b6AuGm', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('dDmN1rie0ij', 'Kipreres Ward', 'KE_Ward_979', 'OZNRpww2TUK', 'OZNRpww2TUK', 'dDmN1rie0ij', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('tSBIbHLo6tl', 'Kipsomba Ward', 'KE_Ward_705', 'lmr1q6dTaso', 'lmr1q6dTaso', 'tSBIbHLo6tl', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('p5Z6myFYERX', 'Kipsonoi Ward', 'KE_Ward_968', 'KyuSYunELJI', 'KyuSYunELJI', 'p5Z6myFYERX', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('wKz9Uw8QczF', 'Kiptagich Ward', 'KE_Ward_851', 'QwGkDS0DNls', 'QwGkDS0DNls', 'wKz9Uw8QczF', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('ZHKOkipqYxf', 'Kiptororo Ward', 'KE_Ward_853', 'QBwORnYdu0e', 'QBwORnYdu0e', 'ZHKOkipqYxf', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('KfApxlzUoLn', 'Kiptuiya Ward', 'KE_Ward_769', 'xLWuQq3DjOR', 'xLWuQq3DjOR', 'KfApxlzUoLn', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('GjGpfHjSGbO', 'Kirimari Ward', 'KE_Ward_315', 'IPOMRXiYjxr', 'IPOMRXiYjxr', 'GjGpfHjSGbO', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('xPtYtS4uaVJ', 'Kirimukuyu Ward', 'KE_Ward_481', 'msIc1uFAY6B', 'msIc1uFAY6B', 'xPtYtS4uaVJ', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('xzY6X2bhxaT', 'Kiritta Ward', 'KE_Ward_463', 'EESGLsSLTqH', 'EESGLsSLTqH', 'xzY6X2bhxaT', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('g28fToPCZhp', 'Kiru Ward', 'KE_Ward_520', 'u7Gkh63FYe4', 'u7Gkh63FYe4', 'g28fToPCZhp', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('gccbvaIlS0w', 'Kisa Central Ward', 'KE_Ward_1040', 'UhQS2Mv0PCK', 'UhQS2Mv0PCK', 'gccbvaIlS0w', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('YROnQ32WW3W', 'Kisa East Ward', 'KE_Ward_1038', 'UhQS2Mv0PCK', 'UhQS2Mv0PCK', 'YROnQ32WW3W', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('LYDEE54oZAu', 'Kisanana Ward', 'KE_Ward_804', 'k5sxmlXAtIg', 'k5sxmlXAtIg', 'LYDEE54oZAu', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('XFOc3lfOj2x', 'Kisa North Ward', 'KE_Ward_1037', 'UhQS2Mv0PCK', 'UhQS2Mv0PCK', 'XFOc3lfOj2x', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('ZkMkC815uDw', 'Kisasi Ward', 'KE_Ward_350', 'vbauk0RRq9N', 'vbauk0RRq9N', 'ZkMkC815uDw', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('S3ZBq5xn6AN', 'Kisa West Ward', 'KE_Ward_1039', 'UhQS2Mv0PCK', 'UhQS2Mv0PCK', 'S3ZBq5xn6AN', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('isMgPdVs6v0', 'Kisiara Ward', 'KE_Ward_950', 'wt8cPHWfkfu', 'wt8cPHWfkfu', 'isMgPdVs6v0', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('IO0zXx5HVO2', 'Kisii Central Ward', 'KE_Ward_1332', 'fFh3beH29fD', 'fFh3beH29fD', 'IO0zXx5HVO2', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('jhoqnpxdZY7', 'Kisima Ward', 'KE_Ward_282', 'XlYC8FMUgxi', 'XlYC8FMUgxi', 'jhoqnpxdZY7', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('SPH4pigpmjD', 'Kisumu North Ward', 'KE_Ward_1193', 'YzEDO9Mq4TR', 'YzEDO9Mq4TR', 'SPH4pigpmjD', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('L6v0cndEtYB', 'Kitengela Ward', 'KE_Ward_922', 'g6gTzQ5nfYq', 'g6gTzQ5nfYq', 'L6v0cndEtYB', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('Y9QRNvbj4ig', 'Kiteta-kisau Ward', 'KE_Ward_414', 'jxjGWCdfsib', 'jxjGWCdfsib', 'Y9QRNvbj4ig', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('LELK9LZb2qR', 'Kithimani Ward', 'KE_Ward_378', 'CeukNtGhW7J', 'CeukNtGhW7J', 'LELK9LZb2qR', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('lMTHF7AFCSP', 'Kithimu Ward', 'KE_Ward_312', 'IPOMRXiYjxr', 'IPOMRXiYjxr', 'lMTHF7AFCSP', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('kbwrNLg8qn9', 'Kithungo/Kitundu Ward', 'KE_Ward_413', 'jxjGWCdfsib', 'jxjGWCdfsib', 'kbwrNLg8qn9', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('Jcz6ykVTJxT', 'Kitise/Kithuki Ward', 'KE_Ward_427', 'AIGIQpolMRn', 'AIGIQpolMRn', 'Jcz6ykVTJxT', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('TpTOC5VcUGe', 'Kitisuru Ward', 'KE_Ward_1366', 'f1T0Ltob8VQ', 'f1T0Ltob8VQ', 'TpTOC5VcUGe', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('E731mef9qpf', 'Kitutu Central Ward', 'KE_Ward_1344', 'gPR82w2xgJZ', 'gPR82w2xgJZ', 'E731mef9qpf', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('fmWYhwoFxe8', 'Kiunga Ward', 'KE_Ward_102', 'cwnqFyTJIgX', 'cwnqFyTJIgX', 'fmWYhwoFxe8', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('PN1D8Nm8ufZ', 'Kiuu Ward', 'KE_Ward_574', 'TPRNJqSm4lK', 'TPRNJqSm4lK', 'PN1D8Nm8ufZ', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('Z1lLfOZ4sab', 'Kivaa Ward', 'KE_Ward_371', 'hpcb7MYi6nc', 'hpcb7MYi6nc', 'Z1lLfOZ4sab', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('Xl4sI0chC8S', 'Kivou Ward', 'KE_Ward_341', 'uE7HKhqPOtf', 'uE7HKhqPOtf', 'Xl4sI0chC8S', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('OFGHDVtVGOl', 'Kivumbuni Ward', 'KE_Ward_877', 'FBJ9Y11esHS', 'FBJ9Y11esHS', 'OFGHDVtVGOl', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('Yvjwozdmf1M', 'Kiwawa Ward', 'KE_Ward_655', 'YXpHG1Ez8V2', 'YXpHG1Ez8V2', 'Yvjwozdmf1M', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('YxP90gGjD63', 'Kobujoi Ward', 'KE_Ward_758', 'Sq2fLWnOCGg', 'Sq2fLWnOCGg', 'YxP90gGjD63', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('s2NvoXiAGWj', 'Kobura Ward', 'KE_Ward_1210', 'iRK9uABUTVZ', 'iRK9uABUTVZ', 's2NvoXiAGWj', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('ODrYkIYLlui', 'Kochia Ward', 'KE_Ward_1240', 'iK2Jk2AxhlD', 'iK2Jk2AxhlD', 'ODrYkIYLlui', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('wVGyi6a7FKs', 'Kodich Ward', 'KE_Ward_652', 'YXpHG1Ez8V2', 'YXpHG1Ez8V2', 'wVGyi6a7FKs', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('NFMLHmkjDil', 'Koibatek Ward', 'KE_Ward_810', 'Yl9UDBnDvvW', 'Yl9UDBnDvvW', 'NFMLHmkjDil', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('FdJzxSJbjk3', 'Kojwach Ward', 'KE_Ward_1229', 'BzFBYZhF5fx', 'BzFBYZhF5fx', 'FdJzxSJbjk3', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('dPxooReTfTv', 'Kokwanyo/Kakelo Ward', 'KE_Ward_1228', 'BzFBYZhF5fx', 'BzFBYZhF5fx', 'dPxooReTfTv', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('RWCExNJBqjw', 'Kola Ward', 'KE_Ward_404', 'pJDgmrxMQTn', 'pJDgmrxMQTn', 'RWCExNJBqjw', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('LTWLjOZQMqk', 'Kolowa Ward', 'KE_Ward_782', 'Mk4bMOSMRTB', 'Mk4bMOSMRTB', 'LTWLjOZQMqk', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('ml7KNIMIuvz', 'Kolwa Central Ward', 'KE_Ward_1190', 'PRpKwAloU5b', 'PRpKwAloU5b', 'ml7KNIMIuvz', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('kQXcKGM8chb', 'Kolwa East Ward', 'KE_Ward_1187', 'PRpKwAloU5b', 'PRpKwAloU5b', 'kQXcKGM8chb', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('I6S3XcUsF34', 'Komarock Ward', 'KE_Ward_1419', 'XvpLXU47BKs', 'XvpLXU47BKs', 'I6S3XcUsF34', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('Tqs3YLWw30B', 'Komothai Ward', 'KE_Ward_581', 'E7tkGikenbD', 'E7tkGikenbD', 'Tqs3YLWw30B', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('pOsTvaq49pN', 'Kondele Ward', 'KE_Ward_1200', 'OpLt8IgyHop', 'OpLt8IgyHop', 'pOsTvaq49pN', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('IBgG8lef22L', 'Kong\'asis Ward', 'KE_Ward_971', 'PUhMyfDD2xp', 'PUhMyfDD2xp', 'IBgG8lef22L', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('mluOaVta06m', 'Kongoni Ward', 'KE_Ward_999', 'wMv0s3U2nnG', 'wMv0s3U2nnG', 'mluOaVta06m', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('LMCJ2zXfHyL', 'Kongowea Ward', 'KE_Ward_19', 'sr8WEz03EnP', 'sr8WEz03EnP', 'LMCJ2zXfHyL', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('rGu0Fh2c3kI', 'Konyu Ward', 'KE_Ward_480', 'vznKK4IegIL', 'vznKK4IegIL', 'rGu0Fh2c3kI', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('TqSqq39Jbcz', 'Korogocho Ward', 'KE_Ward_1405', 'Cc8uEFkzfVf', 'Cc8uEFkzfVf', 'TqSqq39Jbcz', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('nbDWw7ouQOZ', 'Korondile Ward', 'KE_Ward_163', 'qsjAa8FE8OS', 'qsjAa8FE8OS', 'nbDWw7ouQOZ', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('si4GkeAGSXo', 'Korr/Ngurunit Ward', 'KE_Ward_238', 'eZpy65ooW0m', 'eZpy65ooW0m', 'si4GkeAGSXo', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('k9ff5zzhfkX', 'Kosirai Ward', 'KE_Ward_766', 'xLWuQq3DjOR', 'xLWuQq3DjOR', 'k9ff5zzhfkX', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('z3pqrBr5TyV', 'Kotaruk/Lobei Ward', 'KE_Ward_629', 'OZiGQn2R8kK', 'OZiGQn2R8kK', 'z3pqrBr5TyV', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('UBMIBBujflT', 'Koyo/Ndurio Ward', 'KE_Ward_760', 'Sq2fLWnOCGg', 'Sq2fLWnOCGg', 'UBMIBBujflT', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('gBgXSPT0eml', 'Koyonzo Ward', 'KE_Ward_1027', 'ssbO49f0iLN', 'ssbO49f0iLN', 'gBgXSPT0eml', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('dQkHuP0kVjq', 'Kubo South Ward', 'KE_Ward_42', 'wUNEDOnx9uB', 'wUNEDOnx9uB', 'dQkHuP0kVjq', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('HglOFYGPmKB', 'Kuinet/Kapsuswa Ward', 'KE_Ward_707', 'lmr1q6dTaso', 'lmr1q6dTaso', 'HglOFYGPmKB', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('aLPl4YD1hzh', 'Kuku Ward', 'KE_Ward_933', 'eyADpAXM834', 'eyADpAXM834', 'aLPl4YD1hzh', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('phnXUDE38Bv', 'Kunyak Ward', 'KE_Ward_940', 'Taw0Zg7nArd', 'Taw0Zg7nArd', 'phnXUDE38Bv', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('UDgBjC3Y1eU', 'Kurgung/Surungai Ward', 'KE_Ward_776', 'Xtb7tbJpk9p', 'Xtb7tbJpk9p', 'UDgBjC3Y1eU', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('J9PHxsmBzgD', 'Kutulo Ward', 'KE_Ward_207', 'iGFdm333PJ2', 'iGFdm333PJ2', 'J9PHxsmBzgD', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('Fsxrjp3QlVa', 'Kwabwai Ward', 'KE_Ward_1245', 'i2Y2fyNoFyZ', 'i2Y2fyNoFyZ', 'Fsxrjp3QlVa', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('rWDqxS3mGCY', 'Kwamutonga/Kithumula Ward', 'KE_Ward_349', 'cmWAJB5kCDW', 'cmWAJB5kCDW', 'rWDqxS3mGCY', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('XnWPNKPDxxo', 'Kwa Njenga Ward', 'KE_Ward_1407', 'aDp1odOWYC1', 'aDp1odOWYC1', 'XnWPNKPDxxo', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('PXmcdkpTB68', 'Kwanza Ward', 'KE_Ward_677', 'ABy8CNqf2e7', 'ABy8CNqf2e7', 'PXmcdkpTB68', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('HvcGWkiIxjp', 'Kwa Reuben Ward', 'KE_Ward_1408', 'aDp1odOWYC1', 'aDp1odOWYC1', 'HvcGWkiIxjp', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('A1sIHVzJM77', 'Kware Ward', 'KE_Ward_1410', 'aDp1odOWYC1', 'aDp1odOWYC1', 'A1sIHVzJM77', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('LHmp6sPE2w7', 'Kwavonza/Yatta Ward', 'KE_Ward_352', 'vbauk0RRq9N', 'vbauk0RRq9N', 'LHmp6sPE2w7', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('YKABD0bh2a7', 'Kwa Ward', 'KE_Ward_1272', 'nHEr5EciFh0', 'nHEr5EciFh0', 'YKABD0bh2a7', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('XCMLultdtNW', 'Kyangwithya East Ward', 'KE_Ward_358', 'MWqQbxWqACn', 'MWqQbxWqACn', 'XCMLultdtNW', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('ENDuWpU74vp', 'Kyangwithya West Ward', 'KE_Ward_356', 'MWqQbxWqACn', 'MWqQbxWqACn', 'ENDuWpU74vp', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('XgDHRzDJYER', 'Kyeleni Ward', 'KE_Ward_389', 'GnixPSqaV6D', 'GnixPSqaV6D', 'XgDHRzDJYER', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('QRBxWEQZUpe', 'Kyeni North Ward', 'KE_Ward_321', 'kMSLkN4nsRl', 'kMSLkN4nsRl', 'QRBxWEQZUpe', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('hA5gPMwN9gK', 'Kyeni South Ward', 'KE_Ward_322', 'kMSLkN4nsRl', 'kMSLkN4nsRl', 'hA5gPMwN9gK', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('tKZn1p295Nb', 'Kyome/Thaana Ward', 'KE_Ward_336', 'svwbDnzhgik', 'svwbDnzhgik', 'tKZn1p295Nb', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('WJLrTzwzXNb', 'Kyuso Ward', 'KE_Ward_332', 'KXM9VnhuLfP', 'KXM9VnhuLfP', 'WJLrTzwzXNb', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('IqrzDYsRJpA', 'Labisgale Ward', 'KE_Ward_148', 'EW4Jw4dVWBt', 'EW4Jw4dVWBt', 'IqrzDYsRJpA', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('LtPutnKuKqO', 'Lafey Ward', 'KE_Ward_218', 'nsfbHBS9tMT', 'nsfbHBS9tMT', 'LtPutnKuKqO', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('feWwmqlVMEq', 'Lagboghoi South Ward', 'KE_Ward_188', 'U7KFQn3Up3o', 'U7KFQn3Up3o', 'feWwmqlVMEq', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('rBlQZ6By4ru', 'Lagsure Ward', 'KE_Ward_193', 'H5RvDZkoDJL', 'H5RvDZkoDJL', 'rBlQZ6By4ru', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('sFC62axqvzl', 'Laini Saba Ward', 'KE_Ward_1386', 'LO5he3DtiFG', 'LO5he3DtiFG', 'sFC62axqvzl', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('WWr7jojWGHJ', 'Laisamis Ward', 'KE_Ward_240', 'eZpy65ooW0m', 'eZpy65ooW0m', 'WWr7jojWGHJ', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('xbHueeSJ4j8', 'Lake View Ward', 'KE_Ward_838', 'yZJJPoSGhY6', 'yZJJPoSGhY6', 'xbHueeSJ4j8', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('yVMtm0p4OeM', 'Lakezone Ward', 'KE_Ward_612', 'mWpq607yRXh', 'mWpq607yRXh', 'yVMtm0p4OeM', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('xgSKqiZof82', 'Lakoley South/Basir Ward', 'KE_Ward_182', 'x6Z1sBeiyqQ', 'x6Z1sBeiyqQ', 'xgSKqiZof82', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('vbgVuQPf9j7', 'Lambwe Ward', 'KE_Ward_1256', 'mCGytMcMf6y', 'mCGytMcMf6y', 'vbgVuQPf9j7', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('oYFOeehTMK2', 'Landimawe Ward', 'KE_Ward_1443', 'nKHlZyN0lt9', 'nKHlZyN0lt9', 'oYFOeehTMK2', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('uojD9lkbubw', 'Lanet/Umoja Ward', 'KE_Ward_868', 'nwh9bXKykiS', 'nwh9bXKykiS', 'uojD9lkbubw', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('ZBnsczLPwr2', 'Langas Ward', 'KE_Ward_726', 'u9yagZzK49q', 'u9yagZzK49q', 'ZBnsczLPwr2', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('sKV3BVTK2cJ', 'Lapur Ward', 'KE_Ward_613', 'mWpq607yRXh', 'mWpq607yRXh', 'sKV3BVTK2cJ', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('BB9s4d9DV70', 'Lare Ward', 'KE_Ward_834', 'gSJXzH1DM75', 'gSJXzH1DM75', 'BB9s4d9DV70', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('NfJb3vThwG5', 'Lari/Kirenga Ward', 'KE_Ward_610', 'nCziQtZ49jj', 'nCziQtZ49jj', 'NfJb3vThwG5', '2026-03-16 11:14:42', '2026-03-16 11:14:42');
INSERT INTO `wards` (`id`, `name`, `code`, `constituency_id`, `constituency_code`, `ward_code`, `created_at`, `updated_at`) VALUES
('NfgFPylvlvN', 'Lelan Ward', 'KE_Ward_659', 'u2zJahNiSP5', 'u2zJahNiSP5', 'NfgFPylvlvN', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('iZNVvlnVxm6', 'Lelmoko/Ngechek Ward', 'KE_Ward_767', 'xLWuQq3DjOR', 'xLWuQq3DjOR', 'iZNVvlnVxm6', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('YoFhsT3n9Ln', 'Lembus Kwen Ward', 'KE_Ward_806', 'Yl9UDBnDvvW', 'Yl9UDBnDvvW', 'YoFhsT3n9Ln', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('NmgTZ010rTT', 'Lembus/Perkerra Ward', 'KE_Ward_809', 'Yl9UDBnDvvW', 'Yl9UDBnDvvW', 'NmgTZ010rTT', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('KUL5AR13rwy', 'Lembus Ward', 'KE_Ward_805', 'Yl9UDBnDvvW', 'Yl9UDBnDvvW', 'KUL5AR13rwy', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('Nv8G0Ki2owJ', 'Leshau/Pondo Ward', 'KE_Ward_462', 'EESGLsSLTqH', 'EESGLsSLTqH', 'Nv8G0Ki2owJ', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('be0Y1B0phrY', 'Letea Ward', 'KE_Ward_619', 'HK5SUCMQmsw', 'HK5SUCMQmsw', 'be0Y1B0phrY', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('r9itCpitueT', 'Libehia Ward', 'KE_Ward_216', 'nsfbHBS9tMT', 'nsfbHBS9tMT', 'r9itCpitueT', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('OazP6bDZAb4', 'Liboi Ward', 'KE_Ward_150', 'EW4Jw4dVWBt', 'EW4Jw4dVWBt', 'OazP6bDZAb4', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('y9LgUAIGBj7', 'Likoni Ward', 'KE_Ward_24', 'iy93Mmi73Or', 'iy93Mmi73Or', 'y9LgUAIGBj7', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('tzPsC2kiU56', 'Likuyani Ward', 'KE_Ward_997', 'wMv0s3U2nnG', 'wMv0s3U2nnG', 'tzPsC2kiU56', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('DwOhEdMGpB7', 'Limuru Central Ward', 'KE_Ward_602', 'xhVi71INcFs', 'xhVi71INcFs', 'DwOhEdMGpB7', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('JbltwguSYWn', 'Limuru East Ward', 'KE_Ward_604', 'xhVi71INcFs', 'xhVi71INcFs', 'JbltwguSYWn', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('taVVtCXxo50', 'Lindi Ward', 'KE_Ward_1387', 'LO5he3DtiFG', 'LO5he3DtiFG', 'taVVtCXxo50', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('rkbxH4r1ceD', 'Litein Ward', 'KE_Ward_954', 'wt8cPHWfkfu', 'wt8cPHWfkfu', 'rkbxH4r1ceD', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('p8Vk2rQT2gg', 'Lobokat Ward', 'KE_Ward_635', 'iTw0sFjlqZ2', 'iTw0sFjlqZ2', 'p8Vk2rQT2gg', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('PRuQd7VjO3x', 'Lodokejek Ward', 'KE_Ward_661', 'EmQRGVtvWy3', 'EmQRGVtvWy3', 'PRuQd7VjO3x', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('v27o9CuZh11', 'Lodwar Township Ward', 'KE_Ward_627', 'zd8rhYqGowE', 'zd8rhYqGowE', 'v27o9CuZh11', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('ooyM9K6FAXE', 'Loglogo Ward', 'KE_Ward_239', 'eZpy65ooW0m', 'eZpy65ooW0m', 'ooyM9K6FAXE', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('jRyJjLWoDig', 'Loima Ward', 'KE_Ward_631', 'OZiGQn2R8kK', 'OZiGQn2R8kK', 'jRyJjLWoDig', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('Xo0N7hDyvPP', 'Loita Ward', 'KE_Ward_904', 'bnYzgzYe2Z7', 'bnYzgzYe2Z7', 'Xo0N7hDyvPP', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('A7kJTCLxqNq', 'Loiyamorok Ward', 'KE_Ward_785', 'st4v8xfqgJf', 'st4v8xfqgJf', 'A7kJTCLxqNq', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('xjbfzSmFPMk', 'Loiyangalani Ward', 'KE_Ward_236', 'eZpy65ooW0m', 'eZpy65ooW0m', 'xjbfzSmFPMk', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('Dg2JnSl7lk7', 'Lokichar Ward', 'KE_Ward_637', 'iTw0sFjlqZ2', 'iTw0sFjlqZ2', 'Dg2JnSl7lk7', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('U3CWX2tDcnG', 'Lokichoggio Ward', 'KE_Ward_622', 'HK5SUCMQmsw', 'HK5SUCMQmsw', 'U3CWX2tDcnG', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('eQng6vyva8H', 'Lokiriama/Lorengippi Ward', 'KE_Ward_632', 'OZiGQn2R8kK', 'OZiGQn2R8kK', 'eQng6vyva8H', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('AY46zJ3BT9H', 'Lokori/Kochodin Ward', 'KE_Ward_640', 'dr8gOvVAdiE', 'dr8gOvVAdiE', 'AY46zJ3BT9H', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('jhNc8UIGW4Y', 'Lolgorian Ward', 'KE_Ward_886', 'Nb6e34jNGAq', 'Nb6e34jNGAq', 'jhNc8UIGW4Y', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('V9GqRwFec0l', 'Lomut Ward', 'KE_Ward_649', 'SCbMzaOeTuR', 'SCbMzaOeTuR', 'V9GqRwFec0l', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('hnO1LFuQFvR', 'Londiani Ward', 'KE_Ward_936', 'gU0Cz7Qlfss', 'gU0Cz7Qlfss', 'hnO1LFuQFvR', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('LdShr7Egg6N', 'London Ward', 'KE_Ward_871', 'KTayLusaU5I', 'KTayLusaU5I', 'LdShr7Egg6N', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('drrGwAxlRtW', 'Longisa Ward', 'KE_Ward_978', 'OZNRpww2TUK', 'OZNRpww2TUK', 'drrGwAxlRtW', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('cZkc98eBxNL', 'Loosuk Ward', 'KE_Ward_664', 'EmQRGVtvWy3', 'EmQRGVtvWy3', 'cZkc98eBxNL', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('Mdegig3qDW9', 'Lopur Ward', 'KE_Ward_618', 'HK5SUCMQmsw', 'HK5SUCMQmsw', 'Mdegig3qDW9', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('uRN4WDLAPSP', 'Lower Kaewa/Kaani Ward', 'KE_Ward_393', 'iCey76HYgLP', 'iCey76HYgLP', 'uRN4WDLAPSP', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('Qjd5eRv25sb', 'Lower Savannah Ward', 'KE_Ward_1422', 'gD4xxgDGJ4Y', 'gD4xxgDGJ4Y', 'Qjd5eRv25sb', '2026-03-16 11:14:42', '2026-03-16 11:14:42'),
('P35Hsu3jEza', 'Luanda South Ward', 'KE_Ward_1071', 'lkYdgjRSOoE', 'lkYdgjRSOoE', 'P35Hsu3jEza', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('ZD3ThdrdoTN', 'Luanda Township Ward', 'KE_Ward_1068', 'lkYdgjRSOoE', 'lkYdgjRSOoE', 'ZD3ThdrdoTN', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('cUX8GhsuLPn', 'Lucky Summer Ward', 'KE_Ward_1404', 'Cc8uEFkzfVf', 'Cc8uEFkzfVf', 'cUX8GhsuLPn', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('af8ohZ5YbyQ', 'Lugaga-wamuluma Ward', 'KE_Ward_1051', 'OOF3UX4yOt7', 'OOF3UX4yOt7', 'af8ohZ5YbyQ', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('QDeZMYaTxpd', 'Lugari Ward', 'KE_Ward_992', 'ZOdhgR19Akq', 'ZOdhgR19Akq', 'QDeZMYaTxpd', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('F2TBdrJClsv', 'Lumakanda Ward', 'KE_Ward_993', 'ZOdhgR19Akq', 'ZOdhgR19Akq', 'F2TBdrJClsv', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('V3ZV8jsqN0Z', 'Lusheya/Lubinu Ward', 'KE_Ward_1024', 'FBteTV1eqB6', 'FBteTV1eqB6', 'V3ZV8jsqN0Z', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('nNiOxPPdyhk', 'Lwandanyi Ward', 'KE_Ward_1084', 'whWfFA9D7td', 'whWfFA9D7td', 'nNiOxPPdyhk', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('nbaDAo4y7cH', 'Lwandeti Ward', 'KE_Ward_996', 'ZOdhgR19Akq', 'ZOdhgR19Akq', 'nbaDAo4y7cH', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('QbCSvi9H3CN', 'Lyaduywa/Izava Ward', 'KE_Ward_1055', 'urtJSF5jcBC', 'urtJSF5jcBC', 'QbCSvi9H3CN', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('weu7m3lq9xG', 'Maalamin Ward', 'KE_Ward_143', 'J69iWev2zwu', 'J69iWev2zwu', 'weu7m3lq9xG', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('rD8Z7AgYLaS', 'Mabatini Ward', 'KE_Ward_1446', 'gh2kzpOFCeF', 'gh2kzpOFCeF', 'rD8Z7AgYLaS', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('NGRN2o3qN2r', 'Macalder/Kanyarwanda Ward', 'KE_Ward_1285', 'D2lsuEzZAJP', 'D2lsuEzZAJP', 'NGRN2o3qN2r', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('bSXsHJ4bnCw', 'Machakos Central Ward', 'KE_Ward_401', 'KXc4ez8OAFz', 'KXc4ez8OAFz', 'bSXsHJ4bnCw', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('GQFH01xLj74', 'Machewa Ward', 'KE_Ward_687', 'y2M16lesMsF', 'y2M16lesMsF', 'GQFH01xLj74', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('wfUbX2QagwS', 'Mackinon Road Ward', 'KE_Ward_47', 'LOgbecTRkbp', 'LOgbecTRkbp', 'wfUbX2QagwS', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('yTb02ghmk0V', 'Madogo Ward', 'KE_Ward_100', 'yWPcTwGwQ2B', 'yWPcTwGwQ2B', 'yTb02ghmk0V', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('fRDUt04TIg5', 'Maeilla Ward', 'KE_Ward_840', 'yZJJPoSGhY6', 'yZJJPoSGhY6', 'fRDUt04TIg5', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('ZZrtQfVb4kP', 'Maeni Ward', 'KE_Ward_1113', 'AphsS3lJwKU', 'AphsS3lJwKU', 'ZZrtQfVb4kP', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('bSdHZBeB5bQ', 'Magadi Ward', 'KE_Ward_928', 'wYsCfCAUWNB', 'wYsCfCAUWNB', 'bSdHZBeB5bQ', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('uI1MltAs8p3', 'Magarini Ward', 'KE_Ward_81', 'KMWrMZrlO5u', 'KMWrMZrlO5u', 'uI1MltAs8p3', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('DHNNNbrtKX9', 'Magenche Ward', 'KE_Ward_1314', 'ntRK47D5dYL', 'ntRK47D5dYL', 'DHNNNbrtKX9', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('dUh1anGaJK6', 'Magogoni Ward', 'KE_Ward_14', 'C1hO6wNOgrH', 'C1hO6wNOgrH', 'dUh1anGaJK6', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('s7u7anGLs0p', 'Magombo Ward', 'KE_Ward_1349', 'f3AcdRzgTwz', 'f3AcdRzgTwz', 's7u7anGLs0p', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('vGpXQ5hFNmS', 'Magumoni Ward', 'KE_Ward_303', 'JmE1qRVQD4F', 'JmE1qRVQD4F', 'vGpXQ5hFNmS', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('BBQbdCSiXdl', 'Magumu Ward', 'KE_Ward_448', 'RAnL5kBKMIt', 'RAnL5kBKMIt', 'BBQbdCSiXdl', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('AZOhKeOxHR7', 'Magutu Ward', 'KE_Ward_478', 'vznKK4IegIL', 'vznKK4IegIL', 'AZOhKeOxHR7', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('AAVwWFH70cF', 'Magwagwa Ward', 'KE_Ward_1360', 'v5qbFUgfIoF', 'v5qbFUgfIoF', 'AAVwWFH70cF', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('OikFajghArn', 'Mahiakalo Ward', 'KE_Ward_1013', 'Y3NjAhiBaZT', 'Y3NjAhiBaZT', 'OikFajghArn', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('t5i5lYBO7C5', 'Mahiga Ward', 'KE_Ward_483', 'dd7jowvUO95', 'dd7jowvUO95', 't5i5lYBO7C5', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('AUs81wSmXra', 'Mahoo Ward', 'KE_Ward_112', 'jNzRdAwjaQ1', 'jNzRdAwjaQ1', 'AUs81wSmXra', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('hratVLq4Zft', 'Maikona Ward', 'KE_Ward_229', 'j6fqt5TYqPZ', 'j6fqt5TYqPZ', 'hratVLq4Zft', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('l7oNy9qaqWe', 'Mai Mahiu Ward', 'KE_Ward_839', 'yZJJPoSGhY6', 'yZJJPoSGhY6', 'l7oNy9qaqWe', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('i1bANekmIzQ', 'Majengo Ward', 'KE_Ward_30', 'C1xuoa1NAMm', 'C1xuoa1NAMm', 'i1bANekmIzQ', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('u5iwkT3DDNJ', 'Maji Moto/Naroosura Ward', 'KE_Ward_901', 'bnYzgzYe2Z7', 'bnYzgzYe2Z7', 'u5iwkT3DDNJ', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('fOorbUi6HUx', 'Majoge Basi Ward', 'KE_Ward_1323', 'YqYSkwmOtiR', 'YqYSkwmOtiR', 'fOorbUi6HUx', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('AoN9iYrVOUP', 'Makima Ward', 'KE_Ward_324', 'AvnM6jKoocs', 'AvnM6jKoocs', 'AoN9iYrVOUP', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('tZfKaFDQcdW', 'Makina Ward', 'KE_Ward_1388', 'LO5he3DtiFG', 'LO5he3DtiFG', 'tZfKaFDQcdW', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('HHjcyeBEO9W', 'Makindu Ward', 'KE_Ward_431', 'toa2Hl7iVQI', 'toa2Hl7iVQI', 'HHjcyeBEO9W', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('ov2muONmDh8', 'Makongeni Ward', 'KE_Ward_1433', 'wwROy3Qkwin', 'wwROy3Qkwin', 'ov2muONmDh8', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('LFDB6rHVYOg', 'Makutano/Mwala Ward', 'KE_Ward_406', 'fYYivceocJ2', 'fYYivceocJ2', 'LFDB6rHVYOg', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('s38X4K1qhST', 'Makutano Ward', 'KE_Ward_695', 'f18kGo9yXWo', 'f18kGo9yXWo', 's38X4K1qhST', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('U3N4bJZ2BL0', 'Makuyu Ward', 'KE_Ward_534', 'l46g2PZUjoh', 'l46g2PZUjoh', 'U3N4bJZ2BL0', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('Kvj0YdYa6ZO', 'Malaba Central Ward', 'KE_Ward_1121', 'GpEIlwz3FvT', 'GpEIlwz3FvT', 'Kvj0YdYa6ZO', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('jvY4ig8JLYY', 'Malaba North Ward', 'KE_Ward_1122', 'GpEIlwz3FvT', 'GpEIlwz3FvT', 'jvY4ig8JLYY', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('VG4qlKr4Z2A', 'Malaba South Ward', 'KE_Ward_1126', 'GpEIlwz3FvT', 'GpEIlwz3FvT', 'VG4qlKr4Z2A', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('LFTRMczCZWE', 'Malaha/Isongo/Makunga Ward', 'KE_Ward_1025', 'FBteTV1eqB6', 'FBteTV1eqB6', 'LFTRMczCZWE', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('ftbk97ko25V', 'Malakisi/South Kulisiru Ward', 'KE_Ward_1083', 'whWfFA9D7td', 'whWfFA9D7td', 'ftbk97ko25V', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('xCH1F3gEsNr', 'Malewa West Ward', 'KE_Ward_847', 'hBU8B1KI12P', 'hBU8B1KI12P', 'xCH1F3gEsNr', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('u6oi5OySCnQ', 'Malindi Town Ward', 'KE_Ward_78', 'lGg3wEy784X', 'lGg3wEy784X', 'u6oi5OySCnQ', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('pRYo5vME6Ca', 'Malkagufu Ward', 'KE_Ward_164', 'qsjAa8FE8OS', 'qsjAa8FE8OS', 'pRYo5vME6Ca', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('eLXthnYAfFd', 'Malkamari Ward', 'KE_Ward_199', 'hCvlJNjyZna', 'hCvlJNjyZna', 'eLXthnYAfFd', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('oQbUJJHfsbX', 'Manda-shivanga Ward', 'KE_Ward_1006', 'ES1CWa4AJmJ', 'ES1CWa4AJmJ', 'oQbUJJHfsbX', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('zfVQ2KNTfgY', 'Manga Ward', 'KE_Ward_1350', 'f3AcdRzgTwz', 'f3AcdRzgTwz', 'zfVQ2KNTfgY', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('C5gJnXO6h1Y', 'Mang\'u Ward', 'KE_Ward_558', 'HEsM6W2ImQR', 'HEsM6W2ImQR', 'C5gJnXO6h1Y', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('It7fWcKbcZX', 'Manyatta B Ward', 'KE_Ward_1188', 'PRpKwAloU5b', 'PRpKwAloU5b', 'It7fWcKbcZX', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('vURFh88SwIe', 'Marachi Central Ward', 'KE_Ward_1144', 'RIBiZFJxB1K', 'RIBiZFJxB1K', 'vURFh88SwIe', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('IS2J5mu8wNo', 'Marachi East Ward', 'KE_Ward_1145', 'RIBiZFJxB1K', 'RIBiZFJxB1K', 'IS2J5mu8wNo', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('uHObeeBxuHY', 'Marachi North Ward', 'KE_Ward_1146', 'RIBiZFJxB1K', 'RIBiZFJxB1K', 'uHObeeBxuHY', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('WnuuhfEMxBf', 'Marachi West Ward', 'KE_Ward_1142', 'RIBiZFJxB1K', 'RIBiZFJxB1K', 'WnuuhfEMxBf', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('Icchyn9Ob1j', 'Marafa Ward', 'KE_Ward_80', 'KMWrMZrlO5u', 'KMWrMZrlO5u', 'Icchyn9Ob1j', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('thvW4MLkf3E', 'Marakaru/Tuuti Ward', 'KE_Ward_1102', 'CUjthlounWV', 'CUjthlounWV', 'thvW4MLkf3E', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('chWsC9TTyF3', 'Maraka Ward', 'KE_Ward_1106', 'f4AOiG8fYtn', 'f4AOiG8fYtn', 'chWsC9TTyF3', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('IEBWo4HwEfq', 'Maralal Ward', 'KE_Ward_663', 'EmQRGVtvWy3', 'EmQRGVtvWy3', 'IEBWo4HwEfq', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('p8bUOZBUz0i', 'Marama Central Ward', 'KE_Ward_1033', 'K7mZpm8COh7', 'K7mZpm8COh7', 'p8bUOZBUz0i', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('CcUrOE5FsJW', 'Marama North Ward', 'KE_Ward_1035', 'K7mZpm8COh7', 'K7mZpm8COh7', 'CcUrOE5FsJW', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('NTHccL0KJ5j', 'Marama South Ward', 'KE_Ward_1036', 'K7mZpm8COh7', 'K7mZpm8COh7', 'NTHccL0KJ5j', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('cYwe7Q54BbE', 'Marama West Ward', 'KE_Ward_1032', 'K7mZpm8COh7', 'K7mZpm8COh7', 'cYwe7Q54BbE', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('BR5uAoEu5yV', 'Marani Ward', 'KE_Ward_1339', 'cQkF9l9wePP', 'cQkF9l9wePP', 'BR5uAoEu5yV', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('mX734z5OjqI', 'Mara Ward', 'KE_Ward_908', 'ouA247cg58A', 'ouA247cg58A', 'mX734z5OjqI', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('KqnktZiiyGZ', 'Marenyo-shianda Ward', 'KE_Ward_1034', 'K7mZpm8COh7', 'K7mZpm8COh7', 'KqnktZiiyGZ', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('utg5SKGYTGO', 'Mariakani Ward', 'KE_Ward_63', 'tSKDWoVKiPo', 'tSKDWoVKiPo', 'utg5SKGYTGO', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('Dcu26yytcIH', 'Mariani Ward', 'KE_Ward_301', 'yXwsnpFBIPW', 'yXwsnpFBIPW', 'Dcu26yytcIH', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('BbJmtHW0518', 'Mariashoni Ward', 'KE_Ward_826', 'RJ4LGJiSHFg', 'RJ4LGJiSHFg', 'BbJmtHW0518', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('bVD6U8Bf6As', 'Marigat Ward', 'KE_Ward_798', 'dSLnPmNlm8Q', 'dSLnPmNlm8Q', 'bVD6U8Bf6As', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('IcAegRcGuV6', 'Marimanti Ward', 'KE_Ward_310', 'Yz1V5Cx8CO2', 'Yz1V5Cx8CO2', 'IcAegRcGuV6', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('Ao5e4mVaq7w', 'Maringo/Hamza Ward', 'KE_Ward_1430', 'wwROy3Qkwin', 'wwROy3Qkwin', 'Ao5e4mVaq7w', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('wTeTHBlXnQj', 'Market Milimani Ward', 'KE_Ward_1199', 'OpLt8IgyHop', 'OpLt8IgyHop', 'wTeTHBlXnQj', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('OhvgVomhsMZ', 'Marmanet Ward', 'KE_Ward_814', 'pXbWrnFPpKb', 'pXbWrnFPpKb', 'OhvgVomhsMZ', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('h29eV4JwFGH', 'Marothile Ward', 'KE_Ward_203', 'jrm0uyLXnC1', 'jrm0uyLXnC1', 'h29eV4JwFGH', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('PVB8iZMsHnd', 'Marsabit Central Ward', 'KE_Ward_235', 'WILszL634oZ', 'WILszL634oZ', 'PVB8iZMsHnd', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('mvDV6e04X7a', 'Marungu Ward', 'KE_Ward_128', 'yoGLpCTgjed', 'yoGLpCTgjed', 'mvDV6e04X7a', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('zTD1Z6ldaEx', 'Masaba Ward', 'KE_Ward_1293', 'jtBjNpL9FXS', 'jtBjNpL9FXS', 'zTD1Z6ldaEx', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('WRLhcN3G2DL', 'Masalani Ward', 'KE_Ward_160', 'l5E6PiIUs1J', 'l5E6PiIUs1J', 'WRLhcN3G2DL', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('ZmF6haTsiNT', 'Masige East Ward', 'KE_Ward_1316', 'cooDDG3Lh3A', 'cooDDG3Lh3A', 'ZmF6haTsiNT', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('kNhuVMT4NIA', 'Masige West Ward', 'KE_Ward_1315', 'cooDDG3Lh3A', 'cooDDG3Lh3A', 'kNhuVMT4NIA', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('aN66G7fGx3m', 'Masii Ward', 'KE_Ward_407', 'fYYivceocJ2', 'fYYivceocJ2', 'aN66G7fGx3m', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('CDUIv5RI0VU', 'Masimba Ward', 'KE_Ward_1328', 'A6Sj8RumZ0m', 'A6Sj8RumZ0m', 'CDUIv5RI0VU', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('Gy8x7tShO72', 'Masinga Central Ward', 'KE_Ward_372', 'hpcb7MYi6nc', 'hpcb7MYi6nc', 'Gy8x7tShO72', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('FFfi4zTqdH2', 'Masogo/Nyang\'oma Ward', 'KE_Ward_1213', 'NmbwkQ5r5cB', 'NmbwkQ5r5cB', 'FFfi4zTqdH2', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('oVE1UXXDGcA', 'Masongaleni Ward', 'KE_Ward_437', 'ZhhyithPNoI', 'ZhhyithPNoI', 'oVE1UXXDGcA', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('abEfttdBmpZ', 'Masool Ward', 'KE_Ward_648', 'SCbMzaOeTuR', 'SCbMzaOeTuR', 'abEfttdBmpZ', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('quFXokobrnW', 'Matapato North Ward', 'KE_Ward_919', 'SZapM1R0Kti', 'SZapM1R0Kti', 'quFXokobrnW', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('PPE8hAClees', 'Matapato South Ward', 'KE_Ward_920', 'SZapM1R0Kti', 'SZapM1R0Kti', 'PPE8hAClees', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('m1IPtRRgcm9', 'Mata Ward', 'KE_Ward_115', 'jNzRdAwjaQ1', 'jNzRdAwjaQ1', 'm1IPtRRgcm9', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('UMeXjZoZxct', 'Matayos South Ward', 'KE_Ward_1139', 'tvkI2HSIRW9', 'tvkI2HSIRW9', 'UMeXjZoZxct', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('dOQTHZsuaIb', 'Mathare North Ward', 'KE_Ward_1403', 'Cc8uEFkzfVf', 'Cc8uEFkzfVf', 'dOQTHZsuaIb', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('fIEkqCnDeKD', 'Matinyani Ward', 'KE_Ward_348', 'cmWAJB5kCDW', 'cmWAJB5kCDW', 'fIEkqCnDeKD', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('kBH2TFh9qab', 'Matisi Ward', 'KE_Ward_684', 'y2M16lesMsF', 'y2M16lesMsF', 'kBH2TFh9qab', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('xhXsdnqx3eX', 'Matopeni/Spring Valley Ward', 'KE_Ward_1420', 'XvpLXU47BKs', 'XvpLXU47BKs', 'xhXsdnqx3eX', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('XWYco24xiw4', 'Matsangoni Ward', 'KE_Ward_55', 'MEkEH8ZmcOU', 'MEkEH8ZmcOU', 'XWYco24xiw4', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('DfKdo0FepVq', 'Matulo Ward', 'KE_Ward_1109', 'aqYhbqKclsI', 'aqYhbqKclsI', 'DfKdo0FepVq', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('ds38yFIWSBY', 'Matumbei Ward', 'KE_Ward_682', 'PsjxYLsJSIp', 'PsjxYLsJSIp', 'ds38yFIWSBY', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('raVM522IGju', 'Matungulu East Ward', 'KE_Ward_387', 'GnixPSqaV6D', 'GnixPSqaV6D', 'raVM522IGju', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('cYcOCBgwwwN', 'Matungulu North Ward', 'KE_Ward_386', 'GnixPSqaV6D', 'GnixPSqaV6D', 'cYcOCBgwwwN', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('OMFDcpMhxBr', 'Matungulu West Ward', 'KE_Ward_388', 'GnixPSqaV6D', 'GnixPSqaV6D', 'OMFDcpMhxBr', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('EhkLDtwfJnH', 'Matuu Ward', 'KE_Ward_377', 'CeukNtGhW7J', 'CeukNtGhW7J', 'EhkLDtwfJnH', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('cCF3yJfJOvA', 'Maua Ward', 'KE_Ward_251', 'wtuGWT7KjVm', 'wtuGWT7KjVm', 'cCF3yJfJOvA', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('KHWDXyBa4i6', 'Mauche Ward', 'KE_Ward_831', 'gSJXzH1DM75', 'gSJXzH1DM75', 'KHWDXyBa4i6', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('DSk12NKnyRR', 'Mau Narok Ward', 'KE_Ward_830', 'gSJXzH1DM75', 'gSJXzH1DM75', 'DSk12NKnyRR', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('ceveVgwvcc7', 'Mautuma Ward', 'KE_Ward_991', 'ZOdhgR19Akq', 'ZOdhgR19Akq', 'ceveVgwvcc7', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('jGvMus41myr', 'Mavindini Ward', 'KE_Ward_426', 'AIGIQpolMRn', 'AIGIQpolMRn', 'jGvMus41myr', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('IqDql8D0FEF', 'Mavuria Ward', 'KE_Ward_326', 'AvnM6jKoocs', 'AvnM6jKoocs', 'IqDql8D0FEF', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('Fh0N1GDepVx', 'Mayenje Ward', 'KE_Ward_1138', 'tvkI2HSIRW9', 'tvkI2HSIRW9', 'Fh0N1GDepVx', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('PXAviuGXJGl', 'Mayoni Ward', 'KE_Ward_1030', 'ssbO49f0iLN', 'ssbO49f0iLN', 'PXAviuGXJGl', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('dqhHnPkEqDH', 'Mbakalo Ward', 'KE_Ward_1115', 'orUwYD52An3', 'orUwYD52An3', 'dqhHnPkEqDH', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('iIdFbrVody5', 'Mbaruk/Eburu Ward', 'KE_Ward_846', 'hBU8B1KI12P', 'hBU8B1KI12P', 'iIdFbrVody5', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('vEAFtHnPDrX', 'Mbeti North Ward', 'KE_Ward_314', 'IPOMRXiYjxr', 'IPOMRXiYjxr', 'vEAFtHnPDrX', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('wCqyM612JwW', 'Mbeti South Ward', 'KE_Ward_325', 'AvnM6jKoocs', 'AvnM6jKoocs', 'wCqyM612JwW', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('diFMjWsMQda', 'Mbeu Ward', 'KE_Ward_270', 'Q4xAPhWUnYC', 'Q4xAPhWUnYC', 'diFMjWsMQda', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('sG1YvrNWJTV', 'Mbiri Ward', 'KE_Ward_524', 'VDlzh6w4LKv', 'VDlzh6w4LKv', 'sG1YvrNWJTV', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('MLjJaYTdwrs', 'Mbitini Ward', 'KE_Ward_351', 'vbauk0RRq9N', 'vbauk0RRq9N', 'MLjJaYTdwrs', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('mTYNhOlvCK8', 'Mbiuni Ward', 'KE_Ward_405', 'fYYivceocJ2', 'fYYivceocJ2', 'mTYNhOlvCK8', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('SRbWfuqghtn', 'Mboghoni Ward', 'KE_Ward_114', 'jNzRdAwjaQ1', 'jNzRdAwjaQ1', 'SRbWfuqghtn', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('arVnioHdpH6', 'Mbololo Ward', 'KE_Ward_125', 'yoGLpCTgjed', 'yoGLpCTgjed', 'arVnioHdpH6', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('wp8DtxcZfwK', 'Mbooni Ward', 'KE_Ward_412', 'jxjGWCdfsib', 'jxjGWCdfsib', 'wp8DtxcZfwK', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('gQ7WBbu9IbN', 'Megun Ward', 'KE_Ward_725', 'u9yagZzK49q', 'u9yagZzK49q', 'gQ7WBbu9IbN', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('UZzNEWFdz58', 'Mekenene Ward', 'KE_Ward_1362', 'ABuzigW8Lzw', 'ABuzigW8Lzw', 'UZzNEWFdz58', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('kBWwkKdW9Rh', 'Melelo Ward', 'KE_Ward_903', 'bnYzgzYe2Z7', 'bnYzgzYe2Z7', 'kBWwkKdW9Rh', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('hfUlTD9PANt', 'Melili Ward', 'KE_Ward_896', 'fNROL0qm8De', 'fNROL0qm8De', 'hfUlTD9PANt', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('sJ50zpy9iBV', 'Menengai Ward', 'KE_Ward_879', 'FBJ9Y11esHS', 'FBJ9Y11esHS', 'sJ50zpy9iBV', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('PL9Y6PrB2oV', 'Menengai West Ward', 'KE_Ward_860', 'OK0hW8DFHq3', 'OK0hW8DFHq3', 'PL9Y6PrB2oV', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('sp794D1MvxT', 'Merigi Ward', 'KE_Ward_976', 'OZNRpww2TUK', 'OZNRpww2TUK', 'sp794D1MvxT', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('mdOmXEGyL3l', 'Metkei Ward', 'KE_Ward_750', 'SOEG546PqbA', 'SOEG546PqbA', 'mdOmXEGyL3l', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('SyS2T2z6JDZ', 'Mfangano Island Ward', 'KE_Ward_1252', 'mCGytMcMf6y', 'mCGytMcMf6y', 'SyS2T2z6JDZ', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('iu8wSlOZmfl', 'Miambani Ward', 'KE_Ward_354', 'MWqQbxWqACn', 'MWqQbxWqACn', 'iu8wSlOZmfl', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('oz6zXuKWiR9', 'Migosi Ward', 'KE_Ward_1197', 'OpLt8IgyHop', 'OpLt8IgyHop', 'oz6zXuKWiR9', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('Apa4iLKG02o', 'Migwani Ward', 'KE_Ward_338', 'svwbDnzhgik', 'svwbDnzhgik', 'Apa4iLKG02o', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('GwVllI2Zdfe', 'Mihango Ward', 'KE_Ward_1425', 'gD4xxgDGJ4Y', 'gD4xxgDGJ4Y', 'GwVllI2Zdfe', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('frzFOocEhiu', 'Mihuu Ward', 'KE_Ward_1104', 'f4AOiG8fYtn', 'f4AOiG8fYtn', 'frzFOocEhiu', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('AtSX1b8b5wZ', 'Mikindani Ward', 'KE_Ward_8', 'vSISrsNNHwq', 'vSISrsNNHwq', 'AtSX1b8b5wZ', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('Tj925bvDisP', 'Mikinduni Ward', 'KE_Ward_93', 'A4SNYCxrrnv', 'A4SNYCxrrnv', 'Tj925bvDisP', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('c0I654P6EkR', 'Mikinduri Ward', 'KE_Ward_272', 'NIVPdmQjQKg', 'NIVPdmQjQKg', 'c0I654P6EkR', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('ky9RthnIKqS', 'Milima Ward', 'KE_Ward_1117', 'orUwYD52An3', 'orUwYD52An3', 'ky9RthnIKqS', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('QFG9oFhHG2F', 'Mirangine Ward', 'KE_Ward_455', 'Lm9RMwhIu3G', 'Lm9RMwhIu3G', 'QFG9oFhHG2F', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('KgGyWS1YxMx', 'Miritini Ward', 'KE_Ward_7', 'vSISrsNNHwq', 'vSISrsNNHwq', 'KgGyWS1YxMx', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('PyDYqhwBSoP', 'Misikhu Ward', 'KE_Ward_1107', 'aqYhbqKclsI', 'aqYhbqKclsI', 'PyDYqhwBSoP', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('kTPK3jU6vdp', 'Mitamboni Ward', 'KE_Ward_390', 'iCey76HYgLP', 'iCey76HYgLP', 'kTPK3jU6vdp', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('iRQ3mxm14gi', 'Mitheru Ward', 'KE_Ward_296', 'gLD3Q9fHpvy', 'gLD3Q9fHpvy', 'iRQ3mxm14gi', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('tIVOumb0Lh1', 'Mitunguu Ward', 'KE_Ward_290', 'AFIlzKNxXST', 'AFIlzKNxXST', 'tIVOumb0Lh1', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('PoYQc8biHf3', 'Miwani Ward', 'KE_Ward_1211', 'NmbwkQ5r5cB', 'NmbwkQ5r5cB', 'PoYQc8biHf3', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('YCeebXtrvTd', 'Mjambere Ward', 'KE_Ward_9', 'C1hO6wNOgrH', 'C1hO6wNOgrH', 'YCeebXtrvTd', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('lZiLgEqsjq5', 'Mji Wa Kale/Makadara Ward', 'KE_Ward_26', 'C1xuoa1NAMm', 'C1xuoa1NAMm', 'lZiLgEqsjq5', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('FXRGaOT9JD8', 'Mkomani Ward', 'KE_Ward_18', 'sr8WEz03EnP', 'sr8WEz03EnP', 'FXRGaOT9JD8', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('rzPzDuVVuqw', 'Mkongani Ward', 'KE_Ward_43', 'wUNEDOnx9uB', 'wUNEDOnx9uB', 'rzPzDuVVuqw', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('wXf275eEPuy', 'Mkunumbi Ward', 'KE_Ward_107', 'Lfxw0DfD4jN', 'Lfxw0DfD4jN', 'wXf275eEPuy', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('lvETWuhiIMi', 'Mlango Kubwa Ward', 'KE_Ward_1449', 'gh2kzpOFCeF', 'gh2kzpOFCeF', 'lvETWuhiIMi', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('OEuGotz3swq', 'Mnagei Ward', 'KE_Ward_643', 'ylWg6VvADJE', 'ylWg6VvADJE', 'OEuGotz3swq', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('QvkC6t7JwZB', 'Mnarani Ward', 'KE_Ward_57', 'MEkEH8ZmcOU', 'MEkEH8ZmcOU', 'QvkC6t7JwZB', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('RUfWwfXjF1B', 'Mochongoi Ward', 'KE_Ward_800', 'dSLnPmNlm8Q', 'dSLnPmNlm8Q', 'RUfWwfXjF1B', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('iIS797JydB4', 'Modogashe Ward', 'KE_Ward_140', 'J69iWev2zwu', 'J69iWev2zwu', 'iIS797JydB4', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('rWijSZrVU5U', 'Mogogosiek Ward', 'KE_Ward_988', 'PLFoYJO8MVS', 'PLFoYJO8MVS', 'rWijSZrVU5U', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('VcvJbIcShgA', 'Mogondo Ward', 'KE_Ward_889', 'PGTkGnIAZuy', 'PGTkGnIAZuy', 'VcvJbIcShgA', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('duv5obCpRzb', 'Mogotio Ward', 'KE_Ward_802', 'k5sxmlXAtIg', 'k5sxmlXAtIg', 'duv5obCpRzb', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('aMEeDm5knkx', 'Moiben/Kuserwo Ward', 'KE_Ward_738', 'fNCuk4Lpsnh', 'fNCuk4Lpsnh', 'aMEeDm5knkx', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('mKtIgRuq39B', 'Moiben Ward', 'KE_Ward_717', 'q8R0FA1hxnP', 'q8R0FA1hxnP', 'mKtIgRuq39B', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('wyQ3FlLalVy', 'Moi\'s Bridge Ward', 'KE_Ward_701', 'lmr1q6dTaso', 'lmr1q6dTaso', 'wyQ3FlLalVy', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('CpQX2anrUJk', 'Mokerero Ward', 'KE_Ward_1292', 'jtBjNpL9FXS', 'jtBjNpL9FXS', 'CpQX2anrUJk', '2026-03-16 11:14:43', '2026-03-16 11:14:43'),
('STQIvkltmOp', 'Molo Ward', 'KE_Ward_829', 'RJ4LGJiSHFg', 'RJ4LGJiSHFg', 'STQIvkltmOp', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('PwxIcksWPYQ', 'Monyerero Ward', 'KE_Ward_1337', 'cQkF9l9wePP', 'cQkF9l9wePP', 'PwxIcksWPYQ', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('fF2CijNSPDI', 'Mosiro Ward', 'KE_Ward_897', 'gZM3NbHaugk', 'gZM3NbHaugk', 'fF2CijNSPDI', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('PUv9Q5hrTYP', 'Mosop Ward', 'KE_Ward_863', 'OK0hW8DFHq3', 'OK0hW8DFHq3', 'PUv9Q5hrTYP', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('nbMilBEW7vk', 'Moticho Ward', 'KE_Ward_1309', 'WHG67QCDRS9', 'WHG67QCDRS9', 'nbMilBEW7vk', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('XXbVgPo8AY8', 'Motosiet Ward', 'KE_Ward_697', 'f18kGo9yXWo', 'f18kGo9yXWo', 'XXbVgPo8AY8', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('Wrx3LFjULLl', 'Mountain View Ward', 'KE_Ward_1370', 'f1T0Ltob8VQ', 'f1T0Ltob8VQ', 'Wrx3LFjULLl', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('ujYuDykrrXi', 'Mowlem Ward', 'KE_Ward_1428', 'aCwUX5V42Zz', 'aCwUX5V42Zz', 'ujYuDykrrXi', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('kHOR6vEvDdY', 'Moyale Township Ward', 'KE_Ward_225', 'sZjPgbWI5ra', 'sZjPgbWI5ra', 'kHOR6vEvDdY', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('Z6pxPuARGdF', 'Mtepeni Ward', 'KE_Ward_62', 'xWAZBULwGxp', 'xWAZBULwGxp', 'Z6pxPuARGdF', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('LAm2YbBslNB', 'Mtito Andei Ward', 'KE_Ward_438', 'ZhhyithPNoI', 'ZhhyithPNoI', 'LAm2YbBslNB', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('SwcDu8wwQiR', 'Mtongwe Ward', 'KE_Ward_21', 'iy93Mmi73Or', 'iy93Mmi73Or', 'SwcDu8wwQiR', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('hi7bKqPsdhE', 'Mtopanga Ward', 'KE_Ward_13', 'C1hO6wNOgrH', 'C1hO6wNOgrH', 'hi7bKqPsdhE', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('aQ530J1wOWr', 'Mua Ward', 'KE_Ward_399', 'KXc4ez8OAFz', 'KXc4ez8OAFz', 'aQ530J1wOWr', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('v46jgbTAri7', 'Muchatha Ward', 'KE_Ward_589', 'oMaQgNIs85x', 'oMaQgNIs85x', 'v46jgbTAri7', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('qZ5JBQj1DxJ', 'Mukogondo East ', 'KE_Ward_824', 'RJyUfi5BQUm', 'RJyUfi5BQUm', 'qZ5JBQj1DxJ', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('Zrkf6cQj2AP', 'Mukogondo West', 'KE_Ward_825', 'RJyUfi5BQUm', 'RJyUfi5BQUm', 'Zrkf6cQj2AP', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('EVc3FnW4kcm', 'Mugoiri Ward', 'KE_Ward_523', 'VDlzh6w4LKv', 'VDlzh6w4LKv', 'EVc3FnW4kcm', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('LSpZcRA9tgp', 'Muguga Ward', 'KE_Ward_592', 'lb5LzWiUX8Y', 'lb5LzWiUX8Y', 'LSpZcRA9tgp', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('oFPmL4TCoWb', 'Mugumo-ini Ward', 'KE_Ward_1383', 'aTGYlhEw2Xx', 'aTGYlhEw2Xx', 'oFPmL4TCoWb', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('Ls8TbRfbKBs', 'Mugunda Ward', 'KE_Ward_472', 'odOtfcaMg4p', 'odOtfcaMg4p', 'Ls8TbRfbKBs', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('Mdn0FWVc1MX', 'Muguru Ward', 'KE_Ward_517', 'U9CLTNIwehR', 'U9CLTNIwehR', 'Mdn0FWVc1MX', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('mr7zhcDiR5h', 'Mugwe Ward', 'KE_Ward_304', 'JmE1qRVQD4F', 'JmE1qRVQD4F', 'mr7zhcDiR5h', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('cyChGO6tdNS', 'Muhoroni Koru Ward', 'KE_Ward_1215', 'NmbwkQ5r5cB', 'NmbwkQ5r5cB', 'cyChGO6tdNS', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('tDKdg7EyyCj', 'Muhudu Ward', 'KE_Ward_1065', 'BXaq5PxSfz2', 'BXaq5PxSfz2', 'tDKdg7EyyCj', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('nQxxjPy6J5A', 'Muhuru Ward', 'KE_Ward_1288', 'D2lsuEzZAJP', 'D2lsuEzZAJP', 'nQxxjPy6J5A', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('XBMMn5fIwkJ', 'Mui Ward', 'KE_Ward_344', 'uE7HKhqPOtf', 'uE7HKhqPOtf', 'XBMMn5fIwkJ', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('sZE7f9VLEbp', 'Mukaa Ward', 'KE_Ward_418', 'XAy1bjurhLU', 'XAy1bjurhLU', 'sZE7f9VLEbp', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('l4FVdIFWQov', 'Mukothima Ward', 'KE_Ward_307', 'ZNXf7qiVh3t', 'ZNXf7qiVh3t', 'l4FVdIFWQov', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('fCiM1MhUvOj', 'Mukure Ward', 'KE_Ward_509', 'A34NiI4rgnf', 'A34NiI4rgnf', 'fCiM1MhUvOj', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('GAsUkSqRL2f', 'Mukurwe-ini Central Ward', 'KE_Ward_490', 'zT8Zj5vNYCy', 'zT8Zj5vNYCy', 'GAsUkSqRL2f', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('WQtfFgLYHGe', 'Mukurwe-ini West Ward', 'KE_Ward_489', 'zT8Zj5vNYCy', 'zT8Zj5vNYCy', 'WQtfFgLYHGe', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('sPoq2HB87R1', 'Mukutani Ward', 'KE_Ward_801', 'dSLnPmNlm8Q', 'dSLnPmNlm8Q', 'sPoq2HB87R1', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('IVA8tzQOkNT', 'Mukuyuni Ward', 'KE_Ward_1088', 'k1mze33jOs0', 'k1mze33jOs0', 'IVA8tzQOkNT', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('KBHoROCFohc', 'Mulango Ward', 'KE_Ward_357', 'MWqQbxWqACn', 'MWqQbxWqACn', 'KBHoROCFohc', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('b85TEdR4eRk', 'Mumberes/Maji Mazuri Ward', 'KE_Ward_808', 'Yl9UDBnDvvW', 'Yl9UDBnDvvW', 'b85TEdR4eRk', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('W5KRNT7qwnJ', 'Mumbuni North Ward', 'KE_Ward_402', 'KXc4ez8OAFz', 'KXc4ez8OAFz', 'W5KRNT7qwnJ', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('w6anQIp7OrZ', 'Mumias Central Ward', 'KE_Ward_1020', 'uRl5fBkhpcE', 'uRl5fBkhpcE', 'w6anQIp7OrZ', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('Ma35n0snJbX', 'Mumias North Ward', 'KE_Ward_1021', 'uRl5fBkhpcE', 'uRl5fBkhpcE', 'Ma35n0snJbX', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('HpGxgPszuYN', 'Muminji Ward', 'KE_Ward_329', 'eYBXetGx8xF', 'eYBXetGx8xF', 'HpGxgPszuYN', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('uyBigxC7fHZ', 'Mumoni Ward', 'KE_Ward_333', 'KXM9VnhuLfP', 'KXM9VnhuLfP', 'uyBigxC7fHZ', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('VmCvwovgPi4', 'Mungoma Ward', 'KE_Ward_1054', 'OOF3UX4yOt7', 'OOF3UX4yOt7', 'VmCvwovgPi4', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('EossaGDQulP', 'Municipality Ward', 'KE_Ward_276', 'BDxUGx86itV', 'BDxUGx86itV', 'EossaGDQulP', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('d0uIgkgHOaB', 'Murarandia Ward', 'KE_Ward_526', 'VDlzh6w4LKv', 'VDlzh6w4LKv', 'd0uIgkgHOaB', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('OW3dhCE5nw8', 'Murera Ward', 'KE_Ward_559', 'aiqi2bz0IMI', 'aiqi2bz0IMI', 'OW3dhCE5nw8', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('MtRX8xhwq3F', 'Murhanda Ward', 'KE_Ward_1042', 'sjlSPeRgl7d', 'sjlSPeRgl7d', 'MtRX8xhwq3F', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('mxshI67tMFJ', 'Murindati Ward', 'KE_Ward_848', 'hBU8B1KI12P', 'hBU8B1KI12P', 'mxshI67tMFJ', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('yXzhbb6Zwi8', 'Murinduko Ward', 'KE_Ward_501', 'jHmpQUlnkQk', 'jHmpQUlnkQk', 'yXzhbb6Zwi8', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('X7rwLIDSf7d', 'Muruka Ward', 'KE_Ward_540', 'gwYTo0wITYX', 'gwYTo0wITYX', 'X7rwLIDSf7d', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('ZvHXuhKoAuI', 'Murungaru Ward', 'KE_Ward_444', 'RAnL5kBKMIt', 'RAnL5kBKMIt', 'ZvHXuhKoAuI', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('vi6Huowv9e7', 'Musanda Ward', 'KE_Ward_1023', 'uRl5fBkhpcE', 'uRl5fBkhpcE', 'vi6Huowv9e7', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('jmsoF18bsh0', 'Musikoma Ward', 'KE_Ward_1100', 'CUjthlounWV', 'CUjthlounWV', 'jmsoF18bsh0', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('g5eGcoROeya', 'Mutarakwa Ward', 'KE_Ward_985', 'm9gdonbVXjZ', 'm9gdonbVXjZ', 'g5eGcoROeya', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('BkpZUfBGM9x', 'Muthambi Ward', 'KE_Ward_297', 'gLD3Q9fHpvy', 'gLD3Q9fHpvy', 'BkpZUfBGM9x', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('Zxy2exUTX7R', 'Muthara Ward', 'KE_Ward_274', 'U3lGZ71W9Te', 'U3lGZ71W9Te', 'Zxy2exUTX7R', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('V2yqe9L0ha7', 'Mutha Ward', 'KE_Ward_367', 'd3hSQ3EtnPk', 'd3hSQ3EtnPk', 'V2yqe9L0ha7', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('mbGPooHKbdA', 'Muthesya Ward', 'KE_Ward_374', 'hpcb7MYi6nc', 'hpcb7MYi6nc', 'mbGPooHKbdA', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('p3N8fKKiVHr', 'Muthetheni Ward', 'KE_Ward_408', 'fYYivceocJ2', 'fYYivceocJ2', 'p3N8fKKiVHr', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('qe32Mlgh56x', 'Muthithi Ward', 'KE_Ward_529', 'tyfDsdZ1h3R', 'tyfDsdZ1h3R', 'qe32Mlgh56x', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('ZlcAxf7QN8c', 'Muthwani Ward', 'KE_Ward_396', 'BxfsSc6Svrc', 'BxfsSc6Svrc', 'ZlcAxf7QN8c', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('xFI9cbIii9H', 'Mutira Ward', 'KE_Ward_512', 'JKNaaTjVapG', 'JKNaaTjVapG', 'xFI9cbIii9H', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('K3uHCihezz7', 'Mutithi Ward', 'KE_Ward_496', 'f6EOn3xI9YH', 'f6EOn3xI9YH', 'K3uHCihezz7', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('qWZAzrzTN2v', 'Mutitu/Kaliku Ward', 'KE_Ward_364', 'd0Gu8FrRM0Y', 'd0Gu8FrRM0Y', 'qWZAzrzTN2v', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('m6H14WsORB0', 'Mutituni Ward', 'KE_Ward_400', 'KXc4ez8OAFz', 'KXc4ez8OAFz', 'm6H14WsORB0', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('ToGeasli0pe', 'Mutomo Ward', 'KE_Ward_366', 'd3hSQ3EtnPk', 'd3hSQ3EtnPk', 'ToGeasli0pe', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('IgBhlSMshmk', 'Mutongoni Ward', 'KE_Ward_346', 'cmWAJB5kCDW', 'cmWAJB5kCDW', 'IgBhlSMshmk', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('HuBMlfYHHEy', 'Mutu-ini Ward', 'KE_Ward_1376', 'sqNWYDHZZ6W', 'sqNWYDHZZ6W', 'HuBMlfYHHEy', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('bMFoCdyYs5e', 'Muvau/Kikumini Ward', 'KE_Ward_425', 'AIGIQpolMRn', 'AIGIQpolMRn', 'bMFoCdyYs5e', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('CJ0xDJy3ZZI', 'Muvuti/Kiima-kimwe Ward', 'KE_Ward_403', 'KXc4ez8OAFz', 'KXc4ez8OAFz', 'CJ0xDJy3ZZI', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('zkZxEdH45U1', 'Mwakirunge Ward', 'KE_Ward_12', 'C1hO6wNOgrH', 'C1hO6wNOgrH', 'zkZxEdH45U1', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('B2L7OVm0ZO1', 'Mwanamwinga Ward', 'KE_Ward_66', 'tSKDWoVKiPo', 'tSKDWoVKiPo', 'B2L7OVm0ZO1', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('RXoThrI8OjU', 'Mwanda/Mgange Ward', 'KE_Ward_119', 'AM36DdkZ36Y', 'AM36DdkZ36Y', 'RXoThrI8OjU', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('FJJRq7O0QcB', 'Mwangathia Ward', 'KE_Ward_285', 'OnNcTsJgfvL', 'OnNcTsJgfvL', 'FJJRq7O0QcB', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('sWZmeA6lkx9', 'Mwarakaya Ward', 'KE_Ward_59', 'xWAZBULwGxp', 'xWAZBULwGxp', 'sWZmeA6lkx9', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('i6WDSy6LjRp', 'Mwatate Ward', 'KE_Ward_121', 'IBDoGsLdhvt', 'IBDoGsLdhvt', 'i6WDSy6LjRp', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('vjeHNVWOsRk', 'Mwavumbo Ward', 'KE_Ward_49', 'LOgbecTRkbp', 'LOgbecTRkbp', 'vjeHNVWOsRk', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('eT3Udm3xjFw', 'Mwawesa Ward', 'KE_Ward_67', 'hJf4rt7cvI6', 'hJf4rt7cvI6', 'eT3Udm3xjFw', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('cWJOQn1YUfg', 'Mwea Ward', 'KE_Ward_323', 'AvnM6jKoocs', 'AvnM6jKoocs', 'cWJOQn1YUfg', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('uhmsPJrZCXF', 'Mweiga Ward', 'KE_Ward_469', 'odOtfcaMg4p', 'odOtfcaMg4p', 'uhmsPJrZCXF', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('PBhYjIVYdhk', 'Mwereni Ward', 'KE_Ward_37', 'TdcYaufNV4p', 'TdcYaufNV4p', 'PBhYjIVYdhk', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('gvz1kfj99I3', 'Mwibona Ward', 'KE_Ward_1070', 'lkYdgjRSOoE', 'lkYdgjRSOoE', 'gvz1kfj99I3', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('dnLaU3RrCnp', 'Mwihoko Ward', 'KE_Ward_576', 'TPRNJqSm4lK', 'TPRNJqSm4lK', 'dnLaU3RrCnp', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('KoIp1GKz0UI', 'Mwiki Ward', 'KE_Ward_1397', 'TPRNJqSm4lK', 'TPRNJqSm4lK', 'KoIp1GKz0UI', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('VOpqnQgC8om', 'Mwimbi Ward', 'KE_Ward_298', 'wQ8XjZ7zVwL', 'wQ8XjZ7zVwL', 'VOpqnQgC8om', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('kBloQxkcKxZ', 'Mwiyogo/Endarasha Ward', 'KE_Ward_471', 'odOtfcaMg4p', 'odOtfcaMg4p', 'kBloQxkcKxZ', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('NDRZbel9Pr4', 'Naathu Ward', 'KE_Ward_264', 'G9DoZvSdGLx', 'G9DoZvSdGLx', 'NDRZbel9Pr4', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('X1eiwwCQwbI', 'Nabiswa Ward', 'KE_Ward_693', 'pzZHpL2ueIn', 'pzZHpL2ueIn', 'X1eiwwCQwbI', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('hV1NZb8gSOe', 'Nachola Ward', 'KE_Ward_667', 'E2DGjZRlwbY', 'E2DGjZRlwbY', 'hV1NZb8gSOe', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('gFLRh6j7pBd', 'Nachu Ward', 'KE_Ward_597', 'jOVcLeZQSsS', 'jOVcLeZQSsS', 'gFLRh6j7pBd', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('Ay904HxgFbw', 'Naikarra Ward', 'KE_Ward_910', 'ouA247cg58A', 'ouA247cg58A', 'Ay904HxgFbw', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('KJHG9zDp2UR', 'Nairobi Central Ward', 'KE_Ward_1439', 'nKHlZyN0lt9', 'nKHlZyN0lt9', 'KJHG9zDp2UR', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('LYgnp1wcewP', 'Nairobi South Ward', 'KE_Ward_1444', 'nKHlZyN0lt9', 'nKHlZyN0lt9', 'LYgnp1wcewP', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('uPv6CYD6np2', 'Nairobi West Ward', 'KE_Ward_1382', 'aTGYlhEw2Xx', 'aTGYlhEw2Xx', 'uPv6CYD6np2', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('AwkuNWBAvnV', 'Naitiri/Kabuyefwe Ward', 'KE_Ward_1116', 'orUwYD52An3', 'orUwYD52An3', 'AwkuNWBAvnV', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('A20qmlqFi5D', 'Naivasha East Ward', 'KE_Ward_842', 'yZJJPoSGhY6', 'yZJJPoSGhY6', 'A20qmlqFi5D', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('qTEN4LVoVVL', 'Nakalale Ward', 'KE_Ward_616', 'HK5SUCMQmsw', 'HK5SUCMQmsw', 'qTEN4LVoVVL', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('W1Kv7kfFzub', 'Nakuru East Ward', 'KE_Ward_880', 'FBJ9Y11esHS', 'FBJ9Y11esHS', 'W1Kv7kfFzub', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('LaVcN8NDdNa', 'Namamali Ward', 'KE_Ward_1031', 'ssbO49f0iLN', 'ssbO49f0iLN', 'LaVcN8NDdNa', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('IUsXLSNYp1f', 'Nambale Ward', 'KE_Ward_1133', 'e1J7R103h8I', 'e1J7R103h8I', 'IUsXLSNYp1f', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('TXzHtrNrFeb', 'Namboboto-nambuku Ward', 'KE_Ward_1148', 'NHRktMsAkO1', 'NHRktMsAkO1', 'TXzHtrNrFeb', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('CenIfdVZZdC', 'Namwela Ward', 'KE_Ward_1082', 'whWfFA9D7td', 'whWfFA9D7td', 'CenIfdVZZdC', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('C93goWh2C1d', 'Nanaam Ward', 'KE_Ward_623', 'HK5SUCMQmsw', 'HK5SUCMQmsw', 'C93goWh2C1d', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('iWDqdgd87nd', 'Nandi Hills Ward', 'KE_Ward_761', 'W6Err8cQf5J', 'W6Err8cQf5J', 'iWDqdgd87nd', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('nuZowpCKvMd', 'Nangina Ward', 'KE_Ward_1149', 'NHRktMsAkO1', 'NHRktMsAkO1', 'nuZowpCKvMd', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('EmhVD7pSOTI', 'Nanighi Ward', 'KE_Ward_156', 'RScEHA3V38d', 'RScEHA3V38d', 'EmhVD7pSOTI', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('DpYpJ6E1vRc', 'Nanyuki Ward', 'KE_Ward_820', 'pF6qPMIlHte', 'pF6qPMIlHte', 'DpYpJ6E1vRc', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('MAdyJPs0RUr', 'Narok Town Ward', 'KE_Ward_893', 'fNROL0qm8De', 'fNROL0qm8De', 'MAdyJPs0RUr', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('REFeM2dROq3', 'Naromoru/Kiamathaga Ward', 'KE_Ward_470', 'YXt5ETQPRlB', 'YXt5ETQPRlB', 'REFeM2dROq3', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('hVGX2N2vzsO', 'Ndalani Ward', 'KE_Ward_376', 'CeukNtGhW7J', 'CeukNtGhW7J', 'hVGX2N2vzsO', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('JsaOcykkym2', 'Ndalat Ward', 'KE_Ward_778', 'Xtb7tbJpk9p', 'Xtb7tbJpk9p', 'JsaOcykkym2', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('ZoZCpnAFcGo', 'Ndalu Ward', 'KE_Ward_1118', 'orUwYD52An3', 'orUwYD52An3', 'ZoZCpnAFcGo', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('ygECklrrzGE', 'Ndanai/Abosi Ward', 'KE_Ward_966', 'KyuSYunELJI', 'KyuSYunELJI', 'ygECklrrzGE', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('J4ZIAuamKlu', 'Ndaraweta Ward', 'KE_Ward_982', 'm9gdonbVXjZ', 'm9gdonbVXjZ', 'J4ZIAuamKlu', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('BWRIH7ocbHB', 'Ndarugu Ward', 'KE_Ward_553', 'EcRytSSIkUq', 'EcRytSSIkUq', 'BWRIH7ocbHB', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('YZvux1SW3bs', 'Ndavaya Ward', 'KE_Ward_44', 'LOgbecTRkbp', 'LOgbecTRkbp', 'YZvux1SW3bs', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('lRFhjTLImNu', 'Ndeiya Ward', 'KE_Ward_603', 'xhVi71INcFs', 'xhVi71INcFs', 'lRFhjTLImNu', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('NQ4XWNy3RM0', 'Ndenderu Ward', 'KE_Ward_588', 'oMaQgNIs85x', 'oMaQgNIs85x', 'NQ4XWNy3RM0', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('PUxylhB5rfi', 'Ndithini Ward', 'KE_Ward_375', 'hpcb7MYi6nc', 'hpcb7MYi6nc', 'PUxylhB5rfi', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('WskHX9On3vR', 'Ndivisi Ward', 'KE_Ward_1105', 'f4AOiG8fYtn', 'f4AOiG8fYtn', 'WskHX9On3vR', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('w6u8SoSKkmn', 'Ndoto Ward', 'KE_Ward_668', 'E2DGjZRlwbY', 'E2DGjZRlwbY', 'w6u8SoSKkmn', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('B7Ek2TSSkr9', 'Ndumberi Ward', 'KE_Ward_583', 'SBz4c48i24Y', 'SBz4c48i24Y', 'B7Ek2TSSkr9', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('UU5663WBF7t', 'Neboi Ward', 'KE_Ward_214', 'fGr9rRvaovO', 'fGr9rRvaovO', 'UU5663WBF7t', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('KqMw0Knznhu', 'Nessuit Ward', 'KE_Ward_833', 'gSJXzH1DM75', 'gSJXzH1DM75', 'KqMw0Knznhu', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('bK37v9AMeU3', 'Ngando Ward', 'KE_Ward_1377', 'sqNWYDHZZ6W', 'sqNWYDHZZ6W', 'bK37v9AMeU3', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('GqsqQj9CDst', 'Ng\'araria Ward', 'KE_Ward_539', 'gwYTo0wITYX', 'gwYTo0wITYX', 'GqsqQj9CDst', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('QKZyfxaG8EJ', 'Ngara Ward', 'KE_Ward_1440', 'nKHlZyN0lt9', 'nKHlZyN0lt9', 'QKZyfxaG8EJ', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('GHmkA5jGVqQ', 'Ngare Mara Ward', 'KE_Ward_245', 'I2LYLqKU6AW', 'I2LYLqKU6AW', 'GHmkA5jGVqQ', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('ClOFuXgqcFJ', 'Ngariama Ward', 'KE_Ward_507', 'yOaHQLOLd1H', 'yOaHQLOLd1H', 'ClOFuXgqcFJ', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('tp0mFiSv7ar', 'Ngecha Tigoni Ward', 'KE_Ward_605', 'xhVi71INcFs', 'xhVi71INcFs', 'tp0mFiSv7ar', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('tsmsPb6qMFa', 'Ngei Ward', 'KE_Ward_1448', 'gh2kzpOFCeF', 'gh2kzpOFCeF', 'tsmsPb6qMFa', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('l4MV7dNKjrG', 'Ngenda Ward', 'KE_Ward_554', 'EcRytSSIkUq', 'EcRytSSIkUq', 'l4MV7dNKjrG', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('NXNdgSCo71E', 'Ngenyilel Ward', 'KE_Ward_708', 'KuprsuBe1l0', 'KuprsuBe1l0', 'NXNdgSCo71E', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('ymhb4pW8ryv', 'Ngeria Ward', 'KE_Ward_724', 'u9yagZzK49q', 'u9yagZzK49q', 'ymhb4pW8ryv', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('bkMHxVGDIcL', 'Ngewa Ward', 'KE_Ward_580', 'E7tkGikenbD', 'E7tkGikenbD', 'bkMHxVGDIcL', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('JqeBiHQ9lNI', 'Nginda Ward', 'KE_Ward_538', 'l46g2PZUjoh', 'l46g2PZUjoh', 'JqeBiHQ9lNI', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('pxHH7AAkfR6', 'Ngobit Ward', 'KE_Ward_817', 'pF6qPMIlHte', 'pF6qPMIlHte', 'pxHH7AAkfR6', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('XzqVKmvJA4m', 'Ngolia Ward', 'KE_Ward_130', 'yoGLpCTgjed', 'yoGLpCTgjed', 'XzqVKmvJA4m', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('VWuMYjG4YX4', 'Ngoliba Ward', 'KE_Ward_568', 'YZAZ1a9MIvX', 'YZAZ1a9MIvX', 'VWuMYjG4YX4', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('zR0sWpigMWE', 'Ngomeni Ward', 'KE_Ward_331', 'KXM9VnhuLfP', 'KXM9VnhuLfP', 'zR0sWpigMWE', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('nioMzFVoQ7l', 'Ngong Ward', 'KE_Ward_915', 'BLz1HkvvMkA', 'BLz1HkvvMkA', 'nioMzFVoQ7l', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('rPWcODiKrP8', 'Nguni Ward', 'KE_Ward_342', 'uE7HKhqPOtf', 'uE7HKhqPOtf', 'rPWcODiKrP8', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('SJ03kAWXPyt', 'Nguu/Masumba Ward', 'KE_Ward_435', 'toa2Hl7iVQI', 'toa2Hl7iVQI', 'SJ03kAWXPyt', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('ErVmSqffPmn', 'Nguumo Ward', 'KE_Ward_432', 'toa2Hl7iVQI', 'toa2Hl7iVQI', 'ErVmSqffPmn', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('wBisHlJd2aK', 'Nguutani Ward', 'KE_Ward_337', 'svwbDnzhgik', 'svwbDnzhgik', 'wBisHlJd2aK', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('WntjnQMsI6t', 'Njabani/Kiburu Ward', 'KE_Ward_445', 'RAnL5kBKMIt', 'RAnL5kBKMIt', 'WntjnQMsI6t', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('k0edp6ATpN0', 'Njia Ward', 'KE_Ward_259', 'TPfcUHno8oP', 'TPfcUHno8oP', 'k0edp6ATpN0', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('aZGmpSZ2M0H', 'Njiru Ward', 'KE_Ward_1399', 'FoqzDgIByL6', 'FoqzDgIByL6', 'aZGmpSZ2M0H', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('TaCopZQ4jLn', 'Njoro Ward', 'KE_Ward_835', 'gSJXzH1DM75', 'gSJXzH1DM75', 'TaCopZQ4jLn', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('hnLq51q52zo', 'Njukiine Ward', 'KE_Ward_506', 'yOaHQLOLd1H', 'yOaHQLOLd1H', 'hnLq51q52zo', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('pp24Rb9gQ9W', 'Nkaimurunya Ward', 'KE_Ward_913', 'BLz1HkvvMkA', 'BLz1HkvvMkA', 'pp24Rb9gQ9W', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('zoVBqNpy6Sw', 'Nkareta Ward', 'KE_Ward_894', 'fNROL0qm8De', 'fNROL0qm8De', 'zoVBqNpy6Sw', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('TEMzqnMqi9A', 'Nkomo Ward', 'KE_Ward_269', 'Q4xAPhWUnYC', 'Q4xAPhWUnYC', 'TEMzqnMqi9A', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('Om9OC4PNQJo', 'Nkondi Ward', 'KE_Ward_308', 'Yz1V5Cx8CO2', 'Yz1V5Cx8CO2', 'Om9OC4PNQJo', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('SQ70Q8iG3l0', 'Nkuene Ward', 'KE_Ward_295', 'AFIlzKNxXST', 'AFIlzKNxXST', 'SQ70Q8iG3l0', '2026-03-16 11:14:44', '2026-03-16 11:14:44');
INSERT INTO `wards` (`id`, `name`, `code`, `constituency_id`, `constituency_code`, `ward_code`, `created_at`, `updated_at`) VALUES
('zcpKiQgMNyb', 'North Alego Ward', 'KE_Ward_1167', 'Cu46otDi1RO', 'Cu46otDi1RO', 'zcpKiQgMNyb', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('AgnY1dRfILu', 'North East Bunyore Ward', 'KE_Ward_1073', 'Lpy789vqRC6', 'Lpy789vqRC6', 'AgnY1dRfILu', '2026-03-16 11:14:44', '2026-03-16 11:14:44'),
('KzqDLd1CVFQ', 'North Gem Ward', 'KE_Ward_1169', 'PKeFksHlJkB', 'PKeFksHlJkB', 'KzqDLd1CVFQ', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('J7hloFhkWdU', 'North Horr Ward', 'KE_Ward_231', 'j6fqt5TYqPZ', 'j6fqt5TYqPZ', 'J7hloFhkWdU', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('ry7pGVSoLwL', 'North Kadem Ward', 'KE_Ward_1284', 'D2lsuEzZAJP', 'D2lsuEzZAJP', 'ry7pGVSoLwL', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('QC41mItjIzF', 'North Kamagambo Ward', 'KE_Ward_1261', 'fT37q3rXQ35', 'fT37q3rXQ35', 'QC41mItjIzF', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('LXYI6dwqHoR', 'North Kanyamkago Ward', 'KE_Ward_1278', 'fCInDXluNhx', 'fCInDXluNhx', 'LXYI6dwqHoR', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('bR7hQLC29rl', 'North Karachuonyo Ward', 'KE_Ward_1231', 'fmsyW02tPng', 'fmsyW02tPng', 'bR7hQLC29rl', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('UU5SWe7Tv1P', 'North Kinangop Ward', 'KE_Ward_443', 'RAnL5kBKMIt', 'RAnL5kBKMIt', 'UU5SWe7Tv1P', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('m9cV82YWKBf', 'North Maragoli Ward', 'KE_Ward_1058', 'urtJSF5jcBC', 'urtJSF5jcBC', 'm9cV82YWKBf', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('G2B9ridstXR', 'North Nyakach Ward', 'KE_Ward_1217', 'kBQIjtWUBqj', 'kBQIjtWUBqj', 'G2B9ridstXR', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('EmooFdjzKlm', 'North Sakwa Ward', 'KE_Ward_1265', 'JNvqpOnKfGR', 'JNvqpOnKfGR', 'EmooFdjzKlm', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('b2DzrddWnYN', 'North Seme Ward', 'KE_Ward_1205', 'LRNmnMw1fBs', 'LRNmnMw1fBs', 'b2DzrddWnYN', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('quAHj7k172D', 'North Ugenya Ward', 'KE_Ward_1158', 'InECuIlzJGx', 'InECuIlzJGx', 'quAHj7k172D', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('c8htRsEJD2W', 'North Uyoma Ward', 'KE_Ward_1183', 'XcRpb1xsM64', 'XcRpb1xsM64', 'c8htRsEJD2W', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('r6rYPoyjxvR', 'North West Kisumu Ward', 'KE_Ward_1195', 'YzEDO9Mq4TR', 'YzEDO9Mq4TR', 'r6rYPoyjxvR', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('tGtfKyhl0y1', 'Nthawa Ward', 'KE_Ward_328', 'eYBXetGx8xF', 'eYBXetGx8xF', 'tGtfKyhl0y1', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('Ryj106sjw37', 'Ntima East Ward', 'KE_Ward_277', 'BDxUGx86itV', 'BDxUGx86itV', 'Ryj106sjw37', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('C6U23QgqMCn', 'Ntimaru East Ward', 'KE_Ward_1298', 'THm2tCJa2ZQ', 'THm2tCJa2ZQ', 'C6U23QgqMCn', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('dkHXkFhXXxJ', 'Ntimaru West Ward', 'KE_Ward_1297', 'THm2tCJa2ZQ', 'THm2tCJa2ZQ', 'dkHXkFhXXxJ', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('Q1YmD34Z3It', 'Ntima West Ward', 'KE_Ward_278', 'BDxUGx86itV', 'BDxUGx86itV', 'Q1YmD34Z3It', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('b7S83B5sQai', 'Ntunene Ward', 'KE_Ward_262', 'G9DoZvSdGLx', 'G9DoZvSdGLx', 'b7S83B5sQai', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('WOJ90HLwb6o', 'Nuu Ward', 'KE_Ward_343', 'uE7HKhqPOtf', 'uE7HKhqPOtf', 'WOJ90HLwb6o', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('xUtluqIJmBZ', 'Nyabasi East Ward', 'KE_Ward_1299', 'THm2tCJa2ZQ', 'THm2tCJa2ZQ', 'xUtluqIJmBZ', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('k00olmG2C2e', 'Nyabasi West Ward', 'KE_Ward_1300', 'THm2tCJa2ZQ', 'THm2tCJa2ZQ', 'k00olmG2C2e', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('oAXSVQp3K0O', 'Nyacheki Ward', 'KE_Ward_1318', 'cooDDG3Lh3A', 'cooDDG3Lh3A', 'oAXSVQp3K0O', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('S5vdlHabZzv', 'Nyadhuna Ward', 'KE_Ward_593', 'lb5LzWiUX8Y', 'lb5LzWiUX8Y', 'S5vdlHabZzv', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('hceoyGXIXhD', 'Nyaki East Ward', 'KE_Ward_280', 'BDxUGx86itV', 'BDxUGx86itV', 'hceoyGXIXhD', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('sDFNdNK4QJ8', 'Nyakio Ward', 'KE_Ward_446', 'RAnL5kBKMIt', 'RAnL5kBKMIt', 'sDFNdNK4QJ8', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('danQPcsYu5G', 'Nyaki West Ward', 'KE_Ward_279', 'BDxUGx86itV', 'BDxUGx86itV', 'danQPcsYu5G', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('z8JmM1WxmgG', 'Nyakoe Ward', 'KE_Ward_1343', 'gPR82w2xgJZ', 'gPR82w2xgJZ', 'z8JmM1WxmgG', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('roJc7UkCD2l', 'Nyalenda A Ward', 'KE_Ward_1189', 'PRpKwAloU5b', 'PRpKwAloU5b', 'roJc7UkCD2l', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('yz3WGD5x3v2', 'Nyalenda B Ward', 'KE_Ward_1201', 'OpLt8IgyHop', 'OpLt8IgyHop', 'yz3WGD5x3v2', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('Av8d3lmuaua', 'Nyamaiya Ward', 'KE_Ward_1352', 'cxjRPbvhjzr', 'cxjRPbvhjzr', 'Av8d3lmuaua', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('CbtRAlHp1JA', 'Nyamasibi Ward', 'KE_Ward_1327', 'A6Sj8RumZ0m', 'A6Sj8RumZ0m', 'CbtRAlHp1JA', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('aR3qJ3GyWeP', 'Nyanduma Ward', 'KE_Ward_608', 'nCziQtZ49jj', 'nCziQtZ49jj', 'aR3qJ3GyWeP', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('Gsl9Z7f1kbX', 'Nyangati Ward', 'KE_Ward_500', 'jHmpQUlnkQk', 'jHmpQUlnkQk', 'Gsl9Z7f1kbX', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('mareBenlFqk', 'Nyangores Ward', 'KE_Ward_972', 'PUhMyfDD2xp', 'PUhMyfDD2xp', 'mareBenlFqk', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('DfL4XXliaq1', 'Nyanmosense/Komosoko Ward', 'KE_Ward_1295', 'jtBjNpL9FXS', 'jtBjNpL9FXS', 'DfL4XXliaq1', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('pjOkCmcntm6', 'Nyansiongo Ward', 'KE_Ward_1364', 'ABuzigW8Lzw', 'ABuzigW8Lzw', 'pjOkCmcntm6', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('Dvfw4PI207c', 'Nyatieko Ward', 'KE_Ward_1345', 'gPR82w2xgJZ', 'gPR82w2xgJZ', 'Dvfw4PI207c', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('IDtR0R9o2Q4', 'Nyayo Highrise Ward', 'KE_Ward_1385', 'aTGYlhEw2Xx', 'aTGYlhEw2Xx', 'IDtR0R9o2Q4', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('UpMVKpuABHz', 'Nyiro Ward', 'KE_Ward_669', 'E2DGjZRlwbY', 'E2DGjZRlwbY', 'UpMVKpuABHz', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('jWX4knhb96j', 'Nyota Ward', 'KE_Ward_854', 'QBwORnYdu0e', 'QBwORnYdu0e', 'jWX4knhb96j', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('Ekb0OY8S4Jm', 'Nzambani Ward', 'KE_Ward_360', 'd0Gu8FrRM0Y', 'd0Gu8FrRM0Y', 'Ekb0OY8S4Jm', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('Amj9UOaw3tP', 'Nzaui/Kilili/Kalamba Ward', 'KE_Ward_429', 'AIGIQpolMRn', 'AIGIQpolMRn', 'Amj9UOaw3tP', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('bWhvWmGfQqn', 'Nzoia Ward', 'KE_Ward_1000', 'wMv0s3U2nnG', 'wMv0s3U2nnG', 'bWhvWmGfQqn', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('fBMKIsnV2ZV', 'Obbu Ward', 'KE_Ward_227', 'sZjPgbWI5ra', 'sZjPgbWI5ra', 'fBMKIsnV2ZV', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('ZJgywSuefy6', 'Oldo/Nyiro Ward', 'KE_Ward_247', 'I2LYLqKU6AW', 'I2LYLqKU6AW', 'ZJgywSuefy6', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('CTX9LIAvrFK', 'Olkaria Ward', 'KE_Ward_841', 'yZJJPoSGhY6', 'yZJJPoSGhY6', 'CTX9LIAvrFK', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('RHwexebB7PD', 'Olkeri Ward', 'KE_Ward_911', 'BLz1HkvvMkA', 'BLz1HkvvMkA', 'RHwexebB7PD', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('w0ljXC7o4Rd', 'Ol\'lessos Ward', 'KE_Ward_763', 'W6Err8cQf5J', 'W6Err8cQf5J', 'w0ljXC7o4Rd', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('IZGBFhMdekx', 'Ol-moran Ward', 'KE_Ward_811', 'pXbWrnFPpKb', 'pXbWrnFPpKb', 'IZGBFhMdekx', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('pTkgy00IQrp', 'Olokurto Ward', 'KE_Ward_892', 'fNROL0qm8De', 'fNROL0qm8De', 'pTkgy00IQrp', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('tVa5R01HhNz', 'Ololmasani Ward', 'KE_Ward_888', 'PGTkGnIAZuy', 'PGTkGnIAZuy', 'tVa5R01HhNz', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('aoZxerJJSBz', 'Ololulung\'a Ward', 'KE_Ward_902', 'bnYzgzYe2Z7', 'bnYzgzYe2Z7', 'aoZxerJJSBz', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('xvmwT1IuPuK', 'Oloolua Ward', 'KE_Ward_914', 'BLz1HkvvMkA', 'BLz1HkvvMkA', 'xvmwT1IuPuK', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('oXm4Fpl0iEr', 'Oloosirkon/Sholinke Ward', 'KE_Ward_923', 'g6gTzQ5nfYq', 'g6gTzQ5nfYq', 'oXm4Fpl0iEr', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('pN8AuYvqE0e', 'Olorropil Ward', 'KE_Ward_895', 'fNROL0qm8De', 'fNROL0qm8De', 'pN8AuYvqE0e', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('gzHtPrtr6nU', 'Olposimoru Ward', 'KE_Ward_891', 'fNROL0qm8De', 'fNROL0qm8De', 'gzHtPrtr6nU', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('cnOFVqKDVEi', 'Ombeyi Ward', 'KE_Ward_1212', 'NmbwkQ5r5cB', 'NmbwkQ5r5cB', 'cnOFVqKDVEi', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('RZsWJRZ4mIG', 'Ongata Rongai Ward', 'KE_Ward_912', 'BLz1HkvvMkA', 'BLz1HkvvMkA', 'RZsWJRZ4mIG', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('DR0BSs3eYeC', 'Pangani Ward', 'KE_Ward_1441', 'nKHlZyN0lt9', 'nKHlZyN0lt9', 'DR0BSs3eYeC', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('QhDd2LAuXAF', 'Parklands/Highridge Ward', 'KE_Ward_1367', 'f1T0Ltob8VQ', 'f1T0Ltob8VQ', 'QhDd2LAuXAF', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('vjOR4Xpi2TY', 'Pipeline Ward', 'KE_Ward_1409', 'aDp1odOWYC1', 'aDp1odOWYC1', 'vjOR4Xpi2TY', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('oJkRlx56eac', 'Pongwe/Kikokeni Ward', 'KE_Ward_35', 'TdcYaufNV4p', 'TdcYaufNV4p', 'oJkRlx56eac', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('b4HPJJEYEsS', 'Porro Ward', 'KE_Ward_665', 'EmQRGVtvWy3', 'EmQRGVtvWy3', 'b4HPJJEYEsS', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('oflRkUjvrdd', 'Port Reitz Ward', 'KE_Ward_1', 'OvI6w06DhPJ', 'OvI6w06DhPJ', 'oflRkUjvrdd', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('QEGPqON6Zcj', 'Puma Ward', 'KE_Ward_45', 'LOgbecTRkbp', 'LOgbecTRkbp', 'QEGPqON6Zcj', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('x6E428s1HPf', 'Pumwani Ward', 'KE_Ward_1434', 'qoLIT7y5f5c', 'qoLIT7y5f5c', 'x6E428s1HPf', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('LeE5Ma7cpT6', 'Purko Ward', 'KE_Ward_916', 'SZapM1R0Kti', 'SZapM1R0Kti', 'LeE5Ma7cpT6', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('mi5ayQN77v7', 'Rabai/Kisurutini Ward', 'KE_Ward_70', 'hJf4rt7cvI6', 'hJf4rt7cvI6', 'mi5ayQN77v7', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('ydfRAgF1oDr', 'Racecourse Ward', 'KE_Ward_727', 'dKHnvt7gleN', 'dKHnvt7gleN', 'ydfRAgF1oDr', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('fvjC0YNoiP4', 'Ragana-oruba Ward', 'KE_Ward_1275', 'VtuwXD7O1O9', 'VtuwXD7O1O9', 'fvjC0YNoiP4', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('ZplKg3SMkIC', 'Railways Ward', 'KE_Ward_1196', 'OpLt8IgyHop', 'OpLt8IgyHop', 'ZplKg3SMkIC', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('VGENlt3MTt7', 'Ramisi Ward', 'KE_Ward_34', 'ADMywdLwoRX', 'ADMywdLwoRX', 'VGENlt3MTt7', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('ikiFHlCFCCq', 'Ravine Ward', 'KE_Ward_807', 'Yl9UDBnDvvW', 'Yl9UDBnDvvW', 'ikiFHlCFCCq', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('GpykXhXcYCT', 'Rhamu Dimtu Ward', 'KE_Ward_205', 'jrm0uyLXnC1', 'jrm0uyLXnC1', 'GpykXhXcYCT', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('d7Se8cdZnHg', 'Rhamu Ward', 'KE_Ward_204', 'jrm0uyLXnC1', 'jrm0uyLXnC1', 'd7Se8cdZnHg', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('eQNgjFoG2ct', 'Rhoda Ward', 'KE_Ward_874', 'KTayLusaU5I', 'KTayLusaU5I', 'eQNgjFoG2ct', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('xgHhSzo3AuN', 'Riabai Ward', 'KE_Ward_584', 'SBz4c48i24Y', 'SBz4c48i24Y', 'xgHhSzo3AuN', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('f2pOlRPY9gE', 'Riana Ward', 'KE_Ward_1304', 'zCCIu1Vi3Wh', 'zCCIu1Vi3Wh', 'f2pOlRPY9gE', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('XLsFzNATUQ2', 'Ribkwo Ward', 'KE_Ward_783', 'Mk4bMOSMRTB', 'Mk4bMOSMRTB', 'XLsFzNATUQ2', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('oq5P0uoHv4U', 'Rigoma Ward', 'KE_Ward_1346', 'Qn5Fff2lIDz', 'Qn5Fff2lIDz', 'oq5P0uoHv4U', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('PTKcICD0k31', 'Riruta Ward', 'KE_Ward_1378', 'sqNWYDHZZ6W', 'sqNWYDHZZ6W', 'PTKcICD0k31', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('NZYstvTB9u9', 'Riwo Ward', 'KE_Ward_641', 'ylWg6VvADJE', 'ylWg6VvADJE', 'NZYstvTB9u9', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('Zk0ZFibhfaI', 'Rombo Ward', 'KE_Ward_934', 'eyADpAXM834', 'eyADpAXM834', 'Zk0ZFibhfaI', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('Xj8EsCO27Jv', 'Rongena/Manaret Ward', 'KE_Ward_970', 'KyuSYunELJI', 'KyuSYunELJI', 'Xj8EsCO27Jv', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('px49ejbHkuk', 'Ronge Ward', 'KE_Ward_120', 'IBDoGsLdhvt', 'IBDoGsLdhvt', 'px49ejbHkuk', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('RRAEO9Ltfec', 'Roysambu Ward', 'KE_Ward_1394', 'j7GpbairCOi', 'j7GpbairCOi', 'RRAEO9Ltfec', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('wskDg8KQ0v3', 'Ruai Ward', 'KE_Ward_1400', 'FoqzDgIByL6', 'FoqzDgIByL6', 'wskDg8KQ0v3', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('WE5SA6SLnRY', 'Ruchu Ward', 'KE_Ward_544', 'gwYTo0wITYX', 'gwYTo0wITYX', 'WE5SA6SLnRY', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('EitnMJgAT0z', 'Rugi Ward', 'KE_Ward_488', 'zT8Zj5vNYCy', 'zT8Zj5vNYCy', 'EitnMJgAT0z', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('ncD8mIBXHRn', 'Ruguru-ngandori Ward', 'KE_Ward_311', 'IPOMRXiYjxr', 'IPOMRXiYjxr', 'ncD8mIBXHRn', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('Z2yWQMpy2Ki', 'Ruguru Ward', 'KE_Ward_477', 'msIc1uFAY6B', 'msIc1uFAY6B', 'Z2yWQMpy2Ki', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('LXCb2xO5iF7', 'Ruiru/Rwawera Ward', 'KE_Ward_284', 'xN5aPo4ZOIt', 'xN5aPo4ZOIt', 'LXCb2xO5iF7', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('UGCu7Ut7H7M', 'Ruma-kaksingiri East Ward', 'KE_Ward_1260', 'HoRW5aISmiD', 'HoRW5aISmiD', 'UGCu7Ut7H7M', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('JoGNwQRLIWT', 'Rumuruti Township Ward', 'KE_Ward_812', 'pXbWrnFPpKb', 'pXbWrnFPpKb', 'JoGNwQRLIWT', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('eBk1tdli8XV', 'Rurii Ward', 'KE_Ward_457', 'Lm9RMwhIu3G', 'Lm9RMwhIu3G', 'eBk1tdli8XV', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('h8Uo12ri0RF', 'Ruring\'u Ward', 'KE_Ward_494', 'GXnD5lHeanK', 'GXnD5lHeanK', 'h8Uo12ri0RF', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('u36eldinqnE', 'Ruruma Ward', 'KE_Ward_68', 'hJf4rt7cvI6', 'hJf4rt7cvI6', 'u36eldinqnE', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('OjYMSbDEKRc', 'Rusinga Island Ward', 'KE_Ward_1253', 'mCGytMcMf6y', 'mCGytMcMf6y', 'OjYMSbDEKRc', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('At5MPktCh4M', 'Rware Ward', 'KE_Ward_492', 'GXnD5lHeanK', 'GXnD5lHeanK', 'At5MPktCh4M', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('UYC51WCz1R2', 'Rwathia Ward', 'KE_Ward_518', 'U9CLTNIwehR', 'U9CLTNIwehR', 'UYC51WCz1R2', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('fXc21yLLxVd', 'Sabaki Ward', 'KE_Ward_85', 'KMWrMZrlO5u', 'KMWrMZrlO5u', 'fXc21yLLxVd', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('bdYNcnPn5ze', 'Sabena Ward', 'KE_Ward_144', 'J69iWev2zwu', 'J69iWev2zwu', 'bdYNcnPn5ze', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('OBSb0eIl4tb', 'Saboti Ward', 'KE_Ward_686', 'y2M16lesMsF', 'y2M16lesMsF', 'OBSb0eIl4tb', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('X0OCKVcartn', 'Sacho Ward', 'KE_Ward_794', 'k7Rj54u6dMx', 'k7Rj54u6dMx', 'X0OCKVcartn', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('IawwjaYnKtR', 'Sagala Ward', 'KE_Ward_126', 'yoGLpCTgjed', 'yoGLpCTgjed', 'IawwjaYnKtR', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('Tn1grqaqx7v', 'Sagamian Ward', 'KE_Ward_906', 'bnYzgzYe2Z7', 'bnYzgzYe2Z7', 'Tn1grqaqx7v', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('G2LQpPk5BXU', 'Sagante/Jaldesa Ward', 'KE_Ward_233', 'WILszL634oZ', 'WILszL634oZ', 'G2LQpPk5BXU', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('PS4XNPha7bO', 'Saimoi/Kipsaraman Ward', 'KE_Ward_790', 'bqtTmWcikTN', 'bqtTmWcikTN', 'PS4XNPha7bO', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('SRnkv6Fgvoh', 'Saimo/Soi Ward', 'KE_Ward_791', 'bqtTmWcikTN', 'bqtTmWcikTN', 'SRnkv6Fgvoh', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('pSar0ObQa6I', 'Saka Ward', 'KE_Ward_138', 'FGBNPr91pXH', 'FGBNPr91pXH', 'pSar0ObQa6I', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('vU9560o42tL', 'Salama Ward', 'KE_Ward_816', 'pXbWrnFPpKb', 'pXbWrnFPpKb', 'vU9560o42tL', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('tc9MpZMV6yJ', 'Sala Ward', 'KE_Ward_99', 'yWPcTwGwQ2B', 'yWPcTwGwQ2B', 'tc9MpZMV6yJ', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('OvRvzstUL5A', 'Sambirir Ward', 'KE_Ward_732', 'EZraJgLdRLX', 'EZraJgLdRLX', 'OvRvzstUL5A', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('qH2ke0Qrbu7', 'Sameta/Mokwerero Ward', 'KE_Ward_1321', 'cooDDG3Lh3A', 'cooDDG3Lh3A', 'qH2ke0Qrbu7', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('rw3XdXqwht4', 'Sangailu Ward', 'KE_Ward_158', 'uyeif4CPqHt', 'uyeif4CPqHt', 'rw3XdXqwht4', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('Vh31LHi1RC8', 'Sangalo/Kebulonik Ward', 'KE_Ward_780', 'Xtb7tbJpk9p', 'Xtb7tbJpk9p', 'Vh31LHi1RC8', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('A7zboeNsKAz', 'Sango Ward', 'KE_Ward_998', 'wMv0s3U2nnG', 'wMv0s3U2nnG', 'A7zboeNsKAz', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('XSRJUTBck5b', 'Sankuri Ward', 'KE_Ward_139', 'FGBNPr91pXH', 'FGBNPr91pXH', 'XSRJUTBck5b', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('dYniZG1Q7Tk', 'Sarang\'ombe Ward', 'KE_Ward_1390', 'LO5he3DtiFG', 'LO5he3DtiFG', 'dYniZG1Q7Tk', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('BtTdA2pR73q', 'Sarman Ward', 'KE_Ward_173', 'fmNokBURXjM', 'fmNokBURXjM', 'BtTdA2pR73q', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('Kx1h1yqLZh9', 'Segera Ward', 'KE_Ward_823', 'RJyUfi5BQUm', 'RJyUfi5BQUm', 'Kx1h1yqLZh9', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('LXgF3A1KBLn', 'Segeroi/Barsombe Ward', 'KE_Ward_704', 'lmr1q6dTaso', 'lmr1q6dTaso', 'LXgF3A1KBLn', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('LTr0Kfbxu9C', 'Sekerr Ward', 'KE_Ward_647', 'SCbMzaOeTuR', 'SCbMzaOeTuR', 'LTr0Kfbxu9C', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('T8RJtzhGvHA', 'Sengwer Ward', 'KE_Ward_736', 'fNCuk4Lpsnh', 'fNCuk4Lpsnh', 'T8RJtzhGvHA', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('SmXNTLIxvM0', 'Sensi Ward', 'KE_Ward_1338', 'cQkF9l9wePP', 'cQkF9l9wePP', 'SmXNTLIxvM0', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('TCTO059sj6I', 'Sergoit Ward', 'KE_Ward_715', 'q8R0FA1hxnP', 'q8R0FA1hxnP', 'TCTO059sj6I', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('Yqxw7nddfbo', 'Sericho Ward', 'KE_Ward_250', 'ecl4YnDebUi', 'ecl4YnDebUi', 'Yqxw7nddfbo', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('lTh2MSvx02l', 'Shaabab Ward', 'KE_Ward_875', 'KTayLusaU5I', 'KTayLusaU5I', 'lTh2MSvx02l', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('hXKwpKcEej9', 'Shamakhokho Ward', 'KE_Ward_1063', 'BXaq5PxSfz2', 'BXaq5PxSfz2', 'hXKwpKcEej9', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('W9GVYGq6UqK', 'Shamata Ward', 'KE_Ward_465', 'EESGLsSLTqH', 'EESGLsSLTqH', 'W9GVYGq6UqK', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('L1Lr24F5gyc', 'Shankoe Ward', 'KE_Ward_884', 'Nb6e34jNGAq', 'Nb6e34jNGAq', 'L1Lr24F5gyc', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('ZvkGsTVOoog', 'Shanzu Ward', 'KE_Ward_15', 'C1hO6wNOgrH', 'C1hO6wNOgrH', 'ZvkGsTVOoog', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('UqLylL8NY0G', 'Shauri Moyo Kaloleni Ward', 'KE_Ward_1198', 'OpLt8IgyHop', 'OpLt8IgyHop', 'UqLylL8NY0G', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('hlwSQTsP5nU', 'Shella Ward', 'KE_Ward_104', 'Lfxw0DfD4jN', 'Lfxw0DfD4jN', 'hlwSQTsP5nU', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('QVwBQhJwtOG', 'Sheywe Ward', 'KE_Ward_1012', 'Y3NjAhiBaZT', 'Y3NjAhiBaZT', 'QVwBQhJwtOG', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('cFjb7QOxAMu', 'Shika Adabu Ward', 'KE_Ward_22', 'iy93Mmi73Or', 'iy93Mmi73Or', 'cFjb7QOxAMu', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('I1ioJIBPdpG', 'Shimanzi/Ganjoni Ward', 'KE_Ward_29', 'C1xuoa1NAMm', 'C1xuoa1NAMm', 'I1ioJIBPdpG', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('Z9zNkBFLY9r', 'Shimbir Fatuma Ward', 'KE_Ward_210', 'qyhVIMG2rUw', 'qyhVIMG2rUw', 'Z9zNkBFLY9r', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('QfHPo7H918V', 'Shimo La Tewa Ward', 'KE_Ward_60', 'xWAZBULwGxp', 'xWAZBULwGxp', 'QfHPo7H918V', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('rFlaJBkq35x', 'Shinoyi-shikomari-esumeiya Ward', 'KE_Ward_1016', 'G6PJ5kFVAuO', 'G6PJ5kFVAuO', 'rFlaJBkq35x', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('yKF1kdNdLqM', 'Shirere Ward', 'KE_Ward_1014', 'Y3NjAhiBaZT', 'Y3NjAhiBaZT', 'yKF1kdNdLqM', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('pCenQt4VPGz', 'Shirungu-mugai Ward', 'KE_Ward_1007', 'ES1CWa4AJmJ', 'ES1CWa4AJmJ', 'pCenQt4VPGz', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('iphxMgFUJmE', 'Shiru Ward', 'KE_Ward_1061', 'BXaq5PxSfz2', 'BXaq5PxSfz2', 'iphxMgFUJmE', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('amNn0DeeFdo', 'Siana Ward', 'KE_Ward_909', 'ouA247cg58A', 'ouA247cg58A', 'amNn0DeeFdo', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('bcaDvBIDj6b', 'Siaya Township Ward', 'KE_Ward_1166', 'Cu46otDi1RO', 'Cu46otDi1RO', 'bcaDvBIDj6b', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('iKmwecDBqgX', 'Siboti Ward', 'KE_Ward_1095', 'jkQZEow83MX', 'jkQZEow83MX', 'iKmwecDBqgX', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('rngZkqTBd03', 'Sidindi Ward', 'KE_Ward_1160', 'm9nsQ1MXlVU', 'm9nsQ1MXlVU', 'rngZkqTBd03', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('WrmJKkvfjDl', 'Sigomere Ward', 'KE_Ward_1161', 'm9nsQ1MXlVU', 'm9nsQ1MXlVU', 'WrmJKkvfjDl', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('Rm2JR4F01rw', 'Sigona Ward', 'KE_Ward_598', 'jOVcLeZQSsS', 'jOVcLeZQSsS', 'Rm2JR4F01rw', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('KFjbUWezAnU', 'Sigor Ward', 'KE_Ward_973', 'PUhMyfDD2xp', 'PUhMyfDD2xp', 'KFjbUWezAnU', '2026-03-16 11:14:45', '2026-03-16 11:14:45'),
('BzWaUDxCn6y', 'Sigowet Ward', 'KE_Ward_962', 'ScLzA7tQxrH', 'ScLzA7tQxrH', 'BzWaUDxCn6y', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('SvN2Xzl3FK7', 'Sikhendu Ward', 'KE_Ward_692', 'pzZHpL2ueIn', 'pzZHpL2ueIn', 'SvN2Xzl3FK7', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('k2oUoGgQ9Nd', 'Silale Ward', 'KE_Ward_784', 'st4v8xfqgJf', 'st4v8xfqgJf', 'k2oUoGgQ9Nd', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('tM4Bmyj48cN', 'Silibwet Township Ward', 'KE_Ward_981', 'm9gdonbVXjZ', 'm9gdonbVXjZ', 'tM4Bmyj48cN', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('G30113eUpwM', 'Simat/Kapseret Ward', 'KE_Ward_722', 'u9yagZzK49q', 'u9yagZzK49q', 'G30113eUpwM', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('wHeMr9JlYBi', 'Singorwet Ward', 'KE_Ward_983', 'm9gdonbVXjZ', 'm9gdonbVXjZ', 'wHeMr9JlYBi', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('clRPOipiZXp', 'Sinoko Ward', 'KE_Ward_1001', 'wMv0s3U2nnG', 'wMv0s3U2nnG', 'clRPOipiZXp', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('hHfS8R69bEH', 'Sinyerere Ward', 'KE_Ward_694', 'f18kGo9yXWo', 'f18kGo9yXWo', 'hHfS8R69bEH', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('zxVl78P6p8i', 'Siongiroi Ward', 'KE_Ward_975', 'PUhMyfDD2xp', 'PUhMyfDD2xp', 'zxVl78P6p8i', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('FXjBryC2ysZ', 'Sirende Ward', 'KE_Ward_690', 'pzZHpL2ueIn', 'pzZHpL2ueIn', 'FXjBryC2ysZ', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('aGRpaeG5ziX', 'Sirikwa Ward', 'KE_Ward_855', 'QBwORnYdu0e', 'QBwORnYdu0e', 'aGRpaeG5ziX', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('jUfXO40BeXD', 'Sitatunga Ward', 'KE_Ward_700', 'f18kGo9yXWo', 'f18kGo9yXWo', 'jUfXO40BeXD', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('CYjWRY8PNTJ', 'Sitikho Ward', 'KE_Ward_1108', 'aqYhbqKclsI', 'aqYhbqKclsI', 'CYjWRY8PNTJ', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('zf52hYIUeSz', 'Siyoi Ward', 'KE_Ward_644', 'ylWg6VvADJE', 'ylWg6VvADJE', 'zf52hYIUeSz', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('xlp4GwINQiC', 'Sogoo Ward', 'KE_Ward_905', 'bnYzgzYe2Z7', 'bnYzgzYe2Z7', 'xlp4GwINQiC', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('bHrDi28DWdF', 'Soin Ward', 'KE_Ward_965', 'ScLzA7tQxrH', 'ScLzA7tQxrH', 'bHrDi28DWdF', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('kpL4HsQ7YZ5', 'Sokoke Ward', 'KE_Ward_74', 'x7qUMtZZvo9', 'x7qUMtZZvo9', 'kpL4HsQ7YZ5', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('M5NeUqFK6KO', 'Sokoni Ward', 'KE_Ward_52', 'MEkEH8ZmcOU', 'MEkEH8ZmcOU', 'M5NeUqFK6KO', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('qjDeBQFEB19', 'Solai Ward', 'KE_Ward_864', 'OK0hW8DFHq3', 'OK0hW8DFHq3', 'qjDeBQFEB19', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('dUgf0oEF9if', 'Soliat Ward', 'KE_Ward_964', 'ScLzA7tQxrH', 'ScLzA7tQxrH', 'dUgf0oEF9if', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('IdYKTiaR0Cy', 'Sololo Ward', 'KE_Ward_222', 'sZjPgbWI5ra', 'sZjPgbWI5ra', 'IdYKTiaR0Cy', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('MWpytk1a5rh', 'Songhor/Soba Ward', 'KE_Ward_751', 'NPYRMdqrK6L', 'NPYRMdqrK6L', 'MWpytk1a5rh', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('wMAoxOk8ORf', 'Songot Ward', 'KE_Ward_620', 'HK5SUCMQmsw', 'HK5SUCMQmsw', 'wMAoxOk8ORf', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('UZ1D4NEN1qb', 'Sook Ward', 'KE_Ward_646', 'ylWg6VvADJE', 'ylWg6VvADJE', 'UZ1D4NEN1qb', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('Dg8SGNnGQny', 'Sosian Ward', 'KE_Ward_822', 'RJyUfi5BQUm', 'RJyUfi5BQUm', 'Dg8SGNnGQny', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('kMwgldKtwou', 'South Bukusu Ward', 'KE_Ward_1089', 'jkQZEow83MX', 'jkQZEow83MX', 'kMwgldKtwou', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('ZWRytukDvQ7', 'South C Ward', 'KE_Ward_1384', 'aTGYlhEw2Xx', 'aTGYlhEw2Xx', 'ZWRytukDvQ7', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('hMo6PZnvQqb', 'South East Alego Ward', 'KE_Ward_1168', 'Cu46otDi1RO', 'Cu46otDi1RO', 'hMo6PZnvQqb', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('TAZBFBDq6KC', 'South East Nyakach Ward', 'KE_Ward_1220', 'kBQIjtWUBqj', 'kBQIjtWUBqj', 'TAZBFBDq6KC', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('F3o4X4OBHKw', 'South Gem Ward', 'KE_Ward_1174', 'PKeFksHlJkB', 'PKeFksHlJkB', 'F3o4X4OBHKw', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('klgKsqqI93s', 'South Kabras Ward', 'KE_Ward_1008', 'ES1CWa4AJmJ', 'ES1CWa4AJmJ', 'klgKsqqI93s', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('DABObbHgPMX', 'South Kamagambo Ward', 'KE_Ward_1264', 'fT37q3rXQ35', 'fT37q3rXQ35', 'DABObbHgPMX', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('FdBel1HNlGu', 'South Kanyamkago Ward', 'KE_Ward_1280', 'fCInDXluNhx', 'fCInDXluNhx', 'FdBel1HNlGu', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('xiP5RKdvPTn', 'South Kasipul Ward', 'KE_Ward_1222', 'NhsAMiaS0TD', 'NhsAMiaS0TD', 'xiP5RKdvPTn', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('hTylTMl1aid', 'South Maragoli Ward', 'KE_Ward_1052', 'OOF3UX4yOt7', 'OOF3UX4yOt7', 'hTylTMl1aid', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('CRBP2g6KqWH', 'South Sakwa Ward', 'KE_Ward_1266', 'JNvqpOnKfGR', 'JNvqpOnKfGR', 'CRBP2g6KqWH', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('VlWsveTXbi3', 'South Uyoma Ward', 'KE_Ward_1184', 'XcRpb1xsM64', 'XcRpb1xsM64', 'VlWsveTXbi3', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('hAzpUozlCyI', 'South West Kisumu Ward', 'KE_Ward_1191', 'YzEDO9Mq4TR', 'YzEDO9Mq4TR', 'hAzpUozlCyI', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('oTl0WEQrKtX', 'South West Nyakach Ward', 'KE_Ward_1216', 'kBQIjtWUBqj', 'kBQIjtWUBqj', 'oTl0WEQrKtX', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('k3OQIur2Wia', 'Soy North Ward', 'KE_Ward_747', 'SOEG546PqbA', 'SOEG546PqbA', 'k3OQIur2Wia', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('pc8868uNy8r', 'Soysambu/Mitua Ward', 'KE_Ward_1120', 'orUwYD52An3', 'orUwYD52An3', 'pc8868uNy8r', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('SZAo3nP3jDj', 'Soy South Ward', 'KE_Ward_748', 'SOEG546PqbA', 'SOEG546PqbA', 'SZAo3nP3jDj', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('m7g3tve46XL', 'Soy Ward', 'KE_Ward_706', 'lmr1q6dTaso', 'lmr1q6dTaso', 'm7g3tve46XL', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('ieOIyNJbMxc', 'Suam Ward', 'KE_Ward_651', 'YXpHG1Ez8V2', 'YXpHG1Ez8V2', 'ieOIyNJbMxc', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('obOP2eWg8EX', 'Subukia Ward', 'KE_Ward_857', 'zQEuNRaPYgE', 'zQEuNRaPYgE', 'obOP2eWg8EX', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('i5te7PTlUjg', 'Suguta Marmar Ward', 'KE_Ward_662', 'EmQRGVtvWy3', 'EmQRGVtvWy3', 'i5te7PTlUjg', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('QAxizS8H0d7', 'Suna Central Ward', 'KE_Ward_1270', 'nHEr5EciFh0', 'nHEr5EciFh0', 'QAxizS8H0d7', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('iZN31WZZycN', 'Suswa Ward', 'KE_Ward_900', 'gZM3NbHaugk', 'gZM3NbHaugk', 'iZN31WZZycN', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('TcWlRA6LpLB', 'Syokimau/Mulolongo Ward', 'KE_Ward_397', 'BxfsSc6Svrc', 'BxfsSc6Svrc', 'TcWlRA6LpLB', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('e0kbTojCjio', 'Tabaka Ward', 'KE_Ward_1305', 'WHG67QCDRS9', 'WHG67QCDRS9', 'e0kbTojCjio', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('EFFhTqzNEYT', 'Tagare Ward', 'KE_Ward_1294', 'jtBjNpL9FXS', 'jtBjNpL9FXS', 'EFFhTqzNEYT', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('QPvTzWqCuvE', 'Takaba South Ward', 'KE_Ward_191', 'H5RvDZkoDJL', 'H5RvDZkoDJL', 'QPvTzWqCuvE', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('cnOOaygI2G3', 'Takaba Ward', 'KE_Ward_192', 'H5RvDZkoDJL', 'H5RvDZkoDJL', 'cnOOaygI2G3', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('fEYm1lDe2ES', 'Tala Ward', 'KE_Ward_385', 'GnixPSqaV6D', 'GnixPSqaV6D', 'fEYm1lDe2ES', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('q3dexsgOLhS', 'Tambach Ward', 'KE_Ward_743', 'rlWH0Ac9vjc', 'rlWH0Ac9vjc', 'q3dexsgOLhS', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('pyG6e1Uq18m', 'Tambua Ward', 'KE_Ward_1066', 'BXaq5PxSfz2', 'BXaq5PxSfz2', 'pyG6e1Uq18m', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('i4HY1pMsQ4q', 'Tangulbei/Korossi Ward', 'KE_Ward_786', 'st4v8xfqgJf', 'st4v8xfqgJf', 'i4HY1pMsQ4q', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('WmCj9vCPVH2', 'Tapach Ward', 'KE_Ward_660', 'u2zJahNiSP5', 'u2zJahNiSP5', 'WmCj9vCPVH2', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('w6dTkyKAgzB', 'Tapsagoi Ward', 'KE_Ward_709', 'KuprsuBe1l0', 'KuprsuBe1l0', 'w6dTkyKAgzB', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('HrhIAUzgxqq', 'Tarakwa Ward', 'KE_Ward_730', 'dKHnvt7gleN', 'dKHnvt7gleN', 'HrhIAUzgxqq', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('ua8MQfTav4q', 'Tarbaj Ward', 'KE_Ward_174', 'fmNokBURXjM', 'fmNokBURXjM', 'ua8MQfTav4q', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('qrCcjRw4mdw', 'Tebere Ward', 'KE_Ward_503', 'jHmpQUlnkQk', 'jHmpQUlnkQk', 'qrCcjRw4mdw', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('Fz7L53g5qRy', 'Tebesonik Ward', 'KE_Ward_951', 'wt8cPHWfkfu', 'wt8cPHWfkfu', 'Fz7L53g5qRy', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('ZDarbsCJmOy', 'Tembelio Ward', 'KE_Ward_714', 'q8R0FA1hxnP', 'q8R0FA1hxnP', 'ZDarbsCJmOy', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('OrFIWXUMeP6', 'Tendeno/Sorget Ward', 'KE_Ward_939', 'gU0Cz7Qlfss', 'gU0Cz7Qlfss', 'OrFIWXUMeP6', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('l7Lt0CsaQGl', 'Tenges Ward', 'KE_Ward_795', 'k7Rj54u6dMx', 'k7Rj54u6dMx', 'l7Lt0CsaQGl', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('ojy9ffncq0R', 'Terik Ward', 'KE_Ward_756', 'Sq2fLWnOCGg', 'Sq2fLWnOCGg', 'ojy9ffncq0R', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('xmMP1QapXiY', 'Tezo Ward', 'KE_Ward_51', 'MEkEH8ZmcOU', 'MEkEH8ZmcOU', 'xmMP1QapXiY', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('ELYCgxhiudW', 'Thangatha Ward', 'KE_Ward_271', 'NIVPdmQjQKg', 'NIVPdmQjQKg', 'ELYCgxhiudW', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('zU0IodQbzMz', 'Thange Ward', 'KE_Ward_439', 'ZhhyithPNoI', 'ZhhyithPNoI', 'zU0IodQbzMz', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('bBYJtOmYctd', 'Tharaka Ward', 'KE_Ward_335', 'KXM9VnhuLfP', 'KXM9VnhuLfP', 'bBYJtOmYctd', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('lZXZ7HwrMGu', 'Thegu River Ward', 'KE_Ward_474', 'YXt5ETQPRlB', 'YXt5ETQPRlB', 'lZXZ7HwrMGu', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('fxLikKorklY', 'Theta Ward', 'KE_Ward_560', 'aiqi2bz0IMI', 'aiqi2bz0IMI', 'fxLikKorklY', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('Fx3891QAEv0', 'Thiba Ward', 'KE_Ward_498', 'f6EOn3xI9YH', 'f6EOn3xI9YH', 'Fx3891QAEv0', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('AMlucMGQuxK', 'Thingithu Ward', 'KE_Ward_819', 'pF6qPMIlHte', 'pF6qPMIlHte', 'AMlucMGQuxK', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('ccNXklFrzuP', 'Tigithi Ward', 'KE_Ward_818', 'pF6qPMIlHte', 'pF6qPMIlHte', 'ccNXklFrzuP', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('WnXi46WSP7B', 'Timau Ward', 'KE_Ward_281', 'XlYC8FMUgxi', 'XlYC8FMUgxi', 'WnXi46WSP7B', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('bZcRxqnzRy0', 'Timbwani Ward', 'KE_Ward_25', 'iy93Mmi73Or', 'iy93Mmi73Or', 'bZcRxqnzRy0', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('f2OJrvgkEuq', 'Tinderet Ward', 'KE_Ward_752', 'NPYRMdqrK6L', 'NPYRMdqrK6L', 'f2OJrvgkEuq', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('fi569D0zk8J', 'Tinet Ward', 'KE_Ward_852', 'QwGkDS0DNls', 'QwGkDS0DNls', 'fi569D0zk8J', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('G5RaW09czpW', 'Ting\'ang\'a Ward', 'KE_Ward_582', 'SBz4c48i24Y', 'SBz4c48i24Y', 'G5RaW09czpW', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('HTbw8gm6kms', 'Tirioko Ward', 'KE_Ward_781', 'Mk4bMOSMRTB', 'Mk4bMOSMRTB', 'HTbw8gm6kms', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('JBSYO3skSW5', 'Tiwi Ward', 'KE_Ward_41', 'wUNEDOnx9uB', 'wUNEDOnx9uB', 'JBSYO3skSW5', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('Epj7vWxFyG0', 'Tongaren Ward', 'KE_Ward_1119', 'orUwYD52An3', 'orUwYD52An3', 'Epj7vWxFyG0', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('Dvo3BcpbGkD', 'Tononoka Ward', 'KE_Ward_28', 'C1xuoa1NAMm', 'C1xuoa1NAMm', 'Dvo3BcpbGkD', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('byxif4bfwvo', 'Township Ward', 'KE_Ward_585', 'SBz4c48i24Y', 'SBz4c48i24Y', 'byxif4bfwvo', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('RJxeNbjGm71', 'Tseikuru Ward', 'KE_Ward_334', 'KXM9VnhuLfP', 'KXM9VnhuLfP', 'RJxeNbjGm71', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('HLbG24kuSHF', 'Tsimba Golini Ward', 'KE_Ward_39', 'wUNEDOnx9uB', 'wUNEDOnx9uB', 'HLbG24kuSHF', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('oLZDP6nDlYc', 'Tudor Ward', 'KE_Ward_27', 'C1xuoa1NAMm', 'C1xuoa1NAMm', 'oLZDP6nDlYc', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('FNq96CChp6E', 'Tulimani Ward', 'KE_Ward_411', 'jxjGWCdfsib', 'jxjGWCdfsib', 'FNq96CChp6E', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('M2Y9JtFNd0u', 'Tulwet/Chuiyat Ward', 'KE_Ward_729', 'dKHnvt7gleN', 'dKHnvt7gleN', 'M2Y9JtFNd0u', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('WJ7jJ5A1MjS', 'Turbi Ward', 'KE_Ward_230', 'j6fqt5TYqPZ', 'j6fqt5TYqPZ', 'WJ7jJ5A1MjS', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('PBAbBC0gDLA', 'Turi Ward', 'KE_Ward_828', 'RJ4LGJiSHFg', 'RJ4LGJiSHFg', 'PBAbBC0gDLA', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('vpERRHtFCWg', 'Turkwel Ward', 'KE_Ward_630', 'OZiGQn2R8kK', 'OZiGQn2R8kK', 'vpERRHtFCWg', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('xpKH3jY02I5', 'Tuwani Ward', 'KE_Ward_685', 'y2M16lesMsF', 'y2M16lesMsF', 'xpKH3jY02I5', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('pHKNjOmIqg4', 'Ugunja Ward', 'KE_Ward_1162', 'm9nsQ1MXlVU', 'm9nsQ1MXlVU', 'pHKNjOmIqg4', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('INKzs9VvqEs', 'Ukia Ward', 'KE_Ward_420', 'pKJ4NZGPzTA', 'pKJ4NZGPzTA', 'INKzs9VvqEs', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('iBuXrh8ESS2', 'Ukunda Ward', 'KE_Ward_32', 'ADMywdLwoRX', 'ADMywdLwoRX', 'iBuXrh8ESS2', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('AxesNVgsvhq', 'Ukwala Ward', 'KE_Ward_1157', 'InECuIlzJGx', 'InECuIlzJGx', 'AxesNVgsvhq', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('GpddBXmXl2i', 'Umande Ward', 'KE_Ward_821', 'pF6qPMIlHte', 'pF6qPMIlHte', 'GpddBXmXl2i', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('ivNrlSMRNra', 'Umoja II Ward', 'KE_Ward_1427', 'aCwUX5V42Zz', 'aCwUX5V42Zz', 'ivNrlSMRNra', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('Zmv9YmuisYs', 'Umoja I Ward', 'KE_Ward_1426', 'aCwUX5V42Zz', 'aCwUX5V42Zz', 'Zmv9YmuisYs', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('nDNeAIZ7KRc', 'Upper Kaewa/Iveti Ward', 'KE_Ward_392', 'iCey76HYgLP', 'iCey76HYgLP', 'nDNeAIZ7KRc', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('OaqOHmb6jNs', 'Upper Savannah Ward', 'KE_Ward_1421', 'gD4xxgDGJ4Y', 'gD4xxgDGJ4Y', 'OaqOHmb6jNs', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('KKOlWI3X5nP', 'Uran Ward', 'KE_Ward_226', 'sZjPgbWI5ra', 'sZjPgbWI5ra', 'KKOlWI3X5nP', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('utYTK2xBC3k', 'Usonga Ward', 'KE_Ward_1163', 'Cu46otDi1RO', 'Cu46otDi1RO', 'utYTK2xBC3k', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('r1YlC9GTC4S', 'Utalii Ward', 'KE_Ward_1402', 'Cc8uEFkzfVf', 'Cc8uEFkzfVf', 'r1YlC9GTC4S', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('rEwQxmUPoZE', 'Utawala Ward', 'KE_Ward_1424', 'gD4xxgDGJ4Y', 'gD4xxgDGJ4Y', 'rEwQxmUPoZE', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('jaQjWqSJPAd', 'Uthiru/Ruthimitu Ward', 'KE_Ward_1379', 'sqNWYDHZZ6W', 'sqNWYDHZZ6W', 'jaQjWqSJPAd', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('AJKSRemTmee', 'Uthiru Ward', 'KE_Ward_595', 'lb5LzWiUX8Y', 'lb5LzWiUX8Y', 'AJKSRemTmee', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('HEKTLM0EwH0', 'Vanga Ward', 'KE_Ward_38', 'TdcYaufNV4p', 'TdcYaufNV4p', 'HEKTLM0EwH0', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('bKCcKfnNznJ', 'Visoi Ward', 'KE_Ward_862', 'OK0hW8DFHq3', 'OK0hW8DFHq3', 'bKCcKfnNznJ', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('quIiSx3L8OJ', 'Viwandani Ward', 'KE_Ward_843', 'yZJJPoSGhY6', 'yZJJPoSGhY6', 'quIiSx3L8OJ', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('fYDplrDSXQI', 'Voo/Kyamatu Ward', 'KE_Ward_362', 'd0Gu8FrRM0Y', 'd0Gu8FrRM0Y', 'fYDplrDSXQI', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('XZNJ3zaiaZH', 'Waa Ng\'ombeni Ward', 'KE_Ward_40', 'wUNEDOnx9uB', 'wUNEDOnx9uB', 'XZNJ3zaiaZH', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('rIdiIpv9fBt', 'Wabera Ward', 'KE_Ward_241', 'I2LYLqKU6AW', 'I2LYLqKU6AW', 'rIdiIpv9fBt', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('moyjoMLymNA', 'Waberi Ward', 'KE_Ward_131', 'lQkHbTC1iRg', 'lQkHbTC1iRg', 'moyjoMLymNA', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('bvqz4r93cJm', 'Wagberi Ward', 'KE_Ward_168', 'uov0yFMw9Qm', 'uov0yFMw9Qm', 'bvqz4r93cJm', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('aMAJt97Ksnm', 'Waia-kako Ward', 'KE_Ward_415', 'jxjGWCdfsib', 'jxjGWCdfsib', 'aMAJt97Ksnm', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('rPVkyP8OlZW', 'Waitaluk Ward', 'KE_Ward_689', 'pzZHpL2ueIn', 'pzZHpL2ueIn', 'rPVkyP8OlZW', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('sTm9i4x7TTQ', 'Waita Ward', 'KE_Ward_345', 'uE7HKhqPOtf', 'uE7HKhqPOtf', 'sTm9i4x7TTQ', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('pUKcRGZTyGW', 'Waithaka Ward', 'KE_Ward_1380', 'sqNWYDHZZ6W', 'sqNWYDHZZ6W', 'pUKcRGZTyGW', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('yG5oV3cleu9', 'Waldai Ward', 'KE_Ward_957', 'YnIAWg1T4AY', 'YnIAWg1T4AY', 'yG5oV3cleu9', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('AO0q4JiVIMz', 'Wamagana Ward', 'KE_Ward_467', 'YT3tecc4atw', 'YT3tecc4atw', 'AO0q4JiVIMz', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('WieLheAfLdw', 'Wamba East Ward', 'KE_Ward_674', 'ldZ10N9unC9', 'ldZ10N9unC9', 'WieLheAfLdw', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('p2OJcxIoP6e', 'Wamba North Ward', 'KE_Ward_675', 'ldZ10N9unC9', 'ldZ10N9unC9', 'p2OJcxIoP6e', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('KnKoadZgQjY', 'Wamba West Ward', 'KE_Ward_673', 'ldZ10N9unC9', 'ldZ10N9unC9', 'KnKoadZgQjY', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('zMPe9KHPLp0', 'Wamumu Ward', 'KE_Ward_499', 'f6EOn3xI9YH', 'f6EOn3xI9YH', 'zMPe9KHPLp0', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('TlP41wTPt6a', 'Wamunyu Ward', 'KE_Ward_409', 'fYYivceocJ2', 'fYYivceocJ2', 'TlP41wTPt6a', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('RcF7TZ3ciq5', 'Wang\'chieng Ward', 'KE_Ward_1235', 'fmsyW02tPng', 'fmsyW02tPng', 'RcF7TZ3ciq5', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('zjVTfkcrCb6', 'Wangu Ward', 'KE_Ward_522', 'VDlzh6w4LKv', 'VDlzh6w4LKv', 'zjVTfkcrCb6', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('d5qc4G0CclB', 'Wanjohi Ward', 'KE_Ward_449', 'KlVgeHmvG6n', 'KlVgeHmvG6n', 'd5qc4G0CclB', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('k3FtDRPwlPG', 'Waranqara Ward', 'KE_Ward_219', 'nsfbHBS9tMT', 'nsfbHBS9tMT', 'k3FtDRPwlPG', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('mi3OaBYLsUz', 'Wargadud Ward', 'KE_Ward_175', 'fmNokBURXjM', 'fmNokBURXjM', 'mi3OaBYLsUz', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('Pp4y0VFaeLg', 'Wargudud Ward', 'KE_Ward_206', 'qyhVIMG2rUw', 'qyhVIMG2rUw', 'Pp4y0VFaeLg', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('DCV7v4zjEnm', 'Waseges Ward', 'KE_Ward_858', 'zQEuNRaPYgE', 'zQEuNRaPYgE', 'DCV7v4zjEnm', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('KwrilS23iAS', 'Waseweta II Ward', 'KE_Ward_1274', 'VtuwXD7O1O9', 'VtuwXD7O1O9', 'KwrilS23iAS', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('c2OOtR8JNjy', 'Wasimbete Ward', 'KE_Ward_1276', 'VtuwXD7O1O9', 'VtuwXD7O1O9', 'c2OOtR8JNjy', '2026-03-16 11:14:46', '2026-03-16 11:14:46'),
('l2uOoW4cwIa', 'Waso Ward', 'KE_Ward_672', 'ldZ10N9unC9', 'ldZ10N9unC9', 'l2uOoW4cwIa', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('FmnSathgx18', 'Watamu Ward', 'KE_Ward_56', 'MEkEH8ZmcOU', 'MEkEH8ZmcOU', 'FmnSathgx18', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('OycKfvEFK77', 'Wayu Ward', 'KE_Ward_95', 'A4SNYCxrrnv', 'A4SNYCxrrnv', 'OycKfvEFK77', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('hS0lXNVsykJ', 'Wei Wei Ward', 'KE_Ward_650', 'SCbMzaOeTuR', 'SCbMzaOeTuR', 'hS0lXNVsykJ', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('VY0CncsctUg', 'Wemilabi Ward', 'KE_Ward_1069', 'lkYdgjRSOoE', 'lkYdgjRSOoE', 'VY0CncsctUg', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('vwpMqmZzByo', 'Werugha Ward', 'KE_Ward_117', 'AM36DdkZ36Y', 'AM36DdkZ36Y', 'vwpMqmZzByo', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('yOvD8h5gUOb', 'Weru Ward', 'KE_Ward_460', 'fVSw60UAC3W', 'fVSw60UAC3W', 'yOvD8h5gUOb', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('zaHyyp9lXME', 'West Alego Ward', 'KE_Ward_1164', 'Cu46otDi1RO', 'Cu46otDi1RO', 'zaHyyp9lXME', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('kazFsB6YZ6J', 'West Asembo Ward', 'KE_Ward_1182', 'XcRpb1xsM64', 'XcRpb1xsM64', 'kazFsB6YZ6J', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('gJUwKJIUKEc', 'West Bukusu Ward', 'KE_Ward_1094', 'jkQZEow83MX', 'jkQZEow83MX', 'gJUwKJIUKEc', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('HxODkmO42Nw', 'West Bunyore Ward', 'KE_Ward_1075', 'Lpy789vqRC6', 'Lpy789vqRC6', 'HxODkmO42Nw', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('mEZBjj4fLBT', 'West Gem Ward', 'KE_Ward_1237', 'PKeFksHlJkB', 'PKeFksHlJkB', 'mEZBjj4fLBT', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('vwGFBoFGIlm', 'West Kabras Ward', 'KE_Ward_1002', 'ES1CWa4AJmJ', 'ES1CWa4AJmJ', 'vwGFBoFGIlm', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('pPN9DI12g5m', 'West Kamagak Ward', 'KE_Ward_1225', 'NhsAMiaS0TD', 'NhsAMiaS0TD', 'pPN9DI12g5m', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('ziaLqezx6rb', 'West Kanyamkago Ward', 'KE_Ward_1277', 'fCInDXluNhx', 'fCInDXluNhx', 'ziaLqezx6rb', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('DbwgMpyBfwd', 'West Karachuonyo Ward', 'KE_Ward_1230', 'fmsyW02tPng', 'fmsyW02tPng', 'DbwgMpyBfwd', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('tn1vEO9VD83', 'West Kasipul Ward', 'KE_Ward_1221', 'NhsAMiaS0TD', 'NhsAMiaS0TD', 'tn1vEO9VD83', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('DP7qvMiw5Du', 'West Kisumu Ward', 'KE_Ward_1194', 'YzEDO9Mq4TR', 'YzEDO9Mq4TR', 'DP7qvMiw5Du', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('gZqLcfKb6LQ', 'West Nalondo Ward', 'KE_Ward_1086', 'k1mze33jOs0', 'k1mze33jOs0', 'gZqLcfKb6LQ', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('cSmqxMnL3hd', 'West Nyakach Ward', 'KE_Ward_1219', 'kBQIjtWUBqj', 'kBQIjtWUBqj', 'cSmqxMnL3hd', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('J5T5BAIIILr', 'West Sabatia Ward', 'KE_Ward_1056', 'urtJSF5jcBC', 'urtJSF5jcBC', 'J5T5BAIIILr', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('nLwQA56EFmD', 'West Sakwa Ward', 'KE_Ward_1179', 'ka9Uv3Ckcbd', 'ka9Uv3Ckcbd', 'nLwQA56EFmD', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('uNCqGdTcjkh', 'West Sang\'alo Ward', 'KE_Ward_1103', 'CUjthlounWV', 'CUjthlounWV', 'uNCqGdTcjkh', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('ulkhuNyw2MH', 'West Seme Ward', 'KE_Ward_1202', 'LRNmnMw1fBs', 'LRNmnMw1fBs', 'ulkhuNyw2MH', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('XdZKE7HcK5B', 'West Ugenya Ward', 'KE_Ward_1156', 'InECuIlzJGx', 'InECuIlzJGx', 'XdZKE7HcK5B', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('IqPuAjRYM1t', 'West Uyoma Ward', 'KE_Ward_1185', 'XcRpb1xsM64', 'XcRpb1xsM64', 'IqPuAjRYM1t', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('NYqz8G2gfEC', 'West Yimbo Ward', 'KE_Ward_1175', 'JNvqpOnKfGR', 'JNvqpOnKfGR', 'NYqz8G2gfEC', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('kxIw7ZzqXPq', 'Wiga Ward', 'KE_Ward_1273', 'VtuwXD7O1O9', 'VtuwXD7O1O9', 'kxIw7ZzqXPq', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('OqnujBG8mvl', 'Witeithie Ward', 'KE_Ward_562', 'aiqi2bz0IMI', 'aiqi2bz0IMI', 'OqnujBG8mvl', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('aoySZ1KcDFN', 'Witu Ward', 'KE_Ward_109', 'Lfxw0DfD4jN', 'Lfxw0DfD4jN', 'aoySZ1KcDFN', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('RaGcUBct8yg', 'Wodanga Ward', 'KE_Ward_1059', 'urtJSF5jcBC', 'urtJSF5jcBC', 'RaGcUBct8yg', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('Smgomyf1mXV', 'Woodley/Kenyatta Golf Course Ward', 'KE_Ward_1389', 'LO5he3DtiFG', 'LO5he3DtiFG', 'Smgomyf1mXV', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('MGxM50hGFBS', 'Wote Ward', 'KE_Ward_424', 'AIGIQpolMRn', 'AIGIQpolMRn', 'MGxM50hGFBS', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('MWZrkgY93fj', 'Wumingu/Kishushe Ward', 'KE_Ward_118', 'AM36DdkZ36Y', 'AM36DdkZ36Y', 'MWZrkgY93fj', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('mkbKajFxEDT', 'Wundanyi/Mbale Ward', 'KE_Ward_116', 'AM36DdkZ36Y', 'AM36DdkZ36Y', 'mkbKajFxEDT', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('Xc5oMwMoQcz', 'Wusi/Kishamba Ward', 'KE_Ward_124', 'IBDoGsLdhvt', 'IBDoGsLdhvt', 'Xc5oMwMoQcz', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('PeEcMfBchbr', 'Yala Township Ward', 'KE_Ward_1172', 'PKeFksHlJkB', 'PKeFksHlJkB', 'PeEcMfBchbr', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('bxQkw99jktF', 'Yimbo East Ward', 'KE_Ward_1178', 'JNvqpOnKfGR', 'JNvqpOnKfGR', 'bxQkw99jktF', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('m3CPhYAMMRN', 'Zimmerman Ward', 'KE_Ward_1393', 'j7GpbairCOi', 'j7GpbairCOi', 'm3CPhYAMMRN', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('XhBDUNeFqF6', 'Ziwa La Ng\'ombe Ward', 'KE_Ward_17', 'sr8WEz03EnP', 'sr8WEz03EnP', 'XhBDUNeFqF6', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('nRw6kIlJ23L', 'Ziwani/Kariokor Ward', 'KE_Ward_1442', 'nKHlZyN0lt9', 'nKHlZyN0lt9', 'nRw6kIlJ23L', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('DUsGbpnzvet', 'Ziwa Ward', 'KE_Ward_703', 'lmr1q6dTaso', 'lmr1q6dTaso', 'DUsGbpnzvet', '2026-03-16 11:14:47', '2026-03-16 11:14:47'),
('fgZAe9zffHF', 'Zombe/Mwitika Ward', 'KE_Ward_359', 'd0Gu8FrRM0Y', 'd0Gu8FrRM0Y', 'fgZAe9zffHF', '2026-03-16 11:14:47', '2026-03-16 11:14:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminstrative_units`
--
ALTER TABLE `adminstrative_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bursary_applications`
--
ALTER TABLE `bursary_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `class_rooms`
--
ALTER TABLE `class_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `constituencies`
--
ALTER TABLE `constituencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coordinators`
--
ALTER TABLE `coordinators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depart_ment_workers`
--
ALTER TABLE `depart_ment_workers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `depart_ment_workers_email_unique` (`email`),
  ADD UNIQUE KEY `depart_ment_workers_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `depart_ment_workers_id_number_unique` (`id_number`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecde_schools`
--
ALTER TABLE `ecde_schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_histories`
--
ALTER TABLE `education_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ethnic_groups`
--
ALTER TABLE `ethnic_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_category_id_foreign` (`category_id`);

--
-- Indexes for table `feeder_schools`
--
ALTER TABLE `feeder_schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `galleries_slug_unique` (`slug`),
  ADD KEY `galleries_created_by_foreign` (`created_by`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_images_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `job_groups`
--
ALTER TABLE `job_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learners`
--
ALTER TABLE `learners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learner_attendances`
--
ALTER TABLE `learner_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learner_attendances_user_id_foreign` (`user_id`),
  ADD KEY `learner_attendances_learner_id_foreign` (`learner_id`);

--
-- Indexes for table `learner_parents`
--
ALTER TABLE `learner_parents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learner_parents_learner_id_foreign` (`learner_id`);

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
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `next_of_kin`
--
ALTER TABLE `next_of_kin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_attendance_days`
--
ALTER TABLE `non_attendance_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `n_g_a_o_units`
--
ALTER TABLE `n_g_a_o_units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `n_g_a_o_units_code_unique` (`code`),
  ADD UNIQUE KEY `n_g_a_o_units_org_id_unique` (`org_id`);

--
-- Indexes for table `other_v_t_c_staff`
--
ALTER TABLE `other_v_t_c_staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `other_v_t_c_staff_email_unique` (`email`),
  ADD UNIQUE KEY `other_v_t_c_staff_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `other_v_t_c_staff_id_number_unique` (`id_number`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD KEY `pages_created_by_foreign` (`created_by`);

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
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_author_id_foreign` (`author_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_applications`
--
ALTER TABLE `student_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_parents`
--
ALTER TABLE `student_parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_types`
--
ALTER TABLE `student_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_locations`
--
ALTER TABLE `sub_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_activity_logs`
--
ALTER TABLE `system_activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_m_s`
--
ALTER TABLE `s_m_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_deployment_histories`
--
ALTER TABLE `teacher_deployment_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_education`
--
ALTER TABLE `teacher_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_residentials`
--
ALTER TABLE `teacher_residentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_school_contacts`
--
ALTER TABLE `teacher_school_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_unions`
--
ALTER TABLE `teacher_unions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unions`
--
ALTER TABLE `unions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_documents`
--
ALTER TABLE `user_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_unions`
--
ALTER TABLE `user_unions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vct_students_photo`
--
ALTER TABLE `vct_students_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vtc_students_pivot`
--
ALTER TABLE `vtc_students_pivot`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vtc_students_pivot_student_id_unique` (`student_id`);

--
-- Indexes for table `v_t_c_courses`
--
ALTER TABLE `v_t_c_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_t_c_departments`
--
ALTER TABLE `v_t_c_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_t_c_s`
--
ALTER TABLE `v_t_c_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_t_c_teachers`
--
ALTER TABLE `v_t_c_teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `v_t_c_teachers_email_unique` (`email`),
  ADD UNIQUE KEY `v_t_c_teachers_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `v_t_c_teachers_id_number_unique` (`id_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminstrative_units`
--
ALTER TABLE `adminstrative_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bursary_applications`
--
ALTER TABLE `bursary_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_rooms`
--
ALTER TABLE `class_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `constituencies`
--
ALTER TABLE `constituencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coordinators`
--
ALTER TABLE `coordinators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `depart_ment_workers`
--
ALTER TABLE `depart_ment_workers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ecde_schools`
--
ALTER TABLE `ecde_schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `education_histories`
--
ALTER TABLE `education_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ethnic_groups`
--
ALTER TABLE `ethnic_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feeder_schools`
--
ALTER TABLE `feeder_schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_groups`
--
ALTER TABLE `job_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `learners`
--
ALTER TABLE `learners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `learner_attendances`
--
ALTER TABLE `learner_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `learner_parents`
--
ALTER TABLE `learner_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `next_of_kin`
--
ALTER TABLE `next_of_kin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `non_attendance_days`
--
ALTER TABLE `non_attendance_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `n_g_a_o_units`
--
ALTER TABLE `n_g_a_o_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_v_t_c_staff`
--
ALTER TABLE `other_v_t_c_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_applications`
--
ALTER TABLE `student_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_parents`
--
ALTER TABLE `student_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_types`
--
ALTER TABLE `student_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_locations`
--
ALTER TABLE `sub_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `system_activity_logs`
--
ALTER TABLE `system_activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1636;

--
-- AUTO_INCREMENT for table `s_m_s`
--
ALTER TABLE `s_m_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teacher_deployment_histories`
--
ALTER TABLE `teacher_deployment_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_education`
--
ALTER TABLE `teacher_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_residentials`
--
ALTER TABLE `teacher_residentials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_school_contacts`
--
ALTER TABLE `teacher_school_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_unions`
--
ALTER TABLE `teacher_unions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unions`
--
ALTER TABLE `unions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_documents`
--
ALTER TABLE `user_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_unions`
--
ALTER TABLE `user_unions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vct_students_photo`
--
ALTER TABLE `vct_students_photo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vtc_students_pivot`
--
ALTER TABLE `vtc_students_pivot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `v_t_c_courses`
--
ALTER TABLE `v_t_c_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `v_t_c_departments`
--
ALTER TABLE `v_t_c_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `v_t_c_s`
--
ALTER TABLE `v_t_c_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `v_t_c_teachers`
--
ALTER TABLE `v_t_c_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD CONSTRAINT `gallery_images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learner_attendances`
--
ALTER TABLE `learner_attendances`
  ADD CONSTRAINT `learner_attendances_learner_id_foreign` FOREIGN KEY (`learner_id`) REFERENCES `learners` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `learner_attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learner_parents`
--
ALTER TABLE `learner_parents`
  ADD CONSTRAINT `learner_parents_learner_id_foreign` FOREIGN KEY (`learner_id`) REFERENCES `learners` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

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
