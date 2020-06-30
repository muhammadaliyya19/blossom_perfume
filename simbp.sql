-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2020 pada 05.14
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `bibit`
--

CREATE TABLE `bibit` (
  `id_bibit` int(12) NOT NULL,
  `nama_bibit` varchar(128) NOT NULL,
  `Stok_bibit` int(4) NOT NULL,
  `harga_jual` int(5) NOT NULL,
  `harga_beli` int(5) NOT NULL,
  `date_update_bibit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `outlet`
--

CREATE TABLE `outlet` (
  `id_outlet` varchar(12) NOT NULL,
  `alamat_outlet` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prediksi`
--

CREATE TABLE `prediksi` (
  `id_prediksi` int(12) NOT NULL,
  `date_created_prediksi` datetime NOT NULL,
  `nama_bibit` varchar(128) NOT NULL,
  `id_bibit` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bibit`
--
ALTER TABLE `bibit`
  ADD PRIMARY KEY (`id_bibit`);

--
-- Indeks untuk tabel `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indeks untuk tabel `prediksi`
--
ALTER TABLE `prediksi`
  ADD PRIMARY KEY (`id_prediksi`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bibit`
--
ALTER TABLE `bibit`
  MODIFY `id_bibit` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prediksi`
--
ALTER TABLE `prediksi`
  MODIFY `id_prediksi` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
