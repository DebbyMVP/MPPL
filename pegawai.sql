-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2017 at 09:07 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` int(25) NOT NULL,
  `deskripsi` text NOT NULL,
  `file_type` varchar(12) NOT NULL,
  `file_data` longblob NOT NULL,
  `file_nama` text NOT NULL,
  `file_size` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `k_t_bank`
--

CREATE TABLE `k_t_bank` (
  `kd_bank` int(11) NOT NULL,
  `nama_bank` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k_t_bank`
--

INSERT INTO `k_t_bank` (`kd_bank`, `nama_bank`) VALUES
(1, 'MANDIRI'),
(2, 'BCA'),
(3, 'BNI'),
(4, 'BRI'),
(5, 'BTN'),
(6, 'BJB'),
(7, 'CIMNIAGA'),
(8, 'MEGA'),
(9, 'SINARMAS');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `kd_pengumuman` int(11) NOT NULL,
  `nama_pengumuman` varchar(255) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`kd_pengumuman`, `nama_pengumuman`, `foto`) VALUES
(17, 'semangat pasti bisa<br/>', NULL),
(18, 'rusdi \r<br/>emang \r<br/>ganteng<br/>', NULL),
(19, 'asdas\r<br/>asdasd\r<br/>', NULL),
(20, 'dasdasd<br/>', NULL),
(21, 'adadadadadfdgs<br/>', ''),
(22, 'asdad<br/>', '14274460_10205247072935307_1198223329_o.jpg'),
(23, 'rusdi\r<br/>ganteng\r<br/>pisan<br/>', '14088425_1257372894273786_1628001917465226609_n.jpg'),
(24, 'adsasdadadad<br/>', '14117799_1257373144273761_8975329593043932043_n.jpg'),
(25, 'rusdi \r<br/>ganteng\r<br/>pisan<br/>', '14088425_1257372894273786_1628001917465226609_n.jpg'),
(26, 'asdasdasd\r<br/>asdasdasd\r<br/>sadasdas<br/>', '14055137_1257373037607105_7994144818465768363_n.jpg'),
(27, 'semangat pasti bisa\r<br/>kalem wehhh<br/>', '14088425_1257372894273786_1628001917465226609_n.jpg'),
(28, '23/12/2016<br/>', 'dgt.png');

-- --------------------------------------------------------

--
-- Table structure for table `slip_gaji`
--

CREATE TABLE `slip_gaji` (
  `id_slip` int(11) NOT NULL,
  `work_days` int(11) DEFAULT NULL,
  `net_pay_days` int(11) DEFAULT NULL,
  `pay_mode` varchar(30) DEFAULT NULL,
  `gaji_pokok` double DEFAULT NULL,
  `jht` double DEFAULT NULL,
  `jpk` double DEFAULT NULL,
  `jkk` double DEFAULT NULL,
  `jkm` double DEFAULT NULL,
  `jp` double DEFAULT NULL,
  `overtime` double DEFAULT NULL,
  `bonus` double DEFAULT NULL,
  `id_gaji` int(11) DEFAULT NULL,
  `add_pay_jpk` double DEFAULT NULL,
  `add_pay_jht` double DEFAULT NULL,
  `add_pay_jp` double DEFAULT NULL,
  `total_ear` double DEFAULT NULL,
  `total_dedu` double DEFAULT NULL,
  `net_pay` double DEFAULT NULL,
  `take_home_pay` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slip_gaji`
--

INSERT INTO `slip_gaji` (`id_slip`, `work_days`, `net_pay_days`, `pay_mode`, `gaji_pokok`, `jht`, `jpk`, `jkk`, `jkm`, `jp`, `overtime`, `bonus`, `id_gaji`, `add_pay_jpk`, `add_pay_jht`, `add_pay_jp`, `total_ear`, `total_dedu`, `net_pay`, `take_home_pay`) VALUES
(6, 22, 22, 'transfer', 10000000, 370000, 189000, 24000, 30000, 140000, 0, 8000000, 7, 47250, 200000, 70000, 18753000, 870602.08333333, 17882397.916667, 17129397.916667),
(7, 22, 22, 'transfer', 8000000, 296000, 189000, 19200, 24000, 140000, 0, 8000000, 8, 47250, 160000, 70000, 16668200, 139958.33333333, 16528241.666667, 15860041.666667),
(8, 22, 22, 'transfer', 8000000, 296000, 189000, 19200, 24000, 140000, 0, 8000000, 9, 47250, 160000, 70000, 16668200, 539958.33333333, 16128241.666667, 15460041.666667);

-- --------------------------------------------------------

--
-- Table structure for table `t_absen`
--

CREATE TABLE `t_absen` (
  `kd_absen` int(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nip` varchar(9) DEFAULT NULL,
  `kd_jabatan` varchar(2) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_absen`
--

INSERT INTO `t_absen` (`kd_absen`, `tanggal`, `nip`, `kd_jabatan`, `jam_masuk`, `jam_keluar`, `keterangan`) VALUES
(6, '0000-00-00', '3', 'M1', '07:00:00', '04:00:00', 'asdadad'),
(7, '2016-10-12', '2', 'H1', '07:00:00', '07:00:00', 'dasdadadad'),
(8, '2017-01-10', '1', 'D1', '03:45:00', '05:53:00', '32432');

-- --------------------------------------------------------

--
-- Table structure for table `t_gaji_pegawai`
--

CREATE TABLE `t_gaji_pegawai` (
  `id_gaji` int(8) NOT NULL,
  `nip` varchar(9) DEFAULT NULL,
  `status` enum('tk','k/-','k/1','k/2','k/3') NOT NULL,
  `gaji_pokok` double NOT NULL,
  `lembur` double NOT NULL,
  `peng_tahun` double NOT NULL,
  `biaya_jab` double NOT NULL,
  `bpjs_kes` double NOT NULL,
  `bpjs_ket` double NOT NULL,
  `telat_alpa` double NOT NULL,
  `ptkp` double NOT NULL,
  `total_pengu` double NOT NULL,
  `peng_kena_pajak` double NOT NULL,
  `pph_terhutang_set` double NOT NULL,
  `pph_terhutang_seb` double NOT NULL,
  `bulan` varchar(30) DEFAULT NULL,
  `tahun` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_gaji_pegawai`
--

INSERT INTO `t_gaji_pegawai` (`id_gaji`, `nip`, `status`, `gaji_pokok`, `lembur`, `peng_tahun`, `biaya_jab`, `bpjs_kes`, `bpjs_ket`, `telat_alpa`, `ptkp`, `total_pengu`, `peng_kena_pajak`, `pph_terhutang_set`, `pph_terhutang_seb`, `bulan`, `tahun`) VALUES
(7, '1', 'tk', 10000000, 0, 120000000, 6000000, 47250, 351250, 0, 36000000, 42398500, 77601500, 6640225, 553352.08333333, 'September', '2016'),
(8, '2', 'tk', 5000000, 500000, 60500000, 2000000, 50000, 50000, 50000, 36000000, 38150000, 22350000, -1647500, -137291.66666667, 'September', '2016'),
(9, '3', 'tk', 8000000, 0, 96500000, 6000000, 50000, 50000, 50000, 36000000, 42150000, 54350000, 3152500, 262708.33333333, 'September', '2016'),
(10, '1', 'tk', 8000000, 0, 96000000, 6000000, 50000, 50000, 0, 36000000, 42100000, 53900000, 3085000, 257083.33333333, 'October', '2016'),
(11, '2', 'k/-', 5000000, 0, 60000000, 6000000, 200000, 200000, 0, 39000000, 45400000, 14600000, -2810000, -234166.66666667, 'October', '2016'),
(12, '1', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -5000000, -416666.66666667, 'October', '2016'),
(13, '3', 'tk', 8000000, 0, 96500000, 500000, 50000, 50000, 50000, 36000000, 36650000, 59850000, 3977500, 331458.33333333, 'October', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `t_jabatan`
--

CREATE TABLE `t_jabatan` (
  `kd_jabatan` varchar(2) NOT NULL,
  `nama_jabatan` varchar(25) DEFAULT NULL,
  `tunjangan_jabatan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jabatan`
--

INSERT INTO `t_jabatan` (`kd_jabatan`, `nama_jabatan`, `tunjangan_jabatan`) VALUES
('D1', 'Direktur Keuangan', 3000000),
('H1', 'HRD ', 1500000),
('M1', 'Manajer Produksi', 4000000);

-- --------------------------------------------------------

--
-- Table structure for table `t_pegawai`
--

CREATE TABLE `t_pegawai` (
  `nip` varchar(9) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `s_kerja` enum('Tetap','Kontrak','Magang') DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_berakhir` date DEFAULT NULL,
  `no_ktp` varchar(16) DEFAULT NULL,
  `npwp` varchar(15) DEFAULT NULL,
  `kd_bank` int(11) DEFAULT NULL,
  `no_rek` varchar(15) DEFAULT NULL,
  `kd_jabatan` varchar(2) DEFAULT NULL,
  `n_hp` varchar(14) DEFAULT NULL,
  `jk` enum('Perempuan','Laki-Laki') DEFAULT NULL,
  `tempat_lahir` varchar(25) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pegawai`
--

INSERT INTO `t_pegawai` (`nip`, `nama`, `s_kerja`, `tgl_masuk`, `tgl_berakhir`, `no_ktp`, `npwp`, `kd_bank`, `no_rek`, `kd_jabatan`, `n_hp`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `foto`) VALUES
('1', 'rusdi noor firdaus', 'Tetap', '2016-09-15', '0000-00-00', '12345', '3456', 3, '1234567', 'D1', '0856-1245-6789', 'Laki-Laki', 'karawang', '1996-06-07', 'tubagus', '14606334_1092564307447481_314833054977647772_n.jpg'),
('10114425', 'Reza Yogi Andria', 'Tetap', '2016-08-01', '2017-08-01', '3211150111960002', '1231231231231', 3, '1231231231', 'D1', '0856-2424-9435', 'Laki-Laki', 'Bandung', '1996-11-01', 'Jl. Kartika X Blok AC No. 10', '3.jpg'),
('2', 'Rahmad K', 'Tetap', '2016-08-30', '2016-08-29', '234', '23424', 5, '64564', 'D1', '0854-6789-5462', 'Laki-Laki', 'Aceh', '1945-07-12', 'sekeloa', '1276749_10200583660893191_77735583_o.jpg'),
('3', 'Indra Handika', 'Tetap', '2016-08-29', '0000-00-00', '2345', '4567', 3, '3456', 'M1', '0857-6456-8245', 'Laki-Laki', 'Bandung', '1989-06-29', 'Tegal Lega', '555297_10201239277095841_1248772161_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(32) NOT NULL,
  `level` int(11) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `nip` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `email`, `level`, `foto`, `nip`) VALUES
(1, 'rusdi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'rusdi noor firdaus', 'rusdi_noorfirdaus@yahoo.com', 1, '14606334_1092564307447481_314833054977647772_n.jpg', '1'),
(2, 'rahmad', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Rahmad K', 'rahmad@yahoo.com', 1, '1276749_10200583660893191_77735583_o.jpg', '2'),
(3, 'indra', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Indra Handika', 'indra@yahoo.com', 2, '555297_10201239277095841_1248772161_n.jpg', '3'),
(4, 'andriayogi', '42525bb6d3b0dc06bb78ae548733e8fbb55446b3', 'Reza Yogi Andria', 'andriayogi01@gmail.com', 1, '3.jpg', '10114425');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `k_t_bank`
--
ALTER TABLE `k_t_bank`
  ADD PRIMARY KEY (`kd_bank`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`kd_pengumuman`);

--
-- Indexes for table `slip_gaji`
--
ALTER TABLE `slip_gaji`
  ADD PRIMARY KEY (`id_slip`),
  ADD KEY `id_gaji` (`id_gaji`);

--
-- Indexes for table `t_absen`
--
ALTER TABLE `t_absen`
  ADD PRIMARY KEY (`kd_absen`),
  ADD KEY `nip` (`kd_jabatan`),
  ADD KEY `nip_2` (`nip`);

--
-- Indexes for table `t_gaji_pegawai`
--
ALTER TABLE `t_gaji_pegawai`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `t_jabatan`
--
ALTER TABLE `t_jabatan`
  ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indexes for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `kd_jabatan` (`kd_jabatan`),
  ADD KEY `kd_bank` (`kd_bank`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `k_t_bank`
--
ALTER TABLE `k_t_bank`
  MODIFY `kd_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `kd_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `slip_gaji`
--
ALTER TABLE `slip_gaji`
  MODIFY `id_slip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_absen`
--
ALTER TABLE `t_absen`
  MODIFY `kd_absen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_gaji_pegawai`
--
ALTER TABLE `t_gaji_pegawai`
  MODIFY `id_gaji` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `slip_gaji`
--
ALTER TABLE `slip_gaji`
  ADD CONSTRAINT `slip_gaji_ibfk_1` FOREIGN KEY (`id_gaji`) REFERENCES `t_gaji_pegawai` (`id_gaji`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_absen`
--
ALTER TABLE `t_absen`
  ADD CONSTRAINT `t_absen_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `t_pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_absen_ibfk_2` FOREIGN KEY (`kd_jabatan`) REFERENCES `t_jabatan` (`kd_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_gaji_pegawai`
--
ALTER TABLE `t_gaji_pegawai`
  ADD CONSTRAINT `t_gaji_pegawai_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `t_pegawai` (`nip`);

--
-- Constraints for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD CONSTRAINT `t_pegawai_ibfk_2` FOREIGN KEY (`kd_jabatan`) REFERENCES `t_jabatan` (`kd_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_pegawai_ibfk_3` FOREIGN KEY (`kd_bank`) REFERENCES `k_t_bank` (`kd_bank`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `t_pegawai` (`nip`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
