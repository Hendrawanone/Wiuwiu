-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 Nov 2018 pada 03.35
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
(3, 'Armada 1', '992371', 'Tank');

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
(10, 'Dewa', '087564668789', '8643576798898', 'Sim A', '5be133449b698.jpg', 'Bondowoso');

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
(6, 'Titan', '087712843638', 'Antar jemput ke rumah sakit', '2018-11-08 06:00:00', 'Taman sari', 'Konfirasi'),
(7, 'Dewa', '0394293029', 'Sehat', '2018-11-07 12:00:00', 'Bondowoso', 'Dibatalkan'),
(8, 'Febri', '092387231983', 'Sakit', '2018-11-07 00:00:00', 'Bondowoso', 'Konfirasi'),
(9, 'Gatan', '0349812938198', 'Sakit', '2018-11-08 10:00:00', 'Bondowoso', 'Konfirasi'),
(10, 'Surya', '083982983498', 'Sakit', '2018-11-09 14:00:00', 'Bondowoso', 'Konfirasi');

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
  `mobil_armada` varchar(15) NOT NULL,
  `nopol_armada` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `nama_pemesan`, `telepon_pemesan`, `keperluan_pemesan`, `tanggal_pemesanan`, `alamat_pemesan`, `nama_driver`, `telepon_driver`, `alamat_driver`, `nama_armada`, `mobil_armada`, `nopol_armada`, `status`) VALUES
(4, 'Titan', '087712843638', 'Antar jemput ke rumah sakit', '2018-11-08 06:00:00', 'Taman sari', 'Dewa', '087564668789', 'Bondowoso', 'Armada 1', 'Tank', '992371', 'Terlaksana'),
(5, 'Febri', '092387231983', 'Sakit', '2018-11-07 00:00:00', 'Bondowoso', 'Dewa', '087564668789', 'Bondowoso', 'Armada 1', 'Tank', '992371', 'Tugas'),
(6, 'Gatan', '0349812938198', 'Sakit', '2018-11-08 10:00:00', 'Bondowoso', 'Dewa', '087564668789', 'Bondowoso', 'Armada 1', 'Tank', '992371', 'Tugas'),
(7, 'Surya', '083982983498', 'Sakit', '2018-11-09 14:00:00', 'Bondowoso', 'Dewa', '087564668789', 'Bondowoso', 'Armada 1', 'Tank', '992371', 'Terlaksana');

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
(7, 'Hendrawan', 'hendraone', '$2y$10$GW262L3ePElBR.EN7EcLHuOfxl9TNuz0JG4PuR4TPmiOjTrlr.8Ke', '5be132d5cc592.jpg', 'admin'),
(8, 'Dewa', 'dewa', '$2y$10$3jL26nfOtTjTWJfBNmfLp.KXi1oeT.fk9jf.OeYdIyvIcoLcAgAIO', '5be133c5b2e66.jpg', 'user');

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
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
