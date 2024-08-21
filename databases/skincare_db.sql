-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2024 at 06:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skincare_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password_hash`) VALUES
(1, 'admin', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(55) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `img_01` mediumblob NOT NULL,
  `img_02` mediumblob NOT NULL,
  `img_03` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `description`, `img_01`, `img_02`, `img_03`) VALUES
(1, 'Gentle Calming Pad', 400.00, 'Maganda', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333831313337323032392e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333831313835313130352e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333831313837383139302e6a7067),
(2, 'Gentle Calming Pad', 400.00, 'Maganda', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333831313337323032392e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333831313835313130352e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333831313837383139302e6a7067),
(4, 'Toner (Loreal)', 135.00, 'Eyy', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f746f6e6572312e706e67, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f67616c6c6572792d30362e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f6974656d2d636172742d30312e6a7067),
(6, 'Sunscreen (Centella)', 200.00, 'Maganda to bobo', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f53756e73637265656e2d312e77656270, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f53756e73637265656e2d322e77656270, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f53756e73637265656e2d332e77656270);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password_hash`, `email`, `first_name`, `last_name`, `address`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'asd', '$2y$10$FHvbb43d9gifK/kssvzMK.tL/f0Ayq1LycxvYy.Zm0eu8/SbvoOBi', 'asd@gmail.com', 'patrick', 'allen', 'san marino', '09949079858', '2024-08-19 03:10:14', '2024-08-19 03:10:14'),
(2, 'asd', '$2y$10$jjDOw7Nf0EcEiH03/63yuejxAbmtm4c42vf5MA7Tv3uHl5CqCH5le', 'asd@gmail.com', 'patrick', 'allen', 'san marino', '09949079858', '2024-08-20 06:45:51', '2024-08-20 06:45:51'),
(3, 'alli', '$2y$10$OGbaCcTMYqNFducaLssBjO3PXOm5TTlFMBRXBIRsCdjnIgjxEO7a6', 'alli@gmail.com', 'alli', 'allen', 'san marino', '0921', '2024-08-20 12:05:36', '2024-08-20 12:05:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
