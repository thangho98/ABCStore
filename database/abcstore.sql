-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 28, 2019 lúc 02:15 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `abcstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
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
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_slug`, `brand_desc`, `brand_famous`, `created_at`, `updated_at`) VALUES
(1, 'iPhone', 'iphone', 'Apple', 1, '2019-05-13 09:55:56', '2019-05-13 02:55:56'),
(2, 'Galaxy', 'galaxy', 'Samsung', 1, '2019-05-13 02:56:25', '2019-05-13 02:56:25'),
(3, 'Mi', 'mi', 'Xiaomi', 0, '2019-05-13 03:02:42', '2019-05-13 03:02:42'),
(6, 'Huawei', 'huawei', 'Huawei', 1, '2019-05-13 04:43:55', '2019-05-13 04:43:55'),
(7, 'Vivo', 'vivo', 'Vivo', 0, '2019-05-14 17:18:19', '2019-05-14 17:18:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
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
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_cus`, `cart_total_prod`, `cart_total_price`, `cart_date`, `cart_remember_token`, `cart_status`, `created_at`, `updated_at`) VALUES
(4, 8, 2, 59980000, '2019-05-26', 'LDKe4gkAStvPDOxypletS4wpWmvYRhgC7ifcVVGp', 2, '2019-05-26 03:14:40', '2019-05-26 04:02:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cartdetail`
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
-- Đang đổ dữ liệu cho bảng `cartdetail`
--

INSERT INTO `cartdetail` (`cartdt_id`, `cartdt_cart`, `cartdt_propt`, `cartdt_prod_quantity`, `cartdt_prod_unit_price`, `cartdt_prod_promotion_price`, `cartdt_total`, `created_at`, `updated_at`) VALUES
(5, 4, 1, 1, 29990000, 29990000, 29990000, '2019-05-26 03:14:40', '2019-05-26 03:14:40'),
(6, 4, 2, 1, 29990000, 29990000, 29990000, '2019-05-26 03:14:40', '2019-05-26 03:14:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
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
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `cate_slug`, `cate_icon`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', 'dien-thoai', '4.png', '2019-05-20 03:59:50', '2019-05-13 08:01:07'),
(2, 'Máy tính bảng', 'may-tinh-bang', '8.png', '2019-05-20 04:00:11', '2019-05-13 08:29:55'),
(3, 'Laptop', 'laptop', '9.png', '2019-05-20 04:00:21', '2019-05-13 08:30:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
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
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`cmt_id`, `cmt_name`, `cmt_email`, `cmt_content`, `cmt_voted`, `cmt_prod`, `created_at`, `updated_at`) VALUES
(1, 'thang thai', 'thanglong2098@gmail.com', 'xin chào', 4, 1, '2019-05-21 03:11:48', '2019-05-21 03:15:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `commission`
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
-- Cấu trúc bảng cho bảng `customer`
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
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_phone`, `cus_identity_card`, `cus_email`, `created_at`, `updated_at`) VALUES
(3, 'thăng', '328119182', 123456789, 'thanglong2098@gmail.com', '2019-05-24 02:56:44', '2019-05-24 02:56:44'),
(8, 'Nguyễn Phi Yến', '0929250409', 281161563, 'hiendaihuynh123@gmail.com', '2019-05-26 03:14:40', '2019-05-26 03:14:40'),
(9, 'Nguyễn Phi Yến', '328119182', 123456789, 'thanglong2098@gmail.com', '2019-05-26 05:01:17', '2019-05-26 05:01:17'),
(10, 'Nguyễn Phi Yến', '328119182', 123, 'thanglong2098@gmail.com', '2019-05-26 05:06:47', '2019-05-26 05:06:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
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
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`empl_id`, `empl_name`, `empl_sex`, `empl_email`, `empl_phone`, `empl_address`, `empl_birthday`, `empl_identity_card`, `empl_start_date`, `empl_basic_salary`, `empl_status`, `created_at`, `updated_at`) VALUES
(8, 'thang thai', 0, 'thanglong2098@gmail.com', '0328119182', 'thu duc', '1998-04-25', '0147258369', '2018-05-08', 1000000, 1, '2019-05-12 21:13:11', '2019-05-12 21:35:01'),
(10, 'thang thai', 0, 'thanglong2098@gmail.com', '328119182', 'thu duc', '1998-04-25', '01472583693', '2018-05-08', 1000000, 0, '2019-05-12 21:36:27', '2019-05-12 21:36:27'),
(11, 'thang thai', 1, 'thanglong2098@gmail.com', '0328119182', 'thu duc', '1998-04-25', '014725836904', '2018-05-08', 20, 0, '2019-05-12 21:42:29', '2019-05-12 21:42:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `goodsexport`
--

CREATE TABLE `goodsexport` (
  `gdsex_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `goodsexportdetail`
--

CREATE TABLE `goodsexportdetail` (
  `gdsexdt_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `goodsimport`
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
-- Cấu trúc bảng cho bảng `goodsimportdetail`
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
-- Cấu trúc bảng cho bảng `guarantee`
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
-- Cấu trúc bảng cho bảng `invoice`
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
-- Cấu trúc bảng cho bảng `invoicedetail`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_user_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
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
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `order_empl`, `order_cus`, `order_total_prod`, `order_total_price`, `order_remember_token`, `created_at`, `updated_at`) VALUES
(3, '2019-05-24', 8, 3, 3, 77970000, 'Ibtx0dkoqKjapvRlpLXk1T1eAzCa31I1qHvgRLsF', '2019-05-24 02:56:44', '2019-05-24 03:44:30'),
(4, '2019-05-26', 8, 8, 3, 77970000, 'PznHsmQInZTruo8Vrr0DfGCiqMgEotJcrgyMOFck', '2019-05-26 04:02:53', '2019-05-26 04:02:53'),
(5, '2019-05-26', 8, 9, 0, 0, 'J3DC96YZ0hA8WJLhXnN2klBQ89O0N9dj3ebxbZGc', '2019-05-26 05:01:17', '2019-05-26 05:01:17'),
(6, '2019-05-26', 8, 10, 0, 0, 'J3DC96YZ0hA8WJLhXnN2klBQ89O0N9dj3ebxbZGc', '2019-05-26 05:06:47', '2019-05-26 05:06:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordersdetail`
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
-- Đang đổ dữ liệu cho bảng `ordersdetail`
--

INSERT INTO `ordersdetail` (`orddt_id`, `orddt_order`, `orddt_propt`, `orddt_quantity`, `orddt_unit_price`, `orddt_promotion_price`, `orddt_total`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 2, 29990000, 29990000, 59980000, '2019-05-24 02:56:44', '2019-05-24 03:58:38'),
(2, 3, 5, 1, 17990000, 17990000, 17990000, '2019-05-24 02:56:44', '2019-05-24 03:58:24'),
(3, 4, 1, 1, 29990000, 29990000, 29990000, '2019-05-26 04:02:53', '2019-05-26 04:02:53'),
(4, 4, 2, 1, 29990000, 29990000, 29990000, '2019-05-26 04:02:53', '2019-05-26 04:02:53'),
(5, 4, 4, 1, 17990000, 17990000, 17990000, '2019-05-26 04:02:53', '2019-05-26 04:02:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission`
--

CREATE TABLE `permission` (
  `perm_id` int(11) NOT NULL,
  `perm_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission`
--

INSERT INTO `permission` (`perm_id`, `perm_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-05-12 04:45:50', '0000-00-00 00:00:00'),
(2, 'nhân viên bán hàng', '2019-05-28 08:21:27', '2019-05-28 08:21:27'),
(3, 'nhân viên bảo hành', '2019-05-28 08:21:27', '2019-05-28 08:21:27'),
(4, 'nhân viên kho', '2019-05-28 08:21:27', '2019-05-28 08:21:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
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
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_slug`, `prod_cate`, `prod_brand`, `prod_warranty_period`, `prod_detail`, `prod_status`, `prod_new`, `prod_featured`, `prod_poster`, `created_at`, `updated_at`) VALUES
(12, 'Samsung Galaxy A50', 'samsung-galaxy-a50', 2, 3, 12, 'Kích thước	158.5 x 74.5 x 7.7mm\r\nBộ nhớ đệm / Ram	64 GB, 4 GB RAM\r\nBộ nhớ trong	64 GB\r\nLoại màn hình	sAMOLED FHD+\r\nKích thước màn hình	6.4 inches\r\nĐộ phân giải màn hình	1080 x 2220 pixels\r\nHệ điều hành	Android\r\nPhiên bản hệ điều hành	Android v9.0 (Pie)\r\nChipset	Samsung Exynos 9 Octa 9610\r\nCPU	Octa Core 2.3GHz', 1, 1, 1, 'samsung-galaxy-a10-do-1-180x125.jpg', '2019-05-16 14:56:45', '2019-05-28 12:09:45'),
(23, 'iPhone Xs Max', 'iphone-xs-max', 3, 1, 24, 'Màn hình:	OLED, 6.5\", Super Retina\r\nHệ điều hành:	iOS 12\r\nCamera sau:	Chính 12 MP & Phụ 12 MP\r\nCamera trước:	7 MP\r\nCPU:	Apple A12 Bionic 6 nhân\r\nRAM:	4 GB\r\nBộ nhớ trong:	64 GB\r\nThẻ SIM: Nano SIM & eSIM, Hỗ trợ 4G\r\nDung lượng pin:	3174 mAh, có sạc nhanh', 1, 1, 1, 'iphone-xs-max-bac-1-1-1-180x125.jpg', '2019-05-16 14:56:48', '2019-05-28 12:09:48'),
(27, 'Samsung Galaxy S10', 'samsung-galaxy-s10', 1, 2, 12, 'Màn hình:	Dynamic AMOLED, 6.1\", Quad HD+ (2K+)\r\nHệ điều hành:	Android 9.0 (Pie)\r\nCamera sau:	Chính 12 MP & Phụ 12 MP, 16 MP\r\nCamera trước:	10 MP\r\nCPU:	Exynos 9820 8 nhân 64-bit\r\nRAM:	8 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 512 GB\r\nThẻ SIM:		2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G\r\nDung lượng pin:	3400 mAh, có sạc nhanh', 1, 1, 1, 'samsung-galaxy-s10-white-400x400.jpg', '2019-05-22 04:31:41', '2019-05-28 12:09:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `pimg_id` int(11) NOT NULL,
  `pimg_prod` int(11) NOT NULL,
  `pimg_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`pimg_id`, `pimg_prod`, `pimg_name`, `created_at`, `updated_at`) VALUES
(10, 27, 's10_dn1_1.jpg', '2019-05-22 04:31:41', '2019-05-22 04:31:41'),
(11, 27, 's10_tr1_1.jpg', '2019-05-22 04:31:41', '2019-05-22 04:31:41'),
(12, 27, 's10_xl1_1.jpg', '2019-05-22 04:31:41', '2019-05-22 04:31:41'),
(13, 23, 'iphone-xs-max-bac-4-180x125.jpg', '2019-05-22 11:21:28', '2019-05-22 11:26:14'),
(14, 23, 's10_tr1_1.jpg', '2019-05-22 11:23:36', '2019-05-22 11:23:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_options`
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
-- Đang đổ dữ liệu cho bảng `product_options`
--

INSERT INTO `product_options` (`propt_id`, `propt_prod`, `propt_color`, `propt_ram`, `propt_rom`, `propt_price`, `propt_quantity`, `created_at`, `updated_at`) VALUES
(1, 23, 'Xám', 4, '64 gb', 29990000, 5, '2019-05-21 11:33:18', '2019-05-22 13:11:39'),
(2, 23, 'Bạc', 4, '128 gb', 29990000, 5, '2019-05-21 11:33:18', '2019-05-22 13:11:39'),
(4, 27, 'Đen', 8, '128 gb', 17990000, 0, '2019-05-22 04:31:41', '2019-05-22 04:31:41'),
(5, 27, 'Trắng', 8, '128 gb', 17990000, 0, '2019-05-22 04:31:41', '2019-05-22 04:31:41'),
(6, 23, 'Gold', 4, '512 gb', 3000, 0, '2019-05-22 11:21:28', '2019-05-22 11:26:38'),
(7, 12, 'Xanh Dương', 6, '64 gb', 6000000, 0, '2019-05-28 12:05:19', '2019-05-28 12:05:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
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
-- Cấu trúc bảng cho bảng `provider`
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
-- Đang đổ dữ liệu cho bảng `provider`
--

INSERT INTO `provider` (`prov_id`, `prov_name`, `prov_email`, `prov_phone`, `prov_fax`, `prov_address`, `prov_desc`, `created_at`, `updated_at`) VALUES
(1, 'TRANG VÀNG VIỆT NAM', 'contact@trangvangvietnam.com', '1900 54 55 80', '+84 (024) 3636 9371', 'Tầng 6, Tòa Nhà Vinafood1, 94 Lương Yên, P. Bạch Đằng, Q. Hai Bà Trưng, Hà Nội', 'Trụ sở Hà Nội', '2019-05-17 12:39:59', '2019-05-17 12:39:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
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
-- Đang đổ dữ liệu cho bảng `slide`
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
-- Cấu trúc bảng cho bảng `stock`
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
-- Cấu trúc bảng cho bảng `user`
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
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`, `empl_id`, `perm_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
('admin', '$2y$10$lT/JBapfQt0LdVNnjVax1exxL/QxE3etpABXvhQfE/IOSOb4jVdfC', 8, 1, 0, 'QNrK2SsEBI6CmfiBPxWpFcUtSoYQDPpqeigkiIdt9iHxwqmpfce7OKJ5B5Vg', NULL, NULL),
('nv10', '$2y$10$fp6FM2ZFO/sd9ZCBISDwmODnta4ILoWKJC8izJZKUdpTjwWLtyIw2', 10, 2, 0, '6EvC0M046TGobcmm9ocxbuzrA30xp2mxKTsUx03H', '2019-05-28 09:24:45', '2019-05-28 11:05:14'),
('nv11', '$2y$10$FTdJq5JRhwRJgWV4APBsQ.N/dUhnKaCOX3sed4tQ4AT3Y3ek/Y1DK', 11, 3, 0, '6EvC0M046TGobcmm9ocxbuzrA30xp2mxKTsUx03H', '2019-05-28 10:42:29', '2019-05-28 10:42:29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD PRIMARY KEY (`cartdt_id`),
  ADD KEY `cartdt_cart` (`cartdt_cart`),
  ADD KEY `cartdt_prod` (`cartdt_propt`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmt_id`),
  ADD KEY `cmt_prod` (`cmt_prod`);

--
-- Chỉ mục cho bảng `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`cms_id`),
  ADD KEY `cms_empl` (`cms_empl`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`empl_id`),
  ADD UNIQUE KEY `empl_identity_card` (`empl_identity_card`);

--
-- Chỉ mục cho bảng `goodsexport`
--
ALTER TABLE `goodsexport`
  ADD PRIMARY KEY (`gdsex_id`);

--
-- Chỉ mục cho bảng `guarantee`
--
ALTER TABLE `guarantee`
  ADD PRIMARY KEY (`gtd_id`),
  ADD KEY `gtd_orders` (`gtd_orders`),
  ADD KEY `gtd_prod` (`gtd_propt`),
  ADD KEY `gtd_empl_receive` (`gtd_empl_receive`),
  ADD KEY `gtd_empl_reimburse` (`gtd_empl_reimburse`);

--
-- Chỉ mục cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invo_id`),
  ADD KEY `invo_empl` (`invo_empl`),
  ADD KEY `invo_prov` (`invo_prov`);

--
-- Chỉ mục cho bảng `invoicedetail`
--
ALTER TABLE `invoicedetail`
  ADD PRIMARY KEY (`invdt_id`),
  ADD KEY `invdt_invo` (`invdt_invo`),
  ADD KEY `invdt_prod` (`invdt_prod`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_cus` (`order_cus`),
  ADD KEY `order_empl` (`order_empl`);

--
-- Chỉ mục cho bảng `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD PRIMARY KEY (`orddt_id`),
  ADD KEY `orddt_order` (`orddt_order`),
  ADD KEY `orddt_prod` (`orddt_propt`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`perm_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD UNIQUE KEY `prod_slug` (`prod_slug`,`prod_cate`,`prod_brand`),
  ADD KEY `prod_brand` (`prod_brand`),
  ADD KEY `prod_cate` (`prod_cate`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`pimg_id`),
  ADD KEY `pimg_prod` (`pimg_prod`);

--
-- Chỉ mục cho bảng `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`propt_id`),
  ADD UNIQUE KEY `propt_prod` (`propt_prod`,`propt_color`,`propt_ram`,`propt_rom`),
  ADD KEY `prquan_prod` (`propt_prod`);

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`prom_id`),
  ADD KEY `prom_prod` (`prom_propt`);

--
-- Chỉ mục cho bảng `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`prov_id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- Chỉ mục cho bảng `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `stock_prod` (`stock_prod`),
  ADD KEY `stock_prov` (`stock_prov`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `empl_id` (`empl_id`),
  ADD KEY `perm_id` (`perm_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cartdetail`
--
ALTER TABLE `cartdetail`
  MODIFY `cartdt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `commission`
--
ALTER TABLE `commission`
  MODIFY `cms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `empl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `goodsexport`
--
ALTER TABLE `goodsexport`
  MODIFY `gdsex_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `guarantee`
--
ALTER TABLE `guarantee`
  MODIFY `gtd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `invoicedetail`
--
ALTER TABLE `invoicedetail`
  MODIFY `invdt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `ordersdetail`
--
ALTER TABLE `ordersdetail`
  MODIFY `orddt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `permission`
--
ALTER TABLE `permission`
  MODIFY `perm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `pimg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `product_options`
--
ALTER TABLE `product_options`
  MODIFY `propt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `prom_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `provider`
--
ALTER TABLE `provider`
  MODIFY `prov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD CONSTRAINT `cartdetail_ibfk_1` FOREIGN KEY (`cartdt_cart`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cartdetail_ibfk_2` FOREIGN KEY (`cartdt_propt`) REFERENCES `product_options` (`propt_id`);

--
-- Các ràng buộc cho bảng `guarantee`
--
ALTER TABLE `guarantee`
  ADD CONSTRAINT `guarantee_ibfk_1` FOREIGN KEY (`gtd_propt`) REFERENCES `product_options` (`propt_id`),
  ADD CONSTRAINT `guarantee_ibfk_2` FOREIGN KEY (`gtd_orders`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `guarantee_ibfk_3` FOREIGN KEY (`gtd_empl_receive`) REFERENCES `employees` (`empl_id`),
  ADD CONSTRAINT `guarantee_ibfk_4` FOREIGN KEY (`gtd_empl_reimburse`) REFERENCES `employees` (`empl_id`);

--
-- Các ràng buộc cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`invo_prov`) REFERENCES `provider` (`prov_id`);

--
-- Các ràng buộc cho bảng `invoicedetail`
--
ALTER TABLE `invoicedetail`
  ADD CONSTRAINT `invoicedetail_ibfk_1` FOREIGN KEY (`invdt_invo`) REFERENCES `invoice` (`invo_id`),
  ADD CONSTRAINT `invoicedetail_ibfk_2` FOREIGN KEY (`invdt_prod`) REFERENCES `product` (`prod_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_cus`) REFERENCES `customer` (`cus_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_empl`) REFERENCES `employees` (`empl_id`);

--
-- Các ràng buộc cho bảng `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD CONSTRAINT `ordersdetail_ibfk_1` FOREIGN KEY (`orddt_order`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ordersdetail_ibfk_2` FOREIGN KEY (`orddt_propt`) REFERENCES `product_options` (`propt_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`prod_cate`) REFERENCES `category` (`cate_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`prod_brand`) REFERENCES `brand` (`brand_id`);

--
-- Các ràng buộc cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`pimg_prod`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_ibfk_1` FOREIGN KEY (`propt_prod`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`prom_propt`) REFERENCES `product_options` (`propt_id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`perm_id`) REFERENCES `permission` (`perm_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`empl_id`) REFERENCES `employees` (`empl_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
