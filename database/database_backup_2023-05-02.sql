CREATE TABLE `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO admin VALUES('101','Bagus','bagus123@gmail.com','admin123');

CREATE TABLE `agen_travel` (
  `id_agen` int NOT NULL AUTO_INCREMENT,
  `nama_agen` varchar(255) NOT NULL,
  `email_agen` varchar(255) NOT NULL,
  `password_agen` varchar(255) NOT NULL,
  `alamat_agen` varchar(255) NOT NULL,
  `telepon_agen` varchar(20) NOT NULL,
  PRIMARY KEY (`id_agen`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO agen_travel VALUES('201','Fajar','fajar123@gmail.com','agen123','Jalan.P.Antasari','082144000010');

CREATE TABLE `customer` (
  `id_customer` int NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(255) NOT NULL,
  `email_customer` varchar(255) NOT NULL,
  `password_customer` varchar(255) NOT NULL,
  `alamat_customer` varchar(255) NOT NULL,
  `telepon_customer` varchar(20) NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=324 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO customer VALUES('319','Raihan Daiva Geralda','daivageralda831@gmail.com','$2y$10$QIxX.6tn.q7UrSMzcKZ7o.I0S.rPEEXnofxR4iEdm9ugq/ML3Egma','Jalan Ulin Gang 2 No. 80 RT. 21 Samarinda','089628270851');
INSERT INTO customer VALUES('320','Rahmad Fitrianto','antonaksmd@gmail.com','$2y$10$tuyA66itEuh1X/r8hjPUvef.9bsh6nilyw4WBCmA.mfrMOtL7Geq2','Jalan Sejati Gang Durin','089628270851');
INSERT INTO customer VALUES('322','Bagus Nur Fajar Riski','bnfr@gmail.com','$2y$10$MVIDi2C8/.o7U03Q24PleOxc/IGDdeNlkRpCkLuWxzvDZV5ARMcMK','Jalan Pramuka','081253027037');
INSERT INTO customer VALUES('323','Aji Wira Ksatria','aji@gmail.com','$2y$10$.cwSjbPui66u04OTklB6YOUmjdHw7JcbA50cJAr2SiuIwWZ.bX6Ta','Jalan Pramuka','081253027037');

CREATE TABLE `paket_wisata` (
  `id_paket` int NOT NULL AUTO_INCREMENT,
  `id_agen` int NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `deskripsi_paket` text NOT NULL,
  `harga_paket` decimal(10,2) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_pulang` date NOT NULL,
  `kuota_paket` int NOT NULL,
  PRIMARY KEY (`id_paket`),
  KEY `agen_paket` (`id_agen`),
  CONSTRAINT `agen_paket` FOREIGN KEY (`id_agen`) REFERENCES `agen_travel` (`id_agen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=402 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO paket_wisata VALUES('401','201','Jalan-Jalan Keliling Dunia','Paket perjalanan jalan-jalan keliling dunia adalah sebuah paket liburan yang menawarkan pengalaman tak terlupakan dalam mengunjungi beberapa negara di berbagai benua di seluruh dunia. Paket perjalanan ini dirancang untuk memenuhi kebutuhan wisatawan yang ingin menjelajahi dunia dalam waktu yang singkat dan efisien.','90000000.00','2023-05-01','2023-11-01','30');

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
  CONSTRAINT `customer_transaksi` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `paket_transaksi` FOREIGN KEY (`id_paket`) REFERENCES `paket_wisata` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

