-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 06:47 PM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u593341949_db_tinoy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(30) NOT NULL,
  `client_ip` varchar(20) NOT NULL,
  `user_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `client_ip`, `user_id`, `product_id`, `qty`) VALUES
(11, '', 2, 6, 2),
(18, '', 5, 7, 2),
(97, '', 3, 20, 1),
(113, '2001:4455:17c:9800:b', 0, 30, 2),
(117, '2001:4455:17c:9800:b', 0, 28, 1),
(118, '2001:4455:17c:9800:b', 0, 26, 1),
(136, '2001:fd8:1e82:9863:a', 0, 28, 1),
(138, '', 12, 26, 1),
(141, '122.52.201.141', 0, 31, 1),
(142, '122.52.201.141', 0, 25, 1),
(149, '64.226.63.150', 0, 27, 1),
(152, '2001:4456:e0cb:5b00:', 0, 26, 1),
(153, '2001:4456:e0cb:5b00:', 0, 25, 1),
(154, '2001:4456:e0cb:5b00:', 0, 29, 2),
(155, '2001:4456:e0cb:5b00:', 0, 27, 1),
(157, '2001:4455:102:8b00:c', 0, 28, 1),
(158, '2001:4455:102:8b00:c', 0, 29, 1),
(159, '143.44.193.70', 16, 27, 1),
(163, '49.149.42.52', 7, 27, 1),
(164, '2001:4455:1eb:ae00:8', 0, 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`) VALUES
(1, 'Mouse'),
(3, 'Keyboard'),
(4, 'Headset'),
(5, 'Casing'),
(8, 'Gaming Chair');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `userid` int(11) NOT NULL,
  `dateordered` datetime NOT NULL DEFAULT current_timestamp(),
  `Remarks` varchar(20) DEFAULT NULL,
  `type` varchar(20) NOT NULL COMMENT 'Pickup, Gcash',
  `ref` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `mobile`, `email`, `status`, `userid`, `dateordered`, `Remarks`, `type`, `ref`, `file`) VALUES
(92, 'reccon reccon', 'alae', '0936369271', 'reccon@gmail.com', 1, 7, '2024-06-03 09:20:08', NULL, 'Gcash', '123', '1717406400_Untitled.png');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `product_id`, `qty`, `type`) VALUES
(116, 92, 27, 1, ''),
(117, 92, 27, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `img_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0= unavailable, 2 Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `category_id`, `name`, `description`, `price`, `img_path`, `status`) VALUES
(25, 8, 'Homcom', 'Homcom Gaming chair, RED', 8000, '1717339380_rd_gaming_chair.jpg', 1),
(26, 5, 'Montech X3', 'ATX Casing, Color black', 2500, '1717339440_cooler_casing.jpg', 1),
(27, 4, 'Razer Kraken', 'Headset, noise cancelling', 3000, '1717339440_razer_headset.jpg', 1),
(28, 1, 'Razer DeathAdder', 'Mouse, 6400 DPI, Programmable buttons, Ergonomic design', 1500, '1717339500_razer_mouse.jpg', 1),
(29, 3, 'Logitech G Pro X', 'Mechanical Gaming Keyboard, swappable switches, Red switch', 3000, '1717339620_logitech_kb.jpg', 1),
(31, 8, 'Patotoya', 'Halanga uy', 150, '1717343700_436803912_391645740453950_2711776665718697034_n.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` varchar(1000) DEFAULT NULL,
  `terms` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`, `terms`) VALUES
(1, 'Kattdaddy', 'kattdaddy.dota2@gmail.com', '09363692717', '1717433940_123.jpg', '&lt;p style=&quot;text-align: left; background: transparent; position: relative;&quot;&gt;&amp;nbsp;Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', 'Effective Date: [Insert Date]\n\n## 1. Acceptance of Terms\nBy accessing and using our food delivery service, you agree to comply with these terms and conditions. If you do not agree, please do not use our service.\n\n## 2. User Eligibility\nYou must be at least 13 years old and above to use our service. By using our service, you represent and warrant that you meet this eligibility requirement.\n\n## 3. Ordering and Delivery\na. Users can place orders through our website.\nb. Delivery times may vary, and users are responsible for providing accurate delivery information.\nc. Delivery fees, if applicable, will be communicated during the order process.\n\n## 4. Payments\na. Users agree to pay for orders as specified during the order process.\nb. We accept payments through Gcash.\nc. All prices include applicable taxes.\n\n## 5. Cancellations and Refunds\na. Users can cancel orders but they can’t cancel after the order was confirmed.\nb.No Refund policies are available on our website.\n\n#');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', '$2y$10$r5Kd/2YdKa5wdYG/i9nkZOJvxVcT0l.CPZx1tKPHNaJdBSykRBvje', 1),
(2, 'Staff', 'staff', '$2y$10$QLui0KNr4puOdNTvRHG3..O6u5KJr/B74QheL3tZJGqG7q5gUpIdO', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`) VALUES
(7, 'reccon', 'reccon', 'reccon@gmail.com', '$2y$10$d0yMQ9AxyLYYrr3HIkwhLO3QvIyEi2sXgWalS.i9v1tFwy418GESq', '0936369271', 'alae'),
(8, 'mark', 'cardines', 'macrenzae21@gmail.com', '$2y$10$ur0gz08Cs9XBfp7SiGsQuujbd3GOGrXgBNj9JIbiSBxKyCn9rhhpO', '0912343248', 'alae'),
(9, 'Lo', 'm', 'g@gmail.com', '$2y$10$6N3hsoU5NLOUVdiwVHUeaejc2locuCdjf5OBot0Y7GLETqGzxKhe6', '09', 'M'),
(10, 'katt', 'daddy', 'kattdaddy@gmail.com', '$2y$10$sQvKZ6UgT8szgdDLvCesCuzP7tKFuqekWeYnlJ4wYFuo8dzSTZQU2', '123', 'alae'),
(11, 'Mark', 'Cardines', 'Cardzko69@gmail.com', '$2y$10$vNUva7LPGJctJTTyabCgPuregBUWd31Ju8RDCD70.fqTkfwc2zI/y', '0987653222', 'Alae'),
(12, 'Diwata', 'Pares', 'jdjfdjsj@gmail.com', '$2y$10$2s3xxu3kOfvcDz6HGb/KWeZ15C20T7lTiql05aSriEWgyqnLyE20C', '0912345678', 'Zone 1, maambong'),
(13, 'diwata', 'paress', 'diwata@gmail.com', '$2y$10$Gr4uuC.fA3VHZI5xITLbAu26gc5k1mUkJ1oMeITRoc.Fv0ANTQGnO', '0912345678', 'asdq22a'),
(14, 'ggg', 'ggg', 'ggwp@gmail.com', '$2y$10$P/jkdtl8e9ovXxjfxR7QcubfTwHgTWEqXn6Dn9nkjHscBQ9.26LsG', '345345', 'edrfgdfg'),
(15, 'xcv', 'xcv', 'reccon123@gmail.com', '$2y$10$SZ71q/pAC/qqmuFR3idTYuD8jWJGSjr/kV/IZ31B2aqvhxts33WKK', '345', 'xcv'),
(16, 'Ryan', 'Cepada', 'Ryan@gmail.com', '$2y$10$lsEk/oSqowyYdk5rFPVmbOk00uU5dPt494yUKrwO2Gr8aT4qlhQN6', '0987654321', 'Dicklum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
