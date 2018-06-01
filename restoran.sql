-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2018 at 04:39 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_menu`
--

CREATE TABLE `daftar_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_menu`
--

INSERT INTO `daftar_menu` (`id`, `nama_menu`, `harga`, `kategori`) VALUES
(1, 'Ayam Geprek Babe', 15000, 'makanan'),
(2, 'Ayam Bakar Babe', 15000, 'makanan'),
(3, 'Ayam Goreng Babe', 15000, 'makanan'),
(4, 'Nila Bakar Babe', 12000, 'makanan'),
(5, 'Nila Goreng Babe', 12000, 'makanan'),
(6, 'Nasi Goreng Babe', 12000, 'makanan'),
(7, 'Gurameh Spesial Babe', 25000, 'makanan'),
(8, 'Lotek Spesial Babe', 13000, 'makanan'),
(9, 'Es Teh', 2000, 'minuman'),
(10, 'Es Jeruk', 3000, 'minuman'),
(11, 'Coffemix', 3000, 'minuman'),
(12, 'Lemon Squash', 7000, 'minuman'),
(13, 'Red Velved', 10000, 'minuman');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomor_meja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama_pelanggan`, `no_meja`, `id_menu`, `jumlah`, `tanggal`) VALUES
(1, 'Alvinditya Saputra', 45, 1, 5, '2018-04-25'),
(2, 'Alvinditya Saputra', 45, 2, 5, '2018-04-25'),
(3, 'Alvinditya Saputra', 45, 3, 5, '2018-04-25'),
(4, 'Alvinditya Saputra', 45, 9, 5, '2018-04-25'),
(5, 'Alvinditya Saputra', 45, 10, 5, '2018-04-25'),
(6, 'Rahmat Muhajir', 23, 3, 3, '2018-04-25'),
(7, 'Rahmat Muhajir', 23, 4, 1, '2018-04-25'),
(8, 'Rahmat Muhajir', 23, 5, 5, '2018-04-25'),
(9, 'Rahmat Muhajir', 23, 7, 1, '2018-04-25'),
(10, 'Rahmat Muhajir', 23, 9, 3, '2018-04-25'),
(11, 'Rahmat Muhajir', 23, 10, 7, '2018-04-25'),
(12, 'Kommited Fiddien', 24, 1, 4, '2018-04-26'),
(13, 'Kommited Fiddien', 24, 2, 1, '2018-04-26'),
(14, 'Kommited Fiddien', 24, 3, 2, '2018-04-26'),
(15, 'Kommited Fiddien', 24, 9, 5, '2018-04-26'),
(16, 'Gading', 2, 1, 1, '2018-05-05'),
(17, 'Gading', 2, 3, 1, '2018-05-05'),
(18, 'Gading', 2, 11, 1, '2018-05-05'),
(19, 'Gading', 2, 12, 1, '2018-05-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
