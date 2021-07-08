-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 12:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim-pns_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` varchar(5) NOT NULL,
  `nama_bagian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES
('100', 'SUBBAG RENMIN'),
('101', 'SUBBAG DUMANSAWAS'),
('103', 'ITBID'),
('301', 'Strajemen'),
('302', 'Renprogar'),
('303', 'Dalprogar'),
('304', 'RBP'),
('401', 'Dalpers'),
('402', 'Binkar'),
('403', 'Watpers'),
('404', 'Psi'),
('9999', '');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` varchar(10) NOT NULL,
  `pangkat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `pangkat`) VALUES
('99 ', ''),
('IA', 'JURU MUDA'),
('IB', 'JURU MUDA TK. I'),
('IC', 'JURU'),
('ID', 'JURU TK. I'),
('IIA', 'PENGATUR MUDA'),
('IIB', 'PENGATUR MUDA TK. I'),
('IIC', 'PENGATUR'),
('IID', 'PENGATUR TK. I'),
('IIIA', 'PENATA MUDA'),
('IIIB', 'PENATA MUDA TK. I'),
('IIIC', 'PENATA'),
('IIID', 'PENATA TK. I'),
('IVA', 'PEMBINA'),
('IVB', 'PEMBINA TK. I'),
('IVC', 'PEMBINA UTAMA MUDA'),
('IVD', 'PEMBINA UTAMA');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(5) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('1', 'Kassubag renmin'),
('2', 'Ur Rencana'),
('3', 'Urmintu'),
('4', 'Urkeu'),
('5', 'Kassubag PNS'),
('6', 'Kassubag Dalpers'),
('7', 'Karo SDM'),
('99', '');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_keluarga` int(5) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_keluarga` varchar(255) NOT NULL,
  `nik_keluarga` varchar(255) NOT NULL,
  `tanggal_lahir_keluarga` date NOT NULL,
  `jenis_kelamin_keluarga` varchar(30) NOT NULL,
  `status_keluarga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id_keluarga`, `nip`, `nama_keluarga`, `nik_keluarga`, `tanggal_lahir_keluarga`, `jenis_kelamin_keluarga`, `status_keluarga`) VALUES
(11, '1817051027', 'Harsoyo', '1842112412412412321', '1977-04-12', 'Laki-laki', 'Ayah');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(21) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` set('laki-laki','perempuan') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tanggal_pengangkatan` date DEFAULT NULL,
  `profil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nik`, `nama_pegawai`, `ttl`, `tempat_lahir`, `alamat`, `jenis_kelamin`, `agama`, `tanggal_pengangkatan`, `profil`) VALUES
('1', '11', 'Azizal Haddad', '2000-06-14', 'Krui', 'Krui', 'laki-laki', 'ISLAM', '2021-04-14', '1619679229_21c51d56f9c612e40c3d.png'),
('1.8790123195012E+18', '18100123009901', 'Burhan', '1999-01-12', 'wonosari', 'wonosobo', 'laki-laki', 'islam', '2021-02-12', 'fafs'),
('1817051027', '1999122209213211', 'Andhika Kurniawan', '1999-12-22', 'Gadingrejo', 'Wonosari', 'laki-laki', 'ISLAM', '2021-03-27', '1617019115_e8b286b44fe741e3d708.jpeg'),
('1875823718275742001', '182748003284001', 'SUTEJO, S.Pd', '1987-12-02', 'TELUK BETUNG', 'TELUK BETUNG', 'laki-laki', 'ISLAM', NULL, NULL),
('1966857619992875001', '1810012008700002', 'H Sujana, S.Pd.', '1998-03-19', 'Gedong Meneng', 'Gedong Meneng', 'perempuan', 'PROTESTAN', NULL, NULL),
('1976122220000121001', '1810022008700002', 'Drs. Nono Mardono', '1976-11-23', 'Majalengka', 'Bandar lampung', 'laki-laki', 'ISLAM', NULL, NULL),
('1988123319991232001', '1810022008600002', 'Hendi Suhendi', '1989-06-27', 'Tanggerang', 'Tanggerang', 'laki-laki', 'ISLAM', NULL, NULL),
('198923852010238423', '1810022008701002', 'Aan Jannah, S.pd', '2021-04-08', 'Cikarang', 'Cengkareng', 'laki-laki', 'PROTESTAN', NULL, NULL),
('1999122220101222001', '181001028001', 'Muhammad Irfan', '1969-12-31', 'Gading', 'pringsewu', 'laki-laki', 'islam', '1969-12-31', NULL),
('admin', 'ADMIN', 'ADMIN', '2021-02-03', 'ADMIN', 'ADMIN', 'laki-laki', 'ISLAM', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_dikbangspes`
--

CREATE TABLE `riwayat_dikbangspes` (
  `id_riwayat_dikbangspes` int(5) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama_dikbangspes` varchar(255) NOT NULL,
  `tahun_lulus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_dikbangum`
--

CREATE TABLE `riwayat_dikbangum` (
  `id_riwayat_dikbangum` int(5) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama_dikbangum` varchar(255) NOT NULL,
  `tahun_lulus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_dikpol`
--

CREATE TABLE `riwayat_dikpol` (
  `id_riwayat_dikpol` int(5) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama_dikpol` varchar(255) NOT NULL,
  `tahun_lulus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_dikum`
--

CREATE TABLE `riwayat_dikum` (
  `id_riwayat_dikum` int(10) NOT NULL,
  `nip` varchar(21) NOT NULL,
  `jenjang` varchar(100) NOT NULL,
  `tahun_lulus` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_dikum`
--

INSERT INTO `riwayat_dikum` (`id_riwayat_dikum`, `nip`, `jenjang`, `tahun_lulus`) VALUES
(178, '1817051027', 'S1 Universitas Lampung - Ilmu Komputer', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_golongan`
--

CREATE TABLE `riwayat_golongan` (
  `id_riwayat_golongan` int(11) NOT NULL,
  `nip` varchar(21) NOT NULL,
  `id_golongan` varchar(10) NOT NULL,
  `periode_mulai` date DEFAULT NULL,
  `no_sk` varchar(100) DEFAULT NULL,
  `periode_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_golongan`
--

INSERT INTO `riwayat_golongan` (`id_riwayat_golongan`, `nip`, `id_golongan`, `periode_mulai`, `no_sk`, `periode_selesai`) VALUES
(51, '1817051027', 'IIB', '2010-11-12', 'SK Golongan 1', '0000-00-00'),
(55, '1976122220000121001', 'IIIB', '1000-10-01', NULL, '0000-00-00'),
(56, '1988123319991232001', 'IIB', '1000-10-01', NULL, '0000-00-00'),
(57, '1966857619992875001', 'IVC', '1000-10-01', NULL, '0000-00-00'),
(58, '198923852010238423', 'IIB', '1000-10-01', NULL, '0000-00-00'),
(61, '1875823718275742001', 'IIID', '1000-10-01', NULL, '0000-00-00'),
(62, '1.8790123195012E+18', '99', NULL, NULL, '0000-00-00'),
(63, '1.8790123195012E+18', 'IA', '2000-11-11', 'sk 24', '2020-02-13'),
(67, '1.8790123195012E+18', '99', NULL, NULL, '0000-00-00'),
(73, '1', 'IIIB', '1000-10-01', NULL, '0000-00-00'),
(74, '1999122220101222001', '99', NULL, NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pekerjaan`
--

CREATE TABLE `riwayat_pekerjaan` (
  `id_riwayat_pekerjaan` int(10) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `no_sk` varchar(255) NOT NULL,
  `id_jabatan` varchar(5) NOT NULL,
  `id_satker` varchar(5) NOT NULL,
  `id_bagian` varchar(5) NOT NULL,
  `id_subbag` varchar(5) NOT NULL,
  `periode_mulai` date NOT NULL,
  `periode_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_pekerjaan`
--

INSERT INTO `riwayat_pekerjaan` (`id_riwayat_pekerjaan`, `nip`, `no_sk`, `id_jabatan`, `id_satker`, `id_bagian`, `id_subbag`, `periode_mulai`, `periode_selesai`) VALUES
(26, '1817051027', 'sk kassubbag renmin', '1', '3', '302', '30201', '2010-12-01', '0000-00-00'),
(30, '1976122220000121001', '', '1', '3', '302', '30201', '1000-01-01', '0000-00-00'),
(31, '1988123319991232001', '', '1', '4', '401', '40102', '1000-01-01', '0000-00-00'),
(32, '1966857619992875001', '', '1', '4', '402', '40202', '1000-01-01', '0000-00-00'),
(33, '198923852010238423', '', '1', '3', '302', '30201', '1000-01-01', '0000-00-00'),
(35, '1875823718275742001', '', '4', '1', '100', '10001', '1000-01-01', '0000-00-00'),
(36, '1.8790123195012E+18', '', '99', '99', '9999', '99999', '0000-00-00', '0000-00-00'),
(37, '1.8790123195012E+18', 'sk/polda/1231/A', '1', '1', '100', '10001', '1999-02-01', '2005-02-01'),
(38, '1.8790123195012E+18', 'sk/polda/1231/B', '2', '4', '401', '40101', '2007-02-01', '2020-12-01'),
(42, '1.8790123195012E+18', '', '99', '99', '9999', '99999', '0000-00-00', '0000-00-00'),
(47, '1', '', '3', '4', '401', '40101', '1000-01-01', '0000-00-00'),
(48, '1999122220101222001', '', '99', '99', '9999', '99999', '0000-00-00', '0000-00-00'),
(49, '1999122220101222001', 'sk/keputusan-01', '1', '4', '404', '40402', '1969-12-31', '1969-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `satker`
--

CREATE TABLE `satker` (
  `id_satker` varchar(5) NOT NULL,
  `nama_satker` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satker`
--

INSERT INTO `satker` (`id_satker`, `nama_satker`) VALUES
('1', 'Irwasda'),
('2', 'Roops'),
('3', 'Rorena'),
('4', 'Ro SDM'),
('99', '');

-- --------------------------------------------------------

--
-- Table structure for table `subbag`
--

CREATE TABLE `subbag` (
  `id_subbag` varchar(5) NOT NULL,
  `nama_subbag` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subbag`
--

INSERT INTO `subbag` (`id_subbag`, `nama_subbag`) VALUES
('10001', 'Subbagrenmin'),
('10002', 'Subbagdumasanwas'),
('10003', 'Itbid'),
('10101', 'UR TUDUAN'),
('10301', 'PARIK'),
('10302', 'AUDITOR'),
('30001', 'Renmin'),
('30101', 'Strabang'),
('30102', 'Sisjemen'),
('30201', 'Program'),
('30202', 'Anggaran'),
('30301', 'Dalpro'),
('30302', 'Dalgar'),
('30401', 'Sisinfolap'),
('30402', 'Jianalis'),
('40001', 'Renmin'),
('40101', 'Diapers'),
('40102', 'Seleksi'),
('40103', 'PNS'),
('40201', 'Pangkat'),
('40202', 'Kompeten'),
('40203', 'Mutjab'),
('40301', 'Rohjashor'),
('40302', 'Khirdinlur'),
('40401', 'Psipol'),
('40402', 'Psipers'),
('99999', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `nip` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`nip`, `password`, `role`, `status`) VALUES
('1', '20000614', 'user', '1'),
('1.8790123195012E+18', '19990112', 'user', '1'),
('1817051027', '19991222', 'user', '1'),
('1875823718275742001', '19871202', 'user', '1'),
('1966857619992875001', '19980319', 'user', '1'),
('1976122220000121001', '19761123', 'user', '1'),
('1988123319991232001', '19890627', 'user', '1'),
('198923852010238423', '20210408', 'user', '1'),
('1999122220101222001', '19691231', 'user', '1'),
('admin', 'admin', 'admin', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_keluarga`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `riwayat_dikbangspes`
--
ALTER TABLE `riwayat_dikbangspes`
  ADD PRIMARY KEY (`id_riwayat_dikbangspes`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `riwayat_dikbangum`
--
ALTER TABLE `riwayat_dikbangum`
  ADD PRIMARY KEY (`id_riwayat_dikbangum`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `riwayat_dikpol`
--
ALTER TABLE `riwayat_dikpol`
  ADD PRIMARY KEY (`id_riwayat_dikpol`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `riwayat_dikum`
--
ALTER TABLE `riwayat_dikum`
  ADD PRIMARY KEY (`id_riwayat_dikum`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `riwayat_golongan`
--
ALTER TABLE `riwayat_golongan`
  ADD PRIMARY KEY (`id_riwayat_golongan`),
  ADD KEY `id_golongan` (`id_golongan`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD PRIMARY KEY (`id_riwayat_pekerjaan`),
  ADD KEY `id_jabatan` (`id_jabatan`,`id_satker`,`id_bagian`,`id_subbag`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_subbag` (`id_subbag`),
  ADD KEY `id_satker` (`id_satker`),
  ADD KEY `id_bagian` (`id_bagian`);

--
-- Indexes for table `satker`
--
ALTER TABLE `satker`
  ADD PRIMARY KEY (`id_satker`);

--
-- Indexes for table `subbag`
--
ALTER TABLE `subbag`
  ADD PRIMARY KEY (`id_subbag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_keluarga` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `riwayat_dikbangspes`
--
ALTER TABLE `riwayat_dikbangspes`
  MODIFY `id_riwayat_dikbangspes` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `riwayat_dikbangum`
--
ALTER TABLE `riwayat_dikbangum`
  MODIFY `id_riwayat_dikbangum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `riwayat_dikpol`
--
ALTER TABLE `riwayat_dikpol`
  MODIFY `id_riwayat_dikpol` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `riwayat_dikum`
--
ALTER TABLE `riwayat_dikum`
  MODIFY `id_riwayat_dikum` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `riwayat_golongan`
--
ALTER TABLE `riwayat_golongan`
  MODIFY `id_riwayat_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  MODIFY `id_riwayat_pekerjaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `keluarga_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_dikbangspes`
--
ALTER TABLE `riwayat_dikbangspes`
  ADD CONSTRAINT `riwayat_dikbangspes_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_dikbangum`
--
ALTER TABLE `riwayat_dikbangum`
  ADD CONSTRAINT `riwayat_dikbangum_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_dikpol`
--
ALTER TABLE `riwayat_dikpol`
  ADD CONSTRAINT `riwayat_dikpol_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_dikum`
--
ALTER TABLE `riwayat_dikum`
  ADD CONSTRAINT `riwayat_dikum_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_golongan`
--
ALTER TABLE `riwayat_golongan`
  ADD CONSTRAINT `riwayat_golongan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_golongan_ibfk_2` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id_golongan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD CONSTRAINT `riwayat_pekerjaan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_pekerjaan_ibfk_2` FOREIGN KEY (`id_subbag`) REFERENCES `subbag` (`id_subbag`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_pekerjaan_ibfk_3` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_pekerjaan_ibfk_4` FOREIGN KEY (`id_satker`) REFERENCES `satker` (`id_satker`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_pekerjaan_ibfk_5` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
