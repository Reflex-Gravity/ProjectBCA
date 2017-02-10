-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2017 at 02:30 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewagon`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(50) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Nike'),
(2, 'HP'),
(3, 'Dell'),
(4, 'Acer'),
(5, 'Sony'),
(6, 'MSI'),
(7, 'LG');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Books'),
(2, 'Clothing'),
(3, 'Laptops'),
(4, 'Toys'),
(5, 'Smartphones'),
(6, 'Footware');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_description`, `product_image`, `product_keywords`) VALUES
(1, 2, 1, 'Nike T Shirt', 999, '<p>&nbsp;</p>\r\n<p class="pdp-style-note" style="box-sizing: inherit; color: #696e79; font-size: 14px; line-height: 1.4; font-family: Whitney; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;">Train hard in this training T-shirt from Nike. This piece is engineered with Dri-FIT and Stay Cool technologies that wicks sweat off your skin and keeps a check on your body temperature while you train. Wear it with a pair of tights or training track pants and training shoes for an effective workout.</p>', 'Nike-As-Dfct-Swoosh-Topo-Fill-Black-Round-Neck-T-S.png', 'nike,tshirt'),
(2, 3, 2, 'HP 15-AY016TU', 30000, '<ul class="a-vertical a-spacing-none" style="box-sizing: border-box; color: #949494; padding: 0px; font-family: Arial, sans-serif; font-size: 13px; margin: 0px 0px 0px !important 18px;">\r\n<li style="box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box; color: #111111;">1.6 GHz, Up to 2.48 GHz Intel Celeron N3060 Processor</span></li>\r\n<li style="box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box; color: #111111;">Windows 10 Operting System</span></li>\r\n<li style="box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box; color: #111111;">4 GB DDR3L RAM, 500 GB HDD</span></li>\r\n<li style="box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box; color: #111111;">Intel HD Graphics</span></li>\r\n<li style="box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box; color: #111111;">HP TrueVision HD Webcam (front-facing) with integrated digital microphone</span></li>\r\n</ul>', '51cJzJRxWUL_SL1000_.png', 'hp,laptop'),
(3, 5, 7, 'Nexus 5X', 27000, '<p style="box-sizing: border-box; margin: 0px; padding: 0px; color: #212121; font-family: Roboto, Arial, sans-serif;">If you want to replace your old phone with something sleeker and more powerful, then the Nexus 5X is just the right phone for you. This phone hits the sweet spot between great performance and beautiful looks.</p>\r\n<p style="box-sizing: border-box; margin: 0px; padding: 0px; color: #212121; font-family: Roboto, Arial, sans-serif;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px;">Powerful processor</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px; padding: 0px; color: #212121; font-family: Roboto, Arial, sans-serif;">Boasting of a hexa-core Qualcomm Snapdragon 808 processor and 2GB RAM beneath the 13.20 cm full HD IPS display, this phone is fast enough to handle multiple apps and windows without slowing down.</p>\r\n<p style="box-sizing: border-box; margin: 0px; padding: 0px; color: #212121; font-family: Roboto, Arial, sans-serif;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px;">Excellent camera</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px; padding: 0px; color: #212121; font-family: Roboto, Arial, sans-serif;">Equipped with a powerful 12.3MP rear camera and 5MP front camera, the Nexus 5X brings out the photographer in you. The primary camera features larger 1.55&mu;m pixels that capture more light, even in low light conditions for bright and crystal clear photos. Moreover, the pre-loaded Google Photos app lets you store unlimited photos and videos for free and also allows you to access them anywhere you want.</p>\r\n<p style="box-sizing: border-box; margin: 0px; padding: 0px; color: #212121; font-family: Roboto, Arial, sans-serif;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px;">Nexus Imprint security</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px; padding: 0px; color: #212121; font-family: Roboto, Arial, sans-serif;">The fingerprint sensor placed at the back of the phone lets you easily lock or unlock your phone with just a touch of your fingers.</p>\r\n<p style="box-sizing: border-box; margin: 0px; padding: 0px; color: #212121; font-family: Roboto, Arial, sans-serif;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px;">USB Type-C</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px; padding: 0px; color: #212121; font-family: Roboto, Arial, sans-serif;">The USB Type-C charger that comes along with the phone can be used both ways, which means you don&rsquo;t have to check which way is up every time you want&nbsp;to put your phone to charge.</p>\r\n<p style="box-sizing: border-box; margin: 0px; padding: 0px; color: #212121; font-family: Roboto, Arial, sans-serif;"><strong style="box-sizing: border-box; margin: 0px; padding: 0px;">Android Marshmallow</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px; padding: 0px; color: #212121; font-family: Roboto, Arial, sans-serif;">Loaded with Android v6.0 Marshmallow, this smartphone offers you the ultimate android experience.</p>', 'lg-nexus-5x-lgh791-original-imaecgqk6yswfrju.png', 'nexus,android,smartphone,mobile'),
(4, 6, 1, 'Nike Mens Black Sport Shoes', 3400, '<ul class="a-vertical a-spacing-none" style="box-sizing: border-box; color: #949494; padding: 0px; font-family: Arial, sans-serif; font-size: 13px; margin: 0px 0px 0px !important 18px;">\r\n<li style="box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box; color: #111111; word-wrap: break-word; display: block;">Molded ankle foam enhances support and fit</span></li>\r\n<li style="box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box; color: #111111; word-wrap: break-word; display: block;">Injected foam midsole/outsole for ultralight comfort</span></li>\r\n<li style="box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box; color: #111111; word-wrap: break-word; display: block;">color:Black</span></li>\r\n<li style="box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box; color: #111111; word-wrap: break-word; display: block;">ideal for:mens</span></li>\r\n</ul>', '71JwOMjs1bL._UL1500_.png', 'nike,shoes,men');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
