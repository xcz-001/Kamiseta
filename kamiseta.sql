-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2025 at 12:02 PM
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
-- Database: `kamiseta`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` enum('barong','filipiniana','motif','accessories','fullset') NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `filename` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `description`, `price`, `stock`, `filename`, `created_at`, `updated_at`) VALUES
(1, 'classic pina barong', 'barong', 'debug mode off', 23450.00, 42, 'barong1.jpg', '2025-06-27 07:15:38', '2025-07-19 15:57:06'),
(2, 'Modern Fit Barong', 'barong', 'Slim-fit jusi fabric with minimal embroidery and Mandarin collar.', 2799.00, 15, 'barong2.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(3, 'Black Formal Barong', 'barong', 'Elegant black barong with subtle gold thread embroidery.', 3899.00, 8, 'barong3.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(4, 'Short-Sleeved Linen Barong', 'barong', 'Casual barong made from breathable linen for warm climates.', 1999.00, 20, 'barong4.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(5, 'Custom Monogram Barong', 'barong', 'Custom barong with personalized monogram on cuffs.', 4299.00, 5, 'barong5.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(6, 'Silk Terno Dress', 'filipiniana', 'Butterfly sleeve terno dress made with fine silk.', 4999.00, 6, 'filipiniana1.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(7, 'Piña Cocoon Midi', 'filipiniana', 'Elegant cocoon-style midi dress with traditional embroidery.', 4599.00, 10, 'filipiniana2.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(8, 'Modern Filipiniana Gown', 'filipiniana', 'Off-shoulder gown with mix of traditional and modern styles.', 5999.00, 4, 'filipiniana3.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(9, 'Lace Bolero Set', 'filipiniana', 'Lace bolero with matching skirt, perfect for formal events.', 3899.00, 7, 'filipiniana4.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(10, 'Power Suit Filipiniana', 'filipiniana', 'Contemporary blazer and pants set with terno details.', 4699.00, 12, 'filipiniana5.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(11, 'Inabel Lapel Blazer', 'motif', 'Tailored blazer with woven inabel fabric lapel accent.', 3599.00, 9, 'motif1.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(12, 'Handwoven Hem Pants', 'motif', 'Formal trousers with hablon weave accent on hem.', 2999.00, 14, 'motif2.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(13, 'Wrap Dress with Ifugao Motif', 'motif', 'Elegant wrap dress featuring traditional Ifugao patterns.', 3799.00, 6, 'motif3.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(14, 'Ethnic Cuffed Shirt', 'motif', 'Formal shirt with embroidered ethnic-inspired cuffs.', 2499.00, 10, 'motif4.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(15, 'Hablon Collar Polo', 'motif', 'Minimalist polo with hablon-threaded collar design.', 2199.00, 18, 'motif5.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(16, 'Abaca Clutch', 'accessories', 'Locally woven abaca clutch with mother-of-pearl inlay.', 1499.00, 25, 'accessories1.jpg', '2025-06-27 07:15:38', '2025-07-18 04:40:20'),
(17, 'Barong Button Set', 'accessories', 'Set of 5 buttons made from carved shell and brass.', 899.00, 30, 'accessories2.jpg', '2025-06-27 07:15:38', '2025-07-18 04:40:20'),
(18, 'Handwoven Belt', 'accessories', 'Traditional belt with antique brass buckle.', 1299.00, 20, 'accessories3.jpg', '2025-06-27 07:15:38', '2025-07-18 04:40:20'),
(19, 'Embroidered Face Mask', 'accessories', 'Reusable mask with matching embroidery patterns.', 499.00, 40, 'accessories4.jpg', '2025-06-27 07:15:38', '2025-07-18 04:40:20'),
(20, 'Inabel Pocket Squares', 'accessories', 'Set of 3 pocket squares using traditional inabel.', 799.00, 22, 'accessories5.jpg', '2025-06-27 07:15:38', '2025-07-18 04:40:20'),
(21, 'Wedding Barong Set', 'fullset', 'Full formal wedding set with embroidered barong and innerwear.', 7499.00, 3, 'fullset1.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(22, 'Graduation Terno', 'fullset', 'Terno gown ideal for recognition ceremonies and graduations.', 6499.00, 5, 'fullset2.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(23, 'Groom’s Formal Set', 'fullset', 'Barong, undershirt, and pants set for grooms.', 6999.00, 4, 'fullset3.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(24, 'Couple Filipiniana Set', 'fullset', 'Coordinated barong and terno dress for couples.', 9999.00, 2, 'fullset4.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(25, 'Debutante Gown', 'fullset', 'Modern Filipiniana ball gown with regal detailing.', 8999.00, 2, 'fullset5.jpg', '2025-06-27 07:15:38', '2025-07-04 10:21:02'),
(36, 'wedding set 1 ', 'fullset', 'simple intimate wedding set', 99999999.99, 1, 'WS (2).JPG', '2025-07-18 05:08:00', '2025-07-18 05:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `name`) VALUES
(1, 'admin1', '$2y$10$EeT5fFLYdHz0bAN95ArkleCkmXMWJkDVtv8xWeE3F.bxrS5boveCW', 'user', 'cy12@gmail.com', 'Cyril Mrn'),
(2, 'iya_001', '$2y$10$ko/hTVWpFRQg05QJ7HVkmue4jjVODWnP0MQtoCbB59dX2PeR/.8tK', 'user', 'iya1@gmail.com', 'Mesiah Bernas'),
(3, 'test', '$2y$10$NP0LtS565sNDJO3oSHppKugOOmJ62u1xtwclaqijP3WeMNJqKjZMi', 'user', 'test1@gmail.com', 'test'),
(4, 'test2', '$2y$10$G247bZK1pvw2aUMj2P/rqOxhWZtYzr5J35Y8GvComhk8QN5Jo7Pcm', 'user', 'test2@gmail.com', 'test2'),
(5, 'althea_12345a', '$2y$10$JrKCVBKmyiqrcKgUTO/By.8GEDl6wzUoaU4EG7o9nxs8huJCseTAa', 'user', 'althea@gmail.com', 'Althea Bernas'),
(6, 'althea_21bb', '$2y$10$RzwoKFBNdzest9btZpwn6ewKiPn8YNy3l7BryrQKO3uLyCsVfIwoW', 'user', 'althea123@gmail.com', 'Althea Bernas'),
(7, 'admin', '$2y$10$TbiBsLMWY7/85xQsspa68uTH6IKZKeoMbyurVucQj2Dcv.7/7Cr0C', 'admin', 'admin1@gmail.com', 'admin'),
(8, 'test3', '$2y$10$LrtRV3OqLaA2aNsJxehKKuOViX43ny.59r9A9Ltefc1sB9SaBC1Ay', 'user', 'test3@gmail.com', 'test3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
