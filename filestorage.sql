-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 06:03 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filestorage`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Myself', 'admin@myself.com', '$2a$12$g/jsO9THRZZ11hbHh.V9iu7y6Syz07KQa2xVpe0E0Lkt.gRHANtoi', '2022-05-18 06:45:07', '2022-05-18 06:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `folder_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `folder_id`, `name`, `slug`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 'restroms', 'restroms', 'jpg', '2022-05-01 12:01:56', '2022-05-01 12:02:00', NULL),
(2, 1, 2, 'Alaka Cake', 'alaka-cake', 'jpg', '2022-05-02 18:15:00', '2022-05-03 12:02:23', NULL),
(3, 1, 2, 'BalanceSheet', 'balancesheet', 'xlsx', '2022-05-04 18:15:00', '2022-05-05 12:02:34', NULL),
(4, 1, 2, 'File Storage Project Proposal', 'file-storage-project-proposal', 'pdf', '2022-05-07 12:02:38', '2022-05-07 12:02:41', NULL),
(5, 1, 2, 'File Storage Presentation', 'file-storage-presentation', 'pptx', '2022-05-09 12:02:44', '2022-05-09 12:02:51', NULL),
(7, 2, 4, 'daddys-logo', 'daddys-logo', 'png', '2022-05-18 08:13:41', '2022-05-18 08:13:41', NULL),
(9, 2, 5, 'default', 'default', 'png', '2022-05-18 10:47:48', '2022-05-18 10:47:48', '2022-05-18 16:01:38'),
(10, 2, 4, 'restroms', 'restroms', 'jpg', '2022-05-18 10:48:40', '2022-05-18 10:48:40', NULL),
(11, 1, 3, 'support-app', 'support-app', 'apk', '2022-05-19 13:06:53', '2022-05-19 13:06:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `user_id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Rahul Thapa', 'rahul-thapa', '2022-04-30 19:36:07', '2022-04-30 19:36:16', NULL),
(2, 1, 'Rahul Thapa Magar', 'rahul-thapa-magar', '2022-05-09 19:36:20', '2022-05-09 19:36:25', NULL),
(3, 1, 'BCA', 'bca', '2022-05-17 19:33:55', '2022-05-17 19:33:55', NULL),
(4, 2, 'Restro MS', 'restro-ms', '2022-05-18 08:12:00', '2022-05-18 08:12:00', NULL),
(5, 2, 'Software Files', 'software-files', '2022-05-18 09:46:20', '2022-05-18 09:46:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `storage_size` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `duration` varchar(45) NOT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `storage_size`, `price`, `duration`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Free', '10240', '0', 'Lifetime', 1, '2022-05-19 06:45:56', '2022-05-19 06:45:56'),
(2, 'Basic', '512000', '500', 'Semiannual', 1, '2022-05-19 06:46:18', '2022-05-19 06:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `package_id` int(11) NOT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `package_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-05-19 06:26:47', '2022-05-19 06:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `otp` int(6) NOT NULL,
  `hash` varchar(191) NOT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `otp`, `hash`, `is_verified`, `created_at`, `updated_at`) VALUES
(1, 'Rahul', 'Thapa', 'rahulthapa043@gmail.com', '$2y$10$zT.d0bVzJ3.6y/97sTSAI.i6nH010jfhXjIv9BTYOFUZkknyMA3..', 224107, '1e6e6b7c00ebd7b32a6e84c2eadebfb4', 1, NULL, NULL),
(2, 'NCT Soft', 'Pvt. Ltd.', 'nctpvtltdbutwal@gmail.com', '$2y$10$6S.JUYHOACfJc2zTMDi2UuvB8NzEie5j0g0FHCds4pcdOAOuq1c5m', 632614, '8006d7d54b3f7bbbd2ff37f0e8fdb190', 1, NULL, NULL),
(3, 'Manoj', 'Pokhrel', 'official.iammp@gmail.com', '$2y$10$fNXodEKy66kXlY8Or6ZXfuMwSsUu.7HqEFIKcEOxTC2ZhdTTxn.aO', 234803, '874063a513f432627014a76086be8b17', 0, NULL, NULL),
(4, 'Krishna', 'Chapagain', 'krishnachapu021@gmail.com', '$2y$10$PuDbYh0Q0QdVZdtUKNEZQ.K4RLEQXfV84IKVZfgqhpUj6FulBiUaW', 933084, 'ee19fcf7f2b70691d1ea45f5530b620a', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
