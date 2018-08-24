-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 24, 2018 at 03:39 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `angka_kredit`
--

CREATE TABLE `angka_kredit` (
  `PK_ANGKA_KREDIT` int(11) NOT NULL,
  `FK_PENGUSUL_PENGANGKATAN` varchar(150) NOT NULL,
  `PENDIDIKAN_SEKOLAH` float NOT NULL,
  `DIKLAT` float NOT NULL,
  `PENGAWASAN` float NOT NULL,
  `PENGEMBANGAN_PROFESI` float NOT NULL,
  `PENUNJANG` float NOT NULL,
  `JUMLAH` float NOT NULL,
  `TUNJANGAN_JABATAN` float NOT NULL,
  `CREATED_BY` varchar(150) DEFAULT NULL,
  `CREATED_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angka_kredit`
--

INSERT INTO `angka_kredit` (`PK_ANGKA_KREDIT`, `FK_PENGUSUL_PENGANGKATAN`, `PENDIDIKAN_SEKOLAH`, `DIKLAT`, `PENGAWASAN`, `PENGEMBANGAN_PROFESI`, `PENUNJANG`, `JUMLAH`, `TUNJANGAN_JABATAN`, `CREATED_BY`, `CREATED_DATE`) VALUES
(1, '26', 100, 100, 100, 100, 1001, 100, 100, NULL, '2018-08-13 00:00:00'),
(2, '33', 123, 213, 23, 123, 23, 231, 23, NULL, '2018-08-24 00:00:00');

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
(1, 14, 'tester'),
(2, 26, 'tester');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `PK_BATCH` int(11) NOT NULL,
  `FK_EVENT` int(11) NOT NULL,
  `KELAS` varchar(150) NOT NULL,
  `FK_JADWAL` int(11) NOT NULL,
  `REFF` varchar(150) NOT NULL,
  `CREATED_BY` varchar(150) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`PK_BATCH`, `FK_EVENT`, `KELAS`, `FK_JADWAL`, `REFF`, `CREATED_BY`, `CREATED_DATE`) VALUES
(9, 8, 'asd', 19, 'tester', 'Pusbin Budianto', '2018-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `bridge_lookup`
--

CREATE TABLE `bridge_lookup` (
  `id_bridge_lookup` int(11) NOT NULL,
  `PK_LOOKUP` int(11) NOT NULL,
  `ROLEGROUPID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bridge_lookup`
--

INSERT INTO `bridge_lookup` (`id_bridge_lookup`, `PK_LOOKUP`, `ROLEGROUPID`) VALUES
(1, 3, 'Level 4'),
(2, 6, 'Level 3'),
(3, 5, 'Level 1'),
(7, 11, 'Level 2');

-- --------------------------------------------------------

--
-- Table structure for table `detail_permintaan_soal`
--

CREATE TABLE `detail_permintaan_soal` (
  `PK_DETAIL_PERMINTAAN_SOAL` int(11) NOT NULL,
  `FK_PERMINTAAN_SOAL` int(10) NOT NULL,
  `TUGAS` varchar(150) NOT NULL,
  `PETUGAS` varchar(100) NOT NULL,
  `COMMENT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_permintaan_soal`
--

INSERT INTO `detail_permintaan_soal` (`PK_DETAIL_PERMINTAAN_SOAL`, `FK_PERMINTAAN_SOAL`, `TUGAS`, `PETUGAS`, `COMMENT`) VALUES
(12, 20, 'pembuat_soal', 'review2', ''),
(13, 20, 'review1', 'review2', ''),
(14, 20, 'review2', 'subid', ''),
(15, 20, 'review3', 'subid', ''),
(16, 20, 'review4', 'review2', ''),
(17, 21, 'pembuat_soal', 'review1', ''),
(18, 21, 'review1', 'subid', ''),
(19, 21, 'review2', 'review2', ''),
(20, 21, 'review3', 'kapus', ''),
(21, 21, 'review4', 'review1', '');

-- --------------------------------------------------------

--
-- Table structure for table `document_pengusulan_pengangkatan`
--

CREATE TABLE `document_pengusulan_pengangkatan` (
  `PK_DOC_PENGUSULAN_PENGANGKATAN` int(11) NOT NULL,
  `STATUS_DOC` varchar(150) NOT NULL,
  `CATEGORY_DOC` varchar(100) NOT NULL,
  `DOC_PENGUSULAN_PENGANGKATAN` text NOT NULL,
  `DATA_DOC` text NOT NULL,
  `FK_PENGUSUL_PENGANGKATAN` int(11) NOT NULL,
  `CREATED_BY` varchar(150) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_pengusulan_pengangkatan`
--

INSERT INTO `document_pengusulan_pengangkatan` (`PK_DOC_PENGUSULAN_PENGANGKATAN`, `STATUS_DOC`, `CATEGORY_DOC`, `DOC_PENGUSULAN_PENGANGKATAN`, `DATA_DOC`, `FK_PENGUSUL_PENGANGKATAN`, `CREATED_BY`, `CREATED_DATE`) VALUES
(19, '', '1', 'doc_cpns', 'doc_pengangkatan/1_1110/pdf.pdf', 33, '1110', '2018-08-22'),
(20, '', '1', 'doc_pns', 'doc_pengangkatan/1_1110/pdf.pdf', 33, '1110', '2018-08-22'),
(21, '', '1', 'doc_ijazah', 'doc_pengangkatan/1_1110/pdf.pdf', 33, '1110', '2018-08-22'),
(22, '', '1', 'doc_prajab', 'doc_pengangkatan/1_1110/pdf.pdf', 33, '1110', '2018-08-22'),
(23, '', '1', 'doc_sk_diklat', 'doc_pengangkatan/1_1110/pdf.pdf', 33, '1110', '2018-08-22'),
(24, '', '1', 'doc_skp', 'doc_pengangkatan/1_1110/pdf.pdf', 33, '1110', '2018-08-22'),
(25, '', '1', 'doc_sk_lulus', 'doc_pengangkatan/1_1110/pdf.pdf', 33, '1110', '2018-08-22'),
(26, '', '1', 'doc_penugasan', 'doc_pengangkatan/1_1110/pdf.pdf', 33, '1110', '2018-08-22'),
(27, '', '1', 'doc_cpns', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 34, '1110', '2018-08-24'),
(28, '', '1', 'doc_pns', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 34, '1110', '2018-08-24'),
(29, '', '1', 'doc_ijazah', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 34, '1110', '2018-08-24'),
(30, '', '1', 'doc_prajab', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 34, '1110', '2018-08-24'),
(31, '', '1', 'doc_sk_diklat', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 34, '1110', '2018-08-24'),
(32, '', '1', 'doc_skp', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 34, '1110', '2018-08-24'),
(33, '', '1', 'doc_sk_lulus', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 34, '1110', '2018-08-24'),
(34, '', '1', 'doc_penugasan', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 34, '1110', '2018-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_persetujuan`
--

CREATE TABLE `dokumen_persetujuan` (
  `PK_PERSETUJUAN` int(11) NOT NULL,
  `GROUP_REGIS` varchar(100) NOT NULL,
  `DOKUMEN` text NOT NULL,
  `CREATED_BY` varchar(100) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen_persetujuan`
--

INSERT INTO `dokumen_persetujuan` (`PK_PERSETUJUAN`, `GROUP_REGIS`, `DOKUMEN`, `CREATED_BY`, `CREATED_DATE`) VALUES
(15, '07001500103500_180822203622', 'doc_setuju/07001500103500_180822203622_180822203622/pdf.pdf', 'Test Admin', '2018-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_registrasi_ujian`
--

CREATE TABLE `dokumen_registrasi_ujian` (
  `PK_DOC_REGIS` int(11) NOT NULL,
  `FK_REGIS_UJIAN` int(50) NOT NULL,
  `DOCUMENT` text NOT NULL,
  `DOC_NAMA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen_registrasi_ujian`
--

INSERT INTO `dokumen_registrasi_ujian` (`PK_DOC_REGIS`, `FK_REGIS_UJIAN`, `DOCUMENT`, `DOC_NAMA`) VALUES
(3, 22, 'doc_registrasi/196709271988031001_20180822/pdf.pdf', 'doc_ksp'),
(4, 22, 'doc_registrasi/196709271988031001_20180822/013104.jpg', 'doc_foto');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `PK_EVENT` int(11) NOT NULL,
  `KODE_EVENT` varchar(100) NOT NULL,
  `FK_JENJANG` int(15) NOT NULL,
  `URAIAN` text NOT NULL,
  `FK_PROVINSI` int(11) NOT NULL,
  `CREATED_BY` varchar(150) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`PK_EVENT`, `KODE_EVENT`, `FK_JENJANG`, `URAIAN`, `FK_PROVINSI`, `CREATED_BY`, `CREATED_DATE`) VALUES
(8, '61212', 6, 'tester', 13, 'Pusbin Budianto', '2018-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ujian`
--

CREATE TABLE `jadwal_ujian` (
  `PK_JADWAL_UJIAN` int(11) NOT NULL,
  `CATEGORY` varchar(150) NOT NULL,
  `START_DATE` varchar(100) NOT NULL,
  `END_DATE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_ujian`
--

INSERT INTO `jadwal_ujian` (`PK_JADWAL_UJIAN`, `CATEGORY`, `START_DATE`, `END_DATE`) VALUES
(18, 'Gelombang 3', '09/23/2018', '10/15/2018'),
(19, 'tester', '07/12/2018', '08/22/2018');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_peserta`
--

CREATE TABLE `jawaban_peserta` (
  `PK_JAWABAN_DETAIL` int(11) NOT NULL,
  `FK_EVENT` varchar(100) NOT NULL,
  `KODE_PESERTA` varchar(100) NOT NULL,
  `TGL_UJIAN` date NOT NULL,
  `KODE_SOAL` varchar(100) NOT NULL,
  `KODE_UNIT` varchar(100) NOT NULL,
  `KELAS` varchar(100) NOT NULL,
  `NO_1` varchar(10) NOT NULL,
  `NO_2` varchar(1) NOT NULL,
  `NO_3` varchar(1) NOT NULL,
  `NO_4` varchar(1) NOT NULL,
  `NO_5` varchar(1) NOT NULL,
  `NO_6` varchar(1) NOT NULL,
  `NO_7` varchar(1) NOT NULL,
  `NO_8` varchar(1) NOT NULL,
  `NO_9` varchar(1) NOT NULL,
  `NO_10` varchar(1) NOT NULL,
  `NO_11` varchar(1) NOT NULL,
  `NO_12` varchar(1) NOT NULL,
  `NO_13` varchar(1) NOT NULL,
  `NO_14` varchar(1) NOT NULL,
  `NO_15` varchar(1) NOT NULL,
  `NO_16` varchar(1) NOT NULL,
  `NO_17` varchar(1) NOT NULL,
  `NO_18` varchar(1) NOT NULL,
  `NO_19` varchar(1) NOT NULL,
  `NO_20` varchar(1) NOT NULL,
  `NO_21` varchar(1) NOT NULL,
  `NO_22` varchar(1) NOT NULL,
  `NO_23` varchar(1) NOT NULL,
  `NO_24` varchar(1) NOT NULL,
  `NO_25` varchar(1) NOT NULL,
  `NO_26` varchar(1) NOT NULL,
  `NO_27` varchar(1) NOT NULL,
  `NO_28` varchar(1) NOT NULL,
  `NO_29` varchar(1) NOT NULL,
  `NO_30` varchar(1) NOT NULL,
  `NO_31` varchar(1) NOT NULL,
  `NO_32` varchar(1) NOT NULL,
  `NO_33` varchar(1) NOT NULL,
  `NO_34` varchar(1) NOT NULL,
  `NO_35` varchar(1) NOT NULL,
  `NO_36` varchar(1) NOT NULL,
  `NO_37` varchar(1) NOT NULL,
  `NO_38` varchar(1) NOT NULL,
  `NO_39` varchar(1) NOT NULL,
  `NO_40` varchar(1) NOT NULL,
  `NO_41` varchar(1) NOT NULL,
  `NO_42` varchar(1) NOT NULL,
  `NO_43` varchar(1) NOT NULL,
  `NO_44` varchar(1) NOT NULL,
  `NO_45` varchar(1) NOT NULL,
  `NO_46` varchar(1) NOT NULL,
  `NO_47` varchar(1) NOT NULL,
  `NO_48` varchar(1) NOT NULL,
  `NO_49` varchar(1) NOT NULL,
  `NO_50` varchar(1) NOT NULL,
  `Nilai` varchar(50) NOT NULL,
  `CREATED_BY` varchar(100) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `PK_JENJANG` int(11) NOT NULL,
  `KODE_DIKLAT` int(11) NOT NULL,
  `NAMA_JENJANG` varchar(255) NOT NULL,
  `KURIKULUM` varchar(4) NOT NULL,
  `FK_LOOKUP_DIKLAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`PK_JENJANG`, `KODE_DIKLAT`, `NAMA_JENJANG`, `KURIKULUM`, `FK_LOOKUP_DIKLAT`) VALUES
(1, 6, 'Auditor Utama', '2014', 16),
(2, 2, 'Auditor Ahli', '2014', 17),
(3, 5, 'Auditor Madya', '2014', 16),
(4, 4, 'Auditor Muda', '2014', 16),
(5, 1, 'Auditor Terampil', '2014', 17),
(6, 3, 'Pindah Jalur', '2014', 17);

-- --------------------------------------------------------

--
-- Table structure for table `kode_soal`
--

CREATE TABLE `kode_soal` (
  `PK_KODE_SOAL` int(11) NOT NULL,
  `KODE_SOAL` varchar(150) NOT NULL,
  `FK_MATA_AJAR` varchar(100) NOT NULL,
  `KEBUTUHAN_SOAL` int(11) NOT NULL,
  `PUBLISH` int(11) NOT NULL,
  `CREATED_BY` varchar(100) NOT NULL,
  `CREATED_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_soal`
--

INSERT INTO `kode_soal` (`PK_KODE_SOAL`, `KODE_SOAL`, `FK_MATA_AJAR`, `KEBUTUHAN_SOAL`, `PUBLISH`, `CREATED_BY`, `CREATED_DATE`) VALUES
(1, 'c45t', '5', 30, 1, 'admin_bank', '2018-08-18 00:00:00'),
(2, '12322', '15', 212, 0, 'admin_bank', '2018-08-24 00:00:00');

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
(17, 1, 'DKPB', 'Diklat Pembentukan', 'DIKLAT_SERTIFIKASI', 'DKPB', 2),
(18, 1, 'REVIEW1', 'REVIEW 1', 'USER_ROLE', 'REVIEW1', 8),
(19, 1, 'REVIEW2', 'REVIEW 2', 'USER_ROLE', 'REVIEW2', 9),
(20, 1, 'PEMBUAT_SOAL', 'PEMBUAT SOAL', 'USER_ROLE', 'PEMBUAT_SOAL', 10),
(21, 1, 'SUBID', 'SUBID', 'USER_ROLE', 'SUBID', 11),
(22, 1, 'KAPUS', 'KAPUS', 'USER_ROLE', 'KAPUS', 12),
(23, 1, 'CREATED', 'SOAL TELAH DIBUAT', 'STATUS_PERMINTAAN', 'CREATED', 1),
(24, 1, 'PENDING', 'SOAL SEDANG DIREVIEW', 'STATUS_PERMINTAAN', 'PENDING', 2),
(25, 1, 'APPROVED', 'SOAL TELAH DISETUJUI', 'STATUS_PERMINTAAN', 'APPROVED', 3),
(26, 1, 'REJECTED', 'SOAL TIDAK DISETUJUI', 'STATUS_PERMINTAAN', 'REJECTED', 4),
(27, 1, 'UNCREATED', 'SOAL BELUM DIBUAT', 'STATUS_PERMINTAAN', 'UNCREATED', 5),
(28, 1, 'FASILITAS_PENGANGKATAN', 'Fasilitas Pengangkatan', 'USER_ROLE', 'Fasilitas Pengangkatan', 26);

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
('DIKLAT_SERTIFIKASI', 'DIKLAT_SERTIFIKASI', 1, 1),
('STATUS_PERMINTAAN', 'STATUS_PERMINTAAN', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lookup_ujian`
--

CREATE TABLE `lookup_ujian` (
  `PK_LOOKUP_REGIS` int(11) NOT NULL,
  `FK_REGIS_UJIAN` int(11) NOT NULL,
  `FK_MATA_AJAR` int(11) NOT NULL,
  `HASIL_UJIAN` varchar(100) NOT NULL,
  `CREATED_BY` varchar(150) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mata_ajar`
--

CREATE TABLE `mata_ajar` (
  `PK_MATA_AJAR` int(11) NOT NULL,
  `KODE_MATA_AJAR` int(10) NOT NULL,
  `NAMA_MATA_AJAR` varchar(255) NOT NULL,
  `FK_JENJANG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_ajar`
--

INSERT INTO `mata_ajar` (`PK_MATA_AJAR`, `KODE_MATA_AJAR`, `NAMA_MATA_AJAR`, `FK_JENJANG`) VALUES
(6, 1410, 'Kode Etik dan Standar Audit ', 5),
(7, 1420, 'Manajemen Pemerintahan Pusat I', 5),
(8, 1421, 'Manajemen Pemerintahan Daerah I', 5),
(9, 1430, 'Tata Kelola, Mjmn.Risiko & Pengendalian Intern I', 5),
(10, 1440, 'Audit Intern', 5),
(11, 1450, 'Praktik Audit Intern I', 5),
(12, 1410, 'Kode Etik dan Standar Audit Intern', 2),
(13, 1440, 'Audit Intern', 2),
(14, 1520, 'Manajemen Pemerintahan Pusat II', 2),
(15, 1521, 'Manajemen Pemerintahan Daerah II', 2),
(16, 1530, 'Tata Kelola, Mjmn.Risiko & Pengendalian Intern II', 2),
(17, 1550, 'Praktik Audit Intern II', 2),
(18, 1560, 'Komunikasi Audit Intern I', 2),
(19, 2410, 'Kepemimpinan', 4),
(20, 2420, 'Kebijakan Publik', 4),
(21, 2430, 'Tata Kelola, Mjmn.Risiko & Pengendalian Intern III', 4),
(22, 2450, 'Praktik Audit Intern III', 4),
(23, 2460, 'Komunikasi Audit Intern II', 4),
(24, 2510, 'Manajemen Konflik', 3),
(25, 2520, 'Perencanaan Penugasan Audit Intern', 3),
(26, 2530, 'Pelaksanaan dan Supervisi Audit Intern', 3),
(27, 2540, 'Analisis Kebijakan Publik', 3),
(28, 2610, 'Kebijakan Pengawasan', 1),
(29, 2620, 'Filosofi Audit', 1),
(30, 2630, 'Program Jaminan Kualitas', 1),
(31, 2640, 'Manajemen Strategi Audit Intern', 1),
(32, 2650, 'Penulisan Makalah', 1);

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
(9, 'unit_apip', 'unit_apip', 'sertifikasi/unit_apip', 'admin', '2018-03-29', '', 6),
(10, 'Home', 'unit_apip', 'unit_apip/home', 'admin', '2018-03-29', 'home', 6),
(11, 'Registrasi', 'unit_apip', 'unit_apip/Registrasi', 'admin', '2018-03-29', 'registered', 6),
(14, 'Hasil Ujian', 'unit_apip', 'unit_apip/HasilUjian', 'admin', '2018-03-29', '', 6),
(15, 'Pengusulan Pengangkatan', 'unit_apip', 'unit_apip/PengusulanPengangkatan', 'admin', '2018-03-29', '', 6),
(16, 'Home', 'pusbin', 'pusbin/home', 'admin', '2018-03-29', '', 5),
(17, 'Management Registrasi', 'pusbin', 'pusbin/ManagementRegistrasi', 'admin', '2018-03-29', '', 5),
(20, 'Management User', 'pusbin', 'pusbin/ManagementUser', 'admin', '2018-03-29', '', 5),
(21, 'Nilai WI', 'widyaiswara', 'widyaiswara/Nilai', 'admin', '2018-03-29', '', 4),
(22, 'home', 'bpkp', 'bpkp/home', 'admin', '2018-03-29', 'home', 11),
(24, 'bpkp', 'bpkp', 'sertifikasi/bpkp', 'admin', '2018-03-29', '', 11),
(25, 'Registrasi Unit Apip', 'bpkp', 'bpkp/registrasi', 'admin', '2018-03-29', 'registered', 11),
(26, 'bank_soal', 'bank_soal', 'sertifikasi/bank_soal', 'admin', '2018-05-07', '', 1),
(27, 'Home', 'bank_soal', 'bank_soal/admin/home', 'admin', '2018-05-07', 'home', 1),
(28, 'Permintaan Buat Soal', 'bank_soal', 'bank_soal/admin/AdminBankSoal', 'admin', '2018-05-07', 'key', 1),
(29, 'Management Soal', 'bank_soal', 'bank_soal/admin/ManagementBankSoal', 'admin', '2018-05-12', 'dashboard', 1),
(30, 'Perhitungan Nilai', 'pusbin', 'pusbin/PerhitunganNilai', 'admin', '2018-07-06', '', 5),
(31, 'Home', 'bank_soal', 'bank_soal/koreksi/home', 'admin', '2018-07-07', 'home', 18),
(32, 'Home', 'bank_soal', 'bank_soal/pembuat/home', 'admin', '2018-07-09', 'home', 20),
(38, 'Pengusulan Pengangkatan', 'pusbin', 'pusbin/PengusulanPengangkatan', 'admin', '2018-07-06', '', 5),
(88, 'Home', 'fasilitas', 'fasilitas/home', 'admin', '2018-03-29', 'home', 28),
(89, 'Management PERTEK', 'fasilitas', 'fasilitas/ManagementPertek', 'admin', '2018-03-29', 'home', 28);

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
-- Table structure for table `pengusul_pengangkatan`
--

CREATE TABLE `pengusul_pengangkatan` (
  `PK_PENGUSUL_PENGANGKATAN` int(30) NOT NULL,
  `NIP` varchar(50) NOT NULL,
  `DOC_SURAT_PENGUSULAN` text NOT NULL,
  `NO_SURAT` varchar(100) NOT NULL,
  `FK_STATUS_PENGUSUL_PENGANGKATAN` int(11) NOT NULL,
  `FK_STATUS_DOC` int(11) NOT NULL,
  `RESULT` varchar(100) NOT NULL,
  `VALIDATOR` text NOT NULL,
  `UNITKERJA` text NOT NULL,
  `CREATED_BY` varchar(100) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengusul_pengangkatan`
--

INSERT INTO `pengusul_pengangkatan` (`PK_PENGUSUL_PENGANGKATAN`, `NIP`, `DOC_SURAT_PENGUSULAN`, `NO_SURAT`, `FK_STATUS_PENGUSUL_PENGANGKATAN`, `FK_STATUS_DOC`, `RESULT`, `VALIDATOR`, `UNITKERJA`, `CREATED_BY`, `CREATED_DATE`) VALUES
(33, '1110', 'doc_surat_pengusulan/20180822/20180822_1110/pdf.pdf', '78h8', 1, 2, '1', '1110', 'Perwakilan BPKP Provinsi Daerah Khusus Ibukota Jakarta', '1110', '2018-08-22'),
(34, '199909092009101025', '', '', 1, 2, '', '', 'Perwakilan BPKP Provinsi Daerah Khusus Ibukota Jakarta', '1110', '2018-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_soal`
--

CREATE TABLE `permintaan_soal` (
  `PK_PERMINTAAN_SOAL` int(11) NOT NULL,
  `FK_BAB_MATA_AJAR` int(11) NOT NULL,
  `TIPE_SOAL` varchar(30) NOT NULL,
  `TANGGAL_PERMINTAAN` date NOT NULL,
  `JUMLAH_SOAL` int(11) NOT NULL,
  `STATUS` varchar(150) NOT NULL,
  `FK_LOOKUP_STATUS_PERMINTAAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan_soal`
--

INSERT INTO `permintaan_soal` (`PK_PERMINTAAN_SOAL`, `FK_BAB_MATA_AJAR`, `TIPE_SOAL`, `TANGGAL_PERMINTAAN`, `JUMLAH_SOAL`, `STATUS`, `FK_LOOKUP_STATUS_PERMINTAAN`) VALUES
(20, 1, 'Pilihan Ganda', '2018-08-08', 12, 'pembuat_soal', 24),
(21, 2, 'Pilihan Ganda', '2018-08-25', 7, 'pembuat_soal', 27);

-- --------------------------------------------------------

--
-- Table structure for table `pertek`
--

CREATE TABLE `pertek` (
  `PK_PERTEK` int(11) NOT NULL,
  `NO_SURAT` varchar(100) NOT NULL,
  `DOC_ANGKA_KREDIT` text NOT NULL,
  `NO_PERTEK` varchar(100) NOT NULL,
  `DOC_PERTEK` text NOT NULL,
  `PERTEK_DATE` date NOT NULL,
  `NO_RESI` varchar(100) NOT NULL,
  `YTH` varchar(100) NOT NULL,
  `TEMPAT` varchar(100) NOT NULL,
  `KEPALA` varchar(100) NOT NULL,
  `TEMBUSAN` text NOT NULL,
  `CREATED_BY` varchar(150) NOT NULL,
  `CREATED_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertek`
--

INSERT INTO `pertek` (`PK_PERTEK`, `NO_SURAT`, `DOC_ANGKA_KREDIT`, `NO_PERTEK`, `DOC_PERTEK`, `PERTEK_DATE`, `NO_RESI`, `YTH`, `TEMPAT`, `KEPALA`, `TEMBUSAN`, `CREATED_BY`, `CREATED_DATE`) VALUES
(3, '78h8', '', 'ad', 'http://localhost/bpkp/uploads/doc_pertek/pertek_78h8.pdf', '0000-00-00', '', 'sad', 'asd', 'sad', 'sad', '1110', '2018-08-24 00:00:00');

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
(11, 'ACEH'),
(12, 'SUMATERA UTARA'),
(13, 'SUMATERA BARAT'),
(14, 'RIAU'),
(15, 'JAMBI'),
(16, 'SUMATERA SELATAN'),
(17, 'BENGKULU'),
(18, 'LAMPUNG'),
(19, 'KEPULAUAN BANGKA BELITUNG'),
(21, 'KEPULAUAN RIAU'),
(31, 'DKI JAKARTA'),
(32, 'JAWA BARAT'),
(33, 'JAWA TENGAH'),
(34, 'DI YOGYAKARTA'),
(35, 'JAWA TIMUR'),
(36, 'BANTEN'),
(51, 'BALI'),
(52, 'NUSA TENGGARA BARAT'),
(53, 'NUSA TENGGARA TIMUR'),
(61, 'KALIMANTAN BARAT'),
(62, 'KALIMANTAN TENGAH'),
(63, 'KALIMANTAN SELATAN'),
(64, 'KALIMANTAN TIMUR'),
(65, 'KALIMANTAN UTARA'),
(71, 'SULAWESI UTARA'),
(72, 'SULAWESI TENGAH'),
(73, 'SULAWESI SELATAN'),
(74, 'SULAWESI TENGGARA'),
(75, 'GORONTALO'),
(76, 'SULAWESI BARAT'),
(81, 'MALUKU'),
(82, 'MALUKU UTARA'),
(91, 'PAPUA BARAT'),
(94, 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `reff_simdiklat`
--

CREATE TABLE `reff_simdiklat` (
  `id_kaldik` int(11) NOT NULL,
  `NamaDiklat` varchar(150) NOT NULL,
  `RlsTglMulai` date NOT NULL,
  `RlsTglSelesai` date NOT NULL,
  `NoUrutSTTPM` int(11) NOT NULL,
  `TglSTTPM` date NOT NULL,
  `KodeJenisDiklat` int(11) NOT NULL,
  `NamaJenisDiklat` varchar(150) NOT NULL,
  `NIP` int(11) NOT NULL,
  `NamaGroupJabatan` varchar(150) NOT NULL,
  `KodeGroupJabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reff_simdiklat`
--

INSERT INTO `reff_simdiklat` (`id_kaldik`, `NamaDiklat`, `RlsTglMulai`, `RlsTglSelesai`, `NoUrutSTTPM`, `TglSTTPM`, `KodeJenisDiklat`, `NamaJenisDiklat`, `NIP`, `NamaGroupJabatan`, `KodeGroupJabatan`) VALUES
(1, 'Tester', '2018-07-08', '2018-07-08', 12, '2018-07-09', 1, 'testers', 211234, 'tester group', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registrasi_ujian`
--

CREATE TABLE `registrasi_ujian` (
  `PK_REGIS_UJIAN` int(11) NOT NULL,
  `GROUP_REGIS` varchar(50) NOT NULL,
  `KODE_DIKLAT` int(11) NOT NULL,
  `NIP` varchar(150) NOT NULL,
  `PROVINSI` varchar(100) NOT NULL,
  `PINDAH_BERKAS` int(5) NOT NULL,
  `LOKASI_UJIAN` int(10) NOT NULL,
  `FK_JADWAL_UJIAN` int(11) NOT NULL,
  `NO_SURAT_UJIAN` varchar(150) NOT NULL,
  `NILAI_KSP` varchar(150) NOT NULL,
  `CREATED_BY` varchar(100) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrasi_ujian`
--

INSERT INTO `registrasi_ujian` (`PK_REGIS_UJIAN`, `GROUP_REGIS`, `KODE_DIKLAT`, `NIP`, `PROVINSI`, `PINDAH_BERKAS`, `LOKASI_UJIAN`, `FK_JADWAL_UJIAN`, `NO_SURAT_UJIAN`, `NILAI_KSP`, `CREATED_BY`, `CREATED_DATE`, `flag`) VALUES
(22, '07001500103500_180822203622', 6, '196709271988031001', 'unknown', 0, 0, 18, '123', '90', 'Test Admin', '2018-08-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review_soal`
--

CREATE TABLE `review_soal` (
  `PK_REVIEW_SOAL` int(11) NOT NULL,
  `FK_BAB_MATA_AJAR` int(11) NOT NULL,
  `FK_LOOKUP_REVIEW_SOAL` int(11) NOT NULL,
  `REVIEWER` varchar(255) NOT NULL,
  `TANGGAL_REVIEW` date NOT NULL,
  `FLAG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_soal`
--

INSERT INTO `review_soal` (`PK_REVIEW_SOAL`, `FK_BAB_MATA_AJAR`, `FK_LOOKUP_REVIEW_SOAL`, `REVIEWER`, `TANGGAL_REVIEW`, `FLAG`) VALUES
(24, 9, 13, 'review1', '2018-07-02', 1),
(25, 9, 14, 'review2', '2018-07-02', 2),
(26, 9, 15, 'subid', '2018-07-02', 3);

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
-- Table structure for table `soal_distribusi`
--

CREATE TABLE `soal_distribusi` (
  `PK_SOAL_DISTRIBUSI` int(11) NOT NULL,
  `FK_KODE_SOAL` varchar(11) NOT NULL,
  `FK_SOAL_UJIAN` int(11) NOT NULL,
  `NO_SOAL` int(11) NOT NULL,
  `FLAG` int(11) NOT NULL,
  `CREATED_AT` varchar(100) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal_distribusi`
--

INSERT INTO `soal_distribusi` (`PK_SOAL_DISTRIBUSI`, `FK_KODE_SOAL`, `FK_SOAL_UJIAN`, `NO_SOAL`, `FLAG`, `CREATED_AT`, `CREATED_DATE`) VALUES
(1, '1', 182, 0, 0, 'admin_bank', '2018-08-19'),
(2, '1', 198, 0, 0, 'admin_bank', '2018-08-19'),
(3, '1', 201, 0, 0, 'admin_bank', '2018-08-19'),
(4, '1', 181, 0, 0, 'admin_bank', '2018-08-19'),
(5, '1', 134, 0, 0, 'admin_bank', '2018-08-19'),
(6, '1', 194, 0, 0, 'admin_bank', '2018-08-19'),
(7, '1', 190, 0, 0, 'admin_bank', '2018-08-19'),
(8, '1', 197, 0, 0, 'admin_bank', '2018-08-19'),
(9, '1', 191, 0, 0, 'admin_bank', '2018-08-19'),
(10, '1', 140, 0, 0, 'admin_bank', '2018-08-19'),
(11, '1', 200, 0, 0, 'admin_bank', '2018-08-19'),
(12, '1', 203, 0, 0, 'admin_bank', '2018-08-19'),
(13, '1', 188, 0, 0, 'admin_bank', '2018-08-19'),
(14, '1', 177, 0, 0, 'admin_bank', '2018-08-19'),
(15, '1', 134, 0, 0, 'admin_bank', '2018-08-19'),
(16, '1', 176, 0, 0, 'admin_bank', '2018-08-19'),
(17, '1', 191, 0, 0, 'admin_bank', '2018-08-19'),
(18, '1', 178, 0, 0, 'admin_bank', '2018-08-19'),
(19, '1', 175, 0, 0, 'admin_bank', '2018-08-19'),
(20, '1', 189, 0, 0, 'admin_bank', '2018-08-19'),
(21, '1', 193, 0, 0, 'admin_bank', '2018-08-19'),
(22, '1', 184, 0, 0, 'admin_bank', '2018-08-19'),
(23, '1', 194, 0, 0, 'admin_bank', '2018-08-19'),
(24, '1', 190, 0, 0, 'admin_bank', '2018-08-19'),
(25, '1', 201, 0, 0, 'admin_bank', '2018-08-19'),
(26, '1', 199, 0, 0, 'admin_bank', '2018-08-19'),
(27, '1', 178, 0, 0, 'admin_bank', '2018-08-19'),
(28, '1', 195, 0, 0, 'admin_bank', '2018-08-19'),
(29, '1', 182, 0, 0, 'admin_bank', '2018-08-19'),
(30, '1', 176, 0, 0, 'admin_bank', '2018-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `soal_kasus`
--

CREATE TABLE `soal_kasus` (
  `PK_SOAL_KASUS` int(11) NOT NULL,
  `SOAL_KASUS` varchar(1000) NOT NULL,
  `FK_BAB_MATA_AJAR` int(11) NOT NULL,
  `KODE_KASUS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal_kasus`
--

INSERT INTO `soal_kasus` (`PK_SOAL_KASUS`, `SOAL_KASUS`, `FK_BAB_MATA_AJAR`, `KODE_KASUS`) VALUES
(2, 'Negara Indonesia merdeka tanggal 17 agustus 1945, presiden pertama adalah ir soekarno', 1, 'soal-kasus-presiden');

-- --------------------------------------------------------

--
-- Table structure for table `soal_ujian`
--

CREATE TABLE `soal_ujian` (
  `PK_SOAL_UJIAN` int(11) NOT NULL,
  `FK_BAB_MATA_AJAR` int(11) NOT NULL,
  `FK_PERMINTAAN_SOAL` int(11) NOT NULL,
  `PARENT_SOAL` int(11) DEFAULT NULL,
  `PERTANYAAN` varchar(1000) NOT NULL,
  `JAWABAN` varchar(10) NOT NULL,
  `PILIHAN_1` varchar(255) NOT NULL,
  `PILIHAN_2` varchar(255) NOT NULL,
  `PILIHAN_3` varchar(255) NOT NULL,
  `PILIHAN_4` varchar(255) NOT NULL,
  `PILIHAN_5` varchar(255) NOT NULL,
  `PILIHAN_6` varchar(255) NOT NULL,
  `PILIHAN_7` varchar(255) NOT NULL,
  `PILIHAN_8` varchar(255) NOT NULL,
  `TAMPIL_UJIAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal_ujian`
--

INSERT INTO `soal_ujian` (`PK_SOAL_UJIAN`, `FK_BAB_MATA_AJAR`, `FK_PERMINTAAN_SOAL`, `PARENT_SOAL`, `PERTANYAAN`, `JAWABAN`, `PILIHAN_1`, `PILIHAN_2`, `PILIHAN_3`, `PILIHAN_4`, `PILIHAN_5`, `PILIHAN_6`, `PILIHAN_7`, `PILIHAN_8`, `TAMPIL_UJIAN`) VALUES
(134, 9, 0, NULL, 'Siapa Nama Presiden Indonesia pertama?', '1', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(135, 9, 0, NULL, 'Tanggal kemerdekaan indonesia?', '2', '27 Agustus 1945', '17 Agustus 1945', '10 Maret 1990', '7 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(139, 9, 0, 2, 'ibukota indonesia?', '1', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 0),
(140, 9, 0, 2, 'ibukota indonesia?', '1', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 0),
(141, 9, 0, 2, 'ibukota indonesia?', '1', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 1),
(175, 9, 0, NULL, 'KJKJK', '1', 'KJKJK', 'KJKJ', 'KJKJKJ', 'KJKJK', 'KJKJ', 'KJK', 'KJK', 'KJK', 0),
(176, 9, 0, 0, 'Tanggal kemerdekaan indonesia?', '2', '27 Agustus 1945', '17 Agustus 1945', '10 Maret 1990', '7 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(177, 9, 0, 2, 'ibukota indonesia?', '1', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 0),
(178, 9, 0, 2, 'ibukota indonesia?', '1', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 1),
(179, 9, 0, 2, 'ibukota indonesia?', '1', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 0),
(180, 9, 0, 0, 'KJKJK', '1', 'KJKJK', 'KJKJ', 'KJKJKJ', 'KJKJK', 'KJKJ', 'KJK', 'KJK', 'KJK', 0),
(181, 9, 0, 0, 'Siapa Nama Presiden Indonesia pertama?', '3', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(182, 9, 0, 0, 'Tanggal kemerdekaan indonesia?', '2', '28 Agustus 1945', '18 Agustus 1945', '11 Maret 1990', '8 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(183, 9, 0, 2, 'ibukota indonesia?', '1', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 1),
(184, 9, 0, 2, 'ibukota indonesia?', '2', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 0),
(185, 9, 0, 2, 'ibukota indonesia?', '2', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 0),
(186, 9, 0, 0, 'KJKJK', '2', 'KJKJK', 'KJKJ', 'KJKJKJ', 'KJKJK', 'KJKJ', 'KJK', 'KJK', 'KJK', 1),
(187, 9, 0, 0, 'Siapa Nama Presiden Indonesia pertama?', '1', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(188, 9, 0, 0, 'Tanggal kemerdekaan indonesia?', '2', '29 Agustus 1945', '19 Agustus 1945', '12 Maret 1990', '9 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(189, 9, 0, 2, 'ibukota indonesia?', '4', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 0),
(190, 9, 0, 2, 'ibukota indonesia?', '3', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 0),
(191, 9, 0, 2, 'ibukota indonesia?', '2', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 0),
(192, 9, 0, 0, 'KJKJK', '1', 'KJKJK', 'KJKJ', 'KJKJKJ', 'KJKJK', 'KJKJ', 'KJK', 'KJK', 'KJK', 0),
(193, 9, 0, 0, 'Siapa Nama Presiden Indonesia pertama?', '2', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(194, 9, 0, 0, 'Tanggal kemerdekaan indonesia?', '3', '30 Agustus 1945', '20 Agustus 1945', '13 Maret 1990', '10 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(195, 9, 0, 2, 'ibukota indonesia?', '4', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 1),
(196, 9, 0, 2, 'ibukota indonesia?', '1', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 0),
(197, 9, 0, 2, 'ibukota indonesia?', '1', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 0),
(198, 9, 0, 0, 'KJKJK', '2', 'KJKJK', 'KJKJ', 'KJKJKJ', 'KJKJK', 'KJKJ', 'KJK', 'KJK', 'KJK', 0),
(199, 9, 0, 0, 'Siapa Nama Presiden Indonesia pertama?', '3', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(200, 9, 0, 0, 'Tanggal kemerdekaan indonesia?', '1', '31 Agustus 1945', '21 Agustus 1945', '14 Maret 1990', '11 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(201, 9, 0, 2, 'ibukota indonesia?', '3', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 0),
(202, 9, 0, 2, 'ibukota indonesia?', '2', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 0),
(203, 9, 0, 2, 'ibukota indonesia?', '2', 'jakarta', 'bandung', 'surabaya', 'semarang', 'denpasar', 'lombok', 'ntt', 'ntb', 0),
(204, 9, 0, 0, 'KJKJK', '2', 'KJKJK', 'KJKJ', 'KJKJKJ', 'KJKJK', 'KJKJ', 'KJK', 'KJK', 'KJK', 0),
(205, 1, 12, NULL, 'asd', '3', 'asd', 'asd', 'asd', 'as', 'sd', 'sd', 'sd', 'sd', 0),
(208, 1, 12, NULL, 'kjjk', '6', 'kjkjk', 'kjk', 'jk', 'jk', 'jkj', 'kj', 'kk', 'jk', 0),
(209, 1, 12, NULL, 'k', '1', 'knknk', 'kk', 'nk', 'nk', 'nk', 'n', 'kn', 'kn', 0),
(266, 1, 0, NULL, 'Siapa Nama Presiden Indonesia pertama?', '1', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(267, 1, 0, NULL, 'Tanggal kemerdekaan indonesia?', '2', '27 Agustus 1945', '17 Agustus 1945', '10 Maret 1990', '7 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(268, 1, 0, NULL, 'Siapa Nama Presiden Indonesia pertama?', '1', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(269, 1, 0, NULL, 'Tanggal kemerdekaan indonesia?', '2', '27 Agustus 1945', '17 Agustus 1945', '10 Maret 1990', '7 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(270, 1, 12, NULL, 'Siapa Nama Presiden Indonesia pertama?', '1', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(271, 1, 12, NULL, 'Tanggal kemerdekaan indonesia?', '2', '27 Agustus 1945', '17 Agustus 1945', '10 Maret 1990', '7 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(272, 1, 12, NULL, 'Siapa Nama Presiden Indonesia pertama?', '1', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(273, 1, 12, NULL, 'Tanggal kemerdekaan indonesia?', '2', '27 Agustus 1945', '17 Agustus 1945', '10 Maret 1990', '7 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0);

-- --------------------------------------------------------

--
-- Table structure for table `status_doc`
--

CREATE TABLE `status_doc` (
  `PK_STATUS_DOC` int(11) NOT NULL,
  `DESC_STATUS` varchar(200) NOT NULL,
  `CREATED_AT` varchar(100) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_doc`
--

INSERT INTO `status_doc` (`PK_STATUS_DOC`, `DESC_STATUS`, `CREATED_AT`, `CREATED_DATE`) VALUES
(1, 'Document Belum Complete', 'admin', '2018-06-22'),
(2, 'Document Complete', 'admin', '2018-06-22'),
(3, 'Proccessing', 'admin', '2018-06-22'),
(4, 'Reject', 'admin', '2018-06-22'),
(5, 'Accept', 'admin', '2018-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `status_pengusulan_pengangkatan`
--

CREATE TABLE `status_pengusulan_pengangkatan` (
  `PK_STATUS_PENGUSUL_PENGANGKATAN` int(50) NOT NULL,
  `DESC` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pengusulan_pengangkatan`
--

INSERT INTO `status_pengusulan_pengangkatan` (`PK_STATUS_PENGUSUL_PENGANGKATAN`, `DESC`) VALUES
(1, 'Pengangkatan Pertama'),
(2, 'Pengangkatan Perpindahan'),
(3, 'Pengangkatan Penyesuaian (Inpassing)\r\n'),
(4, 'Pengangkatan kembali');

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_pengusul`
-- (See below for the actual view)
--
CREATE TABLE `total_pengusul` (
`PK_PERTEK` int(11)
,`NO_SURAT` varchar(100)
,`qualified` decimal(23,0)
,`total` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_soal_distribusi`
-- (See below for the actual view)
--
CREATE TABLE `total_soal_distribusi` (
`KODE_SOAL` varchar(150)
,`KEBUTUHAN_SOAL` int(11)
,`total_soal` bigint(21)
,`FK_BAB_MATA_AJAR` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `PK_USER` int(11) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `USER_PASSWORD` text NOT NULL,
  `FK_LOOKUP_ROLE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`PK_USER`, `USER_NAME`, `USER_PASSWORD`, `FK_LOOKUP_ROLE`) VALUES
(1, 'auditor', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 3),
(2, 'admin', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 2),
(3, 'widyaiswara', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 4),
(4, 'pusbin', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 5),
(5, 'unit_apip', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 6),
(6, 'bpkp', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 11),
(7, 'admin_bank', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 1),
(8, 'review1', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 18),
(9, 'review2', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 19),
(10, 'subid', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 21),
(11, 'kapus', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 22),
(12, 'pembuat_soal', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 20),
(89, '1110', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 28);

-- --------------------------------------------------------

--
-- Table structure for table `widyaiswara_nilai`
--

CREATE TABLE `widyaiswara_nilai` (
  `PK_WIDYAISWARA_NILAI` int(11) NOT NULL,
  `NIP` varchar(150) DEFAULT NULL,
  `TGL_RELEASE_MATA_AJAR` varchar(255) DEFAULT NULL,
  `MATA_AJAR` varchar(200) NOT NULL,
  `NILAI_1` float NOT NULL,
  `NILAI_2` float NOT NULL,
  `NIP_INSTRUKTUR` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  `CREATED_AT` varchar(200) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `widyaiswara_nilai`
--

INSERT INTO `widyaiswara_nilai` (`PK_WIDYAISWARA_NILAI`, `NIP`, `TGL_RELEASE_MATA_AJAR`, `MATA_AJAR`, `NILAI_1`, `NILAI_2`, `NIP_INSTRUKTUR`, `flag`, `CREATED_AT`, `CREATED_DATE`) VALUES
(1, '196710131995121006', '2014-05-05', 'Sistem Administrasi Keuangan Daerah II', 90, 100, 'Achmad Sujalma', 1, '196006021982031001', '2018-07-20'),
(2, '197103241992032007', '2014-05-05', 'Sistem Administrasi Keuangan Daerah II', 85, 85, 'Achmad Sujalma', 1, '196006021982031001', '2018-07-20'),
(3, '197206081992031008', '2014-05-05', 'Sistem Administrasi Keuangan Daerah II', 80, 80, 'Achmad Sujalma', 1, '196006021982031001', '2018-07-20'),
(4, '197412252006042017', '2014-05-05', 'Sistem Administrasi Keuangan Daerah II', 80, 80, 'Achmad Sujalma', 1, '196006021982031001', '2018-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `PK_WILAYAH` int(11) NOT NULL,
  `NAMA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `total_pengusul`
--
DROP TABLE IF EXISTS `total_pengusul`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_pengusul`  AS  select `pertek`.`PK_PERTEK` AS `PK_PERTEK`,`pengusul_pengangkatan`.`NO_SURAT` AS `NO_SURAT`,sum((case when ((`pengusul_pengangkatan`.`FK_STATUS_DOC` > 1) and (`pengusul_pengangkatan`.`RESULT` <> '')) then 1 else 0 end)) AS `qualified`,sum((case when (`pengusul_pengangkatan`.`FK_STATUS_DOC` <> '') then 1 else 0 end)) AS `total` from (`pengusul_pengangkatan` left join `pertek` on((`pertek`.`NO_SURAT` = `pengusul_pengangkatan`.`NO_SURAT`))) group by `pengusul_pengangkatan`.`NO_SURAT` ;

-- --------------------------------------------------------

--
-- Structure for view `total_soal_distribusi`
--
DROP TABLE IF EXISTS `total_soal_distribusi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_soal_distribusi`  AS  select `kode_soal`.`KODE_SOAL` AS `KODE_SOAL`,`kode_soal`.`KEBUTUHAN_SOAL` AS `KEBUTUHAN_SOAL`,count(`soal_distribusi`.`FK_KODE_SOAL`) AS `total_soal`,`soal_ujian`.`FK_BAB_MATA_AJAR` AS `FK_BAB_MATA_AJAR` from ((`kode_soal` left join `soal_distribusi` on((`soal_distribusi`.`FK_KODE_SOAL` = `kode_soal`.`PK_KODE_SOAL`))) left join `soal_ujian` on((`soal_distribusi`.`FK_SOAL_UJIAN` = `soal_ujian`.`PK_SOAL_UJIAN`))) group by `kode_soal`.`PK_KODE_SOAL`,`soal_ujian`.`FK_BAB_MATA_AJAR` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angka_kredit`
--
ALTER TABLE `angka_kredit`
  ADD PRIMARY KEY (`PK_ANGKA_KREDIT`);

--
-- Indexes for table `bab_mata_ajar`
--
ALTER TABLE `bab_mata_ajar`
  ADD PRIMARY KEY (`PK_BAB_MATA_AJAR`),
  ADD KEY `CN_BAB_MATA_AJAR` (`FK_MATA_AJAR`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`PK_BATCH`),
  ADD KEY `CN_FK_KODE_EVENT` (`FK_EVENT`) USING BTREE;

--
-- Indexes for table `bridge_lookup`
--
ALTER TABLE `bridge_lookup`
  ADD PRIMARY KEY (`id_bridge_lookup`);

--
-- Indexes for table `detail_permintaan_soal`
--
ALTER TABLE `detail_permintaan_soal`
  ADD PRIMARY KEY (`PK_DETAIL_PERMINTAAN_SOAL`);

--
-- Indexes for table `document_pengusulan_pengangkatan`
--
ALTER TABLE `document_pengusulan_pengangkatan`
  ADD PRIMARY KEY (`PK_DOC_PENGUSULAN_PENGANGKATAN`);

--
-- Indexes for table `dokumen_persetujuan`
--
ALTER TABLE `dokumen_persetujuan`
  ADD PRIMARY KEY (`PK_PERSETUJUAN`),
  ADD KEY `CN_GROUP_REGIS` (`GROUP_REGIS`);

--
-- Indexes for table `dokumen_registrasi_ujian`
--
ALTER TABLE `dokumen_registrasi_ujian`
  ADD PRIMARY KEY (`PK_DOC_REGIS`),
  ADD KEY `dokumen_registrasi_ujian_ibfk_1` (`FK_REGIS_UJIAN`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`PK_EVENT`),
  ADD KEY `CN_KODE_DIKLAT` (`FK_JENJANG`);

--
-- Indexes for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  ADD PRIMARY KEY (`PK_JADWAL_UJIAN`);

--
-- Indexes for table `jawaban_peserta`
--
ALTER TABLE `jawaban_peserta`
  ADD PRIMARY KEY (`PK_JAWABAN_DETAIL`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`PK_JENJANG`) USING BTREE,
  ADD KEY `CN_GROUP_MATA_AJAR_LOOKUP` (`FK_LOOKUP_DIKLAT`),
  ADD KEY `CN_KODE_DIKLAT` (`KODE_DIKLAT`);

--
-- Indexes for table `kode_soal`
--
ALTER TABLE `kode_soal`
  ADD PRIMARY KEY (`PK_KODE_SOAL`);

--
-- Indexes for table `lookup`
--
ALTER TABLE `lookup`
  ADD PRIMARY KEY (`PK_LOOKUP`);

--
-- Indexes for table `lookup_ujian`
--
ALTER TABLE `lookup_ujian`
  ADD PRIMARY KEY (`PK_LOOKUP_REGIS`);

--
-- Indexes for table `mata_ajar`
--
ALTER TABLE `mata_ajar`
  ADD PRIMARY KEY (`PK_MATA_AJAR`),
  ADD KEY `CN_FK_JENJANG` (`FK_JENJANG`);

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
-- Indexes for table `pengusul_pengangkatan`
--
ALTER TABLE `pengusul_pengangkatan`
  ADD PRIMARY KEY (`PK_PENGUSUL_PENGANGKATAN`);

--
-- Indexes for table `permintaan_soal`
--
ALTER TABLE `permintaan_soal`
  ADD PRIMARY KEY (`PK_PERMINTAAN_SOAL`);

--
-- Indexes for table `pertek`
--
ALTER TABLE `pertek`
  ADD PRIMARY KEY (`PK_PERTEK`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`PK_PROVINSI`);

--
-- Indexes for table `registrasi_ujian`
--
ALTER TABLE `registrasi_ujian`
  ADD PRIMARY KEY (`PK_REGIS_UJIAN`),
  ADD KEY `KODE_DIKLAT` (`KODE_DIKLAT`),
  ADD KEY `registrasi_ujian_ibfk_2` (`FK_JADWAL_UJIAN`),
  ADD KEY `CN_GROUP_REGIS` (`GROUP_REGIS`),
  ADD KEY `CN_LOKASI_UJIAN` (`LOKASI_UJIAN`) USING BTREE;

--
-- Indexes for table `review_soal`
--
ALTER TABLE `review_soal`
  ADD PRIMARY KEY (`PK_REVIEW_SOAL`);

--
-- Indexes for table `soal_distribusi`
--
ALTER TABLE `soal_distribusi`
  ADD PRIMARY KEY (`PK_SOAL_DISTRIBUSI`);

--
-- Indexes for table `soal_kasus`
--
ALTER TABLE `soal_kasus`
  ADD PRIMARY KEY (`PK_SOAL_KASUS`);

--
-- Indexes for table `soal_ujian`
--
ALTER TABLE `soal_ujian`
  ADD PRIMARY KEY (`PK_SOAL_UJIAN`),
  ADD KEY `CN_SOAL_BAB_MATA_AJAR` (`FK_BAB_MATA_AJAR`),
  ADD KEY `CN_SOAL_KASUS` (`PARENT_SOAL`);

--
-- Indexes for table `status_doc`
--
ALTER TABLE `status_doc`
  ADD PRIMARY KEY (`PK_STATUS_DOC`);

--
-- Indexes for table `status_pengusulan_pengangkatan`
--
ALTER TABLE `status_pengusulan_pengangkatan`
  ADD PRIMARY KEY (`PK_STATUS_PENGUSUL_PENGANGKATAN`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`PK_USER`),
  ADD KEY `FK_LOOKUP_ROLE` (`FK_LOOKUP_ROLE`);

--
-- Indexes for table `widyaiswara_nilai`
--
ALTER TABLE `widyaiswara_nilai`
  ADD PRIMARY KEY (`PK_WIDYAISWARA_NILAI`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`PK_WILAYAH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angka_kredit`
--
ALTER TABLE `angka_kredit`
  MODIFY `PK_ANGKA_KREDIT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bab_mata_ajar`
--
ALTER TABLE `bab_mata_ajar`
  MODIFY `PK_BAB_MATA_AJAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `PK_BATCH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bridge_lookup`
--
ALTER TABLE `bridge_lookup`
  MODIFY `id_bridge_lookup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_permintaan_soal`
--
ALTER TABLE `detail_permintaan_soal`
  MODIFY `PK_DETAIL_PERMINTAAN_SOAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `document_pengusulan_pengangkatan`
--
ALTER TABLE `document_pengusulan_pengangkatan`
  MODIFY `PK_DOC_PENGUSULAN_PENGANGKATAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `dokumen_persetujuan`
--
ALTER TABLE `dokumen_persetujuan`
  MODIFY `PK_PERSETUJUAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dokumen_registrasi_ujian`
--
ALTER TABLE `dokumen_registrasi_ujian`
  MODIFY `PK_DOC_REGIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `PK_EVENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `PK_JADWAL_UJIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jawaban_peserta`
--
ALTER TABLE `jawaban_peserta`
  MODIFY `PK_JAWABAN_DETAIL` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `PK_JENJANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kode_soal`
--
ALTER TABLE `kode_soal`
  MODIFY `PK_KODE_SOAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lookup_ujian`
--
ALTER TABLE `lookup_ujian`
  MODIFY `PK_LOOKUP_REGIS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mata_ajar`
--
ALTER TABLE `mata_ajar`
  MODIFY `PK_MATA_AJAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `menu_page_detail`
--
ALTER TABLE `menu_page_detail`
  MODIFY `PK_MENU_DETAIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengusul_pengangkatan`
--
ALTER TABLE `pengusul_pengangkatan`
  MODIFY `PK_PENGUSUL_PENGANGKATAN` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `permintaan_soal`
--
ALTER TABLE `permintaan_soal`
  MODIFY `PK_PERMINTAAN_SOAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pertek`
--
ALTER TABLE `pertek`
  MODIFY `PK_PERTEK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `PK_PROVINSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `registrasi_ujian`
--
ALTER TABLE `registrasi_ujian`
  MODIFY `PK_REGIS_UJIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `soal_distribusi`
--
ALTER TABLE `soal_distribusi`
  MODIFY `PK_SOAL_DISTRIBUSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `soal_kasus`
--
ALTER TABLE `soal_kasus`
  MODIFY `PK_SOAL_KASUS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `soal_ujian`
--
ALTER TABLE `soal_ujian`
  MODIFY `PK_SOAL_UJIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `status_doc`
--
ALTER TABLE `status_doc`
  MODIFY `PK_STATUS_DOC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status_pengusulan_pengangkatan`
--
ALTER TABLE `status_pengusulan_pengangkatan`
  MODIFY `PK_STATUS_PENGUSUL_PENGANGKATAN` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `PK_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `widyaiswara_nilai`
--
ALTER TABLE `widyaiswara_nilai`
  MODIFY `PK_WIDYAISWARA_NILAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `PK_WILAYAH` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `CN_event12` FOREIGN KEY (`FK_EVENT`) REFERENCES `event` (`PK_EVENT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokumen_registrasi_ujian`
--
ALTER TABLE `dokumen_registrasi_ujian`
  ADD CONSTRAINT `dokumen_registrasi_ujian_ibfk_1` FOREIGN KEY (`FK_REGIS_UJIAN`) REFERENCES `registrasi_ujian` (`PK_REGIS_UJIAN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `CN_event1` FOREIGN KEY (`FK_JENJANG`) REFERENCES `jenjang` (`PK_JENJANG`);

--
-- Constraints for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD CONSTRAINT `CN_GROUP_MATA_AJAR_LOOKUP` FOREIGN KEY (`FK_LOOKUP_DIKLAT`) REFERENCES `lookup` (`PK_LOOKUP`);

--
-- Constraints for table `mata_ajar`
--
ALTER TABLE `mata_ajar`
  ADD CONSTRAINT `mata_ajar_ibfk_1` FOREIGN KEY (`FK_JENJANG`) REFERENCES `jenjang` (`PK_JENJANG`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `registrasi_ujian`
--
ALTER TABLE `registrasi_ujian`
  ADD CONSTRAINT `registrasi_ujian_ibfk_1` FOREIGN KEY (`KODE_DIKLAT`) REFERENCES `jenjang` (`KODE_DIKLAT`),
  ADD CONSTRAINT `registrasi_ujian_ibfk_2` FOREIGN KEY (`FK_JADWAL_UJIAN`) REFERENCES `jadwal_ujian` (`PK_JADWAL_UJIAN`);

--
-- Constraints for table `soal_ujian`
--
ALTER TABLE `soal_ujian`
  ADD CONSTRAINT `CN_SOAL_KASUS` FOREIGN KEY (`PARENT_SOAL`) REFERENCES `soal_kasus` (`PK_SOAL_KASUS`) ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`FK_LOOKUP_ROLE`) REFERENCES `lookup` (`PK_LOOKUP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
