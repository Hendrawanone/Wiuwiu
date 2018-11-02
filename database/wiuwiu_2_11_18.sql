-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Nov 2018 pada 04.00
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiuwiu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `armada`
--

CREATE TABLE `armada` (
  `id` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nopol` varchar(15) NOT NULL,
  `mobil` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `armada`
--

INSERT INTO `armada` (`id`, `nama`, `nopol`, `mobil`) VALUES
(1, 'Armada 1', '92384', 'Lamborgini'),
(2, 'Armada 2', '39248298', 'Tank');

-- --------------------------------------------------------

--
-- Struktur dari tabel `driver`
--

CREATE TABLE `driver` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `sim` varchar(5) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `driver`
--

INSERT INTO `driver` (`id`, `nama`, `telepon`, `nik`, `sim`, `foto`, `alamat`) VALUES
(8, 'Bagas', '0923091209388', '2109382349829102', 'Sim A', '5bdbbc2978740.png', 'Bondowoso'),
(9, 'Surya', '039823498291', '123832948293489', 'A', '5bdbbd2d13a39.png', 'Bondowoso');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama`, `telepon`, `keperluan`, `waktu`, `alamat`, `status`) VALUES
(1, 'Hendra', '087712843638', 'Sakit', '2018-10-29 10:00:00', 'Bondowoso', 'Konfirasi'),
(2, 'Hendra', '087712843638', 'Sehat', '2018-10-30 19:00:00', 'Bondowoso', 'Ditolak'),
(3, 'Hendra', '087712843638', 'Sehat', '2018-10-30 19:00:00', 'Bondowoso', 'Ditolak'),
(4, 'Dewa', '087712843638', 'Sakit', '2018-10-31 02:00:00', 'Bondowoso', 'Baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` int(6) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `telepon_pemesan` varchar(15) NOT NULL,
  `keperluan_pemesan` varchar(100) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `alamat_pemesan` varchar(200) NOT NULL,
  `nama_driver` varchar(30) NOT NULL,
  `telepon_driver` varchar(15) NOT NULL,
  `alamat_driver` varchar(200) NOT NULL,
  `nama_armada` varchar(15) NOT NULL,
  `nopol_armada` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `foto`, `status`) VALUES
(1, 'Hendrawan', 'hendraone', '$2y$10$j8wqe7vbM4yFlyDtXcGrf.ucv95VMT/BVHuxiGKbmKQdt4gYt0pFm', '', 'admin'),
(3, 'Hendrawan', 'hendra', '$2y$10$TaxzIQ0dyC4Qgu/XbE8p6uxHG8RFLhn/SoO1IHK7FmWVSN4sKSFZm', '5bda6329efbdd.jpg', 'admin'),
(4, 'dewa irvanda wahyudi', 'dewairvanda', '$2y$10$k66Gcb5jDH/wxGInSQmy7eS.3LjKj3GPaocnF4v1zcV8MXqjSRWYy', '5bda11535956d.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armada`
--
ALTER TABLE `armada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
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
-- AUTO_INCREMENT for table `armada`
--
ALTER TABLE `armada`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
