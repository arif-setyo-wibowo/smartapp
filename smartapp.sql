-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 17, 2024 at 11:10 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calonvendor`
--

CREATE TABLE `calonvendor` (
  `id_calonvendor` int NOT NULL,
  `id_procurement` int NOT NULL,
  `id_project` int NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `tahapan_proses` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL,
  `oe` bigint NOT NULL,
  `penawaran` bigint NOT NULL,
  `eficiency` bigint NOT NULL,
  `point_1` int DEFAULT NULL,
  `keterangan_1` text,
  `point_2` int DEFAULT NULL,
  `keterangan_2` text,
  `point_3` int DEFAULT NULL,
  `keterangan_3` text,
  `point_4` int DEFAULT NULL,
  `keterangan_4` text,
  `point_5` int DEFAULT NULL,
  `keterangan_5` text,
  `point_6` int DEFAULT NULL,
  `keterangan_6` text,
  `point_7` int DEFAULT NULL,
  `keterangan_7` text,
  `point_8` int DEFAULT NULL,
  `keterangan_8` text,
  `point_9` int DEFAULT NULL,
  `keterangan_9` text,
  `point_10` int DEFAULT NULL,
  `keterangan_10` text,
  `point_11` int DEFAULT NULL,
  `keterangan_11` text,
  `point_12` int DEFAULT NULL,
  `keterangan_12` text,
  `point_13` int DEFAULT NULL,
  `keterangan_13` text,
  `point_14` int DEFAULT NULL,
  `keterangan_14` text,
  `point_15` int DEFAULT NULL,
  `keterangan_15` text,
  `point_16` int DEFAULT NULL,
  `keterangan_16` text,
  `point_17` int DEFAULT NULL,
  `keterangan_17` text,
  `point_18` int DEFAULT NULL,
  `keterangan_18` text,
  `point_19` int DEFAULT NULL,
  `keterangan_19` text,
  `total_point` bigint DEFAULT NULL,
  `status_point` enum('0','1') NOT NULL DEFAULT '0',
  `status_calon_vendor` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `kontrak` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int NOT NULL,
  `nama_divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `procurement`
--

CREATE TABLE `procurement` (
  `id_procurement` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE `tender` (
  `id_tender` int NOT NULL,
  `id_calon_vendor` int NOT NULL,
  `id_project` int NOT NULL,
  `tanggal` timestamp NOT NULL,
  `point_1` int DEFAULT NULL,
  `keterangan_1` text,
  `point_2` int DEFAULT NULL,
  `keterangan_2` text,
  `point_3` int DEFAULT NULL,
  `keterangan_3` text,
  `point_4` int DEFAULT NULL,
  `keterangan_4` text,
  `point_5` int DEFAULT NULL,
  `keterangan_5` text,
  `point_6` int DEFAULT NULL,
  `keterangan_6` text,
  `point_7` int DEFAULT NULL,
  `keterangan_7` text,
  `point_8` int DEFAULT NULL,
  `keterangan_8` text,
  `point_9` int DEFAULT NULL,
  `keterangan_9` text,
  `point_10` int DEFAULT NULL,
  `keterangan_10` text,
  `point_11` int DEFAULT NULL,
  `keterangan_11` text,
  `point_12` int DEFAULT NULL,
  `keterangan_12` text,
  `point_13` int DEFAULT NULL,
  `keterangan_13` text,
  `total_point` bigint DEFAULT NULL,
  `status_nilai` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  ADD PRIMARY KEY (`id_calonvendor`);

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
-- Indexes for table `tender`
--
ALTER TABLE `tender`
  ADD PRIMARY KEY (`id_tender`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calonvendor`
--
ALTER TABLE `calonvendor`
  MODIFY `id_calonvendor` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fpp`
--
ALTER TABLE `fpp`
  MODIFY `id_fpp` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `procurement`
--
ALTER TABLE `procurement`
  MODIFY `id_procurement` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tender`
--
ALTER TABLE `tender`
  MODIFY `id_tender` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fpp`
--
ALTER TABLE `fpp`
  ADD CONSTRAINT `fpp_to_divisi` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

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
