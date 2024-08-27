-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2024 at 07:35 AM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `img_01` mediumblob NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `price`, `added_at`, `img_01`, `product_name`) VALUES
(52, 8, 11, 5, 800.00, '2024-08-24 04:54:51', 0x30, 'Toner (Skin Boosting Toner)');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `userMessage` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `first_name`, `userMessage`, `user_id`, `user_email`) VALUES
(15, 'allen', 'hoy di ako yon', 0, 'allen@gmail.com'),
(16, 'asd', 'hey', 12, 'admin@gmail.com'),
(17, 'asd', 'hey', 12, 'admin@gmail.com'),
(18, 'asd', 'hey', 12, 'admin@gmail.com'),
(19, 'hey', 'asdkaskdaksdkasd', 12, 'hey@gmail.com'),
(20, 'hoy', 'hoy', 12, 'hoy@gmail.com'),
(21, 'hoy', 'hoy', 12, 'hoy@gmail.com'),
(22, 'asd', 'laksdjlaksjdlkajskld', 12, 'asd@gmail.com'),
(23, 'hoy', 'laksjdlkasjdlkasd', 12, 'hoy@gmail.com'),
(24, 'hoy', 'laksjdlkasjdlkasd', 12, 'hoy@gmail.com'),
(25, 'hoy', 'laksjdlkasjdlkasd', 12, 'hoy@gmail.com'),
(26, 'hoy', 'laksjdlkasjdlkasd', 12, 'hoy@gmail.com'),
(27, 'hoy', 'laksjdlkasjdlkasd', 12, 'hoy@gmail.com'),
(28, 'hoy', 'askdjalsdjlka', 12, 'hoy@gmail.com'),
(29, 'hpoy', 'lkasjdlaksjdkl', 12, 'hoy@gmail.com'),
(30, 'hpoy', 'lkasjdlaksjdkl', 12, 'hoy@gmail.com'),
(31, 'hoy', 'laksdjlkasjdkl', 12, 'hoy@gmail.com'),
(32, 'hoy', 'alskdaklshdkj', 12, 'hoy@gmail.com'),
(33, 'allen', 'askldjalksdjklas', 12, 'allen@gmail.com'),
(34, 'allen', 'askldjalksdjklas', 12, 'allen@gmail.com'),
(35, 'hoy', 'ahhhhhhh', 12, 'ho@gmailc.im'),
(36, 'hoy', 'lkkllkklkl', 12, 'ho@gmailc.im'),
(37, 'allen', 'alkshdjklajsdlajskldasd', 12, 'allen@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `product_names` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `product_names`, `total_price`, `placed_on`, `payment_status`) VALUES
(18, 12, 'Patrick ALlen', '09949070858', 'patriccsio@gmaill.com', 'cash', 'Iran, Dasmarinas, 4114', 'Toner (Skin Boosting Toner)', 800, '2024-08-02', 'Completed'),
(19, 12, 'Patrick ALlen', '09949070858', 'patriccsio@gmaill.com', 'cash', 'Iran, Dasmarinas, 4114', 'Toner (Skin Boosting Toner), Serum (Plump Hydration), Mask (Hyalu-Cica Overnight Mask)', 5190, '2024-08-15', 'Completed'),
(20, 99, 'Kalbo', '09999', 'kalbo@gmail.com', ' Cash', 'Mabuhay', 'Toner, Sunscreen, Cleanser', 5000, '2024-08-25', 'Completed'),
(21, 100, 'Kalbow', '099992', 'kalbow@gmail.com', ' Cash', 'Mabuhay', 'Toner, Sunscreen, Cleanser, Moisturizer', 50000, '2024-08-25', 'Completed'),
(22, 12, 'Patrick ALlen', '09949070858', 'patriccsio@gmaill.com', 'cash', 'Iran, Dasmarinas, 4114', 'Hyalu Cica (Ceramide Biom)', 3000, '2024-08-25', 'Completed'),
(23, 15, 'sai', '02655641232', 'saisai@gmail.com', 'cash', 'agaaddafasfa, cavite, 151544', 'Toner (Non Irritating Toner)', 400, '2024-08-27', 'Pending'),
(24, 15, 'sai', '03265689898', 'saisai@gmail.com', 'cash', 'jBDJbjdhHDK, cavite, 5456454', 'Serum (Plump Hydration)', 9, '2024-08-27', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `img_03` mediumblob NOT NULL,
  `brand` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `description`, `img_01`, `img_02`, `img_03`, `brand`) VALUES
(8, 'Serum (Plump Hydration)', 9.00, 'Serum na blue', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303630355f3937382e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303630355f3837312e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303630355f3935352e6a7067, ''),
(9, 'Mask (Hyalu-Cica Overnight Mask)', 700.00, 'MaskMask', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f506963736172745f32342d30382d32305f31372d31332d35392d3630392e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137313330315f3933362e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137313330315f3237362e6a7067, ''),
(10, 'Cleanser (Poremizing Deep Cleansing Foam)', 800.00, 'eyy eyy', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134303831393630352e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134303832383930322e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134303836393332382e6a7067, ''),
(11, 'Toner (Skin Boosting Toner)', 800.00, 'Tonir', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132363834353736342e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132363835343335362e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132363839353432302e6a7067, ''),
(12, 'Toner (Non Irritating Toner)', 400.00, 'Recommended for People Who: \r\n-Have sensitive skin requiring in need of exfoliation and moisturization\r\n-experience of makeup lumps due to rough skin\r\n-are suffering from the dark and dull skin tone ', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f74312e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f74322e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f74332e6a7067, ''),
(15, 'Hallo', 1000.00, 'Jalo', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137313330315f3933362e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f506963736172745f32342d30382d32305f31372d31332d35392d3630392e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f506963736172745f32342d30382d32305f31372d31332d33342d3335302e6a7067, ''),
(16, 'Hyalu Cica (Blue Serum)', 500.00, '2nd hya', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303630355f3937382e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303630365f3530302e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303630355f3935352e6a7067, ''),
(17, 'Hyalu Cica (Ceramide Biom)', 1000.00, 'Daymnnn', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303335335f3531392e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303335335f38352e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303335335f3634352e6a7067, ''),
(18, 'Hyalu Cica (Step-O) Ampoule', 999.00, 'Maganda rin to tanga', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303732385f3432302e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f506963736172745f32342d30382d32305f31372d30372d35342d3134312e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303732385f3730342e6a7067, ''),
(19, 'Hyalu Cica (Moisture Cream)', 999.00, 'lorem tiktuk', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f506963736172745f32342d30382d32305f31372d31312d32302d3536382e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137313033355f3237322e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137313033355f3433322e6a7067, ''),
(20, 'Hyalu Cica (Lightweight Samsung Stick)', 899.00, 'lorem toktik', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f506963736172745f32342d30382d32305f31372d31382d31392d3130312e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f506963736172745f32342d30382d32305f31372d31372d34332d3031362e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303130305f3433332e6a7067, ''),
(21, 'Centella Airfit Suncream Plus', 1000.00, 'heyhey', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f6166322e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f6166322e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f6166352e6a7067, ''),
(22, 'Brightening Line (Skin Boosting Toner)', 1000.00, 'heyhey', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132363834353736342e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132363835343335362e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132363839353432302e6a7067, ''),
(23, 'Teatrica (BHA Foam)', 1000.00, 'heyhey', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134313533303630362e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134313534303238372e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134313538363039372e6a7067, ''),
(24, 'PoreMizing (Clear Toner)', 1000.00, 'heyhey', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134303534303031382e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134303534353431322e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134303537373837372e6a7067, ''),
(25, 'ProbioCica (Bachiol Ice Cream)', 1000.00, 'heyhey', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132383438333433352e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132383438393430322e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132383439353734352e6a7067, ''),
(26, 'Sunscreen (Daily Soothing Sunscreen)', 1000.00, 'eyyyy', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333831313034373537322e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333831313036323233352e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333831313132333932342e6a7067, '');

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
  `gender` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password_hash`, `email`, `first_name`, `last_name`, `gender`, `address`, `phone_number`, `created_at`, `updated_at`, `profile_picture`) VALUES
(12, 'asd', '$2y$10$K13rw3mSYBMRysh0g3UAdOCi0iucfUmf7LnaMgZH91l7pcXscfBHe', 'patriccsio@gmail.com', 'Patrick', 'Casili', '', 'san marino', '09949079858', '2024-08-24 12:00:18', '2024-08-24 12:00:18', NULL),
(13, 'allen', '$2y$10$W3ivcssSlR41sPYUg9reJuB7i53nevqmZ0Uhxwn9rEuGgdU6AIzjW', 'allen@gmail.com', 'allen', 'heyhey', '', 'san marino', '09218091823', '2024-08-24 12:00:49', '2024-08-24 12:00:49', NULL),
(14, 'aaron', '$2y$10$Ekh2ErtilSNxOs8Wx/mRC.SBrTb1yjXBCldvJC426un.Lno2pKkTG', 'derayaaron5@gmail.com', 'aaron', 'de raya', '', 'Location 3', '09553568279', '2024-08-26 05:08:56', '2024-08-26 05:08:56', 'uploads/profile_pictures/66cc155f081f9-FB_IMG_1703823661403.jpg'),
(15, 'sai', '$2y$10$fPpr7xYgJ1GBL2s8yx88nu4BO2YaqYCJMi.1kWnV8Z2eaegR7RPLG', 'saisai@gmail.com', 'sairon', 'Manalad', '', 'Cavite', '03695566565', '2024-08-27 04:27:44', '2024-08-27 04:27:44', NULL),
(16, 'kevin', '$2y$10$n7/DiLzAVyz.kq1Nhy1Hj.jZ4I0R5wmE78d9oUaanqZEtpn2nmp5y', 'kevin@gmail.com', 'kevin', 'Male', '', 'Nueva Vizcaya', '09546565652', '2024-08-27 04:48:19', '2024-08-27 04:48:19', NULL),
(17, 'kevin', '$2y$10$6kvhif10uSY12CzFp3FHdOjpNeg57QFKeDz63N57r3tuzy/zRjQO.', 'kevin@gmail.com', 'kevin', 'Male', '', 'Nueva Vizcaya', '09546565652', '2024-08-27 04:48:37', '2024-08-27 04:48:37', NULL),
(18, 'pat', '$2y$10$pQ/leBpuF1AcA5PTE9M.XOgFXDcQxwXK087DCWekKSypeFQwFEpzW', 'pat@gmail.com', 'patrick', 'Male', '', 'Cavite', '09656565655', '2024-08-27 04:51:54', '2024-08-27 04:51:54', NULL),
(19, 'pat', '$2y$10$3KWH/neXbmZSeuQIBQuQbOOfHNy2eGW6WzkQwpHFyNVmbrRgPHuRi', 'pat@gmail.com', 'patrick', 'Meredor', 'Male', 'Cavite', '09656565655', '2024-08-27 04:53:05', '2024-08-27 04:53:05', NULL),
(20, 'kyle', '$2y$10$c0RM/CWfdSpokaA9bLv5QexIVr6gTdS6flLaqaJpBXNpCkGfaUkWG', 'kyle@gmail.com', 'Kyle', 'Garcia', 'Male', 'Isabela', '03995231231', '2024-08-27 04:54:34', '2024-08-27 04:54:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
