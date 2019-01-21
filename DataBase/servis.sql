-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2019 at 10:12 AM
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
  `type` varchar(25) NOT NULL,
  `kd_pelanggan` varchar(5) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `kd_spec` varchar(4) NOT NULL,
  `problem` text NOT NULL,
  `kondisi` text NOT NULL,
  `progres` varchar(20) NOT NULL,
  `kelengkapan` text NOT NULL,
  `create_by` varchar(4) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(4) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_servis`
--

INSERT INTO `barang_servis` (`kd_barang`, `merk`, `type`, `kd_pelanggan`, `jenis`, `kd_spec`, `problem`, `kondisi`, `progres`, `kelengkapan`, `create_by`, `create_at`, `modified_by`, `modified_at`) VALUES
('BR2101G5', 'ASUS', 'ROG', 'KP001', '1', 'SPlu', 'Overload', 'Normal', '0', 'Tas chager', 'KU02', '2019-01-21 07:18:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `detail_servis`
--

CREATE TABLE `detail_servis` (
  `id_detail` int(4) NOT NULL,
  `kd_transaksi` varchar(12) NOT NULL,
  `kd_barang` varchar(8) NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `kerusakan` varchar(50) NOT NULL,
  `created_by` varchar(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(4) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_servis`
--

INSERT INTO `detail_servis` (`id_detail`, `kd_transaksi`, `kd_barang`, `tgl_terima`, `tgl_selesai`, `kerusakan`, `created_by`, `created_at`, `modified_by`, `modified_at`, `status`) VALUES
(1, 'TS2101190001', 'BR2101G5', '2019-01-21', '0000-00-00', 'Overload', 'KU02', '2019-01-21 07:18:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notif` int(4) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kd_pelanggan` int(5) NOT NULL,
  `kd_barang` int(8) NOT NULL,
  `teks` text NOT NULL
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
  `password` varchar(20) NOT NULL,
  `create_by` varchar(4) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(4) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kd_pelanggan`, `nama`, `alamat`, `no_hp`, `pekerjaan`, `password`, `create_by`, `create_date`, `modified_by`, `modified_date`) VALUES
('KP001', 'Fahmi', 'Badean', '0897762245', 'Programmer', '', 'KU02', '2019-01-14 03:29:53', '1', '2018-12-31 19:43:22');

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

--
-- Dumping data for table `spec`
--

INSERT INTO `spec` (`kd_spec`, `ram`, `vga`, `hdd`, `prosesor`, `keterangan`) VALUES
('SPlu', '4gb DDR4', 'NVDIA GTX geforce 4g', '500gb', 'corei7', 'Install ulang');

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
  `password` varchar(32) NOT NULL,
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
('KU01', 'Marcow Pollo', '0898876456', 2, 'sugiono@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Medan', 1, 'KU01', '2019-01-10 18:39:41', '1', '2019-01-08 21:31:31', '0000-00-00'),
('KU02', 'Andrean Three', '082229411164', 3, 'andrean@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Tamansari Jaya', 1, 'KU01', '2019-01-11 03:32:09', 'KU02', '2019-01-10 21:32:09', '0000-00-00');

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
  ADD KEY `user` (`created_by`),
  ADD KEY `detail_servis_ibfk_2` (`kd_barang`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notif`);

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
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notif` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
