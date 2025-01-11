-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 06:15 PM
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
-- Database: `ebay_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`, `product_id`, `quantity`, `created_date`) VALUES
(9, 5, 16, 1, '2025-01-08 11:12:24'),
(10, 5, 21, 1, '2025-01-08 11:12:58');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `category_id` int(11) NOT NULL,
  `category_type` varchar(50) DEFAULT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`category_id`, `category_type`, `category_name`) VALUES
(1, 'ALL', 'All'),
(2, 'techno', 'mobile'),
(3, 'techno', 'pc'),
(4, 'techno', 'accessories'),
(5, 'motors', 'rims'),
(6, 'motors', 'car camera'),
(7, 'motors', 'car accessorie'),
(8, 'fashion', 'women'),
(9, 'fashion', 'man'),
(10, 'fashion', 'kid'),
(11, 'sport', 'gym'),
(12, 'sport', 'sports equipment'),
(13, 'sport', 'shoes');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `comment` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `user_id`, `product_id`, `rating`, `comment`, `created_date`) VALUES
(19, 5, 16, 5, 'lorem ipsums', '2025-01-08 11:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `image_alt` varchar(255) DEFAULT NULL,
  `is_primary` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `product_id`, `image_url`, `image_alt`, `is_primary`) VALUES
(18, 15, '../Images/techno-mobile-1-1.png', 'techno-mobile-1-1.png', 0),
(19, 15, '../Images/techno-mobile-1-2.png', 'techno-mobile-1-2.png', 0),
(20, 15, '../Images/techno-mobile-1-3.png', 'techno-mobile-1-3.png', 0),
(21, 16, '../Images/techno-mobile-2-1.jpeg', 'techno-mobile-2-1.jpeg', 0),
(22, 16, '../Images/techno-mobile-2-2.jpeg', 'techno-mobile-2-2.jpeg', 0),
(23, 16, '../Images/techno-mobile-2-3.jpeg', 'techno-mobile-2-3.jpeg', 0),
(24, 17, '../Images/sport--shoe-1-1.png', 'sport--shoe-1-1.png', 0),
(25, 17, '../Images/sport--shoe-1-2.png', 'sport--shoe-1-2.png', 0),
(26, 18, '../Images/techno-mobile-3-1.jpeg', 'techno-mobile-3-1.jpeg', 0),
(27, 18, '../Images/techno-mobile-3-2.jpeg', 'techno-mobile-3-2.jpeg', 0),
(28, 19, '../Images/techno-pc-1.jpg', 'techno-pc-1.jpg', 0),
(29, 20, '../Images/sport--shoe-2-1.png', 'sport--shoe-2-1.png', 0),
(30, 20, '../Images/sport--shoe-2-2.png', 'sport--shoe-2-2.png', 0),
(31, 21, '../Images/techno-mobile-4-1.jpeg', 'techno-mobile-4-1.jpeg', 0),
(32, 21, '../Images/techno-mobile-4-2.jpeg', 'techno-mobile-4-2.jpeg', 0),
(33, 21, '../Images/techno-mobile-4-3.jpeg', 'techno-mobile-4-3.jpeg', 0),
(34, 22, '../Images/motor-rims-1-1.webp', 'motor-rims-1-1.webp', 0),
(35, 22, '../Images/motor-rims-1-2.webp', 'motor-rims-1-2.webp', 0),
(36, 22, '../Images/motor-rims-1-3.webp', 'motor-rims-1-3.webp', 0),
(37, 23, '../Images/techno-pc-4.webp', 'techno-pc-4.webp', 0),
(38, 24, '../Images/motor-fashion-2-1.jpg', 'motor-fashion-2-1.jpg', 0),
(39, 24, '../Images/motor-fashion-2-2.jpg', 'motor-fashion-2-2.jpg', 0),
(40, 25, '../Images/motor-camera-1-1.jfif', 'motor-camera-1-1.jfif', 0),
(41, 25, '../Images/motor-camera-1-2.jpg', 'motor-camera-1-2.jpg', 0),
(42, 25, '../Images/motor-camera-1-3.jpg', 'motor-camera-1-3.jpg', 0),
(43, 26, '../Images/techno-accs-1-1.jpeg', 'techno-accs-1-1.jpeg', 0),
(44, 26, '../Images/techno-accs-1-2.jpeg', 'techno-accs-1-2.jpeg', 0),
(45, 27, '../Images/techno-pc-2.jpg', 'techno-pc-2.jpg', 0),
(46, 28, '../Images/motor-accs-1-2.jpg', 'motor-accs-1-2.jpg', 0),
(47, 28, '../Images/motor-accs-1-3 (1).jpg', 'motor-accs-1-3 (1).jpg', 0),
(48, 29, '../Images/motor-fashion-6-1.jpg', 'motor-fashion-6-1.jpg', 0),
(49, 29, '../Images/motor-fashion-6-2.jpg', 'motor-fashion-6-2.jpg', 0),
(50, 30, '../Images/motor-accs-2-1.jpg', 'motor-accs-2-1.jpg', 0),
(51, 30, '../Images/motor-accs-2-2.jpg', 'motor-accs-2-2.jpg', 0),
(52, 30, '../Images/motor-accs-2-3.jpg', 'motor-accs-2-3.jpg', 0),
(53, 31, '../Images/sport--gym-1-1.jpg', 'sport--gym-1-1.jpg', 0),
(54, 31, '../Images/sport--gym-1-2.jpg', 'sport--gym-1-2.jpg', 0),
(55, 32, '../Images/sport--equip-1-1.jpg', 'sport--equip-1-1.jpg', 0),
(56, 32, '../Images/sport--equip-1-2.jpg', 'sport--equip-1-2.jpg', 0),
(57, 33, '../Images/techno-accs-2-1.jpg', 'techno-accs-2-1.jpg', 0),
(58, 33, '../Images/techno-accs-2-2.jpg', 'techno-accs-2-2.jpg', 0),
(59, 33, '../Images/techno-accs-3-1.jpg', 'techno-accs-3-1.jpg', 0),
(60, 34, '../Images/motor-fashion-5-1.jpg', 'motor-fashion-5-1.jpg', 0),
(61, 34, '../Images/motor-fashion-5-2.jpg', 'motor-fashion-5-2.jpg', 0),
(62, 35, '../Images/motor-rims-2-1.webp', 'motor-rims-2-1.webp', 0),
(63, 35, '../Images/motor-rims-2-2.webp', 'motor-rims-2-2.webp', 0),
(64, 35, '../Images/motor-rims-2-3.webp', 'motor-rims-2-3.webp', 0),
(65, 36, '../Images/motor-camera-2-1.jpg', 'motor-camera-2-1.jpg', 0),
(66, 36, '../Images/motor-camera-2-2.png', 'motor-camera-2-2.png', 0),
(67, 36, '../Images/motor-camera-2-3.png', 'motor-camera-2-3.png', 0),
(68, 37, '../Images/techno-pc-3.jpg', 'techno-pc-3.jpg', 0),
(69, 37, '../Images/techno-pc-4.webp', 'techno-pc-4.webp', 0),
(70, 38, '../Images/sport--gym-2-1.jpg', 'sport--gym-2-1.jpg', 0),
(71, 38, '../Images/sport--gym-2-2.jpg', 'sport--gym-2-2.jpg', 0),
(72, 38, '../Images/sport--gym-2-3.jpg', 'sport--gym-2-3.jpg', 0),
(73, 39, '../Images/motor-rims-3-1.jpg', 'motor-rims-3-1.jpg', 0),
(74, 39, '../Images/motor-rims-3-2.jpg', 'motor-rims-3-2.jpg', 0),
(75, 40, '../Images/motor-accs-1-1 (1).jpg', 'motor-accs-1-1 (1).jpg', 0),
(76, 40, '../Images/motor-accs-1-1.jpg', 'motor-accs-1-1.jpg', 0),
(77, 41, '../Images/motor-fashion-3-1.jpg', 'motor-fashion-3-1.jpg', 0),
(78, 41, '../Images/motor-fashion-3-2.jpg', 'motor-fashion-3-2.jpg', 0),
(79, 42, '../Images/sport--equip-2-1.jpg', 'sport--equip-2-1.jpg', 0),
(80, 42, '../Images/sport--equip-2-2.jpg', 'sport--equip-2-2.jpg', 0),
(81, 43, '../Images/motor-fashion-1-1.jpg', 'motor-fashion-1-1.jpg', 0),
(82, 43, '../Images/motor-fashion-1-2.jpg', 'motor-fashion-1-2.jpg', 0),
(83, 44, '../Images/motor-fashion-7-1.jpg', 'motor-fashion-7-1.jpg', 0),
(84, 44, '../Images/motor-fashion-7-2.jpg', 'motor-fashion-7-2.jpg', 0),
(85, 45, '../Images/motor-fashion-4-1.jpg', 'motor-fashion-4-1.jpg', 0),
(86, 45, '../Images/motor-fashion-4-2.jpg', 'motor-fashion-4-2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_status` enum('Pending','Shipped','Delivered','Cancelled') DEFAULT 'Pending',
  `order_price` decimal(10,2) NOT NULL,
  `shipping_address` text NOT NULL,
  `ordered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `order_status`, `order_price`, `shipping_address`, `ordered_at`) VALUES
(15, 2, 25, 'Pending', 75.00, 'GE', '2025-01-08 12:31:18'),
(16, 2, 25, 'Pending', 75.00, 'GE', '2025-01-08 12:35:33'),
(17, 2, 35, 'Pending', 75.00, 'GE', '2025-01-08 12:35:33'),
(18, 2, 40, 'Pending', 100.00, 'GE', '2025-01-08 12:35:33'),
(19, 9, 16, 'Pending', 345.00, 'City5,street5', '2025-01-08 18:02:33'),
(20, 9, 22, 'Pending', 50.00, 'City5,street5', '2025-01-08 18:02:33'),
(21, 2, 25, 'Pending', 75.00, 'GE', '2025-01-09 07:26:13'),
(22, 2, 22, 'Pending', 50.00, 'GE', '2025-01-09 07:26:13'),
(23, 2, 25, 'Pending', 75.00, 'GE', '2025-01-09 07:26:51'),
(24, 11, 20, 'Pending', 125.00, 'City7,street7', '2025-01-09 07:29:16'),
(25, 11, 38, 'Pending', 200.00, 'City7,street7', '2025-01-09 07:29:16'),
(26, 11, 41, 'Pending', 50.00, 'City7,street7', '2025-01-09 07:29:16'),
(27, 8, 20, 'Pending', 125.00, 'City4,street4', '2025-01-11 16:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `user_id`, `category_id`, `product_title`, `product_description`, `product_price`, `stock_quantity`, `created_at`) VALUES
(15, 5, 1, 'Iphone | mobile', 'used phone', 499.00, 1, '2025-01-04 04:11:34'),
(16, 6, 1, 'Google Pixel', 'phone in good condition', 345.00, 1, '2025-01-04 04:14:13'),
(17, 6, 12, 'Sport Shoes', 'good shoes for sport', 99.00, 1, '2025-01-04 04:15:10'),
(18, 7, 1, 'phone | Nothing Phone', 'new phone, not opened', 199.00, 1, '2025-01-04 04:16:47'),
(19, 7, 2, 'Office PC', 'good pc for daily work', 399.00, 2, '2025-01-04 04:17:44'),
(20, 7, 12, 'Shoes', 'Sport shoes, universal', 125.00, 2, '2025-01-04 04:18:30'),
(21, 8, 1, 'Samsung phone', 'new Phone for daily use', 399.00, 1, '2025-01-04 04:21:45'),
(22, 8, 4, 'Car Rims', 'Rims for mercedes-benz', 50.00, 4, '2025-01-04 04:22:47'),
(23, 8, 2, 'Personal Computer', 'Good PC', 499.00, 1, '2025-01-04 04:23:33'),
(24, 9, 7, 'Woman Jeans', 'new woman jeans', 45.00, 2, '2025-01-04 04:26:06'),
(25, 9, 5, 'Car Camera', 'Camera For Car', 75.00, 2, '2025-01-04 04:26:57'),
(26, 9, 3, 'Iphone cases', 'Magsafe cases', 10.00, 6, '2025-01-04 04:28:15'),
(27, 10, 2, 'Personal Computer | PC', 'used PC', 360.00, 1, '2025-01-04 04:30:50'),
(28, 10, 6, 'car mats', 'universal silicone car mats ', 30.00, 4, '2025-01-04 04:32:41'),
(29, 10, 9, 'Kids cloth', 'kids christmas cloth', 35.00, 1, '2025-01-04 04:34:43'),
(30, 10, 6, 'Car Screen', 'Portable Car Screen', 125.00, 3, '2025-01-04 04:36:01'),
(31, 11, 10, 'Sport Medicine', 'Medicine for gym', 400.00, 2, '2025-01-04 04:38:41'),
(32, 11, 11, 'GYM Bench', 'Bench for indoor train', 600.00, 4, '2025-01-04 04:39:51'),
(33, 11, 3, 'Samsung Cases', 'Colorful Cases for Samsung', 20.00, 8, '2025-01-04 04:41:18'),
(34, 11, 8, 'Man cloths', 'Blue man cloth', 50.00, 4, '2025-01-04 04:42:28'),
(35, 11, 4, 'Audi Rims', 'Rims For Audi', 75.00, 8, '2025-01-04 04:43:22'),
(36, 11, 5, 'Car Camer | universal', 'Camera for car', 130.00, 3, '2025-01-04 04:44:06'),
(37, 12, 2, 'Office PCs', 'good office PCs', 400.00, 2, '2025-01-04 04:45:08'),
(38, 12, 10, 'Gym Medicine', 'Various Gym Medicine', 200.00, 3, '2025-01-04 04:45:48'),
(39, 12, 4, 'Universal Car Rims', 'Car rims for any car', 110.00, 4, '2025-01-04 04:46:18'),
(40, 13, 6, 'Black Car mats', 'Black silicone car mats, universal', 100.00, 4, '2025-01-04 04:48:00'),
(41, 13, 8, 'Gray trouser', 'Mans gray trouser', 50.00, 2, '2025-01-04 04:48:42'),
(42, 13, 11, 'Universal Gym equipment', 'Gym equipment for full body training', 790.00, 3, '2025-01-04 04:49:34'),
(43, 14, 7, 'women bluse', 'new woman bluse', 45.00, 2, '2025-01-04 04:50:41'),
(44, 14, 9, 'Kid cloth', 'blue kid cloth, sonic', 30.00, 3, '2025-01-04 04:51:13'),
(45, 14, 8, 'Dark Gray Man Cloth', 'dark gray man cloth', 60.00, 2, '2025-01-04 04:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE `saved` (
  `saved_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(150) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_type` enum('buyer','seller','admin','user') DEFAULT 'buyer',
  `user_address` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_username`, `user_email`, `user_password`, `user_type`, `user_address`, `created_date`) VALUES
(2, 'Dima', 'Sh', 'dima', 'dima@gmail.com', '1234', 'admin', 'GE', '2024-12-30 11:45:42'),
(5, 'user1', 'usr1', 'user1', 'user1@gmail.com', '1234', 'user', 'City1,street1', '2025-01-04 07:01:49'),
(6, 'user2', 'usr2', 'user2', 'user2@gmail.com', '1234', 'user', 'City2,street2', '2025-01-04 07:13:05'),
(7, 'user3', 'usr3', 'user3', 'user3@gmail.com', '1234', 'user', 'City3,street3', '2025-01-04 07:15:35'),
(8, 'user4', 'usr4', 'user4', 'user4@gmail.com', '1234', 'user', 'City4,street4', '2025-01-04 07:21:04'),
(9, 'user5', 'usr5', 'user5', 'user5@gmail.com', '1234', 'user', 'City5,street5', '2025-01-04 07:25:15'),
(10, 'user6', 'usr6', 'user6', 'user6@gmail.com', '1234', 'user', 'City6,street6', '2025-01-04 07:28:34'),
(11, 'user7', 'usr7', 'user7', 'user7@gmail.com', '1234', 'user', 'City7,street7', '2025-01-04 07:37:15'),
(12, 'user8', 'usr8', 'user8', 'user8@gmail.com', '1234', 'user', 'City8,street8', '2025-01-04 07:44:24'),
(13, 'user9', 'usr9', 'user9', 'user9@gmail.com', '1234', 'user', 'City9,street9', '2025-01-04 07:46:36'),
(14, 'user10', 'usr10', 'user10', 'user10@gmail.com', '1234', 'user', 'City10,street10', '2025-01-04 07:50:02'),
(15, 'testUser', 'tester', 'teste001', 'test@gmail.com', '1234', 'user', 'Test City', '2025-01-08 12:56:04'),
(16, 'test2', 'test2', 'test2', 'tes2@test.com', '1234', 'user', 'test city, test', '2025-01-11 17:01:40'),
(17, 'teest3', 'teest3', 'tessst3', 'test3@test.com', '1234', 'user', 'test country, test city', '2025-01-11 17:04:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `saved`
--
ALTER TABLE `saved`
  ADD PRIMARY KEY (`saved_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `saved`
--
ALTER TABLE `saved`
  MODIFY `saved_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedbacks_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `saved`
--
ALTER TABLE `saved`
  ADD CONSTRAINT `saved_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `saved_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
