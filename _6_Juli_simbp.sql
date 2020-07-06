-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2020 at 05:40 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simbp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bibit`
--

CREATE TABLE `bibit` (
  `id_bibit` int(12) NOT NULL,
  `nama_bibit` varchar(128) NOT NULL,
  `Stok_bibit` int(4) NOT NULL,
  `harga_jual` int(5) NOT NULL,
  `harga_beli` int(5) NOT NULL,
  `date_update_bibit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bibit`
--

INSERT INTO `bibit` (`id_bibit`, `nama_bibit`, `Stok_bibit`, `harga_jual`, `harga_beli`, `date_update_bibit`) VALUES
(9, 'Rose Gold', 5250, 4000, 2000, '2020-07-01 10:17:47'),
(10, 'VVIP Man', 8000, 2500, 1000, '2020-07-01 09:28:51'),
(11, 'Aqua Di Geo', 1800, 2500, 1200, '2020-07-01 10:38:13'),
(12, 'VICTORIA SECRET LOVE', 0, 2500, 1200, '2020-07-02 14:36:36'),
(13, 'JAGUAR CLASIC', 0, 4000, 2000, '2020-07-02 14:36:46'),
(14, 'PLAYBOY SEXY', 0, 7000, 5000, '2020-07-02 14:37:03'),
(15, 'VICTORIA SECRET PINK SURF', 0, 5000, 3000, '2020-07-02 14:37:18'),
(16, 'BENETTON COOL', 0, 6000, 4000, '2020-07-02 14:37:39'),
(17, 'AZZARO TWIN MAN', 0, 2500, 1000, '2020-07-02 14:37:58'),
(18, 'COKLAT CAPPUCINO', 0, 4000, 3000, '2020-07-02 14:38:11'),
(19, 'TAYLOR SWIFT', 0, 6000, 3500, '2020-07-02 14:38:32'),
(20, 'TAYLOR SWIFT', 0, 6000, 4000, '2020-07-02 14:38:56'),
(21, 'ISSEY MIYAKE HOMME SPORT ', 0, 8000, 5000, '2020-07-02 14:39:18'),
(22, 'BEYOND PARADISE', 0, 4000, 2000, '2020-07-02 14:39:32'),
(23, 'DAVIDOFF GAME LADY', 0, 2500, 1000, '2020-07-02 14:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `bibit_outlet`
--

CREATE TABLE `bibit_outlet` (
  `id` int(11) NOT NULL,
  `id_bibit` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bibit_outlet`
--

INSERT INTO `bibit_outlet` (`id`, `id_bibit`, `id_outlet`, `stok`, `last_update`) VALUES
(16, 9, 1, 500, '2020-06-30 20:49:08'),
(17, 9, 3, 1000, '2020-06-30 20:49:08'),
(18, 9, 5, 750, '2020-06-30 20:49:08'),
(19, 9, 7, 1000, '2020-06-30 20:49:08'),
(20, 10, 1, 2000, '2020-06-30 21:57:51'),
(21, 10, 3, 2000, '2020-06-30 21:57:51'),
(22, 10, 5, 2000, '2020-06-30 21:57:51'),
(23, 10, 7, 2000, '2020-06-30 21:57:51'),
(24, 9, 8, 2000, '2020-07-01 10:17:09'),
(25, 10, 8, 0, '2020-07-01 10:17:09'),
(26, 11, 1, 1800, '2020-07-01 10:23:13'),
(27, 11, 3, 0, '2020-07-01 10:23:13'),
(28, 11, 5, 0, '2020-07-01 10:23:13'),
(29, 11, 7, 0, '2020-07-01 10:23:13'),
(30, 11, 8, 0, '2020-07-01 10:23:13'),
(31, 12, 1, 0, '2020-07-02 14:36:36'),
(32, 12, 3, 0, '2020-07-02 14:36:36'),
(33, 12, 5, 0, '2020-07-02 14:36:36'),
(34, 12, 7, 0, '2020-07-02 14:36:36'),
(35, 12, 8, 0, '2020-07-02 14:36:36'),
(36, 13, 1, 0, '2020-07-02 14:36:46'),
(37, 13, 3, 0, '2020-07-02 14:36:46'),
(38, 13, 5, 0, '2020-07-02 14:36:46'),
(39, 13, 7, 0, '2020-07-02 14:36:46'),
(40, 13, 8, 0, '2020-07-02 14:36:46'),
(41, 14, 1, 0, '2020-07-02 14:37:03'),
(42, 14, 3, 0, '2020-07-02 14:37:03'),
(43, 14, 5, 0, '2020-07-02 14:37:03'),
(44, 14, 7, 0, '2020-07-02 14:37:03'),
(45, 14, 8, 0, '2020-07-02 14:37:03'),
(46, 15, 1, 0, '2020-07-02 14:37:18'),
(47, 15, 3, 0, '2020-07-02 14:37:18'),
(48, 15, 5, 0, '2020-07-02 14:37:18'),
(49, 15, 7, 0, '2020-07-02 14:37:18'),
(50, 15, 8, 0, '2020-07-02 14:37:18'),
(51, 16, 1, 0, '2020-07-02 14:37:40'),
(52, 16, 3, 0, '2020-07-02 14:37:40'),
(53, 16, 5, 0, '2020-07-02 14:37:40'),
(54, 16, 7, 0, '2020-07-02 14:37:40'),
(55, 16, 8, 0, '2020-07-02 14:37:40'),
(56, 17, 1, 0, '2020-07-02 14:37:58'),
(57, 17, 3, 0, '2020-07-02 14:37:58'),
(58, 17, 5, 0, '2020-07-02 14:37:58'),
(59, 17, 7, 0, '2020-07-02 14:37:58'),
(60, 17, 8, 0, '2020-07-02 14:37:58'),
(61, 18, 1, 0, '2020-07-02 14:38:11'),
(62, 18, 3, 0, '2020-07-02 14:38:11'),
(63, 18, 5, 0, '2020-07-02 14:38:11'),
(64, 18, 7, 0, '2020-07-02 14:38:11'),
(65, 18, 8, 0, '2020-07-02 14:38:11'),
(66, 19, 1, 0, '2020-07-02 14:38:32'),
(67, 19, 3, 0, '2020-07-02 14:38:32'),
(68, 19, 5, 0, '2020-07-02 14:38:32'),
(69, 19, 7, 0, '2020-07-02 14:38:32'),
(70, 19, 8, 0, '2020-07-02 14:38:32'),
(71, 20, 1, 0, '2020-07-02 14:38:57'),
(72, 20, 3, 0, '2020-07-02 14:38:57'),
(73, 20, 5, 0, '2020-07-02 14:38:57'),
(74, 20, 7, 0, '2020-07-02 14:38:57'),
(75, 20, 8, 0, '2020-07-02 14:38:57'),
(76, 21, 1, 0, '2020-07-02 14:39:18'),
(77, 21, 3, 0, '2020-07-02 14:39:18'),
(78, 21, 5, 0, '2020-07-02 14:39:18'),
(79, 21, 7, 0, '2020-07-02 14:39:18'),
(80, 21, 8, 0, '2020-07-02 14:39:18'),
(81, 22, 1, 0, '2020-07-02 14:39:32'),
(82, 22, 3, 0, '2020-07-02 14:39:32'),
(83, 22, 5, 0, '2020-07-02 14:39:32'),
(84, 22, 7, 0, '2020-07-02 14:39:32'),
(85, 22, 8, 0, '2020-07-02 14:39:32'),
(86, 23, 1, 0, '2020-07-02 14:39:44'),
(87, 23, 3, 0, '2020-07-02 14:39:44'),
(88, 23, 5, 0, '2020-07-02 14:39:44'),
(89, 23, 7, 0, '2020-07-02 14:39:44'),
(90, 23, 8, 0, '2020-07-02 14:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `id_outlet` int(12) NOT NULL,
  `alamat_outlet` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`id_outlet`, `alamat_outlet`) VALUES
(1, 'Sulfat'),
(3, 'Sigura-gura'),
(5, 'Kandangan'),
(7, 'Sukun'),
(8, 'Bontang');

-- --------------------------------------------------------

--
-- Table structure for table `prediksi`
--

CREATE TABLE `prediksi` (
  `id_prediksi` int(12) NOT NULL,
  `date_created_prediksi` datetime NOT NULL,
  `nama_bibit` varchar(128) NOT NULL,
  `id_bibit` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(12) NOT NULL,
  `id_bibit` int(12) NOT NULL,
  `jumlah_pembelian` int(5) NOT NULL,
  `harga_satuan` int(5) NOT NULL,
  `total_harga` int(8) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `outlet` int(12) NOT NULL,
  `pegawai` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_bibit`, `jumlah_pembelian`, `harga_satuan`, `total_harga`, `tanggal_transaksi`, `outlet`, `pegawai`) VALUES
(27, 9, 1000, 4000, 4000000, '2020-07-01 09:31:21', 1, 1),
(28, 9, 1000, 4000, 4000000, '2020-07-01 09:31:47', 3, 1),
(29, 9, 1000, 4000, 4000000, '2020-07-01 09:31:59', 5, 1),
(30, 9, 1000, 4000, 4000000, '2020-07-01 09:32:11', 7, 1),
(31, 9, 250, 4000, 1000000, '2020-07-01 09:42:55', 5, 2),
(32, 9, 500, 4000, 2000000, '2020-07-01 10:15:42', 1, 1),
(33, 11, 200, 2500, 500000, '2020-07-01 10:38:13', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  `nama` varchar(24) NOT NULL,
  `jabatan` varchar(24) NOT NULL,
  `id_outlet` varchar(12) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `jabatan`, `id_outlet`, `no_hp`, `alamat`, `date_created`) VALUES
(1, 'Admin', 'admin123', 'Admin', 'Admin', '1', '087xxxxxxxxx', 'Malang - Bendungan Sutami', '2020-06-30 22:04:12'),
(2, 'outlet_kandangan', 'kandangan123', 'Emp Kandangan', 'Pegawai', '5', '085784xxxxxx', 'Jl. Ikan Piranha', '2020-07-01 07:17:40'),
(5, 'outlet_sulfat', 'sulfat123', 'Emp Sulfat', 'Pegawai', '1', '0874545xxxx', 'Soehat', '2020-07-01 07:15:08'),
(7, 'outlet_sgg', 'sgg123', 'Emp Sigura-gura', 'Pegawai', '3', '085784114xxx', 'Sgg Gang 1', '2020-07-01 07:18:21'),
(8, 'outlet_sukun', 'sukun123', 'Emp Sukun', 'Pegawai', '7', '085784114xxx', 'Sukun Gang 3', '2020-07-01 07:19:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bibit`
--
ALTER TABLE `bibit`
  ADD PRIMARY KEY (`id_bibit`);

--
-- Indexes for table `bibit_outlet`
--
ALTER TABLE `bibit_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indexes for table `prediksi`
--
ALTER TABLE `prediksi`
  ADD PRIMARY KEY (`id_prediksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bibit`
--
ALTER TABLE `bibit`
  MODIFY `id_bibit` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bibit_outlet`
--
ALTER TABLE `bibit_outlet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id_outlet` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prediksi`
--
ALTER TABLE `prediksi`
  MODIFY `id_prediksi` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
