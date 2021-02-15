-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 08:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sulamanemas`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `image` varchar(225) NOT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `size`, `color`, `description`) VALUES
(27, 'Saputangan Mato', 350000, 'files/sapu tangan ketek.jpeg', '1.5 Meter', 'Hitam', 'Digunakan untuk pembungkus bawaan saat acara baralek dan melayat'),
(28, 'Dalamak', 700000, 'files/dalamak.jpeg', '1.5 Meter', 'Ungu', 'Digunakan untuk penutup bawaan pada saat acara kenduri, khitanan, dan antaran bako'),
(29, 'Banta Gadang', 3000000, 'files/banta gadang.jpeg', '2 Meter', 'Merah', 'Hiasan tempat duduk Marapulai dan Anak Daro'),
(30, 'Parapui', 2000000, 'files/parapui.jpeg', '2 Meter', 'Ungu', 'Penutup bagian bawah kelambu adat'),
(31, 'Garediang', 2000000, 'files/garediang.jpeg', '2 Meter', 'Hitam', 'Penutup bagian atas kelambu adat'),
(32, 'Gobah', 2000000, 'files/gobah.jpeg', '1.5 Meter', 'Dongker', 'Hiasan dinding kiri dan kanan kelambu adat'),
(33, 'Lalansia', 2500000, 'files/lalansia.jpeg', '3 Meter', 'Ungu', 'Penutup hiasan dinding kiri, kanan kelambu adat'),
(34, 'Tabir', 4000000, 'files/tabir.jpeg', '3 Meter', 'Ungu', 'Penutup keseluruhan dinding '),
(35, 'Hondas', 300000, 'files/hondas.jpeg', '1 Meter', 'Pink', 'Hiasan bagian atas loteng rumah');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `image` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `transaction_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `product_id`, `user_id`, `status`, `image`, `description`, `transaction_date`) VALUES
(7, 27, 73, 'Pembayaran-Diterima', 'files/KTP-RANDA3.gif', 'assalamualaikum, pembayaranya saya transfer 50% dulu ya buk, setelah barang di terima saya lunasin', ''),
(8, 31, 79, 'Konfirmasi', 'files/KTP-RANDA3.gif', '', ''),
(9, 27, 71, 'Konfirmasi', 'files/KTP-RANDA3.gif', 'asasdas', ''),
(10, 28, 71, 'Konfirmasi', 'files/KTP-RANDA3.gif', 'asdasdasd', '05-02-2021');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `phone`, `address`, `level`) VALUES
(71, 'Ari Munandar', 'arimunandar@gmail.com', 'ari123', '082388350816', 'asdasdas', 'customer'),
(72, 'Latiffa Rahmi', 'latiffarahmi@gmail.com', 'mimi123', '082386136601', 'asdasdasdas', 'customer'),
(73, 'Gintan Puti Saini', 'gintanputisaini@gmail.com', 'gintan123', '082386136605', '', 'customer'),
(74, 'Yaffi Azmi', 'yaffiazmi@gmail.com', 'azmi123', '082386136602', '', 'customer'),
(75, 'Wahyu Ramadhan', 'wahyuramadhan@gmail.com', 'wahyu123', '082386136604', '', 'customer'),
(77, 'admin', 'admin@gmail.com', 'admin', '083180655115', '', 'admin'),
(79, 'Muhammad Fajar ', 'muhammadfajar@gmail.com', 'fajar123', '082386136610', '', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
