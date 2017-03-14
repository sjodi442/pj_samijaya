-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2017 at 02:00 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samijaya0_db`
--
CREATE DATABASE IF NOT EXISTS `samijaya0_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `samijaya0_db`;

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE `anggaran` (
  `id_anggaran` char(5) NOT NULL,
  `nama_produk` varchar(40) NOT NULL,
  `modal` int(12) NOT NULL,
  `harga` int(12) NOT NULL,
  `untung` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id_anggaran`, `nama_produk`, `modal`, `harga`, `untung`) VALUES
('A0001', 'ProdukA', 14000, 20000, 6000),
('A0002', 'ProdukB', 20000, 25000, 5000),
('A0003', 'ProdukC', 26000, 30000, 4000),
('A0004', 'ProdukD', 28000, 35000, 7000),
('A0005', 'ProdukE', 36000, 40000, 4000),
('A0006', 'Produk A', 1000, 1500, 500),
('A0007', 'mie succes', 50000, 55000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` char(5) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat`, `telp`) VALUES
('C0001', 'Ahmad', 'Solo', '081234567890'),
('C0002', 'Rudi', 'Karanganyar', '081234567891'),
('C0003', 'Bambang', 'Boyolali', '081234567892'),
('C0004', 'Amir', 'Sukoharjo', '081234567893'),
('C0005', 'Budi', 'Wonogiri', '081234567894'),
('C0006', 'Arman', 'Solo', '082457348112'),
('C0007', 'Rahmat', 'Wonogiri', '086567567567'),
('C0008', 'jodi', 'kerjo', '08917'),
('C0009', 'duta', 'palur', '089666669'),
('C0010', 'bbb', 'rrr', '080'),
('C0011', 'jodi', 'kerjo', '0998');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_kas`
--

CREATE TABLE `jurnal_kas` (
  `no_jurnal` varchar(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `debet` float NOT NULL,
  `kredit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal_kas`
--

INSERT INTO `jurnal_kas` (`no_jurnal`, `keterangan`, `tgl`, `debet`, `kredit`) VALUES
('JK001', 'Jual SWP', '2017-01-09', 2000000, 0),
('JK002', 'pendapatan', '2017-02-02', 100000, 0),
('JK003', 'pendapatan', '2017-02-10', 20000000, 0),
('JK004', 'jfaklfhaskfhaksfhaksfha;ksfha;skfha;shfaksfhalkshfaklsfhakshfalsfhalsfhalskfhalsk', '2017-02-11', 90, 0),
('JK005', 'beli sabun', '2017-02-10', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_kas_kecil`
--

CREATE TABLE `jurnal_kas_kecil` (
  `no_jurnal` char(10) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `debet` float NOT NULL,
  `kredit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal_kas_kecil`
--

INSERT INTO `jurnal_kas_kecil` (`no_jurnal`, `keterangan`, `tgl`, `debet`, `kredit`) VALUES
('JK001', 'Beli Jahe', '2016-01-19', 0, 200000),
('JK002', 'Jual SW', '2016-01-19', 300000, 0),
('JK003', 'Jual AP', '2016-01-20', 36000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kebijakan`
--

CREATE TABLE `kebijakan` (
  `id_kebijakan` char(5) NOT NULL,
  `id_customer` char(5) NOT NULL,
  `id_produk` char(5) NOT NULL,
  `harga` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kebijakan`
--

INSERT INTO `kebijakan` (`id_kebijakan`, `id_customer`, `id_produk`, `harga`) VALUES
('K0001', 'C0001', 'P001', 18500),
('K0002', 'C0001', 'P002', 21000),
('K0003', 'C0001', 'P003', 26000),
('K0004', 'C0001', 'P004', 32000),
('K0005', 'C0001', 'P005', 36000),
('K0006', 'C0002', 'P001', 19000),
('K0007', 'C0002', 'P002', 22000),
('K0008', 'C0002', 'P003', 28000),
('K0009', 'C0002', 'P004', 34000),
('K0010', 'C0002', 'P005', 38000),
('K0011', 'C0003', 'P001', 17000),
('K0012', 'C0003', 'P002', 22000),
('K0013', 'C0003', 'P003', 25000),
('K0014', 'C0003', 'P004', 30000),
('K0015', 'C0003', 'P005', 35000),
('K0016', 'C0004', 'P001', 18000),
('K0017', 'C0004', 'P002', 21000),
('K0018', 'C0004', 'P003', 27000),
('K0019', 'C0004', 'P004', 33000),
('K0020', 'C0004', 'P005', 38000),
('K0021', 'C0006', 'P001', 18500),
('K0022', 'C0006', 'P002', 22000),
('K0023', 'C0005', 'P007', 15000),
('K0024', 'C0011', 'P007', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` char(5) NOT NULL,
  `nama_produk` varchar(40) NOT NULL,
  `harga` int(12) NOT NULL,
  `stok` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `stok`) VALUES
('P001', 'Produk A', 20000, -12),
('P002', 'Produk B', 25000, 21),
('P003', 'Produk C', 30000, 20),
('P004', 'Produk D', 35000, 44),
('P005', 'Produk E', 40000, 18),
('P006', 'Produk F', 45000, 47),
('P007', 'odol', 1000, -10),
('P008', 'mie succes', 3000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `no_kirim` char(12) NOT NULL,
  `id_customer` char(5) NOT NULL,
  `id_produk` char(5) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `tanggal_kirim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_kirim`
--

CREATE TABLE `transaksi_kirim` (
  `id` int(11) NOT NULL,
  `no_kirim` char(12) NOT NULL,
  `id_customer` char(5) NOT NULL,
  `id_produk` char(5) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `tgl_kirim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_kirim`
--

INSERT INTO `transaksi_kirim` (`id`, `no_kirim`, `id_customer`, `id_produk`, `jumlah`, `tgl_kirim`) VALUES
(41, 'TKB000000001', 'C0001', 'P001', 2, '2017-01-25'),
(42, 'TKB000000001', 'C0001', 'P002', 6, '2017-01-25'),
(43, 'TKB000000002', 'C0003', 'P003', 12, '2017-01-26'),
(44, 'TKB000000002', 'C0003', 'P005', 1, '2017-01-26'),
(45, 'TKB000000003', 'C0001', 'P001', 21, '2017-02-02'),
(46, 'TKB000000003', 'C0001', 'P004', 12, '2017-02-02'),
(47, 'TKB000000004', 'C0003', 'P003', 10, '2017-02-08'),
(48, 'TKB000000004', 'C0003', 'P001', 11, '2017-02-08'),
(49, 'TKB000000005', 'C0009', 'P005', 30, '2017-02-08'),
(50, 'TKB000000005', 'C0009', 'P007', 9, '2017-02-08'),
(51, 'TKB000000005', 'C0009', 'P002', 8, '2017-02-08'),
(52, 'TKB000000006', 'C0010', 'P007', 12, '2017-02-08'),
(53, 'TKB000000006', 'C0010', 'P001', 13, '2017-02-08'),
(54, 'TKB000000006', 'C0010', 'P002', 4, '2017-02-08'),
(55, 'TKB000000007', 'C0011', 'P007', 1, '2017-02-18'),
(56, 'TKB000000007', 'C0011', 'P005', 8, '2017-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `id` int(11) NOT NULL,
  `no_penjualan` char(12) NOT NULL,
  `id_customer` char(5) NOT NULL,
  `id_produk` char(5) NOT NULL,
  `harga` int(12) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `total` int(15) NOT NULL,
  `tgl_trans_jual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`id`, `no_penjualan`, `id_customer`, `id_produk`, `harga`, `jumlah`, `total`, `tgl_trans_jual`) VALUES
(46, 'TPB000000001', 'C0001', 'P001', 18500, 2, 37000, '2017-01-25'),
(47, 'TPB000000001', 'C0001', 'P002', 21000, 6, 126000, '2017-01-25'),
(48, 'TPB000000002', 'C0003', 'P003', 25000, 12, 300000, '2017-01-26'),
(49, 'TPB000000002', 'C0003', 'P005', 35000, 1, 35000, '2017-01-26'),
(50, 'TPB000000003', 'C0001', 'P001', 18500, 2, 37000, '2017-01-26'),
(51, 'TPB000000003', 'C0001', 'P002', 21000, 6, 126000, '2017-01-26'),
(52, 'TPB000000004', 'C0003', 'P003', 25000, 12, 300000, '2017-02-01'),
(53, 'TPB000000004', 'C0003', 'P005', 35000, 1, 35000, '2017-02-01'),
(54, 'TPB000000005', 'C0009', 'P005', 40000, 30, 1200000, '2017-02-08'),
(55, 'TPB000000005', 'C0009', 'P007', 1000, 9, 9000, '2017-02-08'),
(56, 'TPB000000005', 'C0009', 'P002', 25000, 8, 200000, '2017-02-08'),
(57, 'TPB000000006', 'C0010', 'P001', 20000, 13, 260000, '2017-02-08'),
(58, 'TPB000000006', 'C0010', 'P002', 25000, 4, 100000, '2017-02-08'),
(59, 'TPB000000006', 'C0010', 'P007', 1000, 12, 12000, '2017-02-08'),
(60, 'TPB000000007', 'C0011', 'P005', 40000, 8, 320000, '2017-02-18'),
(61, 'TPB000000007', 'C0011', 'P007', 1000, 1, 1000, '2017-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` char(10) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(0, 'admin', 'admin', '1'),
(1, 'sami', 'sami', '2'),
(2, 'jaya', 'jaya', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id_anggaran`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `jurnal_kas`
--
ALTER TABLE `jurnal_kas`
  ADD PRIMARY KEY (`no_jurnal`);

--
-- Indexes for table `jurnal_kas_kecil`
--
ALTER TABLE `jurnal_kas_kecil`
  ADD PRIMARY KEY (`no_jurnal`);

--
-- Indexes for table `kebijakan`
--
ALTER TABLE `kebijakan`
  ADD PRIMARY KEY (`id_kebijakan`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_kebijakan` (`id_kebijakan`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_produk_2` (`id_produk`),
  ADD KEY `id_produk_3` (`id_produk`),
  ADD KEY `id_customer_2` (`id_customer`),
  ADD KEY `id_produk_4` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `transaksi_kirim`
--
ALTER TABLE `transaksi_kirim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi_kirim`
--
ALTER TABLE `transaksi_kirim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kebijakan`
--
ALTER TABLE `kebijakan`
  ADD CONSTRAINT `kebijakan_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `kebijakan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `transaksi_kirim`
--
ALTER TABLE `transaksi_kirim`
  ADD CONSTRAINT `transaksi_kirim_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `transaksi_kirim_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD CONSTRAINT `transaksi_penjualan_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `transaksi_penjualan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
