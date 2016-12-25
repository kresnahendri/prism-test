-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 25, 2016 at 10:54 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.14-2+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prism-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Handphone & Tablet', 'Berbagai jenis handphone dan tablet', '2016-12-20 10:26:51'),
(2, 'Komputer & Laptop', 'Berbagai jenis komputer dan laptop', '2016-12-20 10:26:51'),
(3, 'Fashion Pria', 'Berbagai jenis fashion pria', '2016-12-20 10:26:51'),
(4, 'Fashion Wanita', 'Berbagai jenis fashion wanita', '2016-12-20 10:26:51'),
(5, 'Home & Living', 'Berbagai jenis home and living', '2016-12-20 10:26:51'),
(6, 'Otomotif', 'Berbagai jenis otomotif', '2016-12-24 05:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` int(7) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `address`, `city`, `province`, `country`, `zip`, `users_id`) VALUES
(1, 'John Lennon', 'lennon@gmail.com', '085966531591', 'Jl. D1 no.30, Kebon Baru, Gudang Peluru, Tebet', 'Jakarta Selatan', 'DKI Jakarta', 'Indonesia', 45612, 0),
(2, 'Jim Morrison', 'morrison@gmail.com', '085723580807', 'Jl. PGA no.1, Dayeuh Kolot', 'Bandung', 'Jawa Barat', 'Indonesia', 45623, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'purchase', 'purchase group'),
(4, 'sale', 'sale group');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `sku` varchar(40) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `retail_price` bigint(20) NOT NULL,
  `wholesale_price` bigint(20) NOT NULL,
  `buy_price` bigint(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `sku`, `name`, `brand`, `description`, `retail_price`, `wholesale_price`, `buy_price`, `stock`, `active`, `img`, `created_at`, `category_id`, `supplier_id`) VALUES
(1, '626179273-9', 'Apple iPhone 6 Plus Space Grey Smartphone [128GB/Garansi Resmi]', 'Apple', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 15000000, 13000000, 11000000, 10, 1, '', '2016-12-24 08:35:05', 1, 1),
(2, '021678128-0', 'Google Pixel Smartphone - Quite Black [32 GB/4 GB]', 'Google', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', 15000000, 14000000, 12000000, 15, 1, '', '2016-12-24 08:35:05', 1, 2),
(3, '062858916-6', 'Samsung S7 Edge Olympic Edition Rio 2016 Smartphone', 'Samsung', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', 10000000, 9000000, 7000000, 10, 1, '', '2016-12-24 08:35:05', 1, 2),
(4, '596958434-7', 'Apple New Macbook Pro MNQG2 2016 Notebook - Silver [Touchbar + Touch ID/13inch/ Core i5 2.9 GHz/ 8GB/ Intel Iris 550/ 512GB]', 'Apple', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.', 31000000, 25000000, 20000000, 15, 1, '', '2016-12-24 08:35:05', 2, 1),
(5, '127407117-8', 'Apple iMac MK462 Dekstop PC [27 Inch Retina 5K/Quad Core i5 3.2 Ghz/8 GB/1 TB/AMD Radeon M380 2 GB]', 'Apple', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\r\n\r\nCras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\r\n\r\nProin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', 29000000, 27000000, 20000000, 35, 1, '', '2016-12-24 08:35:06', 2, 1),
(6, '520970668-0', 'Microsoft Surface Pro 4 Notebook - Silver [2in1/12"/Core i7/16GB/256 GB]', 'Microsoft', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 25000000, 23000000, 20000000, 7, 1, '', '2016-12-24 08:35:06', 2, 2),
(7, '245982050-X', 'Levis NY Runner 77127-3806 Sepatu Pria - Light Grey', 'Levis', 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\r\n\r\nDuis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\r\n\r\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', 900000, 700000, 600000, 10, 1, '', '2016-12-24 08:35:06', 3, 1),
(8, '467148471-4', 'Carvil Man Bigbike 02 T-Shirt - Black', 'Carvil', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 90000, 80000, 70000, 10, 1, '', '2016-12-24 08:35:06', 3, 2),
(9, '486492942-4', 'Kalibre Evoline 02 910142-006 Black Yellow Tas Ransel', 'Kalibre', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\r\n\r\nMaecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\r\n\r\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 550000, 500000, 400000, 10, 1, '', '2016-12-24 08:35:06', 3, 2),
(10, '791810135-9', 'Barli Asmara Osaka BAIED Dress001 Dress - Nude off White', 'Barli Asmara', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\r\n\r\nAliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', 1200000, 1000000, 800000, 10, 1, '', '2016-12-24 08:35:06', 4, 1),
(11, '296245065-2', 'Vavavoom Satin Sleepwear With Robe - Violet', 'Vavavoom', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 320000, 300000, 250000, 10, 0, '', '2016-12-24 08:35:06', 4, 2),
(12, '028797792-7', 'Prada Sacca 2 Manici Hand Bag - Blue', 'Prada', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.\r\n\r\nNullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\r\n\r\nIn quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 10700000, 10000000, 9000000, 10, 1, '', '2016-12-24 08:35:06', 4, 2),
(13, '612717615-8', 'Ayoyoo Summer Flower Moon Fuschia Stool', 'Theayoyoo', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\r\n\r\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\r\n\r\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 285000, 250000, 150000, 10, 1, '', '2016-12-24 08:35:06', 5, 1),
(14, '648479991-1', 'Sentra Furniture Box Sofa L', 'Sentra Furniture', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 6500000, 6000000, 5000000, 15, 1, '', '2016-12-24 08:35:06', 5, 2),
(15, '274548528-8', 'Melody Rustic Bookcase Rak Buku', 'Melody', 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', 1200000, 1100000, 900000, 15, 1, '', '2016-12-24 08:35:06', 5, 1),
(16, '283889315-7', 'Vespa Beverly Sport Touring 350 White Sepeda Motor [Jakarta]', 'Vespa', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\r\n\r\nMaecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\r\n\r\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 180000000, 170000000, 150000000, 10, 1, '', '2016-12-24 08:35:06', 6, 1),
(17, '931121296-2', 'KYT-ELSICO #3 Helm Half Face - Black Doff Gun Metal', 'KYT', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 400000, 380000, 300000, 10, 1, '', '2016-12-24 08:35:06', 6, 2),
(18, '503464253-0', 'Kawasaki Z250 Sepeda Motor - Green', 'Kawasaki', 'In congue. Etiam justo. Etiam pretium iaculis justo.', 54000000, 50000000, 45000000, 9, 1, '', '2016-12-24 08:35:06', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `order_no` varchar(20) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `shipped` tinyint(1) NOT NULL DEFAULT '0',
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  `recived` tinyint(1) NOT NULL DEFAULT '0',
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `accepted_date` datetime DEFAULT NULL,
  `shipped_date` datetime DEFAULT NULL,
  `paid_date` datetime DEFAULT NULL,
  `recived_date` datetime DEFAULT NULL,
  `notes` text,
  `payment_method` int(11) DEFAULT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `order_no`, `accepted`, `shipped`, `paid`, `recived`, `order_date`, `accepted_date`, `shipped_date`, `paid_date`, `recived_date`, `notes`, `payment_method`, `supplier_id`) VALUES
(1, 'PO-000001', 1, 1, 1, 1, '2016-12-24 17:42:18', '2016-12-24 00:00:00', '2016-12-24 00:00:00', '2016-12-24 00:00:00', '2016-12-24 00:00:00', 'buy from Steve Jobs', NULL, 1),
(2, 'PO-000002', 1, 1, 1, 1, '2016-12-24 18:14:11', '2016-12-30 00:00:00', '2016-12-30 00:00:00', '2016-12-30 00:00:00', '2016-12-30 00:00:00', '', NULL, 2),
(5, 'PO-000003', 1, 1, 1, 1, '2016-12-25 22:51:56', '2017-01-01 00:00:00', '2017-01-01 00:00:00', '2017-01-01 00:00:00', '2017-01-01 00:00:00', NULL, NULL, 1),
(6, 'PO-000006', 1, 1, 1, 1, '2016-12-25 22:52:43', '2016-12-29 00:00:00', '2016-12-29 00:00:00', '2016-12-29 00:00:00', '2016-12-29 00:00:00', NULL, NULL, 2),
(7, 'PO-000007', 1, 1, 0, 0, '2016-12-25 22:53:35', '2016-12-25 00:00:00', '2016-12-26 00:00:00', NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`id`, `product_qty`, `product_price`, `product_id`, `purchase_id`) VALUES
(1, 10, 11000000, 1, 1),
(2, 10, 20000000, 4, 1),
(3, 10, 20000000, 5, 1),
(4, 5, 12000000, 2, 2),
(7, 5, 900000, 15, 5),
(8, 10, 5000000, 14, 6),
(9, 1, 250000, 11, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `order_no` varchar(20) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `shipped` tinyint(1) NOT NULL DEFAULT '0',
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  `recived` tinyint(1) NOT NULL DEFAULT '0',
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `accepted_date` datetime DEFAULT NULL,
  `shipped_date` datetime DEFAULT NULL,
  `paid_date` datetime DEFAULT NULL,
  `recived_date` datetime DEFAULT NULL,
  `notes` text,
  `payment_method` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `order_no`, `accepted`, `shipped`, `paid`, `recived`, `order_date`, `accepted_date`, `shipped_date`, `paid_date`, `recived_date`, `notes`, `payment_method`, `customer_id`) VALUES
(1, 'SO-000001', 1, 1, 1, 1, '2016-12-24 17:28:28', '2016-12-24 00:00:00', '2016-12-24 00:00:00', '2016-12-28 00:00:00', '2016-12-24 00:00:00', NULL, NULL, 1),
(2, 'SO-000002', 1, 1, 1, 1, '2016-12-24 17:31:35', '2016-12-24 00:00:00', '2016-12-26 00:00:00', '2016-12-24 00:00:00', '2016-12-30 00:00:00', 'Kirim cepat ya pak!', NULL, 1),
(3, 'SO-000003', 1, 1, 1, 1, '2016-12-24 17:39:49', '2016-12-30 00:00:00', '2016-12-30 00:00:00', '2016-12-24 00:00:00', '2016-12-30 00:00:00', 'Jangan dibanting!!', NULL, 2),
(4, 'SO-000004', 1, 1, 1, 0, '2016-12-24 21:45:16', '2016-12-31 00:00:00', '2016-12-31 00:00:00', '2016-12-30 00:00:00', NULL, 'no comment', NULL, 2),
(7, 'SO-000005', 1, 1, 1, 1, '2016-12-25 20:33:27', '2016-12-25 00:00:00', '2016-12-25 00:00:00', '2016-12-31 00:00:00', '2016-12-31 00:00:00', '', NULL, 1),
(8, 'SO-000008', 1, 1, 1, 1, '2016-12-25 21:12:04', '2016-12-25 00:00:00', '2016-12-27 00:00:00', '2017-01-01 00:00:00', '2017-01-04 00:00:00', '', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sale_detail`
--

CREATE TABLE `sale_detail` (
  `id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_detail`
--

INSERT INTO `sale_detail` (`id`, `product_qty`, `product_price`, `product_id`, `sale_id`) VALUES
(1, 5, 15000000, 1, 1),
(2, 5, 31000000, 4, 1),
(3, 5, 29000000, 5, 1),
(4, 1, 54000000, 18, 2),
(5, 3, 25000000, 6, 3),
(6, 1, 180000000, 16, 4),
(7, 1, 6500000, 14, 4),
(10, 5, 15000000, 1, 7),
(11, 5, 6500000, 14, 8);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `email`, `description`, `created_at`) VALUES
(1, 'Supplier 1', 'supplier1@email.com', 'Lorem ipsum dolor sit amet', '2016-12-21 01:39:26'),
(2, 'Supplier 2', 'supplier2@email.com', 'Lorem ipsum dolor sit amet', '2016-12-21 01:39:26'),
(4, 'Supplier 3', 'supplier3@email.com', 'Lorem ipsum dolor sit amet', '2016-12-21 07:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1482680775, 1, 'Super', 'Admin', 'ADMIN', '0'),
(2, '127.0.0.1', 'purchase', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'purchase@email.com', '', NULL, NULL, NULL, 1268889823, 1482675321, 1, 'Purchase', 'Employee', 'PRISM', '0'),
(3, '127.0.0.1', 'sales', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'sales@email.com', '', NULL, NULL, NULL, 1268889823, 1482664697, 1, 'Sales', 'Employee', 'PRISM', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_no` (`order_no`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `purchase_id` (`purchase_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_no` (`order_no`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `sale_id` (`sale_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sale_detail`
--
ALTER TABLE `sale_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_supplier1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `fk_purchase_supplier1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD CONSTRAINT `fk_purchase_detail_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_purchase_detail_purchase1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `fk_sale_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD CONSTRAINT `fk_sale_detail_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sale_detail_sale1` FOREIGN KEY (`sale_id`) REFERENCES `sale` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
