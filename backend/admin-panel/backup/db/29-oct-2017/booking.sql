-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2017 at 12:26 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `back_user`
--

CREATE TABLE `back_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `level` int(1) NOT NULL DEFAULT '0' COMMENT '0 = manager, 1 = admin, 2 = super admin',
  `status` int(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `admin` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `back_user`
--

INSERT INTO `back_user` (`id`, `name`, `email`, `password`, `level`, `status`, `remember_token`, `admin`, `created_at`, `updated_at`) VALUES
(1, 'xxxxxxxxx', 'xxxxxxxxxxx@test.com', '1adfab11620b847de5e6840ae6a1d05d1864d54f', 0, 1, NULL, 3, NULL, NULL),
(2, 'abcd1', 'abcd1@tets.com', '532ac183c3d012829ff1e98e9a72bca5969cac4b', 1, 1, NULL, 3, NULL, NULL),
(3, 'admin', 'admin@test.com', 'e8e16eacfaed95e9b1ad50405e6819d2a6c33870', 2, 1, '5wyMDBUXdD7uPv0YDQWsvl5fUJRXkR7AqkKwKUjq', 3, NULL, NULL),
(4, 'test4', 'test4@test.com', '9d4511880145de0c16247bd1eab86b4277a1ce27', 1, 1, NULL, 3, NULL, NULL),
(5, 'testtttt', 'testtttt@gmail.com', '5144574458603e4dae4d802661f58a19d8433500', 1, 1, NULL, 3, NULL, NULL),
(6, 'testadmin', 'testadmin@gmail.com', '897ed9450022fb1bbd682f8ef8e7c9429355c3f6', 2, 1, NULL, 3, NULL, NULL),
(7, 'tut', 'tut@gmail.com', '73cc9321a395ecf96900d701352d8ab7639b9602', 2, 1, NULL, 3, NULL, NULL);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `back_user`
--
ALTER TABLE `back_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `back_user`
--
ALTER TABLE `back_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
