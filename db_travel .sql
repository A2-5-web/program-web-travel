-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 09:07 AM
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
-- Table structure for table `histori_login`
--

CREATE TABLE `histori_login` (
  `id_history` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `tanggal_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histori_login`
--

INSERT INTO `histori_login` (`id_history`, `id_user`, `tanggal_login`) VALUES
(1, 17, '2023-05-16 08:49:40'),
(2, 15, '2023-05-16 08:58:07'),
(3, 17, '2023-05-16 09:02:08'),
(4, 16, '2023-05-16 09:03:12'),
(5, 17, '2023-05-16 09:03:41');

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
(27, 4, 'Yogyakarta Cultural Tour', 'Yogyakarta', 'Paket tur kebudayaan yang mencakup kunjungan ke Candi Borobudur, Candi Prambanan, dan Keraton Yogyakarta.', 'Domestik', '3 Hari', 3000000, 'Yogyakarta.jpg'),
(31, 17, 'iubsacisbdcdsi', 'iubciasjbcis', 'uibdudcsiwecb', 'Domestik', '2 Hari', 12312312, 'aman.jpg');

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
  `tanggal_berangkat` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `total_bayar` bigint(20) NOT NULL,
  `status` enum('Sudah Dikonfirmasi','Belum Dibayar','Menunggu Konfirmasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_user`, `id_paket`, `jumlah_orang`, `tanggal_pemesanan`, `tanggal_berangkat`, `tanggal_kembali`, `total_bayar`, `status`) VALUES
(24, 8, 25, 3, '2023-05-15', '2023-05-16', '2023-05-19', 7500000, 'Sudah Dikonfirmasi'),
(26, 8, 26, 1, '2023-05-15', '2023-06-15', '2023-06-17', 4000000, 'Belum Dibayar'),
(28, 16, 31, 1, '2023-05-16', '2023-06-23', '2023-06-25', 12312312, 'Belum Dibayar');

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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `no_user`, `alamat_user`, `status`, `jenis_kelamin`, `username`, `password`) VALUES
(4, 'Raihan Daiva Geralda', '089628270851', 'Jalan Ulin Gang 2 No. 80 RT. 21 Samarinda', 'travel_agent', 'L', 'daivageralda', 'hanzz357'),
(7, 'Rahmad Fitrianto', '082254320821', 'Jalan Sejati Gang Durian', 'travel_agent', 'L', 'rahmad', '123'),
(8, 'Bagus', '089628270851', 'Jalan Ulin Gang 2 No. 80 RT. 21 Samarinda', 'customer', 'L', 'bagus', '123'),
(14, '038 Raihan Daiva Geralda', '+6289628270851', 'Ulin Street Number 80, Karang Anyar,\r\nSungai Kunjang', 'customer', 'L', 'tes', '$2y$10$I4gQ7qv4NoOtMAt6jR2DmOcQ0QWcp.cakfNYUs5C4xTxh5NNV10DW'),
(15, 'Admin', '089628270851', 'Anonym', 'admin', 'L', 'admin', '$2y$10$sAy5byUciypPd/uywAvJzuXHjq14qb1kkQObx5Z6WTDI/EEJ5vvL2'),
(16, '038 Raihan Daiva Geralda', '+6289628270851', 'Ulin Street Number 80, Karang Anyar,\r\nSungai Kunjang', 'customer', 'L', 'go', '$2y$10$jsSrxH7de932SC3rvZuTDuBefYBupyM6sN/mp6kuIFVs8gZxf/g.q'),
(17, '038 Raihan Daiva Geralda', '+6289628270851', 'Ulin Street Number 80, Karang Anyar,\r\nSungai Kunjang', 'travel_agent', 'L', 'ho', '$2y$10$U3Ilswx/O0D3XxBbnHdbEuY4C5xm53j9eGeWZV77miF29YEr8G.aa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `histori_login`
--
ALTER TABLE `histori_login`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_user` (`id_user`);

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
-- AUTO_INCREMENT for table `histori_login`
--
ALTER TABLE `histori_login`
  MODIFY `id_history` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `histori_login`
--
ALTER TABLE `histori_login`
  ADD CONSTRAINT `histori_login_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

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
