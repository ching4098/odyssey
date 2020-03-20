-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2020 at 02:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odyssey`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `idAlamat` int(11) NOT NULL,
  `alamat1` varchar(20) NOT NULL,
  `alamat2` varchar(20) NOT NULL,
  `bandar` varchar(20) NOT NULL,
  `poskod` varchar(5) NOT NULL,
  `negeri` varchar(20) NOT NULL,
  `icPelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`idAlamat`, `alamat1`, `alamat2`, `bandar`, `poskod`, `negeri`, `icPelanggan`) VALUES
(1, '48', 'Jalab Gembira', 'Georgetown', '15000', 'Pulau Pinang', '090807030555'),
(3, '36', 'Jalan Tembaga', 'Johor Bahru', '54000', 'Johor', '654475876976'),
(4, '79A', 'Jalan Jarang', 'Georgetown', '45000', 'Pulau Pinang', '145825611414');

-- --------------------------------------------------------

--
-- Table structure for table `bilik`
--

CREATE TABLE `bilik` (
  `idBilik` int(11) NOT NULL,
  `jenisBilik` varchar(50) NOT NULL,
  `hargaBilik` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bilik`
--

INSERT INTO `bilik` (`idBilik`, `jenisBilik`, `hargaBilik`) VALUES
(1, 'SINGLE', '690.00'),
(2, 'DOUBLE', '1500.00'),
(3, 'TRIPLE', '2000.00'),
(6, 'SINGLE2', '150.00');

-- --------------------------------------------------------

--
-- Table structure for table `keuntungan`
--

CREATE TABLE `keuntungan` (
  `idKeuntungan` int(11) NOT NULL,
  `amaun` double NOT NULL,
  `tarikh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keuntungan`
--

INSERT INTO `keuntungan` (`idKeuntungan`, `amaun`, `tarikh`) VALUES
(16, 4500, '2019-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `icPelanggan` varchar(12) NOT NULL,
  `namaPelanggan` varchar(80) NOT NULL,
  `noTelefon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`icPelanggan`, `namaPelanggan`, `noTelefon`) VALUES
('145825611414', 'Muhammad Farid bin Isyak', '018756230011'),
('214748364759', 'Ray Teoh', '0189999999'),
('654475876976', 'Yeoh Ah Li', '0179999999');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idPengguna` int(3) NOT NULL,
  `namaPengguna` varchar(80) NOT NULL,
  `kataLaluan` varchar(25) NOT NULL,
  `jenisPengguna` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idPengguna`, `namaPengguna`, `kataLaluan`, `jenisPengguna`) VALUES
(1, 'admin', '123456', 'ADMIN'),
(3, 'ray', '123456', 'ADMIN'),
(9, 'ermm', '456789', 'PEKERJA'),
(14, 'friday', '123456', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE `tempahan` (
  `idTempahan` int(5) NOT NULL,
  `tarikhMasuk` date NOT NULL,
  `tarikhKeluar` date NOT NULL,
  `icPelanggan` varchar(12) NOT NULL,
  `idBilik` int(2) NOT NULL,
  `bayaran` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`idTempahan`, `tarikhMasuk`, `tarikhKeluar`, `icPelanggan`, `idBilik`, `bayaran`) VALUES
(16, '2020-03-18', '2020-03-24', '214748364759', 1, '690.00'),
(17, '2020-03-27', '2020-04-01', '654475876976', 3, '2000.00'),
(18, '2020-03-30', '2020-04-03', '145825611414', 2, '1500.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`idAlamat`);

--
-- Indexes for table `bilik`
--
ALTER TABLE `bilik`
  ADD PRIMARY KEY (`idBilik`);

--
-- Indexes for table `keuntungan`
--
ALTER TABLE `keuntungan`
  ADD PRIMARY KEY (`idKeuntungan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`icPelanggan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idPengguna`);

--
-- Indexes for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD PRIMARY KEY (`idTempahan`),
  ADD KEY `idPelanggan` (`icPelanggan`),
  ADD KEY `idBilik` (`idBilik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `idAlamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bilik`
--
ALTER TABLE `bilik`
  MODIFY `idBilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keuntungan`
--
ALTER TABLE `keuntungan`
  MODIFY `idKeuntungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idPengguna` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tempahan`
--
ALTER TABLE `tempahan`
  MODIFY `idTempahan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
