-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2015 at 11:35 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_simpa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` char(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
('A001', 'Puput Lestari', 'puput', ''),
('A002', 'Ratna Larasati', 'ratna', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anak`
--

CREATE TABLE IF NOT EXISTS `tbl_anak` (
  `nis` char(4) NOT NULL,
  `kode_jadwal` char(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgllahir` date NOT NULL,
  `jeniskelamin` char(1) NOT NULL,
  `Anak_ke` varchar(20) NOT NULL,
  `jml_saudara` varchar(20) NOT NULL,
  `tgl_diterima` date NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(20) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(20) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_anak`
--

INSERT INTO `tbl_anak` (`nis`, `kode_jadwal`, `nama`, `tgllahir`, `jeniskelamin`, `Anak_ke`, `jml_saudara`, `tgl_diterima`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`) VALUES
('S001', 'J001', 'Ariendra Airlangga', '2012-10-11', 'L', '1', '1', '2015-01-12', 'Nicky Airlangga', 'Swasta', 'Rida Larasati', 'PNS'),
('S002', 'J001', 'Veren Sabha Mazlinesa', '2012-06-01', 'P', '2', '2', '2015-01-24', 'Revan Mahendra', 'PNS', 'Dwi Aninta', 'PNS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE IF NOT EXISTS `tbl_jadwal` (
  `kode_jadwal` char(4) NOT NULL,
  `kode_mapel` char(4) NOT NULL,
  `id_pengajar` char(4) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(11) NOT NULL,
  `ruang` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`kode_jadwal`, `kode_mapel`, `id_pengajar`, `tanggal`, `jam`, `ruang`) VALUES
('J001', 'M002', 'P001', '2015-11-20', '08.00-09.00', 'Melati'),
('J002', 'M004', 'P002', '2015-11-24', '08.00-10.00', 'Taman'),
('J003', 'M003', 'P003', '2015-11-25', '09.00-10.00', 'Matahari');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konsultasi`
--

CREATE TABLE IF NOT EXISTS `tbl_konsultasi` (
  `kode_konsultasi` char(4) NOT NULL,
  `id_ortu` char(4) NOT NULL,
  `id_pengajar` char(4) NOT NULL,
  `waktu_input` date NOT NULL,
  `waktu_respon` date NOT NULL,
  `isi_konsultasi` varchar(500) NOT NULL,
  `respon_konsultasi` varchar(500) NOT NULL,
  PRIMARY KEY (`kode_konsultasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporanperkembangan`
--

CREATE TABLE IF NOT EXISTS `tbl_laporanperkembangan` (
  `kode_perkembangan` char(4) NOT NULL,
  `id_pengajar` char(4) NOT NULL,
  `nis` char(4) NOT NULL,
  `kode_mapel` char(4) NOT NULL,
  `nilai` char(1) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  PRIMARY KEY (`kode_perkembangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_laporanperkembangan`
--

INSERT INTO `tbl_laporanperkembangan` (`kode_perkembangan`, `id_pengajar`, `nis`, `kode_mapel`, `nilai`, `keterangan`) VALUES
('KP01', 'P003', 'S001', 'M003', 'A', 'Anak dapat meniru gerakan dengan baik'),
('KP02', 'P003', 'S002', 'M003', 'B', 'Anak cukup antusias pada kegiatan ini');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE IF NOT EXISTS `tbl_mapel` (
  `kode_mapel` char(4) NOT NULL,
  `nama_mapel` varchar(20) NOT NULL,
  `kegiatan` varchar(200) NOT NULL,
  PRIMARY KEY (`kode_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`kode_mapel`, `nama_mapel`, `kegiatan`) VALUES
('M001', 'Mengenal tubuh', 'Memakai kaos kaki sendiri'),
('M002', 'Kreativitas', 'Menggambar buah-buahan'),
('M003', 'Kreativitas', 'Menari bersama');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orangtua`
--

CREATE TABLE IF NOT EXISTS `tbl_orangtua` (
  `id_ortu` char(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jeniskelamin` char(1) NOT NULL,
  `tgllahir` date NOT NULL,
  `notelp` varchar(12) NOT NULL,
  `email` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ortu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orangtua`
--

INSERT INTO `tbl_orangtua` (`id_ortu`, `username`, `password`, `nama`, `jeniskelamin`, `tgllahir`, `notelp`, `email`, `alamat`) VALUES
('O001', 'dwi', 'dwi123', 'Dwi Aninta', 'P', '1989-11-02', '081359882110', 'dwiprihatin@gmail.com', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajar`
--

CREATE TABLE IF NOT EXISTS `tbl_pengajar` (
  `id_pengajar` char(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jeniskelamin` char(1) NOT NULL,
  `tgllahir` date NOT NULL,
  `notelp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tingkat_pendidikan` varchar(25) NOT NULL,
  PRIMARY KEY (`id_pengajar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajar`
--

INSERT INTO `tbl_pengajar` (`id_pengajar`, `username`, `password`, `nama`, `jeniskelamin`, `tgllahir`, `notelp`, `alamat`, `tingkat_pendidikan`) VALUES
('P001', 'aninda', 'anin123', 'Aninda Kirana', 'P', '1993-07-20', '085735880123', 'Jakarta', 'S1'),
('P002', 'dion', 'dion123', 'Dion Mahendra', 'L', '1992-08-11', '081335123908', 'Bandung', 'S1'),
('P003', 'lia', 'lia123', 'Lia Laksmana', 'P', '1995-02-09', '089129111102', 'Bekasi', 'D3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
