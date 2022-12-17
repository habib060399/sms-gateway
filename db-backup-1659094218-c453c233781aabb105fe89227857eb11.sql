DROP TABLE IF EXISTS tbl_ajaran;

CREATE TABLE `tbl_ajaran` (
  `id_ajaran` varchar(6) NOT NULL,
  `thn_ajaran` date NOT NULL,
  `semester` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS tbl_jurusan;

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` varchar(6) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_jurusan VALUES("JRS-01","Agrobisnis Tanaman Pangan dan Hortikultura"),
("JRS-02","Agrobisnis Pengolahan Hasil Pertanian"),
("JRS-03","Agrobisnis Ternak Ruminansia"),
("JRS-04","Teknik Komputer dan Jaringan"),
("JRS-05","Rekayasa Perangkat Lunak"),
("JRS-06","Jurusan 1");



DROP TABLE IF EXISTS tbl_kelas;

CREATE TABLE `tbl_kelas` (
  `id_kelas` varchar(6) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_kelas VALUES("KLS-01","10"),
("KLS-02","11"),
("KLS-03","12"),
("KLS-04","13");



DROP TABLE IF EXISTS tbl_murid;

CREATE TABLE `tbl_murid` (
  `nis` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `kelamin` varchar(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp_orangtua` varchar(12) NOT NULL,
  `id_jurusan` varchar(6) NOT NULL,
  `id_kelas` varchar(6) NOT NULL,
  `ruangan` varchar(12) NOT NULL,
  `status` varchar(12) NOT NULL,
  `tahunAjaran` varchar(9) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_murid VALUES("12345678910","Murid 1","Islam","Laki-laki","Indonesia","0888888888","JRS-01","KLS-01","RNG-01","lunas","2022/2023"),
("291","bima","Islam","Laki-laki","Bogor","082240463033","JRS-01","KLS-01","RNG-01","lunas","2022/2023");



DROP TABLE IF EXISTS tbl_pembayaran;

CREATE TABLE `tbl_pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `jumlah` double NOT NULL,
  `nis` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `tahunAjaran` varchar(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_pembayaran VALUES("5","2022-07-28","200000","0000001","Bima Moch","Rekayasa Perangkat L","Semester 1","10",""),
("6","2022-07-28","200000","291","bima","Agrobisnis Tanaman P","Semester 1","10","2022/2023"),
("7","2022-07-29","200000","12345678910","Murid 1","Agrobisnis Tanaman P","Semester 1","10","2022/2023");



DROP TABLE IF EXISTS tbl_ruangan;

CREATE TABLE `tbl_ruangan` (
  `id_ruangan` varchar(6) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_ruangan VALUES("RNG-01","ATPH"),
("RNG-02","APHP"),
("RNG-03","ATR"),
("RNG-04","TKJ"),
("RNG-05","RPL"),
("RNG-06","Ruangan 1");



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("1","admin","admin"),
("2","kepsek","kepsek");



