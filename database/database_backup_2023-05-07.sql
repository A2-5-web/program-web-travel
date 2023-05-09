CREATE TABLE `user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) NOT NULL,
  `no_user` varchar(15) NOT NULL,
  `alamat_user` varchar(80) NOT NULL,
  `status` varchar(10) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
INSERT INTO user VALUES('3','Raihan Daiva Geralda','089628270851','Jalan Ulin Gang 2 No. 80 RT. 21 Samarinda','agen_trave','L','daivageralda','$2y$10$AeAcnmKuSo2Zme8ziDKvGeZQUqpfJ/ZEODP.McKhxlE');

