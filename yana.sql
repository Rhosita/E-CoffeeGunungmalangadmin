-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Jun 2019 pada 05.45
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengambilan`
--

CREATE TABLE `pengambilan` (
  `id_pengambilan` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `jml_ambil` int(10) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengambilan`
--

INSERT INTO `pengambilan` (`id_pengambilan`, `id`, `jml_ambil`, `tgl`) VALUES
(5, 9, 900, '2019-06-21'),
(6, 9, 900, '2018-06-04'),
(7, 9, 9000, '2018-06-04'),
(8, 9, 899, '2017-09-04'),
(9, 9, 800, '2017-09-04'),
(10, 9, 2000, '2019-06-27'),
(11, 9, 600, '2019-06-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_jual` int(10) NOT NULL,
  `nama_produk` int(10) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `total` int(10) NOT NULL,
  `id_transaksi` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(32) NOT NULL,
  `harga` int(10) NOT NULL,
  `ket` varchar(64) NOT NULL,
  `gambar` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_barang`, `nama_barang`, `harga`, `ket`, `gambar`) VALUES
(9, 'botol', 200, 'yaya', 'quick_count.png'),
(14, 'kuku', 123445, 'qwerqwe', 'crop.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trs` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(32) NOT NULL,
  `id` int(10) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `tgl` date NOT NULL,
  `ttl_produk` int(4) NOT NULL,
  `ttl_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_trs`, `id_barang`, `nama_barang`, `id`, `nama`, `tgl`, `ttl_produk`, `ttl_harga`) VALUES
(2, 14, 'kuku', 9, 'yana', '2019-06-21', 90, 11110050),
(3, 9, 'botol', 9, 'yana', '2019-06-27', 7, 1400);

-- --------------------------------------------------------

--
-- Struktur dari tabel `uang`
--

CREATE TABLE `uang` (
  `id` int(10) NOT NULL,
  `uang` int(10) NOT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `uang`
--

INSERT INTO `uang` (`id`, `uang`, `tgl`) VALUES
(9, 1400, '2019-06-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `no_tlp`, `username`, `password`, `level`) VALUES
(1, 'eko', '', '', 'ekofebri', '1234', 1),
(5, 'eko', '', '', 'ekofebri2', '12345', 1),
(7, 'eko', '', '', 'ekofebri9', '1234', 2),
(8, 'asu', '', '', 'asu123', 'asu123', 1),
(9, 'yana', '', '', 'yana123', 'yana123', 2),
(10, 'titot', 'pinggir jalan', '098765432123', 'titot', 'titot123', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengambilan`
--
ALTER TABLE `pengambilan`
  ADD PRIMARY KEY (`id_pengambilan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_jual`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trs`);

--
-- Indexes for table `uang`
--
ALTER TABLE `uang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengambilan`
--
ALTER TABLE `pengambilan`
  MODIFY `id_pengambilan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_jual` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trs` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
