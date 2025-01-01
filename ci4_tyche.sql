-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2025 at 09:59 PM
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
-- Database: `ci4_tyche`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `b_id` int(100) NOT NULL,
  `b_name` varchar(1000) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `b_desc` varchar(1000) NOT NULL,
  `b_status` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`b_id`, `b_name`, `img`, `b_desc`, `b_status`, `created_at`) VALUES
(1, 'HP', '1735528161_940fa8edcae2ebd29c3c.png', 'hp', 1, '2024-12-30 03:09:21'),
(2, 'Lenovo', '1735528177_fdf1c5ac15b3486e00b7.png', 'Lenovo', 1, '2024-12-30 03:09:37'),
(3, 'Apple', '1735528136_2864b50d8c8c3085f379.png', 'Apple', 1, '2024-12-30 03:08:56'),
(6, 'DELL', '1735528214_a21261d770ee324f2bfb.png', 'DELL', 1, '2024-12-30 03:10:14'),
(7, 'acer', '1735528241_7454eb77325b08857efe.png', 'acer', 1, '2024-12-30 03:10:41'),
(8, 'ASUS', '1735528271_d9d69bb777156b33f589.png', 'ASUS', 1, '2024-12-30 03:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `b_id` int(100) NOT NULL,
  `s_desc` varchar(1000) NOT NULL,
  `type` varchar(100) NOT NULL,
  `processor` varchar(255) DEFAULT NULL,
  `screen_size` varchar(50) DEFAULT NULL,
  `storage` varchar(100) DEFAULT NULL,
  `memory` varchar(500) NOT NULL,
  `warranty` varchar(100) DEFAULT NULL,
  `graphics` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(10) NOT NULL,
  `graphics_d` text NOT NULL,
  `display_d` text NOT NULL,
  `audio_d` text NOT NULL,
  `dimensions_d` text NOT NULL,
  `ports_d` text NOT NULL,
  `about` text NOT NULL,
  `meta_title` varchar(500) NOT NULL,
  `meta_desc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `name`, `b_id`, `s_desc`, `type`, `processor`, `screen_size`, `storage`, `memory`, `warranty`, `graphics`, `thumbnail`, `created_at`, `updated_at`, `status`, `graphics_d`, `display_d`, `audio_d`, `dimensions_d`, `ports_d`, `about`, `meta_title`, `meta_desc`) VALUES
(1, 'Dell Latitude 3540', 1, '(16 GB / HMDI 2 Nos / USB 2 Nos / Lan / C Port)', '1', 'Core i5-1235U', '15.6', '512 SSD', '16 GB', '1 Year', 'Integrated', '1735275492_69e5a9ca43003815f042.jpg', '2024-12-26 20:58:00', '2024-12-29 19:02:01', 1, 'AMD Radeon Pro 5300M with 4GB of GDDR6 memory and automatic graphics switching Intel UHD Graphics 630', 'Retina display 16‑inch (diagonal) LED‑backlit display with IPS technology; 3072‑by‑1920 native resolution at 226 pixels per inch with support for millions of colors', 'High‑fidelity six‑speaker system with force‑cancelling woofers, Wide stereo sound, Support for Dolby Atmos playback, Studio‑quality three-mic array with high signal-to-noise ratio and directional beamforming, 3.5 mm headphone jack.', 'Height: 0.64 inch (1.62 cm), Width: 14.09 inches (35.79 cm), Depth: 9.68 inches (24.59 cm), Weight: 4.3 pounds (2.0 kg).', 'Four Thunderbolt 3 (USB-C) ports with support for: Charging, DisplayPort, Thunderbolt (up to 40Gb/s), USB 3.1 Gen 2 (up to 10Gb/s).', '<p>&nbsp;</p>\r\n<h3 class=\"font-size-18 font-weight-semi-bold text-gray-39 mb-3\">About Dell Latitude 3540</h3>\r\n<p>The Dell Latitude 3540 is a versatile and reliable laptop designed for professionals seeking productivity and durability. It seamlessly supports multitasking and secure data management, and it is equipped with a robust Intel processor, ample storage options, and enhanced security features.</p>\r\n<p>The sleek 15.6-inch Full HD display provides vibrant visuals, while its lightweight and durable build ensures ease of mobility. With advanced connectivity options, including USB-C and Wi-Fi 6, the Latitude 3540 is ideal for modern workflows. Backed by Dell\'s reputation for quality and support, this laptop is a perfect blend of performance, reliability, and innovation for business and personal use.</p>', '', ''),
(2, 'Asus Rog', 1, '(16 GB / HMDI 2 Nos / USB 2 Nos / Lan / C Port)', '1', 'i7 9750H', '15.6\"', '1TB SSD', '16 GB', '1 Year', 'Nvidia GTX RTX 2060 6GB', '1735365115_b213c95b24cefc6de985.jpg', '2024-12-26 20:58:03', '2024-12-29 19:02:07', 1, 'AMD Radeon Pro 5300M with 4GB of GDDR6 memory and automatic graphics switching Intel UHD Graphics 630', 'Retina display 16‑inch (diagonal) LED‑backlit display with IPS technology; 3072‑by‑1920 native resolution at 226 pixels per inch with support for millions of colors', 'High‑fidelity six‑speaker system with force‑cancelling woofers, Wide stereo sound, Support for Dolby Atmos playback, Studio‑quality three-mic array with high signal-to-noise ratio and directional beamforming, 3.5 mm headphone jack.', 'Height: 0.64 inch (1.62 cm), Width: 14.09 inches (35.79 cm), Depth: 9.68 inches (24.59 cm), Weight: 4.3 pounds (2.0 kg).', 'Four Thunderbolt 3 (USB-C) ports with support for: Charging, DisplayPort, Thunderbolt (up to 40Gb/s), USB 3.1 Gen 2 (up to 10Gb/s).', '<p>&nbsp;</p>\r\n<h3 class=\"font-size-18 font-weight-semi-bold text-gray-39 mb-3\">About Asus Rog</h3>\r\n<p>The Asus ROG (Republic of Gamers) series is a powerhouse designed for serious gamers and performance enthusiasts. With cutting-edge Intel or AMD processors and high-performance graphics cards, these laptops deliver exceptional speed and power, handling the most demanding games and applications with ease.</p>\r\n<p>The ROG features a stunning high-refresh-rate display for smooth visuals and immersive gaming experiences. Built with premium materials, the sleek yet durable design ensures longevity and style. Equipped with advanced cooling systems, it stays cool during extended gaming sessions, preventing performance throttling. Additionally, ROG laptops offer customizable RGB lighting, superior audio, and a range of connectivity options, including USB-C and Wi-Fi 6, to ensure seamless multiplayer experiences. The Asus ROG is the ultimate choice for gamers and power users seeking top-tier performance, and reliability.</p>', '', ''),
(3, 'Lenovo V15', 1, '(8 GB / HMDI 2 Nos / USB 2 Nos / Lan / C Port)', '1', 'Intel i3 12th Gen', '15.6\"', '512 SSD', '8 GB', '1 Year', 'Integrated', '1735367504_044d54e8f3446067b0ab.jpg', '2024-12-27 23:31:44', '2024-12-29 19:02:10', 1, 'AMD Radeon Pro 5300M with 4GB of GDDR6 memory and automatic graphics switching Intel UHD Graphics 630', 'Retina display 16‑inch (diagonal) LED‑backlit display with IPS technology; 3072‑by‑1920 native resolution at 226 pixels per inch with support for millions of colors', 'High‑fidelity six‑speaker system with force‑cancelling woofers, Wide stereo sound, Support for Dolby Atmos playback, Studio‑quality three-mic array with high signal-to-noise ratio and directional beamforming, 3.5 mm headphone jack.', 'Height: 0.64 inch (1.62 cm), Width: 14.09 inches (35.79 cm), Depth: 9.68 inches (24.59 cm), Weight: 4.3 pounds (2.0 kg).', 'Four Thunderbolt 3 (USB-C) ports with support for: Charging, DisplayPort, Thunderbolt (up to 40Gb/s), USB 3.1 Gen 2 (up to 10Gb/s).', '<p>&nbsp;</p>\r\n<h3 class=\"font-size-18 font-weight-semi-bold text-gray-39 mb-3\">About Lenovo V15</h3>\r\n<p>The Lenovo V15 is a reliable and efficient laptop designed for small businesses and professionals seeking a balance of performance and affordability. Powered by the latest Intel or AMD processors, it handles everyday tasks such as word processing, spreadsheets, and web browsing with ease.</p>\r\n<p>Its 15.6-inch display offers clear and bright visuals, making it ideal for both work and multimedia use. The sleek design and sturdy build ensure durability, while its lightweight structure makes it easy to carry on the go. With ample storage and memory options, the Lenovo V15 offers smooth multitasking, and its enhanced security features help protect sensitive data. Offering essential connectivity options like USB-C, HDMI, and Wi-Fi 5, it is well-suited for a variety of work environments. The Lenovo V15 is an affordable, no-compromise solution for professionals looking for a dependable laptop to meet their daily computing needs.</p>', '', ''),
(6, 'HP Pro Tower 280 G9 PCI Desktop PC', 1, '(8 GB / 2 USB Type)', '2', 'Intel i3 12th Gen', '22', '512 SSD', '8 GB', '1 Year', 'Integrated', '1735418869_b3a59c255b19f2708096.jpg', '2024-12-28 13:47:49', '2024-12-29 19:02:16', 1, 'AMD Radeon Pro 5300M with 4GB of GDDR6 memory and automatic graphics switching Intel UHD Graphics 630', 'Retina display 16‑inch (diagonal) LED‑backlit display with IPS technology; 3072‑by‑1920 native resolution at 226 pixels per inch with support for millions of colors', 'High‑fidelity six‑speaker system with force‑cancelling woofers, Wide stereo sound, Support for Dolby Atmos playback, Studio‑quality three-mic array with high signal-to-noise ratio and directional beamforming, 3.5 mm headphone jack.', 'Height: 0.64 inch (1.62 cm), Width: 14.09 inches (35.79 cm), Depth: 9.68 inches (24.59 cm), Weight: 4.3 pounds (2.0 kg).', 'Four Thunderbolt 3 (USB-C) ports with support for: Charging, DisplayPort, Thunderbolt (up to 40Gb/s), USB 3.1 Gen 2 (up to 10Gb/s).', '<p>&nbsp;</p>\r\n<h3 class=\"font-size-18 font-weight-semi-bold text-gray-39 mb-3\">About HP Pro Tower 280 G9 PCI Desktop</h3>\r\n<p>The HP Pro Tower 280 G9 PCI Desktop is a versatile and high-performance desktop solution designed to meet the needs of small to medium-sized businesses. Powered by the latest Intel processors, it provides reliable performance for everyday tasks, multitasking, and even demanding applications. With ample storage options and support for PCIe expansion, this desktop allows for easy upgrades and customization, making it adaptable to your evolving business needs.</p>\r\n<p>The compact tower design offers a balance of space efficiency and expandability, while its robust build ensures durability for long-term use. Equipped with advanced security features, including HP Wolf Security, the Pro Tower 280 G9 ensures data protection and privacy. Its range of connectivity options, including USB-C, HDMI, and Ethernet, ensures seamless integration with existing workflows. Whether for office work, data management, or general computing, the HP Pro Tower 280 G9 PCI Desktop is a reliable and efficient choice for businesses looking for power, flexibility, and security.</p>', 'meta_title', '\r\nHP Pro Tower 280 G9 PCI Desktop PC'),
(7, 'Intel i5 12th Gen', 1, 'Intel i5 12th Gen', '2', 'Intel i5 12th Gen', '24', '512 SSD', '16 GB', '2 Year', '4 GB RTX 3050', '1735420375_7e14fdbf193d8b5ce7f6.jpg', '2024-12-28 14:12:55', '2024-12-29 19:02:19', 1, 'AMD Radeon Pro 5300M with 4GB of GDDR6 memory and automatic graphics switching Intel UHD Graphics 630', 'Retina display 16‑inch (diagonal) LED‑backlit display with IPS technology; 3072‑by‑1920 native resolution at 226 pixels per inch with support for millions of colors', 'High‑fidelity six‑speaker system with force‑cancelling woofers, Wide stereo sound, Support for Dolby Atmos playback, Studio‑quality three-mic array with high signal-to-noise ratio and directional beamforming, 3.5 mm headphone jack.', 'Height: 0.64 inch (1.62 cm), Width: 14.09 inches (35.79 cm), Depth: 9.68 inches (24.59 cm), Weight: 4.3 pounds (2.0 kg).', 'Four Thunderbolt 3 (USB-C) ports with support for: Charging, DisplayPort, Thunderbolt (up to 40Gb/s), USB 3.1 Gen 2 (up to 10Gb/s).', '<p>&nbsp;</p>\r\n<h3 class=\"font-size-18 font-weight-semi-bold text-gray-39 mb-3\">About Intel i5 12th Gen</h3>\r\n<p>Offers a customizable and high-performance computing solution tailored to meet diverse user needs. Equipped with 16 GB of RAM, it provides fast and efficient multitasking, allowing you to run demanding applications, process large files, and switch between tasks effortlessly. The desktop features dual HDMI ports for easy connectivity to multiple monitors, enhancing productivity or providing a superior viewing experience for multimedia tasks.</p>\r\n<p>With two USB ports, you can connect essential peripherals such as keyboards, mice, or external drives. The integrated LAN port ensures reliable wired network connectivity, making it ideal for office setups or stable internet connections. Whether used for work, gaming, or entertainment, this assembled desktop offers flexibility, speed, and connectivity, making it a great choice for users who need a high-performance, customizable computing setup.</p>', 'Intel i5 12th Gen', 'Intel i5 12th Gen');

-- --------------------------------------------------------

--
-- Table structure for table `model_gallery`
--

CREATE TABLE `model_gallery` (
  `id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model_gallery`
--

INSERT INTO `model_gallery` (`id`, `model_id`, `image`, `created_at`) VALUES
(1, 1, '1735275492_d565d2eacd96f46997de.jpg', '2024-12-26 21:58:12'),
(2, 1, '1735275492_261597f75876c2796ff7.jpg', '2024-12-26 21:58:12'),
(3, 1, '1735275492_7581c2e5a8cffd643a7e.jpg', '2024-12-26 21:58:12'),
(4, 1, '1735275492_4fbf48410131f36ad7be.jpg', '2024-12-26 21:58:12'),
(5, 1, '1735275492_5725073df5490fef589d.jpg', '2024-12-26 21:58:12'),
(6, 2, '1735365115_90f41f6bd8fc18865ef7.jpg', '2024-12-27 22:51:55'),
(7, 2, '1735365115_e7d3746a569dd77edbd0.jpg', '2024-12-27 22:51:55'),
(8, 2, '1735365115_1bc29b8ed1a485bb317c.jpg', '2024-12-27 22:51:55'),
(9, 2, '1735365115_280965ae516c01f4b3cc.jpg', '2024-12-27 22:51:55'),
(10, 2, '1735365115_8e40eb374d8736cbcbdd.jpg', '2024-12-27 22:51:55'),
(11, 3, '1735367504_ee55a9a07b908e8656aa.jpg', '2024-12-27 23:31:44'),
(12, 3, '1735367504_ced62bc7d7cb2770eed3.jpg', '2024-12-27 23:31:44'),
(13, 3, '1735367504_532e4cbf12012e6dd593.jpg', '2024-12-27 23:31:44'),
(14, 3, '1735367504_6c0993dfd2da6271feb7.jpg', '2024-12-27 23:31:44'),
(15, 3, '1735367504_ff24b2843bec4968a03c.jpg', '2024-12-27 23:31:44'),
(16, 6, '1735418869_560e45ca04e8777649c5.jpg', '2024-12-28 13:47:49'),
(17, 6, '1735418869_1218753e36f62c70b8b4.jpg', '2024-12-28 13:47:49'),
(18, 6, '1735419064_b306721f5935bf383a11.jpg', '2024-12-28 13:51:04'),
(19, 6, '1735419064_b39d87dd1653e50f7b80.jpg', '2024-12-28 13:51:04'),
(20, 6, '1735419064_3f5ee05f2725769b2a98.jpg', '2024-12-28 13:51:04'),
(27, 7, '1735420787_614251618654cff22b10.jpg', '2024-12-28 14:19:47'),
(28, 7, '1735420787_ca2f77a0dc4b45065f19.jpg', '2024-12-28 14:19:47'),
(29, 7, '1735420787_9fe7bbcea361e0ccb6e4.jpg', '2024-12-28 14:19:47'),
(30, 7, '1735421434_8477e218a4c800e2e51e.jpg', '2024-12-28 14:30:34'),
(31, 7, '1735421434_657149da478bd6b4b710.jpg', '2024-12-28 14:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(1000) NOT NULL,
  `p_desc` varchar(1000) NOT NULL,
  `p_status` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_desc`, `p_status`, `created_at`) VALUES
(1, 'Laptop', 'Laptop', 1, '2024-12-26 21:19:05'),
(2, 'Desktops', 'Desktops', 1, '2024-12-26 21:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(100) NOT NULL,
  `b_heading` varchar(1000) NOT NULL,
  `s_heading` varchar(1000) NOT NULL,
  `button_name` varchar(100) NOT NULL,
  `b_link` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `b_heading`, `s_heading`, `button_name`, `b_link`, `img`, `created_at`) VALUES
(1, 'IRA Duo Pro 5G 2Ghz Octa-Core Processor | Included Accessories', ' 1\" Tablet, Keyboard, Stylus Pen, 8GB RAM, 128GB ROM ', 'View Details', 'laptops', '1735521317_94c3d7050e250c35f88d.webp', '2024-12-30 01:15:17'),
(2, 'PHILIPS 242B1/94 24', 'Built Speaker(2W), hdmi, vga, 2W, Height Adjustment', 'View Details', 'laptops', '1735521354_a2a2b3645e1e12671b98.webp', '2024-12-30 01:15:54'),
(3, ' Apple MacBook Air M3 MXCV3HN/A 16 GB/256 GB SSD/macOS', 'Sonoma,13 Inch, Starlight, 1.24 Kg', 'View Details', 'laptops', '1735522985_b9651a15ad460084c3f0.webp', '2024-12-30 01:43:05'),
(5, ' Apple MJMW3HN/A M1 Ultra chip Mini Tower 64 GB RAM, 1 TB SSD Capacity', 'Integrated 48 core GPU Graphics, Mac OS Monterey', 'View Details', 'laptops', '1735448999_eb27be7772b62b3e1dee.webp', '2024-12-29 05:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'admin', '$2y$10$OGW4ME6Qpm0hYQRLxfGpFeUaqFsPFuzuXOcgl.Pf1t4mCeFBXSBDK', 'admin@gmail.com', '2024-12-26 21:09:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_gallery`
--
ALTER TABLE `model_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_id` (`model_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `b_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `model_gallery`
--
ALTER TABLE `model_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_gallery`
--
ALTER TABLE `model_gallery`
  ADD CONSTRAINT `model_gallery_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
