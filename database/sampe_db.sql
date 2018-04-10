-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2018 at 01:42 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `AUDITOR`
--

CREATE TABLE `AUDITOR` (
  `PK_AUDITOR` int(11) NOT NULL,
  `NIP` varchar(50) DEFAULT NULL,
  `FK_PENDIDIKAN_AUDITOR` int(11) DEFAULT NULL,
  `FK_JABATAN` int(11) DEFAULT NULL,
  `FK_PANGKAT_GOLONGAN` int(11) DEFAULT NULL,
  `FK_SERTIKASI_JFA` int(11) DEFAULT NULL,
  `NAMA_LENGKAP` varchar(255) DEFAULT NULL,
  `GELAR_DEPAN` varchar(50) DEFAULT NULL,
  `GELAR_BELAKANG` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(100) DEFAULT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  `JENIS_KELAMIN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `JABATAN`
--

CREATE TABLE `JABATAN` (
  `PK_JABATAN` int(11) NOT NULL,
  `JFA_NAMA` varchar(150) DEFAULT NULL,
  `JENJANG_JFA_NAMA` varchar(150) DEFAULT NULL,
  `JABATAN_NO_SURAT_KEPUTUSAN` varchar(150) DEFAULT NULL,
  `JABATAN_TGL_SURAT_KEPUTUSAN` date DEFAULT NULL,
  `JABATAN_TGL_MULAI_TUGAS` date DEFAULT NULL,
  `JABATAN_SK` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lookup`
--

CREATE TABLE `lookup` (
  `PK_LOOKUP` int(11) NOT NULL,
  `IS_ACTIVE` int(11) DEFAULT NULL,
  `CODE` varchar(255) DEFAULT NULL,
  `DESCR` varchar(255) DEFAULT NULL,
  `LOOKUP_GROUP` varchar(255) DEFAULT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `ORDER_NO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lookup`
--

INSERT INTO `lookup` (`PK_LOOKUP`, `IS_ACTIVE`, `CODE`, `DESCR`, `LOOKUP_GROUP`, `NAME`, `ORDER_NO`) VALUES
(2, 1, 'ADMIN', 'ADMIN', 'USER_ROLE', 'ADMIN', 1),
(3, 1, 'AUDITOR', 'AUDITOR', 'USER_ROLE', 'AUDITOR', 1),
(4, 1, 'WIDYASWARA', 'WIDYASWARA', 'USER_ROLE', 'WIDYASWARA', 1),
(5, 1, 'PUSBIN', 'PUSBIN', 'USER_ROLE', 'PUSBIN', 1),
(6, 1, 'UNIT_APIP', 'UNIT_APIP', 'USER_ROLE', 'UNIT_APIP', 1),
(7, 1, 'URITOKEN', 'https://ayocoba.in/dca-api/api/viewtoken', 'URL_API', 'URITOKEN', 1),
(8, 1, 'USER_API_DC', 'dummy|dummy123', 'USER_ACCESS_API', 'nama|kata_sandi', 1),
(9, 1, 'USER_API_IN', 'BPKP|$2y$10$ANoVQFnXgwHi.GuA7oCbl.Pub9F0AyWpt0LodR2kKKWEkD07RnGTG', 'USER_ACCESS_API', 'USER_API_IN', 2),
(10, 1, 'SECRET_KEY_IN', 'c1pt4493uNgM4Hd14r73', 'SECRET_KEY', 'SECRET_KEY_IN', 1),
(11, 1, 'BPKP', 'BPKP', 'USER_ROLE', 'BPKP', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lookup_group`
--

CREATE TABLE `lookup_group` (
  `LOOKUP_GROUP` varchar(255) DEFAULT NULL,
  `GROUP_DESCR` varchar(255) DEFAULT NULL,
  `IS_UPDATABLE` int(11) DEFAULT NULL,
  `IS_VIEWABLE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lookup_group`
--

INSERT INTO `lookup_group` (`LOOKUP_GROUP`, `GROUP_DESCR`, `IS_UPDATABLE`, `IS_VIEWABLE`) VALUES
('USER_ROLE', 'USER_ROLE', 1, 1),
('URL_API', 'URL_API', 1, 1),
('SECRET_KEY', 'SECRET_KEY', 1, 1),
('USER_ACCESS_API', 'USER_ACCESS_API', 1, 1),
('SECRET_KEY', 'SECRET_KEY', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_page`
--

CREATE TABLE `menu_page` (
  `PK_MENU_PAGE` int(11) NOT NULL,
  `MENU_NAME` varchar(100) NOT NULL,
  `MENU_MAIN` varchar(100) NOT NULL,
  `MENU_URL` varchar(200) NOT NULL,
  `MENU_CREATED_BY` varchar(100) NOT NULL,
  `MENU_CREATED_DATE` date NOT NULL,
  `MENU_ICON` varchar(100) NOT NULL,
  `FK_LOOKUP_MENU` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_page`
--

INSERT INTO `menu_page` (`PK_MENU_PAGE`, `MENU_NAME`, `MENU_MAIN`, `MENU_URL`, `MENU_CREATED_BY`, `MENU_CREATED_DATE`, `MENU_ICON`, `FK_LOOKUP_MENU`) VALUES
(1, 'auditor', 'auditor', 'sertifikasi/auditor', 'admin', '2018-03-29', '', 3),
(2, 'admin', 'admin', 'sertifikasi/admin', 'admin', '2018-03-29', '', 2),
(3, 'widyaiswara', 'widyaiswara', 'sertifikasi/widyaiswara', 'admin', '2018-03-29', '', 4),
(4, 'pusbin', 'pusbin', 'sertifikasi/pusbin', 'admin', '2018-03-29', '', 5),
(5, 'unit_apip', 'unit_apip', 'sertifikasi/unit_apip', 'admin', '2018-03-29', '', 6),
(6, 'Home', 'auditor', 'auditor/home', 'admin', '2018-03-29', 'home', 3),
(7, 'Riwayat Ujian', 'auditor', 'auditor/RiwayatUjian', 'admin', '2018-03-29', 'book', 3),
(8, 'Ujian Sertifikasi', 'auditor', 'auditor/UjianSertifikasi', 'admin', '2018-03-29', 'pencil', 3),
(9, 'unit_apip', 'unit_apip', 'sertifikasi/unit_apip', 'admin', '2018-03-29', '', 6),
(10, 'Home', 'unit_apip', 'unit_apip/home', 'admin', '2018-03-29', 'home', 6),
(11, 'Registrasi', 'unit_apip', 'unit_apip/Registrasi', 'admin', '2018-03-29', 'registered', 6),
(13, 'Komponen Nilai', 'unit_apip', 'unit_apip/KomponenNilai', 'admin', '2018-03-29', '', 6),
(14, 'Hasil Ujian', 'unit_apip', 'unit_apip/HasilUjian', 'admin', '2018-03-29', '', 6),
(15, 'Fasilitas Pengangkatan', 'unit_apip', 'unit_apip/FasilitasPengangkatan', 'admin', '2018-03-29', '', 6),
(16, 'Home', 'pusbin', 'pusbin/home', 'admin', '2018-03-29', '', 5),
(17, 'Fasilitas Pengangkatan', 'pusbin', 'pusbin/FasilitasPengangkatan', 'admin', '2018-03-29', '', 5),
(18, 'Bank Soal', 'pusbin', 'pusbin/BankSoal', 'admin', '2018-03-29', '', 5),
(19, 'Verifikasi Nilai WI/PPK', 'pusbin', 'pusbin/Verifikasi', 'admin', '2018-03-29', '', 5),
(20, 'Hasil Ujian', 'pusbin', 'pusbin/HasilUjian', 'admin', '2018-03-29', '', 5),
(21, 'Nilai WI', 'widyaiswara', 'widyaiswara/Nilai', 'admin', '2018-03-29', '', 4),
(22, 'home', 'bpkp', 'bpkp/home', 'admin', '2018-03-29', 'home', 11),
(23, 'Registrasi Perwakilan BPKP', 'pusbin', 'pusbin/registrasi', 'admin', '2018-03-29', '', 5),
(24, 'bpkp', 'bpkp', 'sertifikasi/bpkp', 'admin', '2018-03-29', '', 11),
(25, 'Registrasi Unit Apip', 'bpkp', 'bpkp/registrasi', 'admin', '2018-03-29', 'registered', 11);

-- --------------------------------------------------------

--
-- Table structure for table `menu_page_detail`
--

CREATE TABLE `menu_page_detail` (
  `PK_MENU_DETAIL` int(11) NOT NULL,
  `MENU_NAME` varchar(50) NOT NULL,
  `MENU_URL` varchar(100) NOT NULL,
  `DETAIL_CREATED_BY` varchar(50) NOT NULL,
  `DETAIL_CREATED_DATE` date NOT NULL,
  `MENU_ICON` varchar(100) NOT NULL,
  `FK_MENU_PAGE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_page_detail`
--

INSERT INTO `menu_page_detail` (`PK_MENU_DETAIL`, `MENU_NAME`, `MENU_URL`, `DETAIL_CREATED_BY`, `DETAIL_CREATED_DATE`, `MENU_ICON`, `FK_MENU_PAGE`) VALUES
(1, 'Dashboard', 'dashboard.php', 'admin', '2018-03-26', '', 1),
(2, 'Ujian', 'ujian.php', 'admin', '2018-03-26', '', 1),
(3, 'Riwayat Ujian', 'riwayat_ujian.php', 'admin', '2018-03-26', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `PANGKAT_GOLONGAN`
--

CREATE TABLE `PANGKAT_GOLONGAN` (
  `PK_PANGKAT_GOLONGAN` int(11) NOT NULL,
  `GOLONGAN_RUANG_NAMA` varchar(150) DEFAULT NULL,
  `GOLONGAN_RUANG_DESKRIPSI` varchar(255) DEFAULT NULL,
  `PANGKAT_NO_SURAT_KEPUTUSAN` varchar(150) DEFAULT NULL,
  `PANGKAT_TGL_SURAT_KEPUTUSAN` date DEFAULT NULL,
  `JABATAN_TGL_MULAI_TUGAS` date DEFAULT NULL,
  `PANGKAT_SK` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PENDIDIKAN_AUDITOR`
--

CREATE TABLE `PENDIDIKAN_AUDITOR` (
  `PK_PENDIDIKAN_AUDITOR` int(11) NOT NULL,
  `TINGKAT` varchar(50) DEFAULT NULL,
  `LEMBAGA` varchar(150) DEFAULT NULL,
  `JURUSAN` varchar(50) DEFAULT NULL,
  `IJAZAH` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PERWAKILAN_BPKP`
--

CREATE TABLE `PERWAKILAN_BPKP` (
  `PK_PERWAKILAN_BPKP` int(11) NOT NULL,
  `NIP` varchar(150) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `PROVINSI` varchar(50) NOT NULL,
  `FK_LOOKUP_ADMIN_BPKP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PROVINSI`
--

CREATE TABLE `PROVINSI` (
  `PK_PROVINSI` int(11) NOT NULL,
  `NAMA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PROVINSI`
--

INSERT INTO `PROVINSI` (`PK_PROVINSI`, `NAMA`) VALUES
(1, 'DKI JAKARTA'),
(2, 'JAWA BARAT');

-- --------------------------------------------------------

--
-- Table structure for table `PUSBIN`
--

CREATE TABLE `PUSBIN` (
  `PK_PUSBIN` int(11) NOT NULL,
  `NIP` varchar(150) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `FK_LOOKUP_ADMIN_PUSBIN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SERTIFIKASI_JFA`
--

CREATE TABLE `SERTIFIKASI_JFA` (
  `PK_SERTIFIKASI` int(11) NOT NULL,
  `SERTIFIKASI_SERTIFIKAT` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UNIT_APIP`
--

CREATE TABLE `UNIT_APIP` (
  `PK_UNIT_APIP` int(11) NOT NULL,
  `NIP` varchar(150) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `PK_USER` int(11) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `USER_PASSWORD` varchar(100) NOT NULL,
  `FK_LOOKUP_ROLE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`PK_USER`, `USER_NAME`, `USER_PASSWORD`, `FK_LOOKUP_ROLE`) VALUES
(1, 'auditor', 'CDkaHSZYVXUWH9uwCk7+ShWI/MR1BsZn+UIhdox4A2Q2wVlh7quSMqg9Bd5zVoZS/zvQDi8ZR4Z/fcWrhbjXbg==', 3),
(2, 'admin', 'CDkaHSZYVXUWH9uwCk7+ShWI/MR1BsZn+UIhdox4A2Q2wVlh7quSMqg9Bd5zVoZS/zvQDi8ZR4Z/fcWrhbjXbg==', 2),
(3, 'widyaiswara', 'CDkaHSZYVXUWH9uwCk7+ShWI/MR1BsZn+UIhdox4A2Q2wVlh7quSMqg9Bd5zVoZS/zvQDi8ZR4Z/fcWrhbjXbg==', 4),
(4, 'pusbin', 'CDkaHSZYVXUWH9uwCk7+ShWI/MR1BsZn+UIhdox4A2Q2wVlh7quSMqg9Bd5zVoZS/zvQDi8ZR4Z/fcWrhbjXbg==', 5),
(5, 'unit_apip', 'CDkaHSZYVXUWH9uwCk7+ShWI/MR1BsZn+UIhdox4A2Q2wVlh7quSMqg9Bd5zVoZS/zvQDi8ZR4Z/fcWrhbjXbg==', 6),
(6, 'bpkp', 'CDkaHSZYVXUWH9uwCk7+ShWI/MR1BsZn+UIhdox4A2Q2wVlh7quSMqg9Bd5zVoZS/zvQDi8ZR4Z/fcWrhbjXbg==', 11);

-- --------------------------------------------------------

--
-- Table structure for table `WIDYAISWARA`
--

CREATE TABLE `WIDYAISWARA` (
  `PK_WIDYAISWARA` int(11) NOT NULL,
  `NIP` varchar(150) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `WILAYAH`
--

CREATE TABLE `WILAYAH` (
  `PK_WILAYAH` int(11) NOT NULL,
  `NAMA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lookup`
--
ALTER TABLE `lookup`
  ADD PRIMARY KEY (`PK_LOOKUP`);

--
-- Indexes for table `menu_page`
--
ALTER TABLE `menu_page`
  ADD PRIMARY KEY (`PK_MENU_PAGE`),
  ADD KEY `FK_LOOKUP_MENU` (`FK_LOOKUP_MENU`);

--
-- Indexes for table `menu_page_detail`
--
ALTER TABLE `menu_page_detail`
  ADD PRIMARY KEY (`PK_MENU_DETAIL`),
  ADD KEY `FK_MENU_PAGE` (`FK_MENU_PAGE`) USING BTREE;

--
-- Indexes for table `PERWAKILAN_BPKP`
--
ALTER TABLE `PERWAKILAN_BPKP`
  ADD PRIMARY KEY (`PK_PERWAKILAN_BPKP`);

--
-- Indexes for table `PROVINSI`
--
ALTER TABLE `PROVINSI`
  ADD PRIMARY KEY (`PK_PROVINSI`);

--
-- Indexes for table `PUSBIN`
--
ALTER TABLE `PUSBIN`
  ADD PRIMARY KEY (`PK_PUSBIN`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`PK_USER`),
  ADD KEY `FK_LOOKUP_ROLE` (`FK_LOOKUP_ROLE`);

--
-- Indexes for table `WILAYAH`
--
ALTER TABLE `WILAYAH`
  ADD PRIMARY KEY (`PK_WILAYAH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_page_detail`
--
ALTER TABLE `menu_page_detail`
  MODIFY `PK_MENU_DETAIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `PERWAKILAN_BPKP`
--
ALTER TABLE `PERWAKILAN_BPKP`
  MODIFY `PK_PERWAKILAN_BPKP` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PROVINSI`
--
ALTER TABLE `PROVINSI`
  MODIFY `PK_PROVINSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `WILAYAH`
--
ALTER TABLE `WILAYAH`
  MODIFY `PK_WILAYAH` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_page`
--
ALTER TABLE `menu_page`
  ADD CONSTRAINT `menu_page_ibfk_1` FOREIGN KEY (`FK_LOOKUP_MENU`) REFERENCES `lookup` (`PK_LOOKUP`);

--
-- Constraints for table `menu_page_detail`
--
ALTER TABLE `menu_page_detail`
  ADD CONSTRAINT `menu_page_relat` FOREIGN KEY (`FK_MENU_PAGE`) REFERENCES `menu_page` (`PK_MENU_PAGE`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`FK_LOOKUP_ROLE`) REFERENCES `lookup` (`PK_LOOKUP`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
