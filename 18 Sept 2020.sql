-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2020 at 09:34 AM
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
  `kode_bibit` varchar(12) NOT NULL,
  `nama_bibit` varchar(128) NOT NULL,
  `Stok_bibit` int(4) NOT NULL,
  `harga_jual` int(5) NOT NULL,
  `harga_beli` int(5) NOT NULL,
  `date_update_bibit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bibit`
--

INSERT INTO `bibit` (`id_bibit`, `kode_bibit`, `nama_bibit`, `Stok_bibit`, `harga_jual`, `harga_beli`, `date_update_bibit`) VALUES
(9, 'RG', 'Rose Gold', 0, 4000, 2000, '2020-09-17 23:01:01'),
(10, 'VM', 'VVIP Man', 6200, 2500, 1000, '2020-07-09 08:55:18'),
(11, 'ADG', 'Aqua Di Geo', 1800, 2500, 1200, '2020-07-01 10:38:13'),
(12, 'VSL', 'VICTORIA SECRET LOVE', 0, 2500, 1200, '2020-07-02 14:36:36'),
(13, 'JC', 'JAGUAR CLASIC', 0, 4000, 2000, '2020-07-02 14:36:46'),
(14, 'PS', 'PLAYBOY SEXY', 0, 7000, 5000, '2020-07-02 14:37:03'),
(15, 'VSPF', 'VICTORIA SECRET PINK SURF', 0, 5000, 3000, '2020-07-02 14:37:18'),
(16, 'BC', 'BENETTON COOL', 0, 6000, 4000, '2020-07-02 14:37:39'),
(17, 'ATM', 'AZZARO TWIN MAN', 0, 2500, 1000, '2020-07-02 14:37:58'),
(18, 'CC', 'COKLAT CAPPUCINO', 0, 4000, 3000, '2020-07-02 14:38:11'),
(19, 'TS', 'TAYLOR SWIFT', 0, 6000, 3500, '2020-07-02 14:38:32'),
(20, 'TSW', 'TAYLOR SWIFT', 0, 6000, 4000, '2020-07-02 14:38:56'),
(21, 'IMHS', 'ISSEY MIYAKE HOMME SPORT ', 0, 8000, 5000, '2020-07-02 14:39:18'),
(22, 'BP', 'BEYOND PARADISE', 0, 4000, 2000, '2020-07-02 14:39:32'),
(23, 'DGL', 'DAVIDOFF GAME LADY', 0, 2500, 1000, '2020-07-02 14:39:44');

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
(20, 10, 1, 1600, '2020-06-30 21:57:51'),
(21, 10, 3, 1800, '2020-06-30 21:57:51'),
(22, 10, 5, 800, '2020-06-30 21:57:51'),
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
(90, 23, 8, 0, '2020-07-02 14:39:44'),
(91, 9, 9, 0, '2020-09-17 21:39:10'),
(92, 10, 9, 0, '2020-09-17 21:39:10'),
(93, 11, 9, 0, '2020-09-17 21:39:10'),
(94, 12, 9, 0, '2020-09-17 21:39:10'),
(95, 13, 9, 0, '2020-09-17 21:39:10'),
(96, 14, 9, 0, '2020-09-17 21:39:10'),
(97, 15, 9, 0, '2020-09-17 21:39:10'),
(98, 16, 9, 0, '2020-09-17 21:39:10'),
(99, 17, 9, 0, '2020-09-17 21:39:10'),
(100, 18, 9, 0, '2020-09-17 21:39:10'),
(101, 19, 9, 0, '2020-09-17 21:39:10'),
(102, 20, 9, 0, '2020-09-17 21:39:10'),
(103, 21, 9, 0, '2020-09-17 21:39:10'),
(104, 22, 9, 0, '2020-09-17 21:39:10'),
(105, 23, 9, 0, '2020-09-17 21:39:10'),
(106, 9, 10, 0, '2020-09-17 21:50:50'),
(107, 10, 10, 0, '2020-09-17 21:50:50'),
(108, 11, 10, 0, '2020-09-17 21:50:50'),
(109, 12, 10, 0, '2020-09-17 21:50:50'),
(110, 13, 10, 0, '2020-09-17 21:50:50'),
(111, 14, 10, 0, '2020-09-17 21:50:50'),
(112, 15, 10, 0, '2020-09-17 21:50:50'),
(113, 16, 10, 0, '2020-09-17 21:50:50'),
(114, 17, 10, 0, '2020-09-17 21:50:50'),
(115, 18, 10, 0, '2020-09-17 21:50:50'),
(116, 19, 10, 0, '2020-09-17 21:50:50'),
(117, 20, 10, 0, '2020-09-17 21:50:50'),
(118, 21, 10, 0, '2020-09-17 21:50:50'),
(119, 22, 10, 0, '2020-09-17 21:50:50'),
(120, 23, 10, 0, '2020-09-17 21:50:50'),
(121, 9, 11, 0, '2020-09-17 21:56:04'),
(122, 10, 11, 0, '2020-09-17 21:56:04'),
(123, 11, 11, 0, '2020-09-17 21:56:04'),
(124, 12, 11, 0, '2020-09-17 21:56:04'),
(125, 13, 11, 0, '2020-09-17 21:56:04'),
(126, 14, 11, 0, '2020-09-17 21:56:04'),
(127, 15, 11, 0, '2020-09-17 21:56:04'),
(128, 16, 11, 0, '2020-09-17 21:56:04'),
(129, 17, 11, 0, '2020-09-17 21:56:04'),
(130, 18, 11, 0, '2020-09-17 21:56:04'),
(131, 19, 11, 0, '2020-09-17 21:56:04'),
(132, 20, 11, 0, '2020-09-17 21:56:04'),
(133, 21, 11, 0, '2020-09-17 21:56:04'),
(134, 22, 11, 0, '2020-09-17 21:56:04'),
(135, 23, 11, 0, '2020-09-17 21:56:04'),
(136, 9, 12, 0, '2020-09-17 22:01:05'),
(137, 10, 12, 0, '2020-09-17 22:01:05'),
(138, 11, 12, 0, '2020-09-17 22:01:05'),
(139, 12, 12, 0, '2020-09-17 22:01:05'),
(140, 13, 12, 0, '2020-09-17 22:01:05'),
(141, 14, 12, 0, '2020-09-17 22:01:05'),
(142, 15, 12, 0, '2020-09-17 22:01:05'),
(143, 16, 12, 0, '2020-09-17 22:01:05'),
(144, 17, 12, 0, '2020-09-17 22:01:05'),
(145, 18, 12, 0, '2020-09-17 22:01:05'),
(146, 19, 12, 0, '2020-09-17 22:01:05'),
(147, 20, 12, 0, '2020-09-17 22:01:05'),
(148, 21, 12, 0, '2020-09-17 22:01:05'),
(149, 22, 12, 0, '2020-09-17 22:01:05'),
(150, 23, 12, 0, '2020-09-17 22:01:05'),
(151, 9, 13, 0, '2020-09-18 08:40:29'),
(152, 10, 13, 0, '2020-09-18 08:40:29'),
(153, 11, 13, 0, '2020-09-18 08:40:29'),
(154, 12, 13, 0, '2020-09-18 08:40:29'),
(155, 13, 13, 0, '2020-09-18 08:40:29'),
(156, 14, 13, 0, '2020-09-18 08:40:29'),
(157, 15, 13, 0, '2020-09-18 08:40:29'),
(158, 16, 13, 0, '2020-09-18 08:40:29'),
(159, 17, 13, 0, '2020-09-18 08:40:29'),
(160, 18, 13, 0, '2020-09-18 08:40:29'),
(161, 19, 13, 0, '2020-09-18 08:40:29'),
(162, 20, 13, 0, '2020-09-18 08:40:29'),
(163, 21, 13, 0, '2020-09-18 08:40:29'),
(164, 22, 13, 0, '2020-09-18 08:40:29'),
(165, 23, 13, 0, '2020-09-18 08:40:29'),
(166, 9, 14, 0, '2020-09-18 08:44:53'),
(167, 10, 14, 0, '2020-09-18 08:44:53'),
(168, 11, 14, 0, '2020-09-18 08:44:53'),
(169, 12, 14, 0, '2020-09-18 08:44:53'),
(170, 13, 14, 0, '2020-09-18 08:44:53'),
(171, 14, 14, 0, '2020-09-18 08:44:53'),
(172, 15, 14, 0, '2020-09-18 08:44:53'),
(173, 16, 14, 0, '2020-09-18 08:44:53'),
(174, 17, 14, 0, '2020-09-18 08:44:53'),
(175, 18, 14, 0, '2020-09-18 08:44:53'),
(176, 19, 14, 0, '2020-09-18 08:44:53'),
(177, 20, 14, 0, '2020-09-18 08:44:53'),
(178, 21, 14, 0, '2020-09-18 08:44:53'),
(179, 22, 14, 0, '2020-09-18 08:44:53'),
(180, 23, 14, 0, '2020-09-18 08:44:53'),
(181, 9, 15, 0, '2020-09-18 09:00:31'),
(182, 10, 15, 0, '2020-09-18 09:00:31'),
(183, 11, 15, 0, '2020-09-18 09:00:31'),
(184, 12, 15, 0, '2020-09-18 09:00:31'),
(185, 13, 15, 0, '2020-09-18 09:00:31'),
(186, 14, 15, 0, '2020-09-18 09:00:31'),
(187, 15, 15, 0, '2020-09-18 09:00:31'),
(188, 16, 15, 0, '2020-09-18 09:00:31'),
(189, 17, 15, 0, '2020-09-18 09:00:31'),
(190, 18, 15, 0, '2020-09-18 09:00:31'),
(191, 19, 15, 0, '2020-09-18 09:00:31'),
(192, 20, 15, 0, '2020-09-18 09:00:31'),
(193, 21, 15, 0, '2020-09-18 09:00:31'),
(194, 22, 15, 0, '2020-09-18 09:00:31'),
(195, 23, 15, 0, '2020-09-18 09:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `id_outlet` int(12) NOT NULL,
  `kode_outlet` varchar(12) NOT NULL,
  `alamat_outlet` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`id_outlet`, `kode_outlet`, `alamat_outlet`) VALUES
(1, 'OU_1', 'Sulfat_Malang_'),
(3, 'OU_2', 'Sigura-gura'),
(5, 'OU_3', 'Kandangan'),
(7, 'OU_4', 'Sukun'),
(8, 'OU_5', 'Bontang_');

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
  `kode_transaksi` varchar(22) NOT NULL,
  `id_bibit` int(12) NOT NULL,
  `jumlah_pembelian` int(5) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_satuan` int(5) NOT NULL,
  `total_harga` int(8) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `outlet` int(12) NOT NULL,
  `pegawai` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_bibit`, `jumlah_pembelian`, `harga_beli`, `harga_satuan`, `total_harga`, `tanggal_transaksi`, `outlet`, `pegawai`) VALUES
(74, 'TR_074', 9, 200, 2000, 4000, 800000, '2019-06-01 14:38:08', 1, 5),
(75, 'TR_075', 9, 200, 2000, 4000, 800000, '2019-07-01 14:38:08', 1, 5),
(76, 'TR_076', 9, 200, 2000, 4000, 800000, '2020-05-01 14:38:08', 1, 5),
(77, 'TR_077', 9, 200, 2000, 4000, 800000, '2020-06-01 14:38:08', 1, 5),
(78, 'TR_078', 9, 200, 2000, 4000, 800000, '2020-07-01 14:38:08', 1, 5),
(79, 'TR_079', 9, 200, 2000, 4000, 800000, '2020-07-05 14:38:08', 1, 5),
(80, 'TR_080', 9, 250, 2000, 4000, 1000000, '2020-07-02 14:38:08', 1, 5),
(82, 'TR_081', 9, 200, 2000, 4000, 800000, '2018-06-01 14:38:08', 1, 5),
(83, 'TR_082', 9, 200, 2000, 4000, 800000, '2018-07-01 14:38:08', 1, 5),
(84, 'TR_083', 9, 150, 2000, 4000, 900000, '2018-07-01 14:38:08', 1, 5),
(85, 'TR_084', 10, 500, 1000, 2500, 1250000, '2020-07-08 16:05:48', 5, 1),
(86, 'TR_085', 10, 200, 1000, 2500, 500000, '2020-07-09 08:53:47', 5, 8),
(87, 'TR_086', 10, 500, 1000, 2500, 1250000, '2020-07-09 08:55:15', 5, 8),
(89, 'TR_087', 9, 10, 2000, 4000, 40000, '2020-09-15 20:32:16', 1, 5),
(90, 'TR_088', 9, 200, 2000, 4000, 800000, '2020-09-18 08:09:16', 1, 5),
(91, 'TR_89', 11, 100, 1200, 2500, 250000, '2020-09-18 08:15:08', 1, 5),
(92, 'TRANS_20200918_082359', 9, 50, 2000, 4000, 200000, '2020-09-18 08:24:10', 1, 5),
(93, 'TRANS_20200918_033001', 9, 50, 2000, 4000, 200000, '2020-09-18 08:30:13', 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id_outlet` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `prediksi`
--
ALTER TABLE `prediksi`
  MODIFY `id_prediksi` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;