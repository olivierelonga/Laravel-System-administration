-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 09:03 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer_control`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `date_created`, `username`, `password`, `balance`) VALUES
(3, 'Test', 'Test', '2022-06-26 21:33:33', 'Test', '$2y$10$qh9wjZCiuNTtTanvRhcMN.0RtYjxdZX.ovRzf4sXfJGdISIznUecO', '820');

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

CREATE TABLE `food_type` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_type`
--

INSERT INTO `food_type` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2022-06-19 17:04:55', NULL, 'Fruits'),
(2, '2022-06-19 17:05:19', NULL, 'vegetables');

-- --------------------------------------------------------

--
-- Table structure for table `fruits`
--

CREATE TABLE `fruits` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fruits`
--

INSERT INTO `fruits` (`id`, `created_at`, `updated_at`, `name`, `food_id`) VALUES
(1, '2022-06-18 23:38:32', NULL, 'Apples', 1),
(2, '2022-06-18 23:39:04', NULL, 'pears', 1),
(3, '2022-06-18 23:39:23', NULL, 'oranges', 1),
(4, '2022-06-18 23:39:46', NULL, 'grapefruits', 1),
(5, '2022-06-18 23:40:09', NULL, 'limes', 1),
(6, '2022-06-18 23:40:44', NULL, 'mangoes', 1),
(7, '2022-06-18 23:41:11', NULL, 'avocados', 1),
(8, '2022-06-18 23:42:25', NULL, 'plums', 1),
(9, '2022-06-18 23:44:07', NULL, 'Grapes', 1),
(10, '2022-06-18 23:44:57', NULL, 'Pineapple', 1),
(11, '2022-06-19 16:59:41', NULL, 'Artichoke', 2),
(12, '2022-06-19 17:00:04', NULL, 'Ash gourd', 2),
(13, '2022-06-19 17:00:44', NULL, 'Beetroot', 2),
(14, '2022-06-19 17:01:32', NULL, 'Green bean', 2),
(15, '2022-06-19 17:02:01', NULL, 'Corn', 2);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sales_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sale_order_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `customer_id`, `description`, `date_created`, `amount`, `sales_reference`, `sale_order_id`, `status`) VALUES
(1, 3, 'Invoice for testing another  item added', '2022-06-26 21:35:12', '150', 'SO-0001', 1, 1),
(2, 3, 'Test_2', '2022-06-26 21:41:45', '130', 'SO-0004', 4, 1),
(3, 3, 'Testing Invoice 3', '2022-06-27 06:54:33', '150', 'SO-0006', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item_list`
--

CREATE TABLE `invoice_item_list` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `sales_ref` varchar(200) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_item_list`
--

INSERT INTO `invoice_item_list` (`id`, `created_at`, `updated_at`, `invoice_id`, `sales_ref`, `amount`, `user_id`) VALUES
(1, '2022-06-26 19:34:38', 2022, 1, 'SO-0001', '150', 0),
(2, '2022-06-26 19:35:08', 2022, 1, 'SO-0001', '150', 0),
(3, '2022-06-26 19:35:12', 2022, 1, 'SO-0001', '150', 3),
(4, '2022-06-26 19:41:25', 2022, 2, 'SO-0004', '130', 0),
(5, '2022-06-26 19:41:35', 2022, 2, 'SO-0004', '130', 0),
(6, '2022-06-26 19:41:42', 2022, 2, 'SO-0004', '130', 0),
(7, '2022-06-26 19:41:45', 2022, 2, 'SO-0004', '130', 3),
(8, '2022-06-27 04:54:18', 2022, 3, 'SO-0006', '150', 0),
(9, '2022-06-27 04:54:24', 2022, 3, 'SO-0006', '150', 0),
(10, '2022-06-27 04:54:29', 2022, 3, 'SO-0006', '150', 0),
(11, '2022-06-27 04:54:33', 2022, 3, 'SO-0006', '150', 3);

--
-- Triggers `invoice_item_list`
--
DELIMITER $$
CREATE TRIGGER `customers_balance` AFTER INSERT ON `invoice_item_list` FOR EACH ROW BEGIN
UPDATE customers 
SET customers.balance = (
    SELECT invoice_item_list.amount 
    FROM invoice_item_list
    WHERE invoice_item_list.user_id = customers.id order by invoice_item_list.id desc limit 1
) + customers.balance;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`id`, `name`, `username`, `password`) VALUES
(1, 'Test_Operator', 'Operator_User', '$2y$10$YYnAFgrXThuzBsBsN14zFeIJ6vKkQN8nb4275YS5fM2bUKzLebQsW');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `customer_id`, `date_created`, `amount`, `invoice_id`) VALUES
(1, 3, '2022-06-26 21:35:55', '150', 1),
(2, 3, '2022-06-26 21:42:36', '150', 2),
(3, 3, '2022-06-27 06:55:19', '150', 3);

--
-- Triggers `payments`
--
DELIMITER $$
CREATE TRIGGER `customers_balance_update` AFTER INSERT ON `payments` FOR EACH ROW BEGIN
UPDATE customers 
SET customers.balance = customers.balance - (
    SELECT payments.amount 
    FROM payments
    WHERE payments.customer_id = customers.id order by payments.id desc limit 1
);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sale_order`
--

CREATE TABLE `sale_order` (
  `id` int(11) NOT NULL,
  `order_reason` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `food_category` varchar(255) NOT NULL,
  `u_price` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `sales_ref` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_order`
--

INSERT INTO `sale_order` (`id`, `order_reason`, `description`, `food_category`, `u_price`, `created_at`, `updated_at`, `sales_ref`) VALUES
(1, 'Sales for Month of march', 'Description : Sales for Month of march', 'oranges', '150', '2022-06-26 19:11:19', '2022-06-26 19:11:19', 'SO-0001'),
(2, 'Sales for Month of march', 'Sales for Month of march Description', 'Green bean', '150', '2022-06-26 19:25:05', '2022-06-26 19:25:05', 'SO-0002'),
(3, 'Sales for Month of march', 'Test', 'Ash gourd', '130', '2022-06-26 19:29:37', '2022-06-26 19:29:37', 'SO-0003'),
(4, 'Sales for Month of march', 'Test Sales for Month of march', 'Corn', '130', '2022-06-26 19:31:14', '2022-06-26 19:31:14', 'SO-0004'),
(5, 'Test_reason', 'Test_description', 'limes', '150', '2022-06-26 19:38:33', '2022-06-26 19:38:33', 'SO-0005'),
(6, 'Sales for Month of march', 'Sales for Month of march description', 'mangoes', '150', '2022-06-27 04:50:41', '2022-06-27 04:50:41', 'SO-0006');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_username_unique` (`username`);

--
-- Indexes for table `food_type`
--
ALTER TABLE `food_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `invoice_item_list`
--
ALTER TABLE `invoice_item_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `operators_username_unique` (`username`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `sale_order`
--
ALTER TABLE `sale_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food_type`
--
ALTER TABLE `food_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice_item_list`
--
ALTER TABLE `invoice_item_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sale_order`
--
ALTER TABLE `sale_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
