-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 19, 2024 at 09:05 AM
-- Server version: 8.0.35
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `foto`) VALUES
(1, 'okky', 'okky', '$2y$10$Tl90ASlF6QvYNC0l1qK5ZuCbrH5f99u3O3qenaJEqthUy3l6l8Fia', 'halo.png');

-- --------------------------------------------------------

--
-- Table structure for table `calonvendor`
--

CREATE TABLE `calonvendor` (
  `id_calonvendor` int NOT NULL,
  `id_procurement` int DEFAULT NULL,
  `id_project` int NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `tahapan_proses` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `oe` bigint NOT NULL,
  `penawaran` bigint NOT NULL,
  `eficiency` double NOT NULL,
  `point_1` int DEFAULT '0',
  `keterangan_1` text,
  `point_2` int DEFAULT '0',
  `keterangan_2` text,
  `point_3` int DEFAULT '0',
  `keterangan_3` text,
  `point_4` int DEFAULT '0',
  `keterangan_4` text,
  `point_5` int DEFAULT '0',
  `keterangan_5` text,
  `point_6` int DEFAULT '0',
  `keterangan_6` text,
  `point_7` int DEFAULT '0',
  `keterangan_7` text,
  `point_8` int DEFAULT '0',
  `keterangan_8` text,
  `point_9` int DEFAULT '0',
  `keterangan_9` text,
  `point_10` int DEFAULT '0',
  `keterangan_10` text,
  `point_11` int DEFAULT '0',
  `keterangan_11` text,
  `point_12` int DEFAULT '0',
  `keterangan_12` text,
  `point_13` int DEFAULT '0',
  `keterangan_13` text,
  `point_14` int DEFAULT '0',
  `keterangan_14` text,
  `point_15` int DEFAULT '0',
  `keterangan_15` text,
  `point_16` int DEFAULT '0',
  `keterangan_16` text,
  `point_17` int DEFAULT '0',
  `keterangan_17` text,
  `point_18` int DEFAULT '0',
  `keterangan_18` text,
  `point_19` int DEFAULT '0',
  `keterangan_19` text,
  `total_point` bigint DEFAULT '0',
  `status_point` enum('0','1') NOT NULL DEFAULT '0',
  `status_calon_vendor` enum('0','1','2') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `kontrak` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calonvendor`
--

INSERT INTO `calonvendor` (`id_calonvendor`, `id_procurement`, `id_project`, `nama_vendor`, `tahapan_proses`, `tanggal`, `oe`, `penawaran`, `eficiency`, `point_1`, `keterangan_1`, `point_2`, `keterangan_2`, `point_3`, `keterangan_3`, `point_4`, `keterangan_4`, `point_5`, `keterangan_5`, `point_6`, `keterangan_6`, `point_7`, `keterangan_7`, `point_8`, `keterangan_8`, `point_9`, `keterangan_9`, `point_10`, `keterangan_10`, `point_11`, `keterangan_11`, `point_12`, `keterangan_12`, `point_13`, `keterangan_13`, `point_14`, `keterangan_14`, `point_15`, `keterangan_15`, `point_16`, `keterangan_16`, `point_17`, `keterangan_17`, `point_18`, `keterangan_18`, `point_19`, `keterangan_19`, `total_point`, `status_point`, `status_calon_vendor`, `kontrak`) VALUES
(10, 1, 1, 'Vendor 2', 'Bertahap 1', '2024-08-22', 234234234, 38428291, 83.59, 3, '', 3, '', 3, '', 0, '', 10, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 19, '1', '2', 6),
(16, 1, 1, 'Tes Vendor', 'Proses Cuy', '2024-08-21', 111111111111, 22222222222, 80, 3, '', 3, '', 3, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 9, '1', '1', NULL),
(17, 1, 4, 'Vendor 4', 'Hahaha', '2024-08-07', 80000000, 99000000, -23.75, 3, '', 3, '', 3, '', 3, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 12, '1', '2', 8);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int NOT NULL,
  `nama_divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(5, 'Divisi Coy'),
(6, 'Divisi 2'),
(7, 'Divisi 3'),
(8, 'Divisi 4'),
(9, 'Divisi 5');

-- --------------------------------------------------------

--
-- Table structure for table `fpp`
--

CREATE TABLE `fpp` (
  `id_fpp` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_divisi` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fpp`
--

INSERT INTO `fpp` (`id_fpp`, `nama`, `id_divisi`, `username`, `password`) VALUES
(1, 'okky', 5, 'okky', '$2y$10$Tl90ASlF6QvYNC0l1qK5ZuCbrH5f99u3O3qenaJEqthUy3l6l8Fia');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(12, 'Kategori 1'),
(13, 'Kategori 2'),
(14, 'Kategori 3'),
(15, 'Kategori 4'),
(16, 'Kategori 5');

-- --------------------------------------------------------

--
-- Table structure for table `pk_fpp`
--

CREATE TABLE `pk_fpp` (
  `id_penilaian` int NOT NULL,
  `id_vendor` int NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `quality` int DEFAULT '0',
  `delivery` int DEFAULT '0',
  `service` int DEFAULT '0',
  `ratarata` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pk_fpp`
--

INSERT INTO `pk_fpp` (`id_penilaian`, `id_vendor`, `status`, `quality`, `delivery`, `service`, `ratarata`) VALUES
(1, 10, '1', 90, 80, 90, 86),
(2, 17, '1', 10, 15, 15, 13);

-- --------------------------------------------------------

--
-- Table structure for table `pk_staff`
--

CREATE TABLE `pk_staff` (
  `id_penilaian` int NOT NULL,
  `id_vendor` int NOT NULL,
  `id_project` int NOT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP,
  `point_1` int DEFAULT '0',
  `keterangan_1` text,
  `point_2` int DEFAULT '0',
  `keterangan_2` text,
  `point_3` int DEFAULT '0',
  `keterangan_3` text,
  `point_4` int DEFAULT '0',
  `keterangan_4` text,
  `point_5` int DEFAULT '0',
  `keterangan_5` text,
  `point_6` int DEFAULT '0',
  `keterangan_6` text,
  `point_7` int DEFAULT '0',
  `keterangan_7` text,
  `point_8` int DEFAULT '0',
  `keterangan_8` text,
  `point_9` int DEFAULT '0',
  `keterangan_9` text,
  `point_10` int DEFAULT '0',
  `keterangan_10` text,
  `point_11` int DEFAULT '0',
  `keterangan_11` text,
  `point_12` int DEFAULT '0',
  `keterangan_12` text,
  `point_13` int DEFAULT '0',
  `keterangan_13` text,
  `total_point` int DEFAULT '0',
  `status_nilai` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pk_staff`
--

INSERT INTO `pk_staff` (`id_penilaian`, `id_vendor`, `id_project`, `tanggal`, `point_1`, `keterangan_1`, `point_2`, `keterangan_2`, `point_3`, `keterangan_3`, `point_4`, `keterangan_4`, `point_5`, `keterangan_5`, `point_6`, `keterangan_6`, `point_7`, `keterangan_7`, `point_8`, `keterangan_8`, `point_9`, `keterangan_9`, `point_10`, `keterangan_10`, `point_11`, `keterangan_11`, `point_12`, `keterangan_12`, `point_13`, `keterangan_13`, `total_point`, `status_nilai`) VALUES
(1, 10, 1, '2024-08-19 00:00:00', 5, '', 10, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', -45, '', 0, '', 0, '', 0, '', 0, '', -30, '1');

-- --------------------------------------------------------

--
-- Table structure for table `procurement`
--

CREATE TABLE `procurement` (
  `id_procurement` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `procurement`
--

INSERT INTO `procurement` (`id_procurement`, `nama`, `email`, `no_id`) VALUES
(1, 'OKKY', 'okkyfirman16@gmail.com', 12345678);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int NOT NULL,
  `id_kategori` int NOT NULL,
  `id_divisi` int NOT NULL,
  `nama_project` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `id_kategori`, `id_divisi`, `nama_project`, `status`) VALUES
(1, 12, 5, 'Project 1', '1'),
(2, 13, 5, 'Project 2', '0'),
(3, 14, 7, 'Project 3', '0'),
(4, 15, 5, 'Project 4', '1'),
(5, 16, 9, 'Project 5', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `calonvendor`
--
ALTER TABLE `calonvendor`
  ADD PRIMARY KEY (`id_calonvendor`),
  ADD KEY `calonvendor_to_procurement` (`id_procurement`),
  ADD KEY `calonvendor_to_project` (`id_project`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `fpp`
--
ALTER TABLE `fpp`
  ADD PRIMARY KEY (`id_fpp`),
  ADD KEY `fpp_to_divisi` (`id_divisi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pk_fpp`
--
ALTER TABLE `pk_fpp`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `pk_to_calonvendor` (`id_vendor`);

--
-- Indexes for table `pk_staff`
--
ALTER TABLE `pk_staff`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `pk_to_project` (`id_project`),
  ADD KEY `pk_to_idcalonvendor` (`id_vendor`);

--
-- Indexes for table `procurement`
--
ALTER TABLE `procurement`
  ADD PRIMARY KEY (`id_procurement`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `project_to_kategori` (`id_kategori`),
  ADD KEY `project_to_divisi` (`id_divisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calonvendor`
--
ALTER TABLE `calonvendor`
  MODIFY `id_calonvendor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fpp`
--
ALTER TABLE `fpp`
  MODIFY `id_fpp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pk_fpp`
--
ALTER TABLE `pk_fpp`
  MODIFY `id_penilaian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pk_staff`
--
ALTER TABLE `pk_staff`
  MODIFY `id_penilaian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `procurement`
--
ALTER TABLE `procurement`
  MODIFY `id_procurement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calonvendor`
--
ALTER TABLE `calonvendor`
  ADD CONSTRAINT `calonvendor_to_procurement` FOREIGN KEY (`id_procurement`) REFERENCES `procurement` (`id_procurement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calonvendor_to_project` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fpp`
--
ALTER TABLE `fpp`
  ADD CONSTRAINT `fpp_to_divisi` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pk_fpp`
--
ALTER TABLE `pk_fpp`
  ADD CONSTRAINT `pk_to_calonvendor` FOREIGN KEY (`id_vendor`) REFERENCES `calonvendor` (`id_calonvendor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pk_staff`
--
ALTER TABLE `pk_staff`
  ADD CONSTRAINT `pk_to_idcalonvendor` FOREIGN KEY (`id_vendor`) REFERENCES `calonvendor` (`id_calonvendor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pk_to_project` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_to_divisi` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_to_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
