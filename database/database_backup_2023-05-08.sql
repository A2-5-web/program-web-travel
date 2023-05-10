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
) ENGINE=InnoDB AUTO_INCREMENT=337 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO user VALUES('324','Raihan Daiva Geralda','daivageralda831@gmail.com','$2y$10$VyVpm5Ug6N.Ie6TmxtjwGOhsrflwfurnAPzD3g3EzKfGx2jEV1qKW','Jalan Ulin Gang 2','089628270851','customer');
INSERT INTO user VALUES('325','Rahmad Fitrianto','antonaksmd@gmail.com','$2y$10$iN8qgkgwxc99S9HVxKwOm.0kvKZgmPbEWA1emr7J/wd/DUz7YuWXi','Jl. Sejati','089812334545','customer');
INSERT INTO user VALUES('336','Asep ','asep123@gmail.com','$2y$10$n2SJlT5xCKv9/MnVrmRSlujKW0nxAebiFrd3YAYiD2kgkJ20rA2zO','Jl. Sejati','081298986543','customer');

