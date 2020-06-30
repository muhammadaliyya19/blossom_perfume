-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2020 at 03:41 AM
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
(1, 'Fragrance', 50, 250, 200, '2020-06-27 13:31:56'),
(2, 'Axe Body', 1000, 550, 300, '2020-06-28 23:37:10'),
(4, 'Gatsby', 4000, 400, 200, '2020-06-28 23:41:49');

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
(5, 'Kandangan');

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
(8, 4, 100, 400, 40000, '2020-06-29 00:32:28', 1, 1),
(9, 2, 100, 550, 55000, '2020-06-29 00:32:49', 5, 2),
(10, 1, 300, 250, 75000, '2020-06-29 00:33:21', 3, 5),
(11, 4, 500, 400, 200000, '2020-06-29 08:13:45', 1, 1),
(12, 2, 2000, 550, 1100000, '2020-06-29 08:29:06', 5, 2);

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
(1, 'admin', 'admin123', 'Admin Saja', 'Pegawai', '1', '087xxxxxxxxx', 'Malang - Bendungan Sutami', '2020-06-28 23:42:27'),
(2, 'emp', 'emp123', 'Employee', 'Pegawai', '5', '085784xxxxxx', 'Jl. Ikan Piranha', '2020-06-27 12:41:53'),
(5, 'Tester Nama', 'tester', 'Tester Nama', 'Pegawai', '1', '0874545xxxx', 'Soehat', '2020-06-29 08:27:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bibit`
--
ALTER TABLE `bibit`
  ADD PRIMARY KEY (`id_bibit`);

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
  MODIFY `id_bibit` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id_outlet` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prediksi`
--
ALTER TABLE `prediksi`
  MODIFY `id_prediksi` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
