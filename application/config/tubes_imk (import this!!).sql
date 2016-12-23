-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2016 at 03:08 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_imk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Ronaldo Simanjuntak', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'PRIA'),
(2, 'WANITA');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `kontak_pembeli` varchar(15) DEFAULT NULL,
  `email_pembeli` varchar(50) NOT NULL,
  `jk_pembeli` varchar(10) DEFAULT NULL,
  `alamat_pembeli` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `username`, `password`, `kontak_pembeli`, `email_pembeli`, `jk_pembeli`, `alamat_pembeli`) VALUES
(2, 'Ronaldo Simanjuntak', 'aldomilan', 'e26220dc32cc94f60f89cf9734e54def', '08567934299', 'simanjuntakronaldo9@gmail.com', 'Laki-laki', 'Jl Gegerkalong Tengah No 23 RT 03/03 \r\nSukasari, Bandung\r\n40153');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `detail_produk` longtext NOT NULL,
  `stock_produk` int(11) NOT NULL,
  `kondisi_produk` int(11) NOT NULL,
  `brand_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `kategori_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `detail_produk`, `stock_produk`, `kondisi_produk`, `brand_produk`, `harga_produk`, `kategori_produk`, `foto_produk`) VALUES
(11, 'Dress', 'Detail Dress', 10, 1, 'DR', 800000, 6, 'product3.jpg'),
(9, 'Kacamata XYZ12', 'Kacamata biasa aja sih sebenernya mah.', 10, 1, 'XYZ', 540000, 5, 'product2.jpg'),
(10, 'Tas', 'Detail', 120, 1, 'TAS', 1020000, 8, 'product4.jpg'),
(12, 'Kaos', 'Detail Kaos', 50, 1, 'SEVEN7', 75000, 1, 'product6.jpg'),
(13, 'TAS2', 'Detail Tas2', 10, 1, 'TAS2', 120000, 8, 'product5.jpg'),
(14, 'Kaos', 'lorem ipsum dolor sit amet alsdkh adlyalag adadasd.', 10, 1, 'SEVEN7', 200000, 1, 'product12.jpg'),
(16, 'Kemeja', 'Detail Kemeja', 10, 1, 'kemejaku', 250000, 1, 'c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pesan` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE `subkategori` (
  `id_sub` int(11) NOT NULL,
  `nama_sub` varchar(30) NOT NULL,
  `kategori` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`id_sub`, `nama_sub`, `kategori`) VALUES
(1, 'Pakaian', 1),
(2, 'Sepatu', 1),
(3, 'Tas', 1),
(4, 'Jam Tangan', 1),
(5, 'Aksesoris', 1),
(6, 'Pakaian', 2),
(7, 'Sepatu', 2),
(8, 'Tas', 2),
(9, 'Jam Tangan', 2),
(10, 'Baju Muslim', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID` int(11) NOT NULL,
  `no_transaksi` varchar(15) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID`, `no_transaksi`, `id_pembeli`, `id_produk`, `qty`, `harga`, `status`) VALUES
(1, 'OS2012398773', 2, 11, 1, 800000, 1),
(2, 'OS2012151937', 2, 12, 1, 75000, 2),
(3, 'OS2012995605', 2, 12, 12, 900000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `whishlist`
--

CREATE TABLE `whishlist` (
  `whishlist_id` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `whishlist`
--

INSERT INTO `whishlist` (`whishlist_id`, `id_pembeli`, `id_produk`) VALUES
(2, 2, 14),
(3, 2, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `kategori_produk` (`kategori_produk`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `whishlist`
--
ALTER TABLE `whishlist`
  ADD PRIMARY KEY (`whishlist_id`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `whishlist`
--
ALTER TABLE `whishlist`
  MODIFY `whishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
