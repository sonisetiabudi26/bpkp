-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 03 Okt 2018 pada 03.53
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

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
-- Struktur dari tabel `angka_kredit`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `bab_mata_ajar`
--

CREATE TABLE `bab_mata_ajar` (
  `PK_BAB_MATA_AJAR` int(11) NOT NULL,
  `FK_MATA_AJAR` int(11) NOT NULL,
  `NAMA_BAB_MATA_AJAR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bab_mata_ajar`
--

INSERT INTO `bab_mata_ajar` (`PK_BAB_MATA_AJAR`, `FK_MATA_AJAR`, `NAMA_BAB_MATA_AJAR`) VALUES
(12, 12, 'BAB 1'),
(13, 12, 'BAB 2'),
(14, 6, 'BAB 1'),
(15, 6, 'BAB 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `batch`
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
-- Dumping data untuk tabel `batch`
--

INSERT INTO `batch` (`PK_BATCH`, `FK_EVENT`, `KELAS`, `FK_JADWAL`, `REFF`, `CREATED_BY`, `CREATED_DATE`) VALUES
(27, 31, 'Online', 18, 'Online', 'admin_bank', '2018-09-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bridge_lookup`
--

CREATE TABLE `bridge_lookup` (
  `id_bridge_lookup` int(11) NOT NULL,
  `PK_LOOKUP` int(11) NOT NULL,
  `ROLEGROUPID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bridge_lookup`
--

INSERT INTO `bridge_lookup` (`id_bridge_lookup`, `PK_LOOKUP`, `ROLEGROUPID`) VALUES
(1, 3, 'Level 4'),
(2, 6, 'Level 3'),
(3, 5, 'Level 1'),
(7, 11, 'Level 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jawaban_peserta`
--

CREATE TABLE `detail_jawaban_peserta` (
  `FK_JAWABAN_DETAIL` int(11) NOT NULL,
  `FK_SOAL_UJIAN` int(11) NOT NULL,
  `NO_UJIAN` int(11) NOT NULL,
  `JAWABAN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_nilai_wi`
--

CREATE TABLE `detail_nilai_wi` (
  `PK_DETAIL_NILAI_WI` int(15) NOT NULL,
  `FK_WIDYAISWARA_NILAI` int(150) NOT NULL,
  `NILAI_1` int(11) NOT NULL,
  `NILAI_2` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_nilai_wi`
--

INSERT INTO `detail_nilai_wi` (`PK_DETAIL_NILAI_WI`, `FK_WIDYAISWARA_NILAI`, `NILAI_1`, `NILAI_2`, `flag`) VALUES
(1, 38, 85, 80, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_permintaan_soal`
--

CREATE TABLE `detail_permintaan_soal` (
  `PK_DETAIL_PERMINTAAN_SOAL` int(11) NOT NULL,
  `FK_PERMINTAAN_SOAL` int(10) NOT NULL,
  `TUGAS` varchar(150) NOT NULL,
  `PETUGAS` varchar(100) NOT NULL,
  `COMMENT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_permintaan_soal`
--

INSERT INTO `detail_permintaan_soal` (`PK_DETAIL_PERMINTAAN_SOAL`, `FK_PERMINTAAN_SOAL`, `TUGAS`, `PETUGAS`, `COMMENT`) VALUES
(46, 38, 'pembuat_soal', 'pembuat_soal', ''),
(47, 38, 'review1', 'review1', ''),
(48, 38, 'review2', 'review2', ''),
(49, 38, 'review3', 'subid', ''),
(50, 38, 'review4', 'kapus', ''),
(51, 39, 'pembuat_soal', 'review1', ''),
(52, 39, 'review1', 'review2', ''),
(53, 39, 'review2', 'pembuat_soal', ''),
(54, 39, 'review3', 'subid', ''),
(55, 39, 'review4', 'kapus', ''),
(61, 41, 'pembuat_soal', 'pembuat_soal', ''),
(62, 41, 'review1', 'review1', ''),
(63, 41, 'review2', 'review2', ''),
(64, 41, 'review3', 'subid', ''),
(65, 41, 'review4', 'kapus', ''),
(66, 42, 'pembuat_soal', 'pembuat_soal', ''),
(67, 42, 'review1', 'review1', ''),
(68, 42, 'review2', 'review2', ''),
(69, 42, 'review3', 'subid', ''),
(70, 42, 'review4', 'kapus', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_sertifikat`
--

CREATE TABLE `detail_sertifikat` (
  `FK_SERTIFIKAT` int(11) NOT NULL,
  `FK_MATA_AJAR` int(11) NOT NULL,
  `NILAI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `document_pengusulan_pengangkatan`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_persetujuan`
--

CREATE TABLE `dokumen_persetujuan` (
  `PK_PERSETUJUAN` int(11) NOT NULL,
  `GROUP_REGIS` varchar(100) NOT NULL,
  `DOKUMEN` text NOT NULL,
  `CREATED_BY` varchar(100) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokumen_persetujuan`
--

INSERT INTO `dokumen_persetujuan` (`PK_PERSETUJUAN`, `GROUP_REGIS`, `DOKUMEN`, `CREATED_BY`, `CREATED_DATE`) VALUES
(36, '07001500103500_181001063913', 'doc_setuju/07001500103500_181001063913_181001063913/sertifikat_19.pdf', '1110', '2018-10-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_registrasi_ujian`
--

CREATE TABLE `dokumen_registrasi_ujian` (
  `PK_DOC_REGIS` int(11) NOT NULL,
  `FK_REGIS_UJIAN` int(50) NOT NULL,
  `DOCUMENT` text NOT NULL,
  `DOC_NAMA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokumen_registrasi_ujian`
--

INSERT INTO `dokumen_registrasi_ujian` (`PK_DOC_REGIS`, `FK_REGIS_UJIAN`, `DOCUMENT`, `DOC_NAMA`) VALUES
(36, 27, 'doc_registrasi/195808081985031002_20181001/sertifikat_19.pdf', 'doc_ksp'),
(37, 27, 'doc_registrasi/195808081985031002_20181001/1.jpg', 'doc_foto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
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
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`PK_EVENT`, `KODE_EVENT`, `KODE_DIKLAT`, `URAIAN`, `FK_PROVINSI`, `PASS_GRADE`, `CREATED_BY`, `CREATED_DATE`) VALUES
(31, '20918', 2, 'Online', 31, 70, 'admin_bank', '2018-09-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_ujian`
--

CREATE TABLE `jadwal_ujian` (
  `PK_JADWAL_UJIAN` int(11) NOT NULL,
  `CATEGORY` varchar(150) NOT NULL,
  `START_DATE` varchar(100) NOT NULL,
  `END_DATE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_ujian`
--

INSERT INTO `jadwal_ujian` (`PK_JADWAL_UJIAN`, `CATEGORY`, `START_DATE`, `END_DATE`) VALUES
(18, 'Gelombang 3', '11/13/2018', '11/15/2018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_peserta`
--

CREATE TABLE `jawaban_peserta` (
  `PK_JAWABAN_DETAIL` int(11) NOT NULL,
  `FK_EVENT` int(100) NOT NULL,
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
-- Dumping data untuk tabel `jawaban_peserta`
--

INSERT INTO `jawaban_peserta` (`PK_JAWABAN_DETAIL`, `FK_EVENT`, `KODE_PESERTA`, `TGL_UJIAN`, `KODE_SOAL`, `KODE_UNIT`, `KELAS`, `Nilai`, `PIN`, `CREATED_BY`, `CREATED_DATE`) VALUES
(745, 31, '195808081985031002', '2018-10-01', '', '1291010', 'Online', '', '392112', 'admin', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_peserta_copy`
--

CREATE TABLE `jawaban_peserta_copy` (
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
-- Struktur dari tabel `jenjang`
--

CREATE TABLE `jenjang` (
  `PK_JENJANG` int(11) NOT NULL,
  `KODE_DIKLAT` int(11) NOT NULL,
  `NAMA_JENJANG` varchar(255) NOT NULL,
  `KURIKULUM` varchar(4) NOT NULL,
  `FK_LOOKUP_DIKLAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenjang`
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
-- Struktur dari tabel `kode_soal`
--

CREATE TABLE `kode_soal` (
  `PK_KODE_SOAL` int(11) NOT NULL,
  `KODE_SOAL` varchar(150) NOT NULL,
  `FK_MATA_AJAR` int(11) NOT NULL,
  `KEBUTUHAN_SOAL` int(11) NOT NULL,
  `PUBLISH` int(11) NOT NULL,
  `CREATED_BY` varchar(100) NOT NULL,
  `CREATED_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kode_soal`
--

INSERT INTO `kode_soal` (`PK_KODE_SOAL`, `KODE_SOAL`, `FK_MATA_AJAR`, `KEBUTUHAN_SOAL`, `PUBLISH`, `CREATED_BY`, `CREATED_DATE`) VALUES
(26, '141001', 12, 10, 1, 'admin_bank', '2018-09-30 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi_ujian`
--

CREATE TABLE `konfigurasi_ujian` (
  `PK_KONFIG_UJIAN` int(11) NOT NULL,
  `DATE_TIME` date NOT NULL,
  `START_TIME` time NOT NULL,
  `END_TIME` time NOT NULL,
  `PIN` varchar(50) NOT NULL,
  `FK_MATA_AJAR` int(11) NOT NULL,
  `FK_EVENT` int(11) NOT NULL,
  `JUMLAH_SOAL` int(11) NOT NULL,
  `CREATED_BY` varchar(100) NOT NULL,
  `CREATED_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi_ujian`
--

INSERT INTO `konfigurasi_ujian` (`PK_KONFIG_UJIAN`, `DATE_TIME`, `START_TIME`, `END_TIME`, `PIN`, `FK_MATA_AJAR`, `FK_EVENT`, `JUMLAH_SOAL`, `CREATED_BY`, `CREATED_DATE`) VALUES
(12, '2018-10-03', '03:20:00', '23:30:00', '392112', 12, 31, 10, 'admin_bank', '2018-09-30 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lookup`
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
-- Dumping data untuk tabel `lookup`
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
-- Struktur dari tabel `lookup_group`
--

CREATE TABLE `lookup_group` (
  `LOOKUP_GROUP` varchar(255) DEFAULT NULL,
  `GROUP_DESCR` varchar(255) DEFAULT NULL,
  `IS_UPDATABLE` int(11) DEFAULT NULL,
  `IS_VIEWABLE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lookup_group`
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
-- Struktur dari tabel `lookup_ujian`
--

CREATE TABLE `lookup_ujian` (
  `PK_LOOKUP_REGIS` int(11) NOT NULL,
  `FK_REGIS_UJIAN` int(11) NOT NULL,
  `FK_MATA_AJAR` int(11) NOT NULL,
  `FK_JAWABAN_DETAIL` int(11) NOT NULL,
  `HASIL_UJIAN` float NOT NULL,
  `NILAI_KSP` int(11) NOT NULL,
  `NILAI_TOTAL` int(11) NOT NULL,
  `STATUS` varchar(15) NOT NULL,
  `CREATED_BY` varchar(150) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lookup_ujian`
--

INSERT INTO `lookup_ujian` (`PK_LOOKUP_REGIS`, `FK_REGIS_UJIAN`, `FK_MATA_AJAR`, `FK_JAWABAN_DETAIL`, `HASIL_UJIAN`, `NILAI_KSP`, `NILAI_TOTAL`, `STATUS`, `CREATED_BY`, `CREATED_DATE`, `flag`) VALUES
(80, 27, 12, 745, 90, 90, 80, 'LULUS', '1110', '2018-10-01', 0),
(81, 27, 13, 0, 0, 90, 0, '', '1110', '2018-10-01', 0),
(82, 27, 14, 0, 0, 90, 0, '', '1110', '2018-10-01', 0),
(83, 27, 15, 0, 0, 90, 0, '', '1110', '2018-10-01', 0),
(84, 27, 16, 0, 0, 90, 0, '', '1110', '2018-10-01', 0),
(85, 27, 17, 0, 0, 90, 0, '', '1110', '2018-10-01', 0),
(86, 27, 18, 0, 0, 90, 0, '', '1110', '2018-10-01', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_ajar`
--

CREATE TABLE `mata_ajar` (
  `PK_MATA_AJAR` int(11) NOT NULL,
  `KODE_MATA_AJAR` int(10) NOT NULL,
  `NAMA_MATA_AJAR` varchar(255) NOT NULL,
  `FK_JENJANG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_ajar`
--

INSERT INTO `mata_ajar` (`PK_MATA_AJAR`, `KODE_MATA_AJAR`, `NAMA_MATA_AJAR`, `FK_JENJANG`) VALUES
(6, 1410, 'Kode Etik dan Standar Audit Intern', 5),
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
-- Struktur dari tabel `menu_page`
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
-- Dumping data untuk tabel `menu_page`
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
(30, 'Koreksi hasil Ujian', 'pusbin', 'pusbin/PerhitunganNilai', 'admin', '2018-07-06', 'line-chart', 5),
(31, 'Beranda', 'bank_soal', 'bank_soal/koreksi/home', 'admin', '2018-07-07', 'home', 18),
(32, 'Home', 'bank_soal', 'bank_soal/pembuat/home', 'admin', '2018-07-09', 'home', 20),
(33, 'Laporan', 'pusbin', 'pusbin/Report', 'admin', '2018-07-06', 'paperclip', 5),
(38, 'Pengusulan Pengangkatan', 'pusbin', 'pusbin/PengusulanPengangkatan', 'admin', '2018-07-06', 'user', 5),
(55, 'petugas_lo', 'petugas_lo', 'sertifikasi/petugas_lo', 'admin', '2018-03-29', '', 17),
(56, 'Beranda', 'petugas_lo', 'petugas_lo/home', 'admin', '2018-03-29', 'home', 17),
(57, 'Daftar Ujian', 'petugas_lo', 'petugas_lo/Registrasi', 'admin', '2018-03-29', 'registered', 17),
(58, 'Hasil Ujian', 'petugas_lo', 'petugas_lo/HasilUjian', 'admin', '2018-03-29', 'line-chart', 17),
(67, 'Manajemen Ujian', 'bank_soal', 'bank_soal/admin/ManagementUjian', 'admin', '2018-05-12', 'dashboard', 1),
(88, 'Home', 'fasilitas', 'fasilitas/home', 'admin', '2018-03-29', 'home', 28),
(89, 'Manajemen PERTEK', 'fasilitas', 'fasilitas/ManagementPertek', 'admin', '2018-03-29', 'home', 28);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_page_detail`
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
-- Dumping data untuk tabel `menu_page_detail`
--

INSERT INTO `menu_page_detail` (`PK_MENU_DETAIL`, `MENU_NAME`, `MENU_URL`, `DETAIL_CREATED_BY`, `DETAIL_CREATED_DATE`, `MENU_ICON`, `FK_MENU_PAGE`) VALUES
(1, 'Dashboard', 'dashboard.php', 'admin', '2018-03-26', '', 1),
(2, 'Ujian', 'ujian.php', 'admin', '2018-03-26', '', 1),
(3, 'Riwayat Ujian', 'riwayat_ujian.php', 'admin', '2018-03-26', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengusul_pengangkatan`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_soal`
--

CREATE TABLE `permintaan_soal` (
  `PK_PERMINTAAN_SOAL` int(11) NOT NULL,
  `FK_BAB_MATA_AJAR` int(11) NOT NULL,
  `TIPE_SOAL` varchar(30) NOT NULL,
  `TANGGAL_PERMINTAAN` date NOT NULL,
  `JUMLAH_SOAL` int(11) NOT NULL,
  `FK_LOOKUP_STATUS_PERMINTAAN` int(11) NOT NULL,
  `STATUS` varchar(150) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permintaan_soal`
--

INSERT INTO `permintaan_soal` (`PK_PERMINTAAN_SOAL`, `FK_BAB_MATA_AJAR`, `TIPE_SOAL`, `TANGGAL_PERMINTAAN`, `JUMLAH_SOAL`, `FK_LOOKUP_STATUS_PERMINTAAN`, `STATUS`, `flag`) VALUES
(38, 12, 'Pilihan Ganda', '2018-09-28', 5, 27, 'selesai', 2),
(39, 13, 'Pilihan Ganda', '2018-09-28', 5, 27, 'selesai', 2),
(41, 14, 'Pilihan Ganda', '2018-09-29', 2, 27, 'selesai', 2),
(42, 15, 'Pilihan Ganda', '2018-09-29', 2, 27, 'selesai', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertek`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `pilihan_soal`
--

CREATE TABLE `pilihan_soal` (
  `PK_PILIHAN_SOAL` int(11) NOT NULL,
  `FK_SOAL_DISTRIBUSI` int(11) NOT NULL,
  `PILIHAN` varchar(150) NOT NULL,
  `STATUS` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `PK_PROVINSI` int(11) NOT NULL,
  `NAMA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
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
(31, 'DAERAH KHUSUS IBUKOTA JAKARTA'),
(32, 'JAWA BARAT'),
(33, 'JAWA TENGAH'),
(34, 'DAERAH ISTIMEWA YOGYAKARTA'),
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
-- Struktur dari tabel `reff_simdiklat`
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
-- Dumping data untuk tabel `reff_simdiklat`
--

INSERT INTO `reff_simdiklat` (`id_kaldik`, `NamaDiklat`, `RlsTglMulai`, `RlsTglSelesai`, `NoUrutSTTPM`, `TglSTTPM`, `KodeJenisDiklat`, `NamaJenisDiklat`, `NIP`, `NamaGroupJabatan`, `KodeGroupJabatan`) VALUES
(1, 'Tester', '2018-07-08', '2018-07-08', 12, '2018-07-09', 1, 'testers', 211234, 'tester group', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasi_ujian`
--

CREATE TABLE `registrasi_ujian` (
  `PK_REGIS_UJIAN` int(11) NOT NULL,
  `GROUP_REGIS` varchar(50) NOT NULL,
  `KODE_DIKLAT` int(11) NOT NULL,
  `NIP` varchar(150) NOT NULL,
  `NAMA` varchar(200) NOT NULL,
  `PROVINSI` int(100) NOT NULL,
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
-- Dumping data untuk tabel `registrasi_ujian`
--

INSERT INTO `registrasi_ujian` (`PK_REGIS_UJIAN`, `GROUP_REGIS`, `KODE_DIKLAT`, `NIP`, `NAMA`, `PROVINSI`, `PINDAH_BERKAS`, `LOKASI_UJIAN`, `FK_JADWAL_UJIAN`, `NO_SURAT_UJIAN`, `NILAI_KSP`, `CREATED_BY`, `CREATED_DATE`, `flag`) VALUES
(27, '07001500103500_181001063913', 2, '195808081985031002', ' Alimuddin,  S.E.', 31, 0, 31, 18, '12', '90', '1110', '2018-10-01', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `review_soal`
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
-- Struktur dari tabel `sertifikasi_jfa`
--

CREATE TABLE `sertifikasi_jfa` (
  `PK_SERTIFIKASI` int(11) NOT NULL,
  `SERTIFIKASI_SERTIFIKAT` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertifikat`
--

CREATE TABLE `sertifikat` (
  `PK_SERTIFIKAT` int(11) NOT NULL,
  `FK_REGIS_UJIAN` int(11) NOT NULL,
  `NOMOR_SERTIFIKAT` varchar(150) NOT NULL,
  `A_N` varchar(100) NOT NULL,
  `NAMA_KEPALA` varchar(150) NOT NULL,
  `NIP_KEPALA` int(11) NOT NULL,
  `NAMA_KEPALA_PUSAT` varchar(150) NOT NULL,
  `NIP_KEPALA_PUSAT` int(11) NOT NULL,
  `CREATED_BY` varchar(100) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_distribusi`
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
-- Dumping data untuk tabel `soal_distribusi`
--

INSERT INTO `soal_distribusi` (`PK_SOAL_DISTRIBUSI`, `FK_KODE_SOAL`, `FK_SOAL_UJIAN`, `NO_UJIAN`, `FLAG`, `PILIHAN_1`, `PILIHAN_2`, `PILIHAN_3`, `PILIHAN_4`, `JAWABAN`, `CREATED_AT`, `CREATED_DATE`) VALUES
(224, '21', 336, 1, 0, '', '4', '3', '1', '2', 'admin_bank', '2018-09-21'),
(225, '21', 335, 2, 0, '42', '45', '', '43', '2', 'admin_bank', '2018-09-21'),
(226, '21', 337, 3, 0, '3', '5', '', '4', '4', 'admin_bank', '2018-09-21'),
(227, '21', 339, 4, 0, '', '3', '1', '4', '4', 'admin_bank', '2018-09-21'),
(228, '21', 338, 5, 0, '1', '', '', '2', '4', 'admin_bank', '2018-09-21'),
(229, '21', 340, 6, 0, '', '', '', '2', '4', 'admin_bank', '2018-09-21'),
(240, '24', 348, 1, 0, '', 'bandung', '', 'jakarta', '4', 'admin_bank', '2018-09-29'),
(241, '24', 351, 2, 0, '', '', '7', '8', '3', 'admin_bank', '2018-09-29'),
(242, '24', 349, 3, 0, '1', '', '3', '2', '4', 'admin_bank', '2018-09-29'),
(243, '24', 347, 4, 0, '9', '7', '8', '', '3', 'admin_bank', '2018-09-29'),
(244, '24', 350, 5, 0, '5', '', '', '4', '4', 'admin_bank', '2018-09-29'),
(245, '24', 356, 6, 0, '', '8', '7', '', '3', 'admin_bank', '2018-09-29'),
(246, '24', 358, 7, 0, 'efgh', 'ijkl', '27 Agustus 1945', '17 Agustus 1945', '4', 'admin_bank', '2018-09-29'),
(247, '24', 354, 8, 0, '', '8', '', '', '2', 'admin_bank', '2018-09-29'),
(248, '24', 352, 9, 0, '10', '', '9', '', '1', 'admin_bank', '2018-09-29'),
(249, '24', 357, 10, 0, 'Soekarno', 'soeharto', 'megawati', 'abcd', '1', 'admin_bank', '2018-09-29'),
(250, '25', 359, 1, 0, 'bangku', '', 'anjing', '', '3', 'admin_bank', '2018-09-29'),
(251, '25', 360, 2, 0, '', '', 'bandung', 'jakarta', '4', 'admin_bank', '2018-09-29'),
(252, '25', 361, 3, 0, '', '5', '', '', '2', 'admin_bank', '2018-09-29'),
(253, '25', 362, 4, 0, '', '7', '9', '8', '3', 'admin_bank', '2018-09-29'),
(254, '26', 349, 1, 0, '4', '1', '', '2', '4', 'admin_bank', '2018-09-30'),
(255, '26', 348, 2, 0, '', 'jakarta', 'bogor', 'bandung', '2', 'admin_bank', '2018-09-30'),
(256, '26', 347, 3, 0, '6', '8', '', '', '2', 'admin_bank', '2018-09-30'),
(257, '26', 350, 4, 0, '', '2', '4', '', '3', 'admin_bank', '2018-09-30'),
(258, '26', 351, 5, 0, '7', '', '', '', '1', 'admin_bank', '2018-09-30'),
(259, '26', 358, 6, 0, '17 Agustus 1945', '10 Maret 1990', 'ijkl', '27 Agustus 1945', '1', 'admin_bank', '2018-09-30'),
(260, '26', 353, 7, 0, '5', '4', '', '7', '1', 'admin_bank', '2018-09-30'),
(261, '26', 367, 8, 0, 'megawati', 'ijkl', 'amien rais', 'Soekarno', '1', 'admin_bank', '2018-09-30'),
(262, '26', 352, 9, 0, '9', '', '10', '', '3', 'admin_bank', '2018-09-30'),
(263, '26', 372, 10, 0, 'ijkl', 'mnop', '27 Agustus 1945', '17 Agustus 1945', '2', 'admin_bank', '2018-09-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_kasus`
--

CREATE TABLE `soal_kasus` (
  `PK_SOAL_KASUS` int(11) NOT NULL,
  `SOAL_KASUS` varchar(1000) NOT NULL,
  `FK_BAB_MATA_AJAR` int(11) NOT NULL,
  `KODE_KASUS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal_kasus`
--

INSERT INTO `soal_kasus` (`PK_SOAL_KASUS`, `SOAL_KASUS`, `FK_BAB_MATA_AJAR`, `KODE_KASUS`) VALUES
(2, 'Negara Indonesia merdeka tanggal 17 agustus 1945, presiden pertama adalah ir soekarno', 1, 'soal-kasus-presiden');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_ujian`
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
-- Dumping data untuk tabel `soal_ujian`
--

INSERT INTO `soal_ujian` (`PK_SOAL_UJIAN`, `FK_BAB_MATA_AJAR`, `FK_PERMINTAAN_SOAL`, `PARENT_SOAL`, `PERTANYAAN`, `JAWABAN`, `PILIHAN_1`, `PILIHAN_2`, `PILIHAN_3`, `PILIHAN_4`, `PILIHAN_5`, `PILIHAN_6`, `PILIHAN_7`, `PILIHAN_8`, `TAMPIL_UJIAN`) VALUES
(333, 6, 31, NULL, '11+11=', '2', '21', '22', '23', '24', '', '', '', '', 1),
(334, 6, 31, NULL, 'nama hewan', '1', 'kuda', 'laci', 'kunci', 'lemari', '', '', '', '', 1),
(335, 7, 32, NULL, '22+23=', '4', '41', '42', '43', '45', '', '', '', '', 1),
(336, 7, 32, NULL, 'kuda memiliki kaki', '4', '1', '3', '2', '4', '', '', '', '', 1),
(337, 8, 33, NULL, 'kucing berkaki...', '3', '2', '3', '4', '5', '', '', '', '', 0),
(338, 8, 33, NULL, 'ayam berkaki..', '2', '1', '2', '3', '4', '', '', '', '', 0),
(339, 8, 34, NULL, 'kucing berkaki..', '4', '1', '2', '3', '4', '', '', '', '', 1),
(340, 8, 34, NULL, 'ayam berkaki..', '2', '1', '2', '3', '4', '', '', '', '', 1),
(341, 9, 35, NULL, 'mata ada..?', '2', '1', '2', '4', '3', '', '', '', '', 1),
(342, 9, 35, NULL, 'kuping manusia ada ..?', '1', '2', '3', '4', '5', '', '', '', '', 1),
(343, 10, 36, NULL, '5+5=', '4', '11', '12', '13', '10', '', '', '', '', 1),
(344, 10, 36, NULL, '6+6=', '2', '11', '12', '13', '14', '', '', '', '', 1),
(345, 11, 37, NULL, '12+13 =', '3', '23', '24', '25', '26', '', '', '', '', 1),
(346, 11, 37, NULL, '8-1=', '2', '6', '7', '8', '9', '', '', '', '', 1),
(347, 12, 38, NULL, '3+5=', '3', '6', '7', '8', '9', '', '', '', '', 1),
(348, 12, 38, NULL, 'ibukota indoesia', '1', 'jakarta', 'Bekasi', 'bogor', 'bandung', '', '', '', '', 1),
(349, 12, 38, NULL, '1+1 =', '2', '1', '2', '3', '4', '', '', '', '', 1),
(350, 12, 38, NULL, '2+2 =', '3', '2', '3', '4', '5', '', '', '', '', 1),
(351, 12, 38, NULL, '2+5=', '3', '5', '6', '7', '8', '', '', '', '', 1),
(352, 13, 39, NULL, '5+5=', '4', '7', '8', '9', '10', '', '', '', '', 1),
(353, 13, 39, NULL, '4+1=', '2', '4', '5', '6', '7', '', '', '', '', 1),
(354, 13, 39, NULL, '6+2=', '3', '6', '7', '8', '9', '', '', '', '', 1),
(355, 13, 39, NULL, '10 + 10 =', '1', '20', '11', '14', '15', '', '', '', '', 1),
(356, 13, 39, NULL, '3+4=', '2', '6', '7', '8', '9', '', '', '', '', 1),
(357, 13, 40, NULL, 'Siapa Nama Presiden Indonesia pertama?', '1', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(358, 13, 40, NULL, 'Tanggal kemerdekaan indonesia?', '2', '27 Agustus 1945', '17 Agustus 1945', '10 Maret 1990', '7 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(359, 14, 41, NULL, 'nama hewan', '3', 'bangku', 'kursi', 'anjing', 'sepatu', '', '', '', '', 1),
(360, 14, 41, NULL, 'ibukota indoesia', '1', 'jakarta', 'singapura', 'bogor', 'bandung', '', '', '', '', 1),
(361, 15, 42, NULL, '3+2=', '3', '3', '4', '5', '6', '', '', '', '', 1),
(362, 15, 42, NULL, '7+2=', '4', '6', '7', '8', '9', '', '', '', '', 1),
(363, 13, 40, NULL, 'Siapa Nama Presiden Indonesia pertama?', '1', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(364, 13, 40, NULL, 'Tanggal kemerdekaan indonesia?', '2', '27 Agustus 1945', '17 Agustus 1945', '10 Maret 1990', '7 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(365, 13, 40, NULL, 'Siapa Nama Presiden Indonesia pertama?', '1', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(366, 13, 40, NULL, 'Tanggal kemerdekaan indonesia?', '2', '27 Agustus 1945', '17 Agustus 1945', '10 Maret 1990', '7 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(367, 13, 40, NULL, 'Siapa Nama Presiden Indonesia pertama?', '3', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(368, 13, 40, NULL, 'Tanggal kemerdekaan indonesia?', '4', '27 Agustus 1945', '17 Agustus 1945', '11 Maret 1990', '8 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(369, 13, 40, NULL, 'Siapa Nama Presiden Indonesia pertama?', '5', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(370, 13, 40, NULL, 'Tanggal kemerdekaan indonesia?', '6', '27 Agustus 1945', '17 Agustus 1945', '12 Maret 1990', '9 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(371, 13, 40, NULL, 'Siapa Nama Presiden Indonesia pertama?', '7', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(372, 13, 40, NULL, 'Tanggal kemerdekaan indonesia?', '8', '27 Agustus 1945', '17 Agustus 1945', '13 Maret 1990', '10 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(373, 13, 40, NULL, 'Siapa Nama Presiden Indonesia pertama?', '9', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(374, 15, 44, NULL, 'Siapa Nama Presiden Indonesia pertama?', '1', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(375, 15, 44, NULL, 'Tanggal kemerdekaan indonesia?', '2', '27 Agustus 1945', '17 Agustus 1945', '10 Maret 1990', '7 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(376, 15, 44, NULL, 'Siapa Nama Presiden Indonesia pertama?', '3', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(377, 15, 44, NULL, 'Tanggal kemerdekaan indonesia?', '4', '27 Agustus 1945', '17 Agustus 1945', '11 Maret 1990', '8 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(378, 15, 44, NULL, 'Siapa Nama Presiden Indonesia pertama?', '5', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(379, 15, 44, NULL, 'Tanggal kemerdekaan indonesia?', '6', '27 Agustus 1945', '17 Agustus 1945', '12 Maret 1990', '9 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(380, 15, 44, NULL, 'Siapa Nama Presiden Indonesia pertama?', '7', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(381, 15, 44, NULL, 'Tanggal kemerdekaan indonesia?', '8', '27 Agustus 1945', '17 Agustus 1945', '13 Maret 1990', '10 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(382, 15, 44, NULL, 'Siapa Nama Presiden Indonesia pertama?', '9', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(383, 15, 44, NULL, '2+2 =', '2', '3', '4', '5', '6', '', '', '', '', 0),
(384, 15, 44, NULL, '', '1', '', '', '', '', '', '', '', '', 0),
(385, 15, 45, NULL, 'Siapa Nama Presiden Indonesia pertama?', '1', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(386, 15, 45, NULL, 'Tanggal kemerdekaan indonesia?', '2', '27 Agustus 1945', '17 Agustus 1945', '10 Maret 1990', '7 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(387, 15, 45, NULL, 'Siapa Nama Presiden Indonesia pertama?', '3', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(388, 15, 45, NULL, 'Tanggal kemerdekaan indonesia?', '4', '27 Agustus 1945', '17 Agustus 1945', '11 Maret 1990', '8 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(389, 15, 45, NULL, 'Siapa Nama Presiden Indonesia pertama?', '5', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(390, 15, 45, NULL, 'Tanggal kemerdekaan indonesia?', '6', '27 Agustus 1945', '17 Agustus 1945', '12 Maret 1990', '9 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(391, 15, 45, NULL, 'Siapa Nama Presiden Indonesia pertama?', '7', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(392, 15, 45, NULL, 'Tanggal kemerdekaan indonesia?', '8', '27 Agustus 1945', '17 Agustus 1945', '13 Maret 1990', '10 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(393, 15, 45, NULL, 'Siapa Nama Presiden Indonesia pertama?', '9', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(394, 15, 46, NULL, 'Siapa Nama Presiden Indonesia pertama?', '1', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(395, 15, 46, NULL, 'Tanggal kemerdekaan indonesia?', '2', '27 Agustus 1945', '17 Agustus 1945', '10 Maret 1990', '7 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(396, 15, 46, NULL, 'Siapa Nama Presiden Indonesia pertama?', '3', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(397, 15, 46, NULL, 'Tanggal kemerdekaan indonesia?', '4', '27 Agustus 1945', '17 Agustus 1945', '11 Maret 1990', '8 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(398, 15, 46, NULL, 'Siapa Nama Presiden Indonesia pertama?', '5', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(399, 15, 46, NULL, 'Tanggal kemerdekaan indonesia?', '6', '27 Agustus 1945', '17 Agustus 1945', '12 Maret 1990', '9 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(400, 15, 46, NULL, 'Siapa Nama Presiden Indonesia pertama?', '7', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(401, 15, 46, NULL, 'Tanggal kemerdekaan indonesia?', '8', '27 Agustus 1945', '17 Agustus 1945', '13 Maret 1990', '10 Maret 1991', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(402, 15, 46, NULL, 'Siapa Nama Presiden Indonesia pertama?', '9', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0),
(403, 15, 46, NULL, 'Siapa Nama Presiden Indonesia pertama?', '10', 'Soekarno', 'soeharto', 'megawati', 'amien rais', 'abcd', 'efgh', 'ijkl', 'mnop', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_doc`
--

CREATE TABLE `status_doc` (
  `PK_STATUS_DOC` int(11) NOT NULL,
  `DESC_STATUS` varchar(200) NOT NULL,
  `CREATED_AT` varchar(100) NOT NULL,
  `CREATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_doc`
--

INSERT INTO `status_doc` (`PK_STATUS_DOC`, `DESC_STATUS`, `CREATED_AT`, `CREATED_DATE`) VALUES
(1, 'Document Belum Complete', 'admin', '2018-06-22'),
(2, 'Document Complete', 'admin', '2018-06-22'),
(3, 'Proccessing', 'admin', '2018-06-22'),
(4, 'Reject', 'admin', '2018-06-22'),
(5, 'Accept', 'admin', '2018-08-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pengusulan_pengangkatan`
--

CREATE TABLE `status_pengusulan_pengangkatan` (
  `PK_STATUS_PENGUSUL_PENGANGKATAN` int(50) NOT NULL,
  `DESC` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_pengusulan_pengangkatan`
--

INSERT INTO `status_pengusulan_pengangkatan` (`PK_STATUS_PENGUSUL_PENGANGKATAN`, `DESC`) VALUES
(1, 'Pengangkatan Pertama'),
(2, 'Pengangkatan Perpindahan'),
(3, 'Pengangkatan Penyesuaian (Inpassing)\r\n'),
(4, 'Pengangkatan kembali');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `total_pengusul`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `total_pengusul` (
`PK_PERTEK` int(11)
,`NO_SURAT` varchar(100)
,`qualified` decimal(23,0)
,`total` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `total_soal_distribusi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `total_soal_distribusi` (
`KODE_SOAL` varchar(150)
,`KEBUTUHAN_SOAL` int(11)
,`total_soal` bigint(21)
,`FK_BAB_MATA_AJAR` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `PK_USER` int(11) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `USER_PASSWORD` text NOT NULL,
  `FK_LOOKUP_ROLE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
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
(90, '15009835', '83d43e63e3dede73d9ac6fcc9af8619336c871cfbdadf4375f7dfbe62da04e27b12043130ee146c26efdb45fe354792faaadb8981d6ce37ad405948ffe95b012nDjtXZxgldfdOW4VimPPwl6l6QM9kPsfEEyIWbkFe1w=', 4),
(91, 'seharusnya', 'f1c1038d381068a1fc668f35472b58a1861d11034b8236e1928c6fe3ce914d7a56a340857ca5c2cfd01327e0ebb663cf4c48739ac548592e669da8925be2d8155pqvDo2OE3Zm4IWaJDfDekp6Fd5it7+Yomkv4Bnw4cc=', 28),
(92, '090909', '403e71ba1a5bf473845286a843c651092dd8d1dad60c43f4c06b88e8be1adf7619263b04b48ceb4c3b2747404df5105b100cafb515e171d3437be0939739482bRldmkirLne2mEW/IWSz5hQOT9AqZnCLX5cF71Ma5RIQ=', 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `widyaiswara_nilai`
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
-- Dumping data untuk tabel `widyaiswara_nilai`
--

INSERT INTO `widyaiswara_nilai` (`PK_WIDYAISWARA_NILAI`, `NIP`, `NAMA`, `TGL_RELEASE_MATA_AJAR`, `FK_MATA_AJAR`, `NILAI_1`, `NILAI_2`, `NIP_INSTRUKTUR`, `flag`, `CREATED_BY`, `CREATED_DATE`) VALUES
(37, '195212211978031008', 'alimudin', '2011-12-12', 13, 0, 0, '3', 0, 'Pusbin Budianto', '2018-09-21'),
(38, '195808081985031008', 'Alimuddin', '2018-09-30', 6, 0, 0, '3', 1, '01', '2018-09-30');

-- --------------------------------------------------------

--
-- Struktur untuk view `total_pengusul`
--
DROP TABLE IF EXISTS `total_pengusul`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_pengusul`  AS  select `pertek`.`PK_PERTEK` AS `PK_PERTEK`,`pengusul_pengangkatan`.`NO_SURAT` AS `NO_SURAT`,sum((case when ((`pengusul_pengangkatan`.`FK_STATUS_DOC` > 1) and (`pengusul_pengangkatan`.`RESULT` <> '')) then 1 else 0 end)) AS `qualified`,sum((case when (`pengusul_pengangkatan`.`FK_STATUS_DOC` <> '') then 1 else 0 end)) AS `total` from (`pengusul_pengangkatan` left join `pertek` on((`pertek`.`NO_SURAT` = `pengusul_pengangkatan`.`NO_SURAT`))) group by `pengusul_pengangkatan`.`NO_SURAT` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `total_soal_distribusi`
--
DROP TABLE IF EXISTS `total_soal_distribusi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_soal_distribusi`  AS  select `kode_soal`.`KODE_SOAL` AS `KODE_SOAL`,`kode_soal`.`KEBUTUHAN_SOAL` AS `KEBUTUHAN_SOAL`,count(`soal_distribusi`.`FK_KODE_SOAL`) AS `total_soal`,`soal_ujian`.`FK_BAB_MATA_AJAR` AS `FK_BAB_MATA_AJAR` from ((`kode_soal` left join `soal_distribusi` on((`soal_distribusi`.`FK_KODE_SOAL` = `kode_soal`.`PK_KODE_SOAL`))) left join `soal_ujian` on((`soal_distribusi`.`FK_SOAL_UJIAN` = `soal_ujian`.`PK_SOAL_UJIAN`))) group by `kode_soal`.`PK_KODE_SOAL`,`soal_ujian`.`FK_BAB_MATA_AJAR` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `angka_kredit`
--
ALTER TABLE `angka_kredit`
  ADD PRIMARY KEY (`PK_ANGKA_KREDIT`);

--
-- Indeks untuk tabel `bab_mata_ajar`
--
ALTER TABLE `bab_mata_ajar`
  ADD PRIMARY KEY (`PK_BAB_MATA_AJAR`),
  ADD KEY `CN_BAB_MATA_AJAR` (`FK_MATA_AJAR`);

--
-- Indeks untuk tabel `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`PK_BATCH`),
  ADD KEY `CN_FK_KODE_EVENT` (`FK_EVENT`) USING BTREE,
  ADD KEY `indexing1` (`FK_JADWAL`);

--
-- Indeks untuk tabel `bridge_lookup`
--
ALTER TABLE `bridge_lookup`
  ADD PRIMARY KEY (`id_bridge_lookup`);

--
-- Indeks untuk tabel `detail_jawaban_peserta`
--
ALTER TABLE `detail_jawaban_peserta`
  ADD KEY `indexing1` (`FK_JAWABAN_DETAIL`),
  ADD KEY `indexing2` (`FK_SOAL_UJIAN`);

--
-- Indeks untuk tabel `detail_nilai_wi`
--
ALTER TABLE `detail_nilai_wi`
  ADD PRIMARY KEY (`PK_DETAIL_NILAI_WI`),
  ADD KEY `indexing1` (`FK_WIDYAISWARA_NILAI`);

--
-- Indeks untuk tabel `detail_permintaan_soal`
--
ALTER TABLE `detail_permintaan_soal`
  ADD PRIMARY KEY (`PK_DETAIL_PERMINTAAN_SOAL`),
  ADD KEY `indexing1` (`FK_PERMINTAAN_SOAL`);

--
-- Indeks untuk tabel `document_pengusulan_pengangkatan`
--
ALTER TABLE `document_pengusulan_pengangkatan`
  ADD PRIMARY KEY (`PK_DOC_PENGUSULAN_PENGANGKATAN`),
  ADD KEY `indexing1` (`FK_PENGUSUL_PENGANGKATAN`);

--
-- Indeks untuk tabel `dokumen_persetujuan`
--
ALTER TABLE `dokumen_persetujuan`
  ADD PRIMARY KEY (`PK_PERSETUJUAN`),
  ADD KEY `CN_GROUP_REGIS` (`GROUP_REGIS`);

--
-- Indeks untuk tabel `dokumen_registrasi_ujian`
--
ALTER TABLE `dokumen_registrasi_ujian`
  ADD PRIMARY KEY (`PK_DOC_REGIS`),
  ADD KEY `dokumen_registrasi_ujian_ibfk_1` (`FK_REGIS_UJIAN`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`PK_EVENT`),
  ADD KEY `CN_KODE_DIKLAT` (`KODE_DIKLAT`),
  ADD KEY `indexing1` (`FK_PROVINSI`);

--
-- Indeks untuk tabel `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  ADD PRIMARY KEY (`PK_JADWAL_UJIAN`),
  ADD KEY `indexing1` (`START_DATE`);

--
-- Indeks untuk tabel `jawaban_peserta`
--
ALTER TABLE `jawaban_peserta`
  ADD PRIMARY KEY (`PK_JAWABAN_DETAIL`),
  ADD KEY `indexing1` (`FK_EVENT`,`KELAS`,`KODE_SOAL`);

--
-- Indeks untuk tabel `jawaban_peserta_copy`
--
ALTER TABLE `jawaban_peserta_copy`
  ADD PRIMARY KEY (`PK_JAWABAN_DETAIL`);

--
-- Indeks untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`PK_JENJANG`) USING BTREE,
  ADD UNIQUE KEY `uniq1` (`KODE_DIKLAT`),
  ADD KEY `CN_GROUP_MATA_AJAR_LOOKUP` (`FK_LOOKUP_DIKLAT`),
  ADD KEY `CN_KODE_DIKLAT` (`KODE_DIKLAT`);

--
-- Indeks untuk tabel `kode_soal`
--
ALTER TABLE `kode_soal`
  ADD PRIMARY KEY (`PK_KODE_SOAL`),
  ADD KEY `indexing1` (`KODE_SOAL`),
  ADD KEY `indexing2` (`FK_MATA_AJAR`) USING BTREE;

--
-- Indeks untuk tabel `konfigurasi_ujian`
--
ALTER TABLE `konfigurasi_ujian`
  ADD PRIMARY KEY (`PK_KONFIG_UJIAN`),
  ADD UNIQUE KEY `uniq1` (`PIN`),
  ADD KEY `indexing1` (`FK_MATA_AJAR`,`FK_EVENT`),
  ADD KEY `fc_event_config` (`FK_EVENT`);

--
-- Indeks untuk tabel `lookup`
--
ALTER TABLE `lookup`
  ADD PRIMARY KEY (`PK_LOOKUP`);

--
-- Indeks untuk tabel `lookup_ujian`
--
ALTER TABLE `lookup_ujian`
  ADD PRIMARY KEY (`PK_LOOKUP_REGIS`),
  ADD UNIQUE KEY `indexing1` (`FK_REGIS_UJIAN`,`FK_MATA_AJAR`,`FK_JAWABAN_DETAIL`),
  ADD KEY `fc1` (`FK_JAWABAN_DETAIL`),
  ADD KEY `fc2` (`FK_MATA_AJAR`);

--
-- Indeks untuk tabel `mata_ajar`
--
ALTER TABLE `mata_ajar`
  ADD PRIMARY KEY (`PK_MATA_AJAR`),
  ADD KEY `CN_FK_JENJANG` (`FK_JENJANG`);

--
-- Indeks untuk tabel `menu_page`
--
ALTER TABLE `menu_page`
  ADD PRIMARY KEY (`PK_MENU_PAGE`),
  ADD KEY `FK_LOOKUP_MENU` (`FK_LOOKUP_MENU`);

--
-- Indeks untuk tabel `menu_page_detail`
--
ALTER TABLE `menu_page_detail`
  ADD PRIMARY KEY (`PK_MENU_DETAIL`),
  ADD KEY `FK_MENU_PAGE` (`FK_MENU_PAGE`) USING BTREE;

--
-- Indeks untuk tabel `pengusul_pengangkatan`
--
ALTER TABLE `pengusul_pengangkatan`
  ADD PRIMARY KEY (`PK_PENGUSUL_PENGANGKATAN`),
  ADD KEY `indexing1` (`FK_STATUS_PENGUSUL_PENGANGKATAN`,`FK_STATUS_DOC`),
  ADD KEY `doc_status` (`FK_STATUS_DOC`),
  ADD KEY `indexing2` (`NO_SURAT`);

--
-- Indeks untuk tabel `permintaan_soal`
--
ALTER TABLE `permintaan_soal`
  ADD PRIMARY KEY (`PK_PERMINTAAN_SOAL`),
  ADD KEY `indexing1` (`FK_BAB_MATA_AJAR`);

--
-- Indeks untuk tabel `pertek`
--
ALTER TABLE `pertek`
  ADD PRIMARY KEY (`PK_PERTEK`),
  ADD KEY `indexing1` (`NO_SURAT`);

--
-- Indeks untuk tabel `pilihan_soal`
--
ALTER TABLE `pilihan_soal`
  ADD PRIMARY KEY (`PK_PILIHAN_SOAL`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`PK_PROVINSI`);

--
-- Indeks untuk tabel `registrasi_ujian`
--
ALTER TABLE `registrasi_ujian`
  ADD PRIMARY KEY (`PK_REGIS_UJIAN`),
  ADD KEY `KODE_DIKLAT` (`KODE_DIKLAT`),
  ADD KEY `registrasi_ujian_ibfk_2` (`FK_JADWAL_UJIAN`),
  ADD KEY `CN_GROUP_REGIS` (`GROUP_REGIS`),
  ADD KEY `CN_LOKASI_UJIAN` (`LOKASI_UJIAN`) USING BTREE,
  ADD KEY `provinsi` (`PROVINSI`);

--
-- Indeks untuk tabel `review_soal`
--
ALTER TABLE `review_soal`
  ADD PRIMARY KEY (`PK_REVIEW_SOAL`);

--
-- Indeks untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`PK_SERTIFIKAT`),
  ADD UNIQUE KEY `uniq` (`FK_REGIS_UJIAN`);

--
-- Indeks untuk tabel `soal_distribusi`
--
ALTER TABLE `soal_distribusi`
  ADD PRIMARY KEY (`PK_SOAL_DISTRIBUSI`),
  ADD KEY `indexing1` (`FK_KODE_SOAL`,`FK_SOAL_UJIAN`,`NO_UJIAN`),
  ADD KEY `indexing2` (`JAWABAN`,`NO_UJIAN`,`FK_KODE_SOAL`) USING BTREE;

--
-- Indeks untuk tabel `soal_kasus`
--
ALTER TABLE `soal_kasus`
  ADD PRIMARY KEY (`PK_SOAL_KASUS`);

--
-- Indeks untuk tabel `soal_ujian`
--
ALTER TABLE `soal_ujian`
  ADD PRIMARY KEY (`PK_SOAL_UJIAN`),
  ADD KEY `CN_SOAL_BAB_MATA_AJAR` (`FK_BAB_MATA_AJAR`),
  ADD KEY `CN_SOAL_KASUS` (`PARENT_SOAL`);

--
-- Indeks untuk tabel `status_doc`
--
ALTER TABLE `status_doc`
  ADD PRIMARY KEY (`PK_STATUS_DOC`);

--
-- Indeks untuk tabel `status_pengusulan_pengangkatan`
--
ALTER TABLE `status_pengusulan_pengangkatan`
  ADD PRIMARY KEY (`PK_STATUS_PENGUSUL_PENGANGKATAN`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`PK_USER`),
  ADD KEY `FK_LOOKUP_ROLE` (`FK_LOOKUP_ROLE`);

--
-- Indeks untuk tabel `widyaiswara_nilai`
--
ALTER TABLE `widyaiswara_nilai`
  ADD PRIMARY KEY (`PK_WIDYAISWARA_NILAI`),
  ADD KEY `indexing1` (`FK_MATA_AJAR`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `angka_kredit`
--
ALTER TABLE `angka_kredit`
  MODIFY `PK_ANGKA_KREDIT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bab_mata_ajar`
--
ALTER TABLE `bab_mata_ajar`
  MODIFY `PK_BAB_MATA_AJAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `batch`
--
ALTER TABLE `batch`
  MODIFY `PK_BATCH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `bridge_lookup`
--
ALTER TABLE `bridge_lookup`
  MODIFY `id_bridge_lookup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `detail_nilai_wi`
--
ALTER TABLE `detail_nilai_wi`
  MODIFY `PK_DETAIL_NILAI_WI` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail_permintaan_soal`
--
ALTER TABLE `detail_permintaan_soal`
  MODIFY `PK_DETAIL_PERMINTAAN_SOAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `document_pengusulan_pengangkatan`
--
ALTER TABLE `document_pengusulan_pengangkatan`
  MODIFY `PK_DOC_PENGUSULAN_PENGANGKATAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dokumen_persetujuan`
--
ALTER TABLE `dokumen_persetujuan`
  MODIFY `PK_PERSETUJUAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `dokumen_registrasi_ujian`
--
ALTER TABLE `dokumen_registrasi_ujian`
  MODIFY `PK_DOC_REGIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `PK_EVENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `PK_JADWAL_UJIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `jawaban_peserta`
--
ALTER TABLE `jawaban_peserta`
  MODIFY `PK_JAWABAN_DETAIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=746;

--
-- AUTO_INCREMENT untuk tabel `jawaban_peserta_copy`
--
ALTER TABLE `jawaban_peserta_copy`
  MODIFY `PK_JAWABAN_DETAIL` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `PK_JENJANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kode_soal`
--
ALTER TABLE `kode_soal`
  MODIFY `PK_KODE_SOAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi_ujian`
--
ALTER TABLE `konfigurasi_ujian`
  MODIFY `PK_KONFIG_UJIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `lookup_ujian`
--
ALTER TABLE `lookup_ujian`
  MODIFY `PK_LOOKUP_REGIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `mata_ajar`
--
ALTER TABLE `mata_ajar`
  MODIFY `PK_MATA_AJAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `menu_page_detail`
--
ALTER TABLE `menu_page_detail`
  MODIFY `PK_MENU_DETAIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengusul_pengangkatan`
--
ALTER TABLE `pengusul_pengangkatan`
  MODIFY `PK_PENGUSUL_PENGANGKATAN` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permintaan_soal`
--
ALTER TABLE `permintaan_soal`
  MODIFY `PK_PERMINTAAN_SOAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `pertek`
--
ALTER TABLE `pertek`
  MODIFY `PK_PERTEK` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pilihan_soal`
--
ALTER TABLE `pilihan_soal`
  MODIFY `PK_PILIHAN_SOAL` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `PK_PROVINSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `registrasi_ujian`
--
ALTER TABLE `registrasi_ujian`
  MODIFY `PK_REGIS_UJIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `PK_SERTIFIKAT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `soal_distribusi`
--
ALTER TABLE `soal_distribusi`
  MODIFY `PK_SOAL_DISTRIBUSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT untuk tabel `soal_kasus`
--
ALTER TABLE `soal_kasus`
  MODIFY `PK_SOAL_KASUS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `soal_ujian`
--
ALTER TABLE `soal_ujian`
  MODIFY `PK_SOAL_UJIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404;

--
-- AUTO_INCREMENT untuk tabel `status_doc`
--
ALTER TABLE `status_doc`
  MODIFY `PK_STATUS_DOC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `status_pengusulan_pengangkatan`
--
ALTER TABLE `status_pengusulan_pengangkatan`
  MODIFY `PK_STATUS_PENGUSUL_PENGANGKATAN` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `PK_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `widyaiswara_nilai`
--
ALTER TABLE `widyaiswara_nilai`
  MODIFY `PK_WIDYAISWARA_NILAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `CN_event12` FOREIGN KEY (`FK_EVENT`) REFERENCES `event` (`PK_EVENT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CN_jadwal` FOREIGN KEY (`FK_JADWAL`) REFERENCES `jadwal_ujian` (`PK_JADWAL_UJIAN`);

--
-- Ketidakleluasaan untuk tabel `detail_jawaban_peserta`
--
ALTER TABLE `detail_jawaban_peserta`
  ADD CONSTRAINT `dc999` FOREIGN KEY (`FK_JAWABAN_DETAIL`) REFERENCES `jawaban_peserta` (`PK_JAWABAN_DETAIL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_nilai_wi`
--
ALTER TABLE `detail_nilai_wi`
  ADD CONSTRAINT `wi_fc` FOREIGN KEY (`FK_WIDYAISWARA_NILAI`) REFERENCES `widyaiswara_nilai` (`PK_WIDYAISWARA_NILAI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_permintaan_soal`
--
ALTER TABLE `detail_permintaan_soal`
  ADD CONSTRAINT `permintaan_soal` FOREIGN KEY (`FK_PERMINTAAN_SOAL`) REFERENCES `permintaan_soal` (`PK_PERMINTAAN_SOAL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `document_pengusulan_pengangkatan`
--
ALTER TABLE `document_pengusulan_pengangkatan`
  ADD CONSTRAINT `doc_pengusul` FOREIGN KEY (`FK_PENGUSUL_PENGANGKATAN`) REFERENCES `pengusul_pengangkatan` (`PK_PENGUSUL_PENGANGKATAN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dokumen_persetujuan`
--
ALTER TABLE `dokumen_persetujuan`
  ADD CONSTRAINT `group_regis123` FOREIGN KEY (`GROUP_REGIS`) REFERENCES `registrasi_ujian` (`GROUP_REGIS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dokumen_registrasi_ujian`
--
ALTER TABLE `dokumen_registrasi_ujian`
  ADD CONSTRAINT `dokumen_registrasi_ujian_ibfk_1` FOREIGN KEY (`FK_REGIS_UJIAN`) REFERENCES `registrasi_ujian` (`PK_REGIS_UJIAN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_cp1` FOREIGN KEY (`KODE_DIKLAT`) REFERENCES `jenjang` (`KODE_DIKLAT`),
  ADD CONSTRAINT `prov_cp2` FOREIGN KEY (`FK_PROVINSI`) REFERENCES `provinsi` (`PK_PROVINSI`);

--
-- Ketidakleluasaan untuk tabel `jawaban_peserta`
--
ALTER TABLE `jawaban_peserta`
  ADD CONSTRAINT `CN_event1` FOREIGN KEY (`FK_EVENT`) REFERENCES `event` (`PK_EVENT`);

--
-- Ketidakleluasaan untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  ADD CONSTRAINT `CN_GROUP_MATA_AJAR_LOOKUP` FOREIGN KEY (`FK_LOOKUP_DIKLAT`) REFERENCES `lookup` (`PK_LOOKUP`);

--
-- Ketidakleluasaan untuk tabel `kode_soal`
--
ALTER TABLE `kode_soal`
  ADD CONSTRAINT `CN_event122` FOREIGN KEY (`FK_MATA_AJAR`) REFERENCES `mata_ajar` (`PK_MATA_AJAR`);

--
-- Ketidakleluasaan untuk tabel `konfigurasi_ujian`
--
ALTER TABLE `konfigurasi_ujian`
  ADD CONSTRAINT `fc_event_config` FOREIGN KEY (`FK_EVENT`) REFERENCES `event` (`PK_EVENT`),
  ADD CONSTRAINT `fc_mata_ajar_config` FOREIGN KEY (`FK_MATA_AJAR`) REFERENCES `mata_ajar` (`PK_MATA_AJAR`);

--
-- Ketidakleluasaan untuk tabel `lookup_ujian`
--
ALTER TABLE `lookup_ujian`
  ADD CONSTRAINT `fc2` FOREIGN KEY (`FK_MATA_AJAR`) REFERENCES `mata_ajar` (`PK_MATA_AJAR`),
  ADD CONSTRAINT `fc3` FOREIGN KEY (`FK_REGIS_UJIAN`) REFERENCES `registrasi_ujian` (`PK_REGIS_UJIAN`);

--
-- Ketidakleluasaan untuk tabel `mata_ajar`
--
ALTER TABLE `mata_ajar`
  ADD CONSTRAINT `mata_ajar_ibfk_1` FOREIGN KEY (`FK_JENJANG`) REFERENCES `jenjang` (`PK_JENJANG`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu_page`
--
ALTER TABLE `menu_page`
  ADD CONSTRAINT `menu_page_ibfk_1` FOREIGN KEY (`FK_LOOKUP_MENU`) REFERENCES `lookup` (`PK_LOOKUP`);

--
-- Ketidakleluasaan untuk tabel `menu_page_detail`
--
ALTER TABLE `menu_page_detail`
  ADD CONSTRAINT `menu_page_relat` FOREIGN KEY (`FK_MENU_PAGE`) REFERENCES `menu_page` (`PK_MENU_PAGE`);

--
-- Ketidakleluasaan untuk tabel `pengusul_pengangkatan`
--
ALTER TABLE `pengusul_pengangkatan`
  ADD CONSTRAINT `doc_status` FOREIGN KEY (`FK_STATUS_DOC`) REFERENCES `status_doc` (`PK_STATUS_DOC`),
  ADD CONSTRAINT `status_pengusul` FOREIGN KEY (`FK_STATUS_PENGUSUL_PENGANGKATAN`) REFERENCES `status_pengusulan_pengangkatan` (`PK_STATUS_PENGUSUL_PENGANGKATAN`);

--
-- Ketidakleluasaan untuk tabel `permintaan_soal`
--
ALTER TABLE `permintaan_soal`
  ADD CONSTRAINT `fc_bab_mata_ajar` FOREIGN KEY (`FK_BAB_MATA_AJAR`) REFERENCES `bab_mata_ajar` (`PK_BAB_MATA_AJAR`);

--
-- Ketidakleluasaan untuk tabel `pertek`
--
ALTER TABLE `pertek`
  ADD CONSTRAINT `no_surat123` FOREIGN KEY (`NO_SURAT`) REFERENCES `pengusul_pengangkatan` (`NO_SURAT`);

--
-- Ketidakleluasaan untuk tabel `registrasi_ujian`
--
ALTER TABLE `registrasi_ujian`
  ADD CONSTRAINT `registrasi_ujian_ibfk_1` FOREIGN KEY (`KODE_DIKLAT`) REFERENCES `jenjang` (`KODE_DIKLAT`),
  ADD CONSTRAINT `registrasi_ujian_ibfk_2` FOREIGN KEY (`FK_JADWAL_UJIAN`) REFERENCES `jadwal_ujian` (`PK_JADWAL_UJIAN`),
  ADD CONSTRAINT `registrasi_ujian_ibfk_3` FOREIGN KEY (`PROVINSI`) REFERENCES `provinsi` (`PK_PROVINSI`);

--
-- Ketidakleluasaan untuk tabel `soal_ujian`
--
ALTER TABLE `soal_ujian`
  ADD CONSTRAINT `CN_SOAL_KASUS` FOREIGN KEY (`PARENT_SOAL`) REFERENCES `soal_kasus` (`PK_SOAL_KASUS`) ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`FK_LOOKUP_ROLE`) REFERENCES `lookup` (`PK_LOOKUP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
