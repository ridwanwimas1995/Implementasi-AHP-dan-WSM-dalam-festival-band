-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2018 pada 10.28
-- Versi Server: 5.6.14
-- Versi PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `dbspkahp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
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
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `password`, `status`, `hak_akses`) VALUES
(1, 'ketua akademik', 'ketua akademik', 1, 'Ketua Akademik'),
(3, 'panitia', 'panitia', 0, 'Panitia'),
(2, 'a', 'a', 0, 'Panitia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_band`
--

CREATE TABLE IF NOT EXISTS `tb_band` (
  `no_test` char(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `penampilan` varchar(10) NOT NULL,
  `attitude` varchar(10) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `album` varchar(50) NOT NULL,
  `total_nilai` varchar(50) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_band`
--

INSERT INTO `tb_band` (`no_test`, `nama`, `kota`, `penampilan`, `attitude`, `genre`, `album`, `total_nilai`, `keterangan`) VALUES
('MB0001', 'Paranoid Despire', 'Surakarta', 'Baik', 'Baik', 'Death_metal', '>1', '0.9', ''),
('MB0002', 'Vision Decay', 'Tulungagung', 'Baik', 'Baik', 'Death_metal', '1', '0.85', ''),
('MB0003', 'Whiplash', 'Yogyakarta', 'Baik', 'Baik', 'Thrash_metal', '>1', '0.92', ''),
('MB0004', 'Alligator', 'Ponorogo', 'Biasa', 'Baik', 'Thrash_metal', '>1', '0.58', ''),
('MB0005', 'Lokapala', 'Ponorogo', 'Baik', 'Biasa', 'Hard_rock', 'Kosong', '0.77', ''),
('MB0006', 'Imperforata', 'Madiun', 'Biasa', 'Biasa', 'Death_metal', '1', '0.35', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kriteria_utama`
--

CREATE TABLE IF NOT EXISTS `tb_kriteria_utama` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(30) NOT NULL,
  `penampilan` double NOT NULL,
  `attitude` double NOT NULL,
  `genre` double NOT NULL,
  `album` double NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tb_kriteria_utama`
--

INSERT INTO `tb_kriteria_utama` (`id_kriteria`, `nama_kriteria`, `penampilan`, `attitude`, `genre`, `album`) VALUES
(1, 'Penampilan', 1, 3, 3, 5),
(2, 'Attitude', 0.33, 1, 2, 3),
(3, 'Genre', 0.333, 0.5, 1, 3),
(4, 'Album', 0.2, 0.3333, 0.3333, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_metrix_nilai_kriteria`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_nilai_kriteria` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(30) NOT NULL,
  `penampilan` double NOT NULL,
  `attitude` double NOT NULL,
  `genre` double NOT NULL,
  `album` double NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tb_metrix_nilai_kriteria`
--

INSERT INTO `tb_metrix_nilai_kriteria` (`id_matrix`, `nama_kriteria`, `penampilan`, `attitude`, `genre`, `album`, `jumlah`, `prioritas`) VALUES
(1, 'Penampilan', 0.54, 0.62, 0.47, 0.42, 2.05, 0.51),
(2, 'Attitude', 0.18, 0.21, 0.32, 0.25, 0.96, 0.24),
(3, 'Genre', 0.18, 0.1, 0.16, 0.25, 0.31, 0.17),
(4, 'Album', 0.11, 0.07, 0.05, 0.08, 0.31, 0.08);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_metrix_penjumlahan`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_penjumlahan` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(30) NOT NULL,
  `penampilan` double NOT NULL,
  `attitude` double NOT NULL,
  `genre` double NOT NULL,
  `album` double NOT NULL,
  `jumlah` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tb_metrix_penjumlahan`
--

INSERT INTO `tb_metrix_penjumlahan` (`id_matrix`, `nama_kriteria`, `penampilan`, `attitude`, `genre`, `album`, `jumlah`) VALUES
(2, 'Attitude', 0.08, 0.24, 0.48, 0.72, 1.52),
(3, 'Genre', 0.06, 0.09, 0.17, 0.51, 0.83),
(4, 'Album', 0.02, 0.03, 0.03, 0.08, 0.16),
(1, 'Penampilan', 0.51, 1.53, 1.53, 2.55, 6.12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_metrix_penjumlahan_album`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_penjumlahan_album` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `lebihdarisatu` double NOT NULL,
  `masihsatu` double NOT NULL,
  `kosong` double NOT NULL,
  `jumlah` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_metrix_penjumlahan_album`
--

INSERT INTO `tb_metrix_penjumlahan_album` (`id_matrix`, `nama_subkriteria`, `lebihdarisatu`, `masihsatu`, `kosong`, `jumlah`) VALUES
(1, 'lebihdarisatu', 0.63, 1.89, 3.15, 5.67),
(2, 'masihsatu', 0.09, 0.26, 0.78, 1.13),
(3, 'kosong', 0.02, 0.04, 0.11, 0.17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_metrix_penjumlahan_attitude`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_penjumlahan_attitude` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `baik` double NOT NULL,
  `biasa` double NOT NULL,
  `buruk` double NOT NULL,
  `jumlah` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_metrix_penjumlahan_attitude`
--

INSERT INTO `tb_metrix_penjumlahan_attitude` (`id_matrix`, `nama_subkriteria`, `baik`, `biasa`, `buruk`, `jumlah`) VALUES
(1, 'baik', 0.52, 1.04, 1.56, 3.12),
(2, 'biasa', 0.18, 0.36, 1.44, 1.98),
(3, 'buruk', 0.04, 0.03, 0.13, 0.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_metrix_penjumlahan_genre`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_penjumlahan_genre` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `hardrock` double NOT NULL,
  `heavy_metal` double NOT NULL,
  `thrash_metal` double NOT NULL,
  `death_metal` double NOT NULL,
  `grindcore` double NOT NULL,
  `jumlah` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tb_metrix_penjumlahan_genre`
--

INSERT INTO `tb_metrix_penjumlahan_genre` (`id_matrix`, `nama_subkriteria`, `hardrock`, `heavy_metal`, `thrash_metal`, `death_metal`, `grindcore`, `jumlah`) VALUES
(1, 'hardrock', 0.36, 0.72, 1.08, 1.08, 1.44, 4.68),
(2, 'heavy_metal', 0.15, 0.29, 0.87, 1.16, 1.45, 3.92),
(3, 'thrash_metal', 0.05, 0.05, 0.16, 0.48, 0.64, 1.38),
(4, 'death_metal', 0.04, 0.03, 0.04, 0.13, 0.91, 1.15),
(5, 'grindcore', 0.01, 0.01, 0.01, 0.01, 0.05, 0.09);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_metrix_penjumlahan_penampilan`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_penjumlahan_penampilan` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `baik` double NOT NULL,
  `biasa` double NOT NULL,
  `buruk` double NOT NULL,
  `jumlah` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_metrix_penjumlahan_penampilan`
--

INSERT INTO `tb_metrix_penjumlahan_penampilan` (`id_matrix`, `nama_subkriteria`, `baik`, `biasa`, `buruk`, `jumlah`) VALUES
(1, 'baik', 0.55, 1.65, 1.65, 3.85),
(2, 'biasa', 0.11, 0.33, 1.65, 2.09),
(3, 'buruk', 0.04, 0.02, 0.12, 0.18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_metrix_subkriteria_album`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_subkriteria_album` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `lebihdarisatu` double NOT NULL,
  `masihsatu` double NOT NULL,
  `kosong` double NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `sub_prioritas` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_metrix_subkriteria_album`
--

INSERT INTO `tb_metrix_subkriteria_album` (`id_matrix`, `nama_subkriteria`, `lebihdarisatu`, `masihsatu`, `kosong`, `jumlah`, `prioritas`, `sub_prioritas`) VALUES
(1, 'lebihdarisatu', 0.65, 0.69, 0.56, 1.9, 0.63, 1),
(2, 'masihsatu', 0.22, 0.23, 0.33, 0.78, 0.26, 0.41),
(3, 'kosong', 0.13, 0.08, 0.11, 0.32, 0.11, 0.17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_metrix_subkriteria_attitude`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_subkriteria_attitude` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `baik` double NOT NULL,
  `biasa` double NOT NULL,
  `buruk` double NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `sub_prioritas` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_metrix_subkriteria_attitude`
--

INSERT INTO `tb_metrix_subkriteria_attitude` (`id_matrix`, `nama_subkriteria`, `baik`, `biasa`, `buruk`, `jumlah`, `prioritas`, `sub_prioritas`) VALUES
(1, 'baik', 0.55, 0.62, 0.38, 1.55, 0.52, 1),
(2, 'biasa', 0.27, 0.31, 0.5, 1.08, 0.36, 0.69),
(3, 'buruk', 0.18, 0.08, 0.13, 0.39, 0.13, 0.25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_metrix_subkriteria_genre`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_subkriteria_genre` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `hardrock` double NOT NULL,
  `heavy_metal` double NOT NULL,
  `thrash_metal` double NOT NULL,
  `death_metal` double NOT NULL,
  `grindcore` double NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `sub_prioritas` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tb_metrix_subkriteria_genre`
--

INSERT INTO `tb_metrix_subkriteria_genre` (`id_matrix`, `nama_subkriteria`, `hardrock`, `heavy_metal`, `thrash_metal`, `death_metal`, `grindcore`, `jumlah`, `prioritas`, `sub_prioritas`) VALUES
(1, 'hardrock', 0.41, 0.53, 0.4, 0.27, 0.19, 1.8, 0.36, 1),
(2, 'heavy_metal', 0.21, 0.26, 0.4, 0.36, 0.24, 1.47, 0.29, 0.81),
(3, 'thrash_metal', 0.14, 0.09, 0.13, 0.27, 0.19, 0.82, 0.16, 0.44),
(4, 'death_metal', 0.14, 0.07, 0.04, 0.09, 0.33, 0.67, 0.13, 0.36),
(5, 'grindcore', 0.1, 0.05, 0.03, 0.01, 0.05, 0.24, 0.05, 0.14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_metrix_subkriteria_penampilan`
--

CREATE TABLE IF NOT EXISTS `tb_metrix_subkriteria_penampilan` (
  `id_matrix` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `baik` double NOT NULL,
  `biasa` double NOT NULL,
  `buruk` double NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `sub_prioritas` double NOT NULL,
  PRIMARY KEY (`id_matrix`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_metrix_subkriteria_penampilan`
--

INSERT INTO `tb_metrix_subkriteria_penampilan` (`id_matrix`, `nama_subkriteria`, `baik`, `biasa`, `buruk`, `jumlah`, `prioritas`, `sub_prioritas`) VALUES
(1, 'baik', 0.6, 0.71, 0.33, 1.64, 0.55, 1),
(2, 'biasa', 0.2, 0.24, 0.56, 1, 0.33, 0.6),
(3, 'buruk', 0.2, 0.05, 0.11, 0.36, 0.12, 0.22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_test`
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
-- Dumping data untuk tabel `tb_nilai_test`
--

INSERT INTO `tb_nilai_test` (`id_nilai`, `no_test`, `nilai_ijasah`, `nilai_wawancara`, `nilai_tpa`, `nilai_alquran`, `keterangan`) VALUES
(5, 'MB0001', '80', '91', '79', '70', 'Diterima'),
(6, 'MB0002', '75', '72', '81', '69', 'Diterima'),
(7, 'MB0003', '65', '68', '74', '80', 'Diterima'),
(8, 'MB0004', '60', '54', '59', '60', 'Ditolak'),
(9, 'MB0005', '78', '63', '70', '75', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rasio_konsistensi_album`
--

CREATE TABLE IF NOT EXISTS `tb_rasio_konsistensi_album` (
  `id_konsistensi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `hasil` double NOT NULL,
  PRIMARY KEY (`id_konsistensi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_rasio_konsistensi_album`
--

INSERT INTO `tb_rasio_konsistensi_album` (`id_konsistensi`, `nama_subkriteria`, `jumlah`, `prioritas`, `hasil`) VALUES
(1, 'lebihdarisatu', 5.67, 0.63, 6.3),
(2, 'masihsatu', 1.13, 0.26, 1.39),
(3, 'kosong', 0.17, 0.11, 0.28);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rasio_konsistensi_attitude`
--

CREATE TABLE IF NOT EXISTS `tb_rasio_konsistensi_attitude` (
  `id_konsistensi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `hasil` double NOT NULL,
  PRIMARY KEY (`id_konsistensi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_rasio_konsistensi_attitude`
--

INSERT INTO `tb_rasio_konsistensi_attitude` (`id_konsistensi`, `nama_subkriteria`, `jumlah`, `prioritas`, `hasil`) VALUES
(1, 'baik', 3.12, 0.52, 1.63),
(2, 'biasa', 1.98, 0.36, 1.14),
(3, 'buruk', 0.2, 0.13, 0.39);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rasio_konsistensi_genre`
--

CREATE TABLE IF NOT EXISTS `tb_rasio_konsistensi_genre` (
  `id_konsistensi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `hasil` double NOT NULL,
  PRIMARY KEY (`id_konsistensi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tb_rasio_konsistensi_genre`
--

INSERT INTO `tb_rasio_konsistensi_genre` (`id_konsistensi`, `nama_subkriteria`, `jumlah`, `prioritas`, `hasil`) VALUES
(1, 'hardrock', 4.68, 0.36, 5.04),
(2, 'heavy_metal', 3.92, 0.29, 4.21),
(3, 'thrash_metal', 1.38, 0.16, 1.54),
(4, 'death_metal', 1.15, 0.13, 1.28),
(5, 'grindcore', 0.09, 0.05, 0.14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rasio_konsistensi_kriteria`
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
-- Dumping data untuk tabel `tb_rasio_konsistensi_kriteria`
--

INSERT INTO `tb_rasio_konsistensi_kriteria` (`id_konsistensi`, `nama_kriteria`, `jumlah`, `prioritas`, `hasil`) VALUES
(4, 'Album', 0.16, 0.08, 0.32),
(2, 'Attitude', 1.52, 0.24, 0.99),
(3, 'Genre', 0.83, 0.17, 0.7),
(1, 'Penampilan', 6.12, 0.51, 2.14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rasio_konsistensi_penampilan`
--

CREATE TABLE IF NOT EXISTS `tb_rasio_konsistensi_penampilan` (
  `id_konsistensi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `jumlah` double NOT NULL,
  `prioritas` double NOT NULL,
  `hasil` double NOT NULL,
  PRIMARY KEY (`id_konsistensi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_rasio_konsistensi_penampilan`
--

INSERT INTO `tb_rasio_konsistensi_penampilan` (`id_konsistensi`, `nama_subkriteria`, `jumlah`, `prioritas`, `hasil`) VALUES
(1, 'baik', 3.85, 0.55, 1.9),
(2, 'biasa', 2.09, 0.33, 1.11),
(3, 'buruk', 0.18, 0.12, 0.37);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_statusnilai`
--

CREATE TABLE IF NOT EXISTS `tb_statusnilai` (
  `id_statusnilai` char(1) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `nilai` double NOT NULL,
  PRIMARY KEY (`id_statusnilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_statusnilai`
--

INSERT INTO `tb_statusnilai` (`id_statusnilai`, `keterangan`, `nilai`) VALUES
('Y', 'Parameter', 250);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_subkriteria_album`
--

CREATE TABLE IF NOT EXISTS `tb_subkriteria_album` (
  `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `lebihdarisatu` double NOT NULL,
  `masihsatu` double NOT NULL,
  `kosong` double NOT NULL,
  PRIMARY KEY (`id_subkriteria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_subkriteria_album`
--

INSERT INTO `tb_subkriteria_album` (`id_subkriteria`, `nama_subkriteria`, `lebihdarisatu`, `masihsatu`, `kosong`) VALUES
(1, 'lebihdarisatu', 1, 3, 5),
(2, 'masihsatu', 0.33, 1, 3),
(3, 'kosong', 0.2, 0.333, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_subkriteria_attitude`
--

CREATE TABLE IF NOT EXISTS `tb_subkriteria_attitude` (
  `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `baik` double NOT NULL,
  `biasa` double NOT NULL,
  `buruk` double NOT NULL,
  PRIMARY KEY (`id_subkriteria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_subkriteria_attitude`
--

INSERT INTO `tb_subkriteria_attitude` (`id_subkriteria`, `nama_subkriteria`, `baik`, `biasa`, `buruk`) VALUES
(1, 'baik', 1, 2, 3),
(2, 'biasa', 0.5, 1, 4),
(3, 'buruk', 0.333, 0.25, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_subkriteria_genre`
--

CREATE TABLE IF NOT EXISTS `tb_subkriteria_genre` (
  `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `hardrock` double NOT NULL,
  `heavy_metal` double NOT NULL,
  `thrash_metal` double NOT NULL,
  `death_metal` double NOT NULL,
  `grindcore` double NOT NULL,
  PRIMARY KEY (`id_subkriteria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tb_subkriteria_genre`
--

INSERT INTO `tb_subkriteria_genre` (`id_subkriteria`, `nama_subkriteria`, `hardrock`, `heavy_metal`, `thrash_metal`, `death_metal`, `grindcore`) VALUES
(1, 'hardrock', 1, 2, 3, 3, 4),
(2, 'heavy_metal', 0.5, 1, 3, 4, 5),
(3, 'thrash_metal', 0.333, 0.333, 1, 3, 4),
(4, 'death_metal', 0.3333, 0.25, 0.3333, 1, 7),
(5, 'grindcore', 0.25, 0.2, 0.25, 0.14286, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_subkriteria_penampilan`
--

CREATE TABLE IF NOT EXISTS `tb_subkriteria_penampilan` (
  `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(30) NOT NULL,
  `baik` double NOT NULL,
  `biasa` double NOT NULL,
  `buruk` double NOT NULL,
  PRIMARY KEY (`id_subkriteria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_subkriteria_penampilan`
--

INSERT INTO `tb_subkriteria_penampilan` (`id_subkriteria`, `nama_subkriteria`, `baik`, `biasa`, `buruk`) VALUES
(1, 'baik', 1, 3, 3),
(2, 'biasa', 0.33, 1, 5),
(3, 'buruk', 0.333, 0.2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
