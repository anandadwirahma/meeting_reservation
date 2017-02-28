-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2016 at 12:25 PM
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

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`id_booking`, `id_karyawan`, `id_det_booking`, `status`) VALUES
(1, 2, 1, 'Done'),
(2, 2, 2, 'Done');

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

--
-- Dumping data for table `tb_det_booking`
--

INSERT INTO `tb_det_booking` (`id_det_booking`, `id_ruang`, `tanggal_psn`, `tanggal_meeting`, `jam_mulai`, `jam_akhir`, `topik`) VALUES
(1, 1, '2016-12-07', '2016-12-06', '00:15:00', '02:00:00', 'Meeting BCP'),
(2, 1, '2016-12-08', '2016-12-08', '00:00:00', '00:15:00', 'Meeting Project');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE IF NOT EXISTS `tb_peserta` (
  `id_booking` int(10) NOT NULL,
  `id_karyawan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_booking`, `id_karyawan`) VALUES
(1, 1),
(2, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruang`
--

INSERT INTO `tb_ruang` (`id_ruang`, `nama_ruang`, `lokasi`, `kapasitas`) VALUES
(1, 'Jawa', '1', 10),
(2, 'Papua', '1', 5),
(3, 'Sumatra', '2', 40),
(4, 'Kalimantan', '2', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
`id_karyawan` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_karyawan`, `nama`, `departemen`, `email`, `no_telp`, `username`, `password`, `id_role`) VALUES
(1, 'admins', 'BO', 'admin@solusi247.com', '081234567', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Ananda Dwi Rahma', 'MO', 'ananda@solusi247.com', '0813989898', 'ananda', 'd406e1b227b7513f5eb368ca2e0bc9b7', 2),
(10, 'Ananda Dwi Rahma', 'BSO', 'anandadwi20@gmail.com', '123456789', 'anandadwirahma', 'dd2d7661e01e69bcc3713f4c49d94bca', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
 ADD PRIMARY KEY (`id_booking`), ADD KEY `id_karyawan` (`id_karyawan`), ADD KEY `id_det_booking` (`id_det_booking`);

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
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
MODIFY `id_ruang` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_booking`
--
ALTER TABLE `tb_booking`
ADD CONSTRAINT `tb_booking_ibfk_3` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_user` (`id_karyawan`),
ADD CONSTRAINT `tb_booking_ibfk_4` FOREIGN KEY (`id_det_booking`) REFERENCES `tb_det_booking` (`id_det_booking`);

--
-- Constraints for table `tb_det_booking`
--
ALTER TABLE `tb_det_booking`
ADD CONSTRAINT `tb_det_booking_ibfk_1` FOREIGN KEY (`id_ruang`) REFERENCES `tb_ruang` (`id_ruang`);

--
-- Constraints for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
ADD CONSTRAINT `tb_peserta_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `tb_booking` (`id_booking`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`id_role`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
