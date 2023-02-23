-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for 23_shoe_store
CREATE DATABASE IF NOT EXISTS `23_shoe_store` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `23_shoe_store`;

-- Dumping structure for table 23_shoe_store.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` char(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.admin: ~2 rows (approximately)
INSERT INTO `admin` (`id`, `name`, `email`, `password`, `level`) VALUES
	(1, 'Admin', 'admin_23_shoe@gmail.com', '@Admin123', 2),
	(2, 'Super Admin', 'superadmin_23_shoe@gmail.com', '@Superadmin000', 1);

-- Dumping structure for table 23_shoe_store.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.categories: ~0 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `image`, `created_at`) VALUES
	(1, 'GIÀY NAM', '1677118613.jpg', '2023-02-23 02:16:53'),
	(2, 'GIÀY NỮ', '1677118656.jpg', '2023-02-23 02:17:36'),
	(3, 'THE MARS WOLF COLLECTION', '1677118738.jpg', '2023-02-23 02:18:58');

-- Dumping structure for table 23_shoe_store.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number` char(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_general_ci,
  `token` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.customers: ~2 rows (approximately)
INSERT INTO `customers` (`id`, `name`, `email`, `phone_number`, `address`, `password`, `token`) VALUES
	(15, 'Hùng Anh', 'hunganh020301@gmail.com', '+84389705823', 'Số 11 Hẻm 34/55/33 Vĩnh Tuy Phường Vĩnh Tuy  Hai Bà Trưng Hà Nội', '123', 'customer_63f6004c9f8fd1.655459321677066316'),
	(25, '123123131231', 'anhnguyendinhanhhung@gmail.com', '1231231312', '123123123', '123123', NULL);

-- Dumping structure for table 23_shoe_store.forgot_password
CREATE TABLE IF NOT EXISTS `forgot_password` (
  `customer_id` int NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.forgot_password: ~2 rows (approximately)
INSERT INTO `forgot_password` (`customer_id`, `token`, `created_at`) VALUES
	(15, 'nagvoROE1fMPWvvg23', '2023-02-23 09:25:09'),
	(25, 'vin967W6HwzhZ0uraG', '2023-02-23 09:26:58');

-- Dumping structure for table 23_shoe_store.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int DEFAULT NULL,
  `name_receiver` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number_receiver` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address_receiver` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_id` int DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_orders_customers` (`customer_id`),
  KEY `FK_orders_status` (`status_id`),
  CONSTRAINT `FK_orders_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `FK_orders_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.orders: ~4 rows (approximately)

-- Dumping structure for table 23_shoe_store.order_product
CREATE TABLE IF NOT EXISTS `order_product` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `FK_order_product_products` (`product_id`),
  CONSTRAINT `FK_order_product_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `FK_order_product_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.order_product: ~0 rows (approximately)

-- Dumping structure for table 23_shoe_store.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `price` float NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categoty_id` int DEFAULT NULL,
  `stylee_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `FK_products_categories` (`categoty_id`),
  KEY `FK_products_stylee` (`stylee_id`),
  CONSTRAINT `FK_products_categories` FOREIGN KEY (`categoty_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_products_stylee` FOREIGN KEY (`stylee_id`) REFERENCES `style` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.products: ~42 rows (approximately)
INSERT INTO `products` (`id`, `name`, `price`, `image`, `created_at`, `categoty_id`, `stylee_id`) VALUES
	(25, 'THE CLASSIC CHELSEA BOOT - BLACK', 2400000, '1676776457.jpg', '2023-02-19 03:14:17', 1, 1),
	(26, 'THE WILD WALK CHELSEA BOOT – BLACK', 2050000, '1676776568.jpg', '2023-02-19 03:16:08', 1, 1),
	(27, 'THE WOLF MINIMAL CHELSEA BOOT - TAN', 1700000, '1676776626.jpg', '2023-02-19 03:17:06', 1, 1),
	(28, 'THE WOLF MINIMAL CHELSEA BOOT - BLACK', 1700000, '1676776683.jpg', '2023-02-19 03:18:03', 1, 1),
	(29, 'THE WOLF MARBE CHUNKY CHELSEA BOOT - BEIGE', 2000000, '1676776780.jpg', '2023-02-19 03:19:40', 1, 1),
	(30, 'THE 4CM HEEL DERBY – BLACK LIZARD', 1700000, '1677072988.jpg', '2023-02-22 13:36:28', 1, 2),
	(31, 'THE ALPHA WOLF HARNESS BOOT - BLACK', 2450000, '1677073084.jpg', '2023-02-22 13:38:04', 1, 5),
	(32, 'THE ALPHA WOLF HARNESS BOOT - TOBACCO', 2450000, '1677073800.jpg', '2023-02-22 13:50:00', 1, 5),
	(33, 'THE BASIC WOLF OXFORD - BLACK', 1500000, '1677074843.jpg', '2023-02-22 14:07:23', 1, 7),
	(34, 'THE CLASSIC CHELSEA BOOT - ĐEN DA LỘN', 1800000, '1677074997.jpg', '2023-02-22 14:09:57', 1, 1),
	(35, 'THE MARS WOLF CHELSEA BOOT - BLACK', 2400000, '1677077159.jpg', '2023-02-22 14:45:59', 1, 1),
	(36, 'THE MARS WOLF CHELSEA BOOT - BLACK SUEDE', 2400000, '1677077288.jpg', '2023-02-22 14:48:08', 1, 1),
	(37, 'THE MARS WOLF CHELSEA BOOT - TAN SUEDE', 2400000, '1677077417.jpg', '2023-02-22 14:50:17', 1, 1),
	(38, 'THE MARS WOLF CHELSEA BOOT SPECIAL EDITION - BLACK', 2600000, '1677077555.jpg', '2023-02-22 14:52:35', 1, 1),
	(39, 'THE MARS WOLF DERBY - BLACK', 2450000, '1677077619.jpg', '2023-02-22 14:53:39', 1, 2),
	(40, 'THE MARS WOLF HIGH COMBAT BOOT - BLACK', 2900000, '1677077744.jpg', '2023-02-22 14:55:44', 1, 6),
	(41, 'THE MARS WOLF MID COMBAT BOOT - BLACK', 2800000, '1677077841.jpg', '2023-02-22 14:57:21', 1, 6),
	(42, 'THE MODERN BROGUE DERBY – BLACK GRAIN AND WHITE', 1800000, '1677077917.jpg', '2023-02-22 14:58:37', 1, 2),
	(43, 'THE MODERN DERBY – BLACK', 1600000, '1677078027.jpg', '2023-02-22 15:00:27', 1, 2),
	(44, 'THE MODERN DERBY – BLACK GRAIN', 1800000, '1677078094.jpg', '2023-02-22 15:01:34', 1, 2),
	(45, 'THE WILD WALK CHELSEA BOOT – BLACK LIZARD', 2200000, '1677078352.jpg', '2023-02-22 15:05:52', 1, 1),
	(46, 'THE WILD WALK CHELSEA BOOT – BLACK SUEDE', 2050000, '1677078406.jpg', '2023-02-22 15:06:46', 1, 1),
	(47, 'THE WILD WALK CHELSEA BOOT – TAN', 2050000, '1677078451.jpg', '2023-02-22 15:07:31', 1, 1),
	(48, 'THE WOLF CHUNKY CHELSEA BOOT - BLACK', 2000000, '1677078516.jpg', '2023-02-22 15:08:36', 1, 1),
	(49, 'THE WOLF CHUNKY COMBAT BOOT - BLACK', 2200000, '1677078609.jpg', '2023-02-22 15:10:09', 1, 6),
	(50, 'THE WOLF CHUNKY DERBY - BLACK', 2000000, '1677078675.jpg', '2023-02-22 15:11:15', 1, 2),
	(51, 'THE WOLF CHUNKY DERBY - BLACK WHITE', 2000000, '1677078746.jpg', '2023-02-22 15:12:26', 1, 2),
	(52, 'THE WOLF CHUNKY DERBY 4 EYELET - BLACK', 2000000, '1677078798.jpg', '2023-02-22 15:13:18', 1, 2),
	(53, 'THE WOLF CHUNKY LOAFER - BLACK', 2000000, '1677078872.jpg', '2023-02-22 15:14:32', 1, 3),
	(54, 'THE WOLF CHUNKY LOAFER - BLACK WHITE', 2000000, '1677078929.jpg', '2023-02-22 15:15:29', 1, 3),
	(55, 'THE WOLF MARBE CHUNKY COMBAT BOOT - BEIGE', 2200000, '1677079111.jpg', '2023-02-22 15:18:31', 1, 6),
	(56, 'THE WOLF MARBE CHUNKY DERBY - BEIGE', 2000000, '1677079161.jpg', '2023-02-22 15:19:21', 1, 2),
	(57, 'THE WOLF MARBE CHUNKY LOAFER - BEIGE', 2000000, '1677079207.jpg', '2023-02-22 15:20:07', 1, 3),
	(58, 'THE WOLF SLIPPER - BLACK', 1500000, '1677079293.jpg', '2023-02-22 15:21:33', 1, 4),
	(59, 'THEWOLF MINIMAL LOAFER - BLACK', 1600000, '1677079343.jpg', '2023-02-22 15:22:23', 1, 3),
	(60, 'THEWOLF MINIMAL LOAFER - TAN', 1600000, '1677079366.jpg', '2023-02-22 15:22:46', 1, 3),
	(61, 'THEWOLF MODERN EVA BROGUE DERBY - BLACK', 2000000, '1677079468.jpg', '2023-02-22 15:24:28', 1, 2),
	(62, 'THEWOLF MODERN EVA DERBY - BLACK', 1800000, '1677079577.jpg', '2023-02-22 15:26:17', 1, 2),
	(63, 'THEWOLF MODERN EVA LOAFER - BLACK', 1900000, '1677079678.jpg', '2023-02-22 15:27:58', 1, 3),
	(64, 'THEWOLF MODERN S SLIPPER - BLACK', 1700000, '1677079746.jpg', '2023-02-22 15:29:06', 1, 4),
	(65, 'THEWOLF PENNY LOAFER - BLACK', 1700000, '1677079822.jpg', '2023-02-22 15:30:22', 1, 3),
	(66, 'THEWOLF PENNY LOAFER - BLACK WHITE', 1700000, '1677079872.jpg', '2023-02-22 15:31:12', 1, 3);

-- Dumping structure for table 23_shoe_store.product_details
CREATE TABLE IF NOT EXISTS `product_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `color` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `material` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `material_sole` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Cao su cao cấp',
  `socklining` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Da dê',
  `elastic_gusset` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `height_heel` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logo_signature` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `shoe_structure` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_product_details_products` (`product_id`),
  CONSTRAINT `FK_product_details_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.product_details: ~37 rows (approximately)
INSERT INTO `product_details` (`id`, `product_id`, `color`, `material`, `material_sole`, `socklining`, `elastic_gusset`, `height_heel`, `logo_signature`, `shoe_structure`, `created_at`) VALUES
	(2, 30, 'Black Lizard', 'Da bò nhập khẩu', 'Cao su cao cấp', 'Da dê', '', '4,3 cm', '', NULL, '2023-02-22 13:37:20'),
	(3, 31, 'Đen', 'Da bò Ý', 'Cao su cao cấp', 'Da dê', '', '4,3 cm', '', 'Blake Stitch (Khâu xuyên đế)', '2023-02-22 13:41:27'),
	(4, 25, 'Đen láng', 'Da bò nhập khẩu', 'Cao su cao cấp', 'Vải canvas cao cấp, da dê', '', '2,5 cm', '', '', '2023-02-22 13:43:49'),
	(5, 26, 'Đen ', 'Da bò nhập khẩu', 'Cao su cao cấp', 'Da dê', '', '4,3 cm', '', '', '2023-02-22 13:45:02'),
	(6, 27, 'Tan', 'Da bò nhập khẩu', 'Cao su cao cấp', 'Vải canvas cao cấp, da dê', '', '3,8 cm', '', '', '2023-02-22 13:45:49'),
	(7, 28, 'Đen láng', 'Da bò nhập khẩu', 'Cao su cao cấp', 'Vải canvas cao cấp, da dê', '', '3,8 cm', '', '', '2023-02-22 13:47:08'),
	(8, 29, 'Beige.', 'Da bò nhập khẩu. ', 'Cao su cao cấp', 'Da dê', '', '5,5 cm.', 'Dấu X được may thủ công sau gót, đôi giày sẽ có 2 pulltab giúp việc xỏ chân trở nên dễ dàng hơn. ', '', '2023-02-22 13:48:34'),
	(9, 32, 'Tobacco', 'Da bò Ý', 'Cao su cao cấp', 'Da dê', '', '4,3 cm', '', 'Blake Stitch (Khâu xuyên đế)', '2023-02-22 14:05:18'),
	(10, 33, 'Đen', 'Da bò nhập khẩu', 'Cao su cao cấp', 'Vải canvas cao cấp, da dê', '', '3,8 cm', '', '', '2023-02-22 14:07:48'),
	(11, 34, 'Đen da lộn', 'Da bò nhập khẩu', 'Cao su cao cấp', 'Da dê', '', '2,5 cm', '', '', '2023-02-22 14:45:10'),
	(12, 35, 'đen láng.', 'Da bò nhập khẩu', 'cao su cao cấp, có độ bám dính cao. ', 'da dê + vải canvas cao cấp.', 'có độ co giản tốt, bền theo thời gian. ', '6cm. ', 'được dập chìm trên phần cổ bên ngoài đôi giày.', '', '2023-02-22 14:46:49'),
	(13, 36, 'đen da lộn. ', 'Da bò nhập khẩu', 'cao su cao cấp, có độ bám dính cao. ', 'da dê + vải canvas cao cấp.', 'có độ co giản tốt, bền theo thời gian. ', '6cm. ', 'được dập chìm trên phần cổ bên ngoài đôi giày. ', '', '2023-02-22 14:48:48'),
	(14, 37, ' tan da lộn. ', 'Da bò nhập khẩu', 'cao su cao cấp, có độ bám dính cao. ', 'da dê + vải canvas cao cấp.', 'có độ co giản tốt, bền theo thời gian. ', '6cm. ', 'được dập chìm trên phần cổ bên ngoài đôi giày.', '', '2023-02-22 14:50:51'),
	(15, 38, 'đen láng + đen hạt. ', 'Da bò nhập khẩu', 'cao su cao cấp, có độ bám dính cao. ', 'da dê + vải canvas cao cấp.', 'có độ co giản tốt, bền theo thời gian. ', '6cm. ', 'được dập chìm trên phần cổ bên ngoài đôi giày.', '', '2023-02-22 14:52:58'),
	(16, 39, 'đen láng + đen hột. ', 'Da bò nhập khẩu', 'cao su cao cấp, có độ bám dính cao. ', 'da dê + vải canvas cao cấp.', 'có độ co giản tốt, bền theo thời gian. ', '6cm. ', 'Tag da Logo Signature THEWOLF.', '', '2023-02-22 14:54:42'),
	(17, 40, 'đen láng + đen hột. ', 'Da bò nhập khẩu', 'cao su cao cấp, có độ bám dính cao. ', 'da dê + vải canvas cao cấp.', 'có độ co giản tốt, bền theo thời gian. ', '6cm. ', 'Tag da Logo Signature THEWOLF. ', 'Kĩ thuật bóp viền thủ công trong ngành giày. ', '2023-02-22 14:56:23'),
	(18, 41, 'đen láng + đen hột. ', 'Da bò nhập khẩu', 'cao su cao cấp, có độ bám dính cao. ', 'da dê + vải canvas cao cấp.', 'có độ co giản tốt, bền theo thời gian. ', '6cm. ', 'Tag da Logo Signature THEWOLF.', 'Kĩ thuật bóp viền thủ công trong ngành giày. ', '2023-02-22 14:57:48'),
	(19, 42, 'Black Grain and White', 'Da bò nhập khẩu', 'Cao su cao cấp', 'Vải canvas cao cấp, da dê', '', '3,5cm.', '', '', '2023-02-22 14:59:04'),
	(20, 43, 'Đen láng', 'Da bò nhập khẩu', 'Cao su cao cấp', 'Vải canvas cao cấp, da dê', '', '3,5cm.', '', '', '2023-02-22 15:00:57'),
	(21, 44, 'Black Grain', 'Da bò nhập khẩu', 'Cao su cao cấp', 'Da dê', '', '3,5cm.', '', '', '2023-02-22 15:01:50'),
	(22, 45, 'Đen Lizard', 'Da bò nhập khẩu', 'Cao su cao cấp', 'Da dê', '', '4,3 cm', '', '', '2023-02-22 15:06:09'),
	(23, 46, 'Đen láng', 'Da bò nhập khẩu', 'Cao su cao cấp', 'Da dê', 'có độ co giản tốt, bền theo thời gian. ', '4,3 cm', '', '', '2023-02-22 15:07:08'),
	(24, 47, 'Đen láng', 'Da bò nhập khẩu', 'Cao su cao cấp', 'Da dê', 'có độ co giản tốt, bền theo thời gian. ', '4,3 cm', '', '', '2023-02-22 15:08:02'),
	(25, 48, 'Đen láng. ', 'Da bò nhập khẩu. ', 'Cao su cao cấp', 'Da dê', 'có độ co giản tốt, bền theo thời gian. ', '5,5 cm.', 'Dấu X được may thủ công sau gót, đôi giày sẽ có 2 pulltab giúp việc xỏ chân trở nên dễ dàng hơn. ', '', '2023-02-22 15:09:21'),
	(26, 49, 'Đen láng. ', 'Da bò nhập khẩu. ', 'Cao su cao cấp', 'Da dê', 'có độ co giản tốt, bền theo thời gian. ', '5,5 cm.', 'Dấu X được may thủ công sau gót, đầu cột dây làm bằng thép không gỉ, phần lưỡi gà có may logo THEWOLF.', '', '2023-02-22 15:10:40'),
	(27, 50, 'Đen láng. ', 'Da bò nhập khẩu. ', 'Cao su cao cấp', 'Da dê', '', '5,5 cm.', 'Dấu X được may thủ công sau gót, đầu cột dây làm bằng thép không gỉ, phần mũi giày được may thủ công bằng tay, với đường chỉ lớn, tạo điểm nhấn cho đôi giày. ', '', '2023-02-22 15:11:47'),
	(28, 51, 'Đen Trắng. ', 'Da bò nhập khẩu. ', 'Cao su cao cấp', 'Da dê', '', '5,5 cm.', 'Dấu X được may thủ công sau gót, đầu cột dây làm bằng thép không gỉ, phần mũi giày được may thủ công bằng tay, với đường chỉ lớn, tạo điểm nhấn cho đôi giày. ', '', '2023-02-22 15:12:49'),
	(29, 52, 'Đen láng. ', 'Da bò nhập khẩu', 'Cao su cao cấp', 'Da dê', '', '5,5 cm.', '', '', '2023-02-22 15:13:35'),
	(30, 53, 'Đen láng. ', 'Da bò nhập khẩu.', 'Cao su cao cấp', 'Da dê', '', '5,5 cm.', '', '', '2023-02-22 15:14:56'),
	(31, 54, 'Đen Trắng. ', 'Da bò nhập khẩu. ', 'Cao su cao cấp', 'Da dê', '', '5,5 cm.', '', '', '2023-02-22 15:15:50'),
	(32, 55, 'Beige.', 'Da bò nhập khẩu. ', 'Cao su cao cấp', 'Da dê', '', '5,5 cm.', 'Dấu X được may thủ công sau gót, đầu cột dây làm bằng thép không gỉ, phần lưỡi gà có may logo THEWOLF. ', '', '2023-02-22 15:18:54'),
	(33, 56, 'Beige.', 'Da bò nhập khẩu. ', 'Cao su cao cấp', 'Da dê', '', '5,5 cm.', 'Dấu X được may thủ công sau gót, đầu cột dây làm bằng thép không gỉ, phần mũi giày được may thủ công bằng tay, với đường chỉ lớn, tạo điểm nhấn cho đôi giày.', '', '2023-02-22 15:19:40'),
	(34, 57, 'Beige.', 'Da bò nhập khẩu. ', 'Cao su cao cấp', 'Da dê', '', '5,5 cm.', '', '', '2023-02-22 15:20:20'),
	(35, 58, 'Đen', 'Da bò nhập khẩu', 'Cao su cao cấp', 'Da dê', '', '3,5cm.', '', '', '2023-02-22 15:21:57'),
	(36, 59, 'Đen láng. ', 'Da bò nhập khẩu. ', 'Cao su cao cấp', 'da dê + vải canvas cao cấp. ', '', '3,8 cm', '', '', '2023-02-22 15:23:11'),
	(37, 60, 'Tan.', 'Da bò nhập khẩu. ', 'Cao su cao cấp', 'Da dê', '', '3,8cm.', '', '', '2023-02-22 15:23:29'),
	(38, 61, 'Đen láng. ', 'da bò đen láng + da bò hột đen láng.', 'cao su nguyên chất + đế EVA ở giữa. ', 'da dê + vải canvas cao cấp. ', '', '4,5cm', '', 'Sử dụng kỹ thuật bóp viền, một kĩ thuật đòi hỏi kĩ năng của người thợ làm giày. Chỉ giày to và được may đồng đều.', '2023-02-22 15:25:29'),
	(39, 62, 'Đen láng. ', 'da bò đen láng + da bò hột đen láng.', 'cao su nguyên chất + đế EVA ở giữa. ', 'da dê + vải canvas cao cấp. ', '', '4,5cm', '', 'Sử dụng kỹ thuật bóp viền, một kĩ thuật đòi hỏi kĩ năng của người thợ làm giày. Chỉ giày to và được may đồng đều.', '2023-02-22 15:26:42'),
	(40, 63, 'Đen láng. ', 'da bò đen láng + da bò hột đen láng.', 'cao su nguyên chất + đế EVA ở giữa. ', 'da dê + vải canvas cao cấp. ', '', '4,5cm', 'Horsebit được làm bằng hợp kim không ghỉ, được thiết kế bởi THEWOLF. ', 'Sử dụng kỹ thuật bóp viền, một kĩ thuật đòi hỏi kĩ năng của người thợ làm giày. Chỉ giày to và được may đồng đều.', '2023-02-22 15:28:32'),
	(41, 64, 'Đen láng. ', 'da bò đen láng + da bò hột đen láng.', 'cao su nguyên chất. ', 'da dê + vải canvas cao cấp. ', '', '4,5cm.', '', 'Sử dụng kỹ thuật bóp viền, một kĩ thuật đòi hỏi kĩ năng của người thợ làm giày. Chỉ giày to và được may đồng đều.', '2023-02-22 15:29:29'),
	(42, 65, 'Đen láng. ', 'Da bò nhập khẩu. ', 'Cao su cao cấp', 'Da dê', '', '3,5cm.', '', '', '2023-02-22 15:30:39'),
	(43, 66, 'Trắng Đen.', 'Da bò nhập khẩu. ', 'Cao su cao cấp', 'Da dê', '', '3,5cm.', '', '', '2023-02-22 15:31:36');

-- Dumping structure for table 23_shoe_store.product_size
CREATE TABLE IF NOT EXISTS `product_size` (
  `product_id` int NOT NULL,
  `size_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`,`size_id`),
  KEY `FK_product_size_size` (`size_id`),
  CONSTRAINT `FK_product_size_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `FK_product_size_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.product_size: ~35 rows (approximately)
INSERT INTO `product_size` (`product_id`, `size_id`, `created_at`) VALUES
	(25, 2, '2023-02-19 03:14:17'),
	(25, 3, '2023-02-19 03:14:17'),
	(25, 4, '2023-02-19 03:14:17'),
	(25, 5, '2023-02-19 03:14:17'),
	(25, 6, '2023-02-19 03:14:17'),
	(25, 7, '2023-02-19 03:14:17'),
	(25, 8, '2023-02-19 03:14:17'),
	(26, 2, '2023-02-19 03:16:08'),
	(26, 3, '2023-02-19 03:16:08'),
	(26, 4, '2023-02-19 03:16:08'),
	(26, 5, '2023-02-19 03:16:08'),
	(26, 6, '2023-02-19 03:16:08'),
	(26, 7, '2023-02-19 03:16:08'),
	(26, 8, '2023-02-19 03:16:08'),
	(27, 2, '2023-02-19 03:17:06'),
	(27, 3, '2023-02-19 03:17:06'),
	(27, 4, '2023-02-19 03:17:06'),
	(27, 5, '2023-02-19 03:17:06'),
	(27, 6, '2023-02-19 03:17:06'),
	(27, 7, '2023-02-19 03:17:06'),
	(27, 8, '2023-02-19 03:17:06'),
	(28, 2, '2023-02-19 03:18:03'),
	(28, 3, '2023-02-19 03:18:03'),
	(28, 4, '2023-02-19 03:18:03'),
	(28, 5, '2023-02-19 03:18:03'),
	(28, 6, '2023-02-19 03:18:03'),
	(28, 7, '2023-02-19 03:18:03'),
	(28, 8, '2023-02-19 03:18:03'),
	(29, 2, '2023-02-19 03:19:40'),
	(29, 3, '2023-02-19 03:19:40'),
	(29, 4, '2023-02-19 03:19:40'),
	(29, 5, '2023-02-19 03:19:40'),
	(29, 6, '2023-02-19 03:19:40'),
	(29, 7, '2023-02-19 03:19:40'),
	(29, 8, '2023-02-19 03:19:40'),
	(30, 2, '2023-02-22 13:36:28'),
	(30, 3, '2023-02-22 13:36:28'),
	(30, 4, '2023-02-22 13:36:28'),
	(30, 5, '2023-02-22 13:36:28'),
	(30, 6, '2023-02-22 13:36:28'),
	(30, 7, '2023-02-22 13:36:28'),
	(30, 8, '2023-02-22 13:36:28'),
	(31, 2, '2023-02-22 13:38:04'),
	(31, 3, '2023-02-22 13:38:04'),
	(31, 4, '2023-02-22 13:38:04'),
	(31, 5, '2023-02-22 13:38:04'),
	(31, 6, '2023-02-22 13:38:04'),
	(31, 7, '2023-02-22 13:38:04'),
	(31, 8, '2023-02-22 13:38:04'),
	(32, 2, '2023-02-22 13:50:00'),
	(32, 3, '2023-02-22 13:50:00'),
	(32, 4, '2023-02-22 13:50:00'),
	(32, 5, '2023-02-22 13:50:00'),
	(32, 6, '2023-02-22 13:50:00'),
	(32, 7, '2023-02-22 13:50:00'),
	(32, 8, '2023-02-22 13:50:00'),
	(33, 2, '2023-02-22 14:07:23'),
	(33, 3, '2023-02-22 14:07:23'),
	(33, 4, '2023-02-22 14:07:23'),
	(33, 5, '2023-02-22 14:07:23'),
	(33, 6, '2023-02-22 14:07:23'),
	(33, 7, '2023-02-22 14:07:23'),
	(33, 8, '2023-02-22 14:07:23'),
	(34, 2, '2023-02-22 14:09:57'),
	(34, 3, '2023-02-22 14:09:57'),
	(34, 4, '2023-02-22 14:09:57'),
	(34, 5, '2023-02-22 14:09:57'),
	(34, 6, '2023-02-22 14:09:57'),
	(34, 7, '2023-02-22 14:09:58'),
	(34, 8, '2023-02-22 14:09:57'),
	(35, 2, '2023-02-22 14:45:59'),
	(35, 3, '2023-02-22 14:45:59'),
	(35, 4, '2023-02-22 14:45:59'),
	(35, 5, '2023-02-22 14:45:59'),
	(35, 6, '2023-02-22 14:45:59'),
	(35, 7, '2023-02-22 14:45:59'),
	(35, 8, '2023-02-22 14:45:59'),
	(36, 2, '2023-02-22 14:48:08'),
	(36, 3, '2023-02-22 14:48:08'),
	(36, 4, '2023-02-22 14:48:08'),
	(36, 5, '2023-02-22 14:48:08'),
	(36, 6, '2023-02-22 14:48:08'),
	(36, 7, '2023-02-22 14:48:08'),
	(36, 8, '2023-02-22 14:48:08'),
	(37, 2, '2023-02-22 14:50:17'),
	(37, 3, '2023-02-22 14:50:17'),
	(37, 4, '2023-02-22 14:50:17'),
	(37, 5, '2023-02-22 14:50:17'),
	(37, 6, '2023-02-22 14:50:17'),
	(37, 7, '2023-02-22 14:50:17'),
	(37, 8, '2023-02-22 14:50:17'),
	(38, 2, '2023-02-22 14:52:35'),
	(38, 3, '2023-02-22 14:52:35'),
	(38, 4, '2023-02-22 14:52:35'),
	(38, 5, '2023-02-22 14:52:35'),
	(38, 6, '2023-02-22 14:52:35'),
	(38, 7, '2023-02-22 14:52:35'),
	(38, 8, '2023-02-22 14:52:35'),
	(39, 2, '2023-02-22 14:53:39'),
	(39, 3, '2023-02-22 14:53:39'),
	(39, 4, '2023-02-22 14:53:39'),
	(39, 5, '2023-02-22 14:53:39'),
	(39, 6, '2023-02-22 14:53:39'),
	(39, 7, '2023-02-22 14:53:39'),
	(39, 8, '2023-02-22 14:53:39'),
	(40, 2, '2023-02-22 14:55:44'),
	(40, 3, '2023-02-22 14:55:44'),
	(40, 4, '2023-02-22 14:55:44'),
	(40, 5, '2023-02-22 14:55:44'),
	(40, 6, '2023-02-22 14:55:44'),
	(40, 7, '2023-02-22 14:55:44'),
	(40, 8, '2023-02-22 14:55:44'),
	(41, 2, '2023-02-22 14:57:21'),
	(41, 3, '2023-02-22 14:57:21'),
	(41, 4, '2023-02-22 14:57:21'),
	(41, 5, '2023-02-22 14:57:21'),
	(41, 6, '2023-02-22 14:57:21'),
	(41, 7, '2023-02-22 14:57:21'),
	(41, 8, '2023-02-22 14:57:21'),
	(42, 2, '2023-02-22 14:58:37'),
	(42, 3, '2023-02-22 14:58:37'),
	(42, 4, '2023-02-22 14:58:37'),
	(42, 5, '2023-02-22 14:58:37'),
	(42, 6, '2023-02-22 14:58:37'),
	(42, 7, '2023-02-22 14:58:37'),
	(42, 8, '2023-02-22 14:58:37'),
	(43, 2, '2023-02-22 15:00:27'),
	(43, 3, '2023-02-22 15:00:27'),
	(43, 4, '2023-02-22 15:00:27'),
	(43, 5, '2023-02-22 15:00:27'),
	(43, 6, '2023-02-22 15:00:27'),
	(43, 7, '2023-02-22 15:00:27'),
	(43, 8, '2023-02-22 15:00:27'),
	(44, 2, '2023-02-22 15:01:34'),
	(44, 3, '2023-02-22 15:01:34'),
	(44, 4, '2023-02-22 15:01:34'),
	(44, 5, '2023-02-22 15:01:34'),
	(44, 6, '2023-02-22 15:01:34'),
	(44, 7, '2023-02-22 15:01:34'),
	(44, 8, '2023-02-22 15:01:34'),
	(45, 2, '2023-02-22 15:05:52'),
	(45, 3, '2023-02-22 15:05:52'),
	(45, 4, '2023-02-22 15:05:52'),
	(45, 5, '2023-02-22 15:05:52'),
	(45, 6, '2023-02-22 15:05:52'),
	(45, 7, '2023-02-22 15:05:52'),
	(45, 8, '2023-02-22 15:05:52'),
	(46, 2, '2023-02-22 15:06:46'),
	(46, 3, '2023-02-22 15:06:46'),
	(46, 4, '2023-02-22 15:06:46'),
	(46, 5, '2023-02-22 15:06:46'),
	(46, 6, '2023-02-22 15:06:46'),
	(46, 7, '2023-02-22 15:06:46'),
	(46, 8, '2023-02-22 15:06:46'),
	(47, 2, '2023-02-22 15:07:31'),
	(47, 3, '2023-02-22 15:07:31'),
	(47, 4, '2023-02-22 15:07:31'),
	(47, 5, '2023-02-22 15:07:31'),
	(47, 6, '2023-02-22 15:07:31'),
	(47, 7, '2023-02-22 15:07:31'),
	(47, 8, '2023-02-22 15:07:31'),
	(48, 2, '2023-02-22 15:08:36'),
	(48, 3, '2023-02-22 15:08:36'),
	(48, 4, '2023-02-22 15:08:36'),
	(48, 5, '2023-02-22 15:08:36'),
	(48, 6, '2023-02-22 15:08:36'),
	(48, 7, '2023-02-22 15:08:36'),
	(48, 8, '2023-02-22 15:08:36'),
	(49, 2, '2023-02-22 15:10:09'),
	(49, 3, '2023-02-22 15:10:09'),
	(49, 4, '2023-02-22 15:10:09'),
	(49, 5, '2023-02-22 15:10:09'),
	(49, 6, '2023-02-22 15:10:09'),
	(49, 7, '2023-02-22 15:10:09'),
	(49, 8, '2023-02-22 15:10:09'),
	(50, 2, '2023-02-22 15:11:15'),
	(50, 3, '2023-02-22 15:11:15'),
	(50, 4, '2023-02-22 15:11:15'),
	(50, 5, '2023-02-22 15:11:15'),
	(50, 6, '2023-02-22 15:11:15'),
	(50, 7, '2023-02-22 15:11:15'),
	(50, 8, '2023-02-22 15:11:15'),
	(51, 2, '2023-02-22 15:12:26'),
	(51, 3, '2023-02-22 15:12:26'),
	(51, 4, '2023-02-22 15:12:26'),
	(51, 5, '2023-02-22 15:12:26'),
	(51, 6, '2023-02-22 15:12:26'),
	(51, 7, '2023-02-22 15:12:26'),
	(51, 8, '2023-02-22 15:12:26'),
	(52, 2, '2023-02-22 15:13:18'),
	(52, 3, '2023-02-22 15:13:18'),
	(52, 4, '2023-02-22 15:13:18'),
	(52, 5, '2023-02-22 15:13:18'),
	(52, 6, '2023-02-22 15:13:18'),
	(52, 7, '2023-02-22 15:13:18'),
	(52, 8, '2023-02-22 15:13:18'),
	(53, 2, '2023-02-22 15:14:32'),
	(53, 3, '2023-02-22 15:14:32'),
	(53, 4, '2023-02-22 15:14:32'),
	(53, 5, '2023-02-22 15:14:32'),
	(53, 6, '2023-02-22 15:14:32'),
	(53, 7, '2023-02-22 15:14:32'),
	(53, 8, '2023-02-22 15:14:32'),
	(54, 2, '2023-02-22 15:15:29'),
	(54, 3, '2023-02-22 15:15:29'),
	(54, 4, '2023-02-22 15:15:29'),
	(54, 5, '2023-02-22 15:15:29'),
	(54, 6, '2023-02-22 15:15:29'),
	(54, 7, '2023-02-22 15:15:29'),
	(54, 8, '2023-02-22 15:15:29'),
	(55, 2, '2023-02-22 15:18:31'),
	(55, 3, '2023-02-22 15:18:31'),
	(55, 4, '2023-02-22 15:18:31'),
	(55, 5, '2023-02-22 15:18:31'),
	(55, 6, '2023-02-22 15:18:31'),
	(55, 7, '2023-02-22 15:18:31'),
	(55, 8, '2023-02-22 15:18:31'),
	(56, 2, '2023-02-22 15:19:21'),
	(56, 3, '2023-02-22 15:19:21'),
	(56, 4, '2023-02-22 15:19:21'),
	(56, 5, '2023-02-22 15:19:21'),
	(56, 6, '2023-02-22 15:19:21'),
	(56, 7, '2023-02-22 15:19:21'),
	(56, 8, '2023-02-22 15:19:21'),
	(57, 2, '2023-02-22 15:20:07'),
	(57, 3, '2023-02-22 15:20:07'),
	(57, 4, '2023-02-22 15:20:07'),
	(57, 5, '2023-02-22 15:20:07'),
	(57, 6, '2023-02-22 15:20:07'),
	(57, 7, '2023-02-22 15:20:07'),
	(57, 8, '2023-02-22 15:20:07'),
	(58, 2, '2023-02-22 15:21:33'),
	(58, 3, '2023-02-22 15:21:33'),
	(58, 4, '2023-02-22 15:21:33'),
	(58, 5, '2023-02-22 15:21:33'),
	(58, 6, '2023-02-22 15:21:33'),
	(58, 7, '2023-02-22 15:21:33'),
	(58, 8, '2023-02-22 15:21:33'),
	(59, 2, '2023-02-22 15:22:23'),
	(59, 3, '2023-02-22 15:22:23'),
	(59, 4, '2023-02-22 15:22:23'),
	(59, 5, '2023-02-22 15:22:23'),
	(59, 6, '2023-02-22 15:22:23'),
	(59, 7, '2023-02-22 15:22:23'),
	(59, 8, '2023-02-22 15:22:23'),
	(60, 2, '2023-02-22 15:22:46'),
	(60, 3, '2023-02-22 15:22:46'),
	(60, 4, '2023-02-22 15:22:46'),
	(60, 5, '2023-02-22 15:22:46'),
	(60, 6, '2023-02-22 15:22:46'),
	(60, 7, '2023-02-22 15:22:46'),
	(60, 8, '2023-02-22 15:22:46'),
	(61, 2, '2023-02-22 15:24:28'),
	(61, 3, '2023-02-22 15:24:28'),
	(61, 4, '2023-02-22 15:24:28'),
	(61, 5, '2023-02-22 15:24:28'),
	(61, 6, '2023-02-22 15:24:28'),
	(61, 7, '2023-02-22 15:24:28'),
	(61, 8, '2023-02-22 15:24:28'),
	(62, 2, '2023-02-22 15:26:17'),
	(62, 3, '2023-02-22 15:26:17'),
	(62, 4, '2023-02-22 15:26:17'),
	(62, 5, '2023-02-22 15:26:17'),
	(62, 6, '2023-02-22 15:26:17'),
	(62, 7, '2023-02-22 15:26:17'),
	(62, 8, '2023-02-22 15:26:17'),
	(63, 2, '2023-02-22 15:27:58'),
	(63, 3, '2023-02-22 15:27:58'),
	(63, 4, '2023-02-22 15:27:58'),
	(63, 5, '2023-02-22 15:27:58'),
	(63, 6, '2023-02-22 15:27:58'),
	(63, 7, '2023-02-22 15:27:58'),
	(63, 8, '2023-02-22 15:27:58'),
	(64, 2, '2023-02-22 15:29:06'),
	(64, 3, '2023-02-22 15:29:06'),
	(64, 4, '2023-02-22 15:29:06'),
	(64, 5, '2023-02-22 15:29:06'),
	(64, 6, '2023-02-22 15:29:06'),
	(64, 7, '2023-02-22 15:29:06'),
	(64, 8, '2023-02-22 15:29:06'),
	(65, 2, '2023-02-22 15:30:22'),
	(65, 3, '2023-02-22 15:30:22'),
	(65, 4, '2023-02-22 15:30:22'),
	(65, 5, '2023-02-22 15:30:22'),
	(65, 6, '2023-02-22 15:30:22'),
	(65, 7, '2023-02-22 15:30:22'),
	(65, 8, '2023-02-22 15:30:22'),
	(66, 2, '2023-02-22 15:31:12'),
	(66, 3, '2023-02-22 15:31:12'),
	(66, 4, '2023-02-22 15:31:12'),
	(66, 5, '2023-02-22 15:31:12'),
	(66, 6, '2023-02-22 15:31:12'),
	(66, 7, '2023-02-22 15:31:12'),
	(66, 8, '2023-02-22 15:31:12');

-- Dumping structure for table 23_shoe_store.size
CREATE TABLE IF NOT EXISTS `size` (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `value` (`value`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.size: ~7 rows (approximately)
INSERT INTO `size` (`id`, `value`, `created_at`) VALUES
	(2, 39, '2023-02-15 15:57:53'),
	(3, 40, '2023-02-15 15:57:53'),
	(4, 41, '2023-02-15 15:57:53'),
	(5, 42, '2023-02-15 15:57:53'),
	(6, 43, '2023-02-15 15:57:53'),
	(7, 44, '2023-02-15 15:57:53'),
	(8, 38, '2023-02-15 23:20:00');

-- Dumping structure for table 23_shoe_store.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.status: ~4 rows (approximately)
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Chờ xác nhận'),
	(2, 'Đang chuẩn bị đơn hàng'),
	(3, 'Đang giao hàng'),
	(4, 'Đã giao hàng'),
	(5, 'Đã huỷ');

-- Dumping structure for table 23_shoe_store.style
CREATE TABLE IF NOT EXISTS `style` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.style: ~0 rows (approximately)
INSERT INTO `style` (`id`, `name`, `image`, `created_at`) VALUES
	(1, 'CHELSEA BOOT', '1677119362.png', '2023-02-23 02:29:22'),
	(2, 'DERBY', '1677119385.jpg', '2023-02-23 02:29:45'),
	(3, 'LOAFER', '1677119407.jpg', '2023-02-23 02:30:07'),
	(4, 'SLIPPER', '1677119423.', '2023-02-23 02:30:23'),
	(5, 'HARNESS BOOT', '1677119445.jpg', '2023-02-23 02:30:45'),
	(6, 'COMBAT BOOT', '1677119456.jpg', '2023-02-23 02:30:56'),
	(7, 'OXFORD', '1677119469.', '2023-02-23 02:31:09');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
