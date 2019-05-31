-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2019 at 03:31 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `abcstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `brand_famous` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_slug`, `brand_desc`, `brand_famous`, `created_at`, `updated_at`) VALUES
(1, 'iPhone', 'iphone', 'Apple', 1, '2019-05-13 09:55:56', '2019-05-13 02:55:56'),
(2, 'Galaxy', 'galaxy', 'Samsung', 1, '2019-05-13 02:56:25', '2019-05-13 02:56:25'),
(3, 'Mi', 'mi', 'Xiaomi', 0, '2019-05-13 03:02:42', '2019-05-13 03:02:42'),
(6, 'Huawei', 'huawei', 'Huawei', 1, '2019-05-13 04:43:55', '2019-05-13 04:43:55'),
(7, 'Vivo', 'vivo', 'Vivo', 0, '2019-05-14 17:18:19', '2019-05-14 17:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_cus` int(11) NOT NULL,
  `cart_total_prod` int(11) NOT NULL,
  `cart_total_price` float NOT NULL,
  `cart_date` date NOT NULL,
  `cart_remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cart_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_cus`, `cart_total_prod`, `cart_total_price`, `cart_date`, `cart_remember_token`, `cart_status`, `created_at`, `updated_at`) VALUES
(4, 8, 2, 59980000, '2019-05-26', 'LDKe4gkAStvPDOxypletS4wpWmvYRhgC7ifcVVGp', 2, '2019-05-26 03:14:40', '2019-05-26 04:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `cartdetail`
--

CREATE TABLE `cartdetail` (
  `cartdt_id` int(11) NOT NULL,
  `cartdt_cart` int(11) NOT NULL,
  `cartdt_propt` int(11) NOT NULL,
  `cartdt_prod_quantity` int(11) NOT NULL,
  `cartdt_prod_unit_price` float NOT NULL,
  `cartdt_prod_promotion_price` float NOT NULL,
  `cartdt_total` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cartdetail`
--

INSERT INTO `cartdetail` (`cartdt_id`, `cartdt_cart`, `cartdt_propt`, `cartdt_prod_quantity`, `cartdt_prod_unit_price`, `cartdt_prod_promotion_price`, `cartdt_total`, `created_at`, `updated_at`) VALUES
(5, 4, 1, 1, 29990000, 29990000, 29990000, '2019-05-26 03:14:40', '2019-05-26 03:14:40'),
(6, 4, 2, 1, 29990000, 29990000, 29990000, '2019-05-26 03:14:40', '2019-05-26 03:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `cate_slug`, `cate_icon`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', 'dien-thoai', '4.png', '2019-05-20 03:59:50', '2019-05-13 08:01:07'),
(2, 'Máy tính bảng', 'may-tinh-bang', '8.png', '2019-05-20 04:00:11', '2019-05-13 08:29:55'),
(3, 'Laptop', 'laptop', '9.png', '2019-05-20 04:00:21', '2019-05-13 08:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cmt_id` int(11) NOT NULL,
  `cmt_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cmt_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cmt_content` text COLLATE utf8_unicode_ci NOT NULL,
  `cmt_voted` int(11) NOT NULL,
  `cmt_prod` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cmt_id`, `cmt_name`, `cmt_email`, `cmt_content`, `cmt_voted`, `cmt_prod`, `created_at`, `updated_at`) VALUES
(1, 'thang thai', 'thanglong2098@gmail.com', 'xin chào', 4, 1, '2019-05-21 03:11:48', '2019-05-21 03:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `cms_id` int(11) NOT NULL,
  `cms_month` int(11) NOT NULL,
  `cms_year` int(11) NOT NULL,
  `cms_empl` int(11) NOT NULL,
  `cms_total_price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cus_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cus_identity_card` int(11) NOT NULL,
  `cus_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_phone`, `cus_identity_card`, `cus_email`, `created_at`, `updated_at`) VALUES
(3, 'thăng', '328119182', 123456789, 'thanglong2098@gmail.com', '2019-05-24 02:56:44', '2019-05-24 02:56:44'),
(8, 'Nguyễn Phi Yến', '0929250409', 281161563, 'hiendaihuynh123@gmail.com', '2019-05-26 03:14:40', '2019-05-26 03:14:40'),
(9, 'Nguyễn Phi Yến', '328119182', 123456789, 'thanglong2098@gmail.com', '2019-05-26 05:01:17', '2019-05-26 05:01:17'),
(10, 'Nguyễn Phi Yến', '328119182', 123, 'thanglong2098@gmail.com', '2019-05-26 05:06:47', '2019-05-26 05:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `empl_id` int(11) NOT NULL,
  `empl_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empl_sex` tinyint(1) NOT NULL,
  `empl_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empl_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empl_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empl_birthday` date NOT NULL,
  `empl_identity_card` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `empl_start_date` date NOT NULL,
  `empl_basic_salary` float NOT NULL,
  `empl_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`empl_id`, `empl_name`, `empl_sex`, `empl_email`, `empl_phone`, `empl_address`, `empl_birthday`, `empl_identity_card`, `empl_start_date`, `empl_basic_salary`, `empl_status`, `created_at`, `updated_at`) VALUES
(8, 'thang thai', 0, 'thanglong2098@gmail.com', '0328119182', 'thu duc', '1998-04-25', '0147258369', '2018-05-08', 1000000, 1, '2019-05-12 21:13:11', '2019-05-12 21:35:01'),
(10, 'thang thai', 0, 'thanglong2098@gmail.com', '328119182', 'thu duc', '1998-04-25', '01472583693', '2018-05-08', 1000000, 0, '2019-05-12 21:36:27', '2019-05-12 21:36:27'),
(11, 'thang thai', 1, 'thanglong2098@gmail.com', '0328119182', 'thu duc', '1998-04-25', '014725836904', '2018-05-08', 20, 0, '2019-05-12 21:42:29', '2019-05-12 21:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `goodsexport`
--

CREATE TABLE `goodsexport` (
  `gdsex_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goodsexportdetail`
--

CREATE TABLE `goodsexportdetail` (
  `gdsexdt_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goodsimport`
--

CREATE TABLE `goodsimport` (
  `gdsim_id` int(11) NOT NULL,
  `gdsim_date` int(11) NOT NULL,
  `gdsim_invo` int(11) NOT NULL,
  `gdsim_prov` int(11) NOT NULL,
  `gdsim_total` int(11) NOT NULL,
  `gdsim_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goodsimportdetail`
--

CREATE TABLE `goodsimportdetail` (
  `gdsimdt_id` int(11) NOT NULL,
  `gdsimdt_gdsim` int(11) NOT NULL,
  `gdsimdt_prod` int(11) NOT NULL,
  `gdsimdt_unit` int(11) NOT NULL,
  `gdsimdt_lot` int(11) NOT NULL,
  `gdsimdt_quantity` int(11) NOT NULL,
  `gdsimdt_unit_price` int(11) NOT NULL,
  `gdsimdt_total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guarantee`
--

CREATE TABLE `guarantee` (
  `gtd_id` int(11) NOT NULL,
  `gtd_orders` int(11) NOT NULL,
  `gtd_propt` int(11) NOT NULL,
  `gtd_serial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gtd_content` text COLLATE utf8_unicode_ci NOT NULL,
  `gtd_empl_receive` int(11) NOT NULL,
  `gtd_date_receive` date NOT NULL,
  `gtd_empl_reimburse` int(11) DEFAULT NULL,
  `gtd_date_reimburse` date DEFAULT NULL,
  `gtd_status` tinyint(5) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invo_id` int(11) NOT NULL,
  `invo_date` date NOT NULL,
  `invo_prov` int(11) NOT NULL,
  `invo_empl` int(11) NOT NULL,
  `invo_total_prod` int(11) NOT NULL,
  `invo_total_price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoicedetail`
--

CREATE TABLE `invoicedetail` (
  `invdt_id` int(11) NOT NULL,
  `invdt_invo` int(11) NOT NULL,
  `invdt_prod` int(11) NOT NULL,
  `invdt_quantity` int(11) NOT NULL,
  `invdt_unit_price` float NOT NULL,
  `invdt_total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_user_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_empl` int(11) NOT NULL,
  `order_cus` int(11) NOT NULL,
  `order_total_prod` int(11) NOT NULL,
  `order_total_price` float NOT NULL,
  `order_remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `order_empl`, `order_cus`, `order_total_prod`, `order_total_price`, `order_remember_token`, `created_at`, `updated_at`) VALUES
(3, '2019-05-24', 8, 3, 3, 77970000, 'Ibtx0dkoqKjapvRlpLXk1T1eAzCa31I1qHvgRLsF', '2019-05-24 02:56:44', '2019-05-24 03:44:30'),
(4, '2019-05-26', 8, 8, 3, 77970000, 'PznHsmQInZTruo8Vrr0DfGCiqMgEotJcrgyMOFck', '2019-05-26 04:02:53', '2019-05-26 04:02:53'),
(5, '2019-05-26', 8, 9, 0, 0, 'J3DC96YZ0hA8WJLhXnN2klBQ89O0N9dj3ebxbZGc', '2019-05-26 05:01:17', '2019-05-26 05:01:17'),
(6, '2019-05-26', 8, 10, 0, 0, 'J3DC96YZ0hA8WJLhXnN2klBQ89O0N9dj3ebxbZGc', '2019-05-26 05:06:47', '2019-05-26 05:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetail`
--

CREATE TABLE `ordersdetail` (
  `orddt_id` int(11) NOT NULL,
  `orddt_order` int(11) NOT NULL,
  `orddt_propt` int(11) NOT NULL,
  `orddt_quantity` int(11) NOT NULL,
  `orddt_unit_price` float NOT NULL,
  `orddt_promotion_price` float NOT NULL,
  `orddt_total` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordersdetail`
--

INSERT INTO `ordersdetail` (`orddt_id`, `orddt_order`, `orddt_propt`, `orddt_quantity`, `orddt_unit_price`, `orddt_promotion_price`, `orddt_total`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 2, 29990000, 29990000, 59980000, '2019-05-24 02:56:44', '2019-05-24 03:58:38'),
(2, 3, 5, 1, 17990000, 17990000, 17990000, '2019-05-24 02:56:44', '2019-05-24 03:58:24'),
(3, 4, 1, 1, 29990000, 29990000, 29990000, '2019-05-26 04:02:53', '2019-05-26 04:02:53'),
(4, 4, 2, 1, 29990000, 29990000, 29990000, '2019-05-26 04:02:53', '2019-05-26 04:02:53'),
(5, 4, 4, 1, 17990000, 17990000, 17990000, '2019-05-26 04:02:53', '2019-05-26 04:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `perm_id` int(11) NOT NULL,
  `perm_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`perm_id`, `perm_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-05-12 04:45:50', '0000-00-00 00:00:00'),
(2, 'nhân viên bán hàng', '2019-05-28 08:21:27', '2019-05-28 08:21:27'),
(3, 'nhân viên bảo hành', '2019-05-28 08:21:27', '2019-05-28 08:21:27'),
(4, 'nhân viên kho', '2019-05-28 08:21:27', '2019-05-28 08:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prod_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prod_cate` int(11) NOT NULL,
  `prod_brand` int(11) NOT NULL,
  `prod_warranty_period` int(11) NOT NULL,
  `prod_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `prod_status` tinyint(4) NOT NULL,
  `prod_new` tinyint(1) NOT NULL DEFAULT '1',
  `prod_featured` tinyint(1) NOT NULL DEFAULT '1',
  `prod_poster` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_slug`, `prod_cate`, `prod_brand`, `prod_warranty_period`, `prod_detail`, `prod_status`, `prod_new`, `prod_featured`, `prod_poster`, `created_at`, `updated_at`) VALUES
(23, 'iPhone Xs Max', 'iphone-xs-max', 1, 1, 24, 'Màn hình:	OLED, 6.5\", Super Retina\r\nHệ điều hành:	iOS 12\r\nCamera sau:	Chính 12 MP & Phụ 12 MP\r\nCamera trước:	7 MP\r\nCPU:	Apple A12 Bionic 6 nhân\r\nRAM:	4 GB\r\nBộ nhớ trong:	64 GB\r\nThẻ SIM: Nano SIM & eSIM, Hỗ trợ 4G\r\nDung lượng pin:	3174 mAh, có sạc nhanh', 1, 1, 1, 'iphone-xs-max-bac-1-1-1-180x125.jpg', '2019-05-16 14:56:48', '2019-05-29 17:13:58'),
(27, 'Samsung Galaxy S10', 'samsung-galaxy-s10', 1, 2, 12, 'Màn hình:	Dynamic AMOLED, 6.1\", Quad HD+ (2K+)\r\nHệ điều hành:	Android 9.0 (Pie)\r\nCamera sau:	Chính 12 MP & Phụ 12 MP, 16 MP\r\nCamera trước:	10 MP\r\nCPU:	Exynos 9820 8 nhân 64-bit\r\nRAM:	8 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 512 GB\r\nThẻ SIM:		2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G\r\nDung lượng pin:	3400 mAh, có sạc nhanh', 1, 1, 1, 'samsung-galaxy-s10-white-400x400.jpg', '2019-05-22 04:31:41', '2019-05-28 12:09:37'),
(28, 'Iphone 7 32GB', 'iphone-7-32gb', 1, 1, 12, 'Màn hình:	LED-backlit IPS LCD, 4.7\", Retina HD\r\nHệ điều hành:	iOS 12\r\nCamera sau:	12 MP\r\nCamera trước: 7 MP\r\nCPU:	Apple A10 Fusion 4 nhân 64-bit\r\nRAM:	2 GB\r\nBộ nhớ trong:	32 GB\r\nThẻ SIM: 1 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	1960 mAh', 1, 1, 1, 'iphone-7-32gb-den-400x460.png', '2019-05-29 17:13:39', '2019-05-29 17:27:11'),
(29, 'iPhone 6s Plus 32GB', 'iphone-6s-plus-32gb', 1, 1, 12, 'Màn hình:	LED-backlit IPS LCD, 5.5\", Retina HD\r\nHệ điều hành:	iOS 12\r\nCamera sau:	12 MP\r\nCamera trước:	5 MP\r\nCPU:	Apple A9 2 nhân 64-bit\r\nRAM:	2 GB\r\nBộ nhớ trong:	32 GB\r\nThẻ SIM: 1 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	2750 mAh', 1, 1, 1, 'iphone-6s-plus-32gb-400x460.png', '2019-05-29 17:26:30', '2019-05-29 17:26:56'),
(34, 'iPhone Xs Max Full Option', 'iphone-xs-max-full-option', 1, 1, 12, 'Màn hình :	6.5 inchs, 1242 x 2688 Pixels\r\nCamera trước :	7.0 MP\r\nCamera sau :	Dual Camera 12.0 MP\r\nRAM :	4 GB\r\nBộ nhớ trong :	512 GB\r\nCPU :	Apple A12 Bionic, 6, Đang cập nhật\r\nGPU :	Apple GPU 4 nhân\r\nHệ điều hành :	iOS 12\r\nThẻ SIM :	eSIM và NanoSIM, 1 Sim', 0, 1, 1, 'iPhone-Xs-Max-gold.jpeg', '2019-05-29 17:37:11', '2019-05-29 17:37:11'),
(35, 'Xiaomi Mi 9 64GB (No.00574553)', 'xiaomi-mi-9-64gb-no00574553', 1, 3, 18, 'Màn hình :	6.39 inchs, 1080 x 2340 Pixels\r\nCamera trước :	20.0 MP\r\nCamera sau :	48 MP,16 MP +12 MP ( 3 camera)\r\nRAM :	6 GB\r\nBộ nhớ trong :	64 GB\r\nCPU :	Snap dragon 855, 8, 1x2.84Ghz+3x2.42Ghz+4x1.8Ghz\r\nGPU :	Adreno 640\r\nDung lượng pin :	3300mAh\r\nHệ điều hành :	Android 9\r\nThẻ SIM :	Nano SIM, 2 Sim', 0, 1, 1, 'xiaomi-mi-9-den-1.jpeg', '2019-05-29 17:40:45', '2019-05-29 17:40:45'),
(36, 'Xiaomi Mi 8 Lite 128GB (No.00516749)', 'xiaomi-mi-8-lite-128gb-no00516749', 1, 3, 18, 'Màn hình :	6.22 inches, 1080 x 2040 Pixel\r\nCamera trước :	24.0 MP\r\nCamera sau :	12.0 MP + 5.0 MP\r\nRAM :	6 GB\r\nBộ nhớ trong :	128 GB\r\nCPU :	SnapDragon 660, Octa-Core, 4x2.2 GHz Kryo 260 & 4x1.8 GHz Kryo 260\r\nGPU :	Adreno 512\r\nDung lượng pin :	3300mah\r\nHệ điều hành :	Android 8.1 Oreo (phiên bản Go)\r\nThẻ SIM :	Nano SIM, 2 Sim', 0, 1, 1, 'xiaomi-mi8-lite-1.jpg', '2019-05-29 17:43:17', '2019-05-29 17:43:17'),
(37, 'Xiaomi Pocophone F1 (No.00503336)', 'xiaomi-pocophone-f1-no00503336', 1, 3, 18, 'Màn hình :	6.18 inches, 1080 x 2280 Pixels\r\nCamera trước :	20.0 MP\r\nCamera sau :	Camera kép 12MP+5MP\r\nRAM :	6 GB\r\nBộ nhớ trong :	64 GB\r\nCPU :	Snapdragon 845, 8, 2.8 GHz\r\nGPU :	Adreno 630\r\nDung lượng pin :	4000 mAh\r\nHệ điều hành :	Android 8\r\nThẻ SIM :	Nano SIM, 2 Sim', 0, 1, 1, 'xiaomi-pocophone-f1-den-1.png', '2019-05-29 17:46:04', '2019-05-29 17:46:04'),
(38, 'Vivo V15 6GB-128GB (No.00554994)', 'vivo-v15-6gb-128gb-no00554994', 1, 7, 12, 'Màn hình :	6.53 inchs, 1080 x 2340 Pixels\r\nCamera trước :	32.0Mp\r\nCamera sau :	12Mp+8Mp+5Mp\r\nRAM :	6 GB\r\nBộ nhớ trong :	128 GB\r\nCPU :	MTK P70, 8, 2.1 GHz\r\nGPU :	ARM®Mail-G72\r\nDung lượng pin :	4000 mAh\r\nHệ điều hành :	Android 9\r\nThẻ SIM :	Nano SIM, 2 Sim', 0, 1, 1, 'vivo-v15-do-qh-1.jpeg', '2019-05-29 18:05:22', '2019-05-29 18:05:22'),
(39, 'Vivo V11i (No.00502766)', 'vivo-v11i-no00502766', 1, 7, 12, 'Màn hình :	6.3 inchs, 1080 x 2280 Pixels\r\nCamera trước :	25.0 MP\r\nCamera sau :	16.0 + 5.0 MP(Dual Camera)\r\nRAM :	4 GB\r\nBộ nhớ trong :	128 GB\r\nCPU :	Helio P60 -Octa-core 2.0GHz, 8, 2.0 GHz\r\nGPU :	Mali-G72 MP3\r\nDung lượng pin :	3315mAh\r\nHệ điều hành :	Android 8\r\nThẻ SIM :	Nano SIM, 2 Sim', 0, 1, 1, 'vivo-v11i-tim-0.jpg', '2019-05-29 18:16:33', '2019-05-29 18:16:33'),
(40, 'Vivo V9 Youth (No.00455497)', 'vivo-v9-youth-no00455497', 1, 7, 12, 'Màn hình :	6.3 inches, 1080 x 2280 Pixels\r\nCamera trước :	16.0 MP\r\nCamera sau :	16.0 MP + 2.0 MP\r\nRAM :	4 GB\r\nBộ nhớ trong :	32 GB\r\nCPU :	Qualcomm Snapdragon 450, 8, 1.8GHz\r\nGPU :	Adreno 506\r\nDung lượng pin :	3260mAh\r\nHệ điều hành :	Android 8.1\r\nThẻ SIM :	Nano SIM, 2 Sim', 0, 1, 1, 'vivo-v9-youth-den-1.jpeg', '2019-05-29 18:20:19', '2019-05-29 18:20:19'),
(41, 'Macbook Pro 13 inch 128GB (2017) (No.00367556)', 'macbook-pro-13-inch-128gb-2017-no00367556', 3, 1, 12, 'CPU :	Intel, Core i5\r\nRAM :	8 GB, LPDDR3\r\nỔ cứng :	SSD, 128 GB\r\nMàn hình :	13.3 inch, 2560 x 1600 pixels\r\nCard màn hình :	Intel Iris Plus Graphics 640\r\nCổng kết nối :	LAN : 802.11ac Wi-Fi wireless networking, WIFI : IEEE 802.11a/b/g/n compatible\r\nHệ điều hành :	Mac Os\r\nTrọng lượng :	1.37 kg', 0, 1, 1, 'mac_2017_bac.jpg', '2019-05-29 18:28:29', '2019-05-29 18:28:29'),
(42, 'Samsung Galaxy Tab S5E (No.00555888)', 'samsung-galaxy-tab-s5e-no00555888', 2, 2, 12, 'Màn hình :	10.5 inchs, 2560 x 1600 pixels\r\nCamera trước :	8.0 MP\r\nCamera sau :	13.0 MP\r\nCPU :	Qualcomm Snapdragon 670\r\nGPU :	Đang cập nhật\r\nRAM :	4 GB\r\nBộ nhớ trong :	64 GB\r\nKết nối :	Wi-Fi: 802.11 a/b/g/n/ac, Bluetooth: Bluetooth 5.0\r\nHệ điều hành :	Android One UI', 0, 1, 1, 'ss-galaxy-tab-s5e-vang-1.jpeg', '2019-05-29 18:31:26', '2019-05-29 18:31:26'),
(43, 'Samsung Galaxy Tab A Plus 8 (2019) (No.00555887)', 'samsung-galaxy-tab-a-plus-8-2019-no00555887', 2, 2, 12, 'Màn hình :	8.0 inchs, 1920 x 1200 pixels\r\nCamera trước :	5.0 MP\r\nCamera sau :	8.0 MP\r\nCPU :	Exynos 7904\r\nGPU :	G71 MP2\r\nRAM :	3 GB\r\nBộ nhớ trong :	32 MB\r\nKết nối :	Wi-Fi: Wi-Fi 802.11 b/g/n, Bluetooth: Bluetooth 4.2\r\nHệ điều hành :	Android 8.1', 0, 1, 1, 'ss-tab-a-plus-8-den-1.jpeg', '2019-05-29 18:33:49', '2019-05-29 18:33:49'),
(44, 'Huawei MediaPad T3 7.0 Prestige (No.00407106)', 'huawei-mediapad-t3-70-prestige-no00407106', 2, 6, 12, 'Màn hình :	7.0\", 1024 x 600 pixels\r\nCamera trước :	2 MP and fixed focus\r\nCamera sau :	2 MP and fixed focus\r\nCPU :	Quad-core 1.3 GHz processor Storage\r\nGPU :	Mali400\r\nBộ nhớ trong :	8 GB\r\nKết nối :	Hỗ trợ 3G: B2,B3,B5,B8, Wi-Fi: 802.11 b/g/n@2.4GHz, Bluetooth: Có\r\nThời gian sử dụng :	đang cập nhật\r\nHệ điều hành :	Android 7.0', 0, 1, 1, 'huawei-mediapad-t3-70-prestige-1.jpg', '2019-05-29 18:38:03', '2019-05-29 18:38:03'),
(45, 'Huawei MediaPad T5 10 (No.00532152)', 'huawei-mediapad-t5-10-no00532152', 2, 6, 12, 'Màn hình :	10.1 inchs, 1920 x 1200 pixels\r\nCamera trước :	2.0 MP\r\nCamera sau :	5.0 MP\r\nCPU :	HUAWEI Kirin 659\r\nGPU :	Mali-T830 MP2\r\nRAM :	3 GB\r\nBộ nhớ trong :	32 GB\r\nKết nối :	Wi-Fi: Wi-Fi 802.11 b/g/n, Dual-band, Wi-Fi Direct, Wi-Fi hotspot, Bluetooth: v4.1\r\nHệ điều hành :	Android 8', 0, 1, 1, 'huawei-mediapad-t510-0.jpeg', '2019-05-29 18:40:23', '2019-05-29 18:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `pimg_id` int(11) NOT NULL,
  `pimg_prod` int(11) NOT NULL,
  `pimg_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`pimg_id`, `pimg_prod`, `pimg_name`, `created_at`, `updated_at`) VALUES
(10, 27, 's10_dn1_1.jpg', '2019-05-22 04:31:41', '2019-05-22 04:31:41'),
(11, 27, 's10_tr1_1.jpg', '2019-05-22 04:31:41', '2019-05-22 04:31:41'),
(12, 27, 's10_xl1_1.jpg', '2019-05-22 04:31:41', '2019-05-22 04:31:41'),
(13, 23, 'iphone-xs-max-bac-4-180x125.jpg', '2019-05-22 11:21:28', '2019-05-22 11:26:14'),
(14, 23, 's10_tr1_1.jpg', '2019-05-22 11:23:36', '2019-05-22 11:23:36'),
(15, 28, 'iphone-7-32gb-den-400x460.png', '2019-05-29 17:13:39', '2019-05-29 17:13:39'),
(16, 29, 'iphone-6s-plus-32gb-400x460.png', '2019-05-29 17:26:30', '2019-05-29 17:26:30'),
(17, 29, 'ip_6s_rose_gold.jpeg', '2019-05-29 17:26:30', '2019-05-29 17:26:30'),
(18, 34, 'iPhone-Xs-Max-White.jpeg', '2019-05-29 17:37:11', '2019-05-29 17:37:11'),
(19, 35, 'xiaomi-mi-9-xanh-1.jpeg', '2019-05-29 17:40:45', '2019-05-29 17:40:45'),
(20, 36, 'xiaomi-mi8-lite-den-1.jpg', '2019-05-29 17:43:17', '2019-05-29 17:43:17'),
(21, 37, 'xiaomi-pocophone-f1-xanh-1.jpeg', '2019-05-29 17:46:04', '2019-05-29 17:46:04'),
(22, 38, 'vivo-v15-xanh-qh-1.png', '2019-05-29 18:05:22', '2019-05-29 18:05:22'),
(23, 39, 'vivo-v11i-xanh-0.jpg', '2019-05-29 18:16:33', '2019-05-29 18:16:33'),
(24, 40, 'vivo-v9-youth-vang-1.png', '2019-05-29 18:20:19', '2019-05-29 18:20:19'),
(25, 41, 'mac_2017_black.jpg', '2019-05-29 18:28:29', '2019-05-29 18:28:29'),
(26, 43, 'ss-tab-a-plus-8-xam-1.png', '2019-05-29 18:33:49', '2019-05-29 18:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

CREATE TABLE `product_options` (
  `propt_id` int(11) NOT NULL,
  `propt_prod` int(11) NOT NULL,
  `propt_color` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `propt_ram` float NOT NULL,
  `propt_rom` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `propt_price` float NOT NULL,
  `propt_quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_options`
--

INSERT INTO `product_options` (`propt_id`, `propt_prod`, `propt_color`, `propt_ram`, `propt_rom`, `propt_price`, `propt_quantity`, `created_at`, `updated_at`) VALUES
(1, 23, 'Xám', 4, '64 gb', 29990000, 5, '2019-05-21 11:33:18', '2019-05-22 13:11:39'),
(2, 23, 'Bạc', 4, '128 gb', 29990000, 5, '2019-05-21 11:33:18', '2019-05-22 13:11:39'),
(4, 27, 'Đen', 8, '128 gb', 17990000, 0, '2019-05-22 04:31:41', '2019-05-22 04:31:41'),
(5, 27, 'Trắng', 8, '128 gb', 17990000, 0, '2019-05-22 04:31:41', '2019-05-22 04:31:41'),
(6, 23, 'Gold', 4, '512 gb', 3000, 0, '2019-05-22 11:21:28', '2019-05-22 11:26:38'),
(8, 28, 'Đen', 2, '32 gb', 10240000, 0, '2019-05-29 17:13:39', '2019-05-29 17:13:39'),
(9, 29, 'Vàng Đồng', 2, '32 gb', 9990000, 0, '2019-05-29 17:26:30', '2019-05-29 17:26:30'),
(10, 29, 'Vàng Hồng', 2, '32 gb', 9790000, 0, '2019-05-29 17:26:30', '2019-05-29 17:26:30'),
(11, 34, 'Vàng', 4, '64 gb', 29990000, 0, '2019-05-29 17:37:11', '2019-05-29 17:37:11'),
(12, 34, 'Bạc', 4, '64 gb', 29990000, 0, '2019-05-29 17:37:11', '2019-05-29 17:37:11'),
(13, 34, 'Vàng', 4, '256 gb', 35990000, 0, '2019-05-29 17:37:11', '2019-05-29 17:37:11'),
(14, 34, 'Bạc', 4, '256 gb', 35990000, 0, '2019-05-29 17:37:11', '2019-05-29 17:37:11'),
(15, 34, 'Vàng', 4, '512 gb', 39990000, 0, '2019-05-29 17:37:11', '2019-05-29 17:37:11'),
(16, 34, 'Bạc', 4, '512 gb', 35990000, 0, '2019-05-29 17:37:11', '2019-05-29 17:37:11'),
(17, 35, 'Xanh Dương', 6, '64 gb', 11990000, 0, '2019-05-29 17:40:45', '2019-05-29 17:40:45'),
(18, 35, 'Đen', 6, '64 gb', 11990000, 0, '2019-05-29 17:40:45', '2019-05-29 17:40:45'),
(19, 36, 'Đen', 6, '128 gb', 7490000, 0, '2019-05-29 17:43:17', '2019-05-29 17:43:17'),
(20, 36, 'Xanh Dương', 6, '128 gb', 7490000, 0, '2019-05-29 17:43:17', '2019-05-29 17:43:17'),
(21, 37, 'Xanh Dương', 6, '64 gb', 7990000, 0, '2019-05-29 17:46:04', '2019-05-29 17:46:04'),
(22, 37, 'Đen', 6, '64 gb', 7990000, 0, '2019-05-29 17:46:04', '2019-05-29 17:46:04'),
(23, 38, 'Đỏ', 6, '128 gb', 7990000, 0, '2019-05-29 18:05:22', '2019-05-29 18:11:11'),
(24, 38, 'Xanh Dương', 6, '128 gb', 7990000, 0, '2019-05-29 18:05:22', '2019-05-29 18:05:22'),
(25, 39, 'Tím', 4, '128 gb', 5990000, 0, '2019-05-29 18:16:33', '2019-05-29 18:16:33'),
(26, 39, 'Xanh Dương', 4, '128 gb', 5990000, 0, '2019-05-29 18:16:33', '2019-05-29 18:16:33'),
(27, 40, 'Đen', 4, '32 gb', 3990000, 0, '2019-05-29 18:20:19', '2019-05-29 18:20:19'),
(28, 40, 'Vàng', 4, '32 gb', 3990000, 0, '2019-05-29 18:20:19', '2019-05-29 18:20:19'),
(29, 41, 'Đen', 8, '128 gb', 33990000, 0, '2019-05-29 18:28:29', '2019-05-29 18:28:29'),
(30, 41, 'Đen', 8, '256 gb', 38990000, 0, '2019-05-29 18:28:29', '2019-05-29 18:28:29'),
(31, 41, 'Bạc', 8, '128 gb', 33990000, 0, '2019-05-29 18:28:29', '2019-05-29 18:28:29'),
(32, 41, 'Bạc', 8, '256 gb', 38990000, 0, '2019-05-29 18:28:29', '2019-05-29 18:28:29'),
(33, 42, 'Gold', 4, '64 gb', 12490000, 0, '2019-05-29 18:31:26', '2019-05-29 18:31:26'),
(34, 42, 'Bạc', 4, '64 gb', 12490000, 0, '2019-05-29 18:31:26', '2019-05-29 18:31:26'),
(35, 43, 'Đen', 3, '32 gb', 6990000, 0, '2019-05-29 18:33:49', '2019-05-29 18:33:49'),
(36, 43, 'Xám', 3, '32 gb', 6990000, 0, '2019-05-29 18:33:49', '2019-05-29 18:33:49'),
(37, 44, 'Gold', 2, '8 gb', 2090000, 0, '2019-05-29 18:38:03', '2019-05-29 18:38:03'),
(38, 45, 'Đen', 3, '32 gb', 5690000, 0, '2019-05-29 18:40:23', '2019-05-29 18:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `prom_id` int(11) NOT NULL,
  `prom_name` int(11) NOT NULL,
  `prom_propt` int(11) NOT NULL,
  `prom_start_date` datetime NOT NULL,
  `prom_end_date` datetime NOT NULL,
  `prom_percent` float NOT NULL,
  `prom_unit_price` float NOT NULL,
  `prom_promtion_price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `prov_id` int(11) NOT NULL,
  `prov_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prov_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prov_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prov_fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prov_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prov_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`prov_id`, `prov_name`, `prov_email`, `prov_phone`, `prov_fax`, `prov_address`, `prov_desc`, `created_at`, `updated_at`) VALUES
(1, 'TRANG VÀNG VIỆT NAM', 'contact@trangvangvietnam.com', '1900 54 55 80', '+84 (024) 3636 9371', 'Tầng 6, Tòa Nhà Vinafood1, 94 Lương Yên, P. Bạch Đằng, Q. Hai Bà Trưng, Hà Nội', 'Trụ sở Hà Nội', '2019-05-17 12:39:59', '2019-05-17 12:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `slide_id` int(11) NOT NULL,
  `slide_caption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`slide_id`, `slide_caption`, `slide_img`, `slide_status`, `created_at`, `updated_at`) VALUES
(1, 'Xin chào', '800-300-800x300-(1).png', 1, '2019-05-21 10:25:57', '2019-05-21 10:25:57'),
(2, 'Quẩy lên', '800-300-800x300-(2).png', 1, '2019-05-21 10:25:57', '2019-05-21 10:25:57'),
(3, 'Chào cả nhà', '800-300-800x300-(7).png', 1, '2019-05-21 10:25:57', '2019-05-21 10:25:57'),
(4, 'Lên nóc nhà', 'big-Oppo-800-300-800x300-(2).png', 1, '2019-05-21 10:25:57', '2019-05-21 10:25:57'),
(5, 'Chúc ngủ ngon', 'huawei-P30-800-300-800x300-(1).png', 1, '2019-05-21 10:25:57', '2019-05-21 10:25:57'),
(6, 'Lễ lộc đi mua thôi', 'op-lung-samsung-800-300-800x300.png', 1, '2019-05-21 10:25:57', '2019-05-21 10:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_prod` int(11) NOT NULL,
  `stock_prov` int(11) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `stock_mfg` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empl_id` int(11) NOT NULL,
  `perm_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `empl_id`, `perm_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
('admin', '$2y$10$lT/JBapfQt0LdVNnjVax1exxL/QxE3etpABXvhQfE/IOSOb4jVdfC', 8, 1, 0, 'QNrK2SsEBI6CmfiBPxWpFcUtSoYQDPpqeigkiIdt9iHxwqmpfce7OKJ5B5Vg', NULL, NULL),
('nv10', '$2y$10$fp6FM2ZFO/sd9ZCBISDwmODnta4ILoWKJC8izJZKUdpTjwWLtyIw2', 10, 2, 0, '6EvC0M046TGobcmm9ocxbuzrA30xp2mxKTsUx03H', '2019-05-28 09:24:45', '2019-05-28 11:05:14'),
('nv11', '$2y$10$FTdJq5JRhwRJgWV4APBsQ.N/dUhnKaCOX3sed4tQ4AT3Y3ek/Y1DK', 11, 3, 0, '6EvC0M046TGobcmm9ocxbuzrA30xp2mxKTsUx03H', '2019-05-28 10:42:29', '2019-05-28 10:42:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD PRIMARY KEY (`cartdt_id`),
  ADD KEY `cartdt_cart` (`cartdt_cart`),
  ADD KEY `cartdt_prod` (`cartdt_propt`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmt_id`),
  ADD KEY `cmt_prod` (`cmt_prod`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`cms_id`),
  ADD KEY `cms_empl` (`cms_empl`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`empl_id`),
  ADD UNIQUE KEY `empl_identity_card` (`empl_identity_card`);

--
-- Indexes for table `goodsexport`
--
ALTER TABLE `goodsexport`
  ADD PRIMARY KEY (`gdsex_id`);

--
-- Indexes for table `guarantee`
--
ALTER TABLE `guarantee`
  ADD PRIMARY KEY (`gtd_id`),
  ADD KEY `gtd_orders` (`gtd_orders`),
  ADD KEY `gtd_prod` (`gtd_propt`),
  ADD KEY `gtd_empl_receive` (`gtd_empl_receive`),
  ADD KEY `gtd_empl_reimburse` (`gtd_empl_reimburse`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invo_id`),
  ADD KEY `invo_empl` (`invo_empl`),
  ADD KEY `invo_prov` (`invo_prov`);

--
-- Indexes for table `invoicedetail`
--
ALTER TABLE `invoicedetail`
  ADD PRIMARY KEY (`invdt_id`),
  ADD KEY `invdt_invo` (`invdt_invo`),
  ADD KEY `invdt_prod` (`invdt_prod`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_cus` (`order_cus`),
  ADD KEY `order_empl` (`order_empl`);

--
-- Indexes for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD PRIMARY KEY (`orddt_id`),
  ADD KEY `orddt_order` (`orddt_order`),
  ADD KEY `orddt_prod` (`orddt_propt`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`perm_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD UNIQUE KEY `prod_slug` (`prod_slug`,`prod_cate`,`prod_brand`),
  ADD KEY `prod_brand` (`prod_brand`),
  ADD KEY `prod_cate` (`prod_cate`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`pimg_id`),
  ADD KEY `pimg_prod` (`pimg_prod`);

--
-- Indexes for table `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`propt_id`),
  ADD UNIQUE KEY `propt_prod` (`propt_prod`,`propt_color`,`propt_ram`,`propt_rom`),
  ADD KEY `prquan_prod` (`propt_prod`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`prom_id`),
  ADD KEY `prom_prod` (`prom_propt`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`prov_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `stock_prod` (`stock_prod`),
  ADD KEY `stock_prov` (`stock_prov`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `empl_id` (`empl_id`),
  ADD KEY `perm_id` (`perm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cartdetail`
--
ALTER TABLE `cartdetail`
  MODIFY `cartdt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `cms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `empl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `goodsexport`
--
ALTER TABLE `goodsexport`
  MODIFY `gdsex_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guarantee`
--
ALTER TABLE `guarantee`
  MODIFY `gtd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoicedetail`
--
ALTER TABLE `invoicedetail`
  MODIFY `invdt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  MODIFY `orddt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `perm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `pimg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_options`
--
ALTER TABLE `product_options`
  MODIFY `propt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `prom_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `prov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD CONSTRAINT `cartdetail_ibfk_1` FOREIGN KEY (`cartdt_cart`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cartdetail_ibfk_2` FOREIGN KEY (`cartdt_propt`) REFERENCES `product_options` (`propt_id`);

--
-- Constraints for table `guarantee`
--
ALTER TABLE `guarantee`
  ADD CONSTRAINT `guarantee_ibfk_1` FOREIGN KEY (`gtd_propt`) REFERENCES `product_options` (`propt_id`),
  ADD CONSTRAINT `guarantee_ibfk_2` FOREIGN KEY (`gtd_orders`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `guarantee_ibfk_3` FOREIGN KEY (`gtd_empl_receive`) REFERENCES `employees` (`empl_id`),
  ADD CONSTRAINT `guarantee_ibfk_4` FOREIGN KEY (`gtd_empl_reimburse`) REFERENCES `employees` (`empl_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`invo_prov`) REFERENCES `provider` (`prov_id`);

--
-- Constraints for table `invoicedetail`
--
ALTER TABLE `invoicedetail`
  ADD CONSTRAINT `invoicedetail_ibfk_1` FOREIGN KEY (`invdt_invo`) REFERENCES `invoice` (`invo_id`),
  ADD CONSTRAINT `invoicedetail_ibfk_2` FOREIGN KEY (`invdt_prod`) REFERENCES `product` (`prod_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_cus`) REFERENCES `customer` (`cus_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_empl`) REFERENCES `employees` (`empl_id`);

--
-- Constraints for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD CONSTRAINT `ordersdetail_ibfk_1` FOREIGN KEY (`orddt_order`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ordersdetail_ibfk_2` FOREIGN KEY (`orddt_propt`) REFERENCES `product_options` (`propt_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`prod_cate`) REFERENCES `category` (`cate_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`prod_brand`) REFERENCES `brand` (`brand_id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`pimg_prod`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_ibfk_1` FOREIGN KEY (`propt_prod`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE;

--
-- Constraints for table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`prom_propt`) REFERENCES `product_options` (`propt_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`perm_id`) REFERENCES `permission` (`perm_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`empl_id`) REFERENCES `employees` (`empl_id`);
