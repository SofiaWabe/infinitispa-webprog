-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2018 at 04:25 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infinityspa-webprog`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `contactnumber` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(10) NOT NULL,
  `discountname` varchar(255) NOT NULL,
  `discountrate` int(2) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `discountname`, `discountrate`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Student', 20, 1, '2018-10-25 16:58:52', '2018-10-25 16:58:52'),
(2, 'PWD', 20, 1, '2018-10-25 09:08:47', '2018-10-25 09:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(10) UNSIGNED NOT NULL,
  `island_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `island_id`, `name`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Philippine Heart Center', 'East Ave., Quezon City', '2018-06-04 05:41:37', '2018-06-04 05:41:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `island`
--

CREATE TABLE `island` (
  `id` int(10) UNSIGNED NOT NULL,
  `island_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `island`
--

INSERT INTO `island` (`id`, `island_code`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'LUZ', 'Luzon', '2018-06-03 05:57:16', '2018-06-03 05:57:16', NULL),
(2, 'VIZ', 'Visayas', '2018-06-03 05:57:26', '2018-06-03 05:57:26', NULL),
(3, 'MIN', 'Mindanao', '2018-06-03 05:57:36', '2018-06-03 05:57:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location_rate`
--

CREATE TABLE `location_rate` (
  `id` int(11) NOT NULL,
  `service_id` int(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `locationrate` decimal(5,2) NOT NULL,
  `isActive` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_rate`
--

INSERT INTO `location_rate` (`id`, `service_id`, `city`, `barangay`, `locationrate`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pasig', 'Rosario', '500.00', 1, '2018-10-26 15:00:17', '2018-10-26 15:00:17'),
(2, 1, 'Pasig', 'Maybunga', '500.00', 1, '2018-10-26 15:00:17', '2018-10-26 15:00:17'),
(3, 2, 'Quezon City', '2', '550.00', 1, '2018-10-26 07:42:10', '2018-10-26 07:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `lastname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_add` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `island_id` int(10) UNSIGNED NOT NULL,
  `contact_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(4) NOT NULL,
  `val` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `lastname`, `firstname`, `middlename`, `email_add`, `hospital_id`, `island_id`, `contact_number`, `designation`, `year`, `val`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Escueta', 'Niño', 'Dela Cruz', 'ndescueta@gmail.com', 1, 1, '09989991700', 'Doctor', 2016, 2, '2018-06-04 05:42:45', '2018-06-04 05:42:45', NULL),
(2, 'Almario', 'Guesshee', 'Orteza', 'gueshee@gmail.com', 1, 1, '09284442122', 'Doctor', 2018, 1, '2018-06-04 05:44:20', '2018-06-04 05:44:20', NULL),
(3, 'De Asis', 'Harold', 'Lemuel', 'harold@gmail.com', 1, 1, '09244248844', 'Professor', 2016, 2, '2018-06-04 05:57:47', '2018-06-04 05:58:01', NULL),
(5, 'Wabe', 'Sofia', 'Aguirre', 'sofia18.sw@gmail.com', 1, 1, '09155810953', 'Doctor', 2018, 1, '2018-10-25 01:01:20', '2018-10-25 01:01:20', NULL),
(6, 'Palatino', 'John Ray', 'Ramos', 'johnray@gmail.com', 1, 1, '09999999999', 'Doctor', 2018, 2, '2018-10-25 01:07:53', '2018-10-25 01:07:53', NULL),
(7, 'Trilles', 'Jaira', 'Cabacang', 'jaira@gmail.com', 1, 1, '09111111111', 'Doctor', 2017, 2, '2018-10-25 01:08:24', '2018-10-25 01:08:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2017_02_18_003431_create_department_table', 1),
(3, '2017_02_18_004142_create_division_table', 1),
(4, '2017_02_18_004326_create_country_table', 1),
(5, '2017_02_18_005005_create_state_table', 1),
(6, '2017_02_18_005241_create_city_table', 1),
(7, '2017_03_17_163141_create_employees_table', 1),
(8, '2017_03_18_001905_create_employee_salary_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `onsites`
--

CREATE TABLE `onsites` (
  `id` int(10) UNSIGNED NOT NULL,
  `lastname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_add` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `island_id` int(10) UNSIGNED NOT NULL,
  `contact_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preregs`
--

CREATE TABLE `preregs` (
  `id` int(10) UNSIGNED NOT NULL,
  `lastname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_add` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `island_id` int(10) UNSIGNED NOT NULL,
  `contact_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` int(2) UNSIGNED NOT NULL,
  `comment` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `preregs`
--

INSERT INTO `preregs` (`id`, `lastname`, `firstname`, `middlename`, `email_add`, `hospital_id`, `island_id`, `contact_number`, `designation`, `status_id`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Escueta', 'Niño', 'Dela Cruz', 'ndescueta@gmail.com', 1, 1, '09989991700', 'Doctor', 2, 'Pre-Registered', '2018-06-04 19:04:43', '2018-06-04 20:38:47', NULL),
(2, 'Balingit', 'Anna', 'Gabriella', 'anna@gmail.com', 1, 1, '09422551122', 'Nurse', 1, 'Company', '2018-06-04 20:39:30', '2018-06-04 20:39:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(10) NOT NULL,
  `room` varchar(255) NOT NULL,
  `capacity` int(3) NOT NULL,
  `noofrooms` int(3) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room`, `capacity`, `noofrooms`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Massage Room', 2, 0, 1, '2018-10-25 15:55:47', '2018-10-25 15:55:47'),
(2, 'Theraphy Room', 2, 4, 1, '2018-10-25 08:07:48', '2018-10-25 08:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(10) NOT NULL,
  `servicetype_id` int(10) NOT NULL,
  `servicename` varchar(255) NOT NULL,
  `serviceprice` decimal(5,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `servicetype_id`, `servicename`, `serviceprice`, `description`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 1, 'Thai Massage', '249.00', '', 1, '2018-10-25 15:24:34', '2018-10-25 15:24:34'),
(2, 2, 'Thai Massage', '499.00', NULL, 1, '2018-10-25 07:39:52', '2018-10-25 07:39:52'),
(3, 1, 'Signiture Infiniti Massage', '299.00', NULL, 1, '2018-10-26 17:59:55', '2018-10-26 17:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `id` int(10) NOT NULL,
  `servicecategoryname` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`id`, `servicecategoryname`, `description`, `isActive`, `created_at`, `updated_at`) VALUES
(3, 'Body Massage', NULL, 1, '2018-10-25 06:12:45', '2018-10-25 06:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `id` int(10) NOT NULL,
  `servicecategory_id` int(10) NOT NULL,
  `servicetypename` varchar(255) NOT NULL,
  `duration` int(3) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`id`, `servicecategory_id`, `servicetypename`, `duration`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 3, '60 Minute Massage', 60, 1, '2018-10-25 14:48:51', '2018-10-27 01:45:48'),
(2, 3, '90 Minute Massage', 90, 1, '2018-10-25 07:08:04', '2018-10-27 01:45:51'),
(3, 3, '120 Minutes', 120, 1, '2018-10-26 17:45:11', '2018-10-26 17:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(2) UNSIGNED NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Member', '2018-06-01 02:58:12', '2018-06-01 02:58:12', NULL),
(2, 'Non-Member', '2018-06-01 02:58:20', '2018-06-01 02:58:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `therapist`
--

CREATE TABLE `therapist` (
  `id` int(10) NOT NULL,
  `therapistposition_id` int(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contactnumber` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `therapist`
--

INSERT INTO `therapist` (`id`, `therapistposition_id`, `fullname`, `address`, `contactnumber`, `email`, `image`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 1, 'Vheliza Wabe', 'QC', '09155810953', 'sofia@mail.com', NULL, 1, '2018-10-25 16:34:19', '2018-10-25 16:34:19'),
(2, 2, 'Guesh Almario', NULL, '09999999999', NULL, NULL, 1, '2018-10-25 08:45:55', '2018-10-25 08:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `therapist_position`
--

CREATE TABLE `therapist_position` (
  `id` int(10) NOT NULL,
  `therapistposition` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `therapist_position`
--

INSERT INTO `therapist_position` (`id`, `therapistposition`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Junior Massager', 1, '2018-10-25 16:22:01', '2018-10-25 16:22:01'),
(2, 'Senior Massager', 1, '2018-10-25 08:27:09', '2018-10-25 08:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `lastname`, `firstname`, `usertype`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11, 'SofiaVheliza', 'sofia18.sw@gmail.com', '$2y$10$e/WT2qcmm6KLQ0deL8oEcOPjYqbiQKBE2cp86kHZ/p8heACyjeETK', 'Wabe', 'Sofia', 'Admin', NULL, NULL, '2018-10-25 04:28:32', '2018-10-25 04:28:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_island_id_foreign` (`island_id`);

--
-- Indexes for table `island`
--
ALTER TABLE `island`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_rate`
--
ALTER TABLE `location_rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_LocationRate_Service` (`service_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_number_UNIQUE` (`contact_number`),
  ADD UNIQUE KEY `email_add_UNIQUE` (`email_add`),
  ADD KEY `members_hospital_id_foreign` (`hospital_id`),
  ADD KEY `members_island_id_foreign` (`island_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onsites`
--
ALTER TABLE `onsites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_number_UNIQUE` (`contact_number`),
  ADD UNIQUE KEY `email_add_UNIQUE` (`email_add`),
  ADD KEY `prereg_hospital_id_foreign` (`hospital_id`),
  ADD KEY `prereg_island_id_foreign` (`island_id`);

--
-- Indexes for table `preregs`
--
ALTER TABLE `preregs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_number_UNIQUE` (`contact_number`),
  ADD UNIQUE KEY `email_add_UNIQUE` (`email_add`),
  ADD KEY `prereg_hospital_id_foreign` (`hospital_id`),
  ADD KEY `prereg_island_id_foreign` (`island_id`),
  ADD KEY `prereg_status_id_foreign` (`status_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Service_ServiceType` (`servicetype_id`) USING BTREE;

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ServiceType_ServiceCategory` (`servicecategory_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `therapist`
--
ALTER TABLE `therapist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Theraphist_TherapistPosition` (`therapistposition_id`) USING BTREE;

--
-- Indexes for table `therapist_position`
--
ALTER TABLE `therapist_position`
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
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `island`
--
ALTER TABLE `island`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location_rate`
--
ALTER TABLE `location_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `onsites`
--
ALTER TABLE `onsites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preregs`
--
ALTER TABLE `preregs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `therapist`
--
ALTER TABLE `therapist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `therapist_position`
--
ALTER TABLE `therapist_position`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `location_rate`
--
ALTER TABLE `location_rate`
  ADD CONSTRAINT `FK_LocationRate_Service` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK_Service_ServiceType` FOREIGN KEY (`servicetype_id`) REFERENCES `service_type` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `service_type`
--
ALTER TABLE `service_type`
  ADD CONSTRAINT `FK_ServiceType_ServiceCategory` FOREIGN KEY (`servicecategory_id`) REFERENCES `service_category` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `therapist`
--
ALTER TABLE `therapist`
  ADD CONSTRAINT `FK_Theraphist_TherapistPosition` FOREIGN KEY (`therapistposition_id`) REFERENCES `therapist_position` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
