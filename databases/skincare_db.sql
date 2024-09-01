-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 01:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

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
(52, 8, 11, 5, 800.00, '2024-08-24 04:54:51', 0x30, 'Toner (Skin Boosting Toner)'),
(113, 16, 8, 12, 9.00, '2024-08-31 10:09:08', 0x30, 'Serum (Plump Hydration)'),
(114, 16, 10, 1, 800.00, '2024-08-31 10:09:18', 0x30, 'Cleanser (Poremizing Deep Cleansing Foam)');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `pid`, `name`, `comment`, `created_at`, `user_id`) VALUES
(4, 9, '', 'ambaho ng amuy parang massim siya\r\n', '2024-08-31 10:27:36', 16),
(5, 9, '', 'Olol wag mo binabash product namen', '2024-08-31 10:28:54', 18),
(7, 10, '', 'Ang ganda nitoh', '2024-08-31 11:05:09', 18),
(8, 12, '', 'asdasd', '2024-08-31 11:05:52', 18),
(9, 9, '', '123123123', '2024-08-31 11:06:07', 18),
(10, 9, '', 'ang galeng', '2024-08-31 11:07:26', 18),
(11, 9, '', 'ang galeng', '2024-08-31 11:07:35', 18),
(12, 9, '', 'hahaha', '2024-08-31 11:07:41', 18),
(13, 9, '', 'asdasd', '2024-08-31 11:11:41', 18);

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
(27, 17, 'Patrick Allen L. Cas', '09949079858', 'patriccsio@gmail.com', 'cash', 'Iran, Dasmarinas, 4114', 'Toner (Non Irritating Toner)', 400, '2024-08-30', 'Completed'),
(28, 16, 'Patrick Allen L. Cas', '09949079858', 'patriccsio@gmail.com', 'credit', 'Blk 25 lot 30 iran st. San Marino City subd., Brgy. Salawag, Cavite, 4114', 'Sunscreen (Daily Soothing Sunscreen)', 1000, '2024-08-29', 'Completed'),
(29, 16, 'Patrick Allen L. Cas', '09949079858', 'patriccsio@gmail.com', 'cash', 'Blk 25 lot 30 iran st. San Marino City subd., Brgy. Salawag, Cavite, 4114', 'Cleanser (Poremizing Deep Cleansing Foam)', 800, '2024-08-29', 'Completed'),
(31, 16, 'Patrick Allen L. Cas', '09949079858', 'patriccsio@gmail.com', 'cash', 'Blk 25 lot 30 iran st. San Marino City subd., Brgy. Salawag, Cavite, 4114', 'Serum (Plump Hydration), Mask (Hyalu-Cica Overnight Mask), Toner (Skin Boosting Toner)', 2272, '2024-08-30', 'Completed'),
(32, 16, 'Patrick Allen L. Cas', '09949079858', 'patriccsio@gmail.com', 'cash', 'Blk 25 lot 30 iran st. San Marino City subd., Brgy. Salawag, Cavite, 4114', 'Serum (Plump Hydration)', 9, '2024-08-30', 'Completed'),
(33, 16, 'Patrick Allen L. Cas', '09949079858', 'patriccsio@gmail.com', 'cash', 'Blk 25 lot 30 iran st. San Marino City subd., Brgy. Salawag, Cavite, 4114', 'Serum (Plump Hydration)', 9, '2024-08-30', 'Completed'),
(35, 16, 'Admin Omsim', '', 'admin@gmail.com', 'credit_card', '123123', 'Mask (Hyalu-Cica Overnight Mask)', 700, '2024-08-30', 'Completed'),
(36, 16, 'Alden Recharge', '', 'alden@gmail.com', 'credit_card', 'posadpoajsdpojasd', 'Serum (Plump Hydration)', 9, '2024-08-30', 'Completed'),
(37, 16, 'jalen who', '', 'jalen@gmail.com', 'credit_card', 'Dyan lang', 'Hallo', 1000, '2024-08-30', 'Completed'),
(38, 16, 'jalen who', '', 'jalen@gmail.com', 'credit_card', 'Gentri', 'Toner (Non Irritating Toner) - 1x ₱400.00', 400, '2024-08-30', 'Completed'),
(39, 16, 'jalen who', '', 'jalen@gmail.com', 'credit_card', 'san marino\r\niran', 'Toner (Non Irritating Toner) - 5x ₱400.00', 2000, '2024-08-30', 'Completed'),
(40, 16, 'jalen who', '', 'jalen@gmail.com', 'credit_card', 'Blk 25 lot 30 iran st. San Marino City subd., Brgy. Salawag', 'Toner (Non Irritating Toner) - 1x ₱400.00', 400, '2024-08-30', 'Completed'),
(41, 16, 'jalen who', '', 'jalen@gmail.com', 'credit_card', '123123', 'Toner (Non Irritating Toner) - 1x ₱400.00', 400, '2024-08-30', 'Completed'),
(42, 16, 'jalen who', '', 'jalen@gmail.com', 'credit_card', '12312312', 'Toner (Non Irritating Toner) - 1x ₱400.00', 400, '2024-08-30', 'Completed'),
(43, 16, 'Patrick Allen L. Cas', '', 'patriccsio@gmail.com', 'credit_card', 'Blk 25 lot 30 iran st. San Marino City subd., Brgy. Salawag', 'Mask (Hyalu-Cica Overnight Mask) - 1x ₱700.00', 700, '2024-08-30', 'Completed'),
(44, 16, 'Patrick Allen L. Cas', '', 'patriccsio@gmail.com', 'credit_card', 'san marino\r\niran', 'Toner (Non Irritating Toner) - 1x ₱400.00', 400, '2024-08-30', 'Completed'),
(45, 16, 'Patrick Allen L. Cas', '', 'patriccsio@gmail.com', 'credit_card', 'Iran', 'Toner (Non Irritating Toner) - 1x ₱400.00', 400, '2024-08-30', 'Completed'),
(46, 16, 'Patrick Allen L. Cas', '', 'patriccsio@gmail.com', 'credit_card', '123123', 'Cleanser (Poremizing Deep Cleansing Foam) - 1x ₱800.00', 800, '2024-08-30', 'Completed'),
(47, 16, 'Patrick Allen L. Cas', '', 'patriccsio@gmail.com', 'credit_card', '123123', 'Serum (Plump Hydration) - 12x ₱9.00', 108, '2024-08-30', 'Completed'),
(48, 16, 'Patrick Allen L. Cas', '09949079858', 'patriccsio@gmail.com', 'cash', 'Blk 25 lot 30 iran st. San Marino City subd., Brgy. Salawag, Cavite, 4114', 'Toner (Skin Boosting Toner), Mask (Hyalu-Cica Overnight Mask)', 1500, '2024-08-31', 'Completed');

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
  `brand` varchar(55) NOT NULL,
  `rating` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `description`, `img_01`, `img_02`, `img_03`, `brand`, `rating`) VALUES
(8, 'Serum (Plump Hydration)', 9.00, 'Serum na blue', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303630355f3937382e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303630355f3837312e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303630355f3935352e6a7067, '', 0),
(9, 'Mask (Hyalu-Cica Overnight Mask)', 700.00, 'MaskMask', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f506963736172745f32342d30382d32305f31372d31332d35392d3630392e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137313330315f3933362e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137313330315f3237362e6a7067, '', 0),
(10, 'Cleanser (Poremizing Deep Cleansing Foam)', 800.00, 'eyy eyy', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134303831393630352e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134303832383930322e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134303836393332382e6a7067, '', 0),
(11, 'Toner (Skin Boosting Toner)', 800.00, 'Tonir', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132363834353736342e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132363835343335362e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132363839353432302e6a7067, '', 0),
(12, 'Toner (Non Irritating Toner)', 400.00, 'Recommended for People Who: \r\n-Have sensitive skin requiring in need of exfoliation and moisturization\r\n-experience of makeup lumps due to rough skin\r\n-are suffering from the dark and dull skin tone ', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f74312e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f74322e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f74332e6a7067, '', 0),
(15, 'Hallo', 1000.00, 'Jalo', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137313330315f3933362e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f506963736172745f32342d30382d32305f31372d31332d35392d3630392e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f506963736172745f32342d30382d32305f31372d31332d33342d3335302e6a7067, '', 0),
(16, 'Hyalu Cica (Blue Serum)', 500.00, '2nd hya', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303630355f3937382e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303630365f3530302e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303630355f3935352e6a7067, '', 0),
(17, 'Hyalu Cica (Ceramide Biom)', 1000.00, 'Daymnnn', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303335335f3531392e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303335335f38352e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303335335f3634352e6a7067, '', 0),
(18, 'Hyalu Cica (Step-O) Ampoule', 999.00, 'Maganda rin to tanga', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303732385f3432302e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f506963736172745f32342d30382d32305f31372d30372d35342d3134312e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303732385f3730342e6a7067, '', 0),
(19, 'Hyalu Cica (Moisture Cream)', 999.00, 'lorem tiktuk', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f506963736172745f32342d30382d32305f31372d31312d32302d3536382e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137313033355f3237322e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137313033355f3433322e6a7067, '', 0),
(20, 'Hyalu Cica (Lightweight Samsung Stick)', 899.00, 'lorem toktik', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f506963736172745f32342d30382d32305f31372d31382d31392d3130312e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f506963736172745f32342d30382d32305f31372d31372d34332d3031362e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f494d475f32303234303832305f3137303130305f3433332e6a7067, '', 0),
(21, 'Centella Airfit Suncream Plus', 1000.00, 'heyhey', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f6166322e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f6166322e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f6166352e6a7067, '', 0),
(22, 'Brightening Line (Skin Boosting Toner)', 1000.00, 'heyhey', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132363834353736342e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132363835343335362e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132363839353432302e6a7067, '', 0),
(23, 'Teatrica (BHA Foam)', 1000.00, 'heyhey', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134313533303630362e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134313534303238372e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134313538363039372e6a7067, '', 0),
(24, 'PoreMizing (Clear Toner)', 1000.00, 'heyhey', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134303534303031382e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134303534353431322e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343134303537373837372e6a7067, '', 0),
(25, 'ProbioCica (Bachiol Ice Cream)', 1000.00, 'heyhey', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132383438333433352e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132383438393430322e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732343132383439353734352e6a7067, '', 0),
(26, 'Sunscreen (Daily Soothing Sunscreen)', 1000.00, 'eyyyy', 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333831313034373537322e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333831313036323233352e6a7067, 0x443a5c58414d50505c6874646f63735c46494e414c2d50524f4a2f75706c6f6164732f313732333831313132333932342e6a7067, '', 0);

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_picture` varchar(255) DEFAULT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password_hash`, `email`, `first_name`, `last_name`, `address`, `phone_number`, `created_at`, `updated_at`, `profile_picture`, `gender`) VALUES
(12, 'asd123', '$2y$10$rMWt1NlhE9ZoVJqFwyf2/.BssKyQ6QfPyl6oel2hPMxNanKimAnRK', 'alli@gmail.com', 'allen', 'kalbo', 'Cavite', '088888', '2024-08-24 12:00:18', '2024-08-24 12:00:18', 'uploads/profile_pictures/66cf114fc9589-StockCake-Skincare Routine Moment_1723884474.jpg', ''),
(13, 'allen', '$2y$10$W3ivcssSlR41sPYUg9reJuB7i53nevqmZ0Uhxwn9rEuGgdU6AIzjW', 'allen@gmail.com', 'allen', 'heyhey', 'san marino', '09218091823', '2024-08-24 12:00:49', '2024-08-24 12:00:49', NULL, ''),
(14, 'aaron', '$2y$10$Ekh2ErtilSNxOs8Wx/mRC.SBrTb1yjXBCldvJC426un.Lno2pKkTG', 'derayaaron5@gmail.com', 'aaron', 'de raya', 'Location 3', '09553568279', '2024-08-26 05:08:56', '2024-08-26 05:08:56', 'uploads/profile_pictures/66cc155f081f9-FB_IMG_1703823661403.jpg', ''),
(15, 'JZ', '$2y$10$qXqL3.dfh/af2SOSpqDKAOKsoIYjMPsFqvSXBWlDfGriYLvgIqoRW', 'JZ@gmail.com', 'J', 'Z', 'Cavite', '02', '2024-08-28 13:34:33', '2024-08-28 13:34:33', 'uploads/profile_pictures/66cf277a92ce4-download.jpeg', ''),
(16, 'Alien', '$2y$10$NN55f8KVnp8Edn5/0u8KzOQJMoksn7toyO6LdIDmUPNbXKziqBcAe', 'alien@gmail.com', 'alien', 'kalbi', 'Bulacan', '09478855555', '2024-08-29 23:28:37', '2024-08-29 23:28:37', 'uploads/profile_pictures/66d1049d80c95-162246699_1428368857528676_6932284305764278673_n.jpg', 'Male'),
(17, 'jalen', '$2y$10$zRPTGYs5TPV4bJ4lhsG/leD2aTv/2tqM4wCVEI941T.j4r3lJ274a', 'jalen@gmail.com', 'jalen', 'who', 'Bulacan', '00000000000', '2024-08-30 00:29:52', '2024-08-30 00:29:52', NULL, 'Male'),
(18, 'user', '$2y$10$xIjtBPQENu4.3Saht049PO.1CM3nwFZRrb./kRmeQjgcV4j2mfHIW', 'user@gmail.com', 'user', 'wan', 'Bataan', '09949079858', '2024-08-31 10:28:14', '2024-08-31 10:28:14', 'uploads/profile_pictures/66d2f11e67e4e-dry.jpg', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `user_ratings`
--

CREATE TABLE `user_ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_ratings`
--

INSERT INTO `user_ratings` (`id`, `user_id`, `product_id`, `rating`) VALUES
(9, 18, 9, 1),
(10, 16, 9, 5);

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`);

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
-- Indexes for table `user_ratings`
--
ALTER TABLE `user_ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_rating` (`user_id`,`product_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_ratings`
--
ALTER TABLE `user_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
