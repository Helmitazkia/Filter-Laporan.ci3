-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 03:43 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learn_codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kd_barang` int(11) NOT NULL,
  `kd_jns` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `deleted_at` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`kd_barang`, `kd_jns`, `nama`, `harga`, `jumlah`, `tgl_masuk`, `deleted_at`) VALUES
(16, 7, 'Teh Gelas', 8000, 17, '2021-07-14', '0'),
(17, 7, 'Kopi Good Day', 70000, 13, '2021-07-02', '0'),
(20, 33, 'Mie Goreng ', 3000, 4, '2021-07-08', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jnsbarang`
--

CREATE TABLE `tbl_jnsbarang` (
  `kd_jns` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deleted_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jnsbarang`
--

INSERT INTO `tbl_jnsbarang` (`kd_jns`, `nama`, `deleted_at`) VALUES
(7, 'Minuman', '0'),
(33, 'Makanan Ringan', '0'),
(44, 'Elektronik', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `kd_pembelian` int(11) NOT NULL,
  `struk` varchar(30) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jml_beli` int(11) NOT NULL,
  `tgl_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`kd_pembelian`, `struk`, `kd_barang`, `jml_beli`, `tgl_beli`) VALUES
(5, 're3', 13, 53, '2021-06-10'),
(15, 'sdfsdfsdf', 12, 20, '2021-07-15'),
(25, '12130002', 17, 2, '2021-09-14'),
(26, '12130003', 16, 1, '2021-09-16'),
(27, '12130001', 16, 2, '2021-09-12');

--
-- Triggers `tbl_pembelian`
--
DELIMITER $$
CREATE TRIGGER `Kurang_stok_barang` AFTER INSERT ON `tbl_pembelian` FOR EACH ROW BEGIN
update tbl_barang Set jumlah = jumlah - new.jml_beli
WHERE kd_barang = new.kd_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Tambah_stok_barang` AFTER DELETE ON `tbl_pembelian` FOR EACH ROW BEGIN
UPDATE tbl_barang set jumlah = jumlah + old.jml_beli
WHERE kd_barang = old.kd_barang;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `tbl_jnsbarang`
--
ALTER TABLE `tbl_jnsbarang`
  ADD PRIMARY KEY (`kd_jns`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`kd_pembelian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `kd_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_jnsbarang`
--
ALTER TABLE `tbl_jnsbarang`
  MODIFY `kd_jns` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `kd_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
