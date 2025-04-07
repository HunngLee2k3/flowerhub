-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 07, 2025 lúc 02:49 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `flower_hub_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address_line` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address_line`, `city`, `postal_code`, `country`, `phone`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 1, 'truong tho,thu duc', 'Ho Chi Minh', NULL, 'Vietnam', '0355527588', 0, '2025-04-06 14:07:02', '2025-04-07 05:37:23'),
(3, 2, 'truong tho,thu duc', 'Ho Chi Minh', NULL, 'Vietnam', '0355527588', 0, '2025-04-06 14:15:03', '2025-04-06 14:15:03'),
(4, 1, 'hutech q9', 'Ho Chi Minh', NULL, 'Vietnam', '0355527588', 0, '2025-04-06 15:57:45', '2025-04-06 15:57:45'),
(6, 1, 'q9', 'Ho Chi Minh', NULL, 'Vietnam', '0355527588', 0, '2025-04-07 05:37:38', '2025-04-07 05:37:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sinh nhật', 'Hoa dành cho dịp sinh nhật', '2025-04-06 19:32:58', '2025-04-06 19:32:58'),
(2, 'Hoa chúc mừng', 'Hoa để chúc mừng các sự kiện vui', '2025-04-06 19:32:58', '2025-04-06 19:32:58'),
(3, 'Hoa tốt nghiệp', 'Hoa tặng trong lễ tốt nghiệp', '2025-04-06 19:32:58', '2025-04-06 19:32:58'),
(4, 'Hoa khai trương', 'Hoa chúc mừng khai trương', '2025-04-06 19:32:58', '2025-04-06 19:32:58'),
(5, 'Hoa chia buồn', 'Hoa dùng trong tang lễ', '2025-04-06 19:32:58', '2025-04-06 19:32:58'),
(6, 'Linh Thảo', NULL, '2025-04-07 12:20:10', '2025-04-07 12:20:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2025_04_06_175014_create_addresses_table', 2),
(16, '2025_04_06_175057_create_categories_table', 2),
(17, '2025_04_06_175133_create_products_table', 2),
(18, '2025_04_06_175158_create_orders_table', 2),
(19, '2025_04_06_175224_create_order_details_table', 2),
(20, '2025_04_06_221404_add_role_to_users_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total` decimal(8,2) NOT NULL,
  `status` enum('pending','completed','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 300000.00, 'pending', '2025-04-06 14:08:31', '2025-04-06 14:08:31'),
(2, 1, NULL, 300000.00, 'pending', '2025-04-06 14:11:26', '2025-04-06 14:11:26'),
(3, 1, NULL, 300000.00, 'pending', '2025-04-06 14:11:59', '2025-04-06 14:11:59'),
(4, 1, NULL, 300000.00, 'pending', '2025-04-06 14:12:11', '2025-04-06 14:12:11'),
(5, 1, 1, 600000.00, 'pending', '2025-04-06 14:13:15', '2025-04-06 14:13:15'),
(6, 2, 3, 600000.00, 'pending', '2025-04-06 14:15:21', '2025-04-06 14:15:21'),
(7, 1, 1, 400000.00, 'pending', '2025-04-06 15:54:37', '2025-04-06 15:54:37'),
(8, 1, 1, 650000.00, 'pending', '2025-04-06 15:58:11', '2025-04-06 15:58:11'),
(9, 1, 1, 350000.00, 'pending', '2025-04-06 16:05:20', '2025-04-06 16:05:20'),
(10, 1, 1, 250000.00, 'pending', '2025-04-06 16:11:26', '2025-04-06 16:11:26'),
(11, 1, 1, 800000.00, 'pending', '2025-04-06 16:19:39', '2025-04-06 16:19:39'),
(12, 1, NULL, 450000.00, 'pending', '2025-04-06 16:23:30', '2025-04-06 16:23:30'),
(13, 1, NULL, 360000.00, 'pending', '2025-04-07 05:36:34', '2025-04-07 05:36:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(17, 13, 21, 2, 130000.00, '2025-04-07 05:36:34', '2025-04-07 05:36:34'),
(18, 13, 12, 2, 50000.00, '2025-04-07 05:36:34', '2025-04-07 05:36:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `description`, `image`, `stock`, `created_at`, `updated_at`) VALUES
(12, 2, 'Hoa tình yêu - Tình đầu thơ ngây', 50000.00, 'Sản phẩm bao gồm:\r\nCẩm chướng chùm hồng viền: 3\r\nCúc calimero hồng : 3\r\nHoa Sao tím: 1\r\nPink OHara: 1', 'products/vXk3dvan4ugZeJQJc10KlKnpdXKNjWhzk6vn7nM2.jpg', 10, '2025-04-07 05:01:21', '2025-04-07 05:01:21'),
(13, 2, 'Hoa tình yêu - Ngọt ngào 8 - 12279', 55000.00, 'Sản phẩm bao gồm:\r\nCalimero nâu: 7\r\nGreen bell: 2\r\nHoa baby : 0,5\r\nHồng Pink Mondial : 5\r\nĐồng tiền hồng nhí : 5', 'products/x2CRb2QS4OyJ4pvCDua9evmsLQicPtj5qrzAs6So.jpg', 10, '2025-04-07 05:03:37', '2025-04-07 05:03:37'),
(14, 2, 'Hoa tình yêu - Luxury vase 21 - 13311', 77000.00, 'Sản phẩm bao gồm:\r\nCẩm chướng đơn hồng: 10\r\nCúc mẫu đơn hồng đậm NK : 2\r\nCúc mẫu đơn hồng đào NK : 4\r\nCúc mẫu đơn đỏ NK: 4\r\nHồng song hỷ cồ : 10', 'products/BLCmoQtgOLPOCUXbOs8asPWL4KBmYiX05A5qwrkm.jpg', 10, '2025-04-07 05:04:31', '2025-04-07 05:04:31'),
(15, 1, 'Hoa sinh nhật - You are beautiful - 10708', 50000.00, 'Sản phẩm bao gồm:\r\nCát tường trắng: 5\r\nCúc calimero trắng: 6\r\nHoa Sao tím: 2\r\nHồng đỏ sa : 22\r\nLá đuôi chồn : 5', 'products/23byOKUlXH9ZjPgo7cenlfDhpRnFvCVIiLj70pAK.jpg', 10, '2025-04-07 05:06:06', '2025-04-07 05:06:06'),
(16, 1, 'Hoa sinh nhật - My Juliet - 12578', 60000.00, 'Sản phẩm bao gồm:\r\nCúc mẫu đơn cam nhạt: 3\r\nCúc mẫu đơn hồng đào: 5\r\nFree Spirit Rose: 20\r\nHoa hạnh phúc : 5\r\nHồng đỏ Ecuador DL: 20\r\nSen đá lớn ngẫu nhiên: 1\r\nSen đá nhỏ ngẫu nhiên: 5\r\nSen đá size trung ngẫu nhiên: 2', 'products/vZRT8BIkW2RXvFKsjGJ6LUqTeNAo8IY4kts9hK5d.jpg', 10, '2025-04-07 05:06:57', '2025-04-07 05:06:57'),
(17, 1, 'Hoa sinh nhật - Proud of you - 13246', 70000.00, 'Sản phẩm bao gồm:\r\nCẩm chướng chùm cam : 2\r\nFree Spirit Rose (10): 15\r\nHồng trứng gà : 5', 'products/MU1Pg3m4a0rBzMz8DoGXpS8BcvrOU3JThN8oYsZg.jpg', 9, '2025-04-07 05:08:20', '2025-04-07 05:08:20'),
(18, 3, 'Ngày nhà giáo - For You - 5182', 90000.00, 'Sản phẩm bao gồm:\r\nPink OHara: 10', 'products/zwNsOSQ5L6iveJ1AULtkgrACrrTjaxpxVXF9llPp.jpg', 9, '2025-04-07 05:10:06', '2025-04-07 05:10:06'),
(19, 3, 'Chân Tình - 5290', 77000.00, 'Sản phẩm bao gồm:\r\nCúc Tana: 2\r\nCẩm chướng đơn trắng : 5\r\nCúc calimero trắng : 5\r\nHồng trắng cồ: 5 (nhuộm xanh dương)', 'products/Bw1N3DDNDvPMccI4KxbVlKJ9amCWeyorKoxFcCX3.jpg', 9, '2025-04-07 05:11:34', '2025-04-07 05:11:34'),
(20, 4, 'Hoa chúc mừng - Con đường rực rỡ - 15492', 150000.00, 'Sản phẩm bao gồm:\r\nCúc calimero trắng : 10\r\nHoa baby : 1\r\nLan Moka vàng nến: 10\r\nĐồng tiền vàng : 30', 'products/lUBLNp3ik3O6g7eF3SofsuKpFO6C45OlXlZqx50l.jpg', 9, '2025-04-07 05:12:30', '2025-04-07 05:12:30'),
(21, 4, 'Hoa chúc mừng - Good Luck 3 - 4047', 130000.00, 'Sản phẩm bao gồm:\r\nCúc calimero trắng : 10\r\nHoa baby : 1\r\nLan Moka vàng nến: 10\r\nĐồng tiền vàng : 30', 'products/EZWHFG9BPUrd3dnCCFcr4HuYXrMYT4gS345JtjU2.jpg', 9, '2025-04-07 05:13:57', '2025-04-07 05:13:57'),
(22, 4, 'Hoa chúc mừng - Congrats mini size 7 - 14351', 199000.00, 'Sản phẩm bao gồm:\r\nCúc calimero vàng nhụy nâu : 5\r\nHồng trứng gà : 10\r\nHướng dương : 2\r\nLan vũ nữ: 5\r\nMôn xanh: 5', 'products/7W3rci6msrgf0oSii8Nr9cjsHKFRFyq7XCNvNJgJ.jpg', 9, '2025-04-07 05:14:47', '2025-04-07 05:14:47'),
(23, 5, 'Hoa chia buồn - Chia xa - 12911', 88000.00, 'Sản phẩm bao gồm:\r\nCúc lưới trắng : 15\r\nHoa Cúc Lưới Vàng : 5', 'products/o6p8SmD5zP3JBSB4A5qJbskBIMT2Nb2vyErSmScZ.jpg', 9, '2025-04-07 05:15:46', '2025-04-07 05:15:46'),
(24, 5, 'Hoa chia buồn - Kệ lan thái tím - 15460', 130000.00, 'Sản phẩm bao gồm:\r\nLan Thái Tím: 24', 'products/skHzVhFsg8S8q7aeMtS6LthLDavxgmmCvPM6ZraR.jpg', 9, '2025-04-07 05:16:29', '2025-04-07 05:16:29'),
(25, 6, 'Thanh Diệp Linh Thảo', 999999.00, 'Tương truyền nơi Nam Lĩnh hoang sơn, có một loại linh thảo tên gọi ‘Mộng Vân Diệp’ – chỉ cần hít nhẹ một hơi, tâm hồn phiêu bạt cửu thiên, thần trí như nhập mộng, ngũ giác đều khai mở… Nhưng cũng dễ vạn kiếp bất phục.', 'products/zFjpyaKwpT8mVa071fwzLge9ewdyamgZgtmijF82.jpg', 9, '2025-04-07 05:23:54', '2025-04-07 05:23:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'user123', 'user123@gmail.com', NULL, '$2y$10$/1QHY7/bY5hAwOLsxiEJnOU.TkZfZt2Aa8XgqAdR/vqqxmeM7QZK6', NULL, '2025-04-06 12:14:56', '2025-04-06 12:14:56', 'user'),
(2, 'test1', 'lehung030203@gmail.com', NULL, '$2y$10$FLX.4qZbhz7jdrzBerzND.su/qD0U/1t88Ka2EJoq4ReLFXOMzoWe', NULL, '2025-04-06 14:14:08', '2025-04-06 14:14:08', 'user'),
(3, 'test1', 'admin@gmail.com', NULL, '$2y$10$jKhr6L9WfwtUZSqosvv2aeHaptUi5edF4CiGcq0Yp6tEyDxPIvlCm', NULL, '2025-04-06 15:10:44', '2025-04-06 15:10:44', 'admin'),
(4, 'hah', 'hahdigitalcontact@gmail.com', NULL, '$2y$10$gu773XYHk/O5rwqwTDc62OuzUnorNX6noYyylNnADQSmPaX7/wsiO', NULL, '2025-04-07 05:32:13', '2025-04-07 05:32:13', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
