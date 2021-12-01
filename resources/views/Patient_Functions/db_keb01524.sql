-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 10:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kentcoders`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(250) NOT NULL,
  `user_email` varchar(250) DEFAULT NULL,
  `service` varchar(250) DEFAULT NULL,
  `start_time` time(6) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT 'pending',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_email`, `service`, `start_time`, `date`, `status`, `created_at`, `updated_at`, `description`) VALUES
(1, 'radira@gmail.com', 'Cardiologist', '16:00:00.000000', '2021-04-21', 'approved', '2021-04-19', '2021-04-19', 'Breathing problems'),
(3, 'ciao@gmail.com', 'Dentist', '00:00:00.000000', '2021-12-09', 'pending', '2021-11-29', '2021-11-29', 'Tooth Ache and swollen gums!'),
(4, 'ciao@gmail.com', 'Dentist', '11:11:00.000000', '2021-12-07', 'pending', '2021-11-29', '2021-11-29', 'Tooth Ache and swollen gums!');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `description` varchar(5000) NOT NULL,
  `service` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `email`, `amount`, `description`, `service`, `created_at`, `updated_at`) VALUES
(1, 'ciao@gmail.com', '450.00', 'Tooth Ache and swollen gums', 'Dentist', '2021-11-29 19:06:46', '2021-11-29 21:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tambona975@gmail.com', '$2y$10$q8kWCF.9wBY.68zhUn.HB.6aqEkVXrkmVrVzM2YYp34nV5XVZQk3W', '2019-12-17 09:51:50'),
('tumi@botsogo.co.bw', '$2y$10$/fTZRe5iEHKDuLpk38afHOG3rwahhZRdorErV6N7qDqXtbWewiYuy', '2020-03-01 22:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `file` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `status` varchar(300) NOT NULL,
  `reported_by` varchar(200) NOT NULL DEFAULT 'pending',
  `confirmation` varchar(200) NOT NULL DEFAULT 'pending',
  `class` varchar(200) NOT NULL,
  `full_names` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_email`, `message`, `file`, `location`, `gender`, `status`, `reported_by`, `confirmation`, `class`, `full_names`, `created_at`, `updated_at`) VALUES
(1, 'obvious@gmail.com', 'I got called for contact tracing today', '20210411220717.pdf', 'Tlokweng', 'male', 'positive', 'tshepokambela@gmail.com', 'valid', '4G', 'Patience Kabo', '2021-04-16 18:34:34', '2021-04-11 18:46:21'),
(3, 'precious@gmail.com', 'I got caught with the virus', '20210411220717.pdf', 'Tlokweng', 'female', 'positive', 'tshepokambela@gmail.com', 'valid', '4G', 'Precious Phhuti', '2021-04-16 16:50:46', '2021-04-11 18:46:21'),
(4, 'neo@gmail.com', 'I have covid', '20210411220717.pdf', 'Tlokweng', 'female', 'positive', 'tshepokambela@gmail.com', 'valid', '4G', 'Precious Phhuti', '2021-04-21 20:17:27', '2021-04-11 18:46:21'),
(5, 'thabo@gmail.com', 'I have covid', '20210411220717.pdf', 'Tlokweng', 'male', 'positive', 'tshepokambela@gmail.com', 'valid', '4G', 'Dimpho Ditiro', '2021-04-16 16:50:46', '2021-04-11 18:46:21'),
(6, 'isaac@gmail.com', 'I have recovered', '20210411220717.pdf', 'Mogoditshane', 'female', 'negative', 'tshepokambela@gmail.com', 'valid', '4G', 'Tracy Issac', '2021-04-16 16:50:46', '2021-04-11 18:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `site` varchar(200) NOT NULL DEFAULT 'empty',
  `file` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_role` varchar(200) NOT NULL DEFAULT 'customer',
  `gender` varchar(30) DEFAULT NULL,
  `provider` varchar(200) DEFAULT NULL,
  `google_id` varchar(200) DEFAULT NULL,
  `avatar` varchar(600) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_role`, `gender`, `provider`, `google_id`, `avatar`, `phone`) VALUES
(1, 'admin@kentcoder.co.uk', 'ADMIN', '2021-11-20 23:52:24', '$2y$10$WeZIipjqwzD0f2RDrluuk.bQkj/qCxXted2GETxN3G1aftQWwP8ZG', 'r96ZlT0dYbOtNqhBAHrFaZ0XVXUxXE80fBXWAFwgY1Hc9LgptoBrBpIMNvVB', '0000-00-00 00:00:00', NULL, 'admin', 'N/A', NULL, NULL, 'https://www.freepngimg.com/thumb/google/66726-customer-account-google-service-button-search-logo.png', NULL),
(119, 'ciao@gmail.com', 'Bellah Ciao', '2021-11-29 19:43:36', '$2y$10$ze.vjp9QaDPFdx8WGw.HLOVx7tJswNt7wqzwiF.PGA1nS.JHe3sAe', NULL, '2021-11-29 17:43:36', '2021-11-29 17:43:36', 'patient', 'female', NULL, NULL, NULL, '75432223'),
(82, 'dan@gmail.com', 'Cynthia Daniel', '2021-11-21 00:28:43', '$2y$10$qpf0wg98Zx1AiGXPvcpRD.q9HZDTCFpwDHSzIdyNgJyCRpcWNV6nS', NULL, '2020-08-19 20:55:54', '2020-08-19 20:55:54', 'seller', 'female', NULL, NULL, 'https://www.freepngimg.com/thumb/google/66726-customer-account-google-service-button-search-logo.png', NULL),
(113, 'gmotlalepuo@gmail.com', 'Garenosi Motlalepuo', '2021-11-20 23:53:23', '$2y$10$nfm4jFmL7Q945zJKADB9VOK4KB1R6mGAVXGfqSFs.A7yp2k3hQHhC', NULL, '2021-06-08 08:35:21', '2021-06-08 08:35:21', 'buyer', 'male', NULL, NULL, 'https://www.freepngimg.com/thumb/google/66726-customer-account-google-service-button-search-logo.png', NULL),
(26, 'guest@thutoboswa.co.bw', 'Guest User', '2021-11-18 15:19:15', '$2y$10$qpf0wg98Zx1AiGXPvcpRD.q9HZDTCFpwDHSzIdyNgJyCRpcWNV6nS', 'NrxeFreSBA94O0HF9ghv60Rlu2A9aV22f6gntRBs2oE10IaFdiIA0prq22kg', '2019-12-16 18:15:52', '2019-12-16 23:48:40', 'guest', 'N/A', NULL, '114407880751696240674', 'https://lh3.googleusercontent.com/a-/AAuE7mDzMt2achDv1sICf3BWh0xo8BwW6TOsy2I3b-tFMQ', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`,`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
