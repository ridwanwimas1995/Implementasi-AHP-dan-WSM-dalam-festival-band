-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2014 at 07:53 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbspk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `hak_akses` varchar(30) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `password`, `status`, `hak_akses`) VALUES
(1, 'ketua akademik', 'ketua akademik', 1, 'Ketua Akademik'),
(3, 'panitia', 'panitia', 0, 'Panitia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_camaba`
--

CREATE TABLE IF NOT EXISTS `tb_camaba` (
  `no_test` char(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `nama_ortu` varchar(50) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  PRIMARY KEY (`no_test`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_camaba`
--

INSERT INTO `tb_camaba` (`no_test`, `nama`, `alamat`, `tgl_lahir`, `jenis_kelamin`, `nama_ortu`, `tlp`, `sekolah`) VALUES
('MB0001', 'Ardi Iswanto', 'Jl A Yani Utara No.11', '1995-01-07', 'Laki-laki', 'Sutisno', '081335409787', 'SMA 1 Ibrahimy'),
('MB0002', 'Budiman', 'Jl Cokroaminoto Gg Angsa', '1995-02-02', 'Laki-laki', 'Mislan', '081805556400', 'SMA Muhammadiyah'),
('MB0003', 'Cika Putri', 'Jl Nangka', '1995-03-14', 'Perempuan', 'Parman', '487377', 'SMK Harapan'),
('MB0004', 'Dian Sapto', 'Jl Kenyeri No.2', '1994-04-04', 'Laki-laki', 'Muslimin', '486045', 'SMA Saraswati'),
('MB0005', 'Erina ', 'Jl Raya Dalung', '1995-02-21', 'Perempuan', 'Ponijan', '081555607233', 'SMA 7 Denpasar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria_utama`
--

CREATE TABLE IF NOT EXISTS `tb_kriteria_utama` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(30) NOT NULL,
  `ijasah` double NOT NULL,
  `wawancara` double NOT NULL,
  `tpa` double NOT NULL,
  `al_quran` double NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_kriteria_utama`
--

INSERT INTO `tb_kriteria_utama` (`id_kriteria`, `nama_kriteria`, `ijasah`, `wawancara`, `tpa`, `al_quran`) VALUES
(1, 'Ijasah', 1, 0.5, 0.33, 0.25),
(2, 'Wawancara', 2, 1, 0.17, 0.25),
(3, 'Tpa', 3, 6, 1, 0.2),
(4, 'Al_quran', 4, 4, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_metrix_nilai_kriteria`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_nilai_kriteria` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(30) NOT NULL,
  `ijasah` double NOT NULL,
  `wawancara` double NOT NULL,
  `tpa` double NOT NULL,
  `al_quran` double NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_metrix_nilai_kriteria`
--

INSERT INTO `tb_metrix_nilai_kriteria` (`id_matrix`, `nama_kriteria`, `ijasah`, `wawancara`, `tpa`, `al_quran`, `jumlah`, `prioritas`) VALUES
(1, 'Ijasah', 0.1, 0.04, 0.05, 0.15, 0.34, 0.09),
(2, 'Wawancara', 0.2, 0.09, 0.03, 0.15, 0.47, 0.12),
(3, 'Tpa', 0.3, 0.52, 0.15, 0.12, 1.09, 0.27),
(4, 'Al_quran', 0.4, 0.35, 0.77, 0.59, 2.11, 0.53);

-- --------------------------------------------------------

--
-- Table structure for table `tb_metrix_penjumlahan`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_penjumlahan` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(30) NOT NULL,
  `ijasah` double NOT NULL,
  `wawancara` double NOT NULL,
  `tpa` double NOT NULL,
  `al_quran` double NOT NULL,
  `jumlah` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_metrix_penjumlahan`
--

INSERT INTO `tb_metrix_penjumlahan` (`id_matrix`, `nama_kriteria`, `ijasah`, `wawancara`, `tpa`, `al_quran`, `jumlah`) VALUES
(1, 'Ijasah', 0.09, 0.05, 0.03, 0.02, 0.19),
(2, 'Wawancara', 0.24, 0.12, 0.02, 0.03, 0.41),
(3, 'Tpa', 0.81, 1.62, 0.27, 0.05, 2.75),
(4, 'Al_quran', 2.12, 2.12, 2.65, 0.53, 7.42);

-- --------------------------------------------------------

--
-- Table structure for table `tb_metrix_penjumlahan_alquran`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_penjumlahan_alquran` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `baca` double NOT NULL,
  `tulis` double NOT NULL,
  `tajwid` double NOT NULL,
  `makhroj` double NOT NULL,
  `jumlah` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_metrix_penjumlahan_alquran`
--

INSERT INTO `tb_metrix_penjumlahan_alquran` (`id_matrix`, `nama_subkriteria`, `baca`, `tulis`, `tajwid`, `makhroj`, `jumlah`) VALUES
(1, 'Baca', 0.06, 0.03, 0.02, 0.01, 0.12),
(2, 'Tulis', 0.18, 0.09, 0.05, 0.01, 0.33),
(3, 'Tajwid', 0.42, 0.28, 0.14, 0.02, 0.86),
(4, 'Makhroj', 5.6, 5.6, 5.6, 0.7, 17.5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_metrix_penjumlahan_ijasah`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_penjumlahan_ijasah` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `matematika` double NOT NULL,
  `bahasa_inggris` double NOT NULL,
  `bahasa_indonesia` double NOT NULL,
  `agama` double NOT NULL,
  `jumlah` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_metrix_penjumlahan_ijasah`
--

INSERT INTO `tb_metrix_penjumlahan_ijasah` (`id_matrix`, `nama_subkriteria`, `matematika`, `bahasa_inggris`, `bahasa_indonesia`, `agama`, `jumlah`) VALUES
(1, 'Matematika', 0.1, 0.05, 0.03, 0.03, 0.21),
(2, 'Bahasa Inggris', 0.32, 0.16, 0.08, 0.05, 0.61),
(3, 'Bahasa Indonesia', 0.84, 0.56, 0.28, 0.14, 1.82),
(4, 'Agama', 1.88, 1.41, 0.94, 0.47, 4.7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_metrix_penjumlahan_tpa`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_penjumlahan_tpa` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `verbal` double NOT NULL,
  `numerik` double NOT NULL,
  `logika` double NOT NULL,
  `spasial` double NOT NULL,
  `jumlah` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_metrix_penjumlahan_tpa`
--

INSERT INTO `tb_metrix_penjumlahan_tpa` (`id_matrix`, `nama_subkriteria`, `verbal`, `numerik`, `logika`, `spasial`, `jumlah`) VALUES
(1, 'Verbal', 0.1, 0.05, 0.03, 0.03, 0.21),
(2, 'Numerik', 0.32, 0.16, 0.08, 0.05, 0.61),
(3, 'Logika', 0.84, 0.56, 0.28, 0.14, 1.82),
(4, 'Spasial', 1.88, 1.41, 0.94, 0.47, 4.7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_metrix_penjumlahan_wawancara`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_penjumlahan_wawancara` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `motivasi` double NOT NULL,
  `sosialisasi` double NOT NULL,
  `power` double NOT NULL,
  `kepribadian` double NOT NULL,
  `jumlah` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_metrix_penjumlahan_wawancara`
--

INSERT INTO `tb_metrix_penjumlahan_wawancara` (`id_matrix`, `nama_subkriteria`, `motivasi`, `sosialisasi`, `power`, `kepribadian`, `jumlah`) VALUES
(1, 'Motivasi', 0.1, 0.05, 0.03, 0.03, 0.21),
(2, 'Sosialisasi', 0.32, 0.16, 0.08, 0.05, 0.61),
(3, 'Power', 0.84, 0.56, 0.28, 0.14, 1.82),
(4, 'Kepribadian', 1.88, 1.41, 0.94, 0.47, 4.7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_metrix_subkriteria_alquran`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_subkriteria_alquran` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `baca` double NOT NULL,
  `tulis` double NOT NULL,
  `tajwid` double NOT NULL,
  `makhroj` double NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `sub_prioritas` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_metrix_subkriteria_alquran`
--

INSERT INTO `tb_metrix_subkriteria_alquran` (`id_matrix`, `nama_subkriteria`, `baca`, `tulis`, `tajwid`, `makhroj`, `jumlah`, `prioritas`, `sub_prioritas`) VALUES
(1, 'Baca', 0.07, 0.04, 0.03, 0.09, 0.23, 0.06, 0.09),
(2, 'Tulis', 0.14, 0.09, 0.05, 0.09, 0.37, 0.09, 0.13),
(3, 'Tajwid', 0.21, 0.17, 0.1, 0.09, 0.57, 0.14, 0.2),
(4, 'Makhroj', 0.57, 0.7, 0.81, 0.72, 2.8, 0.7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_metrix_subkriteria_ijasah`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_subkriteria_ijasah` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `matematika` double NOT NULL,
  `bahasa_inggris` double NOT NULL,
  `bahasa_indonesia` double NOT NULL,
  `agama` double NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `sub_prioritas` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_metrix_subkriteria_ijasah`
--

INSERT INTO `tb_metrix_subkriteria_ijasah` (`id_matrix`, `nama_subkriteria`, `matematika`, `bahasa_inggris`, `bahasa_indonesia`, `agama`, `jumlah`, `prioritas`, `sub_prioritas`) VALUES
(1, 'Matematika', 0.1, 0.08, 0.09, 0.12, 0.39, 0.1, 0.21),
(2, 'Bahasa Inggris', 0.2, 0.15, 0.13, 0.16, 0.64, 0.16, 0.34),
(3, 'Bahasa Indonesia', 0.3, 0.31, 0.26, 0.24, 1.11, 0.28, 0.6),
(4, 'Agama', 0.4, 0.46, 0.52, 0.48, 1.86, 0.47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_metrix_subkriteria_tpa`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_subkriteria_tpa` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `verbal` double NOT NULL,
  `numerik` double NOT NULL,
  `logika` double NOT NULL,
  `spasial` double NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `sub_prioritas` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_metrix_subkriteria_tpa`
--

INSERT INTO `tb_metrix_subkriteria_tpa` (`id_matrix`, `nama_subkriteria`, `verbal`, `numerik`, `logika`, `spasial`, `jumlah`, `prioritas`, `sub_prioritas`) VALUES
(1, 'Verbal', 0.1, 0.08, 0.09, 0.12, 0.39, 0.1, 0.21),
(2, 'Numerik', 0.2, 0.15, 0.13, 0.16, 0.64, 0.16, 0.34),
(3, 'Logika', 0.3, 0.31, 0.26, 0.24, 1.11, 0.28, 0.6),
(4, 'Spasial', 0.4, 0.46, 0.52, 0.48, 1.86, 0.47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_metrix_subkriteria_wawancara`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_subkriteria_wawancara` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `motivasi` double NOT NULL,
  `sosialisasi` double NOT NULL,
  `power` double NOT NULL,
  `kepribadian` double NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `sub_prioritas` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_metrix_subkriteria_wawancara`
--

INSERT INTO `tb_metrix_subkriteria_wawancara` (`id_matrix`, `nama_subkriteria`, `motivasi`, `sosialisasi`, `power`, `kepribadian`, `jumlah`, `prioritas`, `sub_prioritas`) VALUES
(1, 'Motivasi', 0.1, 0.08, 0.09, 0.12, 0.39, 0.1, 0.21),
(2, 'Sosialisasi', 0.2, 0.15, 0.13, 0.16, 0.64, 0.16, 0.34),
(3, 'Power', 0.3, 0.31, 0.26, 0.24, 1.11, 0.28, 0.6),
(4, 'Kepribadian', 0.4, 0.46, 0.52, 0.48, 1.86, 0.47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_test`
--

CREATE TABLE IF NOT EXISTS `tb_nilai_test` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `no_test` char(6) NOT NULL,
  `nilai_ijasah` decimal(10,0) NOT NULL,
  `nilai_wawancara` decimal(10,0) NOT NULL,
  `nilai_tpa` decimal(10,0) NOT NULL,
  `nilai_alquran` decimal(10,0) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `no_test` (`no_test`),
  KEY `no_test_2` (`no_test`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_nilai_test`
--

INSERT INTO `tb_nilai_test` (`id_nilai`, `no_test`, `nilai_ijasah`, `nilai_wawancara`, `nilai_tpa`, `nilai_alquran`, `keterangan`) VALUES
(5, 'MB0001', '80', '91', '79', '70', 'Diterima'),
(6, 'MB0002', '75', '72', '81', '69', 'Diterima'),
(7, 'MB0003', '65', '68', '74', '80', 'Diterima'),
(8, 'MB0004', '60', '54', '59', '60', 'Ditolak'),
(9, 'MB0005', '78', '63', '70', '75', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rasio_konsistensi_alquran`
--

CREATE TABLE IF NOT EXISTS `tb_rasio_konsistensi_alquran` (
  `id_konsistensi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `hasil` double NOT NULL,
  PRIMARY KEY (`id_konsistensi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_rasio_konsistensi_alquran`
--

INSERT INTO `tb_rasio_konsistensi_alquran` (`id_konsistensi`, `nama_subkriteria`, `jumlah`, `prioritas`, `hasil`) VALUES
(1, 'Baca', 0.21, 0.1, 0.31),
(2, 'Tulis', 0.61, 0.16, 0.77),
(3, 'Tajwid', 1.82, 0.28, 2.1),
(4, 'Makhroj', 4.7, 0.47, 5.17);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rasio_konsistensi_ijasah`
--

CREATE TABLE IF NOT EXISTS `tb_rasio_konsistensi_ijasah` (
  `id_konsistensi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `hasil` double NOT NULL,
  PRIMARY KEY (`id_konsistensi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_rasio_konsistensi_ijasah`
--

INSERT INTO `tb_rasio_konsistensi_ijasah` (`id_konsistensi`, `nama_subkriteria`, `jumlah`, `prioritas`, `hasil`) VALUES
(1, 'Matematika', 0.21, 0.1, 0.31),
(2, 'Bahasa Inggris', 0.61, 0.16, 0.77),
(3, 'Bahasa Indonesia', 1.82, 0.28, 2.1),
(4, 'Agama', 4.7, 0.47, 5.17);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rasio_konsistensi_kriteria`
--

CREATE TABLE IF NOT EXISTS `tb_rasio_konsistensi_kriteria` (
  `id_konsistensi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(30) NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `hasil` double NOT NULL,
  PRIMARY KEY (`id_konsistensi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_rasio_konsistensi_kriteria`
--

INSERT INTO `tb_rasio_konsistensi_kriteria` (`id_konsistensi`, `nama_kriteria`, `jumlah`, `prioritas`, `hasil`) VALUES
(1, 'Ijasah', 0.19, 0.09, 0.28),
(2, 'Wawancara', 0.41, 0.12, 0.53),
(3, 'Tpa', 2.75, 0.27, 3.02),
(4, 'Al_quran', 7.42, 0.53, 7.95);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rasio_konsistensi_tpa`
--

CREATE TABLE IF NOT EXISTS `tb_rasio_konsistensi_tpa` (
  `id_konsistensi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `hasil` double NOT NULL,
  PRIMARY KEY (`id_konsistensi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_rasio_konsistensi_tpa`
--

INSERT INTO `tb_rasio_konsistensi_tpa` (`id_konsistensi`, `nama_subkriteria`, `jumlah`, `prioritas`, `hasil`) VALUES
(1, 'Verbal', 0.21, 0.1, 0.31),
(2, 'Numerik', 0.61, 0.16, 0.77),
(3, 'Logika', 1.82, 0.28, 2.1),
(4, 'Spasial', 4.7, 0.47, 5.17);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rasio_konsistensi_wawancara`
--

CREATE TABLE IF NOT EXISTS `tb_rasio_konsistensi_wawancara` (
  `id_konsistensi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `hasil` double NOT NULL,
  PRIMARY KEY (`id_konsistensi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_rasio_konsistensi_wawancara`
--

INSERT INTO `tb_rasio_konsistensi_wawancara` (`id_konsistensi`, `nama_subkriteria`, `jumlah`, `prioritas`, `hasil`) VALUES
(1, 'Motivasi', 0.21, 0.1, 0.31),
(2, 'Sosialisasi', 0.61, 0.16, 0.77),
(3, 'Power', 1.82, 0.28, 2.1),
(4, 'Kepribadian', 4.7, 0.47, 5.17);

-- --------------------------------------------------------

--
-- Table structure for table `tb_statusnilai`
--

CREATE TABLE IF NOT EXISTS `tb_statusnilai` (
  `id_statusnilai` char(1) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `nilai` double NOT NULL,
  PRIMARY KEY (`id_statusnilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_statusnilai`
--

INSERT INTO `tb_statusnilai` (`id_statusnilai`, `keterangan`, `nilai`) VALUES
('Y', 'Parameter', 250);

-- --------------------------------------------------------

--
-- Table structure for table `tb_subkriteria_alquran`
--

CREATE TABLE IF NOT EXISTS `tb_subkriteria_alquran` (
  `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `baca` double NOT NULL,
  `tulis` double NOT NULL,
  `tajwid` double NOT NULL,
  `makhroj` double NOT NULL,
  PRIMARY KEY (`id_subkriteria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_subkriteria_alquran`
--

INSERT INTO `tb_subkriteria_alquran` (`id_subkriteria`, `nama_subkriteria`, `baca`, `tulis`, `tajwid`, `makhroj`) VALUES
(1, 'Baca', 1, 0.5, 0.33, 0.13),
(2, 'Tulis', 2, 1, 0.5, 0.13),
(3, 'Tajwid', 3, 2, 1, 0.13),
(4, 'Makhroj', 8, 8, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_subkriteria_ijasah`
--

CREATE TABLE IF NOT EXISTS `tb_subkriteria_ijasah` (
  `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `matematika` double NOT NULL,
  `bahasa_inggris` double NOT NULL,
  `bahasa_indonesia` double NOT NULL,
  `agama` double NOT NULL,
  PRIMARY KEY (`id_subkriteria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_subkriteria_ijasah`
--

INSERT INTO `tb_subkriteria_ijasah` (`id_subkriteria`, `nama_subkriteria`, `matematika`, `bahasa_inggris`, `bahasa_indonesia`, `agama`) VALUES
(1, 'Matematika', 1, 0.5, 0.33, 0.25),
(2, 'Bahasa Inggris', 2, 1, 0.5, 0.33),
(3, 'Bahasa Indonesia', 3, 2, 1, 0.5),
(4, 'Agama', 4, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_subkriteria_tpa`
--

CREATE TABLE IF NOT EXISTS `tb_subkriteria_tpa` (
  `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `verbal` double NOT NULL,
  `numerik` double NOT NULL,
  `logika` double NOT NULL,
  `spasial` double NOT NULL,
  PRIMARY KEY (`id_subkriteria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_subkriteria_tpa`
--

INSERT INTO `tb_subkriteria_tpa` (`id_subkriteria`, `nama_subkriteria`, `verbal`, `numerik`, `logika`, `spasial`) VALUES
(1, 'Verbal', 1, 0.5, 0.33, 0.25),
(2, 'Numerik', 2, 1, 0.5, 0.33),
(3, 'Logika', 3, 2, 1, 0.5),
(4, 'Spasial', 4, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_subkriteria_wawancara`
--

CREATE TABLE IF NOT EXISTS `tb_subkriteria_wawancara` (
  `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `motivasi` double NOT NULL,
  `sosialisasi` double NOT NULL,
  `power` double NOT NULL,
  `kepribadian` double NOT NULL,
  PRIMARY KEY (`id_subkriteria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_subkriteria_wawancara`
--

INSERT INTO `tb_subkriteria_wawancara` (`id_subkriteria`, `nama_subkriteria`, `motivasi`, `sosialisasi`, `power`, `kepribadian`) VALUES
(1, 'Motivasi', 1, 0.5, 0.33, 0.25),
(2, 'Sosialisasi', 2, 1, 0.5, 0.33),
(3, 'Power', 3, 2, 1, 0.5),
(4, 'Kepribadian', 4, 3, 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
