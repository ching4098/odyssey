-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 12:54 PM
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
  `icPelanggan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`idAlamat`, `alamat1`, `alamat2`, `bandar`, `poskod`, `negeri`, `icPelanggan`) VALUES
(5, '48', 'Jalan Gembira', 'Johor Bahru', '15000', 'Johor', '090807030555'),
(6, '36', 'Jalan Tembaga', 'Georgetown', '54000', 'Pulau Pinang', '654475876976'),
(7, '596B', 'Jalan Bahagia', 'Kuching', '39600', 'Sarawak', '515152021560');

-- --------------------------------------------------------

--
-- Table structure for table `bilik`
--

CREATE TABLE `bilik` (
  `idBilik` int(11) NOT NULL,
  `jenisBilik` varchar(50) NOT NULL,
  `hargaBilik` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bilik`
--

INSERT INTO `bilik` (`idBilik`, `jenisBilik`, `hargaBilik`) VALUES
(1, 'SINGLE', '150.00'),
(4, 'DOUBLE', '250.00');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `icPelanggan` varchar(12) NOT NULL,
  `namaPelanggan` varchar(80) NOT NULL,
  `noTelefon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`icPelanggan`, `namaPelanggan`, `noTelefon`) VALUES
('090807030555', 'Ray Teoh', '0189999999'),
('515152021560', 'Yeoh Ah Li', '0987677999'),
('654475876976', 'Muhammad Farid bin Isyak', '0179999999');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idPengguna` int(3) NOT NULL,
  `namaPengguna` varchar(80) NOT NULL,
  `kataLaluan` varchar(25) NOT NULL,
  `jenisPengguna` varchar(100) NOT NULL,
  `loginTerakhir` datetime NOT NULL,
  `logoutTerakhir` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idPengguna`, `namaPengguna`, `kataLaluan`, `jenisPengguna`, `loginTerakhir`, `logoutTerakhir`) VALUES
(2, 'admin', '123456', 'ADMIN', '2020-09-01 18:44:25', '2020-09-01 18:37:19'),
(4, 'ermm', '123456', 'ADMIN', '2020-05-16 15:00:37', '2020-05-16 15:00:40'),
(6, 'regre', '123456', 'PEKERJA', '2020-05-16 15:00:56', '2020-05-16 15:00:59'),
(10, 'zx', '123456', 'PEKERJA', '2020-05-16 15:00:15', '2020-05-16 15:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE `tempahan` (
  `idTempahan` int(11) NOT NULL,
  `tarikhMasuk` date NOT NULL,
  `tarikhKeluar` date NOT NULL,
  `icPelanggan` varchar(12) NOT NULL,
  `idBilik` int(11) NOT NULL,
  `bayaran` decimal(10,2) NOT NULL,
  `idPengguna` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`idTempahan`, `tarikhMasuk`, `tarikhKeluar`, `icPelanggan`, `idBilik`, `bayaran`, `idPengguna`) VALUES
(10, '2020-04-07', '2020-04-09', '090807030555', 1, '150.00', 2),
(11, '2020-04-20', '2020-04-28', '090807030555', 1, '150.00', 2),
(12, '2020-04-14', '2020-04-16', '515152021560', 1, '150.00', 2),
(13, '2020-04-16', '2020-04-18', '654475876976', 4, '250.00', 2),
(14, '2020-05-15', '2020-05-17', '090807030555', 4, '250.00', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`idAlamat`),
  ADD KEY `icPelanggan` (`icPelanggan`);

--
-- Indexes for table `bilik`
--
ALTER TABLE `bilik`
  ADD PRIMARY KEY (`idBilik`);

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
  ADD KEY `idBilik` (`idBilik`),
  ADD KEY `icPelanggan` (`icPelanggan`),
  ADD KEY `idPengguna` (`idPengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `idAlamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bilik`
--
ALTER TABLE `bilik`
  MODIFY `idBilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idPengguna` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tempahan`
--
ALTER TABLE `tempahan`
  MODIFY `idTempahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamat`
--
ALTER TABLE `alamat`
  ADD CONSTRAINT `alamat_ibfk_1` FOREIGN KEY (`icPelanggan`) REFERENCES `pelanggan` (`icPelanggan`);

--
-- Constraints for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD CONSTRAINT `tempahan_ibfk_1` FOREIGN KEY (`idBilik`) REFERENCES `bilik` (`idBilik`),
  ADD CONSTRAINT `tempahan_ibfk_2` FOREIGN KEY (`icPelanggan`) REFERENCES `pelanggan` (`icPelanggan`),
  ADD CONSTRAINT `tempahan_ibfk_3` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`idPengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
