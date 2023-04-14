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
  `manufacturer_id` int DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_categories_manufacturers` (`manufacturer_id`),
  CONSTRAINT `FK_categories_manufacturers` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.categories: ~39 rows (approximately)
INSERT INTO `categories` (`id`, `manufacturer_id`, `name`, `created_at`) VALUES
	(4, 4, 'Air Jordan', '2023-03-11 03:49:58'),
	(5, 3, 'Yeezy', '2023-03-12 15:36:08'),
	(6, 3, 'Superstar', '2023-03-12 15:37:03'),
	(7, 3, 'Stan Smith', '2023-03-12 15:37:21'),
	(8, 3, 'Ultraboost', '2023-03-12 15:37:31'),
	(9, 3, 'Human Race', '2023-03-12 15:37:44'),
	(10, 3, 'NMD', '2023-03-12 15:37:56'),
	(11, 4, 'Air Force 1', '2023-03-12 15:39:21'),
	(12, 4, 'Air Max', '2023-03-12 15:39:39'),
	(13, 4, 'Nike Dunk', '2023-03-12 15:39:57'),
	(14, 4, 'Nike React', '2023-03-12 15:40:42'),
	(15, 4, 'Cortez', '2023-03-12 15:41:26'),
	(16, 4, 'Air Zoom', '2023-03-12 15:41:40'),
	(17, 5, 'PUMA THUNDER', '2023-03-12 15:42:05'),
	(18, 5, 'PUMA SUEDE', '2023-03-12 15:42:13'),
	(19, 5, 'PUMA RS', '2023-03-12 15:42:21'),
	(20, 5, 'PUMA RIDER', '2023-03-12 15:42:28'),
	(21, 5, 'Các dòng PUMA khác', '2023-03-12 15:43:13'),
	(22, 3, 'Các dòng ADIDAS khác', '2023-03-12 15:43:29'),
	(23, 4, 'Các dòng NIKE khác', '2023-03-12 15:43:41'),
	(24, 8, 'MBL MULE', '2023-03-12 15:43:59'),
	(25, 8, 'MBL PLAYBALL', '2023-03-12 15:44:09'),
	(26, 8, 'MBL LINER', '2023-03-12 15:44:17'),
	(27, 8, 'MBL CHUNKY', '2023-03-12 15:44:34'),
	(28, 6, 'Old Skool', '2023-03-12 15:45:19'),
	(29, 6, 'One star', '2023-03-12 15:45:36'),
	(30, 6, 'Vans Era', '2023-03-12 15:45:50'),
	(31, 6, 'Style 36', '2023-03-12 15:46:12'),
	(32, 6, 'Slip-on', '2023-03-12 15:46:24'),
	(33, 7, 'New Balance 550', '2023-03-12 15:47:28'),
	(34, 7, 'New Balance 327', '2023-03-12 15:47:49'),
	(35, 7, 'New Balance 574', '2023-03-12 15:48:16'),
	(36, 7, 'New Balance 57/40', '2023-03-12 15:48:27'),
	(37, 7, 'Các dòng New Balance khác', '2023-03-12 15:48:59'),
	(38, 9, 'Chuck 70', '2023-03-12 15:49:35'),
	(39, 9, 'Chuck Taylor', '2023-03-12 15:50:23'),
	(40, 9, 'Run Star Hike', '2023-03-12 15:51:03'),
	(41, 9, 'Các dòng Converse khác', '2023-03-12 15:52:06'),
	(43, 4, 'Nike Blazer', '2023-03-12 17:44:26');

-- Dumping structure for table 23_shoe_store.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number` char(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_general_ci,
  `token` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.customers: ~3 rows (approximately)
INSERT INTO `customers` (`id`, `name`, `birthday`, `email`, `phone_number`, `address`, `password`, `token`) VALUES
	(15, 'Hùng Anh', '2023-03-03', 'hunganh020301@gmail.com', '+84389705823', 'Số 11 Hẻm 34/55/33 Vĩnh Tuy Phường Vĩnh Tuy  Hai Bà Trưng Hà Nội', '123123A1233', 'customer_643457d95e9cc6.643943441681151961'),
	(25, '123123131231', NULL, 'anhnguyendinhanhhung@gmail.com', '1231231312', '123123123', '123123', NULL),
	(26, '', NULL, 'customer1@mail.com', '', '', 'a123123123', NULL);

-- Dumping structure for table 23_shoe_store.forgot_password
CREATE TABLE IF NOT EXISTS `forgot_password` (
  `customer_id` int NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `token` (`token`),
  CONSTRAINT `FK_forgot_password_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.forgot_password: ~1 rows (approximately)
INSERT INTO `forgot_password` (`customer_id`, `token`, `created_at`) VALUES
	(25, 'LowjHU3yNZdMGG6Hy5', '2023-04-10 18:28:10');

-- Dumping structure for table 23_shoe_store.manufacturers
CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.manufacturers: ~11 rows (approximately)
INSERT INTO `manufacturers` (`id`, `name`, `image`, `created_at`) VALUES
	(3, 'Adidas', '1679194476.png', '2023-03-10 04:43:35'),
	(4, 'Nike', '1679194325.png', '2023-03-11 03:15:13'),
	(5, 'Puma', '1679194181.png', '2023-03-11 03:21:17'),
	(6, 'Vans', '1679194810.png', '2023-03-11 03:21:22'),
	(7, 'New Balance', '1679194941.png', '2023-03-11 03:21:32'),
	(8, 'MLB', '1679195275.png', '2023-03-11 03:21:47'),
	(9, 'Converse', '1679195730.png', '2023-03-11 03:22:00'),
	(10, 'Louis Vuitton', '1679195749.png', '2023-03-11 03:23:13'),
	(11, 'Saint Laurent', '1679195827.png', '2023-03-11 03:23:20'),
	(12, 'Fila', '1679196167.png', '2023-03-11 03:23:25'),
	(13, 'Dior', '1679196295.png', '2023-03-11 03:23:29');

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
  `shipping_method` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `payment_method` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_orders_customers` (`customer_id`),
  KEY `FK_orders_status` (`status_id`),
  CONSTRAINT `FK_orders_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `FK_orders_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.orders: ~4 rows (approximately)
INSERT INTO `orders` (`id`, `customer_id`, `name_receiver`, `phone_number_receiver`, `address_receiver`, `status_id`, `total_price`, `created_at`, `shipping_method`, `payment_method`) VALUES
	(13, 15, 'Hùng Anh1', '+84389705823', 'Số 11 Hẻm 34/55/33 Vĩnh Tuy Phường Vĩnh Tuy  Hai Bà Trưng Hà Nội', 3, 5290000, '2023-04-02 04:03:31', 'cod', 'bacs'),
	(14, 15, 'Hùng Anh1', '+84389705823', 'Số 11 Hẻm 34/55/33 Vĩnh Tuy Phường Vĩnh Tuy  Hai Bà Trưng Hà Nội', 3, 5290000, '2023-04-02 04:03:31', 'cod', 'bacs'),
	(16, 15, 'Hùng Anh1', '+84389705823', 'Số 11 Hẻm 34/55/33 Vĩnh Tuy Phường Vĩnh Tuy  Hai Bà Trưng Hà Nội', 4, 21080000, '2023-03-03 04:32:48', 'cod', 'bacs'),
	(17, 15, 'Hùng Anh1', '+84389705823', 'Số 11 Hẻm 34/55/33 Vĩnh Tuy Phường Vĩnh Tuy  Hai Bà Trưng Hà Nội', 2, 21080000, '2023-03-03 04:32:48', 'cod', 'bacs');

-- Dumping structure for table 23_shoe_store.order_product
CREATE TABLE IF NOT EXISTS `order_product` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `FK_order_product_products` (`product_id`),
  CONSTRAINT `FK_order_product_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `FK_order_product_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.order_product: ~3 rows (approximately)
INSERT INTO `order_product` (`order_id`, `product_id`, `quantity`, `created_at`) VALUES
	(14, 68, 1, '2023-04-03 04:03:31'),
	(16, 71, 1, '2023-04-03 04:32:48'),
	(16, 72, 1, '2023-04-03 04:32:48');

-- Dumping structure for table 23_shoe_store.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `price` float NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sub_category_id` int DEFAULT NULL,
  `sub_image` text COLLATE utf8mb4_general_ci,
  `description` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `FK_products_style1` (`sub_category_id`) USING BTREE,
  CONSTRAINT `FK_products_sub_category` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=306 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.products: ~236 rows (approximately)
INSERT INTO `products` (`id`, `name`, `price`, `image`, `created_at`, `sub_category_id`, `sub_image`, `description`) VALUES
	(68, 'Giày New Balance 550 ‘Shifted Sport Pack – Team Royal’', 5290000, '1678692645.webp', '2023-03-13 07:30:45', 63, NULL, 'New Balance tưng bừng khai trương cửa hàng lớn đầu tiên với vô vàn ưu đãi tuyệt vời!\r\n\r\nNối tiếp sau thành công của cửa hàng nhỏ tại tầng 3, Diamond Plaza, Tp. Hồ Chí Minh, cửa hàng lớn (flagship store) đầu tiên, trang trí theo đúng tiêu chuẩn của New Balance trên thế giới, sẽ khai trương tại số 30 Nguyễn Trãi, Q. 1, Tp. Hồ Chí Minh vào ngày 18/01/2014.\r\n\r\nCửa hàng sẽ mang đến cho bạn những mẫu giày cùng các trang phục thể thao mới nhất năm nay của New Balance!\r\n\r\nKhám phá cửa hàng mới, hào hứng cùng những bộ sưu tập năm nay và thêm phần hứng khởi với những ưu đãi hấp dẫn.\r\n\r\nƯu đãi ngày khai trương – 18/01/2014\r\n\r\n100 khách hàng đầu tiên sẽ được giảm ngay 25% cho tất cả sản phẩm (Chỉ trong 01 ngày duy nhất).'),
	(70, 'Giày Nike Air Jordan 1 Retro High 85 ‘Black White’', 10890000, '1678699777.webp', '2023-03-13 09:29:37', 10, NULL, 'a'),
	(71, 'Giày Air Jordan 2 Jumpman Trey ‘Bred Concord’', 5290000, '1678700046.webp', '2023-03-13 09:34:06', 11, NULL, 'a'),
	(72, 'Giày Nike Air Jordan 2 Retro Low SP Off-White ‘Black Blue’', 15790000, '1678700079.webp', '2023-03-13 09:34:39', 11, NULL, 'a'),
	(73, 'Giày Nike Blazer Low 77 Jumbo WNTR Sail Pro Green Gum', 3490000, '1678715520.webp', '2023-03-13 13:52:00', 31, NULL, 'a'),
	(74, 'Giày Nike Blazer Low ’77 Jumbo ‘Alabaster White’', 2390000, '1678715583.webp', '2023-03-13 13:53:03', 31, NULL, 'a'),
	(75, 'Giày Nike Blazer Low ’77 Vintage ‘White Washed Teal’', 2590000, '1678715609.webp', '2023-03-13 13:53:29', 31, NULL, 'a'),
	(76, 'Giày Nike Blazer Low 77 Jumbo ‘White University Red’', 3090000, '1678715632.webp', '2023-03-13 13:53:52', 31, NULL, 'a'),
	(77, 'Giày Nike Blazer Low 77 Shadow Halloween', 3690000, '1678715667.webp', '2023-03-13 13:54:27', 31, NULL, 'a'),
	(78, 'Giày Nike BLAZER MID 77 – ‘LX Black’', 2590000, '1678715691.webp', '2023-03-13 13:54:51', 32, NULL, 'a'),
	(79, 'Giày Nike BLAZER MID 77 – ‘Color Code Black’', 2590000, '1678715715.webp', '2023-03-13 13:55:15', 32, NULL, 'a'),
	(80, 'Giày Nike BLAZER MID 77 – ‘Habanero Red’', 2590000, '1678715736.webp', '2023-03-13 13:55:36', 32, NULL, 'a'),
	(81, 'Giày Nike BLAZER MID 77 ‘Infinite Black/White’', 2590000, '1678715765.webp', '2023-03-13 13:56:05', 32, NULL, 'a'),
	(82, 'Giày Nike Blazer Low ’77 ‘Fitness Red’', 2590000, '1678715803.webp', '2023-03-13 13:56:43', 31, NULL, 'a'),
	(83, 'Giày Nike Blazer Low Sun Club', 2790000, '1678715829.webp', '2023-03-13 13:57:09', 31, NULL, 'a'),
	(84, 'Giày Nike SB Blazer Low ’77 ‘White Orange University Gold’', 2190000, '1678715854.webp', '2023-03-13 13:57:34', 31, NULL, 'a'),
	(85, 'Giày Nike Blazer Low ’77 Jumbo ‘Grey Red’', 3090000, '1678715878.webp', '2023-03-13 13:57:58', 31, NULL, 'a'),
	(86, 'Giày Nike Blazer Low ’77 Jumbo ‘White Black’', 3290000, '1678715917.webp', '2023-03-13 13:58:37', 31, NULL, 'a'),
	(87, 'Giày Nike Blazer Mid ’77 Jumbo ‘Dark Russet’', 4690000, '1678715943.webp', '2023-03-13 13:59:03', 32, NULL, 'a'),
	(88, 'Giày Nike Blazer Mid ’77 Jumbo ‘University Blue’', 3390000, '1678715968.webp', '2023-03-13 13:59:28', 32, NULL, 'a'),
	(89, 'Giày nam Nike Blazer Low ’77 Vintage ‘White Black’', 3290000, '1678715995.webp', '2023-03-13 13:59:55', 31, NULL, 'a'),
	(90, 'Giày Nike Blazer Mid ’77 Jumbo ‘Crimson’', 3490000, '1678716140.webp', '2023-03-13 14:02:20', 32, NULL, 'a'),
	(91, 'Giày Nike Blazer Low Jumbo ‘White Pink Oxford’', 3690000, '1678716167.webp', '2023-03-13 14:02:47', 31, NULL, 'a'),
	(92, 'Giày Nike Blazer Mid ’77 ‘Brick Red’', 4290000, '1678716190.webp', '2023-03-13 14:03:10', 32, NULL, 'a'),
	(93, 'Giày nam Nike Blazer Mid ’77 Vintage ‘Make It Count’', 2890000, '1678716212.webp', '2023-03-13 14:03:32', 32, NULL, 'a'),
	(94, 'Giày Nike Blazer Mid ’77 GS ‘White Black’', 3090000, '1678716236.webp', '2023-03-13 14:03:56', 32, NULL, 'a'),
	(95, 'Giày Nike Blazer Low ’77 Jumbo ‘White Alpha Orange Sail’', 3090000, '1678716259.webp', '2023-03-13 14:04:19', 31, NULL, 'a'),
	(96, 'Giày Nike Blazer Low ’77 Jumbo ‘White Old Royal’', 3090000, '1678716294.webp', '2023-03-13 14:04:54', 31, NULL, 'a'),
	(97, 'Giày Nike Blazer Mid ’77 Vintage ‘Alter & Reveal’', 4290000, '1678716316.webp', '2023-03-13 14:05:16', 32, NULL, 'a'),
	(98, 'Giày Nike Blazer Low 77 Vintage ‘White Team Orange’', 2790000, '1678716339.webp', '2023-03-13 14:05:39', 31, NULL, 'a'),
	(99, 'Giày Nike Blazer Low ’77 ‘Pine Green’', 2990000, '1678716362.webp', '2023-03-13 14:06:02', 31, NULL, 'a'),
	(100, 'Giày Nike Blazer Court SB ‘Black White’', 2090000, '1678716385.webp', '2023-03-13 14:06:25', 31, NULL, 'a'),
	(101, 'Giày Nike Blazer Low 77 ‘Paint Splatter’', 2190000, '1678716408.webp', '2023-03-13 14:06:48', 31, NULL, 'a'),
	(102, 'Giày Acronym X Nike Blazer Low ‘Night Maroon’', 4890000, '1678716472.webp', '2023-03-13 14:07:52', 31, NULL, 'a'),
	(103, 'Giày Acronym X Nike Blazer Low ‘Black Olive Aura’', 5980000, '1678716509.webp', '2023-03-13 14:08:29', 31, NULL, 'a'),
	(104, 'Giày KAWS x sacai x Nike Blazer Low ‘Neptune Blue’', 7090000, '1678716535.webp', '2023-03-13 14:08:55', 31, NULL, 'a'),
	(105, 'Giày Nike Blazer Mid ’77 Essential ‘White Metallic Silver’', 2990000, '1678716558.webp', '2023-03-13 14:09:18', 32, NULL, 'a'),
	(106, 'Giày Nike Blazer Mid Voodoo ‘Sail White’', 4390000, '1678716580.webp', '2023-03-13 14:09:40', 32, NULL, 'a'),
	(107, 'Giày Nike Blazer Mid ’77 ‘Voodoo’', 4090000, '1678716602.webp', '2023-03-13 14:10:02', 32, NULL, 'a'),
	(108, 'Giày Nike Blazer Low Platform ‘Pink Glaze’', 2790000, '1678716628.webp', '2023-03-13 14:10:28', 31, NULL, 'a'),
	(109, 'Giày Nike Sacai x Blazer Low ‘Magma Orange’', 7790000, '1678716671.webp', '2023-03-13 14:11:11', 31, NULL, 'a'),
	(110, 'Giày Nike Blazer Mid ’77 LX ‘Lucky Charms – Black’', 4090000, '1678716685.webp', '2023-03-13 14:11:25', 32, NULL, 'a'),
	(111, 'Giày Nike sacai x Blazer Low ‘British Tan’', 4990000, '1678716729.webp', '2023-03-13 14:12:09', 31, NULL, 'a'),
	(112, 'Giày Nike Blazer Low ’77 Premium ‘Removable Swoosh – Black’', 2690000, '1678716752.webp', '2023-03-13 14:12:32', 31, NULL, 'a'),
	(113, 'Giày Nike Zoom Blazer Mid Premium SB ‘Light Dew Zitron’', 3690000, '1678716776.webp', '2023-03-13 14:12:56', 32, NULL, 'a'),
	(114, 'Giày Nike Blazer Mid ‘Mosaic Black Grey’', 3390000, '1678716807.webp', '2023-03-13 14:13:27', 32, NULL, 'a'),
	(115, 'Giày NBA x Nike Blazer Mid ’77 EMB ‘Knicks’', 4190000, '1678716837.webp', '2023-03-13 14:13:57', 32, NULL, 'a'),
	(116, 'Giày Nike Blazer Mid ‘Cream Light’', 3790000, '1678716868.webp', '2023-03-13 14:14:28', 32, NULL, 'a'),
	(117, 'Giày Nike Blazer Mid ‘Mosaic Green’', 3790000, '1678716892.webp', '2023-03-13 14:14:52', 32, NULL, 'a'),
	(118, 'Giày nam Nike Blazer Mid ’77 Vintage ‘Space Hippie’', 4190000, '1678716941.webp', '2023-03-13 14:15:41', 32, NULL, 'a'),
	(119, 'Giày nữ Nike Wmns Blazer City Low LX ‘Guava Ice’', 3590000, '1678717052.webp', '2023-03-13 14:17:32', 31, NULL, 'a'),
	(120, 'Giày bóng rổ Nike Sacai x Blazer Mid ‘Maize Navy’', 14290000, '1678717081.webp', '2023-03-13 14:18:01', 32, NULL, 'a'),
	(121, 'Giày nam Nike Blazer Mid ’77 Vintage ‘White Pine Green’', 4090000, '1678717111.webp', '2023-03-13 14:18:31', 32, NULL, 'a'),
	(122, 'Giày nam Nike Air Max 1 Grey Black', 4690000, '1678721493.webp', '2023-03-13 15:31:33', 24, NULL, 'a'),
	(123, 'Giày Nike Concepts x Air Max 1 SP ‘Mellow’', 6590000, '1678721517.webp', '2023-03-13 15:31:57', 24, NULL, 'a'),
	(124, 'Giày Nike Air Max 1 Premium Crepe Hemp', 5890000, '1678721555.webp', '2023-03-13 15:32:35', 24, NULL, 'a'),
	(125, 'Giày CLOT x Air Max 1 ‘Kiss of Death’ 2021', 5690000, '1678721608.webp', '2023-03-13 15:33:28', 24, NULL, 'a'),
	(126, 'Giày Travis Scott x Nike Air Max 1 ‘Baroque Brown’', 15690000, '1678721646.webp', '2023-03-13 15:34:06', 24, NULL, 'a'),
	(127, 'Giày Travis Scott x Nike Air Max 1 ‘Saturn Gold’', 13890000, '1678721676.webp', '2023-03-13 15:34:36', 24, NULL, 'a'),
	(128, 'Giày Nike Patta x Air Max 1 ‘Noise Aqua’', 7490000, '1678721703.webp', '2023-03-13 15:35:03', 24, NULL, 'a'),
	(129, 'Giày nam Nike Air Max 1 ‘Sketch To Shelf – University Red’', 6290000, '1678721727.webp', '2023-03-13 15:35:27', 24, NULL, 'a'),
	(130, 'Giày nam Nike Air Max 1 ‘Multi Mix’', 4590000, '1678721748.webp', '2023-03-13 15:35:48', 24, NULL, 'a'),
	(131, 'Giày nam Nike Air Max 1 SNKRS Day Brown', 10090000, '1678721778.webp', '2023-03-13 15:36:18', 24, NULL, 'a'),
	(132, 'Giày nam Nike Air Max 1 Amsterdam', 11290000, '1678721841.webp', '2023-03-13 15:37:21', 24, NULL, 'a'),
	(133, 'Giày nam Nike Air Max 1 London', 11590000, '1678721864.webp', '2023-03-13 15:37:44', 24, NULL, 'a'),
	(134, 'Giày Nike Air Max 1 Daisy', 4590000, '1678721889.webp', '2023-03-13 15:38:09', 24, NULL, 'a'),
	(135, 'Giày Nike Air Max 90 Golf NRG ‘Desert Camo’', 5090000, '1678722076.webp', '2023-03-13 15:41:16', 25, NULL, 'a'),
	(136, 'Giày Nike Air Max 90 SP ‘Reverse Duck Camo’', 5890000, '1678722100.webp', '2023-03-13 15:41:40', 25, NULL, 'a'),
	(137, 'Giày Nike Mens Air Max 90 LTR Black', 4190000, '1678722123.webp', '2023-03-13 15:42:03', 25, NULL, 'a'),
	(138, 'Giày Nike Off-White x Air Max 90 ‘Desert Ore’', 24090000, '1678722145.webp', '2023-03-13 15:42:25', 25, NULL, 'a'),
	(139, 'Giày Nike Air Max 90 LTR Golf White', 4090000, '1678722166.webp', '2023-03-13 15:42:46', 25, NULL, 'a'),
	(140, 'Giày Nike Air Max 90 Golf ‘White Black’', 5090000, '1678722188.webp', '2023-03-13 15:43:08', 25, NULL, 'a'),
	(141, 'Giày Nike Air Max 90 SE ‘Sail Red’', 4890000, '1678722212.webp', '2023-03-13 15:43:32', 25, NULL, 'a'),
	(142, 'Giày Nike Air Max 90 “Tweed Dark Army”', 3719000, '1678722243.webp', '2023-03-13 15:44:03', 25, NULL, 'a'),
	(143, 'Giày Nike Air Max 90 “Pure Platinum Fresh Mint”', 3719000, '1678722265.webp', '2023-03-13 15:44:25', 25, NULL, 'a'),
	(144, 'Giày Nike Air Max 90 ‘Gorge Green’', 3890000, '1678722289.webp', '2023-03-13 15:44:49', 25, NULL, 'a'),
	(145, 'Giày Nike Air Max 90 ‘Roswell Rayguns’', 3890000, '1678722311.webp', '2023-03-13 15:45:11', 25, NULL, 'a'),
	(146, 'Giày Nike Wmns Air Max 90 SE ‘Sun Club – Sail Arctic Orange’', 4290000, '1678722335.webp', '2023-03-13 15:45:35', 25, NULL, 'a'),
	(147, 'Giày Nike Air Max 90 GTX ‘Photon Dust’', 4890000, '1678722358.webp', '2023-03-13 15:45:58', 25, NULL, 'a'),
	(148, 'Giày Nike Air Max 90 GTX ‘Tour Yellow And Cargo Khaki’', 4890000, '1678722382.webp', '2023-03-13 15:46:22', 25, NULL, 'a'),
	(149, 'Giày Nike Air Max 90 Terrascape ‘Brown’', 4390000, '1678722416.webp', '2023-03-13 15:46:56', 25, NULL, 'a'),
	(150, 'Giày Nike Air Max 90 Terrascape ‘White Red’', 4390000, '1678722440.webp', '2023-03-13 15:47:20', 25, NULL, 'a'),
	(151, 'Giày Nike Air Max Terrascape 90 ‘Sail’', 3590000, '1678722470.webp', '2023-03-13 15:47:50', 25, NULL, 'a'),
	(152, 'Giày Nike Air Max 90 Terrascape Rattan Black', 4290000, '1678722491.webp', '2023-03-13 15:48:11', 25, NULL, 'a'),
	(153, 'Giày Nike Wmns Air Max 90 ‘White Vapor Green’', 3490000, '1678722517.webp', '2023-03-13 15:48:37', 25, NULL, 'a'),
	(154, 'Giày Golf Nike Air Max 90 Golf ‘Infrared’', 4690000, '1678722542.webp', '2023-03-13 15:49:02', 25, NULL, 'a'),
	(155, 'Giày nam Nike Air Max 90 ‘3M Pack’', 2390000, '1678722568.webp', '2023-03-13 15:49:28', 25, NULL, 'a'),
	(156, 'Giày Nike Air Max 90 ‘White Dark Beetroot’', 4980000, '1678722593.webp', '2023-03-13 15:49:53', 25, NULL, 'a'),
	(157, 'Giày Nike Air Max 90 SE ‘Sun Club’', 4390000, '1678722619.webp', '2023-03-13 15:50:19', 25, NULL, 'a'),
	(158, 'Giày Nike Air Max 90 SE ‘Black Scream Green’', 5190000, '1678722663.webp', '2023-03-13 15:51:03', 25, NULL, 'a'),
	(159, 'Giày Nike Air Max 90 SE ‘Remix Pack’', 14090000, '1678722684.webp', '2023-03-13 15:51:24', 25, NULL, 'a'),
	(160, 'Giày Nike Air Max 90 ‘Nordic Christmas’', 3990000, '1678722714.webp', '2023-03-13 15:51:54', 25, NULL, 'a'),
	(161, 'Giày Nike Air Max 90 ‘Lucha Libre’', 3890000, '1678722742.webp', '2023-03-13 15:52:22', 25, NULL, 'a'),
	(162, 'Giày Nike Air Max 90 ‘Lucky Charms Ash Green’', 4890000, '1678722774.webp', '2023-03-13 15:52:54', 25, NULL, 'a'),
	(163, 'Giày Nike Air Max 90 SE ‘Alter And Reveal Pack – Grey Fog’', 4890000, '1678722799.webp', '2023-03-13 15:53:19', 25, NULL, 'a'),
	(164, 'Giày Nike Air Max 90 NRG ‘Shimmer Polka’', 4890000, '1678722822.webp', '2023-03-13 15:53:42', 25, NULL, 'a'),
	(165, 'Giày Nike Air Max 90 NRG ‘Grey Fog Polka’', 4890000, '1678722845.webp', '2023-03-13 15:54:05', 25, NULL, 'a'),
	(166, 'Giày Nike Air Max 90 ‘Archetype’', 4690000, '1678722869.webp', '2023-03-13 15:54:29', 25, NULL, 'a'),
	(167, 'Giày nam Nike Air Max 90 ‘Cork – Obsidian’', 4290000, '1678722895.webp', '2023-03-13 15:54:55', 25, NULL, 'a'),
	(168, 'Giày Nike Wmns Air Max 90 ‘Have a Good Game’', 2890000, '1678722927.webp', '2023-03-13 15:55:27', 25, NULL, 'a'),
	(169, 'Giày Nike Air Max 90 Obsidian', 3890000, '1678722949.webp', '2023-03-13 15:55:49', 25, NULL, 'a'),
	(170, 'Giày Nike Air Max 90 Leather GS ‘White Chlorine Blue’', 4690000, '1678722980.webp', '2023-03-13 15:56:20', 25, NULL, 'a'),
	(171, 'Giày Nike Air Max 90 Leather GS ‘White’', 3290000, '1678723001.webp', '2023-03-13 15:56:41', 25, NULL, 'a'),
	(172, 'Giày Nike Wmns Air Max 90 ‘Recraft Lemon’', 4290000, '1678723034.webp', '2023-03-13 15:57:14', 25, NULL, 'a'),
	(173, 'Giày Nike Wmns Air Max 95 ‘Navy Orange’', 5090000, '1678723245.webp', '2023-03-13 16:00:45', 26, NULL, 'a'),
	(174, 'Giày Nike Dave White x Size? x Air Max 95 ‘Fox’', 11090000, '1678723277.webp', '2023-03-13 16:01:17', 26, NULL, 'a'),
	(175, 'Giày Nike Air Max 95 Premium ‘Blackened Blue’', 5890000, '1678723308.webp', '2023-03-13 16:01:48', 26, NULL, 'a'),
	(176, 'Giày Nike Air Max 95 ‘Glacier Blue’', 6490000, '1678723330.webp', '2023-03-13 16:02:10', 26, NULL, 'a'),
	(177, 'Giày Nike Wmns Air Max 95 ‘Leopard Pack’', 6890000, '1678723351.webp', '2023-03-13 16:02:31', 26, NULL, 'a'),
	(178, 'Giày Nike Air Max 95 Essential ‘Triple Black’', 8090000, '1678723379.webp', '2023-03-13 16:02:59', 26, NULL, 'a'),
	(179, 'Giày NikeCourt Zoom Vapor X Air Max 95 ‘Solar Red’', 10590000, '1678723404.webp', '2023-03-13 16:03:24', 26, NULL, 'a'),
	(180, 'Giày Nike Air Max 95 M2Z2 ‘Recycled Wool Pack – Black Electric Green’', 4390000, '1678723425.webp', '2023-03-13 16:03:45', 26, NULL, 'a'),
	(181, 'Giày Nike Air Max 95 NDSTRKT ‘Black Reflective’', 3890000, '1678723448.webp', '2023-03-13 16:04:08', 26, NULL, 'a'),
	(182, 'Giày Nike Air Max 95 NS GPX ‘Big Logo’', 6890000, '1678723478.webp', '2023-03-13 16:04:38', 26, NULL, 'a'),
	(183, 'Giày Nike Air Max 95 Recraft GS ‘Black Aquamarine’', 6490000, '1678723508.webp', '2023-03-13 16:05:08', 26, NULL, 'a'),
	(184, 'Giày Nike Air Max 95 NRG ‘Jacket Pack’', 6890000, '1678723532.webp', '2023-03-13 16:05:32', 26, NULL, 'a'),
	(185, 'Giày Nike Carhartt WIP x Air Max 95 ‘Camo’', 7890000, '1678723555.webp', '2023-03-13 16:05:55', 26, NULL, 'a'),
	(186, 'Giày Nike Air Max 95 LV8 ‘Ember Glow’', 7290000, '1678723581.webp', '2023-03-13 16:06:21', 26, NULL, 'a'),
	(187, 'Giày Nike Air Max 95 ‘Olive Canvas’', 5890000, '1678723620.webp', '2023-03-13 16:07:00', 26, NULL, 'a'),
	(188, 'Giày Nike Air Max 95 SE GS ‘Metallic Red Bronze’', 6490000, '1678723642.webp', '2023-03-13 16:07:22', 26, NULL, 'a'),
	(189, 'Giày Nike Air Max 95 Premium ‘Exotic Skins’', 8090000, '1678723750.webp', '2023-03-13 16:09:10', 26, NULL, 'a'),
	(190, 'Giày Nike Cav Empt x Air Max 95 ‘Digi Camo’', 6490000, '1678723773.webp', '2023-03-13 16:09:33', 26, NULL, 'a'),
	(191, 'Giày Nike Cav Empt x Air Max 95 ‘Blackened Blue’', 6490000, '1678723795.webp', '2023-03-13 16:09:55', 26, NULL, 'a'),
	(192, 'Giày Nike Wmns Air Max 95 Premium ‘Barely Rose’', 5690000, '1678723821.webp', '2023-03-13 16:10:22', 26, NULL, 'a'),
	(193, 'Giày Nike Comme des Garçons x Air Max 95 ‘White’', 10090000, '1678723955.webp', '2023-03-13 16:12:35', 26, NULL, 'a'),
	(194, 'Giày Nike Air Max 95 GS ‘Ugly Christmas Sweater’', 5490000, '1678723980.webp', '2023-03-13 16:13:00', 26, NULL, 'a'),
	(195, 'Giày Nike Air Max 95 HZ GS ‘Black Volt’', 5490000, '1678724000.webp', '2023-03-13 16:13:20', 26, NULL, 'a'),
	(196, 'Giày Nike Air Max 95 GS ‘Wild West’', 7290000, '1678724021.webp', '2023-03-13 16:13:41', 26, NULL, 'a'),
	(197, 'Giày Nike Air Max 95 ‘Watermelon’', 4890000, '1678724046.webp', '2023-03-13 16:14:06', 26, NULL, 'a'),
	(198, 'Giày Nike Air Max 95 QS ‘Greedy 2.0’', 6090000, '1678724069.0’', '2023-03-13 16:14:29', 26, NULL, 'a'),
	(199, 'Giày Nike Wmns Air Max 95 SE ‘Worldwide Pack – Black’', 5090000, '1678724090.webp', '2023-03-13 16:14:50', 26, NULL, 'a'),
	(200, 'Giày Nike Wmns Air Max 95 Premium ‘Animal Floral Prints’', 7590000, '1678724116.webp', '2023-03-13 16:15:16', 26, NULL, 'a'),
	(201, 'Giày Nike Denham x Air Max 95 ‘Volt’', 7890000, '1678724146.webp', '2023-03-13 16:15:46', 26, NULL, 'a'),
	(202, 'Giày Nike Wmns Air Max 95 ‘Dusty Peach’', 7290000, '1678724166.webp', '2023-03-13 16:16:06', 26, NULL, 'a'),
	(203, 'Giày Nike Wmns Air Max 95 Essential ‘Black White’', 7290000, '1678724191.webp', '2023-03-13 16:16:31', 26, NULL, 'a'),
	(204, 'Giày Nike Wmns Air Max 95 ‘Champagne’', 5490000, '1678724217.webp', '2023-03-13 16:16:57', 26, NULL, 'a'),
	(205, 'Giày Nike Air Max 95 ‘Twine Tawny Royal’', 9590000, '1678724237.webp', '2023-03-13 16:17:17', 26, NULL, 'a'),
	(206, 'Giày Nike Kim Jones x Air Max 95 ‘Volt’', 8490000, '1678724261.webp', '2023-03-13 16:17:41', 26, NULL, 'a'),
	(207, 'Giày Nike Wmns Air Max 95 ‘Plant Color Collection’', 7890000, '1678724284.webp', '2023-03-13 16:18:04', 26, NULL, 'a'),
	(208, 'Giày Nike Air Max 95 Premium ‘Flame Powder’', 4890000, '1678724397.webp', '2023-03-13 16:19:57', 26, NULL, 'a'),
	(209, 'Giày Nike Air Max 95 ‘White’', 8590000, '1678724420.webp', '2023-03-13 16:20:20', 26, NULL, 'a'),
	(210, 'Giày Nike Kim Jones x Air Max 95 ‘Total Orange’', 8290000, '1678724449.webp', '2023-03-13 16:20:49', 26, NULL, 'a'),
	(211, 'Giày Nike Wmns Air Max 95 ‘Coconut Milk’', 9990000, '1678724472.webp', '2023-03-13 16:21:12', 26, NULL, 'a'),
	(212, 'Giày Nike Air Max 95 ‘Habanero Red’', 3890000, '1678724499.webp', '2023-03-13 16:21:39', 26, NULL, 'a'),
	(213, 'Giày Nike Air Max 97 GS ‘Black’', 4290000, '1678724689.webp', '2023-03-13 16:24:49', 27, NULL, 'a'),
	(214, 'Giày Nike Wmns Air Max 97 ‘Pure Platinum’', 5690000, '1678724707.webp', '2023-03-13 16:25:07', 27, NULL, 'a'),
	(215, 'Giày Nike Air Max 97 GS ‘White Black’', 3690000, '1678724728.webp', '2023-03-13 16:25:28', 27, NULL, 'a'),
	(216, 'Giày Nike Wmns Air Max 97 ‘South Beach’', 4890000, '1678724754.webp', '2023-03-13 16:25:54', 27, NULL, 'a'),
	(217, 'Giày Nike Air Max 97 ‘Leopard’', 5290000, '1678724775.webp', '2023-03-13 16:26:15', 27, NULL, 'a'),
	(218, 'Giày Nike Wmns Air Max 97 ‘White Iridescent’', 4790000, '1678724805.webp', '2023-03-13 16:26:45', 27, NULL, 'a'),
	(219, 'Giày Nike Air Max 97 Terrascape ‘White’', 6490000, '1678724833.webp', '2023-03-13 16:27:13', 27, NULL, 'a'),
	(220, 'Giày Nike Air Max 97 Terrascape ‘Triple Black’', 6490000, '1678724857.webp', '2023-03-13 16:27:37', 27, NULL, 'a'),
	(221, 'Giày Nike Air Max 97 SE M. Frank Rudy', 5990000, '1678724879. Frank Rudy', '2023-03-13 16:27:59', 27, NULL, 'a'),
	(222, 'Giày Nike Air Max 97 ‘Next Nature White’', 4690000, '1678724901.webp', '2023-03-13 16:28:21', 27, NULL, 'a'),
	(223, 'Giày Nike Air Max 97 SE ‘First Use – College Grey’', 4090000, '1678724930.webp', '2023-03-13 16:28:50', 27, NULL, 'a'),
	(224, 'Giày Nike Air Max 97 ‘White Midnight Navy’', 4090000, '1678724953.webp', '2023-03-13 16:29:13', 27, NULL, 'a'),
	(225, 'Giày Nike Air Max 97 SE ‘ – Sail Treeline’ Sun Club', 3980000, '1678724977.webp', '2023-03-13 16:29:37', 27, NULL, 'a'),
	(226, 'Giày Nike Air Max 97 ‘White Gum’', 3980000, '1678724997.webp', '2023-03-13 16:29:57', 27, NULL, 'a'),
	(227, 'Giày Nike Air Max 97 OG ‘Sliver Bullet’', 6690000, '1678725019.webp', '2023-03-13 16:30:19', 27, NULL, 'a'),
	(228, 'Giày Nike Air Max 97 ‘Cheung Ka Long’', 6890000, '1678725048.webp', '2023-03-13 16:30:48', 27, NULL, 'a'),
	(229, 'Giày Nike Air Max 97 White Bullet', 4490000, '1678725069.webp', '2023-03-13 16:31:09', 27, NULL, 'a'),
	(230, 'Giày Nike Air Max 97 “Panda”', 6890000, '1678725093.webp', '2023-03-13 16:31:33', 27, NULL, 'a'),
	(231, 'Giày Nike Air Max 97 Plum Flog Reflective Camo (W)', 6490000, '1678725114.webp', '2023-03-13 16:31:54', 27, NULL, 'a'),
	(232, 'Giày Nike Air Max 97 Multi Pastel (W)', 6490000, '1678725142.webp', '2023-03-13 16:32:22', 27, NULL, 'a'),
	(233, 'Giày Nike Wmns Air Max 97 LX ‘Woven Fossil’', 6890000, '1678725163.webp', '2023-03-13 16:32:43', 27, NULL, 'a'),
	(234, 'Giày Nike Air Max 97 ‘Sun Club’', 6290000, '1678725196.webp', '2023-03-13 16:33:16', 27, NULL, 'a'),
	(235, 'Giày Nike Wmns Air Max 97 ‘White Multicolor’', 6090000, '1678725222.webp', '2023-03-13 16:33:42', 26, NULL, 'a'),
	(236, 'Giày Nike Air Max 97 ‘Bleached Coral’', 4690000, '1678725248.webp', '2023-03-13 16:34:08', 27, NULL, 'a'),
	(237, 'Giày Nike Air Max 97 ‘Alter & Reveal’', 5890000, '1678725269.webp', '2023-03-13 16:34:29', 27, NULL, 'a'),
	(238, 'Giày Nike Air Max 97 ‘Silver Violet’', 5690000, '1678725289.webp', '2023-03-13 16:34:49', 27, NULL, 'a'),
	(239, 'Giày Nike Air Max 97 SE ‘First Use’', 3990000, '1678725313.webp', '2023-03-13 16:35:13', 27, NULL, 'a'),
	(240, 'Giày Nike Air Max 97 LX ‘Woven Venice’', 3990000, '1678725335.webp', '2023-03-13 16:35:35', 27, NULL, 'a'),
	(241, 'Giày Nike Wmns Air Max 97 Ultra 17 ‘Silver Bullet’', 10590000, '1678725358.webp', '2023-03-13 16:35:58', 27, NULL, 'a'),
	(242, 'Giày Nike Air Max 97 Ultra 17 ‘Silver Bullet’', 8090000, '1678725385.webp', '2023-03-13 16:36:25', 27, NULL, 'a'),
	(243, 'Giày Nike Air Max 97 QS ‘Olympic Rings – Red’', 5490000, '1678725409.webp', '2023-03-13 16:36:49', 27, NULL, 'a'),
	(244, 'Giày Nike Air Max 270 React ‘Flash Crimson’', 3790000, '1678725580.webp', '2023-03-13 16:39:40', 28, NULL, 'a'),
	(245, 'Giày Nike Air Max 270 Golf ‘White Black’', 6490000, '1678725599.webp', '2023-03-13 16:39:59', 28, NULL, 'a'),
	(246, 'Giày Golf nam Nike Air Max 270 Golf ‘Newsprint Magic Ember’', 5290000, '1678725620.webp', '2023-03-13 16:40:20', 28, NULL, 'a'),
	(247, 'Giày Nike Air Max 270 ‘Black White’', 4690000, '1678725648.webp', '2023-03-13 16:40:48', 28, NULL, 'a'),
	(248, 'Giày Nike Air Max 270 React ‘Aurora Green’', 4490000, '1678725669.webp', '2023-03-13 16:41:09', 28, NULL, 'a'),
	(249, 'Giày Nike Air Max 270 React ‘Black White’', 3490000, '1678725688.webp', '2023-03-13 16:41:28', 28, NULL, 'a'),
	(250, 'Giày Nike Air Max 270 React ‘The Future Is In The Air’', 4690000, '1678725711.webp', '2023-03-13 16:41:51', 28, NULL, 'a'),
	(251, 'Giày Nike Air Max 270 React SE GS ‘Grind Black’', 5290000, '1678725731.webp', '2023-03-13 16:42:11', 28, NULL, 'a'),
	(252, 'Giày Nike Wmns Air Max 270 React SE ‘Light Gradient’', 4090000, '1678725752.webp', '2023-03-13 16:42:32', 28, NULL, 'a'),
	(253, 'Giày Nike Wmns Air Max 270 React ‘White Crimson’', 3690000, '1678725775.webp', '2023-03-13 16:42:55', 28, NULL, 'a'),
	(254, 'Giày Nike Air Max 270 React ‘Black Orange’', 3990000, '1678725798.webp', '2023-03-13 16:43:18', 28, NULL, 'a'),
	(255, 'Giày Nike Air Max 270 React GS ‘Iron Grey Lime Crimson’', 5290000, '1678725820.webp', '2023-03-13 16:43:40', 28, NULL, 'a'),
	(256, 'Giày Nike Wmns Air Max 270 React SE ‘Midnight Navy Crimson’', 3090000, '1678725843.webp', '2023-03-13 16:44:03', 28, NULL, 'a'),
	(257, 'Giày Nike Air Max 270 React GS ‘Iron Grey’', 3590000, '1678725863.webp', '2023-03-13 16:44:24', 28, NULL, 'a'),
	(258, 'Giày nam Nike Air Max 270 React ‘Oreo’', 4690000, '1678725900.webp', '2023-03-13 16:45:00', 28, NULL, 'a'),
	(259, 'Giày nam Nike Air Max 270 Triple Black', 6190000, '1678725924.webp', '2023-03-13 16:45:24', 28, NULL, 'a'),
	(260, 'Giày nữ Nike Wmns Air Max 270 ‘Ultramarine’', 2690000, '1678725961.webp', '2023-03-13 16:46:01', 28, NULL, 'a'),
	(261, 'Giày nam Nike Air Max 270 Black', 3990000, '1678725981.webp', '2023-03-13 16:46:21', 28, NULL, 'a'),
	(262, 'Giày nam Nike Air Max 270 SE Black Multi', 4090000, '1678726003.webp', '2023-03-13 16:46:43', 28, NULL, 'a'),
	(263, 'Giày Nike Air Max 2090 ‘Champagne’', 4090000, '1678726085.webp', '2023-03-13 16:48:05', 29, NULL, 'a'),
	(264, 'Giày Nike Air Max 2090 SE ‘Light White Bright Pink’', 3290000, '1678726104.webp', '2023-03-13 16:48:24', 29, NULL, 'a'),
	(265, 'Giày Nike Air Max 2090 GS ‘Topography’', 2890000, '1678726128.webp', '2023-03-13 16:48:48', 29, NULL, 'a'),
	(266, 'Giày Nike Air Max 2090 SE ‘Desert Berry’', 3590000, '1678726150.webp', '2023-03-13 16:49:10', 29, NULL, 'a'),
	(267, 'Giày nam Nike Air Max 2090 ‘The Future Is In The Air’', 5090000, '1678726172.webp', '2023-03-13 16:49:32', 29, NULL, 'a'),
	(268, 'Giày Nike Air Max 2090 GS ‘Watermelon’', 4090000, '1678726194.webp', '2023-03-13 16:49:54', 29, NULL, 'a'),
	(269, 'Giày nam Nike Air Max 2090 ‘Evolution of Icons’', 6890000, '1678726224.webp', '2023-03-13 16:50:24', 29, NULL, 'a'),
	(270, 'Giày nam Nike Air Max 2090 ‘Barely Volt’', 4690000, '1678726244.webp', '2023-03-13 16:50:44', 29, NULL, 'a'),
	(271, 'Giày nữ Nike Wmns Air Max 2090 ‘Barely Rose’', 5690000, '1678726264.webp', '2023-03-13 16:51:04', 29, NULL, 'a'),
	(272, 'Giày Golf nam Nike React Vapor 2 Wide ‘White Metallic Cool Grey’', 5090000, '1678726411.webp', '2023-03-13 16:53:31', 30, NULL, 'a'),
	(273, 'Giày Golf nam Nike React Vapor 2 Wide ‘Black White’', 5090000, '1678726433.webp', '2023-03-13 16:53:53', 30, NULL, 'a'),
	(274, 'Giày Golf Nike Vapor Golf Wide ‘White’', 1720000, '1678726454.webp', '2023-03-13 16:54:14', 30, NULL, 'a'),
	(275, 'Giày Nike Air VaporMax ‘Off-White Black’', 21090000, '1678726477.webp', '2023-03-13 16:54:37', 30, NULL, 'a'),
	(276, 'Giày Nike VaporMax Flyknit 2021 ‘Grey Red’', 5890000, '1678726498.webp', '2023-03-13 16:54:58', 30, NULL, 'a'),
	(277, 'Giày Nike Air VaporMax 2020 ‘Flyknit Light Arctic Pink’', 4390000, '1678726521.webp', '2023-03-13 16:55:21', 30, NULL, 'a'),
	(278, 'Giày Nike Air VaporMax 2021 Flyknit GS ‘White Metallic Silver’', 6890000, '1678726546.webp', '2023-03-13 16:55:46', 30, NULL, 'a'),
	(279, 'Giày Nike Air VaporMax 2021 Flyknit GS ‘Grey Light Liquid Lime’', 6890000, '1678726567.webp', '2023-03-13 16:56:07', 30, NULL, 'a'),
	(280, 'Giày nam Nike Air VaporMax 95 ‘Neon’Giày nam Nike Air VaporMax 95 ‘Neon’', 7290000, '1678726596.webp', '2023-03-13 16:56:36', 30, NULL, 'a'),
	(281, 'Giày nam Nike Air VaporMax 95 ‘Slate’Giày nam Nike Air VaporMax 95 ‘Slate’', 10990000, '1678726618.webp', '2023-03-13 16:56:58', 30, NULL, 'a'),
	(282, 'Giày nam Nike Air VaporMax 2020 Flyknit ‘Oreo’', 6490000, '1678726639.webp', '2023-03-13 16:57:19', 30, NULL, 'a'),
	(283, 'Giày Nike Air VaporMax 2020 Flyknit ‘Team Red’', 7590000, '1678726661.webp', '2023-03-13 16:57:41', 30, NULL, 'a'),
	(284, 'Giày Nike Air VaporMax Plus', 6490000, '1678726682.webp', '2023-03-13 16:58:02', 30, NULL, 'a'),
	(285, 'Giày nam Nike Air Vapormax 360 ‘Triple White’', 6890000, '1678726707.webp', '2023-03-13 16:58:27', 30, NULL, 'a'),
	(286, 'Giày nữ Nike Wmns Air VaporMax 2020 Flyknit ‘Deep Royal Blue Multi’', 5490000, '1678726731.webp', '2023-03-13 16:58:51', 30, NULL, 'a'),
	(287, 'Giày nam Nike Air VaporMax 2020 Flyknit ‘Multi-Color’', 5090000, '1678726759.webp', '2023-03-13 16:59:19', 30, NULL, 'a'),
	(288, 'Giày nữ Nike Wmns Air VaporMax 2020 Flyknit ‘Multi-Color’', 5490000, '1678726780.webp', '2023-03-13 16:59:40', 30, NULL, 'a'),
	(289, 'Giày nam Nike Air VaporMax 2020 Flyknit ‘Deep Royal Blue Multi’', 5890000, '1678726805.webp', '2023-03-13 17:00:05', 30, NULL, 'a'),
	(290, 'Giày Nike Air VaporMax 2020 Flyknit ‘Dark Grey’', 6490000, '1678726828.webp', '2023-03-13 17:00:28', 30, NULL, 'a'),
	(291, 'Giày Nike Wmns Air VaporMax 2020 Flyknit ‘Iron Grey’', 5490000, '1678726853.webp', '2023-03-13 17:00:53', 30, NULL, 'a'),
	(292, 'Giày nam Nike Air VaporMax 2020 Flyknit ‘Iron Grey’', 6090000, '1678726879.webp', '2023-03-13 17:01:19', 30, NULL, 'a'),
	(293, 'Giày nam Nike Air VaporMax 2020 Flyknit ‘Dark Grey’', 6490000, '1678726904.webp', '2023-03-13 17:01:44', 30, NULL, 'a'),
	(294, 'Giày Nike Wmns Air Vapormax 2020 Flyknit ‘Oreo’', 5890000, '1678726929.webp', '2023-03-13 17:02:09', 30, NULL, 'a'),
	(295, 'Giày Nike Wmns Air VaporMax 2020 Flyknit ‘Black Multi’', 6490000, '1678726950.webp', '2023-03-13 17:02:30', 30, NULL, 'a'),
	(296, 'Giày nam Nike Air VaporMax EVO ‘Anthracite Turquoise’', 6090000, '1678726974.webp', '2023-03-13 17:02:54', 30, NULL, 'a'),
	(297, 'Giày nam Nike Air VaporMax EVO ‘Black Hyper Cobalt’', 6390000, '1678726997.webp', '2023-03-13 17:03:17', 30, NULL, 'a'),
	(298, 'Giày Nike Wmns Air VaporMax EVO ‘Black White Multi’', 6290000, '1678727020.webp', '2023-03-13 17:03:40', 30, NULL, 'a'),
	(299, 'Giày Nike Wmns Air VaporMax EVO ‘Hyper Grape’', 6290000, '1678727042.webp', '2023-03-13 17:04:02', 30, NULL, 'a'),
	(301, 'Giày nam Nike Air VaporMax EVO ‘Summit White Bright Crimson’', 6690000, '1678727084.webp', '2023-03-13 17:04:44', 30, NULL, 'a'),
	(302, 'Giày nam Nike Air VaporMax Plus ‘White Platinum’', 6090000, '1678727107.webp', '2023-03-13 17:05:07', 30, NULL, 'a'),
	(303, '1231', 210000, '1679384767.jpg', '2023-03-21 07:46:07', 46, NULL, NULL),
	(304, 'Dép adidas Adilette 22 Slides ‘Grey’', 2690000, '1681287452.png', '2023-04-12 08:17:32', 46, NULL, NULL),
	(305, '123123123', 12312300, '1681287739.png', '2023-04-12 08:22:19', 46, NULL, '\r\n                    ');

-- Dumping structure for table 23_shoe_store.product_rate
CREATE TABLE IF NOT EXISTS `product_rate` (
  `customer_id` int NOT NULL,
  `product_id` int NOT NULL,
  `rate` int DEFAULT NULL,
  `comment` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`,`product_id`),
  KEY `FK__products_rating` (`product_id`),
  CONSTRAINT `FK__customers_rating` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `FK__products_rating` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.product_rate: ~0 rows (approximately)

-- Dumping structure for table 23_shoe_store.product_sub_images
CREATE TABLE IF NOT EXISTS `product_sub_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `source` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK__products` (`product_id`),
  CONSTRAINT `FK__products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.product_sub_images: ~9 rows (approximately)
INSERT INTO `product_sub_images` (`id`, `product_id`, `source`, `created_at`) VALUES
	(13, 68, '16793750420.newbalance', '2023-03-21 05:04:02'),
	(14, 68, '16793750421.newbalance', '2023-03-21 05:04:02'),
	(15, 68, '16793750422.newbalance', '2023-03-21 05:04:02'),
	(16, 68, '16793750423.newbalance', '2023-03-21 05:04:02'),
	(17, 303, '16793847670.jpg', '2023-03-21 07:46:07'),
	(18, 303, '16793847671.jpg', '2023-03-21 07:46:07'),
	(19, 303, '16793847672.jpg', '2023-03-21 07:46:07'),
	(20, 303, '16793847673.jpg', '2023-03-21 07:46:07'),
	(21, 303, '16793847673.jpg', '2023-03-21 07:46:07');

-- Dumping structure for table 23_shoe_store.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.status: ~5 rows (approximately)
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Chờ xác nhận'),
	(2, 'Đang chuẩn bị đơn hàng'),
	(3, 'Đang giao hàng'),
	(4, 'Đã giao hàng'),
	(5, 'Đã huỷ');

-- Dumping structure for table 23_shoe_store.sub_categories
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_sub_category_categories` (`category_id`),
  CONSTRAINT `FK_sub_category_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 23_shoe_store.sub_categories: ~62 rows (approximately)
INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `image`, `created_at`) VALUES
	(9, 4, 'Air Jordan 312', '1678641570.webp', '2023-03-12 17:19:30'),
	(10, 4, 'Air Jordan 1', '1678641972.webp', '2023-03-12 17:26:12'),
	(11, 4, 'Air Jordan 2', '1678641987.webp', '2023-03-12 17:26:27'),
	(12, 4, 'Air Jordan 4', '1678642005.webp', '2023-03-12 17:26:45'),
	(13, 4, 'Air Jordan 3', '1678642062.webp', '2023-03-12 17:27:42'),
	(14, 4, 'Air Jordan 5', '1678642081.webp', '2023-03-12 17:28:01'),
	(15, 4, 'Air Jordan 6', '1678642099.webp', '2023-03-12 17:28:19'),
	(16, 4, 'Air Jordan 7', '1678642109.webp', '2023-03-12 17:28:29'),
	(17, 4, 'Air Jordan 11', '1678642148.webp', '2023-03-12 17:29:08'),
	(18, 4, 'Air Jordan 34', '1678642156.webp', '2023-03-12 17:29:16'),
	(19, 4, 'Air Jordan 35', '1678642165.webp', '2023-03-12 17:29:25'),
	(20, 5, 'Foam Runner', '1678642585.webp', '2023-03-12 17:36:25'),
	(21, 5, 'Yeezy 700', '1678642605.webp', '2023-03-12 17:36:45'),
	(22, 5, 'Yeezy 350', '1678642618.jpg', '2023-03-12 17:36:58'),
	(23, 5, 'Yeezy 380', '1678642628.jpg', '2023-03-12 17:37:08'),
	(24, 12, 'Air Max 1', '1678690483.webp', '2023-03-13 06:54:43'),
	(25, 12, 'Air Max 90', '1678690503.webp', '2023-03-13 06:55:03'),
	(26, 12, 'Air Max 95', '1678690517.webp', '2023-03-13 06:55:17'),
	(27, 12, 'Air Max 97', '1678690537.webp', '2023-03-13 06:55:37'),
	(28, 12, 'Air Max 270', '1678690551.webp', '2023-03-13 06:55:51'),
	(29, 12, 'Air Max 2090', '1678690569.webp', '2023-03-13 06:56:09'),
	(30, 12, 'VaporMax', '1678690580.webp', '2023-03-13 06:56:20'),
	(31, 43, 'Nike Blazer Low', '1678690613.webp', '2023-03-13 06:56:53'),
	(32, 43, 'Nike Blazer High', '1678690628.jpg', '2023-03-13 06:57:08'),
	(33, 13, 'Nike Dunk High', '1678690651.webp', '2023-03-13 06:57:31'),
	(34, 13, 'Nike Dunk Low', '1678690664.webp', '2023-03-13 06:57:44'),
	(35, 8, 'Ultra Boost 1.0', '1678690696.0', '2023-03-13 06:58:16'),
	(36, 8, 'Ultra Boost 2.0', '1678690739.0', '2023-03-13 06:58:59'),
	(37, 8, 'Ultra Boost 4.0', '1678690748.0', '2023-03-13 06:59:08'),
	(38, 8, 'Ultra Boost 19', '1678690759.jpg', '2023-03-13 06:59:19'),
	(39, 8, 'Ultra Boost 20', '1678690771.jpg', '2023-03-13 06:59:31'),
	(40, 8, 'Ultra Boost 21', '1678690787.jpg', '2023-03-13 06:59:47'),
	(41, 8, 'Ultra Boost 22', '1678690796.jpg', '2023-03-13 06:59:56'),
	(42, 6, 'Không có thể loại riêng', NULL, '2023-03-13 07:04:42'),
	(44, 7, 'Không có thể loại riêng', NULL, '2023-03-13 07:05:45'),
	(45, 10, 'Không có thể loại riêng', NULL, '2023-03-13 07:05:59'),
	(46, 22, 'Không có thể loại riêng', NULL, '2023-03-13 07:06:45'),
	(47, 11, 'Không có thể loại riêng', NULL, '2023-03-13 07:07:20'),
	(48, 14, 'Không có thể loại riêng', NULL, '2023-03-13 07:07:30'),
	(49, 15, 'Không có thể loại riêng', NULL, '2023-03-13 07:07:38'),
	(50, 16, 'Không có thể loại riêng', NULL, '2023-03-13 07:07:45'),
	(51, 23, 'Không có thể loại riêng', NULL, '2023-03-13 07:08:07'),
	(52, 17, 'Không có thể loại riêng', NULL, '2023-03-13 07:08:16'),
	(53, 18, 'Không có thể loại riêng', NULL, '2023-03-13 07:08:21'),
	(54, 19, 'Không có thể loại riêng', NULL, '2023-03-13 07:08:26'),
	(55, 20, 'Không có thể loại riêng', NULL, '2023-03-13 07:08:32'),
	(56, 21, 'Không có thể loại riêng', NULL, '2023-03-13 07:08:39'),
	(57, 28, 'Không có thể loại riêng', NULL, '2023-03-13 07:08:45'),
	(58, 29, 'Không có thể loại riêng', NULL, '2023-03-13 07:08:50'),
	(59, 29, 'Không có thể loại riêng', NULL, '2023-03-13 07:09:03'),
	(60, 30, 'Không có thể loại riêng', NULL, '2023-03-13 07:09:09'),
	(61, 31, 'Không có thể loại riêng', NULL, '2023-03-13 07:09:15'),
	(62, 32, 'Không có thể loại riêng', NULL, '2023-03-13 07:09:22'),
	(63, 33, 'Không có thể loại riêng', NULL, '2023-03-13 07:09:58'),
	(64, 34, 'Không có thể loại riêng', NULL, '2023-03-13 07:10:03'),
	(66, 35, 'Không có thể loại riêng', NULL, '2023-03-13 07:11:15'),
	(67, 36, 'Không có thể loại riêng', NULL, '2023-03-13 07:11:22'),
	(68, 37, 'Không có thể loại riêng', NULL, '2023-03-13 07:11:27'),
	(69, 38, 'Không có thể loại riêng', NULL, '2023-03-13 07:11:33'),
	(70, 39, 'Không có thể loại riêng', NULL, '2023-03-13 07:11:38'),
	(72, 40, 'Không có thể loại riêng', NULL, '2023-03-13 07:11:57'),
	(73, 41, 'Không có thể loại riêng', NULL, '2023-03-13 07:12:04');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
