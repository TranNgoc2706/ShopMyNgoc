-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 24, 2024 lúc 11:55 AM
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
-- Cơ sở dữ liệu: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `pty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `product_id`, `pty`, `price`) VALUES
(5, 7, 18, 1, 4000),
(6, 8, 19, 1, 7000),
(7, 9, 11, 1, 1333),
(8, 10, 27, 1, 99),
(9, 11, 18, 1, 4000),
(10, 12, 18, 1, 4000),
(11, 13, 18, 1, 4000),
(12, 14, 18, 1, 4000),
(13, 15, 18, 1, 4000),
(14, 16, 18, 1, 4000),
(15, 17, 32, 1, 99);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `email`, `content`, `created_at`, `updated_at`) VALUES
(7, 'MyMyNgoc', '0346532706', 'Hồ Chí Minh', 'tranngoc510772@gmail.com', 'jk', '2024-07-21 03:04:09', '2024-07-21 03:04:09'),
(8, 'Bi', '0346532706', 'Hồ Chí Minh', 'dangminhloc886@gmail.com', NULL, '2024-07-21 03:06:16', '2024-07-21 03:06:16'),
(9, 'MyMyNgoc', '0346532706', 'Hồ Chí Minh', 'tranngoc510772@gmail.com', NULL, '2024-07-21 03:12:56', '2024-07-21 03:12:56'),
(10, 'Bi', '0346532706', 'Hồ Chí Minh', 'dangminhloc886@gmail.com', NULL, '2024-07-21 04:18:06', '2024-07-21 04:18:06'),
(11, 'MyMyNgoc', '0346532706', 'Hồ Chí Minh', 'tranngoc510772@gmail.com', NULL, '2024-07-21 04:41:03', '2024-07-21 04:41:03'),
(12, 'MyMyNgoc', '0346532706', 'Hồ Chí Minh', 'tranngoc510772@gmail.com', NULL, '2024-07-21 05:13:52', '2024-07-21 05:13:52'),
(13, 'MyMyNgoc', '0346532706', 'Hồ Chí Minh', 'tranngoc510772@gmail.com', NULL, '2024-07-21 05:13:58', '2024-07-21 05:13:58'),
(14, 'Bi', '0346532706', 'Hồ Chí Minh', 'dangminhloc886@gmail.com', NULL, '2024-07-21 05:16:08', '2024-07-21 05:16:08'),
(15, 'nuoc hoa nam', '0346532706', 'Hồ Chí Minh', 'admin@localhost.com', 'vbnm', '2024-07-21 05:16:41', '2024-07-21 05:16:41'),
(16, 'nuoc hoa nam', '0346532706', 'Hồ Chí Minh', 'dangminhloc886@gmail.com', NULL, '2024-07-21 05:37:56', '2024-07-21 05:37:56'),
(17, 'Minh Tài Đặng', '0097687877', 'hcm', 'tranngoc510772@gmail.com', NULL, '2024-07-21 08:55:30', '2024-07-21 08:55:30');

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
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `description`, `content`, `active`, `created_at`, `updated_at`, `thumb`) VALUES
(17, 'WATCHES', 0, 'ALL  WATCHES', '<p><span style=\"font-size:14px\"><strong>At Cartier, everything begins with the design. The Maison&rsquo;s obsession for pure lines, precise shapes and precious details has led to design objects that defy the decades. Uncover the watch collections that have become emblems of design at Cartier: Tank, Santos, Panth&egrave;re, Ballon Bleu and many more.</strong></span></p>', 1, '2024-07-21 10:05:37', '2024-07-21 10:52:41', '/storage/uploads/2024/07/21/header_wa_ALL_WATCHESavif.avif'),
(20, 'RINGS', 0, 'TRINITY RINGS', '<p>Three bands of gold - white, yellow, rose -&nbsp;that are harmoniously interlinked, moving to the same rhythm.</p>', 1, '2024-07-22 07:15:41', '2024-07-22 07:15:41', '/storage/uploads/2024/07/22/TRINITY_RINGSy.avif'),
(21, 'NECKLACES', 0, 'CLASH DE CARTIER NECKLACES', '<p>Too much or not enough? Classic or eccentric? Clash de Cartier cultivates contrasts.</p>', 1, '2024-07-22 07:19:21', '2024-07-22 07:19:21', '/storage/uploads/2024/07/22/01_HEADER_CLASH_NECKLACES.avif'),
(22, 'EARRINGS', 0, 'TRINITY EARRINGS', '<p>White gold, yellow gold, rose gold: the signature chromatic trilogy for&nbsp;Trinity, just like the purity and simplicity of its design.</p>', 1, '2024-07-22 07:23:07', '2024-07-22 07:23:07', '/storage/uploads/2024/07/22/TRINITY_EARRINGS.webp'),
(23, 'BRACELETS', 0, 'JUSTE UN CLOU BRACELETS', '<p>Conceived in &#39;70s New York, the Juste un Clou collection reflects the bold spirit of the era. Its nail-inspired silhouette breaks through conventions, asserting the essence of its wearer. Original, independent, fearless, and free.</p>', 1, '2024-07-22 07:25:38', '2024-07-22 07:25:38', '/storage/uploads/2024/07/22/01_HEADER_JUC_SALESFORCE.webp'),
(24, 'ENGAGEMENT RINGS', 0, 'TRINITY ENGAGEMENT RINGS', '<p>Exclusive creations, characterized by masterful design, harmonious settings, and perfectly cut stones. United in exquisite elegance, these solitaires stand for an infinite plethora of feelings.</p>', 1, '2024-07-22 07:33:10', '2024-07-22 07:33:10', '/storage/uploads/2024/07/22/HEADER_MH_NEL_ENGAGEMENT_RINGS.avif');

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
(5, '2024_07_03_193354_create_menus_table', 2),
(6, '2024_07_06_101206_create_products_table', 3),
(7, '2024_07_06_102426_update_table_product', 4),
(8, '2024_07_06_125045_update_table_product', 5),
(9, '2024_07_09_184239_create_slides_table', 6),
(10, '2024_07_21_082509_create_customers_table', 7),
(11, '2024_07_21_082613_create_carts_table', 7),
(12, '2024_07_21_152651_create_sliders_table', 8);

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
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `menu_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `content`, `menu_id`, `price`, `price_sale`, `active`, `created_at`, `updated_at`, `thumb`) VALUES
(35, 'SANTOS DE CARTIER WATCH', 'CARTIER WATCH', '<p>Santos de Cartier watch, large model, mechanical movement with automatic winding 1847 MC. Steel case, 7-sided crown set with a synthetic faceted blue spinel, graduated green dial, polished steel sword-shaped hands with luminescent material, sapphire crystal. Steel bracelet with SmartLink adjustment system. Second strap in green alligator skin, with interchangeable steel folding buckle. Both are fitted with the QuickSwitch interchangeable system. Case width: 39.8 mm, thickness: 9.38 mm. Water-resistant up to 10 bar (approx. 100 meters/330 feet)</p>', 17, 182000000, NULL, 1, '2024-07-22 07:42:56', '2024-07-22 07:42:56', '/storage/uploads/2024/07/22/h1.avif'),
(36, 'PANTHÈRE DE CARTIER WATCH', 'CARTIER WATCH', '<p>Panth&egrave;re de Cartier watch, mini model, quartz movement. Steel case and bracelet. Octagonal crown set with a blue synthetic spinel. Silver dial, blued-steel sword-shaped hands, sapphire crystal. Case dimensions: 25 mm x 19 mm, thickness: 6 mm. Water-resistant up to 3 bar (approx. 30 meters/100 feet).</p>', 17, 180000000, NULL, 1, '2024-07-22 07:45:02', '2024-07-22 07:45:02', '/storage/uploads/2024/07/22/h3.avif'),
(37, 'TANK MUST WATCH', 'TANK', '<p>Tank Must watch, large model, high autonomy quartz movement. Steel case, beaded crown set with a synthetic cabochon-shaped spinel, silvered dial, blued-steel sword-shaped hands, interchangeable steel bracelet. Case dimensions: 33.7 mm x 25.5 mm, thickness: 6.6 mm. Water-resistant up to 3 bar (approx. 30 meters/100 feet).&nbsp;</p>', 17, 17000000, NULL, 1, '2024-07-22 07:46:04', '2024-07-22 07:46:04', '/storage/uploads/2024/07/22/h2.avif'),
(38, 'TRINITY CUSHION RING', 'MEDIUM MODEL', '<p>Trinity ring, 18K white gold (750/1000), 18K rose gold (750/1000), 18K yellow gold (750/1000).</p>\r\n\r\n<p>Please note that the carat weight, number of stones and product dimensions will vary based on the size of the creation you order.&nbsp;For detailed information please contact us.</p>', 20, 75000000, NULL, 1, '2024-07-22 07:48:48', '2024-07-22 07:48:48', '/storage/uploads/2024/07/22/RING1.avif'),
(39, 'CUSHION RING', 'TRINITY', '<p>Trinity ring, 18K white gold (750/1000), 18K rose gold (750/1000), 18K yellow gold (750/1000), set with 435 brilliant-cut diamonds totaling 3.50 carats (for size 52).</p>\r\n\r\n<p>Please note that the carat weight, number of stones and product dimensions will vary based on the size of the creation you order.&nbsp;For detailed information please contact us.</p>', 20, 45000000, NULL, 1, '2024-07-22 07:50:09', '2024-07-22 07:50:09', '/storage/uploads/2024/07/22/RING2.avif'),
(40, 'TRINITY RING', 'TRINITY', '<p>Trinity ring, medium model, 18K white gold (750/1000), 18K rose gold (750/1000), 18K yellow gold (750/1000), set with 144 brilliant-cut diamonds totaling 1.54 carats (for size 52).<br />\r\nThis design can be worn in multiple ways. The engraved size refers to when all three mobile bands paved with diamonds are visible. When the diamonds are concealed, the ring is three metric sizes larger.Please note that the carat weight, number of stones and product dimensions will vary based on the size of the creation you order.&nbsp;For detailed information please contact us.</p>', 20, 35000000, NULL, 1, '2024-07-22 07:51:25', '2024-07-22 07:51:25', '/storage/uploads/2024/07/22/ring3.avif'),
(41, 'CLASH DE CARTIER NECKLACE', 'NECKLACES', '<p>Clash de Cartier necklace, rose gold (750/1000), set with 56 brilliant-cut diamonds totaling 0.20 carats.</p>\r\n\r\n<p>Please note that the carat weight, number of stones and product dimensions will vary based on the size of the creation you order.&nbsp;For detailed information please</p>', 21, 64000000, NULL, 1, '2024-07-22 07:53:23', '2024-07-22 07:53:23', '/storage/uploads/2024/07/22/v1.avif'),
(42, 'CLASH DE CARTIER NECKLACE, FLEXIBLE MEDIUM MODEL', 'NECKLACES', '<p>Clash de Cartier necklace, flexible medium model, rhodiumized white gold (750/1000).</p>\r\n\r\n<p>Please note that the carat weight, number of stones and product dimensions will vary based on the size of the creation you order.&nbsp;For detailed information please contact us.</p>', 21, 73300000, NULL, 1, '2024-07-22 07:55:25', '2024-07-22 07:55:25', '/storage/uploads/2024/07/22/v2.avif'),
(43, 'CLASH DE CARTIER NECKLACE, XL MODEL', 'NECKLACES', '<p>Clash de Cartier necklace, XL model, rose gold (750/1000).</p>\r\n\r\n<p>Please note that the carat weight, number of stones and product dimensions will vary based on the size of the creation you order.&nbsp;For detailed information please contact us.</p>', 21, 89000000, NULL, 1, '2024-07-22 07:57:27', '2024-07-22 07:57:27', '/storage/uploads/2024/07/22/v4.webp'),
(44, 'CLASH DE CARTIER', 'NECKLACES', '<p>Clash de Cartier necklace, flexible small model, rose gold (750/1000), 952 diamonds, 3.806 carats.</p>\r\n\r\n<p>Please note that the carat weight, number of stones and product dimensions will vary based on the size of the creation you order.&nbsp;For detailed information please contact us.</p>', 21, 98000000, NULL, 1, '2024-07-22 08:01:17', '2024-07-22 08:01:17', '/storage/uploads/2024/07/22/v3.avif'),
(45, 'LOVE EARRINGS', 'ERRINGS', '<p>LOVE earrings, 18K rose gold (750/1000), each set with 15 brilliant-cut diamonds totaling 0.13 carats. Removable bottom hoops. Width: 3.3 mm.</p>\r\n\r\n<p>Please note that the carat weight, number of stones and product dimensions will vary based on the size of the creation you order.&nbsp;For detailed information please contact us.</p>', 22, 24000000, NULL, 1, '2024-07-22 08:08:09', '2024-07-22 08:08:09', '/storage/uploads/2024/07/22/b1.avif'),
(46, 'LOVE EARRINGS YELLOW', 'ERRINGS', '<p>LOVE earrings, 18K yellow gold (750/1000). Removable bottom hoops. Width: 3.3 mm.</p>\r\n\r\n<p>Please note that the carat weight, number of stones and product dimensions will vary based on the size of the creation you order.&nbsp;For detailed information please</p>', 22, 34000000, NULL, 1, '2024-07-22 08:09:35', '2024-07-22 08:23:05', '/storage/uploads/2024/07/22/b2.avif'),
(47, 'ETINCELLE DE CARTIER RING', 'ENGAGEMENT', '<p>Etincelle de Cartier ring, rose gold 750/1000, set with a pear-shaped diamond centre stone of 0.16 carats and 22 brilliant-cut diamonds totalling 0.10 carats. Width: 1.52 mm. Thickness: 1.35 mm (for size 52)</p>\r\n\r\n<p>Please note that the carat weight, number of stones and product dimensions will vary based on the size of the creation you order.&nbsp;For detailed information please contact us.</p>', 24, 56000000, NULL, 1, '2024-07-22 08:11:13', '2024-07-22 08:11:13', '/storage/uploads/2024/07/22/DH1.avif'),
(48, 'ETINCELLE DE CARTIER RING Rose gold', 'ENGAGEMENT', '<p>&Eacute;tincelle de Cartier ring, 18K rose gold (750/1000), set with an emerald-cut diamond center stone of 0.16 carat and 22 brilliant-cut diamonds totaling 0.10 carat. Width: 1.52 mm. Thickness: 1.35 mm (for size 52).</p>\r\n\r\n<p>Please note that the carat weight, number of stones and product dimensions will vary based on the size of the creation you order.&nbsp;For detailed information please contact us.</p>', 24, 36000000, NULL, 1, '2024-07-22 08:12:46', '2024-07-22 08:12:46', '/storage/uploads/2024/07/22/DH2.avif'),
(49, 'ETINCELLE DE CARTIER RING White gold', 'ENGAGEMENT', '<p>&Eacute;tincelle de Cartier ring, 18K white gold (750/1000), set with an emerald-cut diamond center stone of 0.16 carat and 22 brilliant-cut diamonds totaling 0.10 carat. Width: 1.52 mm. Thickness: 1.35 mm (for size 52).</p>\r\n\r\n<p>Please note that the carat weight, number of stones and product dimensions will vary based on the size of the creation you order.&nbsp;For detailed information please contact us.</p>', 24, 34000000, NULL, 1, '2024-07-22 08:14:44', '2024-07-22 08:14:44', '/storage/uploads/2024/07/22/DH3.avif'),
(50, 'JUSTE UN CLOU BRACELET, SMALL MODELJUSTE UN CLOU BRACELET, SMALL MODEL', 'BRAELETS', '<h1><span style=\"font-size:14px\">Juste un Clou bracelet, small model, yellow gold (750/1000), set with 20 brilliant-cut diamonds totaling 0.18 carat. Width 2.5 mm (for size 17).</span></h1>\r\n\r\n<p>Please note that the carat weight, number of stones and product dimensions will vary based on the size of the creation you order.&nbsp;For detailed information please contact us.</p>', 23, 67000000, NULL, 1, '2024-07-22 08:18:07', '2024-07-22 08:18:07', '/storage/uploads/2024/07/22/L1.avif'),
(51, 'LOVE BRACELET, BRUSHED FINISH', 'BRACELETS', '<p>LOVE bracelet, white gold 750/1000, brushed finish. Comes with a screwdriver. Width: 6.1&nbsp;mm. Created in New York in 1969, the LOVE bracelet is a jewelry design icon: a close fitting, oval bracelet composed of two rigid arcs, which is worn on the wrist and removed using a special screwdriver. The closure is designed with two functional screws placed on either side of the bracelet: you will need help to open or close it. To determine the size of your LOVE bracelet, measure your wrist, adding one centimeter to your size for a tighter fit, or two centimeters for a looser fit.</p>', 23, 65000000, NULL, 1, '2024-07-22 08:19:07', '2024-07-22 08:19:07', '/storage/uploads/2024/07/22/L2.avif');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `sort_by` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `url`, `thumb`, `sort_by`, `active`, `created_at`, `updated_at`) VALUES
(2, 'SUMMER', 'https://www.cartier.com/en-us/home', '/storage/uploads/2024/07/23/01_SUMMER24.webp', 2, 1, '2024-07-21 08:46:54', '2024-07-23 03:10:32'),
(4, 'SET TO SUMMER TIME', 'https://www.cartier.com/en-us/home', '/storage/uploads/2024/07/21/HEADER.avif', 3, 1, '2024-07-21 08:49:03', '2024-07-21 08:49:03'),
(5, 'SUMMER', 'https://www.cartier.com/en-us/home', '/storage/uploads/2024/07/23/US_&_CA.avif', 3, 1, '2024-07-21 09:48:07', '2024-07-23 03:10:08');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@localhost.com', NULL, '$2y$10$NbI3aybnjGXyLUsZwcPTy./t437CA7MmLz4Y4tmkSqoVqWqIXhbwi', NULL, '2024-06-30 18:04:03', '2024-06-30 18:04:03');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
