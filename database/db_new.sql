-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2018 at 09:32 AM
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
-- Table structure for table `auditor`
--

CREATE TABLE `auditor` (
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
-- Table structure for table `bab_mata_ajar`
--

CREATE TABLE `bab_mata_ajar` (
  `PK_BAB_MATA_AJAR` int(11) NOT NULL,
  `FK_MATA_AJAR` int(11) NOT NULL,
  `NAMA_BAB_MATA_AJAR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bab_mata_ajar`
--

INSERT INTO `bab_mata_ajar` (`PK_BAB_MATA_AJAR`, `FK_MATA_AJAR`, `NAMA_BAB_MATA_AJAR`) VALUES
(9, 5, 'Dasar Auditor');

-- --------------------------------------------------------

--
-- Table structure for table `bridge_lookup`
--

CREATE TABLE `bridge_lookup` (
  `id_bridge_lookup` int(11) NOT NULL,
  `PK_LOOKUP` int(11) NOT NULL,
  `ROLEGROUPID` int(11) NOT NULL,
  `ROLE_CODE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bridge_lookup`
--

INSERT INTO `bridge_lookup` (`id_bridge_lookup`, `PK_LOOKUP`, `ROLEGROUPID`, `ROLE_CODE`) VALUES
(1, 3, 4, 'Auditor'),
(2, 6, 15, 'AdminUnitKerja'),
(3, 5, 1, 'Eselon1'),
(4, 4, 1, 'Sekretariat'),
(5, 4, 1, 'Penilai'),
(6, 4, 1, 'KetuaPenilai'),
(7, 11, 14, 'BPKP'),
(8, 5, 3, 'PejabatPengusul');

-- --------------------------------------------------------

--
-- Table structure for table `group_mata_ajar`
--

CREATE TABLE `group_mata_ajar` (
  `PK_GROUP_MATA_AJAR` int(11) NOT NULL,
  `NAMA_GROUP_MATA_AJAR` varchar(255) NOT NULL,
  `FK_LOOKUP_DIKLAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_mata_ajar`
--

INSERT INTO `group_mata_ajar` (`PK_GROUP_MATA_AJAR`, `NAMA_GROUP_MATA_AJAR`, `FK_LOOKUP_DIKLAT`) VALUES
(1, 'Auditor Utama', 16),
(2, 'Auditor Ahli', 17);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
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
(1, 1, 'BANK_SOAL', 'BANK_SOAL', 'USER_ROLE', 'BANK_SOAL', 3),
(2, 1, 'ADMIN', 'ADMIN', 'USER_ROLE', 'ADMIN', 1),
(3, 1, 'AUDITOR', 'AUDITOR', 'USER_ROLE', 'AUDITOR', 2),
(4, 1, 'WIDYASWARA', 'WIDYASWARA', 'USER_ROLE', 'WIDYASWARA', 6),
(5, 1, 'PUSBIN', 'PUSBIN', 'USER_ROLE', 'PUSBIN', 4),
(6, 1, 'UNIT_APIP', 'UNIT_APIP', 'USER_ROLE', 'UNIT_APIP', 5),
(7, 1, 'URITOKEN', 'https://ayocoba.in/dca-api/api/viewtoken', 'URL_API', 'URITOKEN', 1),
(8, 1, 'USER_API_DC', 'dummy|dummy123', 'USER_ACCESS_API', 'nama|kata_sandi', 1),
(9, 1, 'USER_API_IN', 'BPKP|$2y$10$ANoVQFnXgwHi.GuA7oCbl.Pub9F0AyWpt0LodR2kKKWEkD07RnGTG', 'USER_ACCESS_API', 'USER_API_IN', 2),
(10, 1, 'SECRET_KEY_IN', 'c1pt4493uNgM4Hd14r73', 'SECRET_KEY', 'SECRET_KEY_IN', 1),
(11, 1, 'BPKP', 'BPKP', 'USER_ROLE', 'BPKP', 7),
(12, 1, 'RV0', 'BELUM DIREVIEW', 'SOAL_STATUS', 'REVIEW0', 1),
(13, 1, 'RV1', 'REVIEW TAHAP 1', 'SOAL_STATUS', 'REVIEW1', 2),
(14, 1, 'RV2', 'REVIEW TAHAP 2', 'SOAL_STATUS', 'REVIEW2', 3),
(15, 1, 'RV3', 'REVIEW TAHAP 3', 'SOAL_STATUS', 'REVIEW3', 4),
(16, 1, 'DKPJ', 'Diklat Perjenjangan', 'DIKLAT_SERTIFIKASI', 'DKPJ', 1),
(17, 1, 'DKPB', 'Diklat Pembentukan', 'DIKLAT_SERTIFIKASI', 'DKPB', 2);

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
('SECRET_KEY', 'SECRET_KEY', 1, 1),
('SOAL_STATUS', 'SOAL_STATUS', 1, 1),
('DIKLAT_SERTIFIKASI', 'DIKLAT_SERTIFIKASI', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mata_ajar`
--

CREATE TABLE `mata_ajar` (
  `PK_MATA_AJAR` int(11) NOT NULL,
  `NAMA_MATA_AJAR` varchar(255) NOT NULL,
  `FK_GROUP_MATA_AJAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_ajar`
--

INSERT INTO `mata_ajar` (`PK_MATA_AJAR`, `NAMA_MATA_AJAR`, `FK_GROUP_MATA_AJAR`) VALUES
(5, 'Filosofi Audit', 1);

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
(14, 'Hasil Ujian', 'unit_apip', 'unit_apip/HasilUjian', 'admin', '2018-03-29', '', 6),
(15, 'Pengusulan Pengangkatan', 'unit_apip', 'unit_apip/PengusulanPengangkatan', 'admin', '2018-03-29', '', 6),
(16, 'Home', 'pusbin', 'pusbin/home', 'admin', '2018-03-29', '', 5),
(17, 'Fasilitas Pengangkatan', 'pusbin', 'pusbin/FasilitasPengangkatan', 'admin', '2018-03-29', '', 5),
(19, 'Verifikasi Nilai WI/PPK', 'pusbin', 'pusbin/Verifikasi', 'admin', '2018-03-29', '', 5),
(20, 'Hasil Ujian', 'pusbin', 'pusbin/HasilUjian', 'admin', '2018-03-29', '', 5),
(21, 'Nilai WI', 'widyaiswara', 'widyaiswara/Nilai', 'admin', '2018-03-29', '', 4),
(22, 'home', 'bpkp', 'bpkp/home', 'admin', '2018-03-29', 'home', 11),
(23, 'Registrasi Perwakilan BPKP', 'pusbin', 'pusbin/registrasi', 'admin', '2018-03-29', '', 5),
(24, 'bpkp', 'bpkp', 'sertifikasi/bpkp', 'admin', '2018-03-29', '', 11),
(25, 'Registrasi Unit Apip', 'bpkp', 'bpkp/registrasi', 'admin', '2018-03-29', 'registered', 11),
(26, 'bank_soal', 'bank_soal', 'sertifikasi/bank_soal', 'admin', '2018-05-07', '', 1),
(27, 'Home', 'bank_soal', 'bank_soal/home', 'admmin', '2018-05-07', 'home', 1),
(28, 'Bank Soal', 'bank_soal', 'bank_soal/AdminBankSoal', 'admin', '2018-05-07', 'key', 1),
(29, 'Management Bank Soal', 'bank_soal', 'bank_soal/ManagementBankSoal', 'admin', '2018-05-12', 'dashboard', 1);

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
-- Table structure for table `pangkat_golongan`
--

CREATE TABLE `pangkat_golongan` (
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
-- Table structure for table `pendidikan_auditor`
--

CREATE TABLE `pendidikan_auditor` (
  `PK_PENDIDIKAN_AUDITOR` int(11) NOT NULL,
  `TINGKAT` varchar(50) DEFAULT NULL,
  `LEMBAGA` varchar(150) DEFAULT NULL,
  `JURUSAN` varchar(50) DEFAULT NULL,
  `IJAZAH` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perwakilan_bpkp`
--

CREATE TABLE `perwakilan_bpkp` (
  `PK_PERWAKILAN_BPKP` int(11) NOT NULL,
  `NIP` varchar(150) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `PROVINSI` varchar(50) NOT NULL,
  `FK_LOOKUP_ADMIN_BPKP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `PK_PROVINSI` int(11) NOT NULL,
  `NAMA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`PK_PROVINSI`, `NAMA`) VALUES
(1, 'DKI JAKARTA'),
(2, 'JAWA BARAT');

-- --------------------------------------------------------

--
-- Table structure for table `pusbin`
--

CREATE TABLE `pusbin` (
  `PK_PUSBIN` int(11) NOT NULL,
  `NIP` varchar(150) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `FK_LOOKUP_ADMIN_PUSBIN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sertifikasi_jfa`
--

CREATE TABLE `sertifikasi_jfa` (
  `PK_SERTIFIKASI` int(11) NOT NULL,
  `SERTIFIKASI_SERTIFIKAT` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soal_ujian`
--

CREATE TABLE `soal_ujian` (
  `PK_SOAL_UJIAN` int(11) NOT NULL,
  `FK_BAB_MATA_AJAR` int(11) NOT NULL,
  `PARENT_SOAL` int(11) NOT NULL,
  `PERTANYAAN` varchar(1000) NOT NULL,
  `JAWABAN` varchar(10) NOT NULL,
  `PILIHAN_1` varchar(255) NOT NULL,
  `PILIHAN_2` varchar(255) NOT NULL,
  `PILIHAN_3` varchar(255) NOT NULL,
  `PILIHAN_4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal_ujian`
--

INSERT INTO `soal_ujian` (`PK_SOAL_UJIAN`, `FK_BAB_MATA_AJAR`, `PARENT_SOAL`, `PERTANYAAN`, `JAWABAN`, `PILIHAN_1`, `PILIHAN_2`, `PILIHAN_3`, `PILIHAN_4`) VALUES
(114, 9, 0, 'Siapa Nama Presiden Indonesia pertama?', '1', 'Soekarno', 'soeharto', 'megawati', 'amien rais'),
(115, 9, 0, 'Tanggal kemerdekaan indonesia?', '2', '27 Agustus 1945', '17 Agustus 1945', '10 Maret 1990', '7 Maret 1991');

-- --------------------------------------------------------

--
-- Table structure for table `unit_apip`
--

CREATE TABLE `unit_apip` (
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
(6, 'bpkp', 'CDkaHSZYVXUWH9uwCk7+ShWI/MR1BsZn+UIhdox4A2Q2wVlh7quSMqg9Bd5zVoZS/zvQDi8ZR4Z/fcWrhbjXbg==', 11),
(7, 'admin_bank', 'CDkaHSZYVXUWH9uwCk7+ShWI/MR1BsZn+UIhdox4A2Q2wVlh7quSMqg9Bd5zVoZS/zvQDi8ZR4Z/fcWrhbjXbg==', 1),
(8, 'review1', 'CDkaHSZYVXUWH9uwCk7+ShWI/MR1BsZn+UIhdox4A2Q2wVlh7quSMqg9Bd5zVoZS/zvQDi8ZR4Z/fcWrhbjXbg==', 1),
(9, 'review2', 'CDkaHSZYVXUWH9uwCk7+ShWI/MR1BsZn+UIhdox4A2Q2wVlh7quSMqg9Bd5zVoZS/zvQDi8ZR4Z/fcWrhbjXbg==', 1),
(10, 'subid', 'CDkaHSZYVXUWH9uwCk7+ShWI/MR1BsZn+UIhdox4A2Q2wVlh7quSMqg9Bd5zVoZS/zvQDi8ZR4Z/fcWrhbjXbg==', 1),
(11, 'kapus', 'CDkaHSZYVXUWH9uwCk7+ShWI/MR1BsZn+UIhdox4A2Q2wVlh7quSMqg9Bd5zVoZS/zvQDi8ZR4Z/fcWrhbjXbg==', 1);

-- --------------------------------------------------------

--
-- Table structure for table `widyaiswara`
--

CREATE TABLE `widyaiswara` (
  `PK_WIDYAISWARA` int(11) NOT NULL,
  `NIP` varchar(150) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `PK_WILAYAH` int(11) NOT NULL,
  `NAMA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bab_mata_ajar`
--
ALTER TABLE `bab_mata_ajar`
  ADD PRIMARY KEY (`PK_BAB_MATA_AJAR`),
  ADD KEY `CN_BAB_MATA_AJAR` (`FK_MATA_AJAR`);

--
-- Indexes for table `bridge_lookup`
--
ALTER TABLE `bridge_lookup`
  ADD PRIMARY KEY (`id_bridge_lookup`);

--
-- Indexes for table `group_mata_ajar`
--
ALTER TABLE `group_mata_ajar`
  ADD PRIMARY KEY (`PK_GROUP_MATA_AJAR`),
  ADD KEY `CN_GROUP_MATA_AJAR_LOOKUP` (`FK_LOOKUP_DIKLAT`);

--
-- Indexes for table `lookup`
--
ALTER TABLE `lookup`
  ADD PRIMARY KEY (`PK_LOOKUP`);

--
-- Indexes for table `mata_ajar`
--
ALTER TABLE `mata_ajar`
  ADD PRIMARY KEY (`PK_MATA_AJAR`),
  ADD KEY `CN_MATA_AJAR_GROUP_MATA_AJAR` (`FK_GROUP_MATA_AJAR`);

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
-- Indexes for table `perwakilan_bpkp`
--
ALTER TABLE `perwakilan_bpkp`
  ADD PRIMARY KEY (`PK_PERWAKILAN_BPKP`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`PK_PROVINSI`);

--
-- Indexes for table `pusbin`
--
ALTER TABLE `pusbin`
  ADD PRIMARY KEY (`PK_PUSBIN`);

--
-- Indexes for table `soal_ujian`
--
ALTER TABLE `soal_ujian`
  ADD PRIMARY KEY (`PK_SOAL_UJIAN`),
  ADD KEY `CN_SOAL_BAB_MATA_AJAR` (`FK_BAB_MATA_AJAR`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`PK_USER`),
  ADD KEY `FK_LOOKUP_ROLE` (`FK_LOOKUP_ROLE`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`PK_WILAYAH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bab_mata_ajar`
--
ALTER TABLE `bab_mata_ajar`
  MODIFY `PK_BAB_MATA_AJAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bridge_lookup`
--
ALTER TABLE `bridge_lookup`
  MODIFY `id_bridge_lookup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `group_mata_ajar`
--
ALTER TABLE `group_mata_ajar`
  MODIFY `PK_GROUP_MATA_AJAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mata_ajar`
--
ALTER TABLE `mata_ajar`
  MODIFY `PK_MATA_AJAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu_page_detail`
--
ALTER TABLE `menu_page_detail`
  MODIFY `PK_MENU_DETAIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `perwakilan_bpkp`
--
ALTER TABLE `perwakilan_bpkp`
  MODIFY `PK_PERWAKILAN_BPKP` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `PK_PROVINSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `soal_ujian`
--
ALTER TABLE `soal_ujian`
  MODIFY `PK_SOAL_UJIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `PK_WILAYAH` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bab_mata_ajar`
--
ALTER TABLE `bab_mata_ajar`
  ADD CONSTRAINT `CN_BAB_MATA_AJAR` FOREIGN KEY (`FK_MATA_AJAR`) REFERENCES `mata_ajar` (`PK_MATA_AJAR`);

--
-- Constraints for table `group_mata_ajar`
--
ALTER TABLE `group_mata_ajar`
  ADD CONSTRAINT `CN_GROUP_MATA_AJAR_LOOKUP` FOREIGN KEY (`FK_LOOKUP_DIKLAT`) REFERENCES `lookup` (`PK_LOOKUP`);

--
-- Constraints for table `mata_ajar`
--
ALTER TABLE `mata_ajar`
  ADD CONSTRAINT `CN_MATA_AJAR_GROUP_MATA_AJAR` FOREIGN KEY (`FK_GROUP_MATA_AJAR`) REFERENCES `group_mata_ajar` (`PK_GROUP_MATA_AJAR`);

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
-- Constraints for table `soal_ujian`
--
ALTER TABLE `soal_ujian`
  ADD CONSTRAINT `CN_SOAL_BAB_MATA_AJAR` FOREIGN KEY (`FK_BAB_MATA_AJAR`) REFERENCES `bab_mata_ajar` (`PK_BAB_MATA_AJAR`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`FK_LOOKUP_ROLE`) REFERENCES `lookup` (`PK_LOOKUP`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
