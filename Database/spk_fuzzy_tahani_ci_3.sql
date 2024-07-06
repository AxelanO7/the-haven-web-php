-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Mar 2023 pada 03.32
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_fuzzy_tahani_ci_3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE IF NOT EXISTS `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama`) VALUES
(28, 'Sintya'),
(29, 'Dini'),
(30, 'Selvia'),
(31, 'Rizky'),
(32, 'Ray'),
(33, 'Ryan'),
(34, 'Niar'),
(35, 'Rere'),
(36, 'Ririn'),
(37, 'Sinta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE IF NOT EXISTS `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_variabel` int(11) NOT NULL,
  `id_himpunan_fuzzy` int(11) NOT NULL,
  `f` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `id_variabel`, `id_himpunan_fuzzy`, `f`) VALUES
(1, 28, 38, 149, 0),
(2, 28, 39, 152, 0),
(3, 28, 40, 155, 1),
(4, 28, 41, 158, 1),
(5, 28, 42, 161, 1),
(6, 29, 38, 149, 0),
(7, 29, 39, 152, 0),
(8, 29, 40, 155, 0),
(9, 29, 41, 158, 1),
(10, 29, 42, 161, 0),
(11, 30, 38, 149, 0),
(12, 30, 39, 152, 0),
(13, 30, 40, 155, 0),
(14, 30, 41, 158, 0.1),
(15, 30, 42, 161, 0),
(16, 31, 38, 149, 1),
(17, 31, 39, 152, 1),
(18, 31, 40, 155, 0),
(19, 31, 41, 158, 1),
(20, 31, 42, 161, 1),
(21, 32, 38, 149, 1),
(22, 32, 39, 152, 1),
(23, 32, 40, 155, 1),
(24, 32, 41, 158, 1),
(25, 32, 42, 161, 1),
(26, 33, 38, 149, 0),
(27, 33, 39, 152, 0),
(28, 33, 40, 155, 0),
(29, 33, 41, 158, 0),
(30, 33, 42, 161, 0),
(31, 34, 38, 149, 0),
(32, 34, 39, 152, 0),
(33, 34, 40, 155, 1),
(34, 34, 41, 158, 1),
(35, 34, 42, 161, 1),
(36, 35, 38, 149, 0),
(37, 35, 39, 152, 0),
(38, 35, 40, 155, 0),
(39, 35, 41, 158, 0),
(40, 35, 42, 161, 0),
(41, 36, 38, 149, 1),
(42, 36, 39, 152, 1),
(43, 36, 40, 155, 1),
(44, 36, 41, 158, 1),
(45, 36, 42, 161, 0),
(46, 37, 38, 149, 0),
(47, 37, 39, 152, 1),
(48, 37, 40, 155, 0),
(49, 37, 41, 158, 1),
(50, 37, 42, 161, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `himpunan_fuzzy`
--

CREATE TABLE IF NOT EXISTS `himpunan_fuzzy` (
  `id_himpunan_fuzzy` int(11) NOT NULL,
  `id_variabel` int(11) NOT NULL,
  `nama_himpunan` varchar(200) NOT NULL,
  `kurva` varchar(100) NOT NULL,
  `a` float DEFAULT NULL,
  `b` float DEFAULT NULL,
  `c` float DEFAULT NULL,
  `d` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `himpunan_fuzzy`
--

INSERT INTO `himpunan_fuzzy` (`id_himpunan_fuzzy`, `id_variabel`, `nama_himpunan`, `kurva`, `a`, `b`, `c`, `d`) VALUES
(147, 38, 'Kurang', 'Linier Turun', 60, 70, 0, 0),
(148, 38, 'Cukup', 'Segitiga', 60, 70, 80, 0),
(149, 38, 'Baik', 'Linier Naik', 70, 80, 0, 0),
(150, 39, 'Kurang', 'Linier Turun', 60, 70, 0, 0),
(151, 39, 'Cukup', 'Segitiga', 60, 70, 80, 0),
(152, 39, 'Baik', 'Linier Naik', 70, 80, 0, 0),
(153, 40, 'Kurang', 'Linier Turun', 60, 70, 0, 0),
(154, 40, 'Cukup', 'Segitiga', 60, 70, 80, 0),
(155, 40, 'Baik', 'Linier Naik', 70, 80, 0, 0),
(156, 41, 'Kurang', 'Linier Turun', 60, 70, 0, 0),
(157, 41, 'Cukup', 'Segitiga', 60, 70, 80, 0),
(158, 41, 'Baik', 'Linier Naik', 70, 80, 0, 0),
(159, 42, 'Kurang', 'Linier Turun', 60, 70, 0, 0),
(160, 42, 'Cukup', 'Segitiga', 60, 70, 80, 0),
(161, 42, 'Baik', 'Linier Naik', 70, 80, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE IF NOT EXISTS `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_variabel` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=228 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_variabel`, `nilai`) VALUES
(178, 28, 38, 60),
(179, 29, 38, 60),
(180, 30, 38, 40),
(181, 31, 38, 80),
(182, 32, 38, 90),
(183, 33, 38, 70),
(184, 34, 38, 50),
(185, 35, 38, 50),
(186, 36, 38, 90),
(187, 37, 38, 70),
(188, 28, 39, 60),
(189, 28, 40, 80),
(190, 28, 41, 100),
(191, 28, 42, 80),
(192, 29, 39, 70),
(193, 29, 40, 60),
(194, 29, 41, 86),
(195, 29, 42, 60),
(196, 30, 39, 40),
(197, 30, 40, 60),
(198, 30, 41, 71),
(199, 30, 42, 40),
(200, 31, 39, 80),
(201, 31, 40, 70),
(202, 31, 41, 100),
(203, 31, 42, 80),
(204, 32, 39, 80),
(205, 32, 40, 80),
(206, 32, 41, 95),
(207, 32, 42, 80),
(208, 33, 39, 70),
(209, 33, 40, 50),
(210, 33, 41, 62),
(211, 33, 42, 50),
(212, 34, 39, 40),
(213, 34, 40, 80),
(214, 34, 41, 90),
(215, 34, 42, 80),
(216, 35, 39, 50),
(217, 35, 40, 70),
(218, 35, 41, 52),
(219, 35, 42, 70),
(220, 36, 39, 80),
(221, 36, 40, 80),
(222, 36, 41, 90),
(223, 36, 42, 70),
(224, 37, 39, 80),
(225, 37, 40, 60),
(226, 37, 41, 95),
(227, 37, 42, 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_user_level`, `nama`, `email`, `username`, `password`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(7, 2, 'User', 'user@gmail.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE IF NOT EXISTS `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `variabel`
--

CREATE TABLE IF NOT EXISTS `variabel` (
  `id_variabel` int(11) NOT NULL,
  `nama_variabel` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `variabel`
--

INSERT INTO `variabel` (`id_variabel`, `nama_variabel`) VALUES
(38, 'Pengetahuan'),
(39, 'Keahlian'),
(40, 'Kepribadian'),
(41, 'Disiplin Kerja'),
(42, 'Loyalitas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_variabel` (`id_variabel`),
  ADD KEY `id_himpunan_fuzzy` (`id_himpunan_fuzzy`);

--
-- Indexes for table `himpunan_fuzzy`
--
ALTER TABLE `himpunan_fuzzy`
  ADD PRIMARY KEY (`id_himpunan_fuzzy`),
  ADD KEY `id_variabel` (`id_variabel`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_variabel` (`id_variabel`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_level` (`id_user_level`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- Indexes for table `variabel`
--
ALTER TABLE `variabel`
  ADD PRIMARY KEY (`id_variabel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `himpunan_fuzzy`
--
ALTER TABLE `himpunan_fuzzy`
  MODIFY `id_himpunan_fuzzy` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=162;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=228;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `variabel`
--
ALTER TABLE `variabel`
  MODIFY `id_variabel` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_ibfk_2` FOREIGN KEY (`id_variabel`) REFERENCES `variabel` (`id_variabel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_ibfk_3` FOREIGN KEY (`id_himpunan_fuzzy`) REFERENCES `himpunan_fuzzy` (`id_himpunan_fuzzy`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `himpunan_fuzzy`
--
ALTER TABLE `himpunan_fuzzy`
  ADD CONSTRAINT `himpunan_fuzzy_ibfk_1` FOREIGN KEY (`id_variabel`) REFERENCES `variabel` (`id_variabel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_variabel`) REFERENCES `variabel` (`id_variabel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `user_level` (`id_user_level`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
