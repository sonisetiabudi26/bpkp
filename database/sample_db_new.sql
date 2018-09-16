-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 16, 2018 at 03:36 AM
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
(2, '33', 123, 213, 23, 123, 23, 231, 23, NULL, '2018-08-24 00:00:00'),
(3, '1', 150000, 0, 243300, 22700, 0, 436000, 1100000, NULL, '2018-09-03 00:00:00');

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
(3, 13, 'bab 1');

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
(10, 9, 'asd', 19, 'tester', 'Pusbin Budianto', '2018-08-29'),
(11, 12, 'asd', 18, 'tester', 'Pusbin Budianto', '2018-09-09'),
(12, 10, 'asd', 19, 'tester', 'Pusbin Budianto', '2018-09-14'),
(21, 24, 'Online', 18, 'Online', 'admin_bank', '2018-09-15');

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
-- Table structure for table `detail_jawaban_peserta`
--

CREATE TABLE `detail_jawaban_peserta` (
  `FK_JAWABAN_DETAIL` int(11) NOT NULL,
  `FK_SOAL_UJIAN` int(11) NOT NULL,
  `NO_UJIAN` int(11) NOT NULL,
  `JAWABAN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_jawaban_peserta`
--

INSERT INTO `detail_jawaban_peserta` (`FK_JAWABAN_DETAIL`, `FK_SOAL_UJIAN`, `NO_UJIAN`, `JAWABAN`) VALUES
(733, 0, 1, 'B'),
(733, 0, 2, 'C'),
(733, 0, 3, 'B'),
(733, 0, 4, 'C'),
(733, 0, 5, 'B'),
(733, 0, 6, 'B'),
(733, 0, 7, 'D'),
(733, 0, 8, 'B'),
(733, 0, 9, 'D'),
(733, 0, 10, 'A'),
(733, 0, 11, 'C'),
(733, 0, 12, 'B'),
(733, 0, 13, 'B'),
(733, 0, 14, 'C'),
(733, 0, 15, 'A'),
(733, 0, 16, 'B'),
(733, 0, 17, 'B'),
(733, 0, 18, 'C'),
(733, 0, 19, 'A'),
(733, 0, 20, 'B'),
(733, 0, 21, 'C'),
(733, 0, 22, 'C'),
(733, 0, 23, 'B'),
(733, 0, 24, 'A'),
(733, 0, 25, 'A'),
(733, 0, 26, 'B'),
(733, 0, 27, 'C'),
(733, 0, 28, 'A'),
(733, 0, 29, 'C'),
(733, 0, 30, 'A'),
(733, 0, 31, ''),
(733, 0, 32, ''),
(733, 0, 33, ''),
(733, 0, 34, ''),
(733, 0, 35, ''),
(733, 0, 36, ''),
(733, 0, 37, ''),
(733, 0, 38, ''),
(733, 0, 39, ''),
(733, 0, 40, ''),
(733, 0, 41, ''),
(733, 0, 42, ''),
(733, 0, 43, ''),
(733, 0, 44, ''),
(733, 0, 45, ''),
(733, 0, 46, ''),
(733, 0, 47, ''),
(733, 0, 48, ''),
(733, 0, 49, ''),
(733, 0, 50, ''),
(734, 0, 1, 'C'),
(734, 0, 2, 'A'),
(734, 0, 3, 'A'),
(734, 0, 4, 'A'),
(734, 0, 5, 'D'),
(734, 0, 6, 'C'),
(734, 0, 7, 'B'),
(734, 0, 8, 'A'),
(734, 0, 9, 'B'),
(734, 0, 10, 'A'),
(734, 0, 11, 'D'),
(734, 0, 12, 'A'),
(734, 0, 13, 'D'),
(734, 0, 14, 'C'),
(734, 0, 15, 'C'),
(734, 0, 16, 'B'),
(734, 0, 17, 'A'),
(734, 0, 18, 'A'),
(734, 0, 19, 'B'),
(734, 0, 20, 'B'),
(734, 0, 21, 'C'),
(734, 0, 22, 'C'),
(734, 0, 23, 'D'),
(734, 0, 24, 'A'),
(734, 0, 25, 'C'),
(734, 0, 26, 'D'),
(734, 0, 27, 'D'),
(734, 0, 28, 'B'),
(734, 0, 29, 'A'),
(734, 0, 30, 'A'),
(734, 0, 31, ''),
(734, 0, 32, ''),
(734, 0, 33, ''),
(734, 0, 34, ''),
(734, 0, 35, ''),
(734, 0, 36, ''),
(734, 0, 37, ''),
(734, 0, 38, ''),
(734, 0, 39, ''),
(734, 0, 40, ''),
(734, 0, 41, ''),
(734, 0, 42, ''),
(734, 0, 43, ''),
(734, 0, 44, ''),
(734, 0, 45, ''),
(734, 0, 46, ''),
(734, 0, 47, ''),
(734, 0, 48, ''),
(734, 0, 49, ''),
(734, 0, 50, '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_nilai_wi`
--

CREATE TABLE `detail_nilai_wi` (
  `PK_DETAIL_NILAI_WI` int(15) NOT NULL,
  `FK_WIDYAISWARA_NILAI` varchar(150) NOT NULL,
  `NILAI_1` int(11) NOT NULL,
  `NILAI_2` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_nilai_wi`
--

INSERT INTO `detail_nilai_wi` (`PK_DETAIL_NILAI_WI`, `FK_WIDYAISWARA_NILAI`, `NILAI_1`, `NILAI_2`, `flag`) VALUES
(29, '25', 99, 90, 1),
(30, '26', 50, 30, 1),
(31, '29', 90, 55, 1);

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
(37, 25, 'pembuat_soal', 'pembuat_soal', ''),
(38, 25, 'review1', 'review2', ''),
(39, 25, 'review2', 'review2', ''),
(40, 25, 'review3', 'subid', 'aman'),
(41, 25, 'review4', 'kapus', 'oke\r\n'),
(42, 26, 'pembuat_soal', 'pembuat_soal', ''),
(43, 26, 'review1', 'review2', ''),
(44, 26, 'review2', 'review2', ''),
(45, 26, 'review3', 'subid', ''),
(46, 26, 'review4', 'kapus', ''),
(47, 27, 'pembuat_soal', 'pembuat_soal', ''),
(48, 27, 'review1', 'review1', ''),
(49, 27, 'review2', 'review2', 'tjakep'),
(50, 27, 'review3', 'subid', 'ke3'),
(51, 27, 'review4', 'kapus', 'oke'),
(52, 28, 'pembuat_soal', 'pembuat_soal', ''),
(53, 28, 'review1', 'review1', 'nomor satu terlalu mudah'),
(54, 28, 'review2', 'review2', 'iya nomer satu tolong dirubah'),
(55, 28, 'review3', 'subid', 'lanjut'),
(56, 28, 'review4', 'kapus', 'lanjutkan');

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
(34, '', '1', 'doc_penugasan', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 34, '1110', '2018-08-24'),
(35, '', '1', 'doc_cpns', 'doc_pengangkatan/1_1110/pdf.pdf', 1, '1110', '2018-09-03'),
(36, '', '1', 'doc_pns', 'doc_pengangkatan/1_1110/pdf.pdf', 1, '1110', '2018-09-03'),
(37, '', '1', 'doc_ijazah', 'doc_pengangkatan/1_1110/pdf.pdf', 1, '1110', '2018-09-03'),
(38, '', '1', 'doc_prajab', 'doc_pengangkatan/1_1110/pdf.pdf', 1, '1110', '2018-09-03'),
(39, '', '1', 'doc_sk_diklat', 'doc_pengangkatan/1_1110/pdf.pdf', 1, '1110', '2018-09-03'),
(40, '', '1', 'doc_skp', 'doc_pengangkatan/1_1110/pdf.pdf', 1, '1110', '2018-09-03'),
(41, '', '1', 'doc_sk_lulus', 'doc_pengangkatan/1_1110/pdf.pdf', 1, '1110', '2018-09-03'),
(42, '', '1', 'doc_penugasan', 'doc_pengangkatan/1_1110/pdf.pdf', 1, '1110', '2018-09-03'),
(43, '', '1', 'doc_cpns', 'doc_pengangkatan/1_196709271988031001/pdf (2).pdf', 2, '1110', '2018-09-14'),
(44, '', '1', 'doc_pns', 'doc_pengangkatan/1_196709271988031001/pdf (2).pdf', 2, '1110', '2018-09-14'),
(45, '', '1', 'doc_ijazah', 'doc_pengangkatan/1_196709271988031001/pdf (2).pdf', 2, '1110', '2018-09-14'),
(46, '', '1', 'doc_prajab', 'doc_pengangkatan/1_196709271988031001/pdf (2).pdf', 2, '1110', '2018-09-14'),
(47, '', '1', 'doc_sk_diklat', 'doc_pengangkatan/1_196709271988031001/pdf (2).pdf', 2, '1110', '2018-09-14'),
(48, '', '1', 'doc_skp', 'doc_pengangkatan/1_196709271988031001/pdf (2).pdf', 2, '1110', '2018-09-14'),
(49, '', '1', 'doc_sk_lulus', 'doc_pengangkatan/1_196709271988031001/pdf (2).pdf', 2, '1110', '2018-09-14'),
(50, '', '1', 'doc_penugasan', 'doc_pengangkatan/1_196709271988031001/pdf (2).pdf', 2, '1110', '2018-09-14');

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
(15, '07001500103500_180822203622', 'doc_setuju/07001500103500_180822203622_180822203622/pdf.pdf', 'Test Admin', '2018-08-22'),
(16, '07001500103500_180829212038', 'doc_setuju/07001500103500_180829212038_180829212038/pdf.pdf', 'Test Admin', '2018-08-29'),
(17, '07001500103500_180829212239', 'doc_setuju/07001500103500_180829212239_180829212239/pdf.pdf', 'Test Admin', '2018-08-29'),
(18, '07001500103500_180829212359', 'doc_setuju/07001500103500_180829212359_180829212359/pdf.pdf', 'Test Admin', '2018-08-29'),
(19, '07001500103500_180829233551', 'doc_setuju/07001500103500_180829233551_180829233551/kartu_ujian_22 (2).pdf', 'Test Admin', '2018-08-29'),
(20, '07001500103500_180830175843', 'doc_setuju/07001500103500_180830175843_180830175843/kartu_ujian_22 (4).pdf', 'Test Admin', '2018-08-30'),
(21, '07001500103500_180830180241', 'doc_setuju/07001500103500_180830180241_180830180241/kartu_ujian_22 (4).pdf', 'Test Admin', '2018-08-30'),
(22, '07001500103500_180830180809', 'doc_setuju/07001500103500_180830180809_180830180809/kartu_ujian_22 (5).pdf', 'Test Admin', '2018-08-30'),
(23, '07001500103500_180830180923', 'doc_setuju/07001500103500_180830180923_180830180923/kartu_ujian_22 (5).pdf', 'Test Admin', '2018-08-30'),
(24, '07001500103500_180830181344', 'doc_setuju/07001500103500_180830181344_180830181344/kartu_ujian_22 (6).pdf', 'Test Admin', '2018-08-30'),
(25, '07001500103500_180830190904', 'doc_setuju/07001500103500_180830190904_180830190904/pdf.pdf', 'Test Admin', '2018-08-30'),
(26, '07001500103500_180830191555', 'doc_setuju/07001500103500_180830191555_180830191555/pdf.pdf', 'Test Admin', '2018-08-30'),
(27, '07001500103500_180912144830', 'doc_setuju/07001500103500_180912144830_180912144830/soal_permintaan_26.pdf', 'Test Admin', '2018-09-12'),
(28, '07001500103500_180914145419', 'doc_setuju/07001500103500_180914145419_180914145419/pdf (2).pdf', 'Test Admin', '2018-09-14');

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
(11, 12, 'doc_registrasi/195301291982031001_20180912/soal_permintaan (22).pdf', 'doc_ksp'),
(12, 12, 'doc_registrasi/195301291982031001_20180912/1.jpg', 'doc_foto'),
(13, 13, 'doc_registrasi/195212211978031001_20180914/pdf (2).pdf', 'doc_ksp'),
(14, 13, 'doc_registrasi/195212211978031001_20180914/357515.jpg', 'doc_foto');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `PK_EVENT` int(11) NOT NULL,
  `KODE_EVENT` varchar(100) NOT NULL,
  `KODE_DIKLAT` int(15) NOT NULL,
  `URAIAN` text NOT NULL,
  `FK_PROVINSI` int(11) NOT NULL,
  `PASS_GRADE` int(11) NOT NULL,
  `CREATED_BY` varchar(150) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`PK_EVENT`, `KODE_EVENT`, `KODE_DIKLAT`, `URAIAN`, `FK_PROVINSI`, `PASS_GRADE`, `CREATED_BY`, `CREATED_DATE`) VALUES
(9, '6122018', 6, 'tester', 11, 60, 'Pusbin Budianto', '2018-08-29'),
(10, '20212', 2, 'qwe', 13, 60, 'Pusbin Budianto', '2018-09-03'),
(11, '61212', 6, 'tester', 12, 60, 'Pusbin Budianto', '2018-09-09'),
(12, '11212', 1, 'tester', 12, 60, 'Pusbin Budianto', '2018-09-09'),
(14, '11111', 1, 'tester', 14, 60, 'Pusbin Budianto', '2018-09-09'),
(15, '11212', 1, 'tester', 52, 60, 'Pusbin Budianto', '2018-09-12'),
(24, '20918', 2, 'Online', 12, 70, 'admin_bank', '2018-09-15');

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
  `Nilai` varchar(50) NOT NULL,
  `PIN` varchar(50) NOT NULL,
  `CREATED_BY` varchar(100) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_peserta`
--

INSERT INTO `jawaban_peserta` (`PK_JAWABAN_DETAIL`, `FK_EVENT`, `KODE_PESERTA`, `TGL_UJIAN`, `KODE_SOAL`, `KODE_UNIT`, `KELAS`, `Nilai`, `PIN`, `CREATED_BY`, `CREATED_DATE`) VALUES
(733, '10', '199503252018011001', '2010-04-18', '14401', '0105120702', 'asd', '40', '', 'Pusbin Budianto', '2018-09-14'),
(734, '10', '199510312018011001', '2010-04-18', '14401', '0105120702', 'asd', '10', '', 'Pusbin Budianto', '2018-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_peserta_COPY`
--

CREATE TABLE `jawaban_peserta_COPY` (
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
(12, '14401', '13', 30, 1, 'admin_bank', '2018-09-14 00:00:00'),
(17, '14402', '13', 60, 0, 'admin_bank', '2018-09-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi_ujian`
--

CREATE TABLE `konfigurasi_ujian` (
  `PK_KONFIG_UJIAN` int(11) NOT NULL,
  `START_TIME` time NOT NULL,
  `END_TIME` time NOT NULL,
  `PIN` varchar(50) NOT NULL,
  `FK_MATA_AJAR` int(11) NOT NULL,
  `FK_EVENT` int(11) NOT NULL,
  `CREATED_BY` varchar(100) NOT NULL,
  `CREATED_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi_ujian`
--

INSERT INTO `konfigurasi_ujian` (`PK_KONFIG_UJIAN`, `START_TIME`, `END_TIME`, `PIN`, `FK_MATA_AJAR`, `FK_EVENT`, `CREATED_BY`, `CREATED_DATE`) VALUES
(6, '00:12:00', '20:12:00', '795984', 12, 24, 'admin_bank', '2018-09-15 00:00:00');

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
  `FK_JAWABAN_DETAIL` int(11) NOT NULL,
  `HASIL_UJIAN` float NOT NULL,
  `NILAI_KSP` int(11) NOT NULL,
  `CREATED_BY` varchar(150) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lookup_ujian`
--

INSERT INTO `lookup_ujian` (`PK_LOOKUP_REGIS`, `FK_REGIS_UJIAN`, `FK_MATA_AJAR`, `FK_JAWABAN_DETAIL`, `HASIL_UJIAN`, `NILAI_KSP`, `CREATED_BY`, `CREATED_DATE`, `flag`) VALUES
(31, 12, 17, 0, 0, 56, '', '0000-00-00', 0),
(32, 13, 12, 0, 0, 90, '', '0000-00-00', 0),
(33, 12, 18, 0, 0, 56, '', '0000-00-00', 0),
(34, 12, 16, 0, 0, 56, '', '0000-00-00', 0),
(35, 12, 13, 733, 40, 56, '', '0000-00-00', 1),
(36, 12, 12, 0, 0, 56, '', '0000-00-00', 0),
(37, 13, 13, 734, 10, 90, '', '0000-00-00', 1),
(38, 13, 14, 0, 0, 90, '', '0000-00-00', 0),
(39, 13, 15, 0, 0, 90, '', '0000-00-00', 0),
(40, 13, 16, 0, 0, 90, '', '0000-00-00', 0),
(41, 13, 17, 0, 0, 90, '', '0000-00-00', 0),
(42, 13, 18, 0, 0, 90, '', '0000-00-00', 0),
(43, 12, 14, 0, 0, 56, '', '0000-00-00', 0),
(44, 12, 15, 0, 0, 56, '', '0000-00-00', 0);

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
(6, 'Beranda', 'auditor', 'auditor/home', 'admin', '2018-03-29', 'home', 3),
(7, 'Riwayat Ujian', 'auditor', 'auditor/RiwayatUjian', 'admin', '2018-03-29', 'book', 3),
(9, 'unit_apip', 'unit_apip', 'sertifikasi/unit_apip', 'admin', '2018-03-29', '', 6),
(10, 'Beranda', 'unit_apip', 'unit_apip/home', 'admin', '2018-03-29', 'home', 6),
(11, 'Daftar Ujian', 'unit_apip', 'unit_apip/Registrasi', 'admin', '2018-03-29', 'registered', 6),
(14, 'Hasil Ujian', 'unit_apip', 'unit_apip/HasilUjian', 'admin', '2018-03-29', 'line-chart', 6),
(15, 'Pengusulan Pengangkatan', 'unit_apip', 'unit_apip/PengusulanPengangkatan', 'admin', '2018-03-29', 'user', 6),
(16, 'Beranda', 'pusbin', 'pusbin/home', 'admin', '2018-03-29', 'home', 5),
(17, 'Manajemen Registrasi', 'pusbin', 'pusbin/ManagementRegistrasi', 'admin', '2018-03-29', 'registered', 5),
(20, 'Manajemen Pengguna', 'pusbin', 'pusbin/ManagementUser', 'admin', '2018-03-29', 'users', 5),
(21, 'Nilai WI', 'widyaiswara', 'widyaiswara/Nilai', 'admin', '2018-03-29', 'file-text-o', 4),
(22, 'Beranda', 'bpkp', 'bpkp/home', 'admin', '2018-03-29', 'home', 11),
(24, 'bpkp', 'bpkp', 'sertifikasi/bpkp', 'admin', '2018-03-29', '', 11),
(25, 'Daftar Unit Apip', 'bpkp', 'bpkp/registrasi', 'admin', '2018-03-29', 'registered', 11),
(26, 'bank_soal', 'bank_soal', 'sertifikasi/bank_soal', 'admin', '2018-05-07', '', 1),
(27, 'Beranda', 'bank_soal', 'bank_soal/admin/home', 'admin', '2018-05-07', 'home', 1),
(28, 'Monitoring Buat Soal', 'bank_soal', 'bank_soal/admin/AdminBankSoal', 'admin', '2018-05-07', 'key', 1),
(29, 'Manajemen Soal', 'bank_soal', 'bank_soal/admin/ManagementBankSoal', 'admin', '2018-05-12', 'dashboard', 1),
(30, 'Perhitungan Nilai', 'pusbin', 'pusbin/PerhitunganNilai', 'admin', '2018-07-06', 'line-chart', 5),
(31, 'Beranda', 'bank_soal', 'bank_soal/koreksi/home', 'admin', '2018-07-07', 'home', 18),
(32, 'Home', 'bank_soal', 'bank_soal/pembuat/home', 'admin', '2018-07-09', 'home', 20),
(33, 'Laporan', 'pusbin', 'pusbin/Report', 'admin', '2018-07-06', 'paperclip', 5),
(38, 'Pengusulan Pengangkatan', 'pusbin', 'pusbin/PengusulanPengangkatan', 'admin', '2018-07-06', 'user', 5),
(67, 'Manajemen Ujian', 'bank_soal', 'bank_soal/admin/ManagementUjian', 'admin', '2018-05-12', 'dashboard', 1),
(88, 'Home', 'fasilitas', 'fasilitas/home', 'admin', '2018-03-29', 'home', 28),
(89, 'Manajemen PERTEK', 'fasilitas', 'fasilitas/ManagementPertek', 'admin', '2018-03-29', 'home', 28);

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
(1, '1110', 'doc_surat_pengusulan/20180903/20180903_1110/pdf.pdf', '123456', 1, 2, '0', '1110', 'Perwakilan BPKP Provinsi Daerah Khusus Ibukota Jakarta', '1110', '2018-09-03'),
(2, '196709271988031001', 'doc_surat_pengusulan/20180914/20180914_1110/pdf (2).pdf', '1233', 1, 2, '', '1110', 'Perwakilan BPKP Provinsi Daerah Khusus Ibukota Jakarta', '1110', '2018-09-14');

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
  `FK_LOOKUP_STATUS_PERMINTAAN` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan_soal`
--

INSERT INTO `permintaan_soal` (`PK_PERMINTAAN_SOAL`, `FK_BAB_MATA_AJAR`, `TIPE_SOAL`, `TANGGAL_PERMINTAAN`, `JUMLAH_SOAL`, `STATUS`, `FK_LOOKUP_STATUS_PERMINTAAN`, `flag`) VALUES
(27, 3, 'Pilihan Ganda', '2018-08-31', 2, 'selesai', 27, 2),
(28, 3, 'Pilihan Ganda', '2018-09-14', 30, 'selesai', 27, 2);

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
(2, '123456', '', '123', 'http://localhost/bpkp/uploads/doc_pertek/pertek_123456.pdf', '2018-09-03', '', 'Soni Setiabudi', 'Bandung', '123', 'nurman,icin', '1110', '2018-09-03 00:00:00'),
(3, '1233', '', '', '', '0000-00-00', '', '', '', '', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_soal`
--

CREATE TABLE `pilihan_soal` (
  `PK_PILIHAN_SOAL` int(11) NOT NULL,
  `FK_SOAL_DISTRIBUSI` int(11) NOT NULL,
  `PILIHAN` varchar(150) NOT NULL,
  `STATUS` varchar(100) NOT NULL
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
(12, '07001500103500_180912144830', 2, '199503252018011001', 'unknown', 0, 0, 18, '123', '56', 'Test Admin', '2018-09-12', 1),
(13, '07001500103500_180914145419', 2, '199510312018011001', 'unknown', 0, 0, 18, '78h8', '90', 'Test Admin', '2018-09-14', 1);

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
  `NO_UJIAN` int(11) NOT NULL,
  `FLAG` int(11) NOT NULL,
  `PILIHAN_1` varchar(100) NOT NULL,
  `PILIHAN_2` varchar(100) NOT NULL,
  `PILIHAN_3` varchar(100) NOT NULL,
  `PILIHAN_4` varchar(100) NOT NULL,
  `JAWABAN` varchar(150) NOT NULL,
  `CREATED_AT` varchar(100) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal_distribusi`
--

INSERT INTO `soal_distribusi` (`PK_SOAL_DISTRIBUSI`, `FK_KODE_SOAL`, `FK_SOAL_UJIAN`, `NO_UJIAN`, `FLAG`, `PILIHAN_1`, `PILIHAN_2`, `PILIHAN_3`, `PILIHAN_4`, `JAWABAN`, `CREATED_AT`, `CREATED_DATE`) VALUES
(158, '12', 297, 1, 0, '13', '17', '14', '15', '2', 'admin_bank', '2018-09-14'),
(159, '12', 313, 2, 0, '13', '17', '12', '14', '3', 'admin_bank', '2018-09-14'),
(160, '12', 305, 3, 0, '20', '70', '50', '40', '4', 'admin_bank', '2018-09-14'),
(161, '12', 291, 4, 0, '2', '9', '6', '1', '2', 'admin_bank', '2018-09-14'),
(162, '12', 303, 5, 0, '12', '18', '13', '15', '2', 'admin_bank', '2018-09-14'),
(163, '12', 308, 6, 0, '80', '120', '100', '130', '2', 'admin_bank', '2018-09-14'),
(164, '12', 296, 7, 0, '22', '20', '21', '24', '3', 'admin_bank', '2018-09-14'),
(165, '12', 294, 8, 0, '18', '11', '15', '4', '2', 'admin_bank', '2018-09-14'),
(166, '12', 287, 9, 0, '3', '7', '5', '6', '4', 'admin_bank', '2018-09-14'),
(167, '12', 298, 10, 0, '6', '5', '3', '4', '1', 'admin_bank', '2018-09-14'),
(168, '12', 311, 11, 0, '25', '21', '23', '28', '2', 'admin_bank', '2018-09-14'),
(169, '12', 295, 12, 0, '23', '24', '15', '17', '2', 'admin_bank', '2018-09-14'),
(170, '12', 300, 13, 0, '26', '32', '31', '34', '2', 'admin_bank', '2018-09-14'),
(171, '12', 310, 14, 0, '12', '15', '14', '11', '4', 'admin_bank', '2018-09-14'),
(172, '12', 299, 15, 0, '15', '14', '12', '16', '4', 'admin_bank', '2018-09-14'),
(173, '12', 285, 16, 0, '8', '5', '1', '3', '4', 'admin_bank', '2018-09-14'),
(174, '12', 307, 17, 0, '50', '30', '90', '100', '4', 'admin_bank', '2018-09-14'),
(175, '12', 286, 18, 0, '6', '4', '9', '1', '2', 'admin_bank', '2018-09-14'),
(176, '12', 314, 19, 0, '8', '5', '7', '2', '4', 'admin_bank', '2018-09-14'),
(177, '12', 290, 20, 0, '4', '3', '7', '6', '2', 'admin_bank', '2018-09-14'),
(178, '12', 309, 21, 0, '21', '22', '23', '26', '2', 'admin_bank', '2018-09-14'),
(179, '12', 312, 22, 0, '26', '21', '20', '22', '3', 'admin_bank', '2018-09-14'),
(180, '12', 302, 23, 0, '32', '33', '37', '30', '1', 'admin_bank', '2018-09-14'),
(181, '12', 283, 24, 0, 'mangga', 'pepaya', 'kambing', 'nanas', '3', 'admin_bank', '2018-09-14'),
(182, '12', 288, 25, 0, '8', '1', '7', '6', '1', 'admin_bank', '2018-09-14'),
(183, '12', 306, 26, 0, '60', '30', '50', '70', '1', 'admin_bank', '2018-09-14'),
(184, '12', 301, 27, 0, '60', '30', '20', '10', '1', 'admin_bank', '2018-09-14'),
(185, '12', 292, 28, 0, '2', '7', '6', '1', '3', 'admin_bank', '2018-09-14'),
(186, '12', 284, 29, 0, 'beringin', 'asdj', 'nanas', 'jakarta', '4', 'admin_bank', '2018-09-14'),
(187, '12', 304, 30, 0, '14', '12', '11', '10', '4', 'admin_bank', '2018-09-14'),
(188, '17', 302, 1, 0, '32', '31', '30', '34', '1', 'admin_bank', '2018-09-14'),
(189, '17', 291, 2, 0, '9', '3', '6', '2', '1', 'admin_bank', '2018-09-14'),
(190, '17', 313, 3, 0, '17', '15', '18', '12', '4', 'admin_bank', '2018-09-14'),
(191, '17', 285, 4, 0, '8', '3', '2', '4', '2', 'admin_bank', '2018-09-14'),
(192, '17', 310, 5, 0, '14', '12', '18', '11', '4', 'admin_bank', '2018-09-14'),
(193, '17', 309, 6, 0, '22', '26', '24', '28', '1', 'admin_bank', '2018-09-14'),
(194, '17', 287, 7, 0, '6', '5', '2', '4', '1', 'admin_bank', '2018-09-14'),
(195, '17', 288, 8, 0, '7', '8', '3', '2', '2', 'admin_bank', '2018-09-14'),
(196, '17', 296, 9, 0, '22', '25', '21', '19', '3', 'admin_bank', '2018-09-14'),
(197, '17', 286, 10, 0, '7', '4', '9', '1', '2', 'admin_bank', '2018-09-14'),
(198, '17', 314, 11, 0, '5', '8', '6', '2', '4', 'admin_bank', '2018-09-14'),
(199, '17', 295, 12, 0, '24', '16', '17', '15', '1', 'admin_bank', '2018-09-14'),
(200, '17', 311, 13, 0, '21', '25', '27', '28', '1', 'admin_bank', '2018-09-14'),
(201, '17', 312, 14, 0, '25', '20', '22', '26', '2', 'admin_bank', '2018-09-14'),
(202, '17', 305, 15, 0, '70', '90', '40', '50', '3', 'admin_bank', '2018-09-14'),
(203, '17', 297, 16, 0, '13', '16', '15', '12', '1', 'admin_bank', '2018-09-14'),
(204, '17', 307, 17, 0, '90', '100', '40', '80', '2', 'admin_bank', '2018-09-14'),
(205, '17', 300, 18, 0, '35', '30', '25', '32', '4', 'admin_bank', '2018-09-14'),
(206, '17', 306, 19, 0, '80', '60', '50', '90', '2', 'admin_bank', '2018-09-14'),
(207, '17', 298, 20, 0, '5', '6', '8', '2', '2', 'admin_bank', '2018-09-14'),
(208, '17', 290, 21, 0, '1', '5', '3', '8', '3', 'admin_bank', '2018-09-14'),
(209, '17', 293, 22, 0, '11', '13', '17', '14', '1', 'admin_bank', '2018-09-14'),
(210, '17', 299, 23, 0, '16', '14', '17', '13', '1', 'admin_bank', '2018-09-14'),
(211, '17', 289, 24, 0, '3', '11', '6', '10', '4', 'admin_bank', '2018-09-14'),
(212, '17', 301, 25, 0, '10', '40', '50', '60', '4', 'admin_bank', '2018-09-14'),
(213, '17', 283, 26, 0, 'kambing', 'nanas', 'beringin', 'pepaya', '1', 'admin_bank', '2018-09-14'),
(214, '17', 303, 27, 0, '18', '17', '14', '16', '1', 'admin_bank', '2018-09-14'),
(215, '17', 292, 28, 0, '2', '5', '8', '6', '4', 'admin_bank', '2018-09-14'),
(216, '17', 294, 29, 0, '18', '11', '15', '12', '2', 'admin_bank', '2018-09-14'),
(217, '17', 284, 30, 0, 'apel', 'jakarta', 'pepaya', 'pisang', '2', 'admin_bank', '2018-09-14'),
(218, '17', 304, 31, 0, '10', '11', '13', '14', '1', 'admin_bank', '2018-09-14'),
(219, '17', 308, 32, 0, '60', '90', '120', '80', '3', 'admin_bank', '2018-09-14');

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
(283, 3, 27, NULL, 'nama hewan', '1', 'kambing', 'pepaya', 'pisang', 'nanas', 'apel', 'mangga', 'beringin', 'das', 1),
(284, 3, 27, NULL, 'ibukota indonesia', '8', 'asdj', 'pepaya', 'pisang', 'nanas', 'apel', 'mangga', 'beringin', 'jakarta', 1),
(285, 3, 28, NULL, '2+1 = ', '1', '3', '2', '4', '5', '6', '7', '8', '1', 1),
(286, 3, 28, NULL, '2+2=', '4', '3', '5', '1', '4', '7', '6', '8', '9', 1),
(287, 3, 28, NULL, '3+3=', '6', '1', '2', '3', '4', '5', '6', '7', '8', 1),
(288, 3, 28, NULL, '4+4=', '8', '1', '2', '3', '4', '5', '6', '7', '8', 1),
(289, 3, 28, NULL, '5+5=', '6', '2', '3', '4', '5', '6', '10', '8', '11', 1),
(290, 3, 28, NULL, '1+2=', '4', '1', '2', '4', '3', '5', '6', '7', '8', 1),
(291, 3, 28, NULL, '4+5=', '8', '1', '2', '3', '4', '5', '6', '8', '9', 1),
(292, 3, 28, NULL, '5+1=', '4', '2', '4', '5', '6', '7', '8', '9', '1', 1),
(293, 3, 28, NULL, '10+1=', '1', '11', '12', '13', '14', '15', '16', '17', '18', 1),
(294, 3, 28, NULL, '9+2=', '3', '12', '13', '11', '4', '15', '18', '19', '10', 1),
(295, 3, 28, NULL, '12+12=', '5', '15', '16', '17', '18', '24', '25', '26', '23', 1),
(296, 3, 28, NULL, '10+11=', '7', '19', '20', '22', '23', '24', '25', '21', '26', 1),
(297, 3, 28, NULL, '2+11=', '2', '12', '13', '14', '15', '16', '17', '18', '19', 1),
(298, 3, 28, NULL, '2+4=', '6', '1', '2', '3', '4', '5', '6', '7', '8', 1),
(299, 3, 28, NULL, '8+8=', '5', '12', '13', '14', '15', '16', '17', '18', '19', 1),
(300, 3, 28, NULL, '20+12=', '5', '25', '26', '30', '31', '32', '33', '34', '35', 1),
(301, 3, 28, NULL, '30+30=', '6', '10', '20', '30', '40', '50', '60', '70', '80', 1),
(302, 3, 28, NULL, '32-2=', '3', '30', '31', '32', '33', '34', '35', '36', '37', 1),
(303, 3, 28, NULL, '15+3=', '7', '12', '13', '14', '15', '16', '17', '18', '19', 1),
(304, 3, 28, NULL, '20-10=', '1', '10', '11', '12', '13', '14', '15', '16', '17', 1),
(305, 3, 28, NULL, '20+20=', '3', '20', '30', '40', '50', '60', '70', '80', '90', 1),
(306, 3, 28, NULL, '30+30=', '5', '20', '30', '40', '50', '60', '70', '80', '90', 1),
(307, 3, 28, NULL, '50+50=', '8', '30', '40', '50', '60', '70', '80', '90', '100', 1),
(308, 3, 28, NULL, '60+60=', '7', '60', '70', '80', '90', '100', '110', '120', '130', 1),
(309, 3, 28, NULL, '11+11=', '2', '21', '22', '23', '24', '25', '26', '27', '28', 1),
(310, 3, 28, NULL, '21-10=', '1', '11', '12', '13', '14', '15', '16', '17', '18', 1),
(311, 3, 28, NULL, '32-11=', '1', '21', '22', '23', '24', '25', '26', '27', '28', 1),
(312, 3, 28, NULL, '17+3=', '4', '21', '22', '23', '20', '24', '25', '26', '27', 1),
(313, 3, 28, NULL, '19-7=', '2', '11', '12', '13', '14', '15', '17', '16', '18', 1),
(314, 3, 28, NULL, '12-10=', '1', '2', '3', '4', '5', '6', '7', '8', '9', 1);

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
(8, 'review1', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 20),
(9, 'review2', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 20),
(10, 'subid', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 20),
(11, 'kapus', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 20),
(12, 'pembuat_soal', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 20),
(89, '1110', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 28),
(90, '15009835', '83d43e63e3dede73d9ac6fcc9af8619336c871cfbdadf4375f7dfbe62da04e27b12043130ee146c26efdb45fe354792faaadb8981d6ce37ad405948ffe95b012nDjtXZxgldfdOW4VimPPwl6l6QM9kPsfEEyIWbkFe1w=', 4);

-- --------------------------------------------------------

--
-- Table structure for table `widyaiswara_nilai`
--

CREATE TABLE `widyaiswara_nilai` (
  `PK_WIDYAISWARA_NILAI` int(11) NOT NULL,
  `NIP` varchar(150) DEFAULT NULL,
  `NAMA` varchar(150) NOT NULL,
  `TGL_RELEASE_MATA_AJAR` varchar(255) DEFAULT NULL,
  `FK_MATA_AJAR` int(10) NOT NULL,
  `NILAI_1` float NOT NULL,
  `NILAI_2` float NOT NULL,
  `NIP_INSTRUKTUR` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  `CREATED_BY` varchar(200) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `widyaiswara_nilai`
--

INSERT INTO `widyaiswara_nilai` (`PK_WIDYAISWARA_NILAI`, `NIP`, `NAMA`, `TGL_RELEASE_MATA_AJAR`, `FK_MATA_AJAR`, `NILAI_1`, `NILAI_2`, `NIP_INSTRUKTUR`, `flag`, `CREATED_BY`, `CREATED_DATE`) VALUES
(25, '199503252018011001', 'Soni', '2018-09-13', 13, 0, 0, '3', 1, 'Pusbin Budianto', '2018-09-03'),
(26, '199510312018011001', 'Nurman', '2018-09-13', 13, 0, 0, '3', 1, 'Pusbin Budianto', '2018-09-03'),
(29, '195301291982031008', 'Icin', '2018-09-10', 28, 0, 0, '3', 1, 'Pusbin Budianto', '2018-09-03');

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
-- Indexes for table `detail_jawaban_peserta`
--
ALTER TABLE `detail_jawaban_peserta`
  ADD KEY `indexing1` (`FK_JAWABAN_DETAIL`);

--
-- Indexes for table `detail_nilai_wi`
--
ALTER TABLE `detail_nilai_wi`
  ADD PRIMARY KEY (`PK_DETAIL_NILAI_WI`);

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
  ADD KEY `CN_KODE_DIKLAT` (`KODE_DIKLAT`);

--
-- Indexes for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  ADD PRIMARY KEY (`PK_JADWAL_UJIAN`);

--
-- Indexes for table `jawaban_peserta`
--
ALTER TABLE `jawaban_peserta`
  ADD PRIMARY KEY (`PK_JAWABAN_DETAIL`),
  ADD KEY `indexing1` (`FK_EVENT`,`KELAS`,`KODE_SOAL`);

--
-- Indexes for table `jawaban_peserta_COPY`
--
ALTER TABLE `jawaban_peserta_COPY`
  ADD PRIMARY KEY (`PK_JAWABAN_DETAIL`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`PK_JENJANG`) USING BTREE,
  ADD UNIQUE KEY `uniq1` (`KODE_DIKLAT`),
  ADD KEY `CN_GROUP_MATA_AJAR_LOOKUP` (`FK_LOOKUP_DIKLAT`),
  ADD KEY `CN_KODE_DIKLAT` (`KODE_DIKLAT`);

--
-- Indexes for table `kode_soal`
--
ALTER TABLE `kode_soal`
  ADD PRIMARY KEY (`PK_KODE_SOAL`),
  ADD KEY `indexing1` (`KODE_SOAL`),
  ADD KEY `indexing2` (`FK_MATA_AJAR`) USING BTREE;

--
-- Indexes for table `konfigurasi_ujian`
--
ALTER TABLE `konfigurasi_ujian`
  ADD PRIMARY KEY (`PK_KONFIG_UJIAN`),
  ADD UNIQUE KEY `uniq1` (`PIN`);

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
-- Indexes for table `pilihan_soal`
--
ALTER TABLE `pilihan_soal`
  ADD PRIMARY KEY (`PK_PILIHAN_SOAL`);

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
  ADD PRIMARY KEY (`PK_SOAL_DISTRIBUSI`),
  ADD KEY `indexing1` (`FK_KODE_SOAL`,`FK_SOAL_UJIAN`,`NO_UJIAN`),
  ADD KEY `indexing2` (`JAWABAN`,`NO_UJIAN`,`FK_KODE_SOAL`) USING BTREE;

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
  MODIFY `PK_ANGKA_KREDIT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bab_mata_ajar`
--
ALTER TABLE `bab_mata_ajar`
  MODIFY `PK_BAB_MATA_AJAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `PK_BATCH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bridge_lookup`
--
ALTER TABLE `bridge_lookup`
  MODIFY `id_bridge_lookup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_nilai_wi`
--
ALTER TABLE `detail_nilai_wi`
  MODIFY `PK_DETAIL_NILAI_WI` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `detail_permintaan_soal`
--
ALTER TABLE `detail_permintaan_soal`
  MODIFY `PK_DETAIL_PERMINTAAN_SOAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `document_pengusulan_pengangkatan`
--
ALTER TABLE `document_pengusulan_pengangkatan`
  MODIFY `PK_DOC_PENGUSULAN_PENGANGKATAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `dokumen_persetujuan`
--
ALTER TABLE `dokumen_persetujuan`
  MODIFY `PK_PERSETUJUAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `dokumen_registrasi_ujian`
--
ALTER TABLE `dokumen_registrasi_ujian`
  MODIFY `PK_DOC_REGIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `PK_EVENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `PK_JADWAL_UJIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jawaban_peserta`
--
ALTER TABLE `jawaban_peserta`
  MODIFY `PK_JAWABAN_DETAIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=735;

--
-- AUTO_INCREMENT for table `jawaban_peserta_COPY`
--
ALTER TABLE `jawaban_peserta_COPY`
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
  MODIFY `PK_KODE_SOAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `konfigurasi_ujian`
--
ALTER TABLE `konfigurasi_ujian`
  MODIFY `PK_KONFIG_UJIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lookup_ujian`
--
ALTER TABLE `lookup_ujian`
  MODIFY `PK_LOOKUP_REGIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  MODIFY `PK_PENGUSUL_PENGANGKATAN` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permintaan_soal`
--
ALTER TABLE `permintaan_soal`
  MODIFY `PK_PERMINTAAN_SOAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pertek`
--
ALTER TABLE `pertek`
  MODIFY `PK_PERTEK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pilihan_soal`
--
ALTER TABLE `pilihan_soal`
  MODIFY `PK_PILIHAN_SOAL` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `PK_PROVINSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `registrasi_ujian`
--
ALTER TABLE `registrasi_ujian`
  MODIFY `PK_REGIS_UJIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `soal_distribusi`
--
ALTER TABLE `soal_distribusi`
  MODIFY `PK_SOAL_DISTRIBUSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `soal_kasus`
--
ALTER TABLE `soal_kasus`
  MODIFY `PK_SOAL_KASUS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soal_ujian`
--
ALTER TABLE `soal_ujian`
  MODIFY `PK_SOAL_UJIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

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
  MODIFY `PK_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `widyaiswara_nilai`
--
ALTER TABLE `widyaiswara_nilai`
  MODIFY `PK_WIDYAISWARA_NILAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  ADD CONSTRAINT `event_cp1` FOREIGN KEY (`KODE_DIKLAT`) REFERENCES `jenjang` (`KODE_DIKLAT`);

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
