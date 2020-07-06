-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 05:45 AM
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
(11, 'Aqua Di Geo', 1800, 2500, 1200, '2020-07-01 10:38:13');

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
(30, 11, 8, 0, '2020-07-01 10:23:13');

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
  MODIFY `id_bibit` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bibit_outlet`
--
ALTER TABLE `bibit_outlet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
