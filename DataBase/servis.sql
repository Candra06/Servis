-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2019 at 10:08 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servis`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_servis`
--

CREATE TABLE `barang_servis` (
  `kd_barang` varchar(8) NOT NULL,
  `merk` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `kd_pelanggan` varchar(5) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `kd_spec` varchar(4) NOT NULL,
  `nomor_seri` varchar(25) NOT NULL,
  `problem` text NOT NULL,
  `kondisi` text NOT NULL,
  `progres` varchar(20) NOT NULL,
  `create_by` varchar(4) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(4) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_servis`
--

CREATE TABLE `detail_servis` (
  `id_detail` int(4) NOT NULL,
  `kd_transaksi` varchar(12) NOT NULL,
  `kd_barang` varchar(6) NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `kerusakan` varchar(50) NOT NULL,
  `created_by` varchar(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(4) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelengkapan`
--

CREATE TABLE `kelengkapan` (
  `kd_kelengkapan` varchar(6) NOT NULL,
  `kd_barang` varchar(6) NOT NULL,
  `tas` varchar(25) NOT NULL,
  `charger` varchar(25) NOT NULL,
  `keterangan` varchar(75) NOT NULL,
  `created_by` varchar(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(4) NOT NULL,
  `edited_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kd_pelanggan` varchar(5) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `create_by` varchar(4) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(4) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kd_pelanggan`, `nama`, `alamat`, `no_hp`, `pekerjaan`, `create_by`, `create_date`, `modified_by`, `modified_date`) VALUES
('KP001', 'Fahmi', 'Badean', '0897762245', 'Programmer', '1', '2019-01-01 01:43:22', '1', '2018-12-31 19:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `spec`
--

CREATE TABLE `spec` (
  `kd_spec` varchar(4) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `vga` varchar(20) NOT NULL,
  `hdd` varchar(20) NOT NULL,
  `prosesor` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_keuangan`
--

CREATE TABLE `tb_keuangan` (
  `kd_uang` varchar(6) NOT NULL,
  `jenis` tinyint(1) NOT NULL,
  `jumlah` int(7) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `created_by` varchar(4) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_servis`
--

CREATE TABLE `transaksi_servis` (
  `kd_transaksi` varchar(12) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `kd_pelanggan` varchar(5) NOT NULL,
  `created_by` varchar(4) NOT NULL,
  `date_created` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_servis`
--

INSERT INTO `transaksi_servis` (`kd_transaksi`, `tgl_transaksi`, `kd_pelanggan`, `created_by`, `date_created`, `status`) VALUES
('TS0401190001', '2019-01-04', 'KP001', 'KT01', '2019-01-04 00:00:00', 0),
('TS0401190002', '2019-01-04', 'KP001', 'KT01', '2019-01-04 00:00:00', 0),
('TS0401190003', '2019-01-04', 'KP001', 'KT01', '2019-01-04 08:50:25', 0),
('TS0401190004', '2019-01-04', 'KP001', 'KT01', '2019-01-04 08:53:39', 0),
('TS0401190005', '2019-01-04', 'KP001', 'KT01', '2019-01-04 08:56:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kd_user` varchar(4) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `level` tinyint(1) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_by` varchar(4) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(4) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kd_user`, `nama`, `no_hp`, `level`, `email`, `password`, `alamat`, `status`, `create_by`, `create_date`, `modified_by`, `modified_date`, `last_login`) VALUES
('KU01', 'Marcow', '0898876456', 3, 'sugiono@mail.com', '12345', 'Medan', 1, '1', '2019-01-01 01:41:00', '1', '2018-12-31 19:41:00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_servis`
--
ALTER TABLE `barang_servis`
  ADD PRIMARY KEY (`kd_barang`),
  ADD KEY `pemilik` (`kd_pelanggan`),
  ADD KEY `spesifikasi` (`kd_spec`) USING BTREE,
  ADD KEY `spek` (`kd_spec`);

--
-- Indexes for table `detail_servis`
--
ALTER TABLE `detail_servis`
  ADD PRIMARY KEY (`id_detail`),
  ADD UNIQUE KEY `detail_transaksi` (`kd_transaksi`);

--
-- Indexes for table `kelengkapan`
--
ALTER TABLE `kelengkapan`
  ADD PRIMARY KEY (`kd_kelengkapan`),
  ADD KEY `barang` (`kd_barang`),
  ADD KEY `created` (`created_by`),
  ADD KEY `edited` (`edited_by`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kd_pelanggan`);

--
-- Indexes for table `spec`
--
ALTER TABLE `spec`
  ADD PRIMARY KEY (`kd_spec`);

--
-- Indexes for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  ADD PRIMARY KEY (`kd_uang`),
  ADD KEY `created` (`created_by`);

--
-- Indexes for table `transaksi_servis`
--
ALTER TABLE `transaksi_servis`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `create` (`created_by`),
  ADD KEY `pelanggan` (`kd_pelanggan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_servis`
--
ALTER TABLE `detail_servis`
  MODIFY `id_detail` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_servis`
--
ALTER TABLE `barang_servis`
  ADD CONSTRAINT `barang_servis_ibfk_1` FOREIGN KEY (`kd_pelanggan`) REFERENCES `pelanggan` (`kd_pelanggan`),
  ADD CONSTRAINT `spesifikasi_barang` FOREIGN KEY (`kd_spec`) REFERENCES `spec` (`kd_spec`);

--
-- Constraints for table `detail_servis`
--
ALTER TABLE `detail_servis`
  ADD CONSTRAINT `detail_servis_ibfk_1` FOREIGN KEY (`kd_transaksi`) REFERENCES `transaksi_servis` (`kd_transaksi`);

--
-- Constraints for table `kelengkapan`
--
ALTER TABLE `kelengkapan`
  ADD CONSTRAINT `kelengkapan_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang_servis` (`kd_barang`),
  ADD CONSTRAINT `kelengkapan_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`kd_user`),
  ADD CONSTRAINT `kelengkapan_ibfk_3` FOREIGN KEY (`edited_by`) REFERENCES `user` (`kd_user`);

--
-- Constraints for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  ADD CONSTRAINT `tb_keuangan_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`kd_user`);

--
-- Constraints for table `transaksi_servis`
--
ALTER TABLE `transaksi_servis`
  ADD CONSTRAINT `transaksi_servis_ibfk_4` FOREIGN KEY (`kd_pelanggan`) REFERENCES `pelanggan` (`kd_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
