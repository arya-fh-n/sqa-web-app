-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 11:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webprog2_flextronics`
--

-- --------------------------------------------------------

--
-- Table structure for table `_categories`
--

CREATE TABLE `_categories` (
  `id` int(3) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_categories`
--

INSERT INTO `_categories` (`id`, `nama_kategori`) VALUES
(1, 'Aksesoris'),
(2, 'Audio'),
(3, 'TV'),
(4, 'Telepon'),
(5, 'Printer'),
(6, 'Media Player'),
(7, 'Elektronik Dapur'),
(8, 'Elektronik Kantor'),
(9, 'Elektronik Rumah Tangga'),
(10, 'Lampu'),
(11, 'Pendingin Ruangan'),
(12, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `_prices`
--

CREATE TABLE `_prices` (
  `product_id` varchar(8) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_prices`
--

INSERT INTO `_prices` (`product_id`, `price`) VALUES
('AK000001', 1125000),
('AK000002', 1125000),
('AK000003', 1399000),
('AU000001', 99000),
('AU000002', 2085000),
('TV000001', 5199000),
('TV000002', 6550000),
('PR000001', 1695000),
('ED000001', 649000),
('EK000001', 220000),
('ER000001', 990000),
('LA000001', 175000),
('PE000001', 3525000),
('PE000002', 1599000),
('PE000003', 199000),
('AU000004', 299000),
('TV000004', 599000);

-- --------------------------------------------------------

--
-- Table structure for table `_products`
--

CREATE TABLE `_products` (
  `idx` int(11) NOT NULL,
  `id` varchar(8) NOT NULL,
  `kategori` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `nama` varchar(255) NOT NULL,
  `manufaktur` varchar(200) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_products`
--

INSERT INTO `_products` (`idx`, `id`, `kategori`, `tgl_input`, `nama`, `manufaktur`, `warna`, `deskripsi`) VALUES
(1, 'AK000001', 1, '2021-11-07 00:00:00', 'GOOGLE NEST HUB SMART SPEAKER', 'Google', 'Abu-abu', 'Smart speaker dari Google yang dilengkapi dengan layar yang mempermudah penggunaan.'),
(2, 'AK000002', 1, '2021-11-07 00:00:00', 'GOOGLE NEST HUB SMART SPEAKER', 'Google', 'Hitam', 'Smart speaker dari Google yang dilengkapi dengan layar yang mempermudah penggunaan.'),
(3, 'AK000003', 1, '2021-11-07 00:00:00', 'Rexus HD200 HDMI 4K Game Video Capture Card Stream Record HD 200', 'Rexus', 'Hitam', 'Video capture card dengan resolusi 4k yang menggunakan USB 3.0.'),
(4, 'AU000001', 2, '2021-11-07 00:00:00', 'JBL C150SI Earphone', 'JBL', 'Hitam', 'Earphone JBL yang ringan dan nyaman digunakan dengan kualitas suara yang tinggi.'),
(5, 'AU000002', 2, '2021-11-07 00:00:00', 'Apple AirPods 2 (2nd Gen)', 'Apple', 'Putih', 'Headphone nirkabel dari Apple yang mudah digunakan dan inovatif.'),
(23, 'AU000004', 2, '2021-11-19 00:00:00', 'Xiaomi Earplug', 'Xiaomi', 'Bronze', 'Earphone xiaomi yang enak di kuping'),
(9, 'ED000001', 7, '2021-11-06 00:00:00', 'PHILIPS Rice Cooker digital HD4515/33', 'PHILIPS', 'Putih', 'Mesin pemasak nasi dari Philips yang mampu memasak nasi dengan merata dan kapasitas yang ekstra besar.'),
(10, 'EK000001', 8, '2021-11-05 00:00:00', 'Deli Paper Shredder Manual A4 4 Liter 9935', 'Deli', 'Putih', 'Penghancur kertas, kartu, atau kaset yang bermata pisau tajam dan mudah digunakan. Cocok untuk kebutuhan elektronik kantor.'),
(11, 'ER000001', 9, '2021-11-05 00:00:00', 'KRISBOW MAXIMUS Vacuum Cleaner Wet & Dry 8 liter', 'Krisbow', 'Orange', 'Mesin pembersih untuk daerah kering dan basah yang ergonomis dan tahan lama.'),
(12, 'LA000001', 10, '2021-11-04 00:00:00', 'Philips Smart Wifi LED Downlight 9W', 'Philips', 'Putih', 'Bohlam smart WiFi LED yang mudah untuk diredupkan dan diatur dengan perintah suara, tanpa perlu perangkat tambahan atau sakelar.'),
(13, 'PE000001', 11, '2021-11-03 00:00:00', 'Air Conditioner SHARP 1 PK AH-A9SAY', 'Sharp', 'Putih', 'Air conditioner yang mampu mendinginkan ruangan yang panas dengan cepat dan seketika.'),
(14, 'PE000002', 11, '2021-11-03 00:00:00', 'Xiaomi Mi Air Purifier 3C', 'Xiaomi', 'Putih', 'Air purifier yang mampu menyaring udara dengan filtrasi HEPA dan mengecek kualitas udara secara real-time, dan dapat dikendalkan dengan aplikasi Mi Home.'),
(22, 'PE000003', 11, '2021-11-19 00:00:00', 'Xiaomi Mi Air Purifier', 'Xiaomi', 'Hitam', 'Barang bagus'),
(8, 'PR000001', 5, '2021-11-06 00:00:00', 'Epson Printer L120', 'Epson', 'Hitam', 'Printer Epson yang mampu mencetak dokumen secara efisien dengan hasil berkualitas tinggi dan cepat.'),
(6, 'TV000001', 3, '2021-11-07 00:00:00', 'TCL Android Smart UHD 4K TV 50 Inch 50A8', 'TCL', 'Hitam', 'Smart TV dari TCL yang dilengkapi dengan Android 9.0, plus Netflix dan Youtube. Termasuk Smart Remote.'),
(7, 'TV000002', 3, '2021-11-07 00:00:00', 'XIAOMI MI SMART TV 4 55\" ANDROID TV', 'Xiaomi', 'Hitam', 'Smart TV yang tipis dari Xiaomi yang dilengkapi voice control dan kualitas gambar 4k HDR.'),
(24, 'TV000004', 3, '2021-11-19 00:00:00', 'TV LG 60', 'LG', 'Hitam', 'TV bagus');

-- --------------------------------------------------------

--
-- Table structure for table `_stock`
--

CREATE TABLE `_stock` (
  `product_id` varchar(8) NOT NULL,
  `amount` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_stock`
--

INSERT INTO `_stock` (`product_id`, `amount`) VALUES
('AK000001', 20),
('AK000002', 25),
('AK000003', 30),
('AU000001', 50),
('AU000002', 30),
('TV000001', 30),
('TV000002', 20),
('PR000001', 30),
('ED000001', 20),
('EK000001', 20),
('ER000001', 40),
('LA000001', 50),
('PE000001', 30),
('PE000002', 20),
('PE000003', 30),
('AU000004', 30),
('TV000004', 35);

-- --------------------------------------------------------

--
-- Table structure for table `_users`
--

CREATE TABLE `_users` (
  `idx` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_users`
--

INSERT INTO `_users` (`idx`, `name`, `email`, `username`, `password`) VALUES
(1, 'John', 'john@mail.com', 'john.doe', '$2y$10$sHChNu.RjaytxjPQzOcW6eCNpQzJl0tdT.HiLqWVYxwyh99k2dY6K'),
(2, 'Pain Akatsuki', 'painmail@gmail.com', 'pain.akatsuki', '$2y$10$wxOKhyvSx4bCz3HX7VFyZe/pL4XLb.snvKnmKSdeWlU048m0a.i.O'),
(3, 'Jane', 'jane@mail.com', 'jane.doe', '$2y$10$9B.3U7cE3SJGYdFZjD.eSeW8ygMg48W.10ahceHATMI8hs24leV1u'),
(4, 'Handsome Bee', 'bee.ganteng@mail.co.id', 'lebah.ganteng', '$2y$10$T7cnlbN.Rq5UNsPg9If4kO9XtfgGCnTqdFypG.QNWsjJ23GE3NqYy'),
(5, 'Arya', 'aryafikry@mail.com', 'arya.fikry', '$2y$10$JY81.W/IMC7u4jOF8HoKC.0VtFZbMrIlhUWrUEjLkRLvJRGZtB026'),
(6, 'New User', 'user@mail.com', 'user1', '$2y$10$em9mAA.48JPFakT/yHZj.eES6I.dmxPfOrKnWPgkJwiVhd3fmvNtC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `_categories`
--
ALTER TABLE `_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_prices`
--
ALTER TABLE `_prices`
  ADD KEY `fk_product_id_2` (`product_id`);

--
-- Indexes for table `_products`
--
ALTER TABLE `_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_idx_unique` (`idx`),
  ADD KEY `fk_category_id` (`kategori`);

--
-- Indexes for table `_stock`
--
ALTER TABLE `_stock`
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `_users`
--
ALTER TABLE `_users`
  ADD PRIMARY KEY (`idx`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `_products`
--
ALTER TABLE `_products`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `_users`
--
ALTER TABLE `_users`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `_prices`
--
ALTER TABLE `_prices`
  ADD CONSTRAINT `fk_product_id_2` FOREIGN KEY (`product_id`) REFERENCES `_products` (`id`);

--
-- Constraints for table `_products`
--
ALTER TABLE `_products`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`kategori`) REFERENCES `_categories` (`id`);

--
-- Constraints for table `_stock`
--
ALTER TABLE `_stock`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
