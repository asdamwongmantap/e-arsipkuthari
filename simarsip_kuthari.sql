-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2017 at 05:12 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simarsip_kuthari`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arsip`
--

CREATE TABLE `tbl_arsip` (
  `no_arsip` varchar(15) NOT NULL,
  `tgl_arsip` date DEFAULT NULL,
  `perihal` varchar(30) DEFAULT NULL,
  `lampiran` varchar(10) DEFAULT NULL,
  `kd_jenis` varchar(15) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `kd_lokasiarsip` varchar(15) NOT NULL,
  `nm_file` varchar(100) DEFAULT NULL,
  `a_masuk` enum('Arsip Masuk','Arsip Keluar') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_arsip`
--

INSERT INTO `tbl_arsip` (`no_arsip`, `tgl_arsip`, `perihal`, `lampiran`, `kd_jenis`, `nip`, `kd_lokasiarsip`, `nm_file`, `a_masuk`) VALUES
('3/K1/V/2017', '2017-05-04', 'Edaran', '1 Bundle', 'S', '190383818', 'L001', 'Smart-city-Dirjen Aptika Kementerian Kominfo RI.pdf', 'Arsip Masuk'),
('4/K1/V/2017', '2017-05-10', 'Pemberitahuan', '1 Bundle', 'S', '190383818', 'L001', '3308-4213-1-PB.pdf', 'Arsip Keluar'),
('5/K1/VII/2017', '2017-07-22', 'Pemberitahuan', '1 Bundle', 'S', '190383819', 'L001', 'Pedoman-Penyusunan-Skripsi-Tugas-+Akhir.pdf', 'Arsip Keluar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenisarsip`
--

CREATE TABLE `tbl_jenisarsip` (
  `kd_jenis` varchar(15) NOT NULL,
  `desc_jenis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenisarsip`
--

INSERT INTO `tbl_jenisarsip` (`kd_jenis`, `desc_jenis`) VALUES
('P', 'Proposal Saja'),
('S', 'Surat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`username`, `password`, `level`) VALUES
('190383818', '202cb962ac59075b964b07152d234b70', 'Sekretaris'),
('190383819', '21232f297a57a5a743894a0e4a801fc3', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lokasiarsip`
--

CREATE TABLE `tbl_lokasiarsip` (
  `kd_lokasiarsip` varchar(15) NOT NULL,
  `lokasiarsip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lokasiarsip`
--

INSERT INTO `tbl_lokasiarsip` (`kd_lokasiarsip`, `lokasiarsip`) VALUES
('L001', 'Lemari 1 Lantai 1 Saja');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `nip` varchar(30) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `tmpt_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `jabatan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`nip`, `nama`, `jenis_kelamin`, `alamat`, `kota`, `tmpt_lahir`, `tgl_lahir`, `email`, `jabatan`) VALUES
('190383818', 'Dafi', 'Wanita', 'Cilegon', 'Serang', '', '0000-00-00', 'tes@gmail.com', 'Sekretaris'),
('190383819', 'Administrator', 'Pria', 'Serang', 'Serang', 'Cilegon', '1994-08-08', 'admin@gmail.com', 'Sekretaris'),
('2009181877', 'Muktamar Khadafi', 'Pria', 'PCI Blok G6 No 2', 'Cilegon', 'Pandeglang', '1999-09-09', 'muktamar@gmail.com', 'Sekretaris');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_arsip`
-- (See below for the actual view)
--
CREATE TABLE `view_arsip` (
`no_arsip` varchar(15)
,`tgl_arsip` date
,`perihal` varchar(30)
,`lampiran` varchar(10)
,`kd_jenis` varchar(15)
,`desc_jenis` varchar(100)
,`nip` varchar(30)
,`nama` varchar(100)
,`jabatan` varchar(30)
,`kd_lokasiarsip` varchar(15)
,`lokasiarsip` varchar(100)
,`nm_file` varchar(100)
,`a_masuk` enum('Arsip Masuk','Arsip Keluar')
);

-- --------------------------------------------------------

--
-- Structure for view `view_arsip`
--
DROP TABLE IF EXISTS `view_arsip`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_arsip`  AS  select `tbl_arsip`.`no_arsip` AS `no_arsip`,`tbl_arsip`.`tgl_arsip` AS `tgl_arsip`,`tbl_arsip`.`perihal` AS `perihal`,`tbl_arsip`.`lampiran` AS `lampiran`,`tbl_arsip`.`kd_jenis` AS `kd_jenis`,`tbl_jenisarsip`.`desc_jenis` AS `desc_jenis`,`tbl_arsip`.`nip` AS `nip`,`tbl_pegawai`.`nama` AS `nama`,`tbl_pegawai`.`jabatan` AS `jabatan`,`tbl_arsip`.`kd_lokasiarsip` AS `kd_lokasiarsip`,`tbl_lokasiarsip`.`lokasiarsip` AS `lokasiarsip`,`tbl_arsip`.`nm_file` AS `nm_file`,`tbl_arsip`.`a_masuk` AS `a_masuk` from (((`tbl_arsip` join `tbl_jenisarsip` on((`tbl_arsip`.`kd_jenis` = `tbl_jenisarsip`.`kd_jenis`))) join `tbl_pegawai` on((`tbl_arsip`.`nip` = `tbl_pegawai`.`nip`))) join `tbl_lokasiarsip` on((`tbl_arsip`.`kd_lokasiarsip` = `tbl_lokasiarsip`.`kd_lokasiarsip`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD PRIMARY KEY (`no_arsip`,`kd_jenis`,`nip`,`kd_lokasiarsip`),
  ADD KEY `kd_jenis` (`kd_jenis`),
  ADD KEY `kd_lokasiarsip` (`kd_lokasiarsip`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tbl_jenisarsip`
--
ALTER TABLE `tbl_jenisarsip`
  ADD PRIMARY KEY (`kd_jenis`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_lokasiarsip`
--
ALTER TABLE `tbl_lokasiarsip`
  ADD PRIMARY KEY (`kd_lokasiarsip`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD CONSTRAINT `tbl_arsip_ibfk_1` FOREIGN KEY (`kd_jenis`) REFERENCES `tbl_jenisarsip` (`kd_jenis`),
  ADD CONSTRAINT `tbl_arsip_ibfk_2` FOREIGN KEY (`kd_lokasiarsip`) REFERENCES `tbl_lokasiarsip` (`kd_lokasiarsip`),
  ADD CONSTRAINT `tbl_arsip_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `tbl_pegawai` (`nip`);

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `tbl_login_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tbl_pegawai` (`nip`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
