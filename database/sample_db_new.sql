-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2018 at 05:18 AM
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
  `CREATED_AT` varchar(150) DEFAULT NULL,
  `CREATED_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angka_kredit`
--

INSERT INTO `angka_kredit` (`PK_ANGKA_KREDIT`, `FK_PENGUSUL_PENGANGKATAN`, `PENDIDIKAN_SEKOLAH`, `DIKLAT`, `PENGAWASAN`, `PENGEMBANGAN_PROFESI`, `PENUNJANG`, `JUMLAH`, `TUNJANGAN_JABATAN`, `CREATED_AT`, `CREATED_DATE`) VALUES
(1, '26', 100, 100, 100, 100, 1001, 100, 100, NULL, '2018-08-13 00:00:00');

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
(1, 5, 'asd'),
(9, 5, 'Dasar Auditor'),
(12, 5, 'tester'),
(13, 5, 'tester'),
(14, 5, 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `PK_BATCH` int(11) NOT NULL,
  `FK_KODE_EVENT` varchar(150) NOT NULL,
  `KELAS` varchar(150) NOT NULL,
  `FK_JADWAL` int(11) NOT NULL,
  `REFF` varchar(150) NOT NULL,
  `CREATED_AT` varchar(150) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`PK_BATCH`, `FK_KODE_EVENT`, `KELAS`, `FK_JADWAL`, `REFF`, `CREATED_AT`, `CREATED_DATE`) VALUES
(1, '3', 'T-258     ', 17, 'qwer', 'Pusbin Budianto', '2018-07-08'),
(2, '4', '9iso', 18, '', 'Pusbin Budianto', '2018-08-02'),
(3, '3', 'asddasd', 18, 'asd', 'Pusbin Budianto', '2018-08-17'),
(4, '4', 'fghj', 18, '', 'Pusbin Budianto', '2018-08-17'),
(5, '5', 'yuib', 18, '', 'Pusbin Budianto', '2018-08-17');

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
-- Table structure for table `document_pengusulan_pengangkatan`
--

CREATE TABLE `document_pengusulan_pengangkatan` (
  `PK_DOC_PENGUSULAN_PENGANGKATAN` int(11) NOT NULL,
  `STATUS_DOC` varchar(150) NOT NULL,
  `CATEGORY_DOC` varchar(100) NOT NULL,
  `DOC_PENGUSULAN_PENGANGKATAN` text NOT NULL,
  `DATA_DOC` text NOT NULL,
  `FK_PENGUSUL_PENGANGKATAN` int(11) NOT NULL,
  `CREATED_AT` varchar(150) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_pengusulan_pengangkatan`
--

INSERT INTO `document_pengusulan_pengangkatan` (`PK_DOC_PENGUSULAN_PENGANGKATAN`, `STATUS_DOC`, `CATEGORY_DOC`, `DOC_PENGUSULAN_PENGANGKATAN`, `DATA_DOC`, `FK_PENGUSUL_PENGANGKATAN`, `CREATED_AT`, `CREATED_DATE`) VALUES
(9, '', '1', 'doc_cpns', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 26, '1110', '2018-08-15'),
(10, '', '1', 'doc_pns', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 26, '1110', '2018-08-15'),
(11, '', '1', 'doc_ijazah', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 26, '1110', '2018-08-15'),
(12, '', '1', 'doc_prajab', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 26, '1110', '2018-08-15'),
(13, '', '1', 'doc_sk_diklat', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 26, '1110', '2018-08-15'),
(16, '', '1', 'doc_penugasan', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 26, '1110', '2018-08-15'),
(17, '', '1', 'doc_sk_diklat2', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 26, '1110', '2018-08-15'),
(18, '', '1', 'doc_penugasan2', 'doc_pengangkatan/1_199909092009101025/pdf.pdf', 26, '1110', '2018-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `PK_EVENT` int(11) NOT NULL,
  `KODE_EVENT` varchar(100) NOT NULL,
  `NAMA_DIKLAT` varchar(150) NOT NULL,
  `URAIAN` text NOT NULL,
  `FK_PROVINSI` int(11) NOT NULL,
  `CREATED_AT` varchar(150) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`PK_EVENT`, `KODE_EVENT`, `NAMA_DIKLAT`, `URAIAN`, `FK_PROVINSI`, `CREATED_AT`, `CREATED_DATE`) VALUES
(3, '10119', 'Tester', 'tester', 13, 'Pusbin Budianto', '2018-07-08'),
(4, '51212', 'Auditor Madya', 'asd', 12, 'Pusbin Budianto', '2018-07-24'),
(5, '51219', 'Auditor Madya', 'tester', 13, 'Pusbin Budianto', '2018-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `group_mata_ajar`
--

CREATE TABLE `group_mata_ajar` (
  `PK_GROUP_MATA_AJAR` int(11) NOT NULL,
  `KODE_DIKLAT` int(11) NOT NULL,
  `NAMA_GROUP_MATA_AJAR` varchar(255) NOT NULL,
  `FK_LOOKUP_DIKLAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_mata_ajar`
--

INSERT INTO `group_mata_ajar` (`PK_GROUP_MATA_AJAR`, `KODE_DIKLAT`, `NAMA_GROUP_MATA_AJAR`, `FK_LOOKUP_DIKLAT`) VALUES
(1, 6, 'Auditor Utama', 16),
(2, 2, 'Auditor Ahli', 17),
(3, 5, 'Auditor Madya', 16),
(4, 4, 'Auditor Muda', 16),
(5, 1, 'Auditor Terampil', 17),
(6, 3, 'Pindah Jalur', 17);

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
(17, 'Gelombang 1', '07/25/2018', '07/28/2018'),
(18, 'Gelombang 2', '07/17/2018', '07/28/2018');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_peserta`
--

CREATE TABLE `jawaban_peserta` (
  `PK_JAWABAN_DETAIL` int(11) NOT NULL,
  `FK_KODE_EVENT` varchar(100) NOT NULL,
  `KODE_PESERTA` varchar(100) NOT NULL,
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
  `CREATED_AT` varchar(100) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_peserta`
--

INSERT INTO `jawaban_peserta` (`PK_JAWABAN_DETAIL`, `FK_KODE_EVENT`, `KODE_PESERTA`, `KODE_SOAL`, `KODE_UNIT`, `KELAS`, `NO_1`, `NO_2`, `NO_3`, `NO_4`, `NO_5`, `NO_6`, `NO_7`, `NO_8`, `NO_9`, `NO_10`, `NO_11`, `NO_12`, `NO_13`, `NO_14`, `NO_15`, `NO_16`, `NO_17`, `NO_18`, `NO_19`, `NO_20`, `NO_21`, `NO_22`, `NO_23`, `NO_24`, `NO_25`, `NO_26`, `NO_27`, `NO_28`, `NO_29`, `NO_30`, `NO_31`, `NO_32`, `NO_33`, `NO_34`, `NO_35`, `NO_36`, `NO_37`, `NO_38`, `NO_39`, `NO_40`, `NO_41`, `NO_42`, `NO_43`, `NO_44`, `NO_45`, `NO_46`, `NO_47`, `NO_48`, `NO_49`, `NO_50`, `Nilai`, `CREATED_AT`, `CREATED_DATE`) VALUES
(105, '10119', '199503252018011001', '061430', '0105120702', 'T-258     ', 'A', 'C', 'B', 'C', 'B', 'B', 'D', 'B', 'D', 'A', 'C', 'B', 'B', 'C', 'A', 'B', 'B', 'C', 'A', 'B', 'C', 'C', 'B', 'A', 'A', 'B', 'C', 'A', 'C', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '17', 'Pusbin Budianto', '2018-07-24'),
(106, '10119', '199510312018011001', '061430', '0105120702', 'T-258     ', 'C', 'A', 'A', 'A', 'D', 'C', 'B', 'A', 'B', 'A', 'D', 'A', 'D', 'C', 'C', 'B', 'A', 'A', 'B', 'B', 'C', 'C', 'D', 'A', 'C', 'D', 'D', 'B', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20', 'Pusbin Budianto', '2018-07-24'),
(107, '10119', '199602162018011001', '061430', '0105120701', 'T-258     ', 'C', 'D', 'A', 'D', 'B', 'B', 'D', 'C', 'B', 'C', 'D', 'B', 'D', 'C', 'A', 'B', 'A', 'A', 'C', 'B', 'C', 'C', 'C', 'A', 'C', 'A', 'D', 'A', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '17', 'Pusbin Budianto', '2018-07-24'),
(108, '10119', '199701042018012001', '061430', '0105120702', 'T-258     ', 'E', 'C', 'C', 'D', 'D', 'C', 'E', 'C', 'B', 'A', 'C', 'B', 'B', 'B', 'A', 'B', 'A', 'B', 'B', 'B', 'B', 'C', 'C', 'A', 'C', 'D', 'B', 'A', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '14', 'Pusbin Budianto', '2018-07-24'),
(109, '10119', '199611292018012001', '061430', '0105120702', 'T-258     ', 'D', 'B', 'D', 'C', 'D', 'B', 'B', 'A', 'D', 'A', 'D', 'B', 'C', 'B', 'A', 'B', 'D', 'A', 'A', 'B', 'C', 'C', 'B', 'A', 'C', 'B', 'A', 'B', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20', 'Pusbin Budianto', '2018-07-24'),
(110, '10119', '199606022018012001', '061430', '0105120702', 'T-258     ', 'C', 'A', 'B', 'D', 'B', 'C', 'B', 'B', 'B', 'A', 'D', 'B', 'D', 'C', 'A', 'B', 'C', 'A', 'B', 'B', 'C', 'C', 'B', 'A', 'C', 'D', 'D', 'B', 'C', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20', 'Pusbin Budianto', '2018-07-24'),
(111, '10119', '199604122018011001', '061430', '0105120702', 'T-258     ', 'C', 'D', 'B', 'D', 'B', 'A', 'C', 'D', 'B', 'A', 'C', 'B', 'A', 'C', 'D', 'B', 'B', 'A', 'A', 'D', 'C', 'C', 'B', 'A', 'C', 'D', 'D', 'B', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '30', 'Pusbin Budianto', '2018-07-24'),
(112, '10119', '199605032018011002', '061430', '0105120702', 'T-258     ', 'C', 'A', 'B', 'D', 'B', 'C', 'C', 'A', 'B', 'A', 'B', 'B', 'D', 'B', 'A', 'B', 'A', 'A', 'D', 'B', 'C', 'C', 'D', 'A', 'C', 'B', 'D', 'B', 'D', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '24', 'Pusbin Budianto', '2018-07-24'),
(113, '10119', '199504062018011003', '061430', '0105120702', 'T-258     ', 'C', 'C', 'B', 'A', 'D', 'D', 'C', 'B', 'B', 'B', 'D', 'B', 'D', 'A', 'B', 'B', 'C', 'A', 'B', 'B', 'C', 'C', 'D', 'A', 'C', 'C', 'C', 'B', 'D', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '34', 'Pusbin Budianto', '2018-07-24'),
(114, '10119', '199504222018011001', '061430', '0105120702', 'T-258     ', 'C', 'A', 'B', 'A', 'B', 'C', 'D', 'B', 'B', 'A', 'D', 'B', 'A', 'D', 'A', 'B', 'B', 'A', 'A', 'D', 'C', 'C', 'B', 'A', 'C', 'D', 'D', 'C', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '24', 'Pusbin Budianto', '2018-07-24'),
(115, '10119', '199606182018011002', '051430', '0105120702', 'T-258     ', 'C', 'C', 'C', 'A', 'C', 'C', 'D', 'B', 'D', 'A', 'B', 'C', 'A', 'C', 'B', 'B', 'C', 'B', 'B', 'A', 'C', 'B', 'A', 'A', 'A', 'B', 'C', 'D', 'D', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(116, '10119', '199610112018012001', '051430', '0105120702', 'T-258     ', 'C', 'C', 'C', 'A', 'C', 'D', 'D', 'B', 'C', 'A', 'C', 'A', 'B', 'C', 'B', 'C', 'A', 'A', 'B', 'B', 'D', 'B', 'D', 'C', 'D', 'B', 'C', 'A', 'C', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(117, '10119', '199603262018011001', '051430', '0105120702', 'T-258     ', 'C', 'C', 'B', 'A', 'D', 'C', 'A', 'A', 'A', 'A', 'B', 'D', 'B', 'B', 'B', 'C', 'D', 'D', 'B', 'A', 'D', 'B', 'A', 'C', 'A', 'B', 'D', 'A', 'C', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(118, '10119', '199505212018011001', '051430', '0105120702', 'T-258     ', 'C', 'C', 'C', 'A', 'C', 'B', 'A', 'C', 'D', 'A', 'B', 'C', 'B', 'C', 'D', 'C', 'C', 'A', 'B', 'C', 'D', 'B', 'D', 'A', 'B', 'B', 'C', 'A', 'A', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(119, '10119', '199603172018011001', '051430', '0105120702', 'T-258     ', 'A', 'C', 'C', 'A', 'B', 'A', 'D', 'A', 'D', 'A', 'C', 'C', 'B', 'C', 'B', 'C', 'A', 'A', 'D', 'A', 'D', 'B', 'C', 'C', 'A', 'B', 'A', 'A', 'C', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(120, '10119', '199604132018011002', '051430', '0105120702', 'T-258     ', 'A', 'C', 'B', 'A', 'B', 'A', 'D', 'A', 'D', 'A', 'C', 'C', 'B', 'C', 'B', 'C', 'A', 'B', 'D', 'A', 'D', 'B', 'C', 'C', 'A', 'B', 'A', 'A', 'B', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(121, '10119', '199607112018012003', '051430', '0105120702', 'T-258     ', 'C', 'C', 'B', 'A', 'C', 'D', 'D', 'B', 'A', 'A', 'C', 'A', 'B', 'D', 'B', 'C', 'C', 'A', 'B', 'B', 'D', 'B', 'D', 'A', 'A', 'B', 'C', 'A', 'D', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(122, '10119', '199511222018011001', '051430', '0105120702', 'T-258     ', 'C', 'C', 'D', 'A', 'D', 'B', 'D', 'A', 'D', 'A', 'D', 'D', 'D', 'A', 'D', 'C', 'D', 'A', 'D', 'A', 'C', 'B', 'A', 'B', 'C', 'B', 'D', 'C', 'B', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(123, '10119', '199511252018011002', '051430', '0105120702', 'T-258     ', 'C', 'C', 'B', 'A', 'C', 'B', 'D', 'A', 'D', 'A', 'C', 'B', 'B', 'A', 'D', 'D', 'A', 'B', 'D', 'C', 'D', 'B', 'A', 'B', 'D', 'B', 'A', 'A', 'C', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(124, '10119', '199602082018011003', '051430', '0105120702', 'T-258     ', 'C', 'C', 'B', 'A', 'C', 'D', 'C', 'B', 'C', 'A', 'C', 'C', 'B', 'B', 'B', 'C', 'C', 'D', 'B', 'A', 'D', 'B', 'D', 'C', 'A', 'B', 'C', 'A', 'D', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(125, '10119', '199504062018011003', '061410', '0105120702', 'T-258     ', 'C', 'A', 'A', 'C', 'C', 'C', 'A', 'B', 'C', 'D', 'C', 'C', 'C', 'A', 'D', 'B', 'A', 'D', 'B', 'D', 'D', 'C', 'B', 'A', 'C', 'D', 'D', 'C', 'A', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(126, '10119', '199605032018011002', '061410', '0105120702', 'T-258     ', 'C', 'C', 'A', 'B', 'C', 'B', 'A', 'D', 'C', 'C', 'C', 'B', 'D', 'D', 'A', 'C', 'A', 'C', 'D', 'D', 'D', 'C', 'B', 'A', 'C', 'D', 'A', 'C', 'B', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(127, '10119', '199604122018011001', '061410', '0105120702', 'T-258     ', 'C', 'C', 'B', 'D', 'C', 'C', 'A', 'D', 'C', 'D', 'C', 'C', 'C', 'D', 'B', 'B', 'A', 'A', 'B', 'D', 'D', 'C', 'C', 'A', 'C', 'D', 'C', 'C', 'A', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(128, '10119', '199611292018012001', '061410', '0105120702', 'T-258     ', 'C', 'C', 'B', 'D', 'C', 'C', 'D', 'B', 'A', 'A', 'D', 'D', 'C', 'D', 'D', 'A', 'A', 'D', 'A', 'D', 'D', 'C', 'B', 'A', 'C', 'D', 'C', 'C', 'A', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(129, '10119', '199701042018012001', '061410', '0105120702', 'T-258     ', 'C', 'C', 'B', 'A', 'C', 'C', 'D', 'B', 'C', 'B', 'C', 'B', 'C', 'A', 'D', 'A', 'A', 'D', 'B', 'D', 'D', 'C', 'B', 'A', 'C', 'D', 'C', 'C', 'A', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(130, '10119', '199602162018011001', '061410', '0105120702', 'T-258     ', 'C', 'C', 'B', 'D', 'C', 'C', 'D', 'B', 'C', 'D', 'C', 'C', 'C', 'D', 'D', 'A', 'A', 'C', 'B', 'D', 'D', 'C', 'B', 'A', 'C', 'D', 'C', 'C', 'B', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(131, '10119', '199510312018011001', '061410', '0105120702', 'T-258     ', 'C', 'D', 'C', 'D', 'C', 'C', 'A', 'B', 'C', 'D', 'C', 'C', 'D', 'D', 'D', 'A', 'A', 'A', 'D', 'D', 'D', 'B', 'B', 'A', 'C', 'B', 'C', 'C', 'B', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(132, '10119', '199503252018011001', '061410', '0105120702', 'T-258     ', 'C', 'C', 'A', 'D', 'C', 'C', 'D', 'B', 'C', 'B', 'A', 'C', 'D', 'A', 'C', 'A', 'A', 'D', 'B', 'D', 'D', 'A', 'B', 'A', 'A', 'D', 'C', 'C', 'A', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(133, '10119', '199504222018011001', '061410', '0105120702', 'T-258     ', 'C', 'C', 'A', 'D', 'C', 'B', 'D', 'D', 'C', 'A', 'C', 'C', 'C', 'D', 'C', 'A', 'A', 'D', 'B', 'D', 'D', 'C', 'B', 'A', 'C', 'D', 'C', 'C', 'A', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(134, '10119', '199606022018012001', '061410', '0105120702', 'T-258     ', 'C', 'C', 'B', 'C', 'B', 'C', 'D', 'B', 'C', 'B', 'C', 'C', 'C', 'D', 'C', 'A', 'A', 'A', 'B', 'D', 'D', 'C', 'C', 'A', 'C', 'D', 'C', 'C', 'A', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(135, '10119', '199511252018011002', '051410', '0105120702', 'T-258     ', 'D', 'C', 'B', 'A', 'C', 'D', 'C', 'C', 'A', 'D', 'C', 'C', 'B', 'A', 'B', 'C', 'D', 'B', 'B', 'C', 'A', 'C', 'D', 'D', 'C', 'C', 'B', 'D', 'A', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(136, '10119', '199511222018011001', '051410', '0105120702', 'T-258     ', 'D', 'C', 'B', 'A', 'D', 'D', 'C', 'C', 'A', 'D', 'C', 'C', 'B', 'D', 'B', 'C', 'D', 'B', 'C', 'C', 'C', 'C', 'C', 'A', 'C', 'A', 'C', 'A', 'B', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(137, '10119', '199607112018012003', '051410', '0105120702', 'T-258     ', 'D', 'C', 'B', 'A', 'C', 'D', 'C', 'C', 'A', 'D', 'C', 'C', 'B', 'D', 'C', 'C', 'D', 'A', 'C', 'D', 'B', 'C', 'C', 'D', 'B', 'A', 'A', 'D', 'B', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(138, '10119', '199604132018011002', '051410', '0105120702', 'T-258     ', 'D', 'C', 'B', 'A', 'B', 'D', 'A', 'C', 'A', 'D', 'C', 'C', 'B', 'D', 'C', 'A', 'D', 'A', 'C', 'D', 'D', 'D', 'D', 'A', 'C', 'A', 'B', 'D', 'B', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(139, '10119', '199603172018011001', '051410', '0105120702', 'T-258     ', 'D', 'B', 'B', 'A', 'C', 'D', 'C', 'C', 'A', 'D', 'C', 'B', 'A', 'D', 'C', 'C', 'D', 'D', 'C', 'D', 'C', 'C', 'D', 'A', 'B', 'A', 'A', 'A', 'B', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(140, '10119', '199505212018011001', '051410', '0105120702', 'T-258     ', 'D', 'B', 'C', 'A', 'C', 'B', 'C', 'C', 'A', 'B', 'C', 'C', 'B', 'D', 'C', 'C', 'A', 'B', 'C', 'D', 'B', 'B', 'C', 'D', 'A', 'C', 'A', 'D', 'B', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(141, '10119', '199603262018011001', '051410', '0105120702', 'T-258     ', 'D', 'C', 'A', 'A', 'C', 'D', 'C', 'C', 'A', 'D', 'C', 'C', 'B', 'D', 'C', 'C', 'A', 'B', 'B', 'B', 'C', 'B', 'C', 'D', 'C', 'C', 'B', 'C', 'B', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(142, '10119', '199610112018012001', '051410', '0105120702', 'T-258     ', 'D', 'C', 'B', 'A', 'D', 'D', 'B', 'C', 'A', 'D', 'C', 'C', 'B', 'D', 'C', 'C', 'D', 'A', 'C', 'D', 'B', 'C', 'C', 'D', 'D', 'C', 'A', 'D', 'B', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(143, '10119', '199606182018011002', '051410', '0105120702', 'T-258     ', 'D', 'C', 'A', 'A', 'C', 'B', 'C', 'C', 'A', 'D', 'C', 'C', 'C', 'D', 'C', 'C', 'D', 'A', 'C', 'B', 'D', 'A', 'C', 'D', 'D', 'A', 'A', 'A', 'C', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(144, '10119', '199602082018011003', '051410', '0105120702', 'T-258     ', 'D', 'C', 'B', 'A', 'C', 'B', 'C', 'C', 'A', 'B', 'C', 'C', 'B', 'D', 'C', 'C', 'A', 'B', 'C', 'D', 'B', 'B', 'C', 'A', 'C', 'C', 'A', 'D', 'B', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(145, '10119', '199504222018011001', '061440', '0105120702', 'T-258     ', 'C', 'C', 'A', 'B', 'A', 'A', 'C', 'D', 'B', 'E', 'C', 'D', 'B', 'B', 'C', 'A', 'D', 'D', 'B', 'A', 'C', 'B', 'D', 'B', 'D', 'D', 'C', 'A', 'C', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(146, '10119', '199503252018011001', '061440', '0105120702', 'T-258     ', 'C', 'C', 'A', 'C', 'B', 'A', 'A', 'D', 'B', 'D', 'C', 'B', 'B', 'A', 'C', 'A', 'D', 'D', 'A', 'C', 'B', 'B', 'D', 'C', 'D', 'D', 'C', 'A', 'C', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(147, '10119', '199510312018011001', '061440', '0105120702', 'T-258     ', 'A', 'C', 'A', 'B', 'A', 'C', 'B', 'D', 'B', 'C', 'C', 'D', 'A', 'A', 'A', 'A', 'D', 'D', 'B', 'C', 'C', 'A', 'C', 'B', 'D', 'D', 'A', 'A', 'C', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(148, '10119', '199602162018011001', '061440', '0105120702', 'T-258     ', 'C', 'D', 'A', 'B', 'B', 'A', 'B', 'D', 'B', 'D', 'C', 'D', 'B', 'B', 'A', 'A', 'D', 'D', 'B', 'C', 'C', 'C', 'D', 'B', 'D', 'D', 'C', 'A', 'C', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(149, '10119', '199606182018011002', '061440', '0105120702', 'T-258     ', 'C', 'B', 'D', 'B', 'A', 'B', 'A', 'D', 'B', 'D', 'C', 'A', 'B', 'A', 'C', 'B', 'D', 'D', 'B', 'A', 'C', 'B', 'C', 'B', 'D', 'C', 'C', 'A', 'C', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(150, '10119', '199604122018011001', '061440', '0105120702', 'T-258     ', 'C', 'C', 'D', 'B', 'A', 'B', 'A', 'D', 'B', 'C', 'C', 'B', 'A', 'A', 'A', 'A', 'D', 'D', 'B', 'A', 'C', 'B', 'C', 'C', 'D', 'D', 'C', 'A', 'C', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(151, '10119', '199605032018011002', '061440', '0105120702', 'T-258     ', 'C', 'C', 'A', 'B', 'A', 'B', 'B', 'D', 'B', 'C', 'C', 'D', 'A', 'D', 'A', 'B', 'D', 'D', 'B', 'C', 'C', 'A', 'C', 'B', 'D', 'D', 'C', 'A', 'C', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(152, '10119', '199504062018011003', '061440', '0105120702', 'T-258     ', 'C', 'B', 'A', 'B', 'A', 'B', 'A', 'D', 'B', 'A', 'C', 'B', 'A', 'B', 'C', 'A', 'D', 'D', 'B', 'B', 'B', 'D', 'C', 'B', 'D', 'C', 'C', 'A', 'C', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(153, '10119', '199603262018011001', '061440', '0105120702', 'T-258     ', 'C', 'C', 'D', 'B', 'B', 'B', 'B', 'D', 'B', 'C', 'C', 'D', 'B', 'A', 'C', 'A', 'D', 'D', 'B', 'C', 'C', 'A', 'C', 'B', 'D', 'D', 'C', 'A', 'C', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(154, '10119', '199606022018012001', '061440', '0105120702', 'T-258     ', 'C', 'C', 'D', 'B', 'A', 'A', 'C', 'D', 'B', 'C', 'C', 'B', 'C', 'B', 'C', 'A', 'D', 'D', 'B', 'C', 'C', 'B', 'D', 'B', 'D', 'B', 'C', 'A', 'C', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(155, '10119', '199701042018012001', '051440', '0105120702', 'T-258     ', 'C', 'B', 'C', 'B', 'D', 'D', 'C', 'A', 'C', 'D', 'C', 'C', 'A', 'B', 'A', 'B', 'C', 'D', 'B', 'D', 'C', 'D', 'A', 'A', 'C', 'A', 'D', 'D', 'D', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(156, '10119', '199610112018012001', '051440', '0105120702', 'T-258     ', 'C', 'C', 'C', 'C', 'D', 'D', 'C', 'A', 'C', 'B', 'C', 'C', 'D', 'B', 'B', 'B', 'C', 'D', 'B', 'C', 'C', 'B', 'B', 'A', 'C', 'A', 'D', 'D', 'B', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(157, '10119', '199611292018012001', '051440', '0105120702', 'T-258     ', 'C', 'C', 'C', 'C', 'D', 'B', 'C', 'A', 'D', 'B', 'C', 'B', 'A', 'B', 'B', 'B', 'B', 'D', 'B', 'C', 'C', 'D', 'A', 'B', 'A', 'B', 'D', 'B', 'B', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(158, '10119', '199505212018011001', '051440', '0105120702', 'T-258     ', 'C', 'B', 'A', 'A', 'D', 'B', 'C', 'A', 'C', 'B', 'C', 'C', 'A', 'B', 'B', 'B', 'C', 'D', 'B', 'C', 'C', 'B', 'A', 'A', 'C', 'A', 'D', 'D', 'D', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(159, '10119', '199603172018011001', '051440', '0105120702', 'T-258     ', 'C', 'B', 'D', 'B', 'D', 'D', 'C', 'A', 'C', 'B', 'C', 'C', 'D', 'B', 'A', 'A', 'B', 'D', 'B', 'C', 'C', 'A', 'B', 'A', 'C', 'C', 'D', 'D', 'B', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(160, '10119', '199607112018012003', '051440', '0105120702', 'T-258     ', 'B', 'B', 'D', 'B', 'D', 'B', 'C', 'A', 'C', 'B', 'C', 'C', 'D', 'B', 'A', 'B', 'B', 'D', 'B', 'C', 'C', 'B', 'A', 'B', 'A', 'A', 'D', 'D', 'D', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(161, '10119', '199604132018011002', '051440', '0105120702', 'T-258     ', 'C', 'B', 'C', 'B', 'D', 'D', 'C', 'A', 'C', 'B', 'C', 'B', 'D', 'C', 'B', 'A', 'C', 'D', 'B', 'C', 'C', 'C', 'D', 'B', 'C', 'D', 'D', 'B', 'B', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(162, '10119', '199511252018011002', '051440', '0105120702', 'T-258     ', 'C', 'B', 'A', 'B', 'C', 'A', 'C', 'D', 'C', 'D', 'C', 'A', 'A', 'D', 'B', 'A', 'D', 'D', 'B', 'C', 'C', 'A', 'B', 'C', 'C', 'B', 'D', 'A', 'D', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(163, '10119', '199511222018011001', '051440', '0105120702', 'T-258     ', 'C', 'A', 'C', 'B', 'D', 'B', 'C', 'A', 'D', 'B', 'C', 'D', 'A', 'B', 'A', 'B', 'C', 'D', 'A', 'C', 'C', 'D', 'B', 'A', 'A', 'D', 'D', 'A', 'B', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(164, '10119', '199602082018011003', '051440', '0105120702', 'T-258     ', 'C', 'B', 'C', 'B', 'D', 'B', 'C', 'A', 'C', 'B', 'C', 'C', 'D', 'B', 'A', 'B', 'C', 'D', 'B', 'C', 'C', 'B', 'A', 'B', 'C', 'A', 'D', 'D', 'B', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(165, '10119', '199602162018011001', '061420', '0105120702', 'T-258     ', 'C', 'A', 'D', 'A', 'B', 'B', 'C', 'A', 'C', 'D', 'C', 'D', 'C', 'B', 'C', 'C', 'A', 'B', 'D', 'A', 'D', 'C', 'A', 'B', 'C', 'B', 'B', 'C', 'D', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(166, '10119', '199510312018011001', '061420', '0105120702', 'T-258     ', 'D', 'B', 'B', 'C', 'B', 'A', 'C', 'B', 'C', 'D', 'A', 'D', 'C', 'D', 'A', 'B', 'A', 'B', 'C', 'B', 'D', 'A', 'B', 'A', 'C', 'C', 'C', 'C', 'D', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(167, '10119', '199604122018011001', '061420', '0105120702', 'T-258     ', 'C', 'B', 'C', 'C', 'B', 'B', 'C', 'A', 'C', 'D', 'D', 'D', 'A', 'A', 'C', 'D', 'A', 'C', 'C', 'B', 'D', 'B', 'C', 'C', 'A', 'D', 'A', 'C', 'D', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(168, '10119', '199605032018011002', '061420', '0105120702', 'T-258     ', 'C', 'B', 'D', 'A', 'B', 'B', 'C', 'C', 'C', 'D', 'A', 'D', 'C', 'C', 'C', 'B', 'A', 'A', 'C', 'B', 'D', 'A', 'B', 'B', 'C', 'B', 'B', 'C', 'D', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(169, '10119', '199606182018011002', '061420', '0105120702', 'T-258     ', 'D', 'D', 'B', 'A', 'B', 'B', 'C', 'A', 'C', 'D', 'C', 'D', 'C', 'A', 'A', 'C', 'A', 'D', 'C', 'B', 'D', 'A', 'C', 'A', 'A', 'B', 'B', 'A', 'D', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(170, '10119', '199603262018011001', '061420', '0105120702', 'T-258     ', 'A', 'A', 'D', 'A', 'B', 'B', 'C', 'B', 'C', 'D', 'B', 'D', 'C', 'D', 'C', 'C', 'A', 'A', 'C', 'B', 'D', 'B', 'B', 'B', 'C', 'B', 'C', 'C', 'D', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(171, '10119', '199606022018012001', '061420', '0105120702', 'T-258     ', 'B', 'B', 'D', 'C', 'B', 'B', 'C', 'C', 'C', 'D', 'D', 'B', 'C', 'B', 'B', 'B', 'A', 'B', 'C', 'C', 'D', 'B', 'C', 'B', 'A', 'A', 'B', 'C', 'D', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(172, '10119', '199503252018011001', '061420', '0105120702', 'T-258     ', 'A', 'A', 'A', 'C', 'A', 'A', 'C', 'C', 'C', 'D', 'C', 'B', 'B', 'B', 'C', 'C', 'C', 'A', 'B', 'B', 'D', 'A', 'A', 'B', 'B', 'D', 'B', 'C', 'D', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(173, '10119', '199504222018011001', '061420', '0105120702', 'T-258     ', 'C', 'A', 'D', 'C', 'B', 'B', 'C', 'D', 'C', 'D', 'B', 'B', 'C', 'C', 'B', 'B', 'A', 'C', 'C', 'B', 'D', 'A', 'B', 'A', 'C', 'D', 'A', 'C', 'D', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(174, '10119', '199504062018011003', '061420', '0105120702', 'T-258     ', 'C', 'B', 'D', 'A', 'B', 'B', 'C', 'A', 'C', 'D', 'A', 'D', 'C', 'B', 'C', 'B', 'A', 'B', 'C', 'B', 'D', 'A', 'B', 'B', 'C', 'B', 'A', 'C', 'D', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(175, '10119', '199611292018012001', '051420', '0105120702', 'T-258     ', 'D', 'C', 'D', 'A', 'C', 'D', 'A', 'C', 'A', 'C', 'B', 'D', 'B', 'A', 'A', 'B', 'C', 'B', 'C', 'D', 'B', 'D', 'C', 'B', 'B', 'C', 'A', 'B', 'C', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(176, '10119', '199511222018011001', '051420', '0105120702', 'T-258     ', 'D', 'C', 'B', 'B', 'A', 'B', 'A', 'A', 'A', 'A', 'C', 'B', 'A', 'C', 'B', 'B', 'C', 'C', 'C', 'C', 'C', 'A', 'C', 'D', 'C', 'B', 'A', 'C', 'C', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(177, '10119', '199511252018011002', '051420', '0105120702', 'T-258     ', 'D', 'A', 'B', 'C', 'C', 'D', 'C', 'C', 'D', 'D', 'C', 'A', 'C', 'C', 'B', 'B', 'C', 'B', 'C', 'A', 'D', 'D', 'C', 'D', 'C', 'B', 'A', 'A', 'C', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(178, '10119', '199610112018012001', '051420', '0105120702', 'T-258     ', 'D', 'C', 'C', 'B', 'C', 'A', 'B', 'C', 'D', 'D', 'C', 'B', 'C', 'A', 'B', 'B', 'C', 'D', 'C', 'D', 'D', 'D', 'C', 'D', 'D', 'B', 'A', 'A', 'D', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(179, '10119', '199607112018012003', '051420', '0105120702', 'T-258     ', 'D', 'B', 'C', 'B', 'B', 'D', 'B', 'C', 'D', 'B', 'C', 'B', 'D', 'C', 'B', 'D', 'C', 'D', 'C', 'D', 'D', 'B', 'C', 'B', 'C', 'B', 'C', 'B', 'C', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(180, '10119', '199603172018011001', '051420', '0105120702', 'T-258     ', 'D', 'C', 'B', 'C', 'C', 'A', 'A', 'C', 'D', 'D', 'B', 'D', 'C', 'A', 'B', 'B', 'C', 'C', 'C', 'D', 'C', 'D', 'A', 'C', 'C', 'C', 'A', 'A', 'C', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(181, '10119', '199604132018011002', '051420', '0105120702', 'T-258     ', 'D', 'C', 'B', 'C', 'C', 'A', 'A', 'C', 'D', 'D', 'B', 'D', 'C', 'A', 'B', 'B', 'C', 'C', 'C', 'D', 'D', 'D', 'C', 'A', 'C', 'B', 'A', 'B', 'C', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(182, '10119', '199505212018011001', '051420', '0105120702', 'T-258     ', 'D', 'B', 'B', 'C', 'C', 'B', 'B', 'C', 'D', 'C', 'B', 'A', 'D', 'A', 'B', 'A', 'C', 'A', 'C', 'C', 'C', 'B', 'C', 'A', 'C', 'B', 'A', 'B', 'C', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(183, '10119', '199701042018012001', '051420', '0105120702', 'T-258     ', 'D', 'C', 'B', 'A', 'B', 'E', 'B', 'C', 'D', 'C', 'C', 'B', 'B', 'D', 'B', 'A', 'C', 'B', 'C', 'D', 'A', 'B', 'A', 'B', 'C', 'B', 'A', 'A', 'C', 'E', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24'),
(184, '10119', '199602082018011003', '051420', '0105120702', 'T-258     ', 'D', 'B', 'B', 'B', 'C', 'D', 'A', 'C', 'D', 'D', 'B', 'B', 'D', 'A', 'B', 'B', 'C', 'C', 'C', 'D', 'D', 'B', 'C', 'B', 'C', 'B', 'A', 'C', 'C', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'Pusbin Budianto', '2018-07-24');

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
  `CREATED_AT` varchar(100) NOT NULL,
  `CREATED_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_soal`
--

INSERT INTO `kode_soal` (`PK_KODE_SOAL`, `KODE_SOAL`, `FK_MATA_AJAR`, `KEBUTUHAN_SOAL`, `PUBLISH`, `CREATED_AT`, `CREATED_DATE`) VALUES
(1, 'c45t', '5', 30, 1, 'admin_bank', '2018-08-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `list_persetujuan`
--

CREATE TABLE `list_persetujuan` (
  `PK_PERSETUJUAN` int(11) NOT NULL,
  `GROUP_REGIS` varchar(100) NOT NULL,
  `DOC_PERSETUJUAN` text NOT NULL,
  `CREATED_AT` varchar(100) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_persetujuan`
--

INSERT INTO `list_persetujuan` (`PK_PERSETUJUAN`, `GROUP_REGIS`, `DOC_PERSETUJUAN`, `CREATED_AT`, `CREATED_DATE`) VALUES
(8, '07001500103500_180530181629', 'doc_setuju/07001500103500_180530181629_180530181629/cv.pdf', 'Test Admin', '2018-05-30'),
(9, '07001500103500_180817151934', 'doc_setuju/07001500103500_180817151934_180817151934/pdf.pdf', 'Test Admin', '2018-08-17');

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
-- Table structure for table `lookup_registrasi`
--

CREATE TABLE `lookup_registrasi` (
  `PK_LOOKUP_REGIS` int(11) NOT NULL,
  `PK_REGIS_UJIAN` int(11) NOT NULL,
  `PK_MATA_AJAR` int(11) NOT NULL,
  `DOC_PERSETUJUAN` text NOT NULL,
  `CREATED_AT` varchar(150) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(28, 'Bank Soal', 'bank_soal', 'bank_soal/admin/AdminBankSoal', 'admin', '2018-05-07', 'key', 1),
(29, 'Management Bank Soal', 'bank_soal', 'bank_soal/admin/ManagementBankSoal', 'admin', '2018-05-12', 'dashboard', 1),
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
-- Table structure for table `pengusul_pengangkatan`
--

CREATE TABLE `pengusul_pengangkatan` (
  `PK_PENGUSUL_PENGANGKATAN` int(30) NOT NULL,
  `NIP` varchar(50) NOT NULL,
  `NAMA` varchar(150) NOT NULL,
  `DOC_SURAT_PENGUSULAN` text NOT NULL,
  `NO_SURAT` varchar(100) NOT NULL,
  `FK_STATUS_PENGUSUL_PENGANGKATAN` int(11) NOT NULL,
  `FK_STATUS_DOC` int(11) NOT NULL,
  `RESULT` varchar(100) NOT NULL,
  `VALIDATOR` text NOT NULL,
  `UNITKERJA` text NOT NULL,
  `CREATED_AT` varchar(100) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengusul_pengangkatan`
--

INSERT INTO `pengusul_pengangkatan` (`PK_PENGUSUL_PENGANGKATAN`, `NIP`, `NAMA`, `DOC_SURAT_PENGUSULAN`, `NO_SURAT`, `FK_STATUS_PENGUSUL_PENGANGKATAN`, `FK_STATUS_DOC`, `RESULT`, `VALIDATOR`, `UNITKERJA`, `CREATED_AT`, `CREATED_DATE`) VALUES
(26, '199909092009101025', 'Hafidz Hubaidillah', 'doc_surat_pengusulan/20180815/20180815_1110/pdf.pdf', '12/JFA/2001', 1, 2, '0', '1110', 'Perwakilan BPKP Provinsi Daerah Khusus Ibukota Jakarta', '1110', '2018-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_soal`
--

CREATE TABLE `permintaan_soal` (
  `PK_PERMINTAAN_SOAL` int(11) NOT NULL,
  `FK_BAB_MATA_AJAR` int(11) NOT NULL,
  `TIPE_SOAL` varchar(30) NOT NULL,
  `PEMBUAT_SOAL` varchar(255) NOT NULL,
  `REVIEW1` varchar(255) NOT NULL,
  `REVIEW2` varchar(255) NOT NULL,
  `TANGGAL_PERMINTAAN` date NOT NULL,
  `JUMLAH_SOAL` int(11) NOT NULL,
  `FK_LOOKUP_STATUS_PERMINTAAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan_soal`
--

INSERT INTO `permintaan_soal` (`PK_PERMINTAAN_SOAL`, `FK_BAB_MATA_AJAR`, `TIPE_SOAL`, `PEMBUAT_SOAL`, `REVIEW1`, `REVIEW2`, `TANGGAL_PERMINTAAN`, `JUMLAH_SOAL`, `FK_LOOKUP_STATUS_PERMINTAAN`) VALUES
(12, 1, 'Pilihan Ganda', 'pembuat_soal', 'review1', 'review2', '2018-07-10', 7, 24),
(13, 1, 'Pilihan Ganda', 'review1', 'review2', 'subid', '2018-07-25', 20, 27),
(14, 1, 'Pilihan Ganda', 'subid', 'review1', 'review2', '2018-07-26', 20, 27),
(15, 1, 'Pilihan Ganda', 'review1', 'review2', 'subid', '2018-08-20', 20, 27);

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
  `CREATED_AT` varchar(150) NOT NULL,
  `CREATED_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertek`
--

INSERT INTO `pertek` (`PK_PERTEK`, `NO_SURAT`, `DOC_ANGKA_KREDIT`, `NO_PERTEK`, `DOC_PERTEK`, `PERTEK_DATE`, `NO_RESI`, `YTH`, `TEMPAT`, `KEPALA`, `TEMBUSAN`, `CREATED_AT`, `CREATED_DATE`) VALUES
(2, '12/JFA/2001', '', '12333', 'http://localhost/bpkp/uploads/doc_pertek/pertek_12JFA2001.pdf', '2018-08-19', '', 'Soni Setiabudi', 'Jakarta', 'Kepala BPKP', 'asd', '1110', '2018-08-19 00:00:00');

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
  `LOKASI_UJIAN` varchar(150) NOT NULL,
  `PK_JADWAL_UJIAN` int(11) NOT NULL,
  `NO_SURAT_UJIAN` varchar(150) NOT NULL,
  `NILAI_KSP` varchar(150) NOT NULL,
  `DOC_NILAI_KSP` text NOT NULL,
  `DOC_FOTO` text NOT NULL,
  `CREATED_AT` varchar(100) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `PROVINSI` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrasi_ujian`
--

INSERT INTO `registrasi_ujian` (`PK_REGIS_UJIAN`, `GROUP_REGIS`, `KODE_DIKLAT`, `NIP`, `LOKASI_UJIAN`, `PK_JADWAL_UJIAN`, `NO_SURAT_UJIAN`, `NILAI_KSP`, `DOC_NILAI_KSP`, `DOC_FOTO`, `CREATED_AT`, `CREATED_DATE`, `PROVINSI`, `flag`) VALUES
(11, '', 6, '195808271981121001', '', 17, '123213', '90', 'doc_registrasi/195808271981121001_20180724/Soni Setiabudi(1).pdf', 'doc_registrasi/195808271981121001_20180724/av-2.jpg', 'Test Admin', '2018-07-24', 'unknown', 0);

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
(2, 'Negara Indonesia merdeka tanggal 17 agustus 1945, presiden pertama adalah ir soekarno', 9, 'soal-kasus-presiden'),
(3, 'negara indonesia dijajah pertama kali oleh belanda, hampir 100 tahun indonesia dijajah oleh belanda.', 9, 'kode-kasus-penjajahan');

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
(13, 'wi', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 4),
(14, '196006021982031001', '6fd2e40333fb23f04d2d43d909ff7099ecb8673250dc4b2160c2351db6ff7e13a983620165000c58bd4b35212b31310cb72a8ad468a35d480769e644806de7df+TZxJfbeTZF8obcGO9E/v0Pv3ZGW47l0Hdfs7erljd8=', 4),
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
  ADD PRIMARY KEY (`PK_BATCH`);

--
-- Indexes for table `bridge_lookup`
--
ALTER TABLE `bridge_lookup`
  ADD PRIMARY KEY (`id_bridge_lookup`);

--
-- Indexes for table `document_pengusulan_pengangkatan`
--
ALTER TABLE `document_pengusulan_pengangkatan`
  ADD PRIMARY KEY (`PK_DOC_PENGUSULAN_PENGANGKATAN`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`PK_EVENT`);

--
-- Indexes for table `group_mata_ajar`
--
ALTER TABLE `group_mata_ajar`
  ADD PRIMARY KEY (`PK_GROUP_MATA_AJAR`),
  ADD KEY `CN_GROUP_MATA_AJAR_LOOKUP` (`FK_LOOKUP_DIKLAT`);

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
-- Indexes for table `kode_soal`
--
ALTER TABLE `kode_soal`
  ADD PRIMARY KEY (`PK_KODE_SOAL`);

--
-- Indexes for table `list_persetujuan`
--
ALTER TABLE `list_persetujuan`
  ADD PRIMARY KEY (`PK_PERSETUJUAN`);

--
-- Indexes for table `lookup`
--
ALTER TABLE `lookup`
  ADD PRIMARY KEY (`PK_LOOKUP`);

--
-- Indexes for table `lookup_registrasi`
--
ALTER TABLE `lookup_registrasi`
  ADD PRIMARY KEY (`PK_LOOKUP_REGIS`);

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
-- Indexes for table `registrasi_ujian`
--
ALTER TABLE `registrasi_ujian`
  ADD PRIMARY KEY (`PK_REGIS_UJIAN`);

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
  MODIFY `PK_ANGKA_KREDIT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bab_mata_ajar`
--
ALTER TABLE `bab_mata_ajar`
  MODIFY `PK_BAB_MATA_AJAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `PK_BATCH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bridge_lookup`
--
ALTER TABLE `bridge_lookup`
  MODIFY `id_bridge_lookup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `document_pengusulan_pengangkatan`
--
ALTER TABLE `document_pengusulan_pengangkatan`
  MODIFY `PK_DOC_PENGUSULAN_PENGANGKATAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `PK_EVENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `group_mata_ajar`
--
ALTER TABLE `group_mata_ajar`
  MODIFY `PK_GROUP_MATA_AJAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `PK_JADWAL_UJIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jawaban_peserta`
--
ALTER TABLE `jawaban_peserta`
  MODIFY `PK_JAWABAN_DETAIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `kode_soal`
--
ALTER TABLE `kode_soal`
  MODIFY `PK_KODE_SOAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `list_persetujuan`
--
ALTER TABLE `list_persetujuan`
  MODIFY `PK_PERSETUJUAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lookup_registrasi`
--
ALTER TABLE `lookup_registrasi`
  MODIFY `PK_LOOKUP_REGIS` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `pengusul_pengangkatan`
--
ALTER TABLE `pengusul_pengangkatan`
  MODIFY `PK_PENGUSUL_PENGANGKATAN` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `permintaan_soal`
--
ALTER TABLE `permintaan_soal`
  MODIFY `PK_PERMINTAAN_SOAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pertek`
--
ALTER TABLE `pertek`
  MODIFY `PK_PERTEK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `perwakilan_bpkp`
--
ALTER TABLE `perwakilan_bpkp`
  MODIFY `PK_PERWAKILAN_BPKP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `PK_PROVINSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `registrasi_ujian`
--
ALTER TABLE `registrasi_ujian`
  MODIFY `PK_REGIS_UJIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `soal_distribusi`
--
ALTER TABLE `soal_distribusi`
  MODIFY `PK_SOAL_DISTRIBUSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

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
  MODIFY `PK_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

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
  ADD CONSTRAINT `CN_SOAL_BAB_MATA_AJAR` FOREIGN KEY (`FK_BAB_MATA_AJAR`) REFERENCES `bab_mata_ajar` (`PK_BAB_MATA_AJAR`),
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
