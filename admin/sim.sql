-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 03:56 AM
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
-- Database: `sim`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', '7c64e24ffb5a261e99a070a66d5c7df1219c0d8a9fc1da4d463fe9a07a8e2730f4db35bcb63812d61c230eda2127f7533e29f14a71cc88658f29e4525c326fc5'),
(6, 'newadmin@gmail.com', '83ea61191cb70fb645ca406e7832ca518f0b7ab70ca309db074f6ed227dfb764826673aafcd7cb649e5a2a2ebf05f43e24ef051fa53caffc03240e287feb45fa'),
(7, 'admin123@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `check_number` varchar(11) DEFAULT NULL,
  `check_amount` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`, `branch`, `check_number`, `check_amount`) VALUES
(1, 'BDO', 'Buhangin', '0918238329', 3000.00),
(2, 'BPI', 'Tagum', '2118223329', 5000.00),
(3, 'BDO', 'Matina', '0918238329', 3000.00),
(4, 'BDO', 'Maa', '0918238329', 5000.00),
(5, 'BDO', 'Maa', '1231232', 3000.00),
(6, 'BPI', 'Toril', '0918238329', 5000.00),
(7, 'BDO', 'Tagum', '0918238329', 5000.00),
(8, 'BPI', 'Buhangin', '1231232', 50000.00),
(9, 'BPI', 'Buhangin', '0918238329', 50000.00),
(10, 'BDO', 'Matina', '0918238329', 3000.00),
(11, 'BPI', 'Buhangin', '0918238329', 5000.00),
(12, 'BDO', 'Maa', '1231232', 3000.00),
(13, 'BDO', 'Maa', '0918238329', 3000.00),
(14, 'BDO', 'Tagum', '1231232', 5000.00),
(15, 'BDO', 'Matina', '0918238329', 50000.00),
(16, 'BDO', 'Matina', '2118223329', 50000.00),
(17, 'BDO', 'Maa', '1231232', 5000.00);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(100) NOT NULL,
  `cart_code` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `quantity`, `cart_code`) VALUES
(339, -1, 1023, 1, 702001),
(340, -1, 1023, 1, 702002),
(341, -1, 1023, 1, 702003),
(342, -1, 1023, 1, 702004),
(343, -1, 1023, 1, 702005),
(344, -1, 1011, 1, 702006),
(345, 100012, 1010, 1, 702007),
(346, 100009, 1000, 1, 702008),
(347, -1, 1012, 1, 702009),
(349, -1, 1023, 1, 702010),
(350, -1, 1023, 1, 702011),
(351, -1, 1023, 1, 702012),
(352, -1, 1023, 1, 702013),
(355, -1, 1023, 1, 702014),
(356, -1, 1023, 1, 702014),
(357, 100013, 1023, 1, 702015),
(358, -1, 1023, 1, 702016),
(359, -1, 1023, 1, 702017),
(360, -1, 1023, 1, 702018),
(361, -1, 1023, 1, 702019),
(362, 100012, 1023, 1, 702020),
(363, -1, 1011, 1, 702021),
(364, -1, 1023, 1, 702022),
(365, -1, 1011, 1, 702023),
(367, -1, 1023, 1, 702024),
(368, 100013, 1023, 1, 702025),
(369, 100013, 1011, 1, 702025),
(370, -1, 1023, 1, 702026),
(372, -1, 1010, 1, 702027),
(375, -1, 1011, 1, 702031),
(383, 100013, 1011, 1, 702028),
(384, 100013, 1011, 1, 702029),
(385, 100013, 1012, 2, 702030),
(415, 100011, 1023, 12, 702032),
(420, -1, 1027, 2, 702033),
(431, -1, 1028, 2, 1),
(432, 100012, 1011, 1, 0),
(433, 100012, 1011, 2, 0),
(434, 100012, 1011, 1, 1),
(435, 100012, 1033, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(0, 'Unclassified item'),
(1, 'Tops'),
(2, 'Dress'),
(3, 'Pants'),
(4, 'Shorts'),
(5, 'Shoes'),
(6, 'Jacket');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `discount` float(10,2) DEFAULT 0.00,
  `total` float(10,2) NOT NULL,
  `payment_method` varchar(50) DEFAULT 'Cash on Delivery',
  `ordered_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `contact`, `address`, `discount`, `total`, `payment_method`, `ordered_date`) VALUES
(702002, -1, NULL, NULL, 15.05, 60.20, 'Cash Payment', '2020-12-14 05:07:28'),
(702003, -1, NULL, NULL, 0.00, 75.25, 'Cash Payment', '2020-12-14 05:07:56'),
(702025, 100013, NULL, NULL, 115.05, 529.23, 'Check Payment', '2020-12-14 06:04:19'),
(702026, -1, NULL, NULL, 0.00, 84.28, 'Cash Payment', '2020-12-14 06:05:23'),
(702027, -1, NULL, NULL, 0.00, 1450.29, 'Cash Payment', '2020-12-14 06:08:59'),
(702028, 100013, '+639123789168', 'Block 1 Lot 4 Talomo Proper, Davao City', 0.00, 560.00, 'Cash on Delivery', '2020-12-15 16:57:30'),
(702029, 100013, '+639192791759', 'Block 1 Lot 4 Talomo Proper, Davao City', 0.00, 560.00, 'Cash on Delivery', '2020-12-15 17:05:59'),
(702030, 100013, '+639192791759', 'Block 12 Lot 12 Matina Aplaya, Davao City', 0.00, 6289.90, 'Cash on Delivery', '2020-12-15 17:15:26'),
(702031, -1, NULL, NULL, 0.00, 560.00, 'Cash Payment', '2020-12-15 18:58:45'),
(702032, 100011, NULL, NULL, 0.00, 1011.36, 'Cash Payment', '2020-12-17 17:45:32'),
(702033, -1, NULL, NULL, 999.37, 4597.09, 'Cash Payment', '2020-12-08 17:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(65) NOT NULL,
  `description` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `QuantityInStock` int(100) NOT NULL,
  `QuantitySold` int(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `date_added` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `photo`, `QuantityInStock`, `QuantitySold`, `category_id`, `supplier_id`, `date_added`) VALUES
(1000, 'Drifit', 'Drifit SHirt for men ', 1499.00, 'Drifit.jpg', 1, 2, 1, 100002, '2024-07-1 01:42:02'),
(1010, 'Short sleeve Black and Beige', 'Short sleeves typically extend from the shoulder to just above the elbow or mid-upper arm, providing coverage without extending down to the wrist.', 1294.90, 'Black and Beige.jpg', 308, 33, 1, 100003, '2024-07-03 01:42:02'),
(1011, 'Neckline brown short sleeve', 'They are characterized by their shorter length compared to long sleeves, making them ideal for warmer weather or casual settings where comfort and freedom of movement are desired.', 800.00, 'Neckline Shirt.jpg', 276, 69, 1, 10002, '2024-07-01 01:42:02'),
(1012, 'Black Oversized Shirt', 'Color Black, comfortable', 807.99, 'oversized.jpg', 150, 25, 1, 100002, '2020-02-22 01:42:02'),
(1023, 'Short blue Sleeve', 'They are a staple in casual fashion, offering versatility for layering or wearing alone depending on the occasion and personal style.', 75.25, 'short sleeve.jpg', 150, 72, 1, 100003, '2020-12-07 07:30:07'),
(1027, 'Geo Print short sleeve ', 'Short sleeves offer greater airflow and are less restrictive than long sleeves, making them suitable for active or casual wear during warmer seasons.', 1498.42, 'Geo Print Shirt Without Tee.jpg', 121, 2, 1, 0, '2020-12-16 01:21:33'),
(1028, 'Black dress', 'A dress description typically provides details about the design, style, fabric, and features of a garment worn primarily by women. Here’s a comprehensive outline of what a dress', 13083.84, 'Black dress.jpg', 50, 3, 2, 10002, '2020-12-16 01:37:36'),
(1029, 'White Dress', 'Includes any special design features like ruffles, pleats, gathers, embroidery, lace, sequins, or embellishments.', 12058.11, 'White slit midi dress.jpg', 32, 5, 2, 100004, '2020-12-16 01:39:54'),
(1030, 'Green EZwear Dress', 'Specifies the material used (e.g., cotton, silk, chiffon, satin, lace, velvet, polyester, etc.).', 1627.67, 'green EZwear dress.jpg', 50, 2, 2, 100003, '2020-12-16 01:42:02'),
(1031, 'Floral Print bow tie dress', 'Describes its versatility or specific suitability for certain events or seasons.', 1627.67, 'Floral Print bow tie dress.jpg', 233, 100, 2, 100004, '2020-12-16 01:43:24'),
(1032, 'Brown Jacket ', 'Color: Brow can stand cold and has a nice leather and fabric.', 1148.64, 'jacket.jpg', 1232, 500, 6, 0, '2020-12-16 01:44:28'),
(1033, 'Cordoroy Shorts', 'Corduroy shorts are a stylish and comfortable option for casual wear, particularly during cooler seasons', 290.58, 'shorts.jpg', 100, 50, 4, 100002, '2020-12-16 01:53:29'),
(1034, 'Black Trouser', 'Generally mid-weight, providing warmth and durability suitable for transitional weather.', 26442.52, 'trouser.jpg', 100, 20, 3, 0, '2020-12-16 01:55:05'),
(1035, 'White Sneaker', 'Color: white easy to wear and comfortable.', 1076.76, 'white sneaker.jpg', 120, 10, 5, 100007, '2020-12-16 01:56:53'),
(1036, 'Casual denim short for men', 'Denim For men', 233.39, 'denim.jpg', 50, 10, 4, 10006, '2020-12-16 01:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`, `contact`) VALUES
(0, 'No Supplier', '', ''),
(100002, 'Shein', 'Japan', '+639192791759'),
(100003, 'Shoppe', 'Korea', '+639192791759'),
(100004, 'Lazada', 'Taiwan, Province Of China', '+639192791759'),
(100005, 'Temu', 'USA', '+639192791753'),
(100006, 'Amazon', 'USA', '+639192791753'),
(100007, 'Shoppers', 'Canada', '+639123789168');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(128) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `contact` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `date_registered` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `contact`, `address`, `date_registered`) VALUES
(-1, 'Walk-in', 'Customer', 'walkin@xyt.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 5, NULL, NULL, '2020-12-15 17:42:02'),
(100011, 'jezyl', 'bacalso', 'bacalso.jezyl4@gmail.com', '48e1994798a03ad125b8a64accf2e4baabc87b333fb7c907faaf37bbcaba96cb0fcb1c0f48a9e7de979b86f764469e5ea90f74e0c8a2487038ac40b92a6c5c5f', 0, NULL, NULL, '0000-00-00 00:00:00'),
(100012, 'kaisen', 'cart', 'kaisencartx.1@gmail.com', '16481e7e51b5f55484279584f9b3fbded33745fbd326195308a9b1c7b1505cd0e6a379c6266525e30ab890830492cff344bd7b4d678c180d9d4fa5c44e9c24ec', 0, NULL, NULL, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=436;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1038;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100016;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
