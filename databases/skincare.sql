-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 01:19 PM
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
-- Database: `skincare`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Moisturizer'),
(2, 'Toner'),
(3, 'Serum'),
(4, 'Sunscreen'),
(5, 'Cleanser');

-- --------------------------------------------------------

--
-- Table structure for table `produx`
--

CREATE TABLE `produx` (
  `id` int(11) NOT NULL,
  `product_name` varchar(55) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `img_01` mediumblob NOT NULL,
  `img_02` mediumblob NOT NULL,
  `img_03` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produx`
--

INSERT INTO `produx` (`id`, `product_name`, `price`, `description`, `img_01`, `img_02`, `img_03`) VALUES
(8, 'Centella Airfit Sunscreen', 499.00, '-Lightweight with Matte Finish\r\n-Minimized Whitecasts & Natural Skin Tone Correction', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f43656e74656c6c61722e706e67, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f43656e74656c6c61322e706e67, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f43656e74656c6c61332e706e67),
(9, 'Centella Ampoule Foam', 300.00, 'Ampolh', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333830373333343538302e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333830373234333330352e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333830373237383237352e6a7067),
(10, 'Gentle Calming Pad', 400.00, 'Gentol', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333831313337323032392e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333831313835313130352e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333831313837383139302e6a7067);

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
  `phone_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password_hash`, `email`, `first_name`, `last_name`, `address`, `phone_number`, `created_at`, `updated_at`, `role`) VALUES
(4, 'alli', '$2y$10$jCKCnKHNhFb1hFGLpzHE9OQ3pkp6Zvo6sLYIDOJWWeMKkSB/A0xqC', 'ali@gmail.com', 'ali', 'alen', 'san marino', '5222', '2024-08-16 10:56:31', '2024-08-18 00:20:23', ''),
(6, 'admin', '$2y$10$bBqT3zbHQCqfTzFwiN/U5u2gX34ffSKpVMXbqYwc5TZ42G8xVXqOi', 'admin@gmail.com', 'Admin', 'Omsim', 'cvsu', '911', '2024-08-18 11:17:16', '2024-08-18 11:18:24', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produx`
--
ALTER TABLE `produx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produx`
--
ALTER TABLE `produx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
