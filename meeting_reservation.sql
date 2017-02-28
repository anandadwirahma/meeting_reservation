-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2017 at 05:29 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `meeting_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE IF NOT EXISTS `tb_booking` (
  `id_booking` int(10) NOT NULL,
  `id_karyawan` int(10) NOT NULL,
  `id_det_booking` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_departemen`
--

CREATE TABLE IF NOT EXISTS `tb_departemen` (
`id_departemen` int(5) NOT NULL,
  `departemen` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_departemen`
--

INSERT INTO `tb_departemen` (`id_departemen`, `departemen`) VALUES
(1, 'BSO'),
(2, 'PMO'),
(3, 'BO'),
(4, 'MO');

-- --------------------------------------------------------

--
-- Table structure for table `tb_det_booking`
--

CREATE TABLE IF NOT EXISTS `tb_det_booking` (
  `id_det_booking` int(10) NOT NULL,
  `id_ruang` int(10) NOT NULL,
  `tanggal_psn` date NOT NULL,
  `tanggal_meeting` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `topik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE IF NOT EXISTS `tb_peserta` (
  `id_booking` int(10) NOT NULL,
  `id_karyawan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE IF NOT EXISTS `tb_role` (
  `id_role` int(5) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE IF NOT EXISTS `tb_ruang` (
`id_ruang` int(10) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `kapasitas` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruang`
--

INSERT INTO `tb_ruang` (`id_ruang`, `nama_ruang`, `lokasi`, `kapasitas`) VALUES
(14, 'Irian Jaya', '1', 5),
(15, 'Sulawesi', '1', 10),
(16, 'Merauke', '2', 20),
(17, 'Sumatra', '2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
`id_karyawan` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_departemen` int(5) NOT NULL,
  `email` varchar(75) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_karyawan`, `nama`, `id_departemen`, `email`, `no_telp`, `username`, `password`, `id_role`) VALUES
(1, 'admin', 1, 'admin@solusi247.com', '08123456765', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(17, 'Ananda Dwi Rahma', 4, 'anandadwi20@gmail.com', '083878718914', 'ananda', '7f363f401f336a7925f28655b6a44447', 2),
(18, 'rendy', 2, 'cahyarendy@gmail.com', '23456', 'rendy', '88ad32a14f7f7964d03dad411ffcc59b', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
 ADD PRIMARY KEY (`id_booking`), ADD KEY `id_karyawan` (`id_karyawan`), ADD KEY `id_det_booking` (`id_det_booking`);

--
-- Indexes for table `tb_departemen`
--
ALTER TABLE `tb_departemen`
 ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `tb_det_booking`
--
ALTER TABLE `tb_det_booking`
 ADD PRIMARY KEY (`id_det_booking`), ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
 ADD KEY `id_booking` (`id_booking`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
 ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
 ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
 ADD PRIMARY KEY (`id_karyawan`), ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_departemen`
--
ALTER TABLE `tb_departemen`
MODIFY `id_departemen` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
MODIFY `id_ruang` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
