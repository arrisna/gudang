-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2016 at 04:23 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `retail`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kd_brg` varchar(10) NOT NULL,
  `nama_brg` varchar(30) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_brg`, `nama_brg`, `kategori`, `harga_beli`, `harga_jual`, `stok`) VALUES
('ATK001', 'Bolpoin', 'KB03', 3000, 4000, 20),
('ATK002', 'Sinar Dunia A4', 'KB03', 32000, 37000, 6),
('BM001', 'Sprite', 'KB01', 4000, 6000, 4),
('BM002', 'Air Mineral', 'KB01', 3500, 5000, 24),
('BM003', 'Fresfea', 'KB01', 6000, 7000, 20),
('BM004', 'Fruitea', 'KB01', 7000, 7500, 2),
('BM005', 'Lasegar', 'KB01', 4000, 5500, 10),
('BMK001', 'Kripik Karuhun', 'KB02', 24000, 26000, 10),
('BMK002', 'Bakmi Mewah', 'KB02', 5000, 7200, 7),
('BMK003', 'Chtato', 'KB02', 10500, 12000, 10),
('KB058', 'Coca-Cola', 'KB02', 3000, 5000, 0),
('KB059', 'juice', 'KB01', 3500, 5000, 13);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kat` varchar(5) NOT NULL,
  `nama_kat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kat`, `nama_kat`) VALUES
('KB01', 'Minuman'),
('KB02', 'Makanan'),
('KB03', 'Alat Tulis Kantor'),
('KB04', 'Alat Dapur');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `no_pembelian` varchar(15) NOT NULL,
  `kd_brg` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `kd_suplier` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`no_pembelian`, `kd_brg`, `tanggal`, `harga`, `jumlah`, `kd_suplier`) VALUES
('2121212', 'BM004', '0000-00-00', 7000, 5, 'KS001'),
('22333', 'BM004', '0000-00-00', 7000, 4, 'KS001'),
('kt/11233', 'KB059', '2016-11-13', 3500, 10, 'KS001');

--
-- Triggers `pembelian`
--
DELIMITER //
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `pembelian`
 FOR EACH ROW BEGIN
UPDATE `barang` SET stok=stok+NEW.jumlah WHERE kd_brg=NEW.kd_brg;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `no_penjualan` varchar(15) NOT NULL,
  `kd_brg` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`no_penjualan`, `kd_brg`, `tanggal`, `harga`, `jumlah`) VALUES
('12345', 'BM001', '0000-00-00', 6000, 1),
('2224', 'BM004', '0000-00-00', 7500, 5),
('6666677', 'BM001', '0000-00-00', 6000, 2),
('8888', 'BM001', '0000-00-00', 6000, 1);

--
-- Triggers `penjualan`
--
DELIMITER //
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `penjualan`
 FOR EACH ROW BEGIN
UPDATE `barang` SET stok=stok-NEW.jumlah WHERE kd_brg=NEW.kd_brg;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE IF NOT EXISTS `suplier` (
  `kd_suplier` varchar(15) NOT NULL,
  `nama_suplier` varchar(30) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`kd_suplier`, `nama_suplier`, `no_hp`, `alamat`) VALUES
('KS001', 'Andi Redha', '085237689111', 'Perumahan Tepian Gg.7 No.7 Samarinda Utara');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `no_hp`, `alamat`, `email`, `level`) VALUES
('admin', '0192023a7bbd73250516f069df18b500', 'admin', '0853462568', 'nisjsjjakjssjkajskajskasjkajskasa', 'ari.risnawadi@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`kd_brg`), ADD KEY `kategori_id_fk` (`kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
 ADD PRIMARY KEY (`no_pembelian`), ADD KEY `fk_kode_barg` (`kd_brg`), ADD KEY `fk_kd_suplier` (`kd_suplier`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
 ADD PRIMARY KEY (`no_penjualan`), ADD KEY `fk_kode_brg` (`kd_brg`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
 ADD PRIMARY KEY (`kd_suplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
ADD CONSTRAINT `kategori_id_fk` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id_kat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
ADD CONSTRAINT `fk_kd_suplier` FOREIGN KEY (`kd_suplier`) REFERENCES `suplier` (`kd_suplier`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_kode_barg` FOREIGN KEY (`kd_brg`) REFERENCES `barang` (`kd_brg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
ADD CONSTRAINT `fk_kode_brg` FOREIGN KEY (`kd_brg`) REFERENCES `barang` (`kd_brg`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
