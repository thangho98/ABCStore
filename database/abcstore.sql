-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 13, 2019 lúc 12:24 PM
-- Phiên bản máy phục vụ: 10.3.15-MariaDB
-- Phiên bản PHP: 7.3.6

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

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `revenue_month` (IN `year` INT)  NO SQL
SELECT * FROM revenue WHERE revenue.reve_year = year$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `revenue_quarter` (IN `year` INT)  NO SQL
SELECT reve_quarter, revenue.reve_year, SUM(revenue.reve_sale) AS reve_sale, SUM(revenue.reve_buy) AS reve_buy, SUM(revenue.reve_salary) AS reve_salary, SUM(revenue.reve_income) AS reve_income
FROM revenue
WHERE revenue.reve_year = year
GROUP BY revenue.reve_quarter$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `revenue_year` ()  NO SQL
SELECT revenue.reve_year, SUM(revenue.reve_sale) AS reve_sale, SUM(revenue.reve_buy) AS reve_buy, SUM(revenue.reve_salary) AS reve_salary, SUM(revenue.reve_income) AS reve_income
FROM revenue
GROUP BY revenue.reve_year$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `statistics_product_all` ()  NO SQL
SELECT product.prod_id, product.prod_name, SUM(ordersdetail.orddt_quantity) AS quantity, SUM(ordersdetail.orddt_promotion_price) AS price
FROM product, product_options, ordersdetail
WHERE product.prod_id = product_options.propt_prod AND product_options.propt_id = ordersdetail.orddt_propt
GROUP BY product.prod_id, product.prod_name
ORDER BY quantity DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `statistics_product_month` (IN `month` INT, IN `year` INT)  NO SQL
SELECT product.prod_id, product.prod_name, SUM(ordersdetail.orddt_quantity) AS quantity, SUM(ordersdetail.orddt_promotion_price) AS price
FROM product, product_options, ordersdetail, orders
WHERE product.prod_id = product_options.propt_prod AND product_options.propt_id = ordersdetail.orddt_propt AND orders.order_id = ordersdetail.orddt_order AND month(orders.order_date) = month AND year(orders.order_date) = year
GROUP BY product.prod_id, product.prod_name
ORDER BY quantity DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `statistics_product_quarter` (IN `quarter` INT, IN `year` INT)  NO SQL
SELECT product.prod_id, product.prod_name, SUM(ordersdetail.orddt_quantity) AS quantity, SUM(ordersdetail.orddt_promotion_price) AS price
FROM product, product_options, ordersdetail, orders
WHERE product.prod_id = product_options.propt_prod AND product_options.propt_id = ordersdetail.orddt_propt AND orders.order_id = ordersdetail.orddt_order AND quarter(orders.order_date) = quarter AND year(orders.order_date) = year
GROUP BY product.prod_id, product.prod_name
ORDER BY quantity DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `statistics_product_year` (IN `year` INT)  NO SQL
SELECT product.prod_id, product.prod_name, SUM(ordersdetail.orddt_quantity) AS quantity, SUM(ordersdetail.orddt_promotion_price) AS price
FROM product, product_options, ordersdetail, orders
WHERE product.prod_id = product_options.propt_prod AND product_options.propt_id = ordersdetail.orddt_propt AND orders.order_id = ordersdetail.orddt_order AND year(orders.order_date) = year
GROUP BY product.prod_id, product.prod_name
ORDER BY quantity DESC$$

DELIMITER ;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_slug`, `brand_desc`, `brand_famous`, `created_at`, `updated_at`) VALUES
(1, 'iPhone', 'iphone', 'Apple', 1, '2019-05-13 09:55:56', '2019-05-13 02:55:56'),
(2, 'Galaxy', 'galaxy', 'Samsung', 1, '2019-05-13 02:56:25', '2019-05-13 02:56:25'),
(3, 'Mi', 'mi', 'Xiaomi', 0, '2019-05-13 03:02:42', '2019-05-13 03:02:42'),
(6, 'Huawei', 'huawei', 'Huawei', 1, '2019-05-13 04:43:55', '2019-05-13 04:43:55'),
(7, 'Vivo', 'vivo', 'Vivo', 0, '2019-05-14 17:18:19', '2019-05-14 17:18:19'),
(8, 'Thinkpad', 'thinkpad', 'lenovo', 0, '2019-05-31 11:13:45', '2019-05-31 11:13:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_cus` int(11) NOT NULL,
  `cart_total_prod` int(11) NOT NULL,
  `cart_total_price` double NOT NULL,
  `cart_date` date NOT NULL,
  `cart_remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cart_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bẫy `cart`
--
DELIMITER $$
CREATE TRIGGER `after_cart_update` AFTER UPDATE ON `cart` FOR EACH ROW BEGIN
	DECLARE done INT DEFAULT 0;
	DECLARE propt INT;
    DECLARE quantity INT;
  	DECLARE cartdetail_cursor CURSOR FOR
    	SELECT cartdt_propt,cartdt_prod_quantity
		FROM cartdetail
		WHERE cartdt_cart = NEW.cart_id;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1; 
  IF NEW.cart_status = 3 THEN
        OPEN cartdetail_cursor;
		read_loop: LOOP
		FETCH cartdetail_cursor INTO propt, quantity;
		IF done THEN
		LEAVE read_loop;
		END IF;
		UPDATE product_options SET propt_quantity = propt_quantity + quantity WHERE propt_id = propt;
		END LOOP;
        CLOSE cartdetail_cursor;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cartdetail`
--

CREATE TABLE `cartdetail` (
  `cartdt_id` int(11) NOT NULL,
  `cartdt_cart` int(11) NOT NULL,
  `cartdt_propt` int(11) NOT NULL,
  `cartdt_prod_quantity` int(11) NOT NULL,
  `cartdt_prod_unit_price` double NOT NULL,
  `cartdt_prod_promotion_price` double NOT NULL,
  `cartdt_total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bẫy `cartdetail`
--
DELIMITER $$
CREATE TRIGGER `after_cartdetail_insert` AFTER INSERT ON `cartdetail` FOR EACH ROW UPDATE product_options SET propt_quantity = propt_quantity - NEW.cartdt_prod_quantity WHERE propt_id=NEW.cartdt_propt
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`cmt_id`, `cmt_name`, `cmt_email`, `cmt_content`, `cmt_voted`, `cmt_prod`, `created_at`, `updated_at`) VALUES
(1, 'thang thai', 'thanglong2098@gmail.com', 'xin chào', 4, 27, '2019-05-21 03:11:48', '2019-05-31 11:17:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `commission`
--

CREATE TABLE `commission` (
  `cms_id` int(11) NOT NULL,
  `cms_month` int(11) NOT NULL,
  `cms_year` int(11) NOT NULL,
  `cms_empl` int(11) NOT NULL,
  `cms_total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bẫy `commission`
--
DELIMITER $$
CREATE TRIGGER `insert_commission` BEFORE INSERT ON `commission` FOR EACH ROW BEGIN
	DECLARE flag INT;
    DECLARE total_salary DOUBLE;
    DECLARE salary DOUBLE;
    
    SET salary = NEW.cms_total;
    
    SELECT COUNT(*) INTO flag FROM revenue WHERE revenue.reve_month = NEW.cms_month AND revenue.reve_year = NEW.cms_year;
    
    IF(flag = 0) THEN
    BEGIN
    	INSERT INTO `revenue` (`reve_month`, `reve_year`, `reve_sale`, `reve_buy`, `reve_salary`, `reve_income`) VALUES (NEW.cms_month, NEW.cms_year, '0', '0', salary, '0');
    END;
    ELSE
    BEGIN
    	SELECT revenue.reve_salary INTO total_salary FROM revenue WHERE revenue.reve_month = NEW.cms_month AND revenue.reve_year = NEW.cms_year;
        
        SET total_salary = total_salary + salary;
        
        UPDATE revenue SET revenue.reve_salary = total_salary WHERE revenue.reve_month = NEW.cms_month AND revenue.reve_year = NEW.cms_year;
    END;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_commission` BEFORE UPDATE ON `commission` FOR EACH ROW BEGIN
    DECLARE total_salary DOUBLE;
    
    SELECT revenue.reve_salary INTO total_salary FROM revenue WHERE revenue.reve_month = NEW.cms_month AND revenue.reve_year = NEW.cms_year;
        
    SET total_salary = total_salary + NEW.cms_total - OLD.cms_total;
        
    UPDATE revenue SET revenue.reve_salary = total_salary WHERE revenue.reve_month = NEW.cms_month AND revenue.reve_year = NEW.cms_year;
END
$$
DELIMITER ;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `empl_basic_salary` double NOT NULL,
  `empl_avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empl_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`empl_id`, `empl_name`, `empl_sex`, `empl_email`, `empl_phone`, `empl_address`, `empl_birthday`, `empl_identity_card`, `empl_start_date`, `empl_basic_salary`, `empl_avatar`, `empl_status`, `created_at`, `updated_at`) VALUES
(8, 'Hồ Thái Thăng', 0, '16521095@gm.uit.edu.vn', '0328119182', 'thu duc', '1998-04-25', '16521095', '2018-05-08', 10000000, 'logo.png', 0, '2019-05-12 21:13:11', '2019-06-12 14:40:54'),
(10, 'Phạm Đức Toàn', 0, '16521259@gm.uit.edu.com', '0147258369', 'thu duc', '1998-04-25', '16521259', '2018-05-08', 5000000, 'Save.png', 0, '2019-05-12 21:36:27', '2019-06-12 14:40:38'),
(11, 'Nguyễn Phi Yến', 1, '16521484@gm.uit.edu.com', '0369258147', 'thu duc', '1998-04-25', '16521484', '2018-05-08', 8000000, '', 0, '2019-05-12 21:42:29', '2019-06-12 18:13:27'),
(12, 'Lê Văn Phước', 0, '16520959@gm.uit.edu.com', '0258147369', 'thu duc', '2019-06-14', '798746541', '2019-06-13', 5000000, 'Untitled.png', 0, '2019-06-11 18:28:02', '2019-06-12 14:45:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `guarantee`
--

CREATE TABLE `guarantee` (
  `gtd_id` int(11) NOT NULL,
  `gtd_orders` int(11) NOT NULL,
  `gtd_propt` int(11) NOT NULL,
  `gtd_serial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gtd_required_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gtd_content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gtd_empl_receive` int(11) NOT NULL,
  `gtd_date_receive` date NOT NULL,
  `gtd_empl_reimburse` int(11) DEFAULT NULL,
  `gtd_date_reimburse` date DEFAULT NULL,
  `gtd_status` tinyint(5) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice`
--

CREATE TABLE `invoice` (
  `invo_id` int(11) NOT NULL,
  `invo_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `invo_prov` int(11) NOT NULL,
  `invo_date` date NOT NULL,
  `invo_empl` int(11) NOT NULL,
  `invo_total_prod` int(11) NOT NULL,
  `invo_total_price` double NOT NULL,
  `invo_status` tinyint(4) NOT NULL,
  `invo_date_approved` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice`
--

INSERT INTO `invoice` (`invo_id`, `invo_code`, `invo_prov`, `invo_date`, `invo_empl`, `invo_total_prod`, `invo_total_price`, `invo_status`, `invo_date_approved`, `created_at`, `updated_at`) VALUES
(3, '789456', 1, '2019-06-13', 8, 10, 1000000, 1, '2019-06-12', '2019-06-12 14:09:06', '2019-06-12 14:24:24'),
(4, '789543456', 1, '2019-06-07', 12, 20, 250000000, 1, '2019-06-13', '2019-06-12 17:36:12', '2019-06-12 18:25:26');

--
-- Bẫy `invoice`
--
DELIMITER $$
CREATE TRIGGER `approved_invoice` AFTER UPDATE ON `invoice` FOR EACH ROW BEGIN 
DECLARE done INT DEFAULT 0; 
DECLARE propt INT; 
DECLARE quantity INT; 
DECLARE invodetail_cursor CURSOR FOR
	SELECT invdt_propt, invdt_quantity
    	FROM invoicedetail
        WHERE invdt_invo = NEW.invo_id;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
IF NEW.invo_status = 1 THEN
    OPEN invodetail_cursor;
    read_loop: LOOP
    FETCH invodetail_cursor INTO propt,quantity;
    IF done THEN
    LEAVE read_loop;
    END IF;
    UPDATE product_options SET propt_quantity = propt_quantity + quantity WHERE propt_id = propt; 
    END LOOP;
    CLOSE invodetail_cursor; 
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_invoice` BEFORE UPDATE ON `invoice` FOR EACH ROW BEGIN
    DECLARE flag INT;
    DECLARE year INT;
    DECLARE month INT;
    DECLARE spending_money DOUBLE;
    
    IF (NEW.invo_status = 1) THEN
    BEGIN
    	SET NEW.invo_date_approved = date(now());
    	SET month = month(NEW.invo_date), year = year(NEW.invo_date);
    
        SELECT COUNT(*) INTO flag FROM revenue WHERE revenue.reve_month = month AND revenue.reve_year = year;

        IF(flag = 0) THEN
        BEGIN
            INSERT INTO `revenue` (`reve_month`, `reve_year`, `reve_sale`, `reve_buy`, `reve_salary`, `reve_income`) VALUES (month, year, '0', NEW.invo_total_price,'0', '0');
        END;
        ELSE
        BEGIN
            SELECT revenue.reve_buy INTO spending_money FROM revenue WHERE revenue.reve_month = month AND revenue.reve_year = year;

            SET spending_money = spending_money + NEW.invo_total_price;

            UPDATE revenue SET revenue.reve_buy = spending_money WHERE revenue.reve_month = month AND revenue.reve_year = year;
        END;
        END IF;
	END;
    END IF; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoicedetail`
--

CREATE TABLE `invoicedetail` (
  `invdt_id` int(11) NOT NULL,
  `invdt_invo` int(11) NOT NULL,
  `invdt_propt` int(11) NOT NULL,
  `invdt_quantity` int(11) NOT NULL,
  `invdt_unit_price` double NOT NULL,
  `invdt_total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoicedetail`
--

INSERT INTO `invoicedetail` (`invdt_id`, `invdt_invo`, `invdt_propt`, `invdt_quantity`, `invdt_unit_price`, `invdt_total`, `created_at`, `updated_at`) VALUES
(3, 3, 2, 10, 100000, 1000000, '2019-06-12 14:09:10', '2019-06-12 14:09:10'),
(5, 4, 2, 10, 10000000, 100000000, '2019-06-12 17:59:14', '2019-06-12 17:59:14'),
(6, 4, 6, 10, 15000000, 150000000, '2019-06-12 17:59:14', '2019-06-12 17:59:14');

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
  `order_total_price` double NOT NULL,
  `order_remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bẫy `orders`
--
DELIMITER $$
CREATE TRIGGER `insert_order` BEFORE INSERT ON `orders` FOR EACH ROW BEGIN
	DECLARE flag1 INT;
    DECLARE flag2 INT;
    DECLARE year INT;
    DECLARE month INT;
    DECLARE coefficient DOUBLE DEFAULT 0.03;
    DECLARE sale DOUBLE;
    DECLARE buy DOUBLE;
    DECLARE salary DOUBLE;
    DECLARE tienloi DOUBLE;
	DECLARE tienhh DOUBLE;
    
    SET year = year(New.order_date), month = month(New.order_date);
    
    SELECT COUNT(*) INTO flag1 FROM commission WHERE commission.cms_year = year AND commission.cms_month = month AND commission.cms_empl = NEW.order_empl;
    
    IF(flag1 = 0) THEN
    BEGIN
		SET tienhh = NEW.order_total_price*coefficient;
    	INSERT INTO `commission` (`cms_empl`, `cms_month`, `cms_year`, `cms_total`) VALUES (NEW.order_empl, month, year, tienhh); 
    END;
    ELSE
    BEGIN
    	SELECT commission.cms_total INTO tienhh FROM commission WHERE commission.cms_year = year AND commission.cms_month = month AND commission.cms_empl = NEW.order_empl;
        
        SET tienhh = tienhh + NEW.order_total_price*coefficient;
        
        UPDATE commission SET commission.cms_total = tienhh  WHERE commission.cms_year = year AND commission.cms_month = month AND commission.cms_empl = NEW.order_empl;
    END;
    END IF;
    
    SELECT COUNT(*) INTO flag2 FROM revenue WHERE revenue.reve_month = month AND revenue.reve_year = year;
    
    IF(flag2 = 0) THEN
    BEGIN
    	INSERT INTO `revenue` (`reve_month`, `reve_year`, `reve_sale`, `reve_buy`, `reve_salary`, `reve_income`) VALUES (month, year, NEW.order_total_price, '0', '0', '0');
    END;
    ELSE
    BEGIN
    	SELECT revenue.reve_sale INTO sale FROM revenue WHERE revenue.reve_month = month AND revenue.reve_year = year;
        SELECT revenue.reve_sale INTO buy FROM revenue WHERE revenue.reve_month = month AND revenue.reve_year = year;
        SELECT revenue.reve_salary INTO salary FROM revenue WHERE revenue.reve_month = month AND revenue.reve_year = year;
        
        SET sale = sale + NEW.order_total_price;
        SET tienloi = sale - buy - salary;
        
        UPDATE revenue SET revenue.reve_sale = sale, revenue.reve_income = tienloi WHERE revenue.reve_month = month AND revenue.reve_year = year;
    END;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordersdetail`
--

CREATE TABLE `ordersdetail` (
  `orddt_id` int(11) NOT NULL,
  `orddt_order` int(11) NOT NULL,
  `orddt_propt` int(11) NOT NULL,
  `orddt_quantity` int(11) NOT NULL,
  `orddt_unit_price` double NOT NULL,
  `orddt_promotion_price` double NOT NULL,
  `orddt_total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission`
--

INSERT INTO `permission` (`perm_id`, `perm_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-05-12 04:45:50', '0000-00-00 00:00:00'),
(2, 'nhân viên bán hàng và nhập hàng', '2019-05-28 08:21:27', '2019-06-13 03:19:51'),
(3, 'nhân viên bảo hành', '2019-05-28 08:21:27', '2019-05-28 08:21:27');

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
  `prod_new` tinyint(1) NOT NULL DEFAULT 1,
  `prod_featured` tinyint(1) NOT NULL DEFAULT 1,
  `prod_poster` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_slug`, `prod_cate`, `prod_brand`, `prod_warranty_period`, `prod_detail`, `prod_status`, `prod_new`, `prod_featured`, `prod_poster`, `created_at`, `updated_at`) VALUES
(23, 'iPhone Xs Max', 'iphone-xs-max', 3, 1, 24, 'Màn hình:	OLED, 6.5\", Super Retina\r\nHệ điều hành:	iOS 12\r\nCamera sau:	Chính 12 MP & Phụ 12 MP\r\nCamera trước:	7 MP\r\nCPU:	Apple A12 Bionic 6 nhân\r\nRAM:	4 GB\r\nBộ nhớ trong:	64 GB\r\nThẻ SIM: Nano SIM & eSIM, Hỗ trợ 4G\r\nDung lượng pin:	3174 mAh, có sạc nhanh', 1, 1, 1, 'iphone-xs-max-bac-1-1-1-180x125.jpg', '2019-05-16 14:56:48', '2019-05-28 12:09:48'),
(27, 'Samsung Galaxy S10', 'samsung-galaxy-s10', 1, 2, 12, 'Màn hình:	Dynamic AMOLED, 6.1\", Quad HD+ (2K+)\r\nHệ điều hành:	Android 9.0 (Pie)\r\nCamera sau:	Chính 12 MP & Phụ 12 MP, 16 MP\r\nCamera trước:	10 MP\r\nCPU:	Exynos 9820 8 nhân 64-bit\r\nRAM:	8 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 512 GB\r\nThẻ SIM:		2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G\r\nDung lượng pin:	3400 mAh, có sạc nhanh', 1, 0, 1, 'samsung-galaxy-s10-white-400x400.jpg', '2019-05-22 04:31:41', '2019-06-20 04:19:40'),
(28, 'Iphone 7 32GB', 'iphone-7-32gb', 1, 1, 12, 'Màn hình:	LED-backlit IPS LCD, 4.7\", Retina HD\r\nHệ điều hành:	iOS 12\r\nCamera sau:	12 MP\r\nCamera trước: 7 MP\r\nCPU:	Apple A10 Fusion 4 nhân 64-bit\r\nRAM:	2 GB\r\nBộ nhớ trong:	32 GB\r\nThẻ SIM: 1 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	1960 mAh', 1, 0, 1, 'iphone-7-32gb-den-400x460.png', '2019-05-29 10:13:39', '2019-06-20 04:19:51'),
(29, 'iPhone 6s Plus 32GB', 'iphone-6s-plus-32gb', 1, 1, 12, 'Màn hình:	LED-backlit IPS LCD, 5.5\", Retina HD\r\nHệ điều hành:	iOS 12\r\nCamera sau:	12 MP\r\nCamera trước:	5 MP\r\nCPU:	Apple A9 2 nhân 64-bit\r\nRAM:	2 GB\r\nBộ nhớ trong:	32 GB\r\nThẻ SIM: 1 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin:	2750 mAh', 1, 1, 1, 'iphone-6s-plus-32gb-400x460.png', '2019-05-29 10:26:30', '2019-05-29 10:26:56'),
(34, 'iPhone Xs Max Full Option', 'iphone-xs-max-full-option', 1, 1, 12, 'Màn hình :	6.5 inchs, 1242 x 2688 Pixels\r\nCamera trước :	7.0 MP\r\nCamera sau :	Dual Camera 12.0 MP\r\nRAM :	4 GB\r\nBộ nhớ trong :	512 GB\r\nCPU :	Apple A12 Bionic, 6, Đang cập nhật\r\nGPU :	Apple GPU 4 nhân\r\nHệ điều hành :	iOS 12\r\nThẻ SIM :	eSIM và NanoSIM, 1 Sim', 1, 1, 1, 'iPhone-Xs-Max-gold.jpeg', '2019-05-29 10:37:11', '2019-06-06 09:11:12'),
(35, 'Xiaomi Mi 9 64GB (No.00574553)', 'xiaomi-mi-9-64gb-no00574553', 1, 3, 18, 'Màn hình :	6.39 inchs, 1080 x 2340 Pixels\r\nCamera trước :	20.0 MP\r\nCamera sau :	48 MP,16 MP +12 MP ( 3 camera)\r\nRAM :	6 GB\r\nBộ nhớ trong :	64 GB\r\nCPU :	Snap dragon 855, 8, 1x2.84Ghz+3x2.42Ghz+4x1.8Ghz\r\nGPU :	Adreno 640\r\nDung lượng pin :	3300mAh\r\nHệ điều hành :	Android 9\r\nThẻ SIM :	Nano SIM, 2 Sim', 1, 1, 1, 'xiaomi-mi-9-den-1.jpeg', '2019-05-29 10:40:45', '2019-06-06 09:11:20'),
(36, 'Xiaomi Mi 8 Lite 128GB (No.00516749)', 'xiaomi-mi-8-lite-128gb-no00516749', 1, 3, 18, 'Màn hình :	6.22 inches, 1080 x 2040 Pixel\r\nCamera trước :	24.0 MP\r\nCamera sau :	12.0 MP + 5.0 MP\r\nRAM :	6 GB\r\nBộ nhớ trong :	128 GB\r\nCPU :	SnapDragon 660, Octa-Core, 4x2.2 GHz Kryo 260 & 4x1.8 GHz Kryo 260\r\nGPU :	Adreno 512\r\nDung lượng pin :	3300mah\r\nHệ điều hành :	Android 8.1 Oreo (phiên bản Go)\r\nThẻ SIM :	Nano SIM, 2 Sim', 1, 1, 1, 'xiaomi-mi8-lite-1.jpg', '2019-05-29 10:43:17', '2019-06-06 09:11:28'),
(37, 'Xiaomi Pocophone F1 (No.00503336)', 'xiaomi-pocophone-f1-no00503336', 1, 3, 18, 'Màn hình :	6.18 inches, 1080 x 2280 Pixels\r\nCamera trước :	20.0 MP\r\nCamera sau :	Camera kép 12MP+5MP\r\nRAM :	6 GB\r\nBộ nhớ trong :	64 GB\r\nCPU :	Snapdragon 845, 8, 2.8 GHz\r\nGPU :	Adreno 630\r\nDung lượng pin :	4000 mAh\r\nHệ điều hành :	Android 8\r\nThẻ SIM :	Nano SIM, 2 Sim', 1, 1, 1, 'xiaomi-pocophone-f1-den-1.png', '2019-05-29 10:46:04', '2019-06-06 09:11:36'),
(38, 'Vivo V15 6GB-128GB (No.00554994)', 'vivo-v15-6gb-128gb-no00554994', 1, 7, 12, 'Màn hình :	6.53 inchs, 1080 x 2340 Pixels\r\nCamera trước :	32.0Mp\r\nCamera sau :	12Mp+8Mp+5Mp\r\nRAM :	6 GB\r\nBộ nhớ trong :	128 GB\r\nCPU :	MTK P70, 8, 2.1 GHz\r\nGPU :	ARM®Mail-G72\r\nDung lượng pin :	4000 mAh\r\nHệ điều hành :	Android 9\r\nThẻ SIM :	Nano SIM, 2 Sim', 1, 1, 1, 'vivo-v15-do-qh-1.jpeg', '2019-05-29 11:05:22', '2019-06-06 09:11:43'),
(39, 'Vivo V11i (No.00502766)', 'vivo-v11i-no00502766', 1, 7, 12, 'Màn hình :	6.3 inchs, 1080 x 2280 Pixels\r\nCamera trước :	25.0 MP\r\nCamera sau :	16.0 + 5.0 MP(Dual Camera)\r\nRAM :	4 GB\r\nBộ nhớ trong :	128 GB\r\nCPU :	Helio P60 -Octa-core 2.0GHz, 8, 2.0 GHz\r\nGPU :	Mali-G72 MP3\r\nDung lượng pin :	3315mAh\r\nHệ điều hành :	Android 8\r\nThẻ SIM :	Nano SIM, 2 Sim', 1, 1, 1, 'vivo-v11i-tim-0.jpg', '2019-05-29 11:16:33', '2019-06-06 09:12:07'),
(40, 'Vivo V9 Youth (No.00455497)', 'vivo-v9-youth-no00455497', 1, 7, 12, 'Màn hình :	6.3 inches, 1080 x 2280 Pixels\r\nCamera trước :	16.0 MP\r\nCamera sau :	16.0 MP + 2.0 MP\r\nRAM :	4 GB\r\nBộ nhớ trong :	32 GB\r\nCPU :	Qualcomm Snapdragon 450, 8, 1.8GHz\r\nGPU :	Adreno 506\r\nDung lượng pin :	3260mAh\r\nHệ điều hành :	Android 8.1\r\nThẻ SIM :	Nano SIM, 2 Sim', 1, 1, 1, 'vivo-v9-youth-den-1.jpeg', '2019-05-29 11:20:19', '2019-06-06 09:12:16'),
(41, 'Macbook Pro 13 inch 128GB (2017) (No.00367556)', 'macbook-pro-13-inch-128gb-2017-no00367556', 3, 1, 12, 'CPU :	Intel, Core i5\r\nRAM :	8 GB, LPDDR3\r\nỔ cứng :	SSD, 128 GB\r\nMàn hình :	13.3 inch, 2560 x 1600 pixels\r\nCard màn hình :	Intel Iris Plus Graphics 640\r\nCổng kết nối :	LAN : 802.11ac Wi-Fi wireless networking, WIFI : IEEE 802.11a/b/g/n compatible\r\nHệ điều hành :	Mac Os\r\nTrọng lượng :	1.37 kg', 1, 1, 1, 'mac_2017_bac.jpg', '2019-05-29 11:28:29', '2019-06-06 09:12:26'),
(42, 'Samsung Galaxy Tab S5E (No.00555888)', 'samsung-galaxy-tab-s5e-no00555888', 2, 2, 12, 'Màn hình :	10.5 inchs, 2560 x 1600 pixels\r\nCamera trước :	8.0 MP\r\nCamera sau :	13.0 MP\r\nCPU :	Qualcomm Snapdragon 670\r\nGPU :	Đang cập nhật\r\nRAM :	4 GB\r\nBộ nhớ trong :	64 GB\r\nKết nối :	Wi-Fi: 802.11 a/b/g/n/ac, Bluetooth: Bluetooth 5.0\r\nHệ điều hành :	Android One UI', 1, 1, 1, 'ss-galaxy-tab-s5e-vang-1.jpeg', '2019-05-29 11:31:26', '2019-06-06 09:12:41'),
(43, 'Samsung Galaxy Tab A Plus 8 (2019) (No.00555887)', 'samsung-galaxy-tab-a-plus-8-2019-no00555887', 2, 2, 12, 'Màn hình :	8.0 inchs, 1920 x 1200 pixels\r\nCamera trước :	5.0 MP\r\nCamera sau :	8.0 MP\r\nCPU :	Exynos 7904\r\nGPU :	G71 MP2\r\nRAM :	3 GB\r\nBộ nhớ trong :	32 MB\r\nKết nối :	Wi-Fi: Wi-Fi 802.11 b/g/n, Bluetooth: Bluetooth 4.2\r\nHệ điều hành :	Android 8.1', 1, 1, 1, 'ss-tab-a-plus-8-den-1.jpeg', '2019-05-29 11:33:49', '2019-06-06 09:13:02'),
(44, 'Huawei MediaPad T3 7.0 Prestige (No.00407106)', 'huawei-mediapad-t3-70-prestige-no00407106', 2, 6, 12, 'Màn hình :	7.0\", 1024 x 600 pixels\r\nCamera trước :	2 MP and fixed focus\r\nCamera sau :	2 MP and fixed focus\r\nCPU :	Quad-core 1.3 GHz processor Storage\r\nGPU :	Mali400\r\nBộ nhớ trong :	8 GB\r\nKết nối :	Hỗ trợ 3G: B2,B3,B5,B8, Wi-Fi: 802.11 b/g/n@2.4GHz, Bluetooth: Có\r\nThời gian sử dụng :	đang cập nhật\r\nHệ điều hành :	Android 7.0', 1, 0, 1, 'huawei-mediapad-t3-70-prestige-1.jpg', '2019-05-29 11:38:03', '2019-06-06 09:35:00'),
(45, 'Huawei MediaPad T5 10 (No.00532152)', 'huawei-mediapad-t5-10-no00532152', 2, 6, 12, 'Màn hình :	10.1 inchs, 1920 x 1200 pixels\r\nCamera trước :	2.0 MP\r\nCamera sau :	5.0 MP\r\nCPU :	HUAWEI Kirin 659\r\nGPU :	Mali-T830 MP2\r\nRAM :	3 GB\r\nBộ nhớ trong :	32 GB\r\nKết nối :	Wi-Fi: Wi-Fi 802.11 b/g/n, Dual-band, Wi-Fi Direct, Wi-Fi hotspot, Bluetooth: v4.1\r\nHệ điều hành :	Android 8', 1, 0, 1, 'huawei-mediapad-t510-0.jpeg', '2019-05-29 11:40:23', '2019-06-20 04:18:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `pimg_id` int(11) NOT NULL,
  `pimg_prod` int(11) NOT NULL,
  `pimg_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`pimg_id`, `pimg_prod`, `pimg_name`, `created_at`, `updated_at`) VALUES
(10, 27, 's10_dn1_1.jpg', '2019-05-22 04:31:41', '2019-05-22 04:31:41'),
(11, 27, 's10_tr1_1.jpg', '2019-05-22 04:31:41', '2019-05-22 04:31:41'),
(12, 27, 's10_xl1_1.jpg', '2019-05-22 04:31:41', '2019-05-22 04:31:41'),
(13, 23, 'iphone-xs-max-bac-4-180x125.jpg', '2019-05-22 11:21:28', '2019-05-22 11:26:14'),
(14, 23, 's10_tr1_1.jpg', '2019-05-22 11:23:36', '2019-05-22 11:23:36'),
(15, 28, 'iphone-7-32gb-den-400x460.png', '2019-05-29 10:13:39', '2019-05-29 10:13:39'),
(16, 29, 'iphone-6s-plus-32gb-400x460.png', '2019-05-29 10:26:30', '2019-05-29 10:26:30'),
(17, 29, 'ip_6s_rose_gold.jpeg', '2019-05-29 10:26:30', '2019-05-29 10:26:30'),
(18, 34, 'iPhone-Xs-Max-White.jpeg', '2019-05-29 10:37:11', '2019-05-29 10:37:11'),
(19, 35, 'xiaomi-mi-9-xanh-1.jpeg', '2019-05-29 10:40:45', '2019-05-29 10:40:45'),
(20, 36, 'xiaomi-mi8-lite-den-1.jpg', '2019-05-29 10:43:17', '2019-05-29 10:43:17'),
(21, 37, 'xiaomi-pocophone-f1-xanh-1.jpeg', '2019-05-29 10:46:04', '2019-05-29 10:46:04'),
(22, 38, 'vivo-v15-xanh-qh-1.png', '2019-05-29 11:05:22', '2019-05-29 11:05:22'),
(23, 39, 'vivo-v11i-xanh-0.jpg', '2019-05-29 11:16:33', '2019-05-29 11:16:33'),
(24, 40, 'vivo-v9-youth-vang-1.png', '2019-05-29 11:20:19', '2019-05-29 11:20:19'),
(25, 41, 'mac_2017_black.jpg', '2019-05-29 11:28:29', '2019-05-29 11:28:29'),
(26, 43, 'ss-tab-a-plus-8-xam-1.png', '2019-05-29 11:33:49', '2019-05-29 11:33:49');

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
  `propt_price` double NOT NULL,
  `propt_quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_options`
--

INSERT INTO `product_options` (`propt_id`, `propt_prod`, `propt_color`, `propt_ram`, `propt_rom`, `propt_price`, `propt_quantity`, `created_at`, `updated_at`) VALUES
(1, 23, 'Xám', 4, '64 gb', 29990000, 0, '2019-05-21 11:33:18', '2019-06-12 09:33:22'),
(2, 23, 'Bạc', 4, '128 gb', 29990000, 20, '2019-05-21 11:33:18', '2019-06-12 18:25:26'),
(4, 27, 'Đen', 8, '128 gb', 17990000, 0, '2019-05-22 04:31:41', '2019-06-12 09:33:22'),
(5, 27, 'Trắng', 8, '128 gb', 18000000, 0, '2019-05-22 04:31:41', '2019-06-12 09:33:22'),
(6, 23, 'Gold', 4, '512 gb', 3000, 10, '2019-05-22 11:21:28', '2019-06-12 18:25:26'),
(8, 28, 'Đen', 2, '32 gb', 10240000, 0, '2019-05-29 10:13:39', '2019-05-29 10:13:39'),
(9, 29, 'Vàng Đồng', 2, '32 gb', 9990000, 0, '2019-05-29 10:26:30', '2019-05-29 10:26:30'),
(10, 29, 'Vàng Hồng', 2, '32 gb', 9790000, 0, '2019-05-29 10:26:30', '2019-05-31 16:00:03'),
(11, 34, 'Vàng', 4, '64 gb', 29990000, 0, '2019-05-29 10:37:11', '2019-05-29 10:37:11'),
(12, 34, 'Bạc', 4, '64 gb', 29990000, 0, '2019-05-29 10:37:11', '2019-05-29 10:37:11'),
(13, 34, 'Vàng', 4, '256 gb', 35990000, 0, '2019-05-29 10:37:11', '2019-05-29 10:37:11'),
(14, 34, 'Bạc', 4, '256 gb', 35990000, 0, '2019-05-29 10:37:11', '2019-05-29 10:37:11'),
(15, 34, 'Vàng', 4, '512 gb', 39990000, 0, '2019-05-29 10:37:11', '2019-05-29 10:37:11'),
(16, 34, 'Bạc', 4, '512 gb', 35990000, 0, '2019-05-29 10:37:11', '2019-05-29 10:37:11'),
(17, 35, 'Xanh Dương', 6, '64 gb', 11990000, 0, '2019-05-29 10:40:45', '2019-05-29 10:40:45'),
(18, 35, 'Đen', 6, '64 gb', 11990000, 0, '2019-05-29 10:40:45', '2019-05-29 10:40:45'),
(19, 36, 'Đen', 6, '128 gb', 7490000, 0, '2019-05-29 10:43:17', '2019-05-29 10:43:17'),
(20, 36, 'Xanh Dương', 6, '128 gb', 7490000, 0, '2019-05-29 10:43:17', '2019-05-29 10:43:17'),
(21, 37, 'Xanh Dương', 6, '64 gb', 7990000, 0, '2019-05-29 10:46:04', '2019-05-29 10:46:04'),
(22, 37, 'Đen', 6, '64 gb', 7990000, 0, '2019-05-29 10:46:04', '2019-05-29 10:46:04'),
(23, 38, 'Đỏ', 6, '128 gb', 7990000, 0, '2019-05-29 11:05:22', '2019-06-12 09:33:22'),
(24, 38, 'Xanh Dương', 6, '128 gb', 7990000, 0, '2019-05-29 11:05:22', '2019-06-06 14:27:34'),
(25, 39, 'Tím', 4, '128 gb', 5990000, 0, '2019-05-29 11:16:33', '2019-05-29 11:16:33'),
(26, 39, 'Xanh Dương', 4, '128 gb', 5990000, 0, '2019-05-29 11:16:33', '2019-05-29 11:16:33'),
(27, 40, 'Đen', 4, '32 gb', 3990000, 0, '2019-05-29 11:20:19', '2019-05-29 11:20:19'),
(28, 40, 'Vàng', 4, '32 gb', 3990000, 0, '2019-05-29 11:20:19', '2019-05-29 11:20:19'),
(29, 41, 'Đen', 8, '128 gb', 33990000, 0, '2019-05-29 11:28:29', '2019-05-29 11:28:29'),
(30, 41, 'Đen', 8, '256 gb', 38990000, 0, '2019-05-29 11:28:29', '2019-05-29 11:28:29'),
(31, 41, 'Bạc', 8, '128 gb', 33990000, 0, '2019-05-29 11:28:29', '2019-05-29 11:28:29'),
(32, 41, 'Bạc', 8, '256 gb', 38990000, 0, '2019-05-29 11:28:29', '2019-05-29 11:28:29'),
(33, 42, 'Gold', 4, '64 gb', 12490000, 0, '2019-05-29 11:31:26', '2019-05-29 11:31:26'),
(34, 42, 'Bạc', 4, '64 gb', 12490000, 0, '2019-05-29 11:31:26', '2019-05-29 11:31:26'),
(35, 43, 'Đen', 3, '32 gb', 6990000, 0, '2019-05-29 11:33:49', '2019-05-29 11:33:49'),
(36, 43, 'Xám', 3, '32 gb', 6990000, 0, '2019-05-29 11:33:49', '2019-05-29 11:33:49'),
(37, 44, 'Gold', 2, '8 gb', 2090000, 0, '2019-05-29 11:38:03', '2019-05-29 11:38:03'),
(38, 45, 'Đen', 3, '32 gb', 5690000, 0, '2019-05-29 11:40:23', '2019-05-29 11:40:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `prom_id` int(11) NOT NULL,
  `prom_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prom_start_date` date NOT NULL,
  `prom_end_date` date NOT NULL,
  `prom_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `promotion`
--

INSERT INTO `promotion` (`prom_id`, `prom_name`, `prom_start_date`, `prom_end_date`, `prom_status`, `created_at`, `updated_at`) VALUES
(10, 'Back to school 2019', '2019-06-14', '2019-06-16', 0, '2019-06-13 07:39:50', '2019-06-13 08:50:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotiondetail`
--

CREATE TABLE `promotiondetail` (
  `promdt_id` int(11) NOT NULL,
  `promdt_prom` int(11) NOT NULL,
  `promdt_propt` int(11) NOT NULL,
  `promdt_percent` float NOT NULL,
  `promdt_unit_price` double NOT NULL,
  `promdt_promotion_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `promotiondetail`
--

INSERT INTO `promotiondetail` (`promdt_id`, `promdt_prom`, `promdt_propt`, `promdt_percent`, `promdt_unit_price`, `promdt_promotion_price`, `created_at`, `updated_at`) VALUES
(3, 10, 2, 20, 29990000, 23992000, '2019-06-13 08:50:19', '2019-06-13 08:50:19'),
(4, 10, 6, 15, 3000, 2550, '2019-06-13 08:50:19', '2019-06-13 08:50:19'),
(5, 10, 4, 15, 17990000, 15291500, '2019-06-13 08:50:19', '2019-06-13 08:50:19');

--
-- Bẫy `promotiondetail`
--
DELIMITER $$
CREATE TRIGGER `insert_promotiondetail` BEFORE INSERT ON `promotiondetail` FOR EACH ROW SET NEW.promdt_promotion_price = NEW.promdt_unit_price - NEW.promdt_unit_price*(NEW.promdt_percent/100)
$$
DELIMITER ;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `provider`
--

INSERT INTO `provider` (`prov_id`, `prov_name`, `prov_email`, `prov_phone`, `prov_fax`, `prov_address`, `prov_desc`, `created_at`, `updated_at`) VALUES
(1, 'TRANG VÀNG VIỆT NAM', 'contact@trangvangvietnam.com', '1900 54 55 80', '+84 (024) 3636 9371', 'Tầng 6, Tòa Nhà Vinafood1, 94 Lương Yên, P. Bạch Đằng, Q. Hai Bà Trưng, Hà Nội', 'Trụ sở Hà Nội', '2019-05-17 12:39:59', '2019-05-17 12:39:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `revenue`
--

CREATE TABLE `revenue` (
  `reve_id` int(11) NOT NULL,
  `reve_month` int(11) NOT NULL,
  `reve_year` int(11) DEFAULT NULL,
  `reve_quarter` int(11) DEFAULT NULL,
  `reve_sale` double NOT NULL,
  `reve_buy` double NOT NULL,
  `reve_salary` double NOT NULL,
  `reve_income` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `revenue`
--

INSERT INTO `revenue` (`reve_id`, `reve_month`, `reve_year`, `reve_quarter`, `reve_sale`, `reve_buy`, `reve_salary`, `reve_income`, `created_at`, `updated_at`) VALUES
(5, 6, 2019, 2, 0, 250000000, 28000000, -278000000, '2019-06-12 18:25:26', '2019-06-12 18:25:26');

--
-- Bẫy `revenue`
--
DELIMITER $$
CREATE TRIGGER `insert_revenue` BEFORE INSERT ON `revenue` FOR EACH ROW BEGIN
	 DECLARE salary DOUBLE;
	
	 SELECT IFNULL(SUM(employees.empl_basic_salary),0) INTO salary FROM employees WHERE employees.empl_status = 0;
     
     SET NEW.reve_salary = salary + NEW.reve_salary;
    
    SET NEW.reve_income = NEW.reve_sale - NEW.reve_buy - NEW.reve_salary;
	
    IF( NEW.reve_month >= 1 AND NEW.reve_month <=3) THEN
    	SET NEW.reve_quarter = 1;
    ELSEIF (NEW.reve_month >= 4 AND NEW.reve_month <=6) THEN
    	SET NEW.reve_quarter = 2;
    ELSEIF (NEW.reve_month >= 7 AND NEW.reve_month <=9) THEN
    	SET NEW.reve_quarter = 3;
    ELSE
    	SET NEW.reve_quarter = 4;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_revenue` BEFORE UPDATE ON `revenue` FOR EACH ROW BEGIN
    SET NEW.reve_income = NEW.reve_sale - NEW.reve_buy - NEW.reve_salary;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `slide_id` int(11) NOT NULL,
  `slide_caption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
('admin', '$2y$10$Tri2ztrGuT8meagw5HFEZOoQHFY5G1BfVQdVVCL3QJHqflLHhEJrW', 8, 1, 0, 'WtraUvbeNbrwRASz5fxfKuZ3tibGY0p6m12Jn8Dz5blsMPJeZgjHyb7c7ecc', NULL, '2019-06-12 13:46:35'),
('nv10', '$2y$10$fp6FM2ZFO/sd9ZCBISDwmODnta4ILoWKJC8izJZKUdpTjwWLtyIw2', 10, 2, 0, '6EvC0M046TGobcmm9ocxbuzrA30xp2mxKTsUx03H', '2019-05-28 09:24:45', '2019-05-28 11:05:14'),
('nv11', '$2y$10$FTdJq5JRhwRJgWV4APBsQ.N/dUhnKaCOX3sed4tQ4AT3Y3ek/Y1DK', 11, 2, 0, '6EvC0M046TGobcmm9ocxbuzrA30xp2mxKTsUx03Hj', '2019-05-28 10:42:29', '2019-05-28 10:42:29'),
('nv12', '$2y$10$hXc8G3sBlfscMsaZsDrrS.2JI0N3fU7BZz5w7mO6XXJF0fVTxQuMu', 12, 3, 0, '1xaEYEDxcUKWJupAZsLYDlNvn7iCxOhGlluepml0', '2019-06-12 14:45:34', '2019-06-12 14:45:34');

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
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_cus` (`cart_cus`);

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
  ADD UNIQUE KEY `invo_code` (`invo_code`,`invo_prov`),
  ADD KEY `invo_empl` (`invo_empl`),
  ADD KEY `invo_prov` (`invo_prov`);

--
-- Chỉ mục cho bảng `invoicedetail`
--
ALTER TABLE `invoicedetail`
  ADD PRIMARY KEY (`invdt_id`),
  ADD KEY `invdt_invo` (`invdt_invo`),
  ADD KEY `invdt_propt` (`invdt_propt`) USING BTREE;

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
  ADD KEY `orddt_propt` (`orddt_propt`) USING BTREE;

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
  ADD PRIMARY KEY (`prom_id`);

--
-- Chỉ mục cho bảng `promotiondetail`
--
ALTER TABLE `promotiondetail`
  ADD PRIMARY KEY (`promdt_id`),
  ADD KEY `promdt_propt` (`promdt_propt`),
  ADD KEY `promotiondetail_ibfk_1` (`promdt_prom`);

--
-- Chỉ mục cho bảng `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`prov_id`);

--
-- Chỉ mục cho bảng `revenue`
--
ALTER TABLE `revenue`
  ADD PRIMARY KEY (`reve_id`),
  ADD UNIQUE KEY `reve_month` (`reve_month`,`reve_year`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`slide_id`);

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
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `cartdetail`
--
ALTER TABLE `cartdetail`
  MODIFY `cartdt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `commission`
--
ALTER TABLE `commission`
  MODIFY `cms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `empl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `guarantee`
--
ALTER TABLE `guarantee`
  MODIFY `gtd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `invoicedetail`
--
ALTER TABLE `invoicedetail`
  MODIFY `invdt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `ordersdetail`
--
ALTER TABLE `ordersdetail`
  MODIFY `orddt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `permission`
--
ALTER TABLE `permission`
  MODIFY `perm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `pimg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `product_options`
--
ALTER TABLE `product_options`
  MODIFY `propt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `prom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `promotiondetail`
--
ALTER TABLE `promotiondetail`
  MODIFY `promdt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `provider`
--
ALTER TABLE `provider`
  MODIFY `prov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `revenue`
--
ALTER TABLE `revenue`
  MODIFY `reve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cart_cus`) REFERENCES `customer` (`cus_id`);

--
-- Các ràng buộc cho bảng `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD CONSTRAINT `cartdetail_ibfk_1` FOREIGN KEY (`cartdt_cart`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cartdetail_ibfk_2` FOREIGN KEY (`cartdt_propt`) REFERENCES `product_options` (`propt_id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`cmt_prod`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `invoicedetail_ibfk_1` FOREIGN KEY (`invdt_invo`) REFERENCES `invoice` (`invo_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoicedetail_ibfk_2` FOREIGN KEY (`invdt_propt`) REFERENCES `product_options` (`propt_id`);

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
-- Các ràng buộc cho bảng `promotiondetail`
--
ALTER TABLE `promotiondetail`
  ADD CONSTRAINT `promotiondetail_ibfk_1` FOREIGN KEY (`promdt_prom`) REFERENCES `promotion` (`prom_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotiondetail_ibfk_2` FOREIGN KEY (`promdt_propt`) REFERENCES `product_options` (`propt_id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`perm_id`) REFERENCES `permission` (`perm_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`empl_id`) REFERENCES `employees` (`empl_id`);

DELIMITER $$
--
-- Sự kiện
--
CREATE DEFINER=`root`@`localhost` EVENT `UpdateStatusCart` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-06-07 17:19:28' ON COMPLETION NOT PRESERVE ENABLE DO update cart 
set cart.cart_status = 3 
where DATE_ADD(cart.cart_date,INTERVAL 10 DAY) < now() and cart_status NOT IN (2,3)$$

CREATE DEFINER=`root`@`localhost` EVENT `UpdateCommission` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-06-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
	DECLARE done INT DEFAULT 0;
    DECLARE _empl_id INT;
	DECLARE employees_cursor CURSOR FOR
    	SELECT empl_id
		FROM employees
		WHERE empl_status = 0 AND empl_id NOT IN (SELECT cms_empl FROM commission WHERE cms_month = month(now()) and cms_year=year(now())); 
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1; 
	
    OPEN employees_cursor;
		read_loop: LOOP
		FETCH employees_cursor INTO _empl_id;
		IF done THEN
		LEAVE read_loop;
		END IF;
		INSERT INTO commission(cms_month,cms_year,cms_empl,cms_total) VALUES (month(now()),year(now()),_empl_id,0);
		END LOOP;
	CLOSE employees_cursor;
END$$

CREATE DEFINER=`root`@`localhost` EVENT `UpdateStatusEndPromotion` ON SCHEDULE EVERY 1 SECOND STARTS '2019-06-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE promotion
SET promotion.prom_status = 2
WHERE now() > promotion.prom_end_date AND promotion.prom_status = 1$$

CREATE DEFINER=`root`@`localhost` EVENT `UpdateStatusStartPromotion` ON SCHEDULE EVERY 1 SECOND STARTS '2019-06-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE promotion SET promotion.prom_status = 1 WHERE promotion.prom_status = 0 AND promotion.prom_start_date <= now()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
