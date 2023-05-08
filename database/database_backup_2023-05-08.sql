CREATE TABLE `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO admin VALUES('101','Bagus','bagus123@gmail.com','admin123');

CREATE TABLE `paket_wisata` (
  `id_paket` int NOT NULL AUTO_INCREMENT,
  `id_agen` int NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `lokasi_paket` varchar(255) NOT NULL,
  `deskripsi_paket` text NOT NULL,
  `harga_paket` decimal(10,2) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_pulang` date NOT NULL,
  `kuota_paket` int NOT NULL,
  PRIMARY KEY (`id_paket`),
  KEY `agen_paket` (`id_agen`)
) ENGINE=InnoDB AUTO_INCREMENT=402 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `tiket` (
  `id_tiket` int NOT NULL AUTO_INCREMENT,
  `id_transaksi` int NOT NULL,
  `kode_tiket` varchar(255) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `jam_berangkat` time NOT NULL,
  `nama_penumpang` varchar(255) NOT NULL,
  `alamat_penumpang` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tiket`),
  KEY `transaksi_tiket` (`id_transaksi`),
  CONSTRAINT `transaksi_tiket` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=502 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL AUTO_INCREMENT,
  `id_customer` int NOT NULL,
  `id_paket` int NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `total_pembayaran` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `paket_transaksi` (`id_paket`),
  KEY `customer_transaksi` (`id_customer`),
  CONSTRAINT `customer_transaksi` FOREIGN KEY (`id_customer`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `paket_transaksi` FOREIGN KEY (`id_paket`) REFERENCES `paket_wisata` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=336 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO user VALUES('324','Raihan Daiva Geralda','daivageralda831@gmail.com','$2y$10$VyVpm5Ug6N.Ie6TmxtjwGOhsrflwfurnAPzD3g3EzKfGx2jEV1qKW','Jalan Ulin Gang 2','089628270851','customer');
INSERT INTO user VALUES('325','Rahmad Fitrianto','antonaksmd@gmail.com','$2y$10$iN8qgkgwxc99S9HVxKwOm.0kvKZgmPbEWA1emr7J/wd/DUz7YuWXi','Jl. Sejati','089812334545','customer');
INSERT INTO user VALUES('326','Rahmad Fitrianto','antonaksmd@gmail.com','$2y$10$DVVj5UF6OgfZs0mrqIbqFOwxNozL5nqauzS4W6F/ipCWVDDwxEB.i','Jl. Sejati','089812334545','customer');
INSERT INTO user VALUES('327','Rahmad Fitrianto','antonaksmd@gmail.com','$2y$10$l1169ZuQ0oGNkZNE.b1MH.m5uAKc0GubDbVMZ.8m2cXAn2u9sD1DC','Jl. Sejati','089812334545','customer');
INSERT INTO user VALUES('328','Rahmad Fitrianto','antonaksmd@gmail.com','$2y$10$arOQY09jJp7fSzNdEydTre.sR1jmKvyY7gzP7l32KpTYjLDB9Noj.','Jl. Sejati','089812334545','customer');
INSERT INTO user VALUES('329','Rahmad Fitrianto','antonaksmd@gmail.com','$2y$10$sisaIiZGdHdLx.DqIvqbdeSlJPPulPKPfyHRiOg0aJzxdRt7jtkSG','Jl. Sejati','089812334545','customer');
INSERT INTO user VALUES('330','Rahmad Fitrianto','antonaksmd@gmail.com','$2y$10$2dLKKgVurV5Ce7jtqbFVt.riKUvuOVN7xt9kod0bK3FyyYoCiWhvm','Jl. Sejati','089812334545','customer');
INSERT INTO user VALUES('331','Rahmad Fitrianto','antonaksmd@gmail.com','$2y$10$0C962EgiOzk0jj44.Ktj9uboftA8giUQTwhzPm0ydVH1iPwdobGAW','Jl. Sejati','089812334545','customer');
INSERT INTO user VALUES('332','Rahmad Fitrianto','antonaksmd@gmail.com','$2y$10$QGnQ8vkL5x/uxzirr31Jte4Y0WmLNa3wSfyk1sSJvKMPW0MKAUPvC','Jl. Sejati','089812334545','customer');
INSERT INTO user VALUES('333','Rahmad Fitrianto','antonaksmd@gmail.com','$2y$10$FR7axeYKZc/AMS60i3NoMOm.Xtd3WyNqRSCbHo3DQiS1B1Dz1ZDje','Jl. Sejati','089812334545','customer');
INSERT INTO user VALUES('334','Rahmad Fitrianto','antonaksmd@gmail.com','$2y$10$ZdMxWk8te6ab7vg3w5H5O.QXJ7UfE2gH4ekRvNgwrhNOx8Kyrk/zO','Jl. Sejati','089812334545','customer');
INSERT INTO user VALUES('335','Rahmad Fitrianto','antonaksmd@gmail.com','$2y$10$nBRAhxOpDLxHqiua4DhtiOEf2aoKZ/zWaz4Kdtu8SLu2nXedmIXkW','Jl. Sejati','089812334545','customer');

