-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2017 at 01:11 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(11) NOT NULL,
  `id_kec` int(11) NOT NULL,
  `nama_desa` varchar(25) NOT NULL,
  `nama_kepdesa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id_desa`, `id_kec`, `nama_desa`, `nama_kepdesa`) VALUES
(23, 1, 'Sinyiur', ''),
(24, 1, 'Mendana Raya', ''),
(25, 1, 'Tanjung Luar', ''),
(26, 1, 'Maringkek', ''),
(27, 1, 'Batu Putek', ''),
(28, 1, 'Dane Rase', ''),
(29, 1, 'Selebung Ketangga', ''),
(31, 1, 'Keruak', ''),
(32, 1, 'Sepit', ''),
(33, 1, 'Setungkep Lingsar', ''),
(34, 1, 'Ketangga Jeraeng', '');

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

CREATE TABLE `dusun` (
  `id_dusun` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `nama_dusun` varchar(25) NOT NULL,
  `nama_kadus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`id_dusun`, `id_desa`, `nama_dusun`, `nama_kadus`) VALUES
(1, 23, 'Sinyiur', 'H. Rizal'),
(2, 23, 'Mendane', 'H. Faisal'),
(3, 24, 'Mendane Lauk', 'H. Irawan');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` int(11) NOT NULL,
  `nama_kec` varchar(25) NOT NULL,
  `nama_kepcamat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `nama_kec`, `nama_kepcamat`) VALUES
(1, 'Keruak', ''),
(2, 'Jerowaru', ''),
(3, 'Sakra', ''),
(4, 'Sakra Barat', ''),
(5, 'Sakra Timur', ''),
(6, 'Terara', ''),
(7, 'Montong Gading', ''),
(8, 'Sikur', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `username`, `password`, `nama_lengkap`, `foto`, `status`) VALUES
(8, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Hari Irawan', '12.jpg', 1),
(10, 'adam', '0e18f44c1fec03ec4083422cb58ba6a09ac4fb2a', 'Adam', '6.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_abk`
--

CREATE TABLE `tabel_abk` (
  `id` int(11) NOT NULL,
  `nama_anak` varchar(30) NOT NULL,
  `jk` char(1) NOT NULL,
  `umur` int(2) NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_dusun` int(11) NOT NULL,
  `APS` int(1) NOT NULL,
  `ABA` int(1) NOT NULL,
  `BGM` int(1) NOT NULL,
  `HIV` int(1) NOT NULL,
  `ABM` int(1) NOT NULL,
  `APC` int(1) NOT NULL,
  `AYP` int(1) NOT NULL,
  `ATA` int(1) NOT NULL,
  `ATD` int(1) NOT NULL,
  `ADL` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_abk`
--

INSERT INTO `tabel_abk` (`id`, `nama_anak`, `jk`, `umur`, `nama_ortu`, `pekerjaan`, `id_desa`, `id_dusun`, `APS`, `ABA`, `BGM`, `HIV`, `ABM`, `APC`, `AYP`, `ATA`, `ATD`, `ADL`) VALUES
(1, 'Hari Irawan', 'L', 11, 'Karsiah', 'Buruh', 23, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1),
(2, 'Waton', 'P', 9, 'Awan', 'Buruh', 23, 1, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0),
(3, 'Rizal', 'P', 10, 'Rizal', 'Buruh', 23, 1, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0),
(4, 'Hedi Kardiawan', 'L', 8, 'Karsiah', 'Buruh', 24, 3, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0),
(7, 'Oke', 'L', 11, 'Oke Juga', 'Buruh', 23, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `id_kec` (`id_kec`);

--
-- Indexes for table `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id_dusun`),
  ADD KEY `id_desa` (`id_desa`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tabel_abk`
--
ALTER TABLE `tabel_abk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tabel_abk_ibfk_1` (`id_dusun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id_dusun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tabel_abk`
--
ALTER TABLE `tabel_abk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `desa_ibfk_1` FOREIGN KEY (`id_kec`) REFERENCES `kecamatan` (`id_kec`) ON UPDATE CASCADE;

--
-- Constraints for table `dusun`
--
ALTER TABLE `dusun`
  ADD CONSTRAINT `dusun_ibfk_1` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON UPDATE CASCADE;

--
-- Constraints for table `tabel_abk`
--
ALTER TABLE `tabel_abk`
  ADD CONSTRAINT `tabel_abk_ibfk_1` FOREIGN KEY (`id_dusun`) REFERENCES `dusun` (`id_dusun`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
