-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 02:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel8`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_page` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slug`, `brand_logo`, `front_page`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'apple', 'file/brand/apple.jpg', 1, NULL, NULL),
(3, 'Google', 'google', 'file/brand/google.jpg', 1, NULL, NULL),
(4, 'BoPlay', 'boplay', 'file/brand/boplay.jpg', 1, NULL, NULL),
(5, 'Mi', 'mi', 'file/brand/mi.jpg', 1, NULL, NULL),
(6, 'One Plus', 'one-plus', 'file/brand/one-plus.jpg', 1, NULL, NULL),
(7, 'Samsung', 'samsung', 'file/brand/samsung.jpg', 1, NULL, NULL),
(8, 'Sony', 'sony', 'file/brand/sony.jpg', 1, NULL, NULL),
(9, 'Meizu', 'meizu', 'file/brand/meizu.jpg', 1, NULL, NULL),
(10, 'Apple', 'apple', 'file/brand/apple.jpg', NULL, NULL, NULL),
(11, 'DJI Phantom', 'dji-phantom', 'file/brand/dji-phantom.jpg', NULL, NULL, NULL),
(12, 'Swegway', 'swegway', 'file/brand/swegway.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaign_product`
--

CREATE TABLE `campaign_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Catagory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Catagory_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_page` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `Catagory_name`, `Catagory_slug`, `icon`, `home_page`, `created_at`, `updated_at`) VALUES
(2, 'Mens Fashion', 'mens-fashion', 'file/category_icon/mens-fashion.png', NULL, NULL, NULL),
(3, 'Women Fashion', 'women-fashion', 'file/category_icon/women-fashion.png', NULL, NULL, NULL),
(4, 'Electronic', 'electronic', 'file/category_icon/electronic.png', 1, NULL, NULL),
(5, 'Furniture', 'furniture', 'file/category_icon/furniture.png', NULL, NULL, NULL),
(6, 'Sports & Outdoor', 'sports-outdoor', 'file/category_icon/sports-outdoor.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `childcatagories`
--

CREATE TABLE `childcatagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Catagory_id` bigint(20) UNSIGNED NOT NULL,
  `Subcatagory_id` bigint(20) UNSIGNED NOT NULL,
  `Childcatagory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Childcatagory_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `childcatagories`
--

INSERT INTO `childcatagories` (`id`, `Catagory_id`, `Subcatagory_id`, `Childcatagory_name`, `Childcatagory_slug`, `created_at`, `updated_at`) VALUES
(2, 4, 4, 'Camera', 'camera', NULL, NULL),
(3, 4, 4, 'Balance Controller', 'balance-controller', NULL, NULL),
(4, 4, 4, 'Charm', 'charm', NULL, NULL),
(5, 4, 4, 'Drone', 'drone', NULL, NULL),
(6, 4, 4, 'mouse', 'mouse', NULL, NULL),
(7, 4, 4, 'Headphones', 'headphones', NULL, NULL),
(8, 4, 4, 'Speaker', 'speaker', NULL, NULL),
(9, 4, 2, 'Feature Phone', 'feature-phone', NULL, NULL),
(10, 4, 2, 'Android', 'android', NULL, NULL),
(11, 4, 4, 'I phone', 'i-phone', NULL, NULL),
(12, 4, 2, 'I phone', 'i-phone', NULL, NULL),
(13, 4, 3, 'Laptop', 'laptop', NULL, NULL),
(14, 4, 4, 'Media Player', 'media-player', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `coupon_amount` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `valid_date`, `type`, `coupon_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Decembar Offer', '2023-12-12', 1, 450, 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_06_14_060738_create_seos_table', 6),
(15, '2023_08_07_054515_create_settings_table', 11),
(36, '2023_05_24_051652_create_catagories_table', 12),
(37, '2023_05_27_141859_create_subcatagories_table', 12),
(38, '2023_05_31_110801_create_childcatagories_table', 12),
(39, '2023_06_06_123723_create_brands_table', 12),
(40, '2023_06_14_104257_create_smtp_table', 12),
(41, '2023_07_27_032247_create_pages_table', 12),
(42, '2023_07_28_044905_create_products_table', 12),
(43, '2023_07_28_054439_create_warehouses_table', 12),
(44, '2023_08_10_093803_create_coupons_table', 12),
(45, '2023_10_11_052112_create_pickup_points_table', 12),
(46, '2023_11_22_171913_create_reviews_table', 12),
(47, '2023_11_22_172856_create_wbreviews_table', 12),
(48, '2023_11_22_173610_create_campaigns_table', 12),
(49, '2023_12_06_161427_create_wishlists_table', 12),
(50, '2023_12_09_073852_create_campaign_product_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_position` int(11) NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('customer@gamil.com', '$2y$10$xmEy1BpSqJTcjwZGXCJm2unSMpLEJLilLaJHeJBjnGsHAuLpaP63S', '2023-05-23 04:51:38'),
('moonkanadi@gmail.com', '$2y$10$kT6RMhFXhd/l2SPKH2MgV.o.XedJUOMkF2ia27vDJ6vzHbEdKa/MK', '2023-06-12 06:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pickup_points`
--

CREATE TABLE `pickup_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pickup_point_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_point_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_point_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_point_phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pickup_points`
--

INSERT INTO `pickup_points` (`id`, `pickup_point_name`, `pickup_point_address`, `pickup_point_phone`, `pickup_point_phone_two`, `created_at`, `updated_at`) VALUES
(1, 'Dhanmondi Pickup Point', '234,Sankar,Dhanmondi', '01518431773', '01518439062', NULL, NULL),
(2, 'Mohammadpur Pickup Point', '2A,Mohammadpur Bas Stand,Mohammadpur', '017733625864', '01518431772', NULL, NULL),
(4, 'Mirpur Pickup Point', '2B,Mirpur-2,Mirpur', '01518431773', '01773625864', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `childcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse` int(11) DEFAULT NULL,
  `pickup_point_id` int(11) DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `product_views` int(11) DEFAULT NULL,
  `product_slider` int(11) DEFAULT NULL,
  `trendy` int(11) DEFAULT NULL,
  `today_deal` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `flash_deal_id` int(11) DEFAULT NULL,
  `cash_on_delivery` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `childcategory_id`, `brand_id`, `name`, `slug`, `code`, `unit`, `tags`, `color`, `size`, `video`, `purchase_price`, `selling_price`, `discount_price`, `stock_quantity`, `warehouse`, `pickup_point_id`, `description`, `thumbnail`, `images`, `featured`, `product_views`, `product_slider`, `trendy`, `today_deal`, `status`, `flash_deal_id`, `cash_on_delivery`, `admin_id`, `created_at`, `updated_at`) VALUES
(2, 4, 4, 3, 12, 'Swegway Balance Wheel', 'swegway-balance-wheel', '1231', '5', 'trendy,Balance controller,gadget,swegway', 'white and black', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/wrI6q0BqieY?si=FYnct5YQyUHNlnu7\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2000', '2500', '2300', 'limited', 1, 1, '<p>This is a smart balance wheel for all health concious people.</p>', 'swegway-balance-wheel.jpg', '[]', NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, 1, NULL, NULL),
(3, 4, 4, 4, 7, 'Samsung Charm', 'samsung-charm', '1232', '5', 'charm,samsung,gadget', 'white', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/k3h9dFd32Zg?si=sc2uOruZmjwQe_eD\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '3000', '3500', '3300', NULL, 1, 2, '<p><span style=\"color: rgb(54, 54, 54); font-family: SamsungOneLatinWeb, SamsungSans, Interface_bd, Arial, Helvetica, San-Serif; font-size: 17.05px;\">Simply pair with your device and monitor your daily activity by tracking how many steps you have taken, distance and calories burned with S Health.</span><br></p>', 'samsung-charm.jpg', '[]', NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, 1, NULL, NULL),
(4, 4, 4, 5, 11, 'DJI Phantom 3', 'dji-phantom-3', '1233', '1', 'gadget,drone,dji phantom', 'white,black,red', 'lg,sm,m', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/7jJn7uvqgc0?si=WiwYBjFxNyslJKRp\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '10000', '12000', '11000', 'limited', 1, 1, '<h3 class=\"section-title\" style=\"font-family: Gotham, &quot;Helvetica Neue&quot;, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, &quot;WenQuanYi Micro Hei&quot;, Arial, sans-serif; line-height: 1.1; color: rgb(112, 116, 115); margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 20px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; word-spacing: -1px;\">Aircraft</h3><table class=\"table-specs\" style=\"border-collapse: separate; border-spacing: 0px; margin: 0px 0px 60px; padding: 0px; border: 0px; outline: 0px; font-family: &quot;Open Sans&quot;, &quot;PingFang SC&quot;, &quot;Microsoft YaHei&quot;, &quot;Helvetica Neue&quot;, &quot;Hiragino Sans GB&quot;, &quot;WenQuanYi Micro Hei&quot;, Arial, sans-serif; vertical-align: middle; width: 570px; color: rgb(112, 116, 115); font-size: 14px; word-spacing: -1px;\"><tbody style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-family: inherit; vertical-align: baseline;\"><tr style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-family: inherit; vertical-align: baseline;\"><th style=\"padding: 6px 0px; text-align: left; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; font-weight: 400; width: 228px; color: rgb(68, 168, 242); font-size: 12px; line-height: 1.4em;\">Weight (Battery &amp; Propellers Included)</th><td style=\"padding: 6px 0px 6px 10px; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; width: 342px; font-size: 12px; line-height: 1.4em;\">1216 g</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-family: inherit; vertical-align: baseline;\"><th style=\"padding: 6px 0px; text-align: left; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; font-weight: 400; width: 228px; color: rgb(68, 168, 242); font-size: 12px; line-height: 1.4em;\">Diagonal Size (Propellers Excluded)</th><td style=\"padding: 6px 0px 6px 10px; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; width: 342px; font-size: 12px; line-height: 1.4em;\">350 mm</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-family: inherit; vertical-align: baseline;\"><th style=\"padding: 6px 0px; text-align: left; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; font-weight: 400; width: 228px; color: rgb(68, 168, 242); font-size: 12px; line-height: 1.4em;\">Max Ascent Speed</th><td style=\"padding: 6px 0px 6px 10px; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; width: 342px; font-size: 12px; line-height: 1.4em;\">5 m/s</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-family: inherit; vertical-align: baseline;\"><th style=\"padding: 6px 0px; text-align: left; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; font-weight: 400; width: 228px; color: rgb(68, 168, 242); font-size: 12px; line-height: 1.4em;\">Max Descent Speed</th><td style=\"padding: 6px 0px 6px 10px; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; width: 342px; font-size: 12px; line-height: 1.4em;\">3 m/s</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-family: inherit; vertical-align: baseline;\"><th style=\"padding: 6px 0px; text-align: left; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; font-weight: 400; width: 228px; color: rgb(68, 168, 242); font-size: 12px; line-height: 1.4em;\">Max Speed</th><td style=\"padding: 6px 0px 6px 10px; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; width: 342px; font-size: 12px; line-height: 1.4em;\">16 m/s (ATTI mode)</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-family: inherit; vertical-align: baseline;\"><th style=\"padding: 6px 0px; text-align: left; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; font-weight: 400; width: 228px; color: rgb(68, 168, 242); font-size: 12px; line-height: 1.4em;\">Max Pitch Angle</th><td style=\"padding: 6px 0px 6px 10px; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; width: 342px; font-size: 12px; line-height: 1.4em;\">35°</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-family: inherit; vertical-align: baseline;\"><th style=\"padding: 6px 0px; text-align: left; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; font-weight: 400; width: 228px; color: rgb(68, 168, 242); font-size: 12px; line-height: 1.4em;\">Max Angular Speed</th><td style=\"padding: 6px 0px 6px 10px; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; width: 342px; font-size: 12px; line-height: 1.4em;\">150°/s</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-family: inherit; vertical-align: baseline;\"><th style=\"padding: 6px 0px; text-align: left; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; font-weight: 400; width: 228px; color: rgb(68, 168, 242); font-size: 12px; line-height: 1.4em;\">Max Service Ceiling Above Sea Level</th><td style=\"padding: 6px 0px 6px 10px; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; width: 342px; font-size: 12px; line-height: 1.4em;\">19685 feet (6000 m)</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-family: inherit; vertical-align: baseline;\"><th style=\"padding: 6px 0px; text-align: left; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; font-weight: 400; width: 228px; color: rgb(68, 168, 242); font-size: 12px; line-height: 1.4em;\">Max Flight Time</th><td style=\"padding: 6px 0px 6px 10px; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; width: 342px; font-size: 12px; line-height: 1.4em;\">Approx. 25 minutes</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-family: inherit; vertical-align: baseline;\"><th style=\"padding: 6px 0px; text-align: left; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; font-weight: 400; width: 228px; color: rgb(68, 168, 242); font-size: 12px; line-height: 1.4em;\">Operating Temperature Range</th><td style=\"padding: 6px 0px 6px 10px; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; width: 342px; font-size: 12px; line-height: 1.4em;\">32° to 104°F (0° to 40°C)</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-family: inherit; vertical-align: baseline;\"><th style=\"padding: 6px 0px; text-align: left; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; font-weight: 400; width: 228px; color: rgb(68, 168, 242); font-size: 12px; line-height: 1.4em;\">Satellite Positioning Systems</th><td style=\"padding: 6px 0px 6px 10px; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; width: 342px; font-size: 12px; line-height: 1.4em;\">GPS</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-family: inherit; vertical-align: baseline;\"><th style=\"padding: 6px 0px; text-align: left; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; font-weight: 400; width: 228px; color: rgb(68, 168, 242); font-size: 12px; line-height: 1.4em;\">Hover Accuracy Range</th><td style=\"padding: 6px 0px 6px 10px; margin: 0px; border: 0px; outline: 0px; font-style: inherit; font-family: inherit; vertical-align: top; width: 342px; font-size: 12px; line-height: 1.4em;\">Vertical:<br>±0.5 m<br>Horizontal:<br>±1.5 m</td></tr></tbody></table>', 'dji-phantom-3.jpg', '[]', NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, 1, NULL, '2023-12-10 11:41:10'),
(5, 4, 4, 2, 8, 'Sony Camera', 'sony-camera', '12341', '2', 'camera,sony,gadget', 'white,gray', NULL, NULL, '5000', '6000', '5500', 'limited', 1, 4, '<p>This is a great camera</p>', 'sony-camera.png', '[\"1784917588265653.jpg\",\"1784917588295927.jpg\"]', 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL),
(6, 4, 4, 6, 1, 'Apple Mouse', 'apple-mouse', '12345', '30', 'mouse,apple', 'white,gray,black', NULL, NULL, '400', '500', '450', NULL, 1, 2, '<p>Its a great mouse</p>', 'apple-mouse.jpg', '[\"1784917900322356.jpg\",\"1784917900341887.jpg\"]', 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL),
(7, 4, 4, 7, 5, 'Mi headphones', 'mi-headphones', '12344', '3', 'headphones', 'white,gray,black', NULL, NULL, '2000', '2500', '2300', 'limited', 1, 1, '<p>Those headphones are great&nbsp; and popular</p>', 'mi-headphones.png', '[\"1784918192127265.png\",\"1784918192151679.png\",\"1784918192194648.png\"]', 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL),
(8, 4, 4, 8, 5, 'Mi speaker', 'mi-speaker', '12343', '21', 'speaker,mi', 'black,white', NULL, NULL, '3000', '12000', '5500', 'limited', 1, 2, '<p>those are geat spakers</p>', 'mi-speaker.jpg', '[\"1784918433835626.png\",\"1784918433873712.png\"]', 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL),
(9, 4, 2, 9, 5, 'Mi y345', 'mi-y345', '12222', '11', 'moble,feature phone', 'white,black', NULL, NULL, '2000', '2500', '2300', 'limited', 1, 2, '<p>Those are great phone</p>', 'mi-y345.jpg', '[\"1784918647348898.jpg\"]', 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL),
(10, 4, 2, 12, 1, 'I phone 12', 'i-phone-12', '34567', '5', 'I phone 12,apple,mobile', 'white,black,blue', '6.5,7.5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/X1b3C2081-Q?si=h3JUDXWN0LxfxtgK\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '400000', '500000', '450000', 'limited', 1, 4, '<table cellspacing=\"0\" style=\"margin: 0px; padding: 1px 0px; border-width: 5px 0px 0px; border-top-style: solid; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-top-color: rgb(238, 238, 238); border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arimo, Arial, sans-serif; vertical-align: baseline; width: 727px; background-color: rgb(250, 250, 250); border-spacing: 0px; color: rgb(0, 0, 0);\"><tbody style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><tr style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><th rowspan=\"4\" scope=\"row\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px medium 0px 0px; border-top-style: initial; border-right-style: none; border-bottom-style: initial; border-left-style: initial; border-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; line-height: normal; font-family: Google-Oswald, Arial; vertical-align: top; text-align: left; text-transform: uppercase; width: 86px; color: rgb(213, 0, 0);\">PLATFORM</th><td class=\"ttl\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 700; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; color: rgb(125, 116, 100); width: 110px;\"><a href=\"https://www.gsmarena.com/glossary.php3?term=os\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\">OS</a></td><td class=\"nfo\" data-spec=\"os\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; position: relative;\">iOS 14.1, upgradable to iOS 17.1.1</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><td class=\"ttl\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 700; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; color: rgb(125, 116, 100); width: 110px;\"><a href=\"https://www.gsmarena.com/glossary.php3?term=chipset\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\">Chipset</a></td><td class=\"nfo\" data-spec=\"chipset\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; position: relative;\">Apple A14 Bionic (5 nm)</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><td class=\"ttl\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 700; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; color: rgb(125, 116, 100); width: 110px;\"><a href=\"https://www.gsmarena.com/glossary.php3?term=cpu\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\">CPU</a></td><td class=\"nfo\" data-spec=\"cpu\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; position: relative;\">Hexa-core (2x3.1 GHz Firestorm + 4x1.8 GHz Icestorm)</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><td class=\"ttl\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px medium; border-top-style: initial; border-right-style: initial; border-bottom-style: none; border-left-style: initial; border-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 700; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; color: rgb(125, 116, 100); width: 110px;\"><a href=\"https://www.gsmarena.com/glossary.php3?term=gpu\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\">GPU</a></td><td class=\"nfo\" data-spec=\"gpu\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px medium; border-top-style: initial; border-right-style: initial; border-bottom-style: none; border-left-style: initial; border-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; position: relative;\">Apple GPU (4-core graphics)</td></tr></tbody></table><table cellspacing=\"0\" style=\"margin: 0px; padding: 1px 0px; border-width: 5px 0px 0px; border-top-style: solid; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-top-color: rgb(238, 238, 238); border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arimo, Arial, sans-serif; vertical-align: baseline; width: 727px; background-color: rgb(250, 250, 250); border-spacing: 0px; color: rgb(0, 0, 0);\"><tbody style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><tr style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><th rowspan=\"5\" scope=\"row\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px medium 0px 0px; border-top-style: initial; border-right-style: none; border-bottom-style: initial; border-left-style: initial; border-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; line-height: normal; font-family: Google-Oswald, Arial; vertical-align: top; text-align: left; text-transform: uppercase; width: 86px; color: rgb(213, 0, 0);\">MEMORY</th><td class=\"ttl\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 700; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; color: rgb(125, 116, 100); width: 110px;\"><a href=\"https://www.gsmarena.com/glossary.php3?term=memory-card-slot\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\">Card slot</a></td><td class=\"nfo\" data-spec=\"memoryslot\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; position: relative;\">No</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><td class=\"ttl\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 700; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; color: rgb(125, 116, 100); width: 110px;\"><a href=\"https://www.gsmarena.com/glossary.php3?term=dynamic-memory\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\">Internal</a></td><td class=\"nfo\" data-spec=\"internalmemory\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; position: relative;\">64GB 4GB RAM, 128GB 4GB RAM, 256GB 4GB RAM</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><td class=\"ttl\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px medium; border-top-style: initial; border-right-style: initial; border-bottom-style: none; border-left-style: initial; border-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 700; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; color: rgb(125, 116, 100); width: 110px;\">&nbsp;</td><td class=\"nfo\" data-spec=\"memoryother\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px medium; border-top-style: initial; border-right-style: initial; border-bottom-style: none; border-left-style: initial; border-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; position: relative;\">NVMe</td></tr></tbody></table>', 'i-phone-12.png', '[\"1784919482335454.png\",\"1784919482362798.png\",\"1784919482395024.png\"]', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 1, NULL, NULL),
(11, 4, 2, 10, 6, 'Oneplus 8T', 'oneplus-8t', '123456', '2', 'one plus,android,mobile', 'white,blue', '5.5,6.5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/X1b3C2081-Q?si=h3JUDXWN0LxfxtgK\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '400000', '500000', '450000', 'limited', 1, 2, '<table cellspacing=\"0\" style=\"margin: 0px; padding: 1px 0px; border-width: 5px 0px 0px; border-top-style: solid; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-top-color: rgb(238, 238, 238); border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arimo, Arial, sans-serif; vertical-align: baseline; width: 727px; background-color: rgb(250, 250, 250); border-spacing: 0px; color: rgb(0, 0, 0);\"><tbody style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><tr style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><th rowspan=\"4\" scope=\"row\" class=\"small-line-height\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px medium 0px 0px; border-top-style: initial; border-right-style: none; border-bottom-style: initial; border-left-style: initial; border-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; line-height: 18px; font-family: Google-Oswald, Arial; vertical-align: top; text-align: left; text-transform: uppercase; width: 86px; color: rgb(213, 0, 0);\">MAIN CAMERA</th><td class=\"ttl\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 700; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; color: rgb(125, 116, 100); width: 110px;\"><a href=\"https://www.gsmarena.com/glossary.php3?term=camera\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\">Dual</a></td><td class=\"nfo\" data-spec=\"cam1modules\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; position: relative;\">12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS<br style=\"content: &quot;&quot;; display: block; width: calc(100% + 20px); position: relative; left: -10px; border-top: 1px solid rgb(240, 240, 240); margin: 2px 0px; line-height: 23px;\">12 MP, f/2.4, 13mm, 120˚ (ultrawide), 1/3.6\"</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><td class=\"ttl\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 700; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; color: rgb(125, 116, 100); width: 110px;\"><a href=\"https://www.gsmarena.com/glossary.php3?term=camera\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\">Features</a></td><td class=\"nfo\" data-spec=\"cam1features\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; position: relative;\">Dual-LED dual-tone flash, HDR (photo/panorama)</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><td class=\"ttl\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px medium; border-top-style: initial; border-right-style: initial; border-bottom-style: none; border-left-style: initial; border-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 700; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; color: rgb(125, 116, 100); width: 110px;\"><a href=\"https://www.gsmarena.com/glossary.php3?term=camera\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\">Video</a></td><td class=\"nfo\" data-spec=\"cam1video\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px medium; border-top-style: initial; border-right-style: initial; border-bottom-style: none; border-left-style: initial; border-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; position: relative;\">4K@24/30/60fps, 1080p@30/60/120/240fps, HDR, Dolby Vision HDR (up to 30fps), stereo sound rec.</td></tr></tbody></table><table cellspacing=\"0\" style=\"margin: 0px; padding: 1px 0px; border-width: 5px 0px 0px; border-top-style: solid; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-top-color: rgb(238, 238, 238); border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arimo, Arial, sans-serif; vertical-align: baseline; width: 727px; background-color: rgb(250, 250, 250); border-spacing: 0px; color: rgb(0, 0, 0);\"><tbody style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><tr style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><th rowspan=\"4\" scope=\"row\" class=\"small-line-height\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px medium 0px 0px; border-top-style: initial; border-right-style: none; border-bottom-style: initial; border-left-style: initial; border-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; line-height: 18px; font-family: Google-Oswald, Arial; vertical-align: top; text-align: left; text-transform: uppercase; width: 86px; color: rgb(213, 0, 0);\">SELFIE CAMERA</th><td class=\"ttl\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 700; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; color: rgb(125, 116, 100); width: 110px;\"><a href=\"https://www.gsmarena.com/glossary.php3?term=secondary-camera\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\">Single</a></td><td class=\"nfo\" data-spec=\"cam2modules\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; position: relative;\">12 MP, f/2.2, 23mm (wide), 1/3.6\"<br style=\"content: &quot;&quot;; display: block; width: calc(100% + 20px); position: relative; left: -10px; border-top: 1px solid rgb(240, 240, 240); margin: 2px 0px; line-height: 23px;\">SL 3D, (depth/biometrics sensor)</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><td class=\"ttl\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 700; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; color: rgb(125, 116, 100); width: 110px;\"><a href=\"https://www.gsmarena.com/glossary.php3?term=secondary-camera\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\">Features</a></td><td class=\"nfo\" data-spec=\"cam2features\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; position: relative;\">HDR</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><td class=\"ttl\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px medium; border-top-style: initial; border-right-style: initial; border-bottom-style: none; border-left-style: initial; border-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 700; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; color: rgb(125, 116, 100); width: 110px;\"><a href=\"https://www.gsmarena.com/glossary.php3?term=secondary-camera\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\">Video</a></td><td class=\"nfo\" data-spec=\"cam2video\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px medium; border-top-style: initial; border-right-style: initial; border-bottom-style: none; border-left-style: initial; border-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; position: relative;\">4K@24/30/60fps, 1080p@30/60/120fps, gyro-EIS</td></tr></tbody></table><table cellspacing=\"0\" style=\"margin: 0px; padding: 1px 0px; border-width: 5px 0px 0px; border-top-style: solid; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-top-color: rgb(238, 238, 238); border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arimo, Arial, sans-serif; vertical-align: baseline; width: 727px; background-color: rgb(250, 250, 250); border-spacing: 0px; color: rgb(0, 0, 0);\"><tbody style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><tr style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><th rowspan=\"3\" scope=\"row\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px medium 0px 0px; border-top-style: initial; border-right-style: none; border-bottom-style: initial; border-left-style: initial; border-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; line-height: normal; font-family: Google-Oswald, Arial; vertical-align: top; text-align: left; text-transform: uppercase; width: 86px; color: rgb(213, 0, 0);\">SOUND</th><td class=\"ttl\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 700; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; color: rgb(125, 116, 100); width: 110px;\"><a href=\"https://www.gsmarena.com/glossary.php3?term=loudspeaker\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\">Loudspeaker</a></td><td class=\"nfo\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(240, 240, 240); border-left-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; position: relative;\">Yes, with stereo speakers</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><td class=\"ttl\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px medium; border-top-style: initial; border-right-style: initial; border-bottom-style: none; border-left-style: initial; border-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 700; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; color: rgb(125, 116, 100); width: 110px;\"><a href=\"https://www.gsmarena.com/glossary.php3?term=audio-jack\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\">3.5mm jack</a></td><td class=\"nfo\" style=\"margin: 0px; padding: 2px 10px; border-width: 0px 0px medium; border-top-style: initial; border-right-style: initial; border-bottom-style: none; border-left-style: initial; border-color: initial; border-image: initial; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: 16px; font-family: Arimo, Arial; vertical-align: top; position: relative;\">No</td></tr></tbody></table>', 'oneplus-8t.png', '[\"1784919777437458.png\",\"1784919777481404.png\",\"1784919777508748.png\"]', 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL),
(12, 4, 3, 13, 1, 'Macbook Air M1', 'macbook-air-m1', '12345678', '8', 'laptop,apple,Macbook', 'white,black', '13\',15\'', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/WBfnpjeEvPA?si=ZQJ4vq2bghHarut5\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '400000', '500000', '450000', 'limited', 1, 1, '<h3 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif; font-weight: bold; line-height: 18px; color: rgb(0, 0, 0); font-size: 1em; padding: 0px;\">Display&nbsp;</h3><ul style=\"margin: 8px 0px 8px 2em; padding: 0px; list-style: outside square; color: rgb(51, 51, 51); font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\">Retina display</li><li style=\"margin: 0px; padding: 0px;\">13.3-inch (diagonal) LED-backlit display with IPS technology; 2560-by-1600 native resolution at 227 pixels per inch with support for millions of colors</li><li style=\"margin: 0px; padding: 0px;\">Supported scaled resolutions:&nbsp;<ul style=\"margin: 8px 0px 8px 2em; padding: 0px; list-style-position: outside; list-style-image: initial;\"><li style=\"margin: 0px; padding: 0px;\">1680 by 1050</li><li style=\"margin: 0px; padding: 0px;\">1440 by 900</li><li style=\"margin: 0px; padding: 0px;\">1024 by 640</li></ul></li><li style=\"margin: 0px; padding: 0px;\">400 nits brightness</li><li style=\"margin: 0px; padding: 0px;\">Wide color (P3)</li><li style=\"margin: 0px; padding: 0px;\">True Tone technology</li></ul><h3 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif; font-weight: bold; line-height: 18px; color: rgb(0, 0, 0); font-size: 1em; padding: 0px;\">Chip&nbsp;&nbsp;</h3><ul style=\"margin: 8px 0px 8px 2em; padding: 0px; list-style: outside square; color: rgb(51, 51, 51); font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\"><b style=\"font-weight: bold;\">Apple M1 chip</b><br>8-core CPU with 4 perform­ance cores and 4 efficiency cores<br>7-core GPU, 8-core GPU<br>16-core Neural Engine</li></ul><h3 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif; font-weight: bold; line-height: 18px; color: rgb(0, 0, 0); font-size: 1em; padding: 0px;\">Battery and Power<span style=\"padding-left: 1px; vertical-align: baseline; position: relative; bottom: 0.33em; color: rgb(118, 121, 124); font-size: 10px !important; font-weight: normal !important;\">1</span>&nbsp;</h3><ul style=\"margin: 8px 0px 8px 2em; padding: 0px; list-style: outside square; color: rgb(51, 51, 51); font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\">Up to 15 hours wireless web</li><li style=\"margin: 0px; padding: 0px;\">Up to 18 hours Apple TV app movie playback</li><li style=\"margin: 0px; padding: 0px;\">Built-in 49.9‑watt‑hour lithium‑polymer battery</li><li style=\"margin: 0px; padding: 0px;\">30W USB-C Power Adapte</li></ul>', 'macbook-air-m1.png', '[\"1784920536557654.jpg\",\"1784920536604529.jpg\",\"1784920536627967.jpg\"]', NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-12-11 02:34:18'),
(13, 4, 3, 13, 7, 'Samsung I pad', 'samsung-i-pad', '1234555', '2', 'samsung,laptop', 'white,black', '13\',15\'', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/WBfnpjeEvPA?si=ZQJ4vq2bghHarut5\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '400000', '500000', '450000', 'limited', 1, 1, '<h3 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 1em; font-weight: bold; line-height: 18px; color: rgb(0, 0, 0); font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif;\">Display&nbsp;</h3><ul style=\"margin: 8px 0px 8px 2em; padding: 0px; list-style: outside square; color: rgb(51, 51, 51); font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\">Retina display</li><li style=\"margin: 0px; padding: 0px;\">13.3-inch (diagonal) LED-backlit display with IPS technology; 2560-by-1600 native resolution at 227 pixels per inch with support for millions of colors</li><li style=\"margin: 0px; padding: 0px;\">Supported scaled resolutions:&nbsp;<ul style=\"margin: 8px 0px 8px 2em; padding: 0px; list-style-position: outside; list-style-image: initial;\"><li style=\"margin: 0px; padding: 0px;\">1680 by 1050</li><li style=\"margin: 0px; padding: 0px;\">1440 by 900</li><li style=\"margin: 0px; padding: 0px;\">1024 by 640</li></ul></li><li style=\"margin: 0px; padding: 0px;\">400 nits brightness</li><li style=\"margin: 0px; padding: 0px;\">Wide color (P3)</li><li style=\"margin: 0px; padding: 0px;\">True Tone technology</li></ul><h3 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 1em; font-weight: bold; line-height: 18px; color: rgb(0, 0, 0); font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif;\">Chip&nbsp;&nbsp;</h3><ul style=\"margin: 8px 0px 8px 2em; padding: 0px; list-style: outside square; color: rgb(51, 51, 51); font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\"><b style=\"font-weight: bold;\">Apple M1 chip</b><br>8-core CPU with 4 perform­ance cores and 4 efficiency cores<br>7-core GPU, 8-core GPU<br>16-core Neural Engine</li></ul><h3 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 1em; font-weight: bold; line-height: 18px; color: rgb(0, 0, 0); font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif;\">Battery and Power<span style=\"padding-left: 1px; vertical-align: baseline; position: relative; bottom: 0.33em; color: rgb(118, 121, 124); font-size: 10px !important; font-weight: normal !important;\">1</span>&nbsp;</h3><ul style=\"margin: 8px 0px 8px 2em; padding: 0px; list-style: outside square; color: rgb(51, 51, 51); font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\">Up to 15 hours wireless web</li><li style=\"margin: 0px; padding: 0px;\">Up to 18 hours Apple TV app movie playback</li><li style=\"margin: 0px; padding: 0px;\">Built-in 49.9‑watt‑hour lithium‑polymer battery</li><li style=\"margin: 0px; padding: 0px;\">30W USB-C Power Adapte</li></ul>', 'samsung-i-pad.jpg', '[\"1784920783772567.jpg\",\"1784920783799911.jpg\"]', 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-12-10 12:55:11');
INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `childcategory_id`, `brand_id`, `name`, `slug`, `code`, `unit`, `tags`, `color`, `size`, `video`, `purchase_price`, `selling_price`, `discount_price`, `stock_quantity`, `warehouse`, `pickup_point_id`, `description`, `thumbnail`, `images`, `featured`, `product_views`, `product_slider`, `trendy`, `today_deal`, `status`, `flash_deal_id`, `cash_on_delivery`, `admin_id`, `created_at`, `updated_at`) VALUES
(14, 4, 4, 14, 6, 'One Plus T3 Player', 'one-plus-t3-player', '3234222', '5', 'media', 'blac,white', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/WBfnpjeEvPA?si=ZQJ4vq2bghHarut5\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2000', '2500', '2300', NULL, 1, 1, '<h3 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 1em; font-weight: bold; line-height: 18px; color: rgb(0, 0, 0); font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif;\">Display&nbsp;</h3><ul style=\"margin: 8px 0px 8px 2em; padding: 0px; list-style: outside square; color: rgb(51, 51, 51); font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\">Retina display</li><li style=\"margin: 0px; padding: 0px;\">13.3-inch (diagonal) LED-backlit display with IPS technology; 2560-by-1600 native resolution at 227 pixels per inch with support for millions of colors</li><li style=\"margin: 0px; padding: 0px;\">Supported scaled resolutions:&nbsp;<ul style=\"margin: 8px 0px 8px 2em; padding: 0px; list-style-position: outside; list-style-image: initial;\"><li style=\"margin: 0px; padding: 0px;\">1680 by 1050</li><li style=\"margin: 0px; padding: 0px;\">1440 by 900</li><li style=\"margin: 0px; padding: 0px;\">1024 by 640</li></ul></li><li style=\"margin: 0px; padding: 0px;\">400 nits brightness</li><li style=\"margin: 0px; padding: 0px;\">Wide color (P3)</li><li style=\"margin: 0px; padding: 0px;\">True Tone technology</li></ul><h3 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 1em; font-weight: bold; line-height: 18px; color: rgb(0, 0, 0); font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif;\">Chip&nbsp;&nbsp;</h3><ul style=\"margin: 8px 0px 8px 2em; padding: 0px; list-style: outside square; color: rgb(51, 51, 51); font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\"><b style=\"font-weight: bold;\">Apple M1 chip</b><br>8-core CPU with 4 perform­ance cores and 4 efficiency cores<br>7-core GPU, 8-core GPU<br>16-core Neural Engine</li></ul><h3 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 1em; font-weight: bold; line-height: 18px; color: rgb(0, 0, 0); font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif;\">Battery and Power<span style=\"padding-left: 1px; vertical-align: baseline; position: relative; bottom: 0.33em; color: rgb(118, 121, 124); font-size: 10px !important; font-weight: normal !important;\">1</span>&nbsp;</h3><ul style=\"margin: 8px 0px 8px 2em; padding: 0px; list-style: outside square; color: rgb(51, 51, 51); font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 14px;\"><li style=\"margin: 0px; padding: 0px;\">Up to 15 hours wireless web</li><li style=\"margin: 0px; padding: 0px;\">Up to 18 hours Apple TV app movie playback</li><li style=\"margin: 0px; padding: 0px;\">Built-in 49.9‑watt‑hour lithium‑polymer battery</li><li style=\"margin: 0px; padding: 0px;\">30W USB-C Power Adapte</li></ul>', 'one-plus-t3-player.jpg', '[\"1784920997061229.png\",\"1784920997098339.jpg\"]', 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_year` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `review`, `rating`, `review_date`, `review_month`, `review_year`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 'Wow its a wonderful laptop. I just love it', 5, '11-12-2023', 'December', 2023, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_varification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alexa_varification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_addsense` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_tag`, `meta_description`, `meta_keyword`, `google_varification`, `google_analytics`, `alexa_varification`, `google_addsense`, `created_at`, `updated_at`) VALUES
(1, 'yeah', 'Moon', 'tag', 'this is meta description', 'google yeahoo', 'yes', 'No', 'go', 'like', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instragram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `currency`, `phone_one`, `phone_two`, `main_email`, `support_email`, `logo`, `favicon`, `address`, `facebook`, `twitter`, `linkedin`, `instragram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, '$', '01763467836', '01763467855', 'example1@gmail.com', 'example2@gmail.com', 'file/photo/64d2385c7233d.jpg', 'file/photo/64d2385c889d2.jpg', 'Enter Meta Description', 'almoontasir', 'almoontasir_moon', 'almoontasir', 'almoontasir', 'kanadi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smtp`
--

CREATE TABLE `smtp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mailer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcatagories`
--

CREATE TABLE `subcatagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Catagory_id` bigint(20) UNSIGNED NOT NULL,
  `Subcatagory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Subcatagory_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcatagories`
--

INSERT INTO `subcatagories` (`id`, `Catagory_id`, `Subcatagory_name`, `Subcatagory_slug`, `created_at`, `updated_at`) VALUES
(2, 4, 'Mobile', 'mobile', NULL, NULL),
(3, 4, 'Computer', 'computer', NULL, NULL),
(4, 4, 'Gadget', 'gadget', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Almoontasir', 'moonkanadi@gmail.com', NULL, '$2y$10$hQjcLmzjvth1yAltso58ROZoATQJ1Wi7d2iILsLs9F4A9OdxMLLzu', '019xxxxx', 1, NULL, '2023-05-11 23:48:28', '2023-06-12 08:14:06'),
(3, 'New', 'm@gmail.com', NULL, '$2y$10$RRvz/QDoXnHzbGA8okisAu6fyQFOYWHO5QnlOeAYBlVS8Sn5pJvgG', NULL, NULL, NULL, '2023-12-05 23:27:40', '2023-12-05 23:27:40'),
(4, 'customer', 'customer@gamil.com', NULL, '$2y$10$9FLPYyp5ivRwnrvnsGzTQeC4DBCqj6uVnzIVMpOfFkFdz.vplqnT.', NULL, NULL, NULL, '2023-12-30 07:25:43', '2023-12-30 07:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ware_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ware_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ware_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `ware_name`, `ware_address`, `ware_phone`, `created_at`, `updated_at`) VALUES
(1, 'Dhanmondi Warehouse', '234,sankar,Dhanmondi', '01518431773', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wbreviews`
--

CREATE TABLE `wbreviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `review_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 14, '11 , December 2023', NULL, NULL),
(2, 1, 9, '11 , December 2023', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_product`
--
ALTER TABLE `campaign_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaign_product_campaign_id_foreign` (`campaign_id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childcatagories`
--
ALTER TABLE `childcatagories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `childcatagories_catagory_id_foreign` (`Catagory_id`),
  ADD KEY `childcatagories_subcatagory_id_foreign` (`Subcatagory_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pickup_points`
--
ALTER TABLE `pickup_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp`
--
ALTER TABLE `smtp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcatagories`
--
ALTER TABLE `subcatagories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcatagories_catagory_id_foreign` (`Catagory_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wbreviews`
--
ALTER TABLE `wbreviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wbreviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campaign_product`
--
ALTER TABLE `campaign_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `childcatagories`
--
ALTER TABLE `childcatagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pickup_points`
--
ALTER TABLE `pickup_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smtp`
--
ALTER TABLE `smtp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcatagories`
--
ALTER TABLE `subcatagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wbreviews`
--
ALTER TABLE `wbreviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaign_product`
--
ALTER TABLE `campaign_product`
  ADD CONSTRAINT `campaign_product_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `childcatagories`
--
ALTER TABLE `childcatagories`
  ADD CONSTRAINT `childcatagories_catagory_id_foreign` FOREIGN KEY (`Catagory_id`) REFERENCES `catagories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `childcatagories_subcatagory_id_foreign` FOREIGN KEY (`Subcatagory_id`) REFERENCES `subcatagories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `catagories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcatagories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcatagories`
--
ALTER TABLE `subcatagories`
  ADD CONSTRAINT `subcatagories_catagory_id_foreign` FOREIGN KEY (`Catagory_id`) REFERENCES `catagories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wbreviews`
--
ALTER TABLE `wbreviews`
  ADD CONSTRAINT `wbreviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
