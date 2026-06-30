-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2026 at 08:34 PM
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
-- Database: `pos_system_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `adjustment_type`
--

CREATE TABLE `adjustment_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adjustment_type`
--

INSERT INTO `adjustment_type` (`id`, `name`) VALUES
(1, 'Initial Stock'),
(2, 'Damage'),
(3, 'Lost Product'),
(4, 'Found Product'),
(5, 'Expired'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `is_ban` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=not_ban,1=ban',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone`, `is_ban`, `created_at`) VALUES
(1, 'Admin', 'admin@example.com', '$2y$10$QFo0ropT.1VyPCbsb3a8p.j5bm0d2fKZmKEOfc5bs1NK45RM.JKr.', '0123456789', 0, '2026-06-17 17:25:09'),
(2, 'Mina', 'mina@example.com', '$2y$10$EA4N1YCBIh9iIVM6QiKBTuxyz7E85l5UzQGe9svKweEAeSu7ZVjXe', '1111', 0, '2026-06-17 18:33:08'),
(4, 'Raju', 'raju@example.com', '$2y$10$nLH18ddeVvC2xrM81g.gHu6/WAd0neInqXGCY89nc1kB04K7FIxDy', '1111', 0, '2026-06-21 04:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=visiable,1=hidden'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`) VALUES
(1, 'Household Items', 'All Household Items', 0),
(2, 'Health & Medicine', 'All types of medicine', 0),
(5, 'Grocery & Daily Essentials', 'all of daily essentials', 0),
(6, 'Beverages', 'All type of drinks', 0),
(7, 'babay', 'sgfsg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `status`, `created_at`) VALUES
(1, 'Nourin', 'nourin@email.com', '1111', 0, '2026-06-19'),
(3, 'Fariya', 'fariya@example.com', '1111', 0, '2026-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `transaction_type_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_id`, `qty`, `balance`, `transaction_type_id`, `transaction_date`) VALUES
(1, 11, 5, 3, 4, '2026-06-30 00:25:53'),
(2, 11, 7, 10, 3, '2026-06-30 00:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_no`, `customer_id`, `customer_name`, `customer_phone`, `payment_mode`, `total_amount`, `created_at`) VALUES
(1, 'INV-850861', 1, 'Nourin', '1111', 'Cash Payment', 16090.00, '2026-06-21 11:41:09'),
(2, 'INV-819667', 1, 'Nourin', '1111', 'Cash Payment', 180.00, '2026-06-21 11:42:43'),
(3, 'INV-132211', 1, 'Nourin', '1111', 'Cash Payment', 3390.00, '2026-06-21 12:30:01'),
(4, 'INV-835430', 1, 'Nourin', '1111', 'Cash Payment', 6810.00, '2026-06-21 12:38:42'),
(5, 'INV-140070', 1, 'Nourin', '1111', 'Cash Payment', 4900.00, '2026-06-21 14:30:00'),
(6, 'INV-232920', 1, 'Nourin', '1111', 'Cash Payment', 3730.00, '2026-06-21 14:39:02'),
(7, 'INV-702160', 1, 'Nourin', '1111', 'Cash Payment', 1600.00, '2026-06-27 20:46:49'),
(8, 'INV-605399', 1, 'Nourin', '1111', 'Cash Payment', 90.00, '2026-06-27 20:52:32'),
(9, 'INV-774874', 1, 'Nourin', '1111', 'Cash Payment', 2800.00, '2026-06-27 20:53:04'),
(10, 'INV-788768', 1, 'Nourin', '1111', 'Cash Payment', 90.00, '2026-06-27 21:23:46'),
(11, 'INV-859074', 1, 'Nourin', '1111', 'Cash Payment', 310.00, '2026-06-29 19:57:54'),
(12, 'INV-286911', 1, 'Nourin', '1111', 'Cash Payment', 310.00, '2026-06-29 23:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `price`, `quantity`) VALUES
(1, 1, 2, 'Cleaning Brush', 16000.00, 1),
(2, 1, 8, '7 up', 90.00, 1),
(3, 2, 8, '7 up', 90.00, 2),
(4, 3, 8, '7 up', 90.00, 1),
(5, 3, 1, 'Dinner Set', 3300.00, 1),
(6, 4, 1, 'Dinner Set', 3300.00, 2),
(7, 4, 6, 'Lemon tea', 120.00, 1),
(8, 4, 8, '7 up', 90.00, 1),
(9, 5, 1, 'Dinner Set', 3300.00, 1),
(10, 5, 2, 'Cleaning Brush', 1600.00, 1),
(11, 6, 1, 'Dinner Set', 3300.00, 1),
(12, 6, 6, 'Lemon tea', 120.00, 1),
(13, 6, 8, '7 up', 90.00, 1),
(14, 6, 7, 'La Croix drinks', 220.00, 1),
(15, 7, 2, 'Cleaning Brush', 1600.00, 1),
(16, 8, 8, '7 up', 90.00, 1),
(17, 9, 6, 'Lemon tea', 120.00, 1),
(18, 9, 8, '7 up', 90.00, 2),
(19, 9, 12, 'formula', 2200.00, 1),
(20, 9, 11, 'Ata', 100.00, 1),
(21, 9, 10, 'Rice', 200.00, 1),
(22, 10, 8, '7 up', 90.00, 1),
(23, 11, 8, '7 up', 90.00, 1),
(24, 11, 7, 'La Croix drinks', 220.00, 1),
(25, 12, 8, '7 up', 90.00, 1),
(26, 12, 7, 'La Croix drinks', 220.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `quantity`, `image`, `status`, `date`) VALUES
(1, 1, 'Dinner Set', '24 pcs dinner set', 3300, 20, 'assets/uploads/products/1782014419.jpg', 0, '2026-06-19'),
(2, 1, 'Cleaning Brush', 'floor cleaning brush', 1600, 20, 'assets/uploads/products/1782014638.jpg', 0, '2026-06-19'),
(5, 2, 'Peracitamol', 'td', 30, 30, 'assets/uploads/products/1782014512.jpg', 0, '2026-06-20'),
(6, 6, 'Lemon tea', 'freash Lemon tea', 120, 30, 'assets/uploads/products/1782014758.jpg', 0, '2026-06-21'),
(7, 5, 'La Croix drinks', 'La Croix drinks', 220, 34, 'assets/uploads/products/1782015239.jpg', 0, '2026-06-21'),
(8, 6, '7 up', '7up', 90, 60, 'assets/uploads/products/1782015336.jpg', 0, '2026-06-21'),
(9, 6, 'Coca cola', 'Coca cola', 130, 40, 'assets/uploads/products/1782015424.jpg', 0, '2026-06-21'),
(10, 1, 'Rice', '', 200, 10, 'assets/uploads/products/1782025110.jpg', 0, '2026-06-21'),
(11, 1, 'Ata', '', 100, 10, 'assets/uploads/products/1782025233.jpg', 0, '2026-06-21'),
(12, 7, 'formula', 'hf', 2200, 45, '', 0, '2026-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `stock_adjustment`
--

CREATE TABLE `stock_adjustment` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `adjustment_type_id` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE `transaction_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_type`
--

INSERT INTO `transaction_type` (`id`, `name`) VALUES
(1, 'Sales'),
(2, 'Purchase'),
(3, 'Sales Return'),
(4, 'Purchase Return'),
(5, 'Positive Adjustment'),
(6, 'Negative Adjustment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adjustment_type`
--
ALTER TABLE `adjustment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `transaction_type_id` (`transaction_type_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_adjustment`
--
ALTER TABLE `stock_adjustment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `adjustment_type_id` (`adjustment_type_id`);

--
-- Indexes for table `transaction_type`
--
ALTER TABLE `transaction_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adjustment_type`
--
ALTER TABLE `adjustment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stock_adjustment`
--
ALTER TABLE `stock_adjustment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_type`
--
ALTER TABLE `transaction_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
