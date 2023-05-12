-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 09:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `destinasi` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `paket_tour` enum('Domestik','Internasional') NOT NULL,
  `durasi` enum('2 Hari','3 Hari','4 Hari') NOT NULL,
  `harga` int(11) NOT NULL,
  `nama_gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `id_user`, `nama_paket`, `destinasi`, `deskripsi`, `paket_tour`, `durasi`, `harga`, `nama_gambar`) VALUES
(24, 7, 'Bali Tour', 'Bali', 'Paket tur Bali yang mencakup penginapan, transportasi, dan kunjungan ke tempat-tempat wisata populer seperti Pantai Kuta, Tanah Lot, dan Ubud.', 'Domestik', '2 Hari', 700000, 'Bali.jpg'),
(25, 4, 'Jakarta Tour', 'Jakarta', 'Kunjungan ke beberapa tempat wisata terkenal di Jakarta seperti Monumen Nasional, Istana Merdeka, dan Taman Mini Indonesia Indah.', 'Domestik', '3 Hari', 2500000, 'Jakarta.jpg'),
(26, 4, 'Bromo Adventure', 'Surabaya', 'Paket wisata petualangan di Pegunungan Bromo yang mencakup trekking, camping, dan melihat matahari terbit dari puncak gunung.', 'Domestik', '2 Hari', 4000000, 'Bromo.jpg'),
(27, 4, 'Yogyakarta Cultural Tour', 'Yogyakarta', 'Paket tur kebudayaan yang mencakup kunjungan ke Candi Borobudur, Candi Prambanan, dan Keraton Yogyakarta.', 'Domestik', '3 Hari', 3000000, 'Yogyakarta.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_paket` int(5) NOT NULL,
  `jumlah_orang` int(2) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `total_bayar` mediumint(9) NOT NULL,
  `status` enum('Sudah Dibayar','Belum Dibayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `no_user` varchar(15) NOT NULL,
  `alamat_user` varchar(80) NOT NULL,
  `status` varchar(20) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `no_user`, `alamat_user`, `status`, `jenis_kelamin`, `username`, `password`) VALUES
(4, 'Raihan Daiva Geralda', '089628270851', 'Jalan Ulin Gang 2 No. 80 RT. 21 Samarinda', 'travel_agent', 'L', 'daivageralda', 'hanzz357'),
(6, 'Rahmad Fitrianto', '082254320821', 'Jalan Sejati Gang Durian', 'customer', 'L', 'rahmad', '1234'),
(7, 'Rahmad Fitrianto', '082254320821', 'Jalan Sejati Gang Durian', 'travel_agent', 'L', 'rahmad', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `agen_paket` (`id_user`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `pesan_user` (`id_user`),
  ADD KEY `pesan_paket` (`id_paket`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `agen_paket` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pesan_paket` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesan_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
