-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 08:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asetinte_aset`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id_aset` int(11) NOT NULL,
  `nama_aset` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `SN` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_habis` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `harga_aset` int(20) NOT NULL,
  `id_prioritas` int(11) NOT NULL,
  `id_ekonomis` int(11) NOT NULL,
  `id_kondisi_aset` int(11) NOT NULL,
  `status_aset` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id_aset`, `nama_aset`, `merk`, `type`, `SN`, `qty`, `id_satuan`, `id_divisi`, `tanggal_masuk`, `tanggal_habis`, `keterangan`, `harga_aset`, `id_prioritas`, `id_ekonomis`, `id_kondisi_aset`, `status_aset`) VALUES
(1, 'TV', 'Samsung', 'LED 32 Inch', 'TSLED32', 1, 2, 2, '2022-08-26', '2027-08-26', '', 4200000, 2, 5, 4, 0),
(2, 'Laptop', 'Lenovo', 'Pavilion G4', 'LLENPG4', 1, 1, 1, '2022-08-26', '2027-08-26', '', 5400000, 1, 5, 1, 0),
(3, 'Printer', 'HP', 'LasetJet CP152n-Color', 'PHPLASERCP152', 1, 2, 1, '2022-08-26', '2029-08-26', '', 1625000, 3, 7, 4, 0),
(4, 'e-KTP Reader Identik', 'INTI', 'XU20L', 'KTPINTXU20', 1, 2, 2, '2022-08-26', '2027-08-26', '', 1350000, 2, 5, 3, 0),
(6, 'MPOS', 'INTI', 'MPOINTI', 'MPOINT11', 1, 2, 2, '2022-08-27', '2025-08-27', '', 1200, 3, 3, 4, 0),
(7, 'laptop', 'waww', 'www', 'www', 1, 2, 2, '2022-08-27', '2023-08-27', '', 0, 2, 1, 3, 0),
(8, 'Laptop', 'LENOVO', 'qwrqerwe', 'qwqwe', 1, 2, 4, '2020-08-22', '2022-08-22', '', 6500000, 4, 2, 2, 0),
(9, 'Laptop', 'Asus', 'VivoBook A421F', 'KAN0CV186155449', 1, 2, 5, '2022-08-27', '2027-08-27', '', 8100000, 3, 5, 2, 1),
(10, 'PC All In One', 'Lenovo', 'MT-M 10BB-A06IF', 'PC0758CX', 1, 2, 3, '2022-08-27', '2027-08-27', '', 9300000, 4, 5, 2, 1),
(11, 'PC All In One', 'Lenovo', 'MT-M 10BB-A06IF', 'PC08Q7SB', 1, 2, 3, '2022-08-27', '2027-08-27', '', 9300000, 4, 5, 2, 1),
(12, 'PC All In One', 'Lenovo', 'MT-M 10BB-A06IF', 'PC08Q7YY', 1, 2, 3, '2018-08-27', '2021-08-27', '', 9300000, 4, 3, 2, 1),
(13, 'PC All In One', 'Lenovo', 'MT-M 10BB-A06IF', 'PC08Q7WG', 1, 2, 5, '2022-08-27', '2027-08-27', '', 9300000, 3, 5, 2, 1),
(14, 'PC All In One (Touch Screen)', 'Asus', 'ET1620i', 'H4PTCJ020991', 1, 2, 2, '2022-08-27', '2023-08-27', '', 4500000, 3, 1, 2, 1),
(15, 'PC All In One (Touch Screen)', 'Asus', 'ET1620i', 'H4PTCJ021052', 1, 2, 2, '2022-08-27', '2027-08-27', '', 4500000, 3, 5, 2, 1),
(16, 'Printer', 'Epson', 'L655', 'W8MY002870', 1, 2, 3, '2022-08-27', '2025-08-27', '', 5454000, 3, 3, 2, 1),
(17, 'Printer', 'Epson', 'L360', 'X3GW225755', 1, 2, 3, '2022-08-27', '2025-08-27', '', 2389000, 3, 3, 2, 1),
(18, 'Printer', 'Epson', 'L355', '546K000356', 1, 2, 2, '2022-08-27', '2026-08-27', '', 2300000, 3, 4, 1, 1),
(19, 'Printer Thermal', 'Fujitsu', 'FP2000', 'KL003894', 1, 2, 2, '2022-08-27', '2025-08-27', '', 3720000, 4, 3, 2, 1),
(20, 'Printer Thermal', 'Fujitsu', 'FP-1000 ISOTEC LIMITED', 'VX112834', 1, 2, 2, '2022-08-27', '2025-08-27', '', 680000, 3, 3, 2, 1),
(21, 'Mini PC AIO', 'Industrial Tablet PC', 'F11APL', 'F11APL33A2101150087', 1, 2, 2, '2022-08-27', '2025-08-27', '', 7225000, 3, 3, 2, 1),
(22, 'Mini PC AIO', 'Industrial Tablet PC', 'F11APL', 'F11APL33A2101150076', 1, 2, 2, '2022-08-27', '2025-08-27', '', 7225000, 3, 3, 2, 1),
(23, 'Printer Multifungsi', 'EPSON', 'L5190', 'PEPSL5190', 1, 2, 2, '2022-08-27', '2026-08-27', '', 6000000, 3, 4, 2, 1),
(24, 'PC All In One', 'Lenovo', 'MT-M 10BB-A06IF', 'PC08Q7ZE', 1, 2, 1, '2022-08-27', '2026-08-27', '', 7650000, 3, 4, 2, 1),
(25, 'Laptop', 'Apple', 'Macbook Pro ', 'C1MHW3HVDTY3', 1, 2, 4, '2022-08-27', '2026-08-27', '(13Inc-Mid 2012) 2.5 GHz Intel Core i5 8 GB 1600 Mhz DDR3', 12100000, 3, 4, 2, 1),
(26, 'MPOS', 'INTI', 'IP001', 'G22175208652', 1, 2, 2, '2022-08-27', '2026-08-27', '', 1450000, 3, 4, 2, 1),
(27, 'Laptop', 'Asus', 'X441M', 'J4NOCV02H541153', 1, 2, 5, '2022-08-27', '2025-08-27', '', 4500000, 3, 3, 2, 1),
(28, 'e-KTP Reader Identik', 'INTI', 'SAM 7484', '2018010120', 1, 2, 4, '2022-08-27', '2025-08-27', '', 1435000, 3, 3, 2, 1),
(29, 'Laptop', 'Dell', 'Inspiro 3458', 'JZC9J52', 1, 2, 5, '2022-08-27', '2025-08-27', '', 9750000, 3, 3, 2, 1),
(30, 'PC All In One', 'Lenovo', 'MT-M 10BB-A06IF', 'PC0758C8', 1, 2, 4, '2022-08-27', '2024-08-27', '', 7800000, 3, 2, 2, 1),
(31, 'PC All In One', 'Lenovo', 'MT-M 10BB-A06IF', 'PC08Q7Y4', 1, 2, 3, '2022-08-27', '2025-08-27', '', 7800000, 3, 3, 2, 1),
(32, 'PC All In One (Touchscreen)', 'Costum', 'N240-H310', '00000000210203002', 1, 2, 1, '2022-08-27', '2025-08-27', '', 12450000, 3, 3, 2, 1),
(33, 'Printer Thermal', 'Fujitsu', 'FP2000-C', '004327', 1, 2, 2, '2022-08-27', '2025-08-27', '', 3720000, 2, 3, 2, 1),
(34, 'TV', 'Samsung', 'Led 32 Inch', '000532MN112', 1, 2, 2, '2022-08-27', '2026-08-27', '', 3250000, 2, 4, 2, 1),
(35, 'PC All In One', 'Asus', 'V161GAT-BA145T', 'L4PTCJ00135014E', 1, 2, 2, '2022-08-27', '2025-08-27', '', 6250000, 3, 3, 2, 1),
(36, 'Switch Hub 8 Port', 'Tp Link', 'TL-SF1008D', '2178589016272', 1, 2, 4, '2022-08-27', '2024-08-27', '', 450000, 2, 2, 2, 1),
(37, 'TV', 'Samsung', 'LED32INCH', '005032SES', 1, 2, 3, '2022-08-27', '2026-08-27', '', 3240000, 2, 4, 2, 1),
(38, 'Printer', 'HP', 'DeskJet GT-5820', 'CB750-8003', 1, 2, 3, '2022-08-27', '2026-08-27', '', 4260000, 2, 4, 2, 1),
(39, 'Printer', 'HP', 'LaserJet P1606DN', 'CBP160612', 1, 2, 3, '2022-08-27', '2026-08-27', '', 3250000, 3, 4, 2, 1),
(40, 'PC All In One', 'Lenovo', 'MT-M 10BB-A06IF', 'PC0758C8', 1, 2, 4, '2022-08-27', '2023-08-27', '', 6575000, 3, 1, 2, 1),
(41, 'Laptop', 'HP', 'Pavilio g4', '5CD25245N5', 1, 2, 1, '2022-08-27', '2026-08-27', '', 3250000, 3, 4, 4, 1),
(42, 'Printer', 'HP', 'LaserJet CP1525n-Color', '00101252N', 1, 2, 3, '2022-08-27', '2027-08-27', '', 4250000, 3, 5, 4, 1),
(43, 'e-KTP Reader Identik', 'INTI', 'ETKPRINTI', '201600096', 1, 2, 2, '2022-08-27', '2026-08-27', '', 11200000, 1, 4, 2, 1),
(44, 'PC All In One', 'Asus', 'V161GAT-BA145T', 'L4PTCJ00135014E', 1, 2, 2, '2022-08-27', '2024-08-27', '', 9400000, 3, 2, 3, 1),
(45, 'Laptop', 'HP', 'OMAN', 'P09921', 1, 2, 3, '2022-09-17', '2030-09-17', '', 9000000, 3, 8, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'IT Solutions'),
(2, 'Procurement'),
(3, 'Coorporate Service & Finance'),
(4, 'Ops & Purju'),
(5, 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `form_pengadaan`
--

CREATE TABLE `form_pengadaan` (
  `id_pengadaan` int(11) NOT NULL,
  `nama_aset` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `harga_aset` int(11) NOT NULL,
  `tanggal_pengadaan` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_pengadaan`
--

INSERT INTO `form_pengadaan` (`id_pengadaan`, `nama_aset`, `qty`, `id_satuan`, `id_divisi`, `harga_aset`, `tanggal_pengadaan`, `keterangan`, `status`, `active`) VALUES
(4, 'Laptop', 1, 2, 1, 18000000, '2022-08-26', 'Macbook Pro 2020', '<p class=\"text-success\"><b>Di Setujui</b></p>', 0),
(5, 'Pc All In One', 1, 2, 4, 7800000, '2022-08-26', 'Core i5 Gen 10 RAM 8 GB ', '<p class=\"text-danger\"><b>Tidak Di Setujui</b></p>', 0),
(6, 'Meja Gaming', 12, 1, 4, 12000000, '2022-08-26', 'Meja gaming naik turun', '<p class=\"text-success\"><b>Di Setujui</b></p>', 0),
(7, 'e-KTP Reader Identik', 1, 2, 1, 12000000, '2022-08-26', '', 'Menunggu Persetujuan', 0),
(8, 'Thermal Printer', 1, 2, 4, 6000000, '2022-08-27', '', 'Menunggu Persetujuan', 0),
(9, 'Laptop', 1, 2, 2, 5400000, '2022-08-27', 'Asus ', '<p class=\"text-danger\"><b>Tidak Di Setujui</b></p>', 1),
(10, 'Printer Thermal', 1, 2, 3, 1250000, '2022-08-27', '', '<p class=\"text-danger\"><b>Tidak Di Setujui</b></p>', 1),
(11, 'Laptop Apple', 1, 2, 2, 0, '2022-09-02', 'Macbook Pro 2022', '<p class=\"text-warning\"><b>Pending</b></p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_perbaikan_pergantian`
--

CREATE TABLE `form_perbaikan_pergantian` (
  `id_perbaikan_pergantian` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `jenis_pengajuan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `status_pengajuan` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_perbaikan_pergantian`
--

INSERT INTO `form_perbaikan_pergantian` (`id_perbaikan_pergantian`, `id_aset`, `qty`, `id_satuan`, `jenis_pengajuan`, `harga`, `tanggal_pengajuan`, `keterangan`, `bukti`, `status_pengajuan`, `active`) VALUES
(9, 4, 1, 2, 'Perbaikan', 300000, '2022-08-26', '', '6308926ce801a.jpg', '<p class=\"text-success\"><b>Di Setujui</b></p>', 0),
(10, 3, 1, 2, 'Penggantian', 1625000, '2022-08-26', '', '6308946b877f1.jpg', '<p class=\"text-success\"><b>Di Setujui</b></p>', 0),
(11, 2, 1, 2, 'Perbaikan', 2147483647, '2022-08-26', '', '6308dd080b46a.png', '<p class=\"text-success\"><b>Di Setujui</b></p>', 0),
(12, 1, 1, 2, 'Perbaikan', 1200000, '2022-08-26', '', '6308e8550265d.png', '<p class=\"text-success\"><b>Di Setujui</b></p>', 0),
(13, 43, 1, 2, 'Perbaikan', 450000, '2022-08-27', '', '630a0d00e9680.png', '<p class=\"text-danger\"><b>Tidak Di Setujui</b></p>', 0),
(14, 42, 1, 2, 'Perbaikan', 2450000, '2022-08-27', '', '630a0dcd868a6.jpg', '<p class=\"text-success\"><b>Di Setujui</b></p>', 0),
(15, 12, 1, 2, 'Penggantian', 7800000, '2022-08-28', '', '630b71fc72a6d.jpg', 'Menunggu Persetujuan', 1),
(16, 12, 1, 2, 'Penggantian', 9000000, '2022-08-29', '', '630c202e85b73.jpg', '<p class=\"text-danger\"><b>Tidak Di Setujui</b></p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kondisi_aset`
--

CREATE TABLE `kondisi_aset` (
  `id_kondisi_aset` int(11) NOT NULL,
  `kondisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kondisi_aset`
--

INSERT INTO `kondisi_aset` (`id_kondisi_aset`, `kondisi`) VALUES
(1, 'Sangat Baik'),
(2, 'Baik'),
(3, 'Kurang Baik'),
(4, 'Rusak');

-- --------------------------------------------------------

--
-- Table structure for table `prioritas`
--

CREATE TABLE `prioritas` (
  `id_prioritas` int(11) NOT NULL,
  `prioritas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prioritas`
--

INSERT INTO `prioritas` (`id_prioritas`, `prioritas`) VALUES
(1, 'Kurang Berprioritas'),
(2, 'Cukup Berprioritas'),
(3, 'Berprioritas'),
(4, 'Sangat Berprioritas');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `satuan`) VALUES
(1, 'Pcs'),
(2, 'Unit');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ekonomis`
--

CREATE TABLE `tahun_ekonomis` (
  `id_ekonomis` int(11) NOT NULL,
  `bobot_tahun` int(11) NOT NULL,
  `jumlah_tahun` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahun_ekonomis`
--

INSERT INTO `tahun_ekonomis` (`id_ekonomis`, `bobot_tahun`, `jumlah_tahun`, `tahun`) VALUES
(1, 1, '1 Tahun', '+ 1 year'),
(2, 1, '2 Tahun', '+ 2 year'),
(3, 2, '3 Tahun', '+ 3 year'),
(4, 2, '4 Tahun', '+ 4 year'),
(5, 3, '5 Tahun', '+ 5 year'),
(6, 3, '6 Tahun', '+ 6 year'),
(7, 4, '7 Tahun', '+ 7 year'),
(8, 4, '8 Tahun', '+ 8 year'),
(9, 4, '9 Tahun', '+ 9 year'),
(10, 4, '10 Tahun', '+ 10 year'),
(11, 4, '11 Tahun', '+ 11 year'),
(12, 4, '12 Tahun', '+ 12 year'),
(13, 4, '13 Tahun', '+ 13 year'),
(14, 4, '14 Tahun', '+ 14 year'),
(15, 4, '15 Tahun', '+ 15 year');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `passwords` varchar(254) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `id_divisi`, `username`, `passwords`, `nama`, `role`) VALUES
(1, 2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', '1'),
(2, 2, 'ridwan', '8cb2237d0679ca88db6464eac60da96345513964', 'Spv. Material Management', '2'),
(3, 2, 'aditya12', '8cb2237d0679ca88db6464eac60da96345513964', 'Kepala Divisi Procurement', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_aset`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `id_prioritas` (`id_prioritas`),
  ADD KEY `id_ekonomis` (`id_ekonomis`),
  ADD KEY `id_kondisi_aset` (`id_kondisi_aset`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `form_pengadaan`
--
ALTER TABLE `form_pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`);

--
-- Indexes for table `form_perbaikan_pergantian`
--
ALTER TABLE `form_perbaikan_pergantian`
  ADD PRIMARY KEY (`id_perbaikan_pergantian`),
  ADD KEY `id_aset` (`id_aset`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `kondisi_aset`
--
ALTER TABLE `kondisi_aset`
  ADD PRIMARY KEY (`id_kondisi_aset`);

--
-- Indexes for table `prioritas`
--
ALTER TABLE `prioritas`
  ADD PRIMARY KEY (`id_prioritas`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tahun_ekonomis`
--
ALTER TABLE `tahun_ekonomis`
  ADD PRIMARY KEY (`id_ekonomis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `form_pengadaan`
--
ALTER TABLE `form_pengadaan`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `form_perbaikan_pergantian`
--
ALTER TABLE `form_perbaikan_pergantian`
  MODIFY `id_perbaikan_pergantian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kondisi_aset`
--
ALTER TABLE `kondisi_aset`
  MODIFY `id_kondisi_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prioritas`
--
ALTER TABLE `prioritas`
  MODIFY `id_prioritas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tahun_ekonomis`
--
ALTER TABLE `tahun_ekonomis`
  MODIFY `id_ekonomis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aset`
--
ALTER TABLE `aset`
  ADD CONSTRAINT `aset_ibfk_3` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`),
  ADD CONSTRAINT `aset_ibfk_4` FOREIGN KEY (`id_prioritas`) REFERENCES `prioritas` (`id_prioritas`),
  ADD CONSTRAINT `aset_ibfk_5` FOREIGN KEY (`id_ekonomis`) REFERENCES `tahun_ekonomis` (`id_ekonomis`),
  ADD CONSTRAINT `aset_ibfk_6` FOREIGN KEY (`id_kondisi_aset`) REFERENCES `kondisi_aset` (`id_kondisi_aset`),
  ADD CONSTRAINT `aset_ibfk_7` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`);

--
-- Constraints for table `form_perbaikan_pergantian`
--
ALTER TABLE `form_perbaikan_pergantian`
  ADD CONSTRAINT `form_perbaikan_pergantian_ibfk_1` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id_aset`),
  ADD CONSTRAINT `form_perbaikan_pergantian_ibfk_2` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
