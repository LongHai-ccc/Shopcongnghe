-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2021 lúc 06:14 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopcongnghe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `level` tinyint(4) DEFAULT 1,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `status`, `level`, `avatar`, `created_at`, `update_at`) VALUES
(2, '  Bùi Long Hải', 'HCM', 'longhai@gmail.com', '698d51a19d8a121ce581499d7b701668', '0927888997', 1, 1, NULL, '2021-11-01 05:59:27', '2021-11-01 05:59:27'),
(5, 'daicaso13579@gmail.com', '32 HCM', 'daicaso13579@gmail.com', '202cb962ac59075b964b07152d234b70', '0927888997', 1, 1, NULL, '2021-12-09 12:56:48', '2021-12-09 12:56:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `a_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_active` tinyint(4) NOT NULL DEFAULT 1,
  `a_hot` tinyint(4) NOT NULL DEFAULT 0,
  `a_home` int(11) NOT NULL DEFAULT 0,
  `a_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_view` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `articles`
--

INSERT INTO `articles` (`id`, `a_name`, `a_slug`, `a_description`, `a_content`, `a_active`, `a_hot`, `a_home`, `a_avatar`, `a_view`, `created_at`, `updated_at`) VALUES
(10, 'test1', 'test1', 'test222', 'testt1111222', 1, 1, 0, '2020-09-09__oneplus-8t-techradar-800x450.jpg', 0, '2021-12-02 05:23:33', '2021-12-02 05:23:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `update_at`) VALUES
(16, 'MACBOOK', 'macbook', NULL, NULL, 1, 1, '2021-12-09 08:56:25', '2021-12-09 08:56:25'),
(17, 'DELL', 'dell', NULL, NULL, 1, 1, '2021-12-09 08:56:31', '2021-12-09 08:56:31'),
(18, 'ASUS', 'asus', NULL, NULL, 1, 1, '2021-12-09 08:56:36', '2021-12-09 08:56:36'),
(19, 'LENOVO', 'lenovo', NULL, NULL, 1, 1, '2021-12-09 08:56:40', '2021-12-09 08:56:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_process` tinyint(4) NOT NULL DEFAULT 0,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `c_name`, `c_phone`, `c_email`, `c_title`, `c_content`, `c_process`, `create_at`) VALUES
(26, 'Bui Long Hai', '0927888997', 'daicaso13579@gmail.com', 'mua 1111', '11111', 1, '2021-12-09 08:46:01'),
(27, 'Tèo', '1111111111', 'naex@gmail.com', '123', '456', 1, '2021-12-09 08:51:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(45, 34, 33, 1, 32300000, '2021-11-04 09:09:01', '2021-11-04 09:09:01'),
(46, 35, 42, 1, 27900000, '2021-11-19 03:00:52', '2021-11-19 03:00:52'),
(47, 36, 39, 1, 16720000, '2021-11-25 03:53:23', '2021-11-25 03:53:23'),
(48, 37, 44, 1, 990000, '2021-11-26 12:57:54', '2021-11-26 12:57:54'),
(49, 38, 46, 1, 28500000, '2021-12-02 05:09:23', '2021-12-02 05:09:23'),
(50, 39, 44, 1, 990000, '2021-12-02 08:23:25', '2021-12-02 08:23:25'),
(51, 40, 45, 1, 9000000, '2021-12-06 03:17:47', '2021-12-06 03:17:47'),
(52, 41, 49, 1, 31000000, '2021-12-09 08:43:24', '2021-12-09 08:43:24'),
(53, 41, 46, 1, 28500000, '2021-12-09 08:43:24', '2021-12-09 08:43:24'),
(54, 41, 47, 1, 950000, '2021-12-09 08:43:24', '2021-12-09 08:43:24'),
(55, 42, 46, 1, 28500000, '2021-12-09 08:52:51', '2021-12-09 08:52:51'),
(56, 43, 50, 1, 31000000, '2021-12-09 14:37:35', '2021-12-09 14:37:35'),
(57, 43, 52, 1, 29100000, '2021-12-09 14:37:35', '2021-12-09 14:37:35'),
(58, 44, 50, 2, 31000000, '2021-12-10 04:31:03', '2021-12-10 04:31:03'),
(59, 45, 50, 1, 31000000, '2021-12-10 04:31:48', '2021-12-10 04:31:48'),
(60, 45, 51, 1, 30000000, '2021-12-10 04:31:48', '2021-12-10 04:31:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT 0,
  `thumbar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `cpu` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `bonus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` int(11) NOT NULL DEFAULT 0,
  `head` int(11) DEFAULT 0,
  `view` int(11) DEFAULT 0,
  `hot` tinyint(4) DEFAULT 0,
  `pay` int(11) DEFAULT 0,
  `pro_total_rating` int(11) NOT NULL DEFAULT 0 COMMENT 'Tổng số đánh giá ',
  `pro_total_number` int(11) NOT NULL DEFAULT 0 COMMENT 'Tổng điểm đánh giá',
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `thumbar`, `category_id`, `cpu`, `short_content`, `content`, `bonus`, `number`, `head`, `view`, `hot`, `pay`, `pro_total_rating`, `pro_total_number`, `created_at`, `update_at`) VALUES
(50, 'mac test 1', 'mac-test-1', 31000000, 0, 'apple-macbook-air-mqd32sa-a-i5-5350u-600x600.jpg', 16, 'CPU', 'Discription short', 'Discription ', 'No', 9999996, 0, 0, 0, 3, 1, 5, '2021-12-10 04:32:52', '2021-12-10 04:32:52'),
(51, 'mac test XL', 'mac-test-xl', 30000000, 0, 'macbook-pro-touch-2020-i5-14ghz-8gb-256gb-mxk32sa-600x600.jpg', 16, 'M1\r\nSSD 256GB', 'mô tả ngắn', 'mô tả', 'Chuột', 2, 0, 0, 0, 1, 0, 0, '2021-12-10 04:32:40', '2021-12-10 04:32:40'),
(52, 'DELL G7 7590', 'dell-g7-7590', 30000000, 3, 'G7.png', 17, 'CPU 9750HQ\r\nVGA 2060', '....', '....', '', 0, 0, 0, 0, 1, 0, 0, '2021-12-10 04:32:39', '2021-12-10 04:32:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `ra_product_id` int(11) NOT NULL DEFAULT 0,
  `ra_number` tinyint(4) NOT NULL DEFAULT 0,
  `ra_content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ra_user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `ra_product_id`, `ra_number`, `ra_content`, `ra_user_id`, `created_at`, `updated_at`) VALUES
(6, 2, 4, 'Sản phẩm rất tốt tôi rất thích !', 1, '2020-09-19 23:43:55', '2020-09-19 23:43:55'),
(7, 9, 5, 'sản phẩm quá tuyệt', 1, '2020-09-23 07:55:58', '2020-09-23 07:55:58'),
(8, 3, 5, 'Sản phẩm vượt mong đợi của người dùng', 3, '2020-09-25 19:16:41', '2020-09-25 19:16:41'),
(9, 3, 4, 'Product very nice !', 2, '2020-09-25 19:21:32', '2020-09-25 19:21:32'),
(13, 9, 4, 'Sản Phẩm  HỢp Lý vcl', 6, '2020-10-12 17:50:16', '2020-10-12 17:50:16'),
(15, 9, 5, 'SP TỐT', 6, '2020-10-12 17:53:39', '2020-10-12 17:53:39'),
(16, 9, 5, 'Sản phẩm rất tốt !', 6, '2020-10-12 17:55:15', '2020-10-12 17:55:15'),
(17, 13, 5, 'Sản Phẩm rất tuyệt Như mong đợi !', 6, '2020-10-12 18:20:39', '2020-10-12 18:20:39'),
(20, 9, 5, 'ok', 9, '2020-10-14 13:38:24', '2020-10-14 13:38:24'),
(21, 3, 5, 'Sản phẩm quá tốt', 9, '2020-10-14 13:39:01', '2020-10-14 13:39:01'),
(23, 10, 5, 'Sản phẩm dc ', 9, '2020-11-15 11:45:11', '2020-11-15 11:45:11'),
(24, 10, 4, 'sản phẩm tạm dc', 9, '2020-11-15 11:45:40', '2020-11-15 11:45:40'),
(25, 11, 5, 'Sản phẩm tuyệt vời', 10, '2020-11-16 16:34:21', '2020-11-16 16:34:21'),
(27, 33, 5, '5sao', 9, '2020-11-21 05:56:47', '2020-11-21 05:56:47'),
(28, 10, 3, 'sản phẩm phù hợp', 7, '2020-11-26 04:59:59', '2020-11-26 04:59:59'),
(29, 10, 5, 'SP TỐT', 7, '2020-11-26 07:00:53', '2020-11-26 07:00:53'),
(30, 46, 4, 'được', 11, '2021-12-02 04:40:08', '2021-12-02 04:40:08'),
(31, 46, 5, 'tuyệt', 12, '2021-12-02 05:01:41', '2021-12-02 05:01:41'),
(32, 50, 5, 'ngon', 11, '2021-12-09 14:36:52', '2021-12-09 14:36:52');

--
-- Bẫy `ratings`
--
DELIMITER $$
CREATE TRIGGER `trg_update_rating` AFTER INSERT ON `ratings` FOR EACH ROW BEGIN
UPDATE product set product.pro_total_rating = product.pro_total_rating + 1,
product.pro_total_number = product.pro_total_number + NEW.ra_number
WHERE product.id = NEW.ra_product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `users_id`, `status`, `note`, `created_at`, `update_at`) VALUES
(43, 66110000, 11, 1, 'nice', '2021-12-09 14:37:35', '2021-12-10 04:32:39'),
(44, 68200000, 11, 1, '123123', '2021-12-10 04:31:03', '2021-12-10 04:32:52'),
(45, 67100000, 11, 1, '111111', '2021-12-10 04:31:48', '2021-12-10 04:32:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `avatar`, `status`, `token`, `created_at`, `update_at`) VALUES
(1, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '0123322255', '215B37 Nguyễn Văn Hưởng, P, Quận 2, Thành phố Hồ Chí Minh', '4297f44b13955235245b2497399d7a93', NULL, 1, NULL, NULL, NULL),
(2, 'Nguyễn Văn B', 'nguyenvanb@gmail.com', '0363655265', 'Đường số 6, Linh Chiểu, Thủ Đức, Thành phố Hồ Chí Minh', '4297f44b13955235245b2497399d7a93', NULL, 1, NULL, NULL, NULL),
(3, 'Nguyễn Văn C', 'nguyenvanc@gmail.com', '0123566665', 'Unnamed Road, Bình Hưng Hòa B, Bình Tân, Thành phố Hồ Chí', '4297f44b13955235245b2497399d7a93', NULL, 1, NULL, NULL, NULL),
(5, 'Nguyễn Hữu Minh Khai', 'nguyenhuuminhkhai@gmail.com', '0969819947', 'Đường số 6, Linh Chiểu, Thủ Đức, Thành phố Hồ Chí Minh', '698d51a19d8a121ce581499d7b701668', NULL, 1, NULL, NULL, NULL),
(6, 'Nguyễn Hữu Minh Khai', 'nguyenhuuminhkhai123@gmail.com', '0969819947', 'Khu Phố N - Quận M -Thành Phố HCM', '4297f44b13955235245b2497399d7a93', NULL, 1, NULL, NULL, NULL),
(7, 'nguyễn văn tèo', 'nguyenvanteo@gmail.com', '09698887798', 'Khu phố n huyện n tỉnh m thành phố 123', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, NULL, NULL),
(10, 'Phan Thị Test', 'phanthitest@gmail.com', '0999656565', 'Khu khố 8 - Thủ Đức - Thành Phố HCM', '4297f44b13955235245b2497399d7a93', 'Codinglogo.jpg', 1, NULL, '2020-11-24 08:07:31', '2020-11-24 08:07:31'),
(11, 'Long Hai', 'daicaso123@gmail.com', '0927888997', '32 vu', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, '2021-11-04 09:02:11', '2021-11-04 09:02:11'),
(12, 'VĂN TÈO', 'naex@gmail.com', '0935251686', 'aaxxiq', '1d72310edc006dadf2190caad5802983', NULL, 1, NULL, '2021-12-02 05:01:25', '2021-12-02 05:01:25');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_a_name_unique` (`a_name`),
  ADD KEY `articles_a_slug_index` (`a_slug`),
  ADD KEY `articles_a_active_index` (`a_active`),
  ADD KEY `articles_a_author_id_index` (`a_home`),
  ADD KEY `articles_a_hot_index` (`a_hot`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_ra_product_id_index` (`ra_product_id`),
  ADD KEY `ratings_ra_user_id_index` (`ra_user_id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
