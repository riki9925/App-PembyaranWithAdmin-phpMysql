-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 10 Des 2013 pada 06.35
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `bayar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE IF NOT EXISTS `bulan` (
  `id_bulan` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `bulan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_bulan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `bulan`) VALUES
('007G', 'Januari'),
('008H', 'Februari'),
('009I', 'Maret'),
('010J', 'April'),
('011K', 'Mei'),
('012L', 'Juni'),
('001A', 'Juli'),
('002B', 'Agustus'),
('003C', 'September'),
('004D', 'Oktober'),
('005E', 'November'),
('006F', 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `kjurusan` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `kelas` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `spp` int(10) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nama_guru` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `password_asli` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `status` enum('admin','kepsek','siswa') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`user`, `nama_guru`, `password`, `password_asli`, `status`) VALUES
('admin', 'Kheri Agus Suseno, S.Kom', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin'),
('ahmad', 'Ade Ermilian, S.Pd', '61243c7b9a4022cb3f8dc3106767ed12', 'ahmad', 'kepsek'),
('siswa', 'siswa', 'bcd724d15cde8c47650fda962968f102', 'siswa', 'siswa'),
('user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `id_kelas` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tahun_ajaran` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stor`
--

CREATE TABLE IF NOT EXISTS `stor` (
  `id_bayar` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `bayar` int(11) NOT NULL,
  `bln` int(11) NOT NULL,
  `semester` int(3) NOT NULL,
  `id_bulan` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nis` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `id_kelas` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `tglupdate` varchar(10) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
  `id_tahun` varchar(10) NOT NULL,
  `tahun_ajaran` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tahun`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tunggakan`
--

CREATE TABLE IF NOT EXISTS `tunggakan` (
  `id_tunggakkan` varchar(20) NOT NULL,
  `jml_bln_tunggakan` int(20) NOT NULL,
  `jml_tunggakkan` int(20) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `semester` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
