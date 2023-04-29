-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 04:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appbmn`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `nup` int(11) NOT NULL,
  `merk/type` varchar(255) NOT NULL,
  `jumlah` varchar(11) NOT NULL,
  `tahun_perolehan` date NOT NULL,
  `idRuang` int(11) DEFAULT NULL,
  `idPegawai` int(11) DEFAULT NULL,
  `kondisi` enum('Baik','Rusak Ringan','Rusak Berat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `nup`, `merk/type`, `jumlah`, `tahun_perolehan`, `idRuang`, `idPegawai`, `kondisi`) VALUES
(1, '11.2.32.13', 'Meja', 0, 'Olympic', '1', '2023-03-28', 1, 1, 'Baik'),
(2, 'BG124', 'Meja', 12345678, 'cm,s c', '1', '2023-04-02', 3, 2, 'Rusak Ringan'),
(3, 'abcd123', 'Mobil', 12345678, 'Honda', '', '2023-04-02', 1, 1, 'Rusak Berat'),
(7, '2', 'Samsung', 12345678, 'Yamaha', '1', '2023-04-04', 2, 0, 'Rusak Ringan');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `idKondisi` int(11) NOT NULL,
  `kondisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`idKondisi`, `kondisi`) VALUES
(1, 'Baik'),
(2, 'Rusak Ringan'),
(3, 'Rusak Berat');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idPegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `nip` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `nama_pegawai`, `nip`) VALUES
(1, 'Faza Fuadina', 19751674),
(2, 'Ari Rusmasari', 1982162034);

-- --------------------------------------------------------

--
-- Table structure for table `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `idPemeliharaan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `idPegawai` int(11) DEFAULT NULL,
  `tanggal_pemeliharaan` date NOT NULL,
  `jenis_pemeliharaan` varchar(100) NOT NULL,
  `biaya` decimal(10,2) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`idPemeliharaan`, `id`, `kode_barang`, `idPegawai`, `tanggal_pemeliharaan`, `jenis_pemeliharaan`, `biaya`, `keterangan`) VALUES
(4, 3, '11.2.32.13', 1, '2023-04-04', 'vkv', '10000.00', ''),
(5, 2, 'BG124', 2, '2023-04-04', 'vervgg', '0.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `idRuang` int(11) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`idRuang`, `nama_ruang`) VALUES
(1, 'IPDS'),
(2, 'PST'),
(3, 'KA BPS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`idKondisi`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idPegawai`);

--
-- Indexes for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`idPemeliharaan`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`idRuang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `idKondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idPegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `idPemeliharaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `idRuang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
