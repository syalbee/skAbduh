-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2022 at 10:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_peramalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `stok_barang` double DEFAULT NULL,
  `stok_aman` double DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `id_gudang` int(11) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok_barang`, `stok_aman`, `id_supplier`, `id_gudang`, `id_satuan`) VALUES
(1, 'Kertas Ivory 500GR', 31, 0, 1, 1, 1),
(3, 'Kertas Buram 70Gr', 14, 0, 1, 1, 2),
(4, 'kertas sticker', 8, 0, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id_gudang` int(11) NOT NULL,
  `nama_gudang` varchar(60) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `nama_gudang`, `alamat`) VALUES
(1, 'Gudang satu ', 'Gedung A Lantai 3');

-- --------------------------------------------------------

--
-- Table structure for table `history_barang`
--

CREATE TABLE `history_barang` (
  `id_history` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jenis_transaksi` char(1) DEFAULT NULL,
  `tanggal_transaksi` datetime DEFAULT current_timestamp(),
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_barang`
--

INSERT INTO `history_barang` (`id_history`, `id_barang`, `jenis_transaksi`, `tanggal_transaksi`, `jumlah`) VALUES
(1, 1, 'i', '2022-08-11 11:31:11', 3),
(2, 3, 'i', '2022-08-11 14:13:47', 5),
(13, 3, 'i', '2022-08-11 14:33:51', 9),
(14, 3, 'o', '2022-08-11 14:44:54', 2),
(16, 1, 'o', '2022-07-15 16:50:07', 3),
(17, 4, 'i', '2022-08-11 20:10:28', 10),
(18, 4, 'o', '2022-08-11 20:10:47', 2);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama`) VALUES
(1, 'Pcs'),
(2, 'Rim');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `notelp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `notelp`) VALUES
(1, 'CV Bintang Jaya', 'Jl Garuda No 19', '078654321'),
(2, 'CV Bintang Sobo', 'Jl ganesha', '098765432121');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `no_tlp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `role` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `email`, `no_tlp`, `alamat`, `role`) VALUES
(1, 'admin', 'admin', 'Admin', '-', '-', '-', '1'),
(2, 'abduh', '1234', 'Abduh Majid', 'abduhmajid@mail.com', '0897665433121', 'Taman Kopo Indah', '2'),
(3, 'ujang', '1234', 'Ujang Nagara', 'ujangnagara@mail.com', '0876543214', 'Dipatiukur Sekeloa\r\n', '3'),
(4, 'majid', '1234', 'Majid Raharjo', 'majid@mail.com', '0897654321121', 'Jl sekeloa Utara', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_gudang` (`id_gudang`),
  ADD KEY `barang_ibfk_3` (`id_satuan`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `history_barang`
--
ALTER TABLE `history_barang`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history_barang`
--
ALTER TABLE `history_barang`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id_gudang`),
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`);

--
-- Constraints for table `history_barang`
--
ALTER TABLE `history_barang`
  ADD CONSTRAINT `history_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
