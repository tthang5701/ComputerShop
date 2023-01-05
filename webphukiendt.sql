-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 05:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webphukiendt`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`) VALUES
(1, 'SONY', 1),
(2, 'ACER', 1),
(3, 'SAMSUNG', 1),
(4, 'CANON', 1),
(5, 'IPHONE', 1),
(21, 'VIVO', 1),
(22, 'VSMART', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `created_date`) VALUES
(40, 0, '2022-11-07'),
(41, 11, '2022-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 1,
  `quantity` int(11) NOT NULL,
  `price` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `total_price` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'Laptop', 1),
(2, 'Camera', 1),
(3, 'Desktop', 1),
(4, 'Accessories', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `code`, `image`, `content`, `status`) VALUES
(9, 'Chrysalis: Saturn’s Ancient, Missing Moon', '1153', 'news0031664504831.jpg', 'However, a new modeling study by astronomers at MIT and elsewhere has found that, while the two planets may have once been in sync, Saturn has since escaped Neptune’s pull. What was responsible for this planetary realignment? The research team has one meticulously tested hypothesis: a missing moon. Their study was published in the journal Science on September 15.\r\n\r\nIn the study, the team proposes that Saturn, which today hosts 83 moons, once harbored at least one more, an extra satellite that they named Chrysalis. Together with its siblings, the astronomers suggest, Chrysalis orbited Saturn for several billion years, pulling and tugging on the planet in a way that kept its tilt, or “obliquity,” in resonance with Neptune.', 1),
(10, 'Cassini Data Reveals Likely Subsurface Ocean on Titan', '1154', 'news0011664504785.jpg', 'HOMESPACE NEWS\r\nCassini Data Reveals Likely Subsurface Ocean on Titan\r\nTOPICS:AstronomyCassini-Huygens MissionJPLNASASaturnTitan\r\n\r\nBy JIA-RUI COOK, JET PROPULSION LABORATORY JUNE 29, 2012\r\n\r\nInside Titan Saturn Moon\r\nThis artist’s concept shows a possible scenario for the internal structure of Titan, as suggested by data from NASA’s Cassini spacecraft. Scientists have been trying to determine what is under Titan’s organic-rich atmosphere and icy crust. Data from the radio science experiment make the strongest case yet for a global subsurface ocean, sitting above a subsurface layer of high-pressure ice and a water-infused silicate core. Credit: Angelo Tavani\r\n\r\nBy using data from NASA’s Cassini spacecraft to measure variations in the gravitational pull of Titan, researchers were able to determine Titan’s internal structure, finding that Titan likely harbors a layer of liquid water under its ice shell.\r\n\r\nData from NASA’s Cassini spacecraft have revealed Saturn’s moon Titan likely harbors a layer of liquid water under its ice shell.\r\n\r\nResearchers saw a large amount of squeezing and stretching as the moon orbited Saturn. They deduced that if Titan were composed entirely of stiff rock, the gravitational attraction of Saturn would cause bulges, or solid “tides,” on the moon only 3 feet (1 meter) in height. Spacecraft data show Saturn creates solid tides approximately 30 feet (10 meters) in height, which suggests Titan is not made entirely of solid rocky material. The finding appears in today’s edition of the journal Science.\r\n\r\n“Cassini’s detection of large tides on Titan leads to the almost inescapable conclusion that there is a hidden ocean at depth,” said Luciano Iess, the paper’s lead author and a Cassini team member at the Sapienza University of Rome, Italy. “The search for water is an important goal in solar system exploration, and now we’ve spotted another place where it is abundant.”\r\n\r\nTitan takes only 16 days to orbit Saturn, and scientists were able to study the moon’s shape at different parts of its orbit. Because Titan is not spherical, but slightly elongated like a football, its long axis grew when it was closer to Saturn. Eight days later, when Titan was farther from Saturn, it became less elongated and more nearly round. Cassini measured the gravitational effect of that squeeze and pull.\r\n\r\n', 1),
(15, '1', '1', 'surprise1.jpeg', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `status` int(10) NOT NULL,
  `total` bigint(20) DEFAULT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `status`, `total`, `created_date`) VALUES
(64, 0, 8, 2, 38110000, '2022-11-07'),
(66, 0, 2, 2, 11000000, '2022-11-20'),
(67, 8, 8, 2, 41800000, '2022-11-20'),
(68, 8, 8, 0, 41800000, '2022-11-20'),
(69, 11, 8, 2, 50600000, '2022-11-28'),
(70, 11, 2, 1, 33000, '2022-11-28'),
(71, 11, 8, 5, 418000, '2022-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(144, 64, 88, 1, 38000000),
(145, 64, 79, 1, 30000),
(146, 64, 81, 1, 80000),
(149, 66, 86, 1, 10000000),
(150, 67, 88, 1, 38000000),
(151, 64, 88, 1, 38000000),
(152, 69, 88, 1, 38000000),
(153, 69, 85, 1, 8000000),
(154, 70, 79, 1, 30000),
(155, 71, 74, 2, 190000);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `description`) VALUES
(2, 'Trả qua thẻ ngân hàng', '<p>Phương thức thanh to&aacute;n online</p>'),
(8, 'Trả tiền mặt', '<p><strong>Phương thức thanh to&aacute;n trực tiếp</strong></p>');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text DEFAULT NULL,
  `view_count` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `image`, `price`, `quantity`, `category_id`, `brand_id`, `status`, `content`, `description`, `view_count`) VALUES
(37, 'Tai nghe Acer', 'M01', 'tai-nghe-chup-tai-ovann-x4-den-do-8195-7878852-ca1aa00b14c481b2d777db4310d211401665153813.jpg', 150000, 98, 4, 2, 1, '', '', 1),
(38, 'Macbook Pro', 'M50', 'download (1)1665153594.jpg', 2500000, 100, 1, 5, 1, '', '', 1),
(39, 'iphone 7', 'M50', 'iphone-7-plus-red-128gb-400x4601665153864.png', 15000000, 100, 3, 5, 1, '', '', 0),
(44, 'Oppo F3 plus', 'f3plus', 'iphone-7-plus-256gb-300x3001665153922.jpg', 7500000, 100, 3, 3, 1, '', '', 0),
(45, 'Desktop Mac', 'ip5', 'featured-section-new-to-imac_2x1665153699.jpg', 12000000, 100, 3, 5, 1, '', '', 1),
(65, 'Bộ sạc Iphone', 'h7', '21665153459.jpg', 22000, 100, 4, 5, 1, '', '', 2),
(66, 'Máy ảnh Canon chính hãng', 'y7', 'canon-eos-1d-x-2-1-min1665153411.jpg', 8000000, 96, 2, 4, 1, '', '', 5),
(67, 'Bộ sạc Combo iPhone 5/6/6+ (Pisen)', 'j8', '31665153514.jpg', 250000, 100, 4, 5, 1, '', '', 1),
(68, 'Ốp lưng Galaxy S8 Plus Standing 2017 chính hãng', 'b6', 'timthumb (1)1665153326.jpg', 60000, 100, 4, 5, 1, '', '', 0),
(69, 'Bao da Clear View Galaxy S8 Plus Standing 2017 chÃ­nh hÃ£ng ', 'b6', 'timthumb (2).jpg', 70000, 100, 4, 6, 1, '', '', 0),
(70, 'Bao da Clear View Galaxy S8 Plus Standing 2017 chÃ­nh hÃ£ng ', 'b6', 'timthumb.jpg', 80000, 100, 4, 6, 1, '', '', 0),
(71, 'Gậy tự sướng mini Samsung', 'k8', 'gay tu suong mini 2_200x2001665153217.jpg', 50000, 100, 4, 21, 1, '', '', 0),
(72, 'Gậy tự sướng Samsung', 'k8', 'gay ts gap gon dau 5_200x2001665153176.jpg', 50000, 100, 4, 3, 1, '', '', 2),
(73, 'Gậy tự sướng mini Sony', 'k8', '3112575548_1184480815_200x2001665153131.jpg', 20000, 100, 4, 1, 1, '', '', 1),
(74, 'Pin điện thoại LG Trắng', 'p7', 'image-6282355-202a86ba4c35ce1b5941fab448818358-product1665153062.jpg', 190000, 88, 4, 2, 1, '', '', 2),
(79, 'Sạc dự phòng xiami trắng ', 'j8', 'd8e-pin-sac-xiaomi-10000mah-gen-2-gia-re1665152948.jpg', 30000, 97, 4, 2, 1, '', '', 8),
(80, 'Sạc dự phòng Acer 15.000MAH', 'j8', '797-sac-du-phong-genai-trang-10000mah-gia-re1665152869.jpg', 25000, 100, 4, 2, 1, '', '', 1),
(81, 'Sạc dự phòng 10.000MAH', 'j8', '0a7-sac-du-phong-romoss-polymoss-10000mah-gia-re1665152811.jpg', 80000, 99, 4, 1, 1, '', '', 2),
(85, 'Canon EOS-1D X', 'canon', '3-4a620da2-d3d1-46b3-82b7-6522066a48ed1665152728.jpg', 8000000, 99, 2, 1, 1, '', '', 2),
(86, 'Canon EOS 6D', 'canon 6d', '2-a89056cf-a3ca-4d58-952e-5dcfaaae8d8b1665152687.jpg', 10000000, 98, 2, 1, 1, '', '', 2),
(88, 'Macbook pro 2017', 'mp67', 'featured-section-new-to-imac_2x1665156961.jpg', 38000000, 94, 1, 1, 1, '', '', 24),
(93, 'SONY CAM V1', 'SONY_SP1', '2-a89056cf-a3ca-4d58-952e-5dcfaaae8d8b1665156911.jpg', 10000000, 7, 4, 4, 1, 'Máy ảnh đời mới Canon', 'Máy ảnh chính hãng Canon nhỏ gọn, dễ sử dụng, đem lại hiệu quả chụp ảnh chất lượng cao, máy có khả năng chống nước...', 59);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'Admin', '<p><strong>The person who has every permission with the website&nbsp;</strong></p>'),
(2, 'User', '<p>The person who has an account on this website</p>');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `image` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `image`, `status`) VALUES
(1, 'Slider 1', '11664378882.jpg', 1),
(2, 'Slider 2', '21664379008.jpg', 1),
(3, 'Slider 3', '31664379017.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone_number`, `username`, `role_id`, `status`) VALUES
(0, 'Trần Thu Hằng', 'hang@gmail.com', '123456', 'Thái Bình', '0312648789', 'hang', 2, 1),
(1, 'Admin', 'admin@gmail.com', 'admin12345', NULL, NULL, 'admin', 1, 1),
(7, 'Bùi Văn Tiến', 'tienvanbui1982001@gmail.com', 'hiTien12345', 'Hoài Đức,Hà Nội', '0365932647', 'tienvanbui', 2, 1),
(8, 'Nguyễn Văn Nam', 'tienvanbui1982001@gmail.com', '1982001000', 'Hoài Đức,Hà Nội', '0123456789', 'nampro123', 2, 1),
(11, 'Khách hàng', 'kh123@gmail.com', '123456', 'Hà Nội', '0973456789', 'user', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_carts` (`user_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fg_cart_order` (`user_id`),
  ADD KEY `fg_payment_order` (`payment_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_cart` (`product_id`),
  ADD KEY `order_product` (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fg_user_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `user_carts` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fg_payment_order` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_cart` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fg_user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
